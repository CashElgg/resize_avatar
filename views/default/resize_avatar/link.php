<?php
/**
 * The link for resize avatar action
 */

$url = $vars['url'] . 'action/avatar/resize?guid=' . $vars['entity']->guid;
$url = elgg_add_action_tokens_to_url($url);

echo elgg_view('output/url', array(
	'text' => 'Resize avatar',
	'href' => $url,
));
