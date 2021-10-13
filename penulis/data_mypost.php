<?php include '../includes/header_penulis_mypost.php'; ?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="container-fluid mt-4 text-mattBlackDark" style="max-width: 6800px;">
          <div class="card">
            <div class="card-header text-center" style="font-weight: bold; font-size: 20px; padding: 15px 0; color: white; background-color: #9c65f5;">My Post</div>
            <div class="card-body">
              <a class="btn btn-info" href="add_mypost.php">+ Tambah Post</a> <br><br>
              <table class="table table-striped text-mattBlackDark">
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Kategori</th>
                  <th>Isi Post</th>
                  <th>File Gambar</th>
                  <th>Action</th>
                </tr>

                <?php
                  require_once('../lib/db_login.php');

                  if ($_SESSION['username']) {
                    $user = $_SESSION['username'];
                    // Execute the query
                    $query = "SELECT * FROM post WHERE idpenulis = (SELECT idpenulis FROM penulis WHERE email = '$user')";
                    $result = $db->query($query);
                    if (!$result) {
                      die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
                    }else{

                    // Fetch and display the results
                      $i = 1;
                      while ($row = $result->fetch_object()) {
                        echo '<tr>';
                        echo '<td>'.$i.'</td>';
                        echo '<td>'.$row->judul.'</td>';
                        echo '<td>'.$row->idkategori.'</td>';
                        echo '<td>'.$row->isi_post.'</td>';
                        echo '<td>'.$row->file_gambar.'</td>';
                        echo '<td>
                              <a class="btn btn-warning btn-sm" href="edit_mypost.php?id='.$row->idpost.'">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <a class="btn btn-danger btn-sm" href="delete_mypost.php?id='.$row->judul.'" onClick="hapus()">Delete</a>
                              </td>';
                        echo '</tr>';

                        $i++;
                        }
                    echo '</table>';
                    echo '<br>';
                    echo 'Total Rows = '.$result->num_rows;
                    }
                  }

                    $result->free();
                    $db->close();
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<script>
  function hapus() {
    alert("Post ini akan dihapus!");
  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
<script src="../src/js/script.js"></script>

<?php include '../includes/footer.php'; ?>