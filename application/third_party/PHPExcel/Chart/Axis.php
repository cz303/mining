<?php
require_once 'Properties.php';



class PHPExcel_Chart_Axis extends
  PHPExcel_Properties {

  

  private
      $Vwhs1bqfdxzt = array(
      'format' => self::FORMAT_CODE_GENERAL,
      'source_linked' => 1
  );

  

  private $V5bfcxcaqlvg = array(
      'minimum' => NULL,
      'maximum' => NULL,
      'major_unit' => NULL,
      'minor_unit' => NULL,
      'orientation' => self::ORIENTATION_NORMAL,
      'minor_tick_mark' => self::TICK_MARK_NONE,
      'major_tick_mark' => self::TICK_MARK_NONE,
      'axis_labels' => self::AXIS_LABELS_NEXT_TO,
      'horizontal_crosses' => self::HORIZONTAL_CROSSES_AUTOZERO,
      'horizontal_crosses_value' => NULL
  );

  

  private $V2as3kuwd30y = array(
      'type' => self::EXCEL_COLOR_TYPE_ARGB,
      'value' => NULL,
      'alpha' => 0
  );

  

  private $Vkzejwtotn2d = array(
      'type' => self::EXCEL_COLOR_TYPE_ARGB,
      'value' => NULL,
      'alpha' => 0
  );

  

  private $Vqbkpn3f1kyt = array(
      'width' => '9525',
      'compound' => self::LINE_STYLE_COMPOUND_SIMPLE,
      'dash' => self::LINE_STYLE_DASH_SOLID,
      'cap' => self::LINE_STYLE_CAP_FLAT,
      'join' => self::LINE_STYLE_JOIN_BEVEL,
      'arrow' => array(
          'head' => array(
              'type' => self::LINE_STYLE_ARROW_TYPE_NOARROW,
              'size' => self::LINE_STYLE_ARROW_SIZE_5
          ),
          'end' => array(
              'type' => self::LINE_STYLE_ARROW_TYPE_NOARROW,
              'size' => self::LINE_STYLE_ARROW_SIZE_8
          ),
      )
  );

  

  private $Vn0zxzfmbmhj = array(
      'presets' => self::SHADOW_PRESETS_NOSHADOW,
      'effect' => NULL,
      'color' => array(
          'type' => self::EXCEL_COLOR_TYPE_STANDARD,
          'value' => 'black',
          'alpha' => 40,
      ),
      'size' => array(
          'sx' => NULL,
          'sy' => NULL,
          'kx' => NULL
      ),
      'blur' => NULL,
      'direction' => NULL,
      'distance' => NULL,
      'algn' => NULL,
      'rotWithShape' => NULL
  );

  

  private $V45dcedcapve = array(
      'size' => NULL,
      'color' => array(
          'type' => self::EXCEL_COLOR_TYPE_STANDARD,
          'value' => 'black',
          'alpha' => 40
      )
  );

  

  private $Vjhexuw5ayad = array(
      'size' => NULL
  );

  

  public function setAxisNumberProperties($Vcug1cjtju3f) {
    $this->_axis_number['format'] = (string) $Vcug1cjtju3f;
    $this->_axis_number['source_linked'] = 0;
  }

  

  public function getAxisNumberFormat() {
    return $this->_axis_number['format'];
  }

  

  public function getAxisNumberSourceLinked() {
    return (string) $this->_axis_number['source_linked'];
  }

  

  public function setAxisOptionsProperties($V5ftuelxnlnc, $Vr5kn5jyoep2 = NULL, $Vk3lgauhan3y = NULL,
      $Vqpbtjkbw35r = NULL, $V51tdvqkfa1u = NULL, $Vgzw4eclycfg = NULL, $Vvw2e3m2exir = NULL, $V4y432f243km = NULL, $Vj1wz53prask = NULL,
      $Vpqpempp4p5f = NULL) {

    $this->_axis_options['axis_labels'] = (string) $V5ftuelxnlnc;
    ($Vr5kn5jyoep2 !== NULL)
        ? $this->_axis_options['horizontal_crosses_value'] = (string) $Vr5kn5jyoep2 : NULL;
    ($Vk3lgauhan3y !== NULL) ? $this->_axis_options['horizontal_crosses'] = (string) $Vk3lgauhan3y : NULL;
    ($Vqpbtjkbw35r !== NULL) ? $this->_axis_options['orientation'] = (string) $Vqpbtjkbw35r : NULL;
    ($V51tdvqkfa1u !== NULL) ? $this->_axis_options['major_tick_mark'] = (string) $V51tdvqkfa1u : NULL;
    ($Vgzw4eclycfg !== NULL) ? $this->_axis_options['minor_tick_mark'] = (string) $Vgzw4eclycfg : NULL;
    ($Vgzw4eclycfg !== NULL) ? $this->_axis_options['minor_tick_mark'] = (string) $Vgzw4eclycfg : NULL;
    ($Vvw2e3m2exir !== NULL) ? $this->_axis_options['minimum'] = (string) $Vvw2e3m2exir : NULL;
    ($V4y432f243km !== NULL) ? $this->_axis_options['maximum'] = (string) $V4y432f243km : NULL;
    ($Vj1wz53prask !== NULL) ? $this->_axis_options['major_unit'] = (string) $Vj1wz53prask : NULL;
    ($Vpqpempp4p5f !== NULL) ? $this->_axis_options['minor_unit'] = (string) $Vpqpempp4p5f : NULL;
  }

  

  public function getAxisOptionsProperty($Vp05lpnwyave) {
    return $this->_axis_options[$Vp05lpnwyave];
  }

  

  public function setAxisOrientation($Viltsyxewtah) {
    $this->orientation = (string) $Viltsyxewtah;
  }

  

  public function setFillParameters($Vl5jzlxo3j3n, $Vooexq0bqp2f = 0, $V4pigtpor0ln = self::EXCEL_COLOR_TYPE_ARGB) {
    $this->_fill_properties = $this->setColorProperties($Vl5jzlxo3j3n, $Vooexq0bqp2f, $V4pigtpor0ln);
  }

  

  public function setLineParameters($Vl5jzlxo3j3n, $Vooexq0bqp2f = 0, $V4pigtpor0ln = self::EXCEL_COLOR_TYPE_ARGB) {
    $this->_line_properties = $this->setColorProperties($Vl5jzlxo3j3n, $Vooexq0bqp2f, $V4pigtpor0ln);
  }

  

  public function getFillProperty($Vp05lpnwyave) {
    return $this->_fill_properties[$Vp05lpnwyave];
  }

  

  public function getLineProperty($Vp05lpnwyave) {
    return $this->_line_properties[$Vp05lpnwyave];
  }

  

  public function setLineStyleProperties($V0xqpecgdycr = NULL, $Vp3c3flwnv0u = NULL,
      $V1h5qn3s1gfv = NULL, $Vdsp4ypx23cj = NULL, $Vhln4f1rs3hy = NULL, $Vv3nq352wvdx = NULL,
      $V4y1yeyru1ne = NULL, $V0pvn2gk2wse = NULL, $V123v4j00qx5 = NULL) {

    (!is_null($V0xqpecgdycr)) ? $this->_line_style_properties['width'] = $this->getExcelPointsWidth((float) $V0xqpecgdycr)
        : NULL;
    (!is_null($Vp3c3flwnv0u)) ? $this->_line_style_properties['compound'] = (string) $Vp3c3flwnv0u : NULL;
    (!is_null($V1h5qn3s1gfv)) ? $this->_line_style_properties['dash'] = (string) $V1h5qn3s1gfv : NULL;
    (!is_null($Vdsp4ypx23cj)) ? $this->_line_style_properties['cap'] = (string) $Vdsp4ypx23cj : NULL;
    (!is_null($Vhln4f1rs3hy)) ? $this->_line_style_properties['join'] = (string) $Vhln4f1rs3hy : NULL;
    (!is_null($Vv3nq352wvdx)) ? $this->_line_style_properties['arrow']['head']['type'] = (string) $Vv3nq352wvdx
        : NULL;
    (!is_null($V4y1yeyru1ne)) ? $this->_line_style_properties['arrow']['head']['size'] = (string) $V4y1yeyru1ne
        : NULL;
    (!is_null($V0pvn2gk2wse)) ? $this->_line_style_properties['arrow']['end']['type'] = (string) $V0pvn2gk2wse
        : NULL;
    (!is_null($V123v4j00qx5)) ? $this->_line_style_properties['arrow']['end']['size'] = (string) $V123v4j00qx5
        : NULL;
  }

  

  public function getLineStyleProperty($Vqy5grnvvrgx) {
    return $this->getArrayElementsValue($this->_line_style_properties, $Vqy5grnvvrgx);
  }

  

  public function getLineStyleArrowWidth($Vxswj3nnzhsl) {
    return $this->getLineStyleArrowSize($this->_line_style_properties['arrow'][$Vxswj3nnzhsl]['size'], 'w');
  }

  

  public function getLineStyleArrowLength($Vxswj3nnzhsl) {
    return $this->getLineStyleArrowSize($this->_line_style_properties['arrow'][$Vxswj3nnzhsl]['size'], 'len');
  }

  

  public function setShadowProperties($V4ts0n4ynabo, $V3cabk0wi0u1 = NULL, $Vxof5fyd42ze = NULL, $V0ysi2akc23r = NULL, $Vzmkzs00casx = NULL, $Vjvlamt5k5i1 = NULL, $V5bytml2n40m = NULL) {
    $this
        ->_setShadowPresetsProperties((int) $V4ts0n4ynabo)
        ->_setShadowColor(
            is_null($V3cabk0wi0u1) ? $this->_shadow_properties['color']['value'] : $V3cabk0wi0u1
            , is_null($V0ysi2akc23r) ? (int) $this->_shadow_properties['color']['alpha'] : $V0ysi2akc23r
            , is_null($Vxof5fyd42ze) ? $this->_shadow_properties['color']['type'] : $Vxof5fyd42ze)
        ->_setShadowBlur($Vzmkzs00casx)
        ->_setShadowAngle($Vjvlamt5k5i1)
        ->_setShadowDistance($V5bytml2n40m);
  }

  

  private function _setShadowPresetsProperties($Vqwwhicklequ) {
    $this->_shadow_properties['presets'] = $Vqwwhicklequ;
    $this->_setShadowProperiesMapValues($this->getShadowPresetsMap($Vqwwhicklequ));

    return $this;
  }

  

  private function _setShadowProperiesMapValues(array $Vgudu5h34khj, &$V55wydy2lnue = NULL) {
    $Vynpptaqg1xf = $V55wydy2lnue;
    foreach ($Vgudu5h34khj as $Vp05lpnwyave_key => $Vp05lpnwyave_val) {
      if (is_array($Vp05lpnwyave_val)) {
        if ($V55wydy2lnue === NULL) {
          $V55wydy2lnue = & $this->_shadow_properties[$Vp05lpnwyave_key];
        } else {
          $V55wydy2lnue = & $V55wydy2lnue[$Vp05lpnwyave_key];
        }
        $this->_setShadowProperiesMapValues($Vp05lpnwyave_val, $V55wydy2lnue);
      } else {
        if ($Vynpptaqg1xf === NULL) {
          $this->_shadow_properties[$Vp05lpnwyave_key] = $Vp05lpnwyave_val;
        } else {
          $V55wydy2lnue[$Vp05lpnwyave_key] = $Vp05lpnwyave_val;
        }
      }
    }

    return $this;
  }

  

  private function _setShadowColor($Vl5jzlxo3j3n, $Vooexq0bqp2f, $V4pigtpor0ln) {
    $this->_shadow_properties['color'] = $this->setColorProperties($Vl5jzlxo3j3n, $Vooexq0bqp2f, $V4pigtpor0ln);

    return $this;
  }

  

  private function _setShadowBlur($V1xuhrxsnq5d) {
    if ($V1xuhrxsnq5d !== NULL) {
      $this->_shadow_properties['blur'] = (string) $this->getExcelPointsWidth($V1xuhrxsnq5d);
    }

    return $this;
  }

  

  private function _setShadowAngle($Vdbkfmikyl2i) {
    if ($Vdbkfmikyl2i !== NULL) {
      $this->_shadow_properties['direction'] = (string) $this->getExcelPointsAngle($Vdbkfmikyl2i);
    }

    return $this;
  }

  

  private function _setShadowDistance($Vubpnthjkeea) {
    if ($Vubpnthjkeea !== NULL) {
      $this->_shadow_properties['distance'] = (string) $this->getExcelPointsWidth($Vubpnthjkeea);
    }

    return $this;
  }

  

  public function getShadowProperty($Vqy5grnvvrgx) {
    return $this->getArrayElementsValue($this->_shadow_properties, $Vqy5grnvvrgx);
  }

  

  public function setGlowProperties($V4jbadwq4bzj, $Vl5jzlxo3j3n_value = NULL, $Vl5jzlxo3j3n_alpha = NULL, $Vl5jzlxo3j3n_type = NULL) {
    $this
        ->_setGlowSize($V4jbadwq4bzj)
        ->_setGlowColor(
            is_null($Vl5jzlxo3j3n_value) ? $this->_glow_properties['color']['value'] : $Vl5jzlxo3j3n_value
            , is_null($Vl5jzlxo3j3n_alpha) ? (int) $this->_glow_properties['color']['alpha'] : $Vl5jzlxo3j3n_alpha
            , is_null($Vl5jzlxo3j3n_type) ? $this->_glow_properties['color']['type'] : $Vl5jzlxo3j3n_type);
  }

  

  public function getGlowProperty($Vp05lpnwyave) {
    return $this->getArrayElementsValue($this->_glow_properties, $Vp05lpnwyave);
  }

  

  private function _setGlowSize($V4jbadwq4bzj) {
    if (!is_null($V4jbadwq4bzj)) {
      $this->_glow_properties['size'] = $this->getExcelPointsWidth($V4jbadwq4bzj);
    }

    return $this;
  }

  

  private function _setGlowColor($Vl5jzlxo3j3n, $Vooexq0bqp2f, $V4pigtpor0ln) {
    $this->_glow_properties['color'] = $this->setColorProperties($Vl5jzlxo3j3n, $Vooexq0bqp2f, $V4pigtpor0ln);

    return $this;
  }

  

  public function setSoftEdges($V4jbadwq4bzj) {
    if (!is_null($V4jbadwq4bzj)) {
      $Vjhexuw5ayad['size'] = (string) $this->getExcelPointsWidth($V4jbadwq4bzj);
    }
  }

  

  public function getSoftEdgesSize() {
    return $this->_soft_edges['size'];
  }
}