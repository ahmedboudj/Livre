<?php
trait Hydrator {
  public function hydrate($data = false) {
    if($data && is_array($data)) {
      foreach ($data as $key => $value) {
        $method = "set" . ucfirst($key);
        if(method_exists($this, $method)) {
          $this->$method($value);
        }
      }
	  
    }
  }
}



 ?>
