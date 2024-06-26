<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $code
 * @property ?string $capital
 * @property ?string $region
 * @property ?string $subregion
 * @property ?string $languages
 */

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = [
        'name',
        'code',
        'capital',
        'region',
        'subregion',
        'languages'
    ];
}
