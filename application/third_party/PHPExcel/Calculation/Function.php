<?php




class PHPExcel_Calculation_Function {
	
	const CATEGORY_CUBE						= 'Cube';
	const CATEGORY_DATABASE					= 'Database';
	const CATEGORY_DATE_AND_TIME			= 'Date and Time';
	const CATEGORY_ENGINEERING				= 'Engineering';
	const CATEGORY_FINANCIAL				= 'Financial';
	const CATEGORY_INFORMATION				= 'Information';
	const CATEGORY_LOGICAL					= 'Logical';
	const CATEGORY_LOOKUP_AND_REFERENCE		= 'Lookup and Reference';
	const CATEGORY_MATH_AND_TRIG			= 'Math and Trig';
	const CATEGORY_STATISTICAL				= 'Statistical';
	const CATEGORY_TEXT_AND_DATA			= 'Text and Data';

	
	private $Vnmfqlp5oqe3;

	
	private $Vasvnyjiygdf;

	
	private $Vlrtggf5h3ea;

    
    public function __construct($Vtkjgzif4zcu = NULL, $Vyfw2z5i1ivu = NULL, $V0gogoted33l = NULL)
    {
    	if (($Vtkjgzif4zcu !== NULL) && ($Vyfw2z5i1ivu !== NULL) && ($V0gogoted33l !== NULL)) {
    		
    		$this->_category 		= $Vtkjgzif4zcu;
    		$this->_excelName 		= $Vyfw2z5i1ivu;
    		$this->_phpExcelName 	= $V0gogoted33l;
    	} else {
    		throw new PHPExcel_Calculation_Exception("Invalid parameters passed.");
    	}
    }

    
    public function getCategory() {
    	return $this->_category;
    }

    
    public function setCategory($Vp4xjtpabm0l = null) {
    	if (!is_null($Vp4xjtpabm0l)) {
    		$this->_category = $Vp4xjtpabm0l;
    	} else {
    		throw new PHPExcel_Calculation_Exception("Invalid parameter passed.");
    	}
    }

    
    public function getExcelName() {
    	return $this->_excelName;
    }

    
    public function setExcelName($Vp4xjtpabm0l) {
    	$this->_excelName = $Vp4xjtpabm0l;
    }

    
    public function getPHPExcelName() {
    	return $this->_phpExcelName;
    }

    
    public function setPHPExcelName($Vp4xjtpabm0l) {
    	$this->_phpExcelName = $Vp4xjtpabm0l;
    }
}
