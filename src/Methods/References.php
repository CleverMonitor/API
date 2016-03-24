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
		 * @param string $name
		 * @return \stdClass
		 */
		public function getReference($name) {
			$curl = $this->connection->get('lists/'.$name);
			return $curl;
		}
	}
