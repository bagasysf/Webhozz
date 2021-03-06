<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TransactionDetail;

class Transaction extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'total', 'status'];

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
