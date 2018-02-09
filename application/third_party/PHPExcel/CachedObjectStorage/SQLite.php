<?php




class PHPExcel_CachedObjectStorage_SQLite extends PHPExcel_CachedObjectStorage_CacheBase implements PHPExcel_CachedObjectStorage_ICache {

	
	private $Vcl0quwndjzh = null;

	
	private $Vnrfxhxesxaz = null;

    
	protected function _storeData() {
		if ($this->_currentCellIsDirty && !empty($this->_currentObjectID)) {
			$this->_currentObject->detach();

			if (!$this->_DBHandle->queryExec("INSERT OR REPLACE INTO kvp_".$this->_TableName." VALUES('".$this->_currentObjectID."','".sqlite_escape_string(serialize($this->_currentObject))."')"))
				throw new PHPExcel_Exception(sqlite_error_string($this->_DBHandle->lastError()));
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

		$Vuq34jlhekzm = "SELECT value FROM kvp_".$this->_TableName." WHERE id='".$Vecicbl4f0hy."'";
		$Vblc1ueqvbtiResultSet = $this->_DBHandle->query($Vuq34jlhekzm,SQLITE_ASSOC);
		if ($Vblc1ueqvbtiResultSet === false) {
			throw new PHPExcel_Exception(sqlite_error_string($this->_DBHandle->lastError()));
		} elseif ($Vblc1ueqvbtiResultSet->numRows() == 0) {
			
			return null;
		}

		
		$this->_currentObjectID = $Vecicbl4f0hy;

		$Vblc1ueqvbtiResult = $Vblc1ueqvbtiResultSet->fetchSingle();
		$this->_currentObject = unserialize($Vblc1ueqvbtiResult);
        
        $this->_currentObject->attach($this);

		
		return $this->_currentObject;
	}	


	
	public function isDataSet($Vecicbl4f0hy) {
		if ($Vecicbl4f0hy === $this->_currentObjectID) {
			return true;
		}

		
		$Vuq34jlhekzm = "SELECT id FROM kvp_".$this->_TableName." WHERE id='".$Vecicbl4f0hy."'";
		$Vblc1ueqvbtiResultSet = $this->_DBHandle->query($Vuq34jlhekzm,SQLITE_ASSOC);
		if ($Vblc1ueqvbtiResultSet === false) {
			throw new PHPExcel_Exception(sqlite_error_string($this->_DBHandle->lastError()));
		} elseif ($Vblc1ueqvbtiResultSet->numRows() == 0) {
			
			return false;
		}
		return true;
	}	


    
	public function deleteCacheData($Vecicbl4f0hy) {
		if ($Vecicbl4f0hy === $this->_currentObjectID) {
			$this->_currentObject->detach();
			$this->_currentObjectID = $this->_currentObject = null;
		}

		
		$Vuq34jlhekzm = "DELETE FROM kvp_".$this->_TableName." WHERE id='".$Vecicbl4f0hy."'";
		if (!$this->_DBHandle->queryExec($Vuq34jlhekzm))
			throw new PHPExcel_Exception(sqlite_error_string($this->_DBHandle->lastError()));

		$this->_currentCellIsDirty = false;
	}	


	
	public function moveCell($Vclecbdjcebh, $Vpblpwcx31pp) {
		if ($Vclecbdjcebh === $this->_currentObjectID) {
			$this->_currentObjectID = $Vpblpwcx31pp;
		}

		$Vuq34jlhekzm = "DELETE FROM kvp_".$this->_TableName." WHERE id='".$Vpblpwcx31pp."'";
		$Vwbpa3giaw5f = $this->_DBHandle->exec($Vuq34jlhekzm);
		if ($Vwbpa3giaw5f === false)
			throw new PHPExcel_Exception($this->_DBHandle->lastErrorMsg());

		$Vuq34jlhekzm = "UPDATE kvp_".$this->_TableName." SET id='".$Vpblpwcx31pp."' WHERE id='".$Vclecbdjcebh."'";
		$Vwbpa3giaw5f = $this->_DBHandle->exec($Vuq34jlhekzm);
		if ($Vwbpa3giaw5f === false)
			throw new PHPExcel_Exception($this->_DBHandle->lastErrorMsg());

		return TRUE;
	}	


	
	public function getCellList() {
		if ($this->_currentObjectID !== null) {
			$this->_storeData();
		}

		$Vuq34jlhekzm = "SELECT id FROM kvp_".$this->_TableName;
		$Vblc1ueqvbtiIdsResult = $this->_DBHandle->unbufferedQuery($Vuq34jlhekzm,SQLITE_ASSOC);
		if ($Vblc1ueqvbtiIdsResult === false)
			throw new PHPExcel_Exception(sqlite_error_string($this->_DBHandle->lastError()));

		$Vblc1ueqvbtiKeys = array();
		foreach($Vblc1ueqvbtiIdsResult as $Vexbtekafkvl) {
			$Vblc1ueqvbtiKeys[] = $Vexbtekafkvl['id'];
		}

		return $Vblc1ueqvbtiKeys;
	}	


	
	public function copyCellCollection(PHPExcel_Worksheet $V3jkqexf4nr0) {
		$this->_currentCellIsDirty;
        $this->_storeData();

		
		$Vxttxnuhajau = str_replace('.','_',$this->_getUniqueID());
		if (!$this->_DBHandle->queryExec('CREATE TABLE kvp_'.$Vxttxnuhajau.' (id VARCHAR(12) PRIMARY KEY, value BLOB)
													AS SELECT * FROM kvp_'.$this->_TableName))
			throw new PHPExcel_Exception(sqlite_error_string($this->_DBHandle->lastError()));

		
		$this->_TableName = $Vxttxnuhajau;
	}	


	
	public function unsetWorksheetCells() {
		if(!is_null($this->_currentObject)) {
			$this->_currentObject->detach();
			$this->_currentObject = $this->_currentObjectID = null;
		}
		
		$this->_parent = null;

		
		$this->__destruct();
	}	


	
	public function __construct(PHPExcel_Worksheet $V3jkqexf4nr0) {
		parent::__construct($V3jkqexf4nr0);
		if (is_null($this->_DBHandle)) {
			$this->_TableName = str_replace('.','_',$this->_getUniqueID());
			$Vzhxehgdv1xx = ':memory:';

			$this->_DBHandle = new SQLiteDatabase($Vzhxehgdv1xx);
			if ($this->_DBHandle === false)
				throw new PHPExcel_Exception(sqlite_error_string($this->_DBHandle->lastError()));
			if (!$this->_DBHandle->queryExec('CREATE TABLE kvp_'.$this->_TableName.' (id VARCHAR(12) PRIMARY KEY, value BLOB)'))
				throw new PHPExcel_Exception(sqlite_error_string($this->_DBHandle->lastError()));
		}
	}	


	
	public function __destruct() {
		if (!is_null($this->_DBHandle)) {
			$this->_DBHandle->queryExec('DROP TABLE kvp_'.$this->_TableName);
		}
		$this->_DBHandle = null;
	}	


	
	public static function cacheMethodIsAvailable() {
		if (!function_exists('sqlite_open')) {
			return false;
		}

		return true;
	}

}
