<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <style>
      body{
        font-family: Arial, sans-serif;
        margin: 30px;
      }
      .one-line-form{
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
      }
      .one-line-form input[type="text"]{
        padding: 6px 10px;
      }
      .one-line-form input[type="submit"]{
        padding: 6px 15px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
      }
      table{
        border-collapse: collapse;
        width: 100%;
        margin-top: 10px;
      }
      th, td{
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
      }
      th{
        background-color: #f2f2f2;
      }
    </style>
    <script>
      function toggleStatus(id) {
        // Create a new XMLHttpRequest object
        var xhttp = new XMLHttpRequest();
        
        // Define the function to be executed when the request is complete
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            // Update the status cell with the new status returned from the server
            document.getElementById("status_" + id).innerHTML = this.responseText;
          }
        };
        // Send a GET request to the server to toggle the status of the user with the given ID
        xhttp.open("GET", "toggle_status.php?id=" + id, true);
        xhttp.send();
      }
    </script>
  </head>
<body>

<h2>Home Page</h2>

<form action="insert.php" method="get" class="one-line-form">
  <label for="name"> Name:</label><br>
  <input type="text" id="name" name="name" placeholder="أكتب اسمك " required><br>
  <label for="age">age:</label><br>
  <input type="text" id="age" name="age" placeholder="أكتب عمرك " required><br><br>
  <input type="submit" value="Submit">
</form> 

<?php include 'select.php'; ?>
</body>
</html>