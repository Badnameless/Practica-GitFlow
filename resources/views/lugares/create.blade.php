@extends('template')
@section('content')

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <div class="max-w-screen-2xl w-full mx-auto px-4 sm:px-6 lg:px-8 px-4 sm:px-6 lg:px-8 mt-12">

        <form action="{{ route('places.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="px-6 py-4 pr-0 mb-8 flex items-center w-full">

                <div class="flex items-center justify-between w-full">
                    
                    <a href="{{ route('places.index') }}">
                        <button type="button" class="px-4 py-2 rounded bg-white mr-4 text-sm hover:bg-gray-100 duration-300">Volver al listado</button>
                    </a>

                    <button type="submit" class="px-6 text-white py-2 rounded text-sm bg-mundoVerdeGreen hover:bg-mundoVerdeDarkGreen duration-300">Guardar</button>
                    
                </div>

            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="bg-white rounded-md max-w-[65%] mx-auto">

                <div class="px-6 py-4 border-b border-gray-200">
                    <h4 class="text-lg font-normal text-gray-900">Agregar Sitio Turistico</h4>
                </div>

                <div class="p-6 px-0 grid grid-cols-1 fieldsContainer">
                    <!-- Campo ProvinciaID -->
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="provincia">Provincia</label>
                        <div class="w-full">
                            <select name="ProvinciaID" id="provincia" class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                                <option value="">Selecciona una provincia</option>
                                @foreach($provincias as $provincia)
                                    <option value="{{$provincia->ProvinciaID}}">{{$provincia->Nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Campo Nombre -->
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="name">Nombre</label>
                        <div class="w-full">
                            <input type="text" name="Nombre" id="name" value="{{ old('Nombre') }}" class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                        </div>
                    </div>
                    
                    <!-- Campo Tipo -->
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="tipo">Tipo</label>
                        <div class="w-full">
                            <select name="TipoSitioID" id="Tipo" class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                                <option value="">Selecciona un tipo de sitio turistico</option>
                                @foreach($tipos as $tipo)
                                    <option value="{{ $tipo->TipoSitioID }}" {{ old('TipoSitioID') == $tipo->TipoSitioID ? 'selected' : '' }}>{{ $tipo->Nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Campo Descripción -->
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="description">Descripción</label>
                        <div class="w-full">
                            <textarea name="Descripcion" id="description" cols="30" rows="16" class="w-full min-h-[150px] border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>{{old('Descripcion')}}</textarea>
                        </div>
                    </div>

                    <!-- Campo Latitud -->
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="latitud">Latitud</label>
                        <div class="w-full">
                            <input type="text" name="Latitud" id="latitud" value="{{ old('Latitud') }}"  class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md">
                        </div>
                    </div>

                    <!-- Campo Longitud -->
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="longitud">Longitud</label>
                        <div class="w-full">
                            <input type="text" name="Longitud" id="longitud" value="{{ old('Longitud') }}" class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md">
                        </div>
                    </div>

                    <!-- Campo Actividades -->
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="actividades">Actividades</label>
                        <div class="w-full">
                            <select name="Actividades[]" id="actividades" multiple="multiple" class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                                @foreach ($actividades as $actividad)
                                <option value="{{$actividad->ActividadID}}" @if(in_array($actividad->ActividadID, old('Actividades', []))) selected @endif>{{ $actividad->Nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Galería -->
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="Galeria">Galeria</label>
                    <div class="w-full">
                        <div class="flex items-center gap-8">
                            <div class="flex items-center w-full">
                                <label class="labelImage h-35px box-border w-full flex items-center px-4 border border-r-0 border-gray-200" for="image">Seleccionar archivo</label>
                                <div class="h-35px w-full px-4 box-border border border-gray-200 border-r-0">
                                    <input class="h-35px box-border w-full appearence-none opacity-0 invisible" type="file" name="Galeria[]" id="image" multiple>
                                </div>
                                <button type="button" class="clearImages h-35px px-4 box-border bg-red-500 text-white rounded-r-md hover:bg-red-700 duration-300 text-sm"><i class="far fa-trash-alt"></i></button>
                            </div>
                        </div>
    
                        <div id="vistaPrevia" class="mt-4 mb-4" style="display: none;">
                            <div class="closeIcon">
                                X  
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </form>
        
    </div>

        <style>

            #vistaPrevia {
                width: 200px;
                height: 200px;
                background-color: #f1f1f1;
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                position: relative;
            }
            .closeIcon {
                position: absolute;
                top: 15px;
                right: 15px;
                width: 25px;
                height: 25px;
                background-color: red;
                color: #fff;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

    </style>

        <!--
            The "super-build" of CKEditor 5 served via CDN contains a large set of plugins and multiple editor types.
            See https://ckeditor.com/docs/ckeditor5/latest/installation/getting-started/quick-start.html#running-a-full-featured-editor-from-cdn
        -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
        <script>
            $(document).ready(function() {
                $('#actividades').select2();
            });
        </script>

<script>

    document.addEventListener("DOMContentLoaded", ()=>{

        document.querySelector(".closeIcon").addEventListener("click", ()=>{
            document.getElementById('vistaPrevia').style.backgroundImage = "url('')";
            document.getElementById('vistaPrevia').style.display = "none";
            document.getElementById('image').value = "";
            document.querySelector(".labelImage ").innerHTML = "Seleccionar archivo";

        })

        document.querySelector(".clearImages").addEventListener("click", ()=>{
            document.getElementById('vistaPrevia').style.backgroundImage = "url('')";
            document.getElementById('vistaPrevia').style.display = "none";
            document.getElementById('image').value = "";
            document.querySelector(".labelImage ").innerHTML = "Seleccionar archivo";

        })

    })

    document.getElementById('image').addEventListener('change', function(event) {
        var archivo = event.target.files[0];
        var lector = new FileReader();

        lector.onload = function(e) {
            document.getElementById('vistaPrevia').style.backgroundImage = "url('" + e.target.result + "')";
            document.getElementById('vistaPrevia').style.display = "block";
            document.querySelector(".labelImage ").innerHTML = archivo.name;
        }

        document.querySelector(".closeIcon").addEventListener("click", ()=>{
            document.getElementById('vistaPrevia').style.backgroundImage = "url('')";
            document.getElementById('vistaPrevia').style.display = "none";
            document.getElementById('image').value = "";
            document.querySelector(".labelImage ").innerHTML = "Seleccionar archivo";

        })

        document.querySelector(".clearImages").addEventListener("click", ()=>{
            document.getElementById('vistaPrevia').style.backgroundImage = "url('')";
            document.getElementById('vistaPrevia').style.display = "none";
            document.getElementById('image').value = "";
            document.querySelector(".labelImage ").innerHTML = "Seleccionar archivo";

        })

        lector.readAsDataURL(archivo);
    });

</script>
    
@endsection