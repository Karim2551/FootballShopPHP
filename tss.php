 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<?php
  require_once "pdo.php";
  $stmt = $pdo->query("SELECT * FROM shop  
  WHERE price = 11000 ");
?>
  <table  class="table table-hover"><tr><th>name</th><th>photo</th><th>price</th><th>description</th><th>Send to</th></tr>
  <?php
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    echo "<tr><td>";
    echo($row['name']);
    echo "</td>";

   
    echo "<td>";
    ?>
    <img src="<?= $row['img'] ?>"  width="165">
    <?php
    echo "</td>";
    
    echo "<td>";
echo($row['price']);
    echo "</td>";
    

     echo "<td>";
echo($row['comment']);
    echo "</td>";

  echo "<td>";
echo'<a href="korzina.php"><button type="sumbit"  >Send to</button></a>';
    echo "</td>";
    
    echo "</tr>";
  }
  ?>
  
  </table>