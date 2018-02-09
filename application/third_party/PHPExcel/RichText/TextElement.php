<?php




class PHPExcel_RichText_TextElement implements PHPExcel_RichText_ITextElement
{
	
	private $Vkbhl4g2thyo;

    
    public function __construct($Vs2zor54xiqr = '')
    {
    	
    	$this->_text = $Vs2zor54xiqr;
    }

	
	public function getText() {
		return $this->_text;
	}

	
	public function setText($Vs2zor54xiqr = '') {
		$this->_text = $Vs2zor54xiqr;
		return $this;
	}

	
	public function getFont() {
		return null;
	}

	
	public function getHashCode() {
    	return md5(
    		  $this->_text
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
