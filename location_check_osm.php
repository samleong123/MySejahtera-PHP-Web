<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:type" content="website">
<meta property="og:title" content="MySejahtera COVID-19 Hotspot Tracker">
<meta property="og:description" content="Check and Track COVID-19 Hotspot.">
<meta property="og:image" content="https://www.samsam123.tk/MySejahtera/meta-og-1.jpg">
<link rel="shortcut icon" type="image/x-icon" href="https://www.samsam123.tk/images/favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="https://www.samsam123.tk/images/favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="https://www.samsam123.tk/images/favicon.ico">
<title>MySejahtera COVID-19 Hotspot Tracker</title>
</head>
<body>
<?php
error_reporting (E_ALL ^ E_NOTICE);
$mysjid = $_POST["mysjid"];
$mysjpword = $_POST["mysjpword"];
$name = $_POST["name"];
$check = $_POST["check"];
$location = $_POST["location"];
$mysjid = str_replace("-","",$mysjid);
if ($check == 'yes') {
	if (empty($location)) {    echo '<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera COVID-19 Hotspot Tracker</h1>  </br>
<h2 class="lead mb-4">Check and Track COVID-19 Hotspot.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<strong>Uh-oh.</br> Seems like you did not provide the location to track the COVID-19 hotspot.</br> Please try again later. </br> [403 Forbidden] <strong>'; header("HTTP/1.1 403 Forbidden"); header("Fail_Reason: Did not provide location"); header("backend-status: N/A"); header("frontend-status: 403");
		
	} else {


$url = "https://www.samsam123.name.my/osm-maps-api/?q=$location&countrycodes=MY&accept-language=en-UK&email=0.ouster.build@icloud.com&format=json";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
$http_response = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
if ($http_response == '403') {echo '<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera COVID-19 Hotspot Tracker</h1>  </br>
<h2 class="lead mb-4">Check and Track COVID-19 Hotspot.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<strong>Uh-oh.</br> Seems like the location API is kinda busy now. </br> Please try again later. </br> [403 Forbidden] <strong>'; header("backend-status: 403"); header("frontend-status: 200");}
	else {
$arr = json_decode($resp, true); 
$lat = $arr[0]["lat"];
$lon = $arr[0]["lon"];
if ($lat == 'NULL') {
	 
	echo '<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera COVID-19 Hotspot Tracker</h1>  </br>
<h2 class="lead mb-4">Check and Track COVID-19 Hotspot.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
	<strong>Uh-oh.</br> Seems like your location is invalid. </br> Please try again later.';
} else {
	if (empty($lat))  {
	 
	echo '<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera COVID-19 Hotspot Tracker</h1>  </br>
<h2 class="lead mb-4">Check and Track COVID-19 Hotspot.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
	<strong>Uh-oh.</br> Seems like your location is invalid. </br> Please try again later.';
}
$data = array();
$data[0]['lat'] = $lat;
$data[0]['lng'] = $lon;
$data[0]['classification'] = 'LOW_RISK_NS';
$post_check_mysj = json_encode($data);
	
	$url = "https://mysejahtera.malaysia.gov.my/register/api/nearby/hotspots?type=locateme";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
  'Authorization: Basic '. base64_encode("$mysjid:$mysjpword"),
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "$post_check_mysj";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$final_resp = json_decode($resp, true);
$eng_text = $final_resp["messages"]["en_US"];
$final_eng_text = str_replace("{name}","users",$eng_text);
$zone = $final_resp["zoneType"];

echo '<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera COVID-19 Hotspot Tracker</h1>  </br>
<h2 class="lead mb-4">Check and Track COVID-19 Hotspot.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<strong>'; echo $final_eng_text; echo '</br> Current Location Risk : '; echo $zone; echo ' Zone </strong> </div>'; 
 echo '<footer class="text-muted py-5">
  <div class="container">
   
    <p class="mb-1">Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a></br>Location data & Map API provided by <a href="https://nominatim.org/">Nominatim</a>.</p>
    
  </div>
</footer>';
}



}
	




	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	} 

else {
	
if(empty($mysjid)) { 
    echo '<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera COVID-19 Hotspot Tracker</h1>  </br>
<h2 class="lead mb-4">Check and Track COVID-19 Hotspot.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<strong>Uh-oh.</br> Seems like you did not provide username to retrieve your MySejahtera details.</br> Please try again later. </br> [403 Forbidden] <strong>'; header("HTTP/1.1 403 Forbidden"); header("Fail_Reason: Did not provide username"); header("backend-status: N/A"); header("frontend-status: 403");
    
} else {
    if(empty($mysjpword)) {echo '<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera COVID-19 Hotspot Tracker</h1>  </br>
<h2 class="lead mb-4">Check and Track COVID-19 Hotspot.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<strong>Uh-oh.</br> Seems like you did not provide password to retrieve your MySejahtera details.</br> Please try again later. </br> [403 Forbidden] <strong>'; header("HTTP/1.1 403 Forbidden"); header("Fail_Reason: Did not provide password"); header("backend-status: N/A"); header("frontend-status: 403");} else
{
	echo '<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera COVID-19 Hotspot Tracker</h1>  </br>
<h2 class="lead mb-4">Check and Track COVID-19 Hotspot.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">'; 
   echo '				  </div>
	  </br>
   <form class="p-4 p-md-5 border rounded-3 bg-light"id="location_check" method="post" action="./location_check_osm.php">
         
           <div class="form-floating mb-3">
            <input type="location" class="form-control" name="location" id="location" placeholder="Location you wished to check">
            <label for="floatingPassword">Location you wished to check</label>
			<input type="hidden" name="check" value="yes"/>
			<input type="hidden" name="mysjid" value="'; echo $mysjid; echo '" />';
			echo '<input type="hidden" name="mysjpword" value="'; echo $mysjpword; echo '" />';
			echo '</br>';
			 echo ' <button class="w-100 btn btn-lg btn-primary">Track now</button> ';
        echo '  </div>
		   

      <br/>
        
          <hr class="my-4">
          <small class="text-muted"><strong>By clicking Track now, we will retrieve the location you key in via Nominatim'; 
		  echo "'s API. We will use the first results returned by Nominatim as the location to check and track the COVID-19 Hotspot around the location you key in. If you need a more accurate results, please input a more precise address to increase the accuracy of the data. We shall not be liable for any problem that will produce losses or inconveniences incurred as a result of such changes or differences. </strong></small>
        </form>";
		
		echo '<footer class="text-muted py-5">
  <div class="container">
   
    <p class="mb-1">Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</p>
    
  </div>
</footer>';
}
}

}
