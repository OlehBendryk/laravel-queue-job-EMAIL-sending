<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmailSending extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'msg_template',
        'send_at',
        'status',
    ];

    protected $casts = [
        'send_at' => 'datetime'
    ];

    /**
     * @return BelongsTo
     */
    public function groups():BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function msg_templates():BelongsTo
    {
        return $this->belongsTo(MessageTemplate::class, 'msg_template', 'id');
    }
}
