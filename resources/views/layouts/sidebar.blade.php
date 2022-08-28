 <nav id="sidebar">
     {{-- <div class="sidebar-header">
        <img width="191px" height="100px" src="{{asset('img/logo_cucsh.png')}}" alt="logo">
    </div> --}}

{{-- CAPTURA DE PERSONAL ADMINISTRATIVO (DIRECTIVOS Y COMITE) --}}
     <ul class="list-unstyled components">
         <li>
             <a href="#admonSubmenu" data-toggle="collapse" aria-expanded="false" class="text-white dropdown-toggle">
                 <i class='fa fa-user-circle'></i>
                 Administrativos</a>
             <ul class="collapse list-unstyled" id="admonSubmenu">
                 <li>
                     <a class="text-white" href="{{route('administrativos.create')}}">Captura de Administrativos</a>
                 </li>
                 <li>
                     <a class="text-white" href="{{route('administrativos.index')}}">Consulta de Administrativos</a>
                 </li>
             </ul>
         </li>
{{-- CAPTURA DE ARTICULOS (SE ENVIA OCULTO PARA USO A FUTURO) --}}

         {{-- <li>
             <a href="#articulosSubmenu" data-toggle="collapse" aria-expanded="false" class="text-white dropdown-toggle">
                 <i class='fa fa-book'></i>
                 Artículos</a>
             <ul class="collapse list-unstyled" id="articulosSubmenu">
                 <li>
                     <a class="text-white" href="{{route('articulos.create')}}">Captura de Artículos</a>
                 </li>
                 <li>
                     <a class="text-white" href="{{route('articulos.index')}}">Consulta de Artículo</a>
                 </li>
             </ul>
         </li> --}}

{{-- CAPTURA DE NOVEDADES / COLECCIÓN --}}

         <li>
             <a href="#coleccionSubmenu" data-toggle="collapse" aria-expanded="false" class="text-white dropdown-toggle">
                 <i class='fa fa-clone'></i>
                 Novedades</a>
             <ul class="collapse list-unstyled" id="coleccionSubmenu">
                 <li>
                     <a class="text-white" href="{{route('colecciones.create')}}">Captura de Novedad / Colección</a>
                 </li>
                 <li>
                     <a class="text-white" href="{{route('colecciones.index')}}">Consulta de Novedad / Colección</a>
                 </li>
             </ul>
         </li>

{{-- CAPTURA DE LIBROS --}}

         <li>
             <a href="#librosSubmenu" data-toggle="collapse" aria-expanded="false" class="text-white dropdown-toggle">
                 <i class='fas fa-book-open'></i>
                 Libros</a>
             <ul class="collapse list-unstyled" id="librosSubmenu">
                 <li>
                     <a class="text-white" href="{{route('libros.create')}}">Captura de Libro</a>
                 </li>
                 <li>
                     <a class="text-white" href="{{route('libros.index')}}">Consulta de Libro</a>
                 </li>
             </ul>
         </li>

{{-- CAPTURA DE NOTICIAS (SE ENVIA OCULTO PARA USO A FUTURO) --}}

         {{-- <li>
             <a href="#noticiasSubmenu" data-toggle="collapse" aria-expanded="false" class="text-white dropdown-toggle">
                 <i class='fa fa-newspaper'></i>
                 Noticias</a>
             <ul class="collapse list-unstyled" id="noticiasSubmenu">
                 <li>
                     <a class="text-white" href="{{route('noticias.create')}}">Captura de Noticia</a>
                 </li>
                 <li>
                     <a class="text-white" href="{{route('noticias.index')}}">Consulta de Noticia</a>
                 </li>
             </ul>
         </li> --}}

{{-- CAPTURA DE PUBLICACIONES / REVISTA --}}

         <li>
             <a href="#revistasSubmenu" data-toggle="collapse" aria-expanded="false" class="text-white dropdown-toggle">
                 <i class='fa fa-file'></i>
                 Publicaciones</a>
             <ul class="collapse list-unstyled" id="revistasSubmenu">
                 <li>
                     <a class="text-white" href="{{route('revistas.create')}}">Captura de Publicaciones / Revista</a>
                 </li>
                 <li>
                     <a class="text-white" href="{{route('revistas.index')}}">Consulta de Publicaciones / Revista</a>
                 </li>
             </ul>
         </li>
     </ul>

{{-- HOMEPAGE ADMINISTRADOR --}}

     <ul class="components">
         <li>
             <a href="{{route('admindash')}}" class="text-white">
                 <i class='fa fa-id-badge'></i>
                 Administrador</a>
         </li>
     </ul>
 </nav>
