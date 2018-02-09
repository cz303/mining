<?php



class Renderer extends Abstract_Renderer {

  
  protected $Vvnyiirv5v3s;
    
  
  private $Vcewsxlawngz;
  
  
  public static $Viyccqw0obpb = true;
  
  
  function __destruct() {
    clear_object($this);
  }
  
    
  function new_page() {
    $this->_canvas->new_page();
  }

  
  function render(Frame $Vrlbsjbjglkb, $V4gwyk23wosz = false) {
    global $Vatvjzg4ejqt;

    if ( $Vatvjzg4ejqt ) {
      echo $Vrlbsjbjglkb;
      flush();
    }
    
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    
    if ( in_array($Vdtcpflt5bhp->visibility, array("hidden", "collapse")) ) {
      return;
    }

    $V4wmwwrm5445 = self::$Viyccqw0obpb && !$V4gwyk23wosz || !self::$Viyccqw0obpb;
    
    if ( $V4wmwwrm5445 ) {
      $Vqiav1fbghsg = $Vdtcpflt5bhp->display;
      
      
      if ( $Vdtcpflt5bhp->transform && is_array($Vdtcpflt5bhp->transform) ) {
        $this->_canvas->save();
        list($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko) = $Vrlbsjbjglkb->get_padding_box();
        $Vacjs00x1okq = $Vdtcpflt5bhp->transform_origin;
        
        foreach($Vdtcpflt5bhp->transform as $Vpzyvcmhprhq) {
          list($Vubssx3efpny, $Vmbklynu3i2z) = $Vpzyvcmhprhq;
          if ( $Vubssx3efpny === "matrix" ) {
            $Vubssx3efpny = "transform";
          }
          
          $Vmbklynu3i2z = array_map("floatval", $Vmbklynu3i2z);
          $Vmbklynu3i2z[] = $V1e1eaicqarh + $Vdtcpflt5bhp->length_in_pt($Vacjs00x1okq[0], $Vdtcpflt5bhp->width);
          $Vmbklynu3i2z[] = $Vqwmp2bx0ii2 + $Vdtcpflt5bhp->length_in_pt($Vacjs00x1okq[1], $Vdtcpflt5bhp->height);
          
          call_user_func_array(array($this->_canvas, $Vubssx3efpny), $Vmbklynu3i2z);
        }
      }
    
      switch ($Vqiav1fbghsg) {
        
      case "block":
      case "list-item":
      case "inline-block":
      case "table":
      case "inline-table":
        $this->_render_frame("block", $Vrlbsjbjglkb);
        break;
  
      case "inline":
        if ( $Vrlbsjbjglkb->is_text_node() )
          $this->_render_frame("text", $Vrlbsjbjglkb);
        else
          $this->_render_frame("inline", $Vrlbsjbjglkb);
        break;
  
      case "table-cell":
        $this->_render_frame("table-cell", $Vrlbsjbjglkb);
        break;
  
      case "table-row-group":
      case "table-header-group":
      case "table-footer-group":
        $this->_render_frame("table-row-group", $Vrlbsjbjglkb);
        break;
  
      case "-dompdf-list-bullet":
        $this->_render_frame("list-bullet", $Vrlbsjbjglkb);
        break;
  
      case "-dompdf-image":
        $this->_render_frame("image", $Vrlbsjbjglkb);
        break;
        
      case "none":
        $V1en3qe0uyt3 = $Vrlbsjbjglkb->get_node();
            
        if ( $V1en3qe0uyt3->nodeName === "script" ) {
          if ( $V1en3qe0uyt3->getAttribute("type") === "text/php" ||
               $V1en3qe0uyt3->getAttribute("language") === "php" ) {
            
            $this->_render_frame("php", $Vrlbsjbjglkb);
          }
          
          elseif ( $V1en3qe0uyt3->getAttribute("type") === "text/javascript" ||
               $V1en3qe0uyt3->getAttribute("language") === "javascript" ) {
            
            $this->_render_frame("javascript", $Vrlbsjbjglkb);
          }
        }
  
        
        return;
        
      default:
        break;
  
      }
  
      
      $this->_check_callbacks("begin_frame", $Vrlbsjbjglkb);
      
      
      if ( $Vdtcpflt5bhp->overflow === "hidden" ) {
        list($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko) = $Vrlbsjbjglkb->get_padding_box();
        $this->_canvas->clipping_rectangle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko);
      }
    }
  
    $Vmt0302hgn5x = $Vrlbsjbjglkb->get_root()->get_reflower();
    
    foreach ($Vrlbsjbjglkb->get_children() as $Vcnoizcxjx0n) {
      $Vcnoizcxjx0n_style = $Vcnoizcxjx0n->get_style();
      $Vbuwcieyf54h = $V4gwyk23wosz;
      
      
      if ( self::$Viyccqw0obpb && (
           $Vcnoizcxjx0n_style->z_index !== "auto" || 
           $Vcnoizcxjx0n_style->float !== "none" || 
           $Vcnoizcxjx0n->is_positionned()) ) {
        $Vj4qmgvvb1xn = ($Vcnoizcxjx0n_style->z_index === "auto") ? 0 : intval($Vcnoizcxjx0n_style->z_index);
        $Vmt0302hgn5x->add_frame_to_stacking_context($Vcnoizcxjx0n, $Vj4qmgvvb1xn);
        $Vbuwcieyf54h = true;
      }
      
      $this->render($Vcnoizcxjx0n, $Vbuwcieyf54h);
    }
     
    if ( $V4wmwwrm5445 ) {
      
      if ( $Vdtcpflt5bhp->overflow === "hidden" ) {
        $this->_canvas->clipping_end();
      }
  
      if ( $Vdtcpflt5bhp->transform && is_array($Vdtcpflt5bhp->transform) ) {
        $this->_canvas->restore();
      }
  
      
      $this->_check_callbacks("end_frame", $Vrlbsjbjglkb);
    }
  }
  
  
  protected function _check_callbacks($Vaknohb125rr, $Vrlbsjbjglkb) {
    if (!isset($this->_callbacks)) {
      $this->_callbacks = $this->_dompdf->get_callbacks();
    }
    
    if (is_array($this->_callbacks) && isset($this->_callbacks[$Vaknohb125rr])) {
      $Vyivviowkwxn = array(0 => $this->_canvas, "canvas" => $this->_canvas,
                    1 => $Vrlbsjbjglkb, "frame" => $Vrlbsjbjglkb);
      $V2dbcicjzo5l = $this->_callbacks[$Vaknohb125rr];
      foreach ($V2dbcicjzo5l as $Vtbbah5lqvpo) {
        if (is_callable($Vtbbah5lqvpo)) {
          if (is_array($Vtbbah5lqvpo)) {
            $Vtbbah5lqvpo[0]->$Vtbbah5lqvpo[1]($Vyivviowkwxn);
          } else {
            $Vtbbah5lqvpo($Vyivviowkwxn);
          }
        }
      }
    }
  }

  
  protected function _render_frame($V4pigtpor0ln, $Vrlbsjbjglkb) {

    if ( !isset($this->_renderers[$V4pigtpor0ln]) ) {
      
      switch ($V4pigtpor0ln) {
      case "block":
        $this->_renderers[$V4pigtpor0ln] = new Block_Renderer($this->_dompdf);
        break;

      case "inline":
        $this->_renderers[$V4pigtpor0ln] = new Inline_Renderer($this->_dompdf);
        break;

      case "text":
        $this->_renderers[$V4pigtpor0ln] = new Text_Renderer($this->_dompdf);
        break;

      case "image":
        $this->_renderers[$V4pigtpor0ln] = new Image_Renderer($this->_dompdf);
        break;
      
      case "table-cell":
        $this->_renderers[$V4pigtpor0ln] = new Table_Cell_Renderer($this->_dompdf);
        break;
      
      case "table-row-group":
        $this->_renderers[$V4pigtpor0ln] = new Table_Row_Group_Renderer($this->_dompdf);
        break;

      case "list-bullet":
        $this->_renderers[$V4pigtpor0ln] = new List_Bullet_Renderer($this->_dompdf);
        break;

      case "php":
        $this->_renderers[$V4pigtpor0ln] = new PHP_Evaluator($this->_canvas);
        break;

      case "javascript":
        $this->_renderers[$V4pigtpor0ln] = new Javascript_Embedder($this->_dompdf);
        break;
        
      }
    }
    
    $this->_renderers[$V4pigtpor0ln]->render($Vrlbsjbjglkb);

  }
}
