<?php




class PHPExcel_Writer_Excel2007_Rels extends PHPExcel_Writer_Excel2007_WriterPart
{
	
	public function writeRelationships(PHPExcel $V2ch40cq1nbr = null)
	{
		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

		
		$Vze2ah1ycp2c->startElement('Relationships');
		$Vze2ah1ycp2c->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/package/2006/relationships');

			$Vzgubteqlii5 = $V2ch40cq1nbr->getProperties()->getCustomProperties();
			if (!empty($Vzgubteqlii5)) {
				
				$this->_writeRelationship(
					$Vze2ah1ycp2c,
					4,
					'http://schemas.openxmlformats.org/officeDocument/2006/relationships/custom-properties',
					'docProps/custom.xml'
				);

			}

			
			$this->_writeRelationship(
				$Vze2ah1ycp2c,
				3,
				'http://schemas.openxmlformats.org/officeDocument/2006/relationships/extended-properties',
				'docProps/app.xml'
			);

			
			$this->_writeRelationship(
				$Vze2ah1ycp2c,
				2,
				'http://schemas.openxmlformats.org/package/2006/relationships/metadata/core-properties',
				'docProps/core.xml'
			);

			
			$this->_writeRelationship(
				$Vze2ah1ycp2c,
				1,
				'http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument',
				'xl/workbook.xml'
			);
			
			if($V2ch40cq1nbr->hasRibbon()){
				$this->_writeRelationShip(
					$Vze2ah1ycp2c,
					5,
					'http://schemas.microsoft.com/office/2006/relationships/ui/extensibility',
					$V2ch40cq1nbr->getRibbonXMLData('target')
				);
			}

		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();
	}

	
	public function writeWorkbookRelationships(PHPExcel $V2ch40cq1nbr = null)
	{
		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

		
		$Vze2ah1ycp2c->startElement('Relationships');
		$Vze2ah1ycp2c->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/package/2006/relationships');

			
			$this->_writeRelationship(
				$Vze2ah1ycp2c,
				1,
				'http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles',
				'styles.xml'
			);

			
			$this->_writeRelationship(
				$Vze2ah1ycp2c,
				2,
				'http://schemas.openxmlformats.org/officeDocument/2006/relationships/theme',
				'theme/theme1.xml'
			);

			
			$this->_writeRelationship(
				$Vze2ah1ycp2c,
				3,
				'http://schemas.openxmlformats.org/officeDocument/2006/relationships/sharedStrings',
				'sharedStrings.xml'
			);

			
			$Vtceocohllvl = $V2ch40cq1nbr->getSheetCount();
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vtceocohllvl; ++$Vfhiq1lhsoja) {
				$this->_writeRelationship(
					$Vze2ah1ycp2c,
					($Vfhiq1lhsoja + 1 + 3),
					'http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet',
					'worksheets/sheet' . ($Vfhiq1lhsoja + 1) . '.xml'
				);
			}
			
			
			if($V2ch40cq1nbr->hasMacros()){
				$this->_writeRelationShip(
					$Vze2ah1ycp2c,
					($Vfhiq1lhsoja + 1 + 3),
					'http://schemas.microsoft.com/office/2006/relationships/vbaProject',
					'vbaProject.bin'
				);
				++$Vfhiq1lhsoja;
			}

		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();
	}

	
	public function writeWorksheetRelationships(PHPExcel_Worksheet $Vnrv4ypspcxk = null, $Vnrv4ypspcxkId = 1, $Vfhiq1lhsojancludeCharts = FALSE)
	{
		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

		
		$Vze2ah1ycp2c->startElement('Relationships');
		$Vze2ah1ycp2c->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/package/2006/relationships');

			
			$Vrec2f1japon = 0;
			if ($Vfhiq1lhsojancludeCharts) {
				$V5bpblo0p4em = $Vnrv4ypspcxk->getChartCollection();
			} else {
				$V5bpblo0p4em = array();
			}
			if (($Vnrv4ypspcxk->getDrawingCollection()->count() > 0) ||
				(count($V5bpblo0p4em) > 0)) {
				$this->_writeRelationship(
					$Vze2ah1ycp2c,
					++$Vrec2f1japon,
					'http://schemas.openxmlformats.org/officeDocument/2006/relationships/drawing',
					'../drawings/drawing' . $Vnrv4ypspcxkId . '.xml'
				);
			}

			














			
			$Vfhiq1lhsoja = 1;
			foreach ($Vnrv4ypspcxk->getHyperlinkCollection() as $Vi45zv3gvg3s) {
				if (!$Vi45zv3gvg3s->isInternal()) {
					$this->_writeRelationship(
						$Vze2ah1ycp2c,
						'_hyperlink_' . $Vfhiq1lhsoja,
						'http://schemas.openxmlformats.org/officeDocument/2006/relationships/hyperlink',
						$Vi45zv3gvg3s->getUrl(),
						'External'
					);

					++$Vfhiq1lhsoja;
				}
			}

			
			$Vfhiq1lhsoja = 1;
			if (count($Vnrv4ypspcxk->getComments()) > 0) {
				$this->_writeRelationship(
					$Vze2ah1ycp2c,
					'_comments_vml' . $Vfhiq1lhsoja,
					'http://schemas.openxmlformats.org/officeDocument/2006/relationships/vmlDrawing',
					'../drawings/vmlDrawing' . $Vnrv4ypspcxkId . '.vml'
				);

				$this->_writeRelationship(
					$Vze2ah1ycp2c,
					'_comments' . $Vfhiq1lhsoja,
					'http://schemas.openxmlformats.org/officeDocument/2006/relationships/comments',
					'../comments' . $Vnrv4ypspcxkId . '.xml'
				);
			}

			
			$Vfhiq1lhsoja = 1;
			if (count($Vnrv4ypspcxk->getHeaderFooter()->getImages()) > 0) {
				$this->_writeRelationship(
					$Vze2ah1ycp2c,
					'_headerfooter_vml' . $Vfhiq1lhsoja,
					'http://schemas.openxmlformats.org/officeDocument/2006/relationships/vmlDrawing',
					'../drawings/vmlDrawingHF' . $Vnrv4ypspcxkId . '.vml'
				);
			}

		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();
	}

	
	public function writeDrawingRelationships(PHPExcel_Worksheet $Vnrv4ypspcxk = null, &$Vwckn0fjoqxa, $Vfhiq1lhsojancludeCharts = FALSE)
	{
		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

		
		$Vze2ah1ycp2c->startElement('Relationships');
		$Vze2ah1ycp2c->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/package/2006/relationships');

			
			$Vfhiq1lhsoja = 1;
			$Vfhiq1lhsojaterator = $Vnrv4ypspcxk->getDrawingCollection()->getIterator();
			while ($Vfhiq1lhsojaterator->valid()) {
				if ($Vfhiq1lhsojaterator->current() instanceof PHPExcel_Worksheet_Drawing
					|| $Vfhiq1lhsojaterator->current() instanceof PHPExcel_Worksheet_MemoryDrawing) {
					
					$this->_writeRelationship(
						$Vze2ah1ycp2c,
						$Vfhiq1lhsoja,
						'http://schemas.openxmlformats.org/officeDocument/2006/relationships/image',
						'../media/' . str_replace(' ', '', $Vfhiq1lhsojaterator->current()->getIndexedFilename())
					);
				}

				$Vfhiq1lhsojaterator->next();
				++$Vfhiq1lhsoja;
			}

			if ($Vfhiq1lhsojancludeCharts) {
				
				$Vorscezbrib2 = $Vnrv4ypspcxk->getChartCount();
				if ($Vorscezbrib2 > 0) {
					for ($V4y0urwpnd3j = 0; $V4y0urwpnd3j < $Vorscezbrib2; ++$V4y0urwpnd3j) {
						$this->_writeRelationship(
							$Vze2ah1ycp2c,
							$Vfhiq1lhsoja++,
							'http://schemas.openxmlformats.org/officeDocument/2006/relationships/chart',
							'../charts/chart' . ++$Vwckn0fjoqxa . '.xml'
						);
					}
				}
			}

		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();
	}

	
	public function writeHeaderFooterDrawingRelationships(PHPExcel_Worksheet $Vnrv4ypspcxk = null)
	{
		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

		
		$Vze2ah1ycp2c->startElement('Relationships');
		$Vze2ah1ycp2c->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/package/2006/relationships');

			
			foreach ($Vnrv4ypspcxk->getHeaderFooter()->getImages() as $Vseq1edikdvg => $Vp4xjtpabm0l) {
				
				$this->_writeRelationship(
					$Vze2ah1ycp2c,
					$Vseq1edikdvg,
					'http://schemas.openxmlformats.org/officeDocument/2006/relationships/image',
					'../media/' . $Vp4xjtpabm0l->getIndexedFilename()
				);
			}

		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();
	}

	
	private function _writeRelationship(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, $Vswpqsh0dje0 = 1, $Vjnmxs2zvys2 = '', $Vvmdxswj11vb = '', $Vvmdxswj11vbMode = '')
	{
		if ($Vjnmxs2zvys2 != '' && $Vvmdxswj11vb != '') {
			
			$Vze2ah1ycp2c->startElement('Relationship');
			$Vze2ah1ycp2c->writeAttribute('Id', 		'rId' . $Vswpqsh0dje0);
			$Vze2ah1ycp2c->writeAttribute('Type', 		$Vjnmxs2zvys2);
			$Vze2ah1ycp2c->writeAttribute('Target',	$Vvmdxswj11vb);

			if ($Vvmdxswj11vbMode != '') {
				$Vze2ah1ycp2c->writeAttribute('TargetMode',	$Vvmdxswj11vbMode);
			}

			$Vze2ah1ycp2c->endElement();
		} else {
			throw new PHPExcel_Writer_Exception("Invalid parameters passed.");
		}
	}
}
