<?php

	header("Content-type: text/css");
	
	$colors = explode(',',$_GET['colors']);
	
	function color($num){
		global $colors;
		
		if(count($colors) < $num){
			echo '#000';
		}else{
			echo '#'.$colors[$num - 1];
		}
	}

?>
/*--------------------------------------------------------------
# Finance.com - September 2009 (for Joomla 1.5)
# Copyright (C) 2007-2009 Gavick.com. All Rights Reserved.
# License: Copyrighted Commercial Software
# Website: http://www.gavick.com
# Support: support@gavick.com  
---------------------------------------------------------------*/

/* ------------------------- STYLE1 --------------------------*/

/* Template styles - template_css.css
---------------------------------------------------------------*/
body {
	background:<?php color(8); ?>;
}
a{
	color:#fff;
}
a:hover{
	color:<?php color(4); ?>;
}
a#logo, 
a#logo_styled {
	color:<?php color(13); ?>;
}
a#logo_styled span.col{
	color:<?php color(4); ?>;
}
/* Page structure
------------------------------------------------------------*/
/* top */
div#top{
	background: <?php color(2); ?>
}
div#highlights{
	background: <?php color(1); ?>;
}
div#date{
	background:<?php color(3); ?>;
	color:<?php color(9); ?>;
}
span#login{
	border-right:1px solid <?php color(13); ?>;
}
#login a,
#register a{
	color:<?php echo color(13); ?>;
}
/*menu*/
div#menu{
	background:<?php color(3); ?>;
	border-bottom:7px solid <?php color(4); ?>;
}
div#horiz-menu li.level1{
	border-right:1px solid <?php color(2); ?>;
 	cursor:pointer;
}
div#horiz-menu li.level1 a,
div#horiz-menu li.level1 span.separator{
	color:<?php color(9); ?>;
}
div#horiz-menu li.level1 span.separator:hover{
	background:<?php color(11); ?>;
}
div#horiz-menu li li span.separator:hover,
div#horiz-menu li li span.separator:hover span,
div#horiz-menu li li span.separator span:hover{
	background:<?php color(12); ?>!important;
}
div#horiz-menu li.level1:hover{
	background:#e7e7e7;
}
div#horiz-menu li.level1:hover a,
div#horiz-menu li.level1 a:hover{
	color:<?php color(10); ?>;
}
div#horiz-menu li.level1.active{
	background:<?php color(4); ?>;
}
div#horiz-menu li.level1.active:hover a,
div#horiz-menu li.level1.active a:hover{
	color:<?php color(9); ?>;
}
div#horiz-menu li li{
	background:<?php color(11); ?>;
	border-bottom:1px solid <?php color(12); ?>!important;
}
div#horiz-menu li li a{
	color:<?php color(9); ?>!important;
}
div#horiz-menu li li:hover a,
div#horiz-menu li li:hover li:hover a,
div#horiz-menu li li:hover li:hover li:hover a,
div#horiz-menu li li:hover li:hover li:hover li:hover a,
div#horiz-menu li li a:hover{
	color:<?php color(9); ?>!important;
}
div#horiz-menu li li:hover{
	background:<?php color(12); ?>;
}
div#horiz-menu li li:hover li a{
	color:<?php color(9); ?>!important;
}
/* popups */
div#popups_container{
	background:<?php color(1); ?>;
	color:<?php color(9); ?>;
}
/* footer */
div#footer{
	border-top:2px solid <?php color(4); ?>;
	color:<?php color(10); ?>;
}
div#footer a{
	color:<?php color(4); ?>;
}
div#footer a:hover{
	color:<?php color(3); ?>;
}
div#footer_menu a{
	color:<?php color(10); ?>;
}
div#footer_menu a:hover{
	color:<?php color(4); ?>;
}
/* content */
div#content_column{
	background:#fff;
	border:1px solid #e7e7e7;
}
div#main_content,
div#bottom{
	color:#555;	
}
div#main_content a,
div#bottom a:hover{
	color:<?php color(4); ?>;
}
div#main_content a:hover,
div#bottom a{
	color:<?php color(3); ?>;
}
div#predefined ul{
	color:<?php color(4); ?>;
}
/* column & inset */
div.column .moduletable, div#inset .moduletable,
div.column .moduletable_menu, div#inset .moduletable_menu,
div.column .moduletable_text, div#inset .moduletable_text,
div.column .moduletable_lite, div#inset .moduletable_lite,
div.column .moduletable_dark, div#inset .moduletable_dark,
div.column .moduletable_color1, div#inset .moduletable_color1,
div.column .moduletable_color2, div#inset .moduletable_color2{
	background:#fff;
	border:1px solid #e7e7e7;
}
/* bottom */
div#bottom{
	background:#fff;
	border:1px solid #e7e7e7;
}
/* blocks */
.us_width-20,
.us_width-25,
.us_width-33,
.us_width-50{
	border-left:1px solid #e7e7e7;
}
.module_wrap,
.users_wrap,
div#mainbody{
	border-top:1px solid #e7e7e7;
}
/*  Restrictions & suffixes
------------------------------------------------------------*/
.moduletable h3,
.moduletable_menu h3,
.moduletable_text h3,
.moduletable_lite h3,
.moduletable_dark h3,
.moduletable_color1 h3,
.moduletable_color2 h3{	
	color:<?php color(10); ?>;
}
.button, .readon,
.moduletable .button, .moduletable .readon,
.moduletable_lite .button, .moduletable_lite .readon,
.moduletable_dark .button, .moduletable_dark .readon,
.moduletable_color1 .button, .moduletable_color1 .readon,
.moduletable_color2 .button, .moduletable_color2 .readon,
a.readon, .button{
	color:#fff!important;
}
.moduletable .button, .moduletable_lite .button:hover,
.moduletable_dark .button, .moduletable_color2 .button:hover,
.moduletable_color1 .button, .moduletable_lite .readon:hover,
.moduletable .readon, .moduletable_color2 .readon:hover,
.moduletable_dark .readon,
.moduletable_color1 .readon, 
.button,
.readon{
	background:<?php color(3); ?>;
}
.button:hover,
.readon:hover,
.moduletable_lite .button, .moduletable .button:hover,
.moduletable_color2 .button, .moduletable_dark .button:hover,
.moduletable_lite .readon, .moduletable_color1 .button:hover,
.moduletable_color2 .readon, .moduletable .readon:hover,
.moduletable_dark .readon:hover,
.moduletable_color1 .readon:hover{
	background:<?php color(4); ?>;
}
/* standard */
div#main_content .moduletable a, 
div#bottom .moduletable a{
	color:<?php color(3); ?>;
}
div#main_content .moduletable a:hover,
div#bottom .moduletable a:hover{
	color:<?php color(4); ?>;
}
/* _dark */
.moduletable_dark{
	background:<?php color(1); ?>!important;
	color:<?php color(5); ?>;
}
.moduletable_dark h3{
	color:#fff;
}
div#main_content .moduletable_dark a,
div#bottom .moduletable_dark a{
	color:#fff;
}
div#main_content .moduletable_dark a:hover,
div#bottom .moduletable_dark a:hover{
	color:<?php color(4); ?>;
}
/* _color1 */
.moduletable_color1{
	background:<?php color(6); ?>!important;
}
div#main_content .moduletable_color1 a,
div#bottom .moduletable_color1 a{
	color:<?php color(3); ?>;
}
div#main_content .moduletable_color1 a:hover,
div#bottom .moduletable_color1 a:hover{
	color:<?php color(4); ?>;
}
/* _color2 */
.moduletable_color2{
	background:<?php color(7); ?>!important;
}
/* _lite & _color2 */
div#main_content .moduletable_lite a,
div#main_content .moduletable_color2 a,
div#bottom .moduletable_lite a,
div#bottom .moduletable_color2 a{
	color:<?php color(4); ?>;
}
div#main_content .moduletable_lite a:hover,
div#main_content .moduletable_color2 a:hover,
div#bottom .moduletable_lite a:hover,
div#bottom .moduletable_color2 a:hover{
	color:<?php color(3); ?>;
}
/* Standard Joomla modules
------------------------------------------------------------*/
/* latest & popular */
.moduletable ul,
.moduletable_color1 ul,
.moduletable_lite ul,
.moduletable_color2 ul,
.moduletable_dark ul{
	color:#555;	
}
.moduletable_dark ul{
	color:<?php color(5); ?>;	
}
.moduletable ul li,
.moduletable_color1 ul li,
.moduletable_lite ul li,
.moduletable_color2 ul li{
	border-bottom:1px dotted #e7e7e7;
}
.moduletable_dark ul li{
	border-bottom:1px dotted <?php color(3); ?>;
}
.moduletable ul li a,
.moduletable_color1 ul li a{
	color:<?php color(3); ?>!important;	
}
.moduletable_lite ul li a,
.moduletable_color2 ul li a{
	color:<?php color(4); ?>!important;	
}
.moduletable_dark ul li a{
	color:#fff!important;	
}
.moduletable ul li a:hover,
.moduletable_color1 ul li a:hover{
	color:<?php color(4); ?>!important;	
}
.moduletable_lite ul li a:hover,
.moduletable_color2 ul li a:hover{
	color:<?php color(3); ?>!important;	
}
.moduletable_dark ul li a:hover{
	color:<?php color(4); ?>!important;	
}
/* menus */
.moduletable_menu ul ul{
	color:<?php color(4); ?>;
}
.moduletable_menu ul li.active,
.moduletable_menu ul li.current{
	background:#f9f9f9;
}
.moduletable_menu ul li{
	border-bottom:1px dotted #dadada;
}
.moduletable_menu ul li:first-child{
	border-top:1px dotted #dadada;
}
.moduletable_menu ul li a{
	color:<?php color(3); ?>!important;
}
.moduletable_menu ul li a:hover{
	color:<?php color(4); ?>!important;
}
.moduletable_menu ul ul li{
	border-top:1px dotted #dadada;
	border-bottom:none;
}
.moduletable_menu ul ul span{
	color:<?php color(10); ?>;
}
.moduletable_menu ul ul li a{
	color:<?php color(10); ?>;
}
.moduletable_menu ul ul li a:hover,
.moduletable_menu ul ul li a:hover span{
	color:<?php color(4); ?>!important;
}
/* mod_breadcrumbs */
span.breadcrumbs{
	background:#f8f8f8;
}
span.breadcrumbs .youah{
	color:<?php color(4); ?>;
}
span.breadcrumbs span.pathway,
span.breadcrumbs a.pathway,
span.breadcrumbs span.last{
	color:<?php color(3); ?>!important;
}
span.breadcrumbs a.pathway:hover{
	color:<?php color(4); ?>!important;
}
span.breadcrumbs span.separator{
	color:<?php color(3); ?>;
}
/* mod_search */
input#mod_search_searchword{
	border:1px solid #e7e7e7;
	color:#aaa;
}
div.search .button{
	color:#fff;
	background:<?php color(3); ?>;
}
div.search .button:hover{
	background:<?php color(4); ?>;
}
/* mod_login */
form#form-login{
	color:#fff;
}
form#form-login a:hover{
	color:<?php color(3); ?>;
}
/* popups */
#popup_register #josForm{
	color:#fff;
}
#popup_register #josForm .invalid{
	color:#c20000;
}
/* Highlighter */
.gk_news_highlighter_interface{
	color:#fff;	
}
.gk_news_highlighter_item a,
.gk_news_highlighter_item span{
	color:#878b90;
}
.gk_news_highlighter_item a:hover,
.gk_news_highlighter_item a:hover span{
	color:<?php color(4); ?>;
}
/* advert */
div.banneritem,
div.banneritem_text,
div.banneritem_lite,
div.banneritem_dark,
div.banneritem_color1,
div.banneritem_color2{
	border-bottom:1px dotted #e7e7e7!important;
}
div.banneritem_dark{
	border-bottom:1px dotted <?php color(3); ?>!important;
}
/* Joomla classes - joomla_classes.css
------------------------------------------------------------------*/
#system-message ul{
	border-top:3px solid <?php color(4); ?>!important;
	border-bottom:3px solid <?php color(4); ?>!important;
}
#system-message ul li{
	background:<?php color(4); ?>;
	color:#fff;
}
h1.componentheading,
.componentheading{
	color:<?php color(3); ?>;
}
h2.contentheading,
.contentheading,
table.blog .contentheading{
	color:<?php color(10); ?>;
}
input.inputbox{
	border:1px solid #e7e7e7;
}
.createdate,
.createby,
.small,
.written_by,
.modifydate{
	color:#999;
}
div.blog_more li{
	color:<?php color(4); ?>;
}
ul.pagination a,
ul.pagination li span{
	border:1px solid #e7e7e7;
}
td.sectiontableheader{
	background:<?php color(7);?>;
	border-top:1px solid #e7e7e7;
	border-bottom:1px solid #e7e7e7;
}
tr.sectiontableentry0 td,
tr.sectiontableentry1 td,
tr.sectiontableentry2 td{
	border-bottom:1px solid #e7e7e7;
}
tr.sectiontableentry0:hover td,
tr.sectiontableentry1:hover td,
tr.sectiontableentry2:hover td{
	background:#f8f8f8;
}
/* Gavick modules - gk_stuff.css
------------------------------------------------------------------*/
/* News Show Pro */
div.gk_npro_full_interface ul li,
.moduletable_lite div.gk_npro_full_interface ul li,
.moduletable_color1 div.gk_npro_full_interface ul li,
.moduletable_color2 div.gk_npro_full_interface ul li,
.moduletable_dark div.gk_npro_full_interface ul li.active{
	background:#e7e7e7;
}
div.gk_npro_full_interface ul li.active,
.moduletable_dark div.gk_npro_full_interface ul li,
.moduletable_color1 div.gk_npro_full_interface ul li.active{
	background:<?php color(3); ?>;
}
.moduletable_lite div.gk_npro_full_interface ul li.active,
.moduletable_color2 div.gk_npro_full_interface ul li.active{
	background:<?php color(4); ?>;
}
div.gk_npro_full_prev:hover, 
div.gk_npro_full_next:hover,
div.gk_npro_short_prev:hover, 
div.gk_npro_short_next:hover,
.moduletable_color1 div.gk_npro_full_prev:hover, 
.moduletable_color1 div.gk_npro_full_next:hover,
.moduletable_color1 div.gk_npro_short_prev:hover, 
.moduletable_color1 div.gk_npro_short_next:hover,
.moduletable_dark div.gk_npro_full_prev:hover, 
.moduletable_dark div.gk_npro_full_next:hover,
.moduletable_dark div.gk_npro_short_prev:hover, 
.moduletable_dark div.gk_npro_short_next:hover{
	color:<?php color(3); ?>;
}
.moduletable_lite div.gk_npro_full_prev:hover, 
.moduletable_lite div.gk_npro_full_next:hover,
.moduletable_lite div.gk_npro_short_prev:hover, 
.moduletable_lite div.gk_npro_short_next:hover,
.moduletable_color2 div.gk_npro_full_prev:hover, 
.moduletable_color2 div.gk_npro_full_next:hover,
.moduletable_color2 div.gk_npro_short_prev:hover, 
.moduletable_color2 div.gk_npro_short_next:hover{
	color:<?php color(4); ?>;
}
div.gk_npro_full_prev, 
div.gk_npro_full_next,
div.gk_npro_short_prev, 
div.gk_npro_short_next,
.moduletable_color1 div.gk_npro_full_prev, 
.moduletable_color1 div.gk_npro_full_next,
.moduletable_color1 div.gk_npro_short_prev, 
.moduletable_color1 div.gk_npro_short_next,
.moduletable_dark div.gk_npro_full_prev, 
.moduletable_dark div.gk_npro_full_next,
.moduletable_dark div.gk_npro_short_prev, 
.moduletable_dark div.gk_npro_short_next{
	color:#e7e7e7;
}
div.gk_npro_short_ulwrap ul{
	color:<?php color(10); ?>;
}
div.gk_npro_short_ulwrap ul li{
	border-bottom-color:#e7e7e7;
}
.moduletable_dark div.gk_npro_short_ulwrap ul{
	color:<?php color(5); ?>;
}
.moduletable_dark div.gk_npro_short_ulwrap ul li{
	border-bottom-color:<?php color(3); ?>;
}
/* Image Show */
.gk_is_preloader{
	background:#000 url('../images/style1/gk_stuff/loader.gif') no-repeat center center;
}
.gk_is_text,
.gk_is_text h4,
.gk_is_text h4 a{
	color:#fff!important;
}
.gk_is_text h4 a:hover{
	color:<?php color(4); ?>!important;
}
.gk_is_text_bg{
	background:<?php color(1); ?>;
}
.gk_is_prev{
	background:transparent url('../images/style1/gk_stuff/is_arrows.png') no-repeat left 0;
}
.gk_is_next{
	background:transparent url('../images/style1/gk_stuff/is_arrows.png') no-repeat right 0;
}
/* GK Weather */
ul.gkw_next_days li{
	border-left:1px solid #ddd;
	border-bottom:none!important;
}
span.gkw_day_night{
	background:#333;
	color:#fff;
}
/* GK Tab */
/* standard & color1 */
.gk_tab_ul-style1,
.moduletable_color1 .gk_tab_ul-style1{
	border-bottom: 2px solid <?php color(3); ?>;
}
.gk_tab_ul-style1 li,
.moduletable_color1 .gk_tab_ul-style1 li{
	border: 1px solid #e7e7e7;
	border-bottom:none!important;
	border-left:none;
	color:<?php color(3); ?>;
}
.gk_tab_ul-style1 li:first-child,
.moduletable_color1 .gk_tab_ul-style1 li:first-child{
	border-left:1px solid #e7e7e7!important;	
}
.gk_tab_ul-style1 li.active,
.gk_tab_ul-style1 li.active:hover,
.moduletable_color1 .gk_tab_ul-style1 li.active,
.moduletable_color1 .gk_tab_ul-style1 li.active:hover{
	color:#fff;
	border-color:<?php color(3); ?>!important;
	background:<?php color(3); ?>;
	border-bottom:none!important;
	border-left:none;
}
.gk_tab_ul-style1 li:hover,
.moduletable_color1 .gk_tab_ul-style1 li:hover{
	color:<?php color(10); ?>;
}
/* lite & color2 */
.moduletable_lite .gk_tab_ul-style1,
.moduletable_color2 .gk_tab_ul-style1{
	border-bottom: 2px solid <?php color(4); ?>;
}
.moduletable_lite .gk_tab_ul-style1 li,
.moduletable_color2 .gk_tab_ul-style1 li{
	border: 1px solid #e7e7e7;
	border-bottom:none!important;
	border-left:none;
	color:<?php color(4); ?>;
}
.moduletable_lite .gk_tab_ul-style1 li:first-child,
.moduletable_color2 .gk_tab_ul-style1 li:first-child{
	border-left:1px solid #e7e7e7!important;	
}
.moduletable_lite .gk_tab_ul-style1 li.active,
.moduletable_lite .gk_tab_ul-style1 li.active:hover,
.moduletable_color2 .gk_tab_ul-style1 li.active,
.moduletable_color2 .gk_tab_ul-style1 li.active:hover{
	color:#fff;
	background:<?php color(4); ?>;
	border-color:<?php color(4); ?>!important;
	border-bottom:none!important;
	border-left:none;
}
.moduletable_lite .gk_tab_ul-style1 li:hover,
.moduletable_color2 .gk_tab_ul-style1 li:hover{
	color:<?php color(10); ?>;
}
/* dark */
.moduletable_dark .gk_tab_ul-style1{
	border-bottom: 2px solid #fff;
}
.moduletable_dark .gk_tab_ul-style1 li{
	border: 1px solid #e7e7e7;
	border-bottom:none!important;
	border-left:none;
	color:<?php color(3); ?>;
	background:<?php color(5); ?>;
}
.moduletable_dark .gk_tab_ul-style1 li:first-child{
	border-left:1px solid #e7e7e7!important;	
}
.moduletable_dark .gk_tab_ul-style1 li.active,
.moduletable_dark .gk_tab_ul-style1 li.active:hover{
	color:<?php color(3); ?>;
	background:#fff;
	border-color:#fff!important;
	border-bottom:none!important;
	border-left:none;
}
.moduletable_dark .gk_tab_ul-style1 li:hover{
	color:<?php color(10); ?>;
}
/* Typography - template_css.css
------------------------------------------------------------------*/
/* Code */
pre,
.code1,
.code2{
	background:#f7f7f7;
}
pre,
.code1{
	border-left:5px solid <?php color(4); ?>; 
}
.code2{
	border-top:5px solid <?php color(4); ?>;
	border-bottom:5px solid <?php color(4); ?>;
}
.code3{
	border-top:1px solid <?php color(4); ?>;
	border-bottom:1px solid <?php color(4); ?>;
}
.code3 h4{
	background:#fff;
}
/* Warnings */
p.info1,p.info2,p.info3,p.info4{background:transparent url('../images/icons/info.gif') no-repeat left center; }
p.warning1,p.warning2,p.warning3,p.warning4{background:transparent url('../images/icons/warning.gif') no-repeat left center; }
p.tips1,p.tips2,p.tips3,p.tips4{ background:transparent url('../images/icons/tips.gif') no-repeat left center; }

p.info2,
p.info4{
	border-top:#3399ff solid 1px;
	border-bottom:#3399ff solid 1px;
	background-position:3px center;
}
p.info3,
p.info4{
	background-color:#E6F1FF;
	background-position: 7px center;
}
p.warning2,
p.warning4{
	border-top:#f71212 solid 1px;
	border-bottom:#f71212 solid 1px;
	background-position: 3px center;
}
p.warning3,
p.warning4{
	background-color:#FFE5E0;
	background-position: 7px center;
}
p.warning4{
	border-top:#f71212 solid 1px;
	border-bottom:#f71212 solid 1px;
}
p.tips2,
p.tips4{
	border-top:#fde647 solid 1px;
	border-bottom:#fde647 solid 1px;
	background-position:3px center;
}
p.tips3,
p.tips4{
	background-color:#FDFFC7;
	background-position: 7px center;
}
p.tips4{
	border-top:#fde647 solid 1px;
	border-bottom:#fde647 solid 1px;
}
/* Blockquotes */
blockquote div.blockquote1{
	background:transparent url(../images/style1/gk_stuff/typography/open1.png)  no-repeat left bottom;
}
blockquote div.blockquote1 div{
	background:transparent url(../images/style1/gk_stuff/typography/close1.png)  no-repeat right top;
}
blockquote div.blockquote2{
	background:transparent url(../images/style1/gk_stuff/typography/open1.png)  no-repeat left top;
}
blockquote div.blockquote2 div{
	background:transparent url(../images/style1/gk_stuff/typography/close1.png)  no-repeat right top;
}
blockquote div.blockquote3{
	background:transparent url(../images/style1/gk_stuff/typography/open2.png) no-repeat left bottom;
}
blockquote div.blockquote3 div{
	background:transparent url(../images/style1/gk_stuff/typography/close2.png) no-repeat right top;
}
blockquote div.blockquote4{
	background:transparent url(../images/style1/gk_stuff/typography/open2.png) no-repeat left top;
}
blockquote div.blockquote4 div{
	background:transparent url(../images/style1/gk_stuff/typography/close2.png) no-repeat right top;
}
/* Legends */
div.legend1 h4,
div.legend2 h4,
div.legend3 h4,
div.legend4 h4,
div.legend5 h4,
div.legend6 h4{
	background: #f5f5f5;
}
div.legend3 h4:first-child,
div.legend5 h4:first-child{
	background:#e7e7e7;
}
div.legend4 h4:first-child,
div.legend6 h4:first-child{
	border:solid 1px #666;
}
div.legend1,
div.legend5,
div.legend6{
	border:solid 1px #666;
}
div.legend2,
div.legend3,
div.legend4{
	border-top:solid 1px #666;
	border-bottom:solid 1px #666;
}
/* Highlights */
.highlight-1{
	background:#ffffda;
}
.highlight-2{
	background:<?php color(4); ?>;
	color:#fff;
}
.highlight-3{
	background:<?php color(3); ?>;
	color:#fff;
}
.highlight-4{
	background:#333;
	color:#fff;
}
/* Colors for spans */
span.clear{
	border-top:1px solid <?php color(4); ?>;
	border-bottom:1px solid <?php color(4); ?>;
	color:<?php color(4); ?>;
}
span.clear-1{
	border-top:1px solid <?php color(3); ?>;
	border-bottom:1px solid <?php color(3); ?>;
	color:<?php color(3); ?>;
}
span.clear-2{
	border-top:1px solid #333;
	border-bottom:1px solid #333;
	color:#333;
}
span.color{
	color:<?php color(4); ?>;
}
span.color-1{
	color:<?php color(3); ?>;
}
span.color-2{
	color:<?php color(4); ?>;
	border-left:2px solid <?php color(4); ?>;
}
span.color-3{
	color:#333;
	border-left:2px solid #333;
}
span.color-4{
	color:#fff;
	background:<?php color(4); ?>;
}
span.color-5{
	color:#fff;
	background:<?php color(3); ?>;
}
span.color-6{
	color:#d48d1c;
	background:#ffe;
	border-top:1px solid #e9e9a1;
	border-bottom:1px solid #e9e9a1;
}
span.color-7{
	background:#333;
	color:#fff;
}
/* unordered lists */
ul.circle1{list-style-image:url(../images/style1/gk_stuff/typography/bullet3ul.png);}
ul.circle2{list-style-type:circle;}
ul.bullet1{list-style-image:url(../images/style1/gk_stuff/typography/bullet_ol_1_dark.png);}
ul.bullet2{list-style-image:url(../images/style1/gk_stuff/typography/bullet1ul.png);}
ul.bullet3{list-style-image:url(../images/style1/gk_stuff/typography/bullet2ul.png);}
ul.bullet4{list-style-image:url(../images/style1/gk_stuff/typography/bullet_ol_1_color.png);}
ul.square1{list-style-type:square;}
ul.square2{list-style-image:url(../images/style1/gk_stuff/typography/bullet_squ1_dark.png);}
ul.square3{list-style-image:url(../images/style1/gk_stuff/typography/bullet_squ1_color.png);}
/* Numbers */
div.number1 span{
	background:transparent url(../images/style1/gk_stuff/typography/bullet_ol_2.png) no-repeat center center;
	color:#fff;
}
div.number2 span{
	background:transparent url(../images/style1/gk_stuff/typography/bullet_ol_2_color.png) no-repeat center center;
	color:#fff;
}