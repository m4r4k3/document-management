<aside>
    <ul class="buttons">
        <li><a class="rounded-logo" href="/panel" title="panel"><i class="fa-solid fa-house"></i></a></li>
        <li><a class="rounded-logo" href="/panel/utilisateurs" title="utilisteurs"><i class="fa-solid fa-user-tie"></i></a></li>
        <li><a class="rounded-logo" href="/panel/clients" title="clients"><i class="fa-solid fa-users"></i></a></li>
        <li><a class="rounded-logo" href="/panel/documents" title="documents"><i class="fa-solid fa-file"></i></a></li>
        <li><a class="rounded-logo" href="/panel/utilisateurs/ajouter" title="ajouter utilisateur"><i class="fa-solid fa-user-plus"></i></a></li>
        <li><a class="rounded-logo" href="/panel/historique" title="historique"><i class="fa-solid fa-rectangle-history"></i></a></li>
        <li><div class="rounded-logo" title="analyse"><i class="fa-solid fa-chart-mixed"></i></li>
        <li><div class="rounded-logo" title="mon profile"><i class="fa-solid fa-user"></i></div></li>
    </ul>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        @method('post')
        <button class="delete-button" type="submit">
                <div class="rounded-logo"><i class="fa-solid fa-right-from-bracket"></i></div>
        </button>
    </form>
</aside>