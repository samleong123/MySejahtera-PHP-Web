<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:type" content="website">
<meta property="og:title" content="MySejahtera details checker">
<meta property="og:description" content="Check your MySejahtera details on this website via MySejahtera's API.">
<meta property="og:image" content="https://www.samsam123.tk/MySejahtera/meta-og-1.jpg">
<link rel="shortcut icon" type="image/x-icon" href="https://www.samsam123.tk/images/favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="https://www.samsam123.tk/images/favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="https://www.samsam123.tk/images/favicon.ico">
<title>MySejahtera details checker</title>
</head>
<body>

  

<?php
error_reporting (E_ALL ^ E_NOTICE);
$mysjid = $_POST["mysj_id"];
$mysjpword = $_POST["password"];
$mysjid = str_replace("-","",$mysjid);
if(empty($mysjid)) { 
    echo '<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera details checker</h1>  </br>
<h2 class="lead mb-4">Check your MySejahtera details on this website via MySejahtera API.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<strong>Uh-oh.</br> Seems like you did not provide username to retrieve your MySejahtera details.</br> Please try again later. </br> [403 Forbidden] <strong>'; header("HTTP/1.1 403 Forbidden"); header("Fail_Reason: Did not provide username"); header("backend-status: N/A"); header("frontend-status: 403");
    
} else {
    if(empty($mysjpword)) {echo '<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera details checker</h1>  </br>
<h2 class="lead mb-4">Check your MySejahtera details on this website via MySejahtera API.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<strong>Uh-oh.</br> Seems like you did not provide password to retrieve your MySejahtera details.</br> Please try again later. </br> [403 Forbidden] <strong>'; header("HTTP/1.1 403 Forbidden"); header("Fail_Reason: Did not provide password"); header("backend-status: N/A"); header("frontend-status: 403");} else {
$url = "https://mysejahtera.malaysia.gov.my/epms/login";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, 1);

$headers = array(
   "Content-Type: application/x-www-form-urlencoded",
   "Host: mysejahtera.malaysia.gov.my",
   "User-Agent: MySejahtera/1.0.36 (iPhone; iOS 14.4.2; Scale/2.00)",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "username=$mysjid&password=$mysjpword";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

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
if ($http_response == '401') {$status_server = '
<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera details checker</h1>  </br>
<h2 class="lead mb-4">Check your MySejahtera details on this website via MySejahtera API.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<strong>Uh-oh.</br> Seems like your username or password did not match the record in MySejahtera.</br> Please check your username and password. </br> [401 Unauthorized] <strong>';
 echo $status_server;  header("HTTP/1.1 401 Unauthorized"); header("Fail_Reason: MySejahtera username or password doesn't match"); header("backend-status: 401"); header("frontend-status: 200");} else {
	
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
$token = $headersArray['x-auth-token'];
header("Successful: True"); 
header("backend-status: 200"); 
header("frontend-status: 200");
header('x-auth-token:' . urlencode($token));

$url = "https://mysejahtera.malaysia.gov.my/epms/v1/mobileApp/vaccinationEmployeeInfo";

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
curl_close($curl);
$result = json_decode($resp, true);
$name = $result['employeeInfo']['displayName'];
$risk = $result['employeeInfo']['designation'];
$ic_num = $result['employeeInfo']['licenceNumber'];
$vax = $result['employeeInfo']['vacStatus']['status'];
echo '<main>
  <h1 class="visually-hidden">Welcome back , ';

  echo $name;
  
  echo '</h1>';

  echo '<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Welcome back , <strong>';
  echo $name;
  echo '</strong></h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="feature col">
        <div class="feature-icon bg-primary bg-gradient">
       
        </div>
        <h2>Your risk status</h2>
        <p>';
		  echo '<strong>';
echo $risk;
  echo '</strong>';
echo '</p>';
     
  echo '     
        </a>
      </div>
      <div class="feature col">
        <div class="feature-icon bg-primary bg-gradient">
        
        </div>
        <h2>
		Your vaccination status</h2>
        <p>';
		  echo '<strong>';
	echo $vax;
	  echo '</strong>';
	echo '</p>';
   
    echo '
	</div>
      <div class="feature col">
        <div class="feature-icon bg-primary bg-gradient">
       
        </div>
        <h2>Your NRIC number / passport number</h2>
        <p>';
		
		  echo '<strong>';
		echo $ic_num;
  echo '</strong>';
		echo '</p>

      </div>
    </div>';
	
	



	 echo '<h2 class="pb-2 border-bottom">Wanted to check your vaccination status?</h2>';
	 echo '<form class="p-4 p-md-5  rounded-3 "id="semak-vaksin" method="post" action="./semak_vaksin.php">';
	 	 echo '<input type="hidden" name="name" value="'; echo $name; echo '" />';
	 echo '<input type="hidden" name="x-auth-token" value="'; echo $token; echo '" />';
	  echo '<input type="hidden" name="ic-num" value="'; echo $ic_num; echo '" />';
	 echo ' <button class="w-100 btn btn-lg btn-primary" >Check now</button>';
	
	 echo '		
		
      </div>';
}
 echo '<footer class="text-muted py-5">
  <div class="container">
   
    <p class="mb-1">Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</p>
    
  </div>
</footer>';
}
}
}
?>

