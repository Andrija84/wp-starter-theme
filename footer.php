            <div id="footer">
				
				<div class="container">
					<div class="footer-left" style="">
						Teinacher Str. 7B, D-70372 Stuttgart <br>
					    <a href="mailto:info@oompa.de">info@oompa.de</a> | Tel.: <a href="tel:+49 (0)711 305 42 020">+49 (0)711 305 42 020</a>
					</div>
                    <div class="footer-right" style="">
					<ul class="footer-menu-list">
								<?php wp_nav_menu(array(
											'theme_location'   => 'footer_menu',
											'items_wrap' => '%3$s',  //No ul wrap class
											'container' => '%3$s'    //No container wrap class											
								)); ?>
                    </ul>								
					</div>
                     
					<hr></hr>
                    
                    
                    <div class="footer-left" style="">
						<strong style="color:#000;">OOMPA DESIGN</strong> © 2019 Alle Rechte vorbehalten.
					</div>
                    <div class="footer-right" style="">
						
                        <a href="#" target="blank">
						<i class="fab fa-facebook-square"> | </i>
						</a>
                      
                        <a href="#" target="blank">
						<i class="fab fa-xing-square"> | </i>
						</a>
                   
                        <a href="#" target="blank">
						<i class="fab fa-instagram"></i></a>

					</div>
                    
                    
                    
				</div>	
			</div>


<?php wp_footer(); ?>
</body>
</html> 
