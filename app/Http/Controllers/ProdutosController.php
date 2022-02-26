<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Produtos;

class ProdutosController extends Controller
{
    public function index(Request $request)
    {
        $produtos = Produtos::all();
        return view('produtos.index', compact('produtos'));
    }

    public function cadastro(Request $request)
    {
        return view('produtos.cadastro');
    }

    public function salvar(Request $request)
    {
       $request->validate([
        'preco' => 'required',
        'descricao' => 'required', 
        'nome' => 'required', 
        'image' => 'required|image'
       ], [
        'preco.required' => 'O preco do produtos é obrigatorio',
        'descricao.required' => 'A descrição do produto é obrigatoria', 
        'nome.required' => 'O nome da imagem é obrigatoria', 
        'image.required' => 'É obrigatorio escolher uma image',
        'image.image' => 'imagem invalida'

        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $image =  $request->image;
            $path = Storage::disk('public')->put("produtos", $image);

            $data['image'] = Storage::url($path);
        }
        Produtos::create($data);
        return redirect(route('listar'));

    }

    public function destroy($id)
    {
        $produtos = Produtos::findOrFail($id);
        $produtos->delete();

        return redirect(route('listar'));
    }

    public function editar(Produtos $produtos)
    
    {
        return view('produtos.editar', compact('produtos'));

    }

    public function update(Request $request, Produtos $produtos)
    {
        $request->validate([
            'preco' => 'required',
            'descricao' => 'required', 
            'nome' => 'required', 
            'image' => 'image'
           ], [
            'preco.required' => 'O preco do produtos é obrigatorio',
            'descricao.required' => 'A descrição do produto é obrigatoria', 
            'nome.required' => 'O nome da imagem é obrigatoria', 
            'image.image' => 'imagem invalida'
            ]);
    
            $data = $request->all();
    
            if ($request->hasFile('image')) {
                unlink(public_path($produtos->image));
                $image =  $request->image;
                $path = Storage::disk('public')->put("produtos", $image);
                
                $data['image'] = Storage::url($path);
            }

            $produtos->update($data);
            return redirect()->route('listar');
    }
}
