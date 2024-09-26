<?php

class DataBase{

    private $filePath ;
    public $Books = [];

  public function __construct($filePath ="../DB/DataBase.txt") {
    $this->filePath = $filePath;
    $this->fetchData();
   
    
  }

  public function fetchData(){

    if (file_exists($this->filePath)){
        $content = file_get_contents($this->filePath);
        $data = unserialize($content);
        $this->Books = $data->Books; 
    }
    
  }
  private function pushData(){

     $data= serialize($this);
     file_put_contents($this->filePath,$data );
  }

  public function store(){
    $this-> pushData();

  }



}