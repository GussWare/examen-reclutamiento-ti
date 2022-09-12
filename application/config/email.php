<?php
defined('BASEPATH') or exit('No direct script access allowed');


$config = array(
    'protocol' => getenv("CI_SMTP_PROTOCOL"),
    'smtp_host' => getenv("CI_SMTP_HOST"),
    'smtp_port' => getenv("CI_SMTP_PORT"),
    'smtp_user' => getenv("CI_SMTP_USER"),
    'smtp_pass' => getenv("CI_SMTP_PASS"),
    'mailtype' => getenv("CI_MAIL_TYPE"),
    'crlf' => "\r\n",
    'newline' => "\r\n",
);