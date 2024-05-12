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
        $service = Service::create([
            'model' => $request->model,
            'body' => $request->body,
            'user_id' => Auth::id(),
            'option1' => $request->option1,
            'option2' => $request->option2,
            'option3' => $request->option3,
            'date' => $request->date,
        ]);
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
        $service->update([
            'model' => $request->model,
            'body' => $request->body,
            'status'=>$request->status,
            'date' => $request->date,
        ]);
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
        $service->delete();
        return redirect()->route('service.index')->with('success','Service deleted successfully!');
    }
}
