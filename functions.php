<?php

function theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}

add_action( 'wp_enqueue_scripts', 'theme_styles');

function theme_js() {

	global $wp_scripts;

	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js' );
	wp_enqueue_script( 'my_custom_js', get_template_directory_uri() . '/js/scripts.js');

}

add_action( 'wp_enqueue_scripts', 'theme_js');
// POST THUMBNAIL SUPPORT
add_theme_support( 'post-thumbnails', array( 'post' ) ); // Add it for posts
set_post_thumbnail_size( 352, 462 ); // 50 pixels wide by 50 pixels tall, box resize mode


// Navigation menu Registration
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'main_navigation' => 'Main Navigation',  //main navigation registration
		  'sub_menu_navigation' => 'Sidebar navigation',  //side navigation registration

		)
	);
}

// DELETE ADMIN BAR!!!!!!!!!
function my_function_admin_bar(){
return false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

 // Register custom navigation walker
require_once('wp_bootstrap_navwalker.php');

function bpdev_redirect_to_profile( $redirect_to_calculated, $redirect_url_specified, $user ) {

	if ( ! $user || is_wp_error( $user ) ) {
		return $redirect_to_calculated;
	}
	//If the redirect is not specified, assume it to be dashboard
	if ( empty( $redirect_to_calculated ) ) {
		$redirect_to_calculated = admin_url();
	}

	// if the user is not site admin, redirect to his/her profile
	if ( ! is_super_admin( $user->ID ) ) {
		return bp_core_get_user_domain( $user->ID );
	} else {
		//if site admin or not logged in, do not do anything much
		return $redirect_to_calculated;
	}
}

add_filter( 'login_redirect', 'bpdev_redirect_to_profile', 100, 3 );
/* ------------------------------------------------------------
:: ADD GROUPS EXTENSIONS
--------------------------------------------------------------- */
function bob_add_group_extension() {
if ( class_exists( 'BP_Group_Extension' ) ) :
class Group_Extension_Ville extends BP_Group_Extension {
function __construct() {
$args = array(
'slug' => 'add-inq-form',
'name' => 'Inquiry',
'nav_item_position' => 1,
 'screens' => array(
		 'edit' => array(
				 'name' => 'Inquiry',
				 // Changes the text of the Submit button
				 // on the Edit page
				 'submit_text' => 'Submit',
		 ),
		 'create' => array(
				 'position' => 1,
		 ),
 )
);
parent::init( $args );
}
function display() {
$group_id = bp_get_group_id();
$step1ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step1ans1');
$step1ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step1ans2');
$step1ans3 = groups_get_groupmeta ( $group_id, 'group_ext_step1ans3');
$step3ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step3ans1');
$step3ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step3ans2');
$step4ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step4ans1');
$step4ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step4ans2');
$step5ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step5ans1');
$step6ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step6ans1');
$step6ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step6ans2');
$step7ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step7ans1');
$step7ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step7ans2');
$step8ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step8ans1');
$step8ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step8ans2');
$step9ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step9ans1');
$step9ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step9ans2');
$step9ans3 = groups_get_groupmeta ( $group_id, 'group_ext_step9ans3');
$step10ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step10ans1');
$step10ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step10ans2');
$step10ans3 = groups_get_groupmeta ( $group_id, 'group_ext_step10ans3');
$step12ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step12ans1');
$step13ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step13ans1');
$step13ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step13ans2');

//Step one
?>

<?php $the_query = new WP_Query( 'page_id=53' ); ?>

<?php while ($the_query -> have_posts()) : $the_query -> the_post();?>

<div id="inq_wrapper">
	<h2 id="inq_page">Collaborative Inquiry Stages</h2>
	<div id="accordion" role="tablist" aria-multiselectable="true">
		<!-- CARD ONE -->
	  <div class="card">
	    <div class="card-header" role="tab" id="headingOne">
	      <h3 class="mb-0">
	        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	          Stage 1 - Team Setup
	        </a>
	      </h3>
	    </div>

	    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
	      <div class="card-block">
					<?php
					if($step1ans1)
					echo "<h4>" . get_field('step_1_ques_1') . "</h4><p>$step1ans1</p>";
					if($step1ans2)
					echo "<h4>" . get_field('step_1_ques_2') . "</h4><p>$step1ans2</p>";
					if($step1ans3)
					echo "<h4>" . get_field('step_1_ques_3') . "</h4><p>$step1ans3</p>";
					?>
	      </div>
	    </div>
	  </div>
		<!-- END CARD ONE -->

		<!-- START CARD TWO -->
	  <div class="card">
	    <div class="card-header" role="tab" id="headingTwo">
	      <h3 class="mb-0">
	        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
	          Stage 1 - Plan : Determine a Focus
	        </a>
	      </h3>
	    </div>
	    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
	      <div class="card-block">
					<?php
					//Step three
					if($step3ans1)
					echo "<h4>" . get_field('step_3_ques_1') . "</h4><p>$step3ans1</p>";
					if($step3ans2)
					echo "<h4>" . get_field('step_3_ques_2') . "</h4><p>$step3ans2</p>";
					//Step Four
					if($step4ans1)
					echo "<h4>" . get_field('step_4_ques_1') . "</h4><p>$step4ans1</p>";
					if($step4ans2)
					echo "<h4>" . get_field('step_4_ques_2') . "</h4><p>$step4ans2</p>";
					?>
				</div>
	    </div>
	  </div>
		<!-- END CARD TWO -->

		<!-- START CARD THREE -->
	  <div class="card">
	    <div class="card-header" role="tab" id="headingThree">
	      <h3 class="mb-0">
	        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
	          Stage 1 - Plan: Action Planning

	        </a>
	      </h3>
	    </div>
	    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
	      <div class="card-block">
					<?php
					//Step Five
					if($step5ans1)
					echo "<h4>" . get_field('step_5_ques_1') . "</h4><p>$step5ans1</p>";
					if($step6ans1)
					echo "<h4>" . get_field('step_6_ques_1') . "</h4><p>$step6ans1</p>";
					if($step6ans1)
					echo "<h4>" . get_field('step_6_ques_2') . "</h4><p>$step6ans2</p>";
					if($step7ans1)
					echo "<h4>" . get_field('step_7_ques_1') . "</h4><p>$step7ans1</p>";
					if($step7ans2)
					echo "<h4>" . get_field('step_7_ques_2') . "</h4><p>$step7ans2</p>";
					?>      </div>
	    </div>
	  </div>
		<!-- END CARD THREE -->

		<!-- START CARD FOUR -->
		<div class="card">
	    <div class="card-header" role="tab" id="headingFour">
	      <h3 class="mb-0">
	        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
	          Stage 1 - Plan: Professional Learning And Resources

	        </a>
	      </h3>
	    </div>
	    <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
	      <div class="card-block">
					<?php
					//Step Eight
					if($step8ans1)
					echo "<h4>" . get_field('step_8_ques_1') . "</h4><p>$step8ans1</p>";
					if($step8ans2)
					echo "<h4>" . get_field('step_8_ques_2') . "</h4><p>$step8ans2</p>";
					?>
				</div>
	    </div>
	  </div>
		<!-- END CARD FOUR -->

		<!-- START CARD FIVE -->
		<div class="card">
	    <div class="card-header" role="tab" id="headingFive">
	      <h3 class="mb-0">
	        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
	          Stage 1 - Plan: Planning for collecting data and looking for evidence

	        </a>
	      </h3>
	    </div>
	    <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
	      <div class="card-block">
					<?php
					//Step Nine
					if($step9ans1)
					echo "<h4>" . get_field('step_9_ques_1') . "</h4><p>$step9ans1</p>";
					if($step9ans2)
					echo "<h4>" . get_field('step_9_ques_2') . "</h4><p>$step9ans2</p>";
					if($step9ans3)
					echo "<h4>" . get_field('step_9_ques_3') . "</h4><p>$step9ans4</p>";
					?>
				</div>
	    </div>
	  </div>
		<!-- END CARD FIVE -->

		<!-- START CARD SIX -->
		<div class="card">
	    <div class="card-header" role="tab" id="headingSix">
	      <h3 class="mb-0">
	        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
	          Stage 1 - Plan: Format

	        </a>
	      </h3>
	    </div>
	    <div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingSix">
	      <div class="card-block">
					<?php
					//Step Ten
					if($step10ans1)
					echo "<h4>" . get_field('step_10_ques_1') . "</h4><p>$step10ans1</p>";
					if($step10ans2)
					echo "<h4>" . get_field('step_10_ques_2') . "</h4><p>$step10ans2</p>";
					if($step10ans3)
					echo "<h4>" . get_field('step_10_ques_3') . "</h4><p>$step10ans3</p>";
					?>
				</div>
	    </div>
	  </div>
		<!-- END CARD SIX -->

		<!-- START CARD Seven -->
		<div class="card">
	    <div class="card-header" role="tab" id="headingSeven">
	      <h3 class="mb-0">
	        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
	          Stage 1 - Plan: Instructional Change

	        </a>
	      </h3>
	    </div>
	    <div id="collapseSeven" class="collapse" role="tabpanel" aria-labelledby="headingSeven">
	      <div class="card-block">
					<?php
					//Step Twelve
					if($step12ans1)
					echo "<h4>" . get_field('step_12_ques_1') . "</h4><p>$step10ans3</p>";
					?>
				</div>
	    </div>
	  </div>
		<!-- END CARD SEVEN -->
		<!-- START CARD EIGHT -->
		<div class="card">
	    <div class="card-header" role="tab" id="headingEight">
	      <h3 class="mb-0">
	        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
	          Stage 1 - Plan: Logistics
	        </a>
	      </h3>
	    </div>
	    <div id="collapseEight" class="collapse" role="tabpanel" aria-labelledby="headingEight">
	      <div class="card-block">
					<?php
					//Step Thirteen
					if($step13ans1)
					echo "<h4>" . get_field('step_13_ques_1') . "</h4><p>$step10ans3</p>";
					if($step13ans2)
					echo "<h4>" . get_field('step_13_ques_2') . "</h4><p>$step10ans3</p>";
					?>
				</div>
	    </div>
	  </div>
		<!-- END CARD EIGHT -->
	</div>
</div>
<?php endwhile; ?>

<?php
}
function settings_screen( $group_id = NULL ) {
	$step1ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step1ans1');
	$step1ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step1ans2');
	$step1ans3 = groups_get_groupmeta ( $group_id, 'group_ext_step1ans3');
	$step3ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step3ans1');
	$step3ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step3ans2');
	$step4ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step4ans1');
	$step4ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step4ans2');
	$step5ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step5ans1');
	$step6ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step6ans1');
	$step6ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step6ans2');
	$step7ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step7ans1');
	$step7ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step7ans2');
	$step8ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step8ans1');
	$step8ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step8ans2');
	$step9ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step9ans1');
	$step9ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step9ans2');
	$step9ans3 = groups_get_groupmeta ( $group_id, 'group_ext_step9ans3');
	$step10ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step10ans1');
	$step10ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step10ans2');
	$step10ans3 = groups_get_groupmeta ( $group_id, 'group_ext_step10ans3');
	$step12ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step12ans1');
	$step13ans1 = groups_get_groupmeta ( $group_id, 'group_ext_step13ans1');
	$step13ans2 = groups_get_groupmeta ( $group_id, 'group_ext_step13ans2');
?>
<div id="rootwizard" class="container">
	<!-- WIZARD TABS -->
  <!-- NOTE: WIZARD TABS ARE POSITIONED ABSOLUTE OFF SCREEN FOR UI REASONS -->
  <div id="pill_nav" class="navbar">
    <div class="navbar-inner">
      <div class="container">
        <ul>
    	    <li><a href="#tab1" data-toggle="tab"></a></a></li>
  	      <li><a href="#tab2" data-toggle="tab"></a></li>
  	      <li><a href="#tab3" data-toggle="tab"></a></li>
  	      <li><a href="#tab4" data-toggle="tab"></a></li>
  	      <li><a href="#tab5" data-toggle="tab"></a></li>
  	      <li><a href="#tab6" data-toggle="tab"></a></li>
  	      <li><a href="#tab7" data-toggle="tab"></a></li>
          <li><a href="#tab8" data-toggle="tab"></a></li>
          <li><a href="#tab9" data-toggle="tab"></a></li>
          <li><a href="#tab10" data-toggle="tab"></a></li>
          <li><a href="#tab11" data-toggle="tab"></a></li>
          <li><a href="#tab12" data-toggle="tab"></a></li>
          <li><a href="#tab13" data-toggle="tab"></a></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- END WIZIARD TABS -->

  <!-- START PROGRESS BAR -->
  <div id="bar" class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
  </div>
  <!-- END PROGRESS BAR -->
	<!-- STAGE START -->
	  <div class="tab-content">
	    <!-- START TAB ONE -->
			<?php $the_query = new WP_Query( 'page_id=53' ); ?>

<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>



	    <div class="tab-pane row" id="tab1">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_1_title'); ?></h2>
	      </div>

	      <div class="left_panel col-md-6">

	        <div class="embed-container">
	        <?php the_field('step_1_video'); ?>
	        </div>
	      </div>
	      <div class="right_panel col-md-6">
	        <p><?php the_field('step_1_ques_1'); ?></p>

					<input type="text" id="step_1_answ_1" value="<?php echo $step1ans1; ?>" tabindex="1" size="20" name="group_ext_step1ans1" />

	        <p><?php the_field('step_1_ques_2'); ?></p>
	        <input type="text" id="step_1_answ_2" value="<?php echo $step1ans2; ?>" tabindex="1" size="20" name="group_ext_step1ans2" />

	        <p><?php the_field('step_1_ques_3'); ?></p>
	        <input type="text" id="step_1_answ_3" value="<?php echo $step1ans3; ?>" tabindex="1" size="20" name="group_ext_step1ans3" />

	      </div>
	      <div class="ask_moses col-md-12">

	      </div>
	    </div>
	    <!-- END TAB ONE -->

	    <!-- START TAB TWO -->
	    <div class="tab-pane row" id="tab2">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_2_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-12">
	          <!-- START PLAYLIST -->
	            <!-- START PLAYLIST ITEM -->
	            <div class="playlist_item row">
	              <div class="video col-md-5">
	                <div class="embed-container">
	                <?php the_field('step_2_video_1'); ?>
	                </div>
	              </div>
	              <div class="desc col-md-7">
	                <h3><?php the_field('step_2_vid_desc_1');?></h3>
	                <p>
	                  NOTE: Add more content about these videos?
	                </p>
	              </div>
	            </div>
	            <!-- END PLAYLIST ITEM -->

	            <!-- START PLAYLIST ITEM -->
	            <div class="playlist_item row">
	              <div class="video col-md-5">
	                <div class="embed-container">
	                <?php the_field('step_2_video_2'); ?>
	                </div>
	              </div>
	              <div class="desc col-md-7">
	                <h3><?php the_field('step_2_vid_desc_2');?></h3>
	                <p>
	                  NOTE: Add more content about these videos?
	                </p>
	              </div>
	            </div>
	            <!-- END PLAYLIST ITEM -->

	            <!-- START PLAYLIST ITEM -->
	            <div class="playlist_item row">
	              <div class="video col-md-5">
	                <div class="embed-container">
	                <?php the_field('step_2_video_3'); ?>
	                </div>
	              </div>
	              <div class="desc col-md-7">
	                <h3><?php the_field('step_2_vid_desc_3');?></h3>
	                <p>
	                  NOTE: Add more content about these videos?
	                </p>
	              </div>
	            </div>
	            <!-- END PLAYLIST ITEM -->

	          <!-- END PLAYLIST -->
	        </div>

	    </div>
	    <!-- END TAB TWO -->

	    <!-- START TAB THREE -->
	    <div class="tab-pane row" id="tab3">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_3_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <div class="embed-container">
	          <?php the_field('step_3_video'); ?>
	          </div>
	        </div>
	        <div class="right_panel col-md-6">
	          <p><?php the_field('step_3_ques_1'); ?></p>
	          <input type="text" id="step_3_answ_1" value="<?php echo $step3ans1; ?>" tabindex="1" size="20" name="group_ext_step3ans1" />

	          <p><?php the_field('step_3_ques_2'); ?></p>
	          <input type="text" id="step_3_answ_2" value="<?php echo $step3ans2; ?>" tabindex="1" size="20" name="group_ext_step3ans2" />
	        </div>
	    </div>
	    <!-- END TAB THREE -->

	    <!-- START TAB FOUR -->
	    <div class="tab-pane row" id="tab4">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_4_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <p><?php the_field('step_4_ques_1'); ?></p>
	          <input type="text" id="step_4_answ_1" value="<?php echo $step4ans1; ?>" tabindex="1" size="20" name="group_ext_step4ans1" />
	          <p><?php the_field('step_4_ques_2'); ?></p>
	          <input type="text" id="step_4_answ_2" value="<?php echo $step4ans2; ?>" tabindex="1" size="20" name="group_ext_step4ans2" />
	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB FOUR -->

	    <!-- START TAB FIVE -->
	    <div class="tab-pane row" id="tab5">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_5_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <p><?php the_field('step_5_ques_1'); ?></p>
	          <input type="text" id="step_5_answ_1" value="<?php echo $step5ans1; ?>" tabindex="1" size="20" name="group_ext_step5ans1" />
	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB FIVE -->

	    <!-- START TAB SIX -->
	    <div class="tab-pane row" id="tab6">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_6_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <p><?php the_field('step_6_ques_1'); ?></p>
	          <input type="text" id="step_6_answ_1" value="<?php echo $step6ans1; ?>" tabindex="1" size="20" name="group_ext_step6ans1" />
	          <p><?php the_field('step_6_ques_2'); ?></p>
	          <input type="text" id="step_6_answ_2" value="<?php echo $step6ans2; ?>" tabindex="1" size="20" name="group_ext_step6ans2" />

	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB SIX -->

	    <!-- START TAB SEVEN -->
	    <div class="tab-pane row" id="tab7">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_7_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <p><?php the_field('step_7_ques_1'); ?></p>
	          <input type="text" id="step_7_answ_1" value="<?php echo $step7ans1; ?>" tabindex="1" size="20" name="group_ext_step7ans1" />
	          <p><?php the_field('step_7_ques_2'); ?></p>
	          <input type="text" id="step_7_answ_2" value="<?php echo $step7ans2; ?>" tabindex="1" size="20" name="group_ext_step7ans2" />

	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB SEVEN -->

	    <!-- START TAB EIGHT -->
	    <div class="tab-pane row" id="tab8">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_8_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <p><?php the_field('step_8_ques_1'); ?></p>
	          <input type="text" id="step_8_answ_1" value="<?php echo $step8ans1; ?>" tabindex="1" size="20" name="group_ext_step8ans1" />
	          <p><?php the_field('step_8_ques_2'); ?></p>
	          <input type="text" id="step_8_answ_2" value="<?php echo $step8ans2; ?>" tabindex="1" size="20" name="group_ext_step8ans2" />
	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB EIGHT -->

	    <!-- START TAB NINE -->
	    <div class="tab-pane row" id="tab9">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_9_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <!-- START PLAYLIST ITEM -->
	          <div class="playlist_item row">
	            <div class="video col-md-5">
	              <div class="embed-container">
	              <?php the_field('step_9_video_1'); ?>
	              </div>
	            </div>
	            <div class="desc col-md-7">
	              <h3><?php the_field('step_9_vid_desc_1');?></h3>
	              <p>
	                NOTE: Add more content about these videos?
	              </p>
	            </div>
	          </div>
	          <!-- END PLAYLIST ITEM -->
	          <!-- START PLAYLIST ITEM -->
	          <div class="playlist_item row">
	            <div class="video col-md-5">
	              <div class="embed-container">
	              <?php the_field('step_9_video_2'); ?>
	              </div>
	            </div>
	            <div class="desc col-md-7">
	              <h3><?php the_field('step_9_vid_desc_2');?></h3>
	              <p>
	                NOTE: Add more content about these videos?
	              </p>
	            </div>
	          </div>
	          <!-- END PLAYLIST ITEM -->
	        </div>
	        <div class="right_panel col-md-6">
	          <p><?php the_field('step_9_ques_1'); ?></p>
	          <input type="text" id="step_9_answ_1" value="<?php echo $step9ans1; ?>" tabindex="1" size="20" name="group_ext_step9ans1" />
	          <p><?php the_field('step_9_ques_2'); ?></p>
	          <input type="text" id="step_9_answ_2" value="<?php echo $step9ans2; ?>" tabindex="1" size="20" name="group_ext_step9ans2" />
	          <p><?php the_field('step_9_ques_3'); ?></p>
	          <input type="text" id="step_9_answ_3" value="<?php echo $step9ans3; ?>" tabindex="1" size="20" name="group_ext_step9ans3" />
	        </div>
	    </div>
	    <!-- END TAB NINE -->

	    <!-- START TAB TEN -->
	    <div class="tab-pane row" id="tab10">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_10_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <p><?php the_field('step_10_ques_1'); ?></p>
	          <input type="text" id="step_10_answ_1" value="<?php echo $step10ans1; ?>" tabindex="1" size="20" name="group_ext_step10ans1" />
	          <p><?php the_field('step_10_ques_2'); ?></p>
	          <input type="text" id="step_10_answ_2" value="<?php echo $step10ans2; ?>" tabindex="1" size="20" name="group_ext_step10ans2" />
	          <p><?php the_field('step_10_ques_3'); ?></p>
	          <input type="text" id="step_10_answ_3" value="<?php echo $step10ans3; ?>" tabindex="1" size="20" name="group_ext_step10ans3" />
	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB TEN -->

	    <!-- START TAB ELEVEN -->
	    <div class="tab-pane row" id="ta11">
	        <div class="panel_title col-md-12">
	          <h2><?php the_field('step_11_title'); ?></h2>
	        </div>
	      	<div class="left_panel col-md-6">
	            <?php the_field('step_11_video_1'); ?>
	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB ELEVEN -->

	    <!-- START TAB TWELVE -->
	    <div class="tab-pane row"  id="tab12">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_12_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <p><?php the_field('step_12_ques_1'); ?></p>
	          <input type="text" id="step_12_answ_1" value="<?php echo $step12ans1; ?>" tabindex="1" size="20" name="group_ext_step12ans1" />
	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB TWELVE -->

	    <!-- START TAB THIRTEEN -->
	    <div class="tab-pane row" id="tab13">
	      <div class="panel_title col-md-12">
	        <h2><?php the_field('step_13_title'); ?></h2>
	      </div>
	      	<div class="left_panel col-md-6">
	          <p><?php the_field('step_13_ques_1'); ?></p>
	          <input type="text" id="step_13_answ_1" value="<?php echo $step13ans1; ?>" tabindex="1" size="20" name="group_ext_step13ans1" />
	          <p><?php the_field('step_13_ques_2'); ?></p>
	          <input type="text" id="step_13_answ_2" value="<?php echo $step13ans2; ?>" tabindex="1" size="20" name="group_ext_step13ans2" />
	        </div>
	        <div class="right_panel col-md-6">

	        </div>
	    </div>
	    <!-- END TAB THIRTEEN -->
			  <?php endwhile; ?>
	  	<ul class="pager wizard col-width-12">
	  		<li class="previous first" style="display:none;"><a class="btn" href="#">First</a></li>
	  		<li class="previous"><a class="btn" href="#">Previous</a></li>
	  		<li class="next last" style="display:none;"><a class="btn" href="#">Last</a></li>
	  	  <li class="next"><a class="btn" href="#">Next</a></li>
	  	</ul>
	  </div>
	  <!-- END TAB WRAP -->
	</div>
	<!-- WIZARD WRAP -->
<?php
}
function settings_screen_save( $group_id = NULL ) {

if ( isset( $_POST['group_ext_step1ans1'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step1ans1', sanitize_text_field($_POST['group_ext_step1ans1']) );
}
if ( isset( $_POST['group_ext_step1ans2'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step1ans2', sanitize_text_field($_POST['group_ext_step1ans2']) );
}
if ( isset( $_POST['group_ext_step1ans3'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step1ans3', sanitize_text_field($_POST['group_ext_step1ans3']) );
}
if ( isset( $_POST['group_ext_step3ans1'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step3ans1', sanitize_text_field($_POST['group_ext_step3ans1']) );
}
if ( isset( $_POST['group_ext_step3ans2'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step3ans2', sanitize_text_field($_POST['group_ext_step3ans2']) );
}
if ( isset( $_POST['group_ext_step4ans1'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step4ans1', sanitize_text_field($_POST['group_ext_step4ans1']) );
}
if ( isset( $_POST['group_ext_step4ans2'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step4ans2', sanitize_text_field($_POST['group_ext_step4ans2']) );
}
if ( isset( $_POST['group_ext_step5ans1'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step5ans1', sanitize_text_field($_POST['group_ext_step5ans1']) );
}
if ( isset( $_POST['group_ext_step6ans1'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step6ans1', sanitize_text_field($_POST['group_ext_step6ans1']) );
}
if ( isset( $_POST['group_ext_step6ans2'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step6ans2', sanitize_text_field($_POST['group_ext_step6ans2']) );
}
if ( isset( $_POST['group_ext_step7ans1'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step7ans1', sanitize_text_field($_POST['group_ext_step7ans1']) );
}
if ( isset( $_POST['group_ext_step7ans2'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step7ans2', sanitize_text_field($_POST['group_ext_step7ans2']) );
}
if ( isset( $_POST['group_ext_step8ans1'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step8ans1', sanitize_text_field($_POST['group_ext_step8ans1']) );
}
if ( isset( $_POST['group_ext_step8ans2'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step8ans2', sanitize_text_field($_POST['group_ext_step8ans2']) );
}
if ( isset( $_POST['group_ext_step9ans1'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step9ans1', sanitize_text_field($_POST['group_ext_step9ans1']) );
}
if ( isset( $_POST['group_ext_step9ans2'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step9ans2', sanitize_text_field($_POST['group_ext_step9ans2']) );
}
if ( isset( $_POST['group_ext_step9ans3'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step9ans3', sanitize_text_field($_POST['group_ext_step9ans3']) );
}
if ( isset( $_POST['group_ext_step10ans1'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step10ans1', sanitize_text_field($_POST['group_ext_step10ans1']) );
}
if ( isset( $_POST['group_ext_step10ans2'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step10ans2', sanitize_text_field($_POST['group_ext_step10ans2']) );
}
if ( isset( $_POST['group_ext_step10ans3'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step10ans3', sanitize_text_field($_POST['group_ext_step10ans3']) );
}
if ( isset( $_POST['group_ext_step12ans1'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step12ans1', sanitize_text_field($_POST['group_ext_step12ans1']) );
}
if ( isset( $_POST['group_ext_step13ans1'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step13ans1', sanitize_text_field($_POST['group_ext_step13ans1']) );
}
if ( isset( $_POST['group_ext_step13ans2'] ) ) {
groups_update_groupmeta( $group_id, 'group_ext_step13ans2', sanitize_text_field($_POST['group_ext_step13ans2']) );
}
}
}
bp_register_group_extension( 'Group_Extension_Ville' );
endif; // if ( class_exists( 'BP_Group_Extension' ) )
}
add_action('bp_init', 'bob_add_group_extension');
?>
