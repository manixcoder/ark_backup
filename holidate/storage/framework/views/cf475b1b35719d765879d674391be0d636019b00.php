<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><?php echo e(__('Users')); ?></h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('adminpanel.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                <li class="active"><?php echo e(__('Users')); ?></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title"><?php echo e(__('Users')); ?></h3>
                <p class="text-muted"><?php echo e(__('All')); ?> <?php echo e(__('Users')); ?> <?php echo e(__('available on')); ?> <code>Holidate.es</code></p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Email')); ?></th>
                                <th><?php echo e(__('Phone')); ?></th>
                                <th><?php echo e(__('Role')); ?></th>
                                <th><?php echo e(__('Created At')); ?></th>
                                <th><?php echo e(__('Updated At')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->id); ?></td>
                                <td>
                                    <?php if($user->profile_image!=''): ?>
                                    <img style="width:30px; height:30px; object-fit:cover; border-radius:50%;" src="<?php echo e(asset('profile_image/')); ?>/<?php echo e($user->profile_image); ?>" />
                                    <?php else: ?>
                                    <img style="width:30px; height:30px; object-fit:cover; border-radius:50%;" src="<?php echo e(asset('no-image.jpg')); ?>" />
                                    <?php endif; ?>
                                    <span style="margin-left:10px;"><?php echo e($user->name); ?> <?php echo e($user->surname); ?></span>
                                </td>
                                <td><?php echo e($user->email ?? 'Not Available'); ?></td>
                                <td><?php echo e($user->phone ?? 'Not Available'); ?></td>
                                <td><?php if($user->users_role == 1): ?> Admin <?php elseif($user->users_role == 2): ?> User <?php endif; ?></td>
                                <td><?php echo e($user->created_at->diffForHumans()); ?></td>
                                <td><?php echo e($user->updated_at->diffForHumans()); ?></td>
                                <td>
                                    <div style="display: flex;">
                                        <a data-toggle="modal" data-target="#editUser<?php echo e($user->id); ?>" class="btn btn-primary font-12 hidden-sm waves-effect waves-light" style="padding:2px 8px; margin-right:5px;"><?php echo e(__('Edit')); ?></a>
                                        <form action="<?php echo e(route('adminpanel.user.delete', $user->id)); ?>" method="POST">
                                            <?php echo e(method_field('DELETE')); ?>

                                            <?php echo e(csrf_field()); ?>

                                            <button type="submit" class="btn btn-danger font-12 hidden-sm waves-effect waves-light" style="padding:2px 8px;"><?php echo e(__('Delete')); ?></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <div id="editUser<?php echo e($user->id); ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h4 style="font-weight: 600;"><?php echo e(__('Edit')); ?> <?php echo e($user->name); ?></h4>
                                            <div class="row" style="margin:20px 0; border-top: 1px solid #cfcfcf;border-bottom: 1px solid #cfcfcf; padding:10px 0;">
                                                <div class="col-md-12" style="margin: 0 0 10px 0;">
                                                    <b><?php echo e(__('Update')); ?> <?php echo e($user->name); ?> Profile Image</b>
                                                </div>
                                                <div class="col-md-3">
                                                    <?php if($user->profile_image!=''): ?>
                                                    <img style="width:60px; height:60px; object-fit:cover; border-radius:50%;" src="<?php echo e(asset('profile_image/')); ?>/<?php echo e($user->profile_image); ?>" />
                                                    <?php else: ?>
                                                    <img style="width:60px; height:60px; object-fit:cover; border-radius:50%;" src="<?php echo e(asset('no-image.jpg')); ?>" />
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-9">
                                                    <form action="<?php echo e(route('adminpanel.user.image.update')); ?>" method="post" enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="text" name="user_id" value="<?php echo e($user->id); ?>" style="display: none;">
                                                        <div class="row" style="padding:10px;">
                                                            <div class="col-md-6">
                                                                <input type="file" name="profile_image" id="" accept="image/*">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="submit" ><?php echo e(__('Update')); ?></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <form class="" action="<?php echo e(route('adminpanel.user.update')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="text" name="user_id" value="<?php echo e($user->id); ?>" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="name"><?php echo e(__('Name')); ?></label>
                                                        <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo e($user->name); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="surname"><?php echo e(__('Surname')); ?></label>
                                                        <input type="text" class="form-control" name="surname" placeholder="Surame" value="<?php echo e($user->surname); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="emil"><?php echo e(__('Email')); ?></label>
                                                        <input type="email" class="form-control" disabled name="email" placeholder="Email" value="<?php echo e($user->email); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="phone"><?php echo e(__('Phone')); ?></label>
                                                        <input type="tel" class="form-control" name="phone" value="<?php echo e($user->phone); ?>" maxlength="10">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="Hobbies"><?php echo e(__('Hobbies')); ?></label>
                                                        <select name="hobbies[]" class="form-control" multiple style="height: 70px;">
                                                            <?php $__currentLoopData = $user->hobbies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hob): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option selected value="<?php echo e($hob->id); ?>"><?php echo e(__($hob->name)); ?>

                                                            </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $__currentLoopData = $hobbies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hobbie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($hobbie->id); ?>"><?php echo e(__($hobbie->name)); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="languages"><?php echo e(__('Languages')); ?></label>
                                                        <select id="selectLanguages" name="languages[]"
                                                            class="form-control js-example-basic-multiple" multiple style="height: 70px;">
                                                            <?php $__currentLoopData = $user->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option selected value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($language->id); ?>"><?php echo e($language->name); ?>

                                                            </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="web"><?php echo e(__('Website')); ?></label>
                                                        <input type="text" class="form-control" name="web" value="<?php echo e($user->web); ?>" value="<?php echo e($user->web); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="country"><?php echo e(__('Country')); ?></label>
                                                        <select name="country_id" class="form-control">
                                                            <option selected value="<?php echo e($user->country->id ?? ''); ?>"><?php echo e($user->country->name ?? 'Select Your Country'); ?></option>
                                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="country"><?php echo e(__('Professional Category')); ?></label>
                                                        <select name="professional_category_id" class="form-control">
                                                            <option value="<?php echo e($user->professional_category->id ?? ''); ?>"><?php echo e($user->professional_category->name ?? 'Select Your Professional Category'); ?></option>
                                                            <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($cx->id); ?>"><?php echo e($cx->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="country"><?php echo e(__('Marital Status')); ?></label>
                                                        <select name="marital_status" class="form-control">
                                                            <option selected
                                                                value="<?php echo e($user->marital_status ?? 'Select Your Status'); ?>">
                                                                <?php echo e($user->marital_status ?? 'Select Your Status'); ?>

                                                            </option>
                                                            <option
                                                                class="<?php if($user->marital_status == 'Single'): ?> hidden <?php endif; ?>"
                                                                value="Single">Single</option>
                                                            <option
                                                                class="<?php if($user->marital_status == 'Married'): ?> hidden <?php endif; ?>"
                                                                value="Married">Married</option>
                                                            <option
                                                                class="<?php if($user->marital_status == 'Widowed'): ?> hidden <?php endif; ?>"
                                                                value="Widowed">Widowed</option>
                                                            <option
                                                                class="<?php if($user->marital_status == 'Separated'): ?> hidden <?php endif; ?>"
                                                                value="Separated">Separated</option>
                                                            <option
                                                                class="<?php if($user->marital_status == 'Divorced'): ?> hidden <?php endif; ?>"
                                                                value="Divorced">Divorced</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="vacation_city"><?php echo e(__('Vacation City')); ?></label>
                                                        <input type="text" class="form-control" name="vacation_city" value="<?php echo e($user->vacation_city); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="city"><?php echo e(__('City')); ?></label>
                                                        <input type="text" class="form-control" name="city" value="<?php echo e($user->city); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="country"><?php echo e(__('Age')); ?></label>
                                                        <input type="text" class="form-control" name="age" value="<?php echo e($user->age); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="current_company"><?php echo e(__('Current Company')); ?></label>
                                                        <input type="text" class="form-control" name="current_company" value="<?php echo e($user->current_company); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="current_company"><?php echo e(__('Address')); ?></label>
                                                        <input type="text" id="addressBox" class="form-control" name="address" value="<?php echo e($user->address); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="current_company"><?php echo e(__('latitude')); ?></label>
                                                        <input type="text" id="latitudeBox" class="form-control" name="latitude" readonly value="<?php echo e($user->latitude); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="current_company"><?php echo e(__('longitude')); ?></label>
                                                        <input type="text" id="longitudeBox" class="form-control" name="longitude" readonly value="<?php echo e($user->longitude); ?>">
                                                    </div>   
                                                </div>
                                                <div class="col-md-6">
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div style="text-align: center; font-size:18px; padding: 0 10px;">Social Media <?php echo e(__('Profile')); ?></div>
                                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div style="margin: 10px 10px;">
                                                        <label for="facebook"><i class="fa fa-facebook-square"></i>  Facebook</label>
                                                        <input type="text" class="form-control" name="facebook" value="<?php echo e($user->facebook); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div style="margin: 10px 10px;">
                                                        <label for="instagram"><i class="fa fa-instagram"></i>  instagram</label>
                                                        <input type="text" class="form-control" name="instagram" value="<?php echo e($user->instagram); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div style="margin: 10px 10px;">
                                                        <label for="twitter"><i class="fa fa-twitter-square"></i>  twitter</label>
                                                        <input type="text" class="form-control" name="twitter" value="<?php echo e($user->twitter); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div style="margin: 10px 10px;">
                                                        <label for="youtube"><i class="fa fa-youtube-square"></i>  youtube</label>
                                                        <input type="text" class="form-control" name="youtube" value="<?php echo e($user->youtube); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div style="margin: 10px 10px;">
                                                        <label for="linkedin"><i class="fa fa-linkedin-square"></i>  linkedin</label>
                                                        <input type="text" class="form-control" name="linkedin" value="<?php echo e($user->linkedin); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                    <button type="submit" class="btn btn-primary" id="search"><?php echo e(__('Update')); ?></button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div>
                        <?php echo e($users->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var last_valid_selection = null;
        $('#selectLanguages').change(function (event) {
            if ($(this).val().length > 5) {
                $(this).val(last_valid_selection);
                alert('You Can\'t Select more than 5 lanugages');
            } else {
                last_valid_selection = $(this).val();
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\222holidate\resources\views/admin/users.blade.php ENDPATH**/ ?>