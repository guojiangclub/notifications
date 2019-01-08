<?php

namespace iBrand\Notification\Test;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
	use Notifiable;

	protected $guarded = ['id'];

	public function __construct(array $attributes = [])
	{
		parent::__construct($attributes);

		$this->setTable(config('ibrand.app.database.prefix', 'ibrand_') . 'user');
	}
}