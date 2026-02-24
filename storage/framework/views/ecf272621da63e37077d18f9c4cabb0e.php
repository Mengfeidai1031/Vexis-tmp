<?php $__env->startSection('title', 'Gestión - VEXIS'); ?>
<?php $__env->startSection('content'); ?>
<div class="vx-page-header">
    <h1 class="vx-page-title"><i class="bi bi-building" style="color: var(--vx-primary); margin-right: 8px;"></i>Módulo de Gestión</h1>
</div>
<p style="color: var(--vx-text-muted); margin-bottom: 24px;">Administración de usuarios, clientes, seguridad y mantenimiento del sistema.</p>


<div class="vx-module-section">
    <h3 class="vx-module-section-title">Principal</h3>
    <div class="vx-module-grid">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver usuarios')): ?>
        <a href="<?php echo e(route('users.index')); ?>" class="vx-module-card">
            <div class="vx-module-icon" style="background: rgba(51,170,221,0.1); color: var(--vx-primary);"><i class="bi bi-people"></i></div>
            <div class="vx-module-info"><h4>Usuarios</h4><p>Gestión de usuarios del sistema</p></div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver clientes')): ?>
        <a href="<?php echo e(route('clientes.index')); ?>" class="vx-module-card">
            <div class="vx-module-icon" style="background: rgba(46,204,113,0.1); color: var(--vx-success);"><i class="bi bi-person-lines-fill"></i></div>
            <div class="vx-module-info"><h4>Clientes</h4><p>Base de datos de clientes</p></div>
        </a>
        <?php endif; ?>
        <a href="<?php echo e(route('vacaciones.index')); ?>" class="vx-module-card">
            <div class="vx-module-icon" style="background: rgba(230,126,34,0.1); color: #E67E22;"><i class="bi bi-calendar-check"></i></div>
            <div class="vx-module-info"><h4>Vacaciones</h4><p>Solicitud y calendario de vacaciones</p></div>
        </a>
    </div>
</div>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['ver roles', 'ver restricciones'])): ?>
<div class="vx-module-section">
    <h3 class="vx-module-section-title"><i class="bi bi-shield-lock"></i> Seguridad</h3>
    <div class="vx-module-grid">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver roles')): ?>
        <a href="<?php echo e(route('roles.index')); ?>" class="vx-module-card">
            <div class="vx-module-icon" style="background: rgba(155,100,210,0.1); color: #9B64D2;"><i class="bi bi-shield-check"></i></div>
            <div class="vx-module-info"><h4>Roles</h4><p>Gestión de roles del sistema</p></div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver roles')): ?>
        <a href="<?php echo e(route('gestion.permisos')); ?>" class="vx-module-card">
            <div class="vx-module-icon" style="background: rgba(52,152,219,0.1); color: var(--vx-info);"><i class="bi bi-key"></i></div>
            <div class="vx-module-info"><h4>Permisos</h4><p>Matriz de permisos por rol</p></div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver restricciones')): ?>
        <a href="<?php echo e(route('restricciones.index')); ?>" class="vx-module-card">
            <div class="vx-module-icon" style="background: rgba(231,76,60,0.1); color: var(--vx-danger);"><i class="bi bi-lock"></i></div>
            <div class="vx-module-info"><h4>Restricciones</h4><p>Restricciones de acceso por entidad</p></div>
        </a>
        <?php endif; ?>
        <a href="<?php echo e(route('gestion.politica')); ?>" class="vx-module-card">
            <div class="vx-module-icon" style="background: rgba(46,204,113,0.1); color: var(--vx-success);"><i class="bi bi-file-earmark-lock"></i></div>
            <div class="vx-module-info"><h4>Política</h4><p>Política de seguridad del sistema</p></div>
        </a>
    </div>
</div>
<?php endif; ?>


<div class="vx-module-section">
    <h3 class="vx-module-section-title"><i class="bi bi-megaphone"></i> Marketing</h3>
    <div class="vx-module-grid">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver noticias')): ?>
        <a href="<?php echo e(route('noticias.index')); ?>" class="vx-module-card">
            <div class="vx-module-icon" style="background: rgba(52,152,219,0.1); color: var(--vx-info);"><i class="bi bi-newspaper"></i></div>
            <div class="vx-module-info"><h4>Noticias</h4><p>Noticias y comunicados internos</p></div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver campanias')): ?>
        <a href="<?php echo e(route('campanias.index')); ?>" class="vx-module-card">
            <div class="vx-module-icon" style="background: rgba(155,89,182,0.1); color: #9B59B6;"><i class="bi bi-megaphone"></i></div>
            <div class="vx-module-info"><h4>Campañas</h4><p>Gestión de campañas publicitarias</p></div>
        </a>
        <?php endif; ?>
    </div>
</div>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['ver departamentos', 'ver centros'])): ?>
<div class="vx-module-section">
    <h3 class="vx-module-section-title"><i class="bi bi-gear"></i> Mantenimiento</h3>
    <div class="vx-module-grid">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver empresas')): ?>
        <a href="<?php echo e(route('empresas.index')); ?>" class="vx-module-card">
            <div class="vx-module-icon" style="background: rgba(51,170,221,0.1); color: var(--vx-primary);"><i class="bi bi-building"></i></div>
            <div class="vx-module-info"><h4>Empresas</h4><p>Empresas del grupo</p></div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver departamentos')): ?>
        <a href="<?php echo e(route('departamentos.index')); ?>" class="vx-module-card">
            <div class="vx-module-icon" style="background: rgba(243,156,18,0.1); color: var(--vx-warning);"><i class="bi bi-diagram-3"></i></div>
            <div class="vx-module-info"><h4>Departamentos</h4><p>Departamentos de la organización</p></div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver centros')): ?>
        <a href="<?php echo e(route('centros.index')); ?>" class="vx-module-card">
            <div class="vx-module-icon" style="background: rgba(231,76,60,0.1); color: var(--vx-danger);"><i class="bi bi-geo-alt"></i></div>
            <div class="vx-module-info"><h4>Centros</h4><p>Centros de trabajo y ubicaciones</p></div>
        </a>
        <?php endif; ?>
        <a href="<?php echo e(route('gestion.marcas')); ?>" class="vx-module-card">
            <div class="vx-module-icon" style="background: rgba(100,107,82,0.1); color: #646B52;"><i class="bi bi-tags"></i></div>
            <div class="vx-module-info"><h4>Marcas</h4><p>Marcas de vehículos gestionadas</p></div>
        </a>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver naming-pcs')): ?>
        <a href="<?php echo e(route('naming-pcs.index')); ?>" class="vx-module-card">
            <div class="vx-module-icon" style="background: rgba(52,73,94,0.1); color: #34495E;"><i class="bi bi-pc-display"></i></div>
            <div class="vx-module-info"><h4>Naming PCs</h4><p>Nomenclatura de equipos informáticos</p></div>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver festivos')): ?>
        <a href="<?php echo e(route('festivos.index')); ?>" class="vx-module-card">
            <div class="vx-module-icon" style="background: rgba(231,76,60,0.1); color: var(--vx-danger);"><i class="bi bi-calendar-event"></i></div>
            <div class="vx-module-info"><h4>Festivos</h4><p>Calendario de festivos por municipio</p></div>
        </a>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

<div class="vx-module-section">
    <h3 class="vx-module-section-title"><i class="bi bi-graph-up"></i> Dataxis</h3>
    <div class="vx-module-grid">
        <a href="<?php echo e(route('dataxis.inicio')); ?>" class="vx-module-card">
            <div class="vx-module-icon" style="background:rgba(51,170,221,0.1);color:var(--vx-primary);"><i class="bi bi-graph-up"></i></div>
            <div class="vx-module-info"><h4>Dataxis</h4><p>Análisis, estadísticas y gráficas de datos</p></div>
        </a>
    </div>
</div>

<?php $__env->startPush('styles'); ?>
<style>
.vx-module-section { margin-bottom: 28px; }
.vx-module-section-title { font-size: 15px; font-weight: 700; color: var(--vx-text-secondary); margin-bottom: 12px; display: flex; align-items: center; gap: 6px; }
.vx-module-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 12px; }
.vx-module-card { display: flex; align-items: center; gap: 14px; padding: 18px 20px; background: var(--vx-surface); border: 1px solid var(--vx-border); border-radius: var(--vx-radius-lg); text-decoration: none; color: var(--vx-text); transition: all 0.2s; position: relative; }
.vx-module-card:hover { border-color: var(--vx-primary); box-shadow: 0 4px 16px rgba(51,170,221,0.1); transform: translateY(-2px); }
.vx-module-card-disabled { opacity: 0.55; pointer-events: none; }
.vx-module-card-disabled:hover { transform: none; box-shadow: none; border-color: var(--vx-border); }
.vx-module-icon { width: 44px; height: 44px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0; }
.vx-module-info h4 { font-size: 14px; font-weight: 700; margin: 0 0 2px; }
.vx-module-info p { font-size: 12px; color: var(--vx-text-muted); margin: 0; }
.vx-module-soon { position: absolute; top: 8px; right: 10px; font-size: 9px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: var(--vx-text-muted); background: var(--vx-gray-100); padding: 2px 6px; border-radius: 4px; }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/gestion/inicio.blade.php ENDPATH**/ ?>