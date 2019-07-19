<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function complete()
    {
        $this->update(['is_complete' => 1]);
    }

    public function uncomplete()
    {
        $this->update(['is_complete' => 0]);
    }

    public function isComplete()
    {
        return $this->is_complete === 1;
    }
}
