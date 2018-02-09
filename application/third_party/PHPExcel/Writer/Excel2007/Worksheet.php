<?php




class PHPExcel_Writer_Excel2007_Worksheet extends PHPExcel_Writer_Excel2007_WriterPart
{
	
	public function writeWorksheet($Vci1dgyyzjho = null, $Vm2yvgr4j2qs = null, $Vbokbqv2yccd = FALSE)
	{
		if (!is_null($Vci1dgyyzjho)) {
			
			$Vze2ah1ycp2c = null;
			if ($this->getParentWriter()->getUseDiskCaching()) {
				$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
			} else {
				$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
			}

			
			$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

			
			$Vze2ah1ycp2c->startElement('worksheet');
			$Vze2ah1ycp2c->writeAttribute('xml:space', 'preserve');
			$Vze2ah1ycp2c->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');
			$Vze2ah1ycp2c->writeAttribute('xmlns:r', 'http://schemas.openxmlformats.org/officeDocument/2006/relationships');

				
				$this->_writeSheetPr($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writeDimension($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writeSheetViews($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writeSheetFormatPr($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writeCols($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writeSheetData($Vze2ah1ycp2c, $Vci1dgyyzjho, $Vm2yvgr4j2qs);

				
				$this->_writeSheetProtection($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writeProtectedRanges($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writeAutoFilter($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writeMergeCells($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writeConditionalFormatting($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writeDataValidations($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writeHyperlinks($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writePrintOptions($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writePageMargins($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writePageSetup($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writeHeaderFooter($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writeBreaks($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writeDrawings($Vze2ah1ycp2c, $Vci1dgyyzjho, $Vbokbqv2yccd);

				
				$this->_writeLegacyDrawing($Vze2ah1ycp2c, $Vci1dgyyzjho);

				
				$this->_writeLegacyDrawingHF($Vze2ah1ycp2c, $Vci1dgyyzjho);

			$Vze2ah1ycp2c->endElement();

			
			return $Vze2ah1ycp2c->getData();
		} else {
			throw new PHPExcel_Writer_Exception("Invalid PHPExcel_Worksheet object passed.");
		}
	}

	
	private function _writeSheetPr(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		
		$Vze2ah1ycp2c->startElement('sheetPr');
		
		if($Vci1dgyyzjho->getParent()->hasMacros()){
			if($Vci1dgyyzjho->hasCodeName()==false){
				$Vci1dgyyzjho->setCodeName($Vci1dgyyzjho->getTitle());
			}
			$Vze2ah1ycp2c->writeAttribute('codeName',		$Vci1dgyyzjho->getCodeName());
		}
			$Vf22y2ugjneq = $Vci1dgyyzjho->getAutoFilter()->getRange();
			if (!empty($Vf22y2ugjneq)) {
				$Vze2ah1ycp2c->writeAttribute('filterMode', 1);
				$Vci1dgyyzjho->getAutoFilter()->showHideRows();
			}

			
			if ($Vci1dgyyzjho->isTabColorSet()) {
				$Vze2ah1ycp2c->startElement('tabColor');
				$Vze2ah1ycp2c->writeAttribute('rgb',	$Vci1dgyyzjho->getTabColor()->getARGB());
				$Vze2ah1ycp2c->endElement();
			}

			
			$Vze2ah1ycp2c->startElement('outlinePr');
			$Vze2ah1ycp2c->writeAttribute('summaryBelow',	($Vci1dgyyzjho->getShowSummaryBelow() ? '1' : '0'));
			$Vze2ah1ycp2c->writeAttribute('summaryRight',	($Vci1dgyyzjho->getShowSummaryRight() ? '1' : '0'));
			$Vze2ah1ycp2c->endElement();

			
			if ($Vci1dgyyzjho->getPageSetup()->getFitToPage()) {
				$Vze2ah1ycp2c->startElement('pageSetUpPr');
				$Vze2ah1ycp2c->writeAttribute('fitToPage',	'1');
				$Vze2ah1ycp2c->endElement();
			}

		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeDimension(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		
		$Vze2ah1ycp2c->startElement('dimension');
		$Vze2ah1ycp2c->writeAttribute('ref', $Vci1dgyyzjho->calculateWorksheetDimension());
		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeSheetViews(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = NULL, PHPExcel_Worksheet $Vci1dgyyzjho = NULL)
	{
		
		$Vze2ah1ycp2c->startElement('sheetViews');

			
			$Vdjq0fzxekfo = false;
			if ($this->getParentWriter()->getPHPExcel()->getIndex($Vci1dgyyzjho) == $this->getParentWriter()->getPHPExcel()->getActiveSheetIndex())
				$Vdjq0fzxekfo = true;


			
			$Vze2ah1ycp2c->startElement('sheetView');
			$Vze2ah1ycp2c->writeAttribute('tabSelected',		$Vdjq0fzxekfo ? '1' : '0');
			$Vze2ah1ycp2c->writeAttribute('workbookViewId',	'0');

				
				if ($Vci1dgyyzjho->getSheetView()->getZoomScale() != 100) {
					$Vze2ah1ycp2c->writeAttribute('zoomScale',	$Vci1dgyyzjho->getSheetView()->getZoomScale());
				}
				if ($Vci1dgyyzjho->getSheetView()->getZoomScaleNormal() != 100) {
					$Vze2ah1ycp2c->writeAttribute('zoomScaleNormal',	$Vci1dgyyzjho->getSheetView()->getZoomScaleNormal());
				}

				
				if ($Vci1dgyyzjho->getSheetView()->getView() !== PHPExcel_Worksheet_SheetView::SHEETVIEW_NORMAL) {
					$Vze2ah1ycp2c->writeAttribute('view',	$Vci1dgyyzjho->getSheetView()->getView());
				}

				
				if ($Vci1dgyyzjho->getShowGridlines()) {
					$Vze2ah1ycp2c->writeAttribute('showGridLines',	'true');
				} else {
					$Vze2ah1ycp2c->writeAttribute('showGridLines',	'false');
				}

				
				if ($Vci1dgyyzjho->getShowRowColHeaders()) {
					$Vze2ah1ycp2c->writeAttribute('showRowColHeaders', '1');
				} else {
					$Vze2ah1ycp2c->writeAttribute('showRowColHeaders', '0');
				}

				
				if ($Vci1dgyyzjho->getRightToLeft()) {
					$Vze2ah1ycp2c->writeAttribute('rightToLeft',	'true');
				}

				$Vdh4a0ln2emx = $Vci1dgyyzjho->getActiveCell();

				
				$Vzshabnuqbcp = '';
				$Viokmthb1re0 = $Vci1dgyyzjho->getFreezePane();
				if (($Viokmthb1re0 != '') && ($Viokmthb1re0 != 'A1')) {
					$Vdh4a0ln2emx = $Viokmthb1re0;
					
					$Vxwquu220li2 = $Vhkg0wqek2um = 0;

					list($Vxwquu220li2, $Vhkg0wqek2um) = PHPExcel_Cell::coordinateFromString($Viokmthb1re0);
					$Vxwquu220li2 = PHPExcel_Cell::columnIndexFromString($Vxwquu220li2);

					
					$Vzshabnuqbcp = 'topRight';
					$Vze2ah1ycp2c->startElement('pane');
					if ($Vxwquu220li2 > 1)
						$Vze2ah1ycp2c->writeAttribute('xSplit',	$Vxwquu220li2 - 1);
					if ($Vhkg0wqek2um > 1) {
						$Vze2ah1ycp2c->writeAttribute('ySplit',	$Vhkg0wqek2um - 1);
						$Vzshabnuqbcp = ($Vxwquu220li2 > 1) ? 'bottomRight' : 'bottomLeft';
					}
					$Vze2ah1ycp2c->writeAttribute('topLeftCell',	$Viokmthb1re0);
					$Vze2ah1ycp2c->writeAttribute('activePane',	$Vzshabnuqbcp);
					$Vze2ah1ycp2c->writeAttribute('state',		'frozen');
					$Vze2ah1ycp2c->endElement();

					if (($Vxwquu220li2 > 1) && ($Vhkg0wqek2um > 1)) {
						
						$Vze2ah1ycp2c->startElement('selection');	$Vze2ah1ycp2c->writeAttribute('pane', 'topRight');		$Vze2ah1ycp2c->endElement();
						$Vze2ah1ycp2c->startElement('selection');	$Vze2ah1ycp2c->writeAttribute('pane', 'bottomLeft');	$Vze2ah1ycp2c->endElement();
					}
				}

				

					
					
					$Vze2ah1ycp2c->startElement('selection');
					if ($Vzshabnuqbcp != '') {
						$Vze2ah1ycp2c->writeAttribute('pane', $Vzshabnuqbcp);
					}
					$Vze2ah1ycp2c->writeAttribute('activeCell', $Vdh4a0ln2emx);
					$Vze2ah1ycp2c->writeAttribute('sqref', $Vdh4a0ln2emx);
					$Vze2ah1ycp2c->endElement();


			$Vze2ah1ycp2c->endElement();

		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeSheetFormatPr(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		
		$Vze2ah1ycp2c->startElement('sheetFormatPr');

			
			if ($Vci1dgyyzjho->getDefaultRowDimension()->getRowHeight() >= 0) {
				$Vze2ah1ycp2c->writeAttribute('customHeight',		'true');
				$Vze2ah1ycp2c->writeAttribute('defaultRowHeight',	PHPExcel_Shared_String::FormatNumber($Vci1dgyyzjho->getDefaultRowDimension()->getRowHeight()));
			} else {
				$Vze2ah1ycp2c->writeAttribute('defaultRowHeight', '14.4');
			}

			
			if ((string)$Vci1dgyyzjho->getDefaultRowDimension()->getZeroHeight()  == '1' ||
				strtolower((string)$Vci1dgyyzjho->getDefaultRowDimension()->getZeroHeight()) == 'true' ) {
				$Vze2ah1ycp2c->writeAttribute('zeroHeight', '1');
			}

			
			if ($Vci1dgyyzjho->getDefaultColumnDimension()->getWidth() >= 0) {
				$Vze2ah1ycp2c->writeAttribute('defaultColWidth', PHPExcel_Shared_String::FormatNumber($Vci1dgyyzjho->getDefaultColumnDimension()->getWidth()));
			}

			
			$Voa2ohcxl0w5 = 0;
			foreach ($Vci1dgyyzjho->getRowDimensions() as $Vppcarr30ce5) {
				if ($Vppcarr30ce5->getOutlineLevel() > $Voa2ohcxl0w5) {
					$Voa2ohcxl0w5 = $Vppcarr30ce5->getOutlineLevel();
				}
			}
			$Vze2ah1ycp2c->writeAttribute('outlineLevelRow',	(int)$Voa2ohcxl0w5);

			
			$Vn5k2liwrmw5 = 0;
			foreach ($Vci1dgyyzjho->getColumnDimensions() as $Vppcarr30ce5) {
				if ($Vppcarr30ce5->getOutlineLevel() > $Vn5k2liwrmw5) {
					$Vn5k2liwrmw5 = $Vppcarr30ce5->getOutlineLevel();
				}
			}
			$Vze2ah1ycp2c->writeAttribute('outlineLevelCol',	(int)$Vn5k2liwrmw5);

		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeCols(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		
		if (count($Vci1dgyyzjho->getColumnDimensions()) > 0)  {
			$Vze2ah1ycp2c->startElement('cols');

				$Vci1dgyyzjho->calculateColumnWidths();

				
				foreach ($Vci1dgyyzjho->getColumnDimensions() as $Vcmrdmsck1op) {
					
					$Vze2ah1ycp2c->startElement('col');
					$Vze2ah1ycp2c->writeAttribute('min',	PHPExcel_Cell::columnIndexFromString($Vcmrdmsck1op->getColumnIndex()));
					$Vze2ah1ycp2c->writeAttribute('max',	PHPExcel_Cell::columnIndexFromString($Vcmrdmsck1op->getColumnIndex()));

					if ($Vcmrdmsck1op->getWidth() < 0) {
						
						$Vze2ah1ycp2c->writeAttribute('width',		'9.10');
					} else {
						
						$Vze2ah1ycp2c->writeAttribute('width',		PHPExcel_Shared_String::FormatNumber($Vcmrdmsck1op->getWidth()));
					}

					
					if ($Vcmrdmsck1op->getVisible() == false) {
						$Vze2ah1ycp2c->writeAttribute('hidden',		'true');
					}

					
					if ($Vcmrdmsck1op->getAutoSize()) {
						$Vze2ah1ycp2c->writeAttribute('bestFit',		'true');
					}

					
					if ($Vcmrdmsck1op->getWidth() != $Vci1dgyyzjho->getDefaultColumnDimension()->getWidth()) {
						$Vze2ah1ycp2c->writeAttribute('customWidth',	'true');
					}

					
					if ($Vcmrdmsck1op->getCollapsed() == true) {
						$Vze2ah1ycp2c->writeAttribute('collapsed',		'true');
					}

					
					if ($Vcmrdmsck1op->getOutlineLevel() > 0) {
						$Vze2ah1ycp2c->writeAttribute('outlineLevel',	$Vcmrdmsck1op->getOutlineLevel());
					}

					
					$Vze2ah1ycp2c->writeAttribute('style', $Vcmrdmsck1op->getXfIndex());

					$Vze2ah1ycp2c->endElement();
				}

			$Vze2ah1ycp2c->endElement();
		}
	}

	
	private function _writeSheetProtection(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		
		$Vze2ah1ycp2c->startElement('sheetProtection');

		if ($Vci1dgyyzjho->getProtection()->getPassword() != '') {
			$Vze2ah1ycp2c->writeAttribute('password',				$Vci1dgyyzjho->getProtection()->getPassword());
		}

		$Vze2ah1ycp2c->writeAttribute('sheet',					($Vci1dgyyzjho->getProtection()->getSheet()				? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('objects',				($Vci1dgyyzjho->getProtection()->getObjects()				? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('scenarios',				($Vci1dgyyzjho->getProtection()->getScenarios()			? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('formatCells',			($Vci1dgyyzjho->getProtection()->getFormatCells()			? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('formatColumns',			($Vci1dgyyzjho->getProtection()->getFormatColumns()		? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('formatRows',			($Vci1dgyyzjho->getProtection()->getFormatRows()			? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('insertColumns',			($Vci1dgyyzjho->getProtection()->getInsertColumns()		? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('insertRows',			($Vci1dgyyzjho->getProtection()->getInsertRows()			? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('insertHyperlinks',		($Vci1dgyyzjho->getProtection()->getInsertHyperlinks()	? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('deleteColumns',			($Vci1dgyyzjho->getProtection()->getDeleteColumns()		? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('deleteRows',			($Vci1dgyyzjho->getProtection()->getDeleteRows()			? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('selectLockedCells',		($Vci1dgyyzjho->getProtection()->getSelectLockedCells()	? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('sort',					($Vci1dgyyzjho->getProtection()->getSort()				? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('autoFilter',			($Vci1dgyyzjho->getProtection()->getAutoFilter()			? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('pivotTables',			($Vci1dgyyzjho->getProtection()->getPivotTables()			? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('selectUnlockedCells',	($Vci1dgyyzjho->getProtection()->getSelectUnlockedCells()	? 'true' : 'false'));
		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeConditionalFormatting(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		
		$Vwfsll4zanwn = 1;

		
		foreach ($Vci1dgyyzjho->getConditionalStylesCollection() as $Vfbcqrdgcovv => $Vrlulqrqtem4) {
			foreach ($Vrlulqrqtem4 as $Vtvntwrrzi5t) {
				
				
				
				
				if ($Vtvntwrrzi5t->getConditionType() != PHPExcel_Style_Conditional::CONDITION_NONE) {
					
					$Vze2ah1ycp2c->startElement('conditionalFormatting');
					$Vze2ah1ycp2c->writeAttribute('sqref',	$Vfbcqrdgcovv);

						
						$Vze2ah1ycp2c->startElement('cfRule');
						$Vze2ah1ycp2c->writeAttribute('type',		$Vtvntwrrzi5t->getConditionType());
						$Vze2ah1ycp2c->writeAttribute('dxfId',		$this->getParentWriter()->getStylesConditionalHashTable()->getIndexForHashCode( $Vtvntwrrzi5t->getHashCode() ));
						$Vze2ah1ycp2c->writeAttribute('priority',	$Vwfsll4zanwn++);

						if (($Vtvntwrrzi5t->getConditionType() == PHPExcel_Style_Conditional::CONDITION_CELLIS
								||
							 $Vtvntwrrzi5t->getConditionType() == PHPExcel_Style_Conditional::CONDITION_CONTAINSTEXT)
							&& $Vtvntwrrzi5t->getOperatorType() != PHPExcel_Style_Conditional::OPERATOR_NONE) {
							$Vze2ah1ycp2c->writeAttribute('operator',	$Vtvntwrrzi5t->getOperatorType());
						}

						if ($Vtvntwrrzi5t->getConditionType() == PHPExcel_Style_Conditional::CONDITION_CONTAINSTEXT
							&& !is_null($Vtvntwrrzi5t->getText())) {
							$Vze2ah1ycp2c->writeAttribute('text',	$Vtvntwrrzi5t->getText());
						}

						if ($Vtvntwrrzi5t->getConditionType() == PHPExcel_Style_Conditional::CONDITION_CONTAINSTEXT
							&& $Vtvntwrrzi5t->getOperatorType() == PHPExcel_Style_Conditional::OPERATOR_CONTAINSTEXT
							&& !is_null($Vtvntwrrzi5t->getText())) {
							$Vze2ah1ycp2c->writeElement('formula',	'NOT(ISERROR(SEARCH("' . $Vtvntwrrzi5t->getText() . '",' . $Vfbcqrdgcovv . ')))');
						} else if ($Vtvntwrrzi5t->getConditionType() == PHPExcel_Style_Conditional::CONDITION_CONTAINSTEXT
							&& $Vtvntwrrzi5t->getOperatorType() == PHPExcel_Style_Conditional::OPERATOR_BEGINSWITH
							&& !is_null($Vtvntwrrzi5t->getText())) {
							$Vze2ah1ycp2c->writeElement('formula',	'LEFT(' . $Vfbcqrdgcovv . ',' . strlen($Vtvntwrrzi5t->getText()) . ')="' . $Vtvntwrrzi5t->getText() . '"');
						} else if ($Vtvntwrrzi5t->getConditionType() == PHPExcel_Style_Conditional::CONDITION_CONTAINSTEXT
							&& $Vtvntwrrzi5t->getOperatorType() == PHPExcel_Style_Conditional::OPERATOR_ENDSWITH
							&& !is_null($Vtvntwrrzi5t->getText())) {
							$Vze2ah1ycp2c->writeElement('formula',	'RIGHT(' . $Vfbcqrdgcovv . ',' . strlen($Vtvntwrrzi5t->getText()) . ')="' . $Vtvntwrrzi5t->getText() . '"');
						} else if ($Vtvntwrrzi5t->getConditionType() == PHPExcel_Style_Conditional::CONDITION_CONTAINSTEXT
							&& $Vtvntwrrzi5t->getOperatorType() == PHPExcel_Style_Conditional::OPERATOR_NOTCONTAINS
							&& !is_null($Vtvntwrrzi5t->getText())) {
							$Vze2ah1ycp2c->writeElement('formula',	'ISERROR(SEARCH("' . $Vtvntwrrzi5t->getText() . '",' . $Vfbcqrdgcovv . '))');
						} else if ($Vtvntwrrzi5t->getConditionType() == PHPExcel_Style_Conditional::CONDITION_CELLIS
							|| $Vtvntwrrzi5t->getConditionType() == PHPExcel_Style_Conditional::CONDITION_CONTAINSTEXT
							|| $Vtvntwrrzi5t->getConditionType() == PHPExcel_Style_Conditional::CONDITION_EXPRESSION) {
							foreach ($Vtvntwrrzi5t->getConditions() as $V22ivdjjfdx2) {
								
								$Vze2ah1ycp2c->writeElement('formula',	$V22ivdjjfdx2);
							}
						}

						$Vze2ah1ycp2c->endElement();

					$Vze2ah1ycp2c->endElement();
				}
			}
		}
	}

	
	private function _writeDataValidations(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		
		$Vx5ejfashtxq = $Vci1dgyyzjho->getDataValidationCollection();

		
		if (!empty($Vx5ejfashtxq)) {
			$Vze2ah1ycp2c->startElement('dataValidations');
			$Vze2ah1ycp2c->writeAttribute('count', count($Vx5ejfashtxq));

			foreach ($Vx5ejfashtxq as $Vwykjuif1nf3 => $V4125lpnyjiw) {
				$Vze2ah1ycp2c->startElement('dataValidation');

				if ($V4125lpnyjiw->getType() != '') {
					$Vze2ah1ycp2c->writeAttribute('type', $V4125lpnyjiw->getType());
				}

				if ($V4125lpnyjiw->getErrorStyle() != '') {
					$Vze2ah1ycp2c->writeAttribute('errorStyle', $V4125lpnyjiw->getErrorStyle());
				}

				if ($V4125lpnyjiw->getOperator() != '') {
					$Vze2ah1ycp2c->writeAttribute('operator', $V4125lpnyjiw->getOperator());
				}

				$Vze2ah1ycp2c->writeAttribute('allowBlank',		($V4125lpnyjiw->getAllowBlank()		? '1'  : '0'));
				$Vze2ah1ycp2c->writeAttribute('showDropDown',		(!$V4125lpnyjiw->getShowDropDown()	? '1'  : '0'));
				$Vze2ah1ycp2c->writeAttribute('showInputMessage',	($V4125lpnyjiw->getShowInputMessage()	? '1'  : '0'));
				$Vze2ah1ycp2c->writeAttribute('showErrorMessage',	($V4125lpnyjiw->getShowErrorMessage()	? '1'  : '0'));

				if ($V4125lpnyjiw->getErrorTitle() !== '') {
					$Vze2ah1ycp2c->writeAttribute('errorTitle', $V4125lpnyjiw->getErrorTitle());
				}
				if ($V4125lpnyjiw->getError() !== '') {
					$Vze2ah1ycp2c->writeAttribute('error', $V4125lpnyjiw->getError());
				}
				if ($V4125lpnyjiw->getPromptTitle() !== '') {
					$Vze2ah1ycp2c->writeAttribute('promptTitle', $V4125lpnyjiw->getPromptTitle());
				}
				if ($V4125lpnyjiw->getPrompt() !== '') {
					$Vze2ah1ycp2c->writeAttribute('prompt', $V4125lpnyjiw->getPrompt());
				}

				$Vze2ah1ycp2c->writeAttribute('sqref', $Vwykjuif1nf3);

				if ($V4125lpnyjiw->getFormula1() !== '') {
					$Vze2ah1ycp2c->writeElement('formula1', $V4125lpnyjiw->getFormula1());
				}
				if ($V4125lpnyjiw->getFormula2() !== '') {
					$Vze2ah1ycp2c->writeElement('formula2', $V4125lpnyjiw->getFormula2());
				}

				$Vze2ah1ycp2c->endElement();
			}

			$Vze2ah1ycp2c->endElement();
		}
	}

	
	private function _writeHyperlinks(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		
		$Vwdjdjrjabju = $Vci1dgyyzjho->getHyperlinkCollection();

		
		$V1voj1xviycc = 1;

		
		if (!empty($Vwdjdjrjabju)) {
			$Vze2ah1ycp2c->startElement('hyperlinks');

			foreach ($Vwdjdjrjabju as $Vwykjuif1nf3 => $Vi45zv3gvg3s) {
				$Vze2ah1ycp2c->startElement('hyperlink');

				$Vze2ah1ycp2c->writeAttribute('ref', $Vwykjuif1nf3);
				if (!$Vi45zv3gvg3s->isInternal()) {
					$Vze2ah1ycp2c->writeAttribute('r:id',	'rId_hyperlink_' . $V1voj1xviycc);
					++$V1voj1xviycc;
				} else {
					$Vze2ah1ycp2c->writeAttribute('location',	str_replace('sheet://', '', $Vi45zv3gvg3s->getUrl()));
				}

				if ($Vi45zv3gvg3s->getTooltip() != '') {
					$Vze2ah1ycp2c->writeAttribute('tooltip', $Vi45zv3gvg3s->getTooltip());
				}

				$Vze2ah1ycp2c->endElement();
			}

			$Vze2ah1ycp2c->endElement();
		}
	}

	
	private function _writeProtectedRanges(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		if (count($Vci1dgyyzjho->getProtectedCells()) > 0) {
			
			$Vze2ah1ycp2c->startElement('protectedRanges');

				
				foreach ($Vci1dgyyzjho->getProtectedCells() as $Vudsxl4x0g4y => $Vesptqvj0214) {
					
					$Vze2ah1ycp2c->startElement('protectedRange');
					$Vze2ah1ycp2c->writeAttribute('name',		'p' . md5($Vudsxl4x0g4y));
					$Vze2ah1ycp2c->writeAttribute('sqref',	$Vudsxl4x0g4y);
					if (!empty($Vesptqvj0214)) {
						$Vze2ah1ycp2c->writeAttribute('password',	$Vesptqvj0214);
					}
					$Vze2ah1ycp2c->endElement();
				}

			$Vze2ah1ycp2c->endElement();
		}
	}

	
	private function _writeMergeCells(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		if (count($Vci1dgyyzjho->getMergeCells()) > 0) {
			
			$Vze2ah1ycp2c->startElement('mergeCells');

				
				foreach ($Vci1dgyyzjho->getMergeCells() as $V1sqn423aeel) {
					
					$Vze2ah1ycp2c->startElement('mergeCell');
					$Vze2ah1ycp2c->writeAttribute('ref', $V1sqn423aeel);
					$Vze2ah1ycp2c->endElement();
				}

			$Vze2ah1ycp2c->endElement();
		}
	}

	
	private function _writePrintOptions(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		
		$Vze2ah1ycp2c->startElement('printOptions');

		$Vze2ah1ycp2c->writeAttribute('gridLines',	($Vci1dgyyzjho->getPrintGridlines() ? 'true': 'false'));
		$Vze2ah1ycp2c->writeAttribute('gridLinesSet',	'true');

		if ($Vci1dgyyzjho->getPageSetup()->getHorizontalCentered()) {
			$Vze2ah1ycp2c->writeAttribute('horizontalCentered', 'true');
		}

		if ($Vci1dgyyzjho->getPageSetup()->getVerticalCentered()) {
			$Vze2ah1ycp2c->writeAttribute('verticalCentered', 'true');
		}

		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writePageMargins(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		
		$Vze2ah1ycp2c->startElement('pageMargins');
		$Vze2ah1ycp2c->writeAttribute('left',		PHPExcel_Shared_String::FormatNumber($Vci1dgyyzjho->getPageMargins()->getLeft()));
		$Vze2ah1ycp2c->writeAttribute('right',		PHPExcel_Shared_String::FormatNumber($Vci1dgyyzjho->getPageMargins()->getRight()));
		$Vze2ah1ycp2c->writeAttribute('top',		PHPExcel_Shared_String::FormatNumber($Vci1dgyyzjho->getPageMargins()->getTop()));
		$Vze2ah1ycp2c->writeAttribute('bottom',	PHPExcel_Shared_String::FormatNumber($Vci1dgyyzjho->getPageMargins()->getBottom()));
		$Vze2ah1ycp2c->writeAttribute('header',	PHPExcel_Shared_String::FormatNumber($Vci1dgyyzjho->getPageMargins()->getHeader()));
		$Vze2ah1ycp2c->writeAttribute('footer',	PHPExcel_Shared_String::FormatNumber($Vci1dgyyzjho->getPageMargins()->getFooter()));
		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeAutoFilter(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		$Vf22y2ugjneq = $Vci1dgyyzjho->getAutoFilter()->getRange();
		if (!empty($Vf22y2ugjneq)) {
			
			$Vze2ah1ycp2c->startElement('autoFilter');

			
			$Votjg2jvcmjx = PHPExcel_Cell::splitRange($Vf22y2ugjneq);
			$Votjg2jvcmjx = $Votjg2jvcmjx[0];
			
			if (strpos($Votjg2jvcmjx[0],'!') !== false) {
				list($Vct2g5kyvvvd,$Votjg2jvcmjx[0]) = explode('!',$Votjg2jvcmjx[0]);
			}
			$Votjg2jvcmjx = implode(':', $Votjg2jvcmjx);

			$Vze2ah1ycp2c->writeAttribute('ref',	str_replace('$','',$Votjg2jvcmjx));

			$V45swt0xn55i = $Vci1dgyyzjho->getAutoFilter()->getColumns();
			if (count($V45swt0xn55i > 0)) {
				foreach($V45swt0xn55i as $Vzsa3jprdsqa => $Vn4q2p4mkwa0) {
					$Vh4p4zmshpew = $Vn4q2p4mkwa0->getRules();
					if (count($Vh4p4zmshpew > 0)) {
						$Vze2ah1ycp2c->startElement('filterColumn');
							$Vze2ah1ycp2c->writeAttribute('colId',	$Vci1dgyyzjho->getAutoFilter()->getColumnOffset($Vzsa3jprdsqa));

							$Vze2ah1ycp2c->startElement( $Vn4q2p4mkwa0->getFilterType());
								if ($Vn4q2p4mkwa0->getJoin() == PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_COLUMN_JOIN_AND) {
									$Vze2ah1ycp2c->writeAttribute('and',	1);
								}

								foreach ($Vh4p4zmshpew as $Vz35i5ovw0xk) {
									if (($Vn4q2p4mkwa0->getFilterType() === PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_FILTER) &&
										($Vz35i5ovw0xk->getOperator() === PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_EQUAL) &&
										($Vz35i5ovw0xk->getValue() === '')) {
										
										$Vze2ah1ycp2c->writeAttribute('blank',	1);
									} elseif($Vz35i5ovw0xk->getRuleType() === PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMICFILTER) {
										
										$Vze2ah1ycp2c->writeAttribute('type', $Vz35i5ovw0xk->getGrouping());
										$Vwk2nao2d33x = $Vn4q2p4mkwa0->getAttribute('val');
										if ($Vwk2nao2d33x !== NULL) {
											$Vze2ah1ycp2c->writeAttribute('val', $Vwk2nao2d33x);
										}
										$V5c2jyk4vfy4 = $Vn4q2p4mkwa0->getAttribute('maxVal');
										if ($V5c2jyk4vfy4 !== NULL) {
											$Vze2ah1ycp2c->writeAttribute('maxVal', $V5c2jyk4vfy4);
										}
									} elseif($Vz35i5ovw0xk->getRuleType() === PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_TOPTENFILTER) {
										
										$Vze2ah1ycp2c->writeAttribute('val',	$Vz35i5ovw0xk->getValue());
										$Vze2ah1ycp2c->writeAttribute('percent',	(($Vz35i5ovw0xk->getOperator() === PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_TOPTEN_PERCENT) ? '1' : '0'));
										$Vze2ah1ycp2c->writeAttribute('top',	(($Vz35i5ovw0xk->getGrouping() === PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_TOPTEN_TOP) ? '1': '0'));
									} else {
										
										$Vze2ah1ycp2c->startElement($Vz35i5ovw0xk->getRuleType());

											if ($Vz35i5ovw0xk->getOperator() !== PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_EQUAL) {
												$Vze2ah1ycp2c->writeAttribute('operator',	$Vz35i5ovw0xk->getOperator());
											}
											if ($Vz35i5ovw0xk->getRuleType() === PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP) {
												
												foreach($Vz35i5ovw0xk->getValue() as $Vseq1edikdvg => $Vwk2nao2d33xue) {
													if ($Vwk2nao2d33xue > '') $Vze2ah1ycp2c->writeAttribute($Vseq1edikdvg,	$Vwk2nao2d33xue);
												}
												$Vze2ah1ycp2c->writeAttribute('dateTimeGrouping',	$Vz35i5ovw0xk->getGrouping());
											} else {
												$Vze2ah1ycp2c->writeAttribute('val',	$Vz35i5ovw0xk->getValue());
											}

										$Vze2ah1ycp2c->endElement();
									}
								}

							$Vze2ah1ycp2c->endElement();

						$Vze2ah1ycp2c->endElement();
					}
				}
			}

			$Vze2ah1ycp2c->endElement();
		}
	}

	
	private function _writePageSetup(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		
		$Vze2ah1ycp2c->startElement('pageSetup');
		$Vze2ah1ycp2c->writeAttribute('paperSize',		$Vci1dgyyzjho->getPageSetup()->getPaperSize());
		$Vze2ah1ycp2c->writeAttribute('orientation',	$Vci1dgyyzjho->getPageSetup()->getOrientation());

		if (!is_null($Vci1dgyyzjho->getPageSetup()->getScale())) {
			$Vze2ah1ycp2c->writeAttribute('scale',				 $Vci1dgyyzjho->getPageSetup()->getScale());
		}
		if (!is_null($Vci1dgyyzjho->getPageSetup()->getFitToHeight())) {
			$Vze2ah1ycp2c->writeAttribute('fitToHeight',		 $Vci1dgyyzjho->getPageSetup()->getFitToHeight());
		} else {
			$Vze2ah1ycp2c->writeAttribute('fitToHeight',		 '0');
		}
		if (!is_null($Vci1dgyyzjho->getPageSetup()->getFitToWidth())) {
			$Vze2ah1ycp2c->writeAttribute('fitToWidth',		 $Vci1dgyyzjho->getPageSetup()->getFitToWidth());
		} else {
			$Vze2ah1ycp2c->writeAttribute('fitToWidth',		 '0');
		}
		if (!is_null($Vci1dgyyzjho->getPageSetup()->getFirstPageNumber())) {
			$Vze2ah1ycp2c->writeAttribute('firstPageNumber',	$Vci1dgyyzjho->getPageSetup()->getFirstPageNumber());
			$Vze2ah1ycp2c->writeAttribute('useFirstPageNumber', '1');
		}

		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeHeaderFooter(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		
		$Vze2ah1ycp2c->startElement('headerFooter');
		$Vze2ah1ycp2c->writeAttribute('differentOddEven',	($Vci1dgyyzjho->getHeaderFooter()->getDifferentOddEven() ? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('differentFirst',	($Vci1dgyyzjho->getHeaderFooter()->getDifferentFirst() ? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('scaleWithDoc',		($Vci1dgyyzjho->getHeaderFooter()->getScaleWithDocument() ? 'true' : 'false'));
		$Vze2ah1ycp2c->writeAttribute('alignWithMargins',	($Vci1dgyyzjho->getHeaderFooter()->getAlignWithMargins() ? 'true' : 'false'));

			$Vze2ah1ycp2c->writeElement('oddHeader',		$Vci1dgyyzjho->getHeaderFooter()->getOddHeader());
			$Vze2ah1ycp2c->writeElement('oddFooter',		$Vci1dgyyzjho->getHeaderFooter()->getOddFooter());
			$Vze2ah1ycp2c->writeElement('evenHeader',		$Vci1dgyyzjho->getHeaderFooter()->getEvenHeader());
			$Vze2ah1ycp2c->writeElement('evenFooter',		$Vci1dgyyzjho->getHeaderFooter()->getEvenFooter());
			$Vze2ah1ycp2c->writeElement('firstHeader',	$Vci1dgyyzjho->getHeaderFooter()->getFirstHeader());
			$Vze2ah1ycp2c->writeElement('firstFooter',	$Vci1dgyyzjho->getHeaderFooter()->getFirstFooter());
		$Vze2ah1ycp2c->endElement();
	}

	
	private function _writeBreaks(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		
		$Vzaevepp4edg = array();
		$Vandjkg5g2wq = array();
		foreach ($Vci1dgyyzjho->getBreaks() as $Vblc1ueqvbti => $Vr1dbaib5cp1) {
			if ($Vr1dbaib5cp1 == PHPExcel_Worksheet::BREAK_ROW) {
				$Vzaevepp4edg[] = $Vblc1ueqvbti;
			} else if ($Vr1dbaib5cp1 == PHPExcel_Worksheet::BREAK_COLUMN) {
				$Vandjkg5g2wq[] = $Vblc1ueqvbti;
			}
		}

		
		if (!empty($Vzaevepp4edg)) {
			$Vze2ah1ycp2c->startElement('rowBreaks');
			$Vze2ah1ycp2c->writeAttribute('count',			count($Vzaevepp4edg));
			$Vze2ah1ycp2c->writeAttribute('manualBreakCount',	count($Vzaevepp4edg));

				foreach ($Vzaevepp4edg as $Vblc1ueqvbti) {
					$Vx2vveuwndx4 = PHPExcel_Cell::coordinateFromString($Vblc1ueqvbti);

					$Vze2ah1ycp2c->startElement('brk');
					$Vze2ah1ycp2c->writeAttribute('id',	$Vx2vveuwndx4[1]);
					$Vze2ah1ycp2c->writeAttribute('man',	'1');
					$Vze2ah1ycp2c->endElement();
				}

			$Vze2ah1ycp2c->endElement();
		}

		
		if (!empty($Vandjkg5g2wq)) {
			$Vze2ah1ycp2c->startElement('colBreaks');
			$Vze2ah1ycp2c->writeAttribute('count',			count($Vandjkg5g2wq));
			$Vze2ah1ycp2c->writeAttribute('manualBreakCount',	count($Vandjkg5g2wq));

				foreach ($Vandjkg5g2wq as $Vblc1ueqvbti) {
					$Vx2vveuwndx4 = PHPExcel_Cell::coordinateFromString($Vblc1ueqvbti);

					$Vze2ah1ycp2c->startElement('brk');
					$Vze2ah1ycp2c->writeAttribute('id',	PHPExcel_Cell::columnIndexFromString($Vx2vveuwndx4[0]) - 1);
					$Vze2ah1ycp2c->writeAttribute('man',	'1');
					$Vze2ah1ycp2c->endElement();
				}

			$Vze2ah1ycp2c->endElement();
		}
	}

	
	private function _writeSheetData(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null, $Vm2yvgr4j2qs = null)
	{
		if (is_array($Vm2yvgr4j2qs)) {
			
			$Vsvwrbt4veov = $this->getParentWriter()->getWriterPart('stringtable')->flipStringTable($Vm2yvgr4j2qs);

			
			$Vze2ah1ycp2c->startElement('sheetData');

				
				$Vjhpsdla1nuk = PHPExcel_Cell::columnIndexFromString($Vci1dgyyzjho->getHighestColumn());

				
				$Vrzlowqumaxt = $Vci1dgyyzjho->getHighestRow();

				
				$Vblc1ueqvbtisByRow = array();
				foreach ($Vci1dgyyzjho->getCellCollection() as $Vblc1ueqvbtiID) {
					$Vblc1ueqvbtiAddress = PHPExcel_Cell::coordinateFromString($Vblc1ueqvbtiID);
					$Vblc1ueqvbtisByRow[$Vblc1ueqvbtiAddress[1]][] = $Vblc1ueqvbtiID;
				}

				$Vnyup0pzlulk = 0;
				while($Vnyup0pzlulk++ < $Vrzlowqumaxt) {
					
					$Vkmxwmhd3woe = $Vci1dgyyzjho->getRowDimension($Vnyup0pzlulk);

					
					$V2j1bv4aw4u2 =	isset($Vblc1ueqvbtisByRow[$Vnyup0pzlulk]) ||
										$Vkmxwmhd3woe->getRowHeight() >= 0 ||
										$Vkmxwmhd3woe->getVisible() == false ||
										$Vkmxwmhd3woe->getCollapsed() == true ||
										$Vkmxwmhd3woe->getOutlineLevel() > 0 ||
										$Vkmxwmhd3woe->getXfIndex() !== null;

					if ($V2j1bv4aw4u2) {
						
						$Vze2ah1ycp2c->startElement('row');
						$Vze2ah1ycp2c->writeAttribute('r',	$Vnyup0pzlulk);
						$Vze2ah1ycp2c->writeAttribute('spans',	'1:' . $Vjhpsdla1nuk);

						
						if ($Vkmxwmhd3woe->getRowHeight() >= 0) {
							$Vze2ah1ycp2c->writeAttribute('customHeight',	'1');
							$Vze2ah1ycp2c->writeAttribute('ht',			PHPExcel_Shared_String::FormatNumber($Vkmxwmhd3woe->getRowHeight()));
						}

						
						if ($Vkmxwmhd3woe->getVisible() == false) {
							$Vze2ah1ycp2c->writeAttribute('hidden',		'true');
						}

						
						if ($Vkmxwmhd3woe->getCollapsed() == true) {
							$Vze2ah1ycp2c->writeAttribute('collapsed',		'true');
						}

						
						if ($Vkmxwmhd3woe->getOutlineLevel() > 0) {
							$Vze2ah1ycp2c->writeAttribute('outlineLevel',	$Vkmxwmhd3woe->getOutlineLevel());
						}

						
						if ($Vkmxwmhd3woe->getXfIndex() !== null) {
							$Vze2ah1ycp2c->writeAttribute('s',	$Vkmxwmhd3woe->getXfIndex());
							$Vze2ah1ycp2c->writeAttribute('customFormat', '1');
						}

						
						if (isset($Vblc1ueqvbtisByRow[$Vnyup0pzlulk])) {
							foreach($Vblc1ueqvbtisByRow[$Vnyup0pzlulk] as $Vblc1ueqvbtiAddress) {
								
								$this->_writeCell($Vze2ah1ycp2c, $Vci1dgyyzjho, $Vblc1ueqvbtiAddress, $Vm2yvgr4j2qs, $Vsvwrbt4veov);
							}
						}

						
						$Vze2ah1ycp2c->endElement();
					}
				}

			$Vze2ah1ycp2c->endElement();
		} else {
			throw new PHPExcel_Writer_Exception("Invalid parameters passed.");
		}
	}

	
	private function _writeCell(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null, $V5sw14e1n5nd = null, $Vm2yvgr4j2qs = null, $Vlzcqep001b1 = null)
	{
		if (is_array($Vm2yvgr4j2qs) && is_array($Vlzcqep001b1)) {
			
			$Vp0mtfiyrfm5 = $Vci1dgyyzjho->getCell($V5sw14e1n5nd);
			$Vze2ah1ycp2c->startElement('c');
			$Vze2ah1ycp2c->writeAttribute('r', $V5sw14e1n5nd);

			
			if ($Vp0mtfiyrfm5->getXfIndex() != '') {
				$Vze2ah1ycp2c->writeAttribute('s', $Vp0mtfiyrfm5->getXfIndex());
			}

			
			$Vblc1ueqvbtiValue = $Vp0mtfiyrfm5->getValue();
			if (is_object($Vblc1ueqvbtiValue) || $Vblc1ueqvbtiValue !== '') {
				
				$Vdz3luglb54b = $Vp0mtfiyrfm5->getDataType();

				
				switch (strtolower($Vdz3luglb54b)) {
					case 'inlinestr':	
					case 's':			
					case 'b':			
						$Vze2ah1ycp2c->writeAttribute('t', $Vdz3luglb54b);
						break;
					case 'f':			
						$Vhibovme1fp2 = ($this->getParentWriter()->getPreCalculateFormulas()) ?
						    $Vp0mtfiyrfm5->getCalculatedValue() :
						    $Vblc1ueqvbtiValue;
						if (is_string($Vhibovme1fp2)) {
							$Vze2ah1ycp2c->writeAttribute('t', 'str');
						}
						break;
					case 'e':			
						$Vze2ah1ycp2c->writeAttribute('t', $Vdz3luglb54b);
				}

				
				switch (strtolower($Vdz3luglb54b)) {
					case 'inlinestr':	
						if (! $Vblc1ueqvbtiValue instanceof PHPExcel_RichText) {
							$Vze2ah1ycp2c->writeElement('t', PHPExcel_Shared_String::ControlCharacterPHP2OOXML( htmlspecialchars($Vblc1ueqvbtiValue) ) );
						} else if ($Vblc1ueqvbtiValue instanceof PHPExcel_RichText) {
							$Vze2ah1ycp2c->startElement('is');
							$this->getParentWriter()->getWriterPart('stringtable')->writeRichText($Vze2ah1ycp2c, $Vblc1ueqvbtiValue);
							$Vze2ah1ycp2c->endElement();
						}

						break;
					case 's':			
						if (! $Vblc1ueqvbtiValue instanceof PHPExcel_RichText) {
							if (isset($Vlzcqep001b1[$Vblc1ueqvbtiValue])) {
								$Vze2ah1ycp2c->writeElement('v', $Vlzcqep001b1[$Vblc1ueqvbtiValue]);
							}
						} else if ($Vblc1ueqvbtiValue instanceof PHPExcel_RichText) {
							$Vze2ah1ycp2c->writeElement('v', $Vlzcqep001b1[$Vblc1ueqvbtiValue->getHashCode()]);
						}

						break;
					case 'f':			
						$Vmpqeek4lrvw = $Vp0mtfiyrfm5->getFormulaAttributes();
						if($Vmpqeek4lrvw['t'] == 'array') {
							$Vze2ah1ycp2c->startElement('f');
							$Vze2ah1ycp2c->writeAttribute('t', 'array');
							$Vze2ah1ycp2c->writeAttribute('ref', $V5sw14e1n5nd);
							$Vze2ah1ycp2c->writeAttribute('aca', '1');
							$Vze2ah1ycp2c->writeAttribute('ca', '1');
							$Vze2ah1ycp2c->text(substr($Vblc1ueqvbtiValue, 1));
							$Vze2ah1ycp2c->endElement();
						} else {
							$Vze2ah1ycp2c->writeElement('f', substr($Vblc1ueqvbtiValue, 1));
						}
						if ($this->getParentWriter()->getOffice2003Compatibility() === false) {
							if ($this->getParentWriter()->getPreCalculateFormulas()) {

								if (!is_array($Vhibovme1fp2) && substr($Vhibovme1fp2, 0, 1) != '#') {
									$Vze2ah1ycp2c->writeElement('v', PHPExcel_Shared_String::FormatNumber($Vhibovme1fp2));
								} else {
									$Vze2ah1ycp2c->writeElement('v', '0');
								}
							} else {
								$Vze2ah1ycp2c->writeElement('v', '0');
							}
						}
						break;
					case 'n':			
						
						$Vze2ah1ycp2c->writeElement('v', str_replace(',', '.', $Vblc1ueqvbtiValue));
						break;
					case 'b':			
						$Vze2ah1ycp2c->writeElement('v', ($Vblc1ueqvbtiValue ? '1' : '0'));
						break;
					case 'e':			
						if (substr($Vblc1ueqvbtiValue, 0, 1) == '=') {
							$Vze2ah1ycp2c->writeElement('f', substr($Vblc1ueqvbtiValue, 1));
							$Vze2ah1ycp2c->writeElement('v', substr($Vblc1ueqvbtiValue, 1));
						} else {
							$Vze2ah1ycp2c->writeElement('v', $Vblc1ueqvbtiValue);
						}

						break;
				}
			}

			$Vze2ah1ycp2c->endElement();
		} else {
			throw new PHPExcel_Writer_Exception("Invalid parameters passed.");
		}
	}

	
	private function _writeDrawings(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null, $Vbokbqv2yccd = FALSE)
	{
		$Vorscezbrib2 = ($Vbokbqv2yccd) ? $Vci1dgyyzjho->getChartCollection()->count() : 0;
		
		if (($Vci1dgyyzjho->getDrawingCollection()->count() > 0) ||
			($Vorscezbrib2 > 0)) {
			$Vze2ah1ycp2c->startElement('drawing');
			$Vze2ah1ycp2c->writeAttribute('r:id', 'rId1');
			$Vze2ah1ycp2c->endElement();
		}
	}

	
	private function _writeLegacyDrawing(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		
		if (count($Vci1dgyyzjho->getComments()) > 0) {
			$Vze2ah1ycp2c->startElement('legacyDrawing');
			$Vze2ah1ycp2c->writeAttribute('r:id', 'rId_comments_vml1');
			$Vze2ah1ycp2c->endElement();
		}
	}

	
	private function _writeLegacyDrawingHF(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet $Vci1dgyyzjho = null)
	{
		
		if (count($Vci1dgyyzjho->getHeaderFooter()->getImages()) > 0) {
			$Vze2ah1ycp2c->startElement('legacyDrawingHF');
			$Vze2ah1ycp2c->writeAttribute('r:id', 'rId_headerfooter_vml1');
			$Vze2ah1ycp2c->endElement();
		}
	}
}
