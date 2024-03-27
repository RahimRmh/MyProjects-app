<div class="card-footer">
    <div class="d-flex">
        <div class="d-flex align-items center">
            <img src="/images/clock.svg" alt="">
            <div class="mr-2">
              
                {{(carbon\carbon::parse($project->created_at) ->diffForHumans())}}
            </div>
        </div>
        <div class="d-flex align-items-center">
            <img src="/images/list-check.svg" alt="">
            <div class="mr-2">
                {{count($project->tasks)}}
            </div>
        </div>  
        <div class="d-flex align-items-center mr-auto">
            <form action=" /projects/{{$project->id}}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" class="btn-delete">
            </form>
        </div>
    </div>
</div>