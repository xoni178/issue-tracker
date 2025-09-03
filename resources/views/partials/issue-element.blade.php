<div class="grid grid-cols-9 items-center gap-[10px] border">
    <div class="h-full border-r-[1px] flex justify-center items-center"><a href="/project/{{$project->id}}/issue/{{$issue->id}}">Open</a></div>
    <div class="h-full border-r-[1px] flex justify-center items-center"><p>{{$issue->title}}</p></div>
    <div class="h-full border-r-[1px] flex justify-center items-center"><p>{{$issue->status}}</p></div>
    <div class="h-full border-r-[1px] flex justify-center items-center"><p>Assignee</p></div>
    <div class="h-full border-r-[1px] flex justify-center items-center">
        @if ($issue->due_date == null)
            <p>none</p>
        @else 
            <p>{{$issue->due_date}}</p>
        @endif
    </div>
    <div class="h-full border-r-[1px] flex justify-center items-center"><p>{{$issue->priority}}</p></div>
    <div class="h-full border-r-[1px] flex justify-center items-center"><p>Comments</p></div>
    <div class="h-full border-r-[1px] flex justify-center items-center"><p>{{$issue->created_at}}</p></div>
    <div class="h-full border-r-[1px] flex justify-center items-center"><p>{{$issue->updated_at}}</p></div>
</div>