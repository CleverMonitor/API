<?php
	namespace CleverMonitor\Api\Methods;

	/**
	 * CleverMonitor Developers
	 *
	 * References
	 * @author CleverMonitor <support@clevermonitor.com>
	 */

	class References extends Base {

		/**
		 * Get reference
		 * @param string $name Name of reference (if NULL, all references will be listed)
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getReference($name = NULL) {
			$curl = $this->connection->get('references/'.$name);
			return $curl;
		}
	}
