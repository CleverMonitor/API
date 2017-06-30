<?php

	namespace CleverMonitor\Api\Methods;

	/**
	 * CleverMonitor Developers
	 *
	 * Campaigns
	 * @author CleverMonitor <support@clevermonitor.com>
	 */

	class Campaigns extends Base {
		
		/**
		 * List of campaigns in client's profile
		 * @param int $count Count of records on page
		 * @param int $offset Records offset
		 * @param int $status Reference: campaign_status
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getCampaigns($count = 100, $offset = 0, $status = NULL) {
			$query = [
				'count' => $count,
				'offset' => $offset,
				'status' => $status
			];
			$curl = $this->connection->get('campaigns/standard', $query);
			return $curl;
		}

		/**
		 * Detail of standard campaigns
		 * @param string $id Campaign ID
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getCampaign($id) {
			$curl = $this->connection->get('campaigns/standard/'.$id);
			return $curl;
		}

		/**
		 * Subscribers in a standard campaign
		 * @param string $id Campaign ID
		 * @param int $count Count of records on page
		 * @param int $offset Records offset
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getCampaignSubscribers($id, $count = 100, $offset = 0) {
			$query = [
				'count' => $count,
				'offset' => $offset
			];
			$curl = $this->connection->get('campaigns/standard/'.$id.'/subscribers', $query);
			return $curl;
		}

		/**
		 * Statistics for a standard campaign
		 * @param string $id Campaign ID
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getCampaignStatistics($id) {
			$curl = $this->connection->get('campaigns/standard/'.$id.'/statistics');
			return $curl;
		}

		/**
		 * External statistics
		 * @param string $id Campaign ID
		 * @param \DateTime $externalDate Validity Date
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function postExternalStatistics($id, $externalDate = NULL) {
			$curl = $this->connection->post('campaigns/standard/'.$id.'/statistics/external', [
				'external_date' => $externalDate
			]);
			return $curl;
		}

		/**
		 * Content body
		 * @param string $id Campaign ID
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getCampaignContent($id) {
			$curl = $this->connection->get('campaigns/standard/'.$id.'/content');
			return $curl;
		}

		/**
		 * Delete standard campaign
		 * @param string $id Campaign ID
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function deleteCampaign($id) {
			$curl = $this->connection->delete('campaigns/standard/'.$id);
			return $curl;
		}

		/**
		 * Send standard campaign
		 * @param string $id Campaign ID
		 * @param \DateTime $planTime Plan Time
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function sendCampaign($id, $planTime = NULL) {
			$curl = $this->connection->post('campaigns/standard/'.$id.'/send', [
				"plan_time" => $planTime
			]);
			return $curl;
		}

		/**
		 * Send testing email
		 * @param string $id Campaign ID
		 * @param \DateTime $email Email address
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function sendTestEmail($id, $email) {
			$curl = $this->connection->post('campaigns/standard/'.$id.'/test', [
				"email" => $email
			]);
			return $curl;
		}

		/**
		 * Stop sending
		 * @param string $id Campaign ID
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function stopCampaign($id) {
			$curl = $this->connection->get('campaigns/standard/'.$id.'/stop');
			return $curl;
		}

		/**
		 * Create new campaign
		 * @param array $data Data for request body
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function postCampaign(array $data) {
			$curl = $this->connection->post('campaigns/standard', $data);
			return $curl;
		}

		/**
		 * Update standard campaign parameters
		 * @param array $data Data for request body
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function patchCampaign($id, array $data) {
			$curl = $this->connection->patch('campaigns/standard/'.$id, $data);
			return $curl;
		}
		
	}
