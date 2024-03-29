<!-- BEGIN MENUBAR-->
<div id="menubar" class="menubar-inverse ">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar"
               href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="expanded">
            <a href="{{ url('/') }}">
                <span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>
            </a>
        </div>
    </div>
    <div class="menubar-scroll-panel">

        <!-- BEGIN MAIN MENU -->
        <ul id="main-menu" class="gui-controls">

            <li class="hidden-sm searchbar" style="padding: 0 20px;">
                <form class="navbar-search expanded" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control search" placeholder="Enter your keyword">
                    </div>
                    <button type="button" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                </form>
            </li>

            @foreach($allMenu as $menu)
                <li class="me   nu {{ $menu['class'] ?: '' }}">
                    <a href="{{ $menu['route'] }}">
                        @if(isset($menu['icon']))
                            <div class="gui-icon">
                                <i class="{{ $menu['icon'] }}"></i>
                            </div>
                        @else
                            <div class="gui-icon gui-text">
                                {{ $menu['text'] }}
                            </div>
                        @endif
                        <span class="title">{{ $menu['title'] }}</span>
                    </a>
                    @if(isset($menu['items']))
                        <ul>
                            @foreach($menu['items'] as $item)
                                @if(isset($item['items']))
                                    <li class="gui-folder">
                                        <a href="javascript:void(0);">
                                            <span class="title sub">{{ $item['title'] }}</span>
                                        </a>
                                        <ul>
                                            @foreach($item['items'] as $subItem)
                                                <li>
                                                    <a href="{{ $subItem['route'] }}">
                                                        <span class="title">{{ $subItem['title'] }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li class="sub-menu">
                                        <a href="{{ $item['route'] }}">
                                            <span class="title sub">{{ $item['title'] }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach

        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->

        <div class="menubar-foot-panel">
            <small class="no-linebreak hidden-folded">
{{--                <span class="opacity-75">Copyright &copy; 2014</span> <strong>CodeCovers</strong>--}}
            </small>
        </div>
    </div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->
<!-- END MENUBAR -->
