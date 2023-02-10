<?php
class DVD extends Product {

  public function updateValue($value){
    $this->size = $value;
  }
  public function talk()
  {
    echo $this->type;

  }
}