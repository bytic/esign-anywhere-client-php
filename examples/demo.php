<?php

require 'init.php';

var_dump($client->authTest());

$result = $client->sspFileUploadTemporary(BASE_PATH . '/tests/fixtures/test-file.pdf');
var_dump($result);

$result = $client->envelopeCreate([
    'SspFileIds' => [$result->getSspFileId()],
    'SendEnvelopeDescription' => [],
    'CreateDraftOptions' => [],
]);
var_dump($result);
