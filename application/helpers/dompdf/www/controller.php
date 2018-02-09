<?php 

session_start();

$V3zmm2yxwbze = isset($_GET["cmd"]) ? $_GET["cmd"] : null;

include "../dompdf_config.inc.php";
include "functions.inc.php";

switch ($V3zmm2yxwbze) {
  case "clear-font-cache":
    $Vuvdyzan5vxw = glob(DOMPDF_FONT_DIR."*.{UFM,AFM,ufm,afm}.php", GLOB_BRACE);
    foreach($Vuvdyzan5vxw as $Vg5mhfl1beoi) {
      unlink($Vg5mhfl1beoi);
    }
  break;
  
  case "install-font":
    if (!auth_ok()) break;
    
    $Vt5aj1423wg2 = $_POST["family"];
    $Vou4vxorrdoe = $_FILES["file"];
    
    foreach($Vou4vxorrdoe["error"] as $Vcvluzjs3wzb => $Vyrkodvljby0) {
      if ($Vyrkodvljby0) {
        switch($Vyrkodvljby0) {
          case UPLOAD_ERR_INI_SIZE:
          case UPLOAD_ERR_FORM_SIZE:
            echo "The uploaded file exceeds the upload_max_filesize directive in php.ini."; break;
          case UPLOAD_ERR_PARTIAL: 
            echo "The uploaded file was only partially uploaded."; break;
          case UPLOAD_ERR_NO_FILE: 
            break;
          case UPLOAD_ERR_NO_TMP_DIR: 
            echo "Missing a temporary folder."; break;
          default: 
            echo "Unknown error";
        }
        continue;
      }
      
      $Vqmxa0npsfod = "normal";
      $Vdtcpflt5bhp  = "normal";
      
      switch($Vcvluzjs3wzb) {
        case "bold":   
          $Vqmxa0npsfod = "bold"; break;
          
        case "italic": 
          $Vdtcpflt5bhp  = "italic"; break;
          
        case "bold_italic": 
          $Vqmxa0npsfod = "bold";
          $Vdtcpflt5bhp  = "italic"; 
        break;
      }
      
      $Vdtcpflt5bhp_arr = array(
        "family" => $Vt5aj1423wg2,
        "weight" => $Vqmxa0npsfod,
        "style"  => $Vdtcpflt5bhp,
      );
      
      Font_Metrics::init();
      
      if (!Font_Metrics::register_font($Vdtcpflt5bhp_arr, $Vou4vxorrdoe["tmp_name"][$Vcvluzjs3wzb])) {
        echo $Vou4vxorrdoe["name"][$Vcvluzjs3wzb]." is not a valid font file";
      }
      else {
        echo "The <strong>$Vt5aj1423wg2 $Vqmxa0npsfod $Vdtcpflt5bhp</strong> font was successfully installed !<br />";
      }
    }
  break;
}