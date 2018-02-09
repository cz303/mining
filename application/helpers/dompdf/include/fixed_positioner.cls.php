<?php



class Fixed_Positioner extends Positioner {

  function __construct(Frame_Decorator $Vrlbsjbjglkb) { parent::__construct($Vrlbsjbjglkb); }

  function position() {

    $Vrlbsjbjglkb = $this->_frame;
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_original_style();
    $V4jn4msro4hf = $Vrlbsjbjglkb->get_root();
    $Vcoaoo0azcwy = $V4jn4msro4hf->get_containing_block();
    $Vcoaoo0azcwy_style = $V4jn4msro4hf->get_style();

    $Vzqw0ieauwu4 = $Vrlbsjbjglkb->find_block_parent();
    if ( $Vzqw0ieauwu4 ) {
      $Vzqw0ieauwu4->add_line();
    }

    
    $Vtvmz42cnw2n    = $Vcoaoo0azcwy_style->length_in_pt($Vcoaoo0azcwy_style->margin_top,    $Vcoaoo0azcwy["h"]);
    $Vr5tccqi244u  = $Vcoaoo0azcwy_style->length_in_pt($Vcoaoo0azcwy_style->margin_right,  $Vcoaoo0azcwy["w"]);
    $Vn4lgxfilu5x = $Vcoaoo0azcwy_style->length_in_pt($Vcoaoo0azcwy_style->margin_bottom, $Vcoaoo0azcwy["h"]);
    $V23iooycelpx   = $Vcoaoo0azcwy_style->length_in_pt($Vcoaoo0azcwy_style->margin_left,   $Vcoaoo0azcwy["w"]);
    
    
    $Vzo4g5xb4yip = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->height, $Vcoaoo0azcwy["h"]);
    $Vojs2qdgagwv  = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->width,  $Vcoaoo0azcwy["w"]);
    
    $Vrveb1xz24qu    = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->top,    $Vcoaoo0azcwy["h"]);
    $Vqyn43hpxtm0  = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->right,  $Vcoaoo0azcwy["w"]);
    $Vyzmqhafpy0b = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->bottom, $Vcoaoo0azcwy["h"]);
    $Vrce0gsxjgkc   = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->left,   $Vcoaoo0azcwy["w"]);

    $Vqwmp2bx0ii2 = $Vtvmz42cnw2n;
    if ( isset($Vrveb1xz24qu) ) {
      $Vqwmp2bx0ii2 = $Vrveb1xz24qu + $Vtvmz42cnw2n;
      if ( $Vrveb1xz24qu === "auto" ) {
        $Vqwmp2bx0ii2 = $Vtvmz42cnw2n;
        if ( isset($Vyzmqhafpy0b) && $Vyzmqhafpy0b !== "auto" ) {
          $Vqwmp2bx0ii2 = $Vcoaoo0azcwy["h"] - $Vyzmqhafpy0b - $Vn4lgxfilu5x;
          $Va0nl5fhviqp = $this->_frame->get_margin_height();
          if ( $Va0nl5fhviqp !== "auto" ) {
            $Vqwmp2bx0ii2 -= $Va0nl5fhviqp;
          } else {
            $Vqwmp2bx0ii2 -= $Vzo4g5xb4yip;
          }
        }
      }
    }

    $V1e1eaicqarh = $V23iooycelpx;
    if ( isset($Vrce0gsxjgkc) ) {
      $V1e1eaicqarh = $Vrce0gsxjgkc + $V23iooycelpx;
      if ( $Vrce0gsxjgkc === "auto" ) {
        $V1e1eaicqarh = $V23iooycelpx;
        if ( isset($Vqyn43hpxtm0) && $Vqyn43hpxtm0 !== "auto" ) {
          $V1e1eaicqarh = $Vcoaoo0azcwy["w"] - $Vqyn43hpxtm0 - $Vr5tccqi244u;
          $Viwmwgwcuecx = $this->_frame->get_margin_width();
          if ( $Viwmwgwcuecx !== "auto" ) {
            $V1e1eaicqarh -= $Viwmwgwcuecx;
          } else {
            $V1e1eaicqarh -= $Vojs2qdgagwv;
          }
        }
      }
    }
    
    $Vrlbsjbjglkb->set_position($V1e1eaicqarh, $Vqwmp2bx0ii2);

    $Vhedylkejosg = $Vrlbsjbjglkb->get_children();
    foreach($Vhedylkejosg as $Vcnoizcxjx0n) {
      $Vcnoizcxjx0n->set_position($V1e1eaicqarh, $Vqwmp2bx0ii2);
    }
  }
}