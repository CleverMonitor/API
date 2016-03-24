<?php
	namespace CleverMonitor\Api;

	use \GuzzleHttp\Client;
	use \CleverMonitor\Api\Constants\Api;

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
			$client = new Client([
				'base_uri' => Api::API_URL.'/v'.Api::API_VERSION.'/',
				'timeout' => Api::API_TIMEOUT,
				'verify' => false,
				'headers' => [
					'Accept' => Api::API_CONTENT_TYPE,
					'X-Api-Key' => $this->apiKey,
				],
			]);

			return $client;
		}

		/**
		 * GET
		 * @param string $uri
		 * @param array $query
		 * @return stdClass
		 */
		public function get($uri, $query = array()) {
			$query = '?' . http_build_query($query);
			$response = $this->client->request('GET', $uri.$query);
			return $this->responseHandle($response);
		}

		/**
		 * POST
		 * @param string $uri
		 * @param array $formParams
		 * @return stdClass
		 */
		public function post($uri, $formParams) {
			$response = $this->client->request('POST', $uri, array('form_params' => $formParams));
			return $this->responseHandle($response);
		}

		/**
		 * PATCH
		 * @param string $uri
		 * @param array $formParams
		 * @return stdClass
		 */
		public function patch($uri, $formParams) {
			$response = $this->client->request('PATCH', $uri, array('form_params' => $formParams));
			return $this->responseHandle($response);
		}

		/**
		 * PUT
		 * @param string $uri
		 * @param array $formParams
		 * @return stdClass
		 */
		public function put($uri, $formParams) {
			$response = $this->client->request('PUT', $uri, array('form_params' => $formParams));
			return $this->responseHandle($response);
		}

		/**
		 * DELETE
		 * @param string $uri
		 * @param array $formParams
		 * @return stdClass
		 */
		public function delete($uri, $formParams = NULL) {
			$response = $this->client->request('DELETE', $uri, array('form_params' => $formParams));
			return $this->responseHandle($response);
		}

		/**
		 * Response handler
		 * @param Response $response
		 * @return stdClass
		 */
		public function responseHandle($response) {
			$httpStatusCode = $response->getStatusCode();
			$this->rateLimit = new RateLimits(
				current($response->getHeader('X-RateLimit-Limit')),
				current($response->getHeader('X-RateLimit-Remaining')),
				current($response->getHeader('X-RateLimit-Reset'))
			);

			$data = (string) $response->getBody();

			if ($httpStatusCode === 204) {
				$data = NULL;
			} else if ($httpStatusCode === 304) {
				throw new ConnectionExceptions\NotModifed();
			} else if ($httpStatusCode === 400) {
				throw new ConnectionExceptions\BadRequest();
			} else if ($httpStatusCode === 404) {
				throw new ConnectionExceptions\NotFound();
			} else if ($httpStatusCode === 401) {
				throw new ConnectionExceptions\Unauthorized();
			} else if ($httpStatusCode === 422) {
				throw new ConnectionExceptions\UnprocessableEntity();
			}

			return new Response($httpStatusCode, $data);
		}

		/**
		 * Get Rate Limit
		 * @return \stdClass
		 */
		public function getRateLimit() {
			return $this->rateLimit;
		}
	}
