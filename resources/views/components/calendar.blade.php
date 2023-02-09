@props(['id'])
<div id="{{ $id }}"></div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        let calendarId = {!! json_encode($id) !!};
        var calendarEl = document.getElementById(calendarId);
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            selectMirror: false,
            dateClick: function (info) {
                alert('Clicked on: ' + info.dateStr);
            }
        });
        calendar.render();
    });
</script>