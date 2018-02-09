<?php




class PHPExcel_Worksheet_CellIterator implements Iterator
{
	
	private $Vpdxazfpfi4p;

	
	private $Vqayxv2gpsn0;

	
	private $Vqvgj4sslcm2 = 0;

	
	private $Vam4c4uuihjc = true;

	
	public function __construct(PHPExcel_Worksheet $Vld5fbk2n1id = null, $Vcj3rtes4zrz = 1) {
		
		$this->_subject 	= $Vld5fbk2n1id;
		$this->_rowIndex 	= $Vcj3rtes4zrz;
	}

	
	public function __destruct() {
		unset($this->_subject);
	}

	
    public function rewind() {
        $this->_position = 0;
    }

    
    public function current() {
		return $this->_subject->getCellByColumnAndRow($this->_position, $this->_rowIndex);
    }

    
    public function key() {
        return $this->_position;
    }

    
    public function next() {
        ++$this->_position;
    }

    
    public function valid() {
        
        
        
        $V35hvztf3dxl = PHPExcel_Cell::columnIndexFromString($this->_subject->getHighestColumn());

        if ($this->_onlyExistingCells) {
            
            
            
            
            while ($this->_position < $V35hvztf3dxl &&
                   !$this->_subject->cellExistsByColumnAndRow($this->_position, $this->_rowIndex)) {
                ++$this->_position;
            }
        }

        return $this->_position < $V35hvztf3dxl;
    }

	
    public function getIterateOnlyExistingCells() {
    	return $this->_onlyExistingCells;
    }

	
    public function setIterateOnlyExistingCells($Vp4xjtpabm0l = true) {
    	$this->_onlyExistingCells = $Vp4xjtpabm0l;
    }
}
