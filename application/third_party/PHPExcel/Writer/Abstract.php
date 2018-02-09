<?php




abstract class PHPExcel_Writer_Abstract implements PHPExcel_Writer_IWriter
{
	
	protected $Veytbyv3yezj = FALSE;

	
	protected $Vy3i5f1namwy = TRUE;

	
	protected $Vwvbuzfgemko = FALSE;

	
	protected $Vgw42nzrqixu	= './';

	
	public function getIncludeCharts() {
		return $this->_includeCharts;
	}

	
	public function setIncludeCharts($Vqujkwol1zut = FALSE) {
		$this->_includeCharts = (boolean) $Vqujkwol1zut;
		return $this;
	}

    
    public function getPreCalculateFormulas() {
    	return $this->_preCalculateFormulas;
    }

    
    public function setPreCalculateFormulas($Vqujkwol1zut = TRUE) {
    	$this->_preCalculateFormulas = (boolean) $Vqujkwol1zut;
		return $this;
    }

	
	public function getUseDiskCaching() {
		return $this->_useDiskCaching;
	}

	
	public function setUseDiskCaching($Vqujkwol1zut = FALSE, $Vobzcjrk432o = NULL) {
		$this->_useDiskCaching = $Vqujkwol1zut;

		if ($Vobzcjrk432o !== NULL) {
    		if (is_dir($Vobzcjrk432o)) {
    			$this->_diskCachingDirectory = $Vobzcjrk432o;
    		} else {
    			throw new PHPExcel_Writer_Exception("Directory does not exist: $Vobzcjrk432o");
    		}
		}
		return $this;
	}

	
	public function getDiskCachingDirectory() {
		return $this->_diskCachingDirectory;
	}
}
