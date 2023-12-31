<?php

namespace App\Models\services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function __construct(protected ApiClient $client)
    {
        //
    }
    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers'); //nullsafe assignment operator

        return $this->client->lists->addListMember($list, [
        "email_address" => request('email'),
        "status" => "subscribed",
        ]);
    }
}
