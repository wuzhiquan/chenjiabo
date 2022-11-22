<?php
    //连接数据库，设置编码等操作
    header("Content-type: text/html; charset=utf-8");
    $link=mysqli_connect("localhost:3306","bo","123456") OR die('Could not connect to database.');
    mysqli_select_db($link, "chenjiabo");
    mysqli_query($link, "set names utf8");

    $order = 'time';
    $sql='SELECT * FROM bo_message ORDER BY `bo_message`.`'.$order.'` DESC';
    $result = mysqli_query($link, $sql);
    //如果查找不到数据，返回没有数据
    if (mysqli_num_rows($result) == 0) {
        $datares = json_encode(array('code' => -1, 'msg' => 'no data'));
        echo $datares;
        exit(-1);
    }

    $data = array();
    class Msg {
        public $id;
        public $name;
        public $email;
        public $phone;
        public $content;
        public $time;
    }
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $msg = new Msg();
        $msg->id = $row['id'];
        $msg->name = $row['name'];
        $msg->email = $row['email'];
        $msg->phone = $row['phone'];
        $msg->content = $row['content'];
        $msg->time = $row['time'];
        // $data[] = $msg;
        array_push($data, $msg);
    }
    echo json_encode(array('code' => 0, 'result' => $data));

    mysqli_free_result($result); //释放资源
    mysqli_close($link); //断开连接
?>