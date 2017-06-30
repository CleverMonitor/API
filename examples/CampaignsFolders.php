<?php

/**
 * CleverMonitor Developers
 *
 * CleverMonitor REST API Example
 * Campaigns' folders
 *
 * @author CleverMonitor <support@clevermonitor.com>
 */

require __DIR__ . '/../vendor/autoload.php';

$cmApi = new \CleverMonitor\Api\Methods\CampaignsFolders('Your ID', 'Your Token');

/**
 * Campaigns' folders list
 * @GET
 */
$folders = $cmApi->getFolders(100, 0);

$httpResponseCode = $folders->getStatusCode();
$httpResponseData = $folders->getData();

/**
 * Detail of folder
 * @GET
 */
$folders = $cmApi->getFolder('af5e716d-50fe-9214-b7ce-5461cbff5dd2');

$httpResponseCode = $folders->getStatusCode();
$httpResponseData = $folders->getData();

/**
 * Create a new folder
 * @POST
 */
$data = [
	'name' => 'My Best Folder',
	'note' => 'Lorem ipsum dolor sit amet...'
];
$folder = $cmApi->postFolder($data);

$httpResponseCode = $folder->getStatusCode();
$httpResponseData = $folder->getData();

/**
 * Delete a folder
 * @DELETE
 */
$delete = $cmApi->deleteFolder('04c4458f-5dbc-82f4-3afb-6e73c3552517');

$httpResponseCode = $delete->getStatusCode();
$httpResponseData = $delete->getData();

/**
 * Edit folder
 * @PATCH
 */
$data = [
	'name' => 'My Edited Folder'
];
$folder = $cmApi->patchFolder('0f7846e7-9f6e-c3f3-f1fe-fc01a85df28a', $data);

$httpResponseCode = $folder->getStatusCode();
$httpResponseData = $folder->getData();