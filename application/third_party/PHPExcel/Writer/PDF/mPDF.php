<?php




$Vlvbyymgu3b4 = PHPExcel_Settings::getPdfRendererPath() . '/mpdf.php';
if (file_exists($Vlvbyymgu3b4)) {
    require_once $Vlvbyymgu3b4;
} else {
    throw new PHPExcel_Writer_Exception('Unable to load PDF Rendering library');
}


class PHPExcel_Writer_PDF_mPDF extends PHPExcel_Writer_PDF_Core implements PHPExcel_Writer_IWriter
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
        $this->setOrientation($Viltsyxewtah);

        
        if (!is_null($this->getOrientation())) {
            $Viltsyxewtah = ($this->getOrientation() == PHPExcel_Worksheet_PageSetup::ORIENTATION_DEFAULT)
                ? PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT
                : $this->getOrientation();
        }
        $Viltsyxewtah = strtoupper($Viltsyxewtah);

        
        if (!is_null($this->getPaperSize())) {
            $Vkocu2p32uyh = $this->getPaperSize();
        }

        if (isset(self::$Vsr4fnqzou2m[$Vkocu2p32uyh])) {
            $Vbs1o2ly1hh3 = self::$Vsr4fnqzou2m[$Vkocu2p32uyh];
        }

        
        $Vxj5miiauhxo = new mpdf();
        $Voy5t5bkn1lm = $Viltsyxewtah;
        $Vxj5miiauhxo->_setPageSize(strtoupper($Vbs1o2ly1hh3), $Voy5t5bkn1lm);
        $Vxj5miiauhxo->DefOrientation = $Viltsyxewtah;
        $Vxj5miiauhxo->AddPage($Viltsyxewtah);

        
        $Vxj5miiauhxo->SetTitle($this->_phpExcel->getProperties()->getTitle());
        $Vxj5miiauhxo->SetAuthor($this->_phpExcel->getProperties()->getCreator());
        $Vxj5miiauhxo->SetSubject($this->_phpExcel->getProperties()->getSubject());
        $Vxj5miiauhxo->SetKeywords($this->_phpExcel->getProperties()->getKeywords());
        $Vxj5miiauhxo->SetCreator($this->_phpExcel->getProperties()->getCreator());

        $Vxj5miiauhxo->WriteHTML(
            $this->generateHTMLHeader(FALSE) .
            $this->generateSheetData() .
            $this->generateHTMLFooter()
        );

        
        fwrite($Vsg4lebcui4l, $Vxj5miiauhxo->Output('', 'S'));

		parent::restoreStateAfterSave($Vsg4lebcui4l);
    }

}
