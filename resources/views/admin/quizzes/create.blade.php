<x-admin-layout>
    <div class="relative p-4 mt-6 overflow-x-auto ml-5  mr-5 shadow-md sm:rounded-lg">
    <h2 class="text-title-md3 mb-3 mt-4 font-bold text-black dark:text-white">
        {{ __('Add Quiz') }}
    </h2>
    <form method="POST" class="m-5" action="{{ route('quiz.store') }}" enctype="multipart/form-data">
        @csrf
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="assignment_input">Title</label>
        <input name="title" value="{{old('title')}}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="assignment_input" type="text">
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
            <label class="block mb-2 m-5 text-sm font-medium text-gray-900 dark:text-white" for="description">Description</label>
            <input name="description" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="text">
            <x-input-error :messages="$errors->get('quizTitle')" class="mt-2" />
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="assignment_input">Quiz Time by minute</label>
            <input name="time" class="block w-full mb-2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="text">
            <x-input-error :messages="$errors->get('time')" class="mt-2" />
            <button type="button" id="add-question-btn" class="text-white bg-blue-500 px-4 py-2 rounded">Add Question</button>
            <div id="questions-container" class="mt-4"></div>
        <div class="flex items-center justify-end mb-4 mr-4">
            <x-primary-button class="ms-4">
                {{ __('Add Quiz') }}
            </x-primary-button>
        </div>
    </form>
    </div>
    <script>
        let questionIndex = 0;
        document.getElementById('add-question-btn').addEventListener('click', function () {
            const questionsContainer = document.getElementById('questions-container');
            questionIndex++;
            let optionIndex = 1;

            const questionBlock = document.createElement('div');
            questionBlock.className = 'question-block mb-4';

            const questionInput = document.createElement('input');
            questionInput.type = 'text';
            questionInput.name = `questionText[${questionIndex}][text]`;
            questionInput.placeholder = 'Enter question';
            questionInput.className = 'bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';

            // Score input
            const scoreInput = document.createElement('input');
            scoreInput.type = 'number';
            scoreInput.name = `questionText[${questionIndex}][score]`;
            scoreInput.placeholder = 'Enter score for this question';
            scoreInput.min = 0; // Ensure score is a non-negative number
            scoreInput.className = 'bg-gray-50 mb-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';

            const optionsContainer = document.createElement('div');
            optionsContainer.className = 'options-container mb-4';

            const addOptionBtn = document.createElement('button');
            addOptionBtn.type = 'button';
            addOptionBtn.className = 'bg-green-500 text-white px-2 py-1 rounded mb-2';
            addOptionBtn.textContent = 'Add Option';
            addOptionBtn.addEventListener('click', function () {
                const optionContainer = document.createElement('div');
                optionContainer.className = 'option-container flex items-center mb-2';

                const optionInput = document.createElement('input');
                optionInput.type = 'text';
                optionInput.name = `questionText[${questionIndex}][optionText][${optionIndex}]`;
                optionInput.placeholder = `Option ${optionIndex}`;
                optionInput.className = 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
                const correctOptionInput = document.createElement('input');
                correctOptionInput.type = 'radio';
                correctOptionInput.name = `questionText[${questionIndex}][isCorrect]`;
                correctOptionInput.value = optionIndex;
                correctOptionInput.className = 'ml-2';

                const correctLabel = document.createElement('label');
                correctLabel.textContent = 'Correct';
                correctLabel.className = 'ml-2 text-gray-900 dark:text-white';

                const removeOptionBtn = document.createElement('button');
                removeOptionBtn.type = 'button';
                removeOptionBtn.className = 'bg-red-500 text-white ml-2 px-2 py-1 rounded';
                removeOptionBtn.textContent = 'Remove';
                removeOptionBtn.addEventListener('click', function () {
                    optionContainer.remove();
                });

                optionContainer.appendChild(optionInput);
                optionContainer.appendChild(correctOptionInput);
                optionContainer.appendChild(correctLabel);
                optionContainer.appendChild(removeOptionBtn);
                optionsContainer.appendChild(optionContainer);

                optionIndex++;
            });

            const removeQuestionBtn = document.createElement('button');
            removeQuestionBtn.type = 'button';
            removeQuestionBtn.className = 'bg-red-500 text-white ml-5 px-2 py-1 rounded mt-2';
            removeQuestionBtn.textContent = 'Remove Question';
            removeQuestionBtn.addEventListener('click', function () {
                questionBlock.remove();
            });

            questionBlock.appendChild(questionInput);
            questionBlock.appendChild(scoreInput);
            questionBlock.appendChild(optionsContainer);
            questionBlock.appendChild(addOptionBtn);
            questionBlock.appendChild(removeQuestionBtn);
            questionsContainer.appendChild(questionBlock);


        });
    </script>
</x-admin-layout>
