<x-layout.default>


    {{-- <form action="" method="POST" enctype="multipart/form-data">
        <div class="grid grid-cols-1 sm:flex justify-between">
            <input type="text" placeholder="Task Name" name="task_name" class="form-input" />
            <input type="text" placeholder="Task Link" name ="task_link" class="form-input"/>
        </div>
        <div class="grid grid-cols-2 sm:flex justify-between">
            <input type="text" placeholder="Task Name" name="task_name" class="form-input" />
            <input type="text" placeholder="Task Link" name ="task_link" class="form-input"/>
        </div>
        <button type="button" class="btn btn-primary mt-6">Submit</button>
    </form> --}}
    <div class="panel lg:row-span-3">
        <div class="flex items-center justify-between mb-5">
            <h5 class="font-semibold text-lg dark:text-white-light">@if(empty($task))Add Task @else Edit Task @endif</h5>
        </div>
    @if(empty($task))
    <form class="space-y-5" action="{{ route('task.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @else
        <form class="space-y-5" action="{{route('task.update',$task->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @endif
        <div>
            <label for="taskName">Task Name</label>
            <input type="text" placeholder="Task Name" name="task_name" value="{{!empty($task->task_name) ? $task->task_name:''}}" class="form-input" />
        </div>
        <div>
            <label for="taskLink">Task Link</label>
            <input type="text" placeholder="Task Link" name ="task_link" value="{{!empty($task->task_link) ? $task->task_link:''}}" class="form-input" required />
        </div>
        <div>
            <label for="startDate">Start Date</label>
            @php
             $start_date = "";
             if(!empty($task->task_start_date)){
                 $start_date = date('Y-m-d',strtotime($task->task_start_date));
             }
             $end_date = "";
             if(!empty($task->task_end_date)){
                $end_date = date('Y-m-d',strtotime($task->task_end_date));
             }
            @endphp
            <input type="date"  name="start_date" class="form-input" value="{{$start_date}}" required />
        </div>
        <div>
            <label for="endDate">End Date</label>
            <input type="date"  name="end_date" class="form-input" value="{{$end_date}}" required />
        </div>
        <div>
            <label for="taskSummary">Task Summary</label>
            <textarea id="task_summary" rows="3" name="task_summary" class="form-textarea" required> {{!empty($task->task_summary) ? $task->task_summary:''}}</textarea>
        </div>
        <button type="submit" value="submit" class="btn btn-primary !mt-6">Submit</button>
    </form>
</div>

</x-layout.default>