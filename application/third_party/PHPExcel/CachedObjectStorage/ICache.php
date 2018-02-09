<?php




interface PHPExcel_CachedObjectStorage_ICache
{
    
	public function addCacheData($Vecicbl4f0hy, PHPExcel_Cell $Vblc1ueqvbti);

    
	public function updateCacheData(PHPExcel_Cell $Vblc1ueqvbti);

    
	public function getCacheData($Vecicbl4f0hy);

    
	public function deleteCacheData($Vecicbl4f0hy);

	
	public function isDataSet($Vecicbl4f0hy);

	
	public function getCellList();

	
	public function getSortedCellList();

	
	public function copyCellCollection(PHPExcel_Worksheet $V3jkqexf4nr0);

	
	public static function cacheMethodIsAvailable();

}
