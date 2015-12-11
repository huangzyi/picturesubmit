<?php
header("Content-type:text/html;charset=utf-8");
session_start();
var_dump($_SESSION['code']);
        if (!empty($_FILES['file'])) {
                var_dump($_FILES['file']);
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
                function saveFile($tmp_name, $name, $type, $lastName)
                {
                    $path = $lastName[$type];
                    move_uploaded_file($tmp_name, $path . '/' . $name);
                    echo $name . "上传成功";
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
                                saveFile($tmp_name, $name, $type, $lastName);
                             } else {
                                echo "上传图片格式错误";
                             }
                        } else {
                        echo "未上传文件";
                        }
                     }
              //  }clearstatcache();
        }
header("refresh:10;url = ../picturesubmit.php");




