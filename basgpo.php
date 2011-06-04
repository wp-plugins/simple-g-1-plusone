<?php
/*
Plugin Name: Simple Google +1 Button
Plugin URI: http://en.bainternet.info
Description: This Plugin lets you add the new google +1 button to your site or blog.
Version: 1.1
Author: Bainternet
Author URI: http://en.bainternet.info
*/



//options panel
include_once('adminp.php');

$options_panel = new bagpo_SubPage('settings', array('page_title' =>__('Simple Google Plus One'),'option_group' => 'bagpo_settings'));

$options_panel->addTitle(__('<a href="http://en.ainternet.info">Bainternet</a> Simple Google +1'));
$options_panel->addSubtitle(__('Button Settings:'));
$options_panel->addDropdown(array(
			'id' => 'size',
			'label' => __('+1 Button size'),
			'desc' => __('Select +1 Button size.'),
			'standard' => 'standard',
			'options' => array(
				'Standard' => 'standard',
				'Small' => 'small',
				'Medium' => 'medium',
				'Tall' => 'tall'
			)));
$options_panel->addCheckbox(array(
			'id' => 'count',
			'label' => __('Show +1 Button with count'),
			'desc' => __('if the selected size is tall then count will show no matter what.'),
			'standard' => true,
			));
$options_panel->addDropdown(array(
			'id' => 'lang',
			'label' => __('+1 Button Language'),
			'desc' => __('Select +1 Language.'),
			'standard' => 'en-US',
			'options' => array(
				'Arabic' => 'ar',
				'Bulgarian' => 'bg',
				'Catalan' => 'ca',
				'Chinese (Simplified)' => 'zh-CN',
				'Chinese (Traditional)' => 'zh-TW',
				'Croatian' => 'hr',
				'Czech' => 'cs',
				'Danish' => 'da',
				'Dutch' => 'nl',
				'English (UK)' => 'en-GB',
				'English (US)' => 'en-US',
				'Estonian' => 'et',
				'Filipino' => 'fil',
				'Finnish' => 'fi',
				'French' => 'fr',
				'German' => 'de',
				'Greek' => 'el',
				'Hebrew' => 'iw',
				'Hindi' => 'hi',
				'Hungarian' => 'hu',
				'Indonesian' => 'id',
				'Italian' => 'it',
				'Japanese' => 'ja',
				'Korean' => 'ko',
				'Latvian' => 'lv',
				'Lithuanian' => 'lt',
				'Malay' => 'ms',
				'Norwegian' => 'no',
				'Persian' => 'fa',
				'Polish' => 'pl',
				'Portuguese (Brazil)' => 'pt-BR',
				'Portuguese (Portugal)' => 'pt-PT',
				'Romanian' => 'ro',
				'Russian' => 'ru',
				'Serbian' => 'sr',
				'Slovak' => 'sk',
				'Slovenian' => 'sl',
				'Spanish' => 'es',
				'Spanish (Latin America)' => 'es-419',
				'Swedish' => 'sv',
				'Thai' => 'th',
				'Turkish' => 'tr',
				'Ukrainian' => 'uk',
				'Vietnamese' => 'vi')));			
$options_panel->addInput(array(
				'id' => 'callback',
				'label' => 'Default JS callback Funtion',
				'desc' => 'Leave Blank unless you know what you are doing :)',
				'standard' => ''
			));
$options_panel->addSubtitle(__('Button Display Settings:'));
$options_panel->addDropdown(array(
			'id' => 'where',
			'label' => __('Where to add button?'),
			'desc' => __('Select the placement of the button'),
			'standard' => '1',
			'options' => array(
				'Before the content' => '1',
				'After the content' => '2',
				'Before and After' => '3'
			)));
$options_panel->addSubtitle(__('Button Display Settings:'));
$options_panel->addCheckbox(array(
			'id' => 'page',
			'label' => __('Pages'),
			'desc' => __('Show +1 Button on pages'),
			'standard' => true,
			));
$options_panel->addCheckbox(array(
			'id' => 'post',
			'label' => __('Posts'),
			'desc' => __('Show +1 Button on posts'),
			'standard' => true,
			));
$options_panel->addCheckbox(array(
			'id' => 'cpt',
			'label' => __('Custom Post types:'),
			'desc' => __('Show +1 Button on Custom Post types:'),
			'standard' => false,
			));
$options_panel->addCheckbox(array(
			'id' => 'cat',
			'label' => __('Category'),
			'desc' => __('Show +1 Button on category archives:'),
			'standard' => false,
			));
$options_panel->addCheckbox(array(
			'id' => 'tag',
			'label' => __('Tag'),
			'desc' => __('Show +1 Button on tag archives:'),
			'standard' => false,
			));
$options_panel->addCheckbox(array(
			'id' => 'tax',
			'label' => __('Custom taxonomies'),
			'desc' => __('Show +1 Button on custom taxonomies archives:'),
			'standard' => false,
			));
$options_panel->addParagraph('<ul>
					<li>* '.__('You can insert the button manually in posts, pages or widgets using Shortcode').' <br/><pre>[gplusone]</pre></li>
					<li>* '.__('You can also insert the button manually in Template files').' <br/><pre><?php echo do_shortcode("[gplusone]"); ?></pre></li>
					<li>* '.__('Shortcode Parameters:').'
						<ul>
							<li>size: '.__('Size of the button').' , accepts tall,small,medium,standart.</li>
							<li>count: '.__('Show count').', accepts true,false</li>
							<li>callback: '.__('use custom callback function').', accepts callback function name</li>
						</ul>
					</li>
					<li>'.__('example:').' <br/><pre>
					[gplusone size="small" count="true" callback="my_callback"]
					</pre></li>
				</ul>');
$options_panel->addParagraph('<ul style="background-color: #ffffff;">
					<li>* Any feedback or suggestions are welcome at <a href="http://en.bainternet.info/2011/simple-google-1-plugin">plugin homepage</a></li>
					<li>* <a href="http://wordpress.org/tags/simple-g-1-plusone?forum_id=10">Support forum</a> for hrlp and bug submittion</li>
					<li>* Also check out <a href="http://en.bainternet.info/category/plugins">my other plugins</a></li>
					<li>* And if you like my work <a href="http://en.bainternet.info/donations">make a donation</a></li>
				</ul>');
//page/post/cpt/cat/tag/tax hook
add_filter('the_content','show_button');
add_filter('the_excerpt','show_button');

// Use shortcodes in text widgets.
add_filter('widget_text', 'do_shortcode');
//the_content_function			
function show_button($content = null){
	$checkshow = false;
	$options = get_option('bagpo_settings');
	if (is_page()){
		if ($options['page'] == "true"){
			$checkshow = true;
		}
	}
	if (is_single()){
		if ($options['post'] == "true"){
			$checkshow = true;
		}
	}
	if (is_singular()){
		if ($options['cpt'] == "true"){
			$checkshow = true;
		}
	}
	if (is_category()){
		if ($options['cat'] == "true"){
			$checkshow = true;
		}
	}
	if (is_tag()){
		if ($options['tag'] == "true"){
			$checkshow = true;
		}
	}
	if (is_tax()){
		if ($options['tax'] == "true"){
			$checkshow = true;
		}
	}
/*echo '<pre>';
var_dump($options);
echo '</pre>';*/
	if ($checkshow){
		if (!empty($options)){
			
			$b = '<g:plusone ';
			if ($options['count'] != "true" && $options['size'] != 'tall'){
				$b .= 'count="false" ';
			}
			if ($options['callback'] != ''){
				$b .= 'callback="'.$options['callback'].'" ';
			}
			if ($options['size'] != 'standard'){
				$b .= 'size="'.$options['size'].'" ';
			}
			$b .= 'href="'.rawurlencode(get_permalink()).'"';
			$b .= '></g:plusone>';
			
			if ($options['where'] === "1"){
				$return = '<div class="gpone">'. $b . '</div>' . $content;
			}
			if ($options['where'] === "2"){
				$return = $content . '<div class="gpone">'. $b . '</div>';
			}
			if ($options['where'] === "3"){
				$return = '<div class="gpone">'. $b . '</div>' .$content .'<div class="gpone">'. $b . '</div>';
			}
			return $return;
		}
	}
	return $content;
}

//shortcode hook
add_shortcode('gplusone','gp_button_shortcode');
//shortcode function
function gp_button_shortcode($atts,$content = null){
	$options = get_option('bagpo_settings');
	extract(shortcode_atts($options, $atts));
	$options = array_merge($options,(array)$atts);
		if (!empty($options)){
			
			$b = '<g:plusone ';
			if ($options['count'] != "true" && $options['size'] != 'tall'){
				$b .= 'count="false" ';
			}
			if ($options['callback'] != ''){
				$b .= 'callback="'.$options['callback'].'" ';
			}
			if ($options['size'] != 'standard'){
				$b .= 'size="'.$options['size'].'" ';
			}
			$b .= 'href="'.rawurlencode(get_permalink()).'"';
			$b .= '></g:plusone>';
			
			if ($options['where'] == '1'){
				$return = $b . '<br />' . $content;
			}else{
				$return = $content . '<br />' . $b;
			}
			return $return;
		}
	
	return $content;
}

//script hook
add_action('wp_head','bagpo_scripts');

function bagpo_scripts(){
	$options = get_option('bagpo_settings');
	$lang = '';
	if ($options['lang'] != "en-US"){
		$lang = "{lang: '".$options['lang']."'}";
	}
		?>
		<script type="text/javascript" src="http://apis.google.com/js/plusone.js"><?php echo $lang; ?></script>
		<?php
}