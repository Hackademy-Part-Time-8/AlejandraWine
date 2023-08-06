<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class BarController extends Controller
{
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

    ];
    function index (Request $request){
       
        return view ('bars.index',["bares" =>self ::$bares]);
    }
    public function show($id){
     
        $aux = -1;
        $i=0;
       // dd($bares[$i]);
        while (($aux<0) && ($i < count(self ::$bares))){
            if ($id ==self ::$bares[$i][0]){
                $aux=$i;
            }
            $i++;
        }
    
        if ($aux<0){
    return redirect ()-> route ('bars.index')->with('code','304')->with('message','Bar no encontrado');
        }
    
        return view ('bars.show',["bar" => self ::$bares[$aux]]);
    }
}
