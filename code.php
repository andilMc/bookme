<?php 

function generateRandomPart()
  {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $randomPart = '';
      $length = 6;
 
      for ($i = 0; $i < $length; $i++) {
          $randomPart .= $characters[random_int(0, strlen($characters) - 1)];
      }

      return "CR".$randomPart;
}

echo  generateRandomPart();