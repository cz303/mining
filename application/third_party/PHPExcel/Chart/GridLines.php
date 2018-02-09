<?php
require_once 'Properties.php';


class PHPExcel_Chart_GridLines extends
  PHPExcel_Properties {

  

  private
      $V1wvyljcuguy = FALSE,
      $Vkzejwtotn2d = array(
          'color' => array(
              'type' => self::EXCEL_COLOR_TYPE_STANDARD,
              'value' => NULL,
              'alpha' => 0
          ),
          'style' => array(
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
          )
      ),
      $Vn0zxzfmbmhj = array(
          'presets' => self::SHADOW_PRESETS_NOSHADOW,
          'effect' => NULL,
          'color' => array(
              'type' => self::EXCEL_COLOR_TYPE_STANDARD,
              'value' => 'black',
              'alpha' => 85,
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
      ),
      $V45dcedcapve = array(
          'size' => NULL,
          'color' => array(
              'type' => self::EXCEL_COLOR_TYPE_STANDARD,
              'value' => 'black',
              'alpha' => 40
          )
      ),
      $Vjhexuw5ayad = array(
          'size' => NULL
      );

  

  public function getObjectState() {
    return $this->_object_state;
  }

  

  private function _activateObject() {
    $this->_object_state = TRUE;

    return $this;
  }

  

  public function setLineColorProperties($Vp4xjtpabm0l, $Vooexq0bqp2f = 0, $V4pigtpor0ln = self::EXCEL_COLOR_TYPE_STANDARD) {
    $this
        ->_activateObject()
        ->_line_properties['color'] = $this->setColorProperties(
        $Vp4xjtpabm0l,
        $Vooexq0bqp2f,
        $V4pigtpor0ln);
  }

  

  public function setLineStyleProperties($V0xqpecgdycr = NULL, $Vp3c3flwnv0u = NULL, $V1h5qn3s1gfv = NULL, $Vdsp4ypx23cj = NULL, $Vhln4f1rs3hy = NULL, $Vv3nq352wvdx = NULL, $V4y1yeyru1ne = NULL, $V0pvn2gk2wse = NULL, $V123v4j00qx5 = NULL) {
    $this->_activateObject();
    (!is_null($V0xqpecgdycr))
        ? $this->_line_properties['style']['width'] = $this->getExcelPointsWidth((float) $V0xqpecgdycr)
        : NULL;
    (!is_null($Vp3c3flwnv0u))
        ? $this->_line_properties['style']['compound'] = (string) $Vp3c3flwnv0u
        : NULL;
    (!is_null($V1h5qn3s1gfv))
        ? $this->_line_properties['style']['dash'] = (string) $V1h5qn3s1gfv
        : NULL;
    (!is_null($Vdsp4ypx23cj))
        ? $this->_line_properties['style']['cap'] = (string) $Vdsp4ypx23cj
        : NULL;
    (!is_null($Vhln4f1rs3hy))
        ? $this->_line_properties['style']['join'] = (string) $Vhln4f1rs3hy
        : NULL;
    (!is_null($Vv3nq352wvdx))
        ? $this->_line_properties['style']['arrow']['head']['type'] = (string) $Vv3nq352wvdx
        : NULL;
    (!is_null($V4y1yeyru1ne))
        ? $this->_line_properties['style']['arrow']['head']['size'] = (string) $V4y1yeyru1ne
        : NULL;
    (!is_null($V0pvn2gk2wse))
        ? $this->_line_properties['style']['arrow']['end']['type'] = (string) $V0pvn2gk2wse
        : NULL;
    (!is_null($V123v4j00qx5))
        ? $this->_line_properties['style']['arrow']['end']['size'] = (string) $V123v4j00qx5
        : NULL;
  }

  

  public function getLineColorProperty($Ved5bcofs21d) {
    return $this->_line_properties['color'][$Ved5bcofs21d];
  }

  

  public function getLineStyleProperty($Vqy5grnvvrgx) {
    return $this->getArrayElementsValue($this->_line_properties['style'], $Vqy5grnvvrgx);
  }

  

  public function setGlowProperties($V4jbadwq4bzj, $V0qy5jwjghcu = NULL, $Vx0jvuk5yt2k = NULL, $V1iuenpcxidd = NULL) {
    $this
        ->_activateObject()
        ->_setGlowSize($V4jbadwq4bzj)
        ->_setGlowColor($V0qy5jwjghcu, $Vx0jvuk5yt2k, $V1iuenpcxidd);
  }

  

  public function getGlowColor($Vp05lpnwyave) {
    return $this->_glow_properties['color'][$Vp05lpnwyave];
  }

  

  public function getGlowSize() {
    return $this->_glow_properties['size'];
  }

  

  private function _setGlowSize($V4jbadwq4bzj) {
    $this->_glow_properties['size'] = $this->getExcelPointsWidth((float) $V4jbadwq4bzj);

    return $this;
  }

  

  private function _setGlowColor($Vl5jzlxo3j3n, $Vooexq0bqp2f, $V4pigtpor0ln) {
    if (!is_null($Vl5jzlxo3j3n)) {
      $this->_glow_properties['color']['value'] = (string) $Vl5jzlxo3j3n;
    }
    if (!is_null($Vooexq0bqp2f)) {
      $this->_glow_properties['color']['alpha'] = $this->getTrueAlpha((int) $Vooexq0bqp2f);
    }
    if (!is_null($V4pigtpor0ln)) {
      $this->_glow_properties['color']['type'] = (string) $V4pigtpor0ln;
    }

    return $this;
  }

  

  public function getLineStyleArrowParameters($Vsd2bjixv0oi, $Vp05lpnwyave_selector) {
    return $this->getLineStyleArrowSize($this->_line_properties['style']['arrow'][$Vsd2bjixv0oi]['size'], $Vp05lpnwyave_selector);
  }

  

  public function setShadowProperties($V4ts0n4ynabo, $V3cabk0wi0u1 = NULL, $Vxof5fyd42ze = NULL, $V0ysi2akc23r = NULL, $Vzmkzs00casx = NULL, $Vjvlamt5k5i1 = NULL, $V5bytml2n40m = NULL) {
    $this
        ->_activateObject()
        ->_setShadowPresetsProperties((int) $V4ts0n4ynabo)
        ->_setShadowColor(
            is_null($V3cabk0wi0u1) ? $this->_shadow_properties['color']['value'] : $V3cabk0wi0u1
            , is_null($V0ysi2akc23r) ? (int) $this->_shadow_properties['color']['alpha']
                : $this->getTrueAlpha($V0ysi2akc23r)
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
    if (!is_null($Vl5jzlxo3j3n)) {
      $this->_shadow_properties['color']['value'] = (string) $Vl5jzlxo3j3n;
    }
    if (!is_null($Vooexq0bqp2f)) {
      $this->_shadow_properties['color']['alpha'] = $this->getTrueAlpha((int) $Vooexq0bqp2f);
    }
    if (!is_null($V4pigtpor0ln)) {
      $this->_shadow_properties['color']['type'] = (string) $V4pigtpor0ln;
    }

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

  

  public function setSoftEdgesSize($V4jbadwq4bzj) {
    if (!is_null($V4jbadwq4bzj)) {
      $this->_activateObject();
      $Vjhexuw5ayad['size'] = (string) $this->getExcelPointsWidth($V4jbadwq4bzj);
    }
  }

  

  public function getSoftEdgesSize() {
    return $this->_soft_edges['size'];
  }
}