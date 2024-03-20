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
                        <h3 class="text-3xl font-bold dark:text-white">Edit note</h3></br>
                        <a href="{{route('notes.index')}}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Back</a>

                    </div>
            
                    <form method="post" action="{{ route('notes.update', $note->id) }}" class="mt-0 pt-0 space-y-2">
                        @csrf
                        @method('patch')
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autocomplete="title" :value="old('title', $note->title)" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>


                        <div>
                            <x-input-label for="body" :value="__('Body')" />
                            <x-textarea-input id="body" name="body" class="mt-1 block w-full">
                                {{old('body', $note->body)}}
                            </x-textarea-input>
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                        </div>
                
                
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
