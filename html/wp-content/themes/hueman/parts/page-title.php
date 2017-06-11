<?php if ( ! hu_is_home_empty() ) : ?>
    <div class="page-title pad group" style="height: 26px; position: absolute; width: 100%; padding-right: 0px; padding-left: 0px;">
      <?php //prints the relevant metas (cat, tag, author, date, ...) for a given context : home, single post, page, 404, search, archive...  ?>
    	<?php if ( is_home() && hu_is_checked('blog-heading-enabled') ) : ?>
    		<!-- <h2><?php // echo hu_blog_title(); ?></h2> -->
            <h2><center>WHISTLING WORDS</center></h2>
    	<?php elseif ( is_single() ): ?>
            
    		<ul class="meta-single group">
    			<li class="category" style="left: 60px; position: absolute;"><?php the_category(' <span>/</span> '); ?></li>
    			<?php if ( comments_open() && ( hu_is_checked( 'comment-count' ) ) ): ?>
    			<li class="comments" style="right: 60px; position: absolute;"><a href="<?php comments_link(); ?>"><i class="fa fa-comments-o"></i><?php comments_number( '0', '1', '%' ); ?></a></li>
    			<?php endif; ?>
    		</ul>

    	<?php elseif ( is_page() ): ?>
    		<h2><center><?php echo hu_get_page_title(); ?></center></h2>
    	<?php elseif ( is_search() ): ?>
    		<h1><center><?php echo hu_get_search_title(); ?></center></h1>
    	<?php elseif ( is_404() ): ?>
    		<h1><center><?php echo hu_get_404_title(); ?></center></h1>
    	<?php elseif ( is_author() ): ?>
    		<h1><center><?php echo hu_get_author_title(); ?></center></h1>
    	<?php elseif ( is_category() || is_tag() ): ?>
    		<h1><center><?php echo hu_get_term_page_title(); ?></center></h1>
    	<?php elseif ( is_day() || is_month() || is_year() ) : ?>
    		<h1><center><?php echo hu_get_date_archive_title(); ?></center></h1>
    	<?php else: ?>
        <?php if ( ! is_home() && ! hu_is_checked('blog-heading-enabled') ) : ?>
    		  <h2><center><?php the_title(); ?></center></h2>
        <?php endif; ?>

    	<?php endif; ?>

    </div><!--/.page-title-->
<?php endif; ?>