<?php



class Table_Row_Frame_Decorator extends Frame_Decorator {

  
  
  function __construct(Frame $Vrlbsjbjglkb, DOMPDF $Vhygqjznl3ul) {
    parent::__construct($Vrlbsjbjglkb, $Vhygqjznl3ul);
  }
  
  

  
  function normalise() {

    
    $Vzqw0ieauwu4 = Table_Frame_Decorator::find_parent_table($this);
    
    $Vkz32d1xt5no = array();
    foreach ($this->get_children() as $Vcnoizcxjx0n) {      
      $Vqiav1fbghsg = $Vcnoizcxjx0n->get_style()->display;

      if ( $Vqiav1fbghsg !== "table-cell" )
        $Vkz32d1xt5no[] = $Vcnoizcxjx0n;
    }
    
    
    foreach ($Vkz32d1xt5no as $Vrlbsjbjglkb) 
      $Vzqw0ieauwu4->move_after($Vrlbsjbjglkb);
  }
  
  
}
