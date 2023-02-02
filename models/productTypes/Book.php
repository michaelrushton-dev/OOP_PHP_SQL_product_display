
<?php
class Book extends Product {

  public function talk()
  {
    echo $this->type;
    echo 'I am a Book';
  }
}


