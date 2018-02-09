<?php



require_once(PHPEXCEL_ROOT . 'PHPExcel/Shared/trend/bestFitClass.php');



class PHPExcel_Linear_Best_Fit extends PHPExcel_Best_Fit
{
	
	protected $Vspksib4nuta		= 'linear';


	
	public function getValueOfYForX($Vju45ww5ejqq) {
		return $this->getIntersect() + $this->getSlope() * $Vju45ww5ejqq;
	}	


	
	public function getValueOfXForY($Vhet5eavxj4i) {
		return ($Vhet5eavxj4i - $this->getIntersect()) / $this->getSlope();
	}	


	
	public function getEquation($Vk1n2aer3e5w=0) {
		$Vvhozyjblnuk = $this->getSlope($Vk1n2aer3e5w);
		$Vz15w1gacqtd = $this->getIntersect($Vk1n2aer3e5w);

		return 'Y = '.$Vz15w1gacqtd.' + '.$Vvhozyjblnuk.' * X';
	}	


	
	private function _linear_regression($Vhet5eavxj4is, $Vju45ww5ejqqs, $Vegfwhesreey) {
		$this->_leastSquareFit($Vhet5eavxj4is, $Vju45ww5ejqqs,$Vegfwhesreey);
	}	


	
	function __construct($Vhet5eavxj4is, $Vju45ww5ejqqs=array(), $Vegfwhesreey=True) {
		if (parent::__construct($Vhet5eavxj4is, $Vju45ww5ejqqs) !== False) {
			$this->_linear_regression($Vhet5eavxj4is, $Vju45ww5ejqqs, $Vegfwhesreey);
		}
	}	

}	