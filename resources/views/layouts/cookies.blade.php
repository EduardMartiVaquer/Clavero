<div id="cookies">
    <div class="container text-center">
        <h6 class="inline-block">Utilizamos cookies propias y de terceros para mejorar nuestros servicios y mostrarle publicidad relacionada con sus preferencias mediante el análisis de sus hábitos de navegación. Si continua navegando, consideramos que acepta su uso. Puede cambiar la configuración u obtener más información <a href="cookies">Aquí</a></h6>
        <form action="accept_cookies" class="inline-block" method="post">
            {{csrf_field()}}
            <button class="btn btn-primary btn-sm" id="acceptCookies">Aceptar</button>
        </form>
    </div>
</div>