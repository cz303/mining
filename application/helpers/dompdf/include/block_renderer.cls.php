<?php



class Block_Renderer extends Abstract_Renderer {

  

  function render(Frame $Vrlbsjbjglkb) {
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style(); 
    list($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko) = $Vrlbsjbjglkb->get_border_box();
    
    $this->_set_opacity( $Vrlbsjbjglkb->get_opacity( $Vdtcpflt5bhp->opacity ) );

    if ( $Vrlbsjbjglkb->get_node()->nodeName === "body" ) {
      $Vvlxmepre4ko = $Vrlbsjbjglkb->get_containing_block("h") - $Vdtcpflt5bhp->length_in_pt(array(
        $Vdtcpflt5bhp->margin_top,
        $Vdtcpflt5bhp->padding_top,
        $Vdtcpflt5bhp->border_top_width,
        $Vdtcpflt5bhp->border_bottom_width,
        $Vdtcpflt5bhp->padding_bottom,
        $Vdtcpflt5bhp->margin_bottom),
      $Vdtcpflt5bhp->width);
    }
    
    
    if ( ($Vn4k2wgjnmox = $Vdtcpflt5bhp->background_color) !== "transparent" ) {
      $this->_canvas->filled_rectangle( $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vn4k2wgjnmox );
    }

    if ( ($Vbfatyoohaps = $Vdtcpflt5bhp->background_image) && $Vbfatyoohaps !== "none" )
      $this->_background_image($Vbfatyoohaps, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vdtcpflt5bhp);

    $this->_render_border($Vrlbsjbjglkb);
    $this->_render_outline($Vrlbsjbjglkb);
    
    if (DEBUG_LAYOUT && DEBUG_LAYOUT_BLOCKS) {
      $this->_debug_layout($Vrlbsjbjglkb->get_border_box(), "red");
      if (DEBUG_LAYOUT_PADDINGBOX) {
        $this->_debug_layout($Vrlbsjbjglkb->get_padding_box(), "red", array(0.5, 0.5));
      }
    }
    
    if (DEBUG_LAYOUT && DEBUG_LAYOUT_LINES && $Vrlbsjbjglkb->get_decorator()) {
      foreach ($Vrlbsjbjglkb->get_decorator()->get_line_boxes() as $Vdmbypy2xlg1) {
        $Vrlbsjbjglkb->_debug_layout(array($Vdmbypy2xlg1->x, $Vdmbypy2xlg1->y, $Vdmbypy2xlg1->w, $Vdmbypy2xlg1->h), "orange");
      }
    }
  }

  protected function _render_border(Frame_Decorator $Vrlbsjbjglkb, $V5fqniz1znyf = "bevel") {
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    $Vhfxzmtavk4m = $Vrlbsjbjglkb->get_border_box();
    $V2jdlkn2stut = $Vdtcpflt5bhp->get_border_properties();

    
    if (
      in_array($V2jdlkn2stut["top"]["style"], array("solid", "dashed", "dotted")) && 
      $V2jdlkn2stut["top"]    == $V2jdlkn2stut["right"] &&
      $V2jdlkn2stut["right"]  == $V2jdlkn2stut["bottom"] &&
      $V2jdlkn2stut["bottom"] == $V2jdlkn2stut["left"]
    ) {
      $V4kzcgjpwmm3 = $V2jdlkn2stut["top"];
      if ( $V4kzcgjpwmm3["color"] === "transparent" || $V4kzcgjpwmm3["width"] <= 0 ) return;
      
      list($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko) = $Vhfxzmtavk4m;
      $Vwsgifrh5icsidth = $Vdtcpflt5bhp->length_in_pt($V4kzcgjpwmm3["width"]);
      $Vbuaty1lgmiq = $this->_get_dash_pattern($V4kzcgjpwmm3["style"], $Vwsgifrh5icsidth);
      $this->_canvas->rectangle($V1e1eaicqarh + $Vwsgifrh5icsidth / 2, $Vqwmp2bx0ii2 + $Vwsgifrh5icsidth / 2, $Vwsgifrh5ics - $Vwsgifrh5icsidth, $Vvlxmepre4ko - $Vwsgifrh5icsidth, $V4kzcgjpwmm3["color"], $Vwsgifrh5icsidth, $Vbuaty1lgmiq);
      return;
    }

    $Vwsgifrh5icsidths = array($Vdtcpflt5bhp->length_in_pt($V2jdlkn2stut["top"]["width"]),
                    $Vdtcpflt5bhp->length_in_pt($V2jdlkn2stut["right"]["width"]),
                    $Vdtcpflt5bhp->length_in_pt($V2jdlkn2stut["bottom"]["width"]),
                    $Vdtcpflt5bhp->length_in_pt($V2jdlkn2stut["left"]["width"]));
    
    foreach ($V2jdlkn2stut as $V5qa0rylnggy => $V4kzcgjpwmm3) {
      list($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko) = $Vhfxzmtavk4m;

      if ( !$V4kzcgjpwmm3["style"] || 
            $V4kzcgjpwmm3["style"] === "none" || 
            $V4kzcgjpwmm3["width"] <= 0 || 
            $V4kzcgjpwmm3["color"] == "transparent" )
        continue;

      switch($V5qa0rylnggy) {
      case "top":
        $Volq3gdvkuqp = $Vwsgifrh5ics;
        break;

      case "bottom":
        $Volq3gdvkuqp = $Vwsgifrh5ics;
        $Vqwmp2bx0ii2 += $Vvlxmepre4ko;
        break;

      case "left":
        $Volq3gdvkuqp = $Vvlxmepre4ko;
        break;

      case "right":
        $Volq3gdvkuqp = $Vvlxmepre4ko;
        $V1e1eaicqarh += $Vwsgifrh5ics;
        break;
      default:
        break;
      }
      $Vihjcs2gfuz0 = "_border_" . $V4kzcgjpwmm3["style"];

      $this->$Vihjcs2gfuz0($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $V4kzcgjpwmm3["color"], $Vwsgifrh5icsidths, $V5qa0rylnggy, $V5fqniz1znyf);
    }
  }

  protected function _render_outline(Frame_Decorator $Vrlbsjbjglkb, $V5fqniz1znyf = "bevel") {
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    
    $V4kzcgjpwmm3 = array(
      "width" => $Vdtcpflt5bhp->outline_width,
      "style" => $Vdtcpflt5bhp->outline_style,
      "color" => $Vdtcpflt5bhp->outline_color,
    );
    
    if ( !$V4kzcgjpwmm3["style"] || $V4kzcgjpwmm3["style"] === "none" || $V4kzcgjpwmm3["width"] <= 0 )
      return;
      
    $Vhfxzmtavk4m = $Vrlbsjbjglkb->get_border_box();
    $Vortqlloirgz = $Vdtcpflt5bhp->length_in_pt($V4kzcgjpwmm3["width"]);
    $Vbuaty1lgmiq = $this->_get_dash_pattern($V4kzcgjpwmm3["style"], $Vortqlloirgz);

    
    if ( in_array($V4kzcgjpwmm3["style"], array("solid", "dashed", "dotted")) ) {
      $Vhfxzmtavk4m[0] -= $Vortqlloirgz / 2;
      $Vhfxzmtavk4m[1] -= $Vortqlloirgz / 2;
      $Vhfxzmtavk4m[2] += $Vortqlloirgz;
      $Vhfxzmtavk4m[3] += $Vortqlloirgz;
    
      list($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko) = $Vhfxzmtavk4m;
      $this->_canvas->rectangle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $V4kzcgjpwmm3["color"], $Vortqlloirgz, $Vbuaty1lgmiq);
      return;
    }

    $Vhfxzmtavk4m[0] -= $Vortqlloirgz;
    $Vhfxzmtavk4m[1] -= $Vortqlloirgz;
    $Vhfxzmtavk4m[2] += $Vortqlloirgz * 2;
    $Vhfxzmtavk4m[3] += $Vortqlloirgz * 2;
    
    $Vihjcs2gfuz0 = "_border_" . $V4kzcgjpwmm3["style"];
    $Vwsgifrh5icsidths = array_fill(0, 4, $V4kzcgjpwmm3["width"]);
    $V5qa0rylnggys = array("top", "right", "left", "bottom");
    
    foreach ($V5qa0rylnggys as $V5qa0rylnggy) {
      list($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko) = $Vhfxzmtavk4m;

      switch($V5qa0rylnggy) {
      case "top":
        $Volq3gdvkuqp = $Vwsgifrh5ics;
        break;

      case "bottom":
        $Volq3gdvkuqp = $Vwsgifrh5ics;
        $Vqwmp2bx0ii2 += $Vvlxmepre4ko;
        break;

      case "left":
        $Volq3gdvkuqp = $Vvlxmepre4ko;
        break;

      case "right":
        $Volq3gdvkuqp = $Vvlxmepre4ko;
        $V1e1eaicqarh += $Vwsgifrh5ics;
        break;
      default:
        break;
      }

      $this->$Vihjcs2gfuz0($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $V4kzcgjpwmm3["color"], $Vwsgifrh5icsidths, $V5qa0rylnggy, $V5fqniz1znyf);
    }
  }
}
