<?php
session_start();
if (!isset($_SESSION['hedef_sayi'])) {
    $_SESSION['hedef_sayi'] = rand(1, 100);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tahmin = $_POST['tahmin'];
    if ($tahmin == $_SESSION['hedef_sayi']) {
        echo '<div class="alert alert-success">Tebrikler! Doğru tahmin ettiniz. Yeni bir oyun başladı Yeni Bir sayı tuttum...</div>';
        unset($_SESSION['hedef_sayi']);
        $_SESSION['hedef_sayi'] = rand(1, 100);
      } elseif ($tahmin < $_SESSION['hedef_sayi']) {
           echo '<div class="alert alert-danger">Daha yüksek bir sayı tahmin edin.</div>';
       } elseif($tahmin > $_SESSION["hedef_sayi"]) {
           echo '<div class="alert alert-danger">Daha düşük bir sayı tahmin edin.</div>';
       }else {
          echo '<div class="alert alert-info"> Bir sayı tahmin edin.</div>';
       }
}else {
   echo '<div class="alert alert-success"> Bir sayı tahmin edin.</div>';
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sayı Tahmin Oyunu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Sayı Tahmin Oyunu</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label>Tahmininiz:</label>
                <input type="number" class="form-control" name="tahmin" required>
            </div>
            <button type="submit" class="btn btn-primary">Tahmin Et</button>
        </form>
    </div>
</body>
</html>
<script type="text/javascript">
  var sayi= <?php echo $_SESSION['hedef_sayi']; ?>;
  console.log(sayi);
</script>
