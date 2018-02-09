<?php




abstract class PHPExcel_CachedObjectStorage_CacheBase {

	
	protected $Vq20emrsdn3q;

	
	protected $Vnotljhfwlfh = null;

	
	protected $VnotljhfwlfhID = null;


	
	protected $Vtqd203mdrgb = true;

	
	protected $V1zfhx5sgy45 = array();


	
	public function __construct(PHPExcel_Worksheet $V3jkqexf4nr0) {
		
		
		
		$this->_parent = $V3jkqexf4nr0;
	}	


	
	public function getParent()
	{
		return $this->_parent;
	}

	
	public function isDataSet($Vecicbl4f0hy) {
		if ($Vecicbl4f0hy === $this->_currentObjectID) {
			return true;
		}
		
		return isset($this->_cellCache[$Vecicbl4f0hy]);
	}	


	
	public function moveCell($Vclecbdjcebh, $Vpblpwcx31pp) {
		if ($Vclecbdjcebh === $this->_currentObjectID) {
			$this->_currentObjectID = $Vpblpwcx31pp;
		}
		$this->_currentCellIsDirty = true;
		if (isset($this->_cellCache[$Vclecbdjcebh])) {
			$this->_cellCache[$Vpblpwcx31pp] = &$this->_cellCache[$Vclecbdjcebh];
			unset($this->_cellCache[$Vclecbdjcebh]);
		}

		return TRUE;
	}	


    
	public function updateCacheData(PHPExcel_Cell $Vblc1ueqvbti) {
		return $this->addCacheData($Vblc1ueqvbti->getCoordinate(),$Vblc1ueqvbti);
	}	


    
	public function deleteCacheData($Vecicbl4f0hy) {
		if ($Vecicbl4f0hy === $this->_currentObjectID) {
			$this->_currentObject->detach();
			$this->_currentObjectID = $this->_currentObject = null;
		}

		if (is_object($this->_cellCache[$Vecicbl4f0hy])) {
			$this->_cellCache[$Vecicbl4f0hy]->detach();
			unset($this->_cellCache[$Vecicbl4f0hy]);
		}
		$this->_currentCellIsDirty = false;
	}	


	
	public function getCellList() {
		return array_keys($this->_cellCache);
	}	


	
	public function getSortedCellList() {
		$Vpklswjzd5mb = array();
		foreach ($this->getCellList() as $Vg00bwbj0p2f) {
			sscanf($Vg00bwbj0p2f,'%[A-Z]%d', $Vn4q2p4mkwa0, $Vexbtekafkvl);
			$Vpklswjzd5mb[sprintf('%09d%3s',$Vexbtekafkvl,$Vn4q2p4mkwa0)] = $Vg00bwbj0p2f;
		}
		ksort($Vpklswjzd5mb);

		return array_values($Vpklswjzd5mb);
	}	



	
	public function getHighestRowAndColumn()
	{
		
		$Vswazvoa3xts = array('A' => '1A');
		$Vexbtekafkvl = array(1);
		foreach ($this->getCellList() as $Vg00bwbj0p2f) {
			sscanf($Vg00bwbj0p2f,'%[A-Z]%d', $V4y0urwpnd3j, $Vws44nszhvgo);
			$Vexbtekafkvl[$Vws44nszhvgo] = $Vws44nszhvgo;
			$Vswazvoa3xts[$V4y0urwpnd3j] = strlen($V4y0urwpnd3j).$V4y0urwpnd3j;
		}
		if (!empty($Vexbtekafkvl)) {
			
			$Vrzlowqumaxt = max($Vexbtekafkvl);
			$Vlb0wwrz5dnx = substr(max($Vswazvoa3xts),1);
		}

		return array( 'row'	   => $Vrzlowqumaxt,
					  'column' => $Vlb0wwrz5dnx
					);
	}


	
	public function getCurrentAddress()
	{
		return $this->_currentObjectID;
	}

	
	public function getCurrentColumn()
	{
		sscanf($this->_currentObjectID, '%[A-Z]%d', $Vn4q2p4mkwa0, $Vexbtekafkvl);
		return $Vn4q2p4mkwa0;
	}

	
	public function getCurrentRow()
	{
		sscanf($this->_currentObjectID, '%[A-Z]%d', $Vn4q2p4mkwa0, $Vexbtekafkvl);
		return (integer) $Vexbtekafkvl;
	}

	
	public function getHighestColumn($Vexbtekafkvl = null)
	{
        if ($Vexbtekafkvl == null) {
    		$Vswazvoa3xtsRow = $this->getHighestRowAndColumn();
	    	return $Vswazvoa3xtsRow['column'];
        }

        $Vn4q2p4mkwa0List = array(1);
        foreach ($this->getCellList() as $Vg00bwbj0p2f) {
            sscanf($Vg00bwbj0p2f,'%[A-Z]%d', $V4y0urwpnd3j, $Vws44nszhvgo);
            if ($Vws44nszhvgo != $Vexbtekafkvl) {
                continue;
            }
            $Vn4q2p4mkwa0List[] = PHPExcel_Cell::columnIndexFromString($V4y0urwpnd3j);
        }
        return PHPExcel_Cell::stringFromColumnIndex(max($Vn4q2p4mkwa0List) - 1);
    }

	
	public function getHighestRow($Vn4q2p4mkwa0 = null)
	{
        if ($Vn4q2p4mkwa0 == null) {
	    	$Vswazvoa3xtsRow = $this->getHighestRowAndColumn();
    		return $Vswazvoa3xtsRow['row'];
        }

        $VexbtekafkvlList = array(0);
        foreach ($this->getCellList() as $Vg00bwbj0p2f) {
            sscanf($Vg00bwbj0p2f,'%[A-Z]%d', $V4y0urwpnd3j, $Vws44nszhvgo);
            if ($V4y0urwpnd3j != $Vn4q2p4mkwa0) {
                continue;
            }
            $VexbtekafkvlList[] = $Vws44nszhvgo;
        }

        return max($VexbtekafkvlList);
	}


	
	protected function _getUniqueID() {
		if (function_exists('posix_getpid')) {
			$Vs5lhzh53hdn = posix_getpid();
		} else {
			$Vs5lhzh53hdn = mt_rand();
		}
		return uniqid($Vs5lhzh53hdn,true);
	}

	
	public function copyCellCollection(PHPExcel_Worksheet $V3jkqexf4nr0) {
		$this->_currentCellIsDirty;
        $this->_storeData();

		$this->_parent = $V3jkqexf4nr0;
		if (($this->_currentObject !== NULL) && (is_object($this->_currentObject))) {
			$this->_currentObject->attach($this);
		}
	}	


	
	public static function cacheMethodIsAvailable() {
		return true;
	}

}
