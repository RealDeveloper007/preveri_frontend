<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use App\Category;

class Company extends Model
{
    use Loggable;
    protected $table = 'company';

    protected $fillable = [
        'region_id', 'reg_no', 'category', 'title', 'slug', 'rating', 'search_title', 'legal_organizational_form', 'email', 'total_employees', 'owner_name', 'website', 'logo', 'banner', 'description', 'description_status', 'house_no', 'postal_code', 'city', 'post_office', 'street', 'address', 'status'
    ];
    //
    protected $casts = [
        'region_id' => 'integer',
        'reg_no' => 'integer',
        'category' => 'string',
        'title' => 'string',
        'slug' => 'string',
        'rating' => 'integer',
        'search_title' => 'string',
        'legal_organizational_form' => 'string',
        'total_employees' => 'integer',
        'owner_name' => 'string',
        'website' => 'string',
        'logo' => 'string',
        'banner' => 'string',
        'description' => 'string',
        'description_status' => 'integer',
        'house_no' => 'integer',
        'postal_code' => 'integer',
        'city' => 'string',
        'post_office' => 'string',
        'street' => 'string',
        'address' => 'string',
        'status' => 'integer'
    ];

    public function region()
    {
        return $this->hasOne(Region::class, 'id', 'region_id');
    }

    public function comments()
    {
        return $this->hasMany(CompanyComments::class, 'company_id', 'id')->where('status', 1)->orderBy('created_at', 'desc');
    }

    public function lastcomment()
    {
        return $this->hasOne(CompanyComments::class, 'company_id', 'id')->latest('id')->take(1);
    }

    public function salaries()
    {
        return $this->hasMany(CompanySalaries::class, 'company_id', 'id');
    }

    public function pictures()
    {
        return $this->hasMany(CompanyPicture::class, 'company_id', 'id');
    }

    public function scopeFilter($query)
    {

        if (request()->filled('region_id')) 
        {
            $query->where('region_id', request()->region_id);
        }

        if (request()->filled('category')) 
        {
            $Category = Category::find(request()->category);
            $query->where('category', $Category->title);
        }

        if (request()->filled('rating')) 
        {
            $query->where('rating', request()->rating);
        }

        if (request()->filled('type')) 
        {
            if(request()->type == 1)
            {
                $query->doesntHave('comments');
            } else {
                $query->whereHas('comments');
            }
        }


        return $query->where('status', 1)->paginate(18);
    }
}
