<?php




class PHPExcel_Writer_Excel2007_Theme extends PHPExcel_Writer_Excel2007_WriterPart
{
	
	private static $Vfwlgxuhl5ok = array(
					'Jpan' => 'ＭＳ Ｐゴシック',
					'Hang' => '맑은 고딕',
					'Hans' => '宋体',
					'Hant' => '新細明體',
					'Arab' => 'Times New Roman',
					'Hebr' => 'Times New Roman',
					'Thai' => 'Tahoma',
					'Ethi' => 'Nyala',
					'Beng' => 'Vrinda',
					'Gujr' => 'Shruti',
					'Khmr' => 'MoolBoran',
					'Knda' => 'Tunga',
					'Guru' => 'Raavi',
					'Cans' => 'Euphemia',
					'Cher' => 'Plantagenet Cherokee',
					'Yiii' => 'Microsoft Yi Baiti',
					'Tibt' => 'Microsoft Himalaya',
					'Thaa' => 'MV Boli',
					'Deva' => 'Mangal',
					'Telu' => 'Gautami',
					'Taml' => 'Latha',
					'Syrc' => 'Estrangelo Edessa',
					'Orya' => 'Kalinga',
					'Mlym' => 'Kartika',
					'Laoo' => 'DokChampa',
					'Sinh' => 'Iskoola Pota',
					'Mong' => 'Mongolian Baiti',
					'Viet' => 'Times New Roman',
					'Uigh' => 'Microsoft Uighur',
					'Geor' => 'Sylfaen',
			);

	
	private static $Vgssdxkvjnfn = array(
					'Jpan' => 'ＭＳ Ｐゴシック',
					'Hang' => '맑은 고딕',
					'Hans' => '宋体',
					'Hant' => '新細明體',
					'Arab' => 'Arial',
					'Hebr' => 'Arial',
					'Thai' => 'Tahoma',
					'Ethi' => 'Nyala',
					'Beng' => 'Vrinda',
					'Gujr' => 'Shruti',
					'Khmr' => 'DaunPenh',
					'Knda' => 'Tunga',
					'Guru' => 'Raavi',
					'Cans' => 'Euphemia',
					'Cher' => 'Plantagenet Cherokee',
					'Yiii' => 'Microsoft Yi Baiti',
					'Tibt' => 'Microsoft Himalaya',
					'Thaa' => 'MV Boli',
					'Deva' => 'Mangal',
					'Telu' => 'Gautami',
					'Taml' => 'Latha',
					'Syrc' => 'Estrangelo Edessa',
					'Orya' => 'Kalinga',
					'Mlym' => 'Kartika',
					'Laoo' => 'DokChampa',
					'Sinh' => 'Iskoola Pota',
					'Mong' => 'Mongolian Baiti',
					'Viet' => 'Arial',
					'Uigh' => 'Microsoft Uighur',
					'Geor' => 'Sylfaen',
			);

	
		private static $Vnabtql4sloa = array(
					'dk2'		=> '1F497D',
					'lt2'		=> 'EEECE1',
					'accent1'	=> '4F81BD',
					'accent2'	=> 'C0504D',
					'accent3'	=> '9BBB59',
					'accent4'	=> '8064A2',
					'accent5'	=> '4BACC6',
					'accent6'	=> 'F79646',
					'hlink'		=> '0000FF',
					'folHlink'	=> '800080',
			);
			
	
	public function writeTheme(PHPExcel $V2ch40cq1nbr = null)
	{
			
			$Vze2ah1ycp2c = null;
			if ($this->getParentWriter()->getUseDiskCaching()) {
				$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
			} else {
				$Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
			}

			
			$Vze2ah1ycp2c->startDocument('1.0','UTF-8','yes');

			
			$Vze2ah1ycp2c->startElement('a:theme');
			$Vze2ah1ycp2c->writeAttribute('xmlns:a', 'http://schemas.openxmlformats.org/drawingml/2006/main');
			$Vze2ah1ycp2c->writeAttribute('name', 'Office Theme');

				
				$Vze2ah1ycp2c->startElement('a:themeElements');

					
					$Vze2ah1ycp2c->startElement('a:clrScheme');
					$Vze2ah1ycp2c->writeAttribute('name', 'Office');

						
						$Vze2ah1ycp2c->startElement('a:dk1');

							
							$Vze2ah1ycp2c->startElement('a:sysClr');
							$Vze2ah1ycp2c->writeAttribute('val', 'windowText');
							$Vze2ah1ycp2c->writeAttribute('lastClr', '000000');
							$Vze2ah1ycp2c->endElement();

						$Vze2ah1ycp2c->endElement();

						
						$Vze2ah1ycp2c->startElement('a:lt1');

							
							$Vze2ah1ycp2c->startElement('a:sysClr');
							$Vze2ah1ycp2c->writeAttribute('val', 'window');
							$Vze2ah1ycp2c->writeAttribute('lastClr', 'FFFFFF');
							$Vze2ah1ycp2c->endElement();

						$Vze2ah1ycp2c->endElement();

						
						$this->_writeColourScheme($Vze2ah1ycp2c);

					$Vze2ah1ycp2c->endElement();

					
					$Vze2ah1ycp2c->startElement('a:fontScheme');
					$Vze2ah1ycp2c->writeAttribute('name', 'Office');

						
						$Vze2ah1ycp2c->startElement('a:majorFont');
							$this->_writeFonts($Vze2ah1ycp2c, 'Cambria', self::$Vfwlgxuhl5ok);
						$Vze2ah1ycp2c->endElement();

						
						$Vze2ah1ycp2c->startElement('a:minorFont');
							$this->_writeFonts($Vze2ah1ycp2c, 'Calibri', self::$Vgssdxkvjnfn);
						$Vze2ah1ycp2c->endElement();

					$Vze2ah1ycp2c->endElement();

					
					$Vze2ah1ycp2c->startElement('a:fmtScheme');
					$Vze2ah1ycp2c->writeAttribute('name', 'Office');

						
						$Vze2ah1ycp2c->startElement('a:fillStyleLst');

							
							$Vze2ah1ycp2c->startElement('a:solidFill');

								
								$Vze2ah1ycp2c->startElement('a:schemeClr');
								$Vze2ah1ycp2c->writeAttribute('val', 'phClr');
								$Vze2ah1ycp2c->endElement();

							$Vze2ah1ycp2c->endElement();

							
							$Vze2ah1ycp2c->startElement('a:gradFill');
							$Vze2ah1ycp2c->writeAttribute('rotWithShape', '1');

								
								$Vze2ah1ycp2c->startElement('a:gsLst');

									
									$Vze2ah1ycp2c->startElement('a:gs');
									$Vze2ah1ycp2c->writeAttribute('pos', '0');

										
										$Vze2ah1ycp2c->startElement('a:schemeClr');
										$Vze2ah1ycp2c->writeAttribute('val', 'phClr');

											
											$Vze2ah1ycp2c->startElement('a:tint');
											$Vze2ah1ycp2c->writeAttribute('val', '50000');
											$Vze2ah1ycp2c->endElement();

											
											$Vze2ah1ycp2c->startElement('a:satMod');
											$Vze2ah1ycp2c->writeAttribute('val', '300000');
											$Vze2ah1ycp2c->endElement();

										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

									
									$Vze2ah1ycp2c->startElement('a:gs');
									$Vze2ah1ycp2c->writeAttribute('pos', '35000');

										
										$Vze2ah1ycp2c->startElement('a:schemeClr');
										$Vze2ah1ycp2c->writeAttribute('val', 'phClr');

											
											$Vze2ah1ycp2c->startElement('a:tint');
											$Vze2ah1ycp2c->writeAttribute('val', '37000');
											$Vze2ah1ycp2c->endElement();

											
											$Vze2ah1ycp2c->startElement('a:satMod');
											$Vze2ah1ycp2c->writeAttribute('val', '300000');
											$Vze2ah1ycp2c->endElement();

										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

									
									$Vze2ah1ycp2c->startElement('a:gs');
									$Vze2ah1ycp2c->writeAttribute('pos', '100000');

										
										$Vze2ah1ycp2c->startElement('a:schemeClr');
										$Vze2ah1ycp2c->writeAttribute('val', 'phClr');

											
											$Vze2ah1ycp2c->startElement('a:tint');
											$Vze2ah1ycp2c->writeAttribute('val', '15000');
											$Vze2ah1ycp2c->endElement();

											
											$Vze2ah1ycp2c->startElement('a:satMod');
											$Vze2ah1ycp2c->writeAttribute('val', '350000');
											$Vze2ah1ycp2c->endElement();

										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

								$Vze2ah1ycp2c->endElement();

								
								$Vze2ah1ycp2c->startElement('a:lin');
								$Vze2ah1ycp2c->writeAttribute('ang', '16200000');
								$Vze2ah1ycp2c->writeAttribute('scaled', '1');
								$Vze2ah1ycp2c->endElement();

							$Vze2ah1ycp2c->endElement();

							
							$Vze2ah1ycp2c->startElement('a:gradFill');
							$Vze2ah1ycp2c->writeAttribute('rotWithShape', '1');

								
								$Vze2ah1ycp2c->startElement('a:gsLst');

									
									$Vze2ah1ycp2c->startElement('a:gs');
									$Vze2ah1ycp2c->writeAttribute('pos', '0');

										
										$Vze2ah1ycp2c->startElement('a:schemeClr');
										$Vze2ah1ycp2c->writeAttribute('val', 'phClr');

											
											$Vze2ah1ycp2c->startElement('a:shade');
											$Vze2ah1ycp2c->writeAttribute('val', '51000');
											$Vze2ah1ycp2c->endElement();

											
											$Vze2ah1ycp2c->startElement('a:satMod');
											$Vze2ah1ycp2c->writeAttribute('val', '130000');
											$Vze2ah1ycp2c->endElement();

										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

									
									$Vze2ah1ycp2c->startElement('a:gs');
									$Vze2ah1ycp2c->writeAttribute('pos', '80000');

										
										$Vze2ah1ycp2c->startElement('a:schemeClr');
										$Vze2ah1ycp2c->writeAttribute('val', 'phClr');

											
											$Vze2ah1ycp2c->startElement('a:shade');
											$Vze2ah1ycp2c->writeAttribute('val', '93000');
											$Vze2ah1ycp2c->endElement();

											
											$Vze2ah1ycp2c->startElement('a:satMod');
											$Vze2ah1ycp2c->writeAttribute('val', '130000');
											$Vze2ah1ycp2c->endElement();

										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

									
									$Vze2ah1ycp2c->startElement('a:gs');
									$Vze2ah1ycp2c->writeAttribute('pos', '100000');

										
										$Vze2ah1ycp2c->startElement('a:schemeClr');
										$Vze2ah1ycp2c->writeAttribute('val', 'phClr');

											
											$Vze2ah1ycp2c->startElement('a:shade');
											$Vze2ah1ycp2c->writeAttribute('val', '94000');
											$Vze2ah1ycp2c->endElement();

											
											$Vze2ah1ycp2c->startElement('a:satMod');
											$Vze2ah1ycp2c->writeAttribute('val', '135000');
											$Vze2ah1ycp2c->endElement();

										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

								$Vze2ah1ycp2c->endElement();

								
								$Vze2ah1ycp2c->startElement('a:lin');
								$Vze2ah1ycp2c->writeAttribute('ang', '16200000');
								$Vze2ah1ycp2c->writeAttribute('scaled', '0');
								$Vze2ah1ycp2c->endElement();

							$Vze2ah1ycp2c->endElement();

						$Vze2ah1ycp2c->endElement();

						
						$Vze2ah1ycp2c->startElement('a:lnStyleLst');

							
							$Vze2ah1ycp2c->startElement('a:ln');
							$Vze2ah1ycp2c->writeAttribute('w', '9525');
							$Vze2ah1ycp2c->writeAttribute('cap', 'flat');
							$Vze2ah1ycp2c->writeAttribute('cmpd', 'sng');
							$Vze2ah1ycp2c->writeAttribute('algn', 'ctr');

								
								$Vze2ah1ycp2c->startElement('a:solidFill');

									
									$Vze2ah1ycp2c->startElement('a:schemeClr');
									$Vze2ah1ycp2c->writeAttribute('val', 'phClr');

											
											$Vze2ah1ycp2c->startElement('a:shade');
											$Vze2ah1ycp2c->writeAttribute('val', '95000');
											$Vze2ah1ycp2c->endElement();

											
											$Vze2ah1ycp2c->startElement('a:satMod');
											$Vze2ah1ycp2c->writeAttribute('val', '105000');
											$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

								$Vze2ah1ycp2c->endElement();

								
								$Vze2ah1ycp2c->startElement('a:prstDash');
								$Vze2ah1ycp2c->writeAttribute('val', 'solid');
								$Vze2ah1ycp2c->endElement();

							$Vze2ah1ycp2c->endElement();

							
							$Vze2ah1ycp2c->startElement('a:ln');
							$Vze2ah1ycp2c->writeAttribute('w', '25400');
							$Vze2ah1ycp2c->writeAttribute('cap', 'flat');
							$Vze2ah1ycp2c->writeAttribute('cmpd', 'sng');
							$Vze2ah1ycp2c->writeAttribute('algn', 'ctr');

								
								$Vze2ah1ycp2c->startElement('a:solidFill');

									
									$Vze2ah1ycp2c->startElement('a:schemeClr');
									$Vze2ah1ycp2c->writeAttribute('val', 'phClr');
									$Vze2ah1ycp2c->endElement();

								$Vze2ah1ycp2c->endElement();

								
								$Vze2ah1ycp2c->startElement('a:prstDash');
								$Vze2ah1ycp2c->writeAttribute('val', 'solid');
								$Vze2ah1ycp2c->endElement();

							$Vze2ah1ycp2c->endElement();

							
							$Vze2ah1ycp2c->startElement('a:ln');
							$Vze2ah1ycp2c->writeAttribute('w', '38100');
							$Vze2ah1ycp2c->writeAttribute('cap', 'flat');
							$Vze2ah1ycp2c->writeAttribute('cmpd', 'sng');
							$Vze2ah1ycp2c->writeAttribute('algn', 'ctr');

								
								$Vze2ah1ycp2c->startElement('a:solidFill');

									
									$Vze2ah1ycp2c->startElement('a:schemeClr');
									$Vze2ah1ycp2c->writeAttribute('val', 'phClr');
									$Vze2ah1ycp2c->endElement();

								$Vze2ah1ycp2c->endElement();

								
								$Vze2ah1ycp2c->startElement('a:prstDash');
								$Vze2ah1ycp2c->writeAttribute('val', 'solid');
								$Vze2ah1ycp2c->endElement();

							$Vze2ah1ycp2c->endElement();

						$Vze2ah1ycp2c->endElement();



						
						$Vze2ah1ycp2c->startElement('a:effectStyleLst');

							
							$Vze2ah1ycp2c->startElement('a:effectStyle');

								
								$Vze2ah1ycp2c->startElement('a:effectLst');

									
									$Vze2ah1ycp2c->startElement('a:outerShdw');
									$Vze2ah1ycp2c->writeAttribute('blurRad', '40000');
									$Vze2ah1ycp2c->writeAttribute('dist', '20000');
									$Vze2ah1ycp2c->writeAttribute('dir', '5400000');
									$Vze2ah1ycp2c->writeAttribute('rotWithShape', '0');

										
										$Vze2ah1ycp2c->startElement('a:srgbClr');
										$Vze2ah1ycp2c->writeAttribute('val', '000000');

											
											$Vze2ah1ycp2c->startElement('a:alpha');
											$Vze2ah1ycp2c->writeAttribute('val', '38000');
											$Vze2ah1ycp2c->endElement();

										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

								$Vze2ah1ycp2c->endElement();

							$Vze2ah1ycp2c->endElement();

							
							$Vze2ah1ycp2c->startElement('a:effectStyle');

								
								$Vze2ah1ycp2c->startElement('a:effectLst');

									
									$Vze2ah1ycp2c->startElement('a:outerShdw');
									$Vze2ah1ycp2c->writeAttribute('blurRad', '40000');
									$Vze2ah1ycp2c->writeAttribute('dist', '23000');
									$Vze2ah1ycp2c->writeAttribute('dir', '5400000');
									$Vze2ah1ycp2c->writeAttribute('rotWithShape', '0');

										
										$Vze2ah1ycp2c->startElement('a:srgbClr');
										$Vze2ah1ycp2c->writeAttribute('val', '000000');

											
											$Vze2ah1ycp2c->startElement('a:alpha');
											$Vze2ah1ycp2c->writeAttribute('val', '35000');
											$Vze2ah1ycp2c->endElement();

										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

								$Vze2ah1ycp2c->endElement();

							$Vze2ah1ycp2c->endElement();

							
							$Vze2ah1ycp2c->startElement('a:effectStyle');

								
								$Vze2ah1ycp2c->startElement('a:effectLst');

									
									$Vze2ah1ycp2c->startElement('a:outerShdw');
									$Vze2ah1ycp2c->writeAttribute('blurRad', '40000');
									$Vze2ah1ycp2c->writeAttribute('dist', '23000');
									$Vze2ah1ycp2c->writeAttribute('dir', '5400000');
									$Vze2ah1ycp2c->writeAttribute('rotWithShape', '0');

										
										$Vze2ah1ycp2c->startElement('a:srgbClr');
										$Vze2ah1ycp2c->writeAttribute('val', '000000');

											
											$Vze2ah1ycp2c->startElement('a:alpha');
											$Vze2ah1ycp2c->writeAttribute('val', '35000');
											$Vze2ah1ycp2c->endElement();

										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

								$Vze2ah1ycp2c->endElement();

								
								$Vze2ah1ycp2c->startElement('a:scene3d');

									
									$Vze2ah1ycp2c->startElement('a:camera');
									$Vze2ah1ycp2c->writeAttribute('prst', 'orthographicFront');

										
										$Vze2ah1ycp2c->startElement('a:rot');
										$Vze2ah1ycp2c->writeAttribute('lat', '0');
										$Vze2ah1ycp2c->writeAttribute('lon', '0');
										$Vze2ah1ycp2c->writeAttribute('rev', '0');
										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

									
									$Vze2ah1ycp2c->startElement('a:lightRig');
									$Vze2ah1ycp2c->writeAttribute('rig', 'threePt');
									$Vze2ah1ycp2c->writeAttribute('dir', 't');

										
										$Vze2ah1ycp2c->startElement('a:rot');
										$Vze2ah1ycp2c->writeAttribute('lat', '0');
										$Vze2ah1ycp2c->writeAttribute('lon', '0');
										$Vze2ah1ycp2c->writeAttribute('rev', '1200000');
										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

								$Vze2ah1ycp2c->endElement();

								
								$Vze2ah1ycp2c->startElement('a:sp3d');

									
									$Vze2ah1ycp2c->startElement('a:bevelT');
									$Vze2ah1ycp2c->writeAttribute('w', '63500');
									$Vze2ah1ycp2c->writeAttribute('h', '25400');
									$Vze2ah1ycp2c->endElement();

								$Vze2ah1ycp2c->endElement();

							$Vze2ah1ycp2c->endElement();

						$Vze2ah1ycp2c->endElement();

						
						$Vze2ah1ycp2c->startElement('a:bgFillStyleLst');

							
							$Vze2ah1ycp2c->startElement('a:solidFill');

								
								$Vze2ah1ycp2c->startElement('a:schemeClr');
								$Vze2ah1ycp2c->writeAttribute('val', 'phClr');
								$Vze2ah1ycp2c->endElement();

							$Vze2ah1ycp2c->endElement();

							
							$Vze2ah1ycp2c->startElement('a:gradFill');
							$Vze2ah1ycp2c->writeAttribute('rotWithShape', '1');

								
								$Vze2ah1ycp2c->startElement('a:gsLst');

									
									$Vze2ah1ycp2c->startElement('a:gs');
									$Vze2ah1ycp2c->writeAttribute('pos', '0');

										
										$Vze2ah1ycp2c->startElement('a:schemeClr');
										$Vze2ah1ycp2c->writeAttribute('val', 'phClr');

											
											$Vze2ah1ycp2c->startElement('a:tint');
											$Vze2ah1ycp2c->writeAttribute('val', '40000');
											$Vze2ah1ycp2c->endElement();

											
											$Vze2ah1ycp2c->startElement('a:satMod');
											$Vze2ah1ycp2c->writeAttribute('val', '350000');
											$Vze2ah1ycp2c->endElement();

										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

									
									$Vze2ah1ycp2c->startElement('a:gs');
									$Vze2ah1ycp2c->writeAttribute('pos', '40000');

										
										$Vze2ah1ycp2c->startElement('a:schemeClr');
										$Vze2ah1ycp2c->writeAttribute('val', 'phClr');

											
											$Vze2ah1ycp2c->startElement('a:tint');
											$Vze2ah1ycp2c->writeAttribute('val', '45000');
											$Vze2ah1ycp2c->endElement();

											
											$Vze2ah1ycp2c->startElement('a:shade');
											$Vze2ah1ycp2c->writeAttribute('val', '99000');
											$Vze2ah1ycp2c->endElement();

											
											$Vze2ah1ycp2c->startElement('a:satMod');
											$Vze2ah1ycp2c->writeAttribute('val', '350000');
											$Vze2ah1ycp2c->endElement();

										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

									
									$Vze2ah1ycp2c->startElement('a:gs');
									$Vze2ah1ycp2c->writeAttribute('pos', '100000');

										
										$Vze2ah1ycp2c->startElement('a:schemeClr');
										$Vze2ah1ycp2c->writeAttribute('val', 'phClr');

											
											$Vze2ah1ycp2c->startElement('a:shade');
											$Vze2ah1ycp2c->writeAttribute('val', '20000');
											$Vze2ah1ycp2c->endElement();

											
											$Vze2ah1ycp2c->startElement('a:satMod');
											$Vze2ah1ycp2c->writeAttribute('val', '255000');
											$Vze2ah1ycp2c->endElement();

										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

								$Vze2ah1ycp2c->endElement();

								
								$Vze2ah1ycp2c->startElement('a:path');
								$Vze2ah1ycp2c->writeAttribute('path', 'circle');

									
									$Vze2ah1ycp2c->startElement('a:fillToRect');
									$Vze2ah1ycp2c->writeAttribute('l', '50000');
									$Vze2ah1ycp2c->writeAttribute('t', '-80000');
									$Vze2ah1ycp2c->writeAttribute('r', '50000');
									$Vze2ah1ycp2c->writeAttribute('b', '180000');
									$Vze2ah1ycp2c->endElement();

								$Vze2ah1ycp2c->endElement();

							$Vze2ah1ycp2c->endElement();

							
							$Vze2ah1ycp2c->startElement('a:gradFill');
							$Vze2ah1ycp2c->writeAttribute('rotWithShape', '1');

								
								$Vze2ah1ycp2c->startElement('a:gsLst');

									
									$Vze2ah1ycp2c->startElement('a:gs');
									$Vze2ah1ycp2c->writeAttribute('pos', '0');

										
										$Vze2ah1ycp2c->startElement('a:schemeClr');
										$Vze2ah1ycp2c->writeAttribute('val', 'phClr');

											
											$Vze2ah1ycp2c->startElement('a:tint');
											$Vze2ah1ycp2c->writeAttribute('val', '80000');
											$Vze2ah1ycp2c->endElement();

											
											$Vze2ah1ycp2c->startElement('a:satMod');
											$Vze2ah1ycp2c->writeAttribute('val', '300000');
											$Vze2ah1ycp2c->endElement();

										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

									
									$Vze2ah1ycp2c->startElement('a:gs');
									$Vze2ah1ycp2c->writeAttribute('pos', '100000');

										
										$Vze2ah1ycp2c->startElement('a:schemeClr');
										$Vze2ah1ycp2c->writeAttribute('val', 'phClr');

											
											$Vze2ah1ycp2c->startElement('a:shade');
											$Vze2ah1ycp2c->writeAttribute('val', '30000');
											$Vze2ah1ycp2c->endElement();

											
											$Vze2ah1ycp2c->startElement('a:satMod');
											$Vze2ah1ycp2c->writeAttribute('val', '200000');
											$Vze2ah1ycp2c->endElement();

										$Vze2ah1ycp2c->endElement();

									$Vze2ah1ycp2c->endElement();

								$Vze2ah1ycp2c->endElement();

								
								$Vze2ah1ycp2c->startElement('a:path');
								$Vze2ah1ycp2c->writeAttribute('path', 'circle');

									
									$Vze2ah1ycp2c->startElement('a:fillToRect');
									$Vze2ah1ycp2c->writeAttribute('l', '50000');
									$Vze2ah1ycp2c->writeAttribute('t', '50000');
									$Vze2ah1ycp2c->writeAttribute('r', '50000');
									$Vze2ah1ycp2c->writeAttribute('b', '50000');
									$Vze2ah1ycp2c->endElement();

								$Vze2ah1ycp2c->endElement();

							$Vze2ah1ycp2c->endElement();

						$Vze2ah1ycp2c->endElement();

					$Vze2ah1ycp2c->endElement();

				$Vze2ah1ycp2c->endElement();

				
				$Vze2ah1ycp2c->writeElement('a:objectDefaults', null);

				
				$Vze2ah1ycp2c->writeElement('a:extraClrSchemeLst', null);

			$Vze2ah1ycp2c->endElement();

			
			return $Vze2ah1ycp2c->getData();
	}

	
	private function _writeFonts($Vze2ah1ycp2c, $V0rytom5yqck, $Vaw24cbxwifj)
	{
		
		$Vze2ah1ycp2c->startElement('a:latin');
		$Vze2ah1ycp2c->writeAttribute('typeface', $V0rytom5yqck);
		$Vze2ah1ycp2c->endElement();

		
		$Vze2ah1ycp2c->startElement('a:ea');
		$Vze2ah1ycp2c->writeAttribute('typeface', '');
		$Vze2ah1ycp2c->endElement();

		
		$Vze2ah1ycp2c->startElement('a:cs');
		$Vze2ah1ycp2c->writeAttribute('typeface', '');
		$Vze2ah1ycp2c->endElement();

		foreach($Vaw24cbxwifj as $Vytbyporxco1 => $Vkaysmpreljq) {
			$Vze2ah1ycp2c->startElement('a:font');
				$Vze2ah1ycp2c->writeAttribute('script', $Vytbyporxco1);
				$Vze2ah1ycp2c->writeAttribute('typeface', $Vkaysmpreljq);
			$Vze2ah1ycp2c->endElement();
		}

	}

	
	private function _writeColourScheme($Vze2ah1ycp2c)
	{
		foreach(self::$Vnabtql4sloa as $Va4biojgwtch => $Vnst5v0blyvr) {
			$Vze2ah1ycp2c->startElement('a:'.$Va4biojgwtch);

				$Vze2ah1ycp2c->startElement('a:srgbClr');
					$Vze2ah1ycp2c->writeAttribute('val', $Vnst5v0blyvr);
				$Vze2ah1ycp2c->endElement();

			$Vze2ah1ycp2c->endElement();
		}
						
	}
}
