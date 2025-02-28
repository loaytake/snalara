<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Spatie\ScheduleMonitor\Models\MonitoredScheduledTaskLogItem;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
Schedule::command('schedule-monitor:sync')->dailyAt('21:00');
// Schedule::command('model:prune', ['--model' => MonitoredScheduledTaskLogItem::class])->daily();
Schedule::command('mtake:generate-sitemap')->daily()->graceTimeInMinutes(25);
