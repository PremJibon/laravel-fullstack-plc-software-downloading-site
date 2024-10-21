<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
        <li class="nav-item">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link active" href="{{ route('patbd.index') }}">
                <span class="nav-icon">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                        <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                    </svg>
                </span>
                <span class="nav-link-text">Overview</span>
            </a><!--//nav-link-->
        </li><!--//nav-item-->

        <li class="nav-item has-submenu">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1"
                aria-expanded="false" aria-controls="submenu-1">
                <span class="nav-icon">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z" />
                        <path
                            d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z" />
                    </svg>
                </span>
                <span class="nav-link-text">Blogs</span>
                <span class="submenu-arrow">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                    </svg>
                </span><!--//submenu-arrow-->
            </a><!--//nav-link-->
            <div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" href="{{ route('patbd.blog.index') }}">All
                            Blogs</a></li>
                    <li class="submenu-item"><a class="submenu-link" href="{{ route('patbd.categories.index') }}">All
                            Categories</a></li>
                    <li class="submenu-item"><a class="submenu-link" href="{{ route('patbd.subcat.index') }}">All Sub
                            Categories</a>
                    </li>
                    <li class="submenu-item"><a class="submenu-link" href="{{ route('patbd.tag.index') }}">All Tags</a>
                    </li>
                </ul>
            </div>
        </li><!--//nav-item-->
        <li class="nav-item">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link" href="{{ route('patbd.user.index') }}">
                <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                        <path
                            d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    </svg>
                </span>
                <span class="nav-link-text">Users</span>
            </a><!--//nav-link-->
        </li><!--//nav-item-->
        <li class="nav-item">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link" href="{{ route('patbd.subscriber.index') }}">
                <span class="nav-icon">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                        <path fill-rule="evenodd"
                            d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
                        <circle cx="3.5" cy="5.5" r=".5" />
                        <circle cx="3.5" cy="8" r=".5" />
                        <circle cx="3.5" cy="10.5" r=".5" />
                    </svg>
                </span>
                <span class="nav-link-text">Subscribers</span>
            </a><!--//nav-link-->
        </li><!--//nav-item-->

        <li class="nav-item">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link" href="{{ route('patbd.mails.index') }}">
                <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path
                            d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                    </svg>
                </span>
                <span class="nav-link-text">Email Campaign</span>
            </a><!--//nav-link-->
        </li><!--//nav-item-->

        <li class="nav-item">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link" href="{{ route('patbd.mails.selectedMail') }}">
                <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path
                            d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                    </svg>
                </span>
                <span class="nav-link-text">Send Email</span>
            </a><!--//nav-link-->
        </li><!--//nav-item-->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('patbd.emailservers.index') }}">
                <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mailbox" viewBox="0 0 16 16">
                    <path d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3m0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4m2.646 1A4 4 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3z"/>
                    <path d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0"/>
                </svg>
                </span>
                <span class="nav-link-text">Email Servers</span>
            </a><!--//nav-link-->
        </li><!--//nav-item-->


        <li class="nav-item">
            <a class="nav-link" href="{{ route('patbd.blog.gallery') }}">
                <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 128 128">
                        <path d="M114 15.25H14A9.761 9.761 0 0 0 4.25 25v77A10.762 10.762 0 0 0 15 112.75h98A10.762 10.762 0 0 0 123.75 102V25a9.761 9.761 0 0 0-9.75-9.75zm6.25 9.75v11.683H52.888L61.37 18.75H114a6.257 6.257 0 0 1 6.25 6.25zM14 18.75h43.5l-8.484 17.933H7.75V25A6.257 6.257 0 0 1 14 18.75zm99 90.5H15A7.258 7.258 0 0 1 7.75 102V40.183h112.5V102a7.258 7.258 0 0 1-7.25 7.25z"/>
                        <path d="M21.57 33.466a5.75 5.75 0 1 0-5.75-5.75 5.756 5.756 0 0 0 5.75 5.75zm0-8a2.25 2.25 0 1 1-2.25 2.25 2.253 2.253 0 0 1 2.25-2.25zM37.626 33.466a5.75 5.75 0 1 0-5.75-5.75 5.756 5.756 0 0 0 5.75 5.75zm0-8a2.25 2.25 0 1 1-2.25 2.25 2.253 2.253 0 0 1 2.25-2.25zM67.522 29.466h44.745a1.75 1.75 0 0 0 0-3.5H67.522a1.75 1.75 0 0 0 0 3.5zM110.5 48.966h-93a1.75 1.75 0 0 0-1.75 1.75v37a1.749 1.749 0 0 0 1.75 1.75h93a1.736 1.736 0 0 0 .377-.043c.032-.007.062-.021.094-.03a1.687 1.687 0 0 0 .259-.091c.04-.019.078-.042.116-.063a1.645 1.645 0 0 0 .206-.133 1.84 1.84 0 0 0 .109-.089 1.806 1.806 0 0 0 .181-.19c.018-.022.042-.039.059-.062s.014-.025.022-.037a1.839 1.839 0 0 0 .1-.16c.026-.047.055-.093.076-.141a1.427 1.427 0 0 0 .055-.155 1.554 1.554 0 0 0 .054-.172c.01-.047.014-.1.021-.145a1.693 1.693 0 0 0 .02-.2V50.716a1.75 1.75 0 0 0-1.749-1.75zm-1.75 3.5v31.755L82.2 64.35a1.753 1.753 0 0 0-2.009-.062L62.909 75.627l-15.64-15.484a1.75 1.75 0 0 0-2.128-.26L19.25 75.33V52.466zm-35.4 33.5-7.9-7.822 15.638-10.256 24.153 18.079zm-54.1-6.561 26.52-15.821 22.608 22.383H19.25zM106.223 96.967H21.777a1.75 1.75 0 0 0 0 3.5h84.446a1.75 1.75 0 0 0 0-3.5z"/>
                        <path d="M96.509 67.282a5.9 5.9 0 1 0-5.9-5.9 5.9 5.9 0 0 0 5.9 5.9zm0-8.293a2.4 2.4 0 1 1-2.4 2.4 2.4 2.4 0 0 1 2.4-2.4z"/>
                    </svg>
                </span>
                <span class="nav-link-text">Gallery</span>
            </a><!--//nav-link-->
        </li><!--//nav-item-->
        
        
        
        

        <li class="nav-item">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link" href="{{ route('patbd.social.index') }}">
                <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-hash" viewBox="0 0 16 16">
                        <path
                            d="M8.39 12.648a1.32 1.32 0 0 0-.015.18c0 .305.21.508.5.508.266 0 .492-.172.555-.477l.554-2.703h1.204c.421 0 .617-.234.617-.547 0-.312-.188-.53-.617-.53h-.985l.516-2.524h1.265c.43 0 .618-.227.618-.547 0-.313-.188-.524-.618-.524h-1.046l.476-2.304a1.06 1.06 0 0 0 .016-.164.51.51 0 0 0-.516-.516.54.54 0 0 0-.539.43l-.523 2.554H7.617l.477-2.304c.008-.04.015-.118.015-.164a.512.512 0 0 0-.523-.516.539.539 0 0 0-.531.43L6.53 5.484H5.414c-.43 0-.617.22-.617.532 0 .312.187.539.617.539h.906l-.515 2.523H4.609c-.421 0-.609.219-.609.531 0 .313.188.547.61.547h.976l-.516 2.492c-.008.04-.015.125-.015.18 0 .305.21.508.5.508.265 0 .492-.172.554-.477l.555-2.703h2.242l-.515 2.492zm-1-6.109h2.266l-.515 2.563H6.859l.532-2.563z" />
                    </svg>
                </span>
                <span class="nav-link-text">Social Links</span>
            </a><!--//nav-link-->
        </li><!--//nav-item-->

        <li class="nav-item">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link" href="{{ route('patbd.reviews.index') }}">
                <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-text" viewBox="0 0 16 16">
                        <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                        <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                    </svg>
                </span>
                <span class="nav-link-text">Reviews</span>
            </a><!--//nav-link-->
        </li><!--//nav-item-->

        {{-- <li class="nav-item has-submenu">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2"
                aria-expanded="false" aria-controls="submenu-2">
                <span class="nav-icon">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
                    </svg>
                </span>
                <span class="nav-link-text">External</span>
                <span class="submenu-arrow">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                    </svg>
                </span><!--//submenu-arrow-->
            </a><!--//nav-link-->
            <div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
                <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" href="login.html">Login</a></li>
                    <li class="submenu-item"><a class="submenu-link" href="signup.html">Signup</a>
                    </li>
                    <li class="submenu-item"><a class="submenu-link" href="reset-password.html">Reset
                            password</a></li>
                    <li class="submenu-item"><a class="submenu-link" href="404.html">404 page</a>
                    </li>
                </ul>
            </div>
        </li><!--//nav-item-->


        <li class="nav-item">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link" href="charts.html">
                <span class="nav-icon">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z" />
                    </svg>
                </span>
                <span class="nav-link-text">Charts</span>
            </a><!--//nav-link-->
        </li><!--//nav-item-->

        <li class="nav-item">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link" href="help.html">
                <span class="nav-icon">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-question-circle"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                    </svg>
                </span>
                <span class="nav-link-text">Help</span>
            </a><!--//nav-link-->
        </li><!--//nav-item--> --}}

    </ul><!--//app-menu-->
</nav><!--//app-nav-->
