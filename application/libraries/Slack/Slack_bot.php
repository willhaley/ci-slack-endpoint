<?php
/**
 * Created by PhpStorm.
 * User: will
 * Date: 7/21/16
 * Time: 4:22 PM
 */

abstract class Slack_bot
{
    /**
     * @var string
     */
    protected $data_type = 'JSON';

    /**
     * @var string
     */
    protected $data_url;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var Slack_response
     */
    protected $response;


    /**
     * @param null $text
     */
    public function parse_data( $text = null) {

        $this->get_data();

        $this->response = new Slack_response();

        foreach ( $this->data as $line ){
            $this->response->add( $line );
        }

    }

    /**
     * @return array|mixed
     */
    protected function get_data() {

        $data = file_get_contents( $this->data_url );

        switch ( $this->data_type ){

            case 'JSON':
                $this->data = json_decode( $data );
                break;

            default:
                $this->data = array( $data );
                break;

        }

    	return $this->data;
    }

    /**
     *
     */
    public function send() {
	    $this->response->send();
        return;
    }

    /**
     *
     */
    public function help(){}

}
