<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm p-10 sm:rounded-lg">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="py-5 px-4 bg-red-500 text-white font-bold">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    
                <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                    @csrf

                    <h1 class="text-indigo-950 text-3xl font-bold">Add New Product</h1>
            
                    <div class="mt-4">
                        <x-input-label for="cover" :value="__('Cover')" />
                        <x-text-input id="cover" class="block mt-1 w-full" type="file" name="cover" required />
                        <x-input-error :messages="$errors->get('cover')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="path_file" :value="__('path_file')" />
                        <x-text-input id="path_file" class="block mt-1 w-full" type="file" name="path_file" required />
                        <x-input-error :messages="$errors->get('path_file')" class="mt-2" />
                    </div>
                    
                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autofocus autocomplete="price" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="category" :value="__('Category')" />
                        <select name="category_id" id="category" class="w-full py-3 pl-5 border">
                            <option value="">Select category</option>
                            @forelse ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @empty
                            @endforelse
                        </select>
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="about" :value="__('Description')" />
                        <textarea name="about" id="about" class="w-full py-3 pl-5 border"
                        >{{ old('about') }}</textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <div class="mt-4" 
                        x-data="{ 
                            open: false, 
                            selected: [],          // Stores selected tool IDs
                            selectedNames: [],     // Stores selected tool names
                            tools: {{ Js::from($tools) }},
                            updateSelectedNames(id, name, isChecked) {
                                if (isChecked) {
                                    this.selected.push(id);
                                    this.selectedNames.push(name);
                                } else {
                                    this.selected = this.selected.filter(item => item !== id);
                                    this.selectedNames = this.selectedNames.filter(item => item !== name);
                                }
                            }
                        }" 
                        @click.away="open = false">

                        <x-input-label for="tools" :value="__('Tools')" />

                        <!-- Trigger (Displays selected tool names) -->
                        <div @click="open = !open"
                            class="w-full border border-gray-300 rounded px-4 py-2 bg-white cursor-pointer text-sm flex items-center justify-between">
                            <template x-if="selectedNames.length">
                                <span class="flex flex-wrap gap-1">
                                    <template x-for="(name, index) in selectedNames" :key="index">
                                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded flex items-center">
                                            <span x-text="name"></span>
                                            <button type="button" 
                                                @click.stop="updateSelectedNames(selected[index], name, false)"
                                                class="ml-1 text-blue-500 hover:text-blue-700">
                                                &times;
                                            </button>
                                        </span>
                                    </template>
                                </span>
                            </template>
                            <template x-if="!selectedNames.length">
                                <span class="text-gray-400">Select Tools</span>
                            </template>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>

                        <!-- Hidden inputs for form submission -->
                        <template x-for="(value, index) in selected" :key="index">
                            <input type="hidden" name="tools[]" :value="value">
                        </template>

                        <!-- Dropdown Checkbox -->
                        <div x-show="open" x-transition
                            class="absolute z-10 mt-1 w-[625px]  border border-gray-300 bg-white rounded shadow-lg max-h-60 overflow-y-auto text-sm">
                            <template x-for="tool in tools" :key="tool.id">
                                <label class="flex items-center px-4 py-2 hover:bg-gray-50 cursor-pointer">
                                    <input type="checkbox"
                                        class="rounded text-blue-600 focus:ring-blue-500 mr-3"
                                        :value="tool.id"
                                        x-model="selected"
                                        @change="updateSelectedNames(tool.id, tool.name, $event.target.checked)"
                                        :checked="selected.includes(tool.id)">
                                    <span x-text="tool.name" class="text-gray-700"></span>
                                </label>
                            </template>
                        </div>

                        <x-input-error :messages="$errors->get('tools')" class="mt-2" />
                    </div>


                    <div class="mt-4" 
                        x-data="{ 
                            open: false,
                            searchQuery: '',
                            selected: [],          // Stores selected tag IDs
                            selectedNames: [],     // Stores selected tag names
                            tags: {{ Js::from($tags) }},
                            get filteredTags() {
                                return this.tags.filter(tag => 
                                    tag.name.toLowerCase().includes(this.searchQuery.toLowerCase())
                                );
                            },
                            updateSelectedNames(id, name, isChecked) {
                                if (isChecked) {
                                    this.selected.push(id);
                                    this.selectedNames.push(name);
                                } else {
                                    this.selected = this.selected.filter(item => item !== id);
                                    this.selectedNames = this.selectedNames.filter(item => item !== name);
                                }
                            }
                        }" 
                        @click.away="open = false">

                        <x-input-label for="tags" :value="__('Tags')" />

                        <!-- Trigger (Displays selected tags as pills) -->
                        <div @click="open = !open"
                            class="w-full border border-gray-300 rounded px-4 py-2 bg-white cursor-pointer text-sm flex items-center justify-between min-h-[42px]">
                            <template x-if="selectedNames.length">
                                <span class="flex flex-wrap gap-1">
                                    <template x-for="(name, index) in selectedNames" :key="index">
                                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded flex items-center">
                                            <span x-text="name"></span>
                                            <button type="button" 
                                                @click.stop="updateSelectedNames(selected[index], name, false)"
                                                class="ml-1 text-blue-500 hover:text-blue-700">
                                                &times;
                                            </button>
                                        </span>
                                    </template>
                                </span>
                            </template>
                            <template x-if="!selectedNames.length">
                                <span class="text-gray-400">Select Tags</span>
                            </template>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>

                        <!-- Hidden inputs for form submission -->
                        <template x-for="(value, index) in selected" :key="index">
                            <input type="hidden" name="tags[]" :value="value">
                        </template>

                        <!-- Dropdown Checkbox with search -->
                        <div x-show="open" x-transition
                            class="absolute z-10 mt-1 w-[625px] border border-gray-300 bg-white rounded shadow-lg max-h-60 overflow-y-auto text-sm">
                            <template x-for="tag in filteredTags" :key="tag.id">
                                <label class="flex items-center px-4 py-2 hover:bg-gray-50 cursor-pointer">
                                    <input type="checkbox"
                                        class="rounded text-blue-600 focus:ring-blue-500 mr-3"
                                        :value="tag.id"
                                        x-model="selected"
                                        @change="updateSelectedNames(tag.id, tag.name, $event.target.checked)"
                                        :checked="selected.includes(tag.id)">
                                    <span x-text="tag.name" class="text-gray-700"></span>
                                </label>
                            </template>
                        </div>

                        <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                    </div>
            
                    <div class="flex items-center justify-end mt-4">
            
                        <x-primary-button class="ms-4">
                            {{ __('Add Product') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
