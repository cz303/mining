<?php




class PHPExcel_Shared_File
{
	
	protected static $Vc2x2lgj2qsj	= FALSE;


	
	public static function setUseUploadTempDirectory($Vcyrf05tgsnm = FALSE) {
		self::$Vc2x2lgj2qsj = (boolean) $Vcyrf05tgsnm;
	}	


	
	public static function getUseUploadTempDirectory() {
		return self::$Vc2x2lgj2qsj;
	}	


	
	public static function file_exists($V1tltbb5c5oc) {
		
		
		
		if ( strtolower(substr($V1tltbb5c5oc, 0, 3)) == 'zip' ) {
			
			$Vu2gcojvp4ui 		= substr($V1tltbb5c5oc, 6, strpos($V1tltbb5c5oc, '#') - 6);
			$Vb32gx3ld3d5 	= substr($V1tltbb5c5oc, strpos($V1tltbb5c5oc, '#') + 1);

			$Vlyvyvxhzbgl = new ZipArchive();
			if ($Vlyvyvxhzbgl->open($Vu2gcojvp4ui) === true) {
				$Vbco3t3kne3m = ($Vlyvyvxhzbgl->getFromName($Vb32gx3ld3d5) !== false);
				$Vlyvyvxhzbgl->close();
				return $Vbco3t3kne3m;
			} else {
				return false;
			}
		} else {
			
			return file_exists($V1tltbb5c5oc);
		}
	}

	
	public static function realpath($V1tltbb5c5oc) {
		
		$Vbco3t3kne3m = '';

		
		if (file_exists($V1tltbb5c5oc)) {
			$Vbco3t3kne3m = realpath($V1tltbb5c5oc);
		}

		
		if ($Vbco3t3kne3m == '' || ($Vbco3t3kne3m === NULL)) {
			$Vaq0ts20bcsk = explode('/' , $V1tltbb5c5oc);
			while(in_array('..', $Vaq0ts20bcsk) && $Vaq0ts20bcsk[0] != '..') {
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < count($Vaq0ts20bcsk); ++$Vfhiq1lhsoja) {
					if ($Vaq0ts20bcsk[$Vfhiq1lhsoja] == '..' && $Vfhiq1lhsoja > 0) {
						unset($Vaq0ts20bcsk[$Vfhiq1lhsoja]);
						unset($Vaq0ts20bcsk[$Vfhiq1lhsoja - 1]);
						break;
					}
				}
			}
			$Vbco3t3kne3m = implode('/', $Vaq0ts20bcsk);
		}

		
		return $Vbco3t3kne3m;
	}

	
	public static function sys_get_temp_dir()
	{
		if (self::$Vc2x2lgj2qsj) {
			
			
			if (ini_get('upload_tmp_dir') !== FALSE) {
				if ($Vcartbxounrh = ini_get('upload_tmp_dir')) {
					if (file_exists($Vcartbxounrh))
						return realpath($Vcartbxounrh);
				}
			}
		}

		
		
		if ( !function_exists('sys_get_temp_dir')) {
			if ($Vcartbxounrh = getenv('TMP') ) {
				if ((!empty($Vcartbxounrh)) && (file_exists($Vcartbxounrh))) { return realpath($Vcartbxounrh); }
			}
			if ($Vcartbxounrh = getenv('TEMP') ) {
				if ((!empty($Vcartbxounrh)) && (file_exists($Vcartbxounrh))) { return realpath($Vcartbxounrh); }
			}
			if ($Vcartbxounrh = getenv('TMPDIR') ) {
				if ((!empty($Vcartbxounrh)) && (file_exists($Vcartbxounrh))) { return realpath($Vcartbxounrh); }
			}

			
			
			$Vcartbxounrh = tempnam(__FILE__, '');
			if (file_exists($Vcartbxounrh)) {
				unlink($Vcartbxounrh);
				return realpath(dirname($Vcartbxounrh));
			}

			return null;
		}

		
		
		
		return realpath(sys_get_temp_dir());
	}

}
