<?php




class PHPExcel_Worksheet_HeaderFooter
{
	
	const IMAGE_HEADER_LEFT							= 'LH';
	const IMAGE_HEADER_CENTER						= 'CH';
	const IMAGE_HEADER_RIGHT						= 'RH';
	const IMAGE_FOOTER_LEFT							= 'LF';
	const IMAGE_FOOTER_CENTER						= 'CF';
	const IMAGE_FOOTER_RIGHT						= 'RF';

	
	private $Vtyypbeyngny			= '';

	
	private $Vkcun0fyd3jk			= '';

	
	private $Veivleecwzg0		= '';

	
	private $V2fhffllimxx		= '';

	
	private $Vjcdqkcsolac		= '';

	
	private $V5jx4twh5hms		= '';

	
	private $Vgkq1dcv51rx	= false;

	
	private $Vpzrpmm1ppcm	= false;

	
	private $Vqb0w1zpkq4o	= true;

	
	private $Vmd5ipyx4irm	= true;

	
	private $Vrzccfo0rqgo = array();

    
    public function __construct()
    {
    }

    
    public function getOddHeader() {
    	return $this->_oddHeader;
    }

    
    public function setOddHeader($Vqujkwol1zut) {
    	$this->_oddHeader = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getOddFooter() {
    	return $this->_oddFooter;
    }

    
    public function setOddFooter($Vqujkwol1zut) {
    	$this->_oddFooter = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getEvenHeader() {
    	return $this->_evenHeader;
    }

    
    public function setEvenHeader($Vqujkwol1zut) {
    	$this->_evenHeader = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getEvenFooter() {
    	return $this->_evenFooter;
    }

    
    public function setEvenFooter($Vqujkwol1zut) {
    	$this->_evenFooter = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getFirstHeader() {
    	return $this->_firstHeader;
    }

    
    public function setFirstHeader($Vqujkwol1zut) {
    	$this->_firstHeader = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getFirstFooter() {
    	return $this->_firstFooter;
    }

    
    public function setFirstFooter($Vqujkwol1zut) {
    	$this->_firstFooter = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getDifferentOddEven() {
    	return $this->_differentOddEven;
    }

    
    public function setDifferentOddEven($Vqujkwol1zut = false) {
    	$this->_differentOddEven = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getDifferentFirst() {
    	return $this->_differentFirst;
    }

    
    public function setDifferentFirst($Vqujkwol1zut = false) {
    	$this->_differentFirst = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getScaleWithDocument() {
    	return $this->_scaleWithDocument;
    }

    
    public function setScaleWithDocument($Vqujkwol1zut = true) {
    	$this->_scaleWithDocument = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getAlignWithMargins() {
    	return $this->_alignWithMargins;
    }

    
    public function setAlignWithMargins($Vqujkwol1zut = true) {
    	$this->_alignWithMargins = $Vqujkwol1zut;
    	return $this;
    }

    
    public function addImage(PHPExcel_Worksheet_HeaderFooterDrawing $Vo4t2ytzfwtl = null, $Vw220v45occ4 = self::IMAGE_HEADER_LEFT) {
    	$this->_headerFooterImages[$Vw220v45occ4] = $Vo4t2ytzfwtl;
    	return $this;
    }

    
    public function removeImage($Vw220v45occ4 = self::IMAGE_HEADER_LEFT) {
    	if (isset($this->_headerFooterImages[$Vw220v45occ4])) {
    		unset($this->_headerFooterImages[$Vw220v45occ4]);
    	}
    	return $this;
    }

    
    public function setImages($Vo4t2ytzfwtls) {
    	if (!is_array($Vo4t2ytzfwtls)) {
    		throw new PHPExcel_Exception('Invalid parameter!');
    	}

    	$this->_headerFooterImages = $Vo4t2ytzfwtls;
    	return $this;
    }

    
    public function getImages() {
    	
    	$Vo4t2ytzfwtls = array();
    	if (isset($this->_headerFooterImages[self::IMAGE_HEADER_LEFT])) 	$Vo4t2ytzfwtls[self::IMAGE_HEADER_LEFT] = 		$this->_headerFooterImages[self::IMAGE_HEADER_LEFT];
    	if (isset($this->_headerFooterImages[self::IMAGE_HEADER_CENTER])) 	$Vo4t2ytzfwtls[self::IMAGE_HEADER_CENTER] = 	$this->_headerFooterImages[self::IMAGE_HEADER_CENTER];
    	if (isset($this->_headerFooterImages[self::IMAGE_HEADER_RIGHT])) 	$Vo4t2ytzfwtls[self::IMAGE_HEADER_RIGHT] = 	$this->_headerFooterImages[self::IMAGE_HEADER_RIGHT];
    	if (isset($this->_headerFooterImages[self::IMAGE_FOOTER_LEFT])) 	$Vo4t2ytzfwtls[self::IMAGE_FOOTER_LEFT] = 		$this->_headerFooterImages[self::IMAGE_FOOTER_LEFT];
    	if (isset($this->_headerFooterImages[self::IMAGE_FOOTER_CENTER])) 	$Vo4t2ytzfwtls[self::IMAGE_FOOTER_CENTER] = 	$this->_headerFooterImages[self::IMAGE_FOOTER_CENTER];
    	if (isset($this->_headerFooterImages[self::IMAGE_FOOTER_RIGHT])) 	$Vo4t2ytzfwtls[self::IMAGE_FOOTER_RIGHT] = 	$this->_headerFooterImages[self::IMAGE_FOOTER_RIGHT];
    	$this->_headerFooterImages = $Vo4t2ytzfwtls;

    	return $this->_headerFooterImages;
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
