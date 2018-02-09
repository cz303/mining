<?php




class PHPExcel_CachedObjectStorage_Igbinary extends PHPExcel_CachedObjectStorage_CacheBase implements PHPExcel_CachedObjectStorage_ICache {

    
	protected function _storeData() {
		if ($this->_currentCellIsDirty && !empty($this->_currentObjectID)) {
			$this->_currentObject->detach();

			$this->_cellCache[$this->_currentObjectID] = igbinary_serialize($this->_currentObject);
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
		$this->_currentObject = igbinary_unserialize($this->_cellCache[$Vecicbl4f0hy]);
        
        $this->_currentObject->attach($this);

		
		return $this->_currentObject;
	}	


	
	public function getCellList() {
		if ($this->_currentObjectID !== null) {
			$this->_storeData();
		}

		return parent::getCellList();
	}


	
	public function unsetWorksheetCells() {
		if(!is_null($this->_currentObject)) {
			$this->_currentObject->detach();
			$this->_currentObject = $this->_currentObjectID = null;
		}
		$this->_cellCache = array();

		
		$this->_parent = null;
	}	


	
	public static function cacheMethodIsAvailable() {
		if (!function_exists('igbinary_serialize')) {
			return false;
		}

		return true;
	}

}
