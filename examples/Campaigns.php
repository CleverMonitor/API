<?php

/**
 * CleverMonitor Developers
 *
 * CleverMonitor REST API Example
 * Campaigns
 *
 * @author CleverMonitor <support@clevermonitor.com>
 */

require __DIR__ . '/../vendor/autoload.php';

$cmApi = new \CleverMonitor\Api\Methods\Campaigns('Your ID', 'Your Token');

/**
 * List of campaigns in client's profile
 * @GET
 */
$campaigns = $cmApi->getCampaigns(100, 0, 1);

$httpResponseCode = $campaigns->getStatusCode();
$httpResponseData = $campaigns->getData();

/**
 * Detail of standard campaigns
 * @GET
 */
$campaign = $cmApi->getCampaign('a8477e13-b40c-cf3b-3da6-da0ee14a4053');

$httpResponseCode = $campaign->getStatusCode();
$httpResponseData = $campaign->getData();

/**
 * Subscribers in a standard campaign
 * @GET
 */
$subscribers = $cmApi->getCampaignSubscribers('a8477e13-b40c-cf3b-3da6-da0ee14a4053', 100, 0);

$httpResponseCode = $subscribers->getStatusCode();
$httpResponseData = $subscribers->getData();

/**
 * Statistics for a standard campaign
 * @GET
 */
$statistics = $cmApi->getCampaignStatistics('82e7ad0b-7440-5e29-2ed2-20ae9a503bc6');

$httpResponseCode = $statistics->getStatusCode();
$httpResponseData = $statistics->getData();

/**
 * External statistics
 * @POST
 */
$statistics = $cmApi->postExternalStatistics('82e7ad0b-7440-5e29-2ed2-20ae9a503bc6');

$httpResponseCode = $statistics->getStatusCode();
$httpResponseData = $statistics->getData();

/**
 * Content body
 * @GET
 */
$content = $cmApi->getCampaignContent('82e7ad0b-7440-5e29-2ed2-20ae9a503bc6');

$httpResponseCode = $content->getStatusCode();
$httpResponseData = $content->getData();

/**
 * Delete standard campaign
 * @DELETE
 */
$delete = $cmApi->deleteCampaign('a8477e13-b40c-cf3b-3da6-da0ee14a4053');

$httpResponseCode = $delete->getStatusCode();
$httpResponseData = $delete->getData();

/**
 * Send standard campaign
 * @POST
 */
$delete = $cmApi->sendCampaign('17c69096-db1a-23c6-72a9-c600fd96f154');

$httpResponseCode = $delete->getStatusCode();
$httpResponseData = $delete->getData();

/**
 * Send testing email
 * @POST
 */
$testEmail = $cmApi->sendTestEmail('4d597537-b7d5-04a8-886f-21404debe217', 'lukas@jelic.cz');

$httpResponseCode = $testEmail->getStatusCode();
$httpResponseData = $testEmail->getData();

/**
 * Stop sending
 * @GET
 */
$stop = $cmApi->stopCampaign('17c69096-db1a-23c6-72a9-c600fd96f154');

$httpResponseCode = $stop->getStatusCode();
$httpResponseData = $stop->getData();

/**
 * Create new campaign
 * @POST
 */
$data = [
	"title" => "My Campaign",
	"html_content" => TRUE,
	"settings" => [
		"subject" => "My Campaign"
	],
	"subscribers" => [
		"john.doe@example.com"
	],
	"content" => "<html></html>"
];
$campaign = $cmApi->postCampaign($data);

$httpResponseCode = $campaign->getStatusCode();
$httpResponseData = $campaign->getData();

/**
 * Update standard campaign parameters
 * @PATCH
 */
$data = [
	"title" => "My Updated Campaign"
];
$campaign = $cmApi->patchCampaign("9f2c5b5c-9f9e-c9ce-db9c-ed4c8f06a289", $data);

$httpResponseCode = $campaign->getStatusCode();
$httpResponseData = $campaign->getData();