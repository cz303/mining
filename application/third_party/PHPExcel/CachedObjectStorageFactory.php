<?php





class PHPExcel_CachedObjectStorageFactory
{
    const cache_in_memory               = 'Memory';
    const cache_in_memory_gzip          = 'MemoryGZip';
    const cache_in_memory_serialized    = 'MemorySerialized';
    const cache_igbinary                = 'Igbinary';
    const cache_to_discISAM             = 'DiscISAM';
    const cache_to_apc                  = 'APC';
    const cache_to_memcache             = 'Memcache';
    const cache_to_phpTemp              = 'PHPTemp';
    const cache_to_wincache             = 'Wincache';
    const cache_to_sqlite               = 'SQLite';
    const cache_to_sqlite3              = 'SQLite3';


    
    private static $Vnieqzp3tguo = NULL;

    
    private static $V4g1ztlqt5go = NULL;


    
    private static $Vxfstbmkiy1a = array(
        self::cache_in_memory,
        self::cache_in_memory_gzip,
        self::cache_in_memory_serialized,
        self::cache_igbinary,
        self::cache_to_phpTemp,
        self::cache_to_discISAM,
        self::cache_to_apc,
        self::cache_to_memcache,
        self::cache_to_wincache,
        self::cache_to_sqlite,
        self::cache_to_sqlite3,
    );


    
    private static $Vpydqxsadjbo = array(
        self::cache_in_memory               => array(
                                                    ),
        self::cache_in_memory_gzip          => array(
                                                    ),
        self::cache_in_memory_serialized    => array(
                                                    ),
        self::cache_igbinary                => array(
                                                    ),
        self::cache_to_phpTemp              => array( 'memoryCacheSize' => '1MB'
                                                    ),
        self::cache_to_discISAM             => array( 'dir'             => NULL
                                                    ),
        self::cache_to_apc                  => array( 'cacheTime'       => 600
                                                    ),
        self::cache_to_memcache             => array( 'memcacheServer'  => 'localhost',
                                                      'memcachePort'    => 11211,
                                                      'cacheTime'       => 600
                                                    ),
        self::cache_to_wincache             => array( 'cacheTime'       => 600
                                                    ),
        self::cache_to_sqlite               => array(
                                                    ),
        self::cache_to_sqlite3              => array(
                                                    ),
    );


    
    private static $Vp53l43hh1de = array();


    
    public static function getCacheStorageMethod()
    {
        return self::$Vnieqzp3tguo;
    }   


    
    public static function getCacheStorageClass()
    {
        return self::$V4g1ztlqt5go;
    }   


    
    public static function getAllCacheStorageMethods()
    {
        return self::$Vxfstbmkiy1a;
    }   


    
    public static function getCacheStorageMethods()
    {
        $Vokbdyywl0et = array();
        foreach(self::$Vxfstbmkiy1a as $Vygaqr3qgid2) {
            $Vkum5ygqutxb = 'PHPExcel_CachedObjectStorage_' . $Vygaqr3qgid2;
            if (call_user_func(array($Vkum5ygqutxb, 'cacheMethodIsAvailable'))) {
                $Vokbdyywl0et[] = $Vygaqr3qgid2;
            }
        }
        return $Vokbdyywl0et;
    }   


    
    public static function initialize($Vihjcs2gfuz0 = self::cache_in_memory, $Vy2di2fo5jaz = array())
    {
        if (!in_array($Vihjcs2gfuz0,self::$Vxfstbmkiy1a)) {
            return FALSE;
        }

        $Vkum5ygqutxb = 'PHPExcel_CachedObjectStorage_'.$Vihjcs2gfuz0;
        if (!call_user_func(array( $Vkum5ygqutxb,
                                   'cacheMethodIsAvailable'))) {
            return FALSE;
        }

        self::$Vp53l43hh1de[$Vihjcs2gfuz0] = self::$Vpydqxsadjbo[$Vihjcs2gfuz0];
        foreach($Vy2di2fo5jaz as $V51lf1kcbto4 => $Vf1kwqxxhqpz) {
            if (array_key_exists($V51lf1kcbto4, self::$Vp53l43hh1de[$Vihjcs2gfuz0])) {
                self::$Vp53l43hh1de[$Vihjcs2gfuz0][$V51lf1kcbto4] = $Vf1kwqxxhqpz;
            }
        }

        if (self::$Vnieqzp3tguo === NULL) {
            self::$V4g1ztlqt5go = 'PHPExcel_CachedObjectStorage_' . $Vihjcs2gfuz0;
            self::$Vnieqzp3tguo = $Vihjcs2gfuz0;
        }
        return TRUE;
    }   


    
    public static function getInstance(PHPExcel_Worksheet $V3jkqexf4nr0)
    {
        $Vblqxhokbjfy = TRUE;
        if (self::$Vnieqzp3tguo === NULL) {
            $Vblqxhokbjfy = self::initialize();
        }

        if ($Vblqxhokbjfy) {
            $Vz1qvyizgpuq = new self::$V4g1ztlqt5go( $V3jkqexf4nr0,
                                                       self::$Vp53l43hh1de[self::$Vnieqzp3tguo]
                                                     );
            if ($Vz1qvyizgpuq !== NULL) {
                return $Vz1qvyizgpuq;
            }
        }

        return FALSE;
    }   


    
	public static function finalize()
	{
		self::$Vnieqzp3tguo = NULL;
		self::$V4g1ztlqt5go = NULL;
		self::$Vp53l43hh1de = array();
	}

}
