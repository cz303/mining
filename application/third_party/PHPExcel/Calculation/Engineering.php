<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}



define('EULER', 2.71828182845904523536);



class PHPExcel_Calculation_Engineering {

	
	private static $Vwy22sq054y5 = array( 'g'		=> array(	'Group'	=> 'Mass',			'Unit Name'	=> 'Gram',						'AllowPrefix'	=> True		),
											  'sg'		=> array(	'Group'	=> 'Mass',			'Unit Name'	=> 'Slug',						'AllowPrefix'	=> False	),
											  'lbm'		=> array(	'Group'	=> 'Mass',			'Unit Name'	=> 'Pound mass (avoirdupois)',	'AllowPrefix'	=> False	),
											  'u'		=> array(	'Group'	=> 'Mass',			'Unit Name'	=> 'U (atomic mass unit)',		'AllowPrefix'	=> True		),
											  'ozm'		=> array(	'Group'	=> 'Mass',			'Unit Name'	=> 'Ounce mass (avoirdupois)',	'AllowPrefix'	=> False	),
											  'm'		=> array(	'Group'	=> 'Distance',		'Unit Name'	=> 'Meter',						'AllowPrefix'	=> True		),
											  'mi'		=> array(	'Group'	=> 'Distance',		'Unit Name'	=> 'Statute mile',				'AllowPrefix'	=> False	),
											  'Nmi'		=> array(	'Group'	=> 'Distance',		'Unit Name'	=> 'Nautical mile',				'AllowPrefix'	=> False	),
											  'in'		=> array(	'Group'	=> 'Distance',		'Unit Name'	=> 'Inch',						'AllowPrefix'	=> False	),
											  'ft'		=> array(	'Group'	=> 'Distance',		'Unit Name'	=> 'Foot',						'AllowPrefix'	=> False	),
											  'yd'		=> array(	'Group'	=> 'Distance',		'Unit Name'	=> 'Yard',						'AllowPrefix'	=> False	),
											  'ang'		=> array(	'Group'	=> 'Distance',		'Unit Name'	=> 'Angstrom',					'AllowPrefix'	=> True		),
											  'Pica'	=> array(	'Group'	=> 'Distance',		'Unit Name'	=> 'Pica (1/72 in)',			'AllowPrefix'	=> False	),
											  'yr'		=> array(	'Group'	=> 'Time',			'Unit Name'	=> 'Year',						'AllowPrefix'	=> False	),
											  'day'		=> array(	'Group'	=> 'Time',			'Unit Name'	=> 'Day',						'AllowPrefix'	=> False	),
											  'hr'		=> array(	'Group'	=> 'Time',			'Unit Name'	=> 'Hour',						'AllowPrefix'	=> False	),
											  'mn'		=> array(	'Group'	=> 'Time',			'Unit Name'	=> 'Minute',					'AllowPrefix'	=> False	),
											  'sec'		=> array(	'Group'	=> 'Time',			'Unit Name'	=> 'Second',					'AllowPrefix'	=> True		),
											  'Pa'		=> array(	'Group'	=> 'Pressure',		'Unit Name'	=> 'Pascal',					'AllowPrefix'	=> True		),
											  'p'		=> array(	'Group'	=> 'Pressure',		'Unit Name'	=> 'Pascal',					'AllowPrefix'	=> True		),
											  'atm'		=> array(	'Group'	=> 'Pressure',		'Unit Name'	=> 'Atmosphere',				'AllowPrefix'	=> True		),
											  'at'		=> array(	'Group'	=> 'Pressure',		'Unit Name'	=> 'Atmosphere',				'AllowPrefix'	=> True		),
											  'mmHg'	=> array(	'Group'	=> 'Pressure',		'Unit Name'	=> 'mm of Mercury',				'AllowPrefix'	=> True		),
											  'N'		=> array(	'Group'	=> 'Force',			'Unit Name'	=> 'Newton',					'AllowPrefix'	=> True		),
											  'dyn'		=> array(	'Group'	=> 'Force',			'Unit Name'	=> 'Dyne',						'AllowPrefix'	=> True		),
											  'dy'		=> array(	'Group'	=> 'Force',			'Unit Name'	=> 'Dyne',						'AllowPrefix'	=> True		),
											  'lbf'		=> array(	'Group'	=> 'Force',			'Unit Name'	=> 'Pound force',				'AllowPrefix'	=> False	),
											  'J'		=> array(	'Group'	=> 'Energy',		'Unit Name'	=> 'Joule',						'AllowPrefix'	=> True		),
											  'e'		=> array(	'Group'	=> 'Energy',		'Unit Name'	=> 'Erg',						'AllowPrefix'	=> True		),
											  'c'		=> array(	'Group'	=> 'Energy',		'Unit Name'	=> 'Thermodynamic calorie',		'AllowPrefix'	=> True		),
											  'cal'		=> array(	'Group'	=> 'Energy',		'Unit Name'	=> 'IT calorie',				'AllowPrefix'	=> True		),
											  'eV'		=> array(	'Group'	=> 'Energy',		'Unit Name'	=> 'Electron volt',				'AllowPrefix'	=> True		),
											  'ev'		=> array(	'Group'	=> 'Energy',		'Unit Name'	=> 'Electron volt',				'AllowPrefix'	=> True		),
											  'HPh'		=> array(	'Group'	=> 'Energy',		'Unit Name'	=> 'Horsepower-hour',			'AllowPrefix'	=> False	),
											  'hh'		=> array(	'Group'	=> 'Energy',		'Unit Name'	=> 'Horsepower-hour',			'AllowPrefix'	=> False	),
											  'Wh'		=> array(	'Group'	=> 'Energy',		'Unit Name'	=> 'Watt-hour',					'AllowPrefix'	=> True		),
											  'wh'		=> array(	'Group'	=> 'Energy',		'Unit Name'	=> 'Watt-hour',					'AllowPrefix'	=> True		),
											  'flb'		=> array(	'Group'	=> 'Energy',		'Unit Name'	=> 'Foot-pound',				'AllowPrefix'	=> False	),
											  'BTU'		=> array(	'Group'	=> 'Energy',		'Unit Name'	=> 'BTU',						'AllowPrefix'	=> False	),
											  'btu'		=> array(	'Group'	=> 'Energy',		'Unit Name'	=> 'BTU',						'AllowPrefix'	=> False	),
											  'HP'		=> array(	'Group'	=> 'Power',			'Unit Name'	=> 'Horsepower',				'AllowPrefix'	=> False	),
											  'h'		=> array(	'Group'	=> 'Power',			'Unit Name'	=> 'Horsepower',				'AllowPrefix'	=> False	),
											  'W'		=> array(	'Group'	=> 'Power',			'Unit Name'	=> 'Watt',						'AllowPrefix'	=> True		),
											  'w'		=> array(	'Group'	=> 'Power',			'Unit Name'	=> 'Watt',						'AllowPrefix'	=> True		),
											  'T'		=> array(	'Group'	=> 'Magnetism',		'Unit Name'	=> 'Tesla',						'AllowPrefix'	=> True		),
											  'ga'		=> array(	'Group'	=> 'Magnetism',		'Unit Name'	=> 'Gauss',						'AllowPrefix'	=> True		),
											  'C'		=> array(	'Group'	=> 'Temperature',	'Unit Name'	=> 'Celsius',					'AllowPrefix'	=> False	),
											  'cel'		=> array(	'Group'	=> 'Temperature',	'Unit Name'	=> 'Celsius',					'AllowPrefix'	=> False	),
											  'F'		=> array(	'Group'	=> 'Temperature',	'Unit Name'	=> 'Fahrenheit',				'AllowPrefix'	=> False	),
											  'fah'		=> array(	'Group'	=> 'Temperature',	'Unit Name'	=> 'Fahrenheit',				'AllowPrefix'	=> False	),
											  'K'		=> array(	'Group'	=> 'Temperature',	'Unit Name'	=> 'Kelvin',					'AllowPrefix'	=> False	),
											  'kel'		=> array(	'Group'	=> 'Temperature',	'Unit Name'	=> 'Kelvin',					'AllowPrefix'	=> False	),
											  'tsp'		=> array(	'Group'	=> 'Liquid',		'Unit Name'	=> 'Teaspoon',					'AllowPrefix'	=> False	),
											  'tbs'		=> array(	'Group'	=> 'Liquid',		'Unit Name'	=> 'Tablespoon',				'AllowPrefix'	=> False	),
											  'oz'		=> array(	'Group'	=> 'Liquid',		'Unit Name'	=> 'Fluid Ounce',				'AllowPrefix'	=> False	),
											  'cup'		=> array(	'Group'	=> 'Liquid',		'Unit Name'	=> 'Cup',						'AllowPrefix'	=> False	),
											  'pt'		=> array(	'Group'	=> 'Liquid',		'Unit Name'	=> 'U.S. Pint',					'AllowPrefix'	=> False	),
											  'us_pt'	=> array(	'Group'	=> 'Liquid',		'Unit Name'	=> 'U.S. Pint',					'AllowPrefix'	=> False	),
											  'uk_pt'	=> array(	'Group'	=> 'Liquid',		'Unit Name'	=> 'U.K. Pint',					'AllowPrefix'	=> False	),
											  'qt'		=> array(	'Group'	=> 'Liquid',		'Unit Name'	=> 'Quart',						'AllowPrefix'	=> False	),
											  'gal'		=> array(	'Group'	=> 'Liquid',		'Unit Name'	=> 'Gallon',					'AllowPrefix'	=> False	),
											  'l'		=> array(	'Group'	=> 'Liquid',		'Unit Name'	=> 'Litre',						'AllowPrefix'	=> True		),
											  'lt'		=> array(	'Group'	=> 'Liquid',		'Unit Name'	=> 'Litre',						'AllowPrefix'	=> True		)
											);

	
	private static $Vklqsirnm5cd = array(	'Y'	=> array(	'multiplier'	=> 1E24,	'name'	=> 'yotta'	),
													'Z'	=> array(	'multiplier'	=> 1E21,	'name'	=> 'zetta'	),
													'E'	=> array(	'multiplier'	=> 1E18,	'name'	=> 'exa'	),
													'P'	=> array(	'multiplier'	=> 1E15,	'name'	=> 'peta'	),
													'T'	=> array(	'multiplier'	=> 1E12,	'name'	=> 'tera'	),
													'G'	=> array(	'multiplier'	=> 1E9,		'name'	=> 'giga'	),
													'M'	=> array(	'multiplier'	=> 1E6,		'name'	=> 'mega'	),
													'k'	=> array(	'multiplier'	=> 1E3,		'name'	=> 'kilo'	),
													'h'	=> array(	'multiplier'	=> 1E2,		'name'	=> 'hecto'	),
													'e'	=> array(	'multiplier'	=> 1E1,		'name'	=> 'deka'	),
													'd'	=> array(	'multiplier'	=> 1E-1,	'name'	=> 'deci'	),
													'c'	=> array(	'multiplier'	=> 1E-2,	'name'	=> 'centi'	),
													'm'	=> array(	'multiplier'	=> 1E-3,	'name'	=> 'milli'	),
													'u'	=> array(	'multiplier'	=> 1E-6,	'name'	=> 'micro'	),
													'n'	=> array(	'multiplier'	=> 1E-9,	'name'	=> 'nano'	),
													'p'	=> array(	'multiplier'	=> 1E-12,	'name'	=> 'pico'	),
													'f'	=> array(	'multiplier'	=> 1E-15,	'name'	=> 'femto'	),
													'a'	=> array(	'multiplier'	=> 1E-18,	'name'	=> 'atto'	),
													'z'	=> array(	'multiplier'	=> 1E-21,	'name'	=> 'zepto'	),
													'y'	=> array(	'multiplier'	=> 1E-24,	'name'	=> 'yocto'	)
												 );

	
	private static $V2d1uzitje3b = array(	'Mass'		=> array(	'g'		=> array(	'g'		=> 1.0,
																							'sg'	=> 6.85220500053478E-05,
																							'lbm'	=> 2.20462291469134E-03,
																							'u'		=> 6.02217000000000E+23,
																							'ozm'	=> 3.52739718003627E-02
																						),
																		'sg'	=> array(	'g'		=> 1.45938424189287E+04,
																							'sg'	=> 1.0,
																							'lbm'	=> 3.21739194101647E+01,
																							'u'		=> 8.78866000000000E+27,
																							'ozm'	=> 5.14782785944229E+02
																						),
																		'lbm'	=> array(	'g'		=> 4.5359230974881148E+02,
																							'sg'	=> 3.10810749306493E-02,
																							'lbm'	=> 1.0,
																							'u'		=> 2.73161000000000E+26,
																							'ozm'	=> 1.60000023429410E+01
																						),
																		'u'		=> array(	'g'		=> 1.66053100460465E-24,
																							'sg'	=> 1.13782988532950E-28,
																							'lbm'	=> 3.66084470330684E-27,
																							'u'		=> 1.0,
																							'ozm'	=> 5.85735238300524E-26
																						),
																		'ozm'	=> array(	'g'		=> 2.83495152079732E+01,
																							'sg'	=> 1.94256689870811E-03,
																							'lbm'	=> 6.24999908478882E-02,
																							'u'		=> 1.70725600000000E+25,
																							'ozm'	=> 1.0
																						)
																	),
												'Distance'	=> array(	'm'		=> array(	'm'		=> 1.0,
																							'mi'	=> 6.21371192237334E-04,
																							'Nmi'	=> 5.39956803455724E-04,
																							'in'	=> 3.93700787401575E+01,
																							'ft'	=> 3.28083989501312E+00,
																							'yd'	=> 1.09361329797891E+00,
																							'ang'	=> 1.00000000000000E+10,
																							'Pica'	=> 2.83464566929116E+03
																						),
																		'mi'	=> array(	'm'		=> 1.60934400000000E+03,
																							'mi'	=> 1.0,
																							'Nmi'	=> 8.68976241900648E-01,
																							'in'	=> 6.33600000000000E+04,
																							'ft'	=> 5.28000000000000E+03,
																							'yd'	=> 1.76000000000000E+03,
																							'ang'	=> 1.60934400000000E+13,
																							'Pica'	=> 4.56191999999971E+06
																						),
																		'Nmi'	=> array(	'm'		=> 1.85200000000000E+03,
																							'mi'	=> 1.15077944802354E+00,
																							'Nmi'	=> 1.0,
																							'in'	=> 7.29133858267717E+04,
																							'ft'	=> 6.07611548556430E+03,
																							'yd'	=> 2.02537182785694E+03,
																							'ang'	=> 1.85200000000000E+13,
																							'Pica'	=> 5.24976377952723E+06
																						),
																		'in'	=> array(	'm'		=> 2.54000000000000E-02,
																							'mi'	=> 1.57828282828283E-05,
																							'Nmi'	=> 1.37149028077754E-05,
																							'in'	=> 1.0,
																							'ft'	=> 8.33333333333333E-02,
																							'yd'	=> 2.77777777686643E-02,
																							'ang'	=> 2.54000000000000E+08,
																							'Pica'	=> 7.19999999999955E+01
																						),
																		'ft'	=> array(	'm'		=> 3.04800000000000E-01,
																							'mi'	=> 1.89393939393939E-04,
																							'Nmi'	=> 1.64578833693305E-04,
																							'in'	=> 1.20000000000000E+01,
																							'ft'	=> 1.0,
																							'yd'	=> 3.33333333223972E-01,
																							'ang'	=> 3.04800000000000E+09,
																							'Pica'	=> 8.63999999999946E+02
																						),
																		'yd'	=> array(	'm'		=> 9.14400000300000E-01,
																							'mi'	=> 5.68181818368230E-04,
																							'Nmi'	=> 4.93736501241901E-04,
																							'in'	=> 3.60000000118110E+01,
																							'ft'	=> 3.00000000000000E+00,
																							'yd'	=> 1.0,
																							'ang'	=> 9.14400000300000E+09,
																							'Pica'	=> 2.59200000085023E+03
																						),
																		'ang'	=> array(	'm'		=> 1.00000000000000E-10,
																							'mi'	=> 6.21371192237334E-14,
																							'Nmi'	=> 5.39956803455724E-14,
																							'in'	=> 3.93700787401575E-09,
																							'ft'	=> 3.28083989501312E-10,
																							'yd'	=> 1.09361329797891E-10,
																							'ang'	=> 1.0,
																							'Pica'	=> 2.83464566929116E-07
																						),
																		'Pica'	=> array(	'm'		=> 3.52777777777800E-04,
																							'mi'	=> 2.19205948372629E-07,
																							'Nmi'	=> 1.90484761219114E-07,
																							'in'	=> 1.38888888888898E-02,
																							'ft'	=> 1.15740740740748E-03,
																							'yd'	=> 3.85802469009251E-04,
																							'ang'	=> 3.52777777777800E+06,
																							'Pica'	=> 1.0
																						)
																	),
												'Time'		=> array(	'yr'	=> array(	'yr'		=> 1.0,
																							'day'		=> 365.25,
																							'hr'		=> 8766.0,
																							'mn'		=> 525960.0,
																							'sec'		=> 31557600.0
																						),
																		'day'	=> array(	'yr'		=> 2.73785078713210E-03,
																							'day'		=> 1.0,
																							'hr'		=> 24.0,
																							'mn'		=> 1440.0,
																							'sec'		=> 86400.0
																						),
																		'hr'	=> array(	'yr'		=> 1.14077116130504E-04,
																							'day'		=> 4.16666666666667E-02,
																							'hr'		=> 1.0,
																							'mn'		=> 60.0,
																							'sec'		=> 3600.0
																						),
																		'mn'	=> array(	'yr'		=> 1.90128526884174E-06,
																							'day'		=> 6.94444444444444E-04,
																							'hr'		=> 1.66666666666667E-02,
																							'mn'		=> 1.0,
																							'sec'		=> 60.0
																						),
																		'sec'	=> array(	'yr'		=> 3.16880878140289E-08,
																							'day'		=> 1.15740740740741E-05,
																							'hr'		=> 2.77777777777778E-04,
																							'mn'		=> 1.66666666666667E-02,
																							'sec'		=> 1.0
																						)
																	),
												'Pressure'	=> array(	'Pa'	=> array(	'Pa'		=> 1.0,
																							'p'			=> 1.0,
																							'atm'		=> 9.86923299998193E-06,
																							'at'		=> 9.86923299998193E-06,
																							'mmHg'		=> 7.50061707998627E-03
																						),
																		'p'		=> array(	'Pa'		=> 1.0,
																							'p'			=> 1.0,
																							'atm'		=> 9.86923299998193E-06,
																							'at'		=> 9.86923299998193E-06,
																							'mmHg'		=> 7.50061707998627E-03
																						),
																		'atm'	=> array(	'Pa'		=> 1.01324996583000E+05,
																							'p'			=> 1.01324996583000E+05,
																							'atm'		=> 1.0,
																							'at'		=> 1.0,
																							'mmHg'		=> 760.0
																						),
																		'at'	=> array(	'Pa'		=> 1.01324996583000E+05,
																							'p'			=> 1.01324996583000E+05,
																							'atm'		=> 1.0,
																							'at'		=> 1.0,
																							'mmHg'		=> 760.0
																						),
																		'mmHg'	=> array(	'Pa'		=> 1.33322363925000E+02,
																							'p'			=> 1.33322363925000E+02,
																							'atm'		=> 1.31578947368421E-03,
																							'at'		=> 1.31578947368421E-03,
																							'mmHg'		=> 1.0
																						)
																	),
												'Force'		=> array(	'N'		=> array(	'N'			=> 1.0,
																							'dyn'		=> 1.0E+5,
																							'dy'		=> 1.0E+5,
																							'lbf'		=> 2.24808923655339E-01
																						),
																		'dyn'	=> array(	'N'			=> 1.0E-5,
																							'dyn'		=> 1.0,
																							'dy'		=> 1.0,
																							'lbf'		=> 2.24808923655339E-06
																						),
																		'dy'	=> array(	'N'			=> 1.0E-5,
																							'dyn'		=> 1.0,
																							'dy'		=> 1.0,
																							'lbf'		=> 2.24808923655339E-06
																						),
																		'lbf'	=> array(	'N'			=> 4.448222,
																							'dyn'		=> 4.448222E+5,
																							'dy'		=> 4.448222E+5,
																							'lbf'		=> 1.0
																						)
																	),
												'Energy'	=> array(	'J'		=> array(	'J'			=> 1.0,
																							'e'			=> 9.99999519343231E+06,
																							'c'			=> 2.39006249473467E-01,
																							'cal'		=> 2.38846190642017E-01,
																							'eV'		=> 6.24145700000000E+18,
																							'ev'		=> 6.24145700000000E+18,
																							'HPh'		=> 3.72506430801000E-07,
																							'hh'		=> 3.72506430801000E-07,
																							'Wh'		=> 2.77777916238711E-04,
																							'wh'		=> 2.77777916238711E-04,
																							'flb'		=> 2.37304222192651E+01,
																							'BTU'		=> 9.47815067349015E-04,
																							'btu'		=> 9.47815067349015E-04
																						),
																		'e'		=> array(	'J'			=> 1.00000048065700E-07,
																							'e'			=> 1.0,
																							'c'			=> 2.39006364353494E-08,
																							'cal'		=> 2.38846305445111E-08,
																							'eV'		=> 6.24146000000000E+11,
																							'ev'		=> 6.24146000000000E+11,
																							'HPh'		=> 3.72506609848824E-14,
																							'hh'		=> 3.72506609848824E-14,
																							'Wh'		=> 2.77778049754611E-11,
																							'wh'		=> 2.77778049754611E-11,
																							'flb'		=> 2.37304336254586E-06,
																							'BTU'		=> 9.47815522922962E-11,
																							'btu'		=> 9.47815522922962E-11
																						),
																		'c'		=> array(	'J'			=> 4.18399101363672E+00,
																							'e'			=> 4.18398900257312E+07,
																							'c'			=> 1.0,
																							'cal'		=> 9.99330315287563E-01,
																							'eV'		=> 2.61142000000000E+19,
																							'ev'		=> 2.61142000000000E+19,
																							'HPh'		=> 1.55856355899327E-06,
																							'hh'		=> 1.55856355899327E-06,
																							'Wh'		=> 1.16222030532950E-03,
																							'wh'		=> 1.16222030532950E-03,
																							'flb'		=> 9.92878733152102E+01,
																							'BTU'		=> 3.96564972437776E-03,
																							'btu'		=> 3.96564972437776E-03
																						),
																		'cal'	=> array(	'J'			=> 4.18679484613929E+00,
																							'e'			=> 4.18679283372801E+07,
																							'c'			=> 1.00067013349059E+00,
																							'cal'		=> 1.0,
																							'eV'		=> 2.61317000000000E+19,
																							'ev'		=> 2.61317000000000E+19,
																							'HPh'		=> 1.55960800463137E-06,
																							'hh'		=> 1.55960800463137E-06,
																							'Wh'		=> 1.16299914807955E-03,
																							'wh'		=> 1.16299914807955E-03,
																							'flb'		=> 9.93544094443283E+01,
																							'BTU'		=> 3.96830723907002E-03,
																							'btu'		=> 3.96830723907002E-03
																						),
																		'eV'	=> array(	'J'			=> 1.60219000146921E-19,
																							'e'			=> 1.60218923136574E-12,
																							'c'			=> 3.82933423195043E-20,
																							'cal'		=> 3.82676978535648E-20,
																							'eV'		=> 1.0,
																							'ev'		=> 1.0,
																							'HPh'		=> 5.96826078912344E-26,
																							'hh'		=> 5.96826078912344E-26,
																							'Wh'		=> 4.45053000026614E-23,
																							'wh'		=> 4.45053000026614E-23,
																							'flb'		=> 3.80206452103492E-18,
																							'BTU'		=> 1.51857982414846E-22,
																							'btu'		=> 1.51857982414846E-22
																						),
																		'ev'	=> array(	'J'			=> 1.60219000146921E-19,
																							'e'			=> 1.60218923136574E-12,
																							'c'			=> 3.82933423195043E-20,
																							'cal'		=> 3.82676978535648E-20,
																							'eV'		=> 1.0,
																							'ev'		=> 1.0,
																							'HPh'		=> 5.96826078912344E-26,
																							'hh'		=> 5.96826078912344E-26,
																							'Wh'		=> 4.45053000026614E-23,
																							'wh'		=> 4.45053000026614E-23,
																							'flb'		=> 3.80206452103492E-18,
																							'BTU'		=> 1.51857982414846E-22,
																							'btu'		=> 1.51857982414846E-22
																						),
																		'HPh'	=> array(	'J'			=> 2.68451741316170E+06,
																							'e'			=> 2.68451612283024E+13,
																							'c'			=> 6.41616438565991E+05,
																							'cal'		=> 6.41186757845835E+05,
																							'eV'		=> 1.67553000000000E+25,
																							'ev'		=> 1.67553000000000E+25,
																							'HPh'		=> 1.0,
																							'hh'		=> 1.0,
																							'Wh'		=> 7.45699653134593E+02,
																							'wh'		=> 7.45699653134593E+02,
																							'flb'		=> 6.37047316692964E+07,
																							'BTU'		=> 2.54442605275546E+03,
																							'btu'		=> 2.54442605275546E+03
																						),
																		'hh'	=> array(	'J'			=> 2.68451741316170E+06,
																							'e'			=> 2.68451612283024E+13,
																							'c'			=> 6.41616438565991E+05,
																							'cal'		=> 6.41186757845835E+05,
																							'eV'		=> 1.67553000000000E+25,
																							'ev'		=> 1.67553000000000E+25,
																							'HPh'		=> 1.0,
																							'hh'		=> 1.0,
																							'Wh'		=> 7.45699653134593E+02,
																							'wh'		=> 7.45699653134593E+02,
																							'flb'		=> 6.37047316692964E+07,
																							'BTU'		=> 2.54442605275546E+03,
																							'btu'		=> 2.54442605275546E+03
																						),
																		'Wh'	=> array(	'J'			=> 3.59999820554720E+03,
																							'e'			=> 3.59999647518369E+10,
																							'c'			=> 8.60422069219046E+02,
																							'cal'		=> 8.59845857713046E+02,
																							'eV'		=> 2.24692340000000E+22,
																							'ev'		=> 2.24692340000000E+22,
																							'HPh'		=> 1.34102248243839E-03,
																							'hh'		=> 1.34102248243839E-03,
																							'Wh'		=> 1.0,
																							'wh'		=> 1.0,
																							'flb'		=> 8.54294774062316E+04,
																							'BTU'		=> 3.41213254164705E+00,
																							'btu'		=> 3.41213254164705E+00
																						),
																		'wh'	=> array(	'J'			=> 3.59999820554720E+03,
																							'e'			=> 3.59999647518369E+10,
																							'c'			=> 8.60422069219046E+02,
																							'cal'		=> 8.59845857713046E+02,
																							'eV'		=> 2.24692340000000E+22,
																							'ev'		=> 2.24692340000000E+22,
																							'HPh'		=> 1.34102248243839E-03,
																							'hh'		=> 1.34102248243839E-03,
																							'Wh'		=> 1.0,
																							'wh'		=> 1.0,
																							'flb'		=> 8.54294774062316E+04,
																							'BTU'		=> 3.41213254164705E+00,
																							'btu'		=> 3.41213254164705E+00
																						),
																		'flb'	=> array(	'J'			=> 4.21400003236424E-02,
																							'e'			=> 4.21399800687660E+05,
																							'c'			=> 1.00717234301644E-02,
																							'cal'		=> 1.00649785509554E-02,
																							'eV'		=> 2.63015000000000E+17,
																							'ev'		=> 2.63015000000000E+17,
																							'HPh'		=> 1.56974211145130E-08,
																							'hh'		=> 1.56974211145130E-08,
																							'Wh'		=> 1.17055614802000E-05,
																							'wh'		=> 1.17055614802000E-05,
																							'flb'		=> 1.0,
																							'BTU'		=> 3.99409272448406E-05,
																							'btu'		=> 3.99409272448406E-05
																						),
																		'BTU'	=> array(	'J'			=> 1.05505813786749E+03,
																							'e'			=> 1.05505763074665E+10,
																							'c'			=> 2.52165488508168E+02,
																							'cal'		=> 2.51996617135510E+02,
																							'eV'		=> 6.58510000000000E+21,
																							'ev'		=> 6.58510000000000E+21,
																							'HPh'		=> 3.93015941224568E-04,
																							'hh'		=> 3.93015941224568E-04,
																							'Wh'		=> 2.93071851047526E-01,
																							'wh'		=> 2.93071851047526E-01,
																							'flb'		=> 2.50369750774671E+04,
																							'BTU'		=> 1.0,
																							'btu'		=> 1.0,
																						),
																		'btu'	=> array(	'J'			=> 1.05505813786749E+03,
																							'e'			=> 1.05505763074665E+10,
																							'c'			=> 2.52165488508168E+02,
																							'cal'		=> 2.51996617135510E+02,
																							'eV'		=> 6.58510000000000E+21,
																							'ev'		=> 6.58510000000000E+21,
																							'HPh'		=> 3.93015941224568E-04,
																							'hh'		=> 3.93015941224568E-04,
																							'Wh'		=> 2.93071851047526E-01,
																							'wh'		=> 2.93071851047526E-01,
																							'flb'		=> 2.50369750774671E+04,
																							'BTU'		=> 1.0,
																							'btu'		=> 1.0,
																						)
																	),
												'Power'		=> array(	'HP'	=> array(	'HP'		=> 1.0,
																							'h'			=> 1.0,
																							'W'			=> 7.45701000000000E+02,
																							'w'			=> 7.45701000000000E+02
																						),
																		'h'		=> array(	'HP'		=> 1.0,
																							'h'			=> 1.0,
																							'W'			=> 7.45701000000000E+02,
																							'w'			=> 7.45701000000000E+02
																						),
																		'W'		=> array(	'HP'		=> 1.34102006031908E-03,
																							'h'			=> 1.34102006031908E-03,
																							'W'			=> 1.0,
																							'w'			=> 1.0
																						),
																		'w'		=> array(	'HP'		=> 1.34102006031908E-03,
																							'h'			=> 1.34102006031908E-03,
																							'W'			=> 1.0,
																							'w'			=> 1.0
																						)
																	),
												'Magnetism'	=> array(	'T'		=> array(	'T'			=> 1.0,
																							'ga'		=> 10000.0
																						),
																		'ga'	=> array(	'T'			=> 0.0001,
																							'ga'		=> 1.0
																						)
																	),
												'Liquid'	=> array(	'tsp'	=> array(	'tsp'		=> 1.0,
																							'tbs'		=> 3.33333333333333E-01,
																							'oz'		=> 1.66666666666667E-01,
																							'cup'		=> 2.08333333333333E-02,
																							'pt'		=> 1.04166666666667E-02,
																							'us_pt'		=> 1.04166666666667E-02,
																							'uk_pt'		=> 8.67558516821960E-03,
																							'qt'		=> 5.20833333333333E-03,
																							'gal'		=> 1.30208333333333E-03,
																							'l'			=> 4.92999408400710E-03,
																							'lt'		=> 4.92999408400710E-03
																						),
																		'tbs'	=> array(	'tsp'		=> 3.00000000000000E+00,
																							'tbs'		=> 1.0,
																							'oz'		=> 5.00000000000000E-01,
																							'cup'		=> 6.25000000000000E-02,
																							'pt'		=> 3.12500000000000E-02,
																							'us_pt'		=> 3.12500000000000E-02,
																							'uk_pt'		=> 2.60267555046588E-02,
																							'qt'		=> 1.56250000000000E-02,
																							'gal'		=> 3.90625000000000E-03,
																							'l'			=> 1.47899822520213E-02,
																							'lt'		=> 1.47899822520213E-02
																						),
																		'oz'	=> array(	'tsp'		=> 6.00000000000000E+00,
																							'tbs'		=> 2.00000000000000E+00,
																							'oz'		=> 1.0,
																							'cup'		=> 1.25000000000000E-01,
																							'pt'		=> 6.25000000000000E-02,
																							'us_pt'		=> 6.25000000000000E-02,
																							'uk_pt'		=> 5.20535110093176E-02,
																							'qt'		=> 3.12500000000000E-02,
																							'gal'		=> 7.81250000000000E-03,
																							'l'			=> 2.95799645040426E-02,
																							'lt'		=> 2.95799645040426E-02
																						),
																		'cup'	=> array(	'tsp'		=> 4.80000000000000E+01,
																							'tbs'		=> 1.60000000000000E+01,
																							'oz'		=> 8.00000000000000E+00,
																							'cup'		=> 1.0,
																							'pt'		=> 5.00000000000000E-01,
																							'us_pt'		=> 5.00000000000000E-01,
																							'uk_pt'		=> 4.16428088074541E-01,
																							'qt'		=> 2.50000000000000E-01,
																							'gal'		=> 6.25000000000000E-02,
																							'l'			=> 2.36639716032341E-01,
																							'lt'		=> 2.36639716032341E-01
																						),
																		'pt'	=> array(	'tsp'		=> 9.60000000000000E+01,
																							'tbs'		=> 3.20000000000000E+01,
																							'oz'		=> 1.60000000000000E+01,
																							'cup'		=> 2.00000000000000E+00,
																							'pt'		=> 1.0,
																							'us_pt'		=> 1.0,
																							'uk_pt'		=> 8.32856176149081E-01,
																							'qt'		=> 5.00000000000000E-01,
																							'gal'		=> 1.25000000000000E-01,
																							'l'			=> 4.73279432064682E-01,
																							'lt'		=> 4.73279432064682E-01
																						),
																		'us_pt'	=> array(	'tsp'		=> 9.60000000000000E+01,
																							'tbs'		=> 3.20000000000000E+01,
																							'oz'		=> 1.60000000000000E+01,
																							'cup'		=> 2.00000000000000E+00,
																							'pt'		=> 1.0,
																							'us_pt'		=> 1.0,
																							'uk_pt'		=> 8.32856176149081E-01,
																							'qt'		=> 5.00000000000000E-01,
																							'gal'		=> 1.25000000000000E-01,
																							'l'			=> 4.73279432064682E-01,
																							'lt'		=> 4.73279432064682E-01
																						),
																		'uk_pt'	=> array(	'tsp'		=> 1.15266000000000E+02,
																							'tbs'		=> 3.84220000000000E+01,
																							'oz'		=> 1.92110000000000E+01,
																							'cup'		=> 2.40137500000000E+00,
																							'pt'		=> 1.20068750000000E+00,
																							'us_pt'		=> 1.20068750000000E+00,
																							'uk_pt'		=> 1.0,
																							'qt'		=> 6.00343750000000E-01,
																							'gal'		=> 1.50085937500000E-01,
																							'l'			=> 5.68260698087162E-01,
																							'lt'		=> 5.68260698087162E-01
																						),
																		'qt'	=> array(	'tsp'		=> 1.92000000000000E+02,
																							'tbs'		=> 6.40000000000000E+01,
																							'oz'		=> 3.20000000000000E+01,
																							'cup'		=> 4.00000000000000E+00,
																							'pt'		=> 2.00000000000000E+00,
																							'us_pt'		=> 2.00000000000000E+00,
																							'uk_pt'		=> 1.66571235229816E+00,
																							'qt'		=> 1.0,
																							'gal'		=> 2.50000000000000E-01,
																							'l'			=> 9.46558864129363E-01,
																							'lt'		=> 9.46558864129363E-01
																						),
																		'gal'	=> array(	'tsp'		=> 7.68000000000000E+02,
																							'tbs'		=> 2.56000000000000E+02,
																							'oz'		=> 1.28000000000000E+02,
																							'cup'		=> 1.60000000000000E+01,
																							'pt'		=> 8.00000000000000E+00,
																							'us_pt'		=> 8.00000000000000E+00,
																							'uk_pt'		=> 6.66284940919265E+00,
																							'qt'		=> 4.00000000000000E+00,
																							'gal'		=> 1.0,
																							'l'			=> 3.78623545651745E+00,
																							'lt'		=> 3.78623545651745E+00
																						),
																		'l'		=> array(	'tsp'		=> 2.02840000000000E+02,
																							'tbs'		=> 6.76133333333333E+01,
																							'oz'		=> 3.38066666666667E+01,
																							'cup'		=> 4.22583333333333E+00,
																							'pt'		=> 2.11291666666667E+00,
																							'us_pt'		=> 2.11291666666667E+00,
																							'uk_pt'		=> 1.75975569552166E+00,
																							'qt'		=> 1.05645833333333E+00,
																							'gal'		=> 2.64114583333333E-01,
																							'l'			=> 1.0,
																							'lt'		=> 1.0
																						),
																		'lt'	=> array(	'tsp'		=> 2.02840000000000E+02,
																							'tbs'		=> 6.76133333333333E+01,
																							'oz'		=> 3.38066666666667E+01,
																							'cup'		=> 4.22583333333333E+00,
																							'pt'		=> 2.11291666666667E+00,
																							'us_pt'		=> 2.11291666666667E+00,
																							'uk_pt'		=> 1.75975569552166E+00,
																							'qt'		=> 1.05645833333333E+00,
																							'gal'		=> 2.64114583333333E-01,
																							'l'			=> 1.0,
																							'lt'		=> 1.0
																						)
																	)
											);


	
	public static function _parseComplex($Vykhsm01oiod) {
		$Vlhn54gzdcmq = (string) $Vykhsm01oiod;

		$V0mge1rgadzr = $Vigjukumzmnb = 0;
		
		$Vfvxnzkgecoc = substr($Vlhn54gzdcmq,-1);
		if (!is_numeric($Vfvxnzkgecoc)) {
			$Vlhn54gzdcmq = substr($Vlhn54gzdcmq,0,-1);
		} else {
			$Vfvxnzkgecoc = '';
		}

		
		$Vyioyrhpvgco = 0;
		if (strlen($Vlhn54gzdcmq) > 0) {
			$Vyioyrhpvgco = (($Vlhn54gzdcmq{0} == '+') || ($Vlhn54gzdcmq{0} == '-')) ? 1 : 0;
		}
		$Va1wbmqoxm1a = '';
		$V0mge1rgadzr = strtok($Vlhn54gzdcmq, '+-');
		if (strtoupper(substr($V0mge1rgadzr,-1)) == 'E') {
			$Va1wbmqoxm1a = strtok('+-');
			++$Vyioyrhpvgco;
		}

		$V0mge1rgadzr = substr($Vlhn54gzdcmq,0,strlen($V0mge1rgadzr)+strlen($Va1wbmqoxm1a)+$Vyioyrhpvgco);

		if ($Vfvxnzkgecoc != '') {
			$Vigjukumzmnb = substr($Vlhn54gzdcmq,strlen($V0mge1rgadzr));

			if (($Vigjukumzmnb == '') && (($V0mge1rgadzr == '') || ($V0mge1rgadzr == '+') || ($V0mge1rgadzr == '-'))) {
				$Vigjukumzmnb = $V0mge1rgadzr.'1';
				$V0mge1rgadzr = '0';
			} else if ($Vigjukumzmnb == '') {
				$Vigjukumzmnb = $V0mge1rgadzr;
				$V0mge1rgadzr = '0';
			} elseif (($Vigjukumzmnb == '+') || ($Vigjukumzmnb == '-')) {
				$Vigjukumzmnb .= '1';
			}
		}

		return array( 'real'		=> $V0mge1rgadzr,
					  'imaginary'	=> $Vigjukumzmnb,
					  'suffix'		=> $Vfvxnzkgecoc
					);
	}	


	
	private static function _cleanComplex($Vykhsm01oiod) {
		if ($Vykhsm01oiod{0} == '+') $Vykhsm01oiod = substr($Vykhsm01oiod,1);
		if ($Vykhsm01oiod{0} == '0') $Vykhsm01oiod = substr($Vykhsm01oiod,1);
		if ($Vykhsm01oiod{0} == '.') $Vykhsm01oiod = '0'.$Vykhsm01oiod;
		if ($Vykhsm01oiod{0} == '+') $Vykhsm01oiod = substr($Vykhsm01oiod,1);
		return $Vykhsm01oiod;
	}

	
	private static function _nbrConversionFormat($Vrqkb14ac0cx, $Vhfy3kcfhgfa) {
		if (!is_null($Vhfy3kcfhgfa)) {
			if (strlen($Vrqkb14ac0cx) <= $Vhfy3kcfhgfa) {
				return substr(str_pad($Vrqkb14ac0cx, $Vhfy3kcfhgfa, '0', STR_PAD_LEFT), -10);
			} else {
				return PHPExcel_Calculation_Functions::NaN();
			}
		}

		return substr($Vrqkb14ac0cx, -10);
	}	

	
	public static function BESSELI($V1e1eaicqarh, $Vaau0ondrd1o) {
		$V1e1eaicqarh	= (is_null($V1e1eaicqarh))	? 0.0 :	PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);
		$Vaau0ondrd1o	= (is_null($Vaau0ondrd1o))	? 0.0 :	PHPExcel_Calculation_Functions::flattenSingleValue($Vaau0ondrd1o);

		if ((is_numeric($V1e1eaicqarh)) && (is_numeric($Vaau0ondrd1o))) {
			$Vaau0ondrd1o	= floor($Vaau0ondrd1o);
			if ($Vaau0ondrd1o < 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}

			if (abs($V1e1eaicqarh) <= 30) {
				$Vggemlbyg3v2 = $Vj5dtvasqybh = pow($V1e1eaicqarh / 2, $Vaau0ondrd1o) / PHPExcel_Calculation_MathTrig::FACT($Vaau0ondrd1o);
				$Vaau0ondrd1oK = 1;
				$Vp0wbfbcx2va = ($V1e1eaicqarh * $V1e1eaicqarh) / 4;
				do {
					$Vj5dtvasqybh *= $Vp0wbfbcx2va;
					$Vj5dtvasqybh /= ($Vaau0ondrd1oK * ($Vaau0ondrd1oK + $Vaau0ondrd1o));
					$Vggemlbyg3v2 += $Vj5dtvasqybh;
				} while ((abs($Vj5dtvasqybh) > 1e-12) && (++$Vaau0ondrd1oK < 100));
			} else {
				$Voq2fafag0eh = 2 * M_PI;

				$Vfn2kopopqxh = abs($V1e1eaicqarh);
				$Vggemlbyg3v2 = exp($Vfn2kopopqxh) / sqrt($Voq2fafag0eh * $Vfn2kopopqxh);
				if (($Vaau0ondrd1o & 1) && ($V1e1eaicqarh < 0)) {
					$Vggemlbyg3v2 = -$Vggemlbyg3v2;
				}
			}
			return (is_nan($Vggemlbyg3v2)) ? PHPExcel_Calculation_Functions::NaN() : $Vggemlbyg3v2;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function BESSELJ($V1e1eaicqarh, $Vaau0ondrd1o) {
		$V1e1eaicqarh	= (is_null($V1e1eaicqarh))	? 0.0 :	PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);
		$Vaau0ondrd1o	= (is_null($Vaau0ondrd1o))	? 0.0 :	PHPExcel_Calculation_Functions::flattenSingleValue($Vaau0ondrd1o);

		if ((is_numeric($V1e1eaicqarh)) && (is_numeric($Vaau0ondrd1o))) {
			$Vaau0ondrd1o	= floor($Vaau0ondrd1o);
			if ($Vaau0ondrd1o < 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}

			$Vggemlbyg3v2 = 0;
			if (abs($V1e1eaicqarh) <= 30) {
				$Vggemlbyg3v2 = $Vj5dtvasqybh = pow($V1e1eaicqarh / 2, $Vaau0ondrd1o) / PHPExcel_Calculation_MathTrig::FACT($Vaau0ondrd1o);
				$Vaau0ondrd1oK = 1;
				$Vp0wbfbcx2va = ($V1e1eaicqarh * $V1e1eaicqarh) / -4;
				do {
					$Vj5dtvasqybh *= $Vp0wbfbcx2va;
					$Vj5dtvasqybh /= ($Vaau0ondrd1oK * ($Vaau0ondrd1oK + $Vaau0ondrd1o));
					$Vggemlbyg3v2 += $Vj5dtvasqybh;
				} while ((abs($Vj5dtvasqybh) > 1e-12) && (++$Vaau0ondrd1oK < 100));
			} else {
				$V4ebyrzcclut = M_PI / 2;
				$Vesy1glwbcj2 = M_PI / 4;

				$Vfn2kopopqxh = abs($V1e1eaicqarh);
				$Vggemlbyg3v2 = sqrt(M_2DIVPI / $Vfn2kopopqxh) * cos($Vfn2kopopqxh - $Vaau0ondrd1o * $V4ebyrzcclut - $Vesy1glwbcj2);
				if (($Vaau0ondrd1o & 1) && ($V1e1eaicqarh < 0)) {
					$Vggemlbyg3v2 = -$Vggemlbyg3v2;
				}
			}
			return (is_nan($Vggemlbyg3v2)) ? PHPExcel_Calculation_Functions::NaN() : $Vggemlbyg3v2;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	private static function _Besselk0($Vreyef0wvr10) {
		if ($Vreyef0wvr10 <= 2) {
			$Vreyef0wvr102 = $Vreyef0wvr10 * 0.5;
			$Vqwmp2bx0ii2 = ($Vreyef0wvr102 * $Vreyef0wvr102);
			$Vkbkmjbeel0s = -log($Vreyef0wvr102) * self::BESSELI($Vreyef0wvr10, 0) +
					(-0.57721566 + $Vqwmp2bx0ii2 * (0.42278420 + $Vqwmp2bx0ii2 * (0.23069756 + $Vqwmp2bx0ii2 * (0.3488590e-1 + $Vqwmp2bx0ii2 * (0.262698e-2 + $Vqwmp2bx0ii2 *
					(0.10750e-3 + $Vqwmp2bx0ii2 * 0.74e-5))))));
		} else {
			$Vqwmp2bx0ii2 = 2 / $Vreyef0wvr10;
			$Vkbkmjbeel0s = exp(-$Vreyef0wvr10) / sqrt($Vreyef0wvr10) *
					(1.25331414 + $Vqwmp2bx0ii2 * (-0.7832358e-1 + $Vqwmp2bx0ii2 * (0.2189568e-1 + $Vqwmp2bx0ii2 * (-0.1062446e-1 + $Vqwmp2bx0ii2 *
					(0.587872e-2 + $Vqwmp2bx0ii2 * (-0.251540e-2 + $Vqwmp2bx0ii2 * 0.53208e-3))))));
		}
		return $Vkbkmjbeel0s;
	}	


	private static function _Besselk1($Vreyef0wvr10) {
		if ($Vreyef0wvr10 <= 2) {
			$Vreyef0wvr102 = $Vreyef0wvr10 * 0.5;
			$Vqwmp2bx0ii2 = ($Vreyef0wvr102 * $Vreyef0wvr102);
			$Vkbkmjbeel0s = log($Vreyef0wvr102) * self::BESSELI($Vreyef0wvr10, 1) +
					(1 + $Vqwmp2bx0ii2 * (0.15443144 + $Vqwmp2bx0ii2 * (-0.67278579 + $Vqwmp2bx0ii2 * (-0.18156897 + $Vqwmp2bx0ii2 * (-0.1919402e-1 + $Vqwmp2bx0ii2 *
					(-0.110404e-2 + $Vqwmp2bx0ii2 * (-0.4686e-4))))))) / $Vreyef0wvr10;
		} else {
			$Vqwmp2bx0ii2 = 2 / $Vreyef0wvr10;
			$Vkbkmjbeel0s = exp(-$Vreyef0wvr10) / sqrt($Vreyef0wvr10) *
					(1.25331414 + $Vqwmp2bx0ii2 * (0.23498619 + $Vqwmp2bx0ii2 * (-0.3655620e-1 + $Vqwmp2bx0ii2 * (0.1504268e-1 + $Vqwmp2bx0ii2 * (-0.780353e-2 + $Vqwmp2bx0ii2 *
					(0.325614e-2 + $Vqwmp2bx0ii2 * (-0.68245e-3)))))));
		}
		return $Vkbkmjbeel0s;
	}	


	
	public static function BESSELK($V1e1eaicqarh, $Vaau0ondrd1o) {
		$V1e1eaicqarh		= (is_null($V1e1eaicqarh))		? 0.0 :	PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);
		$Vaau0ondrd1o	= (is_null($Vaau0ondrd1o))	? 0.0 :	PHPExcel_Calculation_Functions::flattenSingleValue($Vaau0ondrd1o);

		if ((is_numeric($V1e1eaicqarh)) && (is_numeric($Vaau0ondrd1o))) {
			if (($Vaau0ondrd1o < 0) || ($V1e1eaicqarh == 0.0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}

			switch(floor($Vaau0ondrd1o)) {
				case 0 :	return self::_Besselk0($V1e1eaicqarh);
							break;
				case 1 :	return self::_Besselk1($V1e1eaicqarh);
							break;
				default :	$Vglpiyn42nxb	= 2 / $V1e1eaicqarh;
							$V4spgssz0bqf	= self::_Besselk0($V1e1eaicqarh);
							$Ve3druqvdawo	= self::_Besselk1($V1e1eaicqarh);
							for ($Vmwwo1qnmepz = 1; $Vmwwo1qnmepz < $Vaau0ondrd1o; ++$Vmwwo1qnmepz) {
								$Ve3druqvdawop	= $V4spgssz0bqf + $Vmwwo1qnmepz * $Vglpiyn42nxb * $Ve3druqvdawo;
								$V4spgssz0bqf	= $Ve3druqvdawo;
								$Ve3druqvdawo	= $Ve3druqvdawop;
							}
			}
			return (is_nan($Ve3druqvdawo)) ? PHPExcel_Calculation_Functions::NaN() : $Ve3druqvdawo;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	private static function _Bessely0($Vreyef0wvr10) {
		if ($Vreyef0wvr10 < 8.0) {
			$Vqwmp2bx0ii2 = ($Vreyef0wvr10 * $Vreyef0wvr10);
			$Vghf0bdjit22 = -2957821389.0 + $Vqwmp2bx0ii2 * (7062834065.0 + $Vqwmp2bx0ii2 * (-512359803.6 + $Vqwmp2bx0ii2 * (10879881.29 + $Vqwmp2bx0ii2 * (-86327.92757 + $Vqwmp2bx0ii2 * 228.4622733))));
			$Vorb41dfrszd = 40076544269.0 + $Vqwmp2bx0ii2 * (745249964.8 + $Vqwmp2bx0ii2 * (7189466.438 + $Vqwmp2bx0ii2 * (47447.26470 + $Vqwmp2bx0ii2 * (226.1030244 + $Vqwmp2bx0ii2))));
			$Vkbkmjbeel0s = $Vghf0bdjit22 / $Vorb41dfrszd + 0.636619772 * self::BESSELJ($Vreyef0wvr10, 0) * log($Vreyef0wvr10);
		} else {
			$V3pn4yoebl40 = 8.0 / $Vreyef0wvr10;
			$Vqwmp2bx0ii2 = ($V3pn4yoebl40 * $V3pn4yoebl40);
			$V1e1eaicqarhx = $Vreyef0wvr10 - 0.785398164;
			$Vghf0bdjit22 = 1 + $Vqwmp2bx0ii2 * (-0.1098628627e-2 + $Vqwmp2bx0ii2 * (0.2734510407e-4 + $Vqwmp2bx0ii2 * (-0.2073370639e-5 + $Vqwmp2bx0ii2 * 0.2093887211e-6)));
			$Vorb41dfrszd = -0.1562499995e-1 + $Vqwmp2bx0ii2 * (0.1430488765e-3 + $Vqwmp2bx0ii2 * (-0.6911147651e-5 + $Vqwmp2bx0ii2 * (0.7621095161e-6 + $Vqwmp2bx0ii2 * (-0.934945152e-7))));
			$Vkbkmjbeel0s = sqrt(0.636619772 / $Vreyef0wvr10) * (sin($V1e1eaicqarhx) * $Vghf0bdjit22 + $V3pn4yoebl40 * cos($V1e1eaicqarhx) * $Vorb41dfrszd);
		}
		return $Vkbkmjbeel0s;
	}	


	private static function _Bessely1($Vreyef0wvr10) {
		if ($Vreyef0wvr10 < 8.0) {
			$Vqwmp2bx0ii2 = ($Vreyef0wvr10 * $Vreyef0wvr10);
			$Vghf0bdjit22 = $Vreyef0wvr10 * (-0.4900604943e13 + $Vqwmp2bx0ii2 * (0.1275274390e13 + $Vqwmp2bx0ii2 * (-0.5153438139e11 + $Vqwmp2bx0ii2 * (0.7349264551e9 + $Vqwmp2bx0ii2 *
				(-0.4237922726e7 + $Vqwmp2bx0ii2 * 0.8511937935e4)))));
			$Vorb41dfrszd = 0.2499580570e14 + $Vqwmp2bx0ii2 * (0.4244419664e12 + $Vqwmp2bx0ii2 * (0.3733650367e10 + $Vqwmp2bx0ii2 * (0.2245904002e8 + $Vqwmp2bx0ii2 *
				(0.1020426050e6 + $Vqwmp2bx0ii2 * (0.3549632885e3 + $Vqwmp2bx0ii2)))));
			$Vkbkmjbeel0s = $Vghf0bdjit22 / $Vorb41dfrszd + 0.636619772 * ( self::BESSELJ($Vreyef0wvr10, 1) * log($Vreyef0wvr10) - 1 / $Vreyef0wvr10);
		} else {
			$Vkbkmjbeel0s = sqrt(0.636619772 / $Vreyef0wvr10) * sin($Vreyef0wvr10 - 2.356194491);
		}
		return $Vkbkmjbeel0s;
	}	


	
	public static function BESSELY($V1e1eaicqarh, $Vaau0ondrd1o) {
		$V1e1eaicqarh		= (is_null($V1e1eaicqarh))		? 0.0 :	PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);
		$Vaau0ondrd1o	= (is_null($Vaau0ondrd1o))	? 0.0 :	PHPExcel_Calculation_Functions::flattenSingleValue($Vaau0ondrd1o);

		if ((is_numeric($V1e1eaicqarh)) && (is_numeric($Vaau0ondrd1o))) {
			if (($Vaau0ondrd1o < 0) || ($V1e1eaicqarh == 0.0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}

			switch(floor($Vaau0ondrd1o)) {
				case 0 :	return self::_Bessely0($V1e1eaicqarh);
							break;
				case 1 :	return self::_Bessely1($V1e1eaicqarh);
							break;
				default:	$Vglpiyn42nxb	= 2 / $V1e1eaicqarh;
							$Vhs30irm11ii	= self::_Bessely0($V1e1eaicqarh);
							$Vl2udh4ks1zm	= self::_Bessely1($V1e1eaicqarh);
							for ($Vmwwo1qnmepz = 1; $Vmwwo1qnmepz < $Vaau0ondrd1o; ++$Vmwwo1qnmepz) {
								$Vl2udh4ks1zmp	= $Vmwwo1qnmepz * $Vglpiyn42nxb * $Vl2udh4ks1zm - $Vhs30irm11ii;
								$Vhs30irm11ii	= $Vl2udh4ks1zm;
								$Vl2udh4ks1zm	= $Vl2udh4ks1zmp;
							}
			}
			return (is_nan($Vl2udh4ks1zm)) ? PHPExcel_Calculation_Functions::NaN() : $Vl2udh4ks1zm;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function BINTODEC($V1e1eaicqarh) {
		$V1e1eaicqarh	= PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);

		if (is_bool($V1e1eaicqarh)) {
			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE) {
				$V1e1eaicqarh = (int) $V1e1eaicqarh;
			} else {
				return PHPExcel_Calculation_Functions::VALUE();
			}
		}
		if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC) {
			$V1e1eaicqarh = floor($V1e1eaicqarh);
		}
		$V1e1eaicqarh = (string) $V1e1eaicqarh;
		if (strlen($V1e1eaicqarh) > preg_match_all('/[01]/',$V1e1eaicqarh,$Vvbltn01tphw)) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		if (strlen($V1e1eaicqarh) > 10) {
			return PHPExcel_Calculation_Functions::NaN();
		} elseif (strlen($V1e1eaicqarh) == 10) {
			
			$V1e1eaicqarh = substr($V1e1eaicqarh,-9);
			return '-'.(512-bindec($V1e1eaicqarh));
		}
		return bindec($V1e1eaicqarh);
	}	


	
	public static function BINTOHEX($V1e1eaicqarh, $Vhfy3kcfhgfa=NULL) {
		$V1e1eaicqarh	= PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);
		$Vhfy3kcfhgfa	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhfy3kcfhgfa);

		if (is_bool($V1e1eaicqarh)) {
			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE) {
				$V1e1eaicqarh = (int) $V1e1eaicqarh;
			} else {
				return PHPExcel_Calculation_Functions::VALUE();
			}
		}
		if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC) {
			$V1e1eaicqarh = floor($V1e1eaicqarh);
		}
		$V1e1eaicqarh = (string) $V1e1eaicqarh;
		if (strlen($V1e1eaicqarh) > preg_match_all('/[01]/',$V1e1eaicqarh,$Vvbltn01tphw)) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		if (strlen($V1e1eaicqarh) > 10) {
			return PHPExcel_Calculation_Functions::NaN();
		} elseif (strlen($V1e1eaicqarh) == 10) {
			
			return str_repeat('F',8).substr(strtoupper(dechex(bindec(substr($V1e1eaicqarh,-9)))),-2);
		}
		$Vokixdrlld1j = (string) strtoupper(dechex(bindec($V1e1eaicqarh)));

		return self::_nbrConversionFormat($Vokixdrlld1j,$Vhfy3kcfhgfa);
	}	


	
	public static function BINTOOCT($V1e1eaicqarh, $Vhfy3kcfhgfa=NULL) {
		$V1e1eaicqarh	= PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);
		$Vhfy3kcfhgfa	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhfy3kcfhgfa);

		if (is_bool($V1e1eaicqarh)) {
			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE) {
				$V1e1eaicqarh = (int) $V1e1eaicqarh;
			} else {
				return PHPExcel_Calculation_Functions::VALUE();
			}
		}
		if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC) {
			$V1e1eaicqarh = floor($V1e1eaicqarh);
		}
		$V1e1eaicqarh = (string) $V1e1eaicqarh;
		if (strlen($V1e1eaicqarh) > preg_match_all('/[01]/',$V1e1eaicqarh,$Vvbltn01tphw)) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		if (strlen($V1e1eaicqarh) > 10) {
			return PHPExcel_Calculation_Functions::NaN();
		} elseif (strlen($V1e1eaicqarh) == 10) {
			
			return str_repeat('7',7).substr(strtoupper(decoct(bindec(substr($V1e1eaicqarh,-9)))),-3);
		}
		$Vhf2vr3yoyzg = (string) decoct(bindec($V1e1eaicqarh));

		return self::_nbrConversionFormat($Vhf2vr3yoyzg,$Vhfy3kcfhgfa);
	}	


	
	public static function DECTOBIN($V1e1eaicqarh, $Vhfy3kcfhgfa=NULL) {
		$V1e1eaicqarh	= PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);
		$Vhfy3kcfhgfa	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhfy3kcfhgfa);

		if (is_bool($V1e1eaicqarh)) {
			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE) {
				$V1e1eaicqarh = (int) $V1e1eaicqarh;
			} else {
				return PHPExcel_Calculation_Functions::VALUE();
			}
		}
		$V1e1eaicqarh = (string) $V1e1eaicqarh;
		if (strlen($V1e1eaicqarh) > preg_match_all('/[-0123456789.]/',$V1e1eaicqarh,$Vvbltn01tphw)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$V1e1eaicqarh = (string) floor($V1e1eaicqarh);
		$Vws44nszhvgo = decbin($V1e1eaicqarh);
		if (strlen($Vws44nszhvgo) == 32) {
			
			$Vws44nszhvgo = substr($Vws44nszhvgo,-10);
		} elseif (strlen($Vws44nszhvgo) > 11) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		return self::_nbrConversionFormat($Vws44nszhvgo,$Vhfy3kcfhgfa);
	}	


	
	public static function DECTOHEX($V1e1eaicqarh, $Vhfy3kcfhgfa=null) {
		$V1e1eaicqarh	= PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);
		$Vhfy3kcfhgfa	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhfy3kcfhgfa);

		if (is_bool($V1e1eaicqarh)) {
			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE) {
				$V1e1eaicqarh = (int) $V1e1eaicqarh;
			} else {
				return PHPExcel_Calculation_Functions::VALUE();
			}
		}
		$V1e1eaicqarh = (string) $V1e1eaicqarh;
		if (strlen($V1e1eaicqarh) > preg_match_all('/[-0123456789.]/',$V1e1eaicqarh,$Vvbltn01tphw)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$V1e1eaicqarh = (string) floor($V1e1eaicqarh);
		$Vws44nszhvgo = strtoupper(dechex($V1e1eaicqarh));
		if (strlen($Vws44nszhvgo) == 8) {
			
			$Vws44nszhvgo = 'FF'.$Vws44nszhvgo;
		}

		return self::_nbrConversionFormat($Vws44nszhvgo,$Vhfy3kcfhgfa);
	}	


	
	public static function DECTOOCT($V1e1eaicqarh, $Vhfy3kcfhgfa=null) {
		$V1e1eaicqarh	= PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);
		$Vhfy3kcfhgfa	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhfy3kcfhgfa);

		if (is_bool($V1e1eaicqarh)) {
			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE) {
				$V1e1eaicqarh = (int) $V1e1eaicqarh;
			} else {
				return PHPExcel_Calculation_Functions::VALUE();
			}
		}
		$V1e1eaicqarh = (string) $V1e1eaicqarh;
		if (strlen($V1e1eaicqarh) > preg_match_all('/[-0123456789.]/',$V1e1eaicqarh,$Vvbltn01tphw)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$V1e1eaicqarh = (string) floor($V1e1eaicqarh);
		$Vws44nszhvgo = decoct($V1e1eaicqarh);
		if (strlen($Vws44nszhvgo) == 11) {
			
			$Vws44nszhvgo = substr($Vws44nszhvgo,-10);
		}

		return self::_nbrConversionFormat($Vws44nszhvgo,$Vhfy3kcfhgfa);
	}	


	
	public static function HEXTOBIN($V1e1eaicqarh, $Vhfy3kcfhgfa=null) {
		$V1e1eaicqarh	= PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);
		$Vhfy3kcfhgfa	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhfy3kcfhgfa);

		if (is_bool($V1e1eaicqarh)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$V1e1eaicqarh = (string) $V1e1eaicqarh;
		if (strlen($V1e1eaicqarh) > preg_match_all('/[0123456789ABCDEF]/',strtoupper($V1e1eaicqarh),$Vvbltn01tphw)) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		$Vwlzo21exfyw = decbin(hexdec($V1e1eaicqarh));

		return substr(self::_nbrConversionFormat($Vwlzo21exfyw,$Vhfy3kcfhgfa),-10);
	}	


	
	public static function HEXTODEC($V1e1eaicqarh) {
		$V1e1eaicqarh	= PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);

		if (is_bool($V1e1eaicqarh)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$V1e1eaicqarh = (string) $V1e1eaicqarh;
		if (strlen($V1e1eaicqarh) > preg_match_all('/[0123456789ABCDEF]/',strtoupper($V1e1eaicqarh),$Vvbltn01tphw)) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		return hexdec($V1e1eaicqarh);
	}	


	
	public static function HEXTOOCT($V1e1eaicqarh, $Vhfy3kcfhgfa=null) {
		$V1e1eaicqarh	= PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);
		$Vhfy3kcfhgfa	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhfy3kcfhgfa);

		if (is_bool($V1e1eaicqarh)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$V1e1eaicqarh = (string) $V1e1eaicqarh;
		if (strlen($V1e1eaicqarh) > preg_match_all('/[0123456789ABCDEF]/',strtoupper($V1e1eaicqarh),$Vvbltn01tphw)) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		$Vhf2vr3yoyzg = decoct(hexdec($V1e1eaicqarh));

		return self::_nbrConversionFormat($Vhf2vr3yoyzg,$Vhfy3kcfhgfa);
	}	


	
	public static function OCTTOBIN($V1e1eaicqarh, $Vhfy3kcfhgfa=null) {
		$V1e1eaicqarh	= PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);
		$Vhfy3kcfhgfa	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhfy3kcfhgfa);

		if (is_bool($V1e1eaicqarh)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$V1e1eaicqarh = (string) $V1e1eaicqarh;
		if (preg_match_all('/[01234567]/',$V1e1eaicqarh,$Vvbltn01tphw) != strlen($V1e1eaicqarh)) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		$Vws44nszhvgo = decbin(octdec($V1e1eaicqarh));

		return self::_nbrConversionFormat($Vws44nszhvgo,$Vhfy3kcfhgfa);
	}	


	
	public static function OCTTODEC($V1e1eaicqarh) {
		$V1e1eaicqarh	= PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);

		if (is_bool($V1e1eaicqarh)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$V1e1eaicqarh = (string) $V1e1eaicqarh;
		if (preg_match_all('/[01234567]/',$V1e1eaicqarh,$Vvbltn01tphw) != strlen($V1e1eaicqarh)) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		return octdec($V1e1eaicqarh);
	}	


	
	public static function OCTTOHEX($V1e1eaicqarh, $Vhfy3kcfhgfa=null) {
		$V1e1eaicqarh	= PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);
		$Vhfy3kcfhgfa	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhfy3kcfhgfa);

		if (is_bool($V1e1eaicqarh)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$V1e1eaicqarh = (string) $V1e1eaicqarh;
		if (preg_match_all('/[01234567]/',$V1e1eaicqarh,$Vvbltn01tphw) != strlen($V1e1eaicqarh)) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		$Vokixdrlld1j = strtoupper(dechex(octdec($V1e1eaicqarh)));

		return self::_nbrConversionFormat($Vokixdrlld1j,$Vhfy3kcfhgfa);
	}	


	
	public static function COMPLEX($V0mge1rgadzr=0.0, $Vigjukumzmnb=0.0, $Vfvxnzkgecoc='i') {
		$V0mge1rgadzr	= (is_null($V0mge1rgadzr))	? 0.0 :	PHPExcel_Calculation_Functions::flattenSingleValue($V0mge1rgadzr);
		$Vigjukumzmnb	= (is_null($Vigjukumzmnb))		? 0.0 :	PHPExcel_Calculation_Functions::flattenSingleValue($Vigjukumzmnb);
		$Vfvxnzkgecoc		= (is_null($Vfvxnzkgecoc))		? 'i' :	PHPExcel_Calculation_Functions::flattenSingleValue($Vfvxnzkgecoc);

		if (((is_numeric($V0mge1rgadzr)) && (is_numeric($Vigjukumzmnb))) &&
			(($Vfvxnzkgecoc == 'i') || ($Vfvxnzkgecoc == 'j') || ($Vfvxnzkgecoc == ''))) {
			$V0mge1rgadzr	= (float) $V0mge1rgadzr;
			$Vigjukumzmnb	= (float) $Vigjukumzmnb;

			if ($Vfvxnzkgecoc == '') $Vfvxnzkgecoc = 'i';
			if ($V0mge1rgadzr == 0.0) {
				if ($Vigjukumzmnb == 0.0) {
					return (string) '0';
				} elseif ($Vigjukumzmnb == 1.0) {
					return (string) $Vfvxnzkgecoc;
				} elseif ($Vigjukumzmnb == -1.0) {
					return (string) '-'.$Vfvxnzkgecoc;
				}
				return (string) $Vigjukumzmnb.$Vfvxnzkgecoc;
			} elseif ($Vigjukumzmnb == 0.0) {
				return (string) $V0mge1rgadzr;
			} elseif ($Vigjukumzmnb == 1.0) {
				return (string) $V0mge1rgadzr.'+'.$Vfvxnzkgecoc;
			} elseif ($Vigjukumzmnb == -1.0) {
				return (string) $V0mge1rgadzr.'-'.$Vfvxnzkgecoc;
			}
			if ($Vigjukumzmnb > 0) { $Vigjukumzmnb = (string) '+'.$Vigjukumzmnb; }
			return (string) $V0mge1rgadzr.$Vigjukumzmnb.$Vfvxnzkgecoc;
		}

		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function IMAGINARY($Vykhsm01oiod) {
		$Vykhsm01oiod	= PHPExcel_Calculation_Functions::flattenSingleValue($Vykhsm01oiod);

		$Vb4ergc41sx0 = self::_parseComplex($Vykhsm01oiod);
		return $Vb4ergc41sx0['imaginary'];
	}	


	
	public static function IMREAL($Vykhsm01oiod) {
		$Vykhsm01oiod	= PHPExcel_Calculation_Functions::flattenSingleValue($Vykhsm01oiod);

		$Vb4ergc41sx0 = self::_parseComplex($Vykhsm01oiod);
		return $Vb4ergc41sx0['real'];
	}	


	
	public static function IMABS($Vykhsm01oiod) {
		$Vykhsm01oiod	= PHPExcel_Calculation_Functions::flattenSingleValue($Vykhsm01oiod);

		$Vb4ergc41sx0 = self::_parseComplex($Vykhsm01oiod);

		return sqrt(($Vb4ergc41sx0['real'] * $Vb4ergc41sx0['real']) + ($Vb4ergc41sx0['imaginary'] * $Vb4ergc41sx0['imaginary']));
	}	


	
	public static function IMARGUMENT($Vykhsm01oiod) {
		$Vykhsm01oiod	= PHPExcel_Calculation_Functions::flattenSingleValue($Vykhsm01oiod);

		$Vb4ergc41sx0 = self::_parseComplex($Vykhsm01oiod);

		if ($Vb4ergc41sx0['real'] == 0.0) {
			if ($Vb4ergc41sx0['imaginary'] == 0.0) {
				return 0.0;
			} elseif($Vb4ergc41sx0['imaginary'] < 0.0) {
				return M_PI / -2;
			} else {
				return M_PI / 2;
			}
		} elseif ($Vb4ergc41sx0['real'] > 0.0) {
			return atan($Vb4ergc41sx0['imaginary'] / $Vb4ergc41sx0['real']);
		} elseif ($Vb4ergc41sx0['imaginary'] < 0.0) {
			return 0 - (M_PI - atan(abs($Vb4ergc41sx0['imaginary']) / abs($Vb4ergc41sx0['real'])));
		} else {
			return M_PI - atan($Vb4ergc41sx0['imaginary'] / abs($Vb4ergc41sx0['real']));
		}
	}	


	
	public static function IMCONJUGATE($Vykhsm01oiod) {
		$Vykhsm01oiod	= PHPExcel_Calculation_Functions::flattenSingleValue($Vykhsm01oiod);

		$Vb4ergc41sx0 = self::_parseComplex($Vykhsm01oiod);

		if ($Vb4ergc41sx0['imaginary'] == 0.0) {
			return $Vb4ergc41sx0['real'];
		} else {
			return self::_cleanComplex( self::COMPLEX( $Vb4ergc41sx0['real'],
													   0 - $Vb4ergc41sx0['imaginary'],
													   $Vb4ergc41sx0['suffix']
													 )
									  );
		}
	}	


	
	public static function IMCOS($Vykhsm01oiod) {
		$Vykhsm01oiod	= PHPExcel_Calculation_Functions::flattenSingleValue($Vykhsm01oiod);

		$Vb4ergc41sx0 = self::_parseComplex($Vykhsm01oiod);

		if ($Vb4ergc41sx0['imaginary'] == 0.0) {
			return cos($Vb4ergc41sx0['real']);
		} else {
			return self::IMCONJUGATE(self::COMPLEX(cos($Vb4ergc41sx0['real']) * cosh($Vb4ergc41sx0['imaginary']),sin($Vb4ergc41sx0['real']) * sinh($Vb4ergc41sx0['imaginary']),$Vb4ergc41sx0['suffix']));
		}
	}	


	
	public static function IMSIN($Vykhsm01oiod) {
		$Vykhsm01oiod	= PHPExcel_Calculation_Functions::flattenSingleValue($Vykhsm01oiod);

		$Vb4ergc41sx0 = self::_parseComplex($Vykhsm01oiod);

		if ($Vb4ergc41sx0['imaginary'] == 0.0) {
			return sin($Vb4ergc41sx0['real']);
		} else {
			return self::COMPLEX(sin($Vb4ergc41sx0['real']) * cosh($Vb4ergc41sx0['imaginary']),cos($Vb4ergc41sx0['real']) * sinh($Vb4ergc41sx0['imaginary']),$Vb4ergc41sx0['suffix']);
		}
	}	


	
	public static function IMSQRT($Vykhsm01oiod) {
		$Vykhsm01oiod	= PHPExcel_Calculation_Functions::flattenSingleValue($Vykhsm01oiod);

		$Vb4ergc41sx0 = self::_parseComplex($Vykhsm01oiod);

		$Vdh3bcz2jfob = self::IMARGUMENT($Vykhsm01oiod);
		$Vs0yut2uozkz = cos($Vdh3bcz2jfob / 2);
		$Vwp1i5crwnii = sin($Vdh3bcz2jfob / 2);
		$Vws44nszhvgo = sqrt(sqrt(($Vb4ergc41sx0['real'] * $Vb4ergc41sx0['real']) + ($Vb4ergc41sx0['imaginary'] * $Vb4ergc41sx0['imaginary'])));

		if ($Vb4ergc41sx0['suffix'] == '') {
			return self::COMPLEX($Vs0yut2uozkz * $Vws44nszhvgo,$Vwp1i5crwnii * $Vws44nszhvgo);
		} else {
			return self::COMPLEX($Vs0yut2uozkz * $Vws44nszhvgo,$Vwp1i5crwnii * $Vws44nszhvgo,$Vb4ergc41sx0['suffix']);
		}
	}	


	
	public static function IMLN($Vykhsm01oiod) {
		$Vykhsm01oiod	= PHPExcel_Calculation_Functions::flattenSingleValue($Vykhsm01oiod);

		$Vb4ergc41sx0 = self::_parseComplex($Vykhsm01oiod);

		if (($Vb4ergc41sx0['real'] == 0.0) && ($Vb4ergc41sx0['imaginary'] == 0.0)) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		$Voaberrgre3g = log(sqrt(($Vb4ergc41sx0['real'] * $Vb4ergc41sx0['real']) + ($Vb4ergc41sx0['imaginary'] * $Vb4ergc41sx0['imaginary'])));
		$Veca2om3awug = self::IMARGUMENT($Vykhsm01oiod);

		if ($Vb4ergc41sx0['suffix'] == '') {
			return self::COMPLEX($Voaberrgre3g,$Veca2om3awug);
		} else {
			return self::COMPLEX($Voaberrgre3g,$Veca2om3awug,$Vb4ergc41sx0['suffix']);
		}
	}	


	
	public static function IMLOG10($Vykhsm01oiod) {
		$Vykhsm01oiod	= PHPExcel_Calculation_Functions::flattenSingleValue($Vykhsm01oiod);

		$Vb4ergc41sx0 = self::_parseComplex($Vykhsm01oiod);

		if (($Vb4ergc41sx0['real'] == 0.0) && ($Vb4ergc41sx0['imaginary'] == 0.0)) {
			return PHPExcel_Calculation_Functions::NaN();
		} elseif (($Vb4ergc41sx0['real'] > 0.0) && ($Vb4ergc41sx0['imaginary'] == 0.0)) {
			return log10($Vb4ergc41sx0['real']);
		}

		return self::IMPRODUCT(log10(EULER),self::IMLN($Vykhsm01oiod));
	}	


	
	public static function IMLOG2($Vykhsm01oiod) {
		$Vykhsm01oiod	= PHPExcel_Calculation_Functions::flattenSingleValue($Vykhsm01oiod);

		$Vb4ergc41sx0 = self::_parseComplex($Vykhsm01oiod);

		if (($Vb4ergc41sx0['real'] == 0.0) && ($Vb4ergc41sx0['imaginary'] == 0.0)) {
			return PHPExcel_Calculation_Functions::NaN();
		} elseif (($Vb4ergc41sx0['real'] > 0.0) && ($Vb4ergc41sx0['imaginary'] == 0.0)) {
			return log($Vb4ergc41sx0['real'],2);
		}

		return self::IMPRODUCT(log(EULER,2),self::IMLN($Vykhsm01oiod));
	}	


	
	public static function IMEXP($Vykhsm01oiod) {
		$Vykhsm01oiod	= PHPExcel_Calculation_Functions::flattenSingleValue($Vykhsm01oiod);

		$Vb4ergc41sx0 = self::_parseComplex($Vykhsm01oiod);

		if (($Vb4ergc41sx0['real'] == 0.0) && ($Vb4ergc41sx0['imaginary'] == 0.0)) {
			return '1';
		}

		$Vnhm0uuykimv = exp($Vb4ergc41sx0['real']);
		$Vnhm0uuykimvX = $Vnhm0uuykimv * cos($Vb4ergc41sx0['imaginary']);
		$Vnhm0uuykimvY = $Vnhm0uuykimv * sin($Vb4ergc41sx0['imaginary']);

		if ($Vb4ergc41sx0['suffix'] == '') {
			return self::COMPLEX($Vnhm0uuykimvX,$Vnhm0uuykimvY);
		} else {
			return self::COMPLEX($Vnhm0uuykimvX,$Vnhm0uuykimvY,$Vb4ergc41sx0['suffix']);
		}
	}	


	
	public static function IMPOWER($Vykhsm01oiod,$V0mge1rgadzr) {
		$Vykhsm01oiod	= PHPExcel_Calculation_Functions::flattenSingleValue($Vykhsm01oiod);
		$V0mge1rgadzr		= PHPExcel_Calculation_Functions::flattenSingleValue($V0mge1rgadzr);

		if (!is_numeric($V0mge1rgadzr)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		$Vb4ergc41sx0 = self::_parseComplex($Vykhsm01oiod);

		$Vws44nszhvgo = sqrt(($Vb4ergc41sx0['real'] * $Vb4ergc41sx0['real']) + ($Vb4ergc41sx0['imaginary'] * $Vb4ergc41sx0['imaginary']));
		$Vws44nszhvgoPower = pow($Vws44nszhvgo,$V0mge1rgadzr);
		$Vdh3bcz2jfob = self::IMARGUMENT($Vykhsm01oiod) * $V0mge1rgadzr;
		if ($Vdh3bcz2jfob == 0) {
			return 1;
		} elseif ($Vb4ergc41sx0['imaginary'] == 0.0) {
			return self::COMPLEX($Vws44nszhvgoPower * cos($Vdh3bcz2jfob),$Vws44nszhvgoPower * sin($Vdh3bcz2jfob),$Vb4ergc41sx0['suffix']);
		} else {
			return self::COMPLEX($Vws44nszhvgoPower * cos($Vdh3bcz2jfob),$Vws44nszhvgoPower * sin($Vdh3bcz2jfob),$Vb4ergc41sx0['suffix']);
		}
	}	


	
	public static function IMDIV($V2aldbk5tdc0,$Vhq4ph4vmfy1) {
		$V2aldbk5tdc0	= PHPExcel_Calculation_Functions::flattenSingleValue($V2aldbk5tdc0);
		$Vhq4ph4vmfy1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhq4ph4vmfy1);

		$Vb4ergc41sx0Dividend = self::_parseComplex($V2aldbk5tdc0);
		$Vb4ergc41sx0Divisor = self::_parseComplex($Vhq4ph4vmfy1);

		if (($Vb4ergc41sx0Dividend['suffix'] != '') && ($Vb4ergc41sx0Divisor['suffix'] != '') &&
			($Vb4ergc41sx0Dividend['suffix'] != $Vb4ergc41sx0Divisor['suffix'])) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		if (($Vb4ergc41sx0Dividend['suffix'] != '') && ($Vb4ergc41sx0Divisor['suffix'] == '')) {
			$Vb4ergc41sx0Divisor['suffix'] = $Vb4ergc41sx0Dividend['suffix'];
		}

		$Vs0yut2uozkz = ($Vb4ergc41sx0Dividend['real'] * $Vb4ergc41sx0Divisor['real']) + ($Vb4ergc41sx0Dividend['imaginary'] * $Vb4ergc41sx0Divisor['imaginary']);
		$Vwp1i5crwnii = ($Vb4ergc41sx0Dividend['imaginary'] * $Vb4ergc41sx0Divisor['real']) - ($Vb4ergc41sx0Dividend['real'] * $Vb4ergc41sx0Divisor['imaginary']);
		$Vo3oy2vcnjoy = ($Vb4ergc41sx0Divisor['real'] * $Vb4ergc41sx0Divisor['real']) + ($Vb4ergc41sx0Divisor['imaginary'] * $Vb4ergc41sx0Divisor['imaginary']);

		$Vws44nszhvgo = $Vs0yut2uozkz/$Vo3oy2vcnjoy;
		$Vfhiq1lhsoja = $Vwp1i5crwnii/$Vo3oy2vcnjoy;

		if ($Vfhiq1lhsoja > 0.0) {
			return self::_cleanComplex($Vws44nszhvgo.'+'.$Vfhiq1lhsoja.$Vb4ergc41sx0Divisor['suffix']);
		} elseif ($Vfhiq1lhsoja < 0.0) {
			return self::_cleanComplex($Vws44nszhvgo.$Vfhiq1lhsoja.$Vb4ergc41sx0Divisor['suffix']);
		} else {
			return $Vws44nszhvgo;
		}
	}	


	
	public static function IMSUB($Vykhsm01oiod1,$Vykhsm01oiod2) {
		$Vykhsm01oiod1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vykhsm01oiod1);
		$Vykhsm01oiod2	= PHPExcel_Calculation_Functions::flattenSingleValue($Vykhsm01oiod2);

		$Vb4ergc41sx01 = self::_parseComplex($Vykhsm01oiod1);
		$Vb4ergc41sx02 = self::_parseComplex($Vykhsm01oiod2);

		if ((($Vb4ergc41sx01['suffix'] != '') && ($Vb4ergc41sx02['suffix'] != '')) &&
			($Vb4ergc41sx01['suffix'] != $Vb4ergc41sx02['suffix'])) {
			return PHPExcel_Calculation_Functions::NaN();
		} elseif (($Vb4ergc41sx01['suffix'] == '') && ($Vb4ergc41sx02['suffix'] != '')) {
			$Vb4ergc41sx01['suffix'] = $Vb4ergc41sx02['suffix'];
		}

		$Vs0yut2uozkz = $Vb4ergc41sx01['real'] - $Vb4ergc41sx02['real'];
		$Vwp1i5crwnii = $Vb4ergc41sx01['imaginary'] - $Vb4ergc41sx02['imaginary'];

		return self::COMPLEX($Vs0yut2uozkz,$Vwp1i5crwnii,$Vb4ergc41sx01['suffix']);
	}	


	
	public static function IMSUM() {
		
		$Vws44nszhvgoeturnValue = self::_parseComplex('0');
		$Vcc24murfzr0 = '';

		
		$Voojdymxtgs1 = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		foreach ($Voojdymxtgs1 as $Vnpssjjicvbx) {
			$Vb4ergc41sx0 = self::_parseComplex($Vnpssjjicvbx);

			if ($Vcc24murfzr0 == '') {
				$Vcc24murfzr0 = $Vb4ergc41sx0['suffix'];
			} elseif (($Vb4ergc41sx0['suffix'] != '') && ($Vcc24murfzr0 != $Vb4ergc41sx0['suffix'])) {
				return PHPExcel_Calculation_Functions::VALUE();
			}

			$Vws44nszhvgoeturnValue['real'] += $Vb4ergc41sx0['real'];
			$Vws44nszhvgoeturnValue['imaginary'] += $Vb4ergc41sx0['imaginary'];
		}

		if ($Vws44nszhvgoeturnValue['imaginary'] == 0.0) { $Vcc24murfzr0 = ''; }
		return self::COMPLEX($Vws44nszhvgoeturnValue['real'],$Vws44nszhvgoeturnValue['imaginary'],$Vcc24murfzr0);
	}	


	
	public static function IMPRODUCT() {
		
		$Vws44nszhvgoeturnValue = self::_parseComplex('1');
		$Vcc24murfzr0 = '';

		
		$Voojdymxtgs1 = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		foreach ($Voojdymxtgs1 as $Vnpssjjicvbx) {
			$Vb4ergc41sx0 = self::_parseComplex($Vnpssjjicvbx);

			$V2b5g0cg2lpi = $Vws44nszhvgoeturnValue;
			if (($Vb4ergc41sx0['suffix'] != '') && ($Vcc24murfzr0 == '')) {
				$Vcc24murfzr0 = $Vb4ergc41sx0['suffix'];
			} elseif (($Vb4ergc41sx0['suffix'] != '') && ($Vcc24murfzr0 != $Vb4ergc41sx0['suffix'])) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			$Vws44nszhvgoeturnValue['real'] = ($V2b5g0cg2lpi['real'] * $Vb4ergc41sx0['real']) - ($V2b5g0cg2lpi['imaginary'] * $Vb4ergc41sx0['imaginary']);
			$Vws44nszhvgoeturnValue['imaginary'] = ($V2b5g0cg2lpi['real'] * $Vb4ergc41sx0['imaginary']) + ($V2b5g0cg2lpi['imaginary'] * $Vb4ergc41sx0['real']);
		}

		if ($Vws44nszhvgoeturnValue['imaginary'] == 0.0) { $Vcc24murfzr0 = ''; }
		return self::COMPLEX($Vws44nszhvgoeturnValue['real'],$Vws44nszhvgoeturnValue['imaginary'],$Vcc24murfzr0);
	}	


	
	public static function DELTA($Vi3y3l1uvwp3, $V4t3fwdd3eev=0) {
		$Vi3y3l1uvwp3	= PHPExcel_Calculation_Functions::flattenSingleValue($Vi3y3l1uvwp3);
		$V4t3fwdd3eev	= PHPExcel_Calculation_Functions::flattenSingleValue($V4t3fwdd3eev);

		return (int) ($Vi3y3l1uvwp3 == $V4t3fwdd3eev);
	}	


	
	public static function GESTEP($Vmwwo1qnmepzumber, $Vfo1uyyd2avs=0) {
		$Vmwwo1qnmepzumber	= PHPExcel_Calculation_Functions::flattenSingleValue($Vmwwo1qnmepzumber);
		$Vfo1uyyd2avs	= PHPExcel_Calculation_Functions::flattenSingleValue($Vfo1uyyd2avs);

		return (int) ($Vmwwo1qnmepzumber >= $Vfo1uyyd2avs);
	}	


	
	
	
	private static $Vvvd3aamswgn = 1.128379167095512574;

	public static function _erfVal($V1e1eaicqarh) {
		if (abs($V1e1eaicqarh) > 2.2) {
			return 1 - self::_erfcVal($V1e1eaicqarh);
		}
		$Vvbwz1pamc2b = $Veca2om3awugerm = $V1e1eaicqarh;
		$V1e1eaicqarhsqr = ($V1e1eaicqarh * $V1e1eaicqarh);
		$Vzmnqyqjjodw = 1;
		do {
			$Veca2om3awugerm *= $V1e1eaicqarhsqr / $Vzmnqyqjjodw;
			$Vvbwz1pamc2b -= $Veca2om3awugerm / (2 * $Vzmnqyqjjodw + 1);
			++$Vzmnqyqjjodw;
			$Veca2om3awugerm *= $V1e1eaicqarhsqr / $Vzmnqyqjjodw;
			$Vvbwz1pamc2b += $Veca2om3awugerm / (2 * $Vzmnqyqjjodw + 1);
			++$Vzmnqyqjjodw;
			if ($Vvbwz1pamc2b == 0.0) {
				break;
			}
		} while (abs($Veca2om3awugerm / $Vvbwz1pamc2b) > PRECISION);
		return self::$Vvvd3aamswgn * $Vvbwz1pamc2b;
	}	


	
	public static function ERF($V4vsvopzxq3t, $Vzyakmhgxada = NULL) {
		$V4vsvopzxq3t	= PHPExcel_Calculation_Functions::flattenSingleValue($V4vsvopzxq3t);
		$Vzyakmhgxada	= PHPExcel_Calculation_Functions::flattenSingleValue($Vzyakmhgxada);

		if (is_numeric($V4vsvopzxq3t)) {
			if (is_null($Vzyakmhgxada)) {
				return self::_erfVal($V4vsvopzxq3t);
			}
			if (is_numeric($Vzyakmhgxada)) {
				return self::_erfVal($Vzyakmhgxada) - self::_erfVal($V4vsvopzxq3t);
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	
	
	private static $Vb5sh2hcc4jk = 0.564189583547756287;

	private static function _erfcVal($V1e1eaicqarh) {
		if (abs($V1e1eaicqarh) < 2.2) {
			return 1 - self::_erfVal($V1e1eaicqarh);
		}
		if ($V1e1eaicqarh < 0) {
			return 2 - self::ERFC(-$V1e1eaicqarh);
		}
		$Vi3y3l1uvwp3 = $Vmwwo1qnmepz = 1;
		$V4t3fwdd3eev = $V4y0urwpnd3j = $V1e1eaicqarh;
		$Vrec2f1japon = ($V1e1eaicqarh * $V1e1eaicqarh) + 0.5;
		$Viw41yaa12qw = $Vv3v2zduebrr = $V4t3fwdd3eev / $Vrec2f1japon;
		$Veca2om3awug = 0;
		do {
			$Veca2om3awug = $Vi3y3l1uvwp3 * $Vmwwo1qnmepz + $V4t3fwdd3eev * $V1e1eaicqarh;
			$Vi3y3l1uvwp3 = $V4t3fwdd3eev;
			$V4t3fwdd3eev = $Veca2om3awug;
			$Veca2om3awug = $V4y0urwpnd3j * $Vmwwo1qnmepz + $Vrec2f1japon * $V1e1eaicqarh;
			$V4y0urwpnd3j = $Vrec2f1japon;
			$Vrec2f1japon = $Veca2om3awug;
			$Vmwwo1qnmepz += 0.5;
			$Viw41yaa12qw = $Vv3v2zduebrr;
			$Vv3v2zduebrr = $V4t3fwdd3eev / $Vrec2f1japon;
		} while ((abs($Viw41yaa12qw - $Vv3v2zduebrr) / $Vv3v2zduebrr) > PRECISION);
		return self::$Vb5sh2hcc4jk * exp(-$V1e1eaicqarh * $V1e1eaicqarh) * $Vv3v2zduebrr;
	}	


	
	public static function ERFC($V1e1eaicqarh) {
		$V1e1eaicqarh = PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);

		if (is_numeric($V1e1eaicqarh)) {
			return self::_erfcVal($V1e1eaicqarh);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function getConversionGroups() {
		$V4y0urwpnd3jonversionGroups = array();
		foreach(self::$Vwy22sq054y5 as $V4y0urwpnd3jonversionUnit) {
			$V4y0urwpnd3jonversionGroups[] = $V4y0urwpnd3jonversionUnit['Group'];
		}
		return array_merge(array_unique($V4y0urwpnd3jonversionGroups));
	}	


	
	public static function getConversionGroupUnits($V5ik4ei4v455 = NULL) {
		$V4y0urwpnd3jonversionGroups = array();
		foreach(self::$Vwy22sq054y5 as $V4y0urwpnd3jonversionUnit => $V4y0urwpnd3jonversionGroup) {
			if ((is_null($V5ik4ei4v455)) || ($V4y0urwpnd3jonversionGroup['Group'] == $V5ik4ei4v455)) {
				$V4y0urwpnd3jonversionGroups[$V4y0urwpnd3jonversionGroup['Group']][] = $V4y0urwpnd3jonversionUnit;
			}
		}
		return $V4y0urwpnd3jonversionGroups;
	}	


	
	public static function getConversionGroupUnitDetails($V5ik4ei4v455 = NULL) {
		$V4y0urwpnd3jonversionGroups = array();
		foreach(self::$Vwy22sq054y5 as $V4y0urwpnd3jonversionUnit => $V4y0urwpnd3jonversionGroup) {
			if ((is_null($V5ik4ei4v455)) || ($V4y0urwpnd3jonversionGroup['Group'] == $V5ik4ei4v455)) {
				$V4y0urwpnd3jonversionGroups[$V4y0urwpnd3jonversionGroup['Group']][] = array(	'unit'			=> $V4y0urwpnd3jonversionUnit,
																		'description'	=> $V4y0urwpnd3jonversionGroup['Unit Name']
																	  );
			}
		}
		return $V4y0urwpnd3jonversionGroups;
	}	


	
	public static function getConversionMultipliers() {
		return self::$Vklqsirnm5cd;
	}	


	
	public static function CONVERTUOM($Vp4xjtpabm0l, $Vjer1zlb2srd, $Veca2om3awugoUOM) {
		$Vp4xjtpabm0l		= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Vjer1zlb2srd	= PHPExcel_Calculation_Functions::flattenSingleValue($Vjer1zlb2srd);
		$Veca2om3awugoUOM		= PHPExcel_Calculation_Functions::flattenSingleValue($Veca2om3awugoUOM);

		if (!is_numeric($Vp4xjtpabm0l)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vbcxdna44gdt = 1.0;
		if (isset(self::$Vwy22sq054y5[$Vjer1zlb2srd])) {
			$Vwolawosdghz = self::$Vwy22sq054y5[$Vjer1zlb2srd]['Group'];
		} else {
			$Vbcxdna44gdt = substr($Vjer1zlb2srd,0,1);
			$Vjer1zlb2srd = substr($Vjer1zlb2srd,1);
			if (isset(self::$Vklqsirnm5cd[$Vbcxdna44gdt])) {
				$Vbcxdna44gdt = self::$Vklqsirnm5cd[$Vbcxdna44gdt]['multiplier'];
			} else {
				return PHPExcel_Calculation_Functions::NA();
			}
			if ((isset(self::$Vwy22sq054y5[$Vjer1zlb2srd])) && (self::$Vwy22sq054y5[$Vjer1zlb2srd]['AllowPrefix'])) {
				$Vwolawosdghz = self::$Vwy22sq054y5[$Vjer1zlb2srd]['Group'];
			} else {
				return PHPExcel_Calculation_Functions::NA();
			}
		}
		$Vp4xjtpabm0l *= $Vbcxdna44gdt;

		$Veca2om3awugoMultiplier = 1.0;
		if (isset(self::$Vwy22sq054y5[$Veca2om3awugoUOM])) {
			$Vwrdfay1cwd4 = self::$Vwy22sq054y5[$Veca2om3awugoUOM]['Group'];
		} else {
			$Veca2om3awugoMultiplier = substr($Veca2om3awugoUOM,0,1);
			$Veca2om3awugoUOM = substr($Veca2om3awugoUOM,1);
			if (isset(self::$Vklqsirnm5cd[$Veca2om3awugoMultiplier])) {
				$Veca2om3awugoMultiplier = self::$Vklqsirnm5cd[$Veca2om3awugoMultiplier]['multiplier'];
			} else {
				return PHPExcel_Calculation_Functions::NA();
			}
			if ((isset(self::$Vwy22sq054y5[$Veca2om3awugoUOM])) && (self::$Vwy22sq054y5[$Veca2om3awugoUOM]['AllowPrefix'])) {
				$Vwrdfay1cwd4 = self::$Vwy22sq054y5[$Veca2om3awugoUOM]['Group'];
			} else {
				return PHPExcel_Calculation_Functions::NA();
			}
		}
		if ($Vwolawosdghz != $Vwrdfay1cwd4) {
			return PHPExcel_Calculation_Functions::NA();
		}

		if (($Vjer1zlb2srd == $Veca2om3awugoUOM) && ($Vbcxdna44gdt == $Veca2om3awugoMultiplier)) {
			
			
			return $Vp4xjtpabm0l / $Vbcxdna44gdt;
		} elseif ($Vwolawosdghz == 'Temperature') {
			if (($Vjer1zlb2srd == 'F') || ($Vjer1zlb2srd == 'fah')) {
				if (($Veca2om3awugoUOM == 'F') || ($Veca2om3awugoUOM == 'fah')) {
					return $Vp4xjtpabm0l;
				} else {
					$Vp4xjtpabm0l = (($Vp4xjtpabm0l - 32) / 1.8);
					if (($Veca2om3awugoUOM == 'K') || ($Veca2om3awugoUOM == 'kel')) {
						$Vp4xjtpabm0l += 273.15;
					}
					return $Vp4xjtpabm0l;
				}
			} elseif ((($Vjer1zlb2srd == 'K') || ($Vjer1zlb2srd == 'kel')) &&
					  (($Veca2om3awugoUOM == 'K') || ($Veca2om3awugoUOM == 'kel'))) {
						return $Vp4xjtpabm0l;
			} elseif ((($Vjer1zlb2srd == 'C') || ($Vjer1zlb2srd == 'cel')) &&
					  (($Veca2om3awugoUOM == 'C') || ($Veca2om3awugoUOM == 'cel'))) {
					return $Vp4xjtpabm0l;
			}
			if (($Veca2om3awugoUOM == 'F') || ($Veca2om3awugoUOM == 'fah')) {
				if (($Vjer1zlb2srd == 'K') || ($Vjer1zlb2srd == 'kel')) {
					$Vp4xjtpabm0l -= 273.15;
				}
				return ($Vp4xjtpabm0l * 1.8) + 32;
			}
			if (($Veca2om3awugoUOM == 'C') || ($Veca2om3awugoUOM == 'cel')) {
				return $Vp4xjtpabm0l - 273.15;
			}
			return $Vp4xjtpabm0l + 273.15;
		}
		return ($Vp4xjtpabm0l * self::$V2d1uzitje3b[$Vwolawosdghz][$Vjer1zlb2srd][$Veca2om3awugoUOM]) / $Veca2om3awugoMultiplier;
	}	

}	
