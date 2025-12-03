<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('inspire')->hourly();
Schedule::command('queue:work --stop-when-empty --timeout=60 --tries=3')->everyMinute()->withoutOverlapping();
