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
		 * Overview of subscribers
		 * @param int $count Count of records on page
		 * @param int $offset Records offset
		 * @param int $contactStatus Reference: contact_status
		 * @param \DateTime $statusChange Contacts with status changes after this date
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getSubscribers($count = 100, $offset = 0, $contactStatus = NULL, $statusChange = NULL) {
			$query = [
				'contact_status' => $contactStatus,
				'count' => $count,
				'offset' => $offset,
				'status_change' => $statusChange instanceof \DateTime ? $statusChange->format(\DateTime::ATOM) : $statusChange
			];
			$curl = $this->connection->get('subscribers', $query);
			return $curl;
		}

		/**
		 * Detail of a subscriber
		 * @param string $email Email or Email ID
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getSubscribersEmail($email) {
			$curl = $this->connection->get('subscribers/email/'.$email);
			return $curl;
		}

		/**
		 * Unsubscribe
		 * @param string $email Email or Email ID
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getSubscribersEmailUnsubscribe($email) {
			$curl = $this->connection->get('subscribers/email/unsubscribe/'.$email);
			return $curl;
		}

		/**
		 * Delete a subscriber
		 * @param string $email Email or Email ID
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function deleteSubscribersEmail($email) {
			$curl = $this->connection->delete('subscribers/email/'.$email);
			return $curl;
		}

		/**
		 * Create a subscriber
		 * @param array $data Data for request body
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function postSubscriber(array $data) {
			$curl = $this->connection->post('subscribers/email/', $data);
			return $curl;
		}

		/**
		 * Update a subscriber
		 * @param string $email Email or Email ID
		 * @param array $data Data for request body
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function patchSubscriber($email, array $data) {
			$curl = $this->connection->patch('subscribers/email/'.$email, $data);
			return $curl;
		}

		/**
		 * Remove subscriber from distribution list
		 * @param string $email Email or Email ID
		 * @param array $listId List ID
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function deleteSubscriberFromDistributionGroup($email, $listId) {
			$curl = $this->connection->delete('subscribers/email/'.$email.'/list/'.$listId);
			return $curl;
		}

		/**
		 * Remove tag from subscriber
		 * @param string $email Email or Email ID
		 * @param array $data Data for request body
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function deleteSubscribersTag($email, array $data) {
			$curl = $this->connection->delete('subscribers/email/'.$email.'/tag', $data);
			return $curl;
		}

		/**
		 * Add custom fields to subscriber
		 * @param string $email Email or Email ID
		 * @param array $data Data for request body
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function putFieldsToSubscriber($email, array $data) {
			$curl = $this->connection->put('subscribers/email/'.$email.'/fields', $data);
			return $curl;
		}
	}
