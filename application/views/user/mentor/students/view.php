<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 text-center">
            <div class="card p-3 mb-2">
                <div class="form-group">
                    <div class="main-img-preview">
                        <?php if (!$user['image']) {?>
                        <img class="thumbnail img-preview rounded-circle"
                            src="<?=base_url('upload_files/user/default.png');?>" title="Students" width="170px">
                        <?php } else {?>
                        <img class="thumbnail img-preview rounded-circle"
                            src="<?=base_url('upload_files/user/students/' . $user['image']);?>" title="Students"
                            width="170px">
                        <?php }?>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-9">
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fas fa-user"></i>&nbsp; Student Profile
                    <div class="float-right">
                        <a href="<?=base_url('mentor/students');?>" class="text-decoration-none text-white"><i
                                class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table width="100%" class="table table-md table-borderless table-hover">
                        <tr>
                            <td width="30%"><i class="far fa-id-card fa-fw text-dark"></i>&nbsp; Full Name</td>
                            <td width="3%">:</td>
                            <td><?=$user['first_name'].' '.$user['last_name'];?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fas fa-phone fa-fw text-dark"></i>&nbsp; Phone Number</td>
                            <td width="3%">:</td>
                            <td><?=$user['phone'];?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fas fa-envelope fa-fw text-dark"></i>&nbsp; E-mail</td>
                            <td width="3%">:</td>
                            <td><?=$user['email'];?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fas fa-map-marked-alt fa-fw text-dark"></i>&nbsp; Address</td>
                            <td width="3%">:</td>
                            <td>
                                <?=$user['address'];?>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td width="30%"><i class="fas fa-calendar-alt fa-fw text-dark"></i>&nbsp; Birthdate</td>
                            <td width="3%">:</td>
                            <td>
                                <?php if($user['birthdate']=="0000-00-00"){} else {?>
                                <?=date("D, d M Y", strtotime($user['birthdate']));?>
                                <?php }?>
                            </td>
                        </tr> -->
                        <!-- <tr>
                            <td width="30%"><i class="fas fa-university fa-fw text-dark"></i>&nbsp; Current School
                            </td>
                            <td width="3%">:</td>
                            <td><?=$user['current_school'];?></td>
                        </tr> -->
                        <!-- <tr>
                            <td width="30%"><i class="fas fa-school fa-fw text-dark"></i>&nbsp; School Name</td>
                            <td width="3%">:</td>
                            <td><?=$user['school_name'];?></td>
                        </tr> -->
                        <!-- <tr>
                            <td width="30%"><i class="fas fa-tags fa-fw text-dark"></i>&nbsp; Curriculum / Year</td>
                            <td width="3%">:</td>
                            <td><?=$user['curriculum'];?> - <?php if($user['year']){echo $user['year'];}?></td>
                        </tr> -->
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php if($status=='edit') { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card text-dark">
                <div class="card-header2">
                    <div class="float-right">
                        <a href="<?=base_url('mentor/students/view/'.$id);?>"
                            class="text-dark btn btn-sm btn-warning"><i class="far fa-window-close"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action='' method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-3">
                                <label>Personal Brand Statement : </label>
                            </div>
                            <div class="col">
                                <textarea name="personal_brand" class="form-control form-control-sm" cols="30"
                                    rows="5"><?=$user['personal_brand'];?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label>Academic Goals & Interests : </label>
                            </div>
                            <div class="col">
                                <textarea name="interests" class="form-control form-control-sm" cols="30"
                                    rows="10"><?=$user['interests'];?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label>Life Philosophy (Values) <br>& Personalities : </label>
                            </div>
                            <div class="col">
                                <textarea name="personalities" class="form-control form-control-sm" cols="30"
                                    rows="5"><?=$user['personalities'];?></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label>Attachments : </label>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Activities Resume :</label><?php if($user['resume']!=''){ ?>
                                        <div class="text-info mb-3">
                                            <a href="<?=base_url('upload_files/user/students/resume/'.$user['resume']);?>"
                                                class="btn btn-sm btn-primary" target="_blank"><i
                                                    class="fas fa-file-download"></i>
                                                &nbsp;Download</a>
                                        </div>
                                        <?php } else { ?>
                                        <div class="text-info mb-3">
                                            Not Available
                                        </div>
                                        <?php } ?>
                                        <hr>
                                        <input type="file" name="resume" class="form-control form-control-sm mb-3" />
                                    </div>
                                    <div class="col-md-4">
                                        <label>Questionnaire :</label>
                                        <?php if($user['questionnaire']!=''){ ?>
                                        <div class="text-info mb-3">
                                            <a href="<?=base_url('upload_files/user/students/questionnaire/'.$user['questionnaire']);?>"
                                                class="btn btn-sm btn-primary" target="_blank"><i
                                                    class="fas fa-file-download"></i>
                                                &nbsp;Download</a>
                                        </div>
                                        <?php } else { ?>
                                        <div class="text-info mb-3">
                                            Not Available
                                        </div>
                                        <?php } ?>
                                        <hr>
                                        <input type="file" name="questionnaire"
                                            class="form-control form-control-sm mb-3" />
                                    </div>
                                    <div class="col-md-4">
                                        <label>Others :</label>
                                        <?php if($user['others']!=''){ ?>
                                        <div class="text-info mb-3">
                                            <a href="<?=base_url('upload_files/user/students/others/'.$user['others']);?>"
                                                class="btn btn-sm btn-primary" target="_blank"><i
                                                    class="fas fa-file-download"></i>
                                                &nbsp;Download</a>
                                        </div>
                                        <?php } else { ?>
                                        <div class="text-info mb-3">
                                            Not Available
                                        </div>
                                        <?php } ?>
                                        <hr>
                                        <input type="file" name="others" class="form-control form-control-sm mb-3" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <input type="submit" class="btn btn-sm btn-primary" value="Update Profile">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card text-dark">
                <div class="card-header2">
                    <div class="float-right">
                        <a href="<?=base_url('mentor/students/edit/'.$id);?>"
                            class="text-dark btn btn-sm btn-warning"><i class="fas fa-user-edit"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-3">
                            <label>Personal Brand Statement : </label>
                        </div>
                        <div class="col">
                            <textarea name="personal_brand" class="form-control form-control-sm" cols="30" rows="5"
                                disabled><?=$user['personal_brand'];?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label>Academic Goals & Interests : </label>
                        </div>
                        <div class="col">
                            <textarea name="interests" class="form-control form-control-sm" cols="30" rows="10"
                                disabled><?=$user['interests'];?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label>Life Philosophy (Values) <br>& Personalities : </label>
                        </div>
                        <div class="col">
                            <textarea name="personalities" class="form-control form-control-sm" cols="30" rows="5"
                                disabled><?=$user['personalities'];?></textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3">
                            <label>Attachments : </label>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Activities Resume :</label>
                                    <?php if($user['resume']!=''){ ?>
                                    <div class="text-info mb-3">
                                        <a href="<?=base_url('upload_files/user/students/resume/'.$user['resume']);?>"
                                            class="btn btn-sm btn-primary" target="_blank"><i
                                                class="fas fa-file-download"></i>
                                            &nbsp;Download</a>
                                    </div>
                                    <?php } else { ?>
                                    <div class="text-info mb-3">
                                        Not Available
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-2">
                                    <label>Questionnaire :</label>
                                    <?php if($user['questionnaire']!=''){ ?>
                                    <div class="text-info mb-3">
                                        <a href="<?=base_url('upload_files/user/students/questionnaire/'.$user['questionnaire']);?>"
                                            class="btn btn-sm btn-primary" target="_blank"><i
                                                class="fas fa-file-download"></i>
                                            &nbsp;Download</a>
                                    </div>
                                    <?php } else { ?>
                                    <div class="text-info mb-3">
                                        Not Available
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-2">
                                    <label>Others :</label>
                                    <?php if($user['others']!=''){ ?>
                                    <div class="text-info mb-3">
                                        <a href="<?=base_url('upload_files/user/students/others/'.$user['others']);?>"
                                            class="btn btn-sm btn-primary" target="_blank"><i
                                                class="fas fa-file-download"></i>
                                            &nbsp;Download</a>
                                    </div>
                                    <?php } else { ?>
                                    <div class="text-info mb-3">
                                        Not Available
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>

</div>