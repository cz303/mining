<?php







































class PHPExcel_Writer_Excel5_Worksheet extends PHPExcel_Writer_Excel5_BIFFwriter
{
	
	private $Vioggxdsw2hg;

	
	public $V2kehgsi5kj5;

	
	public $Vxmte5vezac4;

	
	public $Vvn41js52mx2;

	
	public $Vhx3guy1gwew;

	
	public $Vatbh0m4stjk;

	
	public $Vpscoioho20o;

	
	public $Vvfvpto0u4g5;

	
	public $Vdtes0fp0qhg;

	
	public $Vwwftqoydznv;

	
	public $V0jh252gprso;

	
	public $Vlode1twtari;

	
	private $V455onjk52rq;

	
	private $Vwfjqj0rpxlb;

	
	private $Vmhp0na1m1cs;

	
	private $Vjbflxdp5r5u;

	
	private $V2krkwloe2kv;

	
	public $Vpj20nyzfqd3;

	
	private $Vok4b5shvmaz;

	
	private $V5w0oja15iln;

	
	public $Vqv0kykcn2mv;

	
	public function __construct(&$V3fsgs5mwrfj, &$V4sjmkrq5tpr, &$Vfo0chqshiwo, &$Vjozyc2clnog,
								$Vgexjz5ocus2, $Vwkzoulnj4at, $V4chn2ic5gpu)
	{
		
		parent::__construct();

		



		$this->_preCalculateFormulas = $Vwkzoulnj4at;
		$this->_str_total		= &$V3fsgs5mwrfj;
		$this->_str_unique		= &$V4sjmkrq5tpr;
		$this->_str_table		= &$Vfo0chqshiwo;
		$this->_colors			= &$Vjozyc2clnog;
		$this->_parser			= $Vgexjz5ocus2;

		$this->_phpSheet = $V4chn2ic5gpu;

		
		
		$this->_xls_strmax		= 255;
		$this->_colinfo			= array();
		$this->_selection		= array(0,0,0,0);
		$this->_active_pane		= 3;

		$this->_print_headers		= 0;

		$this->_outline_style		= 0;
		$this->_outline_below		= 1;
		$this->_outline_right		= 1;
		$this->_outline_on			= 1;

		$this->_fntHashIndex	= array();

		
		$Vw14oyrttzj5 = 1;
		$Volbcseong5q = 'A';

		$Vkmwtjs0fry3  = $this->_phpSheet->getHighestRow();
		$Vd23ntigb5th = $this->_phpSheet->getHighestColumn();

		

		$this->_lastRowIndex = ($Vkmwtjs0fry3 > 65535) ? 65535 : $Vkmwtjs0fry3 ;

		$this->_firstColumnIndex	= PHPExcel_Cell::columnIndexFromString($Volbcseong5q);
		$this->_lastColumnIndex		= PHPExcel_Cell::columnIndexFromString($Vd23ntigb5th);


		if ($this->_lastColumnIndex > 255) $this->_lastColumnIndex = 255;

		$this->_countCellStyleXfs = count($V4chn2ic5gpu->getParent()->getCellStyleXfCollection());
	}

	
	function close()
	{
		$Vpj20nyzfqd3 = $this->_phpSheet;

		$V1lay4h3s0ey = $Vpj20nyzfqd3->getParent()->getSheetCount();

		
		$this->_storeBof(0x0010);

		
		$this->_writePrintHeaders();

		
		$this->_writePrintGridlines();

		
		$this->_writeGridset();

		
		$Vpj20nyzfqd3->calculateColumnWidths();

		
		if (($V2alccdqgbye = $Vpj20nyzfqd3->getDefaultColumnDimension()->getWidth()) < 0) {
			$V2alccdqgbye = PHPExcel_Shared_Font::getDefaultColumnWidthByFont($Vpj20nyzfqd3->getParent()->getDefaultStyle()->getFont());
		}

		$Vllatssh3cfb = $Vpj20nyzfqd3->getColumnDimensions();
		$Vd23ntigb5thol = $this->_lastColumnIndex -1;
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja <= $Vd23ntigb5thol; ++$Vfhiq1lhsoja) {
			$Vlksmoyzk4it = 0;
			$Vr1ehei34kfq = 0;
			$V4de3455flza = 15; 

			$Vojs2qdgagwv = $V2alccdqgbye;

			$Vdel5kw5u3ht = PHPExcel_Cell::stringFromColumnIndex($Vfhiq1lhsoja);
			if (isset($Vllatssh3cfb[$Vdel5kw5u3ht])) {
				$Vx1j2ylp4lrv = $Vllatssh3cfb[$Vdel5kw5u3ht];
				if ($Vx1j2ylp4lrv->getWidth() >= 0) {
					$Vojs2qdgagwv = $Vx1j2ylp4lrv->getWidth();
				}
				$Vlksmoyzk4it = $Vx1j2ylp4lrv->getVisible() ? 0 : 1;
				$Vr1ehei34kfq = $Vx1j2ylp4lrv->getOutlineLevel();
				$V4de3455flza = $Vx1j2ylp4lrv->getXfIndex() + 15; 
			}

			
			
			
			
			
			
			
			$this->_colinfo[] = array($Vfhiq1lhsoja, $Vfhiq1lhsoja, $Vojs2qdgagwv, $V4de3455flza, $Vlksmoyzk4it, $Vr1ehei34kfq);
		}

		
		$this->_writeGuts();

		
		$this->_writeDefaultRowHeight();

		
		$this->_writeWsbool();

		
		$this->_writeBreaks();

		
		$this->_writeHeader();

		
		$this->_writeFooter();

		
		$this->_writeHcenter();

		
		$this->_writeVcenter();

		
		$this->_writeMarginLeft();

		
		$this->_writeMarginRight();

		
		$this->_writeMarginTop();

		
		$this->_writeMarginBottom();

		
		$this->_writeSetup();

		
		$this->_writeProtect();

		
		$this->_writeScenProtect();

		
		$this->_writeObjectProtect();

		
		$this->_writePassword();

		
		$this->_writeDefcol();

		
		if (!empty($this->_colinfo)) {
			$Vkdz0cu23ggh = count($this->_colinfo);
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vkdz0cu23ggh; ++$Vfhiq1lhsoja) {
				$this->_writeColinfo($this->_colinfo[$Vfhiq1lhsoja]);
			}
		}
		$Vf22y2ugjneq = $Vpj20nyzfqd3->getAutoFilter()->getRange();
		if (!empty($Vf22y2ugjneq)) {
			
			$this->_writeAutoFilterInfo();
		}

		
		$this->_writeDimensions();

		
		foreach ($Vpj20nyzfqd3->getRowDimensions() as $Vkmxwmhd3woe) {
			$V4de3455flza = $Vkmxwmhd3woe->getXfIndex() + 15; 
			$this->_writeRow( $Vkmxwmhd3woe->getRowIndex() - 1, $Vkmxwmhd3woe->getRowHeight(), $V4de3455flza, ($Vkmxwmhd3woe->getVisible() ? '0' : '1'), $Vkmxwmhd3woe->getOutlineLevel() );
		}

		
		foreach ($Vpj20nyzfqd3->getCellCollection() as $Vhibevwz1gkx) {
			$Vblc1ueqvbti = $Vpj20nyzfqd3->getCell($Vhibevwz1gkx);
			$Vexbtekafkvl = $Vblc1ueqvbti->getRow() - 1;
			$Vn4q2p4mkwa0 = PHPExcel_Cell::columnIndexFromString($Vblc1ueqvbti->getColumn()) - 1;

			

			if ($Vexbtekafkvl > 65535 || $Vn4q2p4mkwa0 > 255) {
				break;
			}

			
			$V4de3455flza = $Vblc1ueqvbti->getXfIndex() + 15; 

			$Vmdurqm3efdh = $Vblc1ueqvbti->getValue();
			if ($Vmdurqm3efdh instanceof PHPExcel_RichText) {
				
				$Vadnxvwn0uwn = array();
				$V0wwovpacgby = PHPExcel_Shared_String::CountCharacters($Vmdurqm3efdh->getPlainText(), 'UTF-8');
				$Vzbofrldi0a5 = 0;
				$Vqy5grnvvrgx = $Vmdurqm3efdh->getRichTextElements();
				foreach ($Vqy5grnvvrgx as $Vltoddaysjlm) {
					
					if ($Vltoddaysjlm instanceof PHPExcel_RichText_Run) {
						$Virsxfp0co2i = $this->_fntHashIndex[$Vltoddaysjlm->getFont()->getHashCode()];
					}
					else {
						$Virsxfp0co2i = 0;
					}
					$Vadnxvwn0uwn[] = array('strlen' => $Vzbofrldi0a5, 'fontidx' => $Virsxfp0co2i);
					
					$Vzbofrldi0a5 += PHPExcel_Shared_String::CountCharacters($Vltoddaysjlm->getText(), 'UTF-8');
				}
				$this->_writeRichTextString($Vexbtekafkvl, $Vn4q2p4mkwa0, $Vmdurqm3efdh->getPlainText(), $V4de3455flza, $Vadnxvwn0uwn);
			} else {
				switch ($Vblc1ueqvbti->getDatatype()) {
					case PHPExcel_Cell_DataType::TYPE_STRING:
					case PHPExcel_Cell_DataType::TYPE_NULL:
						if ($Vmdurqm3efdh === '' || $Vmdurqm3efdh === null) {
							$this->_writeBlank($Vexbtekafkvl, $Vn4q2p4mkwa0, $V4de3455flza);
						} else {
							$this->_writeString($Vexbtekafkvl, $Vn4q2p4mkwa0, $Vmdurqm3efdh, $V4de3455flza);
						}
						break;

					case PHPExcel_Cell_DataType::TYPE_NUMERIC:
						$this->_writeNumber($Vexbtekafkvl, $Vn4q2p4mkwa0, $Vmdurqm3efdh, $V4de3455flza);
						break;

					case PHPExcel_Cell_DataType::TYPE_FORMULA:
						$Vhibovme1fp2 = $this->_preCalculateFormulas ?
							$Vblc1ueqvbti->getCalculatedValue() : null;
						$this->_writeFormula($Vexbtekafkvl, $Vn4q2p4mkwa0, $Vmdurqm3efdh, $V4de3455flza, $Vhibovme1fp2);
						break;

					case PHPExcel_Cell_DataType::TYPE_BOOL:
						$this->_writeBoolErr($Vexbtekafkvl, $Vn4q2p4mkwa0, $Vmdurqm3efdh, 0, $V4de3455flza);
						break;

					case PHPExcel_Cell_DataType::TYPE_ERROR:
						$this->_writeBoolErr($Vexbtekafkvl, $Vn4q2p4mkwa0, self::_mapErrorCode($Vmdurqm3efdh), 1, $V4de3455flza);
						break;

				}
			}
		}

		
		$this->_writeMsoDrawing();

		
		$this->_writeWindow2();

		
		$this->_writePageLayoutView();

		
		$this->_writeZoom();
		if ($Vpj20nyzfqd3->getFreezePane()) {
			$this->_writePanes();
		}

		
		$this->_writeSelection();

		
		$this->_writeMergedCells();

		
		foreach ($Vpj20nyzfqd3->getHyperLinkCollection() as $Vwykjuif1nf3 => $Vi45zv3gvg3s) {
			list($Vn4q2p4mkwa0, $Vexbtekafkvl) = PHPExcel_Cell::coordinateFromString($Vwykjuif1nf3);

			$Vbfatyoohaps = $Vi45zv3gvg3s->getUrl();

			if ( strpos($Vbfatyoohaps, 'sheet://') !== false ) {
				
				$Vbfatyoohaps = str_replace('sheet://', 'internal:', $Vbfatyoohaps);

			} else if ( preg_match('/^(http:|https:|ftp:|mailto:)/', $Vbfatyoohaps) ) {
				
				

			} else {
				
				$Vbfatyoohaps = 'external:' . $Vbfatyoohaps;
			}

			$this->_writeUrl($Vexbtekafkvl - 1, PHPExcel_Cell::columnIndexFromString($Vn4q2p4mkwa0) - 1, $Vbfatyoohaps);
		}

		$this->_writeDataValidity();
		$this->_writeSheetLayout();

		
		$this->_writeSheetProtection();
		$this->_writeRangeProtection();

		$Vnpzi5idbizn = $Vpj20nyzfqd3->getConditionalStylesCollection();
		if(!empty($Vnpzi5idbizn)){
			$V3sw50lzu5qb = array();
			
			
			$this->_writeCFHeader();
			
			foreach ($Vnpzi5idbizn as $Vblc1ueqvbtiCoordinate => $Vrlulqrqtem4) {
				foreach ($Vrlulqrqtem4 as $Vtvntwrrzi5t) {
					if($Vtvntwrrzi5t->getConditionType() == PHPExcel_Style_Conditional::CONDITION_EXPRESSION
						|| $Vtvntwrrzi5t->getConditionType() == PHPExcel_Style_Conditional::CONDITION_CELLIS){
						if(!in_array($Vtvntwrrzi5t->getHashCode(), $V3sw50lzu5qb)){
							$V3sw50lzu5qb[] = $Vtvntwrrzi5t->getHashCode();
							
							$this->_writeCFRule($Vtvntwrrzi5t);
						}
					}
				}
			}
		}

		$this->_storeEof();
	}

	
	private function _writeBIFF8CellRangeAddressFixed($Votjg2jvcmjx = 'A1')
	{
		$Vjkisdstwe45 = explode(':', $Votjg2jvcmjx);

		
		$Vl4ebvnrq2dl = $Vjkisdstwe45[0];

		
		if (count($Vjkisdstwe45) == 1) {
			$Vywna2a4bpcx = $Vl4ebvnrq2dl;
		} else {
			$Vywna2a4bpcx = $Vjkisdstwe45[1];
		}

		$Vl4ebvnrq2dlCoordinates = PHPExcel_Cell::coordinateFromString($Vl4ebvnrq2dl); 
		$Vywna2a4bpcxCoordinates  = PHPExcel_Cell::coordinateFromString($Vywna2a4bpcx);  

		return(pack('vvvv',
			$Vl4ebvnrq2dlCoordinates[1] - 1,
			$Vywna2a4bpcxCoordinates[1] - 1,
			PHPExcel_Cell::columnIndexFromString($Vl4ebvnrq2dlCoordinates[0]) - 1,
			PHPExcel_Cell::columnIndexFromString($Vywna2a4bpcxCoordinates[0]) - 1
		));
	}

	
	function getData()
	{
		$Vgt5ot3ewjk4 = 4096;

		
		if (isset($this->_data)) {
			$Vdln1z2oxpjs   = $this->_data;
			unset($this->_data);
			return $Vdln1z2oxpjs;
		}
		
		return false;
	}

	
	function printRowColHeaders($Vyl03mdqtt1i = 1)
	{
		$this->_print_headers = $Vyl03mdqtt1i;
	}

	
	function setOutline($Vyfkg14hzgxy = true, $V0xl2rec042m = true, $Vqnouq5nmgbe = true, $Vngysxggtoc1 = false)
	{
		$this->_outline_on	= $Vyfkg14hzgxy;
		$this->_outline_below = $V0xl2rec042m;
		$this->_outline_right = $Vqnouq5nmgbe;
		$this->_outline_style = $Vngysxggtoc1;

		
		if ($this->_outline_on) {
			$this->_outline_on = 1;
		}
	 }

	
	private function _writeNumber($Vexbtekafkvl, $Vswazvoa3xts, $Vcgbfu1dtv3l, $V4de3455flza)
	{
		$Vkry1ureuzsj	= 0x0203;				 
		$Volq3gdvkuqp	= 0x000E;				 

		$Vl5rjgb1nsf3		= pack("vv",  $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe		= pack("vvv", $Vexbtekafkvl, $Vswazvoa3xts, $V4de3455flza);
		$Vqrzhlfdgkcj	= pack("d",   $Vcgbfu1dtv3l);
		if (self::getByteOrder()) { 
			$Vqrzhlfdgkcj = strrev($Vqrzhlfdgkcj);
		}

		$this->_append($Vl5rjgb1nsf3.$Vou4vxorrdoe.$Vqrzhlfdgkcj);
		return(0);
	}

	
	private function _writeString($Vexbtekafkvl, $Vswazvoa3xts, $Vyqctydehp2e, $V4de3455flza)
	{
		$this->_writeLabelSst($Vexbtekafkvl, $Vswazvoa3xts, $Vyqctydehp2e, $V4de3455flza);
	}

	
	private function _writeRichTextString($Vexbtekafkvl, $Vswazvoa3xts, $Vyqctydehp2e, $V4de3455flza, $Vadnxvwn0uwn){
		$Vkry1ureuzsj	= 0x00FD;				   
		$Volq3gdvkuqp	= 0x000A;				   
		$Vyqctydehp2e = PHPExcel_Shared_String::UTF8toBIFF8UnicodeShort($Vyqctydehp2e, $Vadnxvwn0uwn);

		
		if (!isset($this->_str_table[$Vyqctydehp2e])) {
			$this->_str_table[$Vyqctydehp2e] = $this->_str_unique++;
		}
		$this->_str_total++;

		$Vl5rjgb1nsf3	= pack('vv',   $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	= pack('vvvV', $Vexbtekafkvl, $Vswazvoa3xts, $V4de3455flza, $this->_str_table[$Vyqctydehp2e]);
		$this->_append($Vl5rjgb1nsf3.$Vou4vxorrdoe);
	}

	
	private function _writeLabel($Vexbtekafkvl, $Vswazvoa3xts, $Vyqctydehp2e, $V4de3455flza)
	{
		$Vyqctydehp2elen	= strlen($Vyqctydehp2e);
		$Vkry1ureuzsj	= 0x0204;				   
		$Volq3gdvkuqp	= 0x0008 + $Vyqctydehp2elen;		 

		$Vyqctydehp2e_error = 0;

		if ($Vyqctydehp2elen > $this->_xls_strmax) { 
			$Vyqctydehp2e	= substr($Vyqctydehp2e, 0, $this->_xls_strmax);
			$Volq3gdvkuqp	= 0x0008 + $this->_xls_strmax;
			$Vyqctydehp2elen	= $this->_xls_strmax;
			$Vyqctydehp2e_error = -3;
		}

		$Vl5rjgb1nsf3	= pack("vv",   $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	= pack("vvvv", $Vexbtekafkvl, $Vswazvoa3xts, $V4de3455flza, $Vyqctydehp2elen);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe . $Vyqctydehp2e);
		return($Vyqctydehp2e_error);
	}

	
	private function _writeLabelSst($Vexbtekafkvl, $Vswazvoa3xts, $Vyqctydehp2e, $V4de3455flza)
	{
		$Vkry1ureuzsj	= 0x00FD;				   
		$Volq3gdvkuqp	= 0x000A;				   

		$Vyqctydehp2e = PHPExcel_Shared_String::UTF8toBIFF8UnicodeLong($Vyqctydehp2e);

		
		if (!isset($this->_str_table[$Vyqctydehp2e])) {
			$this->_str_table[$Vyqctydehp2e] = $this->_str_unique++;
		}
		$this->_str_total++;

		$Vl5rjgb1nsf3	= pack('vv',   $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	= pack('vvvV', $Vexbtekafkvl, $Vswazvoa3xts, $V4de3455flza, $this->_str_table[$Vyqctydehp2e]);
		$this->_append($Vl5rjgb1nsf3.$Vou4vxorrdoe);
	}

	
	private function _writeNote($Vexbtekafkvl, $Vswazvoa3xts, $Vngakhfafdvo)
	{
		$Vngakhfafdvo_length	= strlen($Vngakhfafdvo);
		$Vkry1ureuzsj			= 0x001C;			
		$V1edti22pwta		= 2048;				

		
		$Volq3gdvkuqp	= 0x0006 + min($Vngakhfafdvo_length, 2048);
		$Vl5rjgb1nsf3	= pack("vv",   $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	= pack("vvv", $Vexbtekafkvl, $Vswazvoa3xts, $Vngakhfafdvo_length);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe . substr($Vngakhfafdvo, 0, 2048));

		for ($Vfhiq1lhsoja = $V1edti22pwta; $Vfhiq1lhsoja < $Vngakhfafdvo_length; $Vfhiq1lhsoja += $V1edti22pwta) {
			$Vyc5hcidmary  = substr($Vngakhfafdvo, $Vfhiq1lhsoja, $V1edti22pwta);
			$Volq3gdvkuqp = 0x0006 + strlen($Vyc5hcidmary);
			$Vl5rjgb1nsf3 = pack("vv",   $Vkry1ureuzsj, $Volq3gdvkuqp);
			$Vou4vxorrdoe   = pack("vvv", -1, 0, strlen($Vyc5hcidmary));
			$this->_append($Vl5rjgb1nsf3.$Vou4vxorrdoe.$Vyc5hcidmary);
		}
		return(0);
	}

	
	function _writeBlank($Vexbtekafkvl, $Vswazvoa3xts, $V4de3455flza)
	{
		$Vkry1ureuzsj	= 0x0201;				 
		$Volq3gdvkuqp	= 0x0006;				 

		$Vl5rjgb1nsf3	= pack("vv",  $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	  = pack("vvv", $Vexbtekafkvl, $Vswazvoa3xts, $V4de3455flza);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
		return 0;
	}

	
	private function _writeBoolErr($Vexbtekafkvl, $Vswazvoa3xts, $Vp4xjtpabm0l, $Vfhiq1lhsojasError, $V4de3455flza)
	{
		$Vkry1ureuzsj = 0x0205;
		$Volq3gdvkuqp = 8;

		$Vl5rjgb1nsf3	= pack("vv",  $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	  = pack("vvvCC", $Vexbtekafkvl, $Vswazvoa3xts, $V4de3455flza, $Vp4xjtpabm0l, $Vfhiq1lhsojasError);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
		return 0;
	}

	
	private function _writeFormula($Vexbtekafkvl, $Vswazvoa3xts, $V22ivdjjfdx2, $V4de3455flza, $Vhibovme1fp2)
	{
		$Vkry1ureuzsj	= 0x0006;	 

		
		$Vyqctydehp2eingValue = null;

		
		if (isset($Vhibovme1fp2)) {
			
			
			if (is_bool($Vhibovme1fp2)) {
				
				$Vcgbfu1dtv3l = pack('CCCvCv', 0x01, 0x00, (int)$Vhibovme1fp2, 0x00, 0x00, 0xFFFF);
			} elseif (is_int($Vhibovme1fp2) || is_float($Vhibovme1fp2)) {
				
				$Vcgbfu1dtv3l = pack('d', $Vhibovme1fp2);
			} elseif (is_string($Vhibovme1fp2)) {
				if (array_key_exists($Vhibovme1fp2, PHPExcel_Cell_DataType::getErrorCodes())) {
					
					$Vcgbfu1dtv3l = pack('CCCvCv', 0x02, 0x00, self::_mapErrorCode($Vhibovme1fp2), 0x00, 0x00, 0xFFFF);
				} elseif ($Vhibovme1fp2 === '') {
					
					$Vcgbfu1dtv3l = pack('CCCvCv', 0x03, 0x00, 0x00, 0x00, 0x00, 0xFFFF);
				} else {
					
					$Vyqctydehp2eingValue = $Vhibovme1fp2;
					$Vcgbfu1dtv3l = pack('CCCvCv', 0x00, 0x00, 0x00, 0x00, 0x00, 0xFFFF);
				}
			} else {
				
				$Vcgbfu1dtv3l = pack('d', 0x00);
			}
		} else {
			$Vcgbfu1dtv3l = pack('d', 0x00);
		}

		$V4so2o2kxsqi		= 0x03;				
		$Vxe3leehigt3	= 0x0000;			

		
		if ($V22ivdjjfdx2{0} == '=') {
			$V22ivdjjfdx2 = substr($V22ivdjjfdx2,1);
		} else {
			
			$this->_writeString($Vexbtekafkvl, $Vswazvoa3xts, 'Unrecognised character for formula');
			return -1;
		}

		
		try {
			$Vyrkodvljby0 = $this->_parser->parse($V22ivdjjfdx2);
			$V22ivdjjfdx2 = $this->_parser->toReversePolish();

			$V22arncw2zws	= strlen($V22ivdjjfdx2);	
			$Volq3gdvkuqp	 = 0x16 + $V22arncw2zws;	 

			$Vl5rjgb1nsf3	= pack("vv",	  $Vkry1ureuzsj, $Volq3gdvkuqp);

			$Vou4vxorrdoe	  = pack("vvv", $Vexbtekafkvl, $Vswazvoa3xts, $V4de3455flza)
						. $Vcgbfu1dtv3l
						. pack("vVv", $V4so2o2kxsqi, $Vxe3leehigt3, $V22arncw2zws);
			$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe . $V22ivdjjfdx2);

			
			if ($Vyqctydehp2eingValue !== null) {
				$this->_writeStringRecord($Vyqctydehp2eingValue);
			}

			return 0;

		} catch (PHPExcel_Exception $Vnhm0uuykimv) {
			
		}

	}

	
	private function _writeStringRecord($Vyqctydehp2eingValue)
	{
		$Vkry1ureuzsj = 0x0207;	 
		$Vou4vxorrdoe = PHPExcel_Shared_String::UTF8toBIFF8UnicodeLong($Vyqctydehp2eingValue);

		$Volq3gdvkuqp = strlen($Vou4vxorrdoe);
		$Vl5rjgb1nsf3 = pack('vv', $Vkry1ureuzsj, $Volq3gdvkuqp);

		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeUrl($Vexbtekafkvl, $Vswazvoa3xts, $Vbfatyoohaps)
	{
		
		return($this->_writeUrlRange($Vexbtekafkvl, $Vswazvoa3xts, $Vexbtekafkvl, $Vswazvoa3xts, $Vbfatyoohaps));
	}

	
	function _writeUrlRange($Vexbtekafkvl1, $Vswazvoa3xts1, $Vexbtekafkvl2, $Vswazvoa3xts2, $Vbfatyoohaps)
	{
		
		if (preg_match('[^internal:]', $Vbfatyoohaps)) {
			return($this->_writeUrlInternal($Vexbtekafkvl1, $Vswazvoa3xts1, $Vexbtekafkvl2, $Vswazvoa3xts2, $Vbfatyoohaps));
		}
		if (preg_match('[^external:]', $Vbfatyoohaps)) {
			return($this->_writeUrlExternal($Vexbtekafkvl1, $Vswazvoa3xts1, $Vexbtekafkvl2, $Vswazvoa3xts2, $Vbfatyoohaps));
		}
		return($this->_writeUrlWeb($Vexbtekafkvl1, $Vswazvoa3xts1, $Vexbtekafkvl2, $Vswazvoa3xts2, $Vbfatyoohaps));
	}

	
	function _writeUrlWeb($Vexbtekafkvl1, $Vswazvoa3xts1, $Vexbtekafkvl2, $Vswazvoa3xts2, $Vbfatyoohaps)
	{
		$Vkry1ureuzsj	  = 0x01B8;					   
		$Volq3gdvkuqp	  = 0x00000;					  

		
		$Vxe3leehigt31	= pack("H*", "D0C9EA79F9BACE118C8200AA004BA90B02000000");
		$Vxe3leehigt32	= pack("H*", "E0C9EA79F9BACE118C8200AA004BA90B");

		
		$Vobxlvad3352	 = pack("V", 0x03);

		
		$Vbfatyoohaps		 = join("\0", preg_split("''", $Vbfatyoohaps, -1, PREG_SPLIT_NO_EMPTY));
		$Vbfatyoohaps		 = $Vbfatyoohaps . "\0\0\0";

		
		$Vbfatyoohaps_len	 = pack("V", strlen($Vbfatyoohaps));

		
		$Volq3gdvkuqp	  = 0x34 + strlen($Vbfatyoohaps);

		
		$Vl5rjgb1nsf3	  = pack("vv",   $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe		= pack("vvvv", $Vexbtekafkvl1, $Vexbtekafkvl2, $Vswazvoa3xts1, $Vswazvoa3xts2);

		
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe .
					   $Vxe3leehigt31 . $Vobxlvad3352 .
					   $Vxe3leehigt32 . $Vbfatyoohaps_len . $Vbfatyoohaps);
		return 0;
	}

	
	function _writeUrlInternal($Vexbtekafkvl1, $Vswazvoa3xts1, $Vexbtekafkvl2, $Vswazvoa3xts2, $Vbfatyoohaps)
	{
		$Vkry1ureuzsj	  = 0x01B8;					   
		$Volq3gdvkuqp	  = 0x00000;					  

		
		$Vbfatyoohaps = preg_replace('/^internal:/', '', $Vbfatyoohaps);

		
		$Vxe3leehigt31	= pack("H*", "D0C9EA79F9BACE118C8200AA004BA90B02000000");

		
		$Vobxlvad3352	 = pack("V", 0x08);

		
		$Vbfatyoohaps .= "\0";

		
		$Vbfatyoohaps_len = PHPExcel_Shared_String::CountCharacters($Vbfatyoohaps);
		$Vbfatyoohaps_len = pack('V', $Vbfatyoohaps_len);

		$Vbfatyoohaps = PHPExcel_Shared_String::ConvertEncoding($Vbfatyoohaps, 'UTF-16LE', 'UTF-8');

		
		$Volq3gdvkuqp	  = 0x24 + strlen($Vbfatyoohaps);

		
		$Vl5rjgb1nsf3	  = pack("vv",   $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe		= pack("vvvv", $Vexbtekafkvl1, $Vexbtekafkvl2, $Vswazvoa3xts1, $Vswazvoa3xts2);

		
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe .
					   $Vxe3leehigt31 . $Vobxlvad3352 .
					   $Vbfatyoohaps_len . $Vbfatyoohaps);
		return 0;
	}

	
	function _writeUrlExternal($Vexbtekafkvl1, $Vswazvoa3xts1, $Vexbtekafkvl2, $Vswazvoa3xts2, $Vbfatyoohaps)
	{
		
		
		if (preg_match('[^external:\\\\]', $Vbfatyoohaps)) {
			return; 
		}

		$Vkry1ureuzsj	  = 0x01B8;					   
		$Volq3gdvkuqp	  = 0x00000;					  

		
		
		$Vbfatyoohaps = preg_replace('/^external:/', '', $Vbfatyoohaps);
		$Vbfatyoohaps = preg_replace('/\//', "\\", $Vbfatyoohaps);

		
		
		
		

		$Vbnlhgmdu3nf = 0x00; 
		if ( preg_match('/^[A-Z]:/', $Vbfatyoohaps) ) {
			$Vbnlhgmdu3nf = 0x02; 
		}
		$Vjs2ebkrxjfh			   = 0x01 | $Vbnlhgmdu3nf;

		
		
		
		$Veg4yvuuj4oo = $Vbfatyoohaps;
		if (preg_match("/\#/", $Vbfatyoohaps)) {
			$Vjs2ebkrxjfh |= 0x08;
		}


		
		$Vjs2ebkrxjfh   = pack("V", $Vjs2ebkrxjfh);

		
		$Vh43wtcymalc	= preg_match_all("/\.\.\\\/", $Veg4yvuuj4oo, $V1k4fzrzji5c);
		$Vh43wtcymalc	= pack("v", $Vh43wtcymalc);

		
		$Vln4yrh4geiy   = preg_replace("/\.\.\\\/", '', $Veg4yvuuj4oo) . "\0";

		
		$Veg4yvuuj4oo	   = $Veg4yvuuj4oo . "\0";

		
		$Vln4yrh4geiy_len = pack("V", strlen($Vln4yrh4geiy)	  );
		$Veg4yvuuj4oo_len  = pack("V", strlen($Veg4yvuuj4oo)	   );
		$Vyqctydehp2eeam_len	= pack("V", 0);

		
		$Vxe3leehigt31 = pack("H*",'D0C9EA79F9BACE118C8200AA004BA90B02000000'	   );
		$Vxe3leehigt32 = pack("H*",'0303000000000000C000000000000046'			   );
		$Vxe3leehigt33 = pack("H*",'FFFFADDE000000000000000000000000000000000000000');
		$Vxe3leehigt34 = pack("v",  0x03											);

		
		$Vou4vxorrdoe		= pack("vvvv", $Vexbtekafkvl1, $Vexbtekafkvl2, $Vswazvoa3xts1, $Vswazvoa3xts2) .
						  $Vxe3leehigt31	 .
						  $Vjs2ebkrxjfh	.
						  $Vxe3leehigt32	 .
						  $Vh43wtcymalc	 .
						  $Vln4yrh4geiy_len.
						  $Vln4yrh4geiy	.
						  $Vxe3leehigt33	 .
						  $Vyqctydehp2eeam_len   ;

		
		$Volq3gdvkuqp   = strlen($Vou4vxorrdoe);
		$Vl5rjgb1nsf3   = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);

		
		$this->_append($Vl5rjgb1nsf3. $Vou4vxorrdoe);
		return 0;
	}

	
	private function _writeRow($Vexbtekafkvl, $Vzo4g5xb4yip, $V4de3455flza, $Vlksmoyzk4it = false, $Vr1ehei34kfq = 0)
	{
		$Vkry1ureuzsj	  = 0x0208;			   
		$Volq3gdvkuqp	  = 0x0010;			   

		$Vswazvoa3xtsMic	  = 0x0000;			   
		$Vswazvoa3xtsMac	  = 0x0000;			   
		$Vfhiq1lhsojarwMac	  = 0x0000;			   
		$Vierxt2vjb5a	= 0x0000;			   
		$V4so2o2kxsqi	   = 0x0000;			   
		$Vfhiq1lhsojaxfe		= $V4de3455flza;

		if ( $Vzo4g5xb4yip < 0 ){
			$Vzo4g5xb4yip = null;
		}

		
		if ($Vzo4g5xb4yip != null) {
			$V3lgztn3slmh = $Vzo4g5xb4yip * 20;  
		} else {
			$V3lgztn3slmh = 0xff;		  
		}

		
		
		
		
		

		$V4so2o2kxsqi |= $Vr1ehei34kfq;
		if ($Vlksmoyzk4it) {
			$V4so2o2kxsqi |= 0x0030;
		}
		if ($Vzo4g5xb4yip !== null) {
			$V4so2o2kxsqi |= 0x0040; 
		}
		if ($V4de3455flza !== 0xF) {
			$V4so2o2kxsqi |= 0x0080;
		}
		$V4so2o2kxsqi |= 0x0100;

		$Vl5rjgb1nsf3   = pack("vv",	   $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	 = pack("vvvvvvvv", $Vexbtekafkvl, $Vswazvoa3xtsMic, $Vswazvoa3xtsMac, $V3lgztn3slmh,
									 $Vfhiq1lhsojarwMac,$Vierxt2vjb5a, $V4so2o2kxsqi, $Vfhiq1lhsojaxfe);
		$this->_append($Vl5rjgb1nsf3.$Vou4vxorrdoe);
	}

	
	private function _writeDimensions()
	{
		$Vkry1ureuzsj = 0x0200; 

		$Volq3gdvkuqp = 0x000E;
		$Vou4vxorrdoe = pack('VVvvv'
				, $this->_firstRowIndex
				, $this->_lastRowIndex + 1
				, $this->_firstColumnIndex
				, $this->_lastColumnIndex + 1
				, 0x0000 
			);

		$Vl5rjgb1nsf3 = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$this->_append($Vl5rjgb1nsf3.$Vou4vxorrdoe);
	}

	
	private function _writeWindow2()
	{
		$Vkry1ureuzsj		 = 0x023E;	 
		$Volq3gdvkuqp		 = 0x0012;

		$V4so2o2kxsqi		  = 0x00B6;	 
		$Vx3st5qp53k3		  = 0x0000;	 
		$Vswazvoa3xtsLeft		= 0x0000;	 


		
		$V5b5wnitf5fs	   = 0;					 
		$Vga2o41ge14g	   = $this->_phpSheet->getShowGridlines() ? 1 : 0; 
		$Vjvtp4k5swzv	  = $this->_phpSheet->getShowRowColHeaders() ? 1 : 0; 
		$Vrc1k3pubjej		= $this->_phpSheet->getFreezePane() ? 1 : 0;		
		$Vp2avchk5y5k	  = 1;					 
		$Vgcq2cav4cwx	= 1;					 
		$Vfv3k4rgifhy		= $this->_phpSheet->getRightToLeft() ? 1 : 0; 
		$Vu23wbh2ilgm	   = $this->_outline_on;	
		$Vrc1k3pubjejNoSplit = 0;					 
		
		$Vzof4ku5ztom	  = ($this->_phpSheet === $this->_phpSheet->getParent()->getActiveSheet()) ? 1 : 0;
		$Vo1cto15ob1h		 = 1;					 
		$Vltnmdrgzmez = $this->_phpSheet->getSheetView()->getView() === PHPExcel_Worksheet_SheetView::SHEETVIEW_PAGE_BREAK_PREVIEW;

		$V4so2o2kxsqi			 = $V5b5wnitf5fs;
		$V4so2o2kxsqi			|= $Vga2o41ge14g	   << 1;
		$V4so2o2kxsqi			|= $Vjvtp4k5swzv	   << 2;
		$V4so2o2kxsqi			|= $Vrc1k3pubjej		   << 3;
		$V4so2o2kxsqi			|= $Vp2avchk5y5k	   << 4;
		$V4so2o2kxsqi			|= $Vgcq2cav4cwx	   << 5;
		$V4so2o2kxsqi			|= $Vfv3k4rgifhy		   << 6;
		$V4so2o2kxsqi			|= $Vu23wbh2ilgm	   << 7;
		$V4so2o2kxsqi			|= $Vrc1k3pubjejNoSplit << 8;
		$V4so2o2kxsqi			|= $Vzof4ku5ztom	   << 9;
		$V4so2o2kxsqi			|= $Vo1cto15ob1h		   << 10;
		$V4so2o2kxsqi			|= $Vltnmdrgzmez << 11;

		$Vl5rjgb1nsf3  = pack("vv",   $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	= pack("vvv", $V4so2o2kxsqi, $Vx3st5qp53k3, $Vswazvoa3xtsLeft);

		
		$Vnwmvn0aasar	   = 0x0040; 
		$Vx515ci203iq = ($Vltnmdrgzmez? $this->_phpSheet->getSheetView()->getZoomScale() : 0x0000);
		$Vroizmemcty3 =  $this->_phpSheet->getSheetView()->getZoomScaleNormal();

		$Vou4vxorrdoe .= pack("vvvvV", $Vnwmvn0aasar, 0x0000, $Vx515ci203iq, $Vroizmemcty3, 0x00000000);

		$this->_append($Vl5rjgb1nsf3.$Vou4vxorrdoe);
	}

	
	private function _writeDefaultRowHeight()
	{
		$Vfk0ihdbf12i = $this->_phpSheet->getDefaultRowDimension()->getRowHeight();

		if ($Vfk0ihdbf12i < 0) {
			return;
		}

		
		$Vfk0ihdbf12i = (int) 20 * $Vfk0ihdbf12i;

		$Vkry1ureuzsj   = 0x0225;	  
		$Volq3gdvkuqp   = 0x0004;	  

		$Vl5rjgb1nsf3   = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	 = pack("vv",  1, $Vfk0ihdbf12i);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeDefcol()
	{
		$Vzojgtedddql = 8;

		$Vkry1ureuzsj   = 0x0055;	  
		$Volq3gdvkuqp   = 0x0002;	  

		$Vl5rjgb1nsf3 = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe = pack("v", $Vzojgtedddql);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeColinfo($Vswazvoa3xts_array)
	{
		if (isset($Vswazvoa3xts_array[0])) {
			$Vswazvoa3xtsFirst = $Vswazvoa3xts_array[0];
		}
		if (isset($Vswazvoa3xts_array[1])) {
			$Vswazvoa3xtsLast = $Vswazvoa3xts_array[1];
		}
		if (isset($Vswazvoa3xts_array[2])) {
			$Vswazvoa3xtsdx = $Vswazvoa3xts_array[2];
		} else {
			$Vswazvoa3xtsdx = 8.43;
		}
		if (isset($Vswazvoa3xts_array[3])) {
			$V4de3455flza = $Vswazvoa3xts_array[3];
		} else {
			$V4de3455flza = 15;
		}
		if (isset($Vswazvoa3xts_array[4])) {
			$V4so2o2kxsqi = $Vswazvoa3xts_array[4];
		} else {
			$V4so2o2kxsqi = 0;
		}
		if (isset($Vswazvoa3xts_array[5])) {
			$Vr1ehei34kfq = $Vswazvoa3xts_array[5];
		} else {
			$Vr1ehei34kfq = 0;
		}
		$Vkry1ureuzsj   = 0x007D;		  
		$Volq3gdvkuqp   = 0x000C;		  

		$Vswazvoa3xtsdx   *= 256;			 

		$Vfhiq1lhsojaxfe	 = $V4de3455flza;
		$Vierxt2vjb5a = 0x0000;			

		$Vr1ehei34kfq = max(0, min($Vr1ehei34kfq, 7));
		$V4so2o2kxsqi |= $Vr1ehei34kfq << 8;

		$Vl5rjgb1nsf3   = pack("vv",	 $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	 = pack("vvvvvv", $Vswazvoa3xtsFirst, $Vswazvoa3xtsLast, $Vswazvoa3xtsdx,
								   $Vfhiq1lhsojaxfe, $V4so2o2kxsqi, $Vierxt2vjb5a);
		$this->_append($Vl5rjgb1nsf3.$Vou4vxorrdoe);
	}

	
	private function _writeSelection()
	{
		
		$V1z51cw35ysb = $this->_phpSheet->getSelectedCells();
		$V1z51cw35ysb = PHPExcel_Cell::splitRange($this->_phpSheet->getSelectedCells());
		$V1z51cw35ysb = $V1z51cw35ysb[0];
		if (count($V1z51cw35ysb) == 2) {
			list($Vh2exnktxagp, $V3ze22vtj2t0) = $V1z51cw35ysb;
		} else {
			$Vh2exnktxagp = $V1z51cw35ysb[0];
			$V3ze22vtj2t0  = $V1z51cw35ysb[0];
		}

		list($Vswazvoa3xtsFirst, $Vlspvsfscwbk) = PHPExcel_Cell::coordinateFromString($Vh2exnktxagp);
		$Vswazvoa3xtsFirst = PHPExcel_Cell::columnIndexFromString($Vswazvoa3xtsFirst) - 1; 
		--$Vlspvsfscwbk; 

		list($Vswazvoa3xtsLast, $Vmblub24zrqh) = PHPExcel_Cell::coordinateFromString($V3ze22vtj2t0);
		$Vswazvoa3xtsLast = PHPExcel_Cell::columnIndexFromString($Vswazvoa3xtsLast) - 1; 
		--$Vmblub24zrqh; 

		
		$Vswazvoa3xtsFirst = min($Vswazvoa3xtsFirst, 255);
		$Vswazvoa3xtsLast  = min($Vswazvoa3xtsLast,  255);

		$Vlspvsfscwbk = min($Vlspvsfscwbk, 65535);
		$Vmblub24zrqh  = min($Vmblub24zrqh,  65535);

		$Vkry1ureuzsj   = 0x001D;				  
		$Volq3gdvkuqp   = 0x000F;				  

		$Vad3qg5v54eh	  = $this->_active_pane;	 
		$V5adbgqlo1ot	= $Vlspvsfscwbk;				
		$Vswazvoa3xtsAct   = $Vswazvoa3xtsFirst;			   
		$Vfhiq1lhsojarefAct  = 0;					   
		$Vja5lngioium	 = 1;					   

		if (!isset($Vmblub24zrqh)) {
			$Vmblub24zrqh   = $Vlspvsfscwbk;	   
		}
		if (!isset($Vswazvoa3xtsLast)) {
			$Vswazvoa3xtsLast  = $Vswazvoa3xtsFirst;	  
		}

		
		if ($Vlspvsfscwbk > $Vmblub24zrqh) {
			list($Vlspvsfscwbk, $Vmblub24zrqh) = array($Vmblub24zrqh, $Vlspvsfscwbk);
		}

		if ($Vswazvoa3xtsFirst > $Vswazvoa3xtsLast) {
			list($Vswazvoa3xtsFirst, $Vswazvoa3xtsLast) = array($Vswazvoa3xtsLast, $Vswazvoa3xtsFirst);
		}

		$Vl5rjgb1nsf3   = pack("vv",		 $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	 = pack("CvvvvvvCC",  $Vad3qg5v54eh, $V5adbgqlo1ot, $Vswazvoa3xtsAct,
									   $Vfhiq1lhsojarefAct, $Vja5lngioium,
									   $Vlspvsfscwbk, $Vmblub24zrqh,
									   $Vswazvoa3xtsFirst, $Vswazvoa3xtsLast);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeMergedCells()
	{
		$V0ure40hni4c = $this->_phpSheet->getMergeCells();
		$Vphtcpo5gjnr = count($V0ure40hni4c);

		if ($Vphtcpo5gjnr == 0) {
			return;
		}

		
		$Vd23ntigb5thountMergeCellsPerRecord = 1027;

		
		$Vkry1ureuzsj = 0x00E5;

		
		$Vfhiq1lhsoja = 0;

		
		$Vzmnqyqjjodw = 0;

		
		$Vkry1ureuzsjData = '';

		
		foreach ($V0ure40hni4c as $V1sqn423aeel) {
			++$Vfhiq1lhsoja;
			++$Vzmnqyqjjodw;

			
			$Votjg2jvcmjx = PHPExcel_Cell::splitRange($V1sqn423aeel);
			list($Vh2exnktxagp, $V3ze22vtj2t0) = $Votjg2jvcmjx[0];
			list($Vh2exnktxagpColumn, $Vh2exnktxagpRow) = PHPExcel_Cell::coordinateFromString($Vh2exnktxagp);
			list($V3ze22vtj2t0Column, $V3ze22vtj2t0Row) = PHPExcel_Cell::coordinateFromString($V3ze22vtj2t0);

			$Vkry1ureuzsjData .= pack('vvvv', $Vh2exnktxagpRow - 1, $V3ze22vtj2t0Row - 1, PHPExcel_Cell::columnIndexFromString($Vh2exnktxagpColumn) - 1, PHPExcel_Cell::columnIndexFromString($V3ze22vtj2t0Column) - 1);

			
			if ($Vzmnqyqjjodw == $Vd23ntigb5thountMergeCellsPerRecord or $Vfhiq1lhsoja == $Vphtcpo5gjnr) {
				$Vkry1ureuzsjData = pack('v', $Vzmnqyqjjodw) . $Vkry1ureuzsjData;
				$Volq3gdvkuqp = strlen($Vkry1ureuzsjData);
				$Vl5rjgb1nsf3 = pack('vv', $Vkry1ureuzsj, $Volq3gdvkuqp);
				$this->_append($Vl5rjgb1nsf3 . $Vkry1ureuzsjData);

				
				$Vkry1ureuzsjData = '';
				$Vzmnqyqjjodw = 0;
			}
		}
	}

	
	private function _writeSheetLayout()
	{
		if (!$this->_phpSheet->isTabColorSet()) {
			return;
		}

		$Vkry1ureuzsjData = pack(
			'vvVVVvv'
			, 0x0862
			, 0x0000		
			, 0x00000000	
			, 0x00000000	
			, 0x00000014	
			, $this->_colors[$this->_phpSheet->getTabColor()->getRGB()]	
			, 0x0000		
		);

		$Volq3gdvkuqp = strlen($Vkry1ureuzsjData);

		$Vkry1ureuzsj = 0x0862; 
		$Vl5rjgb1nsf3 = pack('vv', $Vkry1ureuzsj, $Volq3gdvkuqp);
		$this->_append($Vl5rjgb1nsf3 . $Vkry1ureuzsjData);
	}

	
	private function _writeSheetProtection()
	{
		
		$Vkry1ureuzsj = 0x0867;

		
		$Vobxlvad3352  =   (int) !$this->_phpSheet->getProtection()->getObjects()
					| (int) !$this->_phpSheet->getProtection()->getScenarios()           << 1
					| (int) !$this->_phpSheet->getProtection()->getFormatCells()         << 2
					| (int) !$this->_phpSheet->getProtection()->getFormatColumns()       << 3
					| (int) !$this->_phpSheet->getProtection()->getFormatRows()          << 4
					| (int) !$this->_phpSheet->getProtection()->getInsertColumns()       << 5
					| (int) !$this->_phpSheet->getProtection()->getInsertRows()          << 6
					| (int) !$this->_phpSheet->getProtection()->getInsertHyperlinks()    << 7
					| (int) !$this->_phpSheet->getProtection()->getDeleteColumns()       << 8
					| (int) !$this->_phpSheet->getProtection()->getDeleteRows()          << 9
					| (int) !$this->_phpSheet->getProtection()->getSelectLockedCells()   << 10
					| (int) !$this->_phpSheet->getProtection()->getSort()                << 11
					| (int) !$this->_phpSheet->getProtection()->getAutoFilter()          << 12
					| (int) !$this->_phpSheet->getProtection()->getPivotTables()         << 13
					| (int) !$this->_phpSheet->getProtection()->getSelectUnlockedCells() << 14 ;

		
		$Vkry1ureuzsjData = pack(
			'vVVCVVvv'
			, 0x0867		
			, 0x0000		
			, 0x0000		
			, 0x00			
			, 0x01000200	
			, 0xFFFFFFFF	
			, $Vobxlvad3352		
			, 0x0000		
		);

		$Volq3gdvkuqp = strlen($Vkry1ureuzsjData);
		$Vl5rjgb1nsf3 = pack('vv', $Vkry1ureuzsj, $Volq3gdvkuqp);

		$this->_append($Vl5rjgb1nsf3 . $Vkry1ureuzsjData);
	}

	
	private function _writeRangeProtection()
	{
		foreach ($this->_phpSheet->getProtectedCells() as $Votjg2jvcmjx => $Vsnnardgofbr) {
			
			$Vblc1ueqvbtiRanges = explode(' ', $Votjg2jvcmjx);
			$Vja5lngioium = count($Vblc1ueqvbtiRanges);

			$Vkry1ureuzsjData = pack(
				'vvVVvCVvVv',
				0x0868,
				0x00,
				0x0000,
				0x0000,
				0x02,
				0x0,
				0x0000,
				$Vja5lngioium,
				0x0000,
				0x00
			);

			foreach ($Vblc1ueqvbtiRanges as $Vblc1ueqvbtiRange) {
				$Vkry1ureuzsjData .= $this->_writeBIFF8CellRangeAddressFixed($Vblc1ueqvbtiRange);
			}

			
			$Vkry1ureuzsjData .= pack(
				'VV',
				0x0000,
				hexdec($Vsnnardgofbr)
			);

			$Vkry1ureuzsjData .= PHPExcel_Shared_String::UTF8toBIFF8UnicodeLong('p' . md5($Vkry1ureuzsjData));

			$Volq3gdvkuqp = strlen($Vkry1ureuzsjData);

			$Vkry1ureuzsj = 0x0868;		
			$Vl5rjgb1nsf3 = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
			$this->_append($Vl5rjgb1nsf3 . $Vkry1ureuzsjData);
		}
	}

	
	private function _writeExterncount($Vytbsuz3c5qz)
	{
		$Vkry1ureuzsj = 0x0016;		  
		$Volq3gdvkuqp = 0x0002;		  

		$Vl5rjgb1nsf3 = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe   = pack("v",  $Vytbsuz3c5qz);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeExternsheet($Veqlv0aras3r)
	{
		$Vkry1ureuzsj	= 0x0017;		 

		
		
		
		if ($this->_phpSheet->getTitle() == $Veqlv0aras3r) {
			$Veqlv0aras3r = '';
			$Volq3gdvkuqp	= 0x02;  
			$Vd1codtsufm4	   = 1;	 
			$Vud0t1hmcvxp	  = 0x02;  
		} else {
			$Volq3gdvkuqp	= 0x02 + strlen($Veqlv0aras3r);
			$Vd1codtsufm4	   = strlen($Veqlv0aras3r);
			$Vud0t1hmcvxp	  = 0x03;  
		}

		$Vl5rjgb1nsf3 = pack("vv",  $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe   = pack("CC", $Vd1codtsufm4, $Vud0t1hmcvxp);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe . $Veqlv0aras3r);
	}

	
	private function _writePanes()
	{
		$Vyooz5mssgkq = array();
		if ($Vtoxtrsj4sx1 = $this->_phpSheet->getFreezePane()) {
			list($Vn4q2p4mkwa0, $Vexbtekafkvl) = PHPExcel_Cell::coordinateFromString($Vtoxtrsj4sx1);
			$Vyooz5mssgkq[0] = $Vexbtekafkvl - 1;
			$Vyooz5mssgkq[1] = PHPExcel_Cell::columnIndexFromString($Vn4q2p4mkwa0) - 1;
		} else {
			
			return;
		}

		$Vqwmp2bx0ii2	   = isset($Vyooz5mssgkq[0]) ? $Vyooz5mssgkq[0] : null;
		$V1e1eaicqarh	   = isset($Vyooz5mssgkq[1]) ? $Vyooz5mssgkq[1] : null;
		$Vx3st5qp53k3   = isset($Vyooz5mssgkq[2]) ? $Vyooz5mssgkq[2] : null;
		$Vswazvoa3xtsLeft = isset($Vyooz5mssgkq[3]) ? $Vyooz5mssgkq[3] : null;
		if (count($Vyooz5mssgkq) > 4) { 
			$Vad3qg5v54ehAct = $Vyooz5mssgkq[4];
		} else {
			$Vad3qg5v54ehAct = null;
		}
		$Vkry1ureuzsj  = 0x0041;	   
		$Volq3gdvkuqp  = 0x000A;	   

		
		if ($this->_phpSheet->getFreezePane()) {
			
			if (!isset($Vx3st5qp53k3)) {
				$Vx3st5qp53k3   = $Vqwmp2bx0ii2;
			}
			if (!isset($Vswazvoa3xtsLeft)) {
				$Vswazvoa3xtsLeft = $V1e1eaicqarh;
			}
		} else {
			
			if (!isset($Vx3st5qp53k3)) {
				$Vx3st5qp53k3   = 0;
			}
			if (!isset($Vswazvoa3xtsLeft)) {
				$Vswazvoa3xtsLeft = 0;
			}

			
			
			
			
			
			$Vqwmp2bx0ii2 = 20*$Vqwmp2bx0ii2 + 255;
			$V1e1eaicqarh = 113.879*$V1e1eaicqarh + 390;
		}


		
		
		
		if (!isset($Vad3qg5v54ehAct)) {
			if ($V1e1eaicqarh != 0 && $Vqwmp2bx0ii2 != 0) {
				$Vad3qg5v54ehAct = 0; 
			}
			if ($V1e1eaicqarh != 0 && $Vqwmp2bx0ii2 == 0) {
				$Vad3qg5v54ehAct = 1; 
			}
			if ($V1e1eaicqarh == 0 && $Vqwmp2bx0ii2 != 0) {
				$Vad3qg5v54ehAct = 2; 
			}
			if ($V1e1eaicqarh == 0 && $Vqwmp2bx0ii2 == 0) {
				$Vad3qg5v54ehAct = 3; 
			}
		}

		$this->_active_pane = $Vad3qg5v54ehAct; 

		$Vl5rjgb1nsf3	 = pack("vv",	$Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	   = pack("vvvvv", $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vx3st5qp53k3, $Vswazvoa3xtsLeft, $Vad3qg5v54ehAct);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeSetup()
	{
		$Vkry1ureuzsj	   = 0x00A1;				  
		$Volq3gdvkuqp	   = 0x0022;				  

		$Vfhiq1lhsojaPaperSize   = $this->_phpSheet->getPageSetup()->getPaperSize();	

		$Vfhiq1lhsojaScale = $this->_phpSheet->getPageSetup()->getScale() ?
			$this->_phpSheet->getPageSetup()->getScale() : 100;   

		$Vfhiq1lhsojaPageStart   = 0x01;				 
		$Vfhiq1lhsojaFitWidth	= (int) $this->_phpSheet->getPageSetup()->getFitToWidth();	
		$Vfhiq1lhsojaFitHeight	= (int) $this->_phpSheet->getPageSetup()->getFitToHeight();	
		$V4so2o2kxsqi		= 0x00;				 
		$Vfhiq1lhsojaRes		 = 0x0258;			   
		$Vfhiq1lhsojaVRes		= 0x0258;			   

		$Vcgbfu1dtv3lHdr	   = $this->_phpSheet->getPageMargins()->getHeader();  

		$Vcgbfu1dtv3lFtr	   = $this->_phpSheet->getPageMargins()->getFooter();   
		$Vfhiq1lhsojaCopies	  = 0x01;				 

		$Vce4wmihs3mt = 0x0;					 

		
		$Vei5za0gxfj1 = ($this->_phpSheet->getPageSetup()->getOrientation() == PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE) ?
			0x0 : 0x1;

		$Vs3atuesbzhw	   = 0x0;					 
		$Vor321qskqy3	 = 0x0;					 
		$Vtbhyse244py	   = 0x0;					 
		$Vijhu5fyjtpq	   = 0x0;					 
		$Vmdy1fyblx5s	= 0x0;					 
		$Vi0iveocf0fj	 = 0x0;					 

		$V4so2o2kxsqi		   = $Vce4wmihs3mt;
		$V4so2o2kxsqi		  |= $Vei5za0gxfj1	<< 1;
		$V4so2o2kxsqi		  |= $Vs3atuesbzhw		<< 2;
		$V4so2o2kxsqi		  |= $Vor321qskqy3	  << 3;
		$V4so2o2kxsqi		  |= $Vtbhyse244py		<< 4;
		$V4so2o2kxsqi		  |= $Vijhu5fyjtpq		<< 5;
		$V4so2o2kxsqi		  |= $Vmdy1fyblx5s	 << 6;
		$V4so2o2kxsqi		  |= $Vi0iveocf0fj	  << 7;

		$Vcgbfu1dtv3lHdr = pack("d", $Vcgbfu1dtv3lHdr);
		$Vcgbfu1dtv3lFtr = pack("d", $Vcgbfu1dtv3lFtr);
		if (self::getByteOrder()) { 
			$Vcgbfu1dtv3lHdr = strrev($Vcgbfu1dtv3lHdr);
			$Vcgbfu1dtv3lFtr = strrev($Vcgbfu1dtv3lFtr);
		}

		$Vl5rjgb1nsf3 = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe1  = pack("vvvvvvvv", $Vfhiq1lhsojaPaperSize,
								   $Vfhiq1lhsojaScale,
								   $Vfhiq1lhsojaPageStart,
								   $Vfhiq1lhsojaFitWidth,
								   $Vfhiq1lhsojaFitHeight,
								   $V4so2o2kxsqi,
								   $Vfhiq1lhsojaRes,
								   $Vfhiq1lhsojaVRes);
		$Vou4vxorrdoe2  = $Vcgbfu1dtv3lHdr.$Vcgbfu1dtv3lFtr;
		$Vou4vxorrdoe3  = pack("v", $Vfhiq1lhsojaCopies);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe1 . $Vou4vxorrdoe2 . $Vou4vxorrdoe3);
	}

	
	private function _writeHeader()
	{
		$Vkry1ureuzsj  = 0x0014;			   

		

		$Vkry1ureuzsjData = PHPExcel_Shared_String::UTF8toBIFF8UnicodeLong($this->_phpSheet->getHeaderFooter()->getOddHeader());
		$Volq3gdvkuqp = strlen($Vkry1ureuzsjData);

		$Vl5rjgb1nsf3   = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);

		$this->_append($Vl5rjgb1nsf3 . $Vkry1ureuzsjData);
	}

	
	private function _writeFooter()
	{
		$Vkry1ureuzsj  = 0x0015;			   

		

		$Vkry1ureuzsjData = PHPExcel_Shared_String::UTF8toBIFF8UnicodeLong($this->_phpSheet->getHeaderFooter()->getOddFooter());
		$Volq3gdvkuqp = strlen($Vkry1ureuzsjData);

		$Vl5rjgb1nsf3	= pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);

		$this->_append($Vl5rjgb1nsf3 . $Vkry1ureuzsjData);
	}

	
	private function _writeHcenter()
	{
		$Vkry1ureuzsj   = 0x0083;			  
		$Volq3gdvkuqp   = 0x0002;			  

		$Vanvarvy2vdu = $this->_phpSheet->getPageSetup()->getHorizontalCentered() ? 1 : 0;	 

		$Vl5rjgb1nsf3	= pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	  = pack("v",  $Vanvarvy2vdu);

		$this->_append($Vl5rjgb1nsf3.$Vou4vxorrdoe);
	}

	
	private function _writeVcenter()
	{
		$Vkry1ureuzsj   = 0x0084;			  
		$Volq3gdvkuqp   = 0x0002;			  

		$Vqr3krfjn3p5 = $this->_phpSheet->getPageSetup()->getVerticalCentered() ? 1 : 0;	 

		$Vl5rjgb1nsf3	= pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	  = pack("v",  $Vqr3krfjn3p5);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeMarginLeft()
	{
		$Vkry1ureuzsj  = 0x0026;				   
		$Volq3gdvkuqp  = 0x0008;				   

		$Vwnpual20vlo  = $this->_phpSheet->getPageMargins()->getLeft();	 

		$Vl5rjgb1nsf3	= pack("vv",  $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	  = pack("d",   $Vwnpual20vlo);
		if (self::getByteOrder()) { 
			$Vou4vxorrdoe = strrev($Vou4vxorrdoe);
		}

		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeMarginRight()
	{
		$Vkry1ureuzsj  = 0x0027;				   
		$Volq3gdvkuqp  = 0x0008;				   

		$Vwnpual20vlo  = $this->_phpSheet->getPageMargins()->getRight();	 

		$Vl5rjgb1nsf3	= pack("vv",  $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	  = pack("d",   $Vwnpual20vlo);
		if (self::getByteOrder()) { 
			$Vou4vxorrdoe = strrev($Vou4vxorrdoe);
		}

		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeMarginTop()
	{
		$Vkry1ureuzsj  = 0x0028;				   
		$Volq3gdvkuqp  = 0x0008;				   

		$Vwnpual20vlo  = $this->_phpSheet->getPageMargins()->getTop();	 

		$Vl5rjgb1nsf3	= pack("vv",  $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	  = pack("d",   $Vwnpual20vlo);
		if (self::getByteOrder()) { 
			$Vou4vxorrdoe = strrev($Vou4vxorrdoe);
		}

		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeMarginBottom()
	{
		$Vkry1ureuzsj  = 0x0029;				   
		$Volq3gdvkuqp  = 0x0008;				   

		$Vwnpual20vlo  = $this->_phpSheet->getPageMargins()->getBottom();	 

		$Vl5rjgb1nsf3	= pack("vv",  $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	  = pack("d",   $Vwnpual20vlo);
		if (self::getByteOrder()) { 
			$Vou4vxorrdoe = strrev($Vou4vxorrdoe);
		}

		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writePrintHeaders()
	{
		$Vkry1ureuzsj	  = 0x002a;				   
		$Volq3gdvkuqp	  = 0x0002;				   

		$Vcuvqspxk0z2 = $this->_print_headers;	 

		$Vl5rjgb1nsf3	  = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe		= pack("v", $Vcuvqspxk0z2);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writePrintGridlines()
	{
		$Vkry1ureuzsj	  = 0x002b;					
		$Volq3gdvkuqp	  = 0x0002;					

		$Vnzeoie2votj  = $this->_phpSheet->getPrintGridlines() ? 1 : 0;	

		$Vl5rjgb1nsf3	  = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	  = pack("v", $Vnzeoie2votj);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeGridset()
	{
		$Vkry1ureuzsj	  = 0x0082;						
		$Volq3gdvkuqp	  = 0x0002;						

		$Vb5tbz0zecde	= !$this->_phpSheet->getPrintGridlines();	 

		$Vl5rjgb1nsf3	  = pack("vv",  $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe		= pack("v",   $Vb5tbz0zecde);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeAutoFilterInfo(){
		$Vkry1ureuzsj	  = 0x009D;						
		$Volq3gdvkuqp	  = 0x0002;						

		$Votjg2jvcmjxBounds = PHPExcel_Cell::rangeBoundaries($this->_phpSheet->getAutoFilter()->getRange());
		$Vfhiq1lhsojaNumFilters = 1 + $Votjg2jvcmjxBounds[1][0] - $Votjg2jvcmjxBounds[0][0];

		$Vl5rjgb1nsf3   = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe     = pack("v",  $Vfhiq1lhsojaNumFilters);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private  function _writeGuts()
	{
		$Vkry1ureuzsj	  = 0x0080;   
		$Volq3gdvkuqp	  = 0x0008;   

		$Vtl5j5j5vd5k	 = 0x0000;   
		$Va33cf5tlrnv	= 0x0000;   

		
		$Vkmwtjs0fry3owOutlineLevel = 0;
		foreach ($this->_phpSheet->getRowDimensions() as $Vkmxwmhd3woe) {
			$Vkmwtjs0fry3owOutlineLevel = max($Vkmwtjs0fry3owOutlineLevel, $Vkmxwmhd3woe->getOutlineLevel());
		}

		$Vswazvoa3xts_level   = 0;

		
		
		$Vkdz0cu23ggh = count($this->_colinfo);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vkdz0cu23ggh; ++$Vfhiq1lhsoja) {
			$Vswazvoa3xts_level = max($this->_colinfo[$Vfhiq1lhsoja][5], $Vswazvoa3xts_level);
		}

		
		$Vswazvoa3xts_level = max(0, min($Vswazvoa3xts_level, 7));

		
		if ($Vkmwtjs0fry3owOutlineLevel) {
			++$Vkmwtjs0fry3owOutlineLevel;
		}
		if ($Vswazvoa3xts_level) {
			++$Vswazvoa3xts_level;
		}

		$Vl5rjgb1nsf3	  = pack("vv",   $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe		= pack("vvvv", $Vtl5j5j5vd5k, $Va33cf5tlrnv, $Vkmwtjs0fry3owOutlineLevel, $Vswazvoa3xts_level);

		$this->_append($Vl5rjgb1nsf3.$Vou4vxorrdoe);
	}

	
	private function _writeWsbool()
	{
		$Vkry1ureuzsj	  = 0x0081;   
		$Volq3gdvkuqp	  = 0x0002;   
		$V4so2o2kxsqi	   = 0x0000;

		
		
		
		
		$V4so2o2kxsqi |= 0x0001;						   
		if ($this->_outline_style) {
			$V4so2o2kxsqi |= 0x0020; 
		}
		if ($this->_phpSheet->getShowSummaryBelow()) {
			$V4so2o2kxsqi |= 0x0040; 
		}
		if ($this->_phpSheet->getShowSummaryRight()) {
			$V4so2o2kxsqi |= 0x0080; 
		}
		if ($this->_phpSheet->getPageSetup()->getFitToPage()) {
			$V4so2o2kxsqi |= 0x0100; 
		}
		if ($this->_outline_on) {
			$V4so2o2kxsqi |= 0x0400; 
		}

		$Vl5rjgb1nsf3	  = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe		= pack("v",  $V4so2o2kxsqi);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeBreaks()
	{
		
		$Vahelpjnxmcw = array();
		$Vkppqov3vex5 = array();

		foreach ($this->_phpSheet->getBreaks() as $Vblc1ueqvbti => $Vr1dbaib5cp1) {
			
			$Vwykjuif1nf3s = PHPExcel_Cell::coordinateFromString($Vblc1ueqvbti);

			
			switch ($Vr1dbaib5cp1) {
				case PHPExcel_Worksheet::BREAK_COLUMN:
					
					$Vahelpjnxmcw[] = PHPExcel_Cell::columnIndexFromString($Vwykjuif1nf3s[0]) - 1;
					break;

				case PHPExcel_Worksheet::BREAK_ROW:
					
					$Vkppqov3vex5[] = $Vwykjuif1nf3s[1];
					break;

				case PHPExcel_Worksheet::BREAK_NONE:
				default:
					
					break;
			}
		}

		
		if (!empty($Vkppqov3vex5)) {

			
			sort($Vkppqov3vex5, SORT_NUMERIC);
			if ($Vkppqov3vex5[0] == 0) { 
				array_shift($Vkppqov3vex5);
			}

			$Vkry1ureuzsj  = 0x001b;			   
			$Vice1tb0kqeu	= count($Vkppqov3vex5);	   
			$Volq3gdvkuqp  = 2 + 6 * $Vice1tb0kqeu;	  

			$Vl5rjgb1nsf3  = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
			$Vou4vxorrdoe	= pack("v",  $Vice1tb0kqeu);

			
			foreach ($Vkppqov3vex5 as $Vqfvsr4xfm3j) {
				$Vou4vxorrdoe .= pack("vvv", $Vqfvsr4xfm3j, 0x0000, 0x00ff);
			}

			$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
		}

		
		if (!empty($Vahelpjnxmcw)) {

			
			
			$Vahelpjnxmcw = array_slice($Vahelpjnxmcw, 0, 1000);

			
			sort($Vahelpjnxmcw, SORT_NUMERIC);
			if ($Vahelpjnxmcw[0] == 0) { 
				array_shift($Vahelpjnxmcw);
			}

			$Vkry1ureuzsj  = 0x001a;			   
			$Vice1tb0kqeu	= count($Vahelpjnxmcw);	   
			$Volq3gdvkuqp  = 2 + 6 * $Vice1tb0kqeu;	  

			$Vl5rjgb1nsf3  = pack("vv",  $Vkry1ureuzsj, $Volq3gdvkuqp);
			$Vou4vxorrdoe	= pack("v",   $Vice1tb0kqeu);

			
			foreach ($Vahelpjnxmcw as $Vb2wtgsdyqg2) {
				$Vou4vxorrdoe .= pack("vvv", $Vb2wtgsdyqg2, 0x0000, 0xffff);
			}

			$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
		}
	}

	
	private function _writeProtect()
	{
		
		if (!$this->_phpSheet->getProtection()->getSheet()) {
			return;
		}

		$Vkry1ureuzsj	  = 0x0012;			 
		$Volq3gdvkuqp	  = 0x0002;			 

		$Vq3ymafecrkj	  = 1;	

		$Vl5rjgb1nsf3	  = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	  = pack("v",  $Vq3ymafecrkj);

		$this->_append($Vl5rjgb1nsf3.$Vou4vxorrdoe);
	}

	
	private function _writeScenProtect()
	{
		
		if (!$this->_phpSheet->getProtection()->getSheet()) {
			return;
		}

		
		if (!$this->_phpSheet->getProtection()->getScenarios()) {
			return;
		}

		$Vkry1ureuzsj = 0x00DD; 
		$Volq3gdvkuqp = 0x0002; 

		$Vl5rjgb1nsf3 = pack('vv', $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe = pack('v', 1);

		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeObjectProtect()
	{
		
		if (!$this->_phpSheet->getProtection()->getSheet()) {
			return;
		}

		
		if (!$this->_phpSheet->getProtection()->getObjects()) {
			return;
		}

		$Vkry1ureuzsj = 0x0063; 
		$Volq3gdvkuqp = 0x0002; 

		$Vl5rjgb1nsf3 = pack('vv', $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe = pack('v', 1);

		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writePassword()
	{
		
		if (!$this->_phpSheet->getProtection()->getSheet() || !$this->_phpSheet->getProtection()->getPassword()) {
			return;
		}

		$Vkry1ureuzsj	  = 0x0013;			   
		$Volq3gdvkuqp	  = 0x0002;			   

		$Vvile0qfqbd0   = hexdec($this->_phpSheet->getProtection()->getPassword());	 

		$Vl5rjgb1nsf3	  = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe		= pack("v",  $Vvile0qfqbd0);

		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	function insertBitmap($Vexbtekafkvl, $Vswazvoa3xts, $Vrxlpes4qeuj, $V1e1eaicqarh = 0, $Vqwmp2bx0ii2 = 0, $Vvwcxophaic5 = 1, $Vqd5ksvwijfd = 1)
	{
		$Vrxlpes4qeuj_array = (is_resource($Vrxlpes4qeuj) ? $this->_processBitmapGd($Vrxlpes4qeuj) : $this->_processBitmap($Vrxlpes4qeuj));
		list($Vojs2qdgagwv, $Vzo4g5xb4yip, $V4jbadwq4bzj, $Vou4vxorrdoe) = $Vrxlpes4qeuj_array; 

		
		$Vojs2qdgagwv  *= $Vvwcxophaic5;
		$Vzo4g5xb4yip *= $Vqd5ksvwijfd;

		
		$this->_positionImage($Vswazvoa3xts, $Vexbtekafkvl, $V1e1eaicqarh, $Vqwmp2bx0ii2, $Vojs2qdgagwv, $Vzo4g5xb4yip);

		
		$Vkry1ureuzsj	  = 0x007f;
		$Volq3gdvkuqp	  = 8 + $V4jbadwq4bzj;
		$Vxtnh2mt3dyh		  = 0x09;
		$Vnhm0uuykimvnv		 = 0x01;
		$Vhlt1e3flobt		 = $V4jbadwq4bzj;

		$Vl5rjgb1nsf3	  = pack("vvvvV", $Vkry1ureuzsj, $Volq3gdvkuqp, $Vxtnh2mt3dyh, $Vnhm0uuykimvnv, $Vhlt1e3flobt);
		$this->_append($Vl5rjgb1nsf3.$Vou4vxorrdoe);
	}

	
	function _positionImage($Vswazvoa3xts_start, $Vexbtekafkvl_start, $V1e1eaicqarh1, $Vqwmp2bx0ii21, $Vojs2qdgagwv, $Vzo4g5xb4yip)
	{
		
		$Vswazvoa3xts_end	= $Vswazvoa3xts_start;  
		$Vexbtekafkvl_end	= $Vexbtekafkvl_start;  

		
		if ($V1e1eaicqarh1 >= PHPExcel_Shared_Excel5::sizeCol($this->_phpSheet, PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts_start))) {
			$V1e1eaicqarh1 = 0;
		}
		if ($Vqwmp2bx0ii21 >= PHPExcel_Shared_Excel5::sizeRow($this->_phpSheet, $Vexbtekafkvl_start + 1)) {
			$Vqwmp2bx0ii21 = 0;
		}

		$Vojs2qdgagwv	  = $Vojs2qdgagwv  + $V1e1eaicqarh1 -1;
		$Vzo4g5xb4yip	 = $Vzo4g5xb4yip + $Vqwmp2bx0ii21 -1;

		
		while ($Vojs2qdgagwv >= PHPExcel_Shared_Excel5::sizeCol($this->_phpSheet, PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts_end))) {
			$Vojs2qdgagwv -= PHPExcel_Shared_Excel5::sizeCol($this->_phpSheet, PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts_end));
			++$Vswazvoa3xts_end;
		}

		
		while ($Vzo4g5xb4yip >= PHPExcel_Shared_Excel5::sizeRow($this->_phpSheet, $Vexbtekafkvl_end + 1)) {
			$Vzo4g5xb4yip -= PHPExcel_Shared_Excel5::sizeRow($this->_phpSheet, $Vexbtekafkvl_end + 1);
			++$Vexbtekafkvl_end;
		}

		
		
		
		if (PHPExcel_Shared_Excel5::sizeCol($this->_phpSheet, PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts_start)) == 0) {
			return;
		}
		if (PHPExcel_Shared_Excel5::sizeCol($this->_phpSheet, PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts_end))   == 0) {
			return;
		}
		if (PHPExcel_Shared_Excel5::sizeRow($this->_phpSheet, $Vexbtekafkvl_start + 1) == 0) {
			return;
		}
		if (PHPExcel_Shared_Excel5::sizeRow($this->_phpSheet, $Vexbtekafkvl_end + 1)   == 0) {
			return;
		}

		
		$V1e1eaicqarh1 = $V1e1eaicqarh1	 / PHPExcel_Shared_Excel5::sizeCol($this->_phpSheet, PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts_start))   * 1024;
		$Vqwmp2bx0ii21 = $Vqwmp2bx0ii21	 / PHPExcel_Shared_Excel5::sizeRow($this->_phpSheet, $Vexbtekafkvl_start + 1)   *  256;
		$V1e1eaicqarh2 = $Vojs2qdgagwv  / PHPExcel_Shared_Excel5::sizeCol($this->_phpSheet, PHPExcel_Cell::stringFromColumnIndex($Vswazvoa3xts_end))	 * 1024; 
		$Vqwmp2bx0ii22 = $Vzo4g5xb4yip / PHPExcel_Shared_Excel5::sizeRow($this->_phpSheet, $Vexbtekafkvl_end + 1)	 *  256; 

		$this->_writeObjPicture($Vswazvoa3xts_start, $V1e1eaicqarh1,
								 $Vexbtekafkvl_start, $Vqwmp2bx0ii21,
								 $Vswazvoa3xts_end, $V1e1eaicqarh2,
								 $Vexbtekafkvl_end, $Vqwmp2bx0ii22);
	}

	
	private function _writeObjPicture($Vswazvoa3xtsL,$Vrnewfgi4l4v,$Vc1zqdx1xvck,$Vcmrf0so2obk,$Vswazvoa3xtsR,$Vqncb2tfcubi,$V5pycddvwv4o,$Vjujrr55uh3y)
	{
		$Vkry1ureuzsj	  = 0x005d;   
		$Volq3gdvkuqp	  = 0x003c;   

		$Vjoifjoe1tvz		= 0x0001;   
		$Vhwlvvir2e23		  = 0x0008;   
		$Vfhiq1lhsojad		  = 0x0001;   
		$V4so2o2kxsqi	   = 0x0614;   

		$Vg4upo2ee0ol	 = 0x0000;   
		$Vd3swpywzzsh   = 0x0000;   
		$Vazupql5iadd   = 0x0000;   

		$Vfhiq1lhsojacvBack	 = 0x09;	 
		$Vfhiq1lhsojacvFore	 = 0x09;	 
		$V4cqw5cytjf1		 = 0x00;	 
		$Vs0kaqk1n1ij	   = 0x00;	 
		$Vfhiq1lhsojacv		 = 0x08;	 
		$V5cuignswnad		 = 0xff;	 
		$Vnnbjoujq2ol		 = 0x01;	 
		$Vs0kaqk1n1ijB	  = 0x00;	 
		$Vi5y2hijt34c		 = 0x0000;   
		$Vxtnh2mt3dyh		  = 0x0009;   
		$Vy2vilg1tvk1   = 0x0000;   
		$Vzi2nmp0ljhv  = 0x0000;   
		$Vj0h2fj4bntk   = 0x0000;   
		$V4so2o2kxsqi2	  = 0x0001;   
		$V2wh045swcp4   = 0x0000;   


		$Vl5rjgb1nsf3	  = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe		= pack("V", $Vjoifjoe1tvz);
		$Vou4vxorrdoe	   .= pack("v", $Vhwlvvir2e23);
		$Vou4vxorrdoe	   .= pack("v", $Vfhiq1lhsojad);
		$Vou4vxorrdoe	   .= pack("v", $V4so2o2kxsqi);
		$Vou4vxorrdoe	   .= pack("v", $Vswazvoa3xtsL);
		$Vou4vxorrdoe	   .= pack("v", $Vrnewfgi4l4v);
		$Vou4vxorrdoe	   .= pack("v", $Vc1zqdx1xvck);
		$Vou4vxorrdoe	   .= pack("v", $Vcmrf0so2obk);
		$Vou4vxorrdoe	   .= pack("v", $Vswazvoa3xtsR);
		$Vou4vxorrdoe	   .= pack("v", $Vqncb2tfcubi);
		$Vou4vxorrdoe	   .= pack("v", $V5pycddvwv4o);
		$Vou4vxorrdoe	   .= pack("v", $Vjujrr55uh3y);
		$Vou4vxorrdoe	   .= pack("v", $Vg4upo2ee0ol);
		$Vou4vxorrdoe	   .= pack("V", $Vd3swpywzzsh);
		$Vou4vxorrdoe	   .= pack("v", $Vazupql5iadd);
		$Vou4vxorrdoe	   .= pack("C", $Vfhiq1lhsojacvBack);
		$Vou4vxorrdoe	   .= pack("C", $Vfhiq1lhsojacvFore);
		$Vou4vxorrdoe	   .= pack("C", $V4cqw5cytjf1);
		$Vou4vxorrdoe	   .= pack("C", $Vs0kaqk1n1ij);
		$Vou4vxorrdoe	   .= pack("C", $Vfhiq1lhsojacv);
		$Vou4vxorrdoe	   .= pack("C", $V5cuignswnad);
		$Vou4vxorrdoe	   .= pack("C", $Vnnbjoujq2ol);
		$Vou4vxorrdoe	   .= pack("C", $Vs0kaqk1n1ijB);
		$Vou4vxorrdoe	   .= pack("v", $Vi5y2hijt34c);
		$Vou4vxorrdoe	   .= pack("V", $Vxtnh2mt3dyh);
		$Vou4vxorrdoe	   .= pack("v", $Vy2vilg1tvk1);
		$Vou4vxorrdoe	   .= pack("v", $Vzi2nmp0ljhv);
		$Vou4vxorrdoe	   .= pack("v", $Vj0h2fj4bntk);
		$Vou4vxorrdoe	   .= pack("v", $V4so2o2kxsqi2);
		$Vou4vxorrdoe	   .= pack("V", $V2wh045swcp4);

		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	function _processBitmapGd($Vfhiq1lhsojamage) {
		$Vojs2qdgagwv = imagesx($Vfhiq1lhsojamage);
		$Vzo4g5xb4yip = imagesy($Vfhiq1lhsojamage);

		$Vou4vxorrdoe = pack("Vvvvv", 0x000c, $Vojs2qdgagwv, $Vzo4g5xb4yip, 0x01, 0x18);
		for ($Vzmnqyqjjodw=$Vzo4g5xb4yip; $Vzmnqyqjjodw--; ) {
			for ($Vfhiq1lhsoja=0; $Vfhiq1lhsoja < $Vojs2qdgagwv; ++$Vfhiq1lhsoja) {
				$Vswazvoa3xtsor = imagecolorsforindex($Vfhiq1lhsojamage, imagecolorat($Vfhiq1lhsojamage, $Vfhiq1lhsoja, $Vzmnqyqjjodw));
				foreach (array("red", "green", "blue") as $Vseq1edikdvg) {
					$Vswazvoa3xtsor[$Vseq1edikdvg] = $Vswazvoa3xtsor[$Vseq1edikdvg] + round((255 - $Vswazvoa3xtsor[$Vseq1edikdvg]) * $Vswazvoa3xtsor["alpha"] / 127);
				}
				$Vou4vxorrdoe .= chr($Vswazvoa3xtsor["blue"]) . chr($Vswazvoa3xtsor["green"]) . chr($Vswazvoa3xtsor["red"]);
			}
			if (3*$Vojs2qdgagwv % 4) {
				$Vou4vxorrdoe .= str_repeat("\x00", 4 - 3*$Vojs2qdgagwv % 4);
			}
		}

		return array($Vojs2qdgagwv, $Vzo4g5xb4yip, strlen($Vou4vxorrdoe), $Vou4vxorrdoe);
	}

	
	function _processBitmap($Vrxlpes4qeuj)
	{
		
		$V0vjvywieb5f = @fopen($Vrxlpes4qeuj,"rb");
		if (!$V0vjvywieb5f) {
			throw new PHPExcel_Writer_Exception("Couldn't import $Vrxlpes4qeuj");
		}

		
		$Vou4vxorrdoe = fread($V0vjvywieb5f, filesize($Vrxlpes4qeuj));

		
		if (strlen($Vou4vxorrdoe) <= 0x36) {
			throw new PHPExcel_Writer_Exception("$Vrxlpes4qeuj doesn't contain enough data.\n");
		}

		
		$Vfhiq1lhsojadentity = unpack("A2ident", $Vou4vxorrdoe);
		if ($Vfhiq1lhsojadentity['ident'] != "BM") {
			throw new PHPExcel_Writer_Exception("$Vrxlpes4qeuj doesn't appear to be a valid bitmap image.\n");
		}

		
		$Vou4vxorrdoe = substr($Vou4vxorrdoe, 2);

		
		
		
		$V4jbadwq4bzj_array   = unpack("Vsa", substr($Vou4vxorrdoe, 0, 4));
		$V4jbadwq4bzj   = $V4jbadwq4bzj_array['sa'];
		$Vou4vxorrdoe   = substr($Vou4vxorrdoe, 4);
		$V4jbadwq4bzj  -= 0x36; 
		$V4jbadwq4bzj  += 0x0C; 

		
		$Vou4vxorrdoe = substr($Vou4vxorrdoe, 12);

		
		$Vojs2qdgagwv_and_height = unpack("V2", substr($Vou4vxorrdoe, 0, 8));
		$Vojs2qdgagwv  = $Vojs2qdgagwv_and_height[1];
		$Vzo4g5xb4yip = $Vojs2qdgagwv_and_height[2];
		$Vou4vxorrdoe   = substr($Vou4vxorrdoe, 8);
		if ($Vojs2qdgagwv > 0xFFFF) {
			throw new PHPExcel_Writer_Exception("$Vrxlpes4qeuj: largest image width supported is 65k.\n");
		}
		if ($Vzo4g5xb4yip > 0xFFFF) {
			throw new PHPExcel_Writer_Exception("$Vrxlpes4qeuj: largest image height supported is 65k.\n");
		}

		
		$Vnunm0j035zc = unpack("v2", substr($Vou4vxorrdoe, 0, 4));
		$Vou4vxorrdoe = substr($Vou4vxorrdoe, 4);
		if ($Vnunm0j035zc[2] != 24) { 
			throw new PHPExcel_Writer_Exception("$Vrxlpes4qeuj isn't a 24bit true color bitmap.\n");
		}
		if ($Vnunm0j035zc[1] != 1) {
			throw new PHPExcel_Writer_Exception("$Vrxlpes4qeuj: only 1 plane supported in bitmap image.\n");
		}

		
		$Vnljbyh43lrz = unpack("Vcomp", substr($Vou4vxorrdoe, 0, 4));
		$Vou4vxorrdoe = substr($Vou4vxorrdoe, 4);

		
		if ($Vnljbyh43lrz['comp'] != 0) {
			throw new PHPExcel_Writer_Exception("$Vrxlpes4qeuj: compression not supported in bitmap image.\n");
		}

		
		$Vou4vxorrdoe = substr($Vou4vxorrdoe, 20);

		
		$Vl5rjgb1nsf3  = pack("Vvvvv", 0x000c, $Vojs2qdgagwv, $Vzo4g5xb4yip, 0x01, 0x18);
		$Vou4vxorrdoe	= $Vl5rjgb1nsf3 . $Vou4vxorrdoe;

		return (array($Vojs2qdgagwv, $Vzo4g5xb4yip, $V4jbadwq4bzj, $Vou4vxorrdoe));
	}

	
	private function _writeZoom()
	{
		
		if ($this->_phpSheet->getSheetView()->getZoomScale() == 100) {
			return;
		}

		$Vkry1ureuzsj	  = 0x00A0;			   
		$Volq3gdvkuqp	  = 0x0004;			   

		$Vl5rjgb1nsf3	  = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe		= pack("vv", $this->_phpSheet->getSheetView()->getZoomScale(), 100);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	public function getEscher()
	{
		return $this->_escher;
	}

	
	public function setEscher(PHPExcel_Shared_Escher $Vqujkwol1zut = null)
	{
		$this->_escher = $Vqujkwol1zut;
	}

	
	private function _writeMsoDrawing()
	{
		
		if (isset($this->_escher)) {
			$V3pinfvte0v0 = new PHPExcel_Writer_Excel5_Escher($this->_escher);
			$Vou4vxorrdoe = $V3pinfvte0v0->close();
			$Vlnza0jufeky = $V3pinfvte0v0->getSpOffsets();
			$Vic1dj2j3fg1 = $V3pinfvte0v0->getSpTypes();
			

			
			$Vlnza0jufeky[0] = 0;
			$Vswed3qxyot1 = count($Vlnza0jufeky) - 1; 
			for ($Vfhiq1lhsoja = 1; $Vfhiq1lhsoja <= $Vswed3qxyot1; ++$Vfhiq1lhsoja) {
				
				$Vkry1ureuzsj = 0x00EC;			

				
				$Vou4vxorrdoeChunk = substr($Vou4vxorrdoe, $Vlnza0jufeky[$Vfhiq1lhsoja -1], $Vlnza0jufeky[$Vfhiq1lhsoja] - $Vlnza0jufeky[$Vfhiq1lhsoja - 1]);

				$Volq3gdvkuqp = strlen($Vou4vxorrdoeChunk);
				$Vl5rjgb1nsf3 = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);

				$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoeChunk);

				
				$Vkry1ureuzsj = 0x005D; 
				$Vcrh4wt3yeuf = '';

				
				if($Vic1dj2j3fg1[$Vfhiq1lhsoja] == 0x00C9){
					
					$Vcrh4wt3yeuf .=
						pack('vvvvvVVV'
								, 0x0015	
								, 0x0012	
								, 0x0014	
								, $Vfhiq1lhsoja		
								, 0x2101	
								, 0			
								, 0			
								, 0			
						);

					
					$Vcrh4wt3yeuf .= pack('vv', 0x00C, 0x0014);
					$Vcrh4wt3yeuf .= pack('H*', '0000000000000000640001000A00000010000100');
					
					$Vcrh4wt3yeuf .= pack('vv', 0x0013, 0x1FEE);
					$Vcrh4wt3yeuf .= pack('H*', '00000000010001030000020008005700');
				}
				else {
					
					$Vcrh4wt3yeuf .=
						pack('vvvvvVVV'
							, 0x0015	
							, 0x0012	
							, 0x0008	
							, $Vfhiq1lhsoja		
							, 0x6011	
							, 0			
							, 0			
							, 0			
						);
				}

				
				$Vcrh4wt3yeuf .=
					pack('vv'
						, 0x0000	
						, 0x0000	
					);

				$Volq3gdvkuqp = strlen($Vcrh4wt3yeuf);
				$Vl5rjgb1nsf3 = pack('vv', $Vkry1ureuzsj, $Volq3gdvkuqp);
				$this->_append($Vl5rjgb1nsf3 . $Vcrh4wt3yeuf);
			}
		}
	}

	
	private function _writeDataValidity()
	{
		
		$Vou4vxorrdoeValidationCollection = $this->_phpSheet->getDataValidationCollection();

		
		if (!empty($Vou4vxorrdoeValidationCollection)) {

			
			$Vkry1ureuzsj = 0x01B2;	  
			$Volq3gdvkuqp	  = 0x0012;	  

			$V4so2o2kxsqi  = 0x0000;	   
			$V4vlyhfmcsuw	  = 0x00000000;  
			$Vikr1kebteix	  = 0x00000000;  
			$Vt4yzt5d2v3y  = 0xFFFFFFFF;  

			$Vl5rjgb1nsf3	  = pack('vv', $Vkry1ureuzsj, $Volq3gdvkuqp);
			$Vou4vxorrdoe		= pack('vVVVV', $V4so2o2kxsqi, $V4vlyhfmcsuw, $Vikr1kebteix, $Vt4yzt5d2v3y,
										 count($Vou4vxorrdoeValidationCollection));
			$this->_append($Vl5rjgb1nsf3.$Vou4vxorrdoe);

			
			$Vkry1ureuzsj = 0x01BE;			  

			foreach ($Vou4vxorrdoeValidationCollection as $Vblc1ueqvbtiCoordinate => $Vou4vxorrdoeValidation) {
				
				$Vou4vxorrdoe = '';

				
				$Vobxlvad3352 = 0x00000000;

				
				$V4pigtpor0ln = $Vou4vxorrdoeValidation->getType();
				switch ($V4pigtpor0ln) {
					case PHPExcel_Cell_DataValidation::TYPE_NONE:		$V4pigtpor0ln = 0x00;	break;
					case PHPExcel_Cell_DataValidation::TYPE_WHOLE:		$V4pigtpor0ln = 0x01;	break;
					case PHPExcel_Cell_DataValidation::TYPE_DECIMAL:	$V4pigtpor0ln = 0x02;	break;
					case PHPExcel_Cell_DataValidation::TYPE_LIST:		$V4pigtpor0ln = 0x03;	break;
					case PHPExcel_Cell_DataValidation::TYPE_DATE:		$V4pigtpor0ln = 0x04;	break;
					case PHPExcel_Cell_DataValidation::TYPE_TIME:		$V4pigtpor0ln = 0x05;	break;
					case PHPExcel_Cell_DataValidation::TYPE_TEXTLENGTH:	$V4pigtpor0ln = 0x06;	break;
					case PHPExcel_Cell_DataValidation::TYPE_CUSTOM:		$V4pigtpor0ln = 0x07;	break;
				}
				$Vobxlvad3352 |= $V4pigtpor0ln << 0;

				
				$Vyrkodvljby0Style = $Vou4vxorrdoeValidation->getType();
				switch ($Vyrkodvljby0Style) {
					case PHPExcel_Cell_DataValidation::STYLE_STOP:			$Vyrkodvljby0Style = 0x00;		break;
					case PHPExcel_Cell_DataValidation::STYLE_WARNING:		$Vyrkodvljby0Style = 0x01;		break;
					case PHPExcel_Cell_DataValidation::STYLE_INFORMATION:	$Vyrkodvljby0Style = 0x02;		break;
				}
				$Vobxlvad3352 |= $Vyrkodvljby0Style << 4;

				
				if ($V4pigtpor0ln == 0x03 && preg_match('/^\".*\"$/', $Vou4vxorrdoeValidation->getFormula1())) {
					$Vobxlvad3352 |= 0x01				<< 7;
				}

				
				$Vobxlvad3352 |= $Vou4vxorrdoeValidation->getAllowBlank() << 8;

				
				$Vobxlvad3352 |= (!$Vou4vxorrdoeValidation->getShowDropDown()) << 9;

				
				$Vobxlvad3352 |= $Vou4vxorrdoeValidation->getShowInputMessage() << 18;

				
				$Vobxlvad3352 |= $Vou4vxorrdoeValidation->getShowErrorMessage() << 19;

				
				$Vxxvi5lwwffp = $Vou4vxorrdoeValidation->getOperator();
				switch ($Vxxvi5lwwffp) {
					case PHPExcel_Cell_DataValidation::OPERATOR_BETWEEN: $Vxxvi5lwwffp = 0x00			;	break;
					case PHPExcel_Cell_DataValidation::OPERATOR_NOTBETWEEN: $Vxxvi5lwwffp = 0x01		;	break;
					case PHPExcel_Cell_DataValidation::OPERATOR_EQUAL: $Vxxvi5lwwffp = 0x02				;	break;
					case PHPExcel_Cell_DataValidation::OPERATOR_NOTEQUAL: $Vxxvi5lwwffp = 0x03			;	break;
					case PHPExcel_Cell_DataValidation::OPERATOR_GREATERTHAN: $Vxxvi5lwwffp = 0x04		;	break;
					case PHPExcel_Cell_DataValidation::OPERATOR_LESSTHAN: $Vxxvi5lwwffp = 0x05			;	break;
					case PHPExcel_Cell_DataValidation::OPERATOR_GREATERTHANOREQUAL: $Vxxvi5lwwffp = 0x06;	break;
					case PHPExcel_Cell_DataValidation::OPERATOR_LESSTHANOREQUAL: $Vxxvi5lwwffp = 0x07	;	break;
				}
				$Vobxlvad3352 |= $Vxxvi5lwwffp << 20;

				$Vou4vxorrdoe		= pack('V', $Vobxlvad3352);

				
				$Vw3f5ld2df3d = $Vou4vxorrdoeValidation->getPromptTitle() !== '' ?
					$Vou4vxorrdoeValidation->getPromptTitle() : chr(0);
				$Vou4vxorrdoe .= PHPExcel_Shared_String::UTF8toBIFF8UnicodeLong($Vw3f5ld2df3d);

				
				$Vyrkodvljby0Title = $Vou4vxorrdoeValidation->getErrorTitle() !== '' ?
					$Vou4vxorrdoeValidation->getErrorTitle() : chr(0);
				$Vou4vxorrdoe .= PHPExcel_Shared_String::UTF8toBIFF8UnicodeLong($Vyrkodvljby0Title);

				
				$Vrw1ksaz1srx = $Vou4vxorrdoeValidation->getPrompt() !== '' ?
					$Vou4vxorrdoeValidation->getPrompt() : chr(0);
				$Vou4vxorrdoe .= PHPExcel_Shared_String::UTF8toBIFF8UnicodeLong($Vrw1ksaz1srx);

				
				$Vyrkodvljby0 = $Vou4vxorrdoeValidation->getError() !== '' ?
					$Vou4vxorrdoeValidation->getError() : chr(0);
				$Vou4vxorrdoe .= PHPExcel_Shared_String::UTF8toBIFF8UnicodeLong($Vyrkodvljby0);

				
				try {
					$V22ivdjjfdx21 = $Vou4vxorrdoeValidation->getFormula1();
					if ($V4pigtpor0ln == 0x03) { 
						$V22ivdjjfdx21 = str_replace(',', chr(0), $V22ivdjjfdx21);
					}
					$this->_parser->parse($V22ivdjjfdx21);
					$V22ivdjjfdx21 = $this->_parser->toReversePolish();
					$Vqxrizbtnlop = strlen($V22ivdjjfdx21);

				} catch(PHPExcel_Exception $Vnhm0uuykimv) {
					$Vqxrizbtnlop = 0;
					$V22ivdjjfdx21 = '';
				}
				$Vou4vxorrdoe .= pack('vv', $Vqxrizbtnlop, 0x0000);
				$Vou4vxorrdoe .= $V22ivdjjfdx21;

				
				try {
					$V22ivdjjfdx22 = $Vou4vxorrdoeValidation->getFormula2();
					if ($V22ivdjjfdx22 === '') {
						throw new PHPExcel_Writer_Exception('No formula2');
					}
					$this->_parser->parse($V22ivdjjfdx22);
					$V22ivdjjfdx22 = $this->_parser->toReversePolish();
					$Vpgmzk0r0pq0 = strlen($V22ivdjjfdx22);

				} catch(PHPExcel_Exception $Vnhm0uuykimv) {
					$Vpgmzk0r0pq0 = 0;
					$V22ivdjjfdx22 = '';
				}
				$Vou4vxorrdoe .= pack('vv', $Vpgmzk0r0pq0, 0x0000);
				$Vou4vxorrdoe .= $V22ivdjjfdx22;

				
				$Vou4vxorrdoe .= pack('v', 0x0001);
				$Vou4vxorrdoe .= $this->_writeBIFF8CellRangeAddressFixed($Vblc1ueqvbtiCoordinate);

				$Volq3gdvkuqp = strlen($Vou4vxorrdoe);
			$Vl5rjgb1nsf3 = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);

				$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
			}
		}
	}

	
	private static function _mapErrorCode($Vyrkodvljby0Code) {
		switch ($Vyrkodvljby0Code) {
			case '#NULL!':	return 0x00;
			case '#DIV/0!':	return 0x07;
			case '#VALUE!':	return 0x0F;
			case '#REF!':	return 0x17;
			case '#NAME?':	return 0x1D;
			case '#NUM!':	return 0x24;
			case '#N/A':	return 0x2A;
		}

		return 0;
	}

	
	private function _writePageLayoutView(){
		$Vkry1ureuzsj	  = 0x088B;			   
		$Volq3gdvkuqp	  = 0x0010;			   

		$Vtovnd4c3rtr         = 0x088B; 
		$V4so2o2kxsqiFrt   = 0x0000; 
		$Vierxt2vjb5a   = 0x0000000000000000; 
		$Vo3kt2ubpsfz = $this->_phpSheet->getSheetView()->getZoomScale(); 

		
		if($this->_phpSheet->getSheetView()->getView() == PHPExcel_Worksheet_SheetView::SHEETVIEW_PAGE_LAYOUT){
			$V0h5iejtzmcz   = 1;
		} else {
			$V0h5iejtzmcz   = 0;
		}
		$Vwrhhyu4lu0s     = 0;
		$Vectmsrr1yx2 = 0;

		$V4so2o2kxsqi      = $V0h5iejtzmcz; 
		$V4so2o2kxsqi		|= $Vwrhhyu4lu0s	   << 1;
		$V4so2o2kxsqi		|= $Vectmsrr1yx2  << 3;

		$Vl5rjgb1nsf3	  = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	  = pack("vvVVvv", $Vtovnd4c3rtr, $V4so2o2kxsqiFrt, 0x00000000, 0x00000000, $Vo3kt2ubpsfz, $V4so2o2kxsqi);
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeCFRule(PHPExcel_Style_Conditional $Vtvntwrrzi5t){
		$Vkry1ureuzsj	  = 0x01B1;			   

		
		
		if($Vtvntwrrzi5t->getConditionType() == PHPExcel_Style_Conditional::CONDITION_EXPRESSION){
			$V4pigtpor0ln = 0x02;
			$Vxxvi5lwwffpType = 0x00;
		} else if($Vtvntwrrzi5t->getConditionType() == PHPExcel_Style_Conditional::CONDITION_CELLIS){
			$V4pigtpor0ln = 0x01;

			switch ($Vtvntwrrzi5t->getOperatorType()){
				case PHPExcel_Style_Conditional::OPERATOR_NONE:
					$Vxxvi5lwwffpType = 0x00;
					break;
				case PHPExcel_Style_Conditional::OPERATOR_EQUAL:
					$Vxxvi5lwwffpType = 0x03;
					break;
				case PHPExcel_Style_Conditional::OPERATOR_GREATERTHAN:
					$Vxxvi5lwwffpType = 0x05;
					break;
				case PHPExcel_Style_Conditional::OPERATOR_GREATERTHANOREQUAL:
					$Vxxvi5lwwffpType = 0x07;
					break;
				case PHPExcel_Style_Conditional::OPERATOR_LESSTHAN:
					$Vxxvi5lwwffpType = 0x06;
					break;
				case PHPExcel_Style_Conditional::OPERATOR_LESSTHANOREQUAL:
					$Vxxvi5lwwffpType = 0x08;
					break;
				case PHPExcel_Style_Conditional::OPERATOR_NOTEQUAL:
					$Vxxvi5lwwffpType = 0x04;
					break;
				case PHPExcel_Style_Conditional::OPERATOR_BETWEEN:
					$Vxxvi5lwwffpType = 0x01;
					break;
					
			}
		}

		
		
		$V0hvh42qu0bo = $Vtvntwrrzi5t->getConditions();
		$Vcgbfu1dtv3lConditions = sizeof($V0hvh42qu0bo);
		if($Vcgbfu1dtv3lConditions == 1){
			$Vzq2lg0kb52z = ($V0hvh42qu0bo[0] <= 65535 ? 3 : 0x0000);
			$Vsom01wg0d52 = 0x0000;
			$Vlsk0dcfee55 = pack('Cv', 0x1E, $V0hvh42qu0bo[0]);
			$Vildd1o1hqvn = null;
		} else if($Vcgbfu1dtv3lConditions == 2 && ($Vtvntwrrzi5t->getOperatorType() == PHPExcel_Style_Conditional::OPERATOR_BETWEEN)){
			$Vzq2lg0kb52z = ($V0hvh42qu0bo[0] <= 65535 ? 3 : 0x0000);
			$Vsom01wg0d52 = ($V0hvh42qu0bo[1] <= 65535 ? 3 : 0x0000);
			$Vlsk0dcfee55 = pack('Cv', 0x1E, $V0hvh42qu0bo[0]);
			$Vildd1o1hqvn = pack('Cv', 0x1E, $V0hvh42qu0bo[1]);
		} else {
			$Vzq2lg0kb52z = 0x0000;
			$Vsom01wg0d52 = 0x0000;
			$Vlsk0dcfee55 = null;
			$Vildd1o1hqvn = null;
		}

		
		
		$V5k3foozt1za = ($Vtvntwrrzi5t->getStyle()->getAlignment()->getHorizontal() == null ? 1 : 0);
		$Vkybrc1yhw3s = ($Vtvntwrrzi5t->getStyle()->getAlignment()->getVertical() == null ? 1 : 0);
		$Vglex5drm5q0 = ($Vtvntwrrzi5t->getStyle()->getAlignment()->getWrapText() == false ? 1 : 0);
		$Voabp24yj0lr = ($Vtvntwrrzi5t->getStyle()->getAlignment()->getTextRotation() == null ? 1 : 0);
		$Vqk5t0zazpus = ($Vtvntwrrzi5t->getStyle()->getAlignment()->getIndent() == 0 ? 1 : 0);
		$Vjknxyn3rb24 = ($Vtvntwrrzi5t->getStyle()->getAlignment()->getShrinkToFit() == false ? 1 : 0);
		if($V5k3foozt1za == 0 || $Vkybrc1yhw3s == 0 || $Vglex5drm5q0 == 0 || $Voabp24yj0lr == 0 || $Vqk5t0zazpus == 0 || $Vjknxyn3rb24 == 0){
			$V0seehpjpdeb = 1;
		} else {
			$V0seehpjpdeb = 0;
		}
		
		$Vk4juzmyjqyk = ($Vtvntwrrzi5t->getStyle()->getProtection()->getLocked() == null ? 1 : 0);
		$V4xq54xrmaye = ($Vtvntwrrzi5t->getStyle()->getProtection()->getHidden() == null ? 1 : 0);
		if($Vk4juzmyjqyk == 0 || $V4xq54xrmaye == 0){
			$Vytit3zl3soe = 1;
		} else {
			$Vytit3zl3soe = 0;
		}
		
		$Vwkxsnlaext3 = ($Vtvntwrrzi5t->getStyle()->getBorders()->getLeft()->getColor()->getARGB() == PHPExcel_Style_Color::COLOR_BLACK
						&& $Vtvntwrrzi5t->getStyle()->getBorders()->getLeft()->getBorderStyle() == PHPExcel_Style_Border::BORDER_NONE ? 1 : 0);
		$Vjpze5ttqq1n = ($Vtvntwrrzi5t->getStyle()->getBorders()->getRight()->getColor()->getARGB() == PHPExcel_Style_Color::COLOR_BLACK
						&& $Vtvntwrrzi5t->getStyle()->getBorders()->getRight()->getBorderStyle() == PHPExcel_Style_Border::BORDER_NONE ? 1 : 0);
		$Vuhusegzso42 = ($Vtvntwrrzi5t->getStyle()->getBorders()->getTop()->getColor()->getARGB() == PHPExcel_Style_Color::COLOR_BLACK
						&& $Vtvntwrrzi5t->getStyle()->getBorders()->getTop()->getBorderStyle() == PHPExcel_Style_Border::BORDER_NONE ? 1 : 0);
		$V30d3zpcr15b = ($Vtvntwrrzi5t->getStyle()->getBorders()->getBottom()->getColor()->getARGB() == PHPExcel_Style_Color::COLOR_BLACK
						&& $Vtvntwrrzi5t->getStyle()->getBorders()->getBottom()->getBorderStyle() == PHPExcel_Style_Border::BORDER_NONE ? 1 : 0);
		if($Vwkxsnlaext3 == 0 || $Vjpze5ttqq1n == 0 || $Vuhusegzso42 == 0 || $V30d3zpcr15b == 0){
			$Vuxwdqlrkyeq = 1;
		} else {
			$Vuxwdqlrkyeq = 0;
		}
		
		$Vsvp1liv4nx2 = ($Vtvntwrrzi5t->getStyle()->getFill()->getFillType() == null ? 0 : 1);
		$Vsq0s0glflkm = ($Vtvntwrrzi5t->getStyle()->getFill()->getStartColor()->getARGB() == null ? 0 : 1);
		$Vsq0s0glflkmBg = ($Vtvntwrrzi5t->getStyle()->getFill()->getEndColor()->getARGB() == null ? 0 : 1);
		if($Vsvp1liv4nx2 == 0 || $Vsq0s0glflkm == 0 || $Vsq0s0glflkmBg == 0){
			$Vxyqpheh0tgx = 1;
		} else {
			$Vxyqpheh0tgx = 0;
		}
		
		if($Vtvntwrrzi5t->getStyle()->getFont()->getName() != null
			|| $Vtvntwrrzi5t->getStyle()->getFont()->getSize() != null
			|| $Vtvntwrrzi5t->getStyle()->getFont()->getBold() != null
			|| $Vtvntwrrzi5t->getStyle()->getFont()->getItalic() != null
			|| $Vtvntwrrzi5t->getStyle()->getFont()->getSuperScript() != null
			|| $Vtvntwrrzi5t->getStyle()->getFont()->getSubScript() != null
			|| $Vtvntwrrzi5t->getStyle()->getFont()->getUnderline() != null
			|| $Vtvntwrrzi5t->getStyle()->getFont()->getStrikethrough() != null
			|| $Vtvntwrrzi5t->getStyle()->getFont()->getColor()->getARGB() != null){
			$Vpcbkkcylhho = 1;
		} else {
			$Vpcbkkcylhho = 0;
		}
		
		$Veyvxwy10drd = 0;
		$Veyvxwy10drd |= (1 == $V5k3foozt1za      ? 0x00000001 : 0);
		$Veyvxwy10drd |= (1 == $Vkybrc1yhw3s      ? 0x00000002 : 0);
		$Veyvxwy10drd |= (1 == $Vglex5drm5q0  ? 0x00000004 : 0);
		$Veyvxwy10drd |= (1 == $Voabp24yj0lr   ? 0x00000008 : 0);
		
		$Veyvxwy10drd |= (1 == 1              ? 0x00000010 : 0);
		$Veyvxwy10drd |= (1 == $Vqk5t0zazpus       ? 0x00000020 : 0);
		$Veyvxwy10drd |= (1 == $Vjknxyn3rb24  ? 0x00000040 : 0);
		
		$Veyvxwy10drd |= (1 == 1              ? 0x00000080 : 0);
		
		$Veyvxwy10drd |= (1 == $Vk4juzmyjqyk   ? 0x00000100 : 0);
		$Veyvxwy10drd |= (1 == $V4xq54xrmaye   ? 0x00000200 : 0);
		
		$Veyvxwy10drd |= (1 == $Vwkxsnlaext3   ? 0x00000400 : 0);
		$Veyvxwy10drd |= (1 == $Vjpze5ttqq1n  ? 0x00000800 : 0);
		$Veyvxwy10drd |= (1 == $Vuhusegzso42    ? 0x00001000 : 0);
		$Veyvxwy10drd |= (1 == $V30d3zpcr15b ? 0x00002000 : 0);
		$Veyvxwy10drd |= (1 == 1              ? 0x00004000 : 0); 
		$Veyvxwy10drd |= (1 == 1              ? 0x00008000 : 0); 
		
		$Veyvxwy10drd |= (1 == $Vsvp1liv4nx2    ? 0x00010000 : 0);
		$Veyvxwy10drd |= (1 == $Vsq0s0glflkm    ? 0x00020000 : 0);
		$Veyvxwy10drd |= (1 == $Vsq0s0glflkmBg  ? 0x00040000 : 0);
		$Veyvxwy10drd |= (1 == 1              ? 0x00380000 : 0);
		
		$Veyvxwy10drd |= (1 == $Vpcbkkcylhho   ? 0x04000000 : 0);
	    
		$Veyvxwy10drd |= (1 == $V0seehpjpdeb  ? 0x08000000 : 0);
		
		$Veyvxwy10drd |= (1 == $Vuxwdqlrkyeq ? 0x10000000 : 0);
		
		$Veyvxwy10drd |= (1 == $Vxyqpheh0tgx   ? 0x20000000 : 0);
		
		$Veyvxwy10drd |= (1 == $Vytit3zl3soe   ? 0x40000000 : 0);
		
		$Veyvxwy10drd |= (1 == 0              ? 0x80000000 : 0);

		
		if($Vpcbkkcylhho == 1){
			
			if($Vtvntwrrzi5t->getStyle()->getFont()->getName() == null){
				$Vou4vxorrdoeBlockFont =  pack('VVVVVVVV', 0x00000000, 0x00000000, 0x00000000, 0x00000000, 0x00000000, 0x00000000, 0x00000000, 0x00000000);
				$Vou4vxorrdoeBlockFont .= pack('VVVVVVVV', 0x00000000, 0x00000000, 0x00000000, 0x00000000, 0x00000000, 0x00000000, 0x00000000, 0x00000000);
			} else {
				$Vou4vxorrdoeBlockFont = PHPExcel_Shared_String::UTF8toBIFF8UnicodeLong($Vtvntwrrzi5t->getStyle()->getFont()->getName());
			}
			
			if($Vtvntwrrzi5t->getStyle()->getFont()->getSize() == null){
				$Vou4vxorrdoeBlockFont .= pack('V', 20 * 11);
			} else {
				$Vou4vxorrdoeBlockFont .= pack('V', 20 * $Vtvntwrrzi5t->getStyle()->getFont()->getSize());
			}
			
			$Vou4vxorrdoeBlockFont .= pack('V', 0);
			
			if($Vtvntwrrzi5t->getStyle()->getFont()->getBold() == true){
				$Vou4vxorrdoeBlockFont .= pack('v', 0x02BC);
			} else {
				$Vou4vxorrdoeBlockFont .= pack('v', 0x0190);
			}
			
			if($Vtvntwrrzi5t->getStyle()->getFont()->getSubScript() == true){
				$Vou4vxorrdoeBlockFont .= pack('v', 0x02);
				$Vvwa0vyyrwvk = 0;
			} else if($Vtvntwrrzi5t->getStyle()->getFont()->getSuperScript() == true){
				$Vou4vxorrdoeBlockFont .= pack('v', 0x01);
				$Vvwa0vyyrwvk = 0;
			} else {
				$Vou4vxorrdoeBlockFont .= pack('v', 0x00);
				$Vvwa0vyyrwvk = 1;
			}
			
			switch ($Vtvntwrrzi5t->getStyle()->getFont()->getUnderline()){
				case PHPExcel_Style_Font::UNDERLINE_NONE             : $Vou4vxorrdoeBlockFont .= pack('C', 0x00); $Vkjhji03cxt1 = 0; break;
				case PHPExcel_Style_Font::UNDERLINE_DOUBLE           : $Vou4vxorrdoeBlockFont .= pack('C', 0x02); $Vkjhji03cxt1 = 0; break;
				case PHPExcel_Style_Font::UNDERLINE_DOUBLEACCOUNTING : $Vou4vxorrdoeBlockFont .= pack('C', 0x22); $Vkjhji03cxt1 = 0; break;
				case PHPExcel_Style_Font::UNDERLINE_SINGLE           : $Vou4vxorrdoeBlockFont .= pack('C', 0x01); $Vkjhji03cxt1 = 0; break;
				case PHPExcel_Style_Font::UNDERLINE_SINGLEACCOUNTING : $Vou4vxorrdoeBlockFont .= pack('C', 0x21); $Vkjhji03cxt1 = 0; break;
				default                                              : $Vou4vxorrdoeBlockFont .= pack('C', 0x00); $Vkjhji03cxt1 = 1; break;
			}
			
			$Vou4vxorrdoeBlockFont .= pack('vC', 0x0000, 0x00);
			
			switch ($Vtvntwrrzi5t->getStyle()->getFont()->getColor()->getRGB()) {
				case '000000': $Vswazvoa3xtsorIdx = 0x08; break;
				case 'FFFFFF': $Vswazvoa3xtsorIdx = 0x09; break;
				case 'FF0000': $Vswazvoa3xtsorIdx = 0x0A; break;
				case '00FF00': $Vswazvoa3xtsorIdx = 0x0B; break;
				case '0000FF': $Vswazvoa3xtsorIdx = 0x0C; break;
				case 'FFFF00': $Vswazvoa3xtsorIdx = 0x0D; break;
				case 'FF00FF': $Vswazvoa3xtsorIdx = 0x0E; break;
				case '00FFFF': $Vswazvoa3xtsorIdx = 0x0F; break;
				case '800000': $Vswazvoa3xtsorIdx = 0x10; break;
				case '008000': $Vswazvoa3xtsorIdx = 0x11; break;
				case '000080': $Vswazvoa3xtsorIdx = 0x12; break;
				case '808000': $Vswazvoa3xtsorIdx = 0x13; break;
				case '800080': $Vswazvoa3xtsorIdx = 0x14; break;
				case '008080': $Vswazvoa3xtsorIdx = 0x15; break;
				case 'C0C0C0': $Vswazvoa3xtsorIdx = 0x16; break;
				case '808080': $Vswazvoa3xtsorIdx = 0x17; break;
				case '9999FF': $Vswazvoa3xtsorIdx = 0x18; break;
				case '993366': $Vswazvoa3xtsorIdx = 0x19; break;
				case 'FFFFCC': $Vswazvoa3xtsorIdx = 0x1A; break;
				case 'CCFFFF': $Vswazvoa3xtsorIdx = 0x1B; break;
				case '660066': $Vswazvoa3xtsorIdx = 0x1C; break;
				case 'FF8080': $Vswazvoa3xtsorIdx = 0x1D; break;
				case '0066CC': $Vswazvoa3xtsorIdx = 0x1E; break;
				case 'CCCCFF': $Vswazvoa3xtsorIdx = 0x1F; break;
				case '000080': $Vswazvoa3xtsorIdx = 0x20; break;
				case 'FF00FF': $Vswazvoa3xtsorIdx = 0x21; break;
				case 'FFFF00': $Vswazvoa3xtsorIdx = 0x22; break;
				case '00FFFF': $Vswazvoa3xtsorIdx = 0x23; break;
				case '800080': $Vswazvoa3xtsorIdx = 0x24; break;
				case '800000': $Vswazvoa3xtsorIdx = 0x25; break;
				case '008080': $Vswazvoa3xtsorIdx = 0x26; break;
				case '0000FF': $Vswazvoa3xtsorIdx = 0x27; break;
				case '00CCFF': $Vswazvoa3xtsorIdx = 0x28; break;
				case 'CCFFFF': $Vswazvoa3xtsorIdx = 0x29; break;
				case 'CCFFCC': $Vswazvoa3xtsorIdx = 0x2A; break;
				case 'FFFF99': $Vswazvoa3xtsorIdx = 0x2B; break;
				case '99CCFF': $Vswazvoa3xtsorIdx = 0x2C; break;
				case 'FF99CC': $Vswazvoa3xtsorIdx = 0x2D; break;
				case 'CC99FF': $Vswazvoa3xtsorIdx = 0x2E; break;
				case 'FFCC99': $Vswazvoa3xtsorIdx = 0x2F; break;
				case '3366FF': $Vswazvoa3xtsorIdx = 0x30; break;
				case '33CCCC': $Vswazvoa3xtsorIdx = 0x31; break;
				case '99CC00': $Vswazvoa3xtsorIdx = 0x32; break;
				case 'FFCC00': $Vswazvoa3xtsorIdx = 0x33; break;
				case 'FF9900': $Vswazvoa3xtsorIdx = 0x34; break;
				case 'FF6600': $Vswazvoa3xtsorIdx = 0x35; break;
				case '666699': $Vswazvoa3xtsorIdx = 0x36; break;
				case '969696': $Vswazvoa3xtsorIdx = 0x37; break;
				case '003366': $Vswazvoa3xtsorIdx = 0x38; break;
				case '339966': $Vswazvoa3xtsorIdx = 0x39; break;
				case '003300': $Vswazvoa3xtsorIdx = 0x3A; break;
				case '333300': $Vswazvoa3xtsorIdx = 0x3B; break;
				case '993300': $Vswazvoa3xtsorIdx = 0x3C; break;
				case '993366': $Vswazvoa3xtsorIdx = 0x3D; break;
				case '333399': $Vswazvoa3xtsorIdx = 0x3E; break;
				case '333333': $Vswazvoa3xtsorIdx = 0x3F; break;
				default: $Vswazvoa3xtsorIdx = 0x00; break;
			}
			$Vou4vxorrdoeBlockFont .= pack('V', $Vswazvoa3xtsorIdx);
			
			$Vou4vxorrdoeBlockFont .= pack('V', 0x00000000);
			
			$Vobxlvad3352Flags = 0;
			$Vobxlvad3352FlagsBold = ($Vtvntwrrzi5t->getStyle()->getFont()->getBold() == null ? 1 : 0);
			$Vobxlvad3352Flags |= (1 == $Vobxlvad3352FlagsBold  ? 0x00000002 : 0);
			$Vobxlvad3352Flags |= (1 == 1                  ? 0x00000008 : 0);
			$Vobxlvad3352Flags |= (1 == 1                  ? 0x00000010 : 0);
			$Vobxlvad3352Flags |= (1 == 0                  ? 0x00000020 : 0);
			$Vobxlvad3352Flags |= (1 == 1                  ? 0x00000080 : 0);
			$Vou4vxorrdoeBlockFont .= pack('V', $Vobxlvad3352Flags);
			
			$Vou4vxorrdoeBlockFont .= pack('V', $Vvwa0vyyrwvk);
			
			$Vou4vxorrdoeBlockFont .= pack('V', $Vkjhji03cxt1);
			
			$Vou4vxorrdoeBlockFont .= pack('V', 0x00000000);
			
			$Vou4vxorrdoeBlockFont .= pack('V', 0x00000000);
			
			$Vou4vxorrdoeBlockFont .= pack('VV', 0x00000000, 0x00000000);
			
			$Vou4vxorrdoeBlockFont .= pack('v', 0x0001);
		}
		if($V0seehpjpdeb == 1){
			$Vikflkq0oggc = 0;
			
			switch ($Vtvntwrrzi5t->getStyle()->getAlignment()->getHorizontal()){
				case PHPExcel_Style_Alignment::HORIZONTAL_GENERAL 			: $Vikflkq0oggc = 0; break;
				case PHPExcel_Style_Alignment::HORIZONTAL_LEFT				: $Vikflkq0oggc = 1; break;
				case PHPExcel_Style_Alignment::HORIZONTAL_RIGHT				: $Vikflkq0oggc = 3; break;
				case PHPExcel_Style_Alignment::HORIZONTAL_CENTER			: $Vikflkq0oggc = 2; break;
				case PHPExcel_Style_Alignment::HORIZONTAL_CENTER_CONTINUOUS	: $Vikflkq0oggc = 6; break;
				case PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY			: $Vikflkq0oggc = 5; break;
			}
			if($Vtvntwrrzi5t->getStyle()->getAlignment()->getWrapText() == true){
				$Vikflkq0oggc |= 1 << 3;
			} else {
				$Vikflkq0oggc |= 0 << 3;
			}
			switch ($Vtvntwrrzi5t->getStyle()->getAlignment()->getVertical()){
				case PHPExcel_Style_Alignment::VERTICAL_BOTTOM 				: $Vikflkq0oggc = 2 << 4; break;
				case PHPExcel_Style_Alignment::VERTICAL_TOP					: $Vikflkq0oggc = 0 << 4; break;
				case PHPExcel_Style_Alignment::VERTICAL_CENTER				: $Vikflkq0oggc = 1 << 4; break;
				case PHPExcel_Style_Alignment::VERTICAL_JUSTIFY				: $Vikflkq0oggc = 3 << 4; break;
			}
			$Vikflkq0oggc |= 0 << 7;

			
			$Vl4s4th50k4r = $Vtvntwrrzi5t->getStyle()->getAlignment()->getTextRotation();

			
			$Vfj2loc32ebw = $Vtvntwrrzi5t->getStyle()->getAlignment()->getIndent();
			if($Vtvntwrrzi5t->getStyle()->getAlignment()->getShrinkToFit() == true){
				$Vfj2loc32ebw |= 1 << 4;
			} else {
				$Vfj2loc32ebw |= 0 << 4;
			}
			$Vfj2loc32ebw |= 0 << 6;

			
			$Vfj2loc32ebwRelative = 255;

			$Vou4vxorrdoeBlockAlign = pack('CCvvv', $Vikflkq0oggc, $Vl4s4th50k4r, $Vfj2loc32ebw, $Vfj2loc32ebwRelative, 0x0000);
		}
		if($Vuxwdqlrkyeq == 1){
			$Vsinmkzo1knp = 0;
			switch ($Vtvntwrrzi5t->getStyle()->getBorders()->getLeft()->getBorderStyle()){
				case PHPExcel_Style_Border::BORDER_NONE              : $Vsinmkzo1knp |= 0x00; break;
				case PHPExcel_Style_Border::BORDER_THIN              : $Vsinmkzo1knp |= 0x01; break;
				case PHPExcel_Style_Border::BORDER_MEDIUM            : $Vsinmkzo1knp |= 0x02; break;
				case PHPExcel_Style_Border::BORDER_DASHED            : $Vsinmkzo1knp |= 0x03; break;
				case PHPExcel_Style_Border::BORDER_DOTTED            : $Vsinmkzo1knp |= 0x04; break;
				case PHPExcel_Style_Border::BORDER_THICK             : $Vsinmkzo1knp |= 0x05; break;
				case PHPExcel_Style_Border::BORDER_DOUBLE            : $Vsinmkzo1knp |= 0x06; break;
				case PHPExcel_Style_Border::BORDER_HAIR              : $Vsinmkzo1knp |= 0x07; break;
				case PHPExcel_Style_Border::BORDER_MEDIUMDASHED      : $Vsinmkzo1knp |= 0x08; break;
				case PHPExcel_Style_Border::BORDER_DASHDOT           : $Vsinmkzo1knp |= 0x09; break;
				case PHPExcel_Style_Border::BORDER_MEDIUMDASHDOT     : $Vsinmkzo1knp |= 0x0A; break;
				case PHPExcel_Style_Border::BORDER_DASHDOTDOT        : $Vsinmkzo1knp |= 0x0B; break;
				case PHPExcel_Style_Border::BORDER_MEDIUMDASHDOTDOT  : $Vsinmkzo1knp |= 0x0C; break;
				case PHPExcel_Style_Border::BORDER_SLANTDASHDOT      : $Vsinmkzo1knp |= 0x0D; break;
			}
			switch ($Vtvntwrrzi5t->getStyle()->getBorders()->getRight()->getBorderStyle()){
				case PHPExcel_Style_Border::BORDER_NONE              : $Vsinmkzo1knp |= 0x00 << 4; break;
				case PHPExcel_Style_Border::BORDER_THIN              : $Vsinmkzo1knp |= 0x01 << 4; break;
				case PHPExcel_Style_Border::BORDER_MEDIUM            : $Vsinmkzo1knp |= 0x02 << 4; break;
				case PHPExcel_Style_Border::BORDER_DASHED            : $Vsinmkzo1knp |= 0x03 << 4; break;
				case PHPExcel_Style_Border::BORDER_DOTTED            : $Vsinmkzo1knp |= 0x04 << 4; break;
				case PHPExcel_Style_Border::BORDER_THICK             : $Vsinmkzo1knp |= 0x05 << 4; break;
				case PHPExcel_Style_Border::BORDER_DOUBLE            : $Vsinmkzo1knp |= 0x06 << 4; break;
				case PHPExcel_Style_Border::BORDER_HAIR              : $Vsinmkzo1knp |= 0x07 << 4; break;
				case PHPExcel_Style_Border::BORDER_MEDIUMDASHED      : $Vsinmkzo1knp |= 0x08 << 4; break;
				case PHPExcel_Style_Border::BORDER_DASHDOT           : $Vsinmkzo1knp |= 0x09 << 4; break;
				case PHPExcel_Style_Border::BORDER_MEDIUMDASHDOT     : $Vsinmkzo1knp |= 0x0A << 4; break;
				case PHPExcel_Style_Border::BORDER_DASHDOTDOT        : $Vsinmkzo1knp |= 0x0B << 4; break;
				case PHPExcel_Style_Border::BORDER_MEDIUMDASHDOTDOT  : $Vsinmkzo1knp |= 0x0C << 4; break;
				case PHPExcel_Style_Border::BORDER_SLANTDASHDOT      : $Vsinmkzo1knp |= 0x0D << 4; break;
			}
			switch ($Vtvntwrrzi5t->getStyle()->getBorders()->getTop()->getBorderStyle()){
				case PHPExcel_Style_Border::BORDER_NONE              : $Vsinmkzo1knp |= 0x00 << 8; break;
				case PHPExcel_Style_Border::BORDER_THIN              : $Vsinmkzo1knp |= 0x01 << 8; break;
				case PHPExcel_Style_Border::BORDER_MEDIUM            : $Vsinmkzo1knp |= 0x02 << 8; break;
				case PHPExcel_Style_Border::BORDER_DASHED            : $Vsinmkzo1knp |= 0x03 << 8; break;
				case PHPExcel_Style_Border::BORDER_DOTTED            : $Vsinmkzo1knp |= 0x04 << 8; break;
				case PHPExcel_Style_Border::BORDER_THICK             : $Vsinmkzo1knp |= 0x05 << 8; break;
				case PHPExcel_Style_Border::BORDER_DOUBLE            : $Vsinmkzo1knp |= 0x06 << 8; break;
				case PHPExcel_Style_Border::BORDER_HAIR              : $Vsinmkzo1knp |= 0x07 << 8; break;
				case PHPExcel_Style_Border::BORDER_MEDIUMDASHED      : $Vsinmkzo1knp |= 0x08 << 8; break;
				case PHPExcel_Style_Border::BORDER_DASHDOT           : $Vsinmkzo1knp |= 0x09 << 8; break;
				case PHPExcel_Style_Border::BORDER_MEDIUMDASHDOT     : $Vsinmkzo1knp |= 0x0A << 8; break;
				case PHPExcel_Style_Border::BORDER_DASHDOTDOT        : $Vsinmkzo1knp |= 0x0B << 8; break;
				case PHPExcel_Style_Border::BORDER_MEDIUMDASHDOTDOT  : $Vsinmkzo1knp |= 0x0C << 8; break;
				case PHPExcel_Style_Border::BORDER_SLANTDASHDOT      : $Vsinmkzo1knp |= 0x0D << 8; break;
			}
			switch ($Vtvntwrrzi5t->getStyle()->getBorders()->getBottom()->getBorderStyle()){
				case PHPExcel_Style_Border::BORDER_NONE              : $Vsinmkzo1knp |= 0x00 << 12; break;
				case PHPExcel_Style_Border::BORDER_THIN              : $Vsinmkzo1knp |= 0x01 << 12; break;
				case PHPExcel_Style_Border::BORDER_MEDIUM            : $Vsinmkzo1knp |= 0x02 << 12; break;
				case PHPExcel_Style_Border::BORDER_DASHED            : $Vsinmkzo1knp |= 0x03 << 12; break;
				case PHPExcel_Style_Border::BORDER_DOTTED            : $Vsinmkzo1knp |= 0x04 << 12; break;
				case PHPExcel_Style_Border::BORDER_THICK             : $Vsinmkzo1knp |= 0x05 << 12; break;
				case PHPExcel_Style_Border::BORDER_DOUBLE            : $Vsinmkzo1knp |= 0x06 << 12; break;
				case PHPExcel_Style_Border::BORDER_HAIR              : $Vsinmkzo1knp |= 0x07 << 12; break;
				case PHPExcel_Style_Border::BORDER_MEDIUMDASHED      : $Vsinmkzo1knp |= 0x08 << 12; break;
				case PHPExcel_Style_Border::BORDER_DASHDOT           : $Vsinmkzo1knp |= 0x09 << 12; break;
				case PHPExcel_Style_Border::BORDER_MEDIUMDASHDOT     : $Vsinmkzo1knp |= 0x0A << 12; break;
				case PHPExcel_Style_Border::BORDER_DASHDOTDOT        : $Vsinmkzo1knp |= 0x0B << 12; break;
				case PHPExcel_Style_Border::BORDER_MEDIUMDASHDOTDOT  : $Vsinmkzo1knp |= 0x0C << 12; break;
				case PHPExcel_Style_Border::BORDER_SLANTDASHDOT      : $Vsinmkzo1knp |= 0x0D << 12; break;
			}
			
			
			
			
			$Vpctp1dr2qys = 0;
			
			
			
			switch ($Vtvntwrrzi5t->getStyle()->getBorders()->getDiagonal()->getBorderStyle()){
				case PHPExcel_Style_Border::BORDER_NONE              : $Vpctp1dr2qys |= 0x00 << 21; break;
				case PHPExcel_Style_Border::BORDER_THIN              : $Vpctp1dr2qys |= 0x01 << 21; break;
				case PHPExcel_Style_Border::BORDER_MEDIUM            : $Vpctp1dr2qys |= 0x02 << 21; break;
				case PHPExcel_Style_Border::BORDER_DASHED            : $Vpctp1dr2qys |= 0x03 << 21; break;
				case PHPExcel_Style_Border::BORDER_DOTTED            : $Vpctp1dr2qys |= 0x04 << 21; break;
				case PHPExcel_Style_Border::BORDER_THICK             : $Vpctp1dr2qys |= 0x05 << 21; break;
				case PHPExcel_Style_Border::BORDER_DOUBLE            : $Vpctp1dr2qys |= 0x06 << 21; break;
				case PHPExcel_Style_Border::BORDER_HAIR              : $Vpctp1dr2qys |= 0x07 << 21; break;
				case PHPExcel_Style_Border::BORDER_MEDIUMDASHED      : $Vpctp1dr2qys |= 0x08 << 21; break;
				case PHPExcel_Style_Border::BORDER_DASHDOT           : $Vpctp1dr2qys |= 0x09 << 21; break;
				case PHPExcel_Style_Border::BORDER_MEDIUMDASHDOT     : $Vpctp1dr2qys |= 0x0A << 21; break;
				case PHPExcel_Style_Border::BORDER_DASHDOTDOT        : $Vpctp1dr2qys |= 0x0B << 21; break;
				case PHPExcel_Style_Border::BORDER_MEDIUMDASHDOTDOT  : $Vpctp1dr2qys |= 0x0C << 21; break;
				case PHPExcel_Style_Border::BORDER_SLANTDASHDOT      : $Vpctp1dr2qys |= 0x0D << 21; break;
			}
			$Vou4vxorrdoeBlockBorder = pack('vv', $Vsinmkzo1knp, $Vpctp1dr2qys);
		}
		if($Vxyqpheh0tgx == 1){
			
			$Vuqzfa4ob3m3 = 0;
			switch ($Vtvntwrrzi5t->getStyle()->getFill()->getFillType()){
				case PHPExcel_Style_Fill::FILL_NONE						: $Vuqzfa4ob3m3 = 0x00; break;
				case PHPExcel_Style_Fill::FILL_SOLID					: $Vuqzfa4ob3m3 = 0x01; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_MEDIUMGRAY		: $Vuqzfa4ob3m3 = 0x02; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_DARKGRAY			: $Vuqzfa4ob3m3 = 0x03; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_LIGHTGRAY		: $Vuqzfa4ob3m3 = 0x04; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_DARKHORIZONTAL	: $Vuqzfa4ob3m3 = 0x05; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_DARKVERTICAL		: $Vuqzfa4ob3m3 = 0x06; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_DARKDOWN			: $Vuqzfa4ob3m3 = 0x07; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_DARKUP			: $Vuqzfa4ob3m3 = 0x08; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_DARKGRID			: $Vuqzfa4ob3m3 = 0x09; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_DARKTRELLIS		: $Vuqzfa4ob3m3 = 0x0A; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_LIGHTHORIZONTAL	: $Vuqzfa4ob3m3 = 0x0B; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_LIGHTVERTICAL	: $Vuqzfa4ob3m3 = 0x0C; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN		: $Vuqzfa4ob3m3 = 0x0D; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_LIGHTUP			: $Vuqzfa4ob3m3 = 0x0E; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_LIGHTGRID		: $Vuqzfa4ob3m3 = 0x0F; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_LIGHTTRELLIS		: $Vuqzfa4ob3m3 = 0x10; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_GRAY125			: $Vuqzfa4ob3m3 = 0x11; break;
				case PHPExcel_Style_Fill::FILL_PATTERN_GRAY0625			: $Vuqzfa4ob3m3 = 0x12; break;
				case PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR			: $Vuqzfa4ob3m3 = 0x00; break;	
				case PHPExcel_Style_Fill::FILL_GRADIENT_PATH			: $Vuqzfa4ob3m3 = 0x00; break;	
				default                                                 : $Vuqzfa4ob3m3 = 0x00; break;
			}
			
			switch ($Vtvntwrrzi5t->getStyle()->getFill()->getStartColor()->getRGB()) {
				case '000000': $Vswazvoa3xtsorIdxBg = 0x08; break;
				case 'FFFFFF': $Vswazvoa3xtsorIdxBg = 0x09; break;
				case 'FF0000': $Vswazvoa3xtsorIdxBg = 0x0A; break;
				case '00FF00': $Vswazvoa3xtsorIdxBg = 0x0B; break;
				case '0000FF': $Vswazvoa3xtsorIdxBg = 0x0C; break;
				case 'FFFF00': $Vswazvoa3xtsorIdxBg = 0x0D; break;
				case 'FF00FF': $Vswazvoa3xtsorIdxBg = 0x0E; break;
				case '00FFFF': $Vswazvoa3xtsorIdxBg = 0x0F; break;
				case '800000': $Vswazvoa3xtsorIdxBg = 0x10; break;
				case '008000': $Vswazvoa3xtsorIdxBg = 0x11; break;
				case '000080': $Vswazvoa3xtsorIdxBg = 0x12; break;
				case '808000': $Vswazvoa3xtsorIdxBg = 0x13; break;
				case '800080': $Vswazvoa3xtsorIdxBg = 0x14; break;
				case '008080': $Vswazvoa3xtsorIdxBg = 0x15; break;
				case 'C0C0C0': $Vswazvoa3xtsorIdxBg = 0x16; break;
				case '808080': $Vswazvoa3xtsorIdxBg = 0x17; break;
				case '9999FF': $Vswazvoa3xtsorIdxBg = 0x18; break;
				case '993366': $Vswazvoa3xtsorIdxBg = 0x19; break;
				case 'FFFFCC': $Vswazvoa3xtsorIdxBg = 0x1A; break;
				case 'CCFFFF': $Vswazvoa3xtsorIdxBg = 0x1B; break;
				case '660066': $Vswazvoa3xtsorIdxBg = 0x1C; break;
				case 'FF8080': $Vswazvoa3xtsorIdxBg = 0x1D; break;
				case '0066CC': $Vswazvoa3xtsorIdxBg = 0x1E; break;
				case 'CCCCFF': $Vswazvoa3xtsorIdxBg = 0x1F; break;
				case '000080': $Vswazvoa3xtsorIdxBg = 0x20; break;
				case 'FF00FF': $Vswazvoa3xtsorIdxBg = 0x21; break;
				case 'FFFF00': $Vswazvoa3xtsorIdxBg = 0x22; break;
				case '00FFFF': $Vswazvoa3xtsorIdxBg = 0x23; break;
				case '800080': $Vswazvoa3xtsorIdxBg = 0x24; break;
				case '800000': $Vswazvoa3xtsorIdxBg = 0x25; break;
				case '008080': $Vswazvoa3xtsorIdxBg = 0x26; break;
				case '0000FF': $Vswazvoa3xtsorIdxBg = 0x27; break;
				case '00CCFF': $Vswazvoa3xtsorIdxBg = 0x28; break;
				case 'CCFFFF': $Vswazvoa3xtsorIdxBg = 0x29; break;
				case 'CCFFCC': $Vswazvoa3xtsorIdxBg = 0x2A; break;
				case 'FFFF99': $Vswazvoa3xtsorIdxBg = 0x2B; break;
				case '99CCFF': $Vswazvoa3xtsorIdxBg = 0x2C; break;
				case 'FF99CC': $Vswazvoa3xtsorIdxBg = 0x2D; break;
				case 'CC99FF': $Vswazvoa3xtsorIdxBg = 0x2E; break;
				case 'FFCC99': $Vswazvoa3xtsorIdxBg = 0x2F; break;
				case '3366FF': $Vswazvoa3xtsorIdxBg = 0x30; break;
				case '33CCCC': $Vswazvoa3xtsorIdxBg = 0x31; break;
				case '99CC00': $Vswazvoa3xtsorIdxBg = 0x32; break;
				case 'FFCC00': $Vswazvoa3xtsorIdxBg = 0x33; break;
				case 'FF9900': $Vswazvoa3xtsorIdxBg = 0x34; break;
				case 'FF6600': $Vswazvoa3xtsorIdxBg = 0x35; break;
				case '666699': $Vswazvoa3xtsorIdxBg = 0x36; break;
				case '969696': $Vswazvoa3xtsorIdxBg = 0x37; break;
				case '003366': $Vswazvoa3xtsorIdxBg = 0x38; break;
				case '339966': $Vswazvoa3xtsorIdxBg = 0x39; break;
				case '003300': $Vswazvoa3xtsorIdxBg = 0x3A; break;
				case '333300': $Vswazvoa3xtsorIdxBg = 0x3B; break;
				case '993300': $Vswazvoa3xtsorIdxBg = 0x3C; break;
				case '993366': $Vswazvoa3xtsorIdxBg = 0x3D; break;
				case '333399': $Vswazvoa3xtsorIdxBg = 0x3E; break;
				case '333333': $Vswazvoa3xtsorIdxBg = 0x3F; break;
				default:       $Vswazvoa3xtsorIdxBg = 0x41; break;
			}
			
			switch ($Vtvntwrrzi5t->getStyle()->getFill()->getEndColor()->getRGB()) {
				case '000000': $Vswazvoa3xtsorIdxFg = 0x08; break;
				case 'FFFFFF': $Vswazvoa3xtsorIdxFg = 0x09; break;
				case 'FF0000': $Vswazvoa3xtsorIdxFg = 0x0A; break;
				case '00FF00': $Vswazvoa3xtsorIdxFg = 0x0B; break;
				case '0000FF': $Vswazvoa3xtsorIdxFg = 0x0C; break;
				case 'FFFF00': $Vswazvoa3xtsorIdxFg = 0x0D; break;
				case 'FF00FF': $Vswazvoa3xtsorIdxFg = 0x0E; break;
				case '00FFFF': $Vswazvoa3xtsorIdxFg = 0x0F; break;
				case '800000': $Vswazvoa3xtsorIdxFg = 0x10; break;
				case '008000': $Vswazvoa3xtsorIdxFg = 0x11; break;
				case '000080': $Vswazvoa3xtsorIdxFg = 0x12; break;
				case '808000': $Vswazvoa3xtsorIdxFg = 0x13; break;
				case '800080': $Vswazvoa3xtsorIdxFg = 0x14; break;
				case '008080': $Vswazvoa3xtsorIdxFg = 0x15; break;
				case 'C0C0C0': $Vswazvoa3xtsorIdxFg = 0x16; break;
				case '808080': $Vswazvoa3xtsorIdxFg = 0x17; break;
				case '9999FF': $Vswazvoa3xtsorIdxFg = 0x18; break;
				case '993366': $Vswazvoa3xtsorIdxFg = 0x19; break;
				case 'FFFFCC': $Vswazvoa3xtsorIdxFg = 0x1A; break;
				case 'CCFFFF': $Vswazvoa3xtsorIdxFg = 0x1B; break;
				case '660066': $Vswazvoa3xtsorIdxFg = 0x1C; break;
				case 'FF8080': $Vswazvoa3xtsorIdxFg = 0x1D; break;
				case '0066CC': $Vswazvoa3xtsorIdxFg = 0x1E; break;
				case 'CCCCFF': $Vswazvoa3xtsorIdxFg = 0x1F; break;
				case '000080': $Vswazvoa3xtsorIdxFg = 0x20; break;
				case 'FF00FF': $Vswazvoa3xtsorIdxFg = 0x21; break;
				case 'FFFF00': $Vswazvoa3xtsorIdxFg = 0x22; break;
				case '00FFFF': $Vswazvoa3xtsorIdxFg = 0x23; break;
				case '800080': $Vswazvoa3xtsorIdxFg = 0x24; break;
				case '800000': $Vswazvoa3xtsorIdxFg = 0x25; break;
				case '008080': $Vswazvoa3xtsorIdxFg = 0x26; break;
				case '0000FF': $Vswazvoa3xtsorIdxFg = 0x27; break;
				case '00CCFF': $Vswazvoa3xtsorIdxFg = 0x28; break;
				case 'CCFFFF': $Vswazvoa3xtsorIdxFg = 0x29; break;
				case 'CCFFCC': $Vswazvoa3xtsorIdxFg = 0x2A; break;
				case 'FFFF99': $Vswazvoa3xtsorIdxFg = 0x2B; break;
				case '99CCFF': $Vswazvoa3xtsorIdxFg = 0x2C; break;
				case 'FF99CC': $Vswazvoa3xtsorIdxFg = 0x2D; break;
				case 'CC99FF': $Vswazvoa3xtsorIdxFg = 0x2E; break;
				case 'FFCC99': $Vswazvoa3xtsorIdxFg = 0x2F; break;
				case '3366FF': $Vswazvoa3xtsorIdxFg = 0x30; break;
				case '33CCCC': $Vswazvoa3xtsorIdxFg = 0x31; break;
				case '99CC00': $Vswazvoa3xtsorIdxFg = 0x32; break;
				case 'FFCC00': $Vswazvoa3xtsorIdxFg = 0x33; break;
				case 'FF9900': $Vswazvoa3xtsorIdxFg = 0x34; break;
				case 'FF6600': $Vswazvoa3xtsorIdxFg = 0x35; break;
				case '666699': $Vswazvoa3xtsorIdxFg = 0x36; break;
				case '969696': $Vswazvoa3xtsorIdxFg = 0x37; break;
				case '003366': $Vswazvoa3xtsorIdxFg = 0x38; break;
				case '339966': $Vswazvoa3xtsorIdxFg = 0x39; break;
				case '003300': $Vswazvoa3xtsorIdxFg = 0x3A; break;
				case '333300': $Vswazvoa3xtsorIdxFg = 0x3B; break;
				case '993300': $Vswazvoa3xtsorIdxFg = 0x3C; break;
				case '993366': $Vswazvoa3xtsorIdxFg = 0x3D; break;
				case '333399': $Vswazvoa3xtsorIdxFg = 0x3E; break;
				case '333333': $Vswazvoa3xtsorIdxFg = 0x3F; break;
				default:       $Vswazvoa3xtsorIdxFg = 0x40; break;
			}
			$Vou4vxorrdoeBlockFill = pack('v', $Vuqzfa4ob3m3);
			$Vou4vxorrdoeBlockFill .= pack('v', $Vswazvoa3xtsorIdxFg | ($Vswazvoa3xtsorIdxBg << 7));
		}
		if($Vytit3zl3soe == 1){
			$Vou4vxorrdoeBlockProtection = 0;
			if($Vtvntwrrzi5t->getStyle()->getProtection()->getLocked() == PHPExcel_Style_Protection::PROTECTION_PROTECTED){
				$Vou4vxorrdoeBlockProtection = 1;
			}
			if($Vtvntwrrzi5t->getStyle()->getProtection()->getHidden() == PHPExcel_Style_Protection::PROTECTION_PROTECTED){
				$Vou4vxorrdoeBlockProtection = 1 << 1;
			}
		}

		$Vou4vxorrdoe	  = pack('CCvvVv', $V4pigtpor0ln, $Vxxvi5lwwffpType, $Vzq2lg0kb52z, $Vsom01wg0d52, $Veyvxwy10drd, 0x0000);
		if($Vpcbkkcylhho == 1){ 
			$Vou4vxorrdoe .= $Vou4vxorrdoeBlockFont;
		}
		if($V0seehpjpdeb == 1){
			$Vou4vxorrdoe .= $Vou4vxorrdoeBlockAlign;
		}
		if($Vuxwdqlrkyeq == 1){
			$Vou4vxorrdoe .= $Vou4vxorrdoeBlockBorder;
		}
		if($Vxyqpheh0tgx == 1){ 
			$Vou4vxorrdoe .= $Vou4vxorrdoeBlockFill;
		}
		if($Vytit3zl3soe == 1){
			$Vou4vxorrdoe .= $Vou4vxorrdoeBlockProtection;
		}
		if(!is_null($Vlsk0dcfee55)){
			$Vou4vxorrdoe .= $Vlsk0dcfee55;
		}
		if(!is_null($Vildd1o1hqvn)){
			$Vou4vxorrdoe .= $Vildd1o1hqvn;
		}
		$Vl5rjgb1nsf3	  = pack('vv', $Vkry1ureuzsj, strlen($Vou4vxorrdoe));
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private function _writeCFHeader(){
		$Vkry1ureuzsj	  = 0x01B0;			   
		$Volq3gdvkuqp	  = 0x0016;			   

		$Vcgbfu1dtv3lColumnMin = null;
		$Vcgbfu1dtv3lColumnMax = null;
		$Vcgbfu1dtv3lRowMin = null;
		$Vcgbfu1dtv3lRowMax = null;
		$V3sw50lzu5qb = array();
		foreach ($this->_phpSheet->getConditionalStylesCollection() as $Vblc1ueqvbtiCoordinate => $Vrlulqrqtem4) {
			foreach ($Vrlulqrqtem4 as $Vtvntwrrzi5t) {
				if($Vtvntwrrzi5t->getConditionType() == PHPExcel_Style_Conditional::CONDITION_EXPRESSION
						|| $Vtvntwrrzi5t->getConditionType() == PHPExcel_Style_Conditional::CONDITION_CELLIS){
					if(!in_array($Vtvntwrrzi5t->getHashCode(), $V3sw50lzu5qb)){
						$V3sw50lzu5qb[] = $Vtvntwrrzi5t->getHashCode();
					}
					
					$Vxpueqtur5xc = PHPExcel_Cell::coordinateFromString($Vblc1ueqvbtiCoordinate);
					if(!is_numeric($Vxpueqtur5xc[0])){
						$Vxpueqtur5xc[0] = PHPExcel_Cell::columnIndexFromString($Vxpueqtur5xc[0]);
					}
					if(is_null($Vcgbfu1dtv3lColumnMin) || ($Vcgbfu1dtv3lColumnMin > $Vxpueqtur5xc[0])){
						$Vcgbfu1dtv3lColumnMin = $Vxpueqtur5xc[0];
					}
					if(is_null($Vcgbfu1dtv3lColumnMax) || ($Vcgbfu1dtv3lColumnMax < $Vxpueqtur5xc[0])){
						$Vcgbfu1dtv3lColumnMax = $Vxpueqtur5xc[0];
					}
					if(is_null($Vcgbfu1dtv3lRowMin) || ($Vcgbfu1dtv3lRowMin > $Vxpueqtur5xc[1])){
						$Vcgbfu1dtv3lRowMin = $Vxpueqtur5xc[1];
					}
					if(is_null($Vcgbfu1dtv3lRowMax) || ($Vcgbfu1dtv3lRowMax < $Vxpueqtur5xc[1])){
						$Vcgbfu1dtv3lRowMax = $Vxpueqtur5xc[1];
					}
				}
			}
		}
		$Vxem11ftup3w = 1;
		$Vblc1ueqvbtiRange = pack('vvvv', $Vcgbfu1dtv3lRowMin-1, $Vcgbfu1dtv3lRowMax-1, $Vcgbfu1dtv3lColumnMin-1, $Vcgbfu1dtv3lColumnMax-1);

		$Vl5rjgb1nsf3	  = pack('vv', $Vkry1ureuzsj, $Volq3gdvkuqp);
		$Vou4vxorrdoe	  = pack('vv', count($V3sw50lzu5qb), $Vxem11ftup3w);
		$Vou4vxorrdoe     .= $Vblc1ueqvbtiRange;
		$Vou4vxorrdoe     .= pack('v', 0x0001);
		$Vou4vxorrdoe     .= $Vblc1ueqvbtiRange;
		$this->_append($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}
}