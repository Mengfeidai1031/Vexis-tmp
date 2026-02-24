<?php $__env->startSection('title', 'Concesionarios - VEXIS'); ?>
<?php $__env->startSection('content'); ?>
<div class="vx-page-header"><h1 class="vx-page-title"><i class="bi bi-building" style="color:#34495E;"></i> Nuestros Concesionarios</h1><a href="<?php echo e(route('cliente.inicio')); ?>" class="vx-btn vx-btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a></div>

<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:16px;">
    <?php $__currentLoopData = $centros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $centro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="vx-card">
        <div style="padding:20px;">
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:14px;">
                <div style="width:48px;height:48px;border-radius:12px;background:linear-gradient(135deg,var(--vx-primary),#2980b9);display:flex;align-items:center;justify-content:center;color:white;font-size:20px;flex-shrink:0;"><i class="bi bi-building"></i></div>
                <div>
                    <h4 style="font-size:15px;font-weight:800;margin:0;"><?php echo e($centro->nombre); ?></h4>
                    <?php if($centro->empresa): ?>
                        <p style="margin:0;font-size:12px;color:var(--vx-text-muted);"><?php echo e($centro->empresa->nombre); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($centro->direccion): ?>
                <div style="font-size:12px;margin-bottom:6px;"><i class="bi bi-geo-alt" style="color:var(--vx-danger);margin-right:4px;"></i><?php echo e($centro->direccion); ?></div>
            <?php endif; ?>
            <?php if($centro->municipio || $centro->provincia): ?>
                <div style="font-size:12px;margin-bottom:6px;"><i class="bi bi-signpost-2" style="color:var(--vx-info);margin-right:4px;"></i><?php echo e($centro->municipio ?? '—'); ?><?php if($centro->provincia): ?>, <?php echo e($centro->provincia); ?><?php endif; ?></div>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/cliente/concesionarios.blade.php ENDPATH**/ ?>