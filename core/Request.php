<?php

/**
 *
 */
class Request
{
    private static $trustedHostPatterns = [];

    public $params  = ["controller" => null, "action" => null, "args" => null];

    public $data    = [];

    public $query   = [];

    public $url     = null;

    public function __construct($config = [])
    {
        $this->data     = $this->mergeData($_POST, $_FILES);
        $this->query    = $_GET;
        $this->params  += isset($config["params"]) ? $config["params"] : [];
        //$this->url      = $this->fullUrl();
    }

    private function mergeData(array $post, array $files)
    {
        foreach($post as $key => $value)
        {
            if(is_string($value)) { $post[$key] = trim($value); }
        }
        return array_merge($files, $post);
    }

    public function data($key)
    {
        return array_key_exists($key, $this->data)? $this->data[$key]: null;
    }

    public function query($key)
    {
        return array_key_exists($key, $this->query)? $this->query[$key]: null;
    }

    public function param($key)
    {
        return array_key_exists($key, $this->params)? $this->params[$key]: null;
    }

    public function isAjax()
    {
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']))
        {
            return strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
        }
        return false;
    }

    public function isPost()
    {
        return $_SERVER["REQUEST_METHOD"] === "POST";
    }

    public function isGet()
    {
        return $_SERVER["REQUEST_METHOD"] === "GET";
    }

    public function isSSL()
    {
        return isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== "off";
    }

    public function addParams(array $params)
    {
        $this->params = array_merge($this->params, $params);
        return $this;
    }

    public function contentLength()
    {
        return (int)$_SERVER['CONTENT_LENGTH'];
    }

    public function dataSizeOverflow()
    {
        $contentLength = $this->contentLength();
        return empty($this->data) && isset($contentLength);
    }

    public function uri()
    {
        return isset($_SERVER['REQUEST_URI'])? $_SERVER['REQUEST_URI']: null;
    }

    public function host()
    {
        if (!$host = Environment::get('HTTP_HOST'))
        {
            if (!$host = $this->name()) { $host = Enviroment::get('SERVER_ADDR'); }
        }

        // trim and remove port number from host
        $host = strtolower(preg_replace('/:\d+$/', '', trim($host)));

        // check that it does not contain forbidden characters
        if ($host && preg_replace('/(?:^\[)?[a-zA-Z0-9-:\]_]+\.?/', '', $host) !== '') {
            throw new UnexpectedValueException(sprintf('Invalid Host "%s"', $host));
        }

        // TODO
        // check the hostname against a trusted list of host patterns to avoid host header injection attacks
        if (count(self::$trustedHostPatterns) > 0) {

            foreach (self::$trustedHostPatterns as $pattern) {
                if (preg_match($pattern, $host)) {
                    return $host;
                }
            }

            throw new UnexpectedValueException(sprintf('Untrusted Host "%s"', $host));
        }

        return $host;
    }

    public function name()
    {
        return isset($_SERVER['SERVER_NAME'])? $_SERVER['SERVER_NAME']: null;
    }

    public function referer()
    {
        return isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']: null;
    }

    public function clientIp()
    {
        return isset($_SERVER['REMOTE_ADDR'])? $_SERVER['REMOTE_ADDR']: null;
    }

    public function userAgent()
    {
        return isset($_SERVER['HTTP_USER_AGENT'])? $_SERVER['HTTP_USER_AGENT']: null;
    }

    public function protocol()
    {
        return $this->isSSL() ? 'https' : 'http';
    }

    public function getProtocolAndHost()
    {
        return $this->protocol() . '://' . $this->host();
    }

    public function fullUrl()
    {
        // get uri
        $uri = $this->uri();
        if (strpos($uri, '?') !== false)
        {
            list($uri) = explode('?', $uri, 2);
        }

        // add querystring arguments(neglect 'url' & 'redirect')
        $query    = "";
        $queryArr = $this->query;
        unset($queryArr['url']);
        unset($queryArr['redirect']);

        if(!empty($queryArr))
        {
            $query .= '?' . http_build_query($queryArr, null, '&');
        }

        return  $this->getProtocolAndHost() . $uri . $query;
    }

    public function fullUrlWithoutProtocol()
    {
        return preg_replace('#^https?://#', '', $this->fullUrl());
    }

    public function getBaseUrl()
    {
        $baseUrl = str_replace(['public', '\\'], ['', '/'], dirname(Environment::get('SCRIPT_NAME')));
        return $baseUrl;
    }

    public function root()
    {
        return $this->getProtocolAndHost() . $this->getBaseUrl();
    }

    public function countData(array $exclude = [])
    {
        $count = count($this->data);
        foreach($exclude as $field)
        {
            if(array_key_exists($field, $this->data)) { $count--; }
        }
        return $count;
    }

    public function getUri()
    {
        return isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI']: null;
    }


}

?>
