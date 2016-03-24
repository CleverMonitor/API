<?php

/**
 * CleverMonitor Developers
 *
 * CleverMonitor REST API Example
 * Validation
 *
 * @author CleverMonitor <support@clevermonitor.com>
 */

require __DIR__ . '/vendor/autoload.php';

$cmApi = new \CleverMonitor\Api\Methods\Validation('Your ID', 'Your Token');

/**
 * Single Email Validation
 * @POST
 */
$validation = $cmApi->validationSingleEmail('john.doe@example.com', 'John', 'Doe');

$httpResponseCode = $validation->getStatusCode();
$httpResponseData = $validation->getData();

/**
 * Bluk Email Validation
 * @POST
 */
$data = array(
	'emails' => array(
		0 => array(
			'email' => 'john.doe@example.com',
			'first_name' => 'John',
			'last_name' => 'Doe'
		),
		1 => array(
			'email' => 'mike.johnson@example.com',
			'first_name' => 'Mike',
			'last_name' => 'Johnson'
		)
	)
);
$validation = $cmApi->validationBlukEmails($data);

$httpResponseCode = $validation->getStatusCode();
$httpResponseData = $validation->getData();

/**
 * Batch Email Validation - Request
 * @POST
 */
$data = array(
	'emails' => array(
		0 => array(
			'email' => 'john.doe@example.com',
			'first_name' => 'John',
			'last_name' => 'Doe'
		),
		1 => array(
			'email' => 'mike.johnson@example.com',
			'first_name' => 'Mike',
			'last_name' => 'Johnson'
		)
	)
);
$validation = $cmApi->validationBatchEmailsRequest($data);

$httpResponseCode = $validation->getStatusCode();
$httpResponseData = $validation->getData();

/**
 * Batch Email Validation - Response
 * @GET
 */
$validation = $cmApi->validationBatchEmailsResponse('5ff42ca6-1965-49ed-97d0-b2b568c88bfd');

$httpResponseCode = $validation->getStatusCode();
$httpResponseData = $validation->getData();