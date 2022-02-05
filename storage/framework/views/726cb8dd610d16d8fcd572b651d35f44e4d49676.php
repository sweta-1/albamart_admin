 <?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4 float-right-1">
      <div class="page-header float-left float-right-1">
         <div class="page-title">
            <h1><?php echo e(__('messages.add_tax')); ?></h1>
         </div>
      </div>
   </div>
 <div class="col-sm-8 float-left-1">
      <div class="page-header float-right float-left-1">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"><?php echo e(__('messages.add_tax')); ?></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="content mt-3">
   <div class="rowset">
      <div class="col-lg-8">
         <div class="card">
            <div class="card-header">
               <strong class="card-title"><?php echo e(__('messages.add_tax')); ?></strong>
            </div>
            <div class="card-body">
               <form action="<?php echo e(url('admin/storetaxes')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                  <div class="cmr1">
                     <div id="pay-invoice">
                        <div class="card-body">
                           <?php if(Session::has('message')): ?>
                           <div class="col-sm-12">
                              <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert"><?php echo e(Session::get('message')); ?>

                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                           </div>
                           <?php endif; ?>
                           <div class="row form-group">
                              <div class="col col-md-3">
                                 <label for="text-input" class=" form-control-label"><?php echo e(__('messages.tax_name')); ?><span class="reqfield">*</span></label>
                              </div>
                              <div class="col-12 col-md-9">
                                 <input type="text" id="tax_class" placeholder="<?php echo e(__('messages.tax_name')); ?>" class="form-control" name="tax_class" required>
                              </div>
                           </div>
                           <input type="hidden" name="based_on" value="1"/>
                        
                           <div class="row form-group">
                              <div class="col col-md-3">
                                 <label for="text-input" class=" form-control-label"><?php echo e(__('messages.rate')); ?>(%)<span class="reqfield">*</span></label>
                              </div>
                              <div class="col-12 col-md-9">
                                 <input type="number" id="rate" step="any" placeholder="<?php echo e(__('messages.rate')); ?>" class="form-control" name="rate" required>
                              </div>
                           </div>
                           <div>
                               <?php if(Session::get("is_demo")=='1'): ?>
                                        <button type="button" onclick="return alert('This function is currently disable as it is only a demo website, in your admin it will work perfect')" class="florig btn btn-primary">
                                               <?php echo e(__('messages.submit')); ?>

                                       </button>
                                  <?php else: ?>
                                         <button class="btn btn-primary florig" type="submit"><?php echo e(__('messages.submit')); ?></button>
                                  <?php endif; ?>
                             
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ao0bylx163io/public_html/demo.aximoinfotech.com/demo/albamart/resources/views/admin/localization/addtaxes.blade.php ENDPATH**/ ?>