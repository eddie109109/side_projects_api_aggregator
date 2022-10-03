<div  class="relative">    <!-- for the search icon -->
        {{-- the search var will get passed to the controller  --}}
        <div>
            <input wire:model.debounce.300ms="search" type="text" class="bg-gray-800 text-sm rounded-full focus:outline-none focus:shadow-outline w-64 px-3 pl-8 py-1" placeholder="Search..."> 
            <span style="margin-left:-6rem" wire:loading class="absolute">
                <div role="status">
                    <svg aria-hidden="true" class="ml-12 mt-1 w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </span>
                      
        </div>
        

    <div  class="absolute top-1 flex items-center ml-2"> 
        <svg class="fill-current text-gray-400 w-5" xmlns="http://www.w3.org/2000/svg" ><path d="M0 0h24v24H0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
        </svg>
    </div>
    
    <div class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2">
        <ul>            
            @forelse ($searchResult as $item)
            <li class="border-b border-gray-700">
                <a  href={{route('games.show', $item['slug'])}} class="flex hover:bg-gray-700 transition ease-in-out duration-150 items-center">
                        <img class="w-12" src={{str_replace('thumb', 'cover_small',$item['cover']['url'])}} alt="">
                        <span class="ml-4">{{$item['name']}}</span>
                </a>
            </li>
            @empty
                @if (Str::length($search) > 1)
                    <div class="m-2 border-gray-700 items-center justify-center text-center">
                        <span>Search item "{{$search}}" not found</span>
                    </div>
                @endif
            @endforelse
        </ul>
    </div>
</div>