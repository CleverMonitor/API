<?php

/**
 * CleverMonitor Developers
 *
 * CleverMonitor REST API Example
 * References
 *
 * @author CleverMonitor <support@clevermonitor.com>
 */

require __DIR__ . '/vendor/autoload.php';

$cmApi = new \CleverMonitor\Api\Methods\References('Your ID', 'Your Token');

/**
 * Get Reference
 * @GET
 */
$reference = $cmApi->getReference('contact_type');

$httpResponseCode = $reference->getStatusCode();
$httpResponseData = $reference->getData();
