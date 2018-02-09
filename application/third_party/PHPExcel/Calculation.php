<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}


if (!defined('CALCULATION_REGEXP_CELLREF')) {
	
	if(defined('PREG_BAD_UTF8_ERROR')) {
		
		define('CALCULATION_REGEXP_CELLREF','((([^\s,!&%^\/\*\+<>=-]*)|(\'[^\']*\')|(\"[^\"]*\"))!)?\$?([a-z]{1,3})\$?(\d{1,7})');
		
		define('CALCULATION_REGEXP_NAMEDRANGE','((([^\s,!&%^\/\*\+<>=-]*)|(\'[^\']*\')|(\"[^\"]*\"))!)?([_A-Z][_A-Z0-9\.]*)');
	} else {
		
		define('CALCULATION_REGEXP_CELLREF','(((\w*)|(\'[^\']*\')|(\"[^\"]*\"))!)?\$?([a-z]{1,3})\$?(\d+)');
		
		define('CALCULATION_REGEXP_NAMEDRANGE','(((\w*)|(\'.*\')|(\".*\"))!)?([_A-Z][_A-Z0-9\.]*)');
	}
}



class PHPExcel_Calculation {

	
	
	
	const CALCULATION_REGEXP_NUMBER		= '[-+]?\d*\.?\d+(e[-+]?\d+)?';
	
	const CALCULATION_REGEXP_STRING		= '"(?:[^"]|"")*"';
	
	const CALCULATION_REGEXP_OPENBRACE	= '\(';
	
	const CALCULATION_REGEXP_FUNCTION	= '@?([A-Z][A-Z0-9\.]*)[\s]*\(';
	
	const CALCULATION_REGEXP_CELLREF	= CALCULATION_REGEXP_CELLREF;
	
	const CALCULATION_REGEXP_NAMEDRANGE	= CALCULATION_REGEXP_NAMEDRANGE;
	
	const CALCULATION_REGEXP_ERROR		= '\#[A-Z][A-Z0_\/]*[!\?]?';


	
	const RETURN_ARRAY_AS_ERROR = 'error';
	const RETURN_ARRAY_AS_VALUE = 'value';
	const RETURN_ARRAY_AS_ARRAY = 'array';

	private static $Vhzds1xisnba	= self::RETURN_ARRAY_AS_VALUE;


	
	private static $Vhkslmktb254;


	
    private $Vuzdfl3rlmif;

	
    private static $Vuzdfl3rlmifSets;

	
	private $Vjptmurnqhmy = array ();


	
	private $VjptmurnqhmyEnabled = TRUE;


	
	private static $Vvp4pchjucrr			= array('+' => TRUE,	'-' => TRUE,	'*' => TRUE,	'/' => TRUE,
												'^' => TRUE,	'&' => TRUE,	'%' => FALSE,	'~' => FALSE,
												'>' => TRUE,	'<' => TRUE,	'=' => TRUE,	'>=' => TRUE,
												'<=' => TRUE,	'<>' => TRUE,	'|' => TRUE,	':' => TRUE
											   );


	
	private static $Vtikp53bllgl	= array('+' => TRUE,	'-' => TRUE,	'*' => TRUE,	'/' => TRUE,
												'^' => TRUE,	'&' => TRUE,	'>' => TRUE,	'<' => TRUE,
												'=' => TRUE,	'>=' => TRUE,	'<=' => TRUE,	'<>' => TRUE,
												'|' => TRUE,	':' => TRUE
											   );

	
	private $Vbacqmrppqbq;

	
	public $Vmxqud4vrwtv = FALSE;

	
	public $Vrg4lznxgrae = NULL;

	
	private $V0alywjcvmdh;

	private $Vfe3oiff5eut = array();

	
	private $Vwdklcanyhlm = 1;

	private $Vh0lhb2slolw = '';

	
	public $Vmmv0j53pleb = 1;

	
	private $Vyxkueqjitzb	= 14;


	
	private static $Vaqvar4xhus1 = 'en_us';					

	
	private static $Vv0ehgbvcnnb = array(	'en'		
												 );
	
	private static $Vjnosju32oqn = ',';
	private static $V2sz0g0zonx4 = array();

	
	public static $Vylvfs0sz4ep = array(	'TRUE'	=> 'TRUE',
											'FALSE'	=> 'FALSE',
											'NULL'	=> 'NULL'
										  );


	
	private static $Vnt2huwkvpk0 = array('TRUE'	=> TRUE,
											'FALSE'	=> FALSE,
											'NULL'	=> NULL
										   );

	
	private static $Vq0fzqejahhh = array(	
				'ABS'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'abs',
												 'argumentCount'	=>	'1'
												),
				'ACCRINT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::ACCRINT',
												 'argumentCount'	=>	'4-7'
												),
				'ACCRINTM'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::ACCRINTM',
												 'argumentCount'	=>	'3-5'
												),
				'ACOS'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'acos',
												 'argumentCount'	=>	'1'
												),
				'ACOSH'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'acosh',
												 'argumentCount'	=>	'1'
												),
				'ADDRESS'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_LookupRef::CELL_ADDRESS',
												 'argumentCount'	=>	'2-5'
												),
				'AMORDEGRC'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::AMORDEGRC',
												 'argumentCount'	=>	'6,7'
												),
				'AMORLINC'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::AMORLINC',
												 'argumentCount'	=>	'6,7'
												),
				'AND'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOGICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Logical::LOGICAL_AND',
												 'argumentCount'	=>	'1+'
												),
				'AREAS'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'1'
												),
				'ASC'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'1'
												),
				'ASIN'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'asin',
												 'argumentCount'	=>	'1'
												),
				'ASINH'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'asinh',
												 'argumentCount'	=>	'1'
												),
				'ATAN'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'atan',
												 'argumentCount'	=>	'1'
												),
				'ATAN2'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::ATAN2',
												 'argumentCount'	=>	'2'
												),
				'ATANH'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'atanh',
												 'argumentCount'	=>	'1'
												),
				'AVEDEV'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::AVEDEV',
												 'argumentCount'	=>	'1+'
												),
				'AVERAGE'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::AVERAGE',
												 'argumentCount'	=>	'1+'
												),
				'AVERAGEA'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::AVERAGEA',
												 'argumentCount'	=>	'1+'
												),
				'AVERAGEIF'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::AVERAGEIF',
												 'argumentCount'	=>	'2,3'
												),
				'AVERAGEIFS'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'3+'
												),
				'BAHTTEXT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'1'
												),
				'BESSELI'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::BESSELI',
												 'argumentCount'	=>	'2'
												),
				'BESSELJ'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::BESSELJ',
												 'argumentCount'	=>	'2'
												),
				'BESSELK'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::BESSELK',
												 'argumentCount'	=>	'2'
												),
				'BESSELY'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::BESSELY',
												 'argumentCount'	=>	'2'
												),
				'BETADIST'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::BETADIST',
												 'argumentCount'	=>	'3-5'
												),
				'BETAINV'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::BETAINV',
												 'argumentCount'	=>	'3-5'
												),
				'BIN2DEC'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::BINTODEC',
												 'argumentCount'	=>	'1'
												),
				'BIN2HEX'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::BINTOHEX',
												 'argumentCount'	=>	'1,2'
												),
				'BIN2OCT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::BINTOOCT',
												 'argumentCount'	=>	'1,2'
												),
				'BINOMDIST'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::BINOMDIST',
												 'argumentCount'	=>	'4'
												),
				'CEILING'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::CEILING',
												 'argumentCount'	=>	'2'
												),
				'CELL'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'1,2'
												),
				'CHAR'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::CHARACTER',
												 'argumentCount'	=>	'1'
												),
				'CHIDIST'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::CHIDIST',
												 'argumentCount'	=>	'2'
												),
				'CHIINV'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::CHIINV',
												 'argumentCount'	=>	'2'
												),
				'CHITEST'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'2'
												),
				'CHOOSE'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_LookupRef::CHOOSE',
												 'argumentCount'	=>	'2+'
												),
				'CLEAN'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::TRIMNONPRINTABLE',
												 'argumentCount'	=>	'1'
												),
				'CODE'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::ASCIICODE',
												 'argumentCount'	=>	'1'
												),
				'COLUMN'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_LookupRef::COLUMN',
												 'argumentCount'	=>	'-1',
												 'passByReference'	=>	array(TRUE)
												),
				'COLUMNS'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_LookupRef::COLUMNS',
												 'argumentCount'	=>	'1'
												),
				'COMBIN'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::COMBIN',
												 'argumentCount'	=>	'2'
												),
				'COMPLEX'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::COMPLEX',
												 'argumentCount'	=>	'2,3'
												),
				'CONCATENATE'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::CONCATENATE',
												 'argumentCount'	=>	'1+'
												),
				'CONFIDENCE'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::CONFIDENCE',
												 'argumentCount'	=>	'3'
												),
				'CONVERT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::CONVERTUOM',
												 'argumentCount'	=>	'3'
												),
				'CORREL'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::CORREL',
												 'argumentCount'	=>	'2'
												),
				'COS'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'cos',
												 'argumentCount'	=>	'1'
												),
				'COSH'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'cosh',
												 'argumentCount'	=>	'1'
												),
				'COUNT'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::COUNT',
												 'argumentCount'	=>	'1+'
												),
				'COUNTA'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::COUNTA',
												 'argumentCount'	=>	'1+'
												),
				'COUNTBLANK'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::COUNTBLANK',
												 'argumentCount'	=>	'1'
												),
				'COUNTIF'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::COUNTIF',
												 'argumentCount'	=>	'2'
												),
				'COUNTIFS'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'2'
												),
				'COUPDAYBS'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::COUPDAYBS',
												 'argumentCount'	=>	'3,4'
												),
				'COUPDAYS'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::COUPDAYS',
												 'argumentCount'	=>	'3,4'
												),
				'COUPDAYSNC'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::COUPDAYSNC',
												 'argumentCount'	=>	'3,4'
												),
				'COUPNCD'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::COUPNCD',
												 'argumentCount'	=>	'3,4'
												),
				'COUPNUM'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::COUPNUM',
												 'argumentCount'	=>	'3,4'
												),
				'COUPPCD'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::COUPPCD',
												 'argumentCount'	=>	'3,4'
												),
				'COVAR'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::COVAR',
												 'argumentCount'	=>	'2'
												),
				'CRITBINOM'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::CRITBINOM',
												 'argumentCount'	=>	'3'
												),
				'CUBEKPIMEMBER'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_CUBE,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'?'
												),
				'CUBEMEMBER'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_CUBE,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'?'
												),
				'CUBEMEMBERPROPERTY'	=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_CUBE,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'?'
												),
				'CUBERANKEDMEMBER'		=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_CUBE,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'?'
												),
				'CUBESET'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_CUBE,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'?'
												),
				'CUBESETCOUNT'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_CUBE,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'?'
												),
				'CUBEVALUE'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_CUBE,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'?'
												),
				'CUMIPMT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::CUMIPMT',
												 'argumentCount'	=>	'6'
												),
				'CUMPRINC'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::CUMPRINC',
												 'argumentCount'	=>	'6'
												),
				'DATE'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::DATE',
												 'argumentCount'	=>	'3'
												),
				'DATEDIF'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::DATEDIF',
												 'argumentCount'	=>	'2,3'
												),
				'DATEVALUE'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::DATEVALUE',
												 'argumentCount'	=>	'1'
												),
				'DAVERAGE'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATABASE,
												 'functionCall'		=>	'PHPExcel_Calculation_Database::DAVERAGE',
												 'argumentCount'	=>	'3'
												),
				'DAY'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::DAYOFMONTH',
												 'argumentCount'	=>	'1'
												),
				'DAYS360'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::DAYS360',
												 'argumentCount'	=>	'2,3'
												),
				'DB'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::DB',
												 'argumentCount'	=>	'4,5'
												),
				'DCOUNT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATABASE,
												 'functionCall'		=>	'PHPExcel_Calculation_Database::DCOUNT',
												 'argumentCount'	=>	'3'
												),
				'DCOUNTA'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATABASE,
												 'functionCall'		=>	'PHPExcel_Calculation_Database::DCOUNTA',
												 'argumentCount'	=>	'3'
												),
				'DDB'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::DDB',
												 'argumentCount'	=>	'4,5'
												),
				'DEC2BIN'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::DECTOBIN',
												 'argumentCount'	=>	'1,2'
												),
				'DEC2HEX'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::DECTOHEX',
												 'argumentCount'	=>	'1,2'
												),
				'DEC2OCT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::DECTOOCT',
												 'argumentCount'	=>	'1,2'
												),
				'DEGREES'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'rad2deg',
												 'argumentCount'	=>	'1'
												),
				'DELTA'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::DELTA',
												 'argumentCount'	=>	'1,2'
												),
				'DEVSQ'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::DEVSQ',
												 'argumentCount'	=>	'1+'
												),
				'DGET'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATABASE,
												 'functionCall'		=>	'PHPExcel_Calculation_Database::DGET',
												 'argumentCount'	=>	'3'
												),
				'DISC'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::DISC',
												 'argumentCount'	=>	'4,5'
												),
				'DMAX'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATABASE,
												 'functionCall'		=>	'PHPExcel_Calculation_Database::DMAX',
												 'argumentCount'	=>	'3'
												),
				'DMIN'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATABASE,
												 'functionCall'		=>	'PHPExcel_Calculation_Database::DMIN',
												 'argumentCount'	=>	'3'
												),
				'DOLLAR'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::DOLLAR',
												 'argumentCount'	=>	'1,2'
												),
				'DOLLARDE'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::DOLLARDE',
												 'argumentCount'	=>	'2'
												),
				'DOLLARFR'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::DOLLARFR',
												 'argumentCount'	=>	'2'
												),
				'DPRODUCT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATABASE,
												 'functionCall'		=>	'PHPExcel_Calculation_Database::DPRODUCT',
												 'argumentCount'	=>	'3'
												),
				'DSTDEV'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATABASE,
												 'functionCall'		=>	'PHPExcel_Calculation_Database::DSTDEV',
												 'argumentCount'	=>	'3'
												),
				'DSTDEVP'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATABASE,
												 'functionCall'		=>	'PHPExcel_Calculation_Database::DSTDEVP',
												 'argumentCount'	=>	'3'
												),
				'DSUM'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATABASE,
												 'functionCall'		=>	'PHPExcel_Calculation_Database::DSUM',
												 'argumentCount'	=>	'3'
												),
				'DURATION'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'5,6'
												),
				'DVAR'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATABASE,
												 'functionCall'		=>	'PHPExcel_Calculation_Database::DVAR',
												 'argumentCount'	=>	'3'
												),
				'DVARP'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATABASE,
												 'functionCall'		=>	'PHPExcel_Calculation_Database::DVARP',
												 'argumentCount'	=>	'3'
												),
				'EDATE'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::EDATE',
												 'argumentCount'	=>	'2'
												),
				'EFFECT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::EFFECT',
												 'argumentCount'	=>	'2'
												),
				'EOMONTH'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::EOMONTH',
												 'argumentCount'	=>	'2'
												),
				'ERF'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::ERF',
												 'argumentCount'	=>	'1,2'
												),
				'ERFC'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::ERFC',
												 'argumentCount'	=>	'1'
												),
				'ERROR.TYPE'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::ERROR_TYPE',
												 'argumentCount'	=>	'1'
												),
				'EVEN'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::EVEN',
												 'argumentCount'	=>	'1'
												),
				'EXACT'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'2'
												),
				'EXP'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'exp',
												 'argumentCount'	=>	'1'
												),
				'EXPONDIST'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::EXPONDIST',
												 'argumentCount'	=>	'3'
												),
				'FACT'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::FACT',
												 'argumentCount'	=>	'1'
												),
				'FACTDOUBLE'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::FACTDOUBLE',
												 'argumentCount'	=>	'1'
												),
				'FALSE'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOGICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Logical::FALSE',
												 'argumentCount'	=>	'0'
												),
				'FDIST'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'3'
												),
				'FIND'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::SEARCHSENSITIVE',
												 'argumentCount'	=>	'2,3'
												),
				'FINDB'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::SEARCHSENSITIVE',
												 'argumentCount'	=>	'2,3'
												),
				'FINV'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'3'
												),
				'FISHER'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::FISHER',
												 'argumentCount'	=>	'1'
												),
				'FISHERINV'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::FISHERINV',
												 'argumentCount'	=>	'1'
												),
				'FIXED'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::FIXEDFORMAT',
												 'argumentCount'	=>	'1-3'
												),
				'FLOOR'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::FLOOR',
												 'argumentCount'	=>	'2'
												),
				'FORECAST'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::FORECAST',
												 'argumentCount'	=>	'3'
												),
				'FREQUENCY'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'2'
												),
				'FTEST'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'2'
												),
				'FV'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::FV',
												 'argumentCount'	=>	'3-5'
												),
				'FVSCHEDULE'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::FVSCHEDULE',
												 'argumentCount'	=>	'2'
												),
				'GAMMADIST'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::GAMMADIST',
												 'argumentCount'	=>	'4'
												),
				'GAMMAINV'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::GAMMAINV',
												 'argumentCount'	=>	'3'
												),
				'GAMMALN'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::GAMMALN',
												 'argumentCount'	=>	'1'
												),
				'GCD'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::GCD',
												 'argumentCount'	=>	'1+'
												),
				'GEOMEAN'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::GEOMEAN',
												 'argumentCount'	=>	'1+'
												),
				'GESTEP'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::GESTEP',
												 'argumentCount'	=>	'1,2'
												),
				'GETPIVOTDATA'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'2+'
												),
				'GROWTH'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::GROWTH',
												 'argumentCount'	=>	'1-4'
												),
				'HARMEAN'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::HARMEAN',
												 'argumentCount'	=>	'1+'
												),
				'HEX2BIN'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::HEXTOBIN',
												 'argumentCount'	=>	'1,2'
												),
				'HEX2DEC'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::HEXTODEC',
												 'argumentCount'	=>	'1'
												),
				'HEX2OCT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::HEXTOOCT',
												 'argumentCount'	=>	'1,2'
												),
				'HLOOKUP'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_LookupRef::HLOOKUP',
												 'argumentCount'	=>	'3,4'
												),
				'HOUR'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::HOUROFDAY',
												 'argumentCount'	=>	'1'
												),
				'HYPERLINK'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_LookupRef::HYPERLINK',
												 'argumentCount'	=>	'1,2',
												 'passCellReference'=>	TRUE
												),
				'HYPGEOMDIST'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::HYPGEOMDIST',
												 'argumentCount'	=>	'4'
												),
				'IF'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOGICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Logical::STATEMENT_IF',
												 'argumentCount'	=>	'1-3'
												),
				'IFERROR'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOGICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Logical::IFERROR',
												 'argumentCount'	=>	'2'
												),
				'IMABS'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMABS',
												 'argumentCount'	=>	'1'
												),
				'IMAGINARY'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMAGINARY',
												 'argumentCount'	=>	'1'
												),
				'IMARGUMENT'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMARGUMENT',
												 'argumentCount'	=>	'1'
												),
				'IMCONJUGATE'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMCONJUGATE',
												 'argumentCount'	=>	'1'
												),
				'IMCOS'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMCOS',
												 'argumentCount'	=>	'1'
												),
				'IMDIV'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMDIV',
												 'argumentCount'	=>	'2'
												),
				'IMEXP'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMEXP',
												 'argumentCount'	=>	'1'
												),
				'IMLN'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMLN',
												 'argumentCount'	=>	'1'
												),
				'IMLOG10'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMLOG10',
												 'argumentCount'	=>	'1'
												),
				'IMLOG2'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMLOG2',
												 'argumentCount'	=>	'1'
												),
				'IMPOWER'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMPOWER',
												 'argumentCount'	=>	'2'
												),
				'IMPRODUCT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMPRODUCT',
												 'argumentCount'	=>	'1+'
												),
				'IMREAL'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMREAL',
												 'argumentCount'	=>	'1'
												),
				'IMSIN'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMSIN',
												 'argumentCount'	=>	'1'
												),
				'IMSQRT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMSQRT',
												 'argumentCount'	=>	'1'
												),
				'IMSUB'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMSUB',
												 'argumentCount'	=>	'2'
												),
				'IMSUM'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::IMSUM',
												 'argumentCount'	=>	'1+'
												),
				'INDEX'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_LookupRef::INDEX',
												 'argumentCount'	=>	'1-4'
												),
				'INDIRECT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_LookupRef::INDIRECT',
												 'argumentCount'	=>	'1,2',
												 'passCellReference'=>	TRUE
												),
				'INFO'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'1'
												),
				'INT'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::INT',
												 'argumentCount'	=>	'1'
												),
				'INTERCEPT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::INTERCEPT',
												 'argumentCount'	=>	'2'
												),
				'INTRATE'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::INTRATE',
												 'argumentCount'	=>	'4,5'
												),
				'IPMT'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::IPMT',
												 'argumentCount'	=>	'4-6'
												),
				'IRR'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::IRR',
												 'argumentCount'	=>	'1,2'
												),
				'ISBLANK'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::IS_BLANK',
												 'argumentCount'	=>	'1'
												),
				'ISERR'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::IS_ERR',
												 'argumentCount'	=>	'1'
												),
				'ISERROR'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::IS_ERROR',
												 'argumentCount'	=>	'1'
												),
				'ISEVEN'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::IS_EVEN',
												 'argumentCount'	=>	'1'
												),
				'ISLOGICAL'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::IS_LOGICAL',
												 'argumentCount'	=>	'1'
												),
				'ISNA'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::IS_NA',
												 'argumentCount'	=>	'1'
												),
				'ISNONTEXT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::IS_NONTEXT',
												 'argumentCount'	=>	'1'
												),
				'ISNUMBER'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::IS_NUMBER',
												 'argumentCount'	=>	'1'
												),
				'ISODD'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::IS_ODD',
												 'argumentCount'	=>	'1'
												),
				'ISPMT'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::ISPMT',
												 'argumentCount'	=>	'4'
												),
				'ISREF'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'1'
												),
				'ISTEXT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::IS_TEXT',
												 'argumentCount'	=>	'1'
												),
				'JIS'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'1'
												),
				'KURT'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::KURT',
												 'argumentCount'	=>	'1+'
												),
				'LARGE'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::LARGE',
												 'argumentCount'	=>	'2'
												),
				'LCM'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::LCM',
												 'argumentCount'	=>	'1+'
												),
				'LEFT'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::LEFT',
												 'argumentCount'	=>	'1,2'
												),
				'LEFTB'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::LEFT',
												 'argumentCount'	=>	'1,2'
												),
				'LEN'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::STRINGLENGTH',
												 'argumentCount'	=>	'1'
												),
				'LENB'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::STRINGLENGTH',
												 'argumentCount'	=>	'1'
												),
				'LINEST'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::LINEST',
												 'argumentCount'	=>	'1-4'
												),
				'LN'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'log',
												 'argumentCount'	=>	'1'
												),
				'LOG'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::LOG_BASE',
												 'argumentCount'	=>	'1,2'
												),
				'LOG10'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'log10',
												 'argumentCount'	=>	'1'
												),
				'LOGEST'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::LOGEST',
												 'argumentCount'	=>	'1-4'
												),
				'LOGINV'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::LOGINV',
												 'argumentCount'	=>	'3'
												),
				'LOGNORMDIST'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::LOGNORMDIST',
												 'argumentCount'	=>	'3'
												),
				'LOOKUP'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_LookupRef::LOOKUP',
												 'argumentCount'	=>	'2,3'
												),
				'LOWER'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::LOWERCASE',
												 'argumentCount'	=>	'1'
												),
				'MATCH'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_LookupRef::MATCH',
												 'argumentCount'	=>	'2,3'
												),
				'MAX'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::MAX',
												 'argumentCount'	=>	'1+'
												),
				'MAXA'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::MAXA',
												 'argumentCount'	=>	'1+'
												),
				'MAXIF'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::MAXIF',
												 'argumentCount'	=>	'2+'
												),
				'MDETERM'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::MDETERM',
												 'argumentCount'	=>	'1'
												),
				'MDURATION'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'5,6'
												),
				'MEDIAN'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::MEDIAN',
												 'argumentCount'	=>	'1+'
												),
				'MEDIANIF'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'2+'
												),
				'MID'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::MID',
												 'argumentCount'	=>	'3'
												),
				'MIDB'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::MID',
												 'argumentCount'	=>	'3'
												),
				'MIN'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::MIN',
												 'argumentCount'	=>	'1+'
												),
				'MINA'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::MINA',
												 'argumentCount'	=>	'1+'
												),
				'MINIF'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::MINIF',
												 'argumentCount'	=>	'2+'
												),
				'MINUTE'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::MINUTEOFHOUR',
												 'argumentCount'	=>	'1'
												),
				'MINVERSE'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::MINVERSE',
												 'argumentCount'	=>	'1'
												),
				'MIRR'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::MIRR',
												 'argumentCount'	=>	'3'
												),
				'MMULT'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::MMULT',
												 'argumentCount'	=>	'2'
												),
				'MOD'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::MOD',
												 'argumentCount'	=>	'2'
												),
				'MODE'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::MODE',
												 'argumentCount'	=>	'1+'
												),
				'MONTH'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::MONTHOFYEAR',
												 'argumentCount'	=>	'1'
												),
				'MROUND'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::MROUND',
												 'argumentCount'	=>	'2'
												),
				'MULTINOMIAL'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::MULTINOMIAL',
												 'argumentCount'	=>	'1+'
												),
				'N'						=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::N',
												 'argumentCount'	=>	'1'
												),
				'NA'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::NA',
												 'argumentCount'	=>	'0'
												),
				'NEGBINOMDIST'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::NEGBINOMDIST',
												 'argumentCount'	=>	'3'
												),
				'NETWORKDAYS'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::NETWORKDAYS',
												 'argumentCount'	=>	'2+'
												),
				'NOMINAL'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::NOMINAL',
												 'argumentCount'	=>	'2'
												),
				'NORMDIST'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::NORMDIST',
												 'argumentCount'	=>	'4'
												),
				'NORMINV'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::NORMINV',
												 'argumentCount'	=>	'3'
												),
				'NORMSDIST'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::NORMSDIST',
												 'argumentCount'	=>	'1'
												),
				'NORMSINV'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::NORMSINV',
												 'argumentCount'	=>	'1'
												),
				'NOT'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOGICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Logical::NOT',
												 'argumentCount'	=>	'1'
												),
				'NOW'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::DATETIMENOW',
												 'argumentCount'	=>	'0'
												),
				'NPER'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::NPER',
												 'argumentCount'	=>	'3-5'
												),
				'NPV'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::NPV',
												 'argumentCount'	=>	'2+'
												),
				'OCT2BIN'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::OCTTOBIN',
												 'argumentCount'	=>	'1,2'
												),
				'OCT2DEC'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::OCTTODEC',
												 'argumentCount'	=>	'1'
												),
				'OCT2HEX'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_ENGINEERING,
												 'functionCall'		=>	'PHPExcel_Calculation_Engineering::OCTTOHEX',
												 'argumentCount'	=>	'1,2'
												),
				'ODD'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::ODD',
												 'argumentCount'	=>	'1'
												),
				'ODDFPRICE'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'8,9'
												),
				'ODDFYIELD'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'8,9'
												),
				'ODDLPRICE'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'7,8'
												),
				'ODDLYIELD'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'7,8'
												),
				'OFFSET'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_LookupRef::OFFSET',
												 'argumentCount'	=>	'3,5',
												 'passCellReference'=>	TRUE,
												 'passByReference'	=>	array(TRUE)
												),
				'OR'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOGICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Logical::LOGICAL_OR',
												 'argumentCount'	=>	'1+'
												),
				'PEARSON'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::CORREL',
												 'argumentCount'	=>	'2'
												),
				'PERCENTILE'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::PERCENTILE',
												 'argumentCount'	=>	'2'
												),
				'PERCENTRANK'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::PERCENTRANK',
												 'argumentCount'	=>	'2,3'
												),
				'PERMUT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::PERMUT',
												 'argumentCount'	=>	'2'
												),
				'PHONETIC'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'1'
												),
				'PI'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'pi',
												 'argumentCount'	=>	'0'
												),
				'PMT'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::PMT',
												 'argumentCount'	=>	'3-5'
												),
				'POISSON'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::POISSON',
												 'argumentCount'	=>	'3'
												),
				'POWER'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::POWER',
												 'argumentCount'	=>	'2'
												),
				'PPMT'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::PPMT',
												 'argumentCount'	=>	'4-6'
												),
				'PRICE'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::PRICE',
												 'argumentCount'	=>	'6,7'
												),
				'PRICEDISC'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::PRICEDISC',
												 'argumentCount'	=>	'4,5'
												),
				'PRICEMAT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::PRICEMAT',
												 'argumentCount'	=>	'5,6'
												),
				'PROB'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'3,4'
												),
				'PRODUCT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::PRODUCT',
												 'argumentCount'	=>	'1+'
												),
				'PROPER'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::PROPERCASE',
												 'argumentCount'	=>	'1'
												),
				'PV'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::PV',
												 'argumentCount'	=>	'3-5'
												),
				'QUARTILE'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::QUARTILE',
												 'argumentCount'	=>	'2'
												),
				'QUOTIENT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::QUOTIENT',
												 'argumentCount'	=>	'2'
												),
				'RADIANS'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'deg2rad',
												 'argumentCount'	=>	'1'
												),
				'RAND'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::RAND',
												 'argumentCount'	=>	'0'
												),
				'RANDBETWEEN'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::RAND',
												 'argumentCount'	=>	'2'
												),
				'RANK'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::RANK',
												 'argumentCount'	=>	'2,3'
												),
				'RATE'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::RATE',
												 'argumentCount'	=>	'3-6'
												),
				'RECEIVED'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::RECEIVED',
												 'argumentCount'	=>	'4-5'
												),
				'REPLACE'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::REPLACE',
												 'argumentCount'	=>	'4'
												),
				'REPLACEB'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::REPLACE',
												 'argumentCount'	=>	'4'
												),
				'REPT'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'str_repeat',
												 'argumentCount'	=>	'2'
												),
				'RIGHT'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::RIGHT',
												 'argumentCount'	=>	'1,2'
												),
				'RIGHTB'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::RIGHT',
												 'argumentCount'	=>	'1,2'
												),
				'ROMAN'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::ROMAN',
												 'argumentCount'	=>	'1,2'
												),
				'ROUND'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'round',
												 'argumentCount'	=>	'2'
												),
				'ROUNDDOWN'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::ROUNDDOWN',
												 'argumentCount'	=>	'2'
												),
				'ROUNDUP'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::ROUNDUP',
												 'argumentCount'	=>	'2'
												),
				'ROW'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_LookupRef::ROW',
												 'argumentCount'	=>	'-1',
												 'passByReference'	=>	array(TRUE)
												),
				'ROWS'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_LookupRef::ROWS',
												 'argumentCount'	=>	'1'
												),
				'RSQ'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::RSQ',
												 'argumentCount'	=>	'2'
												),
				'RTD'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'1+'
												),
				'SEARCH'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::SEARCHINSENSITIVE',
												 'argumentCount'	=>	'2,3'
												),
				'SEARCHB'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::SEARCHINSENSITIVE',
												 'argumentCount'	=>	'2,3'
												),
				'SECOND'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::SECONDOFMINUTE',
												 'argumentCount'	=>	'1'
												),
				'SERIESSUM'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::SERIESSUM',
												 'argumentCount'	=>	'4'
												),
				'SIGN'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::SIGN',
												 'argumentCount'	=>	'1'
												),
				'SIN'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'sin',
												 'argumentCount'	=>	'1'
												),
				'SINH'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'sinh',
												 'argumentCount'	=>	'1'
												),
				'SKEW'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::SKEW',
												 'argumentCount'	=>	'1+'
												),
				'SLN'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::SLN',
												 'argumentCount'	=>	'3'
												),
				'SLOPE'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::SLOPE',
												 'argumentCount'	=>	'2'
												),
				'SMALL'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::SMALL',
												 'argumentCount'	=>	'2'
												),
				'SQRT'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'sqrt',
												 'argumentCount'	=>	'1'
												),
				'SQRTPI'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::SQRTPI',
												 'argumentCount'	=>	'1'
												),
				'STANDARDIZE'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::STANDARDIZE',
												 'argumentCount'	=>	'3'
												),
				'STDEV'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::STDEV',
												 'argumentCount'	=>	'1+'
												),
				'STDEVA'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::STDEVA',
												 'argumentCount'	=>	'1+'
												),
				'STDEVP'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::STDEVP',
												 'argumentCount'	=>	'1+'
												),
				'STDEVPA'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::STDEVPA',
												 'argumentCount'	=>	'1+'
												),
				'STEYX'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::STEYX',
												 'argumentCount'	=>	'2'
												),
				'SUBSTITUTE'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::SUBSTITUTE',
												 'argumentCount'	=>	'3,4'
												),
				'SUBTOTAL'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::SUBTOTAL',
												 'argumentCount'	=>	'2+'
												),
				'SUM'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::SUM',
												 'argumentCount'	=>	'1+'
												),
				'SUMIF'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::SUMIF',
												 'argumentCount'	=>	'2,3'
												),
				'SUMIFS'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'?'
												),
				'SUMPRODUCT'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::SUMPRODUCT',
												 'argumentCount'	=>	'1+'
												),
				'SUMSQ'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::SUMSQ',
												 'argumentCount'	=>	'1+'
												),
				'SUMX2MY2'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::SUMX2MY2',
												 'argumentCount'	=>	'2'
												),
				'SUMX2PY2'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::SUMX2PY2',
												 'argumentCount'	=>	'2'
												),
				'SUMXMY2'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::SUMXMY2',
												 'argumentCount'	=>	'2'
												),
				'SYD'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::SYD',
												 'argumentCount'	=>	'4'
												),
				'T'						=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::RETURNSTRING',
												 'argumentCount'	=>	'1'
												),
				'TAN'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'tan',
												 'argumentCount'	=>	'1'
												),
				'TANH'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'tanh',
												 'argumentCount'	=>	'1'
												),
				'TBILLEQ'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::TBILLEQ',
												 'argumentCount'	=>	'3'
												),
				'TBILLPRICE'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::TBILLPRICE',
												 'argumentCount'	=>	'3'
												),
				'TBILLYIELD'			=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::TBILLYIELD',
												 'argumentCount'	=>	'3'
												),
				'TDIST'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::TDIST',
												 'argumentCount'	=>	'3'
												),
				'TEXT'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::TEXTFORMAT',
												 'argumentCount'	=>	'2'
												),
				'TIME'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::TIME',
												 'argumentCount'	=>	'3'
												),
				'TIMEVALUE'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::TIMEVALUE',
												 'argumentCount'	=>	'1'
												),
				'TINV'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::TINV',
												 'argumentCount'	=>	'2'
												),
				'TODAY'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::DATENOW',
												 'argumentCount'	=>	'0'
												),
				'TRANSPOSE'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_LookupRef::TRANSPOSE',
												 'argumentCount'	=>	'1'
												),
				'TREND'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::TREND',
												 'argumentCount'	=>	'1-4'
												),
				'TRIM'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::TRIMSPACES',
												 'argumentCount'	=>	'1'
												),
				'TRIMMEAN'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::TRIMMEAN',
												 'argumentCount'	=>	'2'
												),
				'TRUE'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOGICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Logical::TRUE',
												 'argumentCount'	=>	'0'
												),
				'TRUNC'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_MATH_AND_TRIG,
												 'functionCall'		=>	'PHPExcel_Calculation_MathTrig::TRUNC',
												 'argumentCount'	=>	'1,2'
												),
				'TTEST'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'4'
												),
				'TYPE'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::TYPE',
												 'argumentCount'	=>	'1'
												),
				'UPPER'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::UPPERCASE',
												 'argumentCount'	=>	'1'
												),
				'USDOLLAR'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'2'
												),
				'VALUE'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_TEXT_AND_DATA,
												 'functionCall'		=>	'PHPExcel_Calculation_TextData::VALUE',
												 'argumentCount'	=>	'1'
												),
				'VAR'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::VARFunc',
												 'argumentCount'	=>	'1+'
												),
				'VARA'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::VARA',
												 'argumentCount'	=>	'1+'
												),
				'VARP'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::VARP',
												 'argumentCount'	=>	'1+'
												),
				'VARPA'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::VARPA',
												 'argumentCount'	=>	'1+'
												),
				'VDB'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'5-7'
												),
				'VERSION'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_INFORMATION,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::VERSION',
												 'argumentCount'	=>	'0'
												),
				'VLOOKUP'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_LOOKUP_AND_REFERENCE,
												 'functionCall'		=>	'PHPExcel_Calculation_LookupRef::VLOOKUP',
												 'argumentCount'	=>	'3,4'
												),
				'WEEKDAY'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::DAYOFWEEK',
												 'argumentCount'	=>	'1,2'
												),
				'WEEKNUM'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::WEEKOFYEAR',
												 'argumentCount'	=>	'1,2'
												),
				'WEIBULL'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::WEIBULL',
												 'argumentCount'	=>	'4'
												),
				'WORKDAY'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::WORKDAY',
												 'argumentCount'	=>	'2+'
												),
				'XIRR'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::XIRR',
												 'argumentCount'	=>	'2,3'
												),
				'XNPV'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::XNPV',
												 'argumentCount'	=>	'3'
												),
				'YEAR'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::YEAR',
												 'argumentCount'	=>	'1'
												),
				'YEARFRAC'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_DATE_AND_TIME,
												 'functionCall'		=>	'PHPExcel_Calculation_DateTime::YEARFRAC',
												 'argumentCount'	=>	'2,3'
												),
				'YIELD'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Functions::DUMMY',
												 'argumentCount'	=>	'6,7'
												),
				'YIELDDISC'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::YIELDDISC',
												 'argumentCount'	=>	'4,5'
												),
				'YIELDMAT'				=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_FINANCIAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Financial::YIELDMAT',
												 'argumentCount'	=>	'5,6'
												),
				'ZTEST'					=> array('category'			=>	PHPExcel_Calculation_Function::CATEGORY_STATISTICAL,
												 'functionCall'		=>	'PHPExcel_Calculation_Statistical::ZTEST',
												 'argumentCount'	=>	'2-3'
												)
			);


	
	private static $Vkn1gkvnkt2m = array(
				'MKMATRIX'	=> array('argumentCount'	=>	'*',
									 'functionCall'		=>	'self::_mkMatrix'
									)
			);




	private function __construct(PHPExcel $Vnqhol1l3dnz = NULL) {
		$Vpxsir3k4qkk = (PHP_INT_SIZE == 4) ? 14 : 16;
		$this->_savedPrecision = ini_get('precision');
		if ($this->_savedPrecision < $Vpxsir3k4qkk) {
			ini_set('precision',$Vpxsir3k4qkk);
		}

		if ($Vnqhol1l3dnz !== NULL) {
			self::$Vuzdfl3rlmifSets[$Vnqhol1l3dnz->getID()] = $this;
		}

		$this->_workbook = $Vnqhol1l3dnz;
		$this->_cyclicReferenceStack = new PHPExcel_CalcEngine_CyclicReferenceStack();
	    $this->_debugLog = new PHPExcel_CalcEngine_Logger($this->_cyclicReferenceStack);
	}	


	public function __destruct() {
		if ($this->_savedPrecision != ini_get('precision')) {
			ini_set('precision',$this->_savedPrecision);
		}
	}

	private static function _loadLocales() {
		$Vrj0jprohbwe = PHPEXCEL_ROOT.'PHPExcel/locale/';
		foreach (glob($Vrj0jprohbwe.'/*',GLOB_ONLYDIR) as $Vv0mtkrhebac) {
			$Vv0mtkrhebac = substr($Vv0mtkrhebac,strlen($Vrj0jprohbwe)+1);
			if ($Vv0mtkrhebac != 'en') {
				self::$Vv0ehgbvcnnb[] = $Vv0mtkrhebac;
			}
		}
	}

	
	public static function getInstance(PHPExcel $Vnqhol1l3dnz = NULL) {
		if ($Vnqhol1l3dnz !== NULL) {
    		if (isset(self::$Vuzdfl3rlmifSets[$Vnqhol1l3dnz->getID()])) {
    			return self::$Vuzdfl3rlmifSets[$Vnqhol1l3dnz->getID()];
    		}
			return new PHPExcel_Calculation($Vnqhol1l3dnz);
		}

		if (!isset(self::$Vhkslmktb254) || (self::$Vhkslmktb254 === NULL)) {
			self::$Vhkslmktb254 = new PHPExcel_Calculation();
		}

		return self::$Vhkslmktb254;
	}	

	
	public static function unsetInstance(PHPExcel $Vnqhol1l3dnz = NULL) {
		if ($Vnqhol1l3dnz !== NULL) {
    		if (isset(self::$Vuzdfl3rlmifSets[$Vnqhol1l3dnz->getID()])) {
    			unset(self::$Vuzdfl3rlmifSets[$Vnqhol1l3dnz->getID()]);
    		}
		}
    }

	
	public function flushInstance() {
		$this->clearCalculationCache();
	}	


	
	public function getDebugLog() {
		return $this->_debugLog;
	}

	
	public final function __clone() {
		throw new PHPExcel_Calculation_Exception ('Cloning the calculation engine is not allowed!');
	}	


	
	public static function getTRUE() {
		return self::$Vylvfs0sz4ep['TRUE'];
	}

	
	public static function getFALSE() {
		return self::$Vylvfs0sz4ep['FALSE'];
	}

	
	public static function setArrayReturnType($V5k25zluhfty) {
		if (($V5k25zluhfty == self::RETURN_ARRAY_AS_VALUE) ||
			($V5k25zluhfty == self::RETURN_ARRAY_AS_ERROR) ||
			($V5k25zluhfty == self::RETURN_ARRAY_AS_ARRAY)) {
			self::$Vhzds1xisnba = $V5k25zluhfty;
			return TRUE;
		}
		return FALSE;
	}	


	
	public static function getArrayReturnType() {
		return self::$Vhzds1xisnba;
	}	


	
	public function getCalculationCacheEnabled() {
		return $this->_calculationCacheEnabled;
	}	

	
	public function setCalculationCacheEnabled($Vqujkwol1zut = TRUE) {
		$this->_calculationCacheEnabled = $Vqujkwol1zut;
		$this->clearCalculationCache();
	}	


	
	public function enableCalculationCache() {
		$this->setCalculationCacheEnabled(TRUE);
	}	


	
	public function disableCalculationCache() {
		$this->setCalculationCacheEnabled(FALSE);
	}	


	
	public function clearCalculationCache() {
		$this->_calculationCache = array();
	}	

	
	public function clearCalculationCacheForWorksheet($Vuyz1szrcs1l) {
		if (isset($this->_calculationCache[$Vuyz1szrcs1l])) {
			unset($this->_calculationCache[$Vuyz1szrcs1l]);
		}
	}	

	
	public function renameCalculationCacheForWorksheet($Vx0luifcouz4, $Vhm4wtucnwq2) {
		if (isset($this->_calculationCache[$Vx0luifcouz4])) {
			$this->_calculationCache[$Vhm4wtucnwq2] = &$this->_calculationCache[$Vx0luifcouz4];
			unset($this->_calculationCache[$Vx0luifcouz4]);
		}
	}	


	
	public function getLocale() {
		return self::$Vaqvar4xhus1;
	}	


	
	public function setLocale($Vamaqngce5dh = 'en_us') {
		
		$Vdxyadzdpske = $Vamaqngce5dh = strtolower($Vamaqngce5dh);
		if (strpos($Vamaqngce5dh,'_') !== FALSE) {
			list($Vdxyadzdpske) = explode('_',$Vamaqngce5dh);
		}

		if (count(self::$Vv0ehgbvcnnb) == 1)
			self::_loadLocales();

		
		if (in_array($Vdxyadzdpske,self::$Vv0ehgbvcnnb)) {
			
			self::$V2sz0g0zonx4 = array();
			self::$Vjnosju32oqn = ',';
			self::$Vylvfs0sz4ep = array('TRUE' => 'TRUE', 'FALSE' => 'FALSE', 'NULL' => 'NULL');
			
			if ($Vamaqngce5dh != 'en_us') {
				
				$V1p5xhnyga2r = PHPEXCEL_ROOT . 'PHPExcel'.DIRECTORY_SEPARATOR.'locale'.DIRECTORY_SEPARATOR.str_replace('_',DIRECTORY_SEPARATOR,$Vamaqngce5dh).DIRECTORY_SEPARATOR.'functions';
				if (!file_exists($V1p5xhnyga2r)) {
					
					$V1p5xhnyga2r = PHPEXCEL_ROOT . 'PHPExcel'.DIRECTORY_SEPARATOR.'locale'.DIRECTORY_SEPARATOR.$Vdxyadzdpske.DIRECTORY_SEPARATOR.'functions';
					if (!file_exists($V1p5xhnyga2r)) {
						return FALSE;
					}
				}
				
				$Vamaqngce5dhFunctions = file($V1p5xhnyga2r,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
				foreach ($Vamaqngce5dhFunctions as $Vamaqngce5dhFunction) {
					list($Vamaqngce5dhFunction) = explode('##',$Vamaqngce5dhFunction);	
					if (strpos($Vamaqngce5dhFunction,'=') !== FALSE) {
						list($Vtrqqbfh1cqi,$V3zhy2vniz1j) = explode('=',$Vamaqngce5dhFunction);
						$Vtrqqbfh1cqi = trim($Vtrqqbfh1cqi);
						$V3zhy2vniz1j = trim($V3zhy2vniz1j);
						if ((isset(self::$Vq0fzqejahhh[$Vtrqqbfh1cqi])) && ($V3zhy2vniz1j != '') && ($Vtrqqbfh1cqi != $V3zhy2vniz1j)) {
							self::$V2sz0g0zonx4[$Vtrqqbfh1cqi] = $V3zhy2vniz1j;
						}
					}
				}
				
				if (isset(self::$V2sz0g0zonx4['TRUE'])) { self::$Vylvfs0sz4ep['TRUE'] = self::$V2sz0g0zonx4['TRUE']; }
				if (isset(self::$V2sz0g0zonx4['FALSE'])) { self::$Vylvfs0sz4ep['FALSE'] = self::$V2sz0g0zonx4['FALSE']; }

				$V0z3ytwlbm2t = PHPEXCEL_ROOT . 'PHPExcel'.DIRECTORY_SEPARATOR.'locale'.DIRECTORY_SEPARATOR.str_replace('_',DIRECTORY_SEPARATOR,$Vamaqngce5dh).DIRECTORY_SEPARATOR.'config';
				if (!file_exists($V0z3ytwlbm2t)) {
					$V0z3ytwlbm2t = PHPEXCEL_ROOT . 'PHPExcel'.DIRECTORY_SEPARATOR.'locale'.DIRECTORY_SEPARATOR.$Vdxyadzdpske.DIRECTORY_SEPARATOR.'config';
				}
				if (file_exists($V0z3ytwlbm2t)) {
					$Vamaqngce5dhSettings = file($V0z3ytwlbm2t,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
					foreach ($Vamaqngce5dhSettings as $Vamaqngce5dhSetting) {
						list($Vamaqngce5dhSetting) = explode('##',$Vamaqngce5dhSetting);	
						if (strpos($Vamaqngce5dhSetting,'=') !== FALSE) {
							list($Vy5ezx0rqwpf,$Vr1nwhvv3j4p) = explode('=',$Vamaqngce5dhSetting);
							$Vy5ezx0rqwpf = strtoupper(trim($Vy5ezx0rqwpf));
							switch ($Vy5ezx0rqwpf) {
								case 'ARGUMENTSEPARATOR' :
									self::$Vjnosju32oqn = trim($Vr1nwhvv3j4p);
									break;
							}
						}
					}
				}
			}

			self::$Vnt3aqhaltai = self::$Vveqke5ioa3z =
			self::$Vs2vxwsikfyy = self::$Vh1hz2kk2lid = NULL;
			self::$Vaqvar4xhus1 = $Vamaqngce5dh;
			return TRUE;
		}
		return FALSE;
	}	



	public static function _translateSeparator($Vbbmuod1tsgm,$Vagnc3anqevd,$V22ivdjjfdx2,&$Vve3axtkgq2n) {
		$Vgzdodoube0s = mb_strlen($V22ivdjjfdx2);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vgzdodoube0s; ++$Vfhiq1lhsoja) {
			$Vc5ey0mu4n2y = mb_substr($V22ivdjjfdx2,$Vfhiq1lhsoja,1);
			switch ($Vc5ey0mu4n2y) {
				case '{' :	$Vve3axtkgq2n = TRUE;
							break;
				case '}' :	$Vve3axtkgq2n = FALSE;
							break;
				case $Vbbmuod1tsgm :
							if (!$Vve3axtkgq2n) {
								$V22ivdjjfdx2 = mb_substr($V22ivdjjfdx2,0,$Vfhiq1lhsoja).$Vagnc3anqevd.mb_substr($V22ivdjjfdx2,$Vfhiq1lhsoja+1);
							}
			}
		}
		return $V22ivdjjfdx2;
	}

	private static function _translateFormula($Vkg0aw223kcs,$Vgeu2rx5xc4w,$V22ivdjjfdx2,$Vbbmuod1tsgm,$Vagnc3anqevd) {
		
		if (self::$Vaqvar4xhus1 !== 'en_us') {
			$Vve3axtkgq2n = FALSE;
			
			if (strpos($V22ivdjjfdx2,'"') !== FALSE) {
				
				
				$Vcartbxounrh = explode('"',$V22ivdjjfdx2);
				$Vfhiq1lhsoja = FALSE;
				foreach($Vcartbxounrh as &$Vp4xjtpabm0l) {
					
					if ($Vfhiq1lhsoja = !$Vfhiq1lhsoja) {
						$Vp4xjtpabm0l = preg_replace($Vkg0aw223kcs,$Vgeu2rx5xc4w,$Vp4xjtpabm0l);
						$Vp4xjtpabm0l = self::_translateSeparator($Vbbmuod1tsgm,$Vagnc3anqevd,$Vp4xjtpabm0l,$Vve3axtkgq2n);
					}
				}
				unset($Vp4xjtpabm0l);
				
				$V22ivdjjfdx2 = implode('"',$Vcartbxounrh);
			} else {
				
				$V22ivdjjfdx2 = preg_replace($Vkg0aw223kcs,$Vgeu2rx5xc4w,$V22ivdjjfdx2);
				$V22ivdjjfdx2 = self::_translateSeparator($Vbbmuod1tsgm,$Vagnc3anqevd,$V22ivdjjfdx2,$Vve3axtkgq2n);
			}
		}

		return $V22ivdjjfdx2;
	}

	private static $Vnt3aqhaltai	= NULL;
	private static $Vh1hz2kk2lid		= NULL;

	public function _translateFormulaToLocale($V22ivdjjfdx2) {
		if (self::$Vnt3aqhaltai === NULL) {
			self::$Vnt3aqhaltai = array();
			foreach(array_keys(self::$V2sz0g0zonx4) as $Vlydavlevoap) {
				self::$Vnt3aqhaltai[] = '/(@?[^\w\.])'.preg_quote($Vlydavlevoap).'([\s]*\()/Ui';
			}
			foreach(array_keys(self::$Vylvfs0sz4ep) as $Ve4lkhizmhch) {
				self::$Vnt3aqhaltai[] = '/(@?[^\w\.])'.preg_quote($Ve4lkhizmhch).'([^\w\.])/Ui';
			}

		}

		if (self::$Vh1hz2kk2lid === NULL) {
			self::$Vh1hz2kk2lid = array();
			foreach(array_values(self::$V2sz0g0zonx4) as $Vamaqngce5dhFunctionName) {
				self::$Vh1hz2kk2lid[] = '$1'.trim($Vamaqngce5dhFunctionName).'$2';
			}
			foreach(array_values(self::$Vylvfs0sz4ep) as $Vamaqngce5dhBoolean) {
				self::$Vh1hz2kk2lid[] = '$1'.trim($Vamaqngce5dhBoolean).'$2';
			}
		}

		return self::_translateFormula(self::$Vnt3aqhaltai,self::$Vh1hz2kk2lid,$V22ivdjjfdx2,',',self::$Vjnosju32oqn);
	}	


	private static $Vs2vxwsikfyy	= NULL;
	private static $Vveqke5ioa3z		= NULL;

	public function _translateFormulaToEnglish($V22ivdjjfdx2) {
		if (self::$Vs2vxwsikfyy === NULL) {
			self::$Vs2vxwsikfyy = array();
			foreach(array_values(self::$V2sz0g0zonx4) as $Vamaqngce5dhFunctionName) {
				self::$Vs2vxwsikfyy[] = '/(@?[^\w\.])'.preg_quote($Vamaqngce5dhFunctionName).'([\s]*\()/Ui';
			}
			foreach(array_values(self::$Vylvfs0sz4ep) as $Ve4lkhizmhch) {
				self::$Vs2vxwsikfyy[] = '/(@?[^\w\.])'.preg_quote($Ve4lkhizmhch).'([^\w\.])/Ui';
			}
		}

		if (self::$Vveqke5ioa3z === NULL) {
			self::$Vveqke5ioa3z = array();
			foreach(array_keys(self::$V2sz0g0zonx4) as $Vlydavlevoap) {
				self::$Vveqke5ioa3z[] = '$1'.trim($Vlydavlevoap).'$2';
			}
			foreach(array_keys(self::$Vylvfs0sz4ep) as $Ve4lkhizmhch) {
				self::$Vveqke5ioa3z[] = '$1'.trim($Ve4lkhizmhch).'$2';
			}
		}

		return self::_translateFormula(self::$Vs2vxwsikfyy,self::$Vveqke5ioa3z,$V22ivdjjfdx2,self::$Vjnosju32oqn,',');
	}	


	public static function _localeFunc($Vubssx3efpny) {
		if (self::$Vaqvar4xhus1 !== 'en_us') {
			$Vubssx3efpnyName = trim($Vubssx3efpny,'(');
			if (isset(self::$V2sz0g0zonx4[$Vubssx3efpnyName])) {
				$Vbay5blhjfzz = ($Vubssx3efpnyName != $Vubssx3efpny);
				$Vubssx3efpny = self::$V2sz0g0zonx4[$Vubssx3efpnyName];
				if ($Vbay5blhjfzz) { $Vubssx3efpny .= '('; }
			}
		}
		return $Vubssx3efpny;
	}




	
	public static function _wrapResult($Vp4xjtpabm0l) {
		if (is_string($Vp4xjtpabm0l)) {
			
			if (preg_match('/^'.self::CALCULATION_REGEXP_ERROR.'$/i', $Vp4xjtpabm0l, $Vkvvdnwtmjnq)) {
				
				return $Vp4xjtpabm0l;
			}
			
			return '"'.$Vp4xjtpabm0l.'"';
		
		} else if((is_float($Vp4xjtpabm0l)) && ((is_nan($Vp4xjtpabm0l)) || (is_infinite($Vp4xjtpabm0l)))) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		return $Vp4xjtpabm0l;
	}	


	
	public static function _unwrapResult($Vp4xjtpabm0l) {
		if (is_string($Vp4xjtpabm0l)) {
			if ((isset($Vp4xjtpabm0l{0})) && ($Vp4xjtpabm0l{0} == '"') && (substr($Vp4xjtpabm0l,-1) == '"')) {
				return substr($Vp4xjtpabm0l,1,-1);
			}
		
		} else if((is_float($Vp4xjtpabm0l)) && ((is_nan($Vp4xjtpabm0l)) || (is_infinite($Vp4xjtpabm0l)))) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		return $Vp4xjtpabm0l;
	}	




	
	public function calculate(PHPExcel_Cell $Vp0mtfiyrfm5 = NULL) {
		try {
			return $this->calculateCellValue($Vp0mtfiyrfm5);
		} catch (PHPExcel_Exception $Vnhm0uuykimv) {
			throw new PHPExcel_Calculation_Exception($Vnhm0uuykimv->getMessage());
		}
	}	


	
	public function calculateCellValue(PHPExcel_Cell $Vp0mtfiyrfm5 = NULL, $Vqnql4pqin1i = TRUE) {
		if ($Vp0mtfiyrfm5 === NULL) {
			return NULL;
		}

		$Vhzds1xisnba = self::$Vhzds1xisnba;
		if ($Vqnql4pqin1i) {
			
			$this->formulaError = null;
			$this->_debugLog->clearLog();
			$this->_cyclicReferenceStack->clear();
			$this->_cyclicFormulaCount = 1;

			self::$Vhzds1xisnba = self::RETURN_ARRAY_AS_ARRAY;
		}

		
        $this->_cellStack[] = array(
            'sheet' => $Vp0mtfiyrfm5->getWorksheet()->getTitle(),
            'cell' => $Vp0mtfiyrfm5->getCoordinate(),
        );
		try {
			$Vwbpa3giaw5f = self::_unwrapResult($this->_calculateFormulaValue($Vp0mtfiyrfm5->getValue(), $Vp0mtfiyrfm5->getCoordinate(), $Vp0mtfiyrfm5));
            $V4343a0vl0rl = array_pop($this->_cellStack);
            $this->_workbook->getSheetByName($V4343a0vl0rl['sheet'])->getCell($V4343a0vl0rl['cell']);
		} catch (PHPExcel_Exception $Vnhm0uuykimv) {
            $V4343a0vl0rl = array_pop($this->_cellStack);
            $this->_workbook->getSheetByName($V4343a0vl0rl['sheet'])->getCell($V4343a0vl0rl['cell']);
			throw new PHPExcel_Calculation_Exception($Vnhm0uuykimv->getMessage());
		}

		if ((is_array($Vwbpa3giaw5f)) && (self::$Vhzds1xisnba != self::RETURN_ARRAY_AS_ARRAY)) {
			self::$Vhzds1xisnba = $Vhzds1xisnba;
			$V12u3rq0hztj = PHPExcel_Calculation_Functions::flattenArray($Vwbpa3giaw5f);
			if (self::$Vhzds1xisnba == self::RETURN_ARRAY_AS_ERROR) {
				return PHPExcel_Calculation_Functions::VALUE();
			}
			
			if (count($V12u3rq0hztj) != 1) {
				
				$Vws44nszhvgo = array_keys($Vwbpa3giaw5f);
				$Vws44nszhvgo = array_shift($Vws44nszhvgo);
				if (!is_numeric($Vws44nszhvgo)) { return PHPExcel_Calculation_Functions::VALUE(); }
				if (is_array($Vwbpa3giaw5f[$Vws44nszhvgo])) {
					$V4y0urwpnd3j = array_keys($Vwbpa3giaw5f[$Vws44nszhvgo]);
					$V4y0urwpnd3j = array_shift($V4y0urwpnd3j);
					if (!is_numeric($V4y0urwpnd3j)) {
						return PHPExcel_Calculation_Functions::VALUE();
					}
				}
			}
			$Vwbpa3giaw5f = array_shift($V12u3rq0hztj);
		}
		self::$Vhzds1xisnba = $Vhzds1xisnba;


		if ($Vwbpa3giaw5f === NULL) {
			return 0;
		} elseif((is_float($Vwbpa3giaw5f)) && ((is_nan($Vwbpa3giaw5f)) || (is_infinite($Vwbpa3giaw5f)))) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		return $Vwbpa3giaw5f;
	}	


	
	public function parseFormula($V22ivdjjfdx2) {
		
		
		$V22ivdjjfdx2 = trim($V22ivdjjfdx2);
		if ((!isset($V22ivdjjfdx2{0})) || ($V22ivdjjfdx2{0} != '=')) return array();
		$V22ivdjjfdx2 = ltrim(substr($V22ivdjjfdx2,1));
		if (!isset($V22ivdjjfdx2{0})) return array();

		
		return $this->_parseFormula($V22ivdjjfdx2);
	}	


	
	public function calculateFormula($V22ivdjjfdx2, $V4y0urwpnd3jellID=NULL, PHPExcel_Cell $Vp0mtfiyrfm5 = NULL) {
		
		$this->formulaError = null;
		$this->_debugLog->clearLog();
		$this->_cyclicReferenceStack->clear();

		
		
		$Vws44nszhvgoesetCache = $this->getCalculationCacheEnabled();
		$this->_calculationCacheEnabled = FALSE;
		
		try {
			$Vwbpa3giaw5f = self::_unwrapResult($this->_calculateFormulaValue($V22ivdjjfdx2, $V4y0urwpnd3jellID, $Vp0mtfiyrfm5));
		} catch (PHPExcel_Exception $Vnhm0uuykimv) {
			throw new PHPExcel_Calculation_Exception($Vnhm0uuykimv->getMessage());
		}

		
		$this->_calculationCacheEnabled = $Vws44nszhvgoesetCache;

		return $Vwbpa3giaw5f;
	}	


    public function getValueFromCache($V4y0urwpnd3jellReference, &$V4y0urwpnd3jellValue) {
		
		
		$this->_debugLog->writeDebugLog('Testing cache value for cell ', $V4y0urwpnd3jellReference);
		if (($this->_calculationCacheEnabled) && (isset($this->_calculationCache[$V4y0urwpnd3jellReference]))) {
			$this->_debugLog->writeDebugLog('Retrieving value for cell ', $V4y0urwpnd3jellReference, ' from cache');
			
			$V4y0urwpnd3jellValue = $this->_calculationCache[$V4y0urwpnd3jellReference];
			return TRUE;
		}
		return FALSE;
    }

    public function saveValueToCache($V4y0urwpnd3jellReference, $V4y0urwpnd3jellValue) {
		if ($this->_calculationCacheEnabled) {
			$this->_calculationCache[$V4y0urwpnd3jellReference] = $V4y0urwpnd3jellValue;
		}
	}

	
	public function _calculateFormulaValue($V22ivdjjfdx2, $V4y0urwpnd3jellID=null, PHPExcel_Cell $Vp0mtfiyrfm5 = null) {
		$V4y0urwpnd3jellValue = null;

		
		
		$V22ivdjjfdx2 = trim($V22ivdjjfdx2);
		if ($V22ivdjjfdx2{0} != '=') return self::_wrapResult($V22ivdjjfdx2);
		$V22ivdjjfdx2 = ltrim(substr($V22ivdjjfdx2, 1));
		if (!isset($V22ivdjjfdx2{0})) return self::_wrapResult($V22ivdjjfdx2);

		$Vp0mtfiyrfm5Parent = ($Vp0mtfiyrfm5 !== NULL) ? $Vp0mtfiyrfm5->getWorksheet() : NULL;
		$Vdvbih1tilwf = ($Vp0mtfiyrfm5Parent !== NULL) ? $Vp0mtfiyrfm5Parent->getTitle() : "\x00Wrk";
        $Vphqnn3i5zxb = $Vdvbih1tilwf . '!' . $V4y0urwpnd3jellID;

		if (($V4y0urwpnd3jellID !== NULL) && ($this->getValueFromCache($Vphqnn3i5zxb, $V4y0urwpnd3jellValue))) {
			return $V4y0urwpnd3jellValue;
		}

		if (($Vdvbih1tilwf{0} !== "\x00") && ($this->_cyclicReferenceStack->onStack($Vphqnn3i5zxb))) {
            if ($this->cyclicFormulaCount <= 0) {
                $this->_cyclicFormulaCell = '';
				return $this->_raiseFormulaError('Cyclic Reference in Formula');
			} elseif ($this->_cyclicFormulaCell === $Vphqnn3i5zxb) {
				++$this->_cyclicFormulaCount;
				if ($this->_cyclicFormulaCount >= $this->cyclicFormulaCount) {
                    $this->_cyclicFormulaCell = '';
					return $V4y0urwpnd3jellValue;
				}
			} elseif ($this->_cyclicFormulaCell == '') {
				if ($this->_cyclicFormulaCount >= $this->cyclicFormulaCount) {
					return $V4y0urwpnd3jellValue;
				}
				$this->_cyclicFormulaCell = $Vphqnn3i5zxb;
			}
		}

		
		$this->_cyclicReferenceStack->push($Vphqnn3i5zxb);
		$V4y0urwpnd3jellValue = $this->_processTokenStack($this->_parseFormula($V22ivdjjfdx2, $Vp0mtfiyrfm5), $V4y0urwpnd3jellID, $Vp0mtfiyrfm5);
		$this->_cyclicReferenceStack->pop();

		
		if ($V4y0urwpnd3jellID !== NULL) {
			$this->saveValueToCache($Vphqnn3i5zxb, $V4y0urwpnd3jellValue);
		}

		
		return $V4y0urwpnd3jellValue;
	}	


	
	private static function _checkMatrixOperands(&$Vlsk0dcfee55,&$Vildd1o1hqvn,$Vws44nszhvgoesize = 1) {
		
		
		if (!is_array($Vlsk0dcfee55)) {
			list($Vcdr5swh0mot,$V3mnt2dft0wy) = self::_getMatrixDimensions($Vildd1o1hqvn);
			$Vlsk0dcfee55 = array_fill(0,$Vcdr5swh0mot,array_fill(0,$V3mnt2dft0wy,$Vlsk0dcfee55));
			$Vws44nszhvgoesize = 0;
		} elseif (!is_array($Vildd1o1hqvn)) {
			list($Vcdr5swh0mot,$V3mnt2dft0wy) = self::_getMatrixDimensions($Vlsk0dcfee55);
			$Vildd1o1hqvn = array_fill(0,$Vcdr5swh0mot,array_fill(0,$V3mnt2dft0wy,$Vildd1o1hqvn));
			$Vws44nszhvgoesize = 0;
		}

		list($Vxfv5lksamkw,$Vn2vh33fz54s) = self::_getMatrixDimensions($Vlsk0dcfee55);
		list($Vbkc3lcddhil,$Vc2iawx5bpfg) = self::_getMatrixDimensions($Vildd1o1hqvn);
		if (($Vxfv5lksamkw == $Vc2iawx5bpfg) && ($Vbkc3lcddhil == $Vn2vh33fz54s)) {
			$Vws44nszhvgoesize = 1;
		}

		if ($Vws44nszhvgoesize == 2) {
			
			self::_resizeMatricesExtend($Vlsk0dcfee55,$Vildd1o1hqvn,$Vxfv5lksamkw,$Vn2vh33fz54s,$Vbkc3lcddhil,$Vc2iawx5bpfg);
		} elseif ($Vws44nszhvgoesize == 1) {
			
			self::_resizeMatricesShrink($Vlsk0dcfee55,$Vildd1o1hqvn,$Vxfv5lksamkw,$Vn2vh33fz54s,$Vbkc3lcddhil,$Vc2iawx5bpfg);
		}
		return array( $Vxfv5lksamkw,$Vn2vh33fz54s,$Vbkc3lcddhil,$Vc2iawx5bpfg);
	}	


	
	public static function _getMatrixDimensions(&$Vl5loifjeez4) {
		$Vcdr5swh0mot = count($Vl5loifjeez4);
		$V3mnt2dft0wy = 0;
		foreach($Vl5loifjeez4 as $Vws44nszhvgoowKey => $Vws44nszhvgoowValue) {
			$V3mnt2dft0wy = max(count($Vws44nszhvgoowValue),$V3mnt2dft0wy);
			if (!is_array($Vws44nszhvgoowValue)) {
				$Vl5loifjeez4[$Vws44nszhvgoowKey] = array($Vws44nszhvgoowValue);
			} else {
				$Vl5loifjeez4[$Vws44nszhvgoowKey] = array_values($Vws44nszhvgoowValue);
			}
		}
		$Vl5loifjeez4 = array_values($Vl5loifjeez4);
		return array($Vcdr5swh0mot,$V3mnt2dft0wy);
	}	


	
	private static function _resizeMatricesShrink(&$Vl5loifjeez41,&$Vl5loifjeez42,$Vxfv5lksamkw,$Vn2vh33fz54s,$Vbkc3lcddhil,$Vc2iawx5bpfg) {
		if (($Vc2iawx5bpfg < $Vn2vh33fz54s) || ($Vbkc3lcddhil < $Vxfv5lksamkw)) {
			if ($Vbkc3lcddhil < $Vxfv5lksamkw) {
				for ($Vfhiq1lhsoja = $Vbkc3lcddhil; $Vfhiq1lhsoja < $Vxfv5lksamkw; ++$Vfhiq1lhsoja) {
					unset($Vl5loifjeez41[$Vfhiq1lhsoja]);
				}
			}
			if ($Vc2iawx5bpfg < $Vn2vh33fz54s) {
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vxfv5lksamkw; ++$Vfhiq1lhsoja) {
					for ($Vzmnqyqjjodw = $Vc2iawx5bpfg; $Vzmnqyqjjodw < $Vn2vh33fz54s; ++$Vzmnqyqjjodw) {
						unset($Vl5loifjeez41[$Vfhiq1lhsoja][$Vzmnqyqjjodw]);
					}
				}
			}
		}

		if (($Vn2vh33fz54s < $Vc2iawx5bpfg) || ($Vxfv5lksamkw < $Vbkc3lcddhil)) {
			if ($Vxfv5lksamkw < $Vbkc3lcddhil) {
				for ($Vfhiq1lhsoja = $Vxfv5lksamkw; $Vfhiq1lhsoja < $Vbkc3lcddhil; ++$Vfhiq1lhsoja) {
					unset($Vl5loifjeez42[$Vfhiq1lhsoja]);
				}
			}
			if ($Vn2vh33fz54s < $Vc2iawx5bpfg) {
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vbkc3lcddhil; ++$Vfhiq1lhsoja) {
					for ($Vzmnqyqjjodw = $Vn2vh33fz54s; $Vzmnqyqjjodw < $Vc2iawx5bpfg; ++$Vzmnqyqjjodw) {
						unset($Vl5loifjeez42[$Vfhiq1lhsoja][$Vzmnqyqjjodw]);
					}
				}
			}
		}
	}	


	
	private static function _resizeMatricesExtend(&$Vl5loifjeez41,&$Vl5loifjeez42,$Vxfv5lksamkw,$Vn2vh33fz54s,$Vbkc3lcddhil,$Vc2iawx5bpfg) {
		if (($Vc2iawx5bpfg < $Vn2vh33fz54s) || ($Vbkc3lcddhil < $Vxfv5lksamkw)) {
			if ($Vc2iawx5bpfg < $Vn2vh33fz54s) {
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vbkc3lcddhil; ++$Vfhiq1lhsoja) {
					$V1e1eaicqarh = $Vl5loifjeez42[$Vfhiq1lhsoja][$Vc2iawx5bpfg-1];
					for ($Vzmnqyqjjodw = $Vc2iawx5bpfg; $Vzmnqyqjjodw < $Vn2vh33fz54s; ++$Vzmnqyqjjodw) {
						$Vl5loifjeez42[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $V1e1eaicqarh;
					}
				}
			}
			if ($Vbkc3lcddhil < $Vxfv5lksamkw) {
				$V1e1eaicqarh = $Vl5loifjeez42[$Vbkc3lcddhil-1];
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vxfv5lksamkw; ++$Vfhiq1lhsoja) {
					$Vl5loifjeez42[$Vfhiq1lhsoja] = $V1e1eaicqarh;
				}
			}
		}

		if (($Vn2vh33fz54s < $Vc2iawx5bpfg) || ($Vxfv5lksamkw < $Vbkc3lcddhil)) {
			if ($Vn2vh33fz54s < $Vc2iawx5bpfg) {
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vxfv5lksamkw; ++$Vfhiq1lhsoja) {
					$V1e1eaicqarh = $Vl5loifjeez41[$Vfhiq1lhsoja][$Vn2vh33fz54s-1];
					for ($Vzmnqyqjjodw = $Vn2vh33fz54s; $Vzmnqyqjjodw < $Vc2iawx5bpfg; ++$Vzmnqyqjjodw) {
						$Vl5loifjeez41[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $V1e1eaicqarh;
					}
				}
			}
			if ($Vxfv5lksamkw < $Vbkc3lcddhil) {
				$V1e1eaicqarh = $Vl5loifjeez41[$Vxfv5lksamkw-1];
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vbkc3lcddhil; ++$Vfhiq1lhsoja) {
					$Vl5loifjeez41[$Vfhiq1lhsoja] = $V1e1eaicqarh;
				}
			}
		}
	}	


	
	private function _showValue($Vp4xjtpabm0l) {
		if ($this->_debugLog->getWriteDebugLog()) {
			$Vvg4xgn13myp = PHPExcel_Calculation_Functions::flattenArray($Vp4xjtpabm0l);
			if (count($Vvg4xgn13myp) == 1) {
				$Vp4xjtpabm0l = array_pop($Vvg4xgn13myp);
			}

			if (is_array($Vp4xjtpabm0l)) {
				$Vws44nszhvgoeturnMatrix = array();
				$Vyjfi2slrwkp = $Vws44nszhvgopad = ', ';
				foreach($Vp4xjtpabm0l as $Vws44nszhvgoow) {
					if (is_array($Vws44nszhvgoow)) {
						$Vws44nszhvgoeturnMatrix[] = implode($Vyjfi2slrwkp,array_map(array($this,'_showValue'),$Vws44nszhvgoow));
						$Vws44nszhvgopad = '; ';
					} else {
						$Vws44nszhvgoeturnMatrix[] = $this->_showValue($Vws44nszhvgoow);
					}
				}
				return '{ '.implode($Vws44nszhvgopad,$Vws44nszhvgoeturnMatrix).' }';
			} elseif(is_string($Vp4xjtpabm0l) && (trim($Vp4xjtpabm0l,'"') == $Vp4xjtpabm0l)) {
				return '"'.$Vp4xjtpabm0l.'"';
			} elseif(is_bool($Vp4xjtpabm0l)) {
				return ($Vp4xjtpabm0l) ? self::$Vylvfs0sz4ep['TRUE'] : self::$Vylvfs0sz4ep['FALSE'];
			}
		}
		return PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
	}	


	
	private function _showTypeDetails($Vp4xjtpabm0l) {
		if ($this->_debugLog->getWriteDebugLog()) {
			$Vvg4xgn13myp = PHPExcel_Calculation_Functions::flattenArray($Vp4xjtpabm0l);
			if (count($Vvg4xgn13myp) == 1) {
				$Vp4xjtpabm0l = array_pop($Vvg4xgn13myp);
			}

			if ($Vp4xjtpabm0l === NULL) {
				return 'a NULL value';
			} elseif (is_float($Vp4xjtpabm0l)) {
				$Vs2o2jwmr1xm = 'a floating point number';
			} elseif(is_int($Vp4xjtpabm0l)) {
				$Vs2o2jwmr1xm = 'an integer number';
			} elseif(is_bool($Vp4xjtpabm0l)) {
				$Vs2o2jwmr1xm = 'a boolean';
			} elseif(is_array($Vp4xjtpabm0l)) {
				$Vs2o2jwmr1xm = 'a matrix';
			} else {
				if ($Vp4xjtpabm0l == '') {
					return 'an empty string';
				} elseif ($Vp4xjtpabm0l{0} == '#') {
					return 'a '.$Vp4xjtpabm0l.' error';
				} else {
					$Vs2o2jwmr1xm = 'a string';
				}
			}
			return $Vs2o2jwmr1xm.' with a value of '.$this->_showValue($Vp4xjtpabm0l);
		}
	}	


	private function _convertMatrixReferences($V22ivdjjfdx2) {
		static $Vl5loifjeez4ReplaceFrom = array('{',';','}');
		static $Vl5loifjeez4ReplaceTo = array('MKMATRIX(MKMATRIX(','),MKMATRIX(','))');

		
		if (strpos($V22ivdjjfdx2,'{') !== FALSE) {
			
			if (strpos($V22ivdjjfdx2,'"') !== FALSE) {
				
				
				$Vcartbxounrh = explode('"',$V22ivdjjfdx2);
				
				$Vt31f3c3rbdh = $V4y0urwpnd3jloseCount = 0;
				$Vfhiq1lhsoja = FALSE;
				foreach($Vcartbxounrh as &$Vp4xjtpabm0l) {
					
					if ($Vfhiq1lhsoja = !$Vfhiq1lhsoja) {
						$Vt31f3c3rbdh += substr_count($Vp4xjtpabm0l,'{');
						$V4y0urwpnd3jloseCount += substr_count($Vp4xjtpabm0l,'}');
						$Vp4xjtpabm0l = str_replace($Vl5loifjeez4ReplaceFrom,$Vl5loifjeez4ReplaceTo,$Vp4xjtpabm0l);
					}
				}
				unset($Vp4xjtpabm0l);
				
				$V22ivdjjfdx2 = implode('"',$Vcartbxounrh);
			} else {
				
				$Vt31f3c3rbdh = substr_count($V22ivdjjfdx2,'{');
				$V4y0urwpnd3jloseCount = substr_count($V22ivdjjfdx2,'}');
				$V22ivdjjfdx2 = str_replace($Vl5loifjeez4ReplaceFrom,$Vl5loifjeez4ReplaceTo,$V22ivdjjfdx2);
			}
			
			if ($Vt31f3c3rbdh < $V4y0urwpnd3jloseCount) {
				if ($Vt31f3c3rbdh > 0) {
					return $this->_raiseFormulaError("Formula Error: Mismatched matrix braces '}'");
				} else {
					return $this->_raiseFormulaError("Formula Error: Unexpected '}' encountered");
				}
			} elseif ($Vt31f3c3rbdh > $V4y0urwpnd3jloseCount) {
				if ($V4y0urwpnd3jloseCount > 0) {
					return $this->_raiseFormulaError("Formula Error: Mismatched matrix braces '{'");
				} else {
					return $this->_raiseFormulaError("Formula Error: Unexpected '{' encountered");
				}
			}
		}

		return $V22ivdjjfdx2;
	}	


	private static function _mkMatrix() {
		return func_get_args();
	}	


	
	
	
	private static $Vwfzwupbhoi0	= array(
		'^' => 0,															
		'*' => 0, '/' => 0, 												
		'+' => 0, '-' => 0,													
		'&' => 0,															
		'|' => 0, ':' => 0,													
		'>' => 0, '<' => 0, '=' => 0, '>=' => 0, '<=' => 0, '<>' => 0		
	);

	
	
	private static $Vknkobb1pqxt	= array('>' => TRUE, '<' => TRUE, '=' => TRUE, '>=' => TRUE, '<=' => TRUE, '<>' => TRUE);

	
	
	
	private static $Vm51qwi4ssue	= array(
		':' => 8,																
		'|' => 7,																
		'~' => 6,																
		'%' => 5,																
		'^' => 4,																
		'*' => 3, '/' => 3, 													
		'+' => 2, '-' => 2,														
		'&' => 1,																
		'>' => 0, '<' => 0, '=' => 0, '>=' => 0, '<=' => 0, '<>' => 0			
	);

	
	private function _parseFormula($V22ivdjjfdx2, PHPExcel_Cell $Vp0mtfiyrfm5 = NULL) {
		if (($V22ivdjjfdx2 = $this->_convertMatrixReferences(trim($V22ivdjjfdx2))) === FALSE) {
			return FALSE;
		}

		
		
		$Vp0mtfiyrfm5Parent = ($Vp0mtfiyrfm5 !== NULL) ? $Vp0mtfiyrfm5->getWorksheet() : NULL;

		$Vws44nszhvgoegexpMatchString = '/^('.self::CALCULATION_REGEXP_FUNCTION.
							   '|'.self::CALCULATION_REGEXP_CELLREF.
							   '|'.self::CALCULATION_REGEXP_NUMBER.
							   '|'.self::CALCULATION_REGEXP_STRING.
							   '|'.self::CALCULATION_REGEXP_OPENBRACE.
							   '|'.self::CALCULATION_REGEXP_NAMEDRANGE.
							   '|'.self::CALCULATION_REGEXP_ERROR.
							 ')/si';

		
		$Vfhiq1lhsojandex = 0;
		$Vltejvmdssgs = new PHPExcel_Calculation_Token_Stack;
		$Vwwmyjdeanij = array();
		$Vnhm0uuykimvxpectingOperator = FALSE;					
													
		$Vnhm0uuykimvxpectingOperand = FALSE;					
													
		
		
		while(TRUE) {

			$Vqz0lsuuivsr = $V22ivdjjfdx2{$Vfhiq1lhsojandex};	

			if ((isset(self::$Vknkobb1pqxt[$Vqz0lsuuivsr])) && (strlen($V22ivdjjfdx2) > $Vfhiq1lhsojandex) && (isset(self::$Vknkobb1pqxt[$V22ivdjjfdx2{$Vfhiq1lhsojandex+1}]))) {
				$Vqz0lsuuivsr .= $V22ivdjjfdx2{++$Vfhiq1lhsojandex};

			}

			
			$Vfhiq1lhsojasOperandOrFunction = preg_match($Vws44nszhvgoegexpMatchString, substr($V22ivdjjfdx2, $Vfhiq1lhsojandex), $Vkvvdnwtmjnq);



			if ($Vqz0lsuuivsr == '-' && !$Vnhm0uuykimvxpectingOperator) {				

				$Vltejvmdssgs->push('Unary Operator','~');							
				++$Vfhiq1lhsojandex;													
			} elseif ($Vqz0lsuuivsr == '%' && $Vnhm0uuykimvxpectingOperator) {

				$Vltejvmdssgs->push('Unary Operator','%');							
				++$Vfhiq1lhsojandex;
			} elseif ($Vqz0lsuuivsr == '+' && !$Vnhm0uuykimvxpectingOperator) {			

				++$Vfhiq1lhsojandex;													
			} elseif ((($Vqz0lsuuivsr == '~') || ($Vqz0lsuuivsr == '|')) && (!$Vfhiq1lhsojasOperandOrFunction)) {	
				return $this->_raiseFormulaError("Formula Error: Illegal character '~'");				

			} elseif ((isset(self::$Vvp4pchjucrr[$Vqz0lsuuivsr]) or $Vfhiq1lhsojasOperandOrFunction) && $Vnhm0uuykimvxpectingOperator) {	

				while($Vltejvmdssgs->count() > 0 &&
					($V2yicsyau1ah = $Vltejvmdssgs->last()) &&
					isset(self::$Vvp4pchjucrr[$V2yicsyau1ah['value']]) &&
					@(self::$Vwfzwupbhoi0[$Vqz0lsuuivsr] ? self::$Vm51qwi4ssue[$Vqz0lsuuivsr] < self::$Vm51qwi4ssue[$V2yicsyau1ah['value']] : self::$Vm51qwi4ssue[$Vqz0lsuuivsr] <= self::$Vm51qwi4ssue[$V2yicsyau1ah['value']])) {
					$Vwwmyjdeanij[] = $Vltejvmdssgs->pop();								
				}
				$Vltejvmdssgs->push('Binary Operator',$Vqz0lsuuivsr);	
				++$Vfhiq1lhsojandex;
				$Vnhm0uuykimvxpectingOperator = FALSE;

			} elseif ($Vqz0lsuuivsr == ')' && $Vnhm0uuykimvxpectingOperator) {			

				$Vnhm0uuykimvxpectingOperand = FALSE;
				while (($V2yicsyau1ah = $Vltejvmdssgs->pop()) && $V2yicsyau1ah['value'] != '(') {		
					if ($V2yicsyau1ah === NULL) return $this->_raiseFormulaError('Formula Error: Unexpected closing brace ")"');
					else $Vwwmyjdeanij[] = $V2yicsyau1ah;
				}
				$Vrec2f1japon = $Vltejvmdssgs->last(2);
				if (preg_match('/^'.self::CALCULATION_REGEXP_FUNCTION.'$/i', $Vrec2f1japon['value'], $Vkvvdnwtmjnqes)) {	
					$Vubssx3efpnyName = $Vkvvdnwtmjnqes[1];										

					$Vrec2f1japon = $Vltejvmdssgs->pop();
					$V5zxiopfjggn = $Vrec2f1japon['value'];		







					$Vwwmyjdeanij[] = $Vrec2f1japon;						
					$Vwwmyjdeanij[] = $Vltejvmdssgs->pop();			
					if (isset(self::$Vkn1gkvnkt2m[$Vubssx3efpnyName])) {

						$Vnhm0uuykimvxpectedArgumentCount = self::$Vkn1gkvnkt2m[$Vubssx3efpnyName]['argumentCount'];
						$Vubssx3efpnyCall = self::$Vkn1gkvnkt2m[$Vubssx3efpnyName]['functionCall'];
					} elseif (isset(self::$Vq0fzqejahhh[$Vubssx3efpnyName])) {

						$Vnhm0uuykimvxpectedArgumentCount = self::$Vq0fzqejahhh[$Vubssx3efpnyName]['argumentCount'];
						$Vubssx3efpnyCall = self::$Vq0fzqejahhh[$Vubssx3efpnyName]['functionCall'];
					} else {	
						return $this->_raiseFormulaError("Formula Error: Internal error, non-function on stack");
					}
					
					$V5zxiopfjggnError = FALSE;
					if (is_numeric($Vnhm0uuykimvxpectedArgumentCount)) {
						if ($Vnhm0uuykimvxpectedArgumentCount < 0) {

							if ($V5zxiopfjggn > abs($Vnhm0uuykimvxpectedArgumentCount)) {
								$V5zxiopfjggnError = TRUE;
								$Vnhm0uuykimvxpectedArgumentCountString = 'no more than '.abs($Vnhm0uuykimvxpectedArgumentCount);
							}
						} else {

							if ($V5zxiopfjggn != $Vnhm0uuykimvxpectedArgumentCount) {
								$V5zxiopfjggnError = TRUE;
								$Vnhm0uuykimvxpectedArgumentCountString = $Vnhm0uuykimvxpectedArgumentCount;
							}
						}
					} elseif ($Vnhm0uuykimvxpectedArgumentCount != '*') {
						$Vfhiq1lhsojasOperandOrFunction = preg_match('/(\d*)([-+,])(\d*)/',$Vnhm0uuykimvxpectedArgumentCount,$V3h02pa4vu2h);


						switch ($V3h02pa4vu2h[2]) {
							case '+' :
								if ($V5zxiopfjggn < $V3h02pa4vu2h[1]) {
									$V5zxiopfjggnError = TRUE;
									$Vnhm0uuykimvxpectedArgumentCountString = $V3h02pa4vu2h[1].' or more ';
								}
								break;
							case '-' :
								if (($V5zxiopfjggn < $V3h02pa4vu2h[1]) || ($V5zxiopfjggn > $V3h02pa4vu2h[3])) {
									$V5zxiopfjggnError = TRUE;
									$Vnhm0uuykimvxpectedArgumentCountString = 'between '.$V3h02pa4vu2h[1].' and '.$V3h02pa4vu2h[3];
								}
								break;
							case ',' :
								if (($V5zxiopfjggn != $V3h02pa4vu2h[1]) && ($V5zxiopfjggn != $V3h02pa4vu2h[3])) {
									$V5zxiopfjggnError = TRUE;
									$Vnhm0uuykimvxpectedArgumentCountString = 'either '.$V3h02pa4vu2h[1].' or '.$V3h02pa4vu2h[3];
								}
								break;
						}
					}
					if ($V5zxiopfjggnError) {
						return $this->_raiseFormulaError("Formula Error: Wrong number of arguments for $Vubssx3efpnyName() function: $V5zxiopfjggn given, ".$Vnhm0uuykimvxpectedArgumentCountString." expected");
					}
				}
				++$Vfhiq1lhsojandex;

			} elseif ($Vqz0lsuuivsr == ',') {			

				while (($V2yicsyau1ah = $Vltejvmdssgs->pop()) && $V2yicsyau1ah['value'] != '(') {		
					if ($V2yicsyau1ah === NULL) return $this->_raiseFormulaError("Formula Error: Unexpected ,");
					else $Vwwmyjdeanij[] = $V2yicsyau1ah;	
				}
				
				
				if (($Vnhm0uuykimvxpectingOperand) || (!$Vnhm0uuykimvxpectingOperator)) {
					$Vwwmyjdeanij[] = array('type' => 'NULL Value', 'value' => self::$Vnt2huwkvpk0['NULL'], 'reference' => NULL);
				}
				
				$Vrec2f1japon = $Vltejvmdssgs->last(2);
				if (!preg_match('/^'.self::CALCULATION_REGEXP_FUNCTION.'$/i', $Vrec2f1japon['value'], $Vkvvdnwtmjnqes))
					return $this->_raiseFormulaError("Formula Error: Unexpected ,");
				$Vrec2f1japon = $Vltejvmdssgs->pop();
				$Vltejvmdssgs->push($Vrec2f1japon['type'],++$Vrec2f1japon['value'],$Vrec2f1japon['reference']);	
				$Vltejvmdssgs->push('Brace', '(');	
				$Vnhm0uuykimvxpectingOperator = FALSE;
				$Vnhm0uuykimvxpectingOperand = TRUE;
				++$Vfhiq1lhsojandex;

			} elseif ($Vqz0lsuuivsr == '(' && !$Vnhm0uuykimvxpectingOperator) {

				$Vltejvmdssgs->push('Brace', '(');
				++$Vfhiq1lhsojandex;

			} elseif ($Vfhiq1lhsojasOperandOrFunction && !$Vnhm0uuykimvxpectingOperator) {	
				$Vnhm0uuykimvxpectingOperator = TRUE;
				$Vnhm0uuykimvxpectingOperand = FALSE;
				$Vwk2nao2d33x = $Vkvvdnwtmjnq[1];
				$Volq3gdvkuqp = strlen($Vwk2nao2d33x);


				if (preg_match('/^'.self::CALCULATION_REGEXP_FUNCTION.'$/i', $Vwk2nao2d33x, $Vkvvdnwtmjnqes)) {
					$Vwk2nao2d33x = preg_replace('/\s/','',$Vwk2nao2d33x);

					if (isset(self::$Vq0fzqejahhh[strtoupper($Vkvvdnwtmjnqes[1])]) || isset(self::$Vkn1gkvnkt2m[strtoupper($Vkvvdnwtmjnqes[1])])) {	
						$Vltejvmdssgs->push('Function', strtoupper($Vwk2nao2d33x));
						$Veon1fabq1la = preg_match('/^\s*(\s*\))/i', substr($V22ivdjjfdx2, $Vfhiq1lhsojandex+$Volq3gdvkuqp), $Vgjg4hltrtib);
						if ($Veon1fabq1la) {
							$Vltejvmdssgs->push('Operand Count for Function '.strtoupper($Vwk2nao2d33x).')', 0);
							$Vnhm0uuykimvxpectingOperator = TRUE;
						} else {
							$Vltejvmdssgs->push('Operand Count for Function '.strtoupper($Vwk2nao2d33x).')', 1);
							$Vnhm0uuykimvxpectingOperator = FALSE;
						}
						$Vltejvmdssgs->push('Brace', '(');
					} else {	
						$Vwwmyjdeanij[] = array('type' => 'Value', 'value' => $Vkvvdnwtmjnqes[1], 'reference' => NULL);
					}
				} elseif (preg_match('/^'.self::CALCULATION_REGEXP_CELLREF.'$/i', $Vwk2nao2d33x, $Vkvvdnwtmjnqes)) {

					
					

					
					$Vuhlm3kdaoqp = $Vltejvmdssgs->last(1);
					if ($Vuhlm3kdaoqp['value'] == ':') {
						
						if ($Vkvvdnwtmjnqes[2] == '') {
							
							
							$Vewpre34uvka = $Vwwmyjdeanij[count($Vwwmyjdeanij)-1]['value'];
							preg_match('/^'.self::CALCULATION_REGEXP_CELLREF.'$/i', $Vewpre34uvka, $Vamsnm3jo450);
							if ($Vamsnm3jo450[2] > '') {
								$Vwk2nao2d33x = $Vamsnm3jo450[2].'!'.$Vwk2nao2d33x;
							}
						} else {
							return $this->_raiseFormulaError("3D Range references are not yet supported");
						}
					}

					$Vwwmyjdeanij[] = array('type' => 'Cell Reference', 'value' => $Vwk2nao2d33x, 'reference' => $Vwk2nao2d33x);

				} else {	

					
					$Vuhlm3kdaoqp = $Vltejvmdssgs->last(1);
					if ($Vuhlm3kdaoqp['value'] == ':') {
						$Vaxcib5122v1 = $Vwwmyjdeanij[count($Vwwmyjdeanij)-1]['value'];
						$Vws44nszhvgoangeWS1 = '';
						if (strpos('!',$Vaxcib5122v1) !== FALSE) {
							list($Vws44nszhvgoangeWS1,$Vaxcib5122v1) = explode('!',$Vaxcib5122v1);
						}
						if ($Vws44nszhvgoangeWS1 != '') $Vws44nszhvgoangeWS1 .= '!';
						$Vws44nszhvgoangeWS2 = $Vws44nszhvgoangeWS1;
						if (strpos('!',$Vwk2nao2d33x) !== FALSE) {
							list($Vws44nszhvgoangeWS2,$Vwk2nao2d33x) = explode('!',$Vwk2nao2d33x);
						}
						if ($Vws44nszhvgoangeWS2 != '') $Vws44nszhvgoangeWS2 .= '!';
						if ((is_integer($Vaxcib5122v1)) && (ctype_digit($Vwk2nao2d33x)) &&
							($Vaxcib5122v1 <= 1048576) && ($Vwk2nao2d33x <= 1048576)) {
							
							$Vnhm0uuykimvndRowColRef = ($Vp0mtfiyrfm5Parent !== NULL) ? $Vp0mtfiyrfm5Parent->getHighestColumn() : 'XFD';	
							$Vwwmyjdeanij[count($Vwwmyjdeanij)-1]['value'] = $Vws44nszhvgoangeWS1.'A'.$Vaxcib5122v1;
							$Vwk2nao2d33x = $Vws44nszhvgoangeWS2.$Vnhm0uuykimvndRowColRef.$Vwk2nao2d33x;
						} elseif ((ctype_alpha($Vaxcib5122v1)) && (ctype_alpha($Vwk2nao2d33x)) &&
							(strlen($Vaxcib5122v1) <= 3) && (strlen($Vwk2nao2d33x) <= 3)) {
							
							$Vnhm0uuykimvndRowColRef = ($Vp0mtfiyrfm5Parent !== NULL) ? $Vp0mtfiyrfm5Parent->getHighestRow() : 1048576;		
							$Vwwmyjdeanij[count($Vwwmyjdeanij)-1]['value'] = $Vws44nszhvgoangeWS1.strtoupper($Vaxcib5122v1).'1';
							$Vwk2nao2d33x = $Vws44nszhvgoangeWS2.$Vwk2nao2d33x.$Vnhm0uuykimvndRowColRef;
						}
					}

					$Vamaqngce5dhConstant = FALSE;
					if ($Vqz0lsuuivsr == '"') {

						
						$Vwk2nao2d33x = self::_wrapResult(str_replace('""','"',self::_unwrapResult($Vwk2nao2d33x)));
					} elseif (is_numeric($Vwk2nao2d33x)) {

						if ((strpos($Vwk2nao2d33x,'.') !== FALSE) || (stripos($Vwk2nao2d33x,'e') !== FALSE) || ($Vwk2nao2d33x > PHP_INT_MAX) || ($Vwk2nao2d33x < -PHP_INT_MAX)) {

							$Vwk2nao2d33x = (float) $Vwk2nao2d33x;
						} else {

							$Vwk2nao2d33x = (integer) $Vwk2nao2d33x;
						}
					} elseif (isset(self::$Vnt2huwkvpk0[trim(strtoupper($Vwk2nao2d33x))])) {
						$Vnhm0uuykimvxcelConstant = trim(strtoupper($Vwk2nao2d33x));

						$Vwk2nao2d33x = self::$Vnt2huwkvpk0[$Vnhm0uuykimvxcelConstant];
					} elseif (($Vamaqngce5dhConstant = array_search(trim(strtoupper($Vwk2nao2d33x)), self::$Vylvfs0sz4ep)) !== FALSE) {

						$Vwk2nao2d33x = self::$Vnt2huwkvpk0[$Vamaqngce5dhConstant];
					}
					$Vrec2f1japonetails = array('type' => 'Value', 'value' => $Vwk2nao2d33x, 'reference' => NULL);
					if ($Vamaqngce5dhConstant) { $Vrec2f1japonetails['localeValue'] = $Vamaqngce5dhConstant; }
					$Vwwmyjdeanij[] = $Vrec2f1japonetails;
				}
				$Vfhiq1lhsojandex += $Volq3gdvkuqp;

			} elseif ($Vqz0lsuuivsr == '$') {	
				++$Vfhiq1lhsojandex;
			} elseif ($Vqz0lsuuivsr == ')') {	
				if ($Vnhm0uuykimvxpectingOperand) {
					$Vwwmyjdeanij[] = array('type' => 'NULL Value', 'value' => self::$Vnt2huwkvpk0['NULL'], 'reference' => NULL);
					$Vnhm0uuykimvxpectingOperand = FALSE;
					$Vnhm0uuykimvxpectingOperator = TRUE;
				} else {
					return $this->_raiseFormulaError("Formula Error: Unexpected ')'");
				}
			} elseif (isset(self::$Vvp4pchjucrr[$Vqz0lsuuivsr]) && !$Vnhm0uuykimvxpectingOperator) {
				return $this->_raiseFormulaError("Formula Error: Unexpected operator '$Vqz0lsuuivsr'");
			} else {	
				return $this->_raiseFormulaError("Formula Error: An unexpected error occured");
			}
			
			if ($Vfhiq1lhsojandex == strlen($V22ivdjjfdx2)) {
				
				
				if ((isset(self::$Vvp4pchjucrr[$Vqz0lsuuivsr])) && ($Vqz0lsuuivsr != '%')) {
					return $this->_raiseFormulaError("Formula Error: Operator '$Vqz0lsuuivsr' has no operands");
				} else {
					break;
				}
			}
			
			while (($V22ivdjjfdx2{$Vfhiq1lhsojandex} == "\n") || ($V22ivdjjfdx2{$Vfhiq1lhsojandex} == "\r")) {
				++$Vfhiq1lhsojandex;
			}
			if ($V22ivdjjfdx2{$Vfhiq1lhsojandex} == ' ') {
				while ($V22ivdjjfdx2{$Vfhiq1lhsojandex} == ' ') {
					++$Vfhiq1lhsojandex;
				}
				
				

				if (($Vnhm0uuykimvxpectingOperator) && (preg_match('/^'.self::CALCULATION_REGEXP_CELLREF.'.*/Ui', substr($V22ivdjjfdx2, $Vfhiq1lhsojandex), $Vkvvdnwtmjnq)) &&
					($Vwwmyjdeanij[count($Vwwmyjdeanij)-1]['type'] == 'Cell Reference')) {

					while($Vltejvmdssgs->count() > 0 &&
						($V2yicsyau1ah = $Vltejvmdssgs->last()) &&
						isset(self::$Vvp4pchjucrr[$V2yicsyau1ah['value']]) &&
						@(self::$Vwfzwupbhoi0[$Vqz0lsuuivsr] ? self::$Vm51qwi4ssue[$Vqz0lsuuivsr] < self::$Vm51qwi4ssue[$V2yicsyau1ah['value']] : self::$Vm51qwi4ssue[$Vqz0lsuuivsr] <= self::$Vm51qwi4ssue[$V2yicsyau1ah['value']])) {
						$Vwwmyjdeanij[] = $Vltejvmdssgs->pop();								
					}
					$Vltejvmdssgs->push('Binary Operator','|');	
					$Vnhm0uuykimvxpectingOperator = FALSE;
				}
			}
		}

		while (($Vjuftxi2lyub = $Vltejvmdssgs->pop()) !== NULL) {	
			if ((is_array($Vjuftxi2lyub) && $Vjuftxi2lyub['value'] == '(') || ($Vjuftxi2lyub === '('))
				return $this->_raiseFormulaError("Formula Error: Expecting ')'");	
			$Vwwmyjdeanij[] = $Vjuftxi2lyub;
		}
		return $Vwwmyjdeanij;
	}	


	private static function _dataTestReference(&$Vjuftxi2lyuberandData)
	{
		$Vjuftxi2lyuberand = $Vjuftxi2lyuberandData['value'];
		if (($Vjuftxi2lyuberandData['reference'] === NULL) && (is_array($Vjuftxi2lyuberand))) {
			$Vws44nszhvgoKeys = array_keys($Vjuftxi2lyuberand);
			$Vws44nszhvgoowKey = array_shift($Vws44nszhvgoKeys);
			$V4y0urwpnd3jKeys = array_keys(array_keys($Vjuftxi2lyuberand[$Vws44nszhvgoowKey]));
			$V4y0urwpnd3jolKey = array_shift($V4y0urwpnd3jKeys);
			if (ctype_upper($V4y0urwpnd3jolKey)) {
				$Vjuftxi2lyuberandData['reference'] = $V4y0urwpnd3jolKey.$Vws44nszhvgoowKey;
			}
		}
		return $Vjuftxi2lyuberand;
	}

	
	private function _processTokenStack($Vgeu2rx5xc4wkens, $V4y0urwpnd3jellID = NULL, PHPExcel_Cell $Vp0mtfiyrfm5 = NULL) {
		if ($Vgeu2rx5xc4wkens == FALSE) return FALSE;

		
		
		$Vp0mtfiyrfm5Worksheet = ($Vp0mtfiyrfm5 !== NULL) ? $Vp0mtfiyrfm5->getWorksheet() : NULL;
		$Vp0mtfiyrfm5Parent = ($Vp0mtfiyrfm5 !== NULL) ? $Vp0mtfiyrfm5->getParent() : null;
		$Vltejvmdssgs = new PHPExcel_Calculation_Token_Stack;

		
		foreach ($Vgeu2rx5xc4wkens as $Vgeu2rx5xc4wkenData) {


			$Vgeu2rx5xc4wken = $Vgeu2rx5xc4wkenData['value'];

			
			if (isset(self::$Vtikp53bllgl[$Vgeu2rx5xc4wken])) {

				
				if (($Vildd1o1hqvnData = $Vltejvmdssgs->pop()) === NULL) return $this->_raiseFormulaError('Internal error - Operand value missing from stack');
				if (($Vlsk0dcfee55Data = $Vltejvmdssgs->pop()) === NULL) return $this->_raiseFormulaError('Internal error - Operand value missing from stack');

				$Vlsk0dcfee55 = self::_dataTestReference($Vlsk0dcfee55Data);
				$Vildd1o1hqvn = self::_dataTestReference($Vildd1o1hqvnData);

				
				if ($Vgeu2rx5xc4wken == ':') {
					$this->_debugLog->writeDebugLog('Evaluating Range ', $this->_showValue($Vlsk0dcfee55Data['reference']), ' ', $Vgeu2rx5xc4wken, ' ', $this->_showValue($Vildd1o1hqvnData['reference']));
				} else {
					$this->_debugLog->writeDebugLog('Evaluating ', $this->_showValue($Vlsk0dcfee55), ' ', $Vgeu2rx5xc4wken, ' ', $this->_showValue($Vildd1o1hqvn));
				}

				
				switch ($Vgeu2rx5xc4wken) {
					
					case '>'	:			
					case '<'	:			
					case '>='	:			
					case '<='	:			
					case '='	:			
					case '<>'	:			
						$this->_executeBinaryComparisonOperation($V4y0urwpnd3jellID,$Vlsk0dcfee55,$Vildd1o1hqvn,$Vgeu2rx5xc4wken,$Vltejvmdssgs);
						break;
					
					case ':'	:			
						$Vhutydw5an1r = $Vq4kwbwduuym = '';
						if (strpos($Vlsk0dcfee55Data['reference'],'!') !== FALSE) {
							list($Vhutydw5an1r,$Vlsk0dcfee55Data['reference']) = explode('!',$Vlsk0dcfee55Data['reference']);
						} else {
							$Vhutydw5an1r = ($Vp0mtfiyrfm5Parent !== NULL) ? $Vp0mtfiyrfm5Worksheet->getTitle() : '';
						}
						if (strpos($Vildd1o1hqvnData['reference'],'!') !== FALSE) {
							list($Vq4kwbwduuym,$Vildd1o1hqvnData['reference']) = explode('!',$Vildd1o1hqvnData['reference']);
						} else {
							$Vq4kwbwduuym = $Vhutydw5an1r;
						}
						if ($Vhutydw5an1r == $Vq4kwbwduuym) {
							if ($Vlsk0dcfee55Data['reference'] === NULL) {
								if ((trim($Vlsk0dcfee55Data['value']) != '') && (is_numeric($Vlsk0dcfee55Data['value']))) {
									$Vlsk0dcfee55Data['reference'] = $Vp0mtfiyrfm5->getColumn().$Vlsk0dcfee55Data['value'];
								} elseif (trim($Vlsk0dcfee55Data['reference']) == '') {
									$Vlsk0dcfee55Data['reference'] = $Vp0mtfiyrfm5->getCoordinate();
								} else {
									$Vlsk0dcfee55Data['reference'] = $Vlsk0dcfee55Data['value'].$Vp0mtfiyrfm5->getRow();
								}
							}
							if ($Vildd1o1hqvnData['reference'] === NULL) {
								if ((trim($Vildd1o1hqvnData['value']) != '') && (is_numeric($Vildd1o1hqvnData['value']))) {
									$Vildd1o1hqvnData['reference'] = $Vp0mtfiyrfm5->getColumn().$Vildd1o1hqvnData['value'];
								} elseif (trim($Vildd1o1hqvnData['reference']) == '') {
									$Vildd1o1hqvnData['reference'] = $Vp0mtfiyrfm5->getCoordinate();
								} else {
									$Vildd1o1hqvnData['reference'] = $Vildd1o1hqvnData['value'].$Vp0mtfiyrfm5->getRow();
								}
							}

							$Viwli5fuuqmq = array_merge(explode(':',$Vlsk0dcfee55Data['reference']),explode(':',$Vildd1o1hqvnData['reference']));
							$Vhpqbhvmzz1d = $Vnwagkb1wakf = array();
							foreach($Viwli5fuuqmq as $V0v00jdzt3rm) {
								$Vfndjxoeqvzy = PHPExcel_Cell::coordinateFromString($V0v00jdzt3rm);
								$Vhpqbhvmzz1d[] = PHPExcel_Cell::columnIndexFromString($Vfndjxoeqvzy[0]) - 1;
								$Vnwagkb1wakf[] = $Vfndjxoeqvzy[1];
							}
							$V4y0urwpnd3jellRef = PHPExcel_Cell::stringFromColumnIndex(min($Vhpqbhvmzz1d)).min($Vnwagkb1wakf).':'.PHPExcel_Cell::stringFromColumnIndex(max($Vhpqbhvmzz1d)).max($Vnwagkb1wakf);
							if ($Vp0mtfiyrfm5Parent !== NULL) {
								$V4y0urwpnd3jellValue = $this->extractCellRange($V4y0urwpnd3jellRef, $this->_workbook->getSheetByName($Vhutydw5an1r), FALSE);
							} else {
								return $this->_raiseFormulaError('Unable to access Cell Reference');
							}
							$Vltejvmdssgs->push('Cell Reference',$V4y0urwpnd3jellValue,$V4y0urwpnd3jellRef);
						} else {
							$Vltejvmdssgs->push('Error',PHPExcel_Calculation_Functions::REF(),NULL);
						}

						break;
					case '+'	:			
						$this->_executeNumericBinaryOperation($V4y0urwpnd3jellID,$Vlsk0dcfee55,$Vildd1o1hqvn,$Vgeu2rx5xc4wken,'plusEquals',$Vltejvmdssgs);
						break;
					case '-'	:			
						$this->_executeNumericBinaryOperation($V4y0urwpnd3jellID,$Vlsk0dcfee55,$Vildd1o1hqvn,$Vgeu2rx5xc4wken,'minusEquals',$Vltejvmdssgs);
						break;
					case '*'	:			
						$this->_executeNumericBinaryOperation($V4y0urwpnd3jellID,$Vlsk0dcfee55,$Vildd1o1hqvn,$Vgeu2rx5xc4wken,'arrayTimesEquals',$Vltejvmdssgs);
						break;
					case '/'	:			
						$this->_executeNumericBinaryOperation($V4y0urwpnd3jellID,$Vlsk0dcfee55,$Vildd1o1hqvn,$Vgeu2rx5xc4wken,'arrayRightDivide',$Vltejvmdssgs);
						break;
					case '^'	:			
						$this->_executeNumericBinaryOperation($V4y0urwpnd3jellID,$Vlsk0dcfee55,$Vildd1o1hqvn,$Vgeu2rx5xc4wken,'power',$Vltejvmdssgs);
						break;
					case '&'	:			
						
						
						
						if (is_bool($Vlsk0dcfee55)) {
							$Vlsk0dcfee55 = ($Vlsk0dcfee55) ? self::$Vylvfs0sz4ep['TRUE'] : self::$Vylvfs0sz4ep['FALSE'];
						}
						if (is_bool($Vildd1o1hqvn)) {
							$Vildd1o1hqvn = ($Vildd1o1hqvn) ? self::$Vylvfs0sz4ep['TRUE'] : self::$Vylvfs0sz4ep['FALSE'];
						}
						if ((is_array($Vlsk0dcfee55)) || (is_array($Vildd1o1hqvn))) {
							
							self::_checkMatrixOperands($Vlsk0dcfee55,$Vildd1o1hqvn,2);
							try {
								
								$Vl5loifjeez4 = new PHPExcel_Shared_JAMA_Matrix($Vlsk0dcfee55);
								
								$Vl5loifjeez4Result = $Vl5loifjeez4->concat($Vildd1o1hqvn);
								$Vwbpa3giaw5f = $Vl5loifjeez4Result->getArray();
							} catch (PHPExcel_Exception $Vnhm0uuykimvx) {
								$this->_debugLog->writeDebugLog('JAMA Matrix Exception: ', $Vnhm0uuykimvx->getMessage());
								$Vwbpa3giaw5f = '#VALUE!';
							}
						} else {
							$Vwbpa3giaw5f = '"'.str_replace('""','"',self::_unwrapResult($Vlsk0dcfee55,'"').self::_unwrapResult($Vildd1o1hqvn,'"')).'"';
						}
						$this->_debugLog->writeDebugLog('Evaluation Result is ', $this->_showTypeDetails($Vwbpa3giaw5f));
						$Vltejvmdssgs->push('Value',$Vwbpa3giaw5f);
						break;
					case '|'	:			
						$Vws44nszhvgoowIntersect = array_intersect_key($Vlsk0dcfee55,$Vildd1o1hqvn);
						$V4y0urwpnd3jellIntersect = $Vhpqbhvmzz1d = $Vnwagkb1wakf = array();
						foreach(array_keys($Vws44nszhvgoowIntersect) as $Vws44nszhvgoow) {
							$Vnwagkb1wakf[] = $Vws44nszhvgoow;
							foreach($Vws44nszhvgoowIntersect[$Vws44nszhvgoow] as $V4y0urwpnd3jol => $Vrec2f1japonata) {
								$Vhpqbhvmzz1d[] = PHPExcel_Cell::columnIndexFromString($V4y0urwpnd3jol) - 1;
								$V4y0urwpnd3jellIntersect[$Vws44nszhvgoow] = array_intersect_key($Vlsk0dcfee55[$Vws44nszhvgoow],$Vildd1o1hqvn[$Vws44nszhvgoow]);
							}
						}
						$V4y0urwpnd3jellRef = PHPExcel_Cell::stringFromColumnIndex(min($Vhpqbhvmzz1d)).min($Vnwagkb1wakf).':'.PHPExcel_Cell::stringFromColumnIndex(max($Vhpqbhvmzz1d)).max($Vnwagkb1wakf);
						$this->_debugLog->writeDebugLog('Evaluation Result is ', $this->_showTypeDetails($V4y0urwpnd3jellIntersect));
						$Vltejvmdssgs->push('Value',$V4y0urwpnd3jellIntersect,$V4y0urwpnd3jellRef);
						break;
				}

			
			} elseif (($Vgeu2rx5xc4wken === '~') || ($Vgeu2rx5xc4wken === '%')) {

				if (($Vnpssjjicvbx = $Vltejvmdssgs->pop()) === NULL) return $this->_raiseFormulaError('Internal error - Operand value missing from stack');
				$Vnpssjjicvbx = $Vnpssjjicvbx['value'];
				if ($Vgeu2rx5xc4wken === '~') {

					$this->_debugLog->writeDebugLog('Evaluating Negation of ', $this->_showValue($Vnpssjjicvbx));
					$Vc54m1cruqby = -1;
				} else {

					$this->_debugLog->writeDebugLog('Evaluating Percentile of ', $this->_showValue($Vnpssjjicvbx));
					$Vc54m1cruqby = 0.01;
				}
				if (is_array($Vnpssjjicvbx)) {
					self::_checkMatrixOperands($Vnpssjjicvbx,$Vc54m1cruqby,2);
					try {
						$Vl5loifjeez41 = new PHPExcel_Shared_JAMA_Matrix($Vnpssjjicvbx);
						$Vl5loifjeez4Result = $Vl5loifjeez41->arrayTimesEquals($Vc54m1cruqby);
						$Vwbpa3giaw5f = $Vl5loifjeez4Result->getArray();
					} catch (PHPExcel_Exception $Vnhm0uuykimvx) {
						$this->_debugLog->writeDebugLog('JAMA Matrix Exception: ', $Vnhm0uuykimvx->getMessage());
						$Vwbpa3giaw5f = '#VALUE!';
					}
					$this->_debugLog->writeDebugLog('Evaluation Result is ', $this->_showTypeDetails($Vwbpa3giaw5f));
					$Vltejvmdssgs->push('Value',$Vwbpa3giaw5f);
				} else {
					$this->_executeNumericBinaryOperation($V4y0urwpnd3jellID,$Vc54m1cruqby,$Vnpssjjicvbx,'*','arrayTimesEquals',$Vltejvmdssgs);
				}

			} elseif (preg_match('/^'.self::CALCULATION_REGEXP_CELLREF.'$/i', $Vgeu2rx5xc4wken, $Vkvvdnwtmjnqes)) {
				$V4y0urwpnd3jellRef = NULL;

				if (isset($Vkvvdnwtmjnqes[8])) {

					if ($Vp0mtfiyrfm5 === NULL) {

						$V4y0urwpnd3jellValue = PHPExcel_Calculation_Functions::REF();
					} else {
						$V4y0urwpnd3jellRef = $Vkvvdnwtmjnqes[6].$Vkvvdnwtmjnqes[7].':'.$Vkvvdnwtmjnqes[9].$Vkvvdnwtmjnqes[10];
						if ($Vkvvdnwtmjnqes[2] > '') {
							$Vkvvdnwtmjnqes[2] = trim($Vkvvdnwtmjnqes[2],"\"'");
							if ((strpos($Vkvvdnwtmjnqes[2],'[') !== FALSE) || (strpos($Vkvvdnwtmjnqes[2],']') !== FALSE)) {
								
								return $this->_raiseFormulaError('Unable to access External Workbook');
							}
							$Vkvvdnwtmjnqes[2] = trim($Vkvvdnwtmjnqes[2],"\"'");

							$this->_debugLog->writeDebugLog('Evaluating Cell Range ', $V4y0urwpnd3jellRef, ' in worksheet ', $Vkvvdnwtmjnqes[2]);
							if ($Vp0mtfiyrfm5Parent !== NULL) {
								$V4y0urwpnd3jellValue = $this->extractCellRange($V4y0urwpnd3jellRef, $this->_workbook->getSheetByName($Vkvvdnwtmjnqes[2]), FALSE);
							} else {
								return $this->_raiseFormulaError('Unable to access Cell Reference');
							}
							$this->_debugLog->writeDebugLog('Evaluation Result for cells ', $V4y0urwpnd3jellRef, ' in worksheet ', $Vkvvdnwtmjnqes[2], ' is ', $this->_showTypeDetails($V4y0urwpnd3jellValue));

						} else {

							$this->_debugLog->writeDebugLog('Evaluating Cell Range ', $V4y0urwpnd3jellRef, ' in current worksheet');
							if ($Vp0mtfiyrfm5Parent !== NULL) {
								$V4y0urwpnd3jellValue = $this->extractCellRange($V4y0urwpnd3jellRef, $Vp0mtfiyrfm5Worksheet, FALSE);
							} else {
								return $this->_raiseFormulaError('Unable to access Cell Reference');
							}
							$this->_debugLog->writeDebugLog('Evaluation Result for cells ', $V4y0urwpnd3jellRef, ' is ', $this->_showTypeDetails($V4y0urwpnd3jellValue));
						}
					}
				} else {

					if ($Vp0mtfiyrfm5 === NULL) {

						$V4y0urwpnd3jellValue = PHPExcel_Calculation_Functions::REF();
					} else {
						$V4y0urwpnd3jellRef = $Vkvvdnwtmjnqes[6].$Vkvvdnwtmjnqes[7];
						if ($Vkvvdnwtmjnqes[2] > '') {
							$Vkvvdnwtmjnqes[2] = trim($Vkvvdnwtmjnqes[2],"\"'");
							if ((strpos($Vkvvdnwtmjnqes[2],'[') !== FALSE) || (strpos($Vkvvdnwtmjnqes[2],']') !== FALSE)) {
								
								return $this->_raiseFormulaError('Unable to access External Workbook');
							}

							$this->_debugLog->writeDebugLog('Evaluating Cell ', $V4y0urwpnd3jellRef, ' in worksheet ', $Vkvvdnwtmjnqes[2]);
							if ($Vp0mtfiyrfm5Parent !== NULL) {
								$V4y0urwpnd3jellSheet = $this->_workbook->getSheetByName($Vkvvdnwtmjnqes[2]);
								if ($V4y0urwpnd3jellSheet && $V4y0urwpnd3jellSheet->cellExists($V4y0urwpnd3jellRef)) {
									$V4y0urwpnd3jellValue = $this->extractCellRange($V4y0urwpnd3jellRef, $this->_workbook->getSheetByName($Vkvvdnwtmjnqes[2]), FALSE);
									$Vp0mtfiyrfm5->attach($Vp0mtfiyrfm5Parent);
								} else {
									$V4y0urwpnd3jellValue = NULL;
								}
							} else {
								return $this->_raiseFormulaError('Unable to access Cell Reference');
							}
							$this->_debugLog->writeDebugLog('Evaluation Result for cell ', $V4y0urwpnd3jellRef, ' in worksheet ', $Vkvvdnwtmjnqes[2], ' is ', $this->_showTypeDetails($V4y0urwpnd3jellValue));

						} else {

							$this->_debugLog->writeDebugLog('Evaluating Cell ', $V4y0urwpnd3jellRef, ' in current worksheet');
							if ($Vp0mtfiyrfm5Parent->isDataSet($V4y0urwpnd3jellRef)) {
								$V4y0urwpnd3jellValue = $this->extractCellRange($V4y0urwpnd3jellRef, $Vp0mtfiyrfm5Worksheet, FALSE);
								$Vp0mtfiyrfm5->attach($Vp0mtfiyrfm5Parent);
							} else {
								$V4y0urwpnd3jellValue = NULL;
							}
							$this->_debugLog->writeDebugLog('Evaluation Result for cell ', $V4y0urwpnd3jellRef, ' is ', $this->_showTypeDetails($V4y0urwpnd3jellValue));
						}
					}
				}
				$Vltejvmdssgs->push('Value',$V4y0urwpnd3jellValue,$V4y0urwpnd3jellRef);

			
			} elseif (preg_match('/^'.self::CALCULATION_REGEXP_FUNCTION.'$/i', $Vgeu2rx5xc4wken, $Vkvvdnwtmjnqes)) {

				$Vubssx3efpnyName = $Vkvvdnwtmjnqes[1];
				$VnpssjjicvbxCount = $Vltejvmdssgs->pop();
				$VnpssjjicvbxCount = $VnpssjjicvbxCount['value'];
				if ($Vubssx3efpnyName != 'MKMATRIX') {
					$this->_debugLog->writeDebugLog('Evaluating Function ', self::_localeFunc($Vubssx3efpnyName), '() with ', (($VnpssjjicvbxCount == 0) ? 'no' : $VnpssjjicvbxCount), ' argument', (($VnpssjjicvbxCount == 1) ? '' : 's'));
				}
				if ((isset(self::$Vq0fzqejahhh[$Vubssx3efpnyName])) || (isset(self::$Vkn1gkvnkt2m[$Vubssx3efpnyName]))) {	
					if (isset(self::$Vq0fzqejahhh[$Vubssx3efpnyName])) {
						$Vubssx3efpnyCall = self::$Vq0fzqejahhh[$Vubssx3efpnyName]['functionCall'];
						$Vh5wr4ypam1i = isset(self::$Vq0fzqejahhh[$Vubssx3efpnyName]['passByReference']);
						$Viv24jwayjyw = isset(self::$Vq0fzqejahhh[$Vubssx3efpnyName]['passCellReference']);
					} elseif (isset(self::$Vkn1gkvnkt2m[$Vubssx3efpnyName])) {
						$Vubssx3efpnyCall = self::$Vkn1gkvnkt2m[$Vubssx3efpnyName]['functionCall'];
						$Vh5wr4ypam1i = isset(self::$Vkn1gkvnkt2m[$Vubssx3efpnyName]['passByReference']);
						$Viv24jwayjyw = isset(self::$Vkn1gkvnkt2m[$Vubssx3efpnyName]['passCellReference']);
					}
					

					$Vnpssjjicvbxs = $VnpssjjicvbxArrayVals = array();
					for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $VnpssjjicvbxCount; ++$Vfhiq1lhsoja) {
						$Vnpssjjicvbx = $Vltejvmdssgs->pop();
						$Vi3y3l1uvwp3 = $VnpssjjicvbxCount - $Vfhiq1lhsoja - 1;
						if (($Vh5wr4ypam1i) &&
							(isset(self::$Vq0fzqejahhh[$Vubssx3efpnyName]['passByReference'][$Vi3y3l1uvwp3])) &&
							(self::$Vq0fzqejahhh[$Vubssx3efpnyName]['passByReference'][$Vi3y3l1uvwp3])) {
							if ($Vnpssjjicvbx['reference'] === NULL) {
								$Vnpssjjicvbxs[] = $V4y0urwpnd3jellID;
								if ($Vubssx3efpnyName != 'MKMATRIX') { $VnpssjjicvbxArrayVals[] = $this->_showValue($V4y0urwpnd3jellID); }
							} else {
								$Vnpssjjicvbxs[] = $Vnpssjjicvbx['reference'];
								if ($Vubssx3efpnyName != 'MKMATRIX') { $VnpssjjicvbxArrayVals[] = $this->_showValue($Vnpssjjicvbx['reference']); }
							}
						} else {
							$Vnpssjjicvbxs[] = self::_unwrapResult($Vnpssjjicvbx['value']);
							if ($Vubssx3efpnyName != 'MKMATRIX') { $VnpssjjicvbxArrayVals[] = $this->_showValue($Vnpssjjicvbx['value']); }
						}
					}
					
					krsort($Vnpssjjicvbxs);
					if (($Vh5wr4ypam1i) && ($VnpssjjicvbxCount == 0)) {
						$Vnpssjjicvbxs[] = $V4y0urwpnd3jellID;
						$VnpssjjicvbxArrayVals[] = $this->_showValue($V4y0urwpnd3jellID);
					}



					if ($Vubssx3efpnyName != 'MKMATRIX') {
						if ($this->_debugLog->getWriteDebugLog()) {
							krsort($VnpssjjicvbxArrayVals);
							$this->_debugLog->writeDebugLog('Evaluating ', self::_localeFunc($Vubssx3efpnyName), '( ', implode(self::$Vjnosju32oqn.' ',PHPExcel_Calculation_Functions::flattenArray($VnpssjjicvbxArrayVals)), ' )');
						}
					}
					






















					
						if ($Viv24jwayjyw) {
							$Vnpssjjicvbxs[] = $Vp0mtfiyrfm5;
						}
						if (strpos($Vubssx3efpnyCall,'::') !== FALSE) {
							$Vwbpa3giaw5f = call_user_func_array(explode('::',$Vubssx3efpnyCall),$Vnpssjjicvbxs);
						} else {
							foreach($Vnpssjjicvbxs as &$Vnpssjjicvbx) {
								$Vnpssjjicvbx = PHPExcel_Calculation_Functions::flattenSingleValue($Vnpssjjicvbx);
							}
							unset($Vnpssjjicvbx);
							$Vwbpa3giaw5f = call_user_func_array($Vubssx3efpnyCall,$Vnpssjjicvbxs);
						}

					if ($Vubssx3efpnyName != 'MKMATRIX') {
						$this->_debugLog->writeDebugLog('Evaluation Result for ', self::_localeFunc($Vubssx3efpnyName), '() function call is ', $this->_showTypeDetails($Vwbpa3giaw5f));
					}
					$Vltejvmdssgs->push('Value',self::_wrapResult($Vwbpa3giaw5f));
				}

			} else {
				
				if (isset(self::$Vnt2huwkvpk0[strtoupper($Vgeu2rx5xc4wken)])) {
					$Vnhm0uuykimvxcelConstant = strtoupper($Vgeu2rx5xc4wken);

					$Vltejvmdssgs->push('Constant Value',self::$Vnt2huwkvpk0[$Vnhm0uuykimvxcelConstant]);
					$this->_debugLog->writeDebugLog('Evaluating Constant ', $Vnhm0uuykimvxcelConstant, ' as ', $this->_showTypeDetails(self::$Vnt2huwkvpk0[$Vnhm0uuykimvxcelConstant]));
				} elseif ((is_numeric($Vgeu2rx5xc4wken)) || ($Vgeu2rx5xc4wken === NULL) || (is_bool($Vgeu2rx5xc4wken)) || ($Vgeu2rx5xc4wken == '') || ($Vgeu2rx5xc4wken{0} == '"') || ($Vgeu2rx5xc4wken{0} == '#')) {

					$Vltejvmdssgs->push('Value',$Vgeu2rx5xc4wken);
				
				} elseif (preg_match('/^'.self::CALCULATION_REGEXP_NAMEDRANGE.'$/i', $Vgeu2rx5xc4wken, $Vkvvdnwtmjnqes)) {

					$Vdqyivdsly3d = $Vkvvdnwtmjnqes[6];

					$this->_debugLog->writeDebugLog('Evaluating Named Range ', $Vdqyivdsly3d);
					$V4y0urwpnd3jellValue = $this->extractNamedRange($Vdqyivdsly3d, ((NULL !== $Vp0mtfiyrfm5) ? $Vp0mtfiyrfm5Worksheet : NULL), FALSE);
					$Vp0mtfiyrfm5->attach($Vp0mtfiyrfm5Parent);
					$this->_debugLog->writeDebugLog('Evaluation Result for named range ', $Vdqyivdsly3d, ' is ', $this->_showTypeDetails($V4y0urwpnd3jellValue));
					$Vltejvmdssgs->push('Named Range',$V4y0urwpnd3jellValue,$Vdqyivdsly3d);
				} else {
					return $this->_raiseFormulaError("undefined variable '$Vgeu2rx5xc4wken'");
				}
			}
		}
		
		if ($Vltejvmdssgs->count() != 1) return $this->_raiseFormulaError("internal error");
		$Vwwmyjdeanij = $Vltejvmdssgs->pop();
		$Vwwmyjdeanij = $Vwwmyjdeanij['value'];




		return $Vwwmyjdeanij;
	}	


	private function _validateBinaryOperand($V4y0urwpnd3jellID, &$Vjuftxi2lyuberand, &$Vltejvmdssgs) {
		if (is_array($Vjuftxi2lyuberand)) {
			if ((count($Vjuftxi2lyuberand, COUNT_RECURSIVE) - count($Vjuftxi2lyuberand)) == 1) {
				do {
					$Vjuftxi2lyuberand = array_pop($Vjuftxi2lyuberand);
				} while (is_array($Vjuftxi2lyuberand));
			}
		}
		
		if (is_string($Vjuftxi2lyuberand)) {
			
			
			if ($Vjuftxi2lyuberand > '' && $Vjuftxi2lyuberand{0} == '"') { $Vjuftxi2lyuberand = self::_unwrapResult($Vjuftxi2lyuberand); }
			
			if (!is_numeric($Vjuftxi2lyuberand)) {
				
				if ($Vjuftxi2lyuberand > '' && $Vjuftxi2lyuberand{0} == '#') {
					$Vltejvmdssgs->push('Value', $Vjuftxi2lyuberand);
					$this->_debugLog->writeDebugLog('Evaluation Result is ', $this->_showTypeDetails($Vjuftxi2lyuberand));
					return FALSE;
				} elseif (!PHPExcel_Shared_String::convertToNumberIfFraction($Vjuftxi2lyuberand)) {
					
					$Vltejvmdssgs->push('Value', '#VALUE!');
					$this->_debugLog->writeDebugLog('Evaluation Result is a ', $this->_showTypeDetails('#VALUE!'));
					return FALSE;
				}
			}
		}

		
		return TRUE;
	}	


	private function _executeBinaryComparisonOperation($V4y0urwpnd3jellID, $Vlsk0dcfee55, $Vildd1o1hqvn, $Vjuftxi2lyuberation, &$Vltejvmdssgs, $Vws44nszhvgoecursingArrays=FALSE) {
		
		if ((is_array($Vlsk0dcfee55)) || (is_array($Vildd1o1hqvn))) {
			$Vwbpa3giaw5f = array();
			if ((is_array($Vlsk0dcfee55)) && (!is_array($Vildd1o1hqvn))) {
				foreach($Vlsk0dcfee55 as $V1e1eaicqarh => $Vjuftxi2lyuberandData) {
					$this->_debugLog->writeDebugLog('Evaluating Comparison ', $this->_showValue($Vjuftxi2lyuberandData), ' ', $Vjuftxi2lyuberation, ' ', $this->_showValue($Vildd1o1hqvn));
					$this->_executeBinaryComparisonOperation($V4y0urwpnd3jellID,$Vjuftxi2lyuberandData,$Vildd1o1hqvn,$Vjuftxi2lyuberation,$Vltejvmdssgs);
					$Vws44nszhvgo = $Vltejvmdssgs->pop();
					$Vwbpa3giaw5f[$V1e1eaicqarh] = $Vws44nszhvgo['value'];
				}
			} elseif ((!is_array($Vlsk0dcfee55)) && (is_array($Vildd1o1hqvn))) {
				foreach($Vildd1o1hqvn as $V1e1eaicqarh => $Vjuftxi2lyuberandData) {
					$this->_debugLog->writeDebugLog('Evaluating Comparison ', $this->_showValue($Vlsk0dcfee55), ' ', $Vjuftxi2lyuberation, ' ', $this->_showValue($Vjuftxi2lyuberandData));
					$this->_executeBinaryComparisonOperation($V4y0urwpnd3jellID,$Vlsk0dcfee55,$Vjuftxi2lyuberandData,$Vjuftxi2lyuberation,$Vltejvmdssgs);
					$Vws44nszhvgo = $Vltejvmdssgs->pop();
					$Vwbpa3giaw5f[$V1e1eaicqarh] = $Vws44nszhvgo['value'];
				}
			} else {
				if (!$Vws44nszhvgoecursingArrays) { self::_checkMatrixOperands($Vlsk0dcfee55,$Vildd1o1hqvn,2); }
				foreach($Vlsk0dcfee55 as $V1e1eaicqarh => $Vjuftxi2lyuberandData) {
					$this->_debugLog->writeDebugLog('Evaluating Comparison ', $this->_showValue($Vjuftxi2lyuberandData), ' ', $Vjuftxi2lyuberation, ' ', $this->_showValue($Vildd1o1hqvn[$V1e1eaicqarh]));
					$this->_executeBinaryComparisonOperation($V4y0urwpnd3jellID,$Vjuftxi2lyuberandData,$Vildd1o1hqvn[$V1e1eaicqarh],$Vjuftxi2lyuberation,$Vltejvmdssgs,TRUE);
					$Vws44nszhvgo = $Vltejvmdssgs->pop();
					$Vwbpa3giaw5f[$V1e1eaicqarh] = $Vws44nszhvgo['value'];
				}
			}
			
			$this->_debugLog->writeDebugLog('Comparison Evaluation Result is ', $this->_showTypeDetails($Vwbpa3giaw5f));
			
			$Vltejvmdssgs->push('Array',$Vwbpa3giaw5f);
			return TRUE;
		}

		
		if (is_string($Vlsk0dcfee55) && $Vlsk0dcfee55 > '' && $Vlsk0dcfee55{0} == '"') { $Vlsk0dcfee55 = self::_unwrapResult($Vlsk0dcfee55); }
		if (is_string($Vildd1o1hqvn) && $Vildd1o1hqvn > '' && $Vildd1o1hqvn{0} == '"') { $Vildd1o1hqvn = self::_unwrapResult($Vildd1o1hqvn); }

		
		if (PHPExcel_Calculation_Functions::getCompatibilityMode() != PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE)
		{
			if (is_string($Vlsk0dcfee55)) {
				$Vlsk0dcfee55 = strtoupper($Vlsk0dcfee55);
			}

			if (is_string($Vildd1o1hqvn)) {
				$Vildd1o1hqvn = strtoupper($Vildd1o1hqvn);
			}
		}

		$Vj0ocwa0bjii = is_string($Vlsk0dcfee55) && is_string($Vildd1o1hqvn) && PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE;

		
		switch ($Vjuftxi2lyuberation) {
			
			case '>':
				if ($Vj0ocwa0bjii) {
					$Vwbpa3giaw5f = $this->strcmpLowercaseFirst($Vlsk0dcfee55, $Vildd1o1hqvn) > 0;
				} else {
					$Vwbpa3giaw5f = ($Vlsk0dcfee55 > $Vildd1o1hqvn);
				}
				break;
			
			case '<':
				if ($Vj0ocwa0bjii) {
					$Vwbpa3giaw5f = $this->strcmpLowercaseFirst($Vlsk0dcfee55, $Vildd1o1hqvn) < 0;
				} else {
					$Vwbpa3giaw5f = ($Vlsk0dcfee55 < $Vildd1o1hqvn);
				}
				break;
			
			case '=':
				$Vwbpa3giaw5f = ($Vlsk0dcfee55 == $Vildd1o1hqvn);
				break;
			
			case '>=':
				if ($Vj0ocwa0bjii) {
					$Vwbpa3giaw5f = $this->strcmpLowercaseFirst($Vlsk0dcfee55, $Vildd1o1hqvn) >= 0;
				} else {
					$Vwbpa3giaw5f = ($Vlsk0dcfee55 >= $Vildd1o1hqvn);
				}
				break;
			
			case '<=':
				if ($Vj0ocwa0bjii) {
					$Vwbpa3giaw5f = $this->strcmpLowercaseFirst($Vlsk0dcfee55, $Vildd1o1hqvn) <= 0;
				} else {
					$Vwbpa3giaw5f = ($Vlsk0dcfee55 <= $Vildd1o1hqvn);
				}
				break;
			
			case '<>':
				$Vwbpa3giaw5f = ($Vlsk0dcfee55 != $Vildd1o1hqvn);
				break;
		}

		
		$this->_debugLog->writeDebugLog('Evaluation Result is ', $this->_showTypeDetails($Vwbpa3giaw5f));
		
		$Vltejvmdssgs->push('Value',$Vwbpa3giaw5f);
		return TRUE;
	}	

	
	private function strcmpLowercaseFirst($Vedjfytfrx4y, $Vqaug15lynl3)
	{
		$Vkg0aw223kcs = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$Vgeu2rx5xc4w = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$Vfhiq1lhsojanversedStr1 = strtr($Vedjfytfrx4y, $Vkg0aw223kcs, $Vgeu2rx5xc4w);
		$Vfhiq1lhsojanversedStr2 = strtr($Vqaug15lynl3, $Vkg0aw223kcs, $Vgeu2rx5xc4w);

		return strcmp($Vfhiq1lhsojanversedStr1, $Vfhiq1lhsojanversedStr2);
	}

	private function _executeNumericBinaryOperation($V4y0urwpnd3jellID,$Vlsk0dcfee55,$Vildd1o1hqvn,$Vjuftxi2lyuberation,$Vl5loifjeez4Function,&$Vltejvmdssgs) {
		
		if (!$this->_validateBinaryOperand($V4y0urwpnd3jellID,$Vlsk0dcfee55,$Vltejvmdssgs)) return FALSE;
		if (!$this->_validateBinaryOperand($V4y0urwpnd3jellID,$Vildd1o1hqvn,$Vltejvmdssgs)) return FALSE;

		
		
		
		if ((is_array($Vlsk0dcfee55)) || (is_array($Vildd1o1hqvn))) {
			
			self::_checkMatrixOperands($Vlsk0dcfee55, $Vildd1o1hqvn, 2);

			try {
				
				$Vl5loifjeez4 = new PHPExcel_Shared_JAMA_Matrix($Vlsk0dcfee55);
				
				$Vl5loifjeez4Result = $Vl5loifjeez4->$Vl5loifjeez4Function($Vildd1o1hqvn);
				$Vwbpa3giaw5f = $Vl5loifjeez4Result->getArray();
			} catch (PHPExcel_Exception $Vnhm0uuykimvx) {
				$this->_debugLog->writeDebugLog('JAMA Matrix Exception: ', $Vnhm0uuykimvx->getMessage());
				$Vwbpa3giaw5f = '#VALUE!';
			}
		} else {
			if ((PHPExcel_Calculation_Functions::getCompatibilityMode() != PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE) &&
				((is_string($Vlsk0dcfee55) && !is_numeric($Vlsk0dcfee55) && strlen($Vlsk0dcfee55)>0) || 
                 (is_string($Vildd1o1hqvn) && !is_numeric($Vildd1o1hqvn) && strlen($Vildd1o1hqvn)>0))) {
				$Vwbpa3giaw5f = PHPExcel_Calculation_Functions::VALUE();
			} else {
				
				switch ($Vjuftxi2lyuberation) {
					
					case '+':
						$Vwbpa3giaw5f = $Vlsk0dcfee55 + $Vildd1o1hqvn;
						break;
					
					case '-':
						$Vwbpa3giaw5f = $Vlsk0dcfee55 - $Vildd1o1hqvn;
						break;
					
					case '*':
						$Vwbpa3giaw5f = $Vlsk0dcfee55 * $Vildd1o1hqvn;
						break;
					
					case '/':
						if ($Vildd1o1hqvn == 0) {
							
							$Vltejvmdssgs->push('Value','#DIV/0!');
							$this->_debugLog->writeDebugLog('Evaluation Result is ', $this->_showTypeDetails('#DIV/0!'));
							return FALSE;
						} else {
							$Vwbpa3giaw5f = $Vlsk0dcfee55 / $Vildd1o1hqvn;
						}
						break;
					
					case '^':
						$Vwbpa3giaw5f = pow($Vlsk0dcfee55, $Vildd1o1hqvn);
						break;
				}
			}
		}

		
		$this->_debugLog->writeDebugLog('Evaluation Result is ', $this->_showTypeDetails($Vwbpa3giaw5f));
		
		$Vltejvmdssgs->push('Value',$Vwbpa3giaw5f);
		return TRUE;
	}	


	
	protected function _raiseFormulaError($Vnhm0uuykimvrrorMessage) {
		$this->formulaError = $Vnhm0uuykimvrrorMessage;
		$this->_cyclicReferenceStack->clear();
		if (!$this->suppressFormulaErrors) throw new PHPExcel_Calculation_Exception($Vnhm0uuykimvrrorMessage);
		trigger_error($Vnhm0uuykimvrrorMessage, E_USER_ERROR);
	}	


	
	public function extractCellRange(&$Vem4atrpzxcs = 'A1', PHPExcel_Worksheet $Vci1dgyyzjho = NULL, $Vqnql4pqin1i = TRUE) {
		
		$Vws44nszhvgoeturnValue = array ();


		if ($Vci1dgyyzjho !== NULL) {
			$Vci1dgyyzjhoName = $Vci1dgyyzjho->getTitle();


			if (strpos ($Vem4atrpzxcs, '!') !== false) {

				list($Vci1dgyyzjhoName,$Vem4atrpzxcs) = PHPExcel_Worksheet::extractSheetTitle($Vem4atrpzxcs, true);


				$Vci1dgyyzjho = $this->_workbook->getSheetByName($Vci1dgyyzjhoName);
			}

			
			$Vi3y3l1uvwp3References = PHPExcel_Cell::extractAllCellReferencesInRange($Vem4atrpzxcs);
			$Vem4atrpzxcs = $Vci1dgyyzjhoName.'!'.$Vem4atrpzxcs;
			if (!isset($Vi3y3l1uvwp3References[1])) {
				
				sscanf($Vi3y3l1uvwp3References[0],'%[A-Z]%d', $V4y0urwpnd3jurrentCol, $V4y0urwpnd3jurrentRow);
				$V4y0urwpnd3jellValue = NULL;
				if ($Vci1dgyyzjho->cellExists($Vi3y3l1uvwp3References[0])) {
					$Vws44nszhvgoeturnValue[$V4y0urwpnd3jurrentRow][$V4y0urwpnd3jurrentCol] = $Vci1dgyyzjho->getCell($Vi3y3l1uvwp3References[0])->getCalculatedValue($Vqnql4pqin1i);
				} else {
					$Vws44nszhvgoeturnValue[$V4y0urwpnd3jurrentRow][$V4y0urwpnd3jurrentCol] = NULL;
				}
			} else {
				
				foreach ($Vi3y3l1uvwp3References as $Vws44nszhvgoeference) {
					
					sscanf($Vws44nszhvgoeference,'%[A-Z]%d', $V4y0urwpnd3jurrentCol, $V4y0urwpnd3jurrentRow);
					$V4y0urwpnd3jellValue = NULL;
					if ($Vci1dgyyzjho->cellExists($Vws44nszhvgoeference)) {
						$Vws44nszhvgoeturnValue[$V4y0urwpnd3jurrentRow][$V4y0urwpnd3jurrentCol] = $Vci1dgyyzjho->getCell($Vws44nszhvgoeference)->getCalculatedValue($Vqnql4pqin1i);
					} else {
						$Vws44nszhvgoeturnValue[$V4y0urwpnd3jurrentRow][$V4y0urwpnd3jurrentCol] = NULL;
					}
				}
			}
		}

		
		return $Vws44nszhvgoeturnValue;
	}	


	
	public function extractNamedRange(&$Vem4atrpzxcs = 'A1', PHPExcel_Worksheet $Vci1dgyyzjho = NULL, $Vqnql4pqin1i = TRUE) {
		
		$Vws44nszhvgoeturnValue = array ();


		if ($Vci1dgyyzjho !== NULL) {
			$Vci1dgyyzjhoName = $Vci1dgyyzjho->getTitle();


			if (strpos ($Vem4atrpzxcs, '!') !== false) {

				list($Vci1dgyyzjhoName,$Vem4atrpzxcs) = PHPExcel_Worksheet::extractSheetTitle($Vem4atrpzxcs, true);


				$Vci1dgyyzjho = $this->_workbook->getSheetByName($Vci1dgyyzjhoName);
			}

			
			$Vdqyivdsly3d = PHPExcel_NamedRange::resolveRange($Vem4atrpzxcs, $Vci1dgyyzjho);
			if ($Vdqyivdsly3d !== NULL) {
				$Vci1dgyyzjho = $Vdqyivdsly3d->getWorksheet();

				$Vem4atrpzxcs = $Vdqyivdsly3d->getRange();
				$Vwx4homkl0tk = PHPExcel_Cell::splitRange($Vem4atrpzxcs);
				
				if (ctype_alpha($Vwx4homkl0tk[0][0])) {
					$Vem4atrpzxcs = $Vwx4homkl0tk[0][0] . '1:' . $Vwx4homkl0tk[0][1] . $Vdqyivdsly3d->getWorksheet()->getHighestRow();
				} elseif(ctype_digit($Vwx4homkl0tk[0][0])) {
					$Vem4atrpzxcs = 'A' . $Vwx4homkl0tk[0][0] . ':' . $Vdqyivdsly3d->getWorksheet()->getHighestColumn() . $Vwx4homkl0tk[0][1];
				}









			} else {
				return PHPExcel_Calculation_Functions::REF();
			}

			
			$Vi3y3l1uvwp3References = PHPExcel_Cell::extractAllCellReferencesInRange($Vem4atrpzxcs);

			if (!isset($Vi3y3l1uvwp3References[1])) {
				
				list($V4y0urwpnd3jurrentCol,$V4y0urwpnd3jurrentRow) = PHPExcel_Cell::coordinateFromString($Vi3y3l1uvwp3References[0]);
				$V4y0urwpnd3jellValue = NULL;
				if ($Vci1dgyyzjho->cellExists($Vi3y3l1uvwp3References[0])) {
					$Vws44nszhvgoeturnValue[$V4y0urwpnd3jurrentRow][$V4y0urwpnd3jurrentCol] = $Vci1dgyyzjho->getCell($Vi3y3l1uvwp3References[0])->getCalculatedValue($Vqnql4pqin1i);
				} else {
					$Vws44nszhvgoeturnValue[$V4y0urwpnd3jurrentRow][$V4y0urwpnd3jurrentCol] = NULL;
				}
			} else {
				
				foreach ($Vi3y3l1uvwp3References as $Vws44nszhvgoeference) {
					
					list($V4y0urwpnd3jurrentCol,$V4y0urwpnd3jurrentRow) = PHPExcel_Cell::coordinateFromString($Vws44nszhvgoeference);

					$V4y0urwpnd3jellValue = NULL;
					if ($Vci1dgyyzjho->cellExists($Vws44nszhvgoeference)) {
						$Vws44nszhvgoeturnValue[$V4y0urwpnd3jurrentRow][$V4y0urwpnd3jurrentCol] = $Vci1dgyyzjho->getCell($Vws44nszhvgoeference)->getCalculatedValue($Vqnql4pqin1i);
					} else {
						$Vws44nszhvgoeturnValue[$V4y0urwpnd3jurrentRow][$V4y0urwpnd3jurrentCol] = NULL;
					}
				}
			}


		}

		
		return $Vws44nszhvgoeturnValue;
	}	


	
	public function isImplemented($Vzuftwx1jsxl = '') {
		$Vzuftwx1jsxl = strtoupper ($Vzuftwx1jsxl);
		if (isset(self::$Vq0fzqejahhh[$Vzuftwx1jsxl])) {
			return (self::$Vq0fzqejahhh[$Vzuftwx1jsxl]['functionCall'] != 'PHPExcel_Calculation_Functions::DUMMY');
		} else {
			return FALSE;
		}
	}	


	
	public function listFunctions() {
		
		$Vws44nszhvgoeturnValue = array();
		
		foreach(self::$Vq0fzqejahhh as $Vubssx3efpnyName => $Vubssx3efpny) {
			if ($Vubssx3efpny['functionCall'] != 'PHPExcel_Calculation_Functions::DUMMY') {
				$Vws44nszhvgoeturnValue[$Vubssx3efpnyName] = new PHPExcel_Calculation_Function($Vubssx3efpny['category'],
																				$Vubssx3efpnyName,
																				$Vubssx3efpny['functionCall']
																			   );
			}
		}

		
		return $Vws44nszhvgoeturnValue;
	}	


	
	public function listAllFunctionNames() {
		return array_keys(self::$Vq0fzqejahhh);
	}	

	
	public function listFunctionNames() {
		
		$Vws44nszhvgoeturnValue = array();
		
		foreach(self::$Vq0fzqejahhh as $Vubssx3efpnyName => $Vubssx3efpny) {
			if ($Vubssx3efpny['functionCall'] != 'PHPExcel_Calculation_Functions::DUMMY') {
				$Vws44nszhvgoeturnValue[] = $Vubssx3efpnyName;
			}
		}

		
		return $Vws44nszhvgoeturnValue;
	}	

}	

