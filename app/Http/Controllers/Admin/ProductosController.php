<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductosCreateRequest;
use App\Http\Requests\Admin\ProductosUpdateRequest;
use App\Models\Admin\Producto;
use App\Models\Admin\Productocategoria;
use App\Models\Admin\Productofoto;
use App\Models\Admin\Productotag;
use App\Models\Admin\Tag;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function periodoId( Request $request  ) {
        return $request->session()->get('periodoactual', 0);
    }  
    

    private function empresaId( Request $request ) {
        // return $request->session()->get('empresaactual', 0);
        return "PEDIDOS SAC";
    }

    public function index()
    {
        
       
        $categorias = Productocategoria::get();
        if (!empty(request()->buscar)) 
        {
            $productos = Producto::where('nombre', 'like', '%'.request()->buscar.'%' )
                    ->orderBy('id', 'desc')
                    ->paginate(10);
            return view('admin.productos.index', compact('productos','categorias'));
        }
        else
        {
            $productos = Producto::orderBy('id', 'desc')->paginate(10);
            

            return view('admin.productos.index', compact('productos','categorias'));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Productocategoria::get();
        $tags = Tag::get(); 
        
        return view('admin.productos.create', compact('categorias','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductosCreateRequest $request)
    {
       
        $productos = Producto::firstOrNew(
            [
                'empresa_id' => 1,
                'categoria_id' => $request->categoriaid,
                'nombre' => $request->nombre,
                ],
                [
                    
                    'descripcion' => $request->descripcion,
                    'precio' => $request->precio,
                    'codigo' => $request->codigo,
                    'stock' => $request->stock,
                    'created_by' => Auth()->user()->id,
            ]
         );     
         $productos->save();

         $tags = Tag::firstOrNew([
            'nombre' => $request->nombre,
         ]);
         $tags->save();

        $productotag = new Productotag();
        $productotag->producto_id = $productos->id;
        $productotag->tag_id = $request->tagid;
        $productotag->save();               
         

        $files = $request->file('fotoproducto');
         if ( count($files) > 0) {
                
        foreach($files as $file){

            $empresa = $this->empresaId( $request );
            $extension = strtolower( $file->getClientOriginalExtension() ) ;
            $filename = uniqid().'_'.$file->getClientOriginalName();
            $path = $files->store('public');
            $forder =  \Storage::disk('img_productos');
            // $file->move($destinationPath.'/' , $filename
            if (   \Storage::disk('img_productos')->put($filename,  \File::get($file)) ) { 
    
                $fotoproducto = Productofoto::firstOrNew([               
                    'empresa_id'=>1,
                    'producto_id'=> $productos->id,
                    'nombre'=>  $filename,
                    'url' =>  $path,//'img_productos'.'/'.$filename,
                ],
                [
                    'created_at' => Auth()->user()->id,
                ] );
                $fotoproducto->save();
            } 
            
            
        }      
    }  
        
        return redirect()->route('productos.index');
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Productocategoria::get();
        $producto = Producto::findOrFail($id);
        return view('admin.productos.editar', compact('categorias', 'producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductosUpdateRequest $request, $id)
    {
        $productos = Producto::findOrFail($id);
        $productos->empresa_id = 1;
        $productos->categoria_id = $request->categoriaid;
        $productos->codigo = $request->codigo;
        $productos->nombre = $request->nombre;
        $productos->descripcion =  $request->descripcion;
        $productos->precio =  $request->precio;
        $productos->stock = $request->stock;
        $productos->updated_by =  Auth()->user()->id;
        $productos->save();
        return    redirect()->route('productos.index');  
        //  return response()->json(['success' => "Datos guardados correctamente"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productos = Producto::findOrFail($id);
        $fotos = Productofoto::where("producto_id", $productos->id )->delete();
       
        
        if ( $productos ) {
            $productos->deleted_at = Auth()->user()->id;
            $fotos->deleted_at = Auth()->user()->id;
            
            Producto::findOrFail($id)->delete();
            Productofoto::where("producto_id", $productos->id )->delete();

            return redirect()->back()->with("info", "Se han eliminado el producto");
        }   
        else {
            return redirect()->back()->with("error", "No se ha encontrado el producto");
        }

        // return redirect()->route('productos.index');
    
    }
}
