<?php
namespace Codefii\Manager;
class File {
    private $supported_formats =[];
    public $file_name;

    public $file_type;

    public $file_temp;

    public $file_size;

    public $path;

    public $isUploaded = false;
    
    public function upload(array $file,array $supported_formats){
        $this->supported_formats = $supported_formats;
        $file_values = array_values($file);
        $file_path = $file_values[0];
        $this->path = $file_path;
        $main_file = $file_values[1];
        if(is_array($main_file)){
            if(in_array($main_file['type'],$this->getSupportedFormats())){
                $this->file_name = $main_file['name'];
                $this->file_type = $main_file['type'];
                $this->file_temp = $main_file['temp'];
                $this->file_size = $main_file['size'];
                if($this->move()){
                    $this->isUploaded = true;
                }else{
                    $this->isUploaded = false;
                }
            }else{
                die("Format not supported");
            }
        }

    }
     public function getFileName(){
        return $this->file_name;
    }
    public function getFileSize(){
            return $this->file_size;
    }
        
    public function move(){
            return move_uploade_file($this->file_temp,
            "/App/templates/{$this->path}/".$this->file_name);
    
    }
    public function isUploaded(){
        return $this->isUploaded;
    }
    public function getSupportedFormats(){
        return $this->supported_formats;
    }

   
}