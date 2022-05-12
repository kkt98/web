<?php

    header('Content-Type:text/plain; charset=utf-8');

    $title = $_POST['title'];
    $message = $_POST['msg'];

    $now = date('Y-m-d H:i:s'); //"2022-03-30 10:49:32"

    //MySQL DBMS를 아용하여 DB에 데이터 삽입(insert)
    //1. DB서버에 접속
    $db = mysqli_connect("localhost","sux1011","rlarlxo^^7","sux1011");//DB서버의 주소, 접속id, 접속pw, DB이름

    //2. 한글깨짐 방지
    mysqli_query($db, "set names utf8");

    //3.원하는 쿼리문 작성 및 요청 [테이블명 : board2]
    $sql = "INSERT INTO board2(title, msg, date) VALUES('$title','$message','$now')";
    $result = mysqli_query($db, $sql); //요청결과를 true/false로 리턴해줌

    if($result) echo "insert success";
    else echo "insert fail";

    //4. Db연결
    mysqli_close($db);

?>