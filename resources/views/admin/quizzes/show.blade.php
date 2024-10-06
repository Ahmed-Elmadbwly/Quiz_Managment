<x-admin-layout>
    <div class="relative p-4 mt-6 overflow-x-auto ml-5  mr-5 shadow-md sm:rounded-lg">
    <h2 class="text-title-md3 mb-3 mt-4 font-bold text-black dark:text-white">
        {{ __('Show Quiz') }}
    </h2>
     <div class="mb-6">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
        <input type="text" disabled value="{{$content['title']}}" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-6">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <input type="text" id="title" disabled value="{{$content['description']}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
        <div class="mb-6">
            <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
            <input  disabled value="{{$content['time']}}" id="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question</label>
    @foreach($content['questions'] as $question)
            <div class="mb-6">
                <div class="mb-6 flex justify-between">
                    <input type="text" disabled value="{{$question['questionText']}}" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <input type="text" disabled value="{{$question['score']}}" id="question" class="bg-gray-50 border ml-3 text-center w-20 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="flex flex-wrap justify-between mb-6">
                @foreach($question['options'] as $option)
                <div>
                    <input type="text" style="{{$option['isCorrect'] == 1 ?'border: #2db82d 4px solid;' :''}}" disabled value="{{$option['optionText']}}" id="option" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                @endforeach
            </div>
            @endforeach
    </div>
</x-admin-layout>
