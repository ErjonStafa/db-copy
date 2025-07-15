<div class="fixed top-5 right-5">
    <div class="relative">
        @foreach($leftNotifications as $notification)
            @if($notification->get('type', 'success') == 'success')
                <x-dbcopy::notification.success :message="$notification->get('message')"/>
            @elseif($notification->get('type', 'success') == 'error')
                <x-dbcopy::notification.error :message="$notification->get('message')"/>
            @elseif($notification->get('type', 'success') == 'warning')
                <x-dbcopy::notification.warning :message="$notification->get('message')"/>
            @endif
        @endforeach
    </div>
</div>
