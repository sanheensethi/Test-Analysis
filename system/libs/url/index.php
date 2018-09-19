<?php

	include "../../../basepath.php";
	function url($x=''){
		return BASEPATH.DS."assests".DS.$x;
	}
	
	function base_url($x=''){
		return BASEPATH.DS.$x;
	}
	
	function uri($x=''){
		$url=explode('/',$_SERVER['SCRIPT_NAME']);
		array_pop($url);
		$server_protocol=explode("/",$_SERVER['SERVER_PROTOCOL']);
		array_pop($server_protocol);
		return implode("",$server_protocol).":".DS.DS.$_SERVER['HTTP_HOST'].join("/",$url).DS.$x;
	}
     
     function urt($x=''){
       $server_protocol=explode("/",$_SERVER['SERVER_PROTOCOL']);
       array_pop($server_protocol);
       return implode("",$server_protocol).":".DS.DS.$_SERVER['HTTP_HOST'].DS.$x;
     }

?>