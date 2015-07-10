<?php  

/**
 * UB
 * @author Engine, Jihyeon
 * @since 06.25.2015 
 *
 *
 * This index.php serves as a gateway.
 */


/**
 * Set path
 */
	//name of the directories
	$system_folder = 'system';
	$application_folder = 'application';

	//codeigniter에서 system path 랑 system directory 는 왜 나누는지? codeigniter/index.php 참조.
	define('SYSTEMPATH', str_replace('\\', '/', $system_folder));
	define('APPPATH', $application_folder.DIRECTORY_SEPARATOR);

/**
 * Sanity check.
 */


/**
 * Load the engine
 * 이름이 정해지기 전까지 가칭 X_Engine
 */
require_once SYSTEMPATH.'core/X_Engine.php';


?>