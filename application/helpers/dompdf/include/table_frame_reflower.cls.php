<?php



class Table_Frame_Reflower extends Frame_Reflower {

  
  protected $Vm3e2w3e102r;

  function __construct(Table_Frame_Decorator $Vrlbsjbjglkb) {
    $this->_state = null;
    parent::__construct($Vrlbsjbjglkb);
  }

  
  function reset() {
    $this->_state = null;
    $this->_min_max_cache = null;
  }

  

  protected function _assign_widths() {
    $Vdtcpflt5bhp = $this->_frame->get_style();

    
    
    $Vbmqm5rtvfg1 = $this->_state["min_width"];
    $V5rhx0grvqdh = $this->_state["max_width"];
    $Vfiv4g0n03kt = $this->_state["percent_used"];
    $Vx2crbmy05ul = $this->_state["absolute_used"];
    $V52ywbq1jdi1 = $this->_state["auto_min"];

    $Vbnlhgmdu3nf =& $this->_state["absolute"];
    $Vdc3m01etmkt =& $this->_state["percent"];
    $Vlqlesb3zql4 =& $this->_state["auto"];

    
    $Vstfrw5akne1 = $this->_frame->get_containing_block();
    $V45swt0xn55i =& $this->_frame->get_cellmap()->get_columns();

    $Vojs2qdgagwv = $Vdtcpflt5bhp->width;

    
    $Vrce0gsxjgkc = $Vdtcpflt5bhp->margin_left;
    $Vqyn43hpxtm0 = $Vdtcpflt5bhp->margin_right;
    
    $V1b1qe4fksl4 = ( $Vrce0gsxjgkc === "auto" && $Vqyn43hpxtm0 === "auto" );

    $Vrce0gsxjgkc  = $Vrce0gsxjgkc  === "auto" ? 0 : $Vdtcpflt5bhp->length_in_pt($Vrce0gsxjgkc, $Vstfrw5akne1["w"]);
    $Vqyn43hpxtm0 = $Vqyn43hpxtm0 === "auto" ? 0 : $Vdtcpflt5bhp->length_in_pt($Vqyn43hpxtm0, $Vstfrw5akne1["w"]);

    $V4jxxjosqkw5 = $Vrce0gsxjgkc + $Vqyn43hpxtm0;
    
    if ( !$V1b1qe4fksl4 ) {
      $V4jxxjosqkw5 += $Vdtcpflt5bhp->length_in_pt(array(
        $Vdtcpflt5bhp->padding_left,
        $Vdtcpflt5bhp->border_left_width,
        $Vdtcpflt5bhp->border_right_width,
        $Vdtcpflt5bhp->padding_right), 
      $Vstfrw5akne1["w"]);
    }
    
    $Vf3vd1cao1do = $Vdtcpflt5bhp->length_in_pt( $Vdtcpflt5bhp->min_width, $Vstfrw5akne1["w"] - $V4jxxjosqkw5 );

    
    $Vbmqm5rtvfg1 -= $V4jxxjosqkw5;
    $V5rhx0grvqdh -= $V4jxxjosqkw5;
    
    if ( $Vojs2qdgagwv !== "auto" ) {

      $Vn1slsuse055 = $Vdtcpflt5bhp->length_in_pt($Vojs2qdgagwv, $Vstfrw5akne1["w"]) - $V4jxxjosqkw5;

      if ( $Vn1slsuse055 < $Vf3vd1cao1do )
        $Vn1slsuse055 = $Vf3vd1cao1do;

      if ( $Vn1slsuse055 > $Vbmqm5rtvfg1 )
        $Vojs2qdgagwv = $Vn1slsuse055;
      else
        $Vojs2qdgagwv = $Vbmqm5rtvfg1;

    } else {

      if ( $V5rhx0grvqdh + $V4jxxjosqkw5 < $Vstfrw5akne1["w"] )
        $Vojs2qdgagwv = $V5rhx0grvqdh;
      else if ( $Vstfrw5akne1["w"] - $V4jxxjosqkw5 > $Vbmqm5rtvfg1 )
        $Vojs2qdgagwv = $Vstfrw5akne1["w"] - $V4jxxjosqkw5;
      else
        $Vojs2qdgagwv = $Vbmqm5rtvfg1;

      if ( $Vojs2qdgagwv < $Vf3vd1cao1do )
        $Vojs2qdgagwv = $Vf3vd1cao1do;

    }

    
    $Vdtcpflt5bhp->width = $Vojs2qdgagwv;

    $Vdikywjltavg = $this->_frame->get_cellmap();
    
    if ( $Vdikywjltavg->is_columns_locked() ) {
      return;
    }

    
    if ( $Vojs2qdgagwv == $V5rhx0grvqdh ) {

      foreach (array_keys($V45swt0xn55i) as $Vfhiq1lhsoja)
        $Vdikywjltavg->set_column_width($Vfhiq1lhsoja, $V45swt0xn55i[$Vfhiq1lhsoja]["max-width"]);

      return;
    }

    
    if ( $Vojs2qdgagwv > $Vbmqm5rtvfg1 ) {

      
      
      
      
      
      
      
      
      
      
      
      
      
      
      

      
      if ( $Vx2crbmy05ul == 0 && $Vfiv4g0n03kt == 0 ) {
        $Vfhiq1lhsojancrement = $Vojs2qdgagwv - $Vbmqm5rtvfg1;

        foreach (array_keys($V45swt0xn55i) as $Vfhiq1lhsoja)
          $Vdikywjltavg->set_column_width($Vfhiq1lhsoja, $V45swt0xn55i[$Vfhiq1lhsoja]["min-width"] + $Vfhiq1lhsojancrement * ($V45swt0xn55i[$Vfhiq1lhsoja]["max-width"] / $V5rhx0grvqdh));
        return;
      }


      
      if ( $Vx2crbmy05ul > 0 && $Vfiv4g0n03kt == 0 ) {

        if ( count($Vlqlesb3zql4) > 0 )
          $Vfhiq1lhsojancrement = ($Vojs2qdgagwv - $V52ywbq1jdi1 - $Vx2crbmy05ul) / count($Vlqlesb3zql4);

        
        foreach (array_keys($V45swt0xn55i) as $Vfhiq1lhsoja) {

          if ( $V45swt0xn55i[$Vfhiq1lhsoja]["absolute"] > 0 && count($Vlqlesb3zql4) )
            $Vdikywjltavg->set_column_width($Vfhiq1lhsoja, $V45swt0xn55i[$Vfhiq1lhsoja]["min-width"]);
          else if ( count($Vlqlesb3zql4) ) 
            $Vdikywjltavg->set_column_width($Vfhiq1lhsoja, $V45swt0xn55i[$Vfhiq1lhsoja]["min-width"] + $Vfhiq1lhsojancrement);
          else {
            
            $Vfhiq1lhsojancrement = ($Vojs2qdgagwv - $Vx2crbmy05ul) * $V45swt0xn55i[$Vfhiq1lhsoja]["absolute"] / $Vx2crbmy05ul;

            $Vdikywjltavg->set_column_width($Vfhiq1lhsoja, $V45swt0xn55i[$Vfhiq1lhsoja]["min-width"] + $Vfhiq1lhsojancrement);
          }

        }
        return;
      }


      
      if ( $Vx2crbmy05ul == 0 && $Vfiv4g0n03kt > 0 ) {

        $Vbqvy3ysyor0 = null;
        $Vf5hrkwtla0d = null;

        
        
        if ( $Vfiv4g0n03kt > 100 || count($Vlqlesb3zql4) == 0)
          $Vbqvy3ysyor0 = 100 / $Vfiv4g0n03kt;
        else
          $Vbqvy3ysyor0 = 1;

        
        $Vkmjekfvjp1f = $V52ywbq1jdi1;

        foreach ($Vdc3m01etmkt as $Vfhiq1lhsoja) {
          $V45swt0xn55i[$Vfhiq1lhsoja]["percent"] *= $Vbqvy3ysyor0;

          $Vq2ba0zlo23h = $Vojs2qdgagwv - $Vkmjekfvjp1f;

          $Vwsgifrh5ics = min($V45swt0xn55i[$Vfhiq1lhsoja]["percent"] * $Vojs2qdgagwv/100, $Vq2ba0zlo23h);

          if ( $Vwsgifrh5ics < $V45swt0xn55i[$Vfhiq1lhsoja]["min-width"] )
            $Vwsgifrh5ics = $V45swt0xn55i[$Vfhiq1lhsoja]["min-width"];

          $Vdikywjltavg->set_column_width($Vfhiq1lhsoja, $Vwsgifrh5ics);
          $Vkmjekfvjp1f += $Vwsgifrh5ics;

        }

        
        
        if ( count($Vlqlesb3zql4) > 0 ) {
          $Vfhiq1lhsojancrement = ($Vojs2qdgagwv - $Vkmjekfvjp1f) / count($Vlqlesb3zql4);

          foreach ($Vlqlesb3zql4 as $Vfhiq1lhsoja)
            $Vdikywjltavg->set_column_width($Vfhiq1lhsoja, $V45swt0xn55i[$Vfhiq1lhsoja]["min-width"] + $Vfhiq1lhsojancrement);

        }
        return;
      }

      

      
      if ( $Vx2crbmy05ul > 0 && $Vfiv4g0n03kt > 0 ) {

        $Vkmjekfvjp1f = $V52ywbq1jdi1;

        foreach ($Vbnlhgmdu3nf as $Vfhiq1lhsoja) {
          $Vdikywjltavg->set_column_width($Vfhiq1lhsoja, $V45swt0xn55i[$Vfhiq1lhsoja]["min-width"]);
          $Vkmjekfvjp1f +=  $V45swt0xn55i[$Vfhiq1lhsoja]["min-width"];
        }

        
        
        if ( $Vfiv4g0n03kt > 100 || count($Vlqlesb3zql4) == 0 )
          $Vbqvy3ysyor0 = 100 / $Vfiv4g0n03kt;
        else
          $Vbqvy3ysyor0 = 1;

        $Vf5hrkwtla0d_width = $Vojs2qdgagwv - $Vkmjekfvjp1f;

        foreach ($Vdc3m01etmkt as $Vfhiq1lhsoja) {
          $Vq2ba0zlo23h = $Vf5hrkwtla0d_width - $Vkmjekfvjp1f;

          $V45swt0xn55i[$Vfhiq1lhsoja]["percent"] *= $Vbqvy3ysyor0;
          $Vwsgifrh5ics = min($V45swt0xn55i[$Vfhiq1lhsoja]["percent"] * $Vf5hrkwtla0d_width / 100, $Vq2ba0zlo23h);

          if ( $Vwsgifrh5ics < $V45swt0xn55i[$Vfhiq1lhsoja]["min-width"] )
            $Vwsgifrh5ics = $V45swt0xn55i[$Vfhiq1lhsoja]["min-width"];

          $V45swt0xn55i[$Vfhiq1lhsoja]["used-width"] = $Vwsgifrh5ics;
          $Vkmjekfvjp1f += $Vwsgifrh5ics;
        }

        if ( count($Vlqlesb3zql4) > 0 ) {
          $Vfhiq1lhsojancrement = ($Vojs2qdgagwv - $Vkmjekfvjp1f) / count($Vlqlesb3zql4);

          foreach ($Vlqlesb3zql4 as $Vfhiq1lhsoja)
            $Vdikywjltavg->set_column_width($Vfhiq1lhsoja, $V45swt0xn55i[$Vfhiq1lhsoja]["min-width"] + $Vfhiq1lhsojancrement);

        }

        return;
      }


    } else { 

      
      foreach (array_keys($V45swt0xn55i) as $Vfhiq1lhsoja)
        $Vdikywjltavg->set_column_width($Vfhiq1lhsoja, $V45swt0xn55i[$Vfhiq1lhsoja]["min-width"]);

    }
  }

  

  
  protected function _calculate_height() {

    $Vdtcpflt5bhp = $this->_frame->get_style();
    $Vzo4g5xb4yip = $Vdtcpflt5bhp->height;

    $Vdikywjltavg = $this->_frame->get_cellmap();
    $Vdikywjltavg->assign_frame_heights();
    $Vx4bl4xivxk3 = $Vdikywjltavg->get_rows();

    
    $Vfgz5f4xk2vw = 0;
    foreach ( $Vx4bl4xivxk3 as $Vws44nszhvgo )
      $Vfgz5f4xk2vw += $Vws44nszhvgo["height"];

    $Vstfrw5akne1 = $this->_frame->get_containing_block();

    if ( !($Vdtcpflt5bhp->overflow === "visible" ||
           ($Vdtcpflt5bhp->overflow === "hidden" && $Vzo4g5xb4yip === "auto")) ) {

      

      $Vz3ygq4vvt0i = $Vdtcpflt5bhp->min_height;
      $Vykwcb1vczeg = $Vdtcpflt5bhp->max_height;

      if ( isset($Vstfrw5akne1["h"]) ) {
        $Vz3ygq4vvt0i = $Vdtcpflt5bhp->length_in_pt($Vz3ygq4vvt0i, $Vstfrw5akne1["h"]);
        $Vykwcb1vczeg = $Vdtcpflt5bhp->length_in_pt($Vykwcb1vczeg, $Vstfrw5akne1["h"]);

      } else if ( isset($Vstfrw5akne1["w"]) ) {

        if ( mb_strpos($Vz3ygq4vvt0i, "%") !== false )
          $Vz3ygq4vvt0i = 0;
        else
          $Vz3ygq4vvt0i = $Vdtcpflt5bhp->length_in_pt($Vz3ygq4vvt0i, $Vstfrw5akne1["w"]);

        if ( mb_strpos($Vykwcb1vczeg, "%") !== false )
          $Vykwcb1vczeg = "none";
        else
          $Vykwcb1vczeg = $Vdtcpflt5bhp->length_in_pt($Vykwcb1vczeg, $Vstfrw5akne1["w"]);
      }

      if ( $Vykwcb1vczeg !== "none" && $Vz3ygq4vvt0i > $Vykwcb1vczeg )
        
        list($Vykwcb1vczeg, $Vz3ygq4vvt0i) = array($Vz3ygq4vvt0i, $Vykwcb1vczeg);

      if ( $Vykwcb1vczeg !== "none" && $Vzo4g5xb4yip > $Vykwcb1vczeg )
        $Vzo4g5xb4yip = $Vykwcb1vczeg;

      if ( $Vzo4g5xb4yip < $Vz3ygq4vvt0i )
        $Vzo4g5xb4yip = $Vz3ygq4vvt0i;

    } else {

      
      if ( $Vzo4g5xb4yip !== "auto" ) {
        $Vzo4g5xb4yip = $Vdtcpflt5bhp->length_in_pt($Vzo4g5xb4yip, $Vstfrw5akne1["h"]);

        if ( $Vzo4g5xb4yip <= $Vfgz5f4xk2vw )
          $Vzo4g5xb4yip = $Vfgz5f4xk2vw;
        else
          $Vdikywjltavg->set_frame_heights($Vzo4g5xb4yip,$Vfgz5f4xk2vw);

      } else
        $Vzo4g5xb4yip = $Vfgz5f4xk2vw;

    }

    return $Vzo4g5xb4yip;

  }
  

  function reflow(Frame_Decorator $V4uturqtpcq5 = null) {
    
    $Vrlbsjbjglkb = $this->_frame;
    
    
    $Vmt0302hgn5x = $Vrlbsjbjglkb->get_root();
    $Vmt0302hgn5x->check_forced_page_break($Vrlbsjbjglkb);

    
    if ( $Vmt0302hgn5x->is_full() )
      return;
    
    
    
    
    
    $Vmt0302hgn5x->table_reflow_start();
    
    
    $this->_collapse_margins();

    $Vrlbsjbjglkb->position();

    
    

    if ( is_null($this->_state) )
      $this->get_min_max_width();

    $Vstfrw5akne1 = $Vrlbsjbjglkb->get_containing_block();
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();

    
    
    
    if ( $Vdtcpflt5bhp->border_collapse === "separate" ) {
      list($Vvlxmepre4ko, $Vf1kwqxxhqpz) = $Vdtcpflt5bhp->border_spacing;

      $Vf1kwqxxhqpz = $Vdtcpflt5bhp->length_in_pt($Vf1kwqxxhqpz) / 2;
      $Vvlxmepre4ko = $Vdtcpflt5bhp->length_in_pt($Vvlxmepre4ko) / 2;

      $Vdtcpflt5bhp->padding_left   = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->padding_left,   $Vstfrw5akne1["w"]) + $Vvlxmepre4ko;
      $Vdtcpflt5bhp->padding_right  = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->padding_right,  $Vstfrw5akne1["w"]) + $Vvlxmepre4ko;
      $Vdtcpflt5bhp->padding_top    = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->padding_top,    $Vstfrw5akne1["h"]) + $Vf1kwqxxhqpz;
      $Vdtcpflt5bhp->padding_bottom = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->padding_bottom, $Vstfrw5akne1["h"]) + $Vf1kwqxxhqpz;

    }

    $this->_assign_widths();

    
    $Vojs2qdgagwv = $Vdtcpflt5bhp->width;
    $Vrce0gsxjgkc = $Vdtcpflt5bhp->margin_left;
    $Vqyn43hpxtm0 = $Vdtcpflt5bhp->margin_right;

    $Vyn0oxmudejv = $Vstfrw5akne1["w"] - $Vojs2qdgagwv;

    if ( $Vrce0gsxjgkc === "auto" && $Vqyn43hpxtm0 === "auto" ) {
      if ( $Vyn0oxmudejv < 0 ) {
        $Vrce0gsxjgkc = 0;
        $Vqyn43hpxtm0 = $Vyn0oxmudejv;
      }
      else {
        $Vrce0gsxjgkc = $Vqyn43hpxtm0 = $Vyn0oxmudejv / 2;
      }
      
      $Vdtcpflt5bhp->margin_left = "$Vrce0gsxjgkc pt";
      $Vdtcpflt5bhp->margin_right = "$Vqyn43hpxtm0 pt";

    } else {
      if ( $Vrce0gsxjgkc === "auto" ) {
        $Vrce0gsxjgkc = $Vdtcpflt5bhp->length_in_pt($Vstfrw5akne1["w"] - $Vqyn43hpxtm0 - $Vojs2qdgagwv, $Vstfrw5akne1["w"]);
      }
      if ( $Vqyn43hpxtm0 === "auto" ) {
        $Vrce0gsxjgkc = $Vdtcpflt5bhp->length_in_pt($Vrce0gsxjgkc, $Vstfrw5akne1["w"]);
      }
    }

    list($V1e1eaicqarh, $Vqwmp2bx0ii2) = $Vrlbsjbjglkb->get_position();

    
    $V2pgsf0zxxml = $V1e1eaicqarh + $Vrce0gsxjgkc + $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->padding_left,
                                                         $Vdtcpflt5bhp->border_left_width), $Vstfrw5akne1["w"]);
    $Vw5tq3ipukxn = $Vqwmp2bx0ii2 + $Vdtcpflt5bhp->length_in_pt(array($Vdtcpflt5bhp->margin_top,
                                                 $Vdtcpflt5bhp->border_top_width,
                                                 $Vdtcpflt5bhp->padding_top), $Vstfrw5akne1["h"]);

    if ( isset($Vstfrw5akne1["h"]) )
      $Vvlxmepre4ko = $Vstfrw5akne1["h"];
    else
      $Vvlxmepre4ko = null;

    $Vdikywjltavg = $Vrlbsjbjglkb->get_cellmap();
    $Vswazvoa3xts =& $Vdikywjltavg->get_column(0);
    $Vswazvoa3xts["x"] = $V2pgsf0zxxml;

    $Vws44nszhvgoow =& $Vdikywjltavg->get_row(0);
    $Vws44nszhvgoow["y"] = $Vw5tq3ipukxn;

    $Vdikywjltavg->assign_x_positions();

    
    foreach ( $Vrlbsjbjglkb->get_children() as $Vcnoizcxjx0n ) {

      
      if ( !$Vmt0302hgn5x->in_nested_table() && $Vmt0302hgn5x->is_full() )
        break;

      $Vcnoizcxjx0n->set_containing_block($V2pgsf0zxxml, $Vw5tq3ipukxn, $Vojs2qdgagwv, $Vvlxmepre4ko);
      $Vcnoizcxjx0n->reflow();

      if ( !$Vmt0302hgn5x->in_nested_table() )
        
        $Vmt0302hgn5x->check_page_break($Vcnoizcxjx0n);

    }

    
    $Vdtcpflt5bhp->height = $this->_calculate_height();

    if ( $Vdtcpflt5bhp->border_collapse === "collapse" ) {
      
      $Vdtcpflt5bhp->border_style = "none";
    }

    $Vmt0302hgn5x->table_reflow_end();

    
    
    
    if ( $V4uturqtpcq5 && $Vdtcpflt5bhp->float === "none" && $Vrlbsjbjglkb->is_in_flow() ) {
      $V4uturqtpcq5->add_frame_to_line($Vrlbsjbjglkb);
      $V4uturqtpcq5->add_line();
    }
  }

  

  function get_min_max_width() {

    if ( !is_null($this->_min_max_cache)  )
      return $this->_min_max_cache;

    $Vdtcpflt5bhp = $this->_frame->get_style();

    $this->_frame->normalise();

    
    
    $this->_frame->get_cellmap()->add_frame($this->_frame);

    
    
    $this->_state = array();
    $this->_state["min_width"] = 0;
    $this->_state["max_width"] = 0;

    $this->_state["percent_used"] = 0;
    $this->_state["absolute_used"] = 0;
    $this->_state["auto_min"] = 0;

    $this->_state["absolute"] = array();
    $this->_state["percent"] = array();
    $this->_state["auto"] = array();

    $V45swt0xn55i =& $this->_frame->get_cellmap()->get_columns();
    foreach (array_keys($V45swt0xn55i) as $Vfhiq1lhsoja) {
      $this->_state["min_width"] += $V45swt0xn55i[$Vfhiq1lhsoja]["min-width"];
      $this->_state["max_width"] += $V45swt0xn55i[$Vfhiq1lhsoja]["max-width"];

      if ( $V45swt0xn55i[$Vfhiq1lhsoja]["absolute"] > 0 ) {
        $this->_state["absolute"][] = $Vfhiq1lhsoja;
        $this->_state["absolute_used"] += $V45swt0xn55i[$Vfhiq1lhsoja]["absolute"];

      } else if ( $V45swt0xn55i[$Vfhiq1lhsoja]["percent"] > 0 ) {
        $this->_state["percent"][] = $Vfhiq1lhsoja;
        $this->_state["percent_used"] += $V45swt0xn55i[$Vfhiq1lhsoja]["percent"];

      } else {
        $this->_state["auto"][] = $Vfhiq1lhsoja;
        $this->_state["auto_min"] += $V45swt0xn55i[$Vfhiq1lhsoja]["min-width"];
      }
    }

    
    $Vko3el2sr5ba = array($Vdtcpflt5bhp->border_left_width,
                  $Vdtcpflt5bhp->border_right_width,
                  $Vdtcpflt5bhp->padding_left,
                  $Vdtcpflt5bhp->padding_right,
                  $Vdtcpflt5bhp->margin_left,
                  $Vdtcpflt5bhp->margin_right);

    if ( $Vdtcpflt5bhp->border_collapse !== "collapse" ) 
      list($Vko3el2sr5ba[]) = $Vdtcpflt5bhp->border_spacing;

    $V4jxxjosqkw5 = $Vdtcpflt5bhp->length_in_pt($Vko3el2sr5ba, $this->_frame->get_containing_block("w"));

    $this->_state["min_width"] += $V4jxxjosqkw5;
    $this->_state["max_width"] += $V4jxxjosqkw5;

    return $this->_min_max_cache = array(
      $this->_state["min_width"], 
      $this->_state["max_width"],
      "min" => $this->_state["min_width"], 
      "max" => $this->_state["max_width"],
    );
  }
}
