<?php if($paginator->hasPages()): ?>
    <nav class="vx-pagination" role="navigation">
        <ul class="vx-pagination-list">
            
            <?php if($paginator->onFirstPage()): ?>
                <li class="vx-page-item disabled"><span class="vx-page-link"><i class="bi bi-chevron-left"></i></span></li>
            <?php else: ?>
                <li class="vx-page-item"><a class="vx-page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"><i class="bi bi-chevron-left"></i></a></li>
            <?php endif; ?>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(is_string($element)): ?>
                    <li class="vx-page-item disabled"><span class="vx-page-link"><?php echo e($element); ?></span></li>
                <?php endif; ?>
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="vx-page-item active"><span class="vx-page-link"><?php echo e($page); ?></span></li>
                        <?php else: ?>
                            <li class="vx-page-item"><a class="vx-page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <li class="vx-page-item"><a class="vx-page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"><i class="bi bi-chevron-right"></i></a></li>
            <?php else: ?>
                <li class="vx-page-item disabled"><span class="vx-page-link"><i class="bi bi-chevron-right"></i></span></li>
            <?php endif; ?>
        </ul>
        <div class="vx-pagination-info">
            Mostrando <?php echo e($paginator->firstItem() ?? 0); ?>-<?php echo e($paginator->lastItem() ?? 0); ?> de <?php echo e($paginator->total()); ?>

        </div>
    </nav>
<?php endif; ?>
<?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/vendor/pagination/vexis.blade.php ENDPATH**/ ?>