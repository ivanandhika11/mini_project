<main>

<?php
	$id = $_GET['id'];
	$query = "SELECT * FROM komentar ko JOIN post p JOIN penulis pe ON ko.idpost = p.idpost AND ko.idpenulis = pe.idpenulis WHERE p.idpost=$id" ;
	$result = $db->query($query);
	if(!$result){
		die("could not query database: <br>".$db->error."<br>Query: ".$query);
	}
					
	while ($row = $result->fetch_object()){
				
		echo '<form method="post">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control">
				</div>
				<div class="form-group">
					<label>Isi Komentar</label>
					<textarea name="isi" class="form-control"></textarea>
				</div>
				<button class="btn btn-light" type="submit" name="btnkomen">
					Masukkan komentar
				</button>								
			</form >
				<hr>
				<div class="card">
					<b>'.$row->nama.'</b> <br />
					<p>'.$row->isi.'</p>
				</div>';
	}
					
	$result->free();
	$db->close();
?>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
<script src="../src/js/script.js"></script>

<?php include '../includes/footer.php'; ?>