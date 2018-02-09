<?php



































if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}


class PHPExcel_Reader_Excel5 extends PHPExcel_Reader_Abstract implements PHPExcel_Reader_IReader
{
	
	const XLS_BIFF8						= 0x0600;
	const XLS_BIFF7						= 0x0500;
	const XLS_WorkbookGlobals			= 0x0005;
	const XLS_Worksheet					= 0x0010;

	
	const XLS_Type_FORMULA				= 0x0006;
	const XLS_Type_EOF					= 0x000a;
	const XLS_Type_PROTECT				= 0x0012;
	const XLS_Type_OBJECTPROTECT		= 0x0063;
	const XLS_Type_SCENPROTECT			= 0x00dd;
	const XLS_Type_PASSWORD				= 0x0013;
	const XLS_Type_HEADER				= 0x0014;
	const XLS_Type_FOOTER				= 0x0015;
	const XLS_Type_EXTERNSHEET			= 0x0017;
	const XLS_Type_DEFINEDNAME			= 0x0018;
	const XLS_Type_VERTICALPAGEBREAKS	= 0x001a;
	const XLS_Type_HORIZONTALPAGEBREAKS	= 0x001b;
	const XLS_Type_NOTE					= 0x001c;
	const XLS_Type_SELECTION			= 0x001d;
	const XLS_Type_DATEMODE				= 0x0022;
	const XLS_Type_EXTERNNAME			= 0x0023;
	const XLS_Type_LEFTMARGIN			= 0x0026;
	const XLS_Type_RIGHTMARGIN			= 0x0027;
	const XLS_Type_TOPMARGIN			= 0x0028;
	const XLS_Type_BOTTOMMARGIN			= 0x0029;
	const XLS_Type_PRINTGRIDLINES		= 0x002b;
	const XLS_Type_FILEPASS				= 0x002f;
	const XLS_Type_FONT					= 0x0031;
	const XLS_Type_CONTINUE				= 0x003c;
	const XLS_Type_PANE					= 0x0041;
	const XLS_Type_CODEPAGE				= 0x0042;
	const XLS_Type_DEFCOLWIDTH 			= 0x0055;
	const XLS_Type_OBJ					= 0x005d;
	const XLS_Type_COLINFO				= 0x007d;
	const XLS_Type_IMDATA				= 0x007f;
	const XLS_Type_SHEETPR				= 0x0081;
	const XLS_Type_HCENTER				= 0x0083;
	const XLS_Type_VCENTER				= 0x0084;
	const XLS_Type_SHEET				= 0x0085;
	const XLS_Type_PALETTE				= 0x0092;
	const XLS_Type_SCL					= 0x00a0;
	const XLS_Type_PAGESETUP			= 0x00a1;
	const XLS_Type_MULRK				= 0x00bd;
	const XLS_Type_MULBLANK				= 0x00be;
	const XLS_Type_DBCELL				= 0x00d7;
	const XLS_Type_XF					= 0x00e0;
	const XLS_Type_MERGEDCELLS			= 0x00e5;
	const XLS_Type_MSODRAWINGGROUP		= 0x00eb;
	const XLS_Type_MSODRAWING			= 0x00ec;
	const XLS_Type_SST					= 0x00fc;
	const XLS_Type_LABELSST				= 0x00fd;
	const XLS_Type_EXTSST				= 0x00ff;
	const XLS_Type_EXTERNALBOOK			= 0x01ae;
	const XLS_Type_DATAVALIDATIONS		= 0x01b2;
	const XLS_Type_TXO					= 0x01b6;
	const XLS_Type_HYPERLINK			= 0x01b8;
	const XLS_Type_DATAVALIDATION		= 0x01be;
	const XLS_Type_DIMENSION			= 0x0200;
	const XLS_Type_BLANK				= 0x0201;
	const XLS_Type_NUMBER				= 0x0203;
	const XLS_Type_LABEL				= 0x0204;
	const XLS_Type_BOOLERR				= 0x0205;
	const XLS_Type_STRING				= 0x0207;
	const XLS_Type_ROW					= 0x0208;
	const XLS_Type_INDEX				= 0x020b;
	const XLS_Type_ARRAY				= 0x0221;
	const XLS_Type_DEFAULTROWHEIGHT 	= 0x0225;
	const XLS_Type_WINDOW2				= 0x023e;
	const XLS_Type_RK					= 0x027e;
	const XLS_Type_STYLE				= 0x0293;
	const XLS_Type_FORMAT				= 0x041e;
	const XLS_Type_SHAREDFMLA			= 0x04bc;
	const XLS_Type_BOF					= 0x0809;
	const XLS_Type_SHEETPROTECTION		= 0x0867;
	const XLS_Type_RANGEPROTECTION		= 0x0868;
	const XLS_Type_SHEETLAYOUT			= 0x0862;
	const XLS_Type_XFEXT				= 0x087d;
	const XLS_Type_PAGELAYOUTVIEW		= 0x088b;
	const XLS_Type_UNKNOWN				= 0xffff;

	
	const MS_BIFF_CRYPTO_NONE = 0;
	const MS_BIFF_CRYPTO_XOR  = 1;
	const MS_BIFF_CRYPTO_RC4  = 2;
	
	
	const REKEY_BLOCK = 0x400;

	
	private $V1ibljq0tggf;

	
	private $Vof2geembhfe;

	
	private $Vqwolo1pk5vo;

	
	private $Vqrocrebbbaa;

	
	private $VqrocrebbbaaSize;

	
	private $Vr45lzy1kupy;

	
	private $Vviknio3gpsr;

	
	private $Vpj20nyzfqd3;

	
	private $Vzcb002x2vbs;

	
	private $V4htupohbzoo;

	
	private $V5l1y51lqrhn;

	
	private $V4duimz3rdel;

	
	private $Vazuluv3j1ig;

	
	private $V5kv3j5upfpw;

	
	private $Vkfm4nf1u1xh;

	
	private $V42huojqlhln;

	
	private $Vroprvdhh5rz;

	
	private $Vzwejuhyn0af;

	
	private $Vrvcqwo5kxm3;

	
	private $Vzoj2pywoxyh;

	
	private $Vo3m3r3btpcg;

	
	private $V2zfetro3jiy;

	
	private $Vhgat0ufnlnl;

	
	private $Vkjpeoxgs1py;

	
	private $Vag334nhbkpc;

	
	private $Vdrr50a5lowp;

	
	private $V440jo03t3dc;

	
	private $Vvwycvpzbqms;

	
	private $Vvqh1qngo4dv;

	
	private $Vhwwsdvrn1ra;

	
	private $Vewh3lqo2vl2;

	
	private $Vdwzghpa3log = 0;
	
	
	private $Vdwzghpa3logStartPos = false;

	
	private $Vvhzkg34hq01 = null;

	
	private $V03fte1hwqme = 0;

	
	private $Vfg05adllogy = null;

	
	public function __construct() {
		$this->_readFilter = new PHPExcel_Reader_DefaultReadFilter();
	}


	
	public function canRead($V1tltbb5c5oc)
	{
		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

		try {
			
			$Ve25fnp1s5uc = new PHPExcel_Shared_OLERead();

			
			$Ve3oeikqcm5n = $Ve25fnp1s5uc->read($V1tltbb5c5oc);
			return true;
		} catch (PHPExcel_Exception $Vnhm0uuykimv) {
			return false;
		}
	}


	
	public function listWorksheetNames($V1tltbb5c5oc)
	{
		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

		$Vgeqndxyegdu = array();

		
		$this->_loadOLE($V1tltbb5c5oc);

		
		$this->_dataSize = strlen($this->_data);

		$this->_pos		= 0;
		$this->_sheets	= array();

		
		while ($this->_pos < $this->_dataSize) {
			$V0x4xt3l5phz = self::_GetInt2d($this->_data, $this->_pos);

			switch ($V0x4xt3l5phz) {
				case self::XLS_Type_BOF:	$this->_readBof();		break;
				case self::XLS_Type_SHEET:	$this->_readSheet();	break;
				case self::XLS_Type_EOF:	$this->_readDefault();	break 2;
				default:					$this->_readDefault();	break;
			}
		}

		foreach ($this->_sheets as $Vzg4jtrmmzdy) {
			if ($Vzg4jtrmmzdy['sheetType'] != 0x00) {
				
				continue;
			}

			$Vgeqndxyegdu[] = $Vzg4jtrmmzdy['name'];
		}

		return $Vgeqndxyegdu;
	}


	
	public function listWorksheetInfo($V1tltbb5c5oc)
	{
		
		if (!file_exists($V1tltbb5c5oc)) {
			throw new PHPExcel_Reader_Exception("Could not open " . $V1tltbb5c5oc . " for reading! File does not exist.");
		}

		$V2rvssyhthui = array();

		
		$this->_loadOLE($V1tltbb5c5oc);

		
		$this->_dataSize = strlen($this->_data);

		
		$this->_pos    = 0;
		$this->_sheets = array();

		
		while ($this->_pos < $this->_dataSize) {
			$V0x4xt3l5phz = self::_GetInt2d($this->_data, $this->_pos);

			switch ($V0x4xt3l5phz) {
				case self::XLS_Type_BOF:        $this->_readBof();        break;
				case self::XLS_Type_SHEET:      $this->_readSheet();      break;
				case self::XLS_Type_EOF:        $this->_readDefault();    break 2;
				default:                        $this->_readDefault();    break;
			}
		}

		
		foreach ($this->_sheets as $Vzg4jtrmmzdy) {

			if ($Vzg4jtrmmzdy['sheetType'] != 0x00) {
				
				
				
				continue;
			}

			$V1jil0euskeo = array();
			$V1jil0euskeo['worksheetName'] = $Vzg4jtrmmzdy['name'];
			$V1jil0euskeo['lastColumnLetter'] = 'A';
			$V1jil0euskeo['lastColumnIndex'] = 0;
			$V1jil0euskeo['totalRows'] = 0;
			$V1jil0euskeo['totalColumns'] = 0;

			$this->_pos = $Vzg4jtrmmzdy['offset'];

			while ($this->_pos <= $this->_dataSize - 4) {
				$V0x4xt3l5phz = self::_GetInt2d($this->_data, $this->_pos);

				switch ($V0x4xt3l5phz) {
					case self::XLS_Type_RK:
					case self::XLS_Type_LABELSST:
					case self::XLS_Type_NUMBER:
					case self::XLS_Type_FORMULA:
					case self::XLS_Type_BOOLERR:
					case self::XLS_Type_LABEL:
						$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
						$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

						
						$this->_pos += 4 + $Volq3gdvkuqp;

						$Vcj3rtes4zrz = self::_GetInt2d($Vqcst2xnrxwx, 0) + 1;
						$Vdpliwd4tl4l = self::_GetInt2d($Vqcst2xnrxwx, 2);

						$V1jil0euskeo['totalRows'] = max($V1jil0euskeo['totalRows'], $Vcj3rtes4zrz);
						$V1jil0euskeo['lastColumnIndex'] = max($V1jil0euskeo['lastColumnIndex'], $Vdpliwd4tl4l);
						break;
					case self::XLS_Type_BOF:      $this->_readBof();          break;
					case self::XLS_Type_EOF:      $this->_readDefault();      break 2;
					default:                      $this->_readDefault();      break;
				}
			}

			$V1jil0euskeo['lastColumnLetter'] = PHPExcel_Cell::stringFromColumnIndex($V1jil0euskeo['lastColumnIndex']);
			$V1jil0euskeo['totalColumns'] = $V1jil0euskeo['lastColumnIndex'] + 1;

			$V2rvssyhthui[] = $V1jil0euskeo;
		}

		return $V2rvssyhthui;
	}


	
	public function load($V1tltbb5c5oc)
	{
		
		$this->_loadOLE($V1tltbb5c5oc);

		
		$this->_phpExcel = new PHPExcel;
		$this->_phpExcel->removeSheetByIndex(0); 
		if (!$this->_readDataOnly) {
			$this->_phpExcel->removeCellStyleXfByIndex(0); 
			$this->_phpExcel->removeCellXfByIndex(0); 
		}

		
		$this->_readSummaryInformation();

		
		$this->_readDocumentSummaryInformation();

		
		$this->_dataSize = strlen($this->_data);

		
		$this->_pos					= 0;
		$this->_codepage			= 'CP1252';
		$this->_formats				= array();
		$this->_objFonts			= array();
		$this->_palette				= array();
		$this->_sheets				= array();
		$this->_externalBooks		= array();
		$this->_ref					= array();
		$this->_definedname			= array();
		$this->_sst					= array();
		$this->_drawingGroupData	= '';
		$this->_xfIndex				= '';
		$this->_mapCellXfIndex		= array();
		$this->_mapCellStyleXfIndex	= array();

		
		while ($this->_pos < $this->_dataSize) {
			$V0x4xt3l5phz = self::_GetInt2d($this->_data, $this->_pos);

			switch ($V0x4xt3l5phz) {
				case self::XLS_Type_BOF:			$this->_readBof();				break;
				case self::XLS_Type_FILEPASS:		$this->_readFilepass();			break;
				case self::XLS_Type_CODEPAGE:		$this->_readCodepage();			break;
				case self::XLS_Type_DATEMODE:		$this->_readDateMode();			break;
				case self::XLS_Type_FONT:			$this->_readFont();				break;
				case self::XLS_Type_FORMAT:			$this->_readFormat();			break;
				case self::XLS_Type_XF:				$this->_readXf();				break;
				case self::XLS_Type_XFEXT:			$this->_readXfExt();			break;
				case self::XLS_Type_STYLE:			$this->_readStyle();			break;
				case self::XLS_Type_PALETTE:		$this->_readPalette();			break;
				case self::XLS_Type_SHEET:			$this->_readSheet();			break;
				case self::XLS_Type_EXTERNALBOOK:	$this->_readExternalBook();		break;
				case self::XLS_Type_EXTERNNAME:		$this->_readExternName();		break;
				case self::XLS_Type_EXTERNSHEET:	$this->_readExternSheet();		break;
				case self::XLS_Type_DEFINEDNAME:	$this->_readDefinedName();		break;
				case self::XLS_Type_MSODRAWINGGROUP:	$this->_readMsoDrawingGroup();	break;
				case self::XLS_Type_SST:			$this->_readSst();				break;
				case self::XLS_Type_EOF:			$this->_readDefault();			break 2;
				default:							$this->_readDefault();			break;
			}
		}

		
		
		if (!$this->_readDataOnly) {
			foreach ($this->_objFonts as $Vjcac4pcfq3x) {
				if (isset($Vjcac4pcfq3x->colorIndex)) {
					$Vl5jzlxo3j3n = self::_readColor($Vjcac4pcfq3x->colorIndex,$this->_palette,$this->_version);
					$Vjcac4pcfq3x->getColor()->setRGB($Vl5jzlxo3j3n['rgb']);
				}
			}

			foreach ($this->_phpExcel->getCellXfCollection() as $Vcdr0zxxzggt) {
				
				$Vlljqdlim1ql = $Vcdr0zxxzggt->getFill();

				if (isset($Vlljqdlim1ql->startcolorIndex)) {
					$Vdz5xtzsqf3x = self::_readColor($Vlljqdlim1ql->startcolorIndex,$this->_palette,$this->_version);
					$Vlljqdlim1ql->getStartColor()->setRGB($Vdz5xtzsqf3x['rgb']);
				}

				if (isset($Vlljqdlim1ql->endcolorIndex)) {
					$Vnhm0uuykimvndColor = self::_readColor($Vlljqdlim1ql->endcolorIndex,$this->_palette,$this->_version);
					$Vlljqdlim1ql->getEndColor()->setRGB($Vnhm0uuykimvndColor['rgb']);
				}

				
				$Vrveb1xz24qu      = $Vcdr0zxxzggt->getBorders()->getTop();
				$Vqyn43hpxtm0    = $Vcdr0zxxzggt->getBorders()->getRight();
				$Vyzmqhafpy0b   = $Vcdr0zxxzggt->getBorders()->getBottom();
				$Vrce0gsxjgkc     = $Vcdr0zxxzggt->getBorders()->getLeft();
				$Vwdwytm4spp0 = $Vcdr0zxxzggt->getBorders()->getDiagonal();

				if (isset($Vrveb1xz24qu->colorIndex)) {
					$V0x11v0vdf4a = self::_readColor($Vrveb1xz24qu->colorIndex,$this->_palette,$this->_version);
					$Vrveb1xz24qu->getColor()->setRGB($V0x11v0vdf4a['rgb']);
				}

				if (isset($Vqyn43hpxtm0->colorIndex)) {
					$V5vynvmetzfd = self::_readColor($Vqyn43hpxtm0->colorIndex,$this->_palette,$this->_version);
					$Vqyn43hpxtm0->getColor()->setRGB($V5vynvmetzfd['rgb']);
				}

				if (isset($Vyzmqhafpy0b->colorIndex)) {
					$Vle0ma2ma4s1 = self::_readColor($Vyzmqhafpy0b->colorIndex,$this->_palette,$this->_version);
					$Vyzmqhafpy0b->getColor()->setRGB($Vle0ma2ma4s1['rgb']);
				}

				if (isset($Vrce0gsxjgkc->colorIndex)) {
					$V3tqrwaszfzn = self::_readColor($Vrce0gsxjgkc->colorIndex,$this->_palette,$this->_version);
					$Vrce0gsxjgkc->getColor()->setRGB($V3tqrwaszfzn['rgb']);
				}

				if (isset($Vwdwytm4spp0->colorIndex)) {
					$Vie0wrt121co = self::_readColor($Vwdwytm4spp0->colorIndex,$this->_palette,$this->_version);
					$Vwdwytm4spp0->getColor()->setRGB($Vie0wrt121co['rgb']);
				}
			}
		}

		
		if (!$this->_readDataOnly && $this->_drawingGroupData) {
			$Vnhm0uuykimvscherWorkbook = new PHPExcel_Shared_Escher();
			$Vlig2h1nz33u = new PHPExcel_Reader_Excel5_Escher($Vnhm0uuykimvscherWorkbook);
			$Vnhm0uuykimvscherWorkbook = $Vlig2h1nz33u->load($this->_drawingGroupData);

			
			
			
		}

		
		foreach ($this->_sheets as $Vzg4jtrmmzdy) {

			if ($Vzg4jtrmmzdy['sheetType'] != 0x00) {
				
				continue;
			}

			
			if (isset($this->_loadSheetsOnly) && !in_array($Vzg4jtrmmzdy['name'], $this->_loadSheetsOnly)) {
				continue;
			}

			
			$this->_phpSheet = $this->_phpExcel->createSheet();
			
			
			
			$this->_phpSheet->setTitle($Vzg4jtrmmzdy['name'],false);
			$this->_phpSheet->setSheetState($Vzg4jtrmmzdy['sheetState']);

			$this->_pos = $Vzg4jtrmmzdy['offset'];

			
			$this->_isFitToPages = false;

			
			$this->_drawingData = '';

			
			$this->_objs = array();

			
			$this->_sharedFormulaParts = array();

			
			$this->_sharedFormulas = array();

			
			$this->_textObjects = array();

			
			$this->_cellNotes = array();
			$this->textObjRef = -1;

			while ($this->_pos <= $this->_dataSize - 4) {
				$V0x4xt3l5phz = self::_GetInt2d($this->_data, $this->_pos);

				switch ($V0x4xt3l5phz) {
					case self::XLS_Type_BOF:					$this->_readBof();						break;
					case self::XLS_Type_PRINTGRIDLINES:			$this->_readPrintGridlines();			break;
					case self::XLS_Type_DEFAULTROWHEIGHT:		$this->_readDefaultRowHeight();			break;
					case self::XLS_Type_SHEETPR:				$this->_readSheetPr();					break;
					case self::XLS_Type_HORIZONTALPAGEBREAKS:	$this->_readHorizontalPageBreaks();		break;
					case self::XLS_Type_VERTICALPAGEBREAKS:		$this->_readVerticalPageBreaks();		break;
					case self::XLS_Type_HEADER:					$this->_readHeader();					break;
					case self::XLS_Type_FOOTER:					$this->_readFooter();					break;
					case self::XLS_Type_HCENTER:				$this->_readHcenter();					break;
					case self::XLS_Type_VCENTER:				$this->_readVcenter();					break;
					case self::XLS_Type_LEFTMARGIN:				$this->_readLeftMargin();				break;
					case self::XLS_Type_RIGHTMARGIN:			$this->_readRightMargin();				break;
					case self::XLS_Type_TOPMARGIN:				$this->_readTopMargin();				break;
					case self::XLS_Type_BOTTOMMARGIN:			$this->_readBottomMargin();				break;
					case self::XLS_Type_PAGESETUP:				$this->_readPageSetup();				break;
					case self::XLS_Type_PROTECT:				$this->_readProtect();					break;
					case self::XLS_Type_SCENPROTECT:			$this->_readScenProtect();				break;
					case self::XLS_Type_OBJECTPROTECT:			$this->_readObjectProtect();			break;
					case self::XLS_Type_PASSWORD:				$this->_readPassword();					break;
					case self::XLS_Type_DEFCOLWIDTH:			$this->_readDefColWidth();				break;
					case self::XLS_Type_COLINFO:				$this->_readColInfo();					break;
					case self::XLS_Type_DIMENSION:				$this->_readDefault();					break;
					case self::XLS_Type_ROW:					$this->_readRow();						break;
					case self::XLS_Type_DBCELL:					$this->_readDefault();					break;
					case self::XLS_Type_RK:						$this->_readRk();						break;
					case self::XLS_Type_LABELSST:				$this->_readLabelSst();					break;
					case self::XLS_Type_MULRK:					$this->_readMulRk();					break;
					case self::XLS_Type_NUMBER:					$this->_readNumber();					break;
					case self::XLS_Type_FORMULA:				$this->_readFormula();					break;
					case self::XLS_Type_SHAREDFMLA:				$this->_readSharedFmla();				break;
					case self::XLS_Type_BOOLERR:				$this->_readBoolErr();					break;
					case self::XLS_Type_MULBLANK:				$this->_readMulBlank();					break;
					case self::XLS_Type_LABEL:					$this->_readLabel();					break;
					case self::XLS_Type_BLANK:					$this->_readBlank();					break;
					case self::XLS_Type_MSODRAWING:				$this->_readMsoDrawing();				break;
					case self::XLS_Type_OBJ:					$this->_readObj();						break;
					case self::XLS_Type_WINDOW2:				$this->_readWindow2();					break;
					case self::XLS_Type_PAGELAYOUTVIEW:	$this->_readPageLayoutView();					break;
					case self::XLS_Type_SCL:					$this->_readScl();						break;
					case self::XLS_Type_PANE:					$this->_readPane();						break;
					case self::XLS_Type_SELECTION:				$this->_readSelection();				break;
					case self::XLS_Type_MERGEDCELLS:			$this->_readMergedCells();				break;
					case self::XLS_Type_HYPERLINK:				$this->_readHyperLink();				break;
					case self::XLS_Type_DATAVALIDATIONS:		$this->_readDataValidations();			break;
					case self::XLS_Type_DATAVALIDATION:			$this->_readDataValidation();			break;
					case self::XLS_Type_SHEETLAYOUT:			$this->_readSheetLayout();				break;
					case self::XLS_Type_SHEETPROTECTION:		$this->_readSheetProtection();			break;
					case self::XLS_Type_RANGEPROTECTION:		$this->_readRangeProtection();			break;
					case self::XLS_Type_NOTE:					$this->_readNote();						break;
					
					case self::XLS_Type_TXO:					$this->_readTextObject();				break;
					case self::XLS_Type_CONTINUE:				$this->_readContinue();					break;
					case self::XLS_Type_EOF:					$this->_readDefault();					break 2;
					default:									$this->_readDefault();					break;
				}

			}

			
			if (!$this->_readDataOnly && $this->_drawingData) {
				$Vnhm0uuykimvscherWorksheet = new PHPExcel_Shared_Escher();
				$Vlig2h1nz33u = new PHPExcel_Reader_Excel5_Escher($Vnhm0uuykimvscherWorksheet);
				$Vnhm0uuykimvscherWorksheet = $Vlig2h1nz33u->load($this->_drawingData);

				
				
				

				
				$Vcn3ow2vxaqw = $Vnhm0uuykimvscherWorksheet->getDgContainer()->getSpgrContainer()->getAllSpContainers();
			}

			
			foreach ($this->_objs as $Vmwwo1qnmepz => $Vxvi2fem1djf) {




				
				if (isset($Vcn3ow2vxaqw[$Vmwwo1qnmepz + 1]) && is_object($Vcn3ow2vxaqw[$Vmwwo1qnmepz + 1])) {
					$Vgizrbhnmsuq = $Vcn3ow2vxaqw[$Vmwwo1qnmepz + 1];

					
					if ($Vgizrbhnmsuq->getNestingLevel() > 1) {
						continue;
					}

					
					list($V4srf4uueq2t, $V5jh0lozltx0) = PHPExcel_Cell::coordinateFromString($Vgizrbhnmsuq->getStartCoordinates());
					list($Vnhm0uuykimvndColumn, $Vnhm0uuykimvndRow) = PHPExcel_Cell::coordinateFromString($Vgizrbhnmsuq->getEndCoordinates());

					$V3mz1f4hpcjp = $Vgizrbhnmsuq->getStartOffsetX();
					$Vzlq0iwdgyx5 = $Vgizrbhnmsuq->getStartOffsetY();
					$Vnhm0uuykimvndOffsetX = $Vgizrbhnmsuq->getEndOffsetX();
					$Vnhm0uuykimvndOffsetY = $Vgizrbhnmsuq->getEndOffsetY();

					$Vojs2qdgagwv = PHPExcel_Shared_Excel5::getDistanceX($this->_phpSheet, $V4srf4uueq2t, $V3mz1f4hpcjp, $Vnhm0uuykimvndColumn, $Vnhm0uuykimvndOffsetX);
					$Vzo4g5xb4yip = PHPExcel_Shared_Excel5::getDistanceY($this->_phpSheet, $V5jh0lozltx0, $Vzlq0iwdgyx5, $Vnhm0uuykimvndRow, $Vnhm0uuykimvndOffsetY);

					
					$Vsjv51hindtf = $V3mz1f4hpcjp * PHPExcel_Shared_Excel5::sizeCol($this->_phpSheet, $V4srf4uueq2t) / 1024;
					$Vpalzrg3mgla = $Vzlq0iwdgyx5 * PHPExcel_Shared_Excel5::sizeRow($this->_phpSheet, $V5jh0lozltx0) / 256;

					switch ($Vxvi2fem1djf['otObjType']) {
						case 0x19:
							



							if (isset($this->_cellNotes[$Vxvi2fem1djf['idObjID']])) {
								$Vm10nokiabom = $this->_cellNotes[$Vxvi2fem1djf['idObjID']];

								if (isset($this->_textObjects[$Vxvi2fem1djf['idObjID']])) {
									$V24anqsrfp4a = $this->_textObjects[$Vxvi2fem1djf['idObjID']];
									$this->_cellNotes[$Vxvi2fem1djf['idObjID']]['objTextData'] = $V24anqsrfp4a;
								}
							}
							break;

						case 0x08:

							

							
							$Vvf2ohp4no54 = $Vgizrbhnmsuq->getOPT(0x0104);
							$V2bj4bv0dh1q = $Vnhm0uuykimvscherWorkbook->getDggContainer()->getBstoreContainer()->getBSECollection();
							$Vop4lfjv2fwh = $V2bj4bv0dh1q[$Vvf2ohp4no54 - 1];
							$Vasfeb2o4zdr = $Vop4lfjv2fwh->getBlipType();

							
							if ($Va0n5zfcewok = $Vop4lfjv2fwh->getBlip()) {
								$Vwrd3zbtr2p0 = imagecreatefromstring($Va0n5zfcewok->getData());
								$V2jgycs0t2az = new PHPExcel_Worksheet_MemoryDrawing();
								$V2jgycs0t2az->setImageResource($Vwrd3zbtr2p0);

								
								$V2jgycs0t2az->setResizeProportional(false);
								$V2jgycs0t2az->setWidth($Vojs2qdgagwv);
								$V2jgycs0t2az->setHeight($Vzo4g5xb4yip);
								$V2jgycs0t2az->setOffsetX($Vsjv51hindtf);
								$V2jgycs0t2az->setOffsetY($Vpalzrg3mgla);

								switch ($Vasfeb2o4zdr) {
									case PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE::BLIPTYPE_JPEG:
										$V2jgycs0t2az->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
										$V2jgycs0t2az->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_JPEG);
										break;

									case PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE::BLIPTYPE_PNG:
										$V2jgycs0t2az->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
										$V2jgycs0t2az->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_PNG);
										break;
								}

								$V2jgycs0t2az->setWorksheet($this->_phpSheet);
								$V2jgycs0t2az->setCoordinates($Vgizrbhnmsuq->getStartCoordinates());
							}

							break;

						default:
							
							break;

					}
				}
			}

			
			if ($this->_version == self::XLS_BIFF8) {
				foreach ($this->_sharedFormulaParts as $Vblc1ueqvbti => $V4ptkkricfpr) {
					list($Vn4q2p4mkwa0, $Vexbtekafkvl) = PHPExcel_Cell::coordinateFromString($Vblc1ueqvbti);
					if (($this->getReadFilter() !== NULL) && $this->getReadFilter()->readCell($Vn4q2p4mkwa0, $Vexbtekafkvl, $this->_phpSheet->getTitle()) ) {
						$V22ivdjjfdx2 = $this->_getFormulaFromStructure($this->_sharedFormulas[$V4ptkkricfpr], $Vblc1ueqvbti);
						$this->_phpSheet->getCell($Vblc1ueqvbti)->setValueExplicit('=' . $V22ivdjjfdx2, PHPExcel_Cell_DataType::TYPE_FORMULA);
					}
				}
			}

			if (!empty($this->_cellNotes)) {
				foreach($this->_cellNotes as $Vmwwo1qnmepzote => $Vmwwo1qnmepzoteDetails) {
					if (!isset($Vmwwo1qnmepzoteDetails['objTextData'])) {
						if (isset($this->_textObjects[$Vmwwo1qnmepzote])) {
							$V24anqsrfp4a = $this->_textObjects[$Vmwwo1qnmepzote];
							$Vmwwo1qnmepzoteDetails['objTextData'] = $V24anqsrfp4a;
						} else {
							$Vmwwo1qnmepzoteDetails['objTextData']['text'] = '';
						}
					}



					$Vblc1ueqvbtiAddress = str_replace('$','',$Vmwwo1qnmepzoteDetails['cellRef']);
					$this->_phpSheet->getComment( $Vblc1ueqvbtiAddress )
													->setAuthor( $Vmwwo1qnmepzoteDetails['author'] )
													->setText($this->_parseRichText($Vmwwo1qnmepzoteDetails['objTextData']['text']) );
				}
			}
		}

		
		foreach ($this->_definedname as $Vidd2qyqjf54) {
			if ($Vidd2qyqjf54['isBuiltInName']) {
				switch ($Vidd2qyqjf54['name']) {

				case pack('C', 0x06):
					
					
					$Vvqg2eflwuxm = explode(',', $Vidd2qyqjf54['formula']); 

					$Vnhm0uuykimvxtractedRanges = array();
					foreach ($Vvqg2eflwuxm as $Votjg2jvcmjx) {
						
						
						

						$Vnhm0uuykimvxplodes = explode('!', $Votjg2jvcmjx);	
						$Vzg4jtrmmzdyName = trim($Vnhm0uuykimvxplodes[0], "'");

						if (count($Vnhm0uuykimvxplodes) == 2) {
							if (strpos($Vnhm0uuykimvxplodes[1], ':') === FALSE) {
								$Vnhm0uuykimvxplodes[1] = $Vnhm0uuykimvxplodes[1] . ':' . $Vnhm0uuykimvxplodes[1];
							}
							$Vnhm0uuykimvxtractedRanges[] = str_replace('$', '', $Vnhm0uuykimvxplodes[1]); 
						}
					}
					if ($Vu4dx5bdz5ui = $this->_phpExcel->getSheetByName($Vzg4jtrmmzdyName)) {
						$Vu4dx5bdz5ui->getPageSetup()->setPrintArea(implode(',', $Vnhm0uuykimvxtractedRanges)); 
					}
					break;

				case pack('C', 0x07):
					
					
					
					
					
					
					
					
					
					

					$Vvqg2eflwuxm = explode(',', $Vidd2qyqjf54['formula']); 

					foreach ($Vvqg2eflwuxm as $Votjg2jvcmjx) {
						
						
						

						$Vnhm0uuykimvxplodes = explode('!', $Votjg2jvcmjx);

						if (count($Vnhm0uuykimvxplodes) == 2) {
							if ($Vu4dx5bdz5ui = $this->_phpExcel->getSheetByName($Vnhm0uuykimvxplodes[0])) {

								$Vnhm0uuykimvxtractedRange = $Vnhm0uuykimvxplodes[1];
								$Vnhm0uuykimvxtractedRange = str_replace('$', '', $Vnhm0uuykimvxtractedRange);

								$Vtcbogrsip5w = explode(':', $Vnhm0uuykimvxtractedRange);
								if (count($Vtcbogrsip5w) == 2) {
									list($V5bk43ywa2ro, $Vm3gfxbdmev1) = PHPExcel_Cell::coordinateFromString($Vtcbogrsip5w[0]);
									list($Vo1bkmn2ufwz, $Vvgg1oj1qi44) = PHPExcel_Cell::coordinateFromString($Vtcbogrsip5w[1]);

									if ($V5bk43ywa2ro == 'A' and $Vo1bkmn2ufwz == 'IV') {
										
										$Vu4dx5bdz5ui->getPageSetup()->setRowsToRepeatAtTop(array($Vm3gfxbdmev1, $Vvgg1oj1qi44));
									} elseif ($Vm3gfxbdmev1 == 1 and $Vvgg1oj1qi44 == 65536) {
										
										$Vu4dx5bdz5ui->getPageSetup()->setColumnsToRepeatAtLeft(array($V5bk43ywa2ro, $Vo1bkmn2ufwz));
									}
								}
							}
						}
					}
					break;

				}
			} else {
				
				$Vnhm0uuykimvxplodes = explode('!', $Vidd2qyqjf54['formula']);

				if (count($Vnhm0uuykimvxplodes) == 2) {
					if (($Vu4dx5bdz5ui = $this->_phpExcel->getSheetByName($Vnhm0uuykimvxplodes[0])) ||
						($Vu4dx5bdz5ui = $this->_phpExcel->getSheetByName(trim($Vnhm0uuykimvxplodes[0],"'")))) {
						$Vnhm0uuykimvxtractedRange = $Vnhm0uuykimvxplodes[1];
						$Vnhm0uuykimvxtractedRange = str_replace('$', '', $Vnhm0uuykimvxtractedRange);

						$Vkqvbi5iml2o = ($Vidd2qyqjf54['scope'] == 0) ? false : true;

						$Vy3ih0q3qopd = ($Vidd2qyqjf54['scope'] == 0) ?
							null : $this->_phpExcel->getSheetByName($this->_sheets[$Vidd2qyqjf54['scope'] - 1]['name']);

						$this->_phpExcel->addNamedRange( new PHPExcel_NamedRange((string)$Vidd2qyqjf54['name'], $Vu4dx5bdz5ui, $Vnhm0uuykimvxtractedRange, $Vkqvbi5iml2o, $Vy3ih0q3qopd) );
					}
				} else {
					
					
				}
			}
		}
        $this->_data = null;

		return $this->_phpExcel;
	}
	
	
	private function _readRecordData($Vou4vxorrdoe, $Vv3hdohvn1hh, $Vtojwsl3m1uw)
	{
		$Vou4vxorrdoe = substr($Vou4vxorrdoe, $Vv3hdohvn1hh, $Vtojwsl3m1uw);
		
		
		if ($this->_encryption == self::MS_BIFF_CRYPTO_NONE || $Vv3hdohvn1hh < $this->_encryptionStartPos) {
			return $Vou4vxorrdoe;
		}
	
		$Vqcst2xnrxwx = '';
		if ($this->_encryption == self::MS_BIFF_CRYPTO_RC4) {

			$Vhiap4nitcvb = floor($this->_rc4Pos / self::REKEY_BLOCK);
			$V4uturqtpcq5 = floor($Vv3hdohvn1hh / self::REKEY_BLOCK);
			$Vnhm0uuykimvndBlock = floor(($Vv3hdohvn1hh + $Vtojwsl3m1uw) / self::REKEY_BLOCK);

			
			
			if ($V4uturqtpcq5 != $Vhiap4nitcvb || $Vv3hdohvn1hh < $this->_rc4Pos || !$this->_rc4Key) {
				$this->_rc4Key = $this->_makeKey($V4uturqtpcq5, $this->_md5Ctxt);
				$Vfo1uyyd2avs = $Vv3hdohvn1hh % self::REKEY_BLOCK;
			} else {
				$Vfo1uyyd2avs = $Vv3hdohvn1hh - $this->_rc4Pos;
			}
			$this->_rc4Key->RC4(str_repeat("\0", $Vfo1uyyd2avs));

			
			while ($V4uturqtpcq5 != $Vnhm0uuykimvndBlock) {
				$Vfo1uyyd2avs = self::REKEY_BLOCK - ($Vv3hdohvn1hh % self::REKEY_BLOCK);
				$Vqcst2xnrxwx .= $this->_rc4Key->RC4(substr($Vou4vxorrdoe, 0, $Vfo1uyyd2avs));
				$Vou4vxorrdoe = substr($Vou4vxorrdoe, $Vfo1uyyd2avs);
				$Vv3hdohvn1hh += $Vfo1uyyd2avs;
				$Vtojwsl3m1uw -= $Vfo1uyyd2avs;
				$V4uturqtpcq5++;
				$this->_rc4Key = $this->_makeKey($V4uturqtpcq5, $this->_md5Ctxt);
			}
			$Vqcst2xnrxwx .= $this->_rc4Key->RC4(substr($Vou4vxorrdoe, 0, $Vtojwsl3m1uw));

			
			
			$this->_rc4Pos = $Vv3hdohvn1hh + $Vtojwsl3m1uw;
			
		} elseif ($this->_encryption == self::MS_BIFF_CRYPTO_XOR) {
			throw new PHPExcel_Reader_Exception('XOr encryption not supported');
		}
		return $Vqcst2xnrxwx;
	}

	
	private function _loadOLE($V1tltbb5c5oc)
	{
		
		$Ve25fnp1s5uc = new PHPExcel_Shared_OLERead();

		
		$Ve3oeikqcm5n = $Ve25fnp1s5uc->read($V1tltbb5c5oc);
		
		$this->_data = $Ve25fnp1s5uc->getStream($Ve25fnp1s5uc->wrkbook);

		
		$this->_summaryInformation = $Ve25fnp1s5uc->getStream($Ve25fnp1s5uc->summaryInformation);

		
		$this->_documentSummaryInformation = $Ve25fnp1s5uc->getStream($Ve25fnp1s5uc->documentSummaryInformation);

		

	}


	
	private function _readSummaryInformation()
	{
		if (!isset($this->_summaryInformation)) {
			return;
		}

		
		
		
		
		
		
		$Vyc0rrfm0md4 = self::_GetInt4d($this->_summaryInformation, 24);

		
		
		$Vspmbcewsllk = self::_GetInt4d($this->_summaryInformation, 44);

		
		
		$Vj1ubkp0flds = self::_GetInt4d($this->_summaryInformation, $Vspmbcewsllk);

		
		$Vuuiluznqlc3 = self::_GetInt4d($this->_summaryInformation, $Vspmbcewsllk+4);

		
		$V0x4xt3l5phzPage = 'CP1252';

		
		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vuuiluznqlc3; ++$Vfhiq1lhsoja) {

			
			$Vfhiq1lhsojad = self::_GetInt4d($this->_summaryInformation, ($Vspmbcewsllk+8) + (8 * $Vfhiq1lhsoja));

			
			
			$Vortqlloirgz = self::_GetInt4d($this->_summaryInformation, ($Vspmbcewsllk+12) + (8 * $Vfhiq1lhsoja));

			$V4pigtpor0ln = self::_GetInt4d($this->_summaryInformation, $Vspmbcewsllk + $Vortqlloirgz);

			
			$Vp4xjtpabm0l = null;

			
			switch ($V4pigtpor0ln) {
				case 0x02: 
					$Vp4xjtpabm0l = self::_GetInt2d($this->_summaryInformation, $Vspmbcewsllk + 4 + $Vortqlloirgz);
					break;

				case 0x03: 
					$Vp4xjtpabm0l = self::_GetInt4d($this->_summaryInformation, $Vspmbcewsllk + 4 + $Vortqlloirgz);
					break;

				case 0x13: 
					
					break;

				case 0x1E: 
					$Vkxqn1k1kuxu = self::_GetInt4d($this->_summaryInformation, $Vspmbcewsllk + 4 + $Vortqlloirgz);
					$Vp4xjtpabm0l = substr($this->_summaryInformation, $Vspmbcewsllk + 8 + $Vortqlloirgz, $Vkxqn1k1kuxu);
					$Vp4xjtpabm0l = PHPExcel_Shared_String::ConvertEncoding($Vp4xjtpabm0l, 'UTF-8', $V0x4xt3l5phzPage);
					$Vp4xjtpabm0l = rtrim($Vp4xjtpabm0l);
					break;

				case 0x40: 
					
					$Vp4xjtpabm0l = PHPExcel_Shared_OLE::OLE2LocalDate(substr($this->_summaryInformation, $Vspmbcewsllk + 4 + $Vortqlloirgz, 8));
					break;

				case 0x47: 
					
					break;
			}

			switch ($Vfhiq1lhsojad) {
				case 0x01:	
					$V0x4xt3l5phzPage = PHPExcel_Shared_CodePage::NumberToName($Vp4xjtpabm0l);
					break;

				case 0x02:	
					$this->_phpExcel->getProperties()->setTitle($Vp4xjtpabm0l);
					break;

				case 0x03:	
					$this->_phpExcel->getProperties()->setSubject($Vp4xjtpabm0l);
					break;

				case 0x04:	
					$this->_phpExcel->getProperties()->setCreator($Vp4xjtpabm0l);
					break;

				case 0x05:	
					$this->_phpExcel->getProperties()->setKeywords($Vp4xjtpabm0l);
					break;

				case 0x06:	
					$this->_phpExcel->getProperties()->setDescription($Vp4xjtpabm0l);
					break;

				case 0x07:	
					
					break;

				case 0x08:	
					$this->_phpExcel->getProperties()->setLastModifiedBy($Vp4xjtpabm0l);
					break;

				case 0x09:	
					
					break;

				case 0x0A:	
					
					break;

				case 0x0B:	
					
					break;

				case 0x0C:	
					$this->_phpExcel->getProperties()->setCreated($Vp4xjtpabm0l);
					break;

				case 0x0D:	
					$this->_phpExcel->getProperties()->setModified($Vp4xjtpabm0l);
					break;

				case 0x0E:	
					
					break;

				case 0x0F:	
					
					break;

				case 0x10:	
					
					break;

				case 0x11:	
					
					break;

				case 0x12:	
					
					break;

				case 0x13:	
					
					break;

			}
		}
	}


	
	private function _readDocumentSummaryInformation()
	{
		if (!isset($this->_documentSummaryInformation)) {
			return;
		}

		
		
		
		
		
		
		$Vyc0rrfm0md4 = self::_GetInt4d($this->_documentSummaryInformation, 24);


		
		
		$Vspmbcewsllk = self::_GetInt4d($this->_documentSummaryInformation, 44);


		
		
		$Vj1ubkp0flds = self::_GetInt4d($this->_documentSummaryInformation, $Vspmbcewsllk);


		
		$Vuuiluznqlc3 = self::_GetInt4d($this->_documentSummaryInformation, $Vspmbcewsllk+4);


		
		$V0x4xt3l5phzPage = 'CP1252';

		
		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vuuiluznqlc3; ++$Vfhiq1lhsoja) {

			
			$Vfhiq1lhsojad = self::_GetInt4d($this->_documentSummaryInformation, ($Vspmbcewsllk+8) + (8 * $Vfhiq1lhsoja));


			
			
			$Vortqlloirgz = self::_GetInt4d($this->_documentSummaryInformation, ($Vspmbcewsllk+12) + (8 * $Vfhiq1lhsoja));

			$V4pigtpor0ln = self::_GetInt4d($this->_documentSummaryInformation, $Vspmbcewsllk + $Vortqlloirgz);


			
			$Vp4xjtpabm0l = null;

			
			switch ($V4pigtpor0ln) {
				case 0x02:	
					$Vp4xjtpabm0l = self::_GetInt2d($this->_documentSummaryInformation, $Vspmbcewsllk + 4 + $Vortqlloirgz);
					break;

				case 0x03:	
					$Vp4xjtpabm0l = self::_GetInt4d($this->_documentSummaryInformation, $Vspmbcewsllk + 4 + $Vortqlloirgz);
					break;

				case 0x0B:  
					$Vp4xjtpabm0l = self::_GetInt2d($this->_documentSummaryInformation, $Vspmbcewsllk + 4 + $Vortqlloirgz);
					$Vp4xjtpabm0l = ($Vp4xjtpabm0l == 0 ? false : true);
					break;

				case 0x13:	
					
					break;

				case 0x1E:	
					$Vkxqn1k1kuxu = self::_GetInt4d($this->_documentSummaryInformation, $Vspmbcewsllk + 4 + $Vortqlloirgz);
					$Vp4xjtpabm0l = substr($this->_documentSummaryInformation, $Vspmbcewsllk + 8 + $Vortqlloirgz, $Vkxqn1k1kuxu);
					$Vp4xjtpabm0l = PHPExcel_Shared_String::ConvertEncoding($Vp4xjtpabm0l, 'UTF-8', $V0x4xt3l5phzPage);
					$Vp4xjtpabm0l = rtrim($Vp4xjtpabm0l);
					break;

				case 0x40:	
					
					$Vp4xjtpabm0l = PHPExcel_Shared_OLE::OLE2LocalDate(substr($this->_documentSummaryInformation, $Vspmbcewsllk + 4 + $Vortqlloirgz, 8));
					break;

				case 0x47:	
					
					break;
			}

			switch ($Vfhiq1lhsojad) {
				case 0x01:	
					$V0x4xt3l5phzPage = PHPExcel_Shared_CodePage::NumberToName($Vp4xjtpabm0l);
					break;

				case 0x02:	
					$this->_phpExcel->getProperties()->setCategory($Vp4xjtpabm0l);
					break;

				case 0x03:	
					
					break;

				case 0x04:	
					
					break;

				case 0x05:	
					
					break;

				case 0x06:	
					
					break;

				case 0x07:	
					
					break;

				case 0x08:	
					
					break;

				case 0x09:	
					
					break;

				case 0x0A:	
					
					break;

				case 0x0B:	
					
					break;

				case 0x0C:	
					
					break;

				case 0x0D:	
					
					break;

				case 0x0E:	
					$this->_phpExcel->getProperties()->setManager($Vp4xjtpabm0l);
					break;

				case 0x0F:	
					$this->_phpExcel->getProperties()->setCompany($Vp4xjtpabm0l);
					break;

				case 0x10:	
					
					break;

			}
		}
	}


	
	private function _readDefault()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);


		
		$this->_pos += 4 + $Volq3gdvkuqp;
	}


	
	private function _readNote()
	{

		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if ($this->_readDataOnly) {
			return;
		}

		$Vblc1ueqvbtiAddress = $this->_readBIFF8CellAddress(substr($Vqcst2xnrxwx, 0, 4));
		if ($this->_version == self::XLS_BIFF8) {
			$Vmwwo1qnmepzoteObjID = self::_GetInt2d($Vqcst2xnrxwx, 6);
			$Vmwwo1qnmepzoteAuthor = self::_readUnicodeStringLong(substr($Vqcst2xnrxwx, 8));
			$Vmwwo1qnmepzoteAuthor = $Vmwwo1qnmepzoteAuthor['value'];




			$this->_cellNotes[$Vmwwo1qnmepzoteObjID] = array('cellRef'		=> $Vblc1ueqvbtiAddress,
												  'objectID'	=> $Vmwwo1qnmepzoteObjID,
												  'author'		=> $Vmwwo1qnmepzoteAuthor
												 );
		} else {
			$Vnhm0uuykimvxtension = false;
			if ($Vblc1ueqvbtiAddress == '$Vjd52v1uhh5z$65536') {
				
				
				
				$Vexbtekafkvl = self::_GetInt2d($Vqcst2xnrxwx, 0);
				$Vnhm0uuykimvxtension = true;
				$Vblc1ueqvbtiAddress = array_pop(array_keys($this->_phpSheet->getComments()));
			}


			$Vblc1ueqvbtiAddress = str_replace('$','',$Vblc1ueqvbtiAddress);
			$Vmwwo1qnmepzoteLength = self::_GetInt2d($Vqcst2xnrxwx, 4);
			$Vmwwo1qnmepzoteText = trim(substr($Vqcst2xnrxwx, 6));



			if ($Vnhm0uuykimvxtension) {
				
				$Vd25ttkxmgaf = $this->_phpSheet->getComment( $Vblc1ueqvbtiAddress );
				$Vd25ttkxmgafText = $Vd25ttkxmgaf->getText()->getPlainText();
				$Vd25ttkxmgaf->setText($this->_parseRichText($Vd25ttkxmgafText.$Vmwwo1qnmepzoteText) );
			} else {
				
				$this->_phpSheet->getComment( $Vblc1ueqvbtiAddress )

													->setText($this->_parseRichText($Vmwwo1qnmepzoteText) );
			}
		}

	}


	
	private function _readTextObject()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if ($this->_readDataOnly) {
			return;
		}

		
		
		
		
		
		
		$Vz50gauqtoeh	= self::_GetInt2d($Vqcst2xnrxwx, 0);
		$Vqiqitattd3d		= self::_GetInt2d($Vqcst2xnrxwx, 2);
		$V5fsvtzgnjzc	= self::_GetInt2d($Vqcst2xnrxwx, 10);
		$Voa0dy0rrexy		= self::_GetInt2d($Vqcst2xnrxwx, 12);
		$Vkjdq1foihhi		= $this->_getSplicedRecordData();

		$this->_textObjects[$this->textObjRef] = array(
				'text'		=> substr($Vkjdq1foihhi["recordData"],$Vkjdq1foihhi["spliceOffsets"][0]+1,$V5fsvtzgnjzc),
				'format'	=> substr($Vkjdq1foihhi["recordData"],$Vkjdq1foihhi["spliceOffsets"][1],$Voa0dy0rrexy),
				'alignment'	=> $Vz50gauqtoeh,
				'rotation'	=> $Vqiqitattd3d
			 );




	}


	
	private function _readBof()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = substr($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$V1vw5wtywv1j = self::_GetInt2d($Vqcst2xnrxwx, 2);

		switch ($V1vw5wtywv1j) {
			case self::XLS_WorkbookGlobals:
				$Vh51i5i4ai0v = self::_GetInt2d($Vqcst2xnrxwx, 0);
				if (($Vh51i5i4ai0v != self::XLS_BIFF8) && ($Vh51i5i4ai0v != self::XLS_BIFF7)) {
					throw new PHPExcel_Reader_Exception('Cannot read this Excel file. Version is too old.');
				}
				$this->_version = $Vh51i5i4ai0v;
				break;

			case self::XLS_Worksheet:
				
				
				break;

			default:
				
				
				do {
					$V0x4xt3l5phz = self::_GetInt2d($this->_data, $this->_pos);
					$this->_readDefault();
				} while ($V0x4xt3l5phz != self::XLS_Type_EOF && $this->_pos < $this->_dataSize);
				break;
		}
	}


	
	private function _readFilepass()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);

		if ($Volq3gdvkuqp != 54) {
			throw new PHPExcel_Reader_Exception('Unexpected file pass record length');
		}
		
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);
		
		
		$this->_pos += 4 + $Volq3gdvkuqp;
		
		if (!$this->_verifyPassword(
			'VelvetSweatshop',
			substr($Vqcst2xnrxwx, 6,  16),
			substr($Vqcst2xnrxwx, 22, 16),
			substr($Vqcst2xnrxwx, 38, 16),
			$this->_md5Ctxt
		)) {
			throw new PHPExcel_Reader_Exception('Decryption password incorrect');
		}
		
		$this->_encryption = self::MS_BIFF_CRYPTO_RC4;

		
		$this->_encryptionStartPos = $this->_pos + self::_GetInt2d($this->_data, $this->_pos + 2);
	}

	
	private function _makeKey($V4uturqtpcq5, $Vfia5f4ap12g)
	{
		$Vzw4rtnhbjw1 = str_repeat("\0", 64);

		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < 5; $Vfhiq1lhsoja++) {
			$Vzw4rtnhbjw1[$Vfhiq1lhsoja] = $Vfia5f4ap12g[$Vfhiq1lhsoja];
		}
		
		$Vzw4rtnhbjw1[5] = chr($V4uturqtpcq5 & 0xff);
		$Vzw4rtnhbjw1[6] = chr(($V4uturqtpcq5 >> 8) & 0xff);
		$Vzw4rtnhbjw1[7] = chr(($V4uturqtpcq5 >> 16) & 0xff);
		$Vzw4rtnhbjw1[8] = chr(($V4uturqtpcq5 >> 24) & 0xff);

		$Vzw4rtnhbjw1[9] = "\x80";
		$Vzw4rtnhbjw1[56] = "\x48";

		$Vxccq0hwzkdj = new PHPExcel_Reader_Excel5_MD5();
		$Vxccq0hwzkdj->add($Vzw4rtnhbjw1);

		$V2n430jknk35 = $Vxccq0hwzkdj->getContext();
		return new PHPExcel_Reader_Excel5_RC4($V2n430jknk35);
	}

	
	private function _verifyPassword($Vsnnardgofbr, $Vkxozryzvdk0, $V2n430jknk35alt_data, $V13p05eibgx3, &$Vfia5f4ap12g)
	{
		$Vzw4rtnhbjw1 = str_repeat("\0", 64);

		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < strlen($Vsnnardgofbr); $Vfhiq1lhsoja++) {
			$Vrs2mt5pfpsv = ord(substr($Vsnnardgofbr, $Vfhiq1lhsoja, 1));
			$Vzw4rtnhbjw1[2 * $Vfhiq1lhsoja] = chr($Vrs2mt5pfpsv & 0xff);
			$Vzw4rtnhbjw1[2 * $Vfhiq1lhsoja + 1] = chr(($Vrs2mt5pfpsv >> 8) & 0xff);
		}
		$Vzw4rtnhbjw1[2 * $Vfhiq1lhsoja] = chr(0x80);
		$Vzw4rtnhbjw1[56] = chr(($Vfhiq1lhsoja << 4) & 0xff);

		$Vxccq0hwzkdj = new PHPExcel_Reader_Excel5_MD5();
		$Vxccq0hwzkdj->add($Vzw4rtnhbjw1);

		$Vlsl4dxlzo02 = $Vxccq0hwzkdj->getContext();

		$Vortqlloirgz = 0;
		$V2vtythq4oph = 0;
		$Vydm35zyybyt = 5;

		$Vxccq0hwzkdj->reset();

		while ($Vortqlloirgz != 16) {
			if ((64 - $Vortqlloirgz) < 5) {
				$Vydm35zyybyt = 64 - $Vortqlloirgz;
			}
			
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja <= $Vydm35zyybyt; $Vfhiq1lhsoja++) {
				$Vzw4rtnhbjw1[$Vortqlloirgz + $Vfhiq1lhsoja] = $Vlsl4dxlzo02[$V2vtythq4oph + $Vfhiq1lhsoja];
			}

			$Vortqlloirgz += $Vydm35zyybyt;

			if ($Vortqlloirgz == 64) {
				$Vxccq0hwzkdj->add($Vzw4rtnhbjw1);
				$V2vtythq4oph = $Vydm35zyybyt;
				$Vydm35zyybyt = 5 - $Vydm35zyybyt;
				$Vortqlloirgz = 0;
				continue;
			}

			$V2vtythq4oph = 0;
			$Vydm35zyybyt = 5;
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < 16; $Vfhiq1lhsoja++) {
				$Vzw4rtnhbjw1[$Vortqlloirgz + $Vfhiq1lhsoja] = $Vkxozryzvdk0[$Vfhiq1lhsoja];
			}
			$Vortqlloirgz += 16;
		}

		$Vzw4rtnhbjw1[16] = "\x80";
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < 47; $Vfhiq1lhsoja++) {
			$Vzw4rtnhbjw1[17 + $Vfhiq1lhsoja] = "\0";
		}
		$Vzw4rtnhbjw1[56] = "\x80";
		$Vzw4rtnhbjw1[57] = "\x0a";

		$Vxccq0hwzkdj->add($Vzw4rtnhbjw1);
		$Vfia5f4ap12g = $Vxccq0hwzkdj->getContext();

		$Vseq1edikdvg = $this->_makeKey(0, $Vfia5f4ap12g);

		$V2n430jknk35alt = $Vseq1edikdvg->RC4($V2n430jknk35alt_data);
		$Vr4zje1f1u4t = $Vseq1edikdvg->RC4($V13p05eibgx3);
		
		$V2n430jknk35alt .= "\x80" . str_repeat("\0", 47);
		$V2n430jknk35alt[56] = "\x80";

		$Vxccq0hwzkdj->reset();
		$Vxccq0hwzkdj->add($V2n430jknk35alt);
		$Vyjoztse4b1p = $Vxccq0hwzkdj->getContext();

		return $Vyjoztse4b1p == $Vr4zje1f1u4t;
	}

	
	private function _readCodepage()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$V0x4xt3l5phzpage = self::_GetInt2d($Vqcst2xnrxwx, 0);

		$this->_codepage = PHPExcel_Shared_CodePage::NumberToName($V0x4xt3l5phzpage);
	}


	
	private function _readDateMode()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		PHPExcel_Shared_Date::setExcelCalendar(PHPExcel_Shared_Date::CALENDAR_WINDOWS_1900);
		if (ord($Vqcst2xnrxwx{0}) == 1) {
			PHPExcel_Shared_Date::setExcelCalendar(PHPExcel_Shared_Date::CALENDAR_MAC_1904);
		}
	}


	
	private function _readFont()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			$Vjcac4pcfq3x = new PHPExcel_Style_Font();

			
			$V2n430jknk35ize = self::_GetInt2d($Vqcst2xnrxwx, 0);
			$Vjcac4pcfq3x->setSize($V2n430jknk35ize / 20);

			
				
				
				$Vfhiq1lhsojasItalic = (0x0002 & self::_GetInt2d($Vqcst2xnrxwx, 2)) >> 1;
				if ($Vfhiq1lhsojasItalic) $Vjcac4pcfq3x->setItalic(true);

				
				
				$Vfhiq1lhsojasStrike = (0x0008 & self::_GetInt2d($Vqcst2xnrxwx, 2)) >> 3;
				if ($Vfhiq1lhsojasStrike) $Vjcac4pcfq3x->setStrikethrough(true);

			
			$Vl5jzlxo3j3nIndex = self::_GetInt2d($Vqcst2xnrxwx, 4);
			$Vjcac4pcfq3x->colorIndex = $Vl5jzlxo3j3nIndex;

			
			$Vqmxa0npsfod = self::_GetInt2d($Vqcst2xnrxwx, 6);
			switch ($Vqmxa0npsfod) {
				case 0x02BC:
					$Vjcac4pcfq3x->setBold(true);
					break;
			}

			
			$Vnhm0uuykimvscapement = self::_GetInt2d($Vqcst2xnrxwx, 8);
			switch ($Vnhm0uuykimvscapement) {
				case 0x0001:
					$Vjcac4pcfq3x->setSuperScript(true);
					break;
				case 0x0002:
					$Vjcac4pcfq3x->setSubScript(true);
					break;
			}

			
			$Vgdqzksjmb1c = ord($Vqcst2xnrxwx{10});
			switch ($Vgdqzksjmb1c) {
				case 0x00:
					break; 
				case 0x01:
					$Vjcac4pcfq3x->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
					break;
				case 0x02:
					$Vjcac4pcfq3x->setUnderline(PHPExcel_Style_Font::UNDERLINE_DOUBLE);
					break;
				case 0x21:
					$Vjcac4pcfq3x->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLEACCOUNTING);
					break;
				case 0x22:
					$Vjcac4pcfq3x->setUnderline(PHPExcel_Style_Font::UNDERLINE_DOUBLEACCOUNTING);
					break;
			}

			
			
			
			
			if ($this->_version == self::XLS_BIFF8) {
				$V2n430jknk35tring = self::_readUnicodeStringShort(substr($Vqcst2xnrxwx, 14));
			} else {
				$V2n430jknk35tring = $this->_readByteStringShort(substr($Vqcst2xnrxwx, 14));
			}
			$Vjcac4pcfq3x->setName($V2n430jknk35tring['value']);

			$this->_objFonts[] = $Vjcac4pcfq3x;
		}
	}


	
	private function _readFormat()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			$Vfhiq1lhsojandexCode = self::_GetInt2d($Vqcst2xnrxwx, 0);

			if ($this->_version == self::XLS_BIFF8) {
				$V2n430jknk35tring = self::_readUnicodeStringLong(substr($Vqcst2xnrxwx, 2));
			} else {
				
				$V2n430jknk35tring = $this->_readByteStringShort(substr($Vqcst2xnrxwx, 2));
			}

			$Vmejy2rjquxd = $V2n430jknk35tring['value'];
			$this->_formats[$Vfhiq1lhsojandexCode] = $Vmejy2rjquxd;
		}
	}


	
	private function _readXf()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		$Vcdr0zxxzggt = new PHPExcel_Style();

		if (!$this->_readDataOnly) {
			
			if (self::_GetInt2d($Vqcst2xnrxwx, 0) < 4) {
				$Vxxsicekb41s = self::_GetInt2d($Vqcst2xnrxwx, 0);
			} else {
				
				
				$Vxxsicekb41s = self::_GetInt2d($Vqcst2xnrxwx, 0) - 1;
			}
			$Vcdr0zxxzggt->setFont($this->_objFonts[$Vxxsicekb41s]);

			
			$Vmwwo1qnmepzumberFormatIndex = self::_GetInt2d($Vqcst2xnrxwx, 2);
			if (isset($this->_formats[$Vmwwo1qnmepzumberFormatIndex])) {
				
				$Vmwwo1qnmepzumberformat = array('code' => $this->_formats[$Vmwwo1qnmepzumberFormatIndex]);
			} elseif (($V0x4xt3l5phz = PHPExcel_Style_NumberFormat::builtInFormatCode($Vmwwo1qnmepzumberFormatIndex)) !== '') {
				
				$Vmwwo1qnmepzumberformat = array('code' => $V0x4xt3l5phz);
			} else {
				
				$Vmwwo1qnmepzumberformat = array('code' => 'General');
			}
			$Vcdr0zxxzggt->getNumberFormat()->setFormatCode($Vmwwo1qnmepzumberformat['code']);

			
			
			$Vwgec0bwmwce = self::_GetInt2d($Vqcst2xnrxwx, 4);
			
			$Vfhiq1lhsojasLocked = (0x01 & $Vwgec0bwmwce) >> 0;
			$Vcdr0zxxzggt->getProtection()->setLocked($Vfhiq1lhsojasLocked ?
				PHPExcel_Style_Protection::PROTECTION_INHERIT : PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);

			
			$Vfhiq1lhsojasHidden = (0x02 & $Vwgec0bwmwce) >> 1;
			$Vcdr0zxxzggt->getProtection()->setHidden($Vfhiq1lhsojasHidden ?
				PHPExcel_Style_Protection::PROTECTION_PROTECTED : PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);

			
			$Vfhiq1lhsojasCellStyleXf = (0x04 & $Vwgec0bwmwce) >> 2;

			
			
			$Vmpubpqjjet2 = (0x07 & ord($Vqcst2xnrxwx{6})) >> 0;
			switch ($Vmpubpqjjet2) {
				case 0:
					$Vcdr0zxxzggt->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_GENERAL);
					break;
				case 1:
					$Vcdr0zxxzggt->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
					break;
				case 2:
					$Vcdr0zxxzggt->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					break;
				case 3:
					$Vcdr0zxxzggt->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
					break;
				case 4:
					$Vcdr0zxxzggt->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_FILL);
					break;
				case 5:
					$Vcdr0zxxzggt->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
					break;
				case 6:
					$Vcdr0zxxzggt->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER_CONTINUOUS);
					break;
			}
			
			$V3qyauweddhf = (0x08 & ord($Vqcst2xnrxwx{6})) >> 3;
			switch ($V3qyauweddhf) {
				case 0:
					$Vcdr0zxxzggt->getAlignment()->setWrapText(false);
					break;
				case 1:
					$Vcdr0zxxzggt->getAlignment()->setWrapText(true);
					break;
			}
			
			$Vkz0ybgtgb4u = (0x70 & ord($Vqcst2xnrxwx{6})) >> 4;
			switch ($Vkz0ybgtgb4u) {
				case 0:
					$Vcdr0zxxzggt->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
					break;
				case 1:
					$Vcdr0zxxzggt->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					break;
				case 2:
					$Vcdr0zxxzggt->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
					break;
				case 3:
					$Vcdr0zxxzggt->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_JUSTIFY);
					break;
			}

			if ($this->_version == self::XLS_BIFF8) {
				
					$Vdbkfmikyl2i = ord($Vqcst2xnrxwx{7});
					$Vqiqitattd3dation = 0;
					if ($Vdbkfmikyl2i <= 90) {
						$Vqiqitattd3dation = $Vdbkfmikyl2i;
					} else if ($Vdbkfmikyl2i <= 180) {
						$Vqiqitattd3dation = 90 - $Vdbkfmikyl2i;
					} else if ($Vdbkfmikyl2i == 255) {
						$Vqiqitattd3dation = -165;
					}
					$Vcdr0zxxzggt->getAlignment()->setTextRotation($Vqiqitattd3dation);

				
					
					$Vfhiq1lhsojandent = (0x0F & ord($Vqcst2xnrxwx{8})) >> 0;
					$Vcdr0zxxzggt->getAlignment()->setIndent($Vfhiq1lhsojandent);

					
					$V2n430jknk35hrinkToFit = (0x10 & ord($Vqcst2xnrxwx{8})) >> 4;
					switch ($V2n430jknk35hrinkToFit) {
						case 0:
							$Vcdr0zxxzggt->getAlignment()->setShrinkToFit(false);
							break;
						case 1:
							$Vcdr0zxxzggt->getAlignment()->setShrinkToFit(true);
							break;
					}

				

				
					
					if ($Vpqv2g4vdvxv = self::_mapBorderStyle((0x0000000F & self::_GetInt4d($Vqcst2xnrxwx, 10)) >> 0)) {
						$Vcdr0zxxzggt->getBorders()->getLeft()->setBorderStyle($Vpqv2g4vdvxv);
					}
					
					if ($Vcgp5snih3s2 = self::_mapBorderStyle((0x000000F0 & self::_GetInt4d($Vqcst2xnrxwx, 10)) >> 4)) {
						$Vcdr0zxxzggt->getBorders()->getRight()->setBorderStyle($Vcgp5snih3s2);
					}
					
					if ($Vyhufpsdvvbz = self::_mapBorderStyle((0x00000F00 & self::_GetInt4d($Vqcst2xnrxwx, 10)) >> 8)) {
						$Vcdr0zxxzggt->getBorders()->getTop()->setBorderStyle($Vyhufpsdvvbz);
					}
					
					if ($Vbdpasjtv35s = self::_mapBorderStyle((0x0000F000 & self::_GetInt4d($Vqcst2xnrxwx, 10)) >> 12)) {
						$Vcdr0zxxzggt->getBorders()->getBottom()->setBorderStyle($Vbdpasjtv35s);
					}
					
					$Vcdr0zxxzggt->getBorders()->getLeft()->colorIndex = (0x007F0000 & self::_GetInt4d($Vqcst2xnrxwx, 10)) >> 16;

					
					$Vcdr0zxxzggt->getBorders()->getRight()->colorIndex = (0x3F800000 & self::_GetInt4d($Vqcst2xnrxwx, 10)) >> 23;

					
					$Vwdwytm4spp0Down = (0x40000000 & self::_GetInt4d($Vqcst2xnrxwx, 10)) >> 30 ?
						true : false;

					
					$Vwdwytm4spp0Up = (0x80000000 & self::_GetInt4d($Vqcst2xnrxwx, 10)) >> 31 ?
						true : false;

					if ($Vwdwytm4spp0Up == false && $Vwdwytm4spp0Down == false) {
						$Vcdr0zxxzggt->getBorders()->setDiagonalDirection(PHPExcel_Style_Borders::DIAGONAL_NONE);
					} elseif ($Vwdwytm4spp0Up == true && $Vwdwytm4spp0Down == false) {
						$Vcdr0zxxzggt->getBorders()->setDiagonalDirection(PHPExcel_Style_Borders::DIAGONAL_UP);
					} elseif ($Vwdwytm4spp0Up == false && $Vwdwytm4spp0Down == true) {
						$Vcdr0zxxzggt->getBorders()->setDiagonalDirection(PHPExcel_Style_Borders::DIAGONAL_DOWN);
					} elseif ($Vwdwytm4spp0Up == true && $Vwdwytm4spp0Down == true) {
						$Vcdr0zxxzggt->getBorders()->setDiagonalDirection(PHPExcel_Style_Borders::DIAGONAL_BOTH);
					}

				
					
					$Vcdr0zxxzggt->getBorders()->getTop()->colorIndex = (0x0000007F & self::_GetInt4d($Vqcst2xnrxwx, 14)) >> 0;

					
					$Vcdr0zxxzggt->getBorders()->getBottom()->colorIndex = (0x00003F80 & self::_GetInt4d($Vqcst2xnrxwx, 14)) >> 7;

					
					$Vcdr0zxxzggt->getBorders()->getDiagonal()->colorIndex = (0x001FC000 & self::_GetInt4d($Vqcst2xnrxwx, 14)) >> 14;

					
					if ($V2gib33ozsqp = self::_mapBorderStyle((0x01E00000 & self::_GetInt4d($Vqcst2xnrxwx, 14)) >> 21)) {
						$Vcdr0zxxzggt->getBorders()->getDiagonal()->setBorderStyle($V2gib33ozsqp);
					}

					
					if ($Vlljqdlim1qlType = self::_mapFillPattern((0xFC000000 & self::_GetInt4d($Vqcst2xnrxwx, 14)) >> 26)) {
						$Vcdr0zxxzggt->getFill()->setFillType($Vlljqdlim1qlType);
					}
				
					
					$Vcdr0zxxzggt->getFill()->startcolorIndex = (0x007F & self::_GetInt2d($Vqcst2xnrxwx, 18)) >> 0;

					
					$Vcdr0zxxzggt->getFill()->endcolorIndex = (0x3F80 & self::_GetInt2d($Vqcst2xnrxwx, 18)) >> 7;
			} else {
				

				
				$Vrs2mt5pfpsvrientationAndFlags = ord($Vqcst2xnrxwx{7});

				
				$V540mrx4i0vu = (0x03 & $Vrs2mt5pfpsvrientationAndFlags) >> 0;
				switch ($V540mrx4i0vu) {
					case 0:
						$Vcdr0zxxzggt->getAlignment()->setTextRotation(0);
						break;
					case 1:
						$Vcdr0zxxzggt->getAlignment()->setTextRotation(-165);
						break;
					case 2:
						$Vcdr0zxxzggt->getAlignment()->setTextRotation(90);
						break;
					case 3:
						$Vcdr0zxxzggt->getAlignment()->setTextRotation(-90);
						break;
				}

				
				$V3shkbvyekyu = self::_GetInt4d($Vqcst2xnrxwx, 8);

				
				$Vcdr0zxxzggt->getFill()->startcolorIndex = (0x0000007F & $V3shkbvyekyu) >> 0;

				
				$Vcdr0zxxzggt->getFill()->endcolorIndex = (0x00003F80 & $V3shkbvyekyu) >> 7;

				
				$Vcdr0zxxzggt->getFill()->setFillType(self::_mapFillPattern((0x003F0000 & $V3shkbvyekyu) >> 16));

				
				$Vcdr0zxxzggt->getBorders()->getBottom()->setBorderStyle(self::_mapBorderStyle((0x01C00000 & $V3shkbvyekyu) >> 22));

				
				$Vcdr0zxxzggt->getBorders()->getBottom()->colorIndex = (0xFE000000 & $V3shkbvyekyu) >> 25;

				
				$Vxgq1yp0411v = self::_GetInt4d($Vqcst2xnrxwx, 12);

				
				$Vcdr0zxxzggt->getBorders()->getTop()->setBorderStyle(self::_mapBorderStyle((0x00000007 & $Vxgq1yp0411v) >> 0));

				
				$Vcdr0zxxzggt->getBorders()->getLeft()->setBorderStyle(self::_mapBorderStyle((0x00000038 & $Vxgq1yp0411v) >> 3));

				
				$Vcdr0zxxzggt->getBorders()->getRight()->setBorderStyle(self::_mapBorderStyle((0x000001C0 & $Vxgq1yp0411v) >> 6));

				
				$Vcdr0zxxzggt->getBorders()->getTop()->colorIndex = (0x0000FE00 & $Vxgq1yp0411v) >> 9;

				
				$Vcdr0zxxzggt->getBorders()->getLeft()->colorIndex = (0x007F0000 & $Vxgq1yp0411v) >> 16;

				
				$Vcdr0zxxzggt->getBorders()->getRight()->colorIndex = (0x3F800000 & $Vxgq1yp0411v) >> 23;
			}

			
			if ($Vfhiq1lhsojasCellStyleXf) {
				
				if ($this->_xfIndex == 0) {
					$this->_phpExcel->addCellStyleXf($Vcdr0zxxzggt);
					$this->_mapCellStyleXfIndex[$this->_xfIndex] = 0;
				}
			} else {
				
				$this->_phpExcel->addCellXf($Vcdr0zxxzggt);
				$this->_mapCellXfIndex[$this->_xfIndex] = count($this->_phpExcel->getCellXfCollection()) - 1;
			}

			
			++$this->_xfIndex;
		}
	}


	
	private function _readXfExt()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			

			

			

			

			
			$Vfhiq1lhsojaxfe = self::_GetInt2d($Vqcst2xnrxwx, 14);

			

			
			$Vqfgoqq4vrkb = self::_GetInt2d($Vqcst2xnrxwx, 18);

			
			$Vortqlloirgz = 20;
			while ($Vortqlloirgz < $Volq3gdvkuqp) {
				
				$Vnhm0uuykimvxtType = self::_GetInt2d($Vqcst2xnrxwx, $Vortqlloirgz);

				
				$Vstfrw5akne1 = self::_GetInt2d($Vqcst2xnrxwx, $Vortqlloirgz + 2);

				
				$Vnhm0uuykimvxtData = substr($Vqcst2xnrxwx, $Vortqlloirgz + 4, $Vstfrw5akne1);

				switch ($Vnhm0uuykimvxtType) {
					case 4:		
						$V2baw2w1a4tr  = self::_GetInt2d($Vnhm0uuykimvxtData, 0); 
						$Vpv1geh1dt5x = substr($Vnhm0uuykimvxtData, 4, 4); 

						if ($V2baw2w1a4tr == 2) {
							$Vvw25icbq1yg = sprintf('%02X%02X%02X', ord($Vpv1geh1dt5x{0}), ord($Vpv1geh1dt5x{1}), ord($Vpv1geh1dt5x{2}));

							
							if ( isset($this->_mapCellXfIndex[$Vfhiq1lhsojaxfe]) ) {
								$Vlljqdlim1ql = $this->_phpExcel->getCellXfByIndex($this->_mapCellXfIndex[$Vfhiq1lhsojaxfe])->getFill();
								$Vlljqdlim1ql->getStartColor()->setRGB($Vvw25icbq1yg);
								unset($Vlljqdlim1ql->startcolorIndex); 
							}
						}
						break;

					case 5:		
						$V2baw2w1a4tr  = self::_GetInt2d($Vnhm0uuykimvxtData, 0); 
						$Vpv1geh1dt5x = substr($Vnhm0uuykimvxtData, 4, 4); 

						if ($V2baw2w1a4tr == 2) {
							$Vvw25icbq1yg = sprintf('%02X%02X%02X', ord($Vpv1geh1dt5x{0}), ord($Vpv1geh1dt5x{1}), ord($Vpv1geh1dt5x{2}));

							
							if ( isset($this->_mapCellXfIndex[$Vfhiq1lhsojaxfe]) ) {
								$Vlljqdlim1ql = $this->_phpExcel->getCellXfByIndex($this->_mapCellXfIndex[$Vfhiq1lhsojaxfe])->getFill();
								$Vlljqdlim1ql->getEndColor()->setRGB($Vvw25icbq1yg);
								unset($Vlljqdlim1ql->endcolorIndex); 
							}
						}
						break;

					case 7:		
						$V2baw2w1a4tr  = self::_GetInt2d($Vnhm0uuykimvxtData, 0); 
						$Vpv1geh1dt5x = substr($Vnhm0uuykimvxtData, 4, 4); 

						if ($V2baw2w1a4tr == 2) {
							$Vvw25icbq1yg = sprintf('%02X%02X%02X', ord($Vpv1geh1dt5x{0}), ord($Vpv1geh1dt5x{1}), ord($Vpv1geh1dt5x{2}));

							
							if ( isset($this->_mapCellXfIndex[$Vfhiq1lhsojaxfe]) ) {
								$Vrveb1xz24qu = $this->_phpExcel->getCellXfByIndex($this->_mapCellXfIndex[$Vfhiq1lhsojaxfe])->getBorders()->getTop();
								$Vrveb1xz24qu->getColor()->setRGB($Vvw25icbq1yg);
								unset($Vrveb1xz24qu->colorIndex); 
							}
						}
						break;

					case 8:		
						$V2baw2w1a4tr  = self::_GetInt2d($Vnhm0uuykimvxtData, 0); 
						$Vpv1geh1dt5x = substr($Vnhm0uuykimvxtData, 4, 4); 

						if ($V2baw2w1a4tr == 2) {
							$Vvw25icbq1yg = sprintf('%02X%02X%02X', ord($Vpv1geh1dt5x{0}), ord($Vpv1geh1dt5x{1}), ord($Vpv1geh1dt5x{2}));

							
							if ( isset($this->_mapCellXfIndex[$Vfhiq1lhsojaxfe]) ) {
								$Vyzmqhafpy0b = $this->_phpExcel->getCellXfByIndex($this->_mapCellXfIndex[$Vfhiq1lhsojaxfe])->getBorders()->getBottom();
								$Vyzmqhafpy0b->getColor()->setRGB($Vvw25icbq1yg);
								unset($Vyzmqhafpy0b->colorIndex); 
							}
						}
						break;

					case 9:		
						$V2baw2w1a4tr  = self::_GetInt2d($Vnhm0uuykimvxtData, 0); 
						$Vpv1geh1dt5x = substr($Vnhm0uuykimvxtData, 4, 4); 

						if ($V2baw2w1a4tr == 2) {
							$Vvw25icbq1yg = sprintf('%02X%02X%02X', ord($Vpv1geh1dt5x{0}), ord($Vpv1geh1dt5x{1}), ord($Vpv1geh1dt5x{2}));

							
							if ( isset($this->_mapCellXfIndex[$Vfhiq1lhsojaxfe]) ) {
								$Vrce0gsxjgkc = $this->_phpExcel->getCellXfByIndex($this->_mapCellXfIndex[$Vfhiq1lhsojaxfe])->getBorders()->getLeft();
								$Vrce0gsxjgkc->getColor()->setRGB($Vvw25icbq1yg);
								unset($Vrce0gsxjgkc->colorIndex); 
							}
						}
						break;

					case 10:		
						$V2baw2w1a4tr  = self::_GetInt2d($Vnhm0uuykimvxtData, 0); 
						$Vpv1geh1dt5x = substr($Vnhm0uuykimvxtData, 4, 4); 

						if ($V2baw2w1a4tr == 2) {
							$Vvw25icbq1yg = sprintf('%02X%02X%02X', ord($Vpv1geh1dt5x{0}), ord($Vpv1geh1dt5x{1}), ord($Vpv1geh1dt5x{2}));

							
							if ( isset($this->_mapCellXfIndex[$Vfhiq1lhsojaxfe]) ) {
								$Vqyn43hpxtm0 = $this->_phpExcel->getCellXfByIndex($this->_mapCellXfIndex[$Vfhiq1lhsojaxfe])->getBorders()->getRight();
								$Vqyn43hpxtm0->getColor()->setRGB($Vvw25icbq1yg);
								unset($Vqyn43hpxtm0->colorIndex); 
							}
						}
						break;

					case 11:		
						$V2baw2w1a4tr  = self::_GetInt2d($Vnhm0uuykimvxtData, 0); 
						$Vpv1geh1dt5x = substr($Vnhm0uuykimvxtData, 4, 4); 

						if ($V2baw2w1a4tr == 2) {
							$Vvw25icbq1yg = sprintf('%02X%02X%02X', ord($Vpv1geh1dt5x{0}), ord($Vpv1geh1dt5x{1}), ord($Vpv1geh1dt5x{2}));

							
							if ( isset($this->_mapCellXfIndex[$Vfhiq1lhsojaxfe]) ) {
								$Vwdwytm4spp0 = $this->_phpExcel->getCellXfByIndex($this->_mapCellXfIndex[$Vfhiq1lhsojaxfe])->getBorders()->getDiagonal();
								$Vwdwytm4spp0->getColor()->setRGB($Vvw25icbq1yg);
								unset($Vwdwytm4spp0->colorIndex); 
							}
						}
						break;

					case 13:	
						$V2baw2w1a4tr  = self::_GetInt2d($Vnhm0uuykimvxtData, 0); 
						$Vpv1geh1dt5x = substr($Vnhm0uuykimvxtData, 4, 4); 

						if ($V2baw2w1a4tr == 2) {
							$Vvw25icbq1yg = sprintf('%02X%02X%02X', ord($Vpv1geh1dt5x{0}), ord($Vpv1geh1dt5x{1}), ord($Vpv1geh1dt5x{2}));

							
							if ( isset($this->_mapCellXfIndex[$Vfhiq1lhsojaxfe]) ) {
								$Vj0kojsfk0h3 = $this->_phpExcel->getCellXfByIndex($this->_mapCellXfIndex[$Vfhiq1lhsojaxfe])->getFont();
								$Vj0kojsfk0h3->getColor()->setRGB($Vvw25icbq1yg);
								unset($Vj0kojsfk0h3->colorIndex); 
							}
						}
						break;
				}

				$Vortqlloirgz += $Vstfrw5akne1;
			}
		}

	}


	
	private function _readStyle()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			$Vfhiq1lhsojaxfe = self::_GetInt2d($Vqcst2xnrxwx, 0);

			
			$V4de3455flza = (0x0FFF & $Vfhiq1lhsojaxfe) >> 0;

			
			$Vfhiq1lhsojasBuiltIn = (bool) ((0x8000 & $Vfhiq1lhsojaxfe) >> 15);

			if ($Vfhiq1lhsojasBuiltIn) {
				
				$Vcn0zqo2102b = ord($Vqcst2xnrxwx{2});

				switch ($Vcn0zqo2102b) {
				case 0x00:
					
					break;

				default:
					break;
				}

			} else {
				
			}
		}
	}


	
	private function _readPalette()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			$Vmwwo1qnmepzm = self::_GetInt2d($Vqcst2xnrxwx, 0);

			
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vmwwo1qnmepzm; ++$Vfhiq1lhsoja) {
				$Vvw25icbq1yg = substr($Vqcst2xnrxwx, 2 + 4 * $Vfhiq1lhsoja, 4);
				$this->_palette[] = self::_readRGB($Vvw25icbq1yg);
			}
		}
	}


	
	private function _readSheet()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		
		$Vxes3dxfqowv = self::_GetInt4d($this->_data, $this->_pos + 4);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		switch (ord($Vqcst2xnrxwx{4})) {
			case 0x00: $Vzg4jtrmmzdyState = PHPExcel_Worksheet::SHEETSTATE_VISIBLE;    break;
			case 0x01: $Vzg4jtrmmzdyState = PHPExcel_Worksheet::SHEETSTATE_HIDDEN;     break;
			case 0x02: $Vzg4jtrmmzdyState = PHPExcel_Worksheet::SHEETSTATE_VERYHIDDEN; break;
			default: $Vzg4jtrmmzdyState = PHPExcel_Worksheet::SHEETSTATE_VISIBLE;      break;
		}

		
		$Vzg4jtrmmzdyType = ord($Vqcst2xnrxwx{5});

		
		if ($this->_version == self::XLS_BIFF8) {
			$V2n430jknk35tring = self::_readUnicodeStringShort(substr($Vqcst2xnrxwx, 6));
			$Vetwwnjloxsu = $V2n430jknk35tring['value'];
		} elseif ($this->_version == self::XLS_BIFF7) {
			$V2n430jknk35tring = $this->_readByteStringShort(substr($Vqcst2xnrxwx, 6));
			$Vetwwnjloxsu = $V2n430jknk35tring['value'];
		}

		$this->_sheets[] = array(
			'name' => $Vetwwnjloxsu,
			'offset' => $Vxes3dxfqowv,
			'sheetState' => $Vzg4jtrmmzdyState,
			'sheetType' => $Vzg4jtrmmzdyType,
		);
	}


	
	private function _readExternalBook()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$Vortqlloirgz = 0;

		
		if (strlen($Vqcst2xnrxwx) > 4) {
			
			
			$Vmwwo1qnmepzm = self::_GetInt2d($Vqcst2xnrxwx, 0);
			$Vortqlloirgz += 2;

			
			$Vnhm0uuykimvncodedUrlString = self::_readUnicodeStringLong(substr($Vqcst2xnrxwx, 2));
			$Vortqlloirgz += $Vnhm0uuykimvncodedUrlString['size'];

			
			$Vnhm0uuykimvxternalSheetNames = array();
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vmwwo1qnmepzm; ++$Vfhiq1lhsoja) {
				$Vnhm0uuykimvxternalSheetNameString = self::_readUnicodeStringLong(substr($Vqcst2xnrxwx, $Vortqlloirgz));
				$Vnhm0uuykimvxternalSheetNames[] = $Vnhm0uuykimvxternalSheetNameString['value'];
				$Vortqlloirgz += $Vnhm0uuykimvxternalSheetNameString['size'];
			}

			
			$this->_externalBooks[] = array(
				'type' => 'external',
				'encodedUrl' => $Vnhm0uuykimvncodedUrlString['value'],
				'externalSheetNames' => $Vnhm0uuykimvxternalSheetNames,
			);

		} elseif (substr($Vqcst2xnrxwx, 2, 2) == pack('CC', 0x01, 0x04)) {
			
			
			
			$this->_externalBooks[] = array(
				'type' => 'internal',
			);
		} elseif (substr($Vqcst2xnrxwx, 0, 4) == pack('vCC', 0x0001, 0x01, 0x3A)) {
			
			
			$this->_externalBooks[] = array(
				'type' => 'addInFunction',
			);
		} elseif (substr($Vqcst2xnrxwx, 0, 2) == pack('v', 0x0000)) {
			
			
			
			$this->_externalBooks[] = array(
				'type' => 'DDEorOLE',
			);
		}
	}


	
	private function _readExternName()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		if ($this->_version == self::XLS_BIFF8) {
			
			$Vrs2mt5pfpsvptions = self::_GetInt2d($Vqcst2xnrxwx, 0);

			

			

			
			$Vmwwo1qnmepzameString = self::_readUnicodeStringShort(substr($Vqcst2xnrxwx, 6));

			
			$Vortqlloirgz = 6 + $Vmwwo1qnmepzameString['size'];
			$V22ivdjjfdx2 = $this->_getFormulaFromStructure(substr($Vqcst2xnrxwx, $Vortqlloirgz));

			$this->_externalNames[] = array(
				'name' => $Vmwwo1qnmepzameString['value'],
				'formula' => $V22ivdjjfdx2,
			);
		}
	}


	
	private function _readExternSheet()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		if ($this->_version == self::XLS_BIFF8) {
			
			$Vmwwo1qnmepzm = self::_GetInt2d($Vqcst2xnrxwx, 0);
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vmwwo1qnmepzm; ++$Vfhiq1lhsoja) {
				$this->_ref[] = array(
					
					'externalBookIndex' => self::_GetInt2d($Vqcst2xnrxwx, 2 + 6 * $Vfhiq1lhsoja),
					
					'firstSheetIndex' => self::_GetInt2d($Vqcst2xnrxwx, 4 + 6 * $Vfhiq1lhsoja),
					
					'lastSheetIndex' => self::_GetInt2d($Vqcst2xnrxwx, 6 + 6 * $Vfhiq1lhsoja),
				);
			}
		}
	}


	
	private function _readDefinedName()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if ($this->_version == self::XLS_BIFF8) {
			

			
			$Vrs2mt5pfpsvpts = self::_GetInt2d($Vqcst2xnrxwx, 0);

				
				$Vfhiq1lhsojasBuiltInName = (0x0020 & $Vrs2mt5pfpsvpts) >> 5;

			

			
			$Vmwwo1qnmepzlen = ord($Vqcst2xnrxwx{3});

			
			
			$V44clyk4fhau = self::_GetInt2d($Vqcst2xnrxwx, 4);

			
			$Vy3ih0q3qopd = self::_GetInt2d($Vqcst2xnrxwx, 8);

			
			$V2n430jknk35tring = self::_readUnicodeString(substr($Vqcst2xnrxwx, 14), $Vmwwo1qnmepzlen);

			
			$Vortqlloirgz = 14 + $V2n430jknk35tring['size'];
			$V22ivdjjfdx2Structure = pack('v', $V44clyk4fhau) . substr($Vqcst2xnrxwx, $Vortqlloirgz);

			try {
				$V22ivdjjfdx2 = $this->_getFormulaFromStructure($V22ivdjjfdx2Structure);
			} catch (PHPExcel_Exception $Vnhm0uuykimv) {
				$V22ivdjjfdx2 = '';
			}

			$this->_definedname[] = array(
				'isBuiltInName' => $Vfhiq1lhsojasBuiltInName,
				'name' => $V2n430jknk35tring['value'],
				'formula' => $V22ivdjjfdx2,
				'scope' => $Vy3ih0q3qopd,
			);
		}
	}


	
	private function _readMsoDrawingGroup()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);

		
		$V2n430jknk35plicedRecordData = $this->_getSplicedRecordData();
		$Vqcst2xnrxwx = $V2n430jknk35plicedRecordData['recordData'];

		$this->_drawingGroupData .= $Vqcst2xnrxwx;
	}


	
	private function _readSst()
	{
		
		$Vv3hdohvn1hh = 0;

		
		$V2n430jknk35plicedRecordData = $this->_getSplicedRecordData();

		$Vqcst2xnrxwx = $V2n430jknk35plicedRecordData['recordData'];
		$V2n430jknk35pliceOffsets = $V2n430jknk35plicedRecordData['spliceOffsets'];

		
		$Vv3hdohvn1hh += 4;

		
		$Vmwwo1qnmepzm = self::_GetInt4d($Vqcst2xnrxwx, 4);
		$Vv3hdohvn1hh += 4;

		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vmwwo1qnmepzm; ++$Vfhiq1lhsoja) {

			
			$Vmwwo1qnmepzumChars = self::_GetInt2d($Vqcst2xnrxwx, $Vv3hdohvn1hh);
			$Vv3hdohvn1hh += 2;

			
			$Vrs2mt5pfpsvptionFlags = ord($Vqcst2xnrxwx{$Vv3hdohvn1hh});
			++$Vv3hdohvn1hh;

			
			$Vfhiq1lhsojasCompressed = (($Vrs2mt5pfpsvptionFlags & 0x01) == 0) ;

			
			$Vempet02mvuf = (($Vrs2mt5pfpsvptionFlags & 0x04) != 0);

			
			$Vehofxh010es = (($Vrs2mt5pfpsvptionFlags & 0x08) != 0);

			if ($Vehofxh010es) {
				
				$Vb5kyb5523ta = self::_GetInt2d($Vqcst2xnrxwx, $Vv3hdohvn1hh);
				$Vv3hdohvn1hh += 2;
			}

			if ($Vempet02mvuf) {
				
				$Vnhm0uuykimvxtendedRunLength = self::_GetInt4d($Vqcst2xnrxwx, $Vv3hdohvn1hh);
				$Vv3hdohvn1hh += 4;
			}

			
			$Vtojwsl3m1uw = ($Vfhiq1lhsojasCompressed) ? $Vmwwo1qnmepzumChars : $Vmwwo1qnmepzumChars * 2;

			
			foreach ($V2n430jknk35pliceOffsets as $V2n430jknk35pliceOffset) {
				
				
				if ($Vv3hdohvn1hh <= $V2n430jknk35pliceOffset) {
					$Vurecpnzyv0c = $V2n430jknk35pliceOffset;
					break;
				}
			}

			if ($Vv3hdohvn1hh + $Vtojwsl3m1uw <= $Vurecpnzyv0c) {
				

				$V5nbtytpqp4a = substr($Vqcst2xnrxwx, $Vv3hdohvn1hh, $Vtojwsl3m1uw);
				$Vv3hdohvn1hh += $Vtojwsl3m1uw;

			} else {
				

				
				$V5nbtytpqp4a = substr($Vqcst2xnrxwx, $Vv3hdohvn1hh, $Vurecpnzyv0c - $Vv3hdohvn1hh);

				$Vj0qvq5gpltz = $Vurecpnzyv0c - $Vv3hdohvn1hh;

				
				$Vet0nzkmzytf = $Vmwwo1qnmepzumChars - (($Vfhiq1lhsojasCompressed) ? $Vj0qvq5gpltz : ($Vj0qvq5gpltz / 2));

				$Vv3hdohvn1hh = $Vurecpnzyv0c;

				
				while ($Vet0nzkmzytf > 0) {

					
					foreach ($V2n430jknk35pliceOffsets as $V2n430jknk35pliceOffset) {
						if ($Vv3hdohvn1hh < $V2n430jknk35pliceOffset) {
							$Vurecpnzyv0c = $V2n430jknk35pliceOffset;
							break;
						}
					}

					
					
					$Vrs2mt5pfpsvption = ord($Vqcst2xnrxwx{$Vv3hdohvn1hh});
					++$Vv3hdohvn1hh;

					if ($Vfhiq1lhsojasCompressed && ($Vrs2mt5pfpsvption == 0)) {
						
						
						$Vtojwsl3m1uw = min($Vet0nzkmzytf, $Vurecpnzyv0c - $Vv3hdohvn1hh);
						$V5nbtytpqp4a .= substr($Vqcst2xnrxwx, $Vv3hdohvn1hh, $Vtojwsl3m1uw);
						$Vet0nzkmzytf -= $Vtojwsl3m1uw;
						$Vfhiq1lhsojasCompressed = true;

					} elseif (!$Vfhiq1lhsojasCompressed && ($Vrs2mt5pfpsvption != 0)) {
						
						
						$Vtojwsl3m1uw = min($Vet0nzkmzytf * 2, $Vurecpnzyv0c - $Vv3hdohvn1hh);
						$V5nbtytpqp4a .= substr($Vqcst2xnrxwx, $Vv3hdohvn1hh, $Vtojwsl3m1uw);
						$Vet0nzkmzytf -= $Vtojwsl3m1uw / 2;
						$Vfhiq1lhsojasCompressed = false;

					} elseif (!$Vfhiq1lhsojasCompressed && ($Vrs2mt5pfpsvption == 0)) {
						
						
						$Vtojwsl3m1uw = min($Vet0nzkmzytf, $Vurecpnzyv0c - $Vv3hdohvn1hh);
						for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vtojwsl3m1uw; ++$Vzmnqyqjjodw) {
							$V5nbtytpqp4a .= $Vqcst2xnrxwx{$Vv3hdohvn1hh + $Vzmnqyqjjodw} . chr(0);
						}
						$Vet0nzkmzytf -= $Vtojwsl3m1uw;
						$Vfhiq1lhsojasCompressed = false;

					} else {
						
						
						$Vmwwo1qnmepzewstr = '';
						for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < strlen($V5nbtytpqp4a); ++$Vzmnqyqjjodw) {
							$Vmwwo1qnmepzewstr .= $V5nbtytpqp4a[$Vzmnqyqjjodw] . chr(0);
						}
						$V5nbtytpqp4a = $Vmwwo1qnmepzewstr;
						$Vtojwsl3m1uw = min($Vet0nzkmzytf * 2, $Vurecpnzyv0c - $Vv3hdohvn1hh);
						$V5nbtytpqp4a .= substr($Vqcst2xnrxwx, $Vv3hdohvn1hh, $Vtojwsl3m1uw);
						$Vet0nzkmzytf -= $Vtojwsl3m1uw / 2;
						$Vfhiq1lhsojasCompressed = false;
					}

					$Vv3hdohvn1hh += $Vtojwsl3m1uw;
				}
			}

			
			$V5nbtytpqp4a = self::_encodeUTF16($V5nbtytpqp4a, $Vfhiq1lhsojasCompressed);

			
			$V4kpsemxwyzc = array();
			if ($Vehofxh010es) {
				
				for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vb5kyb5523ta; ++$Vzmnqyqjjodw) {
					
					$V5tk0vbynhsd = self::_GetInt2d($Vqcst2xnrxwx, $Vv3hdohvn1hh + $Vzmnqyqjjodw * 4);

					
					$Vxxsicekb41s = self::_GetInt2d($Vqcst2xnrxwx, $Vv3hdohvn1hh + 2 + $Vzmnqyqjjodw * 4);

					$V4kpsemxwyzc[] = array(
						'charPos' => $V5tk0vbynhsd,
						'fontIndex' => $Vxxsicekb41s,
					);
				}
				$Vv3hdohvn1hh += 4 * $Vb5kyb5523ta;
			}

			
			if ($Vempet02mvuf) {
				
				$Vv3hdohvn1hh += $Vnhm0uuykimvxtendedRunLength;
			}

			
			$this->_sst[] = array(
				'value' => $V5nbtytpqp4a,
				'fmtRuns' => $V4kpsemxwyzc,
			);
		}

		
	}


	
	private function _readPrintGridlines()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if ($this->_version == self::XLS_BIFF8 && !$this->_readDataOnly) {
			
			$Vs0zgo20b0iz = (bool) self::_GetInt2d($Vqcst2xnrxwx, 0);
			$this->_phpSheet->setPrintGridlines($Vs0zgo20b0iz);
		}
	}


	
	private function _readDefaultRowHeight()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		
		$Vzo4g5xb4yip = self::_GetInt2d($Vqcst2xnrxwx, 2);
		$this->_phpSheet->getDefaultRowDimension()->setRowHeight($Vzo4g5xb4yip / 20);
	}


	
	private function _readSheetPr()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		

		
		$Vfhiq1lhsojasSummaryBelow = (0x0040 & self::_GetInt2d($Vqcst2xnrxwx, 0)) >> 6;
		$this->_phpSheet->setShowSummaryBelow($Vfhiq1lhsojasSummaryBelow);

		
		$Vfhiq1lhsojasSummaryRight = (0x0080 & self::_GetInt2d($Vqcst2xnrxwx, 0)) >> 7;
		$this->_phpSheet->setShowSummaryRight($Vfhiq1lhsojasSummaryRight);

		
		
		$this->_isFitToPages = (bool) ((0x0100 & self::_GetInt2d($Vqcst2xnrxwx, 0)) >> 8);
	}


	
	private function _readHorizontalPageBreaks()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if ($this->_version == self::XLS_BIFF8 && !$this->_readDataOnly) {

			
			$Vmwwo1qnmepzm = self::_GetInt2d($Vqcst2xnrxwx, 0);

			
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vmwwo1qnmepzm; ++$Vfhiq1lhsoja) {
				$Vws44nszhvgo = self::_GetInt2d($Vqcst2xnrxwx, 2 + 6 * $Vfhiq1lhsoja);
				$Vxtnh2mt3dyh = self::_GetInt2d($Vqcst2xnrxwx, 2 + 6 * $Vfhiq1lhsoja + 2);
				$Vwkklau0h0v4 = self::_GetInt2d($Vqcst2xnrxwx, 2 + 6 * $Vfhiq1lhsoja + 4);

				
				$this->_phpSheet->setBreakByColumnAndRow($Vxtnh2mt3dyh, $Vws44nszhvgo, PHPExcel_Worksheet::BREAK_ROW);
			}
		}
	}


	
	private function _readVerticalPageBreaks()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if ($this->_version == self::XLS_BIFF8 && !$this->_readDataOnly) {
			
			$Vmwwo1qnmepzm = self::_GetInt2d($Vqcst2xnrxwx, 0);

			
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vmwwo1qnmepzm; ++$Vfhiq1lhsoja) {
				$V4y0urwpnd3j = self::_GetInt2d($Vqcst2xnrxwx, 2 + 6 * $Vfhiq1lhsoja);
				$Vws44nszhvgof = self::_GetInt2d($Vqcst2xnrxwx, 2 + 6 * $Vfhiq1lhsoja + 2);
				$Vws44nszhvgol = self::_GetInt2d($Vqcst2xnrxwx, 2 + 6 * $Vfhiq1lhsoja + 4);

				
				$this->_phpSheet->setBreakByColumnAndRow($V4y0urwpnd3j, $Vws44nszhvgof, PHPExcel_Worksheet::BREAK_COLUMN);
			}
		}
	}


	
	private function _readHeader()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			
			if ($Vqcst2xnrxwx) {
				if ($this->_version == self::XLS_BIFF8) {
					$V2n430jknk35tring = self::_readUnicodeStringLong($Vqcst2xnrxwx);
				} else {
					$V2n430jknk35tring = $this->_readByteStringShort($Vqcst2xnrxwx);
				}

				$this->_phpSheet->getHeaderFooter()->setOddHeader($V2n430jknk35tring['value']);
				$this->_phpSheet->getHeaderFooter()->setEvenHeader($V2n430jknk35tring['value']);
			}
		}
	}


	
	private function _readFooter()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			
			if ($Vqcst2xnrxwx) {
				if ($this->_version == self::XLS_BIFF8) {
					$V2n430jknk35tring = self::_readUnicodeStringLong($Vqcst2xnrxwx);
				} else {
					$V2n430jknk35tring = $this->_readByteStringShort($Vqcst2xnrxwx);
				}
				$this->_phpSheet->getHeaderFooter()->setOddFooter($V2n430jknk35tring['value']);
				$this->_phpSheet->getHeaderFooter()->setEvenFooter($V2n430jknk35tring['value']);
			}
		}
	}


	
	private function _readHcenter()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			$Vfhiq1lhsojasHorizontalCentered = (bool) self::_GetInt2d($Vqcst2xnrxwx, 0);

			$this->_phpSheet->getPageSetup()->setHorizontalCentered($Vfhiq1lhsojasHorizontalCentered);
		}
	}


	
	private function _readVcenter()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			$Vfhiq1lhsojasVerticalCentered = (bool) self::_GetInt2d($Vqcst2xnrxwx, 0);

			$this->_phpSheet->getPageSetup()->setVerticalCentered($Vfhiq1lhsojasVerticalCentered);
		}
	}


	
	private function _readLeftMargin()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			$this->_phpSheet->getPageMargins()->setLeft(self::_extractNumber($Vqcst2xnrxwx));
		}
	}


	
	private function _readRightMargin()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			$this->_phpSheet->getPageMargins()->setRight(self::_extractNumber($Vqcst2xnrxwx));
		}
	}


	
	private function _readTopMargin()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			$this->_phpSheet->getPageMargins()->setTop(self::_extractNumber($Vqcst2xnrxwx));
		}
	}


	
	private function _readBottomMargin()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			$this->_phpSheet->getPageMargins()->setBottom(self::_extractNumber($Vqcst2xnrxwx));
		}
	}


	
	private function _readPageSetup()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			$Vbs1o2ly1hh3 = self::_GetInt2d($Vqcst2xnrxwx, 0);

			
			$V2n430jknk35cale = self::_GetInt2d($Vqcst2xnrxwx, 2);

			
			$Vfe3cfz2ybk2 = self::_GetInt2d($Vqcst2xnrxwx, 6);

			
			$Vl4xffenv2y0 = self::_GetInt2d($Vqcst2xnrxwx, 8);

			

				
				$Vfhiq1lhsojasPortrait = (0x0002 & self::_GetInt2d($Vqcst2xnrxwx, 10)) >> 1;

				
				
				$Vfhiq1lhsojasNotInit = (0x0004 & self::_GetInt2d($Vqcst2xnrxwx, 10)) >> 2;

			if (!$Vfhiq1lhsojasNotInit) {
				$this->_phpSheet->getPageSetup()->setPaperSize($Vbs1o2ly1hh3);
				switch ($Vfhiq1lhsojasPortrait) {
				case 0: $this->_phpSheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE); break;
				case 1: $this->_phpSheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); break;
				}

				$this->_phpSheet->getPageSetup()->setScale($V2n430jknk35cale, false);
				$this->_phpSheet->getPageSetup()->setFitToPage((bool) $this->_isFitToPages);
				$this->_phpSheet->getPageSetup()->setFitToWidth($Vfe3cfz2ybk2, false);
				$this->_phpSheet->getPageSetup()->setFitToHeight($Vl4xffenv2y0, false);
			}

			
			$Vzuxq0m4hml2 = self::_extractNumber(substr($Vqcst2xnrxwx, 16, 8));
			$this->_phpSheet->getPageMargins()->setHeader($Vzuxq0m4hml2);

			
			$Vodnsjfihd4r = self::_extractNumber(substr($Vqcst2xnrxwx, 24, 8));
			$this->_phpSheet->getPageMargins()->setFooter($Vodnsjfihd4r);
		}
	}


	
	private function _readProtect()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if ($this->_readDataOnly) {
			return;
		}

		

		
		$V42jxaoxfe44 = (0x01 & self::_GetInt2d($Vqcst2xnrxwx, 0)) >> 0;
		$this->_phpSheet->getProtection()->setSheet((bool)$V42jxaoxfe44);
	}


	
	private function _readScenProtect()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if ($this->_readDataOnly) {
			return;
		}

		

		
		$V42jxaoxfe44 = (0x01 & self::_GetInt2d($Vqcst2xnrxwx, 0)) >> 0;

		$this->_phpSheet->getProtection()->setScenarios((bool)$V42jxaoxfe44);
	}


	
	private function _readObjectProtect()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if ($this->_readDataOnly) {
			return;
		}

		

		
		$V42jxaoxfe44 = (0x01 & self::_GetInt2d($Vqcst2xnrxwx, 0)) >> 0;

		$this->_phpSheet->getProtection()->setObjects((bool)$V42jxaoxfe44);
	}


	
	private function _readPassword()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			$Vsnnardgofbr = strtoupper(dechex(self::_GetInt2d($Vqcst2xnrxwx, 0))); 
			$this->_phpSheet->getProtection()->setPassword($Vsnnardgofbr, true);
		}
	}


	
	private function _readDefColWidth()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$Vojs2qdgagwv = self::_GetInt2d($Vqcst2xnrxwx, 0);
		if ($Vojs2qdgagwv != 8) {
			$this->_phpSheet->getDefaultColumnDimension()->setWidth($Vojs2qdgagwv);
		}
	}


	
	private function _readColInfo()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			$Vuhpiwuvuxqd = self::_GetInt2d($Vqcst2xnrxwx, 0); 

			
			$Vac03inwrzff = self::_GetInt2d($Vqcst2xnrxwx, 2); 

			
			$Vojs2qdgagwv = self::_GetInt2d($Vqcst2xnrxwx, 4);

			
			$V4de3455flza = self::_GetInt2d($Vqcst2xnrxwx, 6);

			

				
				$Vfhiq1lhsojasHidden = (0x0001 & self::_GetInt2d($Vqcst2xnrxwx, 8)) >> 0;

				
				$Vr1ehei34kfq = (0x0700 & self::_GetInt2d($Vqcst2xnrxwx, 8)) >> 8;

				
				$Vfhiq1lhsojasCollapsed = (0x1000 & self::_GetInt2d($Vqcst2xnrxwx, 8)) >> 12;

			

			for ($Vfhiq1lhsoja = $Vuhpiwuvuxqd; $Vfhiq1lhsoja <= $Vac03inwrzff; ++$Vfhiq1lhsoja) {
				if ($Vac03inwrzff == 255 || $Vac03inwrzff == 256) {
					$this->_phpSheet->getDefaultColumnDimension()->setWidth($Vojs2qdgagwv / 256);
					break;
				}
				$this->_phpSheet->getColumnDimensionByColumn($Vfhiq1lhsoja)->setWidth($Vojs2qdgagwv / 256);
				$this->_phpSheet->getColumnDimensionByColumn($Vfhiq1lhsoja)->setVisible(!$Vfhiq1lhsojasHidden);
				$this->_phpSheet->getColumnDimensionByColumn($Vfhiq1lhsoja)->setOutlineLevel($Vr1ehei34kfq);
				$this->_phpSheet->getColumnDimensionByColumn($Vfhiq1lhsoja)->setCollapsed($Vfhiq1lhsojasCollapsed);
				$this->_phpSheet->getColumnDimensionByColumn($Vfhiq1lhsoja)->setXfIndex($this->_mapCellXfIndex[$V4de3455flza]);
			}
		}
	}


	
	private function _readRow()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			$Vws44nszhvgo = self::_GetInt2d($Vqcst2xnrxwx, 0);

			

			

			

			
			$Vzo4g5xb4yip = (0x7FFF & self::_GetInt2d($Vqcst2xnrxwx, 6)) >> 0;

			
			$Vjjyxh5pfksi = (0x8000 & self::_GetInt2d($Vqcst2xnrxwx, 6)) >> 15;

			if (!$Vjjyxh5pfksi) {
				$this->_phpSheet->getRowDimension($Vws44nszhvgo + 1)->setRowHeight($Vzo4g5xb4yip / 20);
			}

			

			

			

			
			$Vr1ehei34kfq = (0x00000007 & self::_GetInt4d($Vqcst2xnrxwx, 12)) >> 0;
			$this->_phpSheet->getRowDimension($Vws44nszhvgo + 1)->setOutlineLevel($Vr1ehei34kfq);

			
			$Vfhiq1lhsojasCollapsed = (0x00000010 & self::_GetInt4d($Vqcst2xnrxwx, 12)) >> 4;
			$this->_phpSheet->getRowDimension($Vws44nszhvgo + 1)->setCollapsed($Vfhiq1lhsojasCollapsed);

			
			$Vfhiq1lhsojasHidden = (0x00000020 & self::_GetInt4d($Vqcst2xnrxwx, 12)) >> 5;
			$this->_phpSheet->getRowDimension($Vws44nszhvgo + 1)->setVisible(!$Vfhiq1lhsojasHidden);

			
			$Vbuvfmwevpfo = (0x00000080 & self::_GetInt4d($Vqcst2xnrxwx, 12)) >> 7;

			
			$V4de3455flza = (0x0FFF0000 & self::_GetInt4d($Vqcst2xnrxwx, 12)) >> 16;

			if ($Vbuvfmwevpfo) {
				$this->_phpSheet->getRowDimension($Vws44nszhvgo + 1)->setXfIndex($this->_mapCellXfIndex[$V4de3455flza]);
			}
		}
	}


	
	private function _readRk()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$Vexbtekafkvl = self::_GetInt2d($Vqcst2xnrxwx, 0);

		
		$Vn4q2p4mkwa0 = self::_GetInt2d($Vqcst2xnrxwx, 2);
		$Vn4q2p4mkwa0String = PHPExcel_Cell::stringFromColumnIndex($Vn4q2p4mkwa0);

		
		if (($this->getReadFilter() !== NULL) && $this->getReadFilter()->readCell($Vn4q2p4mkwa0String, $Vexbtekafkvl + 1, $this->_phpSheet->getTitle()) ) {
			
			$V4de3455flza = self::_GetInt2d($Vqcst2xnrxwx, 4);

			
			$Vws44nszhvgoknum = self::_GetInt4d($Vqcst2xnrxwx, 6);
			$Vmwwo1qnmepzumValue = self::_GetIEEE754($Vws44nszhvgoknum);

			$Vblc1ueqvbti = $this->_phpSheet->getCell($Vn4q2p4mkwa0String . ($Vexbtekafkvl + 1));
			if (!$this->_readDataOnly) {
				
				$Vblc1ueqvbti->setXfIndex($this->_mapCellXfIndex[$V4de3455flza]);
			}

			
			$Vblc1ueqvbti->setValueExplicit($Vmwwo1qnmepzumValue, PHPExcel_Cell_DataType::TYPE_NUMERIC);
		}
	}


	
	private function _readLabelSst()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$Vexbtekafkvl = self::_GetInt2d($Vqcst2xnrxwx, 0);

		
		$Vn4q2p4mkwa0 = self::_GetInt2d($Vqcst2xnrxwx, 2);
		$Vn4q2p4mkwa0String = PHPExcel_Cell::stringFromColumnIndex($Vn4q2p4mkwa0);

		
		if (($this->getReadFilter() !== NULL) && $this->getReadFilter()->readCell($Vn4q2p4mkwa0String, $Vexbtekafkvl + 1, $this->_phpSheet->getTitle()) ) {
			
			$V4de3455flza = self::_GetInt2d($Vqcst2xnrxwx, 4);

			
			$Vfhiq1lhsojandex = self::_GetInt4d($Vqcst2xnrxwx, 6);

			
			if (($V4kpsemxwyzc = $this->_sst[$Vfhiq1lhsojandex]['fmtRuns']) && !$this->_readDataOnly) {
				
				$Vws44nszhvgoichText = new PHPExcel_RichText();
				$V5tk0vbynhsd = 0;
				$V2n430jknk35stCount = count($this->_sst[$Vfhiq1lhsojandex]['fmtRuns']);
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja <= $V2n430jknk35stCount; ++$Vfhiq1lhsoja) {
					if (isset($V4kpsemxwyzc[$Vfhiq1lhsoja])) {
						$Vkjdq1foihhi = PHPExcel_Shared_String::Substring($this->_sst[$Vfhiq1lhsojandex]['value'], $V5tk0vbynhsd, $V4kpsemxwyzc[$Vfhiq1lhsoja]['charPos'] - $V5tk0vbynhsd);
						$V5tk0vbynhsd = $V4kpsemxwyzc[$Vfhiq1lhsoja]['charPos'];
					} else {
						$Vkjdq1foihhi = PHPExcel_Shared_String::Substring($this->_sst[$Vfhiq1lhsojandex]['value'], $V5tk0vbynhsd, PHPExcel_Shared_String::CountCharacters($this->_sst[$Vfhiq1lhsojandex]['value']));
					}

					if (PHPExcel_Shared_String::CountCharacters($Vkjdq1foihhi) > 0) {
						if ($Vfhiq1lhsoja == 0) { 
							$Vws44nszhvgoichText->createText($Vkjdq1foihhi);
						} else {
							$Vkjdq1foihhiRun = $Vws44nszhvgoichText->createTextRun($Vkjdq1foihhi);
							if (isset($V4kpsemxwyzc[$Vfhiq1lhsoja - 1])) {
								if ($V4kpsemxwyzc[$Vfhiq1lhsoja - 1]['fontIndex'] < 4) {
									$Vxxsicekb41s = $V4kpsemxwyzc[$Vfhiq1lhsoja - 1]['fontIndex'];
								} else {
									
									
									$Vxxsicekb41s = $V4kpsemxwyzc[$Vfhiq1lhsoja - 1]['fontIndex'] - 1;
								}
								$Vkjdq1foihhiRun->setFont(clone $this->_objFonts[$Vxxsicekb41s]);
							}
						}
					}
				}
				$Vblc1ueqvbti = $this->_phpSheet->getCell($Vn4q2p4mkwa0String . ($Vexbtekafkvl + 1));
				$Vblc1ueqvbti->setValueExplicit($Vws44nszhvgoichText, PHPExcel_Cell_DataType::TYPE_STRING);
			} else {
				$Vblc1ueqvbti = $this->_phpSheet->getCell($Vn4q2p4mkwa0String . ($Vexbtekafkvl + 1));
				$Vblc1ueqvbti->setValueExplicit($this->_sst[$Vfhiq1lhsojandex]['value'], PHPExcel_Cell_DataType::TYPE_STRING);
			}

			if (!$this->_readDataOnly) {
				
				$Vblc1ueqvbti->setXfIndex($this->_mapCellXfIndex[$V4de3455flza]);
			}
		}
	}


	
	private function _readMulRk()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$Vexbtekafkvl = self::_GetInt2d($Vqcst2xnrxwx, 0);

		
		$V4y0urwpnd3jolFirst = self::_GetInt2d($Vqcst2xnrxwx, 2);

		
		$V4y0urwpnd3jolLast = self::_GetInt2d($Vqcst2xnrxwx, $Volq3gdvkuqp - 2);
		$Vn4q2p4mkwa0s = $V4y0urwpnd3jolLast - $V4y0urwpnd3jolFirst + 1;

		
		$Vortqlloirgz = 4;

		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vn4q2p4mkwa0s; ++$Vfhiq1lhsoja) {
			$Vn4q2p4mkwa0String = PHPExcel_Cell::stringFromColumnIndex($V4y0urwpnd3jolFirst + $Vfhiq1lhsoja);

			
			if (($this->getReadFilter() !== NULL) && $this->getReadFilter()->readCell($Vn4q2p4mkwa0String, $Vexbtekafkvl + 1, $this->_phpSheet->getTitle()) ) {

				
				$V4de3455flza = self::_GetInt2d($Vqcst2xnrxwx, $Vortqlloirgz);

				
				$Vmwwo1qnmepzumValue = self::_GetIEEE754(self::_GetInt4d($Vqcst2xnrxwx, $Vortqlloirgz + 2));
				$Vblc1ueqvbti = $this->_phpSheet->getCell($Vn4q2p4mkwa0String . ($Vexbtekafkvl + 1));
				if (!$this->_readDataOnly) {
					
					$Vblc1ueqvbti->setXfIndex($this->_mapCellXfIndex[$V4de3455flza]);
				}

				
				$Vblc1ueqvbti->setValueExplicit($Vmwwo1qnmepzumValue, PHPExcel_Cell_DataType::TYPE_NUMERIC);
			}

			$Vortqlloirgz += 6;
		}
	}


	
	private function _readNumber()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$Vexbtekafkvl = self::_GetInt2d($Vqcst2xnrxwx, 0);

		
		$Vn4q2p4mkwa0 = self::_GetInt2d($Vqcst2xnrxwx, 2);
		$Vn4q2p4mkwa0String = PHPExcel_Cell::stringFromColumnIndex($Vn4q2p4mkwa0);

		
		if (($this->getReadFilter() !== NULL) && $this->getReadFilter()->readCell($Vn4q2p4mkwa0String, $Vexbtekafkvl + 1, $this->_phpSheet->getTitle()) ) {
			
			$V4de3455flza = self::_GetInt2d($Vqcst2xnrxwx, 4);

			$Vmwwo1qnmepzumValue = self::_extractNumber(substr($Vqcst2xnrxwx, 6, 8));

			$Vblc1ueqvbti = $this->_phpSheet->getCell($Vn4q2p4mkwa0String . ($Vexbtekafkvl + 1));
			if (!$this->_readDataOnly) {
				
				$Vblc1ueqvbti->setXfIndex($this->_mapCellXfIndex[$V4de3455flza]);
			}

			
			$Vblc1ueqvbti->setValueExplicit($Vmwwo1qnmepzumValue, PHPExcel_Cell_DataType::TYPE_NUMERIC);
		}
	}


	
	private function _readFormula()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$Vexbtekafkvl = self::_GetInt2d($Vqcst2xnrxwx, 0);

		
		$Vn4q2p4mkwa0 = self::_GetInt2d($Vqcst2xnrxwx, 2);
		$Vn4q2p4mkwa0String = PHPExcel_Cell::stringFromColumnIndex($Vn4q2p4mkwa0);

		
		$V22ivdjjfdx2Structure = substr($Vqcst2xnrxwx, 20);

		
		$Vrs2mt5pfpsvptions = self::_GetInt2d($Vqcst2xnrxwx, 14);

		
		
		
		$Vfhiq1lhsojasPartOfSharedFormula = (bool) (0x0008 & $Vrs2mt5pfpsvptions);

		
		
		
		
		$Vfhiq1lhsojasPartOfSharedFormula = $Vfhiq1lhsojasPartOfSharedFormula && ord($V22ivdjjfdx2Structure{2}) == 0x01;

		if ($Vfhiq1lhsojasPartOfSharedFormula) {
			
			
			$V3mppaqv1iv5 = self::_GetInt2d($V22ivdjjfdx2Structure, 3);
			$V4c1bjjawrgm = self::_GetInt2d($V22ivdjjfdx2Structure, 5);
			$this->_baseCell = PHPExcel_Cell::stringFromColumnIndex($V4c1bjjawrgm). ($V3mppaqv1iv5 + 1);
		}

		
		if (($this->getReadFilter() !== NULL) && $this->getReadFilter()->readCell($Vn4q2p4mkwa0String, $Vexbtekafkvl + 1, $this->_phpSheet->getTitle()) ) {

			if ($Vfhiq1lhsojasPartOfSharedFormula) {
				
				$this->_sharedFormulaParts[$Vn4q2p4mkwa0String . ($Vexbtekafkvl + 1)] = $this->_baseCell;
			}

			

			
			$V4de3455flza = self::_GetInt2d($Vqcst2xnrxwx, 4);

			
			if ( (ord($Vqcst2xnrxwx{6}) == 0)
				&& (ord($Vqcst2xnrxwx{12}) == 255)
				&& (ord($Vqcst2xnrxwx{13}) == 255) ) {

				
				$Vou4vxorrdoeType = PHPExcel_Cell_DataType::TYPE_STRING;

				
				$V0x4xt3l5phz = self::_GetInt2d($this->_data, $this->_pos);
				if ($V0x4xt3l5phz == self::XLS_Type_SHAREDFMLA) {
					$this->_readSharedFmla();
				}

				
				$Vp4xjtpabm0l = $this->_readString();

			} elseif ((ord($Vqcst2xnrxwx{6}) == 1)
				&& (ord($Vqcst2xnrxwx{12}) == 255)
				&& (ord($Vqcst2xnrxwx{13}) == 255)) {

				
				$Vou4vxorrdoeType = PHPExcel_Cell_DataType::TYPE_BOOL;
				$Vp4xjtpabm0l = (bool) ord($Vqcst2xnrxwx{8});

			} elseif ((ord($Vqcst2xnrxwx{6}) == 2)
				&& (ord($Vqcst2xnrxwx{12}) == 255)
				&& (ord($Vqcst2xnrxwx{13}) == 255)) {

				
				$Vou4vxorrdoeType = PHPExcel_Cell_DataType::TYPE_ERROR;
				$Vp4xjtpabm0l = self::_mapErrorCode(ord($Vqcst2xnrxwx{8}));

			} elseif ((ord($Vqcst2xnrxwx{6}) == 3)
				&& (ord($Vqcst2xnrxwx{12}) == 255)
				&& (ord($Vqcst2xnrxwx{13}) == 255)) {

				
				$Vou4vxorrdoeType = PHPExcel_Cell_DataType::TYPE_NULL;
				$Vp4xjtpabm0l = '';

			} else {

				
				$Vou4vxorrdoeType = PHPExcel_Cell_DataType::TYPE_NUMERIC;
				$Vp4xjtpabm0l = self::_extractNumber(substr($Vqcst2xnrxwx, 6, 8));

			}

			$Vblc1ueqvbti = $this->_phpSheet->getCell($Vn4q2p4mkwa0String . ($Vexbtekafkvl + 1));
			if (!$this->_readDataOnly) {
				
				$Vblc1ueqvbti->setXfIndex($this->_mapCellXfIndex[$V4de3455flza]);
			}

			
			if (!$Vfhiq1lhsojasPartOfSharedFormula) {
				
				
				try {
					if ($this->_version != self::XLS_BIFF8) {
						throw new PHPExcel_Reader_Exception('Not BIFF8. Can only read BIFF8 formulas');
					}
					$V22ivdjjfdx2 = $this->_getFormulaFromStructure($V22ivdjjfdx2Structure); 
					$Vblc1ueqvbti->setValueExplicit('=' . $V22ivdjjfdx2, PHPExcel_Cell_DataType::TYPE_FORMULA);

				} catch (PHPExcel_Exception $Vnhm0uuykimv) {
					$Vblc1ueqvbti->setValueExplicit($Vp4xjtpabm0l, $Vou4vxorrdoeType);
				}
			} else {
				if ($this->_version == self::XLS_BIFF8) {
					
				} else {
					$Vblc1ueqvbti->setValueExplicit($Vp4xjtpabm0l, $Vou4vxorrdoeType);
				}
			}

			
			$Vblc1ueqvbti->setCalculatedValue($Vp4xjtpabm0l);
		}
	}


	
	private function _readSharedFmla()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$Vblc1ueqvbtiRange = substr($Vqcst2xnrxwx, 0, 6);
		$Vblc1ueqvbtiRange = $this->_readBIFF5CellRangeAddressFixed($Vblc1ueqvbtiRange); 

		

		
		$Vmwwo1qnmepzo = ord($Vqcst2xnrxwx{7});

		
		$V22ivdjjfdx2 = substr($Vqcst2xnrxwx, 8);

		
		$this->_sharedFormulas[$this->_baseCell] = $V22ivdjjfdx2;

	}


	
	private function _readString()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if ($this->_version == self::XLS_BIFF8) {
			$V2n430jknk35tring = self::_readUnicodeStringLong($Vqcst2xnrxwx);
			$Vp4xjtpabm0l = $V2n430jknk35tring['value'];
		} else {
			$V2n430jknk35tring = $this->_readByteStringLong($Vqcst2xnrxwx);
			$Vp4xjtpabm0l = $V2n430jknk35tring['value'];
		}

		return $Vp4xjtpabm0l;
	}


	
	private function _readBoolErr()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$Vexbtekafkvl = self::_GetInt2d($Vqcst2xnrxwx, 0);

		
		$Vn4q2p4mkwa0 = self::_GetInt2d($Vqcst2xnrxwx, 2);
		$Vn4q2p4mkwa0String = PHPExcel_Cell::stringFromColumnIndex($Vn4q2p4mkwa0);

		
		if (($this->getReadFilter() !== NULL) && $this->getReadFilter()->readCell($Vn4q2p4mkwa0String, $Vexbtekafkvl + 1, $this->_phpSheet->getTitle()) ) {
			
			$V4de3455flza = self::_GetInt2d($Vqcst2xnrxwx, 4);

			
			$V42jxaoxfe44Err = ord($Vqcst2xnrxwx{6});

			
			$Vfhiq1lhsojasError = ord($Vqcst2xnrxwx{7});

			$Vblc1ueqvbti = $this->_phpSheet->getCell($Vn4q2p4mkwa0String . ($Vexbtekafkvl + 1));
			switch ($Vfhiq1lhsojasError) {
				case 0: 
					$Vp4xjtpabm0l = (bool) $V42jxaoxfe44Err;

					
					$Vblc1ueqvbti->setValueExplicit($Vp4xjtpabm0l, PHPExcel_Cell_DataType::TYPE_BOOL);
					break;

				case 1: 
					$Vp4xjtpabm0l = self::_mapErrorCode($V42jxaoxfe44Err);

					
					$Vblc1ueqvbti->setValueExplicit($Vp4xjtpabm0l, PHPExcel_Cell_DataType::TYPE_ERROR);
					break;
			}

			if (!$this->_readDataOnly) {
				
				$Vblc1ueqvbti->setXfIndex($this->_mapCellXfIndex[$V4de3455flza]);
			}
		}
	}


	
	private function _readMulBlank()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$Vexbtekafkvl = self::_GetInt2d($Vqcst2xnrxwx, 0);

		
		$Vuhpiwuvuxqd = self::_GetInt2d($Vqcst2xnrxwx, 2);

		
		
		if (!$this->_readDataOnly) {
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Volq3gdvkuqp / 2 - 3; ++$Vfhiq1lhsoja) {
				$Vn4q2p4mkwa0String = PHPExcel_Cell::stringFromColumnIndex($Vuhpiwuvuxqd + $Vfhiq1lhsoja);

				
				if (($this->getReadFilter() !== NULL) && $this->getReadFilter()->readCell($Vn4q2p4mkwa0String, $Vexbtekafkvl + 1, $this->_phpSheet->getTitle()) ) {
					$V4de3455flza = self::_GetInt2d($Vqcst2xnrxwx, 4 + 2 * $Vfhiq1lhsoja);
					$this->_phpSheet->getCell($Vn4q2p4mkwa0String . ($Vexbtekafkvl + 1))->setXfIndex($this->_mapCellXfIndex[$V4de3455flza]);
				}
			}
		}

		
	}


	
	private function _readLabel()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$Vexbtekafkvl = self::_GetInt2d($Vqcst2xnrxwx, 0);

		
		$Vn4q2p4mkwa0 = self::_GetInt2d($Vqcst2xnrxwx, 2);
		$Vn4q2p4mkwa0String = PHPExcel_Cell::stringFromColumnIndex($Vn4q2p4mkwa0);

		
		if (($this->getReadFilter() !== NULL) && $this->getReadFilter()->readCell($Vn4q2p4mkwa0String, $Vexbtekafkvl + 1, $this->_phpSheet->getTitle()) ) {
			
			$V4de3455flza = self::_GetInt2d($Vqcst2xnrxwx, 4);

			
			
			if ($this->_version == self::XLS_BIFF8) {
				$V2n430jknk35tring = self::_readUnicodeStringLong(substr($Vqcst2xnrxwx, 6));
				$Vp4xjtpabm0l = $V2n430jknk35tring['value'];
			} else {
				$V2n430jknk35tring = $this->_readByteStringLong(substr($Vqcst2xnrxwx, 6));
				$Vp4xjtpabm0l = $V2n430jknk35tring['value'];
			}
			$Vblc1ueqvbti = $this->_phpSheet->getCell($Vn4q2p4mkwa0String . ($Vexbtekafkvl + 1));
			$Vblc1ueqvbti->setValueExplicit($Vp4xjtpabm0l, PHPExcel_Cell_DataType::TYPE_STRING);

			if (!$this->_readDataOnly) {
				
				$Vblc1ueqvbti->setXfIndex($this->_mapCellXfIndex[$V4de3455flza]);
			}
		}
	}


	
	private function _readBlank()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$Vexbtekafkvl = self::_GetInt2d($Vqcst2xnrxwx, 0);

		
		$V4y0urwpnd3jol = self::_GetInt2d($Vqcst2xnrxwx, 2);
		$Vn4q2p4mkwa0String = PHPExcel_Cell::stringFromColumnIndex($V4y0urwpnd3jol);

		
		if (($this->getReadFilter() !== NULL) && $this->getReadFilter()->readCell($Vn4q2p4mkwa0String, $Vexbtekafkvl + 1, $this->_phpSheet->getTitle()) ) {
			
			$V4de3455flza = self::_GetInt2d($Vqcst2xnrxwx, 4);

			
			if (!$this->_readDataOnly) {
				$this->_phpSheet->getCell($Vn4q2p4mkwa0String . ($Vexbtekafkvl + 1))->setXfIndex($this->_mapCellXfIndex[$V4de3455flza]);
			}
		}

	}


	
	private function _readMsoDrawing()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);

		
		$V2n430jknk35plicedRecordData = $this->_getSplicedRecordData();
		$Vqcst2xnrxwx = $V2n430jknk35plicedRecordData['recordData'];

		$this->_drawingData .= $Vqcst2xnrxwx;
	}


	
	private function _readObj()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if ($this->_readDataOnly || $this->_version != self::XLS_BIFF8) {
			return;
		}

		
		
		
		
		
		
		

		
		$Vluu25v00uqc	= self::_GetInt2d($Vqcst2xnrxwx, 0);
		$Vstfrw5akne1CmoSize	= self::_GetInt2d($Vqcst2xnrxwx, 2);
		$Vrs2mt5pfpsvtObjType	= self::_GetInt2d($Vqcst2xnrxwx, 4);
		$Vfhiq1lhsojadObjID	= self::_GetInt2d($Vqcst2xnrxwx, 6);
		$Vz50gauqtoeh	= self::_GetInt2d($Vqcst2xnrxwx, 6);

		$this->_objs[] = array(
			'ftCmoType'	=> $Vluu25v00uqc,
			'cbCmoSize'	=> $Vstfrw5akne1CmoSize,
			'otObjType'	=> $Vrs2mt5pfpsvtObjType,
			'idObjID'	=> $Vfhiq1lhsojadObjID,
			'grbitOpts'	=> $Vz50gauqtoeh
		);
		$this->textObjRef = $Vfhiq1lhsojadObjID;




	}


	
	private function _readWindow2()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$Vrs2mt5pfpsvptions = self::_GetInt2d($Vqcst2xnrxwx, 0);

		
		$Vrl2zgeukm1v = self::_GetInt2d($Vqcst2xnrxwx, 2);

		
		$V0j15pqqtucj = self::_GetInt2d($Vqcst2xnrxwx, 4);
		if ($this->_version === self::XLS_BIFF8) {
			
			
			
			
			$Vh3t2mmv5mat = self::_GetInt2d($Vqcst2xnrxwx, 10);
			if ($Vh3t2mmv5mat === 0) $Vh3t2mmv5mat = 60;
			$Vdt0qqlyy5ws = self::_GetInt2d($Vqcst2xnrxwx, 12);
			if ($Vdt0qqlyy5ws === 0) $Vdt0qqlyy5ws = 100;
		}

		
		$V2n430jknk35howGridlines = (bool) ((0x0002 & $Vrs2mt5pfpsvptions) >> 1);
		$this->_phpSheet->setShowGridlines($V2n430jknk35howGridlines);

		
		$V2n430jknk35howRowColHeaders = (bool) ((0x0004 & $Vrs2mt5pfpsvptions) >> 2);
		$this->_phpSheet->setShowRowColHeaders($V2n430jknk35howRowColHeaders);

		
		$this->_frozen = (bool) ((0x0008 & $Vrs2mt5pfpsvptions) >> 3);

		
		$this->_phpSheet->setRightToLeft((bool)((0x0040 & $Vrs2mt5pfpsvptions) >> 6));

		
		$Vfhiq1lhsojasActive = (bool) ((0x0400 & $Vrs2mt5pfpsvptions) >> 10);
		if ($Vfhiq1lhsojasActive) {
			$this->_phpExcel->setActiveSheetIndex($this->_phpExcel->getIndex($this->_phpSheet));
		}

		
		$Vfhiq1lhsojasPageBreakPreview = (bool) ((0x0800 & $Vrs2mt5pfpsvptions) >> 11);

		

		if ($this->_phpSheet->getSheetView()->getView() !== PHPExcel_Worksheet_SheetView::SHEETVIEW_PAGE_LAYOUT) {
			
			$Vr2ci5ntypot = $Vfhiq1lhsojasPageBreakPreview? PHPExcel_Worksheet_SheetView::SHEETVIEW_PAGE_BREAK_PREVIEW :
				PHPExcel_Worksheet_SheetView::SHEETVIEW_NORMAL;
			$this->_phpSheet->getSheetView()->setView($Vr2ci5ntypot);
			if ($this->_version === self::XLS_BIFF8) {
				$V1eo43zeeswj = $Vfhiq1lhsojasPageBreakPreview? $Vh3t2mmv5mat : $Vdt0qqlyy5ws;
				$this->_phpSheet->getSheetView()->setZoomScale($V1eo43zeeswj);
				$this->_phpSheet->getSheetView()->setZoomScaleNormal($Vdt0qqlyy5ws);
			}
		}
	}

	
	private function _readPageLayoutView(){
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		

		
		
		$Vws44nszhvgot = self::_GetInt2d($Vqcst2xnrxwx, 0);
		
		
		$V4fz2dse0smo = self::_GetInt2d($Vqcst2xnrxwx, 2);
		
		

		
		$Vq4tuqnktal2 = self::_GetInt2d($Vqcst2xnrxwx, 12);
		
		$V4so2o2kxsqi = self::_GetInt2d($Vqcst2xnrxwx, 14);

		
		$V0h5iejtzmcz   = $V4so2o2kxsqi & 0x01;
		$Vwrhhyu4lu0s     = ($V4so2o2kxsqi >> 1) & 0x01; 
		$Vectmsrr1yx2 = ($V4so2o2kxsqi >> 3) & 0x01; 

		if ($V0h5iejtzmcz === 1) {
			$this->_phpSheet->getSheetView()->setView(PHPExcel_Worksheet_SheetView::SHEETVIEW_PAGE_LAYOUT);
			$this->_phpSheet->getSheetView()->setZoomScale($Vq4tuqnktal2); 
		}
		
	}

	
	private function _readScl()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$Vmwwo1qnmepzumerator = self::_GetInt2d($Vqcst2xnrxwx, 0);

		
		$Voy5oap44dc1 = self::_GetInt2d($Vqcst2xnrxwx, 2);

		
		$this->_phpSheet->getSheetView()->setZoomScale($Vmwwo1qnmepzumerator * 100 / $Voy5oap44dc1);
	}


	
	private function _readPane()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			$Vkh4prru0lum = self::_GetInt2d($Vqcst2xnrxwx, 0);

			
			$Vq24hyhd4zii = self::_GetInt2d($Vqcst2xnrxwx, 2);

			if ($this->_frozen) {
				
				$this->_phpSheet->freezePane(PHPExcel_Cell::stringFromColumnIndex($Vkh4prru0lum) . ($Vq24hyhd4zii + 1));
			} else {
				
			}
		}
	}


	
	private function _readSelection()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			$V3oye2sxkbvd = ord($Vqcst2xnrxwx{0});

			
			$Vws44nszhvgo = self::_GetInt2d($Vqcst2xnrxwx, 1);

			
			$V4y0urwpnd3j = self::_GetInt2d($Vqcst2xnrxwx, 3);

			
			
			$Vfhiq1lhsojandex = self::_GetInt2d($Vqcst2xnrxwx, 5);

			
			$Vou4vxorrdoe = substr($Vqcst2xnrxwx, 7);
			$Vblc1ueqvbtiRangeAddressList = $this->_readBIFF5CellRangeAddressList($Vou4vxorrdoe); 

			$V2n430jknk35electedCells = $Vblc1ueqvbtiRangeAddressList['cellRangeAddresses'][0];

			
			if (preg_match('/^([A-Z]+1\:[A-Z]+)16384$/', $V2n430jknk35electedCells)) {
				$V2n430jknk35electedCells = preg_replace('/^([A-Z]+1\:[A-Z]+)16384$/', '${1}1048576', $V2n430jknk35electedCells);
			}

			
			if (preg_match('/^([A-Z]+1\:[A-Z]+)65536$/', $V2n430jknk35electedCells)) {
				$V2n430jknk35electedCells = preg_replace('/^([A-Z]+1\:[A-Z]+)65536$/', '${1}1048576', $V2n430jknk35electedCells);
			}

			
			if (preg_match('/^(A[0-9]+\:)IV([0-9]+)$/', $V2n430jknk35electedCells)) {
				$V2n430jknk35electedCells = preg_replace('/^(A[0-9]+\:)IV([0-9]+)$/', '${1}XFD${2}', $V2n430jknk35electedCells);
			}

			$this->_phpSheet->setSelectedCells($V2n430jknk35electedCells);
		}
	}


	private function _includeCellRangeFiltered($Vblc1ueqvbtiRangeAddress)
	{
		$Vfhiq1lhsojancludeCellRange = true;
		if ($this->getReadFilter() !== NULL) {
			$Vfhiq1lhsojancludeCellRange = false;
			$Votjg2jvcmjxBoundaries = PHPExcel_Cell::getRangeBoundaries($Vblc1ueqvbtiRangeAddress);
			$Votjg2jvcmjxBoundaries[1][0]++;
			for ($Vexbtekafkvl = $Votjg2jvcmjxBoundaries[0][1]; $Vexbtekafkvl <= $Votjg2jvcmjxBoundaries[1][1]; $Vexbtekafkvl++) {
				for ($Vn4q2p4mkwa0 = $Votjg2jvcmjxBoundaries[0][0]; $Vn4q2p4mkwa0 != $Votjg2jvcmjxBoundaries[1][0]; $Vn4q2p4mkwa0++) {
					if ($this->getReadFilter()->readCell($Vn4q2p4mkwa0, $Vexbtekafkvl, $this->_phpSheet->getTitle())) {
						$Vfhiq1lhsojancludeCellRange = true;
						break 2;
					}
				}
			}
		}
		return $Vfhiq1lhsojancludeCellRange;
	}


	
	private function _readMergedCells()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if ($this->_version == self::XLS_BIFF8 && !$this->_readDataOnly) {
			$Vblc1ueqvbtiRangeAddressList = $this->_readBIFF8CellRangeAddressList($Vqcst2xnrxwx);
			foreach ($Vblc1ueqvbtiRangeAddressList['cellRangeAddresses'] as $Vblc1ueqvbtiRangeAddress) {
				if ((strpos($Vblc1ueqvbtiRangeAddress,':') !== FALSE) &&
					($this->_includeCellRangeFiltered($Vblc1ueqvbtiRangeAddress))) {
					$this->_phpSheet->mergeCells($Vblc1ueqvbtiRangeAddress);
				}
			}
		}
	}


	
	private function _readHyperLink()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if (!$this->_readDataOnly) {
			
			try {
				$Vblc1ueqvbtiRange = $this->_readBIFF8CellRangeAddressFixed($Vqcst2xnrxwx, 0, 8);
			} catch (PHPExcel_Exception $Vnhm0uuykimv) {
				return;
			}

			

			

			

				
				$Vfhiq1lhsojasFileLinkOrUrl = (0x00000001 & self::_GetInt2d($Vqcst2xnrxwx, 28)) >> 0;

				
				$Vfhiq1lhsojasAbsPathOrUrl = (0x00000001 & self::_GetInt2d($Vqcst2xnrxwx, 28)) >> 1;

				
				$V0uqhb1b0gkx = (0x00000014 & self::_GetInt2d($Vqcst2xnrxwx, 28)) >> 2;

				
				$Vvglkcxcrgsy = (0x00000008 & self::_GetInt2d($Vqcst2xnrxwx, 28)) >> 3;

				
				$Vjill1eiknyn = (0x00000080 & self::_GetInt2d($Vqcst2xnrxwx, 28)) >> 7;

				
				$Vfhiq1lhsojasUNC = (0x00000100 & self::_GetInt2d($Vqcst2xnrxwx, 28)) >> 8;

			
			$Vortqlloirgz = 32;

			if ($V0uqhb1b0gkx) {
				
				$Vmzvmnjudbpf = self::_GetInt4d($Vqcst2xnrxwx, 32);
				
				$Voelhmok5q13 = self::_encodeUTF16(substr($Vqcst2xnrxwx, 36, 2 * ($Vmzvmnjudbpf - 1)), false);
				$Vortqlloirgz += 4 + 2 * $Vmzvmnjudbpf;
			}
			if ($Vjill1eiknyn) {
				$Vitfabqw4mmd = self::_GetInt4d($Vqcst2xnrxwx, $Vortqlloirgz);
				$Vortqlloirgz += 4 + 2 * $Vitfabqw4mmd;
			}

			
			$Vkjqq3wi10xt = null;

			if ($Vfhiq1lhsojasUNC) {
				$Vkjqq3wi10xt = 'UNC';
			} else if (!$Vfhiq1lhsojasFileLinkOrUrl) {
				$Vkjqq3wi10xt = 'workbook';
			} else if (ord($Vqcst2xnrxwx{$Vortqlloirgz}) == 0x03) {
				$Vkjqq3wi10xt = 'local';
			} else if (ord($Vqcst2xnrxwx{$Vortqlloirgz}) == 0xE0) {
				$Vkjqq3wi10xt = 'URL';
			}

			switch ($Vkjqq3wi10xt) {
			case 'URL':
				
				

				
				$Vortqlloirgz += 16;
				
				$Vey4ydpktf1w = self::_GetInt4d($Vqcst2xnrxwx, $Vortqlloirgz);
				$Vortqlloirgz += 4;
				
				$Vbfatyoohaps = self::_encodeUTF16(substr($Vqcst2xnrxwx, $Vortqlloirgz, $Vey4ydpktf1w - 2), false);
                $Vmwwo1qnmepzullOffset = strpos($Vbfatyoohaps, 0x00);
				if ($Vmwwo1qnmepzullOffset)
                    $Vbfatyoohaps = substr($Vbfatyoohaps,0,$Vmwwo1qnmepzullOffset);
				$Vbfatyoohaps .= $Vvglkcxcrgsy ? '#' : '';
				$Vortqlloirgz += $Vey4ydpktf1w;
				break;

			case 'local':
				
				
				
				

				
				$Vortqlloirgz += 16;

				
				$Vnitb2h2iwxd = self::_GetInt2d($Vqcst2xnrxwx, $Vortqlloirgz);
				$Vortqlloirgz += 2;

				
				$V2n430jknk35l = self::_GetInt4d($Vqcst2xnrxwx, $Vortqlloirgz);
				$Vortqlloirgz += 4;

				
				$V2n430jknk35hortenedFilePath = substr($Vqcst2xnrxwx, $Vortqlloirgz, $V2n430jknk35l);
				$V2n430jknk35hortenedFilePath = self::_encodeUTF16($V2n430jknk35hortenedFilePath, true);
				$V2n430jknk35hortenedFilePath = substr($V2n430jknk35hortenedFilePath, 0, -1); 

				$Vortqlloirgz += $V2n430jknk35l;

				
				$Vortqlloirgz += 24;

				
				
				$V2n430jknk35z = self::_GetInt4d($Vqcst2xnrxwx, $Vortqlloirgz);
				$Vortqlloirgz += 4;

				
				if ($V2n430jknk35z > 0) {
					
					$Vxvvctyvbcpv = self::_GetInt4d($Vqcst2xnrxwx, $Vortqlloirgz);
					$Vortqlloirgz += 4;

					
					$Vortqlloirgz += 2;

					
					$Vnhm0uuykimvxtendedFilePath = substr($Vqcst2xnrxwx, $Vortqlloirgz, $Vxvvctyvbcpv);
					$Vnhm0uuykimvxtendedFilePath = self::_encodeUTF16($Vnhm0uuykimvxtendedFilePath, false);
					$Vortqlloirgz += $Vxvvctyvbcpv;
				}

				
				$Vbfatyoohaps = str_repeat('..\\', $Vnitb2h2iwxd);
				$Vbfatyoohaps .= ($V2n430jknk35z > 0) ?
					$Vnhm0uuykimvxtendedFilePath : $V2n430jknk35hortenedFilePath; 
				$Vbfatyoohaps .= $Vvglkcxcrgsy ? '#' : '';

				break;


			case 'UNC':
				
				
				return;

			case 'workbook':
				
				
				$Vbfatyoohaps = 'sheet://';
				break;

			default:
				return;

			}

			if ($Vvglkcxcrgsy) {
				
				$V1bvr3q4skeq = self::_GetInt4d($Vqcst2xnrxwx, $Vortqlloirgz);
				$Vortqlloirgz += 4;
				
				$Vkjdq1foihhi = self::_encodeUTF16(substr($Vqcst2xnrxwx, $Vortqlloirgz, 2 * ($V1bvr3q4skeq - 1)), false);
				$Vbfatyoohaps .= $Vkjdq1foihhi;
			}

			
			foreach (PHPExcel_Cell::extractAllCellReferencesInRange($Vblc1ueqvbtiRange) as $V4y0urwpnd3joordinate) {
				$this->_phpSheet->getCell($V4y0urwpnd3joordinate)->getHyperLink()->setUrl($Vbfatyoohaps);
			}
		}
	}


	
	private function _readDataValidations()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;
	}


	
	private function _readDataValidation()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if ($this->_readDataOnly) {
			return;
		}

		
		$Vrs2mt5pfpsvptions = self::_GetInt4d($Vqcst2xnrxwx, 0);

		
		$V4pigtpor0ln = (0x0000000F & $Vrs2mt5pfpsvptions) >> 0;
		switch ($V4pigtpor0ln) {
			case 0x00:	$V4pigtpor0ln = PHPExcel_Cell_DataValidation::TYPE_NONE;		break;
			case 0x01:	$V4pigtpor0ln = PHPExcel_Cell_DataValidation::TYPE_WHOLE;		break;
			case 0x02:	$V4pigtpor0ln = PHPExcel_Cell_DataValidation::TYPE_DECIMAL;		break;
			case 0x03:	$V4pigtpor0ln = PHPExcel_Cell_DataValidation::TYPE_LIST;		break;
			case 0x04:	$V4pigtpor0ln = PHPExcel_Cell_DataValidation::TYPE_DATE;		break;
			case 0x05:	$V4pigtpor0ln = PHPExcel_Cell_DataValidation::TYPE_TIME;		break;
			case 0x06:	$V4pigtpor0ln = PHPExcel_Cell_DataValidation::TYPE_TEXTLENGTH;	break;
			case 0x07:	$V4pigtpor0ln = PHPExcel_Cell_DataValidation::TYPE_CUSTOM;		break;
		}

		
		$Vnhm0uuykimvrrorStyle = (0x00000070 & $Vrs2mt5pfpsvptions) >> 4;
		switch ($Vnhm0uuykimvrrorStyle) {
			case 0x00:	$Vnhm0uuykimvrrorStyle = PHPExcel_Cell_DataValidation::STYLE_STOP;			break;
			case 0x01:	$Vnhm0uuykimvrrorStyle = PHPExcel_Cell_DataValidation::STYLE_WARNING;		break;
			case 0x02:	$Vnhm0uuykimvrrorStyle = PHPExcel_Cell_DataValidation::STYLE_INFORMATION;	break;
		}

		
		
		$Vnhm0uuykimvxplicitFormula = (0x00000080 & $Vrs2mt5pfpsvptions) >> 7;

		
		$Vskhclrhu4p4 = (0x00000100 & $Vrs2mt5pfpsvptions) >> 8;

		
		$V2n430jknk35uppressDropDown = (0x00000200 & $Vrs2mt5pfpsvptions) >> 9;

		
		$V2n430jknk35howInputMessage = (0x00040000 & $Vrs2mt5pfpsvptions) >> 18;

		
		$V2n430jknk35howErrorMessage = (0x00080000 & $Vrs2mt5pfpsvptions) >> 19;

		
		$Vrs2mt5pfpsvperator = (0x00F00000 & $Vrs2mt5pfpsvptions) >> 20;
		switch ($Vrs2mt5pfpsvperator) {
			case 0x00: $Vrs2mt5pfpsvperator = PHPExcel_Cell_DataValidation::OPERATOR_BETWEEN			;	break;
			case 0x01: $Vrs2mt5pfpsvperator = PHPExcel_Cell_DataValidation::OPERATOR_NOTBETWEEN		;	break;
			case 0x02: $Vrs2mt5pfpsvperator = PHPExcel_Cell_DataValidation::OPERATOR_EQUAL				;	break;
			case 0x03: $Vrs2mt5pfpsvperator = PHPExcel_Cell_DataValidation::OPERATOR_NOTEQUAL			;	break;
			case 0x04: $Vrs2mt5pfpsvperator = PHPExcel_Cell_DataValidation::OPERATOR_GREATERTHAN		;	break;
			case 0x05: $Vrs2mt5pfpsvperator = PHPExcel_Cell_DataValidation::OPERATOR_LESSTHAN			;	break;
			case 0x06: $Vrs2mt5pfpsvperator = PHPExcel_Cell_DataValidation::OPERATOR_GREATERTHANOREQUAL;	break;
			case 0x07: $Vrs2mt5pfpsvperator = PHPExcel_Cell_DataValidation::OPERATOR_LESSTHANOREQUAL	;	break;
		}

		
		$Vortqlloirgz = 4;
		$V2n430jknk35tring = self::_readUnicodeStringLong(substr($Vqcst2xnrxwx, $Vortqlloirgz));
		$Vw3f5ld2df3d = $V2n430jknk35tring['value'] !== chr(0) ?
			$V2n430jknk35tring['value'] : '';
		$Vortqlloirgz += $V2n430jknk35tring['size'];

		
		$V2n430jknk35tring = self::_readUnicodeStringLong(substr($Vqcst2xnrxwx, $Vortqlloirgz));
		$Vnhm0uuykimvrrorTitle = $V2n430jknk35tring['value'] !== chr(0) ?
			$V2n430jknk35tring['value'] : '';
		$Vortqlloirgz += $V2n430jknk35tring['size'];

		
		$V2n430jknk35tring = self::_readUnicodeStringLong(substr($Vqcst2xnrxwx, $Vortqlloirgz));
		$Vrw1ksaz1srx = $V2n430jknk35tring['value'] !== chr(0) ?
			$V2n430jknk35tring['value'] : '';
		$Vortqlloirgz += $V2n430jknk35tring['size'];

		
		$V2n430jknk35tring = self::_readUnicodeStringLong(substr($Vqcst2xnrxwx, $Vortqlloirgz));
		$Vnhm0uuykimvrror = $V2n430jknk35tring['value'] !== chr(0) ?
			$V2n430jknk35tring['value'] : '';
		$Vortqlloirgz += $V2n430jknk35tring['size'];

		
		$V2n430jknk35z1 = self::_GetInt2d($Vqcst2xnrxwx, $Vortqlloirgz);
		$Vortqlloirgz += 2;

		
		$Vortqlloirgz += 2;

		
		$V22ivdjjfdx21 = substr($Vqcst2xnrxwx, $Vortqlloirgz, $V2n430jknk35z1);
		$V22ivdjjfdx21 = pack('v', $V2n430jknk35z1) . $V22ivdjjfdx21; 
		try {
			$V22ivdjjfdx21 = $this->_getFormulaFromStructure($V22ivdjjfdx21);

			
			if ($V4pigtpor0ln == PHPExcel_Cell_DataValidation::TYPE_LIST) {
				$V22ivdjjfdx21 = str_replace(chr(0), ',', $V22ivdjjfdx21);
			}
		} catch (PHPExcel_Exception $Vnhm0uuykimv) {
			return;
		}
		$Vortqlloirgz += $V2n430jknk35z1;

		
		$V2n430jknk35z2 = self::_GetInt2d($Vqcst2xnrxwx, $Vortqlloirgz);
		$Vortqlloirgz += 2;

		
		$Vortqlloirgz += 2;

		
		$V22ivdjjfdx22 = substr($Vqcst2xnrxwx, $Vortqlloirgz, $V2n430jknk35z2);
		$V22ivdjjfdx22 = pack('v', $V2n430jknk35z2) . $V22ivdjjfdx22; 
		try {
			$V22ivdjjfdx22 = $this->_getFormulaFromStructure($V22ivdjjfdx22);
		} catch (PHPExcel_Exception $Vnhm0uuykimv) {
			return;
		}
		$Vortqlloirgz += $V2n430jknk35z2;

		
		$Vblc1ueqvbtiRangeAddressList = $this->_readBIFF8CellRangeAddressList(substr($Vqcst2xnrxwx, $Vortqlloirgz));
		$Vblc1ueqvbtiRangeAddresses = $Vblc1ueqvbtiRangeAddressList['cellRangeAddresses'];

		foreach ($Vblc1ueqvbtiRangeAddresses as $Vblc1ueqvbtiRange) {
			$V2n430jknk35tRange = $this->_phpSheet->shrinkRangeToFit($Vblc1ueqvbtiRange);
			$V2n430jknk35tRange = PHPExcel_Cell::extractAllCellReferencesInRange($V2n430jknk35tRange);
			foreach ($V2n430jknk35tRange as $V4y0urwpnd3joordinate) {
				$Vxvi2fem1djfValidation = $this->_phpSheet->getCell($V4y0urwpnd3joordinate)->getDataValidation();
				$Vxvi2fem1djfValidation->setType($V4pigtpor0ln);
				$Vxvi2fem1djfValidation->setErrorStyle($Vnhm0uuykimvrrorStyle);
				$Vxvi2fem1djfValidation->setAllowBlank((bool)$Vskhclrhu4p4);
				$Vxvi2fem1djfValidation->setShowInputMessage((bool)$V2n430jknk35howInputMessage);
				$Vxvi2fem1djfValidation->setShowErrorMessage((bool)$V2n430jknk35howErrorMessage);
				$Vxvi2fem1djfValidation->setShowDropDown(!$V2n430jknk35uppressDropDown);
				$Vxvi2fem1djfValidation->setOperator($Vrs2mt5pfpsvperator);
				$Vxvi2fem1djfValidation->setErrorTitle($Vnhm0uuykimvrrorTitle);
				$Vxvi2fem1djfValidation->setError($Vnhm0uuykimvrror);
				$Vxvi2fem1djfValidation->setPromptTitle($Vw3f5ld2df3d);
				$Vxvi2fem1djfValidation->setPrompt($Vrw1ksaz1srx);
				$Vxvi2fem1djfValidation->setFormula1($V22ivdjjfdx21);
				$Vxvi2fem1djfValidation->setFormula2($V22ivdjjfdx22);
			}
		}

	}


	
	private function _readSheetLayout()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$Vortqlloirgz = 0;

		if (!$this->_readDataOnly) {
			

			

			
			
			$V2n430jknk35z = self::_GetInt4d($Vqcst2xnrxwx, 12);

			switch ($V2n430jknk35z) {
				case 0x14:
					
					$Vl5jzlxo3j3nIndex = self::_GetInt2d($Vqcst2xnrxwx, 16);
					$Vl5jzlxo3j3n = self::_readColor($Vl5jzlxo3j3nIndex,$this->_palette,$this->_version);
					$this->_phpSheet->getTabColor()->setRGB($Vl5jzlxo3j3n['rgb']);
					break;

				case 0x28:
					
					return;
					break;
			}
		}
	}


	
	private function _readSheetProtection()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		if ($this->_readDataOnly) {
			return;
		}

		

		

		

		
		$Vfhiq1lhsojasf = self::_GetInt2d($Vqcst2xnrxwx, 12);
		if ($Vfhiq1lhsojasf != 2) {
			return;
		}

		

		

		
		
		$Vrs2mt5pfpsvptions = self::_GetInt2d($Vqcst2xnrxwx, 19);

		
		$V42jxaoxfe44 = (0x0001 & $Vrs2mt5pfpsvptions) >> 0;
		$this->_phpSheet->getProtection()->setObjects(!$V42jxaoxfe44);

		
		$V42jxaoxfe44 = (0x0002 & $Vrs2mt5pfpsvptions) >> 1;
		$this->_phpSheet->getProtection()->setScenarios(!$V42jxaoxfe44);

		
		$V42jxaoxfe44 = (0x0004 & $Vrs2mt5pfpsvptions) >> 2;
		$this->_phpSheet->getProtection()->setFormatCells(!$V42jxaoxfe44);

		
		$V42jxaoxfe44 = (0x0008 & $Vrs2mt5pfpsvptions) >> 3;
		$this->_phpSheet->getProtection()->setFormatColumns(!$V42jxaoxfe44);

		
		$V42jxaoxfe44 = (0x0010 & $Vrs2mt5pfpsvptions) >> 4;
		$this->_phpSheet->getProtection()->setFormatRows(!$V42jxaoxfe44);

		
		$V42jxaoxfe44 = (0x0020 & $Vrs2mt5pfpsvptions) >> 5;
		$this->_phpSheet->getProtection()->setInsertColumns(!$V42jxaoxfe44);

		
		$V42jxaoxfe44 = (0x0040 & $Vrs2mt5pfpsvptions) >> 6;
		$this->_phpSheet->getProtection()->setInsertRows(!$V42jxaoxfe44);

		
		$V42jxaoxfe44 = (0x0080 & $Vrs2mt5pfpsvptions) >> 7;
		$this->_phpSheet->getProtection()->setInsertHyperlinks(!$V42jxaoxfe44);

		
		$V42jxaoxfe44 = (0x0100 & $Vrs2mt5pfpsvptions) >> 8;
		$this->_phpSheet->getProtection()->setDeleteColumns(!$V42jxaoxfe44);

		
		$V42jxaoxfe44 = (0x0200 & $Vrs2mt5pfpsvptions) >> 9;
		$this->_phpSheet->getProtection()->setDeleteRows(!$V42jxaoxfe44);

		
		$V42jxaoxfe44 = (0x0400 & $Vrs2mt5pfpsvptions) >> 10;
		$this->_phpSheet->getProtection()->setSelectLockedCells(!$V42jxaoxfe44);

		
		$V42jxaoxfe44 = (0x0800 & $Vrs2mt5pfpsvptions) >> 11;
		$this->_phpSheet->getProtection()->setSort(!$V42jxaoxfe44);

		
		$V42jxaoxfe44 = (0x1000 & $Vrs2mt5pfpsvptions) >> 12;
		$this->_phpSheet->getProtection()->setAutoFilter(!$V42jxaoxfe44);

		
		$V42jxaoxfe44 = (0x2000 & $Vrs2mt5pfpsvptions) >> 13;
		$this->_phpSheet->getProtection()->setPivotTables(!$V42jxaoxfe44);

		
		$V42jxaoxfe44 = (0x4000 & $Vrs2mt5pfpsvptions) >> 14;
		$this->_phpSheet->getProtection()->setSelectUnlockedCells(!$V42jxaoxfe44);

		
	}


	
	private function _readRangeProtection()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		$this->_pos += 4 + $Volq3gdvkuqp;

		
		$Vortqlloirgz = 0;

		if (!$this->_readDataOnly) {
			$Vortqlloirgz += 12;

			
			$Vfhiq1lhsojasf = self::_GetInt2d($Vqcst2xnrxwx, 12);
			if ($Vfhiq1lhsojasf != 2) {
				
				return;
			}
			$Vortqlloirgz += 2;

			$Vortqlloirgz += 5;

			
			$V4y0urwpnd3jref = self::_GetInt2d($Vqcst2xnrxwx, 19);
			$Vortqlloirgz += 2;

			$Vortqlloirgz += 6;

			
			$Vblc1ueqvbtiRanges = array();
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V4y0urwpnd3jref; ++$Vfhiq1lhsoja) {
				try {
					$Vblc1ueqvbtiRange = $this->_readBIFF8CellRangeAddressFixed(substr($Vqcst2xnrxwx, 27 + 8 * $Vfhiq1lhsoja, 8));
				} catch (PHPExcel_Exception $Vnhm0uuykimv) {
					return;
				}
				$Vblc1ueqvbtiRanges[] = $Vblc1ueqvbtiRange;
				$Vortqlloirgz += 8;
			}

			
			$Vvw25icbq1ygFeat = substr($Vqcst2xnrxwx, $Vortqlloirgz);
			$Vortqlloirgz += 4;

			
			$Vvile0qfqbd0 = self::_GetInt4d($Vqcst2xnrxwx, $Vortqlloirgz);
			$Vortqlloirgz += 4;

			
			if ($Vblc1ueqvbtiRanges) {
				$this->_phpSheet->protectCells(implode(' ', $Vblc1ueqvbtiRanges), strtoupper(dechex($Vvile0qfqbd0)), true);
			}
		}
	}


	
	private function _readImData()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);

		
		$V2n430jknk35plicedRecordData = $this->_getSplicedRecordData();
		$Vqcst2xnrxwx = $V2n430jknk35plicedRecordData['recordData'];

		

		
		$Vxtnh2mt3dyh = self::_GetInt2d($Vqcst2xnrxwx, 0);

		
		$Vnhm0uuykimvnv = self::_GetInt2d($Vqcst2xnrxwx, 2);

		
		$Vac03inwrzffb = self::_GetInt4d($Vqcst2xnrxwx, 4);

		
		$Vfhiq1lhsojaData = substr($Vqcst2xnrxwx, 8);

		switch ($Vxtnh2mt3dyh) {
		case 0x09: 
			
			
			
			$Vw0vxh00wnxh = self::_GetInt4d($Vfhiq1lhsojaData, 0);


			
			$Vtt1whgdz3mm = self::_GetInt2d($Vfhiq1lhsojaData, 4);


			
			$Vdqemt0sgjph = self::_GetInt2d($Vfhiq1lhsojaData, 6);

			$Vwrd3zbtr2p0 = imagecreatetruecolor($Vtt1whgdz3mm, $Vdqemt0sgjph);

			

			
			$Va1f4uz33f4z = self::_GetInt2d($Vfhiq1lhsojaData, 10);


			$Vvw25icbq1ygString = substr($Vfhiq1lhsojaData, 12);
			$Vvw25icbq1ygTriples = array();
			while (strlen($Vvw25icbq1ygString) > 0) {
				$Vvw25icbq1ygTriples[] = unpack('Cb/Cg/Cr', $Vvw25icbq1ygString);
				$Vvw25icbq1ygString = substr($Vvw25icbq1ygString, 3);
			}
			$V1e1eaicqarh = 0;
			$Vqwmp2bx0ii2 = 0;
			foreach ($Vvw25icbq1ygTriples as $Vfhiq1lhsoja => $Vvw25icbq1ygTriple) {
				$Vl5jzlxo3j3n = imagecolorallocate($Vwrd3zbtr2p0, $Vvw25icbq1ygTriple['r'], $Vvw25icbq1ygTriple['g'], $Vvw25icbq1ygTriple['b']);
				imagesetpixel($Vwrd3zbtr2p0, $V1e1eaicqarh, $Vdqemt0sgjph - 1 - $Vqwmp2bx0ii2, $Vl5jzlxo3j3n);
				$V1e1eaicqarh = ($V1e1eaicqarh + 1) % $Vtt1whgdz3mm;
				$Vqwmp2bx0ii2 = $Vqwmp2bx0ii2 + floor(($V1e1eaicqarh + 1) / $Vtt1whgdz3mm);
			}
			

			$V2jgycs0t2az = new PHPExcel_Worksheet_Drawing();
			$V2jgycs0t2az->setPath($Vv0mtkrhebac);
			$V2jgycs0t2az->setWorksheet($this->_phpSheet);

			break;

		case 0x02: 
		case 0x0e: 
		default;
			break;

		}

		
	}


	
	private function _readContinue()
	{
		$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
		$Vqcst2xnrxwx = $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

		
		
		if ($this->_drawingData == '') {
			
			$this->_pos += 4 + $Volq3gdvkuqp;

			return;
		}

		
		if ($Volq3gdvkuqp < 4) {
			
			$this->_pos += 4 + $Volq3gdvkuqp;

			return;
		}

		
		
		
		
		
		
		$Vnpuunvb1rc2 = array(0xF003, 0xF004, 0xF00D); 

		$V2n430jknk35plitPoint = self::_GetInt2d($Vqcst2xnrxwx, 2);
		if (in_array($V2n430jknk35plitPoint, $Vnpuunvb1rc2)) {
			
			$V2n430jknk35plicedRecordData = $this->_getSplicedRecordData();
			$this->_drawingData .= $V2n430jknk35plicedRecordData['recordData'];

			return;
		}

		
		$this->_pos += 4 + $Volq3gdvkuqp;

	}


	
	private function _getSplicedRecordData()
	{
		$Vou4vxorrdoe = '';
		$V2n430jknk35pliceOffsets = array();

		$Vfhiq1lhsoja = 0;
		$V2n430jknk35pliceOffsets[0] = 0;

		do {
			++$Vfhiq1lhsoja;

			
			$Vfhiq1lhsojadentifier = self::_GetInt2d($this->_data, $this->_pos);
			
			$Volq3gdvkuqp = self::_GetInt2d($this->_data, $this->_pos + 2);
			$Vou4vxorrdoe .= $this->_readRecordData($this->_data, $this->_pos + 4, $Volq3gdvkuqp);

			$V2n430jknk35pliceOffsets[$Vfhiq1lhsoja] = $V2n430jknk35pliceOffsets[$Vfhiq1lhsoja - 1] + $Volq3gdvkuqp;

			$this->_pos += 4 + $Volq3gdvkuqp;
			$Vmwwo1qnmepzextIdentifier = self::_GetInt2d($this->_data, $this->_pos);
		}
		while ($Vmwwo1qnmepzextIdentifier == self::XLS_Type_CONTINUE);

		$V2n430jknk35plicedData = array(
			'recordData' => $Vou4vxorrdoe,
			'spliceOffsets' => $V2n430jknk35pliceOffsets,
		);

		return $V2n430jknk35plicedData;

	}


	
	private function _getFormulaFromStructure($V22ivdjjfdx2Structure, $V4ptkkricfpr = 'A1')
	{
		
		$V2n430jknk35z = self::_GetInt2d($V22ivdjjfdx2Structure, 0);

		
		$V22ivdjjfdx2Data = substr($V22ivdjjfdx2Structure, 2, $V2n430jknk35z);

		
		
		
		
		
		

		
		if (strlen($V22ivdjjfdx2Structure) > 2 + $V2n430jknk35z) {
			$Vcsniv3gimlk = substr($V22ivdjjfdx2Structure, 2 + $V2n430jknk35z);

			
			
			
			

		} else {
			$Vcsniv3gimlk = '';
		}

		return $this->_getFormulaFromData($V22ivdjjfdx2Data, $Vcsniv3gimlk, $V4ptkkricfpr);
	}


	
	private function _getFormulaFromData($V22ivdjjfdx2Data,  $Vcsniv3gimlk = '', $V4ptkkricfpr = 'A1')
	{
		
		$Vp5z410ggrzw = array();

		while (strlen($V22ivdjjfdx2Data) > 0 and $Vmrycxs3rwag = $this->_getNextToken($V22ivdjjfdx2Data, $V4ptkkricfpr)) {
			$Vp5z410ggrzw[] = $Vmrycxs3rwag;
			$V22ivdjjfdx2Data = substr($V22ivdjjfdx2Data, $Vmrycxs3rwag['size']);

			
			
		}

		$V22ivdjjfdx2String = $this->_createFormulaFromTokens($Vp5z410ggrzw, $Vcsniv3gimlk);

		return $V22ivdjjfdx2String;
	}


	
	private function _createFormulaFromTokens($Vp5z410ggrzw, $Vcsniv3gimlk)
	{
		
		if (empty($Vp5z410ggrzw)) {
			return '';
		}

		$V22ivdjjfdx2Strings = array();
		foreach ($Vp5z410ggrzw as $Vmrycxs3rwag) {
			
			$V2n430jknk35pace0 = isset($V2n430jknk35pace0) ? $V2n430jknk35pace0 : ''; 
			$V2n430jknk35pace1 = isset($V2n430jknk35pace1) ? $V2n430jknk35pace1 : ''; 
			$V2n430jknk35pace2 = isset($V2n430jknk35pace2) ? $V2n430jknk35pace2 : ''; 
			$V2n430jknk35pace3 = isset($V2n430jknk35pace3) ? $V2n430jknk35pace3 : ''; 
			$V2n430jknk35pace4 = isset($V2n430jknk35pace4) ? $V2n430jknk35pace4 : ''; 
			$V2n430jknk35pace5 = isset($V2n430jknk35pace5) ? $V2n430jknk35pace5 : ''; 

			switch ($Vmrycxs3rwag['name']) {
			case 'tAdd': 
			case 'tConcat': 
			case 'tDiv': 
			case 'tEQ': 
			case 'tGE': 
			case 'tGT': 
			case 'tIsect': 
			case 'tLE': 
			case 'tList': 
			case 'tLT': 
			case 'tMul': 
			case 'tNE': 
			case 'tPower': 
			case 'tRange': 
			case 'tSub': 
				$Vrs2mt5pfpsvp2 = array_pop($V22ivdjjfdx2Strings);
				$Vrs2mt5pfpsvp1 = array_pop($V22ivdjjfdx2Strings);
				$V22ivdjjfdx2Strings[] = "$Vrs2mt5pfpsvp1$V2n430jknk35pace1$V2n430jknk35pace0{$Vmrycxs3rwag['data']}$Vrs2mt5pfpsvp2";
				unset($V2n430jknk35pace0, $V2n430jknk35pace1);
				break;
			case 'tUplus': 
			case 'tUminus': 
				$Vrs2mt5pfpsvp = array_pop($V22ivdjjfdx2Strings);
				$V22ivdjjfdx2Strings[] = "$V2n430jknk35pace1$V2n430jknk35pace0{$Vmrycxs3rwag['data']}$Vrs2mt5pfpsvp";
				unset($V2n430jknk35pace0, $V2n430jknk35pace1);
				break;
			case 'tPercent': 
				$Vrs2mt5pfpsvp = array_pop($V22ivdjjfdx2Strings);
				$V22ivdjjfdx2Strings[] = "$Vrs2mt5pfpsvp$V2n430jknk35pace1$V2n430jknk35pace0{$Vmrycxs3rwag['data']}";
				unset($V2n430jknk35pace0, $V2n430jknk35pace1);
				break;
			case 'tAttrVolatile': 
			case 'tAttrIf':
			case 'tAttrSkip':
			case 'tAttrChoose':
				
				
				break;
			case 'tAttrSpace': 
				
				switch ($Vmrycxs3rwag['data']['spacetype']) {
				case 'type0':
					$V2n430jknk35pace0 = str_repeat(' ', $Vmrycxs3rwag['data']['spacecount']);
					break;
				case 'type1':
					$V2n430jknk35pace1 = str_repeat("\n", $Vmrycxs3rwag['data']['spacecount']);
					break;
				case 'type2':
					$V2n430jknk35pace2 = str_repeat(' ', $Vmrycxs3rwag['data']['spacecount']);
					break;
				case 'type3':
					$V2n430jknk35pace3 = str_repeat("\n", $Vmrycxs3rwag['data']['spacecount']);
					break;
				case 'type4':
					$V2n430jknk35pace4 = str_repeat(' ', $Vmrycxs3rwag['data']['spacecount']);
					break;
				case 'type5':
					$V2n430jknk35pace5 = str_repeat("\n", $Vmrycxs3rwag['data']['spacecount']);
					break;
				}
				break;
			case 'tAttrSum': 
				$Vrs2mt5pfpsvp = array_pop($V22ivdjjfdx2Strings);
				$V22ivdjjfdx2Strings[] = "{$V2n430jknk35pace1}{$V2n430jknk35pace0}SUM($Vrs2mt5pfpsvp)";
				unset($V2n430jknk35pace0, $V2n430jknk35pace1);
				break;
			case 'tFunc': 
			case 'tFuncV': 
				if ($Vmrycxs3rwag['data']['function'] != '') {
					
					$Vrs2mt5pfpsvps = array(); 
					for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vmrycxs3rwag['data']['args']; ++$Vfhiq1lhsoja) {
						$Vrs2mt5pfpsvps[] = array_pop($V22ivdjjfdx2Strings);
					}
					$Vrs2mt5pfpsvps = array_reverse($Vrs2mt5pfpsvps);
					$V22ivdjjfdx2Strings[] = "$V2n430jknk35pace1$V2n430jknk35pace0{$Vmrycxs3rwag['data']['function']}(" . implode(',', $Vrs2mt5pfpsvps) . ")";
					unset($V2n430jknk35pace0, $V2n430jknk35pace1);
				} else {
					
					$Vrs2mt5pfpsvps = array(); 
					for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vmrycxs3rwag['data']['args'] - 1; ++$Vfhiq1lhsoja) {
						$Vrs2mt5pfpsvps[] = array_pop($V22ivdjjfdx2Strings);
					}
					$Vrs2mt5pfpsvps = array_reverse($Vrs2mt5pfpsvps);
					$Vubssx3efpny = array_pop($V22ivdjjfdx2Strings);
					$V22ivdjjfdx2Strings[] = "$V2n430jknk35pace1$V2n430jknk35pace0$Vubssx3efpny(" . implode(',', $Vrs2mt5pfpsvps) . ")";
					unset($V2n430jknk35pace0, $V2n430jknk35pace1);
				}
				break;
			case 'tParen': 
				$Vnhm0uuykimvxpression = array_pop($V22ivdjjfdx2Strings);
				$V22ivdjjfdx2Strings[] = "$V2n430jknk35pace3$V2n430jknk35pace2($Vnhm0uuykimvxpression$V2n430jknk35pace5$V2n430jknk35pace4)";
				unset($V2n430jknk35pace2, $V2n430jknk35pace3, $V2n430jknk35pace4, $V2n430jknk35pace5);
				break;
			case 'tArray': 
				$V4y0urwpnd3jonstantArray = self::_readBIFF8ConstantArray($Vcsniv3gimlk);
				$V22ivdjjfdx2Strings[] = $V2n430jknk35pace1 . $V2n430jknk35pace0 . $V4y0urwpnd3jonstantArray['value'];
				$Vcsniv3gimlk = substr($Vcsniv3gimlk, $V4y0urwpnd3jonstantArray['size']); 
				unset($V2n430jknk35pace0, $V2n430jknk35pace1);
				break;
			case 'tMemArea':
				
				$Vblc1ueqvbtiRangeAddressList = $this->_readBIFF8CellRangeAddressList($Vcsniv3gimlk);
				$Vcsniv3gimlk = substr($Vcsniv3gimlk, $Vblc1ueqvbtiRangeAddressList['size']);
				$V22ivdjjfdx2Strings[] = "$V2n430jknk35pace1$V2n430jknk35pace0{$Vmrycxs3rwag['data']}";
				unset($V2n430jknk35pace0, $V2n430jknk35pace1);
				break;
			case 'tArea': 
			case 'tBool': 
			case 'tErr': 
			case 'tInt': 
			case 'tMemErr':
			case 'tMemFunc':
			case 'tMissArg':
			case 'tName':
			case 'tNameX':
			case 'tNum': 
			case 'tRef': 
			case 'tRef3d': 
			case 'tArea3d': 
			case 'tRefN':
			case 'tAreaN':
			case 'tStr': 
				$V22ivdjjfdx2Strings[] = "$V2n430jknk35pace1$V2n430jknk35pace0{$Vmrycxs3rwag['data']}";
				unset($V2n430jknk35pace0, $V2n430jknk35pace1);
				break;
			}
		}
		$V22ivdjjfdx2String = $V22ivdjjfdx2Strings[0];

		
		
		

		return $V22ivdjjfdx2String;
	}


	
	private function _getNextToken($V22ivdjjfdx2Data, $V4ptkkricfpr = 'A1')
	{
		
		$Vfhiq1lhsojad = ord($V22ivdjjfdx2Data[0]); 
		$Vmwwo1qnmepzame = false; 

		switch ($Vfhiq1lhsojad) {
		case 0x03: $Vmwwo1qnmepzame = 'tAdd';		$V2n430jknk35ize = 1;	$Vou4vxorrdoe = '+';	break;
		case 0x04: $Vmwwo1qnmepzame = 'tSub';		$V2n430jknk35ize = 1;	$Vou4vxorrdoe = '-';	break;
		case 0x05: $Vmwwo1qnmepzame = 'tMul';		$V2n430jknk35ize = 1;	$Vou4vxorrdoe = '*';	break;
		case 0x06: $Vmwwo1qnmepzame = 'tDiv';		$V2n430jknk35ize = 1;	$Vou4vxorrdoe = '/';	break;
		case 0x07: $Vmwwo1qnmepzame = 'tPower';	$V2n430jknk35ize = 1;	$Vou4vxorrdoe = '^';	break;
		case 0x08: $Vmwwo1qnmepzame = 'tConcat';	$V2n430jknk35ize = 1;	$Vou4vxorrdoe = '&';	break;
		case 0x09: $Vmwwo1qnmepzame = 'tLT';		$V2n430jknk35ize = 1;	$Vou4vxorrdoe = '<';	break;
		case 0x0A: $Vmwwo1qnmepzame = 'tLE';		$V2n430jknk35ize = 1;	$Vou4vxorrdoe = '<=';	break;
		case 0x0B: $Vmwwo1qnmepzame = 'tEQ';		$V2n430jknk35ize = 1;	$Vou4vxorrdoe = '=';	break;
		case 0x0C: $Vmwwo1qnmepzame = 'tGE';		$V2n430jknk35ize = 1;	$Vou4vxorrdoe = '>=';	break;
		case 0x0D: $Vmwwo1qnmepzame = 'tGT';		$V2n430jknk35ize = 1;	$Vou4vxorrdoe = '>';	break;
		case 0x0E: $Vmwwo1qnmepzame = 'tNE';		$V2n430jknk35ize = 1;	$Vou4vxorrdoe = '<>';	break;
		case 0x0F: $Vmwwo1qnmepzame = 'tIsect';	$V2n430jknk35ize = 1;	$Vou4vxorrdoe = ' ';	break;
		case 0x10: $Vmwwo1qnmepzame = 'tList';		$V2n430jknk35ize = 1;	$Vou4vxorrdoe = ',';	break;
		case 0x11: $Vmwwo1qnmepzame = 'tRange';	$V2n430jknk35ize = 1;	$Vou4vxorrdoe = ':';	break;
		case 0x12: $Vmwwo1qnmepzame = 'tUplus';	$V2n430jknk35ize = 1;	$Vou4vxorrdoe = '+';	break;
		case 0x13: $Vmwwo1qnmepzame = 'tUminus';	$V2n430jknk35ize = 1;	$Vou4vxorrdoe = '-';	break;
		case 0x14: $Vmwwo1qnmepzame = 'tPercent';	$V2n430jknk35ize = 1;	$Vou4vxorrdoe = '%';	break;
		case 0x15:	
			$Vmwwo1qnmepzame  = 'tParen';
			$V2n430jknk35ize  = 1;
			$Vou4vxorrdoe = null;
			break;
		case 0x16:	
			$Vmwwo1qnmepzame = 'tMissArg';
			$V2n430jknk35ize = 1;
			$Vou4vxorrdoe = '';
			break;
		case 0x17:	
			$Vmwwo1qnmepzame = 'tStr';
			
			$V2n430jknk35tring = self::_readUnicodeStringShort(substr($V22ivdjjfdx2Data, 1));
			$V2n430jknk35ize = 1 + $V2n430jknk35tring['size'];
			$Vou4vxorrdoe = self::_UTF8toExcelDoubleQuoted($V2n430jknk35tring['value']);
			break;
		case 0x19:	
			
			switch (ord($V22ivdjjfdx2Data[1])) {
			case 0x01:
				$Vmwwo1qnmepzame = 'tAttrVolatile';
				$V2n430jknk35ize = 4;
				$Vou4vxorrdoe = null;
				break;
			case 0x02:
				$Vmwwo1qnmepzame = 'tAttrIf';
				$V2n430jknk35ize = 4;
				$Vou4vxorrdoe = null;
				break;
			case 0x04:
				$Vmwwo1qnmepzame = 'tAttrChoose';
				
				$Vmwwo1qnmepzc = self::_GetInt2d($V22ivdjjfdx2Data, 2);
				
				
				$V2n430jknk35ize = 2 * $Vmwwo1qnmepzc + 6;
				$Vou4vxorrdoe = null;
				break;
			case 0x08:
				$Vmwwo1qnmepzame = 'tAttrSkip';
				$V2n430jknk35ize = 4;
				$Vou4vxorrdoe = null;
				break;
			case 0x10:
				$Vmwwo1qnmepzame = 'tAttrSum';
				$V2n430jknk35ize = 4;
				$Vou4vxorrdoe = null;
				break;
			case 0x40:
			case 0x41:
				$Vmwwo1qnmepzame = 'tAttrSpace';
				$V2n430jknk35ize = 4;
				
				switch (ord($V22ivdjjfdx2Data[2])) {
				case 0x00:
					$V2n430jknk35pacetype = 'type0';
					break;
				case 0x01:
					$V2n430jknk35pacetype = 'type1';
					break;
				case 0x02:
					$V2n430jknk35pacetype = 'type2';
					break;
				case 0x03:
					$V2n430jknk35pacetype = 'type3';
					break;
				case 0x04:
					$V2n430jknk35pacetype = 'type4';
					break;
				case 0x05:
					$V2n430jknk35pacetype = 'type5';
					break;
				default:
					throw new PHPExcel_Reader_Exception('Unrecognized space type in tAttrSpace token');
					break;
				}
				
				$V2n430jknk35pacecount = ord($V22ivdjjfdx2Data[3]);

				$Vou4vxorrdoe = array('spacetype' => $V2n430jknk35pacetype, 'spacecount' => $V2n430jknk35pacecount);
				break;
			default:
				throw new PHPExcel_Reader_Exception('Unrecognized attribute flag in tAttr token');
				break;
			}
			break;
		case 0x1C:	
			
			$Vmwwo1qnmepzame = 'tErr';
			$V2n430jknk35ize = 2;
			$Vou4vxorrdoe = self::_mapErrorCode(ord($V22ivdjjfdx2Data[1]));
			break;
		case 0x1D:	
			
			$Vmwwo1qnmepzame = 'tBool';
			$V2n430jknk35ize = 2;
			$Vou4vxorrdoe = ord($V22ivdjjfdx2Data[1]) ? 'TRUE' : 'FALSE';
			break;
		case 0x1E:	
			
			$Vmwwo1qnmepzame = 'tInt';
			$V2n430jknk35ize = 3;
			$Vou4vxorrdoe = self::_GetInt2d($V22ivdjjfdx2Data, 1);
			break;
		case 0x1F:	
			
			$Vmwwo1qnmepzame = 'tNum';
			$V2n430jknk35ize = 9;
			$Vou4vxorrdoe = self::_extractNumber(substr($V22ivdjjfdx2Data, 1));
			$Vou4vxorrdoe = str_replace(',', '.', (string)$Vou4vxorrdoe); 
			break;
		case 0x20:	
		case 0x40:
		case 0x60:
			
			$Vmwwo1qnmepzame = 'tArray';
			$V2n430jknk35ize = 8;
			$Vou4vxorrdoe = null;
			break;
		case 0x21:	
		case 0x41:
		case 0x61:
			$Vmwwo1qnmepzame = 'tFunc';
			$V2n430jknk35ize = 3;
			
			switch (self::_GetInt2d($V22ivdjjfdx2Data, 1)) {
			case   2: $Vubssx3efpny = 'ISNA'; 			$Vrukcxz5icxf = 1; 	break;
			case   3: $Vubssx3efpny = 'ISERROR'; 		$Vrukcxz5icxf = 1; 	break;
			case  10: $Vubssx3efpny = 'NA'; 			$Vrukcxz5icxf = 0; 	break;
			case  15: $Vubssx3efpny = 'SIN'; 			$Vrukcxz5icxf = 1; 	break;
			case  16: $Vubssx3efpny = 'COS'; 			$Vrukcxz5icxf = 1; 	break;
			case  17: $Vubssx3efpny = 'TAN'; 			$Vrukcxz5icxf = 1; 	break;
			case  18: $Vubssx3efpny = 'ATAN'; 			$Vrukcxz5icxf = 1; 	break;
			case  19: $Vubssx3efpny = 'PI'; 			$Vrukcxz5icxf = 0; 	break;
			case  20: $Vubssx3efpny = 'SQRT'; 			$Vrukcxz5icxf = 1; 	break;
			case  21: $Vubssx3efpny = 'EXP'; 			$Vrukcxz5icxf = 1; 	break;
			case  22: $Vubssx3efpny = 'LN'; 			$Vrukcxz5icxf = 1; 	break;
			case  23: $Vubssx3efpny = 'LOG10'; 			$Vrukcxz5icxf = 1; 	break;
			case  24: $Vubssx3efpny = 'ABS'; 			$Vrukcxz5icxf = 1; 	break;
			case  25: $Vubssx3efpny = 'INT'; 			$Vrukcxz5icxf = 1; 	break;
			case  26: $Vubssx3efpny = 'SIGN'; 			$Vrukcxz5icxf = 1; 	break;
			case  27: $Vubssx3efpny = 'ROUND'; 			$Vrukcxz5icxf = 2; 	break;
			case  30: $Vubssx3efpny = 'REPT'; 			$Vrukcxz5icxf = 2; 	break;
			case  31: $Vubssx3efpny = 'MID'; 			$Vrukcxz5icxf = 3; 	break;
			case  32: $Vubssx3efpny = 'LEN'; 			$Vrukcxz5icxf = 1; 	break;
			case  33: $Vubssx3efpny = 'VALUE'; 			$Vrukcxz5icxf = 1; 	break;
			case  34: $Vubssx3efpny = 'TRUE'; 			$Vrukcxz5icxf = 0; 	break;
			case  35: $Vubssx3efpny = 'FALSE'; 			$Vrukcxz5icxf = 0; 	break;
			case  38: $Vubssx3efpny = 'NOT'; 			$Vrukcxz5icxf = 1; 	break;
			case  39: $Vubssx3efpny = 'MOD'; 			$Vrukcxz5icxf = 2;	break;
			case  40: $Vubssx3efpny = 'DCOUNT'; 		$Vrukcxz5icxf = 3;	break;
			case  41: $Vubssx3efpny = 'DSUM'; 			$Vrukcxz5icxf = 3;	break;
			case  42: $Vubssx3efpny = 'DAVERAGE'; 		$Vrukcxz5icxf = 3;	break;
			case  43: $Vubssx3efpny = 'DMIN'; 			$Vrukcxz5icxf = 3;	break;
			case  44: $Vubssx3efpny = 'DMAX'; 			$Vrukcxz5icxf = 3;	break;
			case  45: $Vubssx3efpny = 'DSTDEV'; 		$Vrukcxz5icxf = 3;	break;
			case  48: $Vubssx3efpny = 'TEXT'; 			$Vrukcxz5icxf = 2;	break;
			case  61: $Vubssx3efpny = 'MIRR'; 			$Vrukcxz5icxf = 3;	break;
			case  63: $Vubssx3efpny = 'RAND'; 			$Vrukcxz5icxf = 0;	break;
			case  65: $Vubssx3efpny = 'DATE'; 			$Vrukcxz5icxf = 3;	break;
			case  66: $Vubssx3efpny = 'TIME'; 			$Vrukcxz5icxf = 3;	break;
			case  67: $Vubssx3efpny = 'DAY'; 			$Vrukcxz5icxf = 1;	break;
			case  68: $Vubssx3efpny = 'MONTH'; 			$Vrukcxz5icxf = 1;	break;
			case  69: $Vubssx3efpny = 'YEAR'; 			$Vrukcxz5icxf = 1;	break;
			case  71: $Vubssx3efpny = 'HOUR'; 			$Vrukcxz5icxf = 1;	break;
			case  72: $Vubssx3efpny = 'MINUTE'; 		$Vrukcxz5icxf = 1;	break;
			case  73: $Vubssx3efpny = 'SECOND'; 		$Vrukcxz5icxf = 1;	break;
			case  74: $Vubssx3efpny = 'NOW'; 			$Vrukcxz5icxf = 0;	break;
			case  75: $Vubssx3efpny = 'AREAS'; 			$Vrukcxz5icxf = 1;	break;
			case  76: $Vubssx3efpny = 'ROWS'; 			$Vrukcxz5icxf = 1;	break;
			case  77: $Vubssx3efpny = 'COLUMNS'; 		$Vrukcxz5icxf = 1;	break;
			case  83: $Vubssx3efpny = 'TRANSPOSE'; 		$Vrukcxz5icxf = 1;	break;
			case  86: $Vubssx3efpny = 'TYPE'; 			$Vrukcxz5icxf = 1;	break;
			case  97: $Vubssx3efpny = 'ATAN2'; 			$Vrukcxz5icxf = 2;	break;
			case  98: $Vubssx3efpny = 'ASIN'; 			$Vrukcxz5icxf = 1;	break;
			case  99: $Vubssx3efpny = 'ACOS'; 			$Vrukcxz5icxf = 1;	break;
			case 105: $Vubssx3efpny = 'ISREF'; 			$Vrukcxz5icxf = 1;	break;
			case 111: $Vubssx3efpny = 'CHAR'; 			$Vrukcxz5icxf = 1;	break;
			case 112: $Vubssx3efpny = 'LOWER'; 			$Vrukcxz5icxf = 1;	break;
			case 113: $Vubssx3efpny = 'UPPER'; 			$Vrukcxz5icxf = 1;	break;
			case 114: $Vubssx3efpny = 'PROPER'; 		$Vrukcxz5icxf = 1;	break;
			case 117: $Vubssx3efpny = 'EXACT'; 			$Vrukcxz5icxf = 2;	break;
			case 118: $Vubssx3efpny = 'TRIM'; 			$Vrukcxz5icxf = 1;	break;
			case 119: $Vubssx3efpny = 'REPLACE'; 		$Vrukcxz5icxf = 4;	break;
			case 121: $Vubssx3efpny = 'CODE'; 			$Vrukcxz5icxf = 1;	break;
			case 126: $Vubssx3efpny = 'ISERR'; 			$Vrukcxz5icxf = 1;	break;
			case 127: $Vubssx3efpny = 'ISTEXT'; 		$Vrukcxz5icxf = 1;	break;
			case 128: $Vubssx3efpny = 'ISNUMBER'; 		$Vrukcxz5icxf = 1;	break;
			case 129: $Vubssx3efpny = 'ISBLANK'; 		$Vrukcxz5icxf = 1;	break;
			case 130: $Vubssx3efpny = 'T'; 				$Vrukcxz5icxf = 1;	break;
			case 131: $Vubssx3efpny = 'N'; 				$Vrukcxz5icxf = 1;	break;
			case 140: $Vubssx3efpny = 'DATEVALUE'; 		$Vrukcxz5icxf = 1;	break;
			case 141: $Vubssx3efpny = 'TIMEVALUE'; 		$Vrukcxz5icxf = 1;	break;
			case 142: $Vubssx3efpny = 'SLN'; 			$Vrukcxz5icxf = 3;	break;
			case 143: $Vubssx3efpny = 'SYD'; 			$Vrukcxz5icxf = 4;	break;
			case 162: $Vubssx3efpny = 'CLEAN'; 			$Vrukcxz5icxf = 1;	break;
			case 163: $Vubssx3efpny = 'MDETERM'; 		$Vrukcxz5icxf = 1;	break;
			case 164: $Vubssx3efpny = 'MINVERSE'; 		$Vrukcxz5icxf = 1;	break;
			case 165: $Vubssx3efpny = 'MMULT'; 			$Vrukcxz5icxf = 2;	break;
			case 184: $Vubssx3efpny = 'FACT'; 			$Vrukcxz5icxf = 1;	break;
			case 189: $Vubssx3efpny = 'DPRODUCT'; 		$Vrukcxz5icxf = 3;	break;
			case 190: $Vubssx3efpny = 'ISNONTEXT'; 		$Vrukcxz5icxf = 1;	break;
			case 195: $Vubssx3efpny = 'DSTDEVP'; 		$Vrukcxz5icxf = 3;	break;
			case 196: $Vubssx3efpny = 'DVARP'; 			$Vrukcxz5icxf = 3;	break;
			case 198: $Vubssx3efpny = 'ISLOGICAL'; 		$Vrukcxz5icxf = 1;	break;
			case 199: $Vubssx3efpny = 'DCOUNTA'; 		$Vrukcxz5icxf = 3;	break;
			case 207: $Vubssx3efpny = 'REPLACEB'; 		$Vrukcxz5icxf = 4;	break;
			case 210: $Vubssx3efpny = 'MIDB'; 			$Vrukcxz5icxf = 3;	break;
			case 211: $Vubssx3efpny = 'LENB'; 			$Vrukcxz5icxf = 1;	break;
			case 212: $Vubssx3efpny = 'ROUNDUP'; 		$Vrukcxz5icxf = 2;	break;
			case 213: $Vubssx3efpny = 'ROUNDDOWN'; 		$Vrukcxz5icxf = 2;	break;
			case 214: $Vubssx3efpny = 'ASC'; 			$Vrukcxz5icxf = 1;	break;
			case 215: $Vubssx3efpny = 'DBCS'; 			$Vrukcxz5icxf = 1;	break;
			case 221: $Vubssx3efpny = 'TODAY'; 			$Vrukcxz5icxf = 0;	break;
			case 229: $Vubssx3efpny = 'SINH'; 			$Vrukcxz5icxf = 1;	break;
			case 230: $Vubssx3efpny = 'COSH'; 			$Vrukcxz5icxf = 1;	break;
			case 231: $Vubssx3efpny = 'TANH'; 			$Vrukcxz5icxf = 1;	break;
			case 232: $Vubssx3efpny = 'ASINH'; 			$Vrukcxz5icxf = 1;	break;
			case 233: $Vubssx3efpny = 'ACOSH'; 			$Vrukcxz5icxf = 1;	break;
			case 234: $Vubssx3efpny = 'ATANH'; 			$Vrukcxz5icxf = 1;	break;
			case 235: $Vubssx3efpny = 'DGET'; 			$Vrukcxz5icxf = 3;	break;
			case 244: $Vubssx3efpny = 'INFO'; 			$Vrukcxz5icxf = 1;	break;
			case 252: $Vubssx3efpny = 'FREQUENCY'; 		$Vrukcxz5icxf = 2;	break;
			case 261: $Vubssx3efpny = 'ERROR.TYPE'; 	$Vrukcxz5icxf = 1;	break;
			case 271: $Vubssx3efpny = 'GAMMALN'; 		$Vrukcxz5icxf = 1;	break;
			case 273: $Vubssx3efpny = 'BINOMDIST'; 		$Vrukcxz5icxf = 4;	break;
			case 274: $Vubssx3efpny = 'CHIDIST'; 		$Vrukcxz5icxf = 2;	break;
			case 275: $Vubssx3efpny = 'CHIINV'; 		$Vrukcxz5icxf = 2;	break;
			case 276: $Vubssx3efpny = 'COMBIN'; 		$Vrukcxz5icxf = 2;	break;
			case 277: $Vubssx3efpny = 'CONFIDENCE'; 	$Vrukcxz5icxf = 3;	break;
			case 278: $Vubssx3efpny = 'CRITBINOM'; 		$Vrukcxz5icxf = 3;	break;
			case 279: $Vubssx3efpny = 'EVEN'; 			$Vrukcxz5icxf = 1;	break;
			case 280: $Vubssx3efpny = 'EXPONDIST'; 		$Vrukcxz5icxf = 3;	break;
			case 281: $Vubssx3efpny = 'FDIST'; 			$Vrukcxz5icxf = 3;	break;
			case 282: $Vubssx3efpny = 'FINV'; 			$Vrukcxz5icxf = 3;	break;
			case 283: $Vubssx3efpny = 'FISHER'; 		$Vrukcxz5icxf = 1;	break;
			case 284: $Vubssx3efpny = 'FISHERINV'; 		$Vrukcxz5icxf = 1;	break;
			case 285: $Vubssx3efpny = 'FLOOR'; 			$Vrukcxz5icxf = 2;	break;
			case 286: $Vubssx3efpny = 'GAMMADIST'; 		$Vrukcxz5icxf = 4;	break;
			case 287: $Vubssx3efpny = 'GAMMAINV'; 		$Vrukcxz5icxf = 3;	break;
			case 288: $Vubssx3efpny = 'CEILING'; 		$Vrukcxz5icxf = 2;	break;
			case 289: $Vubssx3efpny = 'HYPGEOMDIST';	$Vrukcxz5icxf = 4;	break;
			case 290: $Vubssx3efpny = 'LOGNORMDIST';	$Vrukcxz5icxf = 3;	break;
			case 291: $Vubssx3efpny = 'LOGINV';			$Vrukcxz5icxf = 3;	break;
			case 292: $Vubssx3efpny = 'NEGBINOMDIST';	$Vrukcxz5icxf = 3;	break;
			case 293: $Vubssx3efpny = 'NORMDIST';		$Vrukcxz5icxf = 4;	break;
			case 294: $Vubssx3efpny = 'NORMSDIST';		$Vrukcxz5icxf = 1;	break;
			case 295: $Vubssx3efpny = 'NORMINV';		$Vrukcxz5icxf = 3;	break;
			case 296: $Vubssx3efpny = 'NORMSINV';		$Vrukcxz5icxf = 1;	break;
			case 297: $Vubssx3efpny = 'STANDARDIZE';	$Vrukcxz5icxf = 3;	break;
			case 298: $Vubssx3efpny = 'ODD';			$Vrukcxz5icxf = 1;	break;
			case 299: $Vubssx3efpny = 'PERMUT';			$Vrukcxz5icxf = 2;	break;
			case 300: $Vubssx3efpny = 'POISSON';		$Vrukcxz5icxf = 3;	break;
			case 301: $Vubssx3efpny = 'TDIST';			$Vrukcxz5icxf = 3;	break;
			case 302: $Vubssx3efpny = 'WEIBULL';		$Vrukcxz5icxf = 4;	break;
			case 303: $Vubssx3efpny = 'SUMXMY2';		$Vrukcxz5icxf = 2;	break;
			case 304: $Vubssx3efpny = 'SUMX2MY2';		$Vrukcxz5icxf = 2;	break;
			case 305: $Vubssx3efpny = 'SUMX2PY2';		$Vrukcxz5icxf = 2;	break;
			case 306: $Vubssx3efpny = 'CHITEST';		$Vrukcxz5icxf = 2;	break;
			case 307: $Vubssx3efpny = 'CORREL';			$Vrukcxz5icxf = 2;	break;
			case 308: $Vubssx3efpny = 'COVAR';			$Vrukcxz5icxf = 2;	break;
			case 309: $Vubssx3efpny = 'FORECAST';		$Vrukcxz5icxf = 3;	break;
			case 310: $Vubssx3efpny = 'FTEST';			$Vrukcxz5icxf = 2;	break;
			case 311: $Vubssx3efpny = 'INTERCEPT';		$Vrukcxz5icxf = 2;	break;
			case 312: $Vubssx3efpny = 'PEARSON';		$Vrukcxz5icxf = 2;	break;
			case 313: $Vubssx3efpny = 'RSQ';			$Vrukcxz5icxf = 2;	break;
			case 314: $Vubssx3efpny = 'STEYX';			$Vrukcxz5icxf = 2;	break;
			case 315: $Vubssx3efpny = 'SLOPE';			$Vrukcxz5icxf = 2;	break;
			case 316: $Vubssx3efpny = 'TTEST';			$Vrukcxz5icxf = 4;	break;
			case 325: $Vubssx3efpny = 'LARGE';			$Vrukcxz5icxf = 2;	break;
			case 326: $Vubssx3efpny = 'SMALL';			$Vrukcxz5icxf = 2;	break;
			case 327: $Vubssx3efpny = 'QUARTILE';		$Vrukcxz5icxf = 2;	break;
			case 328: $Vubssx3efpny = 'PERCENTILE';		$Vrukcxz5icxf = 2;	break;
			case 331: $Vubssx3efpny = 'TRIMMEAN';		$Vrukcxz5icxf = 2;	break;
			case 332: $Vubssx3efpny = 'TINV';			$Vrukcxz5icxf = 2;	break;
			case 337: $Vubssx3efpny = 'POWER';			$Vrukcxz5icxf = 2;	break;
			case 342: $Vubssx3efpny = 'RADIANS';		$Vrukcxz5icxf = 1;	break;
			case 343: $Vubssx3efpny = 'DEGREES';		$Vrukcxz5icxf = 1;	break;
			case 346: $Vubssx3efpny = 'COUNTIF';		$Vrukcxz5icxf = 2;	break;
			case 347: $Vubssx3efpny = 'COUNTBLANK';		$Vrukcxz5icxf = 1;	break;
			case 350: $Vubssx3efpny = 'ISPMT';			$Vrukcxz5icxf = 4;	break;
			case 351: $Vubssx3efpny = 'DATEDIF';		$Vrukcxz5icxf = 3;	break;
			case 352: $Vubssx3efpny = 'DATESTRING';		$Vrukcxz5icxf = 1;	break;
			case 353: $Vubssx3efpny = 'NUMBERSTRING';	$Vrukcxz5icxf = 2;	break;
			case 360: $Vubssx3efpny = 'PHONETIC';		$Vrukcxz5icxf = 1;	break;
			case 368: $Vubssx3efpny = 'BAHTTEXT';		$Vrukcxz5icxf = 1;	break;
			default:
				throw new PHPExcel_Reader_Exception('Unrecognized function in formula');
				break;
			}
			$Vou4vxorrdoe = array('function' => $Vubssx3efpny, 'args' => $Vrukcxz5icxf);
			break;
		case 0x22:	
		case 0x42:
		case 0x62:
			$Vmwwo1qnmepzame = 'tFuncV';
			$V2n430jknk35ize = 4;
			
			$Vrukcxz5icxf = ord($V22ivdjjfdx2Data[1]);
			
			$Vfhiq1lhsojandex = self::_GetInt2d($V22ivdjjfdx2Data, 2);
			switch ($Vfhiq1lhsojandex) {
			case   0: $Vubssx3efpny = 'COUNT';			break;
			case   1: $Vubssx3efpny = 'IF';				break;
			case   4: $Vubssx3efpny = 'SUM';			break;
			case   5: $Vubssx3efpny = 'AVERAGE';		break;
			case   6: $Vubssx3efpny = 'MIN';			break;
			case   7: $Vubssx3efpny = 'MAX';			break;
			case   8: $Vubssx3efpny = 'ROW';			break;
			case   9: $Vubssx3efpny = 'COLUMN';			break;
			case  11: $Vubssx3efpny = 'NPV';			break;
			case  12: $Vubssx3efpny = 'STDEV';			break;
			case  13: $Vubssx3efpny = 'DOLLAR';			break;
			case  14: $Vubssx3efpny = 'FIXED';			break;
			case  28: $Vubssx3efpny = 'LOOKUP';			break;
			case  29: $Vubssx3efpny = 'INDEX';			break;
			case  36: $Vubssx3efpny = 'AND';			break;
			case  37: $Vubssx3efpny = 'OR';				break;
			case  46: $Vubssx3efpny = 'VAR';			break;
			case  49: $Vubssx3efpny = 'LINEST';			break;
			case  50: $Vubssx3efpny = 'TREND';			break;
			case  51: $Vubssx3efpny = 'LOGEST';			break;
			case  52: $Vubssx3efpny = 'GROWTH';			break;
			case  56: $Vubssx3efpny = 'PV';				break;
			case  57: $Vubssx3efpny = 'FV';				break;
			case  58: $Vubssx3efpny = 'NPER';			break;
			case  59: $Vubssx3efpny = 'PMT';			break;
			case  60: $Vubssx3efpny = 'RATE';			break;
			case  62: $Vubssx3efpny = 'IRR';			break;
			case  64: $Vubssx3efpny = 'MATCH';			break;
			case  70: $Vubssx3efpny = 'WEEKDAY';		break;
			case  78: $Vubssx3efpny = 'OFFSET';			break;
			case  82: $Vubssx3efpny = 'SEARCH';			break;
			case 100: $Vubssx3efpny = 'CHOOSE';			break;
			case 101: $Vubssx3efpny = 'HLOOKUP';		break;
			case 102: $Vubssx3efpny = 'VLOOKUP';		break;
			case 109: $Vubssx3efpny = 'LOG';			break;
			case 115: $Vubssx3efpny = 'LEFT';			break;
			case 116: $Vubssx3efpny = 'RIGHT';			break;
			case 120: $Vubssx3efpny = 'SUBSTITUTE';		break;
			case 124: $Vubssx3efpny = 'FIND';			break;
			case 125: $Vubssx3efpny = 'CELL';			break;
			case 144: $Vubssx3efpny = 'DDB';			break;
			case 148: $Vubssx3efpny = 'INDIRECT';		break;
			case 167: $Vubssx3efpny = 'IPMT';			break;
			case 168: $Vubssx3efpny = 'PPMT';			break;
			case 169: $Vubssx3efpny = 'COUNTA';			break;
			case 183: $Vubssx3efpny = 'PRODUCT';		break;
			case 193: $Vubssx3efpny = 'STDEVP';			break;
			case 194: $Vubssx3efpny = 'VARP';			break;
			case 197: $Vubssx3efpny = 'TRUNC';			break;
			case 204: $Vubssx3efpny = 'USDOLLAR';		break;
			case 205: $Vubssx3efpny = 'FINDB';			break;
			case 206: $Vubssx3efpny = 'SEARCHB';		break;
			case 208: $Vubssx3efpny = 'LEFTB';			break;
			case 209: $Vubssx3efpny = 'RIGHTB';			break;
			case 216: $Vubssx3efpny = 'RANK';			break;
			case 219: $Vubssx3efpny = 'ADDRESS';		break;
			case 220: $Vubssx3efpny = 'DAYS360';		break;
			case 222: $Vubssx3efpny = 'VDB';			break;
			case 227: $Vubssx3efpny = 'MEDIAN';			break;
			case 228: $Vubssx3efpny = 'SUMPRODUCT';		break;
			case 247: $Vubssx3efpny = 'DB';				break;
			case 255: $Vubssx3efpny = '';				break;
			case 269: $Vubssx3efpny = 'AVEDEV';			break;
			case 270: $Vubssx3efpny = 'BETADIST';		break;
			case 272: $Vubssx3efpny = 'BETAINV';		break;
			case 317: $Vubssx3efpny = 'PROB';			break;
			case 318: $Vubssx3efpny = 'DEVSQ';			break;
			case 319: $Vubssx3efpny = 'GEOMEAN';		break;
			case 320: $Vubssx3efpny = 'HARMEAN';		break;
			case 321: $Vubssx3efpny = 'SUMSQ';			break;
			case 322: $Vubssx3efpny = 'KURT';			break;
			case 323: $Vubssx3efpny = 'SKEW';			break;
			case 324: $Vubssx3efpny = 'ZTEST';			break;
			case 329: $Vubssx3efpny = 'PERCENTRANK';	break;
			case 330: $Vubssx3efpny = 'MODE';			break;
			case 336: $Vubssx3efpny = 'CONCATENATE';	break;
			case 344: $Vubssx3efpny = 'SUBTOTAL';		break;
			case 345: $Vubssx3efpny = 'SUMIF';			break;
			case 354: $Vubssx3efpny = 'ROMAN';			break;
			case 358: $Vubssx3efpny = 'GETPIVOTDATA';	break;
			case 359: $Vubssx3efpny = 'HYPERLINK';		break;
			case 361: $Vubssx3efpny = 'AVERAGEA';		break;
			case 362: $Vubssx3efpny = 'MAXA';			break;
			case 363: $Vubssx3efpny = 'MINA';			break;
			case 364: $Vubssx3efpny = 'STDEVPA';		break;
			case 365: $Vubssx3efpny = 'VARPA';			break;
			case 366: $Vubssx3efpny = 'STDEVA';			break;
			case 367: $Vubssx3efpny = 'VARA';			break;
			default:
				throw new PHPExcel_Reader_Exception('Unrecognized function in formula');
				break;
			}
			$Vou4vxorrdoe = array('function' => $Vubssx3efpny, 'args' => $Vrukcxz5icxf);
			break;
		case 0x23:	
		case 0x43:
		case 0x63:
			$Vmwwo1qnmepzame = 'tName';
			$V2n430jknk35ize = 5;
			
			$Vidd2qyqjf54Index = self::_GetInt2d($V22ivdjjfdx2Data, 1) - 1;
			
			$Vou4vxorrdoe = $this->_definedname[$Vidd2qyqjf54Index]['name'];
			break;
		case 0x24:	
		case 0x44:
		case 0x64:
			$Vmwwo1qnmepzame = 'tRef';
			$V2n430jknk35ize = 5;
			$Vou4vxorrdoe = $this->_readBIFF8CellAddress(substr($V22ivdjjfdx2Data, 1, 4));
			break;
		case 0x25:	
		case 0x45:
		case 0x65:
			$Vmwwo1qnmepzame = 'tArea';
			$V2n430jknk35ize = 9;
			$Vou4vxorrdoe = $this->_readBIFF8CellRangeAddress(substr($V22ivdjjfdx2Data, 1, 8));
			break;
		case 0x26:	
		case 0x46:
		case 0x66:
			$Vmwwo1qnmepzame = 'tMemArea';
			
			
			$V2n430jknk35ubSize = self::_GetInt2d($V22ivdjjfdx2Data, 5);
			$V2n430jknk35ize = 7 + $V2n430jknk35ubSize;
			$Vou4vxorrdoe = $this->_getFormulaFromData(substr($V22ivdjjfdx2Data, 7, $V2n430jknk35ubSize));
			break;
		case 0x27:	
		case 0x47:
		case 0x67:
			$Vmwwo1qnmepzame = 'tMemErr';
			
			
			$V2n430jknk35ubSize = self::_GetInt2d($V22ivdjjfdx2Data, 5);
			$V2n430jknk35ize = 7 + $V2n430jknk35ubSize;
			$Vou4vxorrdoe = $this->_getFormulaFromData(substr($V22ivdjjfdx2Data, 7, $V2n430jknk35ubSize));
			break;
		case 0x29:	
		case 0x49:
		case 0x69:
			$Vmwwo1qnmepzame = 'tMemFunc';
			
			$V2n430jknk35ubSize = self::_GetInt2d($V22ivdjjfdx2Data, 1);
			$V2n430jknk35ize = 3 + $V2n430jknk35ubSize;
			$Vou4vxorrdoe = $this->_getFormulaFromData(substr($V22ivdjjfdx2Data, 3, $V2n430jknk35ubSize));
			break;

		case 0x2C: 
		case 0x4C:
		case 0x6C:
			$Vmwwo1qnmepzame = 'tRefN';
			$V2n430jknk35ize = 5;
			$Vou4vxorrdoe = $this->_readBIFF8CellAddressB(substr($V22ivdjjfdx2Data, 1, 4), $V4ptkkricfpr);
			break;

		case 0x2D:	
		case 0x4D:
		case 0x6D:
			$Vmwwo1qnmepzame = 'tAreaN';
			$V2n430jknk35ize = 9;
			$Vou4vxorrdoe = $this->_readBIFF8CellRangeAddressB(substr($V22ivdjjfdx2Data, 1, 8), $V4ptkkricfpr);
			break;

		case 0x39:	
		case 0x59:
		case 0x79:
			$Vmwwo1qnmepzame = 'tNameX';
			$V2n430jknk35ize = 7;
			
			
			$Vfhiq1lhsojandex = self::_GetInt2d($V22ivdjjfdx2Data, 3);
			
			$Vou4vxorrdoe = $this->_externalNames[$Vfhiq1lhsojandex - 1]['name'];
			
			break;

		case 0x3A:	
		case 0x5A:
		case 0x7A:
			$Vmwwo1qnmepzame = 'tRef3d';
			$V2n430jknk35ize = 7;

			try {
				
				$Vzg4jtrmmzdyRange = $this->_readSheetRangeByRefIndex(self::_GetInt2d($V22ivdjjfdx2Data, 1));
				
				$Vblc1ueqvbtiAddress = $this->_readBIFF8CellAddress(substr($V22ivdjjfdx2Data, 3, 4));

				$Vou4vxorrdoe = "$Vzg4jtrmmzdyRange!$Vblc1ueqvbtiAddress";
			} catch (PHPExcel_Exception $Vnhm0uuykimv) {
				
				$Vou4vxorrdoe = '#REF!';
			}

			break;
		case 0x3B:	
		case 0x5B:
		case 0x7B:
			$Vmwwo1qnmepzame = 'tArea3d';
			$V2n430jknk35ize = 11;

			try {
				
				$Vzg4jtrmmzdyRange = $this->_readSheetRangeByRefIndex(self::_GetInt2d($V22ivdjjfdx2Data, 1));
				
				$Vblc1ueqvbtiRangeAddress = $this->_readBIFF8CellRangeAddress(substr($V22ivdjjfdx2Data, 3, 8));

				$Vou4vxorrdoe = "$Vzg4jtrmmzdyRange!$Vblc1ueqvbtiRangeAddress";
			} catch (PHPExcel_Exception $Vnhm0uuykimv) {
				
				$Vou4vxorrdoe = '#REF!';
			}

			break;
		
		default:
			throw new PHPExcel_Reader_Exception('Unrecognized token ' . sprintf('%02X', $Vfhiq1lhsojad) . ' in formula');
			break;
		}

		return array(
			'id' => $Vfhiq1lhsojad,
			'name' => $Vmwwo1qnmepzame,
			'size' => $V2n430jknk35ize,
			'data' => $Vou4vxorrdoe,
		);
	}


	
	private function _readBIFF8CellAddress($Vblc1ueqvbtiAddressStructure)
	{
		
		$Vexbtekafkvl = self::_GetInt2d($Vblc1ueqvbtiAddressStructure, 0) + 1;

		

			
			$Vn4q2p4mkwa0 = PHPExcel_Cell::stringFromColumnIndex(0x00FF & self::_GetInt2d($Vblc1ueqvbtiAddressStructure, 2));

			
			if (!(0x4000 & self::_GetInt2d($Vblc1ueqvbtiAddressStructure, 2))) {
				$Vn4q2p4mkwa0 = '$' . $Vn4q2p4mkwa0;
			}
			
			if (!(0x8000 & self::_GetInt2d($Vblc1ueqvbtiAddressStructure, 2))) {
				$Vexbtekafkvl = '$' . $Vexbtekafkvl;
			}

		return $Vn4q2p4mkwa0 . $Vexbtekafkvl;
	}


	
	private function _readBIFF8CellAddressB($Vblc1ueqvbtiAddressStructure, $V4ptkkricfpr = 'A1')
	{
		list($V4c1bjjawrgm, $V3mppaqv1iv5) = PHPExcel_Cell::coordinateFromString($V4ptkkricfpr);
		$V4c1bjjawrgm = PHPExcel_Cell::columnIndexFromString($V4c1bjjawrgm) - 1;

		
			$Vcj3rtes4zrz = self::_GetInt2d($Vblc1ueqvbtiAddressStructure, 0);
			$Vexbtekafkvl = self::_GetInt2d($Vblc1ueqvbtiAddressStructure, 0) + 1;

		

			
			$V4y0urwpnd3jolIndex = 0x00FF & self::_GetInt2d($Vblc1ueqvbtiAddressStructure, 2);

			
			if (!(0x4000 & self::_GetInt2d($Vblc1ueqvbtiAddressStructure, 2))) {
				$Vn4q2p4mkwa0 = PHPExcel_Cell::stringFromColumnIndex($V4y0urwpnd3jolIndex);
				$Vn4q2p4mkwa0 = '$' . $Vn4q2p4mkwa0;
			} else {
				$V4y0urwpnd3jolIndex = ($V4y0urwpnd3jolIndex <= 127) ? $V4y0urwpnd3jolIndex : $V4y0urwpnd3jolIndex - 256;
				$Vn4q2p4mkwa0 = PHPExcel_Cell::stringFromColumnIndex($V4c1bjjawrgm + $V4y0urwpnd3jolIndex);
			}

			
			if (!(0x8000 & self::_GetInt2d($Vblc1ueqvbtiAddressStructure, 2))) {
				$Vexbtekafkvl = '$' . $Vexbtekafkvl;
			} else {
				$Vcj3rtes4zrz = ($Vcj3rtes4zrz <= 32767) ? $Vcj3rtes4zrz : $Vcj3rtes4zrz - 65536;
				$Vexbtekafkvl = $V3mppaqv1iv5 + $Vcj3rtes4zrz;
			}

		return $Vn4q2p4mkwa0 . $Vexbtekafkvl;
	}


	
	private function _readBIFF5CellRangeAddressFixed($V2n430jknk35ubData)
	{
		
		$Vdfgqy2d4rx3 = self::_GetInt2d($V2n430jknk35ubData, 0) + 1;

		
		$Vt3sq553swgb = self::_GetInt2d($V2n430jknk35ubData, 2) + 1;

		
		$Vuhpiwuvuxqd = ord($V2n430jknk35ubData{4});

		
		$Vac03inwrzff = ord($V2n430jknk35ubData{5});

		
		if ($Vdfgqy2d4rx3 > $Vt3sq553swgb || $Vuhpiwuvuxqd > $Vac03inwrzff) {
			throw new PHPExcel_Reader_Exception('Not a cell range address');
		}

		
		$Vuhpiwuvuxqd = PHPExcel_Cell::stringFromColumnIndex($Vuhpiwuvuxqd);
		$Vac03inwrzff = PHPExcel_Cell::stringFromColumnIndex($Vac03inwrzff);

		if ($Vdfgqy2d4rx3 == $Vt3sq553swgb and $Vuhpiwuvuxqd == $Vac03inwrzff) {
			return "$Vuhpiwuvuxqd$Vdfgqy2d4rx3";
		}
		return "$Vuhpiwuvuxqd$Vdfgqy2d4rx3:$Vac03inwrzff$Vt3sq553swgb";
	}


	
	private function _readBIFF8CellRangeAddressFixed($V2n430jknk35ubData)
	{
		
		$Vdfgqy2d4rx3 = self::_GetInt2d($V2n430jknk35ubData, 0) + 1;

		
		$Vt3sq553swgb = self::_GetInt2d($V2n430jknk35ubData, 2) + 1;

		
		$Vuhpiwuvuxqd = self::_GetInt2d($V2n430jknk35ubData, 4);

		
		$Vac03inwrzff = self::_GetInt2d($V2n430jknk35ubData, 6);

		
		if ($Vdfgqy2d4rx3 > $Vt3sq553swgb || $Vuhpiwuvuxqd > $Vac03inwrzff) {
			throw new PHPExcel_Reader_Exception('Not a cell range address');
		}

		
		$Vuhpiwuvuxqd = PHPExcel_Cell::stringFromColumnIndex($Vuhpiwuvuxqd);
		$Vac03inwrzff = PHPExcel_Cell::stringFromColumnIndex($Vac03inwrzff);

		if ($Vdfgqy2d4rx3 == $Vt3sq553swgb and $Vuhpiwuvuxqd == $Vac03inwrzff) {
			return "$Vuhpiwuvuxqd$Vdfgqy2d4rx3";
		}
		return "$Vuhpiwuvuxqd$Vdfgqy2d4rx3:$Vac03inwrzff$Vt3sq553swgb";
	}


	
	private function _readBIFF8CellRangeAddress($V2n430jknk35ubData)
	{
		
		

		
			$Vdfgqy2d4rx3 = self::_GetInt2d($V2n430jknk35ubData, 0) + 1;

		
			$Vt3sq553swgb = self::_GetInt2d($V2n430jknk35ubData, 2) + 1;

		

		
		$Vuhpiwuvuxqd = PHPExcel_Cell::stringFromColumnIndex(0x00FF & self::_GetInt2d($V2n430jknk35ubData, 4));

		
		if (!(0x4000 & self::_GetInt2d($V2n430jknk35ubData, 4))) {
			$Vuhpiwuvuxqd = '$' . $Vuhpiwuvuxqd;
		}

		
		if (!(0x8000 & self::_GetInt2d($V2n430jknk35ubData, 4))) {
			$Vdfgqy2d4rx3 = '$' . $Vdfgqy2d4rx3;
		}

		

		
		$Vac03inwrzff = PHPExcel_Cell::stringFromColumnIndex(0x00FF & self::_GetInt2d($V2n430jknk35ubData, 6));

		
		if (!(0x4000 & self::_GetInt2d($V2n430jknk35ubData, 6))) {
			$Vac03inwrzff = '$' . $Vac03inwrzff;
		}

		
		if (!(0x8000 & self::_GetInt2d($V2n430jknk35ubData, 6))) {
			$Vt3sq553swgb = '$' . $Vt3sq553swgb;
		}

		return "$Vuhpiwuvuxqd$Vdfgqy2d4rx3:$Vac03inwrzff$Vt3sq553swgb";
	}


	
	private function _readBIFF8CellRangeAddressB($V2n430jknk35ubData, $V4ptkkricfpr = 'A1')
	{
		list($V4c1bjjawrgm, $V3mppaqv1iv5) = PHPExcel_Cell::coordinateFromString($V4ptkkricfpr);
		$V4c1bjjawrgm = PHPExcel_Cell::columnIndexFromString($V4c1bjjawrgm) - 1;

		
		

		
		$Vdfgqy2d4rx3Index = self::_GetInt2d($V2n430jknk35ubData, 0); 

		
		$Vt3sq553swgbIndex = self::_GetInt2d($V2n430jknk35ubData, 2); 

		

		
		$VuhpiwuvuxqdIndex = 0x00FF & self::_GetInt2d($V2n430jknk35ubData, 4);

		
		if (!(0x4000 & self::_GetInt2d($V2n430jknk35ubData, 4))) {
			
			$Vuhpiwuvuxqd = PHPExcel_Cell::stringFromColumnIndex($VuhpiwuvuxqdIndex);
			$Vuhpiwuvuxqd = '$' . $Vuhpiwuvuxqd;
		} else {
			
			$VuhpiwuvuxqdIndex = ($VuhpiwuvuxqdIndex <= 127) ? $VuhpiwuvuxqdIndex : $VuhpiwuvuxqdIndex - 256;
			$Vuhpiwuvuxqd = PHPExcel_Cell::stringFromColumnIndex($V4c1bjjawrgm + $VuhpiwuvuxqdIndex);
		}

		
		if (!(0x8000 & self::_GetInt2d($V2n430jknk35ubData, 4))) {
			
			$Vdfgqy2d4rx3 = $Vdfgqy2d4rx3Index + 1;
			$Vdfgqy2d4rx3 = '$' . $Vdfgqy2d4rx3;
		} else {
			
			$Vdfgqy2d4rx3Index = ($Vdfgqy2d4rx3Index <= 32767) ? $Vdfgqy2d4rx3Index : $Vdfgqy2d4rx3Index - 65536;
			$Vdfgqy2d4rx3 = $V3mppaqv1iv5 + $Vdfgqy2d4rx3Index;
		}

		

		
		$Vac03inwrzffIndex = 0x00FF & self::_GetInt2d($V2n430jknk35ubData, 6);
		$Vac03inwrzffIndex = ($Vac03inwrzffIndex <= 127) ? $Vac03inwrzffIndex : $Vac03inwrzffIndex - 256;
		$Vac03inwrzff = PHPExcel_Cell::stringFromColumnIndex($V4c1bjjawrgm + $Vac03inwrzffIndex);

		
		if (!(0x4000 & self::_GetInt2d($V2n430jknk35ubData, 6))) {
			
			$Vac03inwrzff = PHPExcel_Cell::stringFromColumnIndex($Vac03inwrzffIndex);
			$Vac03inwrzff = '$' . $Vac03inwrzff;
		} else {
			
			$Vac03inwrzffIndex = ($Vac03inwrzffIndex <= 127) ? $Vac03inwrzffIndex : $Vac03inwrzffIndex - 256;
			$Vac03inwrzff = PHPExcel_Cell::stringFromColumnIndex($V4c1bjjawrgm + $Vac03inwrzffIndex);
		}

		
		if (!(0x8000 & self::_GetInt2d($V2n430jknk35ubData, 6))) {
			
			$Vt3sq553swgb = $Vt3sq553swgbIndex + 1;
			$Vt3sq553swgb = '$' . $Vt3sq553swgb;
		} else {
			
			$Vt3sq553swgbIndex = ($Vt3sq553swgbIndex <= 32767) ? $Vt3sq553swgbIndex : $Vt3sq553swgbIndex - 65536;
			$Vt3sq553swgb = $V3mppaqv1iv5 + $Vt3sq553swgbIndex;
		}

		return "$Vuhpiwuvuxqd$Vdfgqy2d4rx3:$Vac03inwrzff$Vt3sq553swgb";
	}


	
	private function _readBIFF8CellRangeAddressList($V2n430jknk35ubData)
	{
		$Vblc1ueqvbtiRangeAddresses = array();

		
		$Vmwwo1qnmepzm = self::_GetInt2d($V2n430jknk35ubData, 0);

		$Vortqlloirgz = 2;
		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vmwwo1qnmepzm; ++$Vfhiq1lhsoja) {
			$Vblc1ueqvbtiRangeAddresses[] = $this->_readBIFF8CellRangeAddressFixed(substr($V2n430jknk35ubData, $Vortqlloirgz, 8));
			$Vortqlloirgz += 8;
		}

		return array(
			'size' => 2 + 8 * $Vmwwo1qnmepzm,
			'cellRangeAddresses' => $Vblc1ueqvbtiRangeAddresses,
		);
	}


	
	private function _readBIFF5CellRangeAddressList($V2n430jknk35ubData)
	{
		$Vblc1ueqvbtiRangeAddresses = array();

		
		$Vmwwo1qnmepzm = self::_GetInt2d($V2n430jknk35ubData, 0);

		$Vortqlloirgz = 2;
		
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vmwwo1qnmepzm; ++$Vfhiq1lhsoja) {
			$Vblc1ueqvbtiRangeAddresses[] = $this->_readBIFF5CellRangeAddressFixed(substr($V2n430jknk35ubData, $Vortqlloirgz, 6));
			$Vortqlloirgz += 6;
		}

		return array(
			'size' => 2 + 6 * $Vmwwo1qnmepzm,
			'cellRangeAddresses' => $Vblc1ueqvbtiRangeAddresses,
		);
	}


	
	private function _readSheetRangeByRefIndex($Vfhiq1lhsojandex)
	{
		if (isset($this->_ref[$Vfhiq1lhsojandex])) {

			$V4pigtpor0ln = $this->_externalBooks[$this->_ref[$Vfhiq1lhsojandex]['externalBookIndex']]['type'];

			switch ($V4pigtpor0ln) {
				case 'internal':
					
					if ($this->_ref[$Vfhiq1lhsojandex]['firstSheetIndex'] == 0xFFFF or $this->_ref[$Vfhiq1lhsojandex]['lastSheetIndex'] == 0xFFFF) {
						throw new PHPExcel_Reader_Exception('Deleted sheet reference');
					}

					
					$V1v5gi2bxdhy = $this->_sheets[$this->_ref[$Vfhiq1lhsojandex]['firstSheetIndex']]['name'];
					$Vhdoedlhmfeg = $this->_sheets[$this->_ref[$Vfhiq1lhsojandex]['lastSheetIndex']]['name'];

					if ($V1v5gi2bxdhy == $Vhdoedlhmfeg) {
						
						$Vzg4jtrmmzdyRange = $V1v5gi2bxdhy;
					} else {
						$Vzg4jtrmmzdyRange = "$V1v5gi2bxdhy:$Vhdoedlhmfeg";
					}

					
					$Vzg4jtrmmzdyRange = str_replace("'", "''", $Vzg4jtrmmzdyRange);

					
					
					
					
					if (preg_match("/[ !\"@#£$%&{()}<>=+'|^,;-]/", $Vzg4jtrmmzdyRange)) {
						$Vzg4jtrmmzdyRange = "'$Vzg4jtrmmzdyRange'";
					}

					return $Vzg4jtrmmzdyRange;
					break;

				default:
					
					throw new PHPExcel_Reader_Exception('Excel5 reader only supports internal sheets in fomulas');
					break;
			}
		}
		return false;
	}


	
	private static function _readBIFF8ConstantArray($Vqybn1j2wv5y)
	{
		
		$Vmwwo1qnmepzc = ord($Vqybn1j2wv5y[0]);

		
		$Vmwwo1qnmepzr = self::_GetInt2d($Vqybn1j2wv5y, 1);
		$V2n430jknk35ize = 3; 
		$Vqybn1j2wv5y = substr($Vqybn1j2wv5y, 3);

		
		$Vjyvobmmbr2e = array();
		for ($Vws44nszhvgo = 1; $Vws44nszhvgo <= $Vmwwo1qnmepzr + 1; ++$Vws44nszhvgo) {
			$Vfhiq1lhsojatems = array();
			for ($V4y0urwpnd3j = 1; $V4y0urwpnd3j <= $Vmwwo1qnmepzc + 1; ++$V4y0urwpnd3j) {
				$V4y0urwpnd3jonstant = self::_readBIFF8Constant($Vqybn1j2wv5y);
				$Vfhiq1lhsojatems[] = $V4y0urwpnd3jonstant['value'];
				$Vqybn1j2wv5y = substr($Vqybn1j2wv5y, $V4y0urwpnd3jonstant['size']);
				$V2n430jknk35ize += $V4y0urwpnd3jonstant['size'];
			}
			$Vjyvobmmbr2e[] = implode(',', $Vfhiq1lhsojatems); 
		}
		$Vl5loifjeez4 = '{' . implode(';', $Vjyvobmmbr2e) . '}';

		return array(
			'value' => $Vl5loifjeez4,
			'size' => $V2n430jknk35ize,
		);
	}


	
	private static function _readBIFF8Constant($Vp4xjtpabm0lData)
	{
		
		$Vfhiq1lhsojadentifier = ord($Vp4xjtpabm0lData[0]);

		switch ($Vfhiq1lhsojadentifier) {
		case 0x00: 
			$Vp4xjtpabm0l = '';
			$V2n430jknk35ize = 9;
			break;
		case 0x01: 
			
			$Vp4xjtpabm0l = self::_extractNumber(substr($Vp4xjtpabm0lData, 1, 8));
			$V2n430jknk35ize = 9;
			break;
		case 0x02: 
			
			$V2n430jknk35tring = self::_readUnicodeStringLong(substr($Vp4xjtpabm0lData, 1));
			$Vp4xjtpabm0l = '"' . $V2n430jknk35tring['value'] . '"';
			$V2n430jknk35ize = 1 + $V2n430jknk35tring['size'];
			break;
		case 0x04: 
			
			if (ord($Vp4xjtpabm0lData[1])) {
				$Vp4xjtpabm0l = 'TRUE';
			} else {
				$Vp4xjtpabm0l = 'FALSE';
			}
			$V2n430jknk35ize = 9;
			break;
		case 0x10: 
			
			$Vp4xjtpabm0l = self::_mapErrorCode(ord($Vp4xjtpabm0lData[1]));
			$V2n430jknk35ize = 9;
			break;
		}
		return array(
			'value' => $Vp4xjtpabm0l,
			'size' => $V2n430jknk35ize,
		);
	}


	
	private static function _readRGB($Vvw25icbq1yg)
	{
		
		$Vws44nszhvgo = ord($Vvw25icbq1yg{0});

		
		$Vpatv3dcvvhr = ord($Vvw25icbq1yg{1});

		
		$V4t3fwdd3eev = ord($Vvw25icbq1yg{2});

		
		$Vvw25icbq1yg = sprintf('%02X%02X%02X', $Vws44nszhvgo, $Vpatv3dcvvhr, $V4t3fwdd3eev);

		return array('rgb' => $Vvw25icbq1yg);
	}


	
	private function _readByteStringShort($V2n430jknk35ubData)
	{
		
		$Vwzjwtu2qkvv = ord($V2n430jknk35ubData[0]);

		
		$Vp4xjtpabm0l = $this->_decodeCodepage(substr($V2n430jknk35ubData, 1, $Vwzjwtu2qkvv));

		return array(
			'value' => $Vp4xjtpabm0l,
			'size' => 1 + $Vwzjwtu2qkvv, 
		);
	}


	
	private function _readByteStringLong($V2n430jknk35ubData)
	{
		
		$Vwzjwtu2qkvv = self::_GetInt2d($V2n430jknk35ubData, 0);

		
		$Vp4xjtpabm0l = $this->_decodeCodepage(substr($V2n430jknk35ubData, 2));

		
		return array(
			'value' => $Vp4xjtpabm0l,
			'size' => 2 + $Vwzjwtu2qkvv, 
		);
	}


	
	private static function _readUnicodeStringShort($V2n430jknk35ubData)
	{
		$Vp4xjtpabm0l = '';

		
		$V4y0urwpnd3jharacterCount = ord($V2n430jknk35ubData[0]);

		$V2n430jknk35tring = self::_readUnicodeString(substr($V2n430jknk35ubData, 1), $V4y0urwpnd3jharacterCount);

		
		$V2n430jknk35tring['size'] += 1;

		return $V2n430jknk35tring;
	}


	
	private static function _readUnicodeStringLong($V2n430jknk35ubData)
	{
		$Vp4xjtpabm0l = '';

		
		$V4y0urwpnd3jharacterCount = self::_GetInt2d($V2n430jknk35ubData, 0);

		$V2n430jknk35tring = self::_readUnicodeString(substr($V2n430jknk35ubData, 2), $V4y0urwpnd3jharacterCount);

		
		$V2n430jknk35tring['size'] += 2;

		return $V2n430jknk35tring;
	}


	
	private static function _readUnicodeString($V2n430jknk35ubData, $V4y0urwpnd3jharacterCount)
	{
		$Vp4xjtpabm0l = '';

		

			
			$Vfhiq1lhsojasCompressed = !((0x01 & ord($V2n430jknk35ubData[0])) >> 0);

			
			$Vempet02mvuf = (0x04) & ord($V2n430jknk35ubData[0]) >> 2;

			
			$Vehofxh010es = (0x08) & ord($V2n430jknk35ubData[0]) >> 3;

		
		
		
		$Vp4xjtpabm0l = self::_encodeUTF16(substr($V2n430jknk35ubData, 1, $Vfhiq1lhsojasCompressed ? $V4y0urwpnd3jharacterCount : 2 * $V4y0urwpnd3jharacterCount), $Vfhiq1lhsojasCompressed);

		return array(
			'value' => $Vp4xjtpabm0l,
			'size' => $Vfhiq1lhsojasCompressed ? 1 + $V4y0urwpnd3jharacterCount : 1 + 2 * $V4y0urwpnd3jharacterCount, 
		);
	}


	
	private static function _UTF8toExcelDoubleQuoted($Vp4xjtpabm0l)
	{
		return '"' . str_replace('"', '""', $Vp4xjtpabm0l) . '"';
	}


	
	private static function _extractNumber($Vou4vxorrdoe)
	{
		$Vws44nszhvgoknumhigh = self::_GetInt4d($Vou4vxorrdoe, 4);
		$Vws44nszhvgoknumlow = self::_GetInt4d($Vou4vxorrdoe, 0);
		$V2n430jknk35ign = ($Vws44nszhvgoknumhigh & 0x80000000) >> 31;
		$Vnhm0uuykimvxp = (($Vws44nszhvgoknumhigh & 0x7ff00000) >> 20) - 1023;
		$Vzwq4j0momer = (0x100000 | ($Vws44nszhvgoknumhigh & 0x000fffff));
		$Vzwq4j0momerlow1 = ($Vws44nszhvgoknumlow & 0x80000000) >> 31;
		$Vzwq4j0momerlow2 = ($Vws44nszhvgoknumlow & 0x7fffffff);
		$Vp4xjtpabm0l = $Vzwq4j0momer / pow( 2 , (20 - $Vnhm0uuykimvxp));

		if ($Vzwq4j0momerlow1 != 0) {
			$Vp4xjtpabm0l += 1 / pow (2 , (21 - $Vnhm0uuykimvxp));
		}

		$Vp4xjtpabm0l += $Vzwq4j0momerlow2 / pow (2 , (52 - $Vnhm0uuykimvxp));
		if ($V2n430jknk35ign) {
			$Vp4xjtpabm0l *= -1;
		}

		return $Vp4xjtpabm0l;
	}


	private static function _GetIEEE754($Vws44nszhvgoknum)
	{
		if (($Vws44nszhvgoknum & 0x02) != 0) {
			$Vp4xjtpabm0l = $Vws44nszhvgoknum >> 2;
		} else {
			
			
			
			
			
			$V2n430jknk35ign = ($Vws44nszhvgoknum & 0x80000000) >> 31;
			$Vnhm0uuykimvxp = ($Vws44nszhvgoknum & 0x7ff00000) >> 20;
			$Vzwq4j0momer = (0x100000 | ($Vws44nszhvgoknum & 0x000ffffc));
			$Vp4xjtpabm0l = $Vzwq4j0momer / pow( 2 , (20- ($Vnhm0uuykimvxp - 1023)));
			if ($V2n430jknk35ign) {
				$Vp4xjtpabm0l = -1 * $Vp4xjtpabm0l;
			}
			
		}
		if (($Vws44nszhvgoknum & 0x01) != 0) {
			$Vp4xjtpabm0l /= 100;
		}
		return $Vp4xjtpabm0l;
	}


	
	private static function _encodeUTF16($V2n430jknk35tring, $V4y0urwpnd3jompressed = '')
	{
		if ($V4y0urwpnd3jompressed) {
			$V2n430jknk35tring = self::_uncompressByteString($V2n430jknk35tring);
 		}

		return PHPExcel_Shared_String::ConvertEncoding($V2n430jknk35tring, 'UTF-8', 'UTF-16LE');
	}


	
	private static function _uncompressByteString($V2n430jknk35tring)
	{
		$Vv3u14hsmqnv = '';
		$V2n430jknk35trLen = strlen($V2n430jknk35tring);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V2n430jknk35trLen; ++$Vfhiq1lhsoja) {
			$Vv3u14hsmqnv .= $V2n430jknk35tring[$Vfhiq1lhsoja] . "\0";
		}

		return $Vv3u14hsmqnv;
	}


	
	private function _decodeCodepage($V2n430jknk35tring)
	{
		return PHPExcel_Shared_String::ConvertEncoding($V2n430jknk35tring, 'UTF-8', $this->_codepage);
	}


	
	public static function _GetInt2d($Vou4vxorrdoe, $Vv3hdohvn1hh)
	{
		return ord($Vou4vxorrdoe[$Vv3hdohvn1hh]) | (ord($Vou4vxorrdoe[$Vv3hdohvn1hh+1]) << 8);
	}


	
	public static function _GetInt4d($Vou4vxorrdoe, $Vv3hdohvn1hh)
	{
		
		
		
		$Vxu4q04ul4kn = ord($Vou4vxorrdoe[$Vv3hdohvn1hh + 3]);
		if ($Vxu4q04ul4kn >= 128) {
			
			$V4k5lll1ubr1 = -abs((256 - $Vxu4q04ul4kn) << 24);
		} else {
			$V4k5lll1ubr1 = ($Vxu4q04ul4kn & 127) << 24;
		}
		return ord($Vou4vxorrdoe[$Vv3hdohvn1hh]) | (ord($Vou4vxorrdoe[$Vv3hdohvn1hh+1]) << 8) | (ord($Vou4vxorrdoe[$Vv3hdohvn1hh+2]) << 16) | $V4k5lll1ubr1;
	}


	
	private static function _readColor($Vl5jzlxo3j3n,$Vgd2qlcwaetq,$Vh51i5i4ai0v)
	{
		if ($Vl5jzlxo3j3n <= 0x07 || $Vl5jzlxo3j3n >= 0x40) {
			
			return self::_mapBuiltInColor($Vl5jzlxo3j3n);
		} elseif (isset($Vgd2qlcwaetq) && isset($Vgd2qlcwaetq[$Vl5jzlxo3j3n - 8])) {
			
			return $Vgd2qlcwaetq[$Vl5jzlxo3j3n - 8];
		} else {
			
			if ($Vh51i5i4ai0v == self::XLS_BIFF8) {
				return self::_mapColor($Vl5jzlxo3j3n);
			} else {
				
				return self::_mapColorBIFF5($Vl5jzlxo3j3n);
			}
		}

		return $Vl5jzlxo3j3n;
	}


	
	private static function _mapBorderStyle($Vfhiq1lhsojandex)
	{
		switch ($Vfhiq1lhsojandex) {
			case 0x00: return PHPExcel_Style_Border::BORDER_NONE;
			case 0x01: return PHPExcel_Style_Border::BORDER_THIN;
			case 0x02: return PHPExcel_Style_Border::BORDER_MEDIUM;
			case 0x03: return PHPExcel_Style_Border::BORDER_DASHED;
			case 0x04: return PHPExcel_Style_Border::BORDER_DOTTED;
			case 0x05: return PHPExcel_Style_Border::BORDER_THICK;
			case 0x06: return PHPExcel_Style_Border::BORDER_DOUBLE;
			case 0x07: return PHPExcel_Style_Border::BORDER_HAIR;
			case 0x08: return PHPExcel_Style_Border::BORDER_MEDIUMDASHED;
			case 0x09: return PHPExcel_Style_Border::BORDER_DASHDOT;
			case 0x0A: return PHPExcel_Style_Border::BORDER_MEDIUMDASHDOT;
			case 0x0B: return PHPExcel_Style_Border::BORDER_DASHDOTDOT;
			case 0x0C: return PHPExcel_Style_Border::BORDER_MEDIUMDASHDOTDOT;
			case 0x0D: return PHPExcel_Style_Border::BORDER_SLANTDASHDOT;
			default:   return PHPExcel_Style_Border::BORDER_NONE;
		}
	}


	
	private static function _mapFillPattern($Vfhiq1lhsojandex)
	{
		switch ($Vfhiq1lhsojandex) {
			case 0x00: return PHPExcel_Style_Fill::FILL_NONE;
			case 0x01: return PHPExcel_Style_Fill::FILL_SOLID;
			case 0x02: return PHPExcel_Style_Fill::FILL_PATTERN_MEDIUMGRAY;
			case 0x03: return PHPExcel_Style_Fill::FILL_PATTERN_DARKGRAY;
			case 0x04: return PHPExcel_Style_Fill::FILL_PATTERN_LIGHTGRAY;
			case 0x05: return PHPExcel_Style_Fill::FILL_PATTERN_DARKHORIZONTAL;
			case 0x06: return PHPExcel_Style_Fill::FILL_PATTERN_DARKVERTICAL;
			case 0x07: return PHPExcel_Style_Fill::FILL_PATTERN_DARKDOWN;
			case 0x08: return PHPExcel_Style_Fill::FILL_PATTERN_DARKUP;
			case 0x09: return PHPExcel_Style_Fill::FILL_PATTERN_DARKGRID;
			case 0x0A: return PHPExcel_Style_Fill::FILL_PATTERN_DARKTRELLIS;
			case 0x0B: return PHPExcel_Style_Fill::FILL_PATTERN_LIGHTHORIZONTAL;
			case 0x0C: return PHPExcel_Style_Fill::FILL_PATTERN_LIGHTVERTICAL;
			case 0x0D: return PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN;
			case 0x0E: return PHPExcel_Style_Fill::FILL_PATTERN_LIGHTUP;
			case 0x0F: return PHPExcel_Style_Fill::FILL_PATTERN_LIGHTGRID;
			case 0x10: return PHPExcel_Style_Fill::FILL_PATTERN_LIGHTTRELLIS;
			case 0x11: return PHPExcel_Style_Fill::FILL_PATTERN_GRAY125;
			case 0x12: return PHPExcel_Style_Fill::FILL_PATTERN_GRAY0625;
			default:   return PHPExcel_Style_Fill::FILL_NONE;
		}
	}


	
	private static function _mapErrorCode($V2n430jknk35ubData)
	{
		switch ($V2n430jknk35ubData) {
			case 0x00: return '#NULL!';		break;
			case 0x07: return '#DIV/0!';	break;
			case 0x0F: return '#VALUE!';	break;
			case 0x17: return '#REF!';		break;
			case 0x1D: return '#NAME?';		break;
			case 0x24: return '#NUM!';		break;
			case 0x2A: return '#N/A';		break;
			default: return false;
		}
	}


	
	private static function _mapBuiltInColor($Vl5jzlxo3j3n)
	{
		switch ($Vl5jzlxo3j3n) {
			case 0x00: return array('rgb' => '000000');
			case 0x01: return array('rgb' => 'FFFFFF');
			case 0x02: return array('rgb' => 'FF0000');
			case 0x03: return array('rgb' => '00FF00');
			case 0x04: return array('rgb' => '0000FF');
			case 0x05: return array('rgb' => 'FFFF00');
			case 0x06: return array('rgb' => 'FF00FF');
			case 0x07: return array('rgb' => '00FFFF');
			case 0x40: return array('rgb' => '000000'); 
			case 0x41: return array('rgb' => 'FFFFFF'); 
			default:   return array('rgb' => '000000');
		}
	}


	
	private static function _mapColorBIFF5($V2n430jknk35ubData)
	{
		switch ($V2n430jknk35ubData) {
			case 0x08: return array('rgb' => '000000');
			case 0x09: return array('rgb' => 'FFFFFF');
			case 0x0A: return array('rgb' => 'FF0000');
			case 0x0B: return array('rgb' => '00FF00');
			case 0x0C: return array('rgb' => '0000FF');
			case 0x0D: return array('rgb' => 'FFFF00');
			case 0x0E: return array('rgb' => 'FF00FF');
			case 0x0F: return array('rgb' => '00FFFF');
			case 0x10: return array('rgb' => '800000');
			case 0x11: return array('rgb' => '008000');
			case 0x12: return array('rgb' => '000080');
			case 0x13: return array('rgb' => '808000');
			case 0x14: return array('rgb' => '800080');
			case 0x15: return array('rgb' => '008080');
			case 0x16: return array('rgb' => 'C0C0C0');
			case 0x17: return array('rgb' => '808080');
			case 0x18: return array('rgb' => '8080FF');
			case 0x19: return array('rgb' => '802060');
			case 0x1A: return array('rgb' => 'FFFFC0');
			case 0x1B: return array('rgb' => 'A0E0F0');
			case 0x1C: return array('rgb' => '600080');
			case 0x1D: return array('rgb' => 'FF8080');
			case 0x1E: return array('rgb' => '0080C0');
			case 0x1F: return array('rgb' => 'C0C0FF');
			case 0x20: return array('rgb' => '000080');
			case 0x21: return array('rgb' => 'FF00FF');
			case 0x22: return array('rgb' => 'FFFF00');
			case 0x23: return array('rgb' => '00FFFF');
			case 0x24: return array('rgb' => '800080');
			case 0x25: return array('rgb' => '800000');
			case 0x26: return array('rgb' => '008080');
			case 0x27: return array('rgb' => '0000FF');
			case 0x28: return array('rgb' => '00CFFF');
			case 0x29: return array('rgb' => '69FFFF');
			case 0x2A: return array('rgb' => 'E0FFE0');
			case 0x2B: return array('rgb' => 'FFFF80');
			case 0x2C: return array('rgb' => 'A6CAF0');
			case 0x2D: return array('rgb' => 'DD9CB3');
			case 0x2E: return array('rgb' => 'B38FEE');
			case 0x2F: return array('rgb' => 'E3E3E3');
			case 0x30: return array('rgb' => '2A6FF9');
			case 0x31: return array('rgb' => '3FB8CD');
			case 0x32: return array('rgb' => '488436');
			case 0x33: return array('rgb' => '958C41');
			case 0x34: return array('rgb' => '8E5E42');
			case 0x35: return array('rgb' => 'A0627A');
			case 0x36: return array('rgb' => '624FAC');
			case 0x37: return array('rgb' => '969696');
			case 0x38: return array('rgb' => '1D2FBE');
			case 0x39: return array('rgb' => '286676');
			case 0x3A: return array('rgb' => '004500');
			case 0x3B: return array('rgb' => '453E01');
			case 0x3C: return array('rgb' => '6A2813');
			case 0x3D: return array('rgb' => '85396A');
			case 0x3E: return array('rgb' => '4A3285');
			case 0x3F: return array('rgb' => '424242');
			default:   return array('rgb' => '000000');
		}
	}


	
	private static function _mapColor($V2n430jknk35ubData)
	{
		switch ($V2n430jknk35ubData) {
			case 0x08: return array('rgb' => '000000');
			case 0x09: return array('rgb' => 'FFFFFF');
			case 0x0A: return array('rgb' => 'FF0000');
			case 0x0B: return array('rgb' => '00FF00');
			case 0x0C: return array('rgb' => '0000FF');
			case 0x0D: return array('rgb' => 'FFFF00');
			case 0x0E: return array('rgb' => 'FF00FF');
			case 0x0F: return array('rgb' => '00FFFF');
			case 0x10: return array('rgb' => '800000');
			case 0x11: return array('rgb' => '008000');
			case 0x12: return array('rgb' => '000080');
			case 0x13: return array('rgb' => '808000');
			case 0x14: return array('rgb' => '800080');
			case 0x15: return array('rgb' => '008080');
			case 0x16: return array('rgb' => 'C0C0C0');
			case 0x17: return array('rgb' => '808080');
			case 0x18: return array('rgb' => '9999FF');
			case 0x19: return array('rgb' => '993366');
			case 0x1A: return array('rgb' => 'FFFFCC');
			case 0x1B: return array('rgb' => 'CCFFFF');
			case 0x1C: return array('rgb' => '660066');
			case 0x1D: return array('rgb' => 'FF8080');
			case 0x1E: return array('rgb' => '0066CC');
			case 0x1F: return array('rgb' => 'CCCCFF');
			case 0x20: return array('rgb' => '000080');
			case 0x21: return array('rgb' => 'FF00FF');
			case 0x22: return array('rgb' => 'FFFF00');
			case 0x23: return array('rgb' => '00FFFF');
			case 0x24: return array('rgb' => '800080');
			case 0x25: return array('rgb' => '800000');
			case 0x26: return array('rgb' => '008080');
			case 0x27: return array('rgb' => '0000FF');
			case 0x28: return array('rgb' => '00CCFF');
			case 0x29: return array('rgb' => 'CCFFFF');
			case 0x2A: return array('rgb' => 'CCFFCC');
			case 0x2B: return array('rgb' => 'FFFF99');
			case 0x2C: return array('rgb' => '99CCFF');
			case 0x2D: return array('rgb' => 'FF99CC');
			case 0x2E: return array('rgb' => 'CC99FF');
			case 0x2F: return array('rgb' => 'FFCC99');
			case 0x30: return array('rgb' => '3366FF');
			case 0x31: return array('rgb' => '33CCCC');
			case 0x32: return array('rgb' => '99CC00');
			case 0x33: return array('rgb' => 'FFCC00');
			case 0x34: return array('rgb' => 'FF9900');
			case 0x35: return array('rgb' => 'FF6600');
			case 0x36: return array('rgb' => '666699');
			case 0x37: return array('rgb' => '969696');
			case 0x38: return array('rgb' => '003366');
			case 0x39: return array('rgb' => '339966');
			case 0x3A: return array('rgb' => '003300');
			case 0x3B: return array('rgb' => '333300');
			case 0x3C: return array('rgb' => '993300');
			case 0x3D: return array('rgb' => '993366');
			case 0x3E: return array('rgb' => '333399');
			case 0x3F: return array('rgb' => '333333');
			default:   return array('rgb' => '000000');
		}
	}


	private function _parseRichText($Vfhiq1lhsojas = '') {
		$Vp4xjtpabm0l = new PHPExcel_RichText();

		$Vp4xjtpabm0l->createText($Vfhiq1lhsojas);

		return $Vp4xjtpabm0l;
	}

}
