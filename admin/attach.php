<?php
require_once 'admin.inc.php';
require_once '../include/attach.class.php';
$attachdata = new Attach;
if($_GET['clean']){
	//删除过期附件
	$sql = "SELECT `id` FROM yiqi_attach WHERE item_id = 0 AND add_time < " . (time() - 3600 * 24);
	$attachs = $yiqi_db->query(CheckSql($sql));
	if ($attachs)
	{
		foreach ($attachs AS $key => $val)
		{
			$attachdata->remove_attach($val->id);
		}
	}
	ShowMsg('done!','back');
}

if($_GET['delid']){
	$attachdata->remove_attach($_GET['delid']);
	die('done!');
}

if($_GET['save']){
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
		exit;
	}
	@set_time_limit(5 * 60);

	$date = gmdate('Ymd', time());
	$targetDir = YIQIROOT . '/uploads/tmp';
	$uploadDir = YIQIROOT . '/uploads/' . $date;

	$cleanupTargetDir = true; // Remove old files
	$maxFileAge = 5 * 3600; // Temp file age in seconds

	// Create target dir
	if (!file_exists($targetDir)) {
		@mkdir($targetDir, 0777);
	}

	// Create target dir
	if (!file_exists($uploadDir)) {
		@mkdir($uploadDir, 0777);
	}

	// Get a file name
	if (isset($_REQUEST["name"])) {
		$fileName = $_REQUEST["name"];
	} elseif (!empty($_FILES)) {
		$fileName = $_FILES["file"]["name"];
	} else {
		$fileName = uniqid("file_");
	}
	$fileName = str_replace(' ', '-',$fileName);
	if(!preg_match('/^[a-z0-9\-\_\.]+$/i',$fileName)){
		$fileName = time() . mt_rand(1,10000) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
	}
	$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
	$uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;

	// Chunking might be enabled
	$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
	$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;


	// Remove old temp files
	if ($cleanupTargetDir) {
		if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
		}

		while (($file = readdir($dir)) !== false) {
			$tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

			// If temp file is current file proceed to the next
			if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
				continue;
			}

			// Remove temp file if it is older than the max age and is not the current file
			if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
				@unlink($tmpfilePath);
			}
		}
		closedir($dir);
	}


	// Open temp file
	if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
		die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
	}

	if (!empty($_FILES)) {
		if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
		}

		// Read binary input stream and append it to temp file
		if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
		}
	} else {
		if (!$in = @fopen("php://input", "rb")) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
		}
	}

	while ($buff = fread($in, 4096)) {
		fwrite($out, $buff);
	}

	@fclose($out);
	@fclose($in);

	rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

	$index = 0;
	$done = true;
	for( $index = 0; $index < $chunks; $index++ ) {
		if ( !file_exists("{$filePath}_{$index}.part") ) {
			$done = false;
			break;
		}
	}
	if ( $done ) {
		if (!$out = @fopen($uploadPath, "wb")) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		}

		if ( flock($out, LOCK_EX) ) {
			for( $index = 0; $index < $chunks; $index++ ) {
				if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
					break;
				}

				while ($buff = fread($in, 4096)) {
					fwrite($out, $buff);
				}

				@fclose($in);
				@unlink("{$filePath}_{$index}.part");
			}

			flock($out, LOCK_UN);
		}
		@fclose($out);
		//入库
		$attach = array(
			'file_name' => $fileName,
			'access_key' => $_POST['formhash'],
			'add_time' => time(),
			'file_location' => YIQIPATH . 'uploads/' . $date . '/' . $fileName,
			'is_image' => 1
		);
		$string = array();
    	foreach($attach as $key=>$val){
    		$string[] = "`" . $key . "` = '" . addslashes($val) . "'";
    	}
		$sql = "INSERT INTO yiqi_attach set " . implode(', ', $string);
		$result = $yiqi_db->query(CheckSql($sql));
		if($result == 1){
			$attach_id = $yiqi_db->insert_id;	
		}
		die('{"jsonrpc" : "2.0", "result" : null, "id" : "'. $attach_id. '"}');
	}

	die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
	
}
?>
<?php
$adminpagetitle = "附件列表";
include("admin.header.php");?>
<div class="main_body">
<form action="attach.php?clean=true" method="post">
<div class="clear">&nbsp;</div>
<div class="fl" style="text-indent:16px;">&nbsp;<input type="submit" class="subtn" value="清理过期附件"/></div>
<div class="fr">

</div>
</form>
<div class="clear">&nbsp;</div>

</div>

<div class="clear">&nbsp;</div>
<?php include("admin.footer.php");?>
</div>

</body>

</html>