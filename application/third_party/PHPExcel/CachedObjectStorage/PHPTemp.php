<?php




class PHPExcel_CachedObjectStorage_PHPTemp extends PHPExcel_CachedObjectStorage_CacheBase implements PHPExcel_CachedObjectStorage_ICache {

	
	private $Vhflhkfyhcyl = null;

	
	private $Vaiyf4dgyrao = null;

    
	protected function _storeData() {
		if ($this->_currentCellIsDirty && !empty($this->_currentObjectID)) {
			$this->_currentObject->detach();

			fseek($this->_fileHandle,0,SEEK_END);

			$this->_cellCache[$this->_currentObjectID] = array(
                'ptr' => ftell($this->_fileHandle),
				'sz'  => fwrite($this->_fileHandle, serialize($this->_currentObject))
			);
			$this->_currentCellIsDirty = false;
		}
		$this->_currentObjectID = $this->_currentObject = null;
	}	


    
	public function addCacheData($Vecicbl4f0hy, PHPExcel_Cell $Vblc1ueqvbti) {
		if (($Vecicbl4f0hy !== $this->_currentObjectID) && ($this->_currentObjectID !== null)) {
			$this->_storeData();
		}

		$this->_currentObjectID = $Vecicbl4f0hy;
		$this->_currentObject = $Vblc1ueqvbti;
		$this->_currentCellIsDirty = true;

		return $Vblc1ueqvbti;
	}	


    
	public function getCacheData($Vecicbl4f0hy) {
		if ($Vecicbl4f0hy === $this->_currentObjectID) {
			return $this->_currentObject;
		}
		$this->_storeData();

		
		if (!isset($this->_cellCache[$Vecicbl4f0hy])) {
			
			return null;
		}

		
		$this->_currentObjectID = $Vecicbl4f0hy;
		fseek($this->_fileHandle,$this->_cellCache[$Vecicbl4f0hy]['ptr']);
		$this->_currentObject = unserialize(fread($this->_fileHandle,$this->_cellCache[$Vecicbl4f0hy]['sz']));
        
        $this->_currentObject->attach($this);

		
		return $this->_currentObject;
	}	


	
	public function getCellList() {
		if ($this->_currentObjectID !== null) {
			$this->_storeData();
		}

		return parent::getCellList();
	}


	
	public function copyCellCollection(PHPExcel_Worksheet $V3jkqexf4nr0) {
		parent::copyCellCollection($V3jkqexf4nr0);
		
		$Vflssjoghaii = fopen('php://temp/maxmemory:'.$this->_memoryCacheSize,'a+');
		
		fseek($this->_fileHandle,0);
		while (!feof($this->_fileHandle)) {
			fwrite($Vflssjoghaii,fread($this->_fileHandle, 1024));
		}
		$this->_fileHandle = $Vflssjoghaii;
	}	


	
	public function unsetWorksheetCells() {
		if(!is_null($this->_currentObject)) {
			$this->_currentObject->detach();
			$this->_currentObject = $this->_currentObjectID = null;
		}
		$this->_cellCache = array();

		
		$this->_parent = null;

		
		$this->__destruct();
	}	


	
	public function __construct(PHPExcel_Worksheet $V3jkqexf4nr0, $Vy2di2fo5jaz) {
		$this->_memoryCacheSize	= (isset($Vy2di2fo5jaz['memoryCacheSize']))	? $Vy2di2fo5jaz['memoryCacheSize']	: '1MB';

		parent::__construct($V3jkqexf4nr0);
		if (is_null($this->_fileHandle)) {
			$this->_fileHandle = fopen('php://temp/maxmemory:'.$this->_memoryCacheSize,'a+');
		}
	}	


	
	public function __destruct() {
		if (!is_null($this->_fileHandle)) {
			fclose($this->_fileHandle);
		}
		$this->_fileHandle = null;
	}	

}
