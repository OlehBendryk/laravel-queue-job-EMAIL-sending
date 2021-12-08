<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmailSended extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'msg_id'
    ];

    public function groups():BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function msg_templates(): BelongsTo
    {
        return $this->belongsTo(MessageTemplate::class, 'msg_id');
    }
}
