<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src='fullcalendar/core/index.global.js'></script>
    <script src='fullcalendar/core/locales/es.global.js'></script>
    <script>
        const days = [
            "Dimanche",
            "Lundi",
            "Mardi",
            "Mercredi",
            "Jeudi",
            "Vendredi",
            "Samedi"
        ]
        const months = [
            "Janvier",
            "Février",
            "Mars",
            "Avril",
            "Mai",
            "Juin",
            "Juillet",
            "Août",
            "Septembre",
            "Octobre",
            "Novembre",
            "Décembre"
        ]

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: false,
                initialView: 'timeGridWeek',
                weekNumberCalculation: 'ISO',
                slotMinTime: "08:00:00",
                slotMaxTime: "20:00:00",
                titleFormat: {
                    // will produce something like "Tuesday, September 18, 2018"
                    month: 'long',
                    year: 'numeric',
                    day: 'numeric',
                    weekday: 'long',
                    // dayHeaders: false,
                },
                eventOverlap: false,
                slotEventOverlap: false,
                selectable: false,
                dateClick: function(info) {
                    alert('Clicked on: ' + info.dateStr);
                },
                slotLabelFormat: {
                    hour12: false,
                    hour: "2-digit",
                    minute: "2-digit",
                },
                dayHeaderFormat: {
                    day: '2-digit',
                    weekday: 'long',
                },
                // slotDuration: "01:00:00",
                // slotLabelInterval: "00:30",
                // weekends: false,
                hiddenDays: [0],
                initialDate: "{{ $startDate }}",
                events:
                    // {
                    //     id: 1,
                    //     title: 1,
                    //     salle: 1,
                    //     start: "2024-11-08T08:00:00",
                    //     end: "2024-11-08T12:00:00",
                    //     prof: "Ratheil HOUNDJI",
                    //     filieres: [
                    //         1, 2, 3
                    //     ],
                    //     backgroundColor: "white",
                    //     textColor: "black"
                    // },
                    @json($courses)
                ,
                eventDidMount: function(info) {
                    //console.log(info.event.extendedProps);
                },
                handleWindowResize: true,
                eventContent: function(info) {
                    //console.log(days[info.event.start.getDay()])
                    //console.log(info.event.start.getHours())
                    // return info.event.title
                    return {
                        html: `
                            <div class="flex flex-col w-full h-full  justify-center items-center">
                                <p class="text-center">${(info.event.start).getHours()}h${(info.event.start).getMinutes()} - ${(info.event.end).getHours()}h${(info.event.end).getMinutes()} : <span class="bg-sky-200 text-sky-700 font-semibold p-1">${info.event.extendedProps.filieres}<span/></p>
                                <p class="text-center">${info.event.title} (${info.event.extendedProps.remaining_hour}h / ${info.event.extendedProps.masseHoraire}h)</p>
                                <p class="text-center">${info.event.extendedProps.salle}</p>
                                <p class="text-center">${info.event.extendedProps.prof}</p>
                            </div>
                        `
                    }
                }
            });

            calendar.render();
            var event = calendar.getEventById('1')
            console.log(event);
        });
    </script>
</head>

<body>
    <div class="my-2 w-full flex justify-around items-center">
        <img src="{{ public_path('images/uac.png') }}" alt="" style="width: 150px;">
        <div>
            <p class="text-xl text-center">UNIVERSITE D'ABOMEY-CALAVI</p>
            <p class="text-xl text-center">INSTITUT DE FORMATION ET DE RECHERCHE EN INFORMATIQUE IFRI – UAC</p>
        </div>
        <img src="https://ifri-uac.bj/assets/img/logoifri.png" alt="" style="width: 150px;">
    </div>
    <div>
        <p class="text-lg text-center">
            <span class="font-semibold">Emploi du temps - Licence 2 : </span>
            @foreach ($filieres as $filiere)
                <span> {{ $filiere }} </span>
            @endforeach
        </p>
        <strong id="strong"></strong>
        <p class="text-lg text-center font-semibold my-5">SEMAINE DU {{ $startDate }}</p>
    </div>
    <div id='calendar' style="width: 100%"></div>
</body>

</html>
