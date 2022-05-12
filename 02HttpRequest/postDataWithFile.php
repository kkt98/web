<?php

    header('Content-Type:text/html; charset=utf-8');

    //사용자로 부터 전달된 데이터와 파일정보 받기
    $title= $_POST['title'];
    $message= $_POST['msg'];

    $file= $_FILES['img'];
    //파일의 세부정보 중 사용할 것들
    $srcName= $file['name'];       //원본파일명
    $tmpName= $file['tmp_name'];   //임시저장된 파일명

    //영구히 저장될 파일의 위치와 파일명[중복되지 않도록 date()함수 이용]
    $dstName= "./uploads/" . date('YmdHis') . $srcName; // . 결합연산자

    //임시저장소 파일($tmpName)을 원하는 위치($dstName)로 이동
    $moveResult= move_uploaded_file($tmpName, $dstName);
    if($moveResult) echo "upload success <br>";
    else echo "upload fail <br>";

    //저장되는 날짜와 시간
    $now= date("Y/m/d H:i:s"); //"2022/03/39 14:34:23"

    //정보들 확인해보고 싶다면..echo
    // echo "$title <br>";
    // echo "$message <br>";
    // echo "$dstName <br>";

    //전송된 데이터들($title, $message, $dstName)을 Database에 저장
    //dothome 서버에는 이미 APM(Apache-Php-MySQL)이 모두 설치된 상태임.

    //MySQL이라는 DBMS를 이용하여 데이터들 저장하기
    //dothome 사이트에서 미리 MySQL안에 'board'라는 이름의 테이블(표)을 생성해 놓기

    //1. MySQL DB에 접속하기..
    $db= mysqli_connect("localhost","sux1011","rlarlxo^^7","sux1011");//DB서버주소, DB접속ID, DB접속비번, DB명
    //$db : 연결된 DB를 제어하는 객체

    //2. DB안에 한글데이터가 깨지지 않도록
    mysqli_query($db, "set names utf8");

    //3. 원하는 작업 요청 - DB제어 언어인 SQL 언어의 문법으로 요청
    //전송된 데이터들($title, $message, $dstName)를 'board'라는 테이블(표)에 삽입(insert)하는 명령어[SQL]
    $sql= "INSERT INTO board(title, msg, file, date) VALUES('$title','$message','$dstName','$now')";
    $result= mysqli_query($db, $sql); //요청 결과를 리턴해줌[true/false]
    if($result){
        echo "insert success";
    }else{
        echo "insert fail";
    }

    //4. DB와의 연결 종료
    mysqli_close($db); 

?>