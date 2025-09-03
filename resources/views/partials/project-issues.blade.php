<div id="issues" class="mt-[50px] pl-[10px] w-[100%]">
    <h1 class="text-2xl font-bold mb-[20px]">Issues</h1>

    <button id="toggle" class="rounded-[5px] mb-[30px]" aria-expanded="false" aria-controls="panel">
        Report New Issue to Project: {{ $project->name }}
    </button>


    <div id="panel" class="mt-3 hidden border p-[20px] mb-[30px]">
        <div class="w-[50%]">

            <form action="/projects/{{ $project->id }}/issues/create" method="POST">
                @csrf
                <div class="flex flex-col mb-[10px]">
                    <label for="title" class="mb-[5px]">Issue Title</label>
                    <input type="text" name="title" id="title" class="border-[1px] rounded px-[5px] py-[3px]"
                        required>

                    @error('title')
                        <p class="text-[#ff0000] text-sm mt-[5px] italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mb-[10px]">
                    <label for="description" class="mb-[5px]">Issue Description</label>
                    <textarea rows="4" name="description" id="description" class="border-[1px] rounded px-[5px] py-[3px]" required></textarea>

                    @error('description')
                        <p class="text-[#ff0000] text-sm mt-[5px] italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mb-[10px]">
                    <label for="priority" class="mb-[5px]">Issue Priority</label>
                    <select name="priority" id="priority" required>
                        <option value="" disabled selected hidden>Choose priority</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>

                    @error('priority')
                        <p class="text-[#ff0000] text-sm mt-[5px] italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mb-[10px]">
                    <label for="due_date" class="mb-[5px]">Due Date</label>
                    <input type="date" name="due_date" id="due_date">

                    @error('due_date')
                        <p class="text-[#ff0000] text-sm mt-[5px] italic">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit">Report Issue</button>
            </form>
        </div>
    </div>


    <form action="/projects/{{ $project->id }}" method="GET" class="flex gap-[10px] items-center" autocomplete="off">
        <select name="status" id="status" class="border rounded p-[4px]">
            <option value="">All Statuses</option>
            <option value="open">Open</option>
            <option value="in_progress">In Progress</option>
            <option value="closed">Closed</option>
        </select>

        <select name="priority" id="priority" class="border rounded p-[4px]">
            <option value="">All Priorities</option>
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>

        <select name="tag" id="tag" class="border rounded p-[4px]">
            <option value="">All Tags</option>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">
                    <div class="bg-[{{ $tag->color }}]">
                        {{ $tag->name }}
                    </div>
                </option>
            @endforeach
        </select>

        <!-- Important: buttons are NOT submitters -->
        <button type="submit" id="applyFilters"
            class="bg-[#4744ff] text-[#fff] rounded px-[6px] py-[3px]">Apply</button>
        <a href="/projects/{{ $project->id }}" type="button" id="resetFilters"
            class="border rounded px-[6px] py-[3px] no-underline text-[#000]">Reset</a>
    </form>
    </ul>


    <div>
        <div class="grid grid-cols-9 gap-[10px] border bg-[#a5a5a5]">
            <div class="h-full border-r-[1px] flex justify-center items-center">
                <p>Link</p>
            </div>
            <div class="h-full border-r-[1px] flex justify-center items-center">
                <p>Title</p>
            </div>
            <div class="h-full border-r-[1px] flex justify-center items-center">
                <p>Status</p>
            </div>
            <div class="h-full border-r-[1px] flex justify-center items-center">
                <p>Assignee</p>
            </div>
            <div class="h-full border-r-[1px] flex justify-center items-center">
                <p>Due Date</p>
            </div>
            <div class="h-full border-r-[1px] flex justify-center items-center">
                <p>Priority</p>
            </div>
            <div class="h-full border-r-[1px] flex justify-center items-center">
                <p>Comments</p>
            </div>
            <div class="h-full border-r-[1px] flex justify-center items-center">
                <p>Created At</p>
            </div>
            <div class="h-full border-r-[1px] flex justify-center items-center">
                <p>Updated At</p>
            </div>
        </div>
        @if ($issues->count() > 0)
            @foreach ($issues as $issue)
                @include('partials.issue-element', ['issue' => $issue, 'project' => $project])
            @endforeach
        @else
            <p>No issues found for this project.</p>
        @endif

    </div>
</div>



<script>
    $('#toggle').on('click', () => {
        $("#panel").toggleClass('hidden');
        $('#toggle').setAttribute('aria-expanded', String(!$("#panel").hasClass('hidden')));
    });
</script>
