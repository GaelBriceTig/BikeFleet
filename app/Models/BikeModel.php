<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Ramsey\Uuid\Type\Decimal;

use function PHPUnit\Framework\isNull;

class BikeModel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'bike_models';
    protected $fillable = [
        'trademark_id',
        'category_id',
        'material_id',
        'name',
        'description',
        'image'
    ];

    public function bikes()
    {
        return $this->hasMany(Bike::class)->select('id', 'serial_number', 'status_id');
    }

    public function getTrademark()
    {
        return Trademark::where('id', $this->trademark_id)->first();
    }

    public function getMaterial()
    {
        return Material::where('id', $this->material_id)->first();
    }

    public function getCategory()
    {
        return Category::where('id', $this->category_id)->first();
    }
}
