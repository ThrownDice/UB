<?php

/**
 * Created by PhpStorm.
 * User: TD
 * Date: 2015-07-21
 * Time: ���� 4:40
 */
class Member extends Controller
{
    function __construct(){

    }


    public static function create(){

    }

    public static function read(){

    }

    public static function update(){

    }

    public static function delete(){

    }

    public function main($url = null){
        if(isset($_GET["action"])){
            $action = $_GET["action"];
        }else{
            $action = "read";
        }

        switch($action){
            case "create":
                if(strtolower($_SERVER["REQUEST_METHOD"]) == "get"){
                    require_once APPPATH.'views'.DS.'templates'.DS.'template_member_add.php';
                }else{
                    //todo : create new member
                    $member = array();
                }
                break;
            case "update":
                break;
            case "delete":
                break;
            case "read":
            default:

        }

    }

    function render($file_template){

    }

}