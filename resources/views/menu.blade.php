<link rel="stylesheet" href="../css/menu.css">
<nav>
    <a class="nav-style-a" href="{{route('index')}}">Consulter les hebergements</a>
    @auth
        @if(Auth::user()->TYPECOMPTE == 'adm')
            <a class="nav-style-a" href="{{route('list-utilisateurs')}}">Consulter tous les utilisateurs</a>
        @endif
    @endauth
    @auth
        @if(Auth::user()->TYPECOMPTE == 'ges')
            <a class="nav-style-a" href="{{route('ajouter-un-hebergement')}}">Ajouter un hébérgement</a>
        @endif
    @endauth
    @auth
        @if(Auth::user()->TYPECOMPTE == 'ges' || Auth::user()->TYPECOMPTE == 'vac')
            <a class="nav-style-a" href="{{route('index')}}">Réserver</a>
        @endif
    @endauth
    @auth
        @if(Auth::user()->TYPECOMPTE == 'ges')
            <a class="nav-style-a" href="{{route('reservations')}}">Voir les réservations</a>
        @endif
    @endauth
    @guest
        <a class="nav-style-a" href="{{route('auth.login')}}">Se connecter</a>
    @endguest
    @auth
        <p class="name-user">{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
        <form action="{{route('auth.logout')}}" method="post">
            @method("delete")
            @csrf
            <button class="deconnexion-btn">Se déconnecter</button>
        </form>
    @endauth
</nav>
