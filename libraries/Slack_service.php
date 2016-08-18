<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Include other slack services here
 */
include_once ( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Slack' . DIRECTORY_SEPARATOR . 'Slack_bot.php' );
include_once ( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Slack' . DIRECTORY_SEPARATOR . 'Slack_response.php' );
include_once ( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Slack' . DIRECTORY_SEPARATOR . 'Slack_help.php' );

/**
 * Class Slack_service
 */
class Slack_service
{

    function exec( $service, $text ) {


        $class_name = 'Slack_' . $service;

        if ( class_exists( $class_name ) ){

            /**
             * @var $bot Slack_bot
             */
            $bot = new $class_name();

	    if ( 'help' == trim(strtolower($text)) ){
    		$bot->help();

	       } else {

	    	 	$bot->parse_data($text);
            }
                $bot->send();

            } else {
                echo 'Service not found';
            }
    }

}
