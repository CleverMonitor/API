<?php
	namespace CleverMonitor\Api\Connection;

	use \GuzzleHttp\Client;

	/**
	 * CleverMonitor Developers
	 *
	 * Connection
	 * @author CleverMonitor <support@clevermonitor.com>
	 */

	class Connection {

		/**
		 * Api Key
		 * @var string
		 */
		private $apiKey;

		/**
		 * Client
		 * @var Client
		 */
		protected $client;

		/**
		 * RateLimit
		 * @var RateLimit
		 */
		protected $rateLimit;

		public function __construct($id, $token) {
			$this->apiKey = $id.':'.$token;
			$this->client = $this->client();
		}

		/**
		 * Client Settings
		 * @return Client
		 */
		private function client() {
			$config = $this->getConfiguration();
			$client = new Client([
				'base_uri' => 'https://api.clevermonitor.com/v'.$config->version.'/',
				'timeout' => $config->connection_timeout,
				'verify' => false,
				'headers' => [
					'Accept' => $config->content_type,
					'X-Api-Key' => $this->apiKey,
				],
				'http_errors' => false
			]);

			return $client;
		}

		/**
		 * Api configuration
		 * @return \stdClass
		 */
		private function getConfiguration() {
			$file = file_get_contents(__DIR__.'/config.json');
			return json_decode($file);
		}

		/**
		 * GET
		 * @param string $uri
		 * @param array $query
		 * @return Response
		 */
		public function get($uri, $query = []) {
			$query = '?' . http_build_query($query);
			$response = $this->client->request('GET', $uri.$query);
			return $this->responseHandle($response);
		}

		/**
		 * POST
		 * @param string $uri
		 * @param array $data
		 * @return Response
		 */
		public function post($uri, $data) {
			$response = $this->client->request('POST', $uri, ['json' => $data]);
			return $this->responseHandle($response);
		}

		/**
		 * PATCH
		 * @param string $uri
		 * @param array $data
		 * @return Response
		 */
		public function patch($uri, $data) {
			$response = $this->client->request('PATCH', $uri, ['json' => $data]);
			return $this->responseHandle($response);
		}

		/**
		 * PUT
		 * @param string $uri
		 * @param array $data
		 * @return Response
		 */
		public function put($uri, $data) {
			$response = $this->client->request('PUT', $uri, ['json' => $data]);
			return $this->responseHandle($response);
		}

		/**
		 * DELETE
		 * @param string $uri
		 * @param array $data
		 * @return Response
		 */
		public function delete($uri, $data = NULL) {
			$response = $this->client->request('DELETE', $uri, ['json' => $data]);
			return $this->responseHandle($response);
		}

		/**
		 * Response handler
		 * @param Response $response
		 * @return Response
		 */
		public function responseHandle($response) {
			$httpStatusCode = $response->getStatusCode();
			$this->rateLimit = new RateLimits(
				current($response->getHeader('X-RateLimit-Limit')),
				current($response->getHeader('X-RateLimit-Remaining')),
				current($response->getHeader('X-RateLimit-Reset'))
			);

			$data = (string) $response->getBody();

			return new Response($httpStatusCode, $data);
		}

		/**
		 * Get Rate Limit
		 * @return RateLimits
		 */
		public function getRateLimits() {
			return $this->rateLimit;
		}
	}
