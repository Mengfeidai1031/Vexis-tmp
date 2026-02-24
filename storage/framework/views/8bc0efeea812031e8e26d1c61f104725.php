<?php $__env->startSection('title', 'Roles y Permisos - VEXIS'); ?>
<?php $__env->startSection('content'); ?>
<div class="vx-page-header">
    <h1 class="vx-page-title">Roles y Permisos</h1>
    <div class="vx-page-actions">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear roles')): ?>
            <a href="<?php echo e(route('roles.create')); ?>" class="vx-btn vx-btn-primary"><i class="bi bi-plus-circle"></i> Nuevo Rol</a>
        <?php endif; ?>
    </div>
</div>

<form action="<?php echo e(route('roles.index')); ?>" method="GET" class="vx-search-box">
    <input type="text" name="search" class="vx-input" placeholder="Buscar por nombre de rol..." value="<?php echo e(request('search')); ?>">
    <button type="submit" class="vx-btn vx-btn-primary"><i class="bi bi-search"></i> Buscar</button>
    <?php if(request('search')): ?>
        <a href="<?php echo e(route('roles.index')); ?>" class="vx-btn vx-btn-secondary">Limpiar</a>
    <?php endif; ?>
</form>

<div class="vx-card">
    <div class="vx-card-body" style="padding: 0;">
        <?php if($roles->count() > 0): ?>
            <div class="vx-table-wrapper">
                <table class="vx-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Permisos</th>
                            <th>Usuarios</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="color: var(--vx-text-muted);"><?php echo e($role->id); ?></td>
                                <td style="font-weight: 600;"><?php echo e($role->name); ?></td>
                                <td><span class="vx-badge vx-badge-info"><?php echo e($role->permissions_count); ?> permisos</span></td>
                                <td><span class="vx-badge vx-badge-gray"><?php echo e($role->users_count); ?> usuarios</span></td>
                                <td><?php echo e($role->created_at->format('d/m/Y')); ?></td>
                                <td>
                                    <div class="vx-actions"><button class="vx-actions-toggle"><i class="bi bi-three-dots-vertical"></i></button><div class="vx-actions-menu"><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver roles')): ?>
                                            <a href="<?php echo e(route('roles.show', $role->id)); ?>" class="vx-btn vx-btn-info vx-btn-sm" title="Ver"><i class="bi bi-eye"></i></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editar roles')): ?>
                                            <a href="<?php echo e(route('roles.edit', $role->id)); ?>" class="vx-btn vx-btn-warning vx-btn-sm" title="Editar"><i class="bi bi-pencil"></i></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('eliminar roles')): ?>
                                            <?php if($role->users_count == 0): ?>
                                                <form action="<?php echo e(route('roles.destroy', $role->id)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar este rol?');">
                                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="vx-btn vx-btn-danger vx-btn-sm" title="Eliminar"><i class="bi bi-trash"></i></button>
                                                </form>
                                            <?php else: ?>
                                                <button class="vx-btn vx-btn-danger vx-btn-sm" disabled title="Tiene usuarios asignados"><i class="bi bi-trash"></i></button>
                                            <?php endif; ?>
                                        <?php endif; ?></div></div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div style="padding: 16px 20px;"><?php echo e($roles->links('vendor.pagination.vexis')); ?></div>
        <?php else: ?>
            <div class="vx-empty"><i class="bi bi-shield-lock"></i><p>No se encontraron roles.</p></div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/roles/index.blade.php ENDPATH**/ ?>