<?php
	namespace CleverMonitor\Api;

	/**
	 * CleverMonitor Developers
	 *
	 * Response
	 * @author CleverMonitor <support@clevermonitor.com>
	 */

	class Response {

		/**
		 * Code
		 * @var int
		 */
		protected $httpStatusCode;

		/**
		 * Data
		 * @var array
		 */
		protected $responseData;

		public function __construct($code, $data) {
			$this->httpStatusCode = $code;
			$this->responseData = json_decode($data, TRUE);
		}

		public function getStatusCode() {
			return $this->httpStatusCode;
		}

		public function getData() {
			return $this->responseData;
		}
	}
