<?php




class PHPExcel_Worksheet_Row
{
	
	private $Vq20emrsdn3q;

	
	private $Vqayxv2gpsn0 = 0;

	
	public function __construct(PHPExcel_Worksheet $V3jkqexf4nr0 = null, $Vcj3rtes4zrz = 1) {
		
		$this->_parent 		= $V3jkqexf4nr0;
		$this->_rowIndex 	= $Vcj3rtes4zrz;
	}

	
	public function __destruct() {
		unset($this->_parent);
	}

	
	public function getRowIndex() {
		return $this->_rowIndex;
	}

	
	public function getCellIterator() {
		return new PHPExcel_Worksheet_CellIterator($this->_parent, $this->_rowIndex);
	}
}
