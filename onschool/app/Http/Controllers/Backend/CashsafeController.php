<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CashSafe;

class CashsafeController extends Controller
{
    public function index(Request $request)
    {
        $cashes = CashSafe::orderBy('id', 'asc')->paginate();
      
        if(request()->has('order'))
        {
            
            $cashes = CashSafe::orderBy('id', request('order'))->paginate()->appends('order',request('order'));
            
              return view('dashboard.cashes.index', compact('cashes'));
         
        }
        if (request()->has('number'))
        {
            
            $cashes = CashSafe::paginate(request('number'))->appends('number',request('number'));
            
              return view('dashboard.cashes.index', compact('cashes'));
         
        }
      
        return view('dashboard.cashes.index', compact('cashes'));
    }
 
     public function rows(Request $request)
     { 
         if($request->ajax())
         {
             $cashes = CashSafe::when($request->search, function($q) use($request){
                 return $q->where('wages', 'Like','%'. $request->search . '%')
                         ->orWhere('purchases', 'Like','%'. $request->search . '%')
                         ->orWhere('sales', 'Like','%'. $request->search . '%')
                         ->orWhere('pettycash', 'Like','%'. $request->search . '%');
                         })->orderBy('id', 'desc')->paginate(5);
                 
                 return view('Dashboard.cashes.rows', compact('cashes'));
         } else {
                 
                 return view('Dashboard.cashes.index', compact('cashes'));
         }   
                 
     }
     
     public function store(Request $request)
     {
         $data = $request->all();
         
        if($request->ajax())
        { 
         $this->validate($request,[
             'wages' => 'required',
             'purchases' => 'required',
             'pettycash' => 'required',
         ]); 
    
            $cash =  CashSafe::create($data);
            $cash->save();
            
            
            $respons = view('Dashboard\cashes\row', ['cash' => $cash])->render();  

            return response()->json(['status' => 200 , 'result' => $respons]); 
            
         } 
            
            
     }
     
     public function edit($id)
     {
         if(request()->ajax())
         {
             
             $cash = CashSafe::findOrfail($id);
         
             return response()->json($cash);
         }
     
     }
     
     public function update(Request $request)
     {
         $data = $request->all();
         
         if($request->ajax())
         {
  
             $this->validate($request,[
                'wages' => 'required',
                'purchases' => 'required',
                'pettycash' => 'required',
             ]);  
             
                 
             $cash = CashSafe::findOrfail($request->id);
             $cash->update($data);
            
             
             $respons = view('Dashboard\cashes\rowEdit', ['cash' => $cash])->render();  
 
             return response()->json(['status' => 200, 'result' => $respons ]);
         
         }// End OF Ajax
     
     }
     
     
     public function destroy($id)
     {
         if(request()->ajax())
         {
             $cash = CashSafe::findOrfail($id);
             $cash->delete();
             return response()->json(['status' => 200, 'id' => $id]);   
         }
     }
     
     public function multidelete(Request $request)
     {
             $ids =  $request->ids;
             
             //dd($ids);
             
             $cashes = CashSafe::whereIn('id',  explode(",",$ids))->get();
        
             foreach($cashes as $cash) 
             {                
                // dd($cashes); 
                     $cash->delete();
                 
                
             }       
       
             return redirect()->route('cashes.index');
     } // end of destroy multi rows
 
}
