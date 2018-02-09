<?php




class PHPExcel_Reader_Exception extends PHPExcel_Exception {
	
	public static function errorHandlerCallback($V0x4xt3l5phz, $Vlkger5ehs4w, $Vg5mhfl1beoi, $Vdmbypy2xlg1, $Vhtknqrle5z0) {
		$Vnhm0uuykimv = new self($Vlkger5ehs4w, $V0x4xt3l5phz);
		$Vnhm0uuykimv->line = $Vdmbypy2xlg1;
		$Vnhm0uuykimv->file = $Vg5mhfl1beoi;
		throw $Vnhm0uuykimv;
	}
}
