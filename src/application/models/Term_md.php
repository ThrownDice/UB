<?php  
/**
 * Term_md file.
 */

	// Debugging.
	__debug_load(__FILE__);




/**
 * 
 */
class Term_md extends Model {

	function __construct() {}

	function getTerm() {}

	/**
	 * get term which id is parameter $id
	 * @param	int	$id term id
	 * @return mixed (is there is no term, then return null)
	 * @throws Exception
	 */
	function getTermExact($id) {
		try{
			if($id){
				$db = self::getDatabase();
				$stmt = $db->prepare("select * from term where id = :id");
				$stmt->bindParam(":id", $id, PDO::PARAM_INT);
				$stmt->execute();
				return $stmt->fetchAll();
			}else{
				return null;
			}
		}catch(Exception $e){
			throw new Exception("Can't get term id='$id'. ".$e);
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

			$lemma = $term["lemma"];
			$word = $term["word"];
			$def = $term["def"];
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
				return $stmt->fetchAll();
			}else{
				return null;
			}
		}catch(Exception $e){
			throw new Exception("Can't delete term id='$id'. ".$e);
		}
	}

	function updateTerm($term){
		//todo : we should support partial update, not fully update
		try{
			//todo : validation of $term
			$db = self::getDatabase();
			$stmt = $db->prepare("update term set lemma=:lemma, word=:word, def=:def, `like`=:like, dislike=:dislike, hit=:hit where id=:id ");

			$id = $term["id"];
			$lemma = $term["lemma"];
			$word = $term["word"];
			$def = $term["def"];
			$like = isset($term["like"]) ? $term["like"] : 0;
			$dislike = isset($term["dislike"]) ? $term["dislike"] : 0;
			//todo : calculate hit rate
			$hit = 0;

			$stmt->bindParam(":id", $id);
			$stmt->bindParam(":lemma", $lemma);
			$stmt->bindParam(":word", $word);
			$stmt->bindParam(":def", $def);
			$stmt->bindParam(":like", $like);
			$stmt->bindParam(":dislike", $dislike);
			$stmt->bindParam(":hit", $hit);

			$stmt->execute();

		}catch(Exception $e){
			throw new Exception("Can't insert term,".json_encode($term)." ".$e);
		}
	}

}
?>