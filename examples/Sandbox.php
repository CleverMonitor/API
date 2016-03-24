<?php

/**
 * CleverMonitor Developers
 *
 * CleverMonitor REST API Example
 * Sandbox
 *
 * @author CleverMonitor <support@clevermonitor.com>
 */

require __DIR__ . '/vendor/autoload.php';

$cmApi = new \CleverMonitor\Api\Connection('Your ID', 'Your Token');

/**
 * Test GET Method
 * @GET
 */
$get = $cmApi->get('sandbox');

$httpResponseCode = $get->getStatusCode();
$httpResponseData = $get->getData();

/**
 * Test POST Method
 * @POST
 */
$data = array(
	'name' => 'John',
	'number' => 1234
	);
$post = $cmApi->post('sandbox', $data);

$httpResponseCode = $post->getStatusCode();
$httpResponseData = $post->getData();

/**
 * Test PUT Method
 * @PUT
 */
$id = 12;
$data = array(
	'name' => 'John',
	'number' => 1234
	);
$put = $cmApi->put('sandbox/' . $id, $data);

$httpResponseCode = $put->getStatusCode();
$httpResponseData = $put->getData();

/**
 * Test PATCH Method
 * @PATCH
 */
$id = 12;
$data = array(
	'name' => 'John',
	'number' => 1234
	);
$patch = $cmApi->patch('sandbox/' . $id, $data);

$httpResponseCode = $patch->getStatusCode();
$httpResponseData = $patch->getData();

/**
 * Test DELETE Method
 * @DELETE
 */
$id = 12;
$delete = $cmApi->delete('sandbox/' . $id);

$httpResponseCode = $delete->getStatusCode();
$httpResponseData = $delete->getData();


