{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    <h1>{{ $subject }}</h1>
    <p>{{ $mailMessage }}</p>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __("Bienvenue à l'ONFP") }}</title>
</head>

<body>
    <header>
        {{-- <img src="assets/img/logo-onfp.jpg" alt="Logo ONFP" width="150" height="50"> --}}
        <h1>{{ $subject }}</h1>
    </header>

    <body>
        <h3>Salut ,{{ $toUserName }}</h3>
        <h3>Votre formation en {{ $module }} est terminée, vous avez obtenue une note de : {{ $mailMessage }}
        </h3>
        {{-- <a href="#"
            style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; text-decoration: none;">Cliquez ici pour vérifiez
            votre adresse e-mail</a> --}}
        {{-- <p>Une fois votre e-mail vérifié, vous pourrez [énumérer certains avantages de la vérification, par exemple,
            accéder à du contenu exclusif, participer à des discussions].</p>
        <p>Si vous avez des questions, n'hésitez pas à nous contacter à [adresse e-mail d'assistance] ou à visiter notre
            page FAQ :
            [lien vers la page FAQ].</p> --}}
    </body>
    <footer>
        <p>&copy; ONFP {{ date('Y') }}</p>
        {{-- <p><a href="[unsubscribe link]">Se désabonner</a> de nos emails.</p> --}}
    </footer>
</body>

</html>

