<div class="col-lg-4 col-md-4 col-sm-4 col-12">
	<div class="right-side-col">
	    <h5>Practice Areas</h5>
	    <ul>
	    <?php
	    	$args = array(
	        'post_type'      => 'practice-area',
	        'posts_per_page' => 9,
	        'orderby' => 'title',
			'order'   => 'ASC',
	      );
	      $practice_areas = new WP_Query($args);
	      if ($practice_areas->have_posts()) {
	        while ($practice_areas->have_posts()) {
	        $practice_areas->the_post();
	        ?>
	        <li><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
	        <?php
	    	}
	    }
	    wp_reset_postdata();
		?>
	    </ul>
  	</div>
</div>