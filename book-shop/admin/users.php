<?php include('header.php');
include "../db/config.php";  
?>


<div class="container" style="max-width: 800px; padding-top: 50px;" >
<div class="table-responsive">
<table class="table  caption-top">
  <caption>List of users</caption>
  <thead class="bg-dark text-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Email</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
     <?php 

     $sql = "SELECT * FROM user";
     $res = mysqli_query($conn, $sql);

     if($res == TRUE)
     {
         $count = mysqli_num_rows($res);
     
         if($count > 0)
         {
             while($rows = mysqli_fetch_assoc($res) )
             {
                 $id = $rows['id'];
                 $full_name = $rows['name'];
                 $username = $rows['email'];
                 $status = $rows['status'];


                 ?>
                     <tr>
                         <td><?php echo $id; ?></td>
                         <td><?php echo $full_name; ?></td>
                         <td><?php echo $username; ?></td>
                         <td><?php echo $status; ?></td>
                         <?php 

                         if($status === 'blocked'){
                          ?>
                          <td><a href="blockuser.php?id=<?php echo $id; ?>&type='active'">Unblock</a></td>
                          <?php
                         }
                         else{
                           ?>
                          <td><a href="blockuser.php?id=<?php echo $id; ?>&type='blocked'">Block</a></td>
                          <?php
                         }
                         ?>
                         
                    <tr>
                <?php

             }
            }
        }
        ?>
   
  </tbody>
</table>
    </div>
</div>

<?php include('footer.php')  ?>
