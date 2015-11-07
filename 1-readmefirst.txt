-------------------------------------------------------------------------------
-  PHP STARTER KIT - ReadMe1st
-  support.apichallenge@orange.com
-  last modified date: 31/08/2015 - n1k0
-------------------------------------------------------------------------------


************************
** INSTALLATION NOTES **
************************

1/ URL summary
************************
 - Orange APIs self-service portal: https://challenge.sdp.orange.com/store/
 - Orange Virtual phones https://sdpob.gos.orange.com/sandbox/
 - Your participant backend (can be any hostname or IP, but it should be accessible on Internet). In this document example, we use: http://www.participantserver.com/


2/ Pre-requisites
************************
PHP 5.4+ (but should work with older 5.x versions)


3/ Installation
************************
On your server/hosting environment, unzip and copy this PHP package by keeping the folder structure with the 3 subfolders after the root (/ussd/, /smsmo/ and /smsdr/)
For instance, it can be in your "/var/www/orangechallenge/" folder (where you need to create the 'orangechallenge' folder after your root internet folder).

Your server should be accessible on internet, let say that http://www.participantserver.com/ is link to your '/var/www/' folder.
It means that the Challenge PHP Starter Kit has to be accessible via the following URL :
http://www.participantserver.com/orangechallenge/

Do give write permissions (666) to the "logschallengetest.txt" that is located in the smsmo and smsdr folders. This step is mandatory in order to log successfully the SMS MO and SMS DR that will be forwarded to your backend URL.

For the Orange challenge we accept none secured access (http is welcome, https is of course a plus in term of security).


4/ Keep In Mind
************************
This PHP Starter Kit has been successfully tested on two different hosting and software environments.
However:
 - Orange will not provide any support regarding this PHP starter Kit, it is for reference and quick test only
 - Orange is providing a starter only in "PHP" language, but feel free to develop in any language you want: Java, .Net, ...
 - Issues can come from your hosting, your installation or the way you have declared your application in the Orange self-service portal   ;-)
 - "http://www.participantserver.com" is not a real URL, you should use your own domain name or IP from your hosting environment



****************
** USER GUIDE **
****************

1/ Pre-requisites
************************
- Access the Orange APIs self-service portal: https://challenge.sdp.orange.com/store/ and follow the associated documentation "2 - Orange Developer Challenge - Self-service portal How-To.pdf"

- Create an application by providing the "Callback URL" with "http://www.participantserver.com/orangechallenge/" (--> understand the real URL where you deployed the PHP Starter Kit).

- Subscribe to the 4 APIs: SMS-MT (including SMS-DR), SMS MO, Payment and USSD-Browsing to your newly created application

- From the "My subscription" page, generate the Token for your Application; you'll need it to access the descending APIs


2/ Descending APIs
************************
In order to easily test the SendSMS and the chargeAmount APIs, please, access http://www.participantserver.com/orangechallenge/index.php (--> understand the real URL where you deployed the PHP Starter Kit).
Enter the token linked to your application, enter the MSISDN that was sent to your email that is linked to your application, enter the message and the senderName (1234) and click on the send Button.

Do the same for the chargeAmount API (MSISDN, Token and Amount).

You should have a 201 HTTP OK ; otherwise, you may have a problem somewhere... please, refer to the INSTALLATION NOTES or the pre-requisites

By accessing the Virtual phone URL https://sdpob.gos.orange.com/sandbox/ you will be able to track the received SMS MT (from the SMS tab) and the balance of your MSISDN (from the User tab).



3/ Ascending APIs
************************
If you have entered http://www.participantserver.com/orangechallenge/ as callback URL in the Orange APIs self-service portal, all the ascending APIs (meaning from Orange to your platform) from your Virtual country account will be routed to these 3 URI:

A/ for USSD
Orange APIs backend will automatically call http://www.participantserver.com/orangechallenge/ussd/ to retrieve the text/html expected response from your server. In order to test ussd, please connect to the Virtual phones URL https://sdpob.gos.orange.com/sandbox/ ; access the "USSD" tab, enter *123# and hit the "return" key. You should see a normal message displayed on the screen.

B/ SMS MO
Orange APIs backend will automatically call http://www.participantserver.com/orangechallenge/smsmo/
The PHP Starter Kit will retrieve the SMS MO information from the JSON object and log it in the logschallengetest.txt file. 
In order to read the logs, just call this URL http://www.participantserver.com/orangechallenge/smsmo/r.php (and use http://www.participantserver.com/orangechallenge/smsmo/d.php to delete the current logs to start fresh)
To send a SMS MO, connect to the virtual phones URL : https://sdpob.gos.orange.com/sandbox/ then in the "SMS" tab, enter "1234", hit return, then click on the "1234" link, then enter the "test message" then hit the return key. Your text should be now in a green box and the SMS MO message has been received in your log file.

C/ SMS DR
After each SMS MT sent by your application, Orange APIs backend will generate and send you a SMS DR (Delivery Receipt) to inform you of the good delivery of the SMS MT.
The SMS DR will be sent to http://www.participantserver.com/orangechallenge/smsdr/
You can read the logs using r.php and delete the logs with d.php (like the SMS MO) from http://www.participantserver.com/orangechallenge/smsdr/



That's all folks!
