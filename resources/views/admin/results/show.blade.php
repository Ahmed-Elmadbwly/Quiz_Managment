<x-admin-layout>
    <div class="relative p-6 mt-6 overflow-x-auto mx-auto max-w-4xl shadow-lg rounded-lg bg-white dark:bg-gray-800">
        <h2 class="text-2xl mb-6 font-extrabold text-gray-800 dark:text-gray-100">
            Quiz Results: {{ $quiz->title }}
        </h2>

        <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
            <thead class="text-xs font-semibold uppercase tracking-wider text-gray-700 bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3 border-b">#</th>
                    <th scope="col" class="px-6 py-3 border-b">Student Name</th>
                    <th scope="col" class="px-6 py-3 border-b">Max Score</th>
                    <th scope="col" class="px-6 py-3 border-b">Student Scores</th>
                </tr>
            </thead>
            <tbody>
            @foreach($quiz->attempts as $attempt) 
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-gray-200 whitespace-nowrap">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <img class="w-10 h-10 rounded-full object-cover" src="{{Storage::url('images/'.$attempt->user->image)}}" alt="User image">
                            <span>{{ $attempt->user->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-medium leading-none text-blue-800 bg-blue-100 rounded-full dark:bg-blue-600 dark:text-blue-200">
                            {{ $quiz->getMaxScoreFromQuestions() }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-medium leading-none text-blue-800 bg-blue-100 rounded-full dark:bg-blue-600 dark:text-blue-200">
                            {{ $attempt->score }}
                        </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
