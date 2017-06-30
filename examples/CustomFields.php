<?php

/**
 * CleverMonitor Developers
 *
 * CleverMonitor REST API Example
 * Custom fields
 *
 * @author CleverMonitor <support@clevermonitor.com>
 */

require __DIR__ . '/../vendor/autoload.php';

$cmApi = new \CleverMonitor\Api\Methods\CustomFields('Your ID', 'Your Token');

/**
 * Custom fields overview
 * @GET
 */
$fields = $cmApi->getFields(100, 0, 1);

$httpResponseCode = $fields->getStatusCode();
$httpResponseData = $fields->getData();

/**
 * Custom field detail
 * @GET
 */
$field = $cmApi->getField('03b211fe-ba36-18d6-be97-6b07111663a9');

$httpResponseCode = $field->getStatusCode();
$httpResponseData = $field->getData();

/**
 * Create a custom field
 * @POST
 */
$data = [
	'code' => 'lorem',
	'name' => 'Lorem',
	'source' => 1,
	'type' => 32,
	'default' => 'second test',
	'values' => [
		'first test',
		'second test',
		'third test'
	]
];
$field = $cmApi->postField($data);

$httpResponseCode = $field->getStatusCode();
$httpResponseData = $field->getData();

/**
 * Edit a custom field
 * @PATCH
 */
$data = [
	'name' => 'Lorem ipsum',
	'default' => 'third test'
];
$field = $cmApi->patchField('lorem', $data);

$httpResponseCode = $field->getStatusCode();
$httpResponseData = $field->getData();

/**
 * Delete a custom field
 * @DELETE
 */
$delete = $cmApi->deleteField('lorem');

$httpResponseCode = $delete->getStatusCode();
$httpResponseData = $delete->getData();

/**
 * Add values to custom field
 * @PUT
 */
$values = [
	'fourth test',
	'fifth test'
];
$put = $cmApi->putValuesToField('lorem', $values);

$httpResponseCode = $put->getStatusCode();
$httpResponseData = $put->getData();

/**
 * Delete values from custom field
 * @DELETE
 */
$values = [
	'second test',
	'third test',
	'fourth test'
];
$delete = $cmApi->deleteValuesFromField('lorem', $values);

$httpResponseCode = $delete->getStatusCode();
$httpResponseData = $delete->getData();

/**
 * Custom field values overview
 * @GET
 */
$values = $cmApi->getFieldValues('lorem', 100, 0);

$httpResponseCode = $values->getStatusCode();
$httpResponseData = $values->getData();

/**
 * Add values of custom field to subscribers
 * @PUT
 */
$data = [
	'merge' => TRUE,
	'auto_create_subscriber' => TRUE,
	'subscribers' => [
		[
			'email' => 'john.doe@example.com',
			'values' => [
				'first test',
				'fifth test'
			]
		]
	]
];
$put = $cmApi->putValuesOfFieldToSubscribers('lorem', $data);

$httpResponseCode = $put->getStatusCode();
$httpResponseData = $put->getData();

/**
 * Delete values of custom field from subscribers
 * @DELETE
 */
$data = [
	'subscribers' => [
		[
			'email' => 'john.doe@example.com',
			'values' => [
				'first test'
			]
		]
	]
];
$delete = $cmApi->deleteValuesOfFieldFromSubscribers('lorem', $data);

$httpResponseCode = $delete->getStatusCode();
$httpResponseData = $delete->getData();

/**
 * Overview of values assigned to subscribers
 * @GET
 */
$values = $cmApi->getValuesOfFieldFromSubscribers('lorem', 100, 0);

$httpResponseCode = $values->getStatusCode();
$httpResponseData = $values->getData();