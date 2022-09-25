@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Popular Games</h2>
            <livewire:popular-games>
        <!-- start of recently reviewed  -->
        <div class="flex flex-col lg:flex-row my-10">
            <div class="recently-reviewed lg:w-3/4 mr-0 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently Reviewed</h2>
                <livewire:recently-reviewed>
            </div>

            <!-- begin of most-anticpated  -->
            <div class="most-anticipated mt-12 lg:w-1/4 lg:mt-0">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Most Anticipated</h2>
                
                <livewire:most-anticipated>
                <h2 class="text-blue-500 mt-10 uppercase tracking-wide font-semibold">Coming soon</h2>     
                <livewire:coming-soon>
            </div>
            
        </div>
    </div> <!-- end of container -->
   

@endsection
