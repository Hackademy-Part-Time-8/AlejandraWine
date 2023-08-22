<?php

namespace App\Http\Controllers;

use App\Models\Wine;
use Exception;
use Illuminate\Http\Request;

class WineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $wines = Wine::orderBy('name')->paginate(3);
        if ($request->ajax()) {
            $ret = '';

            foreach ($wines as $wine) {
                $atts = [
                    'wine' => $wine
                ];
                $ret .= view ('components.wine', $atts)->render();
            }
            return response()->json (['scrollHTML' => $ret]);
        }

        return view ('wines.index', compact('wines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('wines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $wine = Wine::create ([
                 'name' => $request->name,
                 'description' => $request->description,
                 'winery' => $request->winery,
                 'price' => $request->price,
                 'vol' => $request->vol
             ]);
             $wine->saveOrFail ();

        }
        catch(Exception $e) {
            return redirect()->route('wine.index')->with ('code', 240)->with ('message', 'El vino NO se ha podido guardar');
        }



        return redirect()->route('wine.index')->with ('code', 0)->with ('message', 'El vino se ha guardado correctamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(Wine $wine)
    {
        //
        return view('wines.show',compact('wine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wine $wine)
    {
        //
        return view('wines.edit',compact('wine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wine $wine)
    {
        //
        try {
            $wine->name = $request->name;
            $wine->description = $request->description;
            $wine->winery = $request->winery;
            $wine->price = $request->price;
            $wine->vol = $request->vol;

            $wine->saveOrFail();
        }
        catch(Exception $e) {
            return redirect()->route('wine.index')->with ('code', 240)->with ('message', 'Your wine could not be updated in our online winery!');
        }

        return redirect()->route('wine.index')->with ('code', 0)->with ('message', 'Your wine has been updated in our online winery');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wine $wine)
    {
        //
        try{
            $wine->deleteOrFail();
            return redirect()->route('wine.index')->with('code',0)->with('message','Your wine has been removed!');
        }
        catch(Exception $e){
            return redirect()->route('wine.index')->with('code',240)->with('message','Your wine could not bee removed!');
        }
    }
}
