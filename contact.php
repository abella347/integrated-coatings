<?php 

include 'db.php';

// contact form

if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST") { 
    //filter, validate and sanitize the data inputed in the the form 

    $firstname = filter_input(INPUT_POST, 'firstname' , FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $pnumber = filter_input(INPUT_POST, 'number', FILTER_VALIDATE_INT);
    $company_name = filter_input(INPUT_POST, 'company-name', FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

    //query to insert the data gotten from the form into the database
    $sql = "INSERT INTO users (firstname, email, phonenumber, companyname, longmessage) VALUES ('$firstname', '$email', '$pnumber', '$company_name', '$message')";
    
    mysqli_query($conn, $sql); //execute the sql query

}

// newsletter

if(isset($_POST['newsubmit']) && $_SERVER['REQUEST_METHOD'] === "POST"){
    $newemail = filter_input(INPUT_POST, 'newemail', FILTER_VALIDATE_EMAIL);

    $query = "INSERT INTO newsletter (email) VALUES ('$newemail')";

    mysqli_query($conn, $query);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
      integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="about.css" />
    <link rel="stylesheet" href="contact.css" />
    <title>Document</title>
  </head>

  <body>
    <div class="video">
      <video autoplay muted loop playsinline class="bg-video">
        <source
          src="./INTEGRATED-COATINGS/ICL-Images/contact.mp4"
          type="video/mp4"
        />
      </video>

      <nav>
        <!-- <div class="nav-container"></div> -->
        <div class="logo-sec">
          <div class="logo-sec-img">
            <img src="./INTEGRATED-COATINGS/ICL-Images/logo.png" alt="" />
          </div>
          <i
            class="fa fa-bars mobile-nav"
            aria-hidden="true"
            aria-controls="navlist"
            aria-expanded="false"
          ></i>
          <button><a href="contact.php">contact us</a></button>
        </div>

        <div class="text-sec">
          <ul id="navlist" class="navlist flex" data-visible="false">
            <i class="fa fa-times close-nav" aria-hidden="true"></i>
            <span>
              <li><a class="text-sec-a" href="index.html">home</a></li>
            </span>

            <span>
              <li><a class="text-sec-a" href="about.html">about</a></li>
            </span>
            <li>
              <a class="text-sec-a" id="product-link" href="#"
                >products
                <i
                  class="fa fa-angle-down product-icon arrow-up"
                  aria-hidden="true"
                ></i>
              </a>
              <!-- ===== MAIN PRODUCT DROPDOWN ===== -->
              <div class="product-dropdown" id="product-dropdown">
                <div class="dropdown-content">
                  <!-- Paints -->
                  <div class="dropdown-item" id="paints-item">
                    <h3>Paints <i class="fa fa-angle-down"></i></h3>
                    <div class="inner-dropdown inner-dropdown-a">
                      <ul>
                        <li><a href="international.html">international Paint</a></li>
                        <li><a href="carboline.html">carboline Paint</a></li>
                        <li><a href="jotun.html">jotun Paint</a></li>
                        <li><a href="sigma.html">sigma Paint</a></li>
                        <li><a href="hempel.html">hempel Paint</a></li>
                      </ul>
                    </div>
                  </div>

                  <div class="dropdown-item">
                    <h3>
                      <a class="ab-link" href="abrasive.html">abrasive</a>
                    </h3>
                  </div>

                  <div class="dropdown-item" id="coatings-item">
                    <h3>Equipment <i class="fa fa-angle-down"></i></h3>
                    <div class="inner-dropdown inner-dropdown-b">
                      <ul>
                        <li><a href="safety.html">Safety </a></li>
                        <li><a href="painting.html">spraying machine</a></li>
                        <li><a href="blasting.html">blasting machine</a></li>
                        <li>
                          <a href="inspection.html">inspection Equipment</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a class="text-sec-a" href="contact.php"
                >contact us <i class="fa fa-phone phone" aria-hidden="true"></i
              ></a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- text section  -->
      <div class=" contact-hero">
        <h2 class="fade-in-up">
          Send Us Your Feedback, <br />
          We Love Hearing It!
        </h2>
        <p class="fade-in-up delay-1">
          Our mission is timely delivery of high quality materials of excellent
          <br />
          value.
        </p>
      </div>
    </div>

    <!-- SECTION 1 -->

    <section>
      <div class="section1">
        <div class="contact-header">
          <h2 class="fade-in-up delay-1">get in touch</h2>
          <p class="fade-in-up delay-2">
            Ready to take your surface preparation to the next level? Our team
            of experts is here to assist you
            <br />
            with finding the perfect blasting equipment and solutions for your
            specific needs. <br />
            Contact us today to discuss your requirements and discover how
            Integrated coatings Nigeria can make a difference.
          </p>
        </div>

        <div class="all-box">
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-box">
              <h3 class="fade-in-up delay-3">drop your details!</h3>
              <div class="firstname">
                <input
                  type="text"
                  placeholder="enter your firstname"
                  name="firstname"
                  id="firstname"
                />
              </div>

              <div class="email">
                <input
                  type="email"
                  placeholder="enter your email"
                  name="email"
                />
              </div>

              <div class="number">
                <input
                  type="number"
                  placeholder="enter your phone number"
                  name="number"
                />
              </div>

              <div class="company-name">
                <input
                  type="text"
                  placeholder="enter your companys name"
                  name="company-name"
                />
              </div>

              <div class="textarea">
                <textarea
                  name="message"
                  id=""
                  placeholder="type here"
                ></textarea>
              </div>

              <button type="submit" name="submit">submit</button>
            </div>
          </form>

          <div class="contact-img">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.4398957715043!2d7.0997930740199315!3d4.865721340206869!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10682d02adac1af9%3A0x4566334e4e628119!2sIntegrated%20Coating%20Services!5e0!3m2!1sen!2sng!4v1762966377745!5m2!1sen!2sng"
              width="600"
              height="450"
              style="border: 0; width: 100%; border-radius: 12px"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            >
            </iframe>
          </div>
        </div>
      </div>
    </section>

    <!-- section 2 -->

    <section>
      <div class="section6 about-section6 contact-sec2">
        <div class="section6-header contact-sec2-header">
          <h2 class="fade-in-up">Contact Info</h2>
          <p class="fade-in-up delay-1">
            We’re here to help! Please feel free to reach out with any questions
            or requests.
          </p>
        </div>

        <div class="about-section6-box contact-sec2-box">
          <div class="sec6-box flow-box delay-1">
            <div class="sec6-icontexts">
              <i class="fa fa-phone" aria-hidden="true"></i>

              <h3>call support</h3>
              <p>+234 8053166942</p>
              <p>+234 8033399879</p>
            </div>
            <div class="sec6-second">
              <p>assistance hours:</p>
              <p>Monday - Friday 7am to 5pm WAT</p>
            </div>
          </div>
          <div class="sec6-box flow-box delay-2">
            <div class="sec6-icontexts">
              <i class="fa fa-envelope-o" aria-hidden="true"></i>
              <h3>email support</h3>
              <p>sales@integratedcoatings.com</p>
            </div>
          </div>
          <div class="sec6-box flow-box delay-3">
            <div class="sec6-icontexts">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <h3>address</h3>
              <p>
                KLM 17, Aba PortHarcourt Express way Port Harcourt, Rivers
                State, Nigeria
              </p>
            </div>
            <div class="sec6-second">
              <p>assistance hours:</p>
              <p>Monday - Friday 7am to 5pm WAT</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <section>
        <div class="section9">
          <div class="section9-all">
            <div class="section9-logo">
              <div class="section9-logoimg">
                <img src="./INTEGRATED-COATINGS/ICL-Images/logo.png" alt="" />
              </div>
            </div>
            <div class="section9-boxes">
              <div class="section9-smallboxes">
                <div class="section9-smalltexts">
                  <h2>contact info</h2>
                  <p class="sec9-address">
                    KLM 17, Aba PortHarcourt Express way Port Harcourt, Rivers
                    State, Nigeria
                  </p>

                  <div class="section9-icontexts">
                    <div class="icontexts-1">
                      <i class="fa fa-phone" aria-hidden="true"></i>

                      <div class="sec9-phone">
                        <p>phone:</p>
                        <span>+234 8053166942</span>
                      </div>
                    </div>

                    <div class="icontexts-1">
                      <i class="fa fa-mobile" aria-hidden="true"></i>

                      <div class="sec9-phone">
                        <p>mobile:</p>
                        <span>+234 8033399879</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="section9-smallboxes">
                <div class="section9-smalltexts">
                  <h2>find out more about us</h2>

                  <div class="sec9-icons">
                    <span
                      ><i class="fa fa-facebook-square" aria-hidden="true"></i
                    ></span>
                    <span
                      ><i class="fa fa-instagram" aria-hidden="true"></i
                    ></span>
                    <span
                      ><i class="fa fa-linkedin" aria-hidden="true"></i></span
                    ><br />
                  </div>

                  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                  <div class="sec9-label">
                    <div class="floating-label">
                      <input id="email" type="email" name= "newemail"required placeholder=" " />
                      <label for="email">Enter your email address</label>
                    </div>
                  </div>

                  <button class="sec9-btn" type="submit" name="newsubmit" >submit</button>
                  </form>
                </div>
              </div>

              <div class="section9-smallboxes">
                <div class="section9-smalltexts">
                  <h2>marine Coatings</h2>

                  <div class="sec9-p-texts">
                    <p>
                      <a
                        href="https://www.ppgpmc.com/marine/new-build"
                        target="_blank"
                        rel="noopener noreferrer"
                        >new build</a
                      >
                    </p>
                    <p>
                      <a
                        href="https://www.ppgpmc.com/marine/dry-docking"
                        target="_blank"
                        >dry docking</a
                      >
                    </p>
                    <p>
                      <a
                        href="https://www.ppgpmc.com/marine/inland-marine"
                        target="_blank"
                        rel="noopener noreferrer"
                        >Inland Marine</a
                      >
                    </p>
                    <p>
                      <a
                        href="https://www.ppgpmc.com/marine/sea-stock"
                        target="_blank"
                        rel="noopener noreferrer"
                      >
                        Sea Stock</a
                      >
                    </p>
                    <p>
                      <a
                        href="https://www.ppgpmc.com/marine/cargo-hold"
                        target="_blank"
                        rel="noopener noreferrer"
                      >
                        Cargo Hold</a
                      >
                    </p>
                    <p>
                      <a
                        href="https://www.ppgpmc.com/marine/cargo-tank"
                        target="_blank"
                        rel="noopener noreferrer"
                      >
                        Cargo Tank</a
                      >
                    </p>
                    <p>
                      <a
                        href="https://www.ppgpmc.com/marine/antifouling-and-fouling-release"
                        target="_blank"
                        rel="noopener noreferrer"
                      >
                        Antifouling & Fouling Release</a
                      >
                    </p>
                    <p>
                      <a
                        href="https://www.ppgpmc.com/marine/water-ballast-tank"
                        target="_blank"
                        rel="noopener noreferrer"
                      >
                        Water Ballast Tank</a
                      >
                    </p>
                  </div>
                </div>
              </div>
              <div class="section9-smallboxes">
                <div class="section9-smalltexts">
                  <h2>Protective Coatings</h2>

                  <div class="sec9-p-texts">
                    <p>
                      <a
                        href="https://www.ppgpmc.com/protective/infrastructure-and-rail"
                        target="_blank"
                        rel="noopener noreferrer"
                        >Infrastructure & Rail</a
                      >
                    </p>
                    <p>
                      <a
                        href="https://www.ppgpmc.com/protective/mining/products"
                        target="_blank"
                        rel="noopener noreferrer"
                        >Mining</a
                      >
                    </p>
                    <p>
                      <a
                        href="https://www.ppgpmc.com/protective/oil-gas-and-chemical"
                        target="_blank"
                        rel="noopener noreferrer"
                        >Oil, Gas & Chemical</a
                      >
                    </p>
                    <p>
                      <a
                        href="https://www.ppgpmc.com/protective/power"
                        target="_blank"
                        rel="noopener noreferrer"
                        >Power</a
                      >
                    </p>
                    <p>
                      <a
                        href="https://www.ppgpmc.com/protective/water-and-wastewater"
                        target="_blank"
                        rel="noopener noreferrer"
                        >Water & Wastewater</a
                      >
                    </p>
                    <p>
                      <a
                        href="https://www.ppgpmc.com/protective/fire-protection"
                        target="_blank"
                        rel="noopener noreferrer"
                        >Fire protection
                      </a>
                    </p>
                    <p>
                      <a
                        href="https://www.ppgpmc.com/protective/high-temperature-resistance"
                        target="_blank"
                        rel="noopener noreferrer"
                        >High-Temperature Resistance
                      </a>
                    </p>
                    <p>
                      <a
                        href="https://www.ppgpmc.com/protective/tank-lining"
                        target="_blank"
                        rel="noopener noreferrer"
                        >Tank Lining
                      </a>
                    </p>
                    <p>
                      <a
                        href="https://www.ppgpmc.com/protective/flooring"
                        target="_blank"
                        rel="noopener noreferrer"
                        >Flooring</a
                      >
                    </p>
                  </div>
                </div>
              </div>
              <div class="section9-smallboxes">
                <div class="section9-smalltexts">
                  <h2>Achievement</h2>

                  <div class="sec9-lasttext">
                    <p>
                      We maintains a leadership role in efficient services
                      delivery. A pathfinder in this segment of the industry.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div class="section10">
          <div class="section10-all">
            <div class="section10boxes">
              <p>
                Copyright © 2025 - Integrated Coatings Services | All rights
                reserved
              </p>
            </div>
            <div class="section10boxes-2">
              <p>Designed and Developed by</p>
              <div class="sec10-imglogo">
                <a
                  href="https://wa.me/2348079612241?text=Hello%20C-Tech%20Solutions,%20I%20would%20like%20to%20make%20an%20enquiry"
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  <img
                    src="./INTEGRATED-COATINGS/ICL-Images/mylogo.png"
                    alt=""
                  />
                </a>
              </div>
            </div>

            <button id="backToTop" aria-label="Back to top">
              <i class="fa fa-arrow-up" aria-hidden="true"></i>
            </button>
          </div>
        </div>
      </section>
    </footer>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="contact.js"></script>
  <script src="animation.js"></script>
</html>
