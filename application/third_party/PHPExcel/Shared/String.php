<?php




class PHPExcel_Shared_String
{
	
	
	
	const STRING_REGEXP_FRACTION	= '(-?)(\d+)\s+(\d+\/\d+)';


	
	private static $V5gmeiw4uxx1 = array();

	
	private static $Vj4hsi2wedt0 = array();

	
	private static $Vl32hq3klls2;

	
	private static $Vgv0pxvywytj;

	
	private static $Vbhz5c3uop0p;

	
	private static $Vk2oyuz3epni;

	
	private static $Vd05gutjhz1g;

	
	private static function _buildControlCharacters() {
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja <= 31; ++$Vfhiq1lhsoja) {
			if ($Vfhiq1lhsoja != 9 && $Vfhiq1lhsoja != 10 && $Vfhiq1lhsoja != 13) {
				$V1aqehwlck0h = '_x' . sprintf('%04s' , strtoupper(dechex($Vfhiq1lhsoja))) . '_';
				$Vf3wg4bphtjh = chr($Vfhiq1lhsoja);
				self::$V5gmeiw4uxx1[$V1aqehwlck0h] = $Vf3wg4bphtjh;
			}
		}
	}

	
	private static function _buildSYLKCharacters()
	{
		self::$Vj4hsi2wedt0 = array(
			"\x1B 0"  => chr(0),
			"\x1B 1"  => chr(1),
			"\x1B 2"  => chr(2),
			"\x1B 3"  => chr(3),
			"\x1B 4"  => chr(4),
			"\x1B 5"  => chr(5),
			"\x1B 6"  => chr(6),
			"\x1B 7"  => chr(7),
			"\x1B 8"  => chr(8),
			"\x1B 9"  => chr(9),
			"\x1B :"  => chr(10),
			"\x1B ;"  => chr(11),
			"\x1B <"  => chr(12),
			"\x1B :"  => chr(13),
			"\x1B >"  => chr(14),
			"\x1B ?"  => chr(15),
			"\x1B!0"  => chr(16),
			"\x1B!1"  => chr(17),
			"\x1B!2"  => chr(18),
			"\x1B!3"  => chr(19),
			"\x1B!4"  => chr(20),
			"\x1B!5"  => chr(21),
			"\x1B!6"  => chr(22),
			"\x1B!7"  => chr(23),
			"\x1B!8"  => chr(24),
			"\x1B!9"  => chr(25),
			"\x1B!:"  => chr(26),
			"\x1B!;"  => chr(27),
			"\x1B!<"  => chr(28),
			"\x1B!="  => chr(29),
			"\x1B!>"  => chr(30),
			"\x1B!?"  => chr(31),
			"\x1B'?"  => chr(127),
			"\x1B(0"  => '€', 
			"\x1B(2"  => '‚', 
			"\x1B(3"  => 'ƒ', 
			"\x1B(4"  => '„', 
			"\x1B(5"  => '…', 
			"\x1B(6"  => '†', 
			"\x1B(7"  => '‡', 
			"\x1B(8"  => 'ˆ', 
			"\x1B(9"  => '‰', 
			"\x1B(:"  => 'Š', 
			"\x1B(;"  => '‹', 
			"\x1BNj"  => 'Œ', 
			"\x1B(>"  => 'Ž', 
			"\x1B)1"  => '‘', 
			"\x1B)2"  => '’', 
			"\x1B)3"  => '“', 
			"\x1B)4"  => '”', 
			"\x1B)5"  => '•', 
			"\x1B)6"  => '–', 
			"\x1B)7"  => '—', 
			"\x1B)8"  => '˜', 
			"\x1B)9"  => '™', 
			"\x1B):"  => 'š', 
			"\x1B);"  => '›', 
			"\x1BNz"  => 'œ', 
			"\x1B)>"  => 'ž', 
			"\x1B)?"  => 'Ÿ', 
			"\x1B*0"  => ' ', 
			"\x1BN!"  => '¡', 
			"\x1BN\"" => '¢', 
			"\x1BN#"  => '£', 
			"\x1BN("  => '¤', 
			"\x1BN%"  => '¥', 
			"\x1B*6"  => '¦', 
			"\x1BN'"  => '§', 
			"\x1BNH " => '¨', 
			"\x1BNS"  => '©', 
			"\x1BNc"  => 'ª', 
			"\x1BN+"  => '«', 
			"\x1B*<"  => '¬', 
			"\x1B*="  => '­', 
			"\x1BNR"  => '®', 
			"\x1B*?"  => '¯', 
			"\x1BN0"  => '°', 
			"\x1BN1"  => '±', 
			"\x1BN2"  => '²', 
			"\x1BN3"  => '³', 
			"\x1BNB " => '´', 
			"\x1BN5"  => 'µ', 
			"\x1BN6"  => '¶', 
			"\x1BN7"  => '·', 
			"\x1B+8"  => '¸', 
			"\x1BNQ"  => '¹', 
			"\x1BNk"  => 'º', 
			"\x1BN;"  => '»', 
			"\x1BN<"  => '¼', 
			"\x1BN="  => '½', 
			"\x1BN>"  => '¾', 
			"\x1BN?"  => '¿', 
			"\x1BNAA" => 'À', 
			"\x1BNBA" => 'Á', 
			"\x1BNCA" => 'Â', 
			"\x1BNDA" => 'Ã', 
			"\x1BNHA" => 'Ä', 
			"\x1BNJA" => 'Å', 
			"\x1BNa"  => 'Æ', 
			"\x1BNKC" => 'Ç', 
			"\x1BNAE" => 'È', 
			"\x1BNBE" => 'É', 
			"\x1BNCE" => 'Ê', 
			"\x1BNHE" => 'Ë', 
			"\x1BNAI" => 'Ì', 
			"\x1BNBI" => 'Í', 
			"\x1BNCI" => 'Î', 
			"\x1BNHI" => 'Ï', 
			"\x1BNb"  => 'Ð', 
			"\x1BNDN" => 'Ñ', 
			"\x1BNAO" => 'Ò', 
			"\x1BNBO" => 'Ó', 
			"\x1BNCO" => 'Ô', 
			"\x1BNDO" => 'Õ', 
			"\x1BNHO" => 'Ö', 
			"\x1B-7"  => '×', 
			"\x1BNi"  => 'Ø', 
			"\x1BNAU" => 'Ù', 
			"\x1BNBU" => 'Ú', 
			"\x1BNCU" => 'Û', 
			"\x1BNHU" => 'Ü', 
			"\x1B-="  => 'Ý', 
			"\x1BNl"  => 'Þ', 
			"\x1BN{"  => 'ß', 
			"\x1BNAa" => 'à', 
			"\x1BNBa" => 'á', 
			"\x1BNCa" => 'â', 
			"\x1BNDa" => 'ã', 
			"\x1BNHa" => 'ä', 
			"\x1BNJa" => 'å', 
			"\x1BNq"  => 'æ', 
			"\x1BNKc" => 'ç', 
			"\x1BNAe" => 'è', 
			"\x1BNBe" => 'é', 
			"\x1BNCe" => 'ê', 
			"\x1BNHe" => 'ë', 
			"\x1BNAi" => 'ì', 
			"\x1BNBi" => 'í', 
			"\x1BNCi" => 'î', 
			"\x1BNHi" => 'ï', 
			"\x1BNs"  => 'ð', 
			"\x1BNDn" => 'ñ', 
			"\x1BNAo" => 'ò', 
			"\x1BNBo" => 'ó', 
			"\x1BNCo" => 'ô', 
			"\x1BNDo" => 'õ', 
			"\x1BNHo" => 'ö', 
			"\x1B/7"  => '÷', 
			"\x1BNy"  => 'ø', 
			"\x1BNAu" => 'ù', 
			"\x1BNBu" => 'ú', 
			"\x1BNCu" => 'û', 
			"\x1BNHu" => 'ü', 
			"\x1B/="  => 'ý', 
			"\x1BN|"  => 'þ', 
			"\x1BNHy" => 'ÿ', 
		);
	}

	
	public static function getIsMbstringEnabled()
	{
		if (isset(self::$Vk2oyuz3epni)) {
			return self::$Vk2oyuz3epni;
		}

		self::$Vk2oyuz3epni = function_exists('mb_convert_encoding') ?
			true : false;

		return self::$Vk2oyuz3epni;
	}

	
	public static function getIsIconvEnabled()
	{
		if (isset(self::$Vd05gutjhz1g)) {
			return self::$Vd05gutjhz1g;
		}

		
		if (!function_exists('iconv')) {
			self::$Vd05gutjhz1g = false;
			return false;
		}

		
		if (!@iconv('UTF-8', 'UTF-16LE', 'x')) {
			self::$Vd05gutjhz1g = false;
			return false;
		}

		
		
		if (!@iconv_substr('A', 0, 1, 'UTF-8')) {
			self::$Vd05gutjhz1g = false;
			return false;
		}

		
		if ( defined('PHP_OS') && @stristr(PHP_OS, 'AIX')
				&& defined('ICONV_IMPL') && (@strcasecmp(ICONV_IMPL, 'unknown') == 0)
				&& defined('ICONV_VERSION') && (@strcasecmp(ICONV_VERSION, 'unknown') == 0) )
		{
			self::$Vd05gutjhz1g = false;
			return false;
		}

		
		self::$Vd05gutjhz1g = true;
		return true;
	}

	public static function buildCharacterSets() {
		if(empty(self::$V5gmeiw4uxx1)) {
			self::_buildControlCharacters();
		}
		if(empty(self::$Vj4hsi2wedt0)) {
			self::_buildSYLKCharacters();
		}
	}

	
	public static function ControlCharacterOOXML2PHP($Vp4xjtpabm0l = '') {
		return str_replace( array_keys(self::$V5gmeiw4uxx1), array_values(self::$V5gmeiw4uxx1), $Vp4xjtpabm0l );
	}

	
	public static function ControlCharacterPHP2OOXML($Vp4xjtpabm0l = '') {
		return str_replace( array_values(self::$V5gmeiw4uxx1), array_keys(self::$V5gmeiw4uxx1), $Vp4xjtpabm0l );
	}

	
	public static function SanitizeUTF8($Vp4xjtpabm0l)
	{
		if (self::getIsIconvEnabled()) {
			$Vp4xjtpabm0l = @iconv('UTF-8', 'UTF-8', $Vp4xjtpabm0l);
			return $Vp4xjtpabm0l;
		}

		if (self::getIsMbstringEnabled()) {
			$Vp4xjtpabm0l = mb_convert_encoding($Vp4xjtpabm0l, 'UTF-8', 'UTF-8');
			return $Vp4xjtpabm0l;
		}

		
		return $Vp4xjtpabm0l;
	}

	
	public static function IsUTF8($Vp4xjtpabm0l = '') {
		return $Vp4xjtpabm0l === '' || preg_match('/^./su', $Vp4xjtpabm0l) === 1;
	}

	
	public static function FormatNumber($Vp4xjtpabm0l) {
		if (is_float($Vp4xjtpabm0l)) {
			return str_replace(',', '.', $Vp4xjtpabm0l);
		}
		return (string) $Vp4xjtpabm0l;
	}

	
	public static function UTF8toBIFF8UnicodeShort($Vp4xjtpabm0l, $Vvr1mxrfd01z = array())
	{
		
		$Vwzjwtu2qkvv = self::CountCharacters($Vp4xjtpabm0l, 'UTF-8');
		
		if(empty($Vvr1mxrfd01z)){
			$Vkh5qsglhgqt = (self::getIsIconvEnabled() || self::getIsMbstringEnabled()) ?
				0x0001 : 0x0000;
			$Vou4vxorrdoe = pack('CC', $Vwzjwtu2qkvv, $Vkh5qsglhgqt);
			
			$Vou4vxorrdoe .= self::ConvertEncoding($Vp4xjtpabm0l, 'UTF-16LE', 'UTF-8');
		}
		else {
			$Vou4vxorrdoe = pack('vC', $Vwzjwtu2qkvv, 0x09);
			$Vou4vxorrdoe .= pack('v', count($Vvr1mxrfd01z));
			
			$Vou4vxorrdoe .= self::ConvertEncoding($Vp4xjtpabm0l, 'UTF-16LE', 'UTF-8');
			foreach ($Vvr1mxrfd01z as $Vghdvlbr2ei3){
				$Vou4vxorrdoe .= pack('v', $Vghdvlbr2ei3['strlen']);
				$Vou4vxorrdoe .= pack('v', $Vghdvlbr2ei3['fontidx']);
			}
		}
		return $Vou4vxorrdoe;
	}

	
	public static function UTF8toBIFF8UnicodeLong($Vp4xjtpabm0l)
	{
		
		$Vwzjwtu2qkvv = self::CountCharacters($Vp4xjtpabm0l, 'UTF-8');

		
		$Vkh5qsglhgqt = (self::getIsIconvEnabled() || self::getIsMbstringEnabled()) ?
			0x0001 : 0x0000;

		
		$Vkeq2p2m0vf4 = self::ConvertEncoding($Vp4xjtpabm0l, 'UTF-16LE', 'UTF-8');

		$Vou4vxorrdoe = pack('vC', $Vwzjwtu2qkvv, $Vkh5qsglhgqt) . $Vkeq2p2m0vf4;
		return $Vou4vxorrdoe;
	}

	
	public static function ConvertEncoding($Vp4xjtpabm0l, $Vgeu2rx5xc4w, $Vkg0aw223kcs)
	{
		if (self::getIsIconvEnabled()) {
			return iconv($Vkg0aw223kcs, $Vgeu2rx5xc4w, $Vp4xjtpabm0l);
		}

		if (self::getIsMbstringEnabled()) {
			return mb_convert_encoding($Vp4xjtpabm0l, $Vgeu2rx5xc4w, $Vkg0aw223kcs);
		}

		if($Vkg0aw223kcs == 'UTF-16LE'){
			return self::utf16_decode($Vp4xjtpabm0l, false);
		}else if($Vkg0aw223kcs == 'UTF-16BE'){
			return self::utf16_decode($Vp4xjtpabm0l);
		}
		
		return $Vp4xjtpabm0l;
	}

	
	public static function utf16_decode($Vyqctydehp2e, $V5iehbuwpeao = TRUE) {
		if( strlen($Vyqctydehp2e) < 2 ) return $Vyqctydehp2e;
		$Vdy1hljdaks3 = ord($Vyqctydehp2e{0});
		$Vxc4jqbmntad = ord($Vyqctydehp2e{1});
		if( $Vdy1hljdaks3 == 0xfe && $Vxc4jqbmntad == 0xff ) { $Vyqctydehp2e = substr($Vyqctydehp2e,2); }
		elseif( $Vdy1hljdaks3 == 0xff && $Vxc4jqbmntad == 0xfe ) { $Vyqctydehp2e = substr($Vyqctydehp2e,2); $V5iehbuwpeao = false; }
		$Vtojwsl3m1uw = strlen($Vyqctydehp2e);
		$Vvyrwiedoe44 = '';
		for($Vfhiq1lhsoja=0;$Vfhiq1lhsoja<$Vtojwsl3m1uw;$Vfhiq1lhsoja+=2) {
			if( $V5iehbuwpeao ) { $Vwk2nao2d33x = ord($Vyqctydehp2e{$Vfhiq1lhsoja})   << 4; $Vwk2nao2d33x += ord($Vyqctydehp2e{$Vfhiq1lhsoja+1}); }
			else {        $Vwk2nao2d33x = ord($Vyqctydehp2e{$Vfhiq1lhsoja+1}) << 4; $Vwk2nao2d33x += ord($Vyqctydehp2e{$Vfhiq1lhsoja}); }
			$Vvyrwiedoe44 .= ($Vwk2nao2d33x == 0x228) ? "\n" : chr($Vwk2nao2d33x);
		}
		return $Vvyrwiedoe44;
	}

	
	public static function CountCharacters($Vp4xjtpabm0l, $Vote1cpe4ukh = 'UTF-8')
	{
		if (self::getIsMbstringEnabled()) {
			return mb_strlen($Vp4xjtpabm0l, $Vote1cpe4ukh);
		}

		if (self::getIsIconvEnabled()) {
			return iconv_strlen($Vp4xjtpabm0l, $Vote1cpe4ukh);
		}

		
		return strlen($Vp4xjtpabm0l);
	}

	
	public static function Substring($Vqujkwol1zut = '', $Vb2xlopy3ca4 = 0, $Vf5kdjhbiigc = 0)
	{
		if (self::getIsMbstringEnabled()) {
			return mb_substr($Vqujkwol1zut, $Vb2xlopy3ca4, $Vf5kdjhbiigc, 'UTF-8');
		}

		if (self::getIsIconvEnabled()) {
			return iconv_substr($Vqujkwol1zut, $Vb2xlopy3ca4, $Vf5kdjhbiigc, 'UTF-8');
		}

		
		return substr($Vqujkwol1zut, $Vb2xlopy3ca4, $Vf5kdjhbiigc);
	}

	
	public static function StrToUpper($Vqujkwol1zut = '')
	{
		if (function_exists('mb_convert_case')) {
			return mb_convert_case($Vqujkwol1zut, MB_CASE_UPPER, "UTF-8");
		}
		return strtoupper($Vqujkwol1zut);
	}

	
	public static function StrToLower($Vqujkwol1zut = '')
	{
		if (function_exists('mb_convert_case')) {
			return mb_convert_case($Vqujkwol1zut, MB_CASE_LOWER, "UTF-8");
		}
		return strtolower($Vqujkwol1zut);
	}

	
	public static function StrToTitle($Vqujkwol1zut = '')
	{
		if (function_exists('mb_convert_case')) {
			return mb_convert_case($Vqujkwol1zut, MB_CASE_TITLE, "UTF-8");
		}
		return ucwords($Vqujkwol1zut);
	}

	
	public static function convertToNumberIfFraction(&$Vwxqq2rdrzpz) {
		if (preg_match('/^'.self::STRING_REGEXP_FRACTION.'$/i', $Vwxqq2rdrzpz, $Vkvvdnwtmjnq)) {
			$Vy31ea41yieh = ($Vkvvdnwtmjnq[1] == '-') ? '-' : '+';
			$Virlvo3eb4ly = '='.$Vy31ea41yieh.$Vkvvdnwtmjnq[2].$Vy31ea41yieh.$Vkvvdnwtmjnq[3];
			$Vwxqq2rdrzpz = PHPExcel_Calculation::getInstance()->_calculateFormulaValue($Virlvo3eb4ly);
			return true;
		}
		return false;
	}	

	
	public static function getDecimalSeparator()
	{
		if (!isset(self::$Vl32hq3klls2)) {
			$Vkbkxvwae2ur = localeconv();
			self::$Vl32hq3klls2 = ($Vkbkxvwae2ur['decimal_point'] != '')
				? $Vkbkxvwae2ur['decimal_point'] : $Vkbkxvwae2ur['mon_decimal_point'];

			if (self::$Vl32hq3klls2 == '') {
				
				self::$Vl32hq3klls2 = '.';
			}
		}
		return self::$Vl32hq3klls2;
	}

	
	public static function setDecimalSeparator($Vqujkwol1zut = '.')
	{
		self::$Vl32hq3klls2 = $Vqujkwol1zut;
	}

	
	public static function getThousandsSeparator()
	{
		if (!isset(self::$Vgv0pxvywytj)) {
			$Vkbkxvwae2ur = localeconv();
			self::$Vgv0pxvywytj = ($Vkbkxvwae2ur['thousands_sep'] != '')
				? $Vkbkxvwae2ur['thousands_sep'] : $Vkbkxvwae2ur['mon_thousands_sep'];

			if (self::$Vgv0pxvywytj == '') {
				
				self::$Vgv0pxvywytj = ',';
			}
		}
		return self::$Vgv0pxvywytj;
	}

	
	public static function setThousandsSeparator($Vqujkwol1zut = ',')
	{
		self::$Vgv0pxvywytj = $Vqujkwol1zut;
	}

	
	public static function getCurrencyCode()
	{
		if (!isset(self::$Vbhz5c3uop0p)) {
			$Vkbkxvwae2ur = localeconv();
			self::$Vbhz5c3uop0p = ($Vkbkxvwae2ur['currency_symbol'] != '')
				? $Vkbkxvwae2ur['currency_symbol'] : $Vkbkxvwae2ur['int_curr_symbol'];

			if (self::$Vbhz5c3uop0p == '') {
				
				self::$Vbhz5c3uop0p = '$';
			}
		}
		return self::$Vbhz5c3uop0p;
	}

	
	public static function setCurrencyCode($Vqujkwol1zut = '$')
	{
		self::$Vbhz5c3uop0p = $Vqujkwol1zut;
	}

	
	public static function SYLKtoUTF8($Vqujkwol1zut = '')
	{
		
		if (strpos($Vqujkwol1zut, '') === false) {
			return $Vqujkwol1zut;
		}

		foreach (self::$Vj4hsi2wedt0 as $V51lf1kcbto4 => $Vf1kwqxxhqpz) {
			$Vqujkwol1zut = str_replace($V51lf1kcbto4, $Vf1kwqxxhqpz, $Vqujkwol1zut);
		}

		return $Vqujkwol1zut;
	}

	
	public static function testStringAsNumeric($Vp4xjtpabm0l)
	{
		if (is_numeric($Vp4xjtpabm0l))
			return $Vp4xjtpabm0l;
		$Vf1kwqxxhqpz = floatval($Vp4xjtpabm0l);
		return (is_numeric(substr($Vp4xjtpabm0l,0,strlen($Vf1kwqxxhqpz)))) ? $Vf1kwqxxhqpz : $Vp4xjtpabm0l;
	}
}
