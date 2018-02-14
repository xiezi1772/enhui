<?php

require_once("data.class.php");

class Attach
{    
	function GetAttach($id)
	{
	    global $yiqi_db;
	    if($this->ExistAttach($id)==1)
	    {
			return $yiqi_db->get_row(CheckSql("select * from yiqi_attach where id = '$id' limit 1"));
	    }
	    else
	    {
	        return null;
	    }
	}
	
	function GetAttachByItemId($item_id, $item_type='product')
	{
	    global $yiqi_db;
	    if(!$item_id){
			return null;
		}
		$sql = "select * from yiqi_attach where item_id = '$item_id' AND item_type = '$item_type' ORDER BY id DESC";
	    return $yiqi_db->get_results(CheckSql($sql));
	}
	
	function ExistAttach($id)
	{
	    global $yiqi_db;
		$sql = "select * from yiqi_attach where id = '$id' limit 1";
	    $exist = $yiqi_db->query(CheckSql($sql));
	    if($exist == 0)
	    {
	        return 0;
	    }
	    else
	    {
	        return 1;
	    }	    
	}
	
	function remove_attach($id)
	{
		global $yiqi_db;
		$sql = "SELECT * FROM yiqi_attach WHERE id = " . intval($id);
		$attach = $yiqi_db->get_row(CheckSql($sql));
		if (! $attach)
		{
			return false;
		}
		$sql = "DELETE FROM yiqi_attach WHERE id = " . intval($id);
		$result = $yiqi_db->query(CheckSql($sql));

		$attach_dir = rtrim(YIQIROOT . '/',YIQIPATH);
		@unlink($attach_dir . $attach->file_location);
		//update
		$item_id = $attach->item_id;
		$item_type = $attach->item_type;
		$sql = "SELECT `file_location` FROM yiqi_attach WHERE item_id = '$item_id' AND item_type = '$item_type' ORDER BY id DESC limit 1";
		$newattach = $yiqi_db->get_row(CheckSql($sql));
		if($newattach){
			$attachfile = $newattach->file_location;
		}else{
			$attachfile = "";
		}
		if($item_type == 'product'){
			$sql = "UPDATE yiqi_product SET thumb = '$attachfile' WHERE pid = '$item_id'";
		}else{
			$sql = "UPDATE yiqi_article SET thumb = '$attachfile' WHERE aid = '$item_id'";
		}
		
		$yiqi_db->query(CheckSql($sql));
		return 1;
	}
	
	function removeAttachByItemId($item_id, $item_type="product"){
		$attachs = $this->GetAttachByItemId($item_id, $item_type);
		if($attachs){
			foreach ($attachs AS $key => $val)
			{
				$this->remove_attach($val->id);
			}
		}
		return 1;
	}
}

?>