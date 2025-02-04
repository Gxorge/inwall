<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('notifications.terminal.{id}', function ($user, int $id) {
    return (int) $user->tid == $id;
}, ['guards' => 'broadcasting']);
