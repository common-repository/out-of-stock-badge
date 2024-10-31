<?php

/*
  Plugin Name: Out Of Stock Badge
  Plugin URI: https://arrowdesign.ie/out-of-stock-badge/
  Description: A plugin to add a customizable badge to product images on woocommerce shop page to advise customers that the product is out of stock. No coding required - easy admin panel to save the badge text.
  Version: 1.3.1
  Author: Arrow Design
  Author URI: https://arrowdesign.ie
 */

// Exit if accessed directly
  if (!defined('ABSPATH'))
    exit;

/*
* Admin panel for saving OUT OF STOCK
* LABEL text
*/
include_once 'admin/admin.php';

/*
* Hook function for showing continue shopping from cart page
* text on the front end
*/

	function arrowdesign_ie_out_of_stock_badge() {



	// txt for badge, set defaults or populate from meta
	$ad_out_of_stock_badge_var = get_term_meta('2020', 'ad_out_of_stock_badge_meta', true);
	if ( ($ad_out_of_stock_badge_var =="") || (is_null($ad_out_of_stock_badge_var)) ) {
	$ad_out_of_stock_badge_var="This is currently sold out";
	}//end if

		//get or set the colourScheme

		$ad_out_of_stock_badgeClr_var = get_term_meta('2020', 'ad_out_of_stock_badgeClr_meta', true);
		if(is_null($ad_out_of_stock_badgeClr_var)){
		$ad_out_of_stock_badgeClr_scheme = 'background: #654ea3;color: #fff;font-size: 14px;font-weight: 600;padding: 5px 10px 5px 10px;position: absolute;right: 10px;left:10px;top:10px;z-index: 100;';
		}
		else
		{
		$ad_out_of_stock_badgeClr_scheme = 'background: '.$ad_out_of_stock_badgeClr_var.';color: #fff;font-size: 14px;font-weight: 600;padding: 5px 10px 5px 10px;position: absolute;right: 10px;left:10px;top:10px;z-index: 100;';	
		}

		global $product;
		if ( !$product->is_in_stock() )
		{
		echo '<span class="" style="'.$ad_out_of_stock_badgeClr_scheme.'">'.$ad_out_of_stock_badge_var.'</span>';
		}

}//end function
	add_action( 'woocommerce_before_shop_loop_item_title', 'arrowdesign_ie_out_of_stock_badge' );


	//add settings link to plugin page
function addubofsb_plugin_settings_link($links) {
	  $settings_link_ad_plugin_ofsb_Options = '<a href="options-general.php?page=ad_out_of_stock_badge.php">Settings</a>';
	  array_unshift($links, $settings_link_ad_plugin_ofsb_Options);
	  return $links;
	}
	$plugin_ad_ofsb_badge = plugin_basename(__FILE__);
	add_filter("plugin_action_links_$plugin_ad_ofsb_badge", 'addubofsb_plugin_settings_link' );

	//add documentation link and support link to plugin page
function addubofsb_plugin_page_doc_meta_ofsb( $ad_plugin_links, $file ) {
		if ( plugin_basename( __FILE__ ) == $file ) {
			$ad_plugin_row_meta_ofsb = array(
			  'ad_ofsb_docs'    => '<a href="' . esc_url( 'https://arrowdesign.ie/out_of_stock_badge/' ) . '" target="_blank" aria-label="' . esc_attr__( 'Plugin Additional Links', 'domain' ) . '" >' . esc_html__( 'Documentation', 'domain' ) . '</a>',

			'ad_ofsb_support'    => '<a href="' . esc_url( 'https://arrowdesign.ie/contact-arrow-design-2/' ) . '" target="_blank" aria-label="' . esc_attr__( 'Plugin Additional Links', 'domain' ) . '" >' . esc_html__( 'Support', 'domain' ) . '</a>'
			);

		return is_null($ad_plugin_links) ? $ad_plugin_row_meta_ofsb : array_merge( $ad_plugin_links, $ad_plugin_row_meta_ofsb );
 		}

		return (array) $ad_plugin_links;
 	}
add_filter( 'plugin_row_meta', 'addubofsb_plugin_page_doc_meta_ofsb', 10, 2 );