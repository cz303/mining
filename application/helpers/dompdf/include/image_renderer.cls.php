<?php



class Image_Renderer extends Block_Renderer {

  function render(Frame $Vrlbsjbjglkb) {
    
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    $Vstfrw5akne1 = $Vrlbsjbjglkb->get_containing_block();
    list($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko) = $Vrlbsjbjglkb->get_border_box();
  
    $this->_set_opacity( $Vrlbsjbjglkb->get_opacity( $Vdtcpflt5bhp->opacity ) );

    if ( ($Vn4k2wgjnmox = $Vdtcpflt5bhp->background_color) !== "transparent" )
      $this->_canvas->filled_rectangle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vn4k2wgjnmox);

    if ( ($Vbfatyoohaps = $Vdtcpflt5bhp->background_image) && $Vbfatyoohaps !== "none" )
      $this->_background_image($Vbfatyoohaps, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vdtcpflt5bhp);
         
    $this->_render_border($Vrlbsjbjglkb);
    $this->_render_outline($Vrlbsjbjglkb);
    
    list($V1e1eaicqarh, $Vqwmp2bx0ii2) = $Vrlbsjbjglkb->get_padding_box();
    $V1e1eaicqarh += $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->padding_left, $Vstfrw5akne1["w"]);
    $Vqwmp2bx0ii2 += $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->padding_top, $Vstfrw5akne1["h"]);
    
    $Vwsgifrh5ics = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->width, $Vstfrw5akne1["w"]);
    $Vvlxmepre4ko = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->height, $Vstfrw5akne1["h"]);
    
    $V0cmmze43kb4 = $Vrlbsjbjglkb->get_image_url();

    if ( Image_Cache::is_broken($V0cmmze43kb4) &&
      $V514nfx22xwv = $Vrlbsjbjglkb->get_node()->getAttribute("alt") ) {
      $Vj0kojsfk0h3 = $Vdtcpflt5bhp->font_family;
      $V4jbadwq4bzj = $Vdtcpflt5bhp->font_size;
      $V4blp1adqmut = $Vdtcpflt5bhp->word_spacing;
      $this->_canvas->text($V1e1eaicqarh, $Vqwmp2bx0ii2, $V514nfx22xwv,
                           $Vj0kojsfk0h3, $V4jbadwq4bzj,
                           $Vdtcpflt5bhp->color, $V4blp1adqmut);
    }
    else {
      $this->_canvas->image( $V0cmmze43kb4, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vdtcpflt5bhp->image_resolution);
    }
    
    if ( $Vzjcdynyc23y = $Vrlbsjbjglkb->get_image_msg() ) {
      $Vd01eedayprh = preg_split("/\s*\n\s*/", $Vzjcdynyc23y);
      $Vvlxmepre4koeight = 10;
      $Vwapd5uipndy = $V514nfx22xwv ? $Vqwmp2bx0ii2+$Vvlxmepre4ko-count($Vd01eedayprh)*$Vvlxmepre4koeight : $Vqwmp2bx0ii2;
      
      foreach($Vd01eedayprh as $Vfhiq1lhsoja => $V5004ujwsrp0) {
        $this->_canvas->text($V1e1eaicqarh, $Vwapd5uipndy + $Vfhiq1lhsoja*$Vvlxmepre4koeight, $V5004ujwsrp0, "times", $Vvlxmepre4koeight*0.8, array(0.5, 0.5, 0.5));
      }
    }
    
    if (DEBUG_LAYOUT && DEBUG_LAYOUT_BLOCKS) {
      $this->_debug_layout($Vrlbsjbjglkb->get_border_box(), "blue");
      if (DEBUG_LAYOUT_PADDINGBOX) {
        $this->_debug_layout($Vrlbsjbjglkb->get_padding_box(), "blue", array(0.5, 0.5));
      }
    }
  }
}
