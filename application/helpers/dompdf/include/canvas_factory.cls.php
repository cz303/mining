<?php



class Canvas_Factory {

  
  private function __construct() { }

  
  static function get_instance($Vrkqqtfn4q2f = null, $Viltsyxewtah = null,  $Vtwwmjiiu40i = null) {

    $Vohwvurcs1zn = strtolower(DOMPDF_PDF_BACKEND);
    
    if ( isset($Vtwwmjiiu40i) && class_exists($Vtwwmjiiu40i, false) )
      $Vtwwmjiiu40i .= "_Adapter";
    
    else if ( (DOMPDF_PDF_BACKEND === "auto" || $Vohwvurcs1zn === "pdflib" ) &&
              class_exists("PDFLib", false) )
      $Vtwwmjiiu40i = "PDFLib_Adapter";

    
    
    

    else if ( $Vohwvurcs1zn === "tcpdf")
      $Vtwwmjiiu40i = "TCPDF_Adapter";
      
    else if ( $Vohwvurcs1zn === "gd" )
      $Vtwwmjiiu40i = "GD_Adapter";
    
    else
      $Vtwwmjiiu40i = "CPDF_Adapter";

    return new $Vtwwmjiiu40i($Vrkqqtfn4q2f, $Viltsyxewtah);
        
  }
}
