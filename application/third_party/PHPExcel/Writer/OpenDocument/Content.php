<?php




class PHPExcel_Writer_OpenDocument_Content extends PHPExcel_Writer_OpenDocument_WriterPart
{
    const NUMBER_COLS_REPEATED_MAX = 1024;
    const NUMBER_ROWS_REPEATED_MAX = 1048576;

    
    public function write(PHPExcel $V2ch40cq1nbr = null)
    {
        if (!$V2ch40cq1nbr) {
            $V2ch40cq1nbr = $this->getParentWriter()->getPHPExcel(); 
        }

        $Vze2ah1ycp2c = null;
        if ($this->getParentWriter()->getUseDiskCaching()) {
            $Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
        } else {
            $Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
        }

        
        $Vze2ah1ycp2c->startDocument('1.0', 'UTF-8');

        
        $Vze2ah1ycp2c->startElement('office:document-content');
            $Vze2ah1ycp2c->writeAttribute('xmlns:office', 'urn:oasis:names:tc:opendocument:xmlns:office:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:style', 'urn:oasis:names:tc:opendocument:xmlns:style:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:text', 'urn:oasis:names:tc:opendocument:xmlns:text:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:table', 'urn:oasis:names:tc:opendocument:xmlns:table:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:draw', 'urn:oasis:names:tc:opendocument:xmlns:drawing:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:fo', 'urn:oasis:names:tc:opendocument:xmlns:xsl-fo-compatible:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:xlink', 'http://www.w3.org/1999/xlink');
            $Vze2ah1ycp2c->writeAttribute('xmlns:dc', 'http://purl.org/dc/elements/1.1/');
            $Vze2ah1ycp2c->writeAttribute('xmlns:meta', 'urn:oasis:names:tc:opendocument:xmlns:meta:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:number', 'urn:oasis:names:tc:opendocument:xmlns:datastyle:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:presentation', 'urn:oasis:names:tc:opendocument:xmlns:presentation:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:svg', 'urn:oasis:names:tc:opendocument:xmlns:svg-compatible:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:chart', 'urn:oasis:names:tc:opendocument:xmlns:chart:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:dr3d', 'urn:oasis:names:tc:opendocument:xmlns:dr3d:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:math', 'http://www.w3.org/1998/Math/MathML');
            $Vze2ah1ycp2c->writeAttribute('xmlns:form', 'urn:oasis:names:tc:opendocument:xmlns:form:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:script', 'urn:oasis:names:tc:opendocument:xmlns:script:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:ooo', 'http://openoffice.org/2004/office');
            $Vze2ah1ycp2c->writeAttribute('xmlns:ooow', 'http://openoffice.org/2004/writer');
            $Vze2ah1ycp2c->writeAttribute('xmlns:oooc', 'http://openoffice.org/2004/calc');
            $Vze2ah1ycp2c->writeAttribute('xmlns:dom', 'http://www.w3.org/2001/xml-events');
            $Vze2ah1ycp2c->writeAttribute('xmlns:xforms', 'http://www.w3.org/2002/xforms');
            $Vze2ah1ycp2c->writeAttribute('xmlns:xsd', 'http://www.w3.org/2001/XMLSchema');
            $Vze2ah1ycp2c->writeAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
            $Vze2ah1ycp2c->writeAttribute('xmlns:rpt', 'http://openoffice.org/2005/report');
            $Vze2ah1ycp2c->writeAttribute('xmlns:of', 'urn:oasis:names:tc:opendocument:xmlns:of:1.2');
            $Vze2ah1ycp2c->writeAttribute('xmlns:xhtml', 'http://www.w3.org/1999/xhtml');
            $Vze2ah1ycp2c->writeAttribute('xmlns:grddl', 'http://www.w3.org/2003/g/data-view#');
            $Vze2ah1ycp2c->writeAttribute('xmlns:tableooo', 'http://openoffice.org/2009/table');
            $Vze2ah1ycp2c->writeAttribute('xmlns:field', 'urn:openoffice:names:experimental:ooo-ms-interop:xmlns:field:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:formx', 'urn:openoffice:names:experimental:ooxml-odf-interop:xmlns:form:1.0');
            $Vze2ah1ycp2c->writeAttribute('xmlns:css3t', 'http://www.w3.org/TR/css3-text/');
            $Vze2ah1ycp2c->writeAttribute('office:version', '1.2');

            $Vze2ah1ycp2c->writeElement('office:scripts');
            $Vze2ah1ycp2c->writeElement('office:font-face-decls');
            $Vze2ah1ycp2c->writeElement('office:automatic-styles');

            $Vze2ah1ycp2c->startElement('office:body');
                $Vze2ah1ycp2c->startElement('office:spreadsheet');
                    $Vze2ah1ycp2c->writeElement('table:calculation-settings');
                    $this->_writeSheets($Vze2ah1ycp2c);
                    $Vze2ah1ycp2c->writeElement('table:named-expressions');
                $Vze2ah1ycp2c->endElement();
            $Vze2ah1ycp2c->endElement();
        $Vze2ah1ycp2c->endElement();

        return $Vze2ah1ycp2c->getData();
    }

    
    private function _writeSheets(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c)
    {
        $V2ch40cq1nbr = $this->getParentWriter()->getPHPExcel(); 

        $Vrn4seqoummq = $V2ch40cq1nbr->getSheetCount();
        for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vrn4seqoummq; $Vfhiq1lhsoja++) {
            
            $Vze2ah1ycp2c->startElement('table:table');
                $Vze2ah1ycp2c->writeAttribute('table:name', $V2ch40cq1nbr->getSheet($Vfhiq1lhsoja)->getTitle());
                $Vze2ah1ycp2c->writeElement('office:forms');
                $Vze2ah1ycp2c->startElement('table:table-column');
                    $Vze2ah1ycp2c->writeAttribute('table:number-columns-repeated', self::NUMBER_COLS_REPEATED_MAX);
                $Vze2ah1ycp2c->endElement();
                $this->_writeRows($Vze2ah1ycp2c, $V2ch40cq1nbr->getSheet($Vfhiq1lhsoja));
            $Vze2ah1ycp2c->endElement();
        }
    }

    
    private function _writeRows(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c, PHPExcel_Worksheet $Vzg4jtrmmzdy)
    {
        $Vwwr5bw0dd34 = self::NUMBER_ROWS_REPEATED_MAX;
        $Vccpx3up5udm = 0;
        $Vx4bl4xivxk3 = $Vzg4jtrmmzdy->getRowIterator();
        while ($Vx4bl4xivxk3->valid()) {
            $Vwwr5bw0dd34--;
            $Vexbtekafkvl = $Vx4bl4xivxk3->current();
            if ($Vexbtekafkvl->getCellIterator()->valid()) {
                if ($Vccpx3up5udm) {
                    $Vze2ah1ycp2c->startElement('table:table-row');
                    if ($Vccpx3up5udm > 1) {
                        $Vze2ah1ycp2c->writeAttribute('table:number-rows-repeated', $Vccpx3up5udm);
                    }
                    $Vze2ah1ycp2c->startElement('table:table-cell');
                        $Vze2ah1ycp2c->writeAttribute('table:number-columns-repeated', self::NUMBER_COLS_REPEATED_MAX);
                    $Vze2ah1ycp2c->endElement();
                    $Vze2ah1ycp2c->endElement();
                    $Vccpx3up5udm = 0;
                }
                $Vze2ah1ycp2c->startElement('table:table-row');
                $this->_writeCells($Vze2ah1ycp2c, $Vexbtekafkvl);
                $Vze2ah1ycp2c->endElement();
            } else {
                $Vccpx3up5udm++;
            }
            $Vx4bl4xivxk3->next();
        }
    }

    
    private function _writeCells(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c, PHPExcel_Worksheet_Row $Vexbtekafkvl)
    {
        $Vor13zuwdcrk = self::NUMBER_COLS_REPEATED_MAX;
        $Vpskblzx02fc = -1;
        $V3rz1hdd5wih = $Vexbtekafkvl->getCellIterator();
        while ($V3rz1hdd5wih->valid()) {
            $Vblc1ueqvbti = $V3rz1hdd5wih->current();
            $Vn4q2p4mkwa0 = PHPExcel_Cell::columnIndexFromString($Vblc1ueqvbti->getColumn()) - 1;

            $this->_writeCellSpan($Vze2ah1ycp2c, $Vn4q2p4mkwa0, $Vpskblzx02fc);
            $Vze2ah1ycp2c->startElement('table:table-cell');

            switch ($Vblc1ueqvbti->getDataType()) {
                case PHPExcel_Cell_DataType::TYPE_BOOL:
                    $Vze2ah1ycp2c->writeAttribute('office:value-type', 'boolean');
                    $Vze2ah1ycp2c->writeAttribute('office:value', $Vblc1ueqvbti->getValue());
                    $Vze2ah1ycp2c->writeElement('text:p', $Vblc1ueqvbti->getValue());
                    break;

                case PHPExcel_Cell_DataType::TYPE_ERROR:
                    throw new PHPExcel_Writer_Exception('Writing of error not implemented yet.');
                    break;

                case PHPExcel_Cell_DataType::TYPE_FORMULA:
                    try {
                        $Vymgnvpdvtc1 = $Vblc1ueqvbti->getCalculatedValue();
                    } catch (Exception $Vnhm0uuykimv) {
                        $Vymgnvpdvtc1 = $Vblc1ueqvbti->getValue();
                    }
                    $Vze2ah1ycp2c->writeAttribute('table:formula', 'of:' . $Vblc1ueqvbti->getValue());
                    if (is_numeric($Vymgnvpdvtc1)) {
                        $Vze2ah1ycp2c->writeAttribute('office:value-type', 'float');
                    } else {
                        $Vze2ah1ycp2c->writeAttribute('office:value-type', 'string');
                    }
                    $Vze2ah1ycp2c->writeAttribute('office:value', $Vymgnvpdvtc1);
                    $Vze2ah1ycp2c->writeElement('text:p', $Vymgnvpdvtc1);
                    break;

                case PHPExcel_Cell_DataType::TYPE_INLINE:
                    throw new PHPExcel_Writer_Exception('Writing of inline not implemented yet.');
                    break;

                case PHPExcel_Cell_DataType::TYPE_NUMERIC:
                    $Vze2ah1ycp2c->writeAttribute('office:value-type', 'float');
                    $Vze2ah1ycp2c->writeAttribute('office:value', $Vblc1ueqvbti->getValue());
                    $Vze2ah1ycp2c->writeElement('text:p', $Vblc1ueqvbti->getValue());
                    break;

                case PHPExcel_Cell_DataType::TYPE_STRING:
                    $Vze2ah1ycp2c->writeAttribute('office:value-type', 'string');
                    $Vze2ah1ycp2c->writeElement('text:p', $Vblc1ueqvbti->getValue());
                    break;
            }
            PHPExcel_Writer_OpenDocument_Cell_Comment::write($Vze2ah1ycp2c, $Vblc1ueqvbti);
            $Vze2ah1ycp2c->endElement();
            $Vpskblzx02fc = $Vn4q2p4mkwa0;
            $V3rz1hdd5wih->next();
        }
        $Vor13zuwdcrk = $Vor13zuwdcrk - $Vpskblzx02fc - 1;
        if ($Vor13zuwdcrk > 0) {
            if ($Vor13zuwdcrk > 1) {
                $Vze2ah1ycp2c->startElement('table:table-cell');
                $Vze2ah1ycp2c->writeAttribute('table:number-columns-repeated', $Vor13zuwdcrk);
                $Vze2ah1ycp2c->endElement();
            } else {
                $Vze2ah1ycp2c->writeElement('table:table-cell');
            }
        }
    }

    
    private function _writeCellSpan(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c, $Vrh2rmdo4xgd, $Vqh02nszzgpm)
    {
        $Vyn0oxmudejv = $Vrh2rmdo4xgd - $Vqh02nszzgpm - 1;
        if (1 === $Vyn0oxmudejv) {
            $Vze2ah1ycp2c->writeElement('table:table-cell');
        } elseif ($Vyn0oxmudejv > 1) {
            $Vze2ah1ycp2c->startElement('table:table-cell');
                $Vze2ah1ycp2c->writeAttribute('table:number-columns-repeated', $Vyn0oxmudejv);
            $Vze2ah1ycp2c->endElement();
        }
    }
}
