
@php
    $gender = $user->gender;
    $country = $user->country;
@endphp
<div id="section_match_users" class="<">
    <div class="dt_home_match_user">
            <div class="valign-wrapper mtc_usr_avtr" id="avaters_item_container">
                @foreach ($randomuser as $user) 
                    @if ($user->gender != $gender)
                        <div class="usr_thumb" data-id="" id="user">
                            <div class="d-none">
                                <span class="text-capitalize h_relationship">{{$user->relationship}}</span>
                                <span class="text-capitalize h_name">{{$user->first_name}} {{$user->last_name}}</span>
                                <span class="text-capitalize h_lang">{{$user->language}}</span>
                                <span class="text-capitalize h_height">{{$user->height}}</span>
                                <span class="text-capitalize h_body">{{$user->body}}</span>
                                <span class="text-capitalize h_age">{{$user->age}}</span>
                                <span class="text-capitalize h_loc">{{$user->country}}</span>
                                <span class="text-capitalize h_Id">{{$user->id}}</span>
                            </div>
                            <img class="h_img" alt="" src={{$user->avatar ?? "/img/icon.png"}} loading="lazy">
                            <p class="text-capitalize h_username text-center">{{$user->username}}</p>
                        </div>
                    @endif
              
                @endforeach
            </div>
        
        <div class="mtc_usr_details" id="match_item_container">
            <div class="mtc_usrd_content" data-id="">
                <div class="row no_margin r_margin">
                    <div class="col-sm-6">
                        <div class="mtc_usrd_slider">
                            <div class="carousel carousel-slider center match_usr_img_slidr">
                                <div class="carousel-item" style="display: inline-block !important; visibility:visible !important">
                                    <img class="s_img" alt={{$randomuser[0]->avatar ?? "/img/icon.png"}} src={{$randomuser[0]->avatar}}>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m6">
                        <div class="mtc_usrd_sidebar flex_btn">
                            <div class="mtc_usrd_summary">
                                <h5 class="text-capitalize"><?php echo __('About');?> <a href="" class="s_name">{{$randomuser[0]->first_name}} {{$randomuser[0]->last_name}}</a></h5>
                                
                                <a class="edit s_link" href={{"/@" .$randomuser[0]->username}} title="<?php echo __('view_profile');?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><circle cx="12" cy="10" r="3"></circle><path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path></svg>
                                </a>
                            </div>

                            <div class="row sidebar_usr_info">
                                <div class="col s6">
                                        <div>
                                            <p class="info_title"><?php echo __('Preferred Language');?></p>
                                            <span class="text-capitalize s_lang">{{$randomuser[0]->language ?? "English"}}</span>
                                        </div>
                                        <div>
                                            <p class="info_title"><?php echo __('Relationship status');?></p>
                                            <span class="text-capitalize s_relationship">{{$randomuser[0]->relationship}}</span>
                                        </div>
                                        <div>
                                            <p class="info_title"><?php echo __('Height');?></p>
                                            <span class="text-capitalize s_height">{{$randomuser[0]->height}}cm</span>
                                        </div>
                                </div>

                                <div class="col s6">
                                        <div>
                                            <p class="info_title"><?php echo __('Body Type');?></p>
                                            <span class="text-capitalize s_body">{{$randomuser[0]->body}}</span>
                                        </div>
                                        <div>
                                            <p class="info_title"><?php echo __('Age');?></p>
                                            <span class="text-capitalize s_age">{{$randomuser[0]->age ?? 0}}</span>
                                        </div>
                                        <div>
                                            <p class="info_title"><?php echo __('Location');?></p>
                                            <span class="text-capitalize s_loc">{{$randomuser[0]->country}}</span>
                                        </div>
                                </div>
                            </div>
                            <div class="center mtc_usrd_actions">
                                <button onclick="like()" href="javascript:void(0);" data-userid="" id="matches_like_btn" data-ajax-post="/useractions/like" data-ajax-params="userid=username=&source=find-matches" data-ajax-callback="callback_like" class="btn waves-effect like" title="<?php echo __('Like');?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path></svg></button>
                                <button onclick="dislike()" href="javascript:void(0);" data-userid="" id="matches_dislike_btn" data-ajax-post="/useractions/dislike" data-source="find-matches" data-ajax-params="userid=&username=>&source=find-matches" data-ajax-callback="callback_dislike" class="btn waves-effect dislike" title="<?php echo __('Dislike');?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>