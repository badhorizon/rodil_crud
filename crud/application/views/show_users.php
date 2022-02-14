
<h3>Name: <?php echo $users['first_name'].' '.$users['last_name'] ?></h3>
<h3>Username: <?php echo $users['username']?></h3>
<h3>E mail: <?php echo $users['email']?></h3>

<br><br><a href="<?php echo base_url().'users/updateUser'?>">Update</a> <br>
<br><a href="<?php echo base_url().'users/delete'?>">Delete</a> <br>
<br><a href="<?php echo base_url().'users/logout'?>">Log Out</a> <br>
