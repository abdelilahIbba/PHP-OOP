<?php

class Database
{
    public $Books = [];
    public function __construct()
    {
        $this->retrieveData();
    }

    private function retrieveData()
    {
        $file_path = "../DB/DataBase.txt";
// 
            $content = file_get_contents($file_path);
            
            // Check if unserialization is successful
            $Data = unserialize($content);
            $this->Books = $Data->Books; 
            // 
        
    }

    private function storeData()
    {
        $file_path = "../DB/DataBase.txt";

        // Serialize the current instance (with the updated Books)
        $Data = serialize($this);
        
        // Write the serialized data back to the file
       file_put_contents($file_path, $Data);
           
        
    }

    public function saveData()
    {
        $this->storeData();
    }
}
