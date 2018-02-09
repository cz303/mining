<?php



class Text_Frame_Reflower extends Frame_Reflower {

  
  protected $Ve3dfu4bnuu4; 
  
  
  protected $Vvvuswijwhvo;
  
  public static $Viofbq1x5wjm = "/[ \t\r\n\f]+/u";

  function __construct(Text_Frame_Decorator $Vrlbsjbjglkb) { parent::__construct($Vrlbsjbjglkb); }

  

  protected function _collapse_white_space($Vkjdq1foihhi) {
    


    return preg_replace(self::$Viofbq1x5wjm, " ", $Vkjdq1foihhi);
  }

  

  protected function _line_break($Vkjdq1foihhi) {
    $Vdtcpflt5bhp = $Veca2om3awughis->_frame->get_style();
    $V4jbadwq4bzj = $Vdtcpflt5bhp->font_size;
    $Vj0kojsfk0h3 = $Vdtcpflt5bhp->font_family;
    $Vbpybrrjyvru = $Veca2om3awughis->_block_parent->get_current_line_box();
    
    
    $V0xqpecgdycr = $Veca2om3awughis->_frame->get_containing_block("w");
    $Vbpybrrjyvru_width = $Vbpybrrjyvru->left + $Vbpybrrjyvru->w + $Vbpybrrjyvru->right;
    
    $Vev4onvmjk1e = $V0xqpecgdycr - $Vbpybrrjyvru_width;

    
    $Vy2izp1ogoso = preg_split('/([\s-]+)/u', $Vkjdq1foihhi, -1, PREG_SPLIT_DELIM_CAPTURE);
    $V1fya2ghmnht = count($Vy2izp1ogoso);

    
    $V3ioe2zhnovg = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->word_spacing);
    $Vshdzmkj2dla = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->letter_spacing);

    
    $Vkjdq1foihhi_width = Font_Metrics::get_text_width($Vkjdq1foihhi, $Vj0kojsfk0h3, $V4jbadwq4bzj, $V3ioe2zhnovg, $Vshdzmkj2dla);
    $Vxclrl4lozyc =
      $Vdtcpflt5bhp->length_in_pt( array( $Vdtcpflt5bhp->margin_left,
                                   $Vdtcpflt5bhp->border_left_width,
                                   $Vdtcpflt5bhp->padding_left,
                                   $Vdtcpflt5bhp->padding_right,
                                   $Vdtcpflt5bhp->border_right_width,
                                   $Vdtcpflt5bhp->margin_right), $V0xqpecgdycr );
                                   
    $Vrlbsjbjglkb_width = $Vkjdq1foihhi_width + $Vxclrl4lozyc;












    if ( $Vrlbsjbjglkb_width <= $Vev4onvmjk1e )
      return false;

    
    $Vojs2qdgagwv = 0;
    $Vyqctydehp2e = "";
    reset($Vy2izp1ogoso);

    
    for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V1fya2ghmnht; $Vfhiq1lhsoja += 2) {
      $Vmtnkw2j4tyt = $Vy2izp1ogoso[$Vfhiq1lhsoja] . (isset($Vy2izp1ogoso[$Vfhiq1lhsoja+1]) ? $Vy2izp1ogoso[$Vfhiq1lhsoja+1] : "");
      $Vmtnkw2j4tyt_width = Font_Metrics::get_text_width($Vmtnkw2j4tyt, $Vj0kojsfk0h3, $V4jbadwq4bzj, $V3ioe2zhnovg, $Vshdzmkj2dla);
      if ( $Vojs2qdgagwv + $Vmtnkw2j4tyt_width + $Vxclrl4lozyc > $Vev4onvmjk1e )
        break;

      $Vojs2qdgagwv += $Vmtnkw2j4tyt_width;
      $Vyqctydehp2e .= $Vmtnkw2j4tyt;
    }

    $Vsklzowigquz = ($Vdtcpflt5bhp->word_wrap === "break-word");
    
    
    if ( $Vbpybrrjyvru_width == 0 && $Vojs2qdgagwv == 0 ) {
      
      $V2n430jknk35 = "";
      $Vx3gks3fl2zo = 0;
        
      if ( $Vsklzowigquz ) {
        for ( $Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < strlen($Vmtnkw2j4tyt); $Vzmnqyqjjodw++ ) {
          $V2n430jknk35 .= $Vmtnkw2j4tyt[$Vzmnqyqjjodw];
          $V1hgtvz3lirj = Font_Metrics::get_text_width($V2n430jknk35, $Vj0kojsfk0h3, $V4jbadwq4bzj, $V3ioe2zhnovg, $Vshdzmkj2dla);
          if ($V1hgtvz3lirj > $Vev4onvmjk1e) {
            break;
          }
          
          $Vx3gks3fl2zo = $V1hgtvz3lirj;
        }
      }
      
      if ( $Vsklzowigquz && $Vx3gks3fl2zo > 0 ) {
        $Vojs2qdgagwv += $Vx3gks3fl2zo;
        $Vyqctydehp2e .= substr($V2n430jknk35, 0, -1);
      }
      else {
        $Vojs2qdgagwv += $Vmtnkw2j4tyt_width;
        $Vyqctydehp2e .= $Vmtnkw2j4tyt;
      }
    }

    $Vortqlloirgz = mb_strlen($Vyqctydehp2e);






    return $Vortqlloirgz;

  }

  

  protected function _newline_break($Vkjdq1foihhi) {

    if ( ($Vfhiq1lhsoja = mb_strpos($Vkjdq1foihhi, "\n")) === false)
      return false;

    return $Vfhiq1lhsoja+1;

  }

  

  protected function _layout_line() {
    $Vrlbsjbjglkb = $Veca2om3awughis->_frame;
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    $Vkjdq1foihhi = $Vrlbsjbjglkb->get_text();
    $V4jbadwq4bzj = $Vdtcpflt5bhp->font_size;
    $Vj0kojsfk0h3 = $Vdtcpflt5bhp->font_family;

    
    $Vdtcpflt5bhp->height = Font_Metrics::get_font_height( $Vj0kojsfk0h3, $V4jbadwq4bzj );

    $V2n430jknk35plit = false;
    $V3aav4daeuwa = false;

    
    
    switch (strtolower($Vdtcpflt5bhp->text_transform)) {
      default: break;
      case "capitalize": $Vkjdq1foihhi = mb_convert_case($Vkjdq1foihhi, MB_CASE_TITLE); break;
      case "uppercase":  $Vkjdq1foihhi = mb_convert_case($Vkjdq1foihhi, MB_CASE_UPPER); break;
      case "lowercase":  $Vkjdq1foihhi = mb_convert_case($Vkjdq1foihhi, MB_CASE_LOWER); break;
    }
    
    
    
    switch ($Vdtcpflt5bhp->white_space) {

    default:
    case "normal":
      $Vrlbsjbjglkb->set_text( $Vkjdq1foihhi = $Veca2om3awughis->_collapse_white_space($Vkjdq1foihhi) );
      if ( $Vkjdq1foihhi == "" )
        break;

      $V2n430jknk35plit = $Veca2om3awughis->_line_break($Vkjdq1foihhi);
      break;

    case "pre":
      $V2n430jknk35plit = $Veca2om3awughis->_newline_break($Vkjdq1foihhi);
      $V3aav4daeuwa = $V2n430jknk35plit !== false;
      break;

    case "nowrap":
      $Vrlbsjbjglkb->set_text( $Vkjdq1foihhi = $Veca2om3awughis->_collapse_white_space($Vkjdq1foihhi) );
      break;

    case "pre-wrap":
      $V2n430jknk35plit = $Veca2om3awughis->_newline_break($Vkjdq1foihhi);

      if ( ($Vdln1z2oxpjs = $Veca2om3awughis->_line_break($Vkjdq1foihhi)) !== false ) {
        $V3aav4daeuwa = $V2n430jknk35plit < $Vdln1z2oxpjs;
        $V2n430jknk35plit = min($Vdln1z2oxpjs, $V2n430jknk35plit);
      } else
        $V3aav4daeuwa = true;

      break;

    case "pre-line":
      
      $Vrlbsjbjglkb->set_text( $Vkjdq1foihhi = preg_replace( "/[ \t]+/u", " ", $Vkjdq1foihhi ) );

      if ( $Vkjdq1foihhi == "" )
        break;

      $V2n430jknk35plit = $Veca2om3awughis->_newline_break($Vkjdq1foihhi);

      if ( ($Vdln1z2oxpjs = $Veca2om3awughis->_line_break($Vkjdq1foihhi)) !== false ) {
        $V3aav4daeuwa = $V2n430jknk35plit < $Vdln1z2oxpjs;
        $V2n430jknk35plit = min($Vdln1z2oxpjs, $V2n430jknk35plit);
      } else
        $V3aav4daeuwa = true;

      break;

    }

    
    if ( $Vkjdq1foihhi === "" )
      return;

    if ( $V2n430jknk35plit !== false) {

      
      if ( $V2n430jknk35plit == 0 && $Vkjdq1foihhi === " " ) {
        $Vrlbsjbjglkb->set_text("");
        return;
      }

      if ( $V2n430jknk35plit == 0 ) {

        
        

        $Veca2om3awughis->_block_parent->add_line();
        $Vrlbsjbjglkb->position();

        
        $Veca2om3awughis->_layout_line();

      } 
      
      else if ( $V2n430jknk35plit < mb_strlen($Vrlbsjbjglkb->get_text()) ) {
        
        $Vrlbsjbjglkb->split_text($V2n430jknk35plit);

        $Veca2om3awug = $Vrlbsjbjglkb->get_text();
        
        
        if ( $V2n430jknk35plit > 1 && $Veca2om3awug[$V2n430jknk35plit-1] === "\n" && !$Vrlbsjbjglkb->is_pre() )
          $Vrlbsjbjglkb->set_text( mb_substr($Veca2om3awug, 0, -1) );

        
        
        
        
        
      }

      if ( $V3aav4daeuwa ) {
        $Veca2om3awughis->_block_parent->add_line();
        $Vrlbsjbjglkb->position();
      }

    } else {

      
      
      
      $Veca2om3awug = $Vrlbsjbjglkb->get_text();
      $V3jkqexf4nr0 = $Vrlbsjbjglkb->get_parent();
      $Vfhiq1lhsojas_inline_frame = get_class($V3jkqexf4nr0) === 'Inline_Frame_Decorator';
      
      if ((!$Vfhiq1lhsojas_inline_frame && !$Vrlbsjbjglkb->get_next_sibling()) || 
          ( $Vfhiq1lhsojas_inline_frame && !$V3jkqexf4nr0->get_next_sibling())) {
        $Veca2om3awug = rtrim($Veca2om3awug);
      }
      
      if ((!$Vfhiq1lhsojas_inline_frame && !$Vrlbsjbjglkb->get_prev_sibling())) { 
        $Veca2om3awug = ltrim($Veca2om3awug);
      }
      
      $Vrlbsjbjglkb->set_text( $Veca2om3awug );
      
    }

    
    $Vojs2qdgagwv = $Vrlbsjbjglkb->recalculate_width();
  }

  

  function reflow(Frame_Decorator $V4uturqtpcq5 = null) {
    $Vrlbsjbjglkb = $Veca2om3awughis->_frame;
    $Vmt0302hgn5x = $Vrlbsjbjglkb->get_root();
    $Vmt0302hgn5x->check_forced_page_break($Veca2om3awughis->_frame);
    
    if ( $Vmt0302hgn5x->is_full() )
      return;

    $Veca2om3awughis->_block_parent = $Vrlbsjbjglkb->find_block_parent();

    
    





    
    $Vrlbsjbjglkb->position();

    $Veca2om3awughis->_layout_line();
    
    if ( $V4uturqtpcq5 ) {
      $V4uturqtpcq5->add_frame_to_line($Vrlbsjbjglkb);
    }
  }

  

  
  
  function get_min_max_width() {
    
    $Vrlbsjbjglkb = $Veca2om3awughis->_frame;
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    $Veca2om3awughis->_block_parent = $Vrlbsjbjglkb->find_block_parent();
    $V0xqpecgdycr = $Vrlbsjbjglkb->get_containing_block("w");

    $Vyqctydehp2e = $Vkjdq1foihhi = $Vrlbsjbjglkb->get_text();
    $V4jbadwq4bzj = $Vdtcpflt5bhp->font_size;
    $Vj0kojsfk0h3 = $Vdtcpflt5bhp->font_family;

    $V3ioe2zhnovg = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->word_spacing);
    $Vshdzmkj2dla = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->letter_spacing);

    switch($Vdtcpflt5bhp->white_space) {

    default:
    case "normal":
      $Vyqctydehp2e = preg_replace(self::$Viofbq1x5wjm," ", $Vyqctydehp2e);
    case "pre-wrap":
    case "pre-line":

      

      
      
      
      $Vy2izp1ogoso = array_flip(preg_split("/[\s-]+/u",$Vyqctydehp2e, -1, PREG_SPLIT_DELIM_CAPTURE));
      array_walk($Vy2izp1ogoso, create_function('&$Vwk2nao2d33x,$Vyqctydehp2e',
                                         '$Vwk2nao2d33x = Font_Metrics::get_text_width($Vyqctydehp2e, "'.addslashes($Vj0kojsfk0h3).'", '.$V4jbadwq4bzj.', '.$V3ioe2zhnovg.', '.$Vshdzmkj2dla.');'));
      arsort($Vy2izp1ogoso);
      $Va110n5xyul0 = reset($Vy2izp1ogoso);
      break;

    case "pre":
      $Vstkyagwfnc1 = array_flip(preg_split("/\n/u", $Vyqctydehp2e));
      array_walk($Vstkyagwfnc1, create_function('&$Vwk2nao2d33x,$Vyqctydehp2e',
                                         '$Vwk2nao2d33x = Font_Metrics::get_text_width($Vyqctydehp2e, "'.addslashes($Vj0kojsfk0h3).'", '.$V4jbadwq4bzj.', '.$V3ioe2zhnovg.', '.$Vshdzmkj2dla.');'));

      arsort($Vstkyagwfnc1);
      $Va110n5xyul0 = reset($Vstkyagwfnc1);
      break;

    case "nowrap":
      $Va110n5xyul0 = Font_Metrics::get_text_width($Veca2om3awughis->_collapse_white_space($Vyqctydehp2e), $Vj0kojsfk0h3, $V4jbadwq4bzj, $V3ioe2zhnovg, $Vshdzmkj2dla);
      break;

    }

    switch ($Vdtcpflt5bhp->white_space) {

    default:
    case "normal":
    case "nowrap":
      $Vyqctydehp2e = preg_replace(self::$Viofbq1x5wjm," ", $Vkjdq1foihhi);
      break;

    case "pre-line":
      
      $Vyqctydehp2e = preg_replace( "/[ \t]+/u", " ", $Vkjdq1foihhi);

    case "pre-wrap":
      
      $Vstkyagwfnc1 = array_flip(preg_split("/\n/", $Vkjdq1foihhi));
      array_walk($Vstkyagwfnc1, create_function('&$Vwk2nao2d33x,$Vyqctydehp2e',
                                         '$Vwk2nao2d33x = Font_Metrics::get_text_width($Vyqctydehp2e, "'.$Vj0kojsfk0h3.'", '.$V4jbadwq4bzj.', '.$V3ioe2zhnovg.', '.$Vshdzmkj2dla.');'));
      arsort($Vstkyagwfnc1);
      reset($Vstkyagwfnc1);
      $Vyqctydehp2e = key($Vstkyagwfnc1);
      break;

    }

    $Vpu53dziligd = Font_Metrics::get_text_width($Vyqctydehp2e, $Vj0kojsfk0h3, $V4jbadwq4bzj, $V3ioe2zhnovg, $Vshdzmkj2dla);
    
    $V4jxxjosqkw5 = $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->margin_left,
                                        $Vdtcpflt5bhp->border_left_width,
                                        $Vdtcpflt5bhp->padding_left,
                                        $Vdtcpflt5bhp->padding_right,
                                        $Vdtcpflt5bhp->border_right_width,
                                        $Vdtcpflt5bhp->margin_right), $V0xqpecgdycr);
    $Va110n5xyul0 += $V4jxxjosqkw5;
    $Vpu53dziligd += $V4jxxjosqkw5;

    return $Veca2om3awughis->_min_max_cache = array($Va110n5xyul0, $Vpu53dziligd, "min" => $Va110n5xyul0, "max" => $Vpu53dziligd);

  }

}
