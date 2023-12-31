<!-- profile menu mobile start -->
<div class="profile-content">
    <div class="profile-menu-mobile">
        <button class="btn-menu-mobile" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasWithBothOptionsMenuMobile" aria-controls="offcanvasWithBothOptionsMenuMobile">
            <span class="icon"><i class="fa-solid fa-bars"></i></span>
        </button>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1"
            id="offcanvasWithBothOptionsMenuMobile">
            <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                    <span class="icon"><i class="fa-solid fa-xmark"></i></span>
                </button>
            </div>
            <div class="offcanvas-body">
                <!-- profile menu start -->
                <div class="profile-menu">
                    <!-- profile menu head start -->
                    <div class="profile-menu-head">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img class="img-fluid rounded-circle"
                                    src="{{ showImage(@$data['organization']->user->image->original, 'default-1.jpeg') }}"
                                    width="60" alt="profile image" />
                            </div>
                            <div class="flex-grow-1">
                                <div class="body">
                                    <h2 class="title">{{ @$data['organization']->user->name }}</h2>
                                    <p class="paragraph">{{ @$data['organization']->designation }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- profile menu head end -->
                    <!-- profile menu body start -->
                    <div class="profile-menu-body">
                        <nav>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ menu_active_by_url(route('organization.admin.edit', [$data['organization']->id, 'general'])) }}"
                                        href="{{ route('organization.admin.edit', [$data['organization']->id, 'general']) }}">
                                        {{ ___('common.General') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  {{ menu_active_by_url(route('organization.admin.edit', [$data['organization']->id, 'security'])) }}"
                                        href="{{ route('organization.admin.edit', [$data['organization']->id, 'security']) }}">
                                        {{ ___('organization.Security') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  {{ menu_active_by_url(route('organization.admin.edit', [$data['organization']->id, 'skill'])) }}"
                                        href="{{ route('organization.admin.edit', [$data['organization']->id, 'skill']) }}">
                                        {{ ___('organization.Skills & Expertise') }}
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- profile menu body end -->
                </div>
                <!-- profile menu end -->
            </div>
        </div>
    </div>
</div>

<!-- profile menu mobile end -->
<div class="new-profile-content">
    <div class="profile-menu">
        <div class="table-basic table-content mb-24">
            <div class="card">
                <div class="card-body pb-0">
                    {{-- Profiel Head --}}
                    <div class="profile-menu-head mb-10 pb-0">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3 w-60 h-60">
                                <img class="img-fluid rounded-circle"
                                    src="{{ showImage(@$data['organization']->user->image->original, 'default-1.jpeg') }}"
                                    width="60" alt="profile image" />
                            </div>
                            <div class="flex-grow-1">
                                <div class="body">
                                    <h2 class="title">{{ @$data['organization']->user->name }}</h2>
                                    <p class="paragraph">{{ @$data['organization']->designation }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Organization Profile --}}
                    <div class="table-basic table-content">
                        <nav>
                            <ul class="nav nav-pills">
                                <li class="nav-item dropdown">
                                    <a class="nav-link {{ menu_active_by_url(route('organization.admin.edit', [$data['organization']->id, 'general'])) }}"
                                        href="{{ route('organization.admin.edit', [$data['organization']->id, 'general']) }}">
                                        {{ ___('common.General') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  {{ menu_active_by_url(route('organization.admin.edit', [$data['organization']->id, 'security'])) }}"
                                        href="{{ route('organization.admin.edit', [$data['organization']->id, 'security']) }}">
                                        {{ ___('organization.Security') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  {{ menu_active_by_url(route('organization.admin.edit', [$data['organization']->id, 'skill'])) }}"
                                        href="{{ route('organization.admin.edit', [$data['organization']->id, 'skill']) }}">
                                        {{ ___('organization.Skills & Expertise') }}
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- profile menu body end -->
    </div>
</div>
