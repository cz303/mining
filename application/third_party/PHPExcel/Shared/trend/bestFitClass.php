<?php




class PHPExcel_Best_Fit
{
	
	protected $Vy0cngy32va2				= False;

	
	protected $Vspksib4nuta			= 'undetermined';

	
	protected $Viig13plb3ha			= 0;

	
	protected $Vvodae55zbyo				= array();

	
	protected $Voeljkkczisw				= array();

	
	protected $Vdrv04amtq1j		= False;

	
	protected $Vroeewsyjtac		= array();

	protected $Vgnybhzu3oax 		= 1;

	protected $Vgjqmxgvpfge	= 0;

	protected $Vdtyzm2tox2f			= 0;

	protected $Viatdugmijze			= 0;

	protected $Vhaisaop0fhr		= 0;

	protected $Vgwakdwibgyp			= 0;

	protected $Vdscxhz5tze1			= 0;

	protected $Vnqyu51xpob5					= 0;

	protected $Vinlbup22wxn				= 0;

	protected $Vinlbup22wxnSE				= 0;

	protected $Vgsgxsilnjyf			= 0;

	protected $VgsgxsilnjyfSE			= 0;

	protected $Vzpafy55wwtz				= 0;

	protected $Vmvfj12zqjgp				= 0;


	public function getError() {
		return $this->_error;
	}	


	public function getBestFitType() {
		return $this->_bestFitType;
	}	


	
	public function getValueOfYForX($Vju45ww5ejqq) {
		return False;
	}	


	
	public function getValueOfXForY($Vhet5eavxj4i) {
		return False;
	}	


	
	public function getXValues() {
		return $this->_xValues;
	}	


	
	public function getEquation($Vk1n2aer3e5w=0) {
		return False;
	}	


	
	public function getSlope($Vk1n2aer3e5w=0) {
		if ($Vk1n2aer3e5w != 0) {
			return round($this->_slope,$Vk1n2aer3e5w);
		}
		return $this->_slope;
	}	


	
	public function getSlopeSE($Vk1n2aer3e5w=0) {
		if ($Vk1n2aer3e5w != 0) {
			return round($this->_slopeSE,$Vk1n2aer3e5w);
		}
		return $this->_slopeSE;
	}	


	
	public function getIntersect($Vk1n2aer3e5w=0) {
		if ($Vk1n2aer3e5w != 0) {
			return round($this->_intersect,$Vk1n2aer3e5w);
		}
		return $this->_intersect;
	}	


	
	public function getIntersectSE($Vk1n2aer3e5w=0) {
		if ($Vk1n2aer3e5w != 0) {
			return round($this->_intersectSE,$Vk1n2aer3e5w);
		}
		return $this->_intersectSE;
	}	


	
	public function getGoodnessOfFit($Vk1n2aer3e5w=0) {
		if ($Vk1n2aer3e5w != 0) {
			return round($this->_goodnessOfFit,$Vk1n2aer3e5w);
		}
		return $this->_goodnessOfFit;
	}	


	public function getGoodnessOfFitPercent($Vk1n2aer3e5w=0) {
		if ($Vk1n2aer3e5w != 0) {
			return round($this->_goodnessOfFit * 100,$Vk1n2aer3e5w);
		}
		return $this->_goodnessOfFit * 100;
	}	


	
	public function getStdevOfResiduals($Vk1n2aer3e5w=0) {
		if ($Vk1n2aer3e5w != 0) {
			return round($this->_stdevOfResiduals,$Vk1n2aer3e5w);
		}
		return $this->_stdevOfResiduals;
	}	


	public function getSSRegression($Vk1n2aer3e5w=0) {
		if ($Vk1n2aer3e5w != 0) {
			return round($this->_SSRegression,$Vk1n2aer3e5w);
		}
		return $this->_SSRegression;
	}	


	public function getSSResiduals($Vk1n2aer3e5w=0) {
		if ($Vk1n2aer3e5w != 0) {
			return round($this->_SSResiduals,$Vk1n2aer3e5w);
		}
		return $this->_SSResiduals;
	}	


	public function getDFResiduals($Vk1n2aer3e5w=0) {
		if ($Vk1n2aer3e5w != 0) {
			return round($this->_DFResiduals,$Vk1n2aer3e5w);
		}
		return $this->_DFResiduals;
	}	


	public function getF($Vk1n2aer3e5w=0) {
		if ($Vk1n2aer3e5w != 0) {
			return round($this->_F,$Vk1n2aer3e5w);
		}
		return $this->_F;
	}	


	public function getCovariance($Vk1n2aer3e5w=0) {
		if ($Vk1n2aer3e5w != 0) {
			return round($this->_covariance,$Vk1n2aer3e5w);
		}
		return $this->_covariance;
	}	


	public function getCorrelation($Vk1n2aer3e5w=0) {
		if ($Vk1n2aer3e5w != 0) {
			return round($this->_correlation,$Vk1n2aer3e5w);
		}
		return $this->_correlation;
	}	


	public function getYBestFitValues() {
		return $this->_yBestFitValues;
	}	


	protected function _calculateGoodnessOfFit($V0d5fh4azpug,$Vzatutoxncya,$V0d5fh4azpug2,$Vzatutoxncya2,$V0d5fh4azpugY,$Vynom3mmrxba,$Vxesdo4x35yk, $Vegfwhesreey) {
		$Vycdwzxawpid = $Vbyn4vhgq4cb = $Vfp3nk2nzwo3 = $Viryclaweu3c = $Vxdakkwsivh5 = 0.0;
		foreach($this->_xValues as $Vgr31fd5ea3f => $Vju45ww5ejqq) {
			$Vnwen0kp1ltc = $this->_yBestFitValues[$Vgr31fd5ea3f] = $this->getValueOfYForX($Vju45ww5ejqq);

			$Vycdwzxawpid += ($this->_yValues[$Vgr31fd5ea3f] - $Vnwen0kp1ltc) * ($this->_yValues[$Vgr31fd5ea3f] - $Vnwen0kp1ltc);
			if ($Vegfwhesreey) {
				$Viryclaweu3c += ($this->_yValues[$Vgr31fd5ea3f] - $Vxesdo4x35yk) * ($this->_yValues[$Vgr31fd5ea3f] - $Vxesdo4x35yk);
			} else {
				$Viryclaweu3c += $this->_yValues[$Vgr31fd5ea3f] * $this->_yValues[$Vgr31fd5ea3f];
			}
			$Vbyn4vhgq4cb += ($this->_xValues[$Vgr31fd5ea3f] - $Vynom3mmrxba) * ($this->_yValues[$Vgr31fd5ea3f] - $Vxesdo4x35yk);
			if ($Vegfwhesreey) {
				$Vxdakkwsivh5 += ($this->_xValues[$Vgr31fd5ea3f] - $Vynom3mmrxba) * ($this->_xValues[$Vgr31fd5ea3f] - $Vynom3mmrxba);
			} else {
				$Vxdakkwsivh5 += $this->_xValues[$Vgr31fd5ea3f] * $this->_xValues[$Vgr31fd5ea3f];
			}
		}

		$this->_SSResiduals = $Vycdwzxawpid;
		$this->_DFResiduals = $this->_valueCount - 1 - $Vegfwhesreey;

		if ($this->_DFResiduals == 0.0) {
			$this->_stdevOfResiduals = 0.0;
		} else {
			$this->_stdevOfResiduals = sqrt($Vycdwzxawpid / $this->_DFResiduals);
		}
		if (($Viryclaweu3c == 0.0) || ($Vycdwzxawpid == $Viryclaweu3c)) {
			$this->_goodnessOfFit = 1;
		} else {
			$this->_goodnessOfFit = 1 - ($Vycdwzxawpid / $Viryclaweu3c);
		}

		$this->_SSRegression = $this->_goodnessOfFit * $Viryclaweu3c;
		$this->_covariance = $Vbyn4vhgq4cb / $this->_valueCount;
		$this->_correlation = ($this->_valueCount * $V0d5fh4azpugY - $V0d5fh4azpug * $Vzatutoxncya) / sqrt(($this->_valueCount * $V0d5fh4azpug2 - pow($V0d5fh4azpug,2)) * ($this->_valueCount * $Vzatutoxncya2 - pow($Vzatutoxncya,2)));
		$this->_slopeSE = $this->_stdevOfResiduals / sqrt($Vxdakkwsivh5);
		$this->_intersectSE = $this->_stdevOfResiduals * sqrt(1 / ($this->_valueCount - ($V0d5fh4azpug * $V0d5fh4azpug) / $V0d5fh4azpug2));
		if ($this->_SSResiduals != 0.0) {
			if ($this->_DFResiduals == 0.0) {
				$this->_F = 0.0;
			} else {
				$this->_F = $this->_SSRegression / ($this->_SSResiduals / $this->_DFResiduals);
			}
		} else {
			if ($this->_DFResiduals == 0.0) {
				$this->_F = 0.0;
			} else {
				$this->_F = $this->_SSRegression / $this->_DFResiduals;
			}
		}
	}	


	protected function _leastSquareFit($Vhet5eavxj4is, $Vju45ww5ejqqs, $Vegfwhesreey) {
		
		$Vku53cg4tiob = array_sum($Vju45ww5ejqqs);
		$Vuen20qmg3tf = array_sum($Vhet5eavxj4is);
		$Vynom3mmrxba = $Vku53cg4tiob / $this->_valueCount;
		$Vxesdo4x35yk = $Vuen20qmg3tf / $this->_valueCount;
		$Vlue5ngcw5ta = $Vurerwaofc1r = $Voxnau3xjdyo = $Vum54fjjktgg = $V0roclath5vs = 0.0;
		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->_valueCount; ++$Vfhiq1lhsoja) {
			$Vum54fjjktgg += $Vju45ww5ejqqs[$Vfhiq1lhsoja] * $Vhet5eavxj4is[$Vfhiq1lhsoja];
			$Voxnau3xjdyo += $Vju45ww5ejqqs[$Vfhiq1lhsoja] * $Vju45ww5ejqqs[$Vfhiq1lhsoja];
			$V0roclath5vs += $Vhet5eavxj4is[$Vfhiq1lhsoja] * $Vhet5eavxj4is[$Vfhiq1lhsoja];

			if ($Vegfwhesreey) {
				$Vlue5ngcw5ta += ($Vju45ww5ejqqs[$Vfhiq1lhsoja] - $Vynom3mmrxba) * ($Vhet5eavxj4is[$Vfhiq1lhsoja] - $Vxesdo4x35yk);
				$Vurerwaofc1r += ($Vju45ww5ejqqs[$Vfhiq1lhsoja] - $Vynom3mmrxba) * ($Vju45ww5ejqqs[$Vfhiq1lhsoja] - $Vynom3mmrxba);
			} else {
				$Vlue5ngcw5ta += $Vju45ww5ejqqs[$Vfhiq1lhsoja] * $Vhet5eavxj4is[$Vfhiq1lhsoja];
				$Vurerwaofc1r += $Vju45ww5ejqqs[$Vfhiq1lhsoja] * $Vju45ww5ejqqs[$Vfhiq1lhsoja];
			}
		}

		

		$this->_slope = $Vlue5ngcw5ta / $Vurerwaofc1r;

		

		if ($Vegfwhesreey) {
			$this->_intersect = $Vxesdo4x35yk - ($this->_slope * $Vynom3mmrxba);
		} else {
			$this->_intersect = 0;
		}

		$this->_calculateGoodnessOfFit($Vku53cg4tiob,$Vuen20qmg3tf,$Voxnau3xjdyo,$V0roclath5vs,$Vum54fjjktgg,$Vynom3mmrxba,$Vxesdo4x35yk,$Vegfwhesreey);
	}	


	
	function __construct($Vhet5eavxj4is, $Vju45ww5ejqqs=array(), $Vegfwhesreey=True) {
		
		$Vypihmh2qfpq = count($Vhet5eavxj4is);
		$Vbrtfkckdy5v = count($Vju45ww5ejqqs);

		
		if ($Vbrtfkckdy5v == 0) {
			$Vju45ww5ejqqs = range(1,$Vypihmh2qfpq);
			$Vbrtfkckdy5v = $Vypihmh2qfpq;
		} elseif ($Vypihmh2qfpq != $Vbrtfkckdy5v) {
			
			$this->_error = True;
			return False;
		}

		$this->_valueCount = $Vypihmh2qfpq;
		$this->_xValues = $Vju45ww5ejqqs;
		$this->_yValues = $Vhet5eavxj4is;
	}	

}	
