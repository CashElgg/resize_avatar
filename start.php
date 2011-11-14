<?php
/**
 * Resize an avatar
 */

register_elgg_event_handler('init', 'system', 'resize_avatar_init');

function resize_avatar_init() {
	if (isadminloggedin()) {
		elgg_extend_view('profile/menu/adminlinks', 'resize_avatar/link');
	}

	$base = get_config('pluginspath') . 'resize_avatar/actions';
	register_action('avatar/resize', false, "$base/resize.php", true);
}
