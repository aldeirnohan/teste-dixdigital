<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('DD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('Teste DIXDIGITAL') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>

            <li @if ($pageSlug == 'profile') class="active " @endif>
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ _('User Profile') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'users') class="active " @endif>
                <a href="{{ route('users.index')  }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ _('User Management') }}</p>
                </a>
            </li>

            <li @if ($pageSlug == 'news') class="active " @endif>
                <a href="{{ route('news.index')  }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ _('News Management') }}</p>
                </a>
            </li>

        </ul>
    </div>
</div>
