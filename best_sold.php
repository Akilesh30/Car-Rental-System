

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
  <?php include("includes/header.php");?>
    <div class="container-fluid main-container">
    <?php include("includes/side_bar.php");?>
    
    <h1>Best Sold products</h1></div><br>


<?php
        
            $pdo = new PDO("mysql:host=localhost;dbname=carrental", $username="root", $password="");
            // execute the stored procedure
            $sql = 'CALL best_sold()';
            // call the stored procedure
            $q = $pdo->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
        
        ?>
        
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
            </tr>
            <?php while ($r = $q->fetch()): ?>
                <tr>
                    <td><?php echo $r['VehicleId'] ?></td>
                  
                </tr>
         
            <?php endwhile; ?>
            
</table>
</div>
</div>
</div>
</div>
</body>
</html>
