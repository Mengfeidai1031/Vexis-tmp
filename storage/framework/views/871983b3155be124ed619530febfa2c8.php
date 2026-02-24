<?php $__env->startSection('title', 'Usuarios - VEXIS'); ?>

<?php $__env->startSection('content'); ?>
<div class="vx-page-header">
    <h1 class="vx-page-title">Usuarios</h1>
    <div class="vx-page-actions">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear usuarios')): ?>
            <a href="<?php echo e(route('users.create')); ?>" class="vx-btn vx-btn-primary">
                <i class="bi bi-plus-circle"></i> Nuevo Usuario
            </a>
        <?php endif; ?>
    </div>
</div>


<form action="<?php echo e(route('users.index')); ?>" method="GET" class="vx-search-box">
    <input type="text" name="search" class="vx-input" placeholder="Buscar por nombre, email, empresa, departamento o centro..." value="<?php echo e(request('search')); ?>">
    <button type="submit" class="vx-btn vx-btn-primary"><i class="bi bi-search"></i> Buscar</button>
    <?php if(request('search')): ?>
        <a href="<?php echo e(route('users.index')); ?>" class="vx-btn vx-btn-secondary">Limpiar</a>
    <?php endif; ?>
</form>


<div class="vx-card">
    <div class="vx-card-body" style="padding: 0;">
        <?php if($users->count() > 0): ?>
            <div class="vx-table-wrapper">
                <table class="vx-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Empresa</th>
                            <th>Departamento</th>
                            <th>Centro</th>
                            <th>Teléfono</th>
                            <th>Restricciones</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="color: var(--vx-text-muted);"><?php echo e($user->id); ?></td>
                                <td>
                                    <div style="font-weight: 600;"><?php echo e($user->nombre_completo); ?></div>
                                </td>
                                <td style="font-family: var(--vx-font-mono); font-size: 12px;"><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->empresa->nombre); ?></td>
                                <td><?php echo e($user->departamento->nombre); ?></td>
                                <td><?php echo e($user->centro->nombre); ?></td>
                                <td><?php echo e($user->telefono ?? '—'); ?></td>
                                <td>
                                    <?php if($user->restrictions_count > 0): ?>
                                        <span class="vx-badge vx-badge-warning"><?php echo e($user->restrictions_count); ?></span>
                                    <?php else: ?>
                                        <span class="vx-badge vx-badge-success">Sin restricciones</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="vx-actions"><button class="vx-actions-toggle"><i class="bi bi-three-dots-vertical"></i></button><div class="vx-actions-menu"><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $user)): ?>
                                            <a href="<?php echo e(route('users.show', $user)); ?>" class="vx-btn vx-btn-info vx-btn-sm" title="Ver"><i class="bi bi-eye"></i></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
                                            <a href="<?php echo e(route('users.edit', $user)); ?>" class="vx-btn vx-btn-warning vx-btn-sm" title="Editar"><i class="bi bi-pencil"></i></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $user)): ?>
                                            <form action="<?php echo e(route('users.destroy', $user)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar este usuario?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="vx-btn vx-btn-danger vx-btn-sm" title="Eliminar"><i class="bi bi-trash"></i></button>
                                            </form>
                                        <?php endif; ?></div></div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div style="padding: 16px 20px;">
                <?php echo e($users->links('vendor.pagination.vexis')); ?>

            </div>
        <?php else: ?>
            <div class="vx-empty">
                <i class="bi bi-people"></i>
                <p>No se encontraron usuarios.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/users/index.blade.php ENDPATH**/ ?>