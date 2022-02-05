
<form action="<?php echo e(url('admin/saveproductoption')); ?>" method="post">
  <?php echo e(csrf_field()); ?>

  <input type="hidden" name="product_id" id="product1" value="<?php echo e($product_id); ?>"/>
   <div class="row">
      <div class="col-md-12">
         <div class="categories-accordion mrg30" uk-accordion="targets: > div > .category-wrap">
            <div class="categories-sort-wrap uk-sortable uk-margin-top" uk-sortable="handle: .sort-categories" id="optionlist">
              <?php $i=0;?>
              <?php if(!empty($data->optionls)): ?>
                 <?php    $i=0;
                             $name=array();
                             $index=1;
                            if(!empty($data->optionls)){
                                $name=explode(",",$data->optionls->name);
                                $type=explode(",",$data->optionls->type);
                                $isrequired=explode(",", $data->optionls->is_required);
                                $label=explode("#",$data->optionls->label);
                                $price=explode("#",$data->optionls->price);
                                $price_type=explode("#",$data->optionls->price_type);
                            }

                    ?>
                        <?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $po): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $index=$i;?>
                            <div class="category-wrap" data-id="<?php echo e($index); ?>" id="mainoption<?php echo e($index); ?>">
                                <h3 class="uk-accordion-title uk-background-secondary uk-light uk-padding-small">
                <div class="uk-sortable-handle sort-categories uk-display-inline-block ti-layout-grid4-alt" ></div> <?php echo e(__('messages.new_option')); ?>

            </h3>
                                <div class="uk-accordion-content categories-content ">
                                    <ul class="ulinine edit-p-list-u">
                                        <li class="ulliinine">
                                            <label for="name" class="control-label mb-1"><?php echo e(__('messages.name')); ?></label>
                                            <input id="option_name_<?php echo e($index); ?>" name="options[<?php echo e($i); ?>][name]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo e($name[$i]); ?>">
                                        </li>
                                        <li class="ulliinine">
                                            <label for="name" class="control-label mb-1"><?php echo e(__('messages.type')); ?></label>
                                            <select name="options[<?php echo e($i); ?>][type]" required id="option_type_<?php echo e($index); ?>" class="form-control" onchange="addoptionvalue('<?php echo e($index); ?>')">
                                                <option value=""><?php echo e(__('messages.select')); ?> <?php echo e(__('messages.type')); ?></option>
                                                <option value="1" <?=$type[$i]==1 ? ' selected="selected"' : '';?>><?php echo e(__('messages.dropdown')); ?></option>
                                                <option value="2" <?=$type[$i]==2 ? ' selected="selected"' : '';?>><?php echo e(__('messages.checkbox')); ?></option>
                                                <option value="3" <?=$type[$i]==3 ? ' selected="selected"' : '';?>><?php echo e(__('messages.radiobutton')); ?></option>
                                                <option value="4" <?=$type[$i]==4 ? ' selected="selected"' : '';?>><?php echo e(__('messages.multiple_select')); ?></option>
                                            </select>
                                        </li>
                                        <li class="ulliinine3">
                                           <input type="hidden" name="options[<?php echo e($i); ?>][required]" id="optionreq<?php echo e($index); ?>" value="<?php echo e($isrequired[$i]); ?>"/>
                                            <input type="checkbox" id="is_required_<?php echo e($index); ?>" onclick="changeoptiondata('<?php echo e($index); ?>')" value="1" class="form-check-input" <?=$isrequired[$i]==1 ? ' checked="checked"' : '';?>><?php echo e(__('messages.required')); ?></li>
                                        <li class="ulliinine3">
                                            <button type="button" class="btn btn-danger" onclick="removeoption('<?php echo e($index); ?>')"><i class="fa fa-trash f-s-25"></i>
                                            </button>
                                        </li>
                                    </ul>
                                    <?php $lb=explode(",",$label[$i]);
                                          $pr=explode(",",$price[$i]);
                                          $j=0;
                                          $indexj=$j+1;
                                     ?>
                                        <div id="valuesection<?php echo e($index); ?>">
                                            <ul class="valul">
                                                <li class="td2"></li>
                                                <li class="td6"><?php echo e(__("messages.label")); ?></li>
                                                <li class="td6"><?php echo e(__("messages.price")); ?></li>
                                                <li class="td2"></li>
                                            </ul>

                                            <div class="uk-sortable " uk-sortable="handle: .sort-questions" id="option<?php echo e($index); ?>">
                                                <?php $__currentLoopData = $lb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="questions-row" id="row_<?php echo e($index); ?>_<?php echo e($indexj); ?>">
                                                    <div class="edit-p-small uk-grid-small uk-margin-small-bottom uk-margin-small-top" uk-grid>
                                                        <div class="edit-p-width-lc-2 edit-p-padding ">
                                                            <span class="edit-p-lcm uk-sortable-handle sort-questions uk-margin-small-right" uk-icon="icon: table"></span>
                                                        </div>
                                                        <div class="edit-p-width-lco edit-p-padding " style="width:40%">
                                                            <input class="form-control" type="text" id="label_<?php echo e($index); ?>_<?php echo e($indexj); ?>" name="options[<?php echo e($index); ?>][label][]" value="<?php echo e($l); ?>" />
                                                        </div>
                                                        <div class="edit-p-width-lco edit-p-padding " style="width:40%">
                                                            <input class="form-control" type="text" id="price_<?php echo e($index); ?>_<?php echo e($indexj); ?>" name="options[<?php echo e($index); ?>][price][]" value="<?=isset($pr[$j])?$pr[$j]:0; ?>" />
                                                        </div>
                                                       
                                                        <div class="edi-p-width-lc edit-p-padding">
                                                            <button type="button" class="btn btn-danger" onclick="removeoptionrow('<?php echo e($index); ?>','<?php echo e($indexj); ?>')"><i class="fa fa-trash f-s-25"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $j++;$indexj++;?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            
                                            <button type="button" class="edit-p-lcb btn btn-primary" onclick="addnewoptionvalue('<?php echo e($index); ?>')"><?php echo e(__("messages.add_new_row")); ?></button>
                                            <input type="hidden" name="total_option<?php echo e($index); ?>" id="total_option<?php echo e($index); ?>" value="<?php echo e($index); ?>" />
                                        </div>
                                </div>
                            </div>
                            <?php $i++;?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
               <div class="category-wrap" data-id="<?php echo e($i); ?>" id="mainoption<?php echo e($i); ?>">
                  <h3 class="uk-accordion-title uk-background-secondary uk-light uk-padding-small">
                     <div class="uk-sortable-handle sort-categories uk-display-inline-block ti-layout-grid4-alt" ></div>
                     <?php echo e(__('messages.new_option')); ?>

                  </h3>
                  <div class="uk-accordion-content categories-content ">
                       <div class="edit-p-list-u">
                     <ul class="ulinine">
                        <li class="ulliinine">
                           <label for="name" class="control-label mb-1"><?php echo e(__('messages.name')); ?></label>
                           <input id="option_name_<?php echo e($i); ?>" required name="options[<?php echo e($i); ?>][name]" type="text" class="form-control" aria-required="true" aria-invalid="false">
                        </li>
                        <li class="ulliinine">
                           <label for="name" class="control-label mb-1"><?php echo e(__('messages.type')); ?></label>
                           <select name="options[<?php echo e($i); ?>][type]" required id="options<?php echo e($i); ?>" class="form-control" onchange="addoptionvalue(<?php echo e($i); ?>)">
                              <option value=""><?php echo e(__('messages.select')); ?> <?php echo e(__('messages.type')); ?></option>
                              <option value="1"><?php echo e(__('messages.dropdown')); ?></option>
                              <option value="2"><?php echo e(__('messages.checkbox')); ?></option>
                              <option value="3"><?php echo e(__('messages.radiobutton')); ?></option>
                              <option value="4"><?php echo e(__('messages.multiple_select')); ?></option>
                           </select>
                        </li>
                        <input type="hidden" name="options[<?php echo e($i); ?>][required]" id="optionreq<?php echo e($i); ?>" value="0"/>
                        <li class="ulliinine3">
                           <input type="checkbox" id="is_required_<?php echo e($i); ?>"  onclick="changeoptiondata('<?php echo e($i); ?>')"  value="1" class="form-check-input"><?php echo e(__('messages.required')); ?>

                        </li>
                        <li class="ulliinine3">
                           <button type="button" class="btn btn-danger" onclick="removeoption(<?php echo e($i); ?>)"><i class="fa fa-trash f-s-25"></i>
                           </button>
                        </li>
                     </ul>
                  </div>
                     <div id="valuesection<?php echo e($i); ?>"></div>
                  </div>
               </div>
              <?php endif; ?>
            </div>
         </div>
         <input type="hidden" name="totaloption" id="totaloption" value="<?php echo e($i); ?>" />
          <div class="edit-p-blc">
         <div class="col-md-12 p-0 orderdiv">
            <div class="row">
               <div class="col-md-5 fleft" >
                  <button type="button" class="btn btn-outline-secondary fleft" onclick="addoption()" ><?php echo e(__('messages.add_new_option')); ?></button>
               </div>
               <div class="col-md-7 florig">
                  <select name="globaloptiontype" id="globaloptiontype" class="form-control col-md-6 fleft">
                     <option value=""><?php echo e(__('messages.select')); ?> <?php echo e(__('messages.option')); ?></option>
                     <?php $__currentLoopData = $optionvalues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($opval->id); ?>"><?php echo e($opval->name); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <button type="button" class="btn btn-primary col-md-6 fleft"  onclick="addglobaloption()"><?php echo e(__('messages.add_global_option')); ?></button>
               </div>
            </div>
         </div>
      </div>
       <?php if(Session::get("is_demo")=='1'): ?>
                                        <button type="button" onclick="return alert('This function is currently disable as it is only a demo website, in your admin it will work perfect')" class="btn btn-primary fleft">
                                               <?php echo e(__('messages.save')); ?>

                                        </button>
                                     <?php else: ?>
                                      <button type="submit" class="btn btn-primary fleft"><?php echo e(__('messages.save')); ?></button>
                                     <?php endif; ?> 
         
      </div>
   </div>
</form>
<input type="hidden" id="fixed" value='<?php echo e(__("messages.Fixed")); ?>'>
<input type="hidden" id="percentage" value="<?php echo e(__('messages.percentage')); ?>">
<input type="hidden" id="label" value='<?php echo e(__("messages.label")); ?>'>
<input type="hidden" id="pricemsg" value='<?php echo e(__("messages.price")); ?>'>
<input type="hidden" id="price_type" value='<?php echo e(__("messages.price_type")); ?>'>
<input type="hidden" id="add_new_row" value='<?php echo e(__("messages.add_new_row")); ?>'>
<input type="hidden" id="new_option" value='<?php echo e(__("messages.new_option")); ?>'>
<input type="hidden" id="namedis" value='<?php echo e(__("messages.name")); ?>'>
<input type="hidden" id="select_type" value='<?php echo e(__("messages.select")); ?> <?php echo e(__("messages.type")); ?>'>
<input type="hidden" id="dropdown" value='<?php echo e(__("messages.dropdown")); ?>'>
<input type="hidden" id="checkbox" value='<?php echo e(__("messages.checkbox")); ?>'>
<input type="hidden" id="radiobutton" value='<?php echo e(__("messages.radiobutton")); ?>'>
<input type="hidden" id="multiple_select" value='<?php echo e(__("messages.multiple_select")); ?>'>
<input type="hidden" id="requireddis" value='<?php echo e(__("messages.required")); ?>'>
<input type="hidden" id="ple_sel_option" value="<?php echo e(__('messages_error_success.ple_sel_option')); ?>"><?php /**PATH /home2/demopxhh/public_html/kri/ecom/resources/views/admin/product/optionadd.blade.php ENDPATH**/ ?>