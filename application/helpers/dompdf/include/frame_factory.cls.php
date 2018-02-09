<?php



class Frame_Factory {

  
  static function decorate_root(Frame $V4jn4msro4hf, DOMPDF $Vhygqjznl3ul) {
    $Vrlbsjbjglkb = new Page_Frame_Decorator($V4jn4msro4hf, $Vhygqjznl3ul);
    $Vrlbsjbjglkb->set_reflower( new Page_Frame_Reflower($Vrlbsjbjglkb) );
    $V4jn4msro4hf->set_decorator($Vrlbsjbjglkb);
    return $Vrlbsjbjglkb;
  }

   
  static function decorate_frame(Frame $Vrlbsjbjglkb, DOMPDF $Vhygqjznl3ul) {
    if ( is_null($Vhygqjznl3ul) )
      throw new Exception("foo");
      
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    
    switch ($Vdtcpflt5bhp->display) {
      
    case "block":
      $Vpwyfmngkrs3 = "Block";        
      $Vtrv15bav02e = "Block";
      $V0mshgqtkmks = "Block";
      break;
    
    case "inline-block":
      $Vpwyfmngkrs3 = "Inline";
      $Vtrv15bav02e = "Block";
      $V0mshgqtkmks = "Block";
      break;

    case "inline":
      $Vpwyfmngkrs3 = "Inline";
      if ( $Vrlbsjbjglkb->is_text_node() ) {
        $Vtrv15bav02e = "Text";
        $V0mshgqtkmks = "Text";
      } 
      else {
        if ( DOMPDF_ENABLE_CSS_FLOAT && $Vdtcpflt5bhp->float !== "none" ) {
          $Vtrv15bav02e = "Block";
          $V0mshgqtkmks = "Block";
        }
        else {
          $Vtrv15bav02e = "Inline";
          $V0mshgqtkmks = "Inline";
        }
      }
      break;   

    case "table":
      $Vpwyfmngkrs3 = "Block";
      $Vtrv15bav02e = "Table";
      $V0mshgqtkmks = "Table";
      break;
      
    case "inline-table":
      $Vpwyfmngkrs3 = "Inline";
      $Vtrv15bav02e = "Table";
      $V0mshgqtkmks = "Table";
      break;

    case "table-row-group":
    case "table-header-group":
    case "table-footer-group":
      $Vpwyfmngkrs3 = "Null";
      $Vtrv15bav02e = "Table_Row_Group";
      $V0mshgqtkmks = "Table_Row_Group";
      break;
      
    case "table-row":
      $Vpwyfmngkrs3 = "Null";
      $Vtrv15bav02e = "Table_Row";
      $V0mshgqtkmks = "Table_Row";
      break;

    case "table-cell":
      $Vpwyfmngkrs3 = "Table_Cell";
      $Vtrv15bav02e = "Table_Cell";
      $V0mshgqtkmks = "Table_Cell";
      break;
        
    case "list-item":
      $Vpwyfmngkrs3 = "Block";
      $Vtrv15bav02e  = "Block";
      $V0mshgqtkmks   = "Block";
      break;

    case "-dompdf-list-bullet":
      if ( $Vdtcpflt5bhp->list_style_position === "inside" )
        $Vpwyfmngkrs3 = "Inline";
      else        
        $Vpwyfmngkrs3 = "List_Bullet";

      if ( $Vdtcpflt5bhp->list_style_image !== "none" )
        $Vtrv15bav02e = "List_Bullet_Image";
      else
        $Vtrv15bav02e = "List_Bullet";
      
      $V0mshgqtkmks = "List_Bullet";
      break;

    case "-dompdf-image":
      $Vpwyfmngkrs3 = "Inline";
      $Vtrv15bav02e = "Image";
      $V0mshgqtkmks = "Image";
      break;
      
    case "-dompdf-br":
      $Vpwyfmngkrs3 = "Inline";
      $Vtrv15bav02e = "Inline";
      $V0mshgqtkmks = "Inline";
      break;

    default:
      
    case "none":
      $Vpwyfmngkrs3 = "Null";
      $Vtrv15bav02e = "Null";
      $V0mshgqtkmks = "Null";
      break;
    }

    
    $Vey0js2ss2mo = $Vdtcpflt5bhp->position;
    
    if ( $Vey0js2ss2mo === "absolute" )
      $Vpwyfmngkrs3 = "Absolute";

    else if ( $Vey0js2ss2mo === "fixed" )
      $Vpwyfmngkrs3 = "Fixed";
      
    
    $V24b0eq2omjx = $Vrlbsjbjglkb->get_node()->nodeName;
    
    if ( $V24b0eq2omjx === "img" ) {
      $Vdtcpflt5bhp->display = "-dompdf-image";
      $Vtrv15bav02e = "Image";
      $V0mshgqtkmks = "Image";
    }
  
    $Vpwyfmngkrs3 .= "_Positioner";
    $Vtrv15bav02e .= "_Frame_Decorator";
    $V0mshgqtkmks .= "_Frame_Reflower";

    $Vn0mq53c5jwe = new $Vtrv15bav02e($Vrlbsjbjglkb, $Vhygqjznl3ul);
    $Vn0mq53c5jwe->set_positioner( new $Vpwyfmngkrs3($Vn0mq53c5jwe) );
    $V5trunijrhf1 = new $V0mshgqtkmks($Vn0mq53c5jwe);
    
    $Vn0mq53c5jwe->set_reflower( $V5trunijrhf1 );
    
    return $Vn0mq53c5jwe;
  }
}
