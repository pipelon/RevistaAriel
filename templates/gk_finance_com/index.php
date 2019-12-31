<?php
/* --------------------------------------------------------------

  # Finance.com - September 2009 (for Joomla 1.5)

  # Copyright (C) 2007-2009 Gavick.com. All Rights Reserved.

  # License: Copyrighted Commercial Software

  # Website: http://www.gavick.com

  # Support: support@gavick.com

  --------------------------------------------------------------- */



// no direct access

defined('_JEXEC') or die('Restricted access');

// including base setup file

include_once(JPATH_ROOT . "/templates/" . $this->template . '/lib/php/gk_setup.php');

// including menu generator file

include_once(JPATH_ROOT . "/templates/" . $this->template . '/lib/php/menu.php');

JHtml::_('bootstrap.framework');
JHtmlBootstrap::loadCss();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?php $this->setGenerator('Revista Ariel'); ?>
        <jdoc:include type="head" />
        <?php
// including template header files

        include_once(JPATH_ROOT . "/templates/" . $this->template . '/lib/php/gk_head.php');
        ?>

    </head>
    <body>
        <!--<jdoc:include type="message" />-->
        <div id="top">
            <div id="highlights">
                <div class="wrapper_centered">
                    <div id="highlight">
                        <jdoc:include type="modules" name="highlight" style="raw" />
                    </div>
                    <?php if ($rss_icon) : ?>
                        <div id="rss">
                            <jdoc:include type="modules" name="idiomas" style="none" />
                        </div>
                    <?php endif; ?>
                    <?php if ($tools) : ?>
                        <div id="tools"> <img src="templates/<?php echo $this->template ?>/images/style<?php
                            if ($stylearea) {
                                echo (isset($_COOKIE['gk29_style']) ? $_COOKIE['gk29_style'] : $template_color);
                            } else {
                                echo $template_color;
                            }
                            ?>/tools.png" alt="Tools" /> </div>
                        <?php endif; ?>
                </div>
            </div>
            <div id="top_content" class="wrapper_centered"> 
                <a id="logo<?php echo ($logo_as_image) ? '' : '_styled'; ?>" href="./">
                    <?php if ($logo_as_image) : ?>
                        <img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/images/style<?php
                        if ($stylearea) {
                            echo (isset($_COOKIE['gk29_style']) ? $_COOKIE['gk29_style'] : $template_color);
                        } else {
                            echo $template_color;
                        }
                        ?>/logo.png" alt="Logo" />
                         <?php else : ?>
                             <?php echo $logo_text; ?>
                         <?php endif; ?>
                </a>
                <?php if ($this->countModules('search')) : ?>
                    <div id="search">
                        <jdoc:include type="modules" name="search" style="raw" />
                    </div>
                <?php endif; ?>
                <div id="userarea">
                    <?php if (($login_button && $this->countModules('login')) || ($register_button && ((!isset($_GET['task']) || !isset($_GET['option'])) || ((isset($_GET['task']) && $_GET['task'] != 'register') || (isset($_GET['option']) && $_GET['option'] != 'com_user'))) && $userID == 0)) : ?>
                        <?php if ($login_button && $this->countModules('login')) : ?>
                            <span id="login<?php if (!($register_button && ((!isset($_GET['task']) || !isset($_GET['option'])) || ((isset($_GET['task']) && $_GET['task'] != 'register') || (isset($_GET['option']) && $_GET['option'] != 'com_user'))) && $userID == 0)) echo '_noborder'; ?>">
                                <?php if ($userID == 0): ?>
                                    <a href="index.php?option=com_users&view=login">
                                        <?php echo JText::_('Acceso'); ?>
                                    </a>
                                <?php else: ?>
                                    <a href="index.php?option=com_users&view=login&layout=logout">
                                        <?php echo JText::_('Salir'); ?>
                                    </a>
                                <?php endif; ?>
                            </span>
                        <?php endif; ?>
                        <?php if ($register_button && ((!isset($_GET['task']) || !isset($_GET['option'])) || ((isset($_GET['task']) && $_GET['task'] != 'register') || (isset($_GET['option']) && $_GET['option'] != 'com_user'))) && $userID == 0) : ?>
                            <span id="register2"><a href="<?php echo $this->baseurl; ?>/index.php?option=com_users&view=registration">&nbsp;&nbsp;<?php echo JText::_('Registrarse'); ?></a></span>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php if ($_date) : ?>
                    <div id="date"><?php echo date($date_format); ?></div>
                <?php endif; ?>
                <div id="menu_wrapper" class="wrapper_centered clearfix">
                    <div id="menu">
                        <div id="horiz-menu"> <jdoc:include type="modules" name="menu" style="raw" /><?php //echo $main_navigation;             ?> </div>
                    </div>
                </div>
            </div>
            <div id="popups_container" class="clearfix">
                <?php if (($login_button && $this->countModules('login'))) : ?>
                    <div id="popup_login">
                        <jdoc:include type="modules" name="login" style="raw" />
                    </div>
                <?php endif; ?>
                <?php if ($register_button && ((!isset($_GET['task']) || !isset($_GET['option'])) || ((isset($_GET['task']) && $_GET['task'] != 'register') || (isset($_GET['option']) && $_GET['option'] != 'com_user'))) && $userID == 0) : ?>
                    <div id="popup_register">
                        <script type="text/javascript" src="<?php echo $url->root(); ?>media/system/js/validate.js"></script>
                        <script type="text/javascript">Window.onDomReady(function () {
                                document.formvalidator.setHandler('passverify', function (value) {
                                    return ($('password').value == value);
                                });
                            });</script>
                        <form action="<?php echo JRoute::_('index.php?option=com_user'); ?>" method="post" id="josForm" name="josForm" class="form-validate">
                            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="contentpane">
                                <tr>
                                    <td width="15%" height="40"><label id="namemsg" for="name"> <?php echo JText::_('NAME'); ?>:&nbsp;* </label></td>
                                    <td><input type="text" name="name" id="name" size="40" value="" class="inputbox required" maxlength="50" /></td>
                                    <td height="40"><label id="pwmsg" for="password"> <?php echo JText::_('PASSWORD'); ?>:&nbsp;* </label></td>
                                    <td><input class="inputbox required validate-password" type="password" id="password" name="password" size="40" value="" /></td>
                                </tr>
                                <tr>
                                    <td height="40"><label id="usernamemsg" for="username"> <?php echo JText::_('USERNAME'); ?>:&nbsp;* </label></td>
                                    <td><input type="text" id="username" name="username" size="40" value="" class="inputbox required validate-username" maxlength="25" /></td>
                                    <td height="40"><label id="pw2msg" for="password2"> <?php echo JText::_('VERIFY_PASSWORD'); ?>:&nbsp;* </label></td>
                                    <td><input class="inputbox required validate-passverify" type="password" id="password2" name="password2" size="40" value="" /></td>
                                </tr>
                                <tr>
                                    <td height="40"><label id="emailmsg" for="email"> <?php echo JText::_('EMAIL'); ?>:&nbsp;* </label></td>
                                    <td><input type="text" id="email" name="email" size="40" value="" class="inputbox required validate-email" maxlength="100" /></td>
                                    <td height="40"><label id="paismsg" for="pais"> Pa&iacute;s:&nbsp;* </label></td>
                                    <td><input type="text" id="pais" name="pais" size="40" value="" class="inputbox required" maxlength="100" /></td>
                                </tr>
                                <!--nuevo codigo para pais y ciudad-->
                                <tr>
                                    <td height="40"><label id="ciudadmsg" for="ciudad"> Ciudad:&nbsp;* </label></td>
                                    <td><input type="text" id="ciudad" name="ciudad" size="40" value="" class="inputbox required" maxlength="100" /></td>
                                    <td colspan="2" height="40"><p class="information_td"><?php echo JText::_('REGISTER_REQUIRED'); ?></p></td>
                                </tr>
                                <!--fin nuevo codigo-->
                                <!--<tr>
                                    <td colspan="4">
                                <?php
                                //Codigo agregado 18/09/2011
                                //$dispatcher = JDispatcher::getInstance();
                                //$results = $dispatcher->trigger('onCaptchaRequired', array('user.register'));
                                //if ($results[0]) {
                                //    $dispatcher->trigger('onCaptchaView', array('user.register', 0, '', ''));
                                //}
                                //Fin codigo
                                ?>
                                    </td>
                                </tr>-->
                            </table>
                            <button class="button validate" type="submit"><?php echo JText::_('REGISTER'); ?></button>
                            <input type="hidden" name="task" value="register_save" />
                            <input type="hidden" name="id" value="0" />
                            <input type="hidden" name="gid" value="0" />
                            <?php echo JHTML::_('form.token'); ?>
                        </form>
                    </div>
                <?php endif; ?>
                <?php if ($tools) : ?>
                    <div id="popup_tools">
                        <div id="colorpickers1">
                            <?php
                            $style_colors = array();



                            if (isset($_COOKIE['gk29_cp'])) {

                                $temp_a = explode(',', htmlspecialchars(addslashes(strip_tags($_COOKIE['gk29_cp']))));

                                for ($i = 0; $i < count($temp_a); $i++) {

                                    $style_colors[$i] = '#' . $temp_a[$i];
                                }
                            } else {

                                for ($i = 0; $i < count($styles_colors[0]); $i++) {

                                    $style_colors[$i] = $styles_colors[0][$i];
                                }
                            }
                            ?>
                            <?php if ($colorpicker1) : ?>
                                <label for="colorpicker1"><span><?php echo $colorpicker1_text; ?></span>
                                    <input type="text" id="colorpicker1" class="colorpicker inputbox" value="<?php echo (count($style_colors) >= 1) ? $style_colors[0] : '#000000'; ?>" />
                                </label>
                            <?php endif; ?>
                            <?php if ($colorpicker2) : ?>
                                <label for="colorpicker2"><span><?php echo $colorpicker2_text; ?></span>
                                    <input type="text" id="colorpicker2" class="colorpicker inputbox" value="<?php echo (count($style_colors) >= 2) ? $style_colors[1] : '#000000'; ?>" />
                                </label>
                            <?php endif; ?>
                            <?php if ($colorpicker3) : ?>
                                <label for="colorpicker3"><span><?php echo $colorpicker3_text; ?></span>
                                    <input type="text" id="colorpicker3" class="colorpicker inputbox" value="<?php echo (count($style_colors) >= 3) ? $style_colors[2] : '#000000'; ?>" />
                                </label>
                            <?php endif; ?>
                            <?php if ($colorpicker4) : ?>
                                <label for="colorpicker4"><span><?php echo $colorpicker4_text; ?></span>
                                    <input type="text" id="colorpicker4" class="colorpicker inputbox" value="<?php echo (count($style_colors) >= 4) ? $style_colors[3] : '#000000'; ?>" />
                                </label>
                            <?php endif; ?>
                            <?php if ($colorpicker5) : ?>
                                <label for="colorpicker5"><span><?php echo $colorpicker5_text; ?></span>
                                    <input type="text" id="colorpicker5" class="colorpicker inputbox" value="<?php echo (count($style_colors) >= 5) ? $style_colors[4] : '#000000'; ?>" />
                                </label>
                            <?php endif; ?>
                            <?php if ($colorpicker6) : ?>
                                <label for="colorpicker6"><span><?php echo $colorpicker6_text; ?></span>
                                    <input type="text" id="colorpicker6" class="colorpicker inputbox" value="<?php echo (count($style_colors) >= 6) ? $style_colors[5] : '#000000'; ?>" />
                                </label>
                            <?php endif; ?>
                            <?php if ($colorpicker7) : ?>
                                <label for="colorpicker7"><span><?php echo $colorpicker7_text; ?></span>
                                    <input type="text" id="colorpicker7" class="colorpicker inputbox" value="<?php echo (count($style_colors) >= 7) ? $style_colors[6] : '#000000'; ?>" />
                                </label>
                            <?php endif; ?>
                        </div>
                        <div id="colorpickers2">
                            <?php if ($colorpicker8) : ?>
                                <label for="colorpicker8"><span><?php echo $colorpicker8_text; ?></span>
                                    <input type="text" id="colorpicker8" class="colorpicker inputbox" value="<?php echo (count($style_colors) >= 8) ? $style_colors[7] : '#000000'; ?>" />
                                </label>
                            <?php endif; ?>
                            <?php if ($colorpicker9) : ?>
                                <label for="colorpicker9"><span><?php echo $colorpicker9_text; ?></span>
                                    <input type="text" id="colorpicker9" class="colorpicker inputbox" value="<?php echo (count($style_colors) >= 9) ? $style_colors[8] : '#000000'; ?>" />
                                </label>
                            <?php endif; ?>
                            <?php if ($colorpicker10) : ?>
                                <label for="colorpicker10"><span><?php echo $colorpicker10_text; ?></span>
                                    <input type="text" id="colorpicker10" class="colorpicker inputbox" value="<?php echo (count($style_colors) >= 10) ? $style_colors[9] : '#000000'; ?>" />
                                </label>
                            <?php endif; ?>
                            <?php if ($colorpicker11) : ?>
                                <label for="colorpicker11"><span><?php echo $colorpicker11_text; ?></span>
                                    <input type="text" id="colorpicker11" class="colorpicker inputbox" value="<?php echo (count($style_colors) >= 11) ? $style_colors[10] : '#000000'; ?>" />
                                </label>
                            <?php endif; ?>
                            <?php if ($colorpicker12) : ?>
                                <label for="colorpicker12"><span><?php echo $colorpicker12_text; ?></span>
                                    <input type="text" id="colorpicker12" class="colorpicker inputbox" value="<?php echo (count($style_colors) >= 12) ? $style_colors[11] : '#000000'; ?>" />
                                </label>
                            <?php endif; ?>
                            <?php if ($colorpicker13) : ?>
                                <label for="colorpicker13"><span><?php echo $colorpicker13_text; ?></span>
                                    <input type="text" id="colorpicker12" class="colorpicker inputbox" value="<?php echo (count($style_colors) >= 13) ? $style_colors[12] : '#000000'; ?>" />
                                </label>
                            <?php endif; ?>
                            <input type="button" class="button" id="apply_style" value="<?php echo JText::_('APPLY'); ?>" />
                        </div>
                        <div id="predefined"> <?php echo JText::_('PRE'); ?>
                            <ul>
                                <?php for ($i = 0; $i < count($styles_names) && $styles_names[$i] != ''; $i++) : ?>
                                    <li><a href="#" class="predefined" title="<?php echo str_replace('#', '', join(',', $styles_colors[$i])); ?>"><?php echo trim($styles_names[$i]); ?></a></li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($this->countModules('banner1')): ?>
            <div id="banner1" class="clearfix">
                <jdoc:include type="modules" name="banner1" style="raw" />
            </div>
        <?php endif; ?>
        <div id="main_content" class="wrapper_centered">

            <div id="colizq" 
                 style="float: left; 
                 width:<?php echo $mainbody_width; ?>px; 
                 background-color:<?php echo ($menu->getActive() == $menu->getDefault()) ? '#ece4d9' : '#FFFFFF' ?>">
                 <?php if ($this->countModules('header')) : ?>
                    <div id="header" style="width:<?php echo $mainbody_width; ?>px;">
                        <?php if ($this->countModules('header')) : ?>
                            <jdoc:include type="modules" name="header" style="gavickpro" />
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->countModules('banner2')): ?>
                    <div id="banner2" style="width:<?php echo $mainbody_width; ?>px;">
                        <jdoc:include type="modules" name="banner2" style="raw" />
                    </div>
                <?php endif; ?>
                <?php
                $app = JFactory::getApplication();
                $menu = $app->getMenu();
                ?> 
                <div id="content_column" style="width:<?php echo $mainbody_width; ?>px; background-color:<?php echo ($menu->getActive() == $menu->getDefault()) ? '#ece4d9' : '#FFFFFF' ?>">
                    <jdoc:include type="message" />
                    <?php
                    // show mainbody on all subpages but not on frontpage

                    if (!($this->params->get("frontpage", 1) == 0 && $menu->getActive() == $menu->getDefault() && $this->countModules('mainbody + user1 + user2 + user3 + user4 + user5 + user6 + inset + top + breadcrumb + bottom + header + banner2') == 0)) :
                        ?>
                        <div id="content" class="clearfix">
                            <div id="component" style="width: <?php echo $mainbody_width; ?>px;">

                                <?php if ($this->countModules('top')) : ?>
                                    <div class="module_wrap_titulo clearfix">
                                        <jdoc:include type="modules" name="toptitulo" style="gavickpro" />
                                    </div>

                                    <div class="module_wrap clearfix" id="espa">
                                        <jdoc:include type="modules" name="top" style="gavickpro" />
                                        <div class="clr"></div>
                                        <jdoc:include type="modules" name="top2" style="gavickpro" /> 
                                    </div>
                                <?php endif; ?>

                                <?php if ($this->countModules('user1')) : ?>
                                    <div id="engl" class="clearfix">
                                        <jdoc:include type="modules" name="user1" style="gavickpro" />
                                    </div>
                                <?php endif; ?>


                                <?php if ($this->countModules('user4')) : ?>
                                    <div id="fran">
                                        <jdoc:include type="modules" name="user4" style="gavickpro" />
                                    </div>
                                <?php endif; ?>

                                <?php if ($this->countModules('user5')) : ?>
                                    <div id="port">
                                        <jdoc:include type="modules" name="user5" style="gavickpro" />
                                    </div>
                                <?php endif; ?>

                                <?php
                                // show mainbody on all subpages but not on frontpage
                                if (!$frontpage_i || $this->countModules('mainbody')) :
                                    ?>


                                    <div id="mainbody" class="clearfix">
                                        <?php if ($this->countModules('breadcrumb')) : ?>
                                            <div id="breadcrumb" class="clearfix">
                                                <jdoc:include type="modules" name="breadcrumb" style="gavickpro" />
                                            </div>
                                        <?php endif; ?>
                                        <div id="mainbody_content" style="width:<?php echo $content_width; ?>px;">
                                            <?php if ($this->countModules('mainbody')) : ?>
                                                <jdoc:include type="modules" name="mainbody" style="gavickpro" />
                                            <?php else: ?>
                                                <jdoc:include type="component" />
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($this->countModules('inset')) : ?>
                                            <div id="inset" style="width:<?php echo $inset_width; ?>px;margin-left:<?php echo $inset_margin; ?>px;">
                                                <jdoc:include type="modules" name="inset" style="gavickpro" />
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>


                                <?php if ($this->countModules('bottom')) : ?>
                                    <div class="module_wrap clearfix">
                                        <jdoc:include type="modules" name="bottom" style="gavickpro" headerLevel="3" />
                                    </div>
                                <?php endif; ?>

                                <?php if ($this->countModules('user7 or user8 or user9 or user10 or user11')) : ?>
                                    <div id="bottom" class="module_wrap clearfix">
                                        <?php if ($this->countModules('user7')) : ?>
                                            <div class="<?php echo $user_position_3; ?>">
                                                <jdoc:include type="modules" name="user7" style="gavickpro" />
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($this->countModules('user8')) : ?>
                                            <div class="<?php echo $user_position_3; ?>">
                                                <jdoc:include type="modules" name="user8" style="gavickpro" />
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($this->countModules('user9')) : ?>
                                            <div class="<?php echo $user_position_3; ?>">
                                                <jdoc:include type="modules" name="user9" style="gavickpro" />
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($this->countModules('user10')) : ?>
                                            <div class="<?php echo $user_position_3; ?>">
                                                <jdoc:include type="modules" name="user10" style="gavickpro" />
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($this->countModules('user11')) : ?>
                                            <div class="<?php echo $user_position_3; ?>">
                                                <jdoc:include type="modules" name="user11" style="gavickpro" />
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div id="colder" 
                 style="float: left; 
                 width: <?php echo $column_width; ?>px;
                 margin-<?php echo ($column_position == 'left') ? 'right' : 'left'; ?>:<?php echo $column_margin; ?>px;">
                 <?php if ($this->countModules('column')): ?>
                    <div id="<?php echo $column_position; ?>" class="column" style="width: <?php echo $column_width; ?>px;margin-<?php echo ($column_position == 'left') ? 'right' : 'left'; ?>:<?php echo $column_margin; ?>px;">
                        <jdoc:include type="modules" name="column" style="gavickpro" />
                    </div>
                <?php endif; ?>
            </div>            
        </div>

        <?php if ($this->countModules('user18')) { ?>
            <div id="bottom-r2">
                <div id="bottonm-r2">
                    <jdoc:include type="modules" name="user18" style="gavickpro" />
                </div>
            </div>
        <?php } ?>


        <div id="footer" class="clearfix">
            <?php
// including footer file

            include_once(JPATH_ROOT . "/templates/" . $this->template . '/lib/php/gk_footer.php');
            ?>
        </div>
        <?php
        /*

          IE6 alert

         */



        // including information alert for IE6

        if ($this->params->get("ie6info", 1) == 1):
            ?>
            <!--[if IE 6]>
            
                    <div id="ie6">
            
            <?php include_once(JPATH_ROOT . "/templates/" . $this->template . '/lib/php/gk_ie6.php'); ?>
            
                    </div>
            
                    <![endif]-->
        <?php endif; ?>
        <jdoc:include type="modules" name="debug" />

        <script type="text/javascript">
            var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
            document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <script type="text/javascript">
            try {
                var pageTracker = _gat._getTracker("UA-8332413-1");
                pageTracker._trackPageview();
            } catch (err) {
            }</script>
    </body>
</html>