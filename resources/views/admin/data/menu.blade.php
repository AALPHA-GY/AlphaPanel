  <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                <li>
                        <a href="{{route('moduller')}}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Modul Yönetimi</span>
                        </a>
                        
                 </li>
                    <li class="nav-label">Sayfalar</li>
                    @isset($moduller)

                    @foreach($moduller as $modul)
                    <li>
                        <a href="{{route('liste',$modul->seflink)}}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">{{$modul->baslik}}</span>
                        </a>
                        
                     </li>
                    @endforeach
                    @endisset
                   <li>
                       <a href="{{route('ayarlar')}}"aria-expanded="false">
                       <i class="icon setting menu-icon"></i><span class="nav-text">Ayarlar</span>
                       </a>
                    </li>
                
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
