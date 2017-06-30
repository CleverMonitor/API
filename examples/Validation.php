<?php

/**
 * CleverMonitor Developers
 *
 * CleverMonitor REST API Example
 * Validation
 *
 * @author CleverMonitor <support@clevermonitor.com>
 */

require __DIR__ . '/../vendor/autoload.php';

$cmApi = new \CleverMonitor\Api\Methods\Validation('Your ID', 'Your Token');

/**
 * RFC Email Validation
 * @GET
 */
$validation = $cmApi->validationRfcSingleEmail('john.doe@example.com');

$httpResponseCode = $validation->getStatusCode();
$httpResponseData = $validation->getData();

/**
 * Single Email Validation
 * @POST
 */
$validation = $cmApi->validationSingleEmail('john.doe@example.com', 'John', 'Doe');

$httpResponseCode = $validation->getStatusCode();
$httpResponseData = $validation->getData();

/**
 * Bulk Email Validation
 * @POST
 */
$data = [
	'emails' => [
		0 => [
			'email' => 'john.doe@example.com',
			'first_name' => 'John',
			'last_name' => 'Doe'
		],
		1 => [
			'email' => 'mike.johnson@example.com',
			'first_name' => 'Mike',
			'last_name' => 'Johnson'
		]
	]
];
$validation = $cmApi->validationBulkEmails($data);

$httpResponseCode = $validation->getStatusCode();
$httpResponseData = $validation->getData();

/**
 * Batch Email Validation - Request
 * @POST
 */
$data = [
	'emails' => [
		0 => [
			'email' => 'john.doe@example.com',
			'first_name' => 'John',
			'last_name' => 'Doe'
		],
		1 => [
			'email' => 'mike.johnson@example.com',
			'first_name' => 'Mike',
			'last_name' => 'Johnson'
		]
	]
];
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