<?php



class PHPExcel_Writer_Excel2007_Chart extends
  PHPExcel_Writer_Excel2007_WriterPart {

  
  public function writeChart(PHPExcel_Chart $V23qm22ezshm = NULL) {
    
    $Vze2ah1ycp2c = NULL;
    if ($this->getParentWriter()
        ->getUseDiskCaching()
    ) {
      $Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_DISK, $this->getParentWriter()
          ->getDiskCachingDirectory());
    } else {
      $Vze2ah1ycp2c = new PHPExcel_Shared_XMLWriter(PHPExcel_Shared_XMLWriter::STORAGE_MEMORY);
    }
    
    $V23qm22ezshm->refresh();

    
    $Vze2ah1ycp2c->startDocument('1.0', 'UTF-8', 'yes');

    
    $Vze2ah1ycp2c->startElement('c:chartSpace');
    $Vze2ah1ycp2c->writeAttribute('xmlns:c', 'http://schemas.openxmlformats.org/drawingml/2006/chart');
    $Vze2ah1ycp2c->writeAttribute('xmlns:a', 'http://schemas.openxmlformats.org/drawingml/2006/main');
    $Vze2ah1ycp2c->writeAttribute('xmlns:r', 'http://schemas.openxmlformats.org/officeDocument/2006/relationships');

    $Vze2ah1ycp2c->startElement('c:date1904');
    $Vze2ah1ycp2c->writeAttribute('val', 0);
    $Vze2ah1ycp2c->endElement();
    $Vze2ah1ycp2c->startElement('c:lang');
    $Vze2ah1ycp2c->writeAttribute('val', "en-GB");
    $Vze2ah1ycp2c->endElement();
    $Vze2ah1ycp2c->startElement('c:roundedCorners');
    $Vze2ah1ycp2c->writeAttribute('val', 0);
    $Vze2ah1ycp2c->endElement();

    $this->_writeAlternateContent($Vze2ah1ycp2c);

    $Vze2ah1ycp2c->startElement('c:chart');

    $this->_writeTitle($V23qm22ezshm->getTitle(), $Vze2ah1ycp2c);

    $Vze2ah1ycp2c->startElement('c:autoTitleDeleted');
    $Vze2ah1ycp2c->writeAttribute('val', 0);
    $Vze2ah1ycp2c->endElement();

    $this->_writePlotArea(
        $V23qm22ezshm->getPlotArea(),
        $V23qm22ezshm->getXAxisLabel(),
        $V23qm22ezshm->getYAxisLabel(),
        $Vze2ah1ycp2c,
        $V23qm22ezshm->getWorksheet(),
        $V23qm22ezshm->getChartAxisX(),
        $V23qm22ezshm->getChartAxisY(),
        $V23qm22ezshm->getMajorGridlines(),
        $V23qm22ezshm->getMinorGridlines()
    );

    $this->_writeLegend($V23qm22ezshm->getLegend(), $Vze2ah1ycp2c);

    $Vze2ah1ycp2c->startElement('c:plotVisOnly');
    $Vze2ah1ycp2c->writeAttribute('val', 1);
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:dispBlanksAs');
    $Vze2ah1ycp2c->writeAttribute('val', "gap");
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:showDLblsOverMax');
    $Vze2ah1ycp2c->writeAttribute('val', 0);
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->endElement();

    $this->_writePrintSettings($Vze2ah1ycp2c);

    $Vze2ah1ycp2c->endElement();

    
    return $Vze2ah1ycp2c->getData();
  }

  
  private function _writeTitle(PHPExcel_Chart_Title $Vzeg1rojkgqq = NULL, $Vze2ah1ycp2c) {
    if (is_null($Vzeg1rojkgqq)) {
      return;
    }

    $Vze2ah1ycp2c->startElement('c:title');
    $Vze2ah1ycp2c->startElement('c:tx');
    $Vze2ah1ycp2c->startElement('c:rich');

    $Vze2ah1ycp2c->startElement('a:bodyPr');
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('a:lstStyle');
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('a:p');

    $V3l3cyvzlgvr = $Vzeg1rojkgqq->getCaption();
    if ((is_array($V3l3cyvzlgvr)) && (count($V3l3cyvzlgvr) > 0)) {
      $V3l3cyvzlgvr = $V3l3cyvzlgvr[0];
    }
    $this->getParentWriter()
        ->getWriterPart('stringtable')
        ->writeRichTextForCharts($Vze2ah1ycp2c, $V3l3cyvzlgvr, 'a');

    $Vze2ah1ycp2c->endElement();
    $Vze2ah1ycp2c->endElement();
    $Vze2ah1ycp2c->endElement();

    $Vhkndayeetih = $Vzeg1rojkgqq->getLayout();
    $this->_writeLayout($Vhkndayeetih, $Vze2ah1ycp2c);

    $Vze2ah1ycp2c->startElement('c:overlay');
    $Vze2ah1ycp2c->writeAttribute('val', 0);
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->endElement();
  }

  
  private function _writeLegend(PHPExcel_Chart_Legend $Vd0gscz21nhy = NULL, $Vze2ah1ycp2c) {
    if (is_null($Vd0gscz21nhy)) {
      return;
    }

    $Vze2ah1ycp2c->startElement('c:legend');

    $Vze2ah1ycp2c->startElement('c:legendPos');
    $Vze2ah1ycp2c->writeAttribute('val', $Vd0gscz21nhy->getPosition());
    $Vze2ah1ycp2c->endElement();

    $Vhkndayeetih = $Vd0gscz21nhy->getLayout();
    $this->_writeLayout($Vhkndayeetih, $Vze2ah1ycp2c);

    $Vze2ah1ycp2c->startElement('c:overlay');
    $Vze2ah1ycp2c->writeAttribute('val', ($Vd0gscz21nhy->getOverlay()) ? '1' : '0');
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:txPr');
    $Vze2ah1ycp2c->startElement('a:bodyPr');
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('a:lstStyle');
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('a:p');
    $Vze2ah1ycp2c->startElement('a:pPr');
    $Vze2ah1ycp2c->writeAttribute('rtl', 0);

    $Vze2ah1ycp2c->startElement('a:defRPr');
    $Vze2ah1ycp2c->endElement();
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('a:endParaRPr');
    $Vze2ah1ycp2c->writeAttribute('lang', "en-US");
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->endElement();
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->endElement();
  }

  
  private function _writePlotArea(PHPExcel_Chart_PlotArea $Vpiwhkjwfrqq,
      PHPExcel_Chart_Title $V0h355jcamat = NULL,
      PHPExcel_Chart_Title $Vvuiaeplqlp1 = NULL,
      $Vze2ah1ycp2c,
      PHPExcel_Worksheet $Vci1dgyyzjho,
      PHPExcel_Chart_Axis $V5g30dzpdfzz,
      PHPExcel_Chart_Axis $Vvhggdajc12m,
      PHPExcel_Chart_GridLines $Vq0zudmruixk,
      PHPExcel_Chart_GridLines $Vjhvlsci4mq3
  ) {
    if (is_null($Vpiwhkjwfrqq)) {
      return;
    }

    $Vk41ezb1sw0s = $V3j4trbtuvof = 0;
    $this->_seriesIndex = 0;
    $Vze2ah1ycp2c->startElement('c:plotArea');

    $Vhkndayeetih = $Vpiwhkjwfrqq->getLayout();

    $this->_writeLayout($Vhkndayeetih, $Vze2ah1ycp2c);

    $Voxbthsbilw3 = self::_getChartType($Vpiwhkjwfrqq);
    $V4nfsteqqqci = $Vati404q0rqk = FALSE;
    $Vsklxdlyr3kq = '';
    foreach ($Voxbthsbilw3 as $V2c0mujmzgc3) {
      $Vze2ah1ycp2c->startElement('c:' . $V2c0mujmzgc3);

      $Vyw4ibzwf0yi = $Vpiwhkjwfrqq->getPlotGroupCount();
      for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vyw4ibzwf0yi; ++$Vfhiq1lhsoja) {
        $Vqynbawgq4ac = $Vpiwhkjwfrqq->getPlotGroupByIndex($Vfhiq1lhsoja);
        $Vwezwcwmz4jm = $Vqynbawgq4ac->getPlotType();
        if ($Vwezwcwmz4jm == $V2c0mujmzgc3) {

          $Vi5fmkehmxfe = $Vqynbawgq4ac->getPlotStyle();
          if ($Vwezwcwmz4jm === PHPExcel_Chart_DataSeries::TYPE_RADARCHART) {
            $Vze2ah1ycp2c->startElement('c:radarStyle');
            $Vze2ah1ycp2c->writeAttribute('val', $Vi5fmkehmxfe);
            $Vze2ah1ycp2c->endElement();
          } elseif ($Vwezwcwmz4jm === PHPExcel_Chart_DataSeries::TYPE_SCATTERCHART) {
            $Vze2ah1ycp2c->startElement('c:scatterStyle');
            $Vze2ah1ycp2c->writeAttribute('val', $Vi5fmkehmxfe);
            $Vze2ah1ycp2c->endElement();
          }

          $this->_writePlotGroup($Vqynbawgq4ac, $V2c0mujmzgc3, $Vze2ah1ycp2c, $V4nfsteqqqci, $Vati404q0rqk, $Vsklxdlyr3kq, $Vci1dgyyzjho);
        }
      }

      $this->_writeDataLbls($Vze2ah1ycp2c, $Vhkndayeetih);

      if ($V2c0mujmzgc3 === PHPExcel_Chart_DataSeries::TYPE_LINECHART) {
        

        $Vze2ah1ycp2c->startElement('c:smooth');
        $Vze2ah1ycp2c->writeAttribute('val', (integer) $Vqynbawgq4ac->getSmoothLine());
        $Vze2ah1ycp2c->endElement();
      } elseif (($V2c0mujmzgc3 === PHPExcel_Chart_DataSeries::TYPE_BARCHART) ||
          ($V2c0mujmzgc3 === PHPExcel_Chart_DataSeries::TYPE_BARCHART_3D)
      ) {

        $Vze2ah1ycp2c->startElement('c:gapWidth');
        $Vze2ah1ycp2c->writeAttribute('val', 150);
        $Vze2ah1ycp2c->endElement();

        if ($Vsklxdlyr3kq == 'percentStacked' ||
            $Vsklxdlyr3kq == 'stacked'
        ) {

          $Vze2ah1ycp2c->startElement('c:overlap');
          $Vze2ah1ycp2c->writeAttribute('val', 100);
          $Vze2ah1ycp2c->endElement();
        }
      } elseif ($V2c0mujmzgc3 === PHPExcel_Chart_DataSeries::TYPE_BUBBLECHART) {

        $Vze2ah1ycp2c->startElement('c:bubbleScale');
        $Vze2ah1ycp2c->writeAttribute('val', 25);
        $Vze2ah1ycp2c->endElement();

        $Vze2ah1ycp2c->startElement('c:showNegBubbles');
        $Vze2ah1ycp2c->writeAttribute('val', 0);
        $Vze2ah1ycp2c->endElement();
      } elseif ($V2c0mujmzgc3 === PHPExcel_Chart_DataSeries::TYPE_STOCKCHART) {

        $Vze2ah1ycp2c->startElement('c:hiLowLines');
        $Vze2ah1ycp2c->endElement();

        $Vze2ah1ycp2c->startElement('c:upDownBars');

        $Vze2ah1ycp2c->startElement('c:gapWidth');
        $Vze2ah1ycp2c->writeAttribute('val', 300);
        $Vze2ah1ycp2c->endElement();

        $Vze2ah1ycp2c->startElement('c:upBars');
        $Vze2ah1ycp2c->endElement();

        $Vze2ah1ycp2c->startElement('c:downBars');
        $Vze2ah1ycp2c->endElement();

        $Vze2ah1ycp2c->endElement();
      }

      
      
      
      
      
      $Vk41ezb1sw0s = '75091328';
      $V3j4trbtuvof = '75089408';

      if (($V2c0mujmzgc3 !== PHPExcel_Chart_DataSeries::TYPE_PIECHART) &&
          ($V2c0mujmzgc3 !== PHPExcel_Chart_DataSeries::TYPE_PIECHART_3D) &&
          ($V2c0mujmzgc3 !== PHPExcel_Chart_DataSeries::TYPE_DONUTCHART)
      ) {

        $Vze2ah1ycp2c->startElement('c:axId');
        $Vze2ah1ycp2c->writeAttribute('val', $Vk41ezb1sw0s);
        $Vze2ah1ycp2c->endElement();
        $Vze2ah1ycp2c->startElement('c:axId');
        $Vze2ah1ycp2c->writeAttribute('val', $V3j4trbtuvof);
        $Vze2ah1ycp2c->endElement();
      } else {
        $Vze2ah1ycp2c->startElement('c:firstSliceAng');
        $Vze2ah1ycp2c->writeAttribute('val', 0);
        $Vze2ah1ycp2c->endElement();

        if ($V2c0mujmzgc3 === PHPExcel_Chart_DataSeries::TYPE_DONUTCHART) {

          $Vze2ah1ycp2c->startElement('c:holeSize');
          $Vze2ah1ycp2c->writeAttribute('val', 50);
          $Vze2ah1ycp2c->endElement();
        }
      }

      $Vze2ah1ycp2c->endElement();
    }

    if (($V2c0mujmzgc3 !== PHPExcel_Chart_DataSeries::TYPE_PIECHART) &&
        ($V2c0mujmzgc3 !== PHPExcel_Chart_DataSeries::TYPE_PIECHART_3D) &&
        ($V2c0mujmzgc3 !== PHPExcel_Chart_DataSeries::TYPE_DONUTCHART)
    ) {

      if ($V2c0mujmzgc3 === PHPExcel_Chart_DataSeries::TYPE_BUBBLECHART) {
        $this->_writeValAx($Vze2ah1ycp2c, $Vpiwhkjwfrqq, $V0h355jcamat, $V2c0mujmzgc3, $Vk41ezb1sw0s, $V3j4trbtuvof, $V4nfsteqqqci, $V5g30dzpdfzz, $Vvhggdajc12m, $Vq0zudmruixk, $Vjhvlsci4mq3);
      } else {
        $this->_writeCatAx($Vze2ah1ycp2c, $Vpiwhkjwfrqq, $V0h355jcamat, $V2c0mujmzgc3, $Vk41ezb1sw0s, $V3j4trbtuvof, $V4nfsteqqqci, $V5g30dzpdfzz, $Vvhggdajc12m);
      }

      $this->_writeValAx($Vze2ah1ycp2c, $Vpiwhkjwfrqq, $Vvuiaeplqlp1, $V2c0mujmzgc3, $Vk41ezb1sw0s, $V3j4trbtuvof, $Vati404q0rqk, $V5g30dzpdfzz, $Vvhggdajc12m, $Vq0zudmruixk, $Vjhvlsci4mq3);
    }

    $Vze2ah1ycp2c->endElement();
  }

  
  private function _writeDataLbls($Vze2ah1ycp2c, $Vfz52scoagpr) {
    $Vze2ah1ycp2c->startElement('c:dLbls');

    $Vze2ah1ycp2c->startElement('c:showLegendKey');
    $Vcyb4q53osto = (empty($Vfz52scoagpr)) ? 0 : $Vfz52scoagpr->getShowLegendKey();
    $Vze2ah1ycp2c->writeAttribute('val', ((empty($Vcyb4q53osto)) ? 0 : 1));
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:showVal');
    $Vo2b2qcximvh = (empty($Vfz52scoagpr)) ? 0 : $Vfz52scoagpr->getShowVal();
    $Vze2ah1ycp2c->writeAttribute('val', ((empty($Vo2b2qcximvh)) ? 0 : 1));
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:showCatName');
    $Vq0sxx4amua2 = (empty($Vfz52scoagpr)) ? 0 : $Vfz52scoagpr->getShowCatName();
    $Vze2ah1ycp2c->writeAttribute('val', ((empty($Vq0sxx4amua2)) ? 0 : 1));
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:showSerName');
    $Vqsj5wcrwkfm = (empty($Vfz52scoagpr)) ? 0 : $Vfz52scoagpr->getShowSerName();
    $Vze2ah1ycp2c->writeAttribute('val', ((empty($Vqsj5wcrwkfm)) ? 0 : 1));
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:showPercent');
    $V2gdvhphsdzg = (empty($Vfz52scoagpr)) ? 0 : $Vfz52scoagpr->getShowPercent();
    $Vze2ah1ycp2c->writeAttribute('val', ((empty($V2gdvhphsdzg)) ? 0 : 1));
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:showBubbleSize');
    $Vxfzt1vpcm4b = (empty($Vfz52scoagpr)) ? 0 : $Vfz52scoagpr->getShowBubbleSize();
    $Vze2ah1ycp2c->writeAttribute('val', ((empty($Vxfzt1vpcm4b)) ? 0 : 1));
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:showLeaderLines');
    $V3g3d0unt1e4 = (empty($Vfz52scoagpr)) ? 1 : $Vfz52scoagpr->getShowLeaderLines();
    $Vze2ah1ycp2c->writeAttribute('val', ((empty($V3g3d0unt1e4)) ? 0 : 1));
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->endElement();
  }

  
  private function _writeCatAx($Vze2ah1ycp2c, PHPExcel_Chart_PlotArea $Vpiwhkjwfrqq, $V0h355jcamat, $Vwezwcwmz4jm, $Vk41ezb1sw0s, $V3j4trbtuvof, $Vfhiq1lhsojasMultiLevelSeries, $V5g30dzpdfzz, $Vvhggdajc12m) {
    $Vze2ah1ycp2c->startElement('c:catAx');

    if ($Vk41ezb1sw0s > 0) {
      $Vze2ah1ycp2c->startElement('c:axId');
      $Vze2ah1ycp2c->writeAttribute('val', $Vk41ezb1sw0s);
      $Vze2ah1ycp2c->endElement();
    }

    $Vze2ah1ycp2c->startElement('c:scaling');
    $Vze2ah1ycp2c->startElement('c:orientation');
    $Vze2ah1ycp2c->writeAttribute('val', $Vvhggdajc12m->getAxisOptionsProperty('orientation'));
    $Vze2ah1ycp2c->endElement();
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:delete');
    $Vze2ah1ycp2c->writeAttribute('val', 0);
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:axPos');
    $Vze2ah1ycp2c->writeAttribute('val', "b");
    $Vze2ah1ycp2c->endElement();

    if (!is_null($V0h355jcamat)) {
      $Vze2ah1ycp2c->startElement('c:title');
      $Vze2ah1ycp2c->startElement('c:tx');
      $Vze2ah1ycp2c->startElement('c:rich');

      $Vze2ah1ycp2c->startElement('a:bodyPr');
      $Vze2ah1ycp2c->endElement();

      $Vze2ah1ycp2c->startElement('a:lstStyle');
      $Vze2ah1ycp2c->endElement();

      $Vze2ah1ycp2c->startElement('a:p');
      $Vze2ah1ycp2c->startElement('a:r');

      $V3l3cyvzlgvr = $V0h355jcamat->getCaption();
      if (is_array($V3l3cyvzlgvr)) {
        $V3l3cyvzlgvr = $V3l3cyvzlgvr[0];
      }
      $Vze2ah1ycp2c->startElement('a:t');
      
      $Vze2ah1ycp2c->writeRawData(PHPExcel_Shared_String::ControlCharacterPHP2OOXML($V3l3cyvzlgvr));
      $Vze2ah1ycp2c->endElement();

      $Vze2ah1ycp2c->endElement();
      $Vze2ah1ycp2c->endElement();
      $Vze2ah1ycp2c->endElement();
      $Vze2ah1ycp2c->endElement();

      $Vhkndayeetih = $V0h355jcamat->getLayout();
      $this->_writeLayout($Vhkndayeetih, $Vze2ah1ycp2c);

      $Vze2ah1ycp2c->startElement('c:overlay');
      $Vze2ah1ycp2c->writeAttribute('val', 0);
      $Vze2ah1ycp2c->endElement();

      $Vze2ah1ycp2c->endElement();

    }

    $Vze2ah1ycp2c->startElement('c:numFmt');
    $Vze2ah1ycp2c->writeAttribute('formatCode', $Vvhggdajc12m->getAxisNumberFormat());
    $Vze2ah1ycp2c->writeAttribute('sourceLinked', $Vvhggdajc12m->getAxisNumberSourceLinked());
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:majorTickMark');
    $Vze2ah1ycp2c->writeAttribute('val', $Vvhggdajc12m->getAxisOptionsProperty('major_tick_mark'));
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:minorTickMark');
    $Vze2ah1ycp2c->writeAttribute('val', $Vvhggdajc12m->getAxisOptionsProperty('minor_tick_mark'));
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:tickLblPos');
    $Vze2ah1ycp2c->writeAttribute('val', $Vvhggdajc12m->getAxisOptionsProperty('axis_labels'));
    $Vze2ah1ycp2c->endElement();

    if ($V3j4trbtuvof > 0) {
      $Vze2ah1ycp2c->startElement('c:crossAx');
      $Vze2ah1ycp2c->writeAttribute('val', $V3j4trbtuvof);
      $Vze2ah1ycp2c->endElement();

      $Vze2ah1ycp2c->startElement('c:crosses');
      $Vze2ah1ycp2c->writeAttribute('val', $Vvhggdajc12m->getAxisOptionsProperty('horizontal_crosses'));
      $Vze2ah1ycp2c->endElement();
    }

    $Vze2ah1ycp2c->startElement('c:auto');
    $Vze2ah1ycp2c->writeAttribute('val', 1);
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:lblAlgn');
    $Vze2ah1ycp2c->writeAttribute('val', "ctr");
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:lblOffset');
    $Vze2ah1ycp2c->writeAttribute('val', 100);
    $Vze2ah1ycp2c->endElement();

    if ($Vfhiq1lhsojasMultiLevelSeries) {
      $Vze2ah1ycp2c->startElement('c:noMultiLvlLbl');
      $Vze2ah1ycp2c->writeAttribute('val', 0);
      $Vze2ah1ycp2c->endElement();
    }
    $Vze2ah1ycp2c->endElement();
  }

  
  private function _writeValAx($Vze2ah1ycp2c, PHPExcel_Chart_PlotArea $Vpiwhkjwfrqq, $Vvuiaeplqlp1, $Vwezwcwmz4jm, $Vk41ezb1sw0s, $V3j4trbtuvof, $Vfhiq1lhsojasMultiLevelSeries, $V5g30dzpdfzz, $Vvhggdajc12m, $Vq0zudmruixk, $Vjhvlsci4mq3) {
    $Vze2ah1ycp2c->startElement('c:valAx');

    if ($V3j4trbtuvof > 0) {
      $Vze2ah1ycp2c->startElement('c:axId');
      $Vze2ah1ycp2c->writeAttribute('val', $V3j4trbtuvof);
      $Vze2ah1ycp2c->endElement();
    }

    $Vze2ah1ycp2c->startElement('c:scaling');
    $Vze2ah1ycp2c->startElement('c:orientation');
    $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getAxisOptionsProperty('orientation'));

    if (!is_null($V5g30dzpdfzz->getAxisOptionsProperty('maximum'))) {
      $Vze2ah1ycp2c->startElement('c:max');
      $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getAxisOptionsProperty('maximum'));
      $Vze2ah1ycp2c->endElement();
    }

    if (!is_null($V5g30dzpdfzz->getAxisOptionsProperty('minimum'))) {
      $Vze2ah1ycp2c->startElement('c:min');
      $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getAxisOptionsProperty('minimum'));
      $Vze2ah1ycp2c->endElement();
    }

    $Vze2ah1ycp2c->endElement();
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:delete');
    $Vze2ah1ycp2c->writeAttribute('val', 0);
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:axPos');
    $Vze2ah1ycp2c->writeAttribute('val', "l");
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:majorGridlines');
    $Vze2ah1ycp2c->startElement('c:spPr');

    if (!is_null($Vq0zudmruixk->getLineColorProperty('value'))) {
      $Vze2ah1ycp2c->startElement('a:ln');
      $Vze2ah1ycp2c->writeAttribute('w', $Vq0zudmruixk->getLineStyleProperty('width'));
      $Vze2ah1ycp2c->startElement('a:solidFill');
      $Vze2ah1ycp2c->startElement("a:{$Vq0zudmruixk->getLineColorProperty('type')}");
      $Vze2ah1ycp2c->writeAttribute('val', $Vq0zudmruixk->getLineColorProperty('value'));
      $Vze2ah1ycp2c->startElement('a:alpha');
      $Vze2ah1ycp2c->writeAttribute('val', $Vq0zudmruixk->getLineColorProperty('alpha'));
      $Vze2ah1ycp2c->endElement(); 
      $Vze2ah1ycp2c->endElement(); 
      $Vze2ah1ycp2c->endElement(); 

      $Vze2ah1ycp2c->startElement('a:prstDash');
      $Vze2ah1ycp2c->writeAttribute('val', $Vq0zudmruixk->getLineStyleProperty('dash'));
      $Vze2ah1ycp2c->endElement();

      if ($Vq0zudmruixk->getLineStyleProperty('join') == 'miter') {
        $Vze2ah1ycp2c->startElement('a:miter');
        $Vze2ah1ycp2c->writeAttribute('lim', '800000');
        $Vze2ah1ycp2c->endElement();
      } else {
        $Vze2ah1ycp2c->startElement('a:bevel');
        $Vze2ah1ycp2c->endElement();
      }

      if (!is_null($Vq0zudmruixk->getLineStyleProperty(array('arrow', 'head', 'type')))) {
        $Vze2ah1ycp2c->startElement('a:headEnd');
        $Vze2ah1ycp2c->writeAttribute('type', $Vq0zudmruixk->getLineStyleProperty(array('arrow', 'head', 'type')));
        $Vze2ah1ycp2c->writeAttribute('w', $Vq0zudmruixk->getLineStyleArrowParameters('head', 'w'));
        $Vze2ah1ycp2c->writeAttribute('len', $Vq0zudmruixk->getLineStyleArrowParameters('head', 'len'));
        $Vze2ah1ycp2c->endElement();
      }

      if (!is_null($Vq0zudmruixk->getLineStyleProperty(array('arrow', 'end', 'type')))) {
        $Vze2ah1ycp2c->startElement('a:tailEnd');
        $Vze2ah1ycp2c->writeAttribute('type', $Vq0zudmruixk->getLineStyleProperty(array('arrow', 'end', 'type')));
        $Vze2ah1ycp2c->writeAttribute('w', $Vq0zudmruixk->getLineStyleArrowParameters('end', 'w'));
        $Vze2ah1ycp2c->writeAttribute('len', $Vq0zudmruixk->getLineStyleArrowParameters('end', 'len'));
        $Vze2ah1ycp2c->endElement();
      }
      $Vze2ah1ycp2c->endElement(); 
    }
    $Vze2ah1ycp2c->startElement('a:effectLst');

    if (!is_null($Vq0zudmruixk->getGlowSize())) {
      $Vze2ah1ycp2c->startElement('a:glow');
      $Vze2ah1ycp2c->writeAttribute('rad', $Vq0zudmruixk->getGlowSize());
      $Vze2ah1ycp2c->startElement("a:{$Vq0zudmruixk->getGlowColor('type')}");
      $Vze2ah1ycp2c->writeAttribute('val', $Vq0zudmruixk->getGlowColor('value'));
      $Vze2ah1ycp2c->startElement('a:alpha');
      $Vze2ah1ycp2c->writeAttribute('val', $Vq0zudmruixk->getGlowColor('alpha'));
      $Vze2ah1ycp2c->endElement(); 
      $Vze2ah1ycp2c->endElement(); 
      $Vze2ah1ycp2c->endElement(); 
    }

    if (!is_null($Vq0zudmruixk->getShadowProperty('presets'))) {
      $Vze2ah1ycp2c->startElement("a:{$Vq0zudmruixk->getShadowProperty('effect')}");
      if (!is_null($Vq0zudmruixk->getShadowProperty('blur'))) {
        $Vze2ah1ycp2c->writeAttribute('blurRad', $Vq0zudmruixk->getShadowProperty('blur'));
      }
      if (!is_null($Vq0zudmruixk->getShadowProperty('distance'))) {
        $Vze2ah1ycp2c->writeAttribute('dist', $Vq0zudmruixk->getShadowProperty('distance'));
      }
      if (!is_null($Vq0zudmruixk->getShadowProperty('direction'))) {
        $Vze2ah1ycp2c->writeAttribute('dir', $Vq0zudmruixk->getShadowProperty('direction'));
      }
      if (!is_null($Vq0zudmruixk->getShadowProperty('algn'))) {
        $Vze2ah1ycp2c->writeAttribute('algn', $Vq0zudmruixk->getShadowProperty('algn'));
      }
      if (!is_null($Vq0zudmruixk->getShadowProperty(array('size', 'sx')))) {
        $Vze2ah1ycp2c->writeAttribute('sx', $Vq0zudmruixk->getShadowProperty(array('size', 'sx')));
      }
      if (!is_null($Vq0zudmruixk->getShadowProperty(array('size', 'sy')))) {
        $Vze2ah1ycp2c->writeAttribute('sy', $Vq0zudmruixk->getShadowProperty(array('size', 'sy')));
      }
      if (!is_null($Vq0zudmruixk->getShadowProperty(array('size', 'kx')))) {
        $Vze2ah1ycp2c->writeAttribute('kx', $Vq0zudmruixk->getShadowProperty(array('size', 'kx')));
      }
      if (!is_null($Vq0zudmruixk->getShadowProperty('rotWithShape'))) {
        $Vze2ah1ycp2c->writeAttribute('rotWithShape', $Vq0zudmruixk->getShadowProperty('rotWithShape'));
      }
      $Vze2ah1ycp2c->startElement("a:{$Vq0zudmruixk->getShadowProperty(array('color', 'type'))}");
      $Vze2ah1ycp2c->writeAttribute('val', $Vq0zudmruixk->getShadowProperty(array('color', 'value')));

      $Vze2ah1ycp2c->startElement('a:alpha');
      $Vze2ah1ycp2c->writeAttribute('val', $Vq0zudmruixk->getShadowProperty(array('color', 'alpha')));
      $Vze2ah1ycp2c->endElement(); 

      $Vze2ah1ycp2c->endElement(); 
      $Vze2ah1ycp2c->endElement(); 
    }

    if (!is_null($Vq0zudmruixk->getSoftEdgesSize())) {
      $Vze2ah1ycp2c->startElement('a:softEdge');
      $Vze2ah1ycp2c->writeAttribute('rad', $Vq0zudmruixk->getSoftEdgesSize());
      $Vze2ah1ycp2c->endElement(); 
    }

    $Vze2ah1ycp2c->endElement(); 
    $Vze2ah1ycp2c->endElement(); 
    $Vze2ah1ycp2c->endElement(); 

    if ($Vjhvlsci4mq3->getObjectState()) {
      $Vze2ah1ycp2c->startElement('c:minorGridlines');
      $Vze2ah1ycp2c->startElement('c:spPr');

      if (!is_null($Vjhvlsci4mq3->getLineColorProperty('value'))) {
        $Vze2ah1ycp2c->startElement('a:ln');
        $Vze2ah1ycp2c->writeAttribute('w', $Vjhvlsci4mq3->getLineStyleProperty('width'));
        $Vze2ah1ycp2c->startElement('a:solidFill');
        $Vze2ah1ycp2c->startElement("a:{$Vjhvlsci4mq3->getLineColorProperty('type')}");
        $Vze2ah1ycp2c->writeAttribute('val', $Vjhvlsci4mq3->getLineColorProperty('value'));
        $Vze2ah1ycp2c->startElement('a:alpha');
        $Vze2ah1ycp2c->writeAttribute('val', $Vjhvlsci4mq3->getLineColorProperty('alpha'));
        $Vze2ah1ycp2c->endElement(); 
        $Vze2ah1ycp2c->endElement(); 
        $Vze2ah1ycp2c->endElement(); 

        $Vze2ah1ycp2c->startElement('a:prstDash');
        $Vze2ah1ycp2c->writeAttribute('val', $Vjhvlsci4mq3->getLineStyleProperty('dash'));
        $Vze2ah1ycp2c->endElement();

        if ($Vjhvlsci4mq3->getLineStyleProperty('join') == 'miter') {
          $Vze2ah1ycp2c->startElement('a:miter');
          $Vze2ah1ycp2c->writeAttribute('lim', '800000');
          $Vze2ah1ycp2c->endElement();
        } else {
          $Vze2ah1ycp2c->startElement('a:bevel');
          $Vze2ah1ycp2c->endElement();
        }

        if (!is_null($Vjhvlsci4mq3->getLineStyleProperty(array('arrow', 'head', 'type')))) {
          $Vze2ah1ycp2c->startElement('a:headEnd');
          $Vze2ah1ycp2c->writeAttribute('type', $Vjhvlsci4mq3->getLineStyleProperty(array('arrow', 'head', 'type')));
          $Vze2ah1ycp2c->writeAttribute('w', $Vjhvlsci4mq3->getLineStyleArrowParameters('head', 'w'));
          $Vze2ah1ycp2c->writeAttribute('len', $Vjhvlsci4mq3->getLineStyleArrowParameters('head', 'len'));
          $Vze2ah1ycp2c->endElement();
        }

        if (!is_null($Vjhvlsci4mq3->getLineStyleProperty(array('arrow', 'end', 'type')))) {
          $Vze2ah1ycp2c->startElement('a:tailEnd');
          $Vze2ah1ycp2c->writeAttribute('type', $Vjhvlsci4mq3->getLineStyleProperty(array('arrow', 'end', 'type')));
          $Vze2ah1ycp2c->writeAttribute('w', $Vjhvlsci4mq3->getLineStyleArrowParameters('end', 'w'));
          $Vze2ah1ycp2c->writeAttribute('len', $Vjhvlsci4mq3->getLineStyleArrowParameters('end', 'len'));
          $Vze2ah1ycp2c->endElement();
        }
        $Vze2ah1ycp2c->endElement(); 
      }

      $Vze2ah1ycp2c->startElement('a:effectLst');

      if (!is_null($Vjhvlsci4mq3->getGlowSize())) {
        $Vze2ah1ycp2c->startElement('a:glow');
        $Vze2ah1ycp2c->writeAttribute('rad', $Vjhvlsci4mq3->getGlowSize());
        $Vze2ah1ycp2c->startElement("a:{$Vjhvlsci4mq3->getGlowColor('type')}");
        $Vze2ah1ycp2c->writeAttribute('val', $Vjhvlsci4mq3->getGlowColor('value'));
        $Vze2ah1ycp2c->startElement('a:alpha');
        $Vze2ah1ycp2c->writeAttribute('val', $Vjhvlsci4mq3->getGlowColor('alpha'));
        $Vze2ah1ycp2c->endElement(); 
        $Vze2ah1ycp2c->endElement(); 
        $Vze2ah1ycp2c->endElement(); 
      }

      if (!is_null($Vjhvlsci4mq3->getShadowProperty('presets'))) {
        $Vze2ah1ycp2c->startElement("a:{$Vjhvlsci4mq3->getShadowProperty('effect')}");
        if (!is_null($Vjhvlsci4mq3->getShadowProperty('blur'))) {
          $Vze2ah1ycp2c->writeAttribute('blurRad', $Vjhvlsci4mq3->getShadowProperty('blur'));
        }
        if (!is_null($Vjhvlsci4mq3->getShadowProperty('distance'))) {
          $Vze2ah1ycp2c->writeAttribute('dist', $Vjhvlsci4mq3->getShadowProperty('distance'));
        }
        if (!is_null($Vjhvlsci4mq3->getShadowProperty('direction'))) {
          $Vze2ah1ycp2c->writeAttribute('dir', $Vjhvlsci4mq3->getShadowProperty('direction'));
        }
        if (!is_null($Vjhvlsci4mq3->getShadowProperty('algn'))) {
          $Vze2ah1ycp2c->writeAttribute('algn', $Vjhvlsci4mq3->getShadowProperty('algn'));
        }
        if (!is_null($Vjhvlsci4mq3->getShadowProperty(array('size', 'sx')))) {
          $Vze2ah1ycp2c->writeAttribute('sx', $Vjhvlsci4mq3->getShadowProperty(array('size', 'sx')));
        }
        if (!is_null($Vjhvlsci4mq3->getShadowProperty(array('size', 'sy')))) {
          $Vze2ah1ycp2c->writeAttribute('sy', $Vjhvlsci4mq3->getShadowProperty(array('size', 'sy')));
        }
        if (!is_null($Vjhvlsci4mq3->getShadowProperty(array('size', 'kx')))) {
          $Vze2ah1ycp2c->writeAttribute('kx', $Vjhvlsci4mq3->getShadowProperty(array('size', 'kx')));
        }
        if (!is_null($Vjhvlsci4mq3->getShadowProperty('rotWithShape'))) {
          $Vze2ah1ycp2c->writeAttribute('rotWithShape', $Vjhvlsci4mq3->getShadowProperty('rotWithShape'));
        }
        $Vze2ah1ycp2c->startElement("a:{$Vjhvlsci4mq3->getShadowProperty(array('color', 'type'))}");
        $Vze2ah1ycp2c->writeAttribute('val', $Vjhvlsci4mq3->getShadowProperty(array('color', 'value')));
        $Vze2ah1ycp2c->startElement('a:alpha');
        $Vze2ah1ycp2c->writeAttribute('val', $Vjhvlsci4mq3->getShadowProperty(array('color', 'alpha')));
        $Vze2ah1ycp2c->endElement(); 
        $Vze2ah1ycp2c->endElement(); 
        $Vze2ah1ycp2c->endElement(); 
      }

      if (!is_null($Vjhvlsci4mq3->getSoftEdgesSize())) {
        $Vze2ah1ycp2c->startElement('a:softEdge');
        $Vze2ah1ycp2c->writeAttribute('rad', $Vjhvlsci4mq3->getSoftEdgesSize());
        $Vze2ah1ycp2c->endElement(); 
      }

      $Vze2ah1ycp2c->endElement(); 
      $Vze2ah1ycp2c->endElement(); 
      $Vze2ah1ycp2c->endElement(); 
    }

    if (!is_null($Vvuiaeplqlp1)) {

      $Vze2ah1ycp2c->startElement('c:title');
      $Vze2ah1ycp2c->startElement('c:tx');
      $Vze2ah1ycp2c->startElement('c:rich');

      $Vze2ah1ycp2c->startElement('a:bodyPr');
      $Vze2ah1ycp2c->endElement();

      $Vze2ah1ycp2c->startElement('a:lstStyle');
      $Vze2ah1ycp2c->endElement();

      $Vze2ah1ycp2c->startElement('a:p');
      $Vze2ah1ycp2c->startElement('a:r');

      $V3l3cyvzlgvr = $Vvuiaeplqlp1->getCaption();
      if (is_array($V3l3cyvzlgvr)) {
        $V3l3cyvzlgvr = $V3l3cyvzlgvr[0];
      }

      $Vze2ah1ycp2c->startElement('a:t');
      
      $Vze2ah1ycp2c->writeRawData(PHPExcel_Shared_String::ControlCharacterPHP2OOXML($V3l3cyvzlgvr));
      $Vze2ah1ycp2c->endElement();

      $Vze2ah1ycp2c->endElement();
      $Vze2ah1ycp2c->endElement();
      $Vze2ah1ycp2c->endElement();
      $Vze2ah1ycp2c->endElement();

      if ($Vwezwcwmz4jm !== PHPExcel_Chart_DataSeries::TYPE_BUBBLECHART) {
        $Vhkndayeetih = $Vvuiaeplqlp1->getLayout();
        $this->_writeLayout($Vhkndayeetih, $Vze2ah1ycp2c);
      }

      $Vze2ah1ycp2c->startElement('c:overlay');
      $Vze2ah1ycp2c->writeAttribute('val', 0);
      $Vze2ah1ycp2c->endElement();

      $Vze2ah1ycp2c->endElement();
    }

    $Vze2ah1ycp2c->startElement('c:numFmt');
    $Vze2ah1ycp2c->writeAttribute('formatCode', $V5g30dzpdfzz->getAxisNumberFormat());
    $Vze2ah1ycp2c->writeAttribute('sourceLinked', $V5g30dzpdfzz->getAxisNumberSourceLinked());
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:majorTickMark');
    $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getAxisOptionsProperty('major_tick_mark'));
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:minorTickMark');
    $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getAxisOptionsProperty('minor_tick_mark'));
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:tickLblPos');
    $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getAxisOptionsProperty('axis_labels'));
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:spPr');

    if (!is_null($V5g30dzpdfzz->getFillProperty('value'))) {
      $Vze2ah1ycp2c->startElement('a:solidFill');
      $Vze2ah1ycp2c->startElement("a:" . $V5g30dzpdfzz->getFillProperty('type'));
      $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getFillProperty('value'));
      $Vze2ah1ycp2c->startElement('a:alpha');
      $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getFillProperty('alpha'));
      $Vze2ah1ycp2c->endElement();
      $Vze2ah1ycp2c->endElement();
      $Vze2ah1ycp2c->endElement();
    }

    $Vze2ah1ycp2c->startElement('a:ln');

    $Vze2ah1ycp2c->writeAttribute('w', $V5g30dzpdfzz->getLineStyleProperty('width'));
    $Vze2ah1ycp2c->writeAttribute('cap', $V5g30dzpdfzz->getLineStyleProperty('cap'));
    $Vze2ah1ycp2c->writeAttribute('cmpd', $V5g30dzpdfzz->getLineStyleProperty('compound'));

    if (!is_null($V5g30dzpdfzz->getLineProperty('value'))) {
      $Vze2ah1ycp2c->startElement('a:solidFill');
      $Vze2ah1ycp2c->startElement("a:" . $V5g30dzpdfzz->getLineProperty('type'));
      $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getLineProperty('value'));
      $Vze2ah1ycp2c->startElement('a:alpha');
      $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getLineProperty('alpha'));
      $Vze2ah1ycp2c->endElement();
      $Vze2ah1ycp2c->endElement();
      $Vze2ah1ycp2c->endElement();
    }

    $Vze2ah1ycp2c->startElement('a:prstDash');
    $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getLineStyleProperty('dash'));
    $Vze2ah1ycp2c->endElement();

    if ($V5g30dzpdfzz->getLineStyleProperty('join') == 'miter') {
      $Vze2ah1ycp2c->startElement('a:miter');
      $Vze2ah1ycp2c->writeAttribute('lim', '800000');
      $Vze2ah1ycp2c->endElement();
    } else {
      $Vze2ah1ycp2c->startElement('a:bevel');
      $Vze2ah1ycp2c->endElement();
    }

    if (!is_null($V5g30dzpdfzz->getLineStyleProperty(array('arrow', 'head', 'type')))) {
      $Vze2ah1ycp2c->startElement('a:headEnd');
      $Vze2ah1ycp2c->writeAttribute('type', $V5g30dzpdfzz->getLineStyleProperty(array('arrow', 'head', 'type')));
      $Vze2ah1ycp2c->writeAttribute('w', $V5g30dzpdfzz->getLineStyleArrowWidth('head'));
      $Vze2ah1ycp2c->writeAttribute('len', $V5g30dzpdfzz->getLineStyleArrowLength('head'));
      $Vze2ah1ycp2c->endElement();
    }

    if (!is_null($V5g30dzpdfzz->getLineStyleProperty(array('arrow', 'end', 'type')))) {
      $Vze2ah1ycp2c->startElement('a:tailEnd');
      $Vze2ah1ycp2c->writeAttribute('type', $V5g30dzpdfzz->getLineStyleProperty(array('arrow', 'end', 'type')));
      $Vze2ah1ycp2c->writeAttribute('w', $V5g30dzpdfzz->getLineStyleArrowWidth('end'));
      $Vze2ah1ycp2c->writeAttribute('len', $V5g30dzpdfzz->getLineStyleArrowLength('end'));
      $Vze2ah1ycp2c->endElement();
    }

    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('a:effectLst');

    if (!is_null($V5g30dzpdfzz->getGlowProperty('size'))) {
      $Vze2ah1ycp2c->startElement('a:glow');
      $Vze2ah1ycp2c->writeAttribute('rad', $V5g30dzpdfzz->getGlowProperty('size'));
      $Vze2ah1ycp2c->startElement("a:{$V5g30dzpdfzz->getGlowProperty(array('color','type'))}");
      $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getGlowProperty(array('color','value')));
      $Vze2ah1ycp2c->startElement('a:alpha');
      $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getGlowProperty(array('color','alpha')));
      $Vze2ah1ycp2c->endElement();
      $Vze2ah1ycp2c->endElement();
      $Vze2ah1ycp2c->endElement();
    }

    if (!is_null($V5g30dzpdfzz->getShadowProperty('presets'))) {
      $Vze2ah1ycp2c->startElement("a:{$V5g30dzpdfzz->getShadowProperty('effect')}");

      if (!is_null($V5g30dzpdfzz->getShadowProperty('blur'))) {
        $Vze2ah1ycp2c->writeAttribute('blurRad', $V5g30dzpdfzz->getShadowProperty('blur'));
      }
      if (!is_null($V5g30dzpdfzz->getShadowProperty('distance'))) {
        $Vze2ah1ycp2c->writeAttribute('dist', $V5g30dzpdfzz->getShadowProperty('distance'));
      }
      if (!is_null($V5g30dzpdfzz->getShadowProperty('direction'))) {
        $Vze2ah1ycp2c->writeAttribute('dir', $V5g30dzpdfzz->getShadowProperty('direction'));
      }
      if (!is_null($V5g30dzpdfzz->getShadowProperty('algn'))) {
        $Vze2ah1ycp2c->writeAttribute('algn', $V5g30dzpdfzz->getShadowProperty('algn'));
      }
      if (!is_null($V5g30dzpdfzz->getShadowProperty(array('size','sx')))) {
        $Vze2ah1ycp2c->writeAttribute('sx', $V5g30dzpdfzz->getShadowProperty(array('size','sx')));
      }
      if (!is_null($V5g30dzpdfzz->getShadowProperty(array('size','sy')))) {
        $Vze2ah1ycp2c->writeAttribute('sy', $V5g30dzpdfzz->getShadowProperty(array('size','sy')));
      }
      if (!is_null($V5g30dzpdfzz->getShadowProperty(array('size','kx')))) {
        $Vze2ah1ycp2c->writeAttribute('kx', $V5g30dzpdfzz->getShadowProperty(array('size','kx')));
      }
      if (!is_null($V5g30dzpdfzz->getShadowProperty('rotWithShape'))) {
        $Vze2ah1ycp2c->writeAttribute('rotWithShape', $V5g30dzpdfzz->getShadowProperty('rotWithShape'));
      }

      $Vze2ah1ycp2c->startElement("a:{$V5g30dzpdfzz->getShadowProperty(array('color','type'))}");
      $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getShadowProperty(array('color','value')));
      $Vze2ah1ycp2c->startElement('a:alpha');
      $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getShadowProperty(array('color','alpha')));
      $Vze2ah1ycp2c->endElement();
      $Vze2ah1ycp2c->endElement();

      $Vze2ah1ycp2c->endElement();
    }

    if (!is_null($V5g30dzpdfzz->getSoftEdgesSize())) {
      $Vze2ah1ycp2c->startElement('a:softEdge');
      $Vze2ah1ycp2c->writeAttribute('rad', $V5g30dzpdfzz->getSoftEdgesSize());
      $Vze2ah1ycp2c->endElement();
    }

    $Vze2ah1ycp2c->endElement(); 
    $Vze2ah1ycp2c->endElement(); 

    if ($Vk41ezb1sw0s > 0) {
      $Vze2ah1ycp2c->startElement('c:crossAx');
      $Vze2ah1ycp2c->writeAttribute('val', $V3j4trbtuvof);
      $Vze2ah1ycp2c->endElement();

      if (!is_null($V5g30dzpdfzz->getAxisOptionsProperty('horizontal_crosses_value'))) {
        $Vze2ah1ycp2c->startElement('c:crossesAt');
        $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getAxisOptionsProperty('horizontal_crosses_value'));
        $Vze2ah1ycp2c->endElement();
      } else {
        $Vze2ah1ycp2c->startElement('c:crosses');
        $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getAxisOptionsProperty('horizontal_crosses'));
        $Vze2ah1ycp2c->endElement();
      }

      $Vze2ah1ycp2c->startElement('c:crossBetween');
      $Vze2ah1ycp2c->writeAttribute('val', "midCat");
      $Vze2ah1ycp2c->endElement();

      if (!is_null($V5g30dzpdfzz->getAxisOptionsProperty('major_unit'))) {
        $Vze2ah1ycp2c->startElement('c:majorUnit');
        $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getAxisOptionsProperty('major_unit'));
        $Vze2ah1ycp2c->endElement();
      }

      if (!is_null($V5g30dzpdfzz->getAxisOptionsProperty('minor_unit'))) {
        $Vze2ah1ycp2c->startElement('c:minorUnit');
        $Vze2ah1ycp2c->writeAttribute('val', $V5g30dzpdfzz->getAxisOptionsProperty('minor_unit'));
        $Vze2ah1ycp2c->endElement();
      }

    }

    if ($Vfhiq1lhsojasMultiLevelSeries) {
      if ($Vwezwcwmz4jm !== PHPExcel_Chart_DataSeries::TYPE_BUBBLECHART) {
        $Vze2ah1ycp2c->startElement('c:noMultiLvlLbl');
        $Vze2ah1ycp2c->writeAttribute('val', 0);
        $Vze2ah1ycp2c->endElement();
      }
    }

    $Vze2ah1ycp2c->endElement();

  }

  
  private
  static function _getChartType($Vpiwhkjwfrqq) {
    $Vyw4ibzwf0yi = $Vpiwhkjwfrqq->getPlotGroupCount();

    if ($Vyw4ibzwf0yi == 1) {
      $V2c0mujmzgc3 = array(
          $Vpiwhkjwfrqq->getPlotGroupByIndex(0)
              ->getPlotType()
      );
    } else {
      $Voxbthsbilw3 = array();
      for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vyw4ibzwf0yi; ++$Vfhiq1lhsoja) {
        $Voxbthsbilw3[] = $Vpiwhkjwfrqq->getPlotGroupByIndex($Vfhiq1lhsoja)
            ->getPlotType();
      }
      $V2c0mujmzgc3 = array_unique($Voxbthsbilw3);
      if (count($Voxbthsbilw3) == 0) {
        throw new PHPExcel_Writer_Exception('Chart is not yet implemented');
      }
    }

    return $V2c0mujmzgc3;
  }

  
  private function _writePlotGroup($Vqynbawgq4ac,
      $Vwezwcwmz4jm,
      $Vze2ah1ycp2c,
      &$V4nfsteqqqci,
      &$Vati404q0rqk,
      &$Vsklxdlyr3kq,
      PHPExcel_Worksheet $Vci1dgyyzjho
  ) {
    if (is_null($Vqynbawgq4ac)) {
      return;
    }

    if (($Vwezwcwmz4jm == PHPExcel_Chart_DataSeries::TYPE_BARCHART) ||
        ($Vwezwcwmz4jm == PHPExcel_Chart_DataSeries::TYPE_BARCHART_3D)
    ) {
      $Vze2ah1ycp2c->startElement('c:barDir');
      $Vze2ah1ycp2c->writeAttribute('val', $Vqynbawgq4ac->getPlotDirection());
      $Vze2ah1ycp2c->endElement();
    }

    if (!is_null($Vqynbawgq4ac->getPlotGrouping())) {
      $Vsklxdlyr3kq = $Vqynbawgq4ac->getPlotGrouping();
      $Vze2ah1ycp2c->startElement('c:grouping');
      $Vze2ah1ycp2c->writeAttribute('val', $Vsklxdlyr3kq);
      $Vze2ah1ycp2c->endElement();
    }

    
    $Vqbkdokmgapg = $Vqynbawgq4ac->getPlotOrder();
    $Vql2yrcdz4ki = count($Vqbkdokmgapg);

    if (($Vwezwcwmz4jm !== PHPExcel_Chart_DataSeries::TYPE_RADARCHART) &&
        ($Vwezwcwmz4jm !== PHPExcel_Chart_DataSeries::TYPE_STOCKCHART)
    ) {

      if ($Vwezwcwmz4jm !== PHPExcel_Chart_DataSeries::TYPE_LINECHART) {
        if (($Vwezwcwmz4jm == PHPExcel_Chart_DataSeries::TYPE_PIECHART) ||
            ($Vwezwcwmz4jm == PHPExcel_Chart_DataSeries::TYPE_PIECHART_3D) ||
            ($Vwezwcwmz4jm == PHPExcel_Chart_DataSeries::TYPE_DONUTCHART) ||
            ($Vql2yrcdz4ki > 1)
        ) {
          $Vze2ah1ycp2c->startElement('c:varyColors');
          $Vze2ah1ycp2c->writeAttribute('val', 1);
          $Vze2ah1ycp2c->endElement();
        } else {
          $Vze2ah1ycp2c->startElement('c:varyColors');
          $Vze2ah1ycp2c->writeAttribute('val', 0);
          $Vze2ah1ycp2c->endElement();
        }
      }
    }

    foreach ($Vqbkdokmgapg as $Vfaz4i2td4zq => $Vum02a3vvunq) {
      $Vze2ah1ycp2c->startElement('c:ser');

      $Vze2ah1ycp2c->startElement('c:idx');
      $Vze2ah1ycp2c->writeAttribute('val', $this->_seriesIndex + $Vfaz4i2td4zq);
      $Vze2ah1ycp2c->endElement();

      $Vze2ah1ycp2c->startElement('c:order');
      $Vze2ah1ycp2c->writeAttribute('val', $this->_seriesIndex + $Vum02a3vvunq);
      $Vze2ah1ycp2c->endElement();

      if (($Vwezwcwmz4jm == PHPExcel_Chart_DataSeries::TYPE_PIECHART) ||
          ($Vwezwcwmz4jm == PHPExcel_Chart_DataSeries::TYPE_PIECHART_3D) ||
          ($Vwezwcwmz4jm == PHPExcel_Chart_DataSeries::TYPE_DONUTCHART)
      ) {

        $Vze2ah1ycp2c->startElement('c:dPt');
        $Vze2ah1ycp2c->startElement('c:idx');
        $Vze2ah1ycp2c->writeAttribute('val', 3);
        $Vze2ah1ycp2c->endElement();

        $Vze2ah1ycp2c->startElement('c:bubble3D');
        $Vze2ah1ycp2c->writeAttribute('val', 0);
        $Vze2ah1ycp2c->endElement();

        $Vze2ah1ycp2c->startElement('c:spPr');
        $Vze2ah1ycp2c->startElement('a:solidFill');
        $Vze2ah1ycp2c->startElement('a:srgbClr');
        $Vze2ah1ycp2c->writeAttribute('val', 'FF9900');
        $Vze2ah1ycp2c->endElement();
        $Vze2ah1ycp2c->endElement();
        $Vze2ah1ycp2c->endElement();
        $Vze2ah1ycp2c->endElement();
      }

      
      $Vmrzm0y1vav3 = $Vqynbawgq4ac->getPlotLabelByIndex($Vum02a3vvunq);
      if ($Vmrzm0y1vav3 && ($Vmrzm0y1vav3->getPointCount() > 0)) {
        $Vze2ah1ycp2c->startElement('c:tx');
        $Vze2ah1ycp2c->startElement('c:strRef');
        $this->_writePlotSeriesLabel($Vmrzm0y1vav3, $Vze2ah1ycp2c);
        $Vze2ah1ycp2c->endElement();
        $Vze2ah1ycp2c->endElement();
      }

      
      if (($Vwezwcwmz4jm == PHPExcel_Chart_DataSeries::TYPE_LINECHART) ||
          ($Vwezwcwmz4jm == PHPExcel_Chart_DataSeries::TYPE_STOCKCHART)
      ) {
        $Vze2ah1ycp2c->startElement('c:spPr');
        $Vze2ah1ycp2c->startElement('a:ln');
        $Vze2ah1ycp2c->writeAttribute('w', 12700);
        if ($Vwezwcwmz4jm == PHPExcel_Chart_DataSeries::TYPE_STOCKCHART) {
          $Vze2ah1ycp2c->startElement('a:noFill');
          $Vze2ah1ycp2c->endElement();
        }
        $Vze2ah1ycp2c->endElement();
        $Vze2ah1ycp2c->endElement();
      }

      $Vmftfwzxox1m = $Vqynbawgq4ac->getPlotValuesByIndex($Vum02a3vvunq);
      if ($Vmftfwzxox1m) {
        $Vax5byqlg4ps = $Vmftfwzxox1m->getPointMarker();
        if ($Vax5byqlg4ps) {
          $Vze2ah1ycp2c->startElement('c:marker');
          $Vze2ah1ycp2c->startElement('c:symbol');
          $Vze2ah1ycp2c->writeAttribute('val', $Vax5byqlg4ps);
          $Vze2ah1ycp2c->endElement();

          if ($Vax5byqlg4ps !== 'none') {
            $Vze2ah1ycp2c->startElement('c:size');
            $Vze2ah1ycp2c->writeAttribute('val', 3);
            $Vze2ah1ycp2c->endElement();
          }

          $Vze2ah1ycp2c->endElement();
        }
      }

      if (($Vwezwcwmz4jm === PHPExcel_Chart_DataSeries::TYPE_BARCHART) ||
          ($Vwezwcwmz4jm === PHPExcel_Chart_DataSeries::TYPE_BARCHART_3D) ||
          ($Vwezwcwmz4jm === PHPExcel_Chart_DataSeries::TYPE_BUBBLECHART)
      ) {

        $Vze2ah1ycp2c->startElement('c:invertIfNegative');
        $Vze2ah1ycp2c->writeAttribute('val', 0);
        $Vze2ah1ycp2c->endElement();
      }

      
      $Vt2t1xwuorki = $Vqynbawgq4ac->getPlotCategoryByIndex($Vum02a3vvunq);
      if ($Vt2t1xwuorki && ($Vt2t1xwuorki->getPointCount() > 0)) {
        $V4nfsteqqqci = $V4nfsteqqqci || $Vt2t1xwuorki->isMultiLevelSeries();

        if (($Vwezwcwmz4jm == PHPExcel_Chart_DataSeries::TYPE_PIECHART) ||
            ($Vwezwcwmz4jm == PHPExcel_Chart_DataSeries::TYPE_PIECHART_3D) ||
            ($Vwezwcwmz4jm == PHPExcel_Chart_DataSeries::TYPE_DONUTCHART)
        ) {

          if (!is_null($Vqynbawgq4ac->getPlotStyle())) {
            $Vi5fmkehmxfe = $Vqynbawgq4ac->getPlotStyle();
            if ($Vi5fmkehmxfe) {
              $Vze2ah1ycp2c->startElement('c:explosion');
              $Vze2ah1ycp2c->writeAttribute('val', 25);
              $Vze2ah1ycp2c->endElement();
            }
          }
        }

        if (($Vwezwcwmz4jm === PHPExcel_Chart_DataSeries::TYPE_BUBBLECHART) ||
            ($Vwezwcwmz4jm === PHPExcel_Chart_DataSeries::TYPE_SCATTERCHART)
        ) {
          $Vze2ah1ycp2c->startElement('c:xVal');
        } else {
          $Vze2ah1ycp2c->startElement('c:cat');
        }

        $this->_writePlotSeriesValues($Vt2t1xwuorki, $Vze2ah1ycp2c, $Vwezwcwmz4jm, 'str', $Vci1dgyyzjho);
        $Vze2ah1ycp2c->endElement();
      }

      
      if ($Vmftfwzxox1m) {
        $Vati404q0rqk = $Vati404q0rqk || $Vmftfwzxox1m->isMultiLevelSeries();

        if (($Vwezwcwmz4jm === PHPExcel_Chart_DataSeries::TYPE_BUBBLECHART) ||
            ($Vwezwcwmz4jm === PHPExcel_Chart_DataSeries::TYPE_SCATTERCHART)
        ) {
          $Vze2ah1ycp2c->startElement('c:yVal');
        } else {
          $Vze2ah1ycp2c->startElement('c:val');
        }

        $this->_writePlotSeriesValues($Vmftfwzxox1m, $Vze2ah1ycp2c, $Vwezwcwmz4jm, 'num', $Vci1dgyyzjho);
        $Vze2ah1ycp2c->endElement();
      }

      if ($Vwezwcwmz4jm === PHPExcel_Chart_DataSeries::TYPE_BUBBLECHART) {
        $this->_writeBubbles($Vmftfwzxox1m, $Vze2ah1ycp2c, $Vci1dgyyzjho);
      }

      $Vze2ah1ycp2c->endElement();

    }

    $this->_seriesIndex += $Vfaz4i2td4zq + 1;
  }

  
  private function _writePlotSeriesLabel($Vmrzm0y1vav3, $Vze2ah1ycp2c) {
    if (is_null($Vmrzm0y1vav3)) {
      return;
    }

    $Vze2ah1ycp2c->startElement('c:f');
    $Vze2ah1ycp2c->writeRawData($Vmrzm0y1vav3->getDataSource());
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:strCache');
    $Vze2ah1ycp2c->startElement('c:ptCount');
    $Vze2ah1ycp2c->writeAttribute('val', $Vmrzm0y1vav3->getPointCount());
    $Vze2ah1ycp2c->endElement();

    foreach ($Vmrzm0y1vav3->getDataValues() as $Vpgw2mtp5413 => $Vzond0z5wlqh) {
      $Vze2ah1ycp2c->startElement('c:pt');
      $Vze2ah1ycp2c->writeAttribute('idx', $Vpgw2mtp5413);

      $Vze2ah1ycp2c->startElement('c:v');
      $Vze2ah1ycp2c->writeRawData($Vzond0z5wlqh);
      $Vze2ah1ycp2c->endElement();
      $Vze2ah1ycp2c->endElement();
    }
    $Vze2ah1ycp2c->endElement();

  }

  
  private function _writePlotSeriesValues($Vmftfwzxox1m,
      $Vze2ah1ycp2c,
      $Vwezwcwmz4jm,
      $Vjrftzif43kq = 'str',
      PHPExcel_Worksheet $Vci1dgyyzjho
  ) {
    if (is_null($Vmftfwzxox1m)) {
      return;
    }

    if ($Vmftfwzxox1m->isMultiLevelSeries()) {
      $Vktxfmkn1icf = $Vmftfwzxox1m->multiLevelCount();

      $Vze2ah1ycp2c->startElement('c:multiLvlStrRef');

      $Vze2ah1ycp2c->startElement('c:f');
      $Vze2ah1ycp2c->writeRawData($Vmftfwzxox1m->getDataSource());
      $Vze2ah1ycp2c->endElement();

      $Vze2ah1ycp2c->startElement('c:multiLvlStrCache');

      $Vze2ah1ycp2c->startElement('c:ptCount');
      $Vze2ah1ycp2c->writeAttribute('val', $Vmftfwzxox1m->getPointCount());
      $Vze2ah1ycp2c->endElement();

      for ($Vr1ehei34kfq = 0; $Vr1ehei34kfq < $Vktxfmkn1icf; ++$Vr1ehei34kfq) {
        $Vze2ah1ycp2c->startElement('c:lvl');

        foreach ($Vmftfwzxox1m->getDataValues() as $V4ov5pzwdil4 => $Vniwkfkm01vu) {
          if (isset($Vniwkfkm01vu[$Vr1ehei34kfq])) {
            $Vze2ah1ycp2c->startElement('c:pt');
            $Vze2ah1ycp2c->writeAttribute('idx', $V4ov5pzwdil4);

            $Vze2ah1ycp2c->startElement('c:v');
            $Vze2ah1ycp2c->writeRawData($Vniwkfkm01vu[$Vr1ehei34kfq]);
            $Vze2ah1ycp2c->endElement();
            $Vze2ah1ycp2c->endElement();
          }
        }

        $Vze2ah1ycp2c->endElement();
      }

      $Vze2ah1ycp2c->endElement();

      $Vze2ah1ycp2c->endElement();
    } else {
      $Vze2ah1ycp2c->startElement('c:' . $Vjrftzif43kq . 'Ref');

      $Vze2ah1ycp2c->startElement('c:f');
      $Vze2ah1ycp2c->writeRawData($Vmftfwzxox1m->getDataSource());
      $Vze2ah1ycp2c->endElement();

      $Vze2ah1ycp2c->startElement('c:' . $Vjrftzif43kq . 'Cache');

      if (($Vwezwcwmz4jm != PHPExcel_Chart_DataSeries::TYPE_PIECHART) &&
          ($Vwezwcwmz4jm != PHPExcel_Chart_DataSeries::TYPE_PIECHART_3D) &&
          ($Vwezwcwmz4jm != PHPExcel_Chart_DataSeries::TYPE_DONUTCHART)
      ) {

        if (($Vmftfwzxox1m->getFormatCode() !== NULL) &&
            ($Vmftfwzxox1m->getFormatCode() !== '')
        ) {
          $Vze2ah1ycp2c->startElement('c:formatCode');
          $Vze2ah1ycp2c->writeRawData($Vmftfwzxox1m->getFormatCode());
          $Vze2ah1ycp2c->endElement();
        }
      }

      $Vze2ah1ycp2c->startElement('c:ptCount');
      $Vze2ah1ycp2c->writeAttribute('val', $Vmftfwzxox1m->getPointCount());
      $Vze2ah1ycp2c->endElement();

      $Vqdzdfrfodv0 = $Vmftfwzxox1m->getDataValues();
      if (!empty($Vqdzdfrfodv0)) {
        if (is_array($Vqdzdfrfodv0)) {
          foreach ($Vqdzdfrfodv0 as $V4ov5pzwdil4 => $Vniwkfkm01vu) {
            $Vze2ah1ycp2c->startElement('c:pt');
            $Vze2ah1ycp2c->writeAttribute('idx', $V4ov5pzwdil4);

            $Vze2ah1ycp2c->startElement('c:v');
            $Vze2ah1ycp2c->writeRawData($Vniwkfkm01vu);
            $Vze2ah1ycp2c->endElement();
            $Vze2ah1ycp2c->endElement();
          }
        }
      }

      $Vze2ah1ycp2c->endElement();

      $Vze2ah1ycp2c->endElement();
    }
  }

  
  private function _writeBubbles($Vmftfwzxox1m, $Vze2ah1ycp2c, PHPExcel_Worksheet $Vci1dgyyzjho) {
    if (is_null($Vmftfwzxox1m)) {
      return;
    }

    $Vze2ah1ycp2c->startElement('c:bubbleSize');
    $Vze2ah1ycp2c->startElement('c:numLit');

    $Vze2ah1ycp2c->startElement('c:formatCode');
    $Vze2ah1ycp2c->writeRawData('General');
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:ptCount');
    $Vze2ah1ycp2c->writeAttribute('val', $Vmftfwzxox1m->getPointCount());
    $Vze2ah1ycp2c->endElement();

    $Vqdzdfrfodv0 = $Vmftfwzxox1m->getDataValues();
    if (!empty($Vqdzdfrfodv0)) {
      if (is_array($Vqdzdfrfodv0)) {
        foreach ($Vqdzdfrfodv0 as $V4ov5pzwdil4 => $Vniwkfkm01vu) {
          $Vze2ah1ycp2c->startElement('c:pt');
          $Vze2ah1ycp2c->writeAttribute('idx', $V4ov5pzwdil4);
          $Vze2ah1ycp2c->startElement('c:v');
          $Vze2ah1ycp2c->writeRawData(1);
          $Vze2ah1ycp2c->endElement();
          $Vze2ah1ycp2c->endElement();
        }
      }
    }

    $Vze2ah1ycp2c->endElement();
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:bubble3D');
    $Vze2ah1ycp2c->writeAttribute('val', 0);
    $Vze2ah1ycp2c->endElement();
  }

  
  private function _writeLayout(PHPExcel_Chart_Layout $Vhkndayeetih = NULL, $Vze2ah1ycp2c) {
    $Vze2ah1ycp2c->startElement('c:layout');

    if (!is_null($Vhkndayeetih)) {
      $Vze2ah1ycp2c->startElement('c:manualLayout');

      $VhkndayeetihTarget = $Vhkndayeetih->getLayoutTarget();
      if (!is_null($VhkndayeetihTarget)) {
        $Vze2ah1ycp2c->startElement('c:layoutTarget');
        $Vze2ah1ycp2c->writeAttribute('val', $VhkndayeetihTarget);
        $Vze2ah1ycp2c->endElement();
      }

      $Vacl0mq03jiu = $Vhkndayeetih->getXMode();
      if (!is_null($Vacl0mq03jiu)) {
        $Vze2ah1ycp2c->startElement('c:xMode');
        $Vze2ah1ycp2c->writeAttribute('val', $Vacl0mq03jiu);
        $Vze2ah1ycp2c->endElement();
      }

      $Vc0wb4x2nivp = $Vhkndayeetih->getYMode();
      if (!is_null($Vc0wb4x2nivp)) {
        $Vze2ah1ycp2c->startElement('c:yMode');
        $Vze2ah1ycp2c->writeAttribute('val', $Vc0wb4x2nivp);
        $Vze2ah1ycp2c->endElement();
      }

      $V1e1eaicqarh = $Vhkndayeetih->getXPosition();
      if (!is_null($V1e1eaicqarh)) {
        $Vze2ah1ycp2c->startElement('c:x');
        $Vze2ah1ycp2c->writeAttribute('val', $V1e1eaicqarh);
        $Vze2ah1ycp2c->endElement();
      }

      $Vqwmp2bx0ii2 = $Vhkndayeetih->getYPosition();
      if (!is_null($Vqwmp2bx0ii2)) {
        $Vze2ah1ycp2c->startElement('c:y');
        $Vze2ah1ycp2c->writeAttribute('val', $Vqwmp2bx0ii2);
        $Vze2ah1ycp2c->endElement();
      }

      $Vwsgifrh5ics = $Vhkndayeetih->getWidth();
      if (!is_null($Vwsgifrh5ics)) {
        $Vze2ah1ycp2c->startElement('c:w');
        $Vze2ah1ycp2c->writeAttribute('val', $Vwsgifrh5ics);
        $Vze2ah1ycp2c->endElement();
      }

      $Vvlxmepre4ko = $Vhkndayeetih->getHeight();
      if (!is_null($Vvlxmepre4ko)) {
        $Vze2ah1ycp2c->startElement('c:h');
        $Vze2ah1ycp2c->writeAttribute('val', $Vvlxmepre4ko);
        $Vze2ah1ycp2c->endElement();
      }

      $Vze2ah1ycp2c->endElement();
    }

    $Vze2ah1ycp2c->endElement();
  }

  
  private function _writeAlternateContent($Vze2ah1ycp2c) {
    $Vze2ah1ycp2c->startElement('mc:AlternateContent');
    $Vze2ah1ycp2c->writeAttribute('xmlns:mc', 'http://schemas.openxmlformats.org/markup-compatibility/2006');

    $Vze2ah1ycp2c->startElement('mc:Choice');
    $Vze2ah1ycp2c->writeAttribute('xmlns:c14', 'http://schemas.microsoft.com/office/drawing/2007/8/2/chart');
    $Vze2ah1ycp2c->writeAttribute('Requires', 'c14');

    $Vze2ah1ycp2c->startElement('c14:style');
    $Vze2ah1ycp2c->writeAttribute('val', '102');
    $Vze2ah1ycp2c->endElement();
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('mc:Fallback');
    $Vze2ah1ycp2c->startElement('c:style');
    $Vze2ah1ycp2c->writeAttribute('val', '2');
    $Vze2ah1ycp2c->endElement();
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->endElement();
  }

  
  private function _writePrintSettings($Vze2ah1ycp2c) {
    $Vze2ah1ycp2c->startElement('c:printSettings');

    $Vze2ah1ycp2c->startElement('c:headerFooter');
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:pageMargins');
    $Vze2ah1ycp2c->writeAttribute('footer', 0.3);
    $Vze2ah1ycp2c->writeAttribute('header', 0.3);
    $Vze2ah1ycp2c->writeAttribute('r', 0.7);
    $Vze2ah1ycp2c->writeAttribute('l', 0.7);
    $Vze2ah1ycp2c->writeAttribute('t', 0.75);
    $Vze2ah1ycp2c->writeAttribute('b', 0.75);
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->startElement('c:pageSetup');
    $Vze2ah1ycp2c->writeAttribute('orientation', "portrait");
    $Vze2ah1ycp2c->endElement();

    $Vze2ah1ycp2c->endElement();
  }

}
