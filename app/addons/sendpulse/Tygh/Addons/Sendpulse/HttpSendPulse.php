<?php
/***************************************************************************
 *                                                                          *
 *   (c) 2019 SendPulse                                                     *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 *                                                                          *
 ****************************************************************************
 * PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
 * "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
 ****************************************************************************/

namespace Tygh\Addons\Sendpulse;
use Tygh\Registry;
use Tygh\Settings;

class HttpSendPulse
{
    /**
     * SendPulse API url
     *
     * @var string $api_url
     */
    private $api_url = 'https://api.sendpulse.com';

    /**
     * Client ID from SendPulse API
     *
     * @var mixed|null $client_id
     */
    private $client_id;

    /**
     * Client SecretKey from SendPulse API
     *
     * @var mixed|null $client_secret
     */
    private $client_secret;

    /**
     * Token from SendPulse API
     *
     * @var mixed|null $send_token
     */
    private $send_token;

    /**
     * Error code from massage
     *
     * @var int $error_code
     */
    private $error_code;

    /**
     * HttpSendPulse constructor.
     */
    public function __construct() {
        $this->client_id = Registry::get('addons.sendpulse.sp_client_id');
        $this->client_secret = Registry::get('addons.sendpulse.sp_client_secret');
        $this->send_token = Registry::get('addons.sendpulse.sp_token');
    }

    /**
     * Checking SendPulse API connect
     *
     * @return bool
     */
    public function checkConnect() {

        if(empty($this->client_id) || empty($this->client_secret)) {
            $this->error_code = '99';
            return false;
        }

        if($this->getBookList()) { return true; } //try catch books

        if($this->getToken()) { return true; }//get token

        $this->error_code = '999';
        return false;
    }

    /**
     * Get book list from SendPulse Book
     *
     * @return array $book_list
     */
    public function getBookList() {
        $request_result = $this->sendQuery('addressbooks','GET' );

        if($request_result['http_code'] !== 200) { return false; }

        //collect books
        $request_body = json_decode($request_result['body'],true);
        foreach ($request_body as $item){ $book_list[$item['id']] = $item['name']; }
        return $book_list;
    }

    /**
     * Export data into SendPulse
     *
     * @param array $clients Prepared data from export
     * @param int $bookId BookId from SendPulse
     * @return bool
     */
    public function exportClients($clients, $bookId) {
        $data = array(
            'id'        => $bookId,
            'emails'    => $clients,
            );
        $request_result = $this->sendQuery('addressbooks/'.$bookId.'/emails', 'POST', $data);

        if ($request_result['http_code'] !== 200) {
            $this->error_code = $request_result['http_code'];
            return false;
        }

        return true;
    }

    /**
     * Get and set token from SendPulse
     *
     * @return bool
     */
    private function getToken() {
        $data = array(
            'grant_type'    => 'client_credentials',
            'client_id'     => $this->client_id,
            'client_secret' => $this->client_secret,
        );
        $request_result = $this->sendQuery('oauth/access_token','POST',$data,false);

        if($request_result['http_code'] !== 200) {
            $this->error_code = $request_result['http_code'];
            return false;
        }

        $request_body = json_decode($request_result['body']);
        $this->send_token = $request_body->access_token;

        Registry::set('addons.sendpulse.sp_token', $this->send_token);

        return true;
    }

    /**
     * Send query
     *
     * @param string $path Added url path
     * @param string $method Query method
     * @param array $data Data from send
     * @param bool $useToken Token from SendPulse API
     * @return array $result Data from answer
     */
    private function sendQuery($path, $method='GET', $data = array(), $useToken=true){
        $url = $this->api_url.'/'.$path;
        $method = strtoupper($method);
        $curl = curl_init();

        if($useToken && !empty($this->send_token)){
            $headers = array('Authorization: Bearer ' .$this->send_token);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }

        switch ($method) {
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, count($data));
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'PUT':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'DELETE':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            default:
                if (!empty($data)) {
                    $url .= '?' . http_build_query($data);
                }
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 15);
        curl_setopt($curl, CURLOPT_TIMEOUT, 15);
        $response = curl_exec($curl);
        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $response_body = substr($response, $header_size);
        curl_close($curl);

        $result['http_code']    = $header_code;
        $result['body']         = $response_body;

        return $result;
    }

    /**
     * Get error from SendPulse Client
     *
     * @return array $error Error value
     */
    public function getError() {
        $error =
            [
                '1'     => __('sp.error.message.1'),
                '2'     => __('sp.error.message.2'),
                '3'     => __('sp.error.message.3'),
                '99'    => __('sp.error.message.99'),
                '999'   => __('sp.error.message.999'),
            ];

        if(!array_key_exists($this->error_code, $error)) { return $error['999']; }

        return $error[$this->error_code];
    }

    private function getWebSites()
    {
        $data = array(
            'grant_type'    => 'client_credentials',
            'client_id'     => $this->client_id,
            'client_secret' => $this->client_secret,
        );
        $request_result = $this->sendQuery('push/websites','GET',$data);

        if($request_result['http_code'] !== 200) {
            $this->error_code = $request_result['http_code'];
            return false;
        }

       return json_decode($request_result['body']);

    }

    private function getWebSiteId($websites,$current_website)
    {
        foreach ( $websites as $website)
        {
            if ( strstr($website->url, $current_website) )
            {
                return $website->id;
            }

        }
    }

    public function getPushJsUrl($url)
    {
        //get current web site name
//        $url = 'http://cscart.bitabit.com.ua';
        $short_url = explode('//', $url);
        $short_home_url = explode('/',$short_url[1]);
        $site_name = $short_home_url[0];

        $websites = $this->getWebSites();
        $site_Id = $this->getWebSiteId($websites, $site_name);

        $data = array(
            'grant_type'    => 'client_credentials',
            'client_id'     => $this->client_id,
            'client_secret' => $this->client_secret,
        );
        $request_result = $this->sendQuery('push/websites/'.$site_Id.'/code','GET',$data);

        if($request_result['http_code'] !== 200) {
            $this->error_code = $request_result['http_code'];
            return false;
        }

        $body = json_decode($request_result['body']);
        return  $body->script_code;
    }
}
