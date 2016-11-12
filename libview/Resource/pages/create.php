<?php
?>
<!---Content users--->
<div class="jumbotron ph mb0 reg">
    <h2>Create users</h2>
    <form class="form-group-sm form-control-static" action="libview/Resource/redactions/create_user.php" name="form_create" method="post">
        <?php
        include "preview/session/create.php"
        ?>
        <div>
            Login:      <input class=" text-black" placeholder="Login"
                               required autofocus  name="login"    type="text">
            Password:   <input class=" text-black" placeholder="Password"
                               required  name="password"     type="text">
        </div>
        <div>
            Name:       <input class=" text-black" placeholder="Name" name="name"     type="text" required>
            Surname:    <input class=" text-black" placeholder="Surname" name="surname"  type="text" required>
        </div>
        <div>
            Birthday:   <div class="re2">
                <select id = "years"  name="year"></select>
                <select id = "months" name="month" OnChange="select_months()"></select>
                <select id = "days" name="day"></select>

            </div>
        </div>
        <div>
            Gender:     male <input name="gender"   type="radio" value="male" required checked>
            female <input name="gender"   type="radio" value="female" required>
        </div>
        <input class="reg" type="submit" value="Create User">
    </form>
</div>

<div class="container ml reg">
    <a href="/" class="btn bg-primary button-reg">Back to Main Page</a>
</div>
<div>
    <?php
    include "preview/session/no_create.php"
    ?>
</div>
<!-- End Content users-->