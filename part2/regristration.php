
<html>
<head>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php

include "db_connect.php"

?>

<form class="form-horizontal" action="register_user.php">
<fieldset>
    <legend>register user</legend>

    <div class="form-group">
        <label class="col-md-4 control-label" for="keyword">username</label>
            <div class="col-md-5">
                <input id = "username" type="search" name="username" placeholder="username" class="form-control input-md" required="">
            <p class="help-block">Enter a username</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="keyword">password</label>
            <div class="col-md-5">
                <input id = "password" type="search" name="password" placeholder="passwrods" class="form-control input-md" required="">
            <p class="help-block">Enter a username</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label" for="keyword">password2</label>
            <div class="col-md-5">
                <input id = "password2" type="search" name="password2" placeholder="password" class="form-control input-md" required="">
            <p class="help-block">Reenter password</p>
        </div>
    </div>
    <div class="form-group">
        <label for="submit" class="col-md-4 control-label"></label>
        <div class-"col-md-4">
            <button id="submit" name="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</fieldset>
</form>


