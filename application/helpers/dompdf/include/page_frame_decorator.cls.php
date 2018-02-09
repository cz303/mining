<?php



class Page_Frame_Decorator extends Frame_Decorator {

  
  protected $Vnt1lkr5erdy;

  
  protected $Vwv5zqaz33b4;

  
  protected $Vhibhnqb3unr;

  
  protected $Vmotsb4ulpiu;
  
  
  protected $Viis42ueub3l = array();

  

  
  function __construct(Frame $Vrlbsjbjglkb, DOMPDF $Vhygqjznl3ul) {
    parent::__construct($Vrlbsjbjglkb, $Vhygqjznl3ul);
    $this->_page_full = false;
    $this->_in_table = 0;
    $this->_bottom_page_margin = null;
  }

  
  function set_renderer($Vjlhfy2geuaq) {
    $this->_renderer = $Vjlhfy2geuaq;
  }

  
  function get_renderer() {
    return $this->_renderer;
  }

  
  function set_containing_block($V1e1eaicqarh = null, $Vqwmp2bx0ii2 = null, $Vwsgifrh5ics = null, $Vvlxmepre4ko = null) {
    parent::set_containing_block($V1e1eaicqarh,$Vqwmp2bx0ii2,$Vwsgifrh5ics,$Vvlxmepre4ko);
    
    if ( isset($Vvlxmepre4ko) )
      $this->_bottom_page_margin = $Vvlxmepre4ko; 
  }

  
  function is_full() {
    return $this->_page_full;
  }

  
  function next_page() {
    $this->_floating_frames = array();
    $this->_renderer->new_page();
    $this->_page_full = false;
  }

  
  function table_reflow_start() {
    $this->_in_table++;
  }

  
  function table_reflow_end() {
    $this->_in_table--;
  }

  
  function in_nested_table() {
    return $this->_in_table > 1;
  }
  
  
  function check_forced_page_break(Frame $Vrlbsjbjglkb) {
      
    
    if ( $this->_page_full )
      return;

    $Vaak1xqfh0sv = array("block", "list-item", "table", "inline");
    $Vea0vadn2sv2 = array("always", "left", "right");

    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();

    if ( !in_array($Vdtcpflt5bhp->display, $Vaak1xqfh0sv) )
      return false;

    
    $Vukiv2jodcur = $Vrlbsjbjglkb->get_prev_sibling();

    while ( $Vukiv2jodcur && !in_array($Vukiv2jodcur->get_style()->display, $Vaak1xqfh0sv) )
      $Vukiv2jodcur = $Vukiv2jodcur->get_prev_sibling();


    if ( in_array($Vdtcpflt5bhp->page_break_before, $Vea0vadn2sv2) ) {

      
      $Vrlbsjbjglkb->split(null, true);
      
      
      $Vrlbsjbjglkb->get_style()->page_break_before = "auto";
      $this->_page_full = true;
      
      return true;
    }

    if ( $Vukiv2jodcur && in_array($Vukiv2jodcur->get_style()->page_break_after, $Vea0vadn2sv2) ) {
      
      $Vrlbsjbjglkb->split(null, true);
      $Vukiv2jodcur->get_style()->page_break_after = "auto";
      $this->_page_full = true;
      return true;
    }
    
    if( $Vukiv2jodcur && $Vukiv2jodcur->get_last_child() && $Vrlbsjbjglkb->get_node()->nodeName != "body" ) {
      $Vukiv2jodcur_last_child = $Vukiv2jodcur->get_last_child();
      if ( in_array($Vukiv2jodcur_last_child->get_style()->page_break_after, $Vea0vadn2sv2) ) {
        $Vrlbsjbjglkb->split(null, true);
        $Vukiv2jodcur_last_child->get_style()->page_break_after = "auto";
        $this->_page_full = true;
        return true;
      }
    }


    return false;
  }

  
  protected function _page_break_allowed(Frame $Vrlbsjbjglkb) {

    $Vaak1xqfh0sv = array("block", "list-item", "table", "-dompdf-image");
    dompdf_debug("page-break", "_page_break_allowed(" . $Vrlbsjbjglkb->get_node()->nodeName. ")");
    $Vqiav1fbghsg = $Vrlbsjbjglkb->get_style()->display;

    
    if ( in_array($Vqiav1fbghsg, $Vaak1xqfh0sv) ) {

      
      if ( $this->_in_table ) {
        dompdf_debug("page-break", "In table: " . $this->_in_table);
        return false;
      }

      

      if ( $Vrlbsjbjglkb->get_style()->page_break_before === "avoid" ) {
        dompdf_debug("page-break", "before: avoid");
        return false;
      }

      
      $Vukiv2jodcur = $Vrlbsjbjglkb->get_prev_sibling();
      while ( $Vukiv2jodcur && !in_array($Vukiv2jodcur->get_style()->display, $Vaak1xqfh0sv) )
        $Vukiv2jodcur = $Vukiv2jodcur->get_prev_sibling();

      
      if ( $Vukiv2jodcur && $Vukiv2jodcur->get_style()->page_break_after === "avoid" ) {
        dompdf_debug("page-break", "after: avoid");
        return false;
      }

      
      
      $V3jkqexf4nr0 = $Vrlbsjbjglkb->get_parent();
      if ( $Vukiv2jodcur && $V3jkqexf4nr0 && $V3jkqexf4nr0->get_style()->page_break_inside === "avoid" ) {
          dompdf_debug("page-break", "parent inside: avoid");
        return false;
      }

      
      
      
      if ( $V3jkqexf4nr0->get_node()->nodeName === "body" && !$Vukiv2jodcur ) {
        
          dompdf_debug("page-break", "Body's first child.");
        return false;
      }

      
      
      if ( !$Vukiv2jodcur && $V3jkqexf4nr0 )
        return $this->_page_break_allowed( $V3jkqexf4nr0 );

      dompdf_debug("page-break", "block: break allowed");
      return true;

    }

    
    else if ( in_array($Vqiav1fbghsg, Style::$Vtttdeaid2sg) ) {

      
      if ( $this->_in_table ) {
          dompdf_debug("page-break", "In table: " . $this->_in_table);
        return false;
      }

      
      $Vw055fw3yn1m = $Vrlbsjbjglkb->find_block_parent();
      if ( count($Vw055fw3yn1m->get_line_boxes() ) < $Vrlbsjbjglkb->get_style()->orphans ) {
          dompdf_debug("page-break", "orphans");
        return false;
      }

      
      

      
      $Vzqw0ieauwu4 = $Vw055fw3yn1m;
      while ($Vzqw0ieauwu4) {
        if ( $Vzqw0ieauwu4->get_style()->page_break_inside === "avoid" ) {
          dompdf_debug("page-break", "parent->inside: avoid");
          return false;
        }
        $Vzqw0ieauwu4 = $Vzqw0ieauwu4->find_block_parent();
      }

      
      
      
      $Vukiv2jodcur = $Vrlbsjbjglkb->get_prev_sibling();
      while ( $Vukiv2jodcur && ($Vukiv2jodcur->is_text_node() && trim($Vukiv2jodcur->get_node()->nodeValue) == "") )
        $Vukiv2jodcur = $Vukiv2jodcur->get_prev_sibling();

      if ( $Vw055fw3yn1m->get_node()->nodeName === "body" && !$Vukiv2jodcur ) {
        
          dompdf_debug("page-break", "Body's first child.");
        return false;
      }

      
      if ( $Vrlbsjbjglkb->is_text_node() &&
           $Vrlbsjbjglkb->get_node()->nodeValue == "" )
        return false;

      dompdf_debug("page-break", "inline: break allowed");
      return true;

    
    } else if ( $Vqiav1fbghsg === "table-row" ) {

      
      
      $Vzqw0ieauwu4 = Table_Frame_Decorator::find_parent_table($Vrlbsjbjglkb);

      while ($Vzqw0ieauwu4) {
        if ( $Vzqw0ieauwu4->get_style()->page_break_inside === "avoid" ) {
          dompdf_debug("page-break", "parent->inside: avoid");
          return false;
        }
        $Vzqw0ieauwu4 = $Vzqw0ieauwu4->find_block_parent();
      }

      
      if ( $Vzqw0ieauwu4 && $Vzqw0ieauwu4->get_first_child() === $Vrlbsjbjglkb) {
         dompdf_debug("page-break", "table: first-row");
        return false;
      }

      
      if ( $this->_in_table > 1 ) {
        dompdf_debug("page-break", "table: nested table");
        return false;
      }

      dompdf_debug("page-break","table-row/row-groups: break allowed");
      return true;

    } else if ( in_array($Vqiav1fbghsg, Table_Frame_Decorator::$Vhf3yl3hhrje) ) {

      
      return false;

    } else {

      dompdf_debug("page-break", "? " . $Vrlbsjbjglkb->get_style()->display . "");
      return false;
    }

  }

  
  function check_page_break(Frame $Vrlbsjbjglkb) {
    
    
    if ( $this->_page_full || $Vrlbsjbjglkb->_already_pushed ) {
      return false;
    }
    
    
    $Vzqw0ieauwu4 = $Vrlbsjbjglkb;
    do {
      if ( $Vzqw0ieauwu4->is_absolute() )
        return false;
    } while ( $Vzqw0ieauwu4 = $Vzqw0ieauwu4->get_parent() );
    
    $Va0nl5fhviqp = $Vrlbsjbjglkb->get_margin_height();
    
    
    
    if ( $Vrlbsjbjglkb->get_style()->display === "table-row" &&
         !$Vrlbsjbjglkb->get_prev_sibling() && 
         $Va0nl5fhviqp > $this->get_margin_height() )
      return false;

    
    $Vcl1zg0yyoal = $Vrlbsjbjglkb->get_position("y") + $Va0nl5fhviqp;

    
    
    $Vzqw0ieauwu4 = $Vrlbsjbjglkb->get_parent();
    while ( $Vzqw0ieauwu4 ) {
      $Vdtcpflt5bhp = $Vzqw0ieauwu4->get_style();
      $Vcl1zg0yyoal += $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->margin_bottom,
                                           $Vdtcpflt5bhp->padding_bottom,
                                           $Vdtcpflt5bhp->border_bottom_width));
      $Vzqw0ieauwu4 = $Vzqw0ieauwu4->get_parent();
    }


    
    if ( $Vcl1zg0yyoal <= $this->_bottom_page_margin )
      
      return false;

    dompdf_debug("page-break", "check_page_break");
    dompdf_debug("page-break", "in_table: " . $this->_in_table);

    
    $V3m11hrbzjfu = $Vrlbsjbjglkb;
    $Vmaqtjf2uqih = false;

    $Vlvy2tncd4i1 = $this->_in_table;

    dompdf_debug("page-break","Starting search");
    while ( $V3m11hrbzjfu ) {

      if ( $V3m11hrbzjfu === $this ) {
         dompdf_debug("page-break", "reached root.");
        
        break;
      }

      if ( $this->_page_break_allowed($V3m11hrbzjfu) ) {
        dompdf_debug("page-break","break allowed, splitting.");
        $V3m11hrbzjfu->split(null, true);
        $this->_page_full = true;
        $this->_in_table = $Vlvy2tncd4i1;
        $Vrlbsjbjglkb->_already_pushed = true;
        return true;
      }

      if ( !$Vmaqtjf2uqih && $Vjg5z2pedl1b = $V3m11hrbzjfu->get_last_child() ) {
         dompdf_debug("page-break", "following last child.");

        if ( $Vjg5z2pedl1b->is_table() )
          $this->_in_table++;

        $V3m11hrbzjfu = $Vjg5z2pedl1b;
        continue;
      }

      if ( $Vjg5z2pedl1b = $V3m11hrbzjfu->get_prev_sibling() ) {
         dompdf_debug("page-break", "following prev sibling.");

             if ( $Vjg5z2pedl1b->is_table() && !$V3m11hrbzjfu->is_table() )
          $this->_in_table++;

        else if ( !$Vjg5z2pedl1b->is_table() && $V3m11hrbzjfu->is_table() )
          $this->_in_table--;

        $V3m11hrbzjfu = $Vjg5z2pedl1b;
        $Vmaqtjf2uqih = false;
        continue;
      }

      if ( $Vjg5z2pedl1b = $V3m11hrbzjfu->get_parent() ) {
         dompdf_debug("page-break", "following parent.");

        if ( $V3m11hrbzjfu->is_table() )
          $this->_in_table--;

        $V3m11hrbzjfu = $Vjg5z2pedl1b;
        $Vmaqtjf2uqih = true;
        continue;
      }

      break;
    }

    $this->_in_table = $Vlvy2tncd4i1;

    
    dompdf_debug("page-break", "no valid break found, just splitting.");

    
    if ( $this->_in_table ) {
      $Vuc3qualbvms = $this->_in_table - 1;

      $V3m11hrbzjfu = $Vrlbsjbjglkb;
      while ( $V3m11hrbzjfu && $Vuc3qualbvms && $V3m11hrbzjfu->get_style()->display !== "table" ) {
        $V3m11hrbzjfu = $V3m11hrbzjfu->get_parent();
        $Vuc3qualbvms--;
      }

      $V3m11hrbzjfu = $Vrlbsjbjglkb;
      while ($V3m11hrbzjfu && $V3m11hrbzjfu->get_style()->display !== "table-row" )
        $V3m11hrbzjfu = $V3m11hrbzjfu->get_parent();
    }

    $Vrlbsjbjglkb->split(null, true);
    $this->_page_full = true;
    $Vrlbsjbjglkb->_already_pushed = true;
    return true;
    
  }

  

  function split($Vrlbsjbjglkb = null, $V0nltne4gj0x = false) {
    
  }
  
  
  function add_floating_frame(Frame $Vrlbsjbjglkb) {
    array_unshift($this->_floating_frames, $Vrlbsjbjglkb);
  }
  
  
  function get_floating_frames() { 
    return $this->_floating_frames; 
  }

  public function remove_floating_frame($Vseq1edikdvg) {
    unset($this->_floating_frames[$Vseq1edikdvg]);
  }

  public function get_lowest_float_offset(Frame $Vcnoizcxjx0n) {
    $Vdtcpflt5bhp = $Vcnoizcxjx0n->get_style();
    $V5qa0rylnggy = $Vdtcpflt5bhp->clear;
    $Vpldvvijbza2 = $Vdtcpflt5bhp->float;
    
    $Vqwmp2bx0ii2 = 0;
    
    foreach($this->_floating_frames as $Vseq1edikdvg => $Vrlbsjbjglkb) {
      if ( $V5qa0rylnggy === "both" || $Vrlbsjbjglkb->get_style()->float === $V5qa0rylnggy ) {
        $Vqwmp2bx0ii2 = max($Vqwmp2bx0ii2, $Vrlbsjbjglkb->get_position("y") + $Vrlbsjbjglkb->get_margin_height());
        
        if ( $Vpldvvijbza2 !== "none" ) {
          $this->remove_floating_frame($Vseq1edikdvg);
        }
      }
    }
    
    return $Vqwmp2bx0ii2;
  }

}
