<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Side Dinamis-2 (Page Operation)</title>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"/>
    <script src="https://kit.fontawesome.com/0d95b64c38.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0d95b64c38.js" crossorigin="anonymous"></script>

</head>

<body style="background-color: lemonchiffon">
    <!-- Title -->
    <div class="my-3">
        <h1 class="text-center">DETAIL MOVIES</h1>
    </div>
    <div class="container">
        <!-- Content -->
        <div class="row">
            <?php
            require_once 'db.php';
            $film_id = $_GET['id'];
            $query = mysqli_query($db, "SELECT * FROM film INNER JOIN language ON film.language_id = language.language_id WHERE film_id=$film_id");
            $row = mysqli_fetch_object($query);
            ?>
            <!-- Image -->
            <div class="col-3">
                <img src="https://m.media-amazon.com/images/M/MV5BMTgzMTEyOTgyOF5BMl5BanBnXkFtZTcwOTY1ODkxNw@@._V1_.jpg" class="card-img-top" alt="" />
            </div>
            <!-- Overview -->
            <div class="col-9 text-black mt-4">
                <h2><?= $row->title; ?> (<?= $row->release_year; ?>)</h2>
                <div class="d-flex justify-content-start">
                    <span class="badge my-auto me-2 bg-light"><?= $row->rating; ?></span>
                    <h6 class="my-auto me-2"><?= $row->special_features; ?></h6>
                    <h2 class="mb-1 me-2">&#183;</h2>
                    <h6 class="my-auto me-2"><?= $row->length; ?> min</h6>
                </div>
                <h3 class="mt-5">Overview</h3>
                <p><?= $row->description; ?></p>
                <div class="row">
                    <div class="col mt-5">
                        <h5>Language</h5>
                        <p><?= $row->name; ?></p>
                    </div>
                    <div class="col mt-5">
                        <h5>Rental Duration</h5>
                        <p><?= $row->rental_duration; ?> days</p>
                    </div>
                    <div class="col mt-5">
                        <h5>Rental Rate</h5>
                        <p>$ <?= $row->rental_rate; ?></p>
                    </div>
                    <div class="col mt-5">
                        <h5>Replacement Cost</h5>
                        <p>$ <?= $row->replacement_cost; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="d-grid gap-2 mt-4">
                    <a href="index.php" class="btn btn-primary mb-6" type="button"><i class="fas fa-arrow-circle-left me-1"></i> Back</a> 
                </div>
            </div>
        </div>
    </div>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</body>

</html>