<x-layout>
    <div class="flex flex-row gap-[30px]">

        @include('partials.project-summary', ["project" => $project])

        @include('partials.project-issues', ["project" => $project])
    </div>
    
</x-layout>


