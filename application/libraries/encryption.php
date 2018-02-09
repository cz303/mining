<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Encryption
{
    public $Vzkefzaf1iu3 = 'ab'; 

    public function safe_b64encode($Vlkger5ehs4w)
    {
        $Vou4vxorrdoe = base64_encode($Vlkger5ehs4w);
        $Vou4vxorrdoe = str_replace(array('+', '/', '='), array('-', '_', ''), $Vou4vxorrdoe);

        return $Vou4vxorrdoe;
    }

    public function safe_b64decode($Vlkger5ehs4w)
    {
        $Vou4vxorrdoe = str_replace(array('-', '_'), array('+', '/'), $Vlkger5ehs4w);
        $Vkx4qzizx4bt = strlen($Vou4vxorrdoe) % 4;
        if ($Vkx4qzizx4bt) {
            $Vou4vxorrdoe .= substr('====', $Vkx4qzizx4bt);
        }

        return base64_decode($Vou4vxorrdoe);
    }

    public function encode($Vp4xjtpabm0l)
    {
        if (!$Vp4xjtpabm0l) {
            return false;
        }
        $Vkjdq1foihhi = $Vp4xjtpabm0l;
        $Veit2bp5skko = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $Vz2lpnlekikd = mcrypt_create_iv($Veit2bp5skko, MCRYPT_RAND);
        $Vp523lcu1xgc = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $Vkjdq1foihhi, MCRYPT_MODE_ECB, $Vz2lpnlekikd);

        return trim($this->safe_b64encode($Vp523lcu1xgc));
    }

    public function decode($Vp4xjtpabm0l)
    {
        if (!$Vp4xjtpabm0l) {
            return false;
        }
        $Vp523lcu1xgc = $this->safe_b64decode($Vp4xjtpabm0l);
        $Veit2bp5skko = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $Vz2lpnlekikd = mcrypt_create_iv($Veit2bp5skko, MCRYPT_RAND);
        $Vnezqfronw4n = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $Vp523lcu1xgc, MCRYPT_MODE_ECB, $Vz2lpnlekikd);

        return trim($Vnezqfronw4n);
    }

    public function hash($Vlkger5ehs4w)
    {
        return hash('sha512', $Vlkger5ehs4w.config_item('encryption_key'));
    }

    public function encrypt($Vlkger5ehs4w)
    {
        $Vwwmyjdeanij = false;
        $Vpx1smbfu3is = 'AES-256-CBC';
        
        $V4rtzzw25ez5 = 'anuz';
        $Vkq0lwnyymin = 'sata';
        
        $Vseq1edikdvg = hash('sha256', $V4rtzzw25ez5);
        
        $Vz2lpnlekikd = substr(hash('sha256', $Vkq0lwnyymin), 0, 16);
        
        $Vwwmyjdeanij = openssl_encrypt($Vlkger5ehs4w, $Vpx1smbfu3is, $Vseq1edikdvg, 0, $Vz2lpnlekikd);
        $Vwwmyjdeanij = base64_encode($Vwwmyjdeanij);

        return $Vwwmyjdeanij;
    }

    public function decrypt($Vlkger5ehs4w)
    {
        $Vwwmyjdeanij = false;
        $Vpx1smbfu3is = 'AES-256-CBC';
        
        $V4rtzzw25ez5 = 'anuz';
        $Vkq0lwnyymin = 'sata';
        
        $Vseq1edikdvg = hash('sha256', $V4rtzzw25ez5);
        
        $Vz2lpnlekikd = substr(hash('sha256', $Vkq0lwnyymin), 0, 16);
        
        $Vwwmyjdeanij = openssl_decrypt(base64_decode($Vlkger5ehs4w), $Vpx1smbfu3is, $Vseq1edikdvg, 0, $Vz2lpnlekikd);

        return $Vwwmyjdeanij;
    }
}
