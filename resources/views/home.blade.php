<x-layout>
    <div class="flex flex-wrap gap-[50px]">
        @foreach ($projects as $project)
            <x-project-card>{{ $project->name }}</x-project-card>
        @endforeach
    </div>
    <div class="mt-[20px]">
          {{ $projects->links() }}
    </div>
</x-layout>