<?php
///----Blog widgets---

//About Us
class Bunch_About_us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Abous_us', /* Name */esc_html__('Mindron Abous Us','mindron'), array( 'description' => esc_html__('Show the information about company', 'mindron' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		//$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
            

            <div class="footer-widget logo-widget">
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $instance['logo_url'] ); ?>" alt="<?php esc_attr_e('image', 'mindron');?>" /></a>
                </div>
                <div class="text"><?php echo wp_kses_post($instance['content']); ?></div>
            </div>
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['logo_url'] = strip_tags($new_instance['logo_url']);
		$instance['content'] = $new_instance['content'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$logo_url = ($instance) ? esc_attr($instance['logo_url']) : '';
		$content = ($instance) ? esc_attr($instance['content']) : '';?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('logo_url')); ?>"><?php esc_html_e('Footer Logo Url: ', 'mindron'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_url')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_url')); ?>" type="text" value="<?php echo esc_attr($logo_url); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'mindron'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>       
                
		<?php 
	}
	
}

class Bunch_servies extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_servies', /* Name */esc_html__('Mindron Services','mindron'), array( 'description' => esc_html__('Show the Services', 'mindron' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget); ?>


        <div class="footer-widget links-widget">
            <h2><?php echo wp_kses_post( $instance['title'] ); ?></h2>
            <div class="widget-content">
                <ul class="list">
                    <?php 
                        $args = array('post_type' => 'bunch_services', 'showposts'=>$instance['number']);
                        if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'services_category','field' => 'id','terms' => (array)$instance['cat']));
                         

                        $this->posts($args);
                    ?>
                </ul>
            </div>
        </div>
		
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{  
        $title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Services', 'mindron');
		$number = ( $instance ) ? esc_attr($instance['number']) : 5;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'mindron'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'mindron'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'mindron'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'mindron'), 'selected'=>$cat, 'taxonomy' => 'services_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		$query = new WP_Query($args);
		if ( $query->have_posts() ) :  ?>
           	<!-- Title -->
            <?php while( $query->have_posts() ): $query->the_post();
                $services_meta = _WSH()->get_meta();
                $ext_url = mindron_set( $services_meta, 'ext_url' );
            ?>
            <li><a href="<?php echo esc_url( $ext_url ); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}

//About Us
class Bunch_Get_in_Touch extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Get_in_Touch', /* Name */esc_html__('Mindron Get in Touch','mindron'), array( 'description' => esc_html__('Show the information about company', 'mindron' )) );
	}
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>


            <div class="footer-widget info-widget">
                <h2><?php echo wp_kses_post( $instance['title'] ); ?></h2>
                <div class="widget-content">
                    <div class="number"><?php echo wp_kses_post( $instance['phone'] ); ?></div>
                    <div class="text"><?php echo wp_kses_post( $instance['address'] ); ?> <br> <?php echo sanitize_email( $instance['email'] ); ?></div>
                    <?php if( $instance['show'] ): ?>
                        <ul class="social-icon-one">
                            <?php echo wp_kses_post(mindron_get_social_icons()); ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['phone'] = $new_instance['phone'];
		$instance['address'] = $new_instance['address'];
		$instance['email'] = $new_instance['email'];
        $instance['show'] = $new_instance['show'];
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Get In Touch', 'mindron');
        $phone = ( $instance ) ? esc_attr($instance['phone']) : '(1800) 574 9687';
		$address = ( $instance ) ? esc_attr($instance['address']) : '65, Street, New Youk, MAC 5245';
		$email = ( $instance ) ? esc_attr($instance['email']) : 'mindron@contact.gmail.com';
        $show = ( $instance ) ? esc_attr($instance['show']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'mindron'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone:', 'mindron'); ?></label>
            <input placeholder="<?php esc_attr_e('Phone', 'mindron');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'mindron'); ?></label>
            <input placeholder="<?php esc_attr_e('Address', 'mindron');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($address); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:', 'mindron'); ?></label>
            <input placeholder="<?php esc_attr_e('Email', 'mindron');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
        </p>   
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'mindron'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p> 

		<?php 
	}
	
}

class Bunch_Single_servies extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Single_servies', /* Name */esc_html__('Mindron Services Detail Sidebar','mindron'), array( 'description' => esc_html__( 'Show the Services Detail Page Sidebar', 'mindron' ) ) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget); ?>
		
        <!--Services Category-->
        <div class="sidebar-widget sidebar-blog-category">
            <ul class="blog-cat">
				<?php 
					$args = array('post_type' => 'bunch_services', 'showposts'=>$instance['number']);
					if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'services_category','field' => 'id','terms' => (array)$instance['cat']));
					 
					$this->posts($args);
				?>
			</ul>
        </div>
		
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$number = ( $instance ) ? esc_attr($instance['number']) : 8;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
       	<p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'mindron'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'mindron'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'mindron'), 'selected'=>$cat, 'taxonomy' => 'services_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php $count = 0; while( $query->have_posts() ): $query->the_post(); 
                    $services_meta = _WSH()->get_meta();
                    $ext_url = mindron_set( $services_meta, 'ext_url' );
                global $post;
            ?>
            <li <?php if ( 0 === $count ) : ?>class="active"<?php endif; ?>><a href="<?php echo esc_url( $ext_url ); ?>"><?php the_title(); ?></a></li>
            <?php $count++; endwhile; ?>
             
        <?php endif;
		wp_reset_postdata();
    }
}

/// Our Brochures
class Bunch_Brochures extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Brochures', /* Name */esc_html__( 'Mindron Our Brochures','mindron' ), array( 'description' => esc_html__( 'Show the info Our Brochures', 'mindron' ) ) );
	}
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		//$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
     		
     		<div class="sidebar-widget brochure-widget">
                <div class="sidebar-title style-two">
                    <h2><?php echo wp_kses_post( $instance['title'] ); ?></h2>
                </div>
                
                <div class="brochure-box">
                    <div class="inner">
                        <span class="icon fa fa-file-pdf-o"></span>
                        <div class="text"><?php esc_html_e('Pdf.  Download', 'mindron'); ?></div>
                    </div>
                    <a href="<?php echo esc_url($instance['pdf']); ?>" class="overlay-link"></a>
                </div>

                <div class="brochure-box">
                    <div class="inner">
                        <span class="icon flaticon-file-1"></span>
                        <div class="text"><?php esc_html_e('Doc.  Download', 'mindron'); ?></div>
                    </div>
                    <a href="<?php echo esc_url($instance['word']); ?>" class="overlay-link"></a>
                </div>

            </div>
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
        $instance['title'] = strip_tags($new_instance['title']);
		$instance['pdf'] = $new_instance['pdf'];
		$instance['word'] = $new_instance['word'];
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
        $title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Our Brochures', 'mindron');
		$pdf = ($instance) ? esc_attr($instance['pdf']) : '';
		$word = ( $instance ) ? esc_attr($instance['word']) : '';?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'mindron'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf')); ?>"><?php esc_html_e('PDF Link Here:', 'mindron'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'mindron');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf')); ?>" type="text" value="<?php echo esc_attr($pdf); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('word')); ?>"><?php esc_html_e('WORD Link Here:', 'mindron'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'mindron');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('word')); ?>" name="<?php echo esc_attr($this->get_field_name('word')); ?>" type="text" value="<?php echo esc_attr($word); ?>" />
        </p>
                
		<?php 
	}
	
}

//Single Sidebar info Widget
class Bunch_Single_Info extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Single_Info', /* Name */esc_html__('Mindron Info Widget','mindron'), array( 'description' => esc_html__('Show Services Single Info Widget', 'mindron' )) );
	}
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>


            <div class="sidebar-widget contact-info-widget">
                <div class="inner-box">
                    <ul>   
                        <?php if ( $instance['phone'] ) :  ?>
                            <li>
                                <span class="icon fa fa-phone"></span><?php echo wp_kses_post( $instance['phone'] ); ?>
                            </li>
                        <?php endif; ?>
                        <?php if ( $instance['phone'] ) :  ?>
                            <li>
                                <span class="icon fa fa-send"></span><?php echo sanitize_email( $instance['email'] ); ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
        $instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
        $phone = ( $instance ) ? esc_attr($instance['phone']) : '1800 654 7895';
		$email = ( $instance ) ? esc_attr($instance['email']) : 'contact@mindron.com';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone:', 'mindron'); ?></label>
            <input placeholder="<?php esc_attr_e('Phone', 'mindron');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:', 'mindron'); ?></label>
            <input placeholder="<?php esc_attr_e('Email', 'mindron');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
        </p>

		<?php 
	}
	
}

/// Recent News
class Bunch_Recent_News extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Recent_News', /* Name */esc_html__( 'Midron Recent News','mindron' ), array( 'description' => esc_html__( 'Show the Recent News', 'mindron' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget( $args, $instance )
	{
		extract( $args );
		//$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post( $before_widget ); ?>
		
        <!-- Recent Posts -->
        <div class="sidebar-widget popular-posts">
            <div class="sidebar-title"><h2><?php echo wp_kses_post( $instance['title'] ); ?></h2></div>
            
				<?php
				$query_string = array( 'showposts' => $instance['number'] );
				if( $instance['cat'] ) $query_string .= '&category='.$instance['cat'];
				

				$this->posts($query_string);
				?>
            
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance )
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__( 'Recent News', 'mindron' );
		$number = ( $instance ) ? esc_attr($instance['number']) : 4;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'mindron'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'mindron'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'mindron'); ?></label>
            <?php wp_dropdown_categories( array( 'taxonomy' => 'services_category', 'show_option_all'=>esc_html__('All Categories', 'mindron'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
				<?php while( $query->have_posts() ): $query->the_post(); ?>

               		<article class="post">
						<figure class="post-thumb">
							<a href="<?php echo esc_url(get_permalink(get_the_id()));?>">
								<?php the_post_thumbnail( 'mindron_72x64', array( 'class' => 'img-responsive' ) );  ?>
							</a>
						</figure>
						<div class="text"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?></a></div>
						<div class="post-info"><?php echo get_the_date(  ); ?></div>
					</article>
                	
                <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}