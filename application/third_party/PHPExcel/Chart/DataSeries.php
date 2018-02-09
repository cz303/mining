<?php




class PHPExcel_Chart_DataSeries
{

	const TYPE_BARCHART			= 'barChart';
	const TYPE_BARCHART_3D		= 'bar3DChart';
	const TYPE_LINECHART		= 'lineChart';
	const TYPE_LINECHART_3D		= 'line3DChart';
	const TYPE_AREACHART		= 'areaChart';
	const TYPE_AREACHART_3D		= 'area3DChart';
	const TYPE_PIECHART			= 'pieChart';
	const TYPE_PIECHART_3D		= 'pie3DChart';
	const TYPE_DOUGHTNUTCHART	= 'doughnutChart';
	const TYPE_DONUTCHART		= self::TYPE_DOUGHTNUTCHART;	
	const TYPE_SCATTERCHART		= 'scatterChart';
	const TYPE_SURFACECHART		= 'surfaceChart';
	const TYPE_SURFACECHART_3D	= 'surface3DChart';
	const TYPE_RADARCHART		= 'radarChart';
	const TYPE_BUBBLECHART		= 'bubbleChart';
	const TYPE_STOCKCHART		= 'stockChart';
	const TYPE_CANDLECHART		= self::TYPE_STOCKCHART;	   

	const GROUPING_CLUSTERED			= 'clustered';
	const GROUPING_STACKED				= 'stacked';
	const GROUPING_PERCENT_STACKED		= 'percentStacked';
	const GROUPING_STANDARD				= 'standard';

	const DIRECTION_BAR			= 'bar';
	const DIRECTION_HORIZONTAL	= self::DIRECTION_BAR;
	const DIRECTION_COL			= 'col';
	const DIRECTION_COLUMN		= self::DIRECTION_COL;
	const DIRECTION_VERTICAL	= self::DIRECTION_COL;

	const STYLE_LINEMARKER		= 'lineMarker';
	const STYLE_SMOOTHMARKER	= 'smoothMarker';
	const STYLE_MARKER			= 'marker';
	const STYLE_FILLED			= 'filled';


	
	private $Vbhgdmmikfqk = null;

	
	private $Vv5alvqmlbps = null;

	
	private $Vhthx0wdq32v = null;

	
	private $Vhiv4ochmihp = null;

	
	private $Vxfyvhvok0dl = array();

	
	private $Vuqpn1dtuabl = array();

	
	private $V1roi511dtch = array();

	
	private $Vyvveutgq0ky = null;

	
	private $Vmfjy5kqdgh0 = array();

	
	public function __construct($V55l4xfemmlg = null, $Vx015dycddeq = null, $V4dpmvzwuayz = array(), $Vlke00o21dgf = array(), $Vcgltg0zyy4e = array(), $Vykv51ugeug1 = array(), $V51qeuhzwzo4 = null, $Vi5fmkehmxfe = null)
	{
		$this->_plotType = $V55l4xfemmlg;
		$this->_plotGrouping = $Vx015dycddeq;
		$this->_plotOrder = $V4dpmvzwuayz;
		$Vqvryofqinbe = array_keys($Vykv51ugeug1);
		$this->_plotValues = $Vykv51ugeug1;
		if ((count($Vlke00o21dgf) == 0) || (is_null($Vlke00o21dgf[$Vqvryofqinbe[0]]))) {
			$Vlke00o21dgf[$Vqvryofqinbe[0]] = new PHPExcel_Chart_DataSeriesValues();
		}

		$this->_plotLabel = $Vlke00o21dgf;
		if ((count($Vcgltg0zyy4e) == 0) || (is_null($Vcgltg0zyy4e[$Vqvryofqinbe[0]]))) {
			$Vcgltg0zyy4e[$Vqvryofqinbe[0]] = new PHPExcel_Chart_DataSeriesValues();
		}
		$this->_plotCategory = $Vcgltg0zyy4e;
		$this->_smoothLine = $V51qeuhzwzo4;
		$this->_plotStyle = $Vi5fmkehmxfe;
	}

	
	public function getPlotType() {
		return $this->_plotType;
	}

	
	public function setPlotType($V55l4xfemmlg = '') {
		$this->_plotType = $V55l4xfemmlg;
        return $this;
	}

	
	public function getPlotGrouping() {
		return $this->_plotGrouping;
	}

	
	public function setPlotGrouping($V2a3rnjwsolt = null) {
		$this->_plotGrouping = $V2a3rnjwsolt;
        return $this;
	}

	
	public function getPlotDirection() {
		return $this->_plotDirection;
	}

	
	public function setPlotDirection($Vxuihsnmrlzy = null) {
		$this->_plotDirection = $Vxuihsnmrlzy;
        return $this;
	}

	
	public function getPlotOrder() {
		return $this->_plotOrder;
	}

	
	public function getPlotLabels() {
		return $this->_plotLabel;
	}

	
	public function getPlotLabelByIndex($Vx5qfylfb01c) {
		$Vqvryofqinbe = array_keys($this->_plotLabel);
		if (in_array($Vx5qfylfb01c,$Vqvryofqinbe)) {
			return $this->_plotLabel[$Vx5qfylfb01c];
		} elseif(isset($Vqvryofqinbe[$Vx5qfylfb01c])) {
			return $this->_plotLabel[$Vqvryofqinbe[$Vx5qfylfb01c]];
		}
		return false;
	}

	
	public function getPlotCategories() {
		return $this->_plotCategory;
	}

	
	public function getPlotCategoryByIndex($Vx5qfylfb01c) {
		$Vqvryofqinbe = array_keys($this->_plotCategory);
		if (in_array($Vx5qfylfb01c,$Vqvryofqinbe)) {
			return $this->_plotCategory[$Vx5qfylfb01c];
		} elseif(isset($Vqvryofqinbe[$Vx5qfylfb01c])) {
			return $this->_plotCategory[$Vqvryofqinbe[$Vx5qfylfb01c]];
		}
		return false;
	}

	
	public function getPlotStyle() {
		return $this->_plotStyle;
	}

	
	public function setPlotStyle($Vi5fmkehmxfe = null) {
		$this->_plotStyle = $Vi5fmkehmxfe;
        return $this;
	}

	
	public function getPlotValues() {
		return $this->_plotValues;
	}

	
	public function getPlotValuesByIndex($Vx5qfylfb01c) {
		$Vqvryofqinbe = array_keys($this->_plotValues);
		if (in_array($Vx5qfylfb01c,$Vqvryofqinbe)) {
			return $this->_plotValues[$Vx5qfylfb01c];
		} elseif(isset($Vqvryofqinbe[$Vx5qfylfb01c])) {
			return $this->_plotValues[$Vqvryofqinbe[$Vx5qfylfb01c]];
		}
		return false;
	}

	
	public function getPlotSeriesCount() {
		return count($this->_plotValues);
	}

	
	public function getSmoothLine() {
		return $this->_smoothLine;
	}

	
	public function setSmoothLine($V51qeuhzwzo4 = TRUE) {
		$this->_smoothLine = $V51qeuhzwzo4;
        return $this;
	}

	public function refresh(PHPExcel_Worksheet $V4jvbeui0jzb) {
	    foreach($this->_plotValues as $Vykv51ugeug1) {
			if ($Vykv51ugeug1 !== NULL)
				$Vykv51ugeug1->refresh($V4jvbeui0jzb, TRUE);
		}
		foreach($this->_plotLabel as $Vykv51ugeug1) {
			if ($Vykv51ugeug1 !== NULL)
				$Vykv51ugeug1->refresh($V4jvbeui0jzb, TRUE);
		}
		foreach($this->_plotCategory as $Vykv51ugeug1) {
			if ($Vykv51ugeug1 !== NULL)
				$Vykv51ugeug1->refresh($V4jvbeui0jzb, FALSE);
		}
	}

}
