<?php



class Frame_Tree {
    
  
  static protected $Vmjg2fho1rl4 = array("area", "base", "basefont", "head", "style",
                                         "meta", "title", "colgroup",
                                         "noembed", "noscript", "param", "#comment");  
  
  protected $Vp0b2drfmg4k;

  
  protected $Vrsdjaclx0zt;

  
  protected $Vqxtx34kemxq;

  
  protected $Vf0ouys2uvjj;
  

  
  function __construct(DomDocument $Voaqq1lpxh5u) {
    $this->_dom = $Voaqq1lpxh5u;
    $this->_root = null;
    $this->_registry = array();
  }
  
  function __destruct() {
    clear_object($this);
  }

  
  function get_dom() { return $this->_dom; }

  
  function get_root() { return $this->_root; }

  
  function get_frame($Vwfsll4zanwn) { return isset($this->_registry[$Vwfsll4zanwn]) ? $this->_registry[$Vwfsll4zanwn] : null; }

  
  function get_frames() { return new FrameTreeList($this->_root); }
      
  
  function build_tree() {
    $Vxcvxsbzpwbz = $this->_dom->getElementsByTagName("html")->item(0);
    if ( is_null($Vxcvxsbzpwbz) )
      $Vxcvxsbzpwbz = $this->_dom->firstChild;

    if ( is_null($Vxcvxsbzpwbz) )
      throw new DOMPDF_Exception("Requested HTML document contains no data.");

    $this->fix_tables();
    
    $this->_root = $this->_build_tree_r($Vxcvxsbzpwbz);

  }
  
  
  protected function fix_tables(){
    $Va2c3kyiwvs0 = new DOMXPath($this->_dom);
    
    
    
    $Vuinfsrlpmbg = $Va2c3kyiwvs0->query("//table/caption");
    foreach($Vuinfsrlpmbg as $V3l3cyvzlgvr) {
      $Vmqy2qrqt2lx = $V3l3cyvzlgvr->parentNode;
      $Vmqy2qrqt2lx->parentNode->insertBefore($V3l3cyvzlgvr, $Vmqy2qrqt2lx);
    }
    
    $Vx4bl4xivxk3 = $Va2c3kyiwvs0->query("//table/tr");
    foreach($Vx4bl4xivxk3 as $Vexbtekafkvl) {
      $Vfhk3mdlyaxz = $this->_dom->createElement("tbody");
      $Vfhk3mdlyaxz = $Vexbtekafkvl->parentNode->insertBefore($Vfhk3mdlyaxz, $Vexbtekafkvl);
      $Vfhk3mdlyaxz->appendChild($Vexbtekafkvl);
    }
  }

  
  protected function _build_tree_r(DomNode $V1en3qe0uyt3) {
    
    $Vrlbsjbjglkb = new Frame($V1en3qe0uyt3);
    $Vwfsll4zanwn = $Vrlbsjbjglkb->get_id();
    $this->_registry[ $Vwfsll4zanwn ] = $Vrlbsjbjglkb;
    
    if ( !$V1en3qe0uyt3->hasChildNodes() )
      return $Vrlbsjbjglkb;

    
    
    
    

    
    $Vhedylkejosg = array();
    for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V1en3qe0uyt3->childNodes->length; $Vfhiq1lhsoja++)
      $Vhedylkejosg[] = $V1en3qe0uyt3->childNodes->item($Vfhiq1lhsoja);

    foreach ($Vhedylkejosg as $Vcnoizcxjx0n) {
      $V1en3qe0uyt3_name = mb_strtolower($Vcnoizcxjx0n->nodeName);
      
      
      if ( in_array($V1en3qe0uyt3_name, self::$Vmjg2fho1rl4) )  {
        if ( $V1en3qe0uyt3_name !== "head" &&
             $V1en3qe0uyt3_name !== "style" ) 
          $Vcnoizcxjx0n->parentNode->removeChild($Vcnoizcxjx0n);
        continue;
      }

      
      if ( $V1en3qe0uyt3_name === "#text" && $Vcnoizcxjx0n->nodeValue == "" ) {
        $Vcnoizcxjx0n->parentNode->removeChild($Vcnoizcxjx0n);
        continue;
      }

      
      if ( $V1en3qe0uyt3_name === "img" && $Vcnoizcxjx0n->getAttribute("src") == "" ) {
        $Vcnoizcxjx0n->parentNode->removeChild($Vcnoizcxjx0n);
        continue;
      }
      
      $Vrlbsjbjglkb->append_child($this->_build_tree_r($Vcnoizcxjx0n), false);
    }
    
    return $Vrlbsjbjglkb;
  }
  
  public function insert_node(DOMNode $V1en3qe0uyt3, DOMNode $Vlo4nlliqias, $Vv3hdohvn1hh) {
    if ($Vv3hdohvn1hh === "after" || !$V1en3qe0uyt3->firstChild)
      $V1en3qe0uyt3->appendChild($Vlo4nlliqias);
    else 
      $V1en3qe0uyt3->insertBefore($Vlo4nlliqias, $V1en3qe0uyt3->firstChild);
    
    $this->_build_tree_r($Vlo4nlliqias);
    
    $Vrlbsjbjglkb_id = $Vlo4nlliqias->getAttribute("frame_id");
    $Vrlbsjbjglkb = $this->get_frame($Vrlbsjbjglkb_id);
    
    $Vrxdhpfzoplv = $V1en3qe0uyt3->getAttribute("frame_id");
    $V3jkqexf4nr0 = $this->get_frame($Vrxdhpfzoplv);
    
    if ($Vv3hdohvn1hh === "before")
      $V3jkqexf4nr0->prepend_child($Vrlbsjbjglkb, false);
    else 
      $V3jkqexf4nr0->append_child($Vrlbsjbjglkb, false);
      
    return $Vrlbsjbjglkb_id;
  }
}
