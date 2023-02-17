


<?php
require "db_conn.php";
 

$query = "SELECT * FROM `chat`";
 $run = mysqli_query($conn,$query);
 echo $_SESSION["reciver_idd"]=$row['id'];
  
 while($row = mysqli_fetch_array($run)) :
 if( $_SESSION['sender_id']!=$row['sender_userid']){
 ?>
 
 <div id="message" class="message">
 <span style="color:black;float:left;">
  <?php echo $row['message']; ?>
 </span> <br/>
 <div>
  <span style="color:black;float:right;
   font-size:10px;clear:both;">
  
   <?php echo $row['timestamp']; ?>
 </span>
 </div>
</div>
<br/><br/>
 <?php
 }
else
{

?>
 
 <div id="message1" class="message1" >
 <span style="color:black;float:right;">
 <?php echo $row['message']; ?></span> <br/>
 <div>
  <span style="color:black;float:left;
          font-size:10px;clear:both;">
  
        <?php echo $row['timestamp']; ?>
 </span>
</div>
</div>
<br/><br/>
<?php
}

endwhile; ?>


