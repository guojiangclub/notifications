<?php

/*
 * This file is part of ibrand/notification.
 *
 * (c) iBrand <https://www.ibrand.cc>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace iBrand\Notification;

use iBrand\Notification\Channels\WechatTemplateMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

abstract class BaseNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return [WechatTemplateMessage::class];
    }

    abstract public function checkOpenId();

    abstract public function getTemplateMessage();
}
