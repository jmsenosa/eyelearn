<form method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control"  minlength="6" name="username" value="<?php echo (isset($_POST["username"])) ? $_POST["username"] : (isset($parent->username)) ? $parent->username : "" ; ?>" id="username" placeholder="username" required="required">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" minlength="6" name="password" value="<?php echo (isset($_POST["password"])) ? $_POST["password"] : (isset($parent->password)) ? $parent->password : "" ; ?>" id="password" placeholder="password" required="required">
    </div>
    <div class="form-group">
        <label for="password-repeat">Repeat Password</label>
        <input type="password" class="form-control" minlength="6" name="password2" value="<?php echo (isset($_POST["password2"])) ? $_POST["password2"] : (isset($parent->password)) ? $parent->password : "" ; ?>" id="password-repeat" placeholder="password-repeat" required="required">
    </div>
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" name="email" value="<?php echo (isset($_POST["email"])) ? $_POST["email"] : (isset($parent->email)) ? $parent->email : "" ; ?>" id="email" placeholder="email" required="required">
    </div>
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" name="first_name" value="<?php echo (isset($_POST["first_name"])) ? $_POST["first_name"] : (isset($parent->first_name)) ? $parent->first_name : "" ; ?>" id="first_name" placeholder="first_name" required="required">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" name="last_name" value="<?php echo (isset($_POST["last_name"])) ? $_POST["last_name"] : (isset($parent->last_name)) ? $parent->last_name : "" ; ?>" id="last_name" placeholder="last_name" required="required">
    </div>
    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="text" class="form-control" minlength="6" name="phone" value="<?php echo (isset($_POST["phone"])) ? $_POST["phone"] : (isset($parent->phone)) ? $parent->phone : "" ; ?>" id="phone" placeholder="phone" required="required" maxlength="11">
    </div>
    <div class="form-group">
        <div class="text-center">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </div>
    </div>
</form>