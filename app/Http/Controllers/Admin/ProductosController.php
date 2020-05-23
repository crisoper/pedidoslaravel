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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

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
    

    private function empresaId() {
        return Session::get( 'empresaactual', 0 );
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

        $catedoria = Productocategoria::where('id' , $request->categoriasId)->first();
        if( $catedoria != null || $catedoria != "" ){
            $catedoriaid = $catedoria->id;
            
        }else{
            $categorias = Productocategoria::firstOrNew(
                [
                   'empresa_id'=> $this->empresaId(),
                    'nombre'=> $request->categoriasName,
                ],
                [
                    'created_by'=> Auth()->user()->id,
                ]
            );
            
            $categorias->save();
            $catedoriaid = $categorias->id;
        }

        $productos = Producto::firstOrNew(
            [
                'empresa_id' => $this->empresaId(),
                'categoria_id' => $catedoriaid,
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


         $tag = Tag:: where('id', $request->tagsId )->first();
         if( $tag != null || $tag != ""){
             $tagid = $tag->id;
         }else{

        $tags = Tag::firstOrNew([
                'nombre' => $request->tagName,
             ]);
             $tags->save();
             $tagid = $tags->id; 
         }

        $productotag = Productotag::firstOrNew([
            'producto_id' => $productos->id,
            'tag_id' => $tagid,
        ]);
        $productotag->save();  

        $files = $request->file('fotoproducto');       
        if ( count($files) > 0) {                
        foreach($files as $file){                
            $extension = strtolower( $file->getClientOriginalExtension() ) ;
            $filename = uniqid().'_'.$file->getClientOriginalName();           
            if (   \Storage::disk('img_productos')->put($filename,  \File::get($file)) ) { 
                $redimencionImg = Image::make($file->path());
                $redimencionImg->fit(350, 300, function ($constraint) {
                    $constraint->upsize();
                });
                $redimencionImg->save(storage_path('app/public/img_productos').'/'.$filename);

                $fotoproducto = Productofoto::firstOrNew([               
                    'empresa_id'=> $this->empresaId(),
                    'producto_id'=> $productos->id,
                    'nombre'=>  $filename,
                    'url' =>  'img_productos'.'/'.$filename,
                ],
                [
                    'created_at' => Auth()->user()->id,
                ] );
                $fotoproducto->save();
            } 
        }      
    }  
        
        return redirect()->route('productos.index')->with('El producto se ha registrado satisfactoriamente...');
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
        $tag = $producto->tags->first();
        $fotosproducto = Productofoto::where('producto_id', $producto->id  )->get();
        foreach ($fotosproducto as $foto) {
          
            $exists = \Storage::disk('img_productos')->exists( $foto->nombre ); 
                       
        }
        return view('admin.productos.editar', compact('producto','exists','tag'));
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
        $catedoria = Productocategoria::where('id' , $request->categoriasId)->first();
        
        if( $catedoria->id == $request->categoriasId && $catedoria->nombre ==  $request->categoriasName  ){
            $catedoriaid = $request->categoriasId;            
        }else{
            $categorias = Productocategoria::firstOrNew(
                [
                   'empresa_id'=> $this->empresaId(),
                    'nombre'=> $request->categoriasName,
                ],
                [
                    'updated_by'=> Auth()->user()->id,
                ]
            );
            
            $categorias->save();
            $catedoriaid = $categorias->id;
        }

        $producto = Producto::findOrFail($id);
        $producto->empresa_id =  $this->empresaId();
        $producto->categoria_id = $catedoriaid;
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->descripcion =  $request->descripcion;
        $producto->precio =  $request->precio;
        $producto->stock = $request->stock;
        $producto->updated_by =  Auth()->user()->id;
        $producto->save();   

        $tag = Tag:: where('id', $request->tagId )->first();               
        if(  $tag->id == $request->tagId && $tag->nombre ==  $request->tagName ){
            $tagid = $request->tagId;
            
        }else{
            
            $tags = Tag::firstOrNew([
                'nombre' => $request->tagName,
                ]);
                $tags->save();
                $tagid = $tags->id; 
            }
            
       $productotag = Productotag::where('producto_id', $producto->id )->first();
       $productotag->tag_id = $tagid;
       $productotag->save();  
      
        $files = $request->file('fotoproducto');      
       
        if ( $files != null || $files != "" ) {            
            $fotosdelete = Productofoto::where("producto_id", $producto->id )->get();
            foreach($fotosdelete as $foto){
                $foto->delete();
            }         
               if($request->hasFile('fotoproducto')){
                foreach($files as $file){                
                    $extension = strtolower( $file->getClientOriginalExtension() ) ;
                    $filename = uniqid().'_'.$file->getClientOriginalName();           
                    if (   \Storage::disk('img_productos')->put($filename,  \File::get($file)) ) { 
                        $redimencionImg = Image::make($file->path());
                        $redimencionImg->fit(350, 300, function ($constraint) {
                            $constraint->upsize();
                        });
                        $redimencionImg->save(storage_path('app/public/img_productos').'/'.$filename);
        
                        $fotoproducto = Productofoto::firstOrNew([               
                            'empresa_id'=> $this->empresaId(),
                            'producto_id'=> $producto->id,
                            'nombre'=>  $filename,
                            'url' =>  'img_productos'.'/'.$filename,
                        ],
                        [
                            'created_at' => Auth()->user()->id,
                        ] );
                        $fotoproducto->save();
                    } 
                }
               }
     
               
            }
            return redirect()->route('productos.index')->with('info','Datos modificados satisfactoriamente...');  
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

    public function getImagenes(Request $request){
     
        $fotosproducto = Productofoto::where('producto_id', $request->id  )->get();
        foreach ($fotosproducto as $foto) {
          
            $exists = \Storage::disk('img_productos')->exists( $foto->nombre ); 
            if ($exists) {
                return response()->json(["data", $fotosproducto], 200);
            }else{
                
                return response()->json(["data", "No existe archivo"], 422)->with('error', 'No existe imagen de este producto');
            }
        }
    }
}
