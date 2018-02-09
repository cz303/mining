<?php



class Page_Cache {

  const DB_USER = "dompdf_page_cache";
  const DB_PASS = "some meaningful password";
  const DB_NAME = "dompdf_page_cache";
  
  static private $Vimlwsi3qqc4 = null;
  
  function init() {
    if ( is_null(self::$Vimlwsi3qqc4) ) {
      $Vxfgtowyxi0p = "host=" . DB_HOST .
        " dbname=" . self::DB_NAME .
        " user=" . self::DB_USER .
        " password=" . self::DB_PASS;
      
      if ( !self::$Vimlwsi3qqc4 = pg_connect($Vxfgtowyxi0p) )
        throw new Exception("Database connection failed.");
    }
  }
  
  function __construct() { throw new Exception("Can not create instance of Page_Class.  Class is static."); }

  private static function __query($V5115ngqcm40) {
    if ( !($Ve3oeikqcm5n = pg_query(self::$Vimlwsi3qqc4, $V5115ngqcm40)) )
      throw new Exception(pg_last_error(self::$Vimlwsi3qqc4));
    return $Ve3oeikqcm5n;
  }
  
  static function store_page($Vwfsll4zanwn, $Vxdbo12lf1ix, $Vou4vxorrdoe) {
    $Vdf3a5upds0t = "WHERE id='" . pg_escape_string($Vwfsll4zanwn) . "' AND ".
      "page_num=". pg_escape_string($Vxdbo12lf1ix);

    $Ve3oeikqcm5n = self::__query("SELECT timestamp FROM page_cache ". $Vdf3a5upds0t);

    $Vexbtekafkvl = pg_fetch_assoc($Ve3oeikqcm5n);
    
    if ( $Vexbtekafkvl ) 
      self::__query("UPDATE page_cache SET data='" . pg_escape_string($Vou4vxorrdoe) . "' " . $Vdf3a5upds0t);
    else 
      self::__query("INSERT INTO page_cache (id, page_num, data) VALUES ('" . pg_escape_string($Vwfsll4zanwn) . "', ".
                     pg_escape_string($Vxdbo12lf1ix) . ", ".
                     "'". pg_escape_string($Vou4vxorrdoe) . "')");

  }

  static function store_fonts($Vwfsll4zanwn, $Vbtry0up1z0b) {
    self::__query("BEGIN");
    
    self::__query("DELETE FROM page_fonts WHERE id='" . pg_escape_string($Vwfsll4zanwn) . "'");

    foreach (array_keys($Vbtry0up1z0b) as $Vj0kojsfk0h3)
      self::__query("INSERT INTO page_fonts (id, font_name) VALUES ('" .
                    pg_escape_string($Vwfsll4zanwn) . "', '" . pg_escape_string($Vj0kojsfk0h3) . "')");
    self::__query("COMMIT");
  }
  








    


  static function get_page_timestamp($Vwfsll4zanwn, $Vxdbo12lf1ix) {
    $Ve3oeikqcm5n = self::__query("SELECT timestamp FROM page_cache WHERE id='" . pg_escape_string($Vwfsll4zanwn) . "' AND ".
                          "page_num=". pg_escape_string($Vxdbo12lf1ix));

    $Vexbtekafkvl = pg_fetch_assoc($Ve3oeikqcm5n);

    return $Vexbtekafkvl["timestamp"];
    
  }

  
  static function insert_cached_document(CPDF_Adapter $Vxj5miiauhxo, $Vwfsll4zanwn, $Vpmlj1yv11xm = true) {
    $Ve3oeikqcm5n = self::__query("SELECT font_name FROM page_fonts WHERE id='" . pg_escape_string($Vwfsll4zanwn) . "'");

    
    
    while ($Vexbtekafkvl = pg_fetch_assoc($Ve3oeikqcm5n)) 
      $Vxj5miiauhxo->get_cpdf()->selectFont($Vexbtekafkvl["font_name"]);
    
    $Ve3oeikqcm5n = self::__query("SELECT data FROM page_cache WHERE id='" . pg_escape_string($Vwfsll4zanwn) . "'");

    if ( $Vpmlj1yv11xm )
      $Vxj5miiauhxo->new_page();

    $Vh2exnktxagp = true;
    while ($Vexbtekafkvl = pg_fetch_assoc($Ve3oeikqcm5n)) {

      if ( !$Vh2exnktxagp ) 
        $Vxj5miiauhxo->new_page();
      else 
        $Vh2exnktxagp = false;        
      
      $Vmt0302hgn5x = $Vxj5miiauhxo->reopen_serialized_object($Vexbtekafkvl["data"]);
      
      $Vxj5miiauhxo->add_object($Vmt0302hgn5x, "add");

    }
      
  }
}

Page_Cache::init();
