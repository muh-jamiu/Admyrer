@php
$pages = array('manage-stickers',
    'manage-gifts',
    'add-new-gift',
    'add-new-sticker',
    'manage-photos',
    'general-settings',
    'dashboard',
    'site-settings',
    'dashboard',
    'site-features',
    'amazon-settings',
    'email-settings',
    'social-login',
    'chat-settings',
    'manage-languages',
    'add-language',
    'edit-lang',
    'manage-users',
    'manage-payments',
    'manage-profile-fields',
    'add-new-profile-field',
    'edit-profile-field',
    'manage-verification-reqeusts',
    'payment-reqeuests',
    'affiliates-settings',
    'referrals-list',
    'pro-memebers',
    'pro-settings',
    'payments',
    'payment-settings',
    'manage-pages',
    'manage-groups',
    'manage-posts',
    'manage-articles',
    'manage-events',
    'manage-forum-sections',
    'manage-forum-forums',
    'manage-forum-threads',
    'manage-forum-messages',
    'create-new-section',
    'create-new-forum',
    'manage-movies',
    'add-new-movies',
    'manage-games',
    'add-new-game',
    'ads-settings',
    'manage-site-ads',
    'manage-user-ads',
    'manage-site-design',
    'manage-announcements',
    'mailing-list',
    'mass-notifications',
    'ban-users',
    'generate-sitemap',
    'manage-invitation-keys',
    'backups',
    'manage-custom-pages',
    'add-new-custom-page',
    'edit-custom-page',
    'edit-terms-pages',
    'manage-reports',
    'push-notifications-system',
    'manage-api-access-keys',
    'verfiy-applications',
    'manage-updates',
    'changelog',
    'online-users',
    'custom-code',
    'manage-third-psites',
    'edit-movie',
    'auto-delete',
    'manage-themes',
    'change-site-desgin',
    'custom-design',
    'fake-users',
    'manage-announcements',
    'manage-genders',
    'add-genders',
    'edit-genders',
    'bank-receipts',
    'video-settings',
    'manage-website-ads',

    'manage-success-stories',
    'add-success-stories',
    'edit-success-stories',

    'add-new-article',
    'edit-new-article',
    'manage-blog-categories',
    'edit-article',
    'edit-blog-category',

    //'manage-user-verification',
    'push-notifications-system',
    'edit-user-permissions',

    'affiliates-settings',
    'payment-requests',
    'referrals-list',
    'mock-email',

    'pages-seo',

    'manage-countries',
    'add-countries',
    'edit-countries',

    'manage-verification-requests',
    'live',
    'manage-invitation',
    'manage-apps',
    'auto-like',
    'manage-faqs',
    'manage-currencies',
    'manage_terms_pages',
    'manage_emails',
    'system_status',
);

$page = "dashboard";
@endphp

<div class="navigation">
    <div class="navigation-header">
        <span>Navigation</span>
        <a href="#">
            <i class="ti-close"></i>
        </a>
    </div>

    <div class="navigation-menu-body">
        <ul>
            
            <li>
                <a <?php echo ($page=='dashboard' ) ? 'class="active"' : '' ; ?> href="" data-ajax="?path=dashboard">
                    <span class="nav-link-icon">
                        <i class="material-icons">dashboard</i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>


            <li <?php echo ($page=='general-settings' || $page=='site-settings' || $page=='video-settings' ||
                $page=='email-settings' || $page=='social-login' || $page=='site-features' || $page=='amazon-settings'
                || $page=='live' ) ? 'class="open"' : '' ; ?>>
                <a href="javascript:void(0);">
                    <span class="nav-link-icon">
                        <i class="material-icons">settings</i>
                    </span>
                    <span>Settings</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a <?php echo ($page=='general-settings' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=general-settings">General Configuration
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='site-settings' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=site-settings">Website Information
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='site-features' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=site-features">Manage Site Features
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='email-settings' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=email-settings">E-mail & SMS Settings
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='video-settings' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=video-settings">Chat & Video/Audio
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='social-login' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=social-login">Social Login Settings
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='amazon-settings' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=amazon-settings">File Upload Configuration
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='live' ) ? 'class="active"' : '' ; ?> href="" data-ajax="?path=live">Setup Live Streaming
                        </a>
                    </li>
                </ul>
            </li>

            <li <?php echo ($page=='manage-languages' || $page=='add-language' || $page=='edit-lang' ) ? 'class="open"'
                : '' ; ?>>
                <a href="javascript:void(0);">
                    <span class="nav-link-icon">
                        <i class="material-icons">language</i>
                    </span>
                    <span>Languages</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a <?php echo ($page=='add-language' ) ? 'class="active"' : '' ; ?> href="" data-ajax="?path=add-language">Add
                            New Language & Keys
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage-languages' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-languages">Manage Languages
                        </a>
                    </li>
                </ul>
            </li>

            <li <?php echo ($page=='manage-verification-requests' || $page=='manage-users' ||
                $page=='affiliates-settings' || $page=='payment-requests' || $page=='referrals-list' ||
                $page=='edit-user-permissions' || $page=='manage-user-verification' || $page=='manage-genders' ||
                $page=='add-genders' || $page=='edit-genders' || $page=='manage-profile-fields' ||
                $page=='add-new-profile-field' || $page=='edit-profile-field' || $page=='manage-success-stories' ||
                $page=='add-success-stories' || $page=='edit-success-stories' || $page=='manage-countries' ||
                $page=='add-countries' || $page=='edit-countries' ) ? 'class="open"' : '' ; ?>>
                <a href="javascript:void(0);">
                    <span class="nav-link-icon">
                        <i class="material-icons">account_circle</i>
                    </span>
                    <span>Users</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a <?php echo ($page=='manage-users' || $page=='edit-user-permissions' ) ? 'class="active"' : ''
                            ; ?> href=""
                            data-ajax="?path=manage-users">Manage Users
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage-genders' || $page=='add-genders' || $page=='edit-genders' )
                            ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-genders">Manage Genders
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage-countries' || $page=='add-countries' || $page=='edit-countries' )
                            ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-countries">Manage Countries
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage-profile-fields' || $page=='add-new-profile-field' ||
                            $page=='edit-profile-field' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-profile-fields">Manage Custom Profile Fields
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage-success-stories' || $page=='add-success-stories' ||
                            $page=='edit-success-stories' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-success-stories">Manage Success Stories
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage-verification-requests' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-verification-requests">Manage Verification Requests
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='affiliates-settings' || $page=='payment-requests' ||
                            $page=='referrals-list' ) ? 'class="open"' : '' ; ?> href="javascript:void(0);">Affiliates
                            System</a>
                        <ul class="ml-menu">
                            <li>
                                <a <?php echo ($page=='affiliates-settings' ) ? 'class="active"' : '' ; ?> href=""
                                    data-ajax="?path=affiliates-settings">
                                    <span>Affiliates Settings</span>
                                </a>
                            </li>
                            <li>
                                <a <?php echo ($page=='payment-requests' || $page=='referrals-list' ) ? 'class="active"'
                                    : '' ; ?> href=""
                                    data-ajax="?path=payment-requests">
                                    <span>Payment Requests</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li <?php echo ( $page=='manage-payments' || $page=='payments' || $page=='bank-receipts' ||
                $page=='payment-settings' || $page=='manage-website-ads' || $page=='manage-currencies' )
                ? 'class="open"' : '' ; ?>>
                <a href="javascript:void(0);">
                    <span class="nav-link-icon">
                        <i class="material-icons">money</i>
                    </span>
                    <span>Payments & Ads</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a <?php echo ($page=='payment-settings' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=payment-settings">Payment Configuration
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='payments' ) ? 'class="active"' : '' ; ?> href="" data-ajax="?path=payments">Payments
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage-payments' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-payments">Manage Payments
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage-currencies' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-currencies">Manage Currencies
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='bank-receipts' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=bank-receipts">Manage bank receipts
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage-website-ads' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-website-ads">Manage Website Ads
                        </a>
                    </li>
                </ul>
            </li>

            <li <?php echo ($page=='manage-photos' ) ? 'class="open"' : '' ; ?>>
                <a href="javascript:void(0);">
                    <span class="nav-link-icon">
                        <i class="material-icons">perm_media</i>
                    </span>
                    <span>Photos</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a <?php echo ($page=='manage-photos' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-photos">Manage Photos & Videos
                        </a>
                    </li>
                </ul>
            </li>

            <li <?php echo ($page=='manage-stickers' || $page=='add-new-sticker' ) ? 'class="open"' : '' ; ?>>
                <a href="javascript:void(0);">
                    <span class="nav-link-icon">
                        <i class="material-icons">perm_media</i>
                    </span>
                    <span>Stickers</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a <?php echo ($page=='manage-stickers' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-stickers">Manage stickers
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='add-new-sticker' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=add-new-sticker">
                            Add New sticker
                        </a>
                    </li>
                </ul>
            </li>

            <li <?php echo ($page=='manage-articles' || $page=='add-new-article' || $page=='manage-blog-categories' ||
                $page=='edit-article' ) ? 'class="open"' : '' ; ?>>
                <a href="javascript:void(0);">
                    <span class="nav-link-icon">
                        <i class="material-icons">description</i>
                    </span>
                    <span>Blogs</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a <?php echo ($page=='manage-articles' || $page=='edit-article' ) ? 'class="active"' : '' ; ?>
                            href=""
                            data-ajax="?path=manage-articles">Manage Blog
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage-blog-categories' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-blog-categories">Blog categories
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='add-new-article' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=add-new-article">
                            Add New article
                        </a>
                    </li>
                </ul>
            </li>

            <li <?php echo ($page=='manage-gifts' || $page=='add-new-gift' ) ? 'class="open"' : '' ; ?>>
                <a href="javascript:void(0);">
                    <span class="nav-link-icon">
                        <i class="material-icons">perm_media</i>
                    </span>
                    <span>Gifts</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a <?php echo ($page=='manage-gifts' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-gifts">Manage gifts
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='add-new-gift' ) ? 'class="active"' : '' ; ?> href="" data-ajax="?path=add-new-gift">
                            Add New Gift
                        </a>
                    </li>
                </ul>
            </li>

            <li <?php echo ($page=='manage-themes' || $page=='change-site-desgin' || $page=='custom-design' )
                ? 'class="open"' : '' ; ?>>
                <a href="javascript:void(0);">
                    <span class="nav-link-icon">
                        <i class="material-icons">color_lens</i>
                    </span>
                    <span>Design</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a <?php echo ($page=='manage-themes' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-themes">Themes
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='change-site-desgin' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=change-site-desgin">Change Site Design
                        </a>
                    </li>
                </ul>
            </li>

            <li <?php echo ($page=='fake-users' || $page=='manage-announcements' || $page=='ban-users' ||
                $page=='mock-email' || $page=='auto-like' || $page=="manage-invitation" ||
                $page=="manage-invitation-keys" || $page=="manage-apps" ) ? 'class="open"' : '' ; ?>>
                <a href="javascript:void(0);">
                    <span class="nav-link-icon">
                        <i class="material-icons">build</i>
                    </span>
                    <span>Tools</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a <?php echo ($page=='fake-users' ) ? 'class="active"' : '' ; ?> href="" data-ajax="?path=fake-users">Fake
                            User Generator
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage-announcements' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-announcements">Announcements
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='ban-users' ) ? 'class="active"' : '' ; ?> href="" data-ajax="?path=ban-users">BlackList
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='mock-email' ) ? 'class="active"' : '' ; ?> href="" data-ajax="?path=mock-email">Send
                            E-mail
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage-invitation' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-invitation">Users Invitation
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage-invitation-keys' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-invitation-keys">Invitation Codes
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage-apps' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-apps">Applications
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='auto-like' ) ? 'class="active"' : '' ; ?> href="" data-ajax="?path=auto-like">Auto Like
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage_emails' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage_emails">Manage Emails
                        </a>
                    </li>
                </ul>
            </li>

            <li <?php echo ($page=='edit-terms-pages' || $page=='manage-custom-pages' || $page=='add-new-custom-page' ||
                $page=='edit-custom-page' || $page=='manage-faqs' || $page=='manage_terms_pages' ) ? 'class="open"' : ''
                ; ?>>
                <a href="javascript:void(0);">
                    <span class="nav-link-icon">
                        <i class="material-icons">description</i>
                    </span>
                    <span>Pages</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a <?php echo ($page=='manage-custom-pages' || $page=='add-new-custom-page' ||
                            $page=='edit-custom-page' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-custom-pages">Manage Custom Pages
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage_terms_pages' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage_terms_pages">Manage Terms Pages
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='pages-seo' ) ? 'class="active"' : '' ; ?> href="" data-ajax="?path=pages-seo">Edit Pages
                            SEO Information
                        </a>
                    </li>
                    <li>
                        <a <?php echo ($page=='manage-faqs' ) ? 'class="active"' : '' ; ?> href="" data-ajax="?path=manage-faqs">Manage
                            FAQs
                        </a>
                    </li>
                </ul>
            </li>
            
            <li <?php echo ($page=='manage-reports' ) ? 'class="open"' : '' ; ?>>
                <a href="javascript:void(0);">
                    <span class="nav-link-icon">
                        <i class="material-icons">warning</i>
                    </span>
                    <span>Reports</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a <?php echo ($page=='manage-reports' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-reports">Manage Reports
                        </a>
                    </li>
                </ul>
            </li>
            
            <li <?php echo ( $page=='push-notifications-system' ) ? 'class="open"' : '' ; ?>>
                <a href="javascript:void(0);">
                    <span class="nav-link-icon">
                        <i class="material-icons">compare_arrows</i>
                    </span>
                    <span>API Settings</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a <?php echo ($page=='push-notifications-system' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=push-notifications-system">Push Notifications Settings
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a <?php echo ($page=='system_status' ) ? 'class="active"' : '' ; ?> href="" data-ajax="?path=system_status">
                    <span class="nav-link-icon">
                        <i class="material-icons">info</i>
                    </span>
                    <span>System Status</span>
                </a>
            </li>

            <li>
                <a <?php echo ($page=='changelog' ) ? 'class="active"' : '' ; ?> href="" data-ajax="?path=changelog">
                    <span class="nav-link-icon">
                        <i class="material-icons">update</i>
                    </span>
                    <span>Changelogs</span>
                </a>
            </li>
            
            <li>
                <a href="http://docs.quickdatescript.com/#faq" target="_blank">
                    <span class="nav-link-icon">
                        <i class="material-icons">more_vert</i>
                    </span>
                    <span>FAQs</span>
                </a>
            </li>
            
            <a class="pow_link" href="https://codecanyon.net/item/quickdate-the-ultimate-php-dating-platform/23268605"
                target="_blank">
                <p>Powered by</p>
                <img src="https://quickdatescript.com/themes/default/assets/img/logo.png">
                <b class="badge">
                </b>
            </a>
        </ul>
    </div>

</div>