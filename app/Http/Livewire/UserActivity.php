<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\MyTodoLists;
use Livewire\WithPagination;
use Auth;
use App\Models\User;


class UserActivity extends Component
{
    use WithPagination;
    public $user_id,$description, $update_description,$activity_id;
    protected $listeners = ['delete', 'render']; //magagamit sa ibang components for new update
    public function render()
    {
         // return view('livewire.user-activity');
        return view('dashboards.users.livewire.user-activity',[
            'my_todo_lists'=>MyTodoLists::where('user_id',Auth::user()->id)
                                        ->orderBy('id','desc')
                                        // ->get()
                                        ->paginate(10)
        ]);
    }

    public function OpenAddActivityModal(){
        $this->description = '';
        $this->dispatchBrowserEvent('OpenAddActivityModal');
    }


    public function save(){
        // dd('CHECK');
        $this->validate([
             'description'=>'required'

        ]);
         $user_id=Auth::user()->id;
         $save = MyTodoLists::insert([
              'user_id'=>$user_id,
              'description'=>$this->description,
              'status'=>'undone',
              'created_at'=>now()->toDateTimeString(),              
        ]);

        if($save){
            $this->dispatchBrowserEvent('CloseAddActivityModal');
            // $this->checkedCountry = [];
        }
    }

    public function OpenEditActivityModal($id){
        $info = MyTodoLists::find($id);
        $this->update_description = $info->description;
        $this->activity_id = $info->id;
        $this->dispatchBrowserEvent('OpenEditActivityModal',[
            'id'=>$id
        ]);
    }

    public function update(){
        $activity_id = $this->activity_id;
        $this->validate([
              'update_description'=>'required'
        ],[
            'update_description.required'=>'Enter Activity',
            // 'update_description.unique'=>'Activity Name Already Exists'
        ]);

        $update = MyTodoLists::find($activity_id)->update([
            'description'=>$this->update_description
        ]);

        if($update){
            $this->dispatchBrowserEvent('CloseEditActivityModal');
        }
    }

    public function deleteConfirm($id){
        $info = MyTodoLists::find($id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete activity <strong>'.$info->description.'</strong>',
            'id'=>$id
        ]);
    }


    public function delete($id){
        $del =  MyTodoLists::find($id)->delete();
        if($del){
            $this->dispatchBrowserEvent('deleted');
        }
    }


    public function statusActivityGlen($id){
        $statusActivity = MyTodoLists::find($id);
        if ($statusActivity->status =='done') {
            MyTodoLists::find($id)->update([
                'status'=>'undone'
                
            ]);
            $this->emitSelf('render');
        } else {
            MyTodoLists::find($id)->update([
                'status'=>'done'
            ]);
            $this->emitSelf('render');
        }
    }

    

}
