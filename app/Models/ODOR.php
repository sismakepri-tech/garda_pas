<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class ODOR extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
        protected $table = 'o_d_o_r_s';  // Explicit table name if not auto-detected

    protected $fillable = ['id_user', 'jenis', 'stakeholder', 'room', 'HP', 'SAJAM', 'BARANGELEKTRONIK', 'NARKOBA', 'BA', 'dokumentasi'];
  

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
