<?php


defined('IDENTIFIER_OLE') ||
    define('IDENTIFIER_OLE', pack('CCCCCCCC', 0xd0, 0xcf, 0x11, 0xe0, 0xa1, 0xb1, 0x1a, 0xe1));

class PHPExcel_Shared_OLERead {
	private $Vou4vxorrdoe = '';

	
	const IDENTIFIER_OLE = IDENTIFIER_OLE;

	
	const BIG_BLOCK_SIZE					= 0x200;

	
	const SMALL_BLOCK_SIZE					= 0x40;

	
	const PROPERTY_STORAGE_BLOCK_SIZE		= 0x80;

	
	const SMALL_BLOCK_THRESHOLD				= 0x1000;

	
	const NUM_BIG_BLOCK_DEPOT_BLOCKS_POS	= 0x2c;
	const ROOT_START_BLOCK_POS				= 0x30;
	const SMALL_BLOCK_DEPOT_BLOCK_POS		= 0x3c;
	const EXTENSION_BLOCK_POS				= 0x44;
	const NUM_EXTENSION_BLOCK_POS			= 0x48;
	const BIG_BLOCK_DEPOT_BLOCKS_POS		= 0x4c;

	
	const SIZE_OF_NAME_POS					= 0x40;
	const TYPE_POS							= 0x42;
	const START_BLOCK_POS					= 0x74;
	const SIZE_POS							= 0x78;



	public $Vjkovzdsv20y						= null;
	public $Vnvyk3hd4gqf			= null;
	public $Vsoamnso0yza	= null;


	
	public function read($Vkmbu2t5m3by)
	{
		
		if(!is_readable($Vkmbu2t5m3by)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $Vkmbu2t5m3by . " for reading! File does not exist, or it is not readable.");
		}

		
		
		$this->data = file_get_contents($Vkmbu2t5m3by, FALSE, NULL, 0, 8);

		
		if ($this->data != self::IDENTIFIER_OLE) {
			throw new PHPExcel_Reader_Exception('The filename ' . $Vkmbu2t5m3by . ' is not recognised as an OLE file');
		}

		
		$this->data = file_get_contents($Vkmbu2t5m3by);

		
		$this->numBigBlockDepotBlocks = self::_GetInt4d($this->data, self::NUM_BIG_BLOCK_DEPOT_BLOCKS_POS);

		
		$this->rootStartBlock = self::_GetInt4d($this->data, self::ROOT_START_BLOCK_POS);

		
		$this->sbdStartBlock = self::_GetInt4d($this->data, self::SMALL_BLOCK_DEPOT_BLOCK_POS);

		
		$this->extensionBlock = self::_GetInt4d($this->data, self::EXTENSION_BLOCK_POS);

		
		$this->numExtensionBlocks = self::_GetInt4d($this->data, self::NUM_EXTENSION_BLOCK_POS);

		$Vaecnw5fstmw = array();
		$Vv3hdohvn1hh = self::BIG_BLOCK_DEPOT_BLOCKS_POS;

		$V5b0ojo00rca = $this->numBigBlockDepotBlocks;

		if ($this->numExtensionBlocks != 0) {
			$V5b0ojo00rca = (self::BIG_BLOCK_SIZE - self::BIG_BLOCK_DEPOT_BLOCKS_POS)/4;
		}

		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V5b0ojo00rca; ++$Vfhiq1lhsoja) {
			  $Vaecnw5fstmw[$Vfhiq1lhsoja] = self::_GetInt4d($this->data, $Vv3hdohvn1hh);
			  $Vv3hdohvn1hh += 4;
		}

		for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $this->numExtensionBlocks; ++$Vzmnqyqjjodw) {
			$Vv3hdohvn1hh = ($this->extensionBlock + 1) * self::BIG_BLOCK_SIZE;
			$Vhjdh53kkaif = min($this->numBigBlockDepotBlocks - $V5b0ojo00rca, self::BIG_BLOCK_SIZE / 4 - 1);

			for ($Vfhiq1lhsoja = $V5b0ojo00rca; $Vfhiq1lhsoja < $V5b0ojo00rca + $Vhjdh53kkaif; ++$Vfhiq1lhsoja) {
				$Vaecnw5fstmw[$Vfhiq1lhsoja] = self::_GetInt4d($this->data, $Vv3hdohvn1hh);
				$Vv3hdohvn1hh += 4;
			}

			$V5b0ojo00rca += $Vhjdh53kkaif;
			if ($V5b0ojo00rca < $this->numBigBlockDepotBlocks) {
				$this->extensionBlock = self::_GetInt4d($this->data, $Vv3hdohvn1hh);
			}
		}

		$Vv3hdohvn1hh = 0;
		$this->bigBlockChain = '';
		$V4w0hzaa5zoj = self::BIG_BLOCK_SIZE / 4;
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->numBigBlockDepotBlocks; ++$Vfhiq1lhsoja) {
			$Vv3hdohvn1hh = ($Vaecnw5fstmw[$Vfhiq1lhsoja] + 1) * self::BIG_BLOCK_SIZE;

			$this->bigBlockChain .= substr($this->data, $Vv3hdohvn1hh, 4*$V4w0hzaa5zoj);
			$Vv3hdohvn1hh += 4*$V4w0hzaa5zoj;
		}

		$Vv3hdohvn1hh = 0;
		$V4mdeiyuo1en = $this->sbdStartBlock;
		$this->smallBlockChain = '';
		while ($V4mdeiyuo1en != -2) {
			$Vv3hdohvn1hh = ($V4mdeiyuo1en + 1) * self::BIG_BLOCK_SIZE;

			$this->smallBlockChain .= substr($this->data, $Vv3hdohvn1hh, 4*$V4w0hzaa5zoj);
			$Vv3hdohvn1hh += 4*$V4w0hzaa5zoj;

			$V4mdeiyuo1en = self::_GetInt4d($this->bigBlockChain, $V4mdeiyuo1en*4);
		}

		
		$V4uturqtpcq5 = $this->rootStartBlock;
		$this->entry = $this->_readData($V4uturqtpcq5);

		$this->_readPropertySets();
	}

	
	public function getStream($V2ov2dxpmqj1)
	{
		if ($V2ov2dxpmqj1 === NULL) {
			return null;
		}

		$V2ov2dxpmqj1Data = '';

		if ($this->props[$V2ov2dxpmqj1]['size'] < self::SMALL_BLOCK_THRESHOLD) {
			$Vk2u5dl4ugzo = $this->_readData($this->props[$this->rootentry]['startBlock']);

			$V4uturqtpcq5 = $this->props[$V2ov2dxpmqj1]['startBlock'];

			while ($V4uturqtpcq5 != -2) {
	  			$Vv3hdohvn1hh = $V4uturqtpcq5 * self::SMALL_BLOCK_SIZE;
				$V2ov2dxpmqj1Data .= substr($Vk2u5dl4ugzo, $Vv3hdohvn1hh, self::SMALL_BLOCK_SIZE);

				$V4uturqtpcq5 = self::_GetInt4d($this->smallBlockChain, $V4uturqtpcq5*4);
			}

			return $V2ov2dxpmqj1Data;
		} else {
			$Vqw1kkxekuqo = $this->props[$V2ov2dxpmqj1]['size'] / self::BIG_BLOCK_SIZE;
			if ($this->props[$V2ov2dxpmqj1]['size'] % self::BIG_BLOCK_SIZE != 0) {
				++$Vqw1kkxekuqo;
			}

			if ($Vqw1kkxekuqo == 0) return '';

			$V4uturqtpcq5 = $this->props[$V2ov2dxpmqj1]['startBlock'];

			while ($V4uturqtpcq5 != -2) {
				$Vv3hdohvn1hh = ($V4uturqtpcq5 + 1) * self::BIG_BLOCK_SIZE;
				$V2ov2dxpmqj1Data .= substr($this->data, $Vv3hdohvn1hh, self::BIG_BLOCK_SIZE);
				$V4uturqtpcq5 = self::_GetInt4d($this->bigBlockChain, $V4uturqtpcq5*4);
			}

			return $V2ov2dxpmqj1Data;
		}
	}

	
	private function _readData($Vnewr3funjm5)
	{
		$V4uturqtpcq5 = $Vnewr3funjm5;
		$Vou4vxorrdoe = '';

		while ($V4uturqtpcq5 != -2)  {
			$Vv3hdohvn1hh = ($V4uturqtpcq5 + 1) * self::BIG_BLOCK_SIZE;
			$Vou4vxorrdoe .= substr($this->data, $Vv3hdohvn1hh, self::BIG_BLOCK_SIZE);
			$V4uturqtpcq5 = self::_GetInt4d($this->bigBlockChain, $V4uturqtpcq5*4);
		}
		return $Vou4vxorrdoe;
	 }

	
	private function _readPropertySets() {
		$Vortqlloirgz = 0;

		
		$Vqnef1pmrxh5 = strlen($this->entry);
		while ($Vortqlloirgz < $Vqnef1pmrxh5) {
			
			$Vrec2f1japon = substr($this->entry, $Vortqlloirgz, self::PROPERTY_STORAGE_BLOCK_SIZE);

			
			$Veotl1htkd43 = ord($Vrec2f1japon[self::SIZE_OF_NAME_POS]) | (ord($Vrec2f1japon[self::SIZE_OF_NAME_POS+1]) << 8);

			
			$V4pigtpor0ln = ord($Vrec2f1japon[self::TYPE_POS]);

			
			
			$V1ykutxedkrz = self::_GetInt4d($Vrec2f1japon, self::START_BLOCK_POS);

			$V4jbadwq4bzj = self::_GetInt4d($Vrec2f1japon, self::SIZE_POS);

			$Vcvluzjs3wzb = str_replace("\x00", "", substr($Vrec2f1japon,0,$Veotl1htkd43));


			$this->props[] = array (
				'name' => $Vcvluzjs3wzb,
				'type' => $V4pigtpor0ln,
				'startBlock' => $V1ykutxedkrz,
				'size' => $V4jbadwq4bzj);

			
			$Vl40gitirzap = strtoupper($Vcvluzjs3wzb);

			
			if (($Vl40gitirzap === 'WORKBOOK') || ($Vl40gitirzap === 'BOOK')) {
				$this->wrkbook = count($this->props) - 1;
			}
			else if ( $Vl40gitirzap === 'ROOT ENTRY' || $Vl40gitirzap === 'R') {
				
				$this->rootentry = count($this->props) - 1;
			}

			
			if ($Vcvluzjs3wzb == chr(5) . 'SummaryInformation') {

				$this->summaryInformation = count($this->props) - 1;
			}

			
			if ($Vcvluzjs3wzb == chr(5) . 'DocumentSummaryInformation') {

				$this->documentSummaryInformation = count($this->props) - 1;
			}

			$Vortqlloirgz += self::PROPERTY_STORAGE_BLOCK_SIZE;
		}

	}

	
	private static function _GetInt4d($Vou4vxorrdoe, $Vv3hdohvn1hh)
	{
		
		
		
		$Vxu4q04ul4kn = ord($Vou4vxorrdoe[$Vv3hdohvn1hh + 3]);
		if ($Vxu4q04ul4kn >= 128) {
			
			$V4k5lll1ubr1 = -abs((256 - $Vxu4q04ul4kn) << 24);
		} else {
			$V4k5lll1ubr1 = ($Vxu4q04ul4kn & 127) << 24;
		}
		return ord($Vou4vxorrdoe[$Vv3hdohvn1hh]) | (ord($Vou4vxorrdoe[$Vv3hdohvn1hh + 1]) << 8) | (ord($Vou4vxorrdoe[$Vv3hdohvn1hh + 2]) << 16) | $V4k5lll1ubr1;
	}

}
