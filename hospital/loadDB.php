<?php

    header('Content-Type:application/json; charset=utf-8');

    $uniqueid = $_GET['uniqueid'];

    $db = mysqli_connect('localhost',"sux1011","rlarlxo^^7","sux1011");
    mysqli_query($db, "set names utf8");

    $sql = "SELECT * FROM hospital WHERE uniqueid='$uniqueid'";
    $result = mysqli_query($db, $sql);

    //결과표 ($result)로부터 총 레코드(row) 수
    $row_num = mysqli_num_rows($result);

    //여러줄을 읽어야 하므로 각 줄($row배열)을 요소로 가질 빈 인덱스 배열 준비
    $rows = array();
    for($i=0; $i<$row_num; $i++){

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); //연관배열로 한줄 받기
        $rows[$i] = $row;

    }

    //$rows(2차원 배열) -->json array로 변환
    echo json_encode($rows);

?>