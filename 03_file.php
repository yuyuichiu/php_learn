<!DOCTYPE html>
<html lang="en">
<head>
  <title>File Upload in PHP</title>
</head>
<body>
  <form
    action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
    method='post'
    enctype='multipart/form-data'
  >
    <h1>File Upload</h1>
    <p>Try to upload an image (jpeg, png or webp)</p>
    <input type='file' name='uploadImage' required/>
    <input type='submit' name='submit' value='submit' />
  </form>
  <br><hr><br>
</body>
</html>

<?php 
  const MAX_FILE_SIZE = 5 * 1024 * 1024;
  $allowed_types = ['image/jpg', 'image/jpeg', 'image/png', 'image/webp'];

  if(isset($_POST['submit'])) {
    // File upload handling
    // In real cases, redirect user to error page when meet error
    if(!isset($_FILES['uploadImage'])) {
      echo "<h2>File is empty</h2>";
    } else {
      $status = $_FILES['uploadImage']['error'];
      $temp = $_FILES['uploadImage']['tmp_name'];
      $filename = $_FILES['uploadImage']['name'];
      $filetype = $_FILES['uploadImage']['type'];

      print_r($_FILES['uploadImage']);

      // Respond to error in $_FILES
      if($status !== 0) {
        echo "<h2>Warning: " . $status . "</h2>";
        exit();
      }
  
      // file size validation
      if(filesize($temp) > MAX_FILE_SIZE) {
        echo "<h2>File is too large</h2>";
        exit();
      }
  
      // file type validation
      if(!in_array($filetype, $allowed_types)) {
        echo "<h2>Invalid File type</h2>";
        exit();
      }

      // Setup file path to put uploaded file into permanent folder
      $upload_dir = __DIR__ . "/uploads/" . $filename;
      $success = move_uploaded_file($temp, $upload_dir);

      if(!$success) {
        echo "<h2>Failed to upload file...</h2>";
      } else {
        echo "<h2>Uploaded!</h2>";
        echo "<img src='uploads/" . $filename . "' width='300'/>";
      }
    }
  }
?>