@extends('template')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <div class="max-w-screen-2xl w-full mx-auto px-4 sm:px-6 lg:px-8 px-4 sm:px-6 lg:px-8 mt-12">
        @include('negocios.forms')

        @if (session()->has('locale') && session()->get('locale') !== 'es')

         @yield('negocios-edit-form-en')

        @else

         @yield('negocios-edit-form-es')

        @endif
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="/js/editor.js"></script>

    <script>
        editorFull("description");
        $(document).ready(function() {
            $('#blog_categories').select2();
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        document.addEventListener("DOMContentLoaded", () => {

            document.querySelector(".closeIcon").addEventListener("click", () => {
                document.getElementById('vistaPrevia').style.backgroundImage = "url('')";
                document.getElementById('vistaPrevia').style.display = "none";
                document.getElementById('image').value = "";
                document.querySelector(".labelImage ").innerHTML = "Seleccionar archivo";

            })

            document.querySelector(".clearImages").addEventListener("click", () => {
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

            document.querySelector(".closeIcon").addEventListener("click", () => {
                document.getElementById('vistaPrevia').style.backgroundImage = "url('')";
                document.getElementById('vistaPrevia').style.display = "none";
                document.getElementById('image').value = "";
                document.querySelector(".labelImage ").innerHTML = "Seleccionar archivo";

            })

            document.querySelector(".clearImages").addEventListener("click", () => {
                document.getElementById('vistaPrevia').style.backgroundImage = "url('')";
                document.getElementById('vistaPrevia').style.display = "none";
                document.getElementById('image').value = "";
                document.querySelector(".labelImage ").innerHTML = "Seleccionar archivo";

            })

            lector.readAsDataURL(archivo);
        });
    </script>

@endsection
