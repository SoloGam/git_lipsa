<?php
  session_start();
  // session_destroy();
  if(!isset($_SESSION['word'])) {

  $word = str_split(randomWord());
  $chances = 5;
  $guessed = array_fill(0, count($word) -1, '_');

  $_SESSION['word'] = $word;

  $_SESSION['chances'] = $chances;

  $_SESSION['guessed'] = $guessed;

}
  if (isset($_POST['letter'])) {
    $letter = $_POST['letter'];
    if (hasLetter($letter)) {
      searchAndReplaceLetter($letter);
      checkwind();
    } else {
      $_SESSION['chances']--;
      checklose();
    }
}
function hasLetter($letter) {
  return array_search($letter, $_SESSION['word']) !=false;
}

function checkwin() {
  if (array_search('_', $_SESSION['guessed']) === false) {
    session_destroy();
    ?> <script>
        alert("You Won!");
    </script> <?php
  }
}
function searchAndReplaceLetter($letter) {
  foreach($_SESSION['word'] as $key => $value) {
    if ($value == $letter) {
      $_SESSION['guessed'][$key] = $letter;
    }
  }
}

function checklose(){
  if ($_SESSION['chances'] == 0) {
    session_destroy();
    ?> <script>
        alert("Game over!");
    </script> <?php
  }
}
function randomWord() {
  $words = file('File.txt');
  return $words[array_rand($words)];
}
?>

<div>
  Mai ai <?php echo $_SESSION['chances'];?> incercari.
</div>

<div>
  <?php echo implode(" ", $_SESSION['guessed']); ?>
</div>

<form method="post" action="hangman.php">
  <label>Ghiceste litera</label>
  <input type="text" name="letter">
  <input type="submit" name="" value="Send">
</form>
