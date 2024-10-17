<x-app-layout>
    <form action="/answer" method="POST">
        @csrf
        <div class="h-screen flex flex-col space-y-5 justify-center items-center">
            <div class="w-[50%] flex flex-col justify-center items-center space-y-4">
                <div class="font-bold "><span class="text-violet-600">Question: </span>{{Session::get('nextq')}}</div>
                <div class="text-start w-[100%] font-bold text-3xl">{{$question->question}}</div>
                <div class="flex flex-col justify-start w-[100%] space-y-2">
                    <div class="font-semibold space-x-2">
                        <input type="radio"  name="answer" value="A" class="cursor-pointer" checked>
                        <span class="text-violet-800">(A)</span>
                        <span>{{$question->a}}</span>
                    </div>
                    <div class="font-semibold space-x-2">
                        <input type="radio" name="answer" value="B" class="cursor-pointer">
                        <span class="text-violet-800">(B)</span>
                        <span>{{$question->b}}</span>
                    </div>
                    <div class="font-semibold space-x-2">
                        <input type="radio" name="answer" value="C" class="cursor-pointer">
                        <span class="text-violet-800">(C)</span>
                        <span>{{$question->c}}</span>
                    </div>
                    <div class="font-semibold space-x-2">
                        <input type="radio" name="answer" value="D" class="cursor-pointer">
                        <span class="text-violet-800">(D)</span>
                        <span>{{$question->d}}</span>
                    </div>
                    <div class="font-semibold space-x-2">
                        <input value="{{$question->answer}}" name="dbanswer" class="hidden">
                        
                    </div>
                </div>
                <div>
                    <button type="submit" class=" p-2 px-4 bg-violet-600 hover:bg-violet-900 text-gray-100 font-bold rounded shadow" >
                        Next
                    </button>
            </div>
            </div>
        
        </div>
    </form>
</x-app-layout>
