<?php $__env->startSection('title', 'Marcas - VEXIS'); ?>
<?php $__env->startSection('content'); ?>
<div class="vx-page-header">
    <h1 class="vx-page-title">Marcas</h1>
    <a href="<?php echo e(route('gestion.inicio')); ?>" class="vx-btn vx-btn-secondary"><i class="bi bi-arrow-left"></i> Gestión</a>
</div>
<p style="color:var(--vx-text-muted);margin-bottom:20px;">Marcas de vehículos gestionadas por Grupo ARI.</p>
<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:16px;">
    <?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="vx-card">
        <div class="vx-card-body" style="display:flex;align-items:center;gap:16px;">
            <div style="width:56px;height:56px;border-radius:12px;background:<?php echo e($marca->color); ?>20;display:flex;align-items:center;justify-content:center;">
                <i class="bi bi-tags" style="font-size:24px;color:<?php echo e($marca->color); ?>;"></i>
            </div>
            <div style="flex:1;">
                <h3 style="font-size:18px;font-weight:700;margin:0;"><?php echo e($marca->nombre); ?></h3>
                <div style="font-size:12px;color:var(--vx-text-muted);margin-top:2px;">
                    <span class="vx-badge" style="background:<?php echo e($marca->color); ?>20;color:<?php echo e($marca->color); ?>;"><?php echo e($marca->slug); ?></span>
                    <?php if($marca->activa): ?>
                        <span class="vx-badge vx-badge-success">Activa</span>
                    <?php else: ?>
                        <span class="vx-badge vx-badge-gray">Inactiva</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/gestion/marcas.blade.php ENDPATH**/ ?>