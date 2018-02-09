<?php




class PHPExcel_CachedObjectStorage_Memcache extends PHPExcel_CachedObjectStorage_CacheBase implements PHPExcel_CachedObjectStorage_ICache {

	
	private $Vr2t0pgvw5l1 = null;

	
	private $Vh4zf2kduxof = 600;

	
	private $Vdbggkjclzno = null;


    
	protected function _storeData() {
		if ($this->_currentCellIsDirty && !empty($this->_currentObjectID)) {
			$this->_currentObject->detach();

			$Vxvi2fem1djf = serialize($this->_currentObject);
			if (!$this->_memcache->replace($this->_cachePrefix.$this->_currentObjectID.'.cache',$Vxvi2fem1djf,NULL,$this->_cacheTime)) {
				if (!$this->_memcache->add($this->_cachePrefix.$this->_currentObjectID.'.cache',$Vxvi2fem1djf,NULL,$this->_cacheTime)) {
					$this->__destruct();
					throw new PHPExcel_Exception('Failed to store cell '.$this->_currentObjectID.' in MemCache');
				}
			}
			$this->_currentCellIsDirty = false;
		}
		$this->_currentObjectID = $this->_currentObject = null;
	}	


    
	public function addCacheData($Vecicbl4f0hy, PHPExcel_Cell $Vblc1ueqvbti) {
		if (($Vecicbl4f0hy !== $this->_currentObjectID) && ($this->_currentObjectID !== null)) {
			$this->_storeData();
		}
		$this->_cellCache[$Vecicbl4f0hy] = true;

		$this->_currentObjectID = $Vecicbl4f0hy;
		$this->_currentObject = $Vblc1ueqvbti;
		$this->_currentCellIsDirty = true;

		return $Vblc1ueqvbti;
	}	


	
	public function isDataSet($Vecicbl4f0hy) {
		
		if (parent::isDataSet($Vecicbl4f0hy)) {
			if ($this->_currentObjectID == $Vecicbl4f0hy) {
				return true;
			}
			
			$V0oxrvyvzxpi = $this->_memcache->get($this->_cachePrefix.$Vecicbl4f0hy.'.cache');
			if ($V0oxrvyvzxpi === false) {
				
				parent::deleteCacheData($Vecicbl4f0hy);
				throw new PHPExcel_Exception('Cell entry '.$Vecicbl4f0hy.' no longer exists in MemCache');
			}
			return true;
		}
		return false;
	}	


	
	public function getCacheData($Vecicbl4f0hy) {
		if ($Vecicbl4f0hy === $this->_currentObjectID) {
			return $this->_currentObject;
		}
		$this->_storeData();

		
		if (parent::isDataSet($Vecicbl4f0hy)) {
			$Vxvi2fem1djf = $this->_memcache->get($this->_cachePrefix.$Vecicbl4f0hy.'.cache');
			if ($Vxvi2fem1djf === false) {
				
				parent::deleteCacheData($Vecicbl4f0hy);
				throw new PHPExcel_Exception('Cell entry '.$Vecicbl4f0hy.' no longer exists in MemCache');
			}
		} else {
			
			return null;
		}

		
		$this->_currentObjectID = $Vecicbl4f0hy;
		$this->_currentObject = unserialize($Vxvi2fem1djf);
        
        $this->_currentObject->attach($this);

		
		return $this->_currentObject;
	}	


	
	public function getCellList() {
		if ($this->_currentObjectID !== null) {
			$this->_storeData();
		}

		return parent::getCellList();
	}


    
	public function deleteCacheData($Vecicbl4f0hy) {
		
		$this->_memcache->delete($this->_cachePrefix.$Vecicbl4f0hy.'.cache');

		
		parent::deleteCacheData($Vecicbl4f0hy);
	}	


	
	public function copyCellCollection(PHPExcel_Worksheet $V3jkqexf4nr0) {
		parent::copyCellCollection($V3jkqexf4nr0);
		
		$Vs5lhzh53hdn = $this->_getUniqueID();
		$Vimb3hod32vz = substr(md5($Vs5lhzh53hdn),0,8).'.';
		$Vrosms03kfvu = $this->getCellList();
		foreach($Vrosms03kfvu as $Vblc1ueqvbtiID) {
			if ($Vblc1ueqvbtiID != $this->_currentObjectID) {
				$Vxvi2fem1djf = $this->_memcache->get($this->_cachePrefix.$Vblc1ueqvbtiID.'.cache');
				if ($Vxvi2fem1djf === false) {
					
					parent::deleteCacheData($Vblc1ueqvbtiID);
					throw new PHPExcel_Exception('Cell entry '.$Vblc1ueqvbtiID.' no longer exists in MemCache');
				}
				if (!$this->_memcache->add($Vimb3hod32vz.$Vblc1ueqvbtiID.'.cache',$Vxvi2fem1djf,NULL,$this->_cacheTime)) {
					$this->__destruct();
					throw new PHPExcel_Exception('Failed to store cell '.$Vblc1ueqvbtiID.' in MemCache');
				}
			}
		}
		$this->_cachePrefix = $Vimb3hod32vz;
	}	


	
	public function unsetWorksheetCells() {
		if(!is_null($this->_currentObject)) {
			$this->_currentObject->detach();
			$this->_currentObject = $this->_currentObjectID = null;
		}

		
		$this->__destruct();

		$this->_cellCache = array();

		
		$this->_parent = null;
	}	


	
	public function __construct(PHPExcel_Worksheet $V3jkqexf4nr0, $Vy2di2fo5jaz) {
		$V2jvtrnzyvez	= (isset($Vy2di2fo5jaz['memcacheServer']))	? $Vy2di2fo5jaz['memcacheServer']	: 'localhost';
		$Vhoicy2500fd	= (isset($Vy2di2fo5jaz['memcachePort']))	? $Vy2di2fo5jaz['memcachePort']	: 11211;
		$Vfrlw2st5scl		= (isset($Vy2di2fo5jaz['cacheTime']))		? $Vy2di2fo5jaz['cacheTime']		: 600;

		if (is_null($this->_cachePrefix)) {
			$Vs5lhzh53hdn = $this->_getUniqueID();
			$this->_cachePrefix = substr(md5($Vs5lhzh53hdn),0,8).'.';

			
			$this->_memcache = new Memcache();
			if (!$this->_memcache->addServer($V2jvtrnzyvez, $Vhoicy2500fd, false, 50, 5, 5, true, array($this, 'failureCallback'))) {
				throw new PHPExcel_Exception('Could not connect to MemCache server at '.$V2jvtrnzyvez.':'.$Vhoicy2500fd);
			}
			$this->_cacheTime = $Vfrlw2st5scl;

			parent::__construct($V3jkqexf4nr0);
		}
	}	


	
	public function failureCallback($Vy4zba2jo55u, $Vkjhl5muygy4) {
		throw new PHPExcel_Exception('memcache '.$Vy4zba2jo55u.':'.$Vkjhl5muygy4.' failed');
	}


	
	public function __destruct() {
		$Vrosms03kfvu = $this->getCellList();
		foreach($Vrosms03kfvu as $Vblc1ueqvbtiID) {
			$this->_memcache->delete($this->_cachePrefix.$Vblc1ueqvbtiID.'.cache');
		}
	}	

	
	public static function cacheMethodIsAvailable() {
		if (!function_exists('memcache_add')) {
			return false;
		}

		return true;
	}

}
