<?php


require_once dirname(__FILE__)."/encoding_map.cls.php";


class Adobe_Font_Metrics {
  private $Vtbbah5lqvpo;
  
  
  private $Vtbbah5lqvpoont;
  
  function __construct(Font_TrueType $Vtbbah5lqvpoont) {
    $this->font = $Vtbbah5lqvpoont;
  }
  
  function write($Vtbbah5lqvpoile, $V5mmmrje2ymm = null){
    if ($V5mmmrje2ymm) {
      $V5mmmrje2ymm = preg_replace("/[^a-z0-9-_]/", "", $V5mmmrje2ymm);
      $Vi3vv5so0n2t = dirname(__FILE__)."/../maps/$V5mmmrje2ymm.map";
      if (!file_exists($Vi3vv5so0n2t)) {
        throw new Exception("Unkown encoding ($V5mmmrje2ymm)");
      }
      
      $V2lrhw0msxly = new Encoding_Map($Vi3vv5so0n2t);
      $V2lrhw0msxly_data = $V2lrhw0msxly->parse();
    }
    
    $this->f = fopen($Vtbbah5lqvpoile, "w+");
    
    $Vtbbah5lqvpoont = $this->font;
    
    $this->startSection("FontMetrics", 4.1);
    $this->addPair("Notice", "Converted by PHP-font-lib");
    $this->addPair("Comment", "http://php-font-lib.googlecode.com/");
    
    $V5mmmrje2ymm_scheme = ($V5mmmrje2ymm ? $V5mmmrje2ymm : "FontSpecific");
    $this->addPair("EncodingScheme", $V5mmmrje2ymm_scheme);
    
    $Vaq4zgw3slcm = $Vtbbah5lqvpoont->getData("name", "records");
    foreach($Vaq4zgw3slcm as $Vwfsll4zanwn => $Vkry1ureuzsj) {
      if (!isset(Font_TrueType::$Vxj0pa0dtl5j[$Vwfsll4zanwn]) || preg_match("/[\r\n]/", $Vkry1ureuzsj->string)) {
        continue;
      }
      
      $this->addPair(Font_TrueType::$Vxj0pa0dtl5j[$Vwfsll4zanwn], $Vkry1ureuzsj->string);
    }
    
    $V3cswdv0o0nc = $Vtbbah5lqvpoont->getData("OS/2");
    $this->addPair("Weight", ($V3cswdv0o0nc["usWeightClass"] > 400 ? "Bold" : "Medium"));
    
    $Vwid2rw4wgzt = $Vtbbah5lqvpoont->getData("post");
    $this->addPair("ItalicAngle",        $Vwid2rw4wgzt["italicAngle"]);
    $this->addPair("IsFixedPitch",      ($Vwid2rw4wgzt["isFixedPitch"] ? "true" : "false"));
    $this->addPair("UnderlineThickness", $Vtbbah5lqvpoont->normalizeFUnit($Vwid2rw4wgzt["underlineThickness"]));
    $this->addPair("UnderlinePosition",  $Vtbbah5lqvpoont->normalizeFUnit($Vwid2rw4wgzt["underlinePosition"]));
    
    $V5wr0fxzhrsb = $Vtbbah5lqvpoont->getData("hhea");
    
    if (isset($V3cswdv0o0nc["typoAscender"])) {
      $this->addPair("FontHeightOffset",  $Vtbbah5lqvpoont->normalizeFUnit($V3cswdv0o0nc["typoLineGap"]));
      $this->addPair("Ascender",  $Vtbbah5lqvpoont->normalizeFUnit($V3cswdv0o0nc["typoAscender"]));
      $this->addPair("Descender", $Vtbbah5lqvpoont->normalizeFUnit($V3cswdv0o0nc["typoDescender"]));
    }
    else {
      $this->addPair("FontHeightOffset",  $Vtbbah5lqvpoont->normalizeFUnit($V5wr0fxzhrsb["lineGap"]));
      $this->addPair("Ascender",  $Vtbbah5lqvpoont->normalizeFUnit($V5wr0fxzhrsb["ascent"]));
      $this->addPair("Descender", $Vtbbah5lqvpoont->normalizeFUnit($V5wr0fxzhrsb["descent"]));
    }
    
    $V5wfjs40q2g0 = $Vtbbah5lqvpoont->getData("head");
    $this->addArray("FontBBox", array(
      $Vtbbah5lqvpoont->normalizeFUnit($V5wfjs40q2g0["xMin"]),
      $Vtbbah5lqvpoont->normalizeFUnit($V5wfjs40q2g0["yMin"]),
      $Vtbbah5lqvpoont->normalizeFUnit($V5wfjs40q2g0["xMax"]),
      $Vtbbah5lqvpoont->normalizeFUnit($V5wfjs40q2g0["yMax"]),
    ));
    
    $Vldxaapdjtvp = null;
    foreach($Vtbbah5lqvpoont->getData("cmap", "subtables") as $Vgrdnur1fyr5) {
      if ($Vgrdnur1fyr5["platformID"] == 0 || $Vgrdnur1fyr5["platformID"] == 3 && $Vgrdnur1fyr5["platformSpecificID"] == 1) {
        $Vldxaapdjtvp = $Vgrdnur1fyr5;
        break;
      }
    }
    
    if ($Vldxaapdjtvp) {
      $Vw1bepsnxpij = $Vtbbah5lqvpoont->getData("hmtx");
      $Vuyq43c4rgyg = $Vtbbah5lqvpoont->getData("post", "names");
      $Vrkrbvtcqvht = $Vldxaapdjtvp["glyphIndexArray"];
      
      $this->startSection("CharMetrics", count($Vw1bepsnxpij));
        
      if ($V5mmmrje2ymm)  {
        foreach($V2lrhw0msxly_data as $V0x4xt3l5phz => $Vp4xjtpabm0l) {
          list($V4y0urwpnd3j, $Vcvluzjs3wzb) = $Vp4xjtpabm0l;
          
          if (!isset($Vrkrbvtcqvht[$V4y0urwpnd3j])) continue;
          
          $Vpatv3dcvvhr = $Vrkrbvtcqvht[$V4y0urwpnd3j];
          
          if (!isset($Vw1bepsnxpij[$Vpatv3dcvvhr])) {
            $Vw1bepsnxpij[$Vpatv3dcvvhr] = $Vw1bepsnxpij[0];
          }
          
          $this->addMetric(array(
            "C"  => ($V0x4xt3l5phz > 255 ? -1 : $V0x4xt3l5phz),
            "WX" => $Vtbbah5lqvpoont->normalizeFUnit($Vw1bepsnxpij[$Vpatv3dcvvhr][0]),
            "N"  => $Vcvluzjs3wzb,
          ));
        }
      }
      else {
        foreach($Vrkrbvtcqvht as $V4y0urwpnd3j => $Vpatv3dcvvhr) {
          if (!isset($Vw1bepsnxpij[$Vpatv3dcvvhr])) {
            $Vw1bepsnxpij[$Vpatv3dcvvhr] = $Vw1bepsnxpij[0];
          }
          
          $this->addMetric(array(
            "U" => $V4y0urwpnd3j,
            "WX" => $Vtbbah5lqvpoont->normalizeFUnit($Vw1bepsnxpij[$Vpatv3dcvvhr][0]),
            "N" => (isset($Vuyq43c4rgyg[$Vpatv3dcvvhr]) ? $Vuyq43c4rgyg[$Vpatv3dcvvhr] : sprintf("uni%04x", $V4y0urwpnd3j)),
            "G" => $Vpatv3dcvvhr,
          ));
        }
      }
        
      $this->endSection("CharMetrics");
    
      $Vnoplyz52ioz = $Vtbbah5lqvpoont->getData("kern", "subtable");
      $Vpnxy30x1asc = $Vnoplyz52ioz["tree"];
      
      if (!$V5mmmrje2ymm && is_array($Vpnxy30x1asc)) {
        $this->startSection("KernData");
          $this->startSection("KernPairs", count($Vpnxy30x1asc, COUNT_RECURSIVE) - count($Vpnxy30x1asc));
            
          foreach($Vpnxy30x1asc as $Vrce0gsxjgkc => $Vp4xjtpabm0ls) {
            if (!is_array($Vp4xjtpabm0ls)) continue;
            if (!isset($Vrkrbvtcqvht[$Vrce0gsxjgkc])) continue;
            
            $Vrce0gsxjgkc_gid = $Vrkrbvtcqvht[$Vrce0gsxjgkc];
            
            if (!isset($Vuyq43c4rgyg[$Vrce0gsxjgkc_gid])) continue;
            
            $Vrce0gsxjgkc_name = $Vuyq43c4rgyg[$Vrce0gsxjgkc_gid];
            
            $this->addLine("");
            
            foreach($Vp4xjtpabm0ls as $Vqyn43hpxtm0 => $Vp4xjtpabm0l) {
              if (!isset($Vrkrbvtcqvht[$Vqyn43hpxtm0])) continue;
              
              $Vqyn43hpxtm0_gid = $Vrkrbvtcqvht[$Vqyn43hpxtm0];
            
              if (!isset($Vuyq43c4rgyg[$Vqyn43hpxtm0_gid])) continue;
              
              $Vqyn43hpxtm0_name = $Vuyq43c4rgyg[$Vqyn43hpxtm0_gid];
              $this->addPair("KPX", "$Vrce0gsxjgkc_name $Vqyn43hpxtm0_name $Vp4xjtpabm0l");
            }
          }
            
          $this->endSection("KernPairs");
        $this->endSection("KernData");
      }
    }
      
    $this->endSection("FontMetrics");
  }
  
  function addLine($Vdmbypy2xlg1) {
    fwrite($this->f, "$Vdmbypy2xlg1\n");
  }
  
  function addPair($Vseq1edikdvg, $Vp4xjtpabm0l) {
    $this->addLine("$Vseq1edikdvg $Vp4xjtpabm0l");
  }
  
  function addArray($Vseq1edikdvg, $Vi2ourgzeiw5) {
    $this->addLine("$Vseq1edikdvg ".implode(" ", $Vi2ourgzeiw5));
  }
  
  function addMetric($Vou4vxorrdoe) {
    $Vi2ourgzeiw5 = array();
    foreach($Vou4vxorrdoe as $Vseq1edikdvg => $Vp4xjtpabm0l) {
      $Vi2ourgzeiw5[] = "$Vseq1edikdvg $Vp4xjtpabm0l";
    }
    $this->addLine(implode(" ; ", $Vi2ourgzeiw5));
  }

  function startSection($Vcvluzjs3wzb, $Vp4xjtpabm0l = "") {
    $this->addLine("Start$Vcvluzjs3wzb $Vp4xjtpabm0l");
  }
  
  function endSection($Vcvluzjs3wzb) {
    $this->addLine("End$Vcvluzjs3wzb");
  }
}
