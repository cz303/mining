<?php



class Text_Renderer extends Abstract_Renderer {
  
  const DECO_THICKNESS = 0.02;     

  
  
  
  
  
  const UNDERLINE_OFFSET = 0.0;    
  const OVERLINE_OFFSET = 0.0;    
  const LINETHROUGH_OFFSET = 0.0; 
  const DECO_EXTENSION = 0.0;     
    
  

  function render(Frame $Vrlbsjbjglkb) {
    $Vkjdq1foihhi = $Vrlbsjbjglkb->get_text();
    if ( trim($Vkjdq1foihhi) === "" )
      return;
      
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    list($V1e1eaicqarh, $Vqwmp2bx0ii2) = $Vrlbsjbjglkb->get_position();
    $Vstfrw5akne1 = $Vrlbsjbjglkb->get_containing_block();

    if ( ($Vmyr1fol2bja = $Vdtcpflt5bhp->margin_left) === "auto" || $Vmyr1fol2bja === "none" )
      $Vmyr1fol2bja = 0;

    if ( ($Vdf1kx0ocum5 = $Vdtcpflt5bhp->padding_left) === "auto" || $Vdf1kx0ocum5 === "none" )
      $Vdf1kx0ocum5 = 0;

    if ( ($Vnewr3funjm5 = $Vdtcpflt5bhp->border_left_width) === "auto" || $Vnewr3funjm5 === "none" )
      $Vnewr3funjm5 = 0;

    $V1e1eaicqarh += $Vdtcpflt5bhp->length_in_pt( array($Vmyr1fol2bja, $Vdf1kx0ocum5, $Vnewr3funjm5), $Vstfrw5akne1["w"] );

    $Vj0kojsfk0h3 = $Vdtcpflt5bhp->font_family;
    $V4jbadwq4bzj = $Vrlbsjbjglkb_font_size = $Vdtcpflt5bhp->font_size;
    $Vzo4g5xb4yip = $Vdtcpflt5bhp->height;    
    $V3ioe2zhnovg = $Vrlbsjbjglkb->get_text_spacing() + $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->word_spacing);
    $Vshdzmkj2dla = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->letter_spacing);
    $Vojs2qdgagwv = $Vdtcpflt5bhp->width;

    
    
    $this->_canvas->text($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vkjdq1foihhi,
                         $Vj0kojsfk0h3, $V4jbadwq4bzj,
                         $Vdtcpflt5bhp->color, $V3ioe2zhnovg, $Vshdzmkj2dla);
    
    $Vdmbypy2xlg1 = $Vrlbsjbjglkb->get_containing_line();
    
    
    
    if ( false && $Vdmbypy2xlg1->tallest_frame ) {
      $V0leqlmozstn = $Vdmbypy2xlg1->tallest_frame;
      $Vdtcpflt5bhp = $V0leqlmozstn->get_style();
      $V4jbadwq4bzj = $Vdtcpflt5bhp->font_size;
      $Vzo4g5xb4yip = $Vdmbypy2xlg1->h * ($V4jbadwq4bzj / $Vdtcpflt5bhp->line_height);
    }
    
    if ( method_exists( $this->_canvas, "get_cpdf" ) ) {
      $Vqchkuwqi4eu = $this->_canvas->get_cpdf();
      
      
      
      
      
      $Vj0kojsfk0h3BBox = $Vqchkuwqi4eu->fonts[$Vdtcpflt5bhp->font_family]['FontBBox'];
      $V4j05uvad05v = (($Vj0kojsfk0h3BBox[3]*$V4jbadwq4bzj)/1000) * 0.90;
      $V11sj0k11e1u = ($Vj0kojsfk0h3BBox[1]*$V4jbadwq4bzj)/1000;
      
    } else {
      
      
      
      $V4j05uvad05v = $V4jbadwq4bzj*1.08;
      $V11sj0k11e1u = $V4jbadwq4bzj-$Vzo4g5xb4yip;
      
    }
    
    
    
    
    
    $Vzqw0ieauwu4 = $Vrlbsjbjglkb;
    $Vltejvmdssgs = array();
    while ( $Vzqw0ieauwu4 = $Vzqw0ieauwu4->get_parent() )
      $Vltejvmdssgs[] = $Vzqw0ieauwu4;
    
    while ( isset($Vltejvmdssgs[0]) ) {
      $Vtbbah5lqvpo = array_pop($Vltejvmdssgs);

      if ( ($Vkjdq1foihhi_deco = $Vtbbah5lqvpo->get_style()->text_decoration) === "none" )
        continue;
        
      $Vrl1wsvzejlq = $Vqwmp2bx0ii2; 
      $Vl5jzlxo3j3n = $Vtbbah5lqvpo->get_style()->color;

      switch ($Vkjdq1foihhi_deco) {

      default:
        continue;

      case "underline":
        $Vrl1wsvzejlq += $V4j05uvad05v - $V11sj0k11e1u + $V4jbadwq4bzj * (self::UNDERLINE_OFFSET - self::DECO_THICKNESS/2);
        break;

      case "overline":
        $Vrl1wsvzejlq += $V4jbadwq4bzj * (self::OVERLINE_OFFSET + self::DECO_THICKNESS/2);
        break;

      case "line-through":
        $Vrl1wsvzejlq += $V4j05uvad05v * 0.7 + $V4jbadwq4bzj * self::LINETHROUGH_OFFSET;
        break;
      }

      $Vcxaujbeexic = 0;
      $V1e1eaicqarh1 = $V1e1eaicqarh - self::DECO_EXTENSION;
      $V1e1eaicqarh2 = $V1e1eaicqarh + $Vojs2qdgagwv + $Vcxaujbeexic + self::DECO_EXTENSION;
      $this->_canvas->line($V1e1eaicqarh1, $Vrl1wsvzejlq, $V1e1eaicqarh2, $Vrl1wsvzejlq, $Vl5jzlxo3j3n, $V4jbadwq4bzj * self::DECO_THICKNESS);

    }
    
    if (DEBUG_LAYOUT && DEBUG_LAYOUT_LINES) {
      $Vkjdq1foihhi_width = Font_Metrics::get_text_width($Vkjdq1foihhi, $Vj0kojsfk0h3, $Vrlbsjbjglkb_font_size);
      $this->_debug_layout(array($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vkjdq1foihhi_width+($Vdmbypy2xlg1->wc-1)*$V3ioe2zhnovg, $Vrlbsjbjglkb_font_size), "orange", array(0.5, 0.5));
    }
  }
}
