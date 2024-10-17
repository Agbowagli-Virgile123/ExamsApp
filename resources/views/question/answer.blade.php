<x-app-layout>
    <div class="h-screen flex flex-col space-y-5 justify-center items-center">
        <div class="w-[50%] flex justify-center space-x-4">
            <div class="font-bold"><span class="text-violet-600">Correct: </span>{{ Session::get('correctans') }}</div>
            <div class="font-bold"><span class="text-violet-600">Incorrect: </span>{{ Session::get('wrongans') }}</div>
            <div class="font-bold"><span class="text-violet-600">Result:
                </span>{{ Session::get('correctans') }}/{{ Session::get('correctans') + Session::get('wrongans') }}</div>
        </div>

        @php
            $width = Session::get('correctans') * 10;
        @endphp

        <div class="w-[500px] flex flex-col justify-center items-center space-y-5 p-2">
            <div class="bg-white-500 w-[100%] h-10 border-2 border-black/60">
                <div class="bg-blue-500 w-[50%] h-[100%]"></div>
            </div>

            @if ($width > 50)
                <div class="bg-white-500 w-[100%] h-10 border-2 border-black/60">
                    <div class="bg-green-500 w-[{{ $width }}%] h-[100%]"></div>
                </div>
            @elseif($width  == 50)
                <div class="bg-white-500 w-[100%] h-10 border-2 border-black/60">
                    <div class="bg-blue-500 w-[{{ $width }}%] h-[100%]"></div>
                </div>
            @else
                <div class="bg-white-500 w-[100%] h-10 border-2 border-black/60">
                    <div class="bg-red-500 w-[{{ $width }}%] h-[100%]"></div>
                </div>
            @endif
        </div>

        <div>
            <button onclick="location.href='/home'"
                class=" p-2 bg-violet-600 hover:bg-violet-900 text-gray-100 font-bold rounded shadow" id="add-btn">
                Finish Quiz
            </button>
        </div>
    </div>
</x-app-layout>
