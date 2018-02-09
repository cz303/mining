<?php



class Style {
  
  const CSS_IDENTIFIER = "-?[_a-zA-Z]+[_a-zA-Z0-9-]*";
  const CSS_INTEGER    = "-?\d+";

  
  static $Vrczc1yymiyd = 12;

  
  static $Vuxex3zhuo4a = 1.2;
  
  
  static $Vstpp25swdpl = array(
    "xx-small" => 0.6,   
    "x-small"  => 0.75,  
    "small"    => 0.889, 
    "medium"   => 1,     
    "large"    => 1.2,   
    "x-large"  => 1.5,   
    "xx-large" => 2.0,   
  );
  
  
  static $Vtttdeaid2sg = array("inline");

  
  static $Voxmdkoroy5i = array("block", "inline-block", "table-cell", "list-item");
  
  
  static $V5lhbxo0xwph = array("relative", "absolute", "fixed");

  
  static $Vi35fejo31gm = array("table", "inline-table");

  
  static $Vg1yfrcrtjk3 = array("none", "hidden", "dotted", "dashed", "solid",
                                "double", "groove", "ridge", "inset", "outset");

  
  static protected $V2zslaclzvum = null;

  
  static protected $Vweemanskfb4 = null;
  
  
  static protected $Vchko1lhtqmo = array();

  
  protected $Vzyabrjlooet; 

  
  protected $V5esydyeia1o;

  
  protected $Vcjs2yg3o50t;

  
  protected $Vh35o0af440b;
  
  
  protected $V3tzeasz3hbk; 
  
  
  protected $Vvvuswijwhvo;
  
  
  protected $Vqd4r4eb3fpl = Stylesheet::ORIG_AUTHOR;
  
  
  
  private $Vubl5331nkiw; 
  
  
  function __construct(Stylesheet $Vzlwxdlj25po, $Vacjs00x1okq = Stylesheet::ORIG_AUTHOR) {
    $Veca2om3awughis->_props = array();
    $Veca2om3awughis->_important_props = array();
    $Veca2om3awughis->_stylesheet = $Vzlwxdlj25po;
    $Veca2om3awughis->_origin = $Vacjs00x1okq;
    $Veca2om3awughis->_parent_font_size = null;
    $Veca2om3awughis->__font_size_calculated = false;
    
    if ( !isset(self::$V2zslaclzvum) ) {
    
      
      $Vrec2f1japon =& self::$V2zslaclzvum;
    
      
      $Vrec2f1japon["azimuth"] = "center";
      $Vrec2f1japon["background_attachment"] = "scroll";
      $Vrec2f1japon["background_color"] = "transparent";
      $Vrec2f1japon["background_image"] = "none";
      $Vrec2f1japon["background_image_resolution"] = "normal";
      $Vrec2f1japon["_dompdf_background_image_resolution"] = $Vrec2f1japon["background_image_resolution"];
      $Vrec2f1japon["background_position"] = "0% 0%";
      $Vrec2f1japon["background_repeat"] = "repeat";
      $Vrec2f1japon["background"] = "";
      $Vrec2f1japon["border_collapse"] = "separate";
      $Vrec2f1japon["border_color"] = "";
      $Vrec2f1japon["border_spacing"] = "0";
      $Vrec2f1japon["border_style"] = "";
      $Vrec2f1japon["border_top"] = "";
      $Vrec2f1japon["border_right"] = "";
      $Vrec2f1japon["border_bottom"] = "";
      $Vrec2f1japon["border_left"] = "";
      $Vrec2f1japon["border_top_color"] = "";
      $Vrec2f1japon["border_right_color"] = "";
      $Vrec2f1japon["border_bottom_color"] = "";
      $Vrec2f1japon["border_left_color"] = "";
      $Vrec2f1japon["border_top_style"] = "none";
      $Vrec2f1japon["border_right_style"] = "none";
      $Vrec2f1japon["border_bottom_style"] = "none";
      $Vrec2f1japon["border_left_style"] = "none";
      $Vrec2f1japon["border_top_width"] = "medium";
      $Vrec2f1japon["border_right_width"] = "medium";
      $Vrec2f1japon["border_bottom_width"] = "medium";
      $Vrec2f1japon["border_left_width"] = "medium";
      $Vrec2f1japon["border_width"] = "medium";
      $Vrec2f1japon["border"] = "";
      $Vrec2f1japon["bottom"] = "auto";
      $Vrec2f1japon["caption_side"] = "top";
      $Vrec2f1japon["clear"] = "none";
      $Vrec2f1japon["clip"] = "auto";
      $Vrec2f1japon["color"] = "#000000";
      $Vrec2f1japon["content"] = "normal";
      $Vrec2f1japon["counter_increment"] = "none";
      $Vrec2f1japon["counter_reset"] = "none";
      $Vrec2f1japon["cue_after"] = "none";
      $Vrec2f1japon["cue_before"] = "none";
      $Vrec2f1japon["cue"] = "";
      $Vrec2f1japon["cursor"] = "auto";
      $Vrec2f1japon["direction"] = "ltr";
      $Vrec2f1japon["display"] = "inline";
      $Vrec2f1japon["elevation"] = "level";
      $Vrec2f1japon["empty_cells"] = "show";
      $Vrec2f1japon["float"] = "none";
      $Vrec2f1japon["font_family"] = "serif";
      $Vrec2f1japon["font_size"] = "medium";
      $Vrec2f1japon["font_style"] = "normal";
      $Vrec2f1japon["font_variant"] = "normal";
      $Vrec2f1japon["font_weight"] = "normal";
      $Vrec2f1japon["font"] = "";
      $Vrec2f1japon["height"] = "auto";
      $Vrec2f1japon["image_resolution"] = "normal";
      $Vrec2f1japon["_dompdf_image_resolution"] = $Vrec2f1japon["image_resolution"];
      $Vrec2f1japon["left"] = "auto";
      $Vrec2f1japon["letter_spacing"] = "normal";
      $Vrec2f1japon["line_height"] = "normal";
      $Vrec2f1japon["list_style_image"] = "none";
      $Vrec2f1japon["list_style_position"] = "outside";
      $Vrec2f1japon["list_style_type"] = "disc";
      $Vrec2f1japon["list_style"] = "";
      $Vrec2f1japon["margin_right"] = "0";
      $Vrec2f1japon["margin_left"] = "0";
      $Vrec2f1japon["margin_top"] = "0";
      $Vrec2f1japon["margin_bottom"] = "0";
      $Vrec2f1japon["margin"] = "";
      $Vrec2f1japon["max_height"] = "none";
      $Vrec2f1japon["max_width"] = "none";
      $Vrec2f1japon["min_height"] = "0";
      $Vrec2f1japon["min_width"] = "0";
      $Vrec2f1japon["opacity"] = "1.0"; 
      $Vrec2f1japon["orphans"] = "2";
      $Vrec2f1japon["outline_color"] = ""; 
      $Vrec2f1japon["outline_style"] = "none";
      $Vrec2f1japon["outline_width"] = "medium";
      $Vrec2f1japon["outline"] = "";
      $Vrec2f1japon["overflow"] = "visible";
      $Vrec2f1japon["padding_top"] = "0";
      $Vrec2f1japon["padding_right"] = "0";
      $Vrec2f1japon["padding_bottom"] = "0";
      $Vrec2f1japon["padding_left"] = "0";
      $Vrec2f1japon["padding"] = "";
      $Vrec2f1japon["page_break_after"] = "auto";
      $Vrec2f1japon["page_break_before"] = "auto";
      $Vrec2f1japon["page_break_inside"] = "auto";
      $Vrec2f1japon["pause_after"] = "0";
      $Vrec2f1japon["pause_before"] = "0";
      $Vrec2f1japon["pause"] = "";
      $Vrec2f1japon["pitch_range"] = "50";
      $Vrec2f1japon["pitch"] = "medium";
      $Vrec2f1japon["play_during"] = "auto";
      $Vrec2f1japon["position"] = "static";
      $Vrec2f1japon["quotes"] = "";
      $Vrec2f1japon["richness"] = "50";
      $Vrec2f1japon["right"] = "auto";
      $Vrec2f1japon["size"] = "auto"; 
      $Vrec2f1japon["speak_header"] = "once";
      $Vrec2f1japon["speak_numeral"] = "continuous";
      $Vrec2f1japon["speak_punctuation"] = "none";
      $Vrec2f1japon["speak"] = "normal";
      $Vrec2f1japon["speech_rate"] = "medium";
      $Vrec2f1japon["stress"] = "50";
      $Vrec2f1japon["table_layout"] = "auto";
      $Vrec2f1japon["text_align"] = "left";
      $Vrec2f1japon["text_decoration"] = "none";
      $Vrec2f1japon["text_indent"] = "0";
      $Vrec2f1japon["text_transform"] = "none";
      $Vrec2f1japon["top"] = "auto";
      $Vrec2f1japon["transform"] = "none"; 
      $Vrec2f1japon["transform_origin"] = "50% 50%"; 
      $Vrec2f1japon["_webkit_transform"] = $Vrec2f1japon["transform"]; 
      $Vrec2f1japon["_webkit_transform_origin"] = $Vrec2f1japon["transform_origin"]; 
      $Vrec2f1japon["unicode_bidi"] = "normal";
      $Vrec2f1japon["vertical_align"] = "baseline";
      $Vrec2f1japon["visibility"] = "visible";
      $Vrec2f1japon["voice_family"] = "";
      $Vrec2f1japon["volume"] = "medium";
      $Vrec2f1japon["white_space"] = "normal";
      $Vrec2f1japon["word_wrap"] = "normal";
      $Vrec2f1japon["widows"] = "2";
      $Vrec2f1japon["width"] = "auto";
      $Vrec2f1japon["word_spacing"] = "normal";
      $Vrec2f1japon["z_index"] = "auto";
      
      
      $Vrec2f1japon["src"] = "";
      $Vrec2f1japon["unicode_range"] = "";

      
      self::$Vweemanskfb4 = array("azimuth",
                                 "background_image_resolution",
                                 "border_collapse",
                                 "border_spacing",
                                 "caption_side",
                                 "color",
                                 "cursor",
                                 "direction",
                                 "elevation",
                                 "empty_cells",
                                 "font_family",
                                 "font_size",
                                 "font_style",
                                 "font_variant",
                                 "font_weight",
                                 "font",
                                 "image_resolution",
                                 "letter_spacing",
                                 "line_height",
                                 "list_style_image",
                                 "list_style_position",
                                 "list_style_type",
                                 "list_style",
                                 "orphans",
                                 "page_break_inside",
                                 "pitch_range",
                                 "pitch",
                                 "quotes",
                                 "richness",
                                 "speak_header",
                                 "speak_numeral",
                                 "speak_punctuation",
                                 "speak",
                                 "speech_rate",
                                 "stress",
                                 "text_align",
                                 "text_indent",
                                 "text_transform",
                                 "visibility",
                                 "voice_family",
                                 "volume",
                                 "white_space",
                                 "word_wrap",
                                 "widows",
                                 "word_spacing");
    }

  }

  
  function dispose() {
    clear_object($Veca2om3awughis);
  }
  
  function set_frame(Frame $Vrlbsjbjglkb) {
    $Veca2om3awughis->_frame = $Vrlbsjbjglkb;
  }
  
  function get_frame() {
    return $Veca2om3awughis->_frame;
  }
  
  function set_origin($Vacjs00x1okq) {
    $Veca2om3awughis->_origin = $Vacjs00x1okq;
  }
  
  function get_origin() {
    return $Veca2om3awughis->_origin;
  }
  
  
  function get_stylesheet() { return $Veca2om3awughis->_stylesheet; }
  
  
  function length_in_pt($Volq3gdvkuqp, $V0vrajfj4hhj = null) {
    static $Vzuoy3afrlta = array();
    
    if ( !is_array($Volq3gdvkuqp) )
      $Volq3gdvkuqp = array($Volq3gdvkuqp);

    if ( !isset($V0vrajfj4hhj) )
      $V0vrajfj4hhj = self::$Vrczc1yymiyd;
      
    $Vseq1edikdvg = implode("@", $Volq3gdvkuqp)."/$V0vrajfj4hhj";
    
    if ( isset($Vzuoy3afrlta[$Vseq1edikdvg]) ) {
      return $Vzuoy3afrlta[$Vseq1edikdvg];
    }

    $Vc0brddnw0vm = 0;
    foreach ($Volq3gdvkuqp as $Vxlmgxcqqg2w) {

      if ( $Vxlmgxcqqg2w === "auto" )
        return "auto";
      
      if ( $Vxlmgxcqqg2w === "none" )
        return "none";

      
      if ( is_numeric($Vxlmgxcqqg2w) ) {
        $Vc0brddnw0vm += $Vxlmgxcqqg2w;
        continue;
      }
        
      if ( $Vxlmgxcqqg2w === "normal" ) {
        $Vc0brddnw0vm += $V0vrajfj4hhj;
        continue;
      }

      
      if ( $Vxlmgxcqqg2w === "thin" ) {
        $Vc0brddnw0vm += 0.5;
        continue;
      }
      
      if ( $Vxlmgxcqqg2w === "medium" ) {
        $Vc0brddnw0vm += 1.5;
        continue;
      }
    
      if ( $Vxlmgxcqqg2w === "thick" ) {
        $Vc0brddnw0vm += 2.5;
        continue;
      }

      if ( ($Vfhiq1lhsoja = mb_strpos($Vxlmgxcqqg2w, "px"))  !== false ) {
        $Vc0brddnw0vm += ( mb_substr($Vxlmgxcqqg2w, 0, $Vfhiq1lhsoja)  * 72 ) / DOMPDF_DPI;
        continue;
      }
      
      if ( ($Vfhiq1lhsoja = mb_strpos($Vxlmgxcqqg2w, "pt"))  !== false ) {
        $Vc0brddnw0vm += mb_substr($Vxlmgxcqqg2w, 0, $Vfhiq1lhsoja);
        continue;
      }
      
      if ( ($Vfhiq1lhsoja = mb_strpos($Vxlmgxcqqg2w, "%"))  !== false ) {
        $Vc0brddnw0vm += mb_substr($Vxlmgxcqqg2w, 0, $Vfhiq1lhsoja)/100 * $V0vrajfj4hhj;
        continue;
      }

      if ( ($Vfhiq1lhsoja = mb_strpos($Vxlmgxcqqg2w, "rem"))  !== false ) {
        $Vc0brddnw0vm += mb_substr($Vxlmgxcqqg2w, 0, $Vfhiq1lhsoja) * $Veca2om3awughis->_stylesheet->get_dompdf()->get_tree()->get_root()->get_style()->font_size;
        continue;
      }

      if ( ($Vfhiq1lhsoja = mb_strpos($Vxlmgxcqqg2w, "em"))  !== false ) {
        $Vc0brddnw0vm += mb_substr($Vxlmgxcqqg2w, 0, $Vfhiq1lhsoja) * $Veca2om3awughis->__get("font_size");
        continue;
      }
          
      if ( ($Vfhiq1lhsoja = mb_strpos($Vxlmgxcqqg2w, "cm")) !== false ) {
        $Vc0brddnw0vm += mb_substr($Vxlmgxcqqg2w, 0, $Vfhiq1lhsoja) * 72 / 2.54;
        continue;
      }

      if ( ($Vfhiq1lhsoja = mb_strpos($Vxlmgxcqqg2w, "mm")) !== false ) {
        $Vc0brddnw0vm += mb_substr($Vxlmgxcqqg2w, 0, $Vfhiq1lhsoja) * 72 / 25.4;
        continue;
      }
      
      
      if ( ($Vfhiq1lhsoja = mb_strpos($Vxlmgxcqqg2w, "ex"))  !== false ) {
        $Vc0brddnw0vm += mb_substr($Vxlmgxcqqg2w, 0, $Vfhiq1lhsoja) * $Veca2om3awughis->__get("font_size") / 2;
        continue;
      }
      
      if ( ($Vfhiq1lhsoja = mb_strpos($Vxlmgxcqqg2w, "in")) !== false ) {
        $Vc0brddnw0vm += mb_substr($Vxlmgxcqqg2w, 0, $Vfhiq1lhsoja) * 72;
        continue;
      }
          
      if ( ($Vfhiq1lhsoja = mb_strpos($Vxlmgxcqqg2w, "pc")) !== false ) {
        $Vc0brddnw0vm += mb_substr($Vxlmgxcqqg2w, 0, $Vfhiq1lhsoja) * 12;
        continue;
      }
          
      
      $Vc0brddnw0vm += $V0vrajfj4hhj;
    }

    return $Vzuoy3afrlta[$Vseq1edikdvg] = $Vc0brddnw0vm;
  }

  
  
  function inherit(Style $V3jkqexf4nr0) {

    
    $Veca2om3awughis->_parent_font_size = $V3jkqexf4nr0->get_font_size();
    
    foreach (self::$Vweemanskfb4 as $Vmscaatmpbzu) {
      
      
      if ( isset($V3jkqexf4nr0->_props[$Vmscaatmpbzu]) &&
           ( !isset($Veca2om3awughis->_props[$Vmscaatmpbzu]) ||
             ( isset($V3jkqexf4nr0->_important_props[$Vmscaatmpbzu]) && !isset($Veca2om3awughis->_important_props[$Vmscaatmpbzu]) )
           )
         ) {
        if ( isset($V3jkqexf4nr0->_important_props[$Vmscaatmpbzu]) ) {
          $Veca2om3awughis->_important_props[$Vmscaatmpbzu] = true;
        }
        
        $Veca2om3awughis->_prop_cache[$Vmscaatmpbzu] = null;
        $Veca2om3awughis->_props[$Vmscaatmpbzu] = $V3jkqexf4nr0->_props[$Vmscaatmpbzu];
      }
    }
      
    foreach (array_keys($Veca2om3awughis->_props) as $Vmscaatmpbzu) {
      if ( $Veca2om3awughis->_props[$Vmscaatmpbzu] === "inherit" ) {
        if ( isset($V3jkqexf4nr0->_important_props[$Vmscaatmpbzu]) ) {
          $Veca2om3awughis->_important_props[$Vmscaatmpbzu] = true;
        }
        
        
        
        
        
        
        
        
        
        
        
        $Veca2om3awughis->$Vmscaatmpbzu = $V3jkqexf4nr0->$Vmscaatmpbzu;
      }
    }
          
    return $Veca2om3awughis;
  }
  
  
  function merge(Style $Vdtcpflt5bhp) {
    
    
    
    foreach($Vdtcpflt5bhp->_props as $Vmscaatmpbzu => $Vwk2nao2d33x ) {
      if (isset($Vdtcpflt5bhp->_important_props[$Vmscaatmpbzu])) {
        $Veca2om3awughis->_important_props[$Vmscaatmpbzu] = true;
        
        $Veca2om3awughis->_prop_cache[$Vmscaatmpbzu] = null;
        $Veca2om3awughis->_props[$Vmscaatmpbzu] = $Vwk2nao2d33x;
      } else if ( !isset($Veca2om3awughis->_important_props[$Vmscaatmpbzu]) ) {
        
        $Veca2om3awughis->_prop_cache[$Vmscaatmpbzu] = null;
        $Veca2om3awughis->_props[$Vmscaatmpbzu] = $Vwk2nao2d33x;
      }
    }

    if ( isset($Vdtcpflt5bhp->_props["font_size"]) )
      $Veca2om3awughis->__font_size_calculated = false;
  }
  
  
  function munge_colour($Vgorqf1lwixk) { return CSS_Color::parse($Vgorqf1lwixk); }
  
  
  function munge_color($Vl5jzlxo3j3n) { return CSS_Color::parse($Vl5jzlxo3j3n); }

  
  function important_set($Vmscaatmpbzu) {
    $Vmscaatmpbzu = str_replace("-", "_", $Vmscaatmpbzu);
    $Veca2om3awughis->_important_props[$Vmscaatmpbzu] = true;
  }

  function important_get($Vmscaatmpbzu) {
    isset($Veca2om3awughis->_important_props[$Vmscaatmpbzu]);
  }

  
  function __set($Vmscaatmpbzu, $Vwk2nao2d33x) {
    $Vmscaatmpbzu = str_replace("-", "_", $Vmscaatmpbzu);
    $Veca2om3awughis->_prop_cache[$Vmscaatmpbzu] = null;
    
    if ( !isset(self::$V2zslaclzvum[$Vmscaatmpbzu]) ) {
      global $Vlb1pyhumpag;
      $Vlb1pyhumpag[] = "'$Vmscaatmpbzu' is not a valid CSS2 property.";
      return;
    }
    
    if ( $Vmscaatmpbzu !== "content" && is_string($Vwk2nao2d33x) && strlen($Vwk2nao2d33x) > 5 && mb_strpos($Vwk2nao2d33x, "url") === false ) {
      $Vwk2nao2d33x = mb_strtolower(trim(str_replace(array("\n", "\t"), array(" "), $Vwk2nao2d33x)));
      $Vwk2nao2d33x = preg_replace("/([0-9]+) (pt|px|pc|em|ex|in|cm|mm|%)/S", "\\1\\2", $Vwk2nao2d33x);
    }
    
    $Vihjcs2gfuz0 = "set_$Vmscaatmpbzu";
    
    if ( !isset(self::$Vchko1lhtqmo[$Vihjcs2gfuz0]) ) {
      self::$Vchko1lhtqmo[$Vihjcs2gfuz0] = method_exists($Veca2om3awughis, $Vihjcs2gfuz0);
    }

    if ( self::$Vchko1lhtqmo[$Vihjcs2gfuz0] )
      $Veca2om3awughis->$Vihjcs2gfuz0($Vwk2nao2d33x);
    else
      $Veca2om3awughis->_props[$Vmscaatmpbzu] = $Vwk2nao2d33x;
  }

  
  function __get($Vmscaatmpbzu) {
    if ( !isset(self::$V2zslaclzvum[$Vmscaatmpbzu]) )
      throw new DOMPDF_Exception("'$Vmscaatmpbzu' is not a valid CSS2 property.");

    if ( isset($Veca2om3awughis->_prop_cache[$Vmscaatmpbzu]) && $Veca2om3awughis->_prop_cache[$Vmscaatmpbzu] != null )
      return $Veca2om3awughis->_prop_cache[$Vmscaatmpbzu];
    
    $Vihjcs2gfuz0 = "get_$Vmscaatmpbzu";

    
    if ( !isset($Veca2om3awughis->_props[$Vmscaatmpbzu]) )
      $Veca2om3awughis->_props[$Vmscaatmpbzu] = self::$V2zslaclzvum[$Vmscaatmpbzu];

    if ( !isset(self::$Vchko1lhtqmo[$Vihjcs2gfuz0]) ) {
      self::$Vchko1lhtqmo[$Vihjcs2gfuz0] = method_exists($Veca2om3awughis, $Vihjcs2gfuz0);
    }
    
    if ( self::$Vchko1lhtqmo[$Vihjcs2gfuz0] )
      return $Veca2om3awughis->_prop_cache[$Vmscaatmpbzu] = $Veca2om3awughis->$Vihjcs2gfuz0();

    return $Veca2om3awughis->_prop_cache[$Vmscaatmpbzu] = $Veca2om3awughis->_props[$Vmscaatmpbzu];
  }

  function get_font_family_raw(){
    return trim($Veca2om3awughis->_props["font_family"], " \t\n\r\x0B\"'");
  }

  
  function get_font_family() {
  
    $Vtaejg4eqd1d=DEBUGCSS; 

    
    

    
    $Vqmxa0npsfod = $Veca2om3awughis->__get("font_weight");
    
    if ( is_numeric($Vqmxa0npsfod) ) {

      if ( $Vqmxa0npsfod < 600 )
        $Vqmxa0npsfod = "normal";
      else
        $Vqmxa0npsfod = "bold";

    } else if ( $Vqmxa0npsfod === "bold" || $Vqmxa0npsfod === "bolder" ) {
      $Vqmxa0npsfod = "bold";

    } else {
      $Vqmxa0npsfod = "normal";

    }

    
    $Vcx0ncoxzlop = $Veca2om3awughis->__get("font_style");

    if ( $Vqmxa0npsfod === "bold" && ($Vcx0ncoxzlop === "italic" || $Vcx0ncoxzlop === "oblique") )
      $Vwecbks45sng = "bold_italic";
    else if ( $Vqmxa0npsfod === "bold" && $Vcx0ncoxzlop !== "italic" && $Vcx0ncoxzlop !== "oblique" )
      $Vwecbks45sng = "bold";
    else if ( $Vqmxa0npsfod !== "bold" && ($Vcx0ncoxzlop === "italic" || $Vcx0ncoxzlop === "oblique") )
      $Vwecbks45sng = "italic";
    else
      $Vwecbks45sng = "normal";
    
    
    if ($Vtaejg4eqd1d) {
      print "<pre>[get_font_family:";
      print '('.$Veca2om3awughis->_props["font_family"].'.'.$Vcx0ncoxzlop.'.'.$Veca2om3awughis->__get("font_weight").'.'.$Vqmxa0npsfod.'.'.$Vwecbks45sng.')';
    }
    $Vh5ypxk5jjwi = explode(",", $Veca2om3awughis->_props["font_family"]);
    $Vh5ypxk5jjwi = array_map('trim',$Vh5ypxk5jjwi);
    reset($Vh5ypxk5jjwi);

    $Vj0kojsfk0h3 = null;
    while ( current($Vh5ypxk5jjwi) ) {
      list(,$Vt5aj1423wg2) = each($Vh5ypxk5jjwi);
      
      
      $Vt5aj1423wg2 = trim($Vt5aj1423wg2, " \t\n\r\x0B\"'");
      if ($Vtaejg4eqd1d) print '('.$Vt5aj1423wg2.')';
      $Vj0kojsfk0h3 = Font_Metrics::get_font($Vt5aj1423wg2, $Vwecbks45sng);

      if ( $Vj0kojsfk0h3 ) {
        if ($Vtaejg4eqd1d)  print '('.$Vj0kojsfk0h3.")get_font_family]\n</pre>";
        return $Vj0kojsfk0h3;
      }
    }

    $Vt5aj1423wg2 = null;
    if ($Vtaejg4eqd1d)  print '(default)';
    $Vj0kojsfk0h3 = Font_Metrics::get_font($Vt5aj1423wg2, $Vwecbks45sng);

    if ( $Vj0kojsfk0h3 ) {
      if ($Vtaejg4eqd1d) print '('.$Vj0kojsfk0h3.")get_font_family]\n</pre>";
      return $Vj0kojsfk0h3;
    }
    throw new DOMPDF_Exception("Unable to find a suitable font replacement for: '" . $Veca2om3awughis->_props["font_family"] ."'");
    
  }

  
  function get_font_size() {

    if ( $Veca2om3awughis->__font_size_calculated )
      return $Veca2om3awughis->_props["font_size"];
    
    if ( !isset($Veca2om3awughis->_props["font_size"]) )
      $V2dbcicjzo5l = self::$V2zslaclzvum["font_size"];
    else
      $V2dbcicjzo5l = $Veca2om3awughis->_props["font_size"];
    
    if ( !isset($Veca2om3awughis->_parent_font_size) )
      $Veca2om3awughis->_parent_font_size = self::$Vrczc1yymiyd;
    
    switch ($V2dbcicjzo5l) {
    case "xx-small":
    case "x-small":
    case "small":
    case "medium":
    case "large":
    case "x-large":
    case "xx-large":
      $V2dbcicjzo5l = self::$Vrczc1yymiyd * self::$Vstpp25swdpl[$V2dbcicjzo5l];
      break;

    case "smaller":
      $V2dbcicjzo5l = 8/9 * $Veca2om3awughis->_parent_font_size;
      break;
      
    case "larger":
      $V2dbcicjzo5l = 6/5 * $Veca2om3awughis->_parent_font_size;
      break;
      
    default:
      break;
    }

    
    if ( ($Vfhiq1lhsoja = mb_strpos($V2dbcicjzo5l, "em")) !== false )
      $V2dbcicjzo5l = mb_substr($V2dbcicjzo5l, 0, $Vfhiq1lhsoja) * $Veca2om3awughis->_parent_font_size;

    else if ( ($Vfhiq1lhsoja = mb_strpos($V2dbcicjzo5l, "ex")) !== false )
      $V2dbcicjzo5l = mb_substr($V2dbcicjzo5l, 0, $Vfhiq1lhsoja) * $Veca2om3awughis->_parent_font_size;

    else
      $V2dbcicjzo5l = $Veca2om3awughis->length_in_pt($V2dbcicjzo5l);

    
    $Veca2om3awughis->_prop_cache["font_size"] = null;
    $Veca2om3awughis->_props["font_size"] = $V2dbcicjzo5l;
    $Veca2om3awughis->__font_size_calculated = true;
    return $Veca2om3awughis->_props["font_size"];

  }

  
  function get_word_spacing() {
    if ( $Veca2om3awughis->_props["word_spacing"] === "normal" )
      return 0;

    return $Veca2om3awughis->_props["word_spacing"];
  }

  
  function get_letter_spacing() {
    if ( $Veca2om3awughis->_props["letter_spacing"] === "normal" )
      return 0;

    return $Veca2om3awughis->_props["letter_spacing"];
  }

  
  function get_line_height() {
    $Vxlmgxcqqg2wine_height = $Veca2om3awughis->_props["line_height"];
    
    if ( $Vxlmgxcqqg2wine_height === "normal" )
      return self::$Vuxex3zhuo4a * $Veca2om3awughis->get_font_size();

    if ( is_numeric($Vxlmgxcqqg2wine_height) )
      return $Veca2om3awughis->length_in_pt( $Vxlmgxcqqg2wine_height . "em", $Veca2om3awughis->get_font_size());
    
    return $Veca2om3awughis->length_in_pt( $Vxlmgxcqqg2wine_height, $Veca2om3awughis->get_font_size() );
  }

  
  function get_color() {
    return $Veca2om3awughis->munge_color( $Veca2om3awughis->_props["color"] );
  }

  
  function get_background_color() {
    return $Veca2om3awughis->munge_color( $Veca2om3awughis->_props["background_color"] );
  }
  
  
  function get_background_position() {
    $Vdln1z2oxpjs = explode(" ", $Veca2om3awughis->_props["background_position"]);

    switch ($Vdln1z2oxpjs[0]) {

    case "left":
      $V1e1eaicqarh = "0%";
      break;

    case "right":
      $V1e1eaicqarh = "100%";
      break;

    case "top":
      $Vqwmp2bx0ii2 = "0%";
      break;

    case "bottom":
      $Vqwmp2bx0ii2 = "100%";
      break;

    case "center":
      $V1e1eaicqarh = "50%";
      $Vqwmp2bx0ii2 = "50%";
      break;

    default:
      $V1e1eaicqarh = $Vdln1z2oxpjs[0];
      break;
    }

    if ( isset($Vdln1z2oxpjs[1]) ) {

      switch ($Vdln1z2oxpjs[1]) {
      case "left":
        $V1e1eaicqarh = "0%";
        break;
        
      case "right":
        $V1e1eaicqarh = "100%";
        break;
        
      case "top":
        $Vqwmp2bx0ii2 = "0%";
        break;
        
      case "bottom":
        $Vqwmp2bx0ii2 = "100%";
        break;
        
      case "center":
        if ( $Vdln1z2oxpjs[0] === "left" || $Vdln1z2oxpjs[0] === "right" || $Vdln1z2oxpjs[0] === "center" )
          $Vqwmp2bx0ii2 = "50%";
        else
          $V1e1eaicqarh = "50%";
        break;
        
      default:
        $Vqwmp2bx0ii2 = $Vdln1z2oxpjs[1];
        break;
      }

    } else {
      $Vqwmp2bx0ii2 = "50%";
    }

    if ( !isset($V1e1eaicqarh) )
      $V1e1eaicqarh = "0%";

    if ( !isset($Vqwmp2bx0ii2) )
      $Vqwmp2bx0ii2 = "0%";

    return array( 0 => $V1e1eaicqarh, "x" => $V1e1eaicqarh,
                  1 => $Vqwmp2bx0ii2, "y" => $Vqwmp2bx0ii2 );
  }


  
  function get_background_attachment() {
    return $Veca2om3awughis->_props["background_attachment"];
  }


  
  function get_background_repeat() {
    return $Veca2om3awughis->_props["background_repeat"];
  }


  
  function get_background() {
    return $Veca2om3awughis->_props["background"];
  }


  
  function get_border_top_color() {
    if ( $Veca2om3awughis->_props["border_top_color"] === "" ) {
      
      $Veca2om3awughis->_prop_cache["border_top_color"] = null;
      $Veca2om3awughis->_props["border_top_color"] = $Veca2om3awughis->__get("color");
    }
    return $Veca2om3awughis->munge_color($Veca2om3awughis->_props["border_top_color"]);
  }

  function get_border_right_color() {
    if ( $Veca2om3awughis->_props["border_right_color"] === "" ) {
      
      $Veca2om3awughis->_prop_cache["border_right_color"] = null;
      $Veca2om3awughis->_props["border_right_color"] = $Veca2om3awughis->__get("color");
    }
    return $Veca2om3awughis->munge_color($Veca2om3awughis->_props["border_right_color"]);
  }

  function get_border_bottom_color() {
    if ( $Veca2om3awughis->_props["border_bottom_color"] === "" ) {
      
      $Veca2om3awughis->_prop_cache["border_bottom_color"] = null;
      $Veca2om3awughis->_props["border_bottom_color"] = $Veca2om3awughis->__get("color");
    }
    return $Veca2om3awughis->munge_color($Veca2om3awughis->_props["border_bottom_color"]);
  }

  function get_border_left_color() {
    if ( $Veca2om3awughis->_props["border_left_color"] === "" ) {
      
      $Veca2om3awughis->_prop_cache["border_left_color"] = null;
      $Veca2om3awughis->_props["border_left_color"] = $Veca2om3awughis->__get("color");
    }
    return $Veca2om3awughis->munge_color($Veca2om3awughis->_props["border_left_color"]);
  }
  
  

 
  function get_border_top_width() {
    $Vdtcpflt5bhp = $Veca2om3awughis->__get("border_top_style");
    return $Vdtcpflt5bhp !== "none" && $Vdtcpflt5bhp !== "hidden" ? $Veca2om3awughis->length_in_pt($Veca2om3awughis->_props["border_top_width"]) : 0;
  }
  
  function get_border_right_width() {
    $Vdtcpflt5bhp = $Veca2om3awughis->__get("border_right_style");
    return $Vdtcpflt5bhp !== "none" && $Vdtcpflt5bhp !== "hidden" ? $Veca2om3awughis->length_in_pt($Veca2om3awughis->_props["border_right_width"]) : 0;
  }

  function get_border_bottom_width() {
    $Vdtcpflt5bhp = $Veca2om3awughis->__get("border_bottom_style");
    return $Vdtcpflt5bhp !== "none" && $Vdtcpflt5bhp !== "hidden" ? $Veca2om3awughis->length_in_pt($Veca2om3awughis->_props["border_bottom_width"]) : 0;
  }

  function get_border_left_width() {
    $Vdtcpflt5bhp = $Veca2om3awughis->__get("border_left_style");
    return $Vdtcpflt5bhp !== "none" && $Vdtcpflt5bhp !== "hidden" ? $Veca2om3awughis->length_in_pt($Veca2om3awughis->_props["border_left_width"]) : 0;
  }
  

  
  function get_border_properties() {
    return array("top" => array("width" => $Veca2om3awughis->__get("border_top_width"),
                                "style" => $Veca2om3awughis->__get("border_top_style"),
                                "color" => $Veca2om3awughis->__get("border_top_color")),
                 "bottom" => array("width" => $Veca2om3awughis->__get("border_bottom_width"),
                                   "style" => $Veca2om3awughis->__get("border_bottom_style"),
                                   "color" => $Veca2om3awughis->__get("border_bottom_color")),
                 "right" => array("width" => $Veca2om3awughis->__get("border_right_width"),
                                  "style" => $Veca2om3awughis->__get("border_right_style"),
                                  "color" => $Veca2om3awughis->__get("border_right_color")),
                 "left" => array("width" => $Veca2om3awughis->__get("border_left_width"),
                                 "style" => $Veca2om3awughis->__get("border_left_style"),
                                 "color" => $Veca2om3awughis->__get("border_left_color")));
  }

  
  protected function _get_border($V5qa0rylnggy) {
    $Vl5jzlxo3j3n = $Veca2om3awughis->__get("border_" . $V5qa0rylnggy . "_color");
    
    return $Veca2om3awughis->__get("border_" . $V5qa0rylnggy . "_width") . " " .
      $Veca2om3awughis->__get("border_" . $V5qa0rylnggy . "_style") . " " . $Vl5jzlxo3j3n["hex"];
  }

  
  function get_border_top() { return $Veca2om3awughis->_get_border("top"); }
  function get_border_right() { return $Veca2om3awughis->_get_border("right"); }
  function get_border_bottom() { return $Veca2om3awughis->_get_border("bottom"); }
  function get_border_left() { return $Veca2om3awughis->_get_border("left"); }
  
  
  
  function get_outline_color() {
    if ( $Veca2om3awughis->_props["outline_color"] === "" ) {
      
      $Veca2om3awughis->_prop_cache["outline_color"] = null;
      $Veca2om3awughis->_props["outline_color"] = $Veca2om3awughis->__get("color");
    }
    return $Veca2om3awughis->munge_color($Veca2om3awughis->_props["outline_color"]);
  }

 
  function get_outline_width() {
    $Vdtcpflt5bhp = $Veca2om3awughis->__get("outline_style");
    return $Vdtcpflt5bhp !== "none" && $Vdtcpflt5bhp !== "hidden" ? $Veca2om3awughis->length_in_pt($Veca2om3awughis->_props["outline_width"]) : 0;
  }
  
  
  function get_outline() {
    $Vl5jzlxo3j3n = $Veca2om3awughis->__get("outline_color");
    return 
      $Veca2om3awughis->__get("outline_width") . " " . 
      $Veca2om3awughis->__get("outline_style") . " " . 
      $Vl5jzlxo3j3n["hex"]; 
  }
  

  
  function get_border_spacing() {
    return explode(" ", $Veca2om3awughis->_props["border_spacing"]);
  }



  

  
  protected function _set_style_side_type($Vdtcpflt5bhp,$V5qa0rylnggy,$V4pigtpor0ln,$Vwk2nao2d33x,$Vfhiq1lhsojamportant) {
    $Vmscaatmpbzu = $Vdtcpflt5bhp.'_'.$V5qa0rylnggy.$V4pigtpor0ln;
    
    if ( !isset($Veca2om3awughis->_important_props[$Vmscaatmpbzu]) || $Vfhiq1lhsojamportant) {
      
      $Veca2om3awughis->_prop_cache[$Vmscaatmpbzu] = null;
      if ($Vfhiq1lhsojamportant) {
        $Veca2om3awughis->_important_props[$Vmscaatmpbzu] = true;
      }
      $Veca2om3awughis->_props[$Vmscaatmpbzu] = $Vwk2nao2d33x;
    }
  }

  protected function _set_style_sides_type($Vdtcpflt5bhp,$Vrveb1xz24qu,$Vqyn43hpxtm0,$Vyzmqhafpy0b,$Vxlmgxcqqg2weft,$V4pigtpor0ln,$Vfhiq1lhsojamportant) {
      $Veca2om3awughis->_set_style_side_type($Vdtcpflt5bhp,'top',$V4pigtpor0ln,$Vrveb1xz24qu,$Vfhiq1lhsojamportant);
      $Veca2om3awughis->_set_style_side_type($Vdtcpflt5bhp,'right',$V4pigtpor0ln,$Vqyn43hpxtm0,$Vfhiq1lhsojamportant);
      $Veca2om3awughis->_set_style_side_type($Vdtcpflt5bhp,'bottom',$V4pigtpor0ln,$Vyzmqhafpy0b,$Vfhiq1lhsojamportant);
      $Veca2om3awughis->_set_style_side_type($Vdtcpflt5bhp,'left',$V4pigtpor0ln,$Vxlmgxcqqg2weft,$Vfhiq1lhsojamportant);
  }

  protected function _set_style_type($Vdtcpflt5bhp,$V4pigtpor0ln,$Vwk2nao2d33x,$Vfhiq1lhsojamportant) {
    $Vwk2nao2d33x = preg_replace("/\s*\,\s*/", ",", $Vwk2nao2d33x); 
    $Vd5mgesqkq2x = explode(" ", $Vwk2nao2d33x);
    
    switch (count($Vd5mgesqkq2x)) {
    case 1:
      $Veca2om3awughis->_set_style_sides_type($Vdtcpflt5bhp,$Vd5mgesqkq2x[0],$Vd5mgesqkq2x[0],$Vd5mgesqkq2x[0],$Vd5mgesqkq2x[0],$V4pigtpor0ln,$Vfhiq1lhsojamportant);
      break;
    case 2:
      $Veca2om3awughis->_set_style_sides_type($Vdtcpflt5bhp,$Vd5mgesqkq2x[0],$Vd5mgesqkq2x[1],$Vd5mgesqkq2x[0],$Vd5mgesqkq2x[1],$V4pigtpor0ln,$Vfhiq1lhsojamportant);
      break;
    case 3:
      $Veca2om3awughis->_set_style_sides_type($Vdtcpflt5bhp,$Vd5mgesqkq2x[0],$Vd5mgesqkq2x[1],$Vd5mgesqkq2x[2],$Vd5mgesqkq2x[1],$V4pigtpor0ln,$Vfhiq1lhsojamportant);
      break;
    case 4:
      $Veca2om3awughis->_set_style_sides_type($Vdtcpflt5bhp,$Vd5mgesqkq2x[0],$Vd5mgesqkq2x[1],$Vd5mgesqkq2x[2],$Vd5mgesqkq2x[3],$V4pigtpor0ln,$Vfhiq1lhsojamportant);
      break;
    default:
      break;
    }
    
    $Veca2om3awughis->_prop_cache[$Vdtcpflt5bhp.$V4pigtpor0ln] = null;
    $Veca2om3awughis->_props[$Vdtcpflt5bhp.$V4pigtpor0ln] = $Vwk2nao2d33x;
  }

  protected function _set_style_type_important($Vdtcpflt5bhp,$V4pigtpor0ln,$Vwk2nao2d33x) {
    $Veca2om3awughis->_set_style_type($Vdtcpflt5bhp,$V4pigtpor0ln,$Vwk2nao2d33x,isset($Veca2om3awughis->_important_props[$Vdtcpflt5bhp.$V4pigtpor0ln]));
  }

  
  protected function _set_style_side_width_important($Vdtcpflt5bhp,$V5qa0rylnggy,$Vwk2nao2d33x) {
    
    $Veca2om3awughis->_prop_cache[$Vdtcpflt5bhp.'_'.$V5qa0rylnggy] = null;
    $Veca2om3awughis->_props[$Vdtcpflt5bhp.'_'.$V5qa0rylnggy] = str_replace("none", "0px", $Vwk2nao2d33x);
  }

  protected function _set_style($Vdtcpflt5bhp,$Vwk2nao2d33x,$Vfhiq1lhsojamportant) {
    if ( !isset($Veca2om3awughis->_important_props[$Vdtcpflt5bhp]) || $Vfhiq1lhsojamportant) {
      if ($Vfhiq1lhsojamportant) {
        $Veca2om3awughis->_important_props[$Vdtcpflt5bhp] = true;
      }
      
      $Veca2om3awughis->_prop_cache[$Vdtcpflt5bhp] = null;
      $Veca2om3awughis->_props[$Vdtcpflt5bhp] = $Vwk2nao2d33x;
    }
  }

  protected function _image($Vwk2nao2d33x) {
    $Vtaejg4eqd1d=DEBUGCSS;
    
    if ( mb_strpos($Vwk2nao2d33x, "url") === false ) {
      $V3wwyy5a12nc = "none"; 
    } else {
      $Vwk2nao2d33x = preg_replace("/url\(['\"]?([^'\")]+)['\"]?\)/","\\1", trim($Vwk2nao2d33x));

      
      $Vxdbe0sbfowy = explode_url($Vwk2nao2d33x);
      if ( $Vxdbe0sbfowy["protocol"] == "" && $Veca2om3awughis->_stylesheet->get_protocol() == "" ) {
        if ($Vxdbe0sbfowy["path"][0] === '/' || $Vxdbe0sbfowy["path"][0] === '\\' ) {
          $V3wwyy5a12nc = $_SERVER["DOCUMENT_ROOT"].'/';
        } else {
          $V3wwyy5a12nc = $Veca2om3awughis->_stylesheet->get_base_path();
        }
        $V3wwyy5a12nc .= $Vxdbe0sbfowy["path"] . $Vxdbe0sbfowy["file"];
        $V3wwyy5a12nc = realpath($V3wwyy5a12nc);
        
        if (!$V3wwyy5a12nc) { $V3wwyy5a12nc = 'none'; }
      } else {
        $V3wwyy5a12nc = build_url($Veca2om3awughis->_stylesheet->get_protocol(),
                          $Veca2om3awughis->_stylesheet->get_host(),
                          $Veca2om3awughis->_stylesheet->get_base_path(),
                          $Vwk2nao2d33x);
      }
    }
    if ($Vtaejg4eqd1d) {
      print "<pre>[_image\n";
      print_r($Vxdbe0sbfowy);
      print $Veca2om3awughis->_stylesheet->get_protocol()."\n".$Veca2om3awughis->_stylesheet->get_base_path()."\n".$V3wwyy5a12nc."\n";
      print "_image]</pre>";;
    }
    return $V3wwyy5a12nc;
  }



  
  function set_color($Vgorqf1lwixk) {
    $Vswazvoa3xts = $Veca2om3awughis->munge_colour($Vgorqf1lwixk);

    if ( is_null($Vswazvoa3xts) )
      $Vswazvoa3xts = self::$V2zslaclzvum["color"];

    
    $Veca2om3awughis->_prop_cache["color"] = null;
    $Veca2om3awughis->_props["color"] = $Vswazvoa3xts["hex"];
  }

  
  function set_background_color($Vgorqf1lwixk) {
    $Vswazvoa3xts = $Veca2om3awughis->munge_colour($Vgorqf1lwixk);
    if ( is_null($Vswazvoa3xts) )
      $Vswazvoa3xts = self::$V2zslaclzvum["background_color"];

    
    $Veca2om3awughis->_prop_cache["background_color"] = null;
    $Veca2om3awughis->_props["background_color"] = is_array($Vswazvoa3xts) ? $Vswazvoa3xts["hex"] : $Vswazvoa3xts;
  }

  
  function set_background_image($Vwk2nao2d33x) {
    
    $Veca2om3awughis->_prop_cache["background_image"] = null;
    $Veca2om3awughis->_props["background_image"] = $Veca2om3awughis->_image($Vwk2nao2d33x);
  }

  
  function set_background_repeat($Vwk2nao2d33x) {
    if ( is_null($Vwk2nao2d33x) )
      $Vwk2nao2d33x = self::$V2zslaclzvum["background_repeat"];
      
    
    $Veca2om3awughis->_prop_cache["background_repeat"] = null;
    $Veca2om3awughis->_props["background_repeat"] = $Vwk2nao2d33x;
  }

  
  function set_background_attachment($Vwk2nao2d33x) {
    if ( is_null($Vwk2nao2d33x) )
      $Vwk2nao2d33x = self::$V2zslaclzvum["background_attachment"];

    
    $Veca2om3awughis->_prop_cache["background_attachment"] = null;
    $Veca2om3awughis->_props["background_attachment"] = $Vwk2nao2d33x;
  }

  
  function set_background_position($Vwk2nao2d33x) {
    if ( is_null($Vwk2nao2d33x) )
      $Vwk2nao2d33x = self::$V2zslaclzvum["background_position"];

    
    $Veca2om3awughis->_prop_cache["background_position"] = null;
    $Veca2om3awughis->_props["background_position"] = $Vwk2nao2d33x;
  }

  
  function set_background($Vwk2nao2d33x) {
    $Vswazvoa3xts = null;
    $Vv3hdohvn1hh = array();
    $Vdln1z2oxpjs = preg_replace("/\s*\,\s*/", ",", $Vwk2nao2d33x); 
    $Vdln1z2oxpjs = explode(" ", $Vdln1z2oxpjs);
    $Vfhiq1lhsojamportant = isset($Veca2om3awughis->_important_props["background"]);
    
    foreach($Vdln1z2oxpjs as $V5v3aao2lape) {
      if (mb_substr($V5v3aao2lape, 0, 3) === "url" || $V5v3aao2lape === "none") {
        $Veca2om3awughis->_set_style("background_image", $Veca2om3awughis->_image($V5v3aao2lape), $Vfhiq1lhsojamportant);
      } else if ($V5v3aao2lape === "fixed" || $V5v3aao2lape === "scroll") {
        $Veca2om3awughis->_set_style("background_attachment", $V5v3aao2lape, $Vfhiq1lhsojamportant);
      } else if ($V5v3aao2lape === "repeat" || $V5v3aao2lape === "repeat-x" || $V5v3aao2lape === "repeat-y" || $V5v3aao2lape === "no-repeat") {
        $Veca2om3awughis->_set_style("background_repeat", $V5v3aao2lape, $Vfhiq1lhsojamportant);
      } else if (($Vswazvoa3xts = $Veca2om3awughis->munge_color($V5v3aao2lape)) != null ) {
        $Veca2om3awughis->_set_style("background_color", is_array($Vswazvoa3xts) ? $Vswazvoa3xts["hex"] : $Vswazvoa3xts, $Vfhiq1lhsojamportant);
      } else {
        $Vv3hdohvn1hh[] = $V5v3aao2lape;
      }
    }
    
    if (count($Vv3hdohvn1hh)) {
      $Veca2om3awughis->_set_style("background_position",implode(' ',$Vv3hdohvn1hh), $Vfhiq1lhsojamportant);
    }
    
    $Veca2om3awughis->_prop_cache["background"] = null;
    $Veca2om3awughis->_props["background"] = $Vwk2nao2d33x;
  }

  
  function set_font_size($V4jbadwq4bzj) {
    $Veca2om3awughis->__font_size_calculated = false;
    
    $Veca2om3awughis->_prop_cache["font_size"] = null;
    $Veca2om3awughis->_props["font_size"] = $V4jbadwq4bzj;
  }

  
  function set_font($Vwk2nao2d33x) {
    $Veca2om3awughis->__font_size_calculated = false;
    
    $Veca2om3awughis->_prop_cache["font"] = null;
    $Veca2om3awughis->_props["font"] = $Vwk2nao2d33x;

    $Vfhiq1lhsojamportant = isset($Veca2om3awughis->_important_props["font"]);

    if ( preg_match("/^(italic|oblique|normal)\s*(.*)$/i",$Vwk2nao2d33x,$Vkvvdnwtmjnq) ) {
      $Veca2om3awughis->_set_style("font_style", $Vkvvdnwtmjnq[1], $Vfhiq1lhsojamportant);
      $Vwk2nao2d33x = $Vkvvdnwtmjnq[2];
    } else {
      $Veca2om3awughis->_set_style("font_style", self::$V2zslaclzvum["font_style"], $Vfhiq1lhsojamportant);
    }

    if ( preg_match("/^(small-caps|normal)\s*(.*)$/i",$Vwk2nao2d33x,$Vkvvdnwtmjnq) ) {
      $Veca2om3awughis->_set_style("font_variant", $Vkvvdnwtmjnq[1], $Vfhiq1lhsojamportant);
      $Vwk2nao2d33x = $Vkvvdnwtmjnq[2];
    } else {
      $Veca2om3awughis->_set_style("font_variant", self::$V2zslaclzvum["font_variant"], $Vfhiq1lhsojamportant);
    }

    
    if ( preg_match("/^(bold|bolder|lighter|100|200|300|400|500|600|700|800|900|normal)\s*(.*)$/i",$Vwk2nao2d33x,$Vkvvdnwtmjnq) &&
         !preg_match("/^(?:pt|px|pc|em|ex|in|cm|mm|%)/",$Vkvvdnwtmjnq[2])
       ) {
      $Veca2om3awughis->_set_style("font_weight", $Vkvvdnwtmjnq[1], $Vfhiq1lhsojamportant);
      $Vwk2nao2d33x = $Vkvvdnwtmjnq[2];
    } else {
      $Veca2om3awughis->_set_style("font_weight", self::$V2zslaclzvum["font_weight"], $Vfhiq1lhsojamportant);
    }

    if ( preg_match("/^(xx-small|x-small|small|medium|large|x-large|xx-large|smaller|larger|\d+\s*(?:pt|px|pc|em|ex|in|cm|mm|%))\s*(.*)$/i",$Vwk2nao2d33x,$Vkvvdnwtmjnq) ) {
      $Veca2om3awughis->_set_style("font_size", $Vkvvdnwtmjnq[1], $Vfhiq1lhsojamportant);
      $Vwk2nao2d33x = $Vkvvdnwtmjnq[2];
      if (preg_match("/^\/\s*(\d+\s*(?:pt|px|pc|em|ex|in|cm|mm|%))\s*(.*)$/i",$Vwk2nao2d33x,$Vkvvdnwtmjnq) ) {
        $Veca2om3awughis->_set_style("line_height", $Vkvvdnwtmjnq[1], $Vfhiq1lhsojamportant);
        $Vwk2nao2d33x = $Vkvvdnwtmjnq[2];
      } else {
        $Veca2om3awughis->_set_style("line_height", self::$V2zslaclzvum["line_height"], $Vfhiq1lhsojamportant);
      }
    } else {
      $Veca2om3awughis->_set_style("font_size", self::$V2zslaclzvum["font_size"], $Vfhiq1lhsojamportant);
      $Veca2om3awughis->_set_style("line_height", self::$V2zslaclzvum["line_height"], $Vfhiq1lhsojamportant);
    }

    if(strlen($Vwk2nao2d33x) != 0) {
      $Veca2om3awughis->_set_style("font_family", $Vwk2nao2d33x, $Vfhiq1lhsojamportant);
    } else {
      $Veca2om3awughis->_set_style("font_family", self::$V2zslaclzvum["font_family"], $Vfhiq1lhsojamportant);
    }
  }

  
  function set_page_break_before($Vj5scfisbwrw) {
    if ($Vj5scfisbwrw === "left" || $Vj5scfisbwrw === "right")
      $Vj5scfisbwrw = "always";

    
    $Veca2om3awughis->_prop_cache["page_break_before"] = null;
    $Veca2om3awughis->_props["page_break_before"] = $Vj5scfisbwrw;
  }

  function set_page_break_after($Vj5scfisbwrw) {
    if ($Vj5scfisbwrw === "left" || $Vj5scfisbwrw === "right")
      $Vj5scfisbwrw = "always";

    
    $Veca2om3awughis->_prop_cache["page_break_after"] = null;
    $Veca2om3awughis->_props["page_break_after"] = $Vj5scfisbwrw;
  }
  
    
  

  
  function set_margin_top($Vwk2nao2d33x) {
    $Veca2om3awughis->_set_style_side_width_important('margin','top',$Vwk2nao2d33x);
  }

  function set_margin_right($Vwk2nao2d33x) {
    $Veca2om3awughis->_set_style_side_width_important('margin','right',$Vwk2nao2d33x);
  }

  function set_margin_bottom($Vwk2nao2d33x) {
    $Veca2om3awughis->_set_style_side_width_important('margin','bottom',$Vwk2nao2d33x);
  }

  function set_margin_left($Vwk2nao2d33x) {
    $Veca2om3awughis->_set_style_side_width_important('margin','left',$Vwk2nao2d33x);
  }
  
  function set_margin($Vwk2nao2d33x) {
    $Vwk2nao2d33x = str_replace("none", "0px", $Vwk2nao2d33x);
    $Veca2om3awughis->_set_style_type_important('margin','',$Vwk2nao2d33x);
  }
  

  
  function set_padding_top($Vwk2nao2d33x) {
    $Veca2om3awughis->_set_style_side_width_important('padding','top',$Vwk2nao2d33x);
  }

  function set_padding_right($Vwk2nao2d33x) {
    $Veca2om3awughis->_set_style_side_width_important('padding','right',$Vwk2nao2d33x);
  }

  function set_padding_bottom($Vwk2nao2d33x) {
    $Veca2om3awughis->_set_style_side_width_important('padding','bottom',$Vwk2nao2d33x);
  }

  function set_padding_left($Vwk2nao2d33x) {
    $Veca2om3awughis->_set_style_side_width_important('padding','left',$Vwk2nao2d33x);
  }

  function set_padding($Vwk2nao2d33x) {
    $Vwk2nao2d33x = str_replace("none", "0px", $Vwk2nao2d33x);
    $Veca2om3awughis->_set_style_type_important('padding','',$Vwk2nao2d33x);
  }
  

  
  protected function _set_border($V5qa0rylnggy, $V5kdivqyx0yw, $Vfhiq1lhsojamportant) {
    $V5kdivqyx0yw = preg_replace("/\s*\,\s*/", ",", $V5kdivqyx0yw);
    
    $Vd5mgesqkq2x = explode(" ", $V5kdivqyx0yw);

    
 
    
    
    $Veca2om3awughis->_set_style_side_type('border',$V5qa0rylnggy,'_style',self::$V2zslaclzvum['border_'.$V5qa0rylnggy.'_style'],$Vfhiq1lhsojamportant);
    $Veca2om3awughis->_set_style_side_type('border',$V5qa0rylnggy,'_width',self::$V2zslaclzvum['border_'.$V5qa0rylnggy.'_width'],$Vfhiq1lhsojamportant);
    $Veca2om3awughis->_set_style_side_type('border',$V5qa0rylnggy,'_color',self::$V2zslaclzvum['border_'.$V5qa0rylnggy.'_color'],$Vfhiq1lhsojamportant);

    foreach ($Vd5mgesqkq2x as $Vwk2nao2d33xue) {
      $Vwk2nao2d33xue = trim($Vwk2nao2d33xue);
      if ( in_array($Vwk2nao2d33xue, self::$Vg1yfrcrtjk3) ) {
        $Veca2om3awughis->_set_style_side_type('border',$V5qa0rylnggy,'_style',$Vwk2nao2d33xue,$Vfhiq1lhsojamportant);

      } else if ( preg_match("/[.0-9]+(?:px|pt|pc|em|ex|%|in|mm|cm)|(?:thin|medium|thick)/", $Vwk2nao2d33xue ) ) {
        $Veca2om3awughis->_set_style_side_type('border',$V5qa0rylnggy,'_width',$Vwk2nao2d33xue,$Vfhiq1lhsojamportant);

      } else {
        
        $Veca2om3awughis->_set_style_side_type('border',$V5qa0rylnggy,'_color',$Vwk2nao2d33xue,$Vfhiq1lhsojamportant);
      }
    }

    
    $Veca2om3awughis->_prop_cache['border_'.$V5qa0rylnggy] = null;
    $Veca2om3awughis->_props['border_'.$V5qa0rylnggy] = $V5kdivqyx0yw;
  }

  
  function set_border_top($Vwk2nao2d33x) { $Veca2om3awughis->_set_border("top", $Vwk2nao2d33x, isset($Veca2om3awughis->_important_props['border_top'])); }
  function set_border_right($Vwk2nao2d33x) { $Veca2om3awughis->_set_border("right", $Vwk2nao2d33x, isset($Veca2om3awughis->_important_props['border_right'])); }
  function set_border_bottom($Vwk2nao2d33x) { $Veca2om3awughis->_set_border("bottom", $Vwk2nao2d33x, isset($Veca2om3awughis->_important_props['border_bottom'])); }
  function set_border_left($Vwk2nao2d33x) { $Veca2om3awughis->_set_border("left", $Vwk2nao2d33x, isset($Veca2om3awughis->_important_props['border_left'])); }

  function set_border($Vwk2nao2d33x) {
    $Vfhiq1lhsojamportant = isset($Veca2om3awughis->_important_props["border"]);
    $Veca2om3awughis->_set_border("top", $Vwk2nao2d33x, $Vfhiq1lhsojamportant);
    $Veca2om3awughis->_set_border("right", $Vwk2nao2d33x, $Vfhiq1lhsojamportant);
    $Veca2om3awughis->_set_border("bottom", $Vwk2nao2d33x, $Vfhiq1lhsojamportant);
    $Veca2om3awughis->_set_border("left", $Vwk2nao2d33x, $Vfhiq1lhsojamportant);
    
    $Veca2om3awughis->_prop_cache["border"] = null;
    $Veca2om3awughis->_props["border"] = $Vwk2nao2d33x;
  }

  function set_border_width($Vwk2nao2d33x) {
    $Veca2om3awughis->_set_style_type_important('border','_width',$Vwk2nao2d33x);
  }

  function set_border_color($Vwk2nao2d33x) {
    $Veca2om3awughis->_set_style_type_important('border','_color',$Vwk2nao2d33x);
  }

  function set_border_style($Vwk2nao2d33x) {
    $Veca2om3awughis->_set_style_type_important('border','_style',$Vwk2nao2d33x);
  }

  
  function set_outline($Vwk2nao2d33x) {
    $Vfhiq1lhsojamportant = isset($Veca2om3awughis->_important_props["outline"]);
    
    $Vmscaatmpbzus = array(
      "outline_style", 
      "outline_width", 
      "outline_color",
    );
    
    foreach($Vmscaatmpbzus as $Vmscaatmpbzu) {
      $Vjuvirroydwv = self::$V2zslaclzvum[$Vmscaatmpbzu];
      
      if ( !isset($Veca2om3awughis->_important_props[$Vmscaatmpbzu]) || $Vfhiq1lhsojamportant) {
        
        $Veca2om3awughis->_prop_cache[$Vmscaatmpbzu] = null;
        if ($Vfhiq1lhsojamportant) {
          $Veca2om3awughis->_important_props[$Vmscaatmpbzu] = true;
        }
        $Veca2om3awughis->_props[$Vmscaatmpbzu] = $Vjuvirroydwv;
      }
    }
    
    $Vwk2nao2d33x = preg_replace("/\s*\,\s*/", ",", $Vwk2nao2d33x); 
    $Vd5mgesqkq2x = explode(" ", $Vwk2nao2d33x);
    foreach ($Vd5mgesqkq2x as $Vwk2nao2d33xue) {
      $Vwk2nao2d33xue = trim($Vwk2nao2d33xue);
      if ( in_array($Vwk2nao2d33xue, self::$Vg1yfrcrtjk3) ) {
        $Veca2om3awughis->set_outline_style($Vwk2nao2d33xue);
      } else if ( preg_match("/[.0-9]+(?:px|pt|pc|em|ex|%|in|mm|cm)|(?:thin|medium|thick)/", $Vwk2nao2d33xue ) ) {
        $Veca2om3awughis->set_outline_width($Vwk2nao2d33xue);
      } else {
        
        $Veca2om3awughis->set_outline_color($Vwk2nao2d33xue);
      }
    }
    
    
    $Veca2om3awughis->_prop_cache["outline"] = null;
    $Veca2om3awughis->_props["outline"] = $Vwk2nao2d33x;
  }

  function set_outline_width($Vwk2nao2d33x) {
    $Veca2om3awughis->_set_style_type_important('outline','_width',$Vwk2nao2d33x);
  }

  function set_outline_color($Vwk2nao2d33x) {
    $Veca2om3awughis->_set_style_type_important('outline','_color',$Vwk2nao2d33x);
  }

  function set_outline_style($Vwk2nao2d33x) {
    $Veca2om3awughis->_set_style_type_important('outline','_style',$Vwk2nao2d33x);
  }
  


  
  function set_border_spacing($Vwk2nao2d33x) {
    $Vd5mgesqkq2x = explode(" ", $Vwk2nao2d33x);

    if ( count($Vd5mgesqkq2x) == 1 )
      $Vd5mgesqkq2x[1] = $Vd5mgesqkq2x[0];

    
    $Veca2om3awughis->_prop_cache["border_spacing"] = null;
    $Veca2om3awughis->_props["border_spacing"] = "$Vd5mgesqkq2x[0] $Vd5mgesqkq2x[1]";
  }

  
  function set_list_style_image($Vwk2nao2d33x) {
    
    $Veca2om3awughis->_prop_cache["list_style_image"] = null;
    $Veca2om3awughis->_props["list_style_image"] = $Veca2om3awughis->_image($Vwk2nao2d33x);
  }

  
  function set_list_style($Vwk2nao2d33x) {
    $Vfhiq1lhsojamportant = isset($Veca2om3awughis->_important_props["list_style"]);
    $Vd5mgesqkq2x = explode(" ", str_replace(",", " ", $Vwk2nao2d33x));

    static $V4pigtpor0lns = array(
      "disc", "circle", "square", 
      "decimal-leading-zero", "decimal", "1",
      "lower-roman", "upper-roman", "a", "A",
      "lower-greek", 
      "lower-latin", "upper-latin", 
      "lower-alpha", "upper-alpha", 
      "armenian", "georgian", "hebrew",
      "cjk-ideographic", "hiragana", "katakana",
      "hiragana-iroha", "katakana-iroha", "none"
    );

    static $Vv3hdohvn1hhitions = array("inside", "outside");

    foreach ($Vd5mgesqkq2x as $Vwk2nao2d33xue) {
      
      if ($Vwk2nao2d33xue === "none") {
         $Veca2om3awughis->_set_style("list_style_type", $Vwk2nao2d33xue, $Vfhiq1lhsojamportant);
         $Veca2om3awughis->_set_style("list_style_image", $Vwk2nao2d33xue, $Vfhiq1lhsojamportant);
        continue;
      }

      
      
      
      
       
      if (mb_substr($Vwk2nao2d33xue, 0, 3) === "url") {
        $Veca2om3awughis->_set_style("list_style_image", $Veca2om3awughis->_image($Vwk2nao2d33xue), $Vfhiq1lhsojamportant);
        continue;
      }

      if ( in_array($Vwk2nao2d33xue, $V4pigtpor0lns) ) {
        $Veca2om3awughis->_set_style("list_style_type", $Vwk2nao2d33xue, $Vfhiq1lhsojamportant);
      } else if ( in_array($Vwk2nao2d33xue, $Vv3hdohvn1hhitions) ) {
        $Veca2om3awughis->_set_style("list_style_position", $Vwk2nao2d33xue, $Vfhiq1lhsojamportant);
      }
    }

    
    $Veca2om3awughis->_prop_cache["list_style"] = null;
    $Veca2om3awughis->_props["list_style"] = $Vwk2nao2d33x;
  }
  
  function set_size($Vwk2nao2d33x) {
    $Volq3gdvkuqp_re = "/(\d+\s*(?:pt|px|pc|em|ex|in|cm|mm|%))/";

    $Vwk2nao2d33x = mb_strtolower($Vwk2nao2d33x);
    
    if ( $Vwk2nao2d33x === "auto" ) {
      return;
    }
        
    $Vd01eedayprh = preg_split("/\s+/", $Vwk2nao2d33x);
    
    $Vcin3t35pshx = array();
    if ( preg_match($Volq3gdvkuqp_re, $Vd01eedayprh[0]) ) {
      $Vcin3t35pshx[] = $Veca2om3awughis->length_in_pt($Vd01eedayprh[0]);
      
      if ( isset($Vd01eedayprh[1]) && preg_match($Volq3gdvkuqp_re, $Vd01eedayprh[1]) ) {
        $Vcin3t35pshx[] = $Veca2om3awughis->length_in_pt($Vd01eedayprh[1]);
      }
      else {
        $Vcin3t35pshx[] = $Vcin3t35pshx[0];
      }
    }
    elseif ( isset(CPDF_Adapter::$Vcn1kpkzkzeg[$Vd01eedayprh[0]]) ) {
      $Vcin3t35pshx = array_slice(CPDF_Adapter::$Vcn1kpkzkzeg[$Vd01eedayprh[0]], 2, 2);
      
      if ( isset($Vd01eedayprh[1]) && $Vd01eedayprh[1] === "landscape" ) {
        $Vcin3t35pshx = array_reverse($Vcin3t35pshx);
      }
    }
    else {
      return;
    }
    
    $Veca2om3awughis->_props["size"] = $Vcin3t35pshx;
  }
  
  
  function set_transform($Vwk2nao2d33x) {
    $V2xlryyxxahg   = "\s*([^,\s]+)\s*";
    $Vbpzcdh54wui = "\s*([^,\s]+)\s*";
    $Vdbkfmikyl2i    = "\s*([^,\s]+(?:deg|rad)?)\s*";
    
    if( !preg_match_all("/[a-z]+\([^\)]+\)/i", $Vwk2nao2d33x, $Vd01eedayprh, PREG_SET_ORDER) ) {
      return;
    }
    
    $Vytu1mqfpark = array(
      
    
      "translate"  => "\($Vbpzcdh54wui(?:,$Vbpzcdh54wui)?\)",
      "translateX" => "\($Vbpzcdh54wui\)",
      "translateY" => "\($Vbpzcdh54wui\)",
    
      "scale"      => "\($V2xlryyxxahg(?:,$V2xlryyxxahg)?\)",
      "scaleX"     => "\($V2xlryyxxahg\)",
      "scaleY"     => "\($V2xlryyxxahg\)",
    
      "rotate"     => "\($Vdbkfmikyl2i\)",
    
      "skew"       => "\($Vdbkfmikyl2i(?:,$Vdbkfmikyl2i)?\)",
      "skewX"      => "\($Vdbkfmikyl2i\)",
      "skewY"      => "\($Vdbkfmikyl2i\)",
    );
    
    $V0czathwx13s = array();
    
    foreach($Vd01eedayprh as $Vjgmysulapsg) {
      $Veca2om3awug = $Vjgmysulapsg[0];
      
      foreach($Vytu1mqfpark as $Vcvluzjs3wzb => $Vbuaty1lgmiq) {
        if (preg_match("/$Vcvluzjs3wzb\s*$Vbuaty1lgmiq/i", $Veca2om3awug, $Vkvvdnwtmjnqes)) {
          $Vwk2nao2d33xues = array_slice($Vkvvdnwtmjnqes, 1);
          
          switch($Vcvluzjs3wzb) {
            
            case "rotate":
            case "skew":
            case "skewX":
            case "skewY":
              
              foreach($Vwk2nao2d33xues as $Vfhiq1lhsoja => $Vwk2nao2d33xue) {
                if ( strpos($Vwk2nao2d33xue, "rad") ) 
                  $Vwk2nao2d33xues[$Vfhiq1lhsoja] = rad2deg(floatval($Vwk2nao2d33xue));
                else
                  $Vwk2nao2d33xues[$Vfhiq1lhsoja] = floatval($Vwk2nao2d33xue);
              }
              
              switch($Vcvluzjs3wzb) {
                case "skew":
                  if ( !isset($Vwk2nao2d33xues[1]) ) 
                    $Vwk2nao2d33xues[1] = 0;
                break;
                case "skewX":
                  $Vcvluzjs3wzb = "skew";
                  $Vwk2nao2d33xues = array($Vwk2nao2d33xues[0], 0);
                break;
                case "skewY":
                  $Vcvluzjs3wzb = "skew";
                  $Vwk2nao2d33xues = array(0, $Vwk2nao2d33xues[0]);
                break;
              }
            break;
            
            
            case "translate":
              $Vwk2nao2d33xues[0] = $Veca2om3awughis->length_in_pt($Vwk2nao2d33xues[0], $Veca2om3awughis->width);
              
              if ( isset($Vwk2nao2d33xues[1]) ) 
                $Vwk2nao2d33xues[1] = $Veca2om3awughis->length_in_pt($Vwk2nao2d33xues[1], $Veca2om3awughis->height);
              else
                $Vwk2nao2d33xues[1] = 0;
            break;
            
            case "translateX":
              $Vcvluzjs3wzb = "translate";
              $Vwk2nao2d33xues = array($Veca2om3awughis->length_in_pt($Vwk2nao2d33xues[0], $Veca2om3awughis->width), 0);
            break;
            
            case "translateY":
              $Vcvluzjs3wzb = "translate";
              $Vwk2nao2d33xues = array(0, $Veca2om3awughis->length_in_pt($Vwk2nao2d33xues[0], $Veca2om3awughis->height));
            break;
            
            
            case "scale":
              if ( !isset($Vwk2nao2d33xues[1]) ) 
                $Vwk2nao2d33xues[1] = $Vwk2nao2d33xues[0];
            break;
            
            case "scaleX":
              $Vcvluzjs3wzb = "scale";
              $Vwk2nao2d33xues = array($Vwk2nao2d33xues[0], 1.0);
            break;
            
            case "scaleY":
              $Vcvluzjs3wzb = "scale";
              $Vwk2nao2d33xues = array(1.0, $Vwk2nao2d33xues[0]);
            break;
          }
          
          $V0czathwx13s[] = array(
            $Vcvluzjs3wzb, 
            $Vwk2nao2d33xues,
          );
        }
      }
    }
    
    
    $Veca2om3awughis->_prop_cache["transform"] = null;
    $Veca2om3awughis->_props["transform"] = $V0czathwx13s;
  }
  
  function set__webkit_transform($Vwk2nao2d33x) {
    return $Veca2om3awughis->set_transform($Vwk2nao2d33x);
  }
  
  function set__webkit_transform_origin($Vwk2nao2d33x) {
    return $Veca2om3awughis->set_transform_origin($Vwk2nao2d33x);
  }
  
  
  function set_transform_origin($Vwk2nao2d33x) {
    $Vwk2nao2d33xues = preg_split("/\s+/", $Vwk2nao2d33x);
    
    if ( count($Vwk2nao2d33xues) === 0) {
      return;
    }
    
    foreach($Vwk2nao2d33xues as &$Vwk2nao2d33xue) {
      if ( in_array($Vwk2nao2d33xue, array("top", "left")) ) {
        $Vwk2nao2d33xue = 0;
      }
      
      if ( in_array($Vwk2nao2d33xue, array("bottom", "right")) ) {
        $Vwk2nao2d33xue = "100%";
      }
    }
    
    if ( !isset($Vwk2nao2d33xues[1]) ) {
      $Vwk2nao2d33xues[1] = $Vwk2nao2d33xues[0];
    }
    
    
    $Veca2om3awughis->_prop_cache["transform_origin"] = null;
    $Veca2om3awughis->_props["transform_origin"] = $Vwk2nao2d33xues;
  }
  
  protected function parse_image_resolution($Vwk2nao2d33x) {
    
    
    
    $V5wjp3qep3yz = '/^\s*(\d+|normal|auto)\s*$/';
    
    if ( !preg_match($V5wjp3qep3yz, $Vwk2nao2d33x, $Vkvvdnwtmjnqes) ) {
      return null;
    }
    
    return $Vkvvdnwtmjnqes[1];
  }
  
  
  function set_background_image_resolution($Vwk2nao2d33x) {
    $Ve5ms1x5pzfw = $Veca2om3awughis->parse_image_resolution($Vwk2nao2d33x);
    
    $Veca2om3awughis->_prop_cache["background_image_resolution"] = null;
    $Veca2om3awughis->_props["background_image_resolution"] = $Ve5ms1x5pzfw;
  }
  
  
  function set_image_resolution($Vwk2nao2d33x) {
    $Ve5ms1x5pzfw = $Veca2om3awughis->parse_image_resolution($Vwk2nao2d33x);
    
    $Veca2om3awughis->_prop_cache["image_resolution"] = null;
    $Veca2om3awughis->_props["image_resolution"] = $Ve5ms1x5pzfw;
  }
  
  function set__dompdf_background_image_resolution($Vwk2nao2d33x) {
    return $Veca2om3awughis->set_background_image_resolution($Vwk2nao2d33x);
  }
  
  function set__dompdf_image_resolution($Vwk2nao2d33x) {
    return $Veca2om3awughis->set_image_resolution($Vwk2nao2d33x);
  }

  function set_z_index($Vwk2nao2d33x) {
    if ( round($Vwk2nao2d33x) != $Vwk2nao2d33x && $Vwk2nao2d33x !== "auto" ) {
      return;
    }

    $Veca2om3awughis->_prop_cache["z_index"] = null;
    $Veca2om3awughis->_props["z_index"] = $Vwk2nao2d33x;
  }
  
  function set_counter_increment($Vwk2nao2d33x) {
    $Vwk2nao2d33x = trim($Vwk2nao2d33x);
    $Vwk2nao2d33xue = null;
    
    if ( in_array($Vwk2nao2d33x, array("none", "inherit")) ) {
      $Vwk2nao2d33xue = $Vwk2nao2d33x;
    }
    else {
      if ( preg_match_all("/(".self::CSS_IDENTIFIER.")(?:\s+(".self::CSS_INTEGER."))?/", $Vwk2nao2d33x, $Vkvvdnwtmjnqes, PREG_SET_ORDER) ){
        $Vwk2nao2d33xue = array();
        foreach($Vkvvdnwtmjnqes as $Vkvvdnwtmjnq) {
          $Vwk2nao2d33xue[$Vkvvdnwtmjnq[1]] = isset($Vkvvdnwtmjnq[2]) ? $Vkvvdnwtmjnq[2] : 1;
        }
      }
    }

    $Veca2om3awughis->_prop_cache["counter_increment"] = null;
    $Veca2om3awughis->_props["counter_increment"] = $Vwk2nao2d33xue;
  }

  
 
  function __toString() {
    return print_r(array_merge(array("parent_font_size" => $Veca2om3awughis->_parent_font_size),
                               $Veca2om3awughis->_props), true);
  }

  function debug_print()
  {
    print "parent_font_size:".$Veca2om3awughis->_parent_font_size . ";\n";
    foreach($Veca2om3awughis->_props as $Vmscaatmpbzu => $Vwk2nao2d33x ) {
      print $Vmscaatmpbzu.':'.$Vwk2nao2d33x;
      if (isset($Veca2om3awughis->_important_props[$Vmscaatmpbzu])) {
        print '!important';
      }
      print ";\n";
    }
  }
}
