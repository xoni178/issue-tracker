<div class="position-absolute top-0 left-0 w-full h-full bg-[#000] bg-opacity-[30%] flex justify-center items-center hidden"
    id="delete-modal">
    <div class="bg-[#fff] p-[20px] rounded w-[400px]">
        <h2 class="text-[20px] mb-[10px]">Confirm Deletion</h2>
        <p class="mb-[20px]">Are you sure you want to delete "{{ $project->name }}" project? This action cannot be
            undone.
        </p>
        <div class="flex justify-end gap-[10px]">
            <form method="POST" action="/projects/{{ $project->id }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-[#f00] text-[#fff] px-[10px] py-[5px] rounded  hover:bg-[#5a0000] h-[40px]">Delete</button>
            </form>
            <button onclick="$('#delete-modal').addClass('hidden')"
                class="bg-[#d6d6d6] text-black px-[10px] py-[5px] rounded hover:bg-[#919191] h-[40px]">Cancel</button>
        </div>
    </div>

</div>
