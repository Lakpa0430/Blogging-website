<? require "dbcon.php" ?>
<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/9fc9387c45.js" crossorigin="anonymous"></script>
    <!-- <script src="Js/Jquerymain.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="shortcut icon" href="css/Images/final logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/homepage.css">
    <title>Unique Blog - Post your Unique ideas</title>
    <style>
        #Rbtn {
            padding: 10px;
            background-color: palevioletred;
            color: white;
            border: none;
            cursor: pointer;
        }

        .post-content:not(:last-child) {
            margin-bottom: 50;
        }
     .hide {
            display: none;
        }
  .edit{
    float: right;
    margin-bottom: 5px;
    margin-right: 120px;
  }
  .edit span {
    padding: 2px 3px 2px 3px;
    color: #888;
}
.edit .E-edt:hover, .D-dlt:hover {
    color: #ffffff;
    background-color: #808080;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    cursor: pointer;
    
}


/*        x      Viewport less then or equal to 520px       x     */
    </style>
</head>

<body>

    <!-- ----------------------------  Navigation ---------------------------------------------- -->

    <nav class="navigation">
        <div class="navi-menu flex-row">
            <div class="navi-brand">
                <a href="#" class="text-gray">Unique Blog</a>
            </div>
            <div class="toggle-collapse">
                <div class="toggle-icons">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <div>
                <ul class="navi-items">
                    <li class="navi-link">
                        <a href="#">Home</a>
                    </li>

                    <li class="navi-link">
                        <a href="contact.html">Contact</a>
                    </li>
                    <li class="navi-link">
                        <a href="#fabout">About</a>
                    </li>
                    <li class="navi-link">
                        <a href="feedback .html">Feedback</a>
                    </li>
                    <li class="navi-link">
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="social text-gray">
               <a href="#">
                    <i class="fa-solid fa-user"></i>
                    <?php echo $_SESSION['user'] ?>
                </a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </nav>
    
    <!-- ------------x---------------  Navigation --------------------------x------------------- -->

    <!----------------------------- Main Site Section ------------------------------>
    <main>

        <!------------------------ Site Title ---------------------->

        <section class="site-title">
            <div class="site-background" data-aos="fade-up" data-aos-delay="100">
                <h3>A good life is</h3>
                <h1> a collection of happy memories.</h1>
                <button class="btn" id="btn-blog">Create Your Blog</button>
            </div>
        </section>

    <!-- ---------------------- Site Content -------------------------->

        <section class="container">
            <div class="site-content">
                <div class="posts">
                    <?php
                    require "dbcon.php";

                    $select_command = "SELECT * FROM postingdetails ORDER BY ID DESC";
                    $select_query = mysqli_query($connection, $select_command);

                    $check_rows_returned = mysqli_num_rows($select_query);
                    if ($check_rows_returned > 0) {
                        while ($images = mysqli_fetch_assoc($select_query)) {

                    ?>
                            <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                                <div class="post-image">

                                    <div>
                                        <img src="Upload/<?= $images['Images'] ?>" class="img" alt="blog1">
                                    </div>
                                </div>
                                <div class="post-title">

                                    <p class="content"><?php echo $images['Post'] ?>
                                    </p>


                                   <button id="Rbtn" onclick="readMore(this)">Read More...</button>
                                   
                                <br>
                                <div class="edit">
                                        <!-- <span class="E-edt">Edit</span> -->
                                        <!-- <span class="D-dlt">Delete</span> -->
                                        <?php
                                         echo "<span><a class='E-edt' href='edit_blog.php?id=". $images['id']."&command=edit'>Edit</a> </span>
                                        <span> <a class='D-dlt' href='delete.php?id=". $images['id']."'>Delete</a> </span>";
                                        ?>
                                        
                                    </div>
                                </div>
                                
                                <hr>
                            </div>
                    <?php
                        }
                    }
                    ?>
                   

                </div>
                <aside class="sidebar">
                    <div class="popular-post">
                        <h2>Previous post</h2>
                        <div class="post-content" data-aos="flip-up" data-aos-delay="200">
                            <div class="post-image">
                                <div>
                                    <img src="CSS/Images/m-blog-1.jpg" class="img" alt="blog1">
                                </div>

                            </div>
                            <div class="post-title">
                                <a href="#">New data recording system to better analyse road accidents</a>
                            </div>
                            
                        </div>
                        <div class="post-content" data-aos="flip-up" data-aos-delay="300">
                            <div class="post-image">
                                <div>
                                    <img src="CSS/Images/m-blog-2.jpg" class="img" alt="blog1">
                                </div>

                            </div>
                            <div class="post-title">
                                <a href="#">New data recording system to better analyse road accidents</a>
                            </div>
                        </div>
                        <div class="post-content" data-aos="flip-up" data-aos-delay="400">
                            <div class="post-image">
                                <div>
                                    <img src="CSS/Images/m-blog-3.jpg" class="img" alt="blog1">
                                </div>

                            </div>
                            <div class="post-title">
                                <a href="#">New data recording system to better analyse road accidents</a>
                            </div>
                        </div>
                        <div class="post-content" data-aos="flip-up" data-aos-delay="500">
                            <div class="post-image">
                                <div>
                                    <img src="CSS/Images/m-blog-4.jpg" class="img" alt="blog1">
                                </div>

                            </div>
                            <div class="post-title">
                                <a href="#">New data recording system to better analyse road accidents</a>
                            </div>
                        </div>
                        <div class="post-content" data-aos="flip-up" data-aos-delay="600">
                            <div class="post-image">
                                <div>
                                    <img src="CSS/Images/thumb-card7.png" class="img" alt="blog1">
                                </div>

                            </div>
                            <div class="post-title">
                                <a href="#">New data recording system to better analyse road accidents</a>
                            </div>
                        </div>
                    </div>

                </aside>
            </div>
        </section>

        <!-- -----------x---------- Site Content -------------x------------>
    </main>
    <!---------------x------------- Main Site Section ---------------x-------------->
    <!-- --------------------------- Footer ---------------------------------------- -->

    <footer class="footer">
        <div class="container">
            <div class="about-us" data-aos="fade-right" data-aos-delay="200">
                <h2 id="fabout">About us</h2>

                <p>
                    we have created a plateform for you to write your opinion or post it. you can post your travel photoes here. we are the blogging website that dieves in having good time in what we do your story matters. Your opinion matter your ideology matters.
                    The WEBLOG is a combination of both BLog as well as it contains the information
                    of various things related toTechnology,Education,News,International Business,sport, Entertainment and onging college activities.
                    The young generation are now moving from static content to dynamic content
                    like flash and updating information like twitter.

                </p>
            </div>
            <div class="newsletter" data-aos="fade-right" data-aos-delay="200">
                <h2>Newsletter</h2>
                <p>Stay update with our latest</p>
                <div class="form-element">
                    <input type="text" placeholder="Email"><span><i class="fas fa-chevron-right"></i></span>
                </div>
            </div>
            <div class="instagram" data-aos="fade-left" data-aos-delay="200">
                <h2>Instagram</h2>
                <div class="flex-row">
                    <img src="CSS/Images/thumb-card3.png" alt="insta1">
                    <img src="CSS/Images/thumb-card4.png" alt="insta2">
                    <img src="CSS/Images/thumb-card5.png" alt="insta3">
                </div>
                <div class="flex-row">
                    <img src="CSS/Images/thumb-card6.png" alt="insta4">
                    <img src="CSS/Images/thumb-card7.png" alt="insta5">
                    <img src="CSS/Images/thumb-card8.png" alt="insta6">
                </div>
            </div>
            <div class="follow" data-aos="fade-left" data-aos-delay="200">
                <h2>Follow us</h2>
                <p>Let us be Social</p>
                <div>
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="rights flex-row">
            <h4 class="text-gray">

            </h4>
        </div>
    </footer>
    <!-- -------------x------------- Footer --------------------x------------------- -->
    <!-------This is for add image------------>
    <div class="bg-modal">
        <div class="modal-content" id="box">
            <form action="create_blog.php" enctype="multipart/form-data" method="post">
                <div class="heading">Blooger</div>
                <div class="close">+</div>
                <div class="choose-box">
                    <div class="gallery" id="display_img">
                        <img src="CSS/Images/gallery.png" alt="" height="95" id="hide">
                    </div>
                    <div class="options">
                        <input type="file" class="choose-file" id="c_f" accept="image/*" name="image">
                        <button type="submit" name="submit" id="ok">ok</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- This is for resposive navbar toggle -->
<script>

    // $('.E-edt').click(function(){
    //     if($(this).text() == 'Edit') {
    //         $(this).parent().prev('.input shadow').prop('contenteditable',true);
    //         $(this).parent().prev('.input shadow').focus();
    //         $(this).text('Save');
    //     }else{
    //         $(this).text('edit');
    //     }
    // });
    // $('.input shadow').blur(function(){
    //     $(this).prop('contenteditable',false);
    // });

</script>
    <script src="Js/hompage.js"></script>
    <script src="js/Readmore.js"></script>

    <!-- This is for resposive navbar toggle -->
</body>

</html>