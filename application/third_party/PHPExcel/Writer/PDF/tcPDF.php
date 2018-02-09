<?php




$Vlvbyymgu3b4 = PHPExcel_Settings::getPdfRendererPath() . '/tcpdf.php';
if (file_exists($Vlvbyymgu3b4)) {
    $Vqvn3lb1aswh = PHPExcel_Settings::getPdfRendererPath();
    require_once $Vlvbyymgu3b4;
} else {
    throw new PHPExcel_Writer_Exception('Unable to load PDF Rendering library');
}


class PHPExcel_Writer_PDF_tcPDF extends PHPExcel_Writer_PDF_Core implements PHPExcel_Writer_IWriter
{
    
    public function __construct(PHPExcel $Vlspthbp3hwz)
    {
        parent::__construct($Vlspthbp3hwz);
    }

    
    public function save($V1tltbb5c5oc = NULL)
    {
        $Vsg4lebcui4l = parent::prepareForSave($V1tltbb5c5oc);

        
        $Vbs1o2ly1hh3 = 'LETTER';    

        
        if (is_null($this->getSheetIndex())) {
            $Viltsyxewtah = ($this->_phpExcel->getSheet(0)->getPageSetup()->getOrientation()
                == PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE)
                    ? 'L'
                    : 'P';
            $Vkocu2p32uyh = $this->_phpExcel->getSheet(0)->getPageSetup()->getPaperSize();
            $Vfdygaakbpgm = $this->_phpExcel->getSheet(0)->getPageMargins();
        } else {
            $Viltsyxewtah = ($this->_phpExcel->getSheet($this->getSheetIndex())->getPageSetup()->getOrientation()
                == PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE)
                    ? 'L'
                    : 'P';
            $Vkocu2p32uyh = $this->_phpExcel->getSheet($this->getSheetIndex())->getPageSetup()->getPaperSize();
            $Vfdygaakbpgm = $this->_phpExcel->getSheet($this->getSheetIndex())->getPageMargins();
        }

        
        if (!is_null($this->getOrientation())) {
            $Viltsyxewtah = ($this->getOrientation() == PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE)
                ? 'L'
                : 'P';
        }
        
        if (!is_null($this->getPaperSize())) {
            $Vkocu2p32uyh = $this->getPaperSize();
        }

        if (isset(self::$Vsr4fnqzou2m[$Vkocu2p32uyh])) {
            $Vbs1o2ly1hh3 = self::$Vsr4fnqzou2m[$Vkocu2p32uyh];
        }


        
        $Vxj5miiauhxo = new TCPDF($Viltsyxewtah, 'pt', $Vbs1o2ly1hh3);
        $Vxj5miiauhxo->setFontSubsetting(FALSE);
        
        $Vxj5miiauhxo->SetMargins($Vfdygaakbpgm->getLeft() * 72, $Vfdygaakbpgm->getTop() * 72, $Vfdygaakbpgm->getRight() * 72);
        $Vxj5miiauhxo->SetAutoPageBreak(TRUE, $Vfdygaakbpgm->getBottom() * 72);

        $Vxj5miiauhxo->setPrintHeader(FALSE);
        $Vxj5miiauhxo->setPrintFooter(FALSE);

        $Vxj5miiauhxo->AddPage();

        
        $Vxj5miiauhxo->SetFont($this->getFont());
        $Vxj5miiauhxo->writeHTML(
            $this->generateHTMLHeader(FALSE) .
            $this->generateSheetData() .
            $this->generateHTMLFooter()
        );

        
        $Vxj5miiauhxo->SetTitle($this->_phpExcel->getProperties()->getTitle());
        $Vxj5miiauhxo->SetAuthor($this->_phpExcel->getProperties()->getCreator());
        $Vxj5miiauhxo->SetSubject($this->_phpExcel->getProperties()->getSubject());
        $Vxj5miiauhxo->SetKeywords($this->_phpExcel->getProperties()->getKeywords());
        $Vxj5miiauhxo->SetCreator($this->_phpExcel->getProperties()->getCreator());

        
        fwrite($Vsg4lebcui4l, $Vxj5miiauhxo->output($V1tltbb5c5oc, 'S'));

		parent::restoreStateAfterSave($Vsg4lebcui4l);
    }

}
