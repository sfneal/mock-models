<?php

namespace Sfneal\Testing\Models;

use Database\Factories\PeopleFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Sfneal\Address\Models\Address;
use Sfneal\Builders\QueryBuilder;
use Sfneal\Models\Model;

class People extends Model
{
    use HasFactory;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];

    protected $table = 'people';
    protected $primaryKey = 'person_id';

    protected $fillable = [
        'person_id',
        'name_first',
        'name_last',
        'email',
        'age',
    ];

    /**
     * Model Factory.
     *
     * @return PeopleFactory
     */
    protected static function newFactory(): PeopleFactory
    {
        return new PeopleFactory();
    }

    /**
     * Query Builder.
     *
     * @param $query
     * @return QueryBuilder
     */
    public function newEloquentBuilder($query)
    {
        return new QueryBuilder($query);
    }

    /**
     * Query Builder method for improved type hinting.
     *
     * @return QueryBuilder|Builder
     */
    public static function query()
    {
        return parent::query();
    }

    /**
     * User's address.
     *
     * @return MorphOne|Address
     */
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    /**
     * Retrieve the 'name_full' attribute.
     *
     * @return string
     */
    public function getNameFullAttribute(): string
    {
        return "{$this->name_first} {$this->name_last}";
    }

    /**
     * Retrieve the 'name_last_first' attribute.
     *
     * @return string
     */
    public function getNameLastFirstAttribute(): string
    {
        return "{$this->name_last}, {$this->name_first}";
    }

    /**
     * Retrieve the 'age' attribute
     *
     * @param $value
     * @return int
     */
    public function getAgeAttribute($value): int
    {
        return intval($value);
    }
}
