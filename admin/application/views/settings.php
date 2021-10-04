<!--
  
  KARYON SOLUTIONS CONFIDENTIAL
  __________________
  
    Author : Sudeep Gandhi
    Url - http://www.karyonsolutions.com  
    [2016] - [2017] Karyon Solutions 
    All Rights Reserved.
  
  NOTICE:  All information contained herein is, and remains
  the property of Karyon Solutions and its suppliers,
  if any.  The intellectual and technical concepts contained
  herein are proprietary to Karyon Solutions
  and its suppliers and may be covered by Indian and Foreign Patents,
  patents in process, and are protected by trade secret or copyright law.
  Dissemination of this information or reproduction of this material
  is strictly forbidden unless prior written permission is obtained
 from Karyon Solutions.
-->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>Settings</h1>
    <ol class="breadcrumb">
      <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i> admin</a></li>
      <li class="active">Settings</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- /.col -->
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="<?php if ($data['active'] == "about_us") echo "active"; ?>">
              <a href="#about_us" data-toggle="tab">About Us</a>
          </li>
            <li class="<?php if ($data['active'] == "privacy_policy") echo "active"; ?>">
              <a href="#privacy_policy" data-toggle="tab">Privacy Policy</a>
              </li>
            <li class="<?php if ($data['active'] == "term_condition") echo "active"; ?>">
              <a href="#term_condition" data-toggle="tab">Term and Condition</a>
          </li>
          <li class="<?php if ($data['active'] == "faqs" || $data['active'] == "faqs_update") echo "active"; ?>">
              <a href="#faqs" data-toggle="tab">Faq's</a>
          </li>
          <li class="<?php if ($data['active'] == "how_it_works") echo "active"; ?>">
            <a href="#feature" data-toggle="tab">How it works ?</a>
          </li>
          <li class="<?php if ($data['active'] == "features" || $data['active'] == "feature_update") echo "active"; ?>">
            <a href="#working" data-toggle="tab">Features</a>
          </li>
          </ul>

          <div class="tab-content">

            

            



            <div class="tab-pane <?php if ($data['active'] == "about_us") echo "active"; ?>" id="about_us">
              <br>
              <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/updateWebSettings"
                    method="POST">
                <input type="hidden" name="id"
                       value="<?php if (!empty($data['webAboutUs']->about_id)) echo $data['webAboutUs']->about_id; ?>">
                <input type="hidden" name="value_type" value="about_us">
                <div class="form-group">
                  <label class="col-sm-1 control-label asterisk">title</label>
                  <div class="col-md-11">
                      <?php if (isset($data['webAboutUs']->title)) { ?>
                        <input type="text" class="form-control" name="title" placeholder="title"
                               value="<?php if (!empty($data['webAboutUs']->title)) echo $data['webAboutUs']->title; ?>">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="title" placeholder="title">
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-1 control-label asterisk">description</label>
                  <div class="col-md-11">
                      <?php if (isset($data['webAboutUs']->description)) { ?>
                        <textarea type="text" id="WYSIHTML" class="form-control" name="description"
                                  placeholder="description"><?php if (!empty($data['webAboutUs']->description)) echo $data['webAboutUs']->description; ?></textarea>
                      <?php } else { ?>
                        <textarea type="text" id="WYSIHTML" class="form-control" name="description"
                                  placeholder="description"></textarea>
                      <?php } ?>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" onclick='' class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>






            <div class="tab-pane <?php if ($data['active'] == "privacy_policy") echo "active"; ?>" id="privacy_policy">
              <br>
              <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/updateWebSettings"
                    method="POST">
                <input type="hidden" name="id" value="<?php if (!empty($data['webPrivacyPolicy']->privacy_policy_id)) echo $data['webPrivacyPolicy']->privacy_policy_id; ?>">
                <input type="hidden" name="value_type" value="privacy_policy">
                <div class="form-group">
                  <label class="col-sm-1 control-label asterisk">title</label>
                  <div class="col-md-11">
                      <?php if (isset($data['webPrivacyPolicy']->title)) { ?>
                        <input type="text" class="form-control" name="title" placeholder="title"
                               value="<?php if (!empty($data['webPrivacyPolicy']->title)) echo $data['webPrivacyPolicy']->title; ?>">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="title" placeholder="title">
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-1 control-label asterisk">description</label>
                  <div class="col-md-11">
                      <?php if (isset($data['webPrivacyPolicy']->description)) { ?>
                        <textarea type="text" id="WYSIHTML1" class="form-control" name="description"
                                  placeholder="description"><?php if (!empty($data['webPrivacyPolicy']->description)) echo $data['webPrivacyPolicy']->description; ?></textarea>
                      <?php } else { ?>
                        <textarea type="text" id="WYSIHTML1" class="form-control" name="description"
                                  placeholder="description"></textarea>
                      <?php } ?>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" onclick='' class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>







            <div class="tab-pane <?php if ($data['active'] == "term_condition") echo "active"; ?>" id="term_condition">
              <br>
              <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/updateWebSettings"
                    method="POST">
                <input type="hidden" name="id" value="<?php if (!empty($data['webTermCondtion']->term_condition_id)) echo $data['webTermCondtion']->term_condition_id; ?>">
                <input type="hidden" name="value_type" value="term_condition">
                <div class="form-group">
                  <label class="col-sm-1 control-label asterisk">title</label>
                  <div class="col-md-11">
                      <?php if (isset($data['webTermCondtion']->title)) { ?>
                        <input type="text" class="form-control" name="title" placeholder="title"
                               value="<?php if (!empty($data['webTermCondtion']->title)) echo $data['webTermCondtion']->title; ?>">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="title" placeholder="title">
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-1 control-label asterisk">description</label>
                  <div class="col-md-11">
                      <?php if (isset($data['webTermCondtion']->description)) { ?>
                        <textarea type="text" id="WYSIHTML2" class="form-control" name="description"
                                  placeholder="description"><?php if (!empty($data['webTermCondtion']->description)) echo $data['webTermCondtion']->description; ?></textarea>
                      <?php } else { ?>
                        <textarea type="text" id="WYSIHTML2" class="form-control" name="description"
                                  placeholder="description"></textarea>
                      <?php } ?>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" onclick='' class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>



            

            <div class="tab-pane <?php if ($data['active'] == "faqs_update") echo "active"; ?>">
              <br>
              <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/updateWebSettings"
                    method="POST">
                <input type="hidden" name="id"
                       value="<?php if (!empty($data['webfaqsedit']->faq_id)) echo $data['webfaqsedit']->faq_id; ?>">
                <input type="hidden" name="value_type" value="faqs">
                <div class="form-group">
                  <label class="col-sm-1 control-label asterisk">question</label>
                  <div class="col-md-11">
                      <?php if (isset($data['webfaqsedit']->question)) { ?>
                        <input type="text" class="form-control" name="title" placeholder="question"
                               value="<?php if (!empty($data['webfaqsedit']->question)) echo $data['webfaqsedit']->question; ?>">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="title" placeholder="question">
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-1 control-label asterisk">answer</label>
                  <div class="col-md-11">
                      <?php if (isset($data['webfaqsedit']->answer)) { ?>
                        <textarea type="text" id="WYSIHTML3" class="form-control" name="description"
                                  placeholder="answer"><?php if (!empty($data['webfaqsedit']->answer)) echo $data['webfaqsedit']->answer; ?></textarea>
                      <?php } else { ?>
                        <textarea type="text" id="WYSIHTML3" class="form-control" name="description"
                                  placeholder="answer"></textarea>
                      <?php } ?>
                  </div>
                </div>
                <div class="modal-footer">
                  <?php if (isset($data['webfaqsedit']->faq_id)) { ?>
                       <button type="submit" class="btn btn-primary">Update</button>
                      <?php } else { ?>
                        <button type="submit" class="btn btn-primary">Add</button>
                      <?php } ?>

                  
                  <a href="<?php echo base_url(); ?>index.php/admin/settings/faqs" class="btn btn-default">Back</a>
                </div>
              </form>
            </div>

            

            <div class="tab-pane <?php if ($data['active'] == "faqs") echo "active"; ?>" id="faqs">
       
                  <a href="<?php echo base_url(); ?>index.php/admin/settings/faqs_update"
                     class="btn btn-primary pull-right" style="margin-top: -3%;">
                     <i class="fa fa-plus"></i>
                  </a>

              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Faq's id</th>
                  <th>question</th>
                  <th>answer</th>
                  <th>status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['webfaqs'] as $webfaqs) { ?>
                  <tr>
                    <td><?php echo $webfaqs->faq_id; ?></td>
                    <td><?php echo $webfaqs->question; ?></td>
                    <td><?php echo $webfaqs->answer; ?></td>
                    <td><?php echo($webfaqs->status == 0 ? "Disable" : "Enable"); ?></td>
                    <td>
                        <?php if ($webfaqs->status == 0) { ?>
                          <a href="<?php echo base_url(); ?>index.php/admin/faqs_status/Enable?faq_id=<?php echo $webfaqs->faq_id; ?>"
                             class="btn btn-default">
                            <i class="fa fa-thumbs-down"></i>
                          </a>
                        <?php } else { ?>
                          <a href="<?php echo base_url(); ?>index.php/admin/faqs_status/Disable?faq_id=<?php echo $webfaqs->faq_id; ?>"
                             class="btn btn-info">
                            <i class="fa fa-thumbs-up"></i>
                          </a>
                        <?php } ?>
                      <a href="<?php echo base_url(); ?>index.php/admin/webfaqsEdit?faq_id=<?php echo $webfaqs->faq_id; ?>"
                         class="btn btn-primary">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <a href="<?php echo base_url(); ?>index.php/admin/faqs_status/Delete?faq_id=<?php echo $webfaqs->faq_id; ?>"
                         class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>






            <div class="tab-pane <?php if ($data['active'] == "how_it_works") echo "active"; ?>" id="feature">
              <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/updateWebSettings"
                              method="POST">
              <input type="hidden" name="id"
                     value="<?php if (!empty($data['webWorking']->id)) echo $data['webWorking']->id; ?>">
              <input type="hidden" name="value_type" value="how_it_works">
              <div class="form-group">
                <label class="col-sm-1 control-label asterisk">title</label>
                <div class="col-md-11">
                    <?php if (isset($data['webWorking']->title)) { ?>
                      <input type="text" class="form-control" name="title" placeholder="title"
                             value="<?php if (!empty($data['webWorking']->title)) echo $data['webWorking']->title; ?>">
                    <?php } else { ?>
                      <input type="text" class="form-control" name="title" placeholder="title">
                    <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-1 control-label asterisk">description</label>
                <div class="col-md-11">
                    <?php if (isset($data['webWorking']->description)) { ?>
                      <textarea type="text" id="WYSIHTML4" class="form-control" name="description"
                                placeholder="description"><?php if (!empty($data['webWorking']->description)) echo $data['webWorking']->description; ?></textarea>
                    <?php } else { ?>
                      <textarea type="text" id="WYSIHTML4" class="form-control" name="description"
                                placeholder="description"></textarea>
                    <?php } ?>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" onclick='' class="btn btn-primary">Update</button>
              </div>
            </form>
            </div>







            <div class="tab-pane <?php if ($data['active'] == "feature_update") echo "active"; ?>">
              <br>
              <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/updateWebSettings"
                    method="POST">
                <input type="hidden" name="id"
                       value="<?php if (!empty($data['webWorkingedit']->feature_id)) echo $data['webWorkingedit']->feature_id; ?>">
                <input type="hidden" name="value_type" value="features">
                <div class="form-group">
                  <label class="col-sm-1 control-label asterisk">title</label>
                  <div class="col-md-11">
                      <?php if (isset($data['webWorkingedit']->title)) { ?>
                        <input type="text" class="form-control" name="title" placeholder="title"
                               value="<?php if (!empty($data['webWorkingedit']->title)) echo $data['webWorkingedit']->title; ?>">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="title" placeholder="title" value="">
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-1 control-label asterisk">description</label>
                  <div class="col-md-11">
                      <?php if (isset($data['webWorkingedit']->description)) { ?>
                        <textarea type="text" id="WYSIHTML6" class="form-control" name="description"
                                  placeholder="description"><?php if (!empty($data['webWorkingedit']->description)) echo $data['webWorkingedit']->description; ?></textarea>
                      <?php } else { ?>
                        <textarea type="text" id="WYSIHTML6" class="form-control" name="description" placeholder="description"></textarea>
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-1 control-label asterisk">image</label>
                  <div class="col-md-11">
                      <?php if (isset($data['webWorkingedit']->image)) { ?>
                        <input type="file" class="form-control" name="image" placeholder="image"
                               value="<?php if (!empty($data['webWorkingedit']->title)) echo $data['webWorkingedit']->title; ?>">
                      <?php } else { ?>
                          <input type="file" class="form-control" name="image" placeholder="image" value="">
                      <?php } ?>
                  </div>
                </div>
                <div class="modal-footer">
                  <?php if (isset($data['webWorkingedit'])) { ?>
                    <button type="submit" onclick='' class="btn btn-primary">Update</button>
                  <?php } else { ?>
                    <button type="submit" onclick='' class="btn btn-primary">Add</button>
                  <?php } ?>
                </div>
              </form>
            </div>








            <div class="tab-pane <?php if ($data['active'] == "features") echo "active"; ?>" id="working">

              <a href="<?php echo base_url(); ?>index.php/admin/settings/feature_update"
                     class="btn btn-primary floatalign_text_right" style="margin-top: -3%;">
                     <i class="fa fa-plus"></i>
                  </a>

              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Feature id</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th class="text__align__right">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['webfeatures'] as $webfeature) { ?>
                  <tr>
                    <td><?php echo $webfeature->feature_id; ?></td>
                    <td><?php echo $webfeature->image; ?></td>
                    <td><?php echo $webfeature->title; ?></td>
                    <td><?php echo $webfeature->description; ?></td>
                    <td class="text__align__right">
                      <a href="<?php echo base_url(); ?>index.php/admin/webWorkingedit?feature_id=<?php echo $webfeature->feature_id; ?>"
                         class="btn btn-primary">
                        <i class="fa fa-pencil"></i>
                      </a>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>  