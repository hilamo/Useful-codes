<?php 
	$reflFunc = new ReflectionFunction('function_name');
	print $reflFunc->getFileName() . ':' . $reflFunc->getStartLine();
?>