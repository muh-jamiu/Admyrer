@extends("layouts.dashlayout")

@php
    $audios = $data["audio"] ?? [];
@endphp

@section('title')
Manage Language | Admyrer
@endsection

@section("dashboard")

<!-- Layout wrapper -->
<div class="layout-wrapper">


        <!-- Content body -->
        <div class="content-body">
            <!-- Content -->
            <div class="content ">
                <div class="container-fluid">
    <div>
        <h3>Manage Languages</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Languages</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Manage Languages</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Manage & Edit Languages</h6>
                    <div class="langs-settings-alert"></div>
                   <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all"></label></th>
                                    <th style="text-align: center;">Language Name</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="setting-postlist" id="english" data_selected="english">
	<td><input type="checkbox" id="check-data-english" class="delete-checkbox filled-in"><label for="check-data-english"></label></td>
   <td style="text-align: center;">English</td>
   <td style="text-align: center;">
      <a class="btn bg-success admn_table_btn" href="https://quickdatescript.com/admin-cp/edit-lang?id=english">Edit</a>
      <a href="javscript:void(0)" class="delete-field btn bg-danger admn_table_btn" onclick="Wo_DeleteLang('english','hide');">Delete</a>
      <a href="javscript:void(0)" class="delete-field btn bg-info admn_table_btn" onclick="update_lang_status(this,'english')" data-type="disable">  Disable</a>
   </td>
</tr><tr class="setting-postlist" id="arabic" data_selected="arabic">
	<td><input type="checkbox" id="check-data-arabic" class="delete-checkbox filled-in"><label for="check-data-arabic"></label></td>
   <td style="text-align: center;">Arabic</td>
   <td style="text-align: center;">
      <a class="btn bg-success admn_table_btn" href="https://quickdatescript.com/admin-cp/edit-lang?id=arabic">Edit</a>
      <a href="javscript:void(0)" class="delete-field btn bg-danger admn_table_btn" onclick="Wo_DeleteLang('arabic','hide');">Delete</a>
      <a href="javscript:void(0)" class="delete-field btn bg-info admn_table_btn" onclick="update_lang_status(this,'arabic')" data-type="disable">  Disable</a>
   </td>
</tr><tr class="setting-postlist" id="dutch" data_selected="dutch">
	<td><input type="checkbox" id="check-data-dutch" class="delete-checkbox filled-in"><label for="check-data-dutch"></label></td>
   <td style="text-align: center;">Dutch</td>
   <td style="text-align: center;">
      <a class="btn bg-success admn_table_btn" href="https://quickdatescript.com/admin-cp/edit-lang?id=dutch">Edit</a>
      <a href="javscript:void(0)" class="delete-field btn bg-danger admn_table_btn" onclick="Wo_DeleteLang('dutch','hide');">Delete</a>
      <a href="javscript:void(0)" class="delete-field btn bg-info admn_table_btn" onclick="update_lang_status(this,'dutch')" data-type="disable">  Disable</a>
   </td>
</tr><tr class="setting-postlist" id="french" data_selected="french">
	<td><input type="checkbox" id="check-data-french" class="delete-checkbox filled-in"><label for="check-data-french"></label></td>
   <td style="text-align: center;">French</td>
   <td style="text-align: center;">
      <a class="btn bg-success admn_table_btn" href="https://quickdatescript.com/admin-cp/edit-lang?id=french">Edit</a>
      <a href="javscript:void(0)" class="delete-field btn bg-danger admn_table_btn" onclick="Wo_DeleteLang('french','hide');">Delete</a>
      <a href="javscript:void(0)" class="delete-field btn bg-info admn_table_btn" onclick="update_lang_status(this,'french')" data-type="disable">  Disable</a>
   </td>
</tr><tr class="setting-postlist" id="german" data_selected="german">
	<td><input type="checkbox" id="check-data-german" class="delete-checkbox filled-in"><label for="check-data-german"></label></td>
   <td style="text-align: center;">German</td>
   <td style="text-align: center;">
      <a class="btn bg-success admn_table_btn" href="https://quickdatescript.com/admin-cp/edit-lang?id=german">Edit</a>
      <a href="javscript:void(0)" class="delete-field btn bg-danger admn_table_btn" onclick="Wo_DeleteLang('german','hide');">Delete</a>
      <a href="javscript:void(0)" class="delete-field btn bg-info admn_table_btn" onclick="update_lang_status(this,'german')" data-type="disable">  Disable</a>
   </td>
</tr><tr class="setting-postlist" id="italian" data_selected="italian">
	<td><input type="checkbox" id="check-data-italian" class="delete-checkbox filled-in"><label for="check-data-italian"></label></td>
   <td style="text-align: center;">Italian</td>
   <td style="text-align: center;">
      <a class="btn bg-success admn_table_btn" href="https://quickdatescript.com/admin-cp/edit-lang?id=italian">Edit</a>
      <a href="javscript:void(0)" class="delete-field btn bg-danger admn_table_btn" onclick="Wo_DeleteLang('italian','hide');">Delete</a>
      <a href="javscript:void(0)" class="delete-field btn bg-info admn_table_btn" onclick="update_lang_status(this,'italian')" data-type="disable">  Disable</a>
   </td>
</tr><tr class="setting-postlist" id="portuguese" data_selected="portuguese">
	<td><input type="checkbox" id="check-data-portuguese" class="delete-checkbox filled-in"><label for="check-data-portuguese"></label></td>
   <td style="text-align: center;">Portuguese</td>
   <td style="text-align: center;">
      <a class="btn bg-success admn_table_btn" href="https://quickdatescript.com/admin-cp/edit-lang?id=portuguese">Edit</a>
      <a href="javscript:void(0)" class="delete-field btn bg-danger admn_table_btn" onclick="Wo_DeleteLang('portuguese','hide');">Delete</a>
      <a href="javscript:void(0)" class="delete-field btn bg-info admn_table_btn" onclick="update_lang_status(this,'portuguese')" data-type="disable">  Disable</a>
   </td>
</tr><tr class="setting-postlist" id="russian" data_selected="russian">
	<td><input type="checkbox" id="check-data-russian" class="delete-checkbox filled-in"><label for="check-data-russian"></label></td>
   <td style="text-align: center;">Russian</td>
   <td style="text-align: center;">
      <a class="btn bg-success admn_table_btn" href="https://quickdatescript.com/admin-cp/edit-lang?id=russian">Edit</a>
      <a href="javscript:void(0)" class="delete-field btn bg-danger admn_table_btn" onclick="Wo_DeleteLang('russian','hide');">Delete</a>
      <a href="javscript:void(0)" class="delete-field btn bg-info admn_table_btn" onclick="update_lang_status(this,'russian')" data-type="disable">  Disable</a>
   </td>
</tr><tr class="setting-postlist" id="spanish" data_selected="spanish">
	<td><input type="checkbox" id="check-data-spanish" class="delete-checkbox filled-in"><label for="check-data-spanish"></label></td>
   <td style="text-align: center;">Spanish</td>
   <td style="text-align: center;">
      <a class="btn bg-success admn_table_btn" href="https://quickdatescript.com/admin-cp/edit-lang?id=spanish">Edit</a>
      <a href="javscript:void(0)" class="delete-field btn bg-danger admn_table_btn" onclick="Wo_DeleteLang('spanish','hide');">Delete</a>
      <a href="javscript:void(0)" class="delete-field btn bg-info admn_table_btn" onclick="update_lang_status(this,'spanish')" data-type="disable">  Disable</a>
   </td>
</tr><tr class="setting-postlist" id="turkish" data_selected="turkish">
	<td><input type="checkbox" id="check-data-turkish" class="delete-checkbox filled-in"><label for="check-data-turkish"></label></td>
   <td style="text-align: center;">Turkish</td>
   <td style="text-align: center;">
      <a class="btn bg-success admn_table_btn" href="https://quickdatescript.com/admin-cp/edit-lang?id=turkish">Edit</a>
      <a href="javscript:void(0)" class="delete-field btn bg-danger admn_table_btn" onclick="Wo_DeleteLang('turkish','hide');">Delete</a>
      <a href="javscript:void(0)" class="delete-field btn bg-info admn_table_btn" onclick="update_lang_status(this,'turkish')" data-type="disable">  Disable</a>
   </td>
</tr>                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <span>&nbsp;</span>
                            <button type="button" class="btn btn-primary waves-effect delete-selected d-block" disabled>Delete Selected<span></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModal1Label">Delete language?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this language?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="SelectedDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModal1Label">Delete language?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure that you want to remove the selected language(s)?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="DeleteSelected()" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>
<script>
    $('.check-all').on('click', function(event) {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    $('.delete-checkbox, .check-all').change(function(event) {
        $('.delete-selected').attr('disabled', false);
        $('.delete-selected').find('span').text(' (' + $('.delete-checkbox:checked').length + ')');
    });
    $('.submit-selected').on('click', function(event) {
        event.preventDefault();
        $('#SelectedStatusModal').modal('show');
    });

    $('.delete-selected').on('click', function(event) {
        event.preventDefault();
        $('#SelectedDeleteModal').modal('show');
    });
    function DeleteSelected() {
        data = new Array();
        $('td input:checked').parents('tr').each(function () {
            data.push($(this).attr('data_selected'));
        });
        $('.delete-selected').attr('disabled', true);
        $('.delete-selected').text('Please wait..');
        $.post(Wo_Ajax_Requests_File()+"?f=admin_setting&s=remove_multi_lang", {ids: data}, function () {
            $.each( data, function( index, value ){
                $('#' + value).remove();
            });
            $('.delete-selected').text('Delete Selected');
        });
    }
function Wo_DeleteLang(id,type = 'show') {
  if (id == '') {
    return false;
  }
  if (type == 'hide') {
    $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_DeleteLang('"+id+"')");
    $('#DeleteModal').modal('show');
    return false;
  }
  $('#' + id).fadeOut(300, function () {
      $(this).remove();
  });
  $.get(Wo_Ajax_Requests_File(), {f: 'admin_setting', s:'delete_lang', id:id});
}

function update_lang_status(self,name) {
    value = 1;
    if ($(self).attr('data-type') == 'disable') {
        value = 0;
    }
    $.post(Wo_Ajax_Requests_File()+"?f=admin_setting&s=update_lang_status", {name:name,value:value}, function(data, textStatus, xhr) {
        if ($(self).attr('data-type') == 'disable') {
            $(self).attr('data-type','enable');
            $(self).html('Enable');
        }
        else{
            $(self).attr('data-type','disable');
            $(self).html('Disable');
        }
        $('.langs-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Settings updated successfully</div>');
        setTimeout(function () {
            $('.langs-settings-alert').empty();
        }, 2000);
    });
}
</script>            </div>
            <!-- ./ Content -->

        </div>
        <!-- ./ Content body -->
    </div>
    <!-- ./ Content wrapper -->
</div>
<!-- ./ Layout wrapper -->


@endsection