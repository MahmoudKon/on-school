<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\User;


class UsersController extends Controller
{
   public function index(Request $request)
   {
       $users = User::orderBy('id', 'asc')->paginate();
     
       if(request()->has('order'))
       {
           
           $users = User::orderBy('id', request('order'))->paginate()->appends('order',request('order'));
           
             return view('dashboard.users.index', compact('users'));
        
       }
       if (request()->has('number'))
       {
           
           $users = User::paginate(request('number'))->appends('number',request('number'));
           
             return view('dashboard.users.index', compact('users'));
        
       }
     
       return view('dashboard.users.index', compact('users'));
   }

    public function rows(Request $request)
    { 
        if($request->ajax())
        {
            $users = User::when($request->search, function($q) use($request){
                return $q->where('name', 'Like','%'. $request->search . '%')
                        ->orWhere('role', 'Like','%'. $request->search . '%');
                        })->orderBy('id', 'desc')->paginate(5);
                
                return view('Dashboard.users.rows', compact('users'));
        } else {
                
                return view('Dashboard.users.index', compact('users'));
        }   
                
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        
       if($request->ajax())
       { 
        $this->validate($request,[
            'name' => 'required|min:3,max:255',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'role' => 'required|min:4',
            'image' => 'required'
            
        ]); 
       
             $data = $request->except(['password', 'image','password_confirmation']);
            
            $data['password']= bcrypt($request->password);

            Image::make($request->image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/users_images/' . $request->image->hashName()));

            $data['image'] = $request->image->hashName();

            //dd($data);
            
              $user =  User::create($data);
              $user->save();
              
              
              $respons = view('Dashboard/users/row', ['user' => $user])->render();  

              return response()->json(['status' => 200 , 'result' => $respons]); 
              
        } 
           
           
    }
    
    public function edit($id)
    {
        if(request()->ajax())
        {
            
            $user = User::findOrfail($id);
        
            return response()->json($user);
        }
    
    }
    
    public function update(Request $request)
    {
        $data = $request->all();
        
        if($request->ajax())
        {
 
            $this->validate($request,[
                'name' => 'required|min:3',
                'email' => 'required',
                'role' => 'required|min:4',
               
            ]);  
            
                
            $user = User::findOrfail($request->id);
            
            $data = $request->except(['password', 'image']);
            
            if($request->image) 
             {
                 
               if($request->image != $user->image)
                 {
                    Storage::disk('public_uploads')->delete('/users_images/'. $user->image);
                 }
                 
               Image::make($request->image)->resize(300, null, function ($constraint){
                           $constraint->aspectRatio();
                })->save(public_path('uploads/users_images/' .$request->image->hashName()));

                $data['image'] = $request->image->hashName();
                
             }//end of image
                 
             
             if($request->has('password') && $request->get('password') != '')
             {
                    $data['password'] = bcrypt($request->password);
             }//end of password
            
            
             $user->update($data);
           
            
            $respons = view('Dashboard/users/rowEdit', ['user' => $user])->render();  

            return response()->json(['status' => 200, 'result' => $respons ]);
        
        }// End OF Ajax
    
    }
    
    
    public function destroy($id)
    {
        if(request()->ajax())
        {
            $user = User::findOrfail($id);

            if($user->image != 'defualt.jpg')
            {
              Storage::disk('public_uploads')->delete('/users_images/'. $user->image);  
            }
            
            $user->delete();

            return response()->json(['status' => 200, 'id' => $id]);   
        }
    }
    
    public function multidelete(Request $request)
    {
            $ids =  $request->ids;
            
            //dd($ids);
            
            $users = User::whereIn('id',  explode(",",$ids))->get();
       
            foreach($users as $user) 
            {                
               // dd($users);
                
                 if ($user->image != 'defualt.jpg') 
                {
                    Storage::disk('public_uploads')->delete('/users_images/' . $user->image);    
                    $user->delete();
                
                } 
            }       
      
            return redirect()->route('users.index');
    } // end of destroy multi rows
    
}

