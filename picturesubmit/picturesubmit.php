<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图片上传</title>
    <style>
        #vertificationPicture {
            cursor: pointer;
            width: 100px;
            height: 30px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <form action="php/vertifyCode.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file"/></br></br>
        <input type="text" name="vertificationCode">
        <img
            id="vertificationPicture"
            onclick="change(this);"
            src='php/CreateCode.php'
            title="看不清楚，换一张"
        /></br></br>
        <input type="submit" name="submit" />
        <script type="text/javascript">
            function change(it){
                it.src="./php/CreateCode.php?"+Math.random()*10000;
            }
        </script>
    </form>
</body>
</html>
