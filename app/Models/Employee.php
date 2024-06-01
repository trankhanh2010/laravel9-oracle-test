<?php

namespace App\Models;

use App\Traits\dinh_dang_ten_truong;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, dinh_dang_ten_truong;
    protected $connection = 'oracle_his';
    protected $table = 'HIS_Employee';
    protected $fillable = [
        'erx_assword',
        'department_id',
        'default_medi_stock_ids',
        'gender_id',
        'branch_id',
        'career_title_id',
    ];
    // protected $attributes = [
    //     'erx_assword' => '*******'
    // ];
    protected $hidden = [
        'erx_password'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function default_medi_stocks()
    {
        return MediStock::whereIn('id', explode(',', $this->default_medi_stock_idsart_ids))->get();
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class,'gender_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function career_title()
    {
        return $this->belongsTo(CareerTitle::class,'career_title_id');
    }

}
