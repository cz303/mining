<?php




class PHPExcel_WorksheetIterator implements Iterator
{
    
    private $Vpdxazfpfi4p;

    
    private $Vqvgj4sslcm2 = 0;

    
    public function __construct(PHPExcel $Vld5fbk2n1id = null)
    {
        
        $this->_subject = $Vld5fbk2n1id;
    }

    
    public function __destruct()
    {
        unset($this->_subject);
    }

    
    public function rewind()
    {
        $this->_position = 0;
    }

    
    public function current()
    {
        return $this->_subject->getSheet($this->_position);
    }

    
    public function key()
    {
        return $this->_position;
    }

    
    public function next()
    {
        ++$this->_position;
    }

    
    public function valid()
    {
        return $this->_position < $this->_subject->getSheetCount();
    }
}
