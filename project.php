<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Bridgify</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
    }

    @media (max-width: 768px) {
  .container {
    flex-direction: column;
  }

  aside,
  .right-panel,
  main {
    width: 100%;
  }

  .left-side {
    flex-direction: column;
    align-items: flex-start;
  }

  .auth-buttons {
    position: static;
    margin-top: 10px;
  }
}


    body {
      display: flex;
      flex-direction: column;
      height: 100vh;
      background-color: #f7f8fc;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #4b6cb7;
      color: white;
      padding: 15px 30px;
      position: relative;
    }

    header h1 {
      font-size: 1.8rem;
    }

    .left-side {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .search-box {
      padding: 6px 10px;
      border-radius: 5px;
      border: none;
      right: 1000px
    }

    .auth-buttons {
      display: flex;
      gap: 10px;
      position: absolute;
      top: 20px;
      right: 100px;
    }

    .auth-buttons button {
      padding: 6px 10px;
      border-radius: 5px;
      border: none;
      background-color: #fff;
      cursor: pointer;
      font-weight: bold;
    }

    .container {
      display: flex;
      flex: 1;
    }

    aside {
      width: 15%;
      background-color: #eef2f7;
      padding: 20px;
      border-right: 1px solid #ddd;
    }

    aside h3 {
      margin-bottom: 10px;
    }

    .category-list {
      list-style: none;
      padding: 0;
    }

    .category-list li {
      background-color: #f0f0f0;
      margin-bottom: 8px;
      padding: 10px 15px;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }

    .category-list li:hover {
      background-color: #e0e0e0;
    }

    .category-list li a {
      text-decoration: none;
      color: inherit;
      display: block;
    }

    .category-list li.active {
      background-color: #ffd966;
      color: #000;
      box-shadow: 0 0 10px rgba(255, 217, 102, 0.7);
    }

    main {
      width: 55%;
      padding: 20px;
      overflow-y: auto;
    }

    .post {
      background: white;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .post img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-radius: 8px;
      margin-top: 10px;
    }

    .right-panel {
      width: 30%;
      padding: 20px;
      background-color: #f4f4f4;
      border-left: 1px solid #ddd;
    }

    .top-helpers, .quick-ask {
      background: white;
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .top-helpers ul {
      list-style: none;
      padding-left: 0;
    }

    .top-helpers li {
      margin-bottom: 5px;
    }

    .quick-ask textarea {
      width: 100%;
      height: 60px;
      margin-top: 10px;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      resize: none;
    }

    .quick-ask select,
    .quick-ask button {
      margin-top: 10px;
      padding: 8px;
      width: 100%;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .dark-mode {
  background-color: #1e1e2f;
  color: #fff;
}

.dark-mode header {
  background-color: #2b2b4f;
}

.dark-mode .post,
.dark-mode .top-helpers,
.dark-mode .quick-ask,
.dark-mode aside {
  background-color: #2c2c3e;
  color: #fff;
}

.dark-mode .post img {
  filter: brightness(0.9);

}

.dark-mode .category-list li a {
  color: black;
}
.search-container {
  width: 100%;
  display: flex;
  justify-content: center;
}

.search-box {
  width: 150%;
  max-width: 2000px;
  padding: 12px 20px;
  border-radius: 8px;
  border: none;
  font-size: 1rem;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.search-box:focus {
  outline: none;
  box-shadow: 0 0 10px #ffd966;
}
  </style>
</head>
<body>
  <header>
    <h1>Bridgify</h1>
    <div class="left-side">
    <div class="search-container">
  <input type="text" class="search-box" placeholder="Search topic or questions...">
</div>
      <div class="auth-buttons">
        <button onclick="toggleForm('loginForm')" onmouseover="hoverEffect(this)" onmouseout="removeEffect(this)">Log In</button>
        <button onclick="toggleForm('signupForm')" onmouseover="hoverEffect(this)" onmouseout="removeEffect(this)">Sign Up</button>
      </div>
    </div>
    <button onclick="toggleTheme()" style="margin-left: auto; background: none; border: none; cursor: pointer;">
  <img src="https://cdn-icons-png.flaticon.com/128/5007/5007200.png" alt="Toggle Theme" style="width: 30px; height: 30px;">
</button>


  </header>

  <!-- Auth Forms (Hidden initially) -->
  <div id="loginForm" style="display: none;">
    <form method="post" action="login.php">
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <button type="submit">Login</button>
    </form>
  </div>
  
  <div id="signupForm" style="display: none;">
    <form method="post" action="signup.php">
      <input type="text" name="username" placeholder="Choose Username">
      <input type="email" name="email" placeholder="Email">
      <input type="password" name="password" placeholder="Choose Password">
      <button type="submit">Sign Up</button>
    </form>
  </div>

  <div class="container">
    <!-- Sidebar -->
    <aside>
      <h3>Subjects</h3>
      <ul class="category-list">
        <li><a href="index.php?category=1">➗ Math</a></li>
        <li><a href="index.php?category=2">🔬 Science</a></li>
        <li><a href="index.php?category=3">📚 English</a></li>
        <li><a href="index.php?category=4">📖 History</a></li>
        <li><a href="index.php?category=5">💻 Programming</a></li>
        <li><a href="index.php?category=6">📦 Other Subjects</a></li>
      </ul>
    </aside>

    <!-- Main Content -->
    <main>
      <?php
      $conn = new mysqli("localhost", "root", "", "homework");
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT posts.*, users.username, categories.name AS category_name 
              FROM posts 
              JOIN users ON posts.user_id = users.id 
              JOIN categories ON posts.category_id = categories.id 
              ORDER BY posts.created_at DESC";

      $result = $conn->query($sql);
      if (!$result) {
          die("Query failed: " . $conn->error);
      }

      while ($row = $result->fetch_assoc()) {
        $username = htmlspecialchars($row['username'] ?? 'Unknown');
        $category = htmlspecialchars($row['category_name'] ?? 'Uncategorized');
        $content = htmlspecialchars($row['content'] ?? '');

        echo "
          <div class='post' onmouseover='hoverEffect(this)' onmouseout='removeEffect(this)'>
            <strong>👤 $username | 📂 $category</strong>
            <p>$content</p>";
        
        if (!empty($row['image_path'])) {
            $imagePath = htmlspecialchars($row['image_path']);
            echo "<img src='uploads/$imagePath'>";
        }

        echo "</div>";
      }
      ?>
    </main>

    <!-- Right Panel -->
    <div class="right-panel">
      <div class="top-helpers">
        <h3>Top Helpers This Week</h3>
        <ul>
          <li>🌟 Olivia</li>
          <li>🌟 James</li>
          <li>🌟 Miza</li>
          <li>🌟 Ryan</li>
          <li>🌟 Lily</li>
        </ul>
      </div>

      <div class="quick-ask">
        <h3>Quick Ask Panel</h3>
        <label>Select subject:</label>
        <select>
          <option>Math</option>
          <option>Science</option>
          <option>English</option>
          <option>History</option>
          <option>Programming</option>
        </select>

        <label>What's your question?</label>
        <textarea placeholder="Type your question here..."></textarea>
        <button onclick="askQuestion()">Bridge it!</button>
      </div>
    </div>
  </div>

  <script>
    function askQuestion() {
      alert("✨ Your question has been sent to the bridge! Someone will help you soon 💬");
    }

    function hoverEffect(element) {
      element.style.backgroundColor = '#ffe680';
      element.style.boxShadow = '0 0 10px rgba(255, 230, 128, 0.8)';
    }

    function removeEffect(element) {
      element.style.backgroundColor = '';
      element.style.boxShadow = '';
    }

    function toggleTheme() {
  document.body.classList.toggle('dark-mode');
}

  </script>
</body>
</html>