<?php $__env->startComponent('mail::message'); ?>
    # Booking Ready for Delivery

    Your booking is now ready for delivery. Please come to our service station to collect your bike.

    Booking Details:
    - Model: <?php echo e($service->model); ?>

    - Booking Date: <?php echo e($service->date); ?>


    Thank you for choosing our service.

    Regards,
    John Bike Service Team
<?php echo $__env->renderComponent(); ?>
<?php /**PATH D:\bike service\Bike-service-application\bikeservice\resources\views/email/booking_ready.blade.php ENDPATH**/ ?>