<?php
	namespace CleverMonitor\Api\Methods;

	/**
	 * CleverMonitor Developers
	 *
	 * Subscribers
	 * @author CleverMonitor <support@clevermonitor.com>
	 */

	class Subscribers extends Base {

		/**
		 * Subscribers Report
		 * @param int $count Count records on page
		 * @param int $offset Records offset
		 * @param int $contactStatus Reference: contact_status
		 * @return \stdClass
		 */
		public function getSubscribers($count = 100, $offset = 0, $contactStatus = NULL) {
			$query = array(
				'contact_status' => $contactStatus,
				'count' => $count,
				'offset' => $offset
			);
			$curl = $this->connection->get('subscribers', $query);
			return $curl;
		}

		/**
		 * Detail of sbscriber
		 * @param string $email Email or Email ID
		 * @return \stdClass
		 */
		public function getSubscribersEmail($email) {
			$curl = $this->connection->get('subscribers/email/'.$email);
			return $curl;
		}

		/**
		 * Unsubscribe
		 * @param string $email Email or Email ID
		 * @return \stdClass
		 */
		public function getSubscribersEmailUnsubscribe($email) {
			$curl = $this->connection->get('subscribers/email/unsubscribe/'.$email);
			return $curl;
		}

		/**
		 * Delete a subscriber
		 * @param string $email Email or Email ID
		 * @return \stdClass
		 */
		public function deleteSubscribersEmail($email) {
			$curl = $this->connection->get('subscribers/email/unsubscribe/'.$email);
			return $curl;
		}

		/**
		 * Create a Subscriber
		 * @param array $data
		 * @return \stdClass
		 */
		public function postSubscriber(array $data) {
			$curl = $this->connection->post('subscribers/email/', $data);
			return $curl;
		}

		/**
		 * Update a subscriber
		 * @param type $email
		 * @param array $data
		 * @return \stdClass
		 */
		public function patchSubscriber($email, array $data) {
			$curl = $this->connection->patch('subscribers/email/'.$email, $data);
			return $curl;
		}
	}
