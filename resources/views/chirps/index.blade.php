<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chirps') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{route('chirps.store')}}">
                        @csrf
                        <textarea  name="message" id="message" class="block w-full rounded-md border-day-300 bg-white shadow-sm transition-colors duration-300 focus:border-indigo-300 dark:focus:ring-indigo-200 dark:focus:ring-opacity-gray-50 dark:bg-gray-600 dark:bg-gray-800 dark:text-white dark:focus-border-indigo-300" placeholder="Escribe tu mensaje">
                            {{old('message')}}
                        </textarea>
                        <x-input-error :messages="$errors->get('message')"
                                       class="mt-2"/>
                        <x-primary-button class="mt-4">chirp</x-primary-button>
                    </form>
                </div>
            </div>
            <!-- aqui se mostratar el listado de chirps  -->
            <div class="mt-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dak:divide-gray-900">
                @foreach($chirps as $chirp)
                    <div class="p-6 flex space-x-2">
                        <!-- https://heroicons.dev/  -->
                        <svg class="h-6 w-6 text-gray-600 dark:text-gray-400 -sacale-x-100"   data-slot="icon"  fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"></path>
                        </svg>
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-gray-800 dark:text-gray-200"> {{$chirp->user->name}} </span>
                                    <small class="ml-2 text-sm text-gray-600 dark:text-gray-400"> {{$chirp->created_at->diffForHumans()}} <span class="text-orange-500">--</span> {{$chirp->created_at->format('Y-m-d')}} <span class="text-indigo-500">//</span> {{$chirp->created_at->format('j M Y. g:i a')}}   </small>
                                </div>
                            </div>
                            <p class="mt4 text-lg text-gray-900 dark:text-gray-100 "> {{$chirp->message}}</p>

                            <br>
                            <a href="{{route('chirps.edit',$chirp)}}"> {{__('Edit Chirp')}} </a>
                        </div> <!-- fin de flex-1  -->
                        <x-edit-button href="{{route('chirps.edit',$chirp)}}"> {{__('Edit Chirp')}}  </x-edit-button>
                    </div><!-- end p-6   -->
                @endforeach
            </div>
        </div>
    </div>



</x-app-layout>


