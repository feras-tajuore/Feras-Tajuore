<?php

namespace App\Http\Controllers;

use App\Catogory;
use Illuminate\Http\Request;

class CatogoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catogories.index')->with('catogories',Catogory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catogories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $attributes = $this->validateProject();

        Catogory::create($attributes);
        return redirect()->route('catogory.index');
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
     * @param  int  $catogory
     * @return \Illuminate\Http\Response
     */
    public function edit(Catogory  $catogory)
    {
        return view('catogories.edit', compact('catogory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $catogory
     * @return \Illuminate\Http\Response
     */
    public function update(Catogory $catogory)
    {
        $catogory->update($this->validateProject());

        return redirect()->route('catogory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  catogory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catogory = Catogory::find($id);
        $catogory->delete();
        return redirect()->route('catogory.index');
    }

    /**
     * Validate the specified resource from storage.
     *
     * @var arry
     */
    public function validateProject()
    {
        return request()->validate([
             'name' => ['required', 'min:3']
        ]);
    }
}
