<x-app-layout>
    <div class="h-screen flex flex-col space-y-5 justify-evenly items-center">
        <div class="text-6xl font-bold text-violet-500 uppercase">Welcome {{ Auth::user()->username }}</div>
        <div class="font-bold text-5xl">Are You Ready ?</div>
       <div>
            <button onclick="location.href = '/start-quiz'" class=" p-2 bg-violet-600 hover:bg-violet-900 text-gray-100 font-bold rounded shadow" id="add-btn">
                Start Quiz
            </button>
       </div>
    </div>
</x-app-layout>
