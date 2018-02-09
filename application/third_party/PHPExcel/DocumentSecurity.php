<?php




class PHPExcel_DocumentSecurity
{
	
	private $V1dwmm1exvzm;

	
	private $Vboanedhx5ur;

	
	private $Vsu514ceu0yf;

	
	private $Vlxpdfb31chw;

	
	private $Vnmtjpob5gt0;

    
    public function __construct()
    {
    	
    	$this->_lockRevision		= false;
    	$this->_lockStructure		= false;
    	$this->_lockWindows			= false;
    	$this->_revisionsPassword	= '';
    	$this->_workbookPassword	= '';
    }

    
    function isSecurityEnabled() {
    	return 	$this->_lockRevision ||
		    	$this->_lockStructure ||
		    	$this->_lockWindows;
    }

    
    function getLockRevision() {
    	return $this->_lockRevision;
    }

    
    function setLockRevision($Vqujkwol1zut = false) {
    	$this->_lockRevision = $Vqujkwol1zut;
    	return $this;
    }

    
    function getLockStructure() {
    	return $this->_lockStructure;
    }

    
    function setLockStructure($Vqujkwol1zut = false) {
		$this->_lockStructure = $Vqujkwol1zut;
		return $this;
    }

    
    function getLockWindows() {
    	return $this->_lockWindows;
    }

    
    function setLockWindows($Vqujkwol1zut = false) {
    	$this->_lockWindows = $Vqujkwol1zut;
    	return $this;
    }

    
    function getRevisionsPassword() {
    	return $this->_revisionsPassword;
    }

    
    function setRevisionsPassword($Vqujkwol1zut = '', $Vkwqfcocb3p1 = false) {
    	if (!$Vkwqfcocb3p1) {
    		$Vqujkwol1zut = PHPExcel_Shared_PasswordHasher::hashPassword($Vqujkwol1zut);
    	}
    	$this->_revisionsPassword = $Vqujkwol1zut;
    	return $this;
    }

    
    function getWorkbookPassword() {
    	return $this->_workbookPassword;
    }

    
    function setWorkbookPassword($Vqujkwol1zut = '', $Vkwqfcocb3p1 = false) {
    	if (!$Vkwqfcocb3p1) {
    		$Vqujkwol1zut = PHPExcel_Shared_PasswordHasher::hashPassword($Vqujkwol1zut);
    	}
		$this->_workbookPassword = $Vqujkwol1zut;
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
