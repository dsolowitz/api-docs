<?php

require "vendor/autoload.php";

$BW_USERNAME = getenv("BW_USERNAME");
$BW_PASSWORD = getenv("BW_PASSWORD");
$BW_ACCOUNT_ID = getenv("BW_ACCOUNT_ID");

$config = new BandwidthLib\Configuration(
    array(
        'webRtcBasicAuthUserName' => $BW_USERNAME,
        'webRtcBasicAuthPassword' => $BW_PASSWORD,
    )
);
$client = new BandwidthLib\BandwidthClient($config);

$webRtcClient = $client->getWebRtc()->getClient();

$sessionId = "1234-qwer";

try {
    $response = $webRtcClient->getSession($BW_ACCOUNT_ID, $sessionId);
    print_r($response->getResult()->id);
} catch (BandwidthLib\APIException $e) {
    print_r($e->getResponseCode());
}
