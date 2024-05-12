<?php

namespace App\Http\Controllers;

use App\Events\BookingMade;
use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Mail\booked;
use App\Mail\BookingReadyForDeliveryNotification;
use App\Models\Service;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //checks if the user is admin or not
        if (Gate::allows('isAdmin')) {
            // User has admin role, fetch all service
            $services = Service::select('model', 'date','option1','option2','option3','status', 'created_at', 'id')->paginate(10);
        } else {
            // User is not authorized to view all service, fetch only their own service
            $services = Service::select('model', 'date','option1','option2','option3','status', 'created_at', 'id')->where('user_id', Auth::id())->paginate(10);
        }
        return view('service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ServiceStoreRequest $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(ServiceStoreRequest $request)
    {
        //to book a service for customer
        $service = Service::create([
            'model' => $request->model,
            'body' => $request->body,
            'user_id' => Auth::id(),
            'option1' => $request->option1,
            'option2' => $request->option2,
            'option3' => $request->option3,
            'date' => $request->date,
        ]);

        //event will trigger once the booking is created and mail send to John
        event(new BookingMade($service));
        return redirect()->route('service.index')->with('success','Service created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param Service $service
     * @return Application|Factory|View
     */
    public function show(Service $service)
    {
        //to show the details of booking
        return view('service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Service $service
     * @return Application|Factory|View
     */
    public function edit(Service $service)
    {
        return view('service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ServiceUpdateRequest $request
     * @param Service $service
     * @return Application|RedirectResponse|Redirector
     */
    public function update(ServiceUpdateRequest $request, Service $service)
    {
        //to update the details and status as ready for delivery or completed by John
        $service->update([
            'model' => $request->model,
            'body' => $request->body,
            'status'=>$request->status,
            'date' => $request->date,
        ]);
        //if john update the status as ready for delivery then mail will be sent to particular user mail
        $user=User::findorfail($service->user_id);
        if($service->status=='Ready for delivery') {
            Mail::to($user->email)->send(new BookingReadyForDeliveryNotification($service));
        }
        return redirect()->route('service.index')->with('success','Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $blog
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Service $service)
    {
        //to delete a booking by john
        $service->delete();
        return redirect()->route('service.index')->with('success','Service deleted successfully!');
    }
}
