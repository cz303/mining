<?php




class PHPExcel_Chart_PlotArea
{
	
	private $V0ol5mrwz5fq = null;

	
	private $Vmc13tm14pdt = array();

	
	public function __construct(PHPExcel_Chart_Layout $Vhkndayeetih = null, $Vcg1rs5z3tzi = array())
	{
		$this->_layout = $Vhkndayeetih;
		$this->_plotSeries = $Vcg1rs5z3tzi;
	}

	
	public function getLayout() {
		return $this->_layout;
	}

	
	public function getPlotGroupCount() {
		return count($this->_plotSeries);
	}

	
	public function getPlotSeriesCount() {
		$Vbnpd5xlilug = 0;
		foreach($this->_plotSeries as $Vue5vvbtpfxb) {
			$Vbnpd5xlilug += $Vue5vvbtpfxb->getPlotSeriesCount();
		}
		return $Vbnpd5xlilug;
	}

	
	public function getPlotGroup() {
		return $this->_plotSeries;
	}

	
	public function getPlotGroupByIndex($Vx5qfylfb01c) {
		return $this->_plotSeries[$Vx5qfylfb01c];
	}

	
	public function setPlotSeries($Vcg1rs5z3tzi = array()) {
		$this->_plotSeries = $Vcg1rs5z3tzi;
        
        return $this;
	}

	public function refresh(PHPExcel_Worksheet $V4jvbeui0jzb) {
	    foreach($this->_plotSeries as $Vcg1rs5z3tzi) {
			$Vcg1rs5z3tzi->refresh($V4jvbeui0jzb);
		}
	}

}
