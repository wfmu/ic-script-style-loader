<?php

	/**
	* @package Insert Culture Script and Style Load Plugin
	* @version 1.0.0
	**/

	/*
	Plugin Name: Insert Culture Script and Style Load Plugin
	Plugin URI: 
	Description: Loads scripts and styles
	Author: Insert Culture | Joey Dehnert
	Version: 1.0.0
	Author URI: insertculture.com
	*/

	$ic_script_style_loader = new IC_Script_Style_Loader();

	class IC_Script_Style_Loader {
		
		const LANG = "ic_script_style_loader";

		public function __construct(){

			add_action("template_redirect", array($this, "load_styles_scripts"));

		}

		public function load_styles_scripts(){
			
			$site_url_wp = str_replace("wp", "", site_url()); 
            $site_url = str_replace("http:", "", $site_url_wp); 

            $theme_name = wp_get_theme();

            $full_path = $site_url . "/app/themes/" . $theme_name;


            // $full_path = get_stylesheet_directory_uri();

			if(!is_admin()){

				// css
				wp_enqueue_style( 'wfmu-stylesheet', $full_path . "/library/css/main.css");

				// header scripts
				wp_deregister_script('jquery');
				wp_enqueue_script('modernizr', $full_path . "/library/bower_components/modernizr/modernizr.js", '', false, false);
				wp_enqueue_script('jquery-bower', $full_path . "/library/bower_components/jquery/dist/jquery.min.js", '', false, false);

				// footer scripts
				wp_enqueue_script('moment-js', $full_path . "/library/bower_components/moment/min/moment.min.js", '', false, true);
				wp_enqueue_script('moment-timezone-js', $full_path . "/library/bower_components/moment-timezone/builds/moment-timezone-with-data.min.js", '', false, true);
				wp_enqueue_script('lazy-load-js', $full_path . "/library/js/vendor/jquery.lazyload.min.js", '', false, true);

				wp_enqueue_script('fmu-bootstrap-carousel', $full_path . "/library/js/vendor/bootstrap.carousel.min.js", '', false, true);				wp_enqueue_script('fmu-front', $full_path . "/library/js/interface/front.js", '', false, true);
				wp_enqueue_script('fmu-feeds', $full_path . "/library/js/interface/feeds.js", '', false, true);
				wp_enqueue_script('fmu-playing-today', $full_path . "/library/js/interface/playing-today.js", '', false, true);
				wp_enqueue_script('fmu-bootstrap-collapse', $full_path . "/library/js/vendor/bootstrap.collapse.min.js?ver=4.4", '', false, true);
				wp_enqueue_script('fmu-pledge', $full_path . "/library/js/interface/pledge.js", '', false, true);
				wp_enqueue_script('fmu-pledge-premiums', $full_path . "/library/js/interface/pledge-premiums.js", '', false, true);
				wp_enqueue_script('fmu-pledge-warehouse', $full_path . "/library/js/interface/pledge-warehouse.js", '', false, true);				
				wp_enqueue_script('fmu-pledge-checkout', $full_path . "/library/js/interface/pledge-checkout.js", '', false, true);
				wp_enqueue_script('fmu-pledge-steps', $full_path . "/library/js/interface/pledge-steps.js", '', false, true);
				wp_enqueue_script('fmu-pledge-validate', $full_path . "/library/js/vendor/validate/jquery.validate.min.js", '', false, true);
				wp_enqueue_script('fmu-global', $full_path . "/library/js/interface/global.js", '', false, true);
				


				if(is_page("audioplayer")){

					wp_enqueue_style( 'mediaelement-and-player-css', $full_path . "/library/js/vendor/mejs/mediaelementplayer.min.css");

					wp_enqueue_script('mediaelement-and-player-js', $full_path . "/library/js/vendor/mejs/mediaelement-and-player.js", '', false, true);
					wp_enqueue_script('fmu-audio-player', $full_path . "/library/js/interface/fmu-audio-player.js", '', false, true);
				}

				if(is_page_template("page-microgoal-widget.php") || is_page_template("page-jm-microgoal-widget.php")){
					wp_enqueue_script('fmu-microgoal-widget', $full_path . "/library/js/interface/microgoal-widget.js", '', false, true);
				}

			}

		}

	}

?>