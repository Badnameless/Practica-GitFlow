@extends('template')
@section('content')


    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <div class="max-w-screen-2xl w-full mx-auto px-4 sm:px-6 lg:px-8 px-4 sm:px-6 lg:px-8 mt-12">

        <form action="{{ route('store_blog') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="px-6 py-4 pr-0 mb-8 flex items-center w-full">

                <div class="flex items-center justify-between w-full">
                    
                    <a href="{{ route('adm_blog') }}">
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
                    <h4 class="text-lg font-normal text-gray-900">Agregar Blog</h4>
                </div>

                <div class="p-6 px-0 grid grid-cols-1 fieldsContainer">

                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="nombre">Nombre</label>
                        <div class="w-full">
                            <input type="text" name="nombre" class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                        </div>
                    </div>
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="descripcion">Descripcion</label>
                        <div class="w-full">
                            <textarea name="descripcion" cols="30" rows="16" class="w-full min-h-[150px] border border-gray-200 px-4 py-[8px] box-border rounded text-md" required></textarea>
                        </div>
                    </div>
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="sintomas">Sintomas</label>
                        <div class="w-full">
                            <textarea name="sintomas" cols="30" rows="16" class="w-full min-h-[150px] border border-gray-200 px-4 py-[8px] box-border rounded text-md" required></textarea>
                        </div>
                    </div>
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="causas">Causas</label>
                        <div class="w-full">
                            <textarea name="causas" cols="30" rows="16" class="w-full min-h-[150px] border border-gray-200 px-4 py-[8px] box-border rounded text-md" required></textarea>
                        </div>
                    </div>
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="prevencion">Prevención</label>
                        <div class="w-full">
                            <textarea name="prevencion" cols="30" rows="16" class="w-full min-h-[150px] border border-gray-200 px-4 py-[8px] box-border rounded text-md" required></textarea>
                        </div>
                    </div>
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="vistas">Vistas</label>
                        <div class="w-full">
                            <input type="number" name="vistas" step="any" value="" class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                        </div>
                    </div>
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="fecha">Fecha</label>
                        <div class="w-full">
                            <input type="date" name="fecha" id="fecha" value="{{ old('fecha') }}" class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                        </div>
                    </div>
    
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="image">Imagen</label>
                        <div class="w-full">
                            <div class="flex items-center gap-8">
                                <div class="flex items-center w-full">
                                    <label class="labelImage h-35px box-border w-full flex items-center px-4 border border-r-0 border-gray-200" for="image">Seleccionar archivo</label>
                                    <div class="h-35px w-[90px] px-4 box-border border border-gray-200 border-r-0">
                                        <input class="h-35px box-border w-full appearence-none opacity-0 invisible" type="file" name="imagen" id="image">
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

        <style>

        .ck-editor__editable[role="textbox"] {
            min-height: 200px;
        }
    
        </style>
    
        <script src="https://cdn.ckbox.io/CKBox/1.1.0/ckbox.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/super-build/ckeditor.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
        <script src="/js/editor.js"></script>
    
        <script>
            editorFull("description");
            $(document).ready(function() {
                $('#blog_categories').select2();
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