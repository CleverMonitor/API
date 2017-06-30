<?php
	namespace CleverMonitor\Api\Methods;

	/**
	 * CleverMonitor Developers
	 * 
	 * Distribution Lists
	 * @author CleverMonitor <support@clevermonitor.com>
	 */

	class Lists extends Base {

		/**
		 * Create a distribution list
		 * @param array $data
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function postList(array $data) {
			$curl = $this->connection->post('lists/', $data);
			return $curl;
		}

		/**
		 * Overview of a distribution lists
		 * @param int $count
		 * @param int $offset
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getLists($count = 100, $offset = 0) {
			$query = [
				'count' => $count,
				'offset' => $offset,
			];
			$curl = $this->connection->get('lists/', $query);
			return $curl;
		}

		/**
		 * Detail of a distribution list
		 * @param string $list_id
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getList($list_id) {
			$curl = $this->connection->get('lists/' . $list_id);
			return $curl;
		}

		/**
		 * Update a distribution list
		 * @param string $list_id
		 * @param array $data
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function patchList($list_id, array $data) {
			$curl = $this->connection->patch('lists/' . $list_id, $data);
			return $curl;
		}

		/**
		 * Delete a distribution list
		 * @param string $list_id
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function deleteList($list_id) {
			$curl = $this->connection->delete('lists/' . $list_id);
			return $curl;
		}

		/**
		 * Preview subscribers in a distribution list
		 * @param string $list_id
		 * @param int $count
		 * @param int $offset
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getListSubscribers($list_id, $count = 100, $offset = 0) {
			$query = [
				'count' => $count,
				'offset' => $offset,
			];
			$curl = $this->connection->get('lists/'. $list_id . '/subscribers/', $query);
			return $curl;
		}

		/**
		 * Adding subscribers to a distribution list
		 * @param string $list_id
		 * @param array $data
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function putListSubscribers($list_id, array $data) {
			$curl = $this->connection->put('lists/' . $list_id . '/subscribers', $data);
			return $curl;
		}

		/**
		 * Delete subscribers in a distribution list
		 * @param string $list_id
		 * @param array $data
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function deleteListSubscribers($list_id, array $data) {
			$curl = $this->connection->delete('lists/' . $list_id . '/subscribers', $data);
			return $curl;
		}
	}
