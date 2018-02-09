<?php


if (!defined('PCLZIP_TEMPORARY_DIR')) {
	define('PCLZIP_TEMPORARY_DIR', PHPExcel_Shared_File::sys_get_temp_dir() . DIRECTORY_SEPARATOR);
}
require_once PHPEXCEL_ROOT . 'PHPExcel/Shared/PCLZip/pclzip.lib.php';



class PHPExcel_Shared_ZipArchive
{

	
	const OVERWRITE		= 'OVERWRITE';
	const CREATE		= 'CREATE';


	
	private $Vgmfser0k5hy;

	
	private $Vtqclcajcqat;


    
	public function open($V40kppmutioo)
	{
		$this->_tempDir = PHPExcel_Shared_File::sys_get_temp_dir();

		$this->_zip = new PclZip($V40kppmutioo);

		return true;
	}


    
	public function close()
	{
	}


    
	public function addFromString($Vopgwbsm0iy4, $Vjsbhp3bvc1c)
	{
		$Vtz34qrjufh4 = pathinfo($Vopgwbsm0iy4);

		$V04j20is1epn = fopen($this->_tempDir.'/'.$Vtz34qrjufh4["basename"], "wb");
		fwrite($V04j20is1epn, $Vjsbhp3bvc1c);
		fclose($V04j20is1epn);

		$Ve3oeikqcm5n = $this->_zip->add($this->_tempDir.'/'.$Vtz34qrjufh4["basename"],
								PCLZIP_OPT_REMOVE_PATH, $this->_tempDir,
								PCLZIP_OPT_ADD_PATH, $Vtz34qrjufh4["dirname"]
							   );
		if ($Ve3oeikqcm5n == 0) {
			throw new PHPExcel_Writer_Exception("Error zipping files : " . $this->_zip->errorInfo(true));
		}

		unlink($this->_tempDir.'/'.$Vtz34qrjufh4["basename"]);
	}

    
    public function locateName($V40kppmutioo)
    {
        $Vor34exngli4 = $this->_zip->listContent();
        $Vor34exngli4Count = count($Vor34exngli4);
        $Vor34exngli4_index = -1;
        for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vor34exngli4Count; ++$Vfhiq1lhsoja) {
            if (strtolower($Vor34exngli4[$Vfhiq1lhsoja]["filename"]) == strtolower($V40kppmutioo) ||
                strtolower($Vor34exngli4[$Vfhiq1lhsoja]["stored_filename"]) == strtolower($V40kppmutioo)) {
                $Vor34exngli4_index = $Vfhiq1lhsoja;
                break;
            }
        }
        return ($Vor34exngli4_index > -1);
    }

    
    public function getFromName($V40kppmutioo) 
    {
        $Vor34exngli4 = $this->_zip->listContent();
        $Vor34exngli4Count = count($Vor34exngli4);
        $Vor34exngli4_index = -1;
        for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vor34exngli4Count; ++$Vfhiq1lhsoja) {
            if (strtolower($Vor34exngli4[$Vfhiq1lhsoja]["filename"]) == strtolower($V40kppmutioo) ||
                strtolower($Vor34exngli4[$Vfhiq1lhsoja]["stored_filename"]) == strtolower($V40kppmutioo)) {
                $Vor34exngli4_index = $Vfhiq1lhsoja;
                break;
            }
        }

        $Vjkk0oecbftw = "";
        if ($Vor34exngli4_index != -1) {
            $Vjkk0oecbftw = $this->_zip->extractByIndex($Vor34exngli4_index, PCLZIP_OPT_EXTRACT_AS_STRING);
        } else {
            $Vv0mtkrhebac = substr($V40kppmutioo, 1);
            $Vor34exngli4_index = -1;
            for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vor34exngli4Count; ++$Vfhiq1lhsoja) {
                if (strtolower($Vor34exngli4[$Vfhiq1lhsoja]["filename"]) == strtolower($V40kppmutioo) || 
                    strtolower($Vor34exngli4[$Vfhiq1lhsoja]["stored_filename"]) == strtolower($V40kppmutioo)) {
                    $Vor34exngli4_index = $Vfhiq1lhsoja;
                    break;
                }
            }
            $Vjkk0oecbftw = $this->_zip->extractByIndex($Vor34exngli4_index, PCLZIP_OPT_EXTRACT_AS_STRING);
        }
        if ((is_array($Vjkk0oecbftw)) && ($Vjkk0oecbftw != 0)) {
            $Vjsbhp3bvc1c = $Vjkk0oecbftw[0]["content"];
        }

        return $Vjsbhp3bvc1c;
    }
}
