<?php

$jquery = function($version){
	$link = "";
	switch($version){
		case 1102 : $link = "http://code.jquery.com/jquery-1.10.2.min.js";
		break;
		case 203 : $link = "http://code.jquery.com/jquery-2.0.3.min.js";
		break;
		default : $link = "http://code.jquery.com/jquery-latest.min.js";
		break;
	}
	return $link;
};

