<?php




if (!defined('PHPEXCEL_ROOT')) {
    define('PHPEXCEL_ROOT', dirname(__FILE__) . '/');
    require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}



class PHPExcel
{
    
    private $Vbt3gsyb02qs;

    
    private $V33hioo1nc1a;

    
    private $Vf251bpxusv0;

    
    private $Vczgaycljuyg = array();

    
	private $Vdvcjfulbo24 = NULL;

    
    private $Vqn3lk1qvlka = 0;

    
    private $Vpv00nen1ugm = array();

    
    private $Vmur4eh3pilc;

    
    private $V53qxerqbfra = array();

    
    private $V00lo4qdvwur = array();

	
	private $Vjs0po3zijbl = FALSE;

	
	private $Vdjcjpix3daq=NULL;
	
	private $Vwfeecjklcmp=NULL;

	
	private $V1xxepghpizl=NULL;

	
	private $Vhnx5qefknpo=NULL;

	
	public function hasMacros(){
		return $this->_hasMacros;
	}

	
	public function setHasMacros($Vnmxnlhinljq=false){
		$this->_hasMacros=(bool)$Vnmxnlhinljq;
	}

	
	public function setMacrosCode($Vq243x0gpvjg){
		$this->_macrosCode=$Vq243x0gpvjg;
		$this->setHasMacros(!is_null($Vq243x0gpvjg));
	}

	
	public function getMacrosCode(){
		return $this->_macrosCode;
	}

	
	public function setMacrosCertificate($Vyx2hjhpzrvm=NULL){
		$this->_macrosCertificate=$Vyx2hjhpzrvm;
	}

	
	public function hasMacrosCertificate(){
		return !is_null($this->_macrosCertificate);
	}

	
	public function getMacrosCertificate(){
		return $this->_macrosCertificate;
	}

	
	public function discardMacros(){
		$this->_hasMacros=false;
		$this->_macrosCode=NULL;
		$this->_macrosCertificate=NULL;
	}

	
	public function setRibbonXMLData($Vk0comzikopp=NULL, $Vhohxzks1me1=NULL){
		if(!is_null($Vk0comzikopp) && !is_null($Vhohxzks1me1)){
			$this->_ribbonXMLData=array('target'=>$Vk0comzikopp, 'data'=>$Vhohxzks1me1);
		}else{
			$this->_ribbonXMLData=NULL;
		}
	}

	
	public function getRibbonXMLData($Vgcxzh4j10of='all'){
		$V1vhzwdwr3bu=NULL;
		$Vgcxzh4j10of=strtolower($Vgcxzh4j10of);
		switch($Vgcxzh4j10of){
		case 'all':
			$V1vhzwdwr3bu=$this->_ribbonXMLData;
			break;
		case 'target':
		case 'data':
			if(is_array($this->_ribbonXMLData) && array_key_exists($Vgcxzh4j10of,$this->_ribbonXMLData)){
				$V1vhzwdwr3bu=$this->_ribbonXMLData[$Vgcxzh4j10of];
			}
			break;
		}
		return $V1vhzwdwr3bu;
	}

	
	public function setRibbonBinObjects($Vabwoi1ilrvf=NULL, $Vqaq3ammbg0t=NULL){
		if(!is_null($Vabwoi1ilrvf) && !is_null($Vqaq3ammbg0t)){
			$this->_ribbonBinObjects=array('names'=>$Vabwoi1ilrvf, 'data'=>$Vqaq3ammbg0t);
		}else{
			$this->_ribbonBinObjects=NULL;
		}
	}
	
	private function _getExtensionOnly($Vzynwim4f0nc){
		return pathinfo($Vzynwim4f0nc, PATHINFO_EXTENSION);
	}

	
	public function getRibbonBinObjects($Vgcxzh4j10of='all'){
		$V1vhzwdwr3bu=NULL;
		$Vgcxzh4j10of=strtolower($Vgcxzh4j10of);
		switch($Vgcxzh4j10of){
		case 'all':
			return $this->_ribbonBinObjects;
			break;
		case 'names':
		case 'data':
			if(is_array($this->_ribbonBinObjects) && array_key_exists($Vgcxzh4j10of, $this->_ribbonBinObjects)){
				$V1vhzwdwr3bu=$this->_ribbonBinObjects[$Vgcxzh4j10of];
			}
			break;
		case 'types':
			if(is_array($this->_ribbonBinObjects) && array_key_exists('data', $this->_ribbonBinObjects) && is_array($this->_ribbonBinObjects['data'])){
				$Vcfn12jn4c3i=array_keys($this->_ribbonBinObjects['data']);
				$V1vhzwdwr3bu=array_unique(array_map(array($this,'_getExtensionOnly'), $Vcfn12jn4c3i));
			}else
				$V1vhzwdwr3bu=array();
			break;
		}
		return $V1vhzwdwr3bu;
	}

	
	public function hasRibbon(){
		return !is_null($this->_ribbonXMLData);
	}

	
	public function hasRibbonBinObjects(){
		return !is_null($this->_ribbonBinObjects);
	}

	
    public function sheetCodeNameExists($Vmpf222qiuq0)
    {
		return ($this->getSheetByCodeName($Vmpf222qiuq0) !== NULL);
    }

	
	public function getSheetByCodeName($Vsyidwvjoowz = '')
	{
		$Vcz0tvtfztwi = count($this->_workSheetCollection);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vcz0tvtfztwi; ++$Vfhiq1lhsoja) {
			if ($this->_workSheetCollection[$Vfhiq1lhsoja]->getCodeName() == $Vsyidwvjoowz) {
				return $this->_workSheetCollection[$Vfhiq1lhsoja];
			}
		}

		return null;
	}

	 
	public function __construct()
	{
		$this->_uniqueID = uniqid();
		$this->_calculationEngine	= PHPExcel_Calculation::getInstance($this);

		
		$this->_workSheetCollection = array();
		$this->_workSheetCollection[] = new PHPExcel_Worksheet($this);
		$this->_activeSheetIndex = 0;

        
        $this->_properties = new PHPExcel_DocumentProperties();

        
        $this->_security = new PHPExcel_DocumentSecurity();

        
        $this->_namedRanges = array();

        
        $this->_cellXfSupervisor = new PHPExcel_Style(true);
        $this->_cellXfSupervisor->bindParent($this);

        
        $this->addCellXf(new PHPExcel_Style);
        $this->addCellStyleXf(new PHPExcel_Style);
    }

    
    public function __destruct() {
        PHPExcel_Calculation::unsetInstance($this);
        $this->disconnectWorksheets();
    }    

    
    public function disconnectWorksheets()
    {
    	$V4jvbeui0jzb = NULL;
        foreach($this->_workSheetCollection as $V51lf1kcbto4 => &$V4jvbeui0jzb) {
            $V4jvbeui0jzb->disconnectCells();
            $this->_workSheetCollection[$V51lf1kcbto4] = null;
        }
        unset($V4jvbeui0jzb);
        $this->_workSheetCollection = array();
    }

	
	public function getCalculationEngine()
	{
		return $this->_calculationEngine;
	}	

    
    public function getProperties()
    {
        return $this->_properties;
    }

    
    public function setProperties(PHPExcel_DocumentProperties $Vqujkwol1zut)
    {
        $this->_properties = $Vqujkwol1zut;
    }

    
    public function getSecurity()
    {
        return $this->_security;
    }

    
    public function setSecurity(PHPExcel_DocumentSecurity $Vqujkwol1zut)
    {
        $this->_security = $Vqujkwol1zut;
    }

    
    public function getActiveSheet()
    {
        return $this->getSheet($this->_activeSheetIndex);
    }

    
    public function createSheet($Vfhiq1lhsojaSheetIndex = NULL)
    {
        $Vwul3ev5l1rf = new PHPExcel_Worksheet($this);
        $this->addSheet($Vwul3ev5l1rf, $Vfhiq1lhsojaSheetIndex);
        return $Vwul3ev5l1rf;
    }

    
    public function sheetNameExists($Vjf0oadrby2x)
    {
        return ($this->getSheetByName($Vjf0oadrby2x) !== NULL);
    }

    
    public function addSheet(PHPExcel_Worksheet $Vci1dgyyzjho, $Vfhiq1lhsojaSheetIndex = NULL)
    {
        if ($this->sheetNameExists($Vci1dgyyzjho->getTitle())) {
            throw new PHPExcel_Exception(
            	"Workbook already contains a worksheet named '{$Vci1dgyyzjho->getTitle()}'. Rename this worksheet first."
            );
        }

        if($Vfhiq1lhsojaSheetIndex === NULL) {
            if ($this->_activeSheetIndex < 0) {
                $this->_activeSheetIndex = 0;
            }
            $this->_workSheetCollection[] = $Vci1dgyyzjho;
        } else {
            
            array_splice(
                $this->_workSheetCollection,
                $Vfhiq1lhsojaSheetIndex,
                0,
                array($Vci1dgyyzjho)
                );

            
            if ($this->_activeSheetIndex >= $Vfhiq1lhsojaSheetIndex) {
                ++$this->_activeSheetIndex;
            }
        }

        if ($Vci1dgyyzjho->getParent() === null) {
            $Vci1dgyyzjho->rebindParent($this);
        }

        return $Vci1dgyyzjho;
    }

    
    public function removeSheetByIndex($V4z43kvcbihn = 0)
    {

        $Vvphk2hyjssx = count($this->_workSheetCollection);

        if ($V4z43kvcbihn > $Vvphk2hyjssx - 1) {
            throw new PHPExcel_Exception(
            	"You tried to remove a sheet by the out of bounds index: {$V4z43kvcbihn}. The actual number of sheets is {$Vvphk2hyjssx}."
            );
        } else {
            array_splice($this->_workSheetCollection, $V4z43kvcbihn, 1);
        }
        
        if (($this->_activeSheetIndex >= $V4z43kvcbihn) &&
            ($V4z43kvcbihn > count($this->_workSheetCollection) - 1)) {
            --$this->_activeSheetIndex;
        }

    }

    
    public function getSheet($V4z43kvcbihn = 0)
    {
        if (!isset($this->_workSheetCollection[$V4z43kvcbihn])) {
            $Vvphk2hyjssx = $this->getSheetCount();
            throw new PHPExcel_Exception(
                "Your requested sheet index: {$V4z43kvcbihn} is out of bounds. The actual number of sheets is {$Vvphk2hyjssx}."
            );
        }

        return $this->_workSheetCollection[$V4z43kvcbihn];
    }

    
    public function getAllSheets()
    {
        return $this->_workSheetCollection;
    }

    
    public function getSheetByName($Vsyidwvjoowz = '')
    {
        $Vcz0tvtfztwi = count($this->_workSheetCollection);
        for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vcz0tvtfztwi; ++$Vfhiq1lhsoja) {
            if ($this->_workSheetCollection[$Vfhiq1lhsoja]->getTitle() === $Vsyidwvjoowz) {
                return $this->_workSheetCollection[$Vfhiq1lhsoja];
            }
        }

        return NULL;
    }

    
    public function getIndex(PHPExcel_Worksheet $Vci1dgyyzjho)
    {
        foreach ($this->_workSheetCollection as $V51lf1kcbto4ey => $Vp4xjtpabm0l) {
            if ($Vp4xjtpabm0l->getHashCode() == $Vci1dgyyzjho->getHashCode()) {
                return $V51lf1kcbto4ey;
            }
        }

        throw new PHPExcel_Exception("Sheet does not exist.");
    }

    
    public function setIndexByName($Vhiaiwq5k152, $Vus5eykukikn)
    {
        $Vex4j4sexooj = $this->getIndex($this->getSheetByName($Vhiaiwq5k152));
        $Vci1dgyyzjho = array_splice(
            $this->_workSheetCollection,
            $Vex4j4sexooj,
            1
        );
        array_splice(
            $this->_workSheetCollection,
            $Vus5eykukikn,
            0,
            $Vci1dgyyzjho
        );
        return $Vus5eykukikn;
    }

    
    public function getSheetCount()
    {
        return count($this->_workSheetCollection);
    }

    
    public function getActiveSheetIndex()
    {
        return $this->_activeSheetIndex;
    }

    
    public function setActiveSheetIndex($V4z43kvcbihn = 0)
    {
        $Vvphk2hyjssx = count($this->_workSheetCollection);

        if ($V4z43kvcbihn > $Vvphk2hyjssx - 1) {
            throw new PHPExcel_Exception(
            	"You tried to set a sheet active by the out of bounds index: {$V4z43kvcbihn}. The actual number of sheets is {$Vvphk2hyjssx}."
            );
        } else {
            $this->_activeSheetIndex = $V4z43kvcbihn;
        }
        return $this->getActiveSheet();
    }

    
    public function setActiveSheetIndexByName($Vqujkwol1zut = '')
    {
        if (($V4jvbeui0jzb = $this->getSheetByName($Vqujkwol1zut)) instanceof PHPExcel_Worksheet) {
            $this->setActiveSheetIndex($this->getIndex($V4jvbeui0jzb));
            return $V4jvbeui0jzb;
        }

        throw new PHPExcel_Exception('Workbook does not contain sheet:' . $Vqujkwol1zut);
    }

    
    public function getSheetNames()
    {
        $Vbco3t3kne3m = array();
        $Vcz0tvtfztwi = $this->getSheetCount();
        for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vcz0tvtfztwi; ++$Vfhiq1lhsoja) {
            $Vbco3t3kne3m[] = $this->getSheet($Vfhiq1lhsoja)->getTitle();
        }

        return $Vbco3t3kne3m;
    }

    
    public function addExternalSheet(PHPExcel_Worksheet $Vci1dgyyzjho, $Vfhiq1lhsojaSheetIndex = null) {
        if ($this->sheetNameExists($Vci1dgyyzjho->getTitle())) {
            throw new PHPExcel_Exception("Workbook already contains a worksheet named '{$Vci1dgyyzjho->getTitle()}'. Rename the external sheet first.");
        }

        
        $V0m2gbhb12th = count($this->_cellXfCollection);

        
        foreach ($Vci1dgyyzjho->getParent()->getCellXfCollection() as $Vh1srww3htfp) {
            $this->addCellXf(clone $Vh1srww3htfp);
        }

        
        $Vci1dgyyzjho->rebindParent($this);

        
        foreach ($Vci1dgyyzjho->getCellCollection(false) as $Vhibevwz1gkx) {
            $Vblc1ueqvbti = $Vci1dgyyzjho->getCell($Vhibevwz1gkx);
            $Vblc1ueqvbti->setXfIndex( $Vblc1ueqvbti->getXfIndex() + $V0m2gbhb12th );
        }

        return $this->addSheet($Vci1dgyyzjho, $Vfhiq1lhsojaSheetIndex);
    }

    
    public function getNamedRanges() {
        return $this->_namedRanges;
    }

    
    public function addNamedRange(PHPExcel_NamedRange $Vdqyivdsly3d) {
        if ($Vdqyivdsly3d->getScope() == null) {
            
            $this->_namedRanges[$Vdqyivdsly3d->getName()] = $Vdqyivdsly3d;
        } else {
            
            $this->_namedRanges[$Vdqyivdsly3d->getScope()->getTitle().'!'.$Vdqyivdsly3d->getName()] = $Vdqyivdsly3d;
        }
        return true;
    }

    
    public function getNamedRange($Vdqyivdsly3d, PHPExcel_Worksheet $Vci1dgyyzjho = null) {
        $Vbco3t3kne3m = null;

        if ($Vdqyivdsly3d != '' && ($Vdqyivdsly3d !== NULL)) {
            
            if (isset($this->_namedRanges[$Vdqyivdsly3d])) {
                $Vbco3t3kne3m = $this->_namedRanges[$Vdqyivdsly3d];
            }

            
            if (($Vci1dgyyzjho !== NULL) && isset($this->_namedRanges[$Vci1dgyyzjho->getTitle() . '!' . $Vdqyivdsly3d])) {
                $Vbco3t3kne3m = $this->_namedRanges[$Vci1dgyyzjho->getTitle() . '!' . $Vdqyivdsly3d];
            }
        }

        return $Vbco3t3kne3m;
    }

    
    public function removeNamedRange($Vdqyivdsly3d, PHPExcel_Worksheet $Vci1dgyyzjho = null) {
        if ($Vci1dgyyzjho === NULL) {
            if (isset($this->_namedRanges[$Vdqyivdsly3d])) {
                unset($this->_namedRanges[$Vdqyivdsly3d]);
            }
        } else {
            if (isset($this->_namedRanges[$Vci1dgyyzjho->getTitle() . '!' . $Vdqyivdsly3d])) {
                unset($this->_namedRanges[$Vci1dgyyzjho->getTitle() . '!' . $Vdqyivdsly3d]);
            }
        }
        return $this;
    }

    
    public function getWorksheetIterator() {
        return new PHPExcel_WorksheetIterator($this);
    }

    
    public function copy() {
        $Vovo2b5o0ymq = clone $this;

        $Vcz0tvtfztwi = count($this->_workSheetCollection);
        for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vcz0tvtfztwi; ++$Vfhiq1lhsoja) {
            $this->_workSheetCollection[$Vfhiq1lhsoja] = $this->_workSheetCollection[$Vfhiq1lhsoja]->copy();
            $this->_workSheetCollection[$Vfhiq1lhsoja]->rebindParent($this);
        }

        return $Vovo2b5o0ymq;
    }

    
    public function __clone() {
        foreach($this as $V51lf1kcbto4ey => $Vwk2nao2d33x) {
            if (is_object($Vwk2nao2d33x) || (is_array($Vwk2nao2d33x))) {
                $this->{$V51lf1kcbto4ey} = unserialize(serialize($Vwk2nao2d33x));
            }
        }
    }

    
    public function getCellXfCollection()
    {
        return $this->_cellXfCollection;
    }

    
    public function getCellXfByIndex($V4z43kvcbihn = 0)
    {
        return $this->_cellXfCollection[$V4z43kvcbihn];
    }

    
    public function getCellXfByHashCode($Vqujkwol1zut = '')
    {
        foreach ($this->_cellXfCollection as $Vh1srww3htfp) {
            if ($Vh1srww3htfp->getHashCode() == $Vqujkwol1zut) {
                return $Vh1srww3htfp;
            }
        }
        return false;
    }

    
    public function cellXfExists($Vhm011eyo1gw = null)
    {
        return in_array($Vhm011eyo1gw, $this->_cellXfCollection, true);
    }

    
    public function getDefaultStyle()
    {
        if (isset($this->_cellXfCollection[0])) {
            return $this->_cellXfCollection[0];
        }
        throw new PHPExcel_Exception('No default style found for this workbook');
    }

    
    public function addCellXf(PHPExcel_Style $Vdtcpflt5bhp)
    {
        $this->_cellXfCollection[] = $Vdtcpflt5bhp;
        $Vdtcpflt5bhp->setIndex(count($this->_cellXfCollection) - 1);
    }

    
    public function removeCellXfByIndex($V4z43kvcbihn = 0)
    {
        if ($V4z43kvcbihn > count($this->_cellXfCollection) - 1) {
            throw new PHPExcel_Exception("CellXf index is out of bounds.");
        } else {
            
            array_splice($this->_cellXfCollection, $V4z43kvcbihn, 1);

            
            foreach ($this->_workSheetCollection as $V4jvbeui0jzb) {
                foreach ($V4jvbeui0jzb->getCellCollection(false) as $Vhibevwz1gkx) {
                    $Vblc1ueqvbti = $V4jvbeui0jzb->getCell($Vhibevwz1gkx);
                    $V4de3455flza = $Vblc1ueqvbti->getXfIndex();
                    if ($V4de3455flza > $V4z43kvcbihn ) {
                        
                        $Vblc1ueqvbti->setXfIndex($V4de3455flza - 1);
                    } else if ($V4de3455flza == $V4z43kvcbihn) {
                        
                        $Vblc1ueqvbti->setXfIndex(0);
                    }
                }
            }
        }
    }

    
    public function getCellXfSupervisor()
    {
        return $this->_cellXfSupervisor;
    }

    
    public function getCellStyleXfCollection()
    {
        return $this->_cellStyleXfCollection;
    }

    
    public function getCellStyleXfByIndex($V4z43kvcbihn = 0)
    {
        return $this->_cellStyleXfCollection[$V4z43kvcbihn];
    }

    
    public function getCellStyleXfByHashCode($Vqujkwol1zut = '')
    {
        foreach ($this->_cellXfStyleCollection as $Vblc1ueqvbtiStyleXf) {
            if ($Vblc1ueqvbtiStyleXf->getHashCode() == $Vqujkwol1zut) {
                return $Vblc1ueqvbtiStyleXf;
            }
        }
        return false;
    }

    
    public function addCellStyleXf(PHPExcel_Style $Varc42rjkigb)
    {
        $this->_cellStyleXfCollection[] = $Varc42rjkigb;
        $Varc42rjkigb->setIndex(count($this->_cellStyleXfCollection) - 1);
    }

    
    public function removeCellStyleXfByIndex($V4z43kvcbihn = 0)
    {
        if ($V4z43kvcbihn > count($this->_cellStyleXfCollection) - 1) {
            throw new PHPExcel_Exception("CellStyleXf index is out of bounds.");
        } else {
            array_splice($this->_cellStyleXfCollection, $V4z43kvcbihn, 1);
        }
    }

    
    public function garbageCollect()
    {
        
        $Valrmmjfl1z4 = array();
        foreach ($this->_cellXfCollection as $Vfhiq1lhsojandex => $Vh1srww3htfp) {
            $Valrmmjfl1z4[$Vfhiq1lhsojandex] = 0;
        }

        foreach ($this->getWorksheetIterator() as $Vzg4jtrmmzdy) {

            
            foreach ($Vzg4jtrmmzdy->getCellCollection(false) as $Vhibevwz1gkx) {
                $Vblc1ueqvbti = $Vzg4jtrmmzdy->getCell($Vhibevwz1gkx);
                ++$Valrmmjfl1z4[$Vblc1ueqvbti->getXfIndex()];
            }

            
            foreach ($Vzg4jtrmmzdy->getRowDimensions() as $Vkmxwmhd3woe) {
                if ($Vkmxwmhd3woe->getXfIndex() !== null) {
                    ++$Valrmmjfl1z4[$Vkmxwmhd3woe->getXfIndex()];
                }
            }

            
            foreach ($Vzg4jtrmmzdy->getColumnDimensions() as $Vx1j2ylp4lrv) {
                ++$Valrmmjfl1z4[$Vx1j2ylp4lrv->getXfIndex()];
            }
        }

        
        
        $Vuhmpkm3pnyy = 0;
        foreach ($this->_cellXfCollection as $Vfhiq1lhsojandex => $Vh1srww3htfp) {
            if ($Valrmmjfl1z4[$Vfhiq1lhsojandex] > 0 || $Vfhiq1lhsojandex == 0) { 
                ++$Vuhmpkm3pnyy;
            } else {
                unset($this->_cellXfCollection[$Vfhiq1lhsojandex]);
            }
            $V2lrhw0msxly[$Vfhiq1lhsojandex] = $Vuhmpkm3pnyy - 1;
        }
        $this->_cellXfCollection = array_values($this->_cellXfCollection);

        
        foreach ($this->_cellXfCollection as $Vfhiq1lhsoja => $Vh1srww3htfp) {
            $Vh1srww3htfp->setIndex($Vfhiq1lhsoja);
        }

        
        if (empty($this->_cellXfCollection)) {
            $this->_cellXfCollection[] = new PHPExcel_Style();
        }

        
        foreach ($this->getWorksheetIterator() as $Vzg4jtrmmzdy) {

            
            foreach ($Vzg4jtrmmzdy->getCellCollection(false) as $Vhibevwz1gkx) {
                $Vblc1ueqvbti = $Vzg4jtrmmzdy->getCell($Vhibevwz1gkx);
                $Vblc1ueqvbti->setXfIndex( $V2lrhw0msxly[$Vblc1ueqvbti->getXfIndex()] );
            }

            
            foreach ($Vzg4jtrmmzdy->getRowDimensions() as $Vkmxwmhd3woe) {
                if ($Vkmxwmhd3woe->getXfIndex() !== null) {
                    $Vkmxwmhd3woe->setXfIndex( $V2lrhw0msxly[$Vkmxwmhd3woe->getXfIndex()] );
                }
            }

            
            foreach ($Vzg4jtrmmzdy->getColumnDimensions() as $Vx1j2ylp4lrv) {
                $Vx1j2ylp4lrv->setXfIndex( $V2lrhw0msxly[$Vx1j2ylp4lrv->getXfIndex()] );
            }

			
            $Vzg4jtrmmzdy->garbageCollect();
        }
    }

    
    public function getID() {
        return $this->_uniqueID;
    }

}
