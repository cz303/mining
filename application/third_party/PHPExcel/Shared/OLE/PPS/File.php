<?php






















class PHPExcel_Shared_OLE_PPS_File extends PHPExcel_Shared_OLE_PPS
	{
	
	public function __construct($Vcvluzjs3wzb)
	{
		parent::__construct(
			null,
			$Vcvluzjs3wzb,
			PHPExcel_Shared_OLE::OLE_PPS_TYPE_FILE,
			null,
			null,
			null,
			null,
			null,
			'',
			array());
	}

	
	public function init()
	{
		return true;
	}

	
	public function append($Vou4vxorrdoe)
	{
		$this->_data .= $Vou4vxorrdoe;
	}

	
	public function getStream()
	{
		$this->ole->getStream($this);
	}
}
