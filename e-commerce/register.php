<?php
use App\Database\models\User;
use App\Validation\Validation;

include './vendor/autoload.php';
include  'layouts/head.php';
include 'layouts/bar.php';
include 'layouts/crumb.php';
$valid = new Validation();
$user = new User();

if ($_POST) {
    $valid->setValueName("First Name")->setValue($_POST["fname"])->required()->string()->max(32);
    $valid->setValueName("Last Name")->setValue($_POST["lname"])->required()->string()->max(32);
    $valid->setValueName("Email")->setValue($_POST["email"])->required()->regex("/^\w+[\w\-\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/");
    $valid->setValueName("Phone Number")->setValue($_POST["phone"])->required()->regex("/^01[0125][0-9]{8}$/");
    $valid->setValueName("Password")->setValue($_POST["password"])->required()->regex("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,32}$/");
    $valid->setValueName("Confirmed Password")->setValue($_POST["confirm_password"])->required()->confirmed($_POST["password"]);
    $valid->setValueName("Gender")->setValue($_POST["gender"])->required()->in();
}

if ($_POST && $valid->getErrors()) {
    $code = rand(100000, 999999);
    $user->setFname($_POST["fname"])->setLname($_POST["lname"])->setEmail($_POST["email"])
        ->setPhone($_POST["phone"])->setPassword(password_hash($_POST["password"], PASSWORD_BCRYPT))->setGender($_POST["gender"] == "male" ? 0 : 1)
        ->setCreated_at(date("Y-m-d"))->setStatus(1)->setVerification_code($code)->addUser();
    header('location:verify.php');   
    
    // ini_set('SMTP', 'mail.outlook.com');
    // ini_set('smtp_port', 25);
    // mail($_POST["email"], 'Activation Code For VigoShop.com ', 'Your activation code is ' . $code . 'Please Click On This Link <a href="http://localhost/nti/e-commerce/verfiy.php">Verify.php?code= ' . $code . '</a> to activate your account.', "FROM: " . 'vigoshop@outlook.com');
    // $_SESSION["email"] = $_POST["email"];
}
?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="" method="post">
                                        <input class="d-inline" type="text" name="fname" value="<?php isset($_POST["fname"]) ? print_r($_POST["fname"]) : ""  ?>" placeholder="First Name">
                                        <?php $valid->setFormError("First Name"); ?>
                                        <input type="text" name="lname" value="<?php isset($_POST["lname"]) ? print_r($_POST["lname"]) : ""  ?>" placeholder="Last Name">
                                        <?php $valid->setFormError("Last Name"); ?>
                                        <input type="text" name="phone" value="<?php isset($_POST["phone"]) ? print_r($_POST["phone"]) : ""  ?>" placeholder="Mobile Phone">
                                        <?php $valid->setFormError("Phone Number"); ?>
                                        <input type="email" name="email" value="<?php isset($_POST["email"]) ? print_r($_POST["email"]) : ""  ?>" placeholder="Email">
                                        <?php $valid->setFormError("Email"); ?>
                                        <input type="password" name="password" value="<?php isset($_POST["password"]) ? print_r($_POST["password"]) : ""  ?>" placeholder="Password">
                                        <?php $valid->setFormError("Password"); ?>
                                        <input type="password" name="confirm_password" value="<?php isset($_POST["confirm_password"]) ? print_r($_POST["confirm_password"]) : ""  ?>" placeholder="Confirm Password">
                                        <?php $valid->setFormError("Confirmed Password"); ?>
                                        <select name="gender" class="form-control">
                                            <option value="male" <?php ($_POST && $_POST["gender"] && $_POST["gender"] == "male") ? print_r("selected") : ""  ?>>Male</option>
                                            <option value="female" <?php ($_POST && $_POST["gender"] && $_POST["gender"] == "female") ? print_r("selected") : ""  ?>>Female</option>
                                        </select><br><br>
                                        <?php $valid->setFormError("Gender"); ?>
                                        <div class="button-box">
                                            <button type="submit" name="submit"><span>Register</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'layouts/foot.php';
?>