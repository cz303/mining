<?php




class PHPExcel_CachedObjectStorage_SQLite3 extends PHPExcel_CachedObjectStorage_CacheBase implements PHPExcel_CachedObjectStorage_ICache {

	
	private $Vcl0quwndjzh = null;

	
	private $Vnrfxhxesxaz = null;

	
	private $V04dvqvsg33k;

	
	private $Vchxbhz1hrex;

	
	private $Vvqydgyrpymi;

	
	private $Vkmdmwunxjbj;

    
	protected function _storeData() {
		if ($this->_currentCellIsDirty && !empty($this->_currentObjectID)) {
			$this->_currentObject->detach();

			$this->_insertQuery->bindValue('id',$this->_currentObjectID,SQLITE3_TEXT);
			$this->_insertQuery->bindValue('data',serialize($this->_currentObject),SQLITE3_BLOB);
			$Vwbpa3giaw5f = $this->_insertQuery->execute();
			if ($Vwbpa3giaw5f === false)
				throw new PHPExcel_Exception($this->_DBHandle->lastErrorMsg());
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

		$this->_selectQuery->bindValue('id',$Vecicbl4f0hy,SQLITE3_TEXT);
		$Vblc1ueqvbtiResult = $this->_selectQuery->execute();
		if ($Vblc1ueqvbtiResult === FALSE) {
			throw new PHPExcel_Exception($this->_DBHandle->lastErrorMsg());
		}
		$Vblc1ueqvbtiData = $Vblc1ueqvbtiResult->fetchArray(SQLITE3_ASSOC);
		if ($Vblc1ueqvbtiData === FALSE) {
			
			return NULL;
		}

		
		$this->_currentObjectID = $Vecicbl4f0hy;

		$this->_currentObject = unserialize($Vblc1ueqvbtiData['value']);
        
        $this->_currentObject->attach($this);

		
		return $this->_currentObject;
	}	


	
	public function isDataSet($Vecicbl4f0hy) {
		if ($Vecicbl4f0hy === $this->_currentObjectID) {
			return TRUE;
		}

		
		$this->_selectQuery->bindValue('id',$Vecicbl4f0hy,SQLITE3_TEXT);
		$Vblc1ueqvbtiResult = $this->_selectQuery->execute();
		if ($Vblc1ueqvbtiResult === FALSE) {
			throw new PHPExcel_Exception($this->_DBHandle->lastErrorMsg());
		}
		$Vblc1ueqvbtiData = $Vblc1ueqvbtiResult->fetchArray(SQLITE3_ASSOC);

		return ($Vblc1ueqvbtiData === FALSE) ? FALSE : TRUE;
	}	


    
	public function deleteCacheData($Vecicbl4f0hy) {
		if ($Vecicbl4f0hy === $this->_currentObjectID) {
			$this->_currentObject->detach();
			$this->_currentObjectID = $this->_currentObject = NULL;
		}

		
		$this->_deleteQuery->bindValue('id',$Vecicbl4f0hy,SQLITE3_TEXT);
		$Vwbpa3giaw5f = $this->_deleteQuery->execute();
		if ($Vwbpa3giaw5f === FALSE)
			throw new PHPExcel_Exception($this->_DBHandle->lastErrorMsg());

		$this->_currentCellIsDirty = FALSE;
	}	


	
	public function moveCell($Vclecbdjcebh, $Vpblpwcx31pp) {
		if ($Vclecbdjcebh === $this->_currentObjectID) {
			$this->_currentObjectID = $Vpblpwcx31pp;
		}

		$this->_deleteQuery->bindValue('id',$Vpblpwcx31pp,SQLITE3_TEXT);
		$Vwbpa3giaw5f = $this->_deleteQuery->execute();
		if ($Vwbpa3giaw5f === false)
			throw new PHPExcel_Exception($this->_DBHandle->lastErrorMsg());

		$this->_updateQuery->bindValue('toid',$Vpblpwcx31pp,SQLITE3_TEXT);
		$this->_updateQuery->bindValue('fromid',$Vclecbdjcebh,SQLITE3_TEXT);
		$Vwbpa3giaw5f = $this->_updateQuery->execute();
		if ($Vwbpa3giaw5f === false)
			throw new PHPExcel_Exception($this->_DBHandle->lastErrorMsg());

		return TRUE;
	}	


	
	public function getCellList() {
		if ($this->_currentObjectID !== null) {
			$this->_storeData();
		}

		$Vuq34jlhekzm = "SELECT id FROM kvp_".$this->_TableName;
		$Vblc1ueqvbtiIdsResult = $this->_DBHandle->query($Vuq34jlhekzm);
		if ($Vblc1ueqvbtiIdsResult === false)
			throw new PHPExcel_Exception($this->_DBHandle->lastErrorMsg());

		$Vblc1ueqvbtiKeys = array();
		while ($Vexbtekafkvl = $Vblc1ueqvbtiIdsResult->fetchArray(SQLITE3_ASSOC)) {
			$Vblc1ueqvbtiKeys[] = $Vexbtekafkvl['id'];
		}

		return $Vblc1ueqvbtiKeys;
	}	


	
	public function copyCellCollection(PHPExcel_Worksheet $V3jkqexf4nr0) {
		$this->_currentCellIsDirty;
        $this->_storeData();

		
		$Vxttxnuhajau = str_replace('.','_',$this->_getUniqueID());
		if (!$this->_DBHandle->exec('CREATE TABLE kvp_'.$Vxttxnuhajau.' (id VARCHAR(12) PRIMARY KEY, value BLOB)
		                                       AS SELECT * FROM kvp_'.$this->_TableName))
			throw new PHPExcel_Exception($this->_DBHandle->lastErrorMsg());

		
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

			$this->_DBHandle = new SQLite3($Vzhxehgdv1xx);
			if ($this->_DBHandle === false)
				throw new PHPExcel_Exception($this->_DBHandle->lastErrorMsg());
			if (!$this->_DBHandle->exec('CREATE TABLE kvp_'.$this->_TableName.' (id VARCHAR(12) PRIMARY KEY, value BLOB)'))
				throw new PHPExcel_Exception($this->_DBHandle->lastErrorMsg());
		}

		$this->_selectQuery = $this->_DBHandle->prepare("SELECT value FROM kvp_".$this->_TableName." WHERE id = :id");
		$this->_insertQuery = $this->_DBHandle->prepare("INSERT OR REPLACE INTO kvp_".$this->_TableName." VALUES(:id,:data)");
		$this->_updateQuery = $this->_DBHandle->prepare("UPDATE kvp_".$this->_TableName." SET id=:toId WHERE id=:fromId");
		$this->_deleteQuery = $this->_DBHandle->prepare("DELETE FROM kvp_".$this->_TableName." WHERE id = :id");
	}	


	
	public function __destruct() {
		if (!is_null($this->_DBHandle)) {
			$this->_DBHandle->exec('DROP TABLE kvp_'.$this->_TableName);
			$this->_DBHandle->close();
		}
		$this->_DBHandle = null;
	}	


	
	public static function cacheMethodIsAvailable() {
		if (!class_exists('SQLite3',FALSE)) {
			return false;
		}

		return true;
	}

}
