<?php

class Flash
{
    protected $messages;

    public function __construct()
    {
        $this->messages = array();
    }

    public function success($message)
    {
        $this->set_messages(MESSAGES_TYPE_SUCCESS, $message);

        $messages = $this->to_json();

        return $messages;
    }

    public function error($message)
    {
        $this->set_messages(MESSAGES_TYPE_ERROR, $message);

        $messages = $this->to_json();

        return $messages;
    }

    public function warning($message)
    {
        $this->set_messages(MESSAGES_TYPE_WARNING, $message);

        $messages = $this->to_json();

        return $messages;

    }

    public function set_messages($type, $message)
    {
        $messages = (is_array($message)) ? $message : array($message);

        $this->messages = array(
            "type"      => $type,
            "messages"  => $messages
        );
    }

    public function get_messages()
    {
        return $this->messages;
    }

    public function to_json()
    {
        return json_encode($this->messages);
    }
}
