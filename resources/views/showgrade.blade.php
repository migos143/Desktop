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
                    <table class="table-auto min-w-full">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr class="border">
                                <th scope="col" class="px-6 py-4">Full name</th>
                                <th scope="col" class="px-6 py-4">Age</th>
                                <th scope="col" class="px-6 py-4">Email</th>
                                <th scope="col" class="px-6 py-4">Subject</th>
                                <th scope="col" class="px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b dark:border-neutral-500 border">
                                <td class="whitespace-nowrap px-6 py-4 text-center">{{ $studentData->name }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-center">{{ $studentData->age }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-center">{{ $studentData->email }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-center">{{ $studentData->subject }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-center">
                                    
                                    @if (App\Models\grade::where('student_id', $studentData->id)->exists())
                                        <a href="{{ Route('editGrade', ['id' => $studentData->id ]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 me-2 rounded">
                                            Edit Grade
                                        </a>
                                    @else
                                        <a href="{{ Route('create.Grade', ['id' => $studentData->id ]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 me-2 rounded">
                                            Add Grade
                                        </a>
                                    @endif

                                    @if (App\Models\grade::where('student_id', $studentData->id)->exists())
                                        <a href="{{ Route('view.GradeStudent', ['id' => $studentData->id ]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 me-2 rounded">
                                            View Grade
                                        </a>
                                    @endif
                                   
                                    <a href="{{ Route('deleteStudent', ['id' => $studentData->id ]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        @csrf
                                        @method('DELETE')
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <!-- <tr class="text-center">
                                <td></td>
                                <td>
                                    <form action="{{ Route('create.Grade', ['id' => $studentData->id ]) }}">
                                        @csrf
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 me-2 rounded">Save Average Grade</button>
                                    </form>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
