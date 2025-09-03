<x-layout>
    <div class="flex flex-row gap-[20px]">
        @include('partials.sidebar')
        <div class="w-[100%]">
            <a href="/projects/{{ $project->id }}">Back to project...</a>
            <h3>Project {{ $project->name }}</h3>
            <div class="flex flex-row gap-[15px]">
                <div>
                    <h4 class="mb-[0]">Issue</h4>
                    <h2 class="text-[30px] mt-[0]">{{ $issue->title }}</h2>
                    <p></p>
                    <p class="text-[17px]">{{ $issue->description }}</p>


                </div>
                <div class="border p-[10px] ml-[150px]">
                    <h4>Details</h4>
                    <p>Status: {{ $issue->status }}</p>
                    <p>Priority: {{ $issue->priority }}</p>
                    @if ($issue->due_date == null)
                        <p>Due Date: none</p>
                    @else
                        <p>Due Date: {{ $issue->due_date }}</p>
                    @endif

                    @if ($tags == null)
                        <p>No tags</p>
                    @else
                        <p>Tags:</p>
                        <ul class="flex flex-row gap-[5px] list-none p-0 m-0">
                            @foreach ($tags as $tag)
                                <li class="px-[5px] py-[2px] rounded" style="background-color: {{ $tag->color }}">
                                    {{ $tag->name }}
                                </li>
                            @endforeach
                        </ul>
                    @endif


                </div>
            </div>
        </div>
    </div>

</x-layout>
