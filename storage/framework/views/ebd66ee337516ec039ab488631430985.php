<?php $__env->startSection('title', 'Almacenes - VEXIS'); ?>
<?php $__env->startSection('content'); ?>
<div class="vx-page-header">
    <h1 class="vx-page-title"><i class="bi bi-boxes" style="color:var(--vx-primary);margin-right:6px;"></i>Almacenes</h1>
    <div class="vx-page-actions">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear almacenes')): ?>
            <a href="<?php echo e(route('almacenes.create')); ?>" class="vx-btn vx-btn-primary"><i class="bi bi-plus-circle"></i> Nuevo Almacén</a>
        <?php endif; ?>
    </div>
</div>
<form action="<?php echo e(route('almacenes.index')); ?>" method="GET" class="vx-search-box">
    <input type="text" name="search" class="vx-input" placeholder="Buscar por nombre, código, domicilio..." value="<?php echo e(request('search')); ?>" style="flex:1;">
    <select name="isla" class="vx-select" style="width:auto;">
        <option value="">Todas las islas</option>
        <?php $__currentLoopData = \App\Models\Almacen::$islas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $isla): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($isla); ?>" <?php echo e(request('isla') == $isla ? 'selected' : ''); ?>><?php echo e($isla); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <select name="empresa_id" class="vx-select" style="width:auto;">
        <option value="">Todas las empresas</option>
        <?php $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($e->id); ?>" <?php echo e(request('empresa_id') == $e->id ? 'selected' : ''); ?>><?php echo e($e->nombre); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <button type="submit" class="vx-btn vx-btn-primary"><i class="bi bi-search"></i></button>
    <?php if(request()->anyFilled(['search','isla','empresa_id'])): ?><a href="<?php echo e(route('almacenes.index')); ?>" class="vx-btn vx-btn-secondary">Limpiar</a><?php endif; ?>
</form>
<div class="vx-card">
    <div class="vx-card-body" style="padding:0;">
        <?php if($almacenes->count() > 0): ?>
        <div class="vx-table-wrapper">
            <table class="vx-table">
                <thead><tr><th>Código</th><th>Nombre</th><th>Localidad</th><th>Isla</th><th>Empresa</th><th>Centro</th><th>Estado</th><th>Acciones</th></tr></thead>
                <tbody>
                    <?php $__currentLoopData = $almacenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $almacen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><span class="vx-badge vx-badge-primary" style="font-family:var(--vx-font-mono);"><?php echo e($almacen->codigo); ?></span></td>
                        <td style="font-weight:600;"><?php echo e($almacen->nombre); ?></td>
                        <td style="font-size:12px;"><?php echo e($almacen->localidad ?? '—'); ?></td>
                        <td><span class="vx-badge vx-badge-info"><?php echo e($almacen->isla ?? '—'); ?></span></td>
                        <td style="font-size:12px;"><?php echo e($almacen->empresa->abreviatura ?? '—'); ?></td>
                        <td style="font-size:12px;"><?php echo e($almacen->centro->nombre ?? '—'); ?></td>
                        <td><?php if($almacen->activo): ?><span class="vx-badge vx-badge-success">Activo</span><?php else: ?><span class="vx-badge vx-badge-gray">Inactivo</span><?php endif; ?></td>
                        <td>
                            <div class="vx-actions"><button class="vx-actions-toggle"><i class="bi bi-three-dots-vertical"></i></button><div class="vx-actions-menu">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver almacenes')): ?><a href="<?php echo e(route('almacenes.show', $almacen)); ?>"><i class="bi bi-eye" style="color:var(--vx-info);"></i> Ver</a><?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editar almacenes')): ?><a href="<?php echo e(route('almacenes.edit', $almacen)); ?>"><i class="bi bi-pencil" style="color:var(--vx-warning);"></i> Editar</a><?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('eliminar almacenes')): ?>
                                <form action="<?php echo e(route('almacenes.destroy', $almacen)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar?');">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="act-danger"><i class="bi bi-trash"></i> Eliminar</button>
                                </form>
                                <?php endif; ?>
                            </div></div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div style="padding:16px 20px;"><?php echo e($almacenes->links('vendor.pagination.vexis')); ?></div>
        <?php else: ?>
        <div class="vx-empty"><i class="bi bi-boxes"></i><p>No se encontraron almacenes.</p></div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/almacenes/index.blade.php ENDPATH**/ ?>