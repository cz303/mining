<?php




class PHPExcel_Chart
{
	
	private $Vp2zlcj4wcuv = '';

	
	private $Vcsepalfuv1z = null;

	
	private $Vtnqistlfgjq = null;

	
	private $Vikrk3co4ki2 = null;

	
	private $Vfkdlcmzqlhr = null;

	
	private $V32laxm4yotw = null;

	
	private $Vmk1loqaqvbs = null;

	
	private $Vxdjkzjfmi14 = true;

	
	private $Vbhdxqkljmi1 = '0';

  
  private $V1o0tlgkkdxk = null;

  
  private $Vfo142ysnw11 = null;

  
  private $Vsoi1qrax5lj = null;

  
  private $Vwm3gwelnhpq = null;

	
	private $Vijd0ltpg30c = 'A1';


	
	private $Vnyx5cgboiys = 0;


	
	private $V0xcifcgx3zt = 0;


	
	private $Vbv4sfmd0rks = 'A1';


	
	private $Vcejysxvekdt = 10;


	
	private $Vkbl0sfbbjvr = 10;


	
	public function __construct($Vcvluzjs3wzb, PHPExcel_Chart_Title $Vzeg1rojkgqq = null, PHPExcel_Chart_Legend $Vd0gscz21nhy = null, PHPExcel_Chart_PlotArea $Vpiwhkjwfrqq = null, $V2e0lpoeljxr = true, $V00eli5w1y4d = '0', PHPExcel_Chart_Title $V0h355jcamat = null, PHPExcel_Chart_Title $Vvuiaeplqlp1 = null, PHPExcel_Chart_Axis $V5g30dzpdfzz = null, PHPExcel_Chart_Axis $Vvhggdajc12m = null, PHPExcel_Chart_GridLines $Vq0zudmruixk = null, PHPExcel_Chart_GridLines $Vjhvlsci4mq3 = null)
	{
		$this->_name = $Vcvluzjs3wzb;
		$this->_title = $Vzeg1rojkgqq;
		$this->_legend = $Vd0gscz21nhy;
		$this->_xAxisLabel = $V0h355jcamat;
		$this->_yAxisLabel = $Vvuiaeplqlp1;
		$this->_plotArea = $Vpiwhkjwfrqq;
		$this->_plotVisibleOnly = $V2e0lpoeljxr;
		$this->_displayBlanksAs = $V00eli5w1y4d;
		$this->_xAxis = $V5g30dzpdfzz;
		$this->_yAxis = $Vvhggdajc12m;
    $this->_majorGridlines = $Vq0zudmruixk;
    $this->_minorGridlines = $Vjhvlsci4mq3;
	}

	
	public function getName() {
		return $this->_name;
	}

	
	public function getWorksheet() {
		return $this->_worksheet;
	}

	
	public function setWorksheet(PHPExcel_Worksheet $Vqujkwol1zut = null) {
		$this->_worksheet = $Vqujkwol1zut;

		return $this;
	}

	
	public function getTitle() {
		return $this->_title;
	}

	
	public function setTitle(PHPExcel_Chart_Title $Vzeg1rojkgqq) {
		$this->_title = $Vzeg1rojkgqq;

		return $this;
	}

	
	public function getLegend() {
		return $this->_legend;
	}

	
	public function setLegend(PHPExcel_Chart_Legend $Vd0gscz21nhy) {
		$this->_legend = $Vd0gscz21nhy;

		return $this;
	}

	
	public function getXAxisLabel() {
		return $this->_xAxisLabel;
	}

	
	public function setXAxisLabel(PHPExcel_Chart_Title $Vq04bwg4ulks) {
		$this->_xAxisLabel = $Vq04bwg4ulks;

		return $this;
	}

	
	public function getYAxisLabel() {
		return $this->_yAxisLabel;
	}

	
	public function setYAxisLabel(PHPExcel_Chart_Title $Vq04bwg4ulks) {
		$this->_yAxisLabel = $Vq04bwg4ulks;

		return $this;
	}

	
	public function getPlotArea() {
		return $this->_plotArea;
	}

	
	public function getPlotVisibleOnly() {
		return $this->_plotVisibleOnly;
	}

	
	public function setPlotVisibleOnly($V2e0lpoeljxr = true) {
		$this->_plotVisibleOnly = $V2e0lpoeljxr;

		return $this;
	}

	
	public function getDisplayBlanksAs() {
		return $this->_displayBlanksAs;
	}

	
	public function setDisplayBlanksAs($V00eli5w1y4d = '0') {
		$this->_displayBlanksAs = $V00eli5w1y4d;
	}


  
  public function getChartAxisY() {
    if($this->_yAxis !== NULL){
      return $this->_yAxis;
    }

    return new PHPExcel_Chart_Axis();
  }

  
  public function getChartAxisX() {
    if($this->_xAxis !== NULL){
      return $this->_xAxis;
    }

    return new PHPExcel_Chart_Axis();
  }

  
  public function getMajorGridlines() {
    if($this->_majorGridlines !== NULL){
      return $this->_majorGridlines;
    }

    return new PHPExcel_Chart_GridLines();
  }

  
  public function getMinorGridlines() {
    if($this->_minorGridlines !== NULL){
      return $this->_minorGridlines;
    }

    return new PHPExcel_Chart_GridLines();
  }


	
	public function setTopLeftPosition($Vblc1ueqvbti, $Vb4s1vpytbz5=null, $Vj0wypwdg4l4=null) {
		$this->_topLeftCellRef = $Vblc1ueqvbti;
		if (!is_null($Vb4s1vpytbz5))
			$this->setTopLeftXOffset($Vb4s1vpytbz5);
		if (!is_null($Vj0wypwdg4l4))
			$this->setTopLeftYOffset($Vj0wypwdg4l4);

		return $this;
	}

	
	public function getTopLeftPosition() {
		return array( 'cell'	=> $this->_topLeftCellRef,
					  'xOffset'	=> $this->_topLeftXOffset,
					  'yOffset'	=> $this->_topLeftYOffset
					);
	}

	
	public function getTopLeftCell() {
		return $this->_topLeftCellRef;
	}

	
	public function setTopLeftCell($Vblc1ueqvbti) {
		$this->_topLeftCellRef = $Vblc1ueqvbti;

		return $this;
	}

	
	public function setTopLeftOffset($Vb4s1vpytbz5=null,$Vj0wypwdg4l4=null) {
		if (!is_null($Vb4s1vpytbz5))
			$this->setTopLeftXOffset($Vb4s1vpytbz5);
		if (!is_null($Vj0wypwdg4l4))
			$this->setTopLeftYOffset($Vj0wypwdg4l4);

		return $this;
	}

	
	public function getTopLeftOffset() {
		return array( 'X' => $this->_topLeftXOffset,
					  'Y' => $this->_topLeftYOffset
					);
	}

	public function setTopLeftXOffset($Vb4s1vpytbz5) {
		$this->_topLeftXOffset = $Vb4s1vpytbz5;

		return $this;
	}

	public function getTopLeftXOffset() {
		return $this->_topLeftXOffset;
	}

	public function setTopLeftYOffset($Vj0wypwdg4l4) {
		$this->_topLeftYOffset = $Vj0wypwdg4l4;

		return $this;
	}

	public function getTopLeftYOffset() {
		return $this->_topLeftYOffset;
	}

	
	public function setBottomRightPosition($Vblc1ueqvbti, $Vb4s1vpytbz5=null, $Vj0wypwdg4l4=null) {
		$this->_bottomRightCellRef = $Vblc1ueqvbti;
		if (!is_null($Vb4s1vpytbz5))
			$this->setBottomRightXOffset($Vb4s1vpytbz5);
		if (!is_null($Vj0wypwdg4l4))
			$this->setBottomRightYOffset($Vj0wypwdg4l4);

		return $this;
	}

	
	public function getBottomRightPosition() {
		return array( 'cell'	=> $this->_bottomRightCellRef,
					  'xOffset'	=> $this->_bottomRightXOffset,
					  'yOffset'	=> $this->_bottomRightYOffset
					);
	}

	public function setBottomRightCell($Vblc1ueqvbti) {
		$this->_bottomRightCellRef = $Vblc1ueqvbti;

		return $this;
	}

	
	public function getBottomRightCell() {
		return $this->_bottomRightCellRef;
	}

	
	public function setBottomRightOffset($Vb4s1vpytbz5=null,$Vj0wypwdg4l4=null) {
		if (!is_null($Vb4s1vpytbz5))
			$this->setBottomRightXOffset($Vb4s1vpytbz5);
		if (!is_null($Vj0wypwdg4l4))
			$this->setBottomRightYOffset($Vj0wypwdg4l4);

		return $this;
	}

	
	public function getBottomRightOffset() {
		return array( 'X' => $this->_bottomRightXOffset,
					  'Y' => $this->_bottomRightYOffset
					);
	}

	public function setBottomRightXOffset($Vb4s1vpytbz5) {
		$this->_bottomRightXOffset = $Vb4s1vpytbz5;

		return $this;
	}

	public function getBottomRightXOffset() {
		return $this->_bottomRightXOffset;
	}

	public function setBottomRightYOffset($Vj0wypwdg4l4) {
		$this->_bottomRightYOffset = $Vj0wypwdg4l4;

		return $this;
	}

	public function getBottomRightYOffset() {
		return $this->_bottomRightYOffset;
	}


	public function refresh() {
		if ($this->_worksheet !== NULL) {
			$this->_plotArea->refresh($this->_worksheet);
		}
	}

	public function render($V3uaawfi530c = null) {
		$V5puud31eo1w = PHPExcel_Settings::getChartRendererName();
		if (is_null($V5puud31eo1w)) {
			return false;
		}
		
		$this->refresh();

		$Vi342ugfvhqy = PHPExcel_Settings::getChartRendererPath();
		$Vkjczu3r45wi = str_replace('\\','/',get_include_path());
		$Vhpwduigl0c4 = str_replace('\\','/',$Vi342ugfvhqy);
		if (strpos($Vhpwduigl0c4,$Vkjczu3r45wi) === false) {
			set_include_path(get_include_path() . PATH_SEPARATOR . $Vi342ugfvhqy);
		}

		$Vhgf0asmrdu1 = 'PHPExcel_Chart_Renderer_'.$V5puud31eo1w;
		$Vjlhfy2geuaq = new $Vhgf0asmrdu1($this);

		if ($V3uaawfi530c == 'php://output') {
			$V3uaawfi530c = null;
		}
		return $Vjlhfy2geuaq->render($V3uaawfi530c);
	}

}
