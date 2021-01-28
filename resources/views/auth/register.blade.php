@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
           <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="sr-only">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Tu nombre"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg
                     @error('nombre') border-red-500 @enderror" value="{{old('nombre')}}"/>

                    @error('nombre')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="sr-only">Nombre de usuario</label>
                    <input type="username" name="username" id="username" placeholder="Tu nombre de usuario"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg
                     @error('username') border-red-500 @enderror" value="{{old('username')}}"/>

                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Tu email"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('email') border-red-500 @enderror" value="{{old('email')}}"/>

                   @error('email')
                       <div class="text-red-500 mt-2 text-sm">
                           {{ $message }}
                       </div>
                   @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Tu contraseña"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('password') border-red-500 @enderror" value=""/>

                   @error('password')
                       <div class="text-red-500 mt-2 text-sm">
                           {{ $message }}
                       </div>
                   @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Repita Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repite tu contraseña"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('password_confirmation') border-red-500 @enderror" value=""/>

                   @error('password_confirmation')
                       <div class="text-red-500 mt-2 text-sm">
                           {{ $message }}
                       </div>
                   @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Registrar
                    </button>
                </div>
           </form>
        </div>
    </div>
@endsection
