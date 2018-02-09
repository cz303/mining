<?php



class DOMPDF {

  
  protected $Vo5msrv1213y;

  
  protected $Vjafiw1blkkl;

  
  protected $V3pieokwro05;

  
  protected $Vqyyzc2szlte;

  
  protected $Vitfiz0q2bem;

  
  protected $Vetq3gd2rrba;

  
  protected $Vcewsxlawngz;

  
  private $Vyy4fexnhsj0;

  
  protected $Vrjgo1sts4qf;

  
  protected $Vc1rv3q1womj;

  
  protected $V04ookbgih51;

  
  protected $Vqonkgrjr0id;
  
  
  private $Vnhozng0egp2 = null;
  
  
  private $Vusjsw3trhjp = null;
  
  
  private $Vp0iucpg1do0 = false;
  
  
  private $V5bjdgukcppn = "Fit";
  
  
  private $V5bjdgukcppn_options = array();

  
  private $Vh4sgxbu4003 = false;
  
  public static $Vwnw250y2anx = array("courier", "courier-bold", "courier-oblique", "courier-boldoblique",
                          "helvetica", "helvetica-bold", "helvetica-oblique", "helvetica-boldoblique",
                          "times-roman", "times-bold", "times-italic", "times-bolditalic",
                          "symbol", "zapfdinbats");

  
  function __construct() {
    $this->_locale_standard = sprintf('%.1f', 1.0) == '1.0';
    
    $this->save_locale();
    
    $this->_messages = array();
    $this->_css = new Stylesheet($this);
    $this->_pdf = null;
    $this->_paper_size = "letter";
    $this->_paper_orientation = "portrait";
    $this->_base_protocol = "";
    $this->_base_host = "";
    $this->_base_path = "";
    $this->_http_context = null;
    $this->_callbacks = array();
    $this->_cache_id = null;
    
    $this->restore_locale();
  }
  
  
  function __destruct() {
    clear_object($this);
  }
  
  
  private function save_locale() {
    if ( $this->_locale_standard ) return;
    
    $this->_system_locale = setlocale(LC_NUMERIC, "C");
  }
  
  
  private function restore_locale() {
    if ( $this->_locale_standard ) return;
    
    setlocale(LC_NUMERIC, $this->_system_locale);
  }

  
  function get_tree() { return $this->_tree; }

  
  function set_protocol($V41yimklfqrl) { $this->_protocol = $V41yimklfqrl; }

  
  function set_host($Vy4zba2jo55u) { $this->_base_host = $Vy4zba2jo55u; }

  
  function set_base_path($V3wwyy5a12nc) { $this->_base_path = $V3wwyy5a12nc; }
  
  
  function set_http_context($Vwfud5ffx1lt) { $this->_http_context = $Vwfud5ffx1lt; }
  
  
  function set_default_view($Vxqjctt1rbpy, $Vobxlvad3352) { 
    $this->_default_view = $Vxqjctt1rbpy;
    $this->_default_view_options = $Vobxlvad3352; 
  }
  
  
  function get_protocol() { return $this->_protocol; }

  
  function get_host() { return $this->_base_host; }

  
  function get_base_path() { return $this->_base_path; }
  
  
  function get_http_context() { return $this->_http_context; }

  
  function get_canvas() { return $this->_pdf; }

  
  function get_callbacks() { return $this->_callbacks; }

  
  function get_css() { return $this->_css; }

  
  function load_html_file($Vg5mhfl1beoi) {
    $this->save_locale();
    
    
    
    
    if ( !$this->_protocol && !$this->_base_host && !$this->_base_path )
      list($this->_protocol, $this->_base_host, $this->_base_path) = explode_url($Vg5mhfl1beoi);

    if ( !DOMPDF_ENABLE_REMOTE &&
         ($this->_protocol != "" && $this->_protocol !== "file://" ) )
      throw new DOMPDF_Exception("Remote file requested, but DOMPDF_ENABLE_REMOTE is false.");

    if ($this->_protocol == "" || $this->_protocol === "file://") {

      $Vknykljrq41b = realpath($Vg5mhfl1beoi);
      if ( !$Vg5mhfl1beoi )
        throw new DOMPDF_Exception("File '$Vg5mhfl1beoi' not found.");

      if ( strpos($Vknykljrq41b, DOMPDF_CHROOT) !== 0 )
        throw new DOMPDF_Exception("Permission denied on $Vg5mhfl1beoi.");

      
      if ( substr(basename($Vknykljrq41b),0,1) === "." )
        throw new DOMPDF_Exception("Permission denied on $Vg5mhfl1beoi.");

      $Vg5mhfl1beoi = $Vknykljrq41b;
    }

    $Vjsbhp3bvc1c = file_get_contents($Vg5mhfl1beoi, null, $this->_http_context);
    $V5mmmrje2ymm = null;

    
    if ( isset($http_response_header) ) {
      foreach($http_response_header as $Vn2n3th4zzzx) {
        if ( preg_match("@Content-Type:\s*[\w/]+;\s*?charset=([^\s]+)@i", $Vn2n3th4zzzx, $Vt3xexsia3ta) ) {
          $V5mmmrje2ymm = strtoupper($Vt3xexsia3ta[1]);
          break;
        }
      }
    }
    
    $this->restore_locale();
    
    $this->load_html($Vjsbhp3bvc1c, $V5mmmrje2ymm);
  }

  
  function load_html($Vyqctydehp2e, $V5mmmrje2ymm = null) {
    $this->save_locale();
    
    
    mb_detect_order('auto');
    
    if (mb_detect_encoding($Vyqctydehp2e) !== 'UTF-8') {
      $Vndfphggq3o2 = array(
        '@<meta\s+http-equiv="Content-Type"\s+content="(?:[\w/]+)(?:;\s*?charset=([^\s"]+))?@i',
        '@<meta\s+content="(?:[\w/]+)(?:;\s*?charset=([^\s"]+))"?\s+http-equiv="Content-Type"@i',
        '@<meta [^>]*charset\s*=\s*["\']?\s*([^"\' ]+)@i',
      );
      
      foreach($Vndfphggq3o2 as $Vxok0wzcyqny) {
        if (preg_match($Vxok0wzcyqny, $Vyqctydehp2e, $Vt3xexsia3ta)) break;
      }
        
      if (mb_detect_encoding($Vyqctydehp2e) == '') {
        if (isset($Vt3xexsia3ta[1])) {
          $V5mmmrje2ymm = strtoupper($Vt3xexsia3ta[1]);
        } else {
          $V5mmmrje2ymm = 'UTF-8';
        }
      } else {
        if (isset($Vt3xexsia3ta[1])) {
          $V5mmmrje2ymm = strtoupper($Vt3xexsia3ta[1]);
        } else {
          $V5mmmrje2ymm = 'auto';
        }
      }
      
      if ($V5mmmrje2ymm !== 'UTF-8') { 
        $Vyqctydehp2e = mb_convert_encoding($Vyqctydehp2e, 'UTF-8', $V5mmmrje2ymm); 
      }
      
      if (isset($Vt3xexsia3ta[1])) {
        $Vyqctydehp2e = preg_replace('/charset=([^\s"]+)/i', 'charset=UTF-8', $Vyqctydehp2e);
      } else {
        $Vyqctydehp2e = str_replace('<head>', '<head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8">', $Vyqctydehp2e);
      }
    } else {
      $V5mmmrje2ymm = 'UTF-8';
    }
    
    
    
    if (substr($Vyqctydehp2e, 0, 3) == chr(0xEF).chr(0xBB).chr(0xBF)) {
      $Vyqctydehp2e = substr($Vyqctydehp2e, 3);
    }
    
    
    if ( DOMPDF_ENABLE_PHP ) {
      ob_start();
      eval("?" . ">$Vyqctydehp2e");
      $Vyqctydehp2e = ob_get_clean();
    }
    
    
    
    
    if ( $V5mmmrje2ymm !== 'UTF-8' ) {
      $V5wjp3qep3yz = '/<meta ([^>]*)((?:charset=[^"\' ]+)([^>]*)|(?:charset=["\'][^"\' ]+["\']))([^>]*)>/i';
      $Vyqctydehp2e = preg_replace($V5wjp3qep3yz, '<meta $1$3>', $Vyqctydehp2e);
    }
    
    
    set_error_handler("record_warnings");
    
    
    
    
    $Vhjexzqu0uml = false;
    
    if ( DOMPDF_ENABLE_HTML5PARSER ) {
      $Vaijgup5e1v0 = new HTML5_Tokenizer($Vyqctydehp2e);
      $Vaijgup5e1v0->parse();
      $Vdquqd1aplqt = $Vaijgup5e1v0->save();
      
      
      $Vxxnoeylys2i = array("html", "table", "tbody", "thead", "tfoot", "tr");
      foreach($Vxxnoeylys2i as $V1ovp3yyqqrp) {
        $V1y3v3pnan4k = $Vdquqd1aplqt->getElementsByTagName($V1ovp3yyqqrp);
        
        foreach($V1y3v3pnan4k as $V1en3qe0uyt3) {
          self::remove_text_nodes($V1en3qe0uyt3);
        }
      }
      
      $Vhjexzqu0uml = ($Vaijgup5e1v0->getTree()->getQuirksMode() > HTML5_TreeBuilder::NO_QUIRKS);
    }
    else {
      $Vdquqd1aplqt = new DOMDocument();
      $Vdquqd1aplqt->preserveWhiteSpace = true;
      $Vdquqd1aplqt->loadHTML($Vyqctydehp2e);
      
      
      if ( preg_match("/^(.+)<(!doctype|html)/i", ltrim($Vyqctydehp2e), $Vt3xexsia3ta) ) {
        $Vhjexzqu0uml = true;
      }
      else {
        
        if ( !$Vdquqd1aplqt->doctype->publicId && !$Vdquqd1aplqt->doctype->systemId ) {
          $Vhjexzqu0uml = false;
        }
        
        
        if ( !preg_match("/xhtml/i", $Vdquqd1aplqt->doctype->publicId) ) {
          $Vhjexzqu0uml = true;
        }
      }
    }
    
    $this->_xml = $Vdquqd1aplqt;
    $this->_quirksmode = $Vhjexzqu0uml;
    
    $this->_tree = new Frame_Tree($this->_xml);
    
    restore_error_handler();
    
    $this->restore_locale();
  }
  
  static function remove_text_nodes(DOMNode $V1en3qe0uyt3) {
    $Vhedylkejosg = array();
    for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V1en3qe0uyt3->childNodes->length; $Vfhiq1lhsoja++) {
      $Vcnoizcxjx0n = $V1en3qe0uyt3->childNodes->item($Vfhiq1lhsoja);
      if ( $Vcnoizcxjx0n->nodeName === "#text" ) {
        $Vhedylkejosg[] = $Vcnoizcxjx0n;
      }
    }
      
    foreach($Vhedylkejosg as $Vcnoizcxjx0n) {
      $V1en3qe0uyt3->removeChild($Vcnoizcxjx0n);
    }
  }

  
  protected function _process_html() {
    $this->save_locale();
    
    $this->_tree->build_tree();

    $this->_css->load_css_file(Stylesheet::DEFAULT_STYLESHEET, Stylesheet::ORIG_UA);

    $Vahzk13vhx03 = Stylesheet::$Vv5re1koxu0z;
    if ( defined("DOMPDF_DEFAULT_MEDIA_TYPE") ) {
      $Vahzk13vhx03[] = DOMPDF_DEFAULT_MEDIA_TYPE;
    } else {
      $Vahzk13vhx03[] = Stylesheet::$Vc4jaovdxmnv;
    }
          
    
    $Vjevuth1ebch = $this->_xml->getElementsByTagName("link");
    foreach ($Vjevuth1ebch as $Vflwqi4pc3qc) {
      if ( mb_strtolower($Vflwqi4pc3qc->getAttribute("rel")) === "stylesheet" ||
           mb_strtolower($Vflwqi4pc3qc->getAttribute("type")) === "text/css" ) {
        
        
        $Vcciqnspjrr4 = preg_split("/[\s\n,]/", $Vflwqi4pc3qc->getAttribute("media"),-1, PREG_SPLIT_NO_EMPTY);
        if ( count($Vcciqnspjrr4) > 0 ) {
          $Vnbc1vlar3n5 = false;
          foreach ( $Vcciqnspjrr4 as $V4pigtpor0ln ) {
            if ( in_array(mb_strtolower(trim($V4pigtpor0ln)), $Vahzk13vhx03) ) {
              $Vnbc1vlar3n5 = true;
              break;
            }
          }
          if (!$Vnbc1vlar3n5) {
            
            
            continue;
          }
        }
           
        $Vbfatyoohaps = $Vflwqi4pc3qc->getAttribute("href");
        $Vbfatyoohaps = build_url($this->_protocol, $this->_base_host, $this->_base_path, $Vbfatyoohaps);

        $this->_css->load_css_file($Vbfatyoohaps, Stylesheet::ORIG_AUTHOR);
      }

    }
    
    
    $this->_css->set_protocol($this->_protocol);
    $this->_css->set_host($this->_base_host);
    $this->_css->set_base_path($this->_base_path);

    
    $Vapglixr3x42 = $this->_xml->getElementsByTagName("style");
    foreach ($Vapglixr3x42 as $Vdtcpflt5bhp) {

      
      
      
      
      if ( $Vdtcpflt5bhp->hasAttributes() &&
           ($Vma1aig1tarc = $Vdtcpflt5bhp->getAttribute("media")) &&
           !in_array($Vma1aig1tarc, $Vahzk13vhx03) )
        continue;

      $Vim4gcyktb2a = "";
      if ( $Vdtcpflt5bhp->hasChildNodes() ) {

        $Vcnoizcxjx0n = $Vdtcpflt5bhp->firstChild;
        while ( $Vcnoizcxjx0n ) {
          $Vim4gcyktb2a .= $Vcnoizcxjx0n->nodeValue; 
          $Vcnoizcxjx0n = $Vcnoizcxjx0n->nextSibling;
        }

      } else
        $Vim4gcyktb2a = $Vdtcpflt5bhp->nodeValue;

      $this->_css->load_css($Vim4gcyktb2a);
    }
    
    $this->restore_locale();
  }

  
  function set_paper($V4jbadwq4bzj, $Viltsyxewtah = "portrait") {
    $this->_paper_size = $V4jbadwq4bzj;
    $this->_paper_orientation = $Viltsyxewtah;
  }

  
  function enable_caching($Vt12rspqulrh) {
    $this->_cache_id = $Vt12rspqulrh;
  }

  
  function set_callbacks($Vwc2kpv1buqg) {
    if (is_array($Vwc2kpv1buqg)) {
      $this->_callbacks = array();
      foreach ($Vwc2kpv1buqg as $V4y0urwpnd3j) {
        if (is_array($V4y0urwpnd3j) && isset($V4y0urwpnd3j['event']) && isset($V4y0urwpnd3j['f'])) {
          $Vaknohb125rr = $V4y0urwpnd3j['event'];
          $Vtbbah5lqvpo = $V4y0urwpnd3j['f'];
          if (is_callable($Vtbbah5lqvpo) && is_string($Vaknohb125rr)) {
            $this->_callbacks[$Vaknohb125rr][] = $Vtbbah5lqvpo;
          }
        }
      }
    }
  }
  
  
  function get_quirksmode(){
    return $this->_quirksmode;
  }
  
  function parse_default_view($Vp4xjtpabm0l) {
    $Vp0umi5mdv20 = array("XYZ", "Fit", "FitH", "FitV", "FitR", "FitB", "FitBH", "FitBV");
    
    $Vobxlvad3352 = preg_split("/\s*,\s*/", trim($Vp4xjtpabm0l));
    $Vxqjctt1rbpy = array_shift($Vobxlvad3352);
    
    if ( !in_array($Vxqjctt1rbpy, $Vp0umi5mdv20) ) {
      return false;
    }
    
    $this->set_default_view($Vxqjctt1rbpy, $Vobxlvad3352);
    return true;
  }

  
  function render() {
    $this->save_locale();
    
    if ( DOMPDF_LOG_OUTPUT_FILE ) {
      if ( !file_exists(DOMPDF_LOG_OUTPUT_FILE) && is_writable(dirname(DOMPDF_LOG_OUTPUT_FILE)) ) {
        touch(DOMPDF_LOG_OUTPUT_FILE);
      }
      
      $this->_start_time = microtime(true);
      ob_start();
    }

    

    $this->_process_html();
    
    $this->_css->apply_styles($this->_tree);
    
    
    $Vm5dt2wixddz = $this->_css->get_page_styles();
    
    $Vf10mrougq4u = $Vm5dt2wixddz["base"];
    unset($Vm5dt2wixddz["base"]);
    
    foreach($Vm5dt2wixddz as $V40dpwizcno1) {
      $V40dpwizcno1->inherit($Vf10mrougq4u);
    }
    
    if ( is_array($Vf10mrougq4u->size) ) {
      $this->set_paper(array(0, 0, $Vf10mrougq4u->size[0], $Vf10mrougq4u->size[1]));
    }
    
    $this->_pdf = Canvas_Factory::get_instance($this->_paper_size, $this->_paper_orientation);
    Font_Metrics::init($this->_pdf);
    
    if (DOMPDF_ENABLE_FONTSUBSETTING && $this->_pdf instanceof CPDF_Adapter) {
      foreach ($this->_tree->get_frames() as $Vtbbah5lqvporame) {
        $Vdtcpflt5bhp = $Vtbbah5lqvporame->get_style();
        $V1en3qe0uyt3  = $Vtbbah5lqvporame->get_node();
        
        
        if ( $V1en3qe0uyt3->nodeName === "#text" ) {
          $this->_pdf->register_string_subset($Vdtcpflt5bhp->font_family, $V1en3qe0uyt3->nodeValue);
          continue;
        }
        
        
        if ( $Vdtcpflt5bhp->display === "list-item" ) {
          $V4y0urwpnd3jhars = List_Bullet_Renderer::get_counter_chars($Vdtcpflt5bhp->list_style_type);
          $this->_pdf->register_string_subset($Vdtcpflt5bhp->font_family, $V4y0urwpnd3jhars);
          continue;
        }
        
        
      }
    }
    
    $V4jn4msro4hf = null;

    foreach ($this->_tree->get_frames() as $Vtbbah5lqvporame) {
      
      if ( is_null($V4jn4msro4hf) ) {
        $V4jn4msro4hf = Frame_Factory::decorate_root( $this->_tree->get_root(), $this );
        continue;
      }

      
      $Vn0mq53c5jwe = Frame_Factory::decorate_frame($Vtbbah5lqvporame, $this);
      $Vn0mq53c5jwe->set_root($V4jn4msro4hf);

      
      if ( $Vtbbah5lqvporame->get_style()->display === "list-item" ) {
        
        $V1en3qe0uyt3 = $this->_xml->createElement("bullet"); 
        $Vtgat3bipc2v = new Frame($V1en3qe0uyt3);

        $Vb1tibotinjl = $Vtbbah5lqvporame->get_parent()->get_node();

        if ( !$Vb1tibotinjl->hasAttribute("dompdf-children-count") ) {
          $V3peids5jcyq = new DOMXPath($this->_xml);
          $V4y0urwpnd3jount = $V3peids5jcyq->query("li", $Vb1tibotinjl)->length;
          $Vb1tibotinjl->setAttribute("dompdf-children-count", $V4y0urwpnd3jount);
        }

        if ( !$Vb1tibotinjl->hasAttribute("dompdf-counter") ) {
          $Vfhiq1lhsojandex = ($Vb1tibotinjl->hasAttribute("start") ? $Vb1tibotinjl->getAttribute("start")-1 : 0);
        }
        else {
          $Vfhiq1lhsojandex = $Vb1tibotinjl->getAttribute("dompdf-counter");
        }
        
        $Vfhiq1lhsojandex++;
        $Vb1tibotinjl->setAttribute("dompdf-counter", $Vfhiq1lhsojandex);
        
        $V1en3qe0uyt3->setAttribute("dompdf-counter", $Vfhiq1lhsojandex);
        $Vdtcpflt5bhp = $this->_css->create_style();
        $Vdtcpflt5bhp->display = "-dompdf-list-bullet";
        $Vdtcpflt5bhp->inherit($Vtbbah5lqvporame->get_style());
        $Vtgat3bipc2v->set_style($Vdtcpflt5bhp);

        $Vn0mq53c5jwe->prepend_child( Frame_Factory::decorate_frame($Vtgat3bipc2v, $this) );
      }

    }

    
    $Vzeg1rojkgqq = $this->_xml->getElementsByTagName("title");
    if ( $Vzeg1rojkgqq->length ) {
      $this->_pdf->add_info("Title", trim($Vzeg1rojkgqq->item(0)->nodeValue));
    }
    
    $Vx4rz4pi2oxh = $this->_xml->getElementsByTagName("meta");
    $V2vr5zixslid = array(
      "author" => "Author",
      "keywords" => "Keywords",
      "description" => "Subject",
    );
    foreach($Vx4rz4pi2oxh as $V243j3rdeixy) {
      $Vcvluzjs3wzb = mb_strtolower($V243j3rdeixy->getAttribute("name"));
      $Vp4xjtpabm0l = trim($V243j3rdeixy->getAttribute("content"));
      
      if ( isset($V2vr5zixslid[$Vcvluzjs3wzb]) ) {
        $this->_pdf->add_info($V2vr5zixslid[$Vcvluzjs3wzb], $Vp4xjtpabm0l);
        continue;
      }
      
      if ( $Vcvluzjs3wzb === "dompdf.view" && $this->parse_default_view($Vp4xjtpabm0l) ) {
        $this->_pdf->set_default_view($this->_default_view, $this->_default_view_options);
      }
    }
    
    $V4jn4msro4hf->set_containing_block(0, 0, $this->_pdf->get_width(), $this->_pdf->get_height());
    $V4jn4msro4hf->set_renderer(new Renderer($this));

    
    $V4jn4msro4hf->reflow();

    
    Image_Cache::clear();
    
    global $Vlb1pyhumpag, $Vxh3hfxmt4gu;
    if ( $Vxh3hfxmt4gu ) {
      echo '<b>DOMPDF Warnings</b><br><pre>';
      foreach ($Vlb1pyhumpag as $Vzjcdynyc23y)
        echo $Vzjcdynyc23y . "\n";
      echo $this->get_canvas()->get_cpdf()->messages;
      echo '</pre>';
      flush();
    }
    
    $this->restore_locale();
  }

  
  function add_info($Vq04bwg4ulks, $Vp4xjtpabm0l) {
    if (!is_null($this->_pdf))
      $this->_pdf->add_info($Vq04bwg4ulks, $Vp4xjtpabm0l);
  }

  
  private function write_log() {
    if ( !DOMPDF_LOG_OUTPUT_FILE || !is_writable(DOMPDF_LOG_OUTPUT_FILE) ) return;
    
    $Vtbbah5lqvporames = Frame::$Vpj2vsrymjdn;
    $Vtc2yexjbnem = DOMPDF_memory_usage();
    $Vtc2yexjbnem = number_format($Vtc2yexjbnem/1024);
    $Vmfehxqto3f3 = number_format((microtime(true) - $this->_start_time) * 1000, 2);
    
    $Vvbltn01tphw = 
      "<span style='color: #000'>{$Vtbbah5lqvporames} frames</span>\t".
      "<span style='color: #900'>{$Vtc2yexjbnem} KB</span>\t".
      "<span style='color: #090'>{$Vmfehxqto3f3} ms</span>\t".
      "<span style='color: #009' title='Quirksmode'>".
        ($this->_quirksmode ? "<span style='color: #c00'>ON</span>" : "<span style='color: #0c0'>OFF</span>").
      "</span><br />";
    
    $Vvbltn01tphw .= ob_get_clean();
    file_put_contents(DOMPDF_LOG_OUTPUT_FILE, $Vvbltn01tphw);
  }

  
  function stream($Vg5mhfl1beoiname, $Vobxlvad3352 = null) {
    $this->save_locale();
    
    $this->write_log();
    
    if (!is_null($this->_pdf))
      $this->_pdf->stream($Vg5mhfl1beoiname, $Vobxlvad3352);
      
    $this->restore_locale();
  }

  
  function output($Vobxlvad3352 = null) {
    $this->save_locale();
    
    $this->write_log();

    if ( is_null($this->_pdf) )
      return null;

    $Vvbltn01tphwput = $this->_pdf->output( $Vobxlvad3352 );
    
    $this->restore_locale();
    
    return $Vvbltn01tphwput;
  }

  
  function output_html() {
    return $this->_xml->saveHTML();
  }
}
