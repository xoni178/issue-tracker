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
                        <ul id="tag-list" class="flex flex-row gap-[5px] list-none p-0 m-0">
                            @foreach ($tags as $tag)
                                <li class="px-[5px] py-[2px] rounded" style="background-color: {{ $tag->color }}">
                                    {{ $tag->name }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <button id="toggle" class="rounded-[5px] mb-[30px]" aria-expanded="false" aria-controls="panel">
                        Create new Tag
                    </button>

                    <div id="panel" class="mt-3 hidden border p-[20px] mb-[30px]">
                        <div class="w-[100%]">

                            <form action="/projects/{{ $project->id }}/issues/{{ $issue->id }}/create-tag"
                                method="POST">
                                @csrf
                                <p class="text-[#ff0000] text-sm mt-[5px] italic" id="error"></p>

                                <div class="flex flex-col mb-[10px]">
                                    <label for="name" class="mb-[5px]">Tag Name:</label>
                                    <input type="text" name="name" id="name"
                                        class="border-[1px] rounded px-[5px] py-[3px]" required>
                                </div>
                                <div class="flex flex-col mb-[10px]">
                                    <label for="color" class="mb-[5px]">color:</label>
                                    <input type="color" name="color" id="color"
                                        class="border-[1px] rounded px-[5px] py-[3px]" required>

                                </div>

                                <button type="button" id="submit">Create Tag</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</x-layout>



<script>
    $('#toggle').on('click', () => {
        $("#panel").toggleClass('hidden');
    });


    $("#submit").on('click', () => {
        console.log('clicked');
        $.ajax({
            type: "POST",
            url: "/projects/{{ $project->id }}/issues/{{ $issue->id }}/create-tag",
            data: {
                name: $('#name').val(),
                color: $('#color').val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#tag-list').append(
                    `<li class="px-[5px] py-[2px] rounded" style="background-color: ${response.color}">${response.name}</li>`
                );
                $("#panel").addClass('hidden');
                $('#name').val('');
                $('#color').val('#000000');
                $('#error').text('');
            },
            error: function(xhr) {
                $('#error').text('Error creating tag: ' + JSON.parse(xhr.responseText).message);
            }
        });
    });
</script>
