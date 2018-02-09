<?php




class PHPExcel_Writer_Excel2007_Drawing extends PHPExcel_Writer_Excel2007_WriterPart
{
	
	public function writeDrawings(PHPExcel_Worksheet $Vnrv4ypspcxk = null, &$Vwckn0fjoqxa, $Vbokbqv2yccd = FALSE)
	{
		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

		
		$Vze2ah1ycp2c->startElement('xdr:wsDr');
		$Vze2ah1ycp2c->writeAttribute('xmlns:xdr', 'http://schemas.openxmlformats.org/drawingml/2006/spreadsheetDrawing');
		$Vze2ah1ycp2c->writeAttribute('xmlns:a', 'http://schemas.openxmlformats.org/drawingml/2006/main');

			
			$Vfhiq1lhsoja = 1;
			$Vfhiq1lhsojaterator = $Vnrv4ypspcxk->getDrawingCollection()->getIterator();
			while ($Vfhiq1lhsojaterator->valid()) {
				$this->_writeDrawing($Vze2ah1ycp2c, $Vfhiq1lhsojaterator->current(), $Vfhiq1lhsoja);

				$Vfhiq1lhsojaterator->next();
				++$Vfhiq1lhsoja;
			}

			if ($Vbokbqv2yccd) {
				$Vorscezbrib2 = $Vnrv4ypspcxk->getChartCount();
				
				if ($Vorscezbrib2 > 0) {
					for ($V4y0urwpnd3j = 0; $V4y0urwpnd3j < $Vorscezbrib2; ++$V4y0urwpnd3j) {
						$this->_writeChart($Vze2ah1ycp2c, $Vnrv4ypspcxk->getChartByIndex($V4y0urwpnd3j), $V4y0urwpnd3j+$Vfhiq1lhsoja);
					}
				}
			}


		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();
	}

	
	public function _writeChart(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Chart $V23qm22ezshm = null, $Vitw0sm2twkv = -1)
	{
		$V1bvr3q4skeq = $V23qm22ezshm->getTopLeftPosition();
		$V1bvr3q4skeq['colRow'] = PHPExcel_Cell::coordinateFromString($V1bvr3q4skeq['cell']);
		$Vsp5pmxi0jxf = $V23qm22ezshm->getBottomRightPosition();
		$Vsp5pmxi0jxf['colRow'] = PHPExcel_Cell::coordinateFromString($Vsp5pmxi0jxf['cell']);

		$Vze2ah1ycp2c->startElement('xdr:twoCellAnchor');

			$Vze2ah1ycp2c->startElement('xdr:from');
				$Vze2ah1ycp2c->writeElement('xdr:col', PHPExcel_Cell::columnIndexFromString($V1bvr3q4skeq['colRow'][0]) - 1);
				$Vze2ah1ycp2c->writeElement('xdr:colOff', PHPExcel_Shared_Drawing::pixelsToEMU($V1bvr3q4skeq['xOffset']));
				$Vze2ah1ycp2c->writeElement('xdr:row', $V1bvr3q4skeq['colRow'][1] - 1);
				$Vze2ah1ycp2c->writeElement('xdr:rowOff', PHPExcel_Shared_Drawing::pixelsToEMU($V1bvr3q4skeq['yOffset']));
			$Vze2ah1ycp2c->endElement();
			$Vze2ah1ycp2c->startElement('xdr:to');
				$Vze2ah1ycp2c->writeElement('xdr:col', PHPExcel_Cell::columnIndexFromString($Vsp5pmxi0jxf['colRow'][0]) - 1);
				$Vze2ah1ycp2c->writeElement('xdr:colOff', PHPExcel_Shared_Drawing::pixelsToEMU($Vsp5pmxi0jxf['xOffset']));
				$Vze2ah1ycp2c->writeElement('xdr:row', $Vsp5pmxi0jxf['colRow'][1] - 1);
				$Vze2ah1ycp2c->writeElement('xdr:rowOff', PHPExcel_Shared_Drawing::pixelsToEMU($Vsp5pmxi0jxf['yOffset']));
			$Vze2ah1ycp2c->endElement();

			$Vze2ah1ycp2c->startElement('xdr:graphicFrame');
				$Vze2ah1ycp2c->writeAttribute('macro', '');
				$Vze2ah1ycp2c->startElement('xdr:nvGraphicFramePr');
					$Vze2ah1ycp2c->startElement('xdr:cNvPr');
						$Vze2ah1ycp2c->writeAttribute('name', 'Chart '.$Vitw0sm2twkv);
						$Vze2ah1ycp2c->writeAttribute('id', 1025 * $Vitw0sm2twkv);
					$Vze2ah1ycp2c->endElement();
					$Vze2ah1ycp2c->startElement('xdr:cNvGraphicFramePr');
						$Vze2ah1ycp2c->startElement('a:graphicFrameLocks');
						$Vze2ah1ycp2c->endElement();
					$Vze2ah1ycp2c->endElement();
				$Vze2ah1ycp2c->endElement();

				$Vze2ah1ycp2c->startElement('xdr:xfrm');
					$Vze2ah1ycp2c->startElement('a:off');
						$Vze2ah1ycp2c->writeAttribute('x', '0');
						$Vze2ah1ycp2c->writeAttribute('y', '0');
					$Vze2ah1ycp2c->endElement();
					$Vze2ah1ycp2c->startElement('a:ext');
						$Vze2ah1ycp2c->writeAttribute('cx', '0');
						$Vze2ah1ycp2c->writeAttribute('cy', '0');
					$Vze2ah1ycp2c->endElement();
				$Vze2ah1ycp2c->endElement();

				$Vze2ah1ycp2c->startElement('a:graphic');
					$Vze2ah1ycp2c->startElement('a:graphicData');
						$Vze2ah1ycp2c->writeAttribute('uri', 'http://schemas.openxmlformats.org/drawingml/2006/chart');
						$Vze2ah1ycp2c->startElement('c:chart');
							$Vze2ah1ycp2c->writeAttribute('xmlns:c', 'http://schemas.openxmlformats.org/drawingml/2006/chart');
							$Vze2ah1ycp2c->writeAttribute('xmlns:r', 'http://schemas.openxmlformats.org/officeDocument/2006/relationships');
							$Vze2ah1ycp2c->writeAttribute('r:id', 'rId'.$Vitw0sm2twkv);
						$Vze2ah1ycp2c->endElement();
					$Vze2ah1ycp2c->endElement();
				$Vze2ah1ycp2c->endElement();
			$Vze2ah1ycp2c->endElement();

			$Vze2ah1ycp2c->startElement('xdr:clientData');
			$Vze2ah1ycp2c->endElement();

		$Vze2ah1ycp2c->endElement();
	}

	
	public function _writeDrawing(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, PHPExcel_Worksheet_BaseDrawing $Vj3ryvrbkkq2 = null, $Vitw0sm2twkv = -1)
	{
		if ($Vitw0sm2twkv >= 0) {
			
			$Vze2ah1ycp2c->startElement('xdr:oneCellAnchor');
				
				$Vgiaghj0r1a2 		= PHPExcel_Cell::coordinateFromString($Vj3ryvrbkkq2->getCoordinates());
				$Vgiaghj0r1a2[0] 	= PHPExcel_Cell::columnIndexFromString($Vgiaghj0r1a2[0]);

				
				$Vze2ah1ycp2c->startElement('xdr:from');
					$Vze2ah1ycp2c->writeElement('xdr:col', $Vgiaghj0r1a2[0] - 1);
					$Vze2ah1ycp2c->writeElement('xdr:colOff', PHPExcel_Shared_Drawing::pixelsToEMU($Vj3ryvrbkkq2->getOffsetX()));
					$Vze2ah1ycp2c->writeElement('xdr:row', $Vgiaghj0r1a2[1] - 1);
					$Vze2ah1ycp2c->writeElement('xdr:rowOff', PHPExcel_Shared_Drawing::pixelsToEMU($Vj3ryvrbkkq2->getOffsetY()));
				$Vze2ah1ycp2c->endElement();

				
				$Vze2ah1ycp2c->startElement('xdr:ext');
					$Vze2ah1ycp2c->writeAttribute('cx', PHPExcel_Shared_Drawing::pixelsToEMU($Vj3ryvrbkkq2->getWidth()));
					$Vze2ah1ycp2c->writeAttribute('cy', PHPExcel_Shared_Drawing::pixelsToEMU($Vj3ryvrbkkq2->getHeight()));
				$Vze2ah1ycp2c->endElement();

				
				$Vze2ah1ycp2c->startElement('xdr:pic');

					
					$Vze2ah1ycp2c->startElement('xdr:nvPicPr');

						
						$Vze2ah1ycp2c->startElement('xdr:cNvPr');
						$Vze2ah1ycp2c->writeAttribute('id', $Vitw0sm2twkv);
						$Vze2ah1ycp2c->writeAttribute('name', $Vj3ryvrbkkq2->getName());
						$Vze2ah1ycp2c->writeAttribute('descr', $Vj3ryvrbkkq2->getDescription());
						$Vze2ah1ycp2c->endElement();

						
						$Vze2ah1ycp2c->startElement('xdr:cNvPicPr');

							
							$Vze2ah1ycp2c->startElement('a:picLocks');
							$Vze2ah1ycp2c->writeAttribute('noChangeAspect', '1');
							$Vze2ah1ycp2c->endElement();

						$Vze2ah1ycp2c->endElement();

					$Vze2ah1ycp2c->endElement();

					
					$Vze2ah1ycp2c->startElement('xdr:blipFill');

						
						$Vze2ah1ycp2c->startElement('a:blip');
						$Vze2ah1ycp2c->writeAttribute('xmlns:r', 'http://schemas.openxmlformats.org/officeDocument/2006/relationships');
						$Vze2ah1ycp2c->writeAttribute('r:embed', 'rId' . $Vitw0sm2twkv);
						$Vze2ah1ycp2c->endElement();

						
						$Vze2ah1ycp2c->startElement('a:stretch');
							$Vze2ah1ycp2c->writeElement('a:fillRect', null);
						$Vze2ah1ycp2c->endElement();

					$Vze2ah1ycp2c->endElement();

					
					$Vze2ah1ycp2c->startElement('xdr:spPr');

						
						$Vze2ah1ycp2c->startElement('a:xfrm');
						$Vze2ah1ycp2c->writeAttribute('rot', PHPExcel_Shared_Drawing::degreesToAngle($Vj3ryvrbkkq2->getRotation()));
						$Vze2ah1ycp2c->endElement();

						
						$Vze2ah1ycp2c->startElement('a:prstGeom');
						$Vze2ah1ycp2c->writeAttribute('prst', 'rect');

							
							$Vze2ah1ycp2c->writeElement('a:avLst', null);

						$Vze2ah1ycp2c->endElement();




















						if ($Vj3ryvrbkkq2->getShadow()->getVisible()) {
							
							$Vze2ah1ycp2c->startElement('a:effectLst');

								
								$Vze2ah1ycp2c->startElement('a:outerShdw');
								$Vze2ah1ycp2c->writeAttribute('blurRad', 		PHPExcel_Shared_Drawing::pixelsToEMU($Vj3ryvrbkkq2->getShadow()->getBlurRadius()));
								$Vze2ah1ycp2c->writeAttribute('dist',			PHPExcel_Shared_Drawing::pixelsToEMU($Vj3ryvrbkkq2->getShadow()->getDistance()));
								$Vze2ah1ycp2c->writeAttribute('dir',			PHPExcel_Shared_Drawing::degreesToAngle($Vj3ryvrbkkq2->getShadow()->getDirection()));
								$Vze2ah1ycp2c->writeAttribute('algn',			$Vj3ryvrbkkq2->getShadow()->getAlignment());
								$Vze2ah1ycp2c->writeAttribute('rotWithShape', 	'0');

									
									$Vze2ah1ycp2c->startElement('a:srgbClr');
									$Vze2ah1ycp2c->writeAttribute('val',		$Vj3ryvrbkkq2->getShadow()->getColor()->getRGB());

										
										$Vze2ah1ycp2c->startElement('a:alpha');
										$Vze2ah1ycp2c->writeAttribute('val', 	$Vj3ryvrbkkq2->getShadow()->getAlpha() * 1000);
										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

								$Vze2ah1ycp2c->endElement();

							$Vze2ah1ycp2c->endElement();
						}


					$Vze2ah1ycp2c->endElement();

				$Vze2ah1ycp2c->endElement();

				
				$Vze2ah1ycp2c->writeElement('xdr:clientData', null);

			$Vze2ah1ycp2c->endElement();
		} else {
			throw new PHPExcel_Writer_Exception("Invalid parameters passed.");
		}
	}

	
	public function writeVMLHeaderFooterImages(PHPExcel_Worksheet $Vnrv4ypspcxk = null)
	{
		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

  		
  		$Vfhiq1lhsojamages = $Vnrv4ypspcxk->getHeaderFooter()->getImages();

		
		$Vze2ah1ycp2c->startElement('xml');
		$Vze2ah1ycp2c->writeAttribute('xmlns:v', 'urn:schemas-microsoft-com:vml');
		$Vze2ah1ycp2c->writeAttribute('xmlns:o', 'urn:schemas-microsoft-com:office:office');
		$Vze2ah1ycp2c->writeAttribute('xmlns:x', 'urn:schemas-microsoft-com:office:excel');

			
			$Vze2ah1ycp2c->startElement('o:shapelayout');
			$Vze2ah1ycp2c->writeAttribute('v:ext', 		'edit');

				
				$Vze2ah1ycp2c->startElement('o:idmap');
				$Vze2ah1ycp2c->writeAttribute('v:ext', 	'edit');
				$Vze2ah1ycp2c->writeAttribute('data', 		'1');
				$Vze2ah1ycp2c->endElement();

			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('v:shapetype');
			$Vze2ah1ycp2c->writeAttribute('id', 					'_x0000_t75');
			$Vze2ah1ycp2c->writeAttribute('coordsize', 			'21600,21600');
			$Vze2ah1ycp2c->writeAttribute('o:spt', 				'75');
			$Vze2ah1ycp2c->writeAttribute('o:preferrelative', 		't');
			$Vze2ah1ycp2c->writeAttribute('path', 					'm@4@5l@4@11@9@11@9@5xe');
			$Vze2ah1ycp2c->writeAttribute('filled',		 		'f');
			$Vze2ah1ycp2c->writeAttribute('stroked',		 		'f');

				
				$Vze2ah1ycp2c->startElement('v:stroke');
				$Vze2ah1ycp2c->writeAttribute('joinstyle', 		'miter');
				$Vze2ah1ycp2c->endElement();

				
				$Vze2ah1ycp2c->startElement('v:formulas');

					
					$Vze2ah1ycp2c->startElement('v:f');
					$Vze2ah1ycp2c->writeAttribute('eqn', 		'if lineDrawn pixelLineWidth 0');
					$Vze2ah1ycp2c->endElement();

					
					$Vze2ah1ycp2c->startElement('v:f');
					$Vze2ah1ycp2c->writeAttribute('eqn', 		'sum @0 1 0');
					$Vze2ah1ycp2c->endElement();

					
					$Vze2ah1ycp2c->startElement('v:f');
					$Vze2ah1ycp2c->writeAttribute('eqn', 		'sum 0 0 @1');
					$Vze2ah1ycp2c->endElement();

					
					$Vze2ah1ycp2c->startElement('v:f');
					$Vze2ah1ycp2c->writeAttribute('eqn', 		'prod @2 1 2');
					$Vze2ah1ycp2c->endElement();

					
					$Vze2ah1ycp2c->startElement('v:f');
					$Vze2ah1ycp2c->writeAttribute('eqn', 		'prod @3 21600 pixelWidth');
					$Vze2ah1ycp2c->endElement();

					
					$Vze2ah1ycp2c->startElement('v:f');
					$Vze2ah1ycp2c->writeAttribute('eqn', 		'prod @3 21600 pixelHeight');
					$Vze2ah1ycp2c->endElement();

					
					$Vze2ah1ycp2c->startElement('v:f');
					$Vze2ah1ycp2c->writeAttribute('eqn', 		'sum @0 0 1');
					$Vze2ah1ycp2c->endElement();

					
					$Vze2ah1ycp2c->startElement('v:f');
					$Vze2ah1ycp2c->writeAttribute('eqn', 		'prod @6 1 2');
					$Vze2ah1ycp2c->endElement();

					
					$Vze2ah1ycp2c->startElement('v:f');
					$Vze2ah1ycp2c->writeAttribute('eqn', 		'prod @7 21600 pixelWidth');
					$Vze2ah1ycp2c->endElement();

					
					$Vze2ah1ycp2c->startElement('v:f');
					$Vze2ah1ycp2c->writeAttribute('eqn', 		'sum @8 21600 0');
					$Vze2ah1ycp2c->endElement();

					
					$Vze2ah1ycp2c->startElement('v:f');
					$Vze2ah1ycp2c->writeAttribute('eqn', 		'prod @7 21600 pixelHeight');
					$Vze2ah1ycp2c->endElement();

					
					$Vze2ah1ycp2c->startElement('v:f');
					$Vze2ah1ycp2c->writeAttribute('eqn', 		'sum @10 21600 0');
					$Vze2ah1ycp2c->endElement();

				$Vze2ah1ycp2c->endElement();

				
				$Vze2ah1ycp2c->startElement('v:path');
				$Vze2ah1ycp2c->writeAttribute('o:extrusionok', 	'f');
				$Vze2ah1ycp2c->writeAttribute('gradientshapeok', 	't');
				$Vze2ah1ycp2c->writeAttribute('o:connecttype', 	'rect');
				$Vze2ah1ycp2c->endElement();

				
				$Vze2ah1ycp2c->startElement('o:lock');
				$Vze2ah1ycp2c->writeAttribute('v:ext', 			'edit');
				$Vze2ah1ycp2c->writeAttribute('aspectratio', 		't');
				$Vze2ah1ycp2c->endElement();

			$Vze2ah1ycp2c->endElement();

			
			foreach ($Vfhiq1lhsojamages as $Vseq1edikdvg => $Vp4xjtpabm0l) {
				$this->_writeVMLHeaderFooterImage($Vze2ah1ycp2c, $Vseq1edikdvg, $Vp4xjtpabm0l);
			}

		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();
	}

	
	public function _writeVMLHeaderFooterImage(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, $Vxii4maeje4d = '', PHPExcel_Worksheet_HeaderFooterDrawing $Vztckg3ijkpr = null)
	{
		
		preg_match('{(\d+)}', md5($Vxii4maeje4d), $Vt54vmttyjzc);
		$Vfhiq1lhsojad = 1500 + (substr($Vt54vmttyjzc[1], 0, 2) * 1);

		
		$Vojs2qdgagwv = $Vztckg3ijkpr->getWidth();
		$Vzo4g5xb4yip = $Vztckg3ijkpr->getHeight();
		$Vt54vmttyjzcarginLeft = $Vztckg3ijkpr->getOffsetX();
		$Vt54vmttyjzcarginTop = $Vztckg3ijkpr->getOffsetY();

		
		$Vze2ah1ycp2c->startElement('v:shape');
		$Vze2ah1ycp2c->writeAttribute('id', 			$Vxii4maeje4d);
		$Vze2ah1ycp2c->writeAttribute('o:spid', 		'_x0000_s' . $Vfhiq1lhsojad);
		$Vze2ah1ycp2c->writeAttribute('type', 			'#_x0000_t75');
		$Vze2ah1ycp2c->writeAttribute('style', 		"position:absolute;margin-left:{$Vt54vmttyjzcarginLeft}px;margin-top:{$Vt54vmttyjzcarginTop}px;width:{$Vojs2qdgagwv}px;height:{$Vzo4g5xb4yip}px;z-index:1");

			
			$Vze2ah1ycp2c->startElement('v:imagedata');
			$Vze2ah1ycp2c->writeAttribute('o:relid', 		'rId' . $Vxii4maeje4d);
			$Vze2ah1ycp2c->writeAttribute('o:title', 		$Vztckg3ijkpr->getName());
			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('o:lock');
			$Vze2ah1ycp2c->writeAttribute('v:ext', 		'edit');
			$Vze2ah1ycp2c->writeAttribute('rotation', 		't');
			$Vze2ah1ycp2c->endElement();

		$Vze2ah1ycp2c->endElement();
	}


	
	public function allDrawings(PHPExcel $V2ch40cq1nbr = null)
	{
		
		$Vxd20qo5zlqs	= array();

		
		$Vtceocohllvl = $V2ch40cq1nbr->getSheetCount();
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vtceocohllvl; ++$Vfhiq1lhsoja) {
			
			$Vfhiq1lhsojaterator = $V2ch40cq1nbr->getSheet($Vfhiq1lhsoja)->getDrawingCollection()->getIterator();
			while ($Vfhiq1lhsojaterator->valid()) {
				$Vxd20qo5zlqs[] = $Vfhiq1lhsojaterator->current();

  				$Vfhiq1lhsojaterator->next();
			}
		}

		return $Vxd20qo5zlqs;
	}
}
