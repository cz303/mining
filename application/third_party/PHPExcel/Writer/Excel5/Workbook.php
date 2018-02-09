<?php







































class PHPExcel_Writer_Excel5_Workbook extends PHPExcel_Writer_Excel5_BIFFwriter
{
	
	private $Vioggxdsw2hg;

	
	public $Vnqdtf451zsi;

	
	private $Vwjft1bnyvu1 = array();

	
	public $Vazuluv3j1ig;

	
	public $V4htupohbzoo;

	
	public $Vpz43ghjwzuv;

	
	private $Vviknio3gpsr;

	
	private $Vvej4v403war = array();

	
	private $Ve3dehc5wxuh = array();

	
	private $Vekplwlorvsr = array();

	
	private $V13quj0hxbue = array();

	
	private $Vqb0te4s53ho = array();

	
	private $Vzqfwsle33ts = array();

	
	private $Vwwftqoydznv;

	
	private $V0jh252gprso;

	
	private $Vlode1twtari;

	
	private $V455onjk52rq;

	
	private $V5w0oja15iln;


	
	public function __construct(PHPExcel $Vlspthbp3hwz = null,
								&$V3fsgs5mwrfj, &$V4sjmkrq5tpr, &$Vfo0chqshiwo, &$Vjozyc2clnog,
								$Vgexjz5ocus2 )
	{
		
		parent::__construct();

		$this->_parser           = $Vgexjz5ocus2;
		$this->_biffsize         = 0;
		$this->_palette          = array();
		$this->_country_code     = -1;

		$this->_str_total       = &$V3fsgs5mwrfj;
		$this->_str_unique      = &$V4sjmkrq5tpr;
		$this->_str_table       = &$Vfo0chqshiwo;
		$this->_colors          = &$Vjozyc2clnog;
		$this->_setPaletteXl97();

		$this->_phpExcel = $Vlspthbp3hwz;

		
		
		$this->_codepage = 0x04B0;

		
		$V4dlwvwtcvui = $Vlspthbp3hwz->getSheetCount();
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V4dlwvwtcvui; ++$Vfhiq1lhsoja) {
			$V4chn2ic5gpu = $Vlspthbp3hwz->getSheet($Vfhiq1lhsoja);

			$this->_parser->setExtSheet($V4chn2ic5gpu->getTitle(), $Vfhiq1lhsoja);  

			$Vaot5kiotcq1 = 0x00;
			$Vl1gwg0s04p2 = pack('vvv', $Vaot5kiotcq1, $Vfhiq1lhsoja, $Vfhiq1lhsoja);
			$this->_parser->_references[] = $Vl1gwg0s04p2;  

			
			if ($V4chn2ic5gpu->isTabColorSet()) {
				$this->_addColor($V4chn2ic5gpu->getTabColor()->getRGB());
			}
		}

	}

	
	public function addXfWriter($Vdtcpflt5bhp, $Vfhiq1lhsojasStyleXf = false)
	{
		$V1i1v44xdjyu = new PHPExcel_Writer_Excel5_Xf($Vdtcpflt5bhp);
		$V1i1v44xdjyu->setIsStyleXf($Vfhiq1lhsojasStyleXf);

		
		$Vxxsicekb41s = $this->_addFont($Vdtcpflt5bhp->getFont());

		
		$V1i1v44xdjyu->setFontIndex($Vxxsicekb41s);

		
		$V1i1v44xdjyu->setFgColor($this->_addColor($Vdtcpflt5bhp->getFill()->getStartColor()->getRGB()));
		$V1i1v44xdjyu->setBgColor($this->_addColor($Vdtcpflt5bhp->getFill()->getEndColor()->getRGB()));
		$V1i1v44xdjyu->setBottomColor($this->_addColor($Vdtcpflt5bhp->getBorders()->getBottom()->getColor()->getRGB()));
		$V1i1v44xdjyu->setTopColor($this->_addColor($Vdtcpflt5bhp->getBorders()->getTop()->getColor()->getRGB()));
		$V1i1v44xdjyu->setRightColor($this->_addColor($Vdtcpflt5bhp->getBorders()->getRight()->getColor()->getRGB()));
		$V1i1v44xdjyu->setLeftColor($this->_addColor($Vdtcpflt5bhp->getBorders()->getLeft()->getColor()->getRGB()));
		$V1i1v44xdjyu->setDiagColor($this->_addColor($Vdtcpflt5bhp->getBorders()->getDiagonal()->getColor()->getRGB()));

		
		if ($Vdtcpflt5bhp->getNumberFormat()->getBuiltInFormatCode() === false) {
			$Vecyd2jwxgj5 = $Vdtcpflt5bhp->getNumberFormat()->getHashCode();

			if (isset($this->_addedNumberFormats[$Vecyd2jwxgj5])) {
				$Vjfqttfynnbq = $this->_addedNumberFormats[$Vecyd2jwxgj5];
			} else {
				$Vjfqttfynnbq = 164 + count($this->_numberFormats);
				$this->_numberFormats[$Vjfqttfynnbq] = $Vdtcpflt5bhp->getNumberFormat();
				$this->_addedNumberFormats[$Vecyd2jwxgj5] = $Vjfqttfynnbq;
			}
		} else {
			$Vjfqttfynnbq = (int) $Vdtcpflt5bhp->getNumberFormat()->getBuiltInFormatCode();
		}

		
		$V1i1v44xdjyu->setNumberFormatIndex($Vjfqttfynnbq);

		$this->_xfWriters[] = $V1i1v44xdjyu;

		$V4de3455flza = count($this->_xfWriters) - 1;
		return $V4de3455flza;
	}

	
	public function _addFont(PHPExcel_Style_Font $Vj0kojsfk0h3)
	{
		$Vj0kojsfk0h3HashCode = $Vj0kojsfk0h3->getHashCode();
		if(isset($this->_addedFonts[$Vj0kojsfk0h3HashCode])){
			$Vxxsicekb41s = $this->_addedFonts[$Vj0kojsfk0h3HashCode];
		} else {
			$Vteqwotut5oh = count($this->_fontWriters);
			$Vxxsicekb41s = ($Vteqwotut5oh < 4) ? $Vteqwotut5oh : $Vteqwotut5oh + 1;

			$Vj0kojsfk0h3Writer = new PHPExcel_Writer_Excel5_Font($Vj0kojsfk0h3);
			$Vj0kojsfk0h3Writer->setColorIndex($this->_addColor($Vj0kojsfk0h3->getColor()->getRGB()));
			$this->_fontWriters[] = $Vj0kojsfk0h3Writer;

			$this->_addedFonts[$Vj0kojsfk0h3HashCode] = $Vxxsicekb41s;
		}
		return $Vxxsicekb41s;
	}

	
	private function _addColor($Vvw25icbq1yg) {
		if (!isset($this->_colors[$Vvw25icbq1yg])) {
			if (count($this->_colors) < 57) {
				
				$Veuvjt5uyz02 = 8 + count($this->_colors);
				$this->_palette[$Veuvjt5uyz02] =
					array(
						hexdec(substr($Vvw25icbq1yg, 0, 2)),
						hexdec(substr($Vvw25icbq1yg, 2, 2)),
						hexdec(substr($Vvw25icbq1yg, 4)),
						0
					);
				$this->_colors[$Vvw25icbq1yg] = $Veuvjt5uyz02;
			} else {
				
				$Veuvjt5uyz02 = 0;
			}
		} else {
			
			$Veuvjt5uyz02 = $this->_colors[$Vvw25icbq1yg];
		}

		return $Veuvjt5uyz02;
	}

	
	function _setPaletteXl97()
	{
		$this->_palette = array(
			0x08 => array(0x00, 0x00, 0x00, 0x00),
			0x09 => array(0xff, 0xff, 0xff, 0x00),
			0x0A => array(0xff, 0x00, 0x00, 0x00),
			0x0B => array(0x00, 0xff, 0x00, 0x00),
			0x0C => array(0x00, 0x00, 0xff, 0x00),
			0x0D => array(0xff, 0xff, 0x00, 0x00),
			0x0E => array(0xff, 0x00, 0xff, 0x00),
			0x0F => array(0x00, 0xff, 0xff, 0x00),
			0x10 => array(0x80, 0x00, 0x00, 0x00),
			0x11 => array(0x00, 0x80, 0x00, 0x00),
			0x12 => array(0x00, 0x00, 0x80, 0x00),
			0x13 => array(0x80, 0x80, 0x00, 0x00),
			0x14 => array(0x80, 0x00, 0x80, 0x00),
			0x15 => array(0x00, 0x80, 0x80, 0x00),
			0x16 => array(0xc0, 0xc0, 0xc0, 0x00),
			0x17 => array(0x80, 0x80, 0x80, 0x00),
			0x18 => array(0x99, 0x99, 0xff, 0x00),
			0x19 => array(0x99, 0x33, 0x66, 0x00),
			0x1A => array(0xff, 0xff, 0xcc, 0x00),
			0x1B => array(0xcc, 0xff, 0xff, 0x00),
			0x1C => array(0x66, 0x00, 0x66, 0x00),
			0x1D => array(0xff, 0x80, 0x80, 0x00),
			0x1E => array(0x00, 0x66, 0xcc, 0x00),
			0x1F => array(0xcc, 0xcc, 0xff, 0x00),
			0x20 => array(0x00, 0x00, 0x80, 0x00),
			0x21 => array(0xff, 0x00, 0xff, 0x00),
			0x22 => array(0xff, 0xff, 0x00, 0x00),
			0x23 => array(0x00, 0xff, 0xff, 0x00),
			0x24 => array(0x80, 0x00, 0x80, 0x00),
			0x25 => array(0x80, 0x00, 0x00, 0x00),
			0x26 => array(0x00, 0x80, 0x80, 0x00),
			0x27 => array(0x00, 0x00, 0xff, 0x00),
			0x28 => array(0x00, 0xcc, 0xff, 0x00),
			0x29 => array(0xcc, 0xff, 0xff, 0x00),
			0x2A => array(0xcc, 0xff, 0xcc, 0x00),
			0x2B => array(0xff, 0xff, 0x99, 0x00),
			0x2C => array(0x99, 0xcc, 0xff, 0x00),
			0x2D => array(0xff, 0x99, 0xcc, 0x00),
			0x2E => array(0xcc, 0x99, 0xff, 0x00),
			0x2F => array(0xff, 0xcc, 0x99, 0x00),
			0x30 => array(0x33, 0x66, 0xff, 0x00),
			0x31 => array(0x33, 0xcc, 0xcc, 0x00),
			0x32 => array(0x99, 0xcc, 0x00, 0x00),
			0x33 => array(0xff, 0xcc, 0x00, 0x00),
			0x34 => array(0xff, 0x99, 0x00, 0x00),
			0x35 => array(0xff, 0x66, 0x00, 0x00),
			0x36 => array(0x66, 0x66, 0x99, 0x00),
			0x37 => array(0x96, 0x96, 0x96, 0x00),
			0x38 => array(0x00, 0x33, 0x66, 0x00),
			0x39 => array(0x33, 0x99, 0x66, 0x00),
			0x3A => array(0x00, 0x33, 0x00, 0x00),
			0x3B => array(0x33, 0x33, 0x00, 0x00),
			0x3C => array(0x99, 0x33, 0x00, 0x00),
			0x3D => array(0x99, 0x33, 0x66, 0x00),
			0x3E => array(0x33, 0x33, 0x99, 0x00),
			0x3F => array(0x33, 0x33, 0x33, 0x00),
		);
	}

	
	public function writeWorkbook($V1422w1uzbp3 = null)
	{
		$this->_worksheetSizes = $V1422w1uzbp3;

		
		
		$Vo5gcy3z4fm4 = $this->_phpExcel->getSheetCount();

		
		$this->_storeBof(0x0005);
		$this->_writeCodepage();
		$this->_writeWindow1();

		$this->_writeDatemode();
		$this->_writeAllFonts();
		$this->_writeAllNumFormats();
		$this->_writeAllXfs();
		$this->_writeAllStyles();
		$this->_writePalette();

		
		$Vpxwequbykax = '';
		if ($this->_country_code != -1) {
			$Vpxwequbykax .= $this->_writeCountry();
		}
		$Vpxwequbykax .= $this->_writeRecalcId();

		$Vpxwequbykax .= $this->_writeSupbookInternal();
		
		$Vpxwequbykax .= $this->_writeExternsheetBiff8();
		$Vpxwequbykax .= $this->_writeAllDefinedNamesBiff8();
		$Vpxwequbykax .= $this->_writeMsoDrawingGroup();
		$Vpxwequbykax .= $this->_writeSharedStringsTable();

		$Vpxwequbykax .= $this->writeEof();

		
		$this->_calcSheetOffsets();
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vo5gcy3z4fm4; ++$Vfhiq1lhsoja) {
			$this->_writeBoundsheet($this->_phpExcel->getSheet($Vfhiq1lhsoja), $this->_worksheetOffsets[$Vfhiq1lhsoja]);
		}

		
		$this->_data .= $Vpxwequbykax;

		return $this->_data;
	}

	
	function _calcSheetOffsets()
	{
		$Vmwm4pe05l0r = 10;  

		
		$Vortqlloirgz            = $this->_datasize;

		
		$Vo5gcy3z4fm4 = count($this->_phpExcel->getAllSheets());
		foreach ($this->_phpExcel->getWorksheetIterator() as $Vzg4jtrmmzdy) {
			$Vortqlloirgz += $Vmwm4pe05l0r + strlen(PHPExcel_Shared_String::UTF8toBIFF8UnicodeShort($Vzg4jtrmmzdy->getTitle()));
		}

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vo5gcy3z4fm4; ++$Vfhiq1lhsoja) {
			$this->_worksheetOffsets[$Vfhiq1lhsoja] = $Vortqlloirgz;
			$Vortqlloirgz += $this->_worksheetSizes[$Vfhiq1lhsoja];
		}
		$this->_biffsize = $Vortqlloirgz;
	}

	
	private function _writeAllFonts()
	{
		foreach ($this->_fontWriters as $Vj0kojsfk0h3Writer) {
			$this->_append($Vj0kojsfk0h3Writer->writeFont());
		}
	}

	
	private function _writeAllNumFormats()
	{
		foreach ($this->_numberFormats as $Vjfqttfynnbq => $Vnzio5btm2jn) {
			$this->_writeNumFormat($Vnzio5btm2jn->getFormatCode(), $Vjfqttfynnbq);
		}
	}

	
	private function _writeAllXfs()
	{
		foreach ($this->_xfWriters as $V1i1v44xdjyu) {
			$this->_append($V1i1v44xdjyu->writeXf());
		}
	}

	
	private function _writeAllStyles()
	{
		$this->_writeStyle();
	}

	
	private function _writeExterns()
	{
		$V4dlwvwtcvui = $this->_phpExcel->getSheetCount();
		
		$this->_writeExterncount($V4dlwvwtcvui);

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V4dlwvwtcvui; ++$Vfhiq1lhsoja) {
			$this->_writeExternsheet($this->_phpExcel->getSheet($Vfhiq1lhsoja)->getTitle());
		}
	}

	
	private function _writeNames()
	{
		
		$Vo5gcy3z4fm4 = $this->_phpExcel->getSheetCount();

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vo5gcy3z4fm4; ++$Vfhiq1lhsoja) {
			$Vzg4jtrmmzdySetup = $this->_phpExcel->getSheet($Vfhiq1lhsoja)->getPageSetup();
			
			if ($Vzg4jtrmmzdySetup->isPrintAreaSet()) {
				
				$V4t1rtl3zyjt = PHPExcel_Cell::splitRange($Vzg4jtrmmzdySetup->getPrintArea());
				$V4t1rtl3zyjt = $V4t1rtl3zyjt[0];
				$V4t1rtl3zyjt[0] = PHPExcel_Cell::coordinateFromString($V4t1rtl3zyjt[0]);
				$V4t1rtl3zyjt[1] = PHPExcel_Cell::coordinateFromString($V4t1rtl3zyjt[1]);

				$Vckj0kotacja = $V4t1rtl3zyjt[0][1] - 1;
				$Vuuv20hxgei2 = $V4t1rtl3zyjt[1][1] - 1;
				$Vdmlawnji0wb = PHPExcel_Cell::columnIndexFromString($V4t1rtl3zyjt[0][0]) - 1;
				$Vi3zj40nq02f = PHPExcel_Cell::columnIndexFromString($V4t1rtl3zyjt[1][0]) - 1;

				$this->_writeNameShort(
					$Vfhiq1lhsoja, 
					0x06, 
					$Vckj0kotacja,
					$Vuuv20hxgei2,
					$Vdmlawnji0wb,
					$Vi3zj40nq02f
					);
			}
		}

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vo5gcy3z4fm4; ++$Vfhiq1lhsoja) {
			$Vzg4jtrmmzdySetup = $this->_phpExcel->getSheet($Vfhiq1lhsoja)->getPageSetup();

			
			if ($Vzg4jtrmmzdySetup->isColumnsToRepeatAtLeftSet() && $Vzg4jtrmmzdySetup->isRowsToRepeatAtTopSet()) {
				$Ventvdulusdf = $Vzg4jtrmmzdySetup->getColumnsToRepeatAtLeft();
				$V44joxdxr0jb = PHPExcel_Cell::columnIndexFromString($Ventvdulusdf[0]) - 1;
				$V3jjsm10ntam = PHPExcel_Cell::columnIndexFromString($Ventvdulusdf[1]) - 1;

				$Ventvdulusdf = $Vzg4jtrmmzdySetup->getRowsToRepeatAtTop();
				$Vsietv4rlv5i = $Ventvdulusdf[0] - 1;
				$Vcvbbhaeyb4t = $Ventvdulusdf[1] - 1;

				$this->_writeNameLong(
					$Vfhiq1lhsoja, 
					0x07, 
					$Vsietv4rlv5i,
					$Vcvbbhaeyb4t,
					$V44joxdxr0jb,
					$V3jjsm10ntam
					);

			
			} else if ($Vzg4jtrmmzdySetup->isColumnsToRepeatAtLeftSet() || $Vzg4jtrmmzdySetup->isRowsToRepeatAtTopSet()) {

				
				if ($Vzg4jtrmmzdySetup->isColumnsToRepeatAtLeftSet()) {
					$Ventvdulusdf = $Vzg4jtrmmzdySetup->getColumnsToRepeatAtLeft();
					$V44joxdxr0jb = PHPExcel_Cell::columnIndexFromString($Ventvdulusdf[0]) - 1;
					$V3jjsm10ntam = PHPExcel_Cell::columnIndexFromString($Ventvdulusdf[1]) - 1;
				} else {
					$V44joxdxr0jb = 0;
					$V3jjsm10ntam = 255;
				}

				
				if ($Vzg4jtrmmzdySetup->isRowsToRepeatAtTopSet()) {
					$Ventvdulusdf = $Vzg4jtrmmzdySetup->getRowsToRepeatAtTop();
					$Vsietv4rlv5i = $Ventvdulusdf[0] - 1;
					$Vcvbbhaeyb4t = $Ventvdulusdf[1] - 1;
				} else {
					$Vsietv4rlv5i = 0;
					$Vcvbbhaeyb4t = 65535;
				}

				$this->_writeNameShort(
					$Vfhiq1lhsoja, 
					0x07, 
					$Vsietv4rlv5i,
					$Vcvbbhaeyb4t,
					$V44joxdxr0jb,
					$V3jjsm10ntam
					);
			}
		}
	}

	
	private function _writeAllDefinedNamesBiff8()
	{
		$Vyc5hcidmary = '';

		
		if (count($this->_phpExcel->getNamedRanges()) > 0) {
			
			$Voybjd4b0rcn = $this->_phpExcel->getNamedRanges();
			foreach ($Voybjd4b0rcn as $Vdqyivdsly3d) {

				
				$Votjg2jvcmjx = PHPExcel_Cell::splitRange($Vdqyivdsly3d->getRange());
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < count($Votjg2jvcmjx); $Vfhiq1lhsoja++) {
					$Votjg2jvcmjx[$Vfhiq1lhsoja][0] = '\'' . str_replace("'", "''", $Vdqyivdsly3d->getWorksheet()->getTitle()) . '\'!' . PHPExcel_Cell::absoluteCoordinate($Votjg2jvcmjx[$Vfhiq1lhsoja][0]);
					if (isset($Votjg2jvcmjx[$Vfhiq1lhsoja][1])) {
						$Votjg2jvcmjx[$Vfhiq1lhsoja][1] = PHPExcel_Cell::absoluteCoordinate($Votjg2jvcmjx[$Vfhiq1lhsoja][1]);
					}
				}
				$Votjg2jvcmjx = PHPExcel_Cell::buildRange($Votjg2jvcmjx); 

				
				try {
					$Vyrkodvljby0 = $this->_parser->parse($Votjg2jvcmjx);
					$V2hseji0xqpe = $this->_parser->toReversePolish();

					
					if (isset($V2hseji0xqpe{0}) and ($V2hseji0xqpe{0} == "\x7A" or $V2hseji0xqpe{0} == "\x5A")) {
						$V2hseji0xqpe = "\x3A" . substr($V2hseji0xqpe, 1);
					}

					if ($Vdqyivdsly3d->getLocalOnly()) {
						
						$Vy3ih0q3qopd = $this->_phpExcel->getIndex($Vdqyivdsly3d->getScope()) + 1;
					} else {
						
						$Vy3ih0q3qopd = 0;
					}
					$Vyc5hcidmary .= $this->writeData($this->_writeDefinedNameBiff8($Vdqyivdsly3d->getName(), $V2hseji0xqpe, $Vy3ih0q3qopd, false));

				} catch(PHPExcel_Exception $Vnhm0uuykimv) {
					
				}
			}
		}

		
		$Vo5gcy3z4fm4 = $this->_phpExcel->getSheetCount();

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vo5gcy3z4fm4; ++$Vfhiq1lhsoja) {
			$Vzg4jtrmmzdySetup = $this->_phpExcel->getSheet($Vfhiq1lhsoja)->getPageSetup();
			
			if ($Vzg4jtrmmzdySetup->isColumnsToRepeatAtLeftSet() && $Vzg4jtrmmzdySetup->isRowsToRepeatAtTopSet()) {
				$Ventvdulusdf = $Vzg4jtrmmzdySetup->getColumnsToRepeatAtLeft();
				$V44joxdxr0jb = PHPExcel_Cell::columnIndexFromString($Ventvdulusdf[0]) - 1;
				$V3jjsm10ntam = PHPExcel_Cell::columnIndexFromString($Ventvdulusdf[1]) - 1;

				$Ventvdulusdf = $Vzg4jtrmmzdySetup->getRowsToRepeatAtTop();
				$Vsietv4rlv5i = $Ventvdulusdf[0] - 1;
				$Vcvbbhaeyb4t = $Ventvdulusdf[1] - 1;

				
				$V2hseji0xqpe = pack('Cv', 0x29, 0x17); 
				$V2hseji0xqpe .= pack('Cvvvvv', 0x3B, $Vfhiq1lhsoja, 0, 65535, $V44joxdxr0jb, $V3jjsm10ntam); 
				$V2hseji0xqpe .= pack('Cvvvvv', 0x3B, $Vfhiq1lhsoja, $Vsietv4rlv5i, $Vcvbbhaeyb4t, 0, 255); 
				$V2hseji0xqpe .= pack('C', 0x10); 

				
				$Vyc5hcidmary .= $this->writeData($this->_writeDefinedNameBiff8(pack('C', 0x07), $V2hseji0xqpe, $Vfhiq1lhsoja + 1, true));

			
			} else if ($Vzg4jtrmmzdySetup->isColumnsToRepeatAtLeftSet() || $Vzg4jtrmmzdySetup->isRowsToRepeatAtTopSet()) {

				
				if ($Vzg4jtrmmzdySetup->isColumnsToRepeatAtLeftSet()) {
					$Ventvdulusdf = $Vzg4jtrmmzdySetup->getColumnsToRepeatAtLeft();
					$V44joxdxr0jb = PHPExcel_Cell::columnIndexFromString($Ventvdulusdf[0]) - 1;
					$V3jjsm10ntam = PHPExcel_Cell::columnIndexFromString($Ventvdulusdf[1]) - 1;
				} else {
					$V44joxdxr0jb = 0;
					$V3jjsm10ntam = 255;
				}
				
				if ($Vzg4jtrmmzdySetup->isRowsToRepeatAtTopSet()) {
					$Ventvdulusdf = $Vzg4jtrmmzdySetup->getRowsToRepeatAtTop();
					$Vsietv4rlv5i = $Ventvdulusdf[0] - 1;
					$Vcvbbhaeyb4t = $Ventvdulusdf[1] - 1;
				} else {
					$Vsietv4rlv5i = 0;
					$Vcvbbhaeyb4t = 65535;
				}

				
				$V2hseji0xqpe = pack('Cvvvvv', 0x3B, $Vfhiq1lhsoja, $Vsietv4rlv5i, $Vcvbbhaeyb4t, $V44joxdxr0jb, $V3jjsm10ntam);

				
				$Vyc5hcidmary .= $this->writeData($this->_writeDefinedNameBiff8(pack('C', 0x07), $V2hseji0xqpe, $Vfhiq1lhsoja + 1, true));
			}
		}

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vo5gcy3z4fm4; ++$Vfhiq1lhsoja) {
			$Vzg4jtrmmzdySetup = $this->_phpExcel->getSheet($Vfhiq1lhsoja)->getPageSetup();
			if ($Vzg4jtrmmzdySetup->isPrintAreaSet()) {
				
				$V4t1rtl3zyjt = PHPExcel_Cell::splitRange($Vzg4jtrmmzdySetup->getPrintArea());
				$Vwuqyryvlvn2 = count($V4t1rtl3zyjt);

				$V2hseji0xqpe = '';
				for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vwuqyryvlvn2; ++$Vzmnqyqjjodw) {
					$V4t1rtl3zyjtRect = $V4t1rtl3zyjt[$Vzmnqyqjjodw]; 
					$V4t1rtl3zyjtRect[0] = PHPExcel_Cell::coordinateFromString($V4t1rtl3zyjtRect[0]);
					$V4t1rtl3zyjtRect[1] = PHPExcel_Cell::coordinateFromString($V4t1rtl3zyjtRect[1]);

					$Vckj0kotacja = $V4t1rtl3zyjtRect[0][1] - 1;
					$Vuuv20hxgei2 = $V4t1rtl3zyjtRect[1][1] - 1;
					$Vdmlawnji0wb = PHPExcel_Cell::columnIndexFromString($V4t1rtl3zyjtRect[0][0]) - 1;
					$Vi3zj40nq02f = PHPExcel_Cell::columnIndexFromString($V4t1rtl3zyjtRect[1][0]) - 1;

					
					$V2hseji0xqpe .= pack('Cvvvvv', 0x3B, $Vfhiq1lhsoja, $Vckj0kotacja, $Vuuv20hxgei2, $Vdmlawnji0wb, $Vi3zj40nq02f);

					if ($Vzmnqyqjjodw > 0) {
						$V2hseji0xqpe .= pack('C', 0x10); 
					}
				}

				
				$Vyc5hcidmary .= $this->writeData($this->_writeDefinedNameBiff8(pack('C', 0x06), $V2hseji0xqpe, $Vfhiq1lhsoja + 1, true));
			}
		}

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vo5gcy3z4fm4; ++$Vfhiq1lhsoja) {
			$Vzg4jtrmmzdyAutoFilter = $this->_phpExcel->getSheet($Vfhiq1lhsoja)->getAutoFilter();
			$Vf22y2ugjneq = $Vzg4jtrmmzdyAutoFilter->getRange();
			if(!empty($Vf22y2ugjneq)) {
				$Votjg2jvcmjxBounds = PHPExcel_Cell::rangeBoundaries($Vf22y2ugjneq);

				
				$Vcvluzjs3wzb = pack('C', 0x0D);

				$Vyc5hcidmary .= $this->writeData($this->_writeShortNameBiff8($Vcvluzjs3wzb, $Vfhiq1lhsoja + 1, $Votjg2jvcmjxBounds, true));
			}
		}

		return $Vyc5hcidmary;
	}

	
	private function _writeDefinedNameBiff8($Vcvluzjs3wzb, $V2hseji0xqpe, $Vzg4jtrmmzdyIndex = 0, $Vfhiq1lhsojasBuiltIn = false)
	{
		$Vkry1ureuzsj = 0x0018;

		
		$Vobxlvad3352 = $Vfhiq1lhsojasBuiltIn ? 0x20 : 0x00;

		
		$Vlh1vzqiwsg2 = PHPExcel_Shared_String::CountCharacters($Vcvluzjs3wzb);

		
		$Vcvluzjs3wzb = substr(PHPExcel_Shared_String::UTF8toBIFF8UnicodeLong($Vcvluzjs3wzb), 2);

		
		$Vio2fguwbfov = strlen($V2hseji0xqpe);

		
		$Vou4vxorrdoe = pack('vCCvvvCCCC', $Vobxlvad3352, 0, $Vlh1vzqiwsg2, $Vio2fguwbfov, 0, $Vzg4jtrmmzdyIndex, 0, 0, 0, 0)
			. $Vcvluzjs3wzb . $V2hseji0xqpe;
		$Volq3gdvkuqp = strlen($Vou4vxorrdoe);

		$Vl5rjgb1nsf3 = pack('vv', $Vkry1ureuzsj, $Volq3gdvkuqp);

		return $Vl5rjgb1nsf3 . $Vou4vxorrdoe;
	}

	
	private function _writeShortNameBiff8($Vcvluzjs3wzb, $Vzg4jtrmmzdyIndex = 0, $Votjg2jvcmjxBounds, $Vfhiq1lhsojasHidden = false){
		$Vkry1ureuzsj = 0x0018;

		
		$Vobxlvad3352 = ($Vfhiq1lhsojasHidden  ? 0x21 : 0x00);

		$Vnhm0uuykimvxtra  = pack('Cvvvvv',
				0x3B,
				$Vzg4jtrmmzdyIndex - 1,
				$Votjg2jvcmjxBounds[0][1] - 1,
				$Votjg2jvcmjxBounds[1][1] - 1,
				$Votjg2jvcmjxBounds[0][0] - 1,
				$Votjg2jvcmjxBounds[1][0] - 1);

		
		$Vio2fguwbfov = strlen($Vnhm0uuykimvxtra);

		
		$Vou4vxorrdoe = pack('vCCvvvCCCCC', $Vobxlvad3352, 0, 1, $Vio2fguwbfov, 0, $Vzg4jtrmmzdyIndex, 0, 0, 0, 0, 0)
			. $Vcvluzjs3wzb . $Vnhm0uuykimvxtra;
		$Volq3gdvkuqp = strlen($Vou4vxorrdoe);

		$Vl5rjgb1nsf3 = pack('vv', $Vkry1ureuzsj, $Volq3gdvkuqp);

		return $Vl5rjgb1nsf3 . $Vou4vxorrdoe;
	}

	
	private function _writeCodepage()
	{
		$Vkry1ureuzsj          = 0x0042;             
		$Volq3gdvkuqp          = 0x0002;             
		$V4bluplvlrd0              = $this->_codepage;   

		$Vl5rjgb1nsf3          = pack('vv', $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe            = pack('v',  $V4bluplvlrd0);

		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeWindow1()
	{
		$Vkry1ureuzsj    = 0x003D;                 
		$Volq3gdvkuqp    = 0x0012;                 

		$Vpfynoog0sqt       = 0x0000;                 
		$Vzotsnm1gtcu       = 0x0000;                 
		$V5hklkuqfsin      = 0x25BC;                 
		$Vztmkoocvdu0      = 0x1572;                 

		$V4so2o2kxsqi     = 0x0038;                 

		
		$V5kv2uvo5anz   = 1;       

		$Vfzs5xy13h10 = 0x0258;                 

		
		$Vfhiq1lhsojatabFirst = 0;     
		$Vfhiq1lhsojatabCur   = $this->_phpExcel->getActiveSheetIndex();    

		$Vl5rjgb1nsf3    = pack("vv",        $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe      = pack("vvvvvvvvv", $Vpfynoog0sqt, $Vzotsnm1gtcu, $V5hklkuqfsin, $Vztmkoocvdu0,
									   $V4so2o2kxsqi,
									   $Vfhiq1lhsojatabCur, $Vfhiq1lhsojatabFirst,
									   $V5kv2uvo5anz, $Vfzs5xy13h10);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeBoundsheet($Vzg4jtrmmzdy, $Vortqlloirgz)
	{
		$Vzg4jtrmmzdyname = $Vzg4jtrmmzdy->getTitle();
		$Vkry1ureuzsj    = 0x0085;                    

		
		switch ($Vzg4jtrmmzdy->getSheetState()) {
			case PHPExcel_Worksheet::SHEETSTATE_VISIBLE:	$Vffa4rtwmete = 0x00; break;
			case PHPExcel_Worksheet::SHEETSTATE_HIDDEN:		$Vffa4rtwmete = 0x01; break;
			case PHPExcel_Worksheet::SHEETSTATE_VERYHIDDEN:	$Vffa4rtwmete = 0x02; break;
			default: $Vffa4rtwmete = 0x00; break;
		}

		
		$Vwaviyos0nhn = 0x00;

		$V4so2o2kxsqi     = 0x0000;                    

		$Vou4vxorrdoe      = pack("VCC", $Vortqlloirgz, $Vffa4rtwmete, $Vwaviyos0nhn);
		$Vou4vxorrdoe .= PHPExcel_Shared_String::UTF8toBIFF8UnicodeShort($Vzg4jtrmmzdyname);

		$Volq3gdvkuqp = strlen($Vou4vxorrdoe);
		$Vl5rjgb1nsf3 = pack("vv",  $Vkry1ureuzsj, $Volq3gdvkuqp);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeSupbookInternal()
	{
		$Vkry1ureuzsj    = 0x01AE;   
		$Volq3gdvkuqp    = 0x0004;   

		$Vl5rjgb1nsf3    = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe      = pack("vv", $this->_phpExcel->getSheetCount(), 0x0401);
		return $this->writeData($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeExternsheetBiff8()
	{
		$Vfsuzem3qkdz = count($this->_parser->_references);
		$Vkry1ureuzsj   = 0x0017;                     
		$Volq3gdvkuqp   = 2 + 6 * $Vfsuzem3qkdz;  

		$Vaot5kiotcq1 = 0;           
		$Vl5rjgb1nsf3           = pack("vv",  $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe             = pack('v', $Vfsuzem3qkdz);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vfsuzem3qkdz; ++$Vfhiq1lhsoja) {
			$Vou4vxorrdoe .= $this->_parser->_references[$Vfhiq1lhsoja];
		}
		return $this->writeData($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeStyle()
	{
		$Vkry1ureuzsj    = 0x0293;   
		$Volq3gdvkuqp    = 0x0004;   

		$Vfhiq1lhsojaxfe      = 0x8000;  
		$Vdz5px3dv5n5   = 0x00;     
		$Vfhiq1lhsojaLevel    = 0xff;     

		$Vl5rjgb1nsf3    = pack("vv",  $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe      = pack("vCC", $Vfhiq1lhsojaxfe, $Vdz5px3dv5n5, $Vfhiq1lhsojaLevel);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeNumFormat($Vrcanlvxmlmp, $Vfhiq1lhsojafmt)
	{
		$Vkry1ureuzsj    = 0x041E;                      

		$Vnzio5btm2jnString = PHPExcel_Shared_String::UTF8toBIFF8UnicodeLong($Vrcanlvxmlmp);
		$Volq3gdvkuqp    = 2 + strlen($Vnzio5btm2jnString);      


		$Vl5rjgb1nsf3    = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe      = pack("v", $Vfhiq1lhsojafmt) .  $Vnzio5btm2jnString;
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeDatemode()
	{
		$Vkry1ureuzsj    = 0x0022;         
		$Volq3gdvkuqp    = 0x0002;         

		$Vuamj1iki3rr     = (PHPExcel_Shared_Date::getExcelCalendar() == PHPExcel_Shared_Date::CALENDAR_MAC_1904) ?
			1 : 0;   

		$Vl5rjgb1nsf3    = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe      = pack("v", $Vuamj1iki3rr);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeExterncount($Vzpe2a2vdjnc)
	{
		$Vkry1ureuzsj   = 0x0016;          
		$Volq3gdvkuqp   = 0x0002;          

		$Vl5rjgb1nsf3   = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe     = pack("v",  $Vzpe2a2vdjnc);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeExternsheet($Vzg4jtrmmzdyname)
	{
		$Vkry1ureuzsj      = 0x0017;                     
		$Volq3gdvkuqp      = 0x02 + strlen($Vzg4jtrmmzdyname);  

		$Vd1codtsufm4         = strlen($Vzg4jtrmmzdyname);         
		$Vud0t1hmcvxp        = 0x03;                       

		$Vl5rjgb1nsf3      = pack("vv",  $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe        = pack("CC", $Vd1codtsufm4, $Vud0t1hmcvxp);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe . $Vzg4jtrmmzdyname);
	}

	
	private function _writeNameShort($Vfhiq1lhsojandex, $V4pigtpor0ln, $Vsietv4rlv5i, $Vcvbbhaeyb4t, $V44joxdxr0jb, $V3jjsm10ntam)
	{
		$Vkry1ureuzsj          = 0x0018;       
		$Volq3gdvkuqp          = 0x0024;       

		$V4so2o2kxsqi           = 0x0020;       
		$Vltrm42bjper           = 0x00;         
		$Vd1codtsufm4             = 0x01;         
		$Vaesik0godmz             = 0x0015;       
		$Vfhiq1lhsojaxals           = $Vfhiq1lhsojandex + 1;   
		$Vfhiq1lhsojatab            = $Vfhiq1lhsojaxals;       
		$Vd1codtsufm4CustMenu     = 0x00;         
		$Vd1codtsufm4Description  = 0x00;         
		$Vd1codtsufm4Helptopic    = 0x00;         
		$Vd1codtsufm4Statustext   = 0x00;         
		$Vud0t1hmcvxp            = $V4pigtpor0ln;        

		$Vwaefq4aci4h       = 0x3b;
		$Vkadrqbpoiij       = 0xffff-$Vfhiq1lhsojandex;
		$V21acpcts4sk       = 0x0000;
		$Vztkqs0qjbv0       = 0x0000;
		$V3dwghtrkpbz       = 0x1087;
		$V3qtggze2tln       = 0x8005;

		$Vl5rjgb1nsf3             = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe               = pack("v", $V4so2o2kxsqi);
		$Vou4vxorrdoe              .= pack("C", $Vltrm42bjper);
		$Vou4vxorrdoe              .= pack("C", $Vd1codtsufm4);
		$Vou4vxorrdoe              .= pack("v", $Vaesik0godmz);
		$Vou4vxorrdoe              .= pack("v", $Vfhiq1lhsojaxals);
		$Vou4vxorrdoe              .= pack("v", $Vfhiq1lhsojatab);
		$Vou4vxorrdoe              .= pack("C", $Vd1codtsufm4CustMenu);
		$Vou4vxorrdoe              .= pack("C", $Vd1codtsufm4Description);
		$Vou4vxorrdoe              .= pack("C", $Vd1codtsufm4Helptopic);
		$Vou4vxorrdoe              .= pack("C", $Vd1codtsufm4Statustext);
		$Vou4vxorrdoe              .= pack("C", $Vud0t1hmcvxp);
		$Vou4vxorrdoe              .= pack("C", $Vwaefq4aci4h);
		$Vou4vxorrdoe              .= pack("v", $Vkadrqbpoiij);
		$Vou4vxorrdoe              .= pack("v", $V21acpcts4sk);
		$Vou4vxorrdoe              .= pack("v", $Vztkqs0qjbv0);
		$Vou4vxorrdoe              .= pack("v", $V3dwghtrkpbz);
		$Vou4vxorrdoe              .= pack("v", $V3qtggze2tln);
		$Vou4vxorrdoe              .= pack("v", $Vfhiq1lhsojandex);
		$Vou4vxorrdoe              .= pack("v", $Vfhiq1lhsojandex);
		$Vou4vxorrdoe              .= pack("v", $Vsietv4rlv5i);
		$Vou4vxorrdoe              .= pack("v", $Vcvbbhaeyb4t);
		$Vou4vxorrdoe              .= pack("C", $V44joxdxr0jb);
		$Vou4vxorrdoe              .= pack("C", $V3jjsm10ntam);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeNameLong($Vfhiq1lhsojandex, $V4pigtpor0ln, $Vsietv4rlv5i, $Vcvbbhaeyb4t, $V44joxdxr0jb, $V3jjsm10ntam)
	{
		$Vkry1ureuzsj          = 0x0018;       
		$Volq3gdvkuqp          = 0x003d;       
		$V4so2o2kxsqi           = 0x0020;       
		$Vltrm42bjper           = 0x00;         
		$Vd1codtsufm4             = 0x01;         
		$Vaesik0godmz             = 0x002e;       
		$Vfhiq1lhsojaxals           = $Vfhiq1lhsojandex + 1;   
		$Vfhiq1lhsojatab            = $Vfhiq1lhsojaxals;       
		$Vd1codtsufm4CustMenu     = 0x00;         
		$Vd1codtsufm4Description  = 0x00;         
		$Vd1codtsufm4Helptopic    = 0x00;         
		$Vd1codtsufm4Statustext   = 0x00;         
		$Vud0t1hmcvxp            = $V4pigtpor0ln;        

		$Vd5vp0ut0hei       = 0x29;
		$V4tmq2105eav       = 0x002b;
		$Vwaefq4aci4h       = 0x3b;
		$Vkadrqbpoiij       = 0xffff-$Vfhiq1lhsojandex;
		$V21acpcts4sk       = 0x0000;
		$Vztkqs0qjbv0       = 0x0000;
		$V3dwghtrkpbz       = 0x1087;
		$V3qtggze2tln       = 0x8008;

		$Vl5rjgb1nsf3             = pack("vv",  $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe               = pack("v", $V4so2o2kxsqi);
		$Vou4vxorrdoe              .= pack("C", $Vltrm42bjper);
		$Vou4vxorrdoe              .= pack("C", $Vd1codtsufm4);
		$Vou4vxorrdoe              .= pack("v", $Vaesik0godmz);
		$Vou4vxorrdoe              .= pack("v", $Vfhiq1lhsojaxals);
		$Vou4vxorrdoe              .= pack("v", $Vfhiq1lhsojatab);
		$Vou4vxorrdoe              .= pack("C", $Vd1codtsufm4CustMenu);
		$Vou4vxorrdoe              .= pack("C", $Vd1codtsufm4Description);
		$Vou4vxorrdoe              .= pack("C", $Vd1codtsufm4Helptopic);
		$Vou4vxorrdoe              .= pack("C", $Vd1codtsufm4Statustext);
		$Vou4vxorrdoe              .= pack("C", $Vud0t1hmcvxp);
		$Vou4vxorrdoe              .= pack("C", $Vd5vp0ut0hei);
		$Vou4vxorrdoe              .= pack("v", $V4tmq2105eav);
		
		$Vou4vxorrdoe              .= pack("C", $Vwaefq4aci4h);
		$Vou4vxorrdoe              .= pack("v", $Vkadrqbpoiij);
		$Vou4vxorrdoe              .= pack("v", $V21acpcts4sk);
		$Vou4vxorrdoe              .= pack("v", $Vztkqs0qjbv0);
		$Vou4vxorrdoe              .= pack("v", $V3dwghtrkpbz);
		$Vou4vxorrdoe              .= pack("v", $V3qtggze2tln);
		$Vou4vxorrdoe              .= pack("v", $Vfhiq1lhsojandex);
		$Vou4vxorrdoe              .= pack("v", $Vfhiq1lhsojandex);
		$Vou4vxorrdoe              .= pack("v", 0x0000);
		$Vou4vxorrdoe              .= pack("v", 0x3fff);
		$Vou4vxorrdoe              .= pack("C", $V44joxdxr0jb);
		$Vou4vxorrdoe              .= pack("C", $V3jjsm10ntam);
		
		$Vou4vxorrdoe              .= pack("C", $Vwaefq4aci4h);
		$Vou4vxorrdoe              .= pack("v", $Vkadrqbpoiij);
		$Vou4vxorrdoe              .= pack("v", $V21acpcts4sk);
		$Vou4vxorrdoe              .= pack("v", $Vztkqs0qjbv0);
		$Vou4vxorrdoe              .= pack("v", $V3dwghtrkpbz);
		$Vou4vxorrdoe              .= pack("v", $V3qtggze2tln);
		$Vou4vxorrdoe              .= pack("v", $Vfhiq1lhsojandex);
		$Vou4vxorrdoe              .= pack("v", $Vfhiq1lhsojandex);
		$Vou4vxorrdoe              .= pack("v", $Vsietv4rlv5i);
		$Vou4vxorrdoe              .= pack("v", $Vcvbbhaeyb4t);
		$Vou4vxorrdoe              .= pack("C", 0x00);
		$Vou4vxorrdoe              .= pack("C", 0xff);
		
		$Vou4vxorrdoe              .= pack("C", 0x10);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeCountry()
	{
		$Vkry1ureuzsj          = 0x008C;    
		$Volq3gdvkuqp          = 4;         

		$Vl5rjgb1nsf3 = pack('vv',  $Vkry1ureuzsj, $Volq3gdvkuqp);
		
		$Vou4vxorrdoe = pack('vv', $this->_country_code, $this->_country_code);
		
		return $this->writeData($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeRecalcId()
	{
		$Vkry1ureuzsj = 0x01C1;    
		$Volq3gdvkuqp = 8;         

		$Vl5rjgb1nsf3 = pack('vv',  $Vkry1ureuzsj, $Volq3gdvkuqp);

		
		$Vou4vxorrdoe = pack('VV', 0x000001C1, 0x00001E667);

		return $this->writeData($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writePalette()
	{
		$Vnezuo0wvkqo            = $this->_palette;

		$Vkry1ureuzsj          = 0x0092;                 
		$Volq3gdvkuqp          = 2 + 4 * count($Vnezuo0wvkqo);   
		$V2isgdirnpci             =         count($Vnezuo0wvkqo);   
		$Vou4vxorrdoe = '';                                

		
		foreach ($Vnezuo0wvkqo as $Vl5jzlxo3j3n) {
			foreach ($Vl5jzlxo3j3n as $Vhgbg24zkmaq) {
				$Vou4vxorrdoe .= pack("C",$Vhgbg24zkmaq);
			}
		}

		$Vl5rjgb1nsf3 = pack("vvv",  $Vkry1ureuzsj, $Volq3gdvkuqp, $V2isgdirnpci);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeSharedStringsTable()
	{
		
		$Vqjgriqrnpep = 8224;

		
		$Vkry1ureuzsjDatas = array();

		
		$Vkry1ureuzsjData = pack("VV", $this->_str_total, $this->_str_unique);

		
		foreach (array_keys($this->_str_table) as $Vwaviyos0nhnring) {

			

			
			$Vl5rjgb1nsf3info = unpack("vlength/Cencoding", $Vwaviyos0nhnring);

			
			$Vnhm0uuykimvncoding = $Vl5rjgb1nsf3info["encoding"];

			
			$Vqwmbm3f1n20 = false;

			while ($Vqwmbm3f1n20 === false) {

				
				
				

				if (strlen($Vkry1ureuzsjData) + strlen($Vwaviyos0nhnring) <= $Vqjgriqrnpep) {
					
					$Vkry1ureuzsjData .= $Vwaviyos0nhnring;

					if (strlen($Vkry1ureuzsjData) + strlen($Vwaviyos0nhnring) == $Vqjgriqrnpep) {
						
						$Vkry1ureuzsjDatas[] = $Vkry1ureuzsjData;
						$Vkry1ureuzsjData = '';
					}

					
					$Vqwmbm3f1n20 = true;
				} else {
					
					

					
					$Vofk3ufxmrnc = $Vqjgriqrnpep - strlen($Vkry1ureuzsjData);

					
					
					
					$Vwcqg1c2mgys = ($Vnhm0uuykimvncoding == 1) ? 5 : 4;

					
					
					
					
					

					
					if ($Vofk3ufxmrnc < $Vwcqg1c2mgys) {
						
						$Vkry1ureuzsjDatas[] = $Vkry1ureuzsjData;

						
						$Vkry1ureuzsjData = '';

					
					} else {
						
						$Vnhm0uuykimvffective_space_remaining = $Vofk3ufxmrnc;

						
						if ( $Vnhm0uuykimvncoding == 1 && (strlen($Vwaviyos0nhnring) - $Vofk3ufxmrnc) % 2 == 1 ) {
							--$Vnhm0uuykimvffective_space_remaining;
						}

						
						$Vkry1ureuzsjData .= substr($Vwaviyos0nhnring, 0, $Vnhm0uuykimvffective_space_remaining);

						$Vwaviyos0nhnring = substr($Vwaviyos0nhnring, $Vnhm0uuykimvffective_space_remaining); 
						$Vkry1ureuzsjDatas[] = $Vkry1ureuzsjData;

						
						$Vkry1ureuzsjData = pack('C', $Vnhm0uuykimvncoding);
					}
				}
			}
		}

		
		
		if (strlen($Vkry1ureuzsjData) > 0) {
			$Vkry1ureuzsjDatas[] = $Vkry1ureuzsjData;
		}

		
		$Vyc5hcidmary = '';
		foreach ($Vkry1ureuzsjDatas as $Vfhiq1lhsoja => $Vkry1ureuzsjData) {
			
			$Vkry1ureuzsj = ($Vfhiq1lhsoja == 0) ? 0x00FC : 0x003C;

			$Vl5rjgb1nsf3 = pack("vv", $Vkry1ureuzsj, strlen($Vkry1ureuzsjData));
			$Vou4vxorrdoe = $Vl5rjgb1nsf3 . $Vkry1ureuzsjData;

			$Vyc5hcidmary .= $this->writeData($Vou4vxorrdoe);
		}

		return $Vyc5hcidmary;
	}

	
	private function _writeMsoDrawingGroup()
	{
		
		if (isset($this->_escher)) {
			$V3pinfvte0v0 = new PHPExcel_Writer_Excel5_Escher($this->_escher);
			$Vou4vxorrdoe = $V3pinfvte0v0->close();

			$Vkry1ureuzsj = 0x00EB;
			$Volq3gdvkuqp = strlen($Vou4vxorrdoe);
			$Vl5rjgb1nsf3 = pack("vv",  $Vkry1ureuzsj, $Volq3gdvkuqp);

			return $this->writeData($Vl5rjgb1nsf3 . $Vou4vxorrdoe);

		} else {
			return '';
		}
	}

	
	public function getEscher()
	{
		return $this->_escher;
	}

	
	public function setEscher(PHPExcel_Shared_Escher $Vqujkwol1zut = null)
	{
		$this->_escher = $Vqujkwol1zut;
	}
}
