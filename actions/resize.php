<?php
/**
 * Resizes the user's avatar
 */

$guid = get_input('guid');
$user = get_entity($guid);

$filehandler = new ElggFile();
$filehandler->owner_guid = $user->getGUID();
$filehandler->setFilename("profile/" . $user->guid . "master" . ".jpg");
$filename = $filehandler->getFilenameOnFilestore();

$topbar = get_resized_image_from_existing_file($filename,16,16, true);
$tiny = get_resized_image_from_existing_file($filename,25,25, true);
$small = get_resized_image_from_existing_file($filename,40,40, true);
$medium = get_resized_image_from_existing_file($filename,100,100, true);
$large = get_resized_image_from_existing_file($filename,200,200, true);

if ($small !== false && $medium !== false && $large !== false && $tiny !== false) {

	$filehandler = new ElggFile();
	$filehandler->owner_guid = $user->getGUID();
	$filehandler->setFilename("profile/" . $user->guid . "large.jpg");
	$filehandler->open("write");
	$filehandler->write($large);
	$filehandler->close();
	$filehandler->setFilename("profile/" . $user->guid . "medium.jpg");
	$filehandler->open("write");
	$filehandler->write($medium);
	$filehandler->close();
	$filehandler->setFilename("profile/" . $user->guid . "small.jpg");
	$filehandler->open("write");
	$filehandler->write($small);
	$filehandler->close();
	$filehandler->setFilename("profile/" . $user->guid . "tiny.jpg");
	$filehandler->open("write");
	$filehandler->write($tiny);
	$filehandler->close();
	$filehandler->setFilename("profile/" . $user->guid . "topbar.jpg");
	$filehandler->open("write");
	$filehandler->write($topbar);
	$filehandler->close();

	$user->icontime = time();
}

forward(REFERER);
