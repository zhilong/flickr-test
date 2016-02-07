<?php
if($_POST['search_photo']) {

	require_once("phpFlickr.php");
	$f = new phpFlickr("f07fd4950b7e52cb7718f1d655847938","78c0aab6ceeda10f",true);
	$args = array();
	$args['text'] = $_POST['search_photo'];
	$args['per_page'] = 10;
	$args['page'] = 1;
	$recent = $f->photos_search($args);
	foreach ($recent['photo'] as $photo) {
		$owner = $f->people_getInfo($photo['owner']);
		echo "<a href='http://www.flickr.com/photos/" . $photo['owner'] . "/" . $photo['id'] . "/'>";
		echo $photo['title'];
		echo "</a> Owner: ";
		echo "<a href='http://www.flickr.com/people/" . $photo['owner'] . "/'>";
		echo $owner['username']['_content'];
		echo "</a><br>";
	}
}
?>