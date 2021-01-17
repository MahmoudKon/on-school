<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('id', 'asc')->paginate();
      
        if(request()->has('order'))
        {
            
            $categories = Category::orderBy('id', request('order'))->paginate()->appends('order',request('order'));
            
              return view('dashboard.categories.index', compact('categories'));
         
        }
        if (request()->has('number'))
        {
            
            $categories = Category::paginate(request('number'))->appends('number',request('number'));
            
              return view('dashboard.categories.index', compact('categories'));
         
        }
      
        return view('dashboard.categories.index', compact('categories'));
    }//end of index
 
     public function rows(Request $request)
     { 
         if($request->ajax())
         {
             $categories = Category::when($request->search, function($q) use($request){
                 return $q->where('name', 'Like','%'. $request->search . '%');
                         })->orderBy('id', 'desc')->paginate(5);
                 
                 return view('Dashboard.categories.rows', compact('categories'));
         } else {
                 
                 return view('Dashboard.categories.index', compact('categories'));
         }   
                 
     }//end of rows
     
     public function store(Request $request)
     {
         $data = $request->all();
         
        if($request->ajax())
        { 
         $this->validate($request,[
             'name' => 'required|unique:categories,min:3,max:255',
             'font' => 'required',
         ]); 
        
              
               $category =  Category::create($data);
               $category->save();
               
               
               $respons = view('Dashboard/categories/row', ['category' => $category])->render();  
 
               return response()->json(['status' => 200 , 'result' => $respons]); 
               
         } 
            
            
     }//end of store
     
     public function edit($id)
     {
         if(request()->ajax())
         {
             
             $category = Category::findOrfail($id);
         
             return response()->json($category);
         }
     
     }//end of edit
     
     public function update(Request $request)
     {
         $data = $request->all();
         
         if($request->ajax())
         {
             $this->validate($request,[
                 'name' => 'required|unique:categories,min:4',
                 'font' => 'required',
                
             ]);  
             
                 
             $category = Category::findOrfail($request->id)->update($data);
            
             
             $respons = view('Dashboard/categories/rowEdit', ['category' => $category])->render();  
 
             return response()->json(['status' => 200, 'result' => $respons ]);
         
         }// End OF Ajax
     
     }//end of update
     
     
     public function destroy($id)
     {
         if(request()->ajax())
         {
             $category = Category::findOrfail($id)->delete();
 
             return response()->json(['status' => 200, 'id' => $id]);   
         }
     }//end of delete
     
     public function multidelete(Request $request)
     {
             $ids =  $request->ids;
             
             //dd($ids);
             
             $categories = Category::whereIn('id',  explode(",",$ids))->get();
        
             foreach($categories as $category) 
             {                
                // dd($categories);
                 
                $category->delete();
                  
             }       
       
             return redirect()->route('categories.index');
     } // end of destroy multi rows
  
}
