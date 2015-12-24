<?php

namespace estoque\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Input, Validator, Auth, Redirect;
use \estoque\Models\Admin\AdmCategory as AdmCategory;

class AdmProduct extends Model
{
    protected $table = 'e_products';  
    protected $fillable = ['name', 'description', 'slug', 'cart_description'];
    protected $guarded = ['id'];

    public static function validator($input){

        $rules = [
            'nome'    =>'required'
        ];

        return Validator::make($input,$rules);
    }

}
