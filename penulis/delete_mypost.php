<?php
  require_once('../lib/db_login.php');
  $id = $_GET['id'] ?? NULL;

  // Delete data from database
  if (!empty($id)) {
	$judul = $row->judul;
    $query = "DELETE FROM post WHERE judul = '$id'";
    $result = $db->query($query);
    if (!$result) {
      die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
    } else {
      $db->close();
      header('Location: data_mypost.php');
    }
  }
?>