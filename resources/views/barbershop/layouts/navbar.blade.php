            <nav class="h-100 navbar navbar-expand-lg sticky-top container-fluid navbar-shadow">
                <div class="mx-left ml-3">
                    @if ( $user_role == 'SuperRoot' )
                        <img src="/img/baner-superroot.png" width="40" height="40" alt="logo">
                    @endif            
                </div>
                <div class="mx-auto" >
                    <span class="app-baner dk-main-class ">{{ config('app.name', 'DK Aplication') }}</span>
                </div>
                <div class="mx-right mr-2"> 
                    <button type="button" class="btn btn-outline-primary dk-main-class" onclick="btn_about_click();">
                        О программе
                    </button>
                </div>
            </nav>