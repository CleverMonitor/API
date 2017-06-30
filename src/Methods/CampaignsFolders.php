<?php

	namespace CleverMonitor\Api\Methods;

	/**
	 * CleverMonitor Developers
	 *
	 * Campaigns' folders
	 * @author CleverMonitor <support@clevermonitor.com>
	 */

	class CampaignsFolders extends Base {
		
		/**
		 * Campaigns' folders list
		 * @param int $count Count of records on page
		 * @param int $offset Records offset
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getFolders($count = 100, $offset = 0) {
			$query = [
				'count' => $count,
				'offset' => $offset
			];
			$curl = $this->connection->get('campaigns/folders', $query);
			return $curl;
		}
		
		/**
		 * Detail of folder
		 * @param string $id Folder ID
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function getFolder($id) {
			$curl = $this->connection->get('campaigns/folders/'.$id);
			return $curl;
		}

		/**
		 * Create a new folder
		 * @param array $data Data for request body
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function postFolder(array $data) {
			$curl = $this->connection->post('campaigns/folders', $data);
			return $curl;
		}

		/**
		 * Delete a folder
		 * @param string $id Folder ID
		 * @param boolean $deleteCampaigns Deletes campaigns in this folder
		 * @param boolean $deleteChildren Deletes subfolders of this folder
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function deleteFolder($id, $deleteCampaigns = FALSE, $deleteChildren = FALSE) {
			$curl = $this->connection->delete('campaigns/folders/'.$id, [
				'delete_campaigns' => $deleteCampaigns,
				'delete_children' => $deleteChildren
			]);
			return $curl;
		}

		/**
		 * Edit folder
		 * @param string $id Folder ID
		 * @param array $data Data for request body
		 * @return \CleverMonitor\Api\Connection\Response
		 */
		public function patchFolder($id, array $data) {
			$curl = $this->connection->patch('campaigns/folders/'.$id, $data);
			return $curl;
		}
		
	}
