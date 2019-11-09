#!/usr/bin/php
<?php
if ($argc != 2)
	exit;
$ch = curl_init($argv[1]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
curl_exec($ch);
if(curl_errno($ch))
    exit;
$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
$regex_img = '/<img[^>]*src="(.*?)"[^>]*>/';
preg_match('/.*?\/\/(.*?)(\/|$)/', $url, $site_name);
$site_ext = substr($url, 0, strpos($url, "//") + 2);
if (!is_dir($site_name[1]))
	mkdir($site_name[1]);
if (!($code_html = file_get_contents($url)))
	exit;
preg_match_all($regex_img, $code_html, $images);
foreach ($images[1] as $image)
{
	if (!($udata = parse_url($image)))
		break;
	if ($image[0] === '/')
		$image = $site_ext.$site_name[1].$image;
	$cid = curl_init($image);
	$file_img = substr(strrchr($udata['path'], "/"), 1);
	$img_dir = $site_name[1]."/".$file_img;
	curl_setopt($cid, CURLOPT_HEADER, FALSE);
	curl_setopt($cid, CURLOPT_FOLLOWLOCATION, TRUE);
	curl_setopt($cid, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($cid, CURLOPT_BINARYTRANSFER, TRUE);
	$buff = curl_exec($cid);
	if (curl_errno($ch))
    	exit;
	$type = curl_getinfo($cid, CURLINFO_CONTENT_TYPE);
	if (preg_match("/image/", $type))
	{
		$fp = fopen($img_dir, "wb");
		fwrite($fp, $buff);
		fclose($fp);
	}
	curl_close($cid);
}
?>