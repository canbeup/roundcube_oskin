<?php
$files = array();
$backgroundsDir = dirname(__FILE__).'/backgrounds/';
if($handle = @opendir($backgroundsDir)) {
	while($file = readdir($handle)) {
		if($file != '.' AND $file != '..' AND mime_content_type($backgroundsDir.$file) == 'image/jpeg') {
			$files[] = $file; }}}		

$bg_file = $backgroundsDir.$files[array_rand($files)];
if (file_exists($bg_file)) {
	$fd = fopen($bg_file, "r");
	$cacheContent = fread($fd, filesize($bg_file));
	fclose($fd);
	header('Content-type: image/jpeg');
	echo ($cacheContent);
	exit;
}
?>