<?php

/**
 * CleverMonitor Developers
 *
 * CleverMonitor REST API Example
 * Distribution Lists
 *
 * @author CleverMonitor <support@clevermonitor.com>
 */

require __DIR__ . '/../vendor/autoload.php';

$cmApi = new \CleverMonitor\Api\Methods\Lists('Your ID', 'Your Token');

/**
 * Create a distribution list
 * @POST
 */
$data = [
	'name' => 'List',
	'emails' => [
		0 => [
			'email' => 'john.doe@example.com',
			'first_name' => 'John',
			'last_name' => 'Doe'
		]
	]
];
$create = $cmApi->postList($data);

$httpResponseCode = $create->getStatusCode();
$httpResponseData = $create->getData();

/**
 * Overview of a distribution lists
 * @GET
 */

$overview = $cmApi->getLists(100, 0);

$httpResponseCode = $overview->getStatusCode();
$httpResponseData = $overview->getData();

/**
 * Detail of a distribution list
 * @GET
 */
$detail = $cmApi->getList('5ff42ca6-1965-49ed-97d0-b2b568c88bfd');

$httpResponseCode = $detail->getStatusCode();
$httpResponseData = $detail->getData();

/**
 * Update a distribution list
 * @PATCH
 */
$data = [
	'name' => 'List Group'
];
$update = $cmApi->patchList('5ff42ca6-1965-49ed-97d0-b2b568c88bfd', $data);

$httpResponseCode = $update->getStatusCode();
$httpResponseData = $update->getData();

/**
 * Delete a distribution list
 * @DELETE
 */
$delete = $cmApi->deleteList('5ff42ca6-1965-49ed-97d0-b2b568c88bfd');

$httpResponseCode = $delete->getStatusCode();
$httpResponseData = $delete->getData();

/**
 * Preview subscribers in a distribution list
 * @GET
 */
$preview = $cmApi->getListSubscribers('5ff42ca6-1965-49ed-97d0-b2b568c88bfd', 100, 0);

$httpResponseCode = $preview->getStatusCode();
$httpResponseData = $preview->getData();

/**
 * Adding subscribers to a distribution list
 * @PUT
 */
$data = [
	'emails' => [
		0 => [
			'email' => 'john.doe@example.com',
			'first_name' => 'John',
			'last_name' => 'Doe'
		]
	]
];
$add = $cmApi->putListSubscribers('5ff42ca6-1965-49ed-97d0-b2b568c88bfd', $data);

$httpResponseCode = $add->getStatusCode();
$httpResponseData = $add->getData();

/**
 * Delete subscribers in a distribution list
 * @DELETE
 */
$data = [
	'emails' => [
		0 => [
			'email' => 'john.doe@example.com',
		]
	]
];
$delete = $cmApi->deleteListSubscribers('5ff42ca6-1965-49ed-97d0-b2b568c88bfd', $data);

$httpResponseCode = $delete->getStatusCode();
$httpResponseData = $delete->getData();

$rateLimit = $cmApi->getConnection()->getRateLimit();
