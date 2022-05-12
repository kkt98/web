<?php

    //echo는 json형식으로 한글깨짐 방지
    header('Content-Type:application/json; charset=utf-8');

    //GET방식으로 전달된 2개의 데이터 받기
    $title= $_GET['title'];
    $message= $_GET['msg'];

    //받은 데이터를 확인하기 위해 응답(response) - echo
    //json형식으로 리턴할 수 있도록

    //$title, $message 를 연관배열로 만들기
    $arr= array();
    $arr['title']= $title;
    $arr['msg']= $message;

    // 연관배열 --> json문자열
    echo json_encode($arr);    

?>