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

		}catch(Exception $e){
			throw new Exception("Can't insert member,".json_encode($member)." ".$e);
		}
	}
}






?>