<?php


require_once dirname(__FILE__)."/font_table_directory_entry.cls.php";


class Font_WOFF_Table_Directory_Entry extends Font_Table_Directory_Entry {
  function __construct(Font_WOFF $Vj0kojsfk0h3) {
    parent::__construct($Vj0kojsfk0h3);
    $this->offset = $this->readUInt32();
    $this->length = $this->readUInt32();
    $this->origLength = $this->readUInt32();
    $this->checksum = $this->readUInt32();
  }
}
