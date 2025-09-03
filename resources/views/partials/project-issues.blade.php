<div id="issues" class="mt-[50px] pl-[10px] w-[100%]">
    <h1 class="text-2xl font-bold mb-[20px]">Issues</h1>

    <button id="toggle" class="rounded-[5px] mb-[30px]" aria-expanded="false" aria-controls="panel">
        Report New Issue to Project: {{ $project->name }}
    </button>


    <div id="panel" class="mt-3 hidden border p-[20px] mb-[30px]">
        <div class="w-[50%]">

            <form action="/projects/{{ $project->id }}/issue/create" method="POST">
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
    const btn = document.getElementById('toggle');
    const panel = document.getElementById('panel');

    btn.addEventListener('click', () => {
        panel.classList.toggle('hidden');
        btn.setAttribute('aria-expanded', String(!panel.classList.contains('hidden')));
    });
</script>
