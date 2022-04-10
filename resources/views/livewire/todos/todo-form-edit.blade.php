<div>
    {{-- ####### The modal of Edit form ####### --}}
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            Edit {{ $todoTitle }} Todo
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div id="todoSaveForm">
            @csrf
            <div class="form-group">
                <label>Todo Title</label>
                <input wire:model="todoTitle" type="text" class="form-control @error('todoTitle') is-invalid @enderror">
            </div>
            @error('todoTitle')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1">Todo Description</label>
                <textarea wire:model="todoDescription" class="form-control @error('todoDescription') is-invalid @enderror" rows="3"></textarea>
            </div>
            @error('todoDescription')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div>
                <button wire:click="edit({{ $todoId }})" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
