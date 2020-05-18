<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagCreateRequest;
use App\Http\Requests\Admin\TagUpdateRequest;
use App\Models\Admin\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
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
      
       
        if (!empty(request()->buscar)) 
        {
            $tags = Tag::where('nombre', 'like', '%'.request()->buscar.'%' )
                    ->orderBy('id', 'desc')
                    ->paginate(10);
            return view('admin.tags.index', compact('tags'));
        }
        else
        {
            $tags = Tag::orderBy('id', 'desc')->paginate(10);
            return view('admin.tags.index', compact('tags'));
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('admin\tags\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagCreateRequest $request)
    {
        $tags = Tag::firstOrNew(
            [           
            'nombre' => $request->nombre,           
        ]);
        $tags->save();
        // return response()->json(['success' => "Datos guardados correctamente"], 200);
      
        return redirect()->route('tags.index');
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
        $tag = Tag::findOrFail($id);
        
        return view('admin\tags\editar', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, $id)
    {
        $tag= Tag::findOrFail($id);
        
        $tag->nombre = $request->nombre;      
        $tag->save();
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        // $tag->delete_at = Auth()->user()->id;
        $tag->delete();

        return redirect()->route('tags.index');
    }
}
