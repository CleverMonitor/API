<?php

	namespace CleverMonitor\Api\Methods;

	/**
	 * CleverMonitor Developers
	 *
	 * Custom fields
	 * @author CleverMonitor <support@clevermonitor.com>
	 */

	class CustomFields extends Base {
		
		/**
		 * Custom fields overview
		 * @param int $count Count of records on page
		 * @param int $offset Records offset
		 * @param int $source Reference: field_source
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getFields($count = 100, $offset = 0, $source = NULL) {
			$query = [
				'count' => $count,
				'offset' => $offset,
				'source' => $source
			];
			$curl = $this->connection->get('fields', $query);
			return $curl;
		}
		
		/**
		 * Custom field detail
		 * @param string $id Field Code or Field ID
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getField($id) {
			$curl = $this->connection->get('fields/'.$id);
			return $curl;
		}
		
		/**
		 * Create a custom field
		 * @param array $data Data for request body
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function postField(array $data) {
			$curl = $this->connection->post('fields', $data);
			return $curl;
		}
		
		/**
		 * Edit a custom field
		 * @param string $id Field Code or Field ID
		 * @param array $data Data for request body
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function patchField($id, array $data) {
			$curl = $this->connection->patch('fields/'.$id, $data);
			return $curl;
		}
		
		/**
		 * Delete a custom field
		 * @param string $id Field Code or Field ID
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function deleteField($id) {
			$curl = $this->connection->delete('fields/'.$id);
			return $curl;
		}
		
		/**
		 * Add values to custom field
		 * @param string $id Field Code or Field ID
		 * @param array $values Values to add to custom field
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function putValuesToField($id, array $values) {
			$curl = $this->connection->put('fields/'.$id.'/values', [
				'values' => $values
			]);
			return $curl;
		}
		
		/**
		 * Delete values from custom field
		 * @param string $id Field Code or Field ID
		 * @param array $values Values to delete from custom field
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function deleteValuesFromField($id, array $values) {
			$curl = $this->connection->delete('fields/'.$id.'/values', [
				'values' => $values
			]);
			return $curl;
		}
		
		/**
		 * Custom field values overview
		 * @param string $id Field Code or Field ID
		 * @param int $count Count of records on page
		 * @param int $offset Records offset
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getFieldValues($id, $count = 100, $offset = 0) {
			$query = [
				'count' => $count,
				'offset' => $offset
			];
			$curl = $this->connection->get('fields/'.$id.'/values', $query);
			return $curl;
		}
		
		/**
		 * Add values of custom field to subscribers
		 * @param string $id Field Code or Field ID
		 * @param array $data Data for request body
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function putValuesOfFieldToSubscribers($id, $data) {
			$curl = $this->connection->put('fields/'.$id.'/subscribers', $data);
			return $curl;
		}
		
		/**
		 * Delete values of custom field from subscribers
		 * @param string $id Field Code or Field ID
		 * @param array $data Data for request body
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function deleteValuesOfFieldFromSubscribers($id, $data) {
			$curl = $this->connection->delete('fields/'.$id.'/subscribers', $data);
			return $curl;
		}
		
		/**
		 * Overview of values assigned to subscribers
		 * @param string $id Field Code or Field ID
		 * @param int $count Count of records on page
		 * @param int $offset Records offset
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getValuesOfFieldFromSubscribers($id, $count = 100, $offset = 0) {
			$query = [
				'count' => $count,
				'offset' => $offset
			];
			$curl = $this->connection->get('fields/'.$id.'/subscribers', $query);
			return $curl;
		}
		
	}
