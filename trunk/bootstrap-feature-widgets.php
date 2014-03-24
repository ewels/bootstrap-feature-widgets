<?php
/*
Plugin Name: Bootstrap Feature Widgets
Plugin URI: http://www.tallphil.co.uk/bootstrap-feature-widgets/
Description: A simple widget which makes markup for a feature using Twitter Bootstrap styles
Version: 1.0
Author: Phil Ewels
Author URI: http://phil.ewels.co.uk
Text Domain: bootstrap-feature-widgets
License: GPL2v2
*/

class bootstrapFeatureWidgets extends WP_Widget {
	//
	// Widget Registration
	//
	function bootstrapFeatureWidgets() {
		$widget_ops = array('classname' => 'bootstrapFeatureWidget', 'description' => 'A simple widget which makes markup for a feature using Twitter Bootstrap styles' );
		$this->WP_Widget('bootstrapFeatureWidget', 'Bootstrap Feature Widget', $widget_ops);
	}
 	
	
	//
	// Admin Widget Form
	//
	function form($instance) {
		$glyphicon_classes = array('asterisk', 'plus', 'euro', 'minus', 'cloud', 'envelope', 'pencil', 'glass', 'music', 'search', 'heart', 'star', 'star-empty', 'user', 'film', 'th-large', 'th', 'th-list', 'ok', 'remove', 'zoom-in', 'zoom-out', 'off', 'signal', 'cog', 'trash', 'home', 'file', 'time', 'road', 'download-alt', 'download', 'upload', 'inbox', 'play-circle', 'repeat', 'refresh', 'list-alt', 'lock', 'flag', 'headphones', 'volume-off', 'volume-down', 'volume-up', 'qrcode', 'barcode', 'tag', 'tags', 'book', 'bookmark', 'print', 'camera', 'font', 'bold', 'italic', 'text-height', 'text-width', 'align-left', 'align-center', 'align-right', 'align-justify', 'list', 'indent-left', 'indent-right', 'facetime-video', 'picture', 'map-marker', 'adjust', 'tint', 'edit', 'share', 'check', 'move', 'step-backward', 'fast-backward', 'backward', 'play', 'pause', 'stop', 'forward', 'fast-forward', 'step-forward', 'eject', 'chevron-left', 'chevron-right', 'plus-sign', 'minus-sign', 'remove-sign', 'ok-sign', 'question-sign', 'info-sign', 'screenshot', 'remove-circle', 'ok-circle', 'ban-circle', 'arrow-left', 'arrow-right', 'arrow-up', 'arrow-down', 'share-alt', 'resize-full', 'resize-small', 'exclamation-sign', 'gift', 'leaf', 'fire', 'eye-open', 'eye-close', 'warning-sign', 'plane', 'calendar', 'random', 'comment', 'magnet', 'chevron-up', 'chevron-down', 'retweet', 'shopping-cart', 'folder-close', 'folder-open', 'resize-vertical', 'resize-horizontal', 'hdd', 'bullhorn', 'bell', 'certificate', 'thumbs-up', 'thumbs-down', 'hand-right', 'hand-left', 'hand-up', 'hand-down', 'circle-arrow-right', 'circle-arrow-left', 'circle-arrow-up', 'circle-arrow-down', 'globe', 'wrench', 'tasks', 'filter', 'briefcase', 'fullscreen', 'dashboard', 'paperclip', 'heart-empty', 'link', 'phone', 'pushpin', 'usd', 'gbp', 'sort', 'sort-by-alphabet', 'sort-by-alphabet-alt', 'sort-by-order', 'sort-by-order-alt', 'sort-by-attributes', 'sort-by-attributes-alt', 'unchecked', 'expand', 'collapse-down', 'collapse-up', 'log-in', 'flash', 'log-out', 'new-window', 'record', 'save', 'open', 'saved', 'import', 'export', 'send', 'floppy-disk', 'floppy-saved', 'floppy-remove', 'floppy-save', 'floppy-open', 'credit-card', 'transfer', 'cutlery', 'header', 'compressed', 'earphone', 'phone-alt', 'tower', 'stats', 'sd-video', 'hd-video', 'subtitles', 'sound-stereo', 'sound-dolby', 'sound-5-1', 'sound-6-1', 'sound-7-1', 'copyright-mark', 'registration-mark', 'cloud-download', 'cloud-upload', 'tree-conifer', 'tree-deciduous');
		sort($glyphicon_classes);
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'icon' => '', 'displayNews' => 0, 'numNews' => 3, 'description' => '', 'link_text' => '', 'link_url' => '#', 'link_class' => 'btn-default', 'link_newWindow' => '', 'defaultStyling' => '1' ) );
?>
	<link type="text/css" src="<?php echo basename(dirname(__FILE__)); ?>/bootstrap_glyphicons.css" />
	
	<p class="description">This widget displays markup for a homepage feature using Twitter Bootstrap styles</p>
	
	<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($instance['title']); ?>" /></label></p>
	
	<p><label for="<?php echo $this->get_field_id('glyphicon'); ?>"><a href="http://getbootstrap.com/components/#glyphicons" title="See available glyphicons (opens in new window)" target="_blank">Glyphicon</a>: <select class="widefat" id="<?php echo $this->get_field_id('glyphicon'); ?>" name="<?php echo $this->get_field_name('glyphicon'); ?>">
			<option value="">[ none ]</option>
			<?php foreach ($glyphicon_classes as $glyphicon_class){ ?><option value="<?php echo 'glyphicon-'.$glyphicon_class; ?>"<?php selected( $instance['glyphicon'], 'glyphicon-'.$glyphicon_class ); ?>><?php echo $glyphicon_class; ?></option><?php } ?>
		</select></label></p>
	
	<p><label for="<?php echo $this->get_field_id('displayNews'); ?>">Display News? <input id="<?php echo $this->get_field_id('displayNews'); ?>" name="<?php echo $this->get_field_name('displayNews'); ?>" type="checkbox" value="1" <?php checked( $instance['displayNews'], '1' ); ?> /></label>
		<label for="<?php echo $this->get_field_id('numNews'); ?>">Number: <input size="3" id="<?php echo $this->get_field_id('numNews'); ?>" name="<?php echo $this->get_field_name('numNews'); ?>" type="text" value="<?php echo attribute_escape($instance['numNews']); ?>" /></label></p>
	
	<p><label for="<?php echo $this->get_field_id('description'); ?>">(alternatively) Description: <textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"><?php echo attribute_escape($instance['description']); ?></textarea></label></p>
	
	<p><label for="<?php echo $this->get_field_id('link_text'); ?>">Link Text: <input class="widefat" id="<?php echo $this->get_field_id('link_text'); ?>" name="<?php echo $this->get_field_name('link_text'); ?>" type="text" value="<?php echo attribute_escape($instance['link_text']); ?>" /></label></p>
	
	<p><label for="<?php echo $this->get_field_id('link_url'); ?>">Link URL: <input class="widefat" id="<?php echo $this->get_field_id('link_url'); ?>" name="<?php echo $this->get_field_name('link_url'); ?>" type="text" value="<?php echo attribute_escape($instance['link_url']); ?>" /></label></p>
	
	<p><label for="<?php echo $this->get_field_id('link_class'); ?>"><a href="http://getbootstrap.com/css/#buttons" title="See available classes (opens in new window)" target="_blank">Link Class</a>: <select class="widefat" id="<?php echo $this->get_field_id('link_class'); ?>" name="<?php echo $this->get_field_name('link_class'); ?>">
			<option value="btn-default" <?php selected( $instance['link_class'], 'btn-default' ); ?>>Default</option>
			<option value="btn-primary" <?php selected( $instance['link_class'], 'btn-primary' ); ?>>Primary</option>
			<option value="btn-success" <?php selected( $instance['link_class'], 'btn-success' ); ?>>Success</option>
			<option value="btn-info" <?php selected( $instance['link_class'], 'btn-info' ); ?>>Info</option>
			<option value="btn-warning" <?php selected( $instance['link_class'], 'btn-warning' ); ?>>Warning</option>
			<option value="btn-danger" <?php selected( $instance['link_class'], 'btn-danger' ); ?>>Danger</option>
			<option value="btn-link" <?php selected( $instance['link_class'], 'btn-link' ); ?>>Link</option>
		</select></label></p>
	
	<p><label for="<?php echo $this->get_field_id('link_newWindow'); ?>">Open link in new window? <input id="<?php echo $this->get_field_id('link_newWindow'); ?>" name="<?php echo $this->get_field_name('link_newWindow'); ?>" type="checkbox" value="1" <?php checked( $instance['link_newWindow'], '1' ); ?> /></label></p>
	
	<p><label for="<?php echo $this->get_field_id('defaultStyling'); ?>">Use default glyphicon styles? <input id="<?php echo $this->get_field_id('defaultStyling'); ?>" name="<?php echo $this->get_field_name('defaultStyling'); ?>" type="checkbox" value="1" <?php checked( $instance['defaultStyling'], '1', true ); ?> /></label></p>
		
<?php
	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['glyphicon'] = $new_instance['glyphicon'];
		$instance['displayNews'] = $new_instance['displayNews'];
		$instance['numNews'] = $new_instance['numNews'];
		$instance['description'] = $new_instance['description'];
		$instance['link_text'] = $new_instance['link_text'];
		$instance['link_url'] = $new_instance['link_url'];
		$instance['link_class'] = $new_instance['link_class'];
		$instance['link_newWindow'] = $new_instance['link_newWindow'];
		$instance['defaultStyling'] = $new_instance['defaultStyling'];
		return $instance;
	}
 	
	
	//
	// Widget Front-End Output
	//
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
 
		echo $before_widget;
		
		// Icon
		if (!empty($instance['glyphicon'])){
			echo '<span class="glyphicon '.$instance['glyphicon'].'"';
			if ($instance['defaultStyling']) echo ' style="font-size:100px; color:#666;"';
			echo '></span>';
		}
		
		// Title
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		if (!empty($title)) echo $before_title . $title . $after_title;
		
		if($instance['displayNews']){
			// News
			echo '<ul class="bootstrap-feature-widget-news lead">';
			wp_reset_query();
			global $post;
			$news = get_posts( array( 'post_type' => 'post', 'posts_per_page' => $instance['numNews'] ) );
			foreach ( $news as $post ){
				setup_postdata( $post );
				echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
			}
			wp_reset_postdata();
			echo '</ul>';
		} else {
			// Text
			if (!empty($instance['description'])) echo '<p class="lead">'.$instance['description'].'</p>';
		}
		
		// Link Button
		$link_newWindow = $instance['link_newWindow'] ? ' target="_blank"' : '';
		if (!empty($instance['link_text']) && !empty($instance['link_url'])) echo '<p><a href="'.$instance['link_url'].'" class="btn '.$instance['link_class'].'" '.$link_newWindow.'>'.$instance['link_text'].'</a></p>';
		
		echo $after_widget;
	}
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("bootstrapFeatureWidgets");') );

?>