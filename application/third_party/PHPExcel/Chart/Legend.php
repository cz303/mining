<?php




class PHPExcel_Chart_Legend
{
	
	const xlLegendPositionBottom	= -4107;	
	const xlLegendPositionCorner	= 2;		
	const xlLegendPositionCustom	= -4161;	
	const xlLegendPositionLeft		= -4131;	
	const xlLegendPositionRight		= -4152;	
	const xlLegendPositionTop		= -4160;	

	const POSITION_RIGHT	= 'r';
	const POSITION_LEFT		= 'l';
	const POSITION_BOTTOM	= 'b';
	const POSITION_TOP		= 't';
	const POSITION_TOPRIGHT	= 'tr';

	private static $Ve04211qnk43 = array( self::xlLegendPositionBottom	=> self::POSITION_BOTTOM,
											self::xlLegendPositionCorner	=> self::POSITION_TOPRIGHT,
											self::xlLegendPositionCustom	=> '??',
											self::xlLegendPositionLeft		=> self::POSITION_LEFT,
											self::xlLegendPositionRight		=> self::POSITION_RIGHT,
											self::xlLegendPositionTop		=> self::POSITION_TOP
										  );

	
	private $Vqvgj4sslcm2 = self::POSITION_RIGHT;

	
	private $V12ptj4guhxj = TRUE;

	
	private $V0ol5mrwz5fq = NULL;


	
	public function __construct($Vey0js2ss2mo = self::POSITION_RIGHT, PHPExcel_Chart_Layout $Vhkndayeetih = NULL, $Vwhgobntpmzm = FALSE)
	{
		$this->setPosition($Vey0js2ss2mo);
		$this->_layout = $Vhkndayeetih;
		$this->setOverlay($Vwhgobntpmzm);
	}

	
	public function getPosition() {
		return $this->_position;
	}

	
	public function setPosition($Vey0js2ss2mo = self::POSITION_RIGHT) {
		if (!in_array($Vey0js2ss2mo,self::$Ve04211qnk43)) {
			return false;
		}

		$this->_position = $Vey0js2ss2mo;
		return true;
	}

	
	public function getPositionXL() {
		return array_search($this->_position,self::$Ve04211qnk43);
	}

	
	public function setPositionXL($Vey0js2ss2moXL = self::xlLegendPositionRight) {
		if (!array_key_exists($Vey0js2ss2moXL,self::$Ve04211qnk43)) {
			return false;
		}

		$this->_position = self::$Ve04211qnk43[$Vey0js2ss2moXL];
		return true;
	}

	
	public function getOverlay() {
		return $this->_overlay;
	}

	
	public function setOverlay($Vwhgobntpmzm = FALSE) {
		if (!is_bool($Vwhgobntpmzm)) {
			return false;
		}

		$this->_overlay = $Vwhgobntpmzm;
		return true;
	}

	
	public function getLayout() {
		return $this->_layout;
	}

}
