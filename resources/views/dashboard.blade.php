@extends('template')
@section('content')

    <div class="max-w-screen-2xl w-full mx-auto px-4 sm:px-6 lg:px-8 px-4 sm:px-6 lg:px-8 mt-12">
        <div class="d-flex align-items-center justify-center text-center py-[72px]">
            <img src="{{asset('images/adminIcon.svg')}}" class="max-w-[440px] mx-auto mb-[20px]" alt="">
            <h1 class="text-[26px] font-[600] mb-[10px] text-[#21325B]">¡Hola! Bienvenido Al Panel de Administracion</h1>
            <p class="max-w-[60%] mx-auto text-[#677788] font-[400] mb-[30px]">En este apartado podrás modificar toda la informacion de la pagina, acciones como Elimiar, Actualizar, Agregar o Ver las entradas e información que se muestran en la página son modificadas desde este CRM. <br><br> ¡Ve a uno de los apartados en el panel izquierdo para empezar a modificar!</p>
            <h3><a href="/" class="block py-2 px-6 bg-[#21325B] w-[fit-content] mx-auto rounded-[4px] text-white hover:bg-[#182542] duration-500">Visita Salud En Foco</a></h3>
        </div>
    </div>

@endsection