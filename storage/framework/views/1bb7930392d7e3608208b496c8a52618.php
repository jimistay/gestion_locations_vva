<link rel="stylesheet" href="../css/menu.css">
<nav>
    <a class="nav-style-a" href="<?php echo e(route('index')); ?>">Consulter les hebergements</a>
    <?php if(auth()->guard()->check()): ?>
        <?php if(Auth::user()->TYPECOMPTE == 'adm'): ?>
            <a class="nav-style-a" href="<?php echo e(route('list-utilisateurs')); ?>">Consulter tous les utilisateurs</a>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(auth()->guard()->check()): ?>
        <?php if(Auth::user()->TYPECOMPTE == 'ges'): ?>
            <a class="nav-style-a" href="<?php echo e(route('ajouter-un-hebergement')); ?>">Ajouter un hébérgement</a>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(auth()->guard()->check()): ?>
        <?php if(Auth::user()->TYPECOMPTE == 'ges' || Auth::user()->TYPECOMPTE == 'vac'): ?>
            <a class="nav-style-a" href="<?php echo e(route('index')); ?>">Réserver</a>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(auth()->guard()->check()): ?>
        <?php if(Auth::user()->TYPECOMPTE == 'ges'): ?>
            <a class="nav-style-a" href="<?php echo e(route('reservations')); ?>">Voir les réservations</a>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(auth()->guard()->guest()): ?>
        <a class="nav-style-a" href="<?php echo e(route('auth.login')); ?>">Se connecter</a>
    <?php endif; ?>
    <?php if(auth()->guard()->check()): ?>
        <p class="name-user"><?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?></p>
        <form action="<?php echo e(route('auth.logout')); ?>" method="post">
            <?php echo method_field("delete"); ?>
            <?php echo csrf_field(); ?>
            <button class="deconnexion-btn">Se déconnecter</button>
        </form>
    <?php endif; ?>
</nav>
<?php /**PATH C:\laragon\www\vacancesvva\resources\views/menu.blade.php ENDPATH**/ ?>