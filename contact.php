<?php include_once ('elements/header.php') ?>

    <style>
        @media (min-width: 1024px) {
            .main-header_professional.fixed-header .main-box {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                width: 100%;
                z-index: 9999;
            }
        }
    </style>

<div class="page-wrapper">
 	
        <!-- Preloader -->
        <!-- <div class="preloader"></div> -->
        
         <?php include_once('elements/header-menu.php'); ?>
    
    <!--Page Title-->
    <section class="page-title_professional" style="background-image:url(assets/images/background/4.jpg);">
    	<div class="auto-container">
        	<h1>CONTACT US</h1>
        </div>
    </section>
    
    <!--Breadcrumb-->
    <div class="breadcrumb-outer_professional">
    	<div class="auto-container">
        	<ul class="bread-crumb text-center">
            	<li><a href="index.html">Home</a> <span class="fa fa-angle-right"></span></li>
                <li>CONTACTUS</li>
            </ul>
        </div>
    </div>
    <!--End Page Title-->
    
    <!--Contact Form Section-->
    <section class="contact-form-section">
    	<div class="auto-container">
            <div class="sec-title centered">
                <h2>GET IN TOUCH</h2>
                <div class="separator"></div>
                <div class="text">The first mate and his Skipper too will do their very best to make the others comfortable in their tropic island nest</div>
            </div>
        	<div class="row clearfix">
            	<!--Form Column-->
                <div class="form-column col-md-8 col-sm-8 col-xs-12 pull-right">
                	
                    <!-- contact Form -->
                    <div class="contact-form">
                            
                        
                        <!--contact Form-->
                        <form method="post" action="sendemail.php" id="contact-form">
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="text" name="username" placeholder="Name" required>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <input type="text" name="subject" placeholder="Subject">
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                    <textarea name="message" placeholder="Message"></textarea>
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form">Submit</button>
                                </div>
                                
                            </div>
                        </form>
                            
                    </div>
                    <!--End Contact Form -->
                    
                </div>
                <!--image column-->
                <div class="contact-section col-md-4 col-sm-4 col-xs-12 pull-left">
                    <h4>Contact Details</h4>
                	<ul class="contact-info">
                        <li><div class="icon-box"><span class="fa fa-phone"></span></div>+971 569354803</li>
                        <li><div class="icon-box"><span class="fa fa-envelope-o"></span></div>support@dviinternational.com</li>
                        <li><div class="icon-box">
                            <span class="fa fa-map-marker"></span>
                        </div>

                        <b>DVI INTERNATIONAL FZE LLC</b>
                        <p>Dubai Address : Business center,sharjah publishing city free zone.sharjah,<br>united Arab Emirates</p>
                        <b>DVI INTERNATIONAL PTE. LTD.</b>
                        <p>Singapore Address - 531 Upper Cross street, #02-11,Hong Lim Complex, <br> Singapore-050531</p>
                    </li>
                    </ul>
                </div>
                
            </div>
        </div>
    </section>
    
    <!-- Google Map Section -->
    <section class="map-section">
        <div class="map-outer">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3606.5322780759993!2d55.456023576085116!3d25.31991392671786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5f26195b7e6b%3A0xc0f6d4eb509bdf75!2sSPC%20Free%20Zone%20-%20Business%20Setup%20In%20Sharjah%2C%20UAE!5e0!3m2!1sen!2sin!4v1791978219799!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>
    </section>

    <style>
            /* Google Map Section */
            .map-section {
                width: 100%;
                padding: 0;
                margin: 0;
            }

            .map-outer {
                width: 100%;
                height: 450px;
                overflow: hidden;
                border-radius: 12px;
                background: #f4f4f4;
                box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            }

            .map-outer iframe {
                display: block;
                width: 100%;
                height: 100%;
                border: 0;
            }

            /* Responsive Design */
            @media (max-width: 767px) {
                .map-outer {
                    height: 320px;
                    border-radius: 8px;
                }
            } 
    </style>
    
    <?php include_once('elements/footer.php'); ?>