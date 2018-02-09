<?php



class Table_Row_Positioner extends Positioner {

  function __construct(Frame_Decorator $Vrlbsjbjglkb) { parent::__construct($Vrlbsjbjglkb); }
  
  

  function position() {

    $Vstfrw5akne1 = $this->_frame->get_containing_block();    
    $Vzqw0ieauwu4 = $this->_frame->get_prev_sibling();

    if ( $Vzqw0ieauwu4 ) 
      $Vqwmp2bx0ii2 = $Vzqw0ieauwu4->get_position("y") + $Vzqw0ieauwu4->get_margin_height();

    else
      $Vqwmp2bx0ii2 = $Vstfrw5akne1["y"];

    $this->_frame->set_position($Vstfrw5akne1["x"], $Vqwmp2bx0ii2);

  }
}
