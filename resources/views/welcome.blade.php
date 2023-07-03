<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Partenze</title>

    @vite('resources/js/app.js')
</head>


<body class="antialiased bg-slate-700">
    <div class="flex flex-col justify-center items-center h-screen">
        <div>
            <div class="flex justify-between">
                <span class="text-3xl text-gray-300 font-bold p-2">PARTENZE
                </span>
                <span id="time" class="text-3xl  text-end text-gray-300 font-bold p-2">
                </span>
            </div>
            <table class="bg-slate-900 border-4 border-slate-500">
                <thead>
                    <tr class="text-yellow-400 text-left">
                        <th scope="col" colspan="2">Treno</th>
                        <th scope="col">Destinazione</th>
                        <th scope="col">Orario</th>
                        <th scope="col">Ritardo</th>
                        <th scope="col">Carrozze</th>
                        <th scope="col">Binario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trains as $train)
                        <tr class="text-yellow-500">
                            <td>{{ ucfirst($companies[$train->azienda_id]) }}</td>
                            <td>{{ $train->codice_treno }}</td>
                            <td>{{ ucfirst($train->stazione_di_arrivo) }}</td>

                            {{-- slice della stringa per non far visualizzare i secondi --}}
                            <td>{{ substr($train->orario_di_partenza, 0, -3) }}</td>
                            <td>
                                {{ $train->ritardo }}
                            </td>
                            <td>{{ $train->numero_carrozze }}</td>
                            <td>{{ $train->binario }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // funzione che genera l'orologio
        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
            setTimeout(startTime, 1000);
        }

        // sottofunzione che gestisce i numeri a una cifra minori di 10
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            };
            return i;
        }

        startTime();
    </script>
</body>

</html>
