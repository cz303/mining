<?php



class Image_Cache {

  
  static protected $Vg5ibil1y2tl = array();
  
  
  public static $Vz0ll0uhihfp;

  
  static function resolve_url($Vbfatyoohaps, $V41yimklfqrl, $Vy4zba2jo55u, $Viwuq3qqv5zq) {
    $Vxdbe0sbfowy = explode_url($Vbfatyoohaps);
    $Vb0xezrtkohj = null;

    $Vivjmrneklnv = ($V41yimklfqrl && $V41yimklfqrl !== "file://") || ($Vxdbe0sbfowy['protocol'] != "");
    
    $V1xinfkwghad = strpos($Vxdbe0sbfowy['protocol'], "data:") === 0;

    try {
      
      
      if ( !DOMPDF_ENABLE_REMOTE && $Vivjmrneklnv && !$V1xinfkwghad ) {
        throw new DOMPDF_Image_Exception("DOMPDF_ENABLE_REMOTE is set to FALSE");
      } 
      
      
      else if ( DOMPDF_ENABLE_REMOTE && $Vivjmrneklnv || $V1xinfkwghad ) {
        
        $V1iz5sptdrq1 = build_url($V41yimklfqrl, $Vy4zba2jo55u, $Viwuq3qqv5zq, $Vbfatyoohaps);
  
        
        if ( isset(self::$Vg5ibil1y2tl[$V1iz5sptdrq1]) ) {
          $Vlwhsasa1325 = self::$Vg5ibil1y2tl[$V1iz5sptdrq1];
        }
        
        
        else {
          $Vlwhsasa1325 = tempnam(DOMPDF_TEMP_DIR, "ca_dompdf_img_");
  
          if ($V1xinfkwghad) {
            if ($Vrjmhmyudyyk = parse_data_uri($Vbfatyoohaps)) {
              $Vo4t2ytzfwtl = $Vrjmhmyudyyk['data'];
            }
          }
          else {
            $Vwdjpz0pyeo3 = set_error_handler("record_warnings");
            $Vo4t2ytzfwtl = file_get_contents($V1iz5sptdrq1);
            restore_error_handler();
          }
  
          
          if ( strlen($Vo4t2ytzfwtl) == 0 ) {
            $Vzjcdynyc23y = ($V1xinfkwghad ? "Data-URI could not be parsed" : "Image not found");
            throw new DOMPDF_Image_Exception($Vzjcdynyc23y);
          }
          
          
          else {
            
            
            
            
            
            file_put_contents($Vlwhsasa1325, $Vo4t2ytzfwtl);
          }
        }
      }
      
      
      else {
        $Vlwhsasa1325 = build_url($V41yimklfqrl, $Vy4zba2jo55u, $Viwuq3qqv5zq, $Vbfatyoohaps);
      }
  
  
      
      if ( !is_readable($Vlwhsasa1325) || !filesize($Vlwhsasa1325) ) {
        throw new DOMPDF_Image_Exception("Image not readable or empty");
      }
      
      
      else {
        list($Vojs2qdgagwv, $Vzo4g5xb4yip, $V4pigtpor0ln) = dompdf_getimagesize($Vlwhsasa1325);
        
        
        if ( $Vojs2qdgagwv && $Vzo4g5xb4yip && in_array($V4pigtpor0ln, array(IMAGETYPE_GIF, IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_BMP)) ) {
          
          
          if ( DOMPDF_ENABLE_REMOTE && $Vivjmrneklnv ) {
            self::$Vg5ibil1y2tl[$V1iz5sptdrq1] = $Vlwhsasa1325;
          }
        }
        
        
        else {
          throw new DOMPDF_Image_Exception("Image type unknown");
          unlink($Vlwhsasa1325);
        }
      }
    }
    catch(DOMPDF_Image_Exception $Vnhm0uuykimv) {
      $Vlwhsasa1325 = self::$Vz0ll0uhihfp;
      $V4pigtpor0ln = IMAGETYPE_PNG;
      $Vb0xezrtkohj = $Vnhm0uuykimv->getMessage()." \n $Vbfatyoohaps";
    }

    return array($Vlwhsasa1325, $V4pigtpor0ln, $Vb0xezrtkohj);
  }

  
  static function clear() {
    if ( empty(self::$Vg5ibil1y2tl) || DEBUGKEEPTEMP ) return;
    
    foreach ( self::$Vg5ibil1y2tl as $Vg5mhfl1beoi ) {
      if (DEBUGPNG) print "[clear unlink $Vg5mhfl1beoi]";
      unlink($Vg5mhfl1beoi);
    }
  }
  
  static function detect_type($Vg5mhfl1beoi) {
    list($Vojs2qdgagwv, $Vzo4g5xb4yip, $V4pigtpor0ln) = dompdf_getimagesize($Vg5mhfl1beoi);
    return $V4pigtpor0ln;
  }
  
  static function type_to_ext($V4pigtpor0ln) {
    $Vo4t2ytzfwtl_types = array(
      IMAGETYPE_GIF  => "gif",
      IMAGETYPE_PNG  => "png",
      IMAGETYPE_JPEG => "jpeg",
      IMAGETYPE_BMP  => "bmp",
    );
    
    return (isset($Vo4t2ytzfwtl_types[$V4pigtpor0ln]) ? $Vo4t2ytzfwtl_types[$V4pigtpor0ln] : null);
  }
  
  static function is_broken($Vbfatyoohaps) {
    return $Vbfatyoohaps === self::$Vz0ll0uhihfp;
  }
}

Image_Cache::$Vz0ll0uhihfp = DOMPDF_LIB_DIR . "/res/broken_image.png";
