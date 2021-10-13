<?php include '../includes/header_penulis_postingan.php'; ?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <br><h2>Postingan</h2>

				<?php
					
					session_start(); //inisialisasi session
					require_once('../lib/db_login.php');
					
					$query = "SELECT * FROM post ORDER BY tgl_insert DESC ";
					$result = $db->query($query);
					if(!$result){
						die("could not query database: <br>".$db->error."<br>Query: ".$query);
					}
					
					while ($row = $result->fetch_object()){ 
						$id = $row->idpost;
						$judul = $row->judul;
						$isi = $row->isi_post;
						if(strlen($judul)>50) {
							$judul = substr($judul,0,50)."....";
						}
						if(strlen($isi)>100){
							$isi = substr($isi,0,100)."...";
						}
						$gambar = $row->file_gambar;
						$tgl_insert = $row->tgl_insert;
						
						echo '<div class="card-body">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">	
									<div class="bg-mattBlackLight my-2 p-3">
										<img class="img-fluid" src="../img/'.$gambar.'" width="480px";>
										<h5> '.$judul.' </h5>
										<p class="card-text"> '.$isi.' </p>
										<a href="artikel.php?id='.$row->idpost.'" class="btn btn-secondary" role="button">READ MORE</a>
									</div>
								</div>		
							</div>'	;	
						
					}
					$result->free();
					$db->close();
				?>
      </div>
    </main>
  </div>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
<script src="../src/js/script.js"></script>

<?php include '../includes/footer.php'; ?>