<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\auxiliarCrud;
use App\Ticket;
use App\User;
use App\Http\Requests\TicketRequest;

class TicketController extends Controller
{
    use auxiliarCrud;

    private $pathViews;

    private $pathRoute;

    public function __construct()
    {
        $this->pathViews = "admin.ticket.";
        $this->pathRoute = "tickets.";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isTechnical())
        {
            $tickets = Ticket::where("technical_id","=",auth()->user()->id)->paginate(9);
        }
        else if(auth()->user()->isCLient())
        {
            $tickets = Ticket::where("client_id","=",auth()->user()->id)->paginate(9);
        }
        else
        {
            $tickets = Ticket::paginate(9);
        }

        return view($this->pathViews."index",compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = User::clients();

        $technicals = User::technicals();

        return view($this->pathViews."create",compact('clients','technicals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        $data = $request->all();

        ticket::create($data);

        return redirect()->route($this->pathRoute."index")->with("Success","Ticket creado exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view($this->pathViews."show",compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $clients = User::all();

        $technicals = User::all();

        return view($this->pathViews."edit",compact('ticket','clients','technicals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketRequest $request, Ticket $ticket)
    {
        $data = $this->deleteCampNull($request);

        $ticket->update($data);

        return redirect()->route($this->pathRoute."show",$ticket->id)->with("success","Usuario editado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route($this->pathRoute."index")->with("success","Usuario eliminado correctamente");
    }
}
