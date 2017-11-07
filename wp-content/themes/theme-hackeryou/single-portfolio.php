<?php get_header(); ?>

<div class="main">
  <div class="container">

    <div class="content singlePortfolio">
      <!-- <div class="innerWrapper"> -->
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            
          <div class="postImage">
            <?php the_post_thumbnail('full'); ?>
          </div>
          
          <div class="postContent">
            
            <div class="postInfo">
              <h2><?php the_title(); ?></h2>
              
              <?php if ( get_field( 'client_name' ) ): ?>
                <p><strong>Client Name:</strong> <?php the_field('client_name'); ?></p>
              <?php endif; ?>  
              
              <?php the_content(); ?>
            </div> <!-- /.postInfo -->
            
            <div class="postLinks">
              <div class="viewAt">
                
                <?php if ( get_field( 'live_demo') ): ?>
                  <a href="<?php the_field('live_demo') ?>">View Live</a>
                <?php endif; ?>
                
                <?php if ( get_field( 'github_link' ) ): ?>
                  <a href="<?php the_field('github_link') ?>">View On GitHub</a>
                <?php endif; ?>
              </div>
              <div class="technologies singleTechnologies">
                <h3>Technologies Used</h3>
                <p class="technologies">
                  <?php $terms = get_the_terms($post->ID, 'technologies' ); ?>
                  <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
                          <ul>
                              <?php foreach ( $terms as $term ) : ?>
                              <li><?php echo $term->name ?></li>
                              <?php endforeach ?>
                       </ul>
                  <?php endif ?>
                </p>



                <?php // the_terms($post->ID, 'technologies', '', ''); ?>
              </div>
              
              <div class="portNav"><?php previous_post_link('%link', 'PREV'); ?> | <?php next_post_link('%link', 'NEXT'); ?></div>
            </div> <!-- /.postLinks -->

            <div class="images">
              <?php while(has_sub_field('images')) : ?>
                <?php //for every image/caption combo, this code is run ?>
                <figure>
                  <?php $image = get_sub_field('image'); ?>
                   <img src="<?php echo $image['sizes']['square']; ?>" alt="<?php echo $image['title']; ?>">
                  <figcaption><?php the_sub_field('caption'); ?></figcaption>
                </figure>
              <?php endwhile; //end images loop ?>
            </div>
            <?php //the_content(); ?>
          </div>
        <?php endwhile; // end of the loop. ?>

      <!-- </div> /.innerWrapper -->
    </div> <!-- /.content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>