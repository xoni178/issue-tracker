<x-layout>
    <div class="flex flex-row gap-[20px]">
        @include('partials.sidebar')
        <div class="flex flex-col gap-[30px] w-[80%]">


            @include('partials.project-summary', ['project' => $project])

            @include('partials.project-issues', ['project' => $project, 'issues' => $issues])
        </div>
    </div>

</x-layout>
