<?php

    header('Content-Type:application/json; charset=utf-8');

    //@Body로 보낸 json문자열을 $_POST 라는 배열에 자동 저장되지 않음.
    //$_title = $_POST['title']; //값이 전달되지 못함.

    //json으로 넘어온 데이터는 별도의 임시공간[php://input]에 파일로 보관되어있음.
    //그 파일을 읽어와서 $_POST라는 배열변수에 대입하기
    $data = file_get_contents('php://input');
    $_POST = json_decode($data, true); //json --> 연관배열로 변환

    $title = $_POST['title'];
    $messag = $_POST['msg'];

    //원래는 이런 데이터들을 DB에 저장하는 등의 작업을 함
    //지금은 그냥 테스트 목적으로 다시 echo하기

    $arr = array();
    $arr['title'] = $title;
    $arr['msg'] = $messag;

    //연관배열 --> json배열
    echo json_encode($arr);

?>
