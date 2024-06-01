<?php

namespace App\Models;

use App\Traits\dinh_dang_ten_truong;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory, dinh_dang_ten_truong;
    protected $connection = 'oracle_his';
    protected $table = 'HIS_Machine';

    protected $fillable = [
        'room_id',
        'room_ids',
        'department_id',
    ];

    public function execute_rooms()
    {
        return ExecuteRoom::whereIn('id', explode(',', $this->room_ids))->get();
    }
    public function execute_room()
    {
        return $this->belongsTo(ExecuteRoom::class, 'room_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

}
