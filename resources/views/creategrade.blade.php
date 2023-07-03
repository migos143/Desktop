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
                    <h3>Enter A Avarage Grade</h3>
                    <div class="flex justify-center">
                        @if(Session::has('studentId'))
                            <div class="alert alert-info">{{ $studentData->id }} grade is saved!. Go to <a href="/dashboard/showStudent/{{ studentData->id }}"></a></div><br>
                        @endif
                        <form action="{{ Route('grade.add', ['id' => $studentData->id ]) }}" class="w-full max-w-md" method="post">
                            @csrf
                            <input type="number" class="sr-only" name="student_id" value="{{ $studentData->id }}">
                            <input type="number" class="border border-gray-300 px-4 py-2 rounded-lg" name="Grade" id="Grade" placeholder="Enter a average grade">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 me-2 rounded">Save Average Grade</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
