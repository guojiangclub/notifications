<?php

/*
 * This file is part of ibrand/notification.
 *
 * (c) iBrand <https://www.ibrand.cc>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace iBrand\Notification\Channels;

use EasyWeChat;
use Illuminate\Notifications\Notification;

class WechatTemplateMessage
{
    /**
     * @param $notifiable
     * @param Notification $notification
     */
    public function send($notifiable, Notification $notification)
    {
        if (!$notification->checkOpenId($notifiable)) {
            return;
        }

        $data = $notification->getTemplateMessage($notifiable);

        if (!$data) {
            return;
        }

        $app = EasyWeChat::officialAccount();

        $app->template_message->send($data);
    }
}
