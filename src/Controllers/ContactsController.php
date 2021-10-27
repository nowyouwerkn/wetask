<?php
namespace Nowyouwerkn\WeTask\Controllers;


use Nowyouwerkn\WeTask\Models\Contacts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class ContactsController extends Controller
{
  
    public function index()
    {
        $contactos = Contacts::all();
        return view('wetask::home')-> with('contactos', $contactos);
    }

   
    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
         $Contacto = Contacts::create([
            'nombre' => $request->nombre ,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'estado' => 'Registro nuevo',
        ]);

         $contactos = Contacts::all();
        return redirect()->back();
    }

  
    public function show(Contacts $contacts)
    {
        
    }

    
    public function edit(Contacts $contacts)
    {
        
    }

    
    public function update(Request $request, $id)
    {
      $contacto =Contacts::find($id);
          $contacto->update([
            'nombre' => $request->nombre ,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'estado' => $request->estado,
            


        ]);   
          return redirect()->back();
    }

  
    public function destroy($id)
    {
        $Contactos = Contacts::find($id);
        $Contactos->delete();

        $contact = Contacts::all();
       return redirect()->back();
    }
}