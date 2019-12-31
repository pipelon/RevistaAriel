<?php

/**
* Gavick Image Slide - Template style
* @package Joomla!
* @Copyright (C) 2009 Gavick.com
* @ All rights reserved
* @ Joomla! is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version $Revision: 1.0.0 $
**/

// access restriction
defined('_JEXEC') or die('Restricted access');
// vars
$highest_layer = 0;
// initializing variables
$total_block_width = 0;
$URI = JURI::getInstance();
// calculating sizes
$total_block_width += $this->settings["image_x"];
$total_block_height = 0;
$total_block_height += $this->settings["image_y"];
//
if(!function_exists('htmlspecialchars_decode')){
	function htmlspecialchars_decode($string,$style=ENT_COMPAT)
	{
	    $translation = array_flip(get_html_translation_table(HTML_SPECIALCHARS,$style));
	    if($style === ENT_QUOTES){ $translation['&#039;'] = '\''; }
	    return strtr($string,$translation);
	}
}

?>

<div id="gk_is-<?php echo $this->ID;?>" class="gk_is_wrapper gk_is_wrapper-style1" style="width: <?php echo $total_block_width; ?>px;height: <?php echo $total_block_height; ?>px;">

	<?php if($this->config["preloading"] == 'true') : ?>
	<div class="gk_is_preloader"></div>
	<?php endif; ?>
	
	<div class="gk_is_image" style="width: <?php echo $this->settings["image_x"]; ?>px;height: <?php echo $this->settings["image_y"]; ?>px;">		
		<?php if($this->config['interface'] == 'true') : ?>
		<div class="gk_is_prev">prev</div>
		<div class="gk_is_next">next</div>
		<?php endif; ?>
		<?php for($i = 0; $i < count($this->slides); $i++) : ?>
			
			<?php 
				// cleaning variables
				unset($path, $title, $link);
				// creating slide path
				$path = $URI->root().'components/com_gk3_photoslide/thumbs_big/'.$this->slides[$i]["filename"];
				// creating slide title
				$title = htmlspecialchars(($this->slides[$i]["title"] == "") ? $this->slides[$i]["ctitle"] : $this->slides[$i]["title"]);
				// creating slide link
				$link = ($this->slides[$i]["link_type"] != 0) ? JRoute::_(ContentHelperRoute::getArticleRoute($this->slides[$i]["article"], $this->slides[$i]["cid"], $this->slides[$i]["sid"])) : $this->slides[$i]["link"];			
			?>
			
			<?php if($this->config["preloading"] == 'false') : ?>
				<img src="<?php echo $path; ?>" class="gk_is_slide" style="z-index: <?php echo $i+1; ?>;" alt="<?php echo $link; ?>" title="<?php echo $title; ?>" />
			<?php else: ?>
				<div class="gk_is_slide" style="z-index: <?php echo $i+1; ?>;" title="<?php echo $title; ?>"><a href="<?php echo $path; ?>">src</a><a href="<?php echo $link; ?>">link</a></div>
			<?php endif; ?>
			
		<?php endfor; ?>
	
		<?php if($this->config['show_text_block'] == "true") : ?>
		<div class="gk_is_text_bg" style="height:<?php echo $this->config['text_height']; ?>px;top:<?php echo $this->config['text_position'];?>px;"></div>
		<div class="gk_is_text" style="height:<?php echo $this->config['text_height']; ?>px;top:<?php echo $this->config['text_position'];?>px;"></div>
		
		
		<div class="gk_is_text_data">
			<?php for($i = 0; $i < count($this->slides); $i++) : ?>
			
			<?php 
				// cleaning variables
				unset($title, $link, $text, $exploded_text);
				// creating slide title
				$title = ($this->slides[$i]["title"] == "") ? $this->slides[$i]["ctitle"] : $this->slides[$i]["title"];
				// creating slide link
				$link = ($this->slides[$i]["link_type"] != 0) ? JRoute::_(ContentHelperRoute::getArticleRoute($this->slides[$i]["article"], $this->slides[$i]["cid"], $this->slides[$i]["sid"])) : $this->slides[$i]["link"];
				// creating slide text
				$text = htmlspecialchars_decode(($this->slides[$i]["content"] == "") ? $this->slides[$i]["introtext"] : $this->slides[$i]["content"]);
				if($this->config["clean_xhtml"] == "true") $text = strip_tags($text);
				$exploded_text = explode(" ", $text);
				$text = '';
				for($j = 0; $j < $this->config["wordcount"]; $j++)
				{
					if(isset($exploded_text[$j]))
					{
						$text .= $exploded_text[$j]." ";
					}
				}
			?>
			
			<div class="gk_is_text_item">
				<?php if($this->config['show_title'] == "true") : ?>
				<h4><span>
				<?php if($this->config["title_link"] == "true"): ?>
					<a href="<?php echo $link; ?>"><?php echo $title; ?></a>
				<?php else: ?>
					<?php echo $title; ?>
				<?php endif; ?>
				</span></h4>
				<?php endif; ?>
				<p><?php echo $text; ?></p>
			</div>
		<?php endfor; ?>
		</div>
		<?php endif; ?>
	</div>
</div>