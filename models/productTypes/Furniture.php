<?php

class Furniture extends Product {

  public function talk()
  {
    echo $this->type;
    echo 'I am a Furniture';
  }
}