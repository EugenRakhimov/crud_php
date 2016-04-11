<?php
  function urlFormat($str){
  	//Strip out all whitespace
  	$str = preg_replace('/\s*/', '', $str);
  	//Convert the string to all lowercase
  	$str = strtolower($str);
  	//URL Encode
  	$str = urlencode($str);
  	return $str;
  }
?>
