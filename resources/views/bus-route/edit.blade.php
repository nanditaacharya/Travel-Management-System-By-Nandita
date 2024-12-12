@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Edit Bus Route</h1>
<hr class="h-1 bg-red-500">

<form action="{{ route('bus-route.update', $busRoute->id) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Ensure the method matches your route -->


    <!-- Priority Input -->
    <input
        type="text"
        placeholder="Enter Priority"
        name="priority"
        class="w-full rounded-lg my-2"
        value="{{$busRoute->priority}}"
    >
    @error('priority')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <!-- Route Name Input -->
    <input
        type="text"
        placeholder="Enter Route Name"
        name="name"
        class="w-full rounded-lg my-2"
        value="{{$busRoute->name}}"
    >
    @error('name')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <!-- Description Input -->
    <textarea
        placeholder="Enter Route Description"
        name="description"
        class="w-full rounded-lg my-2"
    >{{$busRoute->description}}</textarea>
    @error('description')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <div class="flex mt-4 justify-center gap-4">
        <!-- Submit Button -->
        <input
            type="submit"
            value="Update Bus Route"
            class="bg-blue-600 text-white px-5 py-3 rounded-lg cursor-pointer"
        >

        <!-- Exit Button -->
        <a
            href="{{route('bus-route.index')}}"
            class="bg-red-600 text-white px-10 py-3 rounded-lg"
        >Exit</a>
    </div>
</form>

@endsection
