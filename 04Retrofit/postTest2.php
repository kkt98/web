<?php

    header('Content-Type:application/json; charset=utf-8');

    //@Field로 보낸 POST데이터들을 기존처럼 $_POST 라는 슈퍼전역변수에 저장되어 있음.
    $title = $_POST['title'];
    $message = $_POST['msg'];

    //제대로 받았는지 확인하기 위해 다시 echo 단, json형식으로
    $arr = array();
    $arr['title'] = $title;
    $arr['msg'] = $message;

    //연관배열 --> json 변환 echo
    echo json_encode($arr);


?>