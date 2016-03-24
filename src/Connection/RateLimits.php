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

		/**
		 * Get Rate Limit
		 * @return int
		 */
		public function getLimit() {
			return $this->rateLimitLimit;
		}

		/**
		 * Get Rate Remaining
		 * @return int
		 */
		public function getRemaining() {
			return $this->rateLimitRemaining;
		}

		/**
		 * Get Rate Remaining
		 * @return int
		 */
		public function getReset() {
			return $this->rateLimitReset;
		}
	}
