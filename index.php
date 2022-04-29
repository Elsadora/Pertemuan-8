<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Side Dinamis-2 (Page Operation)</title>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"/>
    <script src="https://kit.fontawesome.com/0d95b64c38.js" crossorigin="anonymous"></script>
  <style>
    body {
    background-color: lemonchiffon;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
        "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
    }

  aside {
    float: right;
    width: 20%;
    margin-right: 40px;
  }
  .container {
    float: left;
    width: 70%;
    margin-left: 40px;
  }

  .card {
    -webkit-box-shadow: -1px 9px 40px -12px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: -1px 9px 40px -12px rgba(0, 0, 0, 0.75);
    box-shadow: -1px 9px 40px -12px rgba(0, 0, 0, 0.75);
  }
  </style>
</head>
<body>
  <div>
    <h1 style="text-align: center">ELSADORA'S RECOMENDATION MOVIES</h1>
  </div>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end me-lg-5 mb-lg-3">
    <button class="btn btn-primary" type="button"><i class="fas fa-plus"></i> Create</button>
  </div>

  <aside>
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-sort-alpha-down "></i> Sorting
      </div>
      <div class="card body">
        <p class="card-text">Sort by Title</p>
        <select class="form-select" id="sorting" aria-label="Default select example">
          <option value="ASC">Sort by Movie Ascending</option>
          <option value="DESC">Sort by Movie Descending</option>
        </select>
      </div>
    </div>

    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-filter"></i> Filters
      </div>
      <div class="card-body">
        <p class="card-text"> Filter by Rating</p>
        <select class="form-select" id="filter" aria-label="Default select example">
          <option class="text-muted" selected>Movie rating</option>
          <?php
          require_once 'db.php';
          $query = mysqli_query($db, "SELECT DISTINCT rating FROM film");
          while ($row = mysqli_fetch_object($query)) :
          ?>
          <option value="<?= $row->rating; ?>"><?= $row->rating; ?></option>
        <?php endwhile; ?>
        </select>
      </div>
    </div>
        
    <div class="card">
      <div class="card-header">
        <i class="fas fa-search"></i> Search
      </div>
      <div class="card-body">
        <p class="card-text">Search Movie Title</p>
        <div class="input-group mb-3">
          <input type="text" class="form control" id="search" placeholder="Search Movie Title.." aria-describedby="button-addon2">
          <button class="btn btn-primary" type="button" id="button-addon2"></button>
        </div>
      </div>
    </div>
  </aside>
  <div class="container">
    <div class="row" id="content">
      <?php
      require_once 'db.php';
      $query = mysqli_query($db, "SELECT * FROM film");
      while ($row = mysqli_fetch_object($query)) :
      ?>
        <div class="col-sm-3 mb-3">
          <div class="card" style="width: 15rem">
            <img src="https://m.media-amazon.com/images/M/MV5BMTgzMTEyOTgyOF5BMl5BanBnXkFtZTcwOTY1ODkxNw@@._V1_.jpg" class="card-img-top" alt="" />
              <span class="position-absolute top 0 badge" style="baground-color: red"><?= $row->rating;?></span>
              <div class="card-body">
                <a href="detail.php?id=<?= $row->film_id; ?>">
                  <h5 class="card-title"><?= $row->title; ?> (<?= $row->release_year; ?>)</h5>
                </a>
                <div class="col-6">
                  <p class="card-text">Rating: <?= $row->rating; ?></p>
                </div>
                <button class="btn" style="float: right; font-size: small"><i class="bi bi-pencil-fill" style="color:blue;"></i>
                <i class="bi bi-trash3-fill" style="color:red"></i></button>
              </div>
          </div>
        </div>  
      <?php endwhile; ?>
    </div>
  </div>
  <script src="Bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#search').on('keyup', function() {
        $.ajax({
          type: 'POST',
          url: 'search.php',
          data: {
              search: $(this).val()
          },
          cache: false,
          success: function(data) {
            $('#content').html(data);
          }
        });
      });

      $('#filter').on('change', function() {
        $.ajax({
          type: 'POST',
          url: 'filter.php',
          data: {
              filter: $(this).val()
          },
          cache: false,
          success: function(data) {
            $('#content').html(data);
          }
        });
      });

      $('#sorting').on('change', function() {
        $.ajax({
          type: 'POST',
          url: 'sorting.php',
          data: {
            sorting: $(this).val()
          },
          cache: false,
          success: function(data) {
            $('#content').html(data);
          }
        });
      });
    });
  </script>

</body>
</html>
