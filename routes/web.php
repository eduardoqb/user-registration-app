<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('login');
})->name('/');;

Route::post('entrar', function (Request $request) {
    $values = $request->all();

    $usuario = Usuario::where('email', $values['email'])->where('password', $values['password'])->first();
    if($usuario === null){
        return redirect()->route('/')->with('info', 'Usuario o contraseña incorrectos');
    }else{
        return redirect()->route('main')->with('info', 'Bienvenido '.$usuario['nombres']);
    }

});

Route::get('main', function () {
    return view('usuarios.main');
})->name('main');

Route::get('usuarios/{id}', function (Request $request) {

    $id = $request->route('id');
    $usuario = Usuario::where('id', $id)->get();
    echo $usuario;
});

Route::post('usuarios/registrar', function (Request $request) {
    
    $values = $request->all();
    $values = $values['values'];

    $newUsuario = new Usuario();

    if(!in_array(null, $values)){
        $newUsuario->tipo_documento = $values['tipo_documento'];
        $newUsuario->cedula = $values['cedula'];
        $newUsuario->nombres = $values['nombres'];
        $newUsuario->apellidos = $values['apellidos'];
        $newUsuario->fecha_nacimiento = $values['fecha_nacimiento'];
        $newUsuario->ciudad_nacimiento = $values['ciudad_nacimiento'];
        $newUsuario->email = $values['email'];
        $newUsuario->password = $values['password'];
        $newUsuario->save();
        echo json_encode(['status' => 1]);
    }else{
        echo json_encode(['status' => 0]);
    }

    //return redirect()->route('usuarios')->with('info', 'Usuario registrado exitosamente');
});

Route::post('usuarios/editar', function (Request $request) {
    
    $values = $request->all();
    $values = $values['values'];

    $usuario = Usuario::where('id', $values['id'])->first();

    if(!in_array(null, $values)){
        $usuario->tipo_documento = $values['tipo_documento'];
        $usuario->cedula = $values['cedula'];
        $usuario->nombres = $values['nombres'];
        $usuario->apellidos = $values['apellidos'];
        $usuario->fecha_nacimiento = $values['fecha_nacimiento'];
        $usuario->ciudad_nacimiento = $values['ciudad_nacimiento'];
        $usuario->email = $values['email'];
        $usuario->password = $values['password'];
        $usuario->save();
        echo json_encode(['status' => 1]);
    }else{
        echo json_encode(['status' => 0]);
    }

});

Route::post('usuarios/eliminar', function (Request $request) {
    
    $values = $request->all();
    $id = $values['values'];

    $usuario = Usuario::destroy($id);
    
    echo json_encode(['status' => 1]);

});

Route::post('usuarios/deshacerEliminar', function (Request $request) {
    
    $values = $request->all();
    $id = $values['values'];

    $usuario = Usuario::withTrashed()->find($id)->restore();
    
    echo json_encode(['status' => 1]);

});

Route::get('usuarios', function () {
    $response = "";

    $iconEdit = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000" viewBox="0 0 16 16">
        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
    </svg>';
    $iconDelete = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
        <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
    </svg>';

    $usuarios = Usuario::all();

    foreach ($usuarios as $usuario) {
        $response .= "<tr>";
        $response .= "<td>" . $usuario->tipo_documento . "</td>";
        $response .= "<td>" . $usuario->cedula . "</td>";
        $response .= "<td>" . $usuario->nombres . "</td>";
        $response .= "<td>" . $usuario->apellidos . "</td>";
        $response .= "<td>" . $usuario->fecha_nacimiento . "</td>";
        $response .= "<td>" . $usuario->ciudad_nacimiento . "</td>";
        $response .= "<td>" . $usuario->email . "</td>";
        $response .= "<td>" . $usuario->password . "</td>";
        $response .= '<td class="text-nowrap">
        <button onclick="editarUsuario('.$usuario->id.');" class="btn btn-warning me-1">'.$iconEdit.'</button>
        <button onclick="eliminarUsuario('.$usuario->id.');" class="btn btn-danger">'.$iconDelete.'</button></td>';
        $response .= "</tr>";
    }
    echo $response;
});