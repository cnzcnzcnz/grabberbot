<?php
require_once realpath("vendor/autoload.php");

use Buchin\GoogleImageGrabber\GoogleImageGrabber;
// // use Buchin\SearchTerm\SearchTerm;
use Buchin\GoogleSuggest\GoogleSuggest;
use Buchin\SentenceFinder\SentenceFinder;
// use Buchin\Badwords\Badwords;

// $suggestion = new GoogleSuggest();

$result = GoogleSuggest::grab("speaker", "id", "Indonesia", "", "114.7.27.98:8080");
$finder = new SentenceFinder;
$grabber = new GoogleImageGrabber();

foreach($result as $keySuggest=>$value){
    $myfile = fopen("$value.html", "w") or die("Unable to open file!");
    fwrite($myfile, "<br><b> $value </b><br>");
    $images = GoogleImageGrabber::grab("$value");
    foreach($images as $keyImage=>$image){
        $testSpecialChar = htmlspecialchars("<img src=".$image["url"]." title=".$image["title"]." alt=".$image["alt"]."><br>"."<small>".$image["title"]."</small><br>");
        fwrite($myfile, $testSpecialChar);
    }
    fclose($myfile);
}



