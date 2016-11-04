<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoriesCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesCreateRequest $request)
    {

        Category::create($request->all());

        $feedback = 'The category has been created';
        $class = 'bg-success';
        $this->getSessionFlash($feedback, $class);

        return redirect('/admin/categories');

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

        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));

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

        $category = Category::findOrFail($id);

        $category->update($request->all());

        $feedback = 'The category has been updated';
        $class = 'bg-success';
        $this->getSessionFlash($feedback, $class);

        return redirect('/admin/categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Category::findOrFail($id)->delete();

        $feedback = 'The category has been deleted';
        $class = 'bg-danger';
        $this->getSessionFlash($feedback, $class);

        return redirect('/admin/categories');

    }

    public function getSessionFlash($feedback, $class) {

        Session::flash('action_feedback', $feedback);
        Session::flash('action_class', $class);

    }

}
