<?php



class Table_Row_Group_Frame_Decorator extends Frame_Decorator {

  
  function __construct(Frame $Vrlbsjbjglkb, DOMPDF $Vhygqjznl3ul) {
    parent::__construct($Vrlbsjbjglkb, $Vhygqjznl3ul);
  }

  
  function split($Vcnoizcxjx0n = null, $V0nltne4gj0x = false) {

    if ( is_null($Vcnoizcxjx0n) ) {
      parent::split();
      return;
    }


    
    $Vdikywjltavg = $this->get_parent()->get_cellmap();
    $V3m11hrbzjfu = $Vcnoizcxjx0n;

    while ( $V3m11hrbzjfu ) {
      $Vdikywjltavg->remove_row($V3m11hrbzjfu);
      $V3m11hrbzjfu = $V3m11hrbzjfu->get_next_sibling();
    }

    
    
    if ( $Vcnoizcxjx0n === $this->get_first_child() ) {
      $Vdikywjltavg->remove_row_group($this);
      parent::split();
      return;
    }
    
    $Vdikywjltavg->update_row_group($this, $Vcnoizcxjx0n->get_prev_sibling());
    parent::split($Vcnoizcxjx0n);
    
  }
}
 
