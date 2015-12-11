<?php
header("Content-type:text/html;charset=utf-8");
session_start();
        if (!empty($_FILES['file'])) {
                $file = $_FILES['file'];
                $name = $file['name'];
                $type = $file['type'];
                $tmp_name = $file["tmp_name"];

                $allow_type = [
                    'image/jpg',
                    'image/jpeg',
                    'image/gif',
                    'image/png'
                ];
                $lastName = [
                    'image/jpg' => 'jpg',
                    'image/jpeg' => 'jpg',
                    'image/gif' => 'gif',
                    'image/png' => 'png'
                ];
            $path = $lastName[$type];

            function saveFile($tmp_name, $name, $path)
                {
                    move_uploaded_file($tmp_name,"../". $path . '/' . $name);
                    echo $name . "上传成功";
                }
            /*
                function createThumbnail($path,$name)
                {
                    // The file
                    $filename = "../$path/$name";
                    var_dump($filename);
                    // Set a maximum height and width

                    $width = 20;
                    $height = 20;
                    // Content type
                    header('Content-Type: image/jpeg');

                    list($width_orig, $height_orig) = getimagesize($filename);
                    // Resample
                    $image_p = imagecreatetruecolor($width, $height);
                    $image = imagecreatefromjpeg($filename);
                    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    // Output
                    imagejpeg($image_p, null, 100);

                }
            /*
                if(!is_uploaded_file($_FILES['file'])){
                    echo "传送方式错误";
                }
                else {
            */
                    if ($_POST['vertificationCode'] !== $_SESSION['code']) {
                        echo '验证码错误';
                    } else {
                        if ($type != '') {
                            if (in_array($type, $allow_type)) {
                                saveFile($tmp_name, $name, $path);
                               // createThumbnail($path,$name);
                             } else {
                                echo "上传图片格式错误";
                             }
                        } else {
                        echo "未上传文件";
                        }
                     }
              //  }clearstatcache();
        }
//header("refresh:10;url = ../picturesubmit.php");




