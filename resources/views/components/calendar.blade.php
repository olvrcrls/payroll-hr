@props(['id'])
<div id="{{ $id }}"></div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        let calendarId = {!! json_encode($id) !!};
        var calendarEl = document.getElementById(calendarId);
        var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
        });
        calendar.render();
    });
</script>