<?php



if (!defined('PHPEXCEL_ROOT')) {
    
    define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../');
    require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}


class PHPExcel_Settings
{
    
    
    const PCLZIP        = 'PHPExcel_Shared_ZipArchive';
    const ZIPARCHIVE    = 'ZipArchive';

    
    const CHART_RENDERER_JPGRAPH    = 'jpgraph';

    
    const PDF_RENDERER_TCPDF		= 'tcPDF';
    const PDF_RENDERER_DOMPDF		= 'DomPDF';
    const PDF_RENDERER_MPDF 		= 'mPDF';


    private static $V2xyltthp5bb = array(
        self::CHART_RENDERER_JPGRAPH,
    );

    private static $Vrgtlopn0buz = array(
        self::PDF_RENDERER_TCPDF,
        self::PDF_RENDERER_DOMPDF,
        self::PDF_RENDERER_MPDF,
    );


    
    private static $Vxvy0ycctg30    = self::ZIPARCHIVE;


    
    private static $Vw1l5ujtxpyd = NULL;

    
    private static $Vd50k0iq4knw = NULL;


    
    private static $Vymv5221reul = NULL;

    
    private static $Vqzmnkn4gh2u = NULL;

    
    private static $Vcbhclrpzegv = null;

    
    public static function setZipClass($Vvwuzecprr3z)
    {
        if (($Vvwuzecprr3z === self::PCLZIP) ||
            ($Vvwuzecprr3z === self::ZIPARCHIVE)) {
            self::$Vxvy0ycctg30 = $Vvwuzecprr3z;
            return TRUE;
        }
        return FALSE;
    } 


    
    public static function getZipClass()
    {
        return self::$Vxvy0ycctg30;
    } 


    
    public static function getCacheStorageMethod()
    {
        return PHPExcel_CachedObjectStorageFactory::getCacheStorageMethod();
    } 


    
    public static function getCacheStorageClass()
    {
        return PHPExcel_CachedObjectStorageFactory::getCacheStorageClass();
    } 


    
    public static function setCacheStorageMethod(
    	$Vihjcs2gfuz0 = PHPExcel_CachedObjectStorageFactory::cache_in_memory,
      $Vy2di2fo5jaz = array()
    )
    {
        return PHPExcel_CachedObjectStorageFactory::initialize($Vihjcs2gfuz0, $Vy2di2fo5jaz);
    } 


    
    public static function setLocale($Vamaqngce5dh='en_us')
    {
        return PHPExcel_Calculation::getInstance()->setLocale($Vamaqngce5dh);
    } 


    
    public static function setChartRenderer($V5puud31eo1w, $V5wfln1yuaqr)
    {
        if (!self::setChartRendererName($V5puud31eo1w))
            return FALSE;
        return self::setChartRendererPath($V5wfln1yuaqr);
    } 


    
    public static function setChartRendererName($V5puud31eo1w)
    {
        if (!in_array($V5puud31eo1w,self::$V2xyltthp5bb)) {
            return FALSE;
        }

        self::$Vw1l5ujtxpyd = $V5puud31eo1w;

        return TRUE;
    } 


    
    public static function setChartRendererPath($V5wfln1yuaqr)
    {
        if ((file_exists($V5wfln1yuaqr) === false) || (is_readable($V5wfln1yuaqr) === false)) {
            return FALSE;
        }
        self::$Vd50k0iq4knw = $V5wfln1yuaqr;

        return TRUE;
    } 


    
    public static function getChartRendererName()
    {
        return self::$Vw1l5ujtxpyd;
    } 


    
    public static function getChartRendererPath()
    {
        return self::$Vd50k0iq4knw;
    } 


    
    public static function setPdfRenderer($V5puud31eo1w, $V5wfln1yuaqr)
    {
        if (!self::setPdfRendererName($V5puud31eo1w))
            return FALSE;
        return self::setPdfRendererPath($V5wfln1yuaqr);
    } 


    
    public static function setPdfRendererName($V5puud31eo1w)
    {
        if (!in_array($V5puud31eo1w,self::$Vrgtlopn0buz)) {
            return FALSE;
        }

        self::$Vymv5221reul = $V5puud31eo1w;

        return TRUE;
    } 


    
    public static function setPdfRendererPath($V5wfln1yuaqr)
    {
        if ((file_exists($V5wfln1yuaqr) === false) || (is_readable($V5wfln1yuaqr) === false)) {
            return FALSE;
        }
        self::$Vqzmnkn4gh2u = $V5wfln1yuaqr;

        return TRUE;
    } 


    
    public static function getPdfRendererName()
    {
        return self::$Vymv5221reul;
    } 

    
    public static function getPdfRendererPath()
    {
        return self::$Vqzmnkn4gh2u;
    } 

    
    public static function setLibXmlLoaderOptions($Vobxlvad3352 = null)
    {
        if (is_null($Vobxlvad3352) && defined(LIBXML_DTDLOAD)) {
            $Vobxlvad3352 = LIBXML_DTDLOAD | LIBXML_DTDATTR;
        }
        if (version_compare(PHP_VERSION, '5.2.11') >= 0) {
            @libxml_disable_entity_loader($Vobxlvad3352 == (LIBXML_DTDLOAD | LIBXML_DTDATTR)); 
        }
        self::$Vcbhclrpzegv = $Vobxlvad3352;
    } 

    
    public static function getLibXmlLoaderOptions()
    {
        if (is_null(self::$Vcbhclrpzegv) && defined(LIBXML_DTDLOAD)) {
            self::setLibXmlLoaderOptions(LIBXML_DTDLOAD | LIBXML_DTDATTR);
        }
        if (version_compare(PHP_VERSION, '5.2.11') >= 0) {
            @libxml_disable_entity_loader(self::$Vcbhclrpzegv == (LIBXML_DTDLOAD | LIBXML_DTDATTR));
        }
        return self::$Vcbhclrpzegv;
    } 
}
