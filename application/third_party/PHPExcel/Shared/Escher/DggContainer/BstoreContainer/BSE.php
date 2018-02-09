<?php



class PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE
{
	const BLIPTYPE_ERROR	= 0x00;
	const BLIPTYPE_UNKNOWN	= 0x01;
	const BLIPTYPE_EMF		= 0x02;
	const BLIPTYPE_WMF		= 0x03;
	const BLIPTYPE_PICT		= 0x04;
	const BLIPTYPE_JPEG		= 0x05;
	const BLIPTYPE_PNG		= 0x06;
	const BLIPTYPE_DIB		= 0x07;
	const BLIPTYPE_TIFF		= 0x11;
	const BLIPTYPE_CMYKJPEG	= 0x12;

	
	private $Vq20emrsdn3q;

	
	private $Vlayesawgci4;

	
	private $Vlayesawgci4Type;

	
	public function setParent($V3jkqexf4nr0)
	{
		$this->_parent = $V3jkqexf4nr0;
	}

	
	public function getBlip()
	{
		return $this->_blip;
	}

	
	public function setBlip($Va0n5zfcewok)
	{
		$this->_blip = $Va0n5zfcewok;
		$Va0n5zfcewok->setParent($this);
	}

	
	public function getBlipType()
	{
		return $this->_blipType;
	}

	
	public function setBlipType($Va0n5zfcewokType)
	{
		$this->_blipType = $Va0n5zfcewokType;
	}

}
