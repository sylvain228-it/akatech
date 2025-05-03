<div class="border-2 p-4 rounded-[8px] border-gray-400">
    <ul>
        <li class="mb-3"><a href="{{ route('profile') }}"
                class="hover:text-primary hover:ms-2 transition-all duration-300 ease-in-out {{ Request::is('client/profile') ? 'nav-active' : '' }}">Mon
                profil</a></li>
        <hr class="text-gray-400 mb-3">
        <li class="mb-3"><a href="{{ route('payement') }}"
                class="hover:text-primary hover:ms-2 transition-all duration-300 ease-in-out {{ Request::is('client/payement') ? 'nav-active' : '' }}">Investir</a>
        </li>
        <hr class="text-gray-400 mb-3">
        <li class="mb-3"><a href="{{ route('dashboard') }}"
                class="hover:text-primary hover:ms-2 transition-all duration-300 ease-in-out {{ Request::is('client/dashboard') ? 'nav-active' : '' }}">Tableau
                de bord</a></li>
        <hr class="text-gray-400 mb-3">
        <li class="mb-3"><a href="{{ route('transactions') }}"
                class="hover:text-primary hover:ms-2 transition-all duration-300 ease-in-out {{ Request::is('client/transactions') ? 'nav-active' : '' }}">Transactions</a>
        </li>
        <hr class="text-gray-400 mb-3">
        <li class="mb-3"><a href="{{ route('plants') }}"
                class="hover:text-primary hover:ms-2 transition-all duration-300 ease-in-out {{ Request::is('client/plants') ? 'nav-active' : '' }}">Plan
                d'investisment</a>
        </li>
        <hr class="text-gray-400 mb-3">
        <li class="mb-3"><a href="{{ route('guides') }}"
                class="hover:text-primary hover:ms-2 transition-all duration-300 ease-in-out {{ Request::is('client/guides') ? 'nav-active' : '' }}">Guides</a>
        </li>
        <hr class="text-gray-400 mb-3">
        <li class="mb-3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-red-500 font-bold cursor-pointer">Déconnexion</button>
            </form>
        </li>
    </ul>
</div>
