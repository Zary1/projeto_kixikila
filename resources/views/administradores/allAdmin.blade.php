@extends('layouts.mainAdmin')
@section('title','admin')
@section('content')



<div class="lista_admins">
<h1> Administradores</h1>
<table   >
  <thead class="cabecalho" >
    <tr >
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">telefone</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($admins as $admin)
    <tr>
      <td>{{$admin->nome}}</td>
      <td>{{$admin->email}}</td>
      <td>{{$admin->phone}}</td>
      <td class="actions">
      <button onclick="location.href='/edit/admin/{{$admin->id}}'">
               
               <i class="fa-solid fa-pen-to-square edit"></i>
               </button> 
                <form action="/allAdmin/{{$admin->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none; padding:0; cursor:pointer;">
                        <i class="fa-solid fa-trash delete"></i>
                        </button>
                    </form>
                </td>
            </tr>
    </tr>
 
  </tbody>
  @endforeach
</table>
</div>


@endsection