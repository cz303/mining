<?php




class PHPExcel_Writer_Excel2007 extends PHPExcel_Writer_Abstract implements PHPExcel_Writer_IWriter
{
	
	protected $Vy3i5f1namwy = FALSE;

	
	private $Vfq2hqnh1q25 = false;

	
	private $V3e00pmcah0o	= array();

	
	private $Vt1vxk0the5n;

	
	private $Vycip5z4jfjw	= array();

	
	private $Ve0ylz0opsri;

	
	private $Vql54bvzgqhu;

	
	private $Vubry3bsawpe;

	
	private $V5dodwx313up;

	
	private $Vvkc2w5lcxw4 ;

	
	private $Vwehy0fgrhgd;

	
	private $Vvbtcbxiudje;

    
    public function __construct(PHPExcel $V2ch40cq1nbr = null)
    {
    	
		$this->setPHPExcel($V2ch40cq1nbr);

    	$Vwcwglu0wbgj = array(	'stringtable'	=> 'PHPExcel_Writer_Excel2007_StringTable',
									'contenttypes'	=> 'PHPExcel_Writer_Excel2007_ContentTypes',
									'docprops' 		=> 'PHPExcel_Writer_Excel2007_DocProps',
									'rels'			=> 'PHPExcel_Writer_Excel2007_Rels',
									'theme' 		=> 'PHPExcel_Writer_Excel2007_Theme',
									'style' 		=> 'PHPExcel_Writer_Excel2007_Style',
									'workbook' 		=> 'PHPExcel_Writer_Excel2007_Workbook',
									'worksheet' 	=> 'PHPExcel_Writer_Excel2007_Worksheet',
									'drawing' 		=> 'PHPExcel_Writer_Excel2007_Drawing',
									'comments' 		=> 'PHPExcel_Writer_Excel2007_Comments',
									'chart'			=> 'PHPExcel_Writer_Excel2007_Chart',
									'relsvba'		=> 'PHPExcel_Writer_Excel2007_RelsVBA',
									'relsribbonobjects' => 'PHPExcel_Writer_Excel2007_RelsRibbon'
								 );

    	
		
		foreach ($Vwcwglu0wbgj as $V3pinfvte0v0 => $Vtwwmjiiu40i) {
			$this->_writerParts[$V3pinfvte0v0] = new $Vtwwmjiiu40i($this);
		}

    	$Vsikc25igwsq = array( '_stylesConditionalHashTable',	'_fillHashTable',		'_fontHashTable',
								  '_bordersHashTable',				'_numFmtHashTable',		'_drawingHashTable',
                                  '_styleHashTable'
							    );

		
		foreach ($Vsikc25igwsq as $Vxttxnuhajau) {
			$this->$Vxttxnuhajau 	= new PHPExcel_HashTable();
		}
    }

	
	public function getWriterPart($V2ls4irtebsu = '') {
		if ($V2ls4irtebsu != '' && isset($this->_writerParts[strtolower($V2ls4irtebsu)])) {
			return $this->_writerParts[strtolower($V2ls4irtebsu)];
		} else {
			return null;
		}
	}

	
	public function save($V1tltbb5c5oc = null)
	{
		if ($this->_spreadSheet !== NULL) {
			
			$this->_spreadSheet->garbageCollect();

			
			$Vtlewjrx2nvb = $V1tltbb5c5oc;
			if (strtolower($V1tltbb5c5oc) == 'php://output' || strtolower($V1tltbb5c5oc) == 'php://stdout') {
				$V1tltbb5c5oc = @tempnam(PHPExcel_Shared_File::sys_get_temp_dir(), 'phpxltmp');
				if ($V1tltbb5c5oc == '') {
					$V1tltbb5c5oc = $Vtlewjrx2nvb;
				}
			}

			$Vyg0k2nrdluk = PHPExcel_Calculation::getInstance($this->_spreadSheet)->getDebugLog()->getWriteDebugLog();
			PHPExcel_Calculation::getInstance($this->_spreadSheet)->getDebugLog()->setWriteDebugLog(FALSE);
			$Veitduviztjc = PHPExcel_Calculation_Functions::getReturnDateType();
			PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);

			
			$this->_stringTable = array();
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->_spreadSheet->getSheetCount(); ++$Vfhiq1lhsoja) {
				$this->_stringTable = $this->getWriterPart('StringTable')->createStringTable($this->_spreadSheet->getSheet($Vfhiq1lhsoja), $this->_stringTable);
			}

			
			$this->_styleHashTable->addFromSource( 	            $this->getWriterPart('Style')->allStyles($this->_spreadSheet) 			);
			$this->_stylesConditionalHashTable->addFromSource( 	$this->getWriterPart('Style')->allConditionalStyles($this->_spreadSheet) 			);
			$this->_fillHashTable->addFromSource( 				$this->getWriterPart('Style')->allFills($this->_spreadSheet) 			);
			$this->_fontHashTable->addFromSource( 				$this->getWriterPart('Style')->allFonts($this->_spreadSheet) 			);
			$this->_bordersHashTable->addFromSource( 			$this->getWriterPart('Style')->allBorders($this->_spreadSheet) 			);
			$this->_numFmtHashTable->addFromSource( 			$this->getWriterPart('Style')->allNumberFormats($this->_spreadSheet) 	);

			
			$this->_drawingHashTable->addFromSource( 			$this->getWriterPart('Drawing')->allDrawings($this->_spreadSheet) 		);

			
			$Vvwuzecprr3z = PHPExcel_Settings::getZipClass();
			$Vd4u30euqerd = new $Vvwuzecprr3z();

			
			
			$Vde0nm2gk2vi = new ReflectionObject($Vd4u30euqerd);
			$V2usojfl3yhf = $Vde0nm2gk2vi->getConstant('OVERWRITE');
			$V3gktrh5otfp = $Vde0nm2gk2vi->getConstant('CREATE');

			if (file_exists($V1tltbb5c5oc)) {
				unlink($V1tltbb5c5oc);
			}
			
			if ($Vd4u30euqerd->open($V1tltbb5c5oc, $V2usojfl3yhf) !== true) {
				if ($Vd4u30euqerd->open($V1tltbb5c5oc, $V3gktrh5otfp) !== true) {
					throw new PHPExcel_Writer_Exception("Could not open " . $V1tltbb5c5oc . " for writing.");
				}
			}

			
			$Vd4u30euqerd->addFromString('[Content_Types].xml', 			$this->getWriterPart('ContentTypes')->writeContentTypes($this->_spreadSheet, $this->_includeCharts));

			
			if($this->_spreadSheet->hasMacros()){
				$Vrqpasbohszj=$this->_spreadSheet->getMacrosCode();
				if(!is_null($Vrqpasbohszj)){
					$Vd4u30euqerd->addFromString('xl/vbaProject.bin', $Vrqpasbohszj);
					if($this->_spreadSheet->hasMacrosCertificate()){
						
						$Vd4u30euqerd->addFromString('xl/vbaProjectSignature.bin', $this->_spreadSheet->getMacrosCertificate());
						$Vd4u30euqerd->addFromString('xl/_rels/vbaProject.bin.rels',
							$this->getWriterPart('RelsVBA')->writeVBARelationships($this->_spreadSheet));
					}
				}
			}
			
			if($this->_spreadSheet->hasRibbon()){
				$Vhcnhf3zte2d=$this->_spreadSheet->getRibbonXMLData('target');
				$Vd4u30euqerd->addFromString($Vhcnhf3zte2d, $this->_spreadSheet->getRibbonXMLData('data'));
				if($this->_spreadSheet->hasRibbonBinObjects()){
					$V1sls5zj2otg=dirname($Vhcnhf3zte2d).'/';
					$Vo1rvzkqmtmg=$this->_spreadSheet->getRibbonBinObjects('data');
					foreach($Vo1rvzkqmtmg as $V3iw131umh1c=>$Vxcylbrsnc13){
						$Vd4u30euqerd->addFromString($V1sls5zj2otg.$V3iw131umh1c, $Vxcylbrsnc13);
					}
					
					$Vd4u30euqerd->addFromString($V1sls5zj2otg.'_rels/'.basename($Vhcnhf3zte2d).'.rels',
						$this->getWriterPart('RelsRibbonObjects')->writeRibbonRelationships($this->_spreadSheet));
				}
			}
			
			
			$Vd4u30euqerd->addFromString('_rels/.rels', 					$this->getWriterPart('Rels')->writeRelationships($this->_spreadSheet));
			$Vd4u30euqerd->addFromString('xl/_rels/workbook.xml.rels', 	$this->getWriterPart('Rels')->writeWorkbookRelationships($this->_spreadSheet));

			
			$Vd4u30euqerd->addFromString('docProps/app.xml', 				$this->getWriterPart('DocProps')->writeDocPropsApp($this->_spreadSheet));
			$Vd4u30euqerd->addFromString('docProps/core.xml', 			$this->getWriterPart('DocProps')->writeDocPropsCore($this->_spreadSheet));
			$Vpvk4pjbhfju = $this->getWriterPart('DocProps')->writeDocPropsCustom($this->_spreadSheet);
			if ($Vpvk4pjbhfju !== NULL) {
				$Vd4u30euqerd->addFromString('docProps/custom.xml', 		$Vpvk4pjbhfju);
			}

			
			$Vd4u30euqerd->addFromString('xl/theme/theme1.xml', 			$this->getWriterPart('Theme')->writeTheme($this->_spreadSheet));

			
			$Vd4u30euqerd->addFromString('xl/sharedStrings.xml', 			$this->getWriterPart('StringTable')->writeStringTable($this->_stringTable));

			
			$Vd4u30euqerd->addFromString('xl/styles.xml', 				$this->getWriterPart('Style')->writeStyles($this->_spreadSheet));

			
			$Vd4u30euqerd->addFromString('xl/workbook.xml', 				$this->getWriterPart('Workbook')->writeWorkbook($this->_spreadSheet, $this->_preCalculateFormulas));

			$Vorscezbrib2 = 0;
			
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->_spreadSheet->getSheetCount(); ++$Vfhiq1lhsoja) {
				$Vd4u30euqerd->addFromString('xl/worksheets/sheet' . ($Vfhiq1lhsoja + 1) . '.xml', $this->getWriterPart('Worksheet')->writeWorksheet($this->_spreadSheet->getSheet($Vfhiq1lhsoja), $this->_stringTable, $this->_includeCharts));
				if ($this->_includeCharts) {
					$V5bpblo0p4em = $this->_spreadSheet->getSheet($Vfhiq1lhsoja)->getChartCollection();
					if (count($V5bpblo0p4em) > 0) {
						foreach($V5bpblo0p4em as $Vcfg4pbgiwen) {
							$Vd4u30euqerd->addFromString('xl/charts/chart' . ($Vorscezbrib2 + 1) . '.xml', $this->getWriterPart('Chart')->writeChart($Vcfg4pbgiwen));
							$Vorscezbrib2++;
						}
					}
				}
			}

			$Vcfg4pbgiwenRef1 = $Vcfg4pbgiwenRef2 = 0;
			
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->_spreadSheet->getSheetCount(); ++$Vfhiq1lhsoja) {

				
				$Vd4u30euqerd->addFromString('xl/worksheets/_rels/sheet' . ($Vfhiq1lhsoja + 1) . '.xml.rels', 	$this->getWriterPart('Rels')->writeWorksheetRelationships($this->_spreadSheet->getSheet($Vfhiq1lhsoja), ($Vfhiq1lhsoja + 1), $this->_includeCharts));

				$Vbeblpikromp = $this->_spreadSheet->getSheet($Vfhiq1lhsoja)->getDrawingCollection();
				$V2hluo1wyq0f = count($Vbeblpikromp);
				if ($this->_includeCharts) {
					$Vorscezbrib2 = $this->_spreadSheet->getSheet($Vfhiq1lhsoja)->getChartCount();
				}

				
				if (($V2hluo1wyq0f > 0) || ($Vorscezbrib2 > 0)) {
					
					$Vd4u30euqerd->addFromString('xl/drawings/_rels/drawing' . ($Vfhiq1lhsoja + 1) . '.xml.rels', $this->getWriterPart('Rels')->writeDrawingRelationships($this->_spreadSheet->getSheet($Vfhiq1lhsoja),$Vcfg4pbgiwenRef1, $this->_includeCharts));

					
					$Vd4u30euqerd->addFromString('xl/drawings/drawing' . ($Vfhiq1lhsoja + 1) . '.xml', $this->getWriterPart('Drawing')->writeDrawings($this->_spreadSheet->getSheet($Vfhiq1lhsoja),$Vcfg4pbgiwenRef2,$this->_includeCharts));
				}

				
				if (count($this->_spreadSheet->getSheet($Vfhiq1lhsoja)->getComments()) > 0) {
					
					$Vd4u30euqerd->addFromString('xl/drawings/vmlDrawing' . ($Vfhiq1lhsoja + 1) . '.vml', $this->getWriterPart('Comments')->writeVMLComments($this->_spreadSheet->getSheet($Vfhiq1lhsoja)));

					
					$Vd4u30euqerd->addFromString('xl/comments' . ($Vfhiq1lhsoja + 1) . '.xml', $this->getWriterPart('Comments')->writeComments($this->_spreadSheet->getSheet($Vfhiq1lhsoja)));
				}

				
				if (count($this->_spreadSheet->getSheet($Vfhiq1lhsoja)->getHeaderFooter()->getImages()) > 0) {
					
					$Vd4u30euqerd->addFromString('xl/drawings/vmlDrawingHF' . ($Vfhiq1lhsoja + 1) . '.vml', $this->getWriterPart('Drawing')->writeVMLHeaderFooterImages($this->_spreadSheet->getSheet($Vfhiq1lhsoja)));

					
					$Vd4u30euqerd->addFromString('xl/drawings/_rels/vmlDrawingHF' . ($Vfhiq1lhsoja + 1) . '.vml.rels', $this->getWriterPart('Rels')->writeHeaderFooterDrawingRelationships($this->_spreadSheet->getSheet($Vfhiq1lhsoja)));

					
					foreach ($this->_spreadSheet->getSheet($Vfhiq1lhsoja)->getHeaderFooter()->getImages() as $Vfhiq1lhsojamage) {
						$Vd4u30euqerd->addFromString('xl/media/' . $Vfhiq1lhsojamage->getIndexedFilename(), file_get_contents($Vfhiq1lhsojamage->getPath()));
					}
				}
			}

			
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $this->getDrawingHashTable()->count(); ++$Vfhiq1lhsoja) {
				if ($this->getDrawingHashTable()->getByIndex($Vfhiq1lhsoja) instanceof PHPExcel_Worksheet_Drawing) {
					$Vfhiq1lhsojamageContents = null;
					$Vfhiq1lhsojamagePath = $this->getDrawingHashTable()->getByIndex($Vfhiq1lhsoja)->getPath();
					if (strpos($Vfhiq1lhsojamagePath, 'zip://') !== false) {
						$Vfhiq1lhsojamagePath = substr($Vfhiq1lhsojamagePath, 6);
						$Vfhiq1lhsojamagePathSplitted = explode('#', $Vfhiq1lhsojamagePath);

						$Vfhiq1lhsojamageZip = new ZipArchive();
						$Vfhiq1lhsojamageZip->open($Vfhiq1lhsojamagePathSplitted[0]);
						$Vfhiq1lhsojamageContents = $Vfhiq1lhsojamageZip->getFromName($Vfhiq1lhsojamagePathSplitted[1]);
						$Vfhiq1lhsojamageZip->close();
						unset($Vfhiq1lhsojamageZip);
					} else {
						$Vfhiq1lhsojamageContents = file_get_contents($Vfhiq1lhsojamagePath);
					}

					$Vd4u30euqerd->addFromString('xl/media/' . str_replace(' ', '_', $this->getDrawingHashTable()->getByIndex($Vfhiq1lhsoja)->getIndexedFilename()), $Vfhiq1lhsojamageContents);
				} else if ($this->getDrawingHashTable()->getByIndex($Vfhiq1lhsoja) instanceof PHPExcel_Worksheet_MemoryDrawing) {
					ob_start();
					call_user_func(
						$this->getDrawingHashTable()->getByIndex($Vfhiq1lhsoja)->getRenderingFunction(),
						$this->getDrawingHashTable()->getByIndex($Vfhiq1lhsoja)->getImageResource()
					);
					$Vfhiq1lhsojamageContents = ob_get_contents();
					ob_end_clean();

					$Vd4u30euqerd->addFromString('xl/media/' . str_replace(' ', '_', $this->getDrawingHashTable()->getByIndex($Vfhiq1lhsoja)->getIndexedFilename()), $Vfhiq1lhsojamageContents);
				}
			}

			PHPExcel_Calculation_Functions::setReturnDateType($Veitduviztjc);
			PHPExcel_Calculation::getInstance($this->_spreadSheet)->getDebugLog()->setWriteDebugLog($Vyg0k2nrdluk);

			
			if ($Vd4u30euqerd->close() === false) {
				throw new PHPExcel_Writer_Exception("Could not close zip file $V1tltbb5c5oc.");
			}

			
			if ($Vtlewjrx2nvb != $V1tltbb5c5oc) {
				if (copy($V1tltbb5c5oc, $Vtlewjrx2nvb) === false) {
					throw new PHPExcel_Writer_Exception("Could not copy temporary zip file $V1tltbb5c5oc to $Vtlewjrx2nvb.");
				}
				@unlink($V1tltbb5c5oc);
			}
		} else {
			throw new PHPExcel_Writer_Exception("PHPExcel object unassigned.");
		}
	}

	
	public function getPHPExcel() {
		if ($this->_spreadSheet !== null) {
			return $this->_spreadSheet;
		} else {
			throw new PHPExcel_Writer_Exception("No PHPExcel assigned.");
		}
	}

	
	public function setPHPExcel(PHPExcel $V2ch40cq1nbr = null) {
		$this->_spreadSheet = $V2ch40cq1nbr;
		return $this;
	}

    
    public function getStringTable() {
    	return $this->_stringTable;
    }

    
    public function getStyleHashTable() {
    	return $this->_styleHashTable;
    }

    
    public function getStylesConditionalHashTable() {
    	return $this->_stylesConditionalHashTable;
    }

    
    public function getFillHashTable() {
    	return $this->_fillHashTable;
    }

    
    public function getFontHashTable() {
    	return $this->_fontHashTable;
    }

    
    public function getBordersHashTable() {
    	return $this->_bordersHashTable;
    }

    
    public function getNumFmtHashTable() {
    	return $this->_numFmtHashTable;
    }

    
    public function getDrawingHashTable() {
    	return $this->_drawingHashTable;
    }

    
    public function getOffice2003Compatibility() {
    	return $this->_office2003compatibility;
    }

    
    public function setOffice2003Compatibility($Vqujkwol1zut = false) {
    	$this->_office2003compatibility = $Vqujkwol1zut;
    	return $this;
    }

}
