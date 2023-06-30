@props(['id'])
<div id="{{ $id }}"></div>


<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        let calendarId = {!! json_encode($id) !!};
        var calendarEl = document.getElementById(calendarId);
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            selectMirror: false,
            dateClick: function (context) {
                alert('Clicked on: ' + context.dateStr);
            }
        });
        calendar.render();
    });
</script>