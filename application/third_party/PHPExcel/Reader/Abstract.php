<?php




abstract class PHPExcel_Reader_Abstract implements PHPExcel_Reader_IReader
{
	
	protected $Vjj3vtkotvzj = FALSE;

	
	protected $Veytbyv3yezj = FALSE;

	
	protected $Vjw2npwi0isp = NULL;

	
	protected $V1us1co2exrg = NULL;

	protected $Vhflhkfyhcyl = NULL;


	
	public function getReadDataOnly() {
		return $this->_readDataOnly;
	}

	
	public function setReadDataOnly($Vqujkwol1zut = FALSE) {
		$this->_readDataOnly = $Vqujkwol1zut;
		return $this;
	}

	
	public function getIncludeCharts() {
		return $this->_includeCharts;
	}

	
	public function setIncludeCharts($Vqujkwol1zut = FALSE) {
		$this->_includeCharts = (boolean) $Vqujkwol1zut;
		return $this;
	}

	
	public function getLoadSheetsOnly()
	{
		return $this->_loadSheetsOnly;
	}

	
	public function setLoadSheetsOnly($Vp4xjtpabm0l = NULL)
	{
        if ($Vp4xjtpabm0l === NULL)
            return $this->setLoadAllSheets();

        $this->_loadSheetsOnly = is_array($Vp4xjtpabm0l) ?
			$Vp4xjtpabm0l : array($Vp4xjtpabm0l);
		return $this;
	}

	
	public function setLoadAllSheets()
	{
		$this->_loadSheetsOnly = NULL;
		return $this;
	}

	
	public function getReadFilter() {
		return $this->_readFilter;
	}

	
	public function setReadFilter(PHPExcel_Reader_IReadFilter $Vqujkwol1zut) {
		$this->_readFilter = $Vqujkwol1zut;
		return $this;
	}

	
	protected function _openFile($V1tltbb5c5oc)
	{
		
		if (!file_exists($V1tltbb5c5oc) || !is_readable($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

		
		$this->_fileHandle = fopen($V1tltbb5c5oc, 'r');
		if ($this->_fileHandle === FALSE) {
			throw new PHPExcel_Reader_Exception("Could not open file " . $V1tltbb5c5oc . " for reading.");
		}
	}

	
	public function canRead($V1tltbb5c5oc)
	{
		
		try {
			$this->_openFile($V1tltbb5c5oc);
		} catch (Exception $Vnhm0uuykimv) {
			return FALSE;
		}

		$Vadqvgq1hk2n = $this->_isValidFormat();
		fclose ($this->_fileHandle);
		return $Vadqvgq1hk2n;
	}

}
