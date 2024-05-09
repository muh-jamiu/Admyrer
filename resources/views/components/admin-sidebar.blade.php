@php
$page = request()->path() ?? "";
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
                <a <?php echo ($page=='admin-cp' ) ? 'class="active"' : '' ; ?> href="" data-ajax="?path=dashboard">
                    <span class="nav-link-icon">
                        <i class="material-icons"><i class="fa-solid fa-cubes"></i></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>


            <li>
                <a  style="position: relative" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#c_settings">
                    <span class="nav-link-icon">
                        <i class="material-icons"><i class="fa-solid fa-gear"></i></i>
                    </span>
                    <span>Settings</span>
                    <i style="position: absolute; right:0; font-size:10px" class="fa-solid fa-plus mx-4"></i>
                </a>
                <ul class="collapse" id="c_settings">
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

            <li>
                <a style="position: relative" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#c_lang">
                    <span class="nav-link-icon">
                        <i class="material-icons"><i class="fa-solid fa-globe"></i></i>
                    </span>
                    <span>Languages</span>
                    <i style="position: absolute; right:0; font-size:10px" class="fa-solid fa-plus mx-4"></i>
                </a>
                <ul class="collapse" id="c_lang">
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

            <li>
                <a style="position: relative" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#c_user">
                    <span class="nav-link-icon">
                        <i class="material-icons"><i class="fa-solid fa-user"></i></i>
                    </span>
                    <span>Users</span>
                    <i style="position: absolute; right:0; font-size:10px" class="fa-solid fa-plus mx-4"></i>
                </a>
                <ul class="collapse" id="c_user">
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

            <li>
                <a style="position: relative" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#c_payment">
                    <span class="nav-link-icon">
                        <i class="material-icons"><i class="fa-solid fa-credit-card"></i></i>
                    </span>
                    <span>Payments & Ads</span>
                    <i style="position: absolute; right:0; font-size:10px" class="fa-solid fa-plus mx-4"></i>
                </a>
                <ul class="collapse" id="c_payment">
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

            <li>
                <a style="position: relative" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#c_photos">
                    <span class="nav-link-icon">
                        <i class="material-icons"><i class="fa-solid fa-photo-film"></i></i>
                    </span>
                    <span>Photos</span>
                    <i style="position: absolute; right:0; font-size:10px" class="fa-solid fa-plus mx-4"></i>
                </a>
                <ul class="collapse" id="c_photos">
                    <li>
                        <a <?php echo ($page=='manage-photos' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-photos">Manage Photos & Videos
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a style="position: relative" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#c_stickers">
                    <span class="nav-link-icon">
                        <i class="material-icons"><i class="fa-solid fa-photo-film"></i></i>
                    </span>
                    <span>Stickers</span>
                    <i style="position: absolute; right:0; font-size:10px" class="fa-solid fa-plus mx-4"></i>
                </a>
                <ul class="collapse" id="c_stickers">
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

            <li>
                <a style="position: relative" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#c_blogs">
                    <span class="nav-link-icon">
                        <i class="material-icons"><i class="fa-solid fa-blog"></i></i>
                    </span>
                    <span>Blogs</span>
                    <i style="position: absolute; right:0; font-size:10px" class="fa-solid fa-plus mx-4"></i>
                </a>
                <ul class="collapse" id="c_blogs">
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

            <li>
                <a style="position: relative" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#c_gift">
                    <span class="nav-link-icon">
                        <i class="material-icons"><i class="fa-solid fa-photo-film"></i></i>
                    </span>
                    <span>Gifts</span>
                    <i style="position: absolute; right:0; font-size:10px" class="fa-solid fa-plus mx-4"></i>
                </a>
                <ul class="collapse" id="c_gift">
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

            <li>
                <a style="position: relative" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#c_design">
                    <span class="nav-link-icon">
                        <i class="material-icons"><i class="fa-solid fa-palette"></i></i>
                    </span>
                    <span>Design</span>
                    <i style="position: absolute; right:0; font-size:10px" class="fa-solid fa-plus mx-4"></i>
                </a>
                <ul class="collapse" id="c_design">
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

            <li>
                <a style="position: relative" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#c_tool">
                    <span class="nav-link-icon">
                        <i class="material-icons"><i class="fa-solid fa-wrench"></i></i>
                    </span>
                    <span>Tools</span>
                    <i style="position: absolute; right:0; font-size:10px" class="fa-solid fa-plus mx-4"></i>
                </a>
                <ul class="collapse" id="c_tool">
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

            <li>
                <a style="position: relative" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#c_pages">
                    <span class="nav-link-icon">
                        <i class="material-icons"><i class="fa-solid fa-file"></i></i>
                    </span>
                    <span>Pages</span>
                    <i style="position: absolute; right:0; font-size:10px" class="fa-solid fa-plus mx-4"></i>
                </a>
                <ul class="collapse" id="c_pages">
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
            
            <li>
                <a style="position: relative" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#c_report">
                    <span class="nav-link-icon">
                        <i class="material-icons"><i class="fa-solid fa-triangle-exclamation"></i></i>
                    </span>
                    <span>Reports</span>
                    <i style="position: absolute; right:0; font-size:10px" class="fa-solid fa-plus mx-4"></i>
                </a>
                <ul class="collapse" id="c_report">
                    <li>
                        <a <?php echo ($page=='manage-reports' ) ? 'class="active"' : '' ; ?> href=""
                            data-ajax="?path=manage-reports">Manage Reports
                        </a>
                    </li>
                </ul>
            </li>
            
            <li>
                <a style="position: relative" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#c_api">
                    <span class="nav-link-icon">
                        <i class="material-icons"><i class="fa-solid fa-sliders"></i></i>
                    </span>
                    <span>API Settings</span>
                    <i style="position: absolute; right:0; font-size:10px" class="fa-solid fa-plus mx-4"></i>
                </a>
                <ul class="collapse" id="c_api">
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
                        <i class="material-icons"><i class="fa-solid fa-circle-exclamation"></i></i>
                    </span>
                    <span>System Status</span>
                </a>
            </li>

            <li>
                <a <?php echo ($page=='changelog' ) ? 'class="active"' : '' ; ?> href="" data-ajax="?path=changelog">
                    <span class="nav-link-icon">
                        <i class="material-icons"><i class="fa-solid fa-rotate-right"></i></i>
                    </span>
                    <span>Changelogs</span>
                </a>
            </li>
            
            <li>
                <a href="http://docs.quickdatescript.com/#faq" target="_blank">
                    <span class="nav-link-icon">
                        <i class="material-icons"><i class="fa-solid fa-circle-question"></i></i>
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