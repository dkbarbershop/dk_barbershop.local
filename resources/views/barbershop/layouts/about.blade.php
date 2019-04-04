    <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="about" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header dk-main-class">
            <h5 class="modal-title">О программе</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="mx-left ml-3">
               <!-- <img src="img/exit.png" width="50" height="50" alt="logo"> -->
                <span mr-1>Role : {{$user_role}}</span><br \>
                <span mr-1>Barbershop v 1.0.0</span>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn dk-main-class" data-dismiss="modal">Ok</button>
            <!-- <button class="btn btn-secondary" >Да</button> -->
          </div>
        </div>
      </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>