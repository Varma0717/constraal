<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicketReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'support_ticket_id',
        'user_id',
        'admin_id',
        'message',
        'type',
    ];

    /** Relationships */
    public function ticket()
    {
        return $this->belongsTo(SupportTicket::class, 'support_ticket_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /** Scopes */
    public function scopeCustomerReplies($query)
    {
        return $query->where('type', 'customer');
    }

    public function scopeAdminReplies($query)
    {
        return $query->where('type', 'admin');
    }
}
