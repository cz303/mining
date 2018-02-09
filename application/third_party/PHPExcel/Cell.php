<?php




class PHPExcel_Cell
{

	
	const DEFAULT_RANGE = 'A1:A1';

	
	private static $V5zgag4revy2 = NULL;

	
	private $Vcaslgtcnulz;

	
	private $Vcfwblud4pl4 = NULL;

	
	private $Vmvdf1bhk4tw;

	
	private $Vq20emrsdn3q;

	
	private $V440jo03t3dc = 0;

	
	private $V44rcbmdalpp;


	
	public function notifyCacheController() {
		$this->_parent->updateCacheData($this);

		return $this;
	}

	public function detach() {
		$this->_parent = NULL;
	}

	public function attach(PHPExcel_CachedObjectStorage_CacheBase $V3jkqexf4nr0) {
		$this->_parent = $V3jkqexf4nr0;
	}


	
	public function __construct($Vqujkwol1zut = NULL, $Vw4dlsyiwh5c = NULL, PHPExcel_Worksheet $Vci1dgyyzjho = NULL)
	{
		
		$this->_value = $Vqujkwol1zut;

		
		$this->_parent = $Vci1dgyyzjho->getCellCacheController();

		
		if ($Vw4dlsyiwh5c !== NULL) {
			if ($Vw4dlsyiwh5c == PHPExcel_Cell_DataType::TYPE_STRING2)
				$Vw4dlsyiwh5c = PHPExcel_Cell_DataType::TYPE_STRING;
			$this->_dataType = $Vw4dlsyiwh5c;
		} elseif (!self::getValueBinder()->bindValue($this, $Vqujkwol1zut)) {
            throw new PHPExcel_Exception("Value could not be bound to cell.");
		}
	}

	
	public function getColumn()
	{
		return $this->_parent->getCurrentColumn();
	}

	
	public function getRow()
	{
		return $this->_parent->getCurrentRow();
	}

	
	public function getCoordinate()
	{
		return $this->_parent->getCurrentAddress();
	}

	
	public function getValue()
	{
		return $this->_value;
	}

	
	public function getFormattedValue()
	{
		return (string) PHPExcel_Style_NumberFormat::toFormattedString(
				$this->getCalculatedValue(),
				$this->getStyle()
					->getNumberFormat()->getFormatCode()
			);
	}

	
	public function setValue($Vqujkwol1zut = NULL)
	{
		if (!self::getValueBinder()->bindValue($this, $Vqujkwol1zut)) {
			throw new PHPExcel_Exception("Value could not be bound to cell.");
		}
		return $this;
	}

	
	public function setValueExplicit($Vqujkwol1zut = NULL, $Vw4dlsyiwh5c = PHPExcel_Cell_DataType::TYPE_STRING)
	{
		
		switch ($Vw4dlsyiwh5c) {
			case PHPExcel_Cell_DataType::TYPE_NULL:
				$this->_value = $Vqujkwol1zut;
				break;
			case PHPExcel_Cell_DataType::TYPE_STRING2:
				$Vw4dlsyiwh5c = PHPExcel_Cell_DataType::TYPE_STRING;
			case PHPExcel_Cell_DataType::TYPE_STRING:
			case PHPExcel_Cell_DataType::TYPE_INLINE:
				$this->_value = PHPExcel_Cell_DataType::checkString($Vqujkwol1zut);
				break;
			case PHPExcel_Cell_DataType::TYPE_NUMERIC:
				$this->_value = (float)$Vqujkwol1zut;
				break;
			case PHPExcel_Cell_DataType::TYPE_FORMULA:
				$this->_value = (string)$Vqujkwol1zut;
				break;
			case PHPExcel_Cell_DataType::TYPE_BOOL:
				$this->_value = (bool)$Vqujkwol1zut;
				break;
			case PHPExcel_Cell_DataType::TYPE_ERROR:
				$this->_value = PHPExcel_Cell_DataType::checkErrorCode($Vqujkwol1zut);
				break;
			default:
				throw new PHPExcel_Exception('Invalid datatype: ' . $Vw4dlsyiwh5c);
				break;
		}

		
		$this->_dataType = $Vw4dlsyiwh5c;

		return $this->notifyCacheController();
	}

	
	public function getCalculatedValue($Vqnql4pqin1i = TRUE)
	{

		if ($this->_dataType == PHPExcel_Cell_DataType::TYPE_FORMULA) {
			try {

				$Vwbpa3giaw5f = PHPExcel_Calculation::getInstance(
					$this->getWorksheet()->getParent()
				)->calculateCellValue($this,$Vqnql4pqin1i);

				
				if (is_array($Vwbpa3giaw5f)) {
					while (is_array($Vwbpa3giaw5f)) {
						$Vwbpa3giaw5f = array_pop($Vwbpa3giaw5f);
					}
				}
			} catch ( PHPExcel_Exception $Vwyiawxj3bhs ) {
				if (($Vwyiawxj3bhs->getMessage() === 'Unable to access External Workbook') && ($this->_calculatedValue !== NULL)) {

					return $this->_calculatedValue; 
				}

				$Vwbpa3giaw5f = '#N/A';
				throw new PHPExcel_Calculation_Exception(
					$this->getWorksheet()->getTitle().'!'.$this->getCoordinate().' -> '.$Vwyiawxj3bhs->getMessage()
				);
			}

			if ($Vwbpa3giaw5f === '#Not Yet Implemented') {

				return $this->_calculatedValue; 
			}

			return $Vwbpa3giaw5f;
		} elseif($this->_value instanceof PHPExcel_RichText) {

			return $this->_value->getPlainText();
		}

		return $this->_value;
	}

	
	public function setCalculatedValue($Vqujkwol1zut = NULL)
	{
		if ($Vqujkwol1zut !== NULL) {
			$this->_calculatedValue = (is_numeric($Vqujkwol1zut)) ? (float) $Vqujkwol1zut : $Vqujkwol1zut;
		}

		return $this->notifyCacheController();
	}

	
	public function getOldCalculatedValue()
	{
		return $this->_calculatedValue;
	}

	
	public function getDataType()
	{
		return $this->_dataType;
	}

	
	public function setDataType($Vw4dlsyiwh5c = PHPExcel_Cell_DataType::TYPE_STRING)
	{
		if ($Vw4dlsyiwh5c == PHPExcel_Cell_DataType::TYPE_STRING2)
			$Vw4dlsyiwh5c = PHPExcel_Cell_DataType::TYPE_STRING;

		$this->_dataType = $Vw4dlsyiwh5c;

		return $this->notifyCacheController();
	}

    
    public function isFormula()
    {
        return $this->_dataType == PHPExcel_Cell_DataType::TYPE_FORMULA;
    }

	
	public function hasDataValidation()
	{
		if (!isset($this->_parent)) {
			throw new PHPExcel_Exception('Cannot check for data validation when cell is not bound to a worksheet');
		}

		return $this->getWorksheet()->dataValidationExists($this->getCoordinate());
	}

	
	public function getDataValidation()
	{
		if (!isset($this->_parent)) {
			throw new PHPExcel_Exception('Cannot get data validation for cell that is not bound to a worksheet');
		}

		return $this->getWorksheet()->getDataValidation($this->getCoordinate());
	}

	
	public function setDataValidation(PHPExcel_Cell_DataValidation $Vdqrd32akkpj = NULL)
	{
		if (!isset($this->_parent)) {
			throw new PHPExcel_Exception('Cannot set data validation for cell that is not bound to a worksheet');
		}

		$this->getWorksheet()->setDataValidation($this->getCoordinate(), $Vdqrd32akkpj);

		return $this->notifyCacheController();
	}

	
	public function hasHyperlink()
	{
		if (!isset($this->_parent)) {
			throw new PHPExcel_Exception('Cannot check for hyperlink when cell is not bound to a worksheet');
		}

		return $this->getWorksheet()->hyperlinkExists($this->getCoordinate());
	}

	
	public function getHyperlink()
	{
		if (!isset($this->_parent)) {
			throw new PHPExcel_Exception('Cannot get hyperlink for cell that is not bound to a worksheet');
		}

		return $this->getWorksheet()->getHyperlink($this->getCoordinate());
	}

	
	public function setHyperlink(PHPExcel_Cell_Hyperlink $Vxv45iu4hchs = NULL)
	{
		if (!isset($this->_parent)) {
			throw new PHPExcel_Exception('Cannot set hyperlink for cell that is not bound to a worksheet');
		}

		$this->getWorksheet()->setHyperlink($this->getCoordinate(), $Vxv45iu4hchs);

		return $this->notifyCacheController();
	}

	
	public function getParent() {
		return $this->_parent;
	}

	
	public function getWorksheet() {
		return $this->_parent->getParent();
	}

	
    public function isInMergeRange() {
        return (boolean) $this->getMergeRange();
    }

	
    public function isMergeRangeValueCell() {
        if ($V2ln0uf5r5tw = $this->getMergeRange()) {
            $V2ln0uf5r5tw = PHPExcel_Cell::splitRange($V2ln0uf5r5tw);
            list($Vafq11amiamr) = $V2ln0uf5r5tw[0];
            if ($this->getCoordinate() === $Vafq11amiamr) {
                return true;
            }
        }
        return false;
    }

	
    public function getMergeRange() {
        foreach($this->getWorksheet()->getMergeCells() as $V2ln0uf5r5tw) {
            if ($this->isInRange($V2ln0uf5r5tw)) {
                return $V2ln0uf5r5tw;
            }
        }
        return false;
    }

	
	public function getStyle()
	{
		return $this->getWorksheet()->getStyle($this->getCoordinate());
	}

	
	public function rebindParent(PHPExcel_Worksheet $V3jkqexf4nr0) {
		$this->_parent = $V3jkqexf4nr0->getCellCacheController();

		return $this->notifyCacheController();
	}

	
	public function isInRange($Vem4atrpzxcs = 'A1:A1')
	{
		list($Vfo4g014tbnf,$Vaoibuxbewds) = self::rangeBoundaries($Vem4atrpzxcs);

		
		$Vnmgjlc3fp00	= self::columnIndexFromString($this->getColumn());
		$Vcztqejaznzn		= $this->getRow();

		
		return (($Vfo4g014tbnf[0] <= $Vnmgjlc3fp00) && ($Vaoibuxbewds[0] >= $Vnmgjlc3fp00) &&
				($Vfo4g014tbnf[1] <= $Vcztqejaznzn) && ($Vaoibuxbewds[1] >= $Vcztqejaznzn)
			   );
	}

	
	public static function coordinateFromString($Vdg5yaz5tb3b = 'A1')
	{
		if (preg_match("/^([$]?[A-Z]{1,3})([$]?\d{1,7})$/", $Vdg5yaz5tb3b, $Vt3xexsia3ta)) {
			return array($Vt3xexsia3ta[1],$Vt3xexsia3ta[2]);
		} elseif ((strpos($Vdg5yaz5tb3b,':') !== FALSE) || (strpos($Vdg5yaz5tb3b,',') !== FALSE)) {
			throw new PHPExcel_Exception('Cell coordinate string can not be a range of cells');
		} elseif ($Vdg5yaz5tb3b == '') {
			throw new PHPExcel_Exception('Cell coordinate can not be zero-length string');
		}

		throw new PHPExcel_Exception('Invalid cell coordinate '.$Vdg5yaz5tb3b);
	}

	
	public static function absoluteReference($Vdg5yaz5tb3b = 'A1')
	{
		if (strpos($Vdg5yaz5tb3b,':') === FALSE && strpos($Vdg5yaz5tb3b,',') === FALSE) {
			
			$V4jvbeui0jzb = '';
			$V4343a0vl0rl = explode('!',$Vdg5yaz5tb3b);
			if (count($V4343a0vl0rl) > 1) {
				list($V4jvbeui0jzb,$Vdg5yaz5tb3b) = $V4343a0vl0rl;
			}
			if ($V4jvbeui0jzb > '')	$V4jvbeui0jzb .= '!';

			
			if (ctype_digit($Vdg5yaz5tb3b)) {
				return $V4jvbeui0jzb . '$' . $Vdg5yaz5tb3b;
			} elseif (ctype_alpha($Vdg5yaz5tb3b)) {
				return $V4jvbeui0jzb . '$' . strtoupper($Vdg5yaz5tb3b);
			}
			return $V4jvbeui0jzb . self::absoluteCoordinate($Vdg5yaz5tb3b);
		}

		throw new PHPExcel_Exception('Cell coordinate string can not be a range of cells');
	}

	
	public static function absoluteCoordinate($Vdg5yaz5tb3b = 'A1')
	{
		if (strpos($Vdg5yaz5tb3b,':') === FALSE && strpos($Vdg5yaz5tb3b,',') === FALSE) {
			
			$V4jvbeui0jzb = '';
			$V4343a0vl0rl = explode('!',$Vdg5yaz5tb3b);
			if (count($V4343a0vl0rl) > 1) {
				list($V4jvbeui0jzb,$Vdg5yaz5tb3b) = $V4343a0vl0rl;
			}
			if ($V4jvbeui0jzb > '')	$V4jvbeui0jzb .= '!';

			
			list($Vn4q2p4mkwa0, $Vexbtekafkvl) = self::coordinateFromString($Vdg5yaz5tb3b);
			$Vn4q2p4mkwa0 = ltrim($Vn4q2p4mkwa0,'$');
			$Vexbtekafkvl = ltrim($Vexbtekafkvl,'$');
			return $V4jvbeui0jzb . '$' . $Vn4q2p4mkwa0 . '$' . $Vexbtekafkvl;
		}

		throw new PHPExcel_Exception('Cell coordinate string can not be a range of cells');
	}

	
	public static function splitRange($Vem4atrpzxcs = 'A1:A1')
	{
		
		if(empty($Vem4atrpzxcs)) {
			$Vem4atrpzxcs = self::DEFAULT_RANGE;
		}

		$Vwyiawxj3bhsploded = explode(',', $Vem4atrpzxcs);
		$Va22k3bvcbjp = count($Vwyiawxj3bhsploded);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Va22k3bvcbjp; ++$Vfhiq1lhsoja) {
			$Vwyiawxj3bhsploded[$Vfhiq1lhsoja] = explode(':', $Vwyiawxj3bhsploded[$Vfhiq1lhsoja]);
		}
		return $Vwyiawxj3bhsploded;
	}

	
	public static function buildRange($Vem4atrpzxcs)
	{
		
		if (!is_array($Vem4atrpzxcs) || empty($Vem4atrpzxcs) || !is_array($Vem4atrpzxcs[0])) {
			throw new PHPExcel_Exception('Range does not contain any information');
		}

		
		$Vfhiq1lhsojamploded = array();
		$Va22k3bvcbjp = count($Vem4atrpzxcs);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Va22k3bvcbjp; ++$Vfhiq1lhsoja) {
			$Vem4atrpzxcs[$Vfhiq1lhsoja] = implode(':', $Vem4atrpzxcs[$Vfhiq1lhsoja]);
		}
		$Vfhiq1lhsojamploded = implode(',', $Vem4atrpzxcs);

		return $Vfhiq1lhsojamploded;
	}

	
	public static function rangeBoundaries($Vem4atrpzxcs = 'A1:A1')
	{
		
		if(empty($Vem4atrpzxcs)) {
			$Vem4atrpzxcs = self::DEFAULT_RANGE;
		}

		
		$Vem4atrpzxcs = strtoupper($Vem4atrpzxcs);

		
		if (strpos($Vem4atrpzxcs, ':') === FALSE) {
			$Vnon33r3dxm5 = $Vsenowpbncam = $Vem4atrpzxcs;
		} else {
			list($Vnon33r3dxm5, $Vsenowpbncam) = explode(':', $Vem4atrpzxcs);
		}

		
		$Vfo4g014tbnf = self::coordinateFromString($Vnon33r3dxm5);
		$Vaoibuxbewds	= self::coordinateFromString($Vsenowpbncam);

		
		$Vfo4g014tbnf[0]	= self::columnIndexFromString($Vfo4g014tbnf[0]);
		$Vaoibuxbewds[0]	= self::columnIndexFromString($Vaoibuxbewds[0]);

		return array($Vfo4g014tbnf, $Vaoibuxbewds);
	}

	
	public static function rangeDimension($Vem4atrpzxcs = 'A1:A1')
	{
		
		list($Vfo4g014tbnf,$Vaoibuxbewds) = self::rangeBoundaries($Vem4atrpzxcs);

		return array( ($Vaoibuxbewds[0] - $Vfo4g014tbnf[0] + 1), ($Vaoibuxbewds[1] - $Vfo4g014tbnf[1] + 1) );
	}

	
	public static function getRangeBoundaries($Vem4atrpzxcs = 'A1:A1')
	{
		
		if(empty($Vem4atrpzxcs)) {
			$Vem4atrpzxcs = self::DEFAULT_RANGE;
		}

		
		$Vem4atrpzxcs = strtoupper($Vem4atrpzxcs);

		
		if (strpos($Vem4atrpzxcs, ':') === FALSE) {
			$Vnon33r3dxm5 = $Vsenowpbncam = $Vem4atrpzxcs;
		} else {
			list($Vnon33r3dxm5, $Vsenowpbncam) = explode(':', $Vem4atrpzxcs);
		}

		return array( self::coordinateFromString($Vnon33r3dxm5), self::coordinateFromString($Vsenowpbncam));
	}

	
	public static function columnIndexFromString($Vlravrmsofwd = 'A')
	{
		
		
		
		static $Vpgq2sznhnj0 = array();

		if (isset($Vpgq2sznhnj0[$Vlravrmsofwd]))
			return $Vpgq2sznhnj0[$Vlravrmsofwd];

		
		
		
		static $Vr4oy4fklz5k = array(
			'A' => 1, 'B' => 2, 'C' => 3, 'D' => 4, 'E' => 5, 'F' => 6, 'G' => 7, 'H' => 8, 'I' => 9, 'J' => 10, 'K' => 11, 'L' => 12, 'M' => 13,
			'N' => 14, 'O' => 15, 'P' => 16, 'Q' => 17, 'R' => 18, 'S' => 19, 'T' => 20, 'U' => 21, 'V' => 22, 'W' => 23, 'X' => 24, 'Y' => 25, 'Z' => 26,
			'a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6, 'g' => 7, 'h' => 8, 'i' => 9, 'j' => 10, 'k' => 11, 'l' => 12, 'm' => 13,
			'n' => 14, 'o' => 15, 'p' => 16, 'q' => 17, 'r' => 18, 's' => 19, 't' => 20, 'u' => 21, 'v' => 22, 'w' => 23, 'x' => 24, 'y' => 25, 'z' => 26
		);

		
		
		if (isset($Vlravrmsofwd{0})) {
			if (!isset($Vlravrmsofwd{1})) {
				$Vpgq2sznhnj0[$Vlravrmsofwd] = $Vr4oy4fklz5k[$Vlravrmsofwd];
				return $Vpgq2sznhnj0[$Vlravrmsofwd];
			} elseif(!isset($Vlravrmsofwd{2})) {
				$Vpgq2sznhnj0[$Vlravrmsofwd] = $Vr4oy4fklz5k[$Vlravrmsofwd{0}] * 26 + $Vr4oy4fklz5k[$Vlravrmsofwd{1}];
				return $Vpgq2sznhnj0[$Vlravrmsofwd];
			} elseif(!isset($Vlravrmsofwd{3})) {
				$Vpgq2sznhnj0[$Vlravrmsofwd] = $Vr4oy4fklz5k[$Vlravrmsofwd{0}] * 676 + $Vr4oy4fklz5k[$Vlravrmsofwd{1}] * 26 + $Vr4oy4fklz5k[$Vlravrmsofwd{2}];
				return $Vpgq2sznhnj0[$Vlravrmsofwd];
			}
		}
		throw new PHPExcel_Exception("Column string index can not be " . ((isset($Vlravrmsofwd{0})) ? "longer than 3 characters" : "empty"));
	}

	
	public static function stringFromColumnIndex($Vv2dylsfvwab = 0)
	{
		
		
		
		static $Vpgq2sznhnj0 = array();

		if (!isset($Vpgq2sznhnj0[$Vv2dylsfvwab])) {
			
			if ($Vv2dylsfvwab < 26) {
				$Vpgq2sznhnj0[$Vv2dylsfvwab] = chr(65 + $Vv2dylsfvwab);
			} elseif ($Vv2dylsfvwab < 702) {
				$Vpgq2sznhnj0[$Vv2dylsfvwab] = chr(64 + ($Vv2dylsfvwab / 26)) .
											  chr(65 + $Vv2dylsfvwab % 26);
			} else {
				$Vpgq2sznhnj0[$Vv2dylsfvwab] = chr(64 + (($Vv2dylsfvwab - 26) / 676)) .
											  chr(65 + ((($Vv2dylsfvwab - 26) % 676) / 26)) .
											  chr(65 + $Vv2dylsfvwab % 26);
			}
		}
		return $Vpgq2sznhnj0[$Vv2dylsfvwab];
	}

	
	public static function extractAllCellReferencesInRange($Vem4atrpzxcs = 'A1') {
		
		$Vbco3t3kne3m = array();

		
		$Vzet4e5dxgic = explode(' ', str_replace('$', '', strtoupper($Vem4atrpzxcs)));
		foreach ($Vzet4e5dxgic as $Vmpcvzmymmy5) {
			
			if (strpos($Vmpcvzmymmy5,':') === FALSE && strpos($Vmpcvzmymmy5,',') === FALSE) {
				$Vbco3t3kne3m[] = $Vmpcvzmymmy5;
				continue;
			}

			
			$Vvqg2eflwuxm = self::splitRange($Vmpcvzmymmy5);
			foreach($Vvqg2eflwuxm as $Votjg2jvcmjx) {
				
				if (!isset($Votjg2jvcmjx[1])) {
					$Vbco3t3kne3m[] = $Votjg2jvcmjx[0];
					continue;
				}

				
				list($Vfo4g014tbnf, $Vaoibuxbewds)	= $Votjg2jvcmjx;
				sscanf($Vfo4g014tbnf,'%[A-Z]%d', $V0vxugqh2ug5, $V5jh0lozltx0);
				sscanf($Vaoibuxbewds,'%[A-Z]%d', $Vmtq42mp25yw, $Vx4v30gyjp2b);
				$Vmtq42mp25yw++;

				
				$Vbgzbczemg14	= $V0vxugqh2ug5;
				$Vnyup0pzlulk	= $V5jh0lozltx0;

				
				while ($Vbgzbczemg14 != $Vmtq42mp25yw) {
					while ($Vnyup0pzlulk <= $Vx4v30gyjp2b) {
						$Vbco3t3kne3m[] = $Vbgzbczemg14.$Vnyup0pzlulk;
						++$Vnyup0pzlulk;
					}
					++$Vbgzbczemg14;
					$Vnyup0pzlulk = $V5jh0lozltx0;
				}
			}
		}

		
		$Vpklswjzd5mb = array();
		foreach (array_unique($Vbco3t3kne3m) as $Vg00bwbj0p2f) {
			sscanf($Vg00bwbj0p2f,'%[A-Z]%d', $Vn4q2p4mkwa0, $Vexbtekafkvl);
			$Vpklswjzd5mb[sprintf('%3s%09d',$Vn4q2p4mkwa0,$Vexbtekafkvl)] = $Vg00bwbj0p2f;
		}
		ksort($Vpklswjzd5mb);

		
		return array_values($Vpklswjzd5mb);
	}

	
	public static function compareCells(PHPExcel_Cell $Vi3y3l1uvwp3, PHPExcel_Cell $V4t3fwdd3eev)
	{
		if ($Vi3y3l1uvwp3->getRow() < $V4t3fwdd3eev->getRow()) {
			return -1;
		} elseif ($Vi3y3l1uvwp3->getRow() > $V4t3fwdd3eev->getRow()) {
			return 1;
		} elseif (self::columnIndexFromString($Vi3y3l1uvwp3->getColumn()) < self::columnIndexFromString($V4t3fwdd3eev->getColumn())) {
			return -1;
		} else {
			return 1;
		}
	}

	
	public static function getValueBinder() {
		if (self::$V5zgag4revy2 === NULL) {
			self::$V5zgag4revy2 = new PHPExcel_Cell_DefaultValueBinder();
		}

		return self::$V5zgag4revy2;
	}

	
	public static function setValueBinder(PHPExcel_Cell_IValueBinder $V4t3fwdd3eevinder = NULL) {
		if ($V4t3fwdd3eevinder === NULL) {
			throw new PHPExcel_Exception("A PHPExcel_Cell_IValueBinder is required for PHPExcel to function correctly.");
		}

		self::$V5zgag4revy2 = $V4t3fwdd3eevinder;
	}

	
	public function __clone() {
		$Vtf0r1rll31w = get_object_vars($this);
		foreach ($Vtf0r1rll31w as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			if ((is_object($Vp4xjtpabm0l)) && ($Vseq1edikdvg != '_parent')) {
				$this->$Vseq1edikdvg = clone $Vp4xjtpabm0l;
			} else {
				$this->$Vseq1edikdvg = $Vp4xjtpabm0l;
			}
		}
	}

	
	public function getXfIndex()
	{
		return $this->_xfIndex;
	}

	
	public function setXfIndex($Vqujkwol1zut = 0)
	{
		$this->_xfIndex = $Vqujkwol1zut;

		return $this->notifyCacheController();
	}

	
	public function setFormulaAttributes($V3ccxamttrcc)
	{
		$this->_formulaAttributes = $V3ccxamttrcc;
		return $this;
	}

	
	public function getFormulaAttributes()
	{
		return $this->_formulaAttributes;
	}

    
	public function __toString()
	{
		return (string) $this->getValue();
	}

}

