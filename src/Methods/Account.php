<?php

	namespace CleverMonitor\Api\Methods;

	/**
	 * CleverMonitor Developers
	 *
	 * Account
	 * @author CleverMonitor <support@clevermonitor.com>
	 */

	class Account extends Base {
		
		/**
		 * Tariff information about client's account
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getAccountTariff() {
			$curl = $this->connection->get('account/tariff');
			return $curl;
		}
		
		/**
		 * Price Calculator
		 * @param array $data Data for request body
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function priceCalculator(array $data) {
			$curl = $this->connection->post('account/price', $data);
			return $curl;
		}
		
		/**
		 * Transaction Email Price Calculator
		 * @param array $data Data for request body
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function transactionPriceCalculator(array $data) {
			$curl = $this->connection->post('account/price-transaction', $data);
			return $curl;
		}
		
	}
