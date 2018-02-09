<?php



class Inline_Positioner extends Positioner {

  function __construct(Frame_Decorator $Vrlbsjbjglkb) { parent::__construct($Vrlbsjbjglkb); }

  

  function position() {
     
    $Vzqw0ieauwu4 = $this->_frame->find_block_parent();

    





    

    if ( !$Vzqw0ieauwu4 )
      throw new DOMPDF_Exception("No block-level parent found.  Not good.");

    $Vtbbah5lqvpo = $this->_frame;
    
    $Vstfrw5akne1 = $Vtbbah5lqvpo->get_containing_block();
    $Vdmbypy2xlg1 = $Vzqw0ieauwu4->get_current_line_box();

    
    $Vf1nkx0oppvz = false;
    while($Vtbbah5lqvpo = $Vtbbah5lqvpo->get_parent()) {
      if($Vtbbah5lqvpo->get_style()->position === "fixed") {
        $Vf1nkx0oppvz = true;
        break;
      }
    }

    $Vtbbah5lqvpo = $this->_frame;

    if ( !$Vf1nkx0oppvz && $Vtbbah5lqvpo->get_parent() &&
         $Vtbbah5lqvpo->get_parent() instanceof Inline_Frame_Decorator &&
         $Vtbbah5lqvpo->is_text_node() ) {
      
      $V1nm4u5vu2fp = $Vtbbah5lqvpo->get_reflower()->get_min_max_width();
      
      
      if ( $V1nm4u5vu2fp["min"] > ($Vstfrw5akne1["w"] - $Vdmbypy2xlg1->left - $Vdmbypy2xlg1->w - $Vdmbypy2xlg1->right) ) {
        $Vzqw0ieauwu4->add_line();
      }
    }
    
    $Vtbbah5lqvpo->set_position($Vstfrw5akne1["x"] + $Vdmbypy2xlg1->w, $Vdmbypy2xlg1->y);

  }
}
