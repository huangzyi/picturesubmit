<?php
/**
 * Created by PhpStorm.
 * User: huangzyi
 * Date: 2015/12/8
 * Time: 23:42
 */
session_start();
$code_length = 5;
$image_args = [
    'width' => 100,
    'height' => 30
];
$width  =$image_args['width'];
$height = $image_args['height'];
$str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$code = null;
for($i = 0 ; $i < $code_length; $i++) {
    $code .= $str[rand(0,62)];//生成随机数
}
$image = imagecreate($image_args['width'], $image_args['height']);
$a = rand(0,255);
$b = rand(0,255);
$c = rand(0,255);
//设置随机颜色
$background = imagecolorallocate($image, $a, $b, $c);//背景颜色
$text = imagecolorallocate($image, 255-$a, 255-$b,255-$c);//文字颜色正好和背景颜色相反

for ($i=0; $i < 500; $i++) {
    $dotColor = imagecolorallocate(
        $image,
        rand(0, 255),
        rand(0, 255),
        rand(0, 255)
    );//随机生成点的颜色
    imagesetpixel(
        $image,
        rand(0, $image_args['width']),
        rand(0, $image_args['height']),
        $dotColor
    );//随机生成50个点
    /*
    $arcColor = imagecolorallocate(
        $image,
        rand(0,255),
        rand(0,255),
        rand(0,255)
    );//随机生成弧线的颜色
    */
    /*
    $lineColor = imagecolorallocate(
        $image,
        rand(0,255),
        rand(0,255),
        rand(0,255)
    );//随机生成直线的颜色
    */
    //imagearc($image, rand(0,$width) , rand(0,$height),20,20,75,170, $arcColor);    //加入弧线状干扰素
    //imageline($image, rand(0,$width) ,rand(0,$height) ,rand(0,$image_args['width']) ,rand(0,$image_args['height']), $lineColor);    //加入线条状干扰素
}
imagestring($image, 20, 20, 6, $code, $text);

ob_clean();
header('Cache-Control: private,max-age=xxx, no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header("content-type: image/png");
imagepng($image);
$_SESSION['code'] = $code;  ;  ;
imagedestroy($image);
