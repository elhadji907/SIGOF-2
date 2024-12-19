<x-mail::message>
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Oups!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Bonjour'),<br>
{{ __("Nous vous remercions chaleureusement pour votre inscription et l'intérêt que vous portez à l'ONFP. Vous avez désormais accès à l'ensemble de nos services en ligne, ainsi qu'à nos formations et offres variées.
L’équipe Digital est à votre disposition pour vous guider dans toutes vos démarches et répondre à toutes vos questions. Vous pouvez nous joindre par email à contact@onfp.sn ou par téléphone au (+221) 33 827 92 51.
Nous restons à l'écoute de vos suggestions et besoins, afin de vous offrir un service optimal et adapté.
Bien cordialement,
L’équipe Digital de l'ONFP") }}
@endif

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
@lang(
    "Si vous rencontrez des difficultés pour cliquer sur le \":actionText\" bouton, copiez et collez l'URL ci-dessous\n".
    'dans votre navigateur Web: ',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset
</x-mail::message>
