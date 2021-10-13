<?php
  session_start(); // Inisialisasi session
  require_once('../lib/db_login.php');

  $email = $password = $nama = $alamat = $kota = $nohp ='';

  // Cek apakah user sudah submit form
  if (isset($_POST["submit"])) {
    $valid = TRUE; // Flag validasi
	$nama = test_input($_POST['nama']);
        if ($nama == '') {
			$error_nama = "Name is required";
			$valid = FALSE;
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
            $error_nama = "Only letters and white space allowed";
            $valid = FALSE;
        }
	
	$alamat = test_input($_POST['alamat']);
    if ($alamat == '') {
      $error_alamat = "Fill in your address";
      $valid = FALSE;
    }
	$kota = test_input($_POST['kota']);
    if ($kota == '') {
      $error_kota = "Fill in city";
      $valid = FALSE;
    }
	$nohp = test_input($_POST['nohp']);
    if ($nohp == '') {
      $error_nohp = "Fill in your phone number";
      $valid = FALSE;
    } elseif(!is_numeric($nohp)){
		$error_nohp = "Only numbers allowed";
		$valid = FALSE;
	}
	// Cek validasi email
    $email = test_input($_POST['email']);
    if ($email == '') {
      $error_email = "Email is required";
      $valid = FALSE;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error_email = "Invalid email format";
      $valid = FALSE;
    }

    // Cek validasi password
    $password = test_input($_POST['password']);
    if ($password == '') {
      $error_password = "Password is required";
      $valid = FALSE;
    }
	
	//validasi retype password
	$repassword= test_input($_POST['repassword']);
	if($repassword != $password){
		$error_repassword = "Passwords do not match";
		$valid = FALSE;
	}
    // Cek validasi
    if ($valid) {
      // Asign a query
	  $pass = md5($password);
      $query = "INSERT INTO penulis (nama,alamat,kota,no_telp,email,password) VALUES('$nama','$alamat','$kota','$nohp','$email','$pass')";
 
      // Execute the query
	  $result = $db->query($query);
      if (!$result) {
        die ("Could not query the database: <br>".$db->error);
      } else {
		  echo '<script>alert("Registration Done. Please Login")</script>';
      }

      // Close db connection
      $db->close();
    }
  }
?>

<?php include '../includes/header_penulis_register.php'; ?>

  <div class="content" style="margin-top: 10%;">
    <main>
      <div class="container-fluid">
        <!-- Login Form -->
        <div class="container-fluid mt-4 text-mattBlackDark" style="max-width: 400px;">
          <div class="card">
            <div class="card-header text-center bg-info" style="font-weight: bold; font-size: 20px; padding: 15px 0; color: white;">Penulis Register</div>
            <div class="card-body">
              <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<div class="form-group">
                  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" placeholder="Nama">
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_nama)) echo $error_nama; ?></div>
                </div>
				
				<div class="form-group">			  
                  <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>" placeholder="Alamat">
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_alamat)) echo $error_alamat; ?></div>
                </div>
				
				<div class="form-group">
                  <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $kota; ?>" placeholder="Kota">
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_kota)) echo $error_kota; ?></div>
                </div>
				
				<div class="form-group">
                  <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo $nohp; ?>" placeholder="Nomor Handphone">
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_nohp)) echo $error_nohp; ?></div>
                </div>
				
                <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Email">
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_email)) echo $error_email; ?></div>
                </div>

                <div class="form-group">
                  <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password">
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_password)) echo $error_password; ?></div>
                </div>
				
				<div class="form-group">
                  <input type="password" class="form-control" id="repassword" name="repassword" value="" placeholder="Re-Type Password">
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_repassword)) echo $error_repassword; ?></div>
                </div>

                <br>
                <button type="submit" class="btn btn-info btn-block" name="submit" value="submit" style="border-radius: 50px;">Sign up</button>
                <div class="error text-center mt-3" style="color: red; font-size: 0.75em;"><?php if (isset($error_login)) echo $error_login; ?></div>
				
				<br>
				<h5 align="center" style="color=black; font-size: 0.75em">Already have an account?</h5>
                <a href="../penulis/login.php" class="btn btn-info btn-block" style="border-radius: 25px;">Login Here</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
<script src="../src/js/script.js"></script>

<?php include '../includes/footer.php'; ?>