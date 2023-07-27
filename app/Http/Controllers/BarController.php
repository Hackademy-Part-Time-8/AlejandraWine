<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarController extends Controller
{
    private static $bares= [
        [1,"Le Vignoble Parisien","Elegancia parisina y vinos selectos en armonía."],
        [2, "Il Barolo D'Oro","Elegancia parisina y vinos selectos en armonía."],
        [3,"Le Bistro du Vin","Encanto francés, deleite enológico."],
        [4,"La Toscana Vinoteca","Encanto francés, deleite enológico."],
        [5,"Le Cellier Romantique","Amor y vinos en un rincón."],
        [6,"Vinoteca Éclat","Brillante selección, deleite exquisito."],
        [7,"VinoVerso","Versos de vino, pasión compartida."],
        [8,"Vinópolis","Ciudad de vinos, descubre su esencia."],
        [9,"El Rincón de los Sentidos","Sabores que cautivan, vinos que emocionan."],
        [10, "El Sabor del Terroir", "Esencia de la tierra."],
        [11,"Cava del Ocaso", "Atardecer y vinos"],
        [12,"Vinoteca Euforia","Euforia en copas."]

    ];
    function index (){
       
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
    return redirect ()-> route ('bars.index');
        }
    
        return view ('bars.show',["bar" => self ::$bares[$aux]]);
    }
}
