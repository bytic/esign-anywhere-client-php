<?php

require 'init.php';

var_dump($client->authTest());

var_dump($client->sspFileUploadTemporary(BASE_PATH . '/tests/fixtures/test-file.pdf'));