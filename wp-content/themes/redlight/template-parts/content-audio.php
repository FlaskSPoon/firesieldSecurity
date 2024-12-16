<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package redlight
 */
$redlightTag = Redlight_Function('Tags');
$redlightFunc = Redlight_Function('Functions');
$redlight_tg = Redlight_Function('Tags');

if( is_single() ): ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-details-inner">
		<div class="blog-details-content">	
	        <?php 
	        if(get_post_meta(get_the_id(), '_audio-url', '' )) : ?>
	            <div class="postbox-audio embed-responsive embed-responsive-16by9 mb-30">
	                <?php echo wp_oembed_get( get_post_meta(get_the_id(), '_audio-url', true) ); ?>
	            </div>
	        <?php 
	        endif; ?>
			
			<div class="blog-item-info">
				<ul class="post-meta">
					<li class="post-author"><?php $redlight_tg->posted_by(); ?></li>
					<li class="post-date"><?php $redlight_tg->posted_on(); ?></li>
				</ul>
			</div>

			<div class="st-blog-content-detils">

				<?php 
				if( has_excerpt() ): ?>
					<div class="short-summary-content">
						<?php the_excerpt(); ?>
					</div>
				<?php 
				endif; ?>		
				
				<?php
					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'redlight' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );
					
					$redlightFunc->link_pages(); 
				?>
			 </div>

			 <?php 
			 if( has_tag() ) : ?>
				<div class="blog-details_bottom">
					<?php $redlight_tg->tags(); ?>
				</div>
			<?php 
			endif; ?>
		</div>
	</div>
		
</article><!-- #post-<?php the_ID(); ?> -->

<?php 
else: ?>
<div class="single-blog-wrap">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<!-- blog-item-->
		<div class="blog-item">
			<?php 
	        if(get_post_meta(get_the_id(), '_audio-url', '' )) : ?>
	            <div class="postbox-audio embed-responsive embed-responsive-16by9 mb-30">
	                <?php echo wp_oembed_get( get_post_meta(get_the_id(), '_audio-url', true) ); ?>
	            </div>
	        <?php 
	        endif; ?>
			
			<div class="blog-details">

				<?php 
				if( ! empty( $post->post_title ) ) : ?>
        			<h5 class="blog-item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<?php 
				endif; ?>

				<span><i class="fa fa-user"></i><?php $redlightTag->posted_by(); ?></span>
                <span><i class="fa fa-clock-o"></i><?php $redlightTag->posted_on(); ?></span>
                <?php the_excerpt(); ?>

				<div class="blog-btn">
				    <a class="read-more-btn" href="<?php esc_url( the_permalink() );?>"><?php esc_html_e("Read More", "redlight");?><i class="fa fa-long-arrow-right"></i></a>
				</div>
			
			</div>
		</div>
	</article>
</div>

<?php endif; ?>



