<?php




class PHPExcel_RichText_Run extends PHPExcel_RichText_TextElement implements PHPExcel_RichText_ITextElement
{
	
	private $Vjilv0hwv0xf;

    
    public function __construct($Vs2zor54xiqr = '')
    {
    	
    	$this->setText($Vs2zor54xiqr);
    	$this->_font = new PHPExcel_Style_Font();
    }

	
	public function getFont() {
		return $this->_font;
	}

	
	public function setFont(PHPExcel_Style_Font $Vrknu0wrcctk = null) {
		$this->_font = $Vrknu0wrcctk;
		return $this;
	}

	
	public function getHashCode() {
    	return md5(
    		  $this->getText()
    		. $this->_font->getHashCode()
    		. __CLASS__
    	);
    }

	
	public function __clone() {
		$Vtf0r1rll31w = get_object_vars($this);
		foreach ($Vtf0r1rll31w as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			if (is_object($Vp4xjtpabm0l)) {
				$this->$Vseq1edikdvg = clone $Vp4xjtpabm0l;
			} else {
				$this->$Vseq1edikdvg = $Vp4xjtpabm0l;
			}
		}
	}
}
