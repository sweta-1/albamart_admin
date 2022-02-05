<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1><?php echo e(__('messages.edit_page')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"><?php echo e(__('messages.edit_page')); ?></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="content mt-3">
   <div class="rowset">
      <div class="col-md-9">
         <div class="card">
            <div class="card-header">
               <strong class="card-title"><?php echo e(__('messages.edit_page')); ?></strong>
            </div>
            <div class="card-body">
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
                     <form action="<?php echo e(url('admin/updatepage')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="id" id="id" value="<?php echo e($data->id); ?>"/>
                        <div class="form-group">
                           <label for="name" class=" form-control-label">
                           <?php echo e(__('messages.page_name')); ?>

                           <span class="reqfield">*</span>
                           </label>
                           <input type="text" id="page_name" placeholder="<?php echo e(__('messages.page_name')); ?>" class="form-control" name="page_name" required value="<?php echo e($data->page_name); ?>">
                        </div>
                        <div class="form-group">
                           <label for="name" class=" form-control-label">
                           <?php echo e(__('messages.description')); ?>

                           <span class="reqfield">*</span>
                           </label>
                           <textarea class="form-control" name="description" id="descriptionpage" placeholder=" <?php echo e(__('messages.description')); ?>"><?php echo e($data->description); ?></textarea>
                        </div>
                        <div>
                              <?php if(Session::get("is_demo")=='1'): ?>
                                        <button type="button" onclick="return alert('This function is currently disable as it is only a demo website, in your admin it will work perfect')" class="btn btn-primary florig">
                                               <?php echo e(__('messages.save')); ?>

                                        </button>
                                     <?php else: ?>
                                          <button class="btn btn-primary florig" type="submit"> <?php echo e(__('messages.update')); ?></button>
                                     <?php endif; ?> 
                         
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">CKEDITOR.replace('descriptionpage');</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/demopxhh/public_html/kri/ecom/resources/views/admin/setting/editpage.blade.php ENDPATH**/ ?>