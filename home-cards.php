<?php

$cards = get_field('home_cards');

if( $cards ) { ?>
    <div class="cards-wrapper inside-article">
    <?php foreach( $cards as $post) { ?>
        <?php setup_postdata($post); ?>
	   
		<div class="zoom-effect-container">
			<div class="image-card" style="background-image:url(<?php the_post_thumbnail_url( get_the_ID(), 'full' ); ?>);"></div>
			<div class="content">
				<h3><?php the_title(); ?></h3>
				<p><?php echo wp_trim_words( get_the_content(), 12, '...' ); ?></p>
				<a class="button" href="<?php the_permalink(); ?>"><?php echo __('Read More', 'generatepress'); ?></a>
			</div>
		</div>

	<?php } ?>
	</div>
    <?php wp_reset_postdata(); ?>
<?php } ?>
