<?php




class PHPExcel_RichText implements PHPExcel_IComparable
{
    
    private $Vaed1twrwcko;

    
    public function __construct(PHPExcel_Cell $Vp0mtfiyrfm5 = null)
    {
        
        $this->_richTextElements = array();

        
        if ($Vp0mtfiyrfm5 !== NULL) {
            
            if ($Vp0mtfiyrfm5->getValue() != "") {
                $Vgpkzgutqdhc = new PHPExcel_RichText_Run($Vp0mtfiyrfm5->getValue());
                $Vgpkzgutqdhc->setFont(clone $Vp0mtfiyrfm5->getParent()->getStyle($Vp0mtfiyrfm5->getCoordinate())->getFont());
                $this->addText($Vgpkzgutqdhc);
            }

            
            $Vp0mtfiyrfm5->setValueExplicit($this, PHPExcel_Cell_DataType::TYPE_STRING);
        }
    }

    
    public function addText(PHPExcel_RichText_ITextElement $Vs2zor54xiqr = null)
    {
        $this->_richTextElements[] = $Vs2zor54xiqr;
        return $this;
    }

    
    public function createText($Vs2zor54xiqr = '')
    {
        $Vd42qkadafql = new PHPExcel_RichText_TextElement($Vs2zor54xiqr);
        $this->addText($Vd42qkadafql);
        return $Vd42qkadafql;
    }

    
    public function createTextRun($Vs2zor54xiqr = '')
    {
        $Vd42qkadafql = new PHPExcel_RichText_Run($Vs2zor54xiqr);
        $this->addText($Vd42qkadafql);
        return $Vd42qkadafql;
    }

    
    public function getPlainText()
    {
        
        $Vbco3t3kne3m = '';

        
        foreach ($this->_richTextElements as $Vkjdq1foihhi) {
            $Vbco3t3kne3m .= $Vkjdq1foihhi->getText();
        }

        
        return $Vbco3t3kne3m;
    }

    
    public function __toString()
    {
        return $this->getPlainText();
    }

    
    public function getRichTextElements()
    {
        return $this->_richTextElements;
    }

    
    public function setRichTextElements($Vpps5zx0oavz = null)
    {
        if (is_array($Vpps5zx0oavz)) {
            $this->_richTextElements = $Vpps5zx0oavz;
        } else {
            throw new PHPExcel_Exception("Invalid PHPExcel_RichText_ITextElement[] array passed.");
        }
        return $this;
    }

    
    public function getHashCode()
    {
        $V3iskxfapqy3 = '';
        foreach ($this->_richTextElements as $Vltoddaysjlm) {
            $V3iskxfapqy3 .= $Vltoddaysjlm->getHashCode();
        }

        return md5(
              $V3iskxfapqy3
            . __CLASS__
        );
    }

    
    public function __clone()
    {
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
