<?php

class Database
{
  private $Books = [];

  public function __construct()
  {
    $this->getData();
  }

  private function getData()
  {
    $filePath = "../DB/Database.txt";
    if (file_exists($filePath) && !empty(unserialize(file_get_contents($filePath))))
    {
      $this->Books = unserialize(file_get_contents($filePath))->Books;
    }
  }

  private function setData()
  {
    $filePath = "../DB/Database.txt";
    $Data = serialize($this);
    file_put_contents($filePath, $Data);
  }

  public function saveData()
  {
    $this->setData();
  }

  public function getBooks()
  {
    return $this->Books;
  }

  public function setBooks($book)
  {
    array_push($this->Books, $book);
  }

}
