<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');




function cke_initialize($Vou4vxorrdoe = array()) {
	
	$Vzkx1jexxiod = '';
	
	if(!defined('CI_CKEDITOR_HELPER_LOADED')) {
		
		define('CI_CKEDITOR_HELPER_LOADED', TRUE);
		$Vzkx1jexxiod =  '<script type="text/javascript" src="'.base_url(). $Vou4vxorrdoe['path'] . '/ckeditor.js"></script>';
		$Vzkx1jexxiod .=	"<script type=\"text/javascript\">CKEDITOR_BASEPATH = '" . base_url() . $Vou4vxorrdoe['path'] . "/';</script>";
	} 
	
	return $Vzkx1jexxiod;
	
}


function cke_create_instance($Vou4vxorrdoe = array()) {
	
    $Vzkx1jexxiod = "<script type=\"text/javascript\">
     	CKEDITOR.replace('" . $Vou4vxorrdoe['id'] . "', {";
    
    		
    		if(isset($Vou4vxorrdoe['config'])) {
	    		foreach($Vou4vxorrdoe['config'] as $V51lf1kcbto4=>$Vf1kwqxxhqpz) {
	    			
	    			
	    			if (is_array($Vf1kwqxxhqpz)) {
	    				$Vzkx1jexxiod .= $V51lf1kcbto4 . " : [";
	    				$Vzkx1jexxiod .= config_data($Vf1kwqxxhqpz);
	    				$Vzkx1jexxiod .= "]";
	    				
	    			}
	    			else {
	    				$Vzkx1jexxiod .= $V51lf1kcbto4 . " : '" . $Vf1kwqxxhqpz . "'";
	    			}

	    			if($V51lf1kcbto4 !== end(array_keys($Vou4vxorrdoe['config']))) {
						$Vzkx1jexxiod .= ",";
					}		    			
	    		} 
    		}   			
    				
    $Vzkx1jexxiod .= '});</script>';	
    
    return $Vzkx1jexxiod;
	
}


function display_ckeditor($Vou4vxorrdoe = array())
{
	
	$Vzkx1jexxiod = cke_initialize($Vou4vxorrdoe);
	
    
    $Vzkx1jexxiod .= cke_create_instance($Vou4vxorrdoe);
	

    
    if(isset($Vou4vxorrdoe['styles'])) {
    	
    	$Vzkx1jexxiod .= "<script type=\"text/javascript\">CKEDITOR.addStylesSet( 'my_styles_" . $Vou4vxorrdoe['id'] . "', [";
   
    	
	    foreach($Vou4vxorrdoe['styles'] as $V51lf1kcbto4=>$Vf1kwqxxhqpz) {
	    	
	    	$Vzkx1jexxiod .= "{ name : '" . $V51lf1kcbto4 . "', element : '" . $Vf1kwqxxhqpz['element'] . "', styles : { ";

	    	if(isset($Vf1kwqxxhqpz['styles'])) {
	    		foreach($Vf1kwqxxhqpz['styles'] as $V51lf1kcbto42=>$Vf1kwqxxhqpz2) {
	    			
	    			$Vzkx1jexxiod .= "'" . $V51lf1kcbto42 . "' : '" . $Vf1kwqxxhqpz2 . "'";
	    			
					if($V51lf1kcbto42 !== end(array_keys($Vf1kwqxxhqpz['styles']))) {
						 $Vzkx1jexxiod .= ",";
					}
	    		} 
    		} 
	    
	    	$Vzkx1jexxiod .= '} }';
	    	
	    	if($V51lf1kcbto4 !== end(array_keys($Vou4vxorrdoe['styles']))) {
				$Vzkx1jexxiod .= ',';
			}	    	
	    	

	    } 
	    
	    $Vzkx1jexxiod .= ']);';
		
		$Vzkx1jexxiod .= "CKEDITOR.instances['" . $Vou4vxorrdoe['id'] . "'].config.stylesCombo_stylesSet = 'my_styles_" . $Vou4vxorrdoe['id'] . "';
		</script>";		
    }   

    return $Vzkx1jexxiod;
}


function config_data($Vou4vxorrdoe = array())
{
	$Vzkx1jexxiod = '';
	foreach ($Vou4vxorrdoe as $V51lf1kcbto4ey)
	{
		if (is_array($V51lf1kcbto4ey)) {
			$Vzkx1jexxiod .= "[";
			foreach ($V51lf1kcbto4ey as $Vlkger5ehs4w) {
				$Vzkx1jexxiod .= "'" . $Vlkger5ehs4w . "'";
				if ($Vlkger5ehs4w != end(array_values($V51lf1kcbto4ey))) $Vzkx1jexxiod .= ",";
			}
			$Vzkx1jexxiod .= "]";
		}
		else {
			$Vzkx1jexxiod .= "'".$V51lf1kcbto4ey."'";
		}
		if ($V51lf1kcbto4ey != end(array_values($Vou4vxorrdoe))) $Vzkx1jexxiod .= ",";

	}
	return $Vzkx1jexxiod;
}