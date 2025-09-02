<div id="issues" class="mt-[50px] pl-[10px] w-[70%]">
    <button
        id="toggle"
        class="rounded-[5px] hover:pointer"
        aria-expanded="false"
        aria-controls="panel"
        >
        Report New Issue
    </button>


    <div id="panel" class="mt-3 hidden border p-[20px]">
        <div class="w-[50%]">
            
            <form action="/project/{{$project->id}}/issue/create" method="POST">
                @csrf
                <div class="flex flex-col mb-[10px]">
                    <label for="title" class="mb-[5px]">Issue Title</label>
                    <input type="text" name="title" id="title" class="border-[1px] rounded px-[5px] py-[3px]" required>

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

    <h2 class="text-2xl font-bold mb-[20px]">Issues</h2>
    @include("partials.issue-element")
</div>



<script>
  const btn = document.getElementById('toggle');
  const panel = document.getElementById('panel');

  btn.addEventListener('click', () => {
    panel.classList.toggle('hidden');
    btn.setAttribute('aria-expanded', String(!panel.classList.contains('hidden')));
  });
</script>