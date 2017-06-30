<?php

	namespace CleverMonitor\Api\Methods;

	/**
	 * CleverMonitor Developers
	 *
	 * Validation
	 * @author CleverMonitor <support@clevermonitor.com>
	 */

	class Validation extends Base {

		/**
		 * Single Email Validation
		 * @param string $email Email for validation
		 * @param string $first_name Subscriber's first name
		 * @param string $last_name Subscriber's last name
		 * @param string $list_id Distribution list ID
		 * @param boolean $auto_create Creates a new subscriber
		 * @param boolean $reactivate Reactivates subscriber
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function validationSingleEmail($email, $first_name = NULL, $last_name = NULL, $list_id = NULL, $auto_create = TRUE, $reactivate = FALSE) {
			$data = [
				'email' => $email,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'list_id' => $list_id,
				'auto_create' => $auto_create,
				'reactivate' => $reactivate
			];
			$curl = $this->connection->post('validation/email/', $data);
			return $curl;
		}

		/**
		 * Bulk Email Validation
		 * @param array $data Data for request body
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function validationBulkEmails(array $data) {
			$curl = $this->connection->post('validation/emails/', $data);
			return $curl;
		}

		/**
		 * Batch Email Validation - Request
		 * @param array $data Data for request body
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function validationBatchEmailsRequest(array $data) {
			$curl = $this->connection->post('batch/validation/emails/', $data);
			return $curl;
		}
		
		/**
		 * Batch Email Validation - Response
		 * @param string $id Batch validation ID
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function validationBatchEmailsResponse($id) {
			$curl = $this->connection->get('batch/validation/emails/'.$id);
			return $curl;
		}
		
		/**
		 * RFC Email Validation
		 * @param string $email Email address
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function validationRfcSingleEmail($email) {
			$curl = $this->connection->get('validation/email/rfc/'.$email);
			return $curl;
		}
	}
