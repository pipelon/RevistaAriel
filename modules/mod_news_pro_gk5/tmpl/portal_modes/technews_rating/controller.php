<?php

/**
* TechNews Header I
* @package News Show Pro GK5
* @Copyright (C) 2009-2015 Gavick.com
* @ All rights reserved
* @ Joomla! is Free Software
* @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
* @version $Revision: GK5 1.9.1 $
**/

// access restriction
defined('_JEXEC') or die('Restricted access');

class NSP_GK5_TechNews_Rating {
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
		} else {
			$this->mode = false;
		}
	}
	// static function which returns amount of articles to render - VERY IMPORTANT!!
	static function amount_of_articles($parent) {
		return $parent->config['portal_mode_technews_rating_rows'];
	}
	// output generator	
	function output() {
		// main wrapper
		echo '<div class="gkNspPM gkNspPM-TechNewsRating" id="'.$this->parent->config['module_id'].'">';
		
		if(!empty($this->parent->config['nsp_pre_text']) && trim($this->parent->config['nsp_pre_text'])) {
			echo $this->parent->config['nsp_pre_text'];
		}
		
		// render images
		for($i = 0; $i < count($this->parent->content); $i++) {			
			if($this->get_rating($i)) {
				echo '<div class="gkItem">';
				echo '	<div class="gkItemRating">'.$this->get_rating($i).'</div>';
				echo '  <div class="gkItemContent">';
				echo '	  <h3 class="gkItemTitle"><a href="'.strip_tags($this->get_link($i)).'">'.strip_tags($this->parent->content[$i]['title']).'</a></h3>';
				echo '    <span class="gkItemAuthor">' . JText::_('MOD_NEWS_PRO_GK5_TECHNEWS_RATING_BY') . ' ' . $this->get_author($i) . '</span>';
				echo '  </div>';
				echo '</div>';
			}		
		}
		
		if(!empty($this->parent->config['nsp_post_text']) && trim($this->parent->config['nsp_post_text'])) {
			echo $this->parent->config['nsp_post_text'];
		}
		// closing main wrapper
		echo '</div>';
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
		} else {
			return false;
		}
	}
	
	// author generator
	function get_author($num) {
		$item = $this->parent->content[$num];
		return (trim(htmlspecialchars($item['author_alias'])) != '') ? htmlspecialchars($item['author_alias']) : htmlspecialchars($item['author_username']);
	}
	
	// rating generator
	function get_rating($num) {		
		$input = $this->parent->content[$num]['text'];
		$matches = array();
		preg_match('@\{REVIEW\}.*?\{\/REVIEW\}@mis', $input, $matches);
		
		if(!count($matches)) {
			return false;
		}
		
		$input = $matches[0];
		$output = '';
		$label = '';
		$decimal = 1;
		$max = 5;
		$rating = array();
		// remove HTML tags
		$input = strip_tags($input);
		$separator = PHP_EOL;
		// detect second syntax
		if(stripos($input, ';')) {
			$separator = ';';
		}
		
		$input = explode($separator, $input);
		// remove the plugin tags
		array_shift($input);
		array_pop($input);
		
		
		// get options and rating
		for($i = 0; $i < count($input); $i++) {
			if(trim($input[$i]) != '' && stripos($input[$i], '=') !== FALSE) {
				$data = explode('=', $input[$i]);
				$data[0] = trim($data[0]);
				
				if(in_array($data[0], array('label', 'decimal', 'max'))) {
					switch($data[0]) {
						case 'label': $label = trim($data[1]); break;
						case 'decimal': $decimal = intval(trim($data[1])); break;
						case 'max': $max = intval(trim($data[1])); break;
						default: break;
					}	
				} else {
					array_push($rating, $input[$i]);
				}
			}
		}
		
		// Get rating data
		$rating_sum = 0;
		
		for($i = 0; $i < count($rating); $i++) {
			$rate = explode('=', $rating[$i]);
			$rating_sum += floatval(trim($rate[1]));
		}
		
		$rating_sum = round($rating_sum / count($rating), $decimal);
				
		// Result
		$output = '<span class="gk-review-sum-value" data-final="'.($rating_sum / $max).'"><span>'.$rating_sum.'</span></span>';
		return $output;
	}
}

// EOF