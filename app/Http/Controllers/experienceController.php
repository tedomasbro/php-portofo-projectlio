<?php

namespace App\Http\Controllers;

use App\Models\history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class experienceController extends Controller
{
    function __construct()
    {
        $this->_type = 'experience';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = history::where('type', $this->_type)->orderBy('end_date', 'desc')->get();
        return view('dashboard.experience.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.experience.create');
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
        Session::flash('info1', $request->info1);
        Session::flash('start_date', $request->start_date);
        Session::flash('end_date', $request->end_date);
        Session::flash('content', $request->content);
        $request->validate(
            [
                'title' => 'required',
                'info1' => 'required',
                'start_date' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Title is Required!!!',
                'info1.required' => 'Company Name is Required!!!',
                'start_date.required' => 'Start Date is Required!!!',
                'content.required' => 'Title Required!!!'
            ]
        );

        $data = [
            'title' => $request->title,
            'info1' => $request->info1,
            'type' => $this->_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'content' => $request->content,
        ];
        history::create($data);

        return redirect()->route('experience.index')->with('success', 'Success to Input data');
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
        $data = history::where('id', $id)->where('type', $this->_type)->first();
        return view('dashboard.experience.edit')->with('data', $data);
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
                'info1' => 'required',
                'start_date' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Title is Required!!!',
                'info1.required' => 'Company Name is Required!!!',
                'start_date.required' => 'Start Date is Required!!!',
                'content.required' => 'Title Required!!!'
            ]
        );

        $data = [
            'title' => $request->title,
            'info1' => $request->info1,
            'type' => $this->_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'content' => $request->content,
        ];
        history::where('id', $id)->where('type', $this->_type)->update($data);

        return redirect()->route('experience.index')->with('success', 'Success to Edit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        history::where('id', $id)->where('type', $this->_type)->delete();
        return redirect()->route('experience.index')->with('success', 'Succes Delete Data');
    }
}
