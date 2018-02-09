<?php



class Table_Frame_Decorator extends Frame_Decorator {
  static $Veexwg1oboha = array("table-row-group",
                                 "table-row",
                                 "table-header-group",
                                 "table-footer-group",
                                 "table-column",
                                 "table-column-group",
                                 "table-caption",
                                 "table-cell");

  static $Vhf3yl3hhrje = array('table-row-group',
                             'table-header-group',
                             'table-footer-group');

  
  protected $Voaegjawh3tr;

  
  protected $V0rldbunrpuh;

  
  protected $V3kpn1xtkxhk;

  
  protected $Vtktfatcyj52;

  
  protected $Vpjbanc51dsn;

  
  function __construct(Frame $Vrlbsjbjglkb, DOMPDF $Vhygqjznl3ul) {
    parent::__construct($Vrlbsjbjglkb, $Vhygqjznl3ul);
    $this->_cellmap = new Cellmap($this);
    $this->_min_width = null;
    $this->_max_width = null;
    $this->_headers = array();
    $this->_footers = array();
  }


  function reset() {
    parent::reset();
    $this->_cellmap->reset();
    $this->_min_width = null;
    $this->_max_width = null;
    $this->_headers = array();
    $this->_footers = array();
    $this->_reflower->reset();
  }

  

  
  function split($Vcnoizcxjx0n = null, $V0nltne4gj0x = false) {

    if ( is_null($Vcnoizcxjx0n) ) {
      parent::split();
      return;
    }

    
    
    if ( count($this->_headers) && !in_array($Vcnoizcxjx0n, $this->_headers, true) &&
         !in_array($Vcnoizcxjx0n->get_prev_sibling(), $this->_headers, true) ) {

      $Vv11pynpoqs2 = null;

      
      foreach ($this->_headers as $Vl5rjgb1nsf3) {

        $Vlajwu1cdtar = $Vl5rjgb1nsf3->deep_copy();

        if ( is_null($Vv11pynpoqs2) )
          $Vv11pynpoqs2 = $Vlajwu1cdtar;

        $this->insert_child_before($Vlajwu1cdtar, $Vcnoizcxjx0n);
      }

      parent::split($Vv11pynpoqs2);

    } else if ( in_array($Vcnoizcxjx0n->get_style()->display, self::$Vhf3yl3hhrje) ) {

      
      parent::split($Vcnoizcxjx0n);

    } else {

      $V3m11hrbzjfu = $Vcnoizcxjx0n;

      while ($V3m11hrbzjfu) {
        $this->_cellmap->remove_row($V3m11hrbzjfu);
        $V3m11hrbzjfu = $V3m11hrbzjfu->get_next_sibling();
      }

      parent::split($Vcnoizcxjx0n);
    }
  }

   
  function copy(DomNode $V1en3qe0uyt3) {
    $Vn0mq53c5jwe = parent::copy($V1en3qe0uyt3);
    
    
    $Vn0mq53c5jwe->_cellmap->set_columns($this->_cellmap->get_columns());
    $Vn0mq53c5jwe->_cellmap->lock_columns();

    return $Vn0mq53c5jwe;
  }

  
  static function find_parent_table(Frame $Vrlbsjbjglkb) {

    while ( $Vrlbsjbjglkb = $Vrlbsjbjglkb->get_parent() )
      if ( $Vrlbsjbjglkb->is_table() )
        break;

    return $Vrlbsjbjglkb;
  }

  
  function get_cellmap() { return $this->_cellmap; }

  
  function get_min_width() { return $this->_min_width; }

  
  function get_max_width() { return $this->_max_width; }

  
  function set_min_width($Vojs2qdgagwv) { $this->_min_width = $Vojs2qdgagwv; }

  
  function set_max_width($Vojs2qdgagwv) { $this->_max_width = $Vojs2qdgagwv; }

  
  function normalise() {

    
    $Vkz32d1xt5no = array();
    $V530qggrc4pe = false;
    $V3m11hrbzjfu = $this->get_first_child();
    while ( $V3m11hrbzjfu ) {
      $Vcnoizcxjx0n = $V3m11hrbzjfu;
      $V3m11hrbzjfu = $V3m11hrbzjfu->get_next_sibling();

      $Vqiav1fbghsg = $Vcnoizcxjx0n->get_style()->display;

      if ( $V530qggrc4pe ) {

        if ( $Vqiav1fbghsg === "table-row" ) {
          
          $this->insert_child_before($Vp5lfbts53sy, $Vcnoizcxjx0n);

          $Vp5lfbts53sy->normalise();
          $Vcnoizcxjx0n->normalise();
          $V530qggrc4pe = false;
          continue;
        }

        
        $Vp5lfbts53sy->append_child($Vcnoizcxjx0n);
        continue;

      } else {

        if ( $Vqiav1fbghsg === "table-row" ) {
          $Vcnoizcxjx0n->normalise();
          continue;
        }

        if ( $Vqiav1fbghsg === "table-cell" ) {
          
          $V1sal0fcy130 = $this->get_node()->ownerDocument->createElement("tr");

          $Vrlbsjbjglkb = new Frame($V1sal0fcy130);

          $Vim4gcyktb2a = $this->get_style()->get_stylesheet();
          $Vdtcpflt5bhp = $Vim4gcyktb2a->create_style();
          $Vdtcpflt5bhp->inherit($this->get_style());

          
          
          
          if ( $V1sal0fcy130_style = $Vim4gcyktb2a->lookup("tr") )
            $Vdtcpflt5bhp->merge($V1sal0fcy130_style);

          
          
          $Vrlbsjbjglkb->set_style(clone $Vdtcpflt5bhp);
          $Vp5lfbts53sy = Frame_Factory::decorate_frame($Vrlbsjbjglkb, $this->_dompdf);
          $Vp5lfbts53sy->set_root($this->_root);

          
          $Vp5lfbts53sy->append_child($Vcnoizcxjx0n);

          $V530qggrc4pe = true;
          continue;
        }

        if ( !in_array($Vqiav1fbghsg, self::$Veexwg1oboha) ) {
          $Vkz32d1xt5no[] = $Vcnoizcxjx0n;
          continue;
        }

        
        foreach ($Vcnoizcxjx0n->get_children() as $Vz30vb5pjuwx) {
          if ( $Vz30vb5pjuwx->get_style()->display === "table-row" )
            $Vz30vb5pjuwx->normalise();
        }

        
        if ( $Vqiav1fbghsg === "table-header-group" )
          $this->_headers[] = $Vcnoizcxjx0n;

        else if ( $Vqiav1fbghsg === "table-footer-group" )
          $this->_footers[] = $Vcnoizcxjx0n;
      }
    }

    if ( $V530qggrc4pe ) {
      
      $this->_frame->append_child($Vp5lfbts53sy);
      $Vp5lfbts53sy->normalise();
      $this->_cellmap->add_row();
    }

    foreach ($Vkz32d1xt5no as $Vrlbsjbjglkb)
      $this->move_after($Vrlbsjbjglkb);

  }

  

  
  function move_after(Frame $Vrlbsjbjglkb) {
    $this->get_parent()->insert_child_after($Vrlbsjbjglkb, $this);
  }

}
