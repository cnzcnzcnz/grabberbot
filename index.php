<?php
require_once realpath("vendor/autoload.php");

use Buchin\GoogleImageGrabber\GoogleImageGrabber;
// // use Buchin\SearchTerm\SearchTerm;
use Buchin\GoogleSuggest\GoogleSuggest;
use Buchin\SentenceFinder\SentenceFinder;
// use Buchin\Badwords\Badwords;

// $suggestion = new GoogleSuggest();

#"114.7.27.98:8080"
$result = GoogleSuggest::grab("quotes kehidupan bahasa inggris", "id", "Indonesia", "");
$finder = new SentenceFinder;
$grabber = new GoogleImageGrabber();

foreach($result as $keySuggest=>$value){
    $myfile = fopen("$value.html", "w") or die("Unable to open file!");
    fwrite($myfile, "<br><b> $value </b><br>");
    $images = GoogleImageGrabber::grab($value);
    foreach($images as $keyImage=>$image){
        if($keyImage === 1){
        $testSpecialChar = htmlspecialchars("<div itemscope itemtype=http://schema.org/Quotation style=margin-bottom:20px;><div itemid=".$image["url"]." itemprop=associatedMedia itemscope itemtype=http://schema.org/ImageObject><img alt='".$image["alt"]."' itemprop=contentUrl src='".$image["url"]."' style='width: 100%;' title='".$image["title"]. "' width=".$image["width"]." height=".$image["height"]." ></div><h4 itemprop=name id='".$image["title"]."'>".$image["title"]."</h4><p itemprop=description></p></div>");
        echo $testSpecialChar;
        fwrite($myfile, $testSpecialChar);
    }
    fclose($myfile);
}
}