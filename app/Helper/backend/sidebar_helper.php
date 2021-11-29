<?php

if(!function_exists("sidebar")){
	function sidebar($sub = ""){
		$Bar = array();
		if($sub == ""){
			if(is_admin()){
				$Bar[] = array(
                    "id" => 1,
                    "status" => 1,
					"name" => "Category",
					"icon" => "nav-icon fas fa-th",
					"url" => route("category"),
                    "list" => 0
 				);
			}
            if(true){
				$Bar[] = array(
                    "id" => 2,
                    "status" => 1,
					"name" => "Messenger",
					"icon" => "nav-icon fas fa-book",
					"url" => url("messenger"),
                    "list" => 0
 				);
			}
            if(permission("Side Bar", "Class")){
				$Bar[] = array(
                    "id" => 3,
                    "status" => 1,
					"name" => "Class",
					"icon" => "nav-icon fas fa-book",
					"url" => route("class"),
                    "list" => 0
 				);
			}
            if(permission("Side Bar", "User Manage")){
				$Bar[] = array(
                    "id" => 4,
                    "status" => 1,
					"name" => "User Manage",
					"icon" => "nav-icon fas fa-users",
					"url" => "#",
                    "list" => 1
 				);
			}
            if(permission("Side Bar", "Role Manage")){
				$Bar[] = array(
                    "id" => 5,
                    "status" => 1,
					"name" => "Role Manage",
					"icon" => "nav-icon fas fa-sitemap",
					"url" => route("role"),
                    "list" => 0
 				);
			}
			if(permission("Side Bar", "Contact")){
				$Bar[] = array(
                    "id" => 6,
                    "status" => 1,
					"name" => "Contact",
					"icon" => "nav-icon fas fa-envelope",
					"url" => url("/admin/contact"),
                    "list" => 0
 				);
			}
			if(permission("Side Bar", "Support")){
				$Bar[] = array(
                    "id" => 7,
                    "status" => 1,
					"name" => "Support",
					"icon" => "nav-icon fas fa-comments",
					"url" => '#',
                    "list" => 1
 				);
			}
            if(permission("Side Bar", "Setting")){
				$Bar[] = array(
                    "id" => 8,
                    "status" => 1,
					"name" => "Setting",
					"icon" => "nav-icon fas fa-cog",
					"url" => url("settings"),
                    "list" => 1
 				);
			}
            if(permission('Magenger Group','Read')){
                $Bar[] = array(
                    "id" => 9,
                    "status" => 1,
                    "name" => "Masenger Groups",
                    "icon" => "nav-icon fas fa-cog",
                    "url" => url("massenger_groups"),
                    "list" => 0
                );
            }
            if(true){
				$Bar[] = array(
                    "id" => 10,
                    "status" => 1,
					"name" => "Logout",
					"icon" => "nav-icon fas fa-user-times",
					"url" => url("logout"),
                    "list" => 0
 				);
			}
			 ksort($Bar);
			return $Bar;
		}else{
			/// User Mange Sub Category Start
			if($sub == "User Manage"){
                if(is_super()){
                    $Bar[] = array(
                        "id" => 1,
                        "status" => 1,
                        "name" => "Admin",
                        "url" => url("/admin/user_add?group=admin"),
                        "icon" => "far fa-circle nav-icon"
                    );
                }
                if(is_admin()){
                    $Bar[] = array(
                        "id" => 2,
                        "status" => 1,
                        "name" => "Teacher",
                        "url" => url("/admin/user_add?group=teacher"),
                        "icon" => "far fa-circle nav-icon"
                    );
                }
                if(is_admin()){
                    $Bar[] = array(
                        "id" => 3,
                        "status" => 1,
                        "name" => "Stedent",
                        "url" => url("/admin/user_add?group=student"),
                        "icon" => "far fa-circle nav-icon"
                    );
                }
			}

			/// User Manege Sub Category Stop


			/// Support Manege Sub Category Stop
			if($sub == "Support"){

				if(is_super()){
                    $Bar[] = array(
                        "id" => 1,
                        "status" => 1,
                        "name" => "Admin",
                        "url" => url("/admin/mailbox?group=admin"),
                        "icon" => "far fa-circle nav-icon"
                    );
                }
				if(is_admin()){
                    $Bar[] = array(
                        "id" => 2,
                        "status" => 1,
                        "name" => "Guest",
                        "url" => url("/admin/mailbox?group=guest"),
                        "icon" => "far fa-circle nav-icon"
                    );
                }
                if(is_admin()){
                    $Bar[] = array(
                        "id" => 3,
                        "status" => 1,
                        "name" => "Teacher",
                        "url" => url("/admin/mailbox?group=teacher"),
                        "icon" => "far fa-circle nav-icon"
                    );
                }
                if(is_admin()){
                    $Bar[] = array(
                        "id" => 4,
                        "status" => 1,
                        "name" => "Stedent",
                        "url" => url("/admin/mailbox?group=stedent"),
                        "icon" => "far fa-circle nav-icon"
                    );
                }
			}
			/// Support Manege Sub Category Stop

            /// Setting Sub Category Start
			if($sub == "Setting"){

				if(is_super()){
                    $Bar[] = array(
                        "id" => 1,
                        "status" => 1,
                        "name" => "Logo",
                        "url" =>  url("/admin/settings?group=logo"),
                        "icon" => "far fa-circle nav-icon"
                    );
                }
				if(is_admin()){
                    $Bar[] = array(
                        "id" => 2,
                        "status" => 1,
                        "name" => "Page",
                        "url" =>  url("/admin/settings?group=page"),
                        "icon" => "far fa-circle nav-icon"
                    );
                }
                if(is_admin()){
                    $Bar[] = array(
                        "id" => 3,
                        "status" => 1,
                        "name" => "Custome CSS",
                        "url" => url("/admin/settings?group=css"),
                        "icon" => "far fa-circle nav-icon"
                    );
                }
                if(is_admin()){
                    $Bar[] = array(
                        "id" => 4,
                        "status" => 1,
                        "name" => "Home Page Lesson",
                        "url" => url("/admin/settings?group=lesson"),
                        "icon" => "far fa-circle nav-icon"
                    );
                }
                if(is_admin()){
                    $Bar[] = array(
                        "id" => 5,
                        "status" => 1,
                        "name" => "Reviews",
                        "url" => url("/admin/settings?group=review"),
                        "icon" => "far fa-circle nav-icon"
                    );
                }
                if(is_admin()){
                    $Bar[] = array(
                        "id" => 6,
                        "status" => 1,
                        "name" => "Menu Link",
                        "url" => url("/admin/settings?group=menu"),
                        "icon" => "far fa-circle nav-icon"
                    );
                }
                if(is_admin()){
                    $Bar[] = array(
                        "id" => 7,
                        "status" => 1,
                        "name" => "Footer",
                        "url" => url("/admin/settings?group=footer"),
                        "icon" => "far fa-circle nav-icon"
                    );
                }
			}
			/// Setting Sub Category Stop

			ksort($Bar);
			return $Bar;
		}
	}
}