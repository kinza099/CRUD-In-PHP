<?php
include 'layout.php';
include 'connection.php';
?>

<div style="margin-bottom: 30px;">
  <h1 class="text-center mt-5">RECORDS</h1>
</div>

<div class="container">
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Phone</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        $count = 1;

        if ($result->num_rows > 0) {
           
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
               
                <th scope="row"><?php echo $count; ?></th>  
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td>
                  <div class="row">
                    <div class="col">
                      <a href="delete.php?id=<?php echo $row['id']; ?>"><i class="fa-sharp fa-solid fa-trash" style="color: red;"></i></a>
                    </div>
                    <div class="col">
                      <a href="edit.php?id=<?php echo $row['id']; ?>"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                    </div>
                  </div>
                </td>
              </tr>  
            <?php 
             
                $count++;
            }
        }        
        $conn->close(); 
        ?>
    </tbody>
  </table>
</div>
