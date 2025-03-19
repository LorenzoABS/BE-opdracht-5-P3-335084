<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Geleverde Producten</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Overzicht Geleverde Producten</h1>
        <form class="flex justify-between mb-8" method="GET" action="{{ url('/product') }}">
            <div class="flex flex-col">
                <label for="startdatum" class="mb-2 text-gray-700">Startdatum:</label>
                <input type="date" id="startdatum" name="startdatum" required class="p-2 border border-gray-300 rounded">
            </div>
            <div class="flex flex-col">
                <label for="einddatum" class="mb-2 text-gray-700">Einddatum:</label>
                <input type="date" id="einddatum" name="einddatum" required class="p-2 border border-gray-300 rounded">
            </div>
            <div class="flex items-end">
                <button type="submit" class="p-2 bg-green-500 text-white rounded hover:bg-green-600">Maak Selectie</button>
            </div>
        </form>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Naam Leverancier</th>
                    <th class="py-2 px-4 border-b">Contact Persoon</th>
                    <th class="py-2 px-4 border-b">Product Naam</th>
                    <th class="py-2 px-4 border-b">Totaal Geleverd</th>
                    <th class="py-2 px-4 border-b">Specificatie</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data) > 0)
                    @foreach($data as $item)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b">{{ $item->LeverancierNaam }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->ContactPersoon }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->ProductNaam }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->Aantal }}</td>
                            <td class="py-2 px-4 border-b">?</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="py-2 px-4 border-b text-center">Er zijn geen leveringen geweest van producten in deze periode</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>