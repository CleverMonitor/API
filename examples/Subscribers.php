<?php

/**
 * CleverMonitor Developers
 *
 * CleverMonitor REST API Example
 * Subscribers
 *
 * @author CleverMonitor <support@clevermonitor.com>
 */

require __DIR__ . '/vendor/autoload.php';

$cmApi = new \CleverMonitor\Api\Methods\Subscribers('Your ID', 'Your Token');

/**
 * Create a Subscriber
 * @POST
 */
$data = array(
	'email' => 'john.doe@example.com',
	'first_name' => 'John',
	'last_name' => 'Doe'
);
$create = $cmApi->postSubscriber($data);

$httpResponseCode = $create->getStatusCode();
$httpResponseData = $create->getData();

/**
 * Update a Subscriber
 * @PATCH
 */
$data = array(
	'first_name' => 'John',
	'last_name' => 'Doe'
);
$update = $cmApi->patchSubscriber('john.doe@example.com', $data);

$httpResponseCode = $update->getStatusCode();
$httpResponseData = $update->getData();

/**
 * Detail of subscriber
 * @GET
 */
$detail = $cmApi->getSubscribersEmail('john.doe@example.com');

$httpResponseCode = $detail->getStatusCode();
$httpResponseData = $detail->getData();

/**
 * Unsubscribe
 * @GET
 */
$unsubscribe = $cmApi->getSubscribersEmailUnsubscribe('john.doe@example.com');

$httpResponseCode = $unsubscribe->getStatusCode();
$httpResponseData = $unsubscribe->getData();

/**
 * Delete a subscriber
 * @DELETE
 */
$delete = $cmApi->deleteSubscribersEmail('john.doe@example.com');

$httpResponseCode = $delete->getStatusCode();
$httpResponseData = $delete->getData();
