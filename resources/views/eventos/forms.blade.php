@section('eventos-edit-form-es')
    <form action="{{ route('events.update', $evento->EventoID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="px-6 py-4 pr-0 mb-8 flex items-center w-full">

            <div class="flex items-center justify-between w-full">

                <a href="{{ route('events.index') }}">
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
                <h4 class="text-lg font-normal text-gray-900">Editar Evento</h4>
            </div>

            <div class="p-6 px-0 grid grid-cols-1 fieldsContainer">
                <!-- Campo Nombre -->
                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]"
                        for="name">Nombre</label>
                    <div class="w-full">
                        <input type="text" name="Nombre" id="name" value="{{ $evento->Nombre }}"
                            class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                    </div>
                </div>

                <!-- Campo ProvinciaID -->
                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]"
                        for="provincia">Provincia</label>
                    <div class="w-full">
                        <select name="ProvinciaID" id="provincia"
                            class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md">
                            @foreach ($provincias as $provincia)
                                <option value="{{ $provincia->ProvinciaID }}"
                                    {{ $provincia->ProvinciaID == $evento->ProvinciaID ? 'selected' : '' }}>
                                    {{ $provincia->Nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Campo Tipo -->
                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]" for="tipo">Tipo</label>
                    <div class="w-full">
                        <select name="TipoEventoID" id="Tipo" class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo->TipoEventoID }}" {{  $evento->TipoEventoID == $tipo->TipoEventoID ? 'selected' : '' }}>{{ $tipo->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Campo Descripción -->
                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]"
                        for="description">Descripción</label>
                    <div class="w-full">
                        <textarea name="Descripcion" id="description" cols="30" rows="16"
                            class="w-full min-h-[150px] border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>{{ $evento->Descripcion }}</textarea>
                    </div>
                </div>

                <!-- Campo Lugar -->
                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]"
                        for="lugar">Lugar</label>
                    <div class="w-full">
                        <input type="text" name="Lugar" id="lugar" value="{{ $evento->Lugar }}"
                            class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                    </div>
                </div>

                <!-- Campo Latitud -->
                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]"
                        for="latitud">Latitud</label>
                    <div class="w-full">
                        <input type="text" name="Latitud" id="latitud" value="{{ $evento->Latitud }}"
                            class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md">
                    </div>
                </div>

                <!-- Campo Longitud -->
                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]"
                        for="longitud">Longitud</label>
                    <div class="w-full">
                        <input type="text" name="Longitud" id="longitud" value="{{ $evento->Longitud }}"
                            class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md">
                    </div>
                </div>

                <!-- Campo FechaHora -->
                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]"
                        for="fechaHora">Fecha y Hora</label>
                    <div class="w-full">
                        <input type="datetime" name="FechaHora" id="fechaHora" value="{{ $evento->FechaHora }}"
                            class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                    </div>
                </div>

                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]"
                        for="image">Imagen</label>
                    <div class="w-full">
                        <div class="flex items-center mb-8 gap-8">
                            <label for="hidden_filters" class="text-sm w-150px">
                                Imagen
                            </label>
                            <div class="flex items-center w-full">
                                <label
                                    class="labelImage h-35px box-border w-full flex items-center px-4 border border-r-0 border-gray-200"
                                    for="image">Seleccionar archivo</label>
                                <div class="h-35px w-full px-4 box-border border border-gray-200 border-r-0">
                                    <input class="h-35px box-border w-full appearence-none opacity-0 invisible"
                                        type="file" name="Imagen" id="image">
                                </div>
                                <button type="button"
                                    class="clearImages h-35px px-4 box-border bg-red-500 text-white rounded-r-md hover:bg-red-700 duration-300 text-sm"><i
                                        class="far fa-trash-alt"></i></button>
                            </div>
                        </div>
                        <img src="{{ asset('storage/eventos/' . $evento->Imagen) }}" alt="{{ $evento->Nombre }}"
                            class="mt-4 mb-4">
                        <div id="vistaPrevia" class="mt-4 mb-4" style="display: none;">
                            <div class="closeIcon">
                                X
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <div
                        class="bodyContainer__productData--table-inputs-input flex items-center mb-4 pr-4 max-w-xl w-full">
                        <div>
                            <label for="estado"
                                class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[192px]">Estado</label>
                        </div>
                        <div>
                            <label class="switch">
                                <input type="checkbox" name="Estado" id="state"
                                    @if ($evento->Estado) checked @endif>
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
@endsection

@section('eventos-edit-form-en')
    <form action="{{ route('events.update_translation', $evento->EventoID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="px-6 py-4 pr-0 mb-8 flex items-center w-full">

            <div class="flex items-center justify-between w-full">

                <a href="{{ route('events.index') }}">
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
                <h4 class="text-lg font-normal text-gray-900">Editar Evento</h4>
            </div>

            <div class="p-6 px-0 grid grid-cols-1 fieldsContainer">
                <!-- Campo Nombre -->
                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]"
                        for="name">Nombre</label>
                    <div class="w-full">
                        <input type="text" name="Nombre" id="name" value="{{ $evento->Nombre }}"
                            class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                    </div>
                </div>

                <!-- Campo Descripción -->
                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]"
                        for="description">Descripción</label>
                    <div class="w-full">
                        <textarea name="Descripcion" id="description" cols="30" rows="16"
                            class="w-full min-h-[150px] border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>{{ $evento->Descripcion }}</textarea>
                    </div>
                </div>

                <!-- Campo Lugar -->
                <div class="flex justify-between px-12 py-8 border-b border-gray-200">
                    <label class="text-[16px] font-medium leading-thing mr-2 flex items-center w-[250px]"
                        for="lugar">Lugar</label>
                    <div class="w-full">
                        <input type="text" name="Lugar" id="lugar" value="{{ $evento->Lugar }}"
                            class="w-full border border-gray-200 px-4 py-[8px] box-border rounded text-md" required>
                    </div>
                </div>

            </div>
        </div>

    </form>
@endsection