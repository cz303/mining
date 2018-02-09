<?php



abstract class Frame_Reflower {

  
  protected $Vvvuswijwhvo;

  
  protected $Vdxqhucxete0;
  
  function __construct(Frame $Vrlbsjbjglkb) {
    $Veca2om3awughis->_frame = $Vrlbsjbjglkb;
    $Veca2om3awughis->_min_max_cache = null;
  }

  function dispose() {
    clear_object($Veca2om3awughis);
  }

  
  protected function _collapse_margins() {
    $Vrlbsjbjglkb = $Veca2om3awughis->_frame;
    $Vstfrw5akne1 = $Vrlbsjbjglkb->get_containing_block();
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    
    if ( !$Vrlbsjbjglkb->is_in_flow() ) {
      return;
    }

    $Veca2om3awug = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->margin_top, $Vstfrw5akne1["h"]);
    $V4t3fwdd3eev = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->margin_bottom, $Vstfrw5akne1["h"]);

    
    if ( $Veca2om3awug === "auto" ) {
      $Vdtcpflt5bhp->margin_top = "0pt";
      $Veca2om3awug = 0;
    }

    if ( $V4t3fwdd3eev === "auto" ) {
      $Vdtcpflt5bhp->margin_bottom = "0pt";
      $V4t3fwdd3eev = 0;
    }

    
    $Vmwwo1qnmepz = $Vrlbsjbjglkb->get_next_sibling();
    if ( $Vmwwo1qnmepz && !$Vmwwo1qnmepz->is_block() ) {
      while ( $Vmwwo1qnmepz = $Vmwwo1qnmepz->get_next_sibling() ) {
        if ( $Vmwwo1qnmepz->is_block() ) {
          break;
        }
        
        if ( !$Vmwwo1qnmepz->get_first_child() ) {
          $Vmwwo1qnmepz = null;
          break;
        }
      }
    }
    
    if ( $Vmwwo1qnmepz ) {
      $Vmwwo1qnmepz_style = $Vmwwo1qnmepz->get_style();
      $V4t3fwdd3eev = max($V4t3fwdd3eev, $Vmwwo1qnmepz_style->length_in_pt($Vmwwo1qnmepz_style->margin_top, $Vstfrw5akne1["h"]));
      $Vmwwo1qnmepz_style->margin_top = "0pt";
      $Vdtcpflt5bhp->margin_bottom = $V4t3fwdd3eev."pt";
    }

    
    
  }

  

  abstract function reflow(Frame_Decorator $V4t3fwdd3eevlock = null);

  

  
  
  
  
  function get_min_max_width() {
    if ( !is_null($Veca2om3awughis->_min_max_cache) ) {
      return $Veca2om3awughis->_min_max_cache;
    }
    
    $Vdtcpflt5bhp = $Veca2om3awughis->_frame->get_style();

    
    $Vko3el2sr5ba = array($Vdtcpflt5bhp->padding_left,
                  $Vdtcpflt5bhp->padding_right,
                  $Vdtcpflt5bhp->border_left_width,
                  $Vdtcpflt5bhp->border_right_width,
                  $Vdtcpflt5bhp->margin_left,
                  $Vdtcpflt5bhp->margin_right);

    $Vstfrw5akne1_w = $Veca2om3awughis->_frame->get_containing_block("w");
    $V4jxxjosqkw5 = $Vdtcpflt5bhp->length_in_pt($Vko3el2sr5ba, $Vstfrw5akne1_w);

    
    if ( !$Veca2om3awughis->_frame->get_first_child() )
      return $Veca2om3awughis->_min_max_cache = array($V4jxxjosqkw5, $V4jxxjosqkw5,"min" => $V4jxxjosqkw5, "max" => $V4jxxjosqkw5);

    $Vqfxr2onhnwu = array();
    $V02kaq5uxpu4 = array();

    for ( $V3m11hrbzjfu = $Veca2om3awughis->_frame->get_children()->getIterator();
          $V3m11hrbzjfu->valid();
          $V3m11hrbzjfu->next() ) {

      $Vivvmr201rz3 = 0;
      $Vpirthufqjff = 0;

      
      while ( $V3m11hrbzjfu->valid() && in_array( $V3m11hrbzjfu->current()->get_style()->display, Style::$Vtttdeaid2sg ) ) {

        $Vcnoizcxjx0n = $V3m11hrbzjfu->current();

        $Vk3yuhlbtzjs = $Vcnoizcxjx0n->get_min_max_width();

        if ( in_array( $V3m11hrbzjfu->current()->get_style()->white_space, array("pre", "nowrap") ) )
          $Vivvmr201rz3 += $Vk3yuhlbtzjs["min"];
        else
          $Vqfxr2onhnwu[] = $Vk3yuhlbtzjs["min"];

        $Vpirthufqjff += $Vk3yuhlbtzjs["max"];
        $V3m11hrbzjfu->next();

      }

      if ( $Vpirthufqjff > 0 )
        $V02kaq5uxpu4[] = $Vpirthufqjff;

      if ( $Vivvmr201rz3 > 0 )
        $Vqfxr2onhnwu[] = $Vivvmr201rz3;

      if ( $V3m11hrbzjfu->valid() ) {
        list($Vqfxr2onhnwu[], $V02kaq5uxpu4[]) = $V3m11hrbzjfu->current()->get_min_max_width();
        continue;
      }

    }
    $Va110n5xyul0 = count($Vqfxr2onhnwu) ? max($Vqfxr2onhnwu) : 0;
    $Vpu53dziligd = count($V02kaq5uxpu4) ? max($V02kaq5uxpu4) : 0;

    
    
    $Vojs2qdgagwv = $Vdtcpflt5bhp->width;
    if ( $Vojs2qdgagwv !== "auto" && !is_percent($Vojs2qdgagwv) ) {
      $Vojs2qdgagwv = $Vdtcpflt5bhp->length_in_pt($Vojs2qdgagwv, $Vstfrw5akne1_w);
      if ( $Va110n5xyul0 < $Vojs2qdgagwv )
        $Va110n5xyul0 = $Vojs2qdgagwv;
      if ( $Vpu53dziligd < $Vojs2qdgagwv )
        $Vpu53dziligd = $Vojs2qdgagwv;
    }

    $Va110n5xyul0 += $V4jxxjosqkw5;
    $Vpu53dziligd += $V4jxxjosqkw5;
    return $Veca2om3awughis->_min_max_cache = array($Va110n5xyul0, $Vpu53dziligd, "min"=>$Va110n5xyul0, "max"=>$Vpu53dziligd);
  }

  
  protected function _parse_string($Vlkger5ehs4w, $V0edm3cw4mmq = false) {
    if ($V0edm3cw4mmq) {
      $Vlkger5ehs4w = preg_replace("/^[\"\']/", "", $Vlkger5ehs4w);
      $Vlkger5ehs4w = preg_replace("/[\"\']$/", "", $Vlkger5ehs4w);
    }
    else {
      $Vlkger5ehs4w = trim($Vlkger5ehs4w, "'\"");
    }
    
    $Vlkger5ehs4w = str_replace(array("\\\n",'\\"',"\\'"),
                          array("",'"',"'"), $Vlkger5ehs4w);

    
    $Vlkger5ehs4w = preg_replace_callback("/\\\\([0-9a-fA-F]{0,6})(\s)?(?(2)|(?=[^0-9a-fA-F]))/",
                                    create_function('$Vt3xexsia3ta',
                                                    'return chr(hexdec($Vt3xexsia3ta[1]));'),
                                    $Vlkger5ehs4w);
    return $Vlkger5ehs4w;
  }
  
  
  protected function _parse_quotes() {
    
    
    $V5wjp3qep3yz = "/(\'[^\']*\')|(\"[^\"]*\")/";
    
    $Vmpk2jerbfrf = $Veca2om3awughis->_frame->get_style()->quotes;
      
    
    if (!preg_match_all($V5wjp3qep3yz, "$Vmpk2jerbfrf", $Vt3xexsia3ta, PREG_SET_ORDER))
      return;
      
    $Vmpk2jerbfrf_array = array();
    foreach($Vt3xexsia3ta as &$Vgwkk3m5ni5l){
      $Vmpk2jerbfrf_array[] = $Veca2om3awughis->_parse_string($Vgwkk3m5ni5l[0], true);
    }
    
    if ( empty($Vmpk2jerbfrf_array) ) {
      $Vmpk2jerbfrf_array = array('"', '"');
    }
    
    return array_chunk($Vmpk2jerbfrf_array, 2);
  }

  
  protected function _parse_content() {

    
    $V5wjp3qep3yz = "/\n".
      "\s(counters?\\([^)]*\\))|\n".
      "\A(counters?\\([^)]*\\))|\n".
      "\s([\"']) ( (?:[^\"']|\\\\[\"'])+ )(?<!\\\\)\\3|\n".
      "\A([\"']) ( (?:[^\"']|\\\\[\"'])+ )(?<!\\\\)\\5|\n" .
      "\s([^\s\"']+)|\n" .
      "\A([^\s\"']+)\n".
      "/xi";
    
    $Vuodfnw5ilgc = $Veca2om3awughis->_frame->get_style()->content;

    $Vmpk2jerbfrf = $Veca2om3awughis->_parse_quotes();
    
    
    if (!preg_match_all($V5wjp3qep3yz, $Vuodfnw5ilgc, $Vt3xexsia3ta, PREG_SET_ORDER))
      return;
      
    $Veca2om3awugext = "";

    foreach ($Vt3xexsia3ta as $Vkvvdnwtmjnq) {
      
      if ( isset($Vkvvdnwtmjnq[2]) && $Vkvvdnwtmjnq[2] !== "" )
        $Vkvvdnwtmjnq[1] = $Vkvvdnwtmjnq[2];

      if ( isset($Vkvvdnwtmjnq[6]) && $Vkvvdnwtmjnq[6] !== "" )
        $Vkvvdnwtmjnq[4] = $Vkvvdnwtmjnq[6];

      if ( isset($Vkvvdnwtmjnq[8]) && $Vkvvdnwtmjnq[8] !== "" )
        $Vkvvdnwtmjnq[7] = $Vkvvdnwtmjnq[8];

      if ( isset($Vkvvdnwtmjnq[1]) && $Vkvvdnwtmjnq[1] !== "" ) {
        
        
        $Vkvvdnwtmjnq[1] = mb_strtolower(trim($Vkvvdnwtmjnq[1]));

        
        

        $Vfhiq1lhsoja = mb_strpos($Vkvvdnwtmjnq[1], ")");
        if ( $Vfhiq1lhsoja === false )
          continue;

        $Vrukcxz5icxf = explode(",", mb_substr($Vkvvdnwtmjnq[1], 8, $Vfhiq1lhsoja - 8));
        $Vwnlq1bt4he3 = $Vrukcxz5icxf[0];

        if ( $Vkvvdnwtmjnq[1][7] === "(" ) {
          

          if ( isset($Vrukcxz5icxf[1]) )
            $Veca2om3awugype = trim($Vrukcxz5icxf[1]);
          else
            $Veca2om3awugype = null;

          $Vzqw0ieauwu4 = $Veca2om3awughis->_frame->lookup_counter_frame($Vwnlq1bt4he3);
          
          $Veca2om3awugext .= $Vzqw0ieauwu4->counter_value($Vwnlq1bt4he3, $Veca2om3awugype);

        } else if ( $Vkvvdnwtmjnq[1][7] === "s" ) {
          
          if ( isset($Vrukcxz5icxf[1]) )
            $Vlkger5ehs4w = $Veca2om3awughis->_parse_string(trim($Vrukcxz5icxf[1]));
          else
            $Vlkger5ehs4w = "";

          if ( isset($Vrukcxz5icxf[2]) )
            $Veca2om3awugype = $Vrukcxz5icxf[2];
          else
            $Veca2om3awugype = null;

          $Vzqw0ieauwu4 = $Veca2om3awughis->_frame->lookup_counter_frame($Vwnlq1bt4he3);
          $Veca2om3awugmp = "";
          while ($Vzqw0ieauwu4) {
            $Veca2om3awugmp = $Vzqw0ieauwu4->counter_value($Vwnlq1bt4he3, $Veca2om3awugype) . $Vlkger5ehs4w . $Veca2om3awugmp;
            $Vzqw0ieauwu4 = $Vzqw0ieauwu4->lookup_counter_frame($Vwnlq1bt4he3);
          }
          $Veca2om3awugext .= $Veca2om3awugmp;

        } else
          
          continue;

      } else if ( isset($Vkvvdnwtmjnq[4]) && $Vkvvdnwtmjnq[4] !== "" ) {
        
        $Veca2om3awugext .= $Veca2om3awughis->_parse_string($Vkvvdnwtmjnq[4]);

      } else if ( isset($Vkvvdnwtmjnq[7]) && $Vkvvdnwtmjnq[7] !== "" ) {
        

        if ( $Vkvvdnwtmjnq[7] === "open-quote" ) {
          
          $Veca2om3awugext .= $Vmpk2jerbfrf[0][0];
        } else if ( $Vkvvdnwtmjnq[7] === "close-quote" ) {
          
          $Veca2om3awugext .= $Vmpk2jerbfrf[0][1];
        } else if ( $Vkvvdnwtmjnq[7] === "no-open-quote" ) {
          
        } else if ( $Vkvvdnwtmjnq[7] === "no-close-quote" ) {
          
        } else if ( mb_strpos($Vkvvdnwtmjnq[7],"attr(") === 0 ) {

          $Vfhiq1lhsoja = mb_strpos($Vkvvdnwtmjnq[7],")");
          if ( $Vfhiq1lhsoja === false )
            continue;

          $V5v3aao2lape = mb_substr($Vkvvdnwtmjnq[7], 5, $Vfhiq1lhsoja - 5);
          if ( $V5v3aao2lape == "" )
            continue;
            
          $Veca2om3awugext .= $Veca2om3awughis->_frame->get_parent()->get_node()->getAttribute($V5v3aao2lape);
        } else
          continue;
      }
    }

    return $Veca2om3awugext;
  }
  
  
  protected function _set_content(){
    $Vrlbsjbjglkb = $Veca2om3awughis->_frame;
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
  
    if ( $Vdtcpflt5bhp->content && !$Vrlbsjbjglkb->get_first_child() && $Vrlbsjbjglkb->get_node()->nodeName === "dompdf_generated" ) {
      $Vuodfnw5ilgc = $Veca2om3awughis->_parse_content();
      $Vmwwo1qnmepzode = $Vrlbsjbjglkb->get_node()->ownerDocument->createTextNode($Vuodfnw5ilgc);
      
      $Vmwwo1qnmepzew_style = $Vdtcpflt5bhp->get_stylesheet()->create_style();
      $Vmwwo1qnmepzew_style->inherit($Vdtcpflt5bhp);
      
      $Vmwwo1qnmepzew_frame = new Frame($Vmwwo1qnmepzode);
      $Vmwwo1qnmepzew_frame->set_style($Vmwwo1qnmepzew_style);
      
      Frame_Factory::decorate_frame($Vmwwo1qnmepzew_frame, $Vrlbsjbjglkb->get_dompdf());
      $Vmwwo1qnmepzew_frame->get_decorator()->set_root($Vrlbsjbjglkb->get_root());
      $Vrlbsjbjglkb->append_child($Vmwwo1qnmepzew_frame);
    }
    
    if ( $Vdtcpflt5bhp->counter_reset && ($V5wjp3qep3yzset = $Vdtcpflt5bhp->counter_reset) !== "none" )
      $Vrlbsjbjglkb->reset_counter($V5wjp3qep3yzset);
    
    if ( $Vdtcpflt5bhp->counter_increment && ($Vfhiq1lhsojancrement = $Vdtcpflt5bhp->counter_increment) !== "none" )
      $Vrlbsjbjglkb->increment_counters($Vfhiq1lhsojancrement);
  }
}
