<x-app-layout>

    <div class="mt-10  mx-auto w-screen flex flex-col items-center space-y-4">

        <div class="w-[100%] flex justify-center">
            @if (Session::has('success'))
            <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ Session::get('success') }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
                  <span class="sr-only">Dismiss</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                </button>
            </div>
                
            @endif

        </div>

        <div class="w-[100%] flex flex-col justify-center items-center text-white text-xl">
            @foreach ($errors->all() as $error)
    
                <div id="alert-2" class="w-[30%] flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only"></span>
                    <div class="ms-3 text-sm font-medium">
                        {{ $error }}
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    </button>
                </div>
            @endforeach

        </div>

        
        <div class="w-11/12 flex gap-4 justify-between items-center">
            <h2 class="font-bold text-xl">{{ Auth::user()->username }}</h2>
            <div>
                <button class=" p-2 bg-violet-600 hover:bg-violet-900 text-gray-100 font-bold rounded shadow" id="add-btn">
                    Add Question 
                </button>
            </div>
        </div>

        <table class="border-collapse border border-slate-500 w-11/12">
            <thead class="bg-blue-200 text-2xl">
              <tr>
                <th class="border-2 border-slate-600 ">#</th>
                <th class="border-2 border-slate-600 ">Question</th>
                <th class="border-2 border-slate-600 ">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($questions = Auth::user()->questions as $question)
                <tr class="text-center text-sm">
                    <td class="border-2 border-slate-700 ">{{ $loop->index}}</td>
                    <td class="border-2 border-slate-700">{{ $question->question }}</td>
                    <td class="border-2 border-slate-700  ">
                        <div class="flex flex-col w-full gap-1 justify-center items-center">
                            <button class=" p-2 bg-blue-500 hover:bg-blue-900 text-white py-[3px] font-bold rounded shadow" id="edit-btn{{$question->id}}">
                                Edit
                            </button>
                            <button class="p-2 bg-red-500 hover:bg-red-900 text-white  py-[3px] font-bold rounded shadow" id="delete-btn{{$question->id}}">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>

                {{-- Update Modal --}}
                <div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center w-screen" id="editOverlay{{$question->id}}">
                    <div class="bg-gray-200  py-2 px-3 rounded shadow-xl text-gray-800 w-[40%]">
                        <div class="flex justify-between items-center">
                            <h4 class="text-lg font-bold">Edit Questions</h4>
                            <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="editClose-modal{{$question->id}}" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        </div>
                        <form action="/question/{{$question->id}}" method="POST">
                            @csrf 
                            @method('PATCH')
                            <div class="text-sm border-y-2 border-slate-400 flex flex-col space-y-2">
                                <div>
                                    <x-input-label for="email" :value="__('Question')" />
                                    <x-text-input id="question" class="block mt-1 w-full" type="text" name="question" value="{{ $question->question}}" autocomplete="off" />
                        
                                </div>
        
                                <div class="w-[100%] flex space-x-2">
                                    <div class="w-[50%]">
                                        <x-input-label for="a" :value="__('A')" />
                                        <x-text-input id="a" class="block mt-1 w-full" type="text" name="a" value="{{ $question->a}}" autocomplete="off" />
                            
                                    </div>
        
                                    <div class="w-[50%]">
                                        <x-input-label for="b" :value="__('B')" />
                                        <x-text-input id="b" class="block mt-1 w-full" type="text" name="b" value="{{ $question->b }}" autocomplete="off" />
                            
                                    </div>
                                </div>
        
                                <div class="w-[100%] flex space-x-2">
                                    <div class="w-[50%]">
                                        <x-input-label for="c" :value="__('C')" />
                                        <x-text-input id="c" class="block mt-1 w-full" type="text" name="c" value="{{ $question->c }}" autocomplete="off" />
                            
                                    </div>
        
                                    <div class="w-[50%]">
                                        <x-input-label for="d" :value="__('D')" />
                                        <x-text-input id="d" class="block mt-1 w-full" type="text" name="d" value="{{ $question->d }}" autocomplete="off" />
                            
                                    </div>
                                </div>
        
                                <div>
                                    <x-input-label for="answer" :value="__('Answer')" />
                                    <select name="answer" id="answer">
                                        <option value="{{ $question->answer }}" selected>{{ $question->answer }}</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </div>
        
                            </div>
                            <div class="mt-4 flex justify-end space-x-3">
                                <button type="button" onclick="location.href ='/home' " class="px-3 py-1 rounded hover:bg-red-300 hover:bg-opacity-50 hover:text-red-900">Cancel</button>
                                <button type="submit" class="font-bold px-3 py-1 bg-green-800 text-gray-200 hover:bg-green-600 rounded">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Delete Modal --}}
                <div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center w-screen" id="deleteOverlay{{$question->id}}">
                    <div class="bg-gray-200  py-2 px-3 rounded shadow-xl text-gray-800 w-[40%]">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="text-md font-bold">Delete Question: {{ $question->question }} </h4>
                            <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="deleteClose-modal{{$question->id}}" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        </div>
                        <form action="/question/{{$question->id}}" method="POST">
                            @csrf 
                            @method('DELETE')
                          
                           <div id="alert-2" class="w-[100%] flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only"></span>
                            <div class="ms-3 text-sm font-medium ">
                                This action might send you to a jail.
                            </div>
                            
                            </button>
                        </div>
                            <div class="mt-4 flex justify-end space-x-3">
                                <button type="button" onclick="location.href ='/home' " class="px-3 py-1 rounded hover:bg-red-300 hover:bg-opacity-50 hover:text-red-900">Cancel</button>
                                <button type="submit" class="font-bold px-3 py-1 bg-red-800 text-gray-200 hover:bg-red-600 rounded">DELETE ANYWAY</button>
                            </div>
                        </form>
                    </div>
                </div>
        
                <script>
                    window.addEventListener('DOMContentLoaded', () =>{
                            const editoverlay = document.querySelector('#editOverlay{{$question->id}}')
                            const editBtn = document.querySelector('#edit-btn{{$question->id}}')
                            const editcloseBtn = document.querySelector('#editClose-modal{{$question->id}}')
                
                            const toggleModal = () => {
                                editoverlay.classList.toggle('hidden')
                                editoverlay.classList.toggle('flex')
                            }
                
                            editBtn.addEventListener('click', toggleModal)

                            editcloseBtn.addEventListener('click', toggleModal)
                        })

                        window.addEventListener('DOMContentLoaded', () =>{
                            const deleteoverlay = document.querySelector('#deleteOverlay{{$question->id}}')
                            const deleteBtn = document.querySelector('#delete-btn{{$question->id}}')
                            const deletecloseBtn = document.querySelector('#deleteClose-modal{{$question->id}}')
                
                            const toggleModal = () => {
                                deleteoverlay.classList.toggle('hidden')
                                deleteoverlay.classList.toggle('flex')
                            }
                
                            deleteBtn.addEventListener('click', toggleModal)
                
                            deletecloseBtn.addEventListener('click', toggleModal)
                        })
                </script>
                @endforeach
            </tbody>
          </table>
    </div>

    {{-- Add Modal --}}
    <div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center w-screen" id="overlay">
        <div class="bg-gray-200  py-2 px-3 rounded shadow-xl text-gray-800 w-[40%]">
            <div class="flex justify-between items-center">
                <h4 class="text-lg font-bold">Add Questions</h4>
                <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </div>
            <form action="question" method="POST">
                @csrf 
                <div class="text-sm border-y-2 border-slate-400 flex flex-col space-y-2">
                    <div>
                        <x-input-label for="email" :value="__('Question')" />
                        <x-text-input id="question" class="block mt-1 w-full" type="text" name="question" :value="old('email')" autocomplete="off" />
            
                    </div>

                    <div class="w-[100%] flex space-x-2">
                        <div class="w-[50%]">
                            <x-input-label for="answerA" :value="__('A')" />
                            <x-text-input id="answerA" class="block mt-1 w-full" type="text" name="answerA" :value="old('answerA')" autocomplete="off" />
                
                        </div>

                        <div class="w-[50%]">
                            <x-input-label for="answerB" :value="__('B')" />
                            <x-text-input id="answerB" class="block mt-1 w-full" type="text" name="answerB" :value="old('answerB')" autocomplete="off" />
                
                        </div>
                    </div>

                    <div class="w-[100%] flex space-x-2">
                        <div class="w-[50%]">
                            <x-input-label for="answerC" :value="__('C')" />
                            <x-text-input id="answerC" class="block mt-1 w-full" type="text" name="answerC" :value="old('answerC')" autocomplete="off" />
                
                        </div>

                        <div class="w-[50%]">
                            <x-input-label for="answerD" :value="__('D')" />
                            <x-text-input id="answerD" class="block mt-1 w-full" type="text" name="answerD" :value="old('answerD')" autocomplete="off" />
                
                        </div>
                    </div>

                    <div>
                        <x-input-label for="answerD" :value="__('Answer')" />
                        <select name="correctAnswer" id="correctAnswer">
                            <option value="A" selected>A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>

                </div>
                <div class="mt-4 flex justify-end space-x-3">
                    <button type="button" onclick="location.href ='/home' " class="px-3 py-1 rounded hover:bg-red-300 hover:bg-opacity-50 hover:text-red-900">Cancel</button>
                    <button type="submit" class="font-bold px-3 py-1 bg-green-800 text-gray-200 hover:bg-green-600 rounded">+ ADD</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>

   

   
