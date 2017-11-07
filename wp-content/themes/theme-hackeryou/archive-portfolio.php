<?php get_header(); ?>

<div class="main">
  <div class="container archivePortContainer">
    <div class="innerWrapper">
    <div class="content archivePortContent">
      <h2 class="portTitle">Portfolio</h2>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            
            <?php if ( has_post_thumbnail() ) : ?>
             <div class="featuredPost clearfix">

                <?php if ( has_post_thumbnail() ) : ?>
                  <div class="portImage">
                  <?php the_post_thumbnail('full'); ?>
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
                          <a href="<?php the_field('live_demo') ?>">View Live</a>
                        <?php endif; ?>
                        
                        <?php if ( get_field( 'github_link' ) ): ?>
                          <a href="<?php the_field('github_link') ?>">View On GitHub</a>
                        <?php endif; ?>
                          <?php endif ?>
                      </div>  
                    </div>
                  </div> <!-- /.portfolioOverlay -->
                <?php endif; ?>
               
              </div> <!-- /.featuredPost -->
            <?php endif; ?>

      <?php endwhile; // end of the loop. ?>
    </div>
    </div> <!-- /.innerWrapper -->
  </div> <!-- /.container -->

</div> <!-- /.main -->

<?php get_footer(); ?>