<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>News Website</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    /* Reset & Basic */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background: #f4f4f4;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    /* Add News Button */
    .add-news-button {
      text-align: right;
      margin-bottom: 20px;
    }

    .add-news-button a button {
      background-color: #28a745;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }

    .add-news-button a button:hover {
      background-color: #218838;
    }

    /* Category Headings */
    h2 {
      margin: 30px 0 10px;
      color: #444;
      border-left: 5px solid #007bff;
      padding-left: 10px;
    }

    /* News Card Layout */
    .news-section {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .news-card {
      background: white;
      width: calc(33.33% - 20px);
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      transition: 0.3s;
    }

    .news-card:hover {
      transform: translateY(-5px);
    }

    .news-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .news-content {
      padding: 15px;
    }

    .news-content h3 {
      font-size: 18px;
      margin-bottom: 10px;
      color: #007bff;
    }

    .news-content h3 a {
      text-decoration: none;
    }

    .news-content p {
      font-size: 14px;
      color: #555;
      margin-bottom: 10px;
    }

    .news-content small {
      color: #888;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .news-card {
        width: 100%;
      }
    }

    @media (min-width: 769px) and (max-width: 1024px) {
      .news-card {
        width: 48%;
      }
    }
  </style>
</head>
<body>

  <!-- ✅ Add News Button -->
  <div class="add-news-button">
    <a href="new.php">
      <button>➕ Add News</button>
    </a>
  </div>

  <h1>Latest News</h1>

  <!-- ✅ Display News by Categories -->
  <?php
  $categories = ['World', 'Sports', 'Technology', 'Entertainment'];
  foreach ($categories as $category) {
    echo "<h2>$category</h2>";
    $result = $conn->query("SELECT * FROM news WHERE category='$category' ORDER BY id DESC LIMIT 3");
    echo "<div class='news-section'>";
    while ($row = $result->fetch_assoc()) {
      echo "<div class='news-card'>
              <img src='uploads/{$row['image']}' alt='News Image'>
              <div class='news-content'>
                <h3><a href='article.php?id={$row['id']}'>{$row['title']}</a></h3>
                <p>" . substr(strip_tags($row['content']), 0, 100) . "...</p>
                <small>By {$row['author']}</small>
              </div>
            </div>";
    }
    echo "</div>";
  }
  ?>

</body>
</html>
