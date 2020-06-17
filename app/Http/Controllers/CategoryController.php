<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;

use Auth;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::paginate(20);
        return view('categories.index')->with('cats', $cats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $cat = new Category;
        $cat->name_category = $request->name_category;
       
        if($request->hasFile('image')) {
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $cat->image = "imgs/".$file;
        }

        if($cat->save()) {
            return redirect('categories')->with('message', 'La categoría: '.$cat->name_category.' fué adicionada con éxito');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        $id = $request->get("id");
        $query = Category::find($id);
        return view("categories.show", compact("query"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::find($id);
        return view('categories.edit')->with('cat', $cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $cat = Category::find($id);
        $cat->name_category = $request->name_category;
       
        if($request->hasFile('image')) {
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $cat->image = "imgs/".$file;
        }

        if($cat->save()) {
            return redirect('categories')->with('message', 'La categoría: '.$cat->name_category.' fué modificada con éxito');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        if ($cat->delete()) {
            return redirect('categories')->with('message', 'La categoría '.$cat->name_category.' fue eliminada con éxito!');
        }
    }
}
