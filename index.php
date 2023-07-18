<?php
$hotels = include 'hotels.php';
$checkmark = '<i class="fa-solid fa-check"></i>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Hotel</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css' integrity='sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==' crossorigin='anonymous'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css' integrity='sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw==' crossorigin='anonymous'>
</head>

<body>
  <div class="container">

    <main>
      <table class="table my-5">
        <thead>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Parking</th>
          <th scope="vol">Vote</th>
          <th scope="vol">Distance to Center</th>
        </thead>
        <tbody>
          <?php foreach ($hotels as $hotel) : ?>
            <tr>
              <?php foreach ($hotel as $key => $value) :
                // if key is parking, and parking is true, value is fontawesome for check
                if ($key === 'parking')
                  $value = $value ? $checkmark : '';
              ?>

                <td><?= $value ?></td>
              <?php endforeach ?>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </main>

  </div>
</body>

</html>