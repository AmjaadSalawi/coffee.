<?php
$db_name = 'mysql:host=localhost;dbname=contact_db';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

if(isset($_POST['send'])){
    $name= $_POST['name'] ;
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $number= $_POST['number'] ;
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $guests= $_POST['guests'] ;
    $guests = filter_var($guests, FILTER_SANITIZE_STRING);
    
    $select_contact = $conn->prepare("SELECT * FROM `contact` WHERE name = ? AND number = ?AND guests =?");
    $select_contact->execute([$name, $number, $guests]);
    
    if( $select_contact->rowCount() > 0) {
        $message[] = 'message sent already!';
    }else {
        $insert_contact = $conn->prepare("INSERT INTO `contact`(name, number, guests) VALUES (?,?,?)");
        $insert_contact->execute ([$name, $number,$guests]);
        $message[] = 'message sent successfully!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="icon" href="images/logo.png" />
    <link rel="shortcut" href="images/logo.png" />
    <link rel="apple-touch-icon" href="images/logo.png" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
    <title>Coffee</title>
</head>

<body>
    <?php
    if(isset($message)){
        foreach($message as $message){
            echo '
            <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>';
        }
    }
    ?>
    <!-- header section starts -->
    <header class="header">
        <section class="flex">
            <a href="#home" class="logo"><img src="images/logo.png" alt=""></a>

            <nav class="navbar">
                <a href="#home">home</a>
                <a href="#about">about</a>
                <a href="#menu">menu</a>
                <a href="#gallery">gallery</a>
                <a href="#team">team</a>
                <a href="#contact">contact</a>
            </nav>

            <div id="menu-btn" class="fas fa-bars"></div>
        </section>
    </header>
    <!-- header section ends -->

    <!-- home section starts -->
    <div class="home-bg">
        <section class="home" id="home">
            <div class="content">
                <h3>coffee heaven</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit veniam distinctio maiores porro eius at
                    accusamus dicta doloremque cum tenetur?</p>
                <a href="#about" class="btn">about us</a>
            </div>
        </section>
    </div>
    <!-- home section ends -->

    <!-- about section starts -->
    <section class="about" id="about">
        <div class="image">
            <img src="images/about-img.svg" alt="">
        </div>
        <div class="content">
            <h3>coffee heaven</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eaque esse iure culpa aliquid repellendus
                delectus officia voluptatum eum. Est nobis magni distinctio eum corporis asperiores et rem ullam labore
                quas.</p>
            <a href="#menu" class="btn">our menu</a>
        </div>
    </section>
    <!-- about section ends -->

    <!-- facility section starts -->
    <section class="facility">
        <div class="heading">
            <img src="images/heading-img.png" alt="">
            <h3>our facility</h3>
        </div>
        <div class="box-container">
            <div class="box">
                <img src="images/icon-1.png" alt="">
                <h3>varieties of coffee</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, iste.</p>
            </div>

            <div class="box">
                <img src="images/icon-2.png" alt="">
                <h3>coffee beans</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, iste.</p>
            </div>

            <div class="box">
                <img src="images/icon-3.png" alt="">
                <h3>breakfast and sweets</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, iste.</p>
            </div>

            <div class="box">
                <img src="images/icon-4.png" alt="">
                <h3>read to go coffee</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, iste.</p>
            </div>

        </div>
    </section>
    <!-- about section ends -->

    <!-- menu section starts -->
    <section class="menu" id="menu">
        <div class="heading">
            <img src="images/heading-img.png" alt="">
            <h3>popular menu</h3>
        </div>

        <div class="box-container">
            <div class="box">
                <img src="images/menu-1.png" alt="">
                <h3>love you coffee</h3>
            </div>

            <div class="box">
                <img src="images/menu-2.png" alt="">
                <h3>Cappuccion</h3>
            </div>

            <div class="box">
                <img src="images/menu-3.png" alt="">
                <h3>Mocha coffee</h3>
            </div>

            <div class="box">
                <img src="images/menu-4.png" alt="">
                <h3>Frappuccion</h3>
            </div>

            <div class="box">
                <img src="images/menu-5.png" alt="">
                <h3>black coffee</h3>
            </div>

            <div class="box">
                <img src="images/menu-6.png" alt="">
                <h3>love heart coffee</h3>
            </div>

        </div>
    </section>
    <!-- menu section ends -->

    <!-- gallery section starts -->
    <section class="gallery" id="gallery">
        <div class="heading">
            <img src="images/heading-img.png" alt="">
            <h3>our gallery</h3>
        </div>

        <div class="box-container">
            <img src="images/gallery-1.webp" alt="">
            <img src="images/gallery-2.webp" alt="">
            <img src="images/gallery-3.webp" alt="">
            <img src="images/gallery-4.webp" alt="">
            <img src="images/gallery-5.webp" alt="">
            <img src="images/gallery-6.webp" alt="">
        </div>
    </section>
    <!-- gallery section ends -->

    <!-- team section starts -->
    <section class="team" id="team">
        <div class="heading">
            <img src="images/heading-img.png" alt="">
            <h3>our team</h3>
        </div>

        <div class="box-container">
            <div class="box">
                <img src="images/our-team-1.jpg" alt="">
                <h3>john deo</h3>
            </div>

            <div class="box">
                <img src="images/our-team-2.jpg" alt="">
                <h3>john deo</h3>
            </div>

            <div class="box">
                <img src="images/our-team-3.jpg" alt="">
                <h3>john deo</h3>
            </div>

            <div class="box">
                <img src="images/our-team-4.jpg" alt="">
                <h3>john deo</h3>
            </div>

            <div class="box">
                <img src="images/our-team-5.jpg" alt="">
                <h3>john deo</h3>
            </div>

            <div class="box">
                <img src="images/our-team-6.jpg" alt="">
                <h3>john deo</h3>
            </div>

        </div>
    </section>
    <!-- team section ends -->

    <!-- contact section starts -->
    <section class="contact" id="contact">
        <div class="heading">
            <img src="images/heading-img.png" alt="">
            <h3>contact us</h3>
        </div>

        <div class="row">
            <div class="image">
                <img src="images/contact-img.svg" alt="">
            </div>

            <form action="" method="post">
                <h3>book a table</h3>
                <input type="text" name="name" class="box" required maxlength="20" placeholder="enter your name">
                <input type="number" name="number" id="" class="box" required maxlength="20"
                    placeholder="enter your number" min="0" max="999999999999999999"
                    onkeypress="if(this.value.length == 10) return false">
                <input type="number" name="guests" id="" class="box" required maxlength="20"
                    placeholder="how many guests" min="0" max="99" onkeypress="if(this.value.length == 2) return false">
                <input type="submit" value="send message" name="send" class="btn">
            </form>
        </div>
    </section>
    <!-- contact section ends -->

    <!-- footer section starts -->
    <section class="footer" id="footer">
        <div class="box-container">
            <div class="box">
                <i class="fas fa-envelope"></i>
                <h3>our email</h3>
                <p>AmjadSalawi98@gmail.com</p>
                <p>AmjadSalawi98@gmail.com</p>
            </div>

            <div class="box">
                <i class="fas fa-clock"></i>
                <h3>opening hours</h3>
                <p>07:00am to 09:00pm</p>
            </div>

            <div class="box">
                <i class="fas fa-map-marker-alt"></i>
                <h3>shop location</h3>
                <p>saudia, jazan - 545466 </p>
            </div>

            <div class="box">
                <i class="fas fa-phone"></i>
                <h3>our number</h3>
                <p>557969241</p>
                <p>557969241</p>
            </div>

        </div>
        <div class="credit"> &copy; copyright @ 2022 by <span>miss. Amjaad Salawi</span> | all rights reserved!</div>
    </section>
    <!-- footer section ends -->

    <!-- custom js file link -->
    <script src="script.js"></script>
</body>

</html>