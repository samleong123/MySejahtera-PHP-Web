<?php
error_reporting (E_ALL ^ E_NOTICE);
$token = $_GET["x-auth-token"];
if(empty($token)) {
	echo '<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:type" content="website">
<meta property="og:title" content="MySejahtera Vaccine PDF Digital Certificate download">
<meta property="og:description" content="Download your MySejahtera Vaccine PDF Digital Certificate on this website with MySejahtera API.">
<meta property="og:image" content="https://www.samsam123.tk/MySejahtera/meta-og-1.jpg">
<link rel="shortcut icon" type="image/x-icon" href="https://www.samsam123.tk/images/favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="https://www.samsam123.tk/images/favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="https://www.samsam123.tk/images/favicon.ico">
<title>MySejahtera Vaccine PDF Digital Certificate download</title>
</head>
<body>';
	$status_server = '
<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera Vaccine PDF Digital Certificate download</h1>  </br>
<h2 class="lead mb-4">Download your MySejahtera Vaccine PDF Digital Certificate on this website with MySejahtera API.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<strong>Uh-oh.</br> Seems like you did not provide token to download your PDF Digital Certificate.</br> Please try to login again at main page. </br> [403 Forbidden] <strong>';
 echo $status_server;  header("HTTP/1.1 403 Forbidden"); header("Fail_Reason: Did not provide x-auth-token"); header("backend-status: 403"); header("frontend-status: 200");}
 else {  $url = "https://mysejahtera.malaysia.gov.my/epms/v1/mobileApp/profileInfoCards";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Host: mysejahtera.malaysia.gov.my",
   "User-Agent: MySejahtera/1.0.36 (iPhone; iOS 14.4.2; Scale/2.00)",
   "x-auth-token: $token",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
$http_response = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
if ($http_response == '403') {echo '<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera details checker</h1>  </br>
<h2 class="lead mb-4">Check your MySejahtera details on this website via MySejahtera API.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<strong>Uh-oh.</br> MySejahtera is blocking this request.</br> Please try again later. </br> [403 Forbidden] <strong>'; header("backend-status: 403"); header("frontend-status: 200");} else {
if ($http_response == '500') { 
echo '<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:type" content="website">
<meta property="og:title" content="MySejahtera Vaccine PDF Digital Certificate download">
<meta property="og:description" content="Download your MySejahtera Vaccine PDF Digital Certificate on this website with MySejahtera API.">
<meta property="og:image" content="https://www.samsam123.tk/MySejahtera/meta-og-1.jpg">
<link rel="shortcut icon" type="image/x-icon" href="https://www.samsam123.tk/images/favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="https://www.samsam123.tk/images/favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="https://www.samsam123.tk/images/favicon.ico">
<title>MySejahtera Vaccine PDF Digital Certificate download</title>
</head>
<body>';
echo '<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera Vaccine PDF Digital Certificate download</h1>  </br>
<h2 class="lead mb-4">Download your MySejahtera Vaccine PDF Digital Certificate on this website with MySejahtera API.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<strong>Uh-oh.</br> Seems like your token is expired.</br> Please try to login again at main page. </br> [401 Unauthorized] <strong>';
header("HTTP/1.1 401 Unauthorized"); header("Fail_Reason: x-auth-token expired"); header("backend-status: 401"); header("frontend-status: 200");
}
else {
header("Successful: True"); 
header("backend-status: 200"); 
header("frontend-status: 200");
header('x-auth-token:' . urlencode($token));
$arr = json_decode($resp, true);
$ic_num = $arr[0]['data']['icOrPassport'];
$dob = $arr[0]['data']['dateOfBirth'];
$generate = $arr[0]['data']['vaccinationCertGenerated'];
 if(empty($dob)) {echo '<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:type" content="website">
<meta property="og:title" content="MySejahtera Vaccine PDF Digital Certificate download">
<meta property="og:description" content="Download your MySejahtera Vaccine PDF Digital Certificate on this website with MySejahtera API.">
<meta property="og:image" content="https://www.samsam123.tk/MySejahtera/meta-og-1.jpg">
<link rel="shortcut icon" type="image/x-icon" href="https://www.samsam123.tk/images/favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="https://www.samsam123.tk/images/favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="https://www.samsam123.tk/images/favicon.ico">
<title>MySejahtera Vaccine PDF Digital Certificate download</title>
</head>
<body>';
	 echo '<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera Vaccine PDF Digital Certificate download</h1>  </br>
<h2 class="lead mb-4">Download your MySejahtera Vaccine PDF Digital Certificate on this website with MySejahtera API.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<strong>Uh-oh.</br> Seems like you never update your Date of Birth into MySejahtera system.</br> Please update your Date of Birth into MySejahtera system and try again. </br> [401 Unauthorized] <strong>';
header("HTTP/1.1 401 Unauthorized"); header("Fail_Reason: did not provide DOB"); header("backend-status: 401"); header("frontend-status: 200");
	 
 } 
 else { 
$url = "https://mysejahtera.malaysia.gov.my/epms/v1/mobileApp/vaccination/certificate/generate";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Host: mysejahtera.malaysia.gov.my",
   "User-Agent: MySejahtera/1.0.36 (iPhone; iOS 14.4.2; Scale/2.00)",
   "x-auth-token: $token",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
$http_response = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

$url = "https://mysejahtera.malaysia.gov.my/epms/v1/mobileApp/vaccination/certificate/download";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, 1);

$headers = array(
   "Host: mysejahtera.malaysia.gov.my",
   "User-Agent: MySejahtera/1.0.36 (iPhone; iOS 14.4.2; Scale/2.00)",
   "x-auth-token: $token",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$resp = preg_split('/(\r?\n){2}/', $resp, 2);
$headers = $resp[0];
$headersArray = preg_split('/\r?\n/', $headers);
$headersArray = array_map(function($h) {
    return preg_split('/:\s{1,}/', $h, 2);
}, $headersArray);

$tmp = [];
foreach($headersArray as $h) {
    $tmp[strtolower($h[0])] = isset($h[1]) ? $h[1] : $h[0];
}
$headersArray = $tmp; $tmp = null;
$mimepdf = $headersArray['content-type'];
if ($mimepdf == 'application/pdf') {
	
	$url = "https://mysejahtera.malaysia.gov.my/epms/v1/mobileApp/vaccination/certificate/download";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Host: mysejahtera.malaysia.gov.my",
   "User-Agent: MySejahtera/1.0.36 (iPhone; iOS 14.4.2; Scale/2.00)",
   "x-auth-token: $token",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
$http_response = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
header("Content-type: application/pdf");
header('Content-Disposition: attachment; filename="Vaccine_Digital_Cert.pdf"');
header('x-auth-token:' . urlencode($token));
echo $resp;
} else {echo '<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:type" content="website">
<meta property="og:title" content="MySejahtera Vaccine PDF Digital Certificate download">
<meta property="og:description" content="Download your MySejahtera Vaccine PDF Digital Certificate on this website with MySejahtera API.">
<meta property="og:image" content="https://www.samsam123.tk/MySejahtera/meta-og-1.jpg">
<link rel="shortcut icon" type="image/x-icon" href="https://www.samsam123.tk/images/favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="https://www.samsam123.tk/images/favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="https://www.samsam123.tk/images/favicon.ico">
<title>MySejahtera Vaccine PDF Digital Certificate download</title>
</head>
<body>';
	 echo '<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera Vaccine PDF Digital Certificate download</h1>  </br>
<h2 class="lead mb-4">Download your MySejahtera Vaccine PDF Digital Certificate on this website with MySejahtera API.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<strong>Uh-oh.</br> Seems like your vaccination certificate is being generated.</br> Please wait for a few moments (5 minutes maybe?) and '; echo '<a href="pdf-digital-cert.php/?x-auth-token='; echo $token; echo '">try again</a>.<strong>';
}
}
}

 }
}

 
 ?>
