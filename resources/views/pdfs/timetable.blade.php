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
                slotMaxTime: "19:00:00",
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
                selectable: true,
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
                weekends: false,
                events: [{ // this object will be "parsed" into an Event Object
                        id: '1',
                        title: 'Politique de sécurité des systèmes d’information', // a property!
                        start: new Date('2024-10-30T08:00'), // a property!
                        end: new Date(
                        '2024-10-30T12:00'), // a property! ** see important note below about 'end' **
                        backgroundColor: "white",
                        prof: "E. ASSOGBA",
                        salle: 'PADTICE',
                        filiere: 'SI',
                        textColor: "black",
                        masseHoraire: "/25h",
                        editable: true,
                    },
                    // {
                    //     title: 'Cours de développement web', // a property!
                    //     start: new Date('2024-09-14T09:00'), // a property!
                    //     end: new Date('2024-09-14T14:00'), // a property! ** see important note below about 'end' **
                    //     editable: true,
                    // }
                ],
                eventDidMount: function(info) {
                    console.log(info.event.extendedProps);
                },
                eventContent: function(info) {
                    console.log(days[info.event.start.getDay()])
                    console.log(info.event.start.getHours())
                    // return info.event.title
                    return {
                        html: `
                            <div class="flex flex-col w-full h-full  justify-center items-center">
                                <p class="text-center">${(info.event.start).getHours()}h${(info.event.start).getMinutes()} - ${(info.event.end).getHours()}h${(info.event.end).getMinutes()} : <span class="bg-sky-200 text-sky-700 font-semibold p-1">${info.event.extendedProps.filiere}<span/></p>
                                <p class="text-center">${info.event.title} (${info.event.extendedProps.masseHoraire})</p>
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
        <img src="{{ asset('images/uac.png') }}" alt="" style="width: 150px;">
        <div>
            <p class="text-xl text-center">UNIVERSITE D'ABOMEY-CALAVI</p>
            <p class="text-xl text-center">INSTITUT DE FORMATION ET DE RECHERCHE EN INFORMATIQUE IFRI – UAC</p>
        </div>
        <img src="https://ifri-uac.bj/assets/img/logoifri.png" alt="" style="width: 150px;">
    </div>
    <div>
        <p class="text-lg text-center">
            <span class="font-semibold">Emploi du temps - Licence 2 :</span><span> GL – IA – IM – SI – SE&IoT</span>
        </p>
        <p class="text-lg text-center font-semibold my-5">SEMAINE DU 10 juin 2024</p>
    </div>
    <div id='calendar'></div>
</body>

</html>
