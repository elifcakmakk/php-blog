<?php
include '../_layouts/header.php';
require '../../config/database.php';
include '../../helpers/keyword.php';
?>

<div class="jumbotron mt-5">
    <h1>Login </h1>
    <form action="check.php" method="POST" class="form-group" >
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email"  class="form-control" >   
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password"  class="form-control" >   
        </div>
        <button class="btn btn-success" type="submit" >Login</button>
    </form>
</div>


<?php
include '../_layouts/footer.php';

?>