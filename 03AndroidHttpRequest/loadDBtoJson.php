<?php

    header('Content-Type:application/json; charset=utf-8');

    $db = mysqli_connect("localhost","sux1011","rlarlxo^^7","sux1011");
    
    mysqli_query($db, "set names utf8");

    $sql = "SELECT * FROM board2";
    $result = mysqli_query($db, $sql);

    $row_num = mysqli_num_rows($result);

    $rows = array(); //빈 배열
    for($i=0; $i<$row_num; $i++){

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);//한줄배열

        $rows[$i] = $row;

    }
    
    //2차원 연관배열 --> jsonArray혈식으로 변환해주는 한줄 배열
    echo json_encode($rows);

    mysqli_close($db);

?>