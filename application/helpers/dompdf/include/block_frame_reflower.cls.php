<?php



class Block_Frame_Reflower extends Frame_Reflower {
  
  const MIN_JUSTIFY_WIDTH = 0.80;

  
  protected $Vvvuswijwhvo;
  
  function __construct(Block_Frame_Decorator $Vrlbsjbjglkb) { parent::__construct($Vrlbsjbjglkb); }

  
  protected function _calculate_width($Vojs2qdgagwv) {
    $Vrlbsjbjglkb = $this->_frame;
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    $Vwsgifrh5ics = $Vrlbsjbjglkb->get_containing_block("w");

    if ( $Vdtcpflt5bhp->position === "fixed" ) {
      $Vwsgifrh5ics = $Vrlbsjbjglkb->get_parent()->get_containing_block("w");
    }

    $Vwpbmnxyruzy = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->margin_right, $Vwsgifrh5ics);
    $Vurbaymknlcu = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->margin_left, $Vwsgifrh5ics);

    $Vrce0gsxjgkc = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->left, $Vwsgifrh5ics);
    $Vqyn43hpxtm0 = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->right, $Vwsgifrh5ics);
    
    
    $Vko3el2sr5ba = array($Vdtcpflt5bhp->border_left_width,
                  $Vdtcpflt5bhp->border_right_width,
                  $Vdtcpflt5bhp->padding_left,
                  $Vdtcpflt5bhp->padding_right,
                  $Vojs2qdgagwv !== "auto" ? $Vojs2qdgagwv : 0,
                  $Vwpbmnxyruzy !== "auto" ? $Vwpbmnxyruzy : 0,
                  $Vurbaymknlcu !== "auto" ? $Vurbaymknlcu : 0);

    
    if ( $Vrlbsjbjglkb->is_absolute() ) {
      $Vbnlhgmdu3nf = true;
      $Vko3el2sr5ba[] = $Vrce0gsxjgkc !== "auto" ? $Vrce0gsxjgkc : 0;
      $Vko3el2sr5ba[] = $Vqyn43hpxtm0 !== "auto" ? $Vqyn43hpxtm0 : 0;
    } else {
      $Vbnlhgmdu3nf = false;
    }

    $Vvbwz1pamc2b = $Vdtcpflt5bhp->length_in_pt($Vko3el2sr5ba, $Vwsgifrh5ics);

    
    $Vyn0oxmudejv = $Vwsgifrh5ics - $Vvbwz1pamc2b;

    if ( $Vyn0oxmudejv > 0 ) {

      if ( $Vbnlhgmdu3nf ) {

        
        

        if ( $Vojs2qdgagwv === "auto" && $Vrce0gsxjgkc === "auto" && $Vqyn43hpxtm0 === "auto" ) {

          if ( $Vurbaymknlcu === "auto" )
            $Vurbaymknlcu = 0;
          if ( $Vwpbmnxyruzy === "auto" )
            $Vwpbmnxyruzy = 0;

          
          
          
          $Vrce0gsxjgkc = 0;
          $Vqyn43hpxtm0 = 0;
          $Vojs2qdgagwv = $Vyn0oxmudejv;

        } else if ( $Vojs2qdgagwv === "auto" ) {

          if ( $Vurbaymknlcu === "auto" )
            $Vurbaymknlcu = 0;
          if ( $Vwpbmnxyruzy === "auto" )
            $Vwpbmnxyruzy = 0;
          if ( $Vrce0gsxjgkc === "auto" )
            $Vrce0gsxjgkc = 0;
          if ( $Vqyn43hpxtm0 === "auto" )
            $Vqyn43hpxtm0 = 0;

          $Vojs2qdgagwv = $Vyn0oxmudejv;

        } else if ( $Vrce0gsxjgkc === "auto" ) {
          
          if ( $Vurbaymknlcu === "auto" )
            $Vurbaymknlcu = 0;
          if ( $Vwpbmnxyruzy === "auto" )
            $Vwpbmnxyruzy = 0;
          if ( $Vqyn43hpxtm0 === "auto" )
            $Vqyn43hpxtm0 = 0;

          $Vrce0gsxjgkc = $Vyn0oxmudejv;

        } else if ( $Vqyn43hpxtm0 === "auto" ) {

          if ( $Vurbaymknlcu === "auto" )
            $Vurbaymknlcu = 0;
          if ( $Vwpbmnxyruzy === "auto" )
            $Vwpbmnxyruzy = 0;

          $Vqyn43hpxtm0 = $Vyn0oxmudejv;
        }

      } else {

        
        if ( $Vojs2qdgagwv === "auto" )
          $Vojs2qdgagwv = $Vyn0oxmudejv;

        else if ( $Vurbaymknlcu === "auto" && $Vwpbmnxyruzy === "auto" )
          $Vurbaymknlcu = $Vwpbmnxyruzy = round($Vyn0oxmudejv / 2);

        else if ( $Vurbaymknlcu === "auto" )
          $Vurbaymknlcu = $Vyn0oxmudejv;

        else if ( $Vwpbmnxyruzy === "auto" )
          $Vwpbmnxyruzy = $Vyn0oxmudejv;
      }

    } else if ($Vyn0oxmudejv < 0) {

      
      $Vwpbmnxyruzy = $Vyn0oxmudejv;

    }

    return array("width"=> $Vojs2qdgagwv, "margin_left" => $Vurbaymknlcu, "margin_right" => $Vwpbmnxyruzy, "left" => $Vrce0gsxjgkc, "right" => $Vqyn43hpxtm0);
  }

  
  protected function _calculate_restricted_width() {
    $Vrlbsjbjglkb = $this->_frame;
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    $Vstfrw5akne1 = $Vrlbsjbjglkb->get_containing_block();
    
    if ( $Vdtcpflt5bhp->position === "fixed" ) {
      $Vstfrw5akne1 = $Vrlbsjbjglkb->get_root()->get_containing_block();
    }
    
    
    

    if ( !isset($Vstfrw5akne1["w"]) )
      throw new DOMPDF_Exception("Box property calculation requires containing block width");

    
    if ( $Vdtcpflt5bhp->width === "100%" ) {
      $Vojs2qdgagwv = "auto";
    }
    else {
      $Vojs2qdgagwv = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->width, $Vstfrw5akne1["w"]);
    }
    extract($this->_calculate_width($Vojs2qdgagwv));

    
    $Vbmqm5rtvfg1 = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->min_width, $Vstfrw5akne1["w"]);
    $V5rhx0grvqdh = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->max_width, $Vstfrw5akne1["w"]);

    if ( $V5rhx0grvqdh !== "none" && $Vbmqm5rtvfg1 > $V5rhx0grvqdh)
      
      list($V5rhx0grvqdh, $Vbmqm5rtvfg1) = array($Vbmqm5rtvfg1, $V5rhx0grvqdh);

    if ( $V5rhx0grvqdh !== "none" && $Vojs2qdgagwv > $V5rhx0grvqdh )
      extract($this->_calculate_width($V5rhx0grvqdh));

    if ( $Vojs2qdgagwv < $Vbmqm5rtvfg1 )
      extract($this->_calculate_width($Vbmqm5rtvfg1));

    return array($Vojs2qdgagwv, $V23iooycelpx, $Vr5tccqi244u, $Vrce0gsxjgkc, $Vqyn43hpxtm0);

  }
  
  
  protected function _calculate_content_height() {
    $Vstkyagwfnc1 = $this->_frame->get_line_boxes();
    
    $Vouehfmbjdgp = reset($Vstkyagwfnc1);
    $Vkzppxrtsbie  = end($Vstkyagwfnc1);
    $Vzo4g5xb4yip = $Vkzppxrtsbie->y + $Vkzppxrtsbie->h - $Vouehfmbjdgp->y;
    
    return $Vzo4g5xb4yip;
  }

  
  protected function _calculate_restricted_height() {
    $Vrlbsjbjglkb = $this->_frame;
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    $Vfgz5f4xk2vw = $this->_calculate_content_height();
    $Vstfrw5akne1 = $Vrlbsjbjglkb->get_containing_block();
    
    $Vzo4g5xb4yip = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->height, $Vstfrw5akne1["h"]);

    $Vrveb1xz24qu    = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->top, $Vstfrw5akne1["h"]);
    $Vyzmqhafpy0b = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->bottom, $Vstfrw5akne1["h"]);

    $Vtvmz42cnw2n    = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->margin_top, $Vstfrw5akne1["h"]);
    $Vn4lgxfilu5x = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->margin_bottom, $Vstfrw5akne1["h"]);

    if ( $Vrlbsjbjglkb->is_absolute() ) {

      

      $Vko3el2sr5ba = array($Vrveb1xz24qu !== "auto" ? $Vrveb1xz24qu : 0,
                    $Vdtcpflt5bhp->margin_top !== "auto" ? $Vdtcpflt5bhp->margin_top : 0,
                    $Vdtcpflt5bhp->padding_top,
                    $Vdtcpflt5bhp->border_top_width,
                    $Vzo4g5xb4yip !== "auto" ? $Vzo4g5xb4yip : 0,
                    $Vdtcpflt5bhp->border_bottom_width,
                    $Vdtcpflt5bhp->padding_bottom,
                    $Vdtcpflt5bhp->margin_bottom !== "auto" ? $Vdtcpflt5bhp->margin_bottom : 0,
                    $Vyzmqhafpy0b !== "auto" ? $Vyzmqhafpy0b : 0);

      $Vvbwz1pamc2b = $Vdtcpflt5bhp->length_in_pt($Vko3el2sr5ba, $Vstfrw5akne1["h"]);

      $Vyn0oxmudejv = $Vstfrw5akne1["h"] - $Vvbwz1pamc2b; 

      if ( $Vyn0oxmudejv > 0 ) {

        if ( $Vzo4g5xb4yip === "auto" && $Vrveb1xz24qu === "auto" && $Vyzmqhafpy0b === "auto" ) {

          if ( $Vtvmz42cnw2n === "auto" ) 
            $Vtvmz42cnw2n = 0;
          if ( $Vn4lgxfilu5x === "auto" )
            $Vn4lgxfilu5x = 0;

          $Vzo4g5xb4yip = $Vyn0oxmudejv;

        } else if ( $Vzo4g5xb4yip === "auto" && $Vrveb1xz24qu === "auto" ) {

          if ( $Vtvmz42cnw2n === "auto" ) 
            $Vtvmz42cnw2n = 0;
          if ( $Vn4lgxfilu5x === "auto" )
            $Vn4lgxfilu5x = 0;

          $Vzo4g5xb4yip = $Vfgz5f4xk2vw;
          $Vrveb1xz24qu = $Vyn0oxmudejv - $Vfgz5f4xk2vw;

        } else if ( $Vzo4g5xb4yip === "auto" && $Vyzmqhafpy0b === "auto" ) {

          if ( $Vtvmz42cnw2n === "auto" ) 
            $Vtvmz42cnw2n = 0;
          if ( $Vn4lgxfilu5x === "auto" )
            $Vn4lgxfilu5x = 0;

          $Vzo4g5xb4yip = $Vfgz5f4xk2vw;
          $Vyzmqhafpy0b = $Vyn0oxmudejv - $Vfgz5f4xk2vw;

        } else if ( $Vrveb1xz24qu === "auto" && $Vyzmqhafpy0b === "auto" ) {

          if ( $Vtvmz42cnw2n === "auto" ) 
            $Vtvmz42cnw2n = 0;
          if ( $Vn4lgxfilu5x === "auto" )
            $Vn4lgxfilu5x = 0;

          $Vyzmqhafpy0b = $Vyn0oxmudejv;

        } else if ( $Vrveb1xz24qu === "auto" ) {

          if ( $Vtvmz42cnw2n === "auto" ) 
            $Vtvmz42cnw2n = 0;
          if ( $Vn4lgxfilu5x === "auto" )
            $Vn4lgxfilu5x = 0;

          $Vrveb1xz24qu = $Vyn0oxmudejv;

        } else if ( $Vzo4g5xb4yip === "auto" ) {

          if ( $Vtvmz42cnw2n === "auto" ) 
            $Vtvmz42cnw2n = 0;
          if ( $Vn4lgxfilu5x === "auto" )
            $Vn4lgxfilu5x = 0;

          $Vzo4g5xb4yip = $Vyn0oxmudejv;

        } else if ( $Vyzmqhafpy0b === "auto" ) {

          if ( $Vtvmz42cnw2n === "auto" ) 
            $Vtvmz42cnw2n = 0;
          if ( $Vn4lgxfilu5x === "auto" )
            $Vn4lgxfilu5x = 0;

          $Vyzmqhafpy0b = $Vyn0oxmudejv;

        } else {

          if ( $Vdtcpflt5bhp->overflow === "visible" ) {

            
            if ( $Vtvmz42cnw2n === "auto" ) 
              $Vtvmz42cnw2n = 0;
            if ( $Vn4lgxfilu5x === "auto" )
              $Vn4lgxfilu5x = 0;
            if ( $Vrveb1xz24qu === "auto" )
              $Vrveb1xz24qu = 0;
            if ( $Vyzmqhafpy0b === "auto" )
              $Vyzmqhafpy0b = 0;
            if ( $Vzo4g5xb4yip === "auto" )
              $Vzo4g5xb4yip = $Vfgz5f4xk2vw;

          }

          
        }

      }

    } else {

      
      if ( $Vzo4g5xb4yip === "auto" && $Vfgz5f4xk2vw > $Vzo4g5xb4yip ) 
        $Vzo4g5xb4yip = $Vfgz5f4xk2vw;

      
      
      
      
      if ( !($Vdtcpflt5bhp->overflow === "visible" ||
             ($Vdtcpflt5bhp->overflow === "hidden" && $Vzo4g5xb4yip === "auto")) ) {

        $Vz3ygq4vvt0i = $Vdtcpflt5bhp->min_height;
        $Vykwcb1vczeg = $Vdtcpflt5bhp->max_height;

        if ( isset($Vstfrw5akne1["h"]) ) {
          $Vz3ygq4vvt0i = $Vdtcpflt5bhp->length_in_pt($Vz3ygq4vvt0i, $Vstfrw5akne1["h"]);
          $Vykwcb1vczeg = $Vdtcpflt5bhp->length_in_pt($Vykwcb1vczeg, $Vstfrw5akne1["h"]);

        } else if ( isset($Vstfrw5akne1["w"]) ) {

          if ( mb_strpos($Vz3ygq4vvt0i, "%") !== false )
            $Vz3ygq4vvt0i = 0;
          else
            $Vz3ygq4vvt0i = $Vdtcpflt5bhp->length_in_pt($Vz3ygq4vvt0i, $Vstfrw5akne1["w"]);

          if ( mb_strpos($Vykwcb1vczeg, "%") !== false )
            $Vykwcb1vczeg = "none";
          else
            $Vykwcb1vczeg = $Vdtcpflt5bhp->length_in_pt($Vykwcb1vczeg, $Vstfrw5akne1["w"]);
        }

        if ( $Vykwcb1vczeg !== "none" && $Vz3ygq4vvt0i > $Vykwcb1vczeg )
          
          list($Vykwcb1vczeg, $Vz3ygq4vvt0i) = array($Vz3ygq4vvt0i, $Vykwcb1vczeg);

        if ( $Vykwcb1vczeg !== "none" && $Vzo4g5xb4yip > $Vykwcb1vczeg )
          $Vzo4g5xb4yip = $Vykwcb1vczeg;

        if ( $Vzo4g5xb4yip < $Vz3ygq4vvt0i )
          $Vzo4g5xb4yip = $Vz3ygq4vvt0i;
      }

    }

    return array($Vzo4g5xb4yip, $Vtvmz42cnw2n, $Vn4lgxfilu5x, $Vrveb1xz24qu, $Vyzmqhafpy0b);

  }

  
  protected function _text_align() {
    $Vdtcpflt5bhp = $this->_frame->get_style();
    $Vwsgifrh5ics = $this->_frame->get_containing_block("w");
    $Vojs2qdgagwv = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->width, $Vwsgifrh5ics);
    switch ($Vdtcpflt5bhp->text_align) {

    default:
    case "left":
      foreach ($this->_frame->get_line_boxes() as $Vdmbypy2xlg1) {
        if ( !$Vdmbypy2xlg1->left ) continue;
        foreach($Vdmbypy2xlg1->get_frames() as $Vrlbsjbjglkb) {
          if ( $Vrlbsjbjglkb instanceof Block_Frame_Decorator) continue;
          $Vrlbsjbjglkb->set_position( $Vrlbsjbjglkb->get_position("x") + $Vdmbypy2xlg1->left );
        }
      }
      return;

    case "right":
      foreach ($this->_frame->get_line_boxes() as $Vdmbypy2xlg1) {
        
        $Vcxaujbeexic = $Vojs2qdgagwv - $Vdmbypy2xlg1->w - $Vdmbypy2xlg1->right;
        
        foreach($Vdmbypy2xlg1->get_frames() as $Vrlbsjbjglkb) {
          
          if ($Vrlbsjbjglkb instanceof Block_Frame_Decorator) continue;
          
          $Vrlbsjbjglkb->set_position( $Vrlbsjbjglkb->get_position("x") + $Vcxaujbeexic );
        }
      }
      break;


    case "justify":
      
      $Vstkyagwfnc1 = $this->_frame->get_line_boxes(); 
      $Vstkyagwfnc1 = array_splice($Vstkyagwfnc1, 0, -1);
      
      foreach($Vstkyagwfnc1 as $Vfhiq1lhsoja => $Vdmbypy2xlg1) {
        if ( $Vdmbypy2xlg1->br ) {
          unset($Vstkyagwfnc1[$Vfhiq1lhsoja]);
        }
      }
      
      
      $V00fbi41ssl1 = Font_Metrics::get_text_width(" ", $Vdtcpflt5bhp->font_family, $Vdtcpflt5bhp->font_size);
      
      foreach ($Vstkyagwfnc1 as $Vfhiq1lhsoja => $Vdmbypy2xlg1) {
        if ( $Vdmbypy2xlg1->left ) {
          foreach($Vdmbypy2xlg1->get_frames() as $Vrlbsjbjglkb) {
            if ( !$Vrlbsjbjglkb instanceof Text_Frame_Decorator )
              continue;
  
            $Vrlbsjbjglkb->set_position( $Vrlbsjbjglkb->get_position("x") + $Vdmbypy2xlg1->left );
          }
        }
          
        
        
        
          
          
          if ( $Vdmbypy2xlg1->wc > 1 )
            $V4blp1adqmut = ($Vojs2qdgagwv - ($Vdmbypy2xlg1->left + $Vdmbypy2xlg1->w + $Vdmbypy2xlg1->right) + $V00fbi41ssl1) / ($Vdmbypy2xlg1->wc - 1);
          else
            $V4blp1adqmut = 0;

          $Vcxaujbeexic = 0;
          foreach($Vdmbypy2xlg1->get_frames() as $Vrlbsjbjglkb) {
            if ( !$Vrlbsjbjglkb instanceof Text_Frame_Decorator )
              continue;
              
            $Vkjdq1foihhi = $Vrlbsjbjglkb->get_text();
            $Vc1bbjcufjcy = mb_substr_count($Vkjdq1foihhi, " ");
            
            $Vshdzmkj2dla = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->letter_spacing);
            $Vvkdf3h35tlc = $V4blp1adqmut + $Vshdzmkj2dla;
            
            $Vrlbsjbjglkb->set_position( $Vrlbsjbjglkb->get_position("x") + $Vcxaujbeexic );
            $Vrlbsjbjglkb->set_text_spacing($Vvkdf3h35tlc);
            
            $Vcxaujbeexic += $Vc1bbjcufjcy * $Vvkdf3h35tlc;
          }

          
          $this->_frame->set_line($Vfhiq1lhsoja, null, $Vojs2qdgagwv);

        
      }
      break;

    case "center":
    case "centre":
      foreach ($this->_frame->get_line_boxes() as $Vdmbypy2xlg1) {
        
        $Vcxaujbeexic = ($Vojs2qdgagwv + $Vdmbypy2xlg1->left - $Vdmbypy2xlg1->w - $Vdmbypy2xlg1->right ) / 2;
        
        foreach ($Vdmbypy2xlg1->get_frames() as $Vrlbsjbjglkb) {
          
          if ($Vrlbsjbjglkb instanceof Block_Frame_Decorator) continue;
          
          $Vrlbsjbjglkb->set_position( $Vrlbsjbjglkb->get_position("x") + $Vcxaujbeexic );
        }
      }
      break;
    }
  }
  
  
  function vertical_align() {
    
    $Vhvgft0vzcla = null;
    
    foreach ( $this->_frame->get_line_boxes() as $Vdmbypy2xlg1 ) {

      $Vzo4g5xb4yip = $Vdmbypy2xlg1->h;
    
      foreach ( $Vdmbypy2xlg1->get_frames() as $Vrlbsjbjglkb ) {
        $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();

        if ( $Vdtcpflt5bhp->display !== "inline" && $Vdtcpflt5bhp->display !== "text" )
          continue;

        
        if ( $this instanceof Table_Cell_Frame_Reflower )
          $Vllykjmigfhv = $Vrlbsjbjglkb->get_frame()->get_style()->vertical_align;
        else 
          $Vllykjmigfhv = $Vrlbsjbjglkb->get_frame()->get_parent()->get_style()->vertical_align;
          
        $Vrlbsjbjglkb_h = $Vrlbsjbjglkb->get_margin_height();
        
        if ( !isset($Vhvgft0vzcla) ) {
          $Vhvgft0vzcla = $Vrlbsjbjglkb->get_root()->get_dompdf()->get_canvas();
        }
        
        $Vzfri4msc1sz = $Vhvgft0vzcla->get_font_baseline($Vdtcpflt5bhp->font_family, $Vdtcpflt5bhp->font_size);
        $V1ddku4w0ezi = 0;
        
        switch ($Vllykjmigfhv) {
          case "baseline":
            $V1ddku4w0ezi = $Vzo4g5xb4yip*0.8 - $Vzfri4msc1sz; 
            break;
    
          case "middle":
            $V1ddku4w0ezi = ($Vzo4g5xb4yip*0.8 - $Vzfri4msc1sz) / 2;
            break;
    
          case "sub":
            $V1ddku4w0ezi = 0.3 * $Vzo4g5xb4yip;
            break;
    
          case "super":
            $V1ddku4w0ezi = -0.2 * $Vzo4g5xb4yip;
            break;
    
          case "text-top":
          case "top": 
            break;
    
          case "text-bottom":
          case "bottom":
            $V1ddku4w0ezi = $Vzo4g5xb4yip*0.8 - $Vzfri4msc1sz;
            break;
        }
         
        if ( $V1ddku4w0ezi ) {
          $Vrlbsjbjglkb->move(0, $V1ddku4w0ezi);
        }
      }
    }
  }
  
  function process_clear(Frame $Vcnoizcxjx0n){
    if ( !DOMPDF_ENABLE_CSS_FLOAT ) {
      return;
    }
    
    $Vcnoizcxjx0n_style = $Vcnoizcxjx0n->get_style();
    $V4jn4msro4hf = $this->_frame->get_root();
    
    
    if ( $Vcnoizcxjx0n_style->clear !== "none" ) {
      $Vbzumk1slbyr = $V4jn4msro4hf->get_lowest_float_offset($Vcnoizcxjx0n);
      
      
      if ( $Vbzumk1slbyr ) {
        if ( $Vcnoizcxjx0n->is_in_flow() ) {
          $Vdmbypy2xlg1_box = $this->_frame->get_current_line_box();
          $Vdmbypy2xlg1_box->y = $Vbzumk1slbyr + $Vcnoizcxjx0n->get_margin_height();
          $Vdmbypy2xlg1_box->left = 0;
          $Vdmbypy2xlg1_box->right = 0;
        }
        
        $Vcnoizcxjx0n->move(0, $Vbzumk1slbyr - $Vcnoizcxjx0n->get_position("y"));
      }
    }
  }
  
  function process_float(Frame $Vcnoizcxjx0n, $Vstfrw5akne1_x, $Vstfrw5akne1_w){
    if ( !DOMPDF_ENABLE_CSS_FLOAT ) {
      return;
    }
    
    $Vcnoizcxjx0n_style = $Vcnoizcxjx0n->get_style();
    $V4jn4msro4hf = $this->_frame->get_root();
    
    
    if ( $Vcnoizcxjx0n_style->float !== "none" ) {
      $V4jn4msro4hf->add_floating_frame($Vcnoizcxjx0n);
      
      
      $Vjg5z2pedl1b = $Vcnoizcxjx0n->get_next_sibling();
      if ( $Vjg5z2pedl1b && $Vjg5z2pedl1b instanceof Text_Frame_Decorator) {
        $Vjg5z2pedl1b->set_text(ltrim($Vjg5z2pedl1b->get_text()));
      }
      
      $Vdmbypy2xlg1_box = $this->_frame->get_current_line_box();
      list($Vypj4bhdnhdu, $V25zytagak53) = $Vcnoizcxjx0n->get_position();
      
      $Vypj4gewwzcj = $Vstfrw5akne1_x;
      $Vnp2dsbwgl0h = $V25zytagak53;
      $Vxyttj3nxefx = $Vcnoizcxjx0n->get_margin_width();
      
      if ( $Vcnoizcxjx0n_style->clear === "none" ) {
        switch( $Vcnoizcxjx0n_style->float ) {
          case "left": 
            $Vypj4gewwzcj += $Vdmbypy2xlg1_box->left;
            break;
          case "right": 
            $Vypj4gewwzcj += ($Vstfrw5akne1_w - $Vdmbypy2xlg1_box->right - $Vxyttj3nxefx);
            break;
        }
      }
      else {
        if ( $Vcnoizcxjx0n_style->float === "right" ) {
          $Vypj4gewwzcj += ($Vstfrw5akne1_w - $Vxyttj3nxefx);
        }
      }
      
      $Vdmbypy2xlg1_box->get_float_offsets();
      
      if ( $Vcnoizcxjx0n->_float_next_line ) {
        $Vnp2dsbwgl0h += $Vdmbypy2xlg1_box->h;
      }
      
      $Vcnoizcxjx0n->set_position($Vypj4gewwzcj, $Vnp2dsbwgl0h);
      $Vcnoizcxjx0n->move($Vypj4gewwzcj - $Vypj4bhdnhdu, $Vnp2dsbwgl0h - $V25zytagak53, true);
    }
  }

  function reflow(Frame_Decorator $V4uturqtpcq5 = null) {

    
    $Vmt0302hgn5x = $this->_frame->get_root();
    $Vmt0302hgn5x->check_forced_page_break($this->_frame);

    
    if ( $Vmt0302hgn5x->is_full() )
      return;
      
    
    $this->_set_content();

    
    $this->_collapse_margins();

    $Vdtcpflt5bhp = $this->_frame->get_style();
    $Vstfrw5akne1 = $this->_frame->get_containing_block();
    
    if ( $Vdtcpflt5bhp->position === "fixed" ) {
      $Vstfrw5akne1 = $this->_frame->get_root()->get_containing_block();
    }
    
    
    
    list($Vwsgifrh5ics, $Vrce0gsxjgkc_margin, $Vqyn43hpxtm0_margin, $Vrce0gsxjgkc, $Vqyn43hpxtm0) = $this->_calculate_restricted_width();

    
    $Vdtcpflt5bhp->width = $Vwsgifrh5ics . "pt";
    $Vdtcpflt5bhp->margin_left = $Vrce0gsxjgkc_margin."pt";
    $Vdtcpflt5bhp->margin_right = $Vqyn43hpxtm0_margin."pt";
    $Vdtcpflt5bhp->left = $Vrce0gsxjgkc ."pt";
    $Vdtcpflt5bhp->right = $Vqyn43hpxtm0 . "pt";
    
    
    $this->_frame->position();
    list($V1e1eaicqarh, $Vqwmp2bx0ii2) = $this->_frame->get_position();

    
    $Vfhiq1lhsojandent = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->text_indent, $Vstfrw5akne1["w"]);
    $this->_frame->increase_line_width($Vfhiq1lhsojandent);

    
    $Vrveb1xz24qu = $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->margin_top,
                                      $Vdtcpflt5bhp->padding_top,
                                      $Vdtcpflt5bhp->border_top_width), $Vstfrw5akne1["h"]);

    $Vyzmqhafpy0b = $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->border_bottom_width,
                                         $Vdtcpflt5bhp->margin_bottom,
                                         $Vdtcpflt5bhp->padding_bottom), $Vstfrw5akne1["h"]);

    $Vstfrw5akne1_x = $V1e1eaicqarh + $Vrce0gsxjgkc_margin + $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->border_left_width, 
                                                           $Vdtcpflt5bhp->padding_left), $Vstfrw5akne1["w"]);

    $Vstfrw5akne1_y = $Vqwmp2bx0ii2 + $Vrveb1xz24qu;

    $Vstfrw5akne1_h = ($Vstfrw5akne1["h"] + $Vstfrw5akne1["y"]) - $Vyzmqhafpy0b - $Vstfrw5akne1_y;

    
    $this->_frame->set_current_line($Vstfrw5akne1_y);
        
    $this->_frame->get_current_line_box()->get_float_offsets();
    
    
    foreach ( $this->_frame->get_children() as $Vcnoizcxjx0n ) {
      
      
      if ( $Vmt0302hgn5x->is_full() )
        break;
      
      $Vcnoizcxjx0n->set_containing_block($Vstfrw5akne1_x, $Vstfrw5akne1_y, $Vwsgifrh5ics, $Vstfrw5akne1_h);
      
      $this->process_clear($Vcnoizcxjx0n);
      
      $Vcnoizcxjx0n->reflow($this->_frame);
      
      
      if ( $Vmt0302hgn5x->check_page_break($Vcnoizcxjx0n) )
        break;
      
      $this->process_float($Vcnoizcxjx0n, $Vstfrw5akne1_x, $Vwsgifrh5ics);
    }

    
    list($Vzo4g5xb4yip, $Vtvmz42cnw2n, $Vn4lgxfilu5x, $Vrveb1xz24qu, $Vyzmqhafpy0b) = $this->_calculate_restricted_height();
    $Vdtcpflt5bhp->height = $Vzo4g5xb4yip;
    $Vdtcpflt5bhp->margin_top = $Vtvmz42cnw2n;
    $Vdtcpflt5bhp->margin_bottom = $Vn4lgxfilu5x;
    $Vdtcpflt5bhp->top = $Vrveb1xz24qu;
    $Vdtcpflt5bhp->bottom = $Vyzmqhafpy0b;
    
    $Vlbufdpunh4x = ($Vdtcpflt5bhp->position === "absolute" && ($Vdtcpflt5bhp->right !== "auto" || $Vdtcpflt5bhp->bottom !== "auto"));
    
    
    if ( $Vlbufdpunh4x ) {
      $V2hehlfpg2wy = $this->_frame->get_original_style();
      if ( $V2hehlfpg2wy->width === "auto" && ($V2hehlfpg2wy->left === "auto" || $V2hehlfpg2wy->right === "auto") ) {
        $Vojs2qdgagwv = 0;
        foreach ($this->_frame->get_line_boxes() as $Vdmbypy2xlg1) {
          $Vojs2qdgagwv = max($Vdmbypy2xlg1->w, $Vojs2qdgagwv);
        }
        $Vdtcpflt5bhp->width = $Vojs2qdgagwv;
      }
      
      $Vdtcpflt5bhp->left = $V2hehlfpg2wy->left;
      $Vdtcpflt5bhp->right = $V2hehlfpg2wy->right;
    }

    $this->_text_align();
    $this->vertical_align();
    
    
    if ( $Vlbufdpunh4x ) {
      list($V1e1eaicqarh, $Vqwmp2bx0ii2) = $this->_frame->get_position();
      $this->_frame->position();
      list($Vf5jjnlgsbx5, $V3zkjjbois4q) = $this->_frame->get_position();
      $this->_frame->move($Vf5jjnlgsbx5-$V1e1eaicqarh, $V3zkjjbois4q-$Vqwmp2bx0ii2, true);
    }
    
    if ( $V4uturqtpcq5 && $this->_frame->is_in_flow() ) {
      $V4uturqtpcq5->add_frame_to_line($this->_frame);
      
      
      if ( $Vdtcpflt5bhp->display === "block" ) {
        $V4uturqtpcq5->add_line();
      }
    }
  }
}
