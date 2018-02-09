<?php


























  
  if (!defined('PCLZIP_READ_BLOCK_SIZE')) {
    define( 'PCLZIP_READ_BLOCK_SIZE', 2048 );
  }
  
  
  
  
  
  
  
  
  
  
  
  if (!defined('PCLZIP_SEPARATOR')) {
    define( 'PCLZIP_SEPARATOR', ',' );
  }

  
  
  
  
  
  if (!defined('PCLZIP_ERROR_EXTERNAL')) {
    define( 'PCLZIP_ERROR_EXTERNAL', 0 );
  }

  
  
  
  
  
  
  
  
  
  if (!defined('PCLZIP_TEMPORARY_DIR')) {
    define( 'PCLZIP_TEMPORARY_DIR', '' );
  }

  
  
  
  
  
  
  
  
  if (!defined('PCLZIP_TEMPORARY_FILE_RATIO')) {
    define( 'PCLZIP_TEMPORARY_FILE_RATIO', 0.47 );
  }





  
  $Vf15mqoaf252 = "2.8.2";

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  define( 'PCLZIP_ERR_USER_ABORTED', 2 );
  define( 'PCLZIP_ERR_NO_ERROR', 0 );
  define( 'PCLZIP_ERR_WRITE_OPEN_FAIL', -1 );
  define( 'PCLZIP_ERR_READ_OPEN_FAIL', -2 );
  define( 'PCLZIP_ERR_INVALID_PARAMETER', -3 );
  define( 'PCLZIP_ERR_MISSING_FILE', -4 );
  define( 'PCLZIP_ERR_FILENAME_TOO_LONG', -5 );
  define( 'PCLZIP_ERR_INVALID_ZIP', -6 );
  define( 'PCLZIP_ERR_BAD_EXTRACTED_FILE', -7 );
  define( 'PCLZIP_ERR_DIR_CREATE_FAIL', -8 );
  define( 'PCLZIP_ERR_BAD_EXTENSION', -9 );
  define( 'PCLZIP_ERR_BAD_FORMAT', -10 );
  define( 'PCLZIP_ERR_DELETE_FILE_FAIL', -11 );
  define( 'PCLZIP_ERR_RENAME_FILE_FAIL', -12 );
  define( 'PCLZIP_ERR_BAD_CHECKSUM', -13 );
  define( 'PCLZIP_ERR_INVALID_ARCHIVE_ZIP', -14 );
  define( 'PCLZIP_ERR_MISSING_OPTION_VALUE', -15 );
  define( 'PCLZIP_ERR_INVALID_OPTION_VALUE', -16 );
  define( 'PCLZIP_ERR_ALREADY_A_DIRECTORY', -17 );
  define( 'PCLZIP_ERR_UNSUPPORTED_COMPRESSION', -18 );
  define( 'PCLZIP_ERR_UNSUPPORTED_ENCRYPTION', -19 );
  define( 'PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE', -20 );
  define( 'PCLZIP_ERR_DIRECTORY_RESTRICTION', -21 );

  
  define( 'PCLZIP_OPT_PATH', 77001 );
  define( 'PCLZIP_OPT_ADD_PATH', 77002 );
  define( 'PCLZIP_OPT_REMOVE_PATH', 77003 );
  define( 'PCLZIP_OPT_REMOVE_ALL_PATH', 77004 );
  define( 'PCLZIP_OPT_SET_CHMOD', 77005 );
  define( 'PCLZIP_OPT_EXTRACT_AS_STRING', 77006 );
  define( 'PCLZIP_OPT_NO_COMPRESSION', 77007 );
  define( 'PCLZIP_OPT_BY_NAME', 77008 );
  define( 'PCLZIP_OPT_BY_INDEX', 77009 );
  define( 'PCLZIP_OPT_BY_EREG', 77010 );
  define( 'PCLZIP_OPT_BY_PREG', 77011 );
  define( 'PCLZIP_OPT_COMMENT', 77012 );
  define( 'PCLZIP_OPT_ADD_COMMENT', 77013 );
  define( 'PCLZIP_OPT_PREPEND_COMMENT', 77014 );
  define( 'PCLZIP_OPT_EXTRACT_IN_OUTPUT', 77015 );
  define( 'PCLZIP_OPT_REPLACE_NEWER', 77016 );
  define( 'PCLZIP_OPT_STOP_ON_ERROR', 77017 );
  
  
  
  define( 'PCLZIP_OPT_EXTRACT_DIR_RESTRICTION', 77019 );
  define( 'PCLZIP_OPT_TEMP_FILE_THRESHOLD', 77020 );
  define( 'PCLZIP_OPT_ADD_TEMP_FILE_THRESHOLD', 77020 ); 
  define( 'PCLZIP_OPT_TEMP_FILE_ON', 77021 );
  define( 'PCLZIP_OPT_ADD_TEMP_FILE_ON', 77021 ); 
  define( 'PCLZIP_OPT_TEMP_FILE_OFF', 77022 );
  define( 'PCLZIP_OPT_ADD_TEMP_FILE_OFF', 77022 ); 
  
  
  define( 'PCLZIP_ATT_FILE_NAME', 79001 );
  define( 'PCLZIP_ATT_FILE_NEW_SHORT_NAME', 79002 );
  define( 'PCLZIP_ATT_FILE_NEW_FULL_NAME', 79003 );
  define( 'PCLZIP_ATT_FILE_MTIME', 79004 );
  define( 'PCLZIP_ATT_FILE_CONTENT', 79005 );
  define( 'PCLZIP_ATT_FILE_COMMENT', 79006 );

  
  define( 'PCLZIP_CB_PRE_EXTRACT', 78001 );
  define( 'PCLZIP_CB_POST_EXTRACT', 78002 );
  define( 'PCLZIP_CB_PRE_ADD', 78003 );
  define( 'PCLZIP_CB_POST_ADD', 78004 );
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  class PclZip
  {
    
    var $Vazzkz1chohg = '';

    
    var $Vfylob4d5jrv = 0;

    
    var $Vhgxc4kdfmf5 = 1;
    var $Vilat41ut3kd = '';
    
    
    
    
    var $Vzrhortize2t;

  
  
  
  
  
  
  
  
  function PclZip($Vc5pcxu1l2jy)
  {

    
    if (!function_exists('gzopen'))
    {
      die('Abort '.basename(__FILE__).' : Missing zlib extensions');
    }

    
    $this->zipname = $Vc5pcxu1l2jy;
    $this->zip_fd = 0;
    $this->magic_quotes_status = -1;

    
    return;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function create($Vj5qshnbqylk)
  {
    $Vvwz2kk32ujo=1;

    
    $this->privErrorReset();

    
    $Vqi22zj3bklg = array();
    $Vqi22zj3bklg[PCLZIP_OPT_NO_COMPRESSION] = FALSE;

    
    $Vpad0k4de1le = func_num_args();

    
    if ($Vpad0k4de1le > 1) {
      
      $Vxhjkyycvs0w = func_get_args();

      
      array_shift($Vxhjkyycvs0w);
      $Vpad0k4de1le--;

      
      if ((is_integer($Vxhjkyycvs0w[0])) && ($Vxhjkyycvs0w[0] > 77000)) {

        
        $Vvwz2kk32ujo = $this->privParseOptions($Vxhjkyycvs0w, $Vpad0k4de1le, $Vqi22zj3bklg,
                                            array (PCLZIP_OPT_REMOVE_PATH => 'optional',
                                                   PCLZIP_OPT_REMOVE_ALL_PATH => 'optional',
                                                   PCLZIP_OPT_ADD_PATH => 'optional',
                                                   PCLZIP_CB_PRE_ADD => 'optional',
                                                   PCLZIP_CB_POST_ADD => 'optional',
                                                   PCLZIP_OPT_NO_COMPRESSION => 'optional',
                                                   PCLZIP_OPT_COMMENT => 'optional',
                                                   PCLZIP_OPT_TEMP_FILE_THRESHOLD => 'optional',
                                                   PCLZIP_OPT_TEMP_FILE_ON => 'optional',
                                                   PCLZIP_OPT_TEMP_FILE_OFF => 'optional'
                                                   
                                             ));
        if ($Vvwz2kk32ujo != 1) {
          return 0;
        }
      }

      
      
      
      else {

        
        $Vqi22zj3bklg[PCLZIP_OPT_ADD_PATH] = $Vxhjkyycvs0w[0];

        
        if ($Vpad0k4de1le == 2) {
          $Vqi22zj3bklg[PCLZIP_OPT_REMOVE_PATH] = $Vxhjkyycvs0w[1];
        }
        else if ($Vpad0k4de1le > 2) {
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER,
		                       "Invalid number / type of arguments");
          return 0;
        }
      }
    }
    
    
    $this->privOptionDefaultThreshold($Vqi22zj3bklg);

    
    $Vak0vkbalpfm = array();
    $Vuisrp0hpx2y = array();
    $Vcchz0sqs4i5 = array();
    $Vmwbrc2m5pbz = array();
    
    
    if (is_array($Vj5qshnbqylk)) {
    
      
      
      if (isset($Vj5qshnbqylk[0]) && is_array($Vj5qshnbqylk[0])) {
        $Vuisrp0hpx2y = $Vj5qshnbqylk;
      }
      
      
      else {
        $Vak0vkbalpfm = $Vj5qshnbqylk;
      }
    }

    
    else if (is_string($Vj5qshnbqylk)) {
      
      $Vak0vkbalpfm = explode(PCLZIP_SEPARATOR, $Vj5qshnbqylk);
    }

    
    else {
      PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid variable type p_filelist");
      return 0;
    }
    
    
    if (sizeof($Vak0vkbalpfm) != 0) {
      foreach ($Vak0vkbalpfm as $Vwzjho0jphmh) {
        if ($Vwzjho0jphmh != '') {
          $Vuisrp0hpx2y[][PCLZIP_ATT_FILE_NAME] = $Vwzjho0jphmh;
        }
        else {
        }
      }
    }
    
    
    $Vlt1hodwaxnq
    = array ( PCLZIP_ATT_FILE_NAME => 'mandatory'
             ,PCLZIP_ATT_FILE_NEW_SHORT_NAME => 'optional'
             ,PCLZIP_ATT_FILE_NEW_FULL_NAME => 'optional'
             ,PCLZIP_ATT_FILE_MTIME => 'optional'
             ,PCLZIP_ATT_FILE_CONTENT => 'optional'
             ,PCLZIP_ATT_FILE_COMMENT => 'optional'
						);
    foreach ($Vuisrp0hpx2y as $Vlp3xgx44ikh) {
      $Vvwz2kk32ujo = $this->privFileDescrParseAtt($Vlp3xgx44ikh,
                                               $Vcchz0sqs4i5[],
                                               $Vqi22zj3bklg,
                                               $Vlt1hodwaxnq);
      if ($Vvwz2kk32ujo != 1) {
        return 0;
      }
    }

    
    $Vvwz2kk32ujo = $this->privFileDescrExpand($Vcchz0sqs4i5, $Vqi22zj3bklg);
    if ($Vvwz2kk32ujo != 1) {
      return 0;
    }

    
    $Vvwz2kk32ujo = $this->privCreate($Vcchz0sqs4i5, $Vmwbrc2m5pbz, $Vqi22zj3bklg);
    if ($Vvwz2kk32ujo != 1) {
      return 0;
    }

    
    return $Vmwbrc2m5pbz;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function add($Vj5qshnbqylk)
  {
    $Vvwz2kk32ujo=1;

    
    $this->privErrorReset();

    
    $Vqi22zj3bklg = array();
    $Vqi22zj3bklg[PCLZIP_OPT_NO_COMPRESSION] = FALSE;

    
    $Vpad0k4de1le = func_num_args();

    
    if ($Vpad0k4de1le > 1) {
      
      $Vxhjkyycvs0w = func_get_args();

      
      array_shift($Vxhjkyycvs0w);
      $Vpad0k4de1le--;

      
      if ((is_integer($Vxhjkyycvs0w[0])) && ($Vxhjkyycvs0w[0] > 77000)) {

        
        $Vvwz2kk32ujo = $this->privParseOptions($Vxhjkyycvs0w, $Vpad0k4de1le, $Vqi22zj3bklg,
                                            array (PCLZIP_OPT_REMOVE_PATH => 'optional',
                                                   PCLZIP_OPT_REMOVE_ALL_PATH => 'optional',
                                                   PCLZIP_OPT_ADD_PATH => 'optional',
                                                   PCLZIP_CB_PRE_ADD => 'optional',
                                                   PCLZIP_CB_POST_ADD => 'optional',
                                                   PCLZIP_OPT_NO_COMPRESSION => 'optional',
                                                   PCLZIP_OPT_COMMENT => 'optional',
                                                   PCLZIP_OPT_ADD_COMMENT => 'optional',
                                                   PCLZIP_OPT_PREPEND_COMMENT => 'optional',
                                                   PCLZIP_OPT_TEMP_FILE_THRESHOLD => 'optional',
                                                   PCLZIP_OPT_TEMP_FILE_ON => 'optional',
                                                   PCLZIP_OPT_TEMP_FILE_OFF => 'optional'
                                                   
												   ));
        if ($Vvwz2kk32ujo != 1) {
          return 0;
        }
      }

      
      
      
      else {

        
        $Vqi22zj3bklg[PCLZIP_OPT_ADD_PATH] = $Vn0lcu1rtdr2 = $Vxhjkyycvs0w[0];

        
        if ($Vpad0k4de1le == 2) {
          $Vqi22zj3bklg[PCLZIP_OPT_REMOVE_PATH] = $Vxhjkyycvs0w[1];
        }
        else if ($Vpad0k4de1le > 2) {
          
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid number / type of arguments");

          
          return 0;
        }
      }
    }

    
    $this->privOptionDefaultThreshold($Vqi22zj3bklg);

    
    $Vak0vkbalpfm = array();
    $Vuisrp0hpx2y = array();
    $Vcchz0sqs4i5 = array();
    $Vmwbrc2m5pbz = array();
    
    
    if (is_array($Vj5qshnbqylk)) {
    
      
      
      if (isset($Vj5qshnbqylk[0]) && is_array($Vj5qshnbqylk[0])) {
        $Vuisrp0hpx2y = $Vj5qshnbqylk;
      }
      
      
      else {
        $Vak0vkbalpfm = $Vj5qshnbqylk;
      }
    }

    
    else if (is_string($Vj5qshnbqylk)) {
      
      $Vak0vkbalpfm = explode(PCLZIP_SEPARATOR, $Vj5qshnbqylk);
    }

    
    else {
      PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid variable type '".gettype($Vj5qshnbqylk)."' for p_filelist");
      return 0;
    }
    
    
    if (sizeof($Vak0vkbalpfm) != 0) {
      foreach ($Vak0vkbalpfm as $Vwzjho0jphmh) {
        $Vuisrp0hpx2y[][PCLZIP_ATT_FILE_NAME] = $Vwzjho0jphmh;
      }
    }
    
    
    $Vlt1hodwaxnq
    = array ( PCLZIP_ATT_FILE_NAME => 'mandatory'
             ,PCLZIP_ATT_FILE_NEW_SHORT_NAME => 'optional'
             ,PCLZIP_ATT_FILE_NEW_FULL_NAME => 'optional'
             ,PCLZIP_ATT_FILE_MTIME => 'optional'
             ,PCLZIP_ATT_FILE_CONTENT => 'optional'
             ,PCLZIP_ATT_FILE_COMMENT => 'optional'
						);
    foreach ($Vuisrp0hpx2y as $Vlp3xgx44ikh) {
      $Vvwz2kk32ujo = $this->privFileDescrParseAtt($Vlp3xgx44ikh,
                                               $Vcchz0sqs4i5[],
                                               $Vqi22zj3bklg,
                                               $Vlt1hodwaxnq);
      if ($Vvwz2kk32ujo != 1) {
        return 0;
      }
    }

    
    $Vvwz2kk32ujo = $this->privFileDescrExpand($Vcchz0sqs4i5, $Vqi22zj3bklg);
    if ($Vvwz2kk32ujo != 1) {
      return 0;
    }

    
    $Vvwz2kk32ujo = $this->privAdd($Vcchz0sqs4i5, $Vmwbrc2m5pbz, $Vqi22zj3bklg);
    if ($Vvwz2kk32ujo != 1) {
      return 0;
    }

    
    return $Vmwbrc2m5pbz;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function listContent()
  {
    $Vvwz2kk32ujo=1;

    
    $this->privErrorReset();

    
    if (!$this->privCheckFormat()) {
      return(0);
    }

    
    $Vze5xxte3b11 = array();
    if (($Vvwz2kk32ujo = $this->privList($Vze5xxte3b11)) != 1)
    {
      unset($Vze5xxte3b11);
      return(0);
    }

    
    return $Vze5xxte3b11;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function extract()
  {
    $Vvwz2kk32ujo=1;

    
    $this->privErrorReset();

    
    if (!$this->privCheckFormat()) {
      return(0);
    }

    
    $Vqi22zj3bklg = array();

    $Vyjazhgqiclz = '';
    $V3apxmf3uegu = "";
    $Vfap4d5dvua5 = false;

    
    $Vpad0k4de1le = func_num_args();

    
    $Vqi22zj3bklg[PCLZIP_OPT_EXTRACT_AS_STRING] = FALSE;

    
    if ($Vpad0k4de1le > 0) {
      
      $Vxhjkyycvs0w = func_get_args();

      
      if ((is_integer($Vxhjkyycvs0w[0])) && ($Vxhjkyycvs0w[0] > 77000)) {

        
        $Vvwz2kk32ujo = $this->privParseOptions($Vxhjkyycvs0w, $Vpad0k4de1le, $Vqi22zj3bklg,
                                            array (PCLZIP_OPT_PATH => 'optional',
                                                   PCLZIP_OPT_REMOVE_PATH => 'optional',
                                                   PCLZIP_OPT_REMOVE_ALL_PATH => 'optional',
                                                   PCLZIP_OPT_ADD_PATH => 'optional',
                                                   PCLZIP_CB_PRE_EXTRACT => 'optional',
                                                   PCLZIP_CB_POST_EXTRACT => 'optional',
                                                   PCLZIP_OPT_SET_CHMOD => 'optional',
                                                   PCLZIP_OPT_BY_NAME => 'optional',
                                                   PCLZIP_OPT_BY_EREG => 'optional',
                                                   PCLZIP_OPT_BY_PREG => 'optional',
                                                   PCLZIP_OPT_BY_INDEX => 'optional',
                                                   PCLZIP_OPT_EXTRACT_AS_STRING => 'optional',
                                                   PCLZIP_OPT_EXTRACT_IN_OUTPUT => 'optional',
                                                   PCLZIP_OPT_REPLACE_NEWER => 'optional'
                                                   ,PCLZIP_OPT_STOP_ON_ERROR => 'optional'
                                                   ,PCLZIP_OPT_EXTRACT_DIR_RESTRICTION => 'optional',
                                                   PCLZIP_OPT_TEMP_FILE_THRESHOLD => 'optional',
                                                   PCLZIP_OPT_TEMP_FILE_ON => 'optional',
                                                   PCLZIP_OPT_TEMP_FILE_OFF => 'optional'
												    ));
        if ($Vvwz2kk32ujo != 1) {
          return 0;
        }

        
        if (isset($Vqi22zj3bklg[PCLZIP_OPT_PATH])) {
          $Vyjazhgqiclz = $Vqi22zj3bklg[PCLZIP_OPT_PATH];
        }
        if (isset($Vqi22zj3bklg[PCLZIP_OPT_REMOVE_PATH])) {
          $V3apxmf3uegu = $Vqi22zj3bklg[PCLZIP_OPT_REMOVE_PATH];
        }
        if (isset($Vqi22zj3bklg[PCLZIP_OPT_REMOVE_ALL_PATH])) {
          $Vfap4d5dvua5 = $Vqi22zj3bklg[PCLZIP_OPT_REMOVE_ALL_PATH];
        }
        if (isset($Vqi22zj3bklg[PCLZIP_OPT_ADD_PATH])) {
          
          if ((strlen($Vyjazhgqiclz) > 0) && (substr($Vyjazhgqiclz, -1) != '/')) {
            $Vyjazhgqiclz .= '/';
          }
          $Vyjazhgqiclz .= $Vqi22zj3bklg[PCLZIP_OPT_ADD_PATH];
        }
      }

      
      
      
      else {

        
        $Vyjazhgqiclz = $Vxhjkyycvs0w[0];

        
        if ($Vpad0k4de1le == 2) {
          $V3apxmf3uegu = $Vxhjkyycvs0w[1];
        }
        else if ($Vpad0k4de1le > 2) {
          
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid number / type of arguments");

          
          return 0;
        }
      }
    }

    
    $this->privOptionDefaultThreshold($Vqi22zj3bklg);

    

    
    $Vze5xxte3b11 = array();
    $Vvwz2kk32ujo = $this->privExtractByRule($Vze5xxte3b11, $Vyjazhgqiclz, $V3apxmf3uegu,
	                                     $Vfap4d5dvua5, $Vqi22zj3bklg);
    if ($Vvwz2kk32ujo < 1) {
      unset($Vze5xxte3b11);
      return(0);
    }

    
    return $Vze5xxte3b11;
  }
  


  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function extractByIndex($V3lsmbf2iiaf)
  {
    $Vvwz2kk32ujo=1;

    
    $this->privErrorReset();

    
    if (!$this->privCheckFormat()) {
      return(0);
    }

    
    $Vqi22zj3bklg = array();

    $Vyjazhgqiclz = '';
    $V3apxmf3uegu = "";
    $Vfap4d5dvua5 = false;

    
    $Vpad0k4de1le = func_num_args();

    
    $Vqi22zj3bklg[PCLZIP_OPT_EXTRACT_AS_STRING] = FALSE;

    
    if ($Vpad0k4de1le > 1) {
      
      $Vxhjkyycvs0w = func_get_args();

      
      array_shift($Vxhjkyycvs0w);
      $Vpad0k4de1le--;

      
      if ((is_integer($Vxhjkyycvs0w[0])) && ($Vxhjkyycvs0w[0] > 77000)) {

        
        $Vvwz2kk32ujo = $this->privParseOptions($Vxhjkyycvs0w, $Vpad0k4de1le, $Vqi22zj3bklg,
                                            array (PCLZIP_OPT_PATH => 'optional',
                                                   PCLZIP_OPT_REMOVE_PATH => 'optional',
                                                   PCLZIP_OPT_REMOVE_ALL_PATH => 'optional',
                                                   PCLZIP_OPT_EXTRACT_AS_STRING => 'optional',
                                                   PCLZIP_OPT_ADD_PATH => 'optional',
                                                   PCLZIP_CB_PRE_EXTRACT => 'optional',
                                                   PCLZIP_CB_POST_EXTRACT => 'optional',
                                                   PCLZIP_OPT_SET_CHMOD => 'optional',
                                                   PCLZIP_OPT_REPLACE_NEWER => 'optional'
                                                   ,PCLZIP_OPT_STOP_ON_ERROR => 'optional'
                                                   ,PCLZIP_OPT_EXTRACT_DIR_RESTRICTION => 'optional',
                                                   PCLZIP_OPT_TEMP_FILE_THRESHOLD => 'optional',
                                                   PCLZIP_OPT_TEMP_FILE_ON => 'optional',
                                                   PCLZIP_OPT_TEMP_FILE_OFF => 'optional'
												   ));
        if ($Vvwz2kk32ujo != 1) {
          return 0;
        }

        
        if (isset($Vqi22zj3bklg[PCLZIP_OPT_PATH])) {
          $Vyjazhgqiclz = $Vqi22zj3bklg[PCLZIP_OPT_PATH];
        }
        if (isset($Vqi22zj3bklg[PCLZIP_OPT_REMOVE_PATH])) {
          $V3apxmf3uegu = $Vqi22zj3bklg[PCLZIP_OPT_REMOVE_PATH];
        }
        if (isset($Vqi22zj3bklg[PCLZIP_OPT_REMOVE_ALL_PATH])) {
          $Vfap4d5dvua5 = $Vqi22zj3bklg[PCLZIP_OPT_REMOVE_ALL_PATH];
        }
        if (isset($Vqi22zj3bklg[PCLZIP_OPT_ADD_PATH])) {
          
          if ((strlen($Vyjazhgqiclz) > 0) && (substr($Vyjazhgqiclz, -1) != '/')) {
            $Vyjazhgqiclz .= '/';
          }
          $Vyjazhgqiclz .= $Vqi22zj3bklg[PCLZIP_OPT_ADD_PATH];
        }
        if (!isset($Vqi22zj3bklg[PCLZIP_OPT_EXTRACT_AS_STRING])) {
          $Vqi22zj3bklg[PCLZIP_OPT_EXTRACT_AS_STRING] = FALSE;
        }
        else {
        }
      }

      
      
      
      else {

        
        $Vyjazhgqiclz = $Vxhjkyycvs0w[0];

        
        if ($Vpad0k4de1le == 2) {
          $V3apxmf3uegu = $Vxhjkyycvs0w[1];
        }
        else if ($Vpad0k4de1le > 2) {
          
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid number / type of arguments");

          
          return 0;
        }
      }
    }

    

    
    
    
    $Veoe52tkohzo = array (PCLZIP_OPT_BY_INDEX, $V3lsmbf2iiaf);
    $Vqi22zj3bklg_trick = array();
    $Vvwz2kk32ujo = $this->privParseOptions($Veoe52tkohzo, sizeof($Veoe52tkohzo), $Vqi22zj3bklg_trick,
                                        array (PCLZIP_OPT_BY_INDEX => 'optional' ));
    if ($Vvwz2kk32ujo != 1) {
        return 0;
    }
    $Vqi22zj3bklg[PCLZIP_OPT_BY_INDEX] = $Vqi22zj3bklg_trick[PCLZIP_OPT_BY_INDEX];

    
    $this->privOptionDefaultThreshold($Vqi22zj3bklg);

    
    if (($Vvwz2kk32ujo = $this->privExtractByRule($Vze5xxte3b11, $Vyjazhgqiclz, $V3apxmf3uegu, $Vfap4d5dvua5, $Vqi22zj3bklg)) < 1) {
        return(0);
    }

    
    return $Vze5xxte3b11;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function delete()
  {
    $Vvwz2kk32ujo=1;

    
    $this->privErrorReset();

    
    if (!$this->privCheckFormat()) {
      return(0);
    }

    
    $Vqi22zj3bklg = array();

    
    $Vpad0k4de1le = func_num_args();

    
    if ($Vpad0k4de1le > 0) {
      
      $Vxhjkyycvs0w = func_get_args();

      
      $Vvwz2kk32ujo = $this->privParseOptions($Vxhjkyycvs0w, $Vpad0k4de1le, $Vqi22zj3bklg,
                                        array (PCLZIP_OPT_BY_NAME => 'optional',
                                               PCLZIP_OPT_BY_EREG => 'optional',
                                               PCLZIP_OPT_BY_PREG => 'optional',
                                               PCLZIP_OPT_BY_INDEX => 'optional' ));
      if ($Vvwz2kk32ujo != 1) {
          return 0;
      }
    }

    
    $this->privDisableMagicQuotes();

    
    $Vz5yxslfkbfj = array();
    if (($Vvwz2kk32ujo = $this->privDeleteByRule($Vz5yxslfkbfj, $Vqi22zj3bklg)) != 1) {
      $this->privSwapBackMagicQuotes();
      unset($Vz5yxslfkbfj);
      return(0);
    }

    
    $this->privSwapBackMagicQuotes();

    
    return $Vz5yxslfkbfj;
  }
  

  
  
  
  
  
  
  function deleteByIndex($V3lsmbf2iiaf)
  {
    
    $Vze5xxte3b11 = $this->delete(PCLZIP_OPT_BY_INDEX, $V3lsmbf2iiaf);

    
    return $Vze5xxte3b11;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function properties()
  {

    
    $this->privErrorReset();

    
    $this->privDisableMagicQuotes();

    
    if (!$this->privCheckFormat()) {
      $this->privSwapBackMagicQuotes();
      return(0);
    }

    
    $Vscqevvat2za = array();
    $Vscqevvat2za['comment'] = '';
    $Vscqevvat2za['nb'] = 0;
    $Vscqevvat2za['status'] = 'not_exist';

    
    if (@is_file($this->zipname))
    {
      
      if (($this->zip_fd = @fopen($this->zipname, 'rb')) == 0)
      {
        $this->privSwapBackMagicQuotes();
        
        
        PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open archive \''.$this->zipname.'\' in binary read mode');

        
        return 0;
      }

      
      $Vwxw0zfajc1a = array();
      if (($Vvwz2kk32ujo = $this->privReadEndCentralDir($Vwxw0zfajc1a)) != 1)
      {
        $this->privSwapBackMagicQuotes();
        return 0;
      }

      
      $this->privCloseFd();

      
      $Vscqevvat2za['comment'] = $Vwxw0zfajc1a['comment'];
      $Vscqevvat2za['nb'] = $Vwxw0zfajc1a['entries'];
      $Vscqevvat2za['status'] = 'ok';
    }

    
    $this->privSwapBackMagicQuotes();

    
    return $Vscqevvat2za;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  
  function duplicate($Vot4rnn5hfhi)
  {
    $Vvwz2kk32ujo = 1;

    
    $this->privErrorReset();

    
    if ((is_object($Vot4rnn5hfhi)) && (get_class($Vot4rnn5hfhi) == 'pclzip'))
    {

      
      $Vvwz2kk32ujo = $this->privDuplicate($Vot4rnn5hfhi->zipname);
    }

    
    else if (is_string($Vot4rnn5hfhi))
    {

      
      
      if (!is_file($Vot4rnn5hfhi)) {
        
        PclZip::privErrorLog(PCLZIP_ERR_MISSING_FILE, "No file with filename '".$Vot4rnn5hfhi."'");
        $Vvwz2kk32ujo = PCLZIP_ERR_MISSING_FILE;
      }
      else {
        
        $Vvwz2kk32ujo = $this->privDuplicate($Vot4rnn5hfhi);
      }
    }

    
    else
    {
      
      PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid variable type p_archive_to_add");
      $Vvwz2kk32ujo = PCLZIP_ERR_INVALID_PARAMETER;
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function merge($Vot4rnn5hfhi_to_add)
  {
    $Vvwz2kk32ujo = 1;

    
    $this->privErrorReset();

    
    if (!$this->privCheckFormat()) {
      return(0);
    }

    
    if ((is_object($Vot4rnn5hfhi_to_add)) && (get_class($Vot4rnn5hfhi_to_add) == 'pclzip'))
    {

      
      $Vvwz2kk32ujo = $this->privMerge($Vot4rnn5hfhi_to_add);
    }

    
    else if (is_string($Vot4rnn5hfhi_to_add))
    {

      
      $Vwvyptj4lcip = new PclZip($Vot4rnn5hfhi_to_add);

      
      $Vvwz2kk32ujo = $this->privMerge($Vwvyptj4lcip);
    }

    
    else
    {
      
      PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid variable type p_archive_to_add");
      $Vvwz2kk32ujo = PCLZIP_ERR_INVALID_PARAMETER;
    }

    
    return $Vvwz2kk32ujo;
  }
  



  
  
  
  
  
  function errorCode()
  {
    if (PCLZIP_ERROR_EXTERNAL == 1) {
      return(PclErrorCode());
    }
    else {
      return($this->error_code);
    }
  }
  

  
  
  
  
  
  function errorName($Vjb0v3ba5slc=false)
  {
    $V4vynj4dhreu = array ( PCLZIP_ERR_NO_ERROR => 'PCLZIP_ERR_NO_ERROR',
                      PCLZIP_ERR_WRITE_OPEN_FAIL => 'PCLZIP_ERR_WRITE_OPEN_FAIL',
                      PCLZIP_ERR_READ_OPEN_FAIL => 'PCLZIP_ERR_READ_OPEN_FAIL',
                      PCLZIP_ERR_INVALID_PARAMETER => 'PCLZIP_ERR_INVALID_PARAMETER',
                      PCLZIP_ERR_MISSING_FILE => 'PCLZIP_ERR_MISSING_FILE',
                      PCLZIP_ERR_FILENAME_TOO_LONG => 'PCLZIP_ERR_FILENAME_TOO_LONG',
                      PCLZIP_ERR_INVALID_ZIP => 'PCLZIP_ERR_INVALID_ZIP',
                      PCLZIP_ERR_BAD_EXTRACTED_FILE => 'PCLZIP_ERR_BAD_EXTRACTED_FILE',
                      PCLZIP_ERR_DIR_CREATE_FAIL => 'PCLZIP_ERR_DIR_CREATE_FAIL',
                      PCLZIP_ERR_BAD_EXTENSION => 'PCLZIP_ERR_BAD_EXTENSION',
                      PCLZIP_ERR_BAD_FORMAT => 'PCLZIP_ERR_BAD_FORMAT',
                      PCLZIP_ERR_DELETE_FILE_FAIL => 'PCLZIP_ERR_DELETE_FILE_FAIL',
                      PCLZIP_ERR_RENAME_FILE_FAIL => 'PCLZIP_ERR_RENAME_FILE_FAIL',
                      PCLZIP_ERR_BAD_CHECKSUM => 'PCLZIP_ERR_BAD_CHECKSUM',
                      PCLZIP_ERR_INVALID_ARCHIVE_ZIP => 'PCLZIP_ERR_INVALID_ARCHIVE_ZIP',
                      PCLZIP_ERR_MISSING_OPTION_VALUE => 'PCLZIP_ERR_MISSING_OPTION_VALUE',
                      PCLZIP_ERR_INVALID_OPTION_VALUE => 'PCLZIP_ERR_INVALID_OPTION_VALUE',
                      PCLZIP_ERR_UNSUPPORTED_COMPRESSION => 'PCLZIP_ERR_UNSUPPORTED_COMPRESSION',
                      PCLZIP_ERR_UNSUPPORTED_ENCRYPTION => 'PCLZIP_ERR_UNSUPPORTED_ENCRYPTION'
                      ,PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE => 'PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE'
                      ,PCLZIP_ERR_DIRECTORY_RESTRICTION => 'PCLZIP_ERR_DIRECTORY_RESTRICTION'
                    );

    if (isset($V4vynj4dhreu[$this->error_code])) {
      $V5zhnop4kvky = $V4vynj4dhreu[$this->error_code];
    }
    else {
      $V5zhnop4kvky = 'NoName';
    }

    if ($Vjb0v3ba5slc) {
      return($V5zhnop4kvky.' ('.$this->error_code.')');
    }
    else {
      return($V5zhnop4kvky);
    }
  }
  

  
  
  
  
  
  function errorInfo($Vypwsmavdsil=false)
  {
    if (PCLZIP_ERROR_EXTERNAL == 1) {
      return(PclErrorString());
    }
    else {
      if ($Vypwsmavdsil) {
        return($this->errorName(true)." : ".$this->error_string);
      }
      else {
        return($this->error_string." [code ".$this->error_code."]");
      }
    }
  }
  










  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function privCheckFormat($Vzlflbzulwzy=0)
  {
    $Vvwz2kk32ujo = true;

	
    clearstatcache();

    
    $this->privErrorReset();

    
    if (!is_file($this->zipname)) {
      
      PclZip::privErrorLog(PCLZIP_ERR_MISSING_FILE, "Missing archive file '".$this->zipname."'");
      return(false);
    }

    
    if (!is_readable($this->zipname)) {
      
      PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, "Unable to read archive '".$this->zipname."'");
      return(false);
    }

    
    

    
    

    
    

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function privParseOptions(&$V43wvvrvkwxo, $V4e2u1t45n13, &$Vvwz2kk32ujo_list, $Vr2c1dq4tzme=false)
  {
    $Vvwz2kk32ujo=1;
    
    
    $Vfhiq1lhsoja=0;
    while ($Vfhiq1lhsoja<$V4e2u1t45n13) {

      
      if (!isset($Vr2c1dq4tzme[$V43wvvrvkwxo[$Vfhiq1lhsoja]])) {
        
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid optional parameter '".$V43wvvrvkwxo[$Vfhiq1lhsoja]."' for this method");

        
        return PclZip::errorCode();
      }

      
      switch ($V43wvvrvkwxo[$Vfhiq1lhsoja]) {
        
        case PCLZIP_OPT_PATH :
        case PCLZIP_OPT_REMOVE_PATH :
        case PCLZIP_OPT_ADD_PATH :
          
          if (($Vfhiq1lhsoja+1) >= $V4e2u1t45n13) {
            
            PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."'");

            
            return PclZip::errorCode();
          }

          
          $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]] = PclZipUtilTranslateWinPath($V43wvvrvkwxo[$Vfhiq1lhsoja+1], FALSE);
          $Vfhiq1lhsoja++;
        break;

        case PCLZIP_OPT_TEMP_FILE_THRESHOLD :
          
          if (($Vfhiq1lhsoja+1) >= $V4e2u1t45n13) {
            PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."'");
            return PclZip::errorCode();
          }
          
          
          if (isset($Vvwz2kk32ujo_list[PCLZIP_OPT_TEMP_FILE_OFF])) {
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."' can not be used with option 'PCLZIP_OPT_TEMP_FILE_OFF'");
            return PclZip::errorCode();
          }
          
          
          $V5zhnop4kvky = $V43wvvrvkwxo[$Vfhiq1lhsoja+1];
          if ((!is_integer($V5zhnop4kvky)) || ($V5zhnop4kvky<0)) {
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Integer expected for option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."'");
            return PclZip::errorCode();
          }

          
          $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]] = $V5zhnop4kvky*1048576;
          $Vfhiq1lhsoja++;
        break;

        case PCLZIP_OPT_TEMP_FILE_ON :
          
          if (isset($Vvwz2kk32ujo_list[PCLZIP_OPT_TEMP_FILE_OFF])) {
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."' can not be used with option 'PCLZIP_OPT_TEMP_FILE_OFF'");
            return PclZip::errorCode();
          }
          
          $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]] = true;
        break;

        case PCLZIP_OPT_TEMP_FILE_OFF :
          
          if (isset($Vvwz2kk32ujo_list[PCLZIP_OPT_TEMP_FILE_ON])) {
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."' can not be used with option 'PCLZIP_OPT_TEMP_FILE_ON'");
            return PclZip::errorCode();
          }
          
          if (isset($Vvwz2kk32ujo_list[PCLZIP_OPT_TEMP_FILE_THRESHOLD])) {
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."' can not be used with option 'PCLZIP_OPT_TEMP_FILE_THRESHOLD'");
            return PclZip::errorCode();
          }
          
          $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]] = true;
        break;

        case PCLZIP_OPT_EXTRACT_DIR_RESTRICTION :
          
          if (($Vfhiq1lhsoja+1) >= $V4e2u1t45n13) {
            
            PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."'");

            
            return PclZip::errorCode();
          }

          
          if (   is_string($V43wvvrvkwxo[$Vfhiq1lhsoja+1])
              && ($V43wvvrvkwxo[$Vfhiq1lhsoja+1] != '')) {
            $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]] = PclZipUtilTranslateWinPath($V43wvvrvkwxo[$Vfhiq1lhsoja+1], FALSE);
            $Vfhiq1lhsoja++;
          }
          else {
          }
        break;

        
        case PCLZIP_OPT_BY_NAME :
          
          if (($Vfhiq1lhsoja+1) >= $V4e2u1t45n13) {
            
            PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."'");

            
            return PclZip::errorCode();
          }

          
          if (is_string($V43wvvrvkwxo[$Vfhiq1lhsoja+1])) {
              $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]][0] = $V43wvvrvkwxo[$Vfhiq1lhsoja+1];
          }
          else if (is_array($V43wvvrvkwxo[$Vfhiq1lhsoja+1])) {
              $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]] = $V43wvvrvkwxo[$Vfhiq1lhsoja+1];
          }
          else {
            
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Wrong parameter value for option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."'");

            
            return PclZip::errorCode();
          }
          $Vfhiq1lhsoja++;
        break;

        
        case PCLZIP_OPT_BY_EREG :
          
          
          $V43wvvrvkwxo[$Vfhiq1lhsoja] = PCLZIP_OPT_BY_PREG;
        case PCLZIP_OPT_BY_PREG :
        
          
          if (($Vfhiq1lhsoja+1) >= $V4e2u1t45n13) {
            
            PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."'");

            
            return PclZip::errorCode();
          }

          
          if (is_string($V43wvvrvkwxo[$Vfhiq1lhsoja+1])) {
              $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]] = $V43wvvrvkwxo[$Vfhiq1lhsoja+1];
          }
          else {
            
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Wrong parameter value for option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."'");

            
            return PclZip::errorCode();
          }
          $Vfhiq1lhsoja++;
        break;

        
        case PCLZIP_OPT_COMMENT :
        case PCLZIP_OPT_ADD_COMMENT :
        case PCLZIP_OPT_PREPEND_COMMENT :
          
          if (($Vfhiq1lhsoja+1) >= $V4e2u1t45n13) {
            
            PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE,
			                     "Missing parameter value for option '"
								 .PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])
								 ."'");

            
            return PclZip::errorCode();
          }

          
          if (is_string($V43wvvrvkwxo[$Vfhiq1lhsoja+1])) {
              $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]] = $V43wvvrvkwxo[$Vfhiq1lhsoja+1];
          }
          else {
            
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE,
			                     "Wrong parameter value for option '"
								 .PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])
								 ."'");

            
            return PclZip::errorCode();
          }
          $Vfhiq1lhsoja++;
        break;

        
        case PCLZIP_OPT_BY_INDEX :
          
          if (($Vfhiq1lhsoja+1) >= $V4e2u1t45n13) {
            
            PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."'");

            
            return PclZip::errorCode();
          }

          
          $V43lvlwiurum = array();
          if (is_string($V43wvvrvkwxo[$Vfhiq1lhsoja+1])) {

              
              $V43wvvrvkwxo[$Vfhiq1lhsoja+1] = strtr($V43wvvrvkwxo[$Vfhiq1lhsoja+1], ' ', '');

              
              $V43lvlwiurum = explode(",", $V43wvvrvkwxo[$Vfhiq1lhsoja+1]);
          }
          else if (is_integer($V43wvvrvkwxo[$Vfhiq1lhsoja+1])) {
              $V43lvlwiurum[0] = $V43wvvrvkwxo[$Vfhiq1lhsoja+1].'-'.$V43wvvrvkwxo[$Vfhiq1lhsoja+1];
          }
          else if (is_array($V43wvvrvkwxo[$Vfhiq1lhsoja+1])) {
              $V43lvlwiurum = $V43wvvrvkwxo[$Vfhiq1lhsoja+1];
          }
          else {
            
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Value must be integer, string or array for option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."'");

            
            return PclZip::errorCode();
          }
          
          
          
          
          
          $Vlirt2ny3g4o=false;
          $Vjcsd5tgomce=0;
          for ($Vzmnqyqjjodw=0; $Vzmnqyqjjodw<sizeof($V43lvlwiurum); $Vzmnqyqjjodw++) {
              
              $V4skx50cfouq = explode("-", $V43lvlwiurum[$Vzmnqyqjjodw]);
              $Vpad0k4de1le_item_list = sizeof($V4skx50cfouq);
              
              
              
              
              
              if ($Vpad0k4de1le_item_list == 1) {
                  
                  $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]][$Vzmnqyqjjodw]['start'] = $V4skx50cfouq[0];
                  $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]][$Vzmnqyqjjodw]['end'] = $V4skx50cfouq[0];
              }
              elseif ($Vpad0k4de1le_item_list == 2) {
                  
                  $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]][$Vzmnqyqjjodw]['start'] = $V4skx50cfouq[0];
                  $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]][$Vzmnqyqjjodw]['end'] = $V4skx50cfouq[1];
              }
              else {
                  
                  PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Too many values in index range for option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."'");

                  
                  return PclZip::errorCode();
              }


              
              if ($Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]][$Vzmnqyqjjodw]['start'] < $Vjcsd5tgomce) {
                  $Vlirt2ny3g4o=true;

                  
                  
                  PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Invalid order of index range for option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."'");

                  
                  return PclZip::errorCode();
              }
              $Vjcsd5tgomce = $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]][$Vzmnqyqjjodw]['start'];
          }
          
          
          if ($Vlirt2ny3g4o) {
              
          }

          
          $Vfhiq1lhsoja++;
        break;

        
        case PCLZIP_OPT_REMOVE_ALL_PATH :
        case PCLZIP_OPT_EXTRACT_AS_STRING :
        case PCLZIP_OPT_NO_COMPRESSION :
        case PCLZIP_OPT_EXTRACT_IN_OUTPUT :
        case PCLZIP_OPT_REPLACE_NEWER :
        case PCLZIP_OPT_STOP_ON_ERROR :
          $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]] = true;
        break;

        
        case PCLZIP_OPT_SET_CHMOD :
          
          if (($Vfhiq1lhsoja+1) >= $V4e2u1t45n13) {
            
            PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."'");

            
            return PclZip::errorCode();
          }

          
          $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]] = $V43wvvrvkwxo[$Vfhiq1lhsoja+1];
          $Vfhiq1lhsoja++;
        break;

        
        case PCLZIP_CB_PRE_EXTRACT :
        case PCLZIP_CB_POST_EXTRACT :
        case PCLZIP_CB_PRE_ADD :
        case PCLZIP_CB_POST_ADD :
        
          
          if (($Vfhiq1lhsoja+1) >= $V4e2u1t45n13) {
            
            PclZip::privErrorLog(PCLZIP_ERR_MISSING_OPTION_VALUE, "Missing parameter value for option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."'");

            
            return PclZip::errorCode();
          }

          
          $Vdx3n3o0gn5x = $V43wvvrvkwxo[$Vfhiq1lhsoja+1];

          
          if (!function_exists($Vdx3n3o0gn5x)) {
            
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_OPTION_VALUE, "Function '".$Vdx3n3o0gn5x."()' is not an existing function for option '".PclZipUtilOptionText($V43wvvrvkwxo[$Vfhiq1lhsoja])."'");

            
            return PclZip::errorCode();
          }

          
          $Vvwz2kk32ujo_list[$V43wvvrvkwxo[$Vfhiq1lhsoja]] = $Vdx3n3o0gn5x;
          $Vfhiq1lhsoja++;
        break;

        default :
          
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER,
		                       "Unknown parameter '"
							   .$V43wvvrvkwxo[$Vfhiq1lhsoja]."'");

          
          return PclZip::errorCode();
      }

      
      $Vfhiq1lhsoja++;
    }

    
    if ($Vr2c1dq4tzme !== false) {
      for ($Vseq1edikdvg=reset($Vr2c1dq4tzme); $Vseq1edikdvg=key($Vr2c1dq4tzme); $Vseq1edikdvg=next($Vr2c1dq4tzme)) {
        
        if ($Vr2c1dq4tzme[$Vseq1edikdvg] == 'mandatory') {
          
          if (!isset($Vvwz2kk32ujo_list[$Vseq1edikdvg])) {
            
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Missing mandatory parameter ".PclZipUtilOptionText($Vseq1edikdvg)."(".$Vseq1edikdvg.")");

            
            return PclZip::errorCode();
          }
        }
      }
    }
    
    
    if (!isset($Vvwz2kk32ujo_list[PCLZIP_OPT_TEMP_FILE_THRESHOLD])) {
      
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privOptionDefaultThreshold(&$Vzpqveiv00sn)
  {
    $Vvwz2kk32ujo=1;
    
    if (isset($Vzpqveiv00sn[PCLZIP_OPT_TEMP_FILE_THRESHOLD])
        || isset($Vzpqveiv00sn[PCLZIP_OPT_TEMP_FILE_OFF])) {
      return $Vvwz2kk32ujo;
    }
    
    
    $Vshv1qdxb4ji = ini_get('memory_limit');
    $Vshv1qdxb4ji = trim($Vshv1qdxb4ji);
    $V3ze22vtj2t0 = strtolower(substr($Vshv1qdxb4ji, -1));
 
    if($V3ze22vtj2t0 == 'g')
        
        $Vshv1qdxb4ji = $Vshv1qdxb4ji*1073741824;
    if($V3ze22vtj2t0 == 'm')
        
        $Vshv1qdxb4ji = $Vshv1qdxb4ji*1048576;
    if($V3ze22vtj2t0 == 'k')
        $Vshv1qdxb4ji = $Vshv1qdxb4ji*1024;
            
    $Vzpqveiv00sn[PCLZIP_OPT_TEMP_FILE_THRESHOLD] = floor($Vshv1qdxb4ji*PCLZIP_TEMPORARY_FILE_RATIO);
    

    
    if ($Vzpqveiv00sn[PCLZIP_OPT_TEMP_FILE_THRESHOLD] < 1048576) {
      unset($Vzpqveiv00sn[PCLZIP_OPT_TEMP_FILE_THRESHOLD]);
    }
          
    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  function privFileDescrParseAtt(&$V1kr0oweglpx, &$Viujzhlafaca, $Vqi22zj3bklg, $Vr2c1dq4tzme=false)
  {
    $Vvwz2kk32ujo=1;
    
    
    foreach ($V1kr0oweglpx as $Vbemir250lzm => $V5zhnop4kvky) {
    
      
      if (!isset($Vr2c1dq4tzme[$Vbemir250lzm])) {
        
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid file attribute '".$Vbemir250lzm."' for this file");

        
        return PclZip::errorCode();
      }

      
      switch ($Vbemir250lzm) {
        case PCLZIP_ATT_FILE_NAME :
          if (!is_string($V5zhnop4kvky)) {
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($V5zhnop4kvky).". String expected for attribute '".PclZipUtilOptionText($Vbemir250lzm)."'");
            return PclZip::errorCode();
          }

          $Viujzhlafaca['filename'] = PclZipUtilPathReduction($V5zhnop4kvky);
          
          if ($Viujzhlafaca['filename'] == '') {
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid empty filename for attribute '".PclZipUtilOptionText($Vbemir250lzm)."'");
            return PclZip::errorCode();
          }

        break;

        case PCLZIP_ATT_FILE_NEW_SHORT_NAME :
          if (!is_string($V5zhnop4kvky)) {
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($V5zhnop4kvky).". String expected for attribute '".PclZipUtilOptionText($Vbemir250lzm)."'");
            return PclZip::errorCode();
          }

          $Viujzhlafaca['new_short_name'] = PclZipUtilPathReduction($V5zhnop4kvky);

          if ($Viujzhlafaca['new_short_name'] == '') {
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid empty short filename for attribute '".PclZipUtilOptionText($Vbemir250lzm)."'");
            return PclZip::errorCode();
          }
        break;

        case PCLZIP_ATT_FILE_NEW_FULL_NAME :
          if (!is_string($V5zhnop4kvky)) {
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($V5zhnop4kvky).". String expected for attribute '".PclZipUtilOptionText($Vbemir250lzm)."'");
            return PclZip::errorCode();
          }

          $Viujzhlafaca['new_full_name'] = PclZipUtilPathReduction($V5zhnop4kvky);

          if ($Viujzhlafaca['new_full_name'] == '') {
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid empty full filename for attribute '".PclZipUtilOptionText($Vbemir250lzm)."'");
            return PclZip::errorCode();
          }
        break;

        
        case PCLZIP_ATT_FILE_COMMENT :
          if (!is_string($V5zhnop4kvky)) {
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($V5zhnop4kvky).". String expected for attribute '".PclZipUtilOptionText($Vbemir250lzm)."'");
            return PclZip::errorCode();
          }

          $Viujzhlafaca['comment'] = $V5zhnop4kvky;
        break;

        case PCLZIP_ATT_FILE_MTIME :
          if (!is_integer($V5zhnop4kvky)) {
            PclZip::privErrorLog(PCLZIP_ERR_INVALID_ATTRIBUTE_VALUE, "Invalid type ".gettype($V5zhnop4kvky).". Integer expected for attribute '".PclZipUtilOptionText($Vbemir250lzm)."'");
            return PclZip::errorCode();
          }

          $Viujzhlafaca['mtime'] = $V5zhnop4kvky;
        break;

        case PCLZIP_ATT_FILE_CONTENT :
          $Viujzhlafaca['content'] = $V5zhnop4kvky;
        break;

        default :
          
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER,
		                           "Unknown parameter '".$Vbemir250lzm."'");

          
          return PclZip::errorCode();
      }

      
      if ($Vr2c1dq4tzme !== false) {
        for ($Vseq1edikdvg=reset($Vr2c1dq4tzme); $Vseq1edikdvg=key($Vr2c1dq4tzme); $Vseq1edikdvg=next($Vr2c1dq4tzme)) {
          
          if ($Vr2c1dq4tzme[$Vseq1edikdvg] == 'mandatory') {
            
            if (!isset($V1kr0oweglpx[$Vseq1edikdvg])) {
              PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Missing mandatory parameter ".PclZipUtilOptionText($Vseq1edikdvg)."(".$Vseq1edikdvg.")");
              return PclZip::errorCode();
            }
          }
        }
      }
    
    
    }
    
    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function privFileDescrExpand(&$Viujzhlafaca_list, &$Vzpqveiv00sn)
  {
    $Vvwz2kk32ujo=1;
    
    
    $Vvwz2kk32ujo_list = array();
    
    
    for ($Vfhiq1lhsoja=0; $Vfhiq1lhsoja<sizeof($Viujzhlafaca_list); $Vfhiq1lhsoja++) {
      
      
      $Vaudpr0rw3zj = $Viujzhlafaca_list[$Vfhiq1lhsoja];
      
      
      $Vaudpr0rw3zj['filename'] = PclZipUtilTranslateWinPath($Vaudpr0rw3zj['filename'], false);
      $Vaudpr0rw3zj['filename'] = PclZipUtilPathReduction($Vaudpr0rw3zj['filename']);
      
      
      if (file_exists($Vaudpr0rw3zj['filename'])) {
        if (@is_file($Vaudpr0rw3zj['filename'])) {
          $Vaudpr0rw3zj['type'] = 'file';
        }
        else if (@is_dir($Vaudpr0rw3zj['filename'])) {
          $Vaudpr0rw3zj['type'] = 'folder';
        }
        else if (@is_link($Vaudpr0rw3zj['filename'])) {
          
          continue;
        }
        else {
          
          continue;
        }
      }
      
      
      else if (isset($Vaudpr0rw3zj['content'])) {
        $Vaudpr0rw3zj['type'] = 'virtual_file';
      }
      
      
      else {
        
        PclZip::privErrorLog(PCLZIP_ERR_MISSING_FILE, "File '".$Vaudpr0rw3zj['filename']."' does not exist");

        
        return PclZip::errorCode();
      }
      
      
      $this->privCalculateStoredFilename($Vaudpr0rw3zj, $Vzpqveiv00sn);
      
      
      $Vvwz2kk32ujo_list[sizeof($Vvwz2kk32ujo_list)] = $Vaudpr0rw3zj;
      
      
      if ($Vaudpr0rw3zj['type'] == 'folder') {
        
        $V1wkbfmq35wb = array();
        $Vazvnon5tflp = 0;
        if ($V2i0hhueyxgf = @opendir($Vaudpr0rw3zj['filename'])) {
          while (($Vxxvkljun5f3 = @readdir($V2i0hhueyxgf)) !== false) {

            
            if (($Vxxvkljun5f3 == '.') || ($Vxxvkljun5f3 == '..')) {
                continue;
            }
            
            
            $V1wkbfmq35wb[$Vazvnon5tflp]['filename'] = $Vaudpr0rw3zj['filename'].'/'.$Vxxvkljun5f3;
            
            
            
            
            if (($Vaudpr0rw3zj['stored_filename'] != $Vaudpr0rw3zj['filename'])
                 && (!isset($Vzpqveiv00sn[PCLZIP_OPT_REMOVE_ALL_PATH]))) {
              if ($Vaudpr0rw3zj['stored_filename'] != '') {
                $V1wkbfmq35wb[$Vazvnon5tflp]['new_full_name'] = $Vaudpr0rw3zj['stored_filename'].'/'.$Vxxvkljun5f3;
              }
              else {
                $V1wkbfmq35wb[$Vazvnon5tflp]['new_full_name'] = $Vxxvkljun5f3;
              }
            }
      
            $Vazvnon5tflp++;
          }
          
          @closedir($V2i0hhueyxgf);
        }
        else {
          
        }
        
        
        if ($Vazvnon5tflp != 0) {
          
          if (($Vvwz2kk32ujo = $this->privFileDescrExpand($V1wkbfmq35wb, $Vzpqveiv00sn)) != 1) {
            return $Vvwz2kk32ujo;
          }
          
          
          $Vvwz2kk32ujo_list = array_merge($Vvwz2kk32ujo_list, $V1wkbfmq35wb);
        }
        else {
        }
          
        
        unset($V1wkbfmq35wb);
      }
    }
    
    
    $Viujzhlafaca_list = $Vvwz2kk32ujo_list;

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privCreate($Viujzhlafaca_list, &$Vmwbrc2m5pbz, &$Vzpqveiv00sn)
  {
    $Vvwz2kk32ujo=1;
    $Vz5yxslfkbfj_detail = array();
    
    
    $this->privDisableMagicQuotes();

    
    if (($Vvwz2kk32ujo = $this->privOpenFd('wb')) != 1)
    {
      
      return $Vvwz2kk32ujo;
    }

    
    $Vvwz2kk32ujo = $this->privAddList($Viujzhlafaca_list, $Vmwbrc2m5pbz, $Vzpqveiv00sn);

    
    $this->privCloseFd();

    
    $this->privSwapBackMagicQuotes();

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privAdd($Viujzhlafaca_list, &$Vmwbrc2m5pbz, &$Vzpqveiv00sn)
  {
    $Vvwz2kk32ujo=1;
    $Vz5yxslfkbfj_detail = array();

    
    if ((!is_file($this->zipname)) || (filesize($this->zipname) == 0))
    {

      
      $Vvwz2kk32ujo = $this->privCreate($Viujzhlafaca_list, $Vmwbrc2m5pbz, $Vzpqveiv00sn);

      
      return $Vvwz2kk32ujo;
    }
    
    $this->privDisableMagicQuotes();

    
    if (($Vvwz2kk32ujo=$this->privOpenFd('rb')) != 1)
    {
      
      $this->privSwapBackMagicQuotes();

      
      return $Vvwz2kk32ujo;
    }

    
    $Vwxw0zfajc1a = array();
    if (($Vvwz2kk32ujo = $this->privReadEndCentralDir($Vwxw0zfajc1a)) != 1)
    {
      $this->privCloseFd();
      $this->privSwapBackMagicQuotes();
      return $Vvwz2kk32ujo;
    }

    
    @rewind($this->zip_fd);

    
    $Vccennbuwtcc = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.tmp';

    
    if (($Vrxb04r2etpy = @fopen($Vccennbuwtcc, 'wb')) == 0)
    {
      $this->privCloseFd();
      $this->privSwapBackMagicQuotes();

      PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$Vccennbuwtcc.'\' in binary write mode');

      
      return PclZip::errorCode();
    }

    
    
    $Vpad0k4de1le = $Vwxw0zfajc1a['offset'];
    while ($Vpad0k4de1le != 0)
    {
      $Vklwhm1l4upx = ($Vpad0k4de1le < PCLZIP_READ_BLOCK_SIZE ? $Vpad0k4de1le : PCLZIP_READ_BLOCK_SIZE);
      $V1eutm0pt1vg = fread($this->zip_fd, $Vklwhm1l4upx);
      @fwrite($Vrxb04r2etpy, $V1eutm0pt1vg, $Vklwhm1l4upx);
      $Vpad0k4de1le -= $Vklwhm1l4upx;
    }

    
    
    
    $Vvcp134q5kqm = $this->zip_fd;
    $this->zip_fd = $Vrxb04r2etpy;
    $Vrxb04r2etpy = $Vvcp134q5kqm;

    
    $Vdzqy3lrecxl = array();
    if (($Vvwz2kk32ujo = $this->privAddFileList($Viujzhlafaca_list, $Vdzqy3lrecxl, $Vzpqveiv00sn)) != 1)
    {
      fclose($Vrxb04r2etpy);
      $this->privCloseFd();
      @unlink($Vccennbuwtcc);
      $this->privSwapBackMagicQuotes();

      
      return $Vvwz2kk32ujo;
    }

    
    $Vabebofv1vch = @ftell($this->zip_fd);

    
    $Vpad0k4de1le = $Vwxw0zfajc1a['size'];
    while ($Vpad0k4de1le != 0)
    {
      $Vklwhm1l4upx = ($Vpad0k4de1le < PCLZIP_READ_BLOCK_SIZE ? $Vpad0k4de1le : PCLZIP_READ_BLOCK_SIZE);
      $V1eutm0pt1vg = @fread($Vrxb04r2etpy, $Vklwhm1l4upx);
      @fwrite($this->zip_fd, $V1eutm0pt1vg, $Vklwhm1l4upx);
      $Vpad0k4de1le -= $Vklwhm1l4upx;
    }

    
    for ($Vfhiq1lhsoja=0, $Vlflm1qo0gog=0; $Vfhiq1lhsoja<sizeof($Vdzqy3lrecxl); $Vfhiq1lhsoja++)
    {
      
      if ($Vdzqy3lrecxl[$Vfhiq1lhsoja]['status'] == 'ok') {
        if (($Vvwz2kk32ujo = $this->privWriteCentralFileHeader($Vdzqy3lrecxl[$Vfhiq1lhsoja])) != 1) {
          fclose($Vrxb04r2etpy);
          $this->privCloseFd();
          @unlink($Vccennbuwtcc);
          $this->privSwapBackMagicQuotes();

          
          return $Vvwz2kk32ujo;
        }
        $Vlflm1qo0gog++;
      }

      
      $this->privConvertHeader2FileInfo($Vdzqy3lrecxl[$Vfhiq1lhsoja], $Vmwbrc2m5pbz[$Vfhiq1lhsoja]);
    }

    
    $Vfplxmsntbsz = $Vwxw0zfajc1a['comment'];
    if (isset($Vzpqveiv00sn[PCLZIP_OPT_COMMENT])) {
      $Vfplxmsntbsz = $Vzpqveiv00sn[PCLZIP_OPT_COMMENT];
    }
    if (isset($Vzpqveiv00sn[PCLZIP_OPT_ADD_COMMENT])) {
      $Vfplxmsntbsz = $Vfplxmsntbsz.$Vzpqveiv00sn[PCLZIP_OPT_ADD_COMMENT];
    }
    if (isset($Vzpqveiv00sn[PCLZIP_OPT_PREPEND_COMMENT])) {
      $Vfplxmsntbsz = $Vzpqveiv00sn[PCLZIP_OPT_PREPEND_COMMENT].$Vfplxmsntbsz;
    }

    
    $Vpad0k4de1le = @ftell($this->zip_fd)-$Vabebofv1vch;

    
    if (($Vvwz2kk32ujo = $this->privWriteCentralHeader($Vlflm1qo0gog+$Vwxw0zfajc1a['entries'], $Vpad0k4de1le, $Vabebofv1vch, $Vfplxmsntbsz)) != 1)
    {
      
      unset($Vdzqy3lrecxl);
      $this->privSwapBackMagicQuotes();

      
      return $Vvwz2kk32ujo;
    }

    
    $Vvcp134q5kqm = $this->zip_fd;
    $this->zip_fd = $Vrxb04r2etpy;
    $Vrxb04r2etpy = $Vvcp134q5kqm;

    
    $this->privCloseFd();

    
    @fclose($Vrxb04r2etpy);

    
    $this->privSwapBackMagicQuotes();

    
    
    @unlink($this->zipname);

    
    
    
    PclZipUtilRename($Vccennbuwtcc, $this->zipname);

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  function privOpenFd($Vl0aenrsopsf)
  {
    $Vvwz2kk32ujo=1;

    
    if ($this->zip_fd != 0)
    {
      
      PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Zip file \''.$this->zipname.'\' already open');

      
      return PclZip::errorCode();
    }

    
    if (($this->zip_fd = @fopen($this->zipname, $Vl0aenrsopsf)) == 0)
    {
      
      PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open archive \''.$this->zipname.'\' in '.$Vl0aenrsopsf.' mode');

      
      return PclZip::errorCode();
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  function privCloseFd()
  {
    $Vvwz2kk32ujo=1;

    if ($this->zip_fd != 0)
      @fclose($this->zip_fd);
    $this->zip_fd = 0;

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  
  

  function privAddList($Viujzhlafaca_list, &$Vmwbrc2m5pbz, &$Vzpqveiv00sn)
  {
    $Vvwz2kk32ujo=1;

    
    $Vdzqy3lrecxl = array();
    if (($Vvwz2kk32ujo = $this->privAddFileList($Viujzhlafaca_list, $Vdzqy3lrecxl, $Vzpqveiv00sn)) != 1)
    {
      
      return $Vvwz2kk32ujo;
    }

    
    $Vabebofv1vch = @ftell($this->zip_fd);

    
    for ($Vfhiq1lhsoja=0,$Vlflm1qo0gog=0; $Vfhiq1lhsoja<sizeof($Vdzqy3lrecxl); $Vfhiq1lhsoja++)
    {
      
      if ($Vdzqy3lrecxl[$Vfhiq1lhsoja]['status'] == 'ok') {
        if (($Vvwz2kk32ujo = $this->privWriteCentralFileHeader($Vdzqy3lrecxl[$Vfhiq1lhsoja])) != 1) {
          
          return $Vvwz2kk32ujo;
        }
        $Vlflm1qo0gog++;
      }

      
      $this->privConvertHeader2FileInfo($Vdzqy3lrecxl[$Vfhiq1lhsoja], $Vmwbrc2m5pbz[$Vfhiq1lhsoja]);
    }

    
    $Vfplxmsntbsz = '';
    if (isset($Vzpqveiv00sn[PCLZIP_OPT_COMMENT])) {
      $Vfplxmsntbsz = $Vzpqveiv00sn[PCLZIP_OPT_COMMENT];
    }

    
    $Vpad0k4de1le = @ftell($this->zip_fd)-$Vabebofv1vch;

    
    if (($Vvwz2kk32ujo = $this->privWriteCentralHeader($Vlflm1qo0gog, $Vpad0k4de1le, $Vabebofv1vch, $Vfplxmsntbsz)) != 1)
    {
      
      unset($Vdzqy3lrecxl);

      
      return $Vvwz2kk32ujo;
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  
  function privAddFileList($Viujzhlafaca_list, &$Vmwbrc2m5pbz, &$Vzpqveiv00sn)
  {
    $Vvwz2kk32ujo=1;
    $V1aisoupv0ls = array();

    
    $Vjdahcpfrlhw = sizeof($Vmwbrc2m5pbz);

    
    for ($Vzmnqyqjjodw=0; ($Vzmnqyqjjodw<sizeof($Viujzhlafaca_list)) && ($Vvwz2kk32ujo==1); $Vzmnqyqjjodw++) {
      
      $Viujzhlafaca_list[$Vzmnqyqjjodw]['filename']
      = PclZipUtilTranslateWinPath($Viujzhlafaca_list[$Vzmnqyqjjodw]['filename'], false);
      

      
      
      if ($Viujzhlafaca_list[$Vzmnqyqjjodw]['filename'] == "") {
        continue;
      }

      
      if (   ($Viujzhlafaca_list[$Vzmnqyqjjodw]['type'] != 'virtual_file')
          && (!file_exists($Viujzhlafaca_list[$Vzmnqyqjjodw]['filename']))) {
        PclZip::privErrorLog(PCLZIP_ERR_MISSING_FILE, "File '".$Viujzhlafaca_list[$Vzmnqyqjjodw]['filename']."' does not exist");
        return PclZip::errorCode();
      }

      
      


      if (   ($Viujzhlafaca_list[$Vzmnqyqjjodw]['type'] == 'file')
          || ($Viujzhlafaca_list[$Vzmnqyqjjodw]['type'] == 'virtual_file')
          || (   ($Viujzhlafaca_list[$Vzmnqyqjjodw]['type'] == 'folder')
              && (   !isset($Vzpqveiv00sn[PCLZIP_OPT_REMOVE_ALL_PATH])
                  || !$Vzpqveiv00sn[PCLZIP_OPT_REMOVE_ALL_PATH]))
          ) {

        
        $Vvwz2kk32ujo = $this->privAddFile($Viujzhlafaca_list[$Vzmnqyqjjodw], $V1aisoupv0ls,
                                       $Vzpqveiv00sn);
        if ($Vvwz2kk32ujo != 1) {
          return $Vvwz2kk32ujo;
        }

        
        $Vmwbrc2m5pbz[$Vjdahcpfrlhw++] = $V1aisoupv0ls;
      }
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privAddFile($Viujzhlafaca, &$V4i2thwrqnez, &$Vzpqveiv00sn)
  {
    $Vvwz2kk32ujo=1;
    
    
    $Vzujau3zcvga = $Viujzhlafaca['filename'];

    
    if ($Vzujau3zcvga == "") {
      
      PclZip::privErrorLog(PCLZIP_ERR_INVALID_PARAMETER, "Invalid file list parameter (invalid or empty list)");

      
      return PclZip::errorCode();
    }
  
    
    

    
    clearstatcache();
    $V4i2thwrqnez['version'] = 20;
    $V4i2thwrqnez['version_extracted'] = 10;
    $V4i2thwrqnez['flag'] = 0;
    $V4i2thwrqnez['compression'] = 0;
    $V4i2thwrqnez['crc'] = 0;
    $V4i2thwrqnez['compressed_size'] = 0;
    $V4i2thwrqnez['filename_len'] = strlen($Vzujau3zcvga);
    $V4i2thwrqnez['extra_len'] = 0;
    $V4i2thwrqnez['disk'] = 0;
    $V4i2thwrqnez['internal'] = 0;
    $V4i2thwrqnez['offset'] = 0;
    $V4i2thwrqnez['filename'] = $Vzujau3zcvga;

    $V4i2thwrqnez['stored_filename'] = $Viujzhlafaca['stored_filename'];
    $V4i2thwrqnez['extra'] = '';
    $V4i2thwrqnez['status'] = 'ok';
    $V4i2thwrqnez['index'] = -1;

    
    if ($Viujzhlafaca['type']=='file') {
      $V4i2thwrqnez['external'] = 0x00000000;
      $V4i2thwrqnez['size'] = filesize($Vzujau3zcvga);
    }
    
    
    else if ($Viujzhlafaca['type']=='folder') {
      $V4i2thwrqnez['external'] = 0x00000010;
      $V4i2thwrqnez['mtime'] = filemtime($Vzujau3zcvga);
      $V4i2thwrqnez['size'] = filesize($Vzujau3zcvga);
    }
    
    
    else if ($Viujzhlafaca['type'] == 'virtual_file') {
      $V4i2thwrqnez['external'] = 0x00000000;
      $V4i2thwrqnez['size'] = strlen($Viujzhlafaca['content']);
    }
    

    
    if (isset($Viujzhlafaca['mtime'])) {
      $V4i2thwrqnez['mtime'] = $Viujzhlafaca['mtime'];
    }
    else if ($Viujzhlafaca['type'] == 'virtual_file') {
      $V4i2thwrqnez['mtime'] = time();
    }
    else {
      $V4i2thwrqnez['mtime'] = filemtime($Vzujau3zcvga);
    }

    
    if (isset($Viujzhlafaca['comment'])) {
      $V4i2thwrqnez['comment_len'] = strlen($Viujzhlafaca['comment']);
      $V4i2thwrqnez['comment'] = $Viujzhlafaca['comment'];
    }
    else {
      $V4i2thwrqnez['comment_len'] = 0;
      $V4i2thwrqnez['comment'] = '';
    }

    
    if (isset($Vzpqveiv00sn[PCLZIP_CB_PRE_ADD])) {

      
      $Vkllcariladd = array();
      $this->privConvertHeader2FileInfo($V4i2thwrqnez, $Vkllcariladd);

      
      
      

      $Vvwz2kk32ujo = $Vzpqveiv00sn[PCLZIP_CB_PRE_ADD](PCLZIP_CB_PRE_ADD, $Vkllcariladd);
      if ($Vvwz2kk32ujo == 0) {
        
        $V4i2thwrqnez['status'] = "skipped";
        $Vvwz2kk32ujo = 1;
      }

      
      
      if ($V4i2thwrqnez['stored_filename'] != $Vkllcariladd['stored_filename']) {
        $V4i2thwrqnez['stored_filename'] = PclZipUtilPathReduction($Vkllcariladd['stored_filename']);
      }
    }

    
    if ($V4i2thwrqnez['stored_filename'] == "") {
      $V4i2thwrqnez['status'] = "filtered";
    }
    
    
    if (strlen($V4i2thwrqnez['stored_filename']) > 0xFF) {
      $V4i2thwrqnez['status'] = 'filename_too_long';
    }

    
    if ($V4i2thwrqnez['status'] == 'ok') {

      
      if ($Viujzhlafaca['type'] == 'file') {
        
        if ( (!isset($Vzpqveiv00sn[PCLZIP_OPT_TEMP_FILE_OFF])) 
            && (isset($Vzpqveiv00sn[PCLZIP_OPT_TEMP_FILE_ON])
                || (isset($Vzpqveiv00sn[PCLZIP_OPT_TEMP_FILE_THRESHOLD])
                    && ($Vzpqveiv00sn[PCLZIP_OPT_TEMP_FILE_THRESHOLD] <= $V4i2thwrqnez['size'])) ) ) {
          $Vvwz2kk32ujo = $this->privAddFileUsingTempFile($Viujzhlafaca, $V4i2thwrqnez, $Vzpqveiv00sn);
          if ($Vvwz2kk32ujo < PCLZIP_ERR_NO_ERROR) {
            return $Vvwz2kk32ujo;
          }
        }
        
        
        else {

        
        if (($Vcz0rmqoo2as = @fopen($Vzujau3zcvga, "rb")) == 0) {
          PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, "Unable to open file '$Vzujau3zcvga' in binary read mode");
          return PclZip::errorCode();
        }

        
        $V5iev1gb51zy = @fread($Vcz0rmqoo2as, $V4i2thwrqnez['size']);

        
        @fclose($Vcz0rmqoo2as);

        
        $V4i2thwrqnez['crc'] = @crc32($V5iev1gb51zy);
        
        
        if ($Vzpqveiv00sn[PCLZIP_OPT_NO_COMPRESSION]) {
          
          $V4i2thwrqnez['compressed_size'] = $V4i2thwrqnez['size'];
          $V4i2thwrqnez['compression'] = 0;
        }
        
        
        else {
          
          $V5iev1gb51zy = @gzdeflate($V5iev1gb51zy);

          
          $V4i2thwrqnez['compressed_size'] = strlen($V5iev1gb51zy);
          $V4i2thwrqnez['compression'] = 8;
        }
        
        
        if (($Vvwz2kk32ujo = $this->privWriteFileHeader($V4i2thwrqnez)) != 1) {
          @fclose($Vcz0rmqoo2as);
          return $Vvwz2kk32ujo;
        }

        
        @fwrite($this->zip_fd, $V5iev1gb51zy, $V4i2thwrqnez['compressed_size']);

        }

      }

      
      else if ($Viujzhlafaca['type'] == 'virtual_file') {
          
        $V5iev1gb51zy = $Viujzhlafaca['content'];

        
        $V4i2thwrqnez['crc'] = @crc32($V5iev1gb51zy);
        
        
        if ($Vzpqveiv00sn[PCLZIP_OPT_NO_COMPRESSION]) {
          
          $V4i2thwrqnez['compressed_size'] = $V4i2thwrqnez['size'];
          $V4i2thwrqnez['compression'] = 0;
        }
        
        
        else {
          
          $V5iev1gb51zy = @gzdeflate($V5iev1gb51zy);

          
          $V4i2thwrqnez['compressed_size'] = strlen($V5iev1gb51zy);
          $V4i2thwrqnez['compression'] = 8;
        }
        
        
        if (($Vvwz2kk32ujo = $this->privWriteFileHeader($V4i2thwrqnez)) != 1) {
          @fclose($Vcz0rmqoo2as);
          return $Vvwz2kk32ujo;
        }

        
        @fwrite($this->zip_fd, $V5iev1gb51zy, $V4i2thwrqnez['compressed_size']);
      }

      
      else if ($Viujzhlafaca['type'] == 'folder') {
        
        if (@substr($V4i2thwrqnez['stored_filename'], -1) != '/') {
          $V4i2thwrqnez['stored_filename'] .= '/';
        }

        
        $V4i2thwrqnez['size'] = 0;
        
        $V4i2thwrqnez['external'] = 0x00000010;   

        
        if (($Vvwz2kk32ujo = $this->privWriteFileHeader($V4i2thwrqnez)) != 1)
        {
          return $Vvwz2kk32ujo;
        }
      }
    }

    
    if (isset($Vzpqveiv00sn[PCLZIP_CB_POST_ADD])) {

      
      $Vkllcariladd = array();
      $this->privConvertHeader2FileInfo($V4i2thwrqnez, $Vkllcariladd);

      
      
      

      $Vvwz2kk32ujo = $Vzpqveiv00sn[PCLZIP_CB_POST_ADD](PCLZIP_CB_POST_ADD, $Vkllcariladd);
      if ($Vvwz2kk32ujo == 0) {
        
        $Vvwz2kk32ujo = 1;
      }

      
      
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privAddFileUsingTempFile($Viujzhlafaca, &$V4i2thwrqnez, &$Vzpqveiv00sn)
  {
    $Vvwz2kk32ujo=PCLZIP_ERR_NO_ERROR;
    
    
    $Vzujau3zcvga = $Viujzhlafaca['filename'];


    
    if (($Vcz0rmqoo2as = @fopen($Vzujau3zcvga, "rb")) == 0) {
      PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, "Unable to open file '$Vzujau3zcvga' in binary read mode");
      return PclZip::errorCode();
    }

    
    $Vvgkadacztnh = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.gz';
    if (($Vcz0rmqoo2as_compressed = @gzopen($Vvgkadacztnh, "wb")) == 0) {
      fclose($Vcz0rmqoo2as);
      PclZip::privErrorLog(PCLZIP_ERR_WRITE_OPEN_FAIL, 'Unable to open temporary file \''.$Vvgkadacztnh.'\' in binary write mode');
      return PclZip::errorCode();
    }

    
    $Vpad0k4de1le = filesize($Vzujau3zcvga);
    while ($Vpad0k4de1le != 0) {
      $Vklwhm1l4upx = ($Vpad0k4de1le < PCLZIP_READ_BLOCK_SIZE ? $Vpad0k4de1le : PCLZIP_READ_BLOCK_SIZE);
      $V1eutm0pt1vg = @fread($Vcz0rmqoo2as, $Vklwhm1l4upx);
      
      @gzputs($Vcz0rmqoo2as_compressed, $V1eutm0pt1vg, $Vklwhm1l4upx);
      $Vpad0k4de1le -= $Vklwhm1l4upx;
    }

    
    @fclose($Vcz0rmqoo2as);
    @gzclose($Vcz0rmqoo2as_compressed);

    
    if (filesize($Vvgkadacztnh) < 18) {
      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'gzip temporary file \''.$Vvgkadacztnh.'\' has invalid filesize - should be minimum 18 bytes');
      return PclZip::errorCode();
    }

    
    if (($Vcz0rmqoo2as_compressed = @fopen($Vvgkadacztnh, "rb")) == 0) {
      PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$Vvgkadacztnh.'\' in binary read mode');
      return PclZip::errorCode();
    }

    
    $Vqykbptmaj3h = @fread($Vcz0rmqoo2as_compressed, 10);
    $Vmnte3noouj3 = unpack('a1id1/a1id2/a1cm/a1flag/Vmtime/a1xfl/a1os', $Vqykbptmaj3h);

    
    $Vmnte3noouj3['os'] = bin2hex($Vmnte3noouj3['os']);

    
    @fseek($Vcz0rmqoo2as_compressed, filesize($Vvgkadacztnh)-8);
    $Vqykbptmaj3h = @fread($Vcz0rmqoo2as_compressed, 8);
    $Vvrc0eqdmwnp = unpack('Vcrc/Vcompressed_size', $Vqykbptmaj3h);

    
    $V4i2thwrqnez['compression'] = ord($Vmnte3noouj3['cm']);
    
    $V4i2thwrqnez['crc'] = $Vvrc0eqdmwnp['crc'];
    $V4i2thwrqnez['compressed_size'] = filesize($Vvgkadacztnh)-18;

    
    @fclose($Vcz0rmqoo2as_compressed);

    
    if (($Vvwz2kk32ujo = $this->privWriteFileHeader($V4i2thwrqnez)) != 1) {
      return $Vvwz2kk32ujo;
    }

    
    if (($Vcz0rmqoo2as_compressed = @fopen($Vvgkadacztnh, "rb")) == 0)
    {
      PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$Vvgkadacztnh.'\' in binary read mode');
      return PclZip::errorCode();
    }

    
    fseek($Vcz0rmqoo2as_compressed, 10);
    $Vpad0k4de1le = $V4i2thwrqnez['compressed_size'];
    while ($Vpad0k4de1le != 0)
    {
      $Vklwhm1l4upx = ($Vpad0k4de1le < PCLZIP_READ_BLOCK_SIZE ? $Vpad0k4de1le : PCLZIP_READ_BLOCK_SIZE);
      $V1eutm0pt1vg = @fread($Vcz0rmqoo2as_compressed, $Vklwhm1l4upx);
      
      @fwrite($this->zip_fd, $V1eutm0pt1vg, $Vklwhm1l4upx);
      $Vpad0k4de1le -= $Vklwhm1l4upx;
    }

    
    @fclose($Vcz0rmqoo2as_compressed);

    
    @unlink($Vvgkadacztnh);
    
    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  function privCalculateStoredFilename(&$Viujzhlafaca, &$Vzpqveiv00sn)
  {
    $Vvwz2kk32ujo=1;
    
    
    $Vzujau3zcvga = $Viujzhlafaca['filename'];
    if (isset($Vzpqveiv00sn[PCLZIP_OPT_ADD_PATH])) {
      $Vxyhk0eghdev = $Vzpqveiv00sn[PCLZIP_OPT_ADD_PATH];
    }
    else {
      $Vxyhk0eghdev = '';
    }
    if (isset($Vzpqveiv00sn[PCLZIP_OPT_REMOVE_PATH])) {
      $Vxiugbllivds = $Vzpqveiv00sn[PCLZIP_OPT_REMOVE_PATH];
    }
    else {
      $Vxiugbllivds = '';
    }
    if (isset($Vzpqveiv00sn[PCLZIP_OPT_REMOVE_ALL_PATH])) {
      $Vrwcqqmychg1 = $Vzpqveiv00sn[PCLZIP_OPT_REMOVE_ALL_PATH];
    }
    else {
      $Vrwcqqmychg1 = 0;
    }


    
    if (isset($Viujzhlafaca['new_full_name'])) {
      
      $V0irc1pbaxfb = PclZipUtilTranslateWinPath($Viujzhlafaca['new_full_name']);
    }
    
    
    else {

      
      
      if (isset($Viujzhlafaca['new_short_name'])) {
        $Vyjazhgqiclz_info = pathinfo($Vzujau3zcvga);
        $Vcjbhcic0kvk = '';
        if ($Vyjazhgqiclz_info['dirname'] != '') {
          $Vcjbhcic0kvk = $Vyjazhgqiclz_info['dirname'].'/';
        }
        $V0irc1pbaxfb = $Vcjbhcic0kvk.$Viujzhlafaca['new_short_name'];
      }
      else {
        
        $V0irc1pbaxfb = $Vzujau3zcvga;
      }

      
      if ($Vrwcqqmychg1) {
        $V0irc1pbaxfb = basename($Vzujau3zcvga);
      }
      
      else if ($Vxiugbllivds != "") {
        if (substr($Vxiugbllivds, -1) != '/')
          $Vxiugbllivds .= "/";

        if (   (substr($Vzujau3zcvga, 0, 2) == "./")
            || (substr($Vxiugbllivds, 0, 2) == "./")) {
            
          if (   (substr($Vzujau3zcvga, 0, 2) == "./")
              && (substr($Vxiugbllivds, 0, 2) != "./")) {
            $Vxiugbllivds = "./".$Vxiugbllivds;
          }
          if (   (substr($Vzujau3zcvga, 0, 2) != "./")
              && (substr($Vxiugbllivds, 0, 2) == "./")) {
            $Vxiugbllivds = substr($Vxiugbllivds, 2);
          }
        }

        $Vmm5qyw13ads = PclZipUtilPathInclusion($Vxiugbllivds,
                                             $V0irc1pbaxfb);
        if ($Vmm5qyw13ads > 0) {
          if ($Vmm5qyw13ads == 2) {
            $V0irc1pbaxfb = "";
          }
          else {
            $V0irc1pbaxfb = substr($V0irc1pbaxfb,
                                        strlen($Vxiugbllivds));
          }
        }
      }
      
      
      $V0irc1pbaxfb = PclZipUtilTranslateWinPath($V0irc1pbaxfb);
      
      
      if ($Vxyhk0eghdev != "") {
        if (substr($Vxyhk0eghdev, -1) == "/")
          $V0irc1pbaxfb = $Vxyhk0eghdev.$V0irc1pbaxfb;
        else
          $V0irc1pbaxfb = $Vxyhk0eghdev."/".$V0irc1pbaxfb;
      }
    }

    
    $V0irc1pbaxfb = PclZipUtilPathReduction($V0irc1pbaxfb);
    $Viujzhlafaca['stored_filename'] = $V0irc1pbaxfb;
    
    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privWriteFileHeader(&$V4i2thwrqnez)
  {
    $Vvwz2kk32ujo=1;

    
    $V4i2thwrqnez['offset'] = ftell($this->zip_fd);

    
    $Vvy2ara22c1m = getdate($V4i2thwrqnez['mtime']);
    $Veyv2erylzhx = ($Vvy2ara22c1m['hours']<<11) + ($Vvy2ara22c1m['minutes']<<5) + $Vvy2ara22c1m['seconds']/2;
    $Vc1r2d1whj53 = (($Vvy2ara22c1m['year']-1980)<<9) + ($Vvy2ara22c1m['mon']<<5) + $Vvy2ara22c1m['mday'];

    
    $Vqykbptmaj3h = pack("VvvvvvVVVvv", 0x04034b50,
	                      $V4i2thwrqnez['version_extracted'], $V4i2thwrqnez['flag'],
                          $V4i2thwrqnez['compression'], $Veyv2erylzhx, $Vc1r2d1whj53,
                          $V4i2thwrqnez['crc'], $V4i2thwrqnez['compressed_size'],
						  $V4i2thwrqnez['size'],
                          strlen($V4i2thwrqnez['stored_filename']),
						  $V4i2thwrqnez['extra_len']);

    
    fputs($this->zip_fd, $Vqykbptmaj3h, 30);

    
    if (strlen($V4i2thwrqnez['stored_filename']) != 0)
    {
      fputs($this->zip_fd, $V4i2thwrqnez['stored_filename'], strlen($V4i2thwrqnez['stored_filename']));
    }
    if ($V4i2thwrqnez['extra_len'] != 0)
    {
      fputs($this->zip_fd, $V4i2thwrqnez['extra'], $V4i2thwrqnez['extra_len']);
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privWriteCentralFileHeader(&$V4i2thwrqnez)
  {
    $Vvwz2kk32ujo=1;

    
    
    

    
    $Vvy2ara22c1m = getdate($V4i2thwrqnez['mtime']);
    $Veyv2erylzhx = ($Vvy2ara22c1m['hours']<<11) + ($Vvy2ara22c1m['minutes']<<5) + $Vvy2ara22c1m['seconds']/2;
    $Vc1r2d1whj53 = (($Vvy2ara22c1m['year']-1980)<<9) + ($Vvy2ara22c1m['mon']<<5) + $Vvy2ara22c1m['mday'];


    
    $Vqykbptmaj3h = pack("VvvvvvvVVVvvvvvVV", 0x02014b50,
	                      $V4i2thwrqnez['version'], $V4i2thwrqnez['version_extracted'],
                          $V4i2thwrqnez['flag'], $V4i2thwrqnez['compression'],
						  $Veyv2erylzhx, $Vc1r2d1whj53, $V4i2thwrqnez['crc'],
                          $V4i2thwrqnez['compressed_size'], $V4i2thwrqnez['size'],
                          strlen($V4i2thwrqnez['stored_filename']),
						  $V4i2thwrqnez['extra_len'], $V4i2thwrqnez['comment_len'],
                          $V4i2thwrqnez['disk'], $V4i2thwrqnez['internal'],
						  $V4i2thwrqnez['external'], $V4i2thwrqnez['offset']);

    
    fputs($this->zip_fd, $Vqykbptmaj3h, 46);

    
    if (strlen($V4i2thwrqnez['stored_filename']) != 0)
    {
      fputs($this->zip_fd, $V4i2thwrqnez['stored_filename'], strlen($V4i2thwrqnez['stored_filename']));
    }
    if ($V4i2thwrqnez['extra_len'] != 0)
    {
      fputs($this->zip_fd, $V4i2thwrqnez['extra'], $V4i2thwrqnez['extra_len']);
    }
    if ($V4i2thwrqnez['comment_len'] != 0)
    {
      fputs($this->zip_fd, $V4i2thwrqnez['comment'], $V4i2thwrqnez['comment_len']);
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privWriteCentralHeader($Vyy41mxwku01, $V4e2u1t45n13, $Vqwly3cm5ort, $V0rhav4zbz5b)
  {
    $Vvwz2kk32ujo=1;

    
    $Vqykbptmaj3h = pack("VvvvvVVv", 0x06054b50, 0, 0, $Vyy41mxwku01,
	                      $Vyy41mxwku01, $V4e2u1t45n13,
						  $Vqwly3cm5ort, strlen($V0rhav4zbz5b));

    
    fputs($this->zip_fd, $Vqykbptmaj3h, 22);

    
    if (strlen($V0rhav4zbz5b) != 0)
    {
      fputs($this->zip_fd, $V0rhav4zbz5b, strlen($V0rhav4zbz5b));
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privList(&$Vze5xxte3b11)
  {
    $Vvwz2kk32ujo=1;

    
    $this->privDisableMagicQuotes();

    
    if (($this->zip_fd = @fopen($this->zipname, 'rb')) == 0)
    {
      
      $this->privSwapBackMagicQuotes();
      
      
      PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open archive \''.$this->zipname.'\' in binary read mode');

      
      return PclZip::errorCode();
    }

    
    $Vwxw0zfajc1a = array();
    if (($Vvwz2kk32ujo = $this->privReadEndCentralDir($Vwxw0zfajc1a)) != 1)
    {
      $this->privSwapBackMagicQuotes();
      return $Vvwz2kk32ujo;
    }

    
    @rewind($this->zip_fd);
    if (@fseek($this->zip_fd, $Vwxw0zfajc1a['offset']))
    {
      $this->privSwapBackMagicQuotes();

      
      PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

      
      return PclZip::errorCode();
    }

    
    for ($Vfhiq1lhsoja=0; $Vfhiq1lhsoja<$Vwxw0zfajc1a['entries']; $Vfhiq1lhsoja++)
    {
      
      if (($Vvwz2kk32ujo = $this->privReadCentralFileHeader($V1aisoupv0ls)) != 1)
      {
        $this->privSwapBackMagicQuotes();
        return $Vvwz2kk32ujo;
      }
      $V1aisoupv0ls['index'] = $Vfhiq1lhsoja;

      
      $this->privConvertHeader2FileInfo($V1aisoupv0ls, $Vze5xxte3b11[$Vfhiq1lhsoja]);
      unset($V1aisoupv0ls);
    }

    
    $this->privCloseFd();

    
    $this->privSwapBackMagicQuotes();

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function privConvertHeader2FileInfo($V4i2thwrqnez, &$Vh1rzwq5ry2n)
  {
    $Vvwz2kk32ujo=1;

    
    $Vmt3d2s5xoas = PclZipUtilPathReduction($V4i2thwrqnez['filename']);
    $Vh1rzwq5ry2n['filename'] = $Vmt3d2s5xoas;
    $Vmt3d2s5xoas = PclZipUtilPathReduction($V4i2thwrqnez['stored_filename']);
    $Vh1rzwq5ry2n['stored_filename'] = $Vmt3d2s5xoas;
    $Vh1rzwq5ry2n['size'] = $V4i2thwrqnez['size'];
    $Vh1rzwq5ry2n['compressed_size'] = $V4i2thwrqnez['compressed_size'];
    $Vh1rzwq5ry2n['mtime'] = $V4i2thwrqnez['mtime'];
    $Vh1rzwq5ry2n['comment'] = $V4i2thwrqnez['comment'];
    $Vh1rzwq5ry2n['folder'] = (($V4i2thwrqnez['external']&0x00000010)==0x00000010);
    $Vh1rzwq5ry2n['index'] = $V4i2thwrqnez['index'];
    $Vh1rzwq5ry2n['status'] = $V4i2thwrqnez['status'];
    $Vh1rzwq5ry2n['crc'] = $V4i2thwrqnez['crc'];

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function privExtractByRule(&$V1kr0oweglpx, $V1l2aaxcwypz, $Vgc3nnvuns3x, $Vpqb0fgyxdd5, &$Vzpqveiv00sn)
  {
    $Vvwz2kk32ujo=1;

    
    $this->privDisableMagicQuotes();

    
    if (   ($V1l2aaxcwypz == "")
	    || (   (substr($V1l2aaxcwypz, 0, 1) != "/")
		    && (substr($V1l2aaxcwypz, 0, 3) != "../")
			&& (substr($V1l2aaxcwypz,1,2)!=":/")))
      $V1l2aaxcwypz = "./".$V1l2aaxcwypz;

    
    if (($V1l2aaxcwypz != "./") && ($V1l2aaxcwypz != "/"))
    {
      
      while (substr($V1l2aaxcwypz, -1) == "/")
      {
        $V1l2aaxcwypz = substr($V1l2aaxcwypz, 0, strlen($V1l2aaxcwypz)-1);
      }
    }

    
    if (($Vgc3nnvuns3x != "") && (substr($Vgc3nnvuns3x, -1) != '/'))
    {
      $Vgc3nnvuns3x .= '/';
    }
    $Vgc3nnvuns3x_size = strlen($Vgc3nnvuns3x);

    
    if (($Vvwz2kk32ujo = $this->privOpenFd('rb')) != 1)
    {
      $this->privSwapBackMagicQuotes();
      return $Vvwz2kk32ujo;
    }

    
    $Vwxw0zfajc1a = array();
    if (($Vvwz2kk32ujo = $this->privReadEndCentralDir($Vwxw0zfajc1a)) != 1)
    {
      
      $this->privCloseFd();
      $this->privSwapBackMagicQuotes();

      return $Vvwz2kk32ujo;
    }

    
    $Vssj5rb2mbkr = $Vwxw0zfajc1a['offset'];

    
    $Vzmnqyqjjodw_start = 0;
    for ($Vfhiq1lhsoja=0, $Vjdahcpfrlhw_extracted=0; $Vfhiq1lhsoja<$Vwxw0zfajc1a['entries']; $Vfhiq1lhsoja++)
    {

      
      @rewind($this->zip_fd);
      if (@fseek($this->zip_fd, $Vssj5rb2mbkr))
      {
        
        $this->privCloseFd();
        $this->privSwapBackMagicQuotes();

        
        PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

        
        return PclZip::errorCode();
      }

      
      $V1aisoupv0ls = array();
      if (($Vvwz2kk32ujo = $this->privReadCentralFileHeader($V1aisoupv0ls)) != 1)
      {
        
        $this->privCloseFd();
        $this->privSwapBackMagicQuotes();

        return $Vvwz2kk32ujo;
      }

      
      $V1aisoupv0ls['index'] = $Vfhiq1lhsoja;

      
      $Vssj5rb2mbkr = ftell($this->zip_fd);

      
      $Vtdssrrracnw = false;

      
      if (   (isset($Vzpqveiv00sn[PCLZIP_OPT_BY_NAME]))
          && ($Vzpqveiv00sn[PCLZIP_OPT_BY_NAME] != 0)) {

          
          for ($Vzmnqyqjjodw=0; ($Vzmnqyqjjodw<sizeof($Vzpqveiv00sn[PCLZIP_OPT_BY_NAME])) && (!$Vtdssrrracnw); $Vzmnqyqjjodw++) {

              
              if (substr($Vzpqveiv00sn[PCLZIP_OPT_BY_NAME][$Vzmnqyqjjodw], -1) == "/") {

                  
                  if (   (strlen($V1aisoupv0ls['stored_filename']) > strlen($Vzpqveiv00sn[PCLZIP_OPT_BY_NAME][$Vzmnqyqjjodw]))
                      && (substr($V1aisoupv0ls['stored_filename'], 0, strlen($Vzpqveiv00sn[PCLZIP_OPT_BY_NAME][$Vzmnqyqjjodw])) == $Vzpqveiv00sn[PCLZIP_OPT_BY_NAME][$Vzmnqyqjjodw])) {
                      $Vtdssrrracnw = true;
                  }
              }
              
              elseif ($V1aisoupv0ls['stored_filename'] == $Vzpqveiv00sn[PCLZIP_OPT_BY_NAME][$Vzmnqyqjjodw]) {
                  $Vtdssrrracnw = true;
              }
          }
      }

      
      
      

      
      else if (   (isset($Vzpqveiv00sn[PCLZIP_OPT_BY_PREG]))
               && ($Vzpqveiv00sn[PCLZIP_OPT_BY_PREG] != "")) {

          if (preg_match($Vzpqveiv00sn[PCLZIP_OPT_BY_PREG], $V1aisoupv0ls['stored_filename'])) {
              $Vtdssrrracnw = true;
          }
      }

      
      else if (   (isset($Vzpqveiv00sn[PCLZIP_OPT_BY_INDEX]))
               && ($Vzpqveiv00sn[PCLZIP_OPT_BY_INDEX] != 0)) {
          
          
          for ($Vzmnqyqjjodw=$Vzmnqyqjjodw_start; ($Vzmnqyqjjodw<sizeof($Vzpqveiv00sn[PCLZIP_OPT_BY_INDEX])) && (!$Vtdssrrracnw); $Vzmnqyqjjodw++) {

              if (($Vfhiq1lhsoja>=$Vzpqveiv00sn[PCLZIP_OPT_BY_INDEX][$Vzmnqyqjjodw]['start']) && ($Vfhiq1lhsoja<=$Vzpqveiv00sn[PCLZIP_OPT_BY_INDEX][$Vzmnqyqjjodw]['end'])) {
                  $Vtdssrrracnw = true;
              }
              if ($Vfhiq1lhsoja>=$Vzpqveiv00sn[PCLZIP_OPT_BY_INDEX][$Vzmnqyqjjodw]['end']) {
                  $Vzmnqyqjjodw_start = $Vzmnqyqjjodw+1;
              }

              if ($Vzpqveiv00sn[PCLZIP_OPT_BY_INDEX][$Vzmnqyqjjodw]['start']>$Vfhiq1lhsoja) {
                  break;
              }
          }
      }

      
      else {
          $Vtdssrrracnw = true;
      }

	  
	  if (   ($Vtdssrrracnw)
	      && (   ($V1aisoupv0ls['compression'] != 8)
		      && ($V1aisoupv0ls['compression'] != 0))) {
          $V1aisoupv0ls['status'] = 'unsupported_compression';

          
          if (   (isset($Vzpqveiv00sn[PCLZIP_OPT_STOP_ON_ERROR]))
		      && ($Vzpqveiv00sn[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

              $this->privSwapBackMagicQuotes();
              
              PclZip::privErrorLog(PCLZIP_ERR_UNSUPPORTED_COMPRESSION,
			                       "Filename '".$V1aisoupv0ls['stored_filename']."' is "
				  	    	  	   ."compressed by an unsupported compression "
				  	    	  	   ."method (".$V1aisoupv0ls['compression'].") ");

              return PclZip::errorCode();
		  }
	  }
	  
	  
	  if (($Vtdssrrracnw) && (($V1aisoupv0ls['flag'] & 1) == 1)) {
          $V1aisoupv0ls['status'] = 'unsupported_encryption';

          
          if (   (isset($Vzpqveiv00sn[PCLZIP_OPT_STOP_ON_ERROR]))
		      && ($Vzpqveiv00sn[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

              $this->privSwapBackMagicQuotes();

              PclZip::privErrorLog(PCLZIP_ERR_UNSUPPORTED_ENCRYPTION,
			                       "Unsupported encryption for "
				  	    	  	   ." filename '".$V1aisoupv0ls['stored_filename']
								   ."'");

              return PclZip::errorCode();
		  }
    }

      
      if (($Vtdssrrracnw) && ($V1aisoupv0ls['status'] != 'ok')) {
          $Vvwz2kk32ujo = $this->privConvertHeader2FileInfo($V1aisoupv0ls,
		                                        $V1kr0oweglpx[$Vjdahcpfrlhw_extracted++]);
          if ($Vvwz2kk32ujo != 1) {
              $this->privCloseFd();
              $this->privSwapBackMagicQuotes();
              return $Vvwz2kk32ujo;
          }

          $Vtdssrrracnw = false;
      }
      
      
      if ($Vtdssrrracnw)
      {

        
        @rewind($this->zip_fd);
        if (@fseek($this->zip_fd, $V1aisoupv0ls['offset']))
        {
          
          $this->privCloseFd();

          $this->privSwapBackMagicQuotes();

          
          PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

          
          return PclZip::errorCode();
        }

        
        if ($Vzpqveiv00sn[PCLZIP_OPT_EXTRACT_AS_STRING]) {

          $Vwzjho0jphmh = '';

          
          $Vvwz2kk32ujo1 = $this->privExtractFileAsString($V1aisoupv0ls, $Vwzjho0jphmh, $Vzpqveiv00sn);
          if ($Vvwz2kk32ujo1 < 1) {
            $this->privCloseFd();
            $this->privSwapBackMagicQuotes();
            return $Vvwz2kk32ujo1;
          }

          
          if (($Vvwz2kk32ujo = $this->privConvertHeader2FileInfo($V1aisoupv0ls, $V1kr0oweglpx[$Vjdahcpfrlhw_extracted])) != 1)
          {
            
            $this->privCloseFd();
            $this->privSwapBackMagicQuotes();

            return $Vvwz2kk32ujo;
          }

          
          $V1kr0oweglpx[$Vjdahcpfrlhw_extracted]['content'] = $Vwzjho0jphmh;

          
          $Vjdahcpfrlhw_extracted++;
          
          
          if ($Vvwz2kk32ujo1 == 2) {
          	break;
          }
        }
        
        elseif (   (isset($Vzpqveiv00sn[PCLZIP_OPT_EXTRACT_IN_OUTPUT]))
		        && ($Vzpqveiv00sn[PCLZIP_OPT_EXTRACT_IN_OUTPUT])) {
          
          $Vvwz2kk32ujo1 = $this->privExtractFileInOutput($V1aisoupv0ls, $Vzpqveiv00sn);
          if ($Vvwz2kk32ujo1 < 1) {
            $this->privCloseFd();
            $this->privSwapBackMagicQuotes();
            return $Vvwz2kk32ujo1;
          }

          
          if (($Vvwz2kk32ujo = $this->privConvertHeader2FileInfo($V1aisoupv0ls, $V1kr0oweglpx[$Vjdahcpfrlhw_extracted++])) != 1) {
            $this->privCloseFd();
            $this->privSwapBackMagicQuotes();
            return $Vvwz2kk32ujo;
          }

          
          if ($Vvwz2kk32ujo1 == 2) {
          	break;
          }
        }
        
        else {
          
          $Vvwz2kk32ujo1 = $this->privExtractFile($V1aisoupv0ls,
		                                      $V1l2aaxcwypz, $Vgc3nnvuns3x,
											  $Vpqb0fgyxdd5,
											  $Vzpqveiv00sn);
          if ($Vvwz2kk32ujo1 < 1) {
            $this->privCloseFd();
            $this->privSwapBackMagicQuotes();
            return $Vvwz2kk32ujo1;
          }

          
          if (($Vvwz2kk32ujo = $this->privConvertHeader2FileInfo($V1aisoupv0ls, $V1kr0oweglpx[$Vjdahcpfrlhw_extracted++])) != 1)
          {
            
            $this->privCloseFd();
            $this->privSwapBackMagicQuotes();

            return $Vvwz2kk32ujo;
          }

          
          if ($Vvwz2kk32ujo1 == 2) {
          	break;
          }
        }
      }
    }

    
    $this->privCloseFd();
    $this->privSwapBackMagicQuotes();

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  
  function privExtractFile(&$Vygeyw2odpmj, $V1l2aaxcwypz, $Vgc3nnvuns3x, $Vpqb0fgyxdd5, &$Vzpqveiv00sn)
  {
    $Vvwz2kk32ujo=1;

    
    if (($Vvwz2kk32ujo = $this->privReadFileHeader($V1aisoupv0ls)) != 1)
    {
      
      return $Vvwz2kk32ujo;
    }


    
    if ($this->privCheckFileHeaders($V1aisoupv0ls, $Vygeyw2odpmj) != 1) {
        
    }

    
    if ($Vpqb0fgyxdd5 == true) {
        
        if (($Vygeyw2odpmj['external']&0x00000010)==0x00000010) {

            $Vygeyw2odpmj['status'] = "filtered";

            return $Vvwz2kk32ujo;
        }

        
        $Vygeyw2odpmj['filename'] = basename($Vygeyw2odpmj['filename']);
    }

    
    else if ($Vgc3nnvuns3x != "")
    {
      if (PclZipUtilPathInclusion($Vgc3nnvuns3x, $Vygeyw2odpmj['filename']) == 2)
      {

        
        $Vygeyw2odpmj['status'] = "filtered";

        
        return $Vvwz2kk32ujo;
      }

      $Vgc3nnvuns3x_size = strlen($Vgc3nnvuns3x);
      if (substr($Vygeyw2odpmj['filename'], 0, $Vgc3nnvuns3x_size) == $Vgc3nnvuns3x)
      {

        
        $Vygeyw2odpmj['filename'] = substr($Vygeyw2odpmj['filename'], $Vgc3nnvuns3x_size);

      }
    }

    
    if ($V1l2aaxcwypz != '') {
      $Vygeyw2odpmj['filename'] = $V1l2aaxcwypz."/".$Vygeyw2odpmj['filename'];
    }
    
    
    if (isset($Vzpqveiv00sn[PCLZIP_OPT_EXTRACT_DIR_RESTRICTION])) {
      $Vhj5kaoiwwbs
      = PclZipUtilPathInclusion($Vzpqveiv00sn[PCLZIP_OPT_EXTRACT_DIR_RESTRICTION],
                                $Vygeyw2odpmj['filename']); 
      if ($Vhj5kaoiwwbs == 0) {

        PclZip::privErrorLog(PCLZIP_ERR_DIRECTORY_RESTRICTION,
			                     "Filename '".$Vygeyw2odpmj['filename']."' is "
								 ."outside PCLZIP_OPT_EXTRACT_DIR_RESTRICTION");

        return PclZip::errorCode();
      }
    }

    
    if (isset($Vzpqveiv00sn[PCLZIP_CB_PRE_EXTRACT])) {

      
      $Vkllcariladd = array();
      $this->privConvertHeader2FileInfo($Vygeyw2odpmj, $Vkllcariladd);

      
      
      

      $Vvwz2kk32ujo = $Vzpqveiv00sn[PCLZIP_CB_PRE_EXTRACT](PCLZIP_CB_PRE_EXTRACT, $Vkllcariladd);
      if ($Vvwz2kk32ujo == 0) {
        
        $Vygeyw2odpmj['status'] = "skipped";
        $Vvwz2kk32ujo = 1;
      }
      
      
      if ($Vvwz2kk32ujo == 2) {
        
        $Vygeyw2odpmj['status'] = "aborted";
      	$Vvwz2kk32ujo = PCLZIP_ERR_USER_ABORTED;
      }

      
      
      $Vygeyw2odpmj['filename'] = $Vkllcariladd['filename'];
    }


    
    if ($Vygeyw2odpmj['status'] == 'ok') {

    
    if (file_exists($Vygeyw2odpmj['filename']))
    {

      
      if (is_dir($Vygeyw2odpmj['filename']))
      {

        
        $Vygeyw2odpmj['status'] = "already_a_directory";
        
        
        
        
        if (   (isset($Vzpqveiv00sn[PCLZIP_OPT_STOP_ON_ERROR]))
		    && ($Vzpqveiv00sn[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

            PclZip::privErrorLog(PCLZIP_ERR_ALREADY_A_DIRECTORY,
			                     "Filename '".$Vygeyw2odpmj['filename']."' is "
								 ."already used by an existing directory");

            return PclZip::errorCode();
		    }
      }
      
      else if (!is_writeable($Vygeyw2odpmj['filename']))
      {

        
        $Vygeyw2odpmj['status'] = "write_protected";

        
        
        
        if (   (isset($Vzpqveiv00sn[PCLZIP_OPT_STOP_ON_ERROR]))
		    && ($Vzpqveiv00sn[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

            PclZip::privErrorLog(PCLZIP_ERR_WRITE_OPEN_FAIL,
			                     "Filename '".$Vygeyw2odpmj['filename']."' exists "
								 ."and is write protected");

            return PclZip::errorCode();
		    }
      }

      
      else if (filemtime($Vygeyw2odpmj['filename']) > $Vygeyw2odpmj['mtime'])
      {
        
        if (   (isset($Vzpqveiv00sn[PCLZIP_OPT_REPLACE_NEWER]))
		    && ($Vzpqveiv00sn[PCLZIP_OPT_REPLACE_NEWER]===true)) {
	  	  }
		    else {
            $Vygeyw2odpmj['status'] = "newer_exist";

            
            
            
            if (   (isset($Vzpqveiv00sn[PCLZIP_OPT_STOP_ON_ERROR]))
		        && ($Vzpqveiv00sn[PCLZIP_OPT_STOP_ON_ERROR]===true)) {

                PclZip::privErrorLog(PCLZIP_ERR_WRITE_OPEN_FAIL,
			             "Newer version of '".$Vygeyw2odpmj['filename']."' exists "
					    ."and option PCLZIP_OPT_REPLACE_NEWER is not selected");

                return PclZip::errorCode();
		      }
		    }
      }
      else {
      }
    }

    
    else {
      if ((($Vygeyw2odpmj['external']&0x00000010)==0x00000010) || (substr($Vygeyw2odpmj['filename'], -1) == '/'))
        $Vcjbhcic0kvk_to_check = $Vygeyw2odpmj['filename'];
      else if (!strstr($Vygeyw2odpmj['filename'], "/"))
        $Vcjbhcic0kvk_to_check = "";
      else
        $Vcjbhcic0kvk_to_check = dirname($Vygeyw2odpmj['filename']);

        if (($Vvwz2kk32ujo = $this->privDirCheck($Vcjbhcic0kvk_to_check, (($Vygeyw2odpmj['external']&0x00000010)==0x00000010))) != 1) {
  
          
          $Vygeyw2odpmj['status'] = "path_creation_fail";
  
          
          
          $Vvwz2kk32ujo = 1;
        }
      }
    }

    
    if ($Vygeyw2odpmj['status'] == 'ok') {

      
      if (!(($Vygeyw2odpmj['external']&0x00000010)==0x00000010))
      {
        
        if ($Vygeyw2odpmj['compression'] == 0) {

    		  
          if (($Vha10pxvonqy = @fopen($Vygeyw2odpmj['filename'], 'wb')) == 0)
          {

            
            $Vygeyw2odpmj['status'] = "write_error";

            
            return $Vvwz2kk32ujo;
          }


          
          $Vpad0k4de1le = $Vygeyw2odpmj['compressed_size'];
          while ($Vpad0k4de1le != 0)
          {
            $Vklwhm1l4upx = ($Vpad0k4de1le < PCLZIP_READ_BLOCK_SIZE ? $Vpad0k4de1le : PCLZIP_READ_BLOCK_SIZE);
            $V1eutm0pt1vg = @fread($this->zip_fd, $Vklwhm1l4upx);
            
            @fwrite($Vha10pxvonqy, $V1eutm0pt1vg, $Vklwhm1l4upx);            
            $Vpad0k4de1le -= $Vklwhm1l4upx;
          }

          
          fclose($Vha10pxvonqy);

          
          touch($Vygeyw2odpmj['filename'], $Vygeyw2odpmj['mtime']);
          

        }
        else {
          
          
          if (($Vygeyw2odpmj['flag'] & 1) == 1) {
            PclZip::privErrorLog(PCLZIP_ERR_UNSUPPORTED_ENCRYPTION, 'File \''.$Vygeyw2odpmj['filename'].'\' is encrypted. Encrypted files are not supported.');
            return PclZip::errorCode();
          }


          
          if ( (!isset($Vzpqveiv00sn[PCLZIP_OPT_TEMP_FILE_OFF])) 
              && (isset($Vzpqveiv00sn[PCLZIP_OPT_TEMP_FILE_ON])
                  || (isset($Vzpqveiv00sn[PCLZIP_OPT_TEMP_FILE_THRESHOLD])
                      && ($Vzpqveiv00sn[PCLZIP_OPT_TEMP_FILE_THRESHOLD] <= $Vygeyw2odpmj['size'])) ) ) {
            $Vvwz2kk32ujo = $this->privExtractFileUsingTempFile($Vygeyw2odpmj, $Vzpqveiv00sn);
            if ($Vvwz2kk32ujo < PCLZIP_ERR_NO_ERROR) {
              return $Vvwz2kk32ujo;
            }
          }
          
          
          else {

          
            
            $V1eutm0pt1vg = @fread($this->zip_fd, $Vygeyw2odpmj['compressed_size']);
            
            
            $Vcz0rmqoo2as_content = @gzinflate($V1eutm0pt1vg);
            unset($V1eutm0pt1vg);
            if ($Vcz0rmqoo2as_content === FALSE) {
  
              
              
              $Vygeyw2odpmj['status'] = "error";
              
              return $Vvwz2kk32ujo;
            }
            
            
            if (($Vha10pxvonqy = @fopen($Vygeyw2odpmj['filename'], 'wb')) == 0) {
  
              
              $Vygeyw2odpmj['status'] = "write_error";
  
              return $Vvwz2kk32ujo;
            }
  
            
            @fwrite($Vha10pxvonqy, $Vcz0rmqoo2as_content, $Vygeyw2odpmj['size']);
            unset($Vcz0rmqoo2as_content);
  
            
            @fclose($Vha10pxvonqy);
            
          }

          
          @touch($Vygeyw2odpmj['filename'], $Vygeyw2odpmj['mtime']);
        }

        
        if (isset($Vzpqveiv00sn[PCLZIP_OPT_SET_CHMOD])) {

          
          @chmod($Vygeyw2odpmj['filename'], $Vzpqveiv00sn[PCLZIP_OPT_SET_CHMOD]);
        }

      }
    }

  	
  	if ($Vygeyw2odpmj['status'] == "aborted") {
        $Vygeyw2odpmj['status'] = "skipped";
  	}
	
    
    elseif (isset($Vzpqveiv00sn[PCLZIP_CB_POST_EXTRACT])) {

      
      $Vkllcariladd = array();
      $this->privConvertHeader2FileInfo($Vygeyw2odpmj, $Vkllcariladd);

      
      
      

      $Vvwz2kk32ujo = $Vzpqveiv00sn[PCLZIP_CB_POST_EXTRACT](PCLZIP_CB_POST_EXTRACT, $Vkllcariladd);

      
      if ($Vvwz2kk32ujo == 2) {
      	$Vvwz2kk32ujo = PCLZIP_ERR_USER_ABORTED;
      }
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privExtractFileUsingTempFile(&$Vygeyw2odpmj, &$Vzpqveiv00sn)
  {
    $Vvwz2kk32ujo=1;
        
    
    $Vvgkadacztnh = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.gz';
    if (($Vha10pxvonqy = @fopen($Vvgkadacztnh, "wb")) == 0) {
      fclose($Vcz0rmqoo2as);
      PclZip::privErrorLog(PCLZIP_ERR_WRITE_OPEN_FAIL, 'Unable to open temporary file \''.$Vvgkadacztnh.'\' in binary write mode');
      return PclZip::errorCode();
    }


    
    $Vqykbptmaj3h = pack('va1a1Va1a1', 0x8b1f, Chr($Vygeyw2odpmj['compression']), Chr(0x00), time(), Chr(0x00), Chr(3));
    @fwrite($Vha10pxvonqy, $Vqykbptmaj3h, 10);

    
    $Vpad0k4de1le = $Vygeyw2odpmj['compressed_size'];
    while ($Vpad0k4de1le != 0)
    {
      $Vklwhm1l4upx = ($Vpad0k4de1le < PCLZIP_READ_BLOCK_SIZE ? $Vpad0k4de1le : PCLZIP_READ_BLOCK_SIZE);
      $V1eutm0pt1vg = @fread($this->zip_fd, $Vklwhm1l4upx);
      
      @fwrite($Vha10pxvonqy, $V1eutm0pt1vg, $Vklwhm1l4upx);
      $Vpad0k4de1le -= $Vklwhm1l4upx;
    }

    
    $Vqykbptmaj3h = pack('VV', $Vygeyw2odpmj['crc'], $Vygeyw2odpmj['size']);
    @fwrite($Vha10pxvonqy, $Vqykbptmaj3h, 8);

    
    @fclose($Vha10pxvonqy);

    
    if (($Vha10pxvonqy = @fopen($Vygeyw2odpmj['filename'], 'wb')) == 0) {
      $Vygeyw2odpmj['status'] = "write_error";
      return $Vvwz2kk32ujo;
    }

    
    if (($Vq40rylyrtcu = @gzopen($Vvgkadacztnh, 'rb')) == 0) {
      @fclose($Vha10pxvonqy);
      $Vygeyw2odpmj['status'] = "read_error";
      PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$Vvgkadacztnh.'\' in binary read mode');
      return PclZip::errorCode();
    }


    
    $Vpad0k4de1le = $Vygeyw2odpmj['size'];
    while ($Vpad0k4de1le != 0) {
      $Vklwhm1l4upx = ($Vpad0k4de1le < PCLZIP_READ_BLOCK_SIZE ? $Vpad0k4de1le : PCLZIP_READ_BLOCK_SIZE);
      $V1eutm0pt1vg = @gzread($Vq40rylyrtcu, $Vklwhm1l4upx);
      
      @fwrite($Vha10pxvonqy, $V1eutm0pt1vg, $Vklwhm1l4upx);
      $Vpad0k4de1le -= $Vklwhm1l4upx;
    }
    @fclose($Vha10pxvonqy);
    @gzclose($Vq40rylyrtcu);

    
    @unlink($Vvgkadacztnh);
    
    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privExtractFileInOutput(&$Vygeyw2odpmj, &$Vzpqveiv00sn)
  {
    $Vvwz2kk32ujo=1;

    
    if (($Vvwz2kk32ujo = $this->privReadFileHeader($V1aisoupv0ls)) != 1) {
      return $Vvwz2kk32ujo;
    }


    
    if ($this->privCheckFileHeaders($V1aisoupv0ls, $Vygeyw2odpmj) != 1) {
        
    }

    
    if (isset($Vzpqveiv00sn[PCLZIP_CB_PRE_EXTRACT])) {

      
      $Vkllcariladd = array();
      $this->privConvertHeader2FileInfo($Vygeyw2odpmj, $Vkllcariladd);

      
      
      

      $Vvwz2kk32ujo = $Vzpqveiv00sn[PCLZIP_CB_PRE_EXTRACT](PCLZIP_CB_PRE_EXTRACT, $Vkllcariladd);
      if ($Vvwz2kk32ujo == 0) {
        
        $Vygeyw2odpmj['status'] = "skipped";
        $Vvwz2kk32ujo = 1;
      }

      
      if ($Vvwz2kk32ujo == 2) {
        
        $Vygeyw2odpmj['status'] = "aborted";
      	$Vvwz2kk32ujo = PCLZIP_ERR_USER_ABORTED;
      }

      
      
      $Vygeyw2odpmj['filename'] = $Vkllcariladd['filename'];
    }

    

    
    if ($Vygeyw2odpmj['status'] == 'ok') {

      
      if (!(($Vygeyw2odpmj['external']&0x00000010)==0x00000010)) {
        
        if ($Vygeyw2odpmj['compressed_size'] == $Vygeyw2odpmj['size']) {

          
          $V1eutm0pt1vg = @fread($this->zip_fd, $Vygeyw2odpmj['compressed_size']);

          
          echo $V1eutm0pt1vg;
          unset($V1eutm0pt1vg);
        }
        else {

          
          $V1eutm0pt1vg = @fread($this->zip_fd, $Vygeyw2odpmj['compressed_size']);
          
          
          $Vcz0rmqoo2as_content = gzinflate($V1eutm0pt1vg);
          unset($V1eutm0pt1vg);

          
          echo $Vcz0rmqoo2as_content;
          unset($Vcz0rmqoo2as_content);
        }
      }
    }

	
	if ($Vygeyw2odpmj['status'] == "aborted") {
      $Vygeyw2odpmj['status'] = "skipped";
	}

    
    elseif (isset($Vzpqveiv00sn[PCLZIP_CB_POST_EXTRACT])) {

      
      $Vkllcariladd = array();
      $this->privConvertHeader2FileInfo($Vygeyw2odpmj, $Vkllcariladd);

      
      
      

      $Vvwz2kk32ujo = $Vzpqveiv00sn[PCLZIP_CB_POST_EXTRACT](PCLZIP_CB_POST_EXTRACT, $Vkllcariladd);

      
      if ($Vvwz2kk32ujo == 2) {
      	$Vvwz2kk32ujo = PCLZIP_ERR_USER_ABORTED;
      }
    }

    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privExtractFileAsString(&$Vygeyw2odpmj, &$Vkn3o4cgvguq, &$Vzpqveiv00sn)
  {
    $Vvwz2kk32ujo=1;

    
    $V1aisoupv0ls = array();
    if (($Vvwz2kk32ujo = $this->privReadFileHeader($V1aisoupv0ls)) != 1)
    {
      
      return $Vvwz2kk32ujo;
    }


    
    if ($this->privCheckFileHeaders($V1aisoupv0ls, $Vygeyw2odpmj) != 1) {
        
    }

    
    if (isset($Vzpqveiv00sn[PCLZIP_CB_PRE_EXTRACT])) {

      
      $Vkllcariladd = array();
      $this->privConvertHeader2FileInfo($Vygeyw2odpmj, $Vkllcariladd);

      
      
      

      $Vvwz2kk32ujo = $Vzpqveiv00sn[PCLZIP_CB_PRE_EXTRACT](PCLZIP_CB_PRE_EXTRACT, $Vkllcariladd);
      if ($Vvwz2kk32ujo == 0) {
        
        $Vygeyw2odpmj['status'] = "skipped";
        $Vvwz2kk32ujo = 1;
      }
      
      
      if ($Vvwz2kk32ujo == 2) {
        
        $Vygeyw2odpmj['status'] = "aborted";
      	$Vvwz2kk32ujo = PCLZIP_ERR_USER_ABORTED;
      }

      
      
      $Vygeyw2odpmj['filename'] = $Vkllcariladd['filename'];
    }


    
    if ($Vygeyw2odpmj['status'] == 'ok') {

      
      if (!(($Vygeyw2odpmj['external']&0x00000010)==0x00000010)) {
        
  
        if ($Vygeyw2odpmj['compression'] == 0) {
  
          
          $Vkn3o4cgvguq = @fread($this->zip_fd, $Vygeyw2odpmj['compressed_size']);
        }
        else {
  
          
          $Vntf43kw1jlt = @fread($this->zip_fd, $Vygeyw2odpmj['compressed_size']);
          
          
          if (($Vkn3o4cgvguq = @gzinflate($Vntf43kw1jlt)) === FALSE) {
              
          }
        }
  
        
      }
      else {
          
      }
      
    }

  	
  	if ($Vygeyw2odpmj['status'] == "aborted") {
        $Vygeyw2odpmj['status'] = "skipped";
  	}
	
    
    elseif (isset($Vzpqveiv00sn[PCLZIP_CB_POST_EXTRACT])) {

      
      $Vkllcariladd = array();
      $this->privConvertHeader2FileInfo($Vygeyw2odpmj, $Vkllcariladd);
      
      
      $Vkllcariladd['content'] = $Vkn3o4cgvguq;
      $Vkn3o4cgvguq = '';

      
      
      

      $Vvwz2kk32ujo = $Vzpqveiv00sn[PCLZIP_CB_POST_EXTRACT](PCLZIP_CB_POST_EXTRACT, $Vkllcariladd);

      
      $Vkn3o4cgvguq = $Vkllcariladd['content'];
      unset($Vkllcariladd['content']);

      
      if ($Vvwz2kk32ujo == 2) {
      	$Vvwz2kk32ujo = PCLZIP_ERR_USER_ABORTED;
      }
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privReadFileHeader(&$V4i2thwrqnez)
  {
    $Vvwz2kk32ujo=1;

    
    $Vqykbptmaj3h = @fread($this->zip_fd, 4);
    $Vntf43kw1jlt = unpack('Vid', $Vqykbptmaj3h);

    
    if ($Vntf43kw1jlt['id'] != 0x04034b50)
    {

      
      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Invalid archive structure');

      
      return PclZip::errorCode();
    }

    
    $Vqykbptmaj3h = fread($this->zip_fd, 26);

    
    if (strlen($Vqykbptmaj3h) != 26)
    {
      $V4i2thwrqnez['filename'] = "";
      $V4i2thwrqnez['status'] = "invalid_header";

      
      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, "Invalid block size : ".strlen($Vqykbptmaj3h));

      
      return PclZip::errorCode();
    }

    
    $Vntf43kw1jlt = unpack('vversion/vflag/vcompression/vmtime/vmdate/Vcrc/Vcompressed_size/Vsize/vfilename_len/vextra_len', $Vqykbptmaj3h);

    
    $V4i2thwrqnez['filename'] = fread($this->zip_fd, $Vntf43kw1jlt['filename_len']);

    
    if ($Vntf43kw1jlt['extra_len'] != 0) {
      $V4i2thwrqnez['extra'] = fread($this->zip_fd, $Vntf43kw1jlt['extra_len']);
    }
    else {
      $V4i2thwrqnez['extra'] = '';
    }

    
    $V4i2thwrqnez['version_extracted'] = $Vntf43kw1jlt['version'];
    $V4i2thwrqnez['compression'] = $Vntf43kw1jlt['compression'];
    $V4i2thwrqnez['size'] = $Vntf43kw1jlt['size'];
    $V4i2thwrqnez['compressed_size'] = $Vntf43kw1jlt['compressed_size'];
    $V4i2thwrqnez['crc'] = $Vntf43kw1jlt['crc'];
    $V4i2thwrqnez['flag'] = $Vntf43kw1jlt['flag'];
    $V4i2thwrqnez['filename_len'] = $Vntf43kw1jlt['filename_len'];

    
    $V4i2thwrqnez['mdate'] = $Vntf43kw1jlt['mdate'];
    $V4i2thwrqnez['mtime'] = $Vntf43kw1jlt['mtime'];
    if ($V4i2thwrqnez['mdate'] && $V4i2thwrqnez['mtime'])
    {
      
      $Vnbdqg2snzag = ($V4i2thwrqnez['mtime'] & 0xF800) >> 11;
      $Vgmzdmcyge0y = ($V4i2thwrqnez['mtime'] & 0x07E0) >> 5;
      $V4igwpi3q0vf = ($V4i2thwrqnez['mtime'] & 0x001F)*2;

      
      $Vqbij2oskonc = (($V4i2thwrqnez['mdate'] & 0xFE00) >> 9) + 1980;
      $Vx5cwmqeybg3 = ($V4i2thwrqnez['mdate'] & 0x01E0) >> 5;
      $Vyfdxxqvqiju = $V4i2thwrqnez['mdate'] & 0x001F;

      
      $V4i2thwrqnez['mtime'] = @mktime($Vnbdqg2snzag, $Vgmzdmcyge0y, $V4igwpi3q0vf, $Vx5cwmqeybg3, $Vyfdxxqvqiju, $Vqbij2oskonc);

    }
    else
    {
      $V4i2thwrqnez['mtime'] = time();
    }

    
    
    

    
    $V4i2thwrqnez['stored_filename'] = $V4i2thwrqnez['filename'];

    
    $V4i2thwrqnez['status'] = "ok";

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privReadCentralFileHeader(&$V4i2thwrqnez)
  {
    $Vvwz2kk32ujo=1;

    
    $Vqykbptmaj3h = @fread($this->zip_fd, 4);
    $Vntf43kw1jlt = unpack('Vid', $Vqykbptmaj3h);

    
    if ($Vntf43kw1jlt['id'] != 0x02014b50)
    {

      
      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Invalid archive structure');

      
      return PclZip::errorCode();
    }

    
    $Vqykbptmaj3h = fread($this->zip_fd, 42);

    
    if (strlen($Vqykbptmaj3h) != 42)
    {
      $V4i2thwrqnez['filename'] = "";
      $V4i2thwrqnez['status'] = "invalid_header";

      
      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, "Invalid block size : ".strlen($Vqykbptmaj3h));

      
      return PclZip::errorCode();
    }

    
    $V4i2thwrqnez = unpack('vversion/vversion_extracted/vflag/vcompression/vmtime/vmdate/Vcrc/Vcompressed_size/Vsize/vfilename_len/vextra_len/vcomment_len/vdisk/vinternal/Vexternal/Voffset', $Vqykbptmaj3h);

    
    if ($V4i2thwrqnez['filename_len'] != 0)
      $V4i2thwrqnez['filename'] = fread($this->zip_fd, $V4i2thwrqnez['filename_len']);
    else
      $V4i2thwrqnez['filename'] = '';

    
    if ($V4i2thwrqnez['extra_len'] != 0)
      $V4i2thwrqnez['extra'] = fread($this->zip_fd, $V4i2thwrqnez['extra_len']);
    else
      $V4i2thwrqnez['extra'] = '';

    
    if ($V4i2thwrqnez['comment_len'] != 0)
      $V4i2thwrqnez['comment'] = fread($this->zip_fd, $V4i2thwrqnez['comment_len']);
    else
      $V4i2thwrqnez['comment'] = '';

    

    
    
    
    if (1)
    {
      
      $Vnbdqg2snzag = ($V4i2thwrqnez['mtime'] & 0xF800) >> 11;
      $Vgmzdmcyge0y = ($V4i2thwrqnez['mtime'] & 0x07E0) >> 5;
      $V4igwpi3q0vf = ($V4i2thwrqnez['mtime'] & 0x001F)*2;

      
      $Vqbij2oskonc = (($V4i2thwrqnez['mdate'] & 0xFE00) >> 9) + 1980;
      $Vx5cwmqeybg3 = ($V4i2thwrqnez['mdate'] & 0x01E0) >> 5;
      $Vyfdxxqvqiju = $V4i2thwrqnez['mdate'] & 0x001F;

      
      $V4i2thwrqnez['mtime'] = @mktime($Vnbdqg2snzag, $Vgmzdmcyge0y, $V4igwpi3q0vf, $Vx5cwmqeybg3, $Vyfdxxqvqiju, $Vqbij2oskonc);

    }
    else
    {
      $V4i2thwrqnez['mtime'] = time();
    }

    
    $V4i2thwrqnez['stored_filename'] = $V4i2thwrqnez['filename'];

    
    $V4i2thwrqnez['status'] = 'ok';

    
    if (substr($V4i2thwrqnez['filename'], -1) == '/') {
      
      $V4i2thwrqnez['external'] = 0x00000010;
    }


    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  function privCheckFileHeaders(&$Vrrzfppx2522, &$Vlnkxnmpsivm)
  {
    $Vvwz2kk32ujo=1;

  	
  	
  	if ($Vrrzfppx2522['filename'] != $Vlnkxnmpsivm['filename']) {
  	}
  	if ($Vrrzfppx2522['version_extracted'] != $Vlnkxnmpsivm['version_extracted']) {
  	}
  	if ($Vrrzfppx2522['flag'] != $Vlnkxnmpsivm['flag']) {
  	}
  	if ($Vrrzfppx2522['compression'] != $Vlnkxnmpsivm['compression']) {
  	}
  	if ($Vrrzfppx2522['mtime'] != $Vlnkxnmpsivm['mtime']) {
  	}
  	if ($Vrrzfppx2522['filename_len'] != $Vlnkxnmpsivm['filename_len']) {
  	}
  
  	
  	if (($Vrrzfppx2522['flag'] & 8) == 8) {
          $Vrrzfppx2522['size'] = $Vlnkxnmpsivm['size'];
          $Vrrzfppx2522['compressed_size'] = $Vlnkxnmpsivm['compressed_size'];
          $Vrrzfppx2522['crc'] = $Vlnkxnmpsivm['crc'];
  	}

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privReadEndCentralDir(&$Ve3gw5yyzrtn)
  {
    $Vvwz2kk32ujo=1;

    
    $Vpad0k4de1le = filesize($this->zipname);
    @fseek($this->zip_fd, $Vpad0k4de1le);
    if (@ftell($this->zip_fd) != $Vpad0k4de1le)
    {
      
      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Unable to go to the end of the archive \''.$this->zipname.'\'');

      
      return PclZip::errorCode();
    }

    
    
    $Vikhpfleywi2 = 0;
    if ($Vpad0k4de1le > 26) {
      @fseek($this->zip_fd, $Vpad0k4de1le-22);
      if (($Vtmab42r2lg2 = @ftell($this->zip_fd)) != ($Vpad0k4de1le-22))
      {
        
        PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Unable to seek back to the middle of the archive \''.$this->zipname.'\'');

        
        return PclZip::errorCode();
      }

      
      $Vqykbptmaj3h = @fread($this->zip_fd, 4);
      $Vntf43kw1jlt = @unpack('Vid', $Vqykbptmaj3h);

      
      if ($Vntf43kw1jlt['id'] == 0x06054b50) {
        $Vikhpfleywi2 = 1;
      }

      $Vtmab42r2lg2 = ftell($this->zip_fd);
    }

    
    if (!$Vikhpfleywi2) {
      $V3k50mz10rye = 65557; 
      if ($V3k50mz10rye > $Vpad0k4de1le)
        $V3k50mz10rye = $Vpad0k4de1le;
      @fseek($this->zip_fd, $Vpad0k4de1le-$V3k50mz10rye);
      if (@ftell($this->zip_fd) != ($Vpad0k4de1le-$V3k50mz10rye))
      {
        
        PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, 'Unable to seek back to the middle of the archive \''.$this->zipname.'\'');

        
        return PclZip::errorCode();
      }

      
      $Vtmab42r2lg2 = ftell($this->zip_fd);
      $Vt1hrnbwmtp2 = 0x00000000;
      while ($Vtmab42r2lg2 < $Vpad0k4de1le)
      {
        
        $Vqt3cw2lqq4n = @fread($this->zip_fd, 1);

        
        
        
        
        $Vt1hrnbwmtp2 = ( ($Vt1hrnbwmtp2 & 0xFFFFFF) << 8) | Ord($Vqt3cw2lqq4n); 

        
        if ($Vt1hrnbwmtp2 == 0x504b0506)
        {
          $Vtmab42r2lg2++;
          break;
        }

        $Vtmab42r2lg2++;
      }

      
      if ($Vtmab42r2lg2 == $Vpad0k4de1le)
      {

        
        PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, "Unable to find End of Central Dir Record signature");

        
        return PclZip::errorCode();
      }
    }

    
    $Vqykbptmaj3h = fread($this->zip_fd, 18);

    
    if (strlen($Vqykbptmaj3h) != 18)
    {

      
      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT, "Invalid End of Central Dir Record size : ".strlen($Vqykbptmaj3h));

      
      return PclZip::errorCode();
    }

    
    $Vntf43kw1jlt = unpack('vdisk/vdisk_start/vdisk_entries/ventries/Vsize/Voffset/vcomment_size', $Vqykbptmaj3h);

    
    if (($Vtmab42r2lg2 + $Vntf43kw1jlt['comment_size'] + 18) != $Vpad0k4de1le) {

	  
	  
	  
	  
	  if (0) {
      
      PclZip::privErrorLog(PCLZIP_ERR_BAD_FORMAT,
	                       'The central dir is not at the end of the archive.'
						   .' Some trailing bytes exists after the archive.');

      
      return PclZip::errorCode();
	  }
    }

    
    if ($Vntf43kw1jlt['comment_size'] != 0) {
      $Ve3gw5yyzrtn['comment'] = fread($this->zip_fd, $Vntf43kw1jlt['comment_size']);
    }
    else
      $Ve3gw5yyzrtn['comment'] = '';

    $Ve3gw5yyzrtn['entries'] = $Vntf43kw1jlt['entries'];
    $Ve3gw5yyzrtn['disk_entries'] = $Vntf43kw1jlt['disk_entries'];
    $Ve3gw5yyzrtn['offset'] = $Vntf43kw1jlt['offset'];
    $Ve3gw5yyzrtn['size'] = $Vntf43kw1jlt['size'];
    $Ve3gw5yyzrtn['disk'] = $Vntf43kw1jlt['disk'];
    $Ve3gw5yyzrtn['disk_start'] = $Vntf43kw1jlt['disk_start'];

    
    
    

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privDeleteByRule(&$Vmwbrc2m5pbz, &$Vzpqveiv00sn)
  {
    $Vvwz2kk32ujo=1;
    $Vz5yxslfkbfj_detail = array();

    
    if (($Vvwz2kk32ujo=$this->privOpenFd('rb')) != 1)
    {
      
      return $Vvwz2kk32ujo;
    }

    
    $Vwxw0zfajc1a = array();
    if (($Vvwz2kk32ujo = $this->privReadEndCentralDir($Vwxw0zfajc1a)) != 1)
    {
      $this->privCloseFd();
      return $Vvwz2kk32ujo;
    }

    
    @rewind($this->zip_fd);

    
    
    $Vssj5rb2mbkr = $Vwxw0zfajc1a['offset'];
    @rewind($this->zip_fd);
    if (@fseek($this->zip_fd, $Vssj5rb2mbkr))
    {
      
      $this->privCloseFd();

      
      PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

      
      return PclZip::errorCode();
    }

    
    $Vdzqy3lrecxl = array();
    $Vzmnqyqjjodw_start = 0;
    for ($Vfhiq1lhsoja=0, $Vjdahcpfrlhw_extracted=0; $Vfhiq1lhsoja<$Vwxw0zfajc1a['entries']; $Vfhiq1lhsoja++)
    {

      
      $Vdzqy3lrecxl[$Vjdahcpfrlhw_extracted] = array();
      if (($Vvwz2kk32ujo = $this->privReadCentralFileHeader($Vdzqy3lrecxl[$Vjdahcpfrlhw_extracted])) != 1)
      {
        
        $this->privCloseFd();

        return $Vvwz2kk32ujo;
      }


      
      $Vdzqy3lrecxl[$Vjdahcpfrlhw_extracted]['index'] = $Vfhiq1lhsoja;

      
      $Vikhpfleywi2 = false;

      
      if (   (isset($Vzpqveiv00sn[PCLZIP_OPT_BY_NAME]))
          && ($Vzpqveiv00sn[PCLZIP_OPT_BY_NAME] != 0)) {

          
          for ($Vzmnqyqjjodw=0; ($Vzmnqyqjjodw<sizeof($Vzpqveiv00sn[PCLZIP_OPT_BY_NAME])) && (!$Vikhpfleywi2); $Vzmnqyqjjodw++) {

              
              if (substr($Vzpqveiv00sn[PCLZIP_OPT_BY_NAME][$Vzmnqyqjjodw], -1) == "/") {

                  
                  if (   (strlen($Vdzqy3lrecxl[$Vjdahcpfrlhw_extracted]['stored_filename']) > strlen($Vzpqveiv00sn[PCLZIP_OPT_BY_NAME][$Vzmnqyqjjodw]))
                      && (substr($Vdzqy3lrecxl[$Vjdahcpfrlhw_extracted]['stored_filename'], 0, strlen($Vzpqveiv00sn[PCLZIP_OPT_BY_NAME][$Vzmnqyqjjodw])) == $Vzpqveiv00sn[PCLZIP_OPT_BY_NAME][$Vzmnqyqjjodw])) {
                      $Vikhpfleywi2 = true;
                  }
                  elseif (   (($Vdzqy3lrecxl[$Vjdahcpfrlhw_extracted]['external']&0x00000010)==0x00000010) 
                          && ($Vdzqy3lrecxl[$Vjdahcpfrlhw_extracted]['stored_filename'].'/' == $Vzpqveiv00sn[PCLZIP_OPT_BY_NAME][$Vzmnqyqjjodw])) {
                      $Vikhpfleywi2 = true;
                  }
              }
              
              elseif ($Vdzqy3lrecxl[$Vjdahcpfrlhw_extracted]['stored_filename'] == $Vzpqveiv00sn[PCLZIP_OPT_BY_NAME][$Vzmnqyqjjodw]) {
                  $Vikhpfleywi2 = true;
              }
          }
      }

      
      
      

      
      else if (   (isset($Vzpqveiv00sn[PCLZIP_OPT_BY_PREG]))
               && ($Vzpqveiv00sn[PCLZIP_OPT_BY_PREG] != "")) {

          if (preg_match($Vzpqveiv00sn[PCLZIP_OPT_BY_PREG], $Vdzqy3lrecxl[$Vjdahcpfrlhw_extracted]['stored_filename'])) {
              $Vikhpfleywi2 = true;
          }
      }

      
      else if (   (isset($Vzpqveiv00sn[PCLZIP_OPT_BY_INDEX]))
               && ($Vzpqveiv00sn[PCLZIP_OPT_BY_INDEX] != 0)) {

          
          for ($Vzmnqyqjjodw=$Vzmnqyqjjodw_start; ($Vzmnqyqjjodw<sizeof($Vzpqveiv00sn[PCLZIP_OPT_BY_INDEX])) && (!$Vikhpfleywi2); $Vzmnqyqjjodw++) {

              if (($Vfhiq1lhsoja>=$Vzpqveiv00sn[PCLZIP_OPT_BY_INDEX][$Vzmnqyqjjodw]['start']) && ($Vfhiq1lhsoja<=$Vzpqveiv00sn[PCLZIP_OPT_BY_INDEX][$Vzmnqyqjjodw]['end'])) {
                  $Vikhpfleywi2 = true;
              }
              if ($Vfhiq1lhsoja>=$Vzpqveiv00sn[PCLZIP_OPT_BY_INDEX][$Vzmnqyqjjodw]['end']) {
                  $Vzmnqyqjjodw_start = $Vzmnqyqjjodw+1;
              }

              if ($Vzpqveiv00sn[PCLZIP_OPT_BY_INDEX][$Vzmnqyqjjodw]['start']>$Vfhiq1lhsoja) {
                  break;
              }
          }
      }
      else {
      	$Vikhpfleywi2 = true;
      }

      
      if ($Vikhpfleywi2)
      {
        unset($Vdzqy3lrecxl[$Vjdahcpfrlhw_extracted]);
      }
      else
      {
        $Vjdahcpfrlhw_extracted++;
      }
    }

    
    if ($Vjdahcpfrlhw_extracted > 0) {

        
        $Vccennbuwtcc = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.tmp';

        
        $Vpi4z5kzo0z5 = new PclZip($Vccennbuwtcc);

        
        if (($Vvwz2kk32ujo = $Vpi4z5kzo0z5->privOpenFd('wb')) != 1) {
            $this->privCloseFd();

            
            return $Vvwz2kk32ujo;
        }

        
        for ($Vfhiq1lhsoja=0; $Vfhiq1lhsoja<sizeof($Vdzqy3lrecxl); $Vfhiq1lhsoja++) {

            
            @rewind($this->zip_fd);
            if (@fseek($this->zip_fd,  $Vdzqy3lrecxl[$Vfhiq1lhsoja]['offset'])) {
                
                $this->privCloseFd();
                $Vpi4z5kzo0z5->privCloseFd();
                @unlink($Vccennbuwtcc);

                
                PclZip::privErrorLog(PCLZIP_ERR_INVALID_ARCHIVE_ZIP, 'Invalid archive size');

                
                return PclZip::errorCode();
            }

            
            $Vkllcariladd = array();
            if (($Vvwz2kk32ujo = $this->privReadFileHeader($Vkllcariladd)) != 1) {
                
                $this->privCloseFd();
                $Vpi4z5kzo0z5->privCloseFd();
                @unlink($Vccennbuwtcc);

                
                return $Vvwz2kk32ujo;
            }
            
            
            if ($this->privCheckFileHeaders($Vkllcariladd,
			                                $Vdzqy3lrecxl[$Vfhiq1lhsoja]) != 1) {
                
            }
            unset($Vkllcariladd);

            
            if (($Vvwz2kk32ujo = $Vpi4z5kzo0z5->privWriteFileHeader($Vdzqy3lrecxl[$Vfhiq1lhsoja])) != 1) {
                
                $this->privCloseFd();
                $Vpi4z5kzo0z5->privCloseFd();
                @unlink($Vccennbuwtcc);

                
                return $Vvwz2kk32ujo;
            }

            
            if (($Vvwz2kk32ujo = PclZipUtilCopyBlock($this->zip_fd, $Vpi4z5kzo0z5->zip_fd, $Vdzqy3lrecxl[$Vfhiq1lhsoja]['compressed_size'])) != 1) {
                
                $this->privCloseFd();
                $Vpi4z5kzo0z5->privCloseFd();
                @unlink($Vccennbuwtcc);

                
                return $Vvwz2kk32ujo;
            }
        }

        
        $Vabebofv1vch = @ftell($Vpi4z5kzo0z5->zip_fd);

        
        for ($Vfhiq1lhsoja=0; $Vfhiq1lhsoja<sizeof($Vdzqy3lrecxl); $Vfhiq1lhsoja++) {
            
            if (($Vvwz2kk32ujo = $Vpi4z5kzo0z5->privWriteCentralFileHeader($Vdzqy3lrecxl[$Vfhiq1lhsoja])) != 1) {
                $Vpi4z5kzo0z5->privCloseFd();
                $this->privCloseFd();
                @unlink($Vccennbuwtcc);

                
                return $Vvwz2kk32ujo;
            }

            
            $Vpi4z5kzo0z5->privConvertHeader2FileInfo($Vdzqy3lrecxl[$Vfhiq1lhsoja], $Vmwbrc2m5pbz[$Vfhiq1lhsoja]);
        }


        
        $Vfplxmsntbsz = '';
        if (isset($Vzpqveiv00sn[PCLZIP_OPT_COMMENT])) {
          $Vfplxmsntbsz = $Vzpqveiv00sn[PCLZIP_OPT_COMMENT];
        }

        
        $Vpad0k4de1le = @ftell($Vpi4z5kzo0z5->zip_fd)-$Vabebofv1vch;

        
        if (($Vvwz2kk32ujo = $Vpi4z5kzo0z5->privWriteCentralHeader(sizeof($Vdzqy3lrecxl), $Vpad0k4de1le, $Vabebofv1vch, $Vfplxmsntbsz)) != 1) {
            
            unset($Vdzqy3lrecxl);
            $Vpi4z5kzo0z5->privCloseFd();
            $this->privCloseFd();
            @unlink($Vccennbuwtcc);

            
            return $Vvwz2kk32ujo;
        }

        
        $Vpi4z5kzo0z5->privCloseFd();
        $this->privCloseFd();

        
        
        @unlink($this->zipname);

        
        
        
        PclZipUtilRename($Vccennbuwtcc, $this->zipname);
    
        
        unset($Vpi4z5kzo0z5);
    }
    
    
    else if ($Vwxw0zfajc1a['entries'] != 0) {
        $this->privCloseFd();

        if (($Vvwz2kk32ujo = $this->privOpenFd('wb')) != 1) {
          return $Vvwz2kk32ujo;
        }

        if (($Vvwz2kk32ujo = $this->privWriteCentralHeader(0, 0, 0, '')) != 1) {
          return $Vvwz2kk32ujo;
        }

        $this->privCloseFd();
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  function privDirCheck($Vemwptuk3wkv, $Vxjcnahnmhil=false)
  {
    $Vvwz2kk32ujo = 1;


    
    if (($Vxjcnahnmhil) && (substr($Vemwptuk3wkv, -1)=='/'))
    {
      $Vemwptuk3wkv = substr($Vemwptuk3wkv, 0, strlen($Vemwptuk3wkv)-1);
    }

    
    if ((is_dir($Vemwptuk3wkv)) || ($Vemwptuk3wkv == ""))
    {
      return 1;
    }

    
    $Vzkvhuch14ot = dirname($Vemwptuk3wkv);

    
    if ($Vzkvhuch14ot != $Vemwptuk3wkv)
    {
      
      if ($Vzkvhuch14ot != "")
      {
        if (($Vvwz2kk32ujo = $this->privDirCheck($Vzkvhuch14ot)) != 1)
        {
          return $Vvwz2kk32ujo;
        }
      }
    }

    
    if (!@mkdir($Vemwptuk3wkv, 0777))
    {
      
      PclZip::privErrorLog(PCLZIP_ERR_DIR_CREATE_FAIL, "Unable to create directory '$Vemwptuk3wkv'");

      
      return PclZip::errorCode();
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  function privMerge(&$Vot4rnn5hfhi_to_add)
  {
    $Vvwz2kk32ujo=1;

    
    if (!is_file($Vot4rnn5hfhi_to_add->zipname))
    {

      
      $Vvwz2kk32ujo = 1;

      
      return $Vvwz2kk32ujo;
    }

    
    if (!is_file($this->zipname))
    {

      
      $Vvwz2kk32ujo = $this->privDuplicate($Vot4rnn5hfhi_to_add->zipname);

      
      return $Vvwz2kk32ujo;
    }

    
    if (($Vvwz2kk32ujo=$this->privOpenFd('rb')) != 1)
    {
      
      return $Vvwz2kk32ujo;
    }

    
    $Vwxw0zfajc1a = array();
    if (($Vvwz2kk32ujo = $this->privReadEndCentralDir($Vwxw0zfajc1a)) != 1)
    {
      $this->privCloseFd();
      return $Vvwz2kk32ujo;
    }

    
    @rewind($this->zip_fd);

    
    if (($Vvwz2kk32ujo=$Vot4rnn5hfhi_to_add->privOpenFd('rb')) != 1)
    {
      $this->privCloseFd();

      
      return $Vvwz2kk32ujo;
    }

    
    $Vwxw0zfajc1a_to_add = array();
    if (($Vvwz2kk32ujo = $Vot4rnn5hfhi_to_add->privReadEndCentralDir($Vwxw0zfajc1a_to_add)) != 1)
    {
      $this->privCloseFd();
      $Vot4rnn5hfhi_to_add->privCloseFd();

      return $Vvwz2kk32ujo;
    }

    
    @rewind($Vot4rnn5hfhi_to_add->zip_fd);

    
    $Vccennbuwtcc = PCLZIP_TEMPORARY_DIR.uniqid('pclzip-').'.tmp';

    
    if (($Vrxb04r2etpy = @fopen($Vccennbuwtcc, 'wb')) == 0)
    {
      $this->privCloseFd();
      $Vot4rnn5hfhi_to_add->privCloseFd();

      PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open temporary file \''.$Vccennbuwtcc.'\' in binary write mode');

      
      return PclZip::errorCode();
    }

    
    
    $Vpad0k4de1le = $Vwxw0zfajc1a['offset'];
    while ($Vpad0k4de1le != 0)
    {
      $Vklwhm1l4upx = ($Vpad0k4de1le < PCLZIP_READ_BLOCK_SIZE ? $Vpad0k4de1le : PCLZIP_READ_BLOCK_SIZE);
      $V1eutm0pt1vg = fread($this->zip_fd, $Vklwhm1l4upx);
      @fwrite($Vrxb04r2etpy, $V1eutm0pt1vg, $Vklwhm1l4upx);
      $Vpad0k4de1le -= $Vklwhm1l4upx;
    }

    
    $Vpad0k4de1le = $Vwxw0zfajc1a_to_add['offset'];
    while ($Vpad0k4de1le != 0)
    {
      $Vklwhm1l4upx = ($Vpad0k4de1le < PCLZIP_READ_BLOCK_SIZE ? $Vpad0k4de1le : PCLZIP_READ_BLOCK_SIZE);
      $V1eutm0pt1vg = fread($Vot4rnn5hfhi_to_add->zip_fd, $Vklwhm1l4upx);
      @fwrite($Vrxb04r2etpy, $V1eutm0pt1vg, $Vklwhm1l4upx);
      $Vpad0k4de1le -= $Vklwhm1l4upx;
    }

    
    $Vabebofv1vch = @ftell($Vrxb04r2etpy);

    
    $Vpad0k4de1le = $Vwxw0zfajc1a['size'];
    while ($Vpad0k4de1le != 0)
    {
      $Vklwhm1l4upx = ($Vpad0k4de1le < PCLZIP_READ_BLOCK_SIZE ? $Vpad0k4de1le : PCLZIP_READ_BLOCK_SIZE);
      $V1eutm0pt1vg = @fread($this->zip_fd, $Vklwhm1l4upx);
      @fwrite($Vrxb04r2etpy, $V1eutm0pt1vg, $Vklwhm1l4upx);
      $Vpad0k4de1le -= $Vklwhm1l4upx;
    }

    
    $Vpad0k4de1le = $Vwxw0zfajc1a_to_add['size'];
    while ($Vpad0k4de1le != 0)
    {
      $Vklwhm1l4upx = ($Vpad0k4de1le < PCLZIP_READ_BLOCK_SIZE ? $Vpad0k4de1le : PCLZIP_READ_BLOCK_SIZE);
      $V1eutm0pt1vg = @fread($Vot4rnn5hfhi_to_add->zip_fd, $Vklwhm1l4upx);
      @fwrite($Vrxb04r2etpy, $V1eutm0pt1vg, $Vklwhm1l4upx);
      $Vpad0k4de1le -= $Vklwhm1l4upx;
    }

    
    $Vfplxmsntbsz = $Vwxw0zfajc1a['comment'].' '.$Vwxw0zfajc1a_to_add['comment'];

    
    $Vpad0k4de1le = @ftell($Vrxb04r2etpy)-$Vabebofv1vch;

    
    
    
    $Vvcp134q5kqm = $this->zip_fd;
    $this->zip_fd = $Vrxb04r2etpy;
    $Vrxb04r2etpy = $Vvcp134q5kqm;

    
    if (($Vvwz2kk32ujo = $this->privWriteCentralHeader($Vwxw0zfajc1a['entries']+$Vwxw0zfajc1a_to_add['entries'], $Vpad0k4de1le, $Vabebofv1vch, $Vfplxmsntbsz)) != 1)
    {
      $this->privCloseFd();
      $Vot4rnn5hfhi_to_add->privCloseFd();
      @fclose($Vrxb04r2etpy);
      $this->zip_fd = null;

      
      unset($Vdzqy3lrecxl);

      
      return $Vvwz2kk32ujo;
    }

    
    $Vvcp134q5kqm = $this->zip_fd;
    $this->zip_fd = $Vrxb04r2etpy;
    $Vrxb04r2etpy = $Vvcp134q5kqm;

    
    $this->privCloseFd();
    $Vot4rnn5hfhi_to_add->privCloseFd();

    
    @fclose($Vrxb04r2etpy);

    
    
    @unlink($this->zipname);

    
    
    
    PclZipUtilRename($Vccennbuwtcc, $this->zipname);

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privDuplicate($Vot4rnn5hfhi_filename)
  {
    $Vvwz2kk32ujo=1;

    
    if (!is_file($Vot4rnn5hfhi_filename))
    {

      
      $Vvwz2kk32ujo = 1;

      
      return $Vvwz2kk32ujo;
    }

    
    if (($Vvwz2kk32ujo=$this->privOpenFd('wb')) != 1)
    {
      
      return $Vvwz2kk32ujo;
    }

    
    if (($Vrxb04r2etpy = @fopen($Vot4rnn5hfhi_filename, 'rb')) == 0)
    {
      $this->privCloseFd();

      PclZip::privErrorLog(PCLZIP_ERR_READ_OPEN_FAIL, 'Unable to open archive file \''.$Vot4rnn5hfhi_filename.'\' in binary write mode');

      
      return PclZip::errorCode();
    }

    
    
    $Vpad0k4de1le = filesize($Vot4rnn5hfhi_filename);
    while ($Vpad0k4de1le != 0)
    {
      $Vklwhm1l4upx = ($Vpad0k4de1le < PCLZIP_READ_BLOCK_SIZE ? $Vpad0k4de1le : PCLZIP_READ_BLOCK_SIZE);
      $V1eutm0pt1vg = fread($Vrxb04r2etpy, $Vklwhm1l4upx);
      @fwrite($this->zip_fd, $V1eutm0pt1vg, $Vklwhm1l4upx);
      $Vpad0k4de1le -= $Vklwhm1l4upx;
    }

    
    $this->privCloseFd();

    
    @fclose($Vrxb04r2etpy);

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  function privErrorLog($V51ktgzftwxg=0, $Vnq5wtndbm1q='')
  {
    if (PCLZIP_ERROR_EXTERNAL == 1) {
      PclError($V51ktgzftwxg, $Vnq5wtndbm1q);
    }
    else {
      $this->error_code = $V51ktgzftwxg;
      $this->error_string = $Vnq5wtndbm1q;
    }
  }
  

  
  
  
  
  
  function privErrorReset()
  {
    if (PCLZIP_ERROR_EXTERNAL == 1) {
      PclErrorReset();
    }
    else {
      $this->error_code = 0;
      $this->error_string = '';
    }
  }
  

  
  
  
  
  
  
  function privDisableMagicQuotes()
  {
    $Vvwz2kk32ujo=1;

    
    if (   (!function_exists("get_magic_quotes_runtime"))
	    || (!function_exists("set_magic_quotes_runtime"))) {
      return $Vvwz2kk32ujo;
	}

    
    if ($this->magic_quotes_status != -1) {
      return $Vvwz2kk32ujo;
	}

	
	$this->magic_quotes_status = @get_magic_quotes_runtime();

	
	if ($this->magic_quotes_status == 1) {
	  @set_magic_quotes_runtime(0);
	}

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  function privSwapBackMagicQuotes()
  {
    $Vvwz2kk32ujo=1;

    
    if (   (!function_exists("get_magic_quotes_runtime"))
	    || (!function_exists("set_magic_quotes_runtime"))) {
      return $Vvwz2kk32ujo;
	}

    
    if ($this->magic_quotes_status != -1) {
      return $Vvwz2kk32ujo;
	}

	
	if ($this->magic_quotes_status == 1) {
  	  @set_magic_quotes_runtime($this->magic_quotes_status);
	}

    
    return $Vvwz2kk32ujo;
  }
  

  }
  
  

  
  
  
  
  
  
  function PclZipUtilPathReduction($Vemwptuk3wkv)
  {
    $Vvwz2kk32ujo = "";

    
    if ($Vemwptuk3wkv != "") {
      
      $Vz5yxslfkbfj = explode("/", $Vemwptuk3wkv);

      
      $Vmekrzt5ubc2 = 0;
      for ($Vfhiq1lhsoja=sizeof($Vz5yxslfkbfj)-1; $Vfhiq1lhsoja>=0; $Vfhiq1lhsoja--) {
        
        if ($Vz5yxslfkbfj[$Vfhiq1lhsoja] == ".") {
          
          
        }
        else if ($Vz5yxslfkbfj[$Vfhiq1lhsoja] == "..") {
		  $Vmekrzt5ubc2++;
        }
        else if ($Vz5yxslfkbfj[$Vfhiq1lhsoja] == "") {
		  
		  if ($Vfhiq1lhsoja == 0) {
            $Vvwz2kk32ujo = "/".$Vvwz2kk32ujo;
		    if ($Vmekrzt5ubc2 > 0) {
		        
		        
		        $Vvwz2kk32ujo = $Vemwptuk3wkv;
                $Vmekrzt5ubc2 = 0;
		    }
		  }
		  
		  else if ($Vfhiq1lhsoja == (sizeof($Vz5yxslfkbfj)-1)) {
            $Vvwz2kk32ujo = $Vz5yxslfkbfj[$Vfhiq1lhsoja];
		  }
		  
		  else {
            
            
		  }
        }
        else {
		  
		  if ($Vmekrzt5ubc2 > 0) {
		    $Vmekrzt5ubc2--;
		  }
		  else {
            $Vvwz2kk32ujo = $Vz5yxslfkbfj[$Vfhiq1lhsoja].($Vfhiq1lhsoja!=(sizeof($Vz5yxslfkbfj)-1)?"/".$Vvwz2kk32ujo:"");
		  }
        }
      }
      
      
      if ($Vmekrzt5ubc2 > 0) {
        while ($Vmekrzt5ubc2 > 0) {
            $Vvwz2kk32ujo = '../'.$Vvwz2kk32ujo;
            $Vmekrzt5ubc2--;
        }
      }
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function PclZipUtilPathInclusion($Vemwptuk3wkv, $V1l2aaxcwypz)
  {
    $Vvwz2kk32ujo = 1;
    
    
    if (   ($Vemwptuk3wkv == '.')
        || ((strlen($Vemwptuk3wkv) >=2) && (substr($Vemwptuk3wkv, 0, 2) == './'))) {
      $Vemwptuk3wkv = PclZipUtilTranslateWinPath(getcwd(), FALSE).'/'.substr($Vemwptuk3wkv, 1);
    }
    if (   ($V1l2aaxcwypz == '.')
        || ((strlen($V1l2aaxcwypz) >=2) && (substr($V1l2aaxcwypz, 0, 2) == './'))) {
      $V1l2aaxcwypz = PclZipUtilTranslateWinPath(getcwd(), FALSE).'/'.substr($V1l2aaxcwypz, 1);
    }

    
    $Vz5yxslfkbfj_dir = explode("/", $Vemwptuk3wkv);
    $Vz5yxslfkbfj_dir_size = sizeof($Vz5yxslfkbfj_dir);
    $Vz5yxslfkbfj_path = explode("/", $V1l2aaxcwypz);
    $Vz5yxslfkbfj_path_size = sizeof($Vz5yxslfkbfj_path);

    
    $Vfhiq1lhsoja = 0;
    $Vzmnqyqjjodw = 0;
    while (($Vfhiq1lhsoja < $Vz5yxslfkbfj_dir_size) && ($Vzmnqyqjjodw < $Vz5yxslfkbfj_path_size) && ($Vvwz2kk32ujo)) {

      
      if ($Vz5yxslfkbfj_dir[$Vfhiq1lhsoja] == '') {
        $Vfhiq1lhsoja++;
        continue;
      }
      if ($Vz5yxslfkbfj_path[$Vzmnqyqjjodw] == '') {
        $Vzmnqyqjjodw++;
        continue;
      }

      
      if (($Vz5yxslfkbfj_dir[$Vfhiq1lhsoja] != $Vz5yxslfkbfj_path[$Vzmnqyqjjodw]) && ($Vz5yxslfkbfj_dir[$Vfhiq1lhsoja] != '') && ( $Vz5yxslfkbfj_path[$Vzmnqyqjjodw] != ''))  {
        $Vvwz2kk32ujo = 0;
      }

      
      $Vfhiq1lhsoja++;
      $Vzmnqyqjjodw++;
    }

    
    if ($Vvwz2kk32ujo) {
      
      while (($Vzmnqyqjjodw < $Vz5yxslfkbfj_path_size) && ($Vz5yxslfkbfj_path[$Vzmnqyqjjodw] == '')) $Vzmnqyqjjodw++;
      while (($Vfhiq1lhsoja < $Vz5yxslfkbfj_dir_size) && ($Vz5yxslfkbfj_dir[$Vfhiq1lhsoja] == '')) $Vfhiq1lhsoja++;

      if (($Vfhiq1lhsoja >= $Vz5yxslfkbfj_dir_size) && ($Vzmnqyqjjodw >= $Vz5yxslfkbfj_path_size)) {
        
        $Vvwz2kk32ujo = 2;
      }
      else if ($Vfhiq1lhsoja < $Vz5yxslfkbfj_dir_size) {
        
        $Vvwz2kk32ujo = 0;
      }
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  function PclZipUtilCopyBlock($Vmhqgnyo4r5o, $V04ovuqvavvn, $V4e2u1t45n13, $Vl0aenrsopsf=0)
  {
    $Vvwz2kk32ujo = 1;

    if ($Vl0aenrsopsf==0)
    {
      while ($V4e2u1t45n13 != 0)
      {
        $Vklwhm1l4upx = ($V4e2u1t45n13 < PCLZIP_READ_BLOCK_SIZE ? $V4e2u1t45n13 : PCLZIP_READ_BLOCK_SIZE);
        $V1eutm0pt1vg = @fread($Vmhqgnyo4r5o, $Vklwhm1l4upx);
        @fwrite($V04ovuqvavvn, $V1eutm0pt1vg, $Vklwhm1l4upx);
        $V4e2u1t45n13 -= $Vklwhm1l4upx;
      }
    }
    else if ($Vl0aenrsopsf==1)
    {
      while ($V4e2u1t45n13 != 0)
      {
        $Vklwhm1l4upx = ($V4e2u1t45n13 < PCLZIP_READ_BLOCK_SIZE ? $V4e2u1t45n13 : PCLZIP_READ_BLOCK_SIZE);
        $V1eutm0pt1vg = @gzread($Vmhqgnyo4r5o, $Vklwhm1l4upx);
        @fwrite($V04ovuqvavvn, $V1eutm0pt1vg, $Vklwhm1l4upx);
        $V4e2u1t45n13 -= $Vklwhm1l4upx;
      }
    }
    else if ($Vl0aenrsopsf==2)
    {
      while ($V4e2u1t45n13 != 0)
      {
        $Vklwhm1l4upx = ($V4e2u1t45n13 < PCLZIP_READ_BLOCK_SIZE ? $V4e2u1t45n13 : PCLZIP_READ_BLOCK_SIZE);
        $V1eutm0pt1vg = @fread($Vmhqgnyo4r5o, $Vklwhm1l4upx);
        @gzwrite($V04ovuqvavvn, $V1eutm0pt1vg, $Vklwhm1l4upx);
        $V4e2u1t45n13 -= $Vklwhm1l4upx;
      }
    }
    else if ($Vl0aenrsopsf==3)
    {
      while ($V4e2u1t45n13 != 0)
      {
        $Vklwhm1l4upx = ($V4e2u1t45n13 < PCLZIP_READ_BLOCK_SIZE ? $V4e2u1t45n13 : PCLZIP_READ_BLOCK_SIZE);
        $V1eutm0pt1vg = @gzread($Vmhqgnyo4r5o, $Vklwhm1l4upx);
        @gzwrite($V04ovuqvavvn, $V1eutm0pt1vg, $Vklwhm1l4upx);
        $V4e2u1t45n13 -= $Vklwhm1l4upx;
      }
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  
  function PclZipUtilRename($Vmhqgnyo4r5o, $V04ovuqvavvn)
  {
    $Vvwz2kk32ujo = 1;

    
    if (!@rename($Vmhqgnyo4r5o, $V04ovuqvavvn)) {

      
      if (!@copy($Vmhqgnyo4r5o, $V04ovuqvavvn)) {
        $Vvwz2kk32ujo = 0;
      }
      else if (!@unlink($Vmhqgnyo4r5o)) {
        $Vvwz2kk32ujo = 0;
      }
    }

    
    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  
  function PclZipUtilOptionText($Vrzjia2fojsf)
  {
    
    $Vz5yxslfkbfj = get_defined_constants();
    for (reset($Vz5yxslfkbfj); $Vbemir250lzm = key($Vz5yxslfkbfj); next($Vz5yxslfkbfj)) {
	    $Vzfhwxwhkvmw = substr($Vbemir250lzm, 0, 10);
	    if ((   ($Vzfhwxwhkvmw == 'PCLZIP_OPT')
           || ($Vzfhwxwhkvmw == 'PCLZIP_CB_')
           || ($Vzfhwxwhkvmw == 'PCLZIP_ATT'))
	        && ($Vz5yxslfkbfj[$Vbemir250lzm] == $Vrzjia2fojsf)) {
        return $Vbemir250lzm;
	    }
    }
    
    $Vvwz2kk32ujo = 'Unknown';

    return $Vvwz2kk32ujo;
  }
  

  
  
  
  
  
  
  
  
  
  
  
  function PclZipUtilTranslateWinPath($V1l2aaxcwypz, $Vw4kavparjkw=true)
  {
    if (stristr(php_uname(), 'windows')) {
      
      if (($Vw4kavparjkw) && (($Vtmab42r2lg2ition = strpos($V1l2aaxcwypz, ':')) != false)) {
          $V1l2aaxcwypz = substr($V1l2aaxcwypz, $Vtmab42r2lg2ition+1);
      }
      
      if ((strpos($V1l2aaxcwypz, '\\') > 0) || (substr($V1l2aaxcwypz, 0,1) == '\\')) {
          $V1l2aaxcwypz = strtr($V1l2aaxcwypz, '\\', '/');
      }
    }
    return $V1l2aaxcwypz;
  }
  


?>
