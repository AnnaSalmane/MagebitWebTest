<noscript>
    <?php
    $email = "";
    $checkbox = "";
    $er = "";
    $show = "none";

    if (count($_POST) > 0) {

        require "classes/dbh.class.php";
        require "classes/user.class.php";


        $User = new User();
        $errors = $User->signup($_POST);


        if (count($errors) == 0) {
            header('Location: secondPage.html');
        }

        extract($_POST);
    }
    ?>
</noscript>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Junior test</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>

<body>
    <div class="image_summer"></div>
    <div class="base">
        <div class="topbar">
            <div class="logo">
                <img src="img/Union.png" alt="logo" class="pineaplle">
                <img src="img/pineapple.png" alt="name" class="name">
            </div>
            <div class="links">
                <ul class="nav_links">
                    <li><a href="#about">About</a></li>
                    <li><a href="#how_it_works">How it works</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="body">
            <div id="app">
                <form action="" method="post">
                    <h1>Subscribe to newsletter</h1>
                    <p>Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>
                    <div class="email_input">
                        <input type="text" name="email" id="email" placeholder="Type your email address here..." v-model="email" value="<?= $email ?>">
                        <button type="submit" id="submit" value="Signup" :disabled="!checkFormValid" @click="addEmail()"><img src="img/ic_arrow.svg" alt="arrow"></button>
                    </div>
                    <div class="errors-list">
                        <div class="error" v-for="error in formErrors">{{ error }}</div>
                        <?php if (isset($errors) && is_array($errors) && count($errors) > 0) : ?>
                            <div class="error">
                                <?php foreach ($errors as $error) : ?>
                                    <?= $error ?>
                                    <br>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                    <label for="checkbox" class="checkbox">
                        <input class="checkbox_input" type="checkbox" name="checkbox" id="myCheckboxId" v-model="checkbox" value="<?= $checkbox ?>">
                        <div class="checkbox_box"></div>
                        <div class="checkmark"></div>
                        <span>I agree to <a href="#" id="agreeLink">terms of service</a></span>
                    </label>
                </form>
            </div>
            <hr>
            <div class="social_icons">
                <ul>
                    <li><a class="facebook" href="#facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a class="instagram" href="#instagram"><i class="fab fa-instagram"></i></a></li>
                    <li><a class="twitter" href="#twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a class="youtube" href="#youtube"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="js/script.js"></script>
    <noscript>

    </noscript>
</body>

</html>