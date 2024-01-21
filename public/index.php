<?php

$app = require_once __DIR__ . '/../boostrap.php';

require_once '../routes/api.php';

require_once '../routes/web.php';

$app->run();