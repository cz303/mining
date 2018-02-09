<?php




class PHPExcel_ReferenceHelper
{
	
	
	const REFHELPER_REGEXP_CELLREF		= '((\w*|\'[^!]*\')!)?(?<![:a-z\$])(\$?[a-z]{1,3}\$?\d+)(?=[^:!\d\'])';
	const REFHELPER_REGEXP_CELLRANGE	= '((\w*|\'[^!]*\')!)?(\$?[a-z]{1,3}\$?\d+):(\$?[a-z]{1,3}\$?\d+)';
	const REFHELPER_REGEXP_ROWRANGE		= '((\w*|\'[^!]*\')!)?(\$?\d+):(\$?\d+)';
	const REFHELPER_REGEXP_COLRANGE		= '((\w*|\'[^!]*\')!)?(\$?[a-z]{1,3}):(\$?[a-z]{1,3})';

	
	private static $Vhkslmktb254;

	
	public static function getInstance() {
		if (!isset(self::$Vhkslmktb254) || (self::$Vhkslmktb254 === NULL)) {
			self::$Vhkslmktb254 = new PHPExcel_ReferenceHelper();
		}

		return self::$Vhkslmktb254;
	}

	
	protected function __construct() {
	}

	
	public static function columnSort($Vi3y3l1uvwp3, $V4t3fwdd3eev) {
		return strcasecmp(strlen($Vi3y3l1uvwp3) . $Vi3y3l1uvwp3, strlen($V4t3fwdd3eev) . $V4t3fwdd3eev);
	}

	
	public static function columnReverseSort($Vi3y3l1uvwp3, $V4t3fwdd3eev) {
		return 1 - strcasecmp(strlen($Vi3y3l1uvwp3) . $Vi3y3l1uvwp3, strlen($V4t3fwdd3eev) . $V4t3fwdd3eev);
	}

	
	public static function cellSort($Vi3y3l1uvwp3, $V4t3fwdd3eev) {
		sscanf($Vi3y3l1uvwp3,'%[A-Z]%d', $Vi3y3l1uvwp3c, $Vi3y3l1uvwp3r);
		sscanf($V4t3fwdd3eev,'%[A-Z]%d', $V4t3fwdd3eevc, $V4t3fwdd3eevr);

		if ($Vi3y3l1uvwp3r == $V4t3fwdd3eevr) {
			return strcasecmp(strlen($Vi3y3l1uvwp3c) . $Vi3y3l1uvwp3c, strlen($V4t3fwdd3eevc) . $V4t3fwdd3eevc);
		}
		return ($Vi3y3l1uvwp3r < $V4t3fwdd3eevr) ? -1 : 1;
	}

	
	public static function cellReverseSort($Vi3y3l1uvwp3, $V4t3fwdd3eev) {
		sscanf($Vi3y3l1uvwp3,'%[A-Z]%d', $Vi3y3l1uvwp3c, $Vi3y3l1uvwp3r);
		sscanf($V4t3fwdd3eev,'%[A-Z]%d', $V4t3fwdd3eevc, $V4t3fwdd3eevr);

		if ($Vi3y3l1uvwp3r == $V4t3fwdd3eevr) {
			return 1 - strcasecmp(strlen($Vi3y3l1uvwp3c) . $Vi3y3l1uvwp3c, strlen($V4t3fwdd3eevc) . $V4t3fwdd3eevc);
		}
		return ($Vi3y3l1uvwp3r < $V4t3fwdd3eevr) ? 1 : -1;
	}

	
	private static function cellAddressInDeleteRange($V4343a0vl0rl, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr) {
		list($Vkh5nuvqqfg3, $Vfw4if2bh5s4) = PHPExcel_Cell::coordinateFromString($V4343a0vl0rl);
		$Vkh5nuvqqfg3Index = PHPExcel_Cell::columnIndexFromString($Vkh5nuvqqfg3);
		
		if ($Vfbjwfstqsr5 < 0 &&
			($Vfw4if2bh5s4 >= ($V4t3fwdd3eeveforeRow + $Vfbjwfstqsr5)) &&
			($Vfw4if2bh5s4 < $V4t3fwdd3eeveforeRow)) {
			return TRUE;
		} elseif ($V2su05vxiqnr < 0 &&
			($Vkh5nuvqqfg3Index >= ($V4t3fwdd3eeveforeColumnIndex + $V2su05vxiqnr)) &&
			($Vkh5nuvqqfg3Index < $V4t3fwdd3eeveforeColumnIndex)) {
			return TRUE;
		}
		return FALSE;
	}

	
	protected function _adjustPageBreaks(PHPExcel_Worksheet $Vci1dgyyzjho, $Vjc2xrk0yo3z, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5)
	{
		$Vi3y3l1uvwp3Breaks = $Vci1dgyyzjho->getBreaks();
		($V2su05vxiqnr > 0 || $Vfbjwfstqsr5 > 0) ?
			uksort($Vi3y3l1uvwp3Breaks, array('PHPExcel_ReferenceHelper','cellReverseSort')) :
			uksort($Vi3y3l1uvwp3Breaks, array('PHPExcel_ReferenceHelper','cellSort'));

		foreach ($Vi3y3l1uvwp3Breaks as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			if (self::cellAddressInDeleteRange($Vseq1edikdvg, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr)) {
				
				
				$Vci1dgyyzjho->setBreak($Vseq1edikdvg, PHPExcel_Worksheet::BREAK_NONE);
			} else {
				
				
				$Vwy5s4bygdte = $this->updateCellReference($Vseq1edikdvg, $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5);
				if ($Vseq1edikdvg != $Vwy5s4bygdte) {
					$Vci1dgyyzjho->setBreak($Vwy5s4bygdte, $Vp4xjtpabm0l)
					    ->setBreak($Vseq1edikdvg, PHPExcel_Worksheet::BREAK_NONE);
				}
			}
		}
	}

	
	protected function _adjustComments($Vci1dgyyzjho, $Vjc2xrk0yo3z, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5)
	{
		$Vi3y3l1uvwp3Comments = $Vci1dgyyzjho->getComments();
		$Vi3y3l1uvwp3NewComments = array(); 

		foreach ($Vi3y3l1uvwp3Comments as $Vseq1edikdvg => &$Vp4xjtpabm0l) {
			
			if (!self::cellAddressInDeleteRange($Vseq1edikdvg, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr)) {
				
				$Vwy5s4bygdte = $this->updateCellReference($Vseq1edikdvg, $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5);
				$Vi3y3l1uvwp3NewComments[$Vwy5s4bygdte] = $Vp4xjtpabm0l;
			}
		}
		
		$Vci1dgyyzjho->setComments($Vi3y3l1uvwp3NewComments);
	}

	
	protected function _adjustHyperlinks($Vci1dgyyzjho, $Vjc2xrk0yo3z, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5)
	{
		$Vi3y3l1uvwp3HyperlinkCollection = $Vci1dgyyzjho->getHyperlinkCollection();
		($V2su05vxiqnr > 0 || $Vfbjwfstqsr5 > 0) ?
			uksort($Vi3y3l1uvwp3HyperlinkCollection, array('PHPExcel_ReferenceHelper','cellReverseSort')) :
			uksort($Vi3y3l1uvwp3HyperlinkCollection, array('PHPExcel_ReferenceHelper','cellSort'));

		foreach ($Vi3y3l1uvwp3HyperlinkCollection as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			$Vwy5s4bygdte = $this->updateCellReference($Vseq1edikdvg, $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5);
			if ($Vseq1edikdvg != $Vwy5s4bygdte) {
				$Vci1dgyyzjho->setHyperlink( $Vwy5s4bygdte, $Vp4xjtpabm0l );
				$Vci1dgyyzjho->setHyperlink( $Vseq1edikdvg, null );
			}
		}
	}

	
	protected function _adjustDataValidations($Vci1dgyyzjho, $Vjc2xrk0yo3z, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5)
	{
		$Vi3y3l1uvwp3DataValidationCollection = $Vci1dgyyzjho->getDataValidationCollection();
		($V2su05vxiqnr > 0 || $Vfbjwfstqsr5 > 0) ?
			uksort($Vi3y3l1uvwp3DataValidationCollection, array('PHPExcel_ReferenceHelper','cellReverseSort')) :
			uksort($Vi3y3l1uvwp3DataValidationCollection, array('PHPExcel_ReferenceHelper','cellSort'));
		foreach ($Vi3y3l1uvwp3DataValidationCollection as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			$Vwy5s4bygdte = $this->updateCellReference($Vseq1edikdvg, $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5);
			if ($Vseq1edikdvg != $Vwy5s4bygdte) {
				$Vci1dgyyzjho->setDataValidation( $Vwy5s4bygdte, $Vp4xjtpabm0l );
				$Vci1dgyyzjho->setDataValidation( $Vseq1edikdvg, null );
			}
		}
	}

	
	protected function _adjustMergeCells($Vci1dgyyzjho, $Vjc2xrk0yo3z, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5)
	{
		$Vi3y3l1uvwp3MergeCells = $Vci1dgyyzjho->getMergeCells();
		$Vi3y3l1uvwp3NewMergeCells = array(); 
		foreach ($Vi3y3l1uvwp3MergeCells as $Vseq1edikdvg => &$Vp4xjtpabm0l) {
			$Vwy5s4bygdte = $this->updateCellReference($Vseq1edikdvg, $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5);
			$Vi3y3l1uvwp3NewMergeCells[$Vwy5s4bygdte] = $Vwy5s4bygdte;
		}
		$Vci1dgyyzjho->setMergeCells($Vi3y3l1uvwp3NewMergeCells); 
	}

	
	protected function _adjustProtectedCells($Vci1dgyyzjho, $Vjc2xrk0yo3z, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5)
	{
		$Vi3y3l1uvwp3ProtectedCells = $Vci1dgyyzjho->getProtectedCells();
		($V2su05vxiqnr > 0 || $Vfbjwfstqsr5 > 0) ?
			uksort($Vi3y3l1uvwp3ProtectedCells, array('PHPExcel_ReferenceHelper','cellReverseSort')) :
			uksort($Vi3y3l1uvwp3ProtectedCells, array('PHPExcel_ReferenceHelper','cellSort'));
		foreach ($Vi3y3l1uvwp3ProtectedCells as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			$Vwy5s4bygdte = $this->updateCellReference($Vseq1edikdvg, $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5);
			if ($Vseq1edikdvg != $Vwy5s4bygdte) {
				$Vci1dgyyzjho->protectCells( $Vwy5s4bygdte, $Vp4xjtpabm0l, true );
				$Vci1dgyyzjho->unprotectCells( $Vseq1edikdvg );
			}
		}
	}

	
	protected function _adjustColumnDimensions($Vci1dgyyzjho, $Vjc2xrk0yo3z, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5)
	{
		$Vi3y3l1uvwp3ColumnDimensions = array_reverse($Vci1dgyyzjho->getColumnDimensions(), true);
		if (!empty($Vi3y3l1uvwp3ColumnDimensions)) {
			foreach ($Vi3y3l1uvwp3ColumnDimensions as $Vn0px304kon1) {
				$Vwy5s4bygdte = $this->updateCellReference($Vn0px304kon1->getColumnIndex() . '1', $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5);
				list($Vwy5s4bygdte) = PHPExcel_Cell::coordinateFromString($Vwy5s4bygdte);
				if ($Vn0px304kon1->getColumnIndex() != $Vwy5s4bygdte) {
					$Vn0px304kon1->setColumnIndex($Vwy5s4bygdte);
				}
			}
			$Vci1dgyyzjho->refreshColumnDimensions();
		}
	}

	
	protected function _adjustRowDimensions($Vci1dgyyzjho, $Vjc2xrk0yo3z, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5)
	{
		$Vi3y3l1uvwp3RowDimensions = array_reverse($Vci1dgyyzjho->getRowDimensions(), true);
		if (!empty($Vi3y3l1uvwp3RowDimensions)) {
			foreach ($Vi3y3l1uvwp3RowDimensions as $V5y1wdta3xmw) {
				$Vwy5s4bygdte = $this->updateCellReference('A' . $V5y1wdta3xmw->getRowIndex(), $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5);
				list(, $Vwy5s4bygdte) = PHPExcel_Cell::coordinateFromString($Vwy5s4bygdte);
				if ($V5y1wdta3xmw->getRowIndex() != $Vwy5s4bygdte) {
					$V5y1wdta3xmw->setRowIndex($Vwy5s4bygdte);
				}
			}
			$Vci1dgyyzjho->refreshRowDimensions();

			$V5ktuvggkhqh = $Vci1dgyyzjho->getRowDimension($V4t3fwdd3eeveforeRow - 1);
			for ($Vfhiq1lhsoja = $V4t3fwdd3eeveforeRow; $Vfhiq1lhsoja <= $V4t3fwdd3eeveforeRow - 1 + $Vfbjwfstqsr5; ++$Vfhiq1lhsoja) {
				$Vurrjr4nurgo = $Vci1dgyyzjho->getRowDimension($Vfhiq1lhsoja);
				$Vurrjr4nurgo->setRowHeight($V5ktuvggkhqh->getRowHeight());
				$Vurrjr4nurgo->setVisible($V5ktuvggkhqh->getVisible());
				$Vurrjr4nurgo->setOutlineLevel($V5ktuvggkhqh->getOutlineLevel());
				$Vurrjr4nurgo->setCollapsed($V5ktuvggkhqh->getCollapsed());
			}
		}
	}

	
	public function insertNewBefore($Vjc2xrk0yo3z = 'A1', $V2su05vxiqnr = 0, $Vfbjwfstqsr5 = 0, PHPExcel_Worksheet $Vci1dgyyzjho = NULL)
	{
		$Vvenhmzzku1z = ($V2su05vxiqnr < 0 || $Vfbjwfstqsr5 < 0);
		$Vi3y3l1uvwp3CellCollection = $Vci1dgyyzjho->getCellCollection();

		
		$V4t3fwdd3eeveforeColumn	= 'A';
		$V4t3fwdd3eeveforeRow		= 1;
		list($V4t3fwdd3eeveforeColumn, $V4t3fwdd3eeveforeRow) = PHPExcel_Cell::coordinateFromString($Vjc2xrk0yo3z);
		$V4t3fwdd3eeveforeColumnIndex = PHPExcel_Cell::columnIndexFromString($V4t3fwdd3eeveforeColumn);

		
		$Vlb0wwrz5dnx	= $Vci1dgyyzjho->getHighestColumn();
		$Vrzlowqumaxt	= $Vci1dgyyzjho->getHighestRow();

		
		if ($V2su05vxiqnr < 0 && $V4t3fwdd3eeveforeColumnIndex - 2 + $V2su05vxiqnr > 0) {
			for ($Vfhiq1lhsoja = 1; $Vfhiq1lhsoja <= $Vrzlowqumaxt - 1; ++$Vfhiq1lhsoja) {
				for ($Vzmnqyqjjodw = $V4t3fwdd3eeveforeColumnIndex - 1 + $V2su05vxiqnr; $Vzmnqyqjjodw <= $V4t3fwdd3eeveforeColumnIndex - 2; ++$Vzmnqyqjjodw) {
					$Vwykjuif1nf3 = PHPExcel_Cell::stringFromColumnIndex($Vzmnqyqjjodw) . $Vfhiq1lhsoja;
					$Vci1dgyyzjho->removeConditionalStyles($Vwykjuif1nf3);
					if ($Vci1dgyyzjho->cellExists($Vwykjuif1nf3)) {
						$Vci1dgyyzjho->getCell($Vwykjuif1nf3)->setValueExplicit('', PHPExcel_Cell_DataType::TYPE_NULL);
						$Vci1dgyyzjho->getCell($Vwykjuif1nf3)->setXfIndex(0);
					}
				}
			}
		}

		
		if ($Vfbjwfstqsr5 < 0 && $V4t3fwdd3eeveforeRow - 1 + $Vfbjwfstqsr5 > 0) {
			for ($Vfhiq1lhsoja = $V4t3fwdd3eeveforeColumnIndex - 1; $Vfhiq1lhsoja <= PHPExcel_Cell::columnIndexFromString($Vlb0wwrz5dnx) - 1; ++$Vfhiq1lhsoja) {
				for ($Vzmnqyqjjodw = $V4t3fwdd3eeveforeRow + $Vfbjwfstqsr5; $Vzmnqyqjjodw <= $V4t3fwdd3eeveforeRow - 1; ++$Vzmnqyqjjodw) {
					$Vwykjuif1nf3 = PHPExcel_Cell::stringFromColumnIndex($Vfhiq1lhsoja) . $Vzmnqyqjjodw;
					$Vci1dgyyzjho->removeConditionalStyles($Vwykjuif1nf3);
					if ($Vci1dgyyzjho->cellExists($Vwykjuif1nf3)) {
						$Vci1dgyyzjho->getCell($Vwykjuif1nf3)->setValueExplicit('', PHPExcel_Cell_DataType::TYPE_NULL);
						$Vci1dgyyzjho->getCell($Vwykjuif1nf3)->setXfIndex(0);
					}
				}
			}
		}

		
        if($Vvenhmzzku1z) {
            
            $Vi3y3l1uvwp3CellCollection = array_reverse($Vi3y3l1uvwp3CellCollection);
        }
		while ($Vhibevwz1gkx = array_pop($Vi3y3l1uvwp3CellCollection)) {
			$Vblc1ueqvbti = $Vci1dgyyzjho->getCell($Vhibevwz1gkx);
			$Vblc1ueqvbtiIndex = PHPExcel_Cell::columnIndexFromString($Vblc1ueqvbti->getColumn());

			if ($Vblc1ueqvbtiIndex-1 + $V2su05vxiqnr < 0) {
				continue;
			}

			
			$Vaxtgn3a3owf = PHPExcel_Cell::stringFromColumnIndex($Vblc1ueqvbtiIndex-1 + $V2su05vxiqnr) . ($Vblc1ueqvbti->getRow() + $Vfbjwfstqsr5);

			
			if (($Vblc1ueqvbtiIndex >= $V4t3fwdd3eeveforeColumnIndex) &&
				($Vblc1ueqvbti->getRow() >= $V4t3fwdd3eeveforeRow)) {

				
				$Vci1dgyyzjho->getCell($Vaxtgn3a3owf)->setXfIndex($Vblc1ueqvbti->getXfIndex());

				
				if ($Vblc1ueqvbti->getDataType() == PHPExcel_Cell_DataType::TYPE_FORMULA) {
					
					$Vci1dgyyzjho->getCell($Vaxtgn3a3owf)
						   ->setValue($this->updateFormulaReferences($Vblc1ueqvbti->getValue(),
						   					$Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5, $Vci1dgyyzjho->getTitle()));
				} else {
					
					$Vci1dgyyzjho->getCell($Vaxtgn3a3owf)->setValue($Vblc1ueqvbti->getValue());
				}

				
				$Vci1dgyyzjho->getCellCacheController()->deleteCacheData($Vhibevwz1gkx);

			} else {
				
				if ($Vblc1ueqvbti->getDataType() == PHPExcel_Cell_DataType::TYPE_FORMULA) {
					
					$Vblc1ueqvbti->setValue($this->updateFormulaReferences($Vblc1ueqvbti->getValue(),
										$Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5, $Vci1dgyyzjho->getTitle()));
				}

			}
		}

		
		$Vlb0wwrz5dnx	= $Vci1dgyyzjho->getHighestColumn();
		$Vrzlowqumaxt	= $Vci1dgyyzjho->getHighestRow();

		if ($V2su05vxiqnr > 0 && $V4t3fwdd3eeveforeColumnIndex - 2 > 0) {
			for ($Vfhiq1lhsoja = $V4t3fwdd3eeveforeRow; $Vfhiq1lhsoja <= $Vrzlowqumaxt - 1; ++$Vfhiq1lhsoja) {

				
				$Vwykjuif1nf3 = PHPExcel_Cell::stringFromColumnIndex( $V4t3fwdd3eeveforeColumnIndex - 2 ) . $Vfhiq1lhsoja;
				if ($Vci1dgyyzjho->cellExists($Vwykjuif1nf3)) {
					$V4de3455flza = $Vci1dgyyzjho->getCell($Vwykjuif1nf3)->getXfIndex();
					$Vrlulqrqtem4 = $Vci1dgyyzjho->conditionalStylesExists($Vwykjuif1nf3) ?
						$Vci1dgyyzjho->getConditionalStyles($Vwykjuif1nf3) : false;
					for ($Vzmnqyqjjodw = $V4t3fwdd3eeveforeColumnIndex - 1; $Vzmnqyqjjodw <= $V4t3fwdd3eeveforeColumnIndex - 2 + $V2su05vxiqnr; ++$Vzmnqyqjjodw) {
						$Vci1dgyyzjho->getCellByColumnAndRow($Vzmnqyqjjodw, $Vfhiq1lhsoja)->setXfIndex($V4de3455flza);
						if ($Vrlulqrqtem4) {
							$Vhxy4lxbvzn0 = array();
							foreach ($Vrlulqrqtem4 as $Vw2mjdsvh0wf) {
								$Vhxy4lxbvzn0[] = clone $Vw2mjdsvh0wf;
							}
							$Vci1dgyyzjho->setConditionalStyles(PHPExcel_Cell::stringFromColumnIndex($Vzmnqyqjjodw) . $Vfhiq1lhsoja, $Vhxy4lxbvzn0);
						}
					}
				}

			}
		}

		if ($Vfbjwfstqsr5 > 0 && $V4t3fwdd3eeveforeRow - 1 > 0) {
			for ($Vfhiq1lhsoja = $V4t3fwdd3eeveforeColumnIndex - 1; $Vfhiq1lhsoja <= PHPExcel_Cell::columnIndexFromString($Vlb0wwrz5dnx) - 1; ++$Vfhiq1lhsoja) {

				
				$Vwykjuif1nf3 = PHPExcel_Cell::stringFromColumnIndex($Vfhiq1lhsoja) . ($V4t3fwdd3eeveforeRow - 1);
				if ($Vci1dgyyzjho->cellExists($Vwykjuif1nf3)) {
					$V4de3455flza = $Vci1dgyyzjho->getCell($Vwykjuif1nf3)->getXfIndex();
					$Vrlulqrqtem4 = $Vci1dgyyzjho->conditionalStylesExists($Vwykjuif1nf3) ?
						$Vci1dgyyzjho->getConditionalStyles($Vwykjuif1nf3) : false;
					for ($Vzmnqyqjjodw = $V4t3fwdd3eeveforeRow; $Vzmnqyqjjodw <= $V4t3fwdd3eeveforeRow - 1 + $Vfbjwfstqsr5; ++$Vzmnqyqjjodw) {
						$Vci1dgyyzjho->getCell(PHPExcel_Cell::stringFromColumnIndex($Vfhiq1lhsoja) . $Vzmnqyqjjodw)->setXfIndex($V4de3455flza);
						if ($Vrlulqrqtem4) {
							$Vhxy4lxbvzn0 = array();
							foreach ($Vrlulqrqtem4 as $Vw2mjdsvh0wf) {
								$Vhxy4lxbvzn0[] = clone $Vw2mjdsvh0wf;
							}
							$Vci1dgyyzjho->setConditionalStyles(PHPExcel_Cell::stringFromColumnIndex($Vfhiq1lhsoja) . $Vzmnqyqjjodw, $Vhxy4lxbvzn0);
						}
					}
				}
			}
		}

		
		$this->_adjustColumnDimensions($Vci1dgyyzjho, $Vjc2xrk0yo3z, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5);

		
		$this->_adjustRowDimensions($Vci1dgyyzjho, $Vjc2xrk0yo3z, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5);

		
		$this->_adjustPageBreaks($Vci1dgyyzjho, $Vjc2xrk0yo3z, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5);

		
		$this->_adjustComments($Vci1dgyyzjho, $Vjc2xrk0yo3z, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5);

		
		$this->_adjustHyperlinks($Vci1dgyyzjho, $Vjc2xrk0yo3z, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5);

		
		$this->_adjustDataValidations($Vci1dgyyzjho, $Vjc2xrk0yo3z, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5);

		
		$this->_adjustMergeCells($Vci1dgyyzjho, $Vjc2xrk0yo3z, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5);

		
		$this->_adjustProtectedCells($Vci1dgyyzjho, $Vjc2xrk0yo3z, $V4t3fwdd3eeveforeColumnIndex, $V2su05vxiqnr, $V4t3fwdd3eeveforeRow, $Vfbjwfstqsr5);

		
		$Vi3y3l1uvwp3utoFilter = $Vci1dgyyzjho->getAutoFilter();
		$Vi3y3l1uvwp3utoFilterRange = $Vi3y3l1uvwp3utoFilter->getRange();
		if (!empty($Vi3y3l1uvwp3utoFilterRange)) {
			if ($V2su05vxiqnr != 0) {
				$Vi3y3l1uvwp3utoFilterColumns = array_keys($Vi3y3l1uvwp3utoFilter->getColumns());
				if (count($Vi3y3l1uvwp3utoFilterColumns) > 0) {
					sscanf($Vjc2xrk0yo3z,'%[A-Z]%d', $Vn4q2p4mkwa0, $Vexbtekafkvl);
					$Vn4q2p4mkwa0Index = PHPExcel_Cell::columnIndexFromString($Vn4q2p4mkwa0);
					list($Vfo4g014tbnf,$Vaoibuxbewds) = PHPExcel_Cell::rangeBoundaries($Vi3y3l1uvwp3utoFilterRange);
					if ($Vn4q2p4mkwa0Index <= $Vaoibuxbewds[0]) {
						if ($V2su05vxiqnr < 0) {
							
							
							$Vciifk0gkpwb = $Vn4q2p4mkwa0Index + $V2su05vxiqnr - 1;
							$V2lpjdbteayu = abs($V2su05vxiqnr);
							for ($Vfhiq1lhsoja = 1; $Vfhiq1lhsoja <= $V2lpjdbteayu; ++$Vfhiq1lhsoja) {
								if (in_array(PHPExcel_Cell::stringFromColumnIndex($Vciifk0gkpwb),$Vi3y3l1uvwp3utoFilterColumns)) {
									$Vi3y3l1uvwp3utoFilter->clearColumn(PHPExcel_Cell::stringFromColumnIndex($Vciifk0gkpwb));
								}
								++$Vciifk0gkpwb;
							}
						}
						$V0vxugqh2ug5 = ($Vn4q2p4mkwa0Index > $Vfo4g014tbnf[0]) ? $Vn4q2p4mkwa0Index : $Vfo4g014tbnf[0];

						
						if ($V2su05vxiqnr > 0) {
							
							$V0vxugqh2ug5ID = PHPExcel_Cell::stringFromColumnIndex($V0vxugqh2ug5-1);
							$Vy03py3ez2lp = PHPExcel_Cell::stringFromColumnIndex($V0vxugqh2ug5+$V2su05vxiqnr-1);
							$Vxlobttdivk3 = PHPExcel_Cell::stringFromColumnIndex($Vaoibuxbewds[0]);

							$V0vxugqh2ug5Ref = $V0vxugqh2ug5;
							$V2icr1eahcj5 = $Vaoibuxbewds[0];
							$Vz1jyzbk22zg = $Vaoibuxbewds[0]+$V2su05vxiqnr;

							do {
								$Vi3y3l1uvwp3utoFilter->shiftColumn(PHPExcel_Cell::stringFromColumnIndex($V2icr1eahcj5-1),PHPExcel_Cell::stringFromColumnIndex($Vz1jyzbk22zg-1));
								--$V2icr1eahcj5;
								--$Vz1jyzbk22zg;
							} while ($V0vxugqh2ug5Ref <= $V2icr1eahcj5);
						} else {
							
							$V0vxugqh2ug5ID = PHPExcel_Cell::stringFromColumnIndex($V0vxugqh2ug5-1);
							$Vy03py3ez2lp = PHPExcel_Cell::stringFromColumnIndex($V0vxugqh2ug5+$V2su05vxiqnr-1);
							$Vxlobttdivk3 = PHPExcel_Cell::stringFromColumnIndex($Vaoibuxbewds[0]);
							do {
								$Vi3y3l1uvwp3utoFilter->shiftColumn($V0vxugqh2ug5ID,$Vy03py3ez2lp);
								++$V0vxugqh2ug5ID;
								++$Vy03py3ez2lp;
							} while ($V0vxugqh2ug5ID != $Vxlobttdivk3);
						}
					}
				}
			}
			$Vci1dgyyzjho->setAutoFilter( $this->updateCellReference($Vi3y3l1uvwp3utoFilterRange, $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5) );
		}

		
		if ($Vci1dgyyzjho->getFreezePane() != '') {
			$Vci1dgyyzjho->freezePane( $this->updateCellReference($Vci1dgyyzjho->getFreezePane(), $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5) );
		}

		
		if ($Vci1dgyyzjho->getPageSetup()->isPrintAreaSet()) {
			$Vci1dgyyzjho->getPageSetup()->setPrintArea( $this->updateCellReference($Vci1dgyyzjho->getPageSetup()->getPrintArea(), $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5) );
		}

		
		$Vi3y3l1uvwp3Drawings = $Vci1dgyyzjho->getDrawingCollection();
		foreach ($Vi3y3l1uvwp3Drawings as $Vzzc34vynjv5) {
			$Vwy5s4bygdte = $this->updateCellReference($Vzzc34vynjv5->getCoordinates(), $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5);
			if ($Vzzc34vynjv5->getCoordinates() != $Vwy5s4bygdte) {
				$Vzzc34vynjv5->setCoordinates($Vwy5s4bygdte);
			}
		}

		
		if (count($Vci1dgyyzjho->getParent()->getNamedRanges()) > 0) {
			foreach ($Vci1dgyyzjho->getParent()->getNamedRanges() as $Vdqyivdsly3d) {
				if ($Vdqyivdsly3d->getWorksheet()->getHashCode() == $Vci1dgyyzjho->getHashCode()) {
					$Vdqyivdsly3d->setRange(
						$this->updateCellReference($Vdqyivdsly3d->getRange(), $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5)
					);
				}
			}
		}

		
		$Vci1dgyyzjho->garbageCollect();
	}

	
	public function updateFormulaReferences($Vlzu0tioadk4 = '', $Vjc2xrk0yo3z = 'A1', $V2su05vxiqnr = 0, $Vfbjwfstqsr5 = 0, $Vhiaiwq5k152 = '') {
		
		$Vcxqegqho3g2 = explode('"',$Vlzu0tioadk4);
		$Vfhiq1lhsoja = false;
		foreach($Vcxqegqho3g2 as &$V2mlkt1m0ql3) {
			
			if ($Vfhiq1lhsoja = !$Vfhiq1lhsoja) {
				$Vi3y3l1uvwp3djustCount = 0;
				$Vg1oycjtqzti = $Vblc1ueqvbtiTokens = array();
				
				$Vtcp1w2ozxa0 = preg_match_all('/'.self::REFHELPER_REGEXP_ROWRANGE.'/i', ' '.$V2mlkt1m0ql3.' ', $Vt3xexsia3ta, PREG_SET_ORDER);
				if ($Vtcp1w2ozxa0 > 0) {
					foreach($Vt3xexsia3ta as $Vkvvdnwtmjnq) {
						$Vobo3bhpwnzv = ($Vkvvdnwtmjnq[2] > '') ? $Vkvvdnwtmjnq[2].'!' : '';
						$Vobo3bhpwnzv .= $Vkvvdnwtmjnq[3].':'.$Vkvvdnwtmjnq[4];
						$V3ehjiydpef4 = substr($this->updateCellReference('$Vk0c33a31nhe'.$Vkvvdnwtmjnq[3],$Vjc2xrk0yo3z,$V2su05vxiqnr,$Vfbjwfstqsr5),2);
						$V1prqbdj2n32 = substr($this->updateCellReference('$Vk0c33a31nhe'.$Vkvvdnwtmjnq[4],$Vjc2xrk0yo3z,$V2su05vxiqnr,$Vfbjwfstqsr5),2);

						if ($Vkvvdnwtmjnq[3].':'.$Vkvvdnwtmjnq[4] !== $V3ehjiydpef4.':'.$V1prqbdj2n32) {
							if (($Vkvvdnwtmjnq[2] == '') || (trim($Vkvvdnwtmjnq[2],"'") == $Vhiaiwq5k152)) {
								$Vbvu5td35fmn = ($Vkvvdnwtmjnq[2] > '') ? $Vkvvdnwtmjnq[2].'!' : '';
								$Vbvu5td35fmn .= $V3ehjiydpef4.':'.$V1prqbdj2n32;
								
								$Vn4q2p4mkwa0 = 100000;
								$Vexbtekafkvl = 10000000+trim($Vkvvdnwtmjnq[3],'$');
								$Vblc1ueqvbtiIndex = $Vn4q2p4mkwa0.$Vexbtekafkvl;

								$Vg1oycjtqzti[$Vblc1ueqvbtiIndex] = preg_quote($Vbvu5td35fmn);
								$Vblc1ueqvbtiTokens[$Vblc1ueqvbtiIndex] = '/(?<!\d\$\!)'.preg_quote($Vobo3bhpwnzv).'(?!\d)/i';
								++$Vi3y3l1uvwp3djustCount;
							}
						}
					}
				}
				
				$Vtcp1w2ozxa0 = preg_match_all('/'.self::REFHELPER_REGEXP_COLRANGE.'/i', ' '.$V2mlkt1m0ql3.' ', $Vt3xexsia3ta, PREG_SET_ORDER);
				if ($Vtcp1w2ozxa0 > 0) {
					foreach($Vt3xexsia3ta as $Vkvvdnwtmjnq) {
						$Vobo3bhpwnzv = ($Vkvvdnwtmjnq[2] > '') ? $Vkvvdnwtmjnq[2].'!' : '';
						$Vobo3bhpwnzv .= $Vkvvdnwtmjnq[3].':'.$Vkvvdnwtmjnq[4];
						$V3ehjiydpef4 = substr($this->updateCellReference($Vkvvdnwtmjnq[3].'$1',$Vjc2xrk0yo3z,$V2su05vxiqnr,$Vfbjwfstqsr5),0,-2);
						$V1prqbdj2n32 = substr($this->updateCellReference($Vkvvdnwtmjnq[4].'$1',$Vjc2xrk0yo3z,$V2su05vxiqnr,$Vfbjwfstqsr5),0,-2);

						if ($Vkvvdnwtmjnq[3].':'.$Vkvvdnwtmjnq[4] !== $V3ehjiydpef4.':'.$V1prqbdj2n32) {
							if (($Vkvvdnwtmjnq[2] == '') || (trim($Vkvvdnwtmjnq[2],"'") == $Vhiaiwq5k152)) {
								$Vbvu5td35fmn = ($Vkvvdnwtmjnq[2] > '') ? $Vkvvdnwtmjnq[2].'!' : '';
								$Vbvu5td35fmn .= $V3ehjiydpef4.':'.$V1prqbdj2n32;
								
								$Vn4q2p4mkwa0 = PHPExcel_Cell::columnIndexFromString(trim($Vkvvdnwtmjnq[3],'$')) + 100000;
								$Vexbtekafkvl = 10000000;
								$Vblc1ueqvbtiIndex = $Vn4q2p4mkwa0.$Vexbtekafkvl;

								$Vg1oycjtqzti[$Vblc1ueqvbtiIndex] = preg_quote($Vbvu5td35fmn);
								$Vblc1ueqvbtiTokens[$Vblc1ueqvbtiIndex] = '/(?<![A-Z\$\!])'.preg_quote($Vobo3bhpwnzv).'(?![A-Z])/i';
								++$Vi3y3l1uvwp3djustCount;
							}
						}
					}
				}
				
				$Vtcp1w2ozxa0 = preg_match_all('/'.self::REFHELPER_REGEXP_CELLRANGE.'/i', ' '.$V2mlkt1m0ql3.' ', $Vt3xexsia3ta, PREG_SET_ORDER);
				if ($Vtcp1w2ozxa0 > 0) {
					foreach($Vt3xexsia3ta as $Vkvvdnwtmjnq) {
						$Vobo3bhpwnzv = ($Vkvvdnwtmjnq[2] > '') ? $Vkvvdnwtmjnq[2].'!' : '';
						$Vobo3bhpwnzv .= $Vkvvdnwtmjnq[3].':'.$Vkvvdnwtmjnq[4];
						$V3ehjiydpef4 = $this->updateCellReference($Vkvvdnwtmjnq[3],$Vjc2xrk0yo3z,$V2su05vxiqnr,$Vfbjwfstqsr5);
						$V1prqbdj2n32 = $this->updateCellReference($Vkvvdnwtmjnq[4],$Vjc2xrk0yo3z,$V2su05vxiqnr,$Vfbjwfstqsr5);

						if ($Vkvvdnwtmjnq[3].$Vkvvdnwtmjnq[4] !== $V3ehjiydpef4.$V1prqbdj2n32) {
							if (($Vkvvdnwtmjnq[2] == '') || (trim($Vkvvdnwtmjnq[2],"'") == $Vhiaiwq5k152)) {
								$Vbvu5td35fmn = ($Vkvvdnwtmjnq[2] > '') ? $Vkvvdnwtmjnq[2].'!' : '';
								$Vbvu5td35fmn .= $V3ehjiydpef4.':'.$V1prqbdj2n32;
								list($Vn4q2p4mkwa0,$Vexbtekafkvl) = PHPExcel_Cell::coordinateFromString($Vkvvdnwtmjnq[3]);
								
								$Vn4q2p4mkwa0 = PHPExcel_Cell::columnIndexFromString(trim($Vn4q2p4mkwa0,'$')) + 100000;
								$Vexbtekafkvl = trim($Vexbtekafkvl,'$') + 10000000;
								$Vblc1ueqvbtiIndex = $Vn4q2p4mkwa0.$Vexbtekafkvl;

								$Vg1oycjtqzti[$Vblc1ueqvbtiIndex] = preg_quote($Vbvu5td35fmn);
								$Vblc1ueqvbtiTokens[$Vblc1ueqvbtiIndex] = '/(?<![A-Z]\$\!)'.preg_quote($Vobo3bhpwnzv).'(?!\d)/i';
								++$Vi3y3l1uvwp3djustCount;
							}
						}
					}
				}
				
				$Vtcp1w2ozxa0 = preg_match_all('/'.self::REFHELPER_REGEXP_CELLREF.'/i', ' '.$V2mlkt1m0ql3.' ', $Vt3xexsia3ta, PREG_SET_ORDER);

				if ($Vtcp1w2ozxa0 > 0) {
					foreach($Vt3xexsia3ta as $Vkvvdnwtmjnq) {
						$Vobo3bhpwnzv = ($Vkvvdnwtmjnq[2] > '') ? $Vkvvdnwtmjnq[2].'!' : '';
						$Vobo3bhpwnzv .= $Vkvvdnwtmjnq[3];

						$V3ehjiydpef4 = $this->updateCellReference($Vkvvdnwtmjnq[3],$Vjc2xrk0yo3z,$V2su05vxiqnr,$Vfbjwfstqsr5);
						if ($Vkvvdnwtmjnq[3] !== $V3ehjiydpef4) {
							if (($Vkvvdnwtmjnq[2] == '') || (trim($Vkvvdnwtmjnq[2],"'") == $Vhiaiwq5k152)) {
								$Vbvu5td35fmn = ($Vkvvdnwtmjnq[2] > '') ? $Vkvvdnwtmjnq[2].'!' : '';
								$Vbvu5td35fmn .= $V3ehjiydpef4;
								list($Vn4q2p4mkwa0,$Vexbtekafkvl) = PHPExcel_Cell::coordinateFromString($Vkvvdnwtmjnq[3]);
								
								$Vn4q2p4mkwa0 = PHPExcel_Cell::columnIndexFromString(trim($Vn4q2p4mkwa0,'$')) + 100000;
								$Vexbtekafkvl = trim($Vexbtekafkvl,'$') + 10000000;
								$Vblc1ueqvbtiIndex = $Vexbtekafkvl . $Vn4q2p4mkwa0;

								$Vg1oycjtqzti[$Vblc1ueqvbtiIndex] = preg_quote($Vbvu5td35fmn);
								$Vblc1ueqvbtiTokens[$Vblc1ueqvbtiIndex] = '/(?<![A-Z\$\!])'.preg_quote($Vobo3bhpwnzv).'(?!\d)/i';
								++$Vi3y3l1uvwp3djustCount;
							}
						}
					}
				}
				if ($Vi3y3l1uvwp3djustCount > 0) {
                    if ($V2su05vxiqnr > 0 || $Vfbjwfstqsr5 > 0) {
                        krsort($Vblc1ueqvbtiTokens);
                        krsort($Vg1oycjtqzti);
                      } else {
                        ksort($Vblc1ueqvbtiTokens);
                        ksort($Vg1oycjtqzti);
                    }   
					$V2mlkt1m0ql3 = str_replace('\\','',preg_replace($Vblc1ueqvbtiTokens,$Vg1oycjtqzti,$V2mlkt1m0ql3));
				}
			}
		}
		unset($V2mlkt1m0ql3);

		
		return implode('"',$Vcxqegqho3g2);
	}

	
	public function updateCellReference($Vyi2pgdorqun = 'A1', $Vjc2xrk0yo3z = 'A1', $V2su05vxiqnr = 0, $Vfbjwfstqsr5 = 0) {
		
		if (strpos($Vyi2pgdorqun, "!") !== false) {
			return $Vyi2pgdorqun;
		
		} elseif (strpos($Vyi2pgdorqun, ':') === false && strpos($Vyi2pgdorqun, ',') === false) {
			
			return $this->_updateSingleCellReference($Vyi2pgdorqun, $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5);
		} elseif (strpos($Vyi2pgdorqun, ':') !== false || strpos($Vyi2pgdorqun, ',') !== false) {
			
			return $this->_updateCellRange($Vyi2pgdorqun, $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5);
		} else {
			
			return $Vyi2pgdorqun;
		}
	}

	
	public function updateNamedFormulas(PHPExcel $Vlzgselyqnvq, $Vycu4nlsrj4k = '', $Vqvcuzxd4hpq = '') {
		if ($Vycu4nlsrj4k == '') {
			return;
		}

		foreach ($Vlzgselyqnvq->getWorksheetIterator() as $Vzg4jtrmmzdy) {
			foreach ($Vzg4jtrmmzdy->getCellCollection(false) as $Vhibevwz1gkx) {
				$Vblc1ueqvbti = $Vzg4jtrmmzdy->getCell($Vhibevwz1gkx);
				if (($Vblc1ueqvbti !== NULL) && ($Vblc1ueqvbti->getDataType() == PHPExcel_Cell_DataType::TYPE_FORMULA)) {
					$V22ivdjjfdx2 = $Vblc1ueqvbti->getValue();
					if (strpos($V22ivdjjfdx2, $Vycu4nlsrj4k) !== false) {
						$V22ivdjjfdx2 = str_replace("'" . $Vycu4nlsrj4k . "'!", "'" . $Vqvcuzxd4hpq . "'!", $V22ivdjjfdx2);
						$V22ivdjjfdx2 = str_replace($Vycu4nlsrj4k . "!", $Vqvcuzxd4hpq . "!", $V22ivdjjfdx2);
						$Vblc1ueqvbti->setValueExplicit($V22ivdjjfdx2, PHPExcel_Cell_DataType::TYPE_FORMULA);
					}
				}
			}
		}
	}

	
	private function _updateCellRange($Vyi2pgdorqun = 'A1:A1', $Vjc2xrk0yo3z = 'A1', $V2su05vxiqnr = 0, $Vfbjwfstqsr5 = 0) {
		if (strpos($Vyi2pgdorqun,':') !== false || strpos($Vyi2pgdorqun, ',') !== false) {
			
			$Votjg2jvcmjx = PHPExcel_Cell::splitRange($Vyi2pgdorqun);
			$Vfhiq1lhsojac = count($Votjg2jvcmjx);
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vfhiq1lhsojac; ++$Vfhiq1lhsoja) {
				$Vzmnqyqjjodwc = count($Votjg2jvcmjx[$Vfhiq1lhsoja]);
				for ($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vzmnqyqjjodwc; ++$Vzmnqyqjjodw) {
					if (ctype_alpha($Votjg2jvcmjx[$Vfhiq1lhsoja][$Vzmnqyqjjodw])) {
						$Vws44nszhvgo = PHPExcel_Cell::coordinateFromString($this->_updateSingleCellReference($Votjg2jvcmjx[$Vfhiq1lhsoja][$Vzmnqyqjjodw].'1', $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5));
						$Votjg2jvcmjx[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $Vws44nszhvgo[0];
					} elseif(ctype_digit($Votjg2jvcmjx[$Vfhiq1lhsoja][$Vzmnqyqjjodw])) {
						$Vws44nszhvgo = PHPExcel_Cell::coordinateFromString($this->_updateSingleCellReference('A'.$Votjg2jvcmjx[$Vfhiq1lhsoja][$Vzmnqyqjjodw], $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5));
						$Votjg2jvcmjx[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $Vws44nszhvgo[1];
					} else {
						$Votjg2jvcmjx[$Vfhiq1lhsoja][$Vzmnqyqjjodw] = $this->_updateSingleCellReference($Votjg2jvcmjx[$Vfhiq1lhsoja][$Vzmnqyqjjodw], $Vjc2xrk0yo3z, $V2su05vxiqnr, $Vfbjwfstqsr5);
					}
				}
			}

			
			return PHPExcel_Cell::buildRange($Votjg2jvcmjx);
		} else {
			throw new PHPExcel_Exception("Only cell ranges may be passed to this method.");
		}
	}

	
	private function _updateSingleCellReference($V253tuy5hl1m = 'A1', $Vjc2xrk0yo3z = 'A1', $V2su05vxiqnr = 0, $Vfbjwfstqsr5 = 0) {
		if (strpos($V253tuy5hl1m, ':') === false && strpos($V253tuy5hl1m, ',') === false) {
			
			list($V4t3fwdd3eeveforeColumn, $V4t3fwdd3eeveforeRow) = PHPExcel_Cell::coordinateFromString( $Vjc2xrk0yo3z );

			
			list($V51nnuwfu2g4, $Vgo4vdudutgi) = PHPExcel_Cell::coordinateFromString( $V253tuy5hl1m );

			
			$V2w3dvbvtk1w = (($V51nnuwfu2g4{0} != '$') && ($V4t3fwdd3eeveforeColumn{0} != '$') &&
							 PHPExcel_Cell::columnIndexFromString($V51nnuwfu2g4) >= PHPExcel_Cell::columnIndexFromString($V4t3fwdd3eeveforeColumn));
			$Vfe3xwwd22w5 = (($Vgo4vdudutgi{0} != '$') && ($V4t3fwdd3eeveforeRow{0} != '$') &&
						  $Vgo4vdudutgi >= $V4t3fwdd3eeveforeRow);

			
			if ($V2w3dvbvtk1w) {
				$V51nnuwfu2g4	= PHPExcel_Cell::stringFromColumnIndex( PHPExcel_Cell::columnIndexFromString($V51nnuwfu2g4) - 1 + $V2su05vxiqnr );
			}

			
			if ($Vfe3xwwd22w5) {
				$Vgo4vdudutgi	= $Vgo4vdudutgi + $Vfbjwfstqsr5;
			}

			
			return $V51nnuwfu2g4 . $Vgo4vdudutgi;
		} else {
			throw new PHPExcel_Exception("Only single cell references may be passed to this method.");
		}
	}

	
	public final function __clone() {
		throw new PHPExcel_Exception("Cloning a Singleton is not allowed!");
	}
}
