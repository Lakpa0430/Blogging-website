<?php
  require "dbcon.php";

  $select_command="SELECT * FROM postingdetails";
  $select_query=mysqli_query($connection, $select_command);
  
  $check_rows_returned=mysqli_num_rows($select_query);
  
  if ($check_rows_returned>0) {
   while ($lakpa=mysqli_fetch_assoc($select_query)) {
    ?>
    <p><?php echo $lakpa['Post']?></p>
    <?php
   }
}
?>