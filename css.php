<?php

if(isset($_POST['submit'])){
$buffer = $_POST['css'];
/*$cssFiles = array(
  "style.css"
);
$buffer = "";
foreach ($cssFiles as $cssFile) {
  $buffer .= file_get_contents($cssFile);
}*/
//echo $buffer;
// Remove comments
$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
// Remove space after colons
$buffer = str_replace(': ', ':', $buffer);
// Remove whitespace
$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
// Enable GZip encoding.
//ob_start("ob_gzhandler");
// Enable caching
//header('Cache-Control: public');
// Expire in one day
//header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');
// Set the correct MIME type, because Apache won't set it for us
//header("Content-type: text/css");
// Write everything out
//echo $buffer;
}
?>
<div style="width:50%; float:left; overflow: auto; height: 500px">
<form name="cssmini" method="post" action="">
	<textarea name="css" style="width: 100%; height: 450px;"></textarea>
	<input type="submit" name="submit" value="Submit">
</form>
</div>
<?php if(isset($buffer)){ ?>
<div style="width:50%; float:left;  overflow: auto; height: 500px">
	<?php echo $buffer; ?>
</div>
<?php } ?>