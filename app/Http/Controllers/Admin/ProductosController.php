<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductoofertasCreateRequest;
use App\Http\Requests\Admin\ProductoofertasUpdateRequest;
use App\Http\Requests\Admin\ProductosCreateRequest;
use App\Http\Requests\Admin\ProductosUpdateRequest;
use App\Jobs\ProcessimageJob;
use App\Models\Admin\Producto;
use App\Models\Admin\Productocategoria;
use App\Models\Admin\Productofoto;
use App\Models\Admin\Productooferta;
use App\Models\Admin\Productotag;
use App\Models\Admin\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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

    private function periodoId(Request $request)
    {
        return $request->session()->get('periodoactual', 0);
    }


    private function empresaId()
    {
        return Session::get('empresaactual', 0);
    }


    public function index()
    {


        $categorias = Productocategoria::get();

        $productosenoferta = Productooferta::get();
        $arrayofertas = [];
        foreach ($productosenoferta as $producto) {
            array_push($arrayofertas, $producto->producto_id);
        }


        if (!empty(request()->buscar)) {
            $productos = Producto::where('nombre', 'like', '%' . request()->buscar . '%')
                ->where('empresa_id', $this->empresaId())
                ->orderBy('id', 'desc')
                ->paginate(10);
            return view('admin.productos.index', compact('productos', 'categorias', 'arrayofertas'));
        } else {
            $productos = Producto::orderBy('id', 'desc')
                ->where('empresa_id', $this->empresaId())
                ->paginate(10);


            return view('admin.productos.index', compact('productos', 'categorias', 'arrayofertas'));
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

        return view('admin.productos.create', compact('categorias', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductosCreateRequest $request)
    {

        $catedoria = Productocategoria::where('id', $request->categoriasId)->first();
        if ($catedoria != null || $catedoria != "") {
            $catedoriaid = $catedoria->id;
        } else {
            $categorias = Productocategoria::firstOrNew(
                [
                    'empresa_id' => $this->empresaId(),
                    'nombre' => $request->categoriasName,
                ],
                [
                    'created_by' => Auth()->user()->id,
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


        $tag = Tag::where('id', $request->tagsId)->first();
        if ($tag != null || $tag != "") {
            $tagid = $tag->id;
        } else {

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
        if (isset($files)) {
            foreach ($files as $file) {

                //   $filename = strtolower( time().'.'. $file->getClientOriginalExtension());

                $input['fotoproducto'] = strtolower(uniqid() . '.' . $file->getClientOriginalExtension());
                $destinationPath = public_path('/images');
                $file->move($destinationPath, $input['fotoproducto']);

                //   \Storage::disk('img_productos')->put($filename,  \File::get($file));

                $fotoproducto = Productofoto::firstOrNew(
                    [
                        'empresa_id' => $this->empresaId(),
                        'producto_id' => $productos->id,
                        'nombre' =>   $input['fotoproducto'],
                        'url' =>  'img_productos' . '/' . $input['fotoproducto'], //'img_productos'.'/'.$filename,
                    ],
                    [
                        'created_by' => Auth()->user()->id,
                    ]
                );
                $fotoproducto->save();

                ProcessimageJob::dispatch($fotoproducto);
            }
        }
        //    

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
        $fotosproducto = Productofoto::where('producto_id', $producto->id)->get();
        foreach ($fotosproducto as $foto) {

            $exists = Storage::disk('img_productos')->exists($foto->nombre);
        }
        return view('admin.productos.editar', compact('producto', 'exists', 'tag'));
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
        $catedoria = Productocategoria::where('id', $request->categoriasId)->first();

        if ($catedoria->id == $request->categoriasId && $catedoria->nombre ==  $request->categoriasName) {
            $catedoriaid = $request->categoriasId;
        } else {
            $categorias = Productocategoria::firstOrNew(
                [
                    'empresa_id' => $this->empresaId(),
                    'nombre' => $request->categoriasName,
                ],
                [
                    'updated_by' => Auth()->user()->id,
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

        $tag = Tag::where('id', $request->tagId)->first();
        if ($tag->id == $request->tagId && $tag->nombre ==  $request->tagName) {
            $tagid = $request->tagId;
        } else {
            $tags = Tag::firstOrNew([
                'nombre' => $request->tagName,
            ]);
            $tags->save();
            $tagid = $tags->id;
        }

        $productotag = Productotag::where('producto_id', $producto->id)->first();
        $productotag->tag_id = $tagid;
        $productotag->save();

        
        $files = $request->file('fotoproducto');
        if (isset($files)) {
            //    $fotos = Productofoto::where("producto_id", $producto->id )->get();
            //         foreach ($fotos as $foto) {
            //             $foto->delete();
            //         }
            Productofoto::where("producto_id", $producto->id)->delete();

            foreach ($files as $file) {

                $input['fotoproducto'] = strtolower(uniqid() . '.' . $file->getClientOriginalExtension());
                $destinationPath = public_path('/images');
                $file->move($destinationPath, $input['fotoproducto']);
                $fotoproducto = Productofoto::firstOrNew(
                    [
                        'empresa_id' => $this->empresaId(),
                        'producto_id' => $producto->id,
                        'nombre' =>   $input['fotoproducto'],
                        'url' =>  'img_productos' . '/' . $input['fotoproducto'], //'img_productos'.'/'.$filename,
                    ],
                    [
                        'updated_by' => Auth()->user()->id,
                    ]
                );
                $fotoproducto->save();
                ProcessimageJob::dispatch($fotoproducto);
            }
        }
           
        return redirect()->route('productos.index')->with('info', 'Datos modificados satisfactoriamente...');
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
        $fotos = Productofoto::where("producto_id", $productos->id)->delete();


        if ($productos) {
            $productos->deleted_at = Auth()->user()->id;
            $fotos->deleted_at = Auth()->user()->id;

            Producto::findOrFail($id)->delete();
            Productofoto::where("producto_id", $productos->id)->delete();

            return redirect()->back()->with("info", "Se han eliminado el producto");
        } else {
            return redirect()->back()->with("error", "No se ha encontrado el producto");
        }

        // return redirect()->route('productos.index');

    }

    public function getImagenes(Request $request)
    {

        $fotosproducto = Productofoto::where('producto_id', $request->id)->get();
        foreach ($fotosproducto as $foto) {

            $exists = Storage::disk('img_productos')->exists($foto->nombre);
            if ($exists) {
                return response()->json(["data", $fotosproducto], 200);
            } else {

                return response()->json(["data", "No existe archivo"], 422)->with('error', 'No existe imagen de este producto');
            }
        }
    }

    public function productosofertas(ProductoofertasCreateRequest $request)
    {

        $ofertas = Productooferta::firstOrNew(
            [
                'empresa_id' => $this->empresaId(),
                'producto_id' => $request->idproducto,
            ],
            [
                'preciooferta' => $request->preciooferta,
                'diainicio' => $request->diainicio,
                'horainicio' => $request->horainicio,
                'diafin' => $request->diafin,
                'horafin' => $request->horafin,
                'created_by',
            ]
        );
        $ofertas->save();

        return response()->json('success', 200);
    }

    public function productosofertaseditar(Request $request)
    {

        $oferta = Productooferta::where('producto_id', $request->idproducto)->first();
        return response()->json($oferta, 200);
    }

    public function productosofertasupdate(ProductoofertasUpdateRequest $request)
    {

        $ofertas = Productooferta::findOrFail($request->idoferta);
        // $ofertas->empresa_id  = $this->empresaId();
        // $ofertas->producto_id  = $request->idproducto;
        $ofertas->preciooferta  = $request->preciooferta;
        $ofertas->diainicio  = $request->diainicio;
        $ofertas->horainicio  = $request->horainicio;
        $ofertas->diafin  = $request->diafin;
        $ofertas->horafin  = $request->horafin;
        $ofertas->updated_by = Auth()->user()->id;

        $ofertas->save();

        return response()->json('success', 200);
    }

    public function productosofertasdelete(Request $request)
    {

        $ofertas = Productooferta::findOrFail($request->ofertaid);
        $ofertas->deleted_at = Auth()->user()->id;
        $ofertas->save();

        return response()->json('success', 200);
    }
}
