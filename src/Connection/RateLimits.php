<?php
	namespace CleverMonitor\Api\Connection;

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
		 * The maximum number of requests you can make per 15 minutes window.
		 * @return int
		 */
		public function getLimit() {
			return $this->rateLimitLimit;
		}

		/**
		 * The number of requests remaining in the current rate limit window.
		 * @return int
		 */
		public function getRemaining() {
			return $this->rateLimitRemaining;
		}

		/**
		 * The number of seconds before the rate limit is reset.
		 * @return int
		 */
		public function getReset() {
			return $this->rateLimitReset;
		}
	}
