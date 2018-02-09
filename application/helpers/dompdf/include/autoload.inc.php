<?php

 

function DOMPDF_autoload($Vtwwmjiiu40i) {
  $Vv0mtkrhebac = DOMPDF_INC_DIR . "/" . mb_strtolower($Vtwwmjiiu40i) . ".cls.php";
  
  if ( is_file($Vv0mtkrhebac) )
    require_once($Vv0mtkrhebac);
}


if ( function_exists("spl_autoload_register") ) {
  $Vbsgjco4nxgx = "DOMPDF_autoload";
  $Vswf1wkslt2f = spl_autoload_functions();
  
  
  if ( !DOMPDF_AUTOLOAD_PREPEND || $Vswf1wkslt2f === false ) {
    spl_autoload_register($Vbsgjco4nxgx); 
  }
  
  
  else if ( PHP_VERSION_ID >= 50300 ) {
    spl_autoload_register($Vbsgjco4nxgx, true, true); 
  }
  
  else {
    
    $V3dmyb55egoz = (PHP_VERSION_ID <= 50102 && PHP_VERSION_ID >= 50100);
              
    foreach ($Vswf1wkslt2f as $Vcxt1ln5llz3) { 
      if (is_array($Vcxt1ln5llz3)) { 
        
        
        $Vnfwe5xhrotx = new ReflectionMethod($Vcxt1ln5llz3[0], $Vcxt1ln5llz3[1]); 
        if (!$Vnfwe5xhrotx->isStatic()) { 
          throw new Exception('This function is not compatible with non-static object methods due to PHP Bug #44144.'); 
        }
        
        
        
        if ($V3dmyb55egoz) $Vcxt1ln5llz3 = implode('::', $Vcxt1ln5llz3); 
      }
      
      spl_autoload_unregister($Vcxt1ln5llz3); 
    }
    
    
    spl_autoload_register($Vbsgjco4nxgx); 
    
    
    foreach ($Vswf1wkslt2f as $Vcxt1ln5llz3) { 
      spl_autoload_register($Vcxt1ln5llz3); 
    }
    
    
    if ( function_exists("__autoload") ) {
      spl_autoload_register("__autoload");
    }
  }
}

else if ( !function_exists("__autoload") ) {
  
  function __autoload($Vtwwmjiiu40i) {
    DOMPDF_autoload($Vtwwmjiiu40i);
  }
}
