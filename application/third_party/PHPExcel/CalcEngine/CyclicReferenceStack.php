<?php




class PHPExcel_CalcEngine_CyclicReferenceStack {

	
	private $Vnixzzwty4ho = array();


	
	public function count() {
		return count($this->_stack);
	}

	
	public function push($Vp4xjtpabm0l) {
		$this->_stack[$Vp4xjtpabm0l] = $Vp4xjtpabm0l;
	}

	
	public function pop() {
		return array_pop($this->_stack);
	}

	
	public function onStack($Vp4xjtpabm0l) {
		return isset($this->_stack[$Vp4xjtpabm0l]);
	}

	
	public function clear() {
		$this->_stack = array();
	}

	
	public function showStack() {
		return $this->_stack;
	}

}
