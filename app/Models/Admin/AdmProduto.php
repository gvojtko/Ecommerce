<?php

namespace estoque\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Input, Validator, Auth, Redirect;
use \estoque\Models\Admin\AdmCategory as AdmCategory;

class AdmProduto extends Model
{
    protected $table = 'produtos';	
	protected $fillable = ['nome', 'descricao', 'valor', 'quantidade'];
	protected $guarded = ['id'];

    public static function validator($input){

        $rules = [
            'nome'    =>'required'
        ];

        return Validator::make($input,$rules);
    }

}
