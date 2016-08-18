<?php

/**
 * Created by PhpStorm.
 * User: will
 * Date: 7/22/16
 * Time: 8:21 AM
 */
class Slack_response
{

    /**
     * @var array
     */
    private $response = array();

    /**
     * @param $line
     */
    public function add( $line ){
        $this->response[] = $line;
    }

    /**
     *
     */
    public function send(){
        foreach ( $this->response as $line ){
            echo "$line\n";
        }
    }

}