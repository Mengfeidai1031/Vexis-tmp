<?php $__env->startSection('title', 'Mecánicos - VEXIS'); ?>
<?php $__env->startSection('content'); ?>
<div class="vx-page-header"><h1 class="vx-page-title">Mecánicos</h1><div class="vx-page-actions"><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear mecanicos')): ?><a href="<?php echo e(route('mecanicos.create')); ?>" class="vx-btn vx-btn-primary"><i class="bi bi-plus-circle"></i> Nuevo</a><?php endif; ?></div></div>
<form action="<?php echo e(route('mecanicos.index')); ?>" method="GET" class="vx-search-box">
    <input type="text" name="search" class="vx-input" placeholder="Buscar por nombre o especialidad..." value="<?php echo e(request('search')); ?>" style="flex:1;">
    <select name="taller_id" class="vx-select" style="width:auto;"><option value="">Todos los talleres</option><?php $__currentLoopData = $talleres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($t->id); ?>" <?php echo e(request('taller_id') == $t->id ? 'selected' : ''); ?>><?php echo e($t->nombre); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
    <button type="submit" class="vx-btn vx-btn-primary"><i class="bi bi-search"></i></button>
    <?php if(request()->anyFilled(['search','taller_id'])): ?><a href="<?php echo e(route('mecanicos.index')); ?>" class="vx-btn vx-btn-secondary">Limpiar</a><?php endif; ?>
</form>
<div class="vx-card"><div class="vx-card-body" style="padding:0;">
    <?php if($mecanicos->count() > 0): ?>
    <div class="vx-table-wrapper"><table class="vx-table">
        <thead><tr><th>Nombre</th><th>Especialidad</th><th>Taller</th><th>Estado</th><th>Acciones</th></tr></thead>
        <tbody><?php $__currentLoopData = $mecanicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="font-weight:600;"><i class="bi bi-person-gear" style="color:var(--vx-success);margin-right:4px;"></i><?php echo e($m->nombre_completo); ?></td>
            <td style="font-size:12px;"><?php echo e($m->especialidad ?? '—'); ?></td>
            <td style="font-size:12px;"><?php echo e($m->taller->nombre ?? '—'); ?></td>
            <td><?php if($m->activo): ?><span class="vx-badge vx-badge-success">Activo</span><?php else: ?><span class="vx-badge vx-badge-gray">Inactivo</span><?php endif; ?></td>
            <td><div class="vx-actions"><button class="vx-actions-toggle"><i class="bi bi-three-dots-vertical"></i></button><div class="vx-actions-menu">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editar mecanicos')): ?><a href="<?php echo e(route('mecanicos.edit', $m)); ?>"><i class="bi bi-pencil" style="color:var(--vx-warning);"></i> Editar</a><?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('eliminar mecanicos')): ?><form action="<?php echo e(route('mecanicos.destroy', $m)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar?');"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button type="submit" class="act-danger"><i class="bi bi-trash"></i> Eliminar</button></form><?php endif; ?>
            </div></div></td>
        </tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody>
    </table></div>
    <div style="padding:16px 20px;"><?php echo e($mecanicos->links('vendor.pagination.vexis')); ?></div>
    <?php else: ?><div class="vx-empty"><i class="bi bi-person-gear"></i><p>No se encontraron mecánicos.</p></div><?php endif; ?>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/mecanicos/index.blade.php ENDPATH**/ ?>