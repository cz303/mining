<?php




class PHPExcel_Worksheet_Protection
{
	
	private $V5ty5etjzjth					= false;

	
	private $Vhz3tm24ehav				= false;

	
	private $Vns4plg0bnw5				= false;

	
	private $Vrey0ci0undf			= false;

	
	private $Vt1k5tcw4blx			= false;

	
	private $Vo3vj2e0m54d			= false;

	
	private $Vq3fetyhv1d5			= false;

	
	private $Vvindozwbwzr			= false;

	
	private $Vwj4osugyvbj		= false;

	
	private $Ve2s15yxyuig			= false;

	
	private $Vukxzn5qlida			= false;

	
	private $Vekegxw24tdo		= false;

	
	private $Vnfby3it54lt					= false;

	
	private $Vyepcss5g1q0			= false;

	
	private $Vzca2qucnks5			= false;

	
	private $Vrrmdbxitluy	= false;

	
	private $Vnosddxwx5ja				= '';

    
    public function __construct()
    {
    }

    
    function isProtectionEnabled() {
    	return 	$this->_sheet ||
				$this->_objects ||
				$this->_scenarios ||
				$this->_formatCells ||
				$this->_formatColumns ||
				$this->_formatRows ||
				$this->_insertColumns ||
				$this->_insertRows ||
				$this->_insertHyperlinks ||
				$this->_deleteColumns ||
				$this->_deleteRows ||
				$this->_selectLockedCells ||
				$this->_sort ||
				$this->_autoFilter ||
				$this->_pivotTables ||
				$this->_selectUnlockedCells;
    }

    
    function getSheet() {
    	return $this->_sheet;
    }

    
    function setSheet($Vqujkwol1zut = false) {
    	$this->_sheet = $Vqujkwol1zut;
    	return $this;
    }

    
    function getObjects() {
    	return $this->_objects;
    }

    
    function setObjects($Vqujkwol1zut = false) {
    	$this->_objects = $Vqujkwol1zut;
    	return $this;
    }

    
    function getScenarios() {
    	return $this->_scenarios;
    }

    
    function setScenarios($Vqujkwol1zut = false) {
    	$this->_scenarios = $Vqujkwol1zut;
    	return $this;
    }

    
    function getFormatCells() {
    	return $this->_formatCells;
    }

    
    function setFormatCells($Vqujkwol1zut = false) {
    	$this->_formatCells = $Vqujkwol1zut;
    	return $this;
    }

    
    function getFormatColumns() {
    	return $this->_formatColumns;
    }

    
    function setFormatColumns($Vqujkwol1zut = false) {
    	$this->_formatColumns = $Vqujkwol1zut;
    	return $this;
    }

    
    function getFormatRows() {
    	return $this->_formatRows;
    }

    
    function setFormatRows($Vqujkwol1zut = false) {
    	$this->_formatRows = $Vqujkwol1zut;
    	return $this;
    }

    
    function getInsertColumns() {
    	return $this->_insertColumns;
    }

    
    function setInsertColumns($Vqujkwol1zut = false) {
    	$this->_insertColumns = $Vqujkwol1zut;
    	return $this;
    }

    
    function getInsertRows() {
    	return $this->_insertRows;
    }

    
    function setInsertRows($Vqujkwol1zut = false) {
    	$this->_insertRows = $Vqujkwol1zut;
    	return $this;
    }

    
    function getInsertHyperlinks() {
    	return $this->_insertHyperlinks;
    }

    
    function setInsertHyperlinks($Vqujkwol1zut = false) {
    	$this->_insertHyperlinks = $Vqujkwol1zut;
    	return $this;
    }

    
    function getDeleteColumns() {
    	return $this->_deleteColumns;
    }

    
    function setDeleteColumns($Vqujkwol1zut = false) {
    	$this->_deleteColumns = $Vqujkwol1zut;
    	return $this;
    }

    
    function getDeleteRows() {
    	return $this->_deleteRows;
    }

    
    function setDeleteRows($Vqujkwol1zut = false) {
    	$this->_deleteRows = $Vqujkwol1zut;
    	return $this;
    }

    
    function getSelectLockedCells() {
    	return $this->_selectLockedCells;
    }

    
    function setSelectLockedCells($Vqujkwol1zut = false) {
    	$this->_selectLockedCells = $Vqujkwol1zut;
    	return $this;
    }

    
    function getSort() {
    	return $this->_sort;
    }

    
    function setSort($Vqujkwol1zut = false) {
    	$this->_sort = $Vqujkwol1zut;
    	return $this;
    }

    
    function getAutoFilter() {
    	return $this->_autoFilter;
    }

    
    function setAutoFilter($Vqujkwol1zut = false) {
    	$this->_autoFilter = $Vqujkwol1zut;
    	return $this;
    }

    
    function getPivotTables() {
    	return $this->_pivotTables;
    }

    
    function setPivotTables($Vqujkwol1zut = false) {
    	$this->_pivotTables = $Vqujkwol1zut;
    	return $this;
    }

    
    function getSelectUnlockedCells() {
    	return $this->_selectUnlockedCells;
    }

    
    function setSelectUnlockedCells($Vqujkwol1zut = false) {
    	$this->_selectUnlockedCells = $Vqujkwol1zut;
    	return $this;
    }

    
    function getPassword() {
    	return $this->_password;
    }

    
    function setPassword($Vqujkwol1zut = '', $Vkwqfcocb3p1 = false) {
    	if (!$Vkwqfcocb3p1) {
    		$Vqujkwol1zut = PHPExcel_Shared_PasswordHasher::hashPassword($Vqujkwol1zut);
    	}
		$this->_password = $Vqujkwol1zut;
		return $this;
    }

	
	public function __clone() {
		$Vtf0r1rll31w = get_object_vars($this);
		foreach ($Vtf0r1rll31w as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			if (is_object($Vp4xjtpabm0l)) {
				$this->$Vseq1edikdvg = clone $Vp4xjtpabm0l;
			} else {
				$this->$Vseq1edikdvg = $Vp4xjtpabm0l;
			}
		}
	}
}
