<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    public $table = "donation";

    protected $fillable = [
        'id_donation', 'user_id', 'transaction_id', 'donor_name', 'donor_email', 'donation_type', 'amount', 'note', 'status', 'snap_token'
    ];
    protected $guarded = [];

    /**
     * Set status to Pending
     *
     * @return void
     */
    public function setStatusPending()
    {
        $this->attributes['status'] = 'pending';
        self::save();
    }

    /**
     * Set status to Success
     *
     * @return void
     */
    public function setStatusSuccess()
    {
        $this->attributes['status'] = 'success';
        self::save();
    }

    /**
     * Set status to Failed
     *
     * @return void
     */
    public function setStatusFailed()
    {
        $this->attributes['status'] = 'failed';
        self::save();
    }

    /**
     * Set status to Expired
     *
     * @return void
     */
    public function setStatusExpired()
    {
        $this->attributes['status'] = 'expired';
        self::save();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
