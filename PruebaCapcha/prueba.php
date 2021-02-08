<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
        session_start();
        if (isset($_POST['code'])) {
            if ($_POST['code'] == $_SESSION['captcha']) {
                echo "Captcha valid";
            } else {
                echo "Captcha NOT valid";
            }
        }

        $_SESSION['captcha'] = mt_rand(10000, 99999);
        ?>
       
        <form action="" method="post">
            <div class="text-center text-md-right m-3">
                <p><?php echo $_SESSION['captcha']; ?></p>
                <p><input type="text" name="code" /> <input type="submit" value="Submit" />
            </div>
        </form>
    </body>
</html>


