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

                    var_dump($_FILES);

                    //todo : create new member
                    if( isset($_POST["email"]) && isset($_POST["password"])
                        && isset($_POST["password_cfm"]) && isset($_POST["nickname"])){
                        if(!strcmp($_POST["password"],$_POST["password_cfm"])){
                            $member = array();
                            if(isset($_FILES["photo"]["tmp_name"]) && !empty($_FILES["photo"]["tmp_name"])){
                                //todo : restrict maximum file size by using constant in config.xml
                                if($_FILES["photo"]["size"] < 10000000){
                                    $image_info = getimagesize($_FILES['photo']['tmp_name']);
                                    //todo : image resize (make thumbnail profile image)
                                    $member["img"] = fopen($_FILES["photo"]["tmp_name"],"rb");
                                }
                            }
                            $member["email"] = $_POST["email"];
                            $member["password"] = $_POST["password"];
                            $member["nickname"] = $_POST["nickname"];
                            try{
                                if(Core::getInstance("Member_md")->addMember($member)){
                                    //todo : return success page
                                    $this->redirect("/term");
                                }else{
                                    //todo : redirect 500 page
                                }
                            }catch(Exception $e){
                                //todo : redirect 500 page;
                                echo $e;
                            }
                        }else{
                            //todo : invalid password
                        }
                    }else{
                        //todo : invalid parameter
                    }
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