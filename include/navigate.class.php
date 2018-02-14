<?php
require_once 'data.class.php';

class Navigate
{
    function GetNavigate($id)
    {
        global $yiqi_db;
	    if($this->ExistNavigate($id)==1)
	    {
	        $sql = "select * from yiqi_navigate where navid = '$id' limit 1";
	        $result = $yiqi_db->get_row(CheckSql($sql));
			$result->url = str_replace("{siteurl}",siteurl(),$result->url);
			return $result;
	    }
	    else
	    {
	        return null;
	    }
    }
    
    function ExistNavigate($id)
	{
	    global $yiqi_db;
	    $sql = "select * from yiqi_navigate where navid = '$id' limit 1";	    
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
	
    function GetNavigateList($group=false,$orderby="convert(`group` USING gbk) COLLATE gbk_chinese_ci,displayorder,navid")
	{
	    global $yiqi_db;
		global $categorydata;
		if($group)
		{
			$result = $yiqi_db->get_results(CheckSql("select * from yiqi_navigate as nav where nav.group = '$group' and nav.status = 'ok' order by $orderby"));
		}
		else
		{
			$result = $yiqi_db->get_results(CheckSql("select * from yiqi_navigate as nav where nav.status = 'ok' order by $orderby"));
		}
		if($result){
			foreach($result as $key => $val){
				if($val->catid){
					$category = $categorydata->GetCategory($val->catid);
					$result[$key]->name = $category->name;
					$result[$key]->url = formaturl(array("type" => "category","name" => $category->filename,"siteurl" => siteurl()));
				}
				$result[$key]->url = str_replace("{siteurl}",siteurl(),$val->url);
			}
		}
		
		return $result;
	}
	
	function TakeNavigateList($group=false,$skip=0,$take=10,$orderby="convert(`group` USING gbk) COLLATE gbk_chinese_ci,displayorder,navid")
	{
	    global $yiqi_db;
		global $categorydata;
		if($group)
		{
			$result = $yiqi_db->get_results(CheckSql("select * from yiqi_navigate as nav where nav.group = '$group' AND nav.status = 'ok' order by $orderby limit $skip,$take"));		
		}
		else
		{
			$result = $yiqi_db->get_results(CheckSql("select * from yiqi_navigate as nav where nav.status = 'ok' order by $orderby limit $skip,$take"));	
		}
		if($result){
			foreach($result as $key => $val){
				if($val->catid){
					$category = $categorydata->GetCategory($val->catid);
					$result[$key]->name = $category->name;
					$result[$key]->url = formaturl(array("type" => "category","name" => $category->filename,"siteurl" => siteurl()));
				}
				$result[$key]->url = str_replace("{siteurl}",siteurl(),$val->url);
			}
		}
		return $result;
	}
}
?>