@extends('template')
@section('content')


    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <div class="max-w-screen-2xl w-full mx-auto px-4 sm:px-6 lg:px-8 px-4 sm:px-6 lg:px-8 mt-12">
    
    <form action="{{ route('guides.update', $guia->GuiaID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="px-6 py-4 pr-0 mb-8 flex items-center w-full">

            <div class="flex items-center justify-between w-full">
                
                <a href="{{ route('guides.index') }}">
                    <button type="button" class="px-4 py-2 rounded bg-white mr-4 text-sm hover:bg-gray-100 duration-300">Volver al listado</button>
                </a>

                <button type="submit" class="px-6 text-white py-2 rounded text-sm bg-mundoVerdeGreen hover:bg-mundoVerdeDarkGreen duration-300">Editar</button>
                
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
                <h4 class="text-lg font-normal text-gray-900">Editar Guia Turistico</h4>
            </div>

            <div class="p-6 px-0 grid grid-cols-1 fieldsContainer">

                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="nombre">Nombre</label>
                    <div class="w-full">
                        <input type="text" required name="Nombre" value="{{ $guia->Nombre }}"  id="nombre" class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                    </div>
                </div>

                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="provincia">Provincia</label>
                    <div class="w-full">
                        <select name="ProvinciaID" id="provincia" class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                            @foreach ($provincias as $provincia)
                                <option value="{{$provincia->ProvinciaID}}" {{ $provincia->ProvinciaID == $guia->ProvinciaID ? 'selected' : '' }}>{{$provincia->Nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @php
                    $actividadesSeleccionadas = json_decode($guia->Idiomas, true) ?? [];
                @endphp
                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="languages">Idiomas que maneja</label>
                    <div class="w-full">
                        <select name="Idiomas[]" id="languages" multiple="multiple" class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                            <option value="" disabled>Idiomas que maneja</option>
                            <option value="Inglés" {{ in_array("Inglés", $actividadesSeleccionadas) ? 'selected' : '' }}>Inglés</option>
                            <option value="Frances" {{ in_array("Frances", $actividadesSeleccionadas) ? 'selected' : '' }}>Frances</option>
                            <option value="Español" {{ in_array("Español", $actividadesSeleccionadas) ? 'selected' : '' }}>Español</option>
                            <option value="Italiano" {{ in_array("Italiano", $actividadesSeleccionadas) ? 'selected' : '' }}>Italiano</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="lugar">Lugar</label>
                    <div class="w-full">
                        <select name="LugarID" id="lugar" class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                            <option value="{{$guia->LugarID}}">{{$guia->lugar->Nombre}}</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="tipo">Telefono</label>
                    <div class="w-full">
                        <input type="text" required name="Telefono" id="tipo" value="{{ $guia->Telefono }}" class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md">
                    </div>
                </div>

                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="tipo">Experiencias</label>
                    <div class="w-full">
                        <textarea name="Experiencias" id="experiencias" cols="30" rows="4" class="w-full min-h-[80px] border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>{{ $guia->Experiencias }}</textarea>
                    </div>
                </div>

                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="image">Imagen</label>
                    <div class="w-full">
                        <div class="flex items-center mb-8 gap-8">
                            <div class="flex items-center w-full">
                                <label class="labelImage h-35px box-border w-full flex items-center px-4 border border-r-0 border-gray-200" for="image">Seleccionar archivo</label>
                                <div class="h-35px w-full px-4 box-border border border-gray-200 border-r-0">
                                    <input class="h-35px box-border w-full appearence-none opacity-0 invisible" type="file" name="Imagen" id="image">
                                </div>
                                <button type="button" class="clearImages h-35px px-4 box-border bg-red-500 text-white rounded-r-md hover:bg-red-700 duration-300 text-sm"><i class="far fa-trash-alt"></i></button>
                            </div>
                        </div>
                        <img src="{{ asset('storage/guias/' . $guia->Imagen) }}" alt="{{$guia->Nombre}}" class="mt-4 mb-4" >
                        <div id="vistaPrevia" class="mt-4 mb-4" style="display: none;">
                            <div class="closeIcon">
                                X  
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <div class="bodyContainer__productData--table-inputs-input flex items-center mb-4 pr-4 max-w-xl w-full">
                        <div>
                            <label for="estado" class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[192px]">Estado</label>
                        </div>
                        <div>
                            <label class="switch">
                                <input type="checkbox" name="Estado" id="state" 
                                @if ($guia->Estado)
                                    checked
                                @endif
                                >
                                <span class="slider round"></span>
                            </label>
                            <script>
                                const stateCheckbox = document.querySelector("#state");

                                function updateStateValue() {
                                    const stateValue = stateCheckbox.checked;
                                    stateCheckbox.value = stateValue;
                                }

                                stateCheckbox.addEventListener("change", updateStateValue);
                                updateStateValue();
                            </script>
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

        <style>

        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }
    
        </style>
    
        <script src="https://cdn.ckbox.io/CKBox/1.1.0/ckbox.js"></script>
        <!--
            The "super-build" of CKEditor 5 served via CDN contains a large set of plugins and multiple editor types.
            See https://ckeditor.com/docs/ckeditor5/latest/installation/getting-started/quick-start.html#running-a-full-featured-editor-from-cdn
        -->
        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/super-build/ckeditor.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
        <script src="/js/editor.js"></script>
    
        <script>
            $(document).ready(function() {
                $('#languages').select2();
            });
        </script>
        
        <script>
            var provincias = <?php echo json_encode($provincias, JSON_HEX_APOS); ?>;
        </script>
        <script>
            $(document).ready(function () {
                $('#provincia').on('change', function () {
                    var provinciaID = $(this).val();
        
                    // Limpia el select de lugares
                    $('#lugar').empty();
                    $('#lugar').append($('<option value="">Selecciona un lugar</option>'));
            
                    // Si se ha seleccionado una provincia, agrega las opciones de lugares
                    if (provinciaID) {
                        for (var i = 0; i < provincias.length; i++) {
                            if (provincias[i].ProvinciaID == provinciaID) {
                                for (var j = 0; j < provincias[i].lugares.length; j++) {
                                    var lugar = provincias[i].lugares[j];
                                    $('#lugar').append($('<option value="' + lugar.LugarID + '">' + lugar.Nombre + '</option>'));
                                }
                                break; // Detener la búsqueda una vez que se encuentren los lugares
                            }
                        }
                    }
                });
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