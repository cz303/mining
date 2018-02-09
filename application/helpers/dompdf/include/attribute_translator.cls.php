<?php



class Attribute_Translator {
  static $Vgyuc4fibkd0 = "_html_style_attribute";
  
  
  
  
  static private $Vnxw2o1x2qvw = array(
    
    'img' => array(
      'align' => array(
        'bottom' => 'vertical-align: baseline;',
        'middle' => 'vertical-align: middle;',
        'top'    => 'vertical-align: top;',
        'left'   => 'float: left;',
        'right'  => 'float: right;'
      ),
      'border' => 'border-width: %0.2F px;',
      'height' => 'height: %s px;',
      'hspace' => 'padding-left: %1$0.2F px; padding-right: %1$0.2F px;',
      'vspace' => 'padding-top: %1$0.2F px; padding-bottom: %1$0.2F px;',
      'width'  => 'width: %s px;',
    ),
    'table' => array(
      'align' => array(
        'left'   => 'margin-left: 0; margin-right: auto;',
        'center' => 'margin-left: auto; margin-right: auto;',
        'right'  => 'margin-left: auto; margin-right: 0;'
      ),
      'bgcolor' => 'background-color: %s;',
      'border' => '!set_table_border',
      'cellpadding' => '!set_table_cellpadding',
      'cellspacing' => '!set_table_cellspacing',
      'frame' => array(
        'void'   => 'border-style: none;',
        'above'  => 'border-top-style: solid;',
        'below'  => 'border-bottom-style: solid;',
        'hsides' => 'border-left-style: solid; border-right-style: solid;',
        'vsides' => 'border-top-style: solid; border-bottom-style: solid;',
        'lhs'    => 'border-left-style: solid;',
        'rhs'    => 'border-right-style: solid;',
        'box'    => 'border-style: solid;',
        'border' => 'border-style: solid;'
      ),
      'rules' => '!set_table_rules',
      'width' => 'width: %s;',
    ),
    'hr' => array(
      'align'   => '!set_hr_align', 
      'noshade' => 'border-style: solid;',
      'size'    => '!set_hr_size', 
      'width'   => 'width: %s;',
    ),
    'div' => array(
      'align' => 'text-align: %s;',
    ),
    'h1' => array(
      'align' => 'text-align: %s;',
    ),
    'h2' => array(
      'align' => 'text-align: %s;',
    ),
    'h3' => array(
      'align' => 'text-align: %s;',
    ),
    'h4' => array(
      'align' => 'text-align: %s;',
    ),
    'h5' => array(
      'align' => 'text-align: %s;',
    ),
    'h6' => array(
      'align' => 'text-align: %s;',
    ),
    'p' => array(
      'align' => 'text-align: %s;',
    ),








    'tbody' => array(
      'align'  => '!set_table_row_align',
      'valign' => '!set_table_row_valign',
    ),
    'td' => array(
      'align'   => 'text-align: %s;',
      'bgcolor' => '!set_background_color',
      'height'  => 'height: %s;',
      'nowrap'  => 'white-space: nowrap;',
      'valign'  => 'vertical-align: %s;',
      'width'   => 'width: %s;',
    ),
    'tfoot' => array(
      'align'   => '!set_table_row_align',
      'valign'  => '!set_table_row_valign',
    ),
    'th' => array(
      'align'   => 'text-align: %s;',
      'bgcolor' => '!set_background_color',
      'height'  => 'height: %s;',
      'nowrap'  => 'white-space: nowrap;',
      'valign'  => 'vertical-align: %s;',
      'width'   => 'width: %s;',
    ),
    'thead' => array(
      'align'   => '!set_table_row_align',
      'valign'  => '!set_table_row_valign',
    ),
    'tr' => array(
      'align'   => '!set_table_row_align',
      'bgcolor' => '!set_table_row_bgcolor',
      'valign'  => '!set_table_row_valign',
    ),
    'body' => array(
      'background' => 'background-image: url(%s);',
      'bgcolor'    => '!set_background_color',
      'link'       => '!set_body_link',
      'text'       => '!set_color',
    ),
    'br' => array(
      'clear' => 'clear: %s;',
    ),
    'basefont' => array(
      'color' => '!set_color',
      'face'  => 'font-family: %s;',
      'size'  => '!set_basefont_size',
    ),
    'font' => array(
      'color' => '!set_color',
      'face'  => 'font-family: %s;',
      'size'  => '!set_font_size',
    ),
    'dir' => array(
      'compact' => 'margin: 0.5em 0;',
    ),
    'dl' => array(
      'compact' => 'margin: 0.5em 0;',
    ),
    'menu' => array(
      'compact' => 'margin: 0.5em 0;',
    ),
    'ol' => array(
      'compact' => 'margin: 0.5em 0;',
      'start'   => 'counter-reset: -dompdf-default-counter %d;',
      'type'    => 'list-style-type: %s;',
    ),
    'ul' => array(
      'compact' => 'margin: 0.5em 0;',
      'type'    => 'list-style-type: %s;',
    ),
    'li' => array(
      'type'    => 'list-style-type: %s;',
      'value'   => 'counter-reset: -dompdf-default-counter %d;',
    ),
    'pre' => array(
      'width' => 'width: %s;',
    ),
  );
  
  static protected $Vpytfdbpzbeb = 3;
  static protected $Vehnbxdheia1 = array(
    
    -3 => "4pt", 
    -2 => "5pt", 
    -1 => "6pt", 
     0 => "7pt", 
    
     1 => "8pt",
     2 => "10pt",
     3 => "12pt",
     4 => "14pt",
     5 => "18pt",
     6 => "24pt",
     7 => "34pt",
     
    
     8 => "48pt", 
     9 => "44pt", 
    10 => "52pt", 
    11 => "60pt", 
  );
  
  
  static function translate_attributes(Frame $Vrlbsjbjglkb) {
    $V1en3qe0uyt3 = $Vrlbsjbjglkb->get_node();
    $Vhiuc0dwei5b = $V1en3qe0uyt3->tagName;

    if ( !isset(self::$Vnxw2o1x2qvw[$Vhiuc0dwei5b]) )
      return;

    $Vfw0jspukuls = self::$Vnxw2o1x2qvw[$Vhiuc0dwei5b];
    $V0xz05klcoiy = $V1en3qe0uyt3->attributes;
    $Vdtcpflt5bhp = rtrim($V1en3qe0uyt3->getAttribute(self::$Vgyuc4fibkd0), "; ");
    if ( $Vdtcpflt5bhp != "" )
      $Vdtcpflt5bhp .= ";";

    foreach ($V0xz05klcoiy as $V5v3aao2lape => $V5v3aao2lape_node ) {
      if ( !isset($Vfw0jspukuls[$V5v3aao2lape]) )
        continue;

      $Vp4xjtpabm0l = $V5v3aao2lape_node->value;

      $V33moylxy2vn = $Vfw0jspukuls[$V5v3aao2lape];
      
      
      if ( is_array($V33moylxy2vn) ) {

        if ( isset($V33moylxy2vn[$Vp4xjtpabm0l]) )
          $Vdtcpflt5bhp .= " " . self::_resolve_target($V1en3qe0uyt3, $V33moylxy2vn[$Vp4xjtpabm0l], $Vp4xjtpabm0l);

      } else {
        
        $Vdtcpflt5bhp .= " " . self::_resolve_target($V1en3qe0uyt3, $V33moylxy2vn, $Vp4xjtpabm0l);
      }
    }
    
    if ( !is_null($Vdtcpflt5bhp) ) {
      $Vdtcpflt5bhp = ltrim($Vdtcpflt5bhp);
      $V1en3qe0uyt3->setAttribute(self::$Vgyuc4fibkd0, $Vdtcpflt5bhp);
    }
    
  }

  static protected function _resolve_target($V1en3qe0uyt3, $V33moylxy2vn, $Vp4xjtpabm0l) {
    if ( $V33moylxy2vn[0] === "!" ) {
      
      $Vcxt1ln5llz3 = "_" . mb_substr($V33moylxy2vn, 1);
      return self::$Vcxt1ln5llz3($V1en3qe0uyt3, $Vp4xjtpabm0l);
    }
    
    return $Vp4xjtpabm0l ? sprintf($V33moylxy2vn, $Vp4xjtpabm0l) : "";
  }
  
  static function append_style(DOMNode $V1en3qe0uyt3, $V2ycjfidoqpc) {
    $Vdtcpflt5bhp = rtrim($V1en3qe0uyt3->getAttribute(self::$Vgyuc4fibkd0), ";");
    $Vdtcpflt5bhp .= $V2ycjfidoqpc;
    $Vdtcpflt5bhp = ltrim($Vdtcpflt5bhp, ";");
    $V1en3qe0uyt3->setAttribute(self::$Vgyuc4fibkd0, $Vdtcpflt5bhp);
  }
  
  static protected function get_cell_list($V1en3qe0uyt3) {
    $V3peids5jcyq = new DOMXpath($V1en3qe0uyt3->ownerDocument);
    
    switch($V1en3qe0uyt3->nodeName) {
      case "table":
        $Vuq34jlhekzm = "tr/td | thead/tr/td | tbody/tr/td | tfoot/tr/td | tr/th | thead/tr/th | tbody/tr/th | tfoot/tr/th";
        break;
        
      case "tbody":
      case "tfoot":
      case "thead":
        $Vuq34jlhekzm = "tr/td | tr/th";
        break;
        
      case "tr":
        $Vuq34jlhekzm = "td | th";
        break;
    }
    
    return $V3peids5jcyq->query($Vuq34jlhekzm, $V1en3qe0uyt3);
  } 

  
  
  static protected function _get_valid_color($Vp4xjtpabm0l) {
    if ( preg_match('/^#?([0-9A-F]{6})$/i', $Vp4xjtpabm0l, $Vt3xexsia3ta) ) {
      $Vp4xjtpabm0l = "#$Vt3xexsia3ta[1]";
    }
    
    return $Vp4xjtpabm0l;
  }

  static protected function _set_color($V1en3qe0uyt3, $Vp4xjtpabm0l) {
    $Vp4xjtpabm0l = self::_get_valid_color($Vp4xjtpabm0l);
    return "color: $Vp4xjtpabm0l;";
  }

  static protected function _set_background_color($V1en3qe0uyt3, $Vp4xjtpabm0l) {
    $Vp4xjtpabm0l = self::_get_valid_color($Vp4xjtpabm0l);
    return "background-color: $Vp4xjtpabm0l;";
  }

  static protected function _set_table_cellpadding($V1en3qe0uyt3, $Vp4xjtpabm0l) {
    $Vnshmhdtxfys = self::get_cell_list($V1en3qe0uyt3);
    
    foreach ($Vnshmhdtxfys as $Vblc1ueqvbti) {
      self::append_style($Vblc1ueqvbti, "; padding: {$Vp4xjtpabm0l}px;");
    }
    
    return null;
  }

  static protected function _set_table_border($V1en3qe0uyt3, $Vp4xjtpabm0l) {
    $Vnshmhdtxfys = self::get_cell_list($V1en3qe0uyt3);

    foreach ($Vnshmhdtxfys as $Vblc1ueqvbti) {
      $Vdtcpflt5bhp = rtrim($Vblc1ueqvbti->getAttribute(self::$Vgyuc4fibkd0));
      $Vdtcpflt5bhp .= "; border-width: " . ($Vp4xjtpabm0l > 0 ? 1 : 0) . "pt; border-style: inset;";
      $Vdtcpflt5bhp = ltrim($Vdtcpflt5bhp, ";");
      $Vblc1ueqvbti->setAttribute(self::$Vgyuc4fibkd0, $Vdtcpflt5bhp);
    }
    
    $Vdtcpflt5bhp = rtrim($V1en3qe0uyt3->getAttribute(self::$Vgyuc4fibkd0), ";");
    $Vdtcpflt5bhp .= "; border-width: $Vp4xjtpabm0l" . "px; ";
    return ltrim($Vdtcpflt5bhp, "; ");
  }

  static protected function _set_table_cellspacing($V1en3qe0uyt3, $Vp4xjtpabm0l) {
    $Vdtcpflt5bhp = rtrim($V1en3qe0uyt3->getAttribute(self::$Vgyuc4fibkd0), ";");

    if ( $Vp4xjtpabm0l == 0 )
      $Vdtcpflt5bhp .= "; border-collapse: collapse;";
      
    else
      $Vdtcpflt5bhp .= "; border-spacing: {$Vp4xjtpabm0l}px; border-collapse: separate;";
      
    return ltrim($Vdtcpflt5bhp, ";");
  }
  
  static protected function _set_table_rules($V1en3qe0uyt3, $Vp4xjtpabm0l) {
    $V2ycjfidoqpc = "; border-collapse: collapse;";
    switch ($Vp4xjtpabm0l) {
    case "none":
      $V2ycjfidoqpc .= "border-style: none;";
      break;

    case "groups":
      
      return;

    case "rows":
      $V2ycjfidoqpc .= "border-style: solid none solid none; border-width: 1px; ";
      break;

    case "cols":
      $V2ycjfidoqpc .= "border-style: none solid none solid; border-width: 1px; ";
      break;

    case "all":
      $V2ycjfidoqpc .= "border-style: solid; border-width: 1px; ";
      break;
      
    default:
      
      return null;
    }

    $Vnshmhdtxfys = self::get_cell_list($V1en3qe0uyt3);
    
    foreach ($Vnshmhdtxfys as $Vblc1ueqvbti) {
      $Vdtcpflt5bhp = $Vblc1ueqvbti->getAttribute(self::$Vgyuc4fibkd0);
      $Vdtcpflt5bhp .= $V2ycjfidoqpc;
      $Vblc1ueqvbti->setAttribute(self::$Vgyuc4fibkd0, $Vdtcpflt5bhp);
    }
    
    $Vdtcpflt5bhp = rtrim($V1en3qe0uyt3->getAttribute(self::$Vgyuc4fibkd0), ";");
    $Vdtcpflt5bhp .= "; border-collapse: collapse; ";
    
    return ltrim($Vdtcpflt5bhp, "; ");
  }

  static protected function _set_hr_size($V1en3qe0uyt3, $Vp4xjtpabm0l) {
    $Vdtcpflt5bhp = rtrim($V1en3qe0uyt3->getAttribute(self::$Vgyuc4fibkd0), ";");
    $Vdtcpflt5bhp .= "; border-width: ".max(0, $Vp4xjtpabm0l-2)."; ";
    return ltrim($Vdtcpflt5bhp, "; ");
  }

  static protected function _set_hr_align($V1en3qe0uyt3, $Vp4xjtpabm0l) {
    $Vdtcpflt5bhp = rtrim($V1en3qe0uyt3->getAttribute(self::$Vgyuc4fibkd0),";");
    $Vojs2qdgagwv = $V1en3qe0uyt3->getAttribute("width");
    if ( $Vojs2qdgagwv == "" )
      $Vojs2qdgagwv = "100%";

    $V5injyunrq2k = 100 - (double)rtrim($Vojs2qdgagwv, "% ");
    
    switch ($Vp4xjtpabm0l) {
    case "left":
      $Vdtcpflt5bhp .= "; margin-right: $V5injyunrq2k %;";
      break;

    case "right":
      $Vdtcpflt5bhp .= "; margin-left: $V5injyunrq2k %;";
      break;

    case "center":
      $Vdtcpflt5bhp .= "; margin-left: auto; margin-right: auto;";
      break;

    default:
      return null;
    }
    return ltrim($Vdtcpflt5bhp, "; ");
  }

  static protected function _set_table_row_align($V1en3qe0uyt3, $Vp4xjtpabm0l) {
    $Vnshmhdtxfys = self::get_cell_list($V1en3qe0uyt3);

    foreach ($Vnshmhdtxfys as $Vblc1ueqvbti) {
      self::append_style($Vblc1ueqvbti, "; text-align: $Vp4xjtpabm0l;");
    }

    return null;
  }

  static protected function _set_table_row_valign($V1en3qe0uyt3, $Vp4xjtpabm0l) {
    $Vnshmhdtxfys = self::get_cell_list($V1en3qe0uyt3);

    foreach ($Vnshmhdtxfys as $Vblc1ueqvbti) {
      self::append_style($Vblc1ueqvbti, "; vertical-align: $Vp4xjtpabm0l;");
    }

    return null;
  }

  static protected function _set_table_row_bgcolor($V1en3qe0uyt3, $Vp4xjtpabm0l) {
    $Vnshmhdtxfys = self::get_cell_list($V1en3qe0uyt3);
    $Vp4xjtpabm0l = self::_get_valid_color($Vp4xjtpabm0l);
    
    foreach ($Vnshmhdtxfys as $Vblc1ueqvbti) {
      self::append_style($Vblc1ueqvbti, "; background-color: $Vp4xjtpabm0l;");
    }

    return null;
  }

  static protected function _set_body_link($V1en3qe0uyt3, $Vp4xjtpabm0l) {
    $Vgt40iftwo24 = $V1en3qe0uyt3->getElementsByTagName("a");
    $Vp4xjtpabm0l = self::_get_valid_color($Vp4xjtpabm0l);
    
    foreach ($Vgt40iftwo24 as $Vi3y3l1uvwp3) {
      self::append_style($Vi3y3l1uvwp3, "; color: $Vp4xjtpabm0l;");
    }

    return null;
  }

  static protected function _set_basefont_size($V1en3qe0uyt3, $Vp4xjtpabm0l) {
    
    
    self::$Vpytfdbpzbeb = $Vp4xjtpabm0l;
    return null;
  }
  
  static protected function _set_font_size($V1en3qe0uyt3, $Vp4xjtpabm0l) {
    $Vdtcpflt5bhp = $V1en3qe0uyt3->getAttribute(self::$Vgyuc4fibkd0);

    if ( $Vp4xjtpabm0l[0] === "-" || $Vp4xjtpabm0l[0] === "+" )
      $Vp4xjtpabm0l = self::$Vpytfdbpzbeb + (int)$Vp4xjtpabm0l;

    if ( isset(self::$Vehnbxdheia1[$Vp4xjtpabm0l]) )
      $Vdtcpflt5bhp .= "; font-size: " . self::$Vehnbxdheia1[$Vp4xjtpabm0l] . ";";
    else
      $Vdtcpflt5bhp .= "; font-size: $Vp4xjtpabm0l;";

    return ltrim($Vdtcpflt5bhp, "; ");
  }
}
