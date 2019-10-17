<?php

namespace App\Http\Controllers;

use App\Imports\CartorioImportar;
use Illuminate\Http\Request;
use App\Models\Cartorio;
use Excel;


class ImportarCartorioController extends Controller
{

    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $objListaCartorio =  Cartorio::orderBy('id')->get();

        $compact_args = [
            'request' => $request,
            'class' => $this,
            'objListaCartorio' => $objListaCartorio,
        ];

        return view('cartorio.importar-base-inicial-excel', $compact_args);
    }

    public function importar_excel(Request $request)
    {

        $path = $request->file('file')->getRealPath();

        if ($request->has('header')) {
            $data = Excel::import($path, function($reader) {})->get()->toArray();
        } else {
            $data = array_map('str_getcsv', file($path));
        }

         dd($data);


        DB::beginTransaction();
        try {
            foreach ($data as $key => $value) {
                echo $value.'</br>';

            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('myroute')->withErrors("Some error message");
        }



        /*//ini_set("memory_limit","256M");

        // Validando o recebimento do arquivo
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $path = $request->file('file')->getRealPath();


        // Realizando a importação do arquivo
        Excel::import(new CartorioImportar(), request()->file('file'));

        //Retortando a resposta de sucesso para o usuário
        return response(
                'Cartórios cadastrados com sucesso',
                Response::HTTP_OK
        );*/
    }
}
