<?php

/*
	Template Name: Custom Home Page
*/

get_header();  ?>

<div class="main">
  <div class="container row homePage">

    <?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
			<!-- ==============
			header section
			============== -->

			<section class="headerLogo">
				<div class="animateLogo">
		<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			viewBox="0 0 64.702 60.623" enable-background="new 0 0 64.702 60.623" xml:space="preserve">
		<path id="path3" fill="none" stroke="#000000" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
			M28.612,5.949l33.994,14.164 M28.612,5.949H13.314 M13.314,20.113L2.267,43.06 M13.314,5.949L2.267,43.06"/>
		<path id="path4" fill="none" stroke="#000000" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
			M62.606,20.113L34.278,43.06 M62.606,20.113H13.314 M13.314,5.949v14.164 M34.278,43.06l16.656,14.73"/>
		<path id="path1" fill="none" stroke="#000000" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
			M28.612,5.949L13.314,20.113 M13.314,20.113L34.278,43.06 M2.267,43.06h32.012 M2.267,43.06l16.005,14.73"/>
		<path id="path2" fill="none" stroke="#000000" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
			M18.272,57.79h32.663 M62.606,20.113L50.935,57.79"/>
		</svg>

				</div>
	      <h2><?php the_title(); ?></h2>
	      <h3>Front-End Developer</h3>
      </section>

			
			<?php $headerImage = get_post_thumbnail_id(); 
			$headerImageUrl = wp_get_attachment_image_src( $headerImage, 'full', true );
			$headerIMG = $headerImageUrl[0];
			?>
      
      <!-- ===================
      background image section
      ==================== -->

      <section style="background-image: url('<?php echo $headerIMG ?>')" class="heroImage">
      	
      </section>

			<!-- ==============
			portfolio section
			============== -->
			<section id="portfolio" class="portfolio clearfix">

					<div class="innerWrapper">
					<h3 class="headerLine"><span class="linethrough">Featured Work</span></h3>
						<?php $latestPosts = new WP_Query(array(
						'post_type' => 'portfolio', // we only want blog posts
						'posts_per_page' => 5,
						'order_by' => "asc"
					)); ?>
					
					<?php if ($latestPosts->have_posts()) while($latestPosts->have_posts()) : $latestPosts->the_post(); ?>
						<div class="featuredPost clearfix">

							  <?php if ( has_post_thumbnail() ) : ?>
							  	<div class="portImage">
							  	<?php //the_post_thumbnail('full'); ?>
							  	<a href="<?php the_field('live_demo') ?>" target="_blank"><?php the_post_thumbnail('full') ?></a>
							  	</div>
							  	  
						  	  <div class="portfolioInfo">  
						  	    <div class="portContent">
						  		    <h2><?php the_title(); ?></h2>
						  		    
						  		    <?php if ( get_field( 'client_name' ) ): ?>
						  		      <p><strong>Client Name:</strong> <?php the_field('client_name'); ?></p>
						  		    <?php endif; ?> 
						  		    
						  		    <?php the_content(); ?>


						  		    <h3>Technologies Used:</h3>
						  		    
						  		      <?php $terms = get_the_terms($post->ID, 'technologies' ); ?>
						  		      <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
						  		              <ul>
						  		                  <?php foreach ( $terms as $term ) : ?>
						  		                  <li><?php echo $term->name ?></li>
						  		                  <?php endforeach ?>
						  		           </ul>
						  		    

						  		    <div class="viewOn">
											  <?php if ( get_field( 'live_demo') ): ?>
											    <a href="<?php the_field('live_demo') ?>" target="_blank">View Live</a>
											  <?php endif; ?>
											  
											  <?php if ( get_field( 'github_link' ) ): ?>
											    <a href="<?php the_field('github_link') ?>" target="_blank">View On GitHub</a>
											  <?php endif; ?>
							  		      <?php endif ?>
						  		    </div>  
						  	    </div>
						  	  </div> <!-- /.portfolioOverlay -->
							  <?php endif; ?>
							 
							</div> <!-- /.featuredPost -->

					<?php endwhile; // end custom loop ?>
					<?php wp_reset_postdata(); // return end back to regular scheduled programming ?>
					</div>
			</section>

			<!-- ==============
			about section
			============== -->
			<section id="about" class="about">
				<div class="innerWrapper">
						<h3 class="headerLine"><span class="linethrough">About Me</span></h3>
						<div class="aboutImg">
							<?php $image = get_field('about_image'); ?>
							 <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['title']; ?>">
						</div>
						
						<div class="aboutContent">
							<?php the_field('about'); ?> 
							<!-- <a target="_blank" href="<?php bloginfo('template_directory'); ?>/heatherbanksresume.pdf" class="resume">View Resume</a> -->
							<a target="_blank" href="http://heatherbanks.ca/heatherbanksresume.pdf" class="resume">View Resume</a>
						</div>
				</div>
			</section>

			<!-- ==============
			skills section
			============== -->
			<section class="skills">
				<div class="innerWrapper">
					<div class="skillsIHave">
						<h3>I Love Using</h3>
						
					<?php if ( have_rows('skills') ): ?>
						<ul>
							<?php while ( have_rows('skills') ): the_row(); ?>
							<li> <?php the_sub_field('skills_i_have') ?> </li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>
					<?php wp_reset_postdata(); // return end back to regular scheduled programming ?>

					</div>

					<div class="skillsImLearning">
						<h3>I'm Learning</h3>
						
						<?php if ( have_rows('skills') ): ?>
							<ul>
								<?php while ( have_rows('skills') ): the_row(); ?>
								<li> <?php the_sub_field('skills_im_learning') ?> </li>
							<?php endwhile; ?>
							</ul>
						<?php endif; ?>
						<?php wp_reset_postdata(); // return end back to regular scheduled programming ?>	

					</div>

					<div class="skillsIWant">
						<h3>I Want to Learn</h3>
						
						<?php if ( have_rows('skills') ): ?>
							<ul>
								<?php while ( have_rows('skills') ): the_row(); ?>
								<li> <?php the_sub_field('skills_to_learn') ?> </li>
							<?php endwhile; ?>
							</ul>
						<?php endif; ?>
						<?php wp_reset_postdata(); // return end back to regular scheduled programming ?>

					</div>
				</div>
			</section>

			<!-- ==============
			contact section
			============== -->

			<section id="contact" class="contact clearfix">
				<div class="innerWrapper">
					<div class="contactInfo">
						<h3 class="email">email</h3>
						<p class="emailAdd">hello@heatherbanks.ca</p>
						<p class="or">- or -</p>
						<h3 class="social">find me here</h3>
						
						<ul class="socialMediaLinks">
							<li><i class="fa fa-twitter"><a href="http://twitter.com/heatherlbanks" target="_blank">heatherlbanks</a></i></li>
							<li><i class="fa fa-linkedin"><a href="https://www.linkedin.com/pub/heather-banks/50/813/488">heather banks</a></i></li>
							<li><i class="fa fa-codepen"><a href="http://codepen.io/hbanks" target="_blank">hbanks</a></i></li>
							<li><i class="fa fa-github"><a href="http://github.com/hbanks" target="_blank">hbanks</a></i></li>
						</ul>	
					</div>
					
					<div class="contactForm">
						<?php  dynamic_sidebar( 'secondary-widget-area' ); ?>
					</div>
					
				</div>
			</section>

    <?php endwhile; // end the loop?>		

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>