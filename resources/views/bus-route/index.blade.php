@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Bus Routes</h1>
<hr class="h-1 bg-red-500">

<div class="text-right my-5">
    <a href="{{ route('bus-route.create') }}" class="bg-blue-900 text-white px-5 py-3 rounded-lg">Add Bus Route</a>
</div>

<table class="w-full mt-5">
    <thead>
        <tr>
            <th class="border p-2 bg-gray-200">Priority</th>
            <th class="border p-2 bg-gray-200">Route Name</th>
            <th class="border p-2 bg-gray-200">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($busRoutes as $busRoute)
        <tr class="text-center">
            <td class="border p-2">{{ $busRoute->priority }}</td>
            <td class="border p-2">{{ $busRoute->name }}</td>
            <td class="border p-2">
                <a href="{{ route('bus-route.edit', $busRoute->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded">Edit</a>
                <button class="bg-red-600 text-white px-3 py-1 rounded cursor-pointer" onclick="showPopup('{{ $busRoute->id }}')">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Popup Modal --}}
<div class="fixed bg-gray-600 inset-0 bg-opacity-50 backdrop-blur-sm hidden items-center justify-center" id="popup">
    <form action="" method="POST" class="bg-white px-10 py-5 rounded-lg text-center" id="deleteForm">
        @csrf
        @method('DELETE')
        <h3 class="font-bold mb-5 text-lg">Are you sure you want to delete this route?</h3>
        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded">Yes! Delete</button>
            <button type="button" class="bg-red-600 text-white px-3 py-1 rounded" onclick="hidePopup()">Cancel</button>
        </div>
    </form>
</div>
{{-- End of Popup Modal --}}

<script>
    function showPopup(routeId) {
        const form = document.getElementById('deleteForm');
        form.action = `/bus-route/${routeId}`;
        document.getElementById('popup').classList.remove('hidden');
        document.getElementById('popup').classList.add('flex');
    }

    function hidePopup() {
        document.getElementById('popup').classList.remove('flex');
        document.getElementById('popup').classList.add('hidden');
    }
</script>
@endsection
