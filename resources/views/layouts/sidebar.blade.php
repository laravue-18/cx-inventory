<!---- Mobile Menu ---->
<div class="menu-mobile menu-activated-on-click color-scheme-dark" style="min-height: 100vh;">
    <div class="mm-logo-buttons-w">
        <a class="mm-logo" href="index.html"><img src="/img/logo.png"></a>
        <div class="mm-buttons">
            <div class="content-panel-open">
                <div class="os-icon os-icon-grid-circles"></div>
            </div>
            <div class="mobile-menu-trigger">
                <div class="os-icon os-icon-hamburger-menu-1"></div>
            </div>
        </div>
    </div>
    <div class="menu-and-user">
        <div class="logged-user-w">
            <div class="avatar-w">
                <img alt="" src="/img/avatar1.jpg">
            </div>
            <div class="logged-user-info-w">
                <div class="logged-user-name">
                    Maria Gomez
                </div>
                <div class="logged-user-role">
                    Administrator
                </div>
            </div>
        </div>

        @include('layouts.menu')

    </div>
</div>

<!-- Menu -->
<div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link" style="min-height: 100vh;">
    <div class="logo-w">
        <a class="logo" href="/">
            <img src="/img/logo-big.png" alt="" class="w-100">
        </a>
    </div>
    <div class="logged-user-w avatar-inline">
        <div class="logged-user-i">
            <div class="avatar-w">
                <img alt="" src="/img/avatar1.jpg">
            </div>
            <div class="logged-user-info-w">
                <div class="logged-user-name">
                    {{ auth()->user()->name }}
                </div>
                <div class="logged-user-role">
                    Administrator
                </div>
            </div>
            <div class="logged-user-toggler-arrow">
                <div class="os-icon os-icon-chevron-down"></div>
            </div>
        </div>
    </div>
    <div class="menu-actions">
        <div class="messages-notifications os-dropdown-trigger os-dropdown-position-right">
            <i class="os-icon os-icon-mail-14"></i>
            <div class="new-messages-count">
                12
            </div>
            <div class="os-dropdown light message-list">
                <ul>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w">
                                <img alt="" src="/img/avatar1.jpg">
                            </div>
                            <div class="message-content">
                                <h6 class="message-from">
                                    John Mayers
                                </h6>
                                <h6 class="message-title">
                                    Account Update
                                </h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w">
                                <img alt="" src="/img/avatar2.jpg">
                            </div>
                            <div class="message-content">
                                <h6 class="message-from">
                                    Phil Jones
                                </h6>
                                <h6 class="message-title">
                                    Secutiry Updates
                                </h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w">
                                <img alt="" src="/img/avatar3.jpg">
                            </div>
                            <div class="message-content">
                                <h6 class="message-from">
                                    Bekky Simpson
                                </h6>
                                <h6 class="message-title">
                                    Vacation Rentals
                                </h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w">
                                <img alt="" src="/img/avatar4.jpg">
                            </div>
                            <div class="message-content">
                                <h6 class="message-from">
                                    Alice Priskon
                                </h6>
                                <h6 class="message-title">
                                    Payment Confirmation
                                </h6>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--------------------
        END - Messages Link in secondary top menu
        --------------------><!--------------------
            START - Settings Link in secondary top menu
            -------------------->
        <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-right">
            <i class="os-icon os-icon-ui-46"></i>
            <div class="os-dropdown">
                <div class="icon-w">
                    <i class="os-icon os-icon-ui-46"></i>
                </div>
                <ul>
                    <li>
                        <a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a>
                    </li>
                    <li>
                        <a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a>
                    </li>
                    <li>
                        <a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a>
                    </li>
                    <li>
                        <a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!--------------------
        END - Settings Link in secondary top menu
        --------------------><!--------------------
            START - Messages Link in secondary top menu
            -------------------->
        <div class="messages-notifications os-dropdown-trigger os-dropdown-position-right">
            <i class="os-icon os-icon-zap"></i>
            <div class="new-messages-count">
                4
            </div>
            <div class="os-dropdown light message-list">
                <div class="icon-w">
                    <i class="os-icon os-icon-zap"></i>
                </div>
                <ul>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w">
                                <img alt="" src="/img/avatar1.jpg">
                            </div>
                            <div class="message-content">
                                <h6 class="message-from">
                                    John Mayers
                                </h6>
                                <h6 class="message-title">
                                    Account Update
                                </h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w">
                                <img alt="" src="/img/avatar2.jpg">
                            </div>
                            <div class="message-content">
                                <h6 class="message-from">
                                    Phil Jones
                                </h6>
                                <h6 class="message-title">
                                    Secutiry Updates
                                </h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w">
                                <img alt="" src="/img/avatar3.jpg">
                            </div>
                            <div class="message-content">
                                <h6 class="message-from">
                                    Bekky Simpson
                                </h6>
                                <h6 class="message-title">
                                    Vacation Rentals
                                </h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w">
                                <img alt="" src="/img/avatar4.jpg">
                            </div>
                            <div class="message-content">
                                <h6 class="message-from">
                                    Alice Priskon
                                </h6>
                                <h6 class="message-title">
                                    Payment Confirmation
                                </h6>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--------------------
        END - Messages Link in secondary top menu
        -------------------->
    </div>
    <div class="element-search autosuggest-search-activator">
        <input placeholder="Start typing to search..." type="text">
    </div>

    @include('layouts.menu')

</div>

