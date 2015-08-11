<?php

/**
 * Created by PhpStorm.
 * User: TD
 * Date: 2015-08-10
 * Time: 오후 2:21
 */
class Vote_md extends Model
{

    function __construct(){}

    function likeTerm($term_id, $member_id){
        try{
            if(!empty($term_id) && !empty($member_id)){
                $db = self::getDatabase();
                $stmt = $db->prepare("insert into vote (flag, term_id, member_id) values(:flag, :term_id, :member_id)");

                $stmt->bindParam(":flag", 1, PDO::PARAM_INT);
                $stmt->bindParam(":term_id", $term_id, PDO::PARAM_INT);
                $stmt->bindParam(":member_id", $member_id, PDO::PARAM_INT);

                $stmt->execute();
                return true;
            }else{
                //todo : invalid parameter
                return false;
            }
        }catch(Exception $e){
            throw new Exception("Can't insert term log. ".$e);
        }
    }

    function dislikeTerm($term_id, $member_id){
        try{
            if(!empty($term_id) && !empty($member_id)){
                $db = self::getDatabase();
                $stmt = $db->prepare("insert into vote (flag, term_id, member_id) values(:flag, :term_id, :member_id)");

                $stmt->bindParam(":flag", -1, PDO::PARAM_INT);
                $stmt->bindParam(":term_id", $term_id, PDO::PARAM_INT);
                $stmt->bindParam(":member_id", $member_id, PDO::PARAM_INT);

                $stmt->execute();
                return true;
            }else{
                //todo : invalid parameter
                return false;
            }
        }catch(Exception $e){
            throw new Exception("Can't insert term log. ".$e);
        }
    }

    function likeComment($comment_id) {

    }

    function dislikeComment($comment_id){

    }

    function calcPopTerm($term_id){

    }

    function calcPopComment($comment_id){

    }

    function deleteTermLog($term_id, $member_id){
        try{
            $db = self::getDatabase();
            $stmt = $db->prepare("delete from vote where term_id=:term_id and member_id=:member_id");

            $stmt->bindParam(":term_id", $term_id, PDO::PARAM_INT);
            $stmt->bindParam(":member_id", $member_id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }catch(Exception $e){
            throw new Exception("Can't delete term log. ".$e);
        }
    }

    function getTermLogByMemberId($member_id){
        try{
            $db = self::getDatabase();
            $stmt = $db->prepare("select * from vote where member_id=:member_id");

            $stmt->bindParam(":member_id",$member_id);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(Exception $e){
            throw new Exception("Can't get term log. ".$e);
        }
    }

    function getTermLogByTermId($term_id){
        try{
            $db = self::getDatabase();
            $stmt = $db->prepare("select * from vote where term_id=:term_id");

            $stmt->bindParam(":term_id",$term_id);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(Exception $e){
            throw new Exception("Can't get term log. ".$e);
        }
    }

}