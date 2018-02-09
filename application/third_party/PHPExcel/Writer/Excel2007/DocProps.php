<?php




class PHPExcel_Writer_Excel2007_DocProps extends PHPExcel_Writer_Excel2007_WriterPart
{

	public function writeDocPropsApp(PHPExcel $V2ch40cq1nbr = null)
	{
		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

		
		$Vze2ah1ycp2c->startElement('Properties');
			$Vze2ah1ycp2c->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/officeDocument/2006/extended-properties');
			$Vze2ah1ycp2c->writeAttribute('xmlns:vt', 'http://schemas.openxmlformats.org/officeDocument/2006/docPropsVTypes');

			
			$Vze2ah1ycp2c->writeElement('Application', 	'Microsoft Excel');

			
			$Vze2ah1ycp2c->writeElement('DocSecurity', 	'0');

			
			$Vze2ah1ycp2c->writeElement('ScaleCrop', 		'false');

			
			$Vze2ah1ycp2c->startElement('HeadingPairs');

				
				$Vze2ah1ycp2c->startElement('vt:vector');
					$Vze2ah1ycp2c->writeAttribute('size', 		'2');
					$Vze2ah1ycp2c->writeAttribute('baseType', 	'variant');

					
					$Vze2ah1ycp2c->startElement('vt:variant');
						$Vze2ah1ycp2c->writeElement('vt:lpstr', 	'Worksheets');
					$Vze2ah1ycp2c->endElement();

					
					$Vze2ah1ycp2c->startElement('vt:variant');
						$Vze2ah1ycp2c->writeElement('vt:i4', 		$V2ch40cq1nbr->getSheetCount());
					$Vze2ah1ycp2c->endElement();

				$Vze2ah1ycp2c->endElement();

			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('TitlesOfParts');

				
				$Vze2ah1ycp2c->startElement('vt:vector');
					$Vze2ah1ycp2c->writeAttribute('size', 		$V2ch40cq1nbr->getSheetCount());
					$Vze2ah1ycp2c->writeAttribute('baseType',	'lpstr');

					$Vtceocohllvl = $V2ch40cq1nbr->getSheetCount();
					for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vtceocohllvl; ++$Vfhiq1lhsoja) {
						$Vze2ah1ycp2c->writeElement('vt:lpstr', $V2ch40cq1nbr->getSheet($Vfhiq1lhsoja)->getTitle());
					}

				$Vze2ah1ycp2c->endElement();

			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->writeElement('Company', 			$V2ch40cq1nbr->getProperties()->getCompany());

			
			$Vze2ah1ycp2c->writeElement('Manager', 			$V2ch40cq1nbr->getProperties()->getManager());

			
			$Vze2ah1ycp2c->writeElement('LinksUpToDate', 		'false');

			
			$Vze2ah1ycp2c->writeElement('SharedDoc', 			'false');

			
			$Vze2ah1ycp2c->writeElement('HyperlinksChanged', 	'false');

			
			$Vze2ah1ycp2c->writeElement('AppVersion', 			'12.0000');

		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();
	}

	
	public function writeDocPropsCore(PHPExcel $V2ch40cq1nbr = null)
	{
		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

		
		$Vze2ah1ycp2c->startElement('cp:coreProperties');
			$Vze2ah1ycp2c->writeAttribute('xmlns:cp', 'http://schemas.openxmlformats.org/package/2006/metadata/core-properties');
			$Vze2ah1ycp2c->writeAttribute('xmlns:dc', 'http://purl.org/dc/elements/1.1/');
			$Vze2ah1ycp2c->writeAttribute('xmlns:dcterms', 'http://purl.org/dc/terms/');
			$Vze2ah1ycp2c->writeAttribute('xmlns:dcmitype', 'http://purl.org/dc/dcmitype/');
			$Vze2ah1ycp2c->writeAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');

			
			$Vze2ah1ycp2c->writeElement('dc:creator',			$V2ch40cq1nbr->getProperties()->getCreator());

			
			$Vze2ah1ycp2c->writeElement('cp:lastModifiedBy', 	$V2ch40cq1nbr->getProperties()->getLastModifiedBy());

			
			$Vze2ah1ycp2c->startElement('dcterms:created');
				$Vze2ah1ycp2c->writeAttribute('xsi:type', 'dcterms:W3CDTF');
				$Vze2ah1ycp2c->writeRawData(date(DATE_W3C, 	$V2ch40cq1nbr->getProperties()->getCreated()));
			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('dcterms:modified');
				$Vze2ah1ycp2c->writeAttribute('xsi:type', 'dcterms:W3CDTF');
				$Vze2ah1ycp2c->writeRawData(date(DATE_W3C, 	$V2ch40cq1nbr->getProperties()->getModified()));
			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->writeElement('dc:title', 			$V2ch40cq1nbr->getProperties()->getTitle());

			
			$Vze2ah1ycp2c->writeElement('dc:description', 		$V2ch40cq1nbr->getProperties()->getDescription());

			
			$Vze2ah1ycp2c->writeElement('dc:subject', 			$V2ch40cq1nbr->getProperties()->getSubject());

			
			$Vze2ah1ycp2c->writeElement('cp:keywords', 		$V2ch40cq1nbr->getProperties()->getKeywords());

			
			$Vze2ah1ycp2c->writeElement('cp:category', 		$V2ch40cq1nbr->getProperties()->getCategory());

		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();
	}

	
	public function writeDocPropsCustom(PHPExcel $V2ch40cq1nbr = null)
	{
		$Vzgubteqlii5 = $V2ch40cq1nbr->getProperties()->getCustomProperties();
		if (empty($Vzgubteqlii5)) {
			return;
		}

		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

		
		$Vze2ah1ycp2c->startElement('Properties');
			$Vze2ah1ycp2c->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/officeDocument/2006/custom-properties');
			$Vze2ah1ycp2c->writeAttribute('xmlns:vt', 'http://schemas.openxmlformats.org/officeDocument/2006/docPropsVTypes');


			foreach($Vzgubteqlii5 as $Vseq1edikdvg => $Veccmw1ktbiy) {
				$Vybj4yv3ywl1 = $V2ch40cq1nbr->getProperties()->getCustomPropertyValue($Veccmw1ktbiy);
				$Vbcvvc32gxb3 = $V2ch40cq1nbr->getProperties()->getCustomPropertyType($Veccmw1ktbiy);

				$Vze2ah1ycp2c->startElement('property');
					$Vze2ah1ycp2c->writeAttribute('fmtid', 	'{D5CDD505-2E9C-101B-9397-08002B2CF9AE}');
					$Vze2ah1ycp2c->writeAttribute('pid', 		$Vseq1edikdvg+2);
					$Vze2ah1ycp2c->writeAttribute('name', 		$Veccmw1ktbiy);

					switch($Vbcvvc32gxb3) {
						case 'i' :
							$Vze2ah1ycp2c->writeElement('vt:i4', 		$Vybj4yv3ywl1);
							break;
						case 'f' :
							$Vze2ah1ycp2c->writeElement('vt:r8', 		$Vybj4yv3ywl1);
							break;
						case 'b' :
							$Vze2ah1ycp2c->writeElement('vt:bool', 	($Vybj4yv3ywl1) ? 'true' : 'false');
							break;
						case 'd' :
							$Vze2ah1ycp2c->startElement('vt:filetime');
								$Vze2ah1ycp2c->writeRawData(date(DATE_W3C, $Vybj4yv3ywl1));
							$Vze2ah1ycp2c->endElement();
							break;
						default :
							$Vze2ah1ycp2c->writeElement('vt:lpwstr', 	$Vybj4yv3ywl1);
							break;
					}

				$Vze2ah1ycp2c->endElement();
			}


		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();
	}

}
