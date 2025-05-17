<?php include('db.php'); ?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM news WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $row['title']; ?></title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<article>
  <h1><?php echo $row['title']; ?></h1>
  <p><strong>By:</strong> <?php echo $row['author']; ?> | <?php echo $row['created_at']; ?></p>
  <img src="uploads/<?php echo $row['image']; ?>" alt="">
  <p><?php echo nl2br($row['content']); ?></p>
</article>
</body>
</html>
