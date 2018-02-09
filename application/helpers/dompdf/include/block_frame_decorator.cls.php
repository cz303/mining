<?php



class Block_Frame_Decorator extends Frame_Decorator {
  protected $Vts0rywkqkyt;    
  
  
  protected $Vzppgkmd24dy;

  

  function __construct(Frame $Vrlbsjbjglkb, DOMPDF $Vhygqjznl3ul) {
    parent::__construct($Vrlbsjbjglkb, $Vhygqjznl3ul);
    
    $this->_line_boxes = array(new Line_Box($this));
    $this->_cl = 0;
  }

  

  function reset() {
    parent::reset();
    
    $this->_line_boxes = array(new Line_Box($this));
    $this->_cl = 0;
  }

  

  

  
  function get_current_line_box() {
    return $this->_line_boxes[$this->_cl];
  }

  
  function get_current_line_number() {
    return $this->_cl;
  }

  
  function get_line_boxes() { 
    return $this->_line_boxes; 
  }

  

  
  function set_current_line($Vqwmp2bx0ii2 = null, $Vwsgifrh5ics = null, $Vvlxmepre4ko = null, $V5un3xjo0f3e = null, $Vrce0gsxjgkc = null, $Vqyn43hpxtm0 = null) {
    $this->set_line($this->_cl, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $V5un3xjo0f3e, $Vrce0gsxjgkc, $Vqyn43hpxtm0);
  }

  function clear_line($Vfhiq1lhsoja) {
    if ( isset($this->_line_boxes[$Vfhiq1lhsoja]) )
      unset($this->_line_boxes[$Vfhiq1lhsoja]);
  }

  
  function set_line($Vz1zg1m0hzvk, $Vqwmp2bx0ii2 = null, $Vwsgifrh5ics = null, $Vvlxmepre4ko = null, $V5un3xjo0f3e = null, $Vrce0gsxjgkc = null, $Vqyn43hpxtm0 = null) {

    if ( is_array($Vqwmp2bx0ii2) )
      extract($Vqwmp2bx0ii2);

    if (is_numeric($Vqwmp2bx0ii2))
      $this->_line_boxes[$Vz1zg1m0hzvk]->y = $Vqwmp2bx0ii2;

    if (is_numeric($Vwsgifrh5ics))
      $this->_line_boxes[$Vz1zg1m0hzvk]->w = $Vwsgifrh5ics;

    if (is_numeric($Vvlxmepre4ko))
      $this->_line_boxes[$Vz1zg1m0hzvk]->h = $Vvlxmepre4ko;

    if ($V5un3xjo0f3e && $V5un3xjo0f3e instanceof Frame)
      $this->_line_boxes[$Vz1zg1m0hzvk]->tallest_frame = $V5un3xjo0f3e;

    if (is_numeric($Vrce0gsxjgkc))
      $this->_line_boxes[$Vz1zg1m0hzvk]->left = $Vrce0gsxjgkc;

    if (is_numeric($Vqyn43hpxtm0))
      $this->_line_boxes[$Vz1zg1m0hzvk]->right = $Vqyn43hpxtm0;
  }


  function add_frame_to_line(Frame $Vrlbsjbjglkb) {
    if ( !$Vrlbsjbjglkb->is_in_flow() ) {
      return;
    }
    
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    
    $Vrlbsjbjglkb->set_containing_line($this->_line_boxes[$this->_cl]);
    
    

    
    if ( $Vrlbsjbjglkb instanceof Inline_Frame_Decorator ) {

      
      if ( $Vrlbsjbjglkb->get_node()->nodeName === "br" ) {
        $this->maximize_line_height( $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->line_height), $Vrlbsjbjglkb );
        $this->add_line(true);
      }

      return;
    }

    
    
    if ( $this->get_current_line_box()->w == 0 &&
         $Vrlbsjbjglkb->is_text_node() &&
        !$Vrlbsjbjglkb->is_pre() ) {

      $Vrlbsjbjglkb->set_text( ltrim($Vrlbsjbjglkb->get_text()) );
      $Vrlbsjbjglkb->recalculate_width();
    }

    $Vwsgifrh5ics = $Vrlbsjbjglkb->get_margin_width();

    if ( $Vwsgifrh5ics == 0 )
      return;

    
    
    

    $Vdmbypy2xlg1 = $this->_line_boxes[$this->_cl];
    if ( $Vdmbypy2xlg1->left + $Vdmbypy2xlg1->w + $Vdmbypy2xlg1->right + $Vwsgifrh5ics > $this->get_containing_block("w"))
      $this->add_line();

    $Vrlbsjbjglkb->position();

    $Vbpybrrjyvru = $this->_line_boxes[$this->_cl];
    $Vbpybrrjyvru->add_frame($Vrlbsjbjglkb);

    if ( $Vrlbsjbjglkb->is_text_node() )
      $Vbpybrrjyvru->wc += count(preg_split("/\s+/", trim($Vrlbsjbjglkb->get_text())));

    $this->increase_line_width($Vwsgifrh5ics);
    
    $this->maximize_line_height($Vrlbsjbjglkb->get_margin_height(), $Vrlbsjbjglkb);
  }

  function remove_frames_from_line(Frame $Vrlbsjbjglkb) {
    
    $Vfhiq1lhsoja = $this->_cl;

    while ($Vfhiq1lhsoja >= 0) {
      if ( ($Vzmnqyqjjodw = in_array($Vrlbsjbjglkb, $this->_line_boxes[$Vfhiq1lhsoja]->get_frames(), true)) !== false )
        break;
      $Vfhiq1lhsoja--;
    }

    if ( $Vzmnqyqjjodw === false )
      return;

    
    while ($Vzmnqyqjjodw < count($this->_line_boxes[$Vfhiq1lhsoja]->get_frames())) {
      $Vrlbsjbjglkbs = $this->_line_boxes[$Vfhiq1lhsoja]->get_frames();
      $Vtbbah5lqvpo = $Vrlbsjbjglkbs[$Vzmnqyqjjodw];
      $Vrlbsjbjglkbs[$Vzmnqyqjjodw] = null;
      unset($Vrlbsjbjglkbs[$Vzmnqyqjjodw]);
      $Vzmnqyqjjodw++;
      $this->_line_boxes[$Vfhiq1lhsoja]->w -= $Vtbbah5lqvpo->get_margin_width();
    }

    
    $Vvlxmepre4ko = 0;
    foreach ($this->_line_boxes[$Vfhiq1lhsoja]->get_frames() as $Vtbbah5lqvpo)
      $Vvlxmepre4ko = max( $Vvlxmepre4ko, $Vtbbah5lqvpo->get_margin_height() );

    $this->_line_boxes[$Vfhiq1lhsoja]->h = $Vvlxmepre4ko;

    
    while ($this->_cl > $Vfhiq1lhsoja) {
      $this->_line_boxes[ $this->_cl ] = null;
      unset($this->_line_boxes[ $this->_cl ]);
      $this->_cl--;
    }
  }

  function increase_line_width($Vwsgifrh5ics) {
    $this->_line_boxes[ $this->_cl ]->w += $Vwsgifrh5ics;
  }

  function maximize_line_height($Vwk2nao2d33x, Frame $Vrlbsjbjglkb) {
    if ( $Vwk2nao2d33x > $this->_line_boxes[ $this->_cl ]->h ) {
      $this->_line_boxes[ $this->_cl ]->tallest_frame = $Vrlbsjbjglkb;
      $this->_line_boxes[ $this->_cl ]->h = $Vwk2nao2d33x;
    }
  }

  function add_line($Vsp5pmxi0jxf = false) {




    $this->_line_boxes[$this->_cl]->br = $Vsp5pmxi0jxf;
    $Vqwmp2bx0ii2 = $this->_line_boxes[$this->_cl]->y + $this->_line_boxes[$this->_cl]->h;

    $Vj5s4rbpoyvy = new Line_Box($this, $Vqwmp2bx0ii2);
    
    $this->_line_boxes[ ++$this->_cl ] = $Vj5s4rbpoyvy;
  }

  
}
