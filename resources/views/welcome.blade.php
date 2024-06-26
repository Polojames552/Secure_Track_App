<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Track App</title>
</head>
<!--SHORTCUT ICON
<link rel="shortcut icon" href="assets/images/favicon.ico" />-->

<meta charset="UTF-8" />
<meta name="language" content="ES" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />


  <!-- Template Stylesheet -->
  <link rel="stylesheet" href="{{ asset('css/welcome1.css') }}">

<!--FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;400;500;600;700;800;900&family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet" />

<!--PLUGIN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<body>
<style>
    @media only screen and (max-width: 600px) {
        .blog-slider .slick-slide strong, .blog-slider .slick-slide p {
            display: none;
            /* font-size: 10px; */
        }
        .blog-slider .slick-slide{
            margin-bottom: -400px;
        }
    }
    
</style>
<!--TOP MENU-->
<!-- <menu class="top_menu flex">
    <section class="flex_content">
        <a href="emailto:info@lilliovi.com">
            <i class="fa fa-envelope-o"></i>
            info@lilliovi.com
        </a>
        <a href="tel:1234567890">
            <i class="fa fa-headphones"></i>
            1234567890
        </a>
    </section>
    <section class="flex_content">
        <a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" title="Instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" title="youtube"><i class="fa fa-youtube"></i></a>
    </section>
</menu> -->

<!--NAV-->
<nav>
    <section class="flex_content">
        <figure class="logo fixed_flex">
            <!-- <img src="https://i.postimg.cc/02NrFwT5/canva.png" alt=""> -->
            <img src="{{ asset('images/PNP.png') }}" alt="PNP Logo" style="height:64px; width: 50px;">
            <figcaption>
                <strong class="title">Secure</strong> Track App
            </figcaption>
        </figure>
    </section>
    <section class="flex_content nav_content" id="nav_content">
        <a href="#home" class="active">Home</a>
        <a href="#gallery">Gallery</a>
        <!-- <a href="#blogs">Blogs</a> -->
        <!-- <a href="javascript:void(0)" class="contact_btn">Contact us</a> -->
        <a href="#footer">Contact us</a>
        <a href="#footer">About us</a>
    </section>
    <section class="flex_content">
        <a href="javascript:void(0)" class="ham"><i class="fa fa-bars"></i></a>
    </section>
</nav>

<!--MENU-->
<menu id="menu" class="side_menu">
    <a href="javascript:void(0)" class="close"><i class="fa fa-times"></i></a>
    <!-- <strong class="fixed_flex logo"><img src="https://i.postimg.cc/02NrFwT5/canva.png" alt="Summit"  loading="lazy" /></strong> -->
    <strong class="fixed_flex logo"><img src="{{ asset('images/PNP.png') }}" alt="PNP Logo" loading="lazy"  style="height:50px; width: 40px;"></strong>
    <br>
    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#footer">Contact Us</a></li>
        <!-- <li><a href="#">Features</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)">Mandatory Disclosure</a>
            <aside>
                <a href="#">Society registration</a>
                <a href="#">NOC</a>
            </aside>
        </li> -->
        <li><a href="#footer">About us</a></li>
        <!-- <li class="fixed_flex"><a href="javascript:void(0)" class="btn btn_1 chat_popup">SignUp/LogIn</a> <a href="#" class="btn btn_2 chat_popup">Admission</a> </li> -->
        <!-- <li class="fixed_flex"><a href="{{ route('login') }}" class="btn btn_2 chat_popup">System Login</a> </li> -->
      
        @if (Route::has('login'))
                    @auth
                    @if(Auth::user()->role =='1')
                        <li class="fixed_flex"><a href="/superAdminDashboard" class="btn btn_2 chat_popup">Dashboard</a> </li>
                    @elseif(Auth::user()->role =='2')
                        <li class="fixed_flex"><a href="/municipalAdminDashboard" class="btn btn_2 chat_popup">Dashboard</a> </li>
                    @else
                        <li class="fixed_flex"><a href="/myInvestigatorsProfile" class="btn btn_2 chat_popup">Dashboard</a> </li>
                    @endif
                       
                        <!-- <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a> -->
                    @else
                        <!-- <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif -->
                        <li class="fixed_flex"><a href="{{ route('login') }}" class="btn btn_2 chat_popup">System Login</a> </li>
                    @endauth
                </div>
            @endif
    </ul>
</menu>


<!--HEADER-->
<header class="flex" id="home">
    <article>
        <h1 class="title big">Welcome to <br><em>Secure Track</em> App</h1>
        <p>Secure Track App operates as a web-based computerized data collection and management platform, providing a reliable and tamper-evident environment for evidence management by leveranging digital identifiers and barcodes.</p>
        <!-- <a href="#" class="btn btn_3">Explore more</a> -->
    </article>
    <!-- <section class="flex">
        <aside class="padding_1x">
            <h2 class="sub_title">Admission</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            <a href="#"><i class="fa fa-angle-right"></i></a>
        </aside> 
        <aside class="padding_1x">
            <h2 class="sub_title">Goal</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
          <a href="#"><i class="fa fa-angle-right"></i></a>
        </aside>
        <aside class="padding_1x">
            <h2 class="sub_title">Features</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
           <a href="#"><i class="fa fa-angle-right"></i></a>
        </aside>
    </section> -->
</header>



<!--MAIN-->
<main>

    <!--division_2-->
    <!-- <div class="divisions division_2 flex">
        <section class="flex_content padding_2x">
            <div class="title_header">
                <h2 class="title medium">Notifications</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                <span class="bar_blue"></span>
            </div>
            <marquee direction="up" id="notification" onmouseover="this.stop();" onmouseleave="this.start();">
                <a href="#" class="flex fixed_flex">
                    <figure>
                        <img src="https://i.postimg.cc/tJ7PYG7h/02.jpg" alt="" loading="lazy" />
                    </figure>
                    <article>
                        <h3 class="title">Lilliovi simple & cool web designing root way </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration...</p>
                        <aside class="fixed_flex">
                            <span>
                                <i class="fa fa-calendar"></i>
                                12-08-2023
                            </span>
                            <span>
                                <i class="fa fa-clock-o"></i>
                                20:38 pm
                            </span>
                        </aside>
                    </article>
                </a>
         
           
                <a href="#" class="flex fixed_flex">
                    <figure>
                        <img src="https://i.postimg.cc/tJ7PYG7h/02.jpg" alt="" loading="lazy" />
                    </figure>
                    <article>
                        <h3 class="title">Lilliovi simple & cool web designing root way </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration...</p>
                        <aside class="fixed_flex">
                            <span>
                                <i class="fa fa-calendar"></i>
                                12-08-2023
                            </span>
                            <span>
                                <i class="fa fa-clock-o"></i>
                                20:38 pm
                            </span>
                        </aside>
                    </article>
                </a>
             
                <a href="#" class="flex fixed_flex">
                    <figure>
                        <img src="https://i.postimg.cc/tJ7PYG7h/02.jpg" alt="" loading="lazy" />
                    </figure>
                    <article>
                        <h3 class="title">Lilliovi simple & cool web designing root way </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration...</p>
                        <aside class="fixed_flex">
                            <span>
                                <i class="fa fa-calendar"></i>
                                12-08-2023
                            </span>
                            <span>
                                <i class="fa fa-clock-o"></i>
                                20:38 pm
                            </span>
                        </aside>
                    </article>
                </a>
              
                <a href="#" class="flex fixed_flex">
                    <figure>
                        <img src="https://i.postimg.cc/tJ7PYG7h/02.jpg" alt="" loading="lazy" />
                    </figure>
                    <article>
                        <h3 class="title">Lilliovi simple & cool web designing root way </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration...</p>
                        <aside class="fixed_flex">
                            <span>
                                <i class="fa fa-calendar"></i>
                                12-08-2023
                            </span>
                            <span>
                                <i class="fa fa-clock-o"></i>
                                20:38 pm
                            </span>
                        </aside>
                    </article>
                </a>
            </marquee>
        </section> 
        <section class="flex_content padding_2x" id="event">
            <div class="title_header">
                <h2 class="title medium">Events</h2>
                <p>With a passion and zeal for the lost and hurting world, our church is looking for ways to build bridges to a cynical and jaded society.</p>
                <span class="bar_white"></span>
                <ul class="logo-slider event-slider">
                    <li>
                        <h3 class="title small">Second Anniversary Of Lilliovi</h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots...</p>
                        <aside class="fixed_flex">
                            <span>25<sub>day</sub></span>
                            <span>11<sub>hrs</sub></span>
                            <span>30<sub>min</sub></span>
                            <span>03<sub>sec</sub></span>
                        </aside>
                        <a href="#" class="btn btn_2">Event details</a>
                    </li>
                    <li>
                        <h3 class="title small">Lilliovi At TheWater Mission Award</h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots...</p>
                        <aside class="fixed_flex">
                            <span>25<sub>day</sub></span>
                            <span>11<sub>hrs</sub></span>
                            <span>30<sub>min</sub></span>
                            <span>03<sub>sec</sub></span>
                        </aside>
                        <a href="#" class="btn btn_2">Event details</a>
                    </li>
                </ul>
            </div>
        </section> 
    </div> -->
    
     <!--division_3-->
     <div class="divisions division_3 padding_2x" id="gallery">
       <section class="title_header">
            <h1 class="title">Contribution Towards Society</h1>
            <p>Replenish man have thing gathering lights yielding shall you </p>
            <span class="bar"></span>
        </section>
        <section class="slider padding_0x">
            <ul class="card logo-slider blog-slider">
                <li> 
                    <figure>
                        <img src="https://i.postimg.cc/vBB5JsvW/01.webp" alt="" loading="lazy" />
                    </figure>
                    <article class="padding_1x">
                        <strong class="tag">Documentation</strong>
                        <a href="#" class="title small" id="docux_description1">PNP in action</a>
                        <p id="docux_description2">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical...</p>
                        <!-- <aside class="fixed_flex">
                            <span class="flex-content">
                                <a href="#"><i class="fa fa-calendar"></i> 12-08-2020</a>
                                <a href="#"><i class="fa fa-clock-o"></i> 20:38 pm</a>
                            </span>
                        </aside> -->
                    </article>
                </li>
                <li> 
                    <figure>
                        <img src="https://i.postimg.cc/vBB5JsvW/01.webp" alt="" loading="lazy" />
                    </figure>
                    <article class="padding_1x">
                        <strong class="tag">Documentation</strong>
                       <a href="#" class="title small" id="docux_description1">PNP in action</a>
                        <p id="docux_description2">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical...</p>
                        <!-- <aside class="fixed_flex">
                            <span class="flex-content">
                                <a href="#"><i class="fa fa-calendar"></i> 12-08-2020</a>
                                <a href="#"><i class="fa fa-clock-o"></i> 20:38 pm</a>
                            </span>
                        </aside> -->
                    </article>
                </li>
                <li> 
                    <figure>
                        <img src="https://i.postimg.cc/vBB5JsvW/01.webp" alt="" loading="lazy" />
                    </figure>
                    <article class="padding_1x">
                        <strong class="tag">Documentation</strong>
                       <a href="#" class="title small" id="docux_description1">PNP in action</a>
                        <p id="docux_description2">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical...</p>
                        <!-- <aside class="fixed_flex">
                            <span class="flex-content">
                                <a href="#"><i class="fa fa-calendar"></i> 12-08-2020</a>
                                <a href="#"><i class="fa fa-clock-o"></i> 20:38 pm</a>
                            </span>
                        </aside> -->
                    </article>
                </li>
                <li> 
                    <figure>
                        <img src="https://i.postimg.cc/vBB5JsvW/01.webp" alt="" loading="lazy" />
                    </figure>
                    <article class="padding_1x">
                        <strong class="tag">Documentation</strong>
                       <a href="#" class="title small" id="docux_description1">PNP in action</a>
                        <p id="docux_description2">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical...</p>
                        <!-- <aside class="fixed_flex">
                            <span class="flex-content">
                                <a href="#"><i class="fa fa-calendar"></i> 12-08-2020</a>
                                <a href="#"><i class="fa fa-clock-o"></i> 20:38 pm</a>
                            </span>
                        </aside> -->
                    </article>
                </li>
                <li> 
                    <figure>
                        <img src="https://i.postimg.cc/vBB5JsvW/01.webp" alt="" loading="lazy" />
                    </figure>
                    <article class="padding_1x">
                        <strong class="tag">Documentation</strong>
                       <a href="#" class="title small" id="docux_description1">PNP in action</a>
                        <p id="docux_description2">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical...</p>
                        <!-- <aside class="fixed_flex">
                            <span class="flex-content">
                                <a href="#"><i class="fa fa-calendar"></i> 12-08-2020</a>
                                <a href="#"><i class="fa fa-clock-o"></i> 20:38 pm</a>
                            </span>
                        </aside> -->
                    </article>
                </li>
           
            </ul>
        </section>
    </div> 
    <!--division_3-->
    
    <!--division_4-->
   <!-- <div class="divisions division_4" onmousemove="animate_balls(event)">
        <div class="title_header">
            <h2 class="title medium">We promise best future for your kids</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            <aside class="fixed_flex">
                <a href="#" class="btn btn_1">Explore more</a>
                <i class="fa fa-angle-right"></i>
                <a href="javascript:void(0)">Gallery Portfolio</a>
            </aside>
        </div>
        <div class="cards">
            <span class="ball"></span>
            <span class="ball"></span>
            <span class="ball"></span>
            <span class="ball"></span>
            <section class="fixed_flex">
                <figure class="flex_content">
                    <img src="https://i.postimg.cc/0yF7CRkX/01.jpg" alt="" loading="lazy" />
                </figure>
                <figure class="flex_content">
                    <img src="https://i.postimg.cc/wBNLff3q/02.jpg" alt="" loading="lazy" />
                </figure>
                <figure class="flex_content">
                    <img src="https://i.postimg.cc/7hK2GjtV/03.jpg" alt="" loading="lazy" />
                </figure>
                <figure class="flex_content">
                    <img src="https://i.postimg.cc/tCgPQC7m/04.jpg" alt="" loading="lazy" />
                </figure>
            </section>
        </div> -->
    </div> 
</main>


<!--FOOTER-->
<footer class="padding_4x" id="footer">
    <div class="top_footer flex">
        <section class="flex_content">
            <figure>
                <img src="https://i.postimg.cc/KvwFLrVF/author.png" alt="" loading="lazy" />
            </figure>
        </section>
        <section class="flex_content padding_2x">
            <h2 class="title medium">Principal Message</h2>
            <p>"Introducing Secure Track, the cutting-edge web-based system meticulously crafted to safeguard the integrity of evidence chain of custody within the Philippine National Police. With robust security measures and advanced tracking functionalities, Secure Track ensures the irrefutable preservation and accountability of crucial evidence, empowering law enforcement with the trust and reliability they need to uphold justice with confidence."</p>
        </section>
    </div> 
  <div class="footer_body flex" id="footer_1">
    <section class="flex_content padding_1x">
      <figure class="logo fixed_flex">
            <!-- <img src="https://i.postimg.cc/02NrFwT5/canva.png" alt=""> -->
            <img src="{{ asset('images/PNP.png') }}" alt="PNP Logo">
            <figcaption>
                <strong class="title">Secure Track</strong> App
            </figcaption>
        </figure>
        <a href="#">
            <i class="fa fa-map-marker"></i>
            National Headquarters Building Philippine National Police, Camp Bgen Rafael T Crame, Brgy Bagong Lipunan, Quezon City.
            <!-- Plot No: 431 First floor, Kakrola Housing Complex, Opp Pillar No: 794, , Near Dwarka More Metro Station, Delhi 110078.  -->
        </a>
        <a href="emailto:info@schotest.com">
            <i class="fa fa-envelope-o"></i>
            test@gmail.com
        </a>
        <a href="tel:9315514145">
            <i class="fa fa-headphones"></i>
            9315514145
        </a>
    </section>
    <!-- <section class="flex_content padding_1x">
      <h3>Quick Links</h3>
      <a href="#">Admission</a>
      <a href="#">Prospectus</a>
      <a href="#">Student registration</a>
      <a href="#">Staff registration</a>
    </section> -->
    <section class="flex_content padding_1x">
      <h3>Quick Links</h3>
      <a href="#">About us</a>
      <a href="#">contact us</a>
      <a href="#">Raise a ticket</a>
      <a href="#">Terms & conditions</a>
    </section>
    <section class="flex_content padding_1x">
      <h3>Newsletter</h3>
      <p>You can trust us. we only send important notifications related to school.</p>
      <fieldset class="fixed_flex">
        <input type="email" name="newsletter" placeholder="Your Email Address">
        <button class="btn btn_2">Subscribe</button>
      </fieldset>
    </section>
  </div>
  <div class="flex">
    <section class="flex-content padding_1x">
      <p>Copyright ©2023 All rights reserved || website name</p>
    </section>
    <section class="flex-content padding_1x">
      <a href="#"><i class="fa fa-facebook"></i></a>
      <a href="#"><i class="fa fa-twitter"></i></a>
      <a href="#"><i class="fa fa-dribbble"></i></a>
      <a href="#"><i class="fa fa-linkedin"></i></a>
    </section>
  </div>
</footer>

<style>
   footer{
    margin-top:-5em;
   }
</style>
<!--ADDITIONAL-->
<div class="overlay"></div>
<div class="cursor"></div>

</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const scrollLinks = document.querySelectorAll('a[href^="#"]');
        scrollLinks.forEach(link => {
            link.addEventListener("click", e => {
                e.preventDefault();
                const targetId = link.getAttribute("href");
                document.querySelector(targetId).scrollIntoView({
                    behavior: "smooth"
                });
            });
        });
    });
</script>

<script src="{{ asset('js/welcome1.js') }}"></script>

</html>