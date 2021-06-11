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

// $myfile = fopen("post.txt", "w") or die("Unable to open file!");
// $txt = "John Doe\n";
// fwrite($myfile, $txt);
// $txt = "Jane Doe\n";
// fwrite($myfile, $txt);
// fclose($myfile);


foreach($result as $keySuggest=>$value){
    $myfile = fopen("$value.txt", "w") or die("Unable to open file!");
    // echo "<br> $value <br>";
    // $sentences = $finder->findSentence($value);
    // foreach($sentences as $keySentences=>$valueSentence){
    //     $valueSentence .= " $valueSentence";
    //     echo "<p>". $valueSentence ."</p>";
    // }
    fwrite($myfile, "<br><b> $value </b><br>");
    $images = GoogleImageGrabber::grab("$value");
    foreach($images as $keyImage=>$image){
        $testSpecialChar = htmlspecialchars("<img src=".$image["url"]." title=".$image["title"]." alt=".$image["alt"]."><br>"."<small>".$image["title"]."</small><br>");
        fwrite($myfile, $testSpecialChar);
        
        // echo $testSpecialChar;
    }
    fclose($myfile);
}



