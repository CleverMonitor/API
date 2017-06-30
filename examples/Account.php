<?php

/**
 * CleverMonitor Developers
 *
 * CleverMonitor REST API Example
 * Account
 *
 * @author CleverMonitor <support@clevermonitor.com>
 */

require __DIR__ . '/../vendor/autoload.php';

$cmApi = new \CleverMonitor\Api\Methods\Account('Your ID', 'Your Token');

/**
 * Tariff information about client's account
 * @GET
 */
$tariff = $cmApi->getAccountTariff();

$httpResponseCode = $tariff->getStatusCode();
$httpResponseData = $tariff->getData();

/**
 * Price Calculator
 * @POST
 */
$prices = $cmApi->priceCalculator([
	"subscribers" => 10000,
	"emails" => 1000,
	"duration" => 3,
	"dedic_ip" => true
]);

$httpResponseCode = $prices->getStatusCode();
$httpResponseData = $prices->getData();

/**
 * Transaction Email Price Calculator
 * @POST
 */
$prices = $cmApi->transactionPriceCalculator([
	"emails" => 10000,
	"duration" => 3
]);

$httpResponseCode = $prices->getStatusCode();
$httpResponseData = $prices->getData();