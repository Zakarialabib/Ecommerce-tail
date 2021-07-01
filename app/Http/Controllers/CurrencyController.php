<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CurrencyController extends Controller
{
   
    //*** GET Request
    public function currency()
    {
        $currency = Currency::all();
        return view('backend.currency.index',compact('currency'));
    }

    //*** GET Request
    public function add()
    {
        return view('backend.currency.add');
    }

    //*** POST Request
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'unique:currencies',
            'sign' => 'unique:currencies'
        ]);
        //--- Logic Section
        $data = new Currency();
        $data->name = $request->name;
        $data->sign = $request->sign;
        $data->value = $request->value;
     
        $data->save();

        if($data){
            request()->session()->flash('success','Currency Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('currency');
    }

    //*** GET Request
    public function edit($id)
    {
        $currency  = Currency::findOrFail($id);
        return view('backend.currency.edit',compact('currency'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
    
        $request->validate([
            'name' => 'unique:currencies,name,'.$id,
            'sign' => 'unique:currencies,sign,'.$id
        ]);

        $data = Currency::findOrFail($id);
        $data->name = $request->name;
        $data->sign = $request->sign;
        $data->value = $request->value;
       
        $data->save();
    
        return redirect(route('backend.currency'));
    }


    public function status($id1)
        {
            $data = Currency::findOrFail($id1);
            $data->is_default = 1;
            $data->update();
            $data = Currency::where('id','!=',$id1)->update(['is_default' => 0]);
            
            return redirect()->back();
           
            
        }



    //*** GET Request Delete
    public function delete(Request $request, $id)
    {
        if($id == 1)
        {
            return redirect()->back();
        }

        $data = Currency::findOrFail($id);
        if($data->is_default == 1) {
        Currency::where('id','=',1)->update(['is_default' => 1]);
        }
        $data->delete();


        return redirect()->back();
    }

}