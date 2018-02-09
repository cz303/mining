<?php




class PHPExcel_Worksheet_RowIterator implements Iterator
{
	
	private $Vpdxazfpfi4p;

	
	private $Vqvgj4sslcm2 = 1;

	
	private $Vpcuky25bjdv = 1;


	
	public function __construct(PHPExcel_Worksheet $Vld5fbk2n1id = null, $V5jh0lozltx0 = 1) {
		
		$this->_subject = $Vld5fbk2n1id;
		$this->resetStart($V5jh0lozltx0);
	}

	
	public function __destruct() {
		unset($this->_subject);
	}

	
	public function resetStart($V5jh0lozltx0 = 1) {
		$this->_startRow = $V5jh0lozltx0;
		$this->seek($V5jh0lozltx0);
	}

	
	public function seek($Vexbtekafkvl = 1) {
		$this->_position = $Vexbtekafkvl;
	}

	
	public function rewind() {
		$this->_position = $this->_startRow;
	}

	
	public function current() {
		return new PHPExcel_Worksheet_Row($this->_subject, $this->_position);
	}

	
	public function key() {
		return $this->_position;
	}

	
	public function next() {
		++$this->_position;
	}

	
	public function prev() {
		if ($this->_position > 1)
			--$this->_position;
	}

	
	public function valid() {
		return $this->_position <= $this->_subject->getHighestRow();
	}
}
