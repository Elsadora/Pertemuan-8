<?php
    if (isset($_POST['search'])):
        require_once 'db.php';
        $search = $_POST['search'];

        $query = mysqli_query($db, "SELECT * FROM film WHERE title LIKE '%" . $search . "%'");
        while ($row = mysqli_fetch_object($query)):
?>
        <div class="col-sm-3 mb-3">
          <div class="card" style="width: 15rem">
            <img src="https://m.media-amazon.com/images/M/MV5BMTgzMTEyOTgyOF5BMl5BanBnXkFtZTcwOTY1ODkxNw@@._V1_.jpg" class="card-img-top" alt="" />
              <span class="position-absolute top 0 badge" style="baground-color: red"><?= $row->rating;?></span>
              <div class="card-body">
                <a href="">
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
<?php
        endwhile;
    endif;
?>
