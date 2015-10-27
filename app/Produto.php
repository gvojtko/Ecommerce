 <?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;
use Input, Validator, Auth, Redirect;

class Produto extends Model
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
