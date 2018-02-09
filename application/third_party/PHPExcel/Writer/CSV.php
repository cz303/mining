<?php




class PHPExcel_Writer_CSV extends PHPExcel_Writer_Abstract implements PHPExcel_Writer_IWriter {
	
	private $Vviknio3gpsr;

	
	private $Vsqi3thkqlke	= ',';

	
	private $Vl5vuxrb0vdb	= '"';

	
	private $Vn2fotbqmfp3	= PHP_EOL;

	
	private $Vcpdbbaxw2wf	= 0;

	
	private $V2iz5pgtqlsh = false;

	
	private $Vjahsi1t1mfa = false;

	
	public function __construct(PHPExcel $Vlspthbp3hwz) {
		$this->_phpExcel	= $Vlspthbp3hwz;
	}

	
	public function save($V1tltbb5c5oc = null) {
		
		$Vzg4jtrmmzdy = $this->_phpExcel->getSheet($this->_sheetIndex);

		$Vyg0k2nrdluk = PHPExcel_Calculation::getInstance($this->_phpExcel)->getDebugLog()->getWriteDebugLog();
		PHPExcel_Calculation::getInstance($this->_phpExcel)->getDebugLog()->setWriteDebugLog(FALSE);
		$V340pcdkqcp2 = PHPExcel_Calculation::getArrayReturnType();
		PHPExcel_Calculation::setArrayReturnType(PHPExcel_Calculation::RETURN_ARRAY_AS_VALUE);

		
		$Vsg4lebcui4l = fopen($V1tltbb5c5oc, 'wb+');
		if ($Vsg4lebcui4l === false) {
			throw new PHPExcel_Writer_Exception("Could not open file $V1tltbb5c5oc for writing.");
		}

		if ($this->_excelCompatibility) {
			fwrite($Vsg4lebcui4l, "\xEF\xBB\xBF");	
			$this->setEnclosure('"');				
			$this->setDelimiter(";");			    
            $this->setLineEnding("\r\n");
			fwrite($Vsg4lebcui4l, 'sep=' . $this->getDelimiter() . $this->_lineEnding);
		} elseif ($this->_useBOM) {
			
			fwrite($Vsg4lebcui4l, "\xEF\xBB\xBF");
		}

		
		$Vg0k4u2of5zi = $Vzg4jtrmmzdy->getHighestDataColumn();
		$V3ywprpz53l2 = $Vzg4jtrmmzdy->getHighestDataRow();

		
		for($Vexbtekafkvl = 1; $Vexbtekafkvl <= $V3ywprpz53l2; ++$Vexbtekafkvl) {
			
			$V4svihcqvvbr = $Vzg4jtrmmzdy->rangeToArray('A'.$Vexbtekafkvl.':'.$Vg0k4u2of5zi.$Vexbtekafkvl,'', $this->_preCalculateFormulas);
			
			$this->_writeLine($Vsg4lebcui4l, $V4svihcqvvbr[0]);
		}

		
		fclose($Vsg4lebcui4l);

		PHPExcel_Calculation::setArrayReturnType($V340pcdkqcp2);
		PHPExcel_Calculation::getInstance($this->_phpExcel)->getDebugLog()->setWriteDebugLog($Vyg0k2nrdluk);
	}

	
	public function getDelimiter() {
		return $this->_delimiter;
	}

	
	public function setDelimiter($Vqujkwol1zut = ',') {
		$this->_delimiter = $Vqujkwol1zut;
		return $this;
	}

	
	public function getEnclosure() {
		return $this->_enclosure;
	}

	
	public function setEnclosure($Vqujkwol1zut = '"') {
		if ($Vqujkwol1zut == '') {
			$Vqujkwol1zut = null;
		}
		$this->_enclosure = $Vqujkwol1zut;
		return $this;
	}

	
	public function getLineEnding() {
		return $this->_lineEnding;
	}

	
	public function setLineEnding($Vqujkwol1zut = PHP_EOL) {
		$this->_lineEnding = $Vqujkwol1zut;
		return $this;
	}

	
	public function getUseBOM() {
		return $this->_useBOM;
	}

	
	public function setUseBOM($Vqujkwol1zut = false) {
		$this->_useBOM = $Vqujkwol1zut;
		return $this;
	}

	
	public function getExcelCompatibility() {
		return $this->_excelCompatibility;
	}

	
	public function setExcelCompatibility($Vqujkwol1zut = false) {
		$this->_excelCompatibility = $Vqujkwol1zut;
		return $this;
	}

	
	public function getSheetIndex() {
		return $this->_sheetIndex;
	}

	
	public function setSheetIndex($Vqujkwol1zut = 0) {
		$this->_sheetIndex = $Vqujkwol1zut;
		return $this;
	}

	
	private function _writeLine($Vpbemqvgkuuv = null, $Vqujkwol1zuts = null) {
		if (is_array($Vqujkwol1zuts)) {
			
			$Vmskqsh5lrf1 = false;

			
			$Vdmbypy2xlg1 = '';

			foreach ($Vqujkwol1zuts as $Vltoddaysjlm) {
				
				$Vltoddaysjlm = str_replace($this->_enclosure, $this->_enclosure . $this->_enclosure, $Vltoddaysjlm);

				
				if ($Vmskqsh5lrf1) {
					$Vdmbypy2xlg1 .= $this->_delimiter;
				} else {
					$Vmskqsh5lrf1 = true;
				}

				
				$Vdmbypy2xlg1 .= $this->_enclosure . $Vltoddaysjlm . $this->_enclosure;
			}

			
			$Vdmbypy2xlg1 .= $this->_lineEnding;

			
            fwrite($Vpbemqvgkuuv, $Vdmbypy2xlg1);
		} else {
			throw new PHPExcel_Writer_Exception("Invalid data row passed to CSV writer.");
		}
	}

}
