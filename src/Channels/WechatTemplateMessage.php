<?php

namespace iBrand\Notification\Channels;

use Illuminate\Notifications\Notification;
use EasyWeChat\Factory;

class WechatTemplateMessage
{
	/**
	 * @param              $notifiable
	 * @param Notification $notification
	 */
	public function send($notifiable, Notification $notification)
	{
		$openid = $notification->toUser($notifiable);
		if (!$openid) {
			return;
		}

		$data = $notification->getMessage($notifiable);
		if (!empty($data)) {
			return;
		}

		$config = [
			'app_id' => 'wx3cf0f39249eb0exx',
			'secret' => 'f1c242f4f28f735d4687abb469072axx',
		];

		$app = Factory::officialAccount($config);
		try {
			$app->template_message->send($data);
		} catch (\Exception $exception) {
			\Log::info($exception->getMessage());
			\Log::info($exception->getTraceAsString());

			return false;
		}
	}
}
