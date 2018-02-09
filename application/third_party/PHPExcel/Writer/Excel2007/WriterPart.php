<?php




abstract class PHPExcel_Writer_Excel2007_WriterPart
{
	
	private $V3gqcxrtrrht;

	
	public function setParentWriter(PHPExcel_Writer_IWriter $Vtbv4xndi2vm = null) {
		$this->_parentWriter = $Vtbv4xndi2vm;
	}

	
	public function getParentWriter() {
		if (!is_null($this->_parentWriter)) {
			return $this->_parentWriter;
		} else {
			throw new PHPExcel_Writer_Exception("No parent PHPExcel_Writer_IWriter assigned.");
		}
	}

	
	public function __construct(PHPExcel_Writer_IWriter $Vtbv4xndi2vm = null) {
		if (!is_null($Vtbv4xndi2vm)) {
			$this->_parentWriter = $Vtbv4xndi2vm;
		}
	}

}
