<x-layout>

    <div class="flex flex-row gap-[20px]">
        @include('partials.sidebar')
        <div class="grid grid-cols-5 auto-rows-[250px] gap-x-[5px] gap-y-[0px] m-[0px]">
            @if (!$projects->isEmpty())
                @foreach ($projects as $project)
                    <x-project-card :projectid="$project->id">{{ $project->name }}</x-project-card>
                @endforeach
                <div class="mt-[20px] col-span-3">
                    {{ $projects->links() }}
                </div>
            @else
                <p>No projects found.</p>
            @endif

        </div>
    </div>


</x-layout>
