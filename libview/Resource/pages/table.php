<?php
include "preview/table.php"
?>

<div class="jumbotron ph mb0">
    <h2>Table users</h2>
    <div class="table-responsive reg">
        <table class="table table-striped mb0">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Sername</th>
                <th>Birthday</th>
                <th>Gender</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delet</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($users as $item=>$array){
                $item = $item +1;
                echo "<tr> <th>$item</th>";
                foreach($array as $col => $value){
                    if($col == 'login')continue;
                    if($col == 'date_birthday'){
                        $value = date('d-m-Y', $value);

                    }
                    echo " <th>$value</th> </th>";
                }
                $value = $array['name']."&".$array['surname'];
                $login = $array['login'];
                if($array['login'] == 'admin')continue;
                echo   "<th><form action='/?show/$value' method='post'>
                            <input type='hidden' name='login_user' value='$login'>
                            <button class=' btn-link re2 button-reg' type='submit'>View</button>
                            </form>
                        </th>
                        <th><form action='/?edit/$value' method='post'>
                            <input type='hidden' name='login_user' value='$login'>
                            <button class=' btn-link re2 button-reg' type='submit'>Edit</button>
                            </form></th>
                        <th><form action='/?remove/$value' method='post'>
                            <input type='hidden' name='login_user' value='$login'>
                            <button class=' btn-link re2 button-reg' type='submit'>Del</button>
                            </form></th></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container ml reg">
    <a href="<?php echo $back;?>" class="btn bg-primary button-reg form-control-static">Back</a>
    <a href="<?php echo  $next;?>" class="btn bg-primary button-reg form-control-static">Forward</a>
<span class="navbar-right pr100">
    <?php
    include "preview/pagenavigation.php"
    ?>
    <span>

</div>