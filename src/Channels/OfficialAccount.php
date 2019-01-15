<?php

namespace iBrand\Notification\Channels;

use Illuminate\Notifications\Notification;

class OfficialAccount
{
	/**
	 * @param                                        $notifiable
	 * @param \Illuminate\Notifications\Notification $notification
	 *
	 * @return bool
	 */
	public function send($notifiable, Notification $notification)
	{
		$openid = $notification->toUser();
		if (!$openid) {
			return false;
		}

		$data = $notification->getData();
		if (!empty($data)) {
			return false;
		}

		$app = $notification->getApp();
		try {
			$app->template_message->send($data);

			return true;
		} catch (\Exception $exception) {
			\Log::info($exception->getMessage());
			\Log::info($exception->getTraceAsString());

			return false;
		}
	}
}
