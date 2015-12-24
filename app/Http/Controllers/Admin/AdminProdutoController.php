<?php

namespace estoque\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Facades\DB;
use estoque\Http\Requests;
use estoque\Http\Controllers\Controller;
use Input, Validator, Auth, Redirect;
use estoque\Http\Requests\AdminProdutoRequest;

use estoque\Models\Admin\AdmProduct as AdmProduct;


class AdminProdutoController extends Controller
{   

    public function __construct()
    {
       
    }
        /**
     * Product List
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        try {

            //Limita número de itens por página
            ( $request->input('per_page')) ?  $perPage = $request->input('per_page') :  $perPage = 10;

            if ($request->input('filtro_nome')) 
            {
                $produtos = AdmProduct::orderBy('id', 'DESC')->where('nome', 'like', '%'.$request->input('filtro_nome').'%')
                                            ->paginate($perPage);                
            }else{

                $produtos = AdmProduct::orderBy('id', 'DESC')->paginate($perPage);                
            }

            return view('admin.produtos.home')->with('produtos', $produtos);
            
        } catch (Exception $e) {
            echo $e->getMessage();
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminProdutoRequest $request)
    {
        try {

            if ($request->isMethod('post')) 
            {   

                $params = $request->all();
                $produto = new AdmProduct($params);
                if($produto->save())
                {
                    $request->session()->flash('alert-success', 'Produto cadastrado com sucesso!');
                    return redirect('/admin/produtos/novo');
                }
                else
                {
                    return 'fail';
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Product Details
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
       
        try {
            $produto = AdmProduct::find($id);

            if(!$produto OR empty($produto))
            {
                return view('admin.404')
                    ->with('page_title', 'OOps!');
            }

            return view('admin.produtos.show')
                    ->with('page_title', 'Detalhes do Produto')
                    ->with('produto', $produto);
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        $produto = AdmProduct::find($id);
        return view('admin.produtos.edit')->with('produto', $produto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = AdmProduct::find($id);
        $produto->save();
        $request->session()->flash('alert-success', 'Produto editado com sucesso!');
        return redirect('/admin/produtos/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $produto = AdmProduct::find($id);

        if ($produto->delete())
        {
            $request->session()->flash('alert-success', 'Produto excuido com sucesso!');
            return redirect('/admin/produtos/');

        }else{
             $request->session()->flash('alert-error', 'Erro');
            return redirect('/admin/produtos/');
        }
    }
}
