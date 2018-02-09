<?php




class PHPExcel_Writer_PDF implements PHPExcel_Writer_IWriter
{

    
    private $Vmotsb4ulpiu = NULL;

    
    public function __construct(PHPExcel $Vlspthbp3hwz)
    {
        $Vm4uk35wv2ut = PHPExcel_Settings::getPdfRendererName();
        if (is_null($Vm4uk35wv2ut)) {
            throw new PHPExcel_Writer_Exception("PDF Rendering library has not been defined.");
        }

        $V2czk3gi3zyx = PHPExcel_Settings::getPdfRendererPath();
        if (is_null($Vm4uk35wv2ut)) {
            throw new PHPExcel_Writer_Exception("PDF Rendering library path has not been defined.");
        }
        $Vkjczu3r45wi = str_replace('\\', '/', get_include_path());
        $Vhpwduigl0c4 = str_replace('\\', '/', $V2czk3gi3zyx);
        if (strpos($Vhpwduigl0c4, $Vkjczu3r45wi) === false) {
            set_include_path(get_include_path() . PATH_SEPARATOR . $V2czk3gi3zyx);
        }

        $Vhgf0asmrdu1 = 'PHPExcel_Writer_PDF_' . $Vm4uk35wv2ut;
        $this->_renderer = new $Vhgf0asmrdu1($Vlspthbp3hwz);
    }


    
    public function __call($Vcvluzjs3wzb, $Vy2di2fo5jaz)
    {
        if ($this->_renderer === NULL) {
            throw new PHPExcel_Writer_Exception("PDF Rendering library has not been defined.");
        }

        return call_user_func_array(array($this->_renderer, $Vcvluzjs3wzb), $Vy2di2fo5jaz);
    }

    
    public function save($V1tltbb5c5oc = null)
    {
        $this->_renderer->save($V1tltbb5c5oc);
    }
}
