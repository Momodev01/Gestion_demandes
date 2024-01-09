<?php

function arrayToJson(array $newData, string $key){
    $dataArr = jsonToArray();
    $dataArr[$key][] = $newData;
    $json = json_encode($dataArr);
    file_put_contents(BD, $json);
}

function jsonToArray(string $key=null):array{
    $json=file_get_contents(BD);
    $dataArr=json_decode($json, true);
    if ($key == null) {
        return $dataArr;
    }

    return $dataArr[$key];
}