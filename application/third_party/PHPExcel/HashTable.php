<?php




class PHPExcel_HashTable
{
	
	public $V2gju2gtzsex = array();

	
	public $V4iagy4px4dd = array();

	
	public function __construct($Vjpyuzya3wl1 = null)
	{
		if ($Vjpyuzya3wl1 !== NULL) {
			
			$this->addFromSource($Vjpyuzya3wl1);
		}
	}

	
	public function addFromSource($Vjpyuzya3wl1 = null) {
		
		if ($Vjpyuzya3wl1 == null) {
			return;
		} else if (!is_array($Vjpyuzya3wl1)) {
			throw new PHPExcel_Exception('Invalid array parameter passed.');
		}

		foreach ($Vjpyuzya3wl1 as $Vc23eiaejwdl) {
			$this->add($Vc23eiaejwdl);
		}
	}

	
	public function add(PHPExcel_IComparable $Vjpyuzya3wl1 = null) {
		$Vpunajjs2mcs = $Vjpyuzya3wl1->getHashCode();
		if (!isset($this->_items[$Vpunajjs2mcs])) {
			$this->_items[$Vpunajjs2mcs] = $Vjpyuzya3wl1;
			$this->_keyMap[count($this->_items) - 1] = $Vpunajjs2mcs;
		}
	}

	
	public function remove(PHPExcel_IComparable $Vjpyuzya3wl1 = null) {
		$Vpunajjs2mcs = $Vjpyuzya3wl1->getHashCode();
		if (isset($this->_items[$Vpunajjs2mcs])) {
			unset($this->_items[$Vpunajjs2mcs]);

			$Vsjyi4ttu2ff = -1;
			foreach ($this->_keyMap as $Vseq1edikdvg => $Vp4xjtpabm0l) {
				if ($Vsjyi4ttu2ff >= 0) {
					$this->_keyMap[$Vseq1edikdvg - 1] = $Vp4xjtpabm0l;
				}

				if ($Vp4xjtpabm0l == $Vpunajjs2mcs) {
					$Vsjyi4ttu2ff = $Vseq1edikdvg;
				}
			}
			unset($this->_keyMap[count($this->_keyMap) - 1]);
		}
	}

	
	public function clear() {
		$this->_items = array();
		$this->_keyMap = array();
	}

	
	public function count() {
		return count($this->_items);
	}

	
	public function getIndexForHashCode($Vcblugwgkhej = '') {
		return array_search($Vcblugwgkhej, $this->_keyMap);
	}

	
	public function getByIndex($V4z43kvcbihn = 0) {
		if (isset($this->_keyMap[$V4z43kvcbihn])) {
			return $this->getByHashCode( $this->_keyMap[$V4z43kvcbihn] );
		}

		return null;
	}

	
	public function getByHashCode($Vcblugwgkhej = '') {
		if (isset($this->_items[$Vcblugwgkhej])) {
			return $this->_items[$Vcblugwgkhej];
		}

		return null;
	}

	
	public function toArray() {
		return $this->_items;
	}

	
	public function __clone() {
		$Vtf0r1rll31w = get_object_vars($this);
		foreach ($Vtf0r1rll31w as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			if (is_object($Vp4xjtpabm0l)) {
				$this->$Vseq1edikdvg = clone $Vp4xjtpabm0l;
			}
		}
	}
}
