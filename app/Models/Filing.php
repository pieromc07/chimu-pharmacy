<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Filing
 *
 * @property $id
 * @property $filing
 * @property $created_at
 * @property $updated_at
 *
 * @property Product[] $products
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Filing extends Model
{
    
    static $rules = [
		'filing' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['filing'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'filing_id', 'id');
    }
    

}
