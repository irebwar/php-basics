<?php

require 'vendor/autoload.php';

use Carbon\Carbon;

$now = Carbon::now('ASIA/BAGHDAD');

echo "Current time: " . $now->toTimeString();
echo "<br>";
echo "Tomorrow: " . $now->addDay()->diffForHumans();
