<div>
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="ion ion-clipboard mr-1"></i>
            TodoList
          </h3>
          <div class="card-tools">
               @if (count($my_todo_lists))
                   {{ $my_todo_lists->links('dashboards.users.livewire.pagination-links') }}
              @endif
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <ul class="todo-list" data-widget="todo-list">
    
            @forelse ($my_todo_lists as $store)
            <li @if ($store->status=='done') class="done"  @endif  >
              <!-- drag handle -->
              <span class="handle">
                <i class="fas fa-ellipsis-v"></i>
                <i class="fas fa-ellipsis-v"></i>
              </span>
              <!-- checkbox -->
            <div  class="icheck-primary d-inline ml-2" >
                <input wire:click="statusActivityGlen({{ $store->id }})" type="checkbox" id="{{$store->id}}" 
                {{ $store->status=='done' ? 'checked'  : '' }} >
                <label  for="{{$store->id}}"></label>
            </div>
                <span @if ($store->status=='done') style="text-decoration-line: line-through"  @endif >{{ $store->description }}</span>
                <small @if ($store->status=='done')style="background-color: gray" @endif class="badge badge-success">
                  <i class="far fa-clock"></i>{{ \Carbon\Carbon::parse($store->created_at)->diffForHumans()}}
                </small>
            
              <!-- General tools such as edit or delete-->
              <div class="tools">
                <i class="fas fa-edit" wire:click="OpenEditActivityModal({{$store->id}})">Edit</i>
                <i class="fas fa-trash"  wire:click="deleteConfirm({{$store->id}})">Delete</i>
              </div>
            </li>
    
            @empty
            <code>No Activity Added!</code>
            @endforelse
             </ul>

             
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <button type="button" wire:click="OpenAddActivityModal()" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>
        </div>
      </div>
                    {{-- @if (count($my_todo_lists))
                   {{ $my_todo_lists->links('dashboards.users.livewire.pagination-links') }}
              @endif --}}
      @include('dashboards.users.modals.add-modal-activity')
      @include('dashboards.users.modals.edit-modal-activity')  
</div>

