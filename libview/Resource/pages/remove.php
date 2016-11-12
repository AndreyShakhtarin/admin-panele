<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 24.08.16
 * Time: 19:12
 */
include "preview/remove.php"
?>
<div class="container ml reg">
    <h2>Do You want to remove <?php echo $user['name']?>?</h2>
    <a href="/?=table" class="btn bg-primary button-reg form-inline">Cancel</a>
    <form class="visible-lg-inline-block" action="libview/Resource/redactions/remove.php" method="post">
        <input type="hidden" name="login_user" value="<?php echo $login; ?>">
        <input class=" btn bg-primary button-reg" type="submit" value="Remove">
    </form>
</div>
