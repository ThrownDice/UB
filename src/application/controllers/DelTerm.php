<?php

/**
 * Created by PhpStorm.
 * User: TD
 * Date: 2015-08-15
 * Time: 오전 11:17
 */
class DelTerm extends Controller
{

    /**
     * [main description]
     * @param  [type] $url [description]
     * @return [type]      [description]
     */
    public function main($url = null)
    {
        //todo : delete term data, confirm user session, auth etc
        $method = strtolower($_SERVER["REQUEST_METHOD"]);
        if($method == 'post') {
            $this->doPost();
        } else{
            //todo : 잘못된 method error 페이지로 리다이렉트
        }
    }

    function doPost($url = null){
        $response = array();
        if(isset($_GET["id"])) {
            $id = $_GET["id"];
            try{
                if(Core::getInstance("Term_md")->deleteTerm($id)){
                    $response["status"] = "success";
                    $response["text"] = "SUCCESS : ".$id." term is deleted.";
                }
            }catch(Exception $e){
                $response["text"] = "ERROR : fail to delete ".$id." term. ".$e;
            }
        } else{
            $response["status"] = "error";
            $response["text"] = "ERROR : Can't get id parameter";
        }
        print json_encode($response);
    }


}