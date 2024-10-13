<x-admin-layout>
    <div
        class="flex flex-col items-center justify-center h-[88vh] bg-gray-100 dark:bg-gray-900 transition-colors duration-300">
        <p class="text-center text-[50px] font-[700] text-blue-600 dark:text-blue-400 animate-bounce">
            Thank You!
        </p>
        <p class="text-center mt-4 text-gray-700 dark:text-gray-300">
            Your submission has been received.
        </p>
        <p class="text-center text-[20px] mt-2 text-green-500 dark:text-green-400 font-semibold animate-pulse">
            The score in the exam: {{ $content['score'] }}
        </p>
    </div>
    <script>
        localStorage.removeItem('timeLeft');
    </script>
</x-admin-layout>
