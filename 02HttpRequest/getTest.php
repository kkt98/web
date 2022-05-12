<?php

    //한글깨짐 방지 및 응답(echo) 하는 결과 콘텐츠가 html 형식이라는 설정
    header('Content-Type:text/html; charset=utf-8');

    //php에서는 $가 변수를 지칭하는 키워드
    //사용자가 GET방식으로 보낸 값들은 $_GET[] 이라는 슈퍼전역변수에 자동 저장됨. 
    $name= $_GET['title'];
    $message= $_GET['msg'];

    //받은 결과를 확인해보기 위해 출력(응답:response)
    echo "name : " . $name . "<br>";  // . 문자열 결합 연산자 [자바언어의 + 연산자]
    echo "message : " . $message;

?>