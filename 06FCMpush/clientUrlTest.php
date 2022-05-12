<?php

    header('Content-Type:text/html; charset=utf-8');
    echo "client URL library를 통해 post메세지를 다은 서버에 전송<br><br>";

    //다른서버에 test.php 에 보낼 데이터들 배열로(연관배열)
    $postData = array("name"=>"SAM","msg"=>"Hello Android");

    //curl : 리눅스에서 웹클라이언트가 웹서버에 HTTP통신을 요청해주는 명령어
    //curl 라이브러리(PHP에서 서버에 요청하는 라이브러리) 객체 생성
    $ch = curl_init();

    //2. curl에 설치하는 옵션들
    //2.1 요청할 서버의 주소 URL - 같으서버의 문서에 접근하더라도 상대주소가 아닌 절대주소를 명시해야함
    curl_setopt($ch, CURLOPT_URL, "http://sux1011.dothome.co.kr/06FCMpush/test.php");

    //2.2요청의 응답을 받겠다는 설정
    curl_setopt($ch, CURLOPT_RETURNTRANSFER);

    //2.3 Post방식을 데이터를 보내겠다고 설정 및 보낼데이토 설정
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); //연관배열을 전송

    //3.설정했으니 curl작업 실행
    $result = curl_exec($ch); //실행된 서버의 응답결과(echo)가 리턴
    if($result) echo "성공 : " . $result . "<br>";
    else echo "실패 : " . curl_error($ch) . "<br>";

    //4.curl종료
    curl_close($ch);

?>