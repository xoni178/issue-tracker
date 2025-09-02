<x-layout>
    <div>
        <h1 class="text-2xl font-bold mb-[20px]">Create New Project</h1>
        <form action="/projects" method="POST" class="flex flex-col gap-[10px] w-[300px]">
            @csrf
            <div class="flex flex-col">
                <label for="name" class="mb-[5px]">Project Name</label>
                <input type="text" name="name" id="name" class="border-[1px] rounded px-[5px] py-[3px]" required>
            </div>
            <div class="flex flex-col">
                <label for="description" class="mb-[5px]">Description</label>
                <textarea name="description" id="description" rows="4" class="border-[1px] rounded px-[5px] py-[3px]" required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white rounded px-[10px] py-[5px] mt-[10px]">Create Project</button>
        </form>
    </div>
</x-layout>