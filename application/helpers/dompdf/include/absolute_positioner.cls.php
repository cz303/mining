<?php



class Absolute_Positioner extends Positioner {

  function __construct(Frame_Decorator $Vrlbsjbjglkb) { parent::__construct($Vrlbsjbjglkb); }

  function position() {

    $Vrlbsjbjglkb = $this->_frame;
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    
    $Vzqw0ieauwu4 = $Vrlbsjbjglkb->find_positionned_parent();
    
    list($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko) = $Vrlbsjbjglkb->get_containing_block();

    $Vrveb1xz24qu    = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->top,    $Vvlxmepre4ko);
    $Vqyn43hpxtm0  = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->right,  $Vwsgifrh5ics);
    $Vyzmqhafpy0b = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->bottom, $Vvlxmepre4ko);
    $Vrce0gsxjgkc   = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->left,   $Vwsgifrh5ics);
    
    if ( $Vzqw0ieauwu4 && !($Vrce0gsxjgkc === "auto" && $Vqyn43hpxtm0 === "auto") ) {
      
      list($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko) = $Vzqw0ieauwu4->get_padding_box();
    }
    
    list($Vwsgifrh5icsidth, $Vvlxmepre4koeight) = array($Vrlbsjbjglkb->get_margin_width(), $Vrlbsjbjglkb->get_margin_height());
    
    $V2hehlfpg2wy = $this->_frame->get_original_style();
    $Vywdtrlfhkj4 = $V2hehlfpg2wy->width;
    $Vkoxzgyeokea = $V2hehlfpg2wy->height;
    
    
    
    if ( $Vrce0gsxjgkc === "auto" ) {
      if ( $Vqyn43hpxtm0 === "auto" ) {
        
      }
      else {
        if ( $Vywdtrlfhkj4 === "auto" ) {
          
          $V1e1eaicqarh += $Vwsgifrh5ics - $Vwsgifrh5icsidth - $Vqyn43hpxtm0;
        }
        else {
          
          $V1e1eaicqarh += $Vwsgifrh5ics - $Vwsgifrh5icsidth - $Vqyn43hpxtm0;
        }
      }
    }
    else {
      if ( $Vqyn43hpxtm0 === "auto" ) {
        
        $V1e1eaicqarh += $Vrce0gsxjgkc;
      }
      else {
        if ( $Vywdtrlfhkj4 === "auto" ) {
          
          $V1e1eaicqarh += $Vrce0gsxjgkc;
        }
        else {
          
          $V1e1eaicqarh += $Vrce0gsxjgkc;
        }
      }
    }
    
    
    if ( $Vrveb1xz24qu === "auto" ) {
      if ( $Vyzmqhafpy0b === "auto" ) {
        
        $Vqwmp2bx0ii2 = $Vrlbsjbjglkb->get_parent()->get_current_line_box()->y;
      }
      else {
        if ( $Vkoxzgyeokea === "auto" ) {
          
          $Vqwmp2bx0ii2 += $Vvlxmepre4ko - $Vvlxmepre4koeight - $Vyzmqhafpy0b;
        }
        else {
          
          $Vqwmp2bx0ii2 += $Vvlxmepre4ko - $Vvlxmepre4koeight - $Vyzmqhafpy0b;
        }
      }
    }
    else {
      if ( $Vyzmqhafpy0b === "auto" ) {
        
        $Vqwmp2bx0ii2 += $Vrveb1xz24qu;
      }
      else {
        if ( $Vkoxzgyeokea === "auto" ) {
          
          $Vqwmp2bx0ii2 += $Vrveb1xz24qu;
        }
        else {
          
          $Vqwmp2bx0ii2 += $Vrveb1xz24qu;
        }
      }
    }
    
    $Vrlbsjbjglkb->set_position($V1e1eaicqarh, $Vqwmp2bx0ii2);

  }
}