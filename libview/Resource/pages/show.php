<?php
include "preview/show.php"
?>
<!---Content users--->
<div class="jumbotron ph mb0">
    <h2>Data user</h2>
    <div class="table-responsive">
        <table class="table table-striped reg">
            <thead>
            <tr>
                <th>login</th>
                <th>Password</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Date</th>
                <th>Gender</th>
            </tr>
            </thead>
            <tbody>
            <tr><?php
                echo "<td>$login</td>
                      <td>$password</td>
                      <td>$name</td>
                      <td>$surname</td>
                      <td>$date</td>
                      <td>$gender</td>";
                ?>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<?php

?>
<div class="container ml reg">
    <a href="/?table" class="btn bg-primary button-reg">Main Page</a>
    <a  href="/?edit/<?php echo $data_user[2]?>" class="btn bg-primary button-reg">Edit</a>
    <a href="/?remove<?php echo $data_user[2]?>" class="btn bg-primary button-reg">Remove</a>
</div>
<!-- End Content users-->