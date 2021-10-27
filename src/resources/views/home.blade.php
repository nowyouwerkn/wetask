@extends('wetask::layouts.main')

   
      @section('content')
        
                            
                          </div>
                        </div>
                    </div>
                </div>
<div class="row justify-content-center" style="padding-top:5%;">
    <div class="col-xl-8">
        <h1>Lista de nuestros contactos</h1>
        <hr>
    </div>
</div>
            <br><br>
<div class="row justify-content-center" style=" padding-bottom: 5%;">
    <div class="col-xl-8">
        <h1 class="mb-2"><button type="button" class="btn  btn-primary" data-bs-toggle="modal" data-bs-target="#CreateModal">
                <h5>Crear nuevo contacto</h5>
                </button></h1>
                <br>
        <table class="table" id="Contacts" style="padding-top:2%;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Telefono</th>
      <th scope="col">Correo</th>
      <th scope="col">Estado</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
   @foreach($contactos as $contacto)
    <tr>
      <th scope="row">{{$contacto->id}}</th>
      <td>{{$contacto->nombre}}</td>
      <td>{{$contacto->telefono}}</td>
      <td>{{$contacto->correo}}</td>
      <td>{{$contacto->estado}}</td>
      <td><button type="button" class="btn-info" data-bs-toggle="modal" data-bs-target="#EditModal_{{ $contacto->id }}"> <ion-icon name="create-outline"></ion-icon> </button></td>
      <td><button type="button" class="btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal_{{ $contacto->id }}"> <ion-icon name="trash"></ion-icon> </button></td>
      





<!-- Edit Modal -->
<div class="modal fade" id="EditModal_{{ $contacto->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content modaldiv">
      <div class="modal-header">
        <h2 class="modal-title centercontent" id="exampleModalLabel">Editar Contacto</h2>
        <button type="button" class="btn btn-danger " data-bs-dismiss="modal"  style="text-align: right;">
          <ion-icon name="close-outline" style="transform: translate(0%, 10%);"></ion-icon>
        </button>
      </div>

                                                         <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <form method="POST" action="{{ route('contacts.update', $contacto->id) }}">
                                                            <!-- Nuestro campo de proteccion de formulario -->
                                                            {{ csrf_field() }}
                                                            {{ method_field ('PUT') }}

                                                            <!-- Campos del formulario -->
                                                            <div class="form-group">
                                                                <label>Nombre del contacto</label>
                                                                <input class="form-control"  required="required" type="text" name="nombre" placeholder="Nombre del contacto" value="{{ $contacto->nombre }}">

                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <label>Telefono</label>
                                                            <textarea class="form-control" required="required" name="telefono"> {{ $contacto->telefono }}</textarea>
                                                            </div>
                                                            <br>
                                                             <div class="form-group">
                                                                        <label>Correo</label>
                                                                        <input class="form-control"  required="required" type="email" name="correo" value="{{ $contacto->correo }}">
                                                            </div>
                                                            <br>
                                                                <div class="form-group">
                                                                        <label>Estado</label>

                                                                        <select class="form-control" name="estado">
                                                                            @if ($contacto->estado == 'Registro nuevo')
                                                                            <option value="Registro nuevo">Registro nuevo</option>
                                                                            <option value="Contactado">Contactado</option>
                                                                            <option value="Perdido">Perdido</option>
                                                                             @endif


                                                                                 @if ($contacto->estado == 'Contactado')
                                                                            <option value="Contactado">Contactado</option>
                                                                            <option value="Registro nuevo">Registro nuevo</option>
                                                                            <option value="Perdido">Perdido</option>
                                                                             @endif

                                                                                  @if ($contacto->estado == 'Perdido')
                                                                            <option value="Perdido">Perdido</option>
                                                                            <option value="Registro nuevo">Registro nuevo</option>
                                                                            <option value="Contactado">Contactado</option>
                                                                           
                                                                             @endif

                                                                        </select>
                                                            </div>
                                                            <br>
                                                           

                                                        </div>
                                                          </div>

                                                            <!-- Guardar Formulario -->
                                                             <div class="modal-footer">
                                                             <button type="button" class="btn btn-danger centercontent"  data-bs-dismiss="modal">Close</button>
                                                            <button class="btn btn-success centercontent" type="submit">Guardar Tarea</button>
                                                        </form>
                                                    </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="DeleteModal_{{ $contacto->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content modaldivborrar">
      <div class="modal-header">
        <h2 class="modal-title centercontent" id="exampleModalLabel">Estas seguro?</h2>
        <button type="button" class="btn btn-danger " data-bs-dismiss="modal"  style="text-align: right;">
          <ion-icon name="close-outline" style="transform: translate(0%, 10%);"></ion-icon>
        </button>
      </div>
      
       <form method="POST" action="{{route ('contacts.destroy', $contacto->id) }}">
        {{ csrf_field() }}
        {{method_field ('DELETE') }}
      <div class="modal-footer  centercontent">
        <button type="button" class="btn btn-danger justify-content-center" data-bs-dismiss="modal">No</button>
       

<button type="submit" class="btn btn-success justify-content-center" >Si estoy seguro</button>
</form>
        
      </div>
    </div>
  </div>
</div>
    @endforeach

  </tbody>
</table>
    </div>
</div>



    <!--Create Modal -->
<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content modaldiv">
      <div class="modal-header">
        <h2 class="modal-title centercontent" id="exampleModalLabel">Crear nuevo contacto</h2>
        <button type="button" class="btn btn-danger " data-bs-dismiss="modal"  style="text-align: right;">
          <ion-icon name="close-outline" style="transform: translate(0%, 10%);"></ion-icon>
        </button>
      </div>
                                                          <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <form method="POST" action="{{ route('contacts.store') }}">
                                                            <!-- Nuestro campo de proteccion de formulario -->
                                                            {{ csrf_field() }}

                                                            <!-- Campos del formulario -->
                                                                  <div class="form-group">
                                                                <label>Nombre del contacto</label>
                                                                <input class="form-control" required="required" type="text" name="nombre" placeholder="Nombre del contacto" value="">

                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <label>Telefono</label>
                                                            <input class="form-control" required="required" type="number" name="telefono"> </input>
                                                            </div>
                                                            <br>
                                                             <div class="form-group">
                                                                        <label>Correo</label>
                                                                        <input class="form-control"  required="required" type="email" name="correo" value="">
                                                            </div>
                                                            
                                                           
                                                            <br>
                                                        </div>
                                                          </div>

                                                            <!-- Guardar Formulario -->
                                                             <div class="modal-footer">
                                                             <button type="button" class="btn btn-danger centercontent"  data-bs-dismiss="modal">Close</button>
                                                            <button class="btn btn-success centercontent" type="submit">Guardar Tarea</button>
                                                        </form>
                                                    </div>
                                                             
        
      </div>
    </div>
  </div>
</div>
        

  


      
    
@endsection