@extends('template')
@section('content')

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <div class="max-w-screen-2xl w-full mx-auto px-4 sm:px-6 lg:px-8 px-4 sm:px-6 lg:px-8 mt-12">

        <form action="{{route('events.show', 1)}}" method="get" class="flex items-center gap-5 w-full mt-12">

          <div class="bg-white rounded-md mb-8 w-full">
              <div class="px-6 py-4 border-b border-gray-200">
                  <h4 class="text-lg font-normal text-gray-900">Filtros</h4>
              </div>
      
              <div class="w-full py-8 px-6 grid grid-cols-2 gap-10">
                  <div class="mb-6 flex items-center">
                      <label for="name" class="px-4 text-sm flex items-center py-1 h-35px min-w-fit border border-r-0 bg-labelFilterBG border-labelFilterBorder rounded-l-md">Nombre</label>
                      <input type="text" name="name" id="name" class="h-35px text-sm border border-labelFilterBorder rounded-r-md w-full px-4" @if(isset($_GET['name'])) value="{{$_GET['name']}}" @endif>
                  </div>
              </div>
              <div class="px-6 py-4 flex items-center justify-end">
                  <div class="mr-6">
                      <button class="px-4 py-2 bg-reloadButtonBG hover:bg-reloadButtonHoverBG duration-300 text-white text-sm rounded"><i class="fas fa-redo mr-1"></i> Reiniciar Búsqueda</button>
                  </div>
                  <div>
                      <button type="submit" class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 duration-300 text-white text-sm rounded"><i class="fas fa-search mr-1"></i></i> Buscar</button>
                  </div>
              </div>
          </div>
        </form>

        <div class="bg-white rounded-md">
            <div class="mb-4 flex items-center justify-end px-8 pt-8">
                <a href="{{ route('events.create') }}">
                    <button class="px-6 py-2 rounded bg-mundoVerdeGreen text-white flex items-center justify-center hover:bg-mundoVerdeDarkGreen duration-300">
                        <img class="w-16px mr-2" src="images/plus.png" alt=""> 
                        <span>Crear Entrada</span>
                    </button>
                </a>
            </div>
            <div class="px-4 sm:px-6 lg:px-8 pb-12">
                <div class="mt-8 flex flex-col">
                  <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                      <div class="overflow-hidden ring-1 ring-transparent ring-opacity-5">
                        <table class="min-w-full">
                          <thead class="bg-mundoVerdeGreen">
                            <tr>
                              <th class="mx-w-50px py-2 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6"></th>
                              <th scope="col" class="py-2 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Nombre</th>
                              <th scope="col" class="py-2 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Provincia</th>
                              <th scope="col" class="py-2 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Publicado</th>
                              <th scope="col" class="relative py-2 pl-3 pr-4 sm:pr-6 text-sm font-semibold text-white text-left">Acciones</th>
                            </tr>
                          </thead>
                          <tbody id="tableBody" class="bg-white">
                            <!-- Odd row -->
                            @foreach($eventos as $evento)
                              <tr>
                                <td class="w-50px whitespace-nowrap py-2 pl-4 pr-3 text-lg font-medium text-gray-900 sm:pl-6 cursor-pointer"><i class="fas fa-arrows-alt-v"></i></td>
                                <td class="w-1/4 whitespace-nowrap py-2 pl-4 pr-3 text-sm font-medium text-mundoVerdeGreen sm:pl-6 hover:underline">
                                  <a href="#">{{$evento->Nombre}}</a>
                                </td>
                                <td class="w-1/4 max-w-xs sm:max-w-md whitespace-nowrap py-2 pl-4 pr-3 text-sm font-medium text-mundoVerdeGreen sm:pl-6 hover:underline overflow-hidden truncate">
                                  <span>{{$evento->provincia->Nombre}}</span>
                                </td>
                                <td class="w-1/4 whitespace-nowrap py-2 pl-4 pr-3 text-sm font-medium text-mundoVerdeGreen sm:pl-6 hover:underline">
                                  <div class="flex items-center">
                                      <label class="switch">
                                          <input class="publish_prod" data-id="15" data-status="publicado" type="checkbox" disabled
                                          @if($evento->Estado == true)
                                          checked
                                          @endif
                                          >
                                          <span class="slider round"></span>
                                      </label>
                                  </div>
                                </td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 sm:pr-6">
                                  <div class="flex items-center">
                                      <a href="{{ route('events.edit', $evento->EventoID) }}">
                                          <div class="w-35px h-35px cursor-pointer text-gray-500 flex items-center text-sm justify-center rounded-full mr-4 hover:bg-indigo-600 hover:text-white duration-300">
                                              <i class="far fa-edit"></i>
                                          </div>
                                      </a>
                                      <div>
                                        <form action="{{ route('events.destroy', $evento->EventoID) }}" method="POST">

                                          @csrf
                                          @method('DELETE') 

                                        <div>
                                            <button class="w-35px h-35px cursor-pointer text-gray-500 flex items-center text-sm justify-center rounded-full hover:bg-red-600 hover:text-white duration-300" type="submit" onclick="return confirm('¿Seguro que desea eliminar el evento?')"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                        </form> 
                                        
                                      </div>
                                  </div>
                                </td>
                              </tr>
                            @endforeach
                            <!-- More people... -->
                          </tbody>
                        </table>

                        <div class="mt-10">

                          {{-- {{ $blogs->links() }} --}}

                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>

    </div>

    

@endsection