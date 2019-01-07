<?php

namespace iBrand\Notification;

interface BaseNotification
{
	public function toUser($user);

	public function getMessage();
}