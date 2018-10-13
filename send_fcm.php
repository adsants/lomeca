<?php


// promo@bandungpoint.com s+hf)@umH-QL
#API access key from Google API's Console

// adi
///c5IQ4A00cLQ:APA91bHDDhTt1eNKzmDSOut5fMMZnVqQyFScltYNN1Sb4dAI1kCU16C6RucJY3PTSz2bMvVY1kzYdH4KK2N-tu0cN1vyUAxMBQK31JkAQBb97RZ1oO-gI46YD4uIREoUmVWeUHXQZv1U

// sofie
//c-1RAmkf4gw:APA91bHQjQDhwy83RNUghtZorI7adHc3q1Ge1b19OHNBRVtiMQrFu8LkqYXjdc231EycdlnPMesJZDgN3VEaD3cPBO4GAiocBFerEIeKdY5GDVAZgR5JZe9NRi_Yyxj1Ew02Dk1omVcl
define( 'API_ACCESS_KEY', 'AAAAkf_Jo_k:APA91bEUJ8XDluVcULfS7VYBdP6POGkx_KCMdThFTkt47RGzK_5AfkOdKOtWgyWyaQyo4-sUGE9oFt9DoMueLh-OeM_1rbymRiTR0CEse6s1URrW3QaiBRkK_Tu5DnDM0nrgbkYjLvZv' );
//$registrationIds = $_GET['id'];
#prep the bundle
	$msg = array
	(
		'body' 	=> 'Buy One get One for All Device',
		'title'	=> 'Promo Terbaru'
	);
	$fields = array
	(
		'registration_ids'		=> array(
			"c5IQ4A00cLQ:APA91bHDDhTt1eNKzmDSOut5fMMZnVqQyFScltYNN1Sb4dAI1kCU16C6RucJY3PTSz2bMvVY1kzYdH4KK2N-tu0cN1vyUAxMBQK31JkAQBb97RZ1oO-gI46YD4uIREoUmVWeUHXQZv1U",
			"c-1RAmkf4gw:APA91bHQjQDhwy83RNUghtZorI7adHc3q1Ge1b19OHNBRVtiMQrFu8LkqYXjdc231EycdlnPMesJZDgN3VEaD3cPBO4GAiocBFerEIeKdY5GDVAZgR5JZe9NRi_Yyxj1Ew02Dk1omVcl"
		),
		'notification'	=> $msg
	);


	$headers = array
	(
		'Authorization: key=' . API_ACCESS_KEY,
		'Content-Type: application/json'
	);

#Send Reponse To FireBase Server
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );

#Echo Result Of FireBase Server
echo $result;
