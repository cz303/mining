<?php




class PHPExcel_Writer_OpenDocument extends PHPExcel_Writer_Abstract implements PHPExcel_Writer_IWriter
{
    
    private $V3e00pmcah0o = array();

    
    private $Vt1vxk0the5n;

    
    public function __construct(PHPExcel $V2ch40cq1nbr = null)
    {
        $this->setPHPExcel($V2ch40cq1nbr);

        $Vwcwglu0wbgj = array(
            'content'    => 'PHPExcel_Writer_OpenDocument_Content',
            'meta'       => 'PHPExcel_Writer_OpenDocument_Meta',
            'meta_inf'   => 'PHPExcel_Writer_OpenDocument_MetaInf',
            'mimetype'   => 'PHPExcel_Writer_OpenDocument_Mimetype',
            'settings'   => 'PHPExcel_Writer_OpenDocument_Settings',
            'styles'     => 'PHPExcel_Writer_OpenDocument_Styles',
            'thumbnails' => 'PHPExcel_Writer_OpenDocument_Thumbnails'
        );

        foreach ($Vwcwglu0wbgj as $V3pinfvte0v0 => $Vtwwmjiiu40i) {
            $this->_writerParts[$V3pinfvte0v0] = new $Vtwwmjiiu40i($this);
        }
    }

    
    public function getWriterPart($V2ls4irtebsu = '')
    {
        if ($V2ls4irtebsu != '' && isset($this->_writerParts[strtolower($V2ls4irtebsu)])) {
            return $this->_writerParts[strtolower($V2ls4irtebsu)];
        } else {
            return null;
        }
    }

    
    public function save($V1tltbb5c5oc = NULL)
    {
        if (!$this->_spreadSheet) {
            throw new PHPExcel_Writer_Exception('PHPExcel object unassigned.');
        }

        
        $this->_spreadSheet->garbageCollect();

        
        $Vtlewjrx2nvb = $V1tltbb5c5oc;
        if (strtolower($V1tltbb5c5oc) == 'php://output' || strtolower($V1tltbb5c5oc) == 'php://stdout') {
            $V1tltbb5c5oc = @tempnam(PHPExcel_Shared_File::sys_get_temp_dir(), 'phpxltmp');
            if ($V1tltbb5c5oc == '') {
                $V1tltbb5c5oc = $Vtlewjrx2nvb;
            }
        }

        $Vd4u30euqerd = $this->_createZip($V1tltbb5c5oc);

        $Vd4u30euqerd->addFromString('META-INF/manifest.xml', $this->getWriterPart('meta_inf')->writeManifest());
        $Vd4u30euqerd->addFromString('Thumbnails/thumbnail.png', $this->getWriterPart('thumbnails')->writeThumbnail());
        $Vd4u30euqerd->addFromString('content.xml',  $this->getWriterPart('content')->write());
        $Vd4u30euqerd->addFromString('meta.xml',     $this->getWriterPart('meta')->write());
        $Vd4u30euqerd->addFromString('mimetype',     $this->getWriterPart('mimetype')->write());
        $Vd4u30euqerd->addFromString('settings.xml', $this->getWriterPart('settings')->write());
        $Vd4u30euqerd->addFromString('styles.xml',   $this->getWriterPart('styles')->write());

        
        if ($Vd4u30euqerd->close() === false) {
            throw new PHPExcel_Writer_Exception("Could not close zip file $V1tltbb5c5oc.");
        }

        
        if ($Vtlewjrx2nvb != $V1tltbb5c5oc) {
            if (copy($V1tltbb5c5oc, $Vtlewjrx2nvb) === false) {
                throw new PHPExcel_Writer_Exception("Could not copy temporary zip file $V1tltbb5c5oc to $Vtlewjrx2nvb.");
            }
            @unlink($V1tltbb5c5oc);
        }
    }

    
    private function _createZip($V1tltbb5c5oc)
    {
        
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
                throw new PHPExcel_Writer_Exception("Could not open $V1tltbb5c5oc for writing.");
            }
        }

        return $Vd4u30euqerd;
    }

    
    public function getPHPExcel()
    {
        if ($this->_spreadSheet !== null) {
            return $this->_spreadSheet;
        } else {
            throw new PHPExcel_Writer_Exception('No PHPExcel assigned.');
        }
    }

    
    public function setPHPExcel(PHPExcel $V2ch40cq1nbr = null)
    {
        $this->_spreadSheet = $V2ch40cq1nbr;
        return $this;
    }
}
