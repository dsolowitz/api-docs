<?php

require "vendor/autoload.php";

$BW_USERNAME = getenv("BW_USERNAME");
$BW_PASSWORD = getenv("BW_PASSWORD");
$BW_ACCOUNT_ID = getenv("BW_ACCOUNT_ID");

$config = new BandwidthLib\Configuration(
    array(
        'voiceBasicAuthUserName' => $BW_USERNAME,
        'voiceBasicAuthPassword' => $BW_PASSWORD,
    )
);
$client = new BandwidthLib\BandwidthClient($config);

$voiceClient = $client->getVoice()->getClient();

$conferenceId = "c-1234";

try {
    $response = $voiceClient->getConferenceRecordings($BW_ACCOUNT_ID, $conferenceId);
    if (count($response->getResult()) > 0) {
        print_r($response->getResult()[0]->name);
    }
} catch (BandwidthLib\APIException $e) {
    print_r($e->getResponseCode());
}
