<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add News</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>Add a News Article</h1>
  <form action="new_submit.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="News Title" required><br><br>
    <textarea name="content" placeholder="Full News Content" rows="8" required></textarea><br><br>
    <label>Category:</label>
    <select name="category" required>
      <option value="">Select</option>
      <option value="World">World</option>
      <option value="Sports">Sports</option>
      <option value="Technology">Technology</option>
      <option value="Entertainment">Entertainment</option>
    </select><br><br>
    <input type="text" name="author" placeholder="Author Name" required><br><br>
    <input type="file" name="image" required><br><br>
    <button type="submit">Post News</button>
  </form>
</body>
</html>
