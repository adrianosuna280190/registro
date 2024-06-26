@extends('layouts.app')

@section('content')
    <section class="container mx-auto px-6 pt-6">
        <h1 class="text-2xl bold">Lista de Registro</h1>
        @if (session('status'))
            <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center m-5 ">
                {{ session('status') }}
            </div>
        @endif
    </section>
    <section class="container mx-auto p-6">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr
                            class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Nombre y Puesto</th>
                            <th class="px-4 py-3">Adscripcion</th>
                            <th class="px-4 py-3">Sueldo mensual</th>
                            <th class="px-4 py-3">Telefono</th>
                            <th class="px-4 py-3">Correo</th>
                            <th class="px-4 py-3 text-center">Vista/Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($employees as $employee)
                            <tr class="text-gray-700">
                                <th class="px-4 py-3">{{ ++$i }}</th>
                                <td class="px-4 py-3 border">
                                    <div class="flex items-center text-sm">
                                        <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="https://via.placeholder.com/150"
                                                alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-black">
                                                {{ $employee->first_name . " " . $employee->last_name }}</p>
                                            <p class="text-xs text-gray-600">{{ $employee->title }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm border">{{ $employee->work_department }}</td>
                                <td class="px-4 py-3 text-sm border">${{ $employee->salary }}</td>
                                <td class="px-4 py-3 text-sm border">{{ $employee->telephone }}</td>
                                <td class="px-4 py-3 text-sm border">{{ $employee->email }}</td>
                                <td class="py-6 border flex text-center justify-center">
                                    <a class="px-2" href="employee_show/{{ $employee->id }}"><img style="width:30px"
                                            src="{{ asset('img/view.svg') }}" alt=""></a>
                                    <a class="px-2" href="employee_edit/{{ $employee->id }}"><img style="width:30px"
                                            src="{{ asset('img/edit.svg') }}" alt=""></a>
                                    <a class="px-2" href="employee_destroy/{{ $employee->id }}"><img
                                            style="width:30px;" src="{{ asset('img/delete.svg') }}"
                                            alt=""></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <span>
                {{$employees->links()}}
            </span>
        </div>
    </section>
@endsection
