<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:type" content="website">
<meta property="og:title" content="MySejahtera Vaccine details checker">
<meta property="og:description" content="Check your MySejahtera Vaccine details on this website via MySejahtera's API.">
<meta property="og:image" content="https://www.samsam123.name.my/MySejahtera/meta-og-1.jpg">
<link rel="shortcut icon" type="image/x-icon" href="https://www.samsam123.name.my/images/favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="https://www.samsam123.name.my/images/favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="https://www.samsam123.name.my/images/favicon.ico">
<title>MySejahtera Vaccine details checker</title>
</head>
<body>

<?php
error_reporting (E_ALL ^ E_NOTICE);
$token = $_POST["x-auth-token"];
if(empty($token)) {$status_server = '
<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera Vaccine details checker</h1>  </br>
<h2 class="lead mb-4">Check your MySejahtera Vaccine details on this website via MySejahtera API.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<strong>Uh-oh.</br> Seems like you did not provide token to check your vaccine details.</br> Please try to login again at main page. </br> [403 Forbidden] <strong>';
 echo $status_server;  header("HTTP/1.1 403 Forbidden"); header("Fail_Reason: Did not provide x-auth-token"); header("backend-status: 403"); header("frontend-status: 200");} 
 else { 
 $url = "https://mysejahtera.malaysia.gov.my/epms/v1/mobileApp/vaccination/processFlow";

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
if ($http_response == '500') { echo '<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera Vaccine details checker</h1>  </br>
<h2 class="lead mb-4">Check your MySejahtera Vaccine details on this website via MySejahtera API.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<strong>Uh-oh.</br> Seems like your token is expired.</br> Please try to login again at main page. </br> [401 Unauthorized] <strong>';
header("HTTP/1.1 401 Unauthorized"); header("Fail_Reason: x-auth-token expired"); header("backend-status: 401"); header("frontend-status: 200");}
else {
header("Successful: True"); 
header("backend-status: 200"); 
header("frontend-status: 200");
header('x-auth-token:' . urlencode($token));
$arr = json_decode($resp, true);
$registered = $arr[0]['state'];
$register_date = $arr[0]['timestamp'];
$register = $arr[0]['headerText']['en_US'];

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

if ($register == 'Digital certificate issued') {
	
	echo '<main>
  <h1 class="visually-hidden">Vaccination Status for"';
echo $name;

  
  echo '</h1>';

  echo '<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Vaccination Status for ';
	echo $name;
	echo '<strong>';

  echo '</strong></h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="feature col">
        <div class="feature-icon bg-primary bg-gradient">
       
        </div>
        <h2>Digital Certificate Issued?</h2>
        <p>';
		  echo '<strong>';
echo 'Yes';
echo ' </br>';
echo 'Date : ';
echo $register_date;
  echo '</strong>';
  $booster_facility = $arr[1]['data'][0]['value'];
$booster_location = $arr[1]['data'][1]['value'];
$booster_date = $arr[1]['data'][2]['value'];
$booster_time = $arr[1]['data'][3]['value'];
echo '</p>';
     echo '
	</div>
      <div class="feature col">
        <div class="feature-icon bg-primary bg-gradient">
       
        </div>
        <h2>Booster Dose Appointment</h2>
        <p>';
		
		  echo '<strong>';
		  echo 'Health Facility : ';
		echo $booster_facility;
		echo '</br>';
		 echo 'Location : ';
		echo $booster_location;
		echo '</br>';
			 echo 'Date : ';
		echo $booster_date;
		echo '</br>';
		 echo 'Time : ';
		echo $booster_time;
		echo '</br>';
  echo '</strong>';
$booster_done = $arr[2]['state'];
if ($booster_done == 'COMPLETED') {
	echo '<strong>';
echo 'Completed : ';
		echo 'Yes';
		echo '</br>';
		echo '</strong>';
	
} 
} else {



if ($registered == 'COMPLETED') {
echo '<main>
  <h1 class="visually-hidden">Vaccination Status for"';
echo $name;

  
  echo '</h1>';

  echo '<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Vaccination Status for ';
	echo $name;
	echo '<strong>';

  echo '</strong></h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="feature col">
        <div class="feature-icon bg-primary bg-gradient">
       
        </div>
        <h2>Registered?</h2>
        <p>';
		  echo '<strong>';
echo 'Yes';
echo ' </br>';
echo 'Date : ';
echo $register_date;
  echo '</strong>';
echo '</p>';
     


}
else { echo
'<body>
<div class="px-4 py-5 my-5 text-center"> <h1 class="display-5 fw-bold">MySejahtera Vaccine details checker</h1>  </br>
<h2 class="lead mb-4">Check your MySejahtera Vaccine details on this website via MySejahtera API.</br>Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</h2>
   <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
<strong>Uh-oh.</br> Seems like you did not register for PICK program. </br> We strongly encourage you to register for PICK program in order to get your COVID-19 vaccine.<strong>';
}
$eligible_yes = $arr[1]['state'];
$eligible_date = $arr[1]['timestamp'];
$eligible = $arr[1]['headerText']['en_US'];
if ($eligible_yes == 'COMPLETED') { 
echo '
	</div>
      <div class="feature col">
        <div class="feature-icon bg-primary bg-gradient">
       
        </div>
        <h2>Eligible for vaccine?</h2>
        <p>';
		
		  echo '<strong>';
		echo 'Yes';
  echo '</strong>';
echo '</p>';
$first_yes = $arr[2]['state'];
$first_date = $arr[2]['timestamp'];
$first = $arr[2]['headerText']['en_US'];
$first_facility = $arr[2]['data'][0]['value'];
$first_location = $arr[2]['data'][1]['value'];
$first_date = $arr[2]['data'][2]['value'];
$first_time = $arr[2]['data'][3]['value'];
if ($first_yes == 'COMPLETED') {echo '
	</div>
      <div class="feature col">
        <div class="feature-icon bg-primary bg-gradient">
       
        </div>
        <h2>1st Dose Appointment</h2>
        <p>';
		
		  echo '<strong>';
		  echo 'Health Facility : ';
		echo $first_facility;
		echo '</br>';
		 echo 'Location : ';
		echo $first_location;
		echo '</br>';
			 echo 'Date : ';
		echo $first_date;
		echo '</br>';
		 echo 'Time : ';
		echo $first_time;
		echo '</br>';
  echo '</strong>';

$first_done = $arr[3]['state'];
$first_done_time = $arr[3]['data'][0]['value'];
$first_done_num = $arr[3]['data'][1]['value'];
$first_done_batch = $arr[3]['data'][2]['value'];
$first_done_expiry = $arr[3]['data'][3]['value'];
if ($first_done == 'COMPLETED') {  echo '<strong>';
echo 'Completed : ';
		echo 'Yes';
		echo '</br>';
		echo 'Vaccine Number : ';
		echo $first_done_num;
		echo '</br>';
	    echo 'Batch Number : ';
		echo $first_done_batch;
		echo '</br>';
		  echo 'Expiry Date : ';
		echo $first_done_expiry;
		echo '</br>';
		 echo '</strong>';
		echo '</p></div>'; 
		} 
		else {echo '<strong>';
echo 'Completed : ';
		echo 'No';
		echo '</br>';
		 echo '</strong>';
			echo '</p></div>'; }

}

 } 

$second_yes = $arr[4]['state'];
$second_date = $arr[4]['timestamp'];
$second = $arr[4]['headerText']['en_US'];
$second_facility = $arr[4]['data'][0]['value'];
$second_location = $arr[4]['data'][1]['value'];
$second_date = $arr[4]['data'][2]['value'];
$second_time = $arr[4]['data'][3]['value'];
if ($second_yes == 'COMPLETED') {echo '

      <div class="feature col">
        <div class="feature-icon bg-primary bg-gradient">
       
        </div>
        <h2>2nd Dose Appointment</h2>
        <p>';
		
		  echo '<strong>';
		  echo 'Health Facility : ';
		echo $second_facility;
		echo '</br>';
		 echo 'Location : ';
		echo $second_location;
		echo '</br>';
			 echo 'Date : ';
		echo $second_date;
		echo '</br>';
		 echo 'Time : ';
		echo $second_time;
		echo '</br>';
  echo '</strong>';
$second_done = $arr[5]['state'];
$second_done_time = $arr[5]['data'][0]['value'];
$second_done_num = $arr[5]['data'][1]['value'];
$second_done_batch = $arr[5]['data'][2]['value'];
$second_done_expiry = $arr[5]['data'][3]['value'];
if ($second_done == 'COMPLETED') {  
echo '<strong>';
echo 'Completed : ';
		echo 'Yes';
		echo '</br>';
		echo 'Vaccine Number : ';
		echo $second_done_num;
		echo '</br>';
	    echo 'Batch Number : ';
		echo $second_done_batch;
		echo '</br>';
		  echo 'Expiry Date : ';
		echo $second_done_expiry;
		echo '</br>';
		 echo '</strong>';
		echo '</p></div>'; 
		} 
		else {echo '<strong>';
echo 'Completed : ';
		echo 'No';
		echo '</br>';
		 echo '</strong>';
			echo '</p>'; }

}

$digital_cert = $arr[6]['state'];
$digital_cert_date = $arr[6]['timestamp'];
if ($digital_cert == 'ACTIVE') { 
echo '

      <div class="feature col">
        <div class="feature-icon bg-primary bg-gradient">
       
        </div>
        <h2>Digital Certificate</h2>
        <p>';
		
		  echo '<strong>';
		  echo 'Issued : ';
		echo 'Yes';
		echo '</br>';
		 echo 'Date : ';
		echo $digital_cert_date;
		echo '</br>';
		echo 'Please check the Digital Certificate in your MySejahtera App.';
		echo '</br>';
		echo 'Click <a href="pdf-digital-cert.php?x-auth-token=';
		echo $token;
		echo '"> here</a> to retrieve your PDF version of Vaccine Digital Certificate.';
        echo '</strong> </div>';
		
	
	 echo '		
		
      </div>';
	  
	  	
	
	
}






}







}



}
 }
 
 echo '<footer class="text-muted py-5">
  <div class="container">
   
    <p class="mb-1">Powered by <a href="https://github.com/samleong123">Sam Sam</a>.</br>Source code : <a href="https://github.com/samleong123/MySejahtera-PHP-Web">here</a>.</p>
    
  </div>
</footer>';
 ?>
	
