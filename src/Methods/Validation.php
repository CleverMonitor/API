<?php

	namespace CleverMonitor\Api\Methods;

	/**
	 * CleverMonitor Developers
	 *
	 * Subscribers
	 * @author CleverMonitor <support@clevermonitor.com>
	 */

	class Validation extends Base {

		/**
		 * Single eamil validation
		 * @param string $email
		 * @param string $first_name
		 * @param string $last_name
		 * @param string $list_id
		 * @param boolean $auto_create
		 * @param boolean $reactivate
		 * @return \stdClass
		 */
		public function validationSingleEmail($email, $first_name = NULL, $last_name = NULL, $list_id = NULL, $auto_create = TRUE, $reactivate = FALSE) {
			$data = array(
				'email' => $email,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'list_id' => $list_id,
				'auto_create' => $auto_create,
				'reactivate' => $reactivate
			);
			$curl = $this->connection->post('validation/email/', $data);
			return $curl;
		}

		/**
		 * Bluk email validation
		 * @param array $data
		 * @return \stdClass
		 */
		public function validationBlukEmails(array $data) {
			$curl = $this->connection->post('validation/emails/', $data);
			return $curl;
		}

		/**
		 * Batch email validation - Request
		 * @param array $data
		 * @return \StdClass
		 */
		public function validationBatchEmailsRequest(array $data) {
			$curl = $this->connection->post('/batch/validation/emails/', $data);
			return $curl;
		}
		/**
		 * Batch email validation - Response
		 * @param string $id
		 * @return \stdClass
		 */
		public function validationBatchEmailsResponse($id) {
			$curl = $this->connection->get('/batch/validation/emails/'.$id);
			return $curl;
		}
	}
