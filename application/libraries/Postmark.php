<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Postmark {

    
    var $Vat43blzpt4e;
    var $Vjooprgl2ckw = '';
    var $Vwzeoydam4sa = FALSE;
    var $Vuxc2nli2fax = FALSE;
    var $Velvztqbhbfb = FALSE;
    var $V02yuudyo4jq;
    var $V2rjv3g34ifh;
    var $Vshjvc5dmxwa;
    var $V1rzchyk4oty;
    var $Vgwen35zdo2u;
    var $Vd3xeynhc30o;
    var $Vsv3mystasbd;
    var $Vuqzpzqyw545;
    var $Vv0xkpewmmeb;
    var $Vpdxazfpfi4p;
    var $Vghu3a4a1ots;
    var $Vi0xg0pp4bh0;
    var $Vcokj4u5cmkh;
    var $Vdb3amziydec = array();

    
    function Postmark($Verlwfuqi3pq = array()) {
        $this->CI = & get_instance();

        if (count($Verlwfuqi3pq) > 0) {
            $this->initialize($Verlwfuqi3pq);
        }

        if ($this->develop == TRUE) {
            $this->api_key = 'POSTMARK_API_TEST';
        }

        log_message('debug', 'Postmark Class Initialized');
    }

    

    
    function initialize($Verlwfuqi3pq) {
        $this->clear();
        if (count($Verlwfuqi3pq) > 0) {
            foreach ($Verlwfuqi3pq as $Vseq1edikdvg => $Vp4xjtpabm0l) {
                if (isset($this->$Vseq1edikdvg)) {
                    $this->$Vseq1edikdvg = $Vp4xjtpabm0l;
                }
            }
        }
    }

    

    
    function clear() {

        $this->from_name = '';
        $this->from_address = '';

        $this->_to_name = '';
        $this->_to_address = '';

        $this->_cc_name = '';
        $this->_cc_address = '';

        $this->_subject = '';
        $this->_message_plain = '';
        $this->_message_html = '';

        $this->_tag = '';

        $this->_resourcements = array();
    }

    

    
    function from($Vldi4no4khge, $Vcvluzjs3wzb = null) {

        if (!$this->validation == TRUE) {
            $this->from_address = $Vldi4no4khge;
            $this->from_name = $Vcvluzjs3wzb;
        } else {
            if ($this->_validate_email($Vldi4no4khge)) {
                $this->from_address = $Vldi4no4khge;
                $this->from_name = $Vcvluzjs3wzb;
            } else {
                show_error('You have entered an invalid sender address.');
            }
        }
    }

    

    
    function to($Vldi4no4khge, $Vcvluzjs3wzb = null) {

        if (!$this->validation == TRUE) {
            $this->_to_address = $Vldi4no4khge;
            $this->_to_name = $Vcvluzjs3wzb;
        } else {
            if ($this->_validate_email($Vldi4no4khge)) {
                $this->_to_address = $Vldi4no4khge;
                $this->_to_name = $Vcvluzjs3wzb;
            } else {
                show_error('You have entered an invalid recipient address.');
            }
        }
    }

    

    
    function reply_to($Vldi4no4khge, $Vcvluzjs3wzb = null) {

        if (!$this->validation == TRUE) {
            $this->_reply_to_address = $Vldi4no4khge;
            $this->_reply_to_name = $Vcvluzjs3wzb;
        } else {
            if ($this->_validate_email($Vldi4no4khge)) {
                $this->_reply_to_address = $Vldi4no4khge;
                $this->_reply_to_name = $Vcvluzjs3wzb;
            } else {
                show_error('You have entered an invalid reply to address.');
            }
        }
    }

    

    
    function cc($Vldi4no4khge, $Vcvluzjs3wzb = null) {

        if (!$this->validation == TRUE) {
            $this->_cc_address = $Vldi4no4khge;
            $this->_cc_name = $Vcvluzjs3wzb;
        } else {
            if ($this->_validate_email($Vldi4no4khge)) {
                $this->_cc_address = $Vldi4no4khge;
                $this->_cc_name = $Vcvluzjs3wzb;
            } else {
                show_error('You have entered an invalid recipient address.');
            }
        }
    }

    

    
    function bcc($Vldi4no4khge) {

        if (!$this->validation == TRUE) {
            $this->_bcc_address = $Vldi4no4khge;
        } else {
            if ($this->_validate_email($Vldi4no4khge)) {
                $this->_bcc_address = $Vldi4no4khge;
            } else {
                show_error('You have entered an invalid recipient address.');
            }
        }
    }

    

    
    function subject($Vld5fbk2n1id) {
        $this->_subject = $Vld5fbk2n1id;
    }

    

    
    function tag($Vhiuc0dwei5b) {
        $this->_tag = $Vhiuc0dwei5b;
    }

    

    
    function message_plain($Vb0xezrtkohj) {
        if (!$this->strip_html) {
            $this->_message_plain = $Vb0xezrtkohj;
        } else {
            $this->_message_plain = $this->_strip_html($Vb0xezrtkohj);
        }
    }

    

    
    function message_html($Vb0xezrtkohj) {
        $this->_message_html = $Vb0xezrtkohj;
    }

    

    
    function resource($Vg5mhfl1beoi, $Vg5mhfl1beoiname = FALSE) {
        $Vg5mhfl1beoisize = filesize($Vg5mhfl1beoi) + 1;
        if (!$Vte5rlrg50fv = fopen($Vg5mhfl1beoi, FOPEN_READ)) {
            return FALSE;
        }

        $Vuodfnw5ilgc = chunk_split(base64_encode(fread($Vte5rlrg50fv, $Vg5mhfl1beoisize)));
        fclose($Vte5rlrg50fv);

        if (!$Vg5mhfl1beoiname)
            $Vg5mhfl1beoiname = end(explode('/', $Vg5mhfl1beoi));

        $this->_resourcements[] = array(
            'Name' => $Vg5mhfl1beoiname,
            'Content' => $Vuodfnw5ilgc,
            'ContentType' => $this->_mime_types(end(explode('.', basename($Vg5mhfl1beoiname))))
        );

        return TRUE;
    }

    
    
    function _prepare_data() {
        $Vou4vxorrdoe = array();
        $Vou4vxorrdoe['Subject'] = $this->_subject;

        $Vou4vxorrdoe['From'] = is_null($this->from_name) ? $this->from_address : "{$this->from_name} <{$this->from_address}>";
        $Vou4vxorrdoe['To'] = is_null($this->_to_name) ? $this->_to_address : "{$this->_to_name} <{$this->_to_address}>";

        if (!is_null($this->_cc_address) && ($this->_cc_address != '')) {
            $Vou4vxorrdoe['Cc'] = is_null($this->_cc_name) ? $this->_cc_address : "{$this->_cc_name} <{$this->_cc_address}>";
        }

        if (!is_null($this->_bcc_address) && ($this->_bcc_address != '')) {
            $Vou4vxorrdoe['Bcc'] = $this->_bcc_address;
        }

        if (!is_null($this->_reply_to_address) && ($this->_reply_to_address != '')) {
            $Vou4vxorrdoe['ReplyTo'] = is_null($this->_reply_to_name) ? $this->_reply_to_address : "{$this->_reply_to_name} <{$this->_reply_to_address}>";
        }

        if (!is_null($this->_tag) && ($this->_tag != '')) {
            $Vou4vxorrdoe['tag'] = $this->_tag;
        }

        if (!is_null($this->_message_html)) {
            $Vou4vxorrdoe['HtmlBody'] = $this->_message_html;
        }

        if (!is_null($this->_message_plain)) {
            $Vou4vxorrdoe['TextBody'] = $this->_message_plain;
        }

        if (count($this->_resourcements) > 0) {
            $Vou4vxorrdoe['resourcements'] = $this->_resourcements;
        }

        return $Vou4vxorrdoe;
    }

    function send($V2rjv3g34ifh = null, $V02yuudyo4jq = null, $Vhktfi5g5m4u = null, $Vdmiarkc3nkl = null, $Vld5fbk2n1id = null, $Vb0xezrtkohj_plain = null, $Vb0xezrtkohj_html = null, $Vmmgjzntolky = FALSE) {

        if (!function_exists('curl_init')) {

            if (function_exists('log_message')) {
                log_message('error', 'Postmark - PHP was not built with cURL enabled. Rebuild PHP with --with-curl to use cURL.');
            }

            return false;
        }

        if (!is_null($V2rjv3g34ifh))
            $this->from($V2rjv3g34ifh, $V02yuudyo4jq);
        if (!is_null($Vhktfi5g5m4u))
            $this->to($Vhktfi5g5m4u, $Vdmiarkc3nkl);
        if (!is_null($Vld5fbk2n1id))
            $this->subject($Vld5fbk2n1id);
        if (!is_null($Vb0xezrtkohj_plain))
            $this->message_plain($Vb0xezrtkohj_plain);
        if (!is_null($Vb0xezrtkohj_html))
            $this->message_html($Vb0xezrtkohj_html);

        if (is_null($this->api_key)) {
            show_error("Postmark API key is not set!");
        }

        if (is_null($this->from_address)) {
            show_error("From address is not set!");
        }

        if (is_null($this->_to_address)) {
            show_error("To address is not set!");
        }

        if (is_null($this->_subject)) {
            show_error("Subject is not set!");
        }

        if (is_null($this->_message_plain) && is_null($this->_message_html)) {
            show_error("Please either set plain message, HTML message or both!");
        }

        $V05fakgrfom2 = json_encode($this->_prepare_data());

        $Vyhzu2zcmowo = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'X-Postmark-Server-Token: ' . $this->api_key
        );

        $Vaqz3fhdbceh = curl_init();
        curl_setopt($Vaqz3fhdbceh, CURLOPT_URL, 'http://api.postmarkapp.com/email');
        curl_setopt($Vaqz3fhdbceh, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($Vaqz3fhdbceh, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($Vaqz3fhdbceh, CURLOPT_POSTFIELDS, $V05fakgrfom2);
        curl_setopt($Vaqz3fhdbceh, CURLOPT_HTTPHEADER, $Vyhzu2zcmowo);

        $Vzkx1jexxiod = curl_exec($Vaqz3fhdbceh);
        log_message('debug', 'POSTMARK JSON: ' . $V05fakgrfom2 . "\nHeaders: \n\t" . implode("\n\t", $Vyhzu2zcmowo) . "\nReturn:\n$Vzkx1jexxiod");

        if (curl_error($Vaqz3fhdbceh) != '') {
            show_error(curl_error($Vaqz3fhdbceh));
        }

        $Vyniltosotl5 = curl_getinfo($Vaqz3fhdbceh, CURLINFO_HTTP_CODE);
        log_message('debug', 'POSTMARK http code:' . $Vyniltosotl5);

        if ((intval($Vyniltosotl5 / 100) != 2) AND $Vmmgjzntolky) {
            $Vb0xezrtkohj = json_decode($Vzkx1jexxiod)->Message;
            show_error('Error while mailing. Postmark returned HTTP code ' . $Vyniltosotl5 . ' with message "' . $Vb0xezrtkohj . '"');
        }
    }

    

    
    function _validate_email($Vldi4no4khge) {
        $Vldi4no4khgees = explode(',', $Vldi4no4khge);

        foreach ($Vldi4no4khgees as $V51lf1kcbto4 => $Vf1kwqxxhqpz) {
            if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", trim($Vf1kwqxxhqpz))) {
                return FALSE;
            }
        }

        return TRUE;
    }

    

    
    function _strip_html($Vb0xezrtkohj) {
        $Vb0xezrtkohj = preg_replace('/\<br(\s*)?\/?\>/i', "\n", $Vb0xezrtkohj);
        return strip_tags($Vb0xezrtkohj);
    }

    

    
    function _mime_types($Vlm5xu0g5cn3 = "") {
        $Vpey1asyfhpq = array('hqx' => 'application/mac-binhex40',
            'cpt' => 'application/mac-compactpro',
            'doc' => 'application/msword',
            'bin' => 'application/macbinary',
            'dms' => 'application/octet-stream',
            'lha' => 'application/octet-stream',
            'lzh' => 'application/octet-stream',
            'exe' => 'application/octet-stream',
            'class' => 'application/octet-stream',
            'psd' => 'application/octet-stream',
            'so' => 'application/octet-stream',
            'sea' => 'application/octet-stream',
            'dll' => 'application/octet-stream',
            'oda' => 'application/oda',
            'pdf' => 'application/pdf',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',
            'smi' => 'application/smil',
            'smil' => 'application/smil',
            'mif' => 'application/vnd.mif',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',
            'wbxml' => 'application/vnd.wap.wbxml',
            'wmlc' => 'application/vnd.wap.wmlc',
            'dcr' => 'application/x-director',
            'dir' => 'application/x-director',
            'dxr' => 'application/x-director',
            'dvi' => 'application/x-dvi',
            'gtar' => 'application/x-gtar',
            'php' => 'application/x-httpd-php',
            'php4' => 'application/x-httpd-php',
            'php3' => 'application/x-httpd-php',
            'phtml' => 'application/x-httpd-php',
            'phps' => 'application/x-httpd-php-source',
            'js' => 'application/x-javascript',
            'swf' => 'application/x-shockwave-flash',
            'sit' => 'application/x-stuffit',
            'tar' => 'application/x-tar',
            'tgz' => 'application/x-tar',
            'xhtml' => 'application/xhtml+xml',
            'xht' => 'application/xhtml+xml',
            'zip' => 'application/zip',
            'mid' => 'audio/midi',
            'midi' => 'audio/midi',
            'mpga' => 'audio/mpeg',
            'mp2' => 'audio/mpeg',
            'mp3' => 'audio/mpeg',
            'aif' => 'audio/x-aiff',
            'aiff' => 'audio/x-aiff',
            'aifc' => 'audio/x-aiff',
            'ram' => 'audio/x-pn-realaudio',
            'rm' => 'audio/x-pn-realaudio',
            'rpm' => 'audio/x-pn-realaudio-plugin',
            'ra' => 'audio/x-realaudio',
            'rv' => 'video/vnd.rn-realvideo',
            'wav' => 'audio/x-wav',
            'bmp' => 'image/bmp',
            'gif' => 'image/gif',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'jpe' => 'image/jpeg',
            'png' => 'image/png',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'css' => 'text/css',
            'html' => 'text/html',
            'htm' => 'text/html',
            'shtml' => 'text/html',
            'txt' => 'text/plain',
            'text' => 'text/plain',
            'log' => 'text/plain',
            'rtx' => 'text/richtext',
            'rtf' => 'text/rtf',
            'xml' => 'text/xml',
            'xsl' => 'text/xml',
            'mpeg' => 'video/mpeg',
            'mpg' => 'video/mpeg',
            'mpe' => 'video/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',
            'avi' => 'video/x-msvideo',
            'movie' => 'video/x-sgi-movie',
            'word' => 'application/msword',
            'xl' => 'application/excel',
            'eml' => 'message/rfc822'
        );

        return (!isset($Vpey1asyfhpq[strtolower($Vlm5xu0g5cn3)])) ? "application/x-unknown-content-type" : $Vpey1asyfhpq[strtolower($Vlm5xu0g5cn3)];
    }

}
