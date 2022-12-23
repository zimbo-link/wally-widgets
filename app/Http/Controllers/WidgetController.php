<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WidgetController extends Controller
{

 

    private function widgetRecursion(&$send, $units){

        $widget_config = config('widgets.wally');
        $config_size = count($widget_config);

        foreach($widget_config as $pack_size){
            $quotient = floor($units/$pack_size);
            $remainder = $units % $pack_size;
         

            if($quotient == 0 && $pack_size - $units < $widget_config[$config_size-1]){
                $send[] = [
                    "size" => $pack_size,
                    "quantity" => 1
                ];
                break;
            }

            if($quotient > 0){
                $send[] = [
                    "size" => $pack_size,
                    "quantity" => $quotient
                ];
                if($remainder > 0){
                    $this->widgetRecursion($send, $remainder);
                }
                break;
            }
        }
    }


    public function widgetCalculator(Request $request){
        
        $request->validate([
            'units' => 'required'
        ]); 
   
        $units = intVal($request->post('units'));
 
        $send = [];
        
        $this->widgetRecursion($send, $units);
 
        return redirect()->route('dashboard')->with([ 'units' => $units, 'send' => $send ]); 

    }
}