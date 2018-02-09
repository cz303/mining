<?php


if (!defined('DATE_W3C')) {
  define('DATE_W3C', 'Y-m-d\TH:i:sP');
}

if (!defined('DEBUGMODE_ENABLED')) {
  define('DEBUGMODE_ENABLED', false);
}



class PHPExcel_Shared_XMLWriter extends XMLWriter {
	
	const STORAGE_MEMORY	= 1;
	const STORAGE_DISK		= 2;

	
	private $Vjyi1hi045mq = '';

	
	public function __construct($Vfcaytufi4fa = self::STORAGE_MEMORY, $Vfcaytufi4faFolder = NULL) {
		
		if ($Vfcaytufi4fa == self::STORAGE_MEMORY) {
			$this->openMemory();
		} else {
			
			if ($Vfcaytufi4faFolder === NULL)
				$Vfcaytufi4faFolder = PHPExcel_Shared_File::sys_get_temp_dir();
			$this->_tempFileName = @tempnam($Vfcaytufi4faFolder, 'xml');

			
			if ($this->openUri($this->_tempFileName) === false) {
				
				$this->openMemory();
			}
		}

		
		if (DEBUGMODE_ENABLED) {
			$this->setIndent(true);
		}
	}

	
	public function __destruct() {
		
		if ($this->_tempFileName != '') {
			@unlink($this->_tempFileName);
		}
	}

	
	public function getData() {
		if ($this->_tempFileName == '') {
			return $this->outputMemory(true);
		} else {
			$this->flush();
			return file_get_contents($this->_tempFileName);
		}
	}

	
	public function writeRawData($Vkjdq1foihhi)
	{
		if (is_array($Vkjdq1foihhi)) {
			$Vkjdq1foihhi = implode("\n",$Vkjdq1foihhi);
		}

		if (method_exists($this, 'writeRaw')) {
			return $this->writeRaw(htmlspecialchars($Vkjdq1foihhi));
		}

		return $this->text($Vkjdq1foihhi);
	}
}
