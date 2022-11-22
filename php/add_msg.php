<?php
    if ($_POST) {
        @$name = trim($_POST['name']);
        @$email = trim($_POST['email']);
        @$phone = trim($_POST['phone']);
        @$content = trim($_POST['content']);

        //连接数据库，设置编码等操作
        header("Content-type: text/html; charset=utf-8");
        $link=mysqli_connect("localhost:3306","bo","123456") OR die('Could not connect to database.');
        mysqli_select_db($link, "chenjiabo");
        mysqli_query($link, "set names utf8");


        $sql="INSERT INTO bo_message(name,email,phone,content) VALUES('$name','$email','$phone','$content')";
        $result = mysqli_query($link, $sql);
        echo $result;

        mysqli_close($link); //断开连接
    }
?>