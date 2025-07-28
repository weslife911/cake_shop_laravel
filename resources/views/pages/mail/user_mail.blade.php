<h1>
    {{ config("app.name", "Dough Re Mi") }}
</h1>

<div>
    <h1>
        {{ $data["title"] }}
    </h1>
    <p>
        From {{ $data["name"] }} - {{ $data["email"] }}
    </p>

    <p>{{ $data["message"] }}</p>

    <p>Thank you</p>
</div>