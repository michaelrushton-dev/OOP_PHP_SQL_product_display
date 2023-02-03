

<?php
class Book extends Product {
  
//updateValue() gets called by add_item and sends in the incoming value as
// an argument, then it replaces the appropriate attribute with 
//value - e.g Book = weight.
  public function updateValue($value){
    $this->weight = $value;
  }

  public function talk()
  {
    echo $this->type;
    echo 'I am a Book';
  }
}



