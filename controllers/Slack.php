<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slack extends CI_Controller {

	public function index()
	{

        $available_commands         = $this->config->item( 'tokens' );

        $token                      = $this->input->post( 'token' );
        $text                       = $this->input->post( 'text' );

        if ( isset( $available_commands[$token] )){
            $this->load->library('Slack_service');
            $this->slack_service->exec( $available_commands[$token], $text );
            die();

        }

        die("Command Not Found");

	}

}
