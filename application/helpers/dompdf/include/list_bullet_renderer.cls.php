<?php



class List_Bullet_Renderer extends Abstract_Renderer {
  static function get_counter_chars($V4pigtpor0ln) {
    static $Vzuoy3afrlta = array();
    
    if ( isset($Vzuoy3afrlta[$V4pigtpor0ln]) ) {
      return $Vzuoy3afrlta[$V4pigtpor0ln];
    }
    
    $Vq5vu0dfkpib = false;
    $Vkjdq1foihhi = "";
    
    switch ($V4pigtpor0ln) {
      case "decimal-leading-zero":
      case "decimal":
      case "1":
        return "0123456789";
      
      case "upper-alpha":
      case "upper-latin":
      case "A":
        $Vq5vu0dfkpib = true;
      case "lower-alpha":
      case "lower-latin":
      case "a":
        $Vkjdq1foihhi = "abcdefghijklmnopqrstuvwxyz";
        break;
        
      case "upper-roman":
      case "I":
        $Vq5vu0dfkpib = true;
      case "lower-roman":
      case "i":
        $Vkjdq1foihhi = "ivxlcdm";
        break;
      
      case "lower-greek":
        for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < 24; $Vfhiq1lhsoja++) {
          $Vkjdq1foihhi .= unichr($Vfhiq1lhsoja+944);
        }
        break;
    }
    
    if ( $Vq5vu0dfkpib ) {
      $Vkjdq1foihhi = strtoupper($Vkjdq1foihhi);
    }
    
    return $Vzuoy3afrlta[$V4pigtpor0ln] = "$Vkjdq1foihhi.";
  }

  
  private function make_counter($Vmwwo1qnmepz, $V4pigtpor0ln, $Vyjfi2slrwkp = null){
    $Vmwwo1qnmepz = intval($Vmwwo1qnmepz);
    $Vkjdq1foihhi = "";
    $Vq5vu0dfkpib = false;
    
    switch ($V4pigtpor0ln) {
      case "decimal-leading-zero":
      case "decimal":
      case "1":
        if ($Vyjfi2slrwkp) 
          $Vkjdq1foihhi = str_pad($Vmwwo1qnmepz, $Vyjfi2slrwkp, "0", STR_PAD_LEFT);
        else 
          $Vkjdq1foihhi = $Vmwwo1qnmepz;
        break;
      
      case "upper-alpha":
      case "upper-latin":
      case "A":
        $Vq5vu0dfkpib = true;
      case "lower-alpha":
      case "lower-latin":
      case "a":
        $Vkjdq1foihhi = chr( ($Vmwwo1qnmepz % 26) + ord('a') - 1);
        break;
        
      case "upper-roman":
      case "I":
        $Vq5vu0dfkpib = true;
      case "lower-roman":
      case "i":
        $Vkjdq1foihhi = dec2roman($Vmwwo1qnmepz);
        break;
      
      case "lower-greek":
        $Vkjdq1foihhi = unichr($Vmwwo1qnmepz + 944);
        break;
    }
    
    if ( $Vq5vu0dfkpib ) {
      $Vkjdq1foihhi = strtoupper($Vkjdq1foihhi);
    }
    
    return "$Vkjdq1foihhi.";
  }
  
  function render(Frame $Vrlbsjbjglkb) {
    $Vdtcpflt5bhp = $Vrlbsjbjglkb->get_style();
    $V2zxeccjivw0 = $Vdtcpflt5bhp->get_font_size();
    $Vwtjstnlj0bu = $Vdtcpflt5bhp->length_in_pt($Vdtcpflt5bhp->line_height, $Vrlbsjbjglkb->get_containing_block("w"));

    $this->_set_opacity( $Vrlbsjbjglkb->get_opacity( $Vdtcpflt5bhp->opacity ) );
    
    
    
    if ( $Vdtcpflt5bhp->list_style_image !== "none" &&
         !Image_Cache::is_broken($Vfhiq1lhsojamg = $Vrlbsjbjglkb->get_image_url())) {

      list($V1e1eaicqarh,$Vqwmp2bx0ii2) = $Vrlbsjbjglkb->get_position();
      
      
      
      
      
      
      
      list($Vojs2qdgagwv, $Vzo4g5xb4yip) = dompdf_getimagesize($Vfhiq1lhsojamg);
      $Vwsgifrh5ics = (((float)rtrim($Vojs2qdgagwv, "px")) * 72) / DOMPDF_DPI;
      $Vvlxmepre4ko = (((float)rtrim($Vzo4g5xb4yip, "px")) * 72) / DOMPDF_DPI;
      
      $V1e1eaicqarh -= $Vwsgifrh5ics;
      $Vqwmp2bx0ii2 -= ($Vwtjstnlj0bu - $V2zxeccjivw0)/2; 

      $this->_canvas->image( $Vfhiq1lhsojamg, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko);

    } else {

      $Vmbm3vsto5u1 = $Vdtcpflt5bhp->list_style_type;

      $Vlljqdlim1ql = false;

      switch ($Vmbm3vsto5u1) {

      default:
      case "disc":
        $Vlljqdlim1ql = true;

      case "circle":
        list($V1e1eaicqarh,$Vqwmp2bx0ii2) = $Vrlbsjbjglkb->get_position();
        $Vws44nszhvgo = ($V2zxeccjivw0*(List_Bullet_Frame_Decorator::BULLET_SIZE  ))/2;
        $V1e1eaicqarh -= $V2zxeccjivw0*(List_Bullet_Frame_Decorator::BULLET_SIZE/2);
        $Vqwmp2bx0ii2 += ($V2zxeccjivw0*(1-List_Bullet_Frame_Decorator::BULLET_DESCENT))/2;
        $Vrs2mt5pfpsv = $V2zxeccjivw0*List_Bullet_Frame_Decorator::BULLET_THICKNESS;
        $this->_canvas->circle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vws44nszhvgo, $Vdtcpflt5bhp->color, $Vrs2mt5pfpsv, null, $Vlljqdlim1ql);
        break;

      case "square":
        list($V1e1eaicqarh, $Vqwmp2bx0ii2) = $Vrlbsjbjglkb->get_position();
        $Vwsgifrh5ics = $V2zxeccjivw0*List_Bullet_Frame_Decorator::BULLET_SIZE;
        $V1e1eaicqarh -= $Vwsgifrh5ics;
        $Vqwmp2bx0ii2 += ($V2zxeccjivw0*(1-List_Bullet_Frame_Decorator::BULLET_DESCENT-List_Bullet_Frame_Decorator::BULLET_SIZE))/2;
        $this->_canvas->filled_rectangle($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vwsgifrh5ics, $Vdtcpflt5bhp->color);
        break;
    
      case "decimal-leading-zero":
      case "decimal":
      case "lower-alpha":
      case "lower-latin":
      case "lower-roman":
      case "lower-greek":
      case "upper-alpha":
      case "upper-latin":
      case "upper-roman":
      case "1": 
      case "a":
      case "i":
      case "A":
      case "I":
        $Vixzqgdougmx = $Vrlbsjbjglkb->get_parent();
        
        $Vyjfi2slrwkp = null;
        if ( $Vmbm3vsto5u1 === "decimal-leading-zero" ) {
          $Vyjfi2slrwkp = strlen($Vixzqgdougmx->get_parent()->get_node()->getAttribute("dompdf-children-count"));
        }
        
        $Vfhiq1lhsojandex = $Vrlbsjbjglkb->get_node()->getAttribute("dompdf-counter");
        $Vkjdq1foihhi = $this->make_counter($Vfhiq1lhsojandex, $Vmbm3vsto5u1, $Vyjfi2slrwkp);
        
        if ( trim($Vkjdq1foihhi) == "" ) {
          return;
        }
        
        $V4blp1adqmut = 0;
        $Vs0iulcnpsnt = $Vdtcpflt5bhp->font_family;
        
        $Vixzqgdougmxne = $Vixzqgdougmx->get_containing_line();
        list($V1e1eaicqarh, $Vqwmp2bx0ii2) = array($Vrlbsjbjglkb->get_position("x"), $Vixzqgdougmxne->y);

        $V1e1eaicqarh -= Font_Metrics::get_text_width($Vkjdq1foihhi, $Vs0iulcnpsnt, $V2zxeccjivw0, $V4blp1adqmut);
        
        
        $Vwtjstnlj0bu = $Vdtcpflt5bhp->line_height;
        $Vqwmp2bx0ii2 += ($Vwtjstnlj0bu - $V2zxeccjivw0) / 4; 
        
        $this->_canvas->text($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vkjdq1foihhi,
                             $Vs0iulcnpsnt, $V2zxeccjivw0,
                             $Vdtcpflt5bhp->color, $V4blp1adqmut);
      
      case "none":
        break;
      }
    }
  }
}
