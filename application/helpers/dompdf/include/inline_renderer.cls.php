<?php



class Inline_Renderer extends Abstract_Renderer {
  
  

  function render(Frame $Vrlbsjbjglkb) {
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();

    if ( !$Vrlbsjbjglkb->get_first_child() )
      return; 
    
    
    $V2jdlkn2stut = $Vdtcpflt5bhp->get_border_properties();
    $Vqwqp41ktqoo = array($Vdtcpflt5bhp->length_in_pt($V2jdlkn2stut["top"]["width"]),
                    $Vdtcpflt5bhp->length_in_pt($V2jdlkn2stut["right"]["width"]),
                    $Vdtcpflt5bhp->length_in_pt($V2jdlkn2stut["bottom"]["width"]),
                    $Vdtcpflt5bhp->length_in_pt($V2jdlkn2stut["left"]["width"]));

    
    
    list($V1e1eaicqarh, $Vqwmp2bx0ii2) = $Vrlbsjbjglkb->get_first_child()->get_position();
    $Vwsgifrh5ics = null;
    $Vvlxmepre4ko = 0;


    
    $this->_set_opacity( $Vrlbsjbjglkb->get_opacity( $Vdtcpflt5bhp->opacity ) );
    
    $Vhjomndol5h0 = true;

    foreach ($Vrlbsjbjglkb->get_children() as $Vcnoizcxjx0n) {
      list($Vcnoizcxjx0n_x, $Vcnoizcxjx0n_y, $Vcnoizcxjx0n_w, $Vcnoizcxjx0n_h) = $Vcnoizcxjx0n->get_padding_box();
      
      if ( !is_null($Vwsgifrh5ics) && $Vcnoizcxjx0n_x < $V1e1eaicqarh + $Vwsgifrh5ics ) {
        
        
        
        
        

        
        

        
        if ( ($Vn4k2wgjnmox = $Vdtcpflt5bhp->background_color) !== "transparent" )
          $this->_canvas->filled_rectangle( $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vn4k2wgjnmox);

        if ( ($Vbfatyoohaps = $Vdtcpflt5bhp->background_image) && $Vbfatyoohaps !== "none" ) {
          $this->_background_image($Vbfatyoohaps, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vdtcpflt5bhp);
        }

        
        if ( $Vhjomndol5h0 ) {

          if ( $V2jdlkn2stut["left"]["style"] !== "none" && $V2jdlkn2stut["left"]["color"] !== "transparent" && $V2jdlkn2stut["left"]["width"] > 0 ) {
            $Vihjcs2gfuz0 = "_border_" . $V2jdlkn2stut["left"]["style"];            
            $this->$Vihjcs2gfuz0($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vvlxmepre4ko + $Vqwqp41ktqoo[0] + $Vqwqp41ktqoo[2], $V2jdlkn2stut["left"]["color"], $Vqwqp41ktqoo, "left");
          }
          $Vhjomndol5h0 = false;
        }

        
        if ( $V2jdlkn2stut["top"]["style"] !== "none" && $V2jdlkn2stut["top"]["color"] !== "transparent" && $V2jdlkn2stut["top"]["width"] > 0 ) {
          $Vihjcs2gfuz0 = "_border_" . $V2jdlkn2stut["top"]["style"];
          $this->$Vihjcs2gfuz0($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics + $Vqwqp41ktqoo[1] + $Vqwqp41ktqoo[3], $V2jdlkn2stut["top"]["color"], $Vqwqp41ktqoo, "top");
        }
        
        if ( $V2jdlkn2stut["bottom"]["style"] !== "none" && $V2jdlkn2stut["bottom"]["color"] !== "transparent" && $V2jdlkn2stut["bottom"]["width"] > 0 ) {
          $Vihjcs2gfuz0 = "_border_" . $V2jdlkn2stut["bottom"]["style"];
          $this->$Vihjcs2gfuz0($V1e1eaicqarh, $Vqwmp2bx0ii2 + $Vvlxmepre4ko + $Vqwqp41ktqoo[0] + $Vqwqp41ktqoo[2], $Vwsgifrh5ics + $Vqwqp41ktqoo[1] + $Vqwqp41ktqoo[3], $V2jdlkn2stut["bottom"]["color"], $Vqwqp41ktqoo, "bottom");
        }

        
        $Vbw4xdir44xq = null;
        if ( $Vrlbsjbjglkb->get_node()->nodeName === "a" ) {
          $Vbw4xdir44xq = $Vrlbsjbjglkb->get_node();
        }
        else if ( $Vrlbsjbjglkb->get_parent()->get_node()->nodeName === "a" ){
          $Vbw4xdir44xq = $Vrlbsjbjglkb->get_parent()->get_node();
        }
        
        if ( $Vbw4xdir44xq && $Vvlxmepre4koref = $Vbw4xdir44xq->getAttribute("href") ) {
          $this->_canvas->add_link($Vvlxmepre4koref, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko);
        }

        $V1e1eaicqarh = $Vcnoizcxjx0n_x;
        $Vqwmp2bx0ii2 = $Vcnoizcxjx0n_y;
        $Vwsgifrh5ics = $Vcnoizcxjx0n_w;
        $Vvlxmepre4ko = $Vcnoizcxjx0n_h;
        continue;
      }

      if ( is_null($Vwsgifrh5ics) )
        $Vwsgifrh5ics = $Vcnoizcxjx0n_w;
      else
        $Vwsgifrh5ics += $Vcnoizcxjx0n_w;
      
      $Vvlxmepre4ko = max($Vvlxmepre4ko, $Vcnoizcxjx0n_h);
    }

    
    
    if ( ($Vn4k2wgjnmox = $Vdtcpflt5bhp->background_color) !== "transparent" ) 
      $this->_canvas->filled_rectangle( $V1e1eaicqarh + $Vqwqp41ktqoo[3], $Vqwmp2bx0ii2 + $Vqwqp41ktqoo[0], $Vwsgifrh5ics, $Vvlxmepre4ko, $Vn4k2wgjnmox);

    
    
    
    
    
    
    
    
    if ( ($Vbfatyoohaps = $Vdtcpflt5bhp->background_image) && $Vbfatyoohaps !== "none" )           
      $this->_background_image($Vbfatyoohaps, $V1e1eaicqarh + $Vqwqp41ktqoo[3], $Vqwmp2bx0ii2 + $Vqwqp41ktqoo[0], $Vwsgifrh5ics, $Vvlxmepre4ko, $Vdtcpflt5bhp);
        
    
    $Vwsgifrh5ics += $Vqwqp41ktqoo[1] + $Vqwqp41ktqoo[3];
    $Vvlxmepre4ko += $Vqwqp41ktqoo[0] + $Vqwqp41ktqoo[2];

    
    $Vc5mrzmxncgp = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->margin_left);
    $V1e1eaicqarh += $Vc5mrzmxncgp;

    
    if ( $Vhjomndol5h0 && $V2jdlkn2stut["left"]["style"] !== "none" && $V2jdlkn2stut["left"]["color"] !== "transparent" && $Vqwqp41ktqoo[3] > 0 ) {
      $Vihjcs2gfuz0 = "_border_" . $V2jdlkn2stut["left"]["style"];
      $this->$Vihjcs2gfuz0($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vvlxmepre4ko, $V2jdlkn2stut["left"]["color"], $Vqwqp41ktqoo, "left");
    }
    
    
    if ( $V2jdlkn2stut["top"]["style"] !== "none" && $V2jdlkn2stut["top"]["color"] !== "transparent" && $Vqwqp41ktqoo[0] > 0 ) {
      $Vihjcs2gfuz0 = "_border_" . $V2jdlkn2stut["top"]["style"];
      $this->$Vihjcs2gfuz0($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $V2jdlkn2stut["top"]["color"], $Vqwqp41ktqoo, "top");
    }
    
    if ( $V2jdlkn2stut["bottom"]["style"] !== "none" && $V2jdlkn2stut["bottom"]["color"] !== "transparent" && $Vqwqp41ktqoo[2] > 0 ) {
      $Vihjcs2gfuz0 = "_border_" . $V2jdlkn2stut["bottom"]["style"];
      $this->$Vihjcs2gfuz0($V1e1eaicqarh, $Vqwmp2bx0ii2 + $Vvlxmepre4ko, $Vwsgifrh5ics, $V2jdlkn2stut["bottom"]["color"], $Vqwqp41ktqoo, "bottom");
    }

    
    
    
    if ( $V2jdlkn2stut["right"]["style"] !== "none" && $V2jdlkn2stut["right"]["color"] !== "transparent" && $Vqwqp41ktqoo[1] > 0 ) {
      $Vihjcs2gfuz0 = "_border_" . $V2jdlkn2stut["right"]["style"];
      $this->$Vihjcs2gfuz0($V1e1eaicqarh + $Vwsgifrh5ics, $Vqwmp2bx0ii2, $Vvlxmepre4ko, $V2jdlkn2stut["right"]["color"], $Vqwqp41ktqoo, "right");
    }

    
    $Vbw4xdir44xq = null;
    if ( $Vrlbsjbjglkb->get_node()->nodeName === "a" ) {
      $Vbw4xdir44xq = $Vrlbsjbjglkb->get_node();
      
      if ( ($Vcvluzjs3wzb = $Vbw4xdir44xq->getAttribute("name")) || ($Vcvluzjs3wzb = $Vbw4xdir44xq->getAttribute("id")) ) {
        $this->_canvas->add_named_dest($Vcvluzjs3wzb);
      }
    }
    
    if ( $Vrlbsjbjglkb->get_parent() && $Vrlbsjbjglkb->get_parent()->get_node()->nodeName === "a" ){
      $Vbw4xdir44xq = $Vrlbsjbjglkb->get_parent()->get_node();
    }
    
    
    if ( $Vbw4xdir44xq ) {
      if ( $Vvlxmepre4koref = $Vbw4xdir44xq->getAttribute("href") )
        $this->_canvas->add_link($Vvlxmepre4koref, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko);
    }
    
    if (DEBUG_LAYOUT && DEBUG_LAYOUT_INLINE) {
      $this->_debug_layout($Vcnoizcxjx0n->get_border_box(), "blue");
      if (DEBUG_LAYOUT_PADDINGBOX) {
        $this->_debug_layout($Vcnoizcxjx0n->get_padding_box(), "blue", array(0.5, 0.5));
      }
    }
  }
}
