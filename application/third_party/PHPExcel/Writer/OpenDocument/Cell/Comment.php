<?php




class PHPExcel_Writer_OpenDocument_Cell_Comment
{
    public static function write(PHPExcel_Shared_XMLWriter $Vze2ah1ycp2c, PHPExcel_Cell $Vblc1ueqvbti)
    {
        $Va0ahiqrugl0 = $Vblc1ueqvbti->getWorksheet()->getComments();
        if (!isset($Va0ahiqrugl0[$Vblc1ueqvbti->getCoordinate()])) {
            return;
        }
        $Vd25ttkxmgaf = $Va0ahiqrugl0[$Vblc1ueqvbti->getCoordinate()];

        $Vze2ah1ycp2c->startElement('office:annotation');
            
            
            $Vze2ah1ycp2c->writeAttribute('svg:width', $Vd25ttkxmgaf->getWidth());
            $Vze2ah1ycp2c->writeAttribute('svg:height', $Vd25ttkxmgaf->getHeight());
            $Vze2ah1ycp2c->writeAttribute('svg:x', $Vd25ttkxmgaf->getMarginLeft());
            $Vze2ah1ycp2c->writeAttribute('svg:y', $Vd25ttkxmgaf->getMarginTop());
            
            
                $Vze2ah1ycp2c->writeElement('dc:creator', $Vd25ttkxmgaf->getAuthor());
                
                
                $Vze2ah1ycp2c->writeElement('text:p', $Vd25ttkxmgaf->getText()->getPlainText());
                    
        $Vze2ah1ycp2c->endElement();
    }
}
