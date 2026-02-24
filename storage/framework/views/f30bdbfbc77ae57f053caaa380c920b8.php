<?php $__env->startSection('title', 'Centros - VEXIS'); ?>
<?php $__env->startSection('content'); ?>
<div class="vx-page-header">
    <h1 class="vx-page-title">Centros</h1>
    <div class="vx-page-actions">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear centros')): ?>
            <a href="<?php echo e(route('centros.create')); ?>" class="vx-btn vx-btn-primary"><i class="bi bi-plus-circle"></i> Nuevo Centro</a>
        <?php endif; ?>
    </div>
</div>

<form action="<?php echo e(route('centros.index')); ?>" method="GET" class="vx-search-box">
    <input type="text" name="search" class="vx-input" placeholder="Buscar por nombre, dirección, provincia, municipio o empresa..." value="<?php echo e(request('search')); ?>">
    <button type="submit" class="vx-btn vx-btn-primary"><i class="bi bi-search"></i> Buscar</button>
    <?php if(request('search')): ?>
        <a href="<?php echo e(route('centros.index')); ?>" class="vx-btn vx-btn-secondary">Limpiar</a>
    <?php endif; ?>
</form>

<div class="vx-card">
    <div class="vx-card-body" style="padding: 0;">
        <?php if($centros->count() > 0): ?>
            <div class="vx-table-wrapper">
                <table class="vx-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Empresa</th>
                            <th>Dirección</th>
                            <th>Municipio</th>
                            <th>Provincia</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $centros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $centro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="color: var(--vx-text-muted);"><?php echo e($centro->id); ?></td>
                                <td style="font-weight: 600;"><?php echo e($centro->nombre); ?></td>
                                <td><span class="vx-badge vx-badge-primary"><?php echo e($centro->empresa->abreviatura ?? $centro->empresa->nombre); ?></span></td>
                                <td style="font-size: 12px;"><?php echo e($centro->direccion); ?></td>
                                <td><?php echo e($centro->municipio); ?></td>
                                <td><?php echo e($centro->provincia); ?></td>
                                <td>
                                    <div class="vx-actions"><button class="vx-actions-toggle"><i class="bi bi-three-dots-vertical"></i></button><div class="vx-actions-menu"><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $centro)): ?>
                                            <a href="<?php echo e(route('centros.show', $centro)); ?>" class="vx-btn vx-btn-info vx-btn-sm" title="Ver"><i class="bi bi-eye"></i></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $centro)): ?>
                                            <a href="<?php echo e(route('centros.edit', $centro)); ?>" class="vx-btn vx-btn-warning vx-btn-sm" title="Editar"><i class="bi bi-pencil"></i></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $centro)): ?>
                                            <form action="<?php echo e(route('centros.destroy', $centro)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar este centro?');">
                                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="vx-btn vx-btn-danger vx-btn-sm" title="Eliminar"><i class="bi bi-trash"></i></button>
                                            </form>
                                        <?php endif; ?></div></div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div style="padding: 16px 20px;"><?php echo e($centros->links('vendor.pagination.vexis')); ?></div>
        <?php else: ?>
            <div class="vx-empty"><i class="bi bi-geo-alt"></i><p>No se encontraron centros.</p></div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/centros/index.blade.php ENDPATH**/ ?>