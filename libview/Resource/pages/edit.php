<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 24.08.16
 * Time: 19:12
 */
include "preview/edit.php"
?>
<!---Content users--->
<div class="jumbotron ph mb0 reg">
    <h2>Update users</h2>
    <form class="form-group-sm form-control-static" action="libview/Resource/redactions/update.php" name="form_create" method="post">
        <div class="">
            Login:      <input class=" text-black" placeholder="Login"
                               required autofocus  name="login"    type="text" value="<?php  echo $user['login']?>">
            Password:   <input class=" text-black" placeholder="Password"
                               required  name="password"     type="text" value="<?php echo $user['password']?>">
        </div>
        <div>
            Name:       <input class=" text-black" placeholder="Name"
                               name="name"     type="text" value="<?php echo $user['name']?>" required>
            Surname:    <input class=" text-black" placeholder="Surname"
                               name="surname"  type="text" value="<?php echo $user['surname']?>" required>
        </div>
        <div>
            Birthday:   <div class="re2">
                <select id = "years"  name="year"></select>
                <select id = "months" name="month" OnChange="select_months()"></select>
                <select id = "days" name="day"></select>

            </div>
        </div>
        <div>
            Gender: male <input name="gender"   type="radio" value="male" required <?php echo $male?>> female <input name="gender"   type="radio" value="female" required <?php echo $female?>>
        </div>
        <input class="reg" type="submit" value="Update">
    </form>
</div>
<?php
include "preview/session/update.php"
?>
<div class="container ml reg">
    <?php
    if(isset($data_user[2])){
        echo "<a href=/?show/$data_user[2] class=\"btn bg-primary button-reg\">View</a>";
    }
    ?>
    <a href="/" class="btn bg-primary button-reg">Back to Main Page</a>
</div>
<!-- End Content users-->