<?php

    header('Content-Type:text/plain; charset=utf-8');

    //DB 읽어오기
    //1. DB 연결
    $db = mysqli_connect("localhost","sux1011","rlarlxo^^7","sux1011");

    //2. 한글깨짐 방지
    mysqli_query($db, "set names utf8");

    //3.원하는 쿼리문 작성 및 요청 - boad2 테이블의 모든 칸과 레코드들을 가져오기
    $sql = "SELECT * FROM board2";
    $result = mysqli_query($db, $sql);//요청결과표를 리턴/ 실패시에는 false를 리턴

    if($result){
       
        //총 레코드(row) 수 읽어오기
        $row_num = mysqli_num_rows($result);
        
        //row의 개수만클 할줄씩 배열로 읽어와서 echo
        for($i=0; $i<$row_num; $i++){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);//연관배열로 한줄 읽어오기

            //각 줄안에 있는 값들(no,title,msg,date)를 echo
            //각 값들을","를 구분자로하여 각 값들을 구분할 수 있도록 포멧팅 [CSV형식과 유사하게]
            //각 줄(레코드)을 구분하기 위해 "&" 문자를 구분자로 추가
            echo $row['no'].",".$riw['title'].",".$row['msg'].",".$row['date']."&";

            //서버에서 csv형식으로 데이터를 echo하면 클라이언트쪽이 해석할때
            //불편함, 그래서 xml형식을 도입했도 지금은 json형식으로 echo함
            //php언어에는 연관배열을 json형식으로 바꿔주는 함수가 이미 존재함.
            //그래서 아주 쉽게 json형태로 echo가 가능함
            //loadDBtojaso.php 를 만들어서 json echo연습
        }

    }else{
        echo "DB읽기 오류";
    }

    //4. DB연결 종료
    mysqli_close($db);

?>