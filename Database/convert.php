<?php

function jsonToArray(string $key=null):array{
    $json=file_get_contents(BD);
    $dataArr=json_decode($json, true);
    if ($key == null) {
        return $dataArr;
    }
    return $dataArr[$key];
}

function arrayToJson(array $newData, string $key){
    $dataArr = jsonToArray();
    $dataArr[$key][] = $newData;
    $json = json_encode($dataArr);
    file_put_contents(BD, $json);
}

function arrayToJson1(array $newclasse, string $key){
    $dataArr = jsonToArray();
    $dataArr[$key][] = $newclasse;
    $json = json_encode($dataArr);
    file_put_contents(BD, $json);
}

function arrayToJson2(array $newstudent, string $key){
    $dataArr = jsonToArray();
    $dataArr[$key][] = $newstudent;
    $json = json_encode($dataArr);
    file_put_contents(BD, $json);
}