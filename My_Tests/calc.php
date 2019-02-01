<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Form</title>
</head>

<body>

<form method="post">
    <input type="number" placeholder="Numarul a: " name="a">
    <select name="option">
      <option value="+">+</option>
      <option value="-">-</option>
      <option value="*">*</option>
      <option value="/">/</option>
    </select>
    <input type="number" placeholder="Numarul b: " name="b">
    <input type="submit" value="Trimite">
 </form>

 <?php
  require 'code.php';
 ?>

</body>
</html>
