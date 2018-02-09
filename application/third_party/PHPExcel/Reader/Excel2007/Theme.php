<?php




class PHPExcel_Reader_Excel2007_Theme
{
	
	private $Vzyvuhw5oz1p;

	
	private $Vbaavil5yt0m;

	
	private $Vkwaqqcrepu2;


	
	private $Vjchmssb5aka;


    
    public function __construct($Vgb4nzzhtakg,$Vhfh1bcomssw,$Vxdrtvyxuu2p)
    {
		
    	$this->_themeName			= $Vgb4nzzhtakg;
		$this->_colourSchemeName	= $Vhfh1bcomssw;
		$this->_colourMap			= $Vxdrtvyxuu2p;
    }

	
	public function getThemeName()
	{
		return $this->_themeName;
	}

    
    public function getColourSchemeName() {
		return $this->_colourSchemeName;
    }

    
    public function getColourByIndex($Vx5qfylfb01c=0) {
    	if (isset($this->_colourMap[$Vx5qfylfb01c])) {
			return $this->_colourMap[$Vx5qfylfb01c];
		}
		return null;
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
