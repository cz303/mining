<?php




class PHPExcel_Calculation_Token_Stack {

	
	private $Vnixzzwty4ho = array();

	
	private $Vqi43ngky5pc = 0;


	
	public function count() {
		return $this->_count;
	}	

	
	public function push($V4pigtpor0ln, $Vp4xjtpabm0l, $V55wydy2lnue = NULL) {
		$this->_stack[$this->_count++] = array('type'		=> $V4pigtpor0ln,
											   'value'		=> $Vp4xjtpabm0l,
											   'reference'	=> $V55wydy2lnue
											  );
		if ($V4pigtpor0ln == 'Function') {
			$V0by3102qkyi = PHPExcel_Calculation::_localeFunc($Vp4xjtpabm0l);
			if ($V0by3102qkyi != $Vp4xjtpabm0l) {
				$this->_stack[($this->_count - 1)]['localeValue'] = $V0by3102qkyi;
			}
		}
	}	

	
	public function pop() {
		if ($this->_count > 0) {
			return $this->_stack[--$this->_count];
		}
		return NULL;
	}	

	
	public function last($Vmwwo1qnmepz = 1) {
		if ($this->_count - $Vmwwo1qnmepz < 0) {
			return NULL;
		}
		return $this->_stack[$this->_count - $Vmwwo1qnmepz];
	}	

	
	function clear() {
		$this->_stack = array();
		$this->_count = 0;
	}

}	
