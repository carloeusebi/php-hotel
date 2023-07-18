<?php
$hotels = include 'hotels.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Hotel</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css' integrity='sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==' crossorigin='anonymous'>
</head>

<body>

  <ul>
    <?php foreach ($hotels as $hotel) : ?>
      <li>
        <ul>
          <?php foreach ($hotel as $key => $value) : ?>
            <li><strong><?= $key ?>: </strong><?= $value ?></li>
          <?php endforeach ?>
        </ul>
      </li>
      <hr>
    <?php endforeach ?>
  </ul>
</body>

</html>