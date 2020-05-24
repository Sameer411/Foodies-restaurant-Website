<!DOCTYPE html>
<?php require 'PHP/ESTABLISH_CONNECTION.php'?>
<?php require 'PHP/REGISTER.php'?>
<script>
  function REGISTER()
  {
    document.getElementById("SIGNING_IN").style.display="none";
    document.getElementById("REGISTER_FORM").style.display="block";
    document.getElementById("features").style.display="none";
    document.getElementById("section-meals").style.display="none";
    document.getElementById("work").style.display="none";
    document.getElementById("cities").style.display="none";
    document.getElementById("section-testimonials").style.display="none";
  }
  function SIGN_IN()
  {
    document.getElementById("REGISTER_FORM").style.display="none";
    document.getElementById("features").style.display="none";
    document.getElementById("section-meals").style.display="none";
    document.getElementById("work").style.display="none";
    document.getElementById("cities").style.display="none";
    document.getElementById("section-testimonials").style.display="none";
  }
  function CHECK_NUMBER(x,y)
  {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "PHP/CHECK_NUMBER.php?REQUEST=CHECK_NUMBER&NUMBER="+x+"&PASSWORD="+y, false);
    ajax.send();
    return ajax.responseText;
  }
  function VALIDATE()
  {
    var number = document.forms["SIGNING_IN_FORM"]['SI_NUMBER'].value;
    var password = document.forms["SIGNING_IN_FORM"]['SI_PASSWORD'].value;

    if(CHECK_NUMBER(number,password)=="OK")
    {
      document.getElementById("SIGNING_IN").style.display="none";
      document.getElementById("AFTER_SIGNING_IN").style.display="block";
      document.getElementById("features").style.display="block";
      document.getElementById("section-meals").style.display="block";
      document.getElementById("works").style.display="block";
      document.getElementById("cities").style.display="block";
      document.getElementById("section-testimonials").style.display="block";
    }
    else {
      alert('INVALID USERNAME OR PASSWORD');
      return false;
    }
      document.getElementById("USER_ID").value=number;
      document.getElementById("user").innerHTML=number;
  }
  function ORDER(id,name)
  {
    var num = document.getElementById("USER_ID").value;
    var today = new Date();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var date = today.getFullYear()+"-"+today.getMonth()+"-"+today.getDate();

    document.getElementById("DATE").innerHTML=date;
    document.getElementById("TIME").innerHTML=time;
    document.getElementById("ORDER_PLACED").style.display="block";
    document.getElementById("RECEIPE").innerHTML=name;
    document.getElementById("ORDER_PLACED").focus();
    var ajax_2 = new XMLHttpRequest();
    ajax_2.open("GET", "PHP/PLACE_ORDER.php?REQUEST=PLACE_ORDER&ID="+id+"&NUM="+num+"&DATE="+date+"&TIME="+time, false);
    ajax_2.send();

    alert(ajax_2.responseText);

    var ajax_3 = new XMLHttpRequest();
    ajax_3.open("GET", "PHP/CHECK_NUMBER.php?REQUEST=CHECK_AMOUNT&ID="+id, false);
    ajax_3.send();
    document.getElementById("BILL").innerHTML=ajax_3.responseText;
  }
</script>
<html lang="en">

  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/animate.css">
        <link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <link rel="stylesheet" type="text/css" href="resources/css/queries.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'>
        <title>Foodies</title>

        <link rel="apple-touch-icon" sizes="180x180" href="/resources/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/resources/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/resources/favicons/favicon-16x16.png">
        <link rel="manifest" href="/resources/favicons/site.webmanifest">
        <link rel="mask-icon" href="/resources/favicons/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="/resources/favicons/favicon.ico">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-config" content="/resources/favicons/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">
    </head>
  <body>
    <header style="display:block;">
      <nav>
          <div class="row">
              <img src="resources/img/logo.jpg" alt="Foodies logo" class="logo">
              <img src="resources/img/logo.jpg" alt="Foodies logo" class="logo-black">
              <ul class="main-nav js--main-nav">
                  <li><a href="#features">About Foodies</a></li>
                  <li><a href="#works">How it works</a></li>
                  <li><a href="#cities">Our cities</a></li>
                  <li><a id="user" href="#">User</a></li>
              </ul>
              <a class="mobile-nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a>
          </div>
      </nav>
      <div class="hero-text-box" id="AFTER_SIGNING_IN" style="display:none;">
          <h1>Good - bye junk food.<br>Hello super healthy meals.</h1>
          <a class="btn btn-full js--scroll-to-meals" href="#section-meals">I'm hungry</a>
          <a class="btn btn-ghost js--scroll-to-start" href="#">Show me more</a>
      </div>
      <section id="SIGNING_IN" style="padding: 150px 20vw; text-align: center; display:block;">
            <form class="" id="SIGNING_IN_FORM" action="" method="post" onsubmit="return VALIDATE()">
                <h2 style="color:#e67e22;">PLEASE SIGN IN WITH</h2>
                <label for="CUS_NUMBER" form="SIGNING_IN_FORM" style="color:#e67e22;">YOUR REGISTERED CONTACT NUMBER : </label>
                <br>
                <input id="SI_NUMBER" name="SI_NUMBER" form="SIGNING_IN_FORM" placeholder="eg.9403137191" type="text" maxlength=10 minlength=10 required="required" style="color:#e67e22;background-color:rgba(0,0,0,0);">
                <br><br>
                <label for="SI_PASSWORD" form="SIGNING_IN_FORM" style="color:#e67e22;">YOUR PASSWORD : </label>
                <br>
                <input id="SI_PASSWORD" name="SI_PASSWORD" form="SIGNING_IN_FORM" placeholder="eg.PASSWORD" type="password" maxlength=12 minlength=7 required="required" style="color:#e67e22;background-color:rgba(0,0,0,0); width:100%">
                <br><br>
                <a class="btn btn-full" href="#SIGN_UP_FORM" onclick="VALIDATE()">SIGN IN</a>
                <a class="btn btn-full" href="#REGISTER_FORM" onclick="REGISTER()">Register now</a>
            </form>
      </section>
    </header>



        <section  id="REGISTER_FORM" style="background-color:rgba(0,0,0,1);padding: 40px 20vw; text-align: center; display:none;">
              <form class="" id="REGISTER_CUSTOMER" action="" method="post" style="background-color:rgba(0,0,0,1);">
                  <h2 style="color:#e67e22;">PLEASE REGISTER</h2>
                  <label for="CUS_FIRST_NAME" form="REGISTER_CUSTOMER" style="color:#e67e22;">YOUR FIRST NAME : </label>
                  <br>
                  <input id="CUS_FIRST_NAME" name="CUS_FIRST_NAME" form="REGISTER_CUSTOMER" placeholder="eg. SAMEER" type="text" maxlength=25 required="required" style="color:#e67e22;background-color:rgba(0,0,0,0);">
                  <br><br>
                  <label for="CUS_MIDDLE_NAME" form="REGISTER_CUSTOMER" style="color:#e67e22;">YOUR MIDDLE NAME : </label>
                  <br>
                  <input id="CUS_MIDDLE_NAME" name="CUS_MIDDLE_NAME" form="REGISTER_CUSTOMER" placeholder="eg. KAMLESH" type="text" maxlength=25 required="required" style="color:#e67e22;background-color:rgba(0,0,0,0);">
                  <br><br>
                  <label for="CUS_LAST_NAME" form="REGISTER_CUSTOMER" style="color:#e67e22;">YOUR LAST NAME : </label>
                  <br>
                  <input id="CUS_LAST_NAME" name="CUS_LAST_NAME" form="REGISTER_CUSTOMER" placeholder="eg. RATHOD" type="text" maxlength=25 required="required" style="color:#e67e22;background-color:rgba(0,0,0,0);">
                  <br><br>
                  <label for="CUS_NUMBER" form="REGISTER_CUSTOMER" style="color:#e67e22;">YOUR CONTACT NUMBER : </label>
                  <br>
                  <input id="CUS_NUMBER" name="CUS_NUMBER" form="REGISTER_CUSTOMER" placeholder="eg.9403137191" type="text" maxlength=10 minlength=10 required="required" style="color:#e67e22;background-color:rgba(0,0,0,0);">
                  <br><br>
                  <label for="CUS_EMAIL" form="REGISTER_CUSTOMER" style="color:#e67e22;">YOUR CONTACT EMAIL : </label>
                  <br>
                  <input id="CUS_EMAIL" name="CUS_EMAIL" form="REGISTER_CUSTOMER" placeholder="eg.gandavala.re.tula@gmail.com" type="text" maxlength=360 required="required" style="color:#e67e22;background-color:rgba(0,0,0,0);">
                  <br><br>
                  <label for="CUS_PASSWORD" form="REGISTER_CUSTOMER" style="color:#e67e22;">YOUR PASSWORD : </label>
                  <br>
                  <input id="CUS_PASSWORD" name="CUS_PASSWORD" form="REGISTER_CUSTOMER" placeholder="eg.PASSWORD" type="password" maxlength=360 required="required" style="color:#e67e22;background-color:rgba(0,0,0,0);width:100%">
                  <br><br>
                  <label for="CUS_ADDRESS" form="REGISTER_CUSTOMER" style="color:#e67e22;">YOUR ADDRESS: </label>
                  <br>
                  <textarea id="CUS_ADDRESS" name="CUS_ADDRESS" form="REGISTER_CUSTOMER" placeholder="eg.NASHIK ROAD" type="text" maxlength=100 required="required" style="color:#e67e22;background-color:rgba(0,0,0,0);"></textarea>
                  <br><br>
                  <input id="REGISTER_CUSTOMER_SUBMIT_BUTTON" name="SUBMIT" type="submit" value="REGISTER">
              </form>
        </section>

        <section  id="ORDER_PLACED" style="background-color:rgba(0,0,0,0);padding: 40px 20vw; text-align: center; display:none;">
          <input id="USER_ID" value=0 style="display:none;">
          <h2>ORDER PLACED !</h2>
          <h3>ORDER PLACED AT</h3>
          <h3 id="TIME"></h3>
          <h3>ON</h3>
          <h3 id="DATE"></h3>
          <h3>YOU ORDERD</h3>
          <h3 id="RECEIPE"></h3>
          <h3>AMMOUNT TO BE PAID IS</h3>
          <h3 id="BILL"></h3>
        </section>

        <section class="section-features js--section-features" id="features" style="display:none;">
            <div class="row">
                <h2>Get food fast &mdash; not fast food</h2>
                <p class="long-copy">
                    Hello, we're Foodies, your new premium food delivery service. We know you're always busy. No time for cooking. So let us take care of that, we're really good at it, we promise!
                </p>
            </div>

            <div class="row js--wp-1">
                <div class="col span-1-of-4 box">
                    <i class="ion-ios-infinite-outline icon-big"></i>
                    <h3>365 days</h3>
                    <p>
                        Never cook again! We really mean that. <br>We Deliver Food You wants. Order Your Meal Now.
                    </p>
                </div>
                <div class="col span-1-of-4 box">
                    <i class="ion-ios-stopwatch-outline icon-big"></i>
                    <h3>Ready in 20 minutes</h3>
                    <p>
                        You're only twenty minutes away from your delicious and super healthy meals delivered right to your home. We work with the best chefs in each town to ensure that you're 100% happy.
                    </p>
                </div>
                <div class="col span-1-of-4 box">
                    <i class="ion-ios-nutrition-outline icon-big"></i>
                    <h3>100% organic</h3>
                    <p>
                        All our vegetables are fresh, organic and local. Animals are raised without added hormones or antibiotics. Good for your health, the environment, and it also tastes better!
                    </p>
                </div>
                <div class="col span-1-of-4 box">
                    <i class="ion-ios-cart-outline icon-big"></i>
                    <h3>Order anything</h3>
                    <p>
                        We don't limit your creativity, which means you can order whatever you feel like. You can also choose from our menu containing over 100 delicious meals. It's up to you!
                    </p>
                </div>
            </div>
        </section>

        <section class="section-meals" id="section-meals" style="display:none;">
            <ul class="meals-showcase clearfix">
                <li>
                    <figure class="meal-photo">
                        <img src="resources/img/1.jpeg" alt="Misal Paav" onclick="ORDER(1,'Misal Pav');" id="img_dimentions">
                    </figure>
                </li>
                <li>
                    <figure class="meal-photo">
                        <img src="resources/img/2.jpeg" alt="Chola Bhatura"  onclick="ORDER(2,'Chole Bhature');" id="img_dimentions">
                    </figure>
                </li>
                <li>
                    <figure class="meal-photo">
                        <img src="resources/img/3.jpeg" alt="Idli Sambhar"  onclick="ORDER(3,'Idli Sabhar');" id="img_dimentions">
                    </figure>
                </li>
                <li>
                    <figure class="meal-photo">
                        <img src="resources/img/4.jpeg" alt="Dosa"  onclick="ORDER(4,'Dosa');" id="img_dimentions">
                    </figure>
                </li>
            </ul>
            <ul class="meals-showcase clearfix">
                <li>
                    <figure class="meal-photo">
                        <img src="resources/img/5.jpeg" alt="Sambar Wada" onclick="ORDER(5,'Sambar Wada');" id="img_dimentions">
                    </figure>
                </li>
                <li>
                    <figure class="meal-photo">
                        <img src="resources/img/6.jpeg" alt="SandWich" onclick="ORDER(6,'SandWich');" id="img_dimentions">
                    </figure>
                </li>
                <li>
                    <figure class="meal-photo">
                        <img src="resources/img/7.jpeg" alt="Daal Bati" onclick="ORDER(7,'Daal Bati');" id="img_dimentions">
                    </figure>
                </li>
                <li>
                    <figure class="meal-photo">
                        <img src="resources/img/8.jpeg" alt="Dahi Wada" onclick="ORDER(8,'Dahi Wada');" id="img_dimentions">
                    </figure>
                </li>
            </ul>
        </section>


        <section class="section-steps" id="works" style="display:none;">
            <div class="row">
                <h2>How it works &mdash; Simple as 1, 2, 3</h2>
            </div>
            <div class="row">
                <div class="col span-1-of-2 steps-box">
                    <img src="resources/img/app-iPhone.png" alt="Omnifood app on iPhone" class="app-screen js--wp-2">
                </div>
                <div class="col span-1-of-2 steps-box">
                    <div class="works-step clearfix">
                        <div>1</div>
                        <p>Choose the subscription plan that best fits your needs and sign up today.</p>
                    </div>
                    <div class="works-step clearfix">
                        <div>2</div>
                        <p>Order your delicious meal using our mobile app or website. Or you can even call us!</p>
                    </div>
                    <div class="works-step clearfix">
                        <div>3</div>
                        <p>Enjoy your meal after less than 20 minutes. See you the next time!</p>
                    </div>

                    <a href="#" class="btn-app"><img src="resources/img/download-app.svg" alt="App Store Button"></a>
                    <a href="#" class="btn-app"><img src="resources/img/download-app-android.png" alt="Play Store Button"></a>
                </div>
            </div>
        </section>

        <section class="section-cities" id="cities" style="display:none;">
            <div class="row">
                <h2>We're currently in these cities</h2>
            </div>
            <div class="row js--wp-3">
                <div class="col span-1-of-4 box">
                    <img src="resources/img/nashik.jpg" alt="Nashik City">
                    <h3>Nashik City</h3>
                    <div class="city-feature">
                        <i class="ion-ios-person icon-small"></i>
                        1600+ happy eaters
                    </div>
                    <div class="city-feature">
                        <i class="ion-ios-star icon-small"></i>
                        60+ top chefs
                    </div>
                    <div class="city-feature">
                        <i class="ion-social-twitter icon-small"></i>
                        <a href="#">@Foodies_nsk</a>
                    </div>
                </div>
                <div class="col span-1-of-4 box">
                    <img src="resources/img/pune.jpg" alt="Pune City">
                    <h3>Pune City</h3>
                    <div class="city-feature">
                        <i class="ion-ios-person icon-small"></i>
                        3700+ happy eaters
                    </div>
                    <div class="city-feature">
                        <i class="ion-ios-star icon-small"></i>
                        160+ top chefs
                    </div>
                    <div class="city-feature">
                        <i class="ion-social-twitter icon-small"></i>
                        <a href="#">@Foodies_pune</a>
                    </div>
                </div>
                <div class="col span-1-of-4 box">
                    <img src="resources/img/nagpur.jpg" alt="Nagpur City">
                    <h3>Nagpur City</h3>
                    <div class="city-feature">
                        <i class="ion-ios-person icon-small"></i>
                        2300+ happy eaters
                    </div>
                    <div class="city-feature">
                        <i class="ion-ios-star icon-small"></i>
                        110+ top chefs
                    </div>
                    <div class="city-feature">
                        <i class="ion-social-twitter icon-small"></i>
                        <a href="#">@Foodies_Nagpur</a>
                    </div>
                </div>
                <div class="col span-1-of-4 box">
                    <img src="resources/img/delhi.jpg" alt="Delhi city">
                    <h3>Delhi City</h3>
                    <div class="city-feature">
                        <i class="ion-ios-person icon-small"></i>
                        1200+ happy eaters
                    </div>
                    <div class="city-feature">
                        <i class="ion-ios-star icon-small"></i>
                        50+ top chefs
                    </div>
                    <div class="city-feature">
                        <i class="ion-social-twitter icon-small"></i>
                        <a href="#">@Foodies_Delhi</a>
                    </div>
                </div>
            </div>

        </section>

        <section class="section-testimonials "id="section-testimonials" style="display:none;">
            <div class="row">
                <h2>Our customers can't live without us</h2>
            </div>
            <div class="row">
                <div class="col span-1-of-3">
                    <blockquote>
                        Foodies is just awesome! I just launched a startup which leaves me with no time for cooking, so Foodies is a life-saver. Now that I got used to it, I couldn't live without my daily meals!
                        <cite><img src="resources/img/cust1.jpg">sameer Rathod</cite>
                    </blockquote>
                </div>
                <div class="col span-1-of-3">
                    <blockquote>
                       Inexpensive, healthy and great-tasting meals, delivered right to my home. We have lots of food delivery here in Lisbon, but no one comes even close to Foodies. Me and my family are so in love!
                        <cite><img src="resources/img/cust2.jpeg">Hrushikesh Joshi</cite>
                    </blockquote>
                </div>
                <div class="col span-1-of-3">
                    <blockquote>
                      I was looking for a quick and easy food delivery service in Pune. I tried a lot of them and ended up with Foodies. Best food delivery service in the Bay Area. Keep up the great work!
                    <cite><img src="resources/img/cust3.jpeg">Nishant Dixit</cite>
                    </blockquote>
                </div>
            </div>
        </section>

        <section class="section-form" id="section-forms" style="display:none;">
            <div class="row">
                <h2>We're happy to hear from you</h2>
            </div>
            <div class="row">
                <form method="post" action="#" class="contact-form">
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="name">Name</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="name" id="name" placeholder="Your name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="email">Email</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="email" name="email" id="email" placeholder="Your email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="find-us">How did you find us?</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="find-us" id="find-us">
                                <option value="friends" selected>Friends</option>
                                <option value="search">Search engine</option>
                                <option value="ad">Advertisement</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Newsletter?</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="checkbox" name="news" id="news" checked> Yes, please
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Drop us a line</label>
                        </div>
                        <div class="col span-2-of-3">
                            <textarea name="message" placeholder="Your message"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" value="Send it!">
                        </div>
                    </div>

                </form>

            </div>
        </section>

        <footer>
            <div class="row">
                <div class="col span-1-of-2">
                    <ul class="footer-nav">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">iOS App</a></li>
                        <li><a href="#">Android App</a></li>
                    </ul>
                </div>
                <div class="col span-1-of-2">
                    <ul class="social-links">
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                        <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <p>
                    Web Site is Developed By Sameer Rathod and Hrushikesh Joshi, Using HTML5, CSS3, JQuery, PHP and AJax. No copyrights here.<br>
                    This webpage is for Foodies!
                </p>
                <p>
                    Build with <i class="ion-ios-heart" style="color: #ea0000; padding: 0 3px;"></i> in the beautiful city Nashik. Date 16 May 2020.
                </p>
            </div>
        </footer>
      </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js"></script>
    <script src="vendors/js/jquery.waypoints.min.js"></script>
    <script src="resources/js/script.js"></script>

    </body>

</html>
