<?php $__env->startSection('title', 'Dashboard - VEXIS'); ?>
<?php $__env->startSection('content'); ?>
<div class="vx-page-header">
    <div>
        <h1 class="vx-page-title">¡Bienvenido, <?php echo e(Auth::user()->nombre); ?>!</h1>
        <p style="font-size: 13px; color: var(--vx-text-secondary); margin-top: 2px;">
            <?php echo e(Auth::user()->empresa->nombre ?? ''); ?> · <?php echo e(Auth::user()->departamento->nombre ?? ''); ?>

        </p>
    </div>
</div>


<div class="vx-card" style="margin-bottom: 24px;">
    <div class="vx-card-body" style="display: flex; gap: 32px; flex-wrap: wrap; align-items: center;">
        <div style="display: flex; align-items: center; gap: 14px;">
            <div class="vx-avatar" style="width: 52px; height: 52px; font-size: 18px; cursor: default;">
                <?php echo e(strtoupper(substr(Auth::user()->nombre, 0, 1))); ?><?php echo e(strtoupper(substr(Auth::user()->apellidos, 0, 1))); ?>

            </div>
            <div>
                <div style="font-weight: 700; font-size: 16px;"><?php echo e(Auth::user()->nombre_completo); ?></div>
                <div style="font-size: 12px; color: var(--vx-text-muted);"><?php echo e(Auth::user()->email); ?></div>
            </div>
        </div>
        <div style="display: flex; gap: 24px; flex-wrap: wrap; font-size: 13px;">
            <div>
                <span style="color: var(--vx-text-muted);">Centro:</span>
                <span style="font-weight: 600;"><?php echo e(Auth::user()->centro->nombre ?? '—'); ?></span>
            </div>
            <div>
                <span style="color: var(--vx-text-muted);">Roles:</span>
                <?php $__currentLoopData = Auth::user()->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="vx-badge vx-badge-primary"><?php echo e($role->name); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div>
                <span style="color: var(--vx-text-muted);">Permisos:</span>
                <span class="vx-badge vx-badge-info"><?php echo e(Auth::user()->getAllPermissions()->count()); ?> activos</span>
            </div>
        </div>
    </div>
</div>


<h3 style="font-size: 15px; font-weight: 700; margin-bottom: 16px; color: var(--vx-text);">
    <i class="bi bi-grid-1x2" style="color: var(--vx-primary);"></i> Módulos
</h3>

<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 16px; margin-bottom: 28px;">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['ver usuarios', 'ver departamentos', 'ver centros', 'ver roles', 'ver restricciones', 'ver clientes'])): ?>
    <a href="<?php echo e(route('gestion.inicio')); ?>" class="vx-dash-module">
        <div class="vx-dash-module-icon" style="background: linear-gradient(135deg, #33AADD, #2890BB);"><i class="bi bi-building"></i></div>
        <div class="vx-dash-module-info">
            <h4>Gestión</h4>
            <p>Usuarios, Clientes, Seguridad, Mantenimiento</p>
        </div>
        <i class="bi bi-chevron-right" style="color: var(--vx-text-muted); margin-left: auto;"></i>
    </a>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['ver vehículos', 'ver ofertas'])): ?>
    <a href="<?php echo e(route('comercial.inicio')); ?>" class="vx-dash-module">
        <div class="vx-dash-module-icon" style="background: linear-gradient(135deg, #F39C12, #E67E22);"><i class="bi bi-car-front"></i></div>
        <div class="vx-dash-module-info">
            <h4>Comercial</h4>
            <p>Ofertas, Vehículos, Ventas, Tasaciones</p>
        </div>
        <i class="bi bi-chevron-right" style="color: var(--vx-text-muted); margin-left: auto;"></i>
    </a>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver almacenes')): ?>
    <a href="<?php echo e(route('recambios.inicio')); ?>" class="vx-dash-module">
        <div class="vx-dash-module-icon" style="background: linear-gradient(135deg, #1ABC9C, #16A085);"><i class="bi bi-box-seam"></i></div>
        <div class="vx-dash-module-info">
            <h4>Recambios</h4>
            <p>Almacenes, Stock, Repartos</p>
        </div>
        <i class="bi bi-chevron-right" style="color: var(--vx-text-muted); margin-left: auto;"></i>
    </a>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['ver talleres', 'ver citas', 'ver coches-sustitucion'])): ?>
    <a href="<?php echo e(route('talleres.inicio')); ?>" class="vx-dash-module">
        <div class="vx-dash-module-icon" style="background: linear-gradient(135deg, #8E44AD, #9B59B6);"><i class="bi bi-wrench-adjustable"></i></div>
        <div class="vx-dash-module-info">
            <h4>Talleres</h4>
            <p>Talleres, Citas, Coches de sustitución</p>
        </div>
    </a>
    <?php endif; ?>

    <a href="<?php echo e(route('cliente.inicio')); ?>" class="vx-dash-module">
        <div class="vx-dash-module-icon" style="background: linear-gradient(135deg, #E74C3C, #C0392B);"><i class="bi bi-person-heart"></i></div>
        <div class="vx-dash-module-info">
            <h4>Cliente</h4>
            <p>Chatbot IA, Pretasación, Configurador</p>
        </div>
    </a>
</div>


<h3 style="font-size: 15px; font-weight: 700; margin-bottom: 16px; color: var(--vx-text);">
    <i class="bi bi-lightning" style="color: var(--vx-warning);"></i> Accesos Rápidos
</h3>

<div class="vx-grid vx-grid-4">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver usuarios')): ?>
    <a href="<?php echo e(route('users.index')); ?>" class="vx-stat-card">
        <div class="vx-stat-icon" style="background: rgba(51,170,221,0.12); color: var(--vx-primary);"><i class="bi bi-people"></i></div>
        <div class="vx-stat-content"><h4>Usuarios</h4></div>
    </a>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver clientes')): ?>
    <a href="<?php echo e(route('clientes.index')); ?>" class="vx-stat-card">
        <div class="vx-stat-icon" style="background: rgba(46,204,113,0.12); color: var(--vx-success);"><i class="bi bi-person-lines-fill"></i></div>
        <div class="vx-stat-content"><h4>Clientes</h4></div>
    </a>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver vehículos')): ?>
    <a href="<?php echo e(route('vehiculos.index')); ?>" class="vx-stat-card">
        <div class="vx-stat-icon" style="background: rgba(243,156,18,0.12); color: var(--vx-warning);"><i class="bi bi-truck"></i></div>
        <div class="vx-stat-content"><h4>Vehículos</h4></div>
    </a>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver ofertas')): ?>
    <a href="<?php echo e(route('ofertas.index')); ?>" class="vx-stat-card">
        <div class="vx-stat-icon" style="background: rgba(231,76,60,0.12); color: var(--vx-danger);"><i class="bi bi-file-earmark-text"></i></div>
        <div class="vx-stat-content"><h4>Ofertas</h4></div>
    </a>
    <?php endif; ?>
</div>

<?php $__env->startPush('styles'); ?>
<style>
.vx-dash-module { display: flex; align-items: center; gap: 14px; padding: 18px 20px; background: var(--vx-surface); border: 1px solid var(--vx-border); border-radius: var(--vx-radius-lg); text-decoration: none; color: var(--vx-text); transition: all 0.2s; position: relative; }
.vx-dash-module:hover { border-color: var(--vx-primary); box-shadow: 0 4px 16px rgba(51,170,221,0.1); transform: translateY(-2px); }
.vx-dash-module-disabled { opacity: 0.5; pointer-events: none; }
.vx-dash-module-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 22px; color: white; flex-shrink: 0; }
.vx-dash-module-info h4 { font-size: 15px; font-weight: 700; margin: 0 0 2px; }
.vx-dash-module-info p { font-size: 12px; color: var(--vx-text-muted); margin: 0; }
.vx-module-soon { position: absolute; top: 8px; right: 10px; font-size: 9px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: var(--vx-text-muted); background: var(--vx-gray-100); padding: 2px 6px; border-radius: 4px; }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/dashboard.blade.php ENDPATH**/ ?>