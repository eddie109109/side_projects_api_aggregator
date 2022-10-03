<div  class="relative">    <!-- for the search icon -->
        {{-- the search var will get passed to the controller  --}}
        <div>
            <input wire:model.debounce.300ms="search" type="text" class="bg-gray-800 text-sm rounded-full focus:outline-none focus:shadow-outline w-64 px-3 pl-8 py-1" placeholder="Search..."> 
            <span style="margin-left: -6rem" wire:loading class="absolute">
                loading ...
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
                @else
                    
                @endif
           
                {{-- <li>{{$item['name']}}</li> --}}
                {{-- <li>yes</li> --}}
            @endforelse
        </ul>
    </div>
</div>