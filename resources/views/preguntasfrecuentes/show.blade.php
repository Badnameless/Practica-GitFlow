@extends('template')
@section('content')


    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous">

    </script>
    <div class="max-w-screen-2xl w-full mx-auto px-4 sm:px-6 lg:px-8 px-4 sm:px-6 lg:px-8 mt-12">
        <div class="px-6 py-4 pr-0 mb-8 flex items-center w-full">
            <div class="flex items-center justify-between w-full">
                <a href="{{ route('frecuent-questions.index') }}">
                    <button type="button"
                        class="px-4 py-2 rounded bg-white mr-4 text-sm hover:bg-gray-100 duration-300">Volver al
                        listado</button>
                </a>
            </div>
        </div>
        <div class="bg-white rounded-md max-w-[65%] mx-auto">
            <div class="px-6 py-4 border-b border-gray-200">
                <h4 class="text-lg font-normal text-gray-900">Detalles de pregunta frecuente</h4>
            </div>
            @if(!$pregunta)
            <div class="p-6 px-0 grid grid-cols-1 fieldsContainer">
                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <center><b><p>La pregunta seleccionada no existe, o hubo un error al mostrarla.</p></b></center>
                </div>
            </div>
            @else
                <div class="p-6 px-0 grid grid-cols-1 fieldsContainer">
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="name">Pregunta</label>
                        <div class="w-full">
                            <span class="border border-gray-200 px-4 py-[8px] box-border rounded text-md">{{$pregunta->Pregunta}}</span>
                        </div>
                    </div>
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="description">Respuesta</label>
                        <div class="w-full">
                            <div class="border border-gray-200 px-4 py-[8px] box-border rounded text-md">
                                {!! $pregunta->Respuesta !!}
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <div class="bodyContainer__productData--table-inputs-input flex items-center mb-4 pr-4 max-w-xl w-full">
                            <label for="estado" class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[192px]">Index</label>
                            <div class="w-full">
                                <span class="border border-gray-200 px-4 py-[8px] box-border rounded text-md">
                                    @if ($pregunta->Index)
                                        Activo
                                    @else
                                        Inactivo
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                        <div class="bodyContainer__productData--table-inputs-input flex items-center mb-4 pr-4 max-w-xl w-full">
                            <label for="estado" class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[192px]">Estado</label>
                            <div class="w-full">
                                <span class="border border-gray-200 px-4 py-[8px] box-border rounded text-md">
                                    @if ($pregunta->Estado)
                                        Activo
                                    @else
                                        Inactivo
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <style>

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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
        <script src="/js/editor.js"></script>
    
        <script>
            editorFull("description");
            $(document).ready(function() {
                $('#blog_categories').select2();
            });
        </script>
    
@endsection