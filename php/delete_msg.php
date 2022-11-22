<?php
    //连接数据库，设置编码等操作
    header("Content-type: text/html; charset=utf-8");
    $link=mysqli_connect("localhost:3306","bo","123456") OR die('Could not connect to database.');
    mysqli_select_db($link, "chenjiabo");
    mysqli_query($link, "set names utf8");

    $id = trim($_GET['id']);

    if ($id == '') {
        echo json_encode(array('code' => -1));
        exit(-1);
    }
    $sql="DELETE FROM `bo_message` WHERE `bo_message`.`id` = '$id'";
    $result = mysqli_query($link, $sql);

    echo json_encode(array('code' => 1));

    mysqli_close($link); //断开连接
?>