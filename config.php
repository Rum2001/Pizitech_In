<?php

define('DOMAIN_PATH', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);
define('NUMBER_TOP_POST_SHOW', 10);
define('ROUTE_ADMIN_DASHBOARD', 'admin/dashboard');
define('ROUTE_ADMIN_IMPORT', 'admin/import');

define('ROUTE_USER_TICKET_EDIT', 'admin/userTicketEdit');
define('ROUTE_USER_TICKET_VIEW', 'admin/ticket/user/edit');
define('ROUTE_USER_TICKET_UPDATE', 'ticket/updateUserTicket');
define('ROUTE_USER_TICKET_DELETE', 'ticket/deleteUserTicket');

define('ROUTE_ADMIN_ALL_PHOTOGRAPHY', 'admin/photographyAll');
define('ROUTE_ADMIN_PHOTOGRAPHY_VIEW_ALL', 'admin/photography/view');
define('ROUTE_ADMIN_PHOTOGRAPHY_EDIT', 'photography/edit');
define('ROUTE_ADMIN_PHOTOGRAPHY_VIEW_EDIT', 'admin/photography/edit');
define('ROUTE_ADMIN_PHOTOGRAPHY_DELETE', 'photography/delete');

define('ROUTE_ADMIN_TICKET_EDIT', 'admin/ticketEdit');
define('ROUTE_ADMIN_TICKET_VIEW', 'admin/ticket/edit');
define('ROUTE_ADMIN_TICKET_UPDATE', 'ticket/update');
define('ROUTE_ADMIN_TICKET_DELETE', 'ticket/delete');

define('ROUTE_PAGES_LOGIN_CONTROLLER', '/page/login');
define('ROUTE_PAGES_LOGIN_VIEW', '/pages/login');
define('ROUTE_PAGES_VERIFY_CONTROLLER', '/page/verify');
define('ROUTE_PAGES_VERIFY_VIEW', '/pages/verify');
define('ROUTE_PHOTOGRAPHY_STORE', 'photography/store');
define('ROUTE_PHOTOGRAPHY_UPDATE', 'photography/update');

define('MEDIA_PATH', 'public/assets/images/');
define('MEDIA_PATH_AVATAR', 'public/assets/images/avatars/');

// SMTP Server Settings
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 465);  // 465 for SMTPS, 587 for STARTTLS
define('SMTP_USERNAME', 'o@lofficielvietnam.vn');
define('SMTP_PASSWORD', 'L@Officiel');

// Sender Information
define('SENDER_EMAIL', 'o@lofficielvietnam.vn');
define('SENDER_NAME', 'L\'Officiel Vietnam');
