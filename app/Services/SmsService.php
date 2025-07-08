<?php

namespace App\Services;

use Dash8x\DhiraaguSms\DhiraaguSms;

class SmsService
{
    protected $client;

    public function __construct()
    {
        $this->client = new DhiraaguSms(
            config('services.dhiraagu.username'),
            config('services.dhiraagu.password'),
            config('services.dhiraagu.url')
        );
    }

    public function send(string $phone, string $message)
    {
        return $this->client->send($phone, $message);
    }

    public function checkStatus(string $messageId, string $messageKey)
    {
        return $this->client->delivery($messageId, $messageKey);
    }
}
