<?php
/*
** adding necessarey files
*/

function arrowdesign_add_o_f_s_b_Style_script() {

		$plugin_url = plugin_dir_url( __FILE__ );

		wp_enqueue_style( 'style',  $plugin_url . 'css/style.css');
		wp_enqueue_script('arrowdesign_o_f_s_b_logic_file', plugins_url('/js/logic.js',__FILE__ ));
	}

	add_action('admin_enqueue_scripts', 'arrowdesign_add_o_f_s_b_Style_script');

/**
 * Adds a new settings page under Setting menu
*/
	add_action( 'admin_menu', 'arrowdesign__o_f_s_b__admin_page' );
	function arrowdesign__o_f_s_b__admin_page() {
		//only editor and administrator can edit
		if( current_user_can('editor') || current_user_can('administrator') ) {
		add_options_page( __( 'Out Of Stock Badge' ), __( 'Out Of Stock Badge' ), 'manage_options', 'ad_out_of_stock_badge', 'arrowdesign_o_f_s_b_homepage' );
	}
	}

/**
* Tabs Method
*/
	function arrowdesign_add_out_of_stoc_badg_show_tabs_list( $current = 'first' ) {
		$tabs = array(
			'first'   => __( 'Update Badge Text', 'plugin-textdomain' ),

			);
		$html = '<h2 class="wooLiveSalenav-tabnav-tab-wrapper">';
		foreach( $tabs as $tab => $ad_txt_out_of_stoc_badg ){
			$class = ( $tab == $current ) ? 'nav-tab-active' : '';
			$html .= '<a class="nav-tab ' . esc_html($class) . '" href="?page=ad_out_of_stock_badge&tab=' . esc_html($tab) . '">' . esc_html($ad_txt_out_of_stoc_badg) . '</a>';
		}
		$html .= '</h2>';
		echo $html ;
	}

function arrowdesign_o_f_s_b_homepage(){


    ?>
    <div class="intro_text_class">
        	<h3>Dashboard for adding/changing woocommerce 'Out Of Stock' badge text.</h3>
			<p>Click the following link to contact Arrow Design for <span>
		    <a href="https://arrowdesign.ie">Web Design</a>, Support or WordPress Plugin Development.
        </span></p>

    </div>

		<div class="tabbedElements_firstTab"  >
    <?php

    // ================== Tabs ========================//
  //   $tab = ( ! empty(  sanitize_text_field($_GET['tab'] )) ) ? sanitize_text_field( $_GET['tab'] ) : 'first';
    // arrowdesign_add_out_of_stoc_badg_show_tabs_list( $tab );


   // =========================== Tab 1 ========================//
    if ( 1 == 1 )
	{
?>
        	<!--First tab -->
			</div>

<div class="container_for_left_and_right">
<div class="container_left" >
        			<h2>Instructions </h2>
					<h4>Enter text [to display on badge] in the textbox</h4>
					<h4>Select a badge background color</h4>
					<div class="arrowD_notesDiv">
					<h4><b>Notes:</b></h4>
					<h4>Out of stock product images will display a 'badge'</h4>
					<h4>The 'badge' background color will be the color you select </h4>
					</div>



        		</div>

        <?php
		$ad_out_of_stk_badg_txt = "";

		if (isset($_POST['btn-to-update-text-o-of-stk-badge-ad'])) {

		//add or update badge db meta from user input on form
		$ad_txt_input_field_for_ofsb_lbl = sanitize_text_field ( $_POST['txt-for-update-text-o-of-stk-badge-ad'] );
		$ad_clrSelected_for_ofsb_lbl = sanitize_text_field ( $_POST['ad_Colour_ofsb_bk'] );

		//	badge text
		$ad_out_of_stock_badge_var = get_term_meta('2020', 'ad_out_of_stock_badge_meta', true);
		if(is_null($ad_out_of_stock_badge_var)){

		if(add_term_meta('2020', "ad_out_of_stock_badge_meta" , $ad_txt_input_field_for_ofsb_lbl))
		{echo '<p>Badge Text Added: '.$ad_txt_input_field_for_ofsb_lbl.'</p>';} //end if addition was a success
		} //end add term data on first use

		else{
		if(update_term_meta( '2020', "ad_out_of_stock_badge_meta", $ad_txt_input_field_for_ofsb_lbl))
		{echo '<p>Badge Text Updated To: '.$ad_txt_input_field_for_ofsb_lbl.'</p>';} //end if update was a success
		} //end add term data on first use


		//	background colour selection

		$ad_out_of_stock_badgeClr_var = get_term_meta('2020', 'ad_out_of_stock_badgeClr_meta', true);
		if(is_null($ad_out_of_stock_badgeClr_var)){

		if(add_term_meta('2020', "ad_out_of_stock_badgeClr_meta" , $ad_clrSelected_for_ofsb_lbl))
		{echo '<p>Badge Color Added: '.$ad_clrSelected_for_ofsb_lbl.'</p>';} //end if addition was a success
		} //end add term data on first use

		else{
		if(update_term_meta( '2020', "ad_out_of_stock_badgeClr_meta", $ad_clrSelected_for_ofsb_lbl))
		{echo '<p>Badge Color Updated To: '.$ad_clrSelected_for_ofsb_lbl.'</p>';} //end if update was a success
		} //end add term data on first use

		}//end if button was clicked

		//form for saving and displaying the text
		$ad_rtn_to_shop_txt_lbl_txtbx = get_term_meta('2020', 'ad_out_of_stock_badge_meta', true);
		$ad_out_of_stock_badgeClr_var = get_term_meta('2020', 'ad_out_of_stock_badgeClr_meta', true);

		//dorpdown selected handle, based on stored meta
		$ad_ofsb_purpSelected = '';
		$ad_ofsb_blueSelected = '';
		$ad_ofsb_blackSelected = '';
		$ad_ofsb_redSelected = '';

		if($ad_out_of_stock_badgeClr_var=='Purple'){$ad_ofsb_purpSelected = 'selected';}
		if($ad_out_of_stock_badgeClr_var=='Blue'){$ad_ofsb_blueSelected = 'selected';}
		if($ad_out_of_stock_badgeClr_var=='Black'){$ad_ofsb_blackSelected = 'selected';}
		if($ad_out_of_stock_badgeClr_var=='Red'){$ad_ofsb_redSelected = 'selected';}

		$ad_out_of_stock_badge_var = $ad_rtn_to_shop_txt_lbl_txtbx;
		?>
		<!-- form to handle user input of text for button and beside button -->

<!-- form to handle user input of text for button and beside button -->
<div class="container_right">
<h2 class="enter-text" > <span class="enter-text-span">Enter Your Chosen Text In The Field Below</span></h2>
<form method="POST" action="">
<div style="margin-bottom:40px;">
<label class="drod_focb-ad" for="text-for-ofsb-ad" >Out Of Stock Badge Text:</label>
<input type="text" name="txt-for-update-text-o-of-stk-badge-ad" oninput="arrowD_changeExampleDisplayTxt(event)" class="names-list-first-name" value="<?php echo  esc_html($ad_rtn_to_shop_txt_lbl_txtbx); ?>">
</div>
<div>
					  <label class="drod_focb-ad" for="drod_ofsb-ad" >Select Badge Background Colour:</label>

	
	<input type="color" class="arrowD_colorPicker" name="ad_Colour_ofsb_bk" onchange="arrowD_changeExampleDisplayClr(event)" value="<?php echo  esc_html($ad_out_of_stock_badgeClr_var); ?>"></input></div>
			<br><br>
					 <br><br>
					 <?php echo '<span class="enter-text-span">Current Text: '.esc_html($ad_rtn_to_shop_txt_lbl_txtbx).'<span>' ?>
					 <br>
					 <?php echo '<span class="enter-text-span">Current Color: '.esc_html($ad_out_of_stock_badgeClr_var).'<span>' ?>
					 <br>
			 <button class="button-primary-update-names-and-titles" name="btn-to-update-text-o-of-stk-badge-ad" type="submit" >Update</button>
	</form>
   		</div>
       		</div>

        <?php
    }


$exampleDisplayHtml = arrowD_returnExampleSoldOutDisplay_html($ad_rtn_to_shop_txt_lbl_txtbx,$ad_out_of_stock_badgeClr_var);
echo $exampleDisplayHtml;

}


function arrowD_returnExampleSoldOutDisplay_html($txt,$color){
	$exampleHtml = '';
	$exampleHtml .= '<div class="arrowD_example_soldOutDiv_holder">';
	$exampleHtml .= '<div style="text-align: center;font-weight:bold;margin-bottom:1vw;">Example Display</div>';
	$exampleHtml .= '<div class="arrowD_example_soldOutDiv">';
	$exampleHtml .= '<div id="arrowD_exampleBadgeDiv" class="arrowD_soldOutBadgeDiv" style="background-color:'.$color.';">'.$txt.'</div>';
	$exampleHtml .= '</div>';
	$exampleHtml .= '</div>';//holder
	
	return $exampleHtml;
}//arrowD_drawExampleSoldOutDisplay

