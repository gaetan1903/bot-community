

<?php
header('Content-Type: application/json'); 
//
//$link="https://www.google.mg/search?q=megan+fox&rlz=1C1AVNE_enMG719MG721&source=lnms&tbm=isch&sa=X&ved=0ahUKEwinruiz6rbdAhVDx4UKHVuMAXoQ_AUICigB&biw=1366&bih=638";
$link='https://fr.images.search.yahoo.com/search/images;_ylt=AwrJS5dMFghcBh4AgWpjAQx.;_ylu=X3oDMTE0aDRlcHI2BGNvbG8DaXIyBHBvcwMxBHZ0aWQDQjY1NjlfMQRzZWMDcGl2cw--?p='.urlencode($_GET['search']).'&fr2=piv-web&fr=yfp-t-905-s';
$html=file_get_contents($link);
//https://www.xvideos.com/?k=may+thai&p=1 page 2 



/*
echo 	'<img src="'.$imgs[2].'">';*/
$html=file_get_contents($link);

$imgs = array();
$dom = new domDocument;
@$dom->loadHTML($html);
$dom->preserveWhiteSpace = false;
$images = $dom->getElementsByTagName('li');


foreach ($images as $image) {
$imgs[] = $image->getAttribute('data');//atribut qui sort l'image 
}

$imgs1 = array();
$dom1 = new domDocument;
@$dom1->loadHTML($html);
$dom1->preserveWhiteSpace = false;
$images1 = $dom1->getElementsByTagName('a');
foreach ($images1 as $image) {
$imgs1[] = $image->getAttribute('href');//atribut qui sort l'image 
}
	$parsed_json = json_decode($imgs[$i]);
$date_jour[$i] = $parsed_json->{'iurl'};



fclose($myfile);
for ($i=60; $i <=80 ; $i=$i+1) { 
	$parsed_json = json_decode($imgs[$i]);
$date_jour[] = $parsed_json->{'iurl'};
}
echo json_encode($date_jour, true);


?>

