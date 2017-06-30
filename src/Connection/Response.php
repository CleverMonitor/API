<?php
	namespace CleverMonitor\Api\Connection;

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

		/**
		 * Returns status code of response
		 * @return int Status code
		 */
		public function getStatusCode() {
			return $this->httpStatusCode;
		}

		/**
		 * Returns data from body of response
		 * @return array Data from body
		 */
		public function getData() {
			return $this->responseData;
		}
	}
