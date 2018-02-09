<?php




class PHPExcel_Chart_DataSeriesValues
{

	const DATASERIES_TYPE_STRING	= 'String';
	const DATASERIES_TYPE_NUMBER	= 'Number';

	private static $Vboj1el0zinz = array(
		self::DATASERIES_TYPE_STRING,
		self::DATASERIES_TYPE_NUMBER,
	);

	
	private $Vmvdf1bhk4tw = null;

	
	private $V3j5pvpf2m0f = null;

	
	private $Vf0dpdsb1eua = null;

	
	private $Vjfnaqki1334 = null;

	
	private $Vzgrqeqquepl = 0;

	
	private $V4bw1udatehp = array();

	
	public function __construct($Vjrftzif43kq = self::DATASERIES_TYPE_NUMBER, $V1mss2yi1jry = null, $Ve5ckeo1jgxp = null, $Vroszapjozul = 0, $Vqdzdfrfodv0 = array(), $Vkzp31bqbczg = null)
	{
		$this->setDataType($Vjrftzif43kq);
		$this->_dataSource = $V1mss2yi1jry;
		$this->_formatCode = $Ve5ckeo1jgxp;
		$this->_pointCount = $Vroszapjozul;
		$this->_dataValues = $Vqdzdfrfodv0;
		$this->_marker = $Vkzp31bqbczg;
	}

	
	public function getDataType() {
		return $this->_dataType;
	}

	
	public function setDataType($Vjrftzif43kq = self::DATASERIES_TYPE_NUMBER) {
		if (!in_array($Vjrftzif43kq, self::$Vboj1el0zinz)) {
    		throw new PHPExcel_Chart_Exception('Invalid datatype for chart data series values');
		}
		$this->_dataType = $Vjrftzif43kq;

		return $this;
	}

	
	public function getDataSource() {
		return $this->_dataSource;
	}

	
	public function setDataSource($V1mss2yi1jry = null, $Vdgwpjypgvgj = true) {
		$this->_dataSource = $V1mss2yi1jry;

		if ($Vdgwpjypgvgj) {
			
		}

		return $this;
	}

	
	public function getPointMarker() {
		return $this->_marker;
	}

	
	public function setPointMarker($Vkzp31bqbczg = null) {
		$this->_marker = $Vkzp31bqbczg;

		return $this;
	}

	
	public function getFormatCode() {
		return $this->_formatCode;
	}

	
	public function setFormatCode($Ve5ckeo1jgxp = null) {
		$this->_formatCode = $Ve5ckeo1jgxp;

		return $this;
	}

	
	public function getPointCount() {
		return $this->_pointCount;
	}

	
	public function isMultiLevelSeries() {
		if (count($this->_dataValues) > 0) {
			return is_array($this->_dataValues[0]);
		}
		return null;
	}

	
	public function multiLevelCount() {
		$Vktxfmkn1icf = 0;
		foreach($this->_dataValues as $Vezp1pgijwxx) {
			$Vktxfmkn1icf = max($Vktxfmkn1icf,count($Vezp1pgijwxx));
		}
		return $Vktxfmkn1icf;
	}

	
	public function getDataValues() {
		return $this->_dataValues;
	}

	
	public function getDataValue() {
		$Vytbsuz3c5qz = count($this->_dataValues);
		if ($Vytbsuz3c5qz == 0) {
			return null;
		} elseif ($Vytbsuz3c5qz == 1) {
			return $this->_dataValues[0];
		}
		return $this->_dataValues;
	}

	
	public function setDataValues($Vqdzdfrfodv0 = array(), $V2tr4szuncgl = TRUE) {
		$this->_dataValues = PHPExcel_Calculation_Functions::flattenArray($Vqdzdfrfodv0);
		$this->_pointCount = count($Vqdzdfrfodv0);

		if ($V2tr4szuncgl) {
			
		}

		return $this;
	}

	private function _stripNulls($V0e1t4aetcq0) {
		return $V0e1t4aetcq0 !== NULL;
	}

	public function refresh(PHPExcel_Worksheet $V4jvbeui0jzb, $Vd1rp0jd5yrr = TRUE) {
        if ($this->_dataSource !== NULL) {
        	$Vavzjy43n3gy = PHPExcel_Calculation::getInstance($V4jvbeui0jzb->getParent());
			$Vshm250ybhf4 = PHPExcel_Calculation::_unwrapResult(
			    $Vavzjy43n3gy->_calculateFormulaValue(
			        '='.$this->_dataSource,
			        NULL,
			        $V4jvbeui0jzb->getCell('A1')
			    )
			);
			if ($Vd1rp0jd5yrr) {
				$this->_dataValues = PHPExcel_Calculation_Functions::flattenArray($Vshm250ybhf4);
				foreach($this->_dataValues as &$Vxgkre3bdsqf) {
					if ((!empty($Vxgkre3bdsqf)) && ($Vxgkre3bdsqf[0] == '#')) {
						$Vxgkre3bdsqf = 0.0;
					}
				}
				unset($Vxgkre3bdsqf);
			} else {
				$V2zgziid2nbz = explode('!',$this->_dataSource);
				if (count($V2zgziid2nbz) > 1) {
					list(,$V2zgziid2nbz) = $V2zgziid2nbz;
				}

				$Vog143ghacys = PHPExcel_Cell::rangeDimension(str_replace('$','',$V2zgziid2nbz));
				if (($Vog143ghacys[0] == 1) || ($Vog143ghacys[1] == 1)) {
					$this->_dataValues = PHPExcel_Calculation_Functions::flattenArray($Vshm250ybhf4);
				} else {
					$Vn13acczpphc = array_values(array_shift($Vshm250ybhf4));
					foreach($Vn13acczpphc as $Vfhiq1lhsoja => $Vwg1pfa1aum2) {
						$Vn13acczpphc[$Vfhiq1lhsoja] = array($Vwg1pfa1aum2);
					}

					foreach($Vshm250ybhf4 as $Vwg1pfa1aum2) {
						$Vfhiq1lhsoja = 0;
						foreach($Vwg1pfa1aum2 as $Vbilqpcvvmys) {
							array_unshift($Vn13acczpphc[$Vfhiq1lhsoja++],$Vbilqpcvvmys);
						}
					}
					$this->_dataValues = $Vn13acczpphc;
				}
			}
			$this->_pointCount = count($this->_dataValues);
		}

	}

}
