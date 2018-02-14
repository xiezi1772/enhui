<?php

require_once 'Smarty/libs/Smarty.class.php';

class Templets extends Smarty
{
	public $crumb;
    function GetTemplets($tid)
    {
        global $yiqi_db;
        $tempinfo = $yiqi_db->get_row(CheckSql("select * from yiqi_templets where tid = '$tid' limit 1"));
        if(is_object($tempinfo))
        {
            return $tempinfo;
        }
        else
        {
            return null;
        }
    }
    
    function GetDefaultTemplets()
    {
        global $yiqi_db;
        $defaulttemplets = $yiqi_db->get_row(CheckSql("select * from yiqi_settings where varname = 'sitetemplets' limit 1"));
         if(is_object($defaulttemplets))
        {
            return $this->GetTemplets($defaulttemplets->value);
        }
        else
        {
            return null;
        }
    }
	
	function Crumb($name, $type = null, $url = null)
	{
		$name = htmlspecialchars_decode($name);

		$crumb_template = $this->crumb;
		
		$url = formaturl(array('type' => $type,'siteurl' => $this->get_template_vars('siteurl'),'name' => $url));

		$this->crumb[] = (object)array(
			'name' => $name,
			'url' => $url
		);

		$crumb_template[] = (object)array(
			'name' => $name,
			'url' => $url
		);

		$this->assign('crumb', $crumb_template);

		return $this;
	}
}
?>