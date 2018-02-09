<?php




























class PHPExcel_Writer_Excel5_Parser
{
	
	
	
	
	
	
	const REGEX_SHEET_TITLE_UNQUOTED = '[^\*\:\/\\\\\?\[\]\+\-\% \\\'\^\&\<\>\=\,\;\#\(\)\"\{\}]+';

	
	
	
	
	const REGEX_SHEET_TITLE_QUOTED = '(([^\*\:\/\\\\\?\[\]\\\'])+|(\\\'\\\')+)+';

	
	public $V2rwuyszq0jx;

	
	public $Vebkzk1szsay;

	
	public $Vf0fjy5xstpj;

	
	public $Vef1b35scx53;

	
	public $Vovsjgt4d05n;

	
	public $Veynixuoip4l;

	
	public $Vbjwwzgeiurc;

	
	public function __construct()
	{
		$this->_current_char  = 0;
		$this->_current_token = '';       
		$this->_formula       = '';       
		$this->_lookahead     = '';       
		$this->_parse_tree    = '';       
		$this->_initializeHashes();      
		$this->_ext_sheets = array();
		$this->_references = array();
	}

	
	function _initializeHashes()
	{
		
		$this->ptg = array(
			'ptgExp'       => 0x01,
			'ptgTbl'       => 0x02,
			'ptgAdd'       => 0x03,
			'ptgSub'       => 0x04,
			'ptgMul'       => 0x05,
			'ptgDiv'       => 0x06,
			'ptgPower'     => 0x07,
			'ptgConcat'    => 0x08,
			'ptgLT'        => 0x09,
			'ptgLE'        => 0x0A,
			'ptgEQ'        => 0x0B,
			'ptgGE'        => 0x0C,
			'ptgGT'        => 0x0D,
			'ptgNE'        => 0x0E,
			'ptgIsect'     => 0x0F,
			'ptgUnion'     => 0x10,
			'ptgRange'     => 0x11,
			'ptgUplus'     => 0x12,
			'ptgUminus'    => 0x13,
			'ptgPercent'   => 0x14,
			'ptgParen'     => 0x15,
			'ptgMissArg'   => 0x16,
			'ptgStr'       => 0x17,
			'ptgAttr'      => 0x19,
			'ptgSheet'     => 0x1A,
			'ptgEndSheet'  => 0x1B,
			'ptgErr'       => 0x1C,
			'ptgBool'      => 0x1D,
			'ptgInt'       => 0x1E,
			'ptgNum'       => 0x1F,
			'ptgArray'     => 0x20,
			'ptgFunc'      => 0x21,
			'ptgFuncVar'   => 0x22,
			'ptgName'      => 0x23,
			'ptgRef'       => 0x24,
			'ptgArea'      => 0x25,
			'ptgMemArea'   => 0x26,
			'ptgMemErr'    => 0x27,
			'ptgMemNoMem'  => 0x28,
			'ptgMemFunc'   => 0x29,
			'ptgRefErr'    => 0x2A,
			'ptgAreaErr'   => 0x2B,
			'ptgRefN'      => 0x2C,
			'ptgAreaN'     => 0x2D,
			'ptgMemAreaN'  => 0x2E,
			'ptgMemNoMemN' => 0x2F,
			'ptgNameX'     => 0x39,
			'ptgRef3d'     => 0x3A,
			'ptgArea3d'    => 0x3B,
			'ptgRefErr3d'  => 0x3C,
			'ptgAreaErr3d' => 0x3D,
			'ptgArrayV'    => 0x40,
			'ptgFuncV'     => 0x41,
			'ptgFuncVarV'  => 0x42,
			'ptgNameV'     => 0x43,
			'ptgRefV'      => 0x44,
			'ptgAreaV'     => 0x45,
			'ptgMemAreaV'  => 0x46,
			'ptgMemErrV'   => 0x47,
			'ptgMemNoMemV' => 0x48,
			'ptgMemFuncV'  => 0x49,
			'ptgRefErrV'   => 0x4A,
			'ptgAreaErrV'  => 0x4B,
			'ptgRefNV'     => 0x4C,
			'ptgAreaNV'    => 0x4D,
			'ptgMemAreaNV' => 0x4E,
			'ptgMemNoMemN' => 0x4F,
			'ptgFuncCEV'   => 0x58,
			'ptgNameXV'    => 0x59,
			'ptgRef3dV'    => 0x5A,
			'ptgArea3dV'   => 0x5B,
			'ptgRefErr3dV' => 0x5C,
			'ptgAreaErr3d' => 0x5D,
			'ptgArrayA'    => 0x60,
			'ptgFuncA'     => 0x61,
			'ptgFuncVarA'  => 0x62,
			'ptgNameA'     => 0x63,
			'ptgRefA'      => 0x64,
			'ptgAreaA'     => 0x65,
			'ptgMemAreaA'  => 0x66,
			'ptgMemErrA'   => 0x67,
			'ptgMemNoMemA' => 0x68,
			'ptgMemFuncA'  => 0x69,
			'ptgRefErrA'   => 0x6A,
			'ptgAreaErrA'  => 0x6B,
			'ptgRefNA'     => 0x6C,
			'ptgAreaNA'    => 0x6D,
			'ptgMemAreaNA' => 0x6E,
			'ptgMemNoMemN' => 0x6F,
			'ptgFuncCEA'   => 0x78,
			'ptgNameXA'    => 0x79,
			'ptgRef3dA'    => 0x7A,
			'ptgArea3dA'   => 0x7B,
			'ptgRefErr3dA' => 0x7C,
			'ptgAreaErr3d' => 0x7D
			);

		
		
		
		
		
		
		
		
		
		
		
		
		
		$this->_functions = array(
			  
			  'COUNT'           => array(   0,   -1,    0,    0 ),
			  'IF'              => array(   1,   -1,    1,    0 ),
			  'ISNA'            => array(   2,    1,    1,    0 ),
			  'ISERROR'         => array(   3,    1,    1,    0 ),
			  'SUM'             => array(   4,   -1,    0,    0 ),
			  'AVERAGE'         => array(   5,   -1,    0,    0 ),
			  'MIN'             => array(   6,   -1,    0,    0 ),
			  'MAX'             => array(   7,   -1,    0,    0 ),
			  'ROW'             => array(   8,   -1,    0,    0 ),
			  'COLUMN'          => array(   9,   -1,    0,    0 ),
			  'NA'              => array(  10,    0,    0,    0 ),
			  'NPV'             => array(  11,   -1,    1,    0 ),
			  'STDEV'           => array(  12,   -1,    0,    0 ),
			  'DOLLAR'          => array(  13,   -1,    1,    0 ),
			  'FIXED'           => array(  14,   -1,    1,    0 ),
			  'SIN'             => array(  15,    1,    1,    0 ),
			  'COS'             => array(  16,    1,    1,    0 ),
			  'TAN'             => array(  17,    1,    1,    0 ),
			  'ATAN'            => array(  18,    1,    1,    0 ),
			  'PI'              => array(  19,    0,    1,    0 ),
			  'SQRT'            => array(  20,    1,    1,    0 ),
			  'EXP'             => array(  21,    1,    1,    0 ),
			  'LN'              => array(  22,    1,    1,    0 ),
			  'LOG10'           => array(  23,    1,    1,    0 ),
			  'ABS'             => array(  24,    1,    1,    0 ),
			  'INT'             => array(  25,    1,    1,    0 ),
			  'SIGN'            => array(  26,    1,    1,    0 ),
			  'ROUND'           => array(  27,    2,    1,    0 ),
			  'LOOKUP'          => array(  28,   -1,    0,    0 ),
			  'INDEX'           => array(  29,   -1,    0,    1 ),
			  'REPT'            => array(  30,    2,    1,    0 ),
			  'MID'             => array(  31,    3,    1,    0 ),
			  'LEN'             => array(  32,    1,    1,    0 ),
			  'VALUE'           => array(  33,    1,    1,    0 ),
			  'TRUE'            => array(  34,    0,    1,    0 ),
			  'FALSE'           => array(  35,    0,    1,    0 ),
			  'AND'             => array(  36,   -1,    0,    0 ),
			  'OR'              => array(  37,   -1,    0,    0 ),
			  'NOT'             => array(  38,    1,    1,    0 ),
			  'MOD'             => array(  39,    2,    1,    0 ),
			  'DCOUNT'          => array(  40,    3,    0,    0 ),
			  'DSUM'            => array(  41,    3,    0,    0 ),
			  'DAVERAGE'        => array(  42,    3,    0,    0 ),
			  'DMIN'            => array(  43,    3,    0,    0 ),
			  'DMAX'            => array(  44,    3,    0,    0 ),
			  'DSTDEV'          => array(  45,    3,    0,    0 ),
			  'VAR'             => array(  46,   -1,    0,    0 ),
			  'DVAR'            => array(  47,    3,    0,    0 ),
			  'TEXT'            => array(  48,    2,    1,    0 ),
			  'LINEST'          => array(  49,   -1,    0,    0 ),
			  'TREND'           => array(  50,   -1,    0,    0 ),
			  'LOGEST'          => array(  51,   -1,    0,    0 ),
			  'GROWTH'          => array(  52,   -1,    0,    0 ),
			  'PV'              => array(  56,   -1,    1,    0 ),
			  'FV'              => array(  57,   -1,    1,    0 ),
			  'NPER'            => array(  58,   -1,    1,    0 ),
			  'PMT'             => array(  59,   -1,    1,    0 ),
			  'RATE'            => array(  60,   -1,    1,    0 ),
			  'MIRR'            => array(  61,    3,    0,    0 ),
			  'IRR'             => array(  62,   -1,    0,    0 ),
			  'RAND'            => array(  63,    0,    1,    1 ),
			  'MATCH'           => array(  64,   -1,    0,    0 ),
			  'DATE'            => array(  65,    3,    1,    0 ),
			  'TIME'            => array(  66,    3,    1,    0 ),
			  'DAY'             => array(  67,    1,    1,    0 ),
			  'MONTH'           => array(  68,    1,    1,    0 ),
			  'YEAR'            => array(  69,    1,    1,    0 ),
			  'WEEKDAY'         => array(  70,   -1,    1,    0 ),
			  'HOUR'            => array(  71,    1,    1,    0 ),
			  'MINUTE'          => array(  72,    1,    1,    0 ),
			  'SECOND'          => array(  73,    1,    1,    0 ),
			  'NOW'             => array(  74,    0,    1,    1 ),
			  'AREAS'           => array(  75,    1,    0,    1 ),
			  'ROWS'            => array(  76,    1,    0,    1 ),
			  'COLUMNS'         => array(  77,    1,    0,    1 ),
			  'OFFSET'          => array(  78,   -1,    0,    1 ),
			  'SEARCH'          => array(  82,   -1,    1,    0 ),
			  'TRANSPOSE'       => array(  83,    1,    1,    0 ),
			  'TYPE'            => array(  86,    1,    1,    0 ),
			  'ATAN2'           => array(  97,    2,    1,    0 ),
			  'ASIN'            => array(  98,    1,    1,    0 ),
			  'ACOS'            => array(  99,    1,    1,    0 ),
			  'CHOOSE'          => array( 100,   -1,    1,    0 ),
			  'HLOOKUP'         => array( 101,   -1,    0,    0 ),
			  'VLOOKUP'         => array( 102,   -1,    0,    0 ),
			  'ISREF'           => array( 105,    1,    0,    0 ),
			  'LOG'             => array( 109,   -1,    1,    0 ),
			  'CHAR'            => array( 111,    1,    1,    0 ),
			  'LOWER'           => array( 112,    1,    1,    0 ),
			  'UPPER'           => array( 113,    1,    1,    0 ),
			  'PROPER'          => array( 114,    1,    1,    0 ),
			  'LEFT'            => array( 115,   -1,    1,    0 ),
			  'RIGHT'           => array( 116,   -1,    1,    0 ),
			  'EXACT'           => array( 117,    2,    1,    0 ),
			  'TRIM'            => array( 118,    1,    1,    0 ),
			  'REPLACE'         => array( 119,    4,    1,    0 ),
			  'SUBSTITUTE'      => array( 120,   -1,    1,    0 ),
			  'CODE'            => array( 121,    1,    1,    0 ),
			  'FIND'            => array( 124,   -1,    1,    0 ),
			  'CELL'            => array( 125,   -1,    0,    1 ),
			  'ISERR'           => array( 126,    1,    1,    0 ),
			  'ISTEXT'          => array( 127,    1,    1,    0 ),
			  'ISNUMBER'        => array( 128,    1,    1,    0 ),
			  'ISBLANK'         => array( 129,    1,    1,    0 ),
			  'T'               => array( 130,    1,    0,    0 ),
			  'N'               => array( 131,    1,    0,    0 ),
			  'DATEVALUE'       => array( 140,    1,    1,    0 ),
			  'TIMEVALUE'       => array( 141,    1,    1,    0 ),
			  'SLN'             => array( 142,    3,    1,    0 ),
			  'SYD'             => array( 143,    4,    1,    0 ),
			  'DDB'             => array( 144,   -1,    1,    0 ),
			  'INDIRECT'        => array( 148,   -1,    1,    1 ),
			  'CALL'            => array( 150,   -1,    1,    0 ),
			  'CLEAN'           => array( 162,    1,    1,    0 ),
			  'MDETERM'         => array( 163,    1,    2,    0 ),
			  'MINVERSE'        => array( 164,    1,    2,    0 ),
			  'MMULT'           => array( 165,    2,    2,    0 ),
			  'IPMT'            => array( 167,   -1,    1,    0 ),
			  'PPMT'            => array( 168,   -1,    1,    0 ),
			  'COUNTA'          => array( 169,   -1,    0,    0 ),
			  'PRODUCT'         => array( 183,   -1,    0,    0 ),
			  'FACT'            => array( 184,    1,    1,    0 ),
			  'DPRODUCT'        => array( 189,    3,    0,    0 ),
			  'ISNONTEXT'       => array( 190,    1,    1,    0 ),
			  'STDEVP'          => array( 193,   -1,    0,    0 ),
			  'VARP'            => array( 194,   -1,    0,    0 ),
			  'DSTDEVP'         => array( 195,    3,    0,    0 ),
			  'DVARP'           => array( 196,    3,    0,    0 ),
			  'TRUNC'           => array( 197,   -1,    1,    0 ),
			  'ISLOGICAL'       => array( 198,    1,    1,    0 ),
			  'DCOUNTA'         => array( 199,    3,    0,    0 ),
			  'USDOLLAR'        => array( 204,   -1,    1,    0 ),
			  'FINDB'           => array( 205,   -1,    1,    0 ),
			  'SEARCHB'         => array( 206,   -1,    1,    0 ),
			  'REPLACEB'        => array( 207,    4,    1,    0 ),
			  'LEFTB'           => array( 208,   -1,    1,    0 ),
			  'RIGHTB'          => array( 209,   -1,    1,    0 ),
			  'MIDB'            => array( 210,    3,    1,    0 ),
			  'LENB'            => array( 211,    1,    1,    0 ),
			  'ROUNDUP'         => array( 212,    2,    1,    0 ),
			  'ROUNDDOWN'       => array( 213,    2,    1,    0 ),
			  'ASC'             => array( 214,    1,    1,    0 ),
			  'DBCS'            => array( 215,    1,    1,    0 ),
			  'RANK'            => array( 216,   -1,    0,    0 ),
			  'ADDRESS'         => array( 219,   -1,    1,    0 ),
			  'DAYS360'         => array( 220,   -1,    1,    0 ),
			  'TODAY'           => array( 221,    0,    1,    1 ),
			  'VDB'             => array( 222,   -1,    1,    0 ),
			  'MEDIAN'          => array( 227,   -1,    0,    0 ),
			  'SUMPRODUCT'      => array( 228,   -1,    2,    0 ),
			  'SINH'            => array( 229,    1,    1,    0 ),
			  'COSH'            => array( 230,    1,    1,    0 ),
			  'TANH'            => array( 231,    1,    1,    0 ),
			  'ASINH'           => array( 232,    1,    1,    0 ),
			  'ACOSH'           => array( 233,    1,    1,    0 ),
			  'ATANH'           => array( 234,    1,    1,    0 ),
			  'DGET'            => array( 235,    3,    0,    0 ),
			  'INFO'            => array( 244,    1,    1,    1 ),
			  'DB'              => array( 247,   -1,    1,    0 ),
			  'FREQUENCY'       => array( 252,    2,    0,    0 ),
			  'ERROR.TYPE'      => array( 261,    1,    1,    0 ),
			  'REGISTER.ID'     => array( 267,   -1,    1,    0 ),
			  'AVEDEV'          => array( 269,   -1,    0,    0 ),
			  'BETADIST'        => array( 270,   -1,    1,    0 ),
			  'GAMMALN'         => array( 271,    1,    1,    0 ),
			  'BETAINV'         => array( 272,   -1,    1,    0 ),
			  'BINOMDIST'       => array( 273,    4,    1,    0 ),
			  'CHIDIST'         => array( 274,    2,    1,    0 ),
			  'CHIINV'          => array( 275,    2,    1,    0 ),
			  'COMBIN'          => array( 276,    2,    1,    0 ),
			  'CONFIDENCE'      => array( 277,    3,    1,    0 ),
			  'CRITBINOM'       => array( 278,    3,    1,    0 ),
			  'EVEN'            => array( 279,    1,    1,    0 ),
			  'EXPONDIST'       => array( 280,    3,    1,    0 ),
			  'FDIST'           => array( 281,    3,    1,    0 ),
			  'FINV'            => array( 282,    3,    1,    0 ),
			  'FISHER'          => array( 283,    1,    1,    0 ),
			  'FISHERINV'       => array( 284,    1,    1,    0 ),
			  'FLOOR'           => array( 285,    2,    1,    0 ),
			  'GAMMADIST'       => array( 286,    4,    1,    0 ),
			  'GAMMAINV'        => array( 287,    3,    1,    0 ),
			  'CEILING'         => array( 288,    2,    1,    0 ),
			  'HYPGEOMDIST'     => array( 289,    4,    1,    0 ),
			  'LOGNORMDIST'     => array( 290,    3,    1,    0 ),
			  'LOGINV'          => array( 291,    3,    1,    0 ),
			  'NEGBINOMDIST'    => array( 292,    3,    1,    0 ),
			  'NORMDIST'        => array( 293,    4,    1,    0 ),
			  'NORMSDIST'       => array( 294,    1,    1,    0 ),
			  'NORMINV'         => array( 295,    3,    1,    0 ),
			  'NORMSINV'        => array( 296,    1,    1,    0 ),
			  'STANDARDIZE'     => array( 297,    3,    1,    0 ),
			  'ODD'             => array( 298,    1,    1,    0 ),
			  'PERMUT'          => array( 299,    2,    1,    0 ),
			  'POISSON'         => array( 300,    3,    1,    0 ),
			  'TDIST'           => array( 301,    3,    1,    0 ),
			  'WEIBULL'         => array( 302,    4,    1,    0 ),
			  'SUMXMY2'         => array( 303,    2,    2,    0 ),
			  'SUMX2MY2'        => array( 304,    2,    2,    0 ),
			  'SUMX2PY2'        => array( 305,    2,    2,    0 ),
			  'CHITEST'         => array( 306,    2,    2,    0 ),
			  'CORREL'          => array( 307,    2,    2,    0 ),
			  'COVAR'           => array( 308,    2,    2,    0 ),
			  'FORECAST'        => array( 309,    3,    2,    0 ),
			  'FTEST'           => array( 310,    2,    2,    0 ),
			  'INTERCEPT'       => array( 311,    2,    2,    0 ),
			  'PEARSON'         => array( 312,    2,    2,    0 ),
			  'RSQ'             => array( 313,    2,    2,    0 ),
			  'STEYX'           => array( 314,    2,    2,    0 ),
			  'SLOPE'           => array( 315,    2,    2,    0 ),
			  'TTEST'           => array( 316,    4,    2,    0 ),
			  'PROB'            => array( 317,   -1,    2,    0 ),
			  'DEVSQ'           => array( 318,   -1,    0,    0 ),
			  'GEOMEAN'         => array( 319,   -1,    0,    0 ),
			  'HARMEAN'         => array( 320,   -1,    0,    0 ),
			  'SUMSQ'           => array( 321,   -1,    0,    0 ),
			  'KURT'            => array( 322,   -1,    0,    0 ),
			  'SKEW'            => array( 323,   -1,    0,    0 ),
			  'ZTEST'           => array( 324,   -1,    0,    0 ),
			  'LARGE'           => array( 325,    2,    0,    0 ),
			  'SMALL'           => array( 326,    2,    0,    0 ),
			  'QUARTILE'        => array( 327,    2,    0,    0 ),
			  'PERCENTILE'      => array( 328,    2,    0,    0 ),
			  'PERCENTRANK'     => array( 329,   -1,    0,    0 ),
			  'MODE'            => array( 330,   -1,    2,    0 ),
			  'TRIMMEAN'        => array( 331,    2,    0,    0 ),
			  'TINV'            => array( 332,    2,    1,    0 ),
			  'CONCATENATE'     => array( 336,   -1,    1,    0 ),
			  'POWER'           => array( 337,    2,    1,    0 ),
			  'RADIANS'         => array( 342,    1,    1,    0 ),
			  'DEGREES'         => array( 343,    1,    1,    0 ),
			  'SUBTOTAL'        => array( 344,   -1,    0,    0 ),
			  'SUMIF'           => array( 345,   -1,    0,    0 ),
			  'COUNTIF'         => array( 346,    2,    0,    0 ),
			  'COUNTBLANK'      => array( 347,    1,    0,    0 ),
			  'ISPMT'           => array( 350,    4,    1,    0 ),
			  'DATEDIF'         => array( 351,    3,    1,    0 ),
			  'DATESTRING'      => array( 352,    1,    1,    0 ),
			  'NUMBERSTRING'    => array( 353,    2,    1,    0 ),
			  'ROMAN'           => array( 354,   -1,    1,    0 ),
			  'GETPIVOTDATA'    => array( 358,   -1,    0,    0 ),
			  'HYPERLINK'       => array( 359,   -1,    1,    0 ),
			  'PHONETIC'        => array( 360,    1,    0,    0 ),
			  'AVERAGEA'        => array( 361,   -1,    0,    0 ),
			  'MAXA'            => array( 362,   -1,    0,    0 ),
			  'MINA'            => array( 363,   -1,    0,    0 ),
			  'STDEVPA'         => array( 364,   -1,    0,    0 ),
			  'VARPA'           => array( 365,   -1,    0,    0 ),
			  'STDEVA'          => array( 366,   -1,    0,    0 ),
			  'VARA'            => array( 367,   -1,    0,    0 ),
			  'BAHTTEXT'        => array( 368,    1,    0,    0 ),
			  );
	}

	
	function _convert($Vmrycxs3rwag)
	{
		if (preg_match("/\"([^\"]|\"\"){0,255}\"/", $Vmrycxs3rwag)) {
			return $this->_convertString($Vmrycxs3rwag);

		} elseif (is_numeric($Vmrycxs3rwag)) {
			return $this->_convertNumber($Vmrycxs3rwag);

		
		} elseif (preg_match('/^\$?([A-Ia-i]?[A-Za-z])\$?(\d+)$/',$Vmrycxs3rwag)) {
			return $this->_convertRef2d($Vmrycxs3rwag);

		
		} elseif (preg_match("/^" . self::REGEX_SHEET_TITLE_UNQUOTED . "(\:" . self::REGEX_SHEET_TITLE_UNQUOTED . ")?\!\\$?[A-Ia-i]?[A-Za-z]\\$?(\d+)$/u",$Vmrycxs3rwag)) {
			return $this->_convertRef3d($Vmrycxs3rwag);

		
		} elseif (preg_match("/^'" . self::REGEX_SHEET_TITLE_QUOTED . "(\:" . self::REGEX_SHEET_TITLE_QUOTED . ")?'\!\\$?[A-Ia-i]?[A-Za-z]\\$?(\d+)$/u",$Vmrycxs3rwag)) {
			return $this->_convertRef3d($Vmrycxs3rwag);

		
		} elseif (preg_match('/^(\$)?[A-Ia-i]?[A-Za-z](\$)?(\d+)\:(\$)?[A-Ia-i]?[A-Za-z](\$)?(\d+)$/', $Vmrycxs3rwag)) {
			return $this->_convertRange2d($Vmrycxs3rwag);

		
		} elseif (preg_match("/^" . self::REGEX_SHEET_TITLE_UNQUOTED . "(\:" . self::REGEX_SHEET_TITLE_UNQUOTED . ")?\!\\$?([A-Ia-i]?[A-Za-z])?\\$?(\d+)\:\\$?([A-Ia-i]?[A-Za-z])?\\$?(\d+)$/u",$Vmrycxs3rwag)) {
			return $this->_convertRange3d($Vmrycxs3rwag);

		
		} elseif (preg_match("/^'" . self::REGEX_SHEET_TITLE_QUOTED . "(\:" . self::REGEX_SHEET_TITLE_QUOTED . ")?'\!\\$?([A-Ia-i]?[A-Za-z])?\\$?(\d+)\:\\$?([A-Ia-i]?[A-Za-z])?\\$?(\d+)$/u",$Vmrycxs3rwag)) {
			return $this->_convertRange3d($Vmrycxs3rwag);

		
		} elseif (isset($this->ptg[$Vmrycxs3rwag])) {
			return pack("C", $this->ptg[$Vmrycxs3rwag]);

        
		} elseif (preg_match("/^#[A-Z0\/]{3,5}[!?]{1}$/", $Vmrycxs3rwag) or $Vmrycxs3rwag == '#N/A') {
		    return $this->_convertError($Vmrycxs3rwag);

		
		

		
		} elseif ($Vmrycxs3rwag == 'arg') {
			return '';
		}

		
		throw new PHPExcel_Writer_Exception("Unknown token $Vmrycxs3rwag");
	}

	
	function _convertNumber($Vcgbfu1dtv3l)
	{
		
		if ((preg_match("/^\d+$/", $Vcgbfu1dtv3l)) and ($Vcgbfu1dtv3l <= 65535)) {
			return pack("Cv", $this->ptg['ptgInt'], $Vcgbfu1dtv3l);
		} else { 
			if (PHPExcel_Writer_Excel5_BIFFwriter::getByteOrder()) { 
				$Vcgbfu1dtv3l = strrev($Vcgbfu1dtv3l);
			}
			return pack("Cd", $this->ptg['ptgNum'], $Vcgbfu1dtv3l);
		}
	}

	
	function _convertString($Vlkger5ehs4w)
	{
		
		$Vlkger5ehs4w = substr($Vlkger5ehs4w, 1, strlen($Vlkger5ehs4w) - 2);
		if (strlen($Vlkger5ehs4w) > 255) {
			throw new PHPExcel_Writer_Exception("String is too long");
		}

		return pack('C', $this->ptg['ptgStr']) . PHPExcel_Shared_String::UTF8toBIFF8UnicodeShort($Vlkger5ehs4w);
	}

	
	function _convertFunction($Vmrycxs3rwag, $Vcgbfu1dtv3l_args)
	{
		$Vrukcxz5icxf     = $this->_functions[$Vmrycxs3rwag][1];


		
		if ($Vrukcxz5icxf >= 0) {
			return pack("Cv", $this->ptg['ptgFuncV'], $this->_functions[$Vmrycxs3rwag][0]);
		}
		
		if ($Vrukcxz5icxf == -1) {
			return pack("CCv", $this->ptg['ptgFuncVarV'], $Vcgbfu1dtv3l_args, $this->_functions[$Vmrycxs3rwag][0]);
		}
	}

	
	function _convertRange2d($Votjg2jvcmjx, $Vtwwmjiiu40i=0)
	{

		
		
		if (preg_match('/^(\$)?([A-Ia-i]?[A-Za-z])(\$)?(\d+)\:(\$)?([A-Ia-i]?[A-Za-z])(\$)?(\d+)$/', $Votjg2jvcmjx)) {
			list($Vhdnd5tzcf2x, $Vekijjfc1jxp) = explode(':', $Votjg2jvcmjx);
		} else {
			
			throw new PHPExcel_Writer_Exception("Unknown range separator");
		}

		
		list($V4tod2oevpau, $V13gvb2ozw4y) = $this->_cellToPackedRowcol($Vhdnd5tzcf2x);
		list($Vtv3cquiddyx, $Vn5a404q2who) = $this->_cellToPackedRowcol($Vekijjfc1jxp);

		
		if ($Vtwwmjiiu40i == 0) {
			$Vly1f3vcpmsk = pack("C", $this->ptg['ptgArea']);
		} elseif ($Vtwwmjiiu40i == 1) {
			$Vly1f3vcpmsk = pack("C", $this->ptg['ptgAreaV']);
		} elseif ($Vtwwmjiiu40i == 2) {
			$Vly1f3vcpmsk = pack("C", $this->ptg['ptgAreaA']);
		} else {
			
			throw new PHPExcel_Writer_Exception("Unknown class $Vtwwmjiiu40i");
		}
		return $Vly1f3vcpmsk . $V4tod2oevpau . $Vtv3cquiddyx . $V13gvb2ozw4y. $Vn5a404q2who;
	}

	
	function _convertRange3d($Vmrycxs3rwag)
	{


		
		list($Vyskxl3ozast, $Votjg2jvcmjx) = explode('!', $Vmrycxs3rwag);

		
		$Vyskxl3ozast = $this->_getRefIndex($Vyskxl3ozast);

		
		list($Vhdnd5tzcf2x, $Vekijjfc1jxp) = explode(':', $Votjg2jvcmjx);

		
		if (preg_match("/^(\\$)?[A-Ia-i]?[A-Za-z](\\$)?(\d+)$/", $Vhdnd5tzcf2x)) {
			list($V4tod2oevpau, $V13gvb2ozw4y) = $this->_cellToPackedRowcol($Vhdnd5tzcf2x);
			list($Vtv3cquiddyx, $Vn5a404q2who) = $this->_cellToPackedRowcol($Vekijjfc1jxp);
		} else { 
			 list($V4tod2oevpau, $V13gvb2ozw4y, $Vtv3cquiddyx, $Vn5a404q2who) = $this->_rangeToPackedRange($Vhdnd5tzcf2x.':'.$Vekijjfc1jxp);
		}

		

			$Vly1f3vcpmsk = pack("C", $this->ptg['ptgArea3d']);








		return $Vly1f3vcpmsk . $Vyskxl3ozast . $V4tod2oevpau . $Vtv3cquiddyx . $V13gvb2ozw4y. $Vn5a404q2who;
	}

	
	function _convertRef2d($Vblc1ueqvbti)
	{


		
		$Vblc1ueqvbti_array = $this->_cellToPackedRowcol($Vblc1ueqvbti);
		list($Vexbtekafkvl, $Vswazvoa3xts) = $Vblc1ueqvbti_array;

		





			$V5e4m4jy0xwk = pack("C", $this->ptg['ptgRefA']);




		return $V5e4m4jy0xwk.$Vexbtekafkvl.$Vswazvoa3xts;
	}

	
	function _convertRef3d($Vblc1ueqvbti)
	{


		
		list($Vyskxl3ozast, $Vblc1ueqvbti) = explode('!', $Vblc1ueqvbti);

		
		$Vyskxl3ozast = $this->_getRefIndex($Vyskxl3ozast);

		
		list($Vexbtekafkvl, $Vswazvoa3xts) = $this->_cellToPackedRowcol($Vblc1ueqvbti);

		





			$V5e4m4jy0xwk = pack("C", $this->ptg['ptgRef3dA']);




		return $V5e4m4jy0xwk . $Vyskxl3ozast. $Vexbtekafkvl . $Vswazvoa3xts;
	}

    
    function _convertError($V0xzcfdwtbud)
    {
		switch ($V0xzcfdwtbud) {
			case '#NULL!':	return pack("C", 0x00);
			case '#DIV/0!':	return pack("C", 0x07);
			case '#VALUE!':	return pack("C", 0x0F);
			case '#REF!':	return pack("C", 0x17);
			case '#NAME?':	return pack("C", 0x1D);
			case '#NUM!':	return pack("C", 0x24);
			case '#N/A':	return pack("C", 0x2A);
		}
		return pack("C", 0xFF);
    }

	
	function _packExtRef($Vyskxl3ozast)
	{
		$Vyskxl3ozast = preg_replace("/^'/", '', $Vyskxl3ozast); 
		$Vyskxl3ozast = preg_replace("/'$/", '', $Vyskxl3ozast); 

		
		if (preg_match("/:/", $Vyskxl3ozast)) {
			list($Vpegl4tqbzj1, $Vy0yy21fhphx) = explode(':', $Vyskxl3ozast);

			$Vhutydw5an1r = $this->_getSheetIndex($Vpegl4tqbzj1);
			if ($Vhutydw5an1r == -1) {
				throw new PHPExcel_Writer_Exception("Unknown sheet name $Vpegl4tqbzj1 in formula");
			}
			$Vq4kwbwduuym = $this->_getSheetIndex($Vy0yy21fhphx);
			if ($Vq4kwbwduuym == -1) {
				throw new PHPExcel_Writer_Exception("Unknown sheet name $Vy0yy21fhphx in formula");
			}

			
			if ($Vhutydw5an1r > $Vq4kwbwduuym) {
				list($Vhutydw5an1r, $Vq4kwbwduuym) = array($Vq4kwbwduuym, $Vhutydw5an1r);
			}
		} else { 
			$Vhutydw5an1r = $this->_getSheetIndex($Vyskxl3ozast);
			if ($Vhutydw5an1r == -1) {
				throw new PHPExcel_Writer_Exception("Unknown sheet name $Vyskxl3ozast in formula");
			}
			$Vq4kwbwduuym = $Vhutydw5an1r;
		}

		
		$Vortqlloirgz = -1 - $Vhutydw5an1r;

		return pack('vdvv', $Vortqlloirgz, 0x00, $Vhutydw5an1r, $Vq4kwbwduuym);
	}

	
	function _getRefIndex($Vyskxl3ozast)
	{
		$Vyskxl3ozast = preg_replace("/^'/", '', $Vyskxl3ozast); 
		$Vyskxl3ozast = preg_replace("/'$/", '', $Vyskxl3ozast); 
		$Vyskxl3ozast = str_replace('\'\'', '\'', $Vyskxl3ozast); 

		
		if (preg_match("/:/", $Vyskxl3ozast)) {
			list($Vpegl4tqbzj1, $Vy0yy21fhphx) = explode(':', $Vyskxl3ozast);

			$Vhutydw5an1r = $this->_getSheetIndex($Vpegl4tqbzj1);
			if ($Vhutydw5an1r == -1) {
				throw new PHPExcel_Writer_Exception("Unknown sheet name $Vpegl4tqbzj1 in formula");
			}
			$Vq4kwbwduuym = $this->_getSheetIndex($Vy0yy21fhphx);
			if ($Vq4kwbwduuym == -1) {
				throw new PHPExcel_Writer_Exception("Unknown sheet name $Vy0yy21fhphx in formula");
			}

			
			if ($Vhutydw5an1r > $Vq4kwbwduuym) {
				list($Vhutydw5an1r, $Vq4kwbwduuym) = array($Vq4kwbwduuym, $Vhutydw5an1r);
			}
		} else { 
			$Vhutydw5an1r = $this->_getSheetIndex($Vyskxl3ozast);
			if ($Vhutydw5an1r == -1) {
				throw new PHPExcel_Writer_Exception("Unknown sheet name $Vyskxl3ozast in formula");
			}
			$Vq4kwbwduuym = $Vhutydw5an1r;
		}

		
		$Vaot5kiotcq1 = 0x00;
		$Vl1gwg0s04p2 = pack('vvv', $Vaot5kiotcq1, $Vhutydw5an1r, $Vq4kwbwduuym);
		$Vfsuzem3qkdz = count($this->_references);
		$Vx5qfylfb01c = -1;
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vfsuzem3qkdz; ++$Vfhiq1lhsoja) {
			if ($Vl1gwg0s04p2 == $this->_references[$Vfhiq1lhsoja]) {
				$Vx5qfylfb01c = $Vfhiq1lhsoja;
				break;
			}
		}
		
		if ($Vx5qfylfb01c == -1) {
			$this->_references[$Vfsuzem3qkdz] = $Vl1gwg0s04p2;
			$Vx5qfylfb01c = $Vfsuzem3qkdz;
		}

		return pack('v', $Vx5qfylfb01c);
	}

	
	function _getSheetIndex($V343ovnkmxnm)
	{
		if (!isset($this->_ext_sheets[$V343ovnkmxnm])) {
			return -1;
		} else {
			return $this->_ext_sheets[$V343ovnkmxnm];
		}
	}

	
	function setExtSheet($Vcvluzjs3wzb, $Vx5qfylfb01c)
	{
		$this->_ext_sheets[$Vcvluzjs3wzb] = $Vx5qfylfb01c;
	}

	
	function _cellToPackedRowcol($Vblc1ueqvbti)
	{
		$Vblc1ueqvbti = strtoupper($Vblc1ueqvbti);
		list($Vexbtekafkvl, $Vswazvoa3xts, $Vexbtekafkvl_rel, $Vswazvoa3xts_rel) = $this->_cellToRowcol($Vblc1ueqvbti);
		if ($Vswazvoa3xts >= 256) {
			throw new PHPExcel_Writer_Exception("Column in: $Vblc1ueqvbti greater than 255");
		}
		if ($Vexbtekafkvl >= 65536) {
			throw new PHPExcel_Writer_Exception("Row in: $Vblc1ueqvbti greater than 65536 ");
		}

		
		$Vswazvoa3xts |= $Vswazvoa3xts_rel << 14;
		$Vswazvoa3xts |= $Vexbtekafkvl_rel << 15;
		$Vswazvoa3xts = pack('v', $Vswazvoa3xts);

		$Vexbtekafkvl = pack('v', $Vexbtekafkvl);

		return array($Vexbtekafkvl, $Vswazvoa3xts);
	}

	
	function _rangeToPackedRange($Votjg2jvcmjx)
	{
		preg_match('/(\$)?(\d+)\:(\$)?(\d+)/', $Votjg2jvcmjx, $Vkvvdnwtmjnq);
		
		$V4tod2oevpau_rel = empty($Vkvvdnwtmjnq[1]) ? 1 : 0;
		$V4tod2oevpau     = $Vkvvdnwtmjnq[2];
		$Vtv3cquiddyx_rel = empty($Vkvvdnwtmjnq[3]) ? 1 : 0;
		$Vtv3cquiddyx     = $Vkvvdnwtmjnq[4];
		
		--$V4tod2oevpau;
		--$Vtv3cquiddyx;
		
		$V13gvb2ozw4y = 0;
		$Vn5a404q2who = 65535; 

		
		if (($V4tod2oevpau >= 65536) or ($Vtv3cquiddyx >= 65536)) {
			throw new PHPExcel_Writer_Exception("Row in: $Votjg2jvcmjx greater than 65536 ");
		}

		
		$V13gvb2ozw4y |= $V4tod2oevpau_rel << 15;
		$Vn5a404q2who |= $Vtv3cquiddyx_rel << 15;
		$V13gvb2ozw4y = pack('v', $V13gvb2ozw4y);
		$Vn5a404q2who = pack('v', $Vn5a404q2who);

		$V4tod2oevpau = pack('v', $V4tod2oevpau);
		$Vtv3cquiddyx = pack('v', $Vtv3cquiddyx);

		return array($V4tod2oevpau, $V13gvb2ozw4y, $Vtv3cquiddyx, $Vn5a404q2who);
	}

	
	function _cellToRowcol($Vblc1ueqvbti)
	{
		preg_match('/(\$)?([A-I]?[A-Z])(\$)?(\d+)/',$Vblc1ueqvbti,$Vkvvdnwtmjnq);
		
		$Vswazvoa3xts_rel = empty($Vkvvdnwtmjnq[1]) ? 1 : 0;
		$Vswazvoa3xts_ref = $Vkvvdnwtmjnq[2];
		$Vexbtekafkvl_rel = empty($Vkvvdnwtmjnq[3]) ? 1 : 0;
		$Vexbtekafkvl     = $Vkvvdnwtmjnq[4];

		
		$Ve04vi3rdwzv   = strlen($Vswazvoa3xts_ref) - 1;
		$Vswazvoa3xts    = 0;
		$Vswazvoa3xts_ref_length = strlen($Vswazvoa3xts_ref);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vswazvoa3xts_ref_length; ++$Vfhiq1lhsoja) {
			$Vswazvoa3xts += (ord($Vswazvoa3xts_ref{$Vfhiq1lhsoja}) - 64) * pow(26, $Ve04vi3rdwzv);
			--$Ve04vi3rdwzv;
		}

		
		--$Vexbtekafkvl;
		--$Vswazvoa3xts;

		return array($Vexbtekafkvl, $Vswazvoa3xts, $Vexbtekafkvl_rel, $Vswazvoa3xts_rel);
	}

	
	function _advance()
	{
		$Vfhiq1lhsoja = $this->_current_char;
		$Voirp5dis4xe = strlen($this->_formula);
		
		if ($Vfhiq1lhsoja < $Voirp5dis4xe) {
			while ($this->_formula{$Vfhiq1lhsoja} == " ") {
				++$Vfhiq1lhsoja;
			}

			if ($Vfhiq1lhsoja < ($Voirp5dis4xe - 1)) {
				$this->_lookahead = $this->_formula{$Vfhiq1lhsoja+1};
			}
			$Vmrycxs3rwag = '';
		}

		while ($Vfhiq1lhsoja < $Voirp5dis4xe) {
			$Vmrycxs3rwag .= $this->_formula{$Vfhiq1lhsoja};

			if ($Vfhiq1lhsoja < ($Voirp5dis4xe - 1)) {
				$this->_lookahead = $this->_formula{$Vfhiq1lhsoja+1};
			} else {
				$this->_lookahead = '';
			}

			if ($this->_match($Vmrycxs3rwag) != '') {
				
				
				
				$this->_current_char = $Vfhiq1lhsoja + 1;
				$this->_current_token = $Vmrycxs3rwag;
				return 1;
			}

			if ($Vfhiq1lhsoja < ($Voirp5dis4xe - 2)) {
				$this->_lookahead = $this->_formula{$Vfhiq1lhsoja+2};
			} else { 
				$this->_lookahead = '';
			}
			++$Vfhiq1lhsoja;
		}
		
	}

	
	function _match($Vmrycxs3rwag)
	{
		switch($Vmrycxs3rwag) {
			case "+":
			case "-":
			case "*":
			case "/":
			case "(":
			case ")":
			case ",":
			case ";":
			case ">=":
			case "<=":
			case "=":
			case "<>":
			case "^":
			case "&":
			case "%":
				return $Vmrycxs3rwag;
				break;
			case ">":
				if ($this->_lookahead == '=') { 
					break;
				}
				return $Vmrycxs3rwag;
				break;
			case "<":
				
				if (($this->_lookahead == '=') or ($this->_lookahead == '>')) {
					break;
				}
				return $Vmrycxs3rwag;
				break;
			default:
				
				if (preg_match('/^\$?[A-Ia-i]?[A-Za-z]\$?[0-9]+$/',$Vmrycxs3rwag) and
				   !preg_match("/[0-9]/",$this->_lookahead) and
				   ($this->_lookahead != ':') and ($this->_lookahead != '.') and
				   ($this->_lookahead != '!'))
				{
					return $Vmrycxs3rwag;
				}
				
				elseif (preg_match("/^" . self::REGEX_SHEET_TITLE_UNQUOTED . "(\:" . self::REGEX_SHEET_TITLE_UNQUOTED . ")?\!\\$?[A-Ia-i]?[A-Za-z]\\$?[0-9]+$/u",$Vmrycxs3rwag) and
					   !preg_match("/[0-9]/",$this->_lookahead) and
					   ($this->_lookahead != ':') and ($this->_lookahead != '.'))
				{
					return $Vmrycxs3rwag;
				}
				
				elseif (preg_match("/^'" . self::REGEX_SHEET_TITLE_QUOTED . "(\:" . self::REGEX_SHEET_TITLE_QUOTED . ")?'\!\\$?[A-Ia-i]?[A-Za-z]\\$?[0-9]+$/u",$Vmrycxs3rwag) and
					   !preg_match("/[0-9]/",$this->_lookahead) and
					   ($this->_lookahead != ':') and ($this->_lookahead != '.'))
				{
					return $Vmrycxs3rwag;
				}
				
				elseif (preg_match('/^(\$)?[A-Ia-i]?[A-Za-z](\$)?[0-9]+:(\$)?[A-Ia-i]?[A-Za-z](\$)?[0-9]+$/', $Vmrycxs3rwag) and
					   !preg_match("/[0-9]/",$this->_lookahead))
				{
					return $Vmrycxs3rwag;
				}
				
				elseif (preg_match("/^" . self::REGEX_SHEET_TITLE_UNQUOTED . "(\:" . self::REGEX_SHEET_TITLE_UNQUOTED . ")?\!\\$?([A-Ia-i]?[A-Za-z])?\\$?[0-9]+:\\$?([A-Ia-i]?[A-Za-z])?\\$?[0-9]+$/u",$Vmrycxs3rwag) and
					   !preg_match("/[0-9]/",$this->_lookahead))
				{
					return $Vmrycxs3rwag;
				}
				
				elseif (preg_match("/^'" . self::REGEX_SHEET_TITLE_QUOTED . "(\:" . self::REGEX_SHEET_TITLE_QUOTED . ")?'\!\\$?([A-Ia-i]?[A-Za-z])?\\$?[0-9]+:\\$?([A-Ia-i]?[A-Za-z])?\\$?[0-9]+$/u",$Vmrycxs3rwag) and
					   !preg_match("/[0-9]/",$this->_lookahead))
				{
					return $Vmrycxs3rwag;
				}
				
				elseif (is_numeric($Vmrycxs3rwag) and
						(!is_numeric($Vmrycxs3rwag.$this->_lookahead) or ($this->_lookahead == '')) and
						($this->_lookahead != '!') and ($this->_lookahead != ':'))
				{
					return $Vmrycxs3rwag;
				}
				
				elseif (preg_match("/\"([^\"]|\"\"){0,255}\"/",$Vmrycxs3rwag) and $this->_lookahead != '"' and (substr_count($Vmrycxs3rwag, '"')%2 == 0))
				{
					return $Vmrycxs3rwag;
				}
			    
			    elseif (preg_match("/^#[A-Z0\/]{3,5}[!?]{1}$/", $Vmrycxs3rwag) or $Vmrycxs3rwag == '#N/A')
			    {
			        return $Vmrycxs3rwag;
			    }
				
				elseif (preg_match("/^[A-Z0-9\xc0-\xdc\.]+$/i",$Vmrycxs3rwag) and ($this->_lookahead == "("))
				{
					return $Vmrycxs3rwag;
				}
				
				
				elseif(substr($Vmrycxs3rwag,-1) == ')') {
					return $Vmrycxs3rwag;
				}
				return '';
		}
	}

	
	function parse($V22ivdjjfdx2)
	{
		$this->_current_char = 0;
		$this->_formula      = $V22ivdjjfdx2;
		$this->_lookahead    = isset($V22ivdjjfdx2{1}) ? $V22ivdjjfdx2{1} : '';
		$this->_advance();
		$this->_parse_tree   = $this->_condition();
		return true;
	}

	
	function _condition()
	{
		$Vwbpa3giaw5f = $this->_expression();
		if ($this->_current_token == "<") {
			$this->_advance();
			$Vwbpa3giaw5f2 = $this->_expression();
			$Vwbpa3giaw5f = $this->_createTree('ptgLT', $Vwbpa3giaw5f, $Vwbpa3giaw5f2);
		} elseif ($this->_current_token == ">") {
			$this->_advance();
			$Vwbpa3giaw5f2 = $this->_expression();
			$Vwbpa3giaw5f = $this->_createTree('ptgGT', $Vwbpa3giaw5f, $Vwbpa3giaw5f2);
		} elseif ($this->_current_token == "<=") {
			$this->_advance();
			$Vwbpa3giaw5f2 = $this->_expression();
			$Vwbpa3giaw5f = $this->_createTree('ptgLE', $Vwbpa3giaw5f, $Vwbpa3giaw5f2);
		} elseif ($this->_current_token == ">=") {
			$this->_advance();
			$Vwbpa3giaw5f2 = $this->_expression();
			$Vwbpa3giaw5f = $this->_createTree('ptgGE', $Vwbpa3giaw5f, $Vwbpa3giaw5f2);
		} elseif ($this->_current_token == "=") {
			$this->_advance();
			$Vwbpa3giaw5f2 = $this->_expression();
			$Vwbpa3giaw5f = $this->_createTree('ptgEQ', $Vwbpa3giaw5f, $Vwbpa3giaw5f2);
		} elseif ($this->_current_token == "<>") {
			$this->_advance();
			$Vwbpa3giaw5f2 = $this->_expression();
			$Vwbpa3giaw5f = $this->_createTree('ptgNE', $Vwbpa3giaw5f, $Vwbpa3giaw5f2);
		} elseif ($this->_current_token == "&") {
		    $this->_advance();
		    $Vwbpa3giaw5f2 = $this->_expression();
		    $Vwbpa3giaw5f = $this->_createTree('ptgConcat', $Vwbpa3giaw5f, $Vwbpa3giaw5f2);
		}
		return $Vwbpa3giaw5f;
	}

	
	function _expression()
	{
		
		if (preg_match("/\"([^\"]|\"\"){0,255}\"/", $this->_current_token)) {
			$Vdln1z2oxpjs = str_replace('""', '"', $this->_current_token);
			if (($Vdln1z2oxpjs == '"') || ($Vdln1z2oxpjs == '')) $Vdln1z2oxpjs = '""';	
			$Vwbpa3giaw5f = $this->_createTree($Vdln1z2oxpjs, '', '');
			$this->_advance();
			return $Vwbpa3giaw5f;
        
        } elseif (preg_match("/^#[A-Z0\/]{3,5}[!?]{1}$/", $this->_current_token) or $this->_current_token == '#N/A'){
		    $Vwbpa3giaw5f = $this->_createTree($this->_current_token, 'ptgErr', '');
		    $this->_advance();
		    return $Vwbpa3giaw5f;
		
        } elseif ($this->_current_token == "-") {
			
			$this->_advance();
			$Vwbpa3giaw5f2 = $this->_expression();
			$Vwbpa3giaw5f = $this->_createTree('ptgUminus', $Vwbpa3giaw5f2, '');
			return $Vwbpa3giaw5f;
        
		} elseif ($this->_current_token == "+") {
			
			$this->_advance();
			$Vwbpa3giaw5f2 = $this->_expression();
			$Vwbpa3giaw5f = $this->_createTree('ptgUplus', $Vwbpa3giaw5f2, '');
			return $Vwbpa3giaw5f;
		}
		$Vwbpa3giaw5f = $this->_term();
		while (($this->_current_token == "+") or
			   ($this->_current_token == "-") or
			   ($this->_current_token == "^")) {
		
			if ($this->_current_token == "+") {
				$this->_advance();
				$Vwbpa3giaw5f2 = $this->_term();
				$Vwbpa3giaw5f = $this->_createTree('ptgAdd', $Vwbpa3giaw5f, $Vwbpa3giaw5f2);
			} elseif ($this->_current_token == "-") {
				$this->_advance();
				$Vwbpa3giaw5f2 = $this->_term();
				$Vwbpa3giaw5f = $this->_createTree('ptgSub', $Vwbpa3giaw5f, $Vwbpa3giaw5f2);
			} else {
				$this->_advance();
				$Vwbpa3giaw5f2 = $this->_term();
				$Vwbpa3giaw5f = $this->_createTree('ptgPower', $Vwbpa3giaw5f, $Vwbpa3giaw5f2);
			}
		}
		return $Vwbpa3giaw5f;
	}

	
	function _parenthesizedExpression()
	{
		$Vwbpa3giaw5f = $this->_createTree('ptgParen', $this->_expression(), '');
		return $Vwbpa3giaw5f;
	}

	
	function _term()
	{
		$Vwbpa3giaw5f = $this->_fact();
		while (($this->_current_token == "*") or
			   ($this->_current_token == "/")) {
		
			if ($this->_current_token == "*") {
				$this->_advance();
				$Vwbpa3giaw5f2 = $this->_fact();
				$Vwbpa3giaw5f = $this->_createTree('ptgMul', $Vwbpa3giaw5f, $Vwbpa3giaw5f2);
			} else {
				$this->_advance();
				$Vwbpa3giaw5f2 = $this->_fact();
				$Vwbpa3giaw5f = $this->_createTree('ptgDiv', $Vwbpa3giaw5f, $Vwbpa3giaw5f2);
			}
		}
		return $Vwbpa3giaw5f;
	}

	
	function _fact()
	{
		if ($this->_current_token == "(") {
			$this->_advance();         
			$Vwbpa3giaw5f = $this->_parenthesizedExpression();
			if ($this->_current_token != ")") {
				throw new PHPExcel_Writer_Exception("')' token expected.");
			}
			$this->_advance();         
			return $Vwbpa3giaw5f;
		}
		
		if (preg_match('/^\$?[A-Ia-i]?[A-Za-z]\$?[0-9]+$/',$this->_current_token))
		{
			$Vwbpa3giaw5f = $this->_createTree($this->_current_token, '', '');
			$this->_advance();
			return $Vwbpa3giaw5f;
		}
		
		elseif (preg_match("/^" . self::REGEX_SHEET_TITLE_UNQUOTED . "(\:" . self::REGEX_SHEET_TITLE_UNQUOTED . ")?\!\\$?[A-Ia-i]?[A-Za-z]\\$?[0-9]+$/u",$this->_current_token))
		{
			$Vwbpa3giaw5f = $this->_createTree($this->_current_token, '', '');
			$this->_advance();
			return $Vwbpa3giaw5f;
		}
		
		elseif (preg_match("/^'" . self::REGEX_SHEET_TITLE_QUOTED . "(\:" . self::REGEX_SHEET_TITLE_QUOTED . ")?'\!\\$?[A-Ia-i]?[A-Za-z]\\$?[0-9]+$/u",$this->_current_token))
		{
			$Vwbpa3giaw5f = $this->_createTree($this->_current_token, '', '');
			$this->_advance();
			return $Vwbpa3giaw5f;
		}
		
		elseif (preg_match('/^(\$)?[A-Ia-i]?[A-Za-z](\$)?[0-9]+:(\$)?[A-Ia-i]?[A-Za-z](\$)?[0-9]+$/',$this->_current_token) or
				preg_match('/^(\$)?[A-Ia-i]?[A-Za-z](\$)?[0-9]+\.\.(\$)?[A-Ia-i]?[A-Za-z](\$)?[0-9]+$/',$this->_current_token))
		{
			
			$Vwbpa3giaw5f = $this->_createTree($this->_current_token, '', '');
			$this->_advance();
			return $Vwbpa3giaw5f;
		}
		
		elseif (preg_match("/^" . self::REGEX_SHEET_TITLE_UNQUOTED . "(\:" . self::REGEX_SHEET_TITLE_UNQUOTED . ")?\!\\$?([A-Ia-i]?[A-Za-z])?\\$?[0-9]+:\\$?([A-Ia-i]?[A-Za-z])?\\$?[0-9]+$/u",$this->_current_token))
		{
			
			
			$Vwbpa3giaw5f = $this->_createTree($this->_current_token, '', '');
			$this->_advance();
			return $Vwbpa3giaw5f;
		}
		
		elseif (preg_match("/^'" . self::REGEX_SHEET_TITLE_QUOTED . "(\:" . self::REGEX_SHEET_TITLE_QUOTED . ")?'\!\\$?([A-Ia-i]?[A-Za-z])?\\$?[0-9]+:\\$?([A-Ia-i]?[A-Za-z])?\\$?[0-9]+$/u",$this->_current_token))
		{
			
			
			$Vwbpa3giaw5f = $this->_createTree($this->_current_token, '', '');
			$this->_advance();
			return $Vwbpa3giaw5f;
		}
		
		elseif (is_numeric($this->_current_token))
		{
		    if($this->_lookahead == '%'){
		        $Vwbpa3giaw5f = $this->_createTree('ptgPercent', $this->_current_token, '');
                $this->_advance();  
		    } else {
		        $Vwbpa3giaw5f = $this->_createTree($this->_current_token, '', '');
		    }
		    $this->_advance();
		    return $Vwbpa3giaw5f;
		}
		
		elseif (preg_match("/^[A-Z0-9\xc0-\xdc\.]+$/i",$this->_current_token))
		{
			$Vwbpa3giaw5f = $this->_func();
			return $Vwbpa3giaw5f;
		}
		throw new PHPExcel_Writer_Exception("Syntax error: ".$this->_current_token.
								 ", lookahead: ".$this->_lookahead.
								 ", current char: ".$this->_current_char);
	}

	
	function _func()
	{
		$Vcgbfu1dtv3l_args = 0; 
		$Vubssx3efpny = strtoupper($this->_current_token);
		$Vwbpa3giaw5f   = ''; 
		$this->_advance();
		$this->_advance();         
		while ($this->_current_token != ')') {
		
			if ($Vcgbfu1dtv3l_args > 0) {
				if ($this->_current_token == "," or
					$this->_current_token == ";")
				{
					$this->_advance();  
				} else {
					throw new PHPExcel_Writer_Exception("Syntax error: comma expected in ".
									  "function $Vubssx3efpny, arg #{$Vcgbfu1dtv3l_args}");
				}
				$Vwbpa3giaw5f2 = $this->_condition();
				$Vwbpa3giaw5f = $this->_createTree('arg', $Vwbpa3giaw5f, $Vwbpa3giaw5f2);
			} else { 
				$Vwbpa3giaw5f2 = $this->_condition();
				$Vwbpa3giaw5f = $this->_createTree('arg', '', $Vwbpa3giaw5f2);
			}
			++$Vcgbfu1dtv3l_args;
		}
		if (!isset($this->_functions[$Vubssx3efpny])) {
			throw new PHPExcel_Writer_Exception("Function $Vubssx3efpny() doesn't exist");
		}
		$Vrukcxz5icxf = $this->_functions[$Vubssx3efpny][1];
		
		if (($Vrukcxz5icxf >= 0) and ($Vrukcxz5icxf != $Vcgbfu1dtv3l_args)) {
			throw new PHPExcel_Writer_Exception("Incorrect number of arguments in function $Vubssx3efpny() ");
		}

		$Vwbpa3giaw5f = $this->_createTree($Vubssx3efpny, $Vwbpa3giaw5f, $Vcgbfu1dtv3l_args);
		$this->_advance();         
		return $Vwbpa3giaw5f;
	}

	
	function _createTree($Vp4xjtpabm0l, $Vrce0gsxjgkc, $Vqyn43hpxtm0)
	{
		return array('value' => $Vp4xjtpabm0l, 'left' => $Vrce0gsxjgkc, 'right' => $Vqyn43hpxtm0);
	}

	
	function toReversePolish($Vpnxy30x1asc = array())
	{
		$V25lf4phwncl = ""; 
		if (empty($Vpnxy30x1asc)) { 
			$Vpnxy30x1asc = $this->_parse_tree;
		}

		if (is_array($Vpnxy30x1asc['left'])) {
			$Vdv1qrkjge2d = $this->toReversePolish($Vpnxy30x1asc['left']);
			$V25lf4phwncl .= $Vdv1qrkjge2d;
		} elseif ($Vpnxy30x1asc['left'] != '') { 
			$Vdv1qrkjge2d = $this->_convert($Vpnxy30x1asc['left']);
			$V25lf4phwncl .= $Vdv1qrkjge2d;
		}
		if (is_array($Vpnxy30x1asc['right'])) {
			$Vdv1qrkjge2d = $this->toReversePolish($Vpnxy30x1asc['right']);
			$V25lf4phwncl .= $Vdv1qrkjge2d;
		} elseif ($Vpnxy30x1asc['right'] != '') { 
			$Vdv1qrkjge2d = $this->_convert($Vpnxy30x1asc['right']);
			$V25lf4phwncl .= $Vdv1qrkjge2d;
		}
		
		if (preg_match("/^[A-Z0-9\xc0-\xdc\.]+$/",$Vpnxy30x1asc['value']) and
			!preg_match('/^([A-Ia-i]?[A-Za-z])(\d+)$/',$Vpnxy30x1asc['value']) and
			!preg_match("/^[A-Ia-i]?[A-Za-z](\d+)\.\.[A-Ia-i]?[A-Za-z](\d+)$/",$Vpnxy30x1asc['value']) and
			!is_numeric($Vpnxy30x1asc['value']) and
			!isset($this->ptg[$Vpnxy30x1asc['value']]))
		{
			
			if ($Vpnxy30x1asc['left'] != '') {
				$Vrce0gsxjgkc_tree = $this->toReversePolish($Vpnxy30x1asc['left']);
			} else {
				$Vrce0gsxjgkc_tree = '';
			}
			
			return $Vrce0gsxjgkc_tree.$this->_convertFunction($Vpnxy30x1asc['value'], $Vpnxy30x1asc['right']);
		} else {
			$Vdv1qrkjge2d = $this->_convert($Vpnxy30x1asc['value']);
		}
		$V25lf4phwncl .= $Vdv1qrkjge2d;
		return $V25lf4phwncl;
	}

}
