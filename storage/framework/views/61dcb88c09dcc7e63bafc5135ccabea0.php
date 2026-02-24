<?php $__env->startSection('title', $user->nombre_completo . ' - VEXIS'); ?>

<?php $__env->startSection('content'); ?>
<div class="vx-page-header">
    <h1 class="vx-page-title">Detalle del Usuario</h1>
    <div class="vx-page-actions">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
            <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="vx-btn vx-btn-warning"><i class="bi bi-pencil"></i> Editar</a>
        <?php endif; ?>
        <a href="<?php echo e(route('users.index')); ?>" class="vx-btn vx-btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
    </div>
</div>

<div style="max-width: 800px;">
    <div class="vx-card">
        <div class="vx-card-header">
            <div style="display: flex; align-items: center; gap: 12px;">
                <div class="vx-avatar" style="width: 40px; height: 40px; font-size: 15px; cursor: default;">
                    <?php echo e(strtoupper(substr($user->nombre, 0, 1))); ?><?php echo e(strtoupper(substr($user->apellidos, 0, 1))); ?>

                </div>
                <div>
                    <h3 style="margin: 0;"><?php echo e($user->nombre_completo); ?></h3>
                    <span style="font-size: 12px; color: var(--vx-text-muted); font-weight: 400;">ID: <?php echo e($user->id); ?></span>
                </div>
            </div>
        </div>
        <div class="vx-card-body">
            <div class="vx-info-row">
                <div class="vx-info-label">Nombre</div>
                <div class="vx-info-value"><?php echo e($user->nombre); ?></div>
            </div>
            <div class="vx-info-row">
                <div class="vx-info-label">Apellidos</div>
                <div class="vx-info-value"><?php echo e($user->apellidos); ?></div>
            </div>
            <div class="vx-info-row">
                <div class="vx-info-label">Email</div>
                <div class="vx-info-value" style="font-family: var(--vx-font-mono); font-size: 13px;"><?php echo e($user->email); ?></div>
            </div>
            <div class="vx-info-row">
                <div class="vx-info-label">Teléfono</div>
                <div class="vx-info-value"><?php echo e($user->telefono ?? 'No especificado'); ?></div>
            </div>
            <div class="vx-info-row">
                <div class="vx-info-label">Extensión</div>
                <div class="vx-info-value"><?php echo e($user->extension ?? 'No especificado'); ?></div>
            </div>
            <div class="vx-info-row">
                <div class="vx-info-label">Empresa</div>
                <div class="vx-info-value"><?php echo e($user->empresa->nombre); ?> <span class="vx-badge vx-badge-gray"><?php echo e($user->empresa->abreviatura); ?></span></div>
            </div>
            <div class="vx-info-row">
                <div class="vx-info-label">Departamento</div>
                <div class="vx-info-value"><?php echo e($user->departamento->nombre); ?> <span class="vx-badge vx-badge-gray"><?php echo e($user->departamento->abreviatura); ?></span></div>
            </div>
            <div class="vx-info-row">
                <div class="vx-info-label">Centro</div>
                <div class="vx-info-value">
                    <?php echo e($user->centro->nombre); ?><br>
                    <span style="font-size: 12px; color: var(--vx-text-muted);"><?php echo e($user->centro->direccion); ?>, <?php echo e($user->centro->municipio); ?>, <?php echo e($user->centro->provincia); ?></span>
                </div>
            </div>
            <div class="vx-info-row">
                <div class="vx-info-label">Roles</div>
                <div class="vx-info-value">
                    <?php if($user->roles->count() > 0): ?>
                        <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="vx-badge vx-badge-primary"><?php echo e($role->name); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <span style="color: var(--vx-text-muted);">Sin roles asignados</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="vx-info-row">
                <div class="vx-info-label">Restricciones</div>
                <div class="vx-info-value">
                    <?php $restrictionsCount = $user->restrictions->count(); ?>
                    <?php if($restrictionsCount > 0): ?>
                        <span class="vx-badge vx-badge-warning"><?php echo e($restrictionsCount); ?> restricciones</span>
                    <?php else: ?>
                        <span class="vx-badge vx-badge-success">Sin restricciones</span>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editar restricciones')): ?>
                        <a href="<?php echo e(route('restricciones.edit', $user->id)); ?>" class="vx-btn vx-btn-warning vx-btn-sm" style="margin-left: 8px;">Gestionar</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="vx-info-row">
                <div class="vx-info-label">Creado</div>
                <div class="vx-info-value"><?php echo e($user->created_at->format('d/m/Y H:i')); ?></div>
            </div>
            <div class="vx-info-row">
                <div class="vx-info-label">Actualizado</div>
                <div class="vx-info-value"><?php echo e($user->updated_at->format('d/m/Y H:i')); ?></div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/users/show.blade.php ENDPATH**/ ?>