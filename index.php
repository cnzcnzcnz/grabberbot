<?php
require_once realpath("vendor/autoload.php");

use Buchin\GoogleImageGrabber\GoogleImageGrabber;
// // use Buchin\SearchTerm\SearchTerm;
use Buchin\GoogleSuggest\GoogleSuggest;
use Buchin\SentenceFinder\SentenceFinder;
// use Buchin\Badwords\Badwords;

// $suggestion = new GoogleSuggest();

$result = GoogleSuggest::grab("speaker");
$finder = new SentenceFinder;
$grabber = new GoogleImageGrabber();


foreach($result as $keySuggest=>$value){
    echo "<br> $value <br>";
    // $sentences = $finder->findSentence($value);
    // foreach($sentences as $keySentences=>$valueSentence){
    //     $valueSentence .= " $valueSentence";
    //     echo "<p>". $valueSentence ."</p>";
    // }
    $images = GoogleImageGrabber::grab("$value");
    foreach($images as $keyImage=>$image){
        $testSpecialChar = htmlspecialchars("<img src=".$image["url"]." title=".$image["title"]." alt=".$image["alt"].">"."<br><small>".$image["title"]."</small><br>");
        echo $testSpecialChar;
    }
}

