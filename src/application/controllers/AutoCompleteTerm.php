<?php

/**
 * AutoCompleteTerm
 * search 를 위해 음절을 입력할 때 마다 검색어 자동완성을 위한 ajax 요청에 대해
 * 단어 리스트를 제공하는 컨트롤러
 */
class AutoCompleteTerm
{

    function main($url = null) {
        if (strtolower($_SERVER["REQUEST_METHOD"]) == "get") {
            $this->doGet($url);
        }
    }

    function doGet($url = null) {
        $response = array();
        try {
            $chars = trim($_GET["keyword"]);
            $data = Core::getInstance("Term_md")->getTermsBySyllable($chars);
            $response["data"] = Core::getInstance("Term_md")->getTermsBySyllable($chars);
            $response["status"] = "success";
        } catch (Exception $e) {
            $response["status"] = "fail";
            $response["text"] = $e;
        }
        echo json_encode($response);
    }

}