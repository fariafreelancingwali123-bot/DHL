<?php include('db.php'); ?>
<?php $cat = $_GET['name']; ?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $cat; ?> News</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1><?php echo $cat; ?> News</h1>
<section class="category">
  <?php
  $sql = "SELECT * FROM news WHERE category='$cat'";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    echo "
    <div class='card'>
      <img src='uploads/{$row['image']}' alt='{$row['title']}'>
      <h3><a href='article.php?id={$row['id']}'>{$row['title']}</a></h3>
    </div>";
  }
  ?>
</section>
</body>
</html>
