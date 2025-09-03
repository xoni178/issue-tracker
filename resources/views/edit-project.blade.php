<x-layout>
    <div class="flex flex-row gap-[20px]">

        @include('partials.sidebar')
        <div class="flex flex-col gap-[30px] w-[80%] p-[20px]">
            <h2>Edit Project: {{ $project->name }}</h2>
            <form action="/projects/{{ $project->id }}" method="POST" class="flex flex-col gap-[10px] w-[50%]">
                @csrf
                @method('PUT')

                <div class="flex flex-col">
                    <label for="name">Edit Name: </label>
                    <input type="text" name="name" value="{{ $project->name }}">
                    @error('name')
                        <p class="text-[#ff0000] text-sm mt-[5px] italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="description">Edit Description: </label>
                    <textarea name="description">{{ $project->description }}</textarea>

                    @error('description')
                        <p class="text-[#ff0000] text-sm mt-[5px] italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="priority">Edit Priority: </label>
                    <select name="priority">
                        <option value="low" {{ $project->priority === 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ $project->priority === 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ $project->priority === 'high' ? 'selected' : '' }}>High</option>
                    </select>

                    @error('priority')
                        <p class="text-[#ff0000] text-sm mt-[5px] italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="due_date">Edit Due date: </label>
                    <input type="date" name="due_date"
                        value="{{ $project->due_date ? $project->due_date->format('Y-m-d') : '' }}">

                    @error('due_date')
                        <p class="text-[#ff0000] text-sm mt-[5px] italic">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-[150px] mt-[30px] hover:cursor-pointer">Save</button>
            </form>
        </div>
    </div>
</x-layout>
