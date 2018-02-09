<?php



define('__DEFAULT_STYLESHEET', DOMPDF_LIB_DIR . DIRECTORY_SEPARATOR . "res" . DIRECTORY_SEPARATOR . "html.css");


class Stylesheet {
  
  
  const DEFAULT_STYLESHEET = __DEFAULT_STYLESHEET; 
  
  
  const ORIG_UA = 1;
  
  
  const ORIG_USER = 2;
  
  
  const ORIG_AUTHOR = 3;
  
  private static $Vbwgnmybokmy = array(
    self::ORIG_UA =>     -0x0FFFFFFF, 
    self::ORIG_USER =>   -0x0000FFFF, 
    self::ORIG_AUTHOR =>  0x00000000, 
  );

  
  private $Vci1vex3llkx;
  
  
  private $Vvwpgv3qy1lw;

  
  private $V04ookbgih51;

  
  private $Vrjgo1sts4qf;

  
  private $Vc1rv3q1womj;

  
  private $Vfvvcvrjz1o2;

  
  private $Vaodcuwkwjl0;
  
  private $Vqk3lyhuitnf = self::ORIG_UA;

  
  static $Vc4jaovdxmnv = "print";
  static $Vv5re1koxu0z = array("all", "static", "visual", "bitmap", "paged", "dompdf");

  
  function __construct(DOMPDF $Vhygqjznl3ul) {
    $this->_dompdf = $Vhygqjznl3ul;
    $this->_styles = array();
    $this->_loaded_files = array();
    list($this->_protocol, $this->_base_host, $this->_base_path) = explode_url($_SERVER["SCRIPT_FILENAME"]);
    $this->_page_styles = array("base" => null);
  }
  
  
  function __destruct() {
    clear_object($this);
  }

  
  function set_protocol($V41yimklfqrl) { $this->_protocol = $V41yimklfqrl; }

  
  function set_host($Vy4zba2jo55u) { $this->_base_host = $Vy4zba2jo55u; }

  
  function set_base_path($V3wwyy5a12nc) { $this->_base_path = $V3wwyy5a12nc; }

  
  function get_dompdf() { return $this->_dompdf; }

  
  function get_protocol() { return $this->_protocol; }

  
  function get_host() { return $this->_base_host; }

  
  function get_base_path() { return $this->_base_path; }
  
  
  function get_page_styles() { return $this->_page_styles; }

  
  function add_style($Vseq1edikdvg, Style $Vdtcpflt5bhp) {
    if (!is_string($Vseq1edikdvg))
      throw new DOMPDF_Exception("CSS rule must be keyed by a string.");

    if ( isset($this->_styles[$Vseq1edikdvg]) )
      $this->_styles[$Vseq1edikdvg]->merge($Vdtcpflt5bhp);
    else
      $this->_styles[$Vseq1edikdvg] = clone $Vdtcpflt5bhp;
      
    $this->_styles[$Vseq1edikdvg]->set_origin( $this->_current_origin );
  }

  
  function lookup($Vseq1edikdvg) {
    if ( !isset($this->_styles[$Vseq1edikdvg]) )
      return null;

    return $this->_styles[$Vseq1edikdvg];
  }

  
  function create_style(Style $V3jkqexf4nr0 = null) {
    return new Style($this, $this->_current_origin);
  }

  
  function load_css(&$Vim4gcyktb2a) { $this->_parse_css($Vim4gcyktb2a); }


  
  function load_css_file($Vg5mhfl1beoi, $Vacjs00x1okq = self::ORIG_AUTHOR) {
    global $Vci1vex3llkx_warnings;
    
    if ( $Vacjs00x1okq ) {
      $this->_current_origin = $Vacjs00x1okq;
    }

    
    if ( isset($this->_loaded_files[$Vg5mhfl1beoi]) )
      return;

    $this->_loaded_files[$Vg5mhfl1beoi] = true;
    $Vxdbe0sbfowy = explode_url($Vg5mhfl1beoi);

    list($this->_protocol, $this->_base_host, $this->_base_path, $Vg5mhfl1beoiname) = $Vxdbe0sbfowy;

    
    if ( $this->_protocol == "" )
      $Vg5mhfl1beoi = $this->_base_path . $Vg5mhfl1beoiname;
    else
      $Vg5mhfl1beoi = build_url($this->_protocol, $this->_base_host, $this->_base_path, $Vg5mhfl1beoiname);

    set_error_handler("record_warnings");
    $Vim4gcyktb2a = file_get_contents($Vg5mhfl1beoi, null, $this->_dompdf->get_http_context());
    
    $Vmxvyneuiaf0 = true;
    
    if ( !$this->_dompdf->get_quirksmode() ) {
      
      if ( isset($http_response_header) ) {
        foreach($http_response_header as $Vn2n3th4zzzx) {
          if ( preg_match("@Content-Type:\s*([\w/]+)@i", $Vn2n3th4zzzx, $Vt3xexsia3ta) ) {
            if ( $Vt3xexsia3ta[1] !== "text/css" ) {
              $Vmxvyneuiaf0 = false;
            }
          }
        }
      }
    }
    
    restore_error_handler();

    if ( !$Vmxvyneuiaf0 || $Vim4gcyktb2a == "" ) {
      record_warnings(E_USER_WARNING, "Unable to load css file $Vg5mhfl1beoi", __FILE__, __LINE__);
      return;
    }

    $this->_parse_css($Vim4gcyktb2a);
  }

  
  private function _specificity($Vrsemcsjpwx3, $Vacjs00x1okq = self::ORIG_AUTHOR) {
    
    
    

    $Vi3y3l1uvwp3 = ($Vrsemcsjpwx3 === "!attr") ? 1 : 0;

    $V4t3fwdd3eev = min(mb_substr_count($Vrsemcsjpwx3, "#"), 255);

    $V4y0urwpnd3j = min(mb_substr_count($Vrsemcsjpwx3, ".") +
             mb_substr_count($Vrsemcsjpwx3, "["), 255);

    $Vrec2f1japon = min(mb_substr_count($Vrsemcsjpwx3, " ") + 
             mb_substr_count($Vrsemcsjpwx3, ">") +
             mb_substr_count($Vrsemcsjpwx3, "+"), 255);

    
    
    
    
    

    if ( !in_array($Vrsemcsjpwx3[0], array(" ", ">", ".", "#", "+", ":", "["))) {
      $Vrec2f1japon++;
    }

    if (DEBUGCSS) {
        print "<pre>\n";
        printf("_specificity(): 0x%08x \"%s\"\n", ($Vi3y3l1uvwp3 << 24) | ($V4t3fwdd3eev << 16) | ($V4y0urwpnd3j << 8) | ($Vrec2f1japon), $Vrsemcsjpwx3);
        print "</pre>";
    }
    
    return self::$Vbwgnmybokmy[$Vacjs00x1okq] + ($Vi3y3l1uvwp3 << 24) | ($V4t3fwdd3eev << 16) | ($V4y0urwpnd3j << 8) | ($Vrec2f1japon);
  }

  
  private function _css_selector_to_xpath($Vrsemcsjpwx3, $Vbk5xwez32fu = false) {

    




    
    $Vuq34jlhekzm = "//";
    
    
    $Vn0oulpbg1p1 = array();

    
    

    $Vrec2f1japonelimiters = array(" ", ">", ".", "#", "+", ":", "[", "(");

    
    
    if ( $Vrsemcsjpwx3[0] === "[" )
      $Vrsemcsjpwx3 = "*$Vrsemcsjpwx3";
      
    
    
    if ( !in_array($Vrsemcsjpwx3[0], $Vrec2f1japonelimiters) )
      $Vrsemcsjpwx3 = " $Vrsemcsjpwx3";

    $Ve2hcejidrum = "";
    $Vtojwsl3m1uw = mb_strlen($Vrsemcsjpwx3);
    $Vfhiq1lhsoja = 0;

    while ( $Vfhiq1lhsoja < $Vtojwsl3m1uw ) {

      $V2n430jknk35 = $Vrsemcsjpwx3[$Vfhiq1lhsoja];
      $Vfhiq1lhsoja++;

      
      $Ve2hcejidrum = "";
      $Vfhiq1lhsojan_attr = false;
      
      while ($Vfhiq1lhsoja < $Vtojwsl3m1uw) {
        $V4y0urwpnd3j = $Vrsemcsjpwx3[$Vfhiq1lhsoja];
        $V4y0urwpnd3j_prev = $Vrsemcsjpwx3[$Vfhiq1lhsoja-1];
        
        if ( !$Vfhiq1lhsojan_attr && in_array($V4y0urwpnd3j, $Vrec2f1japonelimiters) )
          break;
          
        if ( $V4y0urwpnd3j_prev === "[" ) {
          $Vfhiq1lhsojan_attr = true;
        }
        
        $Ve2hcejidrum .= $Vrsemcsjpwx3[$Vfhiq1lhsoja++];
      }

      switch ($V2n430jknk35) {

      case " ":
      case ">":
        
        
        $Vcrqjgbbfgye = $V2n430jknk35 === " " ? "descendant" : "child";

        if ( mb_substr($Vuq34jlhekzm, -1, 1) !== "/" )
          $Vuq34jlhekzm .= "/";

        
        $Ve2hcejidrum = strtolower($Ve2hcejidrum);
        
        if ( !$Ve2hcejidrum )
          $Ve2hcejidrum = "*";

        $Vuq34jlhekzm .= "$Vcrqjgbbfgye::$Ve2hcejidrum";
        $Ve2hcejidrum = "";
        break;

      case ".":
      case "#":
        
        

        $Vi3y3l1uvwp3ttr = $V2n430jknk35 === "." ? "class" : "id";

        
        if ( mb_substr($Vuq34jlhekzm, -1, 1) === "/" )
          $Vuq34jlhekzm .= "*";

        
        
        

        
        

        
        $Vuq34jlhekzm .= "[contains(concat(' ', @$Vi3y3l1uvwp3ttr, ' '), concat(' ', '$Ve2hcejidrum', ' '))]";
        $Ve2hcejidrum = "";
        break;

      case "+":
        
        if ( mb_substr($Vuq34jlhekzm, -1, 1) !== "/" )
          $Vuq34jlhekzm .= "/";

        $Vuq34jlhekzm .= "following-sibling::$Ve2hcejidrum";
        $Ve2hcejidrum = "";
        break;

      case ":":
        $Vfhiq1lhsoja2 = $Vfhiq1lhsoja-strlen($Ve2hcejidrum)-2; 
        if ( !isset($Vrsemcsjpwx3[$Vfhiq1lhsoja2]) || in_array($Vrsemcsjpwx3[$Vfhiq1lhsoja2], $Vrec2f1japonelimiters) ) {
          $Vuq34jlhekzm .= "*";
        }
        
        $V3ze22vtj2t0 = false;
        
        
        switch ($Ve2hcejidrum) {

        case "first-child":
          $Vuq34jlhekzm .= "[1]";
          $Ve2hcejidrum = "";
          break;

        case "last-child":
          $Vuq34jlhekzm .= "[not(following-sibling::*)]";
          $Ve2hcejidrum = "";
          break;

        case "first-of-type":
          $Vuq34jlhekzm .= "[position() = 1]";
          $Ve2hcejidrum = "";
          break;

        case "last-of-type":
          $Vuq34jlhekzm .= "[position() = last()]";
          $Ve2hcejidrum = "";
          break;

        
        case "nth-last-of-type":
        case "nth-last-child":
          $V3ze22vtj2t0 = true;
          
        case "nth-of-type":
        case "nth-child":
          $Vzqw0ieauwu4 = $Vfhiq1lhsoja+1;
          $V0basg1up3w3 = trim(mb_substr($Vrsemcsjpwx3, $Vzqw0ieauwu4, strpos($Vrsemcsjpwx3, ")", $Vfhiq1lhsoja)-$Vzqw0ieauwu4));
          
          $V4y0urwpnd3jondition = "";
          
          
          if ( preg_match("/^\d+$/", $V0basg1up3w3) ) {
            $V4y0urwpnd3jondition = "position() = $V0basg1up3w3";
          }
          
          
          elseif ( $V0basg1up3w3 === "odd" ) {
            $V4y0urwpnd3jondition = "(position() mod 2) = 1";
          }
          
          
          elseif ( $V0basg1up3w3 === "even" ) {
            $V4y0urwpnd3jondition = "(position() mod 2) = 0";
          }
          
          
          else {
            $V4y0urwpnd3jondition = $this->_selector_an_plus_b($V0basg1up3w3, $V3ze22vtj2t0);
          }
          
          $Vuq34jlhekzm .= "[$V4y0urwpnd3jondition]";
          $Ve2hcejidrum = "";
          break;

        case "link":
          $Vuq34jlhekzm .= "[@href]";
          $Ve2hcejidrum = "";
          break;
          
        case "first-line": 
        case "first-letter": 
        
        
        case "active":
        case "hover":
        case "visited":
          $Vuq34jlhekzm .= "[false()]";
          $Ve2hcejidrum = "";
          break;

        
        case "before":
        case "after":
          if ( $Vbk5xwez32fu )
            $Vn0oulpbg1p1[$Ve2hcejidrum] = $Ve2hcejidrum;
          else
            $Vuq34jlhekzm .= "/*[@$Ve2hcejidrum]";
            
          $Ve2hcejidrum = "";
          break;

        case "empty":
          $Vuq34jlhekzm .= "[not(*) and not(normalize-space())]";
          $Ve2hcejidrum = "";
          break;
          
        case "disabled":
        case "checked":
          $Vuq34jlhekzm .= "[@$Ve2hcejidrum]";
          $Ve2hcejidrum = "";
          break;
          
        case "enabled":
          $Vuq34jlhekzm .= "[not(@disabled)]";
          $Ve2hcejidrum = "";
          break;
        }

        break;

      case "[":
        
        $Vi3y3l1uvwp3ttr_delimiters = array("=", "]", "~", "|", "$", "^", "*");
        $Ve2hcejidrum_len = mb_strlen($Ve2hcejidrum);
        $Vzmnqyqjjodw = 0;

        $Vi3y3l1uvwp3ttr = "";
        $Vjuftxi2lyub = "";
        $Vp4xjtpabm0l = "";

        while ( $Vzmnqyqjjodw < $Ve2hcejidrum_len ) {
          if ( in_array($Ve2hcejidrum[$Vzmnqyqjjodw], $Vi3y3l1uvwp3ttr_delimiters) )
            break;
          $Vi3y3l1uvwp3ttr .= $Ve2hcejidrum[$Vzmnqyqjjodw++];
        }

        switch ( $Ve2hcejidrum[$Vzmnqyqjjodw] ) {

        case "~":
        case "|":
        case "$":
        case "^":
        case "*":
          $Vjuftxi2lyub .= $Ve2hcejidrum[$Vzmnqyqjjodw++];

          if ( $Ve2hcejidrum[$Vzmnqyqjjodw] !== "=" )
            throw new DOMPDF_Exception("Invalid CSS selector syntax: invalid attribute selector: $Vrsemcsjpwx3");

          $Vjuftxi2lyub .= $Ve2hcejidrum[$Vzmnqyqjjodw];
          break;

        case "=":
          $Vjuftxi2lyub = "=";
          break;

        }

        
        if ( $Vjuftxi2lyub != "" ) {
          $Vzmnqyqjjodw++;
          while ( $Vzmnqyqjjodw < $Ve2hcejidrum_len ) {
            if ( $Ve2hcejidrum[$Vzmnqyqjjodw] === "]" )
              break;
            $Vp4xjtpabm0l .= $Ve2hcejidrum[$Vzmnqyqjjodw++];
          }
        }

        if ( $Vi3y3l1uvwp3ttr == "" )
          throw new DOMPDF_Exception("Invalid CSS selector syntax: missing attribute name");

        $Vp4xjtpabm0l = trim($Vp4xjtpabm0l, "\"'");
        
        switch ( $Vjuftxi2lyub ) {

        case "":
          $Vuq34jlhekzm .=  "[@$Vi3y3l1uvwp3ttr]";
          break;

        case "=":
          $Vuq34jlhekzm .= "[@$Vi3y3l1uvwp3ttr=\"$Vp4xjtpabm0l\"]";
          break;

        case "~=":
          
          
          $Vp4xjtpabm0ls = explode(" ", $Vp4xjtpabm0l);
          $Vuq34jlhekzm .=  "[";

          foreach ( $Vp4xjtpabm0ls as $Vwk2nao2d33x )
            $Vuq34jlhekzm .= "@$Vi3y3l1uvwp3ttr=\"$Vwk2nao2d33x\" or ";

          $Vuq34jlhekzm = rtrim($Vuq34jlhekzm, " or ") . "]";
          break;

        case "|=":
          $Vp4xjtpabm0ls = explode("-", $Vp4xjtpabm0l);
          $Vuq34jlhekzm .= "[";

          foreach ( $Vp4xjtpabm0ls as $Vwk2nao2d33x )
            $Vuq34jlhekzm .= "starts-with(@$Vi3y3l1uvwp3ttr, \"$Vwk2nao2d33x\") or ";

          $Vuq34jlhekzm = rtrim($Vuq34jlhekzm, " or ") . "]";
          break;

        case "$=":
          $Vuq34jlhekzm .= "[substring(@$Vi3y3l1uvwp3ttr, string-length(@$Vi3y3l1uvwp3ttr)-".(strlen($Vp4xjtpabm0l) - 1).")=\"$Vp4xjtpabm0l\"]";
          break;
          
        case "^=":
          $Vuq34jlhekzm .= "[starts-with(@$Vi3y3l1uvwp3ttr,\"$Vp4xjtpabm0l\")]";
          break;
          
        case "*=":
          $Vuq34jlhekzm .= "[contains(@$Vi3y3l1uvwp3ttr,\"$Vp4xjtpabm0l\")]";
          break;
        }

        break;
      }
    }
    $Vfhiq1lhsoja++;






















    
    if ( mb_strlen($Vuq34jlhekzm) > 2 )
      $Vuq34jlhekzm = rtrim($Vuq34jlhekzm, "/");

    return array("query" => $Vuq34jlhekzm, "pseudo_elements" => $Vn0oulpbg1p1);
  }
  
  
  protected function _selector_an_plus_b($Vcrqjgbbfgye, $V3ze22vtj2t0 = false) {
    $Vcrqjgbbfgye = preg_replace("/\s/", "", $Vcrqjgbbfgye);
    if ( !preg_match("/^(?P<a>-?[0-9]*)?n(?P<b>[-+]?[0-9]+)?$/", $Vcrqjgbbfgye, $Vt3xexsia3ta)) {
      return "false()";
    }
    
    $Vi3y3l1uvwp3 = ((isset($Vt3xexsia3ta["a"]) && $Vt3xexsia3ta["a"] !== "") ? intval($Vt3xexsia3ta["a"]) : 1);
    $V4t3fwdd3eev = ((isset($Vt3xexsia3ta["b"]) && $Vt3xexsia3ta["b"] !== "") ? intval($Vt3xexsia3ta["b"]) : 0);
    
    $Vzqw0ieauwu4osition = ($V3ze22vtj2t0 ? "(last()-position()+1)" : "position()");

    if ($V4t3fwdd3eev == 0) {
      return "($Vzqw0ieauwu4osition mod $Vi3y3l1uvwp3) = 0";
    }
    else {
      $V4y0urwpnd3jompare = (($Vi3y3l1uvwp3 < 0) ? "<=" : ">=");
      $V4t3fwdd3eev2 = -$V4t3fwdd3eev;
      if( $V4t3fwdd3eev2 >= 0 ) {
        $V4t3fwdd3eev2 = "+$V4t3fwdd3eev2";
      }
      return "($Vzqw0ieauwu4osition $V4y0urwpnd3jompare $V4t3fwdd3eev) and ((($Vzqw0ieauwu4osition $V4t3fwdd3eev2) mod ".abs($Vi3y3l1uvwp3).") = 0)";
    }
  }

  
  function apply_styles(Frame_Tree $Vpnxy30x1asc) {
    
    
    
    
    

    
    
    

    

    $Vdtcpflt5bhps = array();
    $Va2c3kyiwvs0 = new DOMXPath($Vpnxy30x1asc->get_dom());
    
    
    foreach ($this->_styles as $Vrsemcsjpwx3 => $Vdtcpflt5bhp) {
      if (strpos($Vrsemcsjpwx3, ":before") === false && 
          strpos($Vrsemcsjpwx3, ":after") === false) continue;
      
      $Vuq34jlhekzm = $this->_css_selector_to_xpath($Vrsemcsjpwx3, true);
      
      
      $V1y3v3pnan4k = @$Va2c3kyiwvs0->query($Vuq34jlhekzm["query"]);
      if ($V1y3v3pnan4k == null) {
        record_warnings(E_USER_WARNING, "The CSS selector '$Vrsemcsjpwx3' is not valid", __FILE__, __LINE__);
        continue;
      }
      
      foreach ($V1y3v3pnan4k as $Vfhiq1lhsoja => $V1en3qe0uyt3) {
        foreach ($Vuq34jlhekzm["pseudo_elements"] as $Vzqw0ieauwu4os) {
          
          if ( $V1en3qe0uyt3->hasAttribute("dompdf_{$Vzqw0ieauwu4os}_frame_id") ) {
            continue;
          }
          
          if (($V2n430jknk35rc = $this->_image($Vdtcpflt5bhp->content)) !== "none") {
            $Vlo4nlliqias = $V1en3qe0uyt3->ownerDocument->createElement("img_generated");
            $Vlo4nlliqias->setAttribute("src", $V2n430jknk35rc);
          }
          else {
            $Vlo4nlliqias = $V1en3qe0uyt3->ownerDocument->createElement("dompdf_generated");
          }
          
          $Vlo4nlliqias->setAttribute($Vzqw0ieauwu4os, $Vzqw0ieauwu4os);
          
          $V4zbnqt5fmko = $Vpnxy30x1asc->insert_node($V1en3qe0uyt3, $Vlo4nlliqias, $Vzqw0ieauwu4os);
          
          $V1en3qe0uyt3->setAttribute("dompdf_{$Vzqw0ieauwu4os}_frame_id", $V4zbnqt5fmko);
        }
      }
    }
    
    
    foreach ($this->_styles as $Vrsemcsjpwx3 => $Vdtcpflt5bhp) {
      $Vuq34jlhekzm = $this->_css_selector_to_xpath($Vrsemcsjpwx3);

      
      $V1y3v3pnan4k = @$Va2c3kyiwvs0->query($Vuq34jlhekzm["query"]);
      if ($V1y3v3pnan4k == null) {
        record_warnings(E_USER_WARNING, "The CSS selector '$Vrsemcsjpwx3' is not valid", __FILE__, __LINE__);
        continue;
      }

      foreach ($V1y3v3pnan4k as $V1en3qe0uyt3) {
        
        if ( $V1en3qe0uyt3->nodeType != XML_ELEMENT_NODE ) 
          continue;

        $Vfhiq1lhsojad = $V1en3qe0uyt3->getAttribute("frame_id");

        
        $V2n430jknk35pec = $this->_specificity($Vrsemcsjpwx3);
        $Vdtcpflt5bhps[$Vfhiq1lhsojad][$V2n430jknk35pec][] = $Vdtcpflt5bhp;
      }
    }

    
    
    $Vq003e5lij5t = false;
    foreach ($Vpnxy30x1asc->get_frames() as $Vrlbsjbjglkb) {
      
      if ( !$Vq003e5lij5t && $this->_page_styles["base"] ) {
        $Vdtcpflt5bhp = $this->_page_styles["base"];
        $Vq003e5lij5t = true;
      } else
        $Vdtcpflt5bhp = $this->create_style();

      
      $Vzqw0ieauwu4 = $Vrlbsjbjglkb;
      while ( $Vzqw0ieauwu4 = $Vzqw0ieauwu4->get_parent() )
        if ($Vzqw0ieauwu4->get_node()->nodeType == XML_ELEMENT_NODE )
          break;

      
      
      if ( $Vrlbsjbjglkb->get_node()->nodeType != XML_ELEMENT_NODE ) {
        if ( $Vzqw0ieauwu4 )
          $Vdtcpflt5bhp->inherit($Vzqw0ieauwu4->get_style());
        $Vrlbsjbjglkb->set_style($Vdtcpflt5bhp);
        continue;
      }

      $Vfhiq1lhsojad = $Vrlbsjbjglkb->get_id();

      
      Attribute_Translator::translate_attributes($Vrlbsjbjglkb);
      if ( ($V2n430jknk35tr = $Vrlbsjbjglkb->get_node()->getAttribute(Attribute_Translator::$Vgyuc4fibkd0)) !== "" ) {
        
        $Vdtcpflt5bhps[$Vfhiq1lhsojad][1][] = $this->_parse_properties($V2n430jknk35tr);
      }

      
      if ( ($V2n430jknk35tr = $Vrlbsjbjglkb->get_node()->getAttribute("style")) !== "" ) {
        
        $V2n430jknk35tr = preg_replace("'/\*.*?\*/'si", "", $V2n430jknk35tr);
        
        $V2n430jknk35pec = $this->_specificity("!attr");
        $Vdtcpflt5bhps[$Vfhiq1lhsojad][$V2n430jknk35pec][] = $this->_parse_properties($V2n430jknk35tr);
      }

      
      if ( isset($Vdtcpflt5bhps[$Vfhiq1lhsojad]) ) {

        $Vi3y3l1uvwp3pplied_styles = $Vdtcpflt5bhps[ $Vrlbsjbjglkb->get_id() ];

        
        ksort($Vi3y3l1uvwp3pplied_styles);

        if (DEBUGCSS) {
          $Vrec2f1japonebug_nodename = $Vrlbsjbjglkb->get_node()->nodeName;
          print "<pre>\n[$Vrec2f1japonebug_nodename\n";
          foreach ($Vi3y3l1uvwp3pplied_styles as $V2n430jknk35pec => $Vi3y3l1uvwp3rr) {
            printf("specificity: 0x%08x\n",$V2n430jknk35pec);
            foreach ($Vi3y3l1uvwp3rr as $V2n430jknk35) {
              print "[\n";
              $V2n430jknk35->debug_print();
              print "]\n";
            }
          }
        }
        
        
        foreach ($Vi3y3l1uvwp3pplied_styles as $Vi3y3l1uvwp3rr) {
          foreach ($Vi3y3l1uvwp3rr as $V2n430jknk35)
            $Vdtcpflt5bhp->merge($V2n430jknk35);
        }
      }

      
      if ( $Vzqw0ieauwu4 ) {

        if (DEBUGCSS) {
          print "inherit:\n";
          print "[\n";
          $Vzqw0ieauwu4->get_style()->debug_print();
          print "]\n";
        }

        $Vdtcpflt5bhp->inherit( $Vzqw0ieauwu4->get_style() );
      }

      if (DEBUGCSS) {
        print "DomElementStyle:\n";
        print "[\n";
        $Vdtcpflt5bhp->debug_print();
        print "]\n";
        print "/$Vrec2f1japonebug_nodename]\n</pre>";
      }

      
      $Vrlbsjbjglkb->set_style($Vdtcpflt5bhp);

    }

    
    
    foreach ( array_keys($this->_styles) as $Vseq1edikdvg ) {
      $this->_styles[$Vseq1edikdvg] = null;
      unset($this->_styles[$Vseq1edikdvg]);
    }

  }


  
  private function _parse_css($V2n430jknk35tr) {

    $V2n430jknk35tr = trim($V2n430jknk35tr);
    
    
    $Vim4gcyktb2a = preg_replace(array(
      "'/\*.*?\*/'si", 
      "/^<!--/",
      "/-->$/"
    ), "", $V2n430jknk35tr);

    

    
    $V5wjp3qep3yz =
      "/\s*                                   # Skip leading whitespace                             \n".
      "( @([^\s]+)\s+([^{;]*) (?:;|({)) )?    # Match @rules followed by ';' or '{'                 \n".
      "(?(1)                                  # Only parse sub-sections if we're in an @rule...     \n".
      "  (?(4)                                # ...and if there was a leading '{'                   \n".
      "    \s*( (?:(?>[^{}]+) ({)?            # Parse rulesets and individual @page rules           \n".
      "            (?(6) (?>[^}]*) }) \s*)+?  \n".
      "       )                               \n".
      "   })                                  # Balancing '}'                                \n".
      "|                                      # Branch to match regular rules (not preceeded by '@')\n".
      "([^{]*{[^}]*}))                        # Parse normal rulesets\n".
      "/xs";

    if ( preg_match_all($V5wjp3qep3yz, $Vim4gcyktb2a, $Vt3xexsia3ta, PREG_SET_ORDER) === false )
      
      throw new DOMPDF_Exception("Error parsing css file: preg_match_all() failed.");

    
    
    
    
    
    
    
    
    
    
    
    
    foreach ( $Vt3xexsia3ta as $Vkvvdnwtmjnq ) {
      $Vkvvdnwtmjnq[2] = trim($Vkvvdnwtmjnq[2]);

      if ( $Vkvvdnwtmjnq[2] !== "" ) {
        
        switch ($Vkvvdnwtmjnq[2]) {

        case "import":
          $this->_parse_import($Vkvvdnwtmjnq[3]);
          break;

        case "media":
          $Vi3y3l1uvwp3cceptedmedia = self::$Vv5re1koxu0z;
          
          if ( defined("DOMPDF_DEFAULT_MEDIA_TYPE") ) {
            $Vi3y3l1uvwp3cceptedmedia[] = DOMPDF_DEFAULT_MEDIA_TYPE;
          } 
          else {
            $Vi3y3l1uvwp3cceptedmedia[] = self::$Vc4jaovdxmnv;
          }
          
          $Vma1aig1tarc = preg_split("/\s*,\s*/", mb_strtolower(trim($Vkvvdnwtmjnq[3])));
          
          if ( count(array_intersect($Vi3y3l1uvwp3cceptedmedia, $Vma1aig1tarc)) ) {
            $this->_parse_sections($Vkvvdnwtmjnq[5]);
          }
          break;

        case "page":
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          

          
          $Vzqw0ieauwu4age_selector = trim($Vkvvdnwtmjnq[3]);
          
          switch($Vzqw0ieauwu4age_selector) {
            case "": 
              $Vseq1edikdvg = "base"; 
              break;
              
            case ":left":
            case ":right":
            case ":odd":
            case ":even":
            case ":first":
              $Vseq1edikdvg = $Vzqw0ieauwu4age_selector;
              
            default: continue;
          }

          
          if ( empty($this->_page_styles[$Vseq1edikdvg]) )
            $this->_page_styles[$Vseq1edikdvg] = $this->_parse_properties($Vkvvdnwtmjnq[5]);
          else
            $this->_page_styles[$Vseq1edikdvg]->merge($this->_parse_properties($Vkvvdnwtmjnq[5]));
          break;

        case "font-face":
          $this->_parse_font_face($Vkvvdnwtmjnq[5]);
          break;
          
        default:
          
          break;
        }

        continue;
      }

      if ( $Vkvvdnwtmjnq[7] !== "" )
        $this->_parse_sections($Vkvvdnwtmjnq[7]);

    }
  }

  
  protected function _image($Vwk2nao2d33x) {
    $Vtaejg4eqd1d=DEBUGCSS;
    
    if ( mb_strpos($Vwk2nao2d33x, "url") === false ) {
      $V3wwyy5a12nc = "none"; 
    }
    else {
      $Vwk2nao2d33x = preg_replace("/url\(['\"]?([^'\")]+)['\"]?\)/","\\1", trim($Vwk2nao2d33x));

      
      $Vxdbe0sbfowy = explode_url($Vwk2nao2d33x);
      if ( $Vxdbe0sbfowy["protocol"] == "" && $this->get_protocol() == "" ) {
        if ($Vxdbe0sbfowy["path"][0] === '/' || $Vxdbe0sbfowy["path"][0] === '\\' ) {
          $V3wwyy5a12nc = $_SERVER["DOCUMENT_ROOT"].'/';
        } else {
          $V3wwyy5a12nc = $this->get_base_path();
        }
        $V3wwyy5a12nc .= $Vxdbe0sbfowy["path"] . $Vxdbe0sbfowy["file"];
        $V3wwyy5a12nc = realpath($V3wwyy5a12nc);
        
        
        if (!$V3wwyy5a12nc) { $V3wwyy5a12nc = 'none'; }
      } else {
        $V3wwyy5a12nc = build_url($this->get_protocol(),
                          $this->get_host(),
                          $this->get_base_path(),
                          $Vwk2nao2d33x);
      }
    }
    if ($Vtaejg4eqd1d) {
      print "<pre>[_image\n";
      print_r($Vxdbe0sbfowy);
      print $this->get_protocol()."\n".$this->get_base_path()."\n".$V3wwyy5a12nc."\n";
      print "_image]</pre>";;
    }
    return $V3wwyy5a12nc;
  }

  
  private function _parse_import($Vbfatyoohaps) {
    $Vi3y3l1uvwp3rr = preg_split("/[\s\n,]/", $Vbfatyoohaps,-1, PREG_SPLIT_NO_EMPTY);
    $Vbfatyoohaps = array_shift($Vi3y3l1uvwp3rr);
    $Vi3y3l1uvwp3ccept = false;

    if ( count($Vi3y3l1uvwp3rr) > 0 ) {

      $Vi3y3l1uvwp3cceptedmedia = self::$Vv5re1koxu0z;
      if ( defined("DOMPDF_DEFAULT_MEDIA_TYPE") ) {
        $Vi3y3l1uvwp3cceptedmedia[] = DOMPDF_DEFAULT_MEDIA_TYPE;
      } else {
        $Vi3y3l1uvwp3cceptedmedia[] = self::$Vc4jaovdxmnv;
      }
              
      
      foreach ( $Vi3y3l1uvwp3rr as $V4pigtpor0ln ) {
        if ( in_array(mb_strtolower(trim($V4pigtpor0ln)), $Vi3y3l1uvwp3cceptedmedia) ) {
          $Vi3y3l1uvwp3ccept = true;
          break;
        }
      }

    } else {
      
      $Vi3y3l1uvwp3ccept = true;
    }

    if ( $Vi3y3l1uvwp3ccept ) {
      
      $V41yimklfqrlcol = $this->_protocol;
      $Vy4zba2jo55u = $this->_base_host;
      $V3wwyy5a12nc = $this->_base_path;
      
      
      
      
      
      
      
      $Vbfatyoohaps = $this->_image($Vbfatyoohaps);
      
      $this->load_css_file($Vbfatyoohaps);

      
      $this->_protocol = $V41yimklfqrlcol;
      $this->_base_host = $Vy4zba2jo55u;
      $this->_base_path = $V3wwyy5a12nc;
    }

  }
  
  
  private function _parse_font_face($V2n430jknk35tr) {
    $Vrec2f1japonescriptors = $this->_parse_properties($V2n430jknk35tr);
    
    preg_match_all("/(url|local)\s*\([\"\']?([^\"\'\)]+)[\"\']?\)\s*(format\s*\([\"\']?([^\"\'\)]+)[\"\']?\))?/i", $Vrec2f1japonescriptors->src, $V2n430jknk35rc);
    
    $V2n430jknk35ources = array();
    $Vwk2nao2d33xid_sources = array();
    
    foreach($V2n430jknk35rc[0] as $Vfhiq1lhsoja => $Vp4xjtpabm0l) {
      $V2n430jknk35ource = array(
        "local"  => strtolower($V2n430jknk35rc[1][$Vfhiq1lhsoja]) === "local",
        "uri"    => $V2n430jknk35rc[2][$Vfhiq1lhsoja],
        "format" => $V2n430jknk35rc[4][$Vfhiq1lhsoja],
        "path"   => build_url($this->_protocol, $this->_base_host, $this->_base_path, $V2n430jknk35rc[2][$Vfhiq1lhsoja]),
      );
      
      if ( !$V2n430jknk35ource["local"] && in_array($V2n430jknk35ource["format"], array("", "woff", "opentype", "truetype")) ) {
        $Vwk2nao2d33xid_sources[] = $V2n430jknk35ource;
      }
      
      $V2n430jknk35ources[] = $V2n430jknk35ource;
    }
    
    
    if ( empty($Vwk2nao2d33xid_sources) ) {
      return;
    }
    
    $Vdtcpflt5bhp = array(
      "family" => $Vrec2f1japonescriptors->get_font_family_raw(),
      "weight" => $Vrec2f1japonescriptors->font_weight,
      "style"  => $Vrec2f1japonescriptors->font_style,
    );
    
    Font_Metrics::register_font($Vdtcpflt5bhp, $Vwk2nao2d33xid_sources[0]["path"]);
  }

  
  private function _parse_properties($V2n430jknk35tr) {
    $Vzqw0ieauwu4roperties = preg_split("/;(?=(?:[^\(]*\([^\)]*\))*(?![^\)]*\)))/", $V2n430jknk35tr);

    if (DEBUGCSS) print '[_parse_properties';

    
    $Vdtcpflt5bhp = new Style($this);
    
    foreach ($Vzqw0ieauwu4roperties as $Vzqw0ieauwu4rop) {
      
      
      
      
      
      
      
      
      
      
      

      
      if (DEBUGCSS) print '(';
      
      $Vfhiq1lhsojamportant = false;
      $Vzqw0ieauwu4rop = trim($Vzqw0ieauwu4rop);
      
      if ( substr($Vzqw0ieauwu4rop, -9) === 'important' ) {
        $Vzqw0ieauwu4rop_tmp = rtrim(substr($Vzqw0ieauwu4rop, 0, -9));
        
        if ( substr($Vzqw0ieauwu4rop_tmp, -1) === '!' ) {
          $Vzqw0ieauwu4rop = rtrim(substr($Vzqw0ieauwu4rop_tmp, 0, -1));
          $Vfhiq1lhsojamportant = true;
        }
      }

      if ( $Vzqw0ieauwu4rop === "" ) {
        if (DEBUGCSS) print 'empty)';
        continue;
      }

      $Vfhiq1lhsoja = mb_strpos($Vzqw0ieauwu4rop, ":");
      if ( $Vfhiq1lhsoja === false ) {
        if (DEBUGCSS) print 'novalue'.$Vzqw0ieauwu4rop.')';
        continue;
      }

      $Vzqw0ieauwu4rop_name = rtrim(mb_strtolower(mb_substr($Vzqw0ieauwu4rop, 0, $Vfhiq1lhsoja)));
      $Vp4xjtpabm0l = ltrim(mb_substr($Vzqw0ieauwu4rop, $Vfhiq1lhsoja+1));
      if (DEBUGCSS) print $Vzqw0ieauwu4rop_name.':='.$Vp4xjtpabm0l.($Vfhiq1lhsojamportant?'!IMPORTANT':'').')';
      
      
      
      
      
      
      if ($Vfhiq1lhsojamportant) {
        $Vdtcpflt5bhp->important_set($Vzqw0ieauwu4rop_name);
      }
      
      $Vdtcpflt5bhp->$Vzqw0ieauwu4rop_name = $Vp4xjtpabm0l;
      
    }
    if (DEBUGCSS) print '_parse_properties]';

    return $Vdtcpflt5bhp;
  }

  
  private function _parse_sections($V2n430jknk35tr) {
    
    

    $Vzqw0ieauwu4atterns = array("/[\\s\n]+/", "/\\s+([>.:+#])\\s+/");
    $V5wjp3qep3yzplacements = array(" ", "\\1");
    $V2n430jknk35tr = preg_replace($Vzqw0ieauwu4atterns, $V5wjp3qep3yzplacements, $V2n430jknk35tr);

    $V2n430jknk35ections = explode("}", $V2n430jknk35tr);
    if (DEBUGCSS) print '[_parse_sections';
    foreach ($V2n430jknk35ections as $V2n430jknk35ect) {
      $Vfhiq1lhsoja = mb_strpos($V2n430jknk35ect, "{");

      $Vrsemcsjpwx3s = explode(",", mb_substr($V2n430jknk35ect, 0, $Vfhiq1lhsoja));
      if (DEBUGCSS) print '[section';
      $Vdtcpflt5bhp = $this->_parse_properties(trim(mb_substr($V2n430jknk35ect, $Vfhiq1lhsoja+1)));
      
      
      foreach ($Vrsemcsjpwx3s as $Vrsemcsjpwx3) {
        $Vrsemcsjpwx3 = trim($Vrsemcsjpwx3);

        if ($Vrsemcsjpwx3 == "") {
          if (DEBUGCSS) print '#empty#';
          continue;
        }
        if (DEBUGCSS) print '#'.$Vrsemcsjpwx3.'#';
        

        $this->add_style($Vrsemcsjpwx3, $Vdtcpflt5bhp);
      }
      if (DEBUGCSS) print 'section]';
    }
    if (DEBUGCSS) print '_parse_sections]';
  }

  
  function __toString() {
    $V2n430jknk35tr = "";
    foreach ($this->_styles as $Vrsemcsjpwx3 => $Vdtcpflt5bhp)
      $V2n430jknk35tr .= "$Vrsemcsjpwx3 => " . $Vdtcpflt5bhp->__toString() . "\n";

    return $V2n430jknk35tr;
  }
}
