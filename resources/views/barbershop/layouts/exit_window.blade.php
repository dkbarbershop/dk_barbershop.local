    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info">
            <h5 class="modal-title" id="exampleModalLabel">Выход из приложения</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="mx-left ml-3">
               <img src="/img/exit.png" width="50" height="50" alt="logo">
                <span mr-1>Выйти из приложения?</span>
                <!-- <h5>Выйти из приложения?</h5> -->
            </div>
          </div>
          <div class="modal-footer bg-gradient-primary">
            <button class="btn btn-primary" data-dismiss="modal">Нет</button>
            <button class="btn btn-secondary" onclick="on_click_exit_app()">Да</button>
          </div>
        </div>
      </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>