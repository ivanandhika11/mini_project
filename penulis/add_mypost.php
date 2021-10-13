<?php
  require_once('../lib/db_login.php');
  session_start();
  if ($_SESSION['username']) {
  $user=$_SESSION['username'];

  
  $query1 = " SELECT * FROM penulis WHERE email='".$user."' ";
  $result1 = $db->query($query1);
  $row1 = $result1->fetch_object();
  $id = $row1->idpenulis;
  $valid = TRUE;

  $judul = '';
  }

  // Mengecek apakah user belum menekan tombol submit
  if (isset($_POST["submit"])) {
    $ekstensi_diperbolehkan = array('png','jpg', 'jpeg');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 1044070){      
         if(isset($nama) and !empty($nama)){
            $location = '../img/';      
            if(move_uploaded_file($file_tmp, $location.$nama)){
            $error_gambar = 'File uploaded successfully';
            }
          }else{
            $error_gambar = 'You should select a file to upload !!';
            $valid = FALSE;
          }
      }else{
        $error_gambar = 'UKURAN FILE TERLALU BESAR';
        $valid = FALSE;
      }
    }else{
      $error_gambar = 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
      $valid = FALSE;
    }

    $kategori = test_input($_POST['kategori']);
    if($kategori == ''){
        $error_kategori = "Category is required";
        $valid = FALSE;
    }

    $judul = test_input($_POST['judul']);
    if (empty($judul)) {
      $error_judul = 'Title is required';
      $valid = FALSE;
    }

    $isi_post = test_input($_POST['isi_post']);
    if (empty($isi_post)) {
      $error_isi_post = 'Fill in your content';
      $valid = FALSE;
    }

    // Add data to database
    if ($valid) {
      $judul = $db->real_escape_string($judul);
      $isi_post = $db->real_escape_string($isi_post);
      //assign a query
      $query = "INSERT INTO post(judul, idkategori, isi_post, file_gambar, tgl_insert, tgl_update, idpenulis) VALUES ('".$judul."', '".$kategori."', '".$isi_post."', '".$nama."', '".date("Y-m-d")."', '".date("Y-m-d")."', '".$id."') ";
      $result = $db->query($query);
      if (!$result) {
        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
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
            <div class="card-header text-center bg-info" style="font-weight: bold; font-size: 20px; padding: 15px 0; color: white;">Tambah Post</div>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="" selected>--Pilih Kategori--</option>
                        <?php
                          $query2 = " SELECT * FROM kategori ";
                          $result2 = $db->query($query2);
                          while($row2 = $result2->fetch_object()){
                            echo "<option value='".$row2->idkategori."'>".$row2->nama."</option>";
                          }
                        ?>
                    </select>
                    <div class="error"><?php if (isset($error_kategori)) echo $error_kategori;?></div>
                </div>

                <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" class="form-control" id="judul" name="judul" value="<?php if(isset($judul)) echo $judul; ?>" autofocus>
                  <div class="error"><?php if(isset($error_judul)) echo $error_judul; ?></div>
                </div>

                <div class="form-group">
                    <label for="isi_post">Isi Post</label>
                    <textarea class="form-control" name="isi_post" id="isi_post" rows="5"><?php if(isset($isi_post)) echo $isi_post;?></textarea>
                    <div class="error"><?php if(isset($error_isi_post)) echo $error_isi_post;?></div>
                </div>

                <div class="form-group">
                    <label for="file_gambar">Select image to upload</label>
                    <input type="file" name="file"><?php if(isset($error_gambar)) echo $error_gambar;?>
                </div>

                <br>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Add</button>
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