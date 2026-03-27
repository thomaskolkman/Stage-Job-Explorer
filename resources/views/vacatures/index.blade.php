<h1>Vacatures</h1>
<ul>
    @foreach($vacatures as $vacature)
        <li>
            <h2>{{ $vacature->title }}</h2>
            <p>{{ $vacature->description }}</p>
            <p>Bedrijf: {{ $vacature->bedrijf->name }}</p>
        </li>
    @endforeach
