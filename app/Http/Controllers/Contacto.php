<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class Contacto extends Controller
{
    public function store(Request $request){
        $request->validate(
        ['name'=>'required|string|max:250',
        'email'=>'required|string',
        'phone'=>'required|string|max:250',
        'message'=>'required|string|max:250'
        
        ],
        [
          'name'=>'preenche todos os campos' , 
          'email'=>'preenche todos os campos' , 
          'phone'=>'preenche todos os campos' , 
          'message'=>'preenche todos os campos'  
        ]


        );
        $contacto= new Contact();
        $contacto->name=$request->name;
        $contacto->email=$request->email;
        $contacto->phone=$request->phone;
        $contacto->message=$request->message;
        $contacto->save();
        return redirect('/')->with('msg','Obrigada!entraremos em contacto brevemente.');

    }
}
