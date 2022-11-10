<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://books.toscrape.com/catalogue/category/books/science_22/index.html");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$html  = curl_exec($ch);

$dom = new DOMdocument();
@ $dom->loadHTML($html);
$xpath = new DOMXPath($dom);

$article = $dom->getElementsByTagName('article');
$final_arr = array();
$alink = $xpath->query('.//*[@id="default"]//article/h3/a');
$prices = $xpath->query('//*[@id="default"]/div/div/div/div/section/div[2]/ol/li/article/div[2]/p[1]');
$stocks = $xpath->query('//*[@id="default"]/div/div/div/div/section/div[2]/ol/li/article/div[2]/p[2]');
$ratings = $xpath->query('.//*[@id="default"]//article/p');

foreach ($article as $k => $link) {
    $title = $link->getElementsByTagName('a');
    foreach($title as $t) {
        $new_t = $t->getAttribute('title');
        if($new_t) {
            $final_arr[$k]['title'] = $new_t;
        }
        
    }
}

foreach($alink as $k => $a) {
    $new_t = $a->getAttribute('href');
    $full_link = str_replace('../../..', 'https://books.toscrape.com/catalogue', $new_t);
    if($full_link) {
        $final_arr[$k]['href'] = $full_link;
    }
}

foreach ($prices as $k => $price) {
    $pp = $price->textContent;
    $final_arr[$k]['price'] = $pp;
}

foreach ($stocks as $k => $stock) {
    $ss = $stock->textContent;
    $final_arr[$k]['stock'] = trim($ss);
}

foreach ($ratings as $k => $rating) {
    $rr = str_replace('star-rating', '', $rating->getAttribute('class'));
    $final_arr[$k]['rating'] = $rr;
}
print_r($final_arr);

$fp = fopen('science_listing.csv', 'w');

fputcsv($fp, array_keys($final_arr[0]));
foreach ($final_arr as $fields) {
    fputcsv($fp, $fields);
}
  
fclose($fp);