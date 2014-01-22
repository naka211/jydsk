<?php 
//session_start();
$captcha = imagecreatefromgif('components/com_captcha/image/cross.gif');

//set some variables
$black = imagecolorallocate($captcha, 0, 0, 0);
$white = imagecolorallocate($captcha, 225, 225, 225);
$red = imagecolorallocate($captcha, 225, 0, 0);
$font = 'components/com_captcha/image/arial.ttf';

//random stuff
/*$string = md5(microtime() * time());
$text   = substr($string, 0, 5);*/
$text   = $_REQUEST['text'];

//$session =& JFactory::getSession();
//$session->set('code',$text);	
//$_SESSION['code'] = "";

//create some stupid stuff
imagettftext($captcha, 14, 5, 5, 25, $red, $font, $text);
//create image
header('content-type: image/png');
imagepng($captcha);
imagedestroy($captcha);
die;
?>