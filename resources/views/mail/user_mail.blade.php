<h1>
    {{ config("app.name", "Dough Re Mi") }}
</h1>

<div>
    <h1>
        {{ $mail_data["title"] }}
    </h1>
    <p>
        From {{ $mail_data["name"] }} - {{ $mail_data["email"] }}
    </p>

    <p>{{ $mail_data["message"] }}</p>

    <p>Thank you</p>
</div>