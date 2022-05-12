<?php

    header('Content-Type:text/html; charset=utf-8');
    echo "FCM push서버에 메세지를 전송합니다. <br>"

    //FCM서버에 보낼 데이터
    //1. 메세지를 받을 디바이스의 고유 토큰값들 배열 - 원래 이 값은 DB에 있어야함.
    //2. 알림(notification)메세지 타입정보 또는 데이터(data)타입 메세지 정보

    //1) 토큰들
    $tokens = array(
        'dMrVMCIYQlyn4LRdVt09Re:APA91bHYZM6vfFBkCpt0bvy8Zl7UGcLB_NQYqLbhflc19OOlYUSCrY-YKra03rjNHxsVFrdBlcq6osFk3xIaQSQFMhslC55-AsJzub0-cM0LdgdGg0zgcZZvl-eMswcDYb5WosUZP_HS',
        'fLh_cQKoR-ealKci3IXL5e:APA91bEfYQ_-6G2h3AEwYlZWt1P0wlaSvXIJFdi6CPKUkLeBddibignlxui95s3VqWIUczKHwFHt2qW4BZc_4k9WhbeTcKoLsSsPpG0ysRV03Q0ToSW2DKY8XnKO-jrZNvx5VtfldjJz'
    );

    //2) 알림메세지유형 또는 데이터메세지유형
    //2.1)알림 타입 메세지 정보(제목, 텍스트)
    $noti = array("title"=>"FCM push", "body"=>"This is notification message type.");

    //2.2) 데이터 타입의 메세지 정보
    $name = $_POST['name'];
    $message = $_POST['msg'];
    $data = array("name"=>$name, "msg"=>$message); //연관배열로

    //TEST1) FCM서버에 보낼 메세지 타입 2종류를 모두 다 전달
    //서버에 보냏 데이터를 하나의 연관배열로 묶기
    // $postData = array(
    //     "registration_ids"=>$tokens,
    //     "notification"=>$noti,
    //     "data"=>$data
    // );

    //TEST2) 데이터 타입 메세지만 보내기 안드로이드에서 백그라운드일때도 기본알림으로 보이기위해
    // $postData = array(
    //     "registration_ids"=>$tokens,
    //     "data"=>$data
    // );

    //TEST3) 주제(Topic)를 구독한 디바이스만 push message를 받도록.
    $postData = array(
        "condirion"=>"'FCM' in topics",
        "data"=>$data
    );

    //FCM서버는 본인에게 보낼 데이터를 연관배열이 아니라 json문자열로 보내도록함.
    $postDataJson = json_encode($postData); //연관배열 --> json문자열

    //위 데이터를 FCM에 보내려면
    //FCM서버에 접속하는 접속 서버key가 필요함.[fierbase console 사이트에서 해당프로젝트 설정에서 확인가능함]
    //서버키는 요청Body에 보내는것이 아니라 Header정보로 보냄
    //FCM서버로 요청할때 필요한 헤더정보 설정 - 연관배열
    //1. 서버키 : FCM에 접속할 수 있는 권한 키
    //2. 내가 보내는 데이터가 json혈식이라고 명시
    $serverkey = 'AAAAPAKEbU8:APA91bFE7gJyDAtJD5a4Y-87_XLPm7GMQ6hFNqRnCQu6mmg0TvfuUrs8ptVJhoSlUkEp1NeV9q0GzkQXdzlmaexKO5otR4sER6uDE2SnJEhOB6vUh2V2XAy_EniUp6r-3LE6kfSDUSpR';
    $headers = array(
        'Authorization:key=' . $serverkey,
        'Content-type:application/json'
    );

    //curl을 통해 전송작업
    
    //1. curl 초기화
    $ch = curl_init();

    //2.옵션들 설정
    //1)요청 URL
    curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/fcm/send");

    //2)요청 결과 응답받겠다고 설정
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //3)저 위에서 설정했던 Header정보 설정
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    //4)POST메소드로 보낼 json데이터들 설정
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataJson); //json형식의 데이터

    //3.실행
    $result = curl_exec($ch);
    if($result == false) echo "실패 : " . curl_error($ch);
    else echo "FCM전송에 성공";

    //4. 닫기
    curl_close($ch);
?>