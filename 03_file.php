<?php 
  const MAX_FILE_SIZE = 5 * 1024 * 1024;

  if(isset($_POST['submit'])) {
    if(filesize($_FILES['uploadImage']))
    
    if(!empty($_FILES['uploadImage']['name'])) {
      echo "<h2>File has been uploaded</h2>";
      print_r($_FILES);
    } else {
      echo "<h2>File is empty</h2>";
    }
  }
?>

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
    <input type='file' name='uploadImage' accept='image/png, image/jpeg'/>
    <input type='submit' name='submit' value='submit' />
  </form>
</body>
</html>