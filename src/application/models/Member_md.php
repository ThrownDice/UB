<?php  
/**
 * Term_md file.
 */
	// Debugging.
	__debug_load(__FILE__);
/**
 * 
 */
class Member_md extends Model {
	
	function addMember($member){
		try{
			$db = self::getDatabase();
			//todo : validation, filter parameter
			if(isset($member["email"]) && isset($member["password"])){
				//todo : check valid email (repeated?)
				$email = $member["email"];
				$password = $member["password"];
				$nickname = $member["nickname"];
				$img = $member["img"];
				$intro = isset($member["intro"]) ? $member["intro"] : "";
				$stmt = $db->prepare("insert into member (email ,pw, nickname, intro, photo, registered) VALUES (:email, sha1(:pw), :nickname, :intro, :photo, now())");

				$stmt->bindParam(":email", $email);
				$stmt->bindParam(":pw", $password);
				$stmt->bindParam(":nickname", $nickname);
				$stmt->bindParam(":intro", $intro);
				$stmt->bindParam(":photo", $img, PDO::PARAM_LOB);
				$stmt->execute();
				return true;
			}else{
				return false;
			}
		}catch(Exception $e){
			throw new Exception("Can't insert member,".json_encode($member)." ".$e);
		}
	}

	function getMember($email, $password){
		try{
			$db = self::getDatabase();
			//todo : validation, filter parameter
			//todo : get only necessary field
			$stmt = $db->prepare("select * from member where email=:email and pw=sha1(:password)");

			$stmt->bindParam(":email", $email);
			$stmt->bindParam(":password", $password);
			$stmt->execute();
			return $stmt->fetchAll();
		}catch(Exception $e){
			throw new Exception("Exception thrown in getMember function. ".$e);
		}
	}

	function isMember($email, $password){
		try{

		}catch(Exception $e){
			throw new Exception("Exception thrown in isMember function. ".$e);
		}
	}



}






?>