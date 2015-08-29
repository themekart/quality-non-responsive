<?php
 get_header(); ?>
<div class="page-seperator"></div>
<div class="container">
  <div class="row">
    <?php if ( have_posts() ) : ?>
    <div class="qua_page_heading">
      <h1><?php printf( __( 'Tag Archives: %s', 'quality' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
      </h1>
      <?php if ( tag_description() ) : // Show an optional tag description ?>
      <div class="archive-meta"><?php echo tag_description(); ?></div>
      <?php endif; ?>
    </div>
    <?php endif; ?>
  </div>
</div>
<div class="container">
  <div class="row qua_blog_wrapper">
    <!--Blog Content-->
    <div class="<?php if( is_active_sidebar('sidebar-primary')) { echo "col-xs-8"; } else { echo "col-xs-12"; } ?>">
      <?php if ( have_posts() ) : ?>
      <?php while(have_posts()): the_post(); ?>
      <div class="qua_blog_section"  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="qua_blog_post_img">
          <?php $defalt_arg =array('class' => "img-responsive"); ?>
          <?php if(has_post_thumbnail()): ?>
          <a  href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('webriti_blog_img', $defalt_arg); ?>
          </a>
          <?php endif; ?>	
        </div>
        <div class="qua_post_date">
          <span class="date"><?php echo get_the_date('j'); ?></span>
          <h6><?php echo the_time('M'); ?></h6>
        </div>
        <div class="qua_post_title_wrapper">
          <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          <div class="qua_post_detail">
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?></a>
            <a href="<?php the_permalink(); ?>"><i class="fa fa-comments"></i><?php comments_number( 'No Comments', 'one comments', '% comments' ); ?></a>
            <?php if(get_the_tag_list() != '') { ?>
            <div class="qua_tags">
              <i class="fa fa-tags"></i><a href="<?php the_permalink(); ?>"><?php the_tags('', ', ', '<br />'); ?></a>								
            </div>
            <?php }?>
          </div>
        </div>
        <div class="clear"></div>
        <div class="qua_blog_post_content">
          <p><?php the_content( __( 'Read More' , 'quality' ) ); ?></p>
        </div>
      </div>
      <?php endwhile ?>
      <div class="qua_blog_pagination">
        <div class="qua_blog_pagi">					
          <?php if ( get_previous_posts_link() ): ?>
          <?php previous_posts_link(); ?>
          <?php endif; ?>					
          <?php if ( get_next_posts_link() ): ?>
          <?php next_posts_link(); ?>
          <?php endif; ?>
        </div>
        <?php if(wp_link_pages()) { wp_link_pages();  } ?>
      </div>
      <?php endif; ?>
    </div>
    <?php wp_link_pages();?>
    <?php get_sidebar(); ?>	
  </div>
</div>
<?php get_footer(); ?>