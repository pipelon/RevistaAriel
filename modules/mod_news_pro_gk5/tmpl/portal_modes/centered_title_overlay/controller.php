<?php

/**
* Centered Title Overlay
* @package News Show Pro GK5
* @Copyright (C) 2009-2013 Gavick.com
* @ All rights reserved
* @ Joomla! is Free Software
* @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
* @version $Revision: GK5 1.3.3 $
**/

// access restriction
defined('_JEXEC') or die('Restricted access');

class NSP_GK5_Centered_Title_Overlay {
	// necessary class fields
	private $parent;
	private $mode;
	// constructor
	function __construct($parent) {
		$this->parent = $parent;
		// detect the supported Data Sources
		if(stripos($this->parent->config['data_source'], 'com_content_') !== FALSE) {
			$this->mode = 'com_content';
		} else if(stripos($this->parent->config['data_source'], 'k2_') !== FALSE) { 
			$this->mode = 'com_k2';
		} else if(stripos($this->parent->config['data_source'], 'easyblog_') !== FALSE) { 
			$this->mode = 'com_easyblog';
		} else {
			$this->mode = false;
		}
	}
	// static function which returns amount of articles to render - VERY IMPORTANT!!
	static function amount_of_articles($parent) {
		return 1;
	}
	// output generator	
	function output() {	
		// render images
		for($i = 0; $i < count($this->parent->content); $i++) {
			// operations on the text
			$title = NSP_GK5_Utils::cutText(htmlspecialchars(strip_tags($this->parent->content[$i]['title'])), $this->parent->config, 'portal_mode_centered_title_limit', '');
			$text = NSP_GK5_Utils::cutText(htmlspecialchars(strip_tags($this->parent->content[$i]['text'])), $this->parent->config, 'portal_mode_centered_text_limit', '');
			
			$text_styles = '';
			
			if(trim($this->parent->config['portal_mode_centered_title_overlay_text_bg']) != '') {
				$text_styles .= 'background: ' . $this->parent->config['portal_mode_centered_title_overlay_text_bg'] . ';';
			}
			
			if($text_styles != '') {
				$text_styles = ' style="' . $text_styles . '"';
			}
			
			// output the HTML code - main wrapper
			echo '<figure class="gkNspPM gkNspPM-CenteredTitleOverlay">';
			
			if(!empty($this->parent->config['nsp_pre_text']) && trim($this->parent->config['nsp_pre_text'])) {
				echo $this->parent->config['nsp_pre_text'];
			}
			
			if($this->get_image($i)) {
				echo '<a href="'.$this->get_link($i).'"><img src="'.strip_tags($this->get_image($i)).'" alt="'.htmlspecialchars(strip_tags($this->parent->content[$i]['title'])).'" /></a>';
			}
			echo '<figcaption>';
			echo '<div><div>';
			
			if(trim($title) != '') {
				echo '<h3'.$text_styles.'>';
				echo '<a href="'.$this->get_link($i).'" title="'.htmlspecialchars(strip_tags($this->parent->content[$i]['title'])).'">'.$title.'</a>';
				echo '</h3>';
			}
			
			if(trim($text) != '') {
				echo '<p'.$text_styles.'>';
				echo '<a href="'.$this->get_link($i).'" title="'.htmlspecialchars(strip_tags($this->parent->content[$i]['title'])).'">'.$text.'</a>';
				echo '</p>';
			}
			
			echo '</div></div>';
			echo '</figcaption>';
			
			if(!empty($this->parent->config['nsp_post_text']) && trim($this->parent->config['nsp_post_text'])) {
				echo $this->parent->config['nsp_post_text'];
			}
			
			echo '</figure>';
		}
	}
	// function used to retrieve the item URL
	function get_link($num) {
		if($this->mode == 'com_content') {
			// load necessary com_content View class
			if(!class_exists('NSP_GK5_com_content_View')) {
				require_once(JModuleHelper::getLayoutPath('mod_news_pro_gk5', 'com_content/view'));
			}
			return NSP_GK5_com_content_View::itemLink($this->parent->content[$num], $this->parent->config);
		} else if($this->mode == 'com_k2') {
			// load necessary k2 View class
			if(!class_exists('NSP_GK5_com_k2_View')) {
				require_once(JModuleHelper::getLayoutPath('mod_news_pro_gk5', 'com_k2/view'));
			}
			return NSP_GK5_com_k2_View::itemLink($this->parent->content[$num], $this->parent->config);
		} else if($this->mode == 'com_easyblog') {
			return urldecode(JRoute::_('index.php?option=com_easyblog&view=entry&id=' . $this->parent->content[$num]['id']));
		} else {
			return false;
		}
	}
	// image generator
	function get_image($num) {		
		// used variables
		$url = false;
		$output = '';
		// select the proper image function
		if($this->mode == 'com_content') {
			// load necessary com_content View class
			if(!class_exists('NSP_GK5_com_content_View')) {
				require_once(JModuleHelper::getLayoutPath('mod_news_pro_gk5', 'com_content/view'));
			}
			// generate the com_content image URL only
			$url = NSP_GK5_com_content_View::image($this->parent->config, $this->parent->content[$num], true, true);
		} else if($this->mode == 'com_k2') {
			// load necessary k2 View class
			if(!class_exists('NSP_GK5_com_k2_View')) {
				require_once(JModuleHelper::getLayoutPath('mod_news_pro_gk5', 'com_k2/view'));
			}
			// generate the K2 image URL only
			$url = NSP_GK5_com_k2_View::image($this->parent->config, $this->parent->content[$num], true, true);
		} else if($this->mode == 'com_easyblog') {
			// load necessary EasyBlog View class
			if(!class_exists('NSP_GK5_com_easyblog_View')) {
				require_once(JModuleHelper::getLayoutPath('mod_news_pro_gk5', 'com_easyblog/view'));
			}
			// generate the EasyBlog image URL only
			
			$url = NSP_GK5_com_easyblog_View::image($this->parent->config, $this->parent->content[$num], true, true);
		}
		// check if the URL exists
		if($url === FALSE) {
			return false;
		} else {
			// if URL isn't blank - return it!
			if($url != '') {
				return $url;
			} else {
				return false;
			}
		}
	}
}

// EOF