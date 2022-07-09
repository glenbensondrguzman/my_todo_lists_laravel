<div class="modal fade editActivity" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form wire:submit.prevent="update">
                     <input hidden type="text" wire:model="activity_id">
                     <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control"  placeholder="Description" wire:model="update_description">
                        <span class="text-danger"> @error('update_description') {{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>

                 </form>
                
            </div>
        </div>
    </div>
</div>