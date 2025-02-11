<?php

namespace App\Http\Controllers;

use App\Models\RegisterAdmin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Admin extends Controller
{
    public function index(){
        return view('administradores.index');

    }

    public function allAdmin(){
        $admin=RegisterAdmin::all();
        return view('administradores.allAdmin',['admins'=>$admin]);
    }

    public function showFormulario(){
        return view('administradores.registro');
    }
    public function store(Request $request){
        $request->validate(
            [
            'name'=>'required|string|max:250',
            'email' => 'required|string|email|unique:register_admins,email',
            'phone'=>'required|numeric',
            'password'=>'required|string|confirmed',
            'password_confirmation'=>'required|string|max:250'
            
            ],
            [
                'name.required' => 'O campo nome é obrigatório.',
                'email.unique' => 'Este email já está em uso.',
                'phone.numeric' => 'O campo telefone deve conter apenas números.',
                'password.required' => 'O campo senha é obrigatório.',
                'password_confirmation.confirmed' => 'A confirmação da senha não corresponde.',
            
              
            ]
            );
        $registerAdmin= new RegisterAdmin();
        $registerAdmin->nome=$request->name;
        $registerAdmin->email=$request->email;
        $registerAdmin->phone=$request->phone;
        $registerAdmin->password= Hash::make($request->password);
        $registerAdmin->confime_password=Hash::make($request->password_confirmation);
    
        $registerAdmin->save();
        return redirect('loginAdmin');
    }
   public function showLogin(){

    return view('administradores.loginAdmin');
   }

 
   public function storeLogin(Request $request)
   {
       $request->validate([
           'email' => 'required|string|email|max:255',
           'password' => 'required|string|max:250',
       ]);
   
       $credentials = $request->only('email', 'password');
    
   
       if (Auth::guard('admin')->attempt($credentials)) {
           // Redireciona para o dashboard do admin
           return redirect('registro');
       }
   
       // Caso as credenciais estejam erradas
       return redirect()->back()->withErrors(['email' => 'Email ou password estão incorretos.']);
   }
   
public function logout(){
    Auth::guard('admin')->logout();
    return redirect('loginAdmin');
}

public function destroy($id){
   $deleteoneAdmin= RegisterAdmin::findOrFail($id);
   $deleteoneAdmin->delete();

   return redirect('allAdmin');


}
public function showEdit($id){
    $admin=RegisterAdmin::findOrFail($id);
    return view('administradores.edit',['admin'=>$admin]);
}
public function update(Request $request,$id){
    $request->validate(
        [
        'name'=>'string|max:250',
        'email'=>'string',
        'phone'=>'numeric',
        'password'=>'string|confirmed',
        'password_confirmation'=>'string|max:250'
        
        ],
        [
            
            'email.unique' => 'Este email já está em uso.',
            'phone.numeric' => 'O campo telefone deve conter apenas números.',
            'password' => 'O campo senha é obrigatório.',
            'password_confirmation.confirmed' => 'A confirmação da senha não corresponde.',
        
          
        ]
        );
$data=$request->all();
RegisterAdmin::findOrFail($id)->update($data);
return redirect('allAdmin');
}

}
