@props(['unapproved'=>''])

<a {{ $attributes->merge(['class' => 'text-decoration-none'.$unapproved,'href' => '#']) }}>
    {{ $slot }}
</a>
