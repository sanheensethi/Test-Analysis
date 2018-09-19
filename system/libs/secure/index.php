<?php
	function secure($data){
		return htmlentities(htmlspecialchars(trim($data," ")));
	}
?>