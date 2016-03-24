<?php
	namespace CleverMonitor\Api;

	/**
	 * CleverMonitor Developers
	 *
	 * RateLimits
	 * @author CleverMonitor <support@clevermonitor.com>
	 */

	class RateLimits {

		/**
		 * Limit
		 * @var int
		 */
		protected $rateLimitLimit;

		/**
		 * Reamining
		 * @var int
		 */
		protected $rateLimitRemaining;

		/**
		 * Reset
		 * @var int
		 */
		protected $rateLimitReset;

		public function __construct($limit, $reamining, $reset) {
			$this->rateLimitLimit = $limit;
			$this->rateLimitRemaining = $reamining;
			$this->rateLimitReset = $reset;
		}

		public function getLimit() {
			return $this->rateLimitLimit;
		}

		public function getRemaining() {
			return $this->rateLimitRemaining;
		}

		public function getReset() {
			return $this->rateLimitReset;
		}
	}
