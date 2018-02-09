<?php




class PHPExcel_CachedObjectStorage_DiscISAM extends PHPExcel_CachedObjectStorage_CacheBase implements PHPExcel_CachedObjectStorage_ICache {

	
	private $Vo4ly22vfpxo = NULL;

	
	private $Vhflhkfyhcyl = NULL;

	
	private $Vatsuycwmzbz = NULL;


    
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
		fseek($this->_fileHandle, $this->_cellCache[$Vecicbl4f0hy]['ptr']);
		$this->_currentObject = unserialize(fread($this->_fileHandle, $this->_cellCache[$Vecicbl4f0hy]['sz']));
        
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
		
		$Vs5lhzh53hdn = $this->_getUniqueID();
		$Vvm5yurmbjig = $this->_cacheDirectory.'/PHPExcel.'.$Vs5lhzh53hdn.'.cache';
		
		copy ($this->_fileName,$Vvm5yurmbjig);
		$this->_fileName = $Vvm5yurmbjig;
		
		$this->_fileHandle = fopen($this->_fileName,'a+');
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
		$this->_cacheDirectory	= ((isset($Vy2di2fo5jaz['dir'])) && ($Vy2di2fo5jaz['dir'] !== NULL))
									? $Vy2di2fo5jaz['dir']
									: PHPExcel_Shared_File::sys_get_temp_dir();

		parent::__construct($V3jkqexf4nr0);
		if (is_null($this->_fileHandle)) {
			$Vs5lhzh53hdn = $this->_getUniqueID();
			$this->_fileName = $this->_cacheDirectory.'/PHPExcel.'.$Vs5lhzh53hdn.'.cache';
			$this->_fileHandle = fopen($this->_fileName,'a+');
		}
	}	


	
	public function __destruct() {
		if (!is_null($this->_fileHandle)) {
			fclose($this->_fileHandle);
			unlink($this->_fileName);
		}
		$this->_fileHandle = null;
	}	

}
