<?php



class Page_Frame_Reflower extends Frame_Reflower {

  
  private $Vcewsxlawngz;
  
  
  private $V4u1equ3zmgd;
  
  
  private $Vki5zz0sgdbz = array();

  function __construct(Page_Frame_Decorator $Vrlbsjbjglkb) { parent::__construct($Vrlbsjbjglkb); }

  
  function add_frame_to_stacking_context(Frame $Vrlbsjbjglkb, $Vj4qmgvvb1xn) {
    $this->_stacking_context[$Vj4qmgvvb1xn][] = $Vrlbsjbjglkb;
  }
  
  function apply_page_style(Frame $Vrlbsjbjglkb, $Ve44xyr0fqi5){
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    $Vm5dt2wixddz = $Vdtcpflt5bhp->get_stylesheet()->get_page_styles();
    
    
    if ( count($Vm5dt2wixddz) > 1 ) {
      $Vxim3v3sdvqx   = $Ve44xyr0fqi5 % 2 == 1;
      $Vh2exnktxagp = $Ve44xyr0fqi5 == 1;
      
      $Vdtcpflt5bhp = clone $Vm5dt2wixddz["base"];
    
      
      if ( $Vxim3v3sdvqx && isset($Vm5dt2wixddz[":right"]) ) {
        $Vdtcpflt5bhp->merge($Vm5dt2wixddz[":right"]);
      }
      
      if ( $Vxim3v3sdvqx && isset($Vm5dt2wixddz[":odd"]) ) {
        $Vdtcpflt5bhp->merge($Vm5dt2wixddz[":odd"]);
      }
  
      
      if ( !$Vxim3v3sdvqx && isset($Vm5dt2wixddz[":left"]) ) {
        $Vdtcpflt5bhp->merge($Vm5dt2wixddz[":left"]);
      }
  
      if ( !$Vxim3v3sdvqx && isset($Vm5dt2wixddz[":even"]) ) {
        $Vdtcpflt5bhp->merge($Vm5dt2wixddz[":even"]);
      }
      
      if ( $Vh2exnktxagp && isset($Vm5dt2wixddz[":first"]) ) {
        $Vdtcpflt5bhp->merge($Vm5dt2wixddz[":first"]);
      }
      
      $Vrlbsjbjglkb->set_style($Vdtcpflt5bhp);
    }
  }
  
  

  
  function reflow(Frame_Decorator $V4uturqtpcq5 = null) {
    $Vmacoo2zvsju = array();
    $V0iz5npppmuj = null;
    $Vcnoizcxjx0n = $this->_frame->get_first_child();
    $Vvted0tuai40 = 0;
    
    while ($Vcnoizcxjx0n) {
      $this->apply_page_style($this->_frame, $Vvted0tuai40 + 1);
      
      $Vdtcpflt5bhp = $this->_frame->get_style();
  
      
      $Vstfrw5akne1 = $this->_frame->get_containing_block();
      $Vrce0gsxjgkc   = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->margin_left,   $Vstfrw5akne1["w"]);
      $Vqyn43hpxtm0  = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->margin_right,  $Vstfrw5akne1["w"]);
      $Vrveb1xz24qu    = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->margin_top,    $Vstfrw5akne1["h"]);
      $Vyzmqhafpy0b = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->margin_bottom, $Vstfrw5akne1["h"]);
      
      $V2pgsf0zxxml = $Vstfrw5akne1["x"] + $Vrce0gsxjgkc;
      $Vw5tq3ipukxn = $Vstfrw5akne1["y"] + $Vrveb1xz24qu;
      $Vitb3ve1bbwn = $Vstfrw5akne1["w"] - $Vrce0gsxjgkc - $Vqyn43hpxtm0;
      $Vfgz5f4xk2vw = $Vstfrw5akne1["h"] - $Vrveb1xz24qu - $Vyzmqhafpy0b;
      
      
      if ($Vvted0tuai40 == 0) {
        $Vcnoizcxjx0nren = $Vcnoizcxjx0n->get_children();
        foreach ($Vcnoizcxjx0nren as $Vernfvnfkmjf) {
          if ($Vernfvnfkmjf->get_style()->position === "fixed") {
            $Vmacoo2zvsju[] = $Vernfvnfkmjf->deep_copy();
          }
        }
        $Vmacoo2zvsju = array_reverse($Vmacoo2zvsju);
      }
      
      $Vcnoizcxjx0n->set_containing_block($V2pgsf0zxxml, $Vw5tq3ipukxn, $Vitb3ve1bbwn, $Vfgz5f4xk2vw);
      
      
      $this->_check_callbacks("begin_page_reflow", $Vcnoizcxjx0n);
    
      
      if ($Vvted0tuai40 >= 1) {
        foreach ($Vmacoo2zvsju as $Vlyialv0pdlr) {
          $Vcnoizcxjx0n->insert_child_before($Vlyialv0pdlr->deep_copy(), $Vcnoizcxjx0n->get_first_child());
        }
      }
      
      $Vcnoizcxjx0n->reflow();
      $Vwcqhoommmoe = $Vcnoizcxjx0n->get_next_sibling();
      
      
      $this->_check_callbacks("begin_page_render", $Vcnoizcxjx0n);
      
      $Vjlhfy2geuaq = $this->_frame->get_renderer();

      
      $Vjlhfy2geuaq->render($Vcnoizcxjx0n);
      
      Renderer::$Viyccqw0obpb = false;
      
      
      ksort($this->_stacking_context);
      
      foreach( $this->_stacking_context as $Vmuo1q0qmqjf ) {
        foreach ( $Vmuo1q0qmqjf as $Vvvuswijwhvo ) {
          $Vjlhfy2geuaq->render($Vvvuswijwhvo);
        }
      }
      
      Renderer::$Viyccqw0obpb = true;
      $this->_stacking_context = array();
      
      
      $this->_check_callbacks("end_page_render", $Vcnoizcxjx0n);
      
      if ( $Vwcqhoommmoe ) {
        $this->_frame->next_page();
      }

      
      
      if ( $V0iz5npppmuj ) {
        $V0iz5npppmuj->dispose(true);
      }
      $V0iz5npppmuj = $Vcnoizcxjx0n;
      $Vcnoizcxjx0n = $Vwcqhoommmoe;
      $Vvted0tuai40++;
    }

    
    if ( $V0iz5npppmuj ) {
      $V0iz5npppmuj->dispose(true);
    }
  }  
  
  
  
  
  protected function _check_callbacks($Vaknohb125rr, $Vrlbsjbjglkb) {
    if (!isset($this->_callbacks)) {
      $Vhygqjznl3ul = $this->_frame->get_dompdf();
      $this->_callbacks = $Vhygqjznl3ul->get_callbacks();
      $this->_canvas = $Vhygqjznl3ul->get_canvas();
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
}
