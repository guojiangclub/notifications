<?php

namespace iBrand\Notification\Test;

use iBrand\Notification\OfficialAccountTemplateMessage;
use Illuminate\Support\Facades\Notification;
use EasyWeChat\Factory;

class NotificationTest extends BaseTest
{
	/** @test */
	public function testMessage()
	{
		$user = User::find(1);

		Notification::fake();

		$config = [
			'app_id' => 'wx3cf0f39249eb0exxx',
			'secret' => 'f1c242f4f28f735d4687abb469072xxx',
		];
		$data   = [
			'touser'      => 'user-openid',
			'template_id' => 'template-id',
			'url'         => 'https://easywechat.org',
			'data'        => [
				'key1' => 'VALUE',
				'key2' => 'VALUE2',
			],
		];
		$openid = 'ofeBM5ZyivQHt-eQH2qdDGh0PLJM';
		$handle = Factory::officialAccount($config);

		$user->notify(new OfficialAccountTemplateMessage($data, $openid, $handle));

		// 断言通知已经发送给了指定用户...
		Notification::assertSentTo(
			[$user], OfficialAccountTemplateMessage::class
		);
	}
}