<?php	namespace CleverMonitor\Api\Methods;

	use \CleverMonitor\Api\Connection;

	/**
	 * CleverMonitor Developers
	 *
	 * BASE
	 * @author CleverMonitor <support@clevermonitor.com>
	 */
	abstract class Base {

		/**
		 * Connection
		 * @var Connection
		 */
		protected $connection;

		public function __construct($id, $token) {
			$this->connection = new Connection($id, $token);
		}

		public function getConnection() {
			return $this->connection;
		}
	}
