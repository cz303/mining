<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}


class PHPExcel_Reader_SYLK extends PHPExcel_Reader_Abstract implements PHPExcel_Reader_IReader
{
	
	private $Vyu5plml4sd2	= 'ANSI';

	
	private $Vcpdbbaxw2wf 	= 0;

	
	private $V5l1y51lqrhn = array();

	
	private $Vjuwqyrszatq = 0;

	
	public function __construct() {
		$this->_readFilter 	= new PHPExcel_Reader_DefaultReadFilter();
	}

	
	protected function _isValidFormat()
	{
		
		$Vou4vxorrdoe = fread($this->_fileHandle, 2048);

		
		$Vqsnxklymijq = substr_count($Vou4vxorrdoe, ';');
		if ($Vqsnxklymijq < 1) {
			return FALSE;
		}

		
		$Vstkyagwfnc1 = explode("\n", $Vou4vxorrdoe);
		if (substr($Vstkyagwfnc1[0],0,4) != 'ID;P') {
			return FALSE;
		}

		return TRUE;
	}

	
	public function setInputEncoding($Vqujkwol1zut = 'ANSI')
	{
		$this->_inputEncoding = $Vqujkwol1zut;
		return $this;
	}

	
	public function getInputEncoding()
	{
		return $this->_inputEncoding;
	}

	
	public function listWorksheetInfo($V1tltbb5c5oc)
	{
		
		$this->_openFile($V1tltbb5c5oc);
		if (!$this->_isValidFormat()) {
			fclose ($this->_fileHandle);
			throw new PHPExcel_Reader_Exception($V1tltbb5c5oc . " is an Invalid Spreadsheet file.");
		}
		$Vsg4lebcui4l = $this->_fileHandle;
		rewind($Vsg4lebcui4l);

		$V2rvssyhthui = array();
		$V2rvssyhthui[0]['worksheetName'] = 'Worksheet';
		$V2rvssyhthui[0]['lastColumnLetter'] = 'A';
		$V2rvssyhthui[0]['lastColumnIndex'] = 0;
		$V2rvssyhthui[0]['totalRows'] = 0;
		$V2rvssyhthui[0]['totalColumns'] = 0;

		
		$Vr3fstbr4qyt = array();

		
		$Vcj3rtes4zrz = 0;
		while (($Vr3fstbr4qyt = fgets($Vsg4lebcui4l)) !== FALSE) {
			$Vdpliwd4tl4l = 0;

			
			$Vr3fstbr4qyt = PHPExcel_Shared_String::SYLKtoUTF8($Vr3fstbr4qyt);

			
			
			$Vr3fstbr4qyt = explode("\t",str_replace('¤',';',str_replace(';',"\t",str_replace(';;','¤',rtrim($Vr3fstbr4qyt)))));

			$Vou4vxorrdoeType = array_shift($Vr3fstbr4qyt);
			if ($Vou4vxorrdoeType == 'C') {
				
				foreach($Vr3fstbr4qyt as $Vxisi0zqh5cl) {
					switch($Vxisi0zqh5cl{0}) {
						case 'C' :
						case 'X' :
							$Vdpliwd4tl4l = substr($Vxisi0zqh5cl,1) - 1;
							break;
						case 'R' :
						case 'Y' :
							$Vcj3rtes4zrz = substr($Vxisi0zqh5cl,1);
							break;
					}

					$V2rvssyhthui[0]['totalRows'] = max($V2rvssyhthui[0]['totalRows'], $Vcj3rtes4zrz);
					$V2rvssyhthui[0]['lastColumnIndex'] = max($V2rvssyhthui[0]['lastColumnIndex'], $Vdpliwd4tl4l);
				}
			}
		}

		$V2rvssyhthui[0]['lastColumnLetter'] = PHPExcel_Cell::stringFromColumnIndex($V2rvssyhthui[0]['lastColumnIndex']);
		$V2rvssyhthui[0]['totalColumns'] = $V2rvssyhthui[0]['lastColumnIndex'] + 1;

		
		fclose($Vsg4lebcui4l);

		return $V2rvssyhthui;
	}

	
	public function load($V1tltbb5c5oc)
	{
		
		$Vkggi1o2uo0k = new PHPExcel();

		
		return $this->loadIntoExisting($V1tltbb5c5oc, $Vkggi1o2uo0k);
	}

	
	public function loadIntoExisting($V1tltbb5c5oc, PHPExcel $Vkggi1o2uo0k)
	{
		
		$this->_openFile($V1tltbb5c5oc);
		if (!$this->_isValidFormat()) {
			fclose ($this->_fileHandle);
			throw new PHPExcel_Reader_Exception($V1tltbb5c5oc . " is an Invalid Spreadsheet file.");
		}
		$Vsg4lebcui4l = $this->_fileHandle;
		rewind($Vsg4lebcui4l);

		
		while ($Vkggi1o2uo0k->getSheetCount() <= $this->_sheetIndex) {
			$Vkggi1o2uo0k->createSheet();
		}
		$Vkggi1o2uo0k->setActiveSheetIndex( $this->_sheetIndex );

		$Vxs3fk0vtqts	= array('\-',	'\ ');
		$Vwb2mmlxgmu5		= array('-',	' ');

		
		$Vr3fstbr4qyt = array();
		$Vn4q2p4mkwa0 = $Vexbtekafkvl = '';

		
		while (($Vr3fstbr4qyt = fgets($Vsg4lebcui4l)) !== FALSE) {

			
			$Vr3fstbr4qyt = PHPExcel_Shared_String::SYLKtoUTF8($Vr3fstbr4qyt);

			
			
			$Vr3fstbr4qyt = explode("\t",str_replace('¤',';',str_replace(';',"\t",str_replace(';;','¤',rtrim($Vr3fstbr4qyt)))));

			$Vou4vxorrdoeType = array_shift($Vr3fstbr4qyt);
			
			if ($Vou4vxorrdoeType == 'P') {
				$Vmyeyo3lzs5b = array();
				foreach($Vr3fstbr4qyt as $Vxisi0zqh5cl) {
					switch($Vxisi0zqh5cl{0}) {
						case 'P' :	$Vmyeyo3lzs5b['numberformat']['code'] = str_replace($Vxs3fk0vtqts,$Vwb2mmlxgmu5,substr($Vxisi0zqh5cl,1));
									break;
						case 'E' :
						case 'F' :	$Vmyeyo3lzs5b['font']['name'] = substr($Vxisi0zqh5cl,1);
									break;
						case 'L' :	$Vmyeyo3lzs5b['font']['size'] = substr($Vxisi0zqh5cl,1);
									break;
						case 'S' :	$Vvdptiysws4c = substr($Vxisi0zqh5cl,1);
									for ($Vfhiq1lhsoja=0;$Vfhiq1lhsoja<strlen($Vvdptiysws4c);++$Vfhiq1lhsoja) {
										switch ($Vvdptiysws4c{$Vfhiq1lhsoja}) {
											case 'I' :	$Vmyeyo3lzs5b['font']['italic'] = true;
														break;
											case 'D' :	$Vmyeyo3lzs5b['font']['bold'] = true;
														break;
											case 'T' :	$Vmyeyo3lzs5b['borders']['top']['style'] = PHPExcel_Style_Border::BORDER_THIN;
														break;
											case 'B' :	$Vmyeyo3lzs5b['borders']['bottom']['style'] = PHPExcel_Style_Border::BORDER_THIN;
														break;
											case 'L' :	$Vmyeyo3lzs5b['borders']['left']['style'] = PHPExcel_Style_Border::BORDER_THIN;
														break;
											case 'R' :	$Vmyeyo3lzs5b['borders']['right']['style'] = PHPExcel_Style_Border::BORDER_THIN;
														break;
										}
									}
									break;
					}
				}
				$this->_formats['P'.$this->_format++] = $Vmyeyo3lzs5b;
			
			} elseif ($Vou4vxorrdoeType == 'C') {
				$Vd5d14hxytg1 = false;
				$V0oebgn03krr = $V0oebgn03krrFormula = '';
				foreach($Vr3fstbr4qyt as $Vxisi0zqh5cl) {
					switch($Vxisi0zqh5cl{0}) {
						case 'C' :
						case 'X' :	$Vn4q2p4mkwa0 = substr($Vxisi0zqh5cl,1);
									break;
						case 'R' :
						case 'Y' :	$Vexbtekafkvl = substr($Vxisi0zqh5cl,1);
									break;
						case 'K' :	$V0oebgn03krr = substr($Vxisi0zqh5cl,1);
									break;
						case 'E' :	$V0oebgn03krrFormula = '='.substr($Vxisi0zqh5cl,1);
									
									$Vcartbxounrh = explode('"',$V0oebgn03krrFormula);
									$Vseq1edikdvg = false;
									foreach($Vcartbxounrh as &$Vp4xjtpabm0l) {
										
										if ($Vseq1edikdvg = !$Vseq1edikdvg) {
											preg_match_all('/(R(\[?-?\d*\]?))(C(\[?-?\d*\]?))/',$Vp4xjtpabm0l, $Vfpwk52a2tx2,PREG_SET_ORDER+PREG_OFFSET_CAPTURE);
											
											
											
											$Vfpwk52a2tx2 = array_reverse($Vfpwk52a2tx2);
											
											
											foreach($Vfpwk52a2tx2 as $Vgtpnvip12fz) {
												$VexbtekafkvlReference = $Vgtpnvip12fz[2][0];
												
												if ($VexbtekafkvlReference == '') $VexbtekafkvlReference = $Vexbtekafkvl;
												
												if ($VexbtekafkvlReference{0} == '[') $VexbtekafkvlReference = $Vexbtekafkvl + trim($VexbtekafkvlReference,'[]');
												$Vn4q2p4mkwa0Reference = $Vgtpnvip12fz[4][0];
												
												if ($Vn4q2p4mkwa0Reference == '') $Vn4q2p4mkwa0Reference = $Vn4q2p4mkwa0;
												
												if ($Vn4q2p4mkwa0Reference{0} == '[') $Vn4q2p4mkwa0Reference = $Vn4q2p4mkwa0 + trim($Vn4q2p4mkwa0Reference,'[]');
												$Vho1x1ocaami = PHPExcel_Cell::stringFromColumnIndex($Vn4q2p4mkwa0Reference-1).$VexbtekafkvlReference;

												$Vp4xjtpabm0l = substr_replace($Vp4xjtpabm0l,$Vho1x1ocaami,$Vgtpnvip12fz[0][1],strlen($Vgtpnvip12fz[0][0]));
											}
										}
									}
									unset($Vp4xjtpabm0l);
									
									$V0oebgn03krrFormula = implode('"',$Vcartbxounrh);
									$Vd5d14hxytg1 = true;
									break;
					}
				}
				$Vn4q2p4mkwa0Letter = PHPExcel_Cell::stringFromColumnIndex($Vn4q2p4mkwa0-1);
				$V0oebgn03krr = PHPExcel_Calculation::_unwrapResult($V0oebgn03krr);

				
				$Vkggi1o2uo0k->getActiveSheet()->getCell($Vn4q2p4mkwa0Letter.$Vexbtekafkvl)->setValue(($Vd5d14hxytg1) ? $V0oebgn03krrFormula : $V0oebgn03krr);
				if ($Vd5d14hxytg1) {
					$V0oebgn03krr = PHPExcel_Calculation::_unwrapResult($V0oebgn03krr);
					$Vkggi1o2uo0k->getActiveSheet()->getCell($Vn4q2p4mkwa0Letter.$Vexbtekafkvl)->setCalculatedValue($V0oebgn03krr);
				}
			
			} elseif ($Vou4vxorrdoeType == 'F') {
				$Vmexxjw2rzzh = $Vn4q2p4mkwa0Width = $Vvdptiysws4c = '';
				$Vitgmypji0cj = array();
				foreach($Vr3fstbr4qyt as $Vxisi0zqh5cl) {
					switch($Vxisi0zqh5cl{0}) {
						case 'C' :
						case 'X' :	$Vn4q2p4mkwa0 = substr($Vxisi0zqh5cl,1);
									break;
						case 'R' :
						case 'Y' :	$Vexbtekafkvl = substr($Vxisi0zqh5cl,1);
									break;
						case 'P' :	$Vmexxjw2rzzh = $Vxisi0zqh5cl;
									break;
						case 'W' :	list($V0vxugqh2ug5,$Vmtq42mp25yw,$Vn4q2p4mkwa0Width) = explode(' ',substr($Vxisi0zqh5cl,1));
									break;
						case 'S' :	$Vvdptiysws4c = substr($Vxisi0zqh5cl,1);
									for ($Vfhiq1lhsoja=0;$Vfhiq1lhsoja<strlen($Vvdptiysws4c);++$Vfhiq1lhsoja) {
										switch ($Vvdptiysws4c{$Vfhiq1lhsoja}) {
											case 'I' :	$Vitgmypji0cj['font']['italic'] = true;
														break;
											case 'D' :	$Vitgmypji0cj['font']['bold'] = true;
														break;
											case 'T' :	$Vitgmypji0cj['borders']['top']['style'] = PHPExcel_Style_Border::BORDER_THIN;
														break;
											case 'B' :	$Vitgmypji0cj['borders']['bottom']['style'] = PHPExcel_Style_Border::BORDER_THIN;
														break;
											case 'L' :	$Vitgmypji0cj['borders']['left']['style'] = PHPExcel_Style_Border::BORDER_THIN;
														break;
											case 'R' :	$Vitgmypji0cj['borders']['right']['style'] = PHPExcel_Style_Border::BORDER_THIN;
														break;
										}
									}
									break;
					}
				}
				if (($Vmexxjw2rzzh > '') && ($Vn4q2p4mkwa0 > '') && ($Vexbtekafkvl > '')) {
					$Vn4q2p4mkwa0Letter = PHPExcel_Cell::stringFromColumnIndex($Vn4q2p4mkwa0-1);
					if (isset($this->_formats[$Vmexxjw2rzzh])) {
						$Vkggi1o2uo0k->getActiveSheet()->getStyle($Vn4q2p4mkwa0Letter.$Vexbtekafkvl)->applyFromArray($this->_formats[$Vmexxjw2rzzh]);
					}
				}
				if ((!empty($Vitgmypji0cj)) && ($Vn4q2p4mkwa0 > '') && ($Vexbtekafkvl > '')) {
					$Vn4q2p4mkwa0Letter = PHPExcel_Cell::stringFromColumnIndex($Vn4q2p4mkwa0-1);
					$Vkggi1o2uo0k->getActiveSheet()->getStyle($Vn4q2p4mkwa0Letter.$Vexbtekafkvl)->applyFromArray($Vitgmypji0cj);
				}
				if ($Vn4q2p4mkwa0Width > '') {
					if ($V0vxugqh2ug5 == $Vmtq42mp25yw) {
						$V0vxugqh2ug5 = PHPExcel_Cell::stringFromColumnIndex($V0vxugqh2ug5-1);
						$Vkggi1o2uo0k->getActiveSheet()->getColumnDimension($V0vxugqh2ug5)->setWidth($Vn4q2p4mkwa0Width);
					} else {
						$V0vxugqh2ug5 = PHPExcel_Cell::stringFromColumnIndex($V0vxugqh2ug5-1);
						$Vmtq42mp25yw = PHPExcel_Cell::stringFromColumnIndex($Vmtq42mp25yw-1);
						$Vkggi1o2uo0k->getActiveSheet()->getColumnDimension($V0vxugqh2ug5)->setWidth($Vn4q2p4mkwa0Width);
						do {
							$Vkggi1o2uo0k->getActiveSheet()->getColumnDimension(++$V0vxugqh2ug5)->setWidth($Vn4q2p4mkwa0Width);
						} while ($V0vxugqh2ug5 != $Vmtq42mp25yw);
					}
				}
			} else {
				foreach($Vr3fstbr4qyt as $Vxisi0zqh5cl) {
					switch($Vxisi0zqh5cl{0}) {
						case 'C' :
						case 'X' :	$Vn4q2p4mkwa0 = substr($Vxisi0zqh5cl,1);
									break;
						case 'R' :
						case 'Y' :	$Vexbtekafkvl = substr($Vxisi0zqh5cl,1);
									break;
					}
				}
			}
		}

		
		fclose($Vsg4lebcui4l);

		
		return $Vkggi1o2uo0k;
	}

	
	public function getSheetIndex() {
		return $this->_sheetIndex;
	}

	
	public function setSheetIndex($Vqujkwol1zut = 0) {
		$this->_sheetIndex = $Vqujkwol1zut;
		return $this;
	}

}
