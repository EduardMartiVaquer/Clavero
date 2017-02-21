<div id="signInModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Entrar</h3>
            </div>

            <div class="modal-body">
                <div class="container-fluid">

                    <form class="form-signin text-center" action="auth/login" method="post">
                        {!! csrf_field() !!}
                        <input type="email" id="inputEmail" name="email" class="styled-input" placeholder="Email.." required autofocus><br>
                        <input type="password" id="inputPassword" name="password" class="styled-input" placeholder="Contraseña.." required><br>
                        <a href="password/reset">He olvidado mi contraseña</a>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"> Recordarme
                            </label>
                        </div>

                        <button class="styled-button background-color-blue center-block" type="submit">Entrar</button>

                    </form>

                </div> <!-- /container -->
            </div>

        </div>
    </div>
</div> <!-- /modal -->