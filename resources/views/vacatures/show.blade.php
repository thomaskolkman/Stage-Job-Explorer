<x-guest-layout>
<h1>Show Vacature</h1>
<p>Title: {{ $vacature->title }}</p>
<p>Description: {{ $vacature->description }}</p>
<p>Start Date: {{ $vacature->start_date }}</p>
<p>Spots Available: {{ $vacature->spots_available }}</p>
<p>Company: {{ $vacature->bedrijf->name }}</p>
<p>Location: {{ $vacature->location }}</p>
<a href="{{ route('vacatures.index') }}">Back to Vacatures</a> <!-- deze link gaat terug naar de vacatures index pagina waar je alle vacatures kunt zien -->
</x-guest-layout>