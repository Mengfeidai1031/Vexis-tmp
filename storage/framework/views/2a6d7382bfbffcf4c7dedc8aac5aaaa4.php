<?php $__env->startSection('title', 'VEXIS - Grupo ARI'); ?>
<?php $__env->startSection('content'); ?>

<?php if(auth()->guard()->check()): ?>

<div style="max-width: 900px; margin: 0 auto;">
    <div style="text-align: center; padding: 40px 0 20px;">
        <?php
            $hour = (int) now()->format('H');
            $greeting = $hour < 12 ? 'Buenos días' : ($hour < 20 ? 'Buenas tardes' : 'Buenas noches');
        ?>
        <h1 style="font-size: 28px; font-weight: 300; color: var(--vx-text); margin-bottom: 4px;">
            <?php echo e($greeting); ?>, <strong style="font-weight: 700;"><?php echo e(Auth::user()->nombre); ?></strong>
        </h1>
        <p style="font-size: 14px; color: var(--vx-text-muted);">Bienvenido a VEXIS — Sistema de Gestión de Grupo ARI</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 12px; margin-top: 20px;">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver usuarios')): ?>
        <a href="<?php echo e(route('users.index')); ?>" class="vx-quick-card">
            <i class="bi bi-people" style="color: var(--vx-primary);"></i>
            <span>Usuarios</span>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver clientes')): ?>
        <a href="<?php echo e(route('clientes.index')); ?>" class="vx-quick-card">
            <i class="bi bi-person-lines-fill" style="color: var(--vx-success);"></i>
            <span>Clientes</span>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver ofertas')): ?>
        <a href="<?php echo e(route('ofertas.index')); ?>" class="vx-quick-card">
            <i class="bi bi-file-earmark-text" style="color: var(--vx-warning);"></i>
            <span>Ofertas</span>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver vehículos')): ?>
        <a href="<?php echo e(route('vehiculos.index')); ?>" class="vx-quick-card">
            <i class="bi bi-truck" style="color: var(--vx-info);"></i>
            <span>Vehículos</span>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver centros')): ?>
        <a href="<?php echo e(route('centros.index')); ?>" class="vx-quick-card">
            <i class="bi bi-geo-alt" style="color: var(--vx-danger);"></i>
            <span>Centros</span>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver roles')): ?>
        <a href="<?php echo e(route('roles.index')); ?>" class="vx-quick-card">
            <i class="bi bi-shield-lock" style="color: var(--vx-accent-dark);"></i>
            <span>Roles</span>
        </a>
        <?php endif; ?>
        <a href="<?php echo e(route('dashboard')); ?>" class="vx-quick-card">
            <i class="bi bi-speedometer2" style="color: var(--vx-primary-dark);"></i>
            <span>Dashboard</span>
        </a>
    </div>
</div>

<style>
.vx-quick-card { display: flex; align-items: center; gap: 12px; padding: 18px 20px; background: var(--vx-surface); border: 1px solid var(--vx-border); border-radius: var(--vx-radius-lg); text-decoration: none; color: var(--vx-text); transition: all 0.2s; }
.vx-quick-card:hover { border-color: var(--vx-primary); box-shadow: 0 4px 12px rgba(51,170,221,0.12); transform: translateY(-2px); }
.vx-quick-card i { font-size: 24px; }
.vx-quick-card span { font-size: 14px; font-weight: 600; }
</style>

<?php else: ?>

<div style="min-height: calc(100vh - var(--vx-navbar-height) - 60px); display: flex; align-items: center; justify-content: center;">
    <div style="text-align: center; max-width: 440px; padding: 40px 20px;">
        <img src="<?php echo e(asset('img/vexis-logo.png')); ?>" alt="VEXIS" style="width: 180px; margin-bottom: 32px;">
        <h1 style="font-size: 22px; font-weight: 300; color: var(--vx-text); margin-bottom: 8px;">
            Sistema de Gestión
        </h1>
        <p style="font-size: 14px; color: var(--vx-text-muted); margin-bottom: 32px;">
            Plataforma integral de gestión para concesionarios — Grupo ARI
        </p>
        <div style="display: flex; flex-direction: column; gap: 10px; max-width: 280px; margin: 0 auto;">
            <a href="<?php echo e(route('login')); ?>" class="vx-btn vx-btn-primary" style="justify-content: center; padding: 12px;">
                <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
            </a>
            <a href="<?php echo e(route('register')); ?>" class="vx-btn vx-btn-secondary" style="justify-content: center; padding: 12px;">
                <i class="bi bi-person-plus"></i> Crear Cuenta
            </a>
        </div>
        <p style="font-size: 11px; color: var(--vx-text-muted); margin-top: 24px;">
            Al registrarte tendrás acceso como cliente
        </p>
    </div>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/welcome.blade.php ENDPATH**/ ?>