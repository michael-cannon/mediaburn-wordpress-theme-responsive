<?php
require_once( USER_INC . '/custom/fitv/custom_functions.php' );

register_nav_menu( 'footer', 'Footer' );

register_sidebar(array(
	'name'=>'Header',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

register_sidebar(array(
	'name'=>'Search',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

register_sidebar(array(
	'name'=>'Post Sidebar',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

register_sidebar(array(
	'name'=>'Post Top Sidebar',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '<div class="cleaner">&nbsp;</div></div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

/* >>> ADDED BY DEZIO1900 */
	
	// REGISTER VERTICAL MENU
	// register_nav_menu( 'home-vertical-menu', 'Vertical menu on homepage' );
	
	// REGISTER HOMEPAGE SLIDER LEFT SIDEBAR
	register_sidebar( array(
		'name'	=> __( 'Homepage Slider Sidebar' ),
		'id'	=> 'homepage-slider-sidebar',
	));
	
	// ADD CODE TO HEAD SECTION
	function add_muli_font_to_head() {
	    ?>
	    <!-- ADD 'MULI' FONT FOR VERICAL MENU -->
	    <link href="http://fonts.googleapis.com/css?family=Muli" rel="stylesheet" type="text/css">
	    
	    <!-- LOAD FONT AWESOME CSS FILE -->
	    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	    
	    <!-- ADD INLINE SCRIPTS TO HEAD SECTION -->
	    <script>
	    	jQuery(function($){
	    		
	    		$('div.navigation a[href="#"], div.navigation a.disabled').click(function(event) { event.preventDefault(); });
	    		
	    		// GO TO PAGE
	    		$('div.navigation a.page-goto').click(function(event) {
	    			
	    			var page_goto = prompt("Go to page:");
	    			
	    			if( page_goto != null )
	    				window.location.href = $(this).closest('.navigation').data('pagination-link').replace( "%#%", page_goto );
	    			
	    		});
	    		
	    		// ADD VERTICAL MENU SCRIPT FOR SMALL SCREENS
	    		$('#main .homepage-slider-with-sidebar-wrapper ul.menu li.menu-item-has-children > a').click(function(event) {
	    			
	    			// CONTINUE 
	    			if( $(window).width() > 768 )
	    				return;
	    			
	    			event.preventDefault();
	    			event.stopImmediatePropagation();
	    			
	    			$(this).parent().toggleClass('active').find('li.active').removeClass('active');
	    			
	    		});
	    		
	    	});
	    </script>
	    <?php
	}
	add_action( 'wp_head', 'add_muli_font_to_head' );

/* <<< ADDED BY DEZIO1900 */
 
?>
