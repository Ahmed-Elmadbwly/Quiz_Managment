<x-admin-layout>
    <div class="relative mt-6 overflow-x-auto ml-5  mr-5 shadow-md sm:rounded-lg">
    <h2 class="text-title-md3 mb-3 mt-4 font-bold text-black dark:text-white">
        {{ __('Edit Quiz') }}
    </h2>
    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('quiz.update',$content['quizId']) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" name="title" value="{{$content['title']}}" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>

        <div class="mb-6">
            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <input type="text" name="description" value="{{$content['description']}}" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>

            <div class="mb-6">
                <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
                <input  name="time" value="{{ $content['time'] }}" id="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            @foreach($content['questions'] as $question)
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question</label>
                    <input type="text" name="questionText[{{ $question['id'] }}][text]" value="{{ $question['questionText'] }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <input hidden name="questionText[{{ $question['id'] }}][questionId]" value="{{$question['id']}}">
                </div>

                @foreach($question['options'] as $index=>$option)
                    <div class="option-container flex items-center mb-2 ">
                        <input type="text" name="questionText[{{ $question['id'] }}][optionText][{{ $option['id'] }}]" value="{{ $option['optionText'] }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <input type="radio" class="ml-2" name="questionText[{{ $question['id'] }}][isCorrect]" value="{{ $index+1 }}" {{ $option['isCorrect'] == 1 ? 'checked' : '' }}>
                        <label class="ml-2 text-gray-900 dark:text-white">Correct</label>
                    </div>
                @endforeach
            @endforeach

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 rounded-lg text-sm px-5 py-2.5">Save Changes</button>
    </form>
    </div>
</x-admin-layout>
