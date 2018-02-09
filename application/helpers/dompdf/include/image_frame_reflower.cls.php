<?php



class Image_Frame_Reflower extends Frame_Reflower {

  function __construct(Image_Frame_Decorator $Vrlbsjbjglkb) {
    parent::__construct($Vrlbsjbjglkb);
  }

  function reflow(Frame_Decorator $V4uturqtpcq5 = null) {
    $Veca2om3awughis->_frame->position();
    
    
    
    
    
    
    
    
    $Veca2om3awughis->get_min_max_width();
    
    if ( $V4uturqtpcq5 ) {
      $V4uturqtpcq5->add_frame_to_line($Veca2om3awughis->_frame);
    }
  }

  function get_min_max_width() {
    if (DEBUGPNG) {
      
      list($V5nizplcgk24, $V0q5iw2go44s) = dompdf_getimagesize($Veca2om3awughis->_frame->get_image_url());
      print "get_min_max_width() ".
        $Veca2om3awughis->_frame->get_style()->width.' '.
        $Veca2om3awughis->_frame->get_style()->height.';'.
        $Veca2om3awughis->_frame->get_parent()->get_style()->width." ".
        $Veca2om3awughis->_frame->get_parent()->get_style()->height.";".
        $Veca2om3awughis->_frame->get_parent()->get_parent()->get_style()->width.' '.
        $Veca2om3awughis->_frame->get_parent()->get_parent()->get_style()->height.';'.
        $V5nizplcgk24. ' '.
        $V0q5iw2go44s.'|' ;
    }

    $Vdtcpflt5bhp = $Veca2om3awughis->_frame->get_style();

    
    
    
    
    

    $Vojs2qdgagwv = ($Vdtcpflt5bhp->width > 0 ? $Vdtcpflt5bhp->width : 0);
    if ( is_percent($Vojs2qdgagwv) ) {
      $Veca2om3awug = 0.0;
      for ($Vtbbah5lqvpo = $Veca2om3awughis->_frame->get_parent(); $Vtbbah5lqvpo; $Vtbbah5lqvpo = $Vtbbah5lqvpo->get_parent()) {
        $Vtbbah5lqvpo_style = $Vtbbah5lqvpo->get_style();
        $Veca2om3awug = $Vtbbah5lqvpo_style->length_in_pt($Vtbbah5lqvpo_style->width);
        if ($Veca2om3awug != 0) {
          break;
        }
      }
      $Vojs2qdgagwv = ((float)rtrim($Vojs2qdgagwv,"%") * $Veca2om3awug)/100; 
    } elseif ( !mb_strpos($Vojs2qdgagwv, 'pt') ) {
      
      
      
      
      $Vojs2qdgagwv = $Vdtcpflt5bhp->length_in_pt($Vojs2qdgagwv);
    }

    $Vzo4g5xb4yip = ($Vdtcpflt5bhp->height > 0 ? $Vdtcpflt5bhp->height : 0);
    if ( is_percent($Vzo4g5xb4yip) ) {
      $Veca2om3awug = 0.0;
      for ($Vtbbah5lqvpo = $Veca2om3awughis->_frame->get_parent(); $Vtbbah5lqvpo; $Vtbbah5lqvpo = $Vtbbah5lqvpo->get_parent()) {
        $Vtbbah5lqvpo_style = $Vtbbah5lqvpo->get_style();
        $Veca2om3awug = $Vtbbah5lqvpo_style->length_in_pt($Vtbbah5lqvpo_style->height);
        if ($Veca2om3awug != 0) {
          break;
        }
      }
      $Vzo4g5xb4yip = ((float)rtrim($Vzo4g5xb4yip,"%") * $Veca2om3awug)/100; 
    } elseif ( !mb_strpos($Vzo4g5xb4yip, 'pt') ) {
      
      
      
      
      $Vzo4g5xb4yip = $Vdtcpflt5bhp->length_in_pt($Vzo4g5xb4yip);
    }

    if ($Vojs2qdgagwv == 0 || $Vzo4g5xb4yip == 0) {
      
      list($V5nizplcgk24, $V0q5iw2go44s) = dompdf_getimagesize($Veca2om3awughis->_frame->get_image_url());
      
      
      
      
      if ($Vojs2qdgagwv == 0 && $Vzo4g5xb4yip == 0) {
        $Vojs2qdgagwv = (float)($V5nizplcgk24 * 72) / DOMPDF_DPI;
        $Vzo4g5xb4yip = (float)($V0q5iw2go44s * 72) / DOMPDF_DPI;
      } elseif ($Vzo4g5xb4yip == 0 && $Vojs2qdgagwv != 0) {
        $Vzo4g5xb4yip = ($Vojs2qdgagwv / $V5nizplcgk24) * $V0q5iw2go44s; 
      } elseif ($Vojs2qdgagwv == 0 && $Vzo4g5xb4yip != 0) {
        $Vojs2qdgagwv = ($Vzo4g5xb4yip / $V0q5iw2go44s) * $V5nizplcgk24; 
      }
    }

    if (DEBUGPNG) print $Vojs2qdgagwv.' '.$Vzo4g5xb4yip.';';

    $Vdtcpflt5bhp->width = $Vojs2qdgagwv . "pt";
    $Vdtcpflt5bhp->height = $Vzo4g5xb4yip . "pt";

    return array( $Vojs2qdgagwv, $Vojs2qdgagwv, "min" => $Vojs2qdgagwv, "max" => $Vojs2qdgagwv);
    
  }
}
