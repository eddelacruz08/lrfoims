<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      slotMinTime: '07:30',
      slotMaxTime: '21:00',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      initialView: 'dayGridMonth',
      initialDate: '<?= date('Y-m-d') ?>',
      navLinks: true, // can click day/week names to navigate views
      editable: false,
      selectable: true,
      nowIndicator: true,
      dayMaxEvents: true, // allow "more" link when too many events
      eventColor: 'sky blue',
      events: [
        <?php foreach ($pending as $details) : ?>
            {
                title: '<?= '['.strtoupper($details['reservation_code']).'] '.strtoupper($details['event_name']) ?>',
                start: '<?= $details['reservation_date'].'T'.$details['reservation_starting_time']?>',
                end: '<?= $details['reservation_date'].'T'.$details['reservation_end_time']?>',
                url: '<?='/reservations/v/'.$details['reservation_id'];?>',
            },
        <?php endforeach?>  
        <?php foreach ($forApprovals as $details) : ?>
            {
                title: '<?= '['.strtoupper($details['reservation_code']).'] '.strtoupper($details['event_name']) ?>',
                start: '<?= $details['reservation_date'].'T'.$details['reservation_starting_time']?>',
                end: '<?= $details['reservation_date'].'T'.$details['reservation_end_time']?>',
                url: '<?='/reservations/v/'.$details['reservation_id'];?>',
                color: 'maroon'
            },
        <?php endforeach?>        
        <?php foreach ($ongoings as $details) : ?>
            {
                title: '<?= '['.strtoupper($details['reservation_code']).'] '.strtoupper($details['event_name']) ?>',
                start: '<?= $details['reservation_date'].'T'.$details['reservation_starting_time']?>',
                end: '<?= $details['reservation_date'].'T'.$details['reservation_end_time']?>',
                url: '<?='/reservations/v/'.$details['reservation_id'];?>',
                color: 'green'
            },
        <?php endforeach?>              
        <?php foreach ($maintenances as $details) : ?>
            {
                title: '<?='[SCHEDULE MAINTENANCE] '.strtoupper($details['description'])?>',
                start: '<?= $details['maintenance_date'].'T'.$details['scheduled_starting_time']?>',
                end: '<?= $details['maintenance_date'].'T'.$details['scheduled_end_time']?>',
                color: 'orange'
            },
        <?php endforeach?>
      ],
    });

    calendar.render();
  });
</script>