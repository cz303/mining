<?php



require_once PHPEXCEL_ROOT . 'PHPExcel/Shared/trend/bestFitClass.php';
require_once PHPEXCEL_ROOT . 'PHPExcel/Shared/JAMA/Matrix.php';



class PHPExcel_Polynomial_Best_Fit extends PHPExcel_Best_Fit
{
	
	protected $Vspksib4nuta		= 'polynomial';

	
	protected $V4flnmzwiq1i			= 0;


	
	public function getOrder() {
		return $this->_order;
	}	


	
	public function getValueOfYForX($Vju45ww5ejqq) {
		$Vrz0rq2pgagr = $this->getIntersect();
		$Vvhozyjblnuk = $this->getSlope();
		foreach($Vvhozyjblnuk as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			if ($Vp4xjtpabm0l != 0.0) {
				$Vrz0rq2pgagr += $Vp4xjtpabm0l * pow($Vju45ww5ejqq, $Vseq1edikdvg + 1);
			}
		}
		return $Vrz0rq2pgagr;
	}	


	
	public function getValueOfXForY($Vhet5eavxj4i) {
		return ($Vhet5eavxj4i - $this->getIntersect()) / $this->getSlope();
	}	


	
	public function getEquation($Vk1n2aer3e5w=0) {
		$Vvhozyjblnuk = $this->getSlope($Vk1n2aer3e5w);
		$Vz15w1gacqtd = $this->getIntersect($Vk1n2aer3e5w);

		$Vzfb25xkbnoc = 'Y = '.$Vz15w1gacqtd;
		foreach($Vvhozyjblnuk as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			if ($Vp4xjtpabm0l != 0.0) {
				$Vzfb25xkbnoc .= ' + '.$Vp4xjtpabm0l.' * X';
				if ($Vseq1edikdvg > 0) {
					$Vzfb25xkbnoc .= '^'.($Vseq1edikdvg + 1);
				}
			}
		}
		return $Vzfb25xkbnoc;
	}	


	
	public function getSlope($Vk1n2aer3e5w=0) {
		if ($Vk1n2aer3e5w != 0) {
			$V4zpayf5xvb1 = array();
			foreach($this->_slope as $Vombkwlhjq42) {
				$V4zpayf5xvb1[] = round($Vombkwlhjq42,$Vk1n2aer3e5w);
			}
			return $V4zpayf5xvb1;
		}
		return $this->_slope;
	}	


	public function getCoefficients($Vk1n2aer3e5w=0) {
		return array_merge(array($this->getIntersect($Vk1n2aer3e5w)),$this->getSlope($Vk1n2aer3e5w));
	}	


	
	private function _polynomial_regression($Vkmq2xsnwdk5, $Vhet5eavxj4is, $Vju45ww5ejqqs, $Vegfwhesreey) {
		
		$Vku53cg4tiob = array_sum($Vju45ww5ejqqs);
		$Vuen20qmg3tf = array_sum($Vhet5eavxj4is);
		$Voxnau3xjdyo = $Vum54fjjktgg = 0;
		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->_valueCount; ++$Vfhiq1lhsoja) {
			$Vum54fjjktgg += $Vju45ww5ejqqs[$Vfhiq1lhsoja] * $Vhet5eavxj4is[$Vfhiq1lhsoja];
			$Voxnau3xjdyo += $Vju45ww5ejqqs[$Vfhiq1lhsoja] * $Vju45ww5ejqqs[$Vfhiq1lhsoja];
			$V0roclath5vs += $Vhet5eavxj4is[$Vfhiq1lhsoja] * $Vhet5eavxj4is[$Vfhiq1lhsoja];
		}
		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->_valueCount; ++$Vfhiq1lhsoja) {
			for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw <= $Vkmq2xsnwdk5; ++$Vzmnqyqjjodw) {
				$Vk0c33a31nhe[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = pow($Vju45ww5ejqqs[$Vfhiq1lhsoja], $Vzmnqyqjjodw);
			}
		}
		for ($Vfhiq1lhsoja=0; $Vfhiq1lhsoja < $this->_valueCount; ++$Vfhiq1lhsoja) {
			$Vjd52v1uhh5z[$Vfhiq1lhsoja] = array($Vhet5eavxj4is[$Vfhiq1lhsoja]);
		}
		$Vik1d3lo41v3 = new Matrix($Vk0c33a31nhe);
		$Vov04x3achnh = new Matrix($Vjd52v1uhh5z);
		$Vhsnkwwx3zv4 = $Vik1d3lo41v3->solve($Vov04x3achnh);

		$V4zpayf5xvb1 = array();
		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vhsnkwwx3zv4->m; ++$Vfhiq1lhsoja) {
			$Vws44nszhvgo = $Vhsnkwwx3zv4->get($Vfhiq1lhsoja, 0);
			if (abs($Vws44nszhvgo) <= pow(10, -9)) {
				$Vws44nszhvgo = 0;
			}
			$V4zpayf5xvb1[] = $Vws44nszhvgo;
		}

		$this->_intersect = array_shift($V4zpayf5xvb1);
		$this->_slope = $V4zpayf5xvb1;

		$this->_calculateGoodnessOfFit($Vku53cg4tiob,$Vuen20qmg3tf,$Voxnau3xjdyo,$V0roclath5vs,$Vum54fjjktgg);
		foreach($this->_xValues as $Vgr31fd5ea3f => $Vju45ww5ejqq) {
			$this->_yBestFitValues[$Vgr31fd5ea3f] = $this->getValueOfYForX($Vju45ww5ejqq);
		}
	}	


	
	function __construct($Vkmq2xsnwdk5, $Vhet5eavxj4is, $Vju45ww5ejqqs=array(), $Vegfwhesreey=True) {
		if (parent::__construct($Vhet5eavxj4is, $Vju45ww5ejqqs) !== False) {
			if ($Vkmq2xsnwdk5 < $this->_valueCount) {
				$this->_bestFitType .= '_'.$Vkmq2xsnwdk5;
				$this->_order = $Vkmq2xsnwdk5;
				$this->_polynomial_regression($Vkmq2xsnwdk5, $Vhet5eavxj4is, $Vju45ww5ejqqs, $Vegfwhesreey);
				if (($this->getGoodnessOfFit() < 0.0) || ($this->getGoodnessOfFit() > 1.0)) {
					$this->_error = True;
				}
			} else {
				$this->_error = True;
			}
		}
	}	

}	