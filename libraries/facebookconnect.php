<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  FacebookConnect
 *
 * Author:  Jansen Felipe
 * 	    contato@supliu.com.br
 * 
 * Created:  19.02.2013
 *
 */
require_once FCPATH . 'sparks/facebook-connect/0.0.1/vendor/facebook.php';

class FacebookConnect extends Facebook {

    private $default_scopes = array('scope' => 'user_about_me, user_activities, user_likes, user_birthday, user_location, user_website, email, user_events, user_actions.music, user_groups, manage_pages');

    public function __construct() {
        $CI = &get_instance();
        parent::__construct(array(
            'appId' => $CI->config->item('appId'),
            'secret' => $CI->config->item('secret'),
        ));
    }
    
    public function addScope($str = "") {
        if(strlen($str)>3){
            $e = explode(',', $this->default_scopes['scope']);
            $e[] = $str;            
            $this->default_scopes['scope'] = implode(',', $e);
        }
    }

    protected function getCode() {

        if (isset($_GET['code'])) {
            if ($this->state !== null &&
                    isset($_GET['state']) &&
                    $this->state === $_GET['state']) {

                // CSRF state has done its job, so clear it
                $this->state = null;
                $this->clearPersistentData('state');
                return $_GET['code'];
            } else {
                self::errorLog('CSRF state token does not match one provided.');
                return false;
            }
        }

        return false;
    }

    public function getSignedRequest() {
        if (!$this->signedRequest) {
            if (isset($_GET['signed_request'])) {
                $this->signedRequest = $this->parseSignedRequest(
                        $_GET['signed_request']);
            } else if (isset($_COOKIE[$this->getSignedRequestCookieName()])) {
                $this->signedRequest = $this->parseSignedRequest(
                        $_COOKIE[$this->getSignedRequestCookieName()]);
            }
        }
        return $this->signedRequest;
    }

    public function getLoginUrl($params = array()) {
        $params = array_merge($params, $this->default_scopes);
        return parent::getLoginUrl($params);
    }

}