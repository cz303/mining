<?php




class PHPExcel_Comment implements PHPExcel_IComparable
{
    
    private $V2iuzckthszp;

    
    private $Vkbhl4g2thyo;

    
    private $V1hgtvz3lirj = '96pt';

    
    private $Vfruwur24e02 = '59.25pt';

    
    private $Vqe0vcgx24cg = '1.5pt';

    
    private $Vwey1yy2ahfw = false;

    
    private $Vcbzw3tnapla = '55.5pt';

    
    private $Vdnjv5cb4j3g;

    
    private $Vvqnyg21iqb4;

    
    public function __construct()
    {
        
        $this->_author		= 'Author';
        $this->_text		= new PHPExcel_RichText();
        $this->_fillColor	= new PHPExcel_Style_Color('FFFFFFE1');
        $this->_alignment	= PHPExcel_Style_Alignment::HORIZONTAL_GENERAL;
    }

    
    public function getAuthor() {
        return $this->_author;
    }

    
    public function setAuthor($Vqujkwol1zut = '') {
        $this->_author = $Vqujkwol1zut;
        return $this;
    }

    
    public function getText() {
        return $this->_text;
    }

    
    public function setText(PHPExcel_RichText $Vqujkwol1zut) {
        $this->_text = $Vqujkwol1zut;
        return $this;
    }

    
    public function getWidth() {
        return $this->_width;
    }

    
    public function setWidth($Vp4xjtpabm0l = '96pt') {
        $this->_width = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getHeight() {
        return $this->_height;
    }

    
    public function setHeight($Vp4xjtpabm0l = '55.5pt') {
        $this->_height = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getMarginLeft() {
        return $this->_marginLeft;
    }

    
    public function setMarginLeft($Vp4xjtpabm0l = '59.25pt') {
        $this->_marginLeft = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getMarginTop() {
        return $this->_marginTop;
    }

    
    public function setMarginTop($Vp4xjtpabm0l = '1.5pt') {
        $this->_marginTop = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getVisible() {
        return $this->_visible;
    }

    
    public function setVisible($Vp4xjtpabm0l = false) {
        $this->_visible = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getFillColor() {
        return $this->_fillColor;
    }

    
    public function setAlignment($Vqujkwol1zut = PHPExcel_Style_Alignment::HORIZONTAL_GENERAL) {
        $this->_alignment = $Vqujkwol1zut;
        return $this;
    }

    
    public function getAlignment() {
        return $this->_alignment;
    }

    
    public function getHashCode() {
        return md5(
              $this->_author
            . $this->_text->getHashCode()
            . $this->_width
            . $this->_height
            . $this->_marginLeft
            . $this->_marginTop
            . ($this->_visible ? 1 : 0)
            . $this->_fillColor->getHashCode()
            . $this->_alignment
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

    
    public function __toString() {
        return $this->_text->getPlainText();
    }

}
