@section('preguntafrecuentes-edit-form-es')
    <form action="{{ route('frecuent-questions.update', $pregunta->PreguntaFrecuenteID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="px-6 py-4 pr-0 mb-8 flex items-center w-full">

            <div class="flex items-center justify-between w-full">

                <a href="{{ route('frecuent-questions.index') }}">
                    <button type="button"
                        class="px-4 py-2 rounded bg-white mr-4 text-sm hover:bg-gray-100 duration-300">Volver al
                        listado</button>
                </a>

                <button type="submit"
                    class="px-6 text-white py-2 rounded text-sm bg-mundoVerdeGreen hover:bg-mundoVerdeDarkGreen duration-300">Editar</button>

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
                <h4 class="text-lg font-normal text-gray-900">Editar pregunta frecuente</h4>
            </div>

            <div class="p-6 px-0 grid grid-cols-1 fieldsContainer">

                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]"
                        for="name">Pregunta</label>
                    <div class="w-full">
                        <input type="text" name="Pregunta" id="pregunta" value="{{ $pregunta->Pregunta }}"
                            class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                    </div>
                </div>
                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]"
                        for="respuesta">Respuesta</label>
                    <div class="w-full">
                        <textarea name="Respuesta" id="respuesta" cols="30" rows="16"
                            class="w-full min-h-[150px] border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>{{ $pregunta->Respuesta }}</textarea>
                    </div>
                </div>
                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <div class="bodyContainer__productData--table-inputs-input flex items-center mb-4 pr-4 max-w-xl w-full">
                        <div>
                            <label for="index"
                                class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[192px]">Index</label>
                        </div>
                        <div>
                            <label class="switch">
                                <input type="checkbox" name="Index" id="index"
                                    @if ($pregunta->Index) checked @endif>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <div class="bodyContainer__productData--table-inputs-input flex items-center mb-4 pr-4 max-w-xl w-full">
                        <div>
                            <label for="estado"
                                class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[192px]">Estado</label>
                        </div>
                        <div>
                            <label class="switch">
                                <input type="checkbox" name="Estado" id="estado"
                                    @if ($pregunta->Estado) checked @endif>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <script>
        const indexCheckbox = document.querySelector("#index");
        const estadoCheckbox = document.querySelector("#estado");

        function updateValues() {
            const indexValue = indexCheckbox.checked;
            indexCheckbox.value = indexValue;

            const estadoValue = estadoCheckbox.checked;
            estadoCheckbox.value = estadoValue;
        }

        indexCheckbox.addEventListener("change", updateValues);
        estadoCheckbox.addEventListener("change", updateValues);

        // Call the function initially to set values based on checkbox states
        updateValues();
    </script>



@endsection

@section('preguntasfrecuentes-edit-form-en')
    <form action="{{ route('frecuent-questions.update_translation', $pregunta->PreguntaFrecuenteID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="px-6 py-4 pr-0 mb-8 flex items-center w-full">

            <div class="flex items-center justify-between w-full">

                <a href="{{ route('frecuent-questions.index') }}">
                    <button type="button"
                        class="px-4 py-2 rounded bg-white mr-4 text-sm hover:bg-gray-100 duration-300">Volver al
                        listado</button>
                </a>

                <button type="submit"
                    class="px-6 text-white py-2 rounded text-sm bg-mundoVerdeGreen hover:bg-mundoVerdeDarkGreen duration-300">Editar</button>

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
                <h4 class="text-lg font-normal text-gray-900">Editar pregunta frecuente</h4>
            </div>

            <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]"
                    for="name">Pregunta</label>
                <div class="w-full">
                    <input type="text" name="Pregunta" id="pregunta" value="{{ $pregunta->Pregunta }}"
                        class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                </div>
            </div>

            <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]"
                    for="respuesta">Respuesta</label>
                <div class="w-full">
                    <textarea name="Respuesta" id="respuesta" cols="30" rows="16"
                        class="w-full min-h-[150px] border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>{{ $pregunta->Respuesta }}</textarea>
                </div>
            </div>
        </div>

    </form>

@endsection
