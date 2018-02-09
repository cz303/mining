<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}


class PHPExcel_Reader_CSV extends PHPExcel_Reader_Abstract implements PHPExcel_Reader_IReader
{
	
	private $Vyu5plml4sd2	= 'UTF-8';

	
	private $Vsqi3thkqlke		= ',';

	
	private $Vl5vuxrb0vdb		= '"';

	
	private $Vcpdbbaxw2wf	= 0;

	
	private $Vcybne0y0zkt	= false;

	
	private $Vcybne0y0zktRow	= -1;


	
	public function __construct() {
		$this->_readFilter		= new PHPExcel_Reader_DefaultReadFilter();
	}

	
	protected function _isValidFormat()
	{
		return TRUE;
	}

	
	public function setInputEncoding($Vqujkwol1zut = 'UTF-8')
	{
		$this->_inputEncoding = $Vqujkwol1zut;
		return $this;
	}

	
	public function getInputEncoding()
	{
		return $this->_inputEncoding;
	}

	
	protected function _skipBOM()
	{
		rewind($this->_fileHandle);

		switch ($this->_inputEncoding) {
			case 'UTF-8':
				fgets($this->_fileHandle, 4) == "\xEF\xBB\xBF" ?
					fseek($this->_fileHandle, 3) : fseek($this->_fileHandle, 0);
				break;
			case 'UTF-16LE':
				fgets($this->_fileHandle, 3) == "\xFF\xFE" ?
					fseek($this->_fileHandle, 2) : fseek($this->_fileHandle, 0);
				break;
			case 'UTF-16BE':
				fgets($this->_fileHandle, 3) == "\xFE\xFF" ?
					fseek($this->_fileHandle, 2) : fseek($this->_fileHandle, 0);
				break;
			case 'UTF-32LE':
				fgets($this->_fileHandle, 5) == "\xFF\xFE\x00\x00" ?
					fseek($this->_fileHandle, 4) : fseek($this->_fileHandle, 0);
				break;
			case 'UTF-32BE':
				fgets($this->_fileHandle, 5) == "\x00\x00\xFE\xFF" ?
					fseek($this->_fileHandle, 4) : fseek($this->_fileHandle, 0);
				break;
			default:
				break;
		}
	}

	
	public function listWorksheetInfo($V1tltbb5c5oc)
	{
		
		$this->_openFile($V1tltbb5c5oc);
		if (!$this->_isValidFormat()) {
			fclose ($this->_fileHandle);
			throw new PHPExcel_Reader_Exception($V1tltbb5c5oc . " is an Invalid Spreadsheet file.");
		}
		$Vsg4lebcui4l = $this->_fileHandle;

		
		$this->_skipBOM();

		$Vrejjof3cas1 = array( "\\" . $this->_enclosure, $this->_enclosure . $this->_enclosure );

		$V2rvssyhthui = array();
		$V2rvssyhthui[0]['worksheetName'] = 'Worksheet';
		$V2rvssyhthui[0]['lastColumnLetter'] = 'A';
		$V2rvssyhthui[0]['lastColumnIndex'] = 0;
		$V2rvssyhthui[0]['totalRows'] = 0;
		$V2rvssyhthui[0]['totalColumns'] = 0;

		
		while (($Vr3fstbr4qyt = fgetcsv($Vsg4lebcui4l, 0, $this->_delimiter, $this->_enclosure)) !== FALSE) {
			$V2rvssyhthui[0]['totalRows']++;
			$V2rvssyhthui[0]['lastColumnIndex'] = max($V2rvssyhthui[0]['lastColumnIndex'], count($Vr3fstbr4qyt) - 1);
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
		$Vex3xb3pnvas = ini_get('auto_detect_line_endings');
		ini_set('auto_detect_line_endings', true);

		
		$this->_openFile($V1tltbb5c5oc);
		if (!$this->_isValidFormat()) {
			fclose ($this->_fileHandle);
			throw new PHPExcel_Reader_Exception($V1tltbb5c5oc . " is an Invalid Spreadsheet file.");
		}
		$Vsg4lebcui4l = $this->_fileHandle;

		
		$this->_skipBOM();

		
		while ($Vkggi1o2uo0k->getSheetCount() <= $this->_sheetIndex) {
			$Vkggi1o2uo0k->createSheet();
		}
		$Vzg4jtrmmzdy = $Vkggi1o2uo0k->setActiveSheetIndex($this->_sheetIndex);

		$Vrejjof3cas1 = array( "\\" . $this->_enclosure,
								   $this->_enclosure . $this->_enclosure
								 );

		
		$Vnyup0pzlulk = 1;
		if ($this->_contiguous) {
			$Vnyup0pzlulk = ($this->_contiguousRow == -1) ? $Vzg4jtrmmzdy->getHighestRow(): $this->_contiguousRow;
		}

		
		while (($Vr3fstbr4qyt = fgetcsv($Vsg4lebcui4l, 0, $this->_delimiter, $this->_enclosure)) !== FALSE) {
			$Vdel5kw5u3ht = 'A';
			foreach($Vr3fstbr4qyt as $Vxisi0zqh5cl) {
				if ($Vxisi0zqh5cl != '' && $this->_readFilter->readCell($Vdel5kw5u3ht, $Vnyup0pzlulk)) {
					
					$Vxisi0zqh5cl = str_replace($Vrejjof3cas1, $this->_enclosure, $Vxisi0zqh5cl);

					
					if ($this->_inputEncoding !== 'UTF-8') {
						$Vxisi0zqh5cl = PHPExcel_Shared_String::ConvertEncoding($Vxisi0zqh5cl, 'UTF-8', $this->_inputEncoding);
					}

					
					$Vzg4jtrmmzdy->getCell($Vdel5kw5u3ht . $Vnyup0pzlulk)->setValue($Vxisi0zqh5cl);
				}
				++$Vdel5kw5u3ht;
			}
			++$Vnyup0pzlulk;
		}

		
		fclose($Vsg4lebcui4l);

		if ($this->_contiguous) {
			$this->_contiguousRow = $Vnyup0pzlulk;
		}

		ini_set('auto_detect_line_endings', $Vex3xb3pnvas);

		
		return $Vkggi1o2uo0k;
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
			$Vqujkwol1zut = '"';
		}
		$this->_enclosure = $Vqujkwol1zut;
		return $this;
	}

	
	public function getSheetIndex() {
		return $this->_sheetIndex;
	}

	
	public function setSheetIndex($Vqujkwol1zut = 0) {
		$this->_sheetIndex = $Vqujkwol1zut;
		return $this;
	}

	
	public function setContiguous($V1w5tw0zwa4e = FALSE)
	{
		$this->_contiguous = (bool) $V1w5tw0zwa4e;
		if (!$V1w5tw0zwa4e) {
			$this->_contiguousRow = -1;
		}

		return $this;
	}

	
	public function getContiguous() {
		return $this->_contiguous;
	}

}
