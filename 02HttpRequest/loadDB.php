<?php

    header('Content-Type:text/html; charset=utf-8');

    //1. MySQL DB에 접속
    $db= mysqli_connect("localhost","sux1011","rlarlxo^^7","sux1011");

    //2. 한글깨짐 방지
    mysqli_query($db, "set names utf8");

    //3. 원하는 쿼리문 요청
    // board 테이블의 모든 칸(*)의 모든 레코드(WHERE절이 생략) 데이터들을 읽어오기(SELECT 쿼리문)
    $sql= "SELECT * FROM board";
    $result= mysqli_query($db, $sql); //검색된 결과표를 리턴해 줌/ 실패하면 false가 리턴됨
    //$result는 검색결과표를 가진 객체!!
    if($result){

        //총 레코드(한줄:row) 수
        $rowCnt= mysqli_num_rows($result);

        //DB 데이터는 한줄씩 읽어옴
        for($i=0; $i<$rowCnt; $i++){
            //한줄 데이터를 연관배열로 내려받기 [연관배열 : 방번호 대신에 컬룸명으로 식별]
            $row= mysqli_fetch_array($result, MYSQLI_ASSOC);
            //MYSQLI_ASSOC : 연관배열
            //MYSQLI_NUM   : 인덱스배열

            $no= $row['no'];
            $title= $row['title'];
            $message= $row['msg'];
            $file= $row['file'];
            $date= $row['date'];

            echo "$no <br>";
            echo "<h4>$title</h4>";
            echo "<p>$message</p>";

            if($file!=null) echo "<img src='$file' width='50%'><br>";

            echo $date ."<br>";
            echo "====================================<br><br>";
        }//for...

    }else{
        echo "검색실패";
    }

    //4. DB연결 종료
    mysqli_close($db);

?>