<?php
$hotels = include 'hotels.php';
$checkmark = '<i class="fa-solid fa-check"></i>';

if (isset($_GET['reset'])) {
  unset($_GET['min_vote']);
  unset($_GET['has_parking']);
}

$min_vote = $_GET['min_vote'] ?? '';
$has_parking = isset($_GET['has_parking']);


if ($has_parking) {
  $hotels = array_filter($hotels, fn ($hotel) => $hotel['parking']);
}

if ($min_vote) {
  $hotels = array_filter($hotels, fn ($hotel) => $hotel['vote'] >= $min_vote);
}

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
    <header class="my-5 d-flex justify-content-between align-items-center  text-end">
      <h1>PHP HOTELS</h1>
      <form action="" method="get">
        <div class="mb-3">
          <label for="has_parking">Search only hotels with parking</label>
          <input type="checkbox" name="has_parking" id="has_parking" <?= isset($_GET['has_parking']) ? 'checked' : '' ?>>
        </div>
        <div class="mb-3">
          <label for="min_vote">Search only for vote of at least</label>
          <select name="min_vote" id="min_vote">
            <option value=""></option>
            <option <?= $min_vote === '1' ? 'selected' : '' ?>>1</option>
            <option <?= $min_vote === '2' ? 'selected' : '' ?>>2</option>
            <option <?= $min_vote === '3' ? 'selected' : '' ?>>3</option>
            <option <?= $min_vote === '4' ? 'selected' : '' ?>>4</option>
            <option <?= $min_vote === '5' ? 'selected' : '' ?>>5</option>
          </select>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary ">Search</button>
          <button type="submit" name="reset" class="btn btn-secondary"> Reset</button>
        </div>
      </form>
    </header>

    <main>
      <?php if (empty($hotels)) : ?>
        <div class="alert alert-primary" role="alert">
          No hotels found with these search criteria!
        </div>
      <?php else : ?>
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
      <?php endif; ?>
    </main>

  </div>
</body>

</html>