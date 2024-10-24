@props(['return'])
<nav>
    @if ($return)
        <a href="/add">
            <button class="ajouter">
                Ajouter
            </button>
        </a>
    @else
        <a href="/">
            <button class="ajouter">
                retourner
            </button>
        </a>
    @endif
    <form method="GET" action="/">
        <input name="date" class="hiddenYear" type="hidden" autocomplete="off" />
            <input type="text" name="q" autocomplete="off" class="q" />
            <button class="chercher">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
    </form>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        @method('post')
        <button class="deconnecter" type="submit">
            déconnecter
        </button>
    </form>
</nav>
