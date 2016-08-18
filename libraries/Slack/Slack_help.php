<?php

/**
 * Created by PhpStorm.
 * User: will
 * Date: 8/11/16
 * Time: 10:07 AM
 */
class Slack_help extends Slack_bot
{

    public function parse_data($text = null)
    {
        $ci = get_instance();

        $available_commands = $ci->config->item('tokens');

        foreach ($available_commands as $function) {
            $service = 'Slack_' . $function;
            if (class_exists($service)) {
                $bot = new $service;
                $bot->help();
                $bot->send();
            }
        }

    }

    public function send()
    {
        return;
    }
}
