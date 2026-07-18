<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'project_id',
        'event_id',
        'amount',
        'currency',
        'status',
        'type', // 'general', 'project', 'event'
        'transaction_ref',
        'payment_method',
        'message',
    ];

    /**
     * Default attribute values.
     *
     * @var array<string, mixed>
     */
    protected $attributes = [
        'status' => 'pending',
        'currency' => 'RWF',
    ];

    /**
     * Get the user/donor associated with the order.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the project associated with this donation/payment.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the event associated with this donation/payment.
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
    
    /**
     * Scope to quickly filter completed orders.
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}
