<?php

class InputHandler {
   public function emailVerify($email):bool {
        return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
     }
    
    public function isEmpty($input):bool {
        return empty($input);
    }
    
   public function phoneVerify($phone):bool {
      $pattern = "/^\+?[0-9\s\-]+$/"; 
     return (bool) filter_var($phone, FILTER_VALIDATE_REGEXP,["options" => ["regexp" => $pattern]]);
    }
}


?>