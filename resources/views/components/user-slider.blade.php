
     
<div id="section_match_users" class="<">
    <div class="dt_home_match_user">
            <div class="valign-wrapper mtc_usr_avtr" id="avaters_item_container">
                @foreach ($randomuser as $user) 
                <div class="usr_thumb" data-id="" id="user">
                    <img alt="" src="/img/icon.png">
                    <p class="text-capitalize text-center">{{$user->username}}</p>
                </div>
                @endforeach
            </div>
        
        <div class="mtc_usr_details" id="match_item_container">
            <div class="mtc_usrd_content" data-id="">
                <div class="row no_margin r_margin">
                    <div class="col-sm-6">
                        <div class="mtc_usrd_slider">
                            <div class="carousel carousel-slider center match_usr_img_slidr">
                                <div class="carousel-item" style="display: inline-block !important; visibility:visible !important">
                                    <img alt="dd" src="/img/icon.png">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m6">
                        <div class="mtc_usrd_sidebar flex_btn">
                            <div class="mtc_usrd_summary">
                                <h5><?php echo __('About');?> <a href="">jamiu</a></h5>
                                
                                <a class="edit" href="" title="<?php echo __('view_profile');?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><circle cx="12" cy="10" r="3"></circle><path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path></svg>
                                </a>
                            </div>

                            <div class="row sidebar_usr_info">
                                <div class="col s6">
                                        <div>
                                            <p class="info_title"><?php echo __('Preferred Language');?></p>
                                            <span>language</span>
                                        </div>
                                        <div>
                                            <p class="info_title"><?php echo __('Relationship status');?></p>
                                            <span>Relationship</span>
                                        </div>
                                        <div>
                                            <p class="info_title"><?php echo __('Height');?></p>
                                            <span>Height></span>
                                        </div>
                                </div>

                                <div class="col s6">
                                        <div>
                                            <p class="info_title"><?php echo __('Body Type');?></p>
                                            <span>Body></span>
                                        </div>
                                        <div>
                                            <p class="info_title"><?php echo __('Age');?></p>
                                            <span>Age</span>
                                        </div>
                                        <div>
                                            <p class="info_title"><?php echo __('Location');?></p>
                                            <span>Location</span>
                                        </div>
                                </div>
                            </div>
                            <div class="center mtc_usrd_actions">
                                <button href="javascript:void(0);" data-userid="" id="matches_like_btn" data-ajax-post="/useractions/like" data-ajax-params="userid=username=&source=find-matches" data-ajax-callback="callback_like" class="btn waves-effect like" title="<?php echo __('Like');?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path></svg></button>
                                <button href="javascript:void(0);" data-userid="" id="matches_dislike_btn" data-ajax-post="/useractions/dislike" data-source="find-matches" data-ajax-params="userid=&username=>&source=find-matches" data-ajax-callback="callback_dislike" class="btn waves-effect dislike" title="<?php echo __('Dislike');?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>