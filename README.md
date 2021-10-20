# MySejahtera-PHP-Web
![mysj](https://www.mkn.gov.my/web/wp-content/uploads/sites/3/2020/03/logoMySejahtera_FINAL_ou.png)

**Retrieve MySejahtera App's data from MySejahtera API and show to users via web browser. Written in PHP.**

## Disclaimer
1. This web app isn't affiliated with [MySejahtera](https://mysejahtera.malaysia.gov.my) !
2. This web app won't record user's MySejahtera username and password as this web app will just simply pass the username / password to the API and retrieve the ```x-auth-token```. When requesting ```semak-vaksin.php``` and ```pdf-digital-cert.php``` , ```x-auth-token``` retrieved from login will be POST to it and they will use the ```x-auth-token``` that receieved to retrieve the data.
3. I will not be responsible not be liable for any problem that will produce losses or inconveniences incurred as a result of such changes or differences.
4. MySejahtera's API on this web app was grabbed via ProxyMan on iPadOS and iOS version of MySejahtera (User Agent used in this PHP Web App when making request to MySejahtera : ```MySejahtera/1.0.36 (iPhone; iOS 14.4.2; Scale/2.00)```)


## About this project
Inspired by [nakvaksin.com](https://github.com/nubpro/nakvaksin). 
</br>
I created a [website](https://www.samsam123.tk/vaksinmy) to check vaccination record via [JKJAV](https://vaksincovid.gov.my)'s API. 
</br>
But their API keep returning 500 error for some reason (Seems like rate limit error , no workaround currently). 
</br>
So I decided to create a web app / website that can retrieve [MySejahtera](https://mysejahtera.malaysia.gov.my) API and return the data to users via broswer instead of their original app. 
</br>
Parts of [MySejahtera](https://mysejahtera.malaysia.gov.my)'s API directly grab from [nakvaksin.com](https://github.com/nubpro/nakvaksin) , including **Login , Personal Details , Vaccination Process Flow**. 
</br>
A big thanks to [nakvaksin.com](https://github.com/nubpro/nakvaksin)'s teams here!

## What can I do with this PHP Web App?
You can :
1. Retrieve your **personal risk status , vaccination status and your NRIC number / Passport Number**.
2. Retrieve your **Vaccination Process , including 1st Dose Appointment and 2nd Dose Appointment**.
3. Retrieve your **PDF version of Vaccine Digital Certificate , a new feature launched by MySejahtera**.
</br>
Note : You must key in your Date of Birth first into MySejahtera Personal Details before you can generate your PDF version of Vaccine Digital Certificate.

## How to retrieve login credentials on MySejahtera's API
1. Login

Do a POST request to here ```https://mysejahtera.malaysia.gov.my/epms/login``` with form and header below :
```
Header :
User-Agent: MySejahtera/1.0.36 (iPhone; iOS 14.4.2; Scale/2.00)
Host: mysejahtera.malaysia.gov.my
Content-Type: multipart/form-data;boundary=31

Form : 
username=60XXXXXXXX
password=XXXXXXX
``` 
**200 if success** , **401 if username or password did not match the record in MySejahtera**.
Notice the **x-auth-token response headers if you get 200** , the token is MySejahtera API's login credentials.

2. Retrieve personal details 

Do a GET request to here ```https://mysejahtera.malaysia.gov.my/epms/v1/mobileApp/vaccinationEmployeeInfo``` with header below :
```
Header :
User-Agent: MySejahtera/1.0.36 (iPhone; iOS 14.4.2; Scale/2.00)
Host: mysejahtera.malaysia.gov.my
x-auth-token: <X-AUTH-TOKEN you get at Step 1>

```
**200 if success** , **500 if x-auth-token invalid**.

3. Retrieve vaccination process

Do a GET request to here ```https://mysejahtera.malaysia.gov.my/epms/v1/mobileApp/vaccination/processFlow``` with header below : 
```
Header :
User-Agent: MySejahtera/1.0.36 (iPhone; iOS 14.4.2; Scale/2.00)
Host: mysejahtera.malaysia.gov.my
x-auth-token: <X-AUTH-TOKEN you get at Step 1>

```
**200 if success** , **500 if x-auth-token invalid**.

4. Generate PDF version of Vaccine Digital Certificate

Do a GET request to here ```https://mysejahtera.malaysia.gov.my/epms/v1/mobileApp/vaccination/certificate/generate``` with header below : 
```
Header :
User-Agent: MySejahtera/1.0.36 (iPhone; iOS 14.4.2; Scale/2.00)
Host: mysejahtera.malaysia.gov.my
x-auth-token: <X-AUTH-TOKEN you get at Step 1>

```
**200 if success** , **500 / 401 / 403 if x-auth-token invalid**.

5. Download PDF version of Vaccine Digital Certificate

Do a GET request to here ```https://mysejahtera.malaysia.gov.my/epms/v1/mobileApp/vaccination/certificate/download``` with header below : 
```
Header :
User-Agent: MySejahtera/1.0.36 (iPhone; iOS 14.4.2; Scale/2.00)
Host: mysejahtera.malaysia.gov.my
x-auth-token: <X-AUTH-TOKEN you get at Step 1>

```
**200 if success** , **500 / 401 / 403 if x-auth-token invalid**.

Note : for Step 4 and 5 , you must key in your Date of Birth first into MySejahtera Personal Details before you can generate and download your PDF version of Vaccine Digital Certificate or else you will get stucked on Step 4.

## Requirements to deploy this PHP Web App
1. PHP installed , 7.0 + is recommended
2. Web server that configured properly to work with PHP
3. Internet access
4. reCaptcha site key (Replace the sitekey to ur own one in ```index.html```)

## Error code

1. 401 on details.php

Your username or password did not match the record in MySejahtera. Please check your username and password.

2. 403 on semak_vaksin.php / pdf-digital-cert.php

You did not provide token to check your vaccine details. Please try to login again.

3. 401 on semak_vaksin.php / pdf-digital-cert.php

The x-auth-token is expired. You need to relogin at the main page.



## Screenshots
![personal_risk](https://user-images.githubusercontent.com/58818070/138039865-833547d4-d8fc-4c8d-a48e-ef7828da2af3.png)
![personal_vax](https://user-images.githubusercontent.com/58818070/138040113-805ea178-4378-48ef-b576-84d86b67502f.png)
![pdf-digital-error-no-token](https://user-images.githubusercontent.com/58818070/138040786-134f7274-5f88-4cfa-a925-5e717f63b455.png)
![pdf-digital-error-token-expired](https://user-images.githubusercontent.com/58818070/138041564-2334c332-efee-4c78-88ad-21d626d5f200.png)

## Credit
1. [MySejahtera](https://mysejahtera.malaysia.gov.my)
2. [nakvaksin.com](https://github.com/nubpro/nakvaksin)

