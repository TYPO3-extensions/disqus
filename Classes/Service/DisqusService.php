<?php

class Tx_Disqus_Service_DisqusService {

	/**
	 * Disqus API Version
	 *
	 * @var string
	 */
	protected $version;

	/**
	 * Return format
	 *
	 * @var string
	 */
	protected $format;

	/**
	 * Request scheme
	 *
	 * @var string
	 */
	protected $scheme;

	/**
	 * API Host
	 *
	 * @var string
	 */
	protected $host;

	/**
	 * API Path
	 *
	 * @var string
	 */
	protected $path;

	/**
	 * Disqus endpoint to query for data
	 *
	 * @var string
	 */
	protected $endpoint;

	/**
	 * Request parameters
	 *
	 * @var array
	 */
	protected $arguments = array();

	/**
	 * Constructor
	 *
	 * @param string $endpoint Disqus endpoint ex. "threads/mostPolpular"
	 * @param array $configuration Configuration for Disqus API endpoint request
	 *
	 * @return void
	 */
	public function __construct($endpoint = NULL, array $configuration = array()) {
		if ($endpoint === NULL) {
			die('configuration must be given');
		}
		if (is_array($configuration) !== TRUE) {
			die('configuration must be given in type of array!');
		}

		$apiConfiguration = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_disqus.']['api.'];

		$this->initialize($endpoint, $configuration, $apiConfiguration);
	}

	/**
	 * Initialize Disqus API
	 *
	 * @param string $endpoint Endpoint to ask, ex. "threads/mostPopular"
	 * @param array $configuration Configuration array
	 * @param array $apiConfiguration API configuration array
	 * @param string $format Format of return data
	 *
	 * @return void
	 */
	protected function initialize($endpoint, $configuration, $apiConfiguration, $format = 'json') {
		$this->endpoint = $endpoint;
		$this->format = $format;
		$this->host = $apiConfiguration['host'];
		$this->setArgument('api_key', $apiConfiguration['key']);
		$this->setArgument('forum', $apiConfiguration['forum']);
		foreach ($configuration['arguments'] as $key=>$value) {
			$this->setArgument($key, $value);
		}
		$this->path = $apiConfiguration['path'];
		$this->scheme = $apiConfiguration['scheme'];
		$this->version = $apiConfiguration['version'];
	}

	/**
	 * Set endpoint
	 *
	 * @param string $endpoint
	 */
	public function setEndpoint($endpoint){
		$this->endpoint = $endpoint;
	}

	/**
	 * Set return format (json, jsonp, rss)
	 *
	 * @param string $format
	 */
	public function setFormat($format) {
		$this->format = $format;
	}

	/**
	 * Set hostname of API
	 *
	 * @param string $host
	 */
	public function setHost($host) {
		$this->host = $host;
	}

	/**
	 * Set a single argument
	 *
	 * @param string $key Argument key
	 * @param string $value Argument value
	 *
	 * @return void
	 */
	public function setArgument($key, $value) {
		$this->arguments[$key] = $value;
	}

	/**
	 * Set arguments for API request
	 *
	 * @param array $arguments
	 */
	public function setArguments(array $arguments) {
		foreach ($arguments as $key=>$value) {
			$this->arguments[$key] = $value;
		}
	}

	/**
	 * Set api path
	 *
	 * @param string $path
	 */
	public function setPath($path) {
		$this->path = $path;
	}

	/**
	 * Set scheme used for request
	 *
	 * @param string $scheme
	 */
	public function setScheme($scheme) {
		$this->scheme = $scheme;
	}

	/**
	 * Set API version
	 *
	 * @param string $version
	 */
	public function setVersion($version) {
		$this->version = $version;
	}

	/**
	 * Execute request
	 *
	 * @return array|string
	 */
	public function request() {
		$requestUrl = $this->scheme . '://' . $this->host . '/' . $this->path . '/' . $this->version . '/' . $this->endpoint . '.' . $this->format . '?' . http_build_query($this->arguments);
		if (filter_var($requestUrl, FILTER_VALIDATE_URL) === FALSE) {
			die('The requested url (' . $requestUrl .') is not valid');
		}
		$request = curl_init($requestUrl);
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
		$returnData = curl_exec($request);
		curl_close($request);
		return $returnData;
	}
}

?>
