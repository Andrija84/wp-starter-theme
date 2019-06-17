<?php	

    /*
		Template Name: NEW HOME 
	*/
	
 get_header(); ?> 
<body <?php body_class(); ?>>

<?php get_template_part( 'nav' ); // Navigation bar (nav.php) ?>
                
<div class="homepage">

            <div class="container homepage-services-list">
                    <div style="height:32px;"></div>
                    <h2><?php the_field('title', 5); ?></h2>
                    <div style="height:32px;"></div>
					<div class="homepage-service-item-1" data-aos="fade-up" data-aos-delay="100" data-aos-duration="250" data-aos-easing="ease-in" data-aos-once="false" data-aos-offset="0"> 
						<h6><span style="color:#a9d3e0!important;margin-right:5px;">//</span><?php the_field('title_1', 5); ?></h6>
						<i class="fas fa-caret-down"></i><div class="fa-caret-down-dotts"></div>
						<p><?php the_field('text_1', 5); ?></p>
					</div>
					<div class="homepage-service-item-2" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500" data-aos-easing="ease-in" data-aos-once="false" data-aos-offset="0"> 
						<h6><span style="color:#a9d3e0!important;margin-right:5px;">//</span><?php the_field('title_2', 5); ?></h6>
						<i class="fas fa-caret-down"></i><div class="fa-caret-down-dotts"></div>
						<p><?php the_field('text_2', 5); ?></p>
					</div>
                    <div class="homepage-service-item-3" data-aos="fade-up" data-aos-delay="500" data-aos-duration="750"  data-aos-easing="ease-in" data-aos-once="false"> 
						<h6><span style="color:#a9d3e0!important;margin-right:5px;">//</span><?php the_field('title_3', 5); ?></h6>
						<i class="fas fa-caret-down"></i><div class="fa-caret-down-dotts"></div>
						<p><?php the_field('text_3', 5); ?></p>
					</div>
                    <div class="homepage-service-item-4" data-aos="fade-up" data-aos-delay="700" data-aos-duration="1000" data-aos-easing="ease-in"data-aos-once="false"> 
						<h6><span style="color:#a9d3e0!important;margin-right:5px;">//</span><?php the_field('title_4', 5); ?></h6>
						<i class="fas fa-caret-down"></i><div class="fa-caret-down-dotts"></div>
						<p><?php the_field('text__4', 5); ?></p>
					</div>
                                     
            </div>
			<div style="height:96px;"></div>
			<div class="container" style="background: #fff;">
			
			 <div class="homepage-portfolio-container-1">
				    <div class="homepage-portfolio-item-1-image"><img src="http://localhost/test/wp-content/uploads/2019/06/homepage-portfolio-1.jpg"></img></div>
					
					<div class="homepage-portfolio-item-1-desc">
						<div class="homepage-portfolio-item-1-desc-inner">
						<div class="homepage-portfolio-item-1-desc-text">einzigartig<br> 
																		ausgefallenen<br> 
																		individuell<br>
																		mutig
					    </div>	
						<div class="homepage-portfolio-item-1-desc-button"><a href="#">mehr erfahren</a></div>				   
						</div>				   
				    </div>
			
				</div>
				<div class="homepage-portfolio-container-2">
				
				  <div class="homepage-portfolio-item-2-image-background" data-aos="zoom-in" data-aos-once="false" data-aos-easing="ease-in-out"></div>
				  <div class="homepage-portfolio-item-2-image" data-aos-duration="1000" data-aos="fade-right" data-aos-once="false" data-aos-easing="ease-in-out">
				
				  <img src="http://localhost/test/wp-content/uploads/2019/06/homepage-portfolio-2.jpg"></img>
				  </div>
				  
				  <div class="homepage-portfolio-item-2-desc">
				  <h1 class="text1">PRINT</h1>
				  <h1 class="text2">WEB</h1>
				  <h1 class="reduced">
				               <span data-aos="flip-up">html</span><br>
				                <span data-aos="flip-up">css</span><br>
							    <span data-aos="flip-up">js</span><br>
							    <span data-aos="flip-up">php</span><br>
							    <span data-aos="flip-up">cms</span></h1>
				  </div>				
			    </div>
				
				<div class="homepage-portfolio-container-3">
				     <div class="homepage-portfolio-container-3-desc">
					 <a href="#"><div class="homepage-portfolio-container-3-desc-button">mehr erfahren</div></a>
					 </div>
				     <div class="homepage-portfolio-container-3-image-background" data-aos="zoom-in" data-aos-once="false" data-aos-easing="ease-in-out"></div>
					 <img src="http://localhost/test/wp-content/uploads/2019/06/homepage-portfolio-2-1.png" data-aos-duration="1000" data-aos="fade-right" data-aos-once="false" data-aos-easing="ease-in-out"></img>					 
				</div>				
				</div>  <!-----HOMEPAGE CONTAINER END-------->
				
				<div class="container">
				<div class="homepage-portfolio-container-4">
				<h3>Zeit für Veränderungen</h3>
				<h6>Innovatives Grafikdesign, individuelles Web Design, durchdachtes Produkt- und<br>
                   Verpackungsdesign, komplexe Bildbearbeitung & Composing.</h6>
				<div style="height:32px;"></div>
				<p>Sie haben Interesse an einzigartigem Design und einer ausgefallenen, außergewöhnlichen Darstellung Ihres Unternehmens?</p>
                <p>Oompa Design in Stuttgart bietet Ihnen ein überzeugendes Kreativ-Paket zu einem fairen Preis. Zu unseren vielseitigen 
			   	 Kompetenzen zählen innovatives Grafikdesign, individuelles Web Design, durchdachtes Produkt- und Verpackungsdesign, 
				 komplexe Bildbearbeitung/Composing, spürbar realistische 3D Animation sowie gestochen scharfe und hochauflösende Fotografie.</p>
                <p>Wir arbeiten schnell, effizient und kostenbewusst. Lernen Sie uns kennen und lassen Sie sich ein individuelles Angebot erstellen.</p>   
			    </div>
				</div>
				
			<!-- Swiper -->
			<div class="container homepage">
			<div id="logos" class="homepage-logos-container container">
			<div class="logo-swiper-container">
			<div class="swiper-wrapper">
			  <div class="swiper-slide">								
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/1.png" alt="" />				
			  </div>
			  <div class="swiper-slide">									
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/2.png" alt="" />				
			  </div>
			  <div class="swiper-slide">								
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/3.png" alt="" />	
			  </div>
			  <div class="swiper-slide">								
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/4.png" alt="" />			
			  </div>
			  <div class="swiper-slide">						
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/5.png" alt="" />			
			  </div>
			  <div class="swiper-slide">							
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/6.png" alt="" />			
			  </div>
			  <div class="swiper-slide">									
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/7.png" alt="" />	
			  </div>
			  <div class="swiper-slide">						
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/8.png" alt="" />	
			  </div>
			  <div class="swiper-slide">							
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/9.png" alt="" />	
			  </div>
					<div class="swiper-slide">								
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/10.png" alt="" />				
			  </div>
			  <div class="swiper-slide">									
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/11.png" alt="" />				
			  </div>
			  <div class="swiper-slide">								
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/12.png" alt="" />	
			  </div>
			  <div class="swiper-slide">								
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/13.png" alt="" />			
			  </div>
			  <div class="swiper-slide">						
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/14.png" alt="" />			
			  </div>
			  <div class="swiper-slide">							
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/15.png" alt="" />			
			  </div>
			  <div class="swiper-slide">									
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/16.png" alt="" />	
			  </div>
			  <div class="swiper-slide">						
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/17.png" alt="" />	
			  </div>
			  <div class="swiper-slide">							
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/18.png" alt="" />	
			  </div>
			  <div class="swiper-slide">								
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/19.png" alt="" />				
			  </div>
			  <div class="swiper-slide">									
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/20.png" alt="" />				
			  </div>
			  <div class="swiper-slide">								
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/21.png" alt="" />	
			  </div>
			  <div class="swiper-slide">								
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/22.png" alt="" />			
			  </div>
			  <div class="swiper-slide">						
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/23.png" alt="" />			
			  </div>
			  <div class="swiper-slide">							
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/24.png" alt="" />			
			  </div>
			  <div class="swiper-slide">									
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/25.png" alt="" />	
			  </div>
			  <div class="swiper-slide">						
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/26.png" alt="" />	
			  </div>
			  <div class="swiper-slide">							
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/27.png" alt="" />	
			  </div>
				  <div class="swiper-slide">							
						<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/28.png" alt="" />	
			  </div>

			</div>
			<!-- Add Arrows -->
			<div class="swiper-button-next swiper-button-white"></div>
			<div class="swiper-button-prev swiper-button-white"></div>
			</div>
			</div>	<!-----KRAJ LOGOS-------->	
			</div>
				
				
            </div>  <!-----HOMEPAGE CONTAINER END-------->	
			
			<!---- KONTAKT -------->
			<div id="contact">				
				
				<!----<div class="parallax2"></div>-------->
				<div class="container z-index">	
					<div class="" data-aos="fade-up" data-aos-once="false" data-aos-easing="ease-in-out" data-aos-duration="1000">
						<div class="contact-wrap">
							<p><i class="fas fa-phone"></i><span><strong>Rufen sie uns an:</span></strong>  <a href="tel:+49 (0)711 305 42 020">+49 (0)711 305 42 020</a><br>
							   <i class="fas fa-map-marker-alt"></i><span><strong>Besuchen sie uns:</strong></span>  Teinacher Str. 7B, 70372 Stuttgart</p>
							 <div style="height:32px;"></div>
                             <?php echo do_shortcode('[contact-form-7 id="1131" title="Kontakt Form"]'); ?>
						</div>
					</div>	
				</div>
				
			</div><!----- KRAJ KONTAKT -------->	
			
<?php	get_footer(); ?> 