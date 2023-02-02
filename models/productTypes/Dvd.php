<?php

class DVD extends Product {

  public function talk()
  {
    echo $this->type;
    echo 'I am a DVD';
  }
}