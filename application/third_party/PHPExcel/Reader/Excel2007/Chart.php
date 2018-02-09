<?php



class PHPExcel_Reader_Excel2007_Chart
{
	private static function _getAttribute($Vg1plrqlctjq, $Vcvluzjs3wzb, $Vrcanlvxmlmp) {
		$Vmpqeek4lrvw = $Vg1plrqlctjq->attributes();
		if (isset($Vmpqeek4lrvw[$Vcvluzjs3wzb])) {
			if ($Vrcanlvxmlmp == 'string') {
				return (string) $Vmpqeek4lrvw[$Vcvluzjs3wzb];
			} elseif ($Vrcanlvxmlmp == 'integer') {
				return (integer) $Vmpqeek4lrvw[$Vcvluzjs3wzb];
			} elseif ($Vrcanlvxmlmp == 'boolean') {
				return (boolean) ($Vmpqeek4lrvw[$Vcvluzjs3wzb] === '0' || $Vmpqeek4lrvw[$Vcvluzjs3wzb] !== 'true') ? false : true;
			} else {
				return (float) $Vmpqeek4lrvw[$Vcvluzjs3wzb];
			}
		}
		return null;
	}	


	private static function _readColor($Vl5jzlxo3j3n,$Vwgo50mn55xx=false) {
		if (isset($Vl5jzlxo3j3n["rgb"])) {
			return (string)$Vl5jzlxo3j3n["rgb"];
		} else if (isset($Vl5jzlxo3j3n["indexed"])) {
			return PHPExcel_Style_Color::indexedColor($Vl5jzlxo3j3n["indexed"]-7,$Vwgo50mn55xx)->getARGB();
		}
	}


	public static function readChart($Vy1z0bpv21ux,$Vy5t5psp05u4) {
		$Vcvluzjs3wzbspacesChartMeta = $Vy1z0bpv21ux->getNamespaces(true);
		$Vy1z0bpv21uxC = $Vy1z0bpv21ux->children($Vcvluzjs3wzbspacesChartMeta['c']);

		$Vhlkensv0jbh = $Vhyayvugsrrs = $Vd0gscz21nhy = $Vzeg1rojkgqq = NULL;
		$V0tdiryhmdaa = $Vrcnso5yhyxh = NULL;

		foreach($Vy1z0bpv21uxC as $Vp0qx0k4lusj => $Vjqfimf1ogml) {
			switch ($Vp0qx0k4lusj) {
				case "chart":
					foreach($Vjqfimf1ogml as $Vlv3e4xd1ccq => $Vagjz0324p4x) {
						$Vagjz0324p4xC = $Vagjz0324p4x->children($Vcvluzjs3wzbspacesChartMeta['c']);
						switch ($Vlv3e4xd1ccq) {
							case "plotArea":
									$Vqptncnsrvca = $Vzkn4hjselh3 = $Vda5yab4jabz = null;
									$Vcg1rs5z3tzi = $Vtgioaxe3wcm = array();
									foreach($Vagjz0324p4x as $Vul5noenyak1 => $Vwriuy2uutdj) {
										switch ($Vul5noenyak1) {
											case "layout":
												$Vqptncnsrvca = self::_chartLayoutDetails($Vwriuy2uutdj,$Vcvluzjs3wzbspacesChartMeta,'plotArea');
												break;
											case "catAx":
												if (isset($Vwriuy2uutdj->title)) {
													$Vhlkensv0jbh = self::_chartTitle($Vwriuy2uutdj->title->children($Vcvluzjs3wzbspacesChartMeta['c']),$Vcvluzjs3wzbspacesChartMeta,'cat');
												}
												break;
											case "dateAx":
												if (isset($Vwriuy2uutdj->title)) {
													$Vhlkensv0jbh = self::_chartTitle($Vwriuy2uutdj->title->children($Vcvluzjs3wzbspacesChartMeta['c']),$Vcvluzjs3wzbspacesChartMeta,'cat');
												}
												break;
											case "valAx":
												if (isset($Vwriuy2uutdj->title)) {
													$Vhyayvugsrrs = self::_chartTitle($Vwriuy2uutdj->title->children($Vcvluzjs3wzbspacesChartMeta['c']),$Vcvluzjs3wzbspacesChartMeta,'cat');
												}
												break;
											case "barChart":
											case "bar3DChart":
												$Vdttkjgs3hge = self::_getAttribute($Vwriuy2uutdj->barDir, 'val', 'string');
												$Vvi3pacpqwhj = self::_chartDataSeries($Vwriuy2uutdj,$Vcvluzjs3wzbspacesChartMeta,$Vul5noenyak1);
												$Vvi3pacpqwhj->setPlotDirection($Vdttkjgs3hge);
												$Vcg1rs5z3tzi[] = $Vvi3pacpqwhj;
												$Vtgioaxe3wcm = self::_readChartAttributes($Vwriuy2uutdj);
												break;
											case "lineChart":
											case "line3DChart":
												$Vcg1rs5z3tzi[] = self::_chartDataSeries($Vwriuy2uutdj,$Vcvluzjs3wzbspacesChartMeta,$Vul5noenyak1);
												$Vtgioaxe3wcm = self::_readChartAttributes($Vwriuy2uutdj);
												break;
											case "areaChart":
											case "area3DChart":
												$Vcg1rs5z3tzi[] = self::_chartDataSeries($Vwriuy2uutdj,$Vcvluzjs3wzbspacesChartMeta,$Vul5noenyak1);
												$Vtgioaxe3wcm = self::_readChartAttributes($Vwriuy2uutdj);
												break;
											case "doughnutChart":
											case "pieChart":
											case "pie3DChart":
												$V3bbmxkdvbbu = isset($Vwriuy2uutdj->ser->explosion);
												$Vvi3pacpqwhj = self::_chartDataSeries($Vwriuy2uutdj,$Vcvluzjs3wzbspacesChartMeta,$Vul5noenyak1);
												$Vvi3pacpqwhj->setPlotStyle($V3bbmxkdvbbu);
												$Vcg1rs5z3tzi[] = $Vvi3pacpqwhj;
												$Vtgioaxe3wcm = self::_readChartAttributes($Vwriuy2uutdj);
												break;
											case "scatterChart":
												$Vo0tluqb11ip = self::_getAttribute($Vwriuy2uutdj->scatterStyle, 'val', 'string');
												$Vvi3pacpqwhj = self::_chartDataSeries($Vwriuy2uutdj,$Vcvluzjs3wzbspacesChartMeta,$Vul5noenyak1);
												$Vvi3pacpqwhj->setPlotStyle($Vo0tluqb11ip);
												$Vcg1rs5z3tzi[] = $Vvi3pacpqwhj;
												$Vtgioaxe3wcm = self::_readChartAttributes($Vwriuy2uutdj);
												break;
											case "bubbleChart":
												$Vdyjzzzu0e0a = self::_getAttribute($Vwriuy2uutdj->bubbleScale, 'val', 'integer');
												$Vvi3pacpqwhj = self::_chartDataSeries($Vwriuy2uutdj,$Vcvluzjs3wzbspacesChartMeta,$Vul5noenyak1);
												$Vvi3pacpqwhj->setPlotStyle($Vdyjzzzu0e0a);
												$Vcg1rs5z3tzi[] = $Vvi3pacpqwhj;
												$Vtgioaxe3wcm = self::_readChartAttributes($Vwriuy2uutdj);
												break;
											case "radarChart":
												$Vi5g4cmtlfzh = self::_getAttribute($Vwriuy2uutdj->radarStyle, 'val', 'string');
												$Vvi3pacpqwhj = self::_chartDataSeries($Vwriuy2uutdj,$Vcvluzjs3wzbspacesChartMeta,$Vul5noenyak1);
												$Vvi3pacpqwhj->setPlotStyle($Vi5g4cmtlfzh);
												$Vcg1rs5z3tzi[] = $Vvi3pacpqwhj;
												$Vtgioaxe3wcm = self::_readChartAttributes($Vwriuy2uutdj);
												break;
											case "surfaceChart":
											case "surface3DChart":
												$V35p0ekr12d4 = self::_getAttribute($Vwriuy2uutdj->wireframe, 'val', 'boolean');
												$Vvi3pacpqwhj = self::_chartDataSeries($Vwriuy2uutdj,$Vcvluzjs3wzbspacesChartMeta,$Vul5noenyak1);
												$Vvi3pacpqwhj->setPlotStyle($V35p0ekr12d4);
												$Vcg1rs5z3tzi[] = $Vvi3pacpqwhj;
												$Vtgioaxe3wcm = self::_readChartAttributes($Vwriuy2uutdj);
												break;
											case "stockChart":
												$Vcg1rs5z3tzi[] = self::_chartDataSeries($Vwriuy2uutdj,$Vcvluzjs3wzbspacesChartMeta,$Vul5noenyak1);
												$Vtgioaxe3wcm = self::_readChartAttributes($Vqptncnsrvca);
												break;
										}
									}
									if ($Vqptncnsrvca == NULL) {
										$Vqptncnsrvca = new PHPExcel_Chart_Layout();
									}
									$Vpiwhkjwfrqq = new PHPExcel_Chart_PlotArea($Vqptncnsrvca,$Vcg1rs5z3tzi);
									self::_setChartAttributes($Vqptncnsrvca,$Vtgioaxe3wcm);
									break;
							case "plotVisOnly":
									$Vrcnso5yhyxh = self::_getAttribute($Vagjz0324p4x, 'val', 'string');
									break;
							case "dispBlanksAs":
									$V0tdiryhmdaa = self::_getAttribute($Vagjz0324p4x, 'val', 'string');
									break;
							case "title":
									$Vzeg1rojkgqq = self::_chartTitle($Vagjz0324p4x,$Vcvluzjs3wzbspacesChartMeta,'title');
									break;
							case "legend":
									$Vd0gscz21nhyPos = 'r';
									$Vd0gscz21nhyLayout = null;
									$Vd0gscz21nhyOverlay = false;
									foreach($Vagjz0324p4x as $Vul5noenyak1 => $Vwriuy2uutdj) {
										switch ($Vul5noenyak1) {
											case "legendPos":
												$Vd0gscz21nhyPos = self::_getAttribute($Vwriuy2uutdj, 'val', 'string');
												break;
											case "overlay":
												$Vd0gscz21nhyOverlay = self::_getAttribute($Vwriuy2uutdj, 'val', 'boolean');
												break;
											case "layout":
												$Vd0gscz21nhyLayout = self::_chartLayoutDetails($Vwriuy2uutdj,$Vcvluzjs3wzbspacesChartMeta,'legend');
												break;
										}
									}
									$Vd0gscz21nhy = new PHPExcel_Chart_Legend($Vd0gscz21nhyPos, $Vd0gscz21nhyLayout, $Vd0gscz21nhyOverlay);
									break;
						}
					}
			}
		}
		$Vcfg4pbgiwen = new PHPExcel_Chart($Vy5t5psp05u4,$Vzeg1rojkgqq,$Vd0gscz21nhy,$Vpiwhkjwfrqq,$Vrcnso5yhyxh,$V0tdiryhmdaa,$Vhlkensv0jbh,$Vhyayvugsrrs);

		return $Vcfg4pbgiwen;
	}	


	private static function _chartTitle($Vzeg1rojkgqqDetails,$Vcvluzjs3wzbspacesChartMeta,$V4pigtpor0ln) {
		$V3l3cyvzlgvr = array();
		$Vzeg1rojkgqqLayout = null;
		foreach($Vzeg1rojkgqqDetails as $Vzeg1rojkgqqDetailKey => $Vwriuy2uutdj) {
			switch ($Vzeg1rojkgqqDetailKey) {
				case "tx":
					$Vzeg1rojkgqqDetails = $Vwriuy2uutdj->rich->children($Vcvluzjs3wzbspacesChartMeta['a']);
					foreach($Vzeg1rojkgqqDetails as $Vzeg1rojkgqqKey => $Vzeg1rojkgqqDetail) {
						switch ($Vzeg1rojkgqqKey) {
							case "p":
								$Vzeg1rojkgqqDetailPart = $Vzeg1rojkgqqDetail->children($Vcvluzjs3wzbspacesChartMeta['a']);
								$V3l3cyvzlgvr[] = self::_parseRichText($Vzeg1rojkgqqDetailPart);
						}
					}
					break;
				case "layout":
					$Vzeg1rojkgqqLayout = self::_chartLayoutDetails($Vwriuy2uutdj,$Vcvluzjs3wzbspacesChartMeta);
					break;
			}
		}

		return new PHPExcel_Chart_Title($V3l3cyvzlgvr, $Vzeg1rojkgqqLayout);
	}	


	private static function _chartLayoutDetails($Vwriuy2uutdj,$Vcvluzjs3wzbspacesChartMeta) {
		if (!isset($Vwriuy2uutdj->manualLayout)) {
			return null;
		}
		$Vp4bbukyxzch = $Vwriuy2uutdj->manualLayout->children($Vcvluzjs3wzbspacesChartMeta['c']);
		if (is_null($Vp4bbukyxzch)) {
			return null;
		}
		$Vhkndayeetih = array();
		foreach($Vp4bbukyxzch as $V0ll5tecn2nw => $Vioumwlxyqx4) {

			$Vhkndayeetih[$V0ll5tecn2nw] = self::_getAttribute($Vioumwlxyqx4, 'val', 'string');
		}
		return new PHPExcel_Chart_Layout($Vhkndayeetih);
	}	


	private static function _chartDataSeries($Vwriuy2uutdj,$Vcvluzjs3wzbspacesChartMeta,$V55l4xfemmlg) {
		$V3imyruk40un = NULL;
		$V51qeuhzwzo4 = false;
		$Vfbjts3ov2ju = $Vamw1a5onysh = $Vtct0df4ilnz = $V4dpmvzwuayz = array();

		$Vny1g2gntve4 = $Vwriuy2uutdj->children($Vcvluzjs3wzbspacesChartMeta['c']);
		foreach($Vny1g2gntve4 as $Va31e5ucgviw => $Vyiu5fxwytqr) {
			switch ($Va31e5ucgviw) {
				case "grouping":
					$V3imyruk40un = self::_getAttribute($Vwriuy2uutdj->grouping, 'val', 'string');
					break;
				case "ser":
					$Vkzp31bqbczg = NULL;
					foreach($Vyiu5fxwytqr as $Vn2k4azdop31 => $Vmmmzizjryso) {
						switch ($Vn2k4azdop31) {
							case "idx":
								$Vr2hebz0ypne = self::_getAttribute($Vmmmzizjryso, 'val', 'integer');
								break;
							case "order":
								$Vorclm0qtv1x = self::_getAttribute($Vmmmzizjryso, 'val', 'integer');
								$V4dpmvzwuayz[$Vr2hebz0ypne] = $Vorclm0qtv1x;
								break;
							case "tx":
								$Vfbjts3ov2ju[$Vr2hebz0ypne] = self::_chartDataSeriesValueSet($Vmmmzizjryso,$Vcvluzjs3wzbspacesChartMeta);
								break;
							case "marker":
								$Vkzp31bqbczg = self::_getAttribute($Vmmmzizjryso->symbol, 'val', 'string');
								break;
							case "smooth":
								$V51qeuhzwzo4 = self::_getAttribute($Vmmmzizjryso, 'val', 'boolean');
								break;
							case "cat":
								$Vamw1a5onysh[$Vr2hebz0ypne] = self::_chartDataSeriesValueSet($Vmmmzizjryso,$Vcvluzjs3wzbspacesChartMeta);
								break;
							case "val":
								$Vtct0df4ilnz[$Vr2hebz0ypne] = self::_chartDataSeriesValueSet($Vmmmzizjryso,$Vcvluzjs3wzbspacesChartMeta,$Vkzp31bqbczg);
								break;
							case "xVal":
								$Vamw1a5onysh[$Vr2hebz0ypne] = self::_chartDataSeriesValueSet($Vmmmzizjryso,$Vcvluzjs3wzbspacesChartMeta,$Vkzp31bqbczg);
								break;
							case "yVal":
								$Vtct0df4ilnz[$Vr2hebz0ypne] = self::_chartDataSeriesValueSet($Vmmmzizjryso,$Vcvluzjs3wzbspacesChartMeta,$Vkzp31bqbczg);
								break;
						}
					}
			}
		}
		return new PHPExcel_Chart_DataSeries($V55l4xfemmlg,$V3imyruk40un,$V4dpmvzwuayz,$Vfbjts3ov2ju,$Vamw1a5onysh,$Vtct0df4ilnz,$V51qeuhzwzo4);
	}	


	private static function _chartDataSeriesValueSet($Vmmmzizjryso, $Vcvluzjs3wzbspacesChartMeta, $Vkzp31bqbczg = null, $V51qeuhzwzo4 = false) {
		if (isset($Vmmmzizjryso->strRef)) {
			$Vobgzsskhdjk = (string) $Vmmmzizjryso->strRef->f;
			$Vj4rbp3p5s45 = self::_chartDataSeriesValues($Vmmmzizjryso->strRef->strCache->children($Vcvluzjs3wzbspacesChartMeta['c']),'s');

			return new PHPExcel_Chart_DataSeriesValues('String',$Vobgzsskhdjk,$Vj4rbp3p5s45['formatCode'],$Vj4rbp3p5s45['pointCount'],$Vj4rbp3p5s45['dataValues'],$Vkzp31bqbczg,$V51qeuhzwzo4);
		} elseif (isset($Vmmmzizjryso->numRef)) {
			$Vobgzsskhdjk = (string) $Vmmmzizjryso->numRef->f;
			$Vj4rbp3p5s45 = self::_chartDataSeriesValues($Vmmmzizjryso->numRef->numCache->children($Vcvluzjs3wzbspacesChartMeta['c']));

			return new PHPExcel_Chart_DataSeriesValues('Number',$Vobgzsskhdjk,$Vj4rbp3p5s45['formatCode'],$Vj4rbp3p5s45['pointCount'],$Vj4rbp3p5s45['dataValues'],$Vkzp31bqbczg,$V51qeuhzwzo4);
		} elseif (isset($Vmmmzizjryso->multiLvlStrRef)) {
			$Vobgzsskhdjk = (string) $Vmmmzizjryso->multiLvlStrRef->f;
			$Vj4rbp3p5s45 = self::_chartDataSeriesValuesMultiLevel($Vmmmzizjryso->multiLvlStrRef->multiLvlStrCache->children($Vcvluzjs3wzbspacesChartMeta['c']),'s');
			$Vj4rbp3p5s45['pointCount'] = count($Vj4rbp3p5s45['dataValues']);

			return new PHPExcel_Chart_DataSeriesValues('String',$Vobgzsskhdjk,$Vj4rbp3p5s45['formatCode'],$Vj4rbp3p5s45['pointCount'],$Vj4rbp3p5s45['dataValues'],$Vkzp31bqbczg,$V51qeuhzwzo4);
		} elseif (isset($Vmmmzizjryso->multiLvlNumRef)) {
			$Vobgzsskhdjk = (string) $Vmmmzizjryso->multiLvlNumRef->f;
			$Vj4rbp3p5s45 = self::_chartDataSeriesValuesMultiLevel($Vmmmzizjryso->multiLvlNumRef->multiLvlNumCache->children($Vcvluzjs3wzbspacesChartMeta['c']),'s');
			$Vj4rbp3p5s45['pointCount'] = count($Vj4rbp3p5s45['dataValues']);

			return new PHPExcel_Chart_DataSeriesValues('String',$Vobgzsskhdjk,$Vj4rbp3p5s45['formatCode'],$Vj4rbp3p5s45['pointCount'],$Vj4rbp3p5s45['dataValues'],$Vkzp31bqbczg,$V51qeuhzwzo4);
		}
		return null;
	}	


	private static function _chartDataSeriesValues($V54ze1zharna,$Vjrftzif43kq='n') {
		$Vzzizc53phrw = array();
		$VrcanlvxmlmpCode = '';
		$Vroszapjozul = 0;

		foreach($V54ze1zharna as $Vzzizc53phrwueIdx => $Vzzizc53phrwue) {
			switch ($Vzzizc53phrwueIdx) {
				case 'ptCount':
					$Vroszapjozul = self::_getAttribute($Vzzizc53phrwue, 'val', 'integer');
					break;
				case 'formatCode':
					$VrcanlvxmlmpCode = (string) $Vzzizc53phrwue;
					break;
				case 'pt':
					$Vgykjejji1m0 = self::_getAttribute($Vzzizc53phrwue, 'idx', 'integer');
					if ($Vjrftzif43kq == 's') {
						$Vzzizc53phrw[$Vgykjejji1m0] = (string) $Vzzizc53phrwue->v;
					} else {
						$Vzzizc53phrw[$Vgykjejji1m0] = (float) $Vzzizc53phrwue->v;
					}
					break;
			}
		}

		if (empty($Vzzizc53phrw)) {
			$Vzzizc53phrw = NULL;
		}

		return array( 'formatCode'	=> $VrcanlvxmlmpCode,
					  'pointCount'	=> $Vroszapjozul,
					  'dataValues'	=> $Vzzizc53phrw
					);
	}	


	private static function _chartDataSeriesValuesMultiLevel($V54ze1zharna,$Vjrftzif43kq='n') {
		$Vzzizc53phrw = array();
		$VrcanlvxmlmpCode = '';
		$Vroszapjozul = 0;

		foreach($V54ze1zharna->lvl as $Vdwflbbpvyv2 => $V0xtj2b4qfox) {
			foreach($V0xtj2b4qfox as $Vzzizc53phrwueIdx => $Vzzizc53phrwue) {
				switch ($Vzzizc53phrwueIdx) {
					case 'ptCount':
						$Vroszapjozul = self::_getAttribute($Vzzizc53phrwue, 'val', 'integer');
						break;
					case 'formatCode':
						$VrcanlvxmlmpCode = (string) $Vzzizc53phrwue;
						break;
					case 'pt':
						$Vgykjejji1m0 = self::_getAttribute($Vzzizc53phrwue, 'idx', 'integer');
						if ($Vjrftzif43kq == 's') {
							$Vzzizc53phrw[$Vgykjejji1m0][] = (string) $Vzzizc53phrwue->v;
						} else {
							$Vzzizc53phrw[$Vgykjejji1m0][] = (float) $Vzzizc53phrwue->v;
						}
						break;
				}
			}
		}

		return array( 'formatCode'	=> $VrcanlvxmlmpCode,
					  'pointCount'	=> $Vroszapjozul,
					  'dataValues'	=> $Vzzizc53phrw
					);
	}	

	private static function _parseRichText($Vzeg1rojkgqqDetailPart = null) {
		$Vp4xjtpabm0l = new PHPExcel_RichText();

		foreach($Vzeg1rojkgqqDetailPart as $Vzeg1rojkgqqDetailElementKey => $Vzeg1rojkgqqDetailElement) {
			if (isset($Vzeg1rojkgqqDetailElement->t)) {
				$Vd42qkadafql = $Vp4xjtpabm0l->createTextRun( (string) $Vzeg1rojkgqqDetailElement->t );
			}
			if (isset($Vzeg1rojkgqqDetailElement->rPr)) {
				if (isset($Vzeg1rojkgqqDetailElement->rPr->rFont["val"])) {
					$Vd42qkadafql->getFont()->setName((string) $Vzeg1rojkgqqDetailElement->rPr->rFont["val"]);
				}

				$Vadyjfjv032h = (self::_getAttribute($Vzeg1rojkgqqDetailElement->rPr, 'sz', 'integer'));
				if (!is_null($Vadyjfjv032h)) {
					$Vd42qkadafql->getFont()->setSize(floor($Vadyjfjv032h / 100));
				}

				$Vrbe3qx4kp1c = (self::_getAttribute($Vzeg1rojkgqqDetailElement->rPr, 'color', 'string'));
				if (!is_null($Vrbe3qx4kp1c)) {
					$Vd42qkadafql->getFont()->setColor( new PHPExcel_Style_Color( self::_readColor($Vrbe3qx4kp1c) ) );
				}

				$Vqgmpyzmahgw = self::_getAttribute($Vzeg1rojkgqqDetailElement->rPr, 'b', 'boolean');
				if (!is_null($Vqgmpyzmahgw)) {
					$Vd42qkadafql->getFont()->setBold($Vqgmpyzmahgw);
				}

				$Vmeubejdy4zy = self::_getAttribute($Vzeg1rojkgqqDetailElement->rPr, 'i', 'boolean');
				if (!is_null($Vmeubejdy4zy)) {
					$Vd42qkadafql->getFont()->setItalic($Vmeubejdy4zy);
				}

				$Vzfri4msc1sz = self::_getAttribute($Vzeg1rojkgqqDetailElement->rPr, 'baseline', 'integer');
				if (!is_null($Vzfri4msc1sz)) {
					if ($Vzfri4msc1sz > 0) {
						$Vd42qkadafql->getFont()->setSuperScript(true);
					} elseif($Vzfri4msc1sz < 0) {
						$Vd42qkadafql->getFont()->setSubScript(true);
					}
				}

				$Vzlqqnzunnp2 = (self::_getAttribute($Vzeg1rojkgqqDetailElement->rPr, 'u', 'string'));
				if (!is_null($Vzlqqnzunnp2)) {
					if ($Vzlqqnzunnp2 == 'sng') {
						$Vd42qkadafql->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
					} elseif($Vzlqqnzunnp2 == 'dbl') {
						$Vd42qkadafql->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_DOUBLE);
					} else {
						$Vd42qkadafql->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_NONE);
					}
				}

				$Vvjszp4adtyk = (self::_getAttribute($Vzeg1rojkgqqDetailElement->rPr, 's', 'string'));
				if (!is_null($Vvjszp4adtyk)) {
					if ($Vvjszp4adtyk == 'noStrike') {
						$Vd42qkadafql->getFont()->setStrikethrough(false);
					} else {
						$Vd42qkadafql->getFont()->setStrikethrough(true);
					}
				}
			}
		}

		return $Vp4xjtpabm0l;
	}

	private static function _readChartAttributes($Vwriuy2uutdj) {
		$Vtgioaxe3wcm = array();
		if (isset($Vwriuy2uutdj->dLbls)) {
			if (isset($Vwriuy2uutdj->dLbls->howLegendKey)) {
				$Vtgioaxe3wcm['showLegendKey'] = self::_getAttribute($Vwriuy2uutdj->dLbls->showLegendKey, 'val', 'string');
			}
			if (isset($Vwriuy2uutdj->dLbls->showVal)) {
				$Vtgioaxe3wcm['showVal'] = self::_getAttribute($Vwriuy2uutdj->dLbls->showVal, 'val', 'string');
			}
			if (isset($Vwriuy2uutdj->dLbls->showCatName)) {
				$Vtgioaxe3wcm['showCatName'] = self::_getAttribute($Vwriuy2uutdj->dLbls->showCatName, 'val', 'string');
			}
			if (isset($Vwriuy2uutdj->dLbls->showSerName)) {
				$Vtgioaxe3wcm['showSerName'] = self::_getAttribute($Vwriuy2uutdj->dLbls->showSerName, 'val', 'string');
			}
			if (isset($Vwriuy2uutdj->dLbls->showPercent)) {
				$Vtgioaxe3wcm['showPercent'] = self::_getAttribute($Vwriuy2uutdj->dLbls->showPercent, 'val', 'string');
			}
			if (isset($Vwriuy2uutdj->dLbls->showBubbleSize)) {
				$Vtgioaxe3wcm['showBubbleSize'] = self::_getAttribute($Vwriuy2uutdj->dLbls->showBubbleSize, 'val', 'string');
			}
			if (isset($Vwriuy2uutdj->dLbls->showLeaderLines)) {
				$Vtgioaxe3wcm['showLeaderLines'] = self::_getAttribute($Vwriuy2uutdj->dLbls->showLeaderLines, 'val', 'string');
			}
		}

		return $Vtgioaxe3wcm;
	}

	private static function _setChartAttributes($Vpiwhkjwfrqq,$Vtgioaxe3wcm)
	{
		foreach($Vtgioaxe3wcm as $Vowbqclnwpk3 => $V0apd424qtl4) {
			switch($Vowbqclnwpk3) {
				case 'showLegendKey' :
					$Vpiwhkjwfrqq->setShowLegendKey($V0apd424qtl4);
					break;
				case 'showVal' :
					$Vpiwhkjwfrqq->setShowVal($V0apd424qtl4);
					break;
				case 'showCatName' :
					$Vpiwhkjwfrqq->setShowCatName($V0apd424qtl4);
					break;
				case 'showSerName' :
					$Vpiwhkjwfrqq->setShowSerName($V0apd424qtl4);
					break;
				case 'showPercent' :
					$Vpiwhkjwfrqq->setShowPercent($V0apd424qtl4);
					break;
				case 'showBubbleSize' :
					$Vpiwhkjwfrqq->setShowBubbleSize($V0apd424qtl4);
					break;
				case 'showLeaderLines' :
					$Vpiwhkjwfrqq->setShowLeaderLines($V0apd424qtl4);
					break;
			}
		}
	}

}
