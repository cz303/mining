<?php




class PHPExcel_Writer_Excel2007_Comments extends PHPExcel_Writer_Excel2007_WriterPart
{
	
	public function writeComments(PHPExcel_Worksheet $Vnrv4ypspcxk = null)
	{
		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

  		
  		$Va0ahiqrugl0	= $Vnrv4ypspcxk->getComments();

  		
  		$V41g1q1douub	= array();
  		$Vusawlcyny44	= 0;
		foreach ($Va0ahiqrugl0 as $Vd25ttkxmgaf) {
			if (!isset($V41g1q1douub[$Vd25ttkxmgaf->getAuthor()])) {
				$V41g1q1douub[$Vd25ttkxmgaf->getAuthor()] = $Vusawlcyny44++;
			}
		}

		
		$Vze2ah1ycp2c->startElement('comments');
		$Vze2ah1ycp2c->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');

			
			$Vze2ah1ycp2c->startElement('authors');
			foreach ($V41g1q1douub as $Vbc1vclmfegu => $Vx5qfylfb01c) {
				$Vze2ah1ycp2c->writeElement('author', $Vbc1vclmfegu);
			}
			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('commentList');
			foreach ($Va0ahiqrugl0 as $Vseq1edikdvg => $Vp4xjtpabm0l) {
				$this->_writeComment($Vze2ah1ycp2c, $Vseq1edikdvg, $Vp4xjtpabm0l, $V41g1q1douub);
			}
			$Vze2ah1ycp2c->endElement();

		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();
	}

	
	public function _writeComment(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, $V253tuy5hl1m = 'A1', PHPExcel_Comment $Vxg0j2jmszew = null, $Vqsb53jdajb0 = null)
	{
		
		$Vze2ah1ycp2c->startElement('comment');
		$Vze2ah1ycp2c->writeAttribute('ref', 		$V253tuy5hl1m);
		$Vze2ah1ycp2c->writeAttribute('authorId', 	$Vqsb53jdajb0[$Vxg0j2jmszew->getAuthor()]);

			
			$Vze2ah1ycp2c->startElement('text');
			$this->getParentWriter()->getWriterPart('stringtable')->writeRichText($Vze2ah1ycp2c, $Vxg0j2jmszew->getText());
			$Vze2ah1ycp2c->endElement();

		$Vze2ah1ycp2c->endElement();
	}

	
	public function writeVMLComments(PHPExcel_Worksheet $Vnrv4ypspcxk = null)
	{
		
		$Vze2ah1ycp2c = null;
		if ($this->getParentWriter()->getUseDiskCaching()) {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
		} else {
			$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
		}

		
		$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

  		
  		$Va0ahiqrugl0	= $Vnrv4ypspcxk->getComments();

		
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
			$Vze2ah1ycp2c->writeAttribute('id', 		'_x0000_t202');
			$Vze2ah1ycp2c->writeAttribute('coordsize', '21600,21600');
			$Vze2ah1ycp2c->writeAttribute('o:spt', 	'202');
			$Vze2ah1ycp2c->writeAttribute('path', 		'm,l,21600r21600,l21600,xe');

				
				$Vze2ah1ycp2c->startElement('v:stroke');
				$Vze2ah1ycp2c->writeAttribute('joinstyle', 	'miter');
				$Vze2ah1ycp2c->endElement();

				
				$Vze2ah1ycp2c->startElement('v:path');
				$Vze2ah1ycp2c->writeAttribute('gradientshapeok', 	't');
				$Vze2ah1ycp2c->writeAttribute('o:connecttype', 	'rect');
				$Vze2ah1ycp2c->endElement();

			$Vze2ah1ycp2c->endElement();

			
			foreach ($Va0ahiqrugl0 as $Vseq1edikdvg => $Vp4xjtpabm0l) {
				$this->_writeVMLComment($Vze2ah1ycp2c, $Vseq1edikdvg, $Vp4xjtpabm0l);
			}

		$Vze2ah1ycp2c->endElement();

		
		return $Vze2ah1ycp2c->getData();
	}

	
	public function _writeVMLComment(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c = null, $V253tuy5hl1m = 'A1', PHPExcel_Comment $Vxg0j2jmszew = null)
	{
 		
 		list($Vn4q2p4mkwa0, $Vexbtekafkvl) = PHPExcel_Cell::coordinateFromString($V253tuy5hl1m);
 		$Vn4q2p4mkwa0 = PHPExcel_Cell::columnIndexFromString($Vn4q2p4mkwa0);
 		$Vwfsll4zanwn = 1024 + $Vn4q2p4mkwa0 + $Vexbtekafkvl;
 		$Vwfsll4zanwn = substr($Vwfsll4zanwn, 0, 4);

		
		$Vze2ah1ycp2c->startElement('v:shape');
		$Vze2ah1ycp2c->writeAttribute('id', 			'_x0000_s' . $Vwfsll4zanwn);
		$Vze2ah1ycp2c->writeAttribute('type', 			'#_x0000_t202');
		$Vze2ah1ycp2c->writeAttribute('style', 		'position:absolute;margin-left:' . $Vxg0j2jmszew->getMarginLeft() . ';margin-top:' . $Vxg0j2jmszew->getMarginTop() . ';width:' . $Vxg0j2jmszew->getWidth() . ';height:' . $Vxg0j2jmszew->getHeight() . ';z-index:1;visibility:' . ($Vxg0j2jmszew->getVisible() ? 'visible' : 'hidden'));
		$Vze2ah1ycp2c->writeAttribute('fillcolor', 	'#' . $Vxg0j2jmszew->getFillColor()->getRGB());
		$Vze2ah1ycp2c->writeAttribute('o:insetmode', 	'auto');

			
			$Vze2ah1ycp2c->startElement('v:fill');
			$Vze2ah1ycp2c->writeAttribute('color2', 		'#' . $Vxg0j2jmszew->getFillColor()->getRGB());
			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('v:shadow');
			$Vze2ah1ycp2c->writeAttribute('on', 			't');
			$Vze2ah1ycp2c->writeAttribute('color', 		'black');
			$Vze2ah1ycp2c->writeAttribute('obscured', 		't');
			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('v:path');
			$Vze2ah1ycp2c->writeAttribute('o:connecttype', 'none');
			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('v:textbox');
			$Vze2ah1ycp2c->writeAttribute('style', 'mso-direction-alt:auto');

				
				$Vze2ah1ycp2c->startElement('div');
				$Vze2ah1ycp2c->writeAttribute('style', 'text-align:left');
				$Vze2ah1ycp2c->endElement();

			$Vze2ah1ycp2c->endElement();

			
			$Vze2ah1ycp2c->startElement('x:ClientData');
			$Vze2ah1ycp2c->writeAttribute('ObjectType', 'Note');

				
				$Vze2ah1ycp2c->writeElement('x:MoveWithCells', '');

				
				$Vze2ah1ycp2c->writeElement('x:SizeWithCells', '');

				
				

				
				$Vze2ah1ycp2c->writeElement('x:AutoFill', 'False');

				
				$Vze2ah1ycp2c->writeElement('x:Row', ($Vexbtekafkvl - 1));

				
				$Vze2ah1ycp2c->writeElement('x:Column', ($Vn4q2p4mkwa0 - 1));

			$Vze2ah1ycp2c->endElement();

		$Vze2ah1ycp2c->endElement();
	}
}
