<?php

/**
 * Plugin Name: Simple Tag Manager
 * Plugin URI: http://clarknikdelpowell.com
 * Description: An unopinionated plugin for adding GTM scripts.
 * Version: 1.0.0
 * Author: Glenn Welser
 * Author URI: hhttp://clarknikdelpowell.com/agency/people/glenn
 * License: GPL2
 *
 * Copyright (C) 2017  Glenn Welser  glenn@clarknikdelpowell.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
class Simple_Tag_Manager {

	/**
	 * GTM Code
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	public $gtm = '';

	/**
	 * Setup WordPress hooks.
	 *
	 * @since 1.0.0
	 */
	public function run() {

		add_action( 'wp_head', array( $this, 'gtm_header_script' ), 1 );

		/**
		 * In most cases, we'll have to add a hook/action into the theme
		 * so we can get this script block in the correct spot after the
		 * opening <body> tag.
		 */
		add_action( 'after_body_open', array( $this, 'gtm_body_script' ) );

	}

	/**
	 * Add GTM script to header
	 *
	 * @since 1.0.0
	 */
	public function gtm_header_script() {
		?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','<?php echo $this->gtm ?>');</script>
		<!-- End Google Tag Manager -->
		<?php
	}

	/**
	 * Add GTM script to body
	 *
	 * @since 1.0.0
	 */
	public function gtm_body_script() {
		?>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $this->gtm ?>"
				height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<?php
	}
}

// Instantiate
$simple_tag_manager = new Simple_Tag_Manager();
$simple_tag_manager->run();
