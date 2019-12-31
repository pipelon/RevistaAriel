<?php

	/*--------------------------------------------------------------
	# Finance.com - September 2009 (for Joomla 1.5)
	# Copyright (C) 2007-2009 Gavick.com. All Rights Reserved.
	# License: Copyrighted Commercial Software
	# Website: http://www.gavick.com
	# Support: support@gavick.com  
	---------------------------------------------------------------*/
		
	// This data goes between the <head></head> tags of the template

?>

<link rel="shortcut icon" href="<?php echo $this->baseurl; ?>/images/favicon.ico" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/general.css" type="text/css" />
<link href="<?php echo $template_baseurl; ?>/css/template_css.css" rel="stylesheet" media="all"  type="text/css" />
<link href="<?php echo $template_baseurl; ?>/css/suckerfish.css" rel="stylesheet" media="all" type="text/css" />
<link href="<?php echo $template_baseurl; ?>/css/joomla_classes.css" rel="stylesheet" media="all" type="text/css" />
<link href="<?php echo $template_baseurl; ?>/css/typography.css" rel="stylesheet" media="all" type="text/css" />
<link href="<?php echo $template_baseurl; ?>/css/gk_stuff.css" rel="stylesheet" media="all" type="text/css" />
<?php if($tools) : ?><link href="<?php echo $template_baseurl; ?>/css/mooRainbow.css" rel="stylesheet" media="all" type="text/css" /><?php endif; ?>
<?php if(!$tools) : ?>
<link href="<?php echo $template_baseurl; ?>/css/style<?php if($stylearea){ echo (isset($_COOKIE['gk29_style']) ? $_COOKIE['gk29_style'] : $template_color);} else {echo $template_color;} ?>.css" rel="stylesheet" media="all" type="text/css" />
<?php endif; ?>
<?php if($tools) : ?>
<link href="<?php echo $template_baseurl; ?>/css/style.php?colors=<?php echo (isset($_COOKIE['gk29_cp'])) ? $_COOKIE['gk29_cp'] : str_replace('#','',join(',',$styles_colors[0])); ?>" rel="stylesheet" media="all" type="text/css" />
<?php endif; ?>
<!--[if IE 6]><link href="<?php echo $template_baseurl; ?>/css/ie6_css.css" rel="stylesheet" type="text/css" /><![endif]-->
<!--[if IE 7]><link href="<?php echo $template_baseurl; ?>/css/ie7_css.css" rel="stylesheet" type="text/css" /><![endif]-->
<script type="text/javascript">$template_path = '<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>';</script>
<?php if($tools) : ?><script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/lib/scripts/mooRainbow.js"></script><?php endif; ?>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/lib/scripts/template_scripts.js"></script>
<?php if($this->params->get("menutype", "moomenu") == "moomenu") : ?><script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/lib/scripts/menu.php?width=<?php echo $this->params->get("menu_width", 1); ?>&amp;height=<?php echo $this->params->get("menu_height", 1); ?>&amp;opacity=<?php echo $this->params->get("menu_opacity", 1); ?>&amp;animation=<?php echo $this->params->get("menu_animation", 1); ?>&amp;speed=<?php echo $this->params->get("menu_speed", 500); ?>"></script><?php endif; ?>