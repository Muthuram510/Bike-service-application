@component('mail::message')
    # Booking Ready for Delivery

    Your booking is now ready for delivery. Please come to our service station to collect your bike.

    Booking Details:
    - Model: {{ $service->model }}
    - Booking Date: {{ $service->date }}

    Thank you for choosing our service.

    Regards,
    John Bike Service Team
@endcomponent
