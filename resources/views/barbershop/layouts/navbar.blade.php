            <div class="row vh-main-top" >
                <nav class="navbar navbar-expand-lg sticky-top container-fluid p-0 m-0" >
                    <div class="mx-left ml-3">
                       <img src="img/baner-img.png" width="40" height="40" alt="logo">
                    </div>
                    <div class="mx-auto" >
                        <span class="app-baner ">{{ config('app.name', 'DK Aplication') }}</span>
                    </div>
                    <div class="mx-right mr-2"> 
                        <button type="button" class="btn btn-outline-primary " 
                            onclick="
                            event.preventDefault();
                            document.getElementById('logout-form').submit(); 
                        ">
                            Выход
                        </button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                        </form>
                    </div>
                </nav>
            </div>