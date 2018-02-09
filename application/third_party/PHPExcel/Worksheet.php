<?php




class PHPExcel_Worksheet implements PHPExcel_IComparable
{
    
    const BREAK_NONE   = 0;
    const BREAK_ROW    = 1;
    const BREAK_COLUMN = 2;

    
    const SHEETSTATE_VISIBLE    = 'visible';
    const SHEETSTATE_HIDDEN     = 'hidden';
    const SHEETSTATE_VERYHIDDEN = 'veryHidden';

    
    private static $Vk2yuxcvncsc = array('*', ':', '/', '\\', '?', '[', ']');

    
    private $Vq20emrsdn3q;

    
    private $V04qt0gdankv = null;

    
    private $Vyi2uhc2tffx = array();

    
    private $Vjfirvewqyjg = null;

    
    private $Vfxewca2wicy = array();

    
    private $V4h1lbeccu0d = null;

    
    private $Viyqjxjpliue = null;

    
    private $Vkmwqvc2bxkv = array();

    
    private $Vtnqistlfgjq;

    
    private $Vvdqbsxshkbi;

    
    private $Vrswl5yfa0ic;

    
    private $Vlv4tjnzanog;

    
    private $V3jais2o3jz1;

    
    private $V0ssfkqu0orr;

    
    private $V3usdakut3zb;

    
    private $Vvwpgv3qy1lw = array();

    
    private $Vstbtpp4sad5 = array();

    
    private $V04qt0gdankvIsSorted = false;

    
    private $Vwvgnsprwwfc = array();

    
    private $Vbc5qg3qc4g4 = array();

    
    private $Vpppnerwotbx = array();

    
    private $Vyepcss5g1q0 = NULL;

    
    private $Vzfihojjjgsk = '';

    
    private $V1atp41dgxql = true;

    
    private $V43stu1cdz55 = false;

    
    private $Vicpx0llqzew = true;

    
    private $Vilub2b0wmne = true;

    
    private $Vccgl5my1hfr = true;

    
    private $Vnfaly3gbdrp = array();

    
    private $Vicmoxpdlhrz = 'A1';

    
    private $Vm0kdyacsw5c = 'A1';

    
    private $Vnubxw05kpyv = 'A';

    
    private $Vhlyxt45xxjw = 1;

    
    private $Vjbcxlrqk5iy = false;

    
    private $Vw224qub4elr = array();

    
    private $Vg1mr3asopvf = array();

    
    private $V5nv0i13srya;

    
    private $Vdmlvrzuczym    = true;

    
    private $Viuupnf1e0hi    = null;

    
    private $Vkrcdi04imei = null;

	
    public function __construct(PHPExcel $Vcvzwaqkjcsw = null, $Vypaud5f2qgt = 'Worksheet')
    {
        
        $this->_parent = $Vcvzwaqkjcsw;
        $this->setTitle($Vypaud5f2qgt, FALSE);
        
	    $this->setCodeName($this->getTitle());
        $this->setSheetState(PHPExcel_Worksheet::SHEETSTATE_VISIBLE);

        $this->_cellCollection        = PHPExcel_CachedObjectStorageFactory::getInstance($this);

        
        $this->_pageSetup            = new PHPExcel_Worksheet_PageSetup();

        
        $this->_pageMargins         = new PHPExcel_Worksheet_PageMargins();

        
        $this->_headerFooter        = new PHPExcel_Worksheet_HeaderFooter();

        
        $this->_sheetView            = new PHPExcel_Worksheet_SheetView();

        
        $this->_drawingCollection    = new ArrayObject();

        
        $this->_chartCollection     = new ArrayObject();

        
        $this->_protection            = new PHPExcel_Worksheet_Protection();

        
        $this->_defaultRowDimension = new PHPExcel_Worksheet_RowDimension(NULL);

        
        $this->_defaultColumnDimension    = new PHPExcel_Worksheet_ColumnDimension(NULL);

        $this->_autoFilter            = new PHPExcel_Worksheet_AutoFilter(NULL, $this);
    }


    
	public function disconnectCells() {
    	if ( $this->_cellCollection !== NULL){
            $this->_cellCollection->unsetWorksheetCells();
            $this->_cellCollection = NULL;
    	}
        
        $this->_parent = null;
    }

    
	function __destruct() {
		PHPExcel_Calculation::getInstance($this->_parent)
		    ->clearCalculationCacheForWorksheet($this->_title);

		$this->disconnectCells();
	}

   
	public function getCellCacheController() {
        return $this->_cellCollection;
    }    


    
    public static function getInvalidCharacters()
    {
        return self::$Vk2yuxcvncsc;
    }

    
    private static function _checkSheetCodeName($Vqujkwol1zut)
    {
        $Vu441rsyjm2q = PHPExcel_Shared_String::CountCharacters($Vqujkwol1zut);
        if ($Vu441rsyjm2q == 0) {
            throw new PHPExcel_Exception('Sheet code name cannot be empty.');
        }
        
        if ((str_replace(self::$Vk2yuxcvncsc, '', $Vqujkwol1zut) !== $Vqujkwol1zut) || 
            (PHPExcel_Shared_String::Substring($Vqujkwol1zut,-1,1)=='\'') || 
            (PHPExcel_Shared_String::Substring($Vqujkwol1zut,0,1)=='\'')) {
            throw new PHPExcel_Exception('Invalid character found in sheet code name');
        }
 
        
        if ($Vu441rsyjm2q > 31) {
            throw new PHPExcel_Exception('Maximum 31 characters allowed in sheet code name.');
        }
 
        return $Vqujkwol1zut;
    }

   
    private static function _checkSheetTitle($Vqujkwol1zut)
    {
        
        if (str_replace(self::$Vk2yuxcvncsc, '', $Vqujkwol1zut) !== $Vqujkwol1zut) {
            throw new PHPExcel_Exception('Invalid character found in sheet title');
        }

        
        if (PHPExcel_Shared_String::CountCharacters($Vqujkwol1zut) > 31) {
            throw new PHPExcel_Exception('Maximum 31 characters allowed in sheet title.');
        }

        return $Vqujkwol1zut;
    }

    
    public function getCellCollection($Vklpdx31x1nl = true)
    {
        if ($Vklpdx31x1nl) {
            
            return $this->sortCellCollection();
        }
        if ($this->_cellCollection !== NULL) {
            return $this->_cellCollection->getCellList();
        }
        return array();
    }

    
    public function sortCellCollection()
    {
        if ($this->_cellCollection !== NULL) {
            return $this->_cellCollection->getSortedCellList();
        }
        return array();
    }

    
    public function getRowDimensions()
    {
        return $this->_rowDimensions;
    }

    
    public function getDefaultRowDimension()
    {
        return $this->_defaultRowDimension;
    }

    
    public function getColumnDimensions()
    {
        return $this->_columnDimensions;
    }

    
    public function getDefaultColumnDimension()
    {
        return $this->_defaultColumnDimension;
    }

    
    public function getDrawingCollection()
    {
        return $this->_drawingCollection;
    }

    
    public function getChartCollection()
    {
        return $this->_chartCollection;
    }

    
    public function addChart(PHPExcel_Chart $V23qm22ezshm = null, $Vtkqvq2h4z2h = null)
    {
        $V23qm22ezshm->setWorksheet($this);
        if (is_null($Vtkqvq2h4z2h)) {
            $this->_chartCollection[] = $V23qm22ezshm;
        } else {
            
            array_splice($this->_chartCollection, $Vtkqvq2h4z2h, 0, array($V23qm22ezshm));
        }

        return $V23qm22ezshm;
    }

    
    public function getChartCount()
    {
        return count($this->_chartCollection);
    }

    
    public function getChartByIndex($Vx5qfylfb01c = null)
    {
        $Vorscezbrib2 = count($this->_chartCollection);
        if ($Vorscezbrib2 == 0) {
            return false;
        }
        if (is_null($Vx5qfylfb01c)) {
            $Vx5qfylfb01c = --$Vorscezbrib2;
        }
        if (!isset($this->_chartCollection[$Vx5qfylfb01c])) {
            return false;
        }

        return $this->_chartCollection[$Vx5qfylfb01c];
    }

    
    public function getChartNames()
    {
        $Vbvzykmoisif = array();
        foreach($this->_chartCollection as $Vcfg4pbgiwen) {
            $Vbvzykmoisif[] = $Vcfg4pbgiwen->getName();
        }
        return $Vbvzykmoisif;
    }

    
    public function getChartByName($Vcfg4pbgiwenName = '')
    {
        $Vorscezbrib2 = count($this->_chartCollection);
        if ($Vorscezbrib2 == 0) {
            return false;
        }
        foreach($this->_chartCollection as $Vx5qfylfb01c => $Vcfg4pbgiwen) {
            if ($Vcfg4pbgiwen->getName() == $Vcfg4pbgiwenName) {
                return $this->_chartCollection[$Vx5qfylfb01c];
            }
        }
        return false;
    }

    
    public function refreshColumnDimensions()
    {
        $Vhnkgh02raxn = $this->getColumnDimensions();
        $V3dwjhrhpk5o = array();

        foreach ($Vhnkgh02raxn as $Vn0px304kon1) {
            $V3dwjhrhpk5o[$Vn0px304kon1->getColumnIndex()] = $Vn0px304kon1;
        }

        $this->_columnDimensions = $V3dwjhrhpk5o;

        return $this;
    }

    
    public function refreshRowDimensions()
    {
        $V4vqioq1nd5r = $this->getRowDimensions();
        $Vkaxu242vjbb = array();

        foreach ($V4vqioq1nd5r as $V5y1wdta3xmw) {
            $Vkaxu242vjbb[$V5y1wdta3xmw->getRowIndex()] = $V5y1wdta3xmw;
        }

        $this->_rowDimensions = $Vkaxu242vjbb;

        return $this;
    }

    
    public function calculateWorksheetDimension()
    {
        
        return 'A1' . ':' .  $this->getHighestColumn() . $this->getHighestRow();
    }

    
    public function calculateWorksheetDataDimension()
    {
        
        return 'A1' . ':' .  $this->getHighestDataColumn() . $this->getHighestDataRow();
    }

    
    public function calculateColumnWidths($Vilota3ob5rb = false)
    {
        
        $V2we1p1iv1u0 = array();
        foreach ($this->getColumnDimensions() as $Vcmrdmsck1op) {
            if ($Vcmrdmsck1op->getAutoSize()) {
                $V2we1p1iv1u0[$Vcmrdmsck1op->getColumnIndex()] = -1;
            }
        }

        
        if (!empty($V2we1p1iv1u0)) {

            
            $Vcuk3lsigrvl = array();
            foreach ($this->getMergeCells() as $V3rz1hdd5wih) {
                foreach (PHPExcel_Cell::extractAllCellReferencesInRange($V3rz1hdd5wih) as $Vgtpnvip12fz) {
                    $Vcuk3lsigrvl[$Vgtpnvip12fz] = true;
                }
            }

            
            foreach ($this->getCellCollection(false) as $Vhibevwz1gkx) {
                $Vblc1ueqvbti = $this->getCell($Vhibevwz1gkx);
				if (isset($V2we1p1iv1u0[$this->_cellCollection->getCurrentColumn()])) {
                    
					if (!isset($Vcuk3lsigrvl[$this->_cellCollection->getCurrentAddress()])) {
                        
                        
						$Vblc1ueqvbtiValue = PHPExcel_Style_NumberFormat::toFormattedString(
							$Vblc1ueqvbti->getCalculatedValue(),
							$this->getParent()->getCellXfByIndex($Vblc1ueqvbti->getXfIndex())->getNumberFormat()->getFormatCode()
						);

						$V2we1p1iv1u0[$this->_cellCollection->getCurrentColumn()] = max(
							(float) $V2we1p1iv1u0[$this->_cellCollection->getCurrentColumn()],
                            (float)PHPExcel_Shared_Font::calculateColumnWidth(
								$this->getParent()->getCellXfByIndex($Vblc1ueqvbti->getXfIndex())->getFont(),
                                $Vblc1ueqvbtiValue,
								$this->getParent()->getCellXfByIndex($Vblc1ueqvbti->getXfIndex())->getAlignment()->getTextRotation(),
                                $this->getDefaultStyle()->getFont()
                            )
                        );
                    }
                }
            }

            
            foreach ($V2we1p1iv1u0 as $Vdpliwd4tl4l => $Vojs2qdgagwv) {
                if ($Vojs2qdgagwv == -1) $Vojs2qdgagwv = $this->getDefaultColumnDimension()->getWidth();
                $this->getColumnDimension($Vdpliwd4tl4l)->setWidth($Vojs2qdgagwv);
            }
        }

        return $this;
    }

    
	public function getParent() {
        return $this->_parent;
    }

    
	public function rebindParent(PHPExcel $V3jkqexf4nr0) {
        if ($this->_parent !== null) {
            $Voybjd4b0rcn = $this->_parent->getNamedRanges();
            foreach ($Voybjd4b0rcn as $Vdqyivdsly3d) {
                $V3jkqexf4nr0->addNamedRange($Vdqyivdsly3d);
            }

            $this->_parent->removeSheetByIndex(
                $this->_parent->getIndex($this)
            );
        }
        $this->_parent = $V3jkqexf4nr0;

        return $this;
    }

    
    public function getTitle()
    {
        return $this->_title;
    }

    
    public function setTitle($Vqujkwol1zut = 'Worksheet', $Vwwzqgcpssb1 = true)
    {
        
        if ($this->getTitle() == $Vqujkwol1zut) {
            return $this;
        }

        
        self::_checkSheetTitle($Vqujkwol1zut);

        
        $V2ph2cdbyezi = $this->getTitle();

        if ($this->_parent) {
            
			if ($this->_parent->sheetNameExists($Vqujkwol1zut)) {
                

                if (PHPExcel_Shared_String::CountCharacters($Vqujkwol1zut) > 29) {
                    $Vqujkwol1zut = PHPExcel_Shared_String::Substring($Vqujkwol1zut,0,29);
                }
                $Vfhiq1lhsoja = 1;
				while ($this->_parent->sheetNameExists($Vqujkwol1zut . ' ' . $Vfhiq1lhsoja)) {
                    ++$Vfhiq1lhsoja;
                    if ($Vfhiq1lhsoja == 10) {
                        if (PHPExcel_Shared_String::CountCharacters($Vqujkwol1zut) > 28) {
                            $Vqujkwol1zut = PHPExcel_Shared_String::Substring($Vqujkwol1zut,0,28);
                        }
                    } elseif ($Vfhiq1lhsoja == 100) {
                        if (PHPExcel_Shared_String::CountCharacters($Vqujkwol1zut) > 27) {
                            $Vqujkwol1zut = PHPExcel_Shared_String::Substring($Vqujkwol1zut,0,27);
                        }
                    }
                }

                $Vtdewjcodwo3 = $Vqujkwol1zut . ' ' . $Vfhiq1lhsoja;
                return $this->setTitle($Vtdewjcodwo3,$Vwwzqgcpssb1);
            }
        }

        
        $this->_title = $Vqujkwol1zut;
        $this->_dirty = true;

        if ($this->_parent) {
            
            $Vavale4ro4xo = $this->getTitle();
			PHPExcel_Calculation::getInstance($this->_parent)
			    ->renameCalculationCacheForWorksheet($V2ph2cdbyezi, $Vavale4ro4xo);
            if ($Vwwzqgcpssb1)
				PHPExcel_ReferenceHelper::getInstance()->updateNamedFormulas($this->_parent, $V2ph2cdbyezi, $Vavale4ro4xo);
        }

        return $this;
    }

    
	public function getSheetState() {
        return $this->_sheetState;
    }

    
	public function setSheetState($Vp4xjtpabm0l = PHPExcel_Worksheet::SHEETSTATE_VISIBLE) {
        $this->_sheetState = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function getPageSetup()
    {
        return $this->_pageSetup;
    }

    
    public function setPageSetup(PHPExcel_Worksheet_PageSetup $Vqujkwol1zut)
    {
        $this->_pageSetup = $Vqujkwol1zut;
        return $this;
    }

    
    public function getPageMargins()
    {
        return $this->_pageMargins;
    }

    
    public function setPageMargins(PHPExcel_Worksheet_PageMargins $Vqujkwol1zut)
    {
        $this->_pageMargins = $Vqujkwol1zut;
        return $this;
    }

    
    public function getHeaderFooter()
    {
        return $this->_headerFooter;
    }

    
    public function setHeaderFooter(PHPExcel_Worksheet_HeaderFooter $Vqujkwol1zut)
    {
        $this->_headerFooter = $Vqujkwol1zut;
        return $this;
    }

    
    public function getSheetView()
    {
        return $this->_sheetView;
    }

    
    public function setSheetView(PHPExcel_Worksheet_SheetView $Vqujkwol1zut)
    {
        $this->_sheetView = $Vqujkwol1zut;
        return $this;
    }

    
    public function getProtection()
    {
        return $this->_protection;
    }

    
    public function setProtection(PHPExcel_Worksheet_Protection $Vqujkwol1zut)
    {
        $this->_protection = $Vqujkwol1zut;
        $this->_dirty = true;

        return $this;
    }

    
    public function getHighestColumn($Vexbtekafkvl = null)
    {
        if ($Vexbtekafkvl == null) {
            return $this->_cachedHighestColumn;
        }
        return $this->getHighestDataColumn($Vexbtekafkvl);
    }

    
    public function getHighestDataColumn($Vexbtekafkvl = null)
    {
        return $this->_cellCollection->getHighestColumn($Vexbtekafkvl);
    }

    
    public function getHighestRow($Vn4q2p4mkwa0 = null)
    {
        if ($Vn4q2p4mkwa0 == null) {
            return $this->_cachedHighestRow;
        }
        return $this->getHighestDataRow($Vn4q2p4mkwa0);
    }

    
    public function getHighestDataRow($Vn4q2p4mkwa0 = null)
    {
        return $this->_cellCollection->getHighestRow($Vn4q2p4mkwa0);
    }

    
    public function getHighestRowAndColumn()
    {
        return $this->_cellCollection->getHighestRowAndColumn();
    }

    
    public function setCellValue($Vgefg31xuj0v = 'A1', $Vqujkwol1zut = null, $Vrchv1kygaqp = false)
    {
        $Vblc1ueqvbti = $this->getCell($Vgefg31xuj0v)->setValue($Vqujkwol1zut);
        return ($Vrchv1kygaqp) ? $Vblc1ueqvbti : $this;
    }

    
    public function setCellValueByColumnAndRow($Voblvrlehdwb = 0, $Vsb2id3rjpxz = 1, $Vqujkwol1zut = null, $Vrchv1kygaqp = false)
    {
        $Vblc1ueqvbti = $this->getCellByColumnAndRow($Voblvrlehdwb, $Vsb2id3rjpxz)->setValue($Vqujkwol1zut);
        return ($Vrchv1kygaqp) ? $Vblc1ueqvbti : $this;
    }

    
    public function setCellValueExplicit($Vgefg31xuj0v = 'A1', $Vqujkwol1zut = null, $Vw4dlsyiwh5c = PHPExcel_Cell_DataType::TYPE_STRING, $Vrchv1kygaqp = false)
    {
        
        $Vblc1ueqvbti = $this->getCell($Vgefg31xuj0v)->setValueExplicit($Vqujkwol1zut, $Vw4dlsyiwh5c);
        return ($Vrchv1kygaqp) ? $Vblc1ueqvbti : $this;
    }

    
    public function setCellValueExplicitByColumnAndRow($Voblvrlehdwb = 0, $Vsb2id3rjpxz = 1, $Vqujkwol1zut = null, $Vw4dlsyiwh5c = PHPExcel_Cell_DataType::TYPE_STRING, $Vrchv1kygaqp = false)
    {
        $Vblc1ueqvbti = $this->getCellByColumnAndRow($Voblvrlehdwb, $Vsb2id3rjpxz)->setValueExplicit($Vqujkwol1zut, $Vw4dlsyiwh5c);
        return ($Vrchv1kygaqp) ? $Vblc1ueqvbti : $this;
    }

    
    public function getCell($Vgefg31xuj0v = 'A1')
    {
        
        if ($this->_cellCollection->isDataSet($Vgefg31xuj0v)) {
            return $this->_cellCollection->getCacheData($Vgefg31xuj0v);
        }

        
        if (strpos($Vgefg31xuj0v, '!') !== false) {
            $Vtug4dlzuccm = PHPExcel_Worksheet::extractSheetTitle($Vgefg31xuj0v, true);
			return $this->_parent->getSheetByName($Vtug4dlzuccm[0])->getCell($Vtug4dlzuccm[1]);
        }

        
        if ((!preg_match('/^'.PHPExcel_Calculation::CALCULATION_REGEXP_CELLREF.'$/i', $Vgefg31xuj0v, $Vt3xexsia3ta)) &&
            (preg_match('/^'.PHPExcel_Calculation::CALCULATION_REGEXP_NAMEDRANGE.'$/i', $Vgefg31xuj0v, $Vt3xexsia3ta))) {
            $Vdqyivdsly3d = PHPExcel_NamedRange::resolveRange($Vgefg31xuj0v, $this);
            if ($Vdqyivdsly3d !== NULL) {
                $Vgefg31xuj0v = $Vdqyivdsly3d->getRange();
                return $Vdqyivdsly3d->getWorksheet()->getCell($Vgefg31xuj0v);
            }
        }

        
        $Vgefg31xuj0v = strtoupper($Vgefg31xuj0v);

        if (strpos($Vgefg31xuj0v, ':') !== false || strpos($Vgefg31xuj0v, ',') !== false) {
            throw new PHPExcel_Exception('Cell coordinate can not be a range of cells.');
        } elseif (strpos($Vgefg31xuj0v, '$') !== false) {
            throw new PHPExcel_Exception('Cell coordinate must not be absolute.');
        }

        
        return $this->_createNewCell($Vgefg31xuj0v);
    }

    
    public function getCellByColumnAndRow($Voblvrlehdwb = 0, $Vsb2id3rjpxz = 1)
    {
        $Vn4q2p4mkwa0Letter = PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb);
        $Vwykjuif1nf3 = $Vn4q2p4mkwa0Letter . $Vsb2id3rjpxz;

        if ($this->_cellCollection->isDataSet($Vwykjuif1nf3)) {
            return $this->_cellCollection->getCacheData($Vwykjuif1nf3);
        }

		return $this->_createNewCell($Vwykjuif1nf3);
    }

    
	private function _createNewCell($Vgefg31xuj0v)
	{
		$Vblc1ueqvbti = $this->_cellCollection->addCacheData(
			$Vgefg31xuj0v,
			new PHPExcel_Cell(
				NULL, 
				PHPExcel_Cell_DataType::TYPE_NULL, 
				$this
			)
		);
        $this->_cellCollectionIsSorted = false;

        
        $Vgiaghj0r1a2 = PHPExcel_Cell::coordinateFromString($Vgefg31xuj0v);
        if (PHPExcel_Cell::columnIndexFromString($this->_cachedHighestColumn) < PHPExcel_Cell::columnIndexFromString($Vgiaghj0r1a2[0]))
            $this->_cachedHighestColumn = $Vgiaghj0r1a2[0];
        $this->_cachedHighestRow = max($this->_cachedHighestRow, $Vgiaghj0r1a2[1]);

        
		
        $VexbtekafkvlDimension    = $this->getRowDimension($Vgiaghj0r1a2[1], FALSE);
        $Vn4q2p4mkwa0Dimension = $this->getColumnDimension($Vgiaghj0r1a2[0], FALSE);

        if ($VexbtekafkvlDimension !== NULL && $VexbtekafkvlDimension->getXfIndex() > 0) {
            
            $Vblc1ueqvbti->setXfIndex($VexbtekafkvlDimension->getXfIndex());
        } elseif ($Vn4q2p4mkwa0Dimension !== NULL && $Vn4q2p4mkwa0Dimension->getXfIndex() > 0) {
            
            $Vblc1ueqvbti->setXfIndex($Vn4q2p4mkwa0Dimension->getXfIndex());
        }

        return $Vblc1ueqvbti;
	}
	
    
    public function cellExists($Vgefg31xuj0v = 'A1')
    {
        
        if (strpos($Vgefg31xuj0v, '!') !== false) {
            $Vtug4dlzuccm = PHPExcel_Worksheet::extractSheetTitle($Vgefg31xuj0v, true);
			return $this->_parent->getSheetByName($Vtug4dlzuccm[0])->cellExists($Vtug4dlzuccm[1]);
        }

        
        if ((!preg_match('/^'.PHPExcel_Calculation::CALCULATION_REGEXP_CELLREF.'$/i', $Vgefg31xuj0v, $Vt3xexsia3ta)) &&
            (preg_match('/^'.PHPExcel_Calculation::CALCULATION_REGEXP_NAMEDRANGE.'$/i', $Vgefg31xuj0v, $Vt3xexsia3ta))) {
            $Vdqyivdsly3d = PHPExcel_NamedRange::resolveRange($Vgefg31xuj0v, $this);
            if ($Vdqyivdsly3d !== NULL) {
                $Vgefg31xuj0v = $Vdqyivdsly3d->getRange();
                if ($this->getHashCode() != $Vdqyivdsly3d->getWorksheet()->getHashCode()) {
                    if (!$Vdqyivdsly3d->getLocalOnly()) {
                        return $Vdqyivdsly3d->getWorksheet()->cellExists($Vgefg31xuj0v);
                    } else {
                        throw new PHPExcel_Exception('Named range ' . $Vdqyivdsly3d->getName() . ' is not accessible from within sheet ' . $this->getTitle());
                    }
                }
            }
            else { return false; }
        }

        
        $Vgefg31xuj0v = strtoupper($Vgefg31xuj0v);

        if (strpos($Vgefg31xuj0v,':') !== false || strpos($Vgefg31xuj0v,',') !== false) {
            throw new PHPExcel_Exception('Cell coordinate can not be a range of cells.');
        } elseif (strpos($Vgefg31xuj0v,'$') !== false) {
            throw new PHPExcel_Exception('Cell coordinate must not be absolute.');
        } else {
            
            $Vgiaghj0r1a2 = PHPExcel_Cell::coordinateFromString($Vgefg31xuj0v);

            
            return $this->_cellCollection->isDataSet($Vgefg31xuj0v);
        }
    }

    
    public function cellExistsByColumnAndRow($Voblvrlehdwb = 0, $Vsb2id3rjpxz = 1)
    {
        return $this->cellExists(PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb) . $Vsb2id3rjpxz);
    }

    
    public function getRowDimension($Vsb2id3rjpxz = 1, $Vm5ybfejmmxd = TRUE)
    {
        
        $Valwom5reivu = null;

        
        if (!isset($this->_rowDimensions[$Vsb2id3rjpxz])) {
			if (!$Vm5ybfejmmxd)
				return NULL;
            $this->_rowDimensions[$Vsb2id3rjpxz] = new PHPExcel_Worksheet_RowDimension($Vsb2id3rjpxz);

            $this->_cachedHighestRow = max($this->_cachedHighestRow,$Vsb2id3rjpxz);
        }
        return $this->_rowDimensions[$Vsb2id3rjpxz];
    }

    
    public function getColumnDimension($Voblvrlehdwb = 'A', $Vm5ybfejmmxd = TRUE)
    {
        
        $Voblvrlehdwb = strtoupper($Voblvrlehdwb);

        
        if (!isset($this->_columnDimensions[$Voblvrlehdwb])) {
			if (!$Vm5ybfejmmxd)
				return NULL;
            $this->_columnDimensions[$Voblvrlehdwb] = new PHPExcel_Worksheet_ColumnDimension($Voblvrlehdwb);

            if (PHPExcel_Cell::columnIndexFromString($this->_cachedHighestColumn) < PHPExcel_Cell::columnIndexFromString($Voblvrlehdwb))
                $this->_cachedHighestColumn = $Voblvrlehdwb;
        }
        return $this->_columnDimensions[$Voblvrlehdwb];
    }

    
    public function getColumnDimensionByColumn($Voblvrlehdwb = 0)
    {
        return $this->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb));
    }

    
    public function getStyles()
    {
        return $this->_styles;
    }

    
    public function getDefaultStyle()
    {
        return $this->_parent->getDefaultStyle();
    }

    
    public function setDefaultStyle(PHPExcel_Style $Vqujkwol1zut)
    {
        $this->_parent->getDefaultStyle()->applyFromArray(array(
            'font' => array(
                'name' => $Vqujkwol1zut->getFont()->getName(),
                'size' => $Vqujkwol1zut->getFont()->getSize(),
            ),
        ));
        return $this;
    }

    
    public function getStyle($Vz4kpb5uwvkj = 'A1')
    {
        
        $this->_parent->setActiveSheetIndex($this->_parent->getIndex($this));

        
        $this->setSelectedCells($Vz4kpb5uwvkj);

        return $this->_parent->getCellXfSupervisor();
    }

    
    public function getConditionalStyles($Vgefg31xuj0v = 'A1')
    {
        if (!isset($this->_conditionalStylesCollection[$Vgefg31xuj0v])) {
            $this->_conditionalStylesCollection[$Vgefg31xuj0v] = array();
        }
        return $this->_conditionalStylesCollection[$Vgefg31xuj0v];
    }

    
    public function conditionalStylesExists($Vgefg31xuj0v = 'A1')
    {
        if (isset($this->_conditionalStylesCollection[$Vgefg31xuj0v])) {
            return true;
        }
        return false;
    }

    
    public function removeConditionalStyles($Vgefg31xuj0v = 'A1')
    {
        unset($this->_conditionalStylesCollection[$Vgefg31xuj0v]);
        return $this;
    }

    
    public function getConditionalStylesCollection()
    {
        return $this->_conditionalStylesCollection;
    }

    
    public function setConditionalStyles($Vgefg31xuj0v = 'A1', $Vqujkwol1zut)
    {
        $this->_conditionalStylesCollection[$Vgefg31xuj0v] = $Vqujkwol1zut;
        return $this;
    }

    
    public function getStyleByColumnAndRow($Voblvrlehdwb = 0, $Vsb2id3rjpxz = 1, $Voblvrlehdwb2 = null, $Vsb2id3rjpxz2 = null)
    {
        if (!is_null($Voblvrlehdwb2) && !is_null($Vsb2id3rjpxz2)) {
		    $Vblc1ueqvbtiRange = PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb) . $Vsb2id3rjpxz . ':' . 
                PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb2) . $Vsb2id3rjpxz2;
		    return $this->getStyle($Vblc1ueqvbtiRange);
	    }

        return $this->getStyle(PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb) . $Vsb2id3rjpxz);
    }

    
    public function setSharedStyle(PHPExcel_Style $Vkvs3d1pxzyb = null, $Vem4atrpzxcs = '')
    {
        $this->duplicateStyle($Vkvs3d1pxzyb, $Vem4atrpzxcs);
        return $this;
    }

    
    public function duplicateStyle(PHPExcel_Style $Vhm011eyo1gw = null, $Vem4atrpzxcs = '')
    {
        
        $Vdtcpflt5bhp = $Vhm011eyo1gw->getIsSupervisor() ? $Vhm011eyo1gw->getSharedComponent() : $Vhm011eyo1gw;

        
        $Vnqhol1l3dnz = $this->_parent;
		if ($V4re5bk2yecc = $this->_parent->getCellXfByHashCode($Vhm011eyo1gw->getHashCode())) {
            
            $V4de3455flza = $V4re5bk2yecc->getIndex();
        } else {
            
            $Vnqhol1l3dnz->addCellXf($Vhm011eyo1gw);
            $V4de3455flza = $Vhm011eyo1gw->getIndex();
        }

        
        list($Vfo4g014tbnf, $Vaoibuxbewds) = PHPExcel_Cell::rangeBoundaries($Vem4atrpzxcs . ':' . $Vem4atrpzxcs);

        
        if ($Vfo4g014tbnf[0] > $Vaoibuxbewds[0] && $Vfo4g014tbnf[1] > $Vaoibuxbewds[1]) {
            $Vdln1z2oxpjs = $Vfo4g014tbnf;
            $Vfo4g014tbnf = $Vaoibuxbewds;
            $Vaoibuxbewds = $Vdln1z2oxpjs;
        }

        
        for ($Vswazvoa3xts = $Vfo4g014tbnf[0]; $Vswazvoa3xts <= $Vaoibuxbewds[0]; ++$Vswazvoa3xts) {
            for ($Vexbtekafkvl = $Vfo4g014tbnf[1]; $Vexbtekafkvl <= $Vaoibuxbewds[1]; ++$Vexbtekafkvl) {
                $this->getCell(PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts - 1) . $Vexbtekafkvl)->setXfIndex($V4de3455flza);
            }
        }

        return $this;
    }

    
    public function duplicateConditionalStyle(array $Vhm011eyo1gw = null, $Vem4atrpzxcs = '')
    {
        foreach($Vhm011eyo1gw as $Vblc1ueqvbtiStyle) {
            if (!($Vblc1ueqvbtiStyle instanceof PHPExcel_Style_Conditional)) {
                throw new PHPExcel_Exception('Style is not a conditional style');
            }
        }

        
        list($Vfo4g014tbnf, $Vaoibuxbewds) = PHPExcel_Cell::rangeBoundaries($Vem4atrpzxcs . ':' . $Vem4atrpzxcs);

        
        if ($Vfo4g014tbnf[0] > $Vaoibuxbewds[0] && $Vfo4g014tbnf[1] > $Vaoibuxbewds[1]) {
            $Vdln1z2oxpjs = $Vfo4g014tbnf;
            $Vfo4g014tbnf = $Vaoibuxbewds;
            $Vaoibuxbewds = $Vdln1z2oxpjs;
        }

        
        for ($Vswazvoa3xts = $Vfo4g014tbnf[0]; $Vswazvoa3xts <= $Vaoibuxbewds[0]; ++$Vswazvoa3xts) {
            for ($Vexbtekafkvl = $Vfo4g014tbnf[1]; $Vexbtekafkvl <= $Vaoibuxbewds[1]; ++$Vexbtekafkvl) {
                $this->setConditionalStyles(PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts - 1) . $Vexbtekafkvl, $Vhm011eyo1gw);
            }
        }

        return $this;
    }

    
    public function duplicateStyleArray($Vkaawzjkapbw = null, $Vem4atrpzxcs = '', $Vrjsmucskala = true)
    {
        $this->getStyle($Vem4atrpzxcs)->applyFromArray($Vkaawzjkapbw, $Vrjsmucskala);
        return $this;
    }

    
    public function setBreak($Vp0mtfiyrfm5 = 'A1', $Vmx0vfcxnxi5 = PHPExcel_Worksheet::BREAK_NONE)
    {
        
        $Vp0mtfiyrfm5 = strtoupper($Vp0mtfiyrfm5);

        if ($Vp0mtfiyrfm5 != '') {
        	if ($Vmx0vfcxnxi5 == PHPExcel_Worksheet::BREAK_NONE) {
        		if (isset($this->_breaks[$Vp0mtfiyrfm5])) {
	            	unset($this->_breaks[$Vp0mtfiyrfm5]);
        		}
        	} else {
	            $this->_breaks[$Vp0mtfiyrfm5] = $Vmx0vfcxnxi5;
	        }
        } else {
            throw new PHPExcel_Exception('No cell coordinate specified.');
        }

        return $this;
    }

    
    public function setBreakByColumnAndRow($Voblvrlehdwb = 0, $Vsb2id3rjpxz = 1, $Vmx0vfcxnxi5 = PHPExcel_Worksheet::BREAK_NONE)
    {
        return $this->setBreak(PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb) . $Vsb2id3rjpxz, $Vmx0vfcxnxi5);
    }

    
    public function getBreaks()
    {
        return $this->_breaks;
    }

    
    public function mergeCells($Vem4atrpzxcs = 'A1:A1')
    {
        
        $Vem4atrpzxcs = strtoupper($Vem4atrpzxcs);

        if (strpos($Vem4atrpzxcs,':') !== false) {
            $this->_mergeCells[$Vem4atrpzxcs] = $Vem4atrpzxcs;

            

            
            $Vzb52qcgoo0r = PHPExcel_Cell::extractAllCellReferencesInRange($Vem4atrpzxcs);

            
            $Vr5giegwso3u = $Vzb52qcgoo0r[0];
            if (!$this->cellExists($Vr5giegwso3u)) {
                $this->getCell($Vr5giegwso3u)->setValueExplicit(null, PHPExcel_Cell_DataType::TYPE_NULL);
            }

            
            $Vytbsuz3c5qz = count($Vzb52qcgoo0r);
            for ($Vfhiq1lhsoja = 1; $Vfhiq1lhsoja < $Vytbsuz3c5qz; $Vfhiq1lhsoja++) {
                $this->getCell($Vzb52qcgoo0r[$Vfhiq1lhsoja])->setValueExplicit(null, PHPExcel_Cell_DataType::TYPE_NULL);
            }

        } else {
            throw new PHPExcel_Exception('Merge must be set on a range of cells.');
        }

        return $this;
    }

    
    public function mergeCellsByColumnAndRow($Voblvrlehdwb1 = 0, $Vsb2id3rjpxz1 = 1, $Voblvrlehdwb2 = 0, $Vsb2id3rjpxz2 = 1)
    {
        $Vblc1ueqvbtiRange = PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb1) . $Vsb2id3rjpxz1 . ':' . PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb2) . $Vsb2id3rjpxz2;
        return $this->mergeCells($Vblc1ueqvbtiRange);
    }

    
    public function unmergeCells($Vem4atrpzxcs = 'A1:A1')
    {
        
        $Vem4atrpzxcs = strtoupper($Vem4atrpzxcs);

        if (strpos($Vem4atrpzxcs,':') !== false) {
            if (isset($this->_mergeCells[$Vem4atrpzxcs])) {
                unset($this->_mergeCells[$Vem4atrpzxcs]);
            } else {
                throw new PHPExcel_Exception('Cell range ' . $Vem4atrpzxcs . ' not known as merged.');
            }
        } else {
            throw new PHPExcel_Exception('Merge can only be removed from a range of cells.');
        }

        return $this;
    }

    
    public function unmergeCellsByColumnAndRow($Voblvrlehdwb1 = 0, $Vsb2id3rjpxz1 = 1, $Voblvrlehdwb2 = 0, $Vsb2id3rjpxz2 = 1)
    {
        $Vblc1ueqvbtiRange = PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb1) . $Vsb2id3rjpxz1 . ':' . PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb2) . $Vsb2id3rjpxz2;
        return $this->unmergeCells($Vblc1ueqvbtiRange);
    }

    
    public function getMergeCells()
    {
        return $this->_mergeCells;
    }

    
    public function setMergeCells($Vqujkwol1zut = array())
    {
        $this->_mergeCells = $Vqujkwol1zut;

        return $this;
    }

    
    public function protectCells($Vem4atrpzxcs = 'A1', $Vis1rgbmupxf = '', $Vkwqfcocb3p1 = false)
    {
        
        $Vem4atrpzxcs = strtoupper($Vem4atrpzxcs);

        if (!$Vkwqfcocb3p1) {
            $Vis1rgbmupxf = PHPExcel_Shared_PasswordHasher::hashPassword($Vis1rgbmupxf);
        }
        $this->_protectedCells[$Vem4atrpzxcs] = $Vis1rgbmupxf;

        return $this;
    }

    
    public function protectCellsByColumnAndRow($Voblvrlehdwb1 = 0, $Vsb2id3rjpxz1 = 1, $Voblvrlehdwb2 = 0, $Vsb2id3rjpxz2 = 1, $Vis1rgbmupxf = '', $Vkwqfcocb3p1 = false)
    {
        $Vblc1ueqvbtiRange = PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb1) . $Vsb2id3rjpxz1 . ':' . PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb2) . $Vsb2id3rjpxz2;
        return $this->protectCells($Vblc1ueqvbtiRange, $Vis1rgbmupxf, $Vkwqfcocb3p1);
    }

    
    public function unprotectCells($Vem4atrpzxcs = 'A1')
    {
        
        $Vem4atrpzxcs = strtoupper($Vem4atrpzxcs);

        if (isset($this->_protectedCells[$Vem4atrpzxcs])) {
            unset($this->_protectedCells[$Vem4atrpzxcs]);
        } else {
            throw new PHPExcel_Exception('Cell range ' . $Vem4atrpzxcs . ' not known as protected.');
        }
        return $this;
    }

    
    public function unprotectCellsByColumnAndRow($Voblvrlehdwb1 = 0, $Vsb2id3rjpxz1 = 1, $Voblvrlehdwb2 = 0, $Vsb2id3rjpxz2 = 1, $Vis1rgbmupxf = '', $Vkwqfcocb3p1 = false)
    {
        $Vblc1ueqvbtiRange = PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb1) . $Vsb2id3rjpxz1 . ':' . PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb2) . $Vsb2id3rjpxz2;
        return $this->unprotectCells($Vblc1ueqvbtiRange, $Vis1rgbmupxf, $Vkwqfcocb3p1);
    }

    
    public function getProtectedCells()
    {
        return $this->_protectedCells;
    }

    
    public function getAutoFilter()
    {
        return $this->_autoFilter;
    }

    
    public function setAutoFilter($Vqujkwol1zut)
    {
        if (is_string($Vqujkwol1zut)) {
            $this->_autoFilter->setRange($Vqujkwol1zut);
        } elseif(is_object($Vqujkwol1zut) && ($Vqujkwol1zut instanceof PHPExcel_Worksheet_AutoFilter)) {
            $this->_autoFilter = $Vqujkwol1zut;
        }
        return $this;
    }

    
    public function setAutoFilterByColumnAndRow($Voblvrlehdwb1 = 0, $Vsb2id3rjpxz1 = 1, $Voblvrlehdwb2 = 0, $Vsb2id3rjpxz2 = 1)
    {
        return $this->setAutoFilter(
            PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb1) . $Vsb2id3rjpxz1
            . ':' .
            PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb2) . $Vsb2id3rjpxz2
        );
    }

    
    public function removeAutoFilter()
    {
        $this->_autoFilter->setRange(NULL);
        return $this;
    }

    
    public function getFreezePane()
    {
        return $this->_freezePane;
    }

    
    public function freezePane($Vp0mtfiyrfm5 = '')
    {
        
        $Vp0mtfiyrfm5 = strtoupper($Vp0mtfiyrfm5);

        if (strpos($Vp0mtfiyrfm5,':') === false && strpos($Vp0mtfiyrfm5,',') === false) {
            $this->_freezePane = $Vp0mtfiyrfm5;
        } else {
            throw new PHPExcel_Exception('Freeze pane can not be set on a range of cells.');
        }
        return $this;
    }

    
    public function freezePaneByColumnAndRow($Voblvrlehdwb = 0, $Vsb2id3rjpxz = 1)
    {
        return $this->freezePane(PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb) . $Vsb2id3rjpxz);
    }

    
    public function unfreezePane()
    {
        return $this->freezePane('');
    }

    
    public function insertNewRowBefore($Vjc2xrk0yo3z = 1, $Vfbjwfstqsr5 = 1) {
        if ($Vjc2xrk0yo3z >= 1) {
            $Vavmfwd5d2lm = PHPExcel_ReferenceHelper::getInstance();
            $Vavmfwd5d2lm->insertNewBefore('A' . $Vjc2xrk0yo3z, 0, $Vfbjwfstqsr5, $this);
        } else {
            throw new PHPExcel_Exception("Rows can only be inserted before at least row 1.");
        }
        return $this;
    }

    
    public function insertNewColumnBefore($Vjc2xrk0yo3z = 'A', $V2su05vxiqnr = 1) {
        if (!is_numeric($Vjc2xrk0yo3z)) {
            $Vavmfwd5d2lm = PHPExcel_ReferenceHelper::getInstance();
            $Vavmfwd5d2lm->insertNewBefore($Vjc2xrk0yo3z . '1', $V2su05vxiqnr, 0, $this);
        } else {
            throw new PHPExcel_Exception("Column references should not be numeric.");
        }
        return $this;
    }

    
    public function insertNewColumnBeforeByIndex($Vjc2xrk0yo3z = 0, $V2su05vxiqnr = 1) {
        if ($Vjc2xrk0yo3z >= 0) {
            return $this->insertNewColumnBefore(PHPExcel_Cell::stringFromColumnIndex($Vjc2xrk0yo3z), $V2su05vxiqnr);
        } else {
            throw new PHPExcel_Exception("Columns can only be inserted before at least column A (0).");
        }
    }

    
    public function removeRow($Vsb2id3rjpxz = 1, $Vfbjwfstqsr5 = 1) {
        if ($Vsb2id3rjpxz >= 1) {
            $Vavmfwd5d2lm = PHPExcel_ReferenceHelper::getInstance();
            $Vavmfwd5d2lm->insertNewBefore('A' . ($Vsb2id3rjpxz + $Vfbjwfstqsr5), 0, -$Vfbjwfstqsr5, $this);
        } else {
            throw new PHPExcel_Exception("Rows to be deleted should at least start from row 1.");
        }
        return $this;
    }

    
    public function removeColumn($Voblvrlehdwb = 'A', $V2su05vxiqnr = 1) {
        if (!is_numeric($Voblvrlehdwb)) {
            $Voblvrlehdwb = PHPExcel_Cell::stringFromColumnIndex(PHPExcel_Cell::columnIndexFromString($Voblvrlehdwb) - 1 + $V2su05vxiqnr);
            $Vavmfwd5d2lm = PHPExcel_ReferenceHelper::getInstance();
            $Vavmfwd5d2lm->insertNewBefore($Voblvrlehdwb . '1', -$V2su05vxiqnr, 0, $this);
        } else {
            throw new PHPExcel_Exception("Column references should not be numeric.");
        }
        return $this;
    }

    
    public function removeColumnByIndex($Voblvrlehdwb = 0, $V2su05vxiqnr = 1) {
        if ($Voblvrlehdwb >= 0) {
            return $this->removeColumn(PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb), $V2su05vxiqnr);
        } else {
            throw new PHPExcel_Exception("Columns to be deleted should at least start from column 0");
        }
    }

    
    public function getShowGridlines() {
        return $this->_showGridlines;
    }

    
    public function setShowGridlines($Vqujkwol1zut = false) {
        $this->_showGridlines = $Vqujkwol1zut;
        return $this;
    }

    
    public function getPrintGridlines() {
        return $this->_printGridlines;
    }

    
    public function setPrintGridlines($Vqujkwol1zut = false) {
        $this->_printGridlines = $Vqujkwol1zut;
        return $this;
    }

    
    public function getShowRowColHeaders() {
        return $this->_showRowColHeaders;
    }

    
    public function setShowRowColHeaders($Vqujkwol1zut = false) {
        $this->_showRowColHeaders = $Vqujkwol1zut;
        return $this;
    }

    
    public function getShowSummaryBelow() {
        return $this->_showSummaryBelow;
    }

    
    public function setShowSummaryBelow($Vqujkwol1zut = true) {
        $this->_showSummaryBelow = $Vqujkwol1zut;
        return $this;
    }

    
    public function getShowSummaryRight() {
        return $this->_showSummaryRight;
    }

    
    public function setShowSummaryRight($Vqujkwol1zut = true) {
        $this->_showSummaryRight = $Vqujkwol1zut;
        return $this;
    }

    
    public function getComments()
    {
        return $this->_comments;
    }

    
    public function setComments($Vqujkwol1zut = array())
    {
        $this->_comments = $Vqujkwol1zut;

        return $this;
    }

    
    public function getComment($Vz4kpb5uwvkj = 'A1')
    {
        
        $Vz4kpb5uwvkj = strtoupper($Vz4kpb5uwvkj);

        if (strpos($Vz4kpb5uwvkj,':') !== false || strpos($Vz4kpb5uwvkj,',') !== false) {
            throw new PHPExcel_Exception('Cell coordinate string can not be a range of cells.');
        } else if (strpos($Vz4kpb5uwvkj,'$') !== false) {
            throw new PHPExcel_Exception('Cell coordinate string must not be absolute.');
        } else if ($Vz4kpb5uwvkj == '') {
            throw new PHPExcel_Exception('Cell coordinate can not be zero-length string.');
        } else {
            
            
            if (isset($this->_comments[$Vz4kpb5uwvkj])) {
                return $this->_comments[$Vz4kpb5uwvkj];
            } else {
                $Vdsu4lkhq3cg = new PHPExcel_Comment();
                $this->_comments[$Vz4kpb5uwvkj] = $Vdsu4lkhq3cg;
                return $Vdsu4lkhq3cg;
            }
        }
    }

    
    public function getCommentByColumnAndRow($Voblvrlehdwb = 0, $Vsb2id3rjpxz = 1)
    {
        return $this->getComment(PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb) . $Vsb2id3rjpxz);
    }

    
    public function getSelectedCell()
    {
        return $this->getSelectedCells();
    }

    
    public function getActiveCell()
    {
        return $this->_activeCell;
    }

    
    public function getSelectedCells()
    {
        return $this->_selectedCells;
    }

    
    public function setSelectedCell($Vgefg31xuj0v = 'A1')
    {
        return $this->setSelectedCells($Vgefg31xuj0v);
    }

    
    public function setSelectedCells($Vgefg31xuj0v = 'A1')
    {
        
        $Vgefg31xuj0v = strtoupper($Vgefg31xuj0v);

        
        $Vgefg31xuj0v = preg_replace('/^([A-Z]+)$/', '${1}:${1}', $Vgefg31xuj0v);

        
        $Vgefg31xuj0v = preg_replace('/^([0-9]+)$/', '${1}:${1}', $Vgefg31xuj0v);

        
        $Vgefg31xuj0v = preg_replace('/^([A-Z]+):([A-Z]+)$/', '${1}1:${2}1048576', $Vgefg31xuj0v);

        
        $Vgefg31xuj0v = preg_replace('/^([0-9]+):([0-9]+)$/', 'A${1}:XFD${2}', $Vgefg31xuj0v);

        if (strpos($Vgefg31xuj0v,':') !== false || strpos($Vgefg31xuj0v,',') !== false) {
            list($Vh2exnktxagp, ) = PHPExcel_Cell::splitRange($Vgefg31xuj0v);
            $this->_activeCell = $Vh2exnktxagp[0];
        } else {
            $this->_activeCell = $Vgefg31xuj0v;
        }
        $this->_selectedCells = $Vgefg31xuj0v;
        return $this;
    }

    
    public function setSelectedCellByColumnAndRow($Voblvrlehdwb = 0, $Vsb2id3rjpxz = 1)
    {
        return $this->setSelectedCells(PHPExcel_Cell::stringFromColumnIndex($Voblvrlehdwb) . $Vsb2id3rjpxz);
    }

    
    public function getRightToLeft() {
        return $this->_rightToLeft;
    }

    
    public function setRightToLeft($Vp4xjtpabm0l = false) {
        $this->_rightToLeft = $Vp4xjtpabm0l;
        return $this;
    }

    
    public function fromArray($Vdlog2ws2ka3 = null, $Vvxvopbmlet1 = null, $Vafq11amiamr = 'A1', $Vl32gkozykem = false) {
        if (is_array($Vdlog2ws2ka3)) {
            
            if (!is_array(end($Vdlog2ws2ka3))) {
                $Vdlog2ws2ka3 = array($Vdlog2ws2ka3);
            }

            
            list ($V4srf4uueq2t, $V5jh0lozltx0) = PHPExcel_Cell::coordinateFromString($Vafq11amiamr);

            
            foreach ($Vdlog2ws2ka3 as $VexbtekafkvlData) {
                $Vtl0rh0oxqyi = $V4srf4uueq2t;
                foreach($VexbtekafkvlData as $Vblc1ueqvbtiValue) {
                    if ($Vl32gkozykem) {
                        if ($Vblc1ueqvbtiValue !== $Vvxvopbmlet1) {
                            
                            $this->getCell($Vtl0rh0oxqyi . $V5jh0lozltx0)->setValue($Vblc1ueqvbtiValue);
                        }
                    } else {
                        if ($Vblc1ueqvbtiValue != $Vvxvopbmlet1) {
                            
                            $this->getCell($Vtl0rh0oxqyi . $V5jh0lozltx0)->setValue($Vblc1ueqvbtiValue);
                        }
                    }
                    ++$Vtl0rh0oxqyi;
                }
                ++$V5jh0lozltx0;
            }
        } else {
            throw new PHPExcel_Exception("Parameter \$Vdlog2ws2ka3 should be an array.");
        }
        return $this;
    }

    
	public function rangeToArray($Vem4atrpzxcs = 'A1', $Vvxvopbmlet1 = null, $Vybufv20m5l3 = true, $Vpz1u5z5lsve = true, $Vrchv1kygaqpRef = false) {
        
        $Vbco3t3kne3m = array();
        
        list($Vfo4g014tbnf, $Vaoibuxbewds) = PHPExcel_Cell::rangeBoundaries($Vem4atrpzxcs);
        $Vvikw0ok0wi3 = PHPExcel_Cell::stringFromColumnIndex($Vfo4g014tbnf[0] -1);
        $Vr5dxm1h4xmc = $Vfo4g014tbnf[1];
        $Vg0k4u2of5zi = PHPExcel_Cell::stringFromColumnIndex($Vaoibuxbewds[0] -1);
        $V3ywprpz53l2 = $Vaoibuxbewds[1];

        $Vg0k4u2of5zi++;
        
        $Vws44nszhvgo = -1;
        for ($Vexbtekafkvl = $Vr5dxm1h4xmc; $Vexbtekafkvl <= $V3ywprpz53l2; ++$Vexbtekafkvl) {
            $Vws44nszhvgoRef = ($Vrchv1kygaqpRef) ? $Vexbtekafkvl : ++$Vws44nszhvgo;
            $V4y0urwpnd3j = -1;
            
            for ($Vswazvoa3xts = $Vvikw0ok0wi3; $Vswazvoa3xts != $Vg0k4u2of5zi; ++$Vswazvoa3xts) {
                $V4y0urwpnd3jRef = ($Vrchv1kygaqpRef) ? $Vswazvoa3xts : ++$V4y0urwpnd3j;
                
                
                if ($this->_cellCollection->isDataSet($Vswazvoa3xts.$Vexbtekafkvl)) {
                    
                    $Vblc1ueqvbti = $this->_cellCollection->getCacheData($Vswazvoa3xts.$Vexbtekafkvl);
                    if ($Vblc1ueqvbti->getValue() !== null) {
                        if ($Vblc1ueqvbti->getValue() instanceof PHPExcel_RichText) {
                            $Vbco3t3kne3m[$Vws44nszhvgoRef][$V4y0urwpnd3jRef] = $Vblc1ueqvbti->getValue()->getPlainText();
                        } else {
                            if ($Vybufv20m5l3) {
                                $Vbco3t3kne3m[$Vws44nszhvgoRef][$V4y0urwpnd3jRef] = $Vblc1ueqvbti->getCalculatedValue();
                            } else {
                                $Vbco3t3kne3m[$Vws44nszhvgoRef][$V4y0urwpnd3jRef] = $Vblc1ueqvbti->getValue();
                            }
                        }

                        if ($Vpz1u5z5lsve) {
                            $Vdtcpflt5bhp = $this->_parent->getCellXfByIndex($Vblc1ueqvbti->getXfIndex());
                            $Vbco3t3kne3m[$Vws44nszhvgoRef][$V4y0urwpnd3jRef] = PHPExcel_Style_NumberFormat::toFormattedString(
                            	$Vbco3t3kne3m[$Vws44nszhvgoRef][$V4y0urwpnd3jRef],
								($Vdtcpflt5bhp && $Vdtcpflt5bhp->getNumberFormat()) ?
									$Vdtcpflt5bhp->getNumberFormat()->getFormatCode() :
									PHPExcel_Style_NumberFormat::FORMAT_GENERAL
                            );
                        }
                    } else {
                        
                        $Vbco3t3kne3m[$Vws44nszhvgoRef][$V4y0urwpnd3jRef] = $Vvxvopbmlet1;
                    }
                } else {
                    
                    $Vbco3t3kne3m[$Vws44nszhvgoRef][$V4y0urwpnd3jRef] = $Vvxvopbmlet1;
                }
            }
        }

        
        return $Vbco3t3kne3m;
    }


    
	public function namedRangeToArray($Vhts20fapkva = '', $Vvxvopbmlet1 = null, $Vybufv20m5l3 = true, $Vpz1u5z5lsve = true, $Vrchv1kygaqpRef = false) {
        $Vdqyivdsly3d = PHPExcel_NamedRange::resolveRange($Vhts20fapkva, $this);
        if ($Vdqyivdsly3d !== NULL) {
            $V1rghupwmchv = $Vdqyivdsly3d->getWorksheet();
            $Vp0mtfiyrfm5Range = $Vdqyivdsly3d->getRange();

			return $V1rghupwmchv->rangeToArray(	$Vp0mtfiyrfm5Range,
												$Vvxvopbmlet1, $Vybufv20m5l3, $Vpz1u5z5lsve, $Vrchv1kygaqpRef);
        }

        throw new PHPExcel_Exception('Named Range '.$Vhts20fapkva.' does not exist.');
    }


    
	public function toArray($Vvxvopbmlet1 = null, $Vybufv20m5l3 = true, $Vpz1u5z5lsve = true, $Vrchv1kygaqpRef = false) {
        
        $this->garbageCollect();

        
        $Vg0k4u2of5zi = $this->getHighestColumn();
        $V3ywprpz53l2 = $this->getHighestRow();
        
		return $this->rangeToArray(	'A1:'.$Vg0k4u2of5zi.$V3ywprpz53l2,
									$Vvxvopbmlet1, $Vybufv20m5l3, $Vpz1u5z5lsve, $Vrchv1kygaqpRef);
    }

    
	public function getRowIterator($V5jh0lozltx0 = 1) {
        return new PHPExcel_Worksheet_RowIterator($this,$V5jh0lozltx0);
    }

    
	public function garbageCollect() {
        
        $this->_cellCollection->getCacheData('A1');
        








        
        $Vswazvoa3xtsRow = $this->_cellCollection->getHighestRowAndColumn();
        $Vrzlowqumaxt = $Vswazvoa3xtsRow['row'];
        $Vlb0wwrz5dnx = PHPExcel_Cell::columnIndexFromString($Vswazvoa3xtsRow['column']);

        
        foreach ($this->_columnDimensions as $Vppcarr30ce5) {
            $Vlb0wwrz5dnx = max($Vlb0wwrz5dnx,PHPExcel_Cell::columnIndexFromString($Vppcarr30ce5->getColumnIndex()));
        }

        
        foreach ($this->_rowDimensions as $Vppcarr30ce5) {
            $Vrzlowqumaxt = max($Vrzlowqumaxt,$Vppcarr30ce5->getRowIndex());
        }

        
        if ($Vlb0wwrz5dnx < 0) {
            $this->_cachedHighestColumn = 'A';
        } else {
            $this->_cachedHighestColumn = PHPExcel_Cell::stringFromColumnIndex(--$Vlb0wwrz5dnx);
        }
        $this->_cachedHighestRow = $Vrzlowqumaxt;

        
        return $this;
    }

    
	public function getHashCode() {
        if ($this->_dirty) {
            $this->_hash = md5( $this->_title .
                                $this->_autoFilter .
                                ($this->_protection->isProtectionEnabled() ? 't' : 'f') .
                                __CLASS__
                              );
            $this->_dirty = false;
        }
        return $this->_hash;
    }

    
	public static function extractSheetTitle($Vem4atrpzxcs, $Vws44nszhvgoeturnRange = false) {
        
        if (($Vtqbflzoy0ec = strpos($Vem4atrpzxcs, '!')) === false) {
            return '';
        }

        if ($Vws44nszhvgoeturnRange) {
            return array( trim(substr($Vem4atrpzxcs, 0, $Vtqbflzoy0ec),"'"),
                          substr($Vem4atrpzxcs, $Vtqbflzoy0ec + 1)
                        );
        }

        return substr($Vem4atrpzxcs, $Vtqbflzoy0ec + 1);
    }

    
    public function getHyperlink($Vz4kpb5uwvkj = 'A1')
    {
        
        if (isset($this->_hyperlinkCollection[$Vz4kpb5uwvkj])) {
            return $this->_hyperlinkCollection[$Vz4kpb5uwvkj];
        }

        
        $this->_hyperlinkCollection[$Vz4kpb5uwvkj] = new PHPExcel_Cell_Hyperlink();
        return $this->_hyperlinkCollection[$Vz4kpb5uwvkj];
    }

    
    public function setHyperlink($Vz4kpb5uwvkj = 'A1', PHPExcel_Cell_Hyperlink $Vxv45iu4hchs = null)
    {
        if ($Vxv45iu4hchs === null) {
            unset($this->_hyperlinkCollection[$Vz4kpb5uwvkj]);
        } else {
            $this->_hyperlinkCollection[$Vz4kpb5uwvkj] = $Vxv45iu4hchs;
        }
        return $this;
    }

    
    public function hyperlinkExists($Vgefg31xuj0v = 'A1')
    {
        return isset($this->_hyperlinkCollection[$Vgefg31xuj0v]);
    }

    
    public function getHyperlinkCollection()
    {
        return $this->_hyperlinkCollection;
    }

    
    public function getDataValidation($Vz4kpb5uwvkj = 'A1')
    {
        
        if (isset($this->_dataValidationCollection[$Vz4kpb5uwvkj])) {
            return $this->_dataValidationCollection[$Vz4kpb5uwvkj];
        }

        
        $this->_dataValidationCollection[$Vz4kpb5uwvkj] = new PHPExcel_Cell_DataValidation();
        return $this->_dataValidationCollection[$Vz4kpb5uwvkj];
    }

    
    public function setDataValidation($Vz4kpb5uwvkj = 'A1', PHPExcel_Cell_DataValidation $Vdqrd32akkpj = null)
    {
        if ($Vdqrd32akkpj === null) {
            unset($this->_dataValidationCollection[$Vz4kpb5uwvkj]);
        } else {
            $this->_dataValidationCollection[$Vz4kpb5uwvkj] = $Vdqrd32akkpj;
        }
        return $this;
    }

    
    public function dataValidationExists($Vgefg31xuj0v = 'A1')
    {
        return isset($this->_dataValidationCollection[$Vgefg31xuj0v]);
    }

    
    public function getDataValidationCollection()
    {
        return $this->_dataValidationCollection;
    }

    
	public function shrinkRangeToFit($Vws44nszhvgoange) {
        $Vg0k4u2of5zi = $this->getHighestColumn();
        $V3ywprpz53l2 = $this->getHighestRow();
        $Vg0k4u2of5zi = PHPExcel_Cell::columnIndexFromString($Vg0k4u2of5zi);

        $Vws44nszhvgoangeBlocks = explode(' ',$Vws44nszhvgoange);
        foreach ($Vws44nszhvgoangeBlocks as &$Vws44nszhvgoangeSet) {
            $Vws44nszhvgoangeBoundaries = PHPExcel_Cell::getRangeBoundaries($Vws44nszhvgoangeSet);

            if (PHPExcel_Cell::columnIndexFromString($Vws44nszhvgoangeBoundaries[0][0]) > $Vg0k4u2of5zi) { $Vws44nszhvgoangeBoundaries[0][0] = PHPExcel_Cell::stringFromColumnIndex($Vg0k4u2of5zi); }
            if ($Vws44nszhvgoangeBoundaries[0][1] > $V3ywprpz53l2) { $Vws44nszhvgoangeBoundaries[0][1] = $V3ywprpz53l2; }
            if (PHPExcel_Cell::columnIndexFromString($Vws44nszhvgoangeBoundaries[1][0]) > $Vg0k4u2of5zi) { $Vws44nszhvgoangeBoundaries[1][0] = PHPExcel_Cell::stringFromColumnIndex($Vg0k4u2of5zi); }
            if ($Vws44nszhvgoangeBoundaries[1][1] > $V3ywprpz53l2) { $Vws44nszhvgoangeBoundaries[1][1] = $V3ywprpz53l2; }
            $Vws44nszhvgoangeSet = $Vws44nszhvgoangeBoundaries[0][0].$Vws44nszhvgoangeBoundaries[0][1].':'.$Vws44nszhvgoangeBoundaries[1][0].$Vws44nszhvgoangeBoundaries[1][1];
        }
        unset($Vws44nszhvgoangeSet);
        $Vo3xldhsd2us = implode(' ',$Vws44nszhvgoangeBlocks);

        return $Vo3xldhsd2us;
    }

    
    public function getTabColor()
    {
        if ($this->_tabColor === NULL)
            $this->_tabColor = new PHPExcel_Style_Color();

        return $this->_tabColor;
    }

    
    public function resetTabColor()
    {
        $this->_tabColor = null;
        unset($this->_tabColor);

        return $this;
    }

    
    public function isTabColorSet()
    {
        return ($this->_tabColor !== NULL);
    }

    
	public function copy() {
        $V4y0urwpnd3jopied = clone $this;

        return $V4y0urwpnd3jopied;
    }

    
	public function __clone() {
        foreach ($this as $Vseq1edikdvg => $Vwk2nao2d33x) {
            if ($Vseq1edikdvg == '_parent') {
                continue;
            }

            if (is_object($Vwk2nao2d33x) || (is_array($Vwk2nao2d33x))) {
                if ($Vseq1edikdvg == '_cellCollection') {
                    $Vo1xrt0qyftz = clone $this->_cellCollection;
                    $Vo1xrt0qyftz->copyCellCollection($this);
                    $this->_cellCollection = $Vo1xrt0qyftz;
                } elseif ($Vseq1edikdvg == '_drawingCollection') {
                    $Vo1xrt0qyftz = clone $this->_drawingCollection;
                    $this->_drawingCollection = $Vo1xrt0qyftz;
                } elseif (($Vseq1edikdvg == '_autoFilter') && ($this->_autoFilter instanceof PHPExcel_Worksheet_AutoFilter)) {
                    $Vhd0pihvjtde = clone $this->_autoFilter;
                    $this->_autoFilter = $Vhd0pihvjtde;
                    $this->_autoFilter->setParent($this);
                } else {
                    $this->{$Vseq1edikdvg} = unserialize(serialize($Vwk2nao2d33x));
                }
            }
        }
    }

	public function setCodeName($Vqujkwol1zut=null){
		
		if ($this->getCodeName() == $Vqujkwol1zut) {
			return $this;
		}
		$Vqujkwol1zut = str_replace(' ', '_', $Vqujkwol1zut);
		
        
		self::_checkSheetCodeName($Vqujkwol1zut);

		
		
        if ($this->getParent()) {
			
			if ($this->getParent()->sheetCodeNameExists($Vqujkwol1zut)) {
				

				if (PHPExcel_Shared_String::CountCharacters($Vqujkwol1zut) > 29) {
					$Vqujkwol1zut = PHPExcel_Shared_String::Substring($Vqujkwol1zut,0,29);
				}
				$Vfhiq1lhsoja = 1;
				while ($this->getParent()->sheetCodeNameExists($Vqujkwol1zut . '_' . $Vfhiq1lhsoja)) {
					++$Vfhiq1lhsoja;
					if ($Vfhiq1lhsoja == 10) {
						if (PHPExcel_Shared_String::CountCharacters($Vqujkwol1zut) > 28) {
							$Vqujkwol1zut = PHPExcel_Shared_String::Substring($Vqujkwol1zut,0,28);
						}
					} elseif ($Vfhiq1lhsoja == 100) {
						if (PHPExcel_Shared_String::CountCharacters($Vqujkwol1zut) > 27) {
							$Vqujkwol1zut = PHPExcel_Shared_String::Substring($Vqujkwol1zut,0,27);
						}
					}
				}

				$Vqujkwol1zut = $Vqujkwol1zut . '_' . $Vfhiq1lhsoja;
				
				
			}
		}

		$this->_codeName=$Vqujkwol1zut;
		return $this;
	}
	
	public function getCodeName(){
		return $this->_codeName;
	}
	
	public function hasCodeName(){
		return !(is_null($this->_codeName));
	}
}
