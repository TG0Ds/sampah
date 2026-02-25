<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DataTagihan extends Model
{

    protected $table = 'data_tagihan';

    protected $fillable = [
        'billing_start_date',
        'due_date',
        'paid_date',
        'total_amount',
        'paid_amount',
        'user_id',
    ];

    protected $casts = [
        'billing_start_date' => 'date',
        'due_date' => 'date',
        'paid_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getStatusAttribute()
    {
        if ($this->paid_date) {
            return $this->paid_date > $this->due_date ? 'paid_late' : 'paid';
        }

        return now()->gt($this->due_date) ? 'overdue' : 'unpaid';
    }

    public function getStatusColorAttribute()
    {
        return [
            'unpaid' => 'bg-gray-100 text-gray-800',
            'overdue' => 'bg-red-100 text-red-800',
            'paid_late' => 'bg-yellow-100 text-yellow-800',
            'paid' => 'bg-green-100 text-green-800',
        ][$this->status] ?? 'bg-gray-100 text-gray-800';
    }
}
