<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'jenis_cuti_id', 'tanggal_mulai', 'tanggal_selesai', 'total_hari', 'alasan_cuti', 'status_supervisor', 'status_manager', 'status_akhir'])]
class PengajuanCuti extends Model
{
    // Relasi ke User (Siapa yang mengajukan)
    // public function user() {
    //     return $this->belongsTo(User::class);
    // }

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    // Relasi ke Jenis Cuti
    public function jenisCuti() {
        return $this->belongsTo(JenisCuti::class);
    }
}
