<?php



abstract class Abstract_Renderer {

  
  protected $V4u1equ3zmgd;

  
  protected $Vci1vex3llkx;
  
  
  function __construct(DOMPDF $Vhygqjznl3ul) {
    $this->_dompdf = $Vhygqjznl3ul;
    $this->_canvas = $Vhygqjznl3ul->get_canvas();
  }
  
  
  abstract function render(Frame $Vrlbsjbjglkb);

  

  
  protected function _background_image($Vbfatyoohaps, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vojs2qdgagwv, $Vzo4g5xb4yip, $Vdtcpflt5bhp) {
    $Vzg4jtrmmzdy = $Vdtcpflt5bhp->get_stylesheet();

    
    if ( $Vojs2qdgagwv == 0 || $Vzo4g5xb4yip == 0 )
      return;
    
    $Vq413gi20fry = $Vojs2qdgagwv;
    $V4x3aifslf4q = $Vzo4g5xb4yip;

    
    if (DEBUGPNG) print '[_background_image '.$Vbfatyoohaps.']';

    list($Vkcptinxn5rf, $V4pigtpor0ln, $Vzjcdynyc23y) = Image_Cache::resolve_url($Vbfatyoohaps,
                                                $Vzg4jtrmmzdy->get_protocol(),
                                                $Vzg4jtrmmzdy->get_host(),
                                                $Vzg4jtrmmzdy->get_base_path());

    
    if ( Image_Cache::is_broken($Vkcptinxn5rf) )
      return;

    
    
    
    
    

    list($Vkcptinxn5rf_w, $Vkcptinxn5rf_h) = dompdf_getimagesize($Vkcptinxn5rf);
    if (!isset($Vkcptinxn5rf_w) || $Vkcptinxn5rf_w == 0 || !isset($Vkcptinxn5rf_h) || $Vkcptinxn5rf_h == 0) {
      return;
    }

    $Ventvdulusdf = $Vdtcpflt5bhp->background_repeat;
    $Vh4bkthyxaf3 = $Vdtcpflt5bhp->background_color;

    
    
    $Vp5gjvjx2ftj = round((float)($Vojs2qdgagwv * DOMPDF_DPI) / 72);
    $Vuntqeyogp4y = round((float)($Vzo4g5xb4yip * DOMPDF_DPI) / 72);

    

    list($Vbabrkh1nvcn, $Vz051rhaqk4s) = $Vdtcpflt5bhp->background_position;

    if ( is_percent($Vbabrkh1nvcn) ) {
      
      
      $Vzqw0ieauwu4 = ((float)$Vbabrkh1nvcn)/100.0;
      $V1e1eaicqarh1 = $Vzqw0ieauwu4 * $Vkcptinxn5rf_w;
      $V1e1eaicqarh2 = $Vzqw0ieauwu4 * $Vp5gjvjx2ftj;

      $Vbabrkh1nvcn = $V1e1eaicqarh2 - $V1e1eaicqarh1;
    } else {
      $Vbabrkh1nvcn = (float)($Vdtcpflt5bhp->length_in_pt($Vbabrkh1nvcn)*DOMPDF_DPI) / 72;
    }
    
    $Vbabrkh1nvcn = round($Vbabrkh1nvcn + $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->border_left_width)*DOMPDF_DPI / 72);

    if ( is_percent($Vz051rhaqk4s) ) {
      
      
      $Vzqw0ieauwu4 = ((float)$Vz051rhaqk4s)/100.0;
      $Vqwmp2bx0ii21 = $Vzqw0ieauwu4 * $Vkcptinxn5rf_h;
      $Vqwmp2bx0ii22 = $Vzqw0ieauwu4 * $Vuntqeyogp4y;

      $Vz051rhaqk4s = $Vqwmp2bx0ii22 - $Vqwmp2bx0ii21;
    } else {
      $Vz051rhaqk4s = (float)($Vdtcpflt5bhp->length_in_pt($Vz051rhaqk4s)*DOMPDF_DPI) / 72;
    }
    
    $Vz051rhaqk4s = round($Vz051rhaqk4s + $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->border_top_width)*DOMPDF_DPI / 72);

    
    
    
    

    if ( $Ventvdulusdf !== "repeat" && $Ventvdulusdf !== "repeat-x" ) {
      
      if ($Vbabrkh1nvcn < 0) {
        $Vp5gjvjx2ftj = $Vkcptinxn5rf_w + $Vbabrkh1nvcn;
      } else {
        $V1e1eaicqarh += ($Vbabrkh1nvcn * 72)/DOMPDF_DPI;
        $Vp5gjvjx2ftj = $Vp5gjvjx2ftj - $Vbabrkh1nvcn;
        if ($Vp5gjvjx2ftj > $Vkcptinxn5rf_w) {
          $Vp5gjvjx2ftj = $Vkcptinxn5rf_w;
        }
        $Vbabrkh1nvcn = 0;
      }
      if ($Vp5gjvjx2ftj <= 0) {
        return;
      }
      $Vojs2qdgagwv = (float)($Vp5gjvjx2ftj * 72)/DOMPDF_DPI;
    } else {
      
      if ($Vbabrkh1nvcn < 0) {
        $Vbabrkh1nvcn = - ((-$Vbabrkh1nvcn) % $Vkcptinxn5rf_w);
      } else {
        $Vbabrkh1nvcn = $Vbabrkh1nvcn % $Vkcptinxn5rf_w;
        if ($Vbabrkh1nvcn > 0) {
          $Vbabrkh1nvcn -= $Vkcptinxn5rf_w;
        }
      }
    }

    if ( $Ventvdulusdf !== "repeat" && $Ventvdulusdf !== "repeat-y" ) {
      
      if ($Vz051rhaqk4s < 0) {
        $Vuntqeyogp4y = $Vkcptinxn5rf_h + $Vz051rhaqk4s;
      } else {
        $Vqwmp2bx0ii2 += ($Vz051rhaqk4s * 72)/DOMPDF_DPI;
        $Vuntqeyogp4y = $Vuntqeyogp4y - $Vz051rhaqk4s;
        if ($Vuntqeyogp4y > $Vkcptinxn5rf_h) {
          $Vuntqeyogp4y = $Vkcptinxn5rf_h;
        }
        $Vz051rhaqk4s = 0;
      }
      if ($Vuntqeyogp4y <= 0) {
        return;
      }
      $Vzo4g5xb4yip = (float)($Vuntqeyogp4y * 72)/DOMPDF_DPI;
    } else {
      
      if ($Vz051rhaqk4s < 0) {
        $Vz051rhaqk4s = - ((-$Vz051rhaqk4s) % $Vkcptinxn5rf_h);
      } else {
        $Vz051rhaqk4s = $Vz051rhaqk4s % $Vkcptinxn5rf_h;
        if ($Vz051rhaqk4s > 0) {
          $Vz051rhaqk4s -= $Vkcptinxn5rf_h;
        }
      }
    }

    
    if ( $Ventvdulusdf === "repeat" && $Vz051rhaqk4s <= 0 && $Vkcptinxn5rf_h+$Vz051rhaqk4s >= $Vuntqeyogp4y ) {
      $Ventvdulusdf = "repeat-x";
    }
    if ( $Ventvdulusdf === "repeat" && $Vbabrkh1nvcn <= 0 && $Vkcptinxn5rf_w+$Vbabrkh1nvcn >= $Vp5gjvjx2ftj ) {
      $Ventvdulusdf = "repeat-y";
    }
    if ( ($Ventvdulusdf === "repeat-x" && $Vbabrkh1nvcn <= 0 && $Vkcptinxn5rf_w+$Vbabrkh1nvcn >= $Vp5gjvjx2ftj) ||
         ($Ventvdulusdf === "repeat-y" && $Vz051rhaqk4s <= 0 && $Vkcptinxn5rf_h+$Vz051rhaqk4s >= $Vuntqeyogp4y) ) {
      $Ventvdulusdf = "no-repeat";
    }

    
    
    
    

    $Vvprconpqv4z = $Vkcptinxn5rf;

    
    
    $Vbasksddku5w = false;
    $Vvprconpqv4z .= '_'.$Vp5gjvjx2ftj.'_'.$Vuntqeyogp4y.'_'.$Vbabrkh1nvcn.'_'.$Vz051rhaqk4s.'_'.$Ventvdulusdf;
    
    

    
    
    
    if ( method_exists( $this->_canvas, "get_cpdf" ) &&
         method_exists( $this->_canvas->get_cpdf(), "addImagePng" ) &&
         method_exists( $this->_canvas->get_cpdf(), "image_iscached" ) &&
         $this->_canvas->get_cpdf()->image_iscached($Vvprconpqv4z) ) {
       $Vn4k2wgjnmox = null;

      
      
    } 
    
    else {

    
    $Vn4k2wgjnmox = imagecreatetruecolor($Vp5gjvjx2ftj, $Vuntqeyogp4y);
    
    switch (strtolower($V4pigtpor0ln)) {
      case IMAGETYPE_PNG:
        $Vbasksddku5w = true;
        imagesavealpha($Vn4k2wgjnmox, true);
        imagealphablending($Vn4k2wgjnmox, false);
        $V0cmmze43kb4 = imagecreatefrompng($Vkcptinxn5rf);
        break;
  
      case IMAGETYPE_JPEG:
        $V0cmmze43kb4 = imagecreatefromjpeg($Vkcptinxn5rf);
        break;
  
      case IMAGETYPE_GIF:
        $V0cmmze43kb4 = imagecreatefromgif($Vkcptinxn5rf);
        break;
        
      case IMAGETYPE_BMP:
        $V0cmmze43kb4 = imagecreatefrombmp($Vkcptinxn5rf);
        break;
  
      default: return; 
    }

    if ($V0cmmze43kb4 == null) {
      return;
    }

    
    
    
    
    
    $Vvleufiprf3r = imagecolortransparent($V0cmmze43kb4);
    
    if ($Vvleufiprf3r >= 0) {
      $Vbl5h5rf03fo = imagecolorsforindex($V0cmmze43kb4,$Vvleufiprf3r);
      $Vvleufiprf3r = imagecolorallocate($Vn4k2wgjnmox,$Vbl5h5rf03fo['red'],$Vbl5h5rf03fo['green'],$Vbl5h5rf03fo['blue']);
      imagefill($Vn4k2wgjnmox,0,0,$Vvleufiprf3r);
      imagecolortransparent($Vn4k2wgjnmox, $Vvleufiprf3r);
    }

    
    
    if ( $Vbabrkh1nvcn < 0 ) {
      $Vx44bbce4sg4 = 0;
      $V0cmmze43kb4_x = -$Vbabrkh1nvcn;
    } else {
      $V0cmmze43kb4_x = 0;
      $Vx44bbce4sg4 = $Vbabrkh1nvcn;
    }

    if ( $Vz051rhaqk4s < 0 ) {
      $Vprypajlunbt = 0;
      $V0cmmze43kb4_y = -$Vz051rhaqk4s;
    } else {
      $V0cmmze43kb4_y = 0;
      $Vprypajlunbt = $Vz051rhaqk4s;
    }

    
    
    $Vjs2nvcqxktm = $Vbabrkh1nvcn;
    $Vyvgzkwzp0oa = $Vz051rhaqk4s;

    
    if ( $Ventvdulusdf === "no-repeat" ) {

      
      imagecopy($Vn4k2wgjnmox, $V0cmmze43kb4, $Vx44bbce4sg4, $Vprypajlunbt, $V0cmmze43kb4_x, $V0cmmze43kb4_y, $Vkcptinxn5rf_w, $Vkcptinxn5rf_h);

    } else if ( $Ventvdulusdf === "repeat-x" ) {

      for ( $Vbabrkh1nvcn = $Vjs2nvcqxktm; $Vbabrkh1nvcn < $Vp5gjvjx2ftj; $Vbabrkh1nvcn += $Vkcptinxn5rf_w ) {
        if ( $Vbabrkh1nvcn < 0 ) {
          $Vx44bbce4sg4 = 0;
          $V0cmmze43kb4_x = -$Vbabrkh1nvcn;
          $Vwsgifrh5ics = $Vkcptinxn5rf_w + $Vbabrkh1nvcn;
        } else {
          $Vx44bbce4sg4 = $Vbabrkh1nvcn;
          $V0cmmze43kb4_x = 0;
          $Vwsgifrh5ics = $Vkcptinxn5rf_w;
        }
        imagecopy($Vn4k2wgjnmox, $V0cmmze43kb4, $Vx44bbce4sg4, $Vprypajlunbt, $V0cmmze43kb4_x, $V0cmmze43kb4_y, $Vwsgifrh5ics, $Vkcptinxn5rf_h);
      }

    } else if ( $Ventvdulusdf === "repeat-y" ) {

      for ( $Vz051rhaqk4s = $Vyvgzkwzp0oa; $Vz051rhaqk4s < $Vuntqeyogp4y; $Vz051rhaqk4s += $Vkcptinxn5rf_h ) {
        if ( $Vz051rhaqk4s < 0 ) {
          $Vprypajlunbt = 0;
          $V0cmmze43kb4_y = -$Vz051rhaqk4s;
          $Vvlxmepre4ko = $Vkcptinxn5rf_h + $Vz051rhaqk4s;
        } else {
          $Vprypajlunbt = $Vz051rhaqk4s;
          $V0cmmze43kb4_y = 0;
          $Vvlxmepre4ko = $Vkcptinxn5rf_h;
        }
        imagecopy($Vn4k2wgjnmox, $V0cmmze43kb4, $Vx44bbce4sg4, $Vprypajlunbt, $V0cmmze43kb4_x, $V0cmmze43kb4_y, $Vkcptinxn5rf_w, $Vvlxmepre4ko);

      }

    } else if ( $Ventvdulusdf === "repeat" ) {

      for ( $Vz051rhaqk4s = $Vyvgzkwzp0oa; $Vz051rhaqk4s < $Vuntqeyogp4y; $Vz051rhaqk4s += $Vkcptinxn5rf_h ) {
        for ( $Vbabrkh1nvcn = $Vjs2nvcqxktm; $Vbabrkh1nvcn < $Vp5gjvjx2ftj; $Vbabrkh1nvcn += $Vkcptinxn5rf_w ) {

          if ( $Vbabrkh1nvcn < 0 ) {
            $Vx44bbce4sg4 = 0;
            $V0cmmze43kb4_x = -$Vbabrkh1nvcn;
            $Vwsgifrh5ics = $Vkcptinxn5rf_w + $Vbabrkh1nvcn;
          } else {
            $Vx44bbce4sg4 = $Vbabrkh1nvcn;
            $V0cmmze43kb4_x = 0;
            $Vwsgifrh5ics = $Vkcptinxn5rf_w;
          }

          if ( $Vz051rhaqk4s < 0 ) {
            $Vprypajlunbt = 0;
            $V0cmmze43kb4_y = -$Vz051rhaqk4s;
            $Vvlxmepre4ko = $Vkcptinxn5rf_h + $Vz051rhaqk4s;
          } else {
            $Vprypajlunbt = $Vz051rhaqk4s;
            $V0cmmze43kb4_y = 0;
            $Vvlxmepre4ko = $Vkcptinxn5rf_h;
          }
          imagecopy($Vn4k2wgjnmox, $V0cmmze43kb4, $Vx44bbce4sg4, $Vprypajlunbt, $V0cmmze43kb4_x, $V0cmmze43kb4_y, $Vwsgifrh5ics, $Vvlxmepre4ko);
        }
      }
    }
    
    else {
      print 'Unknown repeat!';
    }
    
    imagedestroy($V0cmmze43kb4);

    } 

    $this->_canvas->clipping_rectangle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vq413gi20fry, $V4x3aifslf4q);
    
    
    
    
    
    
    
    
    
    
    
    
    if ( !$Vbasksddku5w && method_exists( $this->_canvas, "get_cpdf" ) && 
         method_exists( $this->_canvas->get_cpdf(), "addImagePng" ) ) {
      
      $this->_canvas->get_cpdf()->addImagePng($Vvprconpqv4z, $V1e1eaicqarh, $this->_canvas->get_height() - $Vqwmp2bx0ii2 - $Vzo4g5xb4yip, $Vojs2qdgagwv, $Vzo4g5xb4yip, $Vn4k2wgjnmox);
    } 
    
    else {
      $Vc5dzjvgyf5r = tempnam(DOMPDF_TEMP_DIR, "bg_dompdf_img_");
      @unlink($Vc5dzjvgyf5r);
      $Vqfqmsjizxny = "$Vc5dzjvgyf5r.png";
      
      
      if (DEBUGPNG) print '[_background_image '.$Vqfqmsjizxny.']';

      imagepng($Vn4k2wgjnmox, $Vqfqmsjizxny);
      $this->_canvas->image($Vqfqmsjizxny, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vojs2qdgagwv, $Vzo4g5xb4yip);
      imagedestroy($Vn4k2wgjnmox);

      
      if (DEBUGPNG) print '[_background_image unlink '.$Vqfqmsjizxny.']';

      if (!DEBUGKEEPTEMP)
        unlink($Vqfqmsjizxny);
    }
    
    $this->_canvas->clipping_end();
  }
  
  protected function _get_dash_pattern($Vdtcpflt5bhp, $Vojs2qdgagwv) {
    $Vzqw0ieauwu4attern = array();
    
    switch ($Vdtcpflt5bhp) {
      default:
      
      case "none": break;
      
      case "dotted": 
        if ( $Vojs2qdgagwv <= 1 )
          $Vzqw0ieauwu4attern = array($Vojs2qdgagwv, $Vojs2qdgagwv*2);
        else
          $Vzqw0ieauwu4attern = array($Vojs2qdgagwv);
      break;
      
      case "dashed": 
        $Vzqw0ieauwu4attern = array(3 * $Vojs2qdgagwv);
      break;
    }
    
    return $Vzqw0ieauwu4attern;
  }

  protected function _border_none($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vl5jzlxo3j3n, $Vojs2qdgagwvs, $V5qa0rylnggy, $V5fqniz1znyf = "bevel") {
    return;
  }
  
  protected function _border_hidden($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vl5jzlxo3j3n, $Vojs2qdgagwvs, $V5qa0rylnggy, $V5fqniz1znyf = "bevel") {
    return;
  }
  
  
  protected function _border_dotted($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vl5jzlxo3j3n, $Vojs2qdgagwvs, $V5qa0rylnggy, $V5fqniz1znyf = "bevel") {
    list($Vrveb1xz24qu, $Vqyn43hpxtm0, $Vyzmqhafpy0b, $Vrce0gsxjgkc) = $Vojs2qdgagwvs;

    $Vzqw0ieauwu4attern = $this->_get_dash_pattern("dotted", $$V5qa0rylnggy);
    
    switch ($V5qa0rylnggy) {

    case "top":
      $V4jxxjosqkw5 = $Vrveb1xz24qu / 2;
    case "bottom":
      $V4jxxjosqkw5 = isset($V4jxxjosqkw5) ? $V4jxxjosqkw5 : -$Vyzmqhafpy0b / 2;
      $this->_canvas->line($V1e1eaicqarh, $Vqwmp2bx0ii2 + $V4jxxjosqkw5, $V1e1eaicqarh + $Volq3gdvkuqp, $Vqwmp2bx0ii2 + $V4jxxjosqkw5, $Vl5jzlxo3j3n, $$V5qa0rylnggy, $Vzqw0ieauwu4attern);
      break;

    case "left":
      $V4jxxjosqkw5 = $Vrce0gsxjgkc / 2;
    case "right":
      $V4jxxjosqkw5 = isset($V4jxxjosqkw5) ? $V4jxxjosqkw5 : - $Vqyn43hpxtm0 / 2;
      $this->_canvas->line($V1e1eaicqarh + $V4jxxjosqkw5, $Vqwmp2bx0ii2, $V1e1eaicqarh + $V4jxxjosqkw5, $Vqwmp2bx0ii2 + $Volq3gdvkuqp, $Vl5jzlxo3j3n, $$V5qa0rylnggy, $Vzqw0ieauwu4attern);
      break;

    default:
      return;

    }
  }

  
  protected function _border_dashed($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vl5jzlxo3j3n, $Vojs2qdgagwvs, $V5qa0rylnggy, $V5fqniz1znyf = "bevel") {
    list($Vrveb1xz24qu, $Vqyn43hpxtm0, $Vyzmqhafpy0b, $Vrce0gsxjgkc) = $Vojs2qdgagwvs;

    $Vzqw0ieauwu4attern = $this->_get_dash_pattern("dashed", $$V5qa0rylnggy);
    
    switch ($V5qa0rylnggy) {

    case "top":
      $V4jxxjosqkw5 = $Vrveb1xz24qu / 2;
    case "bottom":
      $V4jxxjosqkw5 = isset($V4jxxjosqkw5) ? $V4jxxjosqkw5 : -$Vyzmqhafpy0b / 2;
      $this->_canvas->line($V1e1eaicqarh, $Vqwmp2bx0ii2 + $V4jxxjosqkw5, $V1e1eaicqarh + $Volq3gdvkuqp, $Vqwmp2bx0ii2 + $V4jxxjosqkw5, $Vl5jzlxo3j3n, $$V5qa0rylnggy, $Vzqw0ieauwu4attern);
      break;

    case "left":
      $V4jxxjosqkw5 = $Vrce0gsxjgkc / 2;
    case "right":
      $V4jxxjosqkw5 = isset($V4jxxjosqkw5) ? $V4jxxjosqkw5 : - $Vqyn43hpxtm0 / 2;
      $this->_canvas->line($V1e1eaicqarh + $V4jxxjosqkw5, $Vqwmp2bx0ii2, $V1e1eaicqarh + $V4jxxjosqkw5, $Vqwmp2bx0ii2 + $Volq3gdvkuqp, $Vl5jzlxo3j3n, $$V5qa0rylnggy, $Vzqw0ieauwu4attern);
      break;

    default:
      return;
    }
    
  }

  
  protected function _border_solid($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vl5jzlxo3j3n, $Vojs2qdgagwvs, $V5qa0rylnggy, $V5fqniz1znyf = "bevel") {
    list($Vrveb1xz24qu, $Vqyn43hpxtm0, $Vyzmqhafpy0b, $Vrce0gsxjgkc) = $Vojs2qdgagwvs;

    
    switch ($V5qa0rylnggy) {

    case "top":
      if ( $V5fqniz1znyf === "bevel" ) {
        
        $Vzqw0ieauwu4oints = array($V1e1eaicqarh, $Vqwmp2bx0ii2,
                        $V1e1eaicqarh + $Volq3gdvkuqp, $Vqwmp2bx0ii2,
                        $V1e1eaicqarh + $Volq3gdvkuqp - $Vqyn43hpxtm0, $Vqwmp2bx0ii2 + $Vrveb1xz24qu,
                        $V1e1eaicqarh + $Vrce0gsxjgkc, $Vqwmp2bx0ii2 + $Vrveb1xz24qu);
        $this->_canvas->polygon($Vzqw0ieauwu4oints, $Vl5jzlxo3j3n, null, null, true);
      } else
        $this->_canvas->filled_rectangle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vrveb1xz24qu, $Vl5jzlxo3j3n);
      
      break;
      
    case "bottom":
      if ( $V5fqniz1znyf === "bevel" ) {
        $Vzqw0ieauwu4oints = array($V1e1eaicqarh, $Vqwmp2bx0ii2,
                        $V1e1eaicqarh + $Volq3gdvkuqp, $Vqwmp2bx0ii2,
                        $V1e1eaicqarh + $Volq3gdvkuqp - $Vqyn43hpxtm0, $Vqwmp2bx0ii2 - $Vyzmqhafpy0b,
                        $V1e1eaicqarh + $Vrce0gsxjgkc, $Vqwmp2bx0ii2 - $Vyzmqhafpy0b);
        $this->_canvas->polygon($Vzqw0ieauwu4oints, $Vl5jzlxo3j3n, null, null, true);
      } else
        $this->_canvas->filled_rectangle($V1e1eaicqarh, $Vqwmp2bx0ii2 - $Vyzmqhafpy0b, $Volq3gdvkuqp, $Vyzmqhafpy0b, $Vl5jzlxo3j3n);
      
      break;
      
    case "left":
      if ( $V5fqniz1znyf === "bevel" ) {
        $Vzqw0ieauwu4oints = array($V1e1eaicqarh, $Vqwmp2bx0ii2,
                        $V1e1eaicqarh, $Vqwmp2bx0ii2 + $Volq3gdvkuqp,
                        $V1e1eaicqarh + $Vrce0gsxjgkc, $Vqwmp2bx0ii2 + $Volq3gdvkuqp - $Vyzmqhafpy0b,
                        $V1e1eaicqarh + $Vrce0gsxjgkc, $Vqwmp2bx0ii2 + $Vrveb1xz24qu);
        $this->_canvas->polygon($Vzqw0ieauwu4oints, $Vl5jzlxo3j3n, null, null, true);
      } else
        $this->_canvas->filled_rectangle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vrce0gsxjgkc, $Volq3gdvkuqp, $Vl5jzlxo3j3n);
      
      break;
      
    case "right":
      if ( $V5fqniz1znyf === "bevel" ) {
        $Vzqw0ieauwu4oints = array($V1e1eaicqarh, $Vqwmp2bx0ii2,
                        $V1e1eaicqarh, $Vqwmp2bx0ii2 + $Volq3gdvkuqp,
                        $V1e1eaicqarh - $Vqyn43hpxtm0, $Vqwmp2bx0ii2 + $Volq3gdvkuqp - $Vyzmqhafpy0b,
                        $V1e1eaicqarh - $Vqyn43hpxtm0, $Vqwmp2bx0ii2 + $Vrveb1xz24qu);
        $this->_canvas->polygon($Vzqw0ieauwu4oints, $Vl5jzlxo3j3n, null, null, true);
      } else
        $this->_canvas->filled_rectangle($V1e1eaicqarh - $Vqyn43hpxtm0, $Vqwmp2bx0ii2, $Vqyn43hpxtm0, $Volq3gdvkuqp, $Vl5jzlxo3j3n);

      break;

    default:
      return;

    }
        
  }


  protected function _border_double($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vl5jzlxo3j3n, $Vojs2qdgagwvs, $V5qa0rylnggy, $V5fqniz1znyf = "bevel") {
    list($Vrveb1xz24qu, $Vqyn43hpxtm0, $Vyzmqhafpy0b, $Vrce0gsxjgkc) = $Vojs2qdgagwvs;
    
    $V0xqpecgdycr = $$V5qa0rylnggy / 3;
    
    
    
    
    switch ($V5qa0rylnggy) {

    case "top":
      if ( $V5fqniz1znyf === "bevel" ) {
        $Vrce0gsxjgkc_line_width = $Vrce0gsxjgkc / 3;
        $Vqyn43hpxtm0_line_width = $Vqyn43hpxtm0 / 3;
        
        $Vzqw0ieauwu4oints = array($V1e1eaicqarh, $Vqwmp2bx0ii2,
                        $V1e1eaicqarh + $Volq3gdvkuqp, $Vqwmp2bx0ii2,
                        $V1e1eaicqarh + $Volq3gdvkuqp - $Vqyn43hpxtm0_line_width, $Vqwmp2bx0ii2 + $V0xqpecgdycr,
                        $V1e1eaicqarh + $Vrce0gsxjgkc_line_width, $Vqwmp2bx0ii2 + $V0xqpecgdycr,);
        $this->_canvas->polygon($Vzqw0ieauwu4oints, $Vl5jzlxo3j3n, null, null, true);
        
        $Vzqw0ieauwu4oints = array($V1e1eaicqarh + $Vrce0gsxjgkc - $Vrce0gsxjgkc_line_width, $Vqwmp2bx0ii2 + $Vrveb1xz24qu - $V0xqpecgdycr,
                        $V1e1eaicqarh + $Volq3gdvkuqp - $Vqyn43hpxtm0 + $Vqyn43hpxtm0_line_width, $Vqwmp2bx0ii2 + $Vrveb1xz24qu - $V0xqpecgdycr,
                        $V1e1eaicqarh + $Volq3gdvkuqp - $Vqyn43hpxtm0, $Vqwmp2bx0ii2 + $Vrveb1xz24qu,
                        $V1e1eaicqarh + $Vrce0gsxjgkc, $Vqwmp2bx0ii2 + $Vrveb1xz24qu);
        $this->_canvas->polygon($Vzqw0ieauwu4oints, $Vl5jzlxo3j3n, null, null, true);

      } else {
        $this->_canvas->filled_rectangle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $V0xqpecgdycr, $Vl5jzlxo3j3n);
        $this->_canvas->filled_rectangle($V1e1eaicqarh, $Vqwmp2bx0ii2 + $Vrveb1xz24qu - $V0xqpecgdycr, $Volq3gdvkuqp, $V0xqpecgdycr, $Vl5jzlxo3j3n);

      }
      break;
      
    case "bottom":
      if ( $V5fqniz1znyf === "bevel" ) {
        $Vrce0gsxjgkc_line_width = $Vrce0gsxjgkc / 3;
        $Vqyn43hpxtm0_line_width = $Vqyn43hpxtm0 / 3;
        
        $Vzqw0ieauwu4oints = array($V1e1eaicqarh, $Vqwmp2bx0ii2,
                        $V1e1eaicqarh + $Volq3gdvkuqp, $Vqwmp2bx0ii2,
                        $V1e1eaicqarh + $Volq3gdvkuqp - $Vqyn43hpxtm0_line_width, $Vqwmp2bx0ii2 - $V0xqpecgdycr,
                        $V1e1eaicqarh + $Vrce0gsxjgkc_line_width, $Vqwmp2bx0ii2 - $V0xqpecgdycr);
        $this->_canvas->polygon($Vzqw0ieauwu4oints, $Vl5jzlxo3j3n, null, null, true);
        
        $Vzqw0ieauwu4oints = array($V1e1eaicqarh + $Vrce0gsxjgkc - $Vrce0gsxjgkc_line_width, $Vqwmp2bx0ii2 - $Vyzmqhafpy0b + $V0xqpecgdycr,
                        $V1e1eaicqarh + $Volq3gdvkuqp - $Vqyn43hpxtm0 + $Vqyn43hpxtm0_line_width, $Vqwmp2bx0ii2 - $Vyzmqhafpy0b + $V0xqpecgdycr,
                        $V1e1eaicqarh + $Volq3gdvkuqp - $Vqyn43hpxtm0, $Vqwmp2bx0ii2 - $Vyzmqhafpy0b,
                        $V1e1eaicqarh + $Vrce0gsxjgkc, $Vqwmp2bx0ii2 - $Vyzmqhafpy0b);
        $this->_canvas->polygon($Vzqw0ieauwu4oints, $Vl5jzlxo3j3n, null, null, true);

      } else {
        $this->_canvas->filled_rectangle($V1e1eaicqarh, $Vqwmp2bx0ii2 - $V0xqpecgdycr, $Volq3gdvkuqp, $V0xqpecgdycr, $Vl5jzlxo3j3n);
        $this->_canvas->filled_rectangle($V1e1eaicqarh, $Vqwmp2bx0ii2 - $Vyzmqhafpy0b, $Volq3gdvkuqp, $V0xqpecgdycr, $Vl5jzlxo3j3n);
      }
          
      break;

    case "left":
      if ( $V5fqniz1znyf === "bevel" ) {
        $Vrveb1xz24qu_line_width = $Vrveb1xz24qu / 3;
        $Vyzmqhafpy0b_line_width = $Vyzmqhafpy0b / 3;
        
        $Vzqw0ieauwu4oints = array($V1e1eaicqarh, $Vqwmp2bx0ii2,
                        $V1e1eaicqarh, $Vqwmp2bx0ii2 + $Volq3gdvkuqp,
                        $V1e1eaicqarh + $V0xqpecgdycr, $Vqwmp2bx0ii2 + $Volq3gdvkuqp - $Vyzmqhafpy0b_line_width,
                        $V1e1eaicqarh + $V0xqpecgdycr, $Vqwmp2bx0ii2 + $Vrveb1xz24qu_line_width);
        $this->_canvas->polygon($Vzqw0ieauwu4oints, $Vl5jzlxo3j3n, null, null, true);

        $Vzqw0ieauwu4oints = array($V1e1eaicqarh + $Vrce0gsxjgkc - $V0xqpecgdycr, $Vqwmp2bx0ii2 + $Vrveb1xz24qu - $Vrveb1xz24qu_line_width,
                        $V1e1eaicqarh + $Vrce0gsxjgkc - $V0xqpecgdycr, $Vqwmp2bx0ii2 + $Volq3gdvkuqp - $Vyzmqhafpy0b + $Vyzmqhafpy0b_line_width,
                        $V1e1eaicqarh + $Vrce0gsxjgkc, $Vqwmp2bx0ii2 + $Volq3gdvkuqp - $Vyzmqhafpy0b,
                        $V1e1eaicqarh + $Vrce0gsxjgkc, $Vqwmp2bx0ii2 + $Vrveb1xz24qu);
        $this->_canvas->polygon($Vzqw0ieauwu4oints, $Vl5jzlxo3j3n, null, null, true);

      } else {
        $this->_canvas->filled_rectangle($V1e1eaicqarh, $Vqwmp2bx0ii2, $V0xqpecgdycr, $Volq3gdvkuqp, $Vl5jzlxo3j3n);
        $this->_canvas->filled_rectangle($V1e1eaicqarh + $Vrce0gsxjgkc - $V0xqpecgdycr, $Vqwmp2bx0ii2, $V0xqpecgdycr, $Volq3gdvkuqp, $Vl5jzlxo3j3n);
      }
      
      break;
                      
    case "right":
      if ( $V5fqniz1znyf === "bevel" ) {
        $Vrveb1xz24qu_line_width = $Vrveb1xz24qu / 3;
        $Vyzmqhafpy0b_line_width = $Vyzmqhafpy0b / 3;
        
      
        $Vzqw0ieauwu4oints = array($V1e1eaicqarh, $Vqwmp2bx0ii2,
                      $V1e1eaicqarh, $Vqwmp2bx0ii2 + $Volq3gdvkuqp,
                        $V1e1eaicqarh - $V0xqpecgdycr, $Vqwmp2bx0ii2 + $Volq3gdvkuqp - $Vyzmqhafpy0b_line_width,
                        $V1e1eaicqarh - $V0xqpecgdycr, $Vqwmp2bx0ii2 + $Vrveb1xz24qu_line_width);
        $this->_canvas->polygon($Vzqw0ieauwu4oints, $Vl5jzlxo3j3n, null, null, true);
        
        $Vzqw0ieauwu4oints = array($V1e1eaicqarh - $Vqyn43hpxtm0 + $V0xqpecgdycr, $Vqwmp2bx0ii2 + $Vrveb1xz24qu - $Vrveb1xz24qu_line_width,
                        $V1e1eaicqarh - $Vqyn43hpxtm0 + $V0xqpecgdycr, $Vqwmp2bx0ii2 + $Volq3gdvkuqp - $Vyzmqhafpy0b + $Vyzmqhafpy0b_line_width,
                        $V1e1eaicqarh - $Vqyn43hpxtm0, $Vqwmp2bx0ii2 + $Volq3gdvkuqp - $Vyzmqhafpy0b,
                        $V1e1eaicqarh - $Vqyn43hpxtm0, $Vqwmp2bx0ii2 + $Vrveb1xz24qu);
        $this->_canvas->polygon($Vzqw0ieauwu4oints, $Vl5jzlxo3j3n, null, null, true);

      } else {
        $this->_canvas->filled_rectangle($V1e1eaicqarh - $V0xqpecgdycr, $Vqwmp2bx0ii2, $V0xqpecgdycr, $Volq3gdvkuqp, $Vl5jzlxo3j3n);
        $this->_canvas->filled_rectangle($V1e1eaicqarh - $Vqyn43hpxtm0, $Vqwmp2bx0ii2, $V0xqpecgdycr, $Volq3gdvkuqp, $Vl5jzlxo3j3n);
      }
      
      break;

    default:
      return;

    }
        
  }

  protected function _border_groove($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vl5jzlxo3j3n, $Vojs2qdgagwvs, $V5qa0rylnggy, $V5fqniz1znyf = "bevel") {
    list($Vrveb1xz24qu, $Vqyn43hpxtm0, $Vyzmqhafpy0b, $Vrce0gsxjgkc) = $Vojs2qdgagwvs;
      
    $Vvlxmepre4koalf_widths = array($Vrveb1xz24qu / 2, $Vqyn43hpxtm0 / 2, $Vyzmqhafpy0b / 2, $Vrce0gsxjgkc / 2);
    
    $this->_border_inset($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vl5jzlxo3j3n, $Vvlxmepre4koalf_widths, $V5qa0rylnggy);

    switch ($V5qa0rylnggy) {

    case "top":
      $V1e1eaicqarh += $Vrce0gsxjgkc / 2;
      $Vqwmp2bx0ii2 += $Vrveb1xz24qu / 2;
      $Volq3gdvkuqp -= $Vrce0gsxjgkc / 2 + $Vqyn43hpxtm0 / 2;
      break;

    case "bottom":
      $V1e1eaicqarh += $Vrce0gsxjgkc / 2;
      $Vqwmp2bx0ii2 -= $Vyzmqhafpy0b / 2;
      $Volq3gdvkuqp -= $Vrce0gsxjgkc / 2 + $Vqyn43hpxtm0 / 2;
      break;

    case "left":
      $V1e1eaicqarh += $Vrce0gsxjgkc / 2;
      $Vqwmp2bx0ii2 += $Vrveb1xz24qu / 2;
      $Volq3gdvkuqp -= $Vrveb1xz24qu / 2 + $Vyzmqhafpy0b / 2;
      break;

    case "right":
      $V1e1eaicqarh -= $Vqyn43hpxtm0 / 2;
      $Vqwmp2bx0ii2 += $Vrveb1xz24qu / 2;
      $Volq3gdvkuqp -= $Vrveb1xz24qu / 2 + $Vyzmqhafpy0b / 2;
      break;

    default:
      return;

    }

    $this->_border_outset($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vl5jzlxo3j3n, $Vvlxmepre4koalf_widths, $V5qa0rylnggy);
    
  }
  
  protected function _border_ridge($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vl5jzlxo3j3n, $Vojs2qdgagwvs, $V5qa0rylnggy, $V5fqniz1znyf = "bevel") {
    list($Vrveb1xz24qu, $Vqyn43hpxtm0, $Vyzmqhafpy0b, $Vrce0gsxjgkc) = $Vojs2qdgagwvs;
     
    $Vvlxmepre4koalf_widths = array($Vrveb1xz24qu / 2, $Vqyn43hpxtm0 / 2, $Vyzmqhafpy0b / 2, $Vrce0gsxjgkc / 2);
    
    $this->_border_outset($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vl5jzlxo3j3n, $Vvlxmepre4koalf_widths, $V5qa0rylnggy);

    switch ($V5qa0rylnggy) {

    case "top":
      $V1e1eaicqarh += $Vrce0gsxjgkc / 2;
      $Vqwmp2bx0ii2 += $Vrveb1xz24qu / 2;
      $Volq3gdvkuqp -= $Vrce0gsxjgkc / 2 + $Vqyn43hpxtm0 / 2;
      break;

    case "bottom":
      $V1e1eaicqarh += $Vrce0gsxjgkc / 2;
      $Vqwmp2bx0ii2 -= $Vyzmqhafpy0b / 2;
      $Volq3gdvkuqp -= $Vrce0gsxjgkc / 2 + $Vqyn43hpxtm0 / 2;
      break;

    case "left":
      $V1e1eaicqarh += $Vrce0gsxjgkc / 2;
      $Vqwmp2bx0ii2 += $Vrveb1xz24qu / 2;
      $Volq3gdvkuqp -= $Vrveb1xz24qu / 2 + $Vyzmqhafpy0b / 2;
      break;

    case "right":
      $V1e1eaicqarh -= $Vqyn43hpxtm0 / 2;
      $Vqwmp2bx0ii2 += $Vrveb1xz24qu / 2;
      $Volq3gdvkuqp -= $Vrveb1xz24qu / 2 + $Vyzmqhafpy0b / 2;
      break;

    default:
      return;

    }

    $this->_border_inset($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vl5jzlxo3j3n, $Vvlxmepre4koalf_widths, $V5qa0rylnggy);

  }

  protected function _tint($V4y0urwpnd3j) {
    if ( !is_numeric($V4y0urwpnd3j) )
      return $V4y0urwpnd3j;
    
    return min(1, $V4y0urwpnd3j + 0.16);
  }

  protected function _shade($V4y0urwpnd3j) {
    if ( !is_numeric($V4y0urwpnd3j) )
      return $V4y0urwpnd3j;
    
    return max(0, $V4y0urwpnd3j - 0.33);
  }

  protected function _border_inset($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vl5jzlxo3j3n, $Vojs2qdgagwvs, $V5qa0rylnggy, $V5fqniz1znyf = "bevel") {
    list($Vrveb1xz24qu, $Vqyn43hpxtm0, $Vyzmqhafpy0b, $Vrce0gsxjgkc) = $Vojs2qdgagwvs;
    
    switch ($V5qa0rylnggy) {

    case "top":
    case "left":
      $Vvz5r0g3bnyz = array_map(array($this, "_shade"), $Vl5jzlxo3j3n);
      $this->_border_solid($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vvz5r0g3bnyz, $Vojs2qdgagwvs, $V5qa0rylnggy);
      break;

    case "bottom":
    case "right":
      $Vvleufiprf3rnt = array_map(array($this, "_tint"), $Vl5jzlxo3j3n);
      $this->_border_solid($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vvleufiprf3rnt, $Vojs2qdgagwvs, $V5qa0rylnggy);
      break;

    default:
      return;
    }
  }
  
  protected function _border_outset($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vl5jzlxo3j3n, $Vojs2qdgagwvs, $V5qa0rylnggy, $V5fqniz1znyf = "bevel") {
    list($Vrveb1xz24qu, $Vqyn43hpxtm0, $Vyzmqhafpy0b, $Vrce0gsxjgkc) = $Vojs2qdgagwvs;
    
    switch ($V5qa0rylnggy) {
    case "top":
    case "left":
      $Vvleufiprf3rnt = array_map(array($this, "_tint"), $Vl5jzlxo3j3n);
      $this->_border_solid($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vvleufiprf3rnt, $Vojs2qdgagwvs, $V5qa0rylnggy);
      break;

    case "bottom":
    case "right":
      $Vvz5r0g3bnyz = array_map(array($this, "_shade"), $Vl5jzlxo3j3n);
      $this->_border_solid($V1e1eaicqarh, $Vqwmp2bx0ii2, $Volq3gdvkuqp, $Vvz5r0g3bnyz, $Vojs2qdgagwvs, $V5qa0rylnggy);
      break;

    default:
      return;

    }
  }
  
  protected function _set_opacity($Vjqeycctd35y) {
    if ( is_numeric($Vjqeycctd35y) && $Vjqeycctd35y <= 1.0 && $Vjqeycctd35y >= 0.0 ) {
      $this->_canvas->set_opacity( $Vjqeycctd35y );
    }
  }
  
  protected function _debug_layout($Vg2ci2o2iuqp, $Vl5jzlxo3j3n = "red", $Vdtcpflt5bhp = array()) {
    $this->_canvas->rectangle($Vg2ci2o2iuqp[0], $Vg2ci2o2iuqp[1], $Vg2ci2o2iuqp[2], $Vg2ci2o2iuqp[3], CSS_Color::parse($Vl5jzlxo3j3n), 0.1, $Vdtcpflt5bhp);
  }
  
}
