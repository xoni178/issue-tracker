@include('partials.delete-conformation', ['project' => $project])
<x-layout>
    <div class="flex flex-row gap-[20px]">
        @include('partials.sidebar')
        <div class="flex flex-col gap-[30px] w-[80%]">


            @include('partials.project-summary', ['project' => $project])

            @include('partials.project-issues', ['project' => $project, 'issues' => $issues])
        </div>
        <div>
            <div class=" h-[20px] px-[5px] py-[3px] bg-[#ececec] hover:bg-[#919191] cursor-pointer">
                <a href="/projects/{{ $project->id }}/edit" class="no-underline text-[#000]">Edit</a>
            </div>
            <p onclick="$('#delete-modal').removeClass('hidden')"
                class=" bg-[#e73939] text-[#fff] px-[3px] py-[2px] hover:bg-[#701d1d] cursor-pointer">
                Delete
            </p>

        </div>


    </div>

</x-layout>
