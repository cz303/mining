<?php




require_once(PHPExcel_Settings::getChartRendererPath().'/jpgraph.php');



class PHPExcel_Chart_Renderer_jpgraph
{
	private static $V1hgtvz3lirj	= 640;

	private static $Vcbzw3tnapla	= 480;

	private static $Vovre4vm25kt = array( 'mediumpurple1',	'palegreen3',	'gold1',		'cadetblue1',
										'darkmagenta',		'coral',		'dodgerblue3',	'eggplant',
										'mediumblue',		'magenta',		'sandybrown',	'cyan',
										'firebrick1',		'forestgreen',	'deeppink4',	'darkolivegreen',
										'goldenrod2'
									  );

	private static $Vmrsvdeggrvm = array(	'diamond'	=> MARK_DIAMOND,
										'square'	=> MARK_SQUARE,
										'triangle'	=> MARK_UTRIANGLE,
										'x'			=> MARK_X,
										'star'		=> MARK_STAR,
										'dot'		=> MARK_FILLEDCIRCLE,
										'dash'		=> MARK_DTRIANGLE,
										'circle'	=> MARK_CIRCLE,
										'plus'		=> MARK_CROSS
									);


	private $Vbd5etkm1xs3	= null;

	private $Vfwzodes551k	= null;

	private static $Vu5oqmektjvq	= 0;

	private static $Vob1sfebuzbs	= 0;


	private function _formatPointMarker($Veyhfqengb2d,$Voyl5j1xn2es) {
		$Vyzrr0og31yi = array_keys(self::$Vmrsvdeggrvm);
		if (is_null($Voyl5j1xn2es)) {
			
			self::$Vob1sfebuzbs %= count(self::$Vmrsvdeggrvm);
			$Veyhfqengb2d->mark->SetType(self::$Vmrsvdeggrvm[$Vyzrr0og31yi[self::$Vob1sfebuzbs++]]);
		} elseif ($Voyl5j1xn2es !== 'none') {
			
			if (isset(self::$Vmrsvdeggrvm[$Voyl5j1xn2es])) {
				$Veyhfqengb2d->mark->SetType(self::$Vmrsvdeggrvm[$Voyl5j1xn2es]);
			} else {
				
				self::$Vob1sfebuzbs %= count(self::$Vmrsvdeggrvm);
				$Veyhfqengb2d->mark->SetType(self::$Vmrsvdeggrvm[$Vyzrr0og31yi[self::$Vob1sfebuzbs++]]);
			}
		} else {
			
			$Veyhfqengb2d->mark->Hide();
		}
		$Veyhfqengb2d->mark->SetColor(self::$Vovre4vm25kt[self::$Vu5oqmektjvq]);
		$Veyhfqengb2d->mark->SetFillColor(self::$Vovre4vm25kt[self::$Vu5oqmektjvq]);
		$Veyhfqengb2d->SetColor(self::$Vovre4vm25kt[self::$Vu5oqmektjvq++]);

		return $Veyhfqengb2d;
	}	


	private function _formatDataSetLabels($Viuk35yowdwo, $Vtzofnwdzbnf, $Vwhctblssznh, $Vohulok3iiau = '') {
		$Vdpi25hshwmy = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotCategoryByIndex(0)->getFormatCode();
		if (!is_null($Vdpi25hshwmy)) {
			
			$Vdpi25hshwmy = stripslashes($Vdpi25hshwmy);
		}

		$Vcdfipbxy5wf = 0;
		foreach($Vtzofnwdzbnf as $Vfhiq1lhsoja => $Vincrvxviowi) {
			if (is_array($Vincrvxviowi)) {
				if ($Vohulok3iiau == 'bar') {
					$Vtzofnwdzbnf[$Vfhiq1lhsoja] = implode(" ",$Vincrvxviowi);
				} else {
					$Vincrvxviowi = array_reverse($Vincrvxviowi);
					$Vtzofnwdzbnf[$Vfhiq1lhsoja] = implode("\n",$Vincrvxviowi);
				}
			} else {
				
				if (!is_null($Vdpi25hshwmy)) {
					$Vtzofnwdzbnf[$Vfhiq1lhsoja] = PHPExcel_Style_NumberFormat::toFormattedString($Vincrvxviowi,$Vdpi25hshwmy);
				}
			}
			++$Vcdfipbxy5wf;
		}

		return $Vtzofnwdzbnf;
	}	


	private function _percentageSumCalculation($Viuk35yowdwo,$Vbnpd5xlilug) {
		
		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vbnpd5xlilug; ++$Vfhiq1lhsoja) {
			if ($Vfhiq1lhsoja == 0) {
				$Vzw4upp1rdjx = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotValuesByIndex($Vfhiq1lhsoja)->getDataValues();
			} else {
				$Vnfi1redj3hs = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotValuesByIndex($Vfhiq1lhsoja)->getDataValues();
				foreach($Vnfi1redj3hs as $V51lf1kcbto4 => $Vp4xjtpabm0l) {
					if (isset($Vzw4upp1rdjx[$V51lf1kcbto4])) {
						$Vzw4upp1rdjx[$V51lf1kcbto4] += $Vp4xjtpabm0l;
					} else {
						$Vzw4upp1rdjx[$V51lf1kcbto4] = $Vp4xjtpabm0l;
					}
				}
			}
		}

		return $Vzw4upp1rdjx;
	}	


	private function _percentageAdjustValues($Vqdzdfrfodv0,$Vzw4upp1rdjx) {
		foreach($Vqdzdfrfodv0 as $V51lf1kcbto4 => $Vxgkre3bdsqf) {
			$Vqdzdfrfodv0[$V51lf1kcbto4] = $Vxgkre3bdsqf / $Vzw4upp1rdjx[$V51lf1kcbto4] * 100;
		}

		return $Vqdzdfrfodv0;
	}	


	private function _getCaption($Vmhs1trn5dkj) {
		
		$V3l3cyvzlgvr = (!is_null($Vmhs1trn5dkj)) ? $Vmhs1trn5dkj->getCaption() : NULL;
		
		if (!is_null($V3l3cyvzlgvr)) {
			
			if (is_array($V3l3cyvzlgvr)) {
				
				$V3l3cyvzlgvr = implode('',$V3l3cyvzlgvr);
			}
		}
		return $V3l3cyvzlgvr;
	}	


	private function _renderTitle() {
		$Vzeg1rojkgqq = $this->_getCaption($this->_chart->getTitle());
		if (!is_null($Vzeg1rojkgqq)) {
			$this->_graph->title->Set($Vzeg1rojkgqq);
		}
	}	


	private function _renderLegend() {
		$Vd0gscz21nhy = $this->_chart->getLegend();
		if (!is_null($Vd0gscz21nhy)) {
			$Vd0gscz21nhyPosition = $Vd0gscz21nhy->getPosition();
			$Vd0gscz21nhyOverlay = $Vd0gscz21nhy->getOverlay();
			switch ($Vd0gscz21nhyPosition) {
				case 'r'	:
					$this->_graph->legend->SetPos(0.01,0.5,'right','center');	
					$this->_graph->legend->SetColumns(1);
					break;
				case 'l'	:
					$this->_graph->legend->SetPos(0.01,0.5,'left','center');	
					$this->_graph->legend->SetColumns(1);
					break;
				case 't'	:
					$this->_graph->legend->SetPos(0.5,0.01,'center','top');	
					break;
				case 'b'	:
					$this->_graph->legend->SetPos(0.5,0.99,'center','bottom');	
					break;
				default		:
					$this->_graph->legend->SetPos(0.01,0.01,'right','top');	
					$this->_graph->legend->SetColumns(1);
					break;
			}
		} else {
			$this->_graph->legend->Hide();
		}
	}	


	private function _renderCartesianPlotArea($V4pigtpor0ln='textlin') {
		$this->_graph = new Graph(self::$V1hgtvz3lirj,self::$Vcbzw3tnapla);
		$this->_graph->SetScale($V4pigtpor0ln);

		$this->_renderTitle();

		
		$Vohulok3iiau = $this->_chart->getPlotArea()->getPlotGroupByIndex(0)->getPlotDirection();
		$Vfnsteufow0j = ($Vohulok3iiau == 'bar') ? true : false;

		$V0h355jcamat = $this->_chart->getXAxisLabel();
		if (!is_null($V0h355jcamat)) {
			$Vzeg1rojkgqq = $this->_getCaption($V0h355jcamat);
			if (!is_null($Vzeg1rojkgqq)) {
				$this->_graph->xaxis->SetTitle($Vzeg1rojkgqq,'center');
				$this->_graph->xaxis->title->SetMargin(35);
				if ($Vfnsteufow0j) {
					$this->_graph->xaxis->title->SetAngle(90);
					$this->_graph->xaxis->title->SetMargin(90);
				}
			}
		}

		$Vvuiaeplqlp1 = $this->_chart->getYAxisLabel();
		if (!is_null($Vvuiaeplqlp1)) {
			$Vzeg1rojkgqq = $this->_getCaption($Vvuiaeplqlp1);
			if (!is_null($Vzeg1rojkgqq)) {
				$this->_graph->yaxis->SetTitle($Vzeg1rojkgqq,'center');
				if ($Vfnsteufow0j) {
					$this->_graph->yaxis->title->SetAngle(0);
					$this->_graph->yaxis->title->SetMargin(-55);
				}
			}
		}
	}	


	private function _renderPiePlotArea($Vcmdypkbni2b = False) {
		$this->_graph = new PieGraph(self::$V1hgtvz3lirj,self::$Vcbzw3tnapla);

		$this->_renderTitle();
	}	


	private function _renderRadarPlotArea() {
		$this->_graph = new RadarGraph(self::$V1hgtvz3lirj,self::$Vcbzw3tnapla);
		$this->_graph->SetScale('lin');

		$this->_renderTitle();
	}	


	private function _renderPlotLine($Viuk35yowdwo, $Valy4uriz4tj = false, $V0do0zrertpx = false, $Vog143ghacys = '2d') {
		$Via00vmdum5s = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotGrouping();

        $Vwhctblssznh = count($this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotValuesByIndex(0)->getPointCount());
		if ($Vwhctblssznh > 0) {
			$Vtzofnwdzbnf = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotCategoryByIndex(0)->getDataValues();
			$Vtzofnwdzbnf = $this->_formatDataSetLabels($Viuk35yowdwo, $Vtzofnwdzbnf, $Vwhctblssznh);
			$this->_graph->xaxis->SetTickLabels($Vtzofnwdzbnf);
		}

		$Vbnpd5xlilug = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotSeriesCount();
		$Veyhfqengb2ds = array();
		if ($Via00vmdum5s == 'percentStacked') {
			$Vzw4upp1rdjx = $this->_percentageSumCalculation($Viuk35yowdwo,$Vbnpd5xlilug);
		}

		
		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vbnpd5xlilug; ++$Vfhiq1lhsoja) {
			$Vqdzdfrfodv0 = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotValuesByIndex($Vfhiq1lhsoja)->getDataValues();
			$Vkzp31bqbczg = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotValuesByIndex($Vfhiq1lhsoja)->getPointMarker();

			if ($Via00vmdum5s == 'percentStacked') {
				$Vqdzdfrfodv0 = $this->_percentageAdjustValues($Vqdzdfrfodv0,$Vzw4upp1rdjx);
			}

			
			$Vcdfipbxy5wf = 0;
			foreach($Vqdzdfrfodv0 as $V51lf1kcbto4 => $Vxgkre3bdsqf) {
				while($V51lf1kcbto4 != $Vcdfipbxy5wf) {
					$Vqdzdfrfodv0[$Vcdfipbxy5wf] = null;
					++$Vcdfipbxy5wf;
				}
				++$Vcdfipbxy5wf;
			}

			$Veyhfqengb2d = new LinePlot($Vqdzdfrfodv0);
			if ($V0do0zrertpx) {
				$Veyhfqengb2d->SetBarCenter();
			}

			if ($Valy4uriz4tj) {
				$Veyhfqengb2d->SetFilled(true);
				$Veyhfqengb2d->SetColor('black');
				$Veyhfqengb2d->SetFillColor(self::$Vovre4vm25kt[self::$Vu5oqmektjvq++]);
			} else {
				
				$this->_formatPointMarker($Veyhfqengb2d,$Vkzp31bqbczg);
			}
			$Vvytf2hrmrzt = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotLabelByIndex($Vfhiq1lhsoja)->getDataValue();
			$Veyhfqengb2d->SetLegend($Vvytf2hrmrzt);

			$Veyhfqengb2ds[] = $Veyhfqengb2d;
		}

		if ($Via00vmdum5s == 'standard') {
			$Vpu0qslpmied = $Veyhfqengb2ds;
		} else {
			$Vpu0qslpmied = new AccLinePlot($Veyhfqengb2ds);
		}
		$this->_graph->Add($Vpu0qslpmied);
	}	


	private function _renderPlotBar($Viuk35yowdwo, $Vog143ghacys = '2d') {
		$Vohulok3iiau = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotDirection();
		
		if (($Viuk35yowdwo == 0) && ($Vohulok3iiau == 'bar')) {
			$this->_graph->Set90AndMargin();
		}
		$Via00vmdum5s = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotGrouping();

        $Vwhctblssznh = count($this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotValuesByIndex(0)->getPointCount());
		if ($Vwhctblssznh > 0) {
			$Vtzofnwdzbnf = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotCategoryByIndex(0)->getDataValues();
			$Vtzofnwdzbnf = $this->_formatDataSetLabels($Viuk35yowdwo, $Vtzofnwdzbnf, $Vwhctblssznh, $Vohulok3iiau);
			
			if ($Vohulok3iiau == 'bar') {
				$Vtzofnwdzbnf = array_reverse($Vtzofnwdzbnf);
				$this->_graph->yaxis->SetPos('max');
				$this->_graph->yaxis->SetLabelAlign('center','top');
				$this->_graph->yaxis->SetLabelSide(SIDE_RIGHT);
			}
			$this->_graph->xaxis->SetTickLabels($Vtzofnwdzbnf);
		}


		$Vbnpd5xlilug = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotSeriesCount();
		$Veyhfqengb2ds = array();
		if ($Via00vmdum5s == 'percentStacked') {
			$Vzw4upp1rdjx = $this->_percentageSumCalculation($Viuk35yowdwo,$Vbnpd5xlilug);
		}

		
		for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $Vbnpd5xlilug; ++$Vzmnqyqjjodw) {
			$Vqdzdfrfodv0 = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotValuesByIndex($Vzmnqyqjjodw)->getDataValues();
			if ($Via00vmdum5s == 'percentStacked') {
				$Vqdzdfrfodv0 = $this->_percentageAdjustValues($Vqdzdfrfodv0,$Vzw4upp1rdjx);
			}

			
			$Vcdfipbxy5wf = 0;
			foreach($Vqdzdfrfodv0 as $V51lf1kcbto4 => $Vxgkre3bdsqf) {
				while($V51lf1kcbto4 != $Vcdfipbxy5wf) {
					$Vqdzdfrfodv0[$Vcdfipbxy5wf] = null;
					++$Vcdfipbxy5wf;
				}
				++$Vcdfipbxy5wf;
			}

			
			if ($Vohulok3iiau == 'bar') {
				$Vqdzdfrfodv0 = array_reverse($Vqdzdfrfodv0);
			}
			$Veyhfqengb2d = new BarPlot($Vqdzdfrfodv0);
			$Veyhfqengb2d->SetColor('black');
			$Veyhfqengb2d->SetFillColor(self::$Vovre4vm25kt[self::$Vu5oqmektjvq++]);
			if ($Vog143ghacys == '3d') {
				$Veyhfqengb2d->SetShadow();
			}
			if (!$this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotLabelByIndex($Vzmnqyqjjodw)) {
				$Vvytf2hrmrzt = '';
			} else {
				$Vvytf2hrmrzt = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotLabelByIndex($Vzmnqyqjjodw)->getDataValue();
			}
			$Veyhfqengb2d->SetLegend($Vvytf2hrmrzt);

			$Veyhfqengb2ds[] = $Veyhfqengb2d;
		}
		
		if (($Vohulok3iiau == 'bar') && (!($Via00vmdum5s == 'percentStacked'))) {
			$Veyhfqengb2ds = array_reverse($Veyhfqengb2ds);
		}

		if ($Via00vmdum5s == 'clustered') {
			$Vpu0qslpmied = new GroupBarPlot($Veyhfqengb2ds);
		} elseif ($Via00vmdum5s == 'standard') {
			$Vpu0qslpmied = new GroupBarPlot($Veyhfqengb2ds);
		} else {
			$Vpu0qslpmied = new AccBarPlot($Veyhfqengb2ds);
			if ($Vog143ghacys == '3d') {
				$Vpu0qslpmied->SetShadow();
			}
		}

		$this->_graph->Add($Vpu0qslpmied);
	}	


	private function _renderPlotScatter($Viuk35yowdwo,$Vm30guxqrbpm) {
		$Via00vmdum5s = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotGrouping();
		$Vo0tluqb11ip = $Vm30guxqrbpmSize = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotStyle();

		$Vbnpd5xlilug = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotSeriesCount();
		$Veyhfqengb2ds = array();

		
		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vbnpd5xlilug; ++$Vfhiq1lhsoja) {
			$Vqdzdfrfodv0Y = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotCategoryByIndex($Vfhiq1lhsoja)->getDataValues();
			$Vqdzdfrfodv0X = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotValuesByIndex($Vfhiq1lhsoja)->getDataValues();

			foreach($Vqdzdfrfodv0Y as $V51lf1kcbto4 => $Vxgkre3bdsqfY) {
				$Vqdzdfrfodv0Y[$V51lf1kcbto4] = $V51lf1kcbto4;
			}

			$Veyhfqengb2d = new ScatterPlot($Vqdzdfrfodv0X,$Vqdzdfrfodv0Y);
			if ($Vo0tluqb11ip == 'lineMarker') {
				$Veyhfqengb2d->SetLinkPoints();
				$Veyhfqengb2d->link->SetColor(self::$Vovre4vm25kt[self::$Vu5oqmektjvq]);
			} elseif ($Vo0tluqb11ip == 'smoothMarker') {
				$Vgaslsbraerr = new Spline($Vqdzdfrfodv0Y,$Vqdzdfrfodv0X);
				list($VgaslsbraerrDataY,$VgaslsbraerrDataX) = $Vgaslsbraerr->Get(count($Vqdzdfrfodv0X) * self::$V1hgtvz3lirj / 20);
				$Vyoz2ajzqwcy = new LinePlot($VgaslsbraerrDataX,$VgaslsbraerrDataY);
				$Vyoz2ajzqwcy->SetColor(self::$Vovre4vm25kt[self::$Vu5oqmektjvq]);

				$this->_graph->Add($Vyoz2ajzqwcy);
			}

			if ($Vm30guxqrbpm) {
				$this->_formatPointMarker($Veyhfqengb2d,'dot');
				$Veyhfqengb2d->mark->SetColor('black');
				$Veyhfqengb2d->mark->SetSize($Vm30guxqrbpmSize);
			} else {
				$Vkzp31bqbczg = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotValuesByIndex($Vfhiq1lhsoja)->getPointMarker();
				$this->_formatPointMarker($Veyhfqengb2d,$Vkzp31bqbczg);
			}
			$Vvytf2hrmrzt = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotLabelByIndex($Vfhiq1lhsoja)->getDataValue();
			$Veyhfqengb2d->SetLegend($Vvytf2hrmrzt);

			$this->_graph->Add($Veyhfqengb2d);
		}
	}	


	private function _renderPlotRadar($Viuk35yowdwo) {
		$Vi5g4cmtlfzh = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotStyle();

		$Vbnpd5xlilug = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotSeriesCount();
		$Veyhfqengb2ds = array();

		
		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vbnpd5xlilug; ++$Vfhiq1lhsoja) {
			$Vqdzdfrfodv0Y = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotCategoryByIndex($Vfhiq1lhsoja)->getDataValues();
			$Vqdzdfrfodv0X = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotValuesByIndex($Vfhiq1lhsoja)->getDataValues();
			$Vkzp31bqbczg = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotValuesByIndex($Vfhiq1lhsoja)->getPointMarker();

			$Vqdzdfrfodv0 = array();
			foreach($Vqdzdfrfodv0Y as $V51lf1kcbto4 => $Vxgkre3bdsqfY) {
				$Vqdzdfrfodv0[$V51lf1kcbto4] = implode(' ',array_reverse($Vxgkre3bdsqfY));
			}
			$Vdln1z2oxpjs = array_shift($Vqdzdfrfodv0);
			$Vqdzdfrfodv0[] = $Vdln1z2oxpjs;
			$Vdln1z2oxpjs = array_shift($Vqdzdfrfodv0X);
			$Vqdzdfrfodv0X[] = $Vdln1z2oxpjs;

			$this->_graph->SetTitles(array_reverse($Vqdzdfrfodv0));

			$Veyhfqengb2d = new RadarPlot(array_reverse($Vqdzdfrfodv0X));

			$Vvytf2hrmrzt = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotLabelByIndex($Vfhiq1lhsoja)->getDataValue();
			$Veyhfqengb2d->SetColor(self::$Vovre4vm25kt[self::$Vu5oqmektjvq++]);
			if ($Vi5g4cmtlfzh == 'filled') {
				$Veyhfqengb2d->SetFillColor(self::$Vovre4vm25kt[self::$Vu5oqmektjvq]);
			}
			$this->_formatPointMarker($Veyhfqengb2d,$Vkzp31bqbczg);
			$Veyhfqengb2d->SetLegend($Vvytf2hrmrzt);

			$this->_graph->Add($Veyhfqengb2d);
		}
	}	


	private function _renderPlotContour($Viuk35yowdwo) {
		$Vcd4l3wylwwl = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotStyle();

		$Vbnpd5xlilug = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotSeriesCount();
		$Veyhfqengb2ds = array();

		$Vqdzdfrfodv0 = array();
		
		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vbnpd5xlilug; ++$Vfhiq1lhsoja) {
			$Vqdzdfrfodv0Y = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotCategoryByIndex($Vfhiq1lhsoja)->getDataValues();
			$Vqdzdfrfodv0X = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotValuesByIndex($Vfhiq1lhsoja)->getDataValues();

			$Vqdzdfrfodv0[$Vfhiq1lhsoja] = $Vqdzdfrfodv0X;
		}
		$Veyhfqengb2d = new ContourPlot($Vqdzdfrfodv0);

		$this->_graph->Add($Veyhfqengb2d);
	}	


	private function _renderPlotStock($Viuk35yowdwo) {
		$Vbnpd5xlilug = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotSeriesCount();
		$V4dpmvzwuayz = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotOrder();

		$Vqdzdfrfodv0 = array();
		
		foreach($V4dpmvzwuayz as $Vfhiq1lhsoja => $Vf1kwqxxhqpz) {
			$Vqdzdfrfodv0X = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotValuesByIndex($Vf1kwqxxhqpz)->getDataValues();
			foreach($Vqdzdfrfodv0X as $Vzmnqyqjjodw => $Vxgkre3bdsqfX) {
				$Vqdzdfrfodv0[$V4dpmvzwuayz[$Vfhiq1lhsoja]][$Vzmnqyqjjodw] = $Vxgkre3bdsqfX;
			}
		}
		if(empty($Vqdzdfrfodv0)) {
			return;
		}

		$Vqdzdfrfodv0Plot = array();
        
		for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < count($Vqdzdfrfodv0[0]); $Vzmnqyqjjodw++) {
			for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vbnpd5xlilug; $Vfhiq1lhsoja++) {
				$Vqdzdfrfodv0Plot[] = $Vqdzdfrfodv0[$Vfhiq1lhsoja][$Vzmnqyqjjodw];
			}
		}

        
        $Vwhctblssznh = count($this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotValuesByIndex(0)->getPointCount());
		if ($Vwhctblssznh > 0) {
			$Vtzofnwdzbnf = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotCategoryByIndex(0)->getDataValues();
			$Vtzofnwdzbnf = $this->_formatDataSetLabels($Viuk35yowdwo, $Vtzofnwdzbnf, $Vwhctblssznh);
			$this->_graph->xaxis->SetTickLabels($Vtzofnwdzbnf);
		}

		$Veyhfqengb2d = new StockPlot($Vqdzdfrfodv0Plot);
		$Veyhfqengb2d->SetWidth(20);

		$this->_graph->Add($Veyhfqengb2d);
	}	


	private function _renderAreaChart($Vyw4ibzwf0yi, $Vog143ghacys = '2d') {
		require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_line.php');

		$this->_renderCartesianPlotArea();

		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vyw4ibzwf0yi; ++$Vfhiq1lhsoja) {
			$this->_renderPlotLine($Vfhiq1lhsoja,True,False,$Vog143ghacys);
		}
	}	


	private function _renderLineChart($Vyw4ibzwf0yi, $Vog143ghacys = '2d') {
		require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_line.php');

		$this->_renderCartesianPlotArea();

		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vyw4ibzwf0yi; ++$Vfhiq1lhsoja) {
			$this->_renderPlotLine($Vfhiq1lhsoja,False,False,$Vog143ghacys);
		}
	}	


	private function _renderBarChart($Vyw4ibzwf0yi, $Vog143ghacys = '2d') {
		require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_bar.php');

		$this->_renderCartesianPlotArea();

		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vyw4ibzwf0yi; ++$Vfhiq1lhsoja) {
			$this->_renderPlotBar($Vfhiq1lhsoja,$Vog143ghacys);
		}
	}	


	private function _renderScatterChart($Vyw4ibzwf0yi) {
		require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_scatter.php');
		require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_regstat.php');
		require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_line.php');

		$this->_renderCartesianPlotArea('linlin');

		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vyw4ibzwf0yi; ++$Vfhiq1lhsoja) {
			$this->_renderPlotScatter($Vfhiq1lhsoja,false);
		}
	}	


	private function _renderBubbleChart($Vyw4ibzwf0yi) {
		require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_scatter.php');

		$this->_renderCartesianPlotArea('linlin');

		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vyw4ibzwf0yi; ++$Vfhiq1lhsoja) {
			$this->_renderPlotScatter($Vfhiq1lhsoja,true);
		}
	}	


	private function _renderPieChart($Vyw4ibzwf0yi, $Vog143ghacys = '2d', $Vcmdypkbni2b = False, $V2nzf5dtoyft = False) {
		require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_pie.php');
		if ($Vog143ghacys == '3d') {
			require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_pie3d.php');
		}

		$this->_renderPiePlotArea($Vcmdypkbni2b);

		$Vfhiq1lhsojaLimit = ($V2nzf5dtoyft) ? $Vyw4ibzwf0yi : 1;
		for($Viuk35yowdwo = 0; $Viuk35yowdwo < $Vfhiq1lhsojaLimit; ++$Viuk35yowdwo) {
			$Via00vmdum5s = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotGrouping();
			$Vvw3vfqn0e2a = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotStyle();
			if ($Viuk35yowdwo == 0) {
		        $Vwhctblssznh = count($this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotValuesByIndex(0)->getPointCount());
				if ($Vwhctblssznh > 0) {
					$Vtzofnwdzbnf = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotCategoryByIndex(0)->getDataValues();
					$Vtzofnwdzbnf = $this->_formatDataSetLabels($Viuk35yowdwo, $Vtzofnwdzbnf, $Vwhctblssznh);
				}
			}

			$Vbnpd5xlilug = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotSeriesCount();
			$Veyhfqengb2ds = array();
			
			$VzmnqyqjjodwLimit = ($V2nzf5dtoyft) ? $Vbnpd5xlilug : 1;
			
			for($Vzmnqyqjjodw = 0; $Vzmnqyqjjodw < $VzmnqyqjjodwLimit; ++$Vzmnqyqjjodw) {
				$Vqdzdfrfodv0 = $this->_chart->getPlotArea()->getPlotGroupByIndex($Viuk35yowdwo)->getPlotValuesByIndex($Vzmnqyqjjodw)->getDataValues();

				
				$Vcdfipbxy5wf = 0;
				foreach($Vqdzdfrfodv0 as $V51lf1kcbto4 => $Vxgkre3bdsqf) {
					while($V51lf1kcbto4 != $Vcdfipbxy5wf) {
						$Vqdzdfrfodv0[$Vcdfipbxy5wf] = null;
						++$Vcdfipbxy5wf;
					}
					++$Vcdfipbxy5wf;
				}

				if ($Vog143ghacys == '3d') {
					$Veyhfqengb2d = new PiePlot3D($Vqdzdfrfodv0);
				} else {
					if ($Vcmdypkbni2b) {
						$Veyhfqengb2d = new PiePlotC($Vqdzdfrfodv0);
					} else {
						$Veyhfqengb2d = new PiePlot($Vqdzdfrfodv0);
					}
				}

				if ($V2nzf5dtoyft) {
					$Veyhfqengb2d->SetSize(($VzmnqyqjjodwLimit-$Vzmnqyqjjodw) / ($VzmnqyqjjodwLimit * 4));
				}

				if ($Vcmdypkbni2b) {
					$Veyhfqengb2d->SetMidColor('white');
				}

				$Veyhfqengb2d->SetColor(self::$Vovre4vm25kt[self::$Vu5oqmektjvq++]);
				if (count($Vtzofnwdzbnf) > 0)
					$Veyhfqengb2d->SetLabels(array_fill(0,count($Vtzofnwdzbnf),''));
				if ($Vog143ghacys != '3d') {
					$Veyhfqengb2d->SetGuideLines(false);
				}
				if ($Vzmnqyqjjodw == 0) {
					if ($Vvw3vfqn0e2a) {
						$Veyhfqengb2d->ExplodeAll();
					}
					$Veyhfqengb2d->SetLegends($Vtzofnwdzbnf);
				}

				$this->_graph->Add($Veyhfqengb2d);
			}
		}
	}	


	private function _renderRadarChart($Vyw4ibzwf0yi) {
		require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_radar.php');

		$this->_renderRadarPlotArea();

		for($Viuk35yowdwo = 0; $Viuk35yowdwo < $Vyw4ibzwf0yi; ++$Viuk35yowdwo) {
			$this->_renderPlotRadar($Viuk35yowdwo);
		}
	}	


	private function _renderStockChart($Vyw4ibzwf0yi) {
		require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_stock.php');

		$this->_renderCartesianPlotArea('intint');

		for($Viuk35yowdwo = 0; $Viuk35yowdwo < $Vyw4ibzwf0yi; ++$Viuk35yowdwo) {
			$this->_renderPlotStock($Viuk35yowdwo);
		}
	}	


	private function _renderContourChart($Vyw4ibzwf0yi,$Vog143ghacys) {
		require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_contour.php');

		$this->_renderCartesianPlotArea('intint');

		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vyw4ibzwf0yi; ++$Vfhiq1lhsoja) {
			$this->_renderPlotContour($Vfhiq1lhsoja);
		}
	}	


	private function _renderCombinationChart($Vyw4ibzwf0yi,$Vog143ghacys,$V3uaawfi530c) {
		require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_line.php');
		require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_bar.php');
		require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_scatter.php');
		require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_regstat.php');
		require_once(PHPExcel_Settings::getChartRendererPath().'jpgraph_line.php');

		$this->_renderCartesianPlotArea();

		for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vyw4ibzwf0yi; ++$Vfhiq1lhsoja) {
			$Vog143ghacys = null;
			$V2c0mujmzgc3 = $this->_chart->getPlotArea()->getPlotGroupByIndex($Vfhiq1lhsoja)->getPlotType();
			switch ($V2c0mujmzgc3) {
				case 'area3DChart' :
					$Vog143ghacys = '3d';
				case 'areaChart' :
					$this->_renderPlotLine($Vfhiq1lhsoja,True,True,$Vog143ghacys);
					break;
				case 'bar3DChart' :
					$Vog143ghacys = '3d';
				case 'barChart' :
					$this->_renderPlotBar($Vfhiq1lhsoja,$Vog143ghacys);
					break;
				case 'line3DChart' :
					$Vog143ghacys = '3d';
				case 'lineChart' :
					$this->_renderPlotLine($Vfhiq1lhsoja,False,True,$Vog143ghacys);
					break;
				case 'scatterChart' :
					$this->_renderPlotScatter($Vfhiq1lhsoja,false);
					break;
				case 'bubbleChart' :
					$this->_renderPlotScatter($Vfhiq1lhsoja,true);
					break;
				default	:
					$this->_graph = null;
					return false;
			}
		}

		$this->_renderLegend();

		$this->_graph->Stroke($V3uaawfi530c);
		return true;
	}	


	public function render($V3uaawfi530c) {
        self::$Vu5oqmektjvq = 0;

		$Vyw4ibzwf0yi = $this->_chart->getPlotArea()->getPlotGroupCount();

		$Vog143ghacys = null;
		if ($Vyw4ibzwf0yi == 1) {
			$V2c0mujmzgc3 = $this->_chart->getPlotArea()->getPlotGroupByIndex(0)->getPlotType();
		} else {
			$V2c0mujmzgc3s = array();
			for($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vyw4ibzwf0yi; ++$Vfhiq1lhsoja) {
				$V2c0mujmzgc3s[] = $this->_chart->getPlotArea()->getPlotGroupByIndex($Vfhiq1lhsoja)->getPlotType();
			}
			$V2c0mujmzgc3s = array_unique($V2c0mujmzgc3s);
			if (count($V2c0mujmzgc3s) == 1) {
				$V2c0mujmzgc3 = array_pop($V2c0mujmzgc3s);
			} elseif (count($V2c0mujmzgc3s) == 0) {
				echo 'Chart is not yet implemented<br />';
				return false;
			} else {
				return $this->_renderCombinationChart($Vyw4ibzwf0yi,$Vog143ghacys,$V3uaawfi530c);
			}
		}

		switch ($V2c0mujmzgc3) {
			case 'area3DChart' :
				$Vog143ghacys = '3d';
			case 'areaChart' :
				$this->_renderAreaChart($Vyw4ibzwf0yi,$Vog143ghacys);
				break;
			case 'bar3DChart' :
				$Vog143ghacys = '3d';
			case 'barChart' :
				$this->_renderBarChart($Vyw4ibzwf0yi,$Vog143ghacys);
				break;
			case 'line3DChart' :
				$Vog143ghacys = '3d';
			case 'lineChart' :
				$this->_renderLineChart($Vyw4ibzwf0yi,$Vog143ghacys);
				break;
			case 'pie3DChart' :
				$Vog143ghacys = '3d';
			case 'pieChart' :
				$this->_renderPieChart($Vyw4ibzwf0yi,$Vog143ghacys,False,False);
				break;
			case 'doughnut3DChart' :
				$Vog143ghacys = '3d';
			case 'doughnutChart' :
				$this->_renderPieChart($Vyw4ibzwf0yi,$Vog143ghacys,True,True);
				break;
			case 'scatterChart' :
				$this->_renderScatterChart($Vyw4ibzwf0yi);
				break;
			case 'bubbleChart' :
				$this->_renderBubbleChart($Vyw4ibzwf0yi);
				break;
			case 'radarChart' :
				$this->_renderRadarChart($Vyw4ibzwf0yi);
				break;
			case 'surface3DChart' :
				$Vog143ghacys = '3d';
			case 'surfaceChart' :
				$this->_renderContourChart($Vyw4ibzwf0yi,$Vog143ghacys);
				break;
			case 'stockChart' :
				$this->_renderStockChart($Vyw4ibzwf0yi,$Vog143ghacys);
				break;
			default	:
				echo $V2c0mujmzgc3.' is not yet implemented<br />';
				return false;
		}
		$this->_renderLegend();

		$this->_graph->Stroke($V3uaawfi530c);
		return true;
	}	


	
	public function __construct(PHPExcel_Chart $Vcfg4pbgiwen)
	{
		$this->_graph	= null;
		$this->_chart	= $Vcfg4pbgiwen;
	}	

}	
