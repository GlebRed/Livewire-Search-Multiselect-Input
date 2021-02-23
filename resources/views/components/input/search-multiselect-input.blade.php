<div>

    <div
        class="relative">
        <input
            type="text"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            placeholder="Search..."
            wire:model="query"
            wire:ignore
        />
        <span wire:loading class="flex absolute right-0 bg-transparent rounded text-base text-gray-600 p-2">
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="#2563EB"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </span>

        @if(!empty($query))
            <div
                class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg">
                <div :class="block">
                    <div class="absolute z-40 left-0 mt-2 w-full">
                        <div class="py-1 text-sm bg-white rounded shadow-lg border border-gray-300">
                            @if(!empty($data))
                                @foreach($data as $i => $item)

                                    <a wire:click="addSelectedItem({{$item['id']}})"
                                       class="block py-1 px-5 cursor-pointer hover:bg-indigo-600 hover:text-white">Add
                                        "<span class="font-semibold">{{$item['name']}}</span>"</a>

                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        @endif
    </div>

    <!-- selections -->
    @if(!empty($selected_items))
        @foreach($selected_items as $selected_item)
            <div class="bg-indigo-100 inline-flex items-center text-sm rounded mt-2 mr-1">
                <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs">{{$selected_item['name']}}</span>
                <button wire:click="removeSelectedItem({{$selected_item['id']}})" type="button"
                        class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none">
                    <svg class="w-6 h-6 fill-current mx-auto" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                              d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z"/>
                    </svg>
                </button>
            </div>
        @endforeach
    @endif


</div>
