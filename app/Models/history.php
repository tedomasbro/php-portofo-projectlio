<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    protected $table = "histories";
    protected $fillable = ['title', 'type', 'start_date', 'end_date', 'info1', 'info2', 'info3', 'content'];

    protected $append = ['start_date_idn', 'end_date_idn'];

    public function getStartDateIdnAttribute(){
        return Carbon::parse($this->attributes['start_date'])->translatedFormat('d F Y');
    }

    public function getEndDateIdnAttribute(){
        if ($this->attributes['end_date']) {
            return Carbon::parse($this->attributes['end_date'])->translatedFormat('d F Y');
        } else {
            return '';
        }
        
    }
}
