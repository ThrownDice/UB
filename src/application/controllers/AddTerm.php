<?php

/**
 * Created by PhpStorm.
 * User: TD
 * Date: 2015-08-15
 * Time: 오전 11:16
 */
class AddTerm extends Controller
{


    /**
     * [main description]
     * @param  [type] $url [description]
     * @return [type]      [description]
     */
    public function main($url = null)
    {
        //AddTerm에서는 GET 요청을 받으면 단어를 추가할 수 있는 페이지를 반환하고
        //POST 요청을 받으면 POST로 받은 데이터로 새로운 단어를 추가한다
        $method = strtolower($_SERVER["REQUEST_METHOD"]);
        if($method == 'get') {
            $this->doGet();
        } else{
            $this->doPost();
        }
    }

    function doGet($url = null) {
        //단어를 추가하는 페이지를 렌더링한다
        $this->view->setElems(array("term_edit"));
        $this->view->render("tmpl_kiwi", null);
    }

    function doPost($url = null) {
        //POST로 데이터를 받아서 새로운 단어를 추가한다
        $term = array();
        if(isset($_POST["word"])) $term["word"] = $_POST["word"];
        if(isset($_POST["def"])) $term["def"] = $_POST["def"];
        $id = Core::getInstance("Term_md")->addTerm($term);
        $this->redirect("/term/".$id);
    }



}