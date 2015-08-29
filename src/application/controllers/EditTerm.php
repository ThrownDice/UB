<?php

/**
 * Created by PhpStorm.
 * User: TD
 * Date: 2015-08-15
 * Time: 오전 11:17
 */
class EditTerm extends Controller
{

    /**
     * [main description]
     * @param  [type] $url [description]
     * @return [type]      [description]
     */
    public function main($url = null)
    {
        $method = strtolower($_SERVER["REQUEST_METHOD"]);
        if($method == 'get') {
            $this->doGet();
        } else if($method == 'post') {
            $this->doPost();
        } else{
            //todo : 잘못된 method error 페이지로 리다이렉트
        }
    }

    function doGet($url = null){
        //id값을 get 파라미터로 받아서 해당 id에 대한 데이터를 가져온 후 에디터 페이지를 렌더링한다
        if(isset($_GET["id"])) {
            $id = $_GET["id"];
            $data["toEdit"] = Core::getInstance("Term_md")->getTermExact($id);
            $data["recent_index_pane"] = Core::getInstance("Term_md")->getRecentTerm();
            $this->view->setElems(array("term_edit"));
            $this->view->render("tmpl_term_add", $data);
        } else{
            //todo : invalid parameter error 페이지로 리다이렉트
        }
    }

    function doPost($url = null){
        //word, def, id를 POST 데이터로 받아서 id에 해당하는 데이터를 업데이트 한다
        $term = array();
        if(isset($_POST["word"])) $term["word"] = $_POST["word"];
        if(isset($_POST["def"])) $term["def"] = $_POST["def"];
        if(isset($_POST["id"])) $term["id"] = $_POST["id"];
        $result = Core::getInstance("Term_md")->updateTerm($term);
        if($result){
            //todo : redirect term exact page
            $this->redirect("/term/".$term["id"]);
        } else {
            //todo : redirect error page
        }
    }

}