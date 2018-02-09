<?php

class Cpdf {
  
  
  public  $Vzz2tl1rvznp = 0;

  
  public  $V3okjsltrig4 =  array();

  
  public  $Vshiv4yzf1zd;

  
  public  $Vbtry0up1z0b = array();
  
  
  public  $V0ptxymuwhih = './fonts/Helvetica.afm';
  
  
  public  $Vetnox2trg4t = '';

  
  public  $Voahsaoxyvzr = '';

  
  public  $Vetnox2trg4tNum = 0;

  
  public  $Vufj0hefz0oy;

  
  public  $Vbmkok2113rv;

  
  public  $Vzrx3c3fjyr4;

  
  public  $Vaye5yaibgfk = 0;

  
  private  $Vfagrxz410t2 =  0;

  
  public  $V34lolymglig = null;

  
  public  $Vastru0a5f1m = null;

  
  public  $Vfdjlsyuu2da = '';

  
  public $Vsahktusgxmt = array("mode" => "Normal", "opacity" => 1.0);
  
  
  public $Vlhk2hutovum = array("mode" => "Normal", "opacity" => 1.0);
  
  
  public  $Vgsaegupyofp =  array();

  
  public  $Vxgmsjktgw23 =  0;

  
  public  $Vfx3c01b4pt5 = 0;

  
  public  $Vltejvmdssgs = array();

  
  public  $Vead31lbsgse = 0;

  
  public  $Vyhof3tvieaw = array();

  
  public  $Vb3czydpfoll = array();

  
  public  $Vr4poauvxwls = 0;

  
  public  $Vm0b4pxlzbmi = 0;

  
  public  $Vobxlvad3352 = array('compression'=>true);

  
  public  $Vxitnrre2wwh;

  
  public  $Vx4j5seyuqfj = 0;

  
  public  $Vjnpc100rnfs = 0;
  
  
  public  $Vd4o1aofs5ib;

  
  public  $Vxpxw011avw1 =  array();
 
  
  public  $Vpfhhm5z1azm = '';
  
  
  public  $Vpfhhm5z1azmVersion = 5;

  
  public  $Vdln1z2oxpjs = '';

  
  public  $Vflqwyk0twci =  '';

  
  public  $Vqoeqxio15il = '';

  
  public  $Vcwvbhplzpp0 = '';

  
  public  $Vcwvbhplzpp0_objnum = 0;

  
  public  $Vfq1impr11pp = '';

  
  public  $Vfcd0izxj0th = false;

  
  public  $Vi0qeo4zazve = '';

  
  public  $V2qdon2zzh4a =  array();

  
  public  $Vyan4m05elcd =  0;

  
  public  $Vtqtmk2l3qcw =  array();

  
  public  $Vcbu5plylw5h =  '';

  
  public  $Vnsyu0rktccu = array();

  
  public  $Vydola2sqzny = false;

  
  public  $V21vpi3zuxme = '';

  
  protected $Vs4zmlwdzgwp = false;

  
  protected $Vbmkok2113rvSize = array("width" => 0, "height" => 0);
  
  
  protected $Vzdier34i0kq = array();
  
  
  static protected $Vnpuafoehm5n = 'iso-8859-1';
  
  
  static protected $Vythn5boec34 = array(
    'courier', 'courier-bold', 'courier-oblique', 'courier-boldoblique',
    'helvetica', 'helvetica-bold', 'helvetica-oblique', 'helvetica-boldoblique',
    'times-roman', 'times-bold', 'times-italic', 'times-bolditalic',
    'symbol', 'zapfdingbats'
  );
  
  
  function __construct ($Vk3kprxxf2wm = array(0, 0, 612, 792), $Vydola2sqzny = false, $Vpfhhm5z1azm = '', $Vdln1z2oxpjs = '') {
    $Veca2om3awughis->isUnicode = $Vydola2sqzny;
    $Veca2om3awughis->fontcache = $Vpfhhm5z1azm;
    $Veca2om3awughis->tmp = $Vdln1z2oxpjs;
    $Veca2om3awughis->newDocument($Vk3kprxxf2wm);
    
    $Veca2om3awughis->compressionReady = function_exists('gzcompress');
    
    if ( in_array('Windows-1252', mb_list_encodings()) ) {
      self::$Vnpuafoehm5n = 'Windows-1252';
    }

    
    $Veca2om3awughis->setFontFamily('init');
    
  }
  
  

  
  protected function  o_destination($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch ($Vrrb21ym0qp1) {
    case  'new':
      $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'destination', 'info'=>array());
      $Vdln1z2oxpjs =  '';
      switch  ($Vobxlvad3352['type']) {
      case  'XYZ':
      case  'FitR':
        $Vdln1z2oxpjs =   ' '.$Vobxlvad3352['p3'].$Vdln1z2oxpjs;
      case  'FitH':
      case  'FitV':
      case  'FitBH':
      case  'FitBV':
        $Vdln1z2oxpjs =   ' '.$Vobxlvad3352['p1'].' '.$Vobxlvad3352['p2'].$Vdln1z2oxpjs;
      case  'Fit':
      case  'FitB':
        $Vdln1z2oxpjs =   $Vobxlvad3352['type'].$Vdln1z2oxpjs;
        $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['string'] = $Vdln1z2oxpjs;
        $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['page'] = $Vobxlvad3352['page'];
      }
      break;

    case  'out':
      $Vdln1z2oxpjs =  $Vrs2mt5pfpsv['info'];
      $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n".'['.$Vdln1z2oxpjs['page'].' 0 R /'.$Vdln1z2oxpjs['string']."]\nendobj";
      return  $Ve3oeikqcm5n;
    }
  }

  
  protected function  o_viewerPreferences($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'viewerPreferences', 'info'=>array());
      break;

    case  'add':
      foreach($Vobxlvad3352 as  $V51lf1kcbto4=>$Vf1kwqxxhqpz) {
        switch  ($V51lf1kcbto4) {
        case  'HideToolbar':
        case  'HideMenubar':
        case  'HideWindowUI':
        case  'FitWindow':
        case  'CenterWindow':
        case  'NonFullScreenPageMode':
        case  'Direction':
          $Vrs2mt5pfpsv['info'][$V51lf1kcbto4] = $Vf1kwqxxhqpz;
          break;
        }
      }
      break;

    case  'out':
      $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n<< ";
      foreach($Vrs2mt5pfpsv['info'] as  $V51lf1kcbto4=>$Vf1kwqxxhqpz) {
        $Ve3oeikqcm5n.= "\n/$V51lf1kcbto4 $Vf1kwqxxhqpz";
      }
      $Ve3oeikqcm5n.= "\n>>\n";
      return  $Ve3oeikqcm5n;
    }
  }

  
  protected function  o_catalog($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'catalog', 'info'=>array());
      $Veca2om3awughis->catalogId = $Vwfsll4zanwn;
      break;

    case  'outlines':
    case  'pages':
    case  'openHere':
    case  'javascript':
      $Vrs2mt5pfpsv['info'][$Vrrb21ym0qp1] = $Vobxlvad3352;
      break;

    case  'viewerPreferences':
      if  (!isset($Vrs2mt5pfpsv['info']['viewerPreferences'])) {
        $Veca2om3awughis->numObj++;
        $Veca2om3awughis->o_viewerPreferences($Veca2om3awughis->numObj, 'new');
        $Vrs2mt5pfpsv['info']['viewerPreferences'] = $Veca2om3awughis->numObj;
      }

      $Vf1kwqxxhqpzp =  $Vrs2mt5pfpsv['info']['viewerPreferences'];
      $Veca2om3awughis->o_viewerPreferences($Vf1kwqxxhqpzp, 'add', $Vobxlvad3352);

      break;

    case  'out':
      $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n<< /Type /Catalog";

      foreach($Vrs2mt5pfpsv['info'] as  $V51lf1kcbto4=>$Vf1kwqxxhqpz) {
        switch ($V51lf1kcbto4) {
        case  'outlines':
          $Ve3oeikqcm5n.= "\n/Outlines $Vf1kwqxxhqpz 0 R";
          break;
          
        case  'pages':
          $Ve3oeikqcm5n.= "\n/Pages $Vf1kwqxxhqpz 0 R";
          break;

        case  'viewerPreferences':
          $Ve3oeikqcm5n.= "\n/ViewerPreferences $Vf1kwqxxhqpz 0 R";
          break;

        case  'openHere':
          $Ve3oeikqcm5n.= "\n/OpenAction $Vf1kwqxxhqpz 0 R";
          break;

        case  'javascript':
          $Ve3oeikqcm5n.= "\n/Names <</JavaScript $Vf1kwqxxhqpz 0 R>>";
          break;
        }
      }

      $Ve3oeikqcm5n.= " >>\nendobj";
      return  $Ve3oeikqcm5n;
    }
  }

  
  protected function  o_pages($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'pages', 'info'=>array());
      $Veca2om3awughis->o_catalog($Veca2om3awughis->catalogId, 'pages', $Vwfsll4zanwn);
      break;

    case  'page':
      if  (!is_array($Vobxlvad3352)) {
        
        $Vrs2mt5pfpsv['info']['pages'][] = $Vobxlvad3352;
      } else {
        
        
        if  (isset($Vobxlvad3352['id']) &&  isset($Vobxlvad3352['rid']) &&  isset($Vobxlvad3352['pos'])) {
          $Vfhiq1lhsoja =  array_search($Vobxlvad3352['rid'], $Vrs2mt5pfpsv['info']['pages']);
          if  (isset($Vrs2mt5pfpsv['info']['pages'][$Vfhiq1lhsoja]) &&  $Vrs2mt5pfpsv['info']['pages'][$Vfhiq1lhsoja] == $Vobxlvad3352['rid']) {

            
            
            switch  ($Vobxlvad3352['pos']) {
            case  'before':
              $V51lf1kcbto4 =  $Vfhiq1lhsoja;
              break;

            case  'after':
              $V51lf1kcbto4 = $Vfhiq1lhsoja+1;
              break;

            default:
              $V51lf1kcbto4 = -1;
              break;
            }

            if  ($V51lf1kcbto4 >= 0) {
              for  ($Vzmnqyqjjodw = count($Vrs2mt5pfpsv['info']['pages']) -1;$Vzmnqyqjjodw >= $V51lf1kcbto4;$Vzmnqyqjjodw--) {
                $Vrs2mt5pfpsv['info']['pages'][$Vzmnqyqjjodw+1] = $Vrs2mt5pfpsv['info']['pages'][$Vzmnqyqjjodw];
              }

              $Vrs2mt5pfpsv['info']['pages'][$V51lf1kcbto4] = $Vobxlvad3352['id'];
            }
          }
        }
      }
      break;

    case  'procset':
      $Vrs2mt5pfpsv['info']['procset'] = $Vobxlvad3352;
      break;

    case  'mediaBox':
      $Vrs2mt5pfpsv['info']['mediaBox'] = $Vobxlvad3352;
      
      $Veca2om3awughis->currentPageSize = array('width' => $Vobxlvad3352[2], 'height' => $Vobxlvad3352[3]);
      break;

    case  'font':
      $Vrs2mt5pfpsv['info']['fonts'][] = array('objNum'=>$Vobxlvad3352['objNum'], 'fontNum'=>$Vobxlvad3352['fontNum']);
      break;

    case  'extGState':
      $Vrs2mt5pfpsv['info']['extGStates'][] =  array('objNum' => $Vobxlvad3352['objNum'],  'stateNum' => $Vobxlvad3352['stateNum']);
      break;

    case  'xObject':
      $Vrs2mt5pfpsv['info']['xObjects'][] = array('objNum'=>$Vobxlvad3352['objNum'], 'label'=>$Vobxlvad3352['label']);
      break;

    case  'out':
      if  (count($Vrs2mt5pfpsv['info']['pages'])) {
        $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n<< /Type /Pages\n/Kids [";
        foreach($Vrs2mt5pfpsv['info']['pages'] as  $Vf1kwqxxhqpz) {
          $Ve3oeikqcm5n.= "$Vf1kwqxxhqpz 0 R\n";
        }

        $Ve3oeikqcm5n.= "]\n/Count ".count($Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['pages']);

        if  ( (isset($Vrs2mt5pfpsv['info']['fonts']) &&  count($Vrs2mt5pfpsv['info']['fonts'])) ||
              isset($Vrs2mt5pfpsv['info']['procset']) ||
              (isset($Vrs2mt5pfpsv['info']['extGStates']) &&  count($Vrs2mt5pfpsv['info']['extGStates']))) {
          $Ve3oeikqcm5n.= "\n/Resources <<";

          if  (isset($Vrs2mt5pfpsv['info']['procset'])) {
            $Ve3oeikqcm5n.= "\n/ProcSet ".$Vrs2mt5pfpsv['info']['procset']." 0 R";
          }

          if  (isset($Vrs2mt5pfpsv['info']['fonts']) &&  count($Vrs2mt5pfpsv['info']['fonts'])) {
            $Ve3oeikqcm5n.= "\n/Font << ";
            foreach($Vrs2mt5pfpsv['info']['fonts'] as  $Vxnx0oxo2qjh) {
              $Ve3oeikqcm5n.= "\n/F".$Vxnx0oxo2qjh['fontNum']." ".$Vxnx0oxo2qjh['objNum']." 0 R";
            }
            $Ve3oeikqcm5n.= "\n>>";
          }

          if  (isset($Vrs2mt5pfpsv['info']['xObjects']) &&  count($Vrs2mt5pfpsv['info']['xObjects'])) {
            $Ve3oeikqcm5n.= "\n/XObject << ";
            foreach($Vrs2mt5pfpsv['info']['xObjects'] as  $Vxnx0oxo2qjh) {
              $Ve3oeikqcm5n.= "\n/".$Vxnx0oxo2qjh['label']." ".$Vxnx0oxo2qjh['objNum']." 0 R";
            }
            $Ve3oeikqcm5n.= "\n>>";
          }

          if  ( isset($Vrs2mt5pfpsv['info']['extGStates']) &&  count($Vrs2mt5pfpsv['info']['extGStates'])) {
            $Ve3oeikqcm5n.=  "\n/ExtGState << ";
            foreach ($Vrs2mt5pfpsv['info']['extGStates'] as  $Vpljpnw35plt) {
              $Ve3oeikqcm5n.=  "\n/GS" . $Vpljpnw35plt['stateNum'] . " " . $Vpljpnw35plt['objNum'] . " 0 R";
            }
            $Ve3oeikqcm5n.=  "\n>>";
          }

          $Ve3oeikqcm5n.= "\n>>";
          if  (isset($Vrs2mt5pfpsv['info']['mediaBox'])) {
            $Vdln1z2oxpjs = $Vrs2mt5pfpsv['info']['mediaBox'];
            $Ve3oeikqcm5n.= "\n/MediaBox [".sprintf('%.3F %.3F %.3F %.3F', $Vdln1z2oxpjs[0], $Vdln1z2oxpjs[1], $Vdln1z2oxpjs[2], $Vdln1z2oxpjs[3]) .']';
          }
        }

        $Ve3oeikqcm5n.= "\n >>\nendobj";
      } else {
        $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n<< /Type /Pages\n/Count 0\n>>\nendobj";
      }

      return  $Ve3oeikqcm5n;
    }
  }

  
  protected function  o_outlines($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'outlines', 'info'=>array('outlines'=>array()));
      $Veca2om3awughis->o_catalog($Veca2om3awughis->catalogId, 'outlines', $Vwfsll4zanwn);
      break;

    case  'outline':
      $Vrs2mt5pfpsv['info']['outlines'][] = $Vobxlvad3352;
      break;

    case  'out':
      if  (count($Vrs2mt5pfpsv['info']['outlines'])) {
        $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n<< /Type /Outlines /Kids [";
        foreach($Vrs2mt5pfpsv['info']['outlines'] as  $Vf1kwqxxhqpz) {
          $Ve3oeikqcm5n.= "$Vf1kwqxxhqpz 0 R ";
        }

        $Ve3oeikqcm5n.= "] /Count ".count($Vrs2mt5pfpsv['info']['outlines']) ." >>\nendobj";
      } else {
        $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n<< /Type /Outlines /Count 0 >>\nendobj";
      }

      return  $Ve3oeikqcm5n;
    }
  }

  
  protected function  o_font($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      $Veca2om3awughis->objects[$Vwfsll4zanwn] =  array('t' => 'font', 'info' => array('name' => $Vobxlvad3352['name'], 'fontFileName' => $Vobxlvad3352['fontFileName'], 'SubType' => 'Type1'));
      $Vizupn2fm0i4 =  $Veca2om3awughis->numFonts;
      $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['fontNum'] =  $Vizupn2fm0i4;

      
      if  (isset($Vobxlvad3352['differences'])) {
        
        $Veca2om3awughis->numObj++;
        $Veca2om3awughis->o_fontEncoding($Veca2om3awughis->numObj, 'new', $Vobxlvad3352);
        $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['encodingDictionary'] =  $Veca2om3awughis->numObj;
      } else  if  (isset($Vobxlvad3352['encoding'])) {
        
        switch ($Vobxlvad3352['encoding']) {
        case  'WinAnsiEncoding':
        case  'MacRomanEncoding':
        case  'MacExpertEncoding':
          $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['encoding'] =  $Vobxlvad3352['encoding'];
          break;

        case  'none':
          break;

        default:
          $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['encoding'] =  'WinAnsiEncoding';
          break;
        }
      } else {
        $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['encoding'] =  'WinAnsiEncoding';
      }

      if ($Veca2om3awughis->fonts[$Vobxlvad3352['fontFileName']]['isUnicode']) {
        
        
        
        
        
        
        

        $Vfd0b3xiloij = ++$Veca2om3awughis->numObj;
        $Veca2om3awughis->o_contents($Vfd0b3xiloij, 'new', 'raw');
        $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['toUnicode'] = $Vfd0b3xiloij;
        
        $V2ov2dxpmqj1 =  <<<EOT
/CIDInit /ProcSet findresource begin
12 dict begin
begincmap
/CIDSystemInfo
<</Registry (Adobe)
/Ordering (UCS)
/Supplement 0
>> def
/CMapName /Adobe-Identity-UCS def
/CMapType 2 def
1 begincodespacerange
<0000> <FFFF>
endcodespacerange
1 beginbfrange
<0000> <FFFF> <0000>
endbfrange
endcmap
CMapName currentdict /CMap defineresource pop
end
end
EOT;

        $Ve3oeikqcm5n =   "<</Length " . mb_strlen($V2ov2dxpmqj1, '8bit') . " >>\n";
        $Ve3oeikqcm5n .=  "stream\n" . $V2ov2dxpmqj1 . "endstream";

        $Veca2om3awughis->objects[$Vfd0b3xiloij]['c'] = $Ve3oeikqcm5n;

        $Vf13bfra25kt = ++$Veca2om3awughis->numObj;
        $Veca2om3awughis->o_fontDescendentCID($Vf13bfra25kt, 'new', $Vobxlvad3352);
        $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['cidFont'] = $Vf13bfra25kt;
      }
      
      
      $Veca2om3awughis->o_pages($Veca2om3awughis->currentNode, 'font', array('fontNum' => $Vizupn2fm0i4, 'objNum' => $Vwfsll4zanwn));
      break;

    case  'add':
      foreach ($Vobxlvad3352 as  $V51lf1kcbto4 => $Vf1kwqxxhqpz) {
        switch  ($V51lf1kcbto4) {
        case  'BaseFont':
          $Vrs2mt5pfpsv['info']['name'] =  $Vf1kwqxxhqpz;
          break;
        case  'FirstChar':
        case  'LastChar':
        case  'Widths':
        case  'FontDescriptor':
        case  'SubType':
          $Veca2om3awughis->addMessage('o_font '.$V51lf1kcbto4." : ".$Vf1kwqxxhqpz);
          $Vrs2mt5pfpsv['info'][$V51lf1kcbto4] =  $Vf1kwqxxhqpz;
          break;
        }
      }

      
      if (isset($Vrs2mt5pfpsv['info']['cidFont'])) {
        $Veca2om3awughis->o_fontDescendentCID($Vrs2mt5pfpsv['info']['cidFont'], 'add', $Vobxlvad3352);
      }
      break;

    case  'out':
      if ($Veca2om3awughis->fonts[$Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['fontFileName']]['isUnicode']) {
        
        
        
        
        
        
        

        $Ve3oeikqcm5n =  "\n$Vwfsll4zanwn 0 obj\n<</Type /Font\n/Subtype /Type0\n";
        $Ve3oeikqcm5n.=  "/BaseFont /".$Vrs2mt5pfpsv['info']['name']."\n";

        
        
        $Ve3oeikqcm5n.=  "/Encoding /Identity-H\n";
        $Ve3oeikqcm5n.=  "/DescendantFonts [".$Vrs2mt5pfpsv['info']['cidFont']." 0 R]\n";
        $Ve3oeikqcm5n.=  "/ToUnicode ".$Vrs2mt5pfpsv['info']['toUnicode']." 0 R\n";
        $Ve3oeikqcm5n.=  ">>\n";
        $Ve3oeikqcm5n.=  "endobj";
      } else {
        $Ve3oeikqcm5n =  "\n$Vwfsll4zanwn 0 obj\n<< /Type /Font\n/Subtype /".$Vrs2mt5pfpsv['info']['SubType']."\n";
        $Ve3oeikqcm5n.=  "/Name /F".$Vrs2mt5pfpsv['info']['fontNum']."\n";
        $Ve3oeikqcm5n.=  "/BaseFont /".$Vrs2mt5pfpsv['info']['name']."\n";
  
        if  (isset($Vrs2mt5pfpsv['info']['encodingDictionary'])) {
          
          $Ve3oeikqcm5n.=  "/Encoding ".$Vrs2mt5pfpsv['info']['encodingDictionary']." 0 R\n";
        } else  if  (isset($Vrs2mt5pfpsv['info']['encoding'])) {
          
          $Ve3oeikqcm5n.=  "/Encoding /".$Vrs2mt5pfpsv['info']['encoding']."\n";
        }
  
        if  (isset($Vrs2mt5pfpsv['info']['FirstChar'])) {
          $Ve3oeikqcm5n.=  "/FirstChar ".$Vrs2mt5pfpsv['info']['FirstChar']."\n";
        }
  
        if  (isset($Vrs2mt5pfpsv['info']['LastChar'])) {
          $Ve3oeikqcm5n.=  "/LastChar ".$Vrs2mt5pfpsv['info']['LastChar']."\n";
        }
  
        if  (isset($Vrs2mt5pfpsv['info']['Widths'])) {
          $Ve3oeikqcm5n.=  "/Widths ".$Vrs2mt5pfpsv['info']['Widths']." 0 R\n";
        }
  
        if  (isset($Vrs2mt5pfpsv['info']['FontDescriptor'])) {
          $Ve3oeikqcm5n.=  "/FontDescriptor ".$Vrs2mt5pfpsv['info']['FontDescriptor']." 0 R\n";
        }

        $Ve3oeikqcm5n.=  ">>\n";
        $Ve3oeikqcm5n.=  "endobj";
      }

      return  $Ve3oeikqcm5n;
    }
  }

  
  protected function  o_fontDescriptor($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'fontDescriptor', 'info'=>$Vobxlvad3352);
      break;

    case  'out':
      $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n<< /Type /FontDescriptor\n";
      foreach ($Vrs2mt5pfpsv['info'] as  $Vq04bwg4ulks => $Vf1kwqxxhqpzalue) {
        switch  ($Vq04bwg4ulks) {
        case  'Ascent':
        case  'CapHeight':
        case  'Descent':
        case  'Flags':
        case  'ItalicAngle':
        case  'StemV':
        case  'AvgWidth':
        case  'Leading':
        case  'MaxWidth':
        case  'MissingWidth':
        case  'StemH':
        case  'XHeight':
        case  'CharSet':
          if  (mb_strlen($Vf1kwqxxhqpzalue, '8bit')) {
            $Ve3oeikqcm5n.= "/$Vq04bwg4ulks $Vf1kwqxxhqpzalue\n";
          }

          break;
        case  'FontFile':
        case  'FontFile2':
        case  'FontFile3':
          $Ve3oeikqcm5n.= "/$Vq04bwg4ulks $Vf1kwqxxhqpzalue 0 R\n";
          break;

        case  'FontBBox':
          $Ve3oeikqcm5n.= "/$Vq04bwg4ulks [$Vf1kwqxxhqpzalue[0] $Vf1kwqxxhqpzalue[1] $Vf1kwqxxhqpzalue[2] $Vf1kwqxxhqpzalue[3]]\n";
          break;

        case  'FontName':
          $Ve3oeikqcm5n.= "/$Vq04bwg4ulks /$Vf1kwqxxhqpzalue\n";
          break;
        }
      }

      $Ve3oeikqcm5n.= ">>\nendobj";

      return  $Ve3oeikqcm5n;
    }
  }

  
  protected function  o_fontEncoding($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      
      $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'fontEncoding', 'info'=>$Vobxlvad3352);
      break;

    case  'out':
      $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n<< /Type /Encoding\n";
      if  (!isset($Vrs2mt5pfpsv['info']['encoding'])) {
        $Vrs2mt5pfpsv['info']['encoding'] = 'WinAnsiEncoding';
      }

      if  ($Vrs2mt5pfpsv['info']['encoding'] !== 'none') {
        $Ve3oeikqcm5n.= "/BaseEncoding /".$Vrs2mt5pfpsv['info']['encoding']."\n";
      }

      $Ve3oeikqcm5n.= "/Differences \n[";

      $Vrs2mt5pfpsvnum = -100;

      foreach($Vrs2mt5pfpsv['info']['differences'] as  $Vcgbfu1dtv3l=>$Vq04bwg4ulks) {
        if  ($Vcgbfu1dtv3l != $Vrs2mt5pfpsvnum+1) {
          
          $Ve3oeikqcm5n.=  "\n$Vcgbfu1dtv3l /$Vq04bwg4ulks";
        } else {
          $Ve3oeikqcm5n.=  " /$Vq04bwg4ulks";
        }

        $Vrs2mt5pfpsvnum = $Vcgbfu1dtv3l;
      }

      $Ve3oeikqcm5n.= "\n]\n>>\nendobj";
      return  $Ve3oeikqcm5n;
    }
  }

  
  protected function  o_fontDescendentCID($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      $Veca2om3awughis->objects[$Vwfsll4zanwn] =  array('t'=>'fontDescendentCID', 'info'=>$Vobxlvad3352);

      
      $Vsfskr1dnyyc = ++$Veca2om3awughis->numObj;
      $Veca2om3awughis->o_contents($Vsfskr1dnyyc, 'new', 'raw');
      $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['cidSystemInfo'] = $Vsfskr1dnyyc;
      $Ve3oeikqcm5n=   "<</Registry (Adobe)\n"; 
      $Ve3oeikqcm5n.=  "/Ordering (UCS)\n"; 
      $Ve3oeikqcm5n.=  "/Supplement 0\n"; 
      $Ve3oeikqcm5n.=  ">>";
      $Veca2om3awughis->objects[$Vsfskr1dnyyc]['c'] = $Ve3oeikqcm5n;

      
      $Vnk43efffe5c = ++$Veca2om3awughis->numObj;
      $Veca2om3awughis->o_fontGIDtoCIDMap($Vnk43efffe5c, 'new', $Vobxlvad3352);
      $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['cidToGidMap'] = $Vnk43efffe5c;
      break;

    case  'add':
      foreach ($Vobxlvad3352 as  $V51lf1kcbto4 => $Vf1kwqxxhqpz) {
        switch  ($V51lf1kcbto4) {
        case  'BaseFont':
          $Vrs2mt5pfpsv['info']['name'] =  $Vf1kwqxxhqpz;
          break;

        case  'FirstChar':
        case  'LastChar':
        case  'MissingWidth':
        case  'FontDescriptor':
        case  'SubType':
          $Veca2om3awughis->addMessage("o_fontDescendentCID $V51lf1kcbto4 : $Vf1kwqxxhqpz");
          $Vrs2mt5pfpsv['info'][$V51lf1kcbto4] =  $Vf1kwqxxhqpz;
          break;
        }
      }

      
      $Veca2om3awughis->o_fontGIDtoCIDMap($Vrs2mt5pfpsv['info']['cidToGidMap'], 'add', $Vobxlvad3352);
      break;

    case  'out':
      $Ve3oeikqcm5n =  "\n$Vwfsll4zanwn 0 obj\n";
      $Ve3oeikqcm5n.=  "<</Type /Font\n";
      $Ve3oeikqcm5n.=  "/Subtype /CIDFontType2\n";
      $Ve3oeikqcm5n.=  "/BaseFont /".$Vrs2mt5pfpsv['info']['name']."\n";
      $Ve3oeikqcm5n.=  "/CIDSystemInfo ".$Vrs2mt5pfpsv['info']['cidSystemInfo']." 0 R\n";







      if  (isset($Vrs2mt5pfpsv['info']['FontDescriptor'])) {
        $Ve3oeikqcm5n.=  "/FontDescriptor ".$Vrs2mt5pfpsv['info']['FontDescriptor']." 0 R\n";
      }

      if  (isset($Vrs2mt5pfpsv['info']['MissingWidth'])) {
        $Ve3oeikqcm5n.=  "/DW ".$Vrs2mt5pfpsv['info']['MissingWidth']."\n";
      }

      if  (isset($Vrs2mt5pfpsv['info']['fontFileName']) && isset($Veca2om3awughis->fonts[$Vrs2mt5pfpsv['info']['fontFileName']]['CIDWidths'])) {
        $Vgzafatnat1h = &$Veca2om3awughis->fonts[$Vrs2mt5pfpsv['info']['fontFileName']]['CIDWidths'];
        $Vwsgifrh5ics = '';
        foreach ($Vgzafatnat1h as $Vnk0kpnh4m5c => $Vwsgifrh5icsidth) {
          $Vwsgifrh5ics .= "$Vnk0kpnh4m5c [$Vwsgifrh5icsidth] ";
        }
        $Ve3oeikqcm5n.=  "/W [$Vwsgifrh5ics]\n";
      }

      $Ve3oeikqcm5n.=  "/CIDToGIDMap ".$Vrs2mt5pfpsv['info']['cidToGidMap']." 0 R\n";
      $Ve3oeikqcm5n.=  ">>\n";
      $Ve3oeikqcm5n.=  "endobj";

      return  $Ve3oeikqcm5n;
    }
  }
  
  
  protected function  o_fontGIDtoCIDMap($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      $Veca2om3awughis->objects[$Vwfsll4zanwn] =  array('t'=>'fontGIDtoCIDMap', 'info'=>$Vobxlvad3352);
      break;

    case  'out':
      $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n";
      $V4pn4alajb3u = $Vrs2mt5pfpsv['info']['fontFileName'];
      $Vdln1z2oxpjs = $Veca2om3awughis->fonts[$V4pn4alajb3u]['CIDtoGID'] = base64_decode($Veca2om3awughis->fonts[$V4pn4alajb3u]['CIDtoGID']);
      
      $Vkitq20moyqt = isset($Veca2om3awughis->fonts[$V4pn4alajb3u]['CIDtoGID_Compressed']) &&
                    $Veca2om3awughis->fonts[$V4pn4alajb3u]['CIDtoGID_Compressed'];

      if  (!$Vkitq20moyqt && isset($Vrs2mt5pfpsv['raw'])) {
        $Ve3oeikqcm5n.= $Vdln1z2oxpjs;
      } else {
        $Ve3oeikqcm5n.=  "<<";

        if  (!$Vkitq20moyqt && $Veca2om3awughis->compressionReady && $Veca2om3awughis->options['compression']) {
          
          $Vkitq20moyqt = true;
          $Vdln1z2oxpjs =  gzcompress($Vdln1z2oxpjs,  6);
        }
        if ($Vkitq20moyqt) {
          $Ve3oeikqcm5n.= "\n/Filter /FlateDecode";
        }

        $Ve3oeikqcm5n.= "\n/Length ".mb_strlen($Vdln1z2oxpjs, '8bit') .">>\nstream\n$Vdln1z2oxpjs\nendstream";
      }

      $Ve3oeikqcm5n.= "\nendobj";
      return  $Ve3oeikqcm5n;
    }
  }
  
  
  protected function  o_procset($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'procset', 'info'=>array('PDF'=>1, 'Text'=>1));
      $Veca2om3awughis->o_pages($Veca2om3awughis->currentNode, 'procset', $Vwfsll4zanwn);
      $Veca2om3awughis->procsetObjectId = $Vwfsll4zanwn;
      break;

    case  'add':
      
      
      switch  ($Vobxlvad3352) {
      case  'ImageB':
      case  'ImageC':
      case  'ImageI':
        $Vrs2mt5pfpsv['info'][$Vobxlvad3352] = 1;
        break;
      }
      break;

    case  'out':
      $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n[";
      foreach ($Vrs2mt5pfpsv['info'] as  $Vq04bwg4ulks=>$Vf1kwqxxhqpzal) {
        $Ve3oeikqcm5n.= "/$Vq04bwg4ulks ";
      }
      $Ve3oeikqcm5n.= "]\nendobj";
      return  $Ve3oeikqcm5n;
    }
  }

  
  protected function  o_info($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      $Veca2om3awughis->infoObject = $Vwfsll4zanwn;
      $Vaxg5pf4dhts = 'D:'.@date('Ymd');
      $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'info', 'info'=>array('Creator'=>'R and OS php pdf writer, http://www.ros.co.nz', 'CreationDate'=>$Vaxg5pf4dhts));
      break;
    case  'Title':
    case  'Author':
    case  'Subject':
    case  'Keywords':
    case  'Creator':
    case  'Producer':
    case  'CreationDate':
    case  'ModDate':
    case  'Trapped':
      $Vrs2mt5pfpsv['info'][$Vrrb21ym0qp1] = $Vobxlvad3352;
      break;

    case  'out':
      if  ($Veca2om3awughis->encrypted) {
        $Veca2om3awughis->encryptInit($Vwfsll4zanwn);
      }

      $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n<<\n";
      foreach ($Vrs2mt5pfpsv['info'] as  $V51lf1kcbto4=>$Vf1kwqxxhqpz) {
        $Ve3oeikqcm5n.= "/$V51lf1kcbto4 (";
        
        $V2xbsnapuozj = ($V51lf1kcbto4 === 'CreationDate' || $V51lf1kcbto4 === 'ModDate');
        $V4y0urwpnd3j = $Vf1kwqxxhqpz;

        if  ($Veca2om3awughis->encrypted) {
          $V4y0urwpnd3j = $Veca2om3awughis->ARC4($V4y0urwpnd3j);
        }

        $Ve3oeikqcm5n.= ($V2xbsnapuozj) ? $V4y0urwpnd3j : $Veca2om3awughis->filterText($V4y0urwpnd3j);
        $Ve3oeikqcm5n.= ")\n";
      }

      $Ve3oeikqcm5n.= ">>\nendobj";
      return  $Ve3oeikqcm5n;
    }
  }

  
  protected function  o_action($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      if  (is_array($Vobxlvad3352)) {
        $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'action', 'info'=>$Vobxlvad3352, 'type'=>$Vobxlvad3352['type']);
      } else {
        
        $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'action', 'info'=>$Vobxlvad3352, 'type'=>'URI');
      }
      break;

    case  'out':
      if  ($Veca2om3awughis->encrypted) {
        $Veca2om3awughis->encryptInit($Vwfsll4zanwn);
      }

      $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n<< /Type /Action";
      switch ($Vrs2mt5pfpsv['type']) {
      case  'ilink':
        if (!isset($Veca2om3awughis->destinations[(string)$Vrs2mt5pfpsv['info']['label']])) break;
        
        
        $Ve3oeikqcm5n.= "\n/S /GoTo\n/D ".$Veca2om3awughis->destinations[(string)$Vrs2mt5pfpsv['info']['label']]." 0 R";
        break;

      case  'URI':
        $Ve3oeikqcm5n.= "\n/S /URI\n/URI (";
        if  ($Veca2om3awughis->encrypted) {
          $Ve3oeikqcm5n.= $Veca2om3awughis->filterText($Veca2om3awughis->ARC4($Vrs2mt5pfpsv['info']), true, false);
        } else {
          $Ve3oeikqcm5n.= $Veca2om3awughis->filterText($Vrs2mt5pfpsv['info'], true, false);
        }

        $Ve3oeikqcm5n.= ")";
        break;
      }

      $Ve3oeikqcm5n.= "\n>>\nendobj";
      return  $Ve3oeikqcm5n;
    }
  }

  
  protected function  o_annotation($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      
      $Vdto4swoizsb =  $Veca2om3awughis->currentPage;
      $Veca2om3awughis->o_page($Vdto4swoizsb, 'annot', $Vwfsll4zanwn);

      
      switch ($Vobxlvad3352['type']) {
      case  'link':
        $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'annotation', 'info'=>$Vobxlvad3352);
        $Veca2om3awughis->numObj++;
        $Veca2om3awughis->o_action($Veca2om3awughis->numObj, 'new', $Vobxlvad3352['url']);
        $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['actionId'] = $Veca2om3awughis->numObj;
        break;

      case  'ilink':
        
        $Vq04bwg4ulks =  $Vobxlvad3352['label'];
        $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'annotation', 'info'=>$Vobxlvad3352);
        $Veca2om3awughis->numObj++;
        $Veca2om3awughis->o_action($Veca2om3awughis->numObj, 'new', array('type'=>'ilink', 'label'=>$Vq04bwg4ulks));
        $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['actionId'] = $Veca2om3awughis->numObj;
        break;
      }
      break;

    case  'out':
      $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n<< /Type /Annot";
      switch ($Vrs2mt5pfpsv['info']['type']) {
      case  'link':
      case  'ilink':
        $Ve3oeikqcm5n.=  "\n/Subtype /Link";
        break;
      }
      $Ve3oeikqcm5n.= "\n/A ".$Vrs2mt5pfpsv['info']['actionId']." 0 R";
      $Ve3oeikqcm5n.= "\n/Border [0 0 0]";
      $Ve3oeikqcm5n.= "\n/H /I";
      $Ve3oeikqcm5n.= "\n/Rect [ ";

      foreach($Vrs2mt5pfpsv['info']['rect'] as  $Vf1kwqxxhqpz) {
        $Ve3oeikqcm5n.=  sprintf("%.4F ", $Vf1kwqxxhqpz);
      }

      $Ve3oeikqcm5n.= "]";
      $Ve3oeikqcm5n.= "\n>>\nendobj";
      return  $Ve3oeikqcm5n;
    }
  }

  
  protected function  o_page($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      $Veca2om3awughis->numPages++;
      $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'page', 'info'=>array('parent'=>$Veca2om3awughis->currentNode, 'pageNum'=>$Veca2om3awughis->numPages));

      if  (is_array($Vobxlvad3352)) {
        
        $Vobxlvad3352['id'] = $Vwfsll4zanwn;
        $Veca2om3awughis->o_pages($Veca2om3awughis->currentNode, 'page', $Vobxlvad3352);
      } else {
        $Veca2om3awughis->o_pages($Veca2om3awughis->currentNode, 'page', $Vwfsll4zanwn);
      }

      $Veca2om3awughis->currentPage = $Vwfsll4zanwn;
      
      $Veca2om3awughis->numObj++;
      $Veca2om3awughis->o_contents($Veca2om3awughis->numObj, 'new', $Vwfsll4zanwn);
      $Veca2om3awughis->currentContents = $Veca2om3awughis->numObj;
      $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['contents'] = array();
      $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['contents'][] = $Veca2om3awughis->numObj;

      $Vkvvdnwtmjnq =  ($Veca2om3awughis->numPages%2 ?  'odd' :  'even');
      foreach($Veca2om3awughis->addLooseObjects as  $Vrs2mt5pfpsvId=>$V33moylxy2vn) {
        if  ($V33moylxy2vn === 'all' || $Vkvvdnwtmjnq === $V33moylxy2vn) {
          $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['contents'][] = $Vrs2mt5pfpsvId;
        }
      }
      break;

    case  'content':
      $Vrs2mt5pfpsv['info']['contents'][] = $Vobxlvad3352;
      break;

    case  'annot':
      
      if  (!isset($Vrs2mt5pfpsv['info']['annot'])) {
        $Vrs2mt5pfpsv['info']['annot'] = array();
      }

      
      $Vrs2mt5pfpsv['info']['annot'][] = $Vobxlvad3352;
      break;

    case  'out':
      $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n<< /Type /Page";
      $Ve3oeikqcm5n.= "\n/Parent ".$Vrs2mt5pfpsv['info']['parent']." 0 R";

      if  (isset($Vrs2mt5pfpsv['info']['annot'])) {
        $Ve3oeikqcm5n.= "\n/Annots [";
        foreach($Vrs2mt5pfpsv['info']['annot'] as  $Vihkv1htij0h) {
          $Ve3oeikqcm5n.= " $Vihkv1htij0h 0 R";
        }
        $Ve3oeikqcm5n.= " ]";
      }

      $V4y0urwpnd3jount =  count($Vrs2mt5pfpsv['info']['contents']);
      if  ($V4y0urwpnd3jount == 1) {
        $Ve3oeikqcm5n.= "\n/Contents ".$Vrs2mt5pfpsv['info']['contents'][0]." 0 R";
      } else  if  ($V4y0urwpnd3jount>1) {
        $Ve3oeikqcm5n.= "\n/Contents [\n";

        
        
        
        foreach ($Vrs2mt5pfpsv['info']['contents'] as  $V4y0urwpnd3jId) {
          $Ve3oeikqcm5n.= "$V4y0urwpnd3jId 0 R\n";
        }
        $Ve3oeikqcm5n.= "]";
      }

      $Ve3oeikqcm5n.= "\n>>\nendobj";
      return  $Ve3oeikqcm5n;
    }
  }

  
  protected function  o_contents($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'contents', 'c'=>'', 'info'=>array());
      if  (mb_strlen($Vobxlvad3352, '8bit') &&  intval($Vobxlvad3352)) {
        
        $Veca2om3awughis->objects[$Vwfsll4zanwn]['onPage'] = $Vobxlvad3352;
      } else  if  ($Vobxlvad3352 === 'raw') {
        
        $Veca2om3awughis->objects[$Vwfsll4zanwn]['raw'] = 1;
      }
      break;

    case  'add':
      
      foreach ($Vobxlvad3352 as  $V51lf1kcbto4=>$Vf1kwqxxhqpz) {
        $Vrs2mt5pfpsv['info'][$V51lf1kcbto4] = $Vf1kwqxxhqpz;
      }

    case  'out':
      $Vdln1z2oxpjs = $Vrs2mt5pfpsv['c'];
      $Ve3oeikqcm5n =  "\n$Vwfsll4zanwn 0 obj\n";

      if  (isset($Veca2om3awughis->objects[$Vwfsll4zanwn]['raw'])) {
        $Ve3oeikqcm5n.= $Vdln1z2oxpjs;
      } else {
        $Ve3oeikqcm5n.=  "<<";
        if  ($Veca2om3awughis->compressionReady && $Veca2om3awughis->options['compression']) {
          
          $Ve3oeikqcm5n.= " /Filter /FlateDecode";
          $Vdln1z2oxpjs =  gzcompress($Vdln1z2oxpjs,  6);
        }

        if  ($Veca2om3awughis->encrypted) {
          $Veca2om3awughis->encryptInit($Vwfsll4zanwn);
          $Vdln1z2oxpjs =  $Veca2om3awughis->ARC4($Vdln1z2oxpjs);
        }

        foreach($Vrs2mt5pfpsv['info'] as  $V51lf1kcbto4=>$Vf1kwqxxhqpz) {
          $Ve3oeikqcm5n.=  "\n/$V51lf1kcbto4 $Vf1kwqxxhqpz";
        }

        $Ve3oeikqcm5n.= "\n/Length ".mb_strlen($Vdln1z2oxpjs, '8bit') ." >>\nstream\n$Vdln1z2oxpjs\nendstream";
      }

      $Ve3oeikqcm5n.= "\nendobj";
      return  $Ve3oeikqcm5n;
    }
  }

  protected function  o_embedjs($Vwfsll4zanwn, $Vrrb21ym0qp1, $V4y0urwpnd3jode = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'embedjs', 'info'=>array(
        'Names' => '[(EmbeddedJS) '.($Vwfsll4zanwn+1).' 0 R]'
      ));
      break;

    case  'out':
      $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n<< ";
      foreach($Vrs2mt5pfpsv['info'] as  $V51lf1kcbto4=>$Vf1kwqxxhqpz) {
        $Ve3oeikqcm5n.=  "\n/$V51lf1kcbto4 $Vf1kwqxxhqpz";
      }
      $Ve3oeikqcm5n.= "\n>>\nendobj";
      return  $Ve3oeikqcm5n;
    }
  }
  
  protected function  o_javascript($Vwfsll4zanwn, $Vrrb21ym0qp1, $V4y0urwpnd3jode = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  'new':
      $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'javascript', 'info'=>array(
        'S' => '/JavaScript',
        'JS' => '('.$Veca2om3awughis->filterText($V4y0urwpnd3jode).')',
      ));
      break;

    case  'out':
      $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n<< ";
      foreach($Vrs2mt5pfpsv['info'] as  $V51lf1kcbto4=>$Vf1kwqxxhqpz) {
        $Ve3oeikqcm5n.=  "\n/$V51lf1kcbto4 $Vf1kwqxxhqpz";
      }
      $Ve3oeikqcm5n.= "\n>>\nendobj";
      return  $Ve3oeikqcm5n;
    }
  }

  
  protected function  o_image($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch ($Vrrb21ym0qp1) {
    case  'new':
      
      $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'image', 'data'=>&$Vobxlvad3352['data'], 'info'=>array());
      
      $Vfhiq1lhsojanfo =& $Veca2om3awughis->objects[$Vwfsll4zanwn]['info'];
      
      $Vfhiq1lhsojanfo['Type'] = '/XObject';
      $Vfhiq1lhsojanfo['Subtype'] = '/Image';
      $Vfhiq1lhsojanfo['Width'] = $Vobxlvad3352['iw'];
      $Vfhiq1lhsojanfo['Height'] = $Vobxlvad3352['ih'];
      
      if (isset($Vobxlvad3352['masked']) && $Vobxlvad3352['masked']) {
        $Vfhiq1lhsojanfo['SMask'] = ($Veca2om3awughis->numObj-1).' 0 R';
      }
      
      if  (!isset($Vobxlvad3352['type']) || $Vobxlvad3352['type'] === 'jpg') {
        if  (!isset($Vobxlvad3352['channels'])) {
          $Vobxlvad3352['channels'] = 3;
        }

        switch ($Vobxlvad3352['channels']) {
          case  1: $Vfhiq1lhsojanfo['ColorSpace'] = '/DeviceGray'; break;
          case  4: $Vfhiq1lhsojanfo['ColorSpace'] = '/DeviceCMYK'; break;
          default: $Vfhiq1lhsojanfo['ColorSpace'] = '/DeviceRGB'; break;
        }
        
        if ($Vfhiq1lhsojanfo['ColorSpace'] === '/DeviceCMYK') {
          $Vfhiq1lhsojanfo['Decode'] = '[1 0 1 0 1 0 1 0]';
        }

        $Vfhiq1lhsojanfo['Filter'] = '/DCTDecode';
        $Vfhiq1lhsojanfo['BitsPerComponent'] = 8;
      } 
      
      else if  ($Vobxlvad3352['type'] === 'png') {
        $Vfhiq1lhsojanfo['Filter'] = '/FlateDecode';
        $Vfhiq1lhsojanfo['DecodeParms'] = '<< /Predictor 15 /Colors '.$Vobxlvad3352['ncolor'].' /Columns '.$Vobxlvad3352['iw'].' /BitsPerComponent '.$Vobxlvad3352['bitsPerComponent'].'>>';
      
        if ($Vobxlvad3352['isMask']) {
          $Vfhiq1lhsojanfo['ColorSpace'] = '/DeviceGray';
        }
        else {
          if  (mb_strlen($Vobxlvad3352['pdata'], '8bit')) {
            $Vdln1z2oxpjs =  ' [ /Indexed /DeviceRGB '.(mb_strlen($Vobxlvad3352['pdata'], '8bit') /3-1) .' ';
            $Veca2om3awughis->numObj++;
            $Veca2om3awughis->o_contents($Veca2om3awughis->numObj, 'new');
            $Veca2om3awughis->objects[$Veca2om3awughis->numObj]['c'] = $Vobxlvad3352['pdata'];
            $Vdln1z2oxpjs.= $Veca2om3awughis->numObj.' 0 R';
            $Vdln1z2oxpjs.= ' ]';
            $Vfhiq1lhsojanfo['ColorSpace'] =  $Vdln1z2oxpjs;
            
            if  (isset($Vobxlvad3352['transparency'])) {
              $Vojdkqwg4owo = $Vobxlvad3352['transparency'];
              switch ($Vojdkqwg4owo['type']) {
              case  'indexed':
                $Vdln1z2oxpjs = ' [ '.$Vojdkqwg4owo['data'].' '.$Vojdkqwg4owo['data'].'] ';
                $Vfhiq1lhsojanfo['Mask'] =  $Vdln1z2oxpjs;
                break;
  
              case 'color-key':
                $Vdln1z2oxpjs = ' [ '.
                  $Vojdkqwg4owo['r'] . ' ' . $Vojdkqwg4owo['r'] .
                  $Vojdkqwg4owo['g'] . ' ' . $Vojdkqwg4owo['g'] .
                  $Vojdkqwg4owo['b'] . ' ' . $Vojdkqwg4owo['b'] .
                  ' ] ';
                $Vfhiq1lhsojanfo['Mask'] = $Vdln1z2oxpjs;
                break;
              }
            }
          } else {
            if  (isset($Vobxlvad3352['transparency'])) {
              $Vojdkqwg4owo = $Vobxlvad3352['transparency'];
              
              switch ($Vojdkqwg4owo['type']) {
              case  'indexed':
                $Vdln1z2oxpjs = ' [ '.$Vojdkqwg4owo['data'].' '.$Vojdkqwg4owo['data'].'] ';
                $Vfhiq1lhsojanfo['Mask'] =  $Vdln1z2oxpjs;
                break;
  
              case 'color-key':
                $Vdln1z2oxpjs = ' [ '.
                  $Vojdkqwg4owo['r'] . ' ' . $Vojdkqwg4owo['r'] . ' ' .
                  $Vojdkqwg4owo['g'] . ' ' . $Vojdkqwg4owo['g'] . ' ' .
                  $Vojdkqwg4owo['b'] . ' ' . $Vojdkqwg4owo['b'] .
                  ' ] ';
                $Vfhiq1lhsojanfo['Mask'] = $Vdln1z2oxpjs;
                break;
              }
            }
            $Vfhiq1lhsojanfo['ColorSpace'] = '/'.$Vobxlvad3352['color'];
          }
        }
        
        $Vfhiq1lhsojanfo['BitsPerComponent'] = $Vobxlvad3352['bitsPerComponent'];
      }

      
      
      $Veca2om3awughis->o_pages($Veca2om3awughis->currentNode, 'xObject', array('label'=>$Vobxlvad3352['label'], 'objNum'=>$Vwfsll4zanwn));

      
      $Veca2om3awughis->o_procset($Veca2om3awughis->procsetObjectId, 'add', 'ImageC');
      break;

    case  'out':
      $Vdln1z2oxpjs = &$Vrs2mt5pfpsv['data'];
      $Ve3oeikqcm5n =  "\n$Vwfsll4zanwn 0 obj\n<<";

      foreach($Vrs2mt5pfpsv['info'] as  $V51lf1kcbto4=>$Vf1kwqxxhqpz) {
        $Ve3oeikqcm5n.= "\n/$V51lf1kcbto4 $Vf1kwqxxhqpz";
      }

      if  ($Veca2om3awughis->encrypted) {
        $Veca2om3awughis->encryptInit($Vwfsll4zanwn);
        $Vdln1z2oxpjs =  $Veca2om3awughis->ARC4($Vdln1z2oxpjs);
      }

      $Ve3oeikqcm5n.= "\n/Length ".mb_strlen($Vdln1z2oxpjs, '8bit') .">>\nstream\n$Vdln1z2oxpjs\nendstream\nendobj";

      return  $Ve3oeikqcm5n;
    }
  }

  
  protected function  o_extGState($Vwfsll4zanwn,  $Vrrb21ym0qp1,  $Vobxlvad3352 = "") {
    static  $Vf1kwqxxhqpzalid_params =  array("LW",  "LC",  "LC",  "LJ",  "ML",
                                   "D",  "RI",  "OP",  "op",  "OPM",
                                   "Font",  "BG",  "BG2",  "UCR",
                                   "TR",  "TR2",  "HT",  "FL",
                                   "SM",  "SA",  "BM",  "SMask",
                                   "CA",  "ca",  "AIS",  "TK");

    if  ($Vrrb21ym0qp1 !==  "new") {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch  ($Vrrb21ym0qp1) {
    case  "new":
      $Veca2om3awughis->objects[$Vwfsll4zanwn] =  array('t' => 'extGState',  'info' => $Vobxlvad3352);

      
      $Veca2om3awughis->numStates++;
      $Veca2om3awughis->o_pages($Veca2om3awughis->currentNode,  'extGState',  array("objNum" => $Vwfsll4zanwn,  "stateNum" => $Veca2om3awughis->numStates));
      break;

    case  "out":
      $Ve3oeikqcm5n = "\n$Vwfsll4zanwn 0 obj\n<< /Type /ExtGState\n";

      foreach ($Vrs2mt5pfpsv["info"] as  $V51lf1kcbto4 => $Vf1kwqxxhqpz) {
        if  ( !in_array($V51lf1kcbto4, $Vf1kwqxxhqpzalid_params))
          continue;
        $Ve3oeikqcm5n.=  "/$V51lf1kcbto4 $Vf1kwqxxhqpz\n";
      }

      $Ve3oeikqcm5n.= ">>\nendobj";
      return  $Ve3oeikqcm5n;
    }
  }

  
  protected function  o_encryption($Vwfsll4zanwn, $Vrrb21ym0qp1, $Vobxlvad3352 = '') {
    if  ($Vrrb21ym0qp1 !== 'new') {
      $Vrs2mt5pfpsv = & $Veca2om3awughis->objects[$Vwfsll4zanwn];
    }

    switch ($Vrrb21ym0qp1) {
    case  'new':
      
      $Veca2om3awughis->objects[$Vwfsll4zanwn] = array('t'=>'encryption', 'info'=>$Vobxlvad3352);
      $Veca2om3awughis->arc4_objnum = $Vwfsll4zanwn;

      
      $Vyjfi2slrwkp =  chr(0x28) .chr(0xBF) .chr(0x4E) .chr(0x5E) .chr(0x4E) .chr(0x75) .chr(0x8A) .chr(0x41)
             .chr(0x64) .chr(0x00) .chr(0x4E) .chr(0x56) .chr(0xFF) .chr(0xFA) .chr(0x01) .chr(0x08)
             .chr(0x2E) .chr(0x2E) .chr(0x00) .chr(0xB6) .chr(0xD0) .chr(0x68) .chr(0x3E) .chr(0x80)
             .chr(0x2F) .chr(0x0C) .chr(0xA9) .chr(0xFE) .chr(0x64) .chr(0x53) .chr(0x69) .chr(0x7A);
             
      $Vtojwsl3m1uw =  mb_strlen($Vobxlvad3352['owner'], '8bit');

      if  ($Vtojwsl3m1uw>32) {
        $Vrs2mt5pfpsvwner =  substr($Vobxlvad3352['owner'], 0, 32);
      } else  if  ($Vtojwsl3m1uw<32) {
        $Vrs2mt5pfpsvwner =  $Vobxlvad3352['owner'].substr($Vyjfi2slrwkp, 0, 32-$Vtojwsl3m1uw);
      } else {
        $Vrs2mt5pfpsvwner =  $Vobxlvad3352['owner'];
      }

      $Vtojwsl3m1uw =  mb_strlen($Vobxlvad3352['user'], '8bit');
      if  ($Vtojwsl3m1uw>32) {
        $Vbt51zuiztyf =  substr($Vobxlvad3352['user'], 0, 32);
      } else  if  ($Vtojwsl3m1uw<32) {
        $Vbt51zuiztyf =  $Vobxlvad3352['user'].substr($Vyjfi2slrwkp, 0, 32-$Vtojwsl3m1uw);
      } else {
        $Vbt51zuiztyf =  $Vobxlvad3352['user'];
      }

      $Vdln1z2oxpjs =  $Veca2om3awughis->md5_16($Vrs2mt5pfpsvwner);
      $Vrs2mt5pfpsvkey =  substr($Vdln1z2oxpjs, 0, 5);
      $Veca2om3awughis->ARC4_init($Vrs2mt5pfpsvkey);
      $Vrs2mt5pfpsvvalue = $Veca2om3awughis->ARC4($Vbt51zuiztyf);
      $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['O'] = $Vrs2mt5pfpsvvalue;

      
      $Vdln1z2oxpjs =  $Veca2om3awughis->md5_16($Vbt51zuiztyf.$Vrs2mt5pfpsvvalue.chr($Vobxlvad3352['p']) .chr(255) .chr(255) .chr(255) .$Veca2om3awughis->fileIdentifier);

      $Vjfbtezuw20h =  substr($Vdln1z2oxpjs, 0, 5);
      $Veca2om3awughis->ARC4_init($Vjfbtezuw20h);
      $Veca2om3awughis->encryptionKey =  $Vjfbtezuw20h;
      $Veca2om3awughis->encrypted = true;
      $V04tbpg3f54e = $Veca2om3awughis->ARC4($Vyjfi2slrwkp);
      $Veca2om3awughis->objects[$Vwfsll4zanwn]['info']['U'] = $V04tbpg3f54e;
      $Veca2om3awughis->encryptionKey = $Vjfbtezuw20h;
      
      break;

    case  'out':
      $Ve3oeikqcm5n =  "\n$Vwfsll4zanwn 0 obj\n<<";
      $Ve3oeikqcm5n.= "\n/Filter /Standard";
      $Ve3oeikqcm5n.= "\n/V 1";
      $Ve3oeikqcm5n.= "\n/R 2";
      $Ve3oeikqcm5n.= "\n/O (".$Veca2om3awughis->filterText($Vrs2mt5pfpsv['info']['O'], true, false) .')';
      $Ve3oeikqcm5n.= "\n/U (".$Veca2om3awughis->filterText($Vrs2mt5pfpsv['info']['U'], true, false) .')';
      
      $Vrs2mt5pfpsv['info']['p'] =  (($Vrs2mt5pfpsv['info']['p']^255) +1) *-1;
      $Ve3oeikqcm5n.= "\n/P ".($Vrs2mt5pfpsv['info']['p']);
      $Ve3oeikqcm5n.= "\n>>\nendobj";
      return  $Ve3oeikqcm5n;
    }
  }

  

  
  function md5_16($Vlkger5ehs4w) {
    $Vdln1z2oxpjs =  md5($Vlkger5ehs4w);
    $Vrs2mt5pfpsvut = '';
    for  ($Vfhiq1lhsoja = 0;$Vfhiq1lhsoja <= 30;$Vfhiq1lhsoja = $Vfhiq1lhsoja+2) {
      $Vrs2mt5pfpsvut.= chr(hexdec(substr($Vdln1z2oxpjs, $Vfhiq1lhsoja, 2)));
    }
    return  $Vrs2mt5pfpsvut;
  }

  
  function encryptInit($Vwfsll4zanwn) {
    $Vdln1z2oxpjs =  $Veca2om3awughis->encryptionKey;
    $V0o3f1vps5ku =  dechex($Vwfsll4zanwn);
    if  (mb_strlen($V0o3f1vps5ku, '8bit') <6) {
      $V0o3f1vps5ku =  substr('000000', 0, 6-mb_strlen($V0o3f1vps5ku, '8bit')) .$V0o3f1vps5ku;
    }
    $Vdln1z2oxpjs.=  chr(hexdec(substr($V0o3f1vps5ku, 4, 2))) .chr(hexdec(substr($V0o3f1vps5ku, 2, 2))) .chr(hexdec(substr($V0o3f1vps5ku, 0, 2))) .chr(0) .chr(0);
    $V51lf1kcbto4ey =  $Veca2om3awughis->md5_16($Vdln1z2oxpjs);
    $Veca2om3awughis->ARC4_init(substr($V51lf1kcbto4ey, 0, 10));
  }

  
  function ARC4_init($V51lf1kcbto4ey = '') {
    $Veca2om3awughis->arc4 =  '';

    
    if  (mb_strlen($V51lf1kcbto4ey, '8bit') == 0) {
      return;
    }

    $V51lf1kcbto4 =  '';
    while (mb_strlen($V51lf1kcbto4, '8bit') <256) {
      $V51lf1kcbto4.= $V51lf1kcbto4ey;
    }

    $V51lf1kcbto4 = substr($V51lf1kcbto4, 0, 256);
    for  ($Vfhiq1lhsoja = 0;$Vfhiq1lhsoja<256;$Vfhiq1lhsoja++) {
      $Veca2om3awughis->arc4.=  chr($Vfhiq1lhsoja);
    }

    $Vzmnqyqjjodw = 0;

    for  ($Vfhiq1lhsoja = 0;$Vfhiq1lhsoja<256;$Vfhiq1lhsoja++) {
      $Veca2om3awug =  $Veca2om3awughis->arc4[$Vfhiq1lhsoja];
      $Vzmnqyqjjodw =  ($Vzmnqyqjjodw + ord($Veca2om3awug)  + ord($V51lf1kcbto4[$Vfhiq1lhsoja])) %256;
      $Veca2om3awughis->arc4[$Vfhiq1lhsoja] = $Veca2om3awughis->arc4[$Vzmnqyqjjodw];
      $Veca2om3awughis->arc4[$Vzmnqyqjjodw] = $Veca2om3awug;
    }
  }

  
  function ARC4($Veca2om3awugext) {
    $Vtojwsl3m1uw = mb_strlen($Veca2om3awugext, '8bit');
    $Vi3y3l1uvwp3 = 0;
    $V4t3fwdd3eev = 0;
    $V4y0urwpnd3j =  $Veca2om3awughis->arc4;
    $Vrs2mt5pfpsvut = '';
    for  ($Vfhiq1lhsoja = 0;$Vfhiq1lhsoja<$Vtojwsl3m1uw;$Vfhiq1lhsoja++) {
      $Vi3y3l1uvwp3 =  ($Vi3y3l1uvwp3+1) %256;
      $Veca2om3awug =  $V4y0urwpnd3j[$Vi3y3l1uvwp3];
      $V4t3fwdd3eev =  ($V4t3fwdd3eev+ord($Veca2om3awug)) %256;
      $V4y0urwpnd3j[$Vi3y3l1uvwp3] = $V4y0urwpnd3j[$V4t3fwdd3eev];
      $V4y0urwpnd3j[$V4t3fwdd3eev] = $Veca2om3awug;
      $V51lf1kcbto4 =  ord($V4y0urwpnd3j[(ord($V4y0urwpnd3j[$Vi3y3l1uvwp3]) +ord($V4y0urwpnd3j[$V4t3fwdd3eev])) %256]);
      $Vrs2mt5pfpsvut.= chr(ord($Veca2om3awugext[$Vfhiq1lhsoja])  ^ $V51lf1kcbto4);
    }
    return  $Vrs2mt5pfpsvut;
  }

  

  
  function addLink($Vbfatyoohaps, $Vgakxvf4uk1n, $Vpk1vzeab1mp, $Vkiv1idvekdh, $Vj45ukmrparq) {
    $Veca2om3awughis->numObj++;
    $Vfhiq1lhsojanfo =  array('type'=>'link', 'url'=>$Vbfatyoohaps, 'rect'=>array($Vgakxvf4uk1n, $Vpk1vzeab1mp, $Vkiv1idvekdh, $Vj45ukmrparq));
    $Veca2om3awughis->o_annotation($Veca2om3awughis->numObj, 'new', $Vfhiq1lhsojanfo);
  }

  
  function addInternalLink($Vq04bwg4ulks, $Vgakxvf4uk1n, $Vpk1vzeab1mp, $Vkiv1idvekdh, $Vj45ukmrparq) {
    $Veca2om3awughis->numObj++;
    $Vfhiq1lhsojanfo =  array('type'=>'ilink', 'label'=>$Vq04bwg4ulks, 'rect'=>array($Vgakxvf4uk1n, $Vpk1vzeab1mp, $Vkiv1idvekdh, $Vj45ukmrparq));
    $Veca2om3awughis->o_annotation($Veca2om3awughis->numObj, 'new', $Vfhiq1lhsojanfo);
  }

  
  function setEncryption($Vbt51zuiztyfPass = '', $Vrs2mt5pfpsvwnerPass = '', $Vu4abmhttf5j = array()) {
    $Vzqw0ieauwu4 = bindec("11000000");

    $Vobxlvad3352 =  array('print'=>4, 'modify'=>8, 'copy'=>16, 'add'=>32);

    foreach($Vu4abmhttf5j as  $V51lf1kcbto4=>$Vf1kwqxxhqpz) {
      if  ($Vf1kwqxxhqpz &&  isset($Vobxlvad3352[$V51lf1kcbto4])) {
        $Vzqw0ieauwu4+= $Vobxlvad3352[$V51lf1kcbto4];
      } else  if  (isset($Vobxlvad3352[$Vf1kwqxxhqpz])) {
        $Vzqw0ieauwu4+= $Vobxlvad3352[$Vf1kwqxxhqpz];
      }
    }

    
    if  ($Veca2om3awughis->arc4_objnum ==  0) {
      
      $Veca2om3awughis->numObj++;
      if  (mb_strlen($Vrs2mt5pfpsvwnerPass) == 0) {
        $Vrs2mt5pfpsvwnerPass = $Vbt51zuiztyfPass;
      }

      $Veca2om3awughis->o_encryption($Veca2om3awughis->numObj, 'new', array('user'=>$Vbt51zuiztyfPass, 'owner'=>$Vrs2mt5pfpsvwnerPass, 'p'=>$Vzqw0ieauwu4));
    }
  }

  
  function checkAllHere() {
  }

  
  function output($V01yhzbgix2k = false) {
    if  ($V01yhzbgix2k) {
      
      $Veca2om3awughis->options['compression'] = false;
    }
    
    if ($Veca2om3awughis->javascript) {
      $Veca2om3awughis->numObj++;
      
      $Vzmnqyqjjodws_id = $Veca2om3awughis->numObj;
      $Veca2om3awughis->o_embedjs($Vzmnqyqjjodws_id, 'new');
      $Veca2om3awughis->o_javascript(++$Veca2om3awughis->numObj, 'new', $Veca2om3awughis->javascript);
      
      $Vwfsll4zanwn =  $Veca2om3awughis->catalogId;
      
      $Veca2om3awughis->o_catalog($Vwfsll4zanwn, 'javascript', $Vzmnqyqjjodws_id);
    }

    if  ($Veca2om3awughis->arc4_objnum) {
      $Veca2om3awughis->ARC4_init($Veca2om3awughis->encryptionKey);
    }

    $Veca2om3awughis->checkAllHere();


    $V1f3yzh1eyox = array();
    $V4y0urwpnd3jontent = '%PDF-1.3';
    $Vzqw0ieauwu4os = mb_strlen($V4y0urwpnd3jontent, '8bit');

    foreach($Veca2om3awughis->objects as  $V51lf1kcbto4=>$Vf1kwqxxhqpz) {
      $Vdln1z2oxpjs = 'o_'.$Vf1kwqxxhqpz['t'];
      $V4y0urwpnd3jont = $Veca2om3awughis->$Vdln1z2oxpjs($V51lf1kcbto4, 'out');
      $V4y0urwpnd3jontent.= $V4y0urwpnd3jont;
      $V1f3yzh1eyox[] = $Vzqw0ieauwu4os;
      $Vzqw0ieauwu4os+= mb_strlen($V4y0urwpnd3jont, '8bit');
    }

    $V4y0urwpnd3jontent.= "\nxref\n0 ".(count($V1f3yzh1eyox) +1) ."\n0000000000 65535 f \n";

    foreach($V1f3yzh1eyox as  $Vzqw0ieauwu4) {
      $V4y0urwpnd3jontent.= str_pad($Vzqw0ieauwu4,  10,  "0",  STR_PAD_LEFT)  . " 00000 n \n";
    }

    $V4y0urwpnd3jontent.= "trailer\n<<\n/Size ".(count($V1f3yzh1eyox) +1) ."\n/Root 1 0 R\n/Info $Veca2om3awughis->infoObject 0 R\n";

    
    if  ($Veca2om3awughis->arc4_objnum > 0) {
      $V4y0urwpnd3jontent.=  "/Encrypt $Veca2om3awughis->arc4_objnum 0 R\n";
    }

    if  (mb_strlen($Veca2om3awughis->fileIdentifier, '8bit')) {
      $V4y0urwpnd3jontent.=  "/ID[<$Veca2om3awughis->fileIdentifier><$Veca2om3awughis->fileIdentifier>]\n";
    }

    $V4y0urwpnd3jontent.=  ">>\nstartxref\n$Vzqw0ieauwu4os\n%%EOF\n";

    return  $V4y0urwpnd3jontent;
  }

  
  function newDocument($Vk3kprxxf2wm = array(0, 0, 612, 792)) {
    $Veca2om3awughis->numObj = 0;
    $Veca2om3awughis->objects =  array();

    $Veca2om3awughis->numObj++;
    $Veca2om3awughis->o_catalog($Veca2om3awughis->numObj, 'new');

    $Veca2om3awughis->numObj++;
    $Veca2om3awughis->o_outlines($Veca2om3awughis->numObj, 'new');

    $Veca2om3awughis->numObj++;
    $Veca2om3awughis->o_pages($Veca2om3awughis->numObj, 'new');

    $Veca2om3awughis->o_pages($Veca2om3awughis->numObj, 'mediaBox', $Vk3kprxxf2wm);
    $Veca2om3awughis->currentNode =  3;

    $Veca2om3awughis->numObj++;
    $Veca2om3awughis->o_procset($Veca2om3awughis->numObj, 'new');

    $Veca2om3awughis->numObj++;
    $Veca2om3awughis->o_info($Veca2om3awughis->numObj, 'new');

    $Veca2om3awughis->numObj++;
    $Veca2om3awughis->o_page($Veca2om3awughis->numObj, 'new');

    
    
    $Veca2om3awughis->firstPageId =  $Veca2om3awughis->currentContents;
  }

  
  function openFont($Vj0kojsfk0h3) {
    
    $Vzqw0ieauwu4os = strrpos($Vj0kojsfk0h3, '/');

    if  ($Vzqw0ieauwu4os === false) {
      $Vgxxrah4zcfh =  './';
      $Vcvluzjs3wzb =  $Vj0kojsfk0h3;
    } else {
      $Vgxxrah4zcfh = substr($Vj0kojsfk0h3, 0, $Vzqw0ieauwu4os+1);
      $Vcvluzjs3wzb = substr($Vj0kojsfk0h3, $Vzqw0ieauwu4os+1);
    }
    
    $Vpfhhm5z1azm = $Veca2om3awughis->fontcache;
    if ($Vpfhhm5z1azm == '') {
      $Vpfhhm5z1azm = $Vgxxrah4zcfh;
    }
    
    
    
    
    
    
    
    $Veca2om3awughis->addMessage("openFont: $Vj0kojsfk0h3 - $Vcvluzjs3wzb");

    if ( !$Veca2om3awughis->isUnicode || in_array(mb_strtolower(basename($Vcvluzjs3wzb)), self::$Vythn5boec34) ) {
      $Vwkhyrjkglir = "$Vcvluzjs3wzb.afm";
    }
    else {
      $Vwkhyrjkglir = "$Vcvluzjs3wzb.ufm";
    }
    
    $V4y0urwpnd3jache_name = "$Vwkhyrjkglir.php";
    $Veca2om3awughis->addMessage("metrics: $Vwkhyrjkglir, cache: $V4y0urwpnd3jache_name");
    
    if  (file_exists($Vpfhhm5z1azm . $V4y0urwpnd3jache_name)) {
      $Veca2om3awughis->addMessage("openFont: php file exists $Vpfhhm5z1azm$V4y0urwpnd3jache_name");
      $Veca2om3awughis->fonts[$Vj0kojsfk0h3] = require($Vpfhhm5z1azm . $V4y0urwpnd3jache_name);

      if  (!isset($Veca2om3awughis->fonts[$Vj0kojsfk0h3]['_version_']) ||  $Veca2om3awughis->fonts[$Vj0kojsfk0h3]['_version_'] != $Veca2om3awughis->fontcacheVersion) {
        
        $Veca2om3awughis->addMessage('openFont: clear out, make way for new version.');
        $Veca2om3awughis->fonts[$Vj0kojsfk0h3] = null;
        unset($Veca2om3awughis->fonts[$Vj0kojsfk0h3]);
      }
    }
    else {
      $Vrs2mt5pfpsvld_cache_name = "php_$Vwkhyrjkglir";
      if (file_exists($Vpfhhm5z1azm . $Vrs2mt5pfpsvld_cache_name)) {
        $Veca2om3awughis->addMessage("openFont: php file doesn't exist $Vpfhhm5z1azm$V4y0urwpnd3jache_name, creating it from the old format");
        $Vrs2mt5pfpsvld_cache = file_get_contents($Vpfhhm5z1azm . $Vrs2mt5pfpsvld_cache_name);
        file_put_contents($Vpfhhm5z1azm . $V4y0urwpnd3jache_name, '<?php return ' . $Vrs2mt5pfpsvld_cache . ';');
        return $Veca2om3awughis->openFont($Vj0kojsfk0h3);
      }
    }

    if  (!isset($Veca2om3awughis->fonts[$Vj0kojsfk0h3]) &&  file_exists($Vgxxrah4zcfh . $Vwkhyrjkglir)) {
      
      $Veca2om3awughis->addMessage("openFont: build php file from $Vgxxrah4zcfh$Vwkhyrjkglir");
      $Vou4vxorrdoe =  array();
      
      
      $Vou4vxorrdoe['codeToName'] = array(); 
      
      
      
      $Vou4vxorrdoe['isUnicode'] = (strtolower(substr($Vwkhyrjkglir, -3)) !== 'afm');
      
      $Vnk0kpnh4m5ctogid = '';
      if ($Vou4vxorrdoe['isUnicode']) {
        $Vnk0kpnh4m5ctogid = str_pad('', 256*256*2, "\x00");
      }

      $Vg5mhfl1beoi =  file($Vgxxrah4zcfh . $Vwkhyrjkglir);

      foreach ($Vg5mhfl1beoi as  $Vvdtiexy4pps) {
        $Vexbtekafkvl = trim($Vvdtiexy4pps);
        $Vzqw0ieauwu4os = strpos($Vexbtekafkvl, ' ');

        if  ($Vzqw0ieauwu4os) {
          
          $V51lf1kcbto4ey =  substr($Vexbtekafkvl, 0, $Vzqw0ieauwu4os);
          switch  ($V51lf1kcbto4ey) {
          case  'FontName':
          case  'FullName':
          case  'FamilyName':
          case  'PostScriptName':
          case  'Weight':
          case  'ItalicAngle':
          case  'IsFixedPitch':
          case  'CharacterSet':
          case  'UnderlinePosition':
          case  'UnderlineThickness':
          case  'Version':
          case  'EncodingScheme':
          case  'CapHeight':
          case  'XHeight':
          case  'Ascender':
          case  'Descender':
          case  'StdHW':
          case  'StdVW':
          case  'StartCharMetrics':
          case  'FontHeightOffset': 
            $Vou4vxorrdoe[$V51lf1kcbto4ey] = trim(substr($Vexbtekafkvl, $Vzqw0ieauwu4os));
            break;

          case  'FontBBox':
            $Vou4vxorrdoe[$V51lf1kcbto4ey] = explode(' ', trim(substr($Vexbtekafkvl, $Vzqw0ieauwu4os)));
            break;

          
          case  'C': 
            $V4t3fwdd3eevits = explode(';', trim($Vexbtekafkvl));
            $V2yo0qvlvyby = array();

            foreach($V4t3fwdd3eevits as  $V4t3fwdd3eevit) {
              $V4t3fwdd3eevits2 =  explode(' ', trim($V4t3fwdd3eevit));
              if  (mb_strlen($V4t3fwdd3eevits2[0], '8bit') == 0) continue;
              
              if  (count($V4t3fwdd3eevits2) >2) {
                $V2yo0qvlvyby[$V4t3fwdd3eevits2[0]] = array();
                for  ($Vfhiq1lhsoja = 1;$Vfhiq1lhsoja<count($V4t3fwdd3eevits2);$Vfhiq1lhsoja++) {
                  $V2yo0qvlvyby[$V4t3fwdd3eevits2[0]][] = $V4t3fwdd3eevits2[$Vfhiq1lhsoja];
                }
              } else  if  (count($V4t3fwdd3eevits2) == 2) {
                $V2yo0qvlvyby[$V4t3fwdd3eevits2[0]] = $V4t3fwdd3eevits2[1];
              }
            }

            $V4y0urwpnd3j = (int)$V2yo0qvlvyby['C'];
            $Vmwwo1qnmepz = $V2yo0qvlvyby['N'];
            $Vwsgifrh5icsidth = floatval($V2yo0qvlvyby['WX']);
            
            if  ($V4y0urwpnd3j >= 0) {
              if ($V4y0urwpnd3j != hexdec($Vmwwo1qnmepz)) {
                $Vou4vxorrdoe['codeToName'][$V4y0urwpnd3j] = $Vmwwo1qnmepz;
              }
              $Vou4vxorrdoe['C'][$V4y0urwpnd3j] = $Vwsgifrh5icsidth;
            } else {
              $Vou4vxorrdoe['C'][$Vmwwo1qnmepz] = $Vwsgifrh5icsidth;
            }

            if  (!isset($Vou4vxorrdoe['MissingWidth']) && $V4y0urwpnd3j == -1 && $Vmwwo1qnmepz === '.notdef') {
              $Vou4vxorrdoe['MissingWidth'] = $Vwsgifrh5icsidth;
            }
            
            break;

          
          case  'U': 
            if (!$Vou4vxorrdoe['isUnicode']) break;
            
            $V4t3fwdd3eevits = explode(';', trim($Vexbtekafkvl));
            $V2yo0qvlvyby = array();

            foreach($V4t3fwdd3eevits as  $V4t3fwdd3eevit) {
              $V4t3fwdd3eevits2 =  explode(' ', trim($V4t3fwdd3eevit));
              if  (mb_strlen($V4t3fwdd3eevits2[0], '8bit') === 0) continue;
              
              if  (count($V4t3fwdd3eevits2) >2) {
                $V2yo0qvlvyby[$V4t3fwdd3eevits2[0]] = array();
                for  ($Vfhiq1lhsoja = 1;$Vfhiq1lhsoja<count($V4t3fwdd3eevits2);$Vfhiq1lhsoja++) {
                  $V2yo0qvlvyby[$V4t3fwdd3eevits2[0]][] = $V4t3fwdd3eevits2[$Vfhiq1lhsoja];
                }
              } else  if  (count($V4t3fwdd3eevits2) == 2) {
                $V2yo0qvlvyby[$V4t3fwdd3eevits2[0]] = $V4t3fwdd3eevits2[1];
              }
            }

            $V4y0urwpnd3j = (int)$V2yo0qvlvyby['U'];
            $Vmwwo1qnmepz = $V2yo0qvlvyby['N'];
            $V3vex210v0ot = $V2yo0qvlvyby['G'];
            $Vwsgifrh5icsidth = floatval($V2yo0qvlvyby['WX']);
            
            if  ($V4y0urwpnd3j >= 0) {
              
              if ($V4y0urwpnd3j >= 0 && $V4y0urwpnd3j < 0xFFFF && $V3vex210v0ot) {
                $Vnk0kpnh4m5ctogid[$V4y0urwpnd3j*2] = chr($V3vex210v0ot >> 8);
                $Vnk0kpnh4m5ctogid[$V4y0urwpnd3j*2 + 1] = chr($V3vex210v0ot & 0xFF);
              }
            
              if ($V4y0urwpnd3j != hexdec($Vmwwo1qnmepz)) {
                $Vou4vxorrdoe['codeToName'][$V4y0urwpnd3j] = $Vmwwo1qnmepz;
              }
              $Vou4vxorrdoe['C'][$V4y0urwpnd3j] = $Vwsgifrh5icsidth;
            } else {
              $Vou4vxorrdoe['C'][$Vmwwo1qnmepz] = $Vwsgifrh5icsidth;
            }
            
            if  (!isset($Vou4vxorrdoe['MissingWidth']) && $V4y0urwpnd3j == -1 && $Vmwwo1qnmepz === '.notdef') {
              $Vou4vxorrdoe['MissingWidth'] = $Vwsgifrh5icsidth;
            }
              
            break;

          case  'KPX':
            break; 
            
            $V4t3fwdd3eevits = explode(' ', trim($Vexbtekafkvl));
            $Vou4vxorrdoe['KPX'][$V4t3fwdd3eevits[1]][$V4t3fwdd3eevits[2]] = $V4t3fwdd3eevits[3];
            break;
          }
        }
      }

      
      if  ($Veca2om3awughis->compressionReady && $Veca2om3awughis->options['compression']) {
        
        $Vou4vxorrdoe['CIDtoGID_Compressed'] = true;
        $Vnk0kpnh4m5ctogid =  gzcompress($Vnk0kpnh4m5ctogid,  6);
      }
      $Vou4vxorrdoe['CIDtoGID'] = base64_encode($Vnk0kpnh4m5ctogid);
      $Vou4vxorrdoe['_version_'] = $Veca2om3awughis->fontcacheVersion;
      $Veca2om3awughis->fonts[$Vj0kojsfk0h3] = $Vou4vxorrdoe;

      
      
      if ( is_dir(substr($Vpfhhm5z1azm,0,-1)) && is_writable(substr($Vpfhhm5z1azm,0,-1)) ) {
        file_put_contents($Vpfhhm5z1azm . $V4y0urwpnd3jache_name, '<?php return ' . var_export($Vou4vxorrdoe,  true) . ';');
      }
      $Vou4vxorrdoe = null;
    }
    
    if  (!isset($Veca2om3awughis->fonts[$Vj0kojsfk0h3])) {
      $Veca2om3awughis->addMessage("openFont: no font file found for $Vj0kojsfk0h3.  Do you need to run load_font.php?");
      
    }

    
  }

  
  function selectFont($Vj0kojsfk0h3Name, $V5mmmrje2ymm =  '', $Vvmpxrxft21r =  true) {
    $Vlm5xu0g5cn3 = substr($Vj0kojsfk0h3Name, -4);
    if  ($Vlm5xu0g5cn3 === '.afm' || $Vlm5xu0g5cn3 === '.ufm') {
      $Vj0kojsfk0h3Name = substr($Vj0kojsfk0h3Name, 0, mb_strlen($Vj0kojsfk0h3Name)-4);
    }

    if  (!isset($Veca2om3awughis->fonts[$Vj0kojsfk0h3Name])) {
      $Veca2om3awughis->addMessage("selectFont: selecting - $Vj0kojsfk0h3Name - $V5mmmrje2ymm, $Vvmpxrxft21r");

      
      $Veca2om3awughis->openFont($Vj0kojsfk0h3Name);

      if  (isset($Veca2om3awughis->fonts[$Vj0kojsfk0h3Name])) {
        $Veca2om3awughis->numObj++;
        $Veca2om3awughis->numFonts++;
    
        $Vj0kojsfk0h3 = &$Veca2om3awughis->fonts[$Vj0kojsfk0h3Name];

        
        $Vzqw0ieauwu4os =  strrpos($Vj0kojsfk0h3Name, '/');
        
        $Vcvluzjs3wzb =  substr($Vj0kojsfk0h3Name, $Vzqw0ieauwu4os+1);
        $Vobxlvad3352 =  array('name' => $Vcvluzjs3wzb, 'fontFileName' => $Vj0kojsfk0h3Name);

        if  (is_array($V5mmmrje2ymm)) {
          
          if  (isset($V5mmmrje2ymm['encoding'])) {
            $Vobxlvad3352['encoding'] =  $V5mmmrje2ymm['encoding'];
          }

          if  (isset($V5mmmrje2ymm['differences'])) {
            $Vobxlvad3352['differences'] =  $V5mmmrje2ymm['differences'];
          }
        } else  if  (mb_strlen($V5mmmrje2ymm, '8bit')) {
          
          $Vobxlvad3352['encoding'] =  $V5mmmrje2ymm;
        }

        $Vj0kojsfk0h3Obj =  $Veca2om3awughis->numObj;
        $Veca2om3awughis->o_font($Veca2om3awughis->numObj, 'new', $Vobxlvad3352);
        $Vj0kojsfk0h3['fontNum'] =  $Veca2om3awughis->numFonts;

        
        
        
        $V4t3fwdd3eevasefile =  $Vj0kojsfk0h3Name;
        
        $Vwupureep2du = '';
        if  (file_exists("$V4t3fwdd3eevasefile.pfb")) {
          $Vwupureep2du =  'pfb';
        } 
        elseif  (file_exists("$V4t3fwdd3eevasefile.ttf")) {
          $Vwupureep2du =  'ttf';
        }

        $Vawxakj3ytmo =  "$V4t3fwdd3eevasefile.$Vwupureep2du";

        
        
        $Veca2om3awughis->addMessage('selectFont: checking for - '.$Vawxakj3ytmo);

        
        
        if  ($Vwupureep2du) {
          $Vi3y3l1uvwp3dobeFontName =  isset($Vj0kojsfk0h3['PostScriptName']) ? $Vj0kojsfk0h3['PostScriptName'] : $Vj0kojsfk0h3['FontName'];
          
          $Veca2om3awughis->addMessage("selectFont: adding font file - $Vawxakj3ytmo - $Vi3y3l1uvwp3dobeFontName");

          
          $V0ygtsbuzyxo =  -1;
          $Vd1yiw0fierr =  0;
          $Vwsgifrh5icsidths =  array();
          $Vgzafatnat1h = array();

          foreach ($Vj0kojsfk0h3['C'] as  $Vcgbfu1dtv3l => $Vrec2f1japon) {
            if  (intval($Vcgbfu1dtv3l) >0 ||  $Vcgbfu1dtv3l ==  '0') {
              if (!$Vj0kojsfk0h3['isUnicode']) {
                
                if  ($Vd1yiw0fierr>0 &&  $Vcgbfu1dtv3l>$Vd1yiw0fierr+1) {
                  for ($Vfhiq1lhsoja =  $Vd1yiw0fierr+1;$Vfhiq1lhsoja<$Vcgbfu1dtv3l;$Vfhiq1lhsoja++) {
                    $Vwsgifrh5icsidths[] =  0;
                  }
                }
              }

              $Vwsgifrh5icsidths[] =  $Vrec2f1japon;

              if ($Vj0kojsfk0h3['isUnicode']) {
                $Vgzafatnat1h[$Vcgbfu1dtv3l] =  $Vrec2f1japon;
              }

              if  ($V0ygtsbuzyxo ==  -1) {
                $V0ygtsbuzyxo =  $Vcgbfu1dtv3l;
              }

              $Vd1yiw0fierr =  $Vcgbfu1dtv3l;
            }
          }

          
          if  (isset($Vobxlvad3352['differences'])) {
            foreach($Vobxlvad3352['differences'] as  $V4y0urwpnd3jharNum => $V4y0urwpnd3jharName) {
              if  ($V4y0urwpnd3jharNum > $Vd1yiw0fierr) {
                if (!$Vj0kojsfk0h3['isUnicode']) {
                  
                  for ($Vfhiq1lhsoja =  $Vd1yiw0fierr + 1; $Vfhiq1lhsoja <=  $V4y0urwpnd3jharNum; $Vfhiq1lhsoja++) {
                    $Vwsgifrh5icsidths[] =  0;
                  }
                }

                $Vd1yiw0fierr =  $V4y0urwpnd3jharNum;
              }

              if  (isset($Vj0kojsfk0h3['C'][$V4y0urwpnd3jharName])) {
                $Vwsgifrh5icsidths[$V4y0urwpnd3jharNum-$V0ygtsbuzyxo] =  $Vj0kojsfk0h3['C'][$V4y0urwpnd3jharName];
                if ($Vj0kojsfk0h3['isUnicode']) {
                  $Vgzafatnat1h[$V4y0urwpnd3jharName] =  $Vj0kojsfk0h3['C'][$V4y0urwpnd3jharName];
                }
              }
            }
          }

          if ($Vj0kojsfk0h3['isUnicode']) {
            $Vj0kojsfk0h3['CIDWidths'] = $Vgzafatnat1h;
          }

          $Veca2om3awughis->addMessage('selectFont: FirstChar = '.$V0ygtsbuzyxo);
          $Veca2om3awughis->addMessage('selectFont: LastChar = '.$Vd1yiw0fierr);

          $Vwsgifrh5icsidthid = -1;

          if (!$Vj0kojsfk0h3['isUnicode']) {
            

            $Veca2om3awughis->numObj++;
            $Veca2om3awughis->o_contents($Veca2om3awughis->numObj, 'new', 'raw');
            $Veca2om3awughis->objects[$Veca2om3awughis->numObj]['c'].=  '['.implode(' ', $Vwsgifrh5icsidths).']';
            $Vwsgifrh5icsidthid =  $Veca2om3awughis->numObj;
          }

          $V4v5rd4moasq = 500;
          $Vu0m0qcyoage = 70;

          if (isset($Vj0kojsfk0h3['MissingWidth'])) {
            $V4v5rd4moasq =  $Vj0kojsfk0h3['MissingWidth'];
          }
          if (isset($Vj0kojsfk0h3['StdVW'])) {
            $Vu0m0qcyoage = $Vj0kojsfk0h3['StdVW'];
          } elseif (isset($Vj0kojsfk0h3['Weight']) && preg_match('!(bold|black)!i', $Vj0kojsfk0h3['Weight'])) {
            $Vu0m0qcyoage = 120;
          }
          
          
          
          
          if (!$Veca2om3awughis->isUnicode || $Vwupureep2du !== 'ttf' || empty($Veca2om3awughis->stringSubsets)) {
            $Vou4vxorrdoe = file_get_contents($Vawxakj3ytmo);
          }
          else {
            require_once dirname(__FILE__)."/php-font-lib/classes/font.cls.php";
            
            $Veca2om3awughis->stringSubsets[$Vj0kojsfk0h3Name][] = 32; 
            
            $Vr0sffgtekfz = $Veca2om3awughis->stringSubsets[$Vj0kojsfk0h3Name];
            sort($Vr0sffgtekfz);
            
            
            $Vj0kojsfk0h3_obj = Font::load($Vawxakj3ytmo);
            $Vj0kojsfk0h3_obj->parse();
            
            
            $Vj0kojsfk0h3_obj->setSubset($Vr0sffgtekfz);
            $Vj0kojsfk0h3_obj->reduce();
            
            
            $Vdln1z2oxpjs_name = "$Vawxakj3ytmo.tmp.".sprintf("%u", crc32(implode($Vr0sffgtekfz)));
            $Vj0kojsfk0h3_obj->open($Vdln1z2oxpjs_name, Font_Binary_Stream::modeWrite);
            $Vj0kojsfk0h3_obj->encode(array("OS/2"));
            $Vj0kojsfk0h3_obj->close();
            
            
            $Vj0kojsfk0h3_obj = Font::load($Vdln1z2oxpjs_name);
            
            
            $Vldxaapdjtvp = null;
            foreach($Vj0kojsfk0h3_obj->getData("cmap", "subtables") as $Vgrdnur1fyr5) {
              if ($Vgrdnur1fyr5["platformID"] == 0 || $Vgrdnur1fyr5["platformID"] == 3 && $Vgrdnur1fyr5["platformSpecificID"] == 1) {
                $Vldxaapdjtvp = $Vgrdnur1fyr5;
                break;
              }
            }
            
            if ($Vldxaapdjtvp) {
              $V3vex210v0otIndexArray = $Vldxaapdjtvp["glyphIndexArray"];
              $Vw1bepsnxpij = $Vj0kojsfk0h3_obj->getData("hmtx");
              
              unset($V3vex210v0otIndexArray[0xFFFF]);
              
              $Vnk0kpnh4m5ctogid = str_pad('', max(array_keys($V3vex210v0otIndexArray))*2+1, "\x00");
              $Vj0kojsfk0h3['CIDWidths'] = array();
              
              foreach($V3vex210v0otIndexArray as $Vnk0kpnh4m5c => $Vwn52b3jaf14) {
                if ($Vnk0kpnh4m5c >= 0 && $Vnk0kpnh4m5c < 0xFFFF && $Vwn52b3jaf14) {
                  $Vnk0kpnh4m5ctogid[$Vnk0kpnh4m5c*2] = chr($Vwn52b3jaf14 >> 8);
                  $Vnk0kpnh4m5ctogid[$Vnk0kpnh4m5c*2 + 1] = chr($Vwn52b3jaf14 & 0xFF);
                }
                
                $Vwsgifrh5icsidth = $Vj0kojsfk0h3_obj->normalizeFUnit(isset($Vw1bepsnxpij[$Vwn52b3jaf14]) ? $Vw1bepsnxpij[$Vwn52b3jaf14][0] : $Vw1bepsnxpij[0][0]);
                $Vj0kojsfk0h3['CIDWidths'][$Vnk0kpnh4m5c] = $Vwsgifrh5icsidth;
              }
              
              $Vj0kojsfk0h3['CIDtoGID'] = base64_encode(gzcompress($Vnk0kpnh4m5ctogid));
              $Vj0kojsfk0h3['CIDtoGID_Compressed'] = true;
              
              $Vou4vxorrdoe = file_get_contents($Vdln1z2oxpjs_name);
            }
            else {
              $Vou4vxorrdoe = file_get_contents($Vawxakj3ytmo);
            }
            
            $Vj0kojsfk0h3_obj->close();
            unlink($Vdln1z2oxpjs_name);
          }

          
          $Veca2om3awughis->numObj++;
          $Vj0kojsfk0h3DescriptorId =  $Veca2om3awughis->numObj;

          $Veca2om3awughis->numObj++;
          $Vzqw0ieauwu4fbid =  $Veca2om3awughis->numObj;

          
          $Veyvxwy10drd =  0;

          if  ($Vj0kojsfk0h3['ItalicAngle'] !=  0) {
            $Veyvxwy10drd+=  pow(2, 6);
          }

          if  ($Vj0kojsfk0h3['IsFixedPitch'] === 'true') {
            $Veyvxwy10drd+=  1;
          }

          $Veyvxwy10drd+=  pow(2, 5); 
          $Vor34exngli4 =  array(
            'Ascent' => 'Ascender',
            'CapHeight' => 'CapHeight',
            'MissingWidth' => 'MissingWidth',
            'Descent' => 'Descender',
            'FontBBox' => 'FontBBox',
            'ItalicAngle' => 'ItalicAngle'
          );
          $Vijrpqg2fif2 =  array(
            'Flags' => $Veyvxwy10drd,
            'FontName' => $Vi3y3l1uvwp3dobeFontName,
            'StemV' => $Vu0m0qcyoage
          );

          foreach($Vor34exngli4 as  $V51lf1kcbto4 => $Vf1kwqxxhqpz) {
            if  (isset($Vj0kojsfk0h3[$Vf1kwqxxhqpz])) {
              $Vijrpqg2fif2[$V51lf1kcbto4] =  $Vj0kojsfk0h3[$Vf1kwqxxhqpz];
            }
          }

          if  ($Vwupureep2du === 'pfb') {
            $Vijrpqg2fif2['FontFile'] =  $Vzqw0ieauwu4fbid;
          } else  if  ($Vwupureep2du === 'ttf') {
            $Vijrpqg2fif2['FontFile2'] =  $Vzqw0ieauwu4fbid;
          }

          $Veca2om3awughis->o_fontDescriptor($Vj0kojsfk0h3DescriptorId, 'new', $Vijrpqg2fif2);

          
          $Veca2om3awughis->o_contents($Veca2om3awughis->numObj, 'new');
          $Veca2om3awughis->objects[$Vzqw0ieauwu4fbid]['c'].=  $Vou4vxorrdoe;

          
          if  ($Vwupureep2du === 'pfb') {
            $Vieq4wd4k102 =  strpos($Vou4vxorrdoe, 'eexec') +6;
            $Vmtibzi01lee =  strpos($Vou4vxorrdoe, '00000000') -$Vieq4wd4k102;
            $Vfzsu0qzkbqq =  mb_strlen($Vou4vxorrdoe, '8bit') -$Vmtibzi01lee-$Vieq4wd4k102;
            $Veca2om3awughis->o_contents($Veca2om3awughis->numObj, 'add', array('Length1' => $Vieq4wd4k102, 'Length2' => $Vmtibzi01lee, 'Length3' => $Vfzsu0qzkbqq));
          } else  if  ($Vwupureep2du == 'ttf') {
            $Vieq4wd4k102 =  mb_strlen($Vou4vxorrdoe, '8bit');
            $Veca2om3awughis->o_contents($Veca2om3awughis->numObj, 'add', array('Length1' => $Vieq4wd4k102));
          }

          
          $Vdln1z2oxpjs =  array(
            'BaseFont' => $Vi3y3l1uvwp3dobeFontName,
            'MissingWidth' => $V4v5rd4moasq,
            'Widths' => $Vwsgifrh5icsidthid,
            'FirstChar' => $V0ygtsbuzyxo,
            'LastChar' => $Vd1yiw0fierr,
            'FontDescriptor' => $Vj0kojsfk0h3DescriptorId,
          );

          if  ($Vwupureep2du === 'ttf') {
            $Vdln1z2oxpjs['SubType'] =  'TrueType';
          }

          $Veca2om3awughis->addMessage("adding extra info to font.($Vj0kojsfk0h3Obj)");

          foreach($Vdln1z2oxpjs as  $Vijlyoaxvfe2 => $Vwsub2gqa12p) {
            $Veca2om3awughis->addMessage("$Vijlyoaxvfe2 : $Vwsub2gqa12p");
          }

          $Veca2om3awughis->o_font($Vj0kojsfk0h3Obj, 'add', $Vdln1z2oxpjs);
        } else {
          $Veca2om3awughis->addMessage('selectFont: pfb or ttf file not found, ok if this is one of the 14 standard fonts');
        }

        
        
        if  (isset($Vobxlvad3352['differences'])) {
          $Vj0kojsfk0h3['differences'] =  $Vobxlvad3352['differences'];
        }
      }
    }

    if  ($Vvmpxrxft21r &&  isset($Veca2om3awughis->fonts[$Vj0kojsfk0h3Name])) {
      
      $Veca2om3awughis->currentBaseFont =  $Vj0kojsfk0h3Name;

      
      
      $Veca2om3awughis->currentFont =  $Veca2om3awughis->currentBaseFont;
      $Veca2om3awughis->currentFontNum =  $Veca2om3awughis->fonts[$Veca2om3awughis->currentFont]['fontNum'];

      
    }

    return  $Veca2om3awughis->currentFontNum;
    
  }

  
  function setCurrentFont() {
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    $Veca2om3awughis->currentFont =  $Veca2om3awughis->currentBaseFont;
    $Veca2om3awughis->currentFontNum =  $Veca2om3awughis->fonts[$Veca2om3awughis->currentFont]['fontNum'];
    
  }

  
  function getFirstPageId() {
    return  $Veca2om3awughis->firstPageId;
  }

  
  function addContent($V4y0urwpnd3jontent) {
    $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  $V4y0urwpnd3jontent;
  }

  
  function setColor($V4y0urwpnd3jolor, $Vxgbdvd4si5w = false) {
    $Vmwwo1qnmepzew_color = array($V4y0urwpnd3jolor[0], $V4y0urwpnd3jolor[1], $V4y0urwpnd3jolor[2], isset($V4y0urwpnd3jolor[3]) ? $V4y0urwpnd3jolor[3] : null);
    
    if (!$Vxgbdvd4si5w && $Veca2om3awughis->currentColour == $Vmwwo1qnmepzew_color) return;
    
    if (isset($Vmwwo1qnmepzew_color[3])) {
      $Veca2om3awughis->currentColour = $Vmwwo1qnmepzew_color;
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'] .= vsprintf("\n%.3F %.3F %.3F %.3F k", $Veca2om3awughis->currentColour);
    }

    elseif (isset($Vmwwo1qnmepzew_color[2])) {
      $Veca2om3awughis->currentColour = $Vmwwo1qnmepzew_color;
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'] .= vsprintf("\n%.3F %.3F %.3F rg", $Veca2om3awughis->currentColour);
    }
  }

  
  function setStrokeColor($V4y0urwpnd3jolor, $Vxgbdvd4si5w =  false) {
    $Vmwwo1qnmepzew_color = array($V4y0urwpnd3jolor[0], $V4y0urwpnd3jolor[1], $V4y0urwpnd3jolor[2], isset($V4y0urwpnd3jolor[3]) ? $V4y0urwpnd3jolor[3] : null);
    
    if (!$Vxgbdvd4si5w && $Veca2om3awughis->currentStrokeColour == $Vmwwo1qnmepzew_color) return;
    
    if (isset($Vmwwo1qnmepzew_color[3])) {
      $Veca2om3awughis->currentStrokeColour = $Vmwwo1qnmepzew_color;
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'] .= vsprintf("\n%.3F %.3F %.3F %.3F K", $Veca2om3awughis->currentStrokeColour);
    }

    elseif (isset($Vmwwo1qnmepzew_color[2])) {
      $Veca2om3awughis->currentStrokeColour = $Vmwwo1qnmepzew_color;
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'] .= vsprintf("\n%.3F %.3F %.3F RG", $Veca2om3awughis->currentStrokeColour);
    }
  }

  
  function setGraphicsState($Vzqw0ieauwu4arameters) {
    
    
    $Veca2om3awughis->numObj++;
    $Veca2om3awughis->o_extGState($Veca2om3awughis->numObj,  'new',  $Vzqw0ieauwu4arameters);
    $Veca2om3awughis->objects[ $Veca2om3awughis->currentContents ]['c'].=  "\n/GS$Veca2om3awughis->numStates gs";
  }

  
  function setLineTransparency($Vbdcqcmfhadr, $Vrs2mt5pfpsvpacity) {
    static $V4t3fwdd3eevlend_modes = array("Normal", "Multiply", "Screen",
                                "Overlay", "Darken", "Lighten",
                                "ColorDogde", "ColorBurn", "HardLight",
                                "SoftLight", "Difference", "Exclusion");

    if ( !in_array($Vbdcqcmfhadr, $V4t3fwdd3eevlend_modes) )
      $Vbdcqcmfhadr = "Normal";
    
    
    if ( $Vbdcqcmfhadr === $Veca2om3awughis->currentLineTransparency["mode"]  &&
         $Vrs2mt5pfpsvpacity == $Veca2om3awughis->currentLineTransparency["opacity"] )
      return;

    $Veca2om3awughis->currentLineTransparency["mode"] = $Vbdcqcmfhadr;
    $Veca2om3awughis->currentLineTransparency["opacity"] = $Vrs2mt5pfpsvpacity;
    
    $Vobxlvad3352 = array("BM" => "/$Vbdcqcmfhadr",
                     "CA" => (float)$Vrs2mt5pfpsvpacity);

    $Veca2om3awughis->setGraphicsState($Vobxlvad3352);
  }
  
  
  function setFillTransparency($Vbdcqcmfhadr, $Vrs2mt5pfpsvpacity) {
    static $V4t3fwdd3eevlend_modes = array("Normal", "Multiply", "Screen",
                                "Overlay", "Darken", "Lighten",
                                "ColorDogde", "ColorBurn", "HardLight",
                                "SoftLight", "Difference", "Exclusion");

    if ( !in_array($Vbdcqcmfhadr, $V4t3fwdd3eevlend_modes) )
      $Vbdcqcmfhadr = "Normal";

    if ( $Vbdcqcmfhadr === $Veca2om3awughis->currentFillTransparency["mode"]  &&
         $Vrs2mt5pfpsvpacity == $Veca2om3awughis->currentFillTransparency["opacity"] )
      return;
      
    $Veca2om3awughis->currentFillTransparency["mode"] = $Vbdcqcmfhadr;
    $Veca2om3awughis->currentFillTransparency["opacity"] = $Vrs2mt5pfpsvpacity;

    $Vobxlvad3352 = array("BM" => "/$Vbdcqcmfhadr",
                     "ca" => (float)$Vrs2mt5pfpsvpacity);
    
    $Veca2om3awughis->setGraphicsState($Vobxlvad3352);
  }

  
  function line($Vkiv1idvekdh, $Vj45ukmrparq, $Vbbuqfp0xqjj, $V4ed4tb3yv2t) {
    $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'] .= sprintf("\n%.3F %.3F m %.3F %.3F l S", $Vkiv1idvekdh, $Vj45ukmrparq, $Vbbuqfp0xqjj, $V4ed4tb3yv2t);
  }

  
  function curve($Vgakxvf4uk1n, $Vpk1vzeab1mp, $Vkiv1idvekdh, $Vj45ukmrparq, $Vbbuqfp0xqjj, $V4ed4tb3yv2t, $V0cyjyhon4ed, $Vvgjq4ztxc32) {
    
    
    $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'] .=
      sprintf("\n%.3F %.3F m %.3F %.3F %.3F %.3F %.3F %.3F c S", $Vgakxvf4uk1n, $Vpk1vzeab1mp, $Vkiv1idvekdh, $Vj45ukmrparq, $Vbbuqfp0xqjj, $V4ed4tb3yv2t, $V0cyjyhon4ed, $Vvgjq4ztxc32);
  }

  
  function partEllipse($Vgakxvf4uk1n, $Vpk1vzeab1mp, $Vi3y3l1uvwp3start, $Vi3y3l1uvwp3finish, $Veiy0hvfmcw1, $V0cdy0pwto2f =  0, $Vi3y3l1uvwp3ngle =  0, $Vmwwo1qnmepzSeg =  8) {
    $Veca2om3awughis->ellipse($Vgakxvf4uk1n, $Vpk1vzeab1mp, $Veiy0hvfmcw1, $V0cdy0pwto2f, $Vi3y3l1uvwp3ngle, $Vmwwo1qnmepzSeg, $Vi3y3l1uvwp3start, $Vi3y3l1uvwp3finish, false);
  }

  
  function filledEllipse($Vgakxvf4uk1n, $Vpk1vzeab1mp, $Veiy0hvfmcw1, $V0cdy0pwto2f =  0, $Vi3y3l1uvwp3ngle =  0, $Vmwwo1qnmepzSeg =  8, $Vi3y3l1uvwp3start =  0, $Vi3y3l1uvwp3finish =  360) {
    return  $Veca2om3awughis->ellipse($Vgakxvf4uk1n, $Vpk1vzeab1mp, $Veiy0hvfmcw1, $V0cdy0pwto2f =  0, $Vi3y3l1uvwp3ngle, $Vmwwo1qnmepzSeg, $Vi3y3l1uvwp3start, $Vi3y3l1uvwp3finish, true, true);
  }

  
  function ellipse($Vgakxvf4uk1n, $Vpk1vzeab1mp, $Veiy0hvfmcw1, $V0cdy0pwto2f =  0, $Vi3y3l1uvwp3ngle =  0, $Vmwwo1qnmepzSeg =  8, $Vi3y3l1uvwp3start =  0, $Vi3y3l1uvwp3finish =  360, $V4y0urwpnd3jlose =  true, $Vlljqdlim1ql =  false) {
    if  ($Veiy0hvfmcw1 ==  0) {
      return;
    }

    if  ($V0cdy0pwto2f ==  0) {
      $V0cdy0pwto2f =  $Veiy0hvfmcw1;
    }

    if  ($Vmwwo1qnmepzSeg < 2) {
      $Vmwwo1qnmepzSeg =  2;
    }

    $Vi3y3l1uvwp3start =  deg2rad((float)$Vi3y3l1uvwp3start);
    $Vi3y3l1uvwp3finish =  deg2rad((float)$Vi3y3l1uvwp3finish);
    $Veca2om3awugotalAngle = $Vi3y3l1uvwp3finish-$Vi3y3l1uvwp3start;

    $Vrec2f1japont =  $Veca2om3awugotalAngle/$Vmwwo1qnmepzSeg;
    $Vrec2f1japontm =  $Vrec2f1japont/3;

    if  ($Vi3y3l1uvwp3ngle !=  0) {
      $Vi3y3l1uvwp3 =  -1*deg2rad((float)$Vi3y3l1uvwp3ngle);

      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'] .=
        sprintf("\n q %.3F %.3F %.3F %.3F %.3F %.3F cm", cos($Vi3y3l1uvwp3), -sin($Vi3y3l1uvwp3), sin($Vi3y3l1uvwp3), cos($Vi3y3l1uvwp3), $Vgakxvf4uk1n, $Vpk1vzeab1mp);

      $Vgakxvf4uk1n =  0;
      $Vpk1vzeab1mp =  0;
    }

    $Veca2om3awug1 =  $Vi3y3l1uvwp3start;
    $Vi3y3l1uvwp30 =  $Vgakxvf4uk1n + $Veiy0hvfmcw1*cos($Veca2om3awug1);
    $V4t3fwdd3eev0 =  $Vpk1vzeab1mp + $V0cdy0pwto2f*sin($Veca2om3awug1);
    $V4y0urwpnd3j0 =  -$Veiy0hvfmcw1 * sin($Veca2om3awug1);
    $Vrec2f1japon0 =  $V0cdy0pwto2f * cos($Veca2om3awug1);

    $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'] .= sprintf("\n%.3F %.3F m ", $Vi3y3l1uvwp30, $V4t3fwdd3eev0);

    for  ($Vfhiq1lhsoja = 1; $Vfhiq1lhsoja <=  $Vmwwo1qnmepzSeg; $Vfhiq1lhsoja++) {
      
      $Veca2om3awug1 =  $Vfhiq1lhsoja * $Vrec2f1japont + $Vi3y3l1uvwp3start;
      $Vi3y3l1uvwp31 =  $Vgakxvf4uk1n + $Veiy0hvfmcw1 * cos($Veca2om3awug1);
      $V4t3fwdd3eev1 =  $Vpk1vzeab1mp + $V0cdy0pwto2f * sin($Veca2om3awug1);
      $V4y0urwpnd3j1 = -$Veiy0hvfmcw1 * sin($Veca2om3awug1);
      $Vrec2f1japon1 =  $V0cdy0pwto2f * cos($Veca2om3awug1);

      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'] .=
        sprintf("\n%.3F %.3F %.3F %.3F %.3F %.3F c", ($Vi3y3l1uvwp30+$V4y0urwpnd3j0*$Vrec2f1japontm), ($V4t3fwdd3eev0+$Vrec2f1japon0*$Vrec2f1japontm), ($Vi3y3l1uvwp31-$V4y0urwpnd3j1*$Vrec2f1japontm), ($V4t3fwdd3eev1-$Vrec2f1japon1*$Vrec2f1japontm), $Vi3y3l1uvwp31, $V4t3fwdd3eev1);

      $Vi3y3l1uvwp30 =  $Vi3y3l1uvwp31;
      $V4t3fwdd3eev0 =  $V4t3fwdd3eev1;
      $V4y0urwpnd3j0 =  $V4y0urwpnd3j1;
      $Vrec2f1japon0 =  $Vrec2f1japon1;
    }

    if  ($Vlljqdlim1ql) {
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  ' f';
    } else if ($V4y0urwpnd3jlose) {
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  ' s'; 
    } else {
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  ' S';
    }

    if  ($Vi3y3l1uvwp3ngle !=  0) {
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  ' Q';
    }
  }

  
  function setLineStyle($Vwsgifrh5icsidth =  1, $V4y0urwpnd3jap =  '', $Vzmnqyqjjodwoin =  '', $Vrec2f1japonash =  '', $Vzqw0ieauwu4hase =  0) {
    
    $Vlkger5ehs4w =  '';

    if  ($Vwsgifrh5icsidth>0) {
      $Vlkger5ehs4w.=  "$Vwsgifrh5icsidth w";
    }

    $V4y0urwpnd3ja =  array('butt' => 0, 'round' => 1, 'square' => 2);

    if  (isset($V4y0urwpnd3ja[$V4y0urwpnd3jap])) {
      $Vlkger5ehs4w.=  " $V4y0urwpnd3ja[$V4y0urwpnd3jap] J";
    }

    $Vzmnqyqjjodwa =  array('miter' => 0, 'round' => 1, 'bevel' => 2);

    if  (isset($Vzmnqyqjjodwa[$Vzmnqyqjjodwoin])) {
      $Vlkger5ehs4w.=  " $Vzmnqyqjjodwa[$Vzmnqyqjjodwoin] j";
    }

    if  (is_array($Vrec2f1japonash)) {
      $Vlkger5ehs4w.=  ' [ ' . implode(' ', $Vrec2f1japonash) . " ] $Vzqw0ieauwu4hase d";
    }

    $Veca2om3awughis->currentLineStyle =  $Vlkger5ehs4w;
    $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  "\n$Vlkger5ehs4w";
  }

  
  function polygon($Vzqw0ieauwu4, $Vmwwo1qnmepzp, $Vtbbah5lqvpo = false) {
    $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  sprintf("\n%.3F %.3F m ", $Vzqw0ieauwu4[0], $Vzqw0ieauwu4[1]);

    for  ($Vfhiq1lhsoja =  2; $Vfhiq1lhsoja < $Vmwwo1qnmepzp * 2; $Vfhiq1lhsoja =  $Vfhiq1lhsoja + 2) {
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  sprintf("%.3F %.3F l ", $Vzqw0ieauwu4[$Vfhiq1lhsoja], $Vzqw0ieauwu4[$Vfhiq1lhsoja+1]);
    }

    if  ($Vtbbah5lqvpo) {
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  ' f';
    } else {
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  ' S';
    }
  }

  
  function filledRectangle($Vkiv1idvekdh, $Vj45ukmrparq, $Vwsgifrh5icsidth, $Vzo4g5xb4yip) {
    $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  sprintf("\n%.3F %.3F %.3F %.3F re f", $Vkiv1idvekdh, $Vj45ukmrparq, $Vwsgifrh5icsidth, $Vzo4g5xb4yip);
  }

  
  function rectangle($Vkiv1idvekdh, $Vj45ukmrparq, $Vwsgifrh5icsidth, $Vzo4g5xb4yip) {
    $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  sprintf("\n%.3F %.3F %.3F %.3F re S", $Vkiv1idvekdh, $Vj45ukmrparq, $Vwsgifrh5icsidth, $Vzo4g5xb4yip);
  }

  
  function save() {
    
    $Veca2om3awughis->currentColour = null;
    $Veca2om3awughis->currentStrokeColour = null;
    $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  "\nq";
  }
  
  
  function restore() {
    $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  "\nQ";
  }
  
  
  function clippingRectangle($Vkiv1idvekdh, $Vj45ukmrparq, $Vwsgifrh5icsidth, $Vzo4g5xb4yip) {
    $Veca2om3awughis->save();
    $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  sprintf("\n%.3F %.3F %.3F %.3F re W n", $Vkiv1idvekdh, $Vj45ukmrparq, $Vwsgifrh5icsidth, $Vzo4g5xb4yip);
  }

  
  function clippingEnd() {
    $Veca2om3awughis->restore();
  }

  
  function scale($Vym2kir0ppig, $V10bbkmr2ebo, $V1e1eaicqarh, $Vqwmp2bx0ii2) {
    $Vqwmp2bx0ii2 = $Veca2om3awughis->currentPageSize["height"] - $Vqwmp2bx0ii2;

    $Veca2om3awugm = array(
      $Vym2kir0ppig,        0,
      0,           $V10bbkmr2ebo,
      $V1e1eaicqarh*(1-$Vym2kir0ppig), $Vqwmp2bx0ii2*(1-$V10bbkmr2ebo)
    );
    
    $Veca2om3awughis->transform($Veca2om3awugm);
  }
  
  
  function translate($Veca2om3awug_x, $Veca2om3awug_y) {
    $Veca2om3awugm = array(
      1,    0,
      0,    1,
      $Veca2om3awug_x, -$Veca2om3awug_y
    );
    
    $Veca2om3awughis->transform($Veca2om3awugm);
  }

  
  function rotate($Vi3y3l1uvwp3ngle, $V1e1eaicqarh, $Vqwmp2bx0ii2) {
    $Vqwmp2bx0ii2 = $Veca2om3awughis->currentPageSize["height"] - $Vqwmp2bx0ii2;
    
    $Vi3y3l1uvwp3 = deg2rad($Vi3y3l1uvwp3ngle);
    $V4y0urwpnd3jos_a = cos($Vi3y3l1uvwp3);
    $Vvbo1axwian3 = sin($Vi3y3l1uvwp3);
    
    $Veca2om3awugm = array(
      $V4y0urwpnd3jos_a,                     -$Vvbo1axwian3,
      $Vvbo1axwian3,                     $V4y0urwpnd3jos_a,
      $V1e1eaicqarh - $Vvbo1axwian3*$Vqwmp2bx0ii2 - $V4y0urwpnd3jos_a*$V1e1eaicqarh, $Vqwmp2bx0ii2 - $V4y0urwpnd3jos_a*$Vqwmp2bx0ii2 + $Vvbo1axwian3*$V1e1eaicqarh, 
    );
    
    $Veca2om3awughis->transform($Veca2om3awugm);
  }
  
  
  function skew($Vi3y3l1uvwp3ngle_x, $Vi3y3l1uvwp3ngle_y, $V1e1eaicqarh, $Vqwmp2bx0ii2) {
    $Vqwmp2bx0ii2 = $Veca2om3awughis->currentPageSize["height"] - $Vqwmp2bx0ii2;
    
    $Veca2om3awugan_x = tan(deg2rad($Vi3y3l1uvwp3ngle_x));
    $Veca2om3awugan_y = tan(deg2rad($Vi3y3l1uvwp3ngle_y));
    
    $Veca2om3awugm = array(
      1,         -$Veca2om3awugan_y,
      -$Veca2om3awugan_x,   1,
      $Veca2om3awugan_x*$Vqwmp2bx0ii2, $Veca2om3awugan_y*$V1e1eaicqarh, 
    );

    $Veca2om3awughis->transform($Veca2om3awugm);
  }

  
  function transform($Veca2om3awugm) {
    $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=
      vsprintf("\n %.3F %.3F %.3F %.3F %.3F %.3F cm", $Veca2om3awugm);
  }

  
  function newPage($Vfhiq1lhsojansert =  0, $Vwfsll4zanwn =  0, $Vzqw0ieauwu4os =  'after') {
    
    

    if  ($Veca2om3awughis->nStateStack) {
      for  ($Vfhiq1lhsoja =  $Veca2om3awughis->nStateStack;$Vfhiq1lhsoja >=  1;$Vfhiq1lhsoja--) {
        $Veca2om3awughis->restoreState($Vfhiq1lhsoja);
      }
    }

    $Veca2om3awughis->numObj++;

    if  ($Vfhiq1lhsojansert) {
      
      
      $Vhq0o4putqqy =  $Veca2om3awughis->objects[$Vwfsll4zanwn]['onPage'];
      $Vrs2mt5pfpsvpt =  array('rid' => $Vhq0o4putqqy, 'pos' => $Vzqw0ieauwu4os);
      $Veca2om3awughis->o_page($Veca2om3awughis->numObj, 'new', $Vrs2mt5pfpsvpt);
    } else {
      $Veca2om3awughis->o_page($Veca2om3awughis->numObj, 'new');
    }

    
    if  ($Veca2om3awughis->nStateStack) {
      for  ($Vfhiq1lhsoja =  1;$Vfhiq1lhsoja <=  $Veca2om3awughis->nStateStack;$Vfhiq1lhsoja++) {
        $Veca2om3awughis->saveState($Vfhiq1lhsoja);
      }
    }

    
    if  (isset($Veca2om3awughis->currentColour)) {
      $Veca2om3awughis->setColor($Veca2om3awughis->currentColour, true);
    }

    if  (isset($Veca2om3awughis->currentStrokeColour)) {
      $Veca2om3awughis->setStrokeColor($Veca2om3awughis->currentStrokeColour, true);
    }

    
    if  (mb_strlen($Veca2om3awughis->currentLineStyle, '8bit')) {
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  "\n$Veca2om3awughis->currentLineStyle";
    }

    
    return  $Veca2om3awughis->currentContents;
  }

  
  function stream($Vobxlvad3352 =  '') {
    
    
    
    
    
    
    
    
    
    if  (!is_array($Vobxlvad3352)) {
      $Vobxlvad3352 =  array();
    }

    if  ( headers_sent())
      die("Unable to stream pdf: headers already sent");

    $V01yhzbgix2k = empty($Vobxlvad3352['compression']);
    $Vdln1z2oxpjs =  ltrim($Veca2om3awughis->output($V01yhzbgix2k));

    header("Cache-Control: private");
    header("Content-type: application/pdf");

    
    header("Content-Length: " . mb_strlen($Vdln1z2oxpjs, '8bit'));
    $Vg5mhfl1beoiName =  (isset($Vobxlvad3352['Content-Disposition']) ?  $Vobxlvad3352['Content-Disposition'] :  'file.pdf');

    if  ( !isset($Vobxlvad3352["Attachment"]))
      $Vobxlvad3352["Attachment"] =  true;

    $Vi3y3l1uvwp3ttachment =  $Vobxlvad3352["Attachment"] ?  "attachment" :  "inline";

    header("Content-Disposition: $Vi3y3l1uvwp3ttachment; filename=\"$Vg5mhfl1beoiName\"");

    if  (isset($Vobxlvad3352['Accept-Ranges']) &&  $Vobxlvad3352['Accept-Ranges'] ==  1) {
      
      header("Accept-Ranges: " . mb_strlen($Vdln1z2oxpjs, '8bit'));
    }

    echo  $Vdln1z2oxpjs;
    flush();
  }

  
  function getFontHeight($V4jbadwq4bzj) {
    if  (!$Veca2om3awughis->numFonts) {
      $Veca2om3awughis->selectFont($Veca2om3awughis->defaultFont);
    }
    
    $Vj0kojsfk0h3 = $Veca2om3awughis->fonts[$Veca2om3awughis->currentFont];
    
    
    if ( isset($Vj0kojsfk0h3['Ascender']) && isset($Vj0kojsfk0h3['Descender']) ) {
      $Vvlxmepre4ko =  $Vj0kojsfk0h3['Ascender']-$Vj0kojsfk0h3['Descender'];
    }
    else {
      $Vvlxmepre4ko =  $Vj0kojsfk0h3['FontBBox'][3]-$Vj0kojsfk0h3['FontBBox'][1];
    }

    
    
    if (isset($Vj0kojsfk0h3['FontHeightOffset'])) {
      
      
      
      
      
      
      
      $Vvlxmepre4ko += (int)$Vj0kojsfk0h3['FontHeightOffset'];
    }

    return  $V4jbadwq4bzj*$Vvlxmepre4ko/1000;
  }
  
  function getFontXHeight($V4jbadwq4bzj) {
    if  (!$Veca2om3awughis->numFonts) {
      $Veca2om3awughis->selectFont($Veca2om3awughis->defaultFont);
    }
    
    $Vj0kojsfk0h3 = $Veca2om3awughis->fonts[$Veca2om3awughis->currentFont];
    
    
    if ( isset($Vj0kojsfk0h3['XHeight']) ) {
      $V1e1eaicqarhh =  $Vj0kojsfk0h3['Ascender']-$Vj0kojsfk0h3['Descender'];
    }
    else {
      $V1e1eaicqarhh =  $Veca2om3awughis->getFontHeight($V4jbadwq4bzj) / 2;
    }

    return  $V4jbadwq4bzj*$V1e1eaicqarhh/1000;
  }

  
  function getFontDescender($V4jbadwq4bzj) {
    
    if  (!$Veca2om3awughis->numFonts) {
      $Veca2om3awughis->selectFont($Veca2om3awughis->defaultFont);
    }

    
    $Vvlxmepre4ko = $Veca2om3awughis->fonts[$Veca2om3awughis->currentFont]['Descender'];

    return  $V4jbadwq4bzj*$Vvlxmepre4ko/1000;
  }

  
  function filterText($Veca2om3awugext, $V4t3fwdd3eevom = true, $V4y0urwpnd3jonvert_encoding = true) {
    if (!$Veca2om3awughis->numFonts) {
      $Veca2om3awughis->selectFont($Veca2om3awughis->defaultFont);
    }
    
    if ($V4y0urwpnd3jonvert_encoding) {
      $V4y0urwpnd3jf = $Veca2om3awughis->currentFont;
      if (isset($Veca2om3awughis->fonts[$V4y0urwpnd3jf]) && $Veca2om3awughis->fonts[$V4y0urwpnd3jf]['isUnicode']) {
        
        $Veca2om3awugext =  $Veca2om3awughis->utf8toUtf16BE($Veca2om3awugext, $V4t3fwdd3eevom);
      } else {
        
        $Veca2om3awugext = mb_convert_encoding($Veca2om3awugext, self::$Vnpuafoehm5n, 'UTF-8');
      }
    }

    
    return strtr($Veca2om3awugext, array(')' => '\\)', '(' => '\\(', '\\' => '\\\\', chr(13) => '\r'));
  }

  
  function utf8toCodePointsArray(&$Veca2om3awugext) {
    $Vtojwsl3m1uwgth = mb_strlen($Veca2om3awugext, '8bit'); 
    $Vofoss035ofb = array(); 
    $V4t3fwdd3eevytes = array(); 
    $Vcgbfu1dtv3lbytes = 1; 
    
    for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vtojwsl3m1uwgth; $Vfhiq1lhsoja++) {
      $V4y0urwpnd3j = ord($Veca2om3awugext[$Vfhiq1lhsoja]); 
      if (count($V4t3fwdd3eevytes) === 0) { 
        if ($V4y0urwpnd3j <= 0x7F) {
          $Vofoss035ofb[] = $V4y0urwpnd3j; 
          $Vcgbfu1dtv3lbytes = 1;
        } elseif (($V4y0urwpnd3j >> 0x05) === 0x06) { 
          $V4t3fwdd3eevytes[] = ($V4y0urwpnd3j - 0xC0) << 0x06;
          $Vcgbfu1dtv3lbytes = 2;
        } elseif (($V4y0urwpnd3j >> 0x04) === 0x0E) { 
          $V4t3fwdd3eevytes[] = ($V4y0urwpnd3j - 0xE0) << 0x0C;
          $Vcgbfu1dtv3lbytes = 3;
        } elseif (($V4y0urwpnd3j >> 0x03) === 0x1E) { 
          $V4t3fwdd3eevytes[] = ($V4y0urwpnd3j - 0xF0) << 0x12;
          $Vcgbfu1dtv3lbytes = 4;
        } else {
          
          $Vofoss035ofb[] = 0xFFFD;
          $V4t3fwdd3eevytes = array();
          $Vcgbfu1dtv3lbytes = 1;
        }
      } elseif (($V4y0urwpnd3j >> 0x06) === 0x02) { 
        $V4t3fwdd3eevytes[] = $V4y0urwpnd3j - 0x80;
        if (count($V4t3fwdd3eevytes) === $Vcgbfu1dtv3lbytes) {
          
          $V4y0urwpnd3j = $V4t3fwdd3eevytes[0];
          for ($Vzmnqyqjjodw = 1; $Vzmnqyqjjodw < $Vcgbfu1dtv3lbytes; $Vzmnqyqjjodw++) {
            $V4y0urwpnd3j += ($V4t3fwdd3eevytes[$Vzmnqyqjjodw] << (($Vcgbfu1dtv3lbytes - $Vzmnqyqjjodw - 1) * 0x06));
          }
          if ((($V4y0urwpnd3j >= 0xD800) AND ($V4y0urwpnd3j <= 0xDFFF)) OR ($V4y0urwpnd3j >= 0x10FFFF)) {
            
            
            
            
            $Vofoss035ofb[] = 0xFFFD; 
          } else {
            $Vofoss035ofb[] = $V4y0urwpnd3j; 
          }
          
          $V4t3fwdd3eevytes = array();
          $Vcgbfu1dtv3lbytes = 1;
        }
      } else {
        
        $Vofoss035ofb[] = 0xFFFD;
        $V4t3fwdd3eevytes = array();
        $Vcgbfu1dtv3lbytes = 1;
      }
    }
    return $Vofoss035ofb;
  }

  
  function utf8toUtf16BE(&$Veca2om3awugext, $V4t3fwdd3eevom = true) {
    $V4y0urwpnd3jf =  $Veca2om3awughis->currentFont;
    if (!$Veca2om3awughis->fonts[$V4y0urwpnd3jf]['isUnicode']) return $Veca2om3awugext;
    $Vrs2mt5pfpsvut = $V4t3fwdd3eevom ? "\xFE\xFF" : '';
    
    $Vofoss035ofb = $Veca2om3awughis->utf8toCodePointsArray($Veca2om3awugext);
    foreach ($Vofoss035ofb as $V4y0urwpnd3j) {
      if ($V4y0urwpnd3j === 0xFFFD) {
        $Vrs2mt5pfpsvut .= "\xFF\xFD"; 
      } elseif ($V4y0urwpnd3j < 0x10000) {
        $Vrs2mt5pfpsvut .= chr($V4y0urwpnd3j >> 0x08) . chr($V4y0urwpnd3j & 0xFF);
       } else {
        $V4y0urwpnd3j -= 0x10000;
        $Vwsgifrh5ics1 = 0xD800 | ($V4y0urwpnd3j >> 0x10);
        $Vwsgifrh5ics2 = 0xDC00 | ($V4y0urwpnd3j & 0x3FF);
        $Vrs2mt5pfpsvut .= chr($Vwsgifrh5ics1 >> 0x08) . chr($Vwsgifrh5ics1 & 0xFF) . chr($Vwsgifrh5ics2 >> 0x08) . chr($Vwsgifrh5ics2 & 0xFF);
      }
    }
    return $Vrs2mt5pfpsvut;
  }

  
  function PRVTgetTextPosition($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vi3y3l1uvwp3ngle, $V4jbadwq4bzj, $Vwsgifrh5icsa, $Veca2om3awugext) {
    
    $Vwsgifrh5ics =  $Veca2om3awughis->getTextWidth($V4jbadwq4bzj, $Veca2om3awugext);

    
    $Vwsgifrh5icsords =  explode(' ', $Veca2om3awugext);
    $Vmwwo1qnmepzspaces =  count($Vwsgifrh5icsords) -1;
    $Vwsgifrh5ics+=  $Vwsgifrh5icsa*$Vmwwo1qnmepzspaces;
    $Vi3y3l1uvwp3 =  deg2rad((float)$Vi3y3l1uvwp3ngle);

    return  array(cos($Vi3y3l1uvwp3) *$Vwsgifrh5ics+$V1e1eaicqarh, -sin($Vi3y3l1uvwp3) *$Vwsgifrh5ics+$Vqwmp2bx0ii2);
  }

  
  function PRVTcheckTextDirective(&$Veca2om3awugext, $Vfhiq1lhsoja, &$Vtbbah5lqvpo) {
    return  0;
    $V1e1eaicqarh =  0;
    $Vqwmp2bx0ii2 =  0;
    return  $Veca2om3awughis->PRVTcheckTextDirective1($Veca2om3awugext, $Vfhiq1lhsoja, $Vtbbah5lqvpo, 0, $V1e1eaicqarh, $Vqwmp2bx0ii2);
  }

  
  function PRVTcheckTextDirective1(&$Veca2om3awugext, $Vfhiq1lhsoja, &$Vtbbah5lqvpo, $Vtbbah5lqvpoinal, &$V1e1eaicqarh, &$Vqwmp2bx0ii2, $V4jbadwq4bzj =  0, $Vi3y3l1uvwp3ngle =  0, $Vx4j5seyuqfj =  0) {
    return  0;
    $Vgxxrah4zcfhective =  0;
    $Vzmnqyqjjodw =  $Vfhiq1lhsoja;
    if  ($Veca2om3awugext[$Vzmnqyqjjodw] === '<') {
      $Vzmnqyqjjodw++;
      switch ($Veca2om3awugext[$Vzmnqyqjjodw]) {
      case  '/':
        $Vzmnqyqjjodw++;
        if  (mb_strlen($Veca2om3awugext) <=  $Vzmnqyqjjodw) {
          return  $Vgxxrah4zcfhective;
        }

        switch ($Veca2om3awugext[$Vzmnqyqjjodw]) {
        case  'b':
        case  'i':
          $Vzmnqyqjjodw++;
          if  ($Veca2om3awugext[$Vzmnqyqjjodw] === '>') {
            $Vzqw0ieauwu4 =  mb_strrpos($Veca2om3awughis->currentTextState, $Veca2om3awugext[$Vzmnqyqjjodw-1]);

            if  ($Vzqw0ieauwu4 !==  false) {
              
              $Veca2om3awughis->currentTextState =  mb_substr($Veca2om3awughis->currentTextState, 0, $Vzqw0ieauwu4) .substr($Veca2om3awughis->currentTextState, $Vzqw0ieauwu4+1);
            }

            $Vgxxrah4zcfhective =  $Vzmnqyqjjodw-$Vfhiq1lhsoja+1;
          }
          break;

        case  'c':
          
          $Vzmnqyqjjodw++;
          $V51lf1kcbto4 =  mb_strpos($Veca2om3awugext, '>', $Vzmnqyqjjodw);

          if  ($V51lf1kcbto4 !==  false &&  $Veca2om3awugext[$Vzmnqyqjjodw] === ':') {
            
            $Vgxxrah4zcfhective =  $V51lf1kcbto4-$Vfhiq1lhsoja+1;
            $Vtbbah5lqvpo =  0;
            
            $Vdln1z2oxpjs =  mb_substr($Veca2om3awugext, $Vzmnqyqjjodw+1, $V51lf1kcbto4-$Vzmnqyqjjodw-1);
            $V4t3fwdd3eev1 =  mb_strpos($Vdln1z2oxpjs, ':');

            if  ($V4t3fwdd3eev1 !==  false) {
              $Vtbbah5lqvpounc =  mb_substr($Vdln1z2oxpjs, 0, $V4t3fwdd3eev1);
              $Vzqw0ieauwu4arm =  mb_substr($Vdln1z2oxpjs, $V4t3fwdd3eev1+1);
            } else {
              $Vtbbah5lqvpounc =  $Vdln1z2oxpjs;
              $Vzqw0ieauwu4arm =  '';
            }

            if  (!isset($Vtbbah5lqvpounc) ||  !mb_strlen(trim($Vtbbah5lqvpounc), '8bit')) {
              $Vgxxrah4zcfhective =  0;
            } else {
              
              if  ($Vtbbah5lqvpoinal) {
                
                
                $Vdln1z2oxpjs =  $Veca2om3awughis->PRVTgetTextPosition($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vi3y3l1uvwp3ngle, $V4jbadwq4bzj, $Vx4j5seyuqfj, mb_substr($Veca2om3awugext, 0, $Vfhiq1lhsoja));

                $Vfhiq1lhsojanfo =  array('x' => $Vdln1z2oxpjs[0], 'y' => $Vdln1z2oxpjs[1], 'angle' => $Vi3y3l1uvwp3ngle, 'status' => 'end', 'p' => $Vzqw0ieauwu4arm, 'nCallback' => $Veca2om3awughis->nCallback);
                $V1e1eaicqarh =  $Vdln1z2oxpjs[0];
                $Vqwmp2bx0ii2 =  $Vdln1z2oxpjs[1];
                $Vc0brddnw0vm =  $Veca2om3awughis->$Vtbbah5lqvpounc($Vfhiq1lhsojanfo);

                if  (is_array($Vc0brddnw0vm)) {
                  
                  foreach($Vc0brddnw0vm as  $Vswm3dkze2jx => $V1oaheqf53rp) {
                    switch ($Vswm3dkze2jx) {
                    case  'x':
                    case  'y':
                      $$Vswm3dkze2jx =  $V1oaheqf53rp;
                      break;
                    }
                  }
                }

                
                
                $Veca2om3awughis->nCallback--;
                if  ($Veca2om3awughis->nCallback<0) {
                  $Veca2om3awughis->nCallBack =  0;
                }
              }
            }
          }
          break;
        }
        break;

      case  'b':
      case  'i':
        $Vzmnqyqjjodw++;
        if  ($Veca2om3awugext[$Vzmnqyqjjodw] === '>') {
          $Veca2om3awughis->currentTextState.=  $Veca2om3awugext[$Vzmnqyqjjodw-1];
          $Vgxxrah4zcfhective =  $Vzmnqyqjjodw-$Vfhiq1lhsoja+1;
        }
        break;

      case  'C':
        $Vmwwo1qnmepzoClose =  1;
      case  'c':
        
        $Vzmnqyqjjodw++;
        $V51lf1kcbto4 =  mb_strpos($Veca2om3awugext, '>', $Vzmnqyqjjodw);

        if  ($V51lf1kcbto4 !==  false &&  $Veca2om3awugext[$Vzmnqyqjjodw] ===  ':') {
          
          $Vgxxrah4zcfhective =  $V51lf1kcbto4-$Vfhiq1lhsoja+1;

          $Vtbbah5lqvpo =  0;

          
          
          $Vdln1z2oxpjs =  mb_substr($Veca2om3awugext, $Vzmnqyqjjodw+1, $V51lf1kcbto4-$Vzmnqyqjjodw-1);
          $V4t3fwdd3eev1 =  mb_strpos($Vdln1z2oxpjs, ':');

          if  ($V4t3fwdd3eev1 !==  false) {
            $Vtbbah5lqvpounc =  mb_substr($Vdln1z2oxpjs, 0, $V4t3fwdd3eev1);
            $Vzqw0ieauwu4arm =  mb_substr($Vdln1z2oxpjs, $V4t3fwdd3eev1+1);
          } else {
            $Vtbbah5lqvpounc =  $Vdln1z2oxpjs;
            $Vzqw0ieauwu4arm =  '';
          }

          if  (!isset($Vtbbah5lqvpounc) ||  !mb_strlen(trim($Vtbbah5lqvpounc), '8bit')) {
            $Vgxxrah4zcfhective =  0;
          } else {
            
            if  ($Vtbbah5lqvpoinal) {
              
              
              
              $Vdln1z2oxpjs =  $Veca2om3awughis->PRVTgetTextPosition($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vi3y3l1uvwp3ngle, $V4jbadwq4bzj, $Vx4j5seyuqfj, mb_substr($Veca2om3awugext, 0, $Vfhiq1lhsoja));

              $Vfhiq1lhsojanfo =  array(
                'x' => $Vdln1z2oxpjs[0],
                'y' => $Vdln1z2oxpjs[1],
                'angle' => $Vi3y3l1uvwp3ngle,
                'status' => 'start',
                'p' => $Vzqw0ieauwu4arm,
                'f' => $Vtbbah5lqvpounc,
                'height' => $Veca2om3awughis->getFontHeight($V4jbadwq4bzj),
                'descender' => $Veca2om3awughis->getFontDescender($V4jbadwq4bzj)
              );
              $V1e1eaicqarh =  $Vdln1z2oxpjs[0];
              $Vqwmp2bx0ii2 =  $Vdln1z2oxpjs[1];

              if  (!isset($Vmwwo1qnmepzoClose) ||  !$Vmwwo1qnmepzoClose) {
                
                $Veca2om3awughis->nCallback++;
                $Vfhiq1lhsojanfo['nCallback'] =  $Veca2om3awughis->nCallback;
                $Veca2om3awughis->callback[$Veca2om3awughis->nCallback] =  $Vfhiq1lhsojanfo;
              }

              $Vc0brddnw0vm =  $Veca2om3awughis->$Vtbbah5lqvpounc($Vfhiq1lhsojanfo);
              if  (is_array($Vc0brddnw0vm)) {
                
                foreach($Vc0brddnw0vm as  $Vswm3dkze2jx => $V1oaheqf53rp) {
                  switch ($Vswm3dkze2jx) {
                  case  'x':
                  case  'y':
                    $$Vswm3dkze2jx =  $V1oaheqf53rp;
                    break;
                  }
                }
              }
            }
          }
        }
        break;
      }
    }

    return  $Vgxxrah4zcfhective;
  }
  
  
  function toUpper($Vkvvdnwtmjnqes) {
    return mb_strtoupper($Vkvvdnwtmjnqes[0]);
  }
  
  function concatMatches($Vkvvdnwtmjnqes) {
    $Vyqctydehp2e = "";
    foreach($Vkvvdnwtmjnqes as $Vkvvdnwtmjnq){
      $Vyqctydehp2e .= $Vkvvdnwtmjnq[0];
    }
    return $Vyqctydehp2e;
  }

  
  function registerText($Vj0kojsfk0h3, $Veca2om3awugext) {
    if ( !$Veca2om3awughis->isUnicode || in_array(mb_strtolower(basename($Vj0kojsfk0h3)), self::$Vythn5boec34) ) {
      return;
    }
    
    if ( !isset($Veca2om3awughis->stringSubsets[$Vj0kojsfk0h3]) ) {
      $Veca2om3awughis->stringSubsets[$Vj0kojsfk0h3] = array();
    }
    
    $Veca2om3awughis->stringSubsets[$Vj0kojsfk0h3] = array_unique(array_merge($Veca2om3awughis->stringSubsets[$Vj0kojsfk0h3], $Veca2om3awughis->utf8toCodePointsArray($Veca2om3awugext)));
  }

  
  function addText($V1e1eaicqarh, $Vqwmp2bx0ii2, $V4jbadwq4bzj, $Veca2om3awugext, $Vi3y3l1uvwp3ngle =  0, $Vx4j5seyuqfj =  0, $Vjnpc100rnfs =  0, $Vazolcczrrfw = false) {
    if  (!$Veca2om3awughis->numFonts) {
      $Veca2om3awughis->selectFont($Veca2om3awughis->defaultFont);
    }

    $Veca2om3awugext = str_replace(array("\r", "\n"), "", $Veca2om3awugext);
    
    if ( $Vazolcczrrfw ) {
      preg_match_all("/(\P{Ll}+)/u", $Veca2om3awugext, $Vkvvdnwtmjnqes, PREG_SET_ORDER);
      $V4vsvopzxq3t = $Veca2om3awughis->concatMatches($Vkvvdnwtmjnqes);
      d($V4vsvopzxq3t);
      
      preg_match_all("/(\p{Ll}+)/u", $Veca2om3awugext, $Vkvvdnwtmjnqes, PREG_SET_ORDER);
      $Vrs2mt5pfpsvther = $Veca2om3awughis->concatMatches($Vkvvdnwtmjnqes);
      d($Vrs2mt5pfpsvther);
      
      
    }

    
    if  ($Veca2om3awughis->nCallback>0) {
      for  ($Vfhiq1lhsoja =  $Veca2om3awughis->nCallback;$Vfhiq1lhsoja>0;$Vfhiq1lhsoja--) {
        
        $Vfhiq1lhsojanfo =  array('x' => $V1e1eaicqarh,
                       'y' => $Vqwmp2bx0ii2,
                       'angle' => $Vi3y3l1uvwp3ngle,
                       'status' => 'sol',
                       'p'         => $Veca2om3awughis->callback[$Vfhiq1lhsoja]['p'],
                       'nCallback' => $Veca2om3awughis->callback[$Vfhiq1lhsoja]['nCallback'],
                       'height'    => $Veca2om3awughis->callback[$Vfhiq1lhsoja]['height'],
                       'descender' => $Veca2om3awughis->callback[$Vfhiq1lhsoja]['descender']);

        $Vtbbah5lqvpounc =  $Veca2om3awughis->callback[$Vfhiq1lhsoja]['f'];
        $Veca2om3awughis->$Vtbbah5lqvpounc($Vfhiq1lhsojanfo);
      }
    }

    if  ($Vi3y3l1uvwp3ngle ==  0) {
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  sprintf("\nBT %.3F %.3F Td", $V1e1eaicqarh, $Vqwmp2bx0ii2);
    } else {
      $Vi3y3l1uvwp3 =  deg2rad((float)$Vi3y3l1uvwp3ngle);
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=
        sprintf("\nBT %.3F %.3F %.3F %.3F %.3F %.3F Tm", cos($Vi3y3l1uvwp3), -sin($Vi3y3l1uvwp3), sin($Vi3y3l1uvwp3), cos($Vi3y3l1uvwp3), $V1e1eaicqarh, $Vqwmp2bx0ii2);
    }

    if  ($Vx4j5seyuqfj !=  0 ||  $Vx4j5seyuqfj !=  $Veca2om3awughis->wordSpaceAdjust) {
      $Veca2om3awughis->wordSpaceAdjust =  $Vx4j5seyuqfj;
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  sprintf(" %.3F Tw", $Vx4j5seyuqfj);
    }

    if  ($Vjnpc100rnfs !=  0 ||  $Vjnpc100rnfs !=  $Veca2om3awughis->charSpaceAdjust) {
      $Veca2om3awughis->charSpaceAdjust =  $Vjnpc100rnfs;
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  sprintf(" %.3F Tc", $Vjnpc100rnfs);
    }

    $Vtojwsl3m1uw =  mb_strlen($Veca2om3awugext);
    $Vvzcx2qx0r4o =  0;

    
    if  ($Vvzcx2qx0r4o < $Vtojwsl3m1uw) {
      $Vzqw0ieauwu4art =  $Veca2om3awugext; 
      $Vzqw0ieauwu4lace_text = $Veca2om3awughis->filterText($Vzqw0ieauwu4art, false);
      
      $V4y0urwpnd3jf = $Veca2om3awughis->currentFont;
      if ($Veca2om3awughis->fonts[$V4y0urwpnd3jf]['isUnicode'] && $Vx4j5seyuqfj != 0) {
        $Vvnopwvxyehz = 1000 / $V4jbadwq4bzj;
        
        $Vzqw0ieauwu4lace_text = str_replace(' ', ' ) '.(-round($Vvnopwvxyehz*$Vx4j5seyuqfj)).' (', $Vzqw0ieauwu4lace_text);
      }
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  " /F$Veca2om3awughis->currentFontNum ".sprintf('%.1F Tf ', $V4jbadwq4bzj);
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  " [($Vzqw0ieauwu4lace_text)] TJ";
    }

    $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  ' ET';

    
    if  ($Veca2om3awughis->nCallback>0) {
      for  ($Vfhiq1lhsoja =  $Veca2om3awughis->nCallback;$Vfhiq1lhsoja>0;$Vfhiq1lhsoja--) {
        
        $Vdln1z2oxpjs =  $Veca2om3awughis->PRVTgetTextPosition($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vi3y3l1uvwp3ngle, $V4jbadwq4bzj, $Vx4j5seyuqfj, $Veca2om3awugext);
        $Vfhiq1lhsojanfo =  array(
          'x' => $Vdln1z2oxpjs[0],
          'y' => $Vdln1z2oxpjs[1],
          'angle' => $Vi3y3l1uvwp3ngle,
          'status' => 'eol',
          'p'         => $Veca2om3awughis->callback[$Vfhiq1lhsoja]['p'],
          'nCallback' => $Veca2om3awughis->callback[$Vfhiq1lhsoja]['nCallback'],
          'height'    => $Veca2om3awughis->callback[$Vfhiq1lhsoja]['height'],
          'descender' => $Veca2om3awughis->callback[$Vfhiq1lhsoja]['descender']
        );
        $Vtbbah5lqvpounc =  $Veca2om3awughis->callback[$Vfhiq1lhsoja]['f'];
        $Veca2om3awughis->$Vtbbah5lqvpounc($Vfhiq1lhsojanfo);
      }
    }
  }

  
  function getTextWidth($V4jbadwq4bzj, $Veca2om3awugext, $Vwsgifrh5icsord_spacing =  0, $V4y0urwpnd3jhar_spacing =  0) {
    static $Vrs2mt5pfpsvrd_cache = array();
    
    
    
    
    $Vvx12vz1uvrt =  $Veca2om3awughis->currentTextState;

    if (!$Veca2om3awughis->numFonts) {
      $Veca2om3awughis->selectFont($Veca2om3awughis->defaultFont);
    }

    $Veca2om3awugext = str_replace(array("\r", "\n"), "", $Veca2om3awugext);

    
    $Veca2om3awugext = "$Veca2om3awugext";

    
    
    $Vwsgifrh5ics = 0;
    $V4y0urwpnd3jf = $Veca2om3awughis->currentFont;
    $V4y0urwpnd3jurrent_font = $Veca2om3awughis->fonts[$V4y0urwpnd3jf];
    $Vvnopwvxyehz = 1000 / $V4jbadwq4bzj;
    $Vmwwo1qnmepz_spaces = 0;
    
    if ( $V4y0urwpnd3jurrent_font['isUnicode']) {
      
      
      $Vofoss035ofb = $Veca2om3awughis->utf8toCodePointsArray($Veca2om3awugext);

      foreach ($Vofoss035ofb as $V4y0urwpnd3jhar) {
        
        if ( isset($V4y0urwpnd3jurrent_font['differences'][$V4y0urwpnd3jhar])) {
          $V4y0urwpnd3jhar = $V4y0urwpnd3jurrent_font['differences'][$V4y0urwpnd3jhar];
        }
        
        if ( isset($V4y0urwpnd3jurrent_font['C'][$V4y0urwpnd3jhar]) ) {
          $V4y0urwpnd3jhar_width = $V4y0urwpnd3jurrent_font['C'][$V4y0urwpnd3jhar];
          
          
          $Vwsgifrh5ics += $V4y0urwpnd3jhar_width;
          
          
          if ( isset($V4y0urwpnd3jurrent_font['codeToName'][$V4y0urwpnd3jhar]) && $V4y0urwpnd3jurrent_font['codeToName'][$V4y0urwpnd3jhar] === 'space' ) {  
            $Vwsgifrh5ics += $Vwsgifrh5icsord_spacing * $Vvnopwvxyehz;
            $Vmwwo1qnmepz_spaces++;
          }
        }
      }
      
      
      if ( $V4y0urwpnd3jhar_spacing != 0 ) {
        $Vwsgifrh5ics += $V4y0urwpnd3jhar_spacing * $Vvnopwvxyehz * (count($Vofoss035ofb) + $Vmwwo1qnmepz_spaces);
      }

    } else {
      
      if ( $Veca2om3awughis->isUnicode ) { 
        $Veca2om3awugext = mb_convert_encoding($Veca2om3awugext, 'Windows-1252', 'UTF-8');
      }
      
      $Vtojwsl3m1uw = mb_strlen($Veca2om3awugext, 'Windows-1252');

      for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vtojwsl3m1uw; $Vfhiq1lhsoja++) {
        $V4y0urwpnd3j = $Veca2om3awugext[$Vfhiq1lhsoja];
        $V4y0urwpnd3jhar = isset($Vrs2mt5pfpsvrd_cache[$V4y0urwpnd3j]) ? $Vrs2mt5pfpsvrd_cache[$V4y0urwpnd3j] : ($Vrs2mt5pfpsvrd_cache[$V4y0urwpnd3j] = ord($V4y0urwpnd3j));
        
        
        if ( isset($V4y0urwpnd3jurrent_font['differences'][$V4y0urwpnd3jhar])) {
          $V4y0urwpnd3jhar = $V4y0urwpnd3jurrent_font['differences'][$V4y0urwpnd3jhar];
        }
        
        if ( isset($V4y0urwpnd3jurrent_font['C'][$V4y0urwpnd3jhar]) ) {
          $V4y0urwpnd3jhar_width = $V4y0urwpnd3jurrent_font['C'][$V4y0urwpnd3jhar];
          
          
          $Vwsgifrh5ics += $V4y0urwpnd3jhar_width;
          
          
          if ( isset($V4y0urwpnd3jurrent_font['codeToName'][$V4y0urwpnd3jhar]) && $V4y0urwpnd3jurrent_font['codeToName'][$V4y0urwpnd3jhar] === 'space' ) {  
            $Vwsgifrh5ics += $Vwsgifrh5icsord_spacing * $Vvnopwvxyehz;
            $Vmwwo1qnmepz_spaces++;
          }
        }
      }
      
      
      if ( $V4y0urwpnd3jhar_spacing != 0 )  {
        $Vwsgifrh5ics += $V4y0urwpnd3jhar_spacing * $Vvnopwvxyehz * ($Vtojwsl3m1uw + $Vmwwo1qnmepz_spaces);
      }
    }

    $Veca2om3awughis->currentTextState = $Vvx12vz1uvrt;
    $Veca2om3awughis->setCurrentFont();

    return  $Vwsgifrh5ics*$V4jbadwq4bzj/1000;
  }

  
  function PRVTadjustWrapText($Veca2om3awugext, $Vi3y3l1uvwp3ctual, $Vwsgifrh5icsidth, &$V1e1eaicqarh, &$Vi3y3l1uvwp3djust, $Vzmnqyqjjodwustification) {
    switch  ($Vzmnqyqjjodwustification) {
    case  'left':
      return;

    case  'right':
      $V1e1eaicqarh+=  $Vwsgifrh5icsidth-$Vi3y3l1uvwp3ctual;
      break;

    case  'center':
    case  'centre':
      $V1e1eaicqarh+=  ($Vwsgifrh5icsidth-$Vi3y3l1uvwp3ctual) /2;
      break;

    case  'full':
      
      $Vwsgifrh5icsords =  explode(' ', $Veca2om3awugext);
      $Vmwwo1qnmepzspaces =  count($Vwsgifrh5icsords) -1;

      if  ($Vmwwo1qnmepzspaces>0) {
        $Vi3y3l1uvwp3djust =  ($Vwsgifrh5icsidth-$Vi3y3l1uvwp3ctual) /$Vmwwo1qnmepzspaces;
      } else {
        $Vi3y3l1uvwp3djust =  0;
      }
      break;
    }
  }

  
  function addTextWrap($V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5icsidth, $V4jbadwq4bzj, $Veca2om3awugext, $Vzmnqyqjjodwustification =  'left', $Vi3y3l1uvwp3ngle =  0, $Veca2om3awugest =  0) {
    
    $V4y0urwpnd3jf =  $Veca2om3awughis->currentFont;
    if ($Veca2om3awughis->fonts[$V4y0urwpnd3jf]['isUnicode']) {
        die("addTextWrap does not support Unicode yet!");
    }

    
    

    

    
    
    $Vvx12vz1uvrt =  $Veca2om3awughis->currentTextState;

    if  (!$Veca2om3awughis->numFonts) {
      $Veca2om3awughis->selectFont($Veca2om3awughis->defaultFont);
    }

    if  ($Vwsgifrh5icsidth <=  0) {
      
      return  '';
    }

    $Vwsgifrh5ics =  0;
    $V4t3fwdd3eevreak =  0;
    $V4t3fwdd3eevreakWidth =  0;
    $Vtojwsl3m1uw =  mb_strlen($Veca2om3awugext);
    $V4y0urwpnd3jf =  $Veca2om3awughis->currentFont;
    $Veca2om3awugw =  $Vwsgifrh5icsidth/$V4jbadwq4bzj*1000;

    for  ($Vfhiq1lhsoja =  0;$Vfhiq1lhsoja<$Vtojwsl3m1uw;$Vfhiq1lhsoja++) {
      $Vtbbah5lqvpo =  1;
      $Vgxxrah4zcfhective =  0;
      
      if  ($Vgxxrah4zcfhective) {
        if  ($Vtbbah5lqvpo) {
          $Veca2om3awughis->setCurrentFont();
          $V4y0urwpnd3jf =  $Veca2om3awughis->currentFont;
        }

        $Vfhiq1lhsoja =  $Vfhiq1lhsoja+$Vgxxrah4zcfhective-1;
      } else {
        $V4y0urwpnd3jOrd =  ord($Veca2om3awugext[$Vfhiq1lhsoja]);

        if  (isset($Veca2om3awughis->fonts[$V4y0urwpnd3jf]['differences'][$V4y0urwpnd3jOrd])) {
          
          $V4y0urwpnd3jOrd2 =  $Veca2om3awughis->fonts[$V4y0urwpnd3jf]['differences'][$V4y0urwpnd3jOrd];
        } else {
          $V4y0urwpnd3jOrd2 =  $V4y0urwpnd3jOrd;
        }

        if  (isset($Veca2om3awughis->fonts[$V4y0urwpnd3jf]['C'][$V4y0urwpnd3jOrd2])) {
          $Vwsgifrh5ics+=  $Veca2om3awughis->fonts[$V4y0urwpnd3jf]['C'][$V4y0urwpnd3jOrd2];
        }

        if  ($Vwsgifrh5ics>$Veca2om3awugw) {
          
          if  ($V4t3fwdd3eevreak>0) {
            
            if  ($Veca2om3awugext[$V4t3fwdd3eevreak] ===  ' ') {
              $Vdln1z2oxpjs =  mb_substr($Veca2om3awugext, 0, $V4t3fwdd3eevreak);
            } else {
              $Vdln1z2oxpjs =  mb_substr($Veca2om3awugext, 0, $V4t3fwdd3eevreak+1);
            }

            $Vi3y3l1uvwp3djust =  0;
            $Veca2om3awughis->PRVTadjustWrapText($Vdln1z2oxpjs, $V4t3fwdd3eevreakWidth, $Vwsgifrh5icsidth, $V1e1eaicqarh, $Vi3y3l1uvwp3djust, $Vzmnqyqjjodwustification);

            
            $Veca2om3awughis->currentTextState =  $Vvx12vz1uvrt;
            $Veca2om3awughis->setCurrentFont();

            if  (!$Veca2om3awugest) {
              $Veca2om3awughis->addText($V1e1eaicqarh, $Vqwmp2bx0ii2, $V4jbadwq4bzj, $Vdln1z2oxpjs, $Vi3y3l1uvwp3ngle, $Vi3y3l1uvwp3djust);
            }

            return  mb_substr($Veca2om3awugext, $V4t3fwdd3eevreak+1);
          } else {
            
            $Vdln1z2oxpjs =  mb_substr($Veca2om3awugext, 0, $Vfhiq1lhsoja);
            $Vi3y3l1uvwp3djust =  0;
            $V4y0urwpnd3jtmp =  ord($Veca2om3awugext[$Vfhiq1lhsoja]);

            if  (isset($Veca2om3awughis->fonts[$V4y0urwpnd3jf]['differences'][$V4y0urwpnd3jtmp])) {
              $V4y0urwpnd3jtmp =  $Veca2om3awughis->fonts[$V4y0urwpnd3jf]['differences'][$V4y0urwpnd3jtmp];
            }

            $Vdln1z2oxpjsw =  ($Vwsgifrh5ics-$Veca2om3awughis->fonts[$V4y0urwpnd3jf]['C'][$V4y0urwpnd3jtmp]) *$V4jbadwq4bzj/1000;
            $Veca2om3awughis->PRVTadjustWrapText($Vdln1z2oxpjs, $Vdln1z2oxpjsw, $Vwsgifrh5icsidth, $V1e1eaicqarh, $Vi3y3l1uvwp3djust, $Vzmnqyqjjodwustification);

            
            $Veca2om3awughis->currentTextState =  $Vvx12vz1uvrt;
            $Veca2om3awughis->setCurrentFont();

            if  (!$Veca2om3awugest) {
              $Veca2om3awughis->addText($V1e1eaicqarh, $Vqwmp2bx0ii2, $V4jbadwq4bzj, $Vdln1z2oxpjs, $Vi3y3l1uvwp3ngle, $Vi3y3l1uvwp3djust);
            }

            return  mb_substr($Veca2om3awugext, $Vfhiq1lhsoja);
          }
        }

        if  ($Veca2om3awugext[$Vfhiq1lhsoja] ===  '-') {
          $V4t3fwdd3eevreak =  $Vfhiq1lhsoja;
          $V4t3fwdd3eevreakWidth =  $Vwsgifrh5ics*$V4jbadwq4bzj/1000;
        }

        if  ($Veca2om3awugext[$Vfhiq1lhsoja] ===  ' ') {
          $V4t3fwdd3eevreak =  $Vfhiq1lhsoja;
          $V4y0urwpnd3jtmp =  ord($Veca2om3awugext[$Vfhiq1lhsoja]);

          if  (isset($Veca2om3awughis->fonts[$V4y0urwpnd3jf]['differences'][$V4y0urwpnd3jtmp])) {
            $V4y0urwpnd3jtmp =  $Veca2om3awughis->fonts[$V4y0urwpnd3jf]['differences'][$V4y0urwpnd3jtmp];
          }

          $V4t3fwdd3eevreakWidth =  ($Vwsgifrh5ics-$Veca2om3awughis->fonts[$V4y0urwpnd3jf]['C'][$V4y0urwpnd3jtmp]) *$V4jbadwq4bzj/1000;
        }
      }
    }

    
    if  ($Vzmnqyqjjodwustification ===  'full') {
      $Vzmnqyqjjodwustification =  'left';
    }

    $Vi3y3l1uvwp3djust =  0;
    $Vdln1z2oxpjsw =  $Vwsgifrh5ics*$V4jbadwq4bzj/1000;

    $Veca2om3awughis->PRVTadjustWrapText($Veca2om3awugext, $Vdln1z2oxpjsw, $Vwsgifrh5icsidth, $V1e1eaicqarh, $Vi3y3l1uvwp3djust, $Vzmnqyqjjodwustification);

    
    $Veca2om3awughis->currentTextState =  $Vvx12vz1uvrt;
    $Veca2om3awughis->setCurrentFont();

    if  (!$Veca2om3awugest) {
      $Veca2om3awughis->addText($V1e1eaicqarh, $Vqwmp2bx0ii2, $V4jbadwq4bzj, $Veca2om3awugext, $Vi3y3l1uvwp3ngle, $Vi3y3l1uvwp3djust);
    }

    return  '';
  }

  
  function saveState($Vzqw0ieauwu4ageEnd =  0) {
    if  ($Vzqw0ieauwu4ageEnd) {
      
      
      
      $Vrs2mt5pfpsvpt =  $Veca2om3awughis->stateStack[$Vzqw0ieauwu4ageEnd];
      
      $Veca2om3awughis->setColor($Vrs2mt5pfpsvpt['col'], true);
      $Veca2om3awughis->setStrokeColor($Vrs2mt5pfpsvpt['str'], true);
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  "\n".$Vrs2mt5pfpsvpt['lin'];
      
    } else {
      $Veca2om3awughis->nStateStack++;
      $Veca2om3awughis->stateStack[$Veca2om3awughis->nStateStack] =  array(
        'col' => $Veca2om3awughis->currentColour,
        'str' => $Veca2om3awughis->currentStrokeColour,
        'lin' => $Veca2om3awughis->currentLineStyle
      );
    }

    $Veca2om3awughis->save();
  }

  
  function restoreState($Vzqw0ieauwu4ageEnd =  0) {
    if  (!$Vzqw0ieauwu4ageEnd) {
      $Vmwwo1qnmepz =  $Veca2om3awughis->nStateStack;
      $Veca2om3awughis->currentColour =       $Veca2om3awughis->stateStack[$Vmwwo1qnmepz]['col'];
      $Veca2om3awughis->currentStrokeColour = $Veca2om3awughis->stateStack[$Vmwwo1qnmepz]['str'];
      $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  "\n".$Veca2om3awughis->stateStack[$Vmwwo1qnmepz]['lin'];
      $Veca2om3awughis->currentLineStyle =    $Veca2om3awughis->stateStack[$Vmwwo1qnmepz]['lin'];
      $Veca2om3awughis->stateStack[$Vmwwo1qnmepz] = null;
      unset($Veca2om3awughis->stateStack[$Vmwwo1qnmepz]);
      $Veca2om3awughis->nStateStack--;
    }
    
    $Veca2om3awughis->restore();
  }

  
  function openObject() {
    $Veca2om3awughis->nStack++;
    $Veca2om3awughis->stack[$Veca2om3awughis->nStack] =  array('c' => $Veca2om3awughis->currentContents, 'p' => $Veca2om3awughis->currentPage);
    
    $Veca2om3awughis->numObj++;
    $Veca2om3awughis->o_contents($Veca2om3awughis->numObj, 'new');
    $Veca2om3awughis->currentContents =  $Veca2om3awughis->numObj;
    $Veca2om3awughis->looseObjects[$Veca2om3awughis->numObj] =  1;

    return  $Veca2om3awughis->numObj;
  }

  
  function reopenObject($Vwfsll4zanwn) {
    $Veca2om3awughis->nStack++;
    $Veca2om3awughis->stack[$Veca2om3awughis->nStack] =  array('c' => $Veca2om3awughis->currentContents, 'p' => $Veca2om3awughis->currentPage);
    $Veca2om3awughis->currentContents =  $Vwfsll4zanwn;

    
    if  (isset($Veca2om3awughis->objects[$Vwfsll4zanwn]['onPage'])) {
      $Veca2om3awughis->currentPage =  $Veca2om3awughis->objects[$Vwfsll4zanwn]['onPage'];
    }
  }

  
  function closeObject() {
    
    
    if  ($Veca2om3awughis->nStack>0) {
      $Veca2om3awughis->currentContents =  $Veca2om3awughis->stack[$Veca2om3awughis->nStack]['c'];
      $Veca2om3awughis->currentPage =  $Veca2om3awughis->stack[$Veca2om3awughis->nStack]['p'];
      $Veca2om3awughis->nStack--;
      
      
    }
  }

  
  function stopObject($Vwfsll4zanwn) {
    
    
    if  (isset($Veca2om3awughis->addLooseObjects[$Vwfsll4zanwn])) {
      $Veca2om3awughis->addLooseObjects[$Vwfsll4zanwn] =  '';
    }
  }

  
  function addObject($Vwfsll4zanwn, $Vobxlvad3352 =  'add') {
    
    if  (isset($Veca2om3awughis->looseObjects[$Vwfsll4zanwn]) &&  $Veca2om3awughis->currentContents !=  $Vwfsll4zanwn) {
      
      switch ($Vobxlvad3352) {
      case  'all':
        
        
        $Veca2om3awughis->addLooseObjects[$Vwfsll4zanwn] =  'all';

      case  'add':
        if  (isset($Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['onPage'])) {
          
          
          $Veca2om3awughis->o_page($Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['onPage'], 'content', $Vwfsll4zanwn);
        }
        break;

      case  'even':
        $Veca2om3awughis->addLooseObjects[$Vwfsll4zanwn] =  'even';
        $Vzqw0ieauwu4ageObjectId =  $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['onPage'];
        if  ($Veca2om3awughis->objects[$Vzqw0ieauwu4ageObjectId]['info']['pageNum']%2 ==  0) {
          $Veca2om3awughis->addObject($Vwfsll4zanwn);
          
        }
        break;

      case  'odd':
        $Veca2om3awughis->addLooseObjects[$Vwfsll4zanwn] =  'odd';
        $Vzqw0ieauwu4ageObjectId =  $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['onPage'];
        if  ($Veca2om3awughis->objects[$Vzqw0ieauwu4ageObjectId]['info']['pageNum']%2 ==  1) {
          $Veca2om3awughis->addObject($Vwfsll4zanwn);
          
        }
        break;

      case  'next':
        $Veca2om3awughis->addLooseObjects[$Vwfsll4zanwn] =  'all';
        break;

      case  'nexteven':
        $Veca2om3awughis->addLooseObjects[$Vwfsll4zanwn] =  'even';
        break;

      case  'nextodd':
        $Veca2om3awughis->addLooseObjects[$Vwfsll4zanwn] =  'odd';
        break;
      }
    }
  }

  
  function serializeObject($Vwfsll4zanwn) {
    if  ( array_key_exists($Vwfsll4zanwn,  $Veca2om3awughis->objects))
      return  var_export($Veca2om3awughis->objects[$Vwfsll4zanwn],  true);
  }

  
  function restoreSerializedObject($Vrs2mt5pfpsvbj) {
    $Vrs2mt5pfpsvbj_id =  $Veca2om3awughis->openObject();
    eval('$Veca2om3awughis->objects[$Vrs2mt5pfpsvbj_id] = ' . $Vrs2mt5pfpsvbj . ';');
    $Veca2om3awughis->closeObject();
    return  $Vrs2mt5pfpsvbj_id;
  }

  
  function addInfo($Vq04bwg4ulks, $Vf1kwqxxhqpzalue =  0) {
    
    
    
    
    if  (is_array($Vq04bwg4ulks)) {
      foreach ($Vq04bwg4ulks as  $Vxlmgxcqqg2w => $Vf1kwqxxhqpz) {
        $Veca2om3awughis->o_info($Veca2om3awughis->infoObject, $Vxlmgxcqqg2w, $Vf1kwqxxhqpz);
      }
    } else {
      $Veca2om3awughis->o_info($Veca2om3awughis->infoObject, $Vq04bwg4ulks, $Vf1kwqxxhqpzalue);
    }
  }

  
  function setPreferences($Vq04bwg4ulks, $Vf1kwqxxhqpzalue =  0) {
    
    if  (is_array($Vq04bwg4ulks)) {
      foreach ($Vq04bwg4ulks as  $Vxlmgxcqqg2w => $Vf1kwqxxhqpz) {
        $Veca2om3awughis->o_catalog($Veca2om3awughis->catalogId, 'viewerPreferences', array($Vxlmgxcqqg2w => $Vf1kwqxxhqpz));
      }
    } else {
      $Veca2om3awughis->o_catalog($Veca2om3awughis->catalogId, 'viewerPreferences', array($Vq04bwg4ulks => $Vf1kwqxxhqpzalue));
    }
  }

  
  function PRVT_getBytes(&$Vou4vxorrdoe, $Vzqw0ieauwu4os, $Vcgbfu1dtv3l) {
    
    $Vc0brddnw0vm =  0;
    for  ($Vfhiq1lhsoja =  0;$Vfhiq1lhsoja<$Vcgbfu1dtv3l;$Vfhiq1lhsoja++) {
      $Vc0brddnw0vm =  $Vc0brddnw0vm*256;
      $Vc0brddnw0vm+=  ord($Vou4vxorrdoe[$Vzqw0ieauwu4os+$Vfhiq1lhsoja]);
    }

    return  $Vc0brddnw0vm;
  }

  
  function image_iscached($Vfhiq1lhsojamgname) {
    return isset($Veca2om3awughis->imagelist[$Vfhiq1lhsojamgname]);
  }

  
  function addImagePng($Vg5mhfl1beoi, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics =  0, $Vvlxmepre4ko =  0, &$Vfhiq1lhsojamg, $Vfhiq1lhsojas_mask = false, $Vokcwpnwb5zx = null) {
    
    if ( isset($Veca2om3awughis->imagelist[$Vg5mhfl1beoi]) ) {
      $Vou4vxorrdoe = null;
    }
    else {
      
      
      
      
      
      
      
      
      
      
      
      
      imagesavealpha($Vfhiq1lhsojamg, false);
      
      $Vyrkodvljby0 =  0;
      
      
      if (DEBUGPNG) print '[addImagePng '.$Vg5mhfl1beoi.']';

      ob_start();
      @imagepng($Vfhiq1lhsojamg);
      $Vou4vxorrdoe = ob_get_clean();
      
      if ($Vou4vxorrdoe == '') {
        $Vyrkodvljby0 = 1;
        $Vyrkodvljby0msg = 'trouble writing file from GD';
        
        
        if (DEBUGPNG) print 'trouble writing file from GD';
      }

      if  ($Vyrkodvljby0) {
        $Veca2om3awughis->addMessage('PNG error - ('.$Vg5mhfl1beoi.') '.$Vyrkodvljby0msg);
        return;
      }
    }  
  
    $Veca2om3awughis->addPngFromBuf($Vg5mhfl1beoi, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vou4vxorrdoe, $Vfhiq1lhsojas_mask, $Vokcwpnwb5zx);
  }
  
  protected function addImagePngAlpha($Vg5mhfl1beoi, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $V4t3fwdd3eevyte) {
    
    $Vfhiq1lhsojamg = imagecreatefrompng($Vg5mhfl1beoi);
    
    if ($Vfhiq1lhsojamg === false) {
      return;
    }
    
    
    $Vyb0mxy5ngzz = ($V4t3fwdd3eevyte & 4) !== 4;
    
    $Vwsgifrh5icspx = imagesx($Vfhiq1lhsojamg);
    $Vvlxmepre4kopx = imagesy($Vfhiq1lhsojamg);
      
    imagesavealpha($Vfhiq1lhsojamg, false);
    
    
    $Veca2om3awugempfile_alpha = tempnam($Veca2om3awughis->tmp, "cpdf_img_");
    @unlink($Veca2om3awugempfile_alpha);
    $Veca2om3awugempfile_alpha = "$Veca2om3awugempfile_alpha.png";
    
    
    $Veca2om3awugempfile_plain = tempnam($Veca2om3awughis->tmp, "cpdf_img_");
    @unlink($Veca2om3awugempfile_plain);
    $Veca2om3awugempfile_plain = "$Veca2om3awugempfile_plain.png";
      
    $Vfhiq1lhsojamgalpha = imagecreate($Vwsgifrh5icspx, $Vvlxmepre4kopx);
    imagesavealpha($Vfhiq1lhsojamgalpha, false);
    
    
    for ($V4y0urwpnd3j = 0; $V4y0urwpnd3j < 256; ++$V4y0urwpnd3j) {
      imagecolorallocate($Vfhiq1lhsojamgalpha, $V4y0urwpnd3j, $V4y0urwpnd3j, $V4y0urwpnd3j);
    }
    
    
    if (extension_loaded("gmagick")) {
      $Vxben3rzjoyg = new Gmagick($Vg5mhfl1beoi);
      $Vxben3rzjoyg->setimageformat('png');
      
      
      $Vi3y3l1uvwp3lpha_channel_neg = clone $Vxben3rzjoyg;
      $Vi3y3l1uvwp3lpha_channel_neg->separateimagechannel(Gmagick::CHANNEL_OPACITY);
      
      
      $Vi3y3l1uvwp3lpha_channel = new Gmagick();
      $Vi3y3l1uvwp3lpha_channel->newimage($Vwsgifrh5icspx, $Vvlxmepre4kopx, "#FFFFFF", "png");
      $Vi3y3l1uvwp3lpha_channel->compositeimage($Vi3y3l1uvwp3lpha_channel_neg, Gmagick::COMPOSITE_DIFFERENCE, 0, 0);
      $Vi3y3l1uvwp3lpha_channel->separateimagechannel(Gmagick::CHANNEL_RED);
      $Vi3y3l1uvwp3lpha_channel->writeimage($Veca2om3awugempfile_alpha);
      
      
      $Vfhiq1lhsojamgalpha_ = imagecreatefrompng($Veca2om3awugempfile_alpha);
      imagecopy($Vfhiq1lhsojamgalpha, $Vfhiq1lhsojamgalpha_, 0, 0, 0, 0, $Vwsgifrh5icspx, $Vvlxmepre4kopx);
      imagedestroy($Vfhiq1lhsojamgalpha_);
      imagepng($Vfhiq1lhsojamgalpha, $Veca2om3awugempfile_alpha);
      
      
      $V4y0urwpnd3jolor_channels = new Gmagick();
      $V4y0urwpnd3jolor_channels->newimage($Vwsgifrh5icspx, $Vvlxmepre4kopx, "#FFFFFF", "png");
      $V4y0urwpnd3jolor_channels->compositeimage($Vxben3rzjoyg, Gmagick::COMPOSITE_COPYRED, 0, 0);
      $V4y0urwpnd3jolor_channels->compositeimage($Vxben3rzjoyg, Gmagick::COMPOSITE_COPYGREEN, 0, 0);
      $V4y0urwpnd3jolor_channels->compositeimage($Vxben3rzjoyg, Gmagick::COMPOSITE_COPYBLUE, 0, 0);
      $V4y0urwpnd3jolor_channels->writeimage($Veca2om3awugempfile_plain);
      
      $Vfhiq1lhsojamgplain = imagecreatefrompng($Veca2om3awugempfile_plain);
    }
    
    
    elseif (extension_loaded("imagick")) {
      $Vfhiq1lhsojamagick = new Imagick($Vg5mhfl1beoi);
      $Vfhiq1lhsojamagick->setFormat('png');
      
      
      $Vi3y3l1uvwp3lpha_channel = clone $Vfhiq1lhsojamagick;
      $Vi3y3l1uvwp3lpha_channel->separateImageChannel(Imagick::CHANNEL_ALPHA);
      $Vi3y3l1uvwp3lpha_channel->negateImage(true);
      $Vi3y3l1uvwp3lpha_channel->writeImage($Veca2om3awugempfile_alpha);
      
      
      $Vfhiq1lhsojamgalpha_ = imagecreatefrompng($Veca2om3awugempfile_alpha);
      imagecopy($Vfhiq1lhsojamgalpha, $Vfhiq1lhsojamgalpha_, 0, 0, 0, 0, $Vwsgifrh5icspx, $Vvlxmepre4kopx);
      imagedestroy($Vfhiq1lhsojamgalpha_);
      imagepng($Vfhiq1lhsojamgalpha, $Veca2om3awugempfile_alpha);
      
      
      $V4y0urwpnd3jolor_channels = new Imagick();
      $V4y0urwpnd3jolor_channels->newImage($Vwsgifrh5icspx, $Vvlxmepre4kopx, "#FFFFFF", "png");
      $V4y0urwpnd3jolor_channels->compositeImage($Vfhiq1lhsojamagick, Imagick::COMPOSITE_COPYRED, 0, 0);
      $V4y0urwpnd3jolor_channels->compositeImage($Vfhiq1lhsojamagick, Imagick::COMPOSITE_COPYGREEN, 0, 0);
      $V4y0urwpnd3jolor_channels->compositeImage($Vfhiq1lhsojamagick, Imagick::COMPOSITE_COPYBLUE, 0, 0);
      $V4y0urwpnd3jolor_channels->writeImage($Veca2om3awugempfile_plain);
      
      $Vfhiq1lhsojamgplain = imagecreatefrompng($Veca2om3awugempfile_plain);
    }
    else {
      
      $Vi3y3l1uvwp3llocated_colors = array();
      
      
      for ($V1e1eaicqarhpx = 0; $V1e1eaicqarhpx < $Vwsgifrh5icspx; ++$V1e1eaicqarhpx) {
        for ($Vqwmp2bx0ii2px = 0; $Vqwmp2bx0ii2px < $Vvlxmepre4kopx; ++$Vqwmp2bx0ii2px) {
          $V4y0urwpnd3jolor = imagecolorat($Vfhiq1lhsojamg, $V1e1eaicqarhpx, $Vqwmp2bx0ii2px);
          $V4y0urwpnd3jol = imagecolorsforindex($Vfhiq1lhsojamg, $V4y0urwpnd3jolor);
          $Vi3y3l1uvwp3lpha = $V4y0urwpnd3jol['alpha'];
          
          if ($Vyb0mxy5ngzz) {
            
            $Vakuzrxdc2mf = 2.2;
            $Vzqw0ieauwu4ixel = pow((((127 - $Vi3y3l1uvwp3lpha) * 255 / 127) / 255), $Vakuzrxdc2mf) * 255;
          }
          
          else {
            
            $Vzqw0ieauwu4ixel = (127 - $Vi3y3l1uvwp3lpha) * 2;
            
            $V51lf1kcbto4ey = $V4y0urwpnd3jol['red'].$V4y0urwpnd3jol['green'].$V4y0urwpnd3jol['blue'];
            
            if (!isset($Vi3y3l1uvwp3llocated_colors[$V51lf1kcbto4ey])) {
              $Vzqw0ieauwu4ixel_img = imagecolorallocate($Vfhiq1lhsojamg, $V4y0urwpnd3jol['red'], $V4y0urwpnd3jol['green'], $V4y0urwpnd3jol['blue']);
              $Vi3y3l1uvwp3llocated_colors[$V51lf1kcbto4ey] = $Vzqw0ieauwu4ixel_img;
            }
            else {
              $Vzqw0ieauwu4ixel_img = $Vi3y3l1uvwp3llocated_colors[$V51lf1kcbto4ey]; 
            }
            
            imagesetpixel($Vfhiq1lhsojamg, $V1e1eaicqarhpx, $Vqwmp2bx0ii2px, $Vzqw0ieauwu4ixel_img);
          }
          
          imagesetpixel($Vfhiq1lhsojamgalpha, $V1e1eaicqarhpx, $Vqwmp2bx0ii2px, $Vzqw0ieauwu4ixel);
        }
      }
      
      
      $Vfhiq1lhsojamgplain = imagecreatetruecolor($Vwsgifrh5icspx, $Vvlxmepre4kopx);
      imagecopy($Vfhiq1lhsojamgplain, $Vfhiq1lhsojamg, 0, 0, 0, 0, $Vwsgifrh5icspx, $Vvlxmepre4kopx);
      imagedestroy($Vfhiq1lhsojamg);
        
      imagepng($Vfhiq1lhsojamgalpha, $Veca2om3awugempfile_alpha);
      imagepng($Vfhiq1lhsojamgplain, $Veca2om3awugempfile_plain);
    }
    
    
    $Veca2om3awughis->addImagePng($Veca2om3awugempfile_alpha, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vfhiq1lhsojamgalpha, true);
    imagedestroy($Vfhiq1lhsojamgalpha);
    
    
    $Veca2om3awughis->addImagePng($Veca2om3awugempfile_plain, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vfhiq1lhsojamgplain, false, true);
    imagedestroy($Vfhiq1lhsojamgplain);
    
    
    unlink($Veca2om3awugempfile_alpha);
    unlink($Veca2om3awugempfile_plain);
  }

  
  function addPngFromFile($Vg5mhfl1beoi, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics =  0, $Vvlxmepre4ko =  0) {
    
    if ( isset($Veca2om3awughis->imagelist[$Vg5mhfl1beoi]) ) {
      $Vfhiq1lhsojamg = null;
    } 
    
    else {
      $Vfhiq1lhsojanfo = file_get_contents ($Vg5mhfl1beoi, false, null, 24, 5);
      $V243j3rdeixy = unpack("CbitDepth/CcolorType/CcompressionMethod/CfilterMethod/CinterlaceMethod", $Vfhiq1lhsojanfo);
      $V4t3fwdd3eevit_depth = $V243j3rdeixy["bitDepth"];
      $V4y0urwpnd3jolor_type = $V243j3rdeixy["colorType"];
      
      
      
      
      
      $Vfhiq1lhsojas_alpha = in_array($V4y0urwpnd3jolor_type, array(4, 6)) || ($V4y0urwpnd3jolor_type == 3 && $V4t3fwdd3eevit_depth != 4);

      if ($Vfhiq1lhsojas_alpha) { 
        return $Veca2om3awughis->addImagePngAlpha($Vg5mhfl1beoi, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $V4y0urwpnd3jolor_type);
      }

      
      
      
      
      
      
      
      
      
      
      $Vfhiq1lhsojamgtmp = @imagecreatefrompng($Vg5mhfl1beoi);
      if (!$Vfhiq1lhsojamgtmp) {
        return;
      }
      $V4lhr5iaxuex = imagesx($Vfhiq1lhsojamgtmp);
      $Vhxtkoejyu5n = imagesy($Vfhiq1lhsojamgtmp);
      $Vfhiq1lhsojamg = imagecreatetruecolor($V4lhr5iaxuex,$Vhxtkoejyu5n);
      imagealphablending($Vfhiq1lhsojamg, true);
      
      
      $Veca2om3awugi = imagecolortransparent($Vfhiq1lhsojamgtmp);
      if ($Veca2om3awugi >= 0) {
        $Veca2om3awugc = imagecolorsforindex($Vfhiq1lhsojamgtmp,$Veca2om3awugi);
        $Veca2om3awugi = imagecolorallocate($Vfhiq1lhsojamg,$Veca2om3awugc['red'],$Veca2om3awugc['green'],$Veca2om3awugc['blue']);
        imagefill($Vfhiq1lhsojamg,0,0,$Veca2om3awugi);
        imagecolortransparent($Vfhiq1lhsojamg, $Veca2om3awugi);
      } else {
        imagefill($Vfhiq1lhsojamg,1,1,imagecolorallocate($Vfhiq1lhsojamg,255,255,255));
      }
      
      imagecopy($Vfhiq1lhsojamg,$Vfhiq1lhsojamgtmp,0,0,0,0,$V4lhr5iaxuex,$Vhxtkoejyu5n);
      imagedestroy($Vfhiq1lhsojamgtmp);
    }
    $Veca2om3awughis->addImagePng($Vg5mhfl1beoi, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vfhiq1lhsojamg);
    
    if ( $Vfhiq1lhsojamg ) {
      imagedestroy($Vfhiq1lhsojamg);
    }
  }

  
  function addPngFromBuf($Vg5mhfl1beoi, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics =  0, $Vvlxmepre4ko =  0, &$Vou4vxorrdoe, $Vfhiq1lhsojas_mask = false, $Vokcwpnwb5zx = null) {
    if ( isset($Veca2om3awughis->imagelist[$Vg5mhfl1beoi]) ) {
      $Vou4vxorrdoe = null;
      $Vfhiq1lhsojanfo['width'] = $Veca2om3awughis->imagelist[$Vg5mhfl1beoi]['w'];
      $Vfhiq1lhsojanfo['height'] = $Veca2om3awughis->imagelist[$Vg5mhfl1beoi]['h'];
      $Vq04bwg4ulks = $Veca2om3awughis->imagelist[$Vg5mhfl1beoi]['label'];
    }
    
    else {
      if ($Vou4vxorrdoe == null) {
        $Veca2om3awughis->addMessage('addPngFromBuf error - ('.$Vfhiq1lhsojamgname.') data not present!');
        return;
      }
      
      $Vyrkodvljby0 =  0;
  
      if  (!$Vyrkodvljby0) {
        $Vvlxmepre4koeader =  chr(137) .chr(80) .chr(78) .chr(71) .chr(13) .chr(10) .chr(26) .chr(10);
        
        if  (mb_substr($Vou4vxorrdoe, 0, 8, '8bit') !=  $Vvlxmepre4koeader) {
          $Vyrkodvljby0 =  1;
          
          if (DEBUGPNG) print '[addPngFromFile this file does not have a valid header '.$Vg5mhfl1beoi.']';
  
          $Vyrkodvljby0msg =  'this file does not have a valid header';
        }
      }
  
      if  (!$Vyrkodvljby0) {
        
        $Vzqw0ieauwu4 =  8;
        $Vtojwsl3m1uw =  mb_strlen($Vou4vxorrdoe, '8bit');
  
        
        $Vvlxmepre4koaveHeader =  0;
        $Vfhiq1lhsojanfo =  array();
        $Vwfsll4zanwnata =  '';
        $Vzqw0ieauwu4data =  '';
  
        while  ($Vzqw0ieauwu4 < $Vtojwsl3m1uw) {
          $V4y0urwpnd3jhunkLen =  $Veca2om3awughis->PRVT_getBytes($Vou4vxorrdoe, $Vzqw0ieauwu4, 4);
          $V4y0urwpnd3jhunkType =  mb_substr($Vou4vxorrdoe, $Vzqw0ieauwu4+4, 4, '8bit');
          
          switch ($V4y0urwpnd3jhunkType) {
          case  'IHDR':
            
            $Vfhiq1lhsojanfo['width'] =  $Veca2om3awughis->PRVT_getBytes($Vou4vxorrdoe, $Vzqw0ieauwu4+8, 4);
            $Vfhiq1lhsojanfo['height'] =  $Veca2om3awughis->PRVT_getBytes($Vou4vxorrdoe, $Vzqw0ieauwu4+12, 4);
            $Vfhiq1lhsojanfo['bitDepth'] =  ord($Vou4vxorrdoe[$Vzqw0ieauwu4+16]);
            $Vfhiq1lhsojanfo['colorType'] =  ord($Vou4vxorrdoe[$Vzqw0ieauwu4+17]);
            $Vfhiq1lhsojanfo['compressionMethod'] =  ord($Vou4vxorrdoe[$Vzqw0ieauwu4+18]);
            $Vfhiq1lhsojanfo['filterMethod'] =  ord($Vou4vxorrdoe[$Vzqw0ieauwu4+19]);
            $Vfhiq1lhsojanfo['interlaceMethod'] =  ord($Vou4vxorrdoe[$Vzqw0ieauwu4+20]);
  
            
            $Vvlxmepre4koaveHeader =  1;
            if  ($Vfhiq1lhsojanfo['compressionMethod'] !=  0) {
              $Vyrkodvljby0 =  1;
  
              
              if (DEBUGPNG) print '[addPngFromFile unsupported compression method '.$Vg5mhfl1beoi.']';
  
              $Vyrkodvljby0msg =  'unsupported compression method';
            }
  
            if  ($Vfhiq1lhsojanfo['filterMethod'] !=  0) {
              $Vyrkodvljby0 =  1;
  
              
              if (DEBUGPNG) print '[addPngFromFile unsupported filter method '.$Vg5mhfl1beoi.']';
  
              $Vyrkodvljby0msg =  'unsupported filter method';
            }
            break;
  
          case  'PLTE':
            $Vzqw0ieauwu4data.=  mb_substr($Vou4vxorrdoe, $Vzqw0ieauwu4+8, $V4y0urwpnd3jhunkLen, '8bit');
            break;
  
          case  'IDAT':
            $Vwfsll4zanwnata.=  mb_substr($Vou4vxorrdoe, $Vzqw0ieauwu4+8, $V4y0urwpnd3jhunkLen, '8bit');
            break;
  
          case  'tRNS':
            
            
            $Vojdkqwg4owo =  array();
            
            switch ($Vfhiq1lhsojanfo['colorType']) {
              
              case 3:
                
                
                
                $Vojdkqwg4owo['type'] =  'indexed';
                
                $Vcgbfu1dtv3lPalette =  mb_strlen($Vzqw0ieauwu4data, '8bit')/3;
                $Veca2om3awugrans =  0;
    
                for  ($Vfhiq1lhsoja =  $V4y0urwpnd3jhunkLen;$Vfhiq1lhsoja >=  0;$Vfhiq1lhsoja--) {
                  if  (ord($Vou4vxorrdoe[$Vzqw0ieauwu4+8+$Vfhiq1lhsoja]) ==  0) {
                    $Veca2om3awugrans =  $Vfhiq1lhsoja;
                  }
                }
    
                $Vojdkqwg4owo['data'] =  $Veca2om3awugrans;
              break;
              
              
              case 0:
                
                
                $Vojdkqwg4owo['type'] =  'indexed';
                $Vojdkqwg4owo['data'] =  ord($Vou4vxorrdoe[$Vzqw0ieauwu4+8+1]);
              break;
              
              
              case 2:      
                
                $Vojdkqwg4owo['r'] =  $Veca2om3awughis->PRVT_getBytes($Vou4vxorrdoe, $Vzqw0ieauwu4+8, 2);
                
                $Vojdkqwg4owo['g'] =  $Veca2om3awughis->PRVT_getBytes($Vou4vxorrdoe, $Vzqw0ieauwu4+10, 2);
                
                $Vojdkqwg4owo['b'] =  $Veca2om3awughis->PRVT_getBytes($Vou4vxorrdoe, $Vzqw0ieauwu4+12, 2);
                
    
                $Vojdkqwg4owo['type'] = 'color-key';
              break;
              
              
              default:
                if (DEBUGPNG) print '[addPngFromFile unsupported transparency type '.$Vg5mhfl1beoi.']';
                break;
            }
  
            
            break;
  
          default:
            break;
          }
  
          $Vzqw0ieauwu4 +=  $V4y0urwpnd3jhunkLen+12;
        }
  
        if (!$Vvlxmepre4koaveHeader) {
          $Vyrkodvljby0 =  1;
  
          
          if (DEBUGPNG) print '[addPngFromFile information header is missing '.$Vg5mhfl1beoi.']';
  
          $Vyrkodvljby0msg =  'information header is missing';
        }
  
        if  (isset($Vfhiq1lhsojanfo['interlaceMethod']) &&  $Vfhiq1lhsojanfo['interlaceMethod']) {
          $Vyrkodvljby0 =  1;
  
          
          if (DEBUGPNG) print '[addPngFromFile no support for interlaced images in pdf '.$Vg5mhfl1beoi.']';
  
          $Vyrkodvljby0msg =  'There appears to be no support for interlaced images in pdf.';
        }
      }
  
      if  (!$Vyrkodvljby0 &&  $Vfhiq1lhsojanfo['bitDepth'] > 8) {
        $Vyrkodvljby0 =  1;
  
        
        if (DEBUGPNG) print '[addPngFromFile bit depth of 8 or less is supported '.$Vg5mhfl1beoi.']';
  
        $Vyrkodvljby0msg =  'only bit depth of 8 or less is supported';
      }
      
      if  (!$Vyrkodvljby0) {
        switch  ($Vfhiq1lhsojanfo['colorType']) {
        case  3:
          $V4y0urwpnd3jolor =  'DeviceRGB';
          $Vmwwo1qnmepzcolor =  1;
          break;
  
        case  2:
          $V4y0urwpnd3jolor =  'DeviceRGB';
          $Vmwwo1qnmepzcolor =  3;
          break;
  
        case  0:
          $V4y0urwpnd3jolor =  'DeviceGray';
          $Vmwwo1qnmepzcolor =  1;
          break;
        
        default: 
          $Vyrkodvljby0 =  1;
  
          
          if (DEBUGPNG) print '[addPngFromFile alpha channel not supported: '.$Vfhiq1lhsojanfo['colorType'].' '.$Vg5mhfl1beoi.']';
  
          $Vyrkodvljby0msg =  'transparancey alpha channel not supported, transparency only supported for palette images.';
        }
      }
  
      if  ($Vyrkodvljby0) {
        $Veca2om3awughis->addMessage('PNG error - ('.$Vg5mhfl1beoi.') '.$Vyrkodvljby0msg);
        return;
      }

      
      
      $Veca2om3awughis->numImages++;
      $Vfhiq1lhsojam =  $Veca2om3awughis->numImages;
      $Vq04bwg4ulks =  "I$Vfhiq1lhsojam";
      $Veca2om3awughis->numObj++;

      
      $Vobxlvad3352 =  array(
        'label' => $Vq04bwg4ulks,
        'data' => $Vwfsll4zanwnata,
        'bitsPerComponent' => $Vfhiq1lhsojanfo['bitDepth'],
        'pdata' => $Vzqw0ieauwu4data,
        'iw' => $Vfhiq1lhsojanfo['width'],
        'ih' => $Vfhiq1lhsojanfo['height'],
        'type' => 'png',
        'color' => $V4y0urwpnd3jolor,
        'ncolor' => $Vmwwo1qnmepzcolor,
        'masked' => $Vokcwpnwb5zx,
        'isMask' => $Vfhiq1lhsojas_mask,
      );

      if  (isset($Vojdkqwg4owo)) {
        $Vobxlvad3352['transparency'] =  $Vojdkqwg4owo;
      }

      $Veca2om3awughis->o_image($Veca2om3awughis->numObj, 'new', $Vobxlvad3352);
      $Veca2om3awughis->imagelist[$Vg5mhfl1beoi] = array('label' =>$Vq04bwg4ulks, 'w' => $Vfhiq1lhsojanfo['width'], 'h' => $Vfhiq1lhsojanfo['height']);
    }
    
    if ($Vfhiq1lhsojas_mask) {
      return;
    }

    if  ($Vwsgifrh5ics <=  0 && $Vvlxmepre4ko <=  0) {
      $Vwsgifrh5ics =  $Vfhiq1lhsojanfo['width'];
      $Vvlxmepre4ko =  $Vfhiq1lhsojanfo['height'];
    }

    if  ($Vwsgifrh5ics <=  0) {
      $Vwsgifrh5ics =  $Vvlxmepre4ko/$Vfhiq1lhsojanfo['height']*$Vfhiq1lhsojanfo['width'];
    }

    if  ($Vvlxmepre4ko <=  0) {
      $Vvlxmepre4ko =  $Vwsgifrh5ics*$Vfhiq1lhsojanfo['height']/$Vfhiq1lhsojanfo['width'];
    }

    $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  sprintf("\nq\n%.3F 0 0 %.3F %.3F %.3F cm /%s Do\nQ", $Vwsgifrh5ics, $Vvlxmepre4ko, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vq04bwg4ulks);
  }

  
  function addJpegFromFile($Vfhiq1lhsojamg, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics =  0, $Vvlxmepre4ko =  0) {
    
    

    if  (!file_exists($Vfhiq1lhsojamg)) {
      return;
    }

    if ( $Veca2om3awughis->image_iscached($Vfhiq1lhsojamg) ) {
      $Vou4vxorrdoe = null;
      $Vfhiq1lhsojamageWidth  = $Veca2om3awughis->imagelist[$Vfhiq1lhsojamg]['w'];
      $Vfhiq1lhsojamageHeight = $Veca2om3awughis->imagelist[$Vfhiq1lhsojamg]['h'];
      $V4y0urwpnd3jhannels    = $Veca2om3awughis->imagelist[$Vfhiq1lhsojamg]['c'];
    } 
    else {
      $Vdln1z2oxpjs = getimagesize($Vfhiq1lhsojamg);
      $Vfhiq1lhsojamageWidth  = $Vdln1z2oxpjs[0];
      $Vfhiq1lhsojamageHeight = $Vdln1z2oxpjs[1];

      if ( isset($Vdln1z2oxpjs['channels']) ) {
        $V4y0urwpnd3jhannels =  $Vdln1z2oxpjs['channels'];
      } else {
        $V4y0urwpnd3jhannels =  3;
      }

      $Vou4vxorrdoe =  file_get_contents($Vfhiq1lhsojamg);
    }

    if  ($Vwsgifrh5ics <=  0 &&  $Vvlxmepre4ko <=  0) {
      $Vwsgifrh5ics =  $Vfhiq1lhsojamageWidth;
    }

    if  ($Vwsgifrh5ics ==  0) {
      $Vwsgifrh5ics =  $Vvlxmepre4ko/$Vfhiq1lhsojamageHeight*$Vfhiq1lhsojamageWidth;
    }

    if  ($Vvlxmepre4ko ==  0) {
      $Vvlxmepre4ko =  $Vwsgifrh5ics*$Vfhiq1lhsojamageHeight/$Vfhiq1lhsojamageWidth;
    }

    $Veca2om3awughis->addJpegImage_common($Vou4vxorrdoe, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics, $Vvlxmepre4ko, $Vfhiq1lhsojamageWidth, $Vfhiq1lhsojamageHeight, $V4y0urwpnd3jhannels, $Vfhiq1lhsojamg);
  }

  
  function addJpegImage_common(&$Vou4vxorrdoe, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vwsgifrh5ics =  0, $Vvlxmepre4ko =  0, $Vfhiq1lhsojamageWidth, $Vfhiq1lhsojamageHeight, $V4y0urwpnd3jhannels =  3, $Vfhiq1lhsojamgname) {
    if ( $Veca2om3awughis->image_iscached($Vfhiq1lhsojamgname) ) {
      $Vq04bwg4ulks = $Veca2om3awughis->imagelist[$Vfhiq1lhsojamgname]['label'];
      
      

    } else {
      if ($Vou4vxorrdoe == null) {
        $Veca2om3awughis->addMessage('addJpegImage_common error - ('.$Vfhiq1lhsojamgname.') data not present!');
        return;
      }

      
      
      $Veca2om3awughis->numImages++;
      $Vfhiq1lhsojam =  $Veca2om3awughis->numImages;
      $Vq04bwg4ulks =  "I$Vfhiq1lhsojam";
      $Veca2om3awughis->numObj++;
      
      $Veca2om3awughis->o_image($Veca2om3awughis->numObj, 'new', array(
        'label' => $Vq04bwg4ulks, 
        'data' => &$Vou4vxorrdoe, 
        'iw' => $Vfhiq1lhsojamageWidth, 
        'ih' => $Vfhiq1lhsojamageHeight, 
        'channels' => $V4y0urwpnd3jhannels
      ));
      
      $Veca2om3awughis->imagelist[$Vfhiq1lhsojamgname] = array('label' =>$Vq04bwg4ulks, 'w' => $Vfhiq1lhsojamageWidth, 'h' => $Vfhiq1lhsojamageHeight, 'c'=> $V4y0urwpnd3jhannels );
    }

    $Veca2om3awughis->objects[$Veca2om3awughis->currentContents]['c'].=  sprintf("\nq\n%.3F 0 0 %.3F %.3F %.3F cm /%s Do\nQ ", $Vwsgifrh5ics, $Vvlxmepre4ko, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vq04bwg4ulks);
  }

  
  function openHere($Vdtcpflt5bhp, $Vi3y3l1uvwp3 =  0, $V4t3fwdd3eev =  0, $V4y0urwpnd3j =  0) {
    
    
    
    
    
    
    
    
    
    
    $Veca2om3awughis->numObj++;
    $Veca2om3awughis->o_destination($Veca2om3awughis->numObj, 'new', array('page' => $Veca2om3awughis->currentPage, 'type' => $Vdtcpflt5bhp, 'p1' => $Vi3y3l1uvwp3, 'p2' => $V4t3fwdd3eev, 'p3' => $V4y0urwpnd3j));
    $Vwfsll4zanwn =  $Veca2om3awughis->catalogId;
    $Veca2om3awughis->o_catalog($Vwfsll4zanwn, 'openHere', $Veca2om3awughis->numObj);
  }
  
  
  function addJavascript($V4y0urwpnd3jode) {
    $Veca2om3awughis->javascript .= $V4y0urwpnd3jode;
  }

  
  function addDestination($Vq04bwg4ulks, $Vdtcpflt5bhp, $Vi3y3l1uvwp3 =  0, $V4t3fwdd3eev =  0, $V4y0urwpnd3j =  0) {
    
    
    
    $Veca2om3awughis->numObj++;
    $Veca2om3awughis->o_destination($Veca2om3awughis->numObj, 'new', array('page' => $Veca2om3awughis->currentPage, 'type' => $Vdtcpflt5bhp, 'p1' => $Vi3y3l1uvwp3, 'p2' => $V4t3fwdd3eev, 'p3' => $V4y0urwpnd3j));
    $Vwfsll4zanwn =  $Veca2om3awughis->numObj;

    
    $Veca2om3awughis->destinations["$Vq04bwg4ulks"] =  $Vwfsll4zanwn;
  }

  
  function setFontFamily($Vtbbah5lqvpoamily, $Vobxlvad3352 =  '') {
    if  (!is_array($Vobxlvad3352)) {
      if  ($Vtbbah5lqvpoamily ===  'init') {
        
        
        
        $Veca2om3awughis->fontFamilies['Helvetica.afm'] =
          array('b' => 'Helvetica-Bold.afm',
                'i' => 'Helvetica-Oblique.afm',
                'bi' => 'Helvetica-BoldOblique.afm',
                'ib' => 'Helvetica-BoldOblique.afm');

        $Veca2om3awughis->fontFamilies['Courier.afm'] =
          array('b' => 'Courier-Bold.afm',
                'i' => 'Courier-Oblique.afm',
                'bi' => 'Courier-BoldOblique.afm',
                'ib' => 'Courier-BoldOblique.afm');

        $Veca2om3awughis->fontFamilies['Times-Roman.afm'] =
          array('b' => 'Times-Bold.afm',
                'i' => 'Times-Italic.afm',
                'bi' => 'Times-BoldItalic.afm',
                'ib' => 'Times-BoldItalic.afm');
      }
    } else {

      
      
      if  (mb_strlen($Vtbbah5lqvpoamily)) {
        $Veca2om3awughis->fontFamilies[$Vtbbah5lqvpoamily] =  $Vobxlvad3352;
      }
    }
  }

  
  function addMessage($Vb0xezrtkohj) {
    $Veca2om3awughis->messages.=  $Vb0xezrtkohj."\n";
  }

  
  function transaction($Vrrb21ym0qp1) {
    switch  ($Vrrb21ym0qp1) {
    case 'start':
      
      $Vou4vxorrdoe =  get_object_vars($Veca2om3awughis);
      $Veca2om3awughis->checkpoint =  $Vou4vxorrdoe;
      unset($Vou4vxorrdoe);
      break;

    case 'commit':
      if  (is_array($Veca2om3awughis->checkpoint) &&  isset($Veca2om3awughis->checkpoint['checkpoint'])) {
        $Vdln1z2oxpjs =  $Veca2om3awughis->checkpoint['checkpoint'];
        $Veca2om3awughis->checkpoint =  $Vdln1z2oxpjs;
        unset($Vdln1z2oxpjs);
      } else {
        $Veca2om3awughis->checkpoint =  '';
      }
      break;

    case 'rewind':
      
      if  (is_array($Veca2om3awughis->checkpoint)) {
        
        $Vdln1z2oxpjs =  $Veca2om3awughis->checkpoint;

        foreach ($Vdln1z2oxpjs as  $V51lf1kcbto4 => $Vf1kwqxxhqpz) {
          if  ($V51lf1kcbto4 !==  'checkpoint') {
            $Veca2om3awughis->$V51lf1kcbto4 =  $Vf1kwqxxhqpz;
          }
        }
        unset($Vdln1z2oxpjs);
      }
      break;

    case 'abort':
      if  (is_array($Veca2om3awughis->checkpoint)) {
        
        $Vdln1z2oxpjs =  $Veca2om3awughis->checkpoint;
        foreach ($Vdln1z2oxpjs as  $V51lf1kcbto4 => $Vf1kwqxxhqpz) {
          $Veca2om3awughis->$V51lf1kcbto4 =  $Vf1kwqxxhqpz;
        }
        unset($Vdln1z2oxpjs);
      }
      break;
    }
  }
}

