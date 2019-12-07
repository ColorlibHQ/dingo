<?php 
/**
 * @Packge     : Dingo
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit( 'Direct script access denied.' );
    }

/*=========================================================
	Theme option callback
=========================================================*/
function dingo_opt( $id = null, $default = '' ) {
	
	$opt = get_theme_mod( $id, $default );
	
	$data = '';
	
	if( $opt ) {
		$data = $opt;
	}
	
	return $data;
}


/*=========================================================
	Site icon callback
=========================================================*/

function dingo_site_icon(){
	if ( !has_site_icon() ) {
		$html = '';
		$icon_path = DINGO_DIR_ASSETS_URI . 'img/favicon.png';
		$html .= '<link rel="icon" href="' . esc_url ( $icon_path ) . '" sizes="32x32">';
		$html .= '<link rel="icon" href="' . esc_url ( $icon_path ) . '" sizes="192x192">';
		$html .= '<link rel="apple-touch-icon-precomposed" href="' . esc_url ( $icon_path ) . '">';
		$html .= '<meta name="msapplication-TileImage" content="' . esc_url ( $icon_path ) . '">';

		return $html;
	} else {
		return;
	}
}


/*=========================================================
	Custom meta id callback
=========================================================*/
function dingo_meta( $id = '' ){
    
    $value = get_post_meta( get_the_ID(), '_dingo_'.$id, true );
    
    return $value;
}


/*=========================================================
	Blog Date Permalink
=========================================================*/
function dingo_blog_date_permalink(){
	
	$year  = get_the_time('Y'); 
    $month_link = get_the_time('m');
    $day   = get_the_time('d');

    $link = get_day_link( $year, $month_link, $day);
    
    return $link; 
}



/*========================================================
	Blog Excerpt Length
========================================================*/
if ( ! function_exists( 'dingo_excerpt_length' ) ) {
	function dingo_excerpt_length( $limit = 30 ) {

		$excerpt = explode( ' ', get_the_excerpt() );
		
		// $limit null check
		if( !null == $limit ){
			$limit = $limit;
		}else{
			$limit = 30;
		}
        
        
		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice ).' ...';
		} else {
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice );
		}
		
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;

	}
}


/*==========================================================
	Detect the custom post type
==========================================================*/

function dingo_custom_post_type( $post_type ) {
	if ( get_post_type( get_the_ID() ) == $post_type ) {
		return true;
	} else {
		return false;
	}
}


/*==========================================================
	Comment number and Link
==========================================================*/
if ( ! function_exists( 'dingo_posted_comments' ) ) {
    function dingo_posted_comments(){
        
        $comments_num = get_comments_number();
        if( comments_open() ){
            if( $comments_num == 0 ){
                $comments = esc_html__('No Comments','dingo');
            } elseif ( $comments_num > 1 ){
                $comments= $comments_num . esc_html__(' Comments','dingo');
            } else {
                $comments = esc_html__( '1 Comment','dingo' );
            }
            $comments = '<span class="ti-comments"></span>'. $comments;
        } else {
            $comments = esc_html__( 'Comments are closed', 'dingo' );
		}

		if ( !dingo_custom_post_type( 'food' ) ) {
			return $comments;
		}
        
    }
}


/*===================================================
	Post embedded media
===================================================*/
function dingo_embedded_media( $type = array() ){
    
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );
        
    if( in_array( 'audio' , $type) ){
    
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }
        
    }else{
        
        if( count( $embed ) > 0 ){

            $output = $embed[0];
        }else{
           $output = ''; 
        }
        
    }
    
    return $output;
}


/*===================================================
	WP post link pages
====================================================*/
function dingo_link_pages(){
    wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'dingo' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'dingo' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}


/*====================================================
	Theme logo
====================================================*/
function dingo_theme_logo( $class = '' ) {

    $siteUrl = home_url('/');
    // site logo
		
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$imageUrl = wp_get_attachment_image_src( $custom_logo_id , 'site_logo_153x63' );
	
	if( !empty( $imageUrl[0] ) ){
		$siteLogo = '<a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'"><img src="'.esc_url( $imageUrl[0] ).'" alt=""></a>';
	}else{
		$siteLogo = '<h2><a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a><span>'. esc_html( get_bloginfo('description') ) .'</span></h2>';
	}
	
	return wp_kses_post( $siteLogo );
	
}


/*================================================
    Page Title Bar
================================================*/
function dingo_page_titlebar() {
	if ( ! is_page_template( 'template-builder.php' ) ) {
		?>
        <section class="hero-banner">
            <div class="container">
				<h2>
				<?php
				if ( is_category() ) {
					single_cat_title( __('Category: ', 'dingo') );

				} elseif ( is_tag() ) {
					single_tag_title( 'Tag Archive for &quot;' );

				} elseif ( is_archive() ) {
					echo get_the_archive_title();

				} elseif ( is_page() ) {
					echo get_the_title();

				} elseif ( is_search() ) {
					echo esc_html__( 'Search for: ', 'dingo' ) . get_search_query();

				} elseif ( ! ( is_404() ) && ( is_single() ) || ( is_page() ) ) {
					echo  get_the_title();

				} elseif ( is_home() ) {
					echo esc_html__( 'Blog', 'dingo' );

				} elseif ( is_404() ) {
					echo esc_html__( '404 error', 'dingo' );

				}
				?>
				</h2>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
					<?php
					if ( function_exists( 'dingo_breadcrumbs' ) ) {
						dingo_breadcrumbs();
					}
					?>
                </nav>
            </div>
        </section>
		<?php
	}
}



/*================================================
	Blog pull right class callback
=================================================*/
function dingo_pull_right( $id = '', $condation ){
    
    if( $id == $condation ){
        return ' '.'order-last';
    }else{
        return;
    }
    
}



/*======================================================
	Inline Background
======================================================*/
function dingo_inline_bg_img( $bgUrl ){
    $bg = '';

    if( $bgUrl ){
        $bg = 'style="background-image:url('.esc_url( $bgUrl ).')"'; 
    }

    return $bg;
}


/*======================================================
	Blog Category
======================================================*/
function dingo_featured_post_cat(){

	$categories = get_the_category(); 
	
	if( is_array( $categories ) && count( $categories ) > 0 ){
		$getCat = [];
		foreach ( $categories as $value ) {

			if( is_front_page() ){
				$getCat[] = '<a class="date_item" href="'.esc_url( get_category_link( $value->term_id ) ).'"><span>#</span> '.esc_html( $value->name ).'</a>';
			} else {
				$getCat[] = '<a class="date_item" href="'.esc_url( get_category_link( $value->term_id ) ).'">'.esc_html( $value->name ).'</a>';
			}   
		}

		return implode( ', ', $getCat );
	}
         
}


/*=======================================================
	Customize Sidebar Option Value Return
========================================================*/
function dingo_sidebar_opt(){

    $sidebarOpt = dingo_opt( 'dingo_blog_layout' );
    $sidebar = '1';
    // Blog Sidebar layout  opt
    if( is_array( $sidebarOpt ) ){
        $sidebarOpt =  $sidebarOpt;
    }else{
        $sidebarOpt =  json_decode( $sidebarOpt, true );
    }
    
    
    if( !empty( $sidebarOpt['columnsCount'] ) ){
        $sidebar = $sidebarOpt['columnsCount'];
    }


    return $sidebar;
}


/**================================================
	Themify Icon
 =================================================*/
function dingo_themify_icon(){
    return[
        'ti-home'       => 'Home',
        'ti-tablet'     => 'Tablet',
        'ti-email'      => 'Email',
        'ti-twitter'    => 'twitter',
        'ti-skype'      => 'skype',
        'ti-instagram'  => 'instagram',
        'ti-dribbble'   => 'dribbble',
        'ti-vimeo'      => 'vimeo',
    ];
}


/*===========================================================
	Set contact form 7 default form template
============================================================*/
function dingo_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="row"><div class="col-12"><div class="form-group">[textarea* your-message id:message class:form-control class:w-100 rows:9 cols:30 placeholder "Message"]</div></div><div class="col-sm-6"><div class="form-group">[text* your-name id:name class:form-control placeholder "Enter your  name"]</div></div><div class="col-sm-6"><div class="form-group">[email* your-email id:email class:form-control placeholder "Enter your email"]</div></div><div class="col-12"><div class="form-group">[text your-subject id:subject class:form-control placeholder "Subject"]</div></div></div><div class="form-group mt-3">[submit class:button class:button-contactForm "Send Message"]</div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'dingo_contact7_form_content', 10, 2 );



/*============================================================
	Pagination
=============================================================*/
function dingo_blog_pagination(){
	echo '<nav class="blog-pagination justify-content-center d-flex">';
        the_posts_pagination(
            array(
                'mid_size'  => 2,
                'prev_text' => __( '<span class="ti-angle-left"></span>', 'dingo' ),
                'next_text' => __( '<span class="ti-angle-right"></span>', 'dingo' ),
                'screen_reader_text' => ' '
            )
        );
	echo '</nav>';
}


/*=============================================================
	Blog Single Post Navigation
=============================================================*/
if( ! function_exists('dingo_blog_single_post_navigation') ) {
	function dingo_blog_single_post_navigation() {

		// Start nav Area
		if( get_next_post_link() || get_previous_post_link()   ):
			?>
			<div class="navigation-area">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
						<?php
						if( get_next_post_link() ){
							$nextPost = get_next_post();

							if( has_post_thumbnail() ){
								?>
								<div class="thumb">
									<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
										<?php echo get_the_post_thumbnail( absint( $nextPost->ID ), 'dingo_np_thumb', array( 'class' => 'img-fluid' ) ) ?>
									</a>
								</div>
								<?php
							} ?>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<span class="ti-arrow-left text-white"></span>
								</a>
							</div>
							<div class="detials">
								<p><?php echo esc_html__( 'Prev Post', 'dingo' ); ?></p>
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $nextPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<?php
						} ?>
					</div>
					<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
						<?php
						if( get_previous_post_link() ){
							$prevPost = get_previous_post();
							?>
							<div class="detials">
								<p><?php echo esc_html__( 'Next Post', 'dingo' ); ?></p>
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $prevPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<span class="ti-arrow-right text-white"></span>
								</a>
							</div>
							<div class="thumb">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<?php echo get_the_post_thumbnail( absint( $prevPost->ID ), 'dingo_np_thumb', array( 'class' => 'img-fluid' ) ) ?>
								</a>
							</div>
							<?php
						} ?>
					</div>
				</div>
			</div>
		<?php
		endif;

	}
}


/*=======================================================
	Author Bio
=======================================================*/
function dingo_author_bio(){
	$avatar = get_avatar( absint( get_the_author_meta( 'ID' ) ), 90 );
	?>
	<div class="blog-author">
		<div class="media align-items-center">
			<?php
			if( $avatar  ) {
				echo wp_kses_post( $avatar );
			}
			?>
			<div class="media-body">
				<a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><h4><?php echo esc_html( get_the_author() ); ?></h4></a>
				<p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
			</div>
		</div>
	</div>
	<?php
}


/*===================================================
 Dingo Comment Template Callback
 ====================================================*/
function dingo_comment_callback( $comment, $args, $depth ) {

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo esc_attr( $tag ); ?> <?php comment_class( ( empty( $args['has_children'] ) ? '' : 'parent').' comment-list' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-list">
	<?php endif; ?>
		<div class="single-comment">
			<div class="user d-flex">
				<div class="thumb">
					<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>
				<div class="desc">
					<div class="comment">
						<?php comment_text(); ?>
					</div>

					<div class="d-flex justify-content-between">
						<div class="d-flex align-items-center">
							<h5 class="comment_author"><?php printf( __( '<span class="comment-author-name">%s</span> ', 'dingo' ), get_comment_author_link() ); ?></h5>
							<p class="date"><?php printf( __('%1$s at %2$s', 'dingo'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'dingo' ), '  ', '' ); ?> </p>
							<?php if ( $comment->comment_approved == '0' ) : ?>
								<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'dingo' ); ?></em>
								<br>
							<?php endif; ?>
						</div>

						<div class="reply-btn">
							<?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 1, 'max_depth' => 5, 'reply_text' => 'Reply' ) ) ); ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
}
// add class comment reply link
add_filter('comment_reply_link', 'dingo_replace_reply_link_class');
function dingo_replace_reply_link_class( $class ) {
	$class = str_replace("class='comment-reply-link", "class='btn-reply comment-reply-link text-uppercase", $class);
	return $class;
}



/*=========================================================
    Latest Blog Post For Elementor Section
===========================================================*/
function dingo_latest_blog( $pNumber = 4 ){
	
	$lBlog = new WP_Query( array(
        'post_type'      => 'post',
        'posts_per_page' => $pNumber
    ) );
	$i = 1;
    if( $lBlog->have_posts() ){
        while( $lBlog->have_posts() ){
			$lBlog->the_post();
			$icon_path = DINGO_DIR_ASSETS_URI . 'img/icon/left_1.svg';
			$dynamic_class = ( $i == 4 ) ? 'd-none d-sm-block d-lg-none' : '';
			$archive_year  = get_the_time('Y'); 
			$archive_month = get_the_time('m'); 
			$archive_day   = get_the_time('d'); 
	?>
	
		<div class="col-sm-6 col-lg-4 <?php echo $dynamic_class?>">
			<div class="single_blog_item">
				<div class="single_blog_img">
					<?php
						if( has_post_thumbnail() ){
							the_post_thumbnail( 'dingo_exclusive_serv_360x330', [ 'alt' => get_the_title() ] );
						}
					?>
				</div>
				<div class="single_blog_text">
					<div class="date">
						<a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>" class="date_item"><?php the_time('M j, Y') ?> </a>
						<?php echo dingo_featured_post_cat(); ?>
					</div>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<a href="<?php the_permalink(); ?>" class="btn_3"><?php echo esc_html__('Read More', 'dingo')?> <img src="<?php echo $icon_path?>" alt="Icon Read More"></a>
				</div>
			</div>
		</div>

		<?php
		$i++;
        }

    }

}



/*=========================================================
    Share Button Code
===========================================================*/
function dingo_social_sharing_buttons( $ulClass = '', $tagLine = '' ) {

	// Get page URL
	$URL = get_permalink();
	$Sitetitle = get_bloginfo('name');

	// Get page title
	$Title = str_replace( ' ', '%20', get_the_title());

	// Construct sharing URL without using any script
	$twitterURL = 'https://twitter.com/intent/tweet?text='.esc_html( $Title ).'&amp;url='.esc_url( $URL ).'&amp;via='.esc_html( $Sitetitle );
	$faceportfolioURL= 'https://www.faceportfolio.com/sharer/sharer.php?u='.esc_url( $URL );
	$linkedin   = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
	$pinterest  = 'http://pinterest.com/pin/create/button/?url='.esc_url( $URL ).'&description='.esc_html( $Title );;

	// Add sharing button at the end of page/page content
	$content = '';
	$content  .= '<ul class="'.esc_attr( $ulClass ).'">';
	$content .= $tagLine;
	$content .= '<li><a href="' . esc_url( $twitterURL ) . '" target="_blank"><i class="ti-twitter-alt"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $faceportfolioURL ) . '" target="_blank"><i class="ti-faceportfolio"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $pinterest ) . '" target="_blank"><i class="ti-pinterest"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $linkedin ) . '" target="_blank"><i class="ti-linkedin"></i></a></li>';
	$content .= '</ul>';

	return $content;

}



/*================================================
	Projects Return data 
================================================ */
function return_tab_data( $getTags, $menu_tabs ) {
	$y = [];
	foreach ( $getTags as $val ) {

		$t = [];

		foreach( $menu_tabs as $data ) {
			if( $data['label'] == $val ) {
				$t[] = $data;
			}
		}

		$y[$val] = $t;

	}

	return $y;
}


/*================================================
    Dingo Custom Posts
================================================*/
function dingo_custom_posts() {
	
	// Food Custom Post
	
	$labels = array(
		'name'               => _x( 'Foods', 'post type general name', 'dingo' ),
		'singular_name'      => _x( 'Food', 'post type singular name', 'dingo' ),
		'menu_name'          => _x( 'Foods', 'admin menu', 'dingo' ),
		'name_admin_bar'     => _x( 'Food', 'add new on admin bar', 'dingo' ),
		'add_new'            => _x( 'Add New', 'food', 'dingo' ),
		'add_new_item'       => __( 'Add New Food', 'dingo' ),
		'new_item'           => __( 'New Food', 'dingo' ),
		'edit_item'          => __( 'Edit Food', 'dingo' ),
		'view_item'          => __( 'View Food', 'dingo' ),
		'all_items'          => __( 'All Foods', 'dingo' ),
		'search_items'       => __( 'Search Foods', 'dingo' ),
		'parent_item_colon'  => __( 'Parent Foods:', 'dingo' ),
		'not_found'          => __( 'No foods found.', 'dingo' ),
		'not_found_in_trash' => __( 'No foods found in Trash.', 'dingo' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'dingo' ),
		'public'             => true,
		'menu_icon'			 => 'dashicons-buddicons-community',
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'food' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'food', $args );
	
	
	$labels = array(
		'name'              => _x( 'Food Category', 'taxonomy general name', 'dingo' ),
		'singular_name'     => _x( 'Food Categories', 'taxonomy singular name', 'dingo' ),
		'search_items'      => __( 'Search Food Categories', 'dingo' ),
		'all_items'         => __( 'All Food Categories', 'dingo' ),
		'parent_item'       => __( 'Parent Food Category', 'dingo' ),
		'parent_item_colon' => __( 'Parent Food Category:', 'dingo' ),
		'edit_item'         => __( 'Edit Food Category', 'dingo' ),
		'update_item'       => __( 'Update Food Category', 'dingo' ),
		'add_new_item'      => __( 'Add New Food Category', 'dingo' ),
		'new_item_name'     => __( 'New Food Category Name', 'dingo' ),
		'menu_name'         => __( 'Food Category', 'dingo' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'food-cat' ),
	);

	register_taxonomy( 'food-cat', array( 'food' ), $args );

}
add_action( 'init', 'dingo_custom_posts' );


/*=========================================================
    Currency detect
========================================================*/

function dingo_currency_symbol(){
	$cur_symbol = dingo_meta( 'food_price_currency' );
	switch ( $cur_symbol ) {
		case 'eur':
			$cur_symbol = '€';
			break;
		
		case 'gbp':
			$cur_symbol = '£';
			break;

		case 'gpy':
			$cur_symbol = '¥';
			break;
		
		default:
			$cur_symbol = '$';
			break;
	}

	return $cur_symbol;
}


/*=========================================================
    Food Menu Section
========================================================*/
function dingo_food_section( $excerpt_length, $food_items ){
	$play_icon = DINGO_DIR_ASSETS_URI . 'img/icon/play.svg';
	?>
	<div class="col-lg-6">
		<div class="nav nav-tabs food_menu_nav" id="myTab" role="tablist">
			
			<?php
				$categories = get_terms(
					array(
						'taxonomy' => 'food-cat',
						'hide_empty' => false
					)
				);
				$i = 1;
				foreach ( $categories as $category ) {
					$active_class = ( $i == 1 ) ? 'active' : '';
					echo '<a class="'. $active_class .'" id="'. esc_attr( $category->slug ) .'-tab" data-toggle="tab" href="#'. esc_attr( $category->slug ) .'" role="tab" aria-controls="'. esc_attr( $category->slug ) .'" aria-selected="false">'. esc_html( $category->name ) .'</a>';
					$i++;
				}
			?>
		</div>
	</div>


	<div class="col-lg-12">
		<div class="tab-content" id="myTabContent">
			
			<?php
			$categories = get_terms(
				array(
					'taxonomy' => 'food-cat',
					'hide_empty' => false
				)
			);
			$i = 1;
			foreach ( $categories as $category ) {
				$active_class = ( $i == 1 ) ? 'show active' : '';
				?>
				<div class="tab-pane fade <?php echo $active_class?> single-member" id="<?php echo esc_attr( $category->slug ) ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $category->slug ) ?>-tab">
					<div class="row">
						<?php
							$args = array(
								'post_type' 		=> 'food',
								'posts_per_page'	=> $food_items,
								'tax_query' 		=> array(
									array(
										'taxonomy' => 'food-cat',
										'field'    => 'slug',
										'terms'    => $category->slug,
									),
								),
							);
							$query = new WP_Query( $args );
							if( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post(); 
									$cur_symbol = dingo_currency_symbol();
									$food_price  = dingo_meta( 'food_price' );
									?>
									<div class="col-sm-6 col-lg-6">
										<div class="single_food_item media">
											<?php
												if ( has_post_thumbnail() ) {
													the_post_thumbnail( 'dingo_food_menu_thumb_165x163', ['class' => 'mr-3', 'alt' => get_the_title() ]);
												}
											?>
											<div class="media-body align-self-center">
												<h3><?php the_title();?></h3>
												<p><?php echo dingo_excerpt_length( $excerpt_length );?></p>
												<h5><?php echo $cur_symbol . $food_price?></h5>
											</div>
										</div>
									</div>
									<?php
								}
							}
						?>
					</div>
				</div>
			<?php
				$i++;
				} ?>
			</div>
		</div>
	</div>
	<?php
}


/*==========================================================
 *  Flaticon Icon List
=========================================================*/
function dingo_flaticon_list(){
    return(
        array(
            'flaticon-growth'     => 'Flaticon Growth',
            'flaticon-wallet'     => 'Flaticon Wallet',
        )
    );
}

