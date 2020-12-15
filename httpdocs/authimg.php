<?php 
/* 
 *   Filename: authimg.php 
 *   Author:   hutuworm 
 *   Date:     2003-04-28 
 *   @Copyleft hutuworm.org 
 */ 
//生成驗證碼圖片 
Header("Content-type: image/PNG");  
$p = $_GET["authnum"];
//srand((double)microtime()*1000000); 
$im = imagecreate(72,30); 
$black = ImageColorAllocate($im, 0,0,0); 
$white = ImageColorAllocate($im, 255,255,255); 
$gray = ImageColorAllocate($im, 200,200,200); 
imagefill($im,68,26,$gray); 
while(($authnum=rand()%100000)<10000);
//將四位整數驗證碼繪入圖片 
imagestring($im, 5, 10, 3, $p, $black); 
for($i=0;$i<200;$i++)   //加入干擾象素 
{ 
    $randcolor = ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255));
    imagesetpixel($im, rand()%70 , rand()%30 , $randcolor); 
} 
ImagePNG($im); 
ImageDestroy($im); 
?>