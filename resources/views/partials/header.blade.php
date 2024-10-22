@php
    $links = [
        [
            'url' => route('home'),
            'label' => 'Home',
            'active' => true,
        ],
        [
            'url' => route('about'),
            'label' => 'Chi siamo',
            'active' => true,
        ],
        [
            'url' => route('pastas.index'),
            'label' => 'Paste',
            'active' => true,
        ],
        [
            'url' => '/contatti',
            'label' => 'Contatti',
            'active' => false,
        ],
    ];
@endphp

<header>
    <nav>
        <ul>
            @foreach ($links as $link)
                <li>
                    @if ($link['active'])
                        <a href="{{ $link['url'] }}">
                            {{ $link['label'] }}
                        </a>
                    @else
                        <del>
                            {{ $link['label'] }}
                        </del>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
</header>
