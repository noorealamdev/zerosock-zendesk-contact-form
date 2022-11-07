<?php

// load Composer
require '../vendor/autoload.php';

use Zendesk\API\HttpClient as ZendeskAPI;

$subdomain = "12labels";
$username  = "Nick@12labels.com"; // replace this with your registered email
$token     = "8sKtjBZCARYN0jd11Y42c6xCE9aIDz7nQTG2PzE1"; // replace this with your token

$client = new ZendeskAPI($subdomain);
$client->setAuth('basic', ['username' => $username, 'token' => $token]);

if (isset($_POST['name']) && $_POST['email'] && isset($_POST['subject']) && $_POST['comment']) {
    try {
        // Create a new ticket
        $newTicket = $client->tickets()->create([
            'requester' => [
                'name' => $_POST['name'],
                'email' => $_POST['email']
            ],
            'subject'  => '[ZeroSock-Contact] ' .$_POST['subject'],
            'comment'  => [
                'body' => $_POST['comment']
            ]
        ]);

        echo json_encode(array('success' => 1));

    } catch (\Zendesk\API\Exceptions\ApiResponseException $e) {
        echo $e->getMessage();
        echo json_encode(array('success' => 0));
    }

} else {
    echo json_encode(array('success' => 0));
}