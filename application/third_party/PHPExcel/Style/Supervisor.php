<?php




abstract class PHPExcel_Style_Supervisor
{
	
	protected $Vmbe5qc2asai;

	
	protected $Vq20emrsdn3q;

	
	public function __construct($Vk1afaiczap4 = FALSE)
	{
		
		$this->_isSupervisor = $Vk1afaiczap4;
	}

	
	public function bindParent($V3jkqexf4nr0, $V3jkqexf4nr0PropertyName=NULL)
	{
		$this->_parent = $V3jkqexf4nr0;
		return $this;
	}

	
	public function getIsSupervisor()
	{
		return $this->_isSupervisor;
	}

	
	public function getActiveSheet()
	{
		return $this->_parent->getActiveSheet();
	}

	
	public function getSelectedCells()
	{
		return $this->getActiveSheet()->getSelectedCells();
	}

	
	public function getActiveCell()
	{
		return $this->getActiveSheet()->getActiveCell();
	}

	
	public function __clone() {
		$Vtf0r1rll31w = get_object_vars($this);
		foreach ($Vtf0r1rll31w as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			if ((is_object($Vp4xjtpabm0l)) && ($Vseq1edikdvg != '_parent')) {
				$this->$Vseq1edikdvg = clone $Vp4xjtpabm0l;
			} else {
				$this->$Vseq1edikdvg = $Vp4xjtpabm0l;
			}
		}
	}
}
