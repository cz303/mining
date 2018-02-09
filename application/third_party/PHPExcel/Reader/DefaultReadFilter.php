<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}


class PHPExcel_Reader_DefaultReadFilter implements PHPExcel_Reader_IReadFilter
{
	
	public function readCell($Vn4q2p4mkwa0, $Vexbtekafkvl, $Vuyz1szrcs1l = '') {
		return true;
	}
}
