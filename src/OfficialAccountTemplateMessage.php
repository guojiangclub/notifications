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

use iBrand\Notification\Channels\OfficialAccount;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class OfficialAccountTemplateMessage extends Notification implements ShouldQueue
{
	use Queueable;

	protected $openid;

	protected $data;

	protected $handle;

	public function __construct(array $data, $openid, $handle)
	{
		$this->openid = $openid;
		$this->data   = $data;
		$this->handle = $handle;
	}

	public function via($notifiable)
	{
		return [OfficialAccount::class];
	}

	public function toUser()
	{
		return $this->openid;
	}

	public function handle()
	{
		return $this->handle;
	}

	public function getData()
	{
		return $this->data;
	}
}
