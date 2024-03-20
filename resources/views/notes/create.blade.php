<x-app-layout :title=$title>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900"> 
                    <div class="flex justify-between ps-2 mb-0 ">
                        <h3 class="text-3xl font-bold dark:text-white">Create note</h3></br>
                        <a href="{{route('notes.index')}}" class="focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Back</a>

                    </div>
            
                    <form method="post" action="{{ route('notes.store') }}" class="mt-0 pt-0 space-y-2">
                        @csrf

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autocomplete="title" :value="old('title')" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>


                        <div>
                            <x-input-label for="body" :value="__('Body')" />
                            <x-textarea-input id="body" name="body" class="mt-1 block w-full">
                                {{old('body')}}
                            </x-textarea-input>
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                        </div>
                
                
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Create') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
