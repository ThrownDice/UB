<?php

/**
 * Created by PhpStorm.
 * User: TD
 * Date: 2015-08-15
 * Time: 오후 1:59
 */
class Vote
{

    public function main($url = null) {
        $method = strtolower($_SERVER["REQUEST_METHOD"]);
        if($method == 'get') {
            $this->doGet();
        } else{
            //todo : invalid method error 페이지로 리다이렉트
        }
    }

    function doGet($url = null){
        //Vote controller에 GET 요청이 오면 action 파라미터에 따라
        //like, dislike, change, cancel 액션을 취한다
        //todo : action of like, dislike term, (ajax action)
        $response = array();
        if(isset($_SESSION["member"])) {
            if(isset($_GET["term_id"]) && isset($_GET["vote"])) {
                $member_id = $_SESSION["member"]["id"];
                $term_id = $_GET["term_id"];
                $vote = $_GET["vote"];
                try{
                    //todo : need to refactoring
                    //todo : need to catch exception (e.g cant like multiple time)
                    $Vote_md = Core::getInstance("Vote_md");
                    $Term_md = Core::getInstance("Term_md");
                    switch($vote) {
                        case "like":
                            if(empty($Vote_md->getTermLog($term_id, $member_id))) {
                                $Vote_md->likeTerm($term_id, $member_id);
                                $Term_md->likeTerm($term_id);
                                $response["status"] = "success";
                            } else {
                                //todo : already voted
                                $response["status"] = "ERROR";
                                $response["text"] = "ERROR(008) : already voted";
                            }
                            break;
                        case "dislike":
                            if(empty($Vote_md->getTermLog($term_id, $member_id))) {
                                $Vote_md->dislikeTerm($term_id, $member_id);
                                $Term_md->dislikeTerm($term_id);
                                $response["status"] = "success";
                            } else {
                                //todo : already voted
                                $response["status"] = "ERROR";
                                $response["text"] = "ERROR(008) : already voted";
                            }
                            break;
                        case "change":
                            if(isset($_GET["flag"])) {
                                $flag = $_GET["flag"];
                                $Vote_md->changeTermLog($term_id, $member_id);
                                $Term_md->changeVoteTerm($term_id, $flag);
                                $response["status"] = "success";
                            } else{
                                $response["status"] = "ERROR";
                                $response["text"] = "ERROR(009) : invalid parameter";
                            }
                            break;
                        case "cancel":
                            if(isset($_GET["flag"])) {
                                if(!empty($Vote_md->getTermLog($term_id, $member_id))) {
                                    $flag = (int)$_GET["flag"];
                                    if($flag==1) $Term_md->decreaseLike($term_id);
                                    else $Term_md->decreaseDislike($term_id);
                                    $Vote_md->deleteTermLog($term_id, $member_id);
                                    $response["status"] = "success";
                                } else {
                                    //이미 취소 되었거나 vote 기록이 없는 경우
                                    $response["status"] = "ERROR";
                                    $response["text"] = "ERROR(007) : no vote record";
                                }
                            } else{
                                $response["status"] = "ERROR";
                                $response["text"] = "ERROR(004) : invalid parameter";
                            }
                            break;
                        default:
                            //todo : invalid vote parameter
                            $response["status"] = "ERROR";
                            $response["text"] = "ERROR(010) : invalid parameter";
                    }
                } catch(Exception $e){
                    $response["status"] = "error";
                    $response["text"] = "ERROR(011) : server error";
                }
            } else{
                $response["status"] = "error";
                $response["text"] = "ERROR(012) : Invalid parameter";
            }
        } else{
            //세션이 없으면 로그인이 필요하다는 에러 코드를 보낸다
            //todo : need to login
            $response["status"] = "error";
            $response["text"] = "ERROR(013) : Need to login";
        }
        print json_encode($response);
    }

}