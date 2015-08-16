<?php  
/**
 * Term_md file.
 */

	// Debugging.
	__debug_load(__FILE__);


/**
 * Term_md class.
 * Inherits Model.
 */
class Term_md extends Model {

	function __construct() {}

	function getTerm() {}

	/**
	 * getRelatedTerm
	 *
	 * word 파라미터를 받아서 해당 word를 포함하고 있는 데이터를 검색해서 리턴한다
	 *
	 * @param $word
	 * @return mixed
	 * @throws Exception
	 */
	function getRelatedTerm($word){
		try {
			if(!empty($word)) {
				$db = self::getDatabase();

				$stmt = $db->prepare("select * from term where word like %:word%");
				$stmt->bindParam(":word", $word, PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetchAll();
			}
		} catch(Exception $e){
			throw new Exception("Can't get related term. ".$e);
		}
	}

	/**
	 * get term which id is parameter $id
	 * @param	int	$id term id
	 * @return mixed (is there is no term, then return null)
	 * @throws Exception
	 */
	function getTermExact($term_id) {
		try{
			if($term_id) {

				$db = self::getDatabase();

				######### TESTING ##########
				$stmt = $db->prepare("select * from term where id = :id");
				//$STMT = $this->db->prepare("select * from term where id = :id");

				$stmt->bindParam(":id", $term_id, PDO::PARAM_INT);
				$stmt->execute();
				return $stmt->fetchAll()[0];
			}else{
				return null;
			}
		}catch(Exception $e){
			throw new Exception("Can't get term id='$term_id'. ".$e);
		}
	}

	function getTermExactWithMemberVote($term_id, $member_id){
		try {
			if($term_id && $member_id){
				$db = self::getDatabase();
				$stmt = $db->prepare("select term.*, vote.flag, vote.member_id, vote.term_id from term left join vote on term.id = vote.term_id and vote.member_id = :member_id where term.id = :term_id");


				$stmt->bindParam(":term_id", $term_id, PDO::PARAM_INT);
				$stmt->bindParam(":member_id", $member_id, PDO::PARAM_INT);
				$stmt->execute();
				return $stmt->fetchAll()[0];
			}else{
				return false;
			}
		} catch(Exception $e) {
			throw new Exception("Can't get term id='$term_id'. ".$e);
		}
	}

	function getTermByWord($word){
		try {
			if($word){
				$db = self::getDatabase();
				$stmt = $db->prepare("select * from term where word = :word");

				$stmt->bindParam(":word", $word, PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetchAll();
			}else{
				return false;
			}
		} catch(Exception $e) {
			throw new Exception("Can't get term word='$word'. ".$e);
		}
	}

	function getTermByWordWithMemberVote($word, $member_id){
		try {
			if($word){
				$db = self::getDatabase();
				$stmt = $db->prepare("select term.*, vote.* from term left join vote on term.id = vote.term_id and vote.member_id = :member_id where word = :word");

				$stmt->bindParam(":word", $word, PDO::PARAM_STR);
				$stmt->bindParam(":member_id", $member_id, PDO::PARAM_INT);
				$stmt->execute();
				return $stmt->fetchAll();
			}else{
				return false;
			}
		} catch(Exception $e) {
			throw new Exception("Can't get term word='$word'. ".$e);
		}
	}


	/**
	 * get recently added term
	 * @param int $num
	 * @return mixed
	 */
	function getRecentTerm($num = 10){
		$db = self::getDatabase();
		$num = (int)$num;
		$stmt = $db->prepare("select * from term order by `date` desc limit :num");
		$stmt->bindParam(":num", $num, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function getRecentTermWithMemberVote($num = 10, $member_id){
		try{
			if(!empty($member_id)){
				$db = self::getDatabase();
				$stmt = $db->prepare("select term.*, vote.flag, vote.member_id, vote.term_id  from term left join vote on term.id = vote.term_id and vote.member_id = :member_id order by `date` desc limit :num");
				$num = (int)$num;
				$stmt->bindParam(":member_id", $member_id, PDO::PARAM_INT);
				$stmt->bindParam(":num", $num, PDO::PARAM_INT);
				$stmt->execute();
				return $stmt->fetchAll();
			}else{
				//todo : invalid member_id
				return false;
			}
		}catch(Exception $e){
			throw new Exception("Can't get recent term. ".$e);
		}
	}


	function getSuggestedTerm($num = null){
		//todo : ?
	}

	function getOtherDef($word, $num = 3){
		//todo : ?
	}

	function addTerm($term){
		try{
			//todo : validation of $term
			$db = self::getDatabase();
			$stmt = $db->prepare("insert into term (lemma, word, def, `date`, `like`, dislike, hit) values(:lemma, :word, :def, now(), :like, :dislike, :hit)");

			if(isset($term["word"]) && isset($term["def"])){
				$word = $term["word"];
				$def = $term["def"];
				$lemma = isset($term["lemma"]) ? $term["lemma"] : $word;
				$like = isset($term["like"]) ? $term["like"] : 0;
				$dislike = isset($term["dislike"]) ? $term["dislike"] : 0;

				//todo : calculate hit rate
				$hit = 0;
				$stmt->bindParam(":lemma", $lemma);
				$stmt->bindParam(":word", $word);
				$stmt->bindParam(":def", $def);
				$stmt->bindParam(":like", $like);
				$stmt->bindParam(":dislike", $dislike);
				$stmt->bindParam(":hit", $hit);
				$stmt->execute();
				return $db->lastInsertId();
			}else{
				return null;
			}


		}catch(Exception $e){
			throw new Exception("Can't insert term,".json_encode($term)." ".$e);
		}
	}

	function deleteTerm($id){
		try{
			if($id){
				$db = self::getDatabase();
				$stmt = $db->prepare("delete from term where id = :id");
				$stmt->bindParam(":id", $id, PDO::PARAM_INT);
				$stmt->execute();
				return true;
			}else{
				return false;
			}
		}catch(Exception $e){
			throw new Exception("Can't delete term id='$id'. ".$e);
			return false;
		}
	}

	function updateTerm($term){
		//todo : we should support partial update, not fully update
		try{
			if(isset($term["id"]) && isset($term["word"])){

				//todo : validation of $term
				$db = self::getDatabase();
				$stmt = $db->prepare("update term set lemma=:lemma, word=:word, def=:def where id=:id ");

				$id = $term["id"];
				$word = $term["word"];
				$lemma = isset($term["lemma"]) ? $term["lemma"] : $term["word"];;
				$def = isset($term["def"]) ? $term["def"] : null;

				$stmt->bindParam(":id", $id);
				$stmt->bindParam(":lemma", $lemma);
				$stmt->bindParam(":word", $word);
				$stmt->bindParam(":def", $def);

				$stmt->execute();
				return true;
			}else{
				throw new Exception("Can't get parameter.");
			}
		}catch(Exception $e){
			throw new Exception("Can't update term,".json_encode($term)." ".$e);
		}
	}

	//todo : important!! method naming is very messy, must be refactored!

	function likeTerm($term_id){
		try{
			if(!empty($term_id)){
				$db = self::getDatabase();
				$stmt = $db->prepare("update term set `like`=`like`+1 where id=:term_id");

				$stmt->bindParam(":term_id", $term_id);
				$stmt->execute();
				return true;
			}else{
				//todo : invalid parameter
				return false;
			}
		}catch(Exception $e){
			throw new Exception("Can't update term. ".$e);
		}
	}

	function dislikeTerm($term_id){
		try{
			if(!empty($term_id)){
				$db = self::getDatabase();
				$stmt = $db->prepare("update term set dislike=dislike+1 where id=:term_id");

				$stmt->bindParam(":term_id", $term_id);
				$stmt->execute();
				return true;
			}else{
				//todo : invalid parameter
				return false;
			}
		}catch(Exception $e){
			throw new Exception("Can't update term. ".$e);
		}
	}

	function decreaseLike($term_id){
		try{
			if(!empty($term_id)){
				$db = self::getDatabase();
				$stmt = $db->prepare("update term set `like`=`like`-1 where id=:term_id");

				$stmt->bindParam(":term_id", $term_id);
				$stmt->execute();
				return true;
			}
		}catch(Exception $e){
			throw new Exception("Can't update term. ".$e);
		}
	}

	function decreaseDislike($term_id){
		try{
			if(!empty($term_id)){
				$db = self::getDatabase();
				$stmt = $db->prepare("update term set dislike=dislike-1 where id=:term_id");

				$stmt->bindParam(":term_id", $term_id);
				$stmt->execute();
				return true;
			}
		}catch(Exception $e){
			throw new Exception("Can't update term. ".$e);
		}
	}

	/**
	 * @param $term_id
	 * @param $flag
	 * @return bool
	 * @throws Exceptione
	 */
	function changeVoteTerm($term_id, $flag){
		try{
			if(!empty($term_id)){
				$db = self::getDatabase();
				if((int)$flag == 1){
					$stmt = $db->prepare("update term set `like`=`like`+1, dislike=dislike-1 where id=:term_id;");
				}else{
					$stmt = $db->prepare("update term set `like`=`like`-1, dislike=dislike+1 where id=:term_id;");
				}
				$stmt->bindParam(":term_id", $term_id);
				$stmt->execute();
				return true;
			}
		}catch(Exception $e){
			throw new Exception("Can't update term. ".$e);
		}
	}

	function getIndexWordByWord($word, $count = 20){
		try {
			if(!empty($word)) {
				$db = self::getDatabase();

				//본래 아래와 같이 union으로 앞, 뒤 데이터 10개씩 끌어오는 형태로 진행하려고 했는데
				//그럴 경우 앞쪽에 위치한 word의 경우 앞 부분에서 10개를 가져올 수 없을 수도 있다.
				//따라서 앞부분 데이터를 가져오는 쿼리를 먼저 날려서 해당 데이터가 충분하면
				//뒤쪽 데이터를 정상적으로 가져오고, 그렇지 않으면 뒤쪽 데이터를 더 가져오는 로직을 사용하기로 함.
				//뒤쪽 인덱스에 위치한 word도 마찬가지
				/*(select * from term where word < '그켬' limit 10)
									union
				(select * from term where word > '그켬' limit 10)
									union
				(select * from term where word = '그켬') order by word asc;*/

				//formal
				/*$stmt = $db->prepare("select * from term where word < :word limit :limit");

				$stmt->bindParam(":word", $word);
				$stmt->bindParam(":limit", (int)$count/2);
				$stmt->execute();*/

				//todo : TBD
				$stmt = $db->prepare("(select * from term where word < :word limit :limit)
									union
				(select * from term where word > :word limit :limit)
									union
				(select * from term where word = :word) order by word asc");

				$limit = (int)($count/2);

				$stmt->bindParam(":word", $word, PDO::PARAM_STR);
				$stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
				$stmt->execute();
				return $stmt->fetchAll();
			} else{
				//todo : invalide parameter
				return false;
			}
		} catch(Exception $e) {
			throw new Exception("Can't get index word. ".$e);
		}
	}

}
?>