<?php




class PHPExcel_Shared_Font
{
	
	const AUTOSIZE_METHOD_APPROX	= 'approx';
	const AUTOSIZE_METHOD_EXACT		= 'exact';

	private static $V2tlcp0isfcj = array(
		self::AUTOSIZE_METHOD_APPROX,
		self::AUTOSIZE_METHOD_EXACT,
	);

	
	const CHARSET_ANSI_LATIN				= 0x00;
	const CHARSET_SYSTEM_DEFAULT			= 0x01;
	const CHARSET_SYMBOL					= 0x02;
	const CHARSET_APPLE_ROMAN				= 0x4D;
	const CHARSET_ANSI_JAPANESE_SHIFTJIS	= 0x80;
	const CHARSET_ANSI_KOREAN_HANGUL		= 0x81;
	const CHARSET_ANSI_KOREAN_JOHAB			= 0x82;
	const CHARSET_ANSI_CHINESE_SIMIPLIFIED	= 0x86;		
	const CHARSET_ANSI_CHINESE_TRADITIONAL	= 0x88;		
	const CHARSET_ANSI_GREEK				= 0xA1;
	const CHARSET_ANSI_TURKISH				= 0xA2;
	const CHARSET_ANSI_VIETNAMESE			= 0xA3;
	const CHARSET_ANSI_HEBREW				= 0xB1;
	const CHARSET_ANSI_ARABIC				= 0xB2;
	const CHARSET_ANSI_BALTIC				= 0xBA;
	const CHARSET_ANSI_CYRILLIC				= 0xCC;
	const CHARSET_ANSI_THAI					= 0xDD;
	const CHARSET_ANSI_LATIN_II				= 0xEE;
	const CHARSET_OEM_LATIN_I				= 0xFF;

	
	
	const ARIAL								= 'arial.ttf';
	const ARIAL_BOLD						= 'arialbd.ttf';
	const ARIAL_ITALIC						= 'ariali.ttf';
	const ARIAL_BOLD_ITALIC					= 'arialbi.ttf';

	const CALIBRI							= 'CALIBRI.TTF';
	const CALIBRI_BOLD						= 'CALIBRIB.TTF';
	const CALIBRI_ITALIC					= 'CALIBRII.TTF';
	const CALIBRI_BOLD_ITALIC				= 'CALIBRIZ.TTF';

	const COMIC_SANS_MS						= 'comic.ttf';
	const COMIC_SANS_MS_BOLD				= 'comicbd.ttf';

	const COURIER_NEW						= 'cour.ttf';
	const COURIER_NEW_BOLD					= 'courbd.ttf';
	const COURIER_NEW_ITALIC				= 'couri.ttf';
	const COURIER_NEW_BOLD_ITALIC			= 'courbi.ttf';

	const GEORGIA							= 'georgia.ttf';
	const GEORGIA_BOLD						= 'georgiab.ttf';
	const GEORGIA_ITALIC					= 'georgiai.ttf';
	const GEORGIA_BOLD_ITALIC				= 'georgiaz.ttf';

	const IMPACT							= 'impact.ttf';

	const LIBERATION_SANS					= 'LiberationSans-Regular.ttf';
	const LIBERATION_SANS_BOLD				= 'LiberationSans-Bold.ttf';
	const LIBERATION_SANS_ITALIC			= 'LiberationSans-Italic.ttf';
	const LIBERATION_SANS_BOLD_ITALIC		= 'LiberationSans-BoldItalic.ttf';

	const LUCIDA_CONSOLE					= 'lucon.ttf';
	const LUCIDA_SANS_UNICODE				= 'l_10646.ttf';

	const MICROSOFT_SANS_SERIF				= 'micross.ttf';

	const PALATINO_LINOTYPE					= 'pala.ttf';
	const PALATINO_LINOTYPE_BOLD			= 'palab.ttf';
	const PALATINO_LINOTYPE_ITALIC			= 'palai.ttf';
	const PALATINO_LINOTYPE_BOLD_ITALIC		= 'palabi.ttf';

	const SYMBOL							= 'symbol.ttf';

	const TAHOMA							= 'tahoma.ttf';
	const TAHOMA_BOLD						= 'tahomabd.ttf';

	const TIMES_NEW_ROMAN					= 'times.ttf';
	const TIMES_NEW_ROMAN_BOLD				= 'timesbd.ttf';
	const TIMES_NEW_ROMAN_ITALIC			= 'timesi.ttf';
	const TIMES_NEW_ROMAN_BOLD_ITALIC		= 'timesbi.ttf';

	const TREBUCHET_MS						= 'trebuc.ttf';
	const TREBUCHET_MS_BOLD					= 'trebucbd.ttf';
	const TREBUCHET_MS_ITALIC				= 'trebucit.ttf';
	const TREBUCHET_MS_BOLD_ITALIC			= 'trebucbi.ttf';

	const VERDANA							= 'verdana.ttf';
	const VERDANA_BOLD						= 'verdanab.ttf';
	const VERDANA_ITALIC					= 'verdanai.ttf';
	const VERDANA_BOLD_ITALIC				= 'verdanaz.ttf';

	
	private static $Vp5tfbzua5ar = self::AUTOSIZE_METHOD_APPROX;

	
	private static $V3u5kyaprjcc = null;

	
	public static $Vr2nh5x40fe1 = array(
		'Arial' => array(
			 1 => array('px' => 24, 'width' => 12.00000000),
			 2 => array('px' => 24, 'width' => 12.00000000),
			 3 => array('px' => 32, 'width' => 10.66406250),
			 4 => array('px' => 32, 'width' => 10.66406250),
			 5 => array('px' => 40, 'width' => 10.00000000),
			 6 => array('px' => 48, 'width' =>  9.59765625),
			 7 => array('px' => 48, 'width' =>  9.59765625),
			 8 => array('px' => 56, 'width' =>  9.33203125),
			 9 => array('px' => 64, 'width' =>  9.14062500),
			10 => array('px' => 64, 'width' =>  9.14062500),
		),
		'Calibri' => array(
			 1 => array('px' => 24, 'width' => 12.00000000),
			 2 => array('px' => 24, 'width' => 12.00000000),
			 3 => array('px' => 32, 'width' => 10.66406250),
			 4 => array('px' => 32, 'width' => 10.66406250),
			 5 => array('px' => 40, 'width' => 10.00000000),
			 6 => array('px' => 48, 'width' =>  9.59765625),
			 7 => array('px' => 48, 'width' =>  9.59765625),
			 8 => array('px' => 56, 'width' =>  9.33203125),
			 9 => array('px' => 56, 'width' =>  9.33203125),
			10 => array('px' => 64, 'width' =>  9.14062500),
			11 => array('px' => 64, 'width' =>  9.14062500),
		),
		'Verdana' => array(
			 1 => array('px' => 24, 'width' => 12.00000000),
			 2 => array('px' => 24, 'width' => 12.00000000),
			 3 => array('px' => 32, 'width' => 10.66406250),
			 4 => array('px' => 32, 'width' => 10.66406250),
			 5 => array('px' => 40, 'width' => 10.00000000),
			 6 => array('px' => 48, 'width' =>  9.59765625),
			 7 => array('px' => 48, 'width' =>  9.59765625),
			 8 => array('px' => 64, 'width' =>  9.14062500),
			 9 => array('px' => 72, 'width' =>  9.00000000),
			10 => array('px' => 72, 'width' =>  9.00000000),
		),
	);

	
	public static function setAutoSizeMethod($Vqujkwol1zut = self::AUTOSIZE_METHOD_APPROX)
	{
		if (!in_array($Vqujkwol1zut,self::$V2tlcp0isfcj)) {
			return FALSE;
		}
		self::$Vp5tfbzua5ar = $Vqujkwol1zut;

		return TRUE;
	}

	
	public static function getAutoSizeMethod()
	{
		return self::$Vp5tfbzua5ar;
	}

	
	public static function setTrueTypeFontPath($Vqujkwol1zut = '')
	{
		self::$V3u5kyaprjcc = $Vqujkwol1zut;
	}

	
	public static function getTrueTypeFontPath()
	{
		return self::$V3u5kyaprjcc;
	}

    
	public static function calculateColumnWidth(PHPExcel_Style_Font $Vj0kojsfk0h3, $Vpsr1dcnnk2q = '', $Vohulok3iiau = 0, PHPExcel_Style_Font $V0ptxymuwhih = null) {
		
		if ($Vpsr1dcnnk2q instanceof PHPExcel_RichText) {
			$Vpsr1dcnnk2q = $Vpsr1dcnnk2q->getPlainText();
		}

		
		if (strpos($Vpsr1dcnnk2q, "\n") !== false) {
			$Vozrwqijbun0 = explode("\n", $Vpsr1dcnnk2q);
			$Vkhenhp5lgc3 = array();
			foreach ($Vozrwqijbun0 as $Vdcb53kpxj2k) {
				$Veoxorxya1i1[] = self::calculateColumnWidth($Vj0kojsfk0h3, $Vdcb53kpxj2k, $Vohulok3iiau = 0, $V0ptxymuwhih);
			}
			return max($Veoxorxya1i1); 
		}

		
        $Vb3juerjxqy0 = self::$Vp5tfbzua5ar == self::AUTOSIZE_METHOD_APPROX;
        if (!$Vb3juerjxqy0) {
            $Vysu5jcawry4 = ceil(self::getTextWidthPixelsExact('n', $Vj0kojsfk0h3, 0) * 1.07);
            try {
                
                
                $Vmfjoznitjbq = self::getTextWidthPixelsExact($Vpsr1dcnnk2q, $Vj0kojsfk0h3, $Vohulok3iiau) + $Vysu5jcawry4;
            } catch (PHPExcel_Exception $Vnhm0uuykimv) {
                $Vb3juerjxqy0 == true;
            }
        }

        if ($Vb3juerjxqy0) {
            $Vysu5jcawry4 = self::getTextWidthPixelsApprox('n', $Vj0kojsfk0h3, 0);
			
			
			$Vmfjoznitjbq = self::getTextWidthPixelsApprox($Vpsr1dcnnk2q, $Vj0kojsfk0h3, $Vohulok3iiau) + $Vysu5jcawry4;
        }

		
		$Vmfjoznitjbq = PHPExcel_Shared_Drawing::pixelsToCellDimension($Vmfjoznitjbq, $V0ptxymuwhih);

		
		return round($Vmfjoznitjbq, 6);
	}

	
	public static function getTextWidthPixelsExact($Vkjdq1foihhi, PHPExcel_Style_Font $Vj0kojsfk0h3, $Vohulok3iiau = 0) {
		if (!function_exists('imagettfbbox')) {
			throw new PHPExcel_Exception('GD library needs to be enabled');
		}

		
		
		$Vj0kojsfk0h3File = self::getTrueTypeFontFileFromFont($Vj0kojsfk0h3);
		$Vkjdq1foihhiBox = imagettfbbox($Vj0kojsfk0h3->getSize(), $Vohulok3iiau, $Vj0kojsfk0h3File, $Vkjdq1foihhi);

		
		$V3zbxkvsqchv  = $Vkjdq1foihhiBox[0];

		$Vyqeebcqhtox = $Vkjdq1foihhiBox[2];

		$Vi0p2jho3q2l = $Vkjdq1foihhiBox[4];

		$Vpxesbbqimke  = $Vkjdq1foihhiBox[6];


		
		$Vkjdq1foihhiWidth = max($Vyqeebcqhtox - $Vpxesbbqimke, $Vi0p2jho3q2l - $V3zbxkvsqchv);

		return $Vkjdq1foihhiWidth;
	}

	
	public static function getTextWidthPixelsApprox($Vjonv03nhn32, PHPExcel_Style_Font $Vj0kojsfk0h3 = null, $Vohulok3iiau = 0)
	{
		$Vj0kojsfk0h3Name = $Vj0kojsfk0h3->getName();
		$Vj0kojsfk0h3Size = $Vj0kojsfk0h3->getSize();

		
		switch ($Vj0kojsfk0h3Name) {
			case 'Calibri':
				
				$Vmfjoznitjbq = (int) (8.26 * PHPExcel_Shared_String::CountCharacters($Vjonv03nhn32));
				$Vmfjoznitjbq = $Vmfjoznitjbq * $Vj0kojsfk0h3Size / 11; 
				break;

			case 'Arial':
				

                
				$Vmfjoznitjbq = (int) (8 * PHPExcel_Shared_String::CountCharacters($Vjonv03nhn32));
				$Vmfjoznitjbq = $Vmfjoznitjbq * $Vj0kojsfk0h3Size / 10; 
                break;

			case 'Verdana':
				
				$Vmfjoznitjbq = (int) (8 * PHPExcel_Shared_String::CountCharacters($Vjonv03nhn32));
				$Vmfjoznitjbq = $Vmfjoznitjbq * $Vj0kojsfk0h3Size / 10; 
				break;

			default:
				
				$Vmfjoznitjbq = (int) (8.26 * PHPExcel_Shared_String::CountCharacters($Vjonv03nhn32));
				$Vmfjoznitjbq = $Vmfjoznitjbq * $Vj0kojsfk0h3Size / 11; 
				break;
		}

		
		if ($Vohulok3iiau !== 0) {
			if ($Vohulok3iiau == -165) {
				
				$Vmfjoznitjbq = 4; 
			} else {
				
				$Vmfjoznitjbq = $Vmfjoznitjbq * cos(deg2rad($Vohulok3iiau))
								+ $Vj0kojsfk0h3Size * abs(sin(deg2rad($Vohulok3iiau))) / 5; 
			}
		}

		
		return (int) $Vmfjoznitjbq;
	}

	
	public static function fontSizeToPixels($Vj0kojsfk0h3SizeInPoints = 11) {
		return (int) ((4 / 3) * $Vj0kojsfk0h3SizeInPoints);
	}

	
	public static function inchSizeToPixels($Vaglkposq4e5 = 1) {
		return ($Vaglkposq4e5 * 96);
	}

	
	public static function centimeterSizeToPixels($Vwga0ltxm3ej = 1) {
		return ($Vwga0ltxm3ej * 37.795275591);
	}

	
	public static function getTrueTypeFontFileFromFont($Vj0kojsfk0h3) {
		if (!file_exists(self::$V3u5kyaprjcc) || !is_dir(self::$V3u5kyaprjcc)) {
			throw new PHPExcel_Exception('Valid directory to TrueType Font files not specified');
		}

		$Vcvluzjs3wzb		= $Vj0kojsfk0h3->getName();
		$Vqgmpyzmahgw		= $Vj0kojsfk0h3->getBold();
		$Vmeubejdy4zy		= $Vj0kojsfk0h3->getItalic();

		
		switch ($Vcvluzjs3wzb) {
			case 'Arial':
				$Vj0kojsfk0h3File = (
					$Vqgmpyzmahgw ? ($Vmeubejdy4zy ? self::ARIAL_BOLD_ITALIC : self::ARIAL_BOLD)
						  : ($Vmeubejdy4zy ? self::ARIAL_ITALIC : self::ARIAL)
				);
				break;

			case 'Calibri':
				$Vj0kojsfk0h3File = (
					$Vqgmpyzmahgw ? ($Vmeubejdy4zy ? self::CALIBRI_BOLD_ITALIC : self::CALIBRI_BOLD)
						  : ($Vmeubejdy4zy ? self::CALIBRI_ITALIC : self::CALIBRI)
				);
				break;

			case 'Courier New':
				$Vj0kojsfk0h3File = (
					$Vqgmpyzmahgw ? ($Vmeubejdy4zy ? self::COURIER_NEW_BOLD_ITALIC : self::COURIER_NEW_BOLD)
						  : ($Vmeubejdy4zy ? self::COURIER_NEW_ITALIC : self::COURIER_NEW)
				);
				break;

			case 'Comic Sans MS':
				$Vj0kojsfk0h3File = (
					$Vqgmpyzmahgw ? self::COMIC_SANS_MS_BOLD : self::COMIC_SANS_MS
				);
				break;

			case 'Georgia':
				$Vj0kojsfk0h3File = (
					$Vqgmpyzmahgw ? ($Vmeubejdy4zy ? self::GEORGIA_BOLD_ITALIC : self::GEORGIA_BOLD)
						  : ($Vmeubejdy4zy ? self::GEORGIA_ITALIC : self::GEORGIA)
				);
				break;

			case 'Impact':
				$Vj0kojsfk0h3File = self::IMPACT;
				break;

			case 'Liberation Sans':
				$Vj0kojsfk0h3File = (
					$Vqgmpyzmahgw ? ($Vmeubejdy4zy ? self::LIBERATION_SANS_BOLD_ITALIC : self::LIBERATION_SANS_BOLD)
						  : ($Vmeubejdy4zy ? self::LIBERATION_SANS_ITALIC : self::LIBERATION_SANS)
				);
				break;

			case 'Lucida Console':
				$Vj0kojsfk0h3File = self::LUCIDA_CONSOLE;
				break;

			case 'Lucida Sans Unicode':
				$Vj0kojsfk0h3File = self::LUCIDA_SANS_UNICODE;
				break;

			case 'Microsoft Sans Serif':
				$Vj0kojsfk0h3File = self::MICROSOFT_SANS_SERIF;
				break;

			case 'Palatino Linotype':
				$Vj0kojsfk0h3File = (
					$Vqgmpyzmahgw ? ($Vmeubejdy4zy ? self::PALATINO_LINOTYPE_BOLD_ITALIC : self::PALATINO_LINOTYPE_BOLD)
						  : ($Vmeubejdy4zy ? self::PALATINO_LINOTYPE_ITALIC : self::PALATINO_LINOTYPE)
				);
				break;

			case 'Symbol':
				$Vj0kojsfk0h3File = self::SYMBOL;
				break;

			case 'Tahoma':
				$Vj0kojsfk0h3File = (
					$Vqgmpyzmahgw ? self::TAHOMA_BOLD : self::TAHOMA
				);
				break;

			case 'Times New Roman':
				$Vj0kojsfk0h3File = (
					$Vqgmpyzmahgw ? ($Vmeubejdy4zy ? self::TIMES_NEW_ROMAN_BOLD_ITALIC : self::TIMES_NEW_ROMAN_BOLD)
						  : ($Vmeubejdy4zy ? self::TIMES_NEW_ROMAN_ITALIC : self::TIMES_NEW_ROMAN)
				);
				break;

			case 'Trebuchet MS':
				$Vj0kojsfk0h3File = (
					$Vqgmpyzmahgw ? ($Vmeubejdy4zy ? self::TREBUCHET_MS_BOLD_ITALIC : self::TREBUCHET_MS_BOLD)
						  : ($Vmeubejdy4zy ? self::TREBUCHET_MS_ITALIC : self::TREBUCHET_MS)
				);
				break;

			case 'Verdana':
				$Vj0kojsfk0h3File = (
					$Vqgmpyzmahgw ? ($Vmeubejdy4zy ? self::VERDANA_BOLD_ITALIC : self::VERDANA_BOLD)
						  : ($Vmeubejdy4zy ? self::VERDANA_ITALIC : self::VERDANA)
				);
				break;

			default:
				throw new PHPExcel_Exception('Unknown font name "'. $Vcvluzjs3wzb .'". Cannot map to TrueType font file');
				break;
		}

		$Vj0kojsfk0h3File = self::$V3u5kyaprjcc . $Vj0kojsfk0h3File;

		
		if (!file_exists($Vj0kojsfk0h3File)) {
			throw New PHPExcel_Exception('TrueType Font file not found');
		}

		return $Vj0kojsfk0h3File;
	}

	
	public static function getCharsetFromFontName($Vcvluzjs3wzb)
	{
		switch ($Vcvluzjs3wzb) {
			
			case 'EucrosiaUPC':		return self::CHARSET_ANSI_THAI;
			case 'Wingdings':		return self::CHARSET_SYMBOL;
			case 'Wingdings 2':		return self::CHARSET_SYMBOL;
			case 'Wingdings 3':		return self::CHARSET_SYMBOL;
			default:				return self::CHARSET_ANSI_LATIN;
		}
	}

	
	public static function getDefaultColumnWidthByFont(PHPExcel_Style_Font $Vj0kojsfk0h3, $Vtgoibs1lqr0 = false)
	{
		if (isset(self::$Vr2nh5x40fe1[$Vj0kojsfk0h3->getName()][$Vj0kojsfk0h3->getSize()])) {
			
			$Vmfjoznitjbq = $Vtgoibs1lqr0 ?
				self::$Vr2nh5x40fe1[$Vj0kojsfk0h3->getName()][$Vj0kojsfk0h3->getSize()]['px']
					: self::$Vr2nh5x40fe1[$Vj0kojsfk0h3->getName()][$Vj0kojsfk0h3->getSize()]['width'];

		} else {
			
			
			$Vmfjoznitjbq = $Vtgoibs1lqr0 ?
				self::$Vr2nh5x40fe1['Calibri'][11]['px']
					: self::$Vr2nh5x40fe1['Calibri'][11]['width'];
			$Vmfjoznitjbq = $Vmfjoznitjbq * $Vj0kojsfk0h3->getSize() / 11;

			
			if ($Vtgoibs1lqr0) {
				$Vmfjoznitjbq = (int) round($Vmfjoznitjbq);
			}
		}

		return $Vmfjoznitjbq;
	}

	
	public static function getDefaultRowHeightByFont(PHPExcel_Style_Font $Vj0kojsfk0h3)
	{
		switch ($Vj0kojsfk0h3->getName()) {
			case 'Arial':
				switch ($Vj0kojsfk0h3->getSize()) {
					case 10:
						
						$Vapfi3rexoqm = 12.75;
						break;

					case 9:
						
						$Vapfi3rexoqm = 12;
						break;

					case 8:
						
						$Vapfi3rexoqm = 11.25;
						break;

					case 7:
						
						$Vapfi3rexoqm = 9;
						break;

					case 6:
					case 5:
						
						$Vapfi3rexoqm = 8.25;
						break;

					case 4:
						
						$Vapfi3rexoqm = 6.75;
						break;

					case 3:
						
						$Vapfi3rexoqm = 6;
						break;

					case 2:
					case 1:
						
						$Vapfi3rexoqm = 5.25;
						break;

					default:
						
						$Vapfi3rexoqm = 12.75 * $Vj0kojsfk0h3->getSize() / 10;
						break;
				}
				break;

			case 'Calibri':
				switch ($Vj0kojsfk0h3->getSize()) {
					case 11:
						
						$Vapfi3rexoqm = 15;
						break;

					case 10:
						
						$Vapfi3rexoqm = 12.75;
						break;

					case 9:
						
						$Vapfi3rexoqm = 12;
						break;

					case 8:
						
						$Vapfi3rexoqm = 11.25;
						break;

					case 7:
						
						$Vapfi3rexoqm = 9;
						break;

					case 6:
					case 5:
						
						$Vapfi3rexoqm = 8.25;
						break;

					case 4:
						
						$Vapfi3rexoqm = 6.75;
						break;

					case 3:
						
						$Vapfi3rexoqm = 6.00;
						break;

					case 2:
					case 1:
						
						$Vapfi3rexoqm = 5.25;
						break;

					default:
						
						$Vapfi3rexoqm = 15 * $Vj0kojsfk0h3->getSize() / 11;
						break;
				}
				break;

			case 'Verdana':
				switch ($Vj0kojsfk0h3->getSize()) {
					case 10:
						
						$Vapfi3rexoqm = 12.75;
						break;

					case 9:
						
						$Vapfi3rexoqm = 11.25;
						break;

					case 8:
						
						$Vapfi3rexoqm = 10.50;
						break;

					case 7:
						
						$Vapfi3rexoqm = 9.00;
						break;

					case 6:
					case 5:
						
						$Vapfi3rexoqm = 8.25;
						break;

					case 4:
						
						$Vapfi3rexoqm = 6.75;
						break;

					case 3:
						
						$Vapfi3rexoqm = 6;
						break;

					case 2:
					case 1:
						
						$Vapfi3rexoqm = 5.25;
						break;

					default:
						
						$Vapfi3rexoqm = 12.75 * $Vj0kojsfk0h3->getSize() / 10;
						break;
				}
				break;

			default:
				
				$Vapfi3rexoqm = 15 * $Vj0kojsfk0h3->getSize() / 11;
				break;
		}

		return $Vapfi3rexoqm;
	}

}
