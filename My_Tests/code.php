<?php
  if (!isset($_POST['a'])) {
    exit;
  }
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['option'];

    switch ($c) {
      case '+' :
        echo $a + $b;
        break;
      case '-' :
          echo $a - $b;
        break;

      default:
        // code...
        break;
    }

?>
