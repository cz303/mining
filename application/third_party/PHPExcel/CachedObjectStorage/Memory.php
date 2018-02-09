<?php




class PHPExcel_CachedObjectStorage_Memory extends PHPExcel_CachedObjectStorage_CacheBase implements PHPExcel_CachedObjectStorage_ICache {

    
	protected function _storeData() {
	}	

    
	public function addCacheData($Vecicbl4f0hy, PHPExcel_Cell $Vblc1ueqvbti) {
		$this->_cellCache[$Vecicbl4f0hy] = $Vblc1ueqvbti;

		
		$this->_currentObjectID = $Vecicbl4f0hy;

		return $Vblc1ueqvbti;
	}	


    
	public function getCacheData($Vecicbl4f0hy) {
		
		if (!isset($this->_cellCache[$Vecicbl4f0hy])) {
			$this->_currentObjectID = NULL;
			
			return null;
		}

		
		$this->_currentObjectID = $Vecicbl4f0hy;

		
		return $this->_cellCache[$Vecicbl4f0hy];
	}	


	
	public function copyCellCollection(PHPExcel_Worksheet $V3jkqexf4nr0) {
		parent::copyCellCollection($V3jkqexf4nr0);

		$Vo1xrt0qyftz = array();
		foreach($this->_cellCache as $V51lf1kcbto4 => &$Vblc1ueqvbti) {
			$Vo1xrt0qyftz[$V51lf1kcbto4] = clone $Vblc1ueqvbti;
			$Vo1xrt0qyftz[$V51lf1kcbto4]->attach($this);
		}

		$this->_cellCache = $Vo1xrt0qyftz;
	}


	
	public function unsetWorksheetCells() {
		
		foreach($this->_cellCache as $V51lf1kcbto4 => &$Vblc1ueqvbti) {
			$Vblc1ueqvbti->detach();
			$this->_cellCache[$V51lf1kcbto4] = null;
		}
		unset($Vblc1ueqvbti);

		$this->_cellCache = array();

		
		$this->_parent = null;
	}	

}
