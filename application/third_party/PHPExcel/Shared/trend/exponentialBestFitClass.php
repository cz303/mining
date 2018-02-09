<?php



require_once(PHPEXCEL_ROOT . 'PHPExcel/Shared/trend/bestFitClass.php');



class PHPExcel_Exponential_Best_Fit extends PHPExcel_Best_Fit
{
	
	protected $Vspksib4nuta		= 'exponential';


	
	public function getValueOfYForX($Vju45ww5ejqq) {
		return $this->getIntersect() * pow($this->getSlope(),($Vju45ww5ejqq - $this->_Xoffset));
	}	


	
	public function getValueOfXForY($Vhet5eavxj4i) {
		return log(($Vhet5eavxj4i + $this->_Yoffset) / $this->getIntersect()) / log($this->getSlope());
	}	


	
	public function getEquation($Vk1n2aer3e5w=0) {
		$Vvhozyjblnuk = $this->getSlope($Vk1n2aer3e5w);
		$Vz15w1gacqtd = $this->getIntersect($Vk1n2aer3e5w);

		return 'Y = '.$Vz15w1gacqtd.' * '.$Vvhozyjblnuk.'^X';
	}	


	
	public function getSlope($Vk1n2aer3e5w=0) {
		if ($Vk1n2aer3e5w != 0) {
			return round(exp($this->_slope),$Vk1n2aer3e5w);
		}
		return exp($this->_slope);
	}	


	
	public function getIntersect($Vk1n2aer3e5w=0) {
		if ($Vk1n2aer3e5w != 0) {
			return round(exp($this->_intersect),$Vk1n2aer3e5w);
		}
		return exp($this->_intersect);
	}	


	
	private function _exponential_regression($Vhet5eavxj4is, $Vju45ww5ejqqs, $Vegfwhesreey) {
		foreach($Vhet5eavxj4is as &$Vp4xjtpabm0l) {
			if ($Vp4xjtpabm0l < 0.0) {
				$Vp4xjtpabm0l = 0 - log(abs($Vp4xjtpabm0l));
			} elseif ($Vp4xjtpabm0l > 0.0) {
				$Vp4xjtpabm0l = log($Vp4xjtpabm0l);
			}
		}
		unset($Vp4xjtpabm0l);

		$this->_leastSquareFit($Vhet5eavxj4is, $Vju45ww5ejqqs, $Vegfwhesreey);
	}	


	
	function __construct($Vhet5eavxj4is, $Vju45ww5ejqqs=array(), $Vegfwhesreey=True) {
		if (parent::__construct($Vhet5eavxj4is, $Vju45ww5ejqqs) !== False) {
			$this->_exponential_regression($Vhet5eavxj4is, $Vju45ww5ejqqs, $Vegfwhesreey);
		}
	}	

}	