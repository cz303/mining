<?php



class PHPExcel_CalcEngine_Logger {

	
	private $V1sct4zwe0ih = FALSE;

	
	private $Vychg0r4qmz3 = FALSE;

	
	private $Vg32iwdhepn4 = array();

	
	private $Vfe3oiff5eut;

	
	
	public function __construct(PHPExcel_CalcEngine_CyclicReferenceStack $Vltejvmdssgs) {
		$this->_cellStack = $Vltejvmdssgs;
	}

	
	public function setWriteDebugLog($Vqujkwol1zut = FALSE) {
		$this->_writeDebugLog = $Vqujkwol1zut;
	}

	
	public function getWriteDebugLog() {
		return $this->_writeDebugLog;
	}

	
	public function setEchoDebugLog($Vqujkwol1zut = FALSE) {
		$this->_echoDebugLog = $Vqujkwol1zut;
	}

	
	public function getEchoDebugLog() {
		return $this->_echoDebugLog;
	}

	
	public function writeDebugLog() {
		
		if ($this->_writeDebugLog) {
			$Vb0xezrtkohj = implode(func_get_args());
			$Vgtpnvip12fz = implode(' -> ', $this->_cellStack->showStack());
			if ($this->_echoDebugLog) {
				echo $Vgtpnvip12fz, 
					($this->_cellStack->count() > 0 ? ' => ' : ''), 
					$Vb0xezrtkohj, 
					PHP_EOL;
			}
			$this->_debugLog[] = $Vgtpnvip12fz . 
				($this->_cellStack->count() > 0 ? ' => ' : '') . 
				$Vb0xezrtkohj;
		}
	}	

	
	public function clearLog() {
		$this->_debugLog = array();
	}	

	
	public function getLog() {
		return $this->_debugLog;
	}	

}	

