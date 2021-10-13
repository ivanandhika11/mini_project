<?php
  require_once('../lib/db_login.php');
  $id = $_GET['id']; // Mendapatkan idpost yang dilewatkan ke url
  // Mengecek apakah user belum menekan tombol submit
  if (!isset($_POST["submit"])) {
    $query = "SELECT * FROM post WHERE idpost = '$id'";
	
    // Execute the query
    $result = $db->query($query);
    if (!$result) {
      die ("Could not query the database: <br>".$db->error);
    } else {
      while ($row = $result->fetch_object()) {
        $idkategori= $row->idkategori;
        $judul = $row->judul;
        $isi_post = $row->isi_post;
        $file_gambar = $row->file_gambar;
      }
    }
  } else {
    $valid = TRUE; // Flag validasi
     $idkategori = test_input($_POST['idkategori']);
    if($idkategori == ''){
        $error_idkategori = "Category is required";
        $valid = FALSE;
    }

    $judul = test_input($_POST['judul']);
    if (empty($judul)) {
      $error_judul = 'Title is required';
      $valid = FALSE;
    }

    $isi_post = test_input($_POST['isi_post']);
    if (empty($isi_post)) {
      $error_isi_post = 'Post is required';
      $valid = FALSE;
    }
	
	$file_gambar = test_input($_POST['file_gambar']);
	
    // Update data into database
    if ($valid) {
      // Asign a query
      $query = "UPDATE post SET judul='$judul', isi_post='$isi_post', idkategori='$idkategori', file_gambar='$file_gambar' WHERE idpost='$id'";

      // Execute the query
      $result = $db->query($query);
      if (!$result) {
        die ("Could not query the database: <br>".$db->error.'<br>Query:'.$query);
      } else {
        $db->close();
        header('Location: data_mypost.php');
      }
    }
  }
?>

<?php include '../includes/header_penulis_mypost.php'; ?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="container-fluid mt-4 text-mattBlackDark" style="max-width: 680px;">
          <div class="card">
            <div class="card-header text-center bg-warning" style="font-weight: bold; font-size: 20px; padding: 15px 0; color: white;">Edit Post</div>
            <div class="card-body">
              <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id; ?>">
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="idkategori" id="idkategori" class="form-control">
                        <option value="" <?php if (!isset($idkategori)) echo 'selected="true"';?>>--Pilih Kategori--</option>
                        <option value="1" <?php if (isset($idkategori) && $idkategori=="1") echo 'selected="true"' ;?>>Fiksi</option>
                        <option value="2" <?php if (isset($idkategori) && $idkategori=="2") echo 'selected="true"' ;?>>Karya Tulis Ilmiah</option>
                        <option value="3" <?php if (isset($idkategori) && $idkategori=="3") echo 'selected="true"' ;?>>Sastra</option>
                        <option value="4" <?php if (isset($idkategori) && $idkategori=="4") echo 'selected="true"' ;?>>Otobiografi</option>
                    </select>
                    <div class="error"><?php if (isset($error_idkategori)) echo $error_idkategori;?></div>
                </div>
                <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul; ?>" autofocus>
                  <div class="error" style="color: red; font-size: 0.75em"><?php if (isset($error_judul)) echo $error_judul; ?></div>
                </div>

                <div class="form-group">
                    <label for="isi_post">Isi Post</label>
                    <textarea class="form-control" name="isi_post" id="isi_post" rows="5"><?php if (isset($isi_post)) echo $isi_post;?></textarea>
                    <div class="error"><?php if(isset($error_isi_post)) echo $error_isi_post;?></div>
                </div>

                <div class="form-group">
                    <label for="file_gambar">Select image to upload</label>
                    <input type="file" name="file_gambar" id="file_gambar"><?php if (isset($file_gambar)) echo $file_gambar;?>
                </div>

                <br>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Save</button>
                  <a href="data_mypost.php" class="btn btn-secondary">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<?php
  $db->close();
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
<script src="../src/js/script.js"></script>

<?php include '../includes/footer.php'; ?>