<?php
    header('Content-type:text/html; charset=urf-8');

    echo "Test result<br>";

    //clientUrlTest.php 웹프로그램에서 POST 방식으로 전달한 데이터들
    $name = $_POST['name'];
    $message = $_POST['msg'];

    echo "name : $name<br>";
    echo "msg : $message<br>";
?>