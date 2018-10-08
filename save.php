<?php
/**
 * Created by PhpStorm.
 * User: 12947
 * Date: 2018/10/6
 * Time: 20:18
 */
header("Content-type:text/html;charset=utf-8");
include('input.php');
include ('connect.php');
$content = $_POST['content'];
$user = $_POST['user'];


$input = new input();


//调用函数检查留言内容
$is = $input->post($content);
if ($is == false) {
    die('留言内容的数据不正确');
}

//调用函数检查留言人
$is = $input->post($user);
if ($is == false) {
    die('留言人的数据不正确');
}

//将数据写入数据库



$time = time();
$sql = "INSERT INTO msg (content,user,intime) VALUES ('{$content}','{$user}','{$time}')";
$sql=
$is = $db->query($sql);

header("location:gbook.php");



