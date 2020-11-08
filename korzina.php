<?php   
 
 require_once 'pdo.php';  
 $connect = mysqli_connect("localhost", "Karim2551", "@Kar320id", "as8");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_POST["name"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'name'               =>     $_POST["name"],  
                     'comment'               =>     $_POST["comment"],
                     'img' => $_POST["img"] ,
                     'price'          =>     $_POST["price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>window.location="korzina.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'name'               =>     $_POST["name"],  
                'comment'               =>     $_POST["comment"],  
                'img' => $_POST["img"] ,
                'price'          =>     $_POST["price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_POST["action"]))  
 {  
      if($_POST["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["name"] == $_POST["name"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="korzina.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>CART TumarSHOP</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:100%;">  
            <?php  
                $query = "SELECT * FROM shop ";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="korzina.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div align="center">  
                               <img width="115" src="<?php echo $row["img"]; ?>" class="img-responsive" /><br />  
                               <h5 class="text-info"><?php echo $row["name"]; ?></h5>  
                               <h5 class="text-danger"> <?php echo $row["price"]; ?> TG</h5>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="comment" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="SEND TO" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br />  
                
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">TITLE OF GOOD</th>  
                               <th width="10%">THE NUMBER</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">FINAL PRICE</th>  
                                
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["comment"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td> <?php echo $values["price"]; ?> TG</td>  
                               <td> <?php echo number_format($values["item_quantity"] * $values["price"], 2); ?> TG</td>  
                                
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right"> <?php echo number_format($total, 2); ?> TENGE</td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  
    