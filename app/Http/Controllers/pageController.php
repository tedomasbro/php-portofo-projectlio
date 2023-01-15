<?php

namespace App\Http\Controllers;

use App\Models\page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class pageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = page::orderBy('title', 'asc')->get();
        return view('dashboard.pagesh.index')->with('data', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pagesh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('value', $request->value);
        $request->validate(
            [
                'title' => 'required',
                'value' => 'required',
            ],
            [
                'title.required' => 'Diisi ye',
                'value.required' => 'Wajib Lau isi',
            ]
        );

        $data = [
            'title' => $request->title,
            'value' => $request->value,
        ];
        page::create($data);

        return redirect()->route('pagesh.index')->with('success', 'Success to Input data');
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
        $data = page::where('id', $id)->first();
        return view('dashboard.pagesh.edit')->with('data', $data);
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
        $request->validate(
            [
                'title' => 'required',
                'value' => 'required',
            ],
            [
                'title.required' => 'Diisi ye',
                'value.required' => 'Wajib Lau isi',
            ]
        );

        $data = [
            'title' => $request->title,
            'value' => $request->value,
        ];
        page::where('id', $id)->update($data);

        return redirect()->route('pagesh.index')->with('success', 'Succes Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        page::where('id', $id)->delete();
        return redirect()->route('pagesh.index')->with('success', 'Succes Delete Data');
    }
}
