<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RuntimeException;


use App\Http\Requests\BarRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Bar;


class BarController extends Controller
{   /*
    private static $bares= [
        [1,"Le Vignoble Parisien","Parisian elegance and select wines in harmony."],
        [2, "Il Barolo D'Oro","Parisian elegance and select wines in harmony."],
        [3,"Le Bistro du Vin","French charm, oenological delight."],
        [4,"La Toscana Vinoteca","French charm, oenological delight."],
        [5,"Le Cellier Romantique","Love and wines in a corner."],
        [6,"Vinoteca Éclat","Brilliant selection, exquisite delight."],
        [7,"VinoVerso","Verses of wine, shared passion."],
        [8,"Vinópolis","City of wines, discover its essence."],
        [9,"El Rincón de los Sentidos","Captivating flavors, emotions in wines."],
        [10, "El Sabor del Terroir", "Essence of the land."],
        [11,"Cava del Ocaso", "Sunset and wines."],
        [12,"Vinoteca Euforia","Euphoria in glasses."]

    ];*/


    //------------------LISTADO BARES//--------------------------


    //php artisan make:model Bar
    public function index (){
    $user = Auth::user();
    if(!is_null($user)){
        $bares = Bar::orderBy('name')->get();
    }
    else{
        $bares = Bar::orderByDesc('id')->limit(6)->get();
    }

        foreach($bares as $bar){
            if(!isset($bar ->image)|| ($bar->image == '')){
                $bar->image = asset('img/default.png');
            }

        }
        return view ('bars.index', compact('bares'));
    }
    public function indexQB (Request $request){
       $bares = DB::table('bars')->get();//get encuentra esa tabla
        return view ('bars.index',compact('bares'));//["bares" =>$bares]);
    }



    //-----------------------------MOSTRAR BAR//-------------------------------


    public function show(Bar $bar){//creo una variable bar del modelo que es la que le paso con el copmpact
        if(!isset($bar ->image)|| ($bar->image == '')){
            $bar->image = asset('img/default.png');
        }

        return view ('bars.show',compact('bar'));
    }


    /*
        $aux = -1;
        $i=0;
       // dd($bares[$i]);
        while (($aux<0) && ($i < count(self ::$bares))){
            if ($id ==self ::$bares[$i][0]){
                $aux=$i;
            }
            $i++;
        }
    */
    public function showQB($id){
    $bar =DB::table('bars')->find($id);//find busca por id

    if ($bar == null){
    return redirect ()-> route ('bars.index')->with('code','304')->with('message',"Sorry, we couldn't find that bar, try something different.");
        }

        return view ('bars.show',compact('bar'));//["bar" => $bar]); ESTO SE USARIA SI LA CLAVES NO FUERAN IGUAL
    }




//----------------------------//CREAR BAR//-----------------------------------------------



    public function create(){
        return view ('bars.create');
    }

    public function createQB(){
        return view ('bars.create');
    }



//----------------------------//GUARDAR BAR-//---------------------------------------------


    public function store(BarRequest $request){
        $image = '';
        if($request ->hasFile('image')){
            $image = Storage::url($request->file('image')->store('public/bars'));
        }
        $bar = Bar::create([
            'name'          => $request -> name,
            'description'   => $request -> description,
            'image'         => $image
        ]);
        $bar->saveOrFail();
        return redirect ()-> route ('bars.index')->with('code','0')->with('message',"Congratulations! Your bar was uploaded successfully.");
    }

    public function storeQB(BarRequest $request){
        $image = '';
        if($request ->hasFile('image')){
            $image = Storage::url($request->file('image')->store('public/bars'));
        }
        DB::table('bars')->insert([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$image//
        ]);//pide un array asociativo, hay que añadir los nombres de las columnas
        return redirect ()-> route ('bars.index')->with('code','0')->with('message',"Congratulations! Your bar was uploaded successfully.");
    }




    //--------------------------//MODIFICAR//-------------------------------------

    public function edit(Bar $bar){
        return view('bars.edit', compact('bar'));
    }

    public function editQB($id){
        $bar =DB::table('bars')->find($id);
        if ($bar == null){
            return redirect ()-> route ('bars.index')->with('code','304')->with('message',"Sorry, we couldn't find that bar, try something different.");
    }
    return view('bars.edit', compact('bar'));
}



//------------------------------------------------------------------------
public function update(BarRequest $request, Bar $bar){
    $image = '';
    //dd($request);
    if ($request -> hasFile('image')){
        $image = Storage ::url ($request ->file ('image')->store('public/bars'));
        $bar->image =$image;
    }
    $bar->fill ($request->validated());

    $bar -> saveOrFail();
    return redirect ()-> route ('bars.index')->with('code','0')->with('message',"Congratulations! Your info was updated successfully.");
}

public function updateQB(BarRequest $request, $id){
        $image = '';
        if($request ->hasFile('image')){
            $image = Storage::url($request->file('image')->store('public/bars'));
        }
        DB::table('bars')->where ('id',$id)->update([
            'name'          => $request -> name,
            'description'   => $request -> description,
            'image'         => $image
        ]);

        return redirect ()-> route ('bars.index')->with('code','0')->with('message',"Congratulations! Your info was updated successfully.");

    }






//----------------------------//BORRAR//------------------------------------------- (el parametro es el mismo que en las rutas)
public function delete (Bar $bar){
    try{
        $bar ->deleteOrFail();
    }catch (RuntimeException $e){
        return redirect ()-> route ('bars.index')->with('code','400')->with('message',"Your bar could not be deleted successfully.");
    }
        return redirect ()-> route ('bars.index')->with('code','0')->with('message',"Your bar was deleted successfully.");
    }


public function deleteQB ($id){
    DB::table('bars')->delete($id);
    return redirect ()-> route ('bars.index')->with('code','0')->with('message',"Your bar was deleted successfully.");
}
}
