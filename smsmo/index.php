<?php

	include '../libs_global.php';
	include '../vars.php';

	// ## RESPONSE HEADER ##
	$response_header="HTTP/1.1 200 OK";
	
	// ## RESPONSE BODY ##	
	$response_body="OK";
	
	// ### REQUEST BODY ###
	$request_body = file_get_contents('php://input');
	$json_request= json_decode( $request_body, TRUE ); //convert JSON into array
	// echo $request_body ;
	//print_r($request_body);
	
	//print_r($json_request);
	if (isset($json_request['inboundSMSMessageNotification'])){
	//{ "inboundSMSMessageNotification": { "inboundSMSMessage": { "senderAddress": "tel:+26772333490", "destinationAddress": "+26716968", "message": "BEGIN Test יטא@ END", "dateTime": "2014-04-15T07:40:13Z" } } }
		$senderAddress=$json_request['inboundSMSMessageNotification']['inboundSMSMessage']['senderAddress'];
		$senderAddress = str_replace('tel:','',$senderAddress);	
		$destinationAddress = $json_request['inboundSMSMessageNotification']['inboundSMSMessage']['destinationAddress'];
		
		$msg=$json_request['inboundSMSMessageNotification']['inboundSMSMessage']['message'];

		$logtxt = 'SMS MO received from ' . $senderAddress . ' with message=[' . $msg . '] from [' . $destinationAddress . '] SMS short code';
		$log = WriteLog($filelog, $logtxt);

	} else {
		$log = WriteLog($filelog, 'received a request but not a real SMS MO');
	}



?>