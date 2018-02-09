<?php




class PHPExcel_Style_NumberFormat extends PHPExcel_Style_Supervisor implements PHPExcel_IComparable
{
	
	const FORMAT_GENERAL					= 'General';

	const FORMAT_TEXT						= '@';

	const FORMAT_NUMBER						= '0';
	const FORMAT_NUMBER_00					= '0.00';
	const FORMAT_NUMBER_COMMA_SEPARATED1	= '#,##0.00';
	const FORMAT_NUMBER_COMMA_SEPARATED2	= '#,##0.00_-';

	const FORMAT_PERCENTAGE					= '0%';
	const FORMAT_PERCENTAGE_00				= '0.00%';

	const FORMAT_DATE_YYYYMMDD2				= 'yyyy-mm-dd';
	const FORMAT_DATE_YYYYMMDD				= 'yy-mm-dd';
	const FORMAT_DATE_DDMMYYYY				= 'dd/mm/yy';
	const FORMAT_DATE_DMYSLASH				= 'd/m/y';
	const FORMAT_DATE_DMYMINUS				= 'd-m-y';
	const FORMAT_DATE_DMMINUS				= 'd-m';
	const FORMAT_DATE_MYMINUS				= 'm-y';
	const FORMAT_DATE_XLSX14				= 'mm-dd-yy';
	const FORMAT_DATE_XLSX15				= 'd-mmm-yy';
	const FORMAT_DATE_XLSX16				= 'd-mmm';
	const FORMAT_DATE_XLSX17				= 'mmm-yy';
	const FORMAT_DATE_XLSX22				= 'm/d/yy h:mm';
	const FORMAT_DATE_DATETIME				= 'd/m/y h:mm';
	const FORMAT_DATE_TIME1					= 'h:mm AM/PM';
	const FORMAT_DATE_TIME2					= 'h:mm:ss AM/PM';
	const FORMAT_DATE_TIME3					= 'h:mm';
	const FORMAT_DATE_TIME4					= 'h:mm:ss';
	const FORMAT_DATE_TIME5					= 'mm:ss';
	const FORMAT_DATE_TIME6					= 'h:mm:ss';
	const FORMAT_DATE_TIME7					= 'i:s.S';
	const FORMAT_DATE_TIME8					= 'h:mm:ss;@';
	const FORMAT_DATE_YYYYMMDDSLASH			= 'yy/mm/dd;@';

	const FORMAT_CURRENCY_USD_SIMPLE		= '"$"#,##0.00_-';
	const FORMAT_CURRENCY_USD				= '$#,##0_-';
	const FORMAT_CURRENCY_EUR_SIMPLE		= '[$Ve3f0wfpaoc1 ]#,##0.00_-';

	
	protected static $Vwyaf1svljtr;

	
	protected static $Vgtjbm4dyj1m;

	
	protected $Vf0dpdsb1eua	=	PHPExcel_Style_NumberFormat::FORMAT_GENERAL;

	
	protected $Vomvqj10hdaw	= 0;

	
	public function __construct($Vk1afaiczap4 = FALSE, $Vm5dy1e2hvny = FALSE)
	{
		
		parent::__construct($Vk1afaiczap4);

		if ($Vm5dy1e2hvny) {
			$this->_formatCode = NULL;
			$this->_builtInFormatCode = FALSE;
		}
	}

	
	public function getSharedComponent()
	{
		return $this->_parent->getSharedComponent()->getNumberFormat();
	}

	
	public function getStyleArray($Vi2ourgzeiw5)
	{
		return array('numberformat' => $Vi2ourgzeiw5);
	}

	
	public function applyFromArray($Vkaawzjkapbw = null)
	{
		if (is_array($Vkaawzjkapbw)) {
			if ($this->_isSupervisor) {
				$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($this->getStyleArray($Vkaawzjkapbw));
			} else {
				if (array_key_exists('code', $Vkaawzjkapbw)) {
					$this->setFormatCode($Vkaawzjkapbw['code']);
				}
			}
		} else {
			throw new PHPExcel_Exception("Invalid style array passed.");
		}
		return $this;
	}

	
	public function getFormatCode()
	{
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getFormatCode();
		}
		if ($this->_builtInFormatCode !== false)
		{
			return self::builtInFormatCode($this->_builtInFormatCode);
		}
		return $this->_formatCode;
	}

	
	public function setFormatCode($Vqujkwol1zut = PHPExcel_Style_NumberFormat::FORMAT_GENERAL)
	{
		if ($Vqujkwol1zut == '') {
			$Vqujkwol1zut = PHPExcel_Style_NumberFormat::FORMAT_GENERAL;
		}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('code' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_formatCode = $Vqujkwol1zut;
			$this->_builtInFormatCode = self::builtInFormatCodeIndex($Vqujkwol1zut);
		}
		return $this;
	}

	
	public function getBuiltInFormatCode()
	{
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getBuiltInFormatCode();
		}
		return $this->_builtInFormatCode;
	}

	
	public function setBuiltInFormatCode($Vqujkwol1zut = 0)
	{

		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('code' => self::builtInFormatCode($Vqujkwol1zut)));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_builtInFormatCode = $Vqujkwol1zut;
			$this->_formatCode = self::builtInFormatCode($Vqujkwol1zut);
		}
		return $this;
	}

	
	private static function fillBuiltInFormatCodes()
	{
		
		if (is_null(self::$Vwyaf1svljtr)) {
			self::$Vwyaf1svljtr = array();

			
			self::$Vwyaf1svljtr[0] = PHPExcel_Style_NumberFormat::FORMAT_GENERAL;
			self::$Vwyaf1svljtr[1] = '0';
			self::$Vwyaf1svljtr[2] = '0.00';
			self::$Vwyaf1svljtr[3] = '#,##0';
			self::$Vwyaf1svljtr[4] = '#,##0.00';

			self::$Vwyaf1svljtr[9] = '0%';
			self::$Vwyaf1svljtr[10] = '0.00%';
			self::$Vwyaf1svljtr[11] = '0.00E+00';
			self::$Vwyaf1svljtr[12] = '# ?/?';
			self::$Vwyaf1svljtr[13] = '# ??/??';
			self::$Vwyaf1svljtr[14] = 'mm-dd-yy';
			self::$Vwyaf1svljtr[15] = 'd-mmm-yy';
			self::$Vwyaf1svljtr[16] = 'd-mmm';
			self::$Vwyaf1svljtr[17] = 'mmm-yy';
			self::$Vwyaf1svljtr[18] = 'h:mm AM/PM';
			self::$Vwyaf1svljtr[19] = 'h:mm:ss AM/PM';
			self::$Vwyaf1svljtr[20] = 'h:mm';
			self::$Vwyaf1svljtr[21] = 'h:mm:ss';
			self::$Vwyaf1svljtr[22] = 'm/d/yy h:mm';

			self::$Vwyaf1svljtr[37] = '#,##0 ;(#,##0)';
			self::$Vwyaf1svljtr[38] = '#,##0 ;[Red](#,##0)';
			self::$Vwyaf1svljtr[39] = '#,##0.00;(#,##0.00)';
			self::$Vwyaf1svljtr[40] = '#,##0.00;[Red](#,##0.00)';

			self::$Vwyaf1svljtr[44] = '_("$"* #,##0.00_);_("$"* \(#,##0.00\);_("$"* "-"??_);_(@_)';
			self::$Vwyaf1svljtr[45] = 'mm:ss';
			self::$Vwyaf1svljtr[46] = '[h]:mm:ss';
			self::$Vwyaf1svljtr[47] = 'mmss.0';
			self::$Vwyaf1svljtr[48] = '##0.0E+0';
			self::$Vwyaf1svljtr[49] = '@';

			
			self::$Vwyaf1svljtr[27] = '[$-404]e/m/d';
			self::$Vwyaf1svljtr[30] = 'm/d/yy';
			self::$Vwyaf1svljtr[36] = '[$-404]e/m/d';
			self::$Vwyaf1svljtr[50] = '[$-404]e/m/d';
			self::$Vwyaf1svljtr[57] = '[$-404]e/m/d';

			
			self::$Vwyaf1svljtr[59] = 't0';
			self::$Vwyaf1svljtr[60] = 't0.00';
			self::$Vwyaf1svljtr[61] = 't#,##0';
			self::$Vwyaf1svljtr[62] = 't#,##0.00';
			self::$Vwyaf1svljtr[67] = 't0%';
			self::$Vwyaf1svljtr[68] = 't0.00%';
			self::$Vwyaf1svljtr[69] = 't# ?/?';
			self::$Vwyaf1svljtr[70] = 't# ??/??';

			
			self::$Vgtjbm4dyj1m = array_flip(self::$Vwyaf1svljtr);
		}
	}

	
	public static function builtInFormatCode($V4z43kvcbihn)
	{
		
		$V4z43kvcbihn = intval($V4z43kvcbihn);

		
		self::fillBuiltInFormatCodes();

		
		if (isset(self::$Vwyaf1svljtr[$V4z43kvcbihn])) {
			return self::$Vwyaf1svljtr[$V4z43kvcbihn];
		}

		return '';
	}

	
	public static function builtInFormatCodeIndex($Ve5ckeo1jgxp)
	{
		
		self::fillBuiltInFormatCodes();

		
		if (isset(self::$Vgtjbm4dyj1m[$Ve5ckeo1jgxp])) {
			return self::$Vgtjbm4dyj1m[$Ve5ckeo1jgxp];
		}

		return false;
	}

	
	public function getHashCode()
	{
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getHashCode();
		}
		return md5(
			  $this->_formatCode
			. $this->_builtInFormatCode
			. __CLASS__
		);
	}

	
	private static $V4wxsn4tlqsb = array(
			
			'\\'	=> '',
			
			'am/pm'	=> 'A',
			
			'e'	=> 'Y',
			'yyyy'	=> 'Y',
			
			'yy'	=> 'y',
			
			'mmmmm'	=> 'M',
			
			'mmmm'	=> 'F',
			
			'mmm'	=> 'M',
			
			
			
			':mm'	=> ':i',
			'mm:'	=> 'i:',
			
			'mm'	=> 'm',
			
			'm'		=> 'n',
			
			'dddd'	=> 'l',
			
			'ddd'	=> 'D',
			
			'dd'	=> 'd',
			
			'd'		=> 'j',
			
			'ss'	=> 's',
			
			'.s'	=> ''
		);
	
	private static $V4wxsn4tlqsb24 = array(
			'hh'	=> 'H',
			'h'		=> 'G'
		);
	
	private static $V4wxsn4tlqsb12 = array(
			'hh'	=> 'h',
			'h'		=> 'g'
		);

	private static function _formatAsDate(&$Vp4xjtpabm0l, &$Vrcanlvxmlmp)
	{
		

		
		
		
		$Vrcanlvxmlmp = preg_replace('/^(\[\$[A-Z]*-[0-9A-F]*\])/i', '', $Vrcanlvxmlmp);

		
		$Vrcanlvxmlmp = strtolower($Vrcanlvxmlmp);

		$Vrcanlvxmlmp = strtr($Vrcanlvxmlmp,self::$V4wxsn4tlqsb);
		if (!strpos($Vrcanlvxmlmp,'A')) {	
			$Vrcanlvxmlmp = strtr($Vrcanlvxmlmp,self::$V4wxsn4tlqsb24);
		} else {					
			$Vrcanlvxmlmp = strtr($Vrcanlvxmlmp,self::$V4wxsn4tlqsb12);
		}

		$V1flaqcxqdm1 = PHPExcel_Shared_Date::ExcelToPHPObject($Vp4xjtpabm0l);
		$Vp4xjtpabm0l = $V1flaqcxqdm1->format($Vrcanlvxmlmp);
	}

	private static function _formatAsPercentage(&$Vp4xjtpabm0l, &$Vrcanlvxmlmp)
	{
		if ($Vrcanlvxmlmp === self::FORMAT_PERCENTAGE) {
			$Vp4xjtpabm0l = round( (100 * $Vp4xjtpabm0l), 0) . '%';
		} else {
			if (preg_match('/\.[#0]+/i', $Vrcanlvxmlmp, $Vt54vmttyjzc)) {
				$V2n430jknk35 = substr($Vt54vmttyjzc[0], 0, 1) . (strlen($Vt54vmttyjzc[0]) - 1);
				$Vrcanlvxmlmp = str_replace($Vt54vmttyjzc[0], $V2n430jknk35, $Vrcanlvxmlmp);
			}
			if (preg_match('/^[#0]+/', $Vrcanlvxmlmp, $Vt54vmttyjzc)) {
				$Vrcanlvxmlmp = str_replace($Vt54vmttyjzc[0], strlen($Vt54vmttyjzc[0]), $Vrcanlvxmlmp);
			}
			$Vrcanlvxmlmp = '%' . str_replace('%', 'f%%', $Vrcanlvxmlmp);

			$Vp4xjtpabm0l = sprintf($Vrcanlvxmlmp, 100 * $Vp4xjtpabm0l);
		}
	}

	private static function _formatAsFraction(&$Vp4xjtpabm0l, &$Vrcanlvxmlmp)
	{
		$V2n430jknk35ign = ($Vp4xjtpabm0l < 0) ? '-' : '';

		$Vcz0vokbv0bs = floor(abs($Vp4xjtpabm0l));
		$Vglimcfv2xpf = trim(fmod(abs($Vp4xjtpabm0l),1),'0.');
		$Vgvgaauhk5yr = strlen($Vglimcfv2xpf);
		$Vcezfeqyw55t = pow(10,$Vgvgaauhk5yr);

		$Vtmal2j4q2do = PHPExcel_Calculation_MathTrig::GCD($Vglimcfv2xpf,$Vcezfeqyw55t);

		$V1e2q03kfdkz = $Vglimcfv2xpf/$Vtmal2j4q2do;
		$Vgpw5qdeowtr = $Vcezfeqyw55t/$Vtmal2j4q2do;

		if ((strpos($Vrcanlvxmlmp,'0') !== false) || (strpos($Vrcanlvxmlmp,'#') !== false) || (substr($Vrcanlvxmlmp,0,3) == '? ?')) {
			if ($Vcz0vokbv0bs == 0) {
				$Vcz0vokbv0bs = '';
			}
			$Vp4xjtpabm0l = "$V2n430jknk35ign$Vcz0vokbv0bs $V1e2q03kfdkz/$Vgpw5qdeowtr";
		} else {
			$V1e2q03kfdkz += $Vcz0vokbv0bs * $Vgpw5qdeowtr;
			$Vp4xjtpabm0l = "$V2n430jknk35ign$V1e2q03kfdkz/$Vgpw5qdeowtr";
		}
	}

	private static function _complexNumberFormatMask($V2xlryyxxahg, $Vt54vmttyjzcask) {
		if (strpos($Vt54vmttyjzcask,'.') !== false) {
			$V2xlryyxxahgs = explode('.', $V2xlryyxxahg . '.0');
			$Vt54vmttyjzcasks = explode('.', $Vt54vmttyjzcask . '.0');
			$Vpoigfaaezgk = self::_complexNumberFormatMask($V2xlryyxxahgs[0], $Vt54vmttyjzcasks[0]);
			$Viiitrlskm2n = strrev(self::_complexNumberFormatMask(strrev($V2xlryyxxahgs[1]), strrev($Vt54vmttyjzcasks[1])));
			return $Vpoigfaaezgk . '.' . $Viiitrlskm2n;
		}

		$Vws44nszhvgo = preg_match_all('/0+/', $Vt54vmttyjzcask, $Vws44nszhvgoesult, PREG_OFFSET_CAPTURE);
		if ($Vws44nszhvgo > 1) {
			$Vws44nszhvgoesult = array_reverse($Vws44nszhvgoesult[0]);

			foreach($Vws44nszhvgoesult as $V4uturqtpcq5) {
				$Vmfmukxaejye = 1 . $V4uturqtpcq5[0];
				$V2n430jknk35ize = strlen($V4uturqtpcq5[0]);
				$Vortqlloirgz = $V4uturqtpcq5[1];

				$V4uturqtpcq5Value = sprintf(
					'%0' . $V2n430jknk35ize . 'd',
					fmod($V2xlryyxxahg, $Vmfmukxaejye)
				);
				$V2xlryyxxahg = floor($V2xlryyxxahg / $Vmfmukxaejye);
				$Vt54vmttyjzcask = substr_replace($Vt54vmttyjzcask,$V4uturqtpcq5Value, $Vortqlloirgz, $V2n430jknk35ize);
			}
			if ($V2xlryyxxahg > 0) {
				$Vt54vmttyjzcask = substr_replace($Vt54vmttyjzcask, $V2xlryyxxahg, $Vortqlloirgz, 0);
			}
			$Vws44nszhvgoesult = $Vt54vmttyjzcask;
		} else {
			$Vws44nszhvgoesult = $V2xlryyxxahg;
		}

		return $Vws44nszhvgoesult;
	}

	
	public static function toFormattedString($Vp4xjtpabm0l = '0', $Vrcanlvxmlmp = PHPExcel_Style_NumberFormat::FORMAT_GENERAL, $V4hwpfjp3kwi = null)
	{
		
		if (!is_numeric($Vp4xjtpabm0l)) return $Vp4xjtpabm0l;

		
		
		if (($Vrcanlvxmlmp === PHPExcel_Style_NumberFormat::FORMAT_GENERAL) || ($Vrcanlvxmlmp === PHPExcel_Style_NumberFormat::FORMAT_TEXT)) {
			return $Vp4xjtpabm0l;
		}

		
		$V2n430jknk35ections = explode(';', $Vrcanlvxmlmp);

		
		
		
		
		
		
		
		switch (count($V2n430jknk35ections)) {
			case 1:
				$Vrcanlvxmlmp = $V2n430jknk35ections[0];
				break;

			case 2:
				$Vrcanlvxmlmp = ($Vp4xjtpabm0l >= 0) ? $V2n430jknk35ections[0] : $V2n430jknk35ections[1];
				$Vp4xjtpabm0l = abs($Vp4xjtpabm0l); 
				break;

			case 3:
				$Vrcanlvxmlmp = ($Vp4xjtpabm0l > 0) ?
					$V2n430jknk35ections[0] : ( ($Vp4xjtpabm0l < 0) ?
						$V2n430jknk35ections[1] : $V2n430jknk35ections[2]);
				$Vp4xjtpabm0l = abs($Vp4xjtpabm0l); 
				break;

			case 4:
				$Vrcanlvxmlmp = ($Vp4xjtpabm0l > 0) ?
					$V2n430jknk35ections[0] : ( ($Vp4xjtpabm0l < 0) ?
						$V2n430jknk35ections[1] : $V2n430jknk35ections[2]);
				$Vp4xjtpabm0l = abs($Vp4xjtpabm0l); 
				break;

			default:
				
				$Vrcanlvxmlmp = $V2n430jknk35ections[0];
				break;
		}

		
		$VrcanlvxmlmpColor = $Vrcanlvxmlmp;

		
		$Vdbqncg4ihoq = '/^\\[[a-zA-Z]+\\]/';
		$Vrcanlvxmlmp = preg_replace($Vdbqncg4ihoq, '', $Vrcanlvxmlmp);

		
		if (preg_match('/^(\[\$[A-Z]*-[0-9A-F]*\])*[hmsdy]/i', $Vrcanlvxmlmp)) { 
			self::_formatAsDate($Vp4xjtpabm0l, $Vrcanlvxmlmp);
		} else if (preg_match('/%$/', $Vrcanlvxmlmp)) { 
			self::_formatAsPercentage($Vp4xjtpabm0l, $Vrcanlvxmlmp);
		} else {
			if ($Vrcanlvxmlmp === self::FORMAT_CURRENCY_EUR_SIMPLE) {
				$Vp4xjtpabm0l = 'EUR ' . sprintf('%1.2f', $Vp4xjtpabm0l);
			} else {
				
				$Vrcanlvxmlmp = preg_replace('/_./', '', $Vrcanlvxmlmp);

				
				$Vrcanlvxmlmp = preg_replace("/\\\\/", '', $Vrcanlvxmlmp);

				
				$Vrcanlvxmlmp = str_replace(array('"','*'), '', $Vrcanlvxmlmp);

				
				
				
				$Vfjijb5jlwm3 = preg_match('/(#,#|0,0)/', $Vrcanlvxmlmp);
				if ($Vfjijb5jlwm3) {
					$Vrcanlvxmlmp = preg_replace('/0,0/', '00', $Vrcanlvxmlmp);
					$Vrcanlvxmlmp = preg_replace('/#,#/', '##', $Vrcanlvxmlmp);
				}

				
				
				
				$V2n430jknk35cale = 1; 
				$Vt54vmttyjzcatches = array();
				if (preg_match('/(#|0)(,+)/', $Vrcanlvxmlmp, $Vt54vmttyjzcatches)) {
					$V2n430jknk35cale = pow(1000, strlen($Vt54vmttyjzcatches[2]));

					
					$Vrcanlvxmlmp = preg_replace('/0,+/', '0', $Vrcanlvxmlmp);
					$Vrcanlvxmlmp = preg_replace('/#,+/', '#', $Vrcanlvxmlmp);
				}

				if (preg_match('/#?.*\?\/\?/', $Vrcanlvxmlmp, $Vt54vmttyjzc)) {
					
					if ($Vp4xjtpabm0l != (int)$Vp4xjtpabm0l) {
						self::_formatAsFraction($Vp4xjtpabm0l, $Vrcanlvxmlmp);
					}

				} else {
					

					
					$Vp4xjtpabm0l = $Vp4xjtpabm0l / $V2n430jknk35cale;

					
					$Vrcanlvxmlmp = preg_replace('/\\#/', '0', $Vrcanlvxmlmp);

					$Vmwwo1qnmepz = "/\[[^\]]+\]/";
					$Vt54vmttyjzc = preg_replace($Vmwwo1qnmepz, '', $Vrcanlvxmlmp);
					$V2xlryyxxahg_regex = "/(0+)(\.?)(0*)/";
					if (preg_match($V2xlryyxxahg_regex, $Vt54vmttyjzc, $Vt54vmttyjzcatches)) {
						$Vrce0gsxjgkc = $Vt54vmttyjzcatches[1];
						$V5boos1d4pv1 = $Vt54vmttyjzcatches[2];
						$Vws44nszhvgoight = $Vt54vmttyjzcatches[3];

						
						$Vt54vmttyjzcinWidth = strlen($Vrce0gsxjgkc) + strlen($V5boos1d4pv1) + strlen($Vws44nszhvgoight);
						if ($Vfjijb5jlwm3) {
							$Vp4xjtpabm0l = number_format(
										$Vp4xjtpabm0l
										, strlen($Vws44nszhvgoight)
										, PHPExcel_Shared_String::getDecimalSeparator()
										, PHPExcel_Shared_String::getThousandsSeparator()
									);
							$Vp4xjtpabm0l = preg_replace($V2xlryyxxahg_regex, $Vp4xjtpabm0l, $Vrcanlvxmlmp);
						} else {
							if (preg_match('/[0#]E[+-]0/i', $Vrcanlvxmlmp)) {
								
								$Vp4xjtpabm0l = sprintf('%5.2E', $Vp4xjtpabm0l);
							} elseif (preg_match('/0([^\d\.]+)0/', $Vrcanlvxmlmp)) {
								$Vp4xjtpabm0l = self::_complexNumberFormatMask($Vp4xjtpabm0l, $Vrcanlvxmlmp);
							} else {
								$V2n430jknk35printf_pattern = "%0$Vt54vmttyjzcinWidth." . strlen($Vws44nszhvgoight) . "f";
								$Vp4xjtpabm0l = sprintf($V2n430jknk35printf_pattern, $Vp4xjtpabm0l);
								$Vp4xjtpabm0l = preg_replace($V2xlryyxxahg_regex, $Vp4xjtpabm0l, $Vrcanlvxmlmp);
							}
						}
					}
				}
				if (preg_match('/\[\$(.*)\]/u', $Vrcanlvxmlmp, $Vt54vmttyjzc)) {
					
					$V4vv2v2t52md = $Vt54vmttyjzc[0];
					$Vcdjk44hyvr2 = $Vt54vmttyjzc[1];
					list($Vcdjk44hyvr2) = explode('-',$Vcdjk44hyvr2);
					if ($Vcdjk44hyvr2 == '') {
						$Vcdjk44hyvr2 = PHPExcel_Shared_String::getCurrencyCode();
					}
					$Vp4xjtpabm0l = preg_replace('/\[\$([^\]]*)\]/u',$Vcdjk44hyvr2,$Vp4xjtpabm0l);
				}
			}
		}

		
		if ($V4hwpfjp3kwi !== null) {
			list($Vxfu1tfkvuq0, $Vubssx3efpny) = $V4hwpfjp3kwi;
			$Vp4xjtpabm0l = $Vxfu1tfkvuq0->$Vubssx3efpny($Vp4xjtpabm0l, $VrcanlvxmlmpColor);
		}

		return $Vp4xjtpabm0l;
	}

}
