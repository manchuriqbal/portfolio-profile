<aside class="bg-gray-800 text-white flex-shrink-0 w-64 relative z-10 flex flex-col" id="sidebar">
    <div class="flex items-center justify-between h-16 px-4 border-b border-gray-700">
        <div class="flex items-center space-x-2">
            <i class="fas fa-blog text-2xl text-blue-400"></i>
            <h1 class="text-xl font-bold">P<span class="text-blue-400">ersonal</span></h1>
        </div>
        <button id="sidebar-toggle" class="text-gray-400 hover:text-white md:hidden">
            <i class="fas fa-times"></i>
        </button>
    </div>
    
    <div class="flex-grow px-2 py-4 overflow-y-auto">
        <nav class="flex-1 space-y-1">
            <div>
                <a href="#" class="flex items-center px-3 py-3 text-sm font-medium rounded-md bg-gray-900 text-white">
                    <i class="fas fa-tachometer-alt text-blue-400 mr-3"></i>
                    <span>Dashboard</span>
                </a>
            </div>

            <div class="sidebar-dropdown">
                <button class="sidebar-dropdown-toggle flex items-center w-full px-3 py-3 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-cog mr-3"></i>
                    <span>User Settings</span>
                    <i class="fas fa-chevron-down ml-auto text-xs"></i>
                </button>
                <div class="sidebar-dropdown-menu hidden pl-2 mt-1 space-y-1">
                    <a href="#" class="flex items-center px-3 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white pl-11">
                        <i class="fas fa-user mr-3 text-xs"></i>
                        <span>Profile</span>
                    </a>
                    <a href="#" class="flex items-center px-3 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white pl-11">
                        <i class="fas fa-lock mr-3 text-xs"></i>
                        <span>Security</span>
                    </a>
                    <a href="#" class="flex items-center px-3 py-2 text-sm rounded-md text-gray-300 hover:bg-gray-700 hover:text-white pl-11">
                        <i class="fas fa-bell mr-3 text-xs"></i>
                        <span>Notifications</span>
                    </a>
                </div>
            </div>
            <div>
                <a href="#" class="flex items-center px-3 py-3 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-comments mr-3"></i>
                    <span>Comments</span>
                </a>
            </div>
            
        </nav>
    </div>
    
    <div class="mt-auto px-4 py-4 border-t border-gray-700">
        <div class="flex items-center">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="w-10 h-10 rounded-full">
            <div class="ml-3">
                <p class="text-sm font-medium text-white">John Doe</p>
                <a href="#" class="text-xs font-medium text-gray-400 hover:text-gray-200">View profile</a>
            </div>
        </div>
        <button class="mt-4 w-full flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
            <i class="fas fa-sign-out-alt mr-2"></i>
            Sign out
        </button>
    </div>
</aside>