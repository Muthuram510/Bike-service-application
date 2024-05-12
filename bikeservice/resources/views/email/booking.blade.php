@component('mail::message')
    #Booking Confirmation

Thank you for booking our service. Here are the details:

Model:{{ $booking->model }}
Your suggestions:{{ $booking->body }}
Services
@if($booking->option1!=null){{ $booking->option1 }}@endif
@if($booking->option2!=null){{ $booking->option2 }}@endif
@if($booking->option3!=null){{ $booking->option3 }}@endif
Date: {{ $booking->date }}
@endcomponentClass
