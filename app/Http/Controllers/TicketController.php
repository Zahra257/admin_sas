<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\ticketsDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $user = Auth::user();
        if ($user->role === 'admin') {
            $tickets = Ticket::with(['operator', 'creator', 'service'])->where('organisationId', $user->organisationId)->orderBy('created_at', 'DESC')->get();
        } elseif ($user->role === 'operator') {
            $tickets = Ticket::with(['operator', 'creator', 'service'])->where('assigned_to', $user->id)->orderBy('created_at', 'DESC')->get();
          

        }
        return view('tickets.index' ,compact('tickets'));

    }

    /**
     * Show the form for creating a new resource.
     */
   
    public function show(string $id)
    {
        
        $ticketid = Ticket::findOrFail($id);
        $ticketdetailslist = Ticket::where('id', $ticketid->id)->with(['listdetailsticket.creatormsg', 'creator'])->orderBy('created_at', 'DESC')->get();
     
         return view('tickets.show' ,compact('ticketdetailslist'));


     // return view('tickets.show');

    }
    public function ticketdetailslist(string $id)
    {
        //
        // $ticketid = Ticket::findOrFail($id);
        //  $ticketdetailslist = Ticket::where('id', $ticketid->id)->with(['listdetailsticket.creatormsg', 'creator'])->orderBy('created_at', 'DESC')->get();

        //  return response()->json([$ticketdetailslist]);

      //return view('tickets.show' ,compact('ticketdetailslist'));

    }

    public function store(Request $request , $id)
    {
        $user = Auth::user(); 
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();
        $data['ticketId'] =  $id;
        $data['organisationId'] = $user->organisationId;
        $data['accontId '] = $user->account_id;
        $data['message'] = $request->message;

        

       ticketsDetails::create($data);
       return response()->json([$data]);

        // return view('tickets.show');
    }
    public function destroy(string $id)
    {
        //
        $Ticket = Ticket::findOrFail($id);
        $Ticket->delete();
  
        return redirect()->route('tickets')->with('success', 'user deleted successfully');
    
    }

  
}
