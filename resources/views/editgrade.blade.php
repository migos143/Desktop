<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-7xl p-6 text-gray-900">
                    @foreach($studentData as $data)
                        <form action="{{ Route('grade.update', ['id' => $data->id ]) }}" method="POST">
                            @csrf
                            <input type="number" name="Grade" id="Grade" value="{{ $data->Grade }}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 me-2 rounded">Save Grade</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>