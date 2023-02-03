<?php

class Furniture extends Product {

  public function updateValue($value){
    $this->dimensions = $value;
  }
  public function talk()
  {
    echo $this->type;
    echo 'I am a piece of Furniture';
  }
}