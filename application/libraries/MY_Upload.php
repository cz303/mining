<?php if(!defined("BASEPATH")){ exit("No direct script access allowed"); }

	
		class MY_Upload extends CI_Upload {
			
			
			
			 	protected $Vtarhlvysl4q		= array();
				protected $Vazoshx1wcj3	= "";
				
				
			
				public function initialize($Vxsjmb2er2wv = array()){
					
					$Vd5sytl5c0zf = array(
									"max_size"			=> 0,
									"max_width"			=> 0,
									"max_height"		=> 0,
									"max_filename"		=> 0,
									"allowed_types"		=> "",
									"file_temp"			=> "",
									"file_name"			=> "",
									"orig_name"			=> "",
									"file_type"			=> "",
									"file_size"			=> "",
									"file_ext"			=> "",
									"upload_path"		=> "",
									"overwrite"			=> FALSE,
									"encrypt_name"		=> FALSE,
									"is_image"			=> FALSE,
									"image_width"		=> "",
									"image_height"		=> "",
									"image_type"		=> "",
									"image_size_str"	=> "",
									"error_msg"			=> array(),
									"mimes"				=> array(),
									"remove_spaces"		=> TRUE,
									"xss_clean"			=> FALSE,
									"temp_prefix"		=> "temp_file_",
									"client_name"		=> ""
								);
					
					
					foreach($Vd5sytl5c0zf as $Vseq1edikdvg => $Vwk2nao2d33x){
						if(isset($Vxsjmb2er2wv[$Vseq1edikdvg])){
							$Vihjcs2gfuz0 = "set_{$Vseq1edikdvg}";
							if(method_exists($this, $Vihjcs2gfuz0)){
								$this->$Vihjcs2gfuz0($Vxsjmb2er2wv[$Vseq1edikdvg]);
							} else {
								$this->$Vseq1edikdvg = $Vxsjmb2er2wv[$Vseq1edikdvg];
							}
						} else {
							$this->$Vseq1edikdvg = $Vwk2nao2d33x;
						}
					}
					
					
					if(!empty($this->file_name)){
						
						if(is_array($this->file_name)){
							
							$this->_file_name_override = "";
							
							
							$this->_multi_file_name_override = $this->file_name;
						
						} else {
							
							$this->_file_name_override = $this->file_name;
							
							
							$this->_multi_file_name_override = "";
						}
					}
				}
				
				
			
				protected function _file_mime_type($Vg5mhfl1beoi, $Vytbsuz3c5qz=0){
					
					if(is_array($Vg5mhfl1beoi["name"])){
						$Vc5dzjvgyf5r = $Vg5mhfl1beoi["tmp_name"][$Vytbsuz3c5qz];
						$V4pigtpor0ln = $Vg5mhfl1beoi["type"][$Vytbsuz3c5qz];
					
					} else {
						$Vc5dzjvgyf5r = $Vg5mhfl1beoi["tmp_name"];
						$V4pigtpor0ln = $Vg5mhfl1beoi["type"];
					}
					
					
					$Vt1xrpeoijus = "/^([a-z\-]+\/[a-z0-9\-\.\+]+)(;\s.+)?$/";
					
					
					 	if(function_exists("finfo_file")){
					 		$Vxnx0oxo2qjh = finfo_open(FILEINFO_MIME);
							if(is_resource($Vxnx0oxo2qjh)){
								$Vouwscncdskk = @finfo_file($Vxnx0oxo2qjh, $Vc5dzjvgyf5r);
								finfo_close($Vxnx0oxo2qjh);
								
								
								 	if(is_string($Vouwscncdskk) && preg_match($Vt1xrpeoijus, $Vouwscncdskk, $Vt3xexsia3ta)){
								 		$this->file_type = $Vt3xexsia3ta[1];
										return;
								 	}
							}
					 	}
						
					
					 	if(DIRECTORY_SEPARATOR !== "\\"){
					 		$V3zmm2yxwbze = "file --brief --mime ".escapeshellarg($Vc5dzjvgyf5r)." 2>&1";
							
							if(function_exists("exec")){
								
									$Vouwscncdskk = @exec($V3zmm2yxwbze, $Vouwscncdskk, $Vtonojcbg41l);
									if($Vtonojcbg41l === 0 && is_string($Vouwscncdskk) && preg_match($Vt1xrpeoijus, $Vouwscncdskk, $Vt3xexsia3ta)){
										$this->file_type = $Vt3xexsia3ta[1];
										return;
									}
							}
					 	}
						
						if((bool)@ini_get("safe_mode") === FALSE && function_exists("shell_exec")){
							$Vouwscncdskk = @shell_exec($V3zmm2yxwbze);
							if(strlen($Vouwscncdskk) > 0){
								$Vouwscncdskk = explode("\n", trim($Vouwscncdskk));
								if(preg_match($Vt1xrpeoijus, $Vouwscncdskk[(count($Vouwscncdskk) - 1)], $Vt3xexsia3ta)){
									$this->file_type = $Vt3xexsia3ta[1];
									return;
								}
							}
						}
						
						if(function_exists("popen")){
							$V0jz4dxmn1gn = @popen($V3zmm2yxwbze, "r");
							if(is_resource($V0jz4dxmn1gn)){
								$Vouwscncdskk = @fread($V0jz4dxmn1gn, 512);
								@pclose($V0jz4dxmn1gn);
								if($Vouwscncdskk !== FALSE){
									$Vouwscncdskk = explode("\n", trim($Vouwscncdskk));
									if(preg_match($Vt1xrpeoijus, $Vouwscncdskk[(count($Vouwscncdskk) - 1)], $Vt3xexsia3ta)){
										$this->file_type = $Vt3xexsia3ta[1];
										return;
									}
								}
							}
						}
						
						
						if(function_exists("mime_content_type")){
							$this->file_type = @mime_content_type($Vc5dzjvgyf5r);
							
							if(strlen($this->file_type) > 0){
								return;
							}
						}
						
						
						$this->file_type = $V4pigtpor0ln;
				}
				
				
			
				protected function set_multi_upload_data(){
					$this->_multi_upload_data[] = array(
						"file_name"			=> $this->file_name,
						"file_type"			=> $this->file_type,
						"file_path"			=> $this->upload_path,
						"full_path"			=> $this->upload_path.$this->file_name,
						"raw_name"			=> str_replace($this->file_ext, "", $this->file_name),
						"orig_name"			=> $this->orig_name,
						"client_name"		=> $this->client_name,
						"file_ext"			=> $this->file_ext,
						"file_size"			=> $this->file_size,
						"is_image"			=> $this->is_image(),
						"image_width"		=> $this->image_width,
						"image_height"		=> $this->image_height,
						"image_type"		=> $this->image_type,
						"image_size_str"	=> $this->image_size_str
					);
				}
				
				
			
				public function get_multi_upload_data(){
					return $this->_multi_upload_data;
				}
				
				
			
				public function do_multi_upload($Vrnrburfh0bd){
					
					if(!isset($_FILES[$Vrnrburfh0bd])){ return false; }
					
					
					if(!is_array($_FILES[$Vrnrburfh0bd]["name"])){
						
						return $this->do_upload($Vrnrburfh0bd);
					}
					
					
					if(!$this->validate_upload_path()){
						
						return FALSE;
					}
					
					
					
					
					for($Vfhiq1lhsoja=0; $Vfhiq1lhsoja<count($_FILES[$Vrnrburfh0bd]["name"]); $Vfhiq1lhsoja++){
						
						if(!is_uploaded_file($_FILES[$Vrnrburfh0bd]["tmp_name"][$Vfhiq1lhsoja])){
							
							$Vyrkodvljby0 = (!isset($_FILES[$Vrnrburfh0bd]["error"][$Vfhiq1lhsoja])) ? 4 : $_FILES[$Vrnrburfh0bd]["error"][$Vfhiq1lhsoja];
							
							
							switch($Vyrkodvljby0){
								
								case 1:
									$this->set_error("upload_file_exceeds_limit");
								break;
								
								case 2:
									$this->set_error("upload_file_exceeds_form_limit");
								break;
								
								case 3:
									$this->set_error("upload_file_partial");
								break;
								
								case 4:
									$this->set_error("upload_no_file_selected");
								break;
								
								case 6:
									$this->set_error("upload_no_temp_directory");
								break;
								
								case 7:
									$this->set_error("upload_unable_to_write_file");
								break;
								
								case 8:
									$this->set_error("upload_stopped_by_extension");
								break;
								default:
									$this->set_error("upload_no_file_selected");
								break;
							}
							
							
							return FALSE;
						}
						
						
						$this->file_temp	= $_FILES[$Vrnrburfh0bd]["tmp_name"][$Vfhiq1lhsoja];
						$this->file_size	= $_FILES[$Vrnrburfh0bd]["size"][$Vfhiq1lhsoja];
						$this->_file_mime_type($_FILES[$Vrnrburfh0bd], $Vfhiq1lhsoja);
						$this->file_type	= preg_replace("/^(.+?);.*$/", "\\1", $this->file_type);
						$this->file_type	= strtolower(trim(stripslashes($this->file_type), '"'));
						$this->file_name	= $this->_prep_filename($_FILES[$Vrnrburfh0bd]["name"][$Vfhiq1lhsoja]);
						$this->file_ext		= $this->get_extension($this->file_name);
						$this->client_name	= $this->file_name;
						
						
						if(!$this->is_allowed_filetype()){
							$this->set_error("upload_invalid_filetype");
							return FALSE;
						}
						
						
						
						if(!empty($this->_multi_file_name_override[$Vfhiq1lhsoja])){
							$this->file_name = $this->_prep_filename($this->_multi_file_name_override[$Vfhiq1lhsoja]);
							
							
							if(strpos($this->_multi_file_name_override[$Vfhiq1lhsoja], ".") === FALSE){
								$this->file_name .= $this->file_ext;
							
							} else {
								$this->file_ext = $this->get_extension($this->_multi_file_name_override[$Vfhiq1lhsoja]);
							}
							
							if(!$this->is_allowed_filetype(TRUE)){
								$this->set_error("upload_invalid_filetype");
								return FALSE;
							}
						}
						
						
						if($this->file_size > 0){
							$this->file_size = round($this->file_size/1024, 2);
						}
						
						
						if(!$this->is_allowed_filesize()){
							$this->set_error("upload_invalid_filesize");
							return FALSE;
						}
						
						
						
						if(!$this->is_allowed_dimensions()){
							$this->set_error("upload_invalid_dimensions");
							return FALSE;
						}
						
						
						$this->file_name = $this->clean_file_name($this->file_name);
						
						
						if($this->max_filename > 0){
							$this->file_name = $this->limit_filename_length($this->file_name, $this->max_filename);
						}
						
						
						if($this->remove_spaces == TRUE){
							$this->file_name = preg_replace("/\s+/", "_", $this->file_name);
						}
						
						
							$this->orig_name = $this->file_name;
							if($this->overwrite == FALSE){
								$this->file_name = $this->set_filename($this->upload_path, $this->file_name);
								if($this->file_name === FALSE){
									return FALSE;
								}
							}
							
						
							if($this->xss_clean){
								if($this->do_xss_clean() === FALSE){
									$this->set_error("upload_unable_to_write_file");
									return FALSE;
								}
							}
							
						
							if(!@copy($this->file_temp, $this->upload_path.$this->file_name)){
								if(!@move_uploaded_file($this->file_temp, $this->upload_path.$this->file_name)){
									$this->set_error("upload_destination_error");
									return FALSE;
								}
							}
						
						
							$this->set_image_properties($this->upload_path.$this->file_name);
							
						
						$this->set_multi_upload_data();
					}
					
					
					return TRUE;
			}
		}
