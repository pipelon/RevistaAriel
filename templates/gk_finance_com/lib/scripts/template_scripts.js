/*--------------------------------------------------------------
# Finance.com - September 2009 (for Joomla 1.5)
# Copyright (C) 2007-2009 Gavick.com. All Rights Reserved.
# License: Copyrighted Commercial Software
# Website: http://www.gavick.com
# Support: support@gavick.com  
---------------------------------------------------------------*/

window.addEvent("load",function(){
	var $b = $(document.getElementsByTagName('body')[0]);
	// smoothscroll init
	new SmoothScroll();
	// animation classes - Fx.Height and Fx.Opacity
	Fx.Height = Fx.Style.extend({initialize: function(el, options){this.parent(el, 'height', options);this.element.setStyle('overflow', 'hidden');},toggle: function(){return (this.element.offsetHeight > 0) ? this.custom(this.element.offsetHeight, 0) : this.custom(0, this.element.scrollHeight);},show: function(){return this.set(this.element.scrollHeight);}});
	Fx.Opacity = Fx.Style.extend({initialize: function(el, options){this.now = 1;this.parent(el, 'opacity', options);},toggle: function(){return (this.now > 0) ? this.start(1, 0) : this.start(0, 1);},show: function(){return this.set(1);}});
	// help vars
	var panels_opened = [false, false, false]; // login, register, tools
	var FXs = [[false,false],[false,false],[false,false]];
	var animation = false; 
	['popup_login','popup_register','popup_tools'].each(function(e,i){
		var el = $(e);
		if(el) {
			FXs[i][0] = new Fx.Height(el,{duration:350,onStart:function(){animation = true;},onComplete:function(){animation = false;}}).set(0);
			FXs[i][1] = new Fx.Opacity(el,{duration:350,onStart:function(){animation = true;},onComplete:function(){animation = false;}}).set(0);
			el.setStyle("display","block");
		}
	});
	function gk_template_tab(e,toClose,panels){
		new Event(e).stop();
		var closed = false;
		if(panels_opened[toClose[0]]){
			FXs[toClose[0]][0].toggle();
			FXs[toClose[0]][1].toggle();
			closed = true;
		}
		if(panels_opened[toClose[1]]){
			FXs[toClose[1]][0].toggle();
			FXs[toClose[1]][1].toggle();
			closed = true;
		}
		(function(){
			FXs[toClose[2]][0].toggle();
			FXs[toClose[2]][1].toggle();
		}).delay(closed ? 350 : 0);
		panels_opened = panels;
	}
	// buttons
	if($('login')) $('login').addEvent("click", function(e){if(!animation) gk_template_tab(e,[1,2,0],[!panels_opened[0],false,false]);});
	if($('login_noborder')) $('login_noborder').addEvent("click", function(e){if(!animation) gk_template_tab(e,[1,2,0],[!panels_opened[0],false,false]);});
	if($('register')) $('register').addEvent("click", function(e){if(!animation) gk_template_tab(e,[0,2,1],[false,!panels_opened[1],false]);});
	if($('tools')) $('tools').addEvent("click", function(e){if(!animation) gk_template_tab(e,[0,1,2],[false,false,!panels_opened[2]]);});
	// equal columns
	// users_wrap I
	if($ES('.users_wrap')[0]){
		if($ES('.moduletable_content', $ES('.users_wrap')[0]).length > 0){
			var max = 0;
			$ES('.moduletable_content', $ES('.users_wrap')[0]).each(function(el){ if(el.getSize().size.y > max) max = el.getSize().size.y; });
			max -= 15;	
			$ES('.moduletable_content', $ES('.users_wrap')[0]).each(function(el){ el.setStyle("height", max+"px"); });	
		}		
	}
	// users_wrap II
	if($ES('.users_wrap')[1]){
		if($ES('.moduletable_content', $ES('.users_wrap')[1]).length > 0){
			var max = 0;
			$ES('.moduletable_content', $ES('.users_wrap')[1]).each(function(el){ if(el.getSize().size.y > max) max = el.getSize().size.y; });	
			max -= 15;
			$ES('.moduletable_content', $ES('.users_wrap')[1]).each(function(el){ el.setStyle("height", max+"px"); });	
		}			
	}
	// users_wrap III
	if($('bottom')){
		if($ES('.moduletable_content', $('bottom')).length > 0){
			var max = 0;
			$ES('.moduletable_content', $('bottom')).each(function(el){ if(el.getSize().size.y > max) max = el.getSize().size.y; });
			max -= 15;
			$ES('.moduletable_content', $('bottom')).each(function(el){ el.setStyle("height", max+"px"); });	
		}			
	}
	//
	if($('stylearea')){
		$A($$('.style_switcher')).each(function(element,index){
			element.addEvent('click',function(event){
				var event = new Event(event);
				event.preventDefault();
				changeStyle(index+1);
			});
		});
		new SmoothScroll();
	}
	
	if($('apply_style')){
		$('apply_style').addEvent("click", function(){
			var colors = '';
			var error_flag = false;
			$$('.colorpicker').each(function(el){
				if(el.getValue().test('^\#[0-9a-f]{6}$|^\#[0-9a-f]{3}$','gi')){
					colors += el.getValue()+",";
				}else{
					error_flag = true;
				}
			});
			if(!error_flag){
				colors = colors.substring(0,colors.length-1);
				colors = colors.replace(/\#/gi,'');
				var file = $template_path+'/css/style.php?colors='+colors;
				new Asset.css(file);
				new Cookie.set('gk29_cp',colors,{duration: 200,path: "/"});
			}else{
				alert('One or more colorpicker fields contains incorrect hex values - please fix it and try again.');
			}
		});
		
		var $moors = [];
		$$('.colorpicker').each(function(el,i){
			el.setStyle("background",el.value);
			el.setStyle("color",new Color(el.value).invert());
			
			$moors[i] = new MooRainbow(el, {
				'id':'mr'+i,
				'startColor': el.getValue().hexToRgb(true),
				'onChange': function(color) {
					el.value = color.hex;
					el.setStyle("background",color.hex);
					el.setStyle("color",new Color(color.hex).invert());	
				}
			});	
		});
		
		$$('.colorpicker').each(function(el,i){
			el.addEvent("click",function(){
				$moors.each(function(elm,j){
					if(j != i) elm.hide();
				});
			});
		});
	}
	if($$('.predefined')){
		$$('.predefined').each(function(el){
			el.addEvent("click", function(e){
				new Event(e).stop();
				var file = $template_path+'/css/style.php?colors='+el.getProperty("title");
				new Asset.css(file);
				new Cookie.set('gk29_cp',el.getProperty("title"),{duration: 200,path: "/"});
				var temp = el.getProperty("title").split(",");
				$$('.colorpicker').each(function(elm,j){
					if(temp.length > j){
						elm.value = '#'+temp[j];
						elm.setStyle("background",elm.value);
						elm.setStyle("color",new Color(elm.value).invert());
					}
				});
			});	
		});
	}
});
// Function to change backgrouns
function changeStyle(style){
	var file = $template_path+'/css/style'+style+'.css';
	new Asset.css(file);
	new Cookie.set('gk29_style',style,{duration: 200,path: "/"});
}