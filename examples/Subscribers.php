<?php

/**
 * CleverMonitor Developers
 *
 * CleverMonitor REST API Example
 * Subscribers
 *
 * @author CleverMonitor <support@clevermonitor.com>
 */

require __DIR__ . '/../vendor/autoload.php';

$cmApi = new \CleverMonitor\Api\Methods\Subscribers('Your ID', 'Your Token');

/**
 * Create a subscriber
 * @POST
 */
$data = [
	'email' => 'john.doe@example.com',
	'first_name' => 'John',
	'last_name' => 'Doe',
	'tags' => [
		'example_tag'
	]
];
$create = $cmApi->postSubscriber($data);

$httpResponseCode = $create->getStatusCode();
$httpResponseData = $create->getData();

/**
 * Update a subscriber
 * @PATCH
 */
$data = [
	'first_name' => 'John',
	'last_name' => 'Doe'
];
$update = $cmApi->patchSubscriber('john.doe@example.com', $data);

$httpResponseCode = $update->getStatusCode();
$httpResponseData = $update->getData();

/**
 * Detail of a subscriber
 * @GET
 */
$detail = $cmApi->getSubscribersEmail('john.doe@example.com');

$httpResponseCode = $detail->getStatusCode();
$httpResponseData = $detail->getData();

/**
 * Overview of subscribers
 * @GET
 */
$overview = $cmApi->getSubscribers(100, 0, 1, new DateTime());

$httpResponseCode = $overview->getStatusCode();
$httpResponseData = $overview->getData();

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

/**
 * Remove subscriber from distribution list
 * @DELETE
 */
$delete = $cmApi->deleteSubscriberFromDistributionGroup('john.doe@example.com', 'df2ad6d4-d45f-6e53-dad0-b40214911947');

$httpResponseCode = $delete->getStatusCode();
$httpResponseData = $delete->getData();

/**
 * Remove tag form subscriber
 * @DELETE
 */
$data = [
	"tag" => "example_tag"
];

$delete = $cmApi->deleteSubscribersTag('john.doe@example.com', $data);

$httpResponseCode = $delete->getStatusCode();
$httpResponseData = $delete->getData();

/**
 * Add custom fields to subscriber
 * @PUT
 */	
$data = [
	"fields" => [
		[
			"code" => "lorem_ipsum",
			"type" => 1,
			"merge" => TRUE,
			"values" => [
				100
			]
		]
	]
];

$put = $cmApi->putFieldsToSubscriber('john.doe@example.com', $data);

$httpResponseCode = $put->getStatusCode();
$httpResponseData = $put->getData();